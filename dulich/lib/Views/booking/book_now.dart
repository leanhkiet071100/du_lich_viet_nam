import 'package:dulich/Global/color.dart';
import 'package:dulich/Models/goi_dulich.dart';
import 'package:dulich/Providers/tour_provider.dart';
import 'package:flutter/material.dart';
import 'package:intl/intl.dart';
import '../../Global/alert.dart';

class AlertTour extends StatefulWidget {
  GoiDuLich tour;
  AlertTour({Key? key, required this.tour}) : super(key: key);

  @override
  AlertTourState createState() => AlertTourState(tour);
}

class AlertTourState extends State<AlertTour> {
  GoiDuLich tour;
  AlertTourState(this.tour);
  String _selectedTour = "";
  DateTime _selectedDate = DateTime.now();
  int _adultCount = 1;
  int _childCount = 0;
  bool loading = false;
  var format = NumberFormat.currency(locale: 'vi_VN', symbol: '₫');

  final _nameController = TextEditingController();
  final _emailController = TextEditingController();
  final _phoneController = TextEditingController();
  final adultController = TextEditingController();
  final childController = TextEditingController();
  final _goiController = TextEditingController();
  TourProvider _tour = TourProvider();

  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return Scaffold(
      appBar: AppBar(
        toolbarHeight: size.height * 0.08,
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
            'Đặt tour du lịch',
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
                          adultController.text = _adultCount.toString();
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
                        adultController.text = _adultCount.toString();
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
                          childController.text = _childCount.toString();
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
                        childController.text = _childCount.toString();
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
                'Người Lớn: ${format.format(_adultCount * tour.gia_nguoi_lon)}',
                style: TextStyle(
                    fontSize: 16,
                    fontWeight: FontWeight.w500,
                    color: Colors.black),
              ),
              SizedBox(height: 8),
              Text(
                'Trẻ Em: ${format.format(_childCount * tour.gia_tre_em)}',
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
                  loading
                      ? Center(child: CircularProgressIndicator())
                      : Container(
                          child: ElevatedButton(
                              onPressed: () {
                                if (_nameController.text == "" ||
                                    _emailController.text == "" ||
                                    _phoneController.text == "") {
                                  showDialog(
                                      context: context,
                                      builder: (BuildContext context) {
                                        return Alert1(
                                          title:
                                              'Yêu cầu nhập đầy đủ thông tin',
                                        );
                                      });
                                } else {
                                  _tour.dattour(
                                      _nameController.text,
                                      context,
                                      _emailController.text,
                                      _phoneController.text,
                                      _adultCount.toString(),
                                      _childCount.toString(),
                                      tour.id.toString());
                                }
                              },
                              child: const Text(
                                'Đặt tour',
                                style: TextStyle(
                                    height: 1.5,
                                    fontSize: 16,
                                    fontWeight: FontWeight.w700),
                              ),
                              style: ButtonStyle(
                                backgroundColor:
                                    MaterialStateProperty.all<Color>(blueColor),
                                foregroundColor:
                                    MaterialStateProperty.all<Color>(
                                        Colors.white),
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
