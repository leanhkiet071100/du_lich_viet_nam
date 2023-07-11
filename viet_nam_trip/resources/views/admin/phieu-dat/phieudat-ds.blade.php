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
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">STT</th>
                                    <th class="text-center">Họ tên</th>
                                    <th class="text-center">Số điện thoại</th>
                                    <th class="text-center">Ngày khởi hành</th>
                                    <th class="text-center">Ngày đặt</th>
                                    <th class="text-center">Thanh toán</th>
                                    <th class="text-center">Trạng thái</th>
                                    <th class="text-center">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($phieu_dat as $key => $value)
                                    <tr>
                                        <td class="text-center text-muted">{{ $key + 1 }}</td>
                                        <td class="text-center">{{ $value->ten }} </td>
                                        <td class="text-center"> {{ $value->so_dien_thoai }}</td>
                                        <td class="text-center">
                                            {{ date('d/m/Y', strtotime($value->goi_du_lich->ngay_khoi_hanh)) }}</td>
                                        <td class="text-center">{{ date('d/m/Y', strtotime($value->ngay_dat)) }}</td>
                                        @if ($value->hoa_don == null)
                                            @if ($value->trang_thai == 4)
                                                <td class="text-center td-trang-thai-hoa-don">
                                                    <span class="badge badge-warning">Đã hủy</span>
                                                </td>
                                            @else
                                                <td class="text-center td-trang-thai-hoa-don">
                                                    <span class="badge badge-success">Chờ tư vấn</span>
                                                </td>
                                            @endif
                                        @else
                                            <td class="text-center td-trang-thai-hoa-don{{ $value->hoa_don->trang_thai }}">
                                                @switch($value->hoa_don->trang_thai)
                                                    @case(1)
                                                        <span class="badge badge-success">Dã thanh toán</span>
                                                    @break

                                                    @case(2)
                                                        <span class="badge badge-secondary">Hoàn trả</span>
                                                    @break

                                                    @case(3)
                                                        <span class="badge badge-warning">Đã hoàn trả</span>
                                                    @break

                                                    @case(4)
                                                        <span class="badge badge-warning">Đã hủy</span>
                                                    @break

                                                    @case(0)
                                                        <span class="badge badge-danger">Chưa thanh toán</span>
                                                    @break

                                                    @default
                                                @endswitch
                                            </td>
                                        @endif

                                        <td class="text-center td-trang-thai{{ $value->id }}"
                                            id="td-trang-thai{{ $value->id }}">
                                            @switch($value->trang_thai)
                                                @case(1)
                                                    <span class="badge badge-warning">Đang chờ duyệt</span>
                                                @break

                                                @case(2)
                                                    <span class="badge badge-secondary">Đã Duyệt</span>
                                                @break

                                                @case(3)
                                                    <span class="badge badge-secondary">Chờ duyệt hủy</span>
                                                @break

                                                @case(4)
                                                    <span class="badge badge-success">Đã hủy</span>
                                                @break

                                                @case(5)
                                                    <span class="badge badge-secondary">Hoàn thành</span>
                                                @break

                                                @default
                                            @endswitch
                                        </td>
                                        <td class="text-center td-chuc-nang{{ $value->id }}"  id="td-chuc-nang{{ $value->id }}">
                                            @switch($value->trang_thai)
                                                @case(1)
                                                    <button onclick="duyet({{ $value->id }})"
                                                        class="btn btn-hover-shine btn-outline-success border-0 btn-sm">
                                                        Duyệt
                                                    </button>
                                                @break

                                                @case(4)
                                                    @if ($value->hoa_don->trang_thai == 2)
                                                        <button onclick="hoan_tien({{ $value->id }})"
                                                            class="btn btn-hover-shine btn-outline-success border-0 btn-sm">
                                                            Hoàn tiền
                                                        </button>
                                                    @endif
                                                @break

                                                @case(3)
                                                    <button onclick="duyet_huy({{ $value->id }})"
                                                        class="btn btn-hover-shine btn-outline-success border-0 btn-sm">
                                                        Duyệt hủy
                                                    </button>
                                                @break

                                                @default
                                            @endswitch
                                            <a href="{{ route('admin.tour.phieu-dat-chi-tiet', ['id' => $value->id]) }}"
                                                class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">Chi
                                                tiết </a>
                                            @if ($value->trang_thai != 4 && $value->trang_thai != 5)
                                                <button onclick="form_huy({{ $value->id }})"
                                                    class="btn btn-hover-shine btn-outline-danger border-0 btn-sm">Hủy</button>
                                            @endif
                                            @if ($value->hoa_don->trang_thai ?? '0'  == 1 || $value->trang_thai == 2  )
                                                <a href="{{route('admin.tour.xuat-hoa-don',['phieu_dat_id'=>$value->id])}}" class="btn btn-hover-shine btn-outline-info border-0 btn-sm">Xuất hóa đơn</a>
                                            @endif


                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="d-block card-footer">
                        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">

                        </nav>
                    </div>

                </div>
            </div>
        </div>
        @section('create')
            <div class="create-nhan-hieu" id="create-nhan-hieu">

            </div>
        @endsection
    </div>
    <!-- End Main -->
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#tour').addClass('mm-active');
            $('#li-tour').addClass('mm-active');
        });

        function form_huy(id) {
            var url = "{{ route('admin.tour.form-tour-huy', '') }}" + '/' + id;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: 'GET',
                // data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    var create_nhan_hieu = document.getElementById('create-nhan-hieu');
                    create_nhan_hieu.style.display = "block";
                    $('#create-nhan-hieu').html('');
                    $('#create-nhan-hieu').append(data);
                    add_them_layout();
                }
            });
        }

        function don_hang_chuc_nang(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: 'POST',
                // data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    //window.location.reload(); load lại trang
                    //load_binh_luan(1);
                    if (data.status == 200) {
                        // $('#td-trang-thai' +id).html("");
                        // $('#td-trang-thai' +id).append( '<span class="badge badge-danger">Hủy hàng</span>' );
                        let trang_thai = Number(data.don_hang.trang_thai);
                        trang_thai_update(trang_thai, id);
                        chuc_nang_update(trang_thai, id);
                    }
                }
            });
        }

        function trang_thai_update(trang_thai, id) {
            $('#td-trang-thai' + id).html("");
            switch (trang_thai) {
                case 1:
                    $('#td-trang-thai' + id).append('<span class="badge badge-warning">Chờ xác nhận</span>');

                    break;
                case 2:
                    $('#td-trang-thai' + id).append('<span class="badge badge-secondary">Vận chuyển</span>');
                    break;
                case 3:
                    $('#td-trang-thai' + id).append(' <span class="badge badge-secondary">Đang giao</span>');

                    break;
                case 4:
                    $('#td-trang-thai' + id).append('<span class="badge badge-success">Hoàn thành</span>');
                    break;
                case 5:
                    $('#td-trang-thai' + id).append('<span class="badge badge-danger">Trả hàng</span>');
                    break;
                case 0:
                    $('#td-trang-thai' + id).append('<span class="badge badge-danger">Hủy hàng</span>');
                    break;
            }
        }

        function huy() {
            var create_nhan_hieu = document.getElementById('create-nhan-hieu');
            create_nhan_hieu.style.display = "none";
            remove_them_layout();
        }

        function duyet(id) {
            var url = "{{ route('admin.tour.duyet', '') }}" + '/' + id;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: 'GET',
                // data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.status == 400) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Úi...!!!',
                            text: 'Error',

                        })
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Cảm ơn bạn đã duyệt',
                            text: data.mess,
                        }).then((result) => {
                            load();
                        });

                    }
                }
            });
        }

         function hoan_tien(id) {
            var url = "{{ route('admin.tour.hoan-tien', '') }}" + '/' + id;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: 'GET',
                // data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.status == 400) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Úi...!!!',
                            text: data.mess,

                        })
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Cảm ơn bạn',
                            text: data.mess,
                        }).then((result) => {
                            load();
                        });

                    }
                }
            });
        }

        function duyet_huy(id) {
            var url = "{{ route('admin.tour.duyet-huy', '') }}" + '/' + id;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: 'GET',
                // data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    if (data.status == 400) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Úi...!!!',
                            text: 'Error',

                        })
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Cảm ơn bạn đã duyệt',
                            text: data.mess,
                        }).then((result) => {
                            load();
                        });

                    }
                }
            });
        }

        function load() {
            location.reload()
        }
    </script>
@endsection
