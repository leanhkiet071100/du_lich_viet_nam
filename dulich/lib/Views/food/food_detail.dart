import 'package:dulich/Views/food/food_list.dart';

import 'package:flutter/material.dart';

import 'package:google_fonts/google_fonts.dart';

import '../../Global/color.dart';

class FoodDetail extends StatefulWidget {
  const FoodDetail({Key? key}) : super(key: key);

  @override
  _FoodDetailState createState() => _FoodDetailState();
}

class _FoodDetailState extends State<FoodDetail> {
  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return Scaffold(
      backgroundColor: Colors.white,
      extendBodyBehindAppBar: true,
      appBar: AppBar(
          automaticallyImplyLeading: false,
          backgroundColor: Colors.transparent,
          elevation: 0,
          leading: null,
          leadingWidth: 0,
          titleSpacing: 0,
          title: Container(
            padding: const EdgeInsets.only(left: 10),
            child: GestureDetector(
              onTap: () {
                Navigator.pop(context);
              },
              child: const Icon(
                Icons.arrow_back_ios,
                color: blackColor,
              ),
            ),
          )),
      body: CustomScrollView(
        slivers: [
          SliverToBoxAdapter(
            child: Column(
              mainAxisAlignment: MainAxisAlignment.spaceEvenly,
              children: [
                Image.network(
                  'https://nhahanghoangthao.vn/wp-content/uploads/elementor/thumbs/about-pej7lc7dey04g6jovubyff0fyeqn8dyu0gx5q6unwg.jpg',
                  fit: BoxFit.cover,
                  width: MediaQuery.of(context).size.width,
                  height: 232,
                ),
                SizedBox(
                  height: size.height * 0.02,
                ),
                Container(
                  padding: const EdgeInsets.only(left: 10, right: 10),
                  child: Row(
                    mainAxisAlignment: MainAxisAlignment.start,
                    children: [
                      const Icon(
                        Icons.loyalty,
                        color: Colors.orange,
                        size: 20,
                      ),
                      SizedBox(
                        width: size.width * 0.02,
                      ),
                      Text(
                        "Bãi biển, Khu 4, Cát Tiến, Quy nhơn..",
                        maxLines: 2,
                        textAlign: TextAlign.start,
                        overflow: TextOverflow.ellipsis,
                        style: GoogleFonts.quicksand(
                          fontSize: 16,
                          fontWeight: FontWeight.w600,
                        ),
                      )
                    ],
                  ),
                ),

                SizedBox(
                  width: size.width * 0.02,
                  height: size.height * 0.01,
                ),
                //Load số điện thoại
                Container(
                  padding: const EdgeInsets.only(left: 10, right: 10),
                  child: Row(
                    children: [
                      Icon(
                        Icons.phone,
                        color: Colors.greenAccent[400],
                        size: 20,
                      ),
                      SizedBox(
                        width: size.width * 0.02,
                      ),
                      Text(
                        '+84 3202 13184',
                        style: GoogleFonts.quicksand(
                            fontSize: 16, fontWeight: FontWeight.w600),
                      ),
                    ],
                  ),
                ),
                SizedBox(
                  width: size.width * 0.02,
                  height: size.height * 0.01,
                ),
                // dữ liệu tĩnh
                Container(
                  padding: const EdgeInsets.only(left: 10, right: 10),
                  child: Row(
                    children: [
                      const Icon(
                        Icons.location_on,
                        color: Colors.red,
                        size: 20,
                      ),
                      SizedBox(
                        width: size.width * 0.02,
                      ),
                      Text(
                        'Bình Định',
                        style: GoogleFonts.quicksand(
                            fontSize: 16, fontWeight: FontWeight.w600),
                      ),
                    ],
                  ),
                ),
                Container(
                  padding: const EdgeInsets.fromLTRB(15, 10, 10, 10),
                  child: const Text(
                    "Mô tả",
                    style: TextStyle(
                      height: 1.5,
                      fontSize: 18,
                      fontWeight: FontWeight.w700,
                      color: blackColor,
                    ),
                  ),
                ),
                Container(
                  padding: const EdgeInsets.fromLTRB(15, 0, 15, 20),
                  child: const Text(
                    'Hầu hết người xem trang của bạn sẽ thấy khoảng 5 - 10 phần nội dung. Phần lớn họ sử dụng điện thoại di động nên sẽ lướt qua các nội dung rất nhanh. Vì vậy bạn không nên đưa nội dung thành một đoạn văn liền mạch quá dài. Mà hãy chia thành các mục nhỏ, sử dụng cách viết liệt kê, in đậm chữ để làm nổi bật những ý chính.',
                    textAlign: TextAlign.justify,
                    style: TextStyle(
                      fontSize: 16,
                      height: 1.5,
                      fontWeight: FontWeight.normal,
                    ),
                  ),
                ),

                Container(
                  padding: const EdgeInsets.fromLTRB(15, 0, 10, 0),
                  child: const Text(
                    "Menu",
                    style: TextStyle(
                      height: 1.5,
                      fontSize: 18,
                      fontWeight: FontWeight.w700,
                      color: blackColor,
                    ),
                  ),
                ),
              ],
            ),
          ),
          FoodList(
              imgText:
                  'https://beptueu.vn/hinhanh/tintuc/top-15-hinh-anh-mon-an-ngon-viet-nam-khien-ban-khong-the-roi-mat-1.jpg',
              nameF: 'Bánh abc ngon chan',
              costF: 35000),
        ],
      ),
      // body: SingleChildScrollView(
      //   child: Column(
      //     mainAxisAlignment: MainAxisAlignment.spaceEvenly,
      //     children: [
      //       Image.network(
      //         'https://nhahanghoangthao.vn/wp-content/uploads/elementor/thumbs/about-pej7lc7dey04g6jovubyff0fyeqn8dyu0gx5q6unwg.jpg',
      //         fit: BoxFit.cover,
      //         width: MediaQuery.of(context).size.width,
      //         height: 232,
      //       ),
      //       SizedBox(
      //         height: size.height * 0.02,
      //       ),
      //       Container(
      //         padding: const EdgeInsets.only(left: 10, right: 10),
      //         child: Row(
      //           mainAxisAlignment: MainAxisAlignment.start,
      //           children: [
      //             const Icon(
      //               Icons.loyalty,
      //               color: Colors.orange,
      //               size: 20,
      //             ),
      //             SizedBox(
      //               width: size.width * 0.02,
      //             ),
      //             Text(
      //               "Bãi biển, Khu 4, Cát Tiến, Quy nhơn..",
      //               maxLines: 2,
      //               textAlign: TextAlign.start,
      //               overflow: TextOverflow.ellipsis,
      //               style: GoogleFonts.quicksand(
      //                 fontSize: 16,
      //                 fontWeight: FontWeight.w600,
      //               ),
      //             )
      //           ],
      //         ),
      //       ),

      //       SizedBox(
      //         width: size.width * 0.02,
      //         height: size.height * 0.01,
      //       ),
      //       //Load số điện thoại
      //       Container(
      //         padding: const EdgeInsets.only(left: 10, right: 10),
      //         child: Row(
      //           children: [
      //             Icon(
      //               Icons.phone,
      //               color: Colors.greenAccent[400],
      //               size: 20,
      //             ),
      //             SizedBox(
      //               width: size.width * 0.02,
      //             ),
      //             Text(
      //               '+84 3202 13184',
      //               style: GoogleFonts.quicksand(
      //                   fontSize: 16, fontWeight: FontWeight.w600),
      //             ),
      //           ],
      //         ),
      //       ),
      //       SizedBox(
      //         width: size.width * 0.02,
      //         height: size.height * 0.01,
      //       ),
      //       // dữ liệu tĩnh
      //       Container(
      //         padding: const EdgeInsets.only(left: 10, right: 10),
      //         child: Row(
      //           children: [
      //             const Icon(
      //               Icons.location_on,
      //               color: Colors.red,
      //               size: 20,
      //             ),
      //             SizedBox(
      //               width: size.width * 0.02,
      //             ),
      //             Text(
      //               'Bình Định',
      //               style: GoogleFonts.quicksand(
      //                   fontSize: 16, fontWeight: FontWeight.w600),
      //             ),
      //           ],
      //         ),
      //       ),
      //       Container(
      //         padding: const EdgeInsets.fromLTRB(15, 10, 10, 10),
      //         child: const Text(
      //           "Mô tả",
      //           style: TextStyle(
      //             height: 1.5,
      //             fontSize: 18,
      //             fontWeight: FontWeight.w700,
      //             color: blackColor,
      //           ),
      //         ),
      //       ),
      //       Container(
      //         padding: const EdgeInsets.fromLTRB(15, 0, 15, 20),
      //         child: const Text(
      //           'Hầu hết người xem trang của bạn sẽ thấy khoảng 5 - 10 phần nội dung. Phần lớn họ sử dụng điện thoại di động nên sẽ lướt qua các nội dung rất nhanh. Vì vậy bạn không nên đưa nội dung thành một đoạn văn liền mạch quá dài. Mà hãy chia thành các mục nhỏ, sử dụng cách viết liệt kê, in đậm chữ để làm nổi bật những ý chính.',
      //           textAlign: TextAlign.justify,
      //           style: TextStyle(
      //             fontSize: 16,
      //             height: 1.5,
      //             fontWeight: FontWeight.normal,
      //           ),
      //         ),
      //       ),

      //       Container(
      //         padding: const EdgeInsets.fromLTRB(15, 0, 10, 0),
      //         child: const Text(
      //           "Menu",
      //           style: TextStyle(
      //             height: 1.5,
      //             fontSize: 18,
      //             fontWeight: FontWeight.w700,
      //             color: blackColor,
      //           ),
      //         ),
      //       ),
      //       Container(
      //         child: SingleChildScrollView(
      //           child: GridView.count(
      //               shrinkWrap: true,
      //               padding: const EdgeInsets.symmetric(vertical: 10),
      //               crossAxisCount: 2,
      //               childAspectRatio: .9,
      //               crossAxisSpacing: 20,
      //               children: List.generate(
      //                 6,
      //                 (index) => FoodList(
      //                     imgText:
      //                         'https://beptueu.vn/hinhanh/tintuc/top-15-hinh-anh-mon-an-ngon-viet-nam-khien-ban-khong-the-roi-mat-1.jpg',
      //                     nameF: 'Bánh abc ngon chan',
      //                     costF: 35000),
      //               )),
      //         ),
      //       )
      //     ],
      //   ),
      // ),
    );
  }
}
