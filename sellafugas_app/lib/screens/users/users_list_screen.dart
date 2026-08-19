import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import '../../core/constants/app_colors.dart';
import '../../models/user_model.dart';
import '../../providers/user_management_provider.dart';
import 'user_form_screen.dart';

class UsersListScreen extends StatefulWidget {
  const UsersListScreen({super.key});

  @override
  State<UsersListScreen> createState() => _UsersListScreenState();
}

class _UsersListScreenState extends State<UsersListScreen> {
  @override
  void initState() {
    super.initState();
    WidgetsBinding.instance.addPostFrameCallback((_) {
      Provider.of<UserManagementProvider>(context, listen: false).fetchUsers();
    });
  }

  Future<void> _deleteUser(UserModel u) async {
    final confirmed = await showDialog<bool>(
      context: context,
      builder: (ctx) => AlertDialog(
        backgroundColor: AppColors.surfaceDark,
        shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(16)),
        title: const Text('Eliminar Usuario', style: TextStyle(fontWeight: FontWeight.bold, color: AppColors.danger)),
        content: Text('¿Desea eliminar al usuario ${u.name}?'),
        actions: [
          TextButton(onPressed: () => Navigator.pop(ctx, false), child: const Text('Cancelar')),
          ElevatedButton(
            style: ElevatedButton.styleFrom(backgroundColor: AppColors.danger),
            onPressed: () => Navigator.pop(ctx, true),
            child: const Text('Eliminar'),
          ),
        ],
      ),
    );

    if (confirmed == true && mounted) {
      final success = await Provider.of<UserManagementProvider>(context, listen: false).deleteUser(u.id);
      if (success && mounted) {
        ScaffoldMessenger.of(context).showSnackBar(
          const SnackBar(content: Text('Usuario eliminado')),
        );
      }
    }
  }

  @override
  Widget build(BuildContext context) {
    final userProvider = Provider.of<UserManagementProvider>(context);

    return Scaffold(
      backgroundColor: AppColors.backgroundDark,
      appBar: AppBar(
        title: const Text('Gestión de Técnicos y Personal', style: TextStyle(fontWeight: FontWeight.bold)),
        actions: [
          IconButton(
            icon: const Icon(Icons.person_add_alt_1_rounded),
            onPressed: () {
              Navigator.of(context).push(
                MaterialPageRoute(builder: (_) => const UserFormScreen()),
              );
            },
          ),
        ],
      ),
      body: RefreshIndicator(
        color: AppColors.primary,
        backgroundColor: AppColors.surfaceDark,
        onRefresh: () => userProvider.fetchUsers(),
        child: userProvider.isLoading && userProvider.users.isEmpty
            ? const Center(child: CircularProgressIndicator(color: AppColors.primary))
            : userProvider.users.isEmpty
                ? const Center(
                    child: Text('No hay técnicos registrados', style: TextStyle(color: AppColors.textSecondaryDark)),
                  )
                : ListView.builder(
                    padding: const EdgeInsets.all(16),
                    itemCount: userProvider.users.length,
                    itemBuilder: (ctx, index) {
                      final u = userProvider.users[index];
                      final isAdmin = u.isAdmin;

                      return Card(
                        margin: const EdgeInsets.only(bottom: 12),
                        child: ListTile(
                          contentPadding: const EdgeInsets.symmetric(horizontal: 16, vertical: 8),
                          leading: CircleAvatar(
                            backgroundColor: isAdmin ? AppColors.primary.withOpacity(0.2) : AppColors.secondary.withOpacity(0.2),
                            child: Icon(
                              isAdmin ? Icons.admin_panel_settings : Icons.engineering,
                              color: isAdmin ? AppColors.primary : AppColors.secondary,
                            ),
                          ),
                          title: Row(
                            children: [
                              Expanded(
                                child: Text(
                                  u.name,
                                  style: const TextStyle(fontWeight: FontWeight.bold, fontSize: 15),
                                ),
                              ),
                              Container(
                                padding: const EdgeInsets.symmetric(horizontal: 6, vertical: 2),
                                decoration: BoxDecoration(
                                  color: u.isActive ? AppColors.success.withOpacity(0.15) : AppColors.danger.withOpacity(0.15),
                                  borderRadius: BorderRadius.circular(4),
                                ),
                                child: Text(
                                  u.isActive ? 'ACTIVO' : 'INACTIVO',
                                  style: TextStyle(
                                    fontSize: 10,
                                    fontWeight: FontWeight.bold,
                                    color: u.isActive ? AppColors.success : AppColors.danger,
                                  ),
                                ),
                              ),
                            ],
                          ),
                          subtitle: Column(
                            crossAxisAlignment: CrossAxisAlignment.start,
                            children: [
                              const SizedBox(height: 4),
                              Text(u.email, style: const TextStyle(fontSize: 12, color: AppColors.textSecondaryDark)),
                              if (u.rut != null || u.secCode != null)
                                Text(
                                  '${u.rut ?? ""} · SEC: ${u.secCode ?? "N/A"}',
                                  style: const TextStyle(fontSize: 11, color: AppColors.textMutedDark),
                                ),
                            ],
                          ),
                          trailing: Row(
                            mainAxisSize: MainAxisSize.min,
                            children: [
                              IconButton(
                                icon: const Icon(Icons.edit_outlined, size: 20, color: AppColors.textSecondaryDark),
                                onPressed: () {
                                  Navigator.of(context).push(
                                    MaterialPageRoute(builder: (_) => UserFormScreen(user: u)),
                                  );
                                },
                              ),
                              IconButton(
                                icon: const Icon(Icons.delete_outline, size: 20, color: AppColors.danger),
                                onPressed: () => _deleteUser(u),
                              ),
                            ],
                          ),
                        ),
                      );
                    },
                  ),
      ),
    );
  }
}
