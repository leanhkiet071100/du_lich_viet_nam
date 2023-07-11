import 'package:dulich/Models/hotel_object.dart';
import 'package:dulich/Views/hotel/hotel_detail.dart';
import 'package:flutter/material.dart';

class HotetScreen extends StatelessWidget {
  final List<Hotel> listHotels;
  const HotetScreen({Key? key, required this.listHotels}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return ListView.builder(
      itemCount: listHotels.length,
      itemBuilder: (context, index) => InkWell(
        onTap: (() {
          Navigator.push(
            context,
            MaterialPageRoute(
                builder: (context) => HotelDetail(listDl: listHotels[index])),
          );
        }),
        child: Card(
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
                      listHotels[index].hinh_noi_luu_tru,
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
                      listHotels[index].ten_noi_luu_tru,
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
                            listHotels[index].dia_chi +
                                ', ' +
                                listHotels[index].xa +
                                ', ' +
                                listHotels[index].huyen +
                                ' ',
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
                          listHotels[index].so_dien_thoai.toString(),
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
                          listHotels[index].tinh,
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
          ),
        ),
      ),
    );
  }
}
