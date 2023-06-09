@extends('admin.layouts.app')

@section('title', 'mạng xã hội')
@section('content')
    @parent
    <!-- Main -->
    <div class="app-main__inner">

        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>
                        {{ $pageTitle }}
                        <div class="page-title-subheading">
                            {{ trans('public.manage_title') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body display_data">
                        <div class="position-relative row form-group">
                            <label for="" class="col-md-3 text-md-right col-form-label">{{trans('public.img')}}</label>
                            <div class="col-md-9 col-xl-8">
                                <ul class="text-nowrap overflow-auto" id="images">
                                    <li class="d-inline-block mr-1" style="position: relative;">
                                        <img style="height: 150px;" src="{{URL($dia_diem->hinh_anh_dia_diem ?? 'assets\img\no-img.jpg')}}" alt="Image">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="brand_id" class="col-md-3 text-md-right col-form-label">{{trans('public.list_img')}}</label>
                            <div class="col-md-9 col-xl-8">
                                <p><a href="{{route('admin.dia-diem-hinh.index',['id'=>$dia_diem->id])}}">{{trans('public.list_img')}}</a></p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="name"
                                class="col-md-3 text-md-right col-form-label">{{ trans('public.name') }}</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $dia_diem->ten_dia_diem }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="price"
                                class="col-md-3 text-md-right col-form-label">{{ trans('public.tourist_season') }}</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $dia_diem->mua_du_lich }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="discount"
                                class="col-md-3 text-md-right col-form-label">{{ trans('public.Address') }}</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $dia_diem->chi_tiet_dia_chi }}, {{ $dia_diem->xa }}, {{ $dia_diem->huyen }},
                                    {{ $dia_diem->tinh }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="content"
                                class="col-md-3 text-md-right col-form-label">{{ trans('public.content') }}</label>
                            <div class="col-md-9 col-xl-8">
                                <p id=>{!! $dia_diem->noi_dung == null ? 'Chưa có nội dung' : $dia_diem->noi_dung !!}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="description"
                                class="col-md-3 text-md-right col-form-label">{{ trans('public.describe') }}</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{!! $dia_diem->mo_ta == null ? 'Chưa có mô tả' : $dia_diem->mo_ta !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dia-diem').addClass('mm-active');
            $('#li-dia-diem').addClass('mm-active');
        });
    </script>
@endsection
