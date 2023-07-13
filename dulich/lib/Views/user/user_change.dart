import 'dart:convert';
import 'package:dulich/Global/alert.dart';
import 'package:dulich/Global/color.dart';
import 'package:dulich/Global/contants.dart';
import 'package:dulich/Models/user_object.dart';
import 'package:dulich/Providers/register_provider.dart';
import 'package:dulich/Views/dashboard/dashboard.dart';
import 'package:flutter/material.dart';
import 'package:flutter_easyloading/flutter_easyloading.dart';
import 'package:shared_preferences/shared_preferences.dart';

class EditInforPage extends StatefulWidget {
  const EditInforPage({Key? key}) : super(key: key);

  @override
  State<StatefulWidget> createState() => EditInforPageState();
}

class EditInforPageState extends State<EditInforPage> {
  TextEditingController txtEmail = TextEditingController();
  TextEditingController txtHoTen = TextEditingController();
  TextEditingController txtSoDienThoai = TextEditingController();
  final formKey = GlobalKey<FormState>();

  _loadData() async {
    SharedPreferences pres = await SharedPreferences.getInstance();
    setState(() {});
    txtEmail.text = (pres.getString('email') ?? '');
  }

  snackBar(String? message) {
    return ScaffoldMessenger.of(context).showSnackBar(
      SnackBar(
        content: Text(message!),
        duration: const Duration(seconds: 2),
      ),
    );
  }

  void _updateInfor() async {
    if (formKey.currentState!.validate()) {
      snackBar('Vui lòng đợi...');
      bool isSuccess = await RegisterProvider.updateInfor(
          txtHoTen.text, txtSoDienThoai.text);
      if (isSuccess) {
        txtEmail.text = txtEmail.text;
        txtHoTen.text = txtHoTen.text;
        txtSoDienThoai.text = txtSoDienThoai.text;

        UserObject newUser = await RegisterProvider.getUser();

        showDialog(
            context: context,
            builder: (BuildContext context) {
              return Alert1(title: 'Cập nhật thành công');
            });
        Navigator.push(
          context,
          MaterialPageRoute(builder: (context) => Dashboard()),
        );
        EasyLoading.dismiss();
      } else {
        showDialog(
            context: context,
            builder: (BuildContext context) {
              return Alert1(title: 'Cập nhật thất bại');
            });
        EasyLoading.dismiss();
      }
    }
  }

  @override
  void initState() {
    super.initState();
    _loadData();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
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
          'Cập nhật thông tin',
          style: TextStyle(color: blackColor, fontSize: 24),
        ),
        centerTitle: true,
      ),
      body: SingleChildScrollView(
        child: Form(
          key: formKey,
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: [
              Container(
                padding: const EdgeInsets.only(left: 15, bottom: 10),
                child: Text(
                  "Họ tên",
                  style: TextStyle(
                    fontWeight: FontWeight.bold,
                    fontSize: 16,
                    color: Color(0XFF242A37),
                  ),
                ),
              ),
              Container(
                padding: const EdgeInsets.only(left: 15, bottom: 10, right: 15),
                child: TextFormField(
                  controller: txtHoTen,
                  decoration: InputDecoration(
                    enabledBorder: OutlineInputBorder(
                      borderSide:
                          const BorderSide(width: 1, color: Color(0XFFB1BCD0)),
                      borderRadius: BorderRadius.circular(10),
                    ),
                    focusedBorder: OutlineInputBorder(
                      borderSide: const BorderSide(width: 1, color: greencolor),
                      borderRadius: BorderRadius.circular(10),
                    ),
                  ),
                  validator: (value) {
                    if (value!.isEmpty) {
                      return "Họ tên không được bỏ trống";
                    } else {
                      return null;
                    }
                  },
                ),
              ),
              // Container(
              //   padding: const EdgeInsets.only(left: 15, right: 15),
              //   child: Text(
              //     "Email",
              //     style: TextStyle(
              //       fontWeight: FontWeight.bold,
              //       fontSize: 16,
              //       color: Color(0XFF242A37),
              //     ),
              //   ),
              // ),
              // Container(
              //   padding: const EdgeInsets.only(left: 15, bottom: 10, right: 15),
              //   child: TextFormField(
              //     readOnly: true,
              //     controller: txtEmail,
              //     decoration: InputDecoration(
              //       fillColor: const Color(0X1A242A37),
              //       filled: true,
              //       enabledBorder: OutlineInputBorder(
              //         borderSide:
              //             const BorderSide(width: 1, color: Color(0XFFF1F2F6)),
              //         borderRadius: BorderRadius.circular(10),
              //       ),
              //       focusedBorder: OutlineInputBorder(
              //         borderSide: const BorderSide(width: 1, color: greencolor),
              //         borderRadius: BorderRadius.circular(10),
              //       ),
              //     ),
              //   ),
              // ),
              Container(
                padding: const EdgeInsets.only(left: 15, bottom: 10),
                child: Text(
                  "Số điện thoại",
                  style: TextStyle(
                    fontWeight: FontWeight.bold,
                    fontSize: 16,
                    color: Color(0XFF242A37),
                  ),
                ),
              ),
              Container(
                padding: const EdgeInsets.only(left: 15, right: 15),
                child: TextFormField(
                  controller: txtSoDienThoai,
                  decoration: InputDecoration(
                    enabledBorder: OutlineInputBorder(
                      borderSide:
                          const BorderSide(width: 1, color: Color(0XFFB1BCD0)),
                      borderRadius: BorderRadius.circular(10),
                    ),
                    focusedBorder: OutlineInputBorder(
                      borderSide: const BorderSide(width: 1, color: greencolor),
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
              kTextButton(
                'Cập nhật thông tin cá nhân',
                () {
                  _updateInfor();
                },
              ),
              Container(
                margin: const EdgeInsets.only(top: 15, left: 15, right: 15),
                width: 374,
                height: 50,
                decoration: BoxDecoration(
                    borderRadius: BorderRadius.circular(10),
                    color: const Color(0XFFE4E6EB)),
                child: TextButton(
                  onPressed: () {
                    Navigator.pop(context);
                  },
                  child: const Text(
                    "Huỷ",
                    style: TextStyle(
                        color: Color(0XFF242A37),
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
