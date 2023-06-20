<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{route('web.trang-chu.index')}}">dirEngine.</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item nav-menu" id="home"><a href="{{route('web.trang-chu.index')}}" class="nav-link">{{trans('public.homne')}}</a></li>
                <li class="nav-item nav-menu" id="about"><a href="{{route('web.ve-chung-toi.index')}}" class="nav-link">{{trans('public.about')}}</a></li>
                <li class="nav-item nav-menu" id="location"><a href="{{route('web.dia-diem.index')}}" class="nav-link">{{trans('public.location')}}</a></li>
                <li class="nav-item nav-menu" id="hotel"><a href="{{route('web.khach-san.index')}}" class="nav-link">{{trans('public.hotel')}}</a></li>
                <li class="nav-item nav-menu" id="blog"><a href="{{route('web.bai-viet.index')}}" class="nav-link">{{trans('public.blog')}}</a></li>
                <li class="nav-item nav-menu" id="news"><a href="{{route('web.tin-tuc.index')}}" class="nav-link">{{trans('public.news')}}</a></li>
                <li class="nav-item nav-menu" id="contact"><a href="{{route('web.lien-he.index')}}" class="nav-link">{{trans('public.contact')}}</a></li>
                @if (Auth::user() != null)
                       <li class="nav-item nav-menu" id="contact"><a href="{{route('web.lien-he.index')}}" class="nav-link">{{trans('public.contact')}}</a></li>
                @else
                    <li class="nav-item cta" id="login"><a href="{{route('web.auth.dang-nhap')}}" class="nav-link"><span>Đăng nhập</span></a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
