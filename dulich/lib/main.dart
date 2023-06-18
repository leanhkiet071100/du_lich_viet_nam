import 'package:dulich/Views/splash/splash.dart';
import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
  WidgetsFlutterBinding.ensureInitialized();
}

class MyApp extends StatelessWidget {
  const MyApp({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Viet Nam Trip',
      debugShowCheckedModeBanner: false,
      theme: ThemeData(
        primarySwatch: Colors.blue,
        textSelectionTheme: const TextSelectionThemeData(
            // cursorColor: backgroundColor,
            // selectionColor: backgroundColor,
            // selectionHandleColor: backgroundColor,
            ),
      ),
      home: SplashPage(),
    );
  }
}
