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
                            {{ trans('public.manage_title') }}
                        </div>
                    </div>
                </div>

                <div class="page-title-actions">
                    <a href="{{ Route('admin.vai-tro-nguoi-dung.create') }}" class="btn-shadow btn-hover-shine mr-3 btn btn-primary">
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
                    <div class="card-header">

                        {{-- <div class="btn-actions-pane-right">
                            <div role="group" class="btn-group-sm btn-group">
                                <button class="btn btn-focus">This week</button>
                                <button class="active btn btn-focus">Anytime</button>
                            </div>
                        </div> --}}
                    </div>

                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center" width="5%">{{ trans('public.STT') }}</th>
                                    <th class="text-center">{{ trans('public.name') }}</th>
                                    <th class="text-center">{{ trans('public.role') }}</th>
                                    <th class="text-center">{{ trans('public.is_admin') }}</th>
                                    <th class="text-center">{{ trans('public.create_date') }}</th>
                                    <th class="text-center">{{ trans('public.function') }}</th>
                                </tr>
                            </thead>
                            <tbody id="table-dsnhanhieu">
                                @foreach ($roles as $key => $value)
                                    <tr>
                                        <td class="text-center text-muted">{{($key+1)}}</td>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading text-center">{{ $value->ten }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading text-center">{{ $value->chuc_danh }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading text-center">
                                                            @if ($value->is_admin)
                                                                <span class="text-success fas fa-check"></span>
                                                            @else
                                                                <span class="text-danger fas fa-times"></span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading text-center">{{ date('j/m/Y', strtotime($value->created_at))}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{route('admin.vai-tro-nguoi-dung.edit',['id'=>$value->id])}}" data-toggle="tooltip" title="Edit"
                                                data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                                <span class="btn-icon-wrapper opacity-8">
                                                    <i class="fa fa-edit fa-w-20"></i>
                                                </span>
                                            </a>
                                            <form class="d-inline" action="{{route('admin.vai-tro-nguoi-dung.destroy',['id'=>$value->id])}}" method="post">
                                                <button class="btn btn-hover-shine btn-outline-danger border-0 btn-sm"
                                                    type="submit" data-toggle="tooltip" title="Delete"
                                                    data-placement="bottom" onclick="return confirm('Bạn có muốn xóa')">
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
                        {{ $roles->appends(request()->input())->links('pagination::bootstrap-4') }}
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
            $('#vai-tro-nguoi-dung').addClass('mm-active');
            $('#li-vai-tro-nguoi-dung').addClass('mm-active');
        });
    </script>

@endsection
