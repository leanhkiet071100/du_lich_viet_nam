import 'package:dulich/Global/color.dart';
import 'package:dulich/Providers/register_provider.dart';
import 'package:dulich/Views/forgot/confirm_token.dart';
import 'package:flutter/material.dart';
import 'package:flutter_easyloading/flutter_easyloading.dart';

class CheckEmail extends StatefulWidget {
  const CheckEmail({Key? key}) : super(key: key);

  @override
  _CheckEmailState createState() => _CheckEmailState();
}

class _CheckEmailState extends State<CheckEmail> {
  TextEditingController txtEmail = TextEditingController();
  final formKey = GlobalKey<FormState>();

  void _sendEmail() async {
    if (formKey.currentState!.validate()) {
      EasyLoading.show(status: 'Vui lòng đợi...');
      bool isSuccess = await RegisterProvider.sendEmail(txtEmail.text);

      if (isSuccess) {
        EasyLoading.showSuccess('Vui lòng kiểm tra email để lấy mã xác minh');
        EasyLoading.dismiss();
        Navigator.push(
          context,
          MaterialPageRoute(
            builder: (context) => ConfirmToken(
              email: txtEmail.text,
            ),
          ),
        );
      } else {
        EasyLoading.showInfo(
            'Email không tồn tại trên hệ thống. Vui lòng kiểm tra lại');
        EasyLoading.dismiss();
      }
    }
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
          'Quên mật khẩu',
          style: TextStyle(color: blackColor, fontSize: 24),
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
                    top: 20, left: 15, right: 15, bottom: 20),
                child: const Text(
                  "Nhập địa chỉ email mà bạn đã đăng ký tài khoản.",
                  textAlign: TextAlign.center,
                  style: TextStyle(
                      fontWeight: FontWeight.w400,
                      fontSize: 16,
                      color: blackColor),
                ),
              ),
              Container(
                alignment: Alignment.centerLeft,
                padding: const EdgeInsets.only(
                  left: 15,
                  right: 15,
                  bottom: 10,
                ),
                child: const Text(
                  "Email",
                  style: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 16,
                      color: blackColor),
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
                margin: const EdgeInsets.only(left: 15, right: 15),
                width: 374,
                height: 50,
                decoration: BoxDecoration(
                    borderRadius: BorderRadius.circular(10), color: blueColor),
                child: TextButton(
                  onPressed: () {
                    _sendEmail();
                  },
                  child: const Text(
                    "Gửi",
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
