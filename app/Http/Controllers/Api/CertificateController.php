<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CertificateController extends Controller
{
    /**
     * Display a listing of certificates / quotations with filters and pagination.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $query = Certificate::with('user', 'client')->latest();

        if ($user->isTechnician()) {
            $query->where('user_id', $user->id);
        }

        // Search across folio, client name, address, comuna, phone, description
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('certificate_number', 'like', "%{$search}%")
                  ->orWhere('client_name', 'like', "%{$search}%")
                  ->orWhere('client_address', 'like', "%{$search}%")
                  ->orWhere('client_comuna', 'like', "%{$search}%")
                  ->orWhere('client_provincia', 'like', "%{$search}%")
                  ->orWhere('client_phone', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Status filter
        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        // Document type filter (cotizacion vs certificado)
        if ($docType = $request->input('document_type')) {
            $query->where('document_type', $docType);
        }

        $perPage = max(5, min(50, intval($request->input('per_page', 15))));
        $paginated = $query->paginate($perPage);

        $items = $paginated->getCollection()->map(function ($cert) {
            return $this->formatCertificateSummary($cert);
        });

        return response()->json([
            'success' => true,
            'data' => $items,
            'pagination' => [
                'current_page' => $paginated->currentPage(),
                'last_page' => $paginated->lastPage(),
                'per_page' => $paginated->perPage(),
                'total' => $paginated->total(),
                'has_more' => $paginated->hasMorePages(),
            ],
        ]);
    }

    /**
     * Return next suggested folios and default SEC / Prodoral text templates.
     */
    public function defaults()
    {
        $lastCert = Certificate::orderByRaw('CAST(certificate_number AS UNSIGNED) DESC')->first();
        $nextNumber = ($lastCert && intval($lastCert->certificate_number) >= 257830) 
            ? intval($lastCert->certificate_number) + 1 
            : 257830;

        $defaultDetails = "Se realizó sellado de fuga de gas en red de 30 metros lineales aproximadamente.\n\n"
            . "Se asegura hermeticidad de acuerdo al Decreto Supremo 66 Artículo 44.2.3 SEC. Se utilizó prodoral r6-1 sellante alemán para Fugas de Gas aceptado por SEC ds66 artículo 7: DIN EN 13090 Y NAG-203.\n\n"
            . "Solucionado, garantía 3 años por efectos de sellado.\n\n"
            . "Prueba de hermeticidad final a 267mmca estanco por 5 minutos, sin fugas.\n\n"
            . "Responsable Domingo Isain Plaza Caamaño Rut 12738961-6\n"
            . "Gasfiter Certificado Autorizado SEC Clase 3";

        return response()->json([
            'success' => true,
            'next_folio' => (string)$nextNumber,
            'default_details' => $defaultDetails,
            'default_gasfiter' => [
                'name' => 'Domingo Isain Plaza Caamaño',
                'rut' => '12.738.961-6',
                'sec_class' => 'Gasfiter Certificado Autorizado SEC Clase 3',
            ],
            'standard_warranties' => '3 años por efectos de sellado',
            'standard_test_pressure' => '267 mmca por 5 minutos',
        ]);
    }

    /**
     * Display full details of a specific certificate / quotation.
     */
    public function show(Request $request, $id)
    {
        $user = $request->user();
        $certificate = Certificate::with('user', 'client')->findOrFail($id);

        if ($user->isTechnician() && $certificate->user_id !== $user->id) {
            return response()->json([
                'success' => false,
                'message' => 'No está autorizado para ver este documento.',
            ], 403);
        }

        return response()->json([
            'success' => true,
            'certificate' => $this->formatCertificateDetail($certificate),
        ]);
    }

    /**
     * Store a newly created certificate or quotation in storage.
     */
    public function store(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'certificate_number' => 'required|unique:certificates,certificate_number',
            'document_type' => 'required|in:certificado,cotizacion',
            'date' => 'required|date',
            'client_name' => 'required|string|max:255',
            'client_phone' => 'nullable|string|max:100',
            'client_address' => 'nullable|string|max:255',
            'client_comuna' => 'nullable|string|max:100',
            'client_provincia' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'quantity' => 'nullable|integer|min:1',
            'unit_price' => 'nullable|numeric|min:0',
            'items' => 'nullable',
            'tax_type' => 'nullable|in:neto,factura',
            'work_details' => 'nullable|string',
            'gasfiter_name' => 'required|string',
            'gasfiter_rut' => 'required|string',
            'gasfiter_sec_class' => 'required|string',
            'status' => 'required|in:emitido,pendiente,completado,anulado',
            'photo_1' => 'nullable|image|max:15360',
            'photo_2' => 'nullable|image|max:15360',
            'photo_3' => 'nullable|image|max:15360',
            'extra_photos.*' => 'nullable|image|max:15360',
            'notes' => 'nullable|string',
        ]);

        if ($validated['document_type'] === 'certificado' && ! $user->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Solo Domingo Isain (Administrador / SEC Clase 3) tiene autorización para emitir Certificados Oficiales.',
            ], 403);
        }

        $taxType = $request->input('tax_type', 'neto');

        // Parse items JSON or array
        $rawItems = $request->input('items');
        if (is_string($rawItems)) {
            $rawItems = json_decode($rawItems, true) ?: [];
        }

        $processedItems = [];
        $subtotal = 0;

        if (is_array($rawItems) && count($rawItems) > 0) {
            foreach ($rawItems as $item) {
                $desc = trim($item['description'] ?? '');
                if ($desc === '') continue;
                $qty = max(1, intval($item['quantity'] ?? 1));
                $price = max(0, floatval($item['unit_price'] ?? 0));
                $subtotal += ($qty * $price);
                $processedItems[] = [
                    'description' => $desc,
                    'quantity' => $qty,
                    'unit_price' => $price,
                    'total' => $qty * $price,
                ];
            }
        }

        if (count($processedItems) > 0) {
            $mainDescription = count($processedItems) === 1 
                ? $processedItems[0]['description'] 
                : implode(' / ', array_column($processedItems, 'description'));
            $mainQuantity = $processedItems[0]['quantity'];
            $mainUnitPrice = $processedItems[0]['unit_price'];
        } else {
            $mainDescription = $request->input('description') ?: 'Servicio Técnico SellafuGas';
            $mainQuantity = max(1, intval($request->input('quantity', 1)));
            $mainUnitPrice = max(0, floatval($request->input('unit_price', 0)));
            $subtotal = $mainQuantity * $mainUnitPrice;
            $processedItems = [
                [
                    'description' => $mainDescription,
                    'quantity' => $mainQuantity,
                    'unit_price' => $mainUnitPrice,
                    'total' => $subtotal,
                ]
            ];
        }

        $taxAmount = 0;
        $totalPrice = $subtotal;
        if ($taxType === 'factura') {
            $taxAmount = round($subtotal * 0.19);
            $totalPrice = $subtotal + $taxAmount;
        }

        // Auto-save Client
        $client = Client::firstOrCreate(
            ['name' => $validated['client_name']],
            [
                'phone' => $validated['client_phone'],
                'address' => $validated['client_address'],
                'comuna' => $validated['client_comuna'],
                'provincia' => $validated['client_provincia'],
            ]
        );

        // Upload and optimize photos
        $photoPaths = [];
        foreach (['photo_1', 'photo_2', 'photo_3'] as $photoKey) {
            if ($request->hasFile($photoKey)) {
                $photoPaths[$photoKey] = $this->uploadAndOptimizeImage($request->file($photoKey), 'certificates');
            } else {
                $photoPaths[$photoKey] = null;
            }
        }

        $extraPaths = [];
        if ($request->hasFile('extra_photos')) {
            foreach ($request->file('extra_photos') as $file) {
                if ($file && $file->isValid()) {
                    $optPath = $this->uploadAndOptimizeImage($file, 'certificates');
                    if ($optPath) {
                        $extraPaths[] = $optPath;
                    }
                }
            }
        }

        $certificate = Certificate::create([
            'certificate_number' => $validated['certificate_number'],
            'document_type' => $validated['document_type'] ?? 'certificado',
            'date' => $validated['date'],
            'user_id' => $user->id,
            'client_id' => $client->id,
            'client_name' => $validated['client_name'],
            'client_phone' => $validated['client_phone'],
            'client_address' => $validated['client_address'],
            'client_comuna' => $validated['client_comuna'],
            'client_provincia' => $validated['client_provincia'],
            'description' => $mainDescription,
            'items' => $processedItems,
            'quantity' => $mainQuantity,
            'unit_price' => $mainUnitPrice,
            'subtotal_neto' => $subtotal,
            'tax_type' => $taxType,
            'tax_amount' => $taxAmount,
            'total_price' => $totalPrice,
            'work_details' => $validated['work_details'] ?? null,
            'gasfiter_name' => $validated['gasfiter_name'],
            'gasfiter_rut' => $validated['gasfiter_rut'],
            'gasfiter_sec_class' => $validated['gasfiter_sec_class'],
            'status' => $validated['status'],
            'photo_1' => $photoPaths['photo_1'],
            'photo_2' => $photoPaths['photo_2'],
            'photo_3' => $photoPaths['photo_3'],
            'extra_photos' => $extraPaths,
            'notes' => $validated['notes'] ?? null,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Documento N° ' . $certificate->certificate_number . ' creado exitosamente.',
            'certificate' => $this->formatCertificateDetail($certificate),
        ], 201);
    }

    /**
     * Update an existing certificate or quotation.
     */
    public function update(Request $request, $id)
    {
        $user = $request->user();
        $certificate = Certificate::findOrFail($id);

        if ($user->isTechnician() && $certificate->user_id !== $user->id) {
            return response()->json([
                'success' => false,
                'message' => 'No está autorizado para modificar este documento.',
            ], 403);
        }

        $validated = $request->validate([
            'certificate_number' => 'required|unique:certificates,certificate_number,' . $certificate->id,
            'document_type' => 'required|in:certificado,cotizacion',
            'date' => 'required|date',
            'client_name' => 'required|string|max:255',
            'client_phone' => 'nullable|string|max:100',
            'client_address' => 'nullable|string|max:255',
            'client_comuna' => 'nullable|string|max:100',
            'client_provincia' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'quantity' => 'nullable|integer|min:1',
            'unit_price' => 'nullable|numeric|min:0',
            'items' => 'nullable',
            'tax_type' => 'nullable|in:neto,factura',
            'work_details' => 'nullable|string',
            'gasfiter_name' => 'required|string',
            'gasfiter_rut' => 'required|string',
            'gasfiter_sec_class' => 'required|string',
            'status' => 'required|in:emitido,pendiente,completado,anulado',
            'photo_1' => 'nullable|image|max:15360',
            'photo_2' => 'nullable|image|max:15360',
            'photo_3' => 'nullable|image|max:15360',
            'extra_photos.*' => 'nullable|image|max:15360',
            'notes' => 'nullable|string',
        ]);

        if ($validated['document_type'] === 'certificado' && ! $user->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Solo Domingo Isain (Administrador / SEC Clase 3) tiene autorización para emitir Certificados Oficiales.',
            ], 403);
        }

        $taxType = $request->input('tax_type', $certificate->tax_type ?: 'neto');

        // Process items
        $rawItems = $request->input('items');
        if (is_string($rawItems)) {
            $rawItems = json_decode($rawItems, true) ?: [];
        }

        $processedItems = [];
        $subtotal = 0;

        if (is_array($rawItems) && count($rawItems) > 0) {
            foreach ($rawItems as $item) {
                $desc = trim($item['description'] ?? '');
                if ($desc === '') continue;
                $qty = max(1, intval($item['quantity'] ?? 1));
                $price = max(0, floatval($item['unit_price'] ?? 0));
                $subtotal += ($qty * $price);
                $processedItems[] = [
                    'description' => $desc,
                    'quantity' => $qty,
                    'unit_price' => $price,
                    'total' => $qty * $price,
                ];
            }
        }

        if (count($processedItems) > 0) {
            $mainDescription = count($processedItems) === 1 
                ? $processedItems[0]['description'] 
                : implode(' / ', array_column($processedItems, 'description'));
            $mainQuantity = $processedItems[0]['quantity'];
            $mainUnitPrice = $processedItems[0]['unit_price'];
        } else {
            $mainDescription = $request->input('description') ?: $certificate->description;
            $mainQuantity = max(1, intval($request->input('quantity', $certificate->quantity ?: 1)));
            $mainUnitPrice = max(0, floatval($request->input('unit_price', $certificate->unit_price ?: 0)));
            $subtotal = $mainQuantity * $mainUnitPrice;
            $processedItems = [
                [
                    'description' => $mainDescription,
                    'quantity' => $mainQuantity,
                    'unit_price' => $mainUnitPrice,
                    'total' => $subtotal,
                ]
            ];
        }

        $taxAmount = 0;
        $totalPrice = $subtotal;
        if ($taxType === 'factura') {
            $taxAmount = round($subtotal * 0.19);
            $totalPrice = $subtotal + $taxAmount;
        }

        $updateData = [
            'certificate_number' => $validated['certificate_number'],
            'document_type' => $validated['document_type'],
            'date' => $validated['date'],
            'client_name' => $validated['client_name'],
            'client_phone' => $validated['client_phone'],
            'client_address' => $validated['client_address'],
            'client_comuna' => $validated['client_comuna'],
            'client_provincia' => $validated['client_provincia'],
            'description' => $mainDescription,
            'items' => $processedItems,
            'quantity' => $mainQuantity,
            'unit_price' => $mainUnitPrice,
            'subtotal_neto' => $subtotal,
            'tax_type' => $taxType,
            'tax_amount' => $taxAmount,
            'total_price' => $totalPrice,
            'work_details' => $validated['work_details'] ?? $certificate->work_details,
            'gasfiter_name' => $validated['gasfiter_name'],
            'gasfiter_rut' => $validated['gasfiter_rut'],
            'gasfiter_sec_class' => $validated['gasfiter_sec_class'],
            'status' => $validated['status'],
            'notes' => $validated['notes'] ?? $certificate->notes,
        ];

        // Handle photo updates
        foreach (['photo_1', 'photo_2', 'photo_3'] as $photoKey) {
            if ($request->hasFile($photoKey)) {
                if ($certificate->$photoKey) {
                    Storage::disk('public')->delete($certificate->$photoKey);
                }
                $updateData[$photoKey] = $this->uploadAndOptimizeImage($request->file($photoKey), 'certificates');
            }
        }

        $extraPaths = $certificate->extra_photos ?: [];
        if ($request->hasFile('extra_photos')) {
            foreach ($request->file('extra_photos') as $file) {
                if ($file && $file->isValid()) {
                    $optPath = $this->uploadAndOptimizeImage($file, 'certificates');
                    if ($optPath) {
                        $extraPaths[] = $optPath;
                    }
                }
            }
            $updateData['extra_photos'] = $extraPaths;
        }

        $certificate->update($updateData);

        return response()->json([
            'success' => true,
            'message' => 'Documento N° ' . $certificate->certificate_number . ' actualizado correctamente.',
            'certificate' => $this->formatCertificateDetail($certificate),
        ]);
    }

    /**
     * Convert a quotation into an official SEC Certificate (Admin / Domingo Isain only).
     */
    public function convert(Request $request, $id)
    {
        $user = $request->user();
        if (! $user->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Solo Domingo Isain (Administrador / SEC Clase 3) tiene autorización para emitir Certificados Oficiales.',
            ], 403);
        }

        $certificate = Certificate::findOrFail($id);

        $certificate->update([
            'document_type' => 'certificado',
            'status' => 'emitido',
            'gasfiter_name' => 'Domingo Isain Plaza Caamaño',
            'gasfiter_rut' => '12.738.961-6',
            'gasfiter_sec_class' => 'Gasfiter Certificado Autorizado SEC Clase 3',
        ]);

        return response()->json([
            'success' => true,
            'message' => "Cotización N° {$certificate->certificate_number} convertida exitosamente a Certificado Oficial SEC.",
            'certificate' => $this->formatCertificateDetail($certificate),
        ]);
    }

    /**
     * Delete a certificate or quotation (Admin only).
     */
    public function destroy(Request $request, $id)
    {
        $user = $request->user();
        if (! $user->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Solo el Administrador puede eliminar certificados.',
            ], 403);
        }

        $certificate = Certificate::findOrFail($id);

        foreach (['photo_1', 'photo_2', 'photo_3'] as $photoKey) {
            if ($certificate->$photoKey) {
                Storage::disk('public')->delete($certificate->$photoKey);
            }
        }

        $num = $certificate->certificate_number;
        $certificate->delete();

        return response()->json([
            'success' => true,
            'message' => "Certificado N° {$num} eliminado correctamente.",
        ]);
    }

    /**
     * Format a summary item for fast list rendering.
     */
    private function formatCertificateSummary(Certificate $cert): array
    {
        return [
            'id' => $cert->id,
            'certificate_number' => $cert->certificate_number,
            'document_type' => $cert->document_type,
            'client_name' => $cert->client_name,
            'client_phone' => $cert->client_phone,
            'client_comuna' => $cert->client_comuna,
            'description' => $cert->description,
            'tax_type' => $cert->tax_type,
            'subtotal_neto' => (float)$cert->subtotal_neto,
            'tax_amount' => (float)$cert->tax_amount,
            'total_price' => (float)$cert->total_price,
            'formatted_total' => '$' . number_format($cert->total_price, 0, ',', '.'),
            'status' => $cert->status,
            'date' => $cert->date ? $cert->date->format('Y-m-d') : null,
            'created_at' => $cert->created_at->format('d/m/Y H:i'),
            'pdf_url' => route('certificates.pdf', $cert->id),
        ];
    }

    /**
     * Format full certificate detail with photos, WhatsApp link and items.
     */
    private function formatCertificateDetail(Certificate $cert): array
    {
        $baseUrl = url('/');
        $pdfUrl = route('certificates.pdf', $cert->id);

        $whatsappMessage = "Hola {$cert->client_name}, le compartimos su "
            . ($cert->document_type === 'certificado' ? 'Certificado Oficial SEC' : 'Cotización')
            . " N° {$cert->certificate_number} de SellafuGas®.\n\n"
            . "Puede visualizar y descargar su documento oficial en el siguiente enlace:\n{$pdfUrl}\n\n"
            . "SellafuGas® | Sellado de Fugas de Gas Sin Romper con Prodoral R6-1 · Domingo Isain Gasfiter SEC.";

        $cleanPhone = preg_replace('/[^0-9]/', '', $cert->client_phone ?? '');
        if (strlen($cleanPhone) === 9 && str_starts_with($cleanPhone, '9')) {
            $cleanPhone = '56' . $cleanPhone;
        } elseif (strlen($cleanPhone) === 8) {
            $cleanPhone = '56' . $cleanPhone;
        }
        $whatsappUrl = !empty($cleanPhone) 
            ? 'https://wa.me/' . $cleanPhone . '?text=' . urlencode($whatsappMessage) 
            : null;

        $photos = [
            'photo_1' => $cert->photo_1 ? asset('storage/' . $cert->photo_1) : null,
            'photo_2' => $cert->photo_2 ? asset('storage/' . $cert->photo_2) : null,
            'photo_3' => $cert->photo_3 ? asset('storage/' . $cert->photo_3) : null,
            'extra_photos' => !empty($cert->extra_photos) && is_array($cert->extra_photos) 
                ? array_map(fn($p) => asset('storage/' . $p), $cert->extra_photos) 
                : [],
        ];

        return [
            'id' => $cert->id,
            'certificate_number' => $cert->certificate_number,
            'document_type' => $cert->document_type,
            'date' => $cert->date ? $cert->date->format('Y-m-d') : null,
            'client_name' => $cert->client_name,
            'client_phone' => $cert->client_phone,
            'client_address' => $cert->client_address,
            'client_comuna' => $cert->client_comuna,
            'client_provincia' => $cert->client_provincia,
            'description' => $cert->description,
            'items' => $cert->items_list,
            'quantity' => $cert->quantity,
            'unit_price' => (float)$cert->unit_price,
            'subtotal_neto' => (float)$cert->subtotal_neto,
            'tax_type' => $cert->tax_type,
            'tax_amount' => (float)$cert->tax_amount,
            'total_price' => (float)$cert->total_price,
            'formatted_subtotal' => '$' . number_format($cert->subtotal_neto, 0, ',', '.'),
            'formatted_tax' => '$' . number_format($cert->tax_amount, 0, ',', '.'),
            'formatted_total' => '$' . number_format($cert->total_price, 0, ',', '.'),
            'work_details' => $cert->work_details,
            'gasfiter_name' => $cert->gasfiter_name,
            'gasfiter_rut' => $cert->gasfiter_rut,
            'gasfiter_sec_class' => $cert->gasfiter_sec_class,
            'status' => $cert->status,
            'notes' => $cert->notes,
            'photos' => $photos,
            'pdf_url' => $pdfUrl,
            'whatsapp_url' => $whatsappUrl,
            'whatsapp_text' => $whatsappMessage,
            'user' => $cert->user ? [
                'id' => $cert->user->id,
                'name' => $cert->user->name,
                'email' => $cert->user->email,
                'role' => $cert->user->role,
            ] : null,
            'created_at' => $cert->created_at->format('d/m/Y H:i'),
            'updated_at' => $cert->updated_at->format('d/m/Y H:i'),
        ];
    }

    /**
     * Auto-resizes and optimizes high-resolution mobile images.
     */
    private function uploadAndOptimizeImage($file, $path = 'certificates')
    {
        if (!$file || !$file->isValid()) return null;

        $filename = Str::random(40) . '.jpg';
        $storageDirectory = storage_path('app/public/' . $path);
        if (!file_exists($storageDirectory)) {
            mkdir($storageDirectory, 0755, true);
        }
        $fullPath = $storageDirectory . '/' . $filename;

        if (extension_loaded('gd')) {
            $info = @getimagesize($file->getRealPath());
            if ($info) {
                $mime = $info['mime'];
                $srcImg = null;
                if ($mime === 'image/jpeg' || $mime === 'image/jpg') {
                    $srcImg = @imagecreatefromjpeg($file->getRealPath());
                } elseif ($mime === 'image/png') {
                    $srcImg = @imagecreatefrompng($file->getRealPath());
                } elseif ($mime === 'image/webp') {
                    $srcImg = @imagecreatefromwebp($file->getRealPath());
                }

                if ($srcImg) {
                    $origW = imagesx($srcImg);
                    $origH = imagesy($srcImg);
                    $maxW = 1200;

                    if ($origW > $maxW) {
                        $newW = $maxW;
                        $newH = intval(($origH / $origW) * $newW);
                        $destImg = imagecreatetruecolor($newW, $newH);

                        if ($mime === 'image/png') {
                            imagealphablending($destImg, false);
                            imagesavealpha($destImg, true);
                        }

                        imagecopyresampled($destImg, $srcImg, 0, 0, 0, 0, $newW, $newH, $origW, $origH);
                        imagejpeg($destImg, $fullPath, 85);
                        imagedestroy($destImg);
                        imagedestroy($srcImg);
                        return $path . '/' . $filename;
                    } else {
                        imagejpeg($srcImg, $fullPath, 85);
                        imagedestroy($srcImg);
                        return $path . '/' . $filename;
                    }
                }
            }
        }

        return $file->store($path, 'public');
    }
}
