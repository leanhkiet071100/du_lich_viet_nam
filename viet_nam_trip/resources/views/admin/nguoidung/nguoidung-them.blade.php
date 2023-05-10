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
                            {{ trans('public.create') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" action="{{ route('admin.nguoi-dung.store') }}">
                            @csrf
                            <div class="position-relative row form-group">
                                <label for="name"
                                    class="col-md-3 text-md-right col-form-label">{{ trans('public.name') }}</label>
                                <div class="col-md-9 col-xl-8">
                                    <input  name="name" id="name" placeholder="{{ trans('public.name') }}"
                                        type="text" class="form-control" value="{{ old('name') }}">
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
                                        class="form-control" value="{{ old('email') }}">
                                    <div class="text-center">
                                        @error('email')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="mat-khau"
                                    class="col-md-3 text-md-right col-form-label">{{ trans('public.password') }}</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="mat-khau" id="mat-khau" placeholder="{{ trans('public.password') }}"
                                        type="password" class="form-control" value="{{ old('mat-khau') }}">
                                    <div class="text-center">
                                        @error('mat-khau')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="so_dien_thoai"
                                    class="col-md-3 text-md-right col-form-label">{{ trans('public.phone_munber') }}</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="so_dien_thoai" id="so_dien_thoai" placeholder="{{ trans('public.phone_munber') }}"
                                        type="text" class="form-control" value="{{ old('so_dien_thoai') }}">
                                    <div class="text-center">
                                        @error('so_dien_thoai')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="role_id"
                                    class="col-md-3 text-md-right col-form-label">{{ trans('public.role') }}</label>
                                <div class="col-md-9 col-xl-8">
                                    <select  name="role_id" id="role_id" class="form-control">
                                        <option value="">{{ trans('public.role') }}</option>
                                        @foreach ($list_cap_nguoi_dung as $key => $role)
                                            <option value="{{ $role->id }}"
                                                {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ $role->ten }}
                                            </option>
                                        @endforeach

                                    </select>
                                      
                                    <div class="text-center">
                                        @error('role_id')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="level"
                                    class="col-md-3 text-md-right col-form-label">{{ trans('public.status') }}</label>
                                <div class="col-md-9 col-xl-8">
                                   
                                    <select  name="status" id="status" class="form-control">
                                        <option value="">{{ trans('public.status') }}</option>
                                        @foreach (\App\User::$statuses as $key => $status)
                                            <option value="{{ $key }}"
                                                {{ old('status') == $key ? 'selected' : '' }}>{{ $status }}
                                            </option>
                                        @endforeach
                                        <div class="text-center">
                                            @error('status')
                                                <span style="color:red"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </select>
                                    
                                </div>
                            </div>

                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-2">
                                    <a href="#" class="border-0 btn btn-outline-danger mr-1">
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
@section('js')
    <script>
        $(document).ready(function() {
            $('#tao-nguoi-dung').addClass('mm-active');
            $('#li-nguoi-dung').addClass('mm-active');
        });
    </script>

@endsection
