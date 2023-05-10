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
                        {{ $title }}
                        <div class="page-title-subheading">
                            {{ trans('public.manage_user') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" action="{{route('admin.nguoi-dung.update',['id'=>$nguoi_dung->id])}}">
                            @csrf
                            <div class="position-relative row form-group">
                                <label for="image" class="col-md-3 text-md-right col-form-label">{{trans('public.avatar')}}</label>
                                <div class="col-md-9 col-xl-8">
                                    <img style="height: 200px; cursor: pointer;" class="thumbnail rounded-circle"
                                        data-toggle="tooltip" title="Click to change the image" data-placement="bottom"
                                        src="{{ URL($nguoi_dung->hinh_dai_dien ?? 'assets/img/_default-user.png') }}"
                                        alt="Avatar">
                                    <input name="image" type="file" onchange="changeImg(this)"
                                        class="image form-control-file" style="display: none;" value="">
                                    {{-- <input type="hidden" name="image" value=""> --}}
                                    <small class="form-text text-muted">
                                        kích vào hình để chọn ảnh
                                    </small>
                                </div>
                                <div class="text-center">
                                        @error('image')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="name"
                                    class="col-md-3 text-md-right col-form-label">{{ trans('public.name') }}</label>
                                <div class="col-md-9 col-xl-8">
                                    <input  name="name" id="name" placeholder="Name" type="text"
                                        class="form-control" value="{{ old('name') ?? $nguoi_dung->ten }}">
                                    <div class="text-center">
                                        @error('name')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="position-relative row form-group">
                                <label for="email"
                                    class="col-md-3 text-md-right col-form-label">{{ trans('public.email') }}</label>
                                <div class="col-md-9 col-xl-8">
                                    <input  name="email" id="email" placeholder="Email" type="email"
                                        class="form-control" value="{{old('email') ?? $nguoi_dung->email }}">
                                    <div class="text-center">
                                        @error('email')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                            <div class="position-relative row form-group">
                                <label for="so_dien_thoai"
                                    class="col-md-3 text-md-right col-form-label">{{ trans('public.phone_munber') }}</label>
                                <div class="col-md-9 col-xl-8">
                                    <input  name="so_dien_thoai" id="so_dien_thoai" type="tel"
                                        placeholder="{{ trans('public.phone_munber') }}" class="form-control"
                                        value="{{old('so_dien_thoai') ?? $nguoi_dung->so_dien_thoai }}">
                                    <div class="text-center">
                                        @error('so_dien_thoai')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="level"
                                    class="col-md-3 text-md-right col-form-label">{{ trans('public.role') }}</label>
                                <div class="col-md-9 col-xl-8">
                                    <select  name="role_id" id="role_id" class="form-control">

                                        @foreach ($list_cap_nguoi_dung as $key => $value)
                                            <option
                                                value="{{ $value->id }} "@if ($nguoi_dung->cap_id == $value->id) selected @endif>
                                                {{ $value->ten }} </option>
                                        @endforeach
                                    </select>
                                    <div class="text-center">
                                        @error('role_id')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-2">
                                    <a href="{{ url()->previous() }}" class="border-0 btn btn-outline-danger mr-1">
                                        <span class="btn-icon-wrapper pr-1 opacity-8">
                                            <i class="fa fa-times fa-w-20"></i>
                                        </span>
                                        <span>{{ trans('public.cancel') }}</span>
                                    </a>

                                    <button type="submit" class="btn-shadow btn-hover-shine btn btn-primary">
                                        <span class="btn-icon-wrapper pr-2 opacity-8">
                                            <i class="fa fa-download fa-w-20"></i>
                                        </span>
                                        <span>{{ trans('public.save') }}</span>
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

@section('content')
    <p>This is my body content.</p>
@endsection
