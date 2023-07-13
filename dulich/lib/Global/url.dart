const String baseUrl = "http://192.168.100.52:8000/api/";
const String loginUrl = baseUrl + "login";
const String regisUrl = baseUrl + "register";
const String logoutUrl = baseUrl + "logout";
const String passUrl = baseUrl + "post-quen-mat-khau";
const String codeUrl = baseUrl + "quen-mat-khau-xac-nhan";
const String tourUrl = baseUrl + "dat-tour";
const String hotelUrl = baseUrl + "luutru";
const String goiDuLichUrl = baseUrl + "list-tour";
const String phieuDatUrl = baseUrl + "get-thanh-toan";
const String quanAnUrl = baseUrl + "quan-an";
const String monAnUrl = baseUrl + "mon-an";
const Map<String, String> headers = {"Content-Type": "application/json"};

class ApiResponse {
  Object? data;
  String? error;
}
