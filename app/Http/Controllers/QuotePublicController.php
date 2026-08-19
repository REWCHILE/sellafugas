<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuotePublicController extends Controller
{
    /**
     * Calculate quote in real-time or via API
     */
    public function calculate(Request $request)
    {
        $metros = max(1, intval($request->input('metros', 10)));
        $zone = $request->input('zone', 'rm'); // 'rm', 'v_vi', 'otras'
        $taxType = $request->input('tax_type', 'neto'); // 'neto' or 'factura'

        $pricing = $this->computePrice($metros, $zone, $taxType);

        return response()->json([
            'success' => true,
            'pricing' => $pricing,
        ]);
    }

    /**
     * Store public quotation submitted from website
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'metros' => 'required|numeric|min:1|max:500',
            'zone' => 'required|in:rm,v_vi,otras',
            'region' => 'nullable|string|max:150',
            'provincia' => 'nullable|string|max:150',
            'comuna' => 'required|string|max:150',
            'direccion' => 'nullable|string|max:255',
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:100',
            'email' => 'nullable|email|max:255',
            'detalles' => 'nullable|string|max:1000',
            'tax_type' => 'nullable|in:neto,factura',
        ]);

        $metros = floatval($validated['metros']);
        $zone = $validated['zone'];
        $taxType = $validated['tax_type'] ?? 'neto';

        $pricing = $this->computePrice($metros, $zone, $taxType);

        // Get Domingo or default Admin user
        $adminUser = User::where('email', 'domi@sellafugas.cl')
            ->orWhere('email', 'domi@instalgaschile.cl')
            ->orWhere('role', 'admin')
            ->first();
        $adminUserId = $adminUser ? $adminUser->id : 1;

        // Auto find or create client
        $client = Client::firstOrCreate(
            ['name' => $validated['nombre']],
            [
                'phone' => $validated['telefono'],
                'email' => $validated['email'] ?? null,
                'address' => $validated['direccion'] ?? 'Por confirmar',
                'comuna' => $validated['comuna'],
                'provincia' => $validated['provincia'] ?? ($zone === 'rm' ? 'Santiago' : $validated['comuna']),
            ]
        );

        // Generate next Folio number (starting from 257830)
        $lastCert = Certificate::orderByRaw('CAST(certificate_number AS UNSIGNED) DESC')->first();
        $nextNumber = ($lastCert && intval($lastCert->certificate_number) >= 257830) 
            ? intval($lastCert->certificate_number) + 1 
            : 257830;

        $zoneLabel = match($zone) {
            'rm' => 'Santiago (Región Metropolitana)',
            'v_vi' => 'Quinta y Sexta Región (Valparaíso / O\'Higgins)',
            default => 'Otras Regiones Cercanas',
        };

        // Items breakdown
        $items = [];
        $items[] = [
            'description' => "Sellado de Fuga de Gas con Prodoral R6-1 en red interior no visible (Base hasta 10 metros lineales, Ø máx 1¼\") - {$zoneLabel}",
            'quantity' => 1,
            'unit_price' => $pricing['base_price'],
        ];

        if ($pricing['extra_meters'] > 0) {
            $items[] = [
                'description' => "Metros lineales adicionales de cañería ({$pricing['extra_meters']} m a $" . number_format($pricing['extra_meter_price'], 0, ',', '.') . " c/u)",
                'quantity' => $pricing['extra_meters'],
                'unit_price' => $pricing['extra_meter_price'],
            ];
        }

        $workDetails = "Se oferta sellado de fuga de gas en red de {$metros} metros lineales aproximadamente.\n\n" .
            "Se asegura hermeticidad de acuerdo al Decreto Supremo 66 Artículo 44.2.3 SEC no importa si es una o más fugas. Se utilizará prodoral r6-1 sellante alemán para Fugas de Gas aceptado por SEC ds66 artículo 7: DIN EN 13090 Y NAG-203.\n\n" .
            "En procedimiento necesitamos desconectar artefactos y medidor para realizar la inyección, necesitamos provisión de electricidad y acceso libre a su domicilio y medidor (o regulador ) mientras dure el procedimiento.\n\n" .
            "Tiempo de ejecución 2 horas aproximadamente, se entrega certificado de servicio realizado, garantía 3 años por efectos de sellado.\n" .
            "Se solicita pago contado una vez realizado el trabajo.\n\n" .
            (!empty($validated['detalles']) ? "Observaciones del cliente: {$validated['detalles']}\n\n" : "") .
            "Responsable Domingo Isain Plaza Caamaño Rut 12738961-6\n" .
            "Gasfiter Certificado Autorizado SEC Clase 3";

        $quote = Certificate::create([
            'certificate_number' => (string)$nextNumber,
            'document_type' => 'cotizacion',
            'date' => now()->toDateString(),
            'user_id' => $adminUserId,
            'client_id' => $client->id,
            'client_name' => $validated['nombre'],
            'client_phone' => $validated['telefono'],
            'client_address' => $validated['direccion'] ?? 'Por confirmar',
            'client_comuna' => $validated['comuna'],
            'client_provincia' => $validated['provincia'] ?? ($zone === 'rm' ? 'Santiago' : $validated['comuna']),
            'description' => "Cotización Sellado Fuga de Gas Prodoral ({$metros}m lineales) - {$validated['comuna']}",
            'items' => $items,
            'quantity' => 1,
            'unit_price' => $pricing['subtotal_neto'],
            'subtotal_neto' => $pricing['subtotal_neto'],
            'tax_type' => $taxType,
            'tax_amount' => $pricing['tax_amount'],
            'total_price' => $pricing['total_price'],
            'work_details' => $workDetails,
            'gasfiter_name' => 'Domingo Isain Plaza Caamaño',
            'gasfiter_rut' => '12.738.961-6',
            'gasfiter_sec_class' => 'Gasfiter Certificado Autorizado SEC Clase 3',
            'status' => 'pendiente',
            'notes' => 'Cotización generada automáticamente desde formulario web Sellafugas.cl',
        ]);

        // Build WhatsApp URL
        $whatsappMessage = "Hola Domingo Isain (SellafuGas), acabo de cotizar en sellafugas.cl:\n\n" .
            "📋 *Cotización N° {$quote->certificate_number}*\n" .
            "👤 *Nombre:* {$validated['nombre']}\n" .
            "📍 *Comuna:* {$validated['comuna']}" . ($validated['direccion'] ? " ({$validated['direccion']})" : "") . "\n" .
            "📏 *Metros lineales:* {$metros} metros\n" .
            "💰 *Total Estimado:* $" . number_format($pricing['total_price'], 0, ',', '.') . " " . ($taxType === 'factura' ? '(IVA Incluido)' : 'Neto') . "\n" .
            "🛡️ *Incluye:* Sellado Prodoral R6-1 sin romper + Pruebas de Hermeticidad + Certificado SEC + 3 Años Garantía.\n" .
            ($validated['detalles'] ? "📝 *Detalle:* {$validated['detalles']}\n" : "") .
            "\n¿Tiene disponibilidad para coordinar la visita?";

        $whatsappUrl = "https://api.whatsapp.com/send?phone=56949877316&text=" . urlencode($whatsappMessage);

        return response()->json([
            'success' => true,
            'quote_id' => $quote->id,
            'folio' => $quote->certificate_number,
            'pricing' => $pricing,
            'whatsapp_url' => $whatsappUrl,
            'client_name' => $validated['nombre'],
            'comuna' => $validated['comuna'],
            'metros' => $metros,
            'message' => 'Cotización registrada con éxito.',
        ]);
    }

    /**
     * Compute price helper
     */
    private function computePrice(float $metros, string $zone, string $taxType): array
    {
        // Pricing Rules:
        // RM: Base $300.000 neto (hasta 10m), $25.000 / metro adicional
        // V / VI: Base $350.000 neto (hasta 10m), $30.000 / metro adicional
        // Otras: Base $400.000 neto (hasta 10m), $35.000 / metro adicional
        $basePrice = 300000;
        $extraMeterPrice = 25000;

        if ($zone === 'v_vi') {
            $basePrice = 350000;
            $extraMeterPrice = 30000;
        } elseif ($zone === 'otras') {
            $basePrice = 400000;
            $extraMeterPrice = 35000;
        }

        $baseMeters = 10;
        $extraMeters = max(0, $metros - $baseMeters);
        $subtotalNeto = $basePrice + ($extraMeters * $extraMeterPrice);
        $taxAmount = ($taxType === 'factura') ? round($subtotalNeto * 0.19) : 0;
        $totalPrice = $subtotalNeto + $taxAmount;

        return [
            'metros' => $metros,
            'base_meters' => min($metros, $baseMeters),
            'extra_meters' => $extraMeters,
            'base_price' => $basePrice,
            'extra_meter_price' => $extraMeterPrice,
            'subtotal_neto' => $subtotalNeto,
            'tax_type' => $taxType,
            'tax_amount' => $taxAmount,
            'total_price' => $totalPrice,
            'formatted_subtotal' => '$' . number_format($subtotalNeto, 0, ',', '.'),
            'formatted_tax' => '$' . number_format($taxAmount, 0, ',', '.'),
            'formatted_total' => '$' . number_format($totalPrice, 0, ',', '.'),
        ];
    }
}
