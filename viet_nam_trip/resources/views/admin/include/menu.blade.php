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
                 <li class="" id="li-quan-an">
                    <a href="#">
                        <i class="metismenu-icon pe-7s-plugin"></i>Quản lí quản ăn
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('admin.quan-an.index')}}" id="quan-an">
                                <i class="metismenu-icon"></i>{{ trans('public.list') }}
                            </a>
                        </li>

                    </ul>
                </li>

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
                <li class="" id="li-tour">
                    <a href="#">
                        <i class="metismenu-icon pe-7s-plugin"></i>Quản lí danh sách tour
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('admin.tour.index')}}" id="tour">
                                <i class="metismenu-icon"></i>Danh sách tour
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
                 <li class="" id="li-bai-viet">
                    <a href="#">
                        <i class="metismenu-icon pe-7s-pen"></i>Quản lí bài viết
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.bai-viet.index') }}" id="bai-viet">
                                <i class="metismenu-icon"></i>{{ trans('public.list') }}
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
