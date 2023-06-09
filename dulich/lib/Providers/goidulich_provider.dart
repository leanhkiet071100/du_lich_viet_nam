import 'dart:convert';
import 'package:dulich/Global/url.dart';
import 'package:http/http.dart' as http;
import 'package:dulich/Models/goi_dulich.dart';

class GoiDuLichProvider {
  static List<GoiDuLich> parseTour(String reponseBody) {
    final pased = jsonDecode(reponseBody).cast<Map<String, dynamic>>();
    return pased.map<GoiDuLich>((e) => GoiDuLich.fromJson(e)).toList();
  }

  static Future<List<GoiDuLich>> fetchPosts() async {
    final response = await http
        .get(Uri.parse(goiDuLichUrl), headers: {'Accept': 'application/json'});
    return parseTour(response.body);
  }

  static Future<List<GoiDuLich>> getAllTour() async {
    final response = await http.get(Uri.parse(goiDuLichUrl), headers: {
      'Content-type': 'application/json',
      'Accept': 'application/json',
    });
    return parseTour(response.body);
  }
}
