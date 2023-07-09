class TourObject {
  String? fullname;
  String? email;
  String? telephone;
  int? adukt;
  int? children;
  DateTime? ngaydat;
  int? goi_du_lich_id;

  TourObject({
    this.fullname,
    this.email,
    this.telephone,
    this.adukt,
    this.children,
    this.ngaydat,
    this.goi_du_lich_id,
  });

  factory TourObject.fromJson(Map<String, dynamic> json) {
    return TourObject(
      fullname: json['fullname'],
      email: json['email'],
      telephone: json['telephone'],
      adukt: json['adukt'],
      children: json['children'],
      ngaydat: json['ngaydat'],
      goi_du_lich_id: json['goi_du_lich_id'],
    );
  }
}
