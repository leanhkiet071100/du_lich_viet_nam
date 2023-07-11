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

  //Tìm kiếm lưu trú
  static Future<List<Hotel>> searchHotels(String searchString) async {
    List<Hotel> lstResult = [];
    List<dynamic> data = await getAllHotel();

    if (searchString == '') return lstResult = [];

    for (var e in data) {
      Hotel co = Hotel.fromJson(e);
      if (co.ten_noi_luu_tru
          .toUpperCase()
          .contains(searchString.toUpperCase())) {
        lstResult.add(co);
      }
    }
    return lstResult;
  }
}
