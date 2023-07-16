import 'dart:async';
import 'package:dulich/Global/alert.dart';
import 'package:dulich/Providers/register_provider.dart';
import 'package:dulich/Views/forgot/forgot_pass.dart';
import 'package:flutter/material.dart';
import 'package:flutter_easyloading/flutter_easyloading.dart';
import 'package:pin_code_fields/pin_code_fields.dart';

import '../../Global/color.dart';

// ignore: must_be_immutable
class ConfirmToken extends StatefulWidget {
  String email;
  ConfirmToken({Key? key, required this.email}) : super(key: key);

  @override
  State<StatefulWidget> createState() {
    // ignore: no_logic_in_create_state
    return ConfirmTokenState(email);
  }
}

class ConfirmTokenState extends State<ConfirmToken> {
  String email;
  ConfirmTokenState(this.email);
  TextEditingController txtCode = TextEditingController();

  StreamController<ErrorAnimationType>? errorController;
  bool hasError = false;
  final formKey = GlobalKey<FormState>();
  bool isCompleted = false;

  void _code() async {
    snackBar('Đang kiểm tra...');
    bool isSuccess =
        await RegisterProvider.confirmToken(txtCode.text.toUpperCase());
    if (isSuccess) {
      showDialog(
          context: context,
          builder: (BuildContext context) {
            return Alert1(title: 'Xác nhận thành công');
          });
      Navigator.push(
        context,
        MaterialPageRoute(
          builder: (context) => ForgotPass(
            code: txtCode.text,
          ),
        ),
      );
    } else {
      showDialog(
          context: context,
          builder: (BuildContext context) {
            return Alert1(title: 'Mã xác nhận không chính xác!');
          });
      EasyLoading.dismiss();
    }
  }

  @override
  void initState() {
    super.initState();
    errorController = StreamController<ErrorAnimationType>();
    super.initState();
  }

  @override
  void dispose() {
    errorController!.close();

    super.dispose();
  }

  // snackBar Widget
  snackBar(String? message) {
    return ScaffoldMessenger.of(context).showSnackBar(
      SnackBar(
        content: Text(message!),
        duration: const Duration(seconds: 2),
      ),
    );
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        leading: GestureDetector(
          onTap: () {
            Navigator.pop(context);
          },
          child: const Icon(
            Icons.arrow_back_ios,
            color: blackColor,
          ),
        ),
        elevation: 0,
        backgroundColor: miniColor,
        title: const Text(
          'Mã xác minh',
          style: TextStyle(color: blackColor, fontSize: 24),
        ),
        centerTitle: true,
      ),
      body: Form(
          key: formKey,
          child: SingleChildScrollView(
            child: Column(
              mainAxisAlignment: MainAxisAlignment.spaceBetween,
              children: [
                Container(
                  alignment: Alignment.centerLeft,
                  padding: const EdgeInsets.only(
                      top: 20, left: 15, right: 15, bottom: 10),
                  child: Text(
                    "Nhập mã xác minh gồm 6 chữ số mà chúng tôi đã gửi cho bạn qua email.\n" +
                        email,
                    textAlign: TextAlign.center,
                    style: TextStyle(
                        fontWeight: FontWeight.w400,
                        fontSize: 16,
                        height: 1.5,
                        color: blackColor),
                  ),
                ),
                Container(
                  padding: const EdgeInsets.only(
                      top: 40, left: 15, bottom: 10, right: 15),
                  child: PinCodeTextField(
                    textCapitalization: TextCapitalization.characters,
                    appContext: context,
                    pastedTextStyle: const TextStyle(
                      color: greencolor,
                      fontSize: 24,
                      fontWeight: FontWeight.bold,
                    ),
                    length: 6,
                    obscureText: true,
                    blinkWhenObscuring: true,
                    animationType: AnimationType.fade,
                    validator: (v) {
                      if (v!.length < 6) {
                        return "Mã xác minh không hợp lệ";
                      } else {
                        return null;
                      }
                    },
                    pinTheme: PinTheme(
                      shape: PinCodeFieldShape.box,
                      borderRadius: BorderRadius.circular(5),
                      fieldHeight: 60,
                      fieldWidth: 45,
                      activeFillColor: Colors.white,
                      inactiveFillColor: Colors.white,
                      activeColor: greencolor,
                      inactiveColor: const Color(0XFFB1BCD0),
                      selectedFillColor: Colors.white,
                      selectedColor: blueColor,
                    ),
                    cursorColor: Colors.black,
                    animationDuration: const Duration(milliseconds: 300),
                    enableActiveFill: true,
                    errorAnimationController: errorController,
                    controller: txtCode,
                    keyboardType: TextInputType.text,
                    backgroundColor: Colors.white,
                    onChanged: (value) {
                      setState(() {
                        if (txtCode.text.length == 6) {
                          isCompleted = true;
                        } else {
                          isCompleted = false;
                        }
                      });
                    },
                    beforeTextPaste: (text) {
                      return true;
                    },
                  ),
                ),
                Container(
                  margin: const EdgeInsets.only(
                      bottom: 20, left: 15, right: 15, top: 20),
                  width: 374,
                  height: 50,
                  decoration: BoxDecoration(
                      borderRadius: BorderRadius.circular(10),
                      color: isCompleted ? blueColor : const Color(0XFFB1BCD0)),
                  child: TextButton(
                    onPressed: () {
                      isCompleted ? _code() : null;
                    },
                    child: const Text(
                      "Tiếp tục",
                      style: TextStyle(
                          color: Colors.white,
                          fontSize: 18,
                          fontFamily: 'Roboto',
                          fontWeight: FontWeight.w700),
                    ),
                  ),
                ),
              ],
            ),
          )),
    );
  }
}
