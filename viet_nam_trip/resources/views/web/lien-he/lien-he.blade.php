@extends('web.layouts.app')

@section('content')
    @parent
    @include('web.includes.banner')
    <section class="ftco-section contact-section ftco-degree-bg">
        <div class="container">
            <div class="row d-flex mb-5 contact-info">
                <div class="col-md-12 mb-4">
                    <h2 class="h4">{{trans('web.info_contact')}}</h2>
                </div>
                <div class="w-100"></div>
                <div class="col-md-3">
                    <p><span>{{trans('public.Address')}}: </span> {{$web->dia_chi}}</p>
                </div>
                <div class="col-md-3">
                    <p><span>{{trans('public.phone_munber')}}:</span> <a href="tel://1234567920">{{$web->so_dien_thoai}}</a></p>
                </div>
                <div class="col-md-3">
                    <p><span>Email:</span> <a href="mailto:info@yoursite.com">{{$web->email}}</a></p>
                </div>
                <div class="col-md-3">
                    <p><span>Website:</span> <a href="{{route('web.trang-chu.index')}}">{{$web->web}}</a></p>
                </div>
            </div>
            <div class="row block-9">
                <div class="col-md-6 pr-md-5">
                    <form action="#">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>

                </div>

                <div class="col-md-6" id="map"></div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#contact').addClass('active');
        });
    </script>
@endsection
