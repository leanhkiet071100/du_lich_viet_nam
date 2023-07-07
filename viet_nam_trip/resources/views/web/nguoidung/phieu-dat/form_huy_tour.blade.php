<section class='rating-widget'>
    <div class="central-meta item">
        <div class="user-post">
            <div class="form-danh-gia-san-pham">
                <div class="tt-danh-gia-san-pham">
                    <h3 class="tt">Đánh giá sản phẩm</h3>
                </div>
                <form data-url="{{ route('web.tai-khoan.post-huy-phieu-dat', ['id' => $phieu_dat->id]) }}"
                    id="post-form-danh-gia">
                    @csrf
                    <div class="list-product">
                        <div class="detail-product">
                            <div class="img-product">
                                <img src="{{ URL($phieu_dat->goi_du_lich->hinh_goi_du_lich ?? 'hinh_test/no-img.jpg') }}"
                                    alt="Lỗi tải ảnh sản phẩm">
                            </div>
                            <div class="info-product">
                                <div class="name-product">
                                    <span>{{ $phieu_dat->goi_du_lich->ten }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="huy-tour">
                        @foreach (\App\Models\phieu_dat::$huy as $key => $value)
                            <div class="form-check">
                                <input class="form-check-input li-do-huy input-check-lo-do-huy" type="radio"
                                    name="li-do-huy" value="{{ $value }}">
                                <label class="form-check-label label-check-lo-do-huy" for="flexRadioDefault1">
                                    {{ $value }}
                                </label>
                            </div>
                        @endforeach
                        <div class="form-check">
                            <input class="form-check-input li-do-huy input-check-lo-do-huy" type="radio"
                                name="li-do-huy" checked>
                            <label class="form-check-label label-check-lo-do-huy" for="flexRadioDefault1">
                                Khác
                            </label>
                        </div>
                    </div>
                    <div class="description text-danh-gia" id="li-do-huy-tour">
                        <textarea class="content-post" name="content_post" id="content_post" rows="3" placeholder="Lí do hủy"></textarea>
                    </div>
                    <div class="description text-danh-gia" id="noidungbaiviet">

                        <div class="chuc-nang">
                            <div class="chi-tiet">
                                <button type="button" class="btn-chi-tiet" id="btn-tro-lai" onclick="tro_lai()">Trở
                                    lại</button>
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
    $(document).ready(function() {
        $('#li-don-hang').addClass('tk-active');
        $('#home').removeClass('active');
        $('#huy').addClass('active');
    });
    // điều chỉnh sao
    $(document).ready(function() {


    });

    function responseMessage(msg) {
        $('.success-box').fadeIn(200);
        $('.success-box div.text-message').html("<span>" + msg + "</span>");
    }

    function ImagesFileAsURL() {
        var fileSelected = document.getElementById('uploadanhpost').files;
        document.getElementById('anh-binh-luan').innerHTML = "";
        if (fileSelected.length > 0) {
            for (var i = 0; i < fileSelected.length; i++) {
                var fileToLoad = fileSelected[i];
                var fileReader = new FileReader();
                fileReader.onload = function(fileLoaderEvent) {
                    var srcData = fileLoaderEvent.target.result;
                    var newImage = document.createElement('img');
                    newImage.src = srcData;
                    document.getElementById('anh-binh-luan').innerHTML += newImage.outerHTML;
                }
                fileReader.readAsDataURL(fileToLoad);
            }
        }
    }

    function tro_lai() {
        var form_danh_gia = document.getElementById("form-danh-gia");
        form_danh_gia.style.display = "none";
        remove_them_layout();
        location.reload();
        $('#form-danh-gia').html("");
    }

    $("#post-form-danh-gia").submit(function(e) {
        e.preventDefault();
        var url = $(this).attr('data-url');
        var li_do = document.querySelector('.li-do-huy:checked').value;
        if (li_do == 'on') {
            var noi_dung = $('#content_post').val();

        } else {
            var noi_dung = li_do
        }
        console.log(noi_dung);
        formData = new FormData();
        formData.append('noi_dung', noi_dung);
        // for (const value of formData.values()) {
        //     console.log(value);
        // }
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
                if (data.status == 400) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Úi...!!!',
                        text: data.mess,

                    })
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Đã hủy thành công',
                        text: data.mess,
                    }).then((result) => {
                        tro_lai();
                    });
                }
            }
        });
    });

    $(".li-do-huy").click(function() {
        var li_do = document.querySelector('.li-do-huy:checked').value;
        option(li_do);
    });

    function option(e) {
        var li_do_huy_tour = document.getElementById('li-do-huy-tour');
        if (e == 'on') {
            li_do_huy_tour.style.display = 'block';
        } else {
            li_do_huy_tour.style.display = 'none';
        }
    }
</script>
