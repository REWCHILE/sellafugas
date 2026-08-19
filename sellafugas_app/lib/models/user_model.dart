class UserModel {
  final int id;
  final String name;
  final String email;
  final String role;
  final bool isAdmin;
  final String? phone;
  final String? rut;
  final String? secCode;
  final bool isActive;
  final int? certificatesCount;
  final String? createdAt;

  UserModel({
    required this.id,
    required this.name,
    required this.email,
    required this.role,
    required this.isAdmin,
    this.phone,
    this.rut,
    this.secCode,
    this.isActive = true,
    this.certificatesCount,
    this.createdAt,
  });

  factory UserModel.fromJson(Map<String, dynamic> json) {
    return UserModel(
      id: json['id'] is int ? json['id'] : int.tryParse(json['id'].toString()) ?? 0,
      name: json['name'] ?? '',
      email: json['email'] ?? '',
      role: json['role'] ?? 'technician',
      isAdmin: json['is_admin'] == true || json['role'] == 'admin',
      phone: json['phone'],
      rut: json['rut'],
      secCode: json['sec_code'],
      isActive: json['is_active'] == true || json['is_active'] == 1,
      certificatesCount: json['certificates_count'] != null 
          ? int.tryParse(json['certificates_count'].toString()) 
          : null,
      createdAt: json['created_at'],
    );
  }

  Map<String, dynamic> toJson() {
    return {
      'id': id,
      'name': name,
      'email': email,
      'role': role,
      'is_admin': isAdmin,
      'phone': phone,
      'rut': rut,
      'sec_code': secCode,
      'is_active': isActive,
      'certificates_count': certificatesCount,
      'created_at': createdAt,
    };
  }
}
