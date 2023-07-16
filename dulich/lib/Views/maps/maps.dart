import 'package:dulich/Global/color.dart';
import 'package:flutter/material.dart';
import 'package:google_maps_flutter/google_maps_flutter.dart';

class Map extends StatefulWidget {
  const Map({Key? key}) : super(key: key);

  @override
  _MapState createState() => _MapState();
}

class _MapState extends State<Map> {
  final LatLng _center = const LatLng(10.776817482179952, 106.70312169764179);
  final Set<Marker> _markers = {};

  void _onMapCreated(GoogleMapController controller) {
    setState(() {
      _markers.add(
        Marker(
          markerId: MarkerId('id-1'),
          position: LatLng(10.776817482179952, 106.70312169764179),
          infoWindow: const InfoWindow(
            title: 'TP Hồ chí Minh',
            snippet: 'Population: 639,863,789',
          ),
        ),
      );
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        backgroundColor: whiteColor,
        title: const Text(
          'Google Maps',
          style: TextStyle(color: blackColor),
        ),
      ),
      body: GoogleMap(
        onMapCreated: _onMapCreated,
        initialCameraPosition: CameraPosition(
          target: _center,
          zoom: 11.0,
        ),
        mapType: MapType.normal,
        markers: _markers,
      ),
    );
  }
}

// class Map extends StatefulWidget {
//   const Map({Key? key}) : super(key: key);

//   @override
//   _MapState createState() => _MapState();
// }

// class _MapState extends State<Map> {
//   @override
//   Widget build(BuildContext context) {
//     return Scaffold(
//       appBar: AppBar(
//         title: Text("Google"),
//       ),
//       body: MyWebView(url: "https://www.google.com/maps"),
//     );
//   }
// }

// class MyWebView extends StatefulWidget {
//   final String url;

//   MyWebView({required this.url});

//   @override
//   _MyWebViewState createState() => _MyWebViewState();
// }

// class _MyWebViewState extends State<MyWebView> {
//   late WebView _webView;

//   @override
//   void initState() {
//     super.initState();
//     _webView = WebView(
//       initialUrl: widget.url,
//       javascriptMode: JavascriptMode.unrestricted,
//     );
//   }

//   @override
//   Widget build(BuildContext context) {
//     return Scaffold(
//       body: _webView,
//     );
//   }
// }