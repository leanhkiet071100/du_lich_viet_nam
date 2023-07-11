import 'package:dulich/Global/color.dart';
import 'package:flutter/material.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';

class BookTour extends StatelessWidget {
  final String imgText;
  final String title;
  final String time;
  BookTour(
      {Key? key,
      required this.imgText,
      required this.title,
      required this.time})
      : super(key: key);

  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return SliverList(
      delegate: SliverChildBuilderDelegate(
        (BuildContext context, int index) {
          return InkWell(
              onTap: () {},
              child:
                  Column(mainAxisAlignment: MainAxisAlignment.start, children: [
                Container(
                  padding: EdgeInsets.only(left: 20, right: 20),
                  child: Stack(
                    alignment: Alignment.center,
                    children: [
                      Card(
                        elevation: 1.0,
                        shape: const RoundedRectangleBorder(
                          borderRadius: BorderRadiusDirectional.all(
                            Radius.circular(16),
                          ),
                        ),
                        clipBehavior: Clip.antiAlias,
                        child: Image.network(
                          imgText,
                          /*a.image*/
                          width: double.maxFinite,
                          height: size.height * 0.25,
                          fit: BoxFit.cover,
                        ),
                      ),
                      Positioned(
                        top: 115,
                        child: Container(
                          width: MediaQuery.of(context).size.width - 25,
                          padding: const EdgeInsets.only(left: 10, right: 10),
                          height: 90,
                          decoration: const BoxDecoration(
                              borderRadius: BorderRadiusDirectional.only(
                                  bottomEnd: Radius.circular(25),
                                  bottomStart: Radius.circular(25)),
                              color: Color(0XFFFFFFFF),
                              gradient: LinearGradient(
                                  colors: [Color(0X0D5E9EFF), greencolor],
                                  begin: Alignment.topCenter,
                                  end: Alignment.bottomCenter,
                                  tileMode: TileMode.clamp)),
                        ),
                      ),
                      Positioned(
                        top: 140,
                        left: 20,
                        right: 20,
                        child: Column(
                          crossAxisAlignment: CrossAxisAlignment.start,
                          children: [
                            Container(
                              margin: const EdgeInsets.only(bottom: 5),
                              child: Text(
                                title,
                                overflow: TextOverflow.ellipsis,
                                style: const TextStyle(
                                  color: blackColor,
                                  fontWeight: FontWeight.w700,
                                  fontSize: 20,
                                  shadows: [
                                    Shadow(
                                      blurRadius: 5.0,
                                      color: whiteColor,
                                      offset: Offset(1.5, 0.5),
                                    ),
                                  ],
                                ),
                              ),
                            ),
                            Row(
                              mainAxisAlignment: MainAxisAlignment.start,
                              children: [
                                Container(
                                  decoration: const BoxDecoration(
                                      shape: BoxShape.circle,
                                      boxShadow: [
                                        BoxShadow(
                                          color: blueColor,
                                          offset: Offset(1.5, 0.5),
                                          blurRadius: 5.0,
                                        ),
                                      ]),
                                  child: const FaIcon(
                                    FontAwesomeIcons.clock,
                                    color: Color(0XFFFFFFFF),
                                    size: 18,
                                  ),
                                ),
                                Container(
                                  padding: const EdgeInsets.only(left: 5),
                                  child: Text(
                                    time,
                                    style: const TextStyle(
                                      color: blackColor,
                                      fontWeight: FontWeight.w700,
                                      fontSize: 18,
                                      shadows: [
                                        Shadow(
                                          blurRadius: 5.0,
                                          color: whiteColor,
                                          offset: Offset(1.5, 0.5),
                                        ),
                                      ],
                                    ),
                                  ),
                                ),
                              ],
                            )
                          ],
                        ),
                      ),
                    ],
                  ),
                ),
              ]));
        },
        childCount: 2,
      ),
    );
  }
}
