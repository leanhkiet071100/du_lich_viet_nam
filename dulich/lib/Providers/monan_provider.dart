import 'dart:convert';
import 'package:dulich/Global/url.dart';
import 'package:http/http.dart' as http;
import 'package:dulich/Global/contants.dart';
import 'package:dulich/Models/mon_an.dart';

class MonAnProvider {
  // static List<MonAn> parseMonAn(String reponseBody) {
  //   final pased = jsonDecode(reponseBody)["data"].cast<Map<String, dynamic>>();
  //   return pased.map<MonAn>((e) => MonAn.fromJson(e)).toList();
  // }
  static List<MonAn> parseMonAn(String reponseBody) {
    final pased = jsonDecode(reponseBody).cast<Map<String, dynamic>>();
    return pased.map<MonAn>((e) => MonAn.fromJson(e)).toList();
  }

  static Future<List<MonAn>> fetchPosts() async {
    final response = await http
        .get(Uri.parse(monAnUrl), headers: {'Accept': 'application/json'});
    return parseMonAn(response.body);
  }

  static Future<List<MonAn>> getAllMa() async {
    var token = await getToken();
    final response = await http.get(Uri.parse(monAnUrl), headers: {
      'Content-type': 'application/json',
      'Accept': 'application/json',
    });

    return parseMonAn(response.body);
  }

  static Future<List<MonAn>> getQuanAnByID(int quan_an_id) async {
    var token = await getToken();
    final response =
        await http.get(Uri.parse(monAnUrl + "/show/$quan_an_id"), headers: {
      'Content-type': 'application/json',
      'Accept': 'application/json',
    });

    return parseMonAn(response.body);
  }
}
