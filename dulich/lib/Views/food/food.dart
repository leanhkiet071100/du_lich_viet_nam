import 'package:dulich/Models/quanan_object.dart';
import 'package:dulich/Views/food/food_detail.dart';
import 'package:flutter/material.dart';

class Food extends StatelessWidget {
  final List<QuanAn> listRes;
  const Food({Key? key, required this.listRes}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return ListView.builder(
      itemCount: listRes.length,
      itemBuilder: (context, index) => InkWell(
        onTap: (() {
          Navigator.push(
              context,
              MaterialPageRoute(
                  builder: (context) => FoodDetail(
                        lstQa: listRes[index],
                      )));
        }),
        child: Card(
          child: Container(
            width: double.infinity,
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
                      listRes[index].hinh_quan_an,
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
                    Container(
                      child: Text(
                        listRes[index].ten_quan_an,
                        overflow: TextOverflow.ellipsis,
                        maxLines: 1,
                        style: TextStyle(
                          fontSize: 16,
                          fontWeight: FontWeight.w700,
                        ),
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
                            listRes[index].dia_chi +
                                ', ' +
                                listRes[index].xa +
                                ', ' +
                                listRes[index].huyen,
                            maxLines: 2,
                            overflow: TextOverflow.ellipsis,
                            style: TextStyle(
                              fontSize: 10,
                              fontWeight: FontWeight.w500,
                            ),
                          ),
                        )
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
                          listRes[index].so_dien_thoai,
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
                          listRes[index].tinh,
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
