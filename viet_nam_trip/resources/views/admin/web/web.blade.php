@extends('admin.layouts.app')

@section('title', $title)
@section('content')
    @parent
    @if (session()->has('success'))
        <script>
            alert('{{ session()->get('success') }}')
        </script>
    @endif
    <!-- Main -->
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>
                        {{trans('public.info_web')}}

                    </div>
                </div>
            </div>
        </div>
        {{-- Them thông tin --}}
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data"  action="{{$web == null ? route('admin.thong-tin-web.store') : route('admin.thong-tin-web.update', ['id'=>$web->id]) }}">
                            @csrf
                            <div class="position-relative row form-group">
                                <label for=""
                                    class="col-md-3 text-md-right col-form-label">{{ trans('public.img') }}</label>
                                <div class="col-md-9 col-xl-8">
                                    <ul class="text-nowrap" id="images">
                                        <li class="float-left d-inline-block mr-2 mb-2" style="width: 32%;">

                                            <div style="width: 100%; max-height: 100%; overflow: hidden;"
                                                class="hinh">
                                                <img style="width: 100%; cursor: pointer;" class="thumbnail"
                                                    data-toggle="tooltip" title="Click to add image" data-placement="bottom"
                                                    src="{{ URL($web->hinh ?? 'assets/img/add-image-icon.jpg') }}" alt="Add Image">

                                                <input name="hinh" type="file" onchange="changeImg(this);"
                                                    accept="image/x-png,image/gif,image/jpeg"
                                                    class="image form-control-file" style="display: none;">
                                            </div>

                                        </li>
                                    </ul>
                                    <div class="text-center">
                                        @error('hinh')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="ten" class="col-md-3 text-md-right col-form-label">{{trans('public.name')}}</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="ten" id="ten" placeholder="{{trans('public.name')}}" type="text"  class="form-control" value="{{ $web->ten ??  old('ten') }}">
                                    <div class="text-center">
                                        @error('ten')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="position-relative row form-group">
                                <label for="so-dien-thoai" class="col-md-3 text-md-right col-form-label">số điện thoại</label>
                                <div class="col-md-9 col-xl-8">
                                    <input  name="so-dien-thoai" id="so-dien-thoai" placeholder="Số điện thoại"
                                        type="tel" class="form-control" value="{{ $web->so_dien_thoai ?? old('so-dien-thoai') }}" onkeypress="return isNumberKey(event)">

                                    <div class="text-center">
                                        @error('so-dien-thoai')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="web" class="col-md-3 text-md-right col-form-label">web</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="web" id="web" placeholder="web" type="text"
                                        class="form-control" value="{{$web->web ?? old('web') }}">
                                    <div class="text-center">
                                        @error('web')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="email" class="col-md-3 text-md-right col-form-label">email</label>
                                <div class="col-md-9 col-xl-8">
                                    <input  name="email" id="email" placeholder="email" type="email"
                                        class="form-control" value="{{ $web->email ?? old('email') }}">
                                    <div class="text-center">
                                        @error('email')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="dia-chi" class="col-md-3 text-md-right col-form-label">Địa chỉ</label>
                                <div class="col-md-9 col-xl-8">
                                    <input  name="dia-chi" id="dia-chi" placeholder="Địa chỉ" type="text"
                                        class="form-control" value="{{$web->dia_chi ?? old('dia-chi') }}">
                                    <div class="text-center">
                                        @error('dia-chi')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="tieu-de-mo-ta" class="col-md-3 text-md-right col-form-label">Tiêu đề mô tả</label>
                                <div class="col-md-9 col-xl-8">
                                    <input  name="tieu-de-mo-ta" id="tieu-de-mo-ta" placeholder="Tiêu đề mô tả" type="text"
                                        class="form-control" value="{{$web->tieu_de_mo_ta ?? old('tieu-de-mo-ta') }}">
                                    <div class="text-center">
                                        @error('tieu-de-mo-ta')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="mota" class="col-md-3 text-md-right col-form-label">Mô tả</label>
                                <div class="col-md-9 col-xl-8">
                                    <textarea  class="form-control" name="mota" id="mota" placeholder="Mô tả" value="">{{$web->mo_ta ?? old('mota') }}</textarea>
                                    <div class="text-center">
                                        @error('mota')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="tieu-de-noi-dung" class="col-md-3 text-md-right col-form-label">Tiêu đề nội dung</label>
                                <div class="col-md-9 col-xl-8">
                                    <input  name="tieu-de-noi-dung" id="tieu-de-noi-dung" placeholder="Tiêu đề nội dung" type="text"
                                        class="form-control" value="{{$web->tieu_de_noi_dung ?? old('tieu-de-noi-dung') }}">
                                    <div class="text-center">
                                        @error('tieu-de-noi-dung')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="noidung" class="col-md-3 text-md-right col-form-label">Nội dung</label>
                                <div class="col-md-9 col-xl-8">
                                    <textarea  class="form-control" name="noidung" id="noidung" placeholder="Nội dung" value="">{{$web->noi_dung ?? old('noidung') }}</textarea>
                                    <div class="text-center">
                                        @error('noidung')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="nhung-ban-do" class="col-md-3 text-md-right col-form-label">Nhúng bản đồ</label>
                                <div class="col-md-9 col-xl-8">
                                    <textarea class="form-control ckeditor1" id="nhung-ban-do" name="nhung-ban-do" placeholder="Bản đồ" value="">{{ old('nhung-ban-do') }}</textarea>
                                    <div class="text-center">
                                        @error('nhung-ban-do')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-2">
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#thong-tin-shop').addClass('mm-active');
        });
        CKEDITOR.replace('noidung');
        CKEDITOR.replace('mota');
    </script>

@endsection
