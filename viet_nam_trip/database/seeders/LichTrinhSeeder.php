<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;


class LichTrinhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('lich_trinhs')->insert([
            [
                'goi_du_lich_id' => 1,
                'ten' =>'TP.HỒ CHÍ MINH - ĐÀ NẴNG - HỘI AN Số bữa ăn: 02 (trưa, chiều)',
                'ngay_lich_trinh' => '2023-07-06',
                'noi_dung'=>'Quý khách tập trung tại điểm hẹn, Ga đi trong nước, sân bay Tân Sơn Nhất. Hướng dẫn viên Vietravel hỗ trợ làm thủ tục cho đoàn đáp chuyến bay đi Đà Nẵng. Tại sân bay Đà Nẵng xe và HDV Vietravel đón đoàn đi tham quan:Bán đảo Sơn Trà và Viếng Chùa Linh Ứng: Nơi đây có tượng Phật Quan Thế Âm cao nhất Việt Nam, đứng nơi đây, Quý khách sẽ được chiêm ngưỡng toàn cảnh thành phố, núi rừng và biển đảo Sơn Trà một cách hoàn hảo nhất. Ngũ Hành Sơn: Động Tàng Chơn, Động Hoa Nghiêm, Chùa Non Nước, Làng Đá Mỹ Nghệ,.. Tham quan Làng Đá Non Nước Nguyễn Hùng: nơi chế tác sản phẩm đá mỹ nghệ tạo phong thủy. Phố Cổ Hội An: Chùa Cầu, Nhà Cổ Phùng Hưng, Hội Quán Phước Kiến, Cơ sở Thủ Công Mỹ Nghệ,…Quý khách tự do dạo phố đèn lồng đầy màu sắc, cảm nhận sự yên bình cổ kính và lãng mạn Phố Cổ về đêm,... Buổi tối quý khách tự do dạo phố ngắm nhìn sự lung linh và phát triển của thành phố … Nghỉ đêm tại Đà Nẵng. ',
            ],
            [
                'goi_du_lich_id' => 1,
                'ten' => 'ĐÀ NẴNG – KDL BÀ NÀ - CẦU VÀNG Số bữa ăn: 02 (Ăn sáng,chiều)',
                'ngay_lich_trinh' => '2023-07-07',
                'noi_dung'=>'Dùng bữa sáng tại khách sạn. Xe đưa Quý khách đi tham quan:Khu du lịch Bà Nà - Suối Mơ (Chi phí cáp treo & Ăn trưa tự túc): Tận hưởng không khí se lạnh của Đà Lạt tại miền Trung, đoàn tự do tham quan Chùa Linh Ứng, Hầm Rượu Debay, vườn hoa Le Jardin D’Amour, Khu Tâm linh mới của Bà Nà viếng Đền Lĩnh Chúa Linh Từ, khu vui chơi Fantasy Park, tự do chụp hình tại Cầu Vàng điểm tham quan mới siêu hot tại Bà Nà…Ăn trưa tại Bà Nà tự túc. Sau đó đoàn tiếp tục tham quan vui chơi đến giờ xuống cáp. Bãi biển Mỹ Khê: Một trong những bãi biển quyến rũ nhất hành tinh. Quý khách tự do dạo biển, chụp hình.... Buổi tối Quý khách tự túc đi dạo phố, thưởng thức đặc sản địa phương; thưởng ngoạn cảnh đẹp của Đà Nẵng về đêm, ngắm nhìn Cầu Rồng, Cầu Tình Yêu, Cầu Trần Thị Lý, Trung Tâm Thương Mại, Khu phố ẩm thực, Café - Bar - Disco… Mua sắm đặc sản tại quà Đà Nẵng: Với hơn 2000 sản phẩm đặc sản Đà Nẵng, Miền Trung và các vùng miền lân cận, nổi bật nhất là chả bò, bò khô, mực rim me, mực khô, ghẹ sữa sốt và đầy đủ các loại khô cá,...',
            ],
            [
                'goi_du_lich_id' => 1,
                'ten' => 'ĐÀ NẴNG - TP. HỒ CHÍ MINH Số bữa ăn: 01 (Ăn sáng)',
                'ngay_lich_trinh' => '2023-07-08',
                'noi_dung'=>'Dùng bữa sáng tại khách sạn.Xe tiễn Quý khách ra sân bay Đà Nẵng đón chuyến bay trở về Tp.Hồ Chí Minh. Chia tay Quý khách và kết thúc chương trình du lịch tại sân bay Tân Sơn Nhất.',
            ],
            [
                'goi_du_lich_id' => 2,
                'ten' => 'TP HỒ CHÍ MINH - ĐÀ NẴNG - HUẾ (Ăn trưa, chiều)',
                'ngay_lich_trinh' => '2023-06-08',
                'noi_dung'=>'Quý khách tập trung tại Ga đi Trong Nước, sân bay Tân Sơn Nhất, hướng dẫn viên Vietravel làm thủ tục cho Quý khách đáp chuyến bay đi Đà Nẵng. Xe đón quý khách tại sân bay Đà Nẵng, lên đường đi Huế. Trên đường dừng tham quan:',
            ],
            [
                'goi_du_lich_id' => 2,
                'ten' => 'HUẾ - ĐỘNG THIÊN ĐƯỜNG - ĐỘNG PHONG NHA (Ăn sáng, trưa, chiều)',
                'ngay_lich_trinh' => '2023-06-09',
                'noi_dung'=>'Dùng bữa sáng khách sạn. Quý khách khởi hành sớm đi Quảng Bình, đoàn ghé tham quan: -Động Phong Nha: Nằm trong quần thể Di sản thiên nhiên thế giới Phong Nha - Kẻ Bàng, được xem như chốn thần tiên bởi hệ thống núi đá vôi và sông ngầm dài nhất thế giới.',
            ],

            [
                'goi_du_lich_id' => 3,
                'ten' => 'TP.HỒ CHÍ MINH - ĐÀ NẴNG – VƯỜN TƯỢNG APEC – CẦU TÌNH YÊU - PHỐ CỔ HỘI AN Số bữa ăn: 2 (Ăn trưa, chiều)',
                'ngay_lich_trinh' => '2023-06-10',
                'noi_dung'=>'Quý khách tập trung tại Ga đi trong nước, sân bay Tân Sơn Nhất, hướng dẫn viên Vietravel hỗ trợ làm thủ tục cho đoàn đáp chuyến bay đi Đà Nẵng, tại sân bay Đà Nẵng xe và HDV đón đoàn đi ăn trưa và nhận phòng nghỉ ngơi. Buổi chiều, đoàn khởi hành đi tham quan:- Bán đảo Sơn Trà và Viếng Chùa Linh Ứng: Nơi đây có tượng Phật Quan Thế Âm cao nhất Việt Nam, đứng nơi đây, Quý khách sẽ được chiêm ngưỡng toàn cảnh thành phố, núi rừng và biển đảo Sơn Trà một cách hoàn hảo nhất. - Tham quan Làng Đá Non Nước Quốc Hiệp: nơi chế tác các sản phẩm đá mỹ nghệ tạo phong thủy.',
            ],

        ]);
    }
}
