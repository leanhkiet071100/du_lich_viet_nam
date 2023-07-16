class MonAn {
  final int id;
  final int quan_an_id;
  final String ten_mon;
  final String gia_ban;
  final String hinh_mon_an;

  MonAn(this.id, this.quan_an_id, this.ten_mon, this.gia_ban, this.hinh_mon_an);

  MonAn.fromJson(Map<String, dynamic> json)
      : id = json['id'],
        quan_an_id = json['quan_an_id'],
        ten_mon = json['ten_mon'],
        gia_ban = json['gia_ban'],
        hinh_mon_an = json['hinh_mon_an'];
}
