@extends('web.layouts.app')

@section('content')
    @parent
    @include('web.includes.banner')
    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-12 ftco-animate">
                            <div class="single-slider owl-carousel">
                                <div class="item">
                                    <div class="hotel-img"
                                        style="background-image: url({{ URL($goi_du_lich->hinh_goi_du_lich ?? 'hinh_test/no-img.jpg') }}); background-size: 100% 100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 hotel-single mt-4 mb-5 ftco-animate">
                            <div class="row">
                                <div class="col-md-6 col-12 left">
                                    <span>Our Best hotels &amp; Rooms</span>
                                    <h2><b>{{ $goi_du_lich->ten }}</b></h2>
                                    <p class="rate mb-5">
                                        <span class="star">
                                            @for ($i = 0; $i < 5; $i++)
                                                @if ($i < $goi_du_lich->sao)
                                                    <i class="icon-star"></i>
                                                @else
                                                    <i class="icon-star-o"></i>
                                                @endif
                                            @endfor
                                        </span>
                                    </p>
                                </div>
                                <div class="col-md-6 col-12 right">
                                    <div class="group-price">
                                        <div class="sale-price">
                                            <p><span class="price">{{ number_format($goi_du_lich->gia_nguoi_lon) }}</span>/ khách</p>
                                        </div>
                                        <div class="saving">
                                        </div>
                                    </div>
                                    <div class="group-add-cart">
                                        <a href="{{route('web.tour.booking', ['id'=>$goi_du_lich->id])}}" class="add-to-cart" data-bs-toggle="modal"
                                            data-bs-target="#supportModal">
                                            <i class="fa fa-shopping-cart"></i>
                                            <label>Đặt ngay</label>
                                        </a>
                                        <a href="" class="add-to-group" data-bs-toggle="modal"
                                            data-bs-target="#supportModal">
                                            <label>Liên hệ tư vấn</label>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-12 left">
                                    <p class="s-title-03 tour-des"></p>
                                    <div class="box-order">
                                        <div class="time">
                                            <p>Khởi hành: <b>{{ date('d/m/Y', strtotime($goi_du_lich->ngay_khoi_hanh)) }} -
                                                    Giờ đi: {{ date('h:i', strtotime($goi_du_lich->ngay_khoi_hanh)) }}</b>
                                            </p>
                                            <p>Tập trung:
                                                <b>{{ date('d/m/Y h:i', strtotime($goi_du_lich->thoi_gian_tap_trung)) }}</b>
                                            </p>
                                            <p>Thời gian: <b>{{ $goi_du_lich->so_ngay ?? '' }} Ngày
                                                    {{ $goi_du_lich->so_dem ?? '' }} Đêm</b></p>
                                            <p>Nơi khởi hành: <b>{{ $goi_du_lich->noi_khoi_hanh }}</b></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($ls_lich_trinh->count() > 0)
                            <section class="section-07 mb-5">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4 col-12 left">
                                            @foreach ($ls_lich_trinh as $key => $value)
                                                <div class="go-tour">
                                                    <div class="day day-02">
                                                        <div class="wrapper">
                                                            <span class="date-left"> Ngày </span>
                                                            <span class="date-center active">{{ $key + 1 }}</span>
                                                            <span class="date-right">
                                                                <span
                                                                    class="date">{{ date('d/m/Y', strtotime($value->ngay_lich_trinh)) }}</span>
                                                                <span class="location">{{ $value->ten }}</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="col-md-8 col-12 right timeline-section">
                                             @foreach ($ls_lich_trinh as $key => $value)
                                            <div>
                                                <h3 id="day-01">{{$value->ten}}</h3>
                                                <div class="excerpt">
                                                    <span class="line"></span>
                                                    <title></title>
                                                    <div style="text-align:justify">
                                                        <div style="margin-right:6px; text-align:justify">
                                                            <p>{!!$value->noi_dung!!}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <script defer=""
                                                        src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816"
                                                        integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw=="
                                                        data-cf-beacon="{&quot;rayId&quot;:&quot;7df51bdf3a3da084&quot;,&quot;token&quot;:&quot;c819403ca40043b799392ce067ae0095&quot;,&quot;version&quot;:&quot;2023.4.0&quot;,&quot;si&quot;:100}"
                                                        crossorigin="anonymous"></script>


                                                </div>
                                                <div class="group-services hashCode d-none">
                                                    <div class="item">
                                                        <i class="icon icon--calendar"></i>
                                                        <label>Khách sạn</label>
                                                        <p>VinOasis Phú Quốc</p>
                                                    </div>
                                                    <div class="item">
                                                        <i class="icon icon--fire"></i>
                                                        <label>Bữa ăn</label>
                                                        <p>1 bửa trưa, 1 bửa tối.</p>
                                                    </div>
                                                    <div class="item">
                                                        <i class="icon icon--map"></i>
                                                        <label>Điểm tham quan</label>
                                                        <p>1 địa điểm</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </section>
                        @endif
                        <div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
                            <h4 class="mb-4">Các tour nổi bật</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="destination">
                                        <a href="hotel-single.html" class="img img-2"
                                            style="background-image: url(images/room-4.jpg);"></a>
                                        <div class="text p-3">
                                            <div class="d-flex">
                                                <div class="one">
                                                    <h3><a href="hotel-single.html">Hotel, Italy</a></h3>
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
                                <div class="col-md-4">
                                    <div class="destination">
                                        <a href="hotel-single.html" class="img img-2"
                                            style="background-image: url(images/room-5.jpg);"></a>
                                        <div class="text p-3">
                                            <div class="d-flex">
                                                <div class="one">
                                                    <h3><a href="hotel-single.html">Hotel, Italy</a></h3>
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
                                <div class="col-md-4">
                                    <div class="destination">
                                        <a href="hotel-single.html" class="img img-2"
                                            style="background-image: url(images/room-6.jpg);"></a>
                                        <div class="text p-3">
                                            <div class="d-flex">
                                                <div class="one">
                                                    <h3><a href="hotel-single.html">Hotel, Italy</a></h3>
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
                        <div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
                            <h4 class="mb-5">Check Availability &amp; Booking</h4>
                            <div class="fields">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" id="checkin_date" class="form-control"
                                                placeholder="Date from">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" id="checkin_date" class="form-control"
                                                placeholder="Date to">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="select-wrap one-third">
                                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                <select name="" id="" class="form-control"
                                                    placeholder="Guest">
                                                    <option goi_du_lich="0">Guest</option>
                                                    <option goi_du_lich="1">1</option>
                                                    <option goi_du_lich="2">2</option>
                                                    <option goi_du_lich="3">3</option>
                                                    <option goi_du_lich="4">4</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="select-wrap one-third">
                                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                <select name="" id="" class="form-control"
                                                    placeholder="Children">
                                                    <option goi_du_lich="0">Children</option>
                                                    <option goi_du_lich="1">1</option>
                                                    <option goi_du_lich="2">2</option>
                                                    <option goi_du_lich="3">3</option>
                                                    <option goi_du_lich="4">4</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="submit" goi_du_lich="Check Availability"
                                                class="btn btn-primary py-3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
                            <h4 class="mb-4">Review &amp; Ratings</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <form method="post" class="star-rating">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star"></i><i
                                                            class="icon-star"></i><i class="icon-star"></i><i
                                                            class="icon-star"></i><i class="icon-star"></i> 100
                                                        Ratings</span></p>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star"></i><i
                                                            class="icon-star"></i><i class="icon-star"></i><i
                                                            class="icon-star"></i><i class="icon-star-o"></i> 30
                                                        Ratings</span></p>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star"></i><i
                                                            class="icon-star"></i><i class="icon-star"></i><i
                                                            class="icon-star-o"></i><i class="icon-star-o"></i> 5
                                                        Ratings</span></p>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star"></i><i
                                                            class="icon-star"></i><i class="icon-star-o"></i><i
                                                            class="icon-star-o"></i><i class="icon-star-o"></i> 0
                                                        Ratings</span></p>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star"></i><i
                                                            class="icon-star-o"></i><i class="icon-star-o"></i><i
                                                            class="icon-star-o"></i><i class="icon-star-o"></i> 0
                                                        Ratings</span></p>
                                            </label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 hotel-single ftco-animate mb-5 mt-5">
                            <h4 class="mb-4">Related Hotels</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="destination">
                                        <a href="hotel-single.html" class="img img-2"
                                            style="background-image: url(images/hotel-1.jpg);"></a>
                                        <div class="text p-3">
                                            <div class="d-flex">
                                                <div class="one">
                                                    <h3><a href="hotel-single.html">Hotel, Italy</a></h3>
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
                                <div class="col-md-4">
                                    <div class="destination">
                                        <a href="hotel-single.html" class="img img-2"
                                            style="background-image: url(images/hotel-2.jpg);"></a>
                                        <div class="text p-3">
                                            <div class="d-flex">
                                                <div class="one">
                                                    <h3><a href="hotel-single.html">Hotel, Italy</a></h3>
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
                                <div class="col-md-4">
                                    <div class="destination">
                                        <a href="hotel-single.html" class="img img-2"
                                            style="background-image: url(images/hotel-3.jpg);"></a>
                                        <div class="text p-3">
                                            <div class="d-flex">
                                                <div class="one">
                                                    <h3><a href="hotel-single.html">Hotel, Italy</a></h3>
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

                    </div>
                </div> <!-- .col-md-8 -->
            </div>
        </div>
    </section> <!-- .section -->
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#hotel').addClass('active');
        });
    </script>
@endsection
