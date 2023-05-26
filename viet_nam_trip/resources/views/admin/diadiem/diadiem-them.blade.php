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
                        {{trans('public.add_location')}}
                        <div class="page-title-subheading">
                           {{trans('public.manage_title')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" action="{{ route('admin.dia-diem.create') }}">
                            @csrf
                            <div class="position-relative row form-group">
                                <label for="product_category_id" class="col-md-3 text-md-right col-form-label">{{trans('public.type_location')}}</label>
                                <div class="col-md-9 col-xl-8">
                                    <select required name="loaisp_id" id="product_category_id" class="form-control">
                                        <option value="">-- {{trans('public.type_location')}} --</option>
                                        @foreach ($ls_loai_dia_diem as $key => $value)
                                            <option value={{ $value->id }}>
                                                {{ $value->ten }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="text-center">
                                        @error('loaisp_id')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="ten" class="col-md-3 text-md-right col-form-label">{{trans('public.name')}}</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="ten" id="ten" placeholder="Tên địa danh" type="text"
                                        class="form-control" value="{{ old('ten') }}">
                                    <div class="text-center">
                                        @error('ten')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="position-relative row form-group">
                                <label for="noidung" class="col-md-3 text-md-right col-form-label">Nội dung</label>
                                <div class="col-md-9 col-xl-8">
                                    <textarea required class="form-control" name="noidung" id="noidung" placeholder="Nội dung"
                                        value="{{ old('noidung') }}">{{ old('noidung') }}</textarea>
                                    <div class="text-center">
                                        @error('noidung')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="mota" class="col-md-3 text-md-right col-form-label">Mô tả</label>
                                <div class="col-md-9 col-xl-8">
                                    <textarea required class="form-control ckeditor1" id="mota" name="mota" placeholder="Mô tả"
                                        value="{{ old('mota') }}">{{ old('mota') }}</textarea>
                                    <div class="text-center">
                                        @error('mota')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-2">
                                    <a href="{{ route('admin.dia-diem.index') }}" class="border-0 btn btn-outline-danger mr-1">
                                        <span class="btn-icon-wrapper pr-1 opacity-8">
                                            <i class="fa fa-times fa-w-20"></i>
                                        </span>
                                        <span>{{trans('public.cancel')}}}</span>
                                    </a>

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
        function format_curency(a) {
            //xóa dấu phẩy
            a.value = a.value.replaceAll(',', '');
            // định dạng tiền
            a.value = a.value.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
        }

        $(document).ready(function() {
            $('#san-pham').addClass('mm-active');
            $('#li-san-pham').addClass('mm-active');

        });
        CKEDITOR.replace('mota');
        CKEDITOR.replace('noidung');
    </script>
@endsection
