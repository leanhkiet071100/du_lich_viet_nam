import 'dart:convert';
import 'package:dulich/Global/color.dart';
import 'package:dulich/Global/url.dart';
import 'package:dulich/Providers/register_provider.dart';
import 'package:dulich/Views/booking/booking_detail.dart';
import 'package:dulich/Views/dashboard/dashboard.dart';
import 'package:dulich/Views/tour/tour_detail.dart';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:dulich/Models/tour_object.dart';
import 'package:shared_preferences/shared_preferences.dart';

class TourProvider {
  static List<TourObject> parseTour(String responseBody) {
    final parse = jsonDecode(responseBody)['data'].cast<Map<String, dynamic>>();
    return parse.map<TourObject>((e) => TourObject.fromJson(e)).toList();
  }

  static Future<List<TourObject>> fetchPosts() async {
    final response = await http
        .get(Uri.parse(tourUrl), headers: {'Accept': 'application/json'});
    return parseTour(response.body);
  }

  static Future<dynamic> getToken() async {
    /* ==== Lấy token từ Storage ==== */
    SharedPreferences pres = await SharedPreferences.getInstance();
    var token = pres.getString('token');
    return token;
  }

  static Future<List<TourObject>> getAllTour() async {
    var token = await TourProvider.getToken();
    final response = await http.get(Uri.parse('list-tour'), headers: {
      'Content-type': 'application/json',
      'Accept': 'application/json',
    });

    return parseTour(response.body);
  }

  static Future<List<TourObject>> getAllPhieu() async {
    var token = await TourProvider.getToken();
    final response = await http.get(Uri.parse('list-tour'), headers: {
      'Content-type': 'application/json',
      'Accept': 'application/json',
    });

    return parseTour(response.body);
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
                      Navigator.push(
                          context,
                          MaterialPageRoute(
                            builder: (context) => TourDetail(
                                title: 'a',
                                imageUrl:
                                    'https://suckhoedoisong.qltns.mediacdn.vn/324455921873985536/2022/7/10/hinh-anh-cac-loai-hinh-du-lich-3-1657423025597-1657423027180128362217.jpeg',
                                price: 1200000),
                          ));
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
