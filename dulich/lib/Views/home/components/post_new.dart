import 'package:dulich/Global/color.dart';
import 'package:flutter/material.dart';
import 'package:flutter_rating_bar/flutter_rating_bar.dart';
import 'package:google_fonts/google_fonts.dart';

class PostNew extends StatefulWidget {
  const PostNew({Key? key}) : super(key: key);

  @override
  _PostNewState createState() => _PostNewState();
}

class _PostNewState extends State<PostNew> {
  List<String> ten = [
    'Sắc màu của biển',
    'Cầu Bàn Tay',
    'Vẻ đẹp Hội An',
    'Huế Mộng Mơ',
  ];
  List<String> imgs = [
    'https://vcdn-dulich.vnecdn.net/2020/01/08/sac-mau-cua-bien-vnexpress-1-6641-1578454676.jpg',
    'https://www.anhdulich.vn/storage/sliders/slide4.jpg',
    'https://bcp.cdnchinhphu.vn/334894974524682240/2022/8/24/giai-nhat-thuyen-hoa-1661307085778425095586.jpg',
    'https://sdl.thuathienhue.gov.vn/UploadFiles/TinTuc/2019/2/27/visithue_viet%20nam%20tuoi%20dep%202.jpg',
  ];
  List<String> tinh = [
    'Quy Nhơn - Bình Định',
    'Đà Nẵng',
    'Hội An ',
    'Thừa Thiên - Huế',
  ];

  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return SizedBox(
      height: size.height * 0.4,
      width: double.infinity,
      child: ListView.builder(
          scrollDirection: Axis.horizontal,
          shrinkWrap: true,
          itemCount: imgs.length,
          itemBuilder: ((context, index) {
            return Padding(
              padding: EdgeInsets.symmetric(
                  horizontal: size.height * 0.02, vertical: size.height * 0.03),
              child: InkWell(
                onTap: () {},
                child: Container(
                  width: size.width * 0.54,
                  decoration: BoxDecoration(
                      borderRadius: BorderRadius.circular(25),
                      color: Colors.white,
                      image: DecorationImage(
                          opacity: 1,
                          fit: BoxFit.cover,
                          image: NetworkImage('${imgs[index]}'))),
                  child: Stack(
                    children: [
                      Align(
                        alignment: Alignment.bottomCenter,
                        child: SizedBox(
                          height: size.height * 0.14,
                          width: size.width * 0.47,
                          child: Column(
                            mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                            crossAxisAlignment: CrossAxisAlignment.start,
                            children: [
                              Text(
                                ten[index],
                                style: TextStyle(
                                    fontSize: 18,
                                    fontWeight: FontWeight.w700,
                                    color: whiteColor),
                              ),
                              Text(
                                tinh[index],
                                style: TextStyle(
                                    fontSize: 16,
                                    fontWeight: FontWeight.w500,
                                    color: whiteColor),
                              ),
                              RatingBar.builder(
                                initialRating: 3,
                                minRating: 1,
                                direction: Axis.horizontal,
                                allowHalfRating: true,
                                itemCount: 5,
                                itemSize: 25,
                                itemPadding:
                                    const EdgeInsets.symmetric(horizontal: 4.0),
                                itemBuilder: (context, _) => const Icon(
                                  Icons.star,
                                  color: Colors.amber,
                                ),
                                onRatingUpdate: (rating) {
                                  print(rating);
                                },
                              ),
                            ],
                          ),
                        ),
                      ),
                      SizedBox(
                        width: size.width * 0.05,
                      ),
                    ],
                  ),
                ),
              ),
            );
          })),
    );
  }
}
