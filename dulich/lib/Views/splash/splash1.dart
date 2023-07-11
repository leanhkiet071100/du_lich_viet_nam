import 'package:dulich/Global/color.dart';
import 'package:dulich/Views/login/login.dart';
import 'package:flutter/material.dart';

import '../register/register_page.dart';

class Splash1 extends StatelessWidget {
  const Splash1({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return Scaffold(
      backgroundColor: Colors.white,
      body: SingleChildScrollView(
        child: SizedBox(
          height: MediaQuery.of(context).size.height,
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.center,
            mainAxisAlignment: MainAxisAlignment.spaceBetween,
            children: [
              Container(
                margin: const EdgeInsets.only(top: 10, bottom: 5),
                child: Image.asset(
                  "images/logo.png",
                  fit: BoxFit.cover,
                  color: blueColor,
                ),
              ),
              Column(
                children: [
                  Container(
                    margin: const EdgeInsets.only(left: 15, right: 15),
                    width: double.infinity,
                    //height: size.height * 0.2,
                    decoration: BoxDecoration(
                        borderRadius: BorderRadius.circular(10),
                        color: blueColor),
                    child: TextButton(
                      onPressed: () {
                        Navigator.push(
                          context,
                          MaterialPageRoute(
                            builder: (context) => const Login(),
                          ),
                        );
                      },
                      child: const Text(
                        "Đăng nhập",
                        style: TextStyle(
                            color: Colors.white,
                            fontSize: 18,
                            fontFamily: 'Roboto',
                            fontWeight: FontWeight.w700),
                      ),
                    ),
                  ),
                  Container(
                    margin: const EdgeInsets.only(
                        top: 15, left: 15, right: 15, bottom: 20),
                    width: double.infinity,
                    //height: 50,
                    decoration: BoxDecoration(
                      border: Border.all(
                        color: greencolor,
                        width: 1,
                      ),
                      borderRadius: BorderRadius.circular(10),
                    ),
                    child: TextButton(
                      onPressed: () {
                        Navigator.push(
                            context,
                            MaterialPageRoute(
                                builder: (context) => const RegisterPage()));
                      },
                      child: const Text(
                        "Đăng ký",
                        style: TextStyle(
                            color: blueColor,
                            fontSize: 18,
                            fontFamily: 'Roboto',
                            fontWeight: FontWeight.w700),
                      ),
                    ),
                  ),
                  Container(
                    padding: const EdgeInsets.only(bottom: 20, right: 20),
                    child: InkWell(
                      onTap: () {},
                      child: Row(
                        mainAxisAlignment: MainAxisAlignment.end,
                        children: [
                          Icon(Icons.arrow_circle_right_outlined),
                          SizedBox(
                            width: 10,
                          ),
                          Text(
                            "Bỏ qua",
                            style: TextStyle(
                                color: blueColor,
                                fontSize: 18,
                                fontFamily: 'Roboto',
                                fontWeight: FontWeight.w700),
                          ),
                        ],
                      ),
                    ),
                  ),
                ],
              ),
            ],
          ),
        ),
      ),
    );
  }
}
