import 'package:dulich/Global/color.dart';
import 'package:dulich/Global/contants.dart';
import 'package:dulich/Models/phieu_dat.dart';
import 'package:dulich/Views/tour/tour.dart';
import 'package:dulich/Views/tour/tour_detail.dart';
import 'package:flutter/material.dart';

class TourTab extends StatefulWidget {
  final List<PhieuDat> list;
  TourTab({Key? key, required this.list}) : super(key: key);

  @override
  _TourTabState createState() => _TourTabState(list);
}

class _TourTabState extends State<TourTab> with TickerProviderStateMixin {
  final List<PhieuDat> list;
  _TourTabState(this.list);
  late final TabController _tabController;
  final List<Tab> _tabs = [
    Tab(text: 'Đang chờ duyệt'),
    Tab(text: 'Đã duyệt'),
  ];

  @override
  void initState() {
    super.initState();
    _tabController = TabController(length: _tabs.length, vsync: this);
  }

  @override
  void dispose() {
    _tabController.dispose();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return ListView.builder(
        itemCount: list.length,
        itemBuilder: (context, index) => InkWell(
            onTap: () {
              Navigator.push(
                  context, MaterialPageRoute(builder: (context) => Tour()));
            },
            child: Card(
                child: Column(children: [
              SizedBox(height: 16.0),
              Image.network(
                list[index].hinh_anh,
                //width: size.width * 0.9,
                height: size.height * 0.3,
                fit: BoxFit.cover,
              ),
              SizedBox(height: 16.0),
              Container(
                padding: EdgeInsets.only(left: 20, right: 10),
                child: Align(
                  alignment: Alignment.topLeft,
                  child: Text(
                    list[index].ten_du_lich,
                    overflow: TextOverflow.ellipsis,
                    style: TextStyle(fontWeight: FontWeight.bold, fontSize: 18),
                  ),
                ),
              ),
              SizedBox(height: 8.0),
              Container(
                padding: EdgeInsets.only(left: 20, right: 10),
                child: Row(
                  children: [
                    Icon(Icons.calendar_today),
                    SizedBox(width: 8.0),
                    Text('Ngày khởi hành: ' + list[index].ngay_khoi_hanh),
                  ],
                ),
              ),
              SizedBox(height: 8.0),
              Container(
                padding: EdgeInsets.only(left: 20, right: 10),
                child: Row(
                  children: [
                    Icon(Icons.person),
                    SizedBox(width: 8.0),
                    Text('Số lượng khách: 2'),
                  ],
                ),
              ),
              SizedBox(height: 16.0),
              kTextButton(
                'Hủy đặt tour',
                () {},
              ),
            ]))));
  }
}
