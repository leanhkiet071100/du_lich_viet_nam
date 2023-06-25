import 'package:dulich/Global/color.dart';
import 'package:dulich/Views/forgot/forgot_pass.dart';
import 'package:dulich/Views/user/user_change.dart';
import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';

import '../../Global/alert.dart';
import '../login/login.dart';

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
        mainAxisAlignment: MainAxisAlignment.spaceAround,
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          SizedBox(
            height: size.height * 0.08,
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
              title: const Text(
                'NGUYỄN THỊ NHƯ QUỲNH',
                style: TextStyle(
                  fontSize: 16,
                  fontWeight: FontWeight.w800,
                ),
              ),
              subtitle: InkWell(
                onTap: () {
                  Navigator.push(
                      context,
                      MaterialPageRoute(
                          builder: (context) => const UserChange()));
                },
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
                    const Text(
                      'Chỉnh sửa thông tin',
                      style: TextStyle(
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
            splashColor: greencolor,
            onTap: () {
              showDialog(
                  context: context,
                  builder: (BuildContext context) {
                    return Alert(
                      title: 'Bạn có chắc chắn đổi mật khẩu không?',
                      onAction: () {
                        Navigator.push(
                            context,
                            MaterialPageRoute(
                                builder: (context) => const ForgotPass()));
                      },
                    );
                  });
            },
            child: Container(
                width: double.infinity,
                height: size.height * 0.08,
                padding: const EdgeInsets.only(left: 5, right: 5),
                child: Card(
                  child: Row(
                    mainAxisAlignment: MainAxisAlignment.spaceAround,
                    crossAxisAlignment: CrossAxisAlignment.center,
                    children: [
                      Text(
                        'Lịch sử đặt tour',
                        textAlign: TextAlign.left,
                        style: TextStyle(
                          fontSize: 16,
                          fontWeight: FontWeight.w400,
                        ),
                      ),
                      SizedBox(
                        width: size.width * 0.5,
                        height: size.height * 0.05,
                      ),
                      const Icon(Icons.arrow_circle_right_outlined,
                          color: blackColor, size: 20),
                    ],
                  ),
                )),
          ),
          InkWell(
            splashColor: greencolor,
            onTap: () {
              showDialog(
                  context: context,
                  builder: (BuildContext context) {
                    return Alert(
                      title: 'Bạn có chắc chắn đổi mật khẩu không?',
                      onAction: () {
                        Navigator.push(
                            context,
                            MaterialPageRoute(
                                builder: (context) => const ForgotPass()));
                      },
                    );
                  });
            },
            child: Container(
                width: double.infinity,
                height: size.height * 0.08,
                padding: const EdgeInsets.only(left: 5, right: 5),
                child: Card(
                  child: Row(
                    mainAxisAlignment: MainAxisAlignment.spaceAround,
                    crossAxisAlignment: CrossAxisAlignment.center,
                    children: [
                      Text(
                        'Đổi mật khẩu',
                        textAlign: TextAlign.left,
                        style: TextStyle(
                          fontSize: 16,
                          fontWeight: FontWeight.w400,
                        ),
                      ),
                      SizedBox(
                        width: size.width * 0.5,
                        height: size.height * 0.05,
                      ),
                      const Icon(Icons.arrow_circle_right_outlined,
                          color: blackColor, size: 20),
                    ],
                  ),
                )),
          ),
          InkWell(
            splashColor: greencolor,
            onTap: () {
              showDialog(
                  context: context,
                  builder: (BuildContext context) {
                    return Alert(
                      title: 'Bạn có chắc chắn xóa tài khoản không?',
                      onAction: () {},
                    );
                  });
            },
            child: Container(
                width: double.infinity,
                height: size.height * 0.08,
                padding: const EdgeInsets.only(left: 5, right: 5),
                child: Card(
                  child: Row(
                    mainAxisAlignment: MainAxisAlignment.spaceAround,
                    crossAxisAlignment: CrossAxisAlignment.center,
                    children: [
                      Text(
                        ' Xóa tài khoản',
                        textAlign: TextAlign.left,
                        style: TextStyle(
                          fontSize: 16,
                          fontWeight: FontWeight.w400,
                        ),
                      ),
                      SizedBox(
                        width: size.width * 0.5,
                        height: size.height * 0.05,
                      ),
                      const Icon(Icons.arrow_circle_right_outlined,
                          color: blackColor, size: 20),
                    ],
                  ),
                )),
          ),
          InkWell(
            splashColor: greencolor,
            onTap: () {
              showDialog(
                  context: context,
                  builder: (BuildContext context) {
                    return Alert(
                      title: 'Bạn muốn đăng xuất ứng dụng phải không?',
                      onAction: () {
                        Navigator.pushAndRemoveUntil(
                          context,
                          MaterialPageRoute(builder: (context) => Login()),
                          (route) => false,
                        );
                      },
                    );
                  });
            },
            child: Container(
                width: double.infinity,
                height: size.height * 0.08,
                padding: const EdgeInsets.only(left: 5, right: 5),
                child: Card(
                  child: Row(
                    mainAxisAlignment: MainAxisAlignment.spaceAround,
                    crossAxisAlignment: CrossAxisAlignment.center,
                    children: [
                      Text(
                        'Đăng xuất',
                        textAlign: TextAlign.left,
                        style: TextStyle(
                          fontSize: 16,
                          fontWeight: FontWeight.w400,
                        ),
                      ),
                      SizedBox(
                        width: size.width * 0.5,
                        height: size.height * 0.05,
                      ),
                      const Icon(Icons.arrow_circle_right_outlined,
                          color: blackColor, size: 20),
                    ],
                  ),
                )),
          ),
        ],
      )),
    );
  }
}
