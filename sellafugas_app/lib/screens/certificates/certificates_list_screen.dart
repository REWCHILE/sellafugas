import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:url_launcher/url_launcher.dart';
import '../../core/constants/app_colors.dart';
import '../../models/certificate_model.dart';
import '../../providers/certificate_provider.dart';
import 'certificate_detail_screen.dart';
import 'certificate_form_screen.dart';

class CertificatesListScreen extends StatefulWidget {
  const CertificatesListScreen({super.key});

  @override
  State<CertificatesListScreen> createState() => _CertificatesListScreenState();
}

class _CertificatesListScreenState extends State<CertificatesListScreen> {
  final _searchController = TextEditingController();
  final _scrollController = ScrollController();

  @override
  void initState() {
    super.initState();
    _scrollController.addListener(_onScroll);
    WidgetsBinding.instance.addPostFrameCallback((_) {
      Provider.of<CertificateProvider>(context, listen: false).fetchCertificates(refresh: true);
    });
  }

  void _onScroll() {
    if (_scrollController.position.pixels >= _scrollController.position.maxScrollExtent - 200) {
      Provider.of<CertificateProvider>(context, listen: false).loadMore();
    }
  }

  @override
  void dispose() {
    _searchController.dispose();
    _scrollController.dispose();
    super.dispose();
  }

  Future<void> _launchWhatsApp(String phone, String name, String folio, String pdfUrl) async {
    final cleanPhone = phone.replaceAll(RegExp(r'[^0-9]'), '');
    final msg = "Hola $name, le compartimos su documento oficial SellafuGas® N° $folio:\n$pdfUrl";
    final uri = Uri.parse("https://wa.me/$cleanPhone?text=${Uri.encodeComponent(msg)}");
    try {
      bool launched = await launchUrl(uri, mode: LaunchMode.externalApplication);
      if (!launched) {
        await launchUrl(uri, mode: LaunchMode.platformDefault);
      }
    } catch (e) {
      debugPrint('Error al abrir WhatsApp: $e');
    }
  }

  @override
  Widget build(BuildContext context) {
    final certProvider = Provider.of<CertificateProvider>(context);

    return Scaffold(
      backgroundColor: AppColors.backgroundDark,
      appBar: AppBar(
        title: const Text('Gestión de Documentos', style: TextStyle(fontWeight: FontWeight.bold)),
        actions: [
          IconButton(
            icon: const Icon(Icons.add_rounded),
            onPressed: () {
              Navigator.of(context).push(
                MaterialPageRoute(builder: (_) => const CertificateFormScreen()),
              );
            },
          ),
        ],
      ),
      body: Column(
        children: [
          // Search Bar & Filter Chips Header
          Container(
            padding: const EdgeInsets.symmetric(horizontal: 16, vertical: 8),
            color: AppColors.surfaceDark.withOpacity(0.5),
            child: Column(
              children: [
                // Search Input
                TextField(
                  controller: _searchController,
                  onChanged: (val) {
                    certProvider.setSearchQuery(val.trim());
                  },
                  decoration: InputDecoration(
                    hintText: 'Buscar por Folio, Cliente, Comuna o Teléfono...',
                    prefixIcon: const Icon(Icons.search, size: 20, color: AppColors.textMutedDark),
                    suffixIcon: _searchController.text.isNotEmpty
                        ? IconButton(
                            icon: const Icon(Icons.clear, size: 18),
                            onPressed: () {
                              _searchController.clear();
                              certProvider.setSearchQuery('');
                            },
                          )
                        : null,
                  ),
                ),
                const SizedBox(height: 10),
                // Document Type Filter Row
                SingleChildScrollView(
                  scrollDirection: Axis.horizontal,
                  child: Row(
                    children: [
                      _buildFilterChip(
                        label: 'Todos',
                        isSelected: certProvider.selectedDocumentType == null,
                        onTap: () => certProvider.setDocumentTypeFilter(null),
                      ),
                      const SizedBox(width: 8),
                      _buildFilterChip(
                        label: 'Certificados SEC',
                        isSelected: certProvider.selectedDocumentType == 'certificado',
                        icon: Icons.verified_rounded,
                        activeColor: AppColors.success,
                        onTap: () => certProvider.setDocumentTypeFilter('certificado'),
                      ),
                      const SizedBox(width: 8),
                      _buildFilterChip(
                        label: 'Cotizaciones',
                        isSelected: certProvider.selectedDocumentType == 'cotizacion',
                        icon: Icons.request_quote_rounded,
                        activeColor: AppColors.warning,
                        onTap: () => certProvider.setDocumentTypeFilter('cotizacion'),
                      ),
                    ],
                  ),
                ),
              ],
            ),
          ),

          // Certificates List
          Expanded(
            child: RefreshIndicator(
              color: AppColors.primary,
              backgroundColor: AppColors.surfaceDark,
              onRefresh: () => certProvider.fetchCertificates(refresh: true),
              child: certProvider.isLoading && certProvider.certificates.isEmpty
                  ? const Center(child: CircularProgressIndicator(color: AppColors.primary))
                  : certProvider.certificates.isEmpty
                      ? Center(
                          child: Column(
                            mainAxisAlignment: MainAxisAlignment.center,
                            children: [
                              Icon(Icons.search_off_rounded, size: 48, color: AppColors.textMutedDark.withOpacity(0.5)),
                              const SizedBox(height: 12),
                              const Text('No se encontraron documentos', style: TextStyle(color: AppColors.textSecondaryDark)),
                              const SizedBox(height: 8),
                              TextButton.icon(
                                icon: const Icon(Icons.refresh),
                                label: const Text('Recargar'),
                                onPressed: () => certProvider.fetchCertificates(refresh: true),
                              ),
                            ],
                          ),
                        )
                      : ListView.builder(
                          controller: _scrollController,
                          padding: const EdgeInsets.symmetric(horizontal: 16, vertical: 12),
                          itemCount: certProvider.certificates.length + (certProvider.hasMore ? 1 : 0),
                          itemBuilder: (ctx, index) {
                            if (index == certProvider.certificates.length) {
                              return const Padding(
                                padding: EdgeInsets.symmetric(vertical: 16),
                                child: Center(
                                  child: CircularProgressIndicator(strokeWidth: 2, color: AppColors.primary),
                                ),
                              );
                            }

                            final cert = certProvider.certificates[index];
                            return _buildCertificateCard(cert);
                          },
                        ),
            ),
          ),
        ],
      ),
    );
  }

  Widget _buildFilterChip({
    required String label,
    required bool isSelected,
    IconData? icon,
    Color? activeColor,
    required VoidCallback onTap,
  }) {
    final color = activeColor ?? AppColors.primary;
    return GestureDetector(
      onTap: onTap,
      child: Container(
        padding: const EdgeInsets.symmetric(horizontal: 12, vertical: 6),
        decoration: BoxDecoration(
          color: isSelected ? color.withOpacity(0.2) : AppColors.surfaceDark,
          borderRadius: BorderRadius.circular(20),
          border: Border.all(
            color: isSelected ? color : AppColors.borderDark,
            width: isSelected ? 1.5 : 1,
          ),
        ),
        child: Row(
          mainAxisSize: MainAxisSize.min,
          children: [
            if (icon != null) ...[
              Icon(icon, size: 14, color: isSelected ? color : AppColors.textSecondaryDark),
              const SizedBox(width: 6),
            ],
            Text(
              label,
              style: TextStyle(
                fontSize: 12,
                fontWeight: isSelected ? FontWeight.bold : FontWeight.normal,
                color: isSelected ? Colors.white : AppColors.textSecondaryDark,
              ),
            ),
          ],
        ),
      ),
    );
  }

  Widget _buildCertificateCard(CertificateModel cert) {
    final isCert = cert.isCertificate;

    return Card(
      margin: const EdgeInsets.only(bottom: 12),
      child: InkWell(
        borderRadius: BorderRadius.circular(16),
        onTap: () {
          Navigator.of(context).push(
            MaterialPageRoute(
              builder: (_) => CertificateDetailScreen(certificateId: cert.id),
            ),
          );
        },
        child: Padding(
          padding: const EdgeInsets.all(16),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: [
              // Header: Folio badge, Document Type, and Status
              Row(
                mainAxisAlignment: MainAxisAlignment.spaceBetween,
                children: [
                  Row(
                    children: [
                      Container(
                        padding: const EdgeInsets.symmetric(horizontal: 8, vertical: 4),
                        decoration: BoxDecoration(
                          color: isCert ? AppColors.success.withOpacity(0.15) : AppColors.warning.withOpacity(0.15),
                          borderRadius: BorderRadius.circular(8),
                          border: Border.all(
                            color: isCert ? AppColors.success.withOpacity(0.3) : AppColors.warning.withOpacity(0.3),
                          ),
                        ),
                        child: Row(
                          mainAxisSize: MainAxisSize.min,
                          children: [
                            Icon(
                              isCert ? Icons.verified_rounded : Icons.request_quote_rounded,
                              size: 14,
                              color: isCert ? AppColors.success : AppColors.warning,
                            ),
                            const SizedBox(width: 4),
                            Text(
                              'N° ${cert.certificateNumber}',
                              style: TextStyle(
                                fontSize: 12,
                                fontWeight: FontWeight.bold,
                                color: isCert ? AppColors.success : AppColors.warning,
                              ),
                            ),
                          ],
                        ),
                      ),
                      const SizedBox(width: 8),
                      Text(
                        isCert ? 'Certificado SEC' : 'Cotización',
                        style: const TextStyle(fontSize: 12, color: AppColors.textMutedDark, fontWeight: FontWeight.w500),
                      ),
                    ],
                  ),
                  Container(
                    padding: const EdgeInsets.symmetric(horizontal: 8, vertical: 3),
                    decoration: BoxDecoration(
                      color: AppColors.backgroundDark,
                      borderRadius: BorderRadius.circular(6),
                    ),
                    child: Text(
                      cert.status.toUpperCase(),
                      style: TextStyle(
                        fontSize: 10,
                        fontWeight: FontWeight.bold,
                        color: cert.status == 'emitido' || cert.status == 'completado'
                            ? AppColors.success
                            : AppColors.warning,
                      ),
                    ),
                  ),
                ],
              ),
              const SizedBox(height: 12),

              // Client Name
              Text(
                cert.clientName,
                style: const TextStyle(fontSize: 16, fontWeight: FontWeight.bold, color: Colors.white),
              ),
              const SizedBox(height: 4),

              // Location & Date
              Row(
                children: [
                  const Icon(Icons.location_on_outlined, size: 14, color: AppColors.textMutedDark),
                  const SizedBox(width: 4),
                  Expanded(
                    child: Text(
                      '${cert.clientComuna ?? "Santiago"} ${cert.clientAddress != null ? "· ${cert.clientAddress}" : ""}',
                      overflow: TextOverflow.ellipsis,
                      style: const TextStyle(fontSize: 12, color: AppColors.textSecondaryDark),
                    ),
                  ),
                  Text(
                    cert.date ?? cert.createdAt ?? '',
                    style: const TextStyle(fontSize: 11, color: AppColors.textMutedDark),
                  ),
                ],
              ),
              const SizedBox(height: 12),
              const Divider(color: AppColors.borderDark, height: 1),
              const SizedBox(height: 10),

              // Price & Quick Actions
              Row(
                mainAxisAlignment: MainAxisAlignment.spaceBetween,
                children: [
                  Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Text(
                        cert.taxType == 'factura' ? 'Total (c/ Factura)' : 'Total (Neto)',
                        style: const TextStyle(fontSize: 11, color: AppColors.textMutedDark),
                      ),
                      Text(
                        cert.formattedTotal ?? '\$0',
                        style: const TextStyle(fontSize: 18, fontWeight: FontWeight.w900, color: Colors.white),
                      ),
                    ],
                  ),
                  Row(
                    children: [
                      if (cert.clientPhone != null && cert.clientPhone!.isNotEmpty)
                        IconButton(
                          icon: const Icon(Icons.chat_bubble_outline_rounded, color: AppColors.whatsapp, size: 22),
                          tooltip: 'Compartir WhatsApp',
                          onPressed: () {
                            if (cert.pdfUrl != null) {
                              _launchWhatsApp(cert.clientPhone!, cert.clientName, cert.certificateNumber, cert.pdfUrl!);
                            }
                          },
                        ),
                      const Icon(Icons.arrow_forward_ios_rounded, size: 14, color: AppColors.textMutedDark),
                    ],
                  ),
                ],
              ),
            ],
          ),
        ),
      ),
    );
  }
}
