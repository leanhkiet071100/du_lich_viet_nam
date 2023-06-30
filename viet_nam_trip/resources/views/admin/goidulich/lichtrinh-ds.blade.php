    <!-- Main -->
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <form action="" method="get" class="mb-0">
                        <div class="input-group">
                            <input type="text" name="search" id="search" placeholder="Search everything"
                                class="form-control" value="{{ request()->get('search') }}">
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
                            <a class="btn-shadow btn-hover-shine mr-3 btn btn-primary"
                                href="{{ route('admin.lich-trinh.create', ['id_tour' => $goi_du_lich->id]) }}">
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
                                <th class="text-center">{{ trans('public.name') }}</th>
                                <th class="text-center">Ngày lịch trình</th>
                                <th class="text-center">{{ trans('public.function') }}</th>
                            </tr>
                        </thead>
                        <tbody id="table-dsnhanhieu">
                            @foreach ($ls_lich_trinh as $key => $value)
                                <tr>
                                    <td class="text-center text-muted">{{ $key + 1 }} </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading text-center">
                                                        {{ $value->ten ?? 'chưa có' }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading text-center">
                                                        {{ date('d/m/Y', strtotime($value->ngay_lich_trinh)) ?? 'chưa có' }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.lich-trinh.edit', ['id' => $value->id, 'id_tour' => $goi_du_lich->id]) }}"
                                            data-toggle="tooltip" title="Edit" data-placement="bottom"
                                            class="btn btn-outline-warning border-0 btn-sm edit_nhanhieu">
                                            <span class="btn-icon-wrapper opacity-8">
                                                <i class="fa fa-edit fa-w-20"></i>
                                            </span>
                                        </a>
                                        <form class="d-inline" action="" method="post">
                                            <button class=" btn btn-hover-shine btn-outline-danger border-0 btn-sm "
                                                type="button" data-toggle="tooltip" title="Delete"
                                                data-placement="bottom"
                                                data-url="{{ route('admin.lich-trinh.destroy', ['id' => $value->id, 'id_tour' => $goi_du_lich->id]) }}">
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
                    {{ $ls_lich_trinh->appends(request()->all())->links('pagination::bootstrap-4') }}
                </div>

            </div>
        </div>
    </div>
    @section('create')
        <div class="create-nhan-hieu" id="create-nhan-hieu">

        </div>
    @endsection
