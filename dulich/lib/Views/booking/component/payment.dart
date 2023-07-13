import 'package:dulich/Global/color.dart';
import 'package:dulich/Models/phieu_dat.dart';
import 'package:dulich/Providers/phieudat_provider.dart';
import 'package:dulich/Views/booking/component/payment_detail.dart';
import 'package:dulich/Views/dashboard/dashboard.dart';
import 'package:flutter/material.dart';
import 'package:intl/intl.dart';

class PaymentScreen extends StatefulWidget {
  const PaymentScreen({Key? key}) : super(key: key);
  @override
  _PaymentScreenState createState() => _PaymentScreenState();
}

class _PaymentScreenState extends State<PaymentScreen> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(
          leading: GestureDetector(
            onTap: () {
              Navigator.push(
                context,
                MaterialPageRoute(
                  builder: (context) => const Dashboard(),
                ),
              );
            },
            child: const Icon(
              Icons.arrow_back_ios,
              color: blackColor,
            ),
          ),
          backgroundColor: miniColor,
          title: Center(
            child: Text(
              "Thanh toán ",
              style:
                  TextStyle(color: Colors.black, fontWeight: FontWeight.bold),
            ),
          ),
        ),
        body: FutureBuilder(
            future: PhieuDatProvider.getAllPhieu(),
            builder: (BuildContext context, AsyncSnapshot snapshot) {
              if (snapshot.hasData) {
                return OrderDetailsScreen(listPhietDat: snapshot.data!);
              } else if (snapshot.hasError) {
                return Center(
                  child: Text('Có lỗi rồi'),
                );
              }
              return Center(child: CircularProgressIndicator());
            }));
  }
}
