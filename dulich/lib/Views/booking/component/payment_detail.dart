import 'package:dulich/Global/color.dart';
import 'package:dulich/Models/phieu_dat.dart';
import 'package:flutter/material.dart';
import 'package:intl/intl.dart';

class OrderDetailsScreen extends StatefulWidget {
  final List<PhieuDat> listPhietDat;
  OrderDetailsScreen({Key? key, required this.listPhietDat}) : super(key: key);

  @override
  _OrderDetailsScreenState createState() =>
      _OrderDetailsScreenState(listPhietDat);
}

class _OrderDetailsScreenState extends State<OrderDetailsScreen> {
  List<PhieuDat> listPhietDat;
  _OrderDetailsScreenState(this.listPhietDat);

  final format = NumberFormat.currency(locale: 'vi_VN', symbol: '₫');
  int total = 0;
  String _paymentMethod = 'Tiền mặt';

  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return ListView.builder(
      itemCount: listPhietDat.length,
      itemBuilder: (context, index) => Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          Container(
            padding: EdgeInsets.only(left: 10, top: 20),
            child: Text(
              'Thông tin chi tiết',
              style: TextStyle(
                  fontSize: 20,
                  fontWeight: FontWeight.w500,
                  color: Colors.black),
            ),
          ),
          Text('Email: ' + listPhietDat[index].email,
              style: TextStyle(fontSize: 16, color: blackColor)),
          // SizedBox(height: 8.0),
          // Text('Số điện thoại: ' + listPhietDat[index].so_dien_thoai,
          //     style: TextStyle(fontSize: 16, color: blackColor)),
          // SizedBox(height: 8.0),
          // Text('Ngày xuất phát: ' + listPhietDat[index].ngay_khoi_hanh,
          //     style: TextStyle(fontSize: 16, color: blackColor)),
          // Text(
          //     'Số Người lớn: ' +
          //         listPhietDat[index].so_nguoi_lon.toString(),
          //     style: TextStyle(fontSize: 16, color: blackColor)),
          // Text(
          //     'Số Người lớn: ' +
          //         listPhietDat[index].so_tre_em.toString(),
          //     style: TextStyle(fontSize: 16, color: blackColor)),
          // Text(
          //     'Số Người lớn: ' +
          //         listPhietDat[index].gia_nguoi_lon.toString(),
          //     style: TextStyle(fontSize: 16, color: blackColor)),
          // Text(
          //     'Số Người lớn: ' +
          //         listPhietDat[index].gia_tre_em.toString(),
          //     style: TextStyle(fontSize: 16, color: blackColor)),
          SizedBox(height: 5.0),
          // ListTile(
          //   title: Text(
          //     'Họ tên: ' + listPhietDat[index].ten,
          //     style: TextStyle(fontSize: 16, color: blackColor),
          //   ),
          //   subtitle: Column(
          //     mainAxisAlignment: MainAxisAlignment.start,
          //     crossAxisAlignment: CrossAxisAlignment.start,
          //     children: [
          //       SizedBox(height: 8.0),
          //       Text('Email: ' + listPhietDat[index].email,
          //           style: TextStyle(fontSize: 16, color: blackColor)),
          //       SizedBox(height: 8.0),
          //       Text(
          //           'Số điện thoại: ' +
          //               listPhietDat[index].so_dien_thoai,
          //           style: TextStyle(fontSize: 16, color: blackColor)),
          //       SizedBox(height: 8.0),
          //       Text(
          //           'Ngày xuất phát: ' +
          //               listPhietDat[index].ngay_khoi_hanh,
          //           style: TextStyle(fontSize: 16, color: blackColor)),
          //       Text(
          //           'Số Người lớn: ' +
          //               listPhietDat[index].so_nguoi_lon.toString(),
          //           style: TextStyle(fontSize: 16, color: blackColor)),
          //     ],
          //   ),
          // ),

          // Text(
          //   'Số lượng khách hàng',
          //   style: TextStyle(
          //     fontSize: 18.0,
          //     fontWeight: FontWeight.bold,
          //   ),
          // ),
          // SizedBox(height: 10.0),
          // Container(
          //   padding: EdgeInsets.only(left: 10),
          //   child: Text(
          //     'Người lớn: ' +
          //         listPhietDat[index].so_nguoi_lon.toString(),
          //     style: TextStyle(
          //       fontSize: 16.0,
          //     ),
          //   ),
          // ),
          // SizedBox(height: 8.0),
          // Container(
          //   padding: EdgeInsets.only(left: 10),
          //   child: Text(
          //     'Trẻ em: ' + listPhietDat[index].so_tre_em.toString(),
          //     style: TextStyle(
          //       fontSize: 16.0,
          //     ),
          //   ),
          // ),
          SizedBox(height: 10.0),
        ],
      ),

      // Card(
      //   child: Column(
      //     crossAxisAlignment: CrossAxisAlignment.start,
      //     children: [
      //       Container(
      //         padding: EdgeInsets.only(left: 5),
      //         child: Text(
      //           'Tổng cộng ',
      //           style: TextStyle(
      //             fontSize: 18.0,
      //             fontWeight: FontWeight.bold,
      //           ),
      //         ),
      //       ),
      //       ListTile(
      //         title: Row(
      //           mainAxisAlignment: MainAxisAlignment.spaceBetween,
      //           children: [
      //             Text(
      //               "Gói du lịch: ",
      //               style: TextStyle(
      //                 fontSize: 16,
      //                 color: blackColor,
      //               ),
      //             ),
      //             Text(
      //               list[index].ten,
      //               style: TextStyle(
      //                 fontSize: 16,
      //                 color: blackColor,
      //               ),
      //             ),
      //           ],
      //         ),
      //         subtitle: Column(
      //           crossAxisAlignment: CrossAxisAlignment.start,
      //           children: [
      //             SizedBox(height: 10.0),
      //             Text(
      //               'Số lượng :',
      //               style: TextStyle(
      //                 fontSize: 16,
      //                 color: blackColor,
      //               ),
      //             ),
      //             SizedBox(height: 10.0),
      //             Row(
      //               mainAxisAlignment: MainAxisAlignment.spaceBetween,
      //               children: [
      //                 Text(
      //                   '1. Người lớn: ',
      //                   style: TextStyle(
      //                     fontSize: 16,
      //                     color: blackColor,
      //                   ),
      //                 ),
      //                 Text(
      //                   listPhietDat[index].so_nguoi_lon.toString(),
      //                   style: TextStyle(
      //                     fontSize: 16,
      //                     color: blackColor,
      //                   ),
      //                 ),
      //                 Text(
      //                   format.format(listPhietDat[index].so_nguoi_lon *
      //                       list[index].gia_nguoi_lon),
      //                   style: TextStyle(
      //                     fontSize: 16,
      //                     color: blackColor,
      //                   ),
      //                 ),
      //               ],
      //             ),
      //             SizedBox(height: 10.0),
      //             Row(
      //               mainAxisAlignment: MainAxisAlignment.spaceBetween,
      //               children: [
      //                 Text(
      //                   '2. Trẻ em:      ',
      //                   style: TextStyle(
      //                     fontSize: 16,
      //                     color: blackColor,
      //                   ),
      //                 ),
      //                 Text(
      //                   listPhietDat[index].so_tre_em.toString(),
      //                   style: TextStyle(
      //                     fontSize: 16,
      //                     color: blackColor,
      //                   ),
      //                 ),
      //                 Text(
      //                   format.format(4500000),
      //                   style: TextStyle(
      //                     fontSize: 16,
      //                     color: blackColor,
      //                   ),
      //                 ),
      //               ],
      //             ),
      //           ],
      //         ),
      //       ),
      //       SizedBox(height: 15.0),
      //       Container(
      //         padding: EdgeInsets.only(left: 5),
      //         child: Align(
      //           alignment: Alignment.bottomRight,
      //           child: Text(
      //             'Total price: ' + format.format(10000000),
      //             style: TextStyle(
      //               fontSize: 18.0,
      //               fontWeight: FontWeight.bold,
      //             ),
      //           ),
      //         ),
      //       ),
      //       SizedBox(height: 10.0),
      //     ],
      //   ),
      // ),
    );
  }
}
