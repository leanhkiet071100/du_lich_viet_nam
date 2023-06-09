<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">dirEngine.</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item" id="home"><a href="index.html" class="nav-link">{{trans('public.homne')}}</a></li>
                <li class="nav-item" id="about"><a href="about.html" class="nav-link">{{trans('public.about')}}</a></li>
                <li class="nav-item" id="location"><a href="{{route('web.dia-diem.index')}}" class="nav-link">{{trans('public.location')}}</a></li>
                <li class="nav-item" id="hotel"><a href="hotel.html" class="nav-link">{{trans('public.hotel')}}</a></li>
                <li class="nav-item" id="blog"><a href="blog.html" class="nav-link">{{trans('public.blog')}}</a></li>
                <li class="nav-item" id="news"><a href="{{route('web.tin-tuc.index')}}" class="nav-link">{{trans('public.news')}}</a></li>
                {{-- <li class="nav-item cta"><a href="contact.html" class="nav-link"><span>Add listing</span></a></li> --}}
            </ul>
        </div>
    </div>
</nav>
