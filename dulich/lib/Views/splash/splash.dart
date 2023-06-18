import 'dart:async';

import 'package:flutter/material.dart';

import '../login/login.dart';

class SplashPage extends StatefulWidget {
  const SplashPage({Key? key}) : super(key: key);

  @override
  _SplashPageState createState() => _SplashPageState();
}

class _SplashPageState extends State<SplashPage> {
  void initState() {
    super.initState();
    var duration = const Duration(seconds: 3);
    Timer(
        duration,
        () => Navigator.pushReplacement(
            context, MaterialPageRoute(builder: (context) => Login())));
  }

  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return Scaffold(
        body: Container(
      alignment: Alignment.center,
      child: Image.asset(
        'images/background.png',
        height: double.infinity,
        fit: BoxFit.fill,
      ),
    ));
  }
}
