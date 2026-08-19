import 'dart:convert';
import 'dart:io';
import 'package:flutter/foundation.dart';
import 'package:http/http.dart' as http;
import 'package:shared_preferences/shared_preferences.dart';

class ApiService {
  static const String _keyBaseUrl = 'custom_base_url';
  static const String _keyToken = 'auth_token';

  // Default Base URL
  static String get defaultBaseUrl {
    if (kIsWeb) {
      return 'http://127.0.0.1:8000/api';
    } else if (Platform.isAndroid) {
      // Android Emulator host loopback or default LAN
      return 'http://10.0.2.2:8000/api';
    } else {
      return 'http://127.0.0.1:8000/api';
    }
  }

  static Future<String> getBaseUrl() async {
    final prefs = await SharedPreferences.getInstance();
    return prefs.getString(_keyBaseUrl) ?? defaultBaseUrl;
  }

  static Future<void> setBaseUrl(String url) async {
    final prefs = await SharedPreferences.getInstance();
    String cleanUrl = url.trim();
    if (cleanUrl.endsWith('/')) {
      cleanUrl = cleanUrl.substring(0, cleanUrl.length - 1);
    }
    if (!cleanUrl.endsWith('/api')) {
      cleanUrl = '$cleanUrl/api';
    }
    await prefs.setString(_keyBaseUrl, cleanUrl);
  }

  static Future<String?> getToken() async {
    final prefs = await SharedPreferences.getInstance();
    return prefs.getString(_keyToken);
  }

  static Future<void> setToken(String token) async {
    final prefs = await SharedPreferences.getInstance();
    await prefs.setString(_keyToken, token);
  }

  static Future<void> clearToken() async {
    final prefs = await SharedPreferences.getInstance();
    await prefs.remove(_keyToken);
  }

  static Future<Map<String, String>> _getHeaders({bool isMultipart = false}) async {
    final token = await getToken();
    final headers = <String, String>{
      'Accept': 'application/json',
    };
    if (!isMultipart) {
      headers['Content-Type'] = 'application/json';
    }
    if (token != null && token.isNotEmpty) {
      headers['Authorization'] = 'Bearer $token';
    }
    return headers;
  }

  // GET Request
  static Future<http.Response> get(String endpoint, {Map<String, dynamic>? queryParams}) async {
    final baseUrl = await getBaseUrl();
    var uri = Uri.parse('$baseUrl$endpoint');
    if (queryParams != null && queryParams.isNotEmpty) {
      final stringParams = queryParams.map((k, v) => MapEntry(k, v.toString()));
      uri = uri.replace(queryParameters: stringParams);
    }
    final headers = await _getHeaders();
    return await http.get(uri, headers: headers);
  }

  // POST Request
  static Future<http.Response> post(String endpoint, {Map<String, dynamic>? body}) async {
    final baseUrl = await getBaseUrl();
    final uri = Uri.parse('$baseUrl$endpoint');
    final headers = await _getHeaders();
    return await http.post(
      uri,
      headers: headers,
      body: body != null ? jsonEncode(body) : null,
    );
  }

  // PUT Request
  static Future<http.Response> put(String endpoint, {Map<String, dynamic>? body}) async {
    final baseUrl = await getBaseUrl();
    final uri = Uri.parse('$baseUrl$endpoint');
    final headers = await _getHeaders();
    return await http.put(
      uri,
      headers: headers,
      body: body != null ? jsonEncode(body) : null,
    );
  }

  // DELETE Request
  static Future<http.Response> delete(String endpoint) async {
    final baseUrl = await getBaseUrl();
    final uri = Uri.parse('$baseUrl$endpoint');
    final headers = await _getHeaders();
    return await http.delete(uri, headers: headers);
  }

  // Multipart POST / PUT Request for photo uploads
  static Future<http.Response> multipart({
    required String endpoint,
    required String method, // 'POST'
    Map<String, String>? fields,
    List<http.MultipartFile>? files,
  }) async {
    final baseUrl = await getBaseUrl();
    final uri = Uri.parse('$baseUrl$endpoint');
    final headers = await _getHeaders(isMultipart: true);

    final request = http.MultipartRequest(method, uri);
    request.headers.addAll(headers);

    if (fields != null) {
      request.fields.addAll(fields);
    }
    if (files != null) {
      request.files.addAll(files);
    }

    final streamedResponse = await request.send();
    return await http.Response.fromStream(streamedResponse);
  }
}
