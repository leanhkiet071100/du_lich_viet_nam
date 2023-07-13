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
  UserObject.fromJson(Map<String, dynamic> json)
      : id = json['id'],
        ten = json['ten'],
        email = json['email'],
        sdt = json['sdt'],
        token = json['token'];

  Map<String, dynamic> toJson() {
    return {
      "id": id,
      "ten": ten,
      "email": email,
      "sdt": sdt,
      "token": token,
    };
  }
}
