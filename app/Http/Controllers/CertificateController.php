<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class CertificateController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $query = Certificate::with('user', 'client')->latest();

        // If technician, filter by user unless admin
        if ($user->isTechnician()) {
            $query->where('user_id', $user->id);
        }

        // Search filter
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('certificate_number', 'like', "%{$search}%")
                  ->orWhere('client_name', 'like', "%{$search}%")
                  ->orWhere('client_address', 'like', "%{$search}%")
                  ->orWhere('client_phone', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Status filter
        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        $certificates = $query->paginate(15)->withQueryString();

        // Metrics calculations
        $metricsQuery = Certificate::query();
        if ($user->isTechnician()) {
            $metricsQuery->where('user_id', $user->id);
        }

        $totalCertificates = (clone $metricsQuery)->count();
        $totalNetoAmount = (clone $metricsQuery)->sum('subtotal_neto');
        $totalFacturasCount = (clone $metricsQuery)->where('tax_type', 'factura')->count();
        $totalSinDocCount = (clone $metricsQuery)->where('tax_type', 'neto')->count();
        $thisMonthCount = (clone $metricsQuery)->whereMonth('created_at', now()->month)->count();

        return view('certificates.index', compact(
            'certificates',
            'totalCertificates',
            'totalNetoAmount',
            'totalFacturasCount',
            'totalSinDocCount',
            'thisMonthCount'
        ));
    }

    public function create()
    {
        // Generate next certificate folio number
        $lastCert = Certificate::orderByRaw('CAST(certificate_number AS UNSIGNED) DESC')->first();
        $nextNumber = $lastCert ? intval($lastCert->certificate_number) + 1 : 14409;

        // Default SEC text template
        $defaultDetails = "Se realizó sellado de fuga de gas en red de 30 metros lineales.\n\nSe asegura hermeticidad de acuerdo al Decreto Supremo 66 Artículo 44.2.3 SEC. Se utilizó prodoral r6-1 sellante alemán para Fugas de Gas aceptado por SEC ds66 artículo 7: DIN EN 13090 Y NAG-203.\n\nSolucionado, garantía 3 años por efectos de sellado.\n\nPrueba de hermeticidad final a 368mmca estanco por 5 minutos, sin fugas\n\nResponsable Domingo Isain Plaza Caamaño Rut 12738961-6\nGasfiter Certificado Autorizado SEC Clase 3";

        return view('certificates.create', compact('nextNumber', 'defaultDetails'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'certificate_number' => 'required|unique:certificates,certificate_number',
            'date' => 'required|date',
            'client_name' => 'required|string|max:255',
            'client_phone' => 'nullable|string|max:100',
            'client_address' => 'nullable|string|max:255',
            'client_comuna' => 'nullable|string|max:100',
            'client_provincia' => 'nullable|string|max:100',
            'description' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'unit_price' => 'required|numeric|min:0',
            'tax_type' => 'required|in:neto,factura',
            'work_details' => 'nullable|string',
            'gasfiter_name' => 'required|string',
            'gasfiter_rut' => 'required|string',
            'gasfiter_sec_class' => 'required|string',
            'status' => 'required|in:emitido,pendiente,completado,anulado',
            'photo_1' => 'nullable|image|max:10240',
            'photo_2' => 'nullable|image|max:10240',
            'photo_3' => 'nullable|image|max:10240',
        ]);

        // Calculate totals
        $subtotal = $validated['quantity'] * $validated['unit_price'];
        $taxAmount = 0;
        if ($validated['tax_type'] === 'factura') {
            $taxAmount = round($subtotal * 0.19, 2);
        }
        $totalPrice = $subtotal + $taxAmount;

        // Auto-save or link Client catalog
        $client = Client::firstOrCreate(
            ['name' => $validated['client_name']],
            [
                'phone' => $validated['client_phone'],
                'address' => $validated['client_address'],
                'comuna' => $validated['client_comuna'],
                'provincia' => $validated['client_provincia'],
            ]
        );

        // Upload photos if provided
        $photoPaths = [];
        foreach (['photo_1', 'photo_2', 'photo_3'] as $photoKey) {
            if ($request->hasFile($photoKey)) {
                $photoPaths[$photoKey] = $request->file($photoKey)->store('certificates', 'public');
            } else {
                $photoPaths[$photoKey] = null;
            }
        }

        $certificate = Certificate::create([
            'certificate_number' => $validated['certificate_number'],
            'date' => $validated['date'],
            'user_id' => Auth::id(),
            'client_id' => $client->id,
            'client_name' => $validated['client_name'],
            'client_phone' => $validated['client_phone'],
            'client_address' => $validated['client_address'],
            'client_comuna' => $validated['client_comuna'],
            'client_provincia' => $validated['client_provincia'],
            'description' => $validated['description'],
            'quantity' => $validated['quantity'],
            'unit_price' => $validated['unit_price'],
            'subtotal_neto' => $subtotal,
            'tax_type' => $validated['tax_type'],
            'tax_amount' => $taxAmount,
            'total_price' => $totalPrice,
            'work_details' => $validated['work_details'],
            'gasfiter_name' => $validated['gasfiter_name'],
            'gasfiter_rut' => $validated['gasfiter_rut'],
            'gasfiter_sec_class' => $validated['gasfiter_sec_class'],
            'status' => $validated['status'],
            'photo_1' => $photoPaths['photo_1'],
            'photo_2' => $photoPaths['photo_2'],
            'photo_3' => $photoPaths['photo_3'],
        ]);

        return redirect()->route('certificates.show', $certificate->id)
            ->with('success', 'Certificado N° ' . $certificate->certificate_number . ' emitido exitosamente.');
    }

    public function show(Certificate $certificate)
    {
        // Check authorization
        $user = Auth::user();
        if ($user->isTechnician() && $certificate->user_id !== $user->id) {
            abort(403, 'No está autorizado para ver este certificado.');
        }

        return view('certificates.show', compact('certificate'));
    }

    public function edit(Certificate $certificate)
    {
        $user = Auth::user();
        if ($user->isTechnician() && $certificate->user_id !== $user->id) {
            abort(403, 'No está autorizado para editar este certificado.');
        }

        return view('certificates.edit', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $user = Auth::user();
        if ($user->isTechnician() && $certificate->user_id !== $user->id) {
            abort(403, 'No está autorizado para modificar este certificado.');
        }

        $validated = $request->validate([
            'certificate_number' => 'required|unique:certificates,certificate_number,' . $certificate->id,
            'date' => 'required|date',
            'client_name' => 'required|string|max:255',
            'client_phone' => 'nullable|string|max:100',
            'client_address' => 'nullable|string|max:255',
            'client_comuna' => 'nullable|string|max:100',
            'client_provincia' => 'nullable|string|max:100',
            'description' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'unit_price' => 'required|numeric|min:0',
            'tax_type' => 'required|in:neto,factura',
            'work_details' => 'nullable|string',
            'gasfiter_name' => 'required|string',
            'gasfiter_rut' => 'required|string',
            'gasfiter_sec_class' => 'required|string',
            'status' => 'required|in:emitido,pendiente,completado,anulado',
            'photo_1' => 'nullable|image|max:10240',
            'photo_2' => 'nullable|image|max:10240',
            'photo_3' => 'nullable|image|max:10240',
        ]);

        $subtotal = $validated['quantity'] * $validated['unit_price'];
        $taxAmount = 0;
        if ($validated['tax_type'] === 'factura') {
            $taxAmount = round($subtotal * 0.19, 2);
        }
        $totalPrice = $subtotal + $taxAmount;

        $updateData = [
            'certificate_number' => $validated['certificate_number'],
            'date' => $validated['date'],
            'client_name' => $validated['client_name'],
            'client_phone' => $validated['client_phone'],
            'client_address' => $validated['client_address'],
            'client_comuna' => $validated['client_comuna'],
            'client_provincia' => $validated['client_provincia'],
            'description' => $validated['description'],
            'quantity' => $validated['quantity'],
            'unit_price' => $validated['unit_price'],
            'subtotal_neto' => $subtotal,
            'tax_type' => $validated['tax_type'],
            'tax_amount' => $taxAmount,
            'total_price' => $totalPrice,
            'work_details' => $validated['work_details'],
            'gasfiter_name' => $validated['gasfiter_name'],
            'gasfiter_rut' => $validated['gasfiter_rut'],
            'gasfiter_sec_class' => $validated['gasfiter_sec_class'],
            'status' => $validated['status'],
        ];

        foreach (['photo_1', 'photo_2', 'photo_3'] as $photoKey) {
            if ($request->hasFile($photoKey)) {
                if ($certificate->$photoKey) {
                    Storage::disk('public')->delete($certificate->$photoKey);
                }
                $updateData[$photoKey] = $request->file($photoKey)->store('certificates', 'public');
            }
        }

        $certificate->update($updateData);

        return redirect()->route('certificates.show', $certificate->id)
            ->with('success', 'Certificado actualizado correctamente.');
    }

    public function destroy(Certificate $certificate)
    {
        $user = Auth::user();
        if (! $user->isAdmin()) {
            abort(403, 'Solo el Administrador Domingo Isain puede eliminar certificados.');
        }

        foreach (['photo_1', 'photo_2', 'photo_3'] as $photoKey) {
            if ($certificate->$photoKey) {
                Storage::disk('public')->delete($certificate->$photoKey);
            }
        }

        $number = $certificate->certificate_number;
        $certificate->delete();

        return redirect()->route('certificates.index')
            ->with('success', "Certificado N° {$number} eliminado.");
    }

    public function downloadPdf(Certificate $certificate)
    {
        // Prepare base64 images for DomPDF embedding
        $logoBase64 = $this->getImageBase64(public_path('images/instalgaschile-logitpo.png'));
        $secLogoBase64 = $this->getImageBase64(public_path('images/logotipo-sec.png'));
        $secQrBase64 = $certificate->photo_2 
            ? $this->getImageBase64(storage_path('app/public/' . $certificate->photo_2))
            : $this->getImageBase64(public_path('images/domingo-isain-gasfiter-sec-qr.png'));
        $holdingLogoBase64 = $this->getImageBase64(public_path('images/logotipo-holding.png'));
        $firmaBase64 = $this->getImageBase64(public_path('images/firma-domingo.png'));

        $photo1Base64 = $certificate->photo_1 ? $this->getImageBase64(storage_path('app/public/' . $certificate->photo_1)) : null;
        $photo3Base64 = $certificate->photo_3 ? $this->getImageBase64(storage_path('app/public/' . $certificate->photo_3)) : null;

        $pdf = Pdf::loadView('certificates.pdf', compact(
            'certificate',
            'logoBase64',
            'secLogoBase64',
            'secQrBase64',
            'holdingLogoBase64',
            'firmaBase64',
            'photo1Base64',
            'photo3Base64'
        ));

        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream("Certificado_Servicio_{$certificate->certificate_number}.pdf");
    }

    private function getImageBase64($path)
    {
        if (file_exists($path)) {
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            return 'data:image/' . $type . ';base64,' . base64_encode($data);
        }
        return '';
    }
}
