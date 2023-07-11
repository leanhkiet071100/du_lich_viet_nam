@extends('admin.layouts.app')

@section('title', 'mạng xã hội')
@section('content')
    @parent
    <!-- Main -->
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>
                        Tất cả phiếu đặt
                    </div>
                </div>

            </div>
        </div>

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
                                <label for="email" class="col-md-3 text-md-right col-form-label">Email</label>
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
                                <label for="street_address" class="col-md-3 text-md-right col-form-label">
                                    Địa chỉ</label>
                                <div class="col-md-9 col-xl-8">
                                    <p>{{ $phieu_dat->dia_chi }}</p>
                                </div>
                            </div>
                        @endif
                        @if ($phieu_dat->ghi_chu != null)
                            <div class="position-relative row form-group">
                                <label for="description" class="col-md-3 text-md-right col-form-label">Ghi chú</label>
                                <div class="col-md-9 col-xl-8">
                                    <p>{{ $phieu_dat->ghi_chu }}</p>
                                </div>
                            </div>
                        @endif
                        @if ($phieu_dat->goi_du_lich != null)
                            <div class="position-relative row form-group">
                                <label for="description" class="col-md-3 text-md-right col-form-label">Gói du lịch</label>
                                <div class="col-md-9 col-xl-8">
                                    <a href="{{ route('web.tour.show', ['id' => $phieu_dat->goi_du_lich->id]) }}">Xem chi tiết
                                        gói du lịch</a>
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
                                    <label for="email" class="col-md-3 text-md-right col-form-label">Loại thành
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
                                    <label for="phone" class="col-md-3 text-md-right col-form-label">Tổng tiền</label>
                                    <div class="col-md-9 col-xl-8">
                                        <p>{{ number_format($phieu_dat->hoa_don->tong_tien) }}</p>
                                    </div>
                                </div>
                            @endif
                            @if ($phieu_dat->hoa_don->trang_thai != null)
                                <div class="position-relative row form-group">
                                    <label for="street_address" class="col-md-3 text-md-right col-form-label">
                                        Trạng thái</label>
                                    <div class="col-md-9 col-xl-8">
                                        @switch($phieu_dat->hoa_don->trang_thai)
                                            @case(0)
                                                <p>Chưa thanh toán</p>
                                            @break

                                            @case(1)
                                                <p>Đã thanh toán</p>
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
                                    <label for="description" class="col-md-3 text-md-right col-form-label">ghi chú</label>
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
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
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
                                <div>{{ $phieu_dat->so_nguoi_lon ?? 0 }} x
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
                        @if ($phieu_dat->trang_thai == 5)
                            <div class="danh-gia">
                                <button onclick="hien_form_danh_gia_san_pham({{ $value->ma_san_pham }})"
                                    class="btn-danh-gia btn btn-hover-shine btn-outline-success border-0 btn-sm">
                                    Đánh giá
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Main -->
@endsection

@section('js')

@endsection
