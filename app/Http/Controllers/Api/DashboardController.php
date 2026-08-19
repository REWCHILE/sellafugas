<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Get consolidated dashboard KPIs, metrics, and recent activities.
     */
    public function metrics(Request $request)
    {
        $user = $request->user();

        $query = Certificate::query();
        if ($user->isTechnician()) {
            $query->where('user_id', $user->id);
        }

        $totalCertificates = (clone $query)->where('document_type', 'certificado')->count();
        $totalQuotes = (clone $query)->where('document_type', 'cotizacion')->count();
        $totalDocuments = (clone $query)->count();

        $totalNetoAmount = (clone $query)->sum('subtotal_neto');
        $totalFacturasCount = (clone $query)->where('tax_type', 'factura')->count();
        $totalSinDocCount = (clone $query)->where('tax_type', 'neto')->count();
        $thisMonthCount = (clone $query)->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->count();
        $thisMonthNeto = (clone $query)->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->sum('subtotal_neto');

        // Status counts
        $statusCounts = [
            'emitido' => (clone $query)->where('status', 'emitido')->count(),
            'pendiente' => (clone $query)->where('status', 'pendiente')->count(),
            'completado' => (clone $query)->where('status', 'completado')->count(),
            'anulado' => (clone $query)->where('status', 'anulado')->count(),
        ];

        // Recent 5 documents
        $recentDocuments = (clone $query)->with('user', 'client')
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($doc) {
                return [
                    'id' => $doc->id,
                    'certificate_number' => $doc->certificate_number,
                    'document_type' => $doc->document_type,
                    'client_name' => $doc->client_name,
                    'client_comuna' => $doc->client_comuna,
                    'total_price' => (float)$doc->total_price,
                    'formatted_total' => '$' . number_format($doc->total_price, 0, ',', '.'),
                    'status' => $doc->status,
                    'date' => $doc->date ? $doc->date->format('Y-m-d') : null,
                    'created_at' => $doc->created_at->format('d/m/Y H:i'),
                ];
            });

        return response()->json([
            'success' => true,
            'metrics' => [
                'total_certificates' => $totalCertificates,
                'total_quotes' => $totalQuotes,
                'total_documents' => $totalDocuments,
                'total_neto_amount' => (float)$totalNetoAmount,
                'formatted_neto' => '$' . number_format($totalNetoAmount, 0, ',', '.'),
                'total_facturas_count' => $totalFacturasCount,
                'total_sin_doc_count' => $totalSinDocCount,
                'this_month_count' => $thisMonthCount,
                'this_month_neto' => (float)$thisMonthNeto,
                'formatted_month_neto' => '$' . number_format($thisMonthNeto, 0, ',', '.'),
                'status_counts' => $statusCounts,
            ],
            'recent_documents' => $recentDocuments,
        ]);
    }
}
