import 'dart:convert';
import 'package:dulich/Global/contants.dart';
import 'package:dulich/Global/url.dart';
import 'package:dulich/Models/quanan_object.dart';
import 'package:http/http.dart' as http;

class QuanAnProvider {
  static List<QuanAn> parseRes(String reponseBody) {
    final pased = jsonDecode(reponseBody).cast<Map<String, dynamic>>();
    return pased.map<QuanAn>((e) => QuanAn.fromJson(e)).toList();
  }

  static Future<List<QuanAn>> fetchPosts() async {
    final response = await http
        .get(Uri.parse(quanAnUrl), headers: {'Accept': 'application/json'});
    return parseRes(response.body);
  }

  static Future<List<QuanAn>> getAllRes() async {
    var token = await getToken();
    final response = await http.post(Uri.parse(quanAnUrl), headers: {
      'Content-type': 'application/json',
      'Accept': 'application/json',
    });
    return parseRes(response.body);
  }
}
