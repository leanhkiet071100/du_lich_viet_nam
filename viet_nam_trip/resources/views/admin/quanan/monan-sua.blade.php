<!-- Main -->
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <form action="" id="form-sua" method="post" data-url="{{route('admin.mon-an.update',['id'=>$mon_an->id])}}">
                    @csrf

                    <p class="text-center title">Sửa món ăn</p>
                    <div class="position-relative row form-group">
                        <label for="ten-mon" class="col-md-3 text-md-right col-form-label">{{trans('public.name')}}</label>
                        <div class="col-md-9 col-xl-8">
                            <input name="ten-mon" id="ten-mon" placeholder="Tên món ăn" type="text" class="form-control" value="{{$mon_an->ten_mon}}">
                        </div>
                    </div>
                    <div style="color: red" class="error text-center" name="error-ten-mon" id="error-ten-mon">

                    </div>
                    <div class="position-relative row form-group">
                        <label for="gia" class="col-md-3 text-md-right col-form-label">Giá bán</label>
                        <div class="col-md-9 col-xl-8">
                            <input  onchange="format_curency(this)" onkeypress="return isNumberKey(event)" name="gia" id="gia" placeholder="Giá" type="text" class="form-control" value="{{$mon_an->gia_ban}}">
                        </div>

                    </div>
                    <div style="color: red" class="error text-center" name="error-gia" id="error-gia">

                    </div>
                    <div class="position-relative row form-group">
                        <label for="" class="col-md-3 text-md-right col-form-label">{{trans('public.img')}}</label>
                        <div class="col-md-9 col-xl-8">
                            <ul class="text-nowrap" id="images">
                                <li class="float-left d-inline-block mr-2 mb-2" style="width: 32%;">

                                    <div style="width: 100%; max-height: 100%; overflow: hidden;"
                                        class="hinh-nhan-hieu">
                                        <img style="width: 100%; cursor: pointer;" class="thumbnail"
                                            data-toggle="tooltip" title="Click to add image" data-placement="bottom"
                                            src="{{ URL($mon_an->hinh_mon_an ?? 'hinh_test/no-img.jpg') }}" alt="Add Image">

                                        <input name="hinh" type="file" onchange="changeImg(this);"
                                            accept="image/x-png,image/gif,image/jpeg" id="hinh"
                                            class="image form-control-file nhan-hieu-hinh" style="display: none;">
                                    </div>

                                </li>
                            </ul>
                            <div style="color: red" class="error" name="error-hinh" id="error-hinh">

                            </div>
                        </div>
                    </div>
                    <div class="position-relative row form-group mb-1">
                        <div class="col-md-9 col-xl-8 offset-md-2">
                            <a onclick="huy()" class="border-0 btn btn-outline-danger mr-1">
                                <span class="btn-icon-wrapper pr-1 opacity-8">
                                    <i class="fa fa-times fa-w-20"></i>
                                </span>
                                <span>{{trans('public.cancel')}}</span>
                            </a>
                            <button class="btn-shadow btn-hover-shine btn btn-primary">
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
{{-- end main --}}

<script type="text/javascript">
    {
        $(document).ready(function() {

            $('.thumbnail').click(function() {
                $(this).siblings('.image').click();
            });

            $("#form-sua").submit(function(e) {
                e.preventDefault();
                var ten = $('#ten-mon').val();
                var hinh = document.getElementById('hinh').files[0];
                var gia = $('#gia').val();
                var url = $(this).attr('data-url');

                var formData = new FormData();
                formData.append('ten_mon', ten);
                formData.append('gia', gia);
                formData.append('hinh', hinh);
                // for (const value of formData.values()) {
                //     console.log(value);
                // }
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
                            $('#error-ten-mon').html("");
                            $('#error-ten-mon').append(data.errors.ten_mon[0]);
                            $('#error-hinh').html("");
                            $('#error-hinh').append(data.errors.hinh[0]);
                            $('#error-gia').html("");
                            $('#error-gia').append(data.errors.gia[0]);
                            // $.each(data.errors, function(key, err_value){
                            //     $('#saveform_errList').append('<li style="color: red">'+err_value+'</li>');
                            // });
                            //console.log(data.error.tennhanhieu);
                        } else {
                             load();
                            Swal.fire(
                                'Thành công',
                                'Sua thành công',
                                'success'
                            )

                            // huy();
                        }

                    }
                });
            })
        });
    }
</script>
