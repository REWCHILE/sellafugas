import 'dart:convert';
import 'package:flutter/material.dart';
import '../core/services/api_service.dart';
import '../core/services/auth_service.dart';
import '../models/user_model.dart';

enum AuthStatus { uninitialized, authenticated, authenticating, unauthenticated }

class AuthProvider with ChangeNotifier {
  AuthStatus _status = AuthStatus.uninitialized;
  UserModel? _currentUser;
  String? _errorMessage;
  String _serverBaseUrl = '';

  AuthStatus get status => _status;
  UserModel? get currentUser => _currentUser;
  bool get isAuthenticated => _status == AuthStatus.authenticated && _currentUser != null;
  bool get isAdmin => _currentUser?.isAdmin ?? false;
  String? get errorMessage => _errorMessage;
  String get serverBaseUrl => _serverBaseUrl;

  AuthProvider() {
    initAuth();
  }

  Future<void> initAuth() async {
    _serverBaseUrl = await ApiService.getBaseUrl();
    final token = await ApiService.getToken();

    if (token != null && token.isNotEmpty) {
      _currentUser = await AuthService.getCachedUser();
      if (_currentUser != null) {
        _status = AuthStatus.authenticated;
        notifyListeners();
        // Silently refresh profile in background
        _refreshProfile();
        return;
      }
    }

    _status = AuthStatus.unauthenticated;
    notifyListeners();
  }

  Future<void> _refreshProfile() async {
    final result = await AuthService.fetchCurrentUser();
    if (result['status'] == 'success' && result['user'] != null) {
      _currentUser = result['user'] as UserModel;
      notifyListeners();
    } else if (result['status'] == 'unauthorized') {
      await logout();
    }
  }

  Future<bool> login(String email, String password) async {
    _status = AuthStatus.authenticating;
    _errorMessage = null;
    notifyListeners();

    final result = await AuthService.login(email: email, password: password);

    if (result['success'] == true) {
      _currentUser = result['user'];
      _status = AuthStatus.authenticated;
      notifyListeners();
      return true;
    } else {
      _status = AuthStatus.unauthenticated;
      _errorMessage = result['message'];
      notifyListeners();
      return false;
    }
  }

  Future<void> updateServerUrl(String newUrl) async {
    await ApiService.setBaseUrl(newUrl);
    _serverBaseUrl = await ApiService.getBaseUrl();
    notifyListeners();
  }

  Future<bool> updateProfile({
    required String name,
    required String email,
    String? phone,
    String? rut,
    String? secCode,
    String? password,
  }) async {
    try {
      final body = {
        'name': name,
        'email': email,
        'phone': phone,
        'rut': rut,
        'sec_code': secCode,
      };
      if (password != null && password.isNotEmpty) {
        body['password'] = password;
      }

      final response = await ApiService.put('/profile', body: body);
      final data = jsonDecode(response.body);

      if (response.statusCode == 200 && data['success'] == true) {
        _currentUser = UserModel.fromJson(data['user']);
        notifyListeners();
        return true;
      } else {
        _errorMessage = data['message'] ?? 'Error al actualizar perfil';
        notifyListeners();
        return false;
      }
    } catch (e) {
      _errorMessage = 'Error de conexión: $e';
      notifyListeners();
      return false;
    }
  }

  Future<void> logout() async {
    await AuthService.logout();
    _currentUser = null;
    _status = AuthStatus.unauthenticated;
    notifyListeners();
  }
}
