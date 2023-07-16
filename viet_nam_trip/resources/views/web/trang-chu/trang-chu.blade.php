@extends('web.layouts.app')

@section('content')
    @parent
    @if (session()->has('yes'))
        <script>
            alert('{{ session()->get('yes') }}');
        </script>
    @endif
    <div class="hero-wrap js-fullheight" style="background-image: url({{ URL('assets/web/images/bg_1.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
                data-scrollax-parent="true">
                <div class="col-md-9 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                    {{--
                    <p>Or browse the highlights</p> --}}
                    <p class="browse d-md-flex">
                        <span class="d-flex justify-content-md-center align-items-md-center"><a href="{{route('web.quan-an.index')}}"><i
                                    class="flaticon-fork"></i>Nhà hàng</a></span>
                        {{-- <span class="d-flex justify-content-md-center align-items-md-center"><a href="#"><i
                                    class="flaticon-hotel"></i>Khách sạn</a></span> --}}
                        <span class="d-flex justify-content-md-center align-items-md-center"><a
                                href="{{ route('web.dia-diem.index') }}"><i class="flaticon-meeting-point"></i>Địa
                                điểm</a></span>
                        <span class="d-flex justify-content-md-center align-items-md-	center"><a
                                href="{{ route('web.tour.index') }}"><i class="flaticon-shopping-bag"></i>Tour</a></span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- <section class="ftco-section services-section bg-light">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon"><span class="flaticon-guarantee"></span></div>
                        </div>
                        <div class="media-body p-2 mt-2">
                            <h3 class="heading mb-3">Best Price Guarantee</h3>
                            <p>A small river named Duden flows by their place and supplies.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon"><span class="flaticon-like"></span></div>
                        </div>
                        <div class="media-body p-2 mt-2">
                            <h3 class="heading mb-3">Travellers Love Us</h3>
                            <p>A small river named Duden flows by their place and supplies.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon"><span class="flaticon-detective"></span></div>
                        </div>
                        <div class="media-body p-2 mt-2">
                            <h3 class="heading mb-3">Best Travel Agent</h3>
                            <p>A small river named Duden flows by their place and supplies.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon"><span class="flaticon-support"></span></div>
                        </div>
                        <div class="media-body p-2 mt-2">
                            <h3 class="heading mb-3">Our Dedicated Support</h3>
                            <p>A small river named Duden flows by their place and supplies.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    @if ($ls_dia_diem_noi_bat->count() > 0)
        <section class="ftco-section ftco-destination">
            <div class="container">
                <div class="row justify-content-start mb-5 pb-3">
                    <div class="col-md-7 heading-section ftco-animate">
                        <span class="subheading">Địa điểm</span>
                        <h2 class="mb-4"><strong>Địa điểm Nổi bật </strong></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="destination-slider owl-carousel ftco-animate">
                            @foreach ($ls_dia_diem_noi_bat as $key => $value)
                                <div class="item">
                                    <div class="destination">
                                        <a href="{{ route('web.dia-diem.show', ['id' => $value->id]) }}"
                                            class="img d-flex justify-content-center align-items-center"
                                            style="background-image: url({{ URL($value->hinh_anh_dia_diem) }});">
                                            <div class="icon d-flex justify-content-center align-items-center">
                                                <span class="icon-search2"></span>
                                            </div>
                                        </a>
                                        <div class="text p-3">
                                            <h3><a
                                                    href="{{ route('web.dia-diem.show', ['id' => $value->id]) }}">{{ $value->ten_dia_diem }}</a>
                                            </h3>
                                            {{-- <span class="listing">15 Listing</span> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-start mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate">
                    <span class="subheading">Gói du lịch</span>
                    <h2 class="mb-4"><strong>Gói du lịch</strong> Nổi bật</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                @foreach ($ls_goi_du_lich_noi_bat as $key => $value)
                    <div class="col-sm col-md-6 col-lg ftco-animate">
                        <div class="destination destination-tour">
                            <a href="{{ route('web.tour.show', ['id' => $value->id]) }}"
                                class="img img-2 d-flex justify-content-center align-items-center"
                                style="background-image: url({{ URL($value->hinh_goi_du_lich ?? 'hinh_test/no-img.jpg') }}); background-size: 100% 100%;">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search2"></span>
                                </div>
                            </a>
                            <div class="text p-3">
                                <div class="">
                                    <div class="">
                                        <h3 class="h3"><b><a
                                                    href="{{ route('web.tour.show', ['id' => $value->id]) }}">{{ $value->ten }}</a></b>
                                        </h3>
                                        <p class="rate">
                                            @for ($i = 0; $i < 5; $i++)
                                                @if ($i < $value->sao)
                                                    <i class="icon-star"></i>
                                                @else
                                                    <i class="icon-star-o"></i>
                                                @endif
                                            @endfor

                                        </p>
                                    </div>
                                </div>
                                <p>Loại: <b>{{ $value->ten_loai_goi_du_lich }}</b></p>
                                <p>Nơi khởi hành: <b>{{ $value->noi_khoi_hanh }}</b></p>
                                <p>Giá: <b
                                        style="font-weight: 700; color: #fd5056; font-size: 18px;">{{ number_format($value->gia_nguoi_lon) }}</b>
                                </p>
                                <hr>
                                <p class="bottom-area d-flex">
                                    <span>
                                        {{ date('d/m/Y', strtotime($value->ngay_khoi_hanh)) }}-{{ $value->so_ngay }}
                                        ngày</span>
                                    {{-- <span class="ml-auto"><a href="#">Đặt ngay</a></span> --}}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    @if ($ls_quan_an_noi_bat->count() > 0)
        <section class="ftco-section bg-light">
            <div class="container">
                <div class="row justify-content-start mb-5 pb-3">
                    <div class="col-md-7 heading-section ftco-animate">
                        <span class="subheading">Quán ăn</span>
                        <h2 class="mb-4"><strong>Quán ăn</strong> Nổi bật</h2>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    @foreach ($ls_quan_an_noi_bat as $key => $value)
                        <div class="col-sm col-md-6 col-lg ftco-animate">
                            <div class="destination">
                                <a href="#" class="img img-2 d-flex justify-content-center align-items-center"
                                    style="background-image: url({{ URL($value->hinh_quan_an) }});">
                                    <div class="icon d-flex justify-content-center align-items-center">
                                        <span class="icon-search2"></span>
                                    </div>
                                </a>
                                <div class="text p-3">
                                    <div class="d-flex">
                                        <div class="one">
                                            <h3><a href="#">{{ $value->ten_quan_an }}</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    {{-- <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url({{URL('assets/web/images/bg_1.jpg')}});">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                    <h2 class="mb-4">Some fun facts</h2>
                    <span class="subheading">More than 100,000 websites hosted</span>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="100000">0</strong>
                                    <span>Happy Customers</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="40000">0</strong>
                                    <span>Destination Places</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="87000">0</strong>
                                    <span>Hotels</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="56400">0</strong>
                                    <span>Restaurant</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}


    {{-- <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-start mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate">
                    <span class="subheading">Khách sạn</span>
                    <h2 class="mb-4"><strong>Phổ biến</strong> Khách sạn &amp; Phòng</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm col-md-6 col-lg ftco-animate">
                    <div class="destination">
                        <a href="#" class="img img-2 d-flex justify-content-center align-items-center"
                            style="background-image: url({{ URL('assets/web/images/hotel-1.jpg') }});">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-search2"></span>
                            </div>
                        </a>
                        <div class="text p-3">
                            <div class="d-flex">
                                <div class="one">
                                    <h3><a href="#">Hotel, Italy</a></h3>
                                    <p class="rate">
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star-o"></i>
                                        <span>8 Rating</span>
                                    </p>
                                </div>
                                <div class="two">
                                    <span class="price per-price">$40<br><small>/night</small></span>
                                </div>
                            </div>
                            <p>Far far away, behind the word mountains, far from the countries</p>
                            <hr>
                            <p class="bottom-area d-flex">
                                <span><i class="icon-map-o"></i> Miami, Fl</span>
                                <span class="ml-auto"><a href="#">Book Now</a></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm col-md-6 col-lg ftco-animate">
                    <div class="destination">
                        <a href="#" class="img img-2 d-flex justify-content-center align-items-center"
                            style="background-image: url({{ URL('assets/web/images/hotel-2.jpg') }});">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-search2"></span>
                            </div>
                        </a>
                        <div class="text p-3">
                            <div class="d-flex">
                                <div class="one">
                                    <h3><a href="#">Hotel, Italy</a></h3>
                                    <p class="rate">
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star-o"></i>
                                        <span>8 Rating</span>
                                    </p>
                                </div>
                                <div class="two">
                                    <span class="price per-price">$40<br><small>/night</small></span>
                                </div>
                            </div>
                            <p>Far far away, behind the word mountains, far from the countries</p>
                            <hr>
                            <p class="bottom-area d-flex">
                                <span><i class="icon-map-o"></i> Miami, Fl</span>
                                <span class="ml-auto"><a href="#">Book Now</a></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm col-md-6 col-lg ftco-animate">
                    <div class="destination">
                        <a href="#" class="img img-2 d-flex justify-content-center align-items-center"
                            style="background-image: url({{ URL('assets/web/images/hotel-3.jpg') }});">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-search2"></span>
                            </div>
                        </a>
                        <div class="text p-3">
                            <div class="d-flex">
                                <div class="one">
                                    <h3><a href="#">Hotel, Italy</a></h3>
                                    <p class="rate">
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star-o"></i>
                                        <span>8 Rating</span>
                                    </p>
                                </div>
                                <div class="two">
                                    <span class="price per-price">$40<br><small>/night</small></span>
                                </div>
                            </div>
                            <p>Far far away, behind the word mountains, far from the countries</p>
                            <hr>
                            <p class="bottom-area d-flex">
                                <span><i class="icon-map-o"></i> Miami, Fl</span>
                                <span class="ml-auto"><a href="#">Book Now</a></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm col-md-6 col-lg ftco-animate">
                    <div class="destination">
                        <a href="#" class="img img-2 d-flex justify-content-center align-items-center"
                            style="background-image: url({{ URL('assets/web/images/hotel-4.jpg') }});">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-search2"></span>
                            </div>
                        </a>
                        <div class="text p-3">
                            <div class="d-flex">
                                <div class="one">
                                    <h3><a href="#">Hotel, Italy</a></h3>
                                    <p class="rate">
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star-o"></i>
                                        <span>8 Rating</span>
                                    </p>
                                </div>
                                <div class="two">
                                    <span class="price per-price">$40<br><small>/night</small></span>
                                </div>
                            </div>
                            <p>Far far away, behind the word mountains, far from the countries</p>
                            <hr>
                            <p class="bottom-area d-flex">
                                <span><i class="icon-map-o"></i> Miami, Fl</span>
                                <span class="ml-auto"><a href="#">Book Now</a></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm col-md-6 col-lg ftco-animate">
                    <div class="destination">
                        <a href="#" class="img img-2 d-flex justify-content-center align-items-center"
                            style="background-image: url({{ URL('assets/web/images/hotel-5.jpg') }});">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-search2"></span>
                            </div>
                        </a>
                        <div class="text p-3">
                            <div class="d-flex">
                                <div class="one">
                                    <h3><a href="#">Hotel, Italy</a></h3>
                                    <p class="rate">
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star-o"></i>
                                        <span>8 Rating</span>
                                    </p>
                                </div>
                                <div class="two">
                                    <span class="price per-price">$40<br><small>/night</small></span>
                                </div>
                            </div>
                            <p>Far far away, behind the word mountains, far from the countries</p>
                            <hr>
                            <p class="bottom-area d-flex">
                                <span><i class="icon-map-o"></i> Miami, Fl</span>
                                <span class="ml-auto"><a href="#">Book Now</a></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- <section class="ftco-section testimony-section bg-light">
        <div class="container">
            <div class="row justify-content-start">
                <div class="col-md-5 heading-section ftco-animate">
                    <span class="subheading">Best Directory Website</span>
                    <h2 class="mb-4 pb-3"><strong>Why</strong> Choose Us?</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                        the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large
                        language ocean.</p>
                    <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic
                        life.</p>
                    <p><a href="#" class="btn btn-primary btn-outline-primary mt-4 px-4 py-3">Read more</a></p>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6 heading-section ftco-animate">
                    <span class="subheading">Testimony</span>
                    <h2 class="mb-4 pb-3"><strong>Our</strong> Guests Says</h2>
                    <div class="row ftco-animate">
                        <div class="col-md-12">
                            <div class="carousel-testimony owl-carousel">
                                <div class="item">
                                    <div class="testimony-wrap d-flex">
                                        <div class="user-img mb-5"
                                            style="background-image: url({{ URL('assets/web/images/person_1.jpg') }})">
                                            <span class="quote d-flex align-items-center justify-content-center">
                                                <i class="icon-quote-left"></i>
                                            </span>
                                        </div>
                                        <div class="text ml-md-4">
                                            <p class="mb-5">Far far away, behind the word mountains, far from the
                                                countries Vokalia and Consonantia, there live the blind texts.</p>
                                            <p class="name">Dennis Green</p>
                                            <span class="position">Guest from italy</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimony-wrap d-flex">
                                        <div class="user-img mb-5"
                                            style="background-image: url({{ URL('assets/web/images/person_2.jpg') }})">
                                            <span class="quote d-flex align-items-center justify-content-center">
                                                <i class="icon-quote-left"></i>
                                            </span>
                                        </div>
                                        <div class="text ml-md-4">
                                            <p class="mb-5">Far far away, behind the word mountains, far from the
                                                countries Vokalia and Consonantia, there live the blind texts.</p>
                                            <p class="name">Dennis Green</p>
                                            <span class="position">Guest from London</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimony-wrap d-flex">
                                        <div class="user-img mb-5"
                                            style="background-image: url({{ URL('assets/web/images/person_3.jpg') }})">
                                            <span class="quote d-flex align-items-center justify-content-center">
                                                <i class="icon-quote-left"></i>
                                            </span>
                                        </div>
                                        <div class="text ml-md-4">
                                            <p class="mb-5">Far far away, behind the word mountains, far from the
                                                countries Vokalia and Consonantia, there live the blind texts.</p>
                                            <p class="name">Dennis Green</p>
                                            <span class="position">Guest from Philippines</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-start mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate">
                    <span class="subheading">Nhà hàng</span>
                    <h2 class="mb-4"><strong>Nhà hàng</strong> Nổi tiếng</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="destination">
                        <a href="#" class="img img-2 d-flex justify-content-center align-items-center"
                            style="background-image: url({{ URL('assets/web/images/restaurant-1.jpg') }});">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-search2"></span>
                            </div>
                        </a>
                        <div class="text p-3">
                            <h3><a href="#">Luxury Restaurant</a></h3>
                            <p class="rate">
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star-o"></i>
                                <span>8 Rating</span>
                            </p>
                            <p>Far far away, behind the word mountains, far from the countries</p>
                            <hr>
                            <p class="bottom-area d-flex">
                                <span><i class="icon-map-o"></i> San Franciso, CA</span>
                                <span class="ml-auto"><a href="#">Discover</a></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="destination">
                        <a href="#" class="img img-2 d-flex justify-content-center align-items-center"
                            style="background-image: url({{ URL('assets/web/images/restaurant-2.jpg') }});">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-search2"></span>
                            </div>
                        </a>
                        <div class="text p-3">
                            <h3><a href="#">Luxury Restaurant</a></h3>
                            <p class="rate">
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star-o"></i>
                                <span>8 Rating</span>
                            </p>
                            <p>Far far away, behind the word mountains, far from the countries</p>
                            <hr>
                            <p class="bottom-area d-flex">
                                <span><i class="icon-map-o"></i> San Franciso, CA</span>
                                <span class="ml-auto"><a href="#">Book Now</a></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="destination">
                        <a href="#" class="img img-2 d-flex justify-content-center align-items-center"
                            style="background-image: url({{ URL('assets/web/images/restaurant-3.jpg') }});">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-search2"></span>
                            </div>
                        </a>
                        <div class="text p-3">
                            <h3><a href="#">Luxury Restaurant</a></h3>
                            <p class="rate">
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star-o"></i>
                                <span>8 Rating</span>
                            </p>
                            <p>Far far away, behind the word mountains, far from the countries</p>
                            <hr>
                            <p class="bottom-area d-flex">
                                <span><i class="icon-map-o"></i> San Franciso, CA</span>
                                <span class="ml-auto"><a href="#">Book Now</a></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="destination">
                        <a href="#" class="img img-2 d-flex justify-content-center align-items-center"
                            style="background-image: url({{ URL('assets/web/images/restaurant-4.jpg') }});">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-search2"></span>
                            </div>
                        </a>
                        <div class="text p-3">
                            <h3><a href="#">Luxury Restaurant</a></h3>
                            <p class="rate">
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star-o"></i>
                                <span>8 Rating</span>
                            </p>
                            <p>Far far away, behind the word mountains, far from the countries</p>
                            <hr>
                            <p class="bottom-area d-flex">
                                <span><i class="icon-map-o"></i> San Franciso, CA</span>
                                <span class="ml-auto"><a href="#">Book Now</a></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-start mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate">
                    <h2><strong>Tin tức</strong> &amp; Nổi bật</h2>
                </div>
            </div>
            <div class="row d-flex">
                @foreach ($ls_bai_viet_noi_bat as $key => $value)
                    <div class="col-md-3 d-flex ftco-animate">
                        <div class="blog-entry align-self-stretch">
                            <a href="{{route('web.tin-tuc.show', ['id'=>$value->id])}}" class="block-20"
                                style="background-image: url({{ URL($value->hinh_anh_bai_viet) }});">
                            </a>
                            <div class="text p-4 d-block">
                                <h3 class="heading mt-3"><a href="{{route('web.tin-tuc.show', ['id'=>$value->id])}}">{{$value->tieu_de}}</a></h3>
                                <div class="meta mb-3">
                                    <div><a href="{{route('web.tin-tuc.show', ['id'=>$value->id])}}">{{$value->created_at}}</a></div>
                                    <div><a>Admin</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="ftco-section-parallax">
        <div class="parallax-img d-flex align-items-center">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                        <h2>Subcribe to our Newsletter</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                            live the blind texts. Separated they live in</p>
                        <div class="row d-flex justify-content-center mt-5">
                            <div class="col-md-8">
                                <form action="#" class="subscribe-form">
                                    <div class="form-group d-flex">
                                        <input type="text" class="form-control" placeholder="Enter email address">
                                        <input type="submit" value="Subscribe" class="submit px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#home').addClass('active');
        });
    </script>
@endsection
