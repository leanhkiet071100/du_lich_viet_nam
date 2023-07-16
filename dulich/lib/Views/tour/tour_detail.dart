import 'package:dulich/Models/goi_dulich.dart';
import 'package:dulich/Models/hoa_don.dart';
import 'package:dulich/Models/phieu_dat.dart';
import 'package:flutter/material.dart';
import 'package:intl/intl.dart';

class TourDetail extends StatefulWidget {
  final List<PhieuDat> list;
  const TourDetail({Key? key, required this.list}) : super(key: key);

  @override
  _TourDetailState createState() => _TourDetailState(list);
}

class _TourDetailState extends State<TourDetail> {
  final List<PhieuDat> list;
  _TourDetailState(this.list);

  List<GoiDuLich> lstDuLich = [];
  List<HoaDon> lstHoaDon = [];
  bool _isPaid = false;

  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    var format = NumberFormat.currency(locale: 'vi_VN', symbol: '₫');
    return ListView.builder(
      itemCount: list.length,
      itemBuilder: (context, index) => Container(
        padding: EdgeInsets.all(16.0),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.stretch,
          children: [
            Image.network(
              list[index].hinh_anh,
              height: 200.0,
              fit: BoxFit.cover,
            ),
            SizedBox(height: 16.0),
            Text(
              list[index].ten_du_lich,
              overflow: TextOverflow.ellipsis,
              style: TextStyle(fontSize: 24.0, fontWeight: FontWeight.bold),
            ),
            SizedBox(height: 8.0),
            Text(
              'Ngày đặt: ' + list[index].ngay_dat,
              style: TextStyle(fontSize: 16.0),
            ),
            SizedBox(height: 8.0),
            Text(
              'Ngày khởi hành: ' + list[index].ngay_khoi_hanh,
              style: TextStyle(fontSize: 16.0),
            ),
            SizedBox(height: 8.0),
            Text(
              'Số tiền thanh toán: ' + format.format(list[index].tong_tien),
              style: TextStyle(fontSize: 16.0),
            ),
            SizedBox(height: 10.0),
            Divider(
              thickness: 1,
            ),
            SizedBox(height: 10.0),
            Text(
              'Thông tin liên hệ',
              style: TextStyle(fontSize: 18.0, fontWeight: FontWeight.bold),
            ),
            SizedBox(height: 8.0),
            Text(
              'Họ tên: ' + list[index].ten,
              style: TextStyle(fontSize: 16.0),
            ),
            SizedBox(height: 8.0),
            Text(
              'Số điện thoại: ' + list[index].so_dien_thoai,
              style: TextStyle(fontSize: 16.0),
            ),
            SizedBox(height: 8.0),
            Text(
              'Email: ' + list[index].email,
              style: TextStyle(fontSize: 16.0),
            ),
            SizedBox(height: 10.0),
            Divider(
              thickness: 1,
            ),
            Text(
              'Chi tiết hoá đơn',
              style: TextStyle(fontSize: 18.0, fontWeight: FontWeight.bold),
            ),
            SizedBox(height: 16.0),
            Text(
              'Loại thanh toán: ' + list[index].loai_thanh_toan,
              style: TextStyle(fontSize: 16.0),
            ),
            SizedBox(height: 8.0),
            Text(
              'Tổng tiền: ' + format.format(list[index].tong_tien),
              style: TextStyle(fontSize: 16.0),
            ),
            SizedBox(height: 8.0),
            Row(
              children: [
                Text(
                  'Trạng thái: ',
                  style: TextStyle(fontSize: 16.0),
                ),
                _buildStatusWidget(context, list[index].trang_thai),
              ],
            ),
            SizedBox(height: 15.0),
          ],
        ),
      ),
    );
  }
}

Widget _buildStatusWidget(BuildContext context, String trang_thai) {
  switch (trang_thai) {
    case '1':
      return Text(
        'Đang chờ duyệt',
        style: TextStyle(
          fontSize: 16.0,
          color: Colors.green,
        ),
      );
    case '2':
      return Text(
        'Đã duyệt',
        style: TextStyle(
          fontSize: 16.0,
          color: Colors.red,
        ),
      );
    case '3':
      return Text(
        'Chờ duyệt hủy',
        style: TextStyle(
          fontSize: 16.0,
          color: Colors.red,
        ),
      );
    case '4':
      return Text(
        'Đã hủy',
        style: TextStyle(
          fontSize: 16.0,
          color: Colors.red,
        ),
      );
    case '3':
      return Text(
        'Hoàn thành',
        style: TextStyle(
          fontSize: 16.0,
          color: Colors.red,
        ),
      );
    default:
      return Text(
        'Lỗi',
        style: TextStyle(fontSize: 18.0),
      );
  }
}
