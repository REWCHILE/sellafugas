class CertificateItem {
  final String description;
  final int quantity;
  final double unitPrice;
  final double total;

  CertificateItem({
    required this.description,
    required this.quantity,
    required this.unitPrice,
    required this.total,
  });

  factory CertificateItem.fromJson(Map<String, dynamic> json) {
    final qty = json['quantity'] is int 
        ? json['quantity'] 
        : int.tryParse(json['quantity']?.toString() ?? '1') ?? 1;
    final price = json['unit_price'] is num 
        ? (json['unit_price'] as num).toDouble() 
        : double.tryParse(json['unit_price']?.toString() ?? '0') ?? 0.0;
    final tot = json['total'] is num 
        ? (json['total'] as num).toDouble() 
        : double.tryParse(json['total']?.toString() ?? '0') ?? (qty * price);

    return CertificateItem(
      description: json['description'] ?? '',
      quantity: qty,
      unitPrice: price,
      total: tot,
    );
  }

  Map<String, dynamic> toJson() {
    return {
      'description': description,
      'quantity': quantity,
      'unit_price': unitPrice,
      'total': total,
    };
  }
}

class CertificateModel {
  final int id;
  final String certificateNumber;
  final String documentType; // 'certificado' or 'cotizacion'
  final String? date;
  final String clientName;
  final String? clientPhone;
  final String? clientAddress;
  final String? clientComuna;
  final String? clientProvincia;
  final String? description;
  final List<CertificateItem> items;
  final int quantity;
  final double unitPrice;
  final double subtotalNeto;
  final String taxType; // 'neto' or 'factura'
  final double taxAmount;
  final double totalPrice;
  final String? formattedSubtotal;
  final String? formattedTax;
  final String? formattedTotal;
  final String? workDetails;
  final String? gasfiterName;
  final String? gasfiterRut;
  final String? gasfiterSecClass;
  final String status; // 'emitido', 'pendiente', 'completado', 'anulado'
  final String? notes;
  final Map<String, dynamic>? photos;
  final String? pdfUrl;
  final String? whatsappUrl;
  final String? whatsappText;
  final Map<String, dynamic>? user;
  final String? createdAt;
  final String? updatedAt;

  CertificateModel({
    required this.id,
    required this.certificateNumber,
    required this.documentType,
    this.date,
    required this.clientName,
    this.clientPhone,
    this.clientAddress,
    this.clientComuna,
    this.clientProvincia,
    this.description,
    this.items = const [],
    this.quantity = 1,
    this.unitPrice = 0.0,
    this.subtotalNeto = 0.0,
    this.taxType = 'neto',
    this.taxAmount = 0.0,
    this.totalPrice = 0.0,
    this.formattedSubtotal,
    this.formattedTax,
    this.formattedTotal,
    this.workDetails,
    this.gasfiterName,
    this.gasfiterRut,
    this.gasfiterSecClass,
    required this.status,
    this.notes,
    this.photos,
    this.pdfUrl,
    this.whatsappUrl,
    this.whatsappText,
    this.user,
    this.createdAt,
    this.updatedAt,
  });

  bool get isCertificate => documentType == 'certificado';
  bool get isQuotation => documentType == 'cotizacion';

  factory CertificateModel.fromJson(Map<String, dynamic> json) {
    List<CertificateItem> itemsList = [];
    if (json['items'] != null && json['items'] is List) {
      itemsList = (json['items'] as List)
          .map((i) => CertificateItem.fromJson(i as Map<String, dynamic>))
          .toList();
    }

    return CertificateModel(
      id: json['id'] is int ? json['id'] : int.tryParse(json['id'].toString()) ?? 0,
      certificateNumber: json['certificate_number']?.toString() ?? '',
      documentType: json['document_type'] ?? 'certificado',
      date: json['date'],
      clientName: json['client_name'] ?? '',
      clientPhone: json['client_phone'],
      clientAddress: json['client_address'],
      clientComuna: json['client_comuna'],
      clientProvincia: json['client_provincia'],
      description: json['description'],
      items: itemsList,
      quantity: json['quantity'] is int 
          ? json['quantity'] 
          : int.tryParse(json['quantity']?.toString() ?? '1') ?? 1,
      unitPrice: json['unit_price'] is num 
          ? (json['unit_price'] as num).toDouble() 
          : double.tryParse(json['unit_price']?.toString() ?? '0') ?? 0.0,
      subtotalNeto: json['subtotal_neto'] is num 
          ? (json['subtotal_neto'] as num).toDouble() 
          : double.tryParse(json['subtotal_neto']?.toString() ?? '0') ?? 0.0,
      taxType: json['tax_type'] ?? 'neto',
      taxAmount: json['tax_amount'] is num 
          ? (json['tax_amount'] as num).toDouble() 
          : double.tryParse(json['tax_amount']?.toString() ?? '0') ?? 0.0,
      totalPrice: json['total_price'] is num 
          ? (json['total_price'] as num).toDouble() 
          : double.tryParse(json['total_price']?.toString() ?? '0') ?? 0.0,
      formattedSubtotal: json['formatted_subtotal'],
      formattedTax: json['formatted_tax'],
      formattedTotal: json['formatted_total'],
      workDetails: json['work_details'],
      gasfiterName: json['gasfiter_name'],
      gasfiterRut: json['gasfiter_rut'],
      gasfiterSecClass: json['gasfiter_sec_class'],
      status: json['status'] ?? 'emitido',
      notes: json['notes'],
      photos: json['photos'] is Map<String, dynamic> ? json['photos'] : null,
      pdfUrl: json['pdf_url'],
      whatsappUrl: json['whatsapp_url'],
      whatsappText: json['whatsapp_text'],
      user: json['user'] is Map<String, dynamic> ? json['user'] : null,
      createdAt: json['created_at'],
      updatedAt: json['updated_at'],
    );
  }
}
