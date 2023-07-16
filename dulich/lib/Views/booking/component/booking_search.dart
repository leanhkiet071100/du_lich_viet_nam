import 'package:dulich/Global/color.dart';
import 'package:dulich/Models/goi_dulich.dart';
import 'package:dulich/Providers/goidulich_provider.dart';
import 'package:flutter/material.dart';
import 'package:intl/intl.dart';
import '../booking_detail.dart';

class BookingSearch extends StatefulWidget {
  const BookingSearch({Key? key}) : super(key: key);

  @override
  _BookingSearchState createState() => _BookingSearchState();
}

class _BookingSearchState extends State<BookingSearch> {
  List<GoiDuLich> lstGoi = [];
  List<GoiDuLich> lstGOisTemp = [];
  TextEditingController _txtSearch = TextEditingController();
  ScrollController _scrollController = ScrollController();
  int _currentMax = 11;

  _loadTour() async {
    final data = await GoiDuLichProvider.getAllTour();
    setState(() {
      lstGOisTemp = data;
      _currentMax = lstGOisTemp.length;
    });
    for (int i = 0; i < _currentMax; i++) {
      lstGoi.add(lstGOisTemp[i]);
    }
  }

  void _searchTours() async {
    setState(() {});
    if (_txtSearch.text.isEmpty) {
      lstGoi = lstGOisTemp;
    } else {
      lstGoi = [];
      for (var item in lstGOisTemp) {
        if (item.ten.toUpperCase().contains(_txtSearch.text.toUpperCase())) {
          lstGoi.add(item);
        }
      }
    }
  }

  @override
  void initState() {
    super.initState();
    _loadTour();
    _scrollController.addListener(() {
      if (_scrollController.position.pixels ==
          _scrollController.position.maxScrollExtent) {
        _getData();
      }
    });
  }

  _getData() {
    if (_currentMax + 1 <= lstGOisTemp.length) {
      for (int i = _currentMax; i < _currentMax + 1; i++) {
        lstGoi.add(lstGOisTemp[i]);
      }
      _currentMax += 1;
    }

    setState(() {});
  }

  @override
  Widget build(BuildContext context) {
    var format = NumberFormat.currency(locale: 'vi_VN', symbol: '₫');
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
                _searchTours();
              },
            ),
          ),
          backgroundColor: whiteColor,
          elevation: 0,
        ),
        body: GridView.builder(
            itemCount: lstGoi.length,
            gridDelegate: SliverGridDelegateWithFixedCrossAxisCount(
              crossAxisCount: 2,
              childAspectRatio: 2 / 3,
            ),
            itemBuilder: (BuildContext context, int index) {
              return InkWell(
                onTap: () {
                  Navigator.push(
                    context,
                    MaterialPageRoute(
                      builder: (context) => TourDetailScreen(
                        tour: lstGoi[index],
                      ),
                    ),
                  );
                },
                child: Container(
                  child: Card(
                    child: Column(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: [
                        Image.network(
                          lstGoi[index].hinh_goi_du_lich,
                          height: 150,
                          fit: BoxFit.cover,
                        ),
                        const SizedBox(height: 8),
                        Text(
                          lstGoi[index].ten,
                          overflow: TextOverflow.ellipsis,
                          style: TextStyle(
                              color: blackColor,
                              fontSize: 20,
                              fontWeight: FontWeight.w700),
                        ),
                        const SizedBox(height: 4),
                        Text(
                          lstGoi[index].thong_tin_dich_vu,
                          overflow: TextOverflow.ellipsis,
                          textScaleFactor: 1,
                          maxLines: 3,
                          style: TextStyle(
                              color: blackColor,
                              fontSize: 16,
                              fontWeight: FontWeight.w400),
                        ),
                        const SizedBox(height: 4),
                        Text(
                          'Giá: ' + format.format(lstGoi[index].gia_nguoi_lon),
                          overflow: TextOverflow.visible,
                          style: TextStyle(
                              color: Colors.red,
                              fontSize: 16,
                              fontWeight: FontWeight.w700),
                        ),
                        const SizedBox(height: 8),
                      ],
                    ),
                  ),
                ),
              );
            }));
  }
}
