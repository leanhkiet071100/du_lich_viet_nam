class PhieuDat {
  final int id;
  final String ten;
  final String email;
  final String so_dien_thoai;
  final String ngay_dat;

  PhieuDat(this.id, this.ten, this.email, this.so_dien_thoai, this.ngay_dat);

  PhieuDat.fromJson(Map<String, dynamic> json)
      : id = json['id'],
        ten = json['ten'],
        email = json['email'],
        so_dien_thoai = json['so_dien_thoai'],
        ngay_dat = json['ngay_dat'];
}
