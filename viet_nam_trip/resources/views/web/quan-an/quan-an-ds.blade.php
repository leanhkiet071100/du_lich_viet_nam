@extends('web.layouts.app')

@section('content')
    @parent
    {{-- @include('web.includes.banner') --}}
    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 sidebar">
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
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        @foreach ($quan_ans as $key => $value)
                            <div class="col-md-4 ftco-animate">
                                <div class="destination">
                                    <a href="{{route('web.quan-an.show', ['id'=>$value->id])}}"
                                        class="img img-2 d-flex justify-content-center align-items-center"
                                        style="background-image: url({{URL($value->hinh_quan_an)}});">
                                        <div class="icon d-flex justify-content-center align-items-center">
                                            <span class="icon-search2"></span>
                                        </div>
                                    </a>
                                    <div class="text p-3">
                                        <div class="d-flex">
                                            <div class="one">
                                                <h3><a href="{{route('web.quan-an.show', ['id'=>$value->id])}}">{{$value->ten_quan_an}}</a></h3>
                                            </div>
                                        </div>
                                        <p>{!!$value->mo_ta!!}</p>
                                        <hr>
                                        <p class="bottom-area d-flex">
                                            <span><i class="icon-map-o"></i>{{$value->dia_chi}}, {{$value->tinh}}, {{$value->huyen}}, {{$value->xa}}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach


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
