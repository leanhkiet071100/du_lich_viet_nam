import 'dart:convert';
import 'package:dulich/Global/color.dart';
import 'package:dulich/Global/url.dart';
import 'package:dulich/Views/tour/tour.dart';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:dulich/Models/tour_object.dart';
import 'package:shared_preferences/shared_preferences.dart';

class TourProvider {
  static Future<dynamic> getToken() async {
    /* ==== Lấy token từ Storage ==== */
    SharedPreferences pres = await SharedPreferences.getInstance();
    var token = pres.getString('token');
    return token;
  }

  Future<void> dattour(
    String name,
    BuildContext context,
    String email,
    String sdt,
    String adult,
    String child,
    String goi_du_lich_id,
  ) async {
    var token = await getToken();
    var url = tourUrl;
    var response = await http.post(Uri.parse(url), headers: <String, String>{
      "Accept": "application/json",
      'Authorization': 'Bearer $token',
    }, body: {
      'Fullname': name,
      'Email': email,
      'Telephone': sdt,
      'adult': adult,
      'child': child,
      'goi_du_lich_id': goi_du_lich_id
    });
    print(response.body);
    print(response.statusCode);
    if (response.statusCode == 200) {
      showDialog(
          context: context,
          builder: (BuildContext context) {
            return AlertDialog(
              content: Text('Chúng tôi sẽ liên hệ tới bạn sớm nhất!',
                  style: TextStyle(
                      fontWeight: FontWeight.bold, color: Colors.black)),
              title: Row(
                children: [
                  Icon(
                    Icons.check_circle,
                    color: blackColor,
                  ),
                  SizedBox(
                    width: 10,
                  ),
                  Container(
                      child: Text('Đặt tour thành công!',
                          maxLines: 2,
                          textAlign: TextAlign.center,
                          style: TextStyle(
                            fontWeight: FontWeight.bold,
                            color: blackColor,
                          ))),
                ],
              ),
              actions: [
                TextButton(
                    onPressed: () {
                      Navigator.push(context,
                          MaterialPageRoute(builder: (context) => Tour()));
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

  Future<void> thanhtoan(
    String name,
    BuildContext context,
    String email,
    String sdt,
    String adult,
    String child,
    DateTime ngaydat,
  ) async {
    var token = await getToken();
    var url = tourUrl;
    var response = await http.post(Uri.parse(url), headers: <String, String>{
      "Accept": "application/json",
      'Authorization': 'Bearer $token',
    }, body: {
      'Fullname': name,
      'Email': email,
      'Telephone': sdt,
      'adult': adult,
      'child': child,
      'goi_du_lich_id': '1'
    });
    print(response.body);
    print(response.statusCode);
    if (response.statusCode == 200) {
      showDialog(
          context: context,
          builder: (BuildContext context) {
            return AlertDialog(
              // content: Text('Đặt tour thành công!',
              //     style: TextStyle(
              //         fontWeight: FontWeight.bold, color: Colors.black)),
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
