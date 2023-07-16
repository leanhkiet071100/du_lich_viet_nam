<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DiaDiemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dia_diems')->insert([
            [
                'ten_dia_diem' => 'Điểm du lịch Phú Quốc',
                'vi_do' => null,
                'sao' => null,
                'mua_du_lich' =>'Đông',
                'mo_ta' => 'Đến đây, du khách còn được thưởng thức nhiều món ngon đậm đà hương vị biển như hải sâm, tiết canh cua, gỏi cá trích,....',
                'noi_dung' => 'Không phải ngẫu nhiên mà hòn ngọc Phú Quốc được mệnh danh là thiên đường du lịch. Du lịch Phú Quốc nổi tiếng với những bãi biển đẹp, hoang sơ như Bãi Sao, Bãi Dài, Gành Dầu,... cùng nhiều điểm vui chơi hấp dẫn như VinWonders Phú Quốc, Vinpearl Safari, cùng các địa điểm du lịch Phú Quốc nổi tiếng như vườn tiêu, chợ đêm, Dinh Cậu, suối Tranh,... Đến đây, du khách còn được thưởng thức nhiều món ngon đậm đà hương vị biển như hải sâm, tiết canh cua, gỏi cá trích,....',
                'hinh_anh_dia_diem' => 'hinh_test/dia_danh_1.jpeg',
                'tinh'=>'Kiên Giang',
                'huyen'=>null,
                'xa'=>null,
                'chi_tiet_dia_chi'=>null,
                'noi_bat'=>0,
                'trang_thai'=>1,
            ],
            [
                'ten_dia_diem' => 'Mù Cang Chải - Yên Bái',
                'vi_do' => null,
                'sao' => null,
                'mua_du_lich' =>'Đông',
                'mo_ta' => 'Cách Hà Nội những 300km nhưng các tín đồ du lịch vẫn không thôi mê đắm Mù Cang Chải, Yên Bái',
                'noi_dung' => 'Cách Hà Nội những 300km nhưng các tín đồ du lịch vẫn không thôi mê đắm Mù Cang Chải, Yên Bái. Đây là một trong những cái tên nổi bật nhất khi người ta muốn ghé thăm, tận hưởng vẻ đẹp của núi rừng Tây Bắc. Không chỉ các du khách trong nước, các “thị trấn vàng” ở đây còn thu hút rất nhiều tín đồ vi vu bốn phương.
Đến Mù Cang Chải, bạn nên canh chuẩn mùa lúa chín từ tháng 9 đến 10. Các địa điểm ngắm “mùa vàng” tuyệt nhất là đồi Móng Ngựa (bản Sáng Nhù), xã Tú Lệ, La Pán Tẩn,... Với góc nhìn từ trên cao xuống, thung lũng phía dưới mở ra tráng lệ với từng mảng ruộng rực rỡ, kéo dài chạm đỉnh trời, xen lẫn các mái nhà nâu đơn sơ và những con suối mơ màng.',
                'hinh_anh_dia_diem' => 'hinh_test/dia_danh_2.jpg',
                'tinh'=>'Yên Bái',
                'huyen'=>'Thị trấn Mù Căng Chải',
                'xa'=>null,
                'chi_tiet_dia_chi'=>null,
                'noi_bat'=>0,
                'trang_thai'=>1,
            ],
            [
                'ten_dia_diem' => 'Du lịch Hạ Long – Địa điểm du lịch Việt Nam nổi tiếng với vịnh biển',
                'vi_do' => null,
                'sao' => null,
                'mua_du_lich' =>'Đông',
                'mo_ta' => 'Hạ Long là một thành phố thuộc tỉnh Quảng Ninh. Hạ Long có vịnh biển, có các di sản thế giới, các hoạt động du lịch phong phú, đồ ăn ngon…',
                'noi_dung' => 'Hạ Long là một thành phố thuộc tỉnh Quảng Ninh. Hạ Long có vịnh biển, có các di sản thế giới, các hoạt động du lịch phong phú, đồ ăn ngon…
Mỗi mùa ở đây lại có một vẻ đẹp riêng, mùa hè bạn tới Hạ Long bơi lội, tắm nắng thì mùa xuân, thu mát mẻ thích hợp để ngắm một Hạ Long bớt ồn ào hơn và tham gia các hoạt động ngoài trời cũng như khám phá các khu vui chơi giải trí. Mùa cao điểm là từ tháng 6 đến tháng 8, thành phố đông đúc, đặc biệt vào dịp cuối tuần.',
                'hinh_anh_dia_diem' => 'hinh_test/dia_danh_3.jpg',
                'tinh'=>'Quảng Ninh',
                'huyen'=>null,
                'xa'=>null,
                'chi_tiet_dia_chi'=>null,
                'noi_bat'=>0,
                'trang_thai'=>1,
            ],
            [
                'ten_dia_diem' => 'Thảo Cầm viên',
                'vi_do' => null,
                'sao' => null,
                'mua_du_lich' =>'Đông',
                'mo_ta' => 'Thảo Cầm Viên Sài Gòn (cũng còn được gọi là Sở Thú) là công viên bảo tồn động vật - thực vật ở Thành phố Hồ Chí Minh, Việt Nam.',
                'noi_dung' => 'Thảo Cầm Viên Sài Gòn (cũng còn được gọi là Sở Thú) là công viên bảo tồn động vật - thực vật ở Thành phố Hồ Chí Minh, Việt Nam. Đây là vườn thú lâu đời đứng hàng thứ tám trên thế giới.[3] Khuôn viên rộng lớn này hiện tọa lạc gần hạ lưu kênh Nhiêu Lộc – Thị Nghè với hai cổng nằm ở số 2 đường Nguyễn Bỉnh Khiêm và số 1 đường Nguyễn Thị Minh Khai, phường Bến Nghé, Quận 1, TP. Hồ Chí Minh.
Cho đến nay, Thảo Cầm Viên Sài Gòn đang nuôi dưỡng hơn 1.300 động vật thuộc 125 loài, trong đó có nhiều loại thuộc loại quý hiếm như: trĩ sao, chà vá, vượn má vàng, hươu vàng, báo lửa, báo gấm... Tại đây cũng có hơn 2.500 cây xanh với hơn 900 loài thực vật được bảo tồn.[4]',
                'hinh_anh_dia_diem' => 'hinh_test/dia_danh_4.jpg',
                'tinh'=>'Thành phố Hồ Chí Minh',
                'huyen'=>'Quận 1',
                'xa'=>'	Phường Bến Nghé',
                'chi_tiet_dia_chi'=>null,
                'noi_bat'=>0,
                'trang_thai'=>1,
            ],
            [
                'ten_dia_diem' => 'Pù Luông - Thanh Hóa',
                'vi_do' => null,
                'sao' => null,
                'mua_du_lich' =>'Đông',
                'mo_ta' => 'Rời Tây Bắc xuôi xuống phía Nam, bạn nhất định phải ghé thăm Pù Luông, Thanh Hoá nhé. ',
                'noi_dung' => 'Rời Tây Bắc xuôi xuống phía Nam, bạn nhất định phải ghé thăm Pù Luông, Thanh Hoá nhé. Nếu nghĩ địa điểm check-in ở Việt Nam chỉ có ruộng bậc thang tương tự như Tây Bắc thì bạn đã lầm! Pù Luông xinh đẹp và có nhiều cảnh quan đa dạng hơn rất nhiều. Bạn đừng quên đặt vé máy bay đi Thanh Hóa sớm để dễ dàng săn ưu đãi nhé!
Đầu tiên, chúng ta có thể đến thăm địa điểm này vào những tháng giữa hè - khi lúa xanh chỉ vừa lên mạ. Không khí mát mẻ cùng từng mảng ruộng xanh trên triền đồi sẽ khiến bạn cảm thấy Pù Luông hoàn toàn khác biệt với các nơi khác.',
                'hinh_anh_dia_diem' => 'hinh_test/dia_danh_2.jpg',
                'tinh'=>'Thanh Hóa',
                'huyen'=>'Bá Thước',
                'xa'=>'Xã Cổ Lũng',
                'chi_tiet_dia_chi'=>null,
                'noi_bat'=>0,
                'trang_thai'=>1,
            ],
            [
                'ten_dia_diem' => 'Tràng An - Ninh Bình',
                'vi_do' => null,
                'sao' => null,
                'mua_du_lich' =>'Đông',
                'mo_ta' => 'Trong số các địa điểm du lịch Việt Nam ẩn chứa nhiều giá trị văn hoá - lịch sử nhất, chắc chắn Tràng An - Ninh Bình là cái tên hàng đầu.',
                'noi_dung' => 'Trong số các địa điểm du lịch Việt Nam ẩn chứa nhiều giá trị văn hoá - lịch sử nhất, chắc chắn Tràng An - Ninh Bình là cái tên hàng đầu. Khu di tích này đã được UNESCO công nhận là Di sản văn hoá và thiên nhiên thế giới vào 2014.

Khu thắng cảnh này tập hợp các kiến trúc gắn liền với cố đô Hoa Lư hào hùng xưa, ẩn sâu trong các dãy núi đá vôi tráng lệ và dòng sông uốn lượn mơ màng. Nếu bạn là tín đồ du lịch văn hoá hoặc tâm linh, một số kiến trúc sau sẽ khiến bạn “động lòng": đền Trần Ninh Bình, đền Tứ Trụ, đền Suối Tiên,...',
                'hinh_anh_dia_diem' => 'hinh_test/dia_danh_3.jpg',
                'tinh'=>'Ninh Bình',
                'huyen'=>'Long Thành',
                'xa'=>'Xã Bình An',
                'chi_tiet_dia_chi'=>'số 16 đường N16',
                'noi_bat'=>1,
                'trang_thai'=>1,
            ],
            [
                'ten_dia_diem' => 'Tràng An - Ninh Bình',
                'vi_do' => null,
                'sao' => null,
                'mua_du_lich' =>'Đông',
                'mo_ta' => 'Trong số các địa điểm du lịch Việt Nam ẩn chứa nhiều giá trị văn hoá - lịch sử nhất, chắc chắn Tràng An - Ninh Bình là cái tên hàng đầu.',
                'noi_dung' => 'Trong số các địa điểm du lịch Việt Nam ẩn chứa nhiều giá trị văn hoá - lịch sử nhất, chắc chắn Tràng An - Ninh Bình là cái tên hàng đầu. Khu di tích này đã được UNESCO công nhận là Di sản văn hoá và thiên nhiên thế giới vào 2014.

Khu thắng cảnh này tập hợp các kiến trúc gắn liền với cố đô Hoa Lư hào hùng xưa, ẩn sâu trong các dãy núi đá vôi tráng lệ và dòng sông uốn lượn mơ màng. Nếu bạn là tín đồ du lịch văn hoá hoặc tâm linh, một số kiến trúc sau sẽ khiến bạn “động lòng": đền Trần Ninh Bình, đền Tứ Trụ, đền Suối Tiên,...',
                'hinh_anh_dia_diem' => 'hinh_test/dia_danh_3.jpg',
                'tinh'=>'Ninh Bình',
                'huyen'=>'Long Thành',
                'xa'=>'Xã Bình An',
                'chi_tiet_dia_chi'=>'số 16 đường N16',
                'noi_bat'=>1,
                'trang_thai'=>1,
            ],
            [
                'ten_dia_diem' => 'Tràng An - Ninh Bình',
                'vi_do' => null,
                'sao' => null,
                'mua_du_lich' =>'Đông',
                'mo_ta' => 'Trong số các địa điểm du lịch Việt Nam ẩn chứa nhiều giá trị văn hoá - lịch sử nhất, chắc chắn Tràng An - Ninh Bình là cái tên hàng đầu.',
                'noi_dung' => 'Trong số các địa điểm du lịch Việt Nam ẩn chứa nhiều giá trị văn hoá - lịch sử nhất, chắc chắn Tràng An - Ninh Bình là cái tên hàng đầu. Khu di tích này đã được UNESCO công nhận là Di sản văn hoá và thiên nhiên thế giới vào 2014.

Khu thắng cảnh này tập hợp các kiến trúc gắn liền với cố đô Hoa Lư hào hùng xưa, ẩn sâu trong các dãy núi đá vôi tráng lệ và dòng sông uốn lượn mơ màng. Nếu bạn là tín đồ du lịch văn hoá hoặc tâm linh, một số kiến trúc sau sẽ khiến bạn “động lòng": đền Trần Ninh Bình, đền Tứ Trụ, đền Suối Tiên,...',
                'hinh_anh_dia_diem' => 'hinh_test/dia_danh_3.jpg',
                'tinh'=>'Ninh Bình',
                'huyen'=>'Long Thành',
                'xa'=>'Xã Bình An',
                'chi_tiet_dia_chi'=>'số 16 đường N16',
                'noi_bat'=>1,
                'trang_thai'=>1,
            ],
            [
                'ten_dia_diem' => 'Tràng An - Ninh Bình',
                'vi_do' => null,
                'sao' => null,
                'mua_du_lich' =>'Đông',
                'mo_ta' => 'Trong số các địa điểm du lịch Việt Nam ẩn chứa nhiều giá trị văn hoá - lịch sử nhất, chắc chắn Tràng An - Ninh Bình là cái tên hàng đầu.',
                'noi_dung' => 'Trong số các địa điểm du lịch Việt Nam ẩn chứa nhiều giá trị văn hoá - lịch sử nhất, chắc chắn Tràng An - Ninh Bình là cái tên hàng đầu. Khu di tích này đã được UNESCO công nhận là Di sản văn hoá và thiên nhiên thế giới vào 2014.

Khu thắng cảnh này tập hợp các kiến trúc gắn liền với cố đô Hoa Lư hào hùng xưa, ẩn sâu trong các dãy núi đá vôi tráng lệ và dòng sông uốn lượn mơ màng. Nếu bạn là tín đồ du lịch văn hoá hoặc tâm linh, một số kiến trúc sau sẽ khiến bạn “động lòng": đền Trần Ninh Bình, đền Tứ Trụ, đền Suối Tiên,...',
                'hinh_anh_dia_diem' => 'hinh_test/dia_danh_3.jpg',
                'tinh'=>'Ninh Bình',
                'huyen'=>'Long Thành',
                'xa'=>'Xã Bình An',
                'chi_tiet_dia_chi'=>'số 16 đường N16',
                'noi_bat'=>1,
                'trang_thai'=>1,
            ],
        ]);
    }
}
