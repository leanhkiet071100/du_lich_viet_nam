import 'package:dulich/Global/alert.dart';
import 'package:dulich/Global/color.dart';
import 'package:dulich/Providers/register_provider.dart';
import 'package:dulich/Views/login/login.dart';
import 'package:flutter/material.dart';
import 'package:flutter_easyloading/flutter_easyloading.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';

class ForgotPass extends StatefulWidget {
  final String code;
  ForgotPass({Key? key, required this.code}) : super(key: key);

  @override
  _ForgotPassState createState() => _ForgotPassState(code);
}

class _ForgotPassState extends State<ForgotPass> {
  final String code;
  _ForgotPassState(this.code);

  TextEditingController txtPassword = TextEditingController();
  TextEditingController txtPassword2 = TextEditingController();

  final formKey = GlobalKey<FormState>();
  bool checkPass = true;
  bool checkPass2 = true;
  bool isCompleted = false;

  // snackBar Widget
  snackBar(String? message) {
    return ScaffoldMessenger.of(context).showSnackBar(
      SnackBar(
        content: Text(message!),
        duration: const Duration(seconds: 1),
      ),
    );
  }

  void _resetPassword() async {
    if (formKey.currentState!.validate()) {
      snackBar('Vui lòng đợi...');
      bool isSuccess = await RegisterProvider.resetPassword(
          txtPassword.text, txtPassword2.text, code);

      if (isSuccess == 200) {
        showDialog(
            context: context,
            builder: (BuildContext context) {
              return Alert1(
                  title: 'Đổi mật khẩu thành công\nVui lòng đăng nhập');
            });
        Navigator.pushAndRemoveUntil(
            context,
            MaterialPageRoute(
              builder: (BuildContext context) => const Login(),
            ),
            (route) => false);
      } else {
        showDialog(
            context: context,
            builder: (BuildContext context) {
              return Alert1(title: 'Đổi mật khẩu thất bại');
            });
        EasyLoading.dismiss();
      }
    }
  }

  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
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
          'Đổi mật khẩu',
          style: TextStyle(color: blackColor, fontSize: 24),
        ),
        centerTitle: true,
      ),
      body: SingleChildScrollView(
        child: Form(
          key: formKey,
          child: Column(
            children: [
              SizedBox(
                height: size.height * 0.02,
              ),
              Container(
                alignment: Alignment.centerLeft,
                padding: const EdgeInsets.only(
                  left: 20,
                  right: 20,
                ),
                child: const Text(
                  "Đặt mật khẩu mới cho tài khoản của bạn để bạn có thể tiếp tục đăng nhập trên ứng dụng.",
                  textAlign: TextAlign.center,
                  style: TextStyle(
                      fontWeight: FontWeight.w400,
                      fontSize: 16,
                      color: blackColor),
                ),
              ),
              SizedBox(
                height: size.height * 0.05,
              ),
              Container(
                alignment: Alignment.centerLeft,
                padding: const EdgeInsets.only(left: 15, right: 15, bottom: 10),
                child: const Text(
                  "Mật khẩu mới",
                  style: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 16,
                      color: blackColor),
                ),
              ),
              Container(
                padding: const EdgeInsets.only(left: 15, bottom: 10, right: 15),
                child: TextFormField(
                  controller: txtPassword,
                  obscureText: checkPass ? true : false,
                  validator: (value) {
                    if (value!.isEmpty) {
                      return "Mật khẩu không được bỏ trống";
                    } else if (value.length < 6) {
                      return "Mật khẩu tối thiểu 6 ký tự";
                    } else {
                      return null;
                    }
                  },
                  decoration: InputDecoration(
                    enabledBorder: OutlineInputBorder(
                      borderSide:
                          const BorderSide(width: 1, color: Color(0XFFB1BCD0)),
                      borderRadius: BorderRadius.circular(10),
                    ),
                    focusedBorder: OutlineInputBorder(
                      borderSide: const BorderSide(width: 1, color: blueColor),
                      borderRadius: BorderRadius.circular(10),
                    ),
                    suffixIcon: IconButton(
                      onPressed: () {
                        setState(() {});
                        checkPass = !checkPass;
                      },
                      icon: checkPass
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
                    ),
                    hintText: "Nhập mật khẩu mới",
                  ),
                ),
              ),
              Container(
                alignment: Alignment.centerLeft,
                padding: const EdgeInsets.only(left: 15, right: 15, bottom: 10),
                child: const Text(
                  "Xác nhận mật khẩu",
                  style: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 16,
                      color: Color(0XFF242A37)),
                ),
              ),
              Container(
                padding: const EdgeInsets.only(left: 15, bottom: 10, right: 15),
                child: TextFormField(
                  controller: txtPassword2,
                  validator: (value) {
                    if (value!.isEmpty) {
                      return "Xác nhận mật khẩu không được bỏ trống";
                    } else if (value != txtPassword.text) {
                      return "Mật khẩu không trùng khớp";
                    } else {
                      return null;
                    }
                  },
                  obscureText: checkPass ? true : false,
                  decoration: InputDecoration(
                    enabledBorder: OutlineInputBorder(
                      borderSide:
                          const BorderSide(width: 1, color: Color(0XFFB1BCD0)),
                      borderRadius: BorderRadius.circular(10),
                    ),
                    focusedBorder: OutlineInputBorder(
                      borderSide: const BorderSide(width: 1, color: blueColor),
                      borderRadius: BorderRadius.circular(10),
                    ),
                    suffixIcon: IconButton(
                      onPressed: () {
                        setState(() {});
                        checkPass2 = !checkPass2;
                      },
                      icon: checkPass2
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
                    ),
                    hintText: "Nhập lại mật khẩu mới",
                  ),
                ),
              ),
              Container(
                margin: const EdgeInsets.only(top: 10, left: 15, right: 15),
                width: 374,
                height: 50,
                decoration: BoxDecoration(
                    borderRadius: BorderRadius.circular(10), color: blueColor),
                child: TextButton(
                  onPressed: () {
                    _resetPassword();
                  },
                  child: const Text(
                    "Đặt lại mật khẩu",
                    style: TextStyle(
                        color: whiteColor,
                        fontSize: 18,
                        fontFamily: 'Roboto',
                        fontWeight: FontWeight.w700),
                  ),
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
