import 'package:dulich/Global/color.dart';
import 'package:dulich/Models/tour_object.dart';
import 'package:flutter/material.dart';
import 'package:intl/intl.dart';

class OrderDetailsScreen extends StatefulWidget {
  final String tourName;
  final String tourDate;
  final String tourSdt;
  final int numberOfAdults;
  final int numberOfChildren;

  OrderDetailsScreen({
    required this.tourName,
    required this.tourDate,
    required this.tourSdt,
    required this.numberOfAdults,
    required this.numberOfChildren,
  });

  @override
  _OrderDetailsScreenState createState() => _OrderDetailsScreenState();
}

class _OrderDetailsScreenState extends State<OrderDetailsScreen> {
  final format = NumberFormat.currency(locale: 'vi_VN', symbol: '₫');
  TourObject tour = TourObject();
  int total = 0;
  @override
  Widget build(BuildContext context) {
    return Container(
      width: double.infinity,
      // padding: EdgeInsets.only(left: ),
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: <Widget>[
          Card(
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Text(
                  'Thông tin chi tiết',
                  style: TextStyle(
                    fontSize: 18.0,
                    fontWeight: FontWeight.bold,
                  ),
                ),
                SizedBox(height: 5.0),
                ListTile(
                  title: Text(
                    'Họ tên: ' + widget.tourName,
                    style: TextStyle(fontSize: 16, color: blackColor),
                  ),
                  subtitle: Column(
                    mainAxisAlignment: MainAxisAlignment.start,
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      SizedBox(height: 8.0),
                      Text('Ngày xuất phát: ' + widget.tourDate,
                          style: TextStyle(fontSize: 16, color: blackColor)),
                      SizedBox(height: 8.0),
                      Text('Số điện thoại: ${widget.tourSdt}',
                          style: TextStyle(fontSize: 16, color: blackColor)),
                    ],
                  ),
                ),
                SizedBox(height: 10.0),
                Text(
                  'Số lượng khách hàng',
                  style: TextStyle(
                    fontSize: 18.0,
                    fontWeight: FontWeight.bold,
                  ),
                ),
                SizedBox(height: 10.0),
                Container(
                  padding: EdgeInsets.only(left: 10),
                  child: Text(
                    'Người lớn: ${widget.numberOfAdults}',
                    style: TextStyle(
                      fontSize: 16.0,
                    ),
                  ),
                ),
                SizedBox(height: 8.0),
                Container(
                  padding: EdgeInsets.only(left: 10),
                  child: Text(
                    'Trẻ em: ${widget.numberOfChildren}',
                    style: TextStyle(
                      fontSize: 16.0,
                    ),
                  ),
                ),
                SizedBox(height: 10.0),
              ],
            ),
          ),
          SizedBox(height: 10.0),
          Card(
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Container(
                  padding: EdgeInsets.only(left: 5),
                  child: Text(
                    'Tổng cộng ',
                    style: TextStyle(
                      fontSize: 18.0,
                      fontWeight: FontWeight.bold,
                    ),
                  ),
                ),
                ListTile(
                  title: Row(
                    mainAxisAlignment: MainAxisAlignment.spaceBetween,
                    children: [
                      Text(
                        "Gói du lịch: ",
                        style: TextStyle(
                          fontSize: 16,
                          color: blackColor,
                        ),
                      ),
                      Text(
                        "hi nhaue auah ahaua hàu hau ",
                        style: TextStyle(
                          fontSize: 16,
                          color: blackColor,
                        ),
                      ),
                    ],
                  ),
                  subtitle: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      SizedBox(height: 10.0),
                      Text(
                        'Số lượng :',
                        style: TextStyle(
                          fontSize: 16,
                          color: blackColor,
                        ),
                      ),
                      SizedBox(height: 10.0),
                      Row(
                        mainAxisAlignment: MainAxisAlignment.spaceBetween,
                        children: [
                          Text(
                            '1. Người lớn: ',
                            style: TextStyle(
                              fontSize: 16,
                              color: blackColor,
                            ),
                          ),
                          Text(
                            '2',
                            style: TextStyle(
                              fontSize: 16,
                              color: blackColor,
                            ),
                          ),
                          Text(
                            format.format(4500000),
                            style: TextStyle(
                              fontSize: 16,
                              color: blackColor,
                            ),
                          ),
                        ],
                      ),
                      SizedBox(height: 10.0),
                      Row(
                        mainAxisAlignment: MainAxisAlignment.spaceBetween,
                        children: [
                          Text(
                            '2. Trẻ em:      ',
                            style: TextStyle(
                              fontSize: 16,
                              color: blackColor,
                            ),
                          ),
                          Text(
                            '1',
                            style: TextStyle(
                              fontSize: 16,
                              color: blackColor,
                            ),
                          ),
                          Text(
                            format.format(4500000),
                            style: TextStyle(
                              fontSize: 16,
                              color: blackColor,
                            ),
                          ),
                        ],
                      ),
                    ],
                  ),
                ),
                SizedBox(height: 15.0),
                Container(
                  padding: EdgeInsets.only(left: 5),
                  child: Align(
                    alignment: Alignment.bottomRight,
                    child: Text(
                      'Total price: ' + format.format(10000000),
                      style: TextStyle(
                        fontSize: 18.0,
                        fontWeight: FontWeight.bold,
                      ),
                    ),
                  ),
                ),
                SizedBox(height: 10.0),
              ],
            ),
          ),
        ],
      ),
    );
  }
}
