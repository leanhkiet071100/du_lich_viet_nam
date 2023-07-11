import 'package:dulich/Global/alert.dart';
import 'package:dulich/Global/color.dart';
import 'package:dulich/Models/goi_dulich.dart';
import 'package:dulich/Providers/goidulich_provider.dart';
import 'package:dulich/Views/booking/book_now.dart';
import 'package:flutter/material.dart';
import 'package:intl/intl.dart';

// class Tour {
//   final String name;
//   final String description;
//   final String detail;
//   final String image;
//   final String cost;

//   Tour(
//       {required this.name,
//       required this.description,
//       required this.detail,
//       required this.image,
//       required this.cost});
// }

// final List<Tour> tours = [
//   Tour(
//       name: 'Tour Tây Nguyên 3N2Đ',
//       description: 'Khám Phá Tà Đùng - Buôn Mê Thuột - Thác Draysap',
//       detail:
//           'ĐIỂM ĐÓN: 4h15: Nhà Văn Hóa Thanh Niên (04 Phạm Ngọc Thạch, Q1) \nNGÀY 1: TP HỒ CHÍ MINH - HỒ TÀ ĐÙNG – BUÔN MA THUỘT ( ĂN SÁNG, TRƯA, TỐI) \nSáng: Xe và Hướng dẫn viên đón quý khách tại điểm hẹn. Chào mừng các thành viên của đoàn đã tham gia hành trình. Bắt đầu hành trình tour đi theo QL14 đi Buôn Ma Thuột qua Sóc Bombo, Bù Đăng, đường mòn Hồ Chí Minh.',
//       cost: " 2.786.000 VNĐ",
//       image:
//           'https://cattour.vn/images/upload/images/Tay-nguyen/du-lich-tay-nguyen-mua-nao-dep/taynguyenmuanaodep1.png'),
//   Tour(
//       name: 'Tour Đà Lạt 3N3Đ',
//       description:
//           'Cao Nguyên Hoa - Làng Châu Âu - Thác Datanla - Đồi Chè Cầu Đất',
//       detail:
//           'ĐIỂM ĐÓN: 4h15: Nhà Văn Hóa Thanh Niên (04 Phạm Ngọc Thạch, Q1) \nNGÀY 1: TP HỒ CHÍ MINH - HỒ TÀ ĐÙNG – BUÔN MA THUỘT ( ĂN SÁNG, TRƯA, TỐI) \nSáng: Xe và Hướng dẫn viên đón quý khách tại điểm hẹn. Chào mừng các thành viên của đoàn đã tham gia hành trình. Bắt đầu hành trình tour đi theo QL14 đi Buôn Ma Thuột qua Sóc Bombo, Bù Đăng, đường mòn Hồ Chí Minh.',
//       cost: " 2.390.000 VNĐ",
//       image:
//           'https://ednaresort.vn/wp-content/uploads/2021/09/du-lich-da-lat-nen-mat-gi.jpg'),
//   Tour(
//       name: 'Tour Đà Lạt 3N3Đ',
//       description:
//           'Cao Nguyên Hoa - Làng Châu Âu - Thác Datanla - Đồi Chè Cầu Đất',
//       detail:
//           'ĐIỂM ĐÓN: 4h15: Nhà Văn Hóa Thanh Niên (04 Phạm Ngọc Thạch, Q1) \nNGÀY 1: TP HỒ CHÍ MINH - HỒ TÀ ĐÙNG – BUÔN MA THUỘT ( ĂN SÁNG, TRƯA, TỐI) \nSáng: Xe và Hướng dẫn viên đón quý khách tại điểm hẹn. Chào mừng các thành viên của đoàn đã tham gia hành trình. Bắt đầu hành trình tour đi theo QL14 đi Buôn Ma Thuột qua Sóc Bombo, Bù Đăng, đường mòn Hồ Chí Minh.',
//       cost: " 2.390.000 VNĐ",
//       image:
//           'https://ednaresort.vn/wp-content/uploads/2021/09/du-lich-da-lat-nen-mat-gi.jpg'),
//   Tour(
//       name: 'Tour Đà Lạt 3N3Đ',
//       description:
//           'Cao Nguyên Hoa - Làng Châu Âu - Thác Datanla - Đồi Chè Cầu Đất',
//       detail:
//           'ĐIỂM ĐÓN: 4h15: Nhà Văn Hóa Thanh Niên (04 Phạm Ngọc Thạch, Q1) \nNGÀY 1: TP HỒ CHÍ MINH - HỒ TÀ ĐÙNG – BUÔN MA THUỘT ( ĂN SÁNG, TRƯA, TỐI) \nSáng: Xe và Hướng dẫn viên đón quý khách tại điểm hẹn. Chào mừng các thành viên của đoàn đã tham gia hành trình. Bắt đầu hành trình tour đi theo QL14 đi Buôn Ma Thuột qua Sóc Bombo, Bù Đăng, đường mòn Hồ Chí Minh.',
//       cost: " 2.390.000 VNĐ",
//       image:
//           'https://ednaresort.vn/wp-content/uploads/2021/09/du-lich-da-lat-nen-mat-gi.jpg'),
//   Tour(
//       name: 'Tour Tây Nguyên 3N2Đ',
//       description: 'Khám Phá Tà Đùng - Buôn Mê Thuột - Thác Draysap',
//       detail:
//           'ĐIỂM ĐÓN: 4h15: Nhà Văn Hóa Thanh Niên (04 Phạm Ngọc Thạch, Q1) \nNGÀY 1: TP HỒ CHÍ MINH - HỒ TÀ ĐÙNG – BUÔN MA THUỘT ( ĂN SÁNG, TRƯA, TỐI) \nSáng: Xe và Hướng dẫn viên đón quý khách tại điểm hẹn. Chào mừng các thành viên của đoàn đã tham gia hành trình. Bắt đầu hành trình tour đi theo QL14 đi Buôn Ma Thuột qua Sóc Bombo, Bù Đăng, đường mòn Hồ Chí Minh.',
//       cost: " 2.786.000 VNĐ",
//       image:
//           'https://cattour.vn/images/upload/images/Tay-nguyen/du-lich-tay-nguyen-mua-nao-dep/taynguyenmuanaodep1.png'),
//   Tour(
//       name: 'Tour Đà Lạt 3N3Đ',
//       description:
//           'Cao Nguyên Hoa - Làng Châu Âu - Thác Datanla - Đồi Chè Cầu Đất',
//       detail:
//           'ĐIỂM ĐÓN: 4h15: Nhà Văn Hóa Thanh Niên (04 Phạm Ngọc Thạch, Q1) \nNGÀY 1: TP HỒ CHÍ MINH - HỒ TÀ ĐÙNG – BUÔN MA THUỘT ( ĂN SÁNG, TRƯA, TỐI) \nSáng: Xe và Hướng dẫn viên đón quý khách tại điểm hẹn. Chào mừng các thành viên của đoàn đã tham gia hành trình. Bắt đầu hành trình tour đi theo QL14 đi Buôn Ma Thuột qua Sóc Bombo, Bù Đăng, đường mòn Hồ Chí Minh.',
//       cost: " 2.390.000 VNĐ",
//       image:
//           'https://ednaresort.vn/wp-content/uploads/2021/09/du-lich-da-lat-nen-mat-gi.jpg'),
//   Tour(
//       name: 'Tour Đà Lạt 3N3Đ',
//       description:
//           'Cao Nguyên Hoa - Làng Châu Âu - Thác Datanla - Đồi Chè Cầu Đất',
//       detail:
//           'ĐIỂM ĐÓN: 4h15: Nhà Văn Hóa Thanh Niên (04 Phạm Ngọc Thạch, Q1) \nNGÀY 1: TP HỒ CHÍ MINH - HỒ TÀ ĐÙNG – BUÔN MA THUỘT ( ĂN SÁNG, TRƯA, TỐI) \nSáng: Xe và Hướng dẫn viên đón quý khách tại điểm hẹn. Chào mừng các thành viên của đoàn đã tham gia hành trình. Bắt đầu hành trình tour đi theo QL14 đi Buôn Ma Thuột qua Sóc Bombo, Bù Đăng, đường mòn Hồ Chí Minh.',
//       cost: " 2.390.000 VNĐ",
//       image:
//           'https://ednaresort.vn/wp-content/uploads/2021/09/du-lich-da-lat-nen-mat-gi.jpg'),
//   Tour(
//       name: 'Tour Đà Lạt 3N3Đ',
//       description:
//           'Cao Nguyên Hoa - Làng Châu Âu - Thác Datanla - Đồi Chè Cầu Đất',
//       detail:
//           'ĐIỂM ĐÓN: 4h15: Nhà Văn Hóa Thanh Niên (04 Phạm Ngọc Thạch, Q1) \nNGÀY 1: TP HỒ CHÍ MINH - HỒ TÀ ĐÙNG – BUÔN MA THUỘT ( ĂN SÁNG, TRƯA, TỐI) \nSáng: Xe và Hướng dẫn viên đón quý khách tại điểm hẹn. Chào mừng các thành viên của đoàn đã tham gia hành trình. Bắt đầu hành trình tour đi theo QL14 đi Buôn Ma Thuột qua Sóc Bombo, Bù Đăng, đường mòn Hồ Chí Minh.',
//       cost: " 2.390.000 VNĐ",
//       image:
//           'https://ednaresort.vn/wp-content/uploads/2021/09/du-lich-da-lat-nen-mat-gi.jpg'),
// ];

class TourListScreen extends StatelessWidget {
  const TourListScreen({
    Key? key,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return Scaffold(
      appBar: AppBar(
        toolbarHeight: size.height * 0.08,
        elevation: 0,
        backgroundColor: miniColor,
        title: Center(
          child: Text(
            '        Tours',
            style: TextStyle(color: Colors.black, fontWeight: FontWeight.bold),
          ),
        ),
        actions: [
          Container(
            child: IconButton(
              onPressed: () {},
              icon: Icon(
                Icons.search,
                color: Colors.black,
              ),
            ),
          ),
        ],
      ),
      body: FutureBuilder<List<GoiDuLich>>(
          future: GoiDuLichProvider.fetchPosts(),
          builder: (context, snapshot) {
            if (snapshot.hasData) {
              return BookingDetail(list: snapshot.data!);
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

class BookingDetail extends StatelessWidget {
  final List<GoiDuLich> list;
  const BookingDetail({Key? key, required this.list}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    var format = NumberFormat.currency(locale: 'vi_VN', symbol: '₫');
    return GridView.builder(
        itemCount: list.length,
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
                    tour: list[index],
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
                      list[index].hinh_goi_du_lich,
                      height: 150,
                      fit: BoxFit.cover,
                    ),
                    const SizedBox(height: 8),
                    Text(
                      list[index].ten,
                      overflow: TextOverflow.ellipsis,
                      style: TextStyle(
                          color: blackColor,
                          fontSize: 20,
                          fontWeight: FontWeight.w700),
                    ),
                    const SizedBox(height: 4),
                    Text(
                      list[index].thong_tin_dich_vu,
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
                      'Giá: ' + format.format(list[index].gia_nguoi_lon),
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
        });
  }
}

class TourDetailScreen extends StatefulWidget {
  GoiDuLich tour;
  TourDetailScreen({Key? key, required this.tour}) : super(key: key);

  @override
  _TourDetailScreenState createState() => _TourDetailScreenState(tour);
}

class _TourDetailScreenState extends State<TourDetailScreen> {
  GoiDuLich tour;
  _TourDetailScreenState(this.tour);
  var format = NumberFormat.currency(locale: 'vi_VN', symbol: '₫');
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
        elevation: 0,
        backgroundColor: miniColor,
        title: Center(
          child: Text(
            tour.ten,
            style: TextStyle(color: Colors.black, fontWeight: FontWeight.bold),
          ),
        ),
      ),
      body: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        mainAxisAlignment: MainAxisAlignment.center,
        children: [
          Image.network(tour.hinh_goi_du_lich),
          const SizedBox(height: 16),
          Container(
            padding: EdgeInsets.all(10),
            child: Text(
              tour.thong_tin_dich_vu,
              style: TextStyle(
                  height: 1.5,
                  color: blackColor,
                  fontSize: 16,
                  fontWeight: FontWeight.w400),
            ),
          ),
          Container(
            padding: EdgeInsets.only(right: 10),
            child: Align(
              alignment: Alignment.bottomRight,
              child: Text(
                'Giá: ' + format.format(tour.gia_nguoi_lon),
                textAlign: TextAlign.left,
                style: TextStyle(
                    height: 1.5,
                    color: Colors.red,
                    fontSize: 18,
                    fontWeight: FontWeight.w700),
              ),
            ),
          ),
          Container(
            padding: EdgeInsets.only(left: 150, right: 100),
            child: ElevatedButton(
                onPressed: () {
                  Navigator.push(
                    context,
                    MaterialPageRoute(
                      builder: (context) => AlertTour(
                        tour: tour,
                      ),
                    ),
                  );
                },
                child: const Text(
                  'Đặt tour',
                  style: TextStyle(
                      height: 1.5, fontSize: 16, fontWeight: FontWeight.w700),
                ),
                style: ButtonStyle(
                  backgroundColor: MaterialStateProperty.all<Color>(blueColor),
                  foregroundColor:
                      MaterialStateProperty.all<Color>(Colors.white),
                )),
          ),
        ],
      ),
    );
  }
}
