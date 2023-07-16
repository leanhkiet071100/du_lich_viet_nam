@extends('web.layouts.app')

@section('content')
    @parent
    {{-- @include('web.includes.banner') --}}
    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-12 ftco-animate">
                            <div class="single-slider owl-carousel">
                                <div class="item">
                                    <div class="hotel-img" style="background-image: url({{ URL($quan_an->hinh_quan_an) }});">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 hotel-single mt-4 mb-5 ftco-animate">
                            <h2>{{ $quan_an->ten_quan_an }}</h2>
                            <p class="rate mb-5">
                                <span class="loc"><a href="#"><i class="icon-map"></i> {{ $quan_an->dia_chi }},
                                        {{ $quan_an->tinh }}, {{ $quan_an->huyen }}, {{ $quan_an->xa }}</a></span>

                            </p>
                            {!! $quan_an->mo_ta !!}

                            <div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
                                <h4 class="mb-4">Món ăn</h4>
                                <div class="row">
                                    @foreach ($mon_ans as $key => $value)
                                        <div class="col-md-4">
                                            <div class="destination">
                                                <a href="hotel-single.html" class="img img-2"
                                                    style="background-image: url({{ URL($value->hinh_mon_an) }}); background-size: 100% 100%;""></a>
                                                <div class="text p-3">
                                                    <div class="d-flex">
                                                        <div class="one">
                                                            <h3><a href="hotel-single.html">{{ $value->ten_mon }}</a></h3>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <p class="bottom-area d-flex">
                                                        <span
                                                            class="price per-price">{{ number_format($value->gia_ban) }}<small>/phần</small></span>
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


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
