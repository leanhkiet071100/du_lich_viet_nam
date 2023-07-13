class PhieuDat {
  final int id;
  final String ten;
  final String email;
  final String so_dien_thoai;
  final String so_nguoi_lon;
  // final int so_tre_em;
  final int gia_nguoi_lon;
  // final String gia_tre_em;
  // final String ngay_khoi_hanh;

  PhieuDat(this.id, this.ten, this.email, this.so_dien_thoai, this.so_nguoi_lon,
      this.gia_nguoi_lon);

  PhieuDat.fromJson(Map<String, dynamic> json)
      : id = json['id'],
        ten = json['ten'],
        email = json['email'],
        so_dien_thoai = json['so_dien_thoai'],
        so_nguoi_lon = json['so_nguoi_lon'],
        // so_tre_em = json['so_tre_em'],
        gia_nguoi_lon = json['gia_nguoi_lon'];
  // gia_tre_em = json['gia_tre_em'],
  // ngay_khoi_hanh = json['ngay_khoi_hanh'];
}
