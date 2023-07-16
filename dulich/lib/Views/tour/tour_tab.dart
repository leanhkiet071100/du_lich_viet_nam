import 'package:dulich/Global/color.dart';
import 'package:dulich/Global/contants.dart';
import 'package:dulich/Models/phieu_dat.dart';
import 'package:dulich/Views/tour/tour_detail.dart';
import 'package:flutter/material.dart';
import 'package:intl/intl.dart';

class TourTab extends StatefulWidget {
  final List<PhieuDat> list;
  TourTab({Key? key, required this.list}) : super(key: key);

  @override
  _TourTabState createState() => _TourTabState(list);
}

class _TourTabState extends State<TourTab> with TickerProviderStateMixin {
  final List<PhieuDat> list;
  _TourTabState(this.list);
  final format = NumberFormat.currency(locale: 'vi_VN', symbol: '₫');

  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return ListView.builder(
        itemCount: list.length,
        itemBuilder: (context, index) => InkWell(
            onTap: () {
              Navigator.push(
                  context,
                  MaterialPageRoute(
                      builder: (context) => TourDetail(
                            list: list[index],
                          )));
            },
            child: Card(
                child: Column(children: [
              SizedBox(height: 16.0),
              Image.network(
                list[index].hinh_anh,
                //width: size.width * 0.9,
                height: size.height * 0.3,
                fit: BoxFit.cover,
              ),
              SizedBox(height: 16.0),
              Container(
                padding: EdgeInsets.only(left: 20, right: 10),
                child: Align(
                  alignment: Alignment.topLeft,
                  child: Text(
                    list[index].ten_du_lich,
                    overflow: TextOverflow.ellipsis,
                    style: TextStyle(fontWeight: FontWeight.bold, fontSize: 18),
                  ),
                ),
              ),
              SizedBox(height: 8.0),
              Container(
                padding: EdgeInsets.only(left: 20, right: 10),
                child: Row(
                  children: [
                    Icon(Icons.calendar_today),
                    SizedBox(width: 8.0),
                    Text('Ngày khởi hành: ' + list[index].ngay_khoi_hanh,
                        style: TextStyle(
                            fontWeight: FontWeight.w400, fontSize: 16)),
                  ],
                ),
              ),
              SizedBox(height: 8.0),
              Container(
                padding: EdgeInsets.only(left: 20, right: 10),
                child: Row(
                  children: [
                    Icon(Icons.wallet),
                    SizedBox(width: 8.0),
                    Text('Tổng tiền: ' + format.format(list[index].tong_tien),
                        style: TextStyle(
                            fontWeight: FontWeight.w400, fontSize: 16)),
                  ],
                ),
              ),
              SizedBox(height: 10.0),
              // kTextButton(
              //   'Hủy đặt tour',
              //   () {},
              // ),
              // SizedBox(height: 18.0),
            ]))));
  }
}
