@extends('web.layouts.app')

@section('content')
    @parent
    @include('web.includes.banner')
    <div class="booking-tour">
        <section class="checkout-head d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <ul class="head col-12">
                        <li class="checked">1. Nhập thông tin</li>
                        <li class="checked"><i class="fa fa-angle-right"></i></li>
                        <li>2. Thanh toán</li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="checkout-head-mobile d-lg-none">
            <div class="container">
                <div class="row">
                    <ul class="head col-12">
                        <li class="checked">1. Nhập thông tin</li>
                        <li class="checked"><i class="fa fa-angle-right"></i></li>
                        <li>2. Thanh toán</li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="checkout-main order-tour">
            <form action="{{ route('web.tour.post-thanh-toan', ['id' => $goi_du_lich->id, 'phieu_dat_id'=>$phieu_dat->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="redirect" value="redirect">
                <div class="container">
                    <div class="row">
                        <div class="col-12 top">
                            <div class="product">
                                <div class="product-image">
                                    <div class="image">
                                        <img src="{{ URL($goi_du_lich->hinh_goi_du_lich ?? 'hinh_test/no-img.jpg') }}"
                                            class="img-fluid" alt="image">
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="s-rate">
                                        <p class="rate">
                                            <span class="star">
                                                @for ($i = 0; $i < 5; $i++)
                                                    @if ($i < $goi_du_lich->sao)
                                                        <i class="icon-star"></i>
                                                    @else
                                                        <i class="icon-star-o"></i>
                                                    @endif
                                                @endfor
                                            </span>
                                        </p>
                                    </div>
                                    <p class="title" id="title">{{ $goi_du_lich->ten }}</p>
                                    <div class="entry">
                                        <div class="entry-inner">
                                            <input type="hidden" id="goi_du_lich_id" value="{{ $goi_du_lich->id }}">
                                            <span>
                                                <p>Khởi hành:
                                                    <b>{{ date('d/m/Y', strtotime($goi_du_lich->ngay_khoi_hanh)) }} -
                                                        Giờ đi:
                                                        {{ date('h:i', strtotime($goi_du_lich->ngay_khoi_hanh)) }}</b>
                                            </span>
                                            <span>
                                                <p>Thời gian: <b>{{ $goi_du_lich->so_ngay ?? '' }} Ngày
                                                        {{ $goi_du_lich->so_dem ?? '' }} Đêm</b></p>
                                            </span>
                                            <span>
                                                <p>Nơi khởi hành: <b>{{ $goi_du_lich->noi_khoi_hanh }}</b></p>
                                            </span>
                                            <span>
                                                <p>Tập trung:
                                                    <b>{{ date('d/m/Y h:i', strtotime($goi_du_lich->thoi_gian_tap_trung)) }}</b>
                                            </span>
                                            {{-- <span>Dịch vụ tùy chọn <b>Bay cùng Vietravel Airlines - Khách sạn Tahiti 4
                                                Sao</b></span> --}}
                                        </div>
                                        {{-- <a href="#" class="map hardCode">
                                        <i class="fa fa-map"></i>
                                        <label>Bản đồ và lịch trình</label>
                                    </a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-12 left">
                            <div class="payments-warp">
                                <h3>Các hình thức thanh toán</h3>
                                <div class="payments">
                                    <div class="payment-item payment-item-tien-mat active" id="payment-item-tien-mat">
                                        <div class="pm-head">
                                            <div class="pm-head-icon">
                                                <i class="fa fa-money" aria-hidden="true"></i>
                                                <h4>Tiền mặt</h4>
                                            </div>
                                            {{-- <span class="check" id="tienmat"></span> --}}
                                            <input class="form-check-input check" id="tienmat" type="radio" name="payments" value="tienmat" checked>
                                        </div>
                                        <div class="pm-des">
                                            <p>
                                                <title></title>
                                            </p>
                                            <p style="text-align:justify">Quý khách vui lòng thanh toán tại bất kỳ văn phòng
                                                Vietravel trên toàn quốc và các chi nhánh tại nước ngoài. Xem <a
                                                    href="{{ route('web.trang-chu.index') }}">chi tiết</a>.</p>
                                            <p>&nbsp;</p>
                                            <script defer=""
                                                src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816"
                                                integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw=="
                                                data-cf-beacon="{&quot;rayId&quot;:&quot;7e03b680bbc1198b&quot;,&quot;token&quot;:&quot;c819403ca40043b799392ce067ae0095&quot;,&quot;version&quot;:&quot;2023.4.0&quot;,&quot;si&quot;:100}"
                                                crossorigin="anonymous"></script>
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="payment-item payment-item-momo" id="payment-item-vnpay">
                                        <div class="pm-head">
                                            <div class="pm-head-icon">
                                                <i class="fa fa-credit-card" aria-hidden="true"></i>
                                                <h4>Thanh toán bằng VNPAY</h4>
                                            </div>
                                            {{-- <span class="check" id="momo"></span> --}}
                                            <input class="form-check-input check" id="vnpay" type="radio" name="payments" value="vn_pay">
                                        </div>
                                        <div class="pm-des">
                                            <p>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="payments">
                                    <div class="payment-item payment-item-momo" id="payment-item-momo-qr">
                                        <div class="pm-head">
                                            <div class="pm-head-icon">
                                                <i class="fa fa-credit-card" aria-hidden="true"></i>
                                                <h4>Thanh toán bằng Momo QR</h4>
                                            </div>
                                            {{-- <span class="check" id="momo"></span> --}}
                                            <input class="form-check-input check" id="momo-qr" type="radio" name="payments" value="momo_pay">
                                        </div>
                                        <div class="pm-des">
                                            <p>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="payment-item payment-item-momo" id="payment-item-momo-atm">
                                        <div class="pm-head">
                                            <div class="pm-head-icon">
                                                <i class="fa fa-credit-card" aria-hidden="true"></i>
                                                <h4>Thanh toán bằng Momo ATM</h4>
                                            </div>
                                            {{-- <span class="check" id="momo"></span> --}}
                                            <input class="form-check-input check" id="momo-atm" type="radio" name="payments" value="momo_atm">
                                        </div>
                                        <div class="pm-des">
                                            <p>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="terms">
                                <h3>Điều khoản bắt buộc khi đăng ký online</h3>
                                <div class="term-content">
                                    <title></title>
                                    <p><strong>ĐIỀU KIỆN BÁN VÉ CÁC CHƯƠNG TRÌNH DU LỊCH NƯỚC NGOÀI</strong></p>
                                    <p><strong>I.&nbsp;&nbsp;&nbsp; GIÁ VÉ DU LỊCH</strong></p>
                                    <p>Giá vé du lịch được tính theo tiền Đồng (Việt Nam - VNĐ). Trường hợp khách thanh toán
                                        bằng USD sẽ được quy đổi ra VNĐ theo tỉ giá của ngân hàng Đầu Tư và Phát Triển Việt
                                        Nam – Chi nhánh TP.HCM tại thời điểm thanh toán.</p>
                                    <p>Giá vé chỉ bao gồm những khoản được liệt kê một cách rõ ràng trong phần “Bao gồm”
                                        trong các chương trình du lịch. Khách hàng sẽ thanh toán các chi phí không nằm trong
                                        trong phần "Bao gồm"..</p>
                                    <p><strong>II.&nbsp; GIÁ DÀNH CHO TRẺ EM</strong></p>
                                    <p>- Trẻ em dưới 2 tuổi: 30% trên giá vé du lịch.</p>
                                    <p>- Trẻ em từ 2 đến dưới 12 tuổi: Từ 75%-100% (tùy theo chính sách của hãng hàng không
                                        hoặc phòng lưu trú của từng chương trình tour du lịch) trên vé du lịch, xin Quý
                                        khách vui lòng xem kỹ phần điều kiện trong từng chương trình tour. Hai người lớn chỉ
                                        được kèm 01 trẻ em, em thứ hai trở lên sẽ mua thêm xuất giường đơn.</p>
                                    <p>- Trẻ em từ 12 tuổi trở lên, mua một vé như người lớn.</p>
                                    <p>Vé máy bay, xe lửa, phương tiện vận chuyển công cộng: mua theo quy định của các đơn
                                        vị vận chuyển này.</p>
                                    <p>*Lưu ý: Giá vé du lịch chưa bao gồm: Chế độ ngủ giường riêng.</p>
                                    <p><strong>III.&nbsp;&nbsp; THANH TOÁN</strong></p>
                                    <p>Khi đăng ký, Quý khách vui lòng cung cấp đầy đủ thông tin và đóng một khoản tiền cọc
                                        để giữ chỗ. Số tiền cọc khác nhau tùy theo chương trình mà Quý khách chọn</p>
                                    <p>Thanh toán bằng tiền mặt hoặc chuyển khoản tới tài khoản ngân hàng của Vietravel.</p>
                                    <div style="background:#eeeeee; border:1px solid #cccccc; padding:5px 10px">Tên Tài
                                        Khoản : Công ty CP Du lịch và Tiếp thị GTVT Việt Nam – Vietravel</div>
                                    <div style="background:#eeeeee; border:1px solid #cccccc; padding:5px 10px">Tên tài
                                        khoản viết tắt : VIETRAVEL</div>
                                    <div style="background:#eeeeee; border:1px solid #cccccc; padding:5px 10px">Số Tài khoản
                                        : <strong>111 6977 27979</strong></div>
                                    <div style="background:#eeeeee; border:1px solid #cccccc; padding:5px 10px">Ngân hàng :
                                        Vietinbank - Chi nhánh 7</div>
                                    <p>Việc thanh toán được xem là hoàn tất khi Vietravel nhận được đủ tiền vé du lịch trước
                                        lúc khởi hành hoặc theo hợp đồng thỏa thuận giữa hai bên. Bất kỳ mọi sự thanh toán
                                        chậm trễ dẫn đến việc hủy dịch vụ không thuộc trách nhiệm của Vietravel.</p>
                                    <p>Khách hàng có nhu cầu xuất hóa đơn, vui lòng cung cấp thông tin xuất hóa đơn ngay tại
                                        thời điểm đăng ký. Vietravel có trách nhiệm xuất hóa đơn cho khách hàng trong vòng 7
                                        ngày sau khi tour kết thúc.&nbsp;</p>
                                    <p><strong>DÀNH CHO KHÁCH HÀNG ĐĂNG KÝ TRÊN TRANG WWW.TRAVEL.COM.VN THANH TOÁN CHUYỂN
                                            KHOẢN:</strong></p>
                                    <p>Khi thực hiện việc chuyển khoản, Quý khách <strong>vui lòng ghi rõ Tên họ, Số điện
                                            thoại và Nội dung chuyển</strong> cho chương trình du lịch cụ thể đã được Quý
                                        khách chọn đăng ký.</p>
                                    <p>Sau khi thực hiện việc chuyển khoản, Quý khách vui lòng gửi Ủy Nhiệm Chi về công ty
                                        Vietravel theo địa chỉ email sales@vietravel.com và liên hệ với nhân viên phụ trách
                                        tuyến để nhận được Vé du lịch chính thức từ công ty Vietravel.</p>
                                    <p>Vietravel sẽ không giải quyết các trường hợp hệ thống tự động hủy phiếu đăng ký nếu
                                        Quý khách không thực hiện đúng qui định trên. Vietravel sẽ xác nhận phục vụ khách
                                        sau khi đã&nbsp; nhận được tiền thanh toán của Quý khách.</p>
                                    <p>*<u>Lưu ý</u>: Quý khách vui lòng điền đầy đủ thông tin theo yêu cầu khi đăng ký tour
                                        qua mạng bán travel.com.vn và chịu trách nhiệm về tính chính xác của những thông tin
                                        đã cung cấp. Vietravel sẽ sử dụng những thông tin này để cung cấp cho các nhà cung
                                        cấp dịch vụ và tiến hành các thủ tục cần thiết cho chuyến đi. Nếu có sự khác biệt
                                        giữa thông tin mà Quý khách cung cấp so với thực tế dẫn đến việc phải điều chỉnh thì
                                        Quý khách vui lòng thanh toán các khoản chi phí phát sinh (nếu có).</p>
                                    <p><strong>IV.&nbsp; HỦY VÉ VÀ PHÍ HỦY VÉ DU LỊCH</strong></p>
                                    <p><strong>1.&nbsp;&nbsp; Trường hợp bị hủy bỏ do Vietravel:</strong></p>
                                    <p>Nếu Vietravel không thực hiện được chuyến du lịch, Vietravel phải báo ngay cho khách
                                        hàng biết và thanh toán lại cho khách hàng toàn bộ số tiền khách hàng đã đóng trong
                                        vòng 3 ngày kể từ lúc việc thông báo hủy chuyến du lịch bằng tiền mặt hoặc chuyển
                                        khoản và chịu toàn bộ chi phí đã trả cho các nhà cung cấp trước đó.</p>
                                    <p><strong>2.&nbsp;&nbsp; Trường hợp bị hủy bỏ do khách hàng: </strong></p>
                                    <p>- &nbsp;Đối với tất cả các tuyến du lịch, áp dụng điều kiện hủy tour ghi trong Biên
                                        nhận thu tiền và tờ rơi chương trình du lịch.</p>
                                    <p>- &nbsp;Riêng đối với tuyến du thuyền, áp dụng theo điều kiện hủy tour trong tờ rơi
                                        chương trình du lịch du thuyền.</p>
                                    <p>- &nbsp;Đối với khách hàng đang ký trên trang <a
                                            href="http://www.travel.com.vn/">www.travel.com.vn</a> thanh toán trực tuyến, áp
                                        dụng các điều khoản hủy ghi trên trang <a
                                            href="http://www.travel.com.vn/">www.travel.com.vn</a> và cộng thêm chi phí giao
                                        dịch ngân hàng cho việc thanh toán tiền Vé du lịch.</p>
                                    <p>- &nbsp;Việc hoàn trả tiền cho khách sẽ được Vietravel thực hiện ngay sau khi ngân
                                        hàng thông báo tiền đã vào tài khoản của Vietravel.</p>
                                    <p><strong>3.&nbsp;&nbsp; Trường hợp bất khả kháng:</strong></p>
                                    <p>- Nếu chương trình du lịch bị hủy bỏ hoặc thay đổi bởi một trong hai bên vì lý do bất
                                        khả kháng (hỏa hoạn, thời tiết, tai nạn, thiên tai, chiến tranh, dịch bệnh, hoãn,
                                        dời, và hủy chuyến hoặc thay đổi khác của các phương tiện vận chuyển công cộng hoặc
                                        các sự kiến bất khả kháng khác theo quy định pháp luật…), thì hai bên sẽ không chịu
                                        bất kỳ nghĩa vụ bồi hoàn các tổn thất đã xảy ra và không chịu bất kỳ trách nhiệm
                                        pháp lý nào. Tuy nhiên mỗi bên có trách nhiệm cố gắng tối đa để giúp đỡ bên bị thiệt
                                        hại nhằm giảm thiểu các tổn thất gây ra vì lý do bất khả kháng.</p>
                                    <p><strong>4. Thay đổi lộ trình:</strong></p>
                                    <p><strong>- </strong>Tùy theo tình hình thực tế, Vietravel giữ quyền thay đổi lộ trình,
                                        sắp xếp lại thứ tự các điểm tham quan hoặc hủy bỏ chuyến đi du lịch bất cứ lúc nào
                                        mà Vietravel thấy cần thiết vì sự thuận tiện hoặc an toàn cho khách hàng.</p>
                                    <p><strong>V.&nbsp;&nbsp; NHỮNG YÊU CẦU ĐẶC BIỆT TRONG CHUYẾN DU LỊCH</strong></p>
                                    <p>Các yêu cầu đặc biệt của Quý khách phải được báo trước cho Vietravel ngay tại thời
                                        điểm đăng ký. Vietravel sẽ cố gắng đáp ứng những yêu cầu này trong khả năng của mình
                                        song sẽ không chịu trách nhiệm về bất kỳ sự từ chối cung cấp dịch vụ từ phía các nhà
                                        vận chuyển, khách sạn, nhà hàng và các nhà cung cấp dịch vụ độc lập khác.</p>
                                    <p><strong>VI.&nbsp; KHÁCH SẠN</strong></p>
                                    <p>- Phòng khách sạn được cung cấp theo yêu cầu của Quý khách và khả năng cung ứng của
                                        nơi lưu trú. Loại phòng cơ bản có hai giường đơn (TWN) hoặc một giường đôi (DBL) tùy
                                        theo cơ cấu phòng của các khách sạn. Khách sạn do Vietravel đặt cho các chương trình
                                        tham quan có tiêu chuẩn tương ứng với các mức giá vé mà khách chọn khi đăng ký đi du
                                        lịch. Nếu cần thiết thay đổi về bất kỳ lý do nào, khách sạn thay thế sẽ tương đương
                                        với tiêu chuẩn của khách sạn ban đầu và sẽ được báo cho du khách trước khi khởi
                                        hành.</p>
                                    <p>- Những yêu cầu đặc biệt của khách hàng nếu thông báo trước cho Vietravel sẽ được đáp
                                        ứng tùy theo khả năng cung cấp của khách sạn và khách hàng phải trả thêm tiền đối
                                        với các yêu cầu này (nếu có). Vietravel được phép không đáp ứng những yêu cầu này
                                        nếu khách sạn từ chối cung cấp dịch vụ.</p>
                                    <p>- Giờ nhận phòng tại các khách sạn là sau 14:00 và phải trả phòng theo quy định của
                                        khách sạn là trước 12:00.</p>
                                    <p><strong>VII. VẬN CHUYỂN</strong></p>
                                    <p>- Với chương trình đi bằng xe: xe máy lạnh (từ 4 đến 45 chỗ) sẽ được Vietravel sắp
                                        xếp tùy theo số lượng khách từng đoàn, phục vụ suốt chương trình tham quan.</p>
                                    <p>- Với chương trình đi bằng xe lửa – máy bay – tàu cánh ngầm (phương tiện vận chuyển
                                        công cộng), các nhà cung cấp dịch vụ có thể thay đổi giờ khởi hành mà không báo
                                        trước. Trường hợp định tuyến bay, quyền bay không được cấp bởi chính quyền nước sở
                                        tại, nằm ngoài kiểm soát của Vietravel (đối với các chuyến bay thuê bao nguyên
                                        chuyến). Vì vậy, Vietravel sẽ hoàn trả chi phí tour chưa thực hiện và không xem xét
                                        bồi thường thêm chi phí nào khác. Vietravel sẽ thông báo cho khách hàng trong thời
                                        gian sớm nhất.</p>
                                    <p>- Vietravel không chịu trách nhiệm bồi hoàn và trách nhiệm pháp lý với những thiệt
                                        hại về vật chất lẫn tinh thần do việc chậm trễ, thay đổi giờ giấc khởi hành của các
                                        phương tiện vận chuyển công cộng hoặc sự chậm trễ do chính hành khách gây ra.
                                        Vietravel chỉ thực hiện hành vi giúp đỡ để giảm bớt tổn thất cho hành khách.</p>
                                    <p><strong>VIII.&nbsp; HÀNH LÝ</strong></p>
                                    <p>- Đối với các chương trình sử dụng dịch vụ hàng không, hành lý miễn cước sẽ áp dụng
                                        theo quy định của các hãng hàng không.</p>
                                    <p>- Vietravel không chịu trách nhiệm về sự thất lạc, hư hỏng hành lý hoặc bất kỳ vật
                                        dụng gì của du khách trong suốt chuyến đi, du khách tự bảo quản hành lý của mình.
                                        Nếu khách hàng bị mất hay thất lạc hành lý thì Vietravel sẽ giúp hành khách liên lạc
                                        và khai báo với các bộ phận liên quan truy tìm hành lý bị mất hay thất lạc. Việc bồi
                                        thường hành lý bị mất hay thất lạc sẽ theo qui định của các đơn vị cung cấp dịch vụ
                                        hoặc các đơn vị bảo hiểm (nếu có).</p>
                                    <p><strong>IX.&nbsp; BẢO HIỂM DU LỊCH </strong></p>
                                    <p>- Giá dịch vụ du lịch trọn gói đã bao gồm bảo hiểm du lịch nước ngoài với mức đền bù
                                        lên đến 460.000.000vnđ/người/vụ cho nhân mạng và 28.600.000vnđ/người/vụ cho hành lý.
                                    </p>
                                    <p>- Điều kiện, điều khoản bảo hiểm: Theo quy tắc bảo hiểm khách du lịch nước ngoài QĐ
                                        số: 0333/2011 – BM/QLNV ngày 01/03/2011.</p>
                                    <p>- Số hotline tư vấn về các điều kiện, điều khoản bảo hiểm 0938 30 1234</p>
                                    <p><strong>X. </strong>Trong quá trình thực hiện, nếu xảy ra tranh chấp sẽ được giải
                                        quyết trên cơ sở thương lượng trong thời hạn 30 ngày kể từ ngày một trong hai bên
                                        đưa tranh chấp ra thương lượng. Hết thời hạn này nếu tranh chấp không được giải
                                        quyết hoặc một trong hai bên không đồng ý với kết quả thương lượng thì có quyền đưa
                                        tranh chấp ra giải quyết tại Tòa án có thẩm quyền. Án phí sẽ do bên thua kiện chịu.
                                    </p>
                                    <p><strong><em>* Vé du lịch được xem như Hợp đồng lữ hành và được lập thành 2 bản, mỗi
                                                bên giữ một bản, có giá trị như nhau.</em></strong></p>
                                    <p>&nbsp;</p>
                                    ;
                                </div>
                                {{-- <label class="checker">
                                    Tôi đồng ý với các điều kiện trên
                                    <input type="checkbox" id="DieuKien">
                                    <span class="checkmark"></span>
                                </label> --}}
                            </div>
                        </div>
                        <div class="col-md-4 col-12 right">
                            <div class="group-checkout">
                                <h3>Tóm tắt chuyến đi</h3>
                                <p class="package-title">Tour trọn gói <span> ({{ $goi_du_lich->so_nguoi_toi_da }}
                                        khách)</span></p>
                                <div class="product">
                                    <div class="product-image">
                                        <img src="{{ URL($goi_du_lich->hinh_goi_du_lich ?? 'hinh_test/no-img.jpg') }}"
                                            class="img-fluid" alt="image">
                                    </div>
                                    <div class="product-content">
                                        <p class="title">{{ $goi_du_lich->ten }}</p>
                                    </div>
                                </div>
                                <div class="go-tour">
                                    <div class="start">
                                        <i class="fa fa-calendar-minus"></i>
                                        <div class="start-content">
                                            <h4>Bắt đầu chuyến đi</h4>
                                            <p class="time">{{ date('d/m/Y', strtotime($goi_du_lich->ngay_khoi_hanh)) }}
                                            <p class="from"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="detail">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th class="l1">Hành khách</th>
                                                <th class="l2 text-right">
                                                    <i class="fa fa-users" id="AmoutPerson">{{ $so_nguoi }}</i>
                                                    <span></span>
                                                    <p class="add-more"></p>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>Người lớn</td>
                                                <td class="t-price text-right" id="AdultPrice">{{ $data_input['adult'] }}
                                                    x {{ number_format($goi_du_lich->gia_nguoi_lon) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Trẻ em</td>
                                                <td class="t-price text-right" id="ChildrenPrice">
                                                    {{ $data_input['children'] }} x
                                                    {{ number_format($goi_du_lich->gia_tre_em) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Trẻ nhỏ</td>
                                                <td class="t-price text-right" id="SmallChildrenPrice">
                                                    {{ $data_input['smallchildren'] }} x
                                                    {{ number_format($goi_du_lich->gia_tre_nho) }}</td>
                                            </tr>

                                            <tr class="pt hardCode" id="promotiontitle">
                                                <td id="showpromotiontitle">Khuyến mãi xuân 2023</td>
                                                <td class="t-price text-right" id="txtKhuyenMai2022"></td>
                                            </tr>
                                            <tr id="promotiontitletotal" style="display:none">
                                                <td>Tổng tiền</td>
                                                <td class="t-price text-right" id="PromotionTotalPrice"></td>
                                            </tr>
                                            <tr style="display:none">
                                                <td id="discountTitle">noidia</td>
                                                <td id="discountPrice"></td>
                                            </tr>
                                            <tr class="pt" id="promotionOpentitle">
                                                <td id="showpromotionOpentitle" class="hardCode"></td>
                                                <td class="t-price text-right hardCode" id="txtKhuyenMaiMoMua2022"></td>
                                            </tr>

                                            <tr class="total">
                                                <td>Tổng cộng</td>
                                                <td class="t-price text-right" id="TotalPrice">
                                                    {{ number_format($tong_hoa_don) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div>
                                        <button type="submit" class="btn btn-primary btn-order" style="width:100% ">
                                            Đặt ngay
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#hotel').addClass('active');
        });
        $("#tienmat").click(function() {
            visiblepromotion(0);
        });

        $("#vnpay").click(function() {
            visiblepromotion(1);
        });

        $("#momo-atm").click(function() {
            visiblepromotion(2);
        });

        $("#momo-qr").click(function() {
            visiblepromotion(3);
        });

        function visiblepromotion(visible) {
            if (visible == 0) {
                $("#payment-item-momo-qr").removeClass('active');
                $("#payment-item-momo-atm").removeClass('active');
                $("#payment-item-momo-vnpay").removeClass('active');
                $("#payment-item-tien-mat").addClass('active');
            } else if (visible == 1) {
                $("#payment-item-momo-qr").removeClass('active');
                $("#payment-item-momo-atm").addClass('active');
                $("#payment-item-momo-vnpay").removeClass('active');
                $("#payment-item-tien-mat").removeClass('active');
            } else if (visible == 2) {
                $("#payment-item-momo-qr").removeClass('active');
                $("#payment-item-momo-atm").addClass('active');
                $("#payment-item-momo-vnpay").removeClass('active');
                $("#payment-item-tien-mat").removeClass('active');
            } else if (visible == 3) {
                $("#payment-item-momo-qr").addClass('active');
                $("#payment-item-momo-atm").removeClass('active');
                $("#payment-item-momo-vnpay").removeClass('active');
                $("#payment-item-tien-mat").removeClass('active');
            }

        }
    </script>
@endsection
