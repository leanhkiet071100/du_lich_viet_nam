class TourObject {
  String? fullname;
  String? email;
  String? telephone;
  int? adukt;
  int? children;
  int? goi_du_lich_id;

  TourObject({
    this.fullname,
    this.email,
    this.telephone,
    this.adukt,
    this.children,
    this.goi_du_lich_id,
  });

  factory TourObject.fromJson(Map<String, dynamic> json) {
    return TourObject(
      fullname: json['fullname'],
      email: json['email'],
      telephone: json['telephone'],
      adukt: json['adukt'],
      children: json['children'],
      goi_du_lich_id: json['goi_du_lich_id'],
    );
  }
}
