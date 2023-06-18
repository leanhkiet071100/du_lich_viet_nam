import 'package:dulich/Global/color.dart';
import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';

import '../home/home_page.dart';
import '../login/login.dart';
import '../splash/splash.dart';

class UserPage extends StatefulWidget {
  const UserPage({Key? key}) : super(key: key);

  @override
  _UserPageState createState() => _UserPageState();
}

class _UserPageState extends State<UserPage> {
  int _selectedIndex = 0;
  // List<Widget> options = <Widget>[
  //   HomePage(),
  //   UserPage(),
  //   Login(),
  //   SplashPage(),
  // ];
  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return Scaffold(
      body: SingleChildScrollView(
          child: Column(
        mainAxisAlignment: MainAxisAlignment.spaceEvenly,
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          SizedBox(
            height: size.height * 0.05,
          ),
          ListTile(
              leading: ClipOval(
                child: Image.network(
                  'https://haycafe.vn/wp-content/uploads/2021/11/Anh-avatar-dep-chat-lam-hinh-dai-dien-600x600.jpg',
                  width: 60,
                  height: 100,
                  fit: BoxFit.cover,
                ),
              ),
              title: Text(
                'NGUYỄN THỊ NHƯ QUỲNH',
                style: GoogleFonts.quicksand(
                  fontSize: 16,
                  fontWeight: FontWeight.w800,
                ),
              ),
              subtitle: InkWell(
                onTap: () {},
                child: Row(
                  mainAxisAlignment: MainAxisAlignment.start,
                  crossAxisAlignment: CrossAxisAlignment.center,
                  children: [
                    const Icon(
                      Icons.border_color_rounded,
                      color: blackColor,
                      size: 15,
                    ),
                    SizedBox(
                      width: size.width * 0.025,
                      height: size.height * 0.05,
                    ),
                    Text(
                      'Chỉnh sửa thông tin',
                      style: GoogleFonts.quicksand(
                        fontSize: 16,
                        fontWeight: FontWeight.w600,
                      ),
                    ),
                  ],
                ),
              )),
          SizedBox(
            height: size.height * 0.05,
          ),
          InkWell(
            onTap: () {},
            child: Row(
              mainAxisAlignment: MainAxisAlignment.spaceEvenly,
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                const Icon(
                  Icons.border_color_rounded,
                  color: blackColor,
                  size: 15,
                ),
                SizedBox(
                  width: size.width * 0.025,
                  height: size.height * 0.05,
                ),
                Text(
                  'Chỉnh sửa thông tin',
                  style: GoogleFonts.quicksand(
                    fontSize: 16,
                    fontWeight: FontWeight.w600,
                  ),
                ),
              ],
            ),
          )
        ],
      )),
    );
  }
}
