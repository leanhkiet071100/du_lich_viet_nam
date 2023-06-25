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
  List<String> imgs = [
    'https://vcdn-dulich.vnecdn.net/2020/01/08/sac-mau-cua-bien-vnexpress-1-6641-1578454676.jpg',
    'https://media.vov.vn/sites/default/files/styles/large/public/2020-09/99-thuyen_hoa.jpg',
    'https://gonatour.vn/vnt_upload/gallery/09_2019/ba_li.jpg',
    'https://photo-mekongasean.epicdn.me/w950/Uploaded/2023/aopohun/2021_10_11/kinh-nghiem-du-lich-trang-an-6883-9681.jpg',
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
                              const Text(
                                "Sắc màu của biển",
                                style: TextStyle(
                                    fontSize: 18,
                                    fontWeight: FontWeight.w700,
                                    color: whiteColor),
                              ),
                              const Text(
                                "Quy Nhơn - Bình Định",
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
