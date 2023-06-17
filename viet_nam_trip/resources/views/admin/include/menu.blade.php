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
                        <li>
                            <a href="{{route('admin.dia-diem.index')}}" id="dia-diem">
                                <i class="metismenu-icon"></i>{{ trans('public.list') }}
                            </a>
                        </li>

                    </ul>
                </li>
                 {{-- <li class="" id="li-loai-dia-diem">
                    <a href="#">
                        <i class="metismenu-icon pe-7s-plugin"></i>{{ trans('public.manage_type_location') }}
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('admin.loai-dia-diem.index')}}" id="loai-dia-diem">
                                <i class="metismenu-icon"></i>{{ trans('public.list') }}
                            </a>
                        </li>

                    </ul>
                </li> --}}

                <li class="app-sidebar__heading">{{ trans('public.booking') }}</li>
                <li class="" id="li-loai-goi-du-lich">
                    <a href="#">
                        <i class="metismenu-icon pe-7s-plugin"></i>{{ trans('public.manage_category_travel_packages') }}
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('admin.loai-goi-du-lich.index')}}" id="loai-goi-du-lich">
                                <i class="metismenu-icon"></i>{{ trans('public.list') }}
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="" id="li-goi-du-lich">
                    <a href="#">
                        <i class="metismenu-icon pe-7s-plugin"></i>{{ trans('public.manage_travel_packages') }}
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('admin.goi-du-lich.index')}}" id="goi-du-lich">
                                <i class="metismenu-icon"></i>{{ trans('public.list') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.goi-du-lich.create')}}" id="tao-goi-du-lich">
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
                <li class="" id="li-web">
                    <a href="#">
                        <i class="metismenu-icon pe-7s-pen"></i>{{ trans('public.manage_web') }}
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.thong-tin-web.index') }}" id="thong-tin-trang-web">
                                <i class="metismenu-icon"></i>{{ trans('public.info_web') }}
                            </a>
                        </li>
                    </ul>
                </li>



            </ul>
        </div>
    </div>
</div>
