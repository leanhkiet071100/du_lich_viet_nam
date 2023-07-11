import 'package:dulich/Global/color.dart';
import 'package:dulich/Models/hotel_object.dart';
import 'package:dulich/Providers/hotel_provider.dart';
import 'package:dulich/Views/hotel/hotel_detail.dart';
import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';

class HotelSearch extends StatefulWidget {
  const HotelSearch({Key? key}) : super(key: key);

  @override
  _HotelSearchState createState() => _HotelSearchState();
}

class _HotelSearchState extends State<HotelSearch> {
  List<Hotel> lstHotels = [];
  List<Hotel> lstHotelsTemp = [];
  TextEditingController _txtSearch = TextEditingController();
  ScrollController _scrollController = ScrollController();
  int _currentMax = 11;

  _loadHotels() async {
    final data = await HotelProvider.getAllHotel();
    setState(() {
      lstHotelsTemp = data;
      _currentMax = lstHotelsTemp.length;
    });
    for (int i = 0; i < _currentMax; i++) {
      lstHotels.add(lstHotelsTemp[i]);
    }
  }

  void _searchHotels() async {
    setState(() {});
    if (_txtSearch.text.isEmpty) {
      lstHotels = lstHotelsTemp;
    } else {
      lstHotels = [];
      for (var item in lstHotelsTemp) {
        if (item.ten_noi_luu_tru
            .toUpperCase()
            .contains(_txtSearch.text.toUpperCase())) {
          lstHotels.add(item);
        }
      }
    }
  }

  @override
  void initState() {
    super.initState();
    _loadHotels();
    _scrollController.addListener(() {
      if (_scrollController.position.pixels ==
          _scrollController.position.maxScrollExtent) {
        _getData();
      }
    });
  }

  _getData() {
    if (_currentMax + 1 <= lstHotelsTemp.length) {
      for (int i = _currentMax; i < _currentMax + 1; i++) {
        lstHotels.add(lstHotelsTemp[i]);
      }
      _currentMax += 1;
    }

    setState(() {});
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Container(
          child: TextField(
            controller: _txtSearch,
            autofocus: true,
            decoration: InputDecoration(
              prefixIcon: Icon(
                Icons.search,
                color: blackColor,
              ),
              hintText: "Bạn cần tìm gì? ",
              border: InputBorder.none,
            ),
            onChanged: (text) {
              _searchHotels();
            },
          ),
        ),
        backgroundColor: whiteColor,
        elevation: 0,
      ),
      body: Container(
        child: ListView.builder(
          itemCount: lstHotels.length,
          itemBuilder: (context, index) => InkWell(
            onTap: (() {
              Navigator.push(
                context,
                MaterialPageRoute(
                    builder: (context) =>
                        HotelDetail(listDl: lstHotels[index])),
              );
            }),
            child: Card(
              child: Container(
                margin: EdgeInsets.all(5),
                child: Row(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    // Load hình ảnh
                    Container(
                      padding: EdgeInsets.only(left: 5, right: 5),
                      width: 100,
                      height: 90,
                      child: ClipRRect(
                        borderRadius: BorderRadius.all(Radius.circular(10)),
                        child: Image.network(
                          lstHotels[index].hinh_noi_luu_tru,
                          fit: BoxFit.cover,
                        ),
                      ),
                    ),
                    // Tên nơi lưu trú
                    Column(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: [
                        Container(
                          padding: EdgeInsets.only(left: 10),
                          child: Text(
                            lstHotels[index].ten_noi_luu_tru,
                            softWrap: true,
                            style: GoogleFonts.quicksand(
                                color: Colors.black,
                                fontSize: 16,
                                fontWeight: FontWeight.bold),
                          ),
                        ),

                        SizedBox(
                          width: 4,
                          height: 4,
                        ),
                        Row(
                          children: [
                            Container(
                              padding: EdgeInsets.only(left: 10),
                              child: Icon(
                                Icons.loyalty,
                                color: Colors.orange,
                                size: 15,
                              ),
                            ),
                            Container(
                              padding: EdgeInsets.only(left: 5),
                              child: Text(
                                lstHotels[index].dia_chi +
                                    ', ' +
                                    lstHotels[index].xa +
                                    ', ' +
                                    lstHotels[index].huyen +
                                    ' ',
                                softWrap: true,
                                style: TextStyle(
                                    color: blackColor,
                                    fontSize: 9,
                                    fontWeight: FontWeight.bold),
                              ),
                            ),
                          ],
                        ),
                        SizedBox(
                          width: 4,
                          height: 4,
                        ),
                        //Load số điện thoại
                        Row(
                          children: [
                            Container(
                              padding: EdgeInsets.only(left: 10),
                              child: Icon(
                                Icons.phone,
                                color: Colors.greenAccent[400],
                                size: 15,
                              ),
                            ),
                            Container(
                              padding: EdgeInsets.only(left: 5),
                              child: Text(
                                lstHotels[index].so_dien_thoai,
                                style: TextStyle(
                                    color: blackColor,
                                    fontSize: 9,
                                    fontWeight: FontWeight.bold),
                              ),
                            ),
                          ],
                        ),
                        SizedBox(
                          width: 4,
                          height: 4,
                        ),
                        // dữ liệu tĩnh
                        Row(
                          children: [
                            Container(
                              padding: EdgeInsets.only(left: 10),
                              child: Icon(
                                Icons.location_on,
                                color: Colors.red,
                                size: 15,
                              ),
                            ),
                            Container(
                              padding: EdgeInsets.only(left: 5),
                              child: Text(
                                lstHotels[index].tinh,
                                style: TextStyle(
                                    color: blackColor,
                                    fontSize: 9,
                                    fontWeight: FontWeight.bold),
                              ),
                            ),
                          ],
                        ),
                      ],
                    ),

                    // Container(
                    //   padding: EdgeInsets.only(left: 100),
                    //   child: IconButton(
                    //       icon: Icon(
                    //         Icons.more_horiz,
                    //         size: 18,
                    //       ),
                    //       onPressed: () {}),
                    // ),
                  ],
                ),
              ),
            ),
          ),
        ),
      ),
    );
  }
}
