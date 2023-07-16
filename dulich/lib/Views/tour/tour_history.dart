import 'package:dulich/Global/color.dart';
import 'package:dulich/Views/tour/tour_tab.dart';
import 'package:flutter/material.dart';

class TourHistory extends StatefulWidget {
  const TourHistory({Key? key}) : super(key: key);

  @override
  _TourHistoryState createState() => _TourHistoryState();
}

class _TourHistoryState extends State<TourHistory> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(
          backgroundColor: miniColor,
          elevation: 0,
          title: const Text(
            'Lịch sự đặt tour',
            style: TextStyle(
                color: blackColor, fontSize: 24, fontWeight: FontWeight.w700),
          ),
          centerTitle: true,
        ),
        body: SingleChildScrollView(
          child: TourTab(),
        ));
  }
}
