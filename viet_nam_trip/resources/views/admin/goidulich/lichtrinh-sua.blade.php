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
                        {{ trans('public.add_travel_packages') }}
                        <div class="page-title-subheading">
                            {{ trans('public.manage_title') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" action="{{ route('admin.lich-trinh.update', ['id'=>$lich_trinh->id,'id_tour'=>$id_tour]) }}">
                            @csrf
                            <div class="position-relative row form-group">
                                <label for="ten"
                                    class="col-md-3 text-md-right col-form-label">{{ trans('public.name') }}</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="ten" id="ten" placeholder="{{ trans('public.name') }}"
                                        type="text" class="form-control" value="{{ old('ten') ?? $lich_trinh->ten }}">
                                    <div class="text-center">
                                        @error('ten')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="ngay-lich-trinh"
                                    class="col-md-3 text-md-right col-form-label">{{ trans('public.departure_day') }}</label>
                                <div class="col-md-9 col-xl-8">
                                    <input type="date" name="ngay-lich-trinh" id="ngay-lich-trinh"
                                        placeholder="Ngày lịch trình" class="form-control"
                                        value="{{ old('ngay-lich-trinh') ?? $lich_trinh->ngay_lich_trinh }}">
                                    <div class="text-center">
                                        @error('ngay-lich-trinh')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="noi-dung" class="col-md-3 text-md-right col-form-label">Nội dung</label>
                                <div class="col-md-9 col-xl-8">
                                    <textarea class="form-control ckeditor1" id="noi-dung" name="noi-dung" placeholder="Thông tin dịch vụ"
                                        value="{{ old('noi-dung') }}">{{ old('noi-dung') ?? $lich_trinh->noi_dung }}</textarea>
                                    <div class="text-center">
                                        @error('noi-dung')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-2">
                                    <a href="{{ URL::previous() }}"
                                        class="border-0 btn btn-outline-danger mr-1">
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
    <script type="text/javascript">
        function format_curency(a) {
            //xóa dấu phẩy
            a.value = a.value.replaceAll(',', '');
            // định dạng tiền
            a.value = a.value.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
        }

        $(document).ready(function() {
            $('#tao-goi-du-lich').addClass('mm-active');
            $('#li-goi-du-lich').addClass('mm-active');

        });

        function iszero(e) {
            if (!((e.keyCode > 95 && e.keyCode < 106) ||
                    (e.keyCode > 47 && e.keyCode < 58) ||
                    e.keyCode == 8)) {
                return false;
            }
        }
        CKEDITOR.replace('noi-dung');
    </script>
@endsection
