<section class='rating-widget'>
    <div class="central-meta item">
        <div class="user-post">
            <div class="form-danh-gia-san-pham">
                <div class="tt-danh-gia-san-pham">
                    <h3 class="tt">Hủy tour</h3>
                </div>
                <form method="post" data-url="{{ route('admin.tour.post-form-tour-huy', ['id' => $phieu_dat->id]) }}"
                    id="post-form-tour-huy">
                    @csrf
                    <div class="list-product">
                        <div class="detail-product">
                            <div class="img-product">
                                <img src="{{ URL($phieu_dat->hinh_goi_du_lich ?? 'hinh_test/no-img.jpg') }}"
                                    alt="Lỗi tải ảnh sản phẩm">
                            </div>
                            <div class="info-product">
                                <div class="name-product">
                                    <span>{{ URL($phieu_dat->ten) }}</span>

                                </div>
                                <div class="phan-loai-san-pham">
                                    <span> Nơi khởi hành: {{ $phieu_dat->noi_khoi_hanh }} </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat-luong-san-pham">
                        <div class="name">
                            Họ và tên:
                        </div>
                        <div class='name text-center'>
                            tên
                        </div>
                    </div>
                    <div class="chat-luong-san-pham">
                        <div class="name">
                            Số người lớn:
                        </div>
                        <div class='name text-center'>
                            {{ $phieu_dat->so_nguoi_lon ?? 0 }}
                        </div>
                    </div>
                    <div class="chat-luong-san-pham">
                        <div class="name">
                            Số trẻ em:
                        </div>
                        <div class='name text-center'>
                            {{ $phieu_dat->so_tre_em ?? 0 }}
                        </div>
                    </div>
                    <div class="chat-luong-san-pham">
                        <div class="name">
                            trẻ nhỏ:
                        </div>
                        <div class='name text-center'>
                            {{ $phieu_dat->so_tre_nho ?? 0 }}
                        </div>
                    </div>
                    <div class="noi-dung-tra-loi">
                        lí do hủy
                    </div>
                    <div class="description text-danh-gia" id="noidungbaiviet">
                        <textarea class="content-post" id="content_post" name="content_post" rows="5" placeholder="Trả lời đánh giá">{{ old('content_post') }}</textarea>
                    </div>
                    <div class="text-center">
                        @error('content-post')
                            <span style="color:red"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="position-relative row form-group mb-1 text-center">
                        <div class="col-md-9 col-xl-8 offset-md-2">
                            <a class="border-0 btn btn-outline-danger mr-1" onclick="huy()">
                                <span class="btn-icon-wrapper pr-1 opacity-8">
                                    <i class="fa fa-times fa-w-20"></i>
                                </span>
                                <span>Trở lại</span>
                            </a>
                            <button type="submit" class="btn-shadow btn-hover-shine btn btn-primary">
                                <span class="btn-icon-wrapper pr-2 opacity-8">
                                    <i class="fa fa-reply fa-w-20"></i>
                                </span>
                                <span>Hủy tour</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>

</section>

<script type="text/javascript">
    // điều chỉnh sao

    function tro_lai() {
        $('#form-tour-huy').html("");
        var form_danh_gia = document.getElementById("form-tour-huy");
        form_danh_gia.style.display = "none";
        remove_them_layout();
        // location.reload();

    }

    $("#post-form-tour-huy").submit(function(e) {
        e.preventDefault();
        var url = $(this).attr('data-url');
        var noi_dung = $('#content_post').val();
        formData = new FormData();
        formData.append('content_post', noi_dung);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                console.log(data);
                if (data.status == 400) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Úi...!!!',
                        text: data.errors.content_post[0],

                    })
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

    });
</script>
