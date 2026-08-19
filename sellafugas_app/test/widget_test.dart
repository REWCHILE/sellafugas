import 'package:flutter_test/flutter_test.dart';
import 'package:sellafugas_app/models/certificate_model.dart';
import 'package:sellafugas_app/models/user_model.dart';
import 'package:sellafugas_app/models/dashboard_metrics_model.dart';

void main() {
  group('Models Unit Tests', () {
    test('UserModel parse JSON correctly', () {
      final json = {
        'id': 1,
        'name': 'Domingo Isain Plaza Caamaño',
        'email': 'domi@sellafugas.cl',
        'role': 'admin',
        'is_admin': true,
        'rut': '12.738.961-6',
        'sec_code': 'Clase 3',
        'is_active': true,
      };

      final user = UserModel.fromJson(json);
      expect(user.id, 1);
      expect(user.name, 'Domingo Isain Plaza Caamaño');
      expect(user.isAdmin, true);
    });

    test('CertificateModel parse items and calculations correctly', () {
      final json = {
        'id': 101,
        'certificate_number': '14415',
        'document_type': 'certificado',
        'client_name': 'Juan Pérez',
        'status': 'emitido',
        'tax_type': 'factura',
        'subtotal_neto': 100000,
        'tax_amount': 19000,
        'total_price': 119000,
        'items': [
          {
            'description': 'Sellado Prodoral R6-1',
            'quantity': 1,
            'unit_price': 100000,
            'total': 100000,
          }
        ],
      };

      final cert = CertificateModel.fromJson(json);
      expect(cert.certificateNumber, '14415');
      expect(cert.isCertificate, true);
      expect(cert.items.length, 1);
      expect(cert.totalPrice, 119000.0);
    });

    test('DashboardMetricsModel parse JSON correctly', () {
      final json = {
        'total_certificates': 85,
        'total_quotes': 40,
        'total_documents': 125,
        'total_neto_amount': 45000000,
        'formatted_neto': '\$45.000.000',
        'total_facturas_count': 70,
        'total_sin_doc_count': 15,
        'this_month_count': 12,
        'this_month_neto': 6500000,
        'formatted_month_neto': '\$6.500.000',
        'status_counts': {
          'emitido': 100,
          'pendiente': 15,
          'completado': 10,
        },
      };

      final metrics = DashboardMetricsModel.fromJson(json);
      expect(metrics.totalCertificates, 85);
      expect(metrics.totalQuotes, 40);
      expect(metrics.statusCounts['emitido'], 100);
    });
  });
}
