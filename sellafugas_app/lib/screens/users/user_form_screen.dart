import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import '../../core/constants/app_colors.dart';
import '../../models/user_model.dart';
import '../../providers/user_management_provider.dart';

class UserFormScreen extends StatefulWidget {
  final UserModel? user;
  const UserFormScreen({super.key, this.user});

  @override
  State<UserFormScreen> createState() => _UserFormScreenState();
}

class _UserFormScreenState extends State<UserFormScreen> {
  final _formKey = GlobalKey<FormState>();
  late TextEditingController _nameController;
  late TextEditingController _emailController;
  late TextEditingController _passwordController;
  late TextEditingController _phoneController;
  late TextEditingController _rutController;
  late TextEditingController _secCodeController;
  late String _role;
  late bool _isActive;
  bool _isSubmitting = false;

  @override
  void initState() {
    super.initState();
    final u = widget.user;
    _nameController = TextEditingController(text: u?.name ?? '');
    _emailController = TextEditingController(text: u?.email ?? '');
    _passwordController = TextEditingController();
    _phoneController = TextEditingController(text: u?.phone ?? '');
    _rutController = TextEditingController(text: u?.rut ?? '');
    _secCodeController = TextEditingController(text: u?.secCode ?? '');
    _role = u?.role ?? 'technician';
    _isActive = u?.isActive ?? true;
  }

  @override
  void dispose() {
    _nameController.dispose();
    _emailController.dispose();
    _passwordController.dispose();
    _phoneController.dispose();
    _rutController.dispose();
    _secCodeController.dispose();
    super.dispose();
  }

  Future<void> _saveUser() async {
    if (!_formKey.currentState!.validate()) return;
    setState(() => _isSubmitting = true);

    final provider = Provider.of<UserManagementProvider>(context, listen: false);
    final result = await provider.saveUser(
      id: widget.user?.id,
      name: _nameController.text.trim(),
      email: _emailController.text.trim(),
      role: _role,
      password: _passwordController.text.isNotEmpty ? _passwordController.text : null,
      phone: _phoneController.text.trim(),
      rut: _rutController.text.trim(),
      secCode: _secCodeController.text.trim(),
      isActive: _isActive,
    );

    setState(() => _isSubmitting = false);

    if (!mounted) return;

    if (result['success'] == true) {
      Navigator.pop(context);
      ScaffoldMessenger.of(context).showSnackBar(
        SnackBar(
          content: Text(result['message'] ?? 'Usuario guardado exitosamente'),
          backgroundColor: AppColors.success,
        ),
      );
    } else {
      ScaffoldMessenger.of(context).showSnackBar(
        SnackBar(
          content: Text(result['message'] ?? 'Error al guardar'),
          backgroundColor: AppColors.danger,
        ),
      );
    }
  }

  @override
  Widget build(BuildContext context) {
    final isEditing = widget.user != null;

    return Scaffold(
      backgroundColor: AppColors.backgroundDark,
      appBar: AppBar(
        title: Text(isEditing ? 'Editar Usuario' : 'Nuevo Técnico / Admin'),
        actions: [
          IconButton(
            icon: const Icon(Icons.check_rounded, color: AppColors.primary, size: 28),
            onPressed: _isSubmitting ? null : _saveUser,
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
              TextFormField(
                controller: _nameController,
                decoration: const InputDecoration(labelText: 'Nombre Completo', prefixIcon: Icon(Icons.person)),
                validator: (v) => v == null || v.trim().isEmpty ? 'Requerido' : null,
              ),
              const SizedBox(height: 12),
              TextFormField(
                controller: _emailController,
                keyboardType: TextInputType.emailAddress,
                decoration: const InputDecoration(labelText: 'Correo Electrónico', prefixIcon: Icon(Icons.email)),
                validator: (v) => v == null || !v.contains('@') ? 'Ingrese un correo válido' : null,
              ),
              const SizedBox(height: 12),
              TextFormField(
                controller: _passwordController,
                obscureText: true,
                decoration: InputDecoration(
                  labelText: isEditing ? 'Nueva Contraseña (Opcional)' : 'Contraseña de Acceso',
                  prefixIcon: const Icon(Icons.lock),
                ),
                validator: (v) {
                  if (!isEditing && (v == null || v.length < 6)) {
                    return 'Mínimo 6 caracteres';
                  }
                  return null;
                },
              ),
              const SizedBox(height: 12),
              DropdownButtonFormField<String>(
                value: _role,
                decoration: const InputDecoration(labelText: 'Rol / Permisos', prefixIcon: Icon(Icons.security)),
                dropdownColor: AppColors.surfaceDark,
                items: const [
                  DropdownMenuItem(value: 'technician', child: Text('Técnico en Terreno')),
                  DropdownMenuItem(value: 'admin', child: Text('Administrador SEC')),
                ],
                onChanged: (v) => setState(() => _role = v!),
              ),
              const SizedBox(height: 12),
              TextFormField(
                controller: _phoneController,
                keyboardType: TextInputType.phone,
                decoration: const InputDecoration(labelText: 'Teléfono', prefixIcon: Icon(Icons.phone)),
              ),
              const SizedBox(height: 12),
              Row(
                children: [
                  Expanded(
                    child: TextFormField(
                      controller: _rutController,
                      decoration: const InputDecoration(labelText: 'RUT', prefixIcon: Icon(Icons.badge)),
                    ),
                  ),
                  const SizedBox(width: 10),
                  Expanded(
                    child: TextFormField(
                      controller: _secCodeController,
                      decoration: const InputDecoration(labelText: 'Código / Clase SEC', prefixIcon: Icon(Icons.verified)),
                    ),
                  ),
                ],
              ),
              const SizedBox(height: 16),
              SwitchListTile(
                title: const Text('Usuario Activo'),
                subtitle: const Text('Permite iniciar sesión en la aplicación', style: TextStyle(fontSize: 12, color: AppColors.textMutedDark)),
                value: _isActive,
                activeColor: AppColors.primary,
                onChanged: (v) => setState(() => _isActive = v),
              ),
              const SizedBox(height: 32),
              SizedBox(
                width: double.infinity,
                height: 50,
                child: ElevatedButton(
                  onPressed: _isSubmitting ? null : _saveUser,
                  child: _isSubmitting
                      ? const CircularProgressIndicator(color: Colors.white, strokeWidth: 2.5)
                      : Text(isEditing ? 'Guardar Cambios' : 'Crear Usuario', style: const TextStyle(fontWeight: FontWeight.bold)),
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
