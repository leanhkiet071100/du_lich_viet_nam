class Hotel {
  final int id;
  final String ten_noi_luu_tru;
  final String tinh;
  final String huyen;
  final String xa;
  final String dia_chi;
  final String so_dien_thoai;
  final String hinh_noi_luu_tru;

  Hotel(this.id, this.ten_noi_luu_tru, this.tinh, this.huyen, this.xa,
      this.dia_chi, this.so_dien_thoai, this.hinh_noi_luu_tru);

  Hotel.fromJson(Map<String, dynamic> json)
      : id = json['id'],
        ten_noi_luu_tru = json['ten_noi_luu_tru'],
        tinh = json['tinh'],
        huyen = json['huyen'],
        xa = json['xa'],
        dia_chi = json['dia_chi'],
        so_dien_thoai = json['so_dien_thoai'],
        hinh_noi_luu_tru = json['hinh_noi_luu_tru'];
}
