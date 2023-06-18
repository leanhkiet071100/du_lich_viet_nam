import 'package:dulich/Views/dashboard/dashboard.dart';
import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';
import '../../Global/color.dart';

class HotelPage extends StatefulWidget {
  const HotelPage({Key? key}) : super(key: key);

  @override
  _HotelPageState createState() => _HotelPageState();
}

class _HotelPageState extends State<HotelPage> {
  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return Scaffold(
      appBar: AppBar(
          toolbarHeight: size.height * 0.15,
          leading: GestureDetector(
            onTap: () {
              Navigator.pushAndRemoveUntil(
                  context,
                  MaterialPageRoute(builder: (context) => const Dashboard()),
                  (route) => false);
            },
            child: const Icon(
              Icons.arrow_back_ios,
              color: blackColor,
            ),
          ),
          elevation: 0,
          backgroundColor: miniColor,
          title: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              const Text(
                'Khách sạn',
                style: TextStyle(color: blackColor, fontSize: 24),
              ),
              SizedBox(
                height: size.height * 0.01,
              ),
              Container(
                width: size.width * 0.68,
                height: size.height * 0.05,
                decoration: BoxDecoration(
                    color: greencolor, borderRadius: BorderRadius.circular(10)),
                padding: const EdgeInsets.only(left: 5, right: 15),
                child: Center(
                  child: TextFormField(
                    autovalidateMode: AutovalidateMode.onUserInteraction,
                    decoration: const InputDecoration(
                        border: InputBorder.none,
                        hintText: "Tìm kiếm",
                        hintStyle: TextStyle(color: Colors.grey, fontSize: 18),
                        prefixIcon: Icon(
                          Icons.search,
                          color: Colors.black54,
                          size: 25,
                        )),
                  ),
                ),
              ),
              SizedBox(
                height: size.height * 0.01,
              ),
            ],
          )),
      body: SafeArea(
        child: ListView.builder(
          itemCount: 5,
          itemBuilder: (context, index) => Card(
            child: Container(
              margin: const EdgeInsets.all(5),
              child: Row(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  // Load hình ảnh
                  Container(
                    padding: EdgeInsets.only(left: 5, right: 5),
                    width: 110,
                    height: 100,
                    child: ClipRRect(
                      borderRadius: BorderRadius.all(Radius.circular(10)),
                      child: Image.network(
                        'https://static-images.vnncdn.net/files/publish/2023/5/24/348559308-3784185538484345-527454361338992790-n-546.jpg',
                        fit: BoxFit.cover,
                      ),
                    ),
                  ),
                  // Tên nơi lưu trú

                  SizedBox(
                    width: size.width * 0.02,
                    height: size.height * 0.02,
                  ),
                  // Tên nơi lưu trú
                  Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Text(
                        'Hoàng Thao Seaview',
                        maxLines: 2,
                        overflow: TextOverflow.ellipsis,
                        style: GoogleFonts.quicksand(
                            color: Colors.black,
                            fontSize: 14,
                            fontWeight: FontWeight.w700),
                      ),
                      SizedBox(
                        width: size.width * 0.02,
                        height: size.height * 0.01,
                      ),
                      Row(
                        mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                        children: [
                          const Icon(
                            Icons.loyalty,
                            color: Colors.orange,
                            size: 14,
                          ),
                          SizedBox(
                            width: size.width * 0.02,
                          ),
                          Container(
                            child: Text(
                              "Bãi biển, Khu 4, Cát Tiến, Quy nhơn, bình định",
                              overflow: TextOverflow.ellipsis,
                              style: GoogleFonts.quicksand(
                                fontSize: 10,
                                fontWeight: FontWeight.w600,
                              ),
                            ),
                          ),
                        ],
                      ),
                      SizedBox(
                        width: size.width * 0.02,
                        height: size.height * 0.01,
                      ),
                      //Load số điện thoại
                      Row(
                        children: [
                          Icon(
                            Icons.phone,
                            color: Colors.greenAccent[400],
                            size: 14,
                          ),
                          SizedBox(
                            width: size.width * 0.02,
                          ),
                          Text(
                            '+84 3202 13184',
                            style: GoogleFonts.quicksand(
                                fontSize: 10, fontWeight: FontWeight.w600),
                          ),
                        ],
                      ),
                      SizedBox(
                        width: size.width * 0.02,
                        height: size.height * 0.01,
                      ),
                      // dữ liệu tĩnh
                      Row(
                        children: [
                          const Icon(
                            Icons.location_on,
                            color: Colors.red,
                            size: 14,
                          ),
                          SizedBox(
                            width: size.width * 0.02,
                          ),
                          Text(
                            'Bình Định',
                            style: GoogleFonts.quicksand(
                                fontSize: 10, fontWeight: FontWeight.w600),
                          ),
                        ],
                      ),
                    ],
                  ),

                  // Align(
                  //   alignment: Alignment.topRight,
                  //   child: Padding(
                  //     padding: const EdgeInsets.all(4.0),
                  //     child: IconButton(
                  //         icon: const Icon(
                  //           Icons.more_horiz,
                  //           size: 18,
                  //         ),
                  //         onPressed: () {}),
                  //   ),
                  // ),
                ],
              ),
            ),
          ),
        ),
      ),
    );
  }
}
