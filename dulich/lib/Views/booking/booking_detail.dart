import 'package:dulich/Global/alert.dart';
import 'package:dulich/Global/color.dart';
import 'package:dulich/Views/booking/book_now.dart';
import 'package:flutter/material.dart';

class Tour {
  final String name;
  final String description;
  final String detail;
  final String image;
  final String cost;

  Tour(
      {required this.name,
      required this.description,
      required this.detail,
      required this.image,
      required this.cost});
}

final List<Tour> tours = [
  Tour(
      name: 'Tour Tây Nguyên 3N2Đ',
      description: 'Khám Phá Tà Đùng - Buôn Mê Thuột - Thác Draysap',
      detail:
          'ĐIỂM ĐÓN: 4h15: Nhà Văn Hóa Thanh Niên (04 Phạm Ngọc Thạch, Q1) \nNGÀY 1: TP HỒ CHÍ MINH - HỒ TÀ ĐÙNG – BUÔN MA THUỘT ( ĂN SÁNG, TRƯA, TỐI) \nSáng: Xe và Hướng dẫn viên đón quý khách tại điểm hẹn. Chào mừng các thành viên của đoàn đã tham gia hành trình. Bắt đầu hành trình tour đi theo QL14 đi Buôn Ma Thuột qua Sóc Bombo, Bù Đăng, đường mòn Hồ Chí Minh.',
      cost: " 2.786.000 VNĐ",
      image:
          'https://cattour.vn/images/upload/images/Tay-nguyen/du-lich-tay-nguyen-mua-nao-dep/taynguyenmuanaodep1.png'),
  Tour(
      name: 'Tour Đà Lạt 3N3Đ',
      description:
          'Cao Nguyên Hoa - Làng Châu Âu - Thác Datanla - Đồi Chè Cầu Đất',
      detail:
          'ĐIỂM ĐÓN: 4h15: Nhà Văn Hóa Thanh Niên (04 Phạm Ngọc Thạch, Q1) \nNGÀY 1: TP HỒ CHÍ MINH - HỒ TÀ ĐÙNG – BUÔN MA THUỘT ( ĂN SÁNG, TRƯA, TỐI) \nSáng: Xe và Hướng dẫn viên đón quý khách tại điểm hẹn. Chào mừng các thành viên của đoàn đã tham gia hành trình. Bắt đầu hành trình tour đi theo QL14 đi Buôn Ma Thuột qua Sóc Bombo, Bù Đăng, đường mòn Hồ Chí Minh.',
      cost: " 2.390.000 VNĐ",
      image:
          'https://ednaresort.vn/wp-content/uploads/2021/09/du-lich-da-lat-nen-mat-gi.jpg'),
  Tour(
      name: 'Tour Đà Lạt 3N3Đ',
      description:
          'Cao Nguyên Hoa - Làng Châu Âu - Thác Datanla - Đồi Chè Cầu Đất',
      detail:
          'ĐIỂM ĐÓN: 4h15: Nhà Văn Hóa Thanh Niên (04 Phạm Ngọc Thạch, Q1) \nNGÀY 1: TP HỒ CHÍ MINH - HỒ TÀ ĐÙNG – BUÔN MA THUỘT ( ĂN SÁNG, TRƯA, TỐI) \nSáng: Xe và Hướng dẫn viên đón quý khách tại điểm hẹn. Chào mừng các thành viên của đoàn đã tham gia hành trình. Bắt đầu hành trình tour đi theo QL14 đi Buôn Ma Thuột qua Sóc Bombo, Bù Đăng, đường mòn Hồ Chí Minh.',
      cost: " 2.390.000 VNĐ",
      image:
          'https://ednaresort.vn/wp-content/uploads/2021/09/du-lich-da-lat-nen-mat-gi.jpg'),
  Tour(
      name: 'Tour Đà Lạt 3N3Đ',
      description:
          'Cao Nguyên Hoa - Làng Châu Âu - Thác Datanla - Đồi Chè Cầu Đất',
      detail:
          'ĐIỂM ĐÓN: 4h15: Nhà Văn Hóa Thanh Niên (04 Phạm Ngọc Thạch, Q1) \nNGÀY 1: TP HỒ CHÍ MINH - HỒ TÀ ĐÙNG – BUÔN MA THUỘT ( ĂN SÁNG, TRƯA, TỐI) \nSáng: Xe và Hướng dẫn viên đón quý khách tại điểm hẹn. Chào mừng các thành viên của đoàn đã tham gia hành trình. Bắt đầu hành trình tour đi theo QL14 đi Buôn Ma Thuột qua Sóc Bombo, Bù Đăng, đường mòn Hồ Chí Minh.',
      cost: " 2.390.000 VNĐ",
      image:
          'https://ednaresort.vn/wp-content/uploads/2021/09/du-lich-da-lat-nen-mat-gi.jpg'),
  Tour(
      name: 'Tour Tây Nguyên 3N2Đ',
      description: 'Khám Phá Tà Đùng - Buôn Mê Thuột - Thác Draysap',
      detail:
          'ĐIỂM ĐÓN: 4h15: Nhà Văn Hóa Thanh Niên (04 Phạm Ngọc Thạch, Q1) \nNGÀY 1: TP HỒ CHÍ MINH - HỒ TÀ ĐÙNG – BUÔN MA THUỘT ( ĂN SÁNG, TRƯA, TỐI) \nSáng: Xe và Hướng dẫn viên đón quý khách tại điểm hẹn. Chào mừng các thành viên của đoàn đã tham gia hành trình. Bắt đầu hành trình tour đi theo QL14 đi Buôn Ma Thuột qua Sóc Bombo, Bù Đăng, đường mòn Hồ Chí Minh.',
      cost: " 2.786.000 VNĐ",
      image:
          'https://cattour.vn/images/upload/images/Tay-nguyen/du-lich-tay-nguyen-mua-nao-dep/taynguyenmuanaodep1.png'),
  Tour(
      name: 'Tour Đà Lạt 3N3Đ',
      description:
          'Cao Nguyên Hoa - Làng Châu Âu - Thác Datanla - Đồi Chè Cầu Đất',
      detail:
          'ĐIỂM ĐÓN: 4h15: Nhà Văn Hóa Thanh Niên (04 Phạm Ngọc Thạch, Q1) \nNGÀY 1: TP HỒ CHÍ MINH - HỒ TÀ ĐÙNG – BUÔN MA THUỘT ( ĂN SÁNG, TRƯA, TỐI) \nSáng: Xe và Hướng dẫn viên đón quý khách tại điểm hẹn. Chào mừng các thành viên của đoàn đã tham gia hành trình. Bắt đầu hành trình tour đi theo QL14 đi Buôn Ma Thuột qua Sóc Bombo, Bù Đăng, đường mòn Hồ Chí Minh.',
      cost: " 2.390.000 VNĐ",
      image:
          'https://ednaresort.vn/wp-content/uploads/2021/09/du-lich-da-lat-nen-mat-gi.jpg'),
  Tour(
      name: 'Tour Đà Lạt 3N3Đ',
      description:
          'Cao Nguyên Hoa - Làng Châu Âu - Thác Datanla - Đồi Chè Cầu Đất',
      detail:
          'ĐIỂM ĐÓN: 4h15: Nhà Văn Hóa Thanh Niên (04 Phạm Ngọc Thạch, Q1) \nNGÀY 1: TP HỒ CHÍ MINH - HỒ TÀ ĐÙNG – BUÔN MA THUỘT ( ĂN SÁNG, TRƯA, TỐI) \nSáng: Xe và Hướng dẫn viên đón quý khách tại điểm hẹn. Chào mừng các thành viên của đoàn đã tham gia hành trình. Bắt đầu hành trình tour đi theo QL14 đi Buôn Ma Thuột qua Sóc Bombo, Bù Đăng, đường mòn Hồ Chí Minh.',
      cost: " 2.390.000 VNĐ",
      image:
          'https://ednaresort.vn/wp-content/uploads/2021/09/du-lich-da-lat-nen-mat-gi.jpg'),
  Tour(
      name: 'Tour Đà Lạt 3N3Đ',
      description:
          'Cao Nguyên Hoa - Làng Châu Âu - Thác Datanla - Đồi Chè Cầu Đất',
      detail:
          'ĐIỂM ĐÓN: 4h15: Nhà Văn Hóa Thanh Niên (04 Phạm Ngọc Thạch, Q1) \nNGÀY 1: TP HỒ CHÍ MINH - HỒ TÀ ĐÙNG – BUÔN MA THUỘT ( ĂN SÁNG, TRƯA, TỐI) \nSáng: Xe và Hướng dẫn viên đón quý khách tại điểm hẹn. Chào mừng các thành viên của đoàn đã tham gia hành trình. Bắt đầu hành trình tour đi theo QL14 đi Buôn Ma Thuột qua Sóc Bombo, Bù Đăng, đường mòn Hồ Chí Minh.',
      cost: " 2.390.000 VNĐ",
      image:
          'https://ednaresort.vn/wp-content/uploads/2021/09/du-lich-da-lat-nen-mat-gi.jpg'),
];

class TourListScreen extends StatelessWidget {
  const TourListScreen({Key? key}) : super(key: key);

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
            'Tours',
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
      body: GridView.builder(
        itemCount: tours.length,
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
                  builder: (context) => TourDetailScreen(tour: tours[index]),
                ),
              );
            },
            child: Card(
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  Image.network(
                    tours[index].image,
                    height: 150,
                    fit: BoxFit.cover,
                  ),
                  const SizedBox(height: 8),
                  Text(
                    tours[index].name,
                    overflow: TextOverflow.ellipsis,
                    style: TextStyle(
                        color: blackColor,
                        fontSize: 20,
                        fontWeight: FontWeight.w700),
                  ),
                  const SizedBox(height: 4),
                  Text(
                    tours[index].description,
                    overflow: TextOverflow.visible,
                    style: TextStyle(
                        color: blackColor,
                        fontSize: 16,
                        fontWeight: FontWeight.w400),
                  ),
                  const SizedBox(height: 4),
                  Text(
                    'Giá: ' + tours[index].cost,
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
          );
        },
      ),
    );
  }
}

class TourDetailScreen extends StatelessWidget {
  final Tour tour;

  const TourDetailScreen({Key? key, required this.tour}) : super(key: key);

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
            tour.name,
            style: TextStyle(color: Colors.black, fontWeight: FontWeight.bold),
          ),
        ),
      ),
      body: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          Image.network(tour.image),
          const SizedBox(height: 16),
          Container(
            padding: EdgeInsets.all(10),
            child: Text(
              tour.detail,
              style: TextStyle(
                  height: 1.5,
                  color: blackColor,
                  fontSize: 16,
                  fontWeight: FontWeight.w400),
            ),
          ),
          Container(
            padding: EdgeInsets.all(10),
            child: Text(
              'Giá' + tour.cost,
              textAlign: TextAlign.left,
              style: TextStyle(
                  height: 1.5,
                  color: blackColor,
                  fontSize: 16,
                  fontWeight: FontWeight.w700),
            ),
          ),
          const SizedBox(height: 0),
          Container(
            padding: EdgeInsets.only(left: 150, right: 100),
            child: ElevatedButton(
                onPressed: () {
                  Navigator.push(
                    context,
                    MaterialPageRoute(
                      builder: (context) => AlertTour(),
                    ),
                  );
                },
                child: const Text(
                  'Book Now',
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
