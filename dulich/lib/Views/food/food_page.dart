import 'package:dulich/Models/quanan_object.dart';
import 'package:dulich/Providers/quanan_provider.dart';
import 'package:dulich/Views/food/food.dart';
import 'package:dulich/Views/food/food_detail.dart';
import 'package:flutter/material.dart';
import '../../Global/color.dart';
import '../dashboard/dashboard.dart';

class FoodPage extends StatefulWidget {
  const FoodPage({Key? key}) : super(key: key);

  @override
  _FoodPageState createState() => _FoodPageState();
}

class _FoodPageState extends State<FoodPage> {
  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return Scaffold(
      appBar: AppBar(
        toolbarHeight: size.height * 0.1,
        leading: GestureDetector(
          onTap: () {
            Navigator.pushAndRemoveUntil(
                context,
                MaterialPageRoute(builder: (context) => const Dashboard()),
                (route) => false);
          },
          child: const Icon(
            Icons.arrow_back_ios,
            color: blackColor,
          ),
        ),
        elevation: 0,
        backgroundColor: miniColor,
        title: Center(
          child: Text(
            'Quán ăn',
            style: TextStyle(color: Colors.black, fontWeight: FontWeight.bold),
          ),
        ),
        actions: [
          Container(
            child: IconButton(
              onPressed: () {},
              icon: Icon(
                Icons.search,
                color: Colors.black,
              ),
            ),
          ),
        ],
      ),
      body: SafeArea(
        child: FutureBuilder<List<QuanAn>>(
            future: QuanAnProvider.fetchPosts(),
            builder: (context, snapshot) {
              if (snapshot.hasData) {
                return Food(listRes: snapshot.data!);
              } else if (snapshot.hasError) {
                return Center(
                  child: Text('Có lỗi rồi'),
                );
              }
              return Center(child: CircularProgressIndicator());
            }),
      ),
    );
  }
}
