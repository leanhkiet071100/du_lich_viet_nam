import 'package:dulich/Global/color.dart';
import 'package:dulich/Views/booking/booking_detail.dart';
import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';

class Alert extends StatelessWidget {
  final String title;
  final VoidCallback onAction;
  Alert({Key? key, required this.title, required this.onAction})
      : super(key: key);

  @override
  Widget build(BuildContext context) {
    return AlertDialog(
      title: Text(
        title,
        textAlign: TextAlign.center,
        style: const TextStyle(
          fontSize: 16,
          fontWeight: FontWeight.w600,
        ),
      ),
      actions: <Widget>[
        ElevatedButton(
          style: ElevatedButton.styleFrom(
            primary: blueColor,
          ),
          child: const Text(
            'Hủy',
            style: TextStyle(
              fontSize: 16,
              fontWeight: FontWeight.w600,
            ),
          ),
          onPressed: () {
            Navigator.of(context).pop();
          },
        ),
        ElevatedButton(
          style: ElevatedButton.styleFrom(
            primary: blueColor,
          ),
          onPressed: onAction,
          child: const Text(
            'OK',
            style: TextStyle(
              fontSize: 16,
              fontWeight: FontWeight.w600,
            ),
          ),
        ),
      ],
    );
  }
}

class Alert1 extends StatelessWidget {
  final String title;
  const Alert1({Key? key, required this.title}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return AlertDialog(
      content: Text(title,
          style: TextStyle(fontWeight: FontWeight.bold, color: Colors.black)),
      title: Row(
        children: [
          Icon(
            Icons.warning_rounded,
            color: blackColor,
          ),
          SizedBox(
            width: 10,
          ),
          Text('Thông báo',
              style: TextStyle(
                fontWeight: FontWeight.bold,
                color: blackColor,
              ))
        ],
      ),
      actions: [
        TextButton(
            onPressed: () {
              Navigator.pop(context);
            },
            child: Text(
              'OK',
              style: TextStyle(
                  fontSize: 20,
                  fontWeight: FontWeight.bold,
                  color: Colors.black),
            ))
      ],
    );
  }
}
