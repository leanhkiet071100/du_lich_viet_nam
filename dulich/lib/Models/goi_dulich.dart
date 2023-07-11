class GoiDuLich {
  final int id;
  final String ten;
  final String hinh_goi_du_lich;
  final String noi_khoi_hanh;
  final String ngay_khoi_hanh;
  final int gia_nguoi_lon;
  final int gia_tre_em;
  final String thong_tin_dich_vu;

  GoiDuLich(
    this.id,
    this.ten,
    this.hinh_goi_du_lich,
    this.noi_khoi_hanh,
    this.ngay_khoi_hanh,
    this.gia_nguoi_lon,
    this.gia_tre_em,
    this.thong_tin_dich_vu,
  );
  GoiDuLich.fromJson(Map<String, dynamic> json)
      : id = json['id'],
        ten = json['ten'],
        hinh_goi_du_lich = json['hinh_goi_du_lich'],
        noi_khoi_hanh = json['noi_khoi_hanh'],
        ngay_khoi_hanh = json['ngay_khoi_hanh'],
        gia_nguoi_lon = json['gia_nguoi_lon'],
        gia_tre_em = json['gia_tre_em'],
        thong_tin_dich_vu = json['thong_tin_dich_vu'];
}
