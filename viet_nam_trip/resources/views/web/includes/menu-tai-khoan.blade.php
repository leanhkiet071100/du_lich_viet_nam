<div class="col-lg-2 col-md-3 order-md-1 order-2">
    <div class="info-user-full">

        <div class="info_user row">

                <a class="info-user-avatar" herf="">
                    <img src=" {{ URL(Auth::user()->hinh_dai_dien ?? 'hinh_test/avatar.png') }}" alt="không tải được">
                </a>

            <div class="info">
                    <div class="info-name text-center">
                        {{ Auth::user()->ten ?? 'không tên' }}
                    </div>

                <div class="info-edit">
                    <a href="{{ route('web.tai-khoan.tai-khoan') }}"><i class="fa fa-pencil fa-fw"></i>Sửa thông tin</a>
                </div>
            </div>
        </div>

        <div class="info-menu app-sidebar sidebar-shadow">
            <div class="scrollbar-sidebar ps">
                <div class="app-sidebar__inner">
                    <ul class="vertical-nav-menu metismenu">
                        <li class="" id="li-tai-khoan">
                            <a type="button">
                                <i class="fa fa-user"></i> Tài khoản của tôi
                                {{-- <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i> --}}
                            </a>
                            <ul class="mm-collapse mm-show menu-tai-khoan" id="menu-tai-khoan" style="display: none;">
                                <li>
                                    <a href="{{ route('web.tai-khoan.tai-khoan') }}" id="thong-tin-ca-nhan">
                                        <i class="metismenu-icon"></i>Thông tin cá nhân
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ Route('web.tai-khoan.doi-mat-khau') }}" id="doi-mat-khau">
                                        <i class="metismenu-icon"></i>Đổi mật khẩu
                                    </a>
                                </li>


                            </ul>
                        </li>
                        <li class="" id="li-don-hang">
                            <a href="{{ route('web.tai-khoan.phieu-dat') }}">
                                <i class="fa fa-credit-card"></i> Tour
                                {{-- <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i> --}}
                            </a>
                        </li>
                         <li class="" id="li-dang-xuat">
                            <a href="{{ Route('web.tai-khoan.logout-user') }}">
                                <i class="fa fa-window-close-o"></i> Đăng xuất
                                {{-- <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i> --}}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js-tai-khoan')
    <script type="text/javascript">
        $('#home').removeClass('active');
        $("#li-tai-khoan").on("click", "a", function() {
            var menu_tai_khoan = document.getElementById('menu-tai-khoan');
            if (menu_tai_khoan.style.display === "none") {
                menu_tai_khoan.style.display = "block";
            } else {
                menu_tai_khoan.style.display = "none";
            }
        });
    </script>
@endsection
