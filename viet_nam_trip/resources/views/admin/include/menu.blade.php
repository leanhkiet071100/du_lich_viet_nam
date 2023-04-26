<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Menu</li>
                <li class="" id="li-san-pham">
                    <a href="#">
                        <i class="metismenu-icon pe-7s-plugin"></i>Quản lí sản phẩm
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        {{-- <li>
                                            <a href="{{ Route('admin.get-loai-san-pham') }}" id="loai-san-pham">
                                                <i class="metismenu-icon"></i>Loại sản phẩm
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ Route('admin.san-pham') }}" id="san-pham">
                                                <i class="metismenu-icon"></i>Sản phẩm
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ Route('admin.binh-luan-san-pham') }}"
                                                id="binh-luan-san-pham">
                                                <i class="metismenu-icon"></i>Bình luận
                                            </a>
                                        </li> --}}

                    </ul>
                </li>
                <li class="" id="li-bai-viet">
                    <a href="#">
                        <i class="metismenu-icon pe-7s-pen"></i>Quản lí bài viết
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.bai-viet') }}" id="bai-viet">
                                <i class="metismenu-icon"></i>Danh sách bài viêt
                            </a>
                        </li>
                        {{-- <li>
                                            <a href="{{ Route('admin.binh-luan-bai-viet') }}"
                                                id="binh-luan-bai-viet">
                                                <i class="metismenu-icon"></i>Bình luận
                                            </a>
                                        </li> --}}
                    </ul>
                </li>
                <li class="" id="li-hinh-anh">
                    {{-- <a href="#">
                                        <i class="metismenu-icon pe-7s-photo"></i>Quản lí hình ảnh
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="{{ Route('admin.logo') }}" id="logo">
                                                <i class="metismenu-icon"></i>logo
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ Route('admin.banner') }}" id="banner">
                                                <i class="metismenu-icon"></i>banner
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ Route('admin.slideshow') }}" id="slideshow">
                                                <i class="metismenu-icon"></i>slideshow
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ Route('admin.mang-xa-hoi') }}" id="mang-xa-hoi">
                                                <i class="metismenu-icon"></i>mạng xã hội
                                            </a>
                                        </li>
                                    </ul> --}}
                </li>
                <li class="" id="li-trang-tinh">
                    {{-- <a href="#">
                                        <i class="metismenu-icon pe-7s-pin"></i>Quản lí trang tĩnh
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="{{ Route('admin.footer') }}" id="footer">
                                                <i class="metismenu-icon"></i>footer
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ Route('admin.chinh-sach') }}" id="chinh-sach">
                                                <i class="metismenu-icon"></i>Chính sách
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ Route('admin.slogan') }}" id="slogan">
                                                <i class="metismenu-icon"></i>slogan
                                            </a>
                                        </li>
                                    </ul> --}}
                </li>
                <li class="" id="li-don-hang">
                    {{-- <a href="#">
                                        <i class="metismenu-icon pe-7s-cash"></i>Quản lí đơn hàng
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="{{ Route('admin.don-hang-all') }}" id="don-hang">
                                                <i class="metismenu-icon"></i>Dánh sách đơn hàng
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ Route('admin.don-hang-cho-xac-nhan') }}" id="cho-xac-nhan">
                                                <i class="metismenu-icon"></i>Đơn hàng chờ xác nhận
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ Route('admin.don-hang-van-chuyen') }}" id="van-chuyen">
                                                <i class="metismenu-icon"></i>Đơn hàng vận chuyển
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ Route('admin.don-hang-dang-giao') }}" id="dang-giao">
                                                <i class="metismenu-icon"></i>Đơn hàng đang giao
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ Route('admin.don-hang-hoan-thanh') }}" id="hoan-thanh">
                                                <i class="metismenu-icon"></i>Đơn hàng hoàn thành
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ Route('admin.don-hang-bi-huy') }}" id="bi-huy">
                                                <i class="metismenu-icon"></i>Đơn hàng bị hủy
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ Route('admin.don-hang-tra-hang') }}" id="tra-hang">
                                                <i class="metismenu-icon"></i>Đơn hàng bị trả
                                            </a>
                                        </li>

                                    </ul> --}}
                </li>
                {{-- <li class="">
                                    <a href="{{ Route('admin.get-nhan-hieu') }}" class="" id="nhan-hieu">
                                        <i class="metismenu-icon pe-7s-network"></i>Nhãn Hiệu
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{ Route('admin.thong-tin-shop') }}" class=""
                                        id="thong-tin-shop">
                                        <i class="metismenu-icon pe-7s-culture"></i>Thông tin của shop
                                    </a>
                                </li> --}}

            </ul>
        </div>
    </div>
</div>
