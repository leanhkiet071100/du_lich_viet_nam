class QuanAn {
  final int id;
  final int dia_diem_id;
  final String ten_quan_an;
  final String tinh;
  final String huyen;
  final String xa;
  final String dia_chi;
  final String so_dien_thoai;
  final String hinh_quan_an;
  final String mo_ta;

  QuanAn(this.id, this.dia_diem_id, this.ten_quan_an, this.tinh, this.huyen,
      this.xa, this.dia_chi, this.so_dien_thoai, this.hinh_quan_an, this.mo_ta);

  QuanAn.fromJson(Map<String, dynamic> json)
      : id = json['id'],
        dia_diem_id = json['dia_diem_id'],
        ten_quan_an = json['ten_quan_an'],
        tinh = json['tinh'],
        huyen = json['huyen'],
        xa = json['xa'],
        dia_chi = json['dia_chi'],
        so_dien_thoai = json['so_dien_thoai'],
        hinh_quan_an = json['hinh_quan_an'],
        mo_ta = json['mo_ta'];
}
