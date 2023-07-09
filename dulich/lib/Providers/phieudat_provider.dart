import 'package:dulich/Global/color.dart';
import 'package:dulich/Global/contants.dart';
import 'package:dulich/Global/url.dart';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;

class RegisterProvider {
  Future<void> phieudat(
      String phieu_dat_id, BuildContext context, String payments) async {
    var token = await getToken();
    var url = phieuDatUrl;
    var response = await http.post(Uri.parse(url), headers: <String, String>{
      "Accept": "application/json",
      'Authorization': 'Bearer $token',
    }, body: {
      'phieu_dat_id': phieu_dat_id,
      'payments': payments,
    });
    print(response.body);
    print(response.statusCode);
    if (response.statusCode == 200) {
      showDialog(
          context: context,
          builder: (BuildContext context) {
            return AlertDialog(
              title: Row(
                children: [
                  Icon(
                    Icons.check_circle,
                    color: blackColor,
                  ),
                  SizedBox(
                    width: 10,
                  ),
                  Text('Đăng kí thành công',
                      style: TextStyle(
                        fontWeight: FontWeight.bold,
                        color: blackColor,
                      ))
                ],
              ),
              actions: [
                TextButton(
                    onPressed: () {},
                    child: Text(
                      'OK',
                      style: TextStyle(
                          fontSize: 20,
                          fontWeight: FontWeight.bold,
                          color: Colors.black),
                    ))
              ],
            );
          });
    } else {
      print('error');
      showDialog(
          context: context,
          builder: (BuildContext context) {
            return AlertDialog(
              content: Text('Đặt tour thất bại',
                  style: TextStyle(
                      fontWeight: FontWeight.bold, color: Colors.black)),
              title: Row(
                children: [
                  Icon(
                    Icons.warning_rounded,
                    color: blackColor,
                  ),
                  SizedBox(
                    width: 10,
                  ),
                  Text('Thông báo',
                      style: TextStyle(
                        fontWeight: FontWeight.bold,
                        color: blackColor,
                      ))
                ],
              ),
              actions: [
                TextButton(
                    onPressed: () {
                      Navigator.pop(context);
                    },
                    child: Text(
                      'OK',
                      style: TextStyle(
                          fontSize: 20,
                          fontWeight: FontWeight.bold,
                          color: Colors.black),
                    ))
              ],
            );
          });
    }
  }
}
