import 'dart:convert';
import 'package:flutter/material.dart';
import '../core/services/api_service.dart';
import '../models/certificate_model.dart';
import '../models/dashboard_metrics_model.dart';

class DashboardProvider with ChangeNotifier {
  bool _isLoading = false;
  String? _errorMessage;
  DashboardMetricsModel? _metrics;
  List<CertificateModel> _recentDocuments = [];

  bool get isLoading => _isLoading;
  String? get errorMessage => _errorMessage;
  DashboardMetricsModel? get metrics => _metrics;
  List<CertificateModel> get recentDocuments => _recentDocuments;

  Future<void> fetchDashboardData() async {
    _isLoading = true;
    _errorMessage = null;
    notifyListeners();

    try {
      final response = await ApiService.get('/dashboard/metrics');
      final data = jsonDecode(response.body);

      if (response.statusCode == 200 && data['success'] == true) {
        _metrics = DashboardMetricsModel.fromJson(data['metrics']);

        if (data['recent_documents'] != null && data['recent_documents'] is List) {
          _recentDocuments = (data['recent_documents'] as List)
              .map((doc) => CertificateModel.fromJson(doc as Map<String, dynamic>))
              .toList();
        }
      } else {
        _errorMessage = data['message'] ?? 'Error al cargar métricas';
      }
    } catch (e) {
      _errorMessage = 'Error de conexión: $e';
    } finally {
      _isLoading = false;
      notifyListeners();
    }
  }
}
