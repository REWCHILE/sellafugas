import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import '../core/constants/app_colors.dart';
import '../providers/auth_provider.dart';
import 'dashboard/dashboard_screen.dart';
import 'certificates/certificates_list_screen.dart';
import 'certificates/certificate_form_screen.dart';
import 'users/users_list_screen.dart';
import 'profile/profile_screen.dart';

class MainNavigationScreen extends StatefulWidget {
  final int initialIndex;
  const MainNavigationScreen({super.key, this.initialIndex = 0});

  @override
  State<MainNavigationScreen> createState() => _MainNavigationScreenState();
}

class _MainNavigationScreenState extends State<MainNavigationScreen> {
  late int _currentIndex;

  @override
  void initState() {
    super.initState();
    _currentIndex = widget.initialIndex;
  }

  @override
  Widget build(BuildContext context) {
    final auth = Provider.of<AuthProvider>(context);
    final isAdmin = auth.isAdmin;

    final List<Widget> screens = [
      const DashboardScreen(),
      const CertificatesListScreen(),
      if (isAdmin) const UsersListScreen(),
      const ProfileScreen(),
    ];

    final List<BottomNavigationBarItem> navItems = [
      const BottomNavigationBarItem(
        icon: Icon(Icons.dashboard_outlined),
        activeIcon: Icon(Icons.dashboard_rounded),
        label: 'Inicio',
      ),
      const BottomNavigationBarItem(
        icon: Icon(Icons.description_outlined),
        activeIcon: Icon(Icons.description_rounded),
        label: 'Documentos',
      ),
      if (isAdmin)
        const BottomNavigationBarItem(
          icon: Icon(Icons.badge_outlined),
          activeIcon: Icon(Icons.badge_rounded),
          label: 'Técnicos',
        ),
      const BottomNavigationBarItem(
        icon: Icon(Icons.person_outline_rounded),
        activeIcon: Icon(Icons.person_rounded),
        label: 'Perfil',
      ),
    ];

    return Scaffold(
      body: IndexedStack(
        index: _currentIndex < screens.length ? _currentIndex : 0,
        children: screens,
      ),
      floatingActionButton: FloatingActionButton(
        backgroundColor: AppColors.primary,
        elevation: 4,
        child: const Icon(Icons.add, color: Colors.white, size: 28),
        onPressed: () {
          Navigator.of(context).push(
            MaterialPageRoute(
              builder: (_) => const CertificateFormScreen(),
            ),
          );
        },
      ),
      floatingActionButtonLocation: FloatingActionButtonLocation.miniCenterDocked,
      bottomNavigationBar: BottomNavigationBar(
        currentIndex: _currentIndex < navItems.length ? _currentIndex : 0,
        onTap: (index) {
          setState(() {
            _currentIndex = index;
          });
        },
        items: navItems,
      ),
    );
  }
}
