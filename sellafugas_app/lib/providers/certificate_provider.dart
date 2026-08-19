import 'dart:convert';
import 'dart:io';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import '../core/services/api_service.dart';
import '../models/certificate_model.dart';

class CertificateProvider with ChangeNotifier {
  bool _isLoading = false;
  bool _isLoadingMore = false;
  String? _errorMessage;

  List<CertificateModel> _certificates = [];
  CertificateModel? _selectedCertificate;

  // Pagination
  int _currentPage = 1;
  int _lastPage = 1;
  bool _hasMore = false;

  // Filters
  String _searchQuery = '';
  String? _selectedStatus;
  String? _selectedDocumentType;

  // Defaults info
  String _nextFolio = '257830';
  String _defaultWorkDetails = '';
  Map<String, String> _defaultGasfiter = {
    'name': 'Domingo Isain Plaza Caamaño',
    'rut': '12.738.961-6',
    'sec_class': 'Gasfiter Certificado Autorizado SEC Clase 3',
  };

  bool get isLoading => _isLoading;
  bool get isLoadingMore => _isLoadingMore;
  String? get errorMessage => _errorMessage;
  List<CertificateModel> get certificates => _certificates;
  CertificateModel? get selectedCertificate => _selectedCertificate;
  bool get hasMore => _hasMore;
  int get currentPage => _currentPage;
  int get lastPage => _lastPage;
  String get searchQuery => _searchQuery;
  String? get selectedStatus => _selectedStatus;
  String? get selectedDocumentType => _selectedDocumentType;
  String get nextFolio => _nextFolio;
  String get defaultWorkDetails => _defaultWorkDetails;
  Map<String, String> get defaultGasfiter => _defaultGasfiter;

  void setSearchQuery(String query) {
    _searchQuery = query;
    fetchCertificates(refresh: true);
  }

  void setStatusFilter(String? status) {
    _selectedStatus = status;
    fetchCertificates(refresh: true);
  }

  void setDocumentTypeFilter(String? docType) {
    _selectedDocumentType = docType;
    fetchCertificates(refresh: true);
  }

  Future<void> fetchCertificates({bool refresh = false}) async {
    if (refresh) {
      _currentPage = 1;
      _hasMore = false;
      _isLoading = true;
    }

    _errorMessage = null;
    notifyListeners();

    try {
      final queryParams = <String, dynamic>{
        'page': _currentPage,
        'per_page': 15,
      };

      if (_searchQuery.isNotEmpty) {
        queryParams['search'] = _searchQuery;
      }
      if (_selectedStatus != null && _selectedStatus!.isNotEmpty) {
        queryParams['status'] = _selectedStatus;
      }
      if (_selectedDocumentType != null && _selectedDocumentType!.isNotEmpty) {
        queryParams['document_type'] = _selectedDocumentType;
      }

      final response = await ApiService.get('/certificates', queryParams: queryParams);
      final data = jsonDecode(response.body);

      if (response.statusCode == 200 && data['success'] == true) {
        final List<dynamic> itemsJson = data['data'] ?? [];
        final items = itemsJson.map((json) => CertificateModel.fromJson(json)).toList();

        if (refresh || _currentPage == 1) {
          _certificates = items;
        } else {
          _certificates.addAll(items);
        }

        final pagination = data['pagination'];
        if (pagination != null) {
          _currentPage = pagination['current_page'] ?? 1;
          _lastPage = pagination['last_page'] ?? 1;
          _hasMore = pagination['has_more'] ?? false;
        }
      } else {
        _errorMessage = data['message'] ?? 'Error al obtener certificados';
      }
    } catch (e) {
      _errorMessage = 'Error de conexión: $e';
    } finally {
      _isLoading = false;
      _isLoadingMore = false;
      notifyListeners();
    }
  }

  Future<void> loadMore() async {
    if (_hasMore && !_isLoadingMore && !_isLoading) {
      _isLoadingMore = true;
      _currentPage++;
      notifyListeners();
      await fetchCertificates();
    }
  }

  Future<CertificateModel?> getCertificateDetail(int id) async {
    _isLoading = true;
    _errorMessage = null;
    notifyListeners();

    try {
      final response = await ApiService.get('/certificates/$id');
      final data = jsonDecode(response.body);

      if (response.statusCode == 200 && data['success'] == true) {
        _selectedCertificate = CertificateModel.fromJson(data['certificate']);
        return _selectedCertificate;
      } else {
        _errorMessage = data['message'] ?? 'Error al cargar detalle';
        return null;
      }
    } catch (e) {
      _errorMessage = 'Error de conexión: $e';
      return null;
    } finally {
      _isLoading = false;
      notifyListeners();
    }
  }

  Future<void> fetchDefaults() async {
    try {
      final response = await ApiService.get('/certificates/defaults');
      final data = jsonDecode(response.body);

      if (response.statusCode == 200 && data['success'] == true) {
        _nextFolio = data['next_folio']?.toString() ?? '257830';
        _defaultWorkDetails = data['default_details'] ?? '';
        if (data['default_gasfiter'] != null) {
          _defaultGasfiter = {
            'name': data['default_gasfiter']['name'] ?? '',
            'rut': data['default_gasfiter']['rut'] ?? '',
            'sec_class': data['default_gasfiter']['sec_class'] ?? '',
          };
        }
        notifyListeners();
      }
    } catch (_) {}
  }

  Future<Map<String, dynamic>> saveCertificate({
    int? id,
    required String certificateNumber,
    required String documentType,
    required String date,
    required String clientName,
    String? clientPhone,
    String? clientAddress,
    String? clientComuna,
    String? clientProvincia,
    required List<CertificateItem> items,
    required String taxType,
    String? workDetails,
    required String gasfiterName,
    required String gasfiterRut,
    required String gasfiterSecClass,
    required String status,
    String? notes,
    File? photo1,
    File? photo2,
    File? photo3,
    List<File>? extraPhotos,
  }) async {
    _isLoading = true;
    _errorMessage = null;
    notifyListeners();

    try {
      final fields = <String, String>{
        'certificate_number': certificateNumber,
        'document_type': documentType,
        'date': date,
        'client_name': clientName,
        'client_phone': clientPhone ?? '',
        'client_address': clientAddress ?? '',
        'client_comuna': clientComuna ?? '',
        'client_provincia': clientProvincia ?? '',
        'tax_type': taxType,
        'work_details': workDetails ?? '',
        'gasfiter_name': gasfiterName,
        'gasfiter_rut': gasfiterRut,
        'gasfiter_sec_class': gasfiterSecClass,
        'status': status,
        'notes': notes ?? '',
        'items': jsonEncode(items.map((i) => i.toJson()).toList()),
      };

      final files = <http.MultipartFile>[];
      if (photo1 != null && await photo1.exists()) {
        files.add(await http.MultipartFile.fromPath('photo_1', photo1.path));
      }
      if (photo2 != null && await photo2.exists()) {
        files.add(await http.MultipartFile.fromPath('photo_2', photo2.path));
      }
      if (photo3 != null && await photo3.exists()) {
        files.add(await http.MultipartFile.fromPath('photo_3', photo3.path));
      }
      if (extraPhotos != null && extraPhotos.isNotEmpty) {
        for (var i = 0; i < extraPhotos.length; i++) {
          if (await extraPhotos[i].exists()) {
            files.add(await http.MultipartFile.fromPath('extra_photos[]', extraPhotos[i].path));
          }
        }
      }

      final endpoint = id != null ? '/certificates/$id' : '/certificates';
      final response = await ApiService.multipart(
        endpoint: endpoint,
        method: 'POST',
        fields: fields,
        files: files,
      );

      final data = jsonDecode(response.body);

      if (response.statusCode == 200 || response.statusCode == 201) {
        if (data['success'] == true) {
          final savedCert = CertificateModel.fromJson(data['certificate']);
          _selectedCertificate = savedCert;
          fetchCertificates(refresh: true);
          return {'success': true, 'certificate': savedCert};
        }
      }

      final errorMsg = data['message'] ?? (data['errors'] != null ? jsonEncode(data['errors']) : 'Error al guardar');
      return {'success': false, 'message': errorMsg};
    } catch (e) {
      return {'success': false, 'message': 'Error al conectar: $e'};
    } finally {
      _isLoading = false;
      notifyListeners();
    }
  }

  Future<bool> convertToCertificate(int id) async {
    _isLoading = true;
    notifyListeners();

    try {
      final response = await ApiService.post('/certificates/$id/convert');
      final data = jsonDecode(response.body);

      if (response.statusCode == 200 && data['success'] == true) {
        _selectedCertificate = CertificateModel.fromJson(data['certificate']);
        fetchCertificates(refresh: true);
        return true;
      }
      return false;
    } catch (_) {
      return false;
    } finally {
      _isLoading = false;
      notifyListeners();
    }
  }

  Future<bool> deleteCertificate(int id) async {
    try {
      final response = await ApiService.delete('/certificates/$id');
      final data = jsonDecode(response.body);

      if (response.statusCode == 200 && data['success'] == true) {
        _certificates.removeWhere((c) => c.id == id);
        notifyListeners();
        return true;
      }
      return false;
    } catch (_) {
      return false;
    }
  }
}
