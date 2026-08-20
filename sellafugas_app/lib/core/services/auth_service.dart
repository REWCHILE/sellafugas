import 'dart:convert';
import 'package:shared_preferences/shared_preferences.dart';
import '../../models/user_model.dart';
import 'api_service.dart';

class AuthService {
  static const String _keyUser = 'cached_user_json';

  static Future<Map<String, dynamic>> login({
    required String email,
    required String password,
  }) async {
    try {
      final response = await ApiService.post('/login', body: {
        'email': email.trim(),
        'password': password,
        'device_name': 'SellafuGas Mobile App',
      });

      final data = jsonDecode(response.body);

      if (response.statusCode == 200 && data['success'] == true) {
        final token = data['token'];
        final userMap = data['user'];

        await ApiService.setToken(token);

        final prefs = await SharedPreferences.getInstance();
        await prefs.setString(_keyUser, jsonEncode(userMap));

        final user = UserModel.fromJson(userMap);
        return {'success': true, 'user': user, 'token': token};
      } else {
        return {
          'success': false,
          'message': data['message'] ?? 'Error al iniciar sesión',
        };
      }
    } catch (e) {
      return {
        'success': false,
        'message': 'No fue posible conectar con el servidor ($e). Verifique la URL de conexión.',
      };
    }
  }

  static Future<UserModel?> getCachedUser() async {
    final prefs = await SharedPreferences.getInstance();
    final userString = prefs.getString(_keyUser);
    if (userString != null) {
      try {
        final map = jsonDecode(userString);
        return UserModel.fromJson(map);
      } catch (_) {
        return null;
      }
    }
    return null;
  }

  static Future<Map<String, dynamic>> fetchCurrentUser() async {
    try {
      final response = await ApiService.get('/me');
      if (response.statusCode == 200) {
        final data = jsonDecode(response.body);
        if (data['success'] == true && data['user'] != null) {
          final user = UserModel.fromJson(data['user']);
          final prefs = await SharedPreferences.getInstance();
          await prefs.setString(_keyUser, jsonEncode(data['user']));
          return {'status': 'success', 'user': user};
        }
      } else if (response.statusCode == 401) {
        return {'status': 'unauthorized'};
      }
    } catch (_) {}
    return {'status': 'network_error'};
  }

  static Future<void> logout() async {
    try {
      await ApiService.post('/logout');
    } catch (_) {}
    await ApiService.clearToken();
    final prefs = await SharedPreferences.getInstance();
    await prefs.remove(_keyUser);
  }
}
