import 'dart:convert';
import 'package:dulich/Global/contants.dart';
import 'package:dulich/Global/url.dart';
import 'package:dulich/Models/phieu_dat.dart';
import 'package:http/http.dart' as http;
import 'package:shared_preferences/shared_preferences.dart';

class PhieuDatProvider {
  static List<PhieuDat> parsePhieu(String responseBody) {
    final parse = jsonDecode(responseBody)['data'].cast<Map<String, dynamic>>();
    return parse.map<PhieuDat>((e) => PhieuDat.fromJson(e)).toList();
  }

  static Future<dynamic> getToken() async {
    /* ==== Lấy token từ Storage ==== */
    SharedPreferences pres = await SharedPreferences.getInstance();
    var token = pres.getString('token');
    return token;
  }

  static Future<List<PhieuDat>> getAllPhieu() async {
    var token = await getToken();
    final response = await http.get(Uri.parse(phieuDatUrl), headers: {
      'Content-type': 'application/json',
      'Accept': 'application/json',
      'Authorization': 'Bearer $token',
    });
    return parsePhieu(response.body);
  }
  // static List<PhieuDat> parsePhieu(String reponseBody) {
  //   final pased = jsonDecode(reponseBody).cast<Map<String,dynamic>>();
  //   return pased.map<PhieuDat>((e) => PhieuDat.fromJson(e)).toList();
  // }

  // static Future<List<PhieuDat>> fetchPosts() async {
  //   var token = await getToken();
  //   final response = await http.get(Uri.parse(phieuDatUrl), headers: {
  //     'Accept': 'application/json',
  //     'Authorization': 'Bearer $token',
  //   });
  //   return parsePhieu(response.body);
  // }

  // static Future<dynamic> getToken() async {
  //   /* ==== Lấy token từ Storage ==== */
  //   SharedPreferences pres = await SharedPreferences.getInstance();
  //   var token = pres.getString('token');
  //   return token;
  // }

  // static Future<List<PhieuDat>> getAllPhieu() async {
  //   var token = await getToken();
  //   final response = await http.get(Uri.parse(phieuDatUrl), headers: {
  //     'Content-type': 'application/json',
  //     'Accept': 'application/json',
  //     'Authorization': 'Bearer $token',
  //   });
  //   return parsePhieu(response.body);
  // }
}
