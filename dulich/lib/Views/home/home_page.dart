import 'package:dulich/Global/color.dart';
import 'package:dulich/Views/food/food_page.dart';
import 'package:dulich/Views/home/components/hotel_new.dart';
import 'package:dulich/Views/home/components/post_new.dart';
import 'package:dulich/Views/hotel/hotel_page.dart';

import 'package:dulich/Views/post/post_page.dart';

import 'package:flutter/material.dart';

class HomePage extends StatefulWidget {
  const HomePage({Key? key}) : super(key: key);

  @override
  _HomePageState createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {
  List iconImages = [
    "images/hotel.png",
    "images/food.png",
    "images/list.png",
  ];
  List imgs = [
    'https://vcdn-dulich.vnecdn.net/2020/01/08/sac-mau-cua-bien-vnexpress-1-6641-1578454676.jpg',
    'https://media.vov.vn/sites/default/files/styles/large/public/2020-09/99-thuyen_hoa.jpg'
  ];
  List<Route> historicalfigures = [
    MaterialPageRoute(builder: (_) => HotelPage()),
    MaterialPageRoute(builder: (_) => FoodPage()),
    MaterialPageRoute(builder: (_) => PostPage()),
  ];

  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return Scaffold(
      body: CustomScrollView(slivers: [
        SliverToBoxAdapter(
          child: Column(
            children: [
              Container(
                padding: const EdgeInsets.only(left: 10, top: 20),
                child: ListTile(
                  title: const Text(
                    'Xin chào,',
                    style: TextStyle(color: blackColor, fontSize: 16),
                  ),
                  subtitle: const Text(
                    'Như Quỳnh',
                    style: TextStyle(
                        color: blackColor,
                        fontSize: 18,
                        fontWeight: FontWeight.w700),
                  ),
                  trailing: IconButton(
                      onPressed: () {
                        //
                      },
                      icon: const Icon(
                        Icons.notifications,
                        color: blackColor,
                        size: 26,
                      )),
                ),
              ),
              Container(
                width: size.width * 0.9,
                height: size.height * 0.07,
                decoration: BoxDecoration(
                    color: greencolor, borderRadius: BorderRadius.circular(10)),
                padding: const EdgeInsets.only(left: 15, right: 15),
                child: Center(
                  child: TextFormField(
                    autovalidateMode: AutovalidateMode.onUserInteraction,
                    decoration: const InputDecoration(
                        border: InputBorder.none,
                        hintText: "Tìm kiếm...",
                        hintStyle: TextStyle(color: Colors.grey, fontSize: 18),
                        prefixIcon: Icon(
                          Icons.search,
                          color: Colors.black54,
                          size: 25,
                        )),
                  ),
                ),
              ),
              SizedBox(height: size.height * 0.02),
              SizedBox(
                height: size.height * 0.09,
                child: ListView.builder(
                    scrollDirection: Axis.horizontal,
                    shrinkWrap: true,
                    itemCount: iconImages.length,
                    itemBuilder: ((context, index) {
                      return Container(
                          padding: const EdgeInsets.symmetric(horizontal: 10),
                          child: InkWell(
                            splashColor: blueColor,
                            onTap: () {
                              Navigator.push(context, historicalfigures[index]);
                            },
                            child: Card(
                              elevation: 4,
                              shape: RoundedRectangleBorder(
                                  borderRadius: BorderRadius.circular(10)),
                              child: Container(
                                width: size.width * 0.17,
                                height: size.height * 0.09,
                                decoration: BoxDecoration(
                                    color: blueColor,
                                    borderRadius: BorderRadius.circular(10)),
                                child: Center(
                                    child: Image(
                                  height: size.height * 0.06,
                                  image: AssetImage(iconImages[index]),
                                )),
                              ),
                            ),
                          ));
                    })),
              ),
              SizedBox(height: size.height * 0.02),
              Container(
                margin: EdgeInsets.only(right: size.width * 0.65),
                child: const Text(
                  'Tin nổi bật',
                  style: TextStyle(
                      color: blackColor,
                      fontSize: 20,
                      fontWeight: FontWeight.w700),
                ),
              ),
              const PostNew(),
              Container(
                margin: EdgeInsets.only(
                    left: 20, right: size.width * 0.5, bottom: 20),
                child: const Text(
                  'Khách sạn nổi bật',
                  style: TextStyle(
                      color: blackColor,
                      fontSize: 20,
                      fontWeight: FontWeight.w700),
                ),
              ),
            ],
          ),
        ),
        HotelNew(
          imgText:
              'https://static-images.vnncdn.net/files/publish/2023/5/24/348559308-3784185538484345-527454361338992790-n-546.jpg',
          name: 'Hoàng Thao Seaview',
          adress: 'Bãi biển, Khu 4, Cát Tiến, Quy nhơn, bình định',
          phone: '+84 3202 13184',
        )
      ]),
    );
  }
}
