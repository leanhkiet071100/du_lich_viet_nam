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

class AlertTour extends StatefulWidget {
  const AlertTour({
    Key? key,
  }) : super(key: key);

  @override
  AlertTourState createState() => AlertTourState();
}

class AlertTourState extends State<AlertTour> {
  String _selectedTour = "";
  DateTime _selectedDate = DateTime.now();
  int _adultCount = 1;
  int _childCount = 0;

  final _nameController = TextEditingController();
  final _emailController = TextEditingController();
  final _phoneController = TextEditingController();

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
        title: Center(
          child: Text(
            "Booking tour du lịch",
            style: TextStyle(color: Colors.black, fontWeight: FontWeight.bold),
          ),
        ),
      ),
      body: SingleChildScrollView(
        child: Padding(
          padding: const EdgeInsets.all(16.0),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: [
              SizedBox(height: 16),
              Text(
                'Ngày Khởi Hành:',
                style: TextStyle(
                    fontSize: 18,
                    fontWeight: FontWeight.bold,
                    color: Colors.black),
              ),
              SizedBox(height: 8),
              ElevatedButton(
                  onPressed: () async {
                    final selectedDate = await showDatePicker(
                      context: context,
                      initialDate: DateTime.now(),
                      firstDate: DateTime.now(),
                      lastDate: DateTime(DateTime.now().year + 1),
                    );
                    if (selectedDate != null) {
                      setState(() {
                        _selectedDate = selectedDate;
                      });
                    }
                  },
                  child: Text(_selectedDate == null
                      ? 'Chọn ngày khởi hành'
                      : '${_selectedDate.day}/${_selectedDate.month}/${_selectedDate.year}'),
                  style: ButtonStyle(
                    backgroundColor:
                        MaterialStateProperty.all<Color>(blueColor),
                    foregroundColor:
                        MaterialStateProperty.all<Color>(Colors.white),
                  )),
              SizedBox(height: 16),
              Text(
                'Số Người Lớn:',
                style: TextStyle(
                    fontSize: 16,
                    fontWeight: FontWeight.w400,
                    color: Colors.black),
              ),
              SizedBox(height: 8),
              Row(
                children: [
                  IconButton(
                    icon: Icon(Icons.remove),
                    onPressed: () {
                      setState(() {
                        if (_adultCount > 1) {
                          _adultCount--;
                        }
                      });
                    },
                  ),
                  Text('$_adultCount'),
                  IconButton(
                    icon: Icon(Icons.add),
                    onPressed: () {
                      setState(() {
                        _adultCount++;
                      });
                    },
                  ),
                ],
              ),
              SizedBox(height: 16),
              Text(
                'Số Trẻ Em:',
                style: TextStyle(
                    fontSize: 16,
                    fontWeight: FontWeight.w400,
                    color: Colors.black),
              ),
              SizedBox(height: 8),
              Row(
                children: [
                  IconButton(
                    icon: Icon(Icons.remove),
                    onPressed: () {
                      setState(() {
                        if (_childCount > 0) {
                          _childCount--;
                        }
                      });
                    },
                  ),
                  Text('$_childCount'),
                  IconButton(
                    icon: Icon(Icons.add),
                    onPressed: () {
                      setState(() {
                        _childCount++;
                      });
                    },
                  ),
                ],
              ),
              SizedBox(height: 32),
              Text(
                'Giá Tour:',
                style: TextStyle(
                    fontSize: 18,
                    fontWeight: FontWeight.bold,
                    color: Colors.black),
              ),
              SizedBox(height: 8),
              Text(
                'Người Lớn: ${_adultCount * 2786000} VNĐ',
                style: TextStyle(
                    fontSize: 16,
                    fontWeight: FontWeight.w500,
                    color: Colors.black),
              ),
              SizedBox(height: 8),
              Text(
                'Trẻ Em: ${_childCount * 1393000} VNĐ',
                style: TextStyle(
                    fontSize: 16,
                    fontWeight: FontWeight.w500,
                    color: Colors.black),
              ),
              SizedBox(height: 32),
              Text(
                'Thông Tin Liên Hệ:',
                textAlign: TextAlign.center,
                style: TextStyle(
                    fontSize: 18,
                    fontWeight: FontWeight.bold,
                    color: Colors.black),
              ),
              SizedBox(height: 10),
              Container(
                height: 400,
                child: Card(
                  margin: EdgeInsets.all(0),
                  color: greencolor,
                  child: Column(
                    mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Container(
                        padding: EdgeInsets.only(left: 10),
                        child: Text(
                          'Họ và Tên:',
                          style: TextStyle(
                              fontSize: 16,
                              fontWeight: FontWeight.w500,
                              color: Colors.black),
                        ),
                      ),
                      Container(
                        padding: EdgeInsets.only(left: 10, right: 10),
                        child: TextFormField(
                          controller: _nameController,
                          keyboardType: TextInputType.text,
                          decoration: InputDecoration(
                            hintText: 'Nhập họ và tên của bạn',
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
                      SizedBox(height: 16),
                      Container(
                        padding: EdgeInsets.only(left: 10),
                        child: Text(
                          'Email:',
                          style: TextStyle(
                              fontSize: 16,
                              fontWeight: FontWeight.w500,
                              color: Colors.black),
                        ),
                      ),
                      Container(
                        padding: EdgeInsets.only(left: 10, right: 10),
                        child: TextFormField(
                          controller: _emailController,
                          keyboardType: TextInputType.emailAddress,
                          decoration: InputDecoration(
                            hintText: 'Nhập địa chỉ email của bạn',
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
                      SizedBox(height: 16),
                      Container(
                        padding: EdgeInsets.only(left: 10),
                        child: Text(
                          'Số điện thoại:',
                          style: TextStyle(
                              fontSize: 16,
                              fontWeight: FontWeight.w500,
                              color: Colors.black),
                        ),
                      ),
                      Container(
                        padding: EdgeInsets.only(left: 10, right: 10),
                        child: TextFormField(
                          controller: _phoneController,
                          keyboardType: TextInputType.phone,
                          decoration: InputDecoration(
                            hintText: 'Nhập số điện thoại của bạn',
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
                    ],
                  ),
                ),
              ),
              SizedBox(
                height: 10,
              ),
              Row(
                mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                children: [
                  Container(
                    child: ElevatedButton(
                        onPressed: () {},
                        child: const Text(
                          'Book Now',
                          style: TextStyle(
                              height: 1.5,
                              fontSize: 16,
                              fontWeight: FontWeight.w700),
                        ),
                        style: ButtonStyle(
                          backgroundColor:
                              MaterialStateProperty.all<Color>(blueColor),
                          foregroundColor:
                              MaterialStateProperty.all<Color>(Colors.white),
                        )),
                  ),
                  Container(
                    child: ElevatedButton(
                      onPressed: () {
                        setState(() {
                          //_selectedDate = null;
                          _adultCount = 1;
                          _childCount = 0;
                          _nameController.clear();
                          _emailController.clear();
                          _phoneController.clear();
                        });
                      },
                      child: const Text(
                        'Xóa thông tin',
                        style: TextStyle(
                            height: 1.5,
                            fontSize: 16,
                            fontWeight: FontWeight.w700),
                      ),
                      style: ButtonStyle(
                        backgroundColor:
                            MaterialStateProperty.all<Color>(blueColor),
                        foregroundColor:
                            MaterialStateProperty.all<Color>(Colors.white),
                      ),
                    ),
                  )
                ],
              )
            ],
          ),
        ),
      ),
    );
  }
}
