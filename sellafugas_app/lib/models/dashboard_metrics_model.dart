class DashboardMetricsModel {
  final int totalCertificates;
  final int totalQuotes;
  final int totalDocuments;
  final double totalNetoAmount;
  final String formattedNeto;
  final int totalFacturasCount;
  final int totalSinDocCount;
  final int thisMonthCount;
  final double thisMonthNeto;
  final String formattedMonthNeto;
  final Map<String, int> statusCounts;

  DashboardMetricsModel({
    required this.totalCertificates,
    required this.totalQuotes,
    required this.totalDocuments,
    required this.totalNetoAmount,
    required this.formattedNeto,
    required this.totalFacturasCount,
    required this.totalSinDocCount,
    required this.thisMonthCount,
    required this.thisMonthNeto,
    required this.formattedMonthNeto,
    required this.statusCounts,
  });

  factory DashboardMetricsModel.fromJson(Map<String, dynamic> json) {
    Map<String, int> statuses = {};
    if (json['status_counts'] != null && json['status_counts'] is Map) {
      json['status_counts'].forEach((k, v) {
        statuses[k.toString()] = int.tryParse(v.toString()) ?? 0;
      });
    }

    return DashboardMetricsModel(
      totalCertificates: int.tryParse(json['total_certificates']?.toString() ?? '0') ?? 0,
      totalQuotes: int.tryParse(json['total_quotes']?.toString() ?? '0') ?? 0,
      totalDocuments: int.tryParse(json['total_documents']?.toString() ?? '0') ?? 0,
      totalNetoAmount: double.tryParse(json['total_neto_amount']?.toString() ?? '0') ?? 0.0,
      formattedNeto: json['formatted_neto'] ?? '\$0',
      totalFacturasCount: int.tryParse(json['total_facturas_count']?.toString() ?? '0') ?? 0,
      totalSinDocCount: int.tryParse(json['total_sin_doc_count']?.toString() ?? '0') ?? 0,
      thisMonthCount: int.tryParse(json['this_month_count']?.toString() ?? '0') ?? 0,
      thisMonthNeto: double.tryParse(json['this_month_neto']?.toString() ?? '0') ?? 0.0,
      formattedMonthNeto: json['formatted_month_neto'] ?? '\$0',
      statusCounts: statuses,
    );
  }
}
