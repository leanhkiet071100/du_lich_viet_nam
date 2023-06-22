@extends('web.layouts.app')

@section('content')
    @parent
    @include('web.includes.banner')
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row d-flex">
                @foreach ($ls_bai_viet as $key=>$value )
                <div class="col-md-3 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="{{route('web.bai-viet.show', ['id'=>$value->id])}}" class="block-20" style="background-image: url({{URL($value->hinh_anh_bai_viet ?? 'hinh_test/blog.jpg')}}); background-size: 100% 100%; width: 255px;">
                        </a>
                        <div class="text p-4 d-block">
                            <span class="tag">Tips, Travel</span>
                            <h3 class="heading mt-3"><a href="{{route('web.bai-viet.show', ['id'=>$value->id])}}">{{$value->tieu_de}}</a></h3>
                            <div class="meta mb-3">
                                <div><a href="#">{{date('d/m/Y', strtotime($value->created_at))}}</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- <div class="col-md-3 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="blog-single.html" class="block-20" style="background-image: url('images/image_8.jpg');">
                        </a>
                        <div class="text p-4">
                            <span class="tag">Tips, Travel</span>
                            <h3 class="heading mt-3"><a href="#">Even the all-powerful Pointing has no control about
                                    the blind texts</a></h3>
                            <div class="meta mb-3">
                                <div><a href="#">August 12, 2018</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                       {{ $ls_bai_viet->appends(request()->all())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#blog').addClass('active');
        });
    </script>
@endsection
