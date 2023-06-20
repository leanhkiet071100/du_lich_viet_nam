@extends('web.layouts.app')

@section('content')
    @parent
    @include('web.includes.banner')
    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                {{-- <div class="col-lg-3 sidebar">
                    <div class="sidebar-wrap bg-light ftco-animate">
                        <h3 class="heading mb-4">Find City</h3>
                        <form action="#">
                            <div class="fields">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Destination, City">
                                </div>
                                <div class="form-group">
                                    <div class="select-wrap one-third">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="" id="" class="form-control"
                                            placeholder="Keyword search">
                                            <option value="">Select Location</option>
                                            <option value="">San Francisco USA</option>
                                            <option value="">Berlin Germany</option>
                                            <option value="">Lodon United Kingdom</option>
                                            <option value="">Paris Italy</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="checkin_date" class="form-control" placeholder="Date from">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="checkin_date" class="form-control" placeholder="Date to">
                                </div>
                                <div class="form-group">
                                    <div class="range-slider">
                                        <span>
                                            <input type="number" value="25000" min="0" max="120000" /> -
                                            <input type="number" value="50000" min="0" max="120000" />
                                        </span>
                                        <input value="1000" min="0" max="120000" step="500" type="range" />
                                        <input value="50000" min="0" max="120000" step="500" type="range" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Search" class="btn btn-primary py-3 px-5">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-wrap bg-light ftco-animate">
                        <h3 class="heading mb-4">Star Rating</h3>
                        <form method="post" class="star-rating">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">
                                    <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i
                                                class="icon-star"></i><i class="icon-star"></i><i
                                                class="icon-star"></i></span></p>
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">
                                    <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i
                                                class="icon-star"></i><i class="icon-star"></i><i
                                                class="icon-star-o"></i></span></p>
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">
                                    <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i
                                                class="icon-star"></i><i class="icon-star-o"></i><i
                                                class="icon-star-o"></i></span></p>
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">
                                    <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i
                                                class="icon-star-o"></i><i class="icon-star-o"></i><i
                                                class="icon-star-o"></i></span></p>
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">
                                    <p class="rate"><span><i class="icon-star"></i><i class="icon-star-o"></i><i
                                                class="icon-star-o"></i><i class="icon-star-o"></i><i
                                                class="icon-star-o"></i></span></p>
                                </label>
                            </div>
                        </form>
                    </div>
                </div> --}}
                <div class="col-lg-12">
                    <div class="">
                        <div class="col-md-12 ftco-animate">
                            <div class="single-slider owl-carousel">
                                @foreach ($ls_dia_diem_hinh as $key => $value)
                                    <div class="item">
                                        <div class="hotel-img" style="background-image: url({{ URL($value->ten) }});">
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                        <div class="col-md-12 hotel-single mt-4 mb-5 ftco-animate">
                            {{-- <span>Our Best hotels &amp; Rooms</span> --}}
                            <h2>{{ $dia_diem->ten_dia_diem }}</h2>
                            <p class="rate mb-5">
                                <span class="loc"><a href="#"><i
                                            class="icon-map"></i>{{ $dia_diem->chi_tiet_dia_chi }},
                                        {{ $dia_diem->xa }},{{ $dia_diem->huyen }}, {{ $dia_diem->tinh }}</a></span>
                                <span class="star">
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($i < $dia_diem->sao)
                                            <i class="icon-star"></i>
                                        @else
                                            <i class="icon-star-o"></i>
                                        @endif
                                    @endfor
                                    8 Rating
                                </span>
                            </p>
                            <p>{!! $dia_diem->noi_dung !!}</p>
                        </div>
                        {{-- <div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
                            <h4 class="mb-4">Take A Tour</h4>
                            <div class="block-16">
                                <figure>
                                    <img src="images/hotel-6.jpg" alt="Image placeholder" class="img-fluid">
                                    <a href="https://vimeo.com/45830194" class="play-button popup-vimeo"><span
                                            class="icon-play"></span></a>
                                </figure>
                            </div>
                        </div> --}}
                        @if ($ls_dia_diem_noi_bat != null)
                            <div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
                                <h4 class="mb-4">{{ trans('web.prominent_place') }}</h4>
                                <div class="row">
                                    @foreach ($ls_dia_diem_noi_bat as $key => $value)
                                        <div class="col-md-4">
                                            <div class="destination">
                                                <a href="{{ route('web.dia-diem.show', ['id' => $value->id]) }}"
                                                    class="img img-2"
                                                    style="background-image: url({{ URL($value->hinh_anh_dia_diem) }});"></a>
                                                <div class="text p-3">
                                                    <div class="d-flex">
                                                        <div class="one">
                                                            <h3><a
                                                                    href="{{ route('web.dia-diem.show', ['id' => $value->id]) }}">{{ $value->ten_dia_diem }}</a>
                                                            </h3>
                                                            <p class="rate">
                                                                @for ($i = 0; $i < 5; $i++)
                                                                    @if ($i < $value->sao)
                                                                        <i class="icon-star"></i>
                                                                    @else
                                                                        <i class="icon-star-o"></i>
                                                                    @endif
                                                                @endfor
                                                                <span>8 Rating</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <p>{!! $value->mo_ta !!}</p>
                                                    <hr>
                                                    <p class="bottom-area d-flex">
                                                        <span class="ml-auto"><a
                                                                href="{{ route('web.dia-diem.show', ['id' => $value->id]) }}">{{ trans('web.discover') }}</a></span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        @endif
                        {{-- bình luận --}}
                        @include('web.dia-diems.dia-diem-danh-gia-ds')
                        {{-- booking --}}
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
                                                    <option value="0">Guest</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
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
                                                    <option value="0">Children</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="submit" value="Check Availability" class="btn btn-primary py-3">
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
    <div class="form" id="form">

    </div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('#location').addClass('active');
    });

    function hien_form_danh_gia(id) {
        var form_danh_gia = document.getElementById("form");
        var url =   "{{ route('web.dia-diem.danh-gia', '') }}" + '/' + id;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: 'GET',
            // data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                add_them_layout();
                form.style.display = "block";
                $('#form').html("");
                $('#form').append(data);

            }
        });
    }

    function hien_form_bai_viet(id) {
        var form_danh_gia = document.getElementById("form");
        var url =   "{{ route('web.dia-diem.bai-viet', '') }}" + '/' + id;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: 'GET',
            // data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                add_them_layout();
                form.style.display = "block";
                $('#form').html("");
                $('#form').append(data);

            }
        });
    }
</script>
@endsection
