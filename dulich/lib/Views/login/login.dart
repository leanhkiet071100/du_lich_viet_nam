import 'package:dulich/Global/color.dart';
import 'package:dulich/Global/contants.dart';
import 'package:dulich/Global/url.dart';

import 'package:dulich/Models/user_object.dart';
import 'package:dulich/Providers/user_provider.dart';
import 'package:dulich/Views/dashboard/dashboard.dart';
import 'package:dulich/Views/forgot/check_email.dart';
import 'package:flutter/material.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';

import '../register/register_page.dart';
import 'package:shared_preferences/shared_preferences.dart';

class Login extends StatefulWidget {
  const Login({Key? key}) : super(key: key);

  @override
  _LoginState createState() => _LoginState();
}

class _LoginState extends State<Login> {
  TextEditingController txtEmail = TextEditingController();
  TextEditingController txtPassword = TextEditingController();
  final formKey = GlobalKey<FormState>();
  bool _obscureText = true;
  bool checkPass = true;
  bool check = true;
  bool loading = false;

  void showToast() {
    setState(() {
      _obscureText = !_obscureText;
    });
  }

  void _loginUser() async {
    ApiResponse response = await login(txtEmail.text, txtPassword.text);
    if (response.error == null) {
      _saveAndRedirectToHome(response.data as UserObject);
    } else {
      setState(() {
        loading = false;
      });
      ScaffoldMessenger.of(context)
          .showSnackBar(SnackBar(content: Text('${response.error}')));
    }
  }

  void _saveAndRedirectToHome(UserObject user) async {
    SharedPreferences pref = await SharedPreferences.getInstance();
    await pref.setString('token', user.token ?? ' ');
    await pref.setInt('userId', user.id ?? 0);
    Navigator.of(context).pushAndRemoveUntil(
        MaterialPageRoute(builder: (context) => Dashboard()), (route) => false);
  }

  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return Scaffold(
      body: Form(
        key: formKey,
        child: SingleChildScrollView(
            child:
                Column(crossAxisAlignment: CrossAxisAlignment.start, children: [
          Container(
            margin: const EdgeInsets.only(top: 0),
            decoration: const BoxDecoration(
              borderRadius: BorderRadius.only(bottomLeft: Radius.circular(40)),
            ),
            child: Center(
                child: Image.asset(
              'images/logo.png',
              color: blueColor,
              width: double.infinity,
              height: size.height * 0.5,
            )),
          ),
          //  ----------EMAIL-----------
          Container(
            padding: const EdgeInsets.only(left: 15, bottom: 10, right: 15),
            child: TextFormField(
                controller: txtEmail,
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
                }),
          ),
          const SizedBox(
            height: 10,
          ),
          // ---------------MẬT KHẨU-----------
          Container(
            padding: const EdgeInsets.only(left: 15, bottom: 10, right: 15),
            child: TextFormField(
              controller: txtPassword,
              keyboardType: TextInputType.visiblePassword,
              obscureText: _obscureText,
              validator: (value) {
                if (value == null || value.isEmpty) {
                  return 'Mật khẩu không được bỏ trống';
                } else if (value.length < 6) {
                  return 'Mật khẩu cần dài ít nhất 6 ký tự';
                } else if (!value.contains(RegExp(r'[a-z]'))) {
                  return 'Mật khẩu phải chứa ít nhất một chữ cái viết thường';
                } else if (!value.contains(RegExp(r'[A-Z]'))) {
                  return 'Mật khẩu phải chứa ít nhất một chữ cái viết hoa';
                } else if (!value.contains(RegExp(r'[0-9]'))) {
                  return 'Mật khẩu phải chứa ít nhất một chữ số';
                } else if (!value.contains(RegExp(r'[!@#$%^&*(),.?":{}|<>]'))) {
                  return 'Mật khẩu phải chứa ít nhất một ký tự đặc biệt';
                } else {
                  return null;
                }
              },
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
          loading
              ? Center(
                  child: CircularProgressIndicator(),
                )
              : kTextButton("Đăng nhập", () {
                  if (formKey.currentState!.validate()) {
                    setState(() {
                      loading = true;
                      _loginUser();
                    });
                  }
                  // Navigator.push(
                  //   context,
                  //   MaterialPageRoute(
                  //     builder: (context) => const Dashboard(),
                  //   ),
                  // );
                }),
          Container(
            margin: const EdgeInsets.only(top: 10),
            height: size.height * 0.25,
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
      ),
    );
  }
}
