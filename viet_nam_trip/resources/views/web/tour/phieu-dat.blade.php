@extends('web.layouts.app')

@section('content')
    @parent
    @if (session()->has('yes'))
        <script>
            alert('{{ session()->get('yes') }}')
        </script>
    @endif

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
            <form action="{{ route('web.tour.thanh-toan', ['id' => $goi_du_lich->id]) }}" method="get">
                <div class="container" a>
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
                            <h2 class="d-none d-lg-block">Tổng quan về chuyến đi</h2>
                            <div class="description hardCode">
                                {!! $goi_du_lich->thong_tin_dich_vu !!}
                            </div>
                            <h3>Thông tin liên lạc</h3>
                            <div class="customer-contact mb-3">
                                <form class="customer-contact-inner" action="" method="get" id="form">
                                    <div class="name">
                                        <label>Họ và Tên <b>*</b></label>
                                        <input class="form-control" id="contact_name" name="Fullname" type="text"
                                            value="{{ old('Fullname') ?? Auth::user()->ten }}">
                                        <div class="text-center">
                                            @error('Fullname')
                                                <span style="color:red"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mail">
                                        <label>Email <b>*</b></label>
                                        <input class="form-control" id="email" name="Email" type="text"
                                            value="{{ old('Email') ?? Auth::user()->email }}">
                                        <div class="text-center">
                                            @error('Email')
                                                <span style="color:red"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="phone">
                                        <label>Số điện thoại <b>*</b></label>
                                        <input class="form-control" id="mobilephone" name="Telephone" type="text"
                                            value="{{ old('Telephone') ?? Auth::user()->so_dien_thoai }}">
                                        <div class="text-center">
                                            @error('Telephone')
                                                <span style="color:red"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="addess">
                                        <label>Địa chỉ</label>
                                        <input class="form-control" id="address" name="Address" type="text"
                                            value="{{ old('Address') }}">
                                        <div class="text-center">
                                            @error('Address')
                                                <span style="color:red"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="customer" id="customer">
                                <h3>khách hàng</h3>
                                <div class="change">
                                    <div class="change-title">
                                        <h4>Người lớn</h4>
                                        <p>&gt; 12 tuổi</p>
                                    </div>
                                    <div class="change-number">
                                        <span class="minus btn-click"><i class="fa fa-minus-circle"
                                                id="adultMinus"></i></span>
                                        <input class="number" type="number" value="{{ old('adult') ?? 1 }}" id="adult"
                                            name="adult">
                                        <span class="plus btn-click"><i class="fa fa-plus-circle" id="adultPlus"></i></span>
                                    </div>
                                </div>
                                <div class="change">
                                    <div class="change-title">
                                        <h4>Trẻ em</h4>
                                        <p>Từ 2 - 12 tuổi</p>
                                    </div>
                                    <div class="change-number">
                                        <span class="minus btn-click"><i
                                                class="fa fa-minus-circle"id="childrenMinus"></i></span>
                                        <input class="number" type="number" value="{{ old('children') ?? 0 }}"
                                            id="children" name="children">
                                        <span class="plus btn-click"><i class="fa fa-plus-circle"
                                                id="childrenPlus"></i></span>
                                    </div>
                                </div>
                                <div class="change">
                                    <div class="change-title">
                                        <h4>Trẻ nhỏ</h4>
                                        <p>
                                            < 2 tuổi</p>
                                    </div>
                                    <div class="change-number">
                                        <span class="minus btn-click"><i class="fa fa-minus-circle"
                                                id="smallchildrenMinus"></i></span>
                                        <input class="number" type="number" value="{{ old('smallchildren') ?? 0 }}"
                                            id="smallchildren" name="smallchildren">
                                        <span class="plus btn-click"><i class="fa fa-plus-circle"
                                                id="smallchildrenPlus"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="form-check checkbox-input-search d-inline-flex  align-items-center">
                                    <input class="form-check-input me-3 option" type="radio" id="not_tu_van"
                                        name="option" value="not_tu_van"
                                        {{ old('option') == 'not_tu_van' ? 'checked' : '' }}
                                        {{ old('option') ?? 'checked' }}>
                                    <div class="col-12">
                                        <label class="form-check-label mt-1 small" for="flexCheckDefault_Option1">
                                            Nhập danh sách khách hàng
                                        </label>
                                    </div>
                                </div>
                                <div class="form-check checkbox-input-search d-inline-flex  align-items-center">
                                    <input class="form-check-input me-3 option" type="radio" id="tu_van"
                                        name="option" value="tu_van" {{ old('option') == 'tu_van' ? 'checked' : '' }}>
                                    <div class="col-11">
                                        <label class="form-check-label mt-1 small" for="flexCheckDefault_Option1">
                                            Tôi cần được nhân viên tư vấn
                                            Vietravel trợ giúp nhập thông tin đăng ký dịch vụ
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="detail-customer" id="detail-customer">
                                <div class="list">
                                    <h3>Thông tin hành khách</h3>

                                    <div class="b-persion block">
                                        <div class="nguoi-lon" id="nguoi-lon">
                                            <h4>Người lớn</h4>
                                            <div class="group-info" id="ListInfoAdult">

                                            </div>
                                        </div>
                                        <div class="tre-em" id='tre-em'>
                                        </div>

                                        <div class="tre-nho" id='tre-nho'>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="customer-save">
                                <h3>Quý khách có ghi chú lưu ý gì, hãy nói với chúng tôi !</h3>
                                <div class="customer-save-inner">
                                    {{-- <label class="checker">
                                    Hút thuốc
                                    <input type="checkbox" class="note-more" value="hút thuốc">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="checker">
                                    Phòng tầng cao
                                    <input type="checkbox" class="note-more" value="phòng tầng cao">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="checker">
                                    Trẻ em hiếu động
                                    <input type="checkbox" class="note-more" value="trẻ em hiếu động">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="checker">
                                    Ăn chay
                                    <input type="checkbox" class="note-more" value="ăn chay">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="checker">
                                    Có người khuyết tật
                                    <input type="checkbox" class="note-more" value="có người khuyết tật">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="checker">
                                    Phụ nữ có thai
                                    <input type="checkbox" class="note-more" value="phụ nữ có thai">
                                    <span class="checkmark"></span>
                                </label> --}}
                                    <p>Ghi chú thêm</p>
                                    <textarea class="form-control" cols="20" id="note" name="note"
                                        placeholder="Vui lòng nhập nội dung lời nhắn bằng tiếng Anh hoặc tiếng Việt" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12 right">
                            {{-- <div class="box-support">
                            <label>Quý khách cần hỗ trợ?</label>
                            <div class="group-contact">
                                <a href="https://webcall.talking.vn/frame-click-to-call/new?code=tCEZl1-MKPuA6JU-czVAScCb0pPkHmPt"
                                    class="phone"
                                    onclick="if (!window.__cfRLUnblockHandlers) return false; javascript:window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=375,height=667');return false;"
                                    target="_blank">
                                    <i class="fa fa-phone-alt"></i>
                                    <p>Gọi miễn phí <br>qua internet</p>
                                </a>
                                <a href="mailto:info@vietravel.com" class="mail" data-toggle="modal"
                                    data-target="#divTuVan" style="cursor:pointer;">
                                    <i class="fa fa-envelope"></i>
                                    <p>Gửi yêu cầu <br>hỗ trợ ngay</p>
                                </a>
                            </div>
                        </div> --}}
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
                                    {{-- <div class="end">
                                    <i class="fa fa-calendar-minus"></i>
                                    <div class="start-content">
                                        <h4>Kết thúc chuyến đi</h4>
                                        <p class="time">T3, 4 Tháng 7, 2023</p>
                                        <p class="from"></p>
                                    </div>
                                </div> --}}
                                </div>
                                <div class="detail">
                                    <table id="table_detail_khach_hang">
                                        <tbody>
                                            <tr>
                                                <th class="l1">Hành khách</th>
                                                <th class="l2 text-right">
                                                    <i class="fa fa-users" id="AmoutPerson">1</i> <span></span>
                                                    <p class="add-more"></p>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>Người lớn</td>

                                                <td class="t-price text-right" id="AdultPrice">1 x
                                                    {{ number_format($goi_du_lich->gia_nguoi_lon) }}</td>
                                                <input type="hidden" id="gia-nguoi-lon" class="gia-nguoi-lon"
                                                    value="{{ number_format($goi_du_lich->gia_nguoi_lon) }}">
                                            </tr>
                                            <tr>
                                                <td>Trẻ em</td>
                                                <td class="t-price text-right" id="ChildrenPrice">
                                                    {{ number_format($goi_du_lich->gia_tre_em) }}</td>
                                                <input type="hidden" id="gia-tre-em" class="gia-tre-em"
                                                    value="{{ number_format($goi_du_lich->gia_tre_em) }}">
                                            </tr>
                                            <tr>
                                                <td>Trẻ nhỏ</td>
                                                <td class="t-price text-right" id="SmallChildrenPrice">
                                                    {{ number_format($goi_du_lich->gia_tre_nho) }}</td>
                                                <input type="hidden" id="gia-tre-nho" class="gia-tre-nho"
                                                    value="{{ number_format($goi_du_lich->gia_tre_nho) }}">
                                            </tr>
                                            {{-- <tr class="pt">
                                            <td>Phụ thu phòng riêng</td>
                                            <td class="t-price text-right" id="txtPhuThu">1,400,000₫</td>
                                        </tr> --}}
                                            <tr class="cuppon">
                                                <td>Mã giảm giá</td>
                                                <td class="cp-form text-right">
                                                    <form action="#">
                                                        <input class="form-control" id="DiscountCode" name="DiscountCode"
                                                            placeholder="Thêm mã" required="required" type="text"
                                                            value="">
                                                        <input type="hidden" id="hdDiscountCode">
                                                        <input type="hidden" id="hdDiscountCode-Price" value="0">
                                                        &nbsp;
                                                        <input type="button" class="btn btn-success"
                                                            id="btnDiscountCode" value="Áp dụng">
                                                    </form>
                                                </td>
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
                                            <tr class="pt">
                                                <td>số chỗ đã đặt</td>
                                                <td class="t-price text-right" id="txtGiamGiaLastMinute">còn <span
                                                        id="remainLastMinuteGuest">6 </span> / <span
                                                        id="totalLastMinuteGuest">7</span> chỗ</td>
                                            </tr>
                                            {{-- <tr>
                                            <td>Người lớn và trẻ em</td>
                                            <td class="t-price text-right" id="GiamGiaLastMinute">1 x 1,000,000₫</td>
                                        </tr> --}}
                                            {{-- <tr class="cuppon">
                                            <td>Mã giảm giá </td>
                                            <td class="cp-form text-right">
                                                <form action="#">
                                                    <input class="form-control" id="DiscountCode" name="DiscountCode"
                                                        placeholder="Thêm mã" required="required" type="text"
                                                        value="">
                                                    <input type="hidden" id="hdDiscountCode">
                                                    <input type="hidden" id="hdDiscountCode-Price" value="0">
                                                    &nbsp;
                                                    <input type="button" class="btn btn-success" id="btnDiscountCode"
                                                        value="Áp dụng">
                                                </form>
                                            </td>
                                        </tr> --}}
                                            <tr class="total">
                                                <td>Tổng cộng</td>
                                                <td class="t-price text-right" id="TotalPrice">
                                                    {{ number_format($goi_du_lich->gia_nguoi_lon) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div>
                                        <button type="submit" class="btn btn-primary btn-order" style="width:100% ">
                                            Đặt ngay
                                        </button>
                                    </div>
                                </div>
                                {{-- <div id="selectOptionTour" class="modal fade bd-example-modal-lg reSelectOption"
                                    tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg">

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">DANH SÁCH DỊCH VỤ</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" value="1e4cab84-8229-42fe-aaaa-4ee8c375f7e3"
                                                    id="tourId">
                                                <h6>Danh sách lựa chọn</h6>
                                                <div class="col-12">
                                                    <table class="table caption-top">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <span id="OptionName_1">
                                                                        Bay cùng Vietravel Airlines - Khách sạn Tahiti 4 Sao
                                                                    </span>
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                                <td class="d-flex justify-content-end">
                                                                    <span class="px-2" id="optionPrice_1">
                                                                        5,990,000₫
                                                                    </span>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" checked="" type="radio" value="5990000.0" name="flexRadioDefault" id="option_1">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div id="showlistoptionservice">
                                                    <table class="table-sm w-100">
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-12 d-flex justify-content-end">
                                                            <span class="px-4">Thành tiền :</span>
                                                            <span class="px-2"
                                                                id="TotalPriceService"><strong>4,990,000₫</strong></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-center">
                                                    <button type="submit" id="btn-order"
                                                        class="btn btn-primary text-uppercase">Đặt ngay</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
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
        const detai_constomer = document.querySelector('#detail-customer');
        const customer = document.querySelector('#customer');
        const option = document.querySelector('.option:checked').value;
        const table_detail_khach_hang = document.getElementById('table_detail_khach_hang');
        $(document).ready(function() {
            $('#hotel').addClass('active');
            // load_danh_sach();
            if (option == 'tu_van') {
                tu_van();
            } else if (option == 'not_tu_van') {
                not_tu_van();
            }
        });
        var myModalChooseOption = new bootstrap.Modal(document.getElementById('selectOptionTour'), {
            keyboard: false
        })

        function load_danh_sach() {
            var adult = document.getElementById("adult").value;
            var children = document.getElementById("children").value;
            var smallchildren = document.getElementById("smallchildren").value;
            load_nguoi_lon(adult);
            load_tre_em(children);
            load_tre_nho(smallchildren);
        }


        function ChooseOption() {

            myModalChooseOption.show();
        }

        $(document).on('click', '.btn-click', function(e) {
            GetTotalPriceService(e);
        });

        function GetTotalPriceService(e) {
            var TotalOptionPrice = 0;
            let btnName = e.currentTarget.getElementsByTagName('i')[0].id;
            let iIndex = btnName.lastIndexOf('_');
            let iIndexId = btnName.slice(iIndex + 1);
            if (iIndexId == "adultPlus" || iIndexId == "adultMinus") {
                var adult = document.getElementById("adult").value;
                if (iIndexId == "adultPlus") {
                    adult = Number(adult) + 1;
                } else if (iIndexId == "adultMinus") {
                    if (Number(adult) == 1 || Number(adult) < 0) {
                        alert('số khách tối thiểu là 1');
                        document.getElementById("adult").value = 1;
                    } else {
                        adult = Number(adult) - 1;
                    }
                }
                document.getElementById("adult").value = adult;
                load_nguoi_lon(adult);
            } else if (iIndexId == "childrenPlus" || iIndexId == "childrenMinus") {
                var children = document.getElementById("children").value;
                if (iIndexId == "childrenPlus") {
                    children = Number(children) + 1;
                } else if (iIndexId == "childrenMinus") {
                    if (Number(children) <= 0) {
                        alert('số khách tối thiểu là 1');
                        document.getElementById("children").value = 0;
                    } else {
                        children = Number(children) - 1;
                    }
                }
                document.getElementById("children").value = children;
                load_tre_em(children);
            } else if (iIndexId == "smallchildrenPlus" || iIndexId == "smallchildrenMinus") {
                var smallchildren = document.getElementById("smallchildren").value;
                if (iIndexId == "smallchildrenPlus") {
                    smallchildren = Number(smallchildren) + 1;
                } else if (iIndexId == "smallchildrenMinus") {
                    if (Number(smallchildren) <= 0) {
                        alert('số khách tối thiểu là 1');
                        document.getElementById("smallchildren").value = 0;
                    } else {
                        smallchildren = Number(smallchildren) - 1;
                    }
                }
                document.getElementById("smallchildren").value = smallchildren;
                load_tre_nho(smallchildren);
            }
            var adult = document.getElementById("adult").value;
            var children = document.getElementById("children").value;
            var smallchildren = document.getElementById("smallchildren").value;
            tong_hoa_don(adult, children, smallchildren)
            if (option == 'tu_van') {
                tu_van();
            } else if (option == 'not_tu_van') {
                not_tu_van();
            }
        }

        function kiem_tra_so_luong(){
            var goi_du_lich_id = document.getElementById("goi_du_lich_id").value;
            var url = "{{ route('web.tour.so-nguoi-con-lai', '') }}" + '/' + goi_du_lich_id;
            var AmoutPerson = Number(adult) + Number(children) + Number(smallchildren);
            formData = new FormData();
            formData.append('AmoutPerson', AmoutPerson);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {

                }
            });
        }

        function load_nguoi_lon(so_luong) {
            var url = "{{ route('web.tour.load-nguoi-lon', '') }}" + '/' + so_luong;
            var gia_nguoi_lon = document.getElementById("gia-nguoi-lon").value;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: url,
                type: 'GET',
                //data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#ListInfoAdult').html("");
                    $('#ListInfoAdult').append(data);
                    $('#AdultPrice').html("");
                    $('#AdultPrice').append(so_luong + ' x ' + gia_nguoi_lon);
                }
            });
        }

        function load_tre_em(so_luong) {
            var url = "{{ route('web.tour.load-tre-em', '') }}" + '/' + so_luong;
            var gia_tre_em = document.getElementById("gia-tre-em").value;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: url,
                type: 'GET',
                //data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#tre-em').html("");
                    $('#tre-em').append(data);
                    $('#ChildrenPrice').html("");
                    $('#ChildrenPrice').append(so_luong + ' x ' + gia_tre_em);
                }
            });
        }

        function load_tre_nho(so_luong) {
            var url = "{{ route('web.tour.load-tre-nho', '') }}" + '/' + so_luong;
            var gia_tre_nho = document.getElementById("gia-tre-nho").value;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: url,
                type: 'GET',
                //data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#tre-nho').html("");
                    $('#tre-nho').append(data);
                    $('#SmallChildrenPrice').html("");
                    $('#SmallChildrenPrice').append(so_luong + ' x ' + gia_tre_nho);
                }
            });
        }

        function tong_hoa_don(adult, children, smallchildren) {
            var goi_du_lich_id = document.getElementById("goi_du_lich_id").value;
            var url = "{{ route('web.tour.tong-hoa-don', '') }}" + '/' + goi_du_lich_id;
            var AmoutPerson = Number(adult) + Number(children) + Number(smallchildren);
            formData = new FormData();
            formData.append('adult', adult);
            formData.append('children', children);
            formData.append('smallchildren', smallchildren);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#TotalPrice').html("");
                    $('#TotalPrice').append(data);
                    $('#AmoutPerson').html("");
                    $('#AmoutPerson').append(AmoutPerson);
                }
            });
        }

        $("#not_tu_van").click(function() {
            visiblepromotion(0);
        });

        $("#tu_van").click(function() {
            visiblepromotion(1);
        });

        function visiblepromotion(visible) {
            if (visible == 0) {
                not_tu_van();

            } else if (visible == 1) {
                tu_van();
            }
        }

        function not_tu_van() {
            detai_constomer.style.display = "block";
            customer.style.display = "block";
            table_detail_khach_hang.style.display = "inline-table";
            load_danh_sach();
        }

        function tu_van() {
            detai_constomer.style.display = "none";
            customer.style.display = "none";
            table_detail_khach_hang.style.display = "none";
            load_nguoi_lon(0);
            load_tre_em(0);
            load_tre_nho(0)
        }
    </script>
@endsection
