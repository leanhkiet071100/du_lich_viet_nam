    <!-- Main -->
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <form action="" method="get" class="mb-0">
                        <div class="input-group">
                            <input type="text" name="search_mon" id="search" placeholder="Search everything"
                                class="form-control" value="{{ request()->get('search_mon') }}">
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-search"></i>&nbsp;
                                    {{ trans('public.search') }}
                                </button>
                            </span>
                        </div>
                    </form>
                    <div class="btn-actions-pane-right">
                        <div class="page-title-actions">
                            <a class="btn-shadow btn-hover-shine mr-3 btn btn-primary" onclick="hien_form_loai_san_pham({{$quan_an->id}})">
                                <span class="btn-icon-wrapper pr-2 opacity-7">
                                    <i class="fa fa-plus fa-w-20"></i>
                                </span>
                                {{ trans('public.create') }}
                            </a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center" width="5%">{{ trans('public.STT') }}</th>
                                <th class="text-center" width="20%">{{ trans('public.img') }}</th>
                                <th class="text-center" width="30%">{{ trans('public.name') }}</th>
                                <th class="text-center" width="20%">Giá bán</th>
                                <th class="text-center">{{ trans('public.function') }}</th>
                            </tr>
                        </thead>
                        <tbody id="table-dsnhanhieu">
                            @foreach ($ls_mon_an as $key => $value)
                                <tr>
                                    <td class="text-center text-muted">{{ $key + 1 }} </td>
                                    <td class="td-hinh">
                                        <div class="widget-content-center ">
                                            <img style="height: 60px; width: 60px" data-toggle="tooltip" title="Image" data-placement="bottom" src="{{ URL($value->hinh_mon_an ?? 'hinh_test/no-img.jpg') }}"
                                                alt="">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading text-center">{{ $value->ten_mon ?? 'chưa có' }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading text-center">{{ number_format($value->gia_ban) ?? 'chưa có' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a data-url="{{ route('admin.mon-an.edit', ['id' => $value->id, 'idquan'=>$quan_an->id]) }}" data-toggle="tooltip" title="Edit" data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm edit_nhanhieu" id="edit_nhanhieu">
                                            <span class="btn-icon-wrapper opacity-8">
                                                <i class="fa fa-edit fa-w-20"></i>
                                            </span>
                                        </a>
                                        <form class="d-inline" action="" method="post">
                                            <button
                                                class="delete_nhanhieu btn btn-hover-shine btn-outline-danger border-0 btn-sm "
                                                type="button" data-toggle="tooltip" title="Delete"
                                                data-placement="bottom" value="' + item.id +'" id="delete_nhanhieu"
                                                data-url="{{ route('admin.mon-an.destroy', ['id' => $value->id]) }}">
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
                    {{ $ls_mon_an->appends(request()->all())->links('pagination::bootstrap-4') }}
                </div>

            </div>
        </div>
    </div>
    @section('create')
        <div class="create-nhan-hieu" id="create-nhan-hieu">

        </div>
    @endsection
