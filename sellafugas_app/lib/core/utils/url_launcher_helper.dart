import 'package:flutter/foundation.dart';
import 'package:url_launcher/url_launcher.dart';

class UrlLauncherHelper {
  /// Cleans and formats Chilean phone numbers with +56 prefix if needed
  static String formatChileanPhone(String rawPhone) {
    String clean = rawPhone.replaceAll(RegExp(r'[^0-9]'), '');
    if (clean.length == 9 && clean.startsWith('9')) {
      return '56$clean';
    } else if (clean.length == 8) {
      return '56$clean';
    }
    return clean;
  }

  /// Bulletproof WhatsApp Share Intent launcher with fallback cascade
  static Future<bool> openWhatsApp({
    required String phone,
    required String message,
  }) async {
    final cleanPhone = formatChileanPhone(phone);
    final encodedMsg = Uri.encodeComponent(message);

    // 1. Try native whatsapp:// scheme first
    final nativeUri = Uri.parse("whatsapp://send?phone=$cleanPhone&text=$encodedMsg");
    try {
      if (await canLaunchUrl(nativeUri)) {
        final success = await launchUrl(nativeUri, mode: LaunchMode.externalApplication);
        if (success) return true;
      }
    } catch (e) {
      debugPrint('Native whatsapp scheme failed: $e');
    }

    // 2. Fallback to api.whatsapp.com
    final apiUri = Uri.parse("https://api.whatsapp.com/send?phone=$cleanPhone&text=$encodedMsg");
    try {
      final success = await launchUrl(apiUri, mode: LaunchMode.externalApplication);
      if (success) return true;
    } catch (e) {
      debugPrint('api.whatsapp.com external failed: $e');
    }

    // 3. Fallback to wa.me with platformDefault (Browser)
    final waUri = Uri.parse("https://wa.me/$cleanPhone?text=$encodedMsg");
    try {
      final success = await launchUrl(waUri, mode: LaunchMode.platformDefault);
      if (success) return true;
    } catch (e) {
      debugPrint('wa.me platformDefault failed: $e');
    }

    // 4. Final attempt with inAppBrowser
    try {
      return await launchUrl(waUri, mode: LaunchMode.inAppBrowserView);
    } catch (e) {
      debugPrint('wa.me inAppBrowser failed: $e');
      return false;
    }
  }

  /// Bulletproof PDF Viewer / Download URL Launcher
  static Future<bool> openPdf(String pdfUrl) async {
    if (pdfUrl.trim().isEmpty) return false;
    
    // Ensure full URL scheme
    String url = pdfUrl.trim();
    if (!url.startsWith('http://') && !url.startsWith('https://')) {
      url = 'https://$url';
    }

    final uri = Uri.parse(url);

    // Try external application first
    try {
      bool success = await launchUrl(uri, mode: LaunchMode.externalApplication);
      if (success) return true;
    } catch (e) {
      debugPrint('PDF externalApplication failed: $e');
    }

    // Try platform default (System Browser Chrome/Safari)
    try {
      bool success = await launchUrl(uri, mode: LaunchMode.platformDefault);
      if (success) return true;
    } catch (e) {
      debugPrint('PDF platformDefault failed: $e');
    }

    // Try in-app webview
    try {
      return await launchUrl(uri, mode: LaunchMode.inAppBrowserView);
    } catch (e) {
      debugPrint('PDF inAppBrowserView failed: $e');
      return false;
    }
  }

  /// Bulletproof Phone Call Launcher
  static Future<bool> makeCall(String phone) async {
    final clean = phone.replaceAll(RegExp(r'[^0-9+]'), '');
    if (clean.isEmpty) return false;
    final uri = Uri.parse('tel:$clean');
    try {
      return await launchUrl(uri);
    } catch (e) {
      debugPrint('Error llamando al teléfono ($phone): $e');
      return false;
    }
  }
}
