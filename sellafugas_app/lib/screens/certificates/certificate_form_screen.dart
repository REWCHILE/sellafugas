import 'dart:io';
import 'package:flutter/material.dart';
import 'package:image_picker/image_picker.dart';
import 'package:intl/intl.dart';
import 'package:provider/provider.dart';
import '../../core/constants/app_colors.dart';
import '../../models/certificate_model.dart';
import '../../providers/certificate_provider.dart';

class CertificateFormScreen extends StatefulWidget {
  final CertificateModel? certificate;
  final String? defaultType; // 'certificado' or 'cotizacion'

  const CertificateFormScreen({super.key, this.certificate, this.defaultType});

  @override
  State<CertificateFormScreen> createState() => _CertificateFormScreenState();
}

class _CertificateFormScreenState extends State<CertificateFormScreen> {
  final _formKey = GlobalKey<FormState>();
  final _picker = ImagePicker();

  late String _documentType;
  late TextEditingController _folioController;
  late TextEditingController _dateController;
  late TextEditingController _clientNameController;
  late TextEditingController _clientPhoneController;
  late TextEditingController _clientAddressController;
  late TextEditingController _clientComunaController;
  late TextEditingController _clientProvinciaController;
  late TextEditingController _workDetailsController;
  late TextEditingController _notesController;
  late TextEditingController _gasfiterNameController;
  late TextEditingController _gasfiterRutController;
  late TextEditingController _gasfiterSecClassController;

  String _taxType = 'neto';
  String _status = 'emitido';

  List<CertificateItem> _items = [];
  File? _photo1;
  File? _photo2;
  File? _photo3;
  final List<File> _extraPhotos = [];

  bool _isSubmitting = false;

  @override
  void initState() {
    super.initState();
    final cert = widget.certificate;
    _documentType = cert?.documentType ?? widget.defaultType ?? 'certificado';

    _folioController = TextEditingController(text: cert?.certificateNumber ?? '');
    _dateController = TextEditingController(text: cert?.date ?? DateFormat('yyyy-MM-dd').format(DateTime.now()));
    _clientNameController = TextEditingController(text: cert?.clientName ?? '');
    _clientPhoneController = TextEditingController(text: cert?.clientPhone ?? '');
    _clientAddressController = TextEditingController(text: cert?.clientAddress ?? '');
    _clientComunaController = TextEditingController(text: cert?.clientComuna ?? 'Santiago');
    _clientProvinciaController = TextEditingController(text: cert?.clientProvincia ?? 'Santiago');
    _workDetailsController = TextEditingController(text: cert?.workDetails ?? '');
    _notesController = TextEditingController(text: cert?.notes ?? '');
    _gasfiterNameController = TextEditingController(text: cert?.gasfiterName ?? 'Domingo Isain Plaza Caamaño');
    _gasfiterRutController = TextEditingController(text: cert?.gasfiterRut ?? '12.738.961-6');
    _gasfiterSecClassController = TextEditingController(text: cert?.gasfiterSecClass ?? 'Gasfiter Certificado Autorizado SEC Clase 3');

    _taxType = cert?.taxType ?? 'neto';
    _status = cert?.status ?? 'emitido';

    if (cert != null && cert.items.isNotEmpty) {
      _items = List.from(cert.items);
    } else {
      _items = [
        CertificateItem(
          description: cert?.description ?? 'Sellado de Fuga de Gas con Prodoral R6-1',
          quantity: cert?.quantity ?? 1,
          unitPrice: cert?.unitPrice ?? 0.0,
          total: cert?.subtotalNeto ?? 0.0,
        )
      ];
    }

    if (cert == null) {
      WidgetsBinding.instance.addPostFrameCallback((_) => _initDefaults());
    }
  }

  Future<void> _initDefaults() async {
    final provider = Provider.of<CertificateProvider>(context, listen: false);
    await provider.fetchDefaults();
    if (mounted && _folioController.text.isEmpty) {
      setState(() {
        _folioController.text = provider.nextFolio;
        if (_workDetailsController.text.isEmpty) {
          _workDetailsController.text = provider.defaultWorkDetails;
        }
      });
    }
  }

  void _loadSecTemplate() {
    final provider = Provider.of<CertificateProvider>(context, listen: false);
    setState(() {
      _workDetailsController.text = provider.defaultWorkDetails;
      _gasfiterNameController.text = provider.defaultGasfiter['name'] ?? 'Domingo Isain Plaza Caamaño';
      _gasfiterRutController.text = provider.defaultGasfiter['rut'] ?? '12.738.961-6';
      _gasfiterSecClassController.text = provider.defaultGasfiter['sec_class'] ?? 'Gasfiter Certificado Autorizado SEC Clase 3';
    });
    ScaffoldMessenger.of(context).showSnackBar(
      const SnackBar(content: Text('Plantilla Oficial SEC cargada')),
    );
  }

  double get _subtotal {
    return _items.fold(0.0, (sum, i) => sum + i.total);
  }

  double get _taxAmount {
    return _taxType == 'factura' ? (_subtotal * 0.19).roundToDouble() : 0.0;
  }

  double get _totalPrice {
    return _subtotal + _taxAmount;
  }

  Future<void> _pickImage(int photoSlot, ImageSource source) async {
    final picked = await _picker.pickImage(source: source, imageQuality: 85);
    if (picked != null) {
      setState(() {
        if (photoSlot == 1) _photo1 = File(picked.path);
        if (photoSlot == 2) _photo2 = File(picked.path);
        if (photoSlot == 3) _photo3 = File(picked.path);
      });
    }
  }

  Future<void> _pickExtraPhotos() async {
    final pickedList = await _picker.pickMultiImage(imageQuality: 85);
    if (pickedList.isNotEmpty) {
      setState(() {
        _extraPhotos.addAll(pickedList.map((x) => File(x.path)));
      });
    }
  }

  void _addItemDialog([int? editIndex]) {
    final item = editIndex != null ? _items[editIndex] : null;
    final descCtrl = TextEditingController(text: item?.description ?? '');
    final qtyCtrl = TextEditingController(text: item?.quantity.toString() ?? '1');
    final priceCtrl = TextEditingController(text: item?.unitPrice.toStringAsFixed(0) ?? '');

    showDialog(
      context: context,
      builder: (ctx) => AlertDialog(
        backgroundColor: AppColors.surfaceDark,
        shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(16)),
        title: Text(editIndex != null ? 'Editar Ítem' : 'Agregar Ítem / Servicio', style: const TextStyle(fontWeight: FontWeight.bold)),
        content: Column(
          mainAxisSize: MainAxisSize.min,
          children: [
            TextField(
              controller: descCtrl,
              decoration: const InputDecoration(labelText: 'Descripción del Servicio'),
            ),
            const SizedBox(height: 12),
            Row(
              children: [
                Expanded(
                  child: TextField(
                    controller: qtyCtrl,
                    keyboardType: TextInputType.number,
                    decoration: const InputDecoration(labelText: 'Cantidad'),
                  ),
                ),
                const SizedBox(width: 10),
                Expanded(
                  flex: 2,
                  child: TextField(
                    controller: priceCtrl,
                    keyboardType: TextInputType.number,
                    decoration: const InputDecoration(labelText: 'Precio Unitario (\$)'),
                  ),
                ),
              ],
            ),
          ],
        ),
        actions: [
          TextButton(onPressed: () => Navigator.pop(ctx), child: const Text('Cancelar')),
          ElevatedButton(
            onPressed: () {
              final desc = descCtrl.text.trim();
              if (desc.isEmpty) return;
              final qty = int.tryParse(qtyCtrl.text) ?? 1;
              final price = double.tryParse(priceCtrl.text) ?? 0.0;
              final newItem = CertificateItem(
                description: desc,
                quantity: qty,
                unitPrice: price,
                total: qty * price,
              );

              setState(() {
                if (editIndex != null) {
                  _items[editIndex] = newItem;
                } else {
                  _items.add(newItem);
                }
              });
              Navigator.pop(ctx);
            },
            child: const Text('Guardar'),
          ),
        ],
      ),
    );
  }

  Future<void> _submitForm() async {
    if (!_formKey.currentState!.validate()) return;
    if (_items.isEmpty) {
      ScaffoldMessenger.of(context).showSnackBar(
        const SnackBar(content: Text('Debe agregar al menos un ítem o servicio')),
      );
      return;
    }

    setState(() => _isSubmitting = true);

    final provider = Provider.of<CertificateProvider>(context, listen: false);
    final result = await provider.saveCertificate(
      id: widget.certificate?.id,
      certificateNumber: _folioController.text.trim(),
      documentType: _documentType,
      date: _dateController.text.trim(),
      clientName: _clientNameController.text.trim(),
      clientPhone: _clientPhoneController.text.trim(),
      clientAddress: _clientAddressController.text.trim(),
      clientComuna: _clientComunaController.text.trim(),
      clientProvincia: _clientProvinciaController.text.trim(),
      items: _items,
      taxType: _taxType,
      workDetails: _workDetailsController.text.trim(),
      gasfiterName: _gasfiterNameController.text.trim(),
      gasfiterRut: _gasfiterRutController.text.trim(),
      gasfiterSecClass: _gasfiterSecClassController.text.trim(),
      status: _status,
      notes: _notesController.text.trim(),
      photo1: _photo1,
      photo2: _photo2,
      photo3: _photo3,
      extraPhotos: _extraPhotos.isNotEmpty ? _extraPhotos : null,
    );

    setState(() => _isSubmitting = false);

    if (!mounted) return;

    if (result['success'] == true) {
      Navigator.pop(context);
      ScaffoldMessenger.of(context).showSnackBar(
        SnackBar(
          content: Text(
            widget.certificate != null
                ? '¡Documento actualizado exitosamente!'
                : '¡Documento N° ${_folioController.text} emitido exitosamente!',
          ),
          backgroundColor: AppColors.success,
        ),
      );
    } else {
      ScaffoldMessenger.of(context).showSnackBar(
        SnackBar(
          content: Text(result['message'] ?? 'Error al guardar documento'),
          backgroundColor: AppColors.danger,
        ),
      );
    }
  }

  @override
  Widget build(BuildContext context) {
    final isEditing = widget.certificate != null;

    return Scaffold(
      backgroundColor: AppColors.backgroundDark,
      appBar: AppBar(
        title: Text(
          isEditing ? 'Editar N° ${_folioController.text}' : 'Nuevo Documento',
          style: const TextStyle(fontWeight: FontWeight.bold),
        ),
        actions: [
          IconButton(
            icon: const Icon(Icons.check_rounded, color: AppColors.primary, size: 28),
            onPressed: _isSubmitting ? null : _submitForm,
          ),
        ],
      ),
      body: Form(
        key: _formKey,
        child: SingleChildScrollView(
          padding: const EdgeInsets.all(16),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: [
              // Document Type Selector
              Row(
                children: [
                  Expanded(
                    child: _buildDocTypeRadio(
                      title: 'Certificado SEC',
                      type: 'certificado',
                      icon: Icons.verified_rounded,
                      color: AppColors.success,
                    ),
                  ),
                  const SizedBox(width: 12),
                  Expanded(
                    child: _buildDocTypeRadio(
                      title: 'Cotización',
                      type: 'cotizacion',
                      icon: Icons.request_quote_rounded,
                      color: AppColors.warning,
                    ),
                  ),
                ],
              ),
              const SizedBox(height: 20),

              // Folio and Date Row
              Row(
                children: [
                  Expanded(
                    flex: 2,
                    child: Column(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: [
                        const Text('Número de Folio', style: TextStyle(fontSize: 12, color: AppColors.textSecondaryDark)),
                        const SizedBox(height: 6),
                        TextFormField(
                          controller: _folioController,
                          keyboardType: TextInputType.number,
                          decoration: const InputDecoration(
                            hintText: '257830',
                            prefixIcon: Icon(Icons.tag, size: 18),
                          ),
                          validator: (v) => v == null || v.trim().isEmpty ? 'Requerido' : null,
                        ),
                      ],
                    ),
                  ),
                  const SizedBox(width: 12),
                  Expanded(
                    flex: 2,
                    child: Column(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: [
                        const Text('Fecha de Emisión', style: TextStyle(fontSize: 12, color: AppColors.textSecondaryDark)),
                        const SizedBox(height: 6),
                        TextFormField(
                          controller: _dateController,
                          readOnly: true,
                          onTap: () async {
                            final d = await showDatePicker(
                              context: context,
                              initialDate: DateTime.now(),
                              firstDate: DateTime(2020),
                              lastDate: DateTime(2035),
                            );
                            if (d != null) {
                              _dateController.text = DateFormat('yyyy-MM-dd').format(d);
                            }
                          },
                          decoration: const InputDecoration(
                            prefixIcon: Icon(Icons.calendar_today, size: 18),
                          ),
                        ),
                      ],
                    ),
                  ),
                ],
              ),
              const SizedBox(height: 20),

              // Client Details Section
              _buildSectionTitle('Datos del Cliente', Icons.person_outline),
              const SizedBox(height: 10),
              TextFormField(
                controller: _clientNameController,
                decoration: const InputDecoration(
                  labelText: 'Nombre Completo / Razón Social',
                  prefixIcon: Icon(Icons.person, size: 18),
                ),
                validator: (v) => v == null || v.trim().isEmpty ? 'Ingrese el nombre del cliente' : null,
              ),
              const SizedBox(height: 10),
              TextFormField(
                controller: _clientPhoneController,
                keyboardType: TextInputType.phone,
                decoration: const InputDecoration(
                  labelText: 'Teléfono / WhatsApp (+56 9...)',
                  prefixIcon: Icon(Icons.phone, size: 18),
                ),
              ),
              const SizedBox(height: 10),
              TextFormField(
                controller: _clientAddressController,
                decoration: const InputDecoration(
                  labelText: 'Dirección (Calle y Número / Depto)',
                  prefixIcon: Icon(Icons.home_outlined, size: 18),
                ),
              ),
              const SizedBox(height: 10),
              Row(
                children: [
                  Expanded(
                    child: TextFormField(
                      controller: _clientComunaController,
                      decoration: const InputDecoration(
                        labelText: 'Comuna',
                        prefixIcon: Icon(Icons.location_city, size: 18),
                      ),
                    ),
                  ),
                  const SizedBox(width: 10),
                  Expanded(
                    child: TextFormField(
                      controller: _clientProvinciaController,
                      decoration: const InputDecoration(
                        labelText: 'Provincia / Región',
                        prefixIcon: Icon(Icons.map_outlined, size: 18),
                      ),
                    ),
                  ),
                ],
              ),
              const SizedBox(height: 24),

              // Items & Pricing Section
              Row(
                mainAxisAlignment: MainAxisAlignment.spaceBetween,
                children: [
                  _buildSectionTitle('Detalle de Trabajos y Valores', Icons.list_alt),
                  TextButton.icon(
                    icon: const Icon(Icons.add, size: 18),
                    label: const Text('Agregar Ítem'),
                    onPressed: () => _addItemDialog(),
                  ),
                ],
              ),
              const SizedBox(height: 8),

              // Items List
              Container(
                decoration: BoxDecoration(
                  color: AppColors.surfaceDark,
                  borderRadius: BorderRadius.circular(16),
                  border: Border.all(color: AppColors.borderDark),
                ),
                child: ListView.separated(
                  shrinkWrap: true,
                  physics: const NeverScrollableScrollPhysics(),
                  itemCount: _items.length,
                  separatorBuilder: (_, __) => const Divider(color: AppColors.borderDark, height: 1),
                  itemBuilder: (ctx, idx) {
                    final itm = _items[idx];
                    return ListTile(
                      dense: true,
                      title: Text(itm.description, style: const TextStyle(fontWeight: FontWeight.w600, fontSize: 13)),
                      subtitle: Text('${itm.quantity} x \$${itm.unitPrice.toStringAsFixed(0)}'),
                      trailing: Row(
                        mainAxisSize: MainAxisSize.min,
                        children: [
                          Text('\$${itm.total.toStringAsFixed(0)}', style: const TextStyle(fontWeight: FontWeight.bold)),
                          IconButton(
                            icon: const Icon(Icons.edit, size: 16, color: AppColors.textMutedDark),
                            onPressed: () => _addItemDialog(idx),
                          ),
                          if (_items.length > 1)
                            IconButton(
                              icon: const Icon(Icons.delete, size: 16, color: AppColors.danger),
                              onPressed: () {
                                setState(() {
                                  _items.removeAt(idx);
                                });
                              },
                            ),
                        ],
                      ),
                    );
                  },
                ),
              ),
              const SizedBox(height: 16),

              // Tax Type Selector
              Row(
                children: [
                  Expanded(
                    child: RadioListTile<String>(
                      title: const Text('Neto (Sin IVA)', style: TextStyle(fontSize: 13)),
                      value: 'neto',
                      groupValue: _taxType,
                      contentPadding: EdgeInsets.zero,
                      onChanged: (v) => setState(() => _taxType = v!),
                    ),
                  ),
                  Expanded(
                    child: RadioListTile<String>(
                      title: const Text('Factura (+19%)', style: TextStyle(fontSize: 13)),
                      value: 'factura',
                      groupValue: _taxType,
                      contentPadding: EdgeInsets.zero,
                      onChanged: (v) => setState(() => _taxType = v!),
                    ),
                  ),
                ],
              ),

              // Totals Summary Box
              Container(
                padding: const EdgeInsets.all(16),
                decoration: BoxDecoration(
                  color: AppColors.surfaceDark.withOpacity(0.5),
                  borderRadius: BorderRadius.circular(16),
                  border: Border.all(color: AppColors.borderDark),
                ),
                child: Column(
                  children: [
                    _buildSummaryRow('Subtotal Neto:', '\$${_subtotal.toStringAsFixed(0)}'),
                    if (_taxType == 'factura') ...[
                      const SizedBox(height: 6),
                      _buildSummaryRow('IVA (19%):', '\$${_taxAmount.toStringAsFixed(0)}'),
                    ],
                    const Divider(color: AppColors.borderDark, height: 16),
                    _buildSummaryRow('TOTAL FINAL:', '\$${_totalPrice.toStringAsFixed(0)}', isTotal: true),
                  ],
                ),
              ),
              const SizedBox(height: 24),

              // SEC Technical Details & Template Button
              Row(
                mainAxisAlignment: MainAxisAlignment.spaceBetween,
                children: [
                  _buildSectionTitle('Especificaciones SEC', Icons.verified_user_outlined),
                  TextButton.icon(
                    icon: const Icon(Icons.auto_awesome, size: 16, color: AppColors.primary),
                    label: const Text('Cargar Plantilla SEC', style: TextStyle(fontSize: 12)),
                    onPressed: _loadSecTemplate,
                  ),
                ],
              ),
              const SizedBox(height: 10),
              TextFormField(
                controller: _workDetailsController,
                maxLines: 5,
                decoration: const InputDecoration(
                  labelText: 'Detalle Técnico / Protocolo SEC / Garantía',
                ),
              ),
              const SizedBox(height: 12),
              TextFormField(
                controller: _gasfiterNameController,
                decoration: const InputDecoration(labelText: 'Gasfiter SEC Responsable'),
              ),
              const SizedBox(height: 10),
              Row(
                children: [
                  Expanded(
                    child: TextFormField(
                      controller: _gasfiterRutController,
                      decoration: const InputDecoration(labelText: 'RUT Gasfiter'),
                    ),
                  ),
                  const SizedBox(width: 10),
                  Expanded(
                    child: TextFormField(
                      controller: _gasfiterSecClassController,
                      decoration: const InputDecoration(labelText: 'Registro SEC'),
                    ),
                  ),
                ],
              ),
              const SizedBox(height: 24),

              // Photos Section
              _buildSectionTitle('Fotografías de Respaldo', Icons.photo_camera),
              const SizedBox(height: 12),
              Row(
                children: [
                  Expanded(child: _buildPhotoUploadBox(1, 'Foto 1', _photo1)),
                  const SizedBox(width: 8),
                  Expanded(child: _buildPhotoUploadBox(2, 'Foto 2 (QR)', _photo2)),
                  const SizedBox(width: 8),
                  Expanded(child: _buildPhotoUploadBox(3, 'Foto 3', _photo3)),
                ],
              ),
              const SizedBox(height: 12),
              OutlinedButton.icon(
                icon: const Icon(Icons.add_photo_alternate_outlined),
                label: Text('Adjuntar Fotos Extra (${_extraPhotos.length})'),
                onPressed: _pickExtraPhotos,
              ),
              const SizedBox(height: 24),

              // Status Selector
              _buildSectionTitle('Estado del Documento', Icons.check_circle_outline),
              const SizedBox(height: 10),
              DropdownButtonFormField<String>(
                value: _status,
                decoration: const InputDecoration(prefixIcon: Icon(Icons.flag_outlined, size: 18)),
                dropdownColor: AppColors.surfaceDark,
                items: const [
                  DropdownMenuItem(value: 'emitido', child: Text('Emitido')),
                  DropdownMenuItem(value: 'pendiente', child: Text('Pendiente')),
                  DropdownMenuItem(value: 'completado', child: Text('Completado / Pagado')),
                  DropdownMenuItem(value: 'anulado', child: Text('Anulado')),
                ],
                onChanged: (v) => setState(() => _status = v!),
              ),
              const SizedBox(height: 16),
              TextFormField(
                controller: _notesController,
                maxLines: 2,
                decoration: const InputDecoration(
                  labelText: 'Notas Internas (Opcional)',
                ),
              ),
              const SizedBox(height: 36),

              // Submit Button
              SizedBox(
                width: double.infinity,
                height: 52,
                child: ElevatedButton(
                  onPressed: _isSubmitting ? null : _submitForm,
                  child: _isSubmitting
                      ? const CircularProgressIndicator(color: Colors.white, strokeWidth: 2.5)
                      : Text(
                          isEditing ? 'Guardar Cambios' : 'Emitir Documento Oficial',
                          style: const TextStyle(fontSize: 16, fontWeight: FontWeight.bold),
                        ),
                ),
              ),
              const SizedBox(height: 32),
            ],
          ),
        ),
      ),
    );
  }

  Widget _buildDocTypeRadio({
    required String title,
    required String type,
    required IconData icon,
    required Color color,
  }) {
    final isSelected = _documentType == type;
    return GestureDetector(
      onTap: () => setState(() => _documentType = type),
      child: Container(
        padding: const EdgeInsets.symmetric(vertical: 14, horizontal: 12),
        decoration: BoxDecoration(
          color: isSelected ? color.withOpacity(0.18) : AppColors.surfaceDark,
          borderRadius: BorderRadius.circular(12),
          border: Border.all(
            color: isSelected ? color : AppColors.borderDark,
            width: isSelected ? 2 : 1,
          ),
        ),
        child: Row(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            Icon(icon, color: isSelected ? color : AppColors.textSecondaryDark, size: 20),
            const SizedBox(width: 8),
            Text(
              title,
              style: TextStyle(
                fontWeight: FontWeight.bold,
                color: isSelected ? Colors.white : AppColors.textSecondaryDark,
                fontSize: 13,
              ),
            ),
          ],
        ),
      ),
    );
  }

  Widget _buildSectionTitle(String title, IconData icon) {
    return Row(
      children: [
        Icon(icon, size: 18, color: AppColors.primary),
        const SizedBox(width: 8),
        Text(title, style: const TextStyle(fontSize: 15, fontWeight: FontWeight.bold, color: Colors.white)),
      ],
    );
  }

  Widget _buildSummaryRow(String label, String value, {bool isTotal = false}) {
    return Row(
      mainAxisAlignment: MainAxisAlignment.spaceBetween,
      children: [
        Text(
          label,
          style: TextStyle(
            color: isTotal ? Colors.white : AppColors.textSecondaryDark,
            fontWeight: isTotal ? FontWeight.bold : FontWeight.normal,
            fontSize: isTotal ? 15 : 13,
          ),
        ),
        Text(
          value,
          style: TextStyle(
            color: isTotal ? AppColors.primary : Colors.white,
            fontWeight: isTotal ? FontWeight.w900 : FontWeight.bold,
            fontSize: isTotal ? 17 : 13,
          ),
        ),
      ],
    );
  }

  Widget _buildPhotoUploadBox(int slot, String label, File? photo) {
    return GestureDetector(
      onTap: () {
        showModalBottomSheet(
          context: context,
          backgroundColor: AppColors.surfaceDark,
          builder: (ctx) => SafeArea(
            child: Wrap(
              children: [
                ListTile(
                  leading: const Icon(Icons.camera_alt, color: AppColors.primary),
                  title: const Text('Tomar Foto con la Cámara'),
                  onTap: () {
                    Navigator.pop(ctx);
                    _pickImage(slot, ImageSource.camera);
                  },
                ),
                ListTile(
                  leading: const Icon(Icons.photo_library, color: AppColors.secondary),
                  title: const Text('Elegir de la Galería'),
                  onTap: () {
                    Navigator.pop(ctx);
                    _pickImage(slot, ImageSource.gallery);
                  },
                ),
              ],
            ),
          ),
        );
      },
      child: Container(
        height: 90,
        decoration: BoxDecoration(
          color: AppColors.surfaceDark,
          borderRadius: BorderRadius.circular(12),
          border: Border.all(color: photo != null ? AppColors.primary : AppColors.borderDark),
        ),
        child: photo != null
            ? ClipRRect(
                borderRadius: BorderRadius.circular(12),
                child: Image.file(photo, fit: BoxFit.cover, width: double.infinity),
              )
            : Column(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  const Icon(Icons.add_a_photo_outlined, size: 24, color: AppColors.textMutedDark),
                  const SizedBox(height: 4),
                  Text(label, style: const TextStyle(fontSize: 11, color: AppColors.textMutedDark)),
                ],
              ),
      ),
    );
  }
}
