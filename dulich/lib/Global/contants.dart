// errors
import 'package:dulich/Global/color.dart';
import 'package:flutter/material.dart';

const serverError = 'Server error';
const unauthorized = 'Unauthorized';
const somethingWentWrong = 'Email hoặc mật khẩu không đúng!';
const somethingWentWrong1 = 'Đăng kí thất bại';

errorSnackBar(BuildContext context, String text) {
  ScaffoldMessenger.of(context).showSnackBar(
    SnackBar(
      backgroundColor: Colors.blue,
      content: Text(text),
      duration: const Duration(seconds: 1),
    ),
  );
}

// --- input decoration
InputDecoration kInputDecoration(String label) {
  return InputDecoration(
      labelText: label,
      contentPadding: const EdgeInsets.all(10),
      border: OutlineInputBorder(
          borderSide: BorderSide(width: 1, color: Colors.black)));
}

// button
kTextButton(String label, Function onPressed) {
  return Container(
    margin: const EdgeInsets.only(top: 10, left: 15, right: 15),
    width: double.infinity,
    // height: size.height * 0.07,
    decoration: BoxDecoration(
        borderRadius: BorderRadius.circular(10), color: blueColor),
    child: TextButton(
      onPressed: () => onPressed(),
      child: Text(
        label,
        style: TextStyle(
            color: whiteColor,
            fontSize: 18,
            fontFamily: 'Roboto',
            fontWeight: FontWeight.w700),
      ),
    ),
  );
}

// loginRegisterHint
Row kLoginRegisterHint(String text, String label, Function onTap) {
  return Row(
    mainAxisAlignment: MainAxisAlignment.center,
    children: [
      Text(text),
      GestureDetector(
          child: Text(label,
              style: TextStyle(
                  color: Colors.black,
                  fontSize: 20,
                  fontWeight: FontWeight.bold)),
          onTap: () => onTap())
    ],
  );
}
