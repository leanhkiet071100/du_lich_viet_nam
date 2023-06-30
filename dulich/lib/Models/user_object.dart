class UserObject {
  final int? id;
  final int cap;
  final String ten;
  final String? email;
  final String? password;
  final String soDienThoai;
  final String hinhAnh;
  final String token;

  UserObject(this.id, this.cap, this.ten, this.email, this.password,
      this.soDienThoai, this.hinhAnh, this.token);

  UserObject.fromJson(Map<String, dynamic> us)
      : id = us["id"],
        cap = us["cap"],
        ten = us["ten"],
        email = us["email"],
        password = "",
        soDienThoai = us["soDienThoai"],
        hinhAnh = us["hinhAnh"],
        token = us["token"];

  Map<String, dynamic> toJon() {
    return {
      "id": id,
      "cap": cap,
      "ten": ten,
      "email": email,
      "password": password,
      "soDienThoai": soDienThoai,
      "hinhAnh": hinhAnh,
      "token": token
    };
  }
}
