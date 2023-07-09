import 'dart:convert';
import 'package:http/http.dart' as http;
import 'package:dulich/Global/contants.dart';
import 'package:dulich/Global/url.dart';
import 'package:dulich/Models/hotel_object.dart';

class HotelProvider {
  static List<Hotel> parseHotels(String reponseBody) {
    final pased = jsonDecode(reponseBody).cast<Map<String, dynamic>>();
    return pased.map<Hotel>((e) => Hotel.fromJson(e)).toList();
  }

  static Future<List<Hotel>> fetchPosts() async {
    final response = await http
        .get(Uri.parse(hotelUrl), headers: {'Accept': 'application/json'});
    return parseHotels(response.body);
  }

  static Future<List<Hotel>> getAllHotel() async {
    var token = await getToken();
    final response = await http.get(Uri.parse(hotelUrl), headers: {
      'Content-type': 'application/json',
      'Accept': 'application/json',
    });
    return parseHotels(response.body);
  }
}
