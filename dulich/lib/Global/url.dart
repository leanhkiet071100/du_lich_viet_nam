const String baseUrl = "http://192.168.100.142:8000/api/";
const String loginUrl = baseUrl + "login";
const String regisUrl = baseUrl + "register";
const String logoutUrl = baseUrl + "/logout";
const Map<String, String> headers = {"Content-Type": "application/json"};

class ApiResponse {
  Object? data;
  String? error;
}
