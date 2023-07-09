import 'dart:convert';

import 'package:dulich/Global/color.dart';
import 'package:dulich/Global/url.dart';
import 'package:dulich/Views/login/login.dart';
import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:http/http.dart' as http;
import 'package:shared_preferences/shared_preferences.dart';

class RegisterProvider {
  Future<void> register(
    String name,
    BuildContext context,
    String email,
    String sdt,
    String password,
    String confirm_password,
  ) async {
    var url = regisUrl;
    var response = await http.post(Uri.parse(url), headers: <String, String>{
      "Accept": "application/json"
    }, body: {
      'hoten': name,
      'email': email,
      'sdt': sdt,
      'password': password,
      'confirm_password': confirm_password,
    });
    print(response.body);
    print(response.statusCode);
    if (response.statusCode == 200) {
      showDialog(
          context: context,
          builder: (BuildContext context) {
            return AlertDialog(
              content: Text('Vui lòng kiểm tra email để kích hoạt tài khoản! ',
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
                  Text('Đăng kí thành công',
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
                      'Đóng',
                      style: TextStyle(
                          fontSize: 20,
                          fontWeight: FontWeight.bold,
                          color: Colors.black),
                    )),
                TextButton(
                    onPressed: () {
                      Navigator.pushAndRemoveUntil(
                          context,
                          MaterialPageRoute(builder: (context) => Login()),
                          (route) => false);
                    },
                    child: Text(
                      'Đăng Nhập',
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
              content: Text('Đăng kí thất bại',
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

  /* ==== Logout ==== */
  static Future<dynamic> getToken() async {
    /* ==== Lấy token từ Storage ==== */
    SharedPreferences pres = await SharedPreferences.getInstance();
    var token = pres.getString('access_token');
    return token;
  }

  static Future<bool> logout() async {
    var token = await getToken();
    final response = await http.post(Uri.parse(logoutUrl), headers: {
      'Content-type': 'application/json',
      'Accept': 'application/json',
      'Authorization': 'Bearer $token',
    });
    final jsonRespon = jsonDecode(response.body);
    if (jsonRespon['status_code'] == 200) {
      return true;
    } else {
      return false;
    }
  }

  /* ==== QUEN MAT KHAU ==== */
  static Future<bool> sendEmail(String email) async {
    final response = await http.post(Uri.parse(passUrl),
        body: ({
          'email': email,
        }));
    if (response.statusCode == 200) {
      return true;
    } else {
      return false;
    }
  }

  static Future<bool> confirmToken(String token) async {
    final response = await http.post(Uri.parse(''),
        body: ({
          'token': token,
        }));
    if (response.statusCode == 200) {
      return true;
    } else {
      return false;
    }
  }

  static Future<bool> resetPassword(
      String password, String confirmPassword, String token) async {
    final response = await http.post(Uri.parse('$token'),
        body: ({'password': password, 'confirm-password': confirmPassword}));
    if (response.statusCode == 200) {
      return true;
    } else {
      return false;
    }
  }
}
