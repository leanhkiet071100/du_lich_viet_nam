@extends('web.layouts.app')

@section('content')
    @parent
    @include('web.includes.banner')
    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 sidebar">
                    <div class="sidebar-wrap bg-light ftco-animate">
                        <h3 class="heading mb-4">Tìm tour</h3>
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
                                            <input type="number" value="0" min="0" max="{{ $max_tien }}" />
                                            -
                                            <input type="number" value="{{ $max_tien }}" min="0"
                                                max="{{ $max_tien }}" />
                                        </span>
                                        <input value="1000" min="0" max="{{ $max_tien }}" step="500"
                                            type="range" />
                                        <input value="{{ $max_tien }}" min="0" max="{{ $max_tien }}"
                                            step="500" type="range" />
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
                        <div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="sao-5"
                                    @if (request()->get('sao-5') == 'on') checked @endif>
                                <label class="form-check-label" for="exampleCheck1">
                                    <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i
                                                class="icon-star"></i><i class="icon-star"></i><i
                                                class="icon-star"></i></span></p>
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="sao-4"
                                    @if (request()->get('sao-4') == 'on') checked @endif>
                                <label class="form-check-label" for="exampleCheck1">
                                    <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i
                                                class="icon-star"></i><i class="icon-star"></i><i
                                                class="icon-star-o"></i></span></p>
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="sao-3"
                                    @if (request()->get('sao-3') == 'on') checked @endif>
                                <label class="form-check-label" for="exampleCheck1">
                                    <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i
                                                class="icon-star"></i><i class="icon-star-o"></i><i
                                                class="icon-star-o"></i></span></p>
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="sao-2"
                                    @if (request()->get('sao-2') == 'on') checked @endif>
                                <label class="form-check-label" for="exampleCheck1">
                                    <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i
                                                class="icon-star-o"></i><i class="icon-star-o"></i><i
                                                class="icon-star-o"></i></span></p>
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="sao-1"
                                    @if (request()->get('sao-1') == 'on') checked @endif>
                                <label class="form-check-label" for="exampleCheck1">
                                    <p class="rate"><span><i class="icon-star"></i><i class="icon-star-o"></i><i
                                                class="icon-star-o"></i><i class="icon-star-o"></i><i
                                                class="icon-star-o"></i></span></p>
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        @foreach ($ls_goi_du_lich as $key => $value)
                            <div class="col-md-4 ftco-animate">
                                <div class="destination destination-tour">
                                    <a href="{{route('web.tour.show', ['id'=>$value->id])}}"
                                        class="img img-2 d-flex justify-content-center align-items-center"
                                        style="background-image: url({{ URL($value->hinh_goi_du_lich ?? 'hinh_test/no-img.jpg') }}); background-size: 100% 100%;">
                                        <div class="icon d-flex justify-content-center align-items-center">
                                            <span class="icon-search2"></span>
                                        </div>
                                    </a>
                                    <div class="text p-3">
                                        <div class="">
                                            <div class="">
                                                <h3 class="h3"><b><a href="{{route('web.tour.show', ['id'=>$value->id])}}">{{ $value->ten }}</a></b></h3>
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
                                        <p>Loại: <b>{{$value->ten_loai_goi_du_lich}}</b></p>
                                        <p>Nơi khởi hành: <b>{{$value->noi_khoi_hanh}}</b></p>
                                        <p>Giá: <b style="font-weight: 700; color: #fd5056; font-size: 18px;">{{number_format($value->gia_nguoi_lon)}}</b></p>
                                        <hr>
                                        <p class="bottom-area d-flex">
                                            <span> {{date('d/m/Y', strtotime($value->ngay_khoi_hanh));}}-{{$value->so_ngay}} ngày</span>
                                            <span class="ml-auto"><a href="#">Đặt ngay</a></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row mt-5">
                        <div class="col text-center">
                            <div class="block-27">
                                <ul>
                                    <li><a href="#">&lt;</a></li>
                                    <li class="active"><span>1</span></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">&gt;</a></li>
                                </ul>
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
