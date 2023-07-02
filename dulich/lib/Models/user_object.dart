class UserObject {
  int? id;
  String? ten;
  String? email;
  String? sdt;
  String? token;

  UserObject({
    this.id,
    this.ten,
    this.email,
    this.sdt,
    this.token,
  });

  // function to convert json data to user model
  factory UserObject.fromJson(Map<String, dynamic> json) {
    return UserObject(
      id: json['user']['id'],
      ten: json['user']['ten'],
      email: json['user']['email'],
      sdt: json['user']['sdt'],
      token: json['token'],
    );
  }
}
