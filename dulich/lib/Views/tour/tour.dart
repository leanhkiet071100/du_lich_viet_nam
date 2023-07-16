import 'package:dulich/Models/phieu_dat.dart';
import 'package:dulich/Providers/phieudat_provider.dart';
import 'package:dulich/Views/tour/tour_detail.dart';
import 'package:flutter/material.dart';

import '../../Global/color.dart';

class Tour extends StatefulWidget {
  const Tour({Key? key}) : super(key: key);

  @override
  _TourState createState() => _TourState();
}

class _TourState extends State<Tour> {
  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return Scaffold(
      appBar: AppBar(
        toolbarHeight: size.height * 0.08,
        leading: GestureDetector(
          onTap: () {
            Navigator.pop(context);
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
            'Chi tiết      ',
            style: TextStyle(color: Colors.black, fontWeight: FontWeight.bold),
          ),
        ),
      ),
      body: FutureBuilder<List<PhieuDat>>(
          future: PhieuDatProvider.getAllPhieu(),
          builder: (context, snapshot) {
            if (snapshot.hasData) {
              return TourDetail(list: snapshot.data!);
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
