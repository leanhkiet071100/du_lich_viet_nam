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
                                    <th class="text-center">Tư vấn</th>
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
                                            @if ($value->tu_van == 1)
                                                <span class="badge badge-danger">Cần tư vấn</span>
                                            @else
                                                <span class="badge badge-success">Tự nhập</span>
                                            @endif

                                        </td>
                                        <td class="text-center"> {{date('d/m/Y', strtotime($value->goi_du_lich->ngay_khoi_hanh )) }}</td>
                                        <td class="text-center">{{date('d/m/Y', strtotime($value->ngay_dat))}}</td>
                                        @if ($value->hoa_don == null)
                                            <td class="text-center td-trang-thai-hoa-don">
                                                <span class="badge badge-success">Chờ tư vấn</span>
                                            </td>
                                        @else
                                            <td class="text-center td-trang-thai-hoa-don{{ $value->hoa_don->trang_thai }}">
                                                @switch($value->hoa_don->trang_thai)
                                                    @case(1)
                                                        <span class="badge badge-success">Đã trả tiền</span>
                                                    @break

                                                    @case(2)
                                                        <span class="badge badge-secondary">Chưa thanh toán</span>
                                                    @break

                                                    @case(3)
                                                        <span class="badge badge-warning">Đang hoàn trả</span>
                                                    @break

                                                    @case(4)
                                                        <span class="badge badge-warning">Đã hoàn trả</span>
                                                    @break

                                                    @case(0)
                                                        <span class="badge badge-danger">Đã hủy</span>
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
                                        <td class="text-center td-chuc-nang{{ $value->id }}"
                                            id="td-chuc-nang{{ $value->id }}">
                                            @switch($value->trang_thai)
                                                @case(1)
                                                    <button onclick="don_hang_chuc_nang({{ $value->id }})"
                                                        class="btn btn-hover-shine btn-outline-success border-0 btn-sm">
                                                        Xác nhận
                                                    </button>
                                                @break

                                                @case(2)
                                                    <button onclick="don_hang_chuc_nang({{ $value->id }})"
                                                        class="btn btn-hover-shine btn-outline-success border-0 btn-sm">
                                                        Đã vận chuyển
                                                    </button>
                                                @break

                                                @case(3)
                                                    <button onclick="don_hang_chuc_nang({{ $value->id }})"
                                                        class="btn btn-hover-shine btn-outline-success border-0 btn-sm">
                                                        Hoàn thành
                                                    </button>
                                                @break

                                                @default
                                            @endswitch
                                            <a
                                                href=""class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">Chi
                                                tiết </a>
                                            @if ($value->trang_thai != 0 && $value->trang_thai != 4)
                                                <button onclick="don_hang_huy({{ $value->id }})"
                                                    class="btn btn-hover-shine btn-outline-danger border-0 btn-sm">Hủy</button>
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="d-block card-footer">
                        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
                            <div class="flex justify-between flex-1 sm:hidden">
                                <span
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                                    « Previous
                                </span>

                                <a href="#page=2"
                                    class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                    Next »
                                </a>
                            </div>

                            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                <div>
                                    <p class="text-sm text-gray-700 leading-5">
                                        Showing
                                        <span class="font-medium">1</span>
                                        to
                                        <span class="font-medium">5</span>
                                        of
                                        <span class="font-medium">9</span>
                                        results
                                    </p>
                                </div>

                                <div>
                                    <span class="relative z-0 inline-flex shadow-sm rounded-md">
                                        <span aria-disabled="true" aria-label="&amp;laquo; Previous">
                                            <span
                                                class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-l-md leading-5"
                                                aria-hidden="true">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </span>
                                        </span>

                                        <span aria-current="page">
                                            <span
                                                class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5">1</span>
                                        </span>
                                        <a href="#page=2"
                                            class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                                            aria-label="Go to page 2">
                                            2
                                        </a>

                                        <a href="#page=2" rel="next"
                                            class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150"
                                            aria-label="Next &amp;raquo;">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#tour').addClass('mm-active');
            $('#li-tour').addClass('mm-active');
        });

        function don_hang_huy(id) {

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
    </script>
@endsection
