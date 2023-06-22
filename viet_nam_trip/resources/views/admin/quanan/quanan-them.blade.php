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
                        {{ trans('public.add_location') }}
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
                        <form method="post" enctype="multipart/form-data" action="{{ route('admin.quan-an.store') }}">
                            @csrf
                            <div class="position-relative row form-group">
                                <label for=""
                                    class="col-md-3 text-md-right col-form-label">{{ trans('public.img') }}</label>
                                <div class="col-md-9 col-xl-8">
                                    <ul class="text-nowrap" id="images">
                                        <li class="float-left d-inline-block mr-2 mb-2" style="width: 32%;">

                                            <div style="width: 100%; max-height: 100%; overflow: hidden;"
                                                class="hinh">
                                                <img style="width: 100%; cursor: pointer;" class="thumbnail"
                                                    data-toggle="tooltip" title="Click to add image" data-placement="bottom"
                                                    src="{{ URL(old('hinh') ?? 'assets/img/add-image-icon.jpg') }}" alt="Add Image">

                                                <input name="hinh" type="file" onchange="changeImg(this);"
                                                    accept="image/x-png,image/gif,image/jpeg"
                                                    class="image form-control-file" style="display: none;">
                                            </div>

                                        </li>
                                    </ul>
                                    <div class="text-center">
                                        @error('hinh')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="ten"
                                    class="col-md-3 text-md-right col-form-label">{{ trans('public.name') }}</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="ten" id="ten" placeholder="Tên quán ăn" type="text" class="form-control" value="{{ old('ten') }}">
                                    <div class="text-center">
                                        @error('ten')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="position-relative row form-group">
                                <label for="so-dien-thoai"
                                    class="col-md-3 text-md-right col-form-label">{{ trans('public.phone_munber') }}</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="so-dien-thoai" id="so-dien-thoai" placeholder="Số điện thoại" type="text" class="form-control" value="{{ old('so-dien-thoai') }}" onkeypress="return isNumberKey(event)">
                                    <div class="text-center">
                                        @error('so-dien-thoai')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="position-relative row form-group">
                                <label for="dia_diem_id"
                                    class="col-md-3 text-md-right col-form-label">{{ trans('public.location') }}</label>
                                <div class="col-md-9 col-xl-8">
                                    <div class="">
                                        <select name="dia_diem_id" class="form-select select-dia-diem-id" aria-label="Default select example" data-type="dia_diem_id">
                                            <option>{{ trans('public.location') }}</option>
                                            @foreach ($ls_dia_diem as $key => $value)
                                                <option {{ old('dia_diem_id') == $value->id ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->ten_dia_diem }}</option>
                                            @endforeach

                                        </select>
                                         <div class="text-center">
                                            @error('dia_diem_id')
                                                <span style="color:red"> {{ $message }}</span>
                                             @enderror
                                         </div>
                                    </div>
                                </div>

                            </div>

                            <div class="position-relative row form-group">
                                <label for="ten" class="col-md-3 text-md-right col-form-label"></label>
                                <div class="col-md-9 col-xl-8">
                                    <div class="row tinh-huyen-xa">
                                        <div class="">
                                            <select name="tinh" class="form-select js-location" aria-label="Default select example" data-type="tinh" id="js-location-tinh js-location">
                                                <option value="0">{{ trans('public.conscious') }}</option>
                                                @foreach ($tinh as $key => $value)
                                                    <option {{ old('tinh') == $value->id ? 'selected' : '' }} parent_id="{{$value->id}}" value="{{ $value->id }}">{{ $value->ten }}</option>
                                                @endforeach

                                            </select>
                                            <div class="text-center">
                                                @error('tinh')
                                                    <span style="color:red"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="huyen">
                                            <select name="huyen"  {{ old('huyen') == null ? 'disabled' : '' }}  id="js-location-huyen" class="form-select js-location" aria-label="Default select example" data-type="huyen">
                                                @if ( old('huyen') == null)
                                                    <option selected>{{ trans('public.district') }}</option>
                                                @else
                                                    @foreach ($huyen as $key => $value)
                                                        <option {{ old('huyen') == $value->id ? 'selected' : '' }} parent_id="{{$value->id}}" value="{{ $value->id }}">{{ $value->ten }}</option>
                                                    @endforeach
                                                @endif


                                            </select>
                                            <div class="text-center">
                                                @error('huyen')
                                                    <span style="color:red"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="xa">
                                            <select name="xa" {{ old('xa') == null ? 'disabled' : '' }} class="form-select js-location-xa" aria-label="Default select example" data-type="xa" id="js-location-xa" >
                                                @if ( old('xa') == null)
                                                    <option selected>{{ trans('public.commune') }}</option>
                                                @else
                                                    @foreach ($xa as $key => $value)
                                                        <option {{ old('xa') == $value->id ? 'selected' : '' }} parent_id="{{$value->id}}" value="{{ $value->id }}">{{ $value->ten }}</option>
                                                    @endforeach
                                                @endif

                                            </select>
                                            <div class="text-center">
                                                @error('xa')
                                                    <span style="color:red"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="dia-chi"
                                    class="col-md-3 text-md-right col-form-label">{{ trans('public.specific_address') }}</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="dia-chi" id="dia-chi"
                                        placeholder="{{ trans('public.specific_address') }}" type="text"
                                        class="form-control" value="{{ old('dia-chi') }}">
                                    <div class="text-center">
                                        @error('dia-chi')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-2">
                                    <a href="{{ route('admin.quan-an.index') }}"
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
        $(document).ready(function() {
            $('#san-pham').addClass('mm-active');
            $('#li-san-pham').addClass('mm-active');

        });

        $('.js-location').change(function(e) {
            e.preventDefault();
            let $this = $(this);
            var parent_id = $this.val();
            var type = $this.attr('data-type');
            var formData = new FormData();
            formData.append('parent_id', parent_id);
            formData.append('type', type);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if (type == "tinh") {
                $.ajax({
                    url: "{{ route('admin.dia-diem.get-load-huyen') }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        //console.log(data);
                        $('#js-location-huyen').html('');
                        $.each(data.data, function(key, item) {
                            $('#js-location-huyen').append(
                                '<option  value="' + (item.id) + '" >' + item.ten +'</option>'
                            );
                        });
                        $('#js-location-xa').html('');
                        $('#js-location-xa').append('<option selected>Xã</option>')
                        var huyen = document.getElementById('js-location-huyen');
                        huyen.disabled = false;
                        var xa = document.getElementById('js-location-xa');
                        xa.disabled = true;

                    }
                });
            } else if (type == "huyen") {
                $.ajax({
                    url: "{{ route('admin.dia-diem.get-load-xa') }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $('#js-location-xa').html('');
                        $.each(data.data, function(key, item) {
                            $('#js-location-xa').append(
                                '<option value="' + (item.id) + '" >' + item.ten + '</option>'
                            );
                        });
                        var xa = document.getElementById('js-location-xa');
                        xa.disabled = false;
                    }
                });
            }

        })
    </script>
@endsection
