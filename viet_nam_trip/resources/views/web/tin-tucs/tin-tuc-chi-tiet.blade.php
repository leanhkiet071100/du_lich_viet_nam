@extends('web.layouts.app')

@section('content')
    @parent
    {{-- @include('web.includes.banner') --}}
    <section class="ftco-section ftco-degree-bg">
        <input disabled type="hidden" value="{{ $tin_tuc->id }}" id="tin_tuc_id">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ftco-animate">
                    {!! $tin_tuc->noi_dung !!}

                    {{-- bình luần --}}
                    <div class="pt-5 mt-5 load-binh-luan" id="load-binh-luan">

                    </div>

                    <div class="pt-5 mt-5">
                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5">{{ trans('public.writing_comment') }}</h3>
                            <form action="" class="p-5 bg-light" data-url="{{ route('web.tin-tuc.binh-luan-tin-tuc', ['id'=>$tin_tuc->id]) }}" id="binh-luan-tin-tuc">
                                @csrf
                                <div class="form-group">
                                    <label for="noidung">{{ trans('public.comment') }}</label>
                                    <textarea name="noidung" id="noidung" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="{{ trans('public.comment') }}" class="btn py-3 px-4 btn-primary">
                                </div>

                            </form>
                        </div>
                    </div>

                    {{-- end bình luận --}}
                </div> <!-- .col-md-8 -->
                <div class="col-md-4 sidebar ftco-animate">
                    <div class="sidebar-box">
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <span class="icon fa fa-search"></span>
                                <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-box ftco-animate">
                        <div class="categories">
                            <h3>Categories</h3>
                            <li><a href="#">Tour <span>(12)</span></a></li>
                            <li><a href="#">Hotel <span>(22)</span></a></li>
                            <li><a href="#">Coffee <span>(37)</span></a></li>
                            <li><a href="#">Drinks <span>(42)</span></a></li>
                            <li><a href="#">Foods <span>(14)</span></a></li>
                            <li><a href="#">Travel <span>(140)</span></a></li>
                        </div>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3>Recent Blog</h3>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about
                                        the blind texts</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about
                                        the blind texts</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url(images/image_3.jpg);"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about
                                        the blind texts</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3>Tag Cloud</h3>
                        <div class="tagcloud">
                            <a href="#" class="tag-cloud-link">dish</a>
                            <a href="#" class="tag-cloud-link">menu</a>
                            <a href="#" class="tag-cloud-link">food</a>
                            <a href="#" class="tag-cloud-link">sweet</a>
                            <a href="#" class="tag-cloud-link">tasty</a>
                            <a href="#" class="tag-cloud-link">delicious</a>
                            <a href="#" class="tag-cloud-link">desserts</a>
                            <a href="#" class="tag-cloud-link">drinks</a>
                        </div>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3>Paragraph</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus
                            voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur
                            similique, inventore eos fugit cupiditate numquam!</p>
                    </div>
                </div>

            </div>
        </div>
    </section> <!-- .section -->
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#news').addClass('active');
            load_binh_luan(1);
        });

        $("#binh-luan-tin-tuc").submit(function(e) {
            e.preventDefault();
            var url = $(this).attr('data-url');
            var noi_dung = $('#noidung').val();
            var formData = new FormData();
            formData.append('noidung', noi_dung);

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
                    console.log(data);
                    if (data.status == 400) {
                        alert(data.errors.noidung[0])
                    } else if (data.status == 401) {
                        alert(data.errors)
                    } else {
                        alert(data.mess);
                        $('#noidung').val('');
                        load_binh_luan(1);
                    }
                }
            });
        });

        function rep_binh_luan_tin_tuc(id_tin_tuc, id_binh_luan, page) {
            var url = "{{ route('web.tin-tuc.binh-luan-tin-tuc', '') }}" + '/' + id_tin_tuc;
            var noi_dung = $('#noidung' + id_binh_luan).val();
            var formData = new FormData();
            formData.append('noidung', noi_dung);
            formData.append('id_binh_luan', id_binh_luan);

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
                    if (data.status == 400) {
                        alert(data.errors.noidung[0])
                    } else if (data.status == 401) {
                        alert(data.errors)
                    } else {
                        alert(data.mess);
                        $('#noidung').val('');
                        load_binh_luan(1);
                    }
                }
            });

        }

        function load_binh_luan(page) {
            var url = "{{ route('web.tin-tuc.load-binh-luan-tin-tuc') }}"
            var id_tin_tuc = $('#tin_tuc_id').val();

            var formData = new FormData();
            formData.append('idbaiviet', id_tin_tuc);
            formData.append('page', page);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    //window.location.reload(); load lại trang
                    $('#load-binh-luan').html('');
                    $('#load-binh-luan').append(data);
                    $('#page' + page).addClass('active-phan-trang');
                    // if (data.status == 400) {
                    //     $('#saveform_errList').html("");
                    //     $('#error-tennhanhieu').html("");
                    //     $('#error-tennhanhieu').append(data.errors.tennhanhieu[0]);
                    // } else {
                    //     alert(data.mess);
                    //     $('#table-dsnhanhieu').html('');
                    //     loadnhanhieu();
                    // }
                }
            });
        }

        function form_tra_loi_binh_luan(id_binh_luan) {
            var x = document.getElementById("rep-commment" + id_binh_luan);
            x.style.display = "block";

        }
    </script>
@endsection
