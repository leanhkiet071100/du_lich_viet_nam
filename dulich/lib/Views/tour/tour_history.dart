import 'package:dulich/Global/color.dart';
import 'package:dulich/Models/phieu_dat.dart';
import 'package:dulich/Providers/phieudat_provider.dart';
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
        leading: GestureDetector(
          onTap: () {
            Navigator.pop(context);
          },
          child: const Icon(
            Icons.arrow_back_ios,
            color: blackColor,
          ),
        ),
        backgroundColor: miniColor,
        elevation: 0,
        title: const Text(
          'Lịch sử đặt tour',
          style: TextStyle(
              color: blackColor, fontSize: 24, fontWeight: FontWeight.w700),
        ),
        centerTitle: true,
      ),
      body: FutureBuilder<List<PhieuDat>>(
          future: PhieuDatProvider.getAllPhieu(),
          builder: (context, snapshot) {
            if (snapshot.hasData) {
              return TourTab(list: snapshot.data!);
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
