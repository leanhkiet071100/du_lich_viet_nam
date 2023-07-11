import 'package:flutter/material.dart';

class HotelNew extends StatelessWidget {
  final String imgText;
  final String name;
  final String adress;
  final String phone;

  HotelNew({
    Key? key,
    required this.imgText,
    required this.name,
    required this.adress,
    required this.phone,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return SliverList(
      delegate: SliverChildBuilderDelegate(
        (BuildContext context, int index) {
          return Card(
              child: Container(
            padding: EdgeInsets.only(bottom: 10, left: 10),
            child: Row(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                // Load hình ảnh
                Container(
                  padding: const EdgeInsets.only(left: 5, right: 5),
                  width: 110,
                  height: 100,
                  child: ClipRRect(
                    borderRadius: const BorderRadius.all(Radius.circular(10)),
                    child: Image.network(
                      imgText,
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
                      name,
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
                            adress,
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
                          phone,
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
              ],
            ),
          ));
        },
        childCount: 4,
      ),
    );
  }
}
