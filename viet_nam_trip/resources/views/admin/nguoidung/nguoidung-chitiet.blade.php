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

        <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
            <li class="nav-item">
                <a href="{{route('admin.nguoi-dung.edit',['id'=>$nguoi_dung->id])}}" class="nav-link">
                    <span class="btn-icon-wrapper pr-2 opacity-8">
                        <i class="fa fa-edit fa-w-20"></i>
                    </span>
                    <span>{{ trans('public.edit') }}</span>
                </a>
            </li>

            <li class="nav-item delete">
                <form action="" method="post">
                    <button class="nav-link btn" type="submit"
                        onclick="return confirm('Do you really want to delete this item?')">
                        <span class="btn-icon-wrapper pr-2 opacity-8">
                            <i class="fa fa-trash fa-w-20"></i>
                        </span>
                        <span>{{ trans('public.delete') }}</span>
                    </button>
                </form>
            </li>
        </ul>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body display_data">
                        <div class="position-relative row form-group">
                            <label for="image" class="col-md-3 text-md-right col-form-label">Avatar</label>
                            <div class="col-md-9 col-xl-8">

                                <img style="height: 200px;" class="rounded-circle" data-toggle="tooltip" title="Avatar"
                                    data-placement="bottom"
                                    src="{{ URL($nguoi_dung->hinh_dai_dien ?? 'assets/img/person.png') }}" alt="Avatar">


                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label">
                                {{ trans('public.name') }}
                            </label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $nguoi_dung->ten }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="email"
                                class="col-md-3 text-md-right col-form-label">{{ trans('public.email') }}</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $nguoi_dung->email }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="phone"
                                class="col-md-3 text-md-right col-form-label">{{ trans('public.phone_munber') }}</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $nguoi_dung->so_dien_thoai ?? 'không có số điện thoại' }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="level"
                                class="col-md-3 text-md-right col-form-label">{{ trans('public.role') }}</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $nguoi_dung->ten_vai_tro }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="level"
                                class="col-md-3 text-md-right col-form-label">{{ trans('public.status') }}</label>
                            <div class="col-md-9 col-xl-8">
                                @switch($nguoi_dung->trang_thai)
                                    @case(1)
                                        <div class="badge badge-success mt-2">{{ trans('public.active') }}</div>
                                    @break

                                    @case(2)
                                        <div class="badge badge-warning mt-2">{{ trans('public.delay_active') }}</div>
                                    @break

                                    @case(3)
                                        <div class="badge badge-danger mt-2">{{ trans('public.no_active') }}</div>
                                    @break

                                    @default
                                @endswitch
                            </div>
                        </div>

                        {{-- <div class="position-relative row form-group">
                            <label for="description" class="col-md-3 text-md-right col-form-label">Description</label>
                            <div class="col-md-9 col-xl-8">
                                <p>description</p>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection
