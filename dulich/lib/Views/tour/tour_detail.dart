import 'package:dulich/Global/color.dart';
import 'package:dulich/Global/contants.dart';
import 'package:flutter/material.dart';
import 'package:intl/intl.dart';

class TourDetail extends StatelessWidget {
  final String title;
  final String imageUrl;
  final int price;

  const TourDetail(
      {Key? key,
      required this.title,
      required this.imageUrl,
      required this.price})
      : super(key: key);

  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    var format = NumberFormat.currency(locale: 'vi_VN', symbol: '₫');
    return Scaffold(
      appBar: AppBar(
        toolbarHeight: size.height * 0.08,
        leading: GestureDetector(
          onTap: () {
            Navigator.pop(context);
          },
          child: const Icon(
            Icons.arrow_back_ios,
            color: blackColor,
          ),
        ),
        elevation: 0,
        backgroundColor: miniColor,
        title: Center(
          child: Text(
            'Đặt tour thành công       ',
            style: TextStyle(color: Colors.black, fontWeight: FontWeight.bold),
          ),
        ),
      ),
      body: Container(
        padding: EdgeInsets.all(16.0),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.stretch,
          children: [
            Image.network(
              imageUrl,
              height: 200.0,
              fit: BoxFit.cover,
            ),
            SizedBox(height: 16.0),
            Text(
              title,
              style: TextStyle(fontSize: 24.0, fontWeight: FontWeight.bold),
            ),
            SizedBox(height: 8.0),
            Text(
              'Ngày đặt: 14//7/2023 ',
              style: TextStyle(fontSize: 16.0),
            ),
            SizedBox(height: 8.0),
            Text(
              'Số tiền thanh toán: ' + format.format(price),
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
              'Họ tên: Nguyễn Văn A',
              style: TextStyle(fontSize: 16.0),
            ),
            SizedBox(height: 8.0),
            Text(
              'Số điện thoại: 0987654321',
              style: TextStyle(fontSize: 16.0),
            ),
            SizedBox(height: 8.0),
            Text(
              'Email: nguyenvana@gmail.com',
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
              'Loại thanh toán: Tiền mặt',
              style: TextStyle(fontSize: 16.0),
            ),
            SizedBox(height: 8.0),
            Text(
              'Tổng tiền: ' + format.format(72924252),
              style: TextStyle(fontSize: 16.0),
            ),
            SizedBox(height: 8.0),
            Text(
              'Trạng thái: Chưa duyệt',
              style: TextStyle(fontSize: 16.0),
            ),
            SizedBox(height: 15.0),
            kTextButton('Xác nhận', () {}),
          ],
        ),
      ),
    );
  }
}
