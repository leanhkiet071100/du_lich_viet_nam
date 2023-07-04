import 'package:dulich/Views/booking/book_tour.dart';
import 'package:dulich/Views/booking/booking_detail.dart';
import 'package:flutter/material.dart';

import '../../Global/color.dart';

class Booking extends StatefulWidget {
  const Booking({
    Key? key,
  }) : super(key: key);

  @override
  _BookingState createState() => _BookingState();
}

class _BookingState extends State<Booking> {
  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return Scaffold(
      body: CustomScrollView(
        slivers: [
          SliverToBoxAdapter(
            child: Column(
              children: [
                SizedBox(
                  height: size.height * 0.02,
                ),
                Container(
                  padding: const EdgeInsets.only(left: 10),
                  child: ListTile(
                    title: const Text(
                      'Xin chào,',
                      style: TextStyle(color: blackColor, fontSize: 16),
                    ),
                    subtitle: const Text(
                      'Nguyễn Văn A',
                      style: TextStyle(
                          color: blackColor,
                          fontSize: 18,
                          fontWeight: FontWeight.w700),
                    ),
                    trailing: IconButton(
                        onPressed: () {
                          //
                        },
                        icon: const Icon(
                          Icons.notifications,
                          color: blackColor,
                          size: 26,
                        )),
                  ),
                ),
                Container(
                  width: size.width * 0.9,
                  height: size.height * 0.07,
                  decoration: BoxDecoration(
                      color: greencolor,
                      borderRadius: BorderRadius.circular(10)),
                  padding: const EdgeInsets.only(left: 15, right: 15),
                  child: Center(
                    child: TextFormField(
                      autovalidateMode: AutovalidateMode.onUserInteraction,
                      decoration: const InputDecoration(
                          border: InputBorder.none,
                          hintText: "Tìm kiếm...",
                          hintStyle:
                              TextStyle(color: Colors.grey, fontSize: 18),
                          prefixIcon: Icon(
                            Icons.search,
                            color: Colors.black54,
                            size: 25,
                          )),
                    ),
                  ),
                ),
                SizedBox(height: size.height * 0.02),
                Row(
                  children: [
                    Container(
                      margin:
                          EdgeInsets.only(left: 20, right: size.width * 0.3),
                      child: const Text(
                        'Top 10 tour Miền Bắc',
                        style: TextStyle(
                            color: blackColor,
                            fontSize: 20,
                            fontWeight: FontWeight.w700),
                      ),
                    ),
                    IconButton(
                        onPressed: () {
                          Navigator.push(
                            context,
                            MaterialPageRoute(
                                builder: (context) => TourListScreen()),
                          );
                        },
                        icon: Icon(Icons.arrow_circle_right_outlined))
                  ],
                ),
              ],
            ),
          ),
          BookTour(
              imgText:
                  'https://owa.bestprice.vn/images/tours/430_242/ha-noi-city-tour-trang-an-bai-dinh-du-thuyen-5-sao-ha-long-cao-cap-5n4d-633ea87207dfc.jpg',
              title:
                  'Hà Nội City Tour - Tràng An - Bái Đính - Du thuyền 5 sao Hạ Long cao cấp 5N4Đ',
              time: '5 Ngày 4 Đêm'),
          SliverToBoxAdapter(
            child: Column(
              children: [
                Row(
                  children: [
                    Container(
                      margin:
                          EdgeInsets.only(left: 10, right: size.width * 0.32),
                      child: const Text(
                        'Top 10 tour Miền Nam',
                        style: TextStyle(
                            color: blackColor,
                            fontSize: 20,
                            fontWeight: FontWeight.w700),
                      ),
                    ),
                    IconButton(
                        onPressed: () {},
                        icon: Icon(Icons.arrow_circle_right_outlined))
                  ],
                ),
              ],
            ),
          ),
          BookTour(
              imgText:
                  'https://owa.bestprice.vn/images/tours/430_242/ha-noi-city-tour-trang-an-bai-dinh-du-thuyen-5-sao-ha-long-cao-cap-5n4d-633ea87207dfc.jpg',
              title:
                  'Hà Nội City Tour - Tràng An - Bái Đính - Du thuyền 5 sao Hạ Long cao cấp 5N4Đ',
              time: '5 Ngày 4 Đêm'),
          SliverToBoxAdapter(
            child: Column(
              children: [
                Row(
                  children: [
                    Container(
                      margin:
                          EdgeInsets.only(left: 20, right: size.width * 0.25),
                      child: const Text(
                        'Top 10 tour Miền Trung',
                        style: TextStyle(
                            color: blackColor,
                            fontSize: 20,
                            fontWeight: FontWeight.w700),
                      ),
                    ),
                    IconButton(
                        onPressed: () {},
                        icon: Icon(Icons.arrow_circle_right_outlined))
                  ],
                ),
              ],
            ),
          ),
          BookTour(
              imgText:
                  'https://owa.bestprice.vn/images/tours/430_242/ha-noi-city-tour-trang-an-bai-dinh-du-thuyen-5-sao-ha-long-cao-cap-5n4d-633ea87207dfc.jpg',
              title:
                  'Hà Nội City Tour - Tràng An - Bái Đính - Du thuyền 5 sao Hạ Long cao cấp 5N4Đ',
              time: '5 Ngày 4 Đêm'),
        ],
      ),
    );
  }
}
