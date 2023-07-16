import 'package:flutter/material.dart';

class PaymentScreen extends StatefulWidget {
  @override
  _PaymentScreenState createState() => _PaymentScreenState();
}

class _PaymentScreenState extends State<PaymentScreen> {
  PaymentMethod _selectedMethod = PaymentMethod.cash;
  bool _isAgreedToTerms = false;

  @override
  Widget build(BuildContext context) {
    return Container(
      padding: EdgeInsets.all(5.0),
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          Text(
            'Hình thức thanh toán',
            style: TextStyle(fontSize: 18.0, fontWeight: FontWeight.bold),
          ),
          SizedBox(height: 16.0),
          ListTile(
            leading: Radio(
              value: PaymentMethod.cash,
              groupValue: _selectedMethod,
              onChanged: (value) {
                setState(() {
                  _selectedMethod = value!;
                });
              },
            ),
            title: Text('Tiền mặt'),
          ),
          ListTile(
            leading: Radio(
              value: PaymentMethod.vnpay,
              groupValue: _selectedMethod,
              onChanged: (value) {
                setState(() {
                  _selectedMethod = value!;
                });
              },
            ),
            title: Text('VNPay'),
          ),
          SizedBox(height: 16.0),
          // CheckboxListTile(
          //   title: Text('Tôi đồng ý với các điều khoản thanh toán'),
          //   value: _isAgreedToTerms,
          //   onChanged: (value) {
          //     setState(() {
          //       _isAgreedToTerms = value!;
          //     });
          //   },
          // ),
        ],
      ),
    );
  }
}

enum PaymentMethod { cash, vnpay }
