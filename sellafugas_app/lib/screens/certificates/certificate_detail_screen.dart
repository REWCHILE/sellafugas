import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:url_launcher/url_launcher.dart';
import 'package:cached_network_image/cached_network_image.dart';
import '../../core/constants/app_colors.dart';
import '../../models/certificate_model.dart';
import '../../providers/auth_provider.dart';
import '../../providers/certificate_provider.dart';
import 'certificate_form_screen.dart';

class CertificateDetailScreen extends StatefulWidget {
  final int certificateId;
  const CertificateDetailScreen({super.key, required this.certificateId});

  @override
  State<CertificateDetailScreen> createState() => _CertificateDetailScreenState();
}

class _CertificateDetailScreenState extends State<CertificateDetailScreen> {
  CertificateModel? _cert;
  bool _isLoading = true;

  @override
  void initState() {
    super.initState();
    _loadDetail();
  }

  Future<void> _loadDetail() async {
    setState(() => _isLoading = true);
    final provider = Provider.of<CertificateProvider>(context, listen: false);
    final cert = await provider.getCertificateDetail(widget.certificateId);
    if (mounted) {
      setState(() {
        _cert = cert;
        _isLoading = false;
      });
    }
  }

  Future<void> _launchUrl(String url) async {
    final uri = Uri.parse(url);
    if (await canLaunchUrl(uri)) {
      await launchUrl(uri, mode: LaunchMode.externalApplication);
    }
  }

  Future<void> _callPhone(String phone) async {
    final clean = phone.replaceAll(RegExp(r'[^0-9+]'), '');
    final uri = Uri.parse('tel:$clean');
    if (await canLaunchUrl(uri)) {
      await launchUrl(uri);
    }
  }

  Future<void> _shareWhatsApp() async {
    if (_cert?.whatsappUrl != null) {
      await _launchUrl(_cert!.whatsappUrl!);
    }
  }

  Future<void> _convertToOfficialCert() async {
    final confirmed = await showDialog<bool>(
      context: context,
      builder: (ctx) => AlertDialog(
        backgroundColor: AppColors.surfaceDark,
        shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(16)),
        title: const Text('Convertir a Certificado SEC Oficial', style: TextStyle(fontWeight: FontWeight.bold)),
        content: const Text(
          '¿Desea convertir esta cotización a un Certificado Oficial SEC emitido por Domingo Isain (SEC Clase 3)?',
        ),
        actions: [
          TextButton(onPressed: () => Navigator.pop(ctx, false), child: const Text('Cancelar')),
          ElevatedButton(
            style: ElevatedButton.styleFrom(backgroundColor: AppColors.success),
            onPressed: () => Navigator.pop(ctx, true),
            child: const Text('Convertir a Certificado'),
          ),
        ],
      ),
    );

    if (confirmed == true && mounted) {
      final provider = Provider.of<CertificateProvider>(context, listen: false);
      final success = await provider.convertToCertificate(widget.certificateId);
      if (success) {
        ScaffoldMessenger.of(context).showSnackBar(
          const SnackBar(
            content: Text('¡Cotización convertida a Certificado Oficial exitosamente!'),
            backgroundColor: AppColors.success,
          ),
        );
        _loadDetail();
      }
    }
  }

  Future<void> _deleteDocument() async {
    final confirmed = await showDialog<bool>(
      context: context,
      builder: (ctx) => AlertDialog(
        backgroundColor: AppColors.surfaceDark,
        shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(16)),
        title: const Text('Eliminar Documento', style: TextStyle(fontWeight: FontWeight.bold, color: AppColors.danger)),
        content: Text('¿Está seguro de que desea eliminar el documento N° ${_cert?.certificateNumber}? Esta acción no se puede deshacer.'),
        actions: [
          TextButton(onPressed: () => Navigator.pop(ctx, false), child: const Text('Cancelar')),
          ElevatedButton(
            style: ElevatedButton.styleFrom(backgroundColor: AppColors.danger),
            onPressed: () => Navigator.pop(ctx, true),
            child: const Text('Eliminar Definitivamente'),
          ),
        ],
      ),
    );

    if (confirmed == true && mounted) {
      final provider = Provider.of<CertificateProvider>(context, listen: false);
      final success = await provider.deleteCertificate(widget.certificateId);
      if (success && mounted) {
        Navigator.pop(context);
        ScaffoldMessenger.of(context).showSnackBar(
          const SnackBar(content: Text('Documento eliminado correctamente')),
        );
      }
    }
  }

  @override
  Widget build(BuildContext context) {
    final auth = Provider.of<AuthProvider>(context);
    final isAdmin = auth.isAdmin;

    if (_isLoading || _cert == null) {
      return Scaffold(
        backgroundColor: AppColors.backgroundDark,
        appBar: AppBar(title: const Text('Cargando documento...')),
        body: const Center(child: CircularProgressIndicator(color: AppColors.primary)),
      );
    }

    final cert = _cert!;
    final isCert = cert.isCertificate;

    return Scaffold(
      backgroundColor: AppColors.backgroundDark,
      appBar: AppBar(
        title: Text(
          '${isCert ? "Certificado SEC" : "Cotización"} N° ${cert.certificateNumber}',
          style: const TextStyle(fontSize: 16, fontWeight: FontWeight.bold),
        ),
        actions: [
          IconButton(
            icon: const Icon(Icons.edit_outlined),
            tooltip: 'Editar Documento',
            onPressed: () async {
              await Navigator.of(context).push(
                MaterialPageRoute(
                  builder: (_) => CertificateFormScreen(certificate: cert),
                ),
              );
              _loadDetail();
            },
          ),
          if (isAdmin)
            IconButton(
              icon: const Icon(Icons.delete_outline_rounded, color: AppColors.danger),
              tooltip: 'Eliminar',
              onPressed: _deleteDocument,
            ),
        ],
      ),
      bottomNavigationBar: Container(
        padding: const EdgeInsets.symmetric(horizontal: 16, vertical: 12),
        decoration: const BoxDecoration(
          color: AppColors.surfaceDark,
          border: Border(top: BorderSide(color: AppColors.borderDark)),
        ),
        child: Row(
          children: [
            // WhatsApp Share Button
            Expanded(
              child: ElevatedButton.icon(
                style: ElevatedButton.styleFrom(
                  backgroundColor: AppColors.whatsapp,
                  padding: const EdgeInsets.symmetric(vertical: 14),
                ),
                icon: const Icon(Icons.chat_bubble_outline_rounded, size: 20, color: Colors.white),
                label: const Text(
                  'WhatsApp',
                  style: TextStyle(fontSize: 14, fontWeight: FontWeight.bold, color: Colors.white),
                ),
                onPressed: _shareWhatsApp,
              ),
            ),
            const SizedBox(width: 10),
            // View PDF Button
            Expanded(
              child: ElevatedButton.icon(
                style: ElevatedButton.styleFrom(
                  backgroundColor: AppColors.primary,
                  padding: const EdgeInsets.symmetric(vertical: 14),
                ),
                icon: const Icon(Icons.picture_as_pdf_rounded, size: 20, color: Colors.white),
                label: const Text(
                  'Ver PDF',
                  style: TextStyle(fontSize: 14, fontWeight: FontWeight.bold, color: Colors.white),
                ),
                onPressed: () {
                  if (cert.pdfUrl != null) {
                    _launchUrl(cert.pdfUrl!);
                  }
                },
              ),
            ),
          ],
        ),
      ),
      body: SingleChildScrollView(
        padding: const EdgeInsets.all(16),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            // Convert to SEC Certificate Banner (if quotation & admin)
            if (cert.isQuotation && isAdmin) ...[
              Container(
                padding: const EdgeInsets.all(16),
                decoration: BoxDecoration(
                  color: AppColors.warning.withOpacity(0.15),
                  borderRadius: BorderRadius.circular(16),
                  border: Border.all(color: AppColors.warning.withOpacity(0.4)),
                ),
                child: Row(
                  children: [
                    const Icon(Icons.star_rounded, color: AppColors.warning, size: 32),
                    const SizedBox(width: 12),
                    const Expanded(
                      child: Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          Text('Cotización Aprobada', style: TextStyle(fontWeight: FontWeight.bold, color: Colors.white)),
                          SizedBox(height: 2),
                          Text('Conviértala en Certificado SEC Oficial con 1 toque.', style: TextStyle(fontSize: 12, color: AppColors.textSecondaryDark)),
                        ],
                      ),
                    ),
                    ElevatedButton(
                      style: ElevatedButton.styleFrom(
                        backgroundColor: AppColors.warning,
                        foregroundColor: Colors.black,
                        padding: const EdgeInsets.symmetric(horizontal: 14, vertical: 8),
                      ),
                      onPressed: _convertToOfficialCert,
                      child: const Text('Convertir', style: TextStyle(fontWeight: FontWeight.bold, fontSize: 12)),
                    ),
                  ],
                ),
              ),
              const SizedBox(height: 16),
            ],

            // Status & Header Card
            Container(
              padding: const EdgeInsets.all(18),
              decoration: BoxDecoration(
                color: AppColors.surfaceDark,
                borderRadius: BorderRadius.circular(16),
                border: Border.all(color: AppColors.borderDark),
              ),
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  Row(
                    mainAxisAlignment: MainAxisAlignment.spaceBetween,
                    children: [
                      Container(
                        padding: const EdgeInsets.symmetric(horizontal: 10, vertical: 5),
                        decoration: BoxDecoration(
                          color: isCert ? AppColors.success.withOpacity(0.2) : AppColors.warning.withOpacity(0.2),
                          borderRadius: BorderRadius.circular(8),
                        ),
                        child: Text(
                          isCert ? 'CERTIFICADO OFICIAL SEC' : 'COTIZACIÓN DE SERVICIO',
                          style: TextStyle(
                            fontSize: 12,
                            fontWeight: FontWeight.bold,
                            color: isCert ? AppColors.success : AppColors.warning,
                          ),
                        ),
                      ),
                      Container(
                        padding: const EdgeInsets.symmetric(horizontal: 10, vertical: 4),
                        decoration: BoxDecoration(
                          color: AppColors.backgroundDark,
                          borderRadius: BorderRadius.circular(6),
                        ),
                        child: Text(
                          cert.status.toUpperCase(),
                          style: TextStyle(
                            fontSize: 11,
                            fontWeight: FontWeight.bold,
                            color: cert.status == 'emitido' ? AppColors.success : AppColors.warning,
                          ),
                        ),
                      ),
                    ],
                  ),
                  const SizedBox(height: 14),
                  Row(
                    mainAxisAlignment: MainAxisAlignment.spaceBetween,
                    children: [
                      Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          const Text('FOLIO N°', style: TextStyle(fontSize: 11, color: AppColors.textMutedDark)),
                          Text(
                            cert.certificateNumber,
                            style: const TextStyle(fontSize: 24, fontWeight: FontWeight.w900, color: Colors.white),
                          ),
                        ],
                      ),
                      Column(
                        crossAxisAlignment: CrossAxisAlignment.end,
                        children: [
                          const Text('FECHA', style: TextStyle(fontSize: 11, color: AppColors.textMutedDark)),
                          Text(
                            cert.date ?? cert.createdAt ?? '',
                            style: const TextStyle(fontSize: 14, fontWeight: FontWeight.w600, color: Colors.white),
                          ),
                        ],
                      ),
                    ],
                  ),
                ],
              ),
            ),
            const SizedBox(height: 16),

            // Client Info Card
            _buildSectionHeader('Datos del Cliente', Icons.person_outline_rounded),
            const SizedBox(height: 8),
            Container(
              padding: const EdgeInsets.all(16),
              decoration: BoxDecoration(
                color: AppColors.surfaceDark,
                borderRadius: BorderRadius.circular(16),
                border: Border.all(color: AppColors.borderDark),
              ),
              child: Column(
                children: [
                  _buildInfoRow('Nombre', cert.clientName, isBold: true),
                  if (cert.clientPhone != null && cert.clientPhone!.isNotEmpty) ...[
                    const Divider(color: AppColors.borderDark, height: 20),
                    Row(
                      mainAxisAlignment: MainAxisAlignment.spaceBetween,
                      children: [
                        const Text('Teléfono', style: TextStyle(color: AppColors.textSecondaryDark, fontSize: 13)),
                        Row(
                          children: [
                            Text(cert.clientPhone!, style: const TextStyle(color: Colors.white, fontWeight: FontWeight.w600, fontSize: 13)),
                            const SizedBox(width: 8),
                            IconButton(
                              icon: const Icon(Icons.phone, color: AppColors.primary, size: 18),
                              onPressed: () => _callPhone(cert.clientPhone!),
                              padding: EdgeInsets.zero,
                              constraints: const BoxConstraints(),
                            ),
                          ],
                        ),
                      ],
                    ),
                  ],
                  if (cert.clientAddress != null && cert.clientAddress!.isNotEmpty) ...[
                    const Divider(color: AppColors.borderDark, height: 20),
                    _buildInfoRow('Dirección', cert.clientAddress!),
                  ],
                  if (cert.clientComuna != null && cert.clientComuna!.isNotEmpty) ...[
                    const Divider(color: AppColors.borderDark, height: 20),
                    _buildInfoRow('Comuna / Región', '${cert.clientComuna} · ${cert.clientProvincia ?? "Santiago"}'),
                  ],
                ],
              ),
            ),
            const SizedBox(height: 16),

            // Items Breakdown Table
            _buildSectionHeader('Detalle de Trabajos y Valores', Icons.list_alt_rounded),
            const SizedBox(height: 8),
            Container(
              padding: const EdgeInsets.all(16),
              decoration: BoxDecoration(
                color: AppColors.surfaceDark,
                borderRadius: BorderRadius.circular(16),
                border: Border.all(color: AppColors.borderDark),
              ),
              child: Column(
                children: [
                  if (cert.items.isNotEmpty)
                    ...cert.items.map((item) {
                      return Padding(
                        padding: const EdgeInsets.only(bottom: 12),
                        child: Row(
                          crossAxisAlignment: CrossAxisAlignment.start,
                          children: [
                            Container(
                              padding: const EdgeInsets.symmetric(horizontal: 6, vertical: 2),
                              decoration: BoxDecoration(
                                color: AppColors.backgroundDark,
                                borderRadius: BorderRadius.circular(6),
                              ),
                              child: Text(
                                '${item.quantity}x',
                                style: const TextStyle(fontWeight: FontWeight.bold, fontSize: 12, color: AppColors.primary),
                              ),
                            ),
                            const SizedBox(width: 10),
                            Expanded(
                              child: Text(
                                item.description,
                                style: const TextStyle(fontSize: 13, color: Colors.white),
                              ),
                            ),
                            const SizedBox(width: 8),
                            Text(
                              '\$${item.total.toStringAsFixed(0).replaceAllMapped(RegExp(r'(\d{1,3})(?=(\d{3})+(?!\d))'), (Match m) => '${m[1]}.')}',
                              style: const TextStyle(fontWeight: FontWeight.bold, fontSize: 13, color: Colors.white),
                            ),
                          ],
                        ),
                      );
                    })
                  else
                    _buildInfoRow('Servicio', cert.description ?? 'Sellado de Fuga de Gas'),
                  const Divider(color: AppColors.borderDark, height: 24),
                  _buildInfoRow('Subtotal (Neto)', cert.formattedSubtotal ?? '\$0'),
                  if (cert.taxType == 'factura') ...[
                    const SizedBox(height: 8),
                    _buildInfoRow('IVA (19% Factura)', cert.formattedTax ?? '\$0'),
                  ],
                  const SizedBox(height: 8),
                  Row(
                    mainAxisAlignment: MainAxisAlignment.spaceBetween,
                    children: [
                      const Text('TOTAL FINAL', style: TextStyle(fontWeight: FontWeight.bold, color: Colors.white, fontSize: 14)),
                      Text(
                        cert.formattedTotal ?? '\$0',
                        style: const TextStyle(fontWeight: FontWeight.w900, color: AppColors.primary, fontSize: 18),
                      ),
                    ],
                  ),
                ],
              ),
            ),
            const SizedBox(height: 16),

            // Technical SEC & Prodoral Specs
            _buildSectionHeader('Especificaciones Técnicas SEC', Icons.verified_user_outlined),
            const SizedBox(height: 8),
            Container(
              padding: const EdgeInsets.all(16),
              decoration: BoxDecoration(
                color: AppColors.surfaceDark,
                borderRadius: BorderRadius.circular(16),
                border: Border.all(color: AppColors.borderDark),
              ),
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  _buildInfoRow('Gasfiter Responsable', cert.gasfiterName ?? 'Domingo Isain Plaza Caamaño', isBold: true),
                  const Divider(color: AppColors.borderDark, height: 20),
                  _buildInfoRow('RUT / Registro SEC', '${cert.gasfiterRut ?? "12.738.961-6"} · ${cert.gasfiterSecClass ?? "SEC Clase 3"}'),
                  const Divider(color: AppColors.borderDark, height: 20),
                  _buildInfoRow('Normativa de Seguridad', 'Decreto Supremo 66 Art 44.2.3 · DIN EN 13090'),
                  const Divider(color: AppColors.borderDark, height: 20),
                  _buildInfoRow('Garantía de Servicio', '3 Años por Efectos de Sellado'),
                  if (cert.workDetails != null && cert.workDetails!.isNotEmpty) ...[
                    const Divider(color: AppColors.borderDark, height: 20),
                    const Text('Detalle Técnico Completo:', style: TextStyle(fontSize: 12, color: AppColors.textMutedDark)),
                    const SizedBox(height: 6),
                    Text(
                      cert.workDetails!,
                      style: const TextStyle(fontSize: 12, color: AppColors.textSecondaryDark, height: 1.4),
                    ),
                  ],
                ],
              ),
            ),
            const SizedBox(height: 16),

            // Photo Evidence
            if (cert.photos != null) ...[
              _buildSectionHeader('Registro Fotográfico de Inspección', Icons.photo_camera_outlined),
              const SizedBox(height: 8),
              _buildPhotosGallery(cert.photos!),
            ],
            const SizedBox(height: 32),
          ],
        ),
      ),
    );
  }

  Widget _buildSectionHeader(String title, IconData icon) {
    return Row(
      children: [
        Icon(icon, size: 18, color: AppColors.primary),
        const SizedBox(width: 8),
        Text(
          title,
          style: const TextStyle(fontSize: 15, fontWeight: FontWeight.bold, color: Colors.white),
        ),
      ],
    );
  }

  Widget _buildInfoRow(String label, String value, {bool isBold = false}) {
    return Row(
      mainAxisAlignment: MainAxisAlignment.spaceBetween,
      crossAxisAlignment: CrossAxisAlignment.start,
      children: [
        Text(label, style: const TextStyle(color: AppColors.textSecondaryDark, fontSize: 13)),
        const SizedBox(width: 12),
        Expanded(
          child: Text(
            value,
            textAlign: TextAlign.end,
            style: TextStyle(
              color: Colors.white,
              fontWeight: isBold ? FontWeight.bold : FontWeight.w500,
              fontSize: 13,
            ),
          ),
        ),
      ],
    );
  }

  Widget _buildPhotosGallery(Map<String, dynamic> photos) {
    List<String> photoUrls = [];
    if (photos['photo_1'] != null && photos['photo_1'].toString().isNotEmpty) {
      photoUrls.add(photos['photo_1'].toString());
    }
    if (photos['photo_2'] != null && photos['photo_2'].toString().isNotEmpty) {
      photoUrls.add(photos['photo_2'].toString());
    }
    if (photos['photo_3'] != null && photos['photo_3'].toString().isNotEmpty) {
      photoUrls.add(photos['photo_3'].toString());
    }
    if (photos['extra_photos'] != null && photos['extra_photos'] is List) {
      for (var p in photos['extra_photos']) {
        if (p != null && p.toString().isNotEmpty) {
          photoUrls.add(p.toString());
        }
      }
    }

    if (photoUrls.isEmpty) {
      return Container(
        padding: const EdgeInsets.all(16),
        decoration: BoxDecoration(
          color: AppColors.surfaceDark,
          borderRadius: BorderRadius.circular(16),
        ),
        child: const Center(
          child: Text('Sin fotografías adjuntas', style: TextStyle(color: AppColors.textMutedDark, fontSize: 12)),
        ),
      );
    }

    return GridView.builder(
      shrinkWrap: true,
      physics: const NeverScrollableScrollPhysics(),
      gridDelegate: const SliverGridDelegateWithFixedCrossAxisCount(
        crossAxisCount: 3,
        crossAxisSpacing: 8,
        mainAxisSpacing: 8,
      ),
      itemCount: photoUrls.length,
      itemBuilder: (ctx, idx) {
        final url = photoUrls[idx];
        return GestureDetector(
          onTap: () => _showPhotoPreview(url),
          child: ClipRRect(
            borderRadius: BorderRadius.circular(10),
            child: CachedNetworkImage(
              imageUrl: url,
              fit: BoxFit.cover,
              placeholder: (context, url) => Container(color: AppColors.surfaceDark),
              errorWidget: (context, url, error) => Container(
                color: AppColors.surfaceDark,
                child: const Icon(Icons.broken_image, color: AppColors.textMutedDark),
              ),
            ),
          ),
        );
      },
    );
  }

  void _showPhotoPreview(String url) {
    showDialog(
      context: context,
      builder: (ctx) => Dialog(
        backgroundColor: Colors.transparent,
        child: Column(
          mainAxisSize: MainAxisSize.min,
          children: [
            ClipRRect(
              borderRadius: BorderRadius.circular(12),
              child: CachedNetworkImage(imageUrl: url, fit: BoxFit.contain),
            ),
            const SizedBox(height: 12),
            IconButton(
              icon: const Icon(Icons.close, color: Colors.white, size: 28),
              onPressed: () => Navigator.pop(ctx),
            ),
          ],
        ),
      ),
    );
  }
}
