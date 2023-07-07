@extends('web.layouts.app')

@section('title', 'mạng xã hội')
@section('content')
    @parent
    <!-- Main -->
    @if (session()->has('yes'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Cảm ơn bạn yêu',
                text: '{{ session()->get('yes') }}',
            })
        </script>
    @endif
    @include('web.includes.banner')
    <section class="time-line-user">
        <div class="container">
            <div class="row">
                @include('web.includes.menu-tai-khoan')
                <div class="col-lg-9 col-md-7 order-md-1 order-1">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="tt-chi-tiet-don-hang">
                                            <div class="tro-lai">
                                                <a href="{{ route('web.tai-khoan.phieu-dat') }}">Trở lại</a>
                                            </div>
                                            <div class="trang-thai-chi-tiet">
                                                <span>Mã đơn hàng: {{ $phieu_dat->id }}</span>
                                                <span class="tt-chia">|</span>
                                                @switch($phieu_dat->trang_thai)
                                                    @case(1)
                                                        <span>Đang chờ duyệt</span>
                                                    @break

                                                    @case(2)
                                                        <span>Đã Duyệt</span>
                                                    @break

                                                    @case(3)
                                                        <span>Chờ duyệt hủy</span>
                                                    @break

                                                    @case(4)
                                                        <span>Đã hủy</span>
                                                    @break

                                                    @case(5)
                                                        <span>Hoàn thành</span>
                                                    @break

                                                    @default
                                                @endswitch
                                            </div>
                                        </div>

                                        <div class="card-body display_data">
                                            <h2 class="text-center">Chi tiết thông tin</h2>
                                            <hr>
                                            @if ($phieu_dat->ten != null)
                                                <div class="position-relative row form-group">
                                                    <label for="name" class="col-md-3 text-md-right col-form-label">
                                                        Họ tên
                                                    </label>
                                                    <div class="col-md-9 col-xl-8">
                                                        <p>{{ $phieu_dat->ten }}</p>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($phieu_dat->email != null)
                                                <div class="position-relative row form-group">
                                                    <label for="email"
                                                        class="col-md-3 text-md-right col-form-label">Email</label>
                                                    <div class="col-md-9 col-xl-8">
                                                        <p>{{ $phieu_dat->email }}</p>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($phieu_dat->so_dien_thoai != null)
                                                <div class="position-relative row form-group">
                                                    <label for="phone" class="col-md-3 text-md-right col-form-label">số
                                                        Điện thoại</label>
                                                    <div class="col-md-9 col-xl-8">
                                                        <p>{{ $phieu_dat->so_dien_thoai }}</p>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($phieu_dat->dia_chi != null)
                                                <div class="position-relative row form-group">
                                                    <label for="street_address"
                                                        class="col-md-3 text-md-right col-form-label">
                                                        Địa chỉ</label>
                                                    <div class="col-md-9 col-xl-8">
                                                        <p>{{ $phieu_dat->dia_chi }}</p>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($phieu_dat->ghi_chu != null)
                                                <div class="position-relative row form-group">
                                                    <label for="description"
                                                        class="col-md-3 text-md-right col-form-label">Ghi chú</label>
                                                    <div class="col-md-9 col-xl-8">
                                                        <p>{{ $phieu_dat->ghi_chu }}</p>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($phieu_dat->ngay_huy != null)
                                                <div class="position-relative row form-group">
                                                    <label for="description"
                                                        class="col-md-3 text-md-right col-form-label">Ngày hủy</label>
                                                    <div class="col-md-9 col-xl-8">
                                                        <p>{{ date('d-m-Y', strtotime($phieu_dat->ngay_huy)) }}</p>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($phieu_dat->goi_du_lich != null)
                                                <div class="position-relative row form-group">
                                                    <label for="description"
                                                        class="col-md-3 text-md-right col-form-label">Gói du lịch</label>
                                                    <div class="col-md-9 col-xl-8">
                                                        <a
                                                            href="{{ route('web.tour.show', ['id' => $phieu_dat->goi_du_lich->id]) }}">Xem
                                                            chi tiết gói du lịch</a>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>


                                        @if ($phieu_dat->hoa_don != null)
                                            <div class="card-body display_data">
                                                <h2 class="text-center">Chi tiết hóa đơn</h2>
                                                <hr>
                                                @if ($phieu_dat->hoa_don->ngay_thanh_toan != null)
                                                    <div class="position-relative row form-group">
                                                        <label for="name" class="col-md-3 text-md-right col-form-label">
                                                            Ngày thanh toán
                                                        </label>
                                                        <div class="col-md-9 col-xl-8">
                                                            <p>{{ $phieu_dat->hoa_don->ngay_thanh_toan }}</p>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if ($phieu_dat->hoa_don->loai_thanh_toan != null)
                                                    <div class="position-relative row form-group">
                                                        <label for="email"
                                                            class="col-md-3 text-md-right col-form-label">Loại thanh
                                                            toán</label>
                                                        <div class="col-md-9 col-xl-8">
                                                            @switch($phieu_dat->hoa_don->loai_thanh_toan)
                                                                @case('tien-mat')
                                                                    <p>Tiền mặt</p>
                                                                @break

                                                                @case('vn-pay')
                                                                    <p>VNPAY</p>
                                                                @break

                                                                @case('momo-atm')
                                                                    <p>Momo ATM</p>
                                                                @break

                                                                @case('momo-qr')
                                                                    <p>Momo QR</p>
                                                                @break

                                                                @default
                                                            @endswitch
                                                        </div>
                                                    </div>
                                                @endif
                                                @if ($phieu_dat->hoa_don->tong_tien != null)
                                                    <div class="position-relative row form-group">
                                                        <label for="phone"
                                                            class="col-md-3 text-md-right col-form-label">Tổng tiền</label>
                                                        <div class="col-md-9 col-xl-8">
                                                            <p>{{ number_format($phieu_dat->hoa_don->tong_tien) }}</p>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if ($phieu_dat->hoa_don->trang_thai != null)
                                                    <div class="position-relative row form-group">
                                                        <label for="street_address"
                                                            class="col-md-3 text-md-right col-form-label">
                                                            Trạng thái</label>
                                                        <div class="col-md-9 col-xl-8">
                                                            @switch($phieu_dat->hoa_don->trang_thai)
                                                                @case(0)
                                                                    <p>Chưa thanh toán</p>
                                                                @break

                                                                @case(1)
                                                                    <p>Đã trả tiền</p>
                                                                @break

                                                                @case(2)
                                                                    <p>Hoàn trả</p>
                                                                @break

                                                                @case(3)
                                                                    <p>Đã hoàn trả</p>
                                                                @break

                                                                @case(4)
                                                                    <p>Đã hủy</p>
                                                                @break

                                                                @default
                                                            @endswitch
                                                        </div>
                                                    </div>
                                                @endif
                                                @if ($phieu_dat->ghi_chu != null)
                                                    <div class="position-relative row form-group">
                                                        <label for="description"
                                                            class="col-md-3 text-md-right col-form-label">ghi chú</label>
                                                        <div class="col-md-9 col-xl-8">
                                                            <p>{{ $phieu_dat->ghi_chu }}</p>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        @endif
                                        <div class="table-responsive">
                                            <h2 class="text-center">Danh sách người tham gia</h2>
                                            <hr>
                                            <table
                                                class="align-middle mb-0 table table-borderless table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Họ và tên</th>
                                                        <th class="text-center">Giới tính</th>
                                                        <th class="text-center">Ngày sinh</th>
                                                        <th class="text-center">Tháng sinh</th>
                                                        <th class="text-center">Năm sinh</th>
                                                        <th class="text-center">Loại</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($ds_nguoi_tham_gia as $key => $value)
                                                        <tr>
                                                            <td>
                                                                <div class="widget-content p-0">
                                                                    <div class="widget-content-wrapper">
                                                                        <div class="widget-content-left flex2">
                                                                            <div class="widget-heading">
                                                                                {{ $value->ho_ten }}</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                @if ($value->gioi_tinh == 0)
                                                                    Nữ
                                                                @else
                                                                    Nam
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                {{ $value->ngay }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ $value->thang }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ $value->nam }}
                                                            </td>
                                                            <td class="text-center">
                                                                @if ($value->loai == 'nguoi-lon')
                                                                    Người lớn
                                                                @elseif ($value->loai == 'tre-em')
                                                                    Trẻ em
                                                                @elseif ($value->loai == 'tre-nho')
                                                                    trẻ nhỏ
                                                                @endif
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="chi-tiet-tien-don-hang">
                                            <div class="chi-tiet-tien">
                                                <div class="ten-tien">
                                                    <span>Người lớn</span>
                                                </div>
                                                <div class="gia-tien">
                                                    <div>{{ $phieu_dat->so_nguoi_lon ?? 0 }} x
                                                        {{ number_format($phieu_dat->goi_du_lich->gia_nguoi_lon ?? '0') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chi-tiet-tien">
                                                <div class="ten-tien">
                                                    <span>Trẻ em</span>
                                                </div>
                                                <div class="gia-tien">
                                                    <div>{{ $phieu_dat->so_tre_em ?? 0 }} x
                                                        {{ number_format($phieu_dat->goi_du_lich->gia_tre_em ?? '0') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chi-tiet-tien">
                                                <div class="ten-tien">
                                                    <span>Trẻ nhỏ</span>
                                                </div>
                                                <div class="gia-tien">
                                                    <div>{{ $phieu_dat->so_tre_nho ?? 0 }} x
                                                        {{ number_format($phieu_dat->goi_du_lich->gia_tre_nho ?? '0') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chi-tiet-tien">
                                                <div class="ten-tien">
                                                    <span>Tổng tiền</span>
                                                </div>
                                                <div class="gia-tien">
                                                    <div>{{ number_format($phieu_dat->hoa_don->tong_tien ?? '0') }}</div>
                                                </div>
                                            </div>
                                            <div class="chi-tiet-tien">
                                                <div class="ten-tien">
                                                    <span>Thành tiền</span>
                                                </div>
                                                <div class="gia-tien">
                                                    <div>{{ number_format($phieu_dat->hoa_don->tong_tien ?? '0') }}</div>
                                                </div>
                                            </div>
                                            <div class="btn-tour-chuc-nang">
                                                <div class="danh-gia">
                                                    @if ($phieu_dat->trang_thai == 5)
                                                        @if ($danh_gia == null)
                                                            <button onclick="hien_form_danh_gia({{ $phieu_dat->id }})"
                                                                class="btn-danh-gia btn btn-hover-shine btn-outline-success border-0 btn-sm">
                                                                Đánh giá
                                                            </button>
                                                        @else
                                                            <button
                                                                data-url="{{ route('web.tai-khoan.danh-gia-phieu-dat-sua', ['id' => $phieu_dat->id, 'danh_gia_id' => $danh_gia->id]) }}"
                                                                id="form_danh_gia_sua"
                                                                class="btn-danh-gia btn btn-hover-shine btn-outline-success border-0 btn-sm form_danh_gia_sua">
                                                                Đánh giá
                                                            </button>
                                                        @endif
                                                    @endif
                                                </div>
                                                @if ($phieu_dat->trang_thai != 5 && $phieu_dat->trang_thai != 4)
                                                    @if ($phieu_dat->trang_thai == 3)
                                                        <div class="huy-tour">
                                                            <button id="form_huy_tour"
                                                                class="btn-huy-tour btn btn-hover-shine btn-outline-danger border-0 btn-sm"
                                                                data-url="{{ route('web.tai-khoan.huy-phieu-dat', ['id' => $phieu_dat->id]) }}">
                                                                Hoàn lại
                                                            </button>
                                                        </div>
                                                    @else
                                                        <div class="huy-tour">
                                                            <button id="form_huy_tour"
                                                                class="btn-huy-tour btn btn-hover-shine btn-outline-danger border-0 btn-sm"
                                                                data-url="{{ route('web.tai-khoan.huy-phieu-dat', ['id' => $phieu_dat->id]) }}">
                                                                Hủy tour
                                                            </button>
                                                        </div>
                                                    @endif

                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="form-danh-gia" style="" class="form-danh-gia" style="display: none">

        </div>
    </section>

    <!-- End Main -->
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#don-hang').addClass('mm-active');
            $('#li-don-hang').addClass('mm-active');
        });

        function hien_form_danh_gia(id) {
            var url = "{{ route('web.tai-khoan.danh-gia-phieu-dat', '') }}" + '/' + id;;
            var form_danh_gia = document.getElementById("form-danh-gia");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: 'GET',
                // data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    add_them_layout();
                    form_danh_gia.style.display = "block";
                    $('#form-danh-gia').html("");
                    $('#form-danh-gia').append(data);

                }
            });
        }

        $(".form_danh_gia_sua").click(function(e) {
            e.preventDefault();
            var form_danh_gia = document.getElementById("form-danh-gia");
            var url = $(this).attr('data-url');
            console.log(url);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: 'GET',
                // data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    add_them_layout();
                    form_danh_gia.style.display = "block";
                    $('#form-danh-gia').html("");
                    $('#form-danh-gia').append(data);

                }
            });
        });

        $("#form_huy_tour").click(function(e) {
            e.preventDefault();
            var form_danh_gia = document.getElementById("form-danh-gia");
            var url = $(this).attr('data-url');
            console.log(url);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: 'GET',
                // data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    add_them_layout();
                    form_danh_gia.style.display = "block";
                    $('#form-danh-gia').html("");
                    $('#form-danh-gia').append(data);

                }
            });
        });
    </script>
@endsection
