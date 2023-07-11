import 'package:dulich/Global/alert.dart';
import 'package:dulich/Global/color.dart';
import 'package:dulich/Global/contants.dart';
import 'package:dulich/Global/url.dart';
import 'package:dulich/Models/user_object.dart';
import 'package:dulich/Providers/register_provider.dart';
import 'package:dulich/Providers/user_provider.dart';
import 'package:dulich/Views/dashboard/dashboard.dart';
import 'package:flutter/material.dart';
import 'package:flutter_easyloading/flutter_easyloading.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';
import 'package:shared_preferences/shared_preferences.dart';

import '../login/login.dart';

class RegisterPage extends StatefulWidget {
  const RegisterPage({Key? key}) : super(key: key);
  @override
  State<StatefulWidget> createState() {
    return RegisterPageState();
  }
}

class RegisterPageState extends State<RegisterPage> {
  bool checkPass = true;
  bool checkPass2 = true;
  bool loading = false;

  TextEditingController txtHoTen = TextEditingController(),
      txtEmail = TextEditingController(),
      txtPassword = TextEditingController(),
      txtPassword2 = TextEditingController(),
      txtSoDienThoai = TextEditingController();

  final formKey = GlobalKey<FormState>();
  RegisterProvider _regis = RegisterProvider();

  // void _registerUser() async {
  //   ApiResponse response = await register(
  //       txtHoTen.text, txtEmail.text, txtPassword.text, txtSoDienThoai.text, txtPassword2.text);
  //   if (response.error == null) {
  //     _saveAndRedirectToHome(response.data as UserObject);
  //   } else {
  //     setState(() {
  //       loading = !loading;
  //     });
  //     ScaffoldMessenger.of(context)
  //         .showSnackBar(SnackBar(content: Text('${response.error}')));
  //   }
  // }

  // void _saveAndRedirectToHome(UserObject user) async {
  //   SharedPreferences pref = await SharedPreferences.getInstance();
  //   await pref.setString('token', user.token ?? '');
  //   await pref.setInt('userId', user.id ?? 0);
  //   Navigator.of(context).pushAndRemoveUntil(
  //       MaterialPageRoute(builder: (context) => Dashboard()), (route) => false);
  // }

  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return Scaffold(
      appBar: AppBar(
        backgroundColor: miniColor,
        elevation: 0,
        title: const Text(
          'Đăng ký',
          style: TextStyle(
              color: blackColor, fontSize: 24, fontWeight: FontWeight.w700),
        ),
        centerTitle: true,
      ),
      body: SingleChildScrollView(
        child: Form(
          key: formKey,
          child: Column(
            children: [
              Container(
                alignment: Alignment.centerLeft,
                padding: const EdgeInsets.only(
                    top: 20, left: 15, right: 15, bottom: 10),
                child: const Text(
                  "Họ tên",
                  style: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 16,
                      color: Color(0XFF242A37)),
                ),
              ),
              Container(
                padding: const EdgeInsets.only(left: 15, bottom: 10, right: 15),
                child: TextFormField(
                  controller: txtHoTen,
                  decoration: InputDecoration(
                    hintText: "Nhập họ tên",
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
                  validator: (value) {
                    final nameRegExp = RegExp(r'^[a-zA-Z ]*$');
                    if (value == null || value.isEmpty) {
                      return 'Họ tên không được bỏ trống';
                    } else if (!nameRegExp.hasMatch(value)) {
                      return 'Họ tên không hợp lệ';
                    } else {
                      return null;
                    }
                  },
                ),
              ),
              Container(
                alignment: Alignment.centerLeft,
                padding: const EdgeInsets.only(left: 15, right: 15, bottom: 10),
                child: const Text(
                  "Email",
                  style: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 16,
                      color: Color(0XFF242A37)),
                ),
              ),
              Container(
                padding: const EdgeInsets.only(left: 15, bottom: 10, right: 15),
                child: TextFormField(
                  controller: txtEmail,
                  decoration: InputDecoration(
                    hintText: "Nhập email",
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
                  validator: (value) {
                    if (value!.isEmpty) {
                      return "Email không được bỏ trống";
                    } else if (!RegExp(
                            r"^[a-zA-Z0-9.a-zA-Z0-9.!#$%&'*+-/=?^_`{|}~]+@[a-zA-Z0-9]+\.[a-zA-Z]+")
                        .hasMatch(value)) {
                      return "Email không hợp lệ";
                    } else {
                      return null;
                    }
                  },
                ),
              ),
              Container(
                alignment: Alignment.centerLeft,
                padding: const EdgeInsets.only(left: 15, right: 15, bottom: 10),
                child: const Text(
                  "Số điện thoại",
                  style: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 16,
                      color: Color(0XFF242A37)),
                ),
              ),
              Container(
                padding: const EdgeInsets.only(left: 15, bottom: 10, right: 15),
                child: TextFormField(
                  controller: txtSoDienThoai,
                  decoration: InputDecoration(
                    hintText: "Nhập số điện thoại",
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
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return 'Số điện thoại không được bỏ trống';
                    } else if (value.length < 10 || value.length > 10) {
                      return 'Số điện thoại phải có ít nhất 10 chữ số';
                    } else {
                      return null;
                    }
                  },
                ),
              ),
              Container(
                alignment: Alignment.centerLeft,
                padding: const EdgeInsets.only(left: 15, right: 15, bottom: 10),
                child: const Text(
                  "Mật khẩu",
                  style: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 16,
                      color: Color(0XFF242A37)),
                ),
              ),
              Container(
                padding: const EdgeInsets.only(left: 15, bottom: 10, right: 15),
                child: TextFormField(
                  controller: txtPassword,
                  obscureText: checkPass ? true : false,
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return 'Mật khẩu không được bỏ trống';
                    } else if (value.length < 8) {
                      return 'Mật khẩu cần dài ít nhất 8 ký tự';
                    } else if (!value.contains(RegExp(r'[a-z]'))) {
                      return 'Mật khẩu phải chứa ít nhất một chữ cái viết thường';
                    } else if (!value.contains(RegExp(r'[A-Z]'))) {
                      return 'Mật khẩu phải chứa ít nhất một chữ cái viết hoa';
                    } else if (!value.contains(RegExp(r'[0-9]'))) {
                      return 'Mật khẩu phải chứa ít nhất một chữ số';
                    } else if (!value
                        .contains(RegExp(r'[!@#$%^&*(),.?":{}|<>]'))) {
                      return 'Mật khẩu phải chứa ít nhất một ký tự đặc biệt';
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
                    hintText: "Nhập mật khẩu",
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
                  obscureText: checkPass2 ? true : false,
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return 'Yêu cầu xác nhận mật khẩu';
                    }
                    if (value != txtPassword.text) {
                      return 'Xác nhận mật khẩu không khớp';
                    }
                    return null;
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
                    hintText: "Nhập lại mật khẩu",
                  ),
                ),
              ),
              loading
                  ? Center(child: CircularProgressIndicator())
                  : kTextButton(
                      'Tạo tài khoản',
                      () {
                        if (txtEmail.text == "" ||
                            txtHoTen.text == "" ||
                            txtPassword.text == "" ||
                            txtPassword2 == "" ||
                            txtSoDienThoai == "") {
                          showDialog(
                              context: context,
                              builder: (BuildContext context) {
                                return Alert1(
                                  title: 'Yêu cầu nhập đầy đủ thông tin',
                                );
                              });
                        } else {
                          _regis.register(
                              txtHoTen.text,
                              context,
                              txtEmail.text,
                              txtSoDienThoai.text,
                              txtPassword.text,
                              txtPassword2.text);

                          txtEmail.clear();
                          txtHoTen.clear();
                          txtSoDienThoai.clear();
                          txtPassword.clear();
                          txtPassword2.clear();
                        }
                      },
                    ),
              Container(
                margin: const EdgeInsets.only(top: 20),
                height: size.height * 0.2,
                child: Row(
                  mainAxisAlignment: MainAxisAlignment.center,
                  children: [
                    const Text(
                      "Bạn đã có tài khoản?",
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
                                builder: (context) => const Login()));
                      },
                      child: const Text(
                        "Đăng nhập ngay",
                        style: TextStyle(
                          fontFamily: 'Roboto',
                          fontSize: 16,
                          fontWeight: FontWeight.w700,
                          color: blueColor,
                        ),
                      ),
                    )
                  ],
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
