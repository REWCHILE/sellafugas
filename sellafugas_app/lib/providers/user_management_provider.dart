import 'dart:convert';
import 'package:flutter/material.dart';
import '../core/services/api_service.dart';
import '../models/user_model.dart';

class UserManagementProvider with ChangeNotifier {
  bool _isLoading = false;
  String? _errorMessage;
  List<UserModel> _users = [];

  bool get isLoading => _isLoading;
  String? get errorMessage => _errorMessage;
  List<UserModel> get users => _users;

  Future<void> fetchUsers() async {
    _isLoading = true;
    _errorMessage = null;
    notifyListeners();

    try {
      final response = await ApiService.get('/users');
      final data = jsonDecode(response.body);

      if (response.statusCode == 200 && data['success'] == true) {
        final List<dynamic> list = data['users'] ?? [];
        _users = list.map((u) => UserModel.fromJson(u)).toList();
      } else {
        _errorMessage = data['message'] ?? 'Error al obtener usuarios';
      }
    } catch (e) {
      _errorMessage = 'Error de conexión: $e';
    } finally {
      _isLoading = false;
      notifyListeners();
    }
  }

  Future<Map<String, dynamic>> saveUser({
    int? id,
    required String name,
    required String email,
    required String role,
    String? password,
    String? phone,
    String? rut,
    String? secCode,
    bool isActive = true,
  }) async {
    _isLoading = true;
    _errorMessage = null;
    notifyListeners();

    try {
      final body = {
        'name': name,
        'email': email,
        'role': role,
        'phone': phone,
        'rut': rut,
        'sec_code': secCode,
        'is_active': isActive,
      };
      if (password != null && password.isNotEmpty) {
        body['password'] = password;
      }

      final response = id != null 
          ? await ApiService.put('/users/$id', body: body)
          : await ApiService.post('/users', body: body);

      final data = jsonDecode(response.body);

      if ((response.statusCode == 200 || response.statusCode == 201) && data['success'] == true) {
        await fetchUsers();
        return {'success': true, 'message': data['message']};
      } else {
        return {'success': false, 'message': data['message'] ?? 'Error al guardar usuario'};
      }
    } catch (e) {
      return {'success': false, 'message': 'Error de conexión: $e'};
    } finally {
      _isLoading = false;
      notifyListeners();
    }
  }

  Future<bool> deleteUser(int id) async {
    try {
      final response = await ApiService.delete('/users/$id');
      final data = jsonDecode(response.body);

      if (response.statusCode == 200 && data['success'] == true) {
        _users.removeWhere((u) => u.id == id);
        notifyListeners();
        return true;
      }
      return false;
    } catch (_) {
      return false;
    }
  }
}
