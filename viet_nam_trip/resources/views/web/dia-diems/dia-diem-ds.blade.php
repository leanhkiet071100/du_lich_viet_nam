@extends('web.layouts.app')

@section('content')
    @parent
    @include('web.includes.banner')
    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 sidebar ftco-animate">
                    <form action="" method="get">
                        <div class="sidebar-wrap bg-light ftco-animate">
                            <h3 class="heading mb-4">Tìm kiếm</h3>
                            <div>
                                <div class="fields">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="{{trans('public.name')}}" name="ten" value="{{ request()->get('ten') }}">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="{{trans('public.tourist_season')}}" name="mua-du-lich" value="{{ request()->get('mua-du-lich') }}">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="{{trans('public.conscious')}}" name="tinh" value="{{ request()->get('tinh') }}">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="{{trans('public.district')}}" name="huyen" value="{{ request()->get('huyen') }}">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="{{trans('public.commune')}}" name="xa" value="{{ request()->get('xa') }}">
                                    </div>{{--
                                    <div class="form-group">
                                        <input type="submit" value="Search" class="btn btn-primary py-3 px-5">
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-wrap bg-light ftco-animate">
                            <h3 class="heading mb-4">Star Rating</h3>
                            <div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="sao-5" @if( request()->get('sao-5')  == 'on') checked @endif>
                                    <label class="form-check-label" for="exampleCheck1">
                                        <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i
                                                    class="icon-star"></i><i class="icon-star"></i><i
                                                    class="icon-star"></i></span></p>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="sao-4" @if( request()->get('sao-4')  == 'on') checked @endif>
                                    <label class="form-check-label" for="exampleCheck1">
                                        <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i
                                                    class="icon-star"></i><i class="icon-star"></i><i
                                                    class="icon-star-o"></i></span></p>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="sao-3" @if( request()->get('sao-3')  == 'on') checked @endif>
                                    <label class="form-check-label" for="exampleCheck1">
                                        <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i
                                                    class="icon-star"></i><i class="icon-star-o"></i><i
                                                    class="icon-star-o"></i></span></p>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="sao-2" @if( request()->get('sao-2')  == 'on') checked @endif>
                                    <label class="form-check-label" for="exampleCheck1">
                                        <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i
                                                    class="icon-star-o"></i><i class="icon-star-o"></i><i
                                                    class="icon-star-o"></i></span></p>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="sao-1" @if( request()->get('sao-1')  == 'on') checked @endif>
                                    <label class="form-check-label" for="exampleCheck1">
                                        <p class="rate"><span><i class="icon-star"></i><i class="icon-star-o"></i><i
                                                    class="icon-star-o"></i><i class="icon-star-o"></i><i
                                                    class="icon-star-o"></i></span></p>
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="sidebar-wrap bg-light ftco-animate">
                            <div class="form-group">
                                <input type="submit" value="Search" class="btn btn-primary py-3 px-5">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        @foreach ($lsdiadiem as $key => $value)
                            <div class="col-md-4 ftco-animate">
                                <div class="destination">
                                    <a href="{{route('web.dia-diem.show', ['id'=>$value->id])}}" class="img img-2 d-flex justify-content-center align-items-center"
                                        style="background-image: url({{ URL($value->hinh_anh_dia_diem) }}); background-size: 100% 100%;">
                                        <div class="icon d-flex justify-content-center align-items-center">
                                            <span class="icon-search2"></span>
                                        </div>
                                    </a>
                                    <div class="text p-3">
                                        <div class="d-flex">
                                            <div class="one">
                                                <h3><a href="{{route('web.dia-diem.show', ['id'=>$value->id])}}">{{$value->ten_dia_diem}}</a></h3>
                                                <p class="rate">
                                                    @for($i = 0; $i < 5; $i++)
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
                                        {!! $value->mo_ta !!}
                                        <hr>
                                        <p class="bottom-area d-flex">
                                            <span class="ml-auto"><a href="{{route('web.dia-diem.show', ['id'=>$value->id])}}">{{trans('web.discover')}}</a></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row mt-5">
                        <div class="col text-center">
                            <div class="block-27">
                                {{ $lsdiadiem->appends(request()->all())->links('pagination::bootstrap-4') }}
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
        $('#location').addClass('active');
    });

</script>

@endsection
