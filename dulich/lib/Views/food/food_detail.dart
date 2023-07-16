import 'package:dulich/Models/mon_an.dart';
import 'package:dulich/Models/quanan_object.dart';
import 'package:flutter/material.dart';
import 'package:intl/intl.dart';
import '../../Global/color.dart';

class FoodDetail extends StatefulWidget {
  QuanAn lstQa;

  FoodDetail({
    Key? key,
    required this.lstQa,
  }) : super(key: key);

  @override
  _FoodDetailState createState() => _FoodDetailState(lstQa);
}

class _FoodDetailState extends State<FoodDetail> {
  QuanAn lstQa;
  _FoodDetailState(this.lstQa);
  List<MonAn> monan = [];
  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    var format = NumberFormat.currency(locale: 'vi_VN', symbol: '₫');

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
                  lstQa.hinh_quan_an,
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
                        lstQa.dia_chi + ', ' + lstQa.xa + ', ' + lstQa.huyen,
                        maxLines: 2,
                        textAlign: TextAlign.start,
                        overflow: TextOverflow.ellipsis,
                        style: TextStyle(
                          fontSize: 16,
                          fontWeight: FontWeight.w500,
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
                        lstQa.so_dien_thoai,
                        style: TextStyle(
                          fontSize: 16,
                          fontWeight: FontWeight.w500,
                        ),
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
                        lstQa.tinh,
                        style: TextStyle(
                          fontSize: 16,
                          fontWeight: FontWeight.w500,
                        ),
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
                  padding: const EdgeInsets.fromLTRB(15, 0, 15, 10),
                  child: Text(
                    lstQa.mo_ta,
                    textAlign: TextAlign.justify,
                    style: TextStyle(
                      fontSize: 16,
                      height: 1.5,
                      fontWeight: FontWeight.normal,
                    ),
                  ),
                ),
              ],
            ),
          ),
          SliverList(
            delegate: SliverChildBuilderDelegate(
              (BuildContext context, int index) {
                return Row(
                  mainAxisAlignment: MainAxisAlignment.center,
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
                                    borderRadius: const BorderRadius.all(
                                        Radius.circular(5)),
                                    child: Image.network(
                                      monan[index].hinh_mon_an,
                                      fit: BoxFit.cover,
                                    ),
                                  ),
                                ),
                                Container(
                                  padding:
                                      const EdgeInsets.only(left: 5, bottom: 5),
                                  child: Text(
                                    monan[index].ten_mon,
                                    overflow: TextOverflow.ellipsis,
                                    style: TextStyle(
                                      fontSize: 18,
                                      fontWeight: FontWeight.w500,
                                    ),
                                  ),
                                ),
                                Row(
                                  children: [
                                    Container(
                                      padding: const EdgeInsets.only(left: 5),
                                      child: Text(
                                        'Giá:',
                                        style: TextStyle(
                                            fontSize: 16,
                                            fontWeight: FontWeight.w500,
                                            color: Colors.red),
                                      ),
                                    ),
                                    Container(
                                      padding: const EdgeInsets.only(left: 5),
                                      child: Text(
                                        format.format(monan[index].gia_ban),
                                        style: TextStyle(
                                          fontSize: 16,
                                          fontWeight: FontWeight.w500,
                                        ),
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
                                      monan[index].hinh_mon_an,
                                      fit: BoxFit.cover,
                                    ),
                                  ),
                                ),
                                Container(
                                  padding: const EdgeInsets.only(left: 5),
                                  child: Text(
                                    monan[index].ten_mon,
                                    overflow: TextOverflow.ellipsis,
                                    style: TextStyle(
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
                                        style: TextStyle(
                                            fontSize: 15,
                                            fontWeight: FontWeight.bold,
                                            color: Colors.red),
                                      ),
                                    ),
                                    Container(
                                      padding: const EdgeInsets.only(left: 5),
                                      child: Text(
                                        format.format(monan[index].gia_ban),
                                        style: TextStyle(
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
              childCount: monan.length,
            ),
          ),
        ],
      ),
    );
  }
}
