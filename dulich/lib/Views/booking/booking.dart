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
                  height: size.height * 0.05,
                ),
                // Container(
                //   padding: const EdgeInsets.only(left: 10),
                //   child: ListTile(
                //     title: const Text(
                //       'Xin chào,',
                //       style: TextStyle(color: blackColor, fontSize: 16),
                //     ),
                //     subtitle: const Text(
                //       'Nguyễn Văn A',
                //       style: TextStyle(
                //           color: blackColor,
                //           fontSize: 18,
                //           fontWeight: FontWeight.w700),
                //     ),
                //     trailing: IconButton(
                //         onPressed: () {
                //           //
                //         },
                //         icon: const Icon(
                //           Icons.notifications,
                //           color: blackColor,
                //           size: 26,
                //         )),
                //   ),
                // ),
                // Container(
                //   width: size.width * 0.9,
                //   height: size.height * 0.07,
                //   decoration: BoxDecoration(
                //       color: greencolor,
                //       borderRadius: BorderRadius.circular(10)),
                //   padding: const EdgeInsets.only(left: 15, right: 15),
                //   child: Center(
                //     child: TextFormField(
                //       autovalidateMode: AutovalidateMode.onUserInteraction,
                //       decoration: const InputDecoration(
                //           border: InputBorder.none,
                //           hintText: "Tìm kiếm...",
                //           hintStyle:
                //               TextStyle(color: Colors.grey, fontSize: 18),
                //           prefixIcon: Icon(
                //             Icons.search,
                //             color: Colors.black54,
                //             size: 25,
                //           )),
                //     ),
                //   ),
                // ),
                SizedBox(height: size.height * 0.02),
                Row(
                  children: [
                    Container(
                      margin:
                          EdgeInsets.only(left: 20, right: size.width * 0.45),
                      child: const Text(
                        'Tour Miền Bắc',
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
                  'https://dulichviet.com.vn/images/bandidau/NOI-DIA/Sapa/ban-cat-cat-du-lich-sapa-gia-re.jpg',
              title: 'Tour Du lịch Hà Nội - Lào Cai - Sapa',
              time: '4 ngày 3 đêm'),
          BookTour(
              imgText:
                  'https://dulichviet.com.vn/images/bandidau/NOI-DIA/Ha-Giang/du-lich-ha-giang-gia-tot-du-lich-viet(3).jpg',
              title: 'Du lịch Hè Tour Đông Bắc Hà Nội - Hà Giang - Cao Bằng',
              time: '6 ngày 5 đêm'),
          SliverToBoxAdapter(
            child: Column(
              children: [
                Row(
                  children: [
                    Container(
                      margin:
                          EdgeInsets.only(left: 20, right: size.width * 0.45),
                      child: const Text(
                        'Tour Miền Nam',
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
                  'https://cdn.vietnambiz.vn/1881912202022555/images/crawl-20220803091705107.jpg',
              title: 'Du lịch Phú Quốc',
              time: '3 Ngày 2 Đêm'),
          BookTour(
              imgText:
                  'https://nld.mediacdn.vn/291774122806476800/2023/1/25/dsc2035-16746471971471475340332.jpg',
              title: 'Du lịch Tây Ninh - Núi Bà Đen',
              time: '2 Ngày 1 Đêm'),
          SliverToBoxAdapter(
            child: Column(
              children: [
                Row(
                  children: [
                    Container(
                      margin:
                          EdgeInsets.only(left: 20, right: size.width * 0.4),
                      child: const Text(
                        'Tour Miền Trung',
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
                  'https://dulichviet.com.vn/images/bandidau/NOI-DIA/Phu-Yen/ghenh-da-dia-du-lich-viet.jpg',
              title: 'Du lịch Lễ 2/9 - Tour Du lịch Quy Nhơn - Phú Yên ',
              time: '4 Ngày 3 Đêm'),
          BookTour(
              imgText:
                  'https://dulichviet.com.vn/images/bandidau/NOI-DIA/Da-Nang/ba-na-hill-du-lich-tet-am-lich.jpg',
              title: 'Du lịch Hè - Tour Đà Nẵng',
              time: '5 Ngày 4 Đêm'),
        ],
      ),
    );
  }
}
