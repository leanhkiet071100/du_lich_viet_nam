import 'package:dulich/Models/hotel_object.dart';
import 'package:dulich/Views/hotel/hotel_page.dart';
import 'package:flutter/material.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';

import '../../Global/color.dart';

class HotelDetail extends StatefulWidget {
  Hotel listDl;
  HotelDetail({Key? key, required this.listDl}) : super(key: key);

  @override
  _HotelDetailState createState() => _HotelDetailState(listDl);
}

class _HotelDetailState extends State<HotelDetail> {
  Hotel listDl;
  _HotelDetailState(this.listDl);
  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return Scaffold(
      backgroundColor: Colors.white,
      extendBodyBehindAppBar: true,
      appBar: AppBar(
        automaticallyImplyLeading: false,
        backgroundColor: Colors.transparent,
        elevation: 0,
        leading: null,
        leadingWidth: 0,
        titleSpacing: 0,
        title: TextButton(
          onPressed: () {},
          child: IconButton(
            onPressed: () {
              Navigator.pushAndRemoveUntil(
                  context,
                  MaterialPageRoute(builder: (context) => const HotelPage()),
                  (route) => false);
            },
            icon: const Icon(
              Icons.arrow_back_ios,
              color: blackColor,
            ),
          ),
        ),
      ),
      body: SingleChildScrollView(
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Image.network(
              listDl.hinh_noi_luu_tru,
              fit: BoxFit.cover,
              width: MediaQuery.of(context).size.width,
              height: 232,
            ),
            Container(
              margin: const EdgeInsets.fromLTRB(10, 10, 130, 10),
              child: Text(
                listDl.ten_noi_luu_tru,
                style: const TextStyle(
                    height: 1.5,
                    fontSize: 24,
                    color: blackColor,
                    fontWeight: FontWeight.bold),
              ),
            ),
            Container(
              padding: const EdgeInsets.only(left: 10, right: 50),
              child: Row(
                crossAxisAlignment: CrossAxisAlignment.center,
                children: [
                  Container(
                    width: size.width * 0.05,
                    alignment: Alignment.center,
                    margin: const EdgeInsets.only(right: 10),
                    child: const FaIcon(
                      FontAwesomeIcons.mapMarkerAlt,
                      size: 18,
                      color: Color(0XFFFF3535),
                    ),
                  ),
                  Flexible(
                    child: Text(
                      listDl.dia_chi +
                          ', ' +
                          listDl.xa +
                          ', ' +
                          listDl.huyen +
                          ' ',
                      softWrap: true,
                      overflow: TextOverflow.clip,
                      style: const TextStyle(
                          fontWeight: FontWeight.normal,
                          color: blackColor,
                          height: 1.5),
                    ),
                  ),
                ],
              ),
            ),
            const SizedBox(
              height: 10,
            ),
            Container(
              padding: const EdgeInsets.only(left: 10, right: 50, bottom: 10),
              child: Row(
                crossAxisAlignment: CrossAxisAlignment.center,
                children: [
                  Container(
                    width: size.width * 0.05,
                    alignment: Alignment.center,
                    margin: const EdgeInsets.only(right: 10),
                    child: const FaIcon(
                      FontAwesomeIcons.phone,
                      size: 16,
                      color: Color(0XFF0066FF),
                    ),
                  ),
                  Flexible(
                    child: Text(
                      listDl.so_dien_thoai,
                      softWrap: true,
                      overflow: TextOverflow.clip,
                      style: const TextStyle(
                          fontWeight: FontWeight.normal,
                          color: blackColor,
                          height: 1.5),
                    ),
                  ),
                ],
              ),
            ),
            Container(
              padding: const EdgeInsets.fromLTRB(10, 5, 10, 10),
              child: const Text(
                "Mô tả",
                style: TextStyle(
                  height: 1.5,
                  fontSize: 18,
                  fontWeight: FontWeight.w700,
                  color: Color(0XFF242a37),
                ),
              ),
            ),
            Container(
              padding: const EdgeInsets.fromLTRB(10, 0, 10, 20),
              child: Text(
                listDl.mo_ta,
                textAlign: TextAlign.justify,
                style: const TextStyle(
                  fontSize: 16,
                  height: 1.5,
                  fontWeight: FontWeight.normal,
                ),
              ),
            ),
          ],
        ),
      ),
    );
  }
}
