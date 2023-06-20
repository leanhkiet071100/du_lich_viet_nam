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

                <div class="page-title-actions">
                    <a href="{{ Route('admin.tin-tuc.create') }}" class="btn-shadow btn-hover-shine mr-3 btn btn-primary">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-plus fa-w-20"></i>
                        </span>
                        {{trans('public.create')}}
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('success'))
                    <div class="alert alert-success success text-center" id="success" style="font-size:50px ">
                        {{ session()->get('success') }}
                    </div>
                @endif
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
                                    {{-- <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="" class="input-lable">{{ trans('public.author') }}</label>
                                            <input type="text" name="author_id" id="author_id" class="form-control"
                                                value="{{ request()->get('author_id') }}">
                                        </div>
                                    </div> --}}
                                    <div class="col-md-3">
                                        <div class="form-group form-group-checked">
                                            <label for="" class="input-lable">{{ trans('public.presently') }}</label>
                                            <input type="checkbox" name="hien" id="hien" class="form-control" @if(request()->get('hien', null) == 'on') checked="checked" @endif>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group form-group-checked">
                                            <label for="" class="input-lable">{{ trans('public.outstanding') }}</label>
                                            <input type="checkbox" name="noi-bat" id="status" class="form-control" @if(request()->get('noi-bat', null) == 'on') checked="checked" @endif>
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
                                    <th class="text-center">{{ trans('public.STT') }}</th>
                                    <th class="text-center">{{ trans('public.title') }}</th>
                                    <th class="text-center">{{ trans('public.presently') }}</th>
                                    <th class="text-center">{{ trans('public.outstanding') }}</th>
                                    {{-- <th class="text-center">Featured</th> --}}
                                    <th class="text-center">{{ trans('public.function') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($lstintuc as $key => $value)
                                    <tr>
                                        <td class="text-center text-muted">{{ $key + 1 }}</td>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <div class="widget-content-left">
                                                            <img style="height: 60px; width:60px;" data-toggle="tooltip"
                                                                title="Image" data-placement="bottom"
                                                                src="{{ URL($value->hinh_anh_bai_viet) }}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading title-table">{{ $value->tieu_de }}</div>
                                                        {{-- <div class="widget-subheading opacity-7">
                                                            {{ $value->ten_san_pham }}
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="td-radio">
                                            <div class=" check-magana text-center td-radio">
                                                {{-- <input class="form-check-input" type="checkbox" value=""\
                                                    id="defaultCheck1"> --}}
                                                <input type="checkbox" id="check-hien{{ $value->id }}"
                                                    @if ($value->hien == 1) checked @endif
                                                    onchange="bai_viet_hien({{ $value->id }})">
                                            </div>
                                        </td>
                                        <td class="td-radio">
                                            <div class=" check-magana text-center td-radio">
                                                {{-- <input class="form-check-input" type="checkbox" value=""\
                                                    id="defaultCheck1"> --}}
                                                <input type="checkbox" id="check-noi-bat{{ $value->id }}"
                                                    @if ($value->noi_bat == 1) checked @endif
                                                    onchange="bai_viet_noi_bat({{ $value->id }})">
                                            </div>
                                        </td>

                                        <td class="text-center">
                                            {{-- <a href="" class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                                                Chi tiết
                                            </a> --}}
                                            <a href="{{route("admin.tin-tuc.edit",['id'=>$value->id])}}" data-toggle="tooltip" title="Edit"
                                                data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                                <span class="btn-icon-wrapper opacity-8">
                                                    <i class="fa fa-edit fa-w-20"></i>
                                                </span>
                                            </a>
                                            <form class="d-inline" action="{{ route('admin.tin-tuc.destroy', ['id' => $value->id]) }}"  method="GET">

                                                <button class="btn btn-hover-shine btn-outline-danger border-0 btn-sm"
                                                    type="submit" data-toggle="tooltip" title="Delete"
                                                    data-placement="bottom"
                                                    onclick="return confirm('Bạn có chắc muốn xóa?')">
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
                        {{ $lstintuc->appends(request()->all())->links('pagination::bootstrap-4') }}
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
            $('#tin-tuc').addClass('mm-active');
            $('#li-tin-tuc').addClass('mm-active');
        });

        function bai_viet_hien($id) {
            var check = document.getElementById("check-hien" + $id).checked;
            var formData = new FormData();
            var url = "{{ route('admin.bai-viet.hien', '') }}" + '/' + $id;
            formData.append('check', check);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    //window.location.reload(); load lại trang
                    console.log(data)
                }
            });

        }

          function bai_viet_noi_bat($id) {
                var check = document.getElementById("check-noi-bat" + $id).checked;

                var formData = new FormData();
                var url = "{{ route('admin.bai-viet.noi-bat', '') }}" + '/' + $id;
                formData.append('check', check);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        //window.location.reload(); load lại trang
                        console.log(data)
                    }
                });
            }
    </script>
@endsection
