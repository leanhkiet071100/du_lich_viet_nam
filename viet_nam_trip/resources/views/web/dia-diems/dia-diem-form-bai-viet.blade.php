<section class='rating-widget'>
    <div class="central-meta item">
        <div class="user-post">
            <div class="form-danh-gia-san-pham">
                <div class="tt-danh-gia-san-pham">
                    <h3 class="tt">Bài viết địa điểm</h3>
                </div>
                <form action="" data-url="{{ route('web.dia-diem.post-bai-viet', ['id' => $dia_diem->id]) }}"
                    id="post-form-danh-gia">
                    @csrf
                    <div class="list-product">
                        <div class="detail-product">
                            <div class="img-product">
                                <img src="{{ URL($dia_diem->hinh_anh_dia_diem) }}" alt="Lỗi tải ảnh sản phẩm">
                            </div>
                            <div class="info-product">
                                <div class="name-product">
                                    <span>{{ $dia_diem->ten_dia_diem }}</span>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="title-bai-viet">
                        <div class="name">
                            Tiêu đề
                        </div>
                       <div class="title">
                            <input type="text" name="title" style="width:calc(100% - 20%);" class="title" id="title">
                       </div>
                    </div>
                    <div class="description text-danh-gia" id="noidungbaiviet">
                        <textarea class="content-post" name="content-post" id="content-post" rows="3" placeholder="Đánh giá sản phẩm"></textarea>
                        <div class="attachments">

                        </div>
                        <div class="preview-upload" id="anh-binh-luan">
                        </div>
                        <div class="chuc-nang">
                            <div class="chi-tiet">
                                <button type="button" class="btn-chi-tiet" id="btn-tro-lai" onclick="tro_lai()">Trở lại</button>
                            </div>
                            <div class="danh-gia">
                                <button type="submit" class="btn-danh-gia">Hoàn thành</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>


    <!-- Rating Stars Box -->

</section>
<!-- End Main -->
<script type="text/javascript">
    CKEDITOR.replace('content-post');
    function tro_lai() {
        var form_danh_gia = document.getElementById("form");
        form_danh_gia.style.display = "none";
        remove_them_layout();
        location.reload();
        $('#form').html("");
    }

    $("#post-form-danh-gia").submit(function(e) {
        e.preventDefault();
        var url = $(this).attr('data-url');
        var noi_dung = $("#content-post").val();
        var title = $('#title').val();
        formData = new FormData();
        formData.append('noi_dung', noi_dung);
        formData.append('tieu_de', title);
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
                text:  data.mess,

            })
            }else if(data.status == 401){
                Swal.fire({
                icon: 'error',
                title: 'Úi...!!!',
                text: 'Bạn chưa đăng nhập',
                }).then((result) => {
                    window.location="{{route('web.auth.dang-nhap')}}";
                });
            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'Cảm ơn bạn yêu',
                    text: 'Đã hoàn thành bài viết',
                }).then((result) => {
                    tro_lai();
                });
            }

            }
            });

    });

    $('#stars').on('click', 'li', function() {
        var gia_tri_so_sao = $(this).attr('data-value')
        var so_sao = document.getElementById('so-sao');
        so_sao.value = gia_tri_so_sao;
    });
</script>
