import 'package:dulich/Global/color.dart';
import 'package:dulich/Views/booking/booking.dart';
import 'package:dulich/Views/booking/booking_detail.dart';
import 'package:dulich/Views/home/home_page.dart';
import 'package:dulich/Views/maps/maps.dart';

import 'package:dulich/Views/user/user_page.dart';
import 'package:flutter/material.dart';
import 'package:google_nav_bar/google_nav_bar.dart';

class Dashboard extends StatefulWidget {
  const Dashboard({Key? key}) : super(key: key);

  @override
  _DashboardState createState() => _DashboardState();
}

class _DashboardState extends State<Dashboard> {
  int _selectedIndex = 0;
  static const TextStyle optionStyle =
      TextStyle(fontSize: 30, fontWeight: FontWeight.w600);
  static const List<Widget> _widgetOptions = <Widget>[
    HomePage(),
    TourListScreen(),
    // Text(
    //   'Maps',
    //   style: optionStyle,
    // ),
    Map(),
    UserPage()
  ];

  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return Scaffold(
      body: Center(
        child: _widgetOptions.elementAt(_selectedIndex),
      ),
      bottomNavigationBar: Container(
        decoration: BoxDecoration(
          color: Colors.white,
          boxShadow: [
            BoxShadow(
              blurRadius: 20,
              color: Colors.black.withOpacity(0.1),
            )
          ],
        ),
        child: GNav(
          rippleColor: Colors.black, // tab button ripple color when pressed
          hoverColor: Colors.black, // tab button hover color
          haptic: true, // haptic feedback
          tabBorderRadius: 25,
          tabActiveBorder:
              Border.all(color: Colors.black, width: 1), // tab button border

          curve: Curves.easeOutExpo, // tab animation curves
          duration: Duration(milliseconds: 900),
          gap: 8,
          color: blackColor,
          activeColor: blackColor,
          iconSize: 25, // tab button icon size
          tabBackgroundColor: blueColor, // selected tab background color
          padding: EdgeInsets.symmetric(
              horizontal: size.width * 0.06,
              vertical: size.height * 0.015), // naviga
          tabs: const [
            GButton(
              icon: Icons.home,
              text: 'Home',
            ),
            GButton(
              icon: Icons.card_travel,
              text: 'Booking',
            ),
            GButton(
              icon: Icons.map,
              text: 'Maps',
            ),
            GButton(
              icon: Icons.person,
              text: 'Profile',
            ),
          ],
          selectedIndex: _selectedIndex,
          onTabChange: (index) {
            setState(() {
              _selectedIndex = index;
            });
          },
        ),
      ),
    );
  }
}
