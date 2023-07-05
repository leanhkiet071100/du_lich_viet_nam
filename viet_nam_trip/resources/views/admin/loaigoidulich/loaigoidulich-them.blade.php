<!-- Main -->
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <form action="" id="formthemnhanhieu" method="post"
                    data-url={{ route('admin.loai-goi-du-lich.store') }}>
                    @csrf

                    <p class="text-center title">Thêm {{ trans('public.category_travel_packages') }}</p>
                    <div class="position-relative row form-group">
                        <label for="name"
                            class="col-md-3 text-md-right col-form-label">{{ trans('public.name') }}</label>
                        <div class="col-md-9 col-xl-8">
                            <input name="tennhanhieu" id="tennhanhieu"
                                placeholder="{{ trans('public.category_travel_packages') }}" type="text"
                                class="form-control" value="">
                        </div>

                    </div>
                    <div style="color: red" class="error text-center" name="error-tennhanhieu" id="error-tennhanhieu">

                    </div>

                    <div class="position-relative row form-group">
                        <label for=""
                            class="col-md-3 text-md-right col-form-label">{{ trans('public.img') }}</label>
                        <div class="col-md-9 col-xl-8">
                            <ul class="text-nowrap" id="images">
                                <li class="float-left d-inline-block mr-2 mb-2" style="width: 32%;">

                                    <div style="width: 100%; max-height: 100%; overflow: hidden;"
                                        class="hinh-nhan-hieu">
                                        <img style="width: 100%; cursor: pointer;" class="thumbnail"
                                            data-toggle="tooltip" title="Click to add image" data-placement="bottom"
                                            src="{{ URL('assets/img/add-image-icon.jpg') }}" alt="Add Image">

                                        <input name="hinhnhanhieu" type="file" onchange="changeImg(this);"
                                            accept="image/x-png,image/gif,image/jpeg" id="hinhnhanhieu"
                                            class="image form-control-file nhan-hieu-hinh" style="display: none;">
                                    </div>

                                </li>
                            </ul>
                            <div style="color: red" class="error" name="error-hinhnhanhieu" id="error-hinhnhanhieu">

                            </div>
                        </div>
                    </div>

                    <div class="position-relative row form-group mb-1">
                        <div class="col-md-9 col-xl-8 offset-md-2">
                            <a onclick="huy()" class="border-0 btn btn-outline-danger mr-1">
                                <span class="btn-icon-wrapper pr-1 opacity-8">
                                    <i class="fa fa-times fa-w-20"></i>
                                </span>
                                <span>{{ trans('public.cancel') }}</span>
                            </a>
                            <button type="submit" class="btn-shadow btn-hover-shine btn btn-primary">
                                <span class="btn-icon-wrapper pr-2 opacity-8">
                                    <i class="fa fa-download fa-w-20"></i>
                                </span>
                                <span>{{ trans('public.create') }}</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- end main --}}

<script type="text/javascript">
    {
        $(document).ready(function() {
            $('.thumbnail').click(function() {
                $(this).siblings('.image').click();
            });
            $("#formthemnhanhieu").submit(function(e) {
                e.preventDefault();
                var url = $(this).attr('data-url');
                var tennhanhieu = $('#tennhanhieu').val();
                var hinhnhanhieu = document.getElementById('hinhnhanhieu').files[0];
                var formData = new FormData();
                formData.append('tennhanhieu', tennhanhieu);
                formData.append('hinhnhanhieu', hinhnhanhieu);
                for (const value of formData.values()) {
                    console.log(value);
                }
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
                        //console.log(data.errors.hinhnhanhieu);
                        console.log(data);
                        if (data.status == 400) {
                            $('#error-tennhanhieu').html("");
                            $('#error-tennhanhieu').append(data.errors.tennhanhieu[0]);
                            $('#error-hinhnhanhieu').html("");
                            $('#error-hinhnhanhieu').append(data.errors.hinhnhanhieu[0]);
                        } else {

                            Swal.fire({
                                icon: 'success',
                                title: 'Cảm ơn bạn yêu',
                                text: data.mess,
                            }).then((result) => {
                                load();
                            });
                        }
                    }
                });
            })
        });
    }
</script>
