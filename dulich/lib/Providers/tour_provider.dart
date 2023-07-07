import 'dart:convert';
import 'package:dulich/Global/url.dart';
import 'package:http/http.dart' as http;
import 'package:dulich/Models/tour_object.dart';

class TourProvider {
  static List<TourObject> parseHotels(String responseBody) {
    final parse = jsonDecode(responseBody)['data'].cast<Map<String, dynamic>>();
    return parse.map<TourObject>((e) => TourObject.fromJson(e)).toList();
  }

  static Future<List<TourObject>> fetchPosts() async {
    final response = await http
        .get(Uri.parse(tourUrl), headers: {'Accept': 'application/json'});
    return parseHotels(response.body);
  }

  static Future<bool> dattour() async {
    final response = await http.get(Uri.parse(tourUrl), headers: {
      'Content-type': 'application/json',
      'Accept': 'application/json',
    });
    final jsonRespon = jsonDecode(response.body);
    if (jsonRespon['status_code'] == 200) {
      return true;
    } else {
      return false;
    }
  }
}
