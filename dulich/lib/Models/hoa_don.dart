class HoaDon {
  final int id;
  final int tong_tien;
  final String loai_thanh_toan;

  HoaDon(this.id, this.tong_tien, this.loai_thanh_toan);

  HoaDon.fromJson(Map<String, dynamic> json)
      : id = json['id'],
        tong_tien = json['tong_tien'],
        loai_thanh_toan = json['loai_thanh_toan'];
}
