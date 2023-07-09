import 'package:dulich/Global/color.dart';
import 'package:dulich/Views/booking/component/payment_detail.dart';
import 'package:dulich/Views/dashboard/dashboard.dart';
import 'package:flutter/material.dart';

class PaymentScreen extends StatefulWidget {
  PaymentScreen({
    Key? key,
  }) : super(key: key);

  @override
  _PaymentScreenState createState() => _PaymentScreenState();
}

class _PaymentScreenState extends State<PaymentScreen> {
  @override
  String _paymentMethod = 'Tiền mặt';

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
            "Thanh toán         ",
            style: TextStyle(color: Colors.black, fontWeight: FontWeight.bold),
          ),
        ),
      ),
      body: Padding(
        padding: EdgeInsets.all(16.0),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: <Widget>[
            OrderDetailsScreen(
                tourName: 'Nhu Quynh',
                tourDate: '08/07/2023',
                tourSdt: '0945898185',
                numberOfAdults: 2,
                numberOfChildren: 1),
            SizedBox(height: 10.0),
            Row(
              children: [
                Container(
                  padding: EdgeInsets.only(left: 10, right: 20),
                  child: Text(
                    'Phương thức thanh toán',
                    style: TextStyle(
                      fontSize: 18.0,
                      fontWeight: FontWeight.bold,
                    ),
                  ),
                ),
                Container(
                  padding: EdgeInsets.only(left: 10),
                  child: DropdownButton<String>(
                    value: _paymentMethod,
                    onChanged: (newValue) {
                      setState(() {
                        _paymentMethod = newValue!;
                      });
                    },
                    items: <String>[
                      'Tiền mặt',
                      'VNPay',
                      'Momo',
                    ].map<DropdownMenuItem<String>>((String value) {
                      return DropdownMenuItem<String>(
                        value: value,
                        child: Text(value),
                      );
                    }).toList(),
                  ),
                ),
              ],
            ),
            SizedBox(height: 16.0),
            Center(
              child: ElevatedButton(
                onPressed: () {
                  // Process payment
                },
                child: Text(
                  'Thanh toán',
                  style: TextStyle(
                      fontSize: 16,
                      color: whiteColor,
                      fontWeight: FontWeight.w700),
                ),
                style: ButtonStyle(
                  backgroundColor: MaterialStateProperty.all<Color>(blueColor),
                  foregroundColor:
                      MaterialStateProperty.all<Color>(Colors.white),
                ),
              ),
            ),
          ],
        ),
      ),
    );
  }
}
