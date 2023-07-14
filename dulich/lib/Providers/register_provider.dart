import 'dart:convert';

import 'package:dulich/Global/color.dart';
import 'package:dulich/Global/url.dart';
import 'package:dulich/Models/user_object.dart';
import 'package:dulich/Views/forgot/forgot_pass.dart';
import 'package:dulich/Views/login/login.dart';
import 'package:flutter/material.dart';
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
    var token = pres.getString('token');
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

// =====================CODE PASSWORDS =================
  // Future<void> verifyCode(
  //   String code,
  //   BuildContext context,
  // ) async {
  //   var response =
  //       await http.post(Uri.parse(codeUrl), headers: <String, String>{
  //     "Accept": "application/json"
  //   }, body: {
  //     'code': code,
  //   });
  //   if (response.statusCode == 200) {
  //     // Kiểm tra xem mã xác nhận của người dùng có chính xác không
  //     var jsonData = jsonDecode(response.body);
  //     if (jsonData['success']) {
  //       // Hiển thị trang đặt lại mật khẩu
  //       Navigator.push(
  //         context,
  //         MaterialPageRoute(builder: (context) => ForgotPass()),
  //       );
  //     } else {
  //       // Hiển thị thông báo lỗi nếu mã xác nhận không chính xác
  //       showDialog(
  //         context: context,
  //         builder: (BuildContext context) {
  //           return AlertDialog(
  //             title: Text('Lỗi'),
  //             content: Text('Mã xác nhận không chính xác.'),
  //             actions: <Widget>[
  //               TextButton(
  //                 child: Text('Đóng'),
  //                 onPressed: () {
  //                   Navigator.of(context).pop();
  //                 },
  //               ),
  //             ],
  //           );
  //         },
  //       );
  //     }
  //   } else {
  //     // Hiển thị thông báo lỗi nếu API endpoint trả về mã phản hồi không thành công
  //     showDialog(
  //       context: context,
  //       builder: (BuildContext context) {
  //         return AlertDialog(
  //           title: Text('Lỗi'),
  //           content: Text('Không thể xác minh mã xác nhận.'),
  //           actions: <Widget>[
  //             ElevatedButton(
  //               child: Text('Đóng'),
  //               onPressed: () {
  //                 Navigator.of(context).pop();
  //               },
  //             ),
  //           ],
  //         );
  //       },
  //     );
  //   }
  // }
  static Future<bool> confirmToken(String code) async {
    var token = await getToken();
    final response = await http.post(Uri.parse(codeUrl),
        headers: {
          'Accept': 'application/json',
          'Authorization': 'Bearer $token',
        },
        body: ({
          'code': code,
        }));
    if (response.statusCode == 200) {
      return true;
    } else {
      return false;
    }
  }

//===========RESET PASSWORD =================
  static Future<bool> resetPassword(
      String mat_khau_moi, String xac_nhan_mat_khau_moi, String code) async {
    var token = await getToken();
    final response = await http.post(Uri.parse(passUrl),
        headers: ({
          'Accept': 'application/json',
          'Authorization': 'Bearer $token',
        }),
        body: ({
          'mat_khau_moi': mat_khau_moi,
          'xac_nhan_mat_khau_moi': xac_nhan_mat_khau_moi,
        }));
    if (response.statusCode == 200) {
      return true;
    } else {
      return false;
    }
  }

  //==================CHANGE PASSWORD ==============
  static Future<bool> changePassword(
      String password, String new_password, String confirm_password) async {
    var token = await getToken();
    final response = await http.post(Uri.parse(baseUrl + 'change-pass'),
        body: jsonEncode({
          'password': password,
          'new_password': new_password,
          'confirm_password': confirm_password,
        }),
        headers: {
          'Content-type': 'application/json',
          'Accept': 'application/json',
          'Authorization': 'Bearer $token',
        });
    final jsonRespon = jsonDecode(response.body);
    if (jsonRespon["status_code"] == 200) {
      return true;
    } else {
      return false;
    }
  }

  //======== UPDATE INFO =========
  static Future<UserObject> getUser() async {
    var token = await getToken();
    final response = await http.get(Uri.parse(baseUrl + 'user'), headers: {
      'Content-type': 'application/json',
      'Accept': 'application/json',
      'Authorization': 'Bearer $token',
    });
    SharedPreferences pres = await SharedPreferences.getInstance();
    String user = response.body;
    pres.setString('user', user);
    return UserObject.fromJson(jsonDecode(response.body));
  }

  static Future<bool> updateInfor(
    String name,
    String phone,
  ) async {
    var token = await getToken();
    final response = await http.post(Uri.parse(baseUrl + 'update-info'),
        body: jsonEncode({
          'name': name,
          'phone': phone,
        }),
        headers: {
          'Content-type': 'application/json',
          'Accept': 'application/json',
          'Authorization': 'Bearer $token',
        });
    final jsonRespon = jsonDecode(response.body);
    if (jsonRespon["0"] == 200) {
      return true;
    } else {
      return false;
    }
  }
}
