import 'package:dulich/Models/hotel_object.dart';
import 'package:dulich/Providers/hotel_provider.dart';
import 'package:dulich/Views/dashboard/dashboard.dart';
import 'package:dulich/Views/hotel/hotel.dart';
import 'package:dulich/Views/hotel/hotel_search.dart';
import 'package:flutter/material.dart';
import '../../Global/color.dart';

class HotelPage extends StatefulWidget {
  const HotelPage({
    Key? key,
  }) : super(key: key);

  @override
  _HotelPageState createState() => _HotelPageState();
}

class _HotelPageState extends State<HotelPage> {
  late Hotel id;
  @override
  void initState() {
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return Scaffold(
      appBar: AppBar(
        toolbarHeight: size.height * 0.1,
        leading: GestureDetector(
          onTap: () {
            Navigator.push(
              context,
              MaterialPageRoute(builder: (context) => const Dashboard()),
            );
          },
          child: const Icon(
            Icons.arrow_back_ios,
            color: blackColor,
          ),
        ),
        elevation: 0,
        backgroundColor: miniColor,
        title: Center(
          child: Text(
            'Khách sạn',
            style: TextStyle(color: Colors.black, fontWeight: FontWeight.bold),
          ),
        ),
        actions: [
          Container(
            child: IconButton(
              onPressed: () {
                Navigator.pushAndRemoveUntil(
                    context,
                    MaterialPageRoute(
                        builder: (context) => const HotelSearch()),
                    (route) => false);
              },
              icon: Icon(
                Icons.search,
                color: Colors.black,
              ),
            ),
          ),
        ],
      ),
      body: FutureBuilder<List<Hotel>>(
          future: HotelProvider.getAllHotel(),
          builder: (context, snapshot) {
            if (snapshot.hasData) {
              return HotetScreen(listHotels: snapshot.data!);
            } else if (snapshot.hasError) {
              return Center(
                child: Text('Có lỗi rồi'),
              );
            }
            return Center(child: CircularProgressIndicator());
          }),
    );
  }
}
