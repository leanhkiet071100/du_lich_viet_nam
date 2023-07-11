import 'package:dulich/Views/dashboard/dashboard.dart';
import 'package:dulich/Views/hotel/hotel_detail.dart';
import 'package:flutter/material.dart';
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
        toolbarHeight: size.height * 0.1,
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
        title: Center(
          child: Text(
            'Khách sạn',
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
      body: SafeArea(
        child: InkWell(
          onTap: () {
            Navigator.push(context,
                MaterialPageRoute(builder: (context) => HotelDetail()));
          },
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
                          style: TextStyle(
                            fontSize: 16,
                            fontWeight: FontWeight.w700,
                          ),
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
                                style: TextStyle(
                                  fontSize: 10,
                                  fontWeight: FontWeight.w500,
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
                              style: TextStyle(
                                fontSize: 10,
                                fontWeight: FontWeight.w500,
                              ),
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
                              style: TextStyle(
                                fontSize: 10,
                                fontWeight: FontWeight.w500,
                              ),
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
      ),
    );
  }
}
