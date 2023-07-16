import 'package:dulich/Global/color.dart';
import 'package:dulich/Global/contants.dart';
import 'package:flutter/material.dart';

class TourTab extends StatefulWidget {
  TourTab({
    Key? key,
  }) : super(key: key);

  @override
  _TourTabState createState() => _TourTabState();
}

class _TourTabState extends State<TourTab> with TickerProviderStateMixin {
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
        elevation: 0,
        backgroundColor: miniColor,
        title: const Text(
          'Lịch sử đặt tour',
          style: TextStyle(color: blackColor, fontSize: 24),
        ),
        centerTitle: true,
        bottom: TabBar(
          labelColor: blueColor,
          unselectedLabelColor: blackColor,
          controller: _tabController,
          tabs: _tabs,
        ),
      ),
      body: TabBarView(
        controller: _tabController,
        children: [
          // Nội dung của tab 1
          Container(
            padding: EdgeInsets.all(16.0),
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.stretch,
              children: [
                Text(
                  'Tour đang chờ duyệt',
                  style: TextStyle(fontSize: 24.0, fontWeight: FontWeight.bold),
                ),
                SizedBox(height: 16.0),
                Image.network(
                  'https://bcp.cdnchinhphu.vn/334894974524682240/2023/7/6/z4493206462692121186bc69bf636b76f65e9937a313db-16886324595351070451172.jpg',
                  height: 200.0,
                  fit: BoxFit.cover,
                ),
                SizedBox(height: 16.0),
                Row(
                  children: [
                    Icon(Icons.calendar_today),
                    SizedBox(width: 8.0),
                    Text('Ngày khởi hành: 10/08/2023'),
                  ],
                ),
                SizedBox(height: 8.0),
                Row(
                  children: [
                    Icon(Icons.location_on),
                    SizedBox(width: 8.0),
                    Text('Điểm đến: Paris, Pháp'),
                  ],
                ),
                SizedBox(height: 8.0),
                Row(
                  children: [
                    Icon(Icons.person),
                    SizedBox(width: 8.0),
                    Text('Số lượng khách: 2'),
                  ],
                ),
                SizedBox(height: 16.0),
                kTextButton(
                  'Hủy đặt tour',
                  () {},
                ),
              ],
            ),
          ),
          // Nội dung của tab 2
          Container(
            padding: EdgeInsets.all(16.0),
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.stretch,
              children: [
                Text(
                  'Tour đã được duyệt',
                  style: TextStyle(fontSize: 24.0, fontWeight: FontWeight.bold),
                ),
                SizedBox(height: 16.0),
                Image.network(
                  'https://bcp.cdnchinhphu.vn/334894974524682240/2023/7/6/z4493206462692121186bc69bf636b76f65e9937a313db-16886324595351070451172.jpg',
                  height: 200.0,
                  fit: BoxFit.cover,
                ),
                SizedBox(height: 16.0),
                Row(
                  children: [
                    Icon(Icons.calendar_today),
                    SizedBox(width: 8.0),
                    Text('Ngày khởi hành: 10/08/2023'),
                  ],
                ),
                SizedBox(height: 8.0),
                Row(
                  children: [
                    Icon(Icons.location_on),
                    SizedBox(width: 8.0),
                    Text('Điểm đến: Paris, Pháp'),
                  ],
                ),
                SizedBox(height: 8.0),
                Row(
                  children: [
                    Icon(Icons.person),
                    SizedBox(width: 8.0),
                    Text('Số lượng khách: 2'),
                  ],
                ),
                SizedBox(height: 16.0),
                kTextButton(
                  'Xem chi tiết',
                  () {},
                ),
              ],
            ),
          ),
        ],
      ),
    );
  }
}
