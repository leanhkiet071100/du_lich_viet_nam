import 'package:dulich/Global/color.dart';
import 'package:dulich/Views/dashboard/dashboard.dart';
import 'package:dulich/Views/forgot/check_email.dart';
import 'package:dulich/Views/forgot/forgot_pass.dart';
import 'package:flutter/material.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';

import '../register/register_page.dart';

class Login extends StatefulWidget {
  const Login({Key? key}) : super(key: key);

  @override
  _LoginState createState() => _LoginState();
}

class _LoginState extends State<Login> {
  bool _obscureText = true;
  bool checkPass = true;
  bool check = true;

  void showToast() {
    setState(() {
      _obscureText = !_obscureText;
    });
  }

  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return Scaffold(
      body: SingleChildScrollView(
          child:
              Column(crossAxisAlignment: CrossAxisAlignment.start, children: [
        Container(
          margin: const EdgeInsets.only(top: 50, bottom: 50),
          decoration: const BoxDecoration(
            borderRadius: BorderRadius.only(bottomLeft: Radius.circular(90)),
          ),
          child: Center(
              child: Image.asset(
            'images/logo.png',
            width: double.infinity,
            height: size.height * 0.3,
          )),
        ),
        const SizedBox(
          height: 40,
        ),
        // ----------EMAIL-----------
        Container(
          padding: const EdgeInsets.only(left: 15, bottom: 10, right: 15),
          child: TextFormField(
            keyboardType: TextInputType.emailAddress,
            decoration: InputDecoration(
              prefixIcon: const Icon(
                Icons.email,
                color: blueColor,
              ),
              hintText: "Email",
              enabledBorder: OutlineInputBorder(
                borderSide:
                    const BorderSide(width: 1, color: Color(0XFFB1BCD0)),
                borderRadius: BorderRadius.circular(10),
              ),
              focusedBorder: OutlineInputBorder(
                borderSide: const BorderSide(width: 1, color: blueColor),
                borderRadius: BorderRadius.circular(10),
              ),
            ),
          ),
        ),
        const SizedBox(
          height: 10,
        ),
        // ---------------MẬT KHẨU-----------
        Container(
          padding: const EdgeInsets.only(left: 15, bottom: 10, right: 15),
          child: TextFormField(
            keyboardType: TextInputType.visiblePassword,
            obscureText: _obscureText,
            decoration: InputDecoration(
              prefixIcon: const Icon(
                Icons.lock,
                color: blueColor,
              ),
              suffixIcon: IconButton(
                icon: _obscureText
                    ? const FaIcon(
                        FontAwesomeIcons.eyeSlash,
                        color: Color(0XFF65676B),
                        size: 20,
                      )
                    : const FaIcon(
                        FontAwesomeIcons.eye,
                        color: Color(0XFF65676B),
                        size: 20,
                      ),
                onPressed: () {
                  showToast();
                },
                color: Colors.black,
              ),
              hintText: "Mật Khẩu",
              enabledBorder: OutlineInputBorder(
                borderSide:
                    const BorderSide(width: 1, color: Color(0XFFB1BCD0)),
                borderRadius: BorderRadius.circular(10),
              ),
              focusedBorder: OutlineInputBorder(
                borderSide: const BorderSide(width: 1, color: blueColor),
                borderRadius: BorderRadius.circular(10),
              ),
            ),
          ),
        ),

        Row(
          children: [
            Container(
              margin: const EdgeInsets.only(
                left: 35,
              ),
              child: const Text(
                "Nhớ mật khẩu",
                style: TextStyle(
                    //fontWeight: FontWeight.bold,
                    fontSize: 16,
                    color: Color(0XFF242A37)),
              ),
            ),
            IconButton(
                onPressed: () {
                  setState(() {});
                  check = !check;
                },
                icon: check
                    ? const FaIcon(
                        FontAwesomeIcons.solidCheckSquare,
                        color: blueColor,
                        size: 20,
                      )
                    : const FaIcon(
                        FontAwesomeIcons.square,
                        color: blueColor,
                        size: 20,
                      )),
            Expanded(child: Container()),
            Container(
              margin: const EdgeInsets.only(right: 20),
              child: TextButton(
                onPressed: () {
                  Navigator.push(
                    context,
                    MaterialPageRoute(
                      builder: (context) => const CheckEmail(),
                    ),
                  );
                },
                child: const Text(
                  "Quên tài khoản ?",
                  style: TextStyle(
                      color: blueColor,
                      fontSize: 16,
                      fontWeight: FontWeight.w700),
                ),
              ),
            ),
          ],
        ),
        Container(
          margin: const EdgeInsets.only(left: 20, right: 20),
          width: double.infinity,
          decoration: BoxDecoration(
              borderRadius: BorderRadius.circular(10), color: blueColor),
          child: TextButton(
            onPressed: () {
              Navigator.pushReplacement(context,
                  MaterialPageRoute(builder: (context) => Dashboard()));
            },
            child: const Text(
              "Đăng nhập",
              style: TextStyle(
                  color: whiteColor,
                  fontSize: 18,
                  fontFamily: 'Roboto',
                  fontWeight: FontWeight.w700),
            ),
          ),
        ),
        Container(
          margin: const EdgeInsets.only(top: 20),
          height: size.height * 0.3,
          child: Row(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              const Text(
                "Bạn chưa có tài khoản?",
                style: TextStyle(
                  fontFamily: 'Roboto',
                  fontSize: 16,
                  fontWeight: FontWeight.w400,
                ),
              ),
              TextButton(
                onPressed: () {
                  Navigator.push(
                      context,
                      MaterialPageRoute(
                          builder: (context) => const RegisterPage()));
                },
                child: const Text(
                  "Đăng ký ngay",
                  style: TextStyle(
                    fontSize: 16,
                    fontWeight: FontWeight.w700,
                    color: blueColor,
                  ),
                ),
              ),
            ],
          ),
        ),
      ])),
    );
  }
}