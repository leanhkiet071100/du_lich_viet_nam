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
                        {{$title}}
                        <div class="page-title-subheading">
                            {{trans('public.manage_title')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" action="{{route('admin.vai-tro-nguoi-dung.store')}}">
                            @csrf
                            <div class="position-relative row form-group">
                                <label for="name" class="col-md-3 text-md-right col-form-label">{{trans('public.name')}}</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="name" id="name" placeholder="tên" type="text"
                                        class="form-control" value="{{ old('name') }}">
                                    <div class="text-center">
                                        @error('name')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="chucdanh" class="col-md-3 text-md-right col-form-label">{{trans('public.subtitle')}}</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="chuc-danh" id="chuc-danh" placeholder="vd: nhân viên kế toán" type="text"
                                        class="form-control" value="{{ old('chuc-danh') }}">
                                    <div class="text-center">
                                        @error('chuc-danh')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div> 
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="isadmin" class="col-md-3 text-md-right col-form-label"></label>
                                <div class="col-md-9 col-xl-8">
                                    <div class="form-group mb-1">
                                        <label class="custom-switch pl-0">
                                            <input id="isAdmin" type="checkbox" name="is_admin" class="custom-switch-input section-parent" >
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">{{trans('public.is_admin')}}</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-2">
                                    <a href="/admin/vai-tro-nguoi-dung" class="border-0 btn btn-outline-danger mr-1">
                                        <span class="btn-icon-wrapper pr-1 opacity-8">
                                            <i class="fa fa-times fa-w-20"></i>
                                        </span>
                                        <span>{{trans('public.cancel')}}</span>
                                    </a>
                                    <button type="submit" class="btn-shadow btn-hover-shine btn btn-primary">
                                        <span class="btn-icon-wrapper pr-2 opacity-8">
                                            <i class="fa fa-download fa-w-20"></i>
                                        </span>
                                        <span>{{trans('public.save')}}</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#tao-vai-tro-nguoi-dung').addClass('mm-active');
            $('#li-vai-tro-nguoi-dung').addClass('mm-active');
        });
    </script>
@endsection
