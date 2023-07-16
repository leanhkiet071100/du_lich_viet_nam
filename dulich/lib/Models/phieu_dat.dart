import 'package:dulich/Models/goi_dulich.dart';
import 'package:dulich/Models/hoa_don.dart';

class PhieuDat {
  final int id;
  final String ten;
  final String email;
  final String so_dien_thoai;
  final String ngay_dat;
  final String trang_thai;
  final int tong_tien;
  final String loai_thanh_toan;
  final String ten_du_lich;
  final String hinh_anh;
  final String ngay_khoi_hanh;

  PhieuDat(
      this.id,
      this.ten,
      this.email,
      this.so_dien_thoai,
      this.ngay_dat,
      this.trang_thai,
      this.tong_tien,
      this.loai_thanh_toan,
      this.ten_du_lich,
      this.hinh_anh,
      this.ngay_khoi_hanh);

  PhieuDat.fromJson(Map<String, dynamic> json)
      : id = json['id'],
        ten = json['ten'],
        email = json['email'],
        so_dien_thoai = json['so_dien_thoai'],
        ngay_dat = json['ngay_dat'],
        trang_thai = json['trang_thai'],
        tong_tien = json['tong_tien'],
        loai_thanh_toan = json['loai_thanh_toan'],
        ten_du_lich = json['ten_du_lich'],
        hinh_anh = json['hinh_anh'],
        ngay_khoi_hanh = json['ngay_khoi_hanh'];
}
