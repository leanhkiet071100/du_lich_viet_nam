import 'package:dulich/Global/color.dart';
import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';

class FoodList extends StatelessWidget {
  final String imgText;
  final String nameF;
  final double costF;
  FoodList(
      {Key? key,
      required this.imgText,
      required this.nameF,
      required this.costF})
      : super(key: key);

  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return SliverList(
      delegate: SliverChildBuilderDelegate(
        (BuildContext context, int index) {
          return Row(
            children: [
              Container(
                alignment: Alignment.center,
                height: 200,
                width: 180,
                padding: EdgeInsets.only(left: 5, right: 5),
                child: Stack(children: [
                  Card(
                      color: greencolor,
                      child: Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          Container(
                            padding: const EdgeInsets.only(
                              bottom: 5,
                            ),
                            height: size.height * 0.18,
                            child: ClipRRect(
                              borderRadius:
                                  const BorderRadius.all(Radius.circular(5)),
                              child: Image.network(
                                imgText,
                                fit: BoxFit.cover,
                              ),
                            ),
                          ),
                          Container(
                            padding: const EdgeInsets.only(left: 5),
                            child: Text(
                              nameF,
                              overflow: TextOverflow.ellipsis,
                              style: GoogleFonts.quicksand(
                                  fontSize: 18,
                                  fontWeight: FontWeight.bold,
                                  color: Colors.black),
                            ),
                          ),
                          Row(
                            children: [
                              Container(
                                padding: const EdgeInsets.only(left: 5),
                                child: Text(
                                  'Giá:',
                                  style: GoogleFonts.quicksand(
                                      fontSize: 15,
                                      fontWeight: FontWeight.bold,
                                      color: Colors.red),
                                ),
                              ),
                              Container(
                                padding: const EdgeInsets.only(left: 5),
                                child: Text(
                                  '${costF}vnd',
                                  style: GoogleFonts.quicksand(
                                      fontSize: 15,
                                      fontWeight: FontWeight.w600,
                                      color: blackColor),
                                ),
                              ),
                            ],
                          )
                        ],
                      )),
                ]),
              ),
              Container(
                alignment: Alignment.center,
                height: 200,
                width: 180,
                padding: EdgeInsets.only(left: 5, right: 5),
                child: Stack(children: [
                  Card(
                      color: greencolor,
                      child: Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          Container(
                            padding: const EdgeInsets.only(
                              bottom: 5,
                            ),
                            height: size.height * 0.18,
                            child: ClipRRect(
                              borderRadius:
                                  BorderRadius.all(Radius.circular(5)),
                              child: Image.network(
                                imgText,
                                fit: BoxFit.cover,
                              ),
                            ),
                          ),
                          Container(
                            padding: const EdgeInsets.only(left: 5),
                            child: Text(
                              nameF,
                              overflow: TextOverflow.ellipsis,
                              style: GoogleFonts.quicksand(
                                  fontSize: 18,
                                  fontWeight: FontWeight.bold,
                                  color: Colors.black),
                            ),
                          ),
                          Row(
                            children: [
                              Container(
                                padding: const EdgeInsets.only(left: 5),
                                child: Text(
                                  'Giá:',
                                  style: GoogleFonts.quicksand(
                                      fontSize: 15,
                                      fontWeight: FontWeight.bold,
                                      color: Colors.red),
                                ),
                              ),
                              Container(
                                padding: const EdgeInsets.only(left: 5),
                                child: Text(
                                  '${costF}vnd',
                                  style: GoogleFonts.quicksand(
                                      fontSize: 15,
                                      fontWeight: FontWeight.w600,
                                      color: blackColor),
                                ),
                              ),
                            ],
                          )
                        ],
                      )),
                ]),
              )
            ],
          );
        },
        // số lượng nội dung
        childCount: 10,
      ),
    );
  }
}
