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
                        <form method="post" enctype="multipart/form-data" action="{{ route('admin.goi-du-lich.store') }}">
                            @csrf
                            <div class="position-relative row form-group">
                                <label for=""
                                    class="col-md-3 text-md-right col-form-label">{{ trans('public.img') }}</label>
                                <div class="col-md-9 col-xl-8">
                                    <ul class="text-nowrap" id="images">
                                        <li class="float-left d-inline-block mr-2 mb-2" style="width: 32%;">

                                            <div style="width: 100%; max-height: 100%; overflow: hidden;"
                                                class="hinh-goi-du-lich">
                                                <img style="width: 100%; cursor: pointer;" class="thumbnail"
                                                    data-toggle="tooltip" title="Click to add image" data-placement="bottom"
                                                    src="{{ URL('assets/img/add-image-icon.jpg') }}" alt="Add Image">

                                                <input name="hinh-goi-du-lich" type="file" onchange="changeImg(this);"
                                                    accept="image/x-png,image/gif,image/jpeg"
                                                    class="image form-control-file" style="display: none;">
                                            </div>

                                        </li>
                                    </ul>

                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="product_category_id"
                                    class="col-md-3 text-md-right col-form-label">{{ trans('public.category_travel_packages') }}</label>
                                <div class="col-md-9 col-xl-8">
                                    <select name="loaisp_id" id="product_category_id" class="form-control">
                                        <option value="">-- {{ trans('public.category_travel_packages') }} --</option>
                                        @foreach ($ls_loai_goi_du_lich as $key => $value)
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
                                <label for="ten"
                                    class="col-md-3 text-md-right col-form-label">{{ trans('public.name') }}</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="ten" id="ten" placeholder="{{ trans('public.name') }}"
                                        type="text" class="form-control" value="{{ old('ten') }}">
                                    <div class="text-center">
                                        @error('ten')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="quoc-gia"
                                    class="col-md-3 text-md-right col-form-label">{{ trans('public.nation') }}</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="quoc-gia" placeholder="{{ trans('public.nation') }}" type="text"
                                        class="form-control" value="{{ old('quoc-gia') }}">
                                    <div class="text-center">
                                        @error('quoc-gia')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="noi-khoi-hanh"
                                    class="col-md-3 text-md-right col-form-label">{{ trans('public.departure_location') }}</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="noi-khoi-hanh" id="noi-khoi-hanh"
                                        placeholder="{{ trans('public.departure_location') }}" type="text"
                                        class="form-control" value="{{ old('noi-khoi-hanh') }}">
                                    <div class="text-center">
                                        @error('noi-khoi-hanh')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="tap-trung"
                                    class="col-md-3 text-md-right col-form-label">{{ trans('public.concentrate') }}</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="tap-trung" id="tap-trung" placeholder="{{ trans('public.concentrate') }}"
                                        type="datetime-local" class="form-control" value="{{ old('tap-trung') }}">
                                    <div class="text-center">
                                        @error('tap-trung')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="so-nguoi-toi-da"
                                    class="col-md-3 text-md-right col-form-label">{{ trans('public.maximum_number_of_people') }}</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="so-nguoi-toi-da" id="so-nguoi-toi-da"
                                        placeholder="{{ trans('public.maximum_number_of_people') }}" type="number"
                                        class="form-control" value="{{ old('so-nguoi-toi-da') }}">
                                    <div class="text-center">
                                        @error('so-nguoi-toi-da')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="gio-khoi-hanh"
                                    class="col-md-3 text-md-right col-form-label">{{ trans('public.departure_time') }}</label>
                                <div class="col-md-9 col-xl-6">
                                    <input name="gio-khoi-hanh" id="gio-khoi-hanh"
                                        placeholder="{{ trans('public.departure_time') }}" type="text" class="form-control" value="{{ old('gio-khoi-hanh') }}" onfocus="(this.type='time')" id="gio-khoi-hanh" onchange="gio()">

                                    <div class="text-center">
                                        @error('gio-khoi-hanh')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2 ">
                                    <input disabled placeholder="00:00" type="text" class="form-control text-center"
                                        value="{{old('gio-khoi-hanh')}}" id="value-gio-khoi-hanh">
                                </div>
                            </div>


                            <div class="position-relative row form-group">
                                <label for="gia"
                                    class="col-md-3 text-md-right col-form-label">{{ trans('public.price') }}</label>
                                <div class="col-md-9 col-xl-7">
                                    <input name="gia" id="gia" placeholder="{{ trans('public.price') }}" type="text" class="form-control" value="{{ old('ngay-khoi-hanh') }}" onchange="format_curency(this)" onkeypress="return isNumberKey(event)">
                                    <div class="text-center">
                                        @error('gia')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-1 ">
                                    <input disabled placeholder="Product Name" type="text"
                                        class="form-control text-center" value="VNĐ">
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="ngay-khoi-hanh" class="col-md-3 text-md-right col-form-label">{{trans('public.departure_day')}}</label>
                                <div class="col-md-9 col-xl-8">
                                    <input  type="date"  name="ngay-khoi-hanh" id="ngay-khoi-hanh" placeholder="{{trans('public.departure_day')}}" class="form-control" value="{{ old('ngay-khoi-hanh') }}" >
                                    <div class="text-center">
                                        @error('ngay-khoi-hanh')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="so-ngay-du-lich" class="col-md-3 text-md-right col-form-label">{{trans('public.number_of_travel_days')}}</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="so-ngay-du-lich" id="so-ngay-du-lich" placeholder="{{trans('public.number_of_travel_days')}}" type="number"
                                        class="form-control" value="{{ old('so-ngay-du-lich') }}"
                                        onkeypress="return isNumberKey(event)" max="100" min="0">
                                    <div class="text-center">
                                        @error('so-ngay-du-lich')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="mota" class="col-md-3 text-md-right col-form-label">{{trans('public.describe')}}</label>
                                <div class="col-md-9 col-xl-8">
                                    <textarea class="form-control ckeditor1" id="mota" name="mota" placeholder="{{trans('public.describe')}}"
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
                                    <a href="{{ route('admin.dia-diem.index') }}"
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

        function gio() {
            var gio = document.getElementById('thoi-gian-mo');
            // alert(thoi_gian_dong.value);
            var value_hoi_gian_mo = document.getElementById('value-thoi-gian-mo');
            value_hoi_gian_mo.value = gio.value;
        }
        CKEDITOR.replace('mota');
    </script>
@endsection
