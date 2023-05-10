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
                <li class="app-sidebar__heading">{{ trans('public.user') }}</li>

                <li class="" id="li-vai-tro-nguoi-dung">

                    <a href="#">
                        <i class="metismenu-icon pe-7s-plugin"></i>{{ trans('public.role') }}
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>

                        <li>
                            <a href="{{ Route('admin.vai-tro-nguoi-dung.index') }}" id="vai-tro-nguoi-dung">
                                <i class="metismenu-icon"></i>{{ trans('public.list') }}
                            </a>
                        </li>

                        <li>
                            <a href="{{ Route('admin.vai-tro-nguoi-dung.create') }}" id="tao-vai-tro-nguoi-dung">
                                <i class="metismenu-icon"></i>{{ trans('public.create') }}
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="" id="li-nguoi-dung">

                    <a href="#">
                        <i class="metismenu-icon pe-7s-plugin"></i>{{ trans('public.user') }}
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ Route('admin.nguoi-dung.index') }}" id="list-nguoi-dung">
                                <i class="metismenu-icon"></i>{{ trans('public.list') }}
                            </a>
                        </li>

                        <li>
                            <a href="{{ Route('admin.nguoi-dung.create') }}" id="tao-nguoi-dung">
                                <i class="metismenu-icon"></i>{{ trans('public.create') }}
                            </a>
                        </li>

                        <li>
                            <a href="{{ Route('admin.vai-tro-nguoi-dung.create') }}" id="tao-bang-excel">
                                <i class="metismenu-icon"></i>{{ trans('public.create_excel') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ Route('admin.vai-tro-nguoi-dung.create') }}" id="nguoi-ban-hang">
                                <i class="metismenu-icon"></i>{{ trans('public.user_sell') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ Route('admin.vai-tro-nguoi-dung.create') }}" id="nguoi-noi-luu-tru">
                                <i class="metismenu-icon"></i>{{ trans('public.user_location') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ Route('admin.vai-tro-nguoi-dung.create') }}" id="nguoi-noi-luu-tru">
                                <i class="metismenu-icon"></i>{{ trans('public.user_admin') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ Route('admin.vai-tro-nguoi-dung.create') }}" id="nguoi-noi-luu-tru">
                                <i class="metismenu-icon"></i>{{ trans('public.request_delete_user') }}
                            </a>
                        </li>
                         <li>
                            <a href="{{ Route('admin.vai-tro-nguoi-dung.create') }}" id="nguoi-noi-luu-tru">
                                <i class="metismenu-icon"></i>{{ trans('public.request_dang_ki_user') }}
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="app-sidebar__heading">{{ trans('public.location') }}</li>
                <li class="" id="li-dia-diem">
                    <a href="#">
                        <i class="metismenu-icon pe-7s-plugin"></i>{{ trans('public.manage_location') }}
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        {{-- <li>
                            <a href="{{ Route('admin.get-loai-san-pham') }}" id="loai-san-pham">
                                <i class="metismenu-icon"></i>Loại sản phẩm
                            </a>
                        </li> --}}
                        <li>
                            <a href="{{ Route('admin.dia-diem.index') }}" id="dia-diem">
                                <i class="metismenu-icon"></i>{{ trans('public.list') }}
                            </a>
                        </li>
                        {{-- <li>
                            <a href="{{ Route('admin.binh-luan-san-pham') }}" id="binh-luan-san-pham">
                                <i class="metismenu-icon"></i>Bình luận
                            </a>
                        </li> --}}

                    </ul>
                </li>
                 <li class="" id="li-loai-dia-diem">
                    <a href="#">
                        <i class="metismenu-icon pe-7s-plugin"></i>{{ trans('public.manage_type_location') }}
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        {{-- <li>
                            <a href="{{ Route('admin.get-loai-san-pham') }}" id="loai-san-pham">
                                <i class="metismenu-icon"></i>Loại sản phẩm
                            </a>
                        </li> --}}
                        <li>
                            <a href="" id="loai-dia-diem">
                                <i class="metismenu-icon"></i>{{ trans('public.list') }}
                            </a>
                        </li>
                        <li>
                            <a href="" id="create-loai-dia-diem">
                                <i class="metismenu-icon"></i>{{ trans('public.create') }}
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="app-sidebar__heading">{{ trans('public.news') }}</li>
                <li class="" id="li-tin-tuc">
                    <a href="#">
                        <i class="metismenu-icon pe-7s-pen"></i>{{ trans('public.manage_news') }}
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.tin-tuc.index') }}" id="tin-tuc">
                                <i class="metismenu-icon"></i>{{ trans('public.list') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ Route('admin.tin-tuc.create') }}" id="tao-tin-tuc">
                                <i class="metismenu-icon"></i>{{ trans('public.create') }}
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="app-sidebar__heading">{{ trans('public.website') }}</li>
                <li class="" id="li-hinh-anh">
                    <a href="#">
                        <i class="metismenu-icon pe-7s-photo"></i>Quản lí hình ảnh
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="" id="logo">
                                <i class="metismenu-icon"></i>logo
                            </a>
                        </li>
                        <li>
                            <a href="" id="banner">
                                <i class="metismenu-icon"></i>banner
                            </a>
                        </li>
                        <li>
                            <a href="" id="slideshow">
                                <i class="metismenu-icon"></i>slideshow
                            </a>
                        </li>
                        <li>
                            <a href="" id="mang-xa-hoi">
                                <i class="metismenu-icon"></i>mạng xã hội
                            </a>
                        </li>
                    </ul>
                </li>


            </ul>
        </div>
    </div>
</div>
