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

                <div class="page-title-actions">
                    <a href="{{ route('admin.nguoi-dung.create') }}" class="btn-shadow btn-hover-shine mr-3 btn btn-primary">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-plus fa-w-20"></i>
                        </span>
                        {{ trans('public.create') }}
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="get" class="mb-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="input-lable">{{ trans('public.search') }}</label>
                                            <input type="text" name="title" class="form-control"
                                                value="{{ request()->get('title') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for=""
                                                class="input-lable">{{ trans('public.start_date') }}</label>
                                            <input type="date" name="form" id="form" class="form-control"
                                                value="{{ request()->get('form') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="" class="input-lable">{{ trans('public.end_date') }}</label>
                                            <input type="date" name="to" id="to" class="form-control"
                                                value="{{ request()->get('to') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="input-lable">{{ trans('public.email') }}</label>
                                            <input type="text" name="email" class="form-control"
                                                value="{{ request()->get('email') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="" class="input-lable">{{ trans('public.role') }}</label>
                                            <select  name="role_id" id="role_id" class="form-control">
                                                <option value="">{{ trans('public.role') }}</option>
                                                @foreach ($list_cap_nguoi_dung as $key => $role)
                                                    <option value="{{ $role->id }}"
                                                        {{request()->get('role_id') == $role->id ? 'selected' : '' }}>{{ $role->ten }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="" class="input-lable">{{ trans('public.status') }}</label>
                                            <select  name="status" id="status" class="form-control">
                                                <option value="">{{ trans('public.status') }}</option>
                                                @foreach (\App\User::$statuses as $key => $status)
                                                    <option value="{{ $key }}"
                                                        {{ request()->get('status') == $key ? 'selected' : '' }}>
                                                        {{ $status }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group mt-1">
                                            <label for="" class="input-lable"></label>
                                            <input type="submit" class="form-control text-center btn btn-success w-100"
                                                value="{{ trans('public.search_results') }}">
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">

                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th>{{ trans('public.full_name') }}</th>
                                    <th class="text-center">{{ trans('public.email') }}</th>
                                    <th class="text-center">{{ trans('public.role') }}</th>
                                    <th class="text-center">{{ trans('public.status') }}</th>
                                    <th class="text-center">{{ trans('public.function') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_nguoi_dung as $key => $value)
                                    <tr>
                                        <td class="text-center text-muted">{{ $key + 1 }}</td>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    {{-- <div class="widget-content-left mr-3">
                                                        <div class="widget-content-left">
                                                            <img width="40" class="rounded-circle" data-toggle="tooltip"
                                                                title="Image" data-placement="bottom"
                                                                src="assets/images/_default-user.png" alt="">
                                                        </div>
                                                    </div> --}}
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading">{{$value->ten}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">{{$value->email}}</td>
                                        <td class="text-center">
                                            @foreach ($list_cap_nguoi_dung as $key => $role)
                                                @if ($value->cap_id == $role->id)
                                                    {{$role->ten}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            @switch($value->trang_thai)
                                                @case(1)
                                                    <div class="badge badge-success mt-2">{{trans('public.active')}}</div>
                                                    @break
                                                @case(2)
                                                    <div class="badge badge-warning mt-2">{{trans('public.delay_active')}}</div>
                                                    @break
                                                @case(3)
                                                    <div class="badge badge-danger mt-2">{{trans('public.no_active')}}</div>
                                                    @break
                                                @default

                                            @endswitch
                                        </td>
                                        <td class="text-center">
                                            <a href="{{route('admin.nguoi-dung.show',['id'=>$value->id])}}"
                                                class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                                                {{trans('public.details')}}
                                            </a>
                                            <a href="{{route('admin.nguoi-dung.edit',['id'=>$value->id])}}" data-toggle="tooltip" title="Edit"
                                                data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                                <span class="btn-icon-wrapper opacity-8">
                                                    <i class="fa fa-edit fa-w-20"></i>
                                                </span>
                                            </a>
                                            <form class="d-inline" action="" method="post">
                                                <button class="btn btn-hover-shine btn-outline-danger border-0 btn-sm"
                                                    type="submit" data-toggle="tooltip" title="Delete"
                                                    data-placement="bottom"
                                                    onclick="return confirm('Do you really want to delete this item?')">
                                                    <span class="btn-icon-wrapper opacity-8">
                                                        <i class="fa fa-trash fa-w-20"></i>
                                                    </span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="d-block card-footer">
                        {{ $list_nguoi_dung->appends(request()->all())->links('pagination::bootstrap-4') }}
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
            $('#list-nguoi-dung').addClass('mm-active');
            $('#li-nguoi-dung').addClass('mm-active');
        });
    </script>

@endsection
