// import 'package:dulich/Global/color.dart';
// import 'package:dulich/Models/mon_an.dart';
// import 'package:dulich/Providers/monan_provider.dart';
// import 'package:flutter/material.dart';
// import 'package:google_fonts/google_fonts.dart';
// import 'package:intl/intl.dart';

// class FoodList extends StatelessWidget {
//   final List<MonAn> monan;
//   const FoodList({Key? key, required this.monan})
//       : super(
//           key: key,
//         );

//   @override
//   Widget build(BuildContext context) {
//     var format = NumberFormat.currency(locale: 'vi_VN', symbol: '₫');
//     Size size = MediaQuery.of(context).size;
//     return SliverList(
//       delegate: SliverChildBuilderDelegate(
//         (BuildContext context, int index) {
//           return Row(
//             mainAxisAlignment: MainAxisAlignment.center,
//             children: [
//               Container(
//                 alignment: Alignment.center,
//                 height: 200,
//                 width: 180,
//                 padding: EdgeInsets.only(left: 5, right: 5),
//                 child: Stack(children: [
//                   Card(
//                       color: greencolor,
//                       child: Column(
//                         crossAxisAlignment: CrossAxisAlignment.start,
//                         children: [
//                           Container(
//                             padding: const EdgeInsets.only(
//                               bottom: 5,
//                             ),
//                             height: size.height * 0.18,
//                             child: ClipRRect(
//                               borderRadius:
//                                   const BorderRadius.all(Radius.circular(5)),
//                               child: Image.network(
//                                 monan[index].hinh_mon_an,
//                                 fit: BoxFit.cover,
//                               ),
//                             ),
//                           ),
//                           Container(
//                             padding: const EdgeInsets.only(left: 5, bottom: 5),
//                             child: Text(
//                               monan[index].ten_mon,
//                               overflow: TextOverflow.ellipsis,
//                               style: TextStyle(
//                                 fontSize: 18,
//                                 fontWeight: FontWeight.w500,
//                               ),
//                             ),
//                           ),
//                           Row(
//                             children: [
//                               Container(
//                                 padding: const EdgeInsets.only(left: 5),
//                                 child: Text(
//                                   'Giá:',
//                                   style: TextStyle(
//                                       fontSize: 16,
//                                       fontWeight: FontWeight.w500,
//                                       color: Colors.red),
//                                 ),
//                               ),
//                               Container(
//                                 padding: const EdgeInsets.only(left: 5),
//                                 child: Text(
//                                   format.format(monan[index].gia_ban),
//                                   style: TextStyle(
//                                     fontSize: 16,
//                                     fontWeight: FontWeight.w500,
//                                   ),
//                                 ),
//                               ),
//                             ],
//                           )
//                         ],
//                       )),
//                 ]),
//               ),
//               Container(
//                 alignment: Alignment.center,
//                 height: 200,
//                 width: 180,
//                 padding: EdgeInsets.only(left: 5, right: 5),
//                 child: Stack(children: [
//                   Card(
//                       color: greencolor,
//                       child: Column(
//                         crossAxisAlignment: CrossAxisAlignment.start,
//                         children: [
//                           Container(
//                             padding: const EdgeInsets.only(
//                               bottom: 5,
//                             ),
//                             height: size.height * 0.18,
//                             child: ClipRRect(
//                               borderRadius:
//                                   BorderRadius.all(Radius.circular(5)),
//                               child: Image.network(
//                                 monan[index].hinh_mon_an,
//                                 fit: BoxFit.cover,
//                               ),
//                             ),
//                           ),
//                           Container(
//                             padding: const EdgeInsets.only(left: 5),
//                             child: Text(
//                               monan[index].ten_mon,
//                               overflow: TextOverflow.ellipsis,
//                               style: GoogleFonts.quicksand(
//                                   fontSize: 18,
//                                   fontWeight: FontWeight.bold,
//                                   color: Colors.black),
//                             ),
//                           ),
//                           Row(
//                             children: [
//                               Container(
//                                 padding: const EdgeInsets.only(left: 5),
//                                 child: Text(
//                                   'Giá:',
//                                   style: GoogleFonts.quicksand(
//                                       fontSize: 15,
//                                       fontWeight: FontWeight.bold,
//                                       color: Colors.red),
//                                 ),
//                               ),
//                               Container(
//                                 padding: const EdgeInsets.only(left: 5),
//                                 child: Text(
//                                   format.format(monan[index].gia_ban),
//                                   style: GoogleFonts.quicksand(
//                                       fontSize: 15,
//                                       fontWeight: FontWeight.w600,
//                                       color: blackColor),
//                                 ),
//                               ),
//                             ],
//                           )
//                         ],
//                       )),
//                 ]),
//               )
//             ],
//           );
//         },
//         // số lượng nội dung
//         childCount: monan.length,
//       ),
//     );
//   }
// }

// class FoodMenu extends StatefulWidget {
//   const FoodMenu({Key? key}) : super(key: key);

//   @override
//   _FoodMenuState createState() => _FoodMenuState();
// }

// class _FoodMenuState extends State<FoodMenu> {
//   @override
//   Widget build(BuildContext context) {
//     return FutureBuilder<List<MonAn>>(
//         future: MonAnProvider.getQuanAnByID(5),
//         builder: (context, snapshot) {
//           if (snapshot.hasData) {
//             return FoodList(monan: snapshot.data!);
//           } else if (snapshot.hasError) {
//             return Center(
//               child: Text('Có lỗi rồi'),
//             );
//           }
//           return Center(child: CircularProgressIndicator());
//         });
//   }
// }
