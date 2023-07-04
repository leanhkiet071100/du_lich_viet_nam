<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class GoiDuLichSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('goi_du_liches')->insert([
            [
                'loai_id'=> 1,
                'ten'=> 'Đà Nẵng - Bà Nà - Cầu Vàng - Sơn Trà - Biển Mỹ Khê - Hội An - Đà Nẵng (Khách sạn 4* trọn tour) | Kích cầu du lịch',
                'noi_khoi_hanh'=>'Thành phố Hồ Chí Minh',
                'thoi_gian_tap_trung'=>'2023-06-06 10:02:00',
                'so_nguoi_toi_da'=> 20,
                'gio_khoi_hanh'=> '05:39:00',
                'ngay_khoi_hanh'=> '2023-06-06',
                'gia_nguoi_lon'=> '2000000',
                'gia_tre_em'=> '1800000',
                'gia_tre_nho'=> '1500000',
                'so_ngay'=>3,
                'so_dem'=>2,
                'not_compo'=>'Ăn uống ngoài chương trình',
                'compo'=>'2 đêm nghỉ dưỡng vui chơi tại khách sạn 5 sao ',
                'thong_tin_dich_vu'=>'Khách sạn 5 Sao vị trí Bắc Đảo, gần khu vui chơi Vinpearl, thuận lợi cho việc đi lại, vui chơi giải trí. Miễn phí ăn sáng tự chọn hàng ngày dựa trên số lượng khách ở phòng đơn/ phòng đôi tại nhà hàng chính Avenue. Miễn phí xe đưa đón từ khách sạn sang khu vui chơi tại Vin và Grandworld. Miễn phí các hoạt động thể thao bãi biển, chèo SUP, chèo thuyền Kayak, trượt ván nước, xe đạp, Yoga, khu vực vui chơi cho trẻ em. Hai chai nước khoáng mỗi ngày. Miễn phí sử dụng hồ bơi ngoài trời, và câu lạc bộ sức khỏe. Tiện ích pha cà phê và trà trong phòng. Miễn phí truy cập internet (wifi và cáp) trong Khu Resort.',
                'dieu_kien_ap_dung'=>'Combo không hoàn, không hủy, không đổi. Trường hợp hoàn, hủy, đổi Combo mất 100% trên giá Combo',
                'trang_thai'=>1,
            ],
            [
                'loai_id'=> 2,
                'ten'=> 'Đà Nẵng - Huế - Đầm Lập An - La Vang - Động Phong Nha & Thiên Đường - KDL Bà Nà - Cầu Vàng -Sơn Trà - Hội An - Đà Nẵng (Khách sạn 4* trọn tour) - Khám phá Ẩm thực miền Trung - Nhân lễ hội Pháo hoa Quốc tế Đà Nẵng 2023',
                'noi_khoi_hanh'=>'Đà nắng',
                'thoi_gian_tap_trung'=>'2023-06-08 10:00:00',
                'so_nguoi_toi_da'=> 10,
                'gio_khoi_hanh'=> '05:39:00',
                'ngay_khoi_hanh'=> '2023-06-08',
                'gia_nguoi_lon'=> '3000000',
                'gia_tre_em'=> '2700000',
                'gia_tre_nho'=> '2200000',
                'so_ngay'=>2,
                'so_dem'=>0,
                'not_compo'=>'Ăn uống ngoài chương trình',
                'compo'=>'2 đêm nghỉ dưỡng vui chơi tại khách sạn 5 sao ',
                'thong_tin_dich_vu'=>'Khách sạn 5 Sao vị trí Bắc Đảo, gần khu vui chơi Vinpearl, thuận lợi cho việc đi lại, vui chơi giải trí. Miễn phí ăn sáng tự chọn hàng ngày dựa trên số lượng khách ở phòng đơn/ phòng đôi tại nhà hàng chính Avenue. Miễn phí xe đưa đón từ khách sạn sang khu vui chơi tại Vin và Grandworld. Miễn phí các hoạt động thể thao bãi biển, chèo SUP, chèo thuyền Kayak, trượt ván nước, xe đạp, Yoga, khu vực vui chơi cho trẻ em. Hai chai nước khoáng mỗi ngày. Miễn phí sử dụng hồ bơi ngoài trời, và câu lạc bộ sức khỏe. Tiện ích pha cà phê và trà trong phòng. Miễn phí truy cập internet (wifi và cáp) trong Khu Resort.',
                'dieu_kien_ap_dung'=>'Combo không hoàn, không hủy, không đổi. Trường hợp hoàn, hủy, đổi Combo mất 100% trên giá Combo',
                'trang_thai'=>1,
            ],
            [
                'loai_id'=> 3,
                'ten'=> 'Đà Nẵng - Phố cổ Hội An - KDL Bà Nà - Cầu Vàng - Vườn Tượng Apec - Cầu Tình yêu (Khách sạn 4* trọn tour) | Kích cầu du lịch',
                'noi_khoi_hanh'=>'Thành phố Hồ Chí Minh',
                'thoi_gian_tap_trung'=>'2023-06-10 10:02:00',
                'so_nguoi_toi_da'=> 10,
                'gio_khoi_hanh'=> '15:00:00',
                'ngay_khoi_hanh'=> '2023-06-10',
                'gia_nguoi_lon'=> '800000',
                'gia_tre_em'=> '500000',
                'gia_tre_nho'=> 0,
                'so_ngay'=>1,
                'so_dem'=>null,
                'not_compo'=>'Ăn uống ngoài chương trình',
                'compo'=>'2 đêm nghỉ dưỡng vui chơi tại khách sạn 5 sao ',
                'thong_tin_dich_vu'=>'Khách sạn 5 Sao vị trí Bắc Đảo, gần khu vui chơi Vinpearl, thuận lợi cho việc đi lại, vui chơi giải trí. Miễn phí ăn sáng tự chọn hàng ngày dựa trên số lượng khách ở phòng đơn/ phòng đôi tại nhà hàng chính Avenue. Miễn phí xe đưa đón từ khách sạn sang khu vui chơi tại Vin và Grandworld. Miễn phí các hoạt động thể thao bãi biển, chèo SUP, chèo thuyền Kayak, trượt ván nước, xe đạp, Yoga, khu vực vui chơi cho trẻ em. Hai chai nước khoáng mỗi ngày. Miễn phí sử dụng hồ bơi ngoài trời, và câu lạc bộ sức khỏe. Tiện ích pha cà phê và trà trong phòng. Miễn phí truy cập internet (wifi và cáp) trong Khu Resort.',
                'dieu_kien_ap_dung'=>'Combo không hoàn, không hủy, không đổi. Trường hợp hoàn, hủy, đổi Combo mất 100% trên giá Combo',
                'trang_thai'=>1,
            ],
            /*
            [
                'loai_id'=> 1,
                'ten'=> 'Combo 3N2Đ khách sạn Crowne Plaza 5 sao + Phòng tiêu chuẩn + Ăn sáng + Dịch vụ đón tiễn sân bay theo lịch trình khách sạn',
                'noi_khoi_hanh'=>'Đồng Nai',
                'thoi_gian_tap_trung'=>'2023-06-17 10:02:00',
                'so_nguoi_toi_da'=> 20,
                'gio_khoi_hanh'=> '05:39:00',
                'ngay_khoi_hanh'=> '2023-06-17',
                'gia_nguoi_lon'=> '2400000',
                'gia_tre_em'=> '1800000',
                'gia_tre_nho'=> '1500000',
                'so_ngay'=>2,
                'so_dem'=>1,
                'not_compo'=>'Ăn uống ngoài chương trình',
                'compo'=>'2 đêm nghỉ dưỡng vui chơi tại khách sạn 5 sao ',
                'thong_tin_dich_vu'=>'Khách sạn 5 Sao vị trí Bắc Đảo, gần khu vui chơi Vinpearl, thuận lợi cho việc đi lại, vui chơi giải trí. Miễn phí ăn sáng tự chọn hàng ngày dựa trên số lượng khách ở phòng đơn/ phòng đôi tại nhà hàng chính Avenue. Miễn phí xe đưa đón từ khách sạn sang khu vui chơi tại Vin và Grandworld. Miễn phí các hoạt động thể thao bãi biển, chèo SUP, chèo thuyền Kayak, trượt ván nước, xe đạp, Yoga, khu vực vui chơi cho trẻ em. Hai chai nước khoáng mỗi ngày. Miễn phí sử dụng hồ bơi ngoài trời, và câu lạc bộ sức khỏe. Tiện ích pha cà phê và trà trong phòng. Miễn phí truy cập internet (wifi và cáp) trong Khu Resort.',
                'dieu_kien_ap_dung'=>'Combo không hoàn, không hủy, không đổi. Trường hợp hoàn, hủy, đổi Combo mất 100% trên giá Combo',
                'trang_thai'=>1,
            ],
            */
        ]);
    }
}
