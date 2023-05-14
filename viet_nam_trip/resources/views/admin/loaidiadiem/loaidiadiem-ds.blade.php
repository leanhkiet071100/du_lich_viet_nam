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
                        {{ $title }}
                        <div class="page-title-subheading">
                            {{ trans('public.manage_user') }}
                        </div>
                    </div>
                </div>

                <div class="page-title-actions">
                    <a class="btn-shadow btn-hover-shine mr-3 btn btn-primary" onclick="hien_form_loai_san_pham()">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-plus fa-w-20"></i>
                        </span>
                        {{ trans('public.create') }}
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">
                        <form action="" method="get" class="mb-0">
                            <div class="input-group">
                                <input type="search" name="search" id="search" placeholder="Search everything"
                                    class="form-control" value="{{request()->get('search')}}">
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-search"></i>&nbsp;
                                        {{trans('public.search')}}
                                    </button>
                                </span>
                            </div>
                        </form>
                        {{-- <div class="btn-actions-pane-right">
                            <div role="group" class="btn-group-sm btn-group">
                                <button class="btn btn-focus">This week</button>
                                <button class="active btn btn-focus">Anytime</button>
                            </div>
                        </div> --}}
                    </div>

                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center" width="5%">{{trans('public.STT')}}</th>

                                    <th class="text-center" width="20%">{{trans('public.img')}}</th>
                                    <th class="text-center" width="50%">{{trans('public.name')}}</th>

                                    <th class="text-center">{{trans('public.presently')}}</th>
                                    <th class="text-center">{{trans('public.function')}}</th>
                                </tr>
                            </thead>
                            <tbody id="table-dsnhanhieu">
                                @foreach ($ls_loai_dia_diem as $key => $value)
                                    <tr>
                                        <td class="text-center text-muted">{{ ($key + 1) }} '</td>
                                        <td class="td-hinh">
                                            <div class="widget-content-center ">
                                                <img style="height: 60px; width: 60px" data-toggle="tooltip" title="Image"
                                                    data-placement="bottom" src="{{URL($value->hinh_loai_dia_diem  ?? 'assets/img/no-img.jpg')}}"
                                                    alt="">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading">{{$value->ten}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="td-radio">
                                            <div class=" check-magana text-center td-radio">
                                                {{-- <input class="form-check-input" type="checkbox" value=""\
                                                    id="defaultCheck1"> --}}
                                                <input class="" type="checkbox" value="" id="checkhien{{$value->id }}" onchange="loai_dia_diem_hien({{$value->id}})" @if($value->hien == 1) checked @endif>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <a data-url="{{ route('admin.loai-dia-diem.edit', ['id'=>$value->id]) }}" data-toggle="tooltip" title="Edit"
                                                data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm edit_nhanhieu" id="edit_nhanhieu">
                                                <span class="btn-icon-wrapper opacity-8">
                                                    <i class="fa fa-edit fa-w-20"></i>
                                                </span>
                                            </a>
                                            <form class="d-inline" action="" method="post">
                                                <button class="delete_nhanhieu btn btn-hover-shine btn-outline-danger border-0 btn-sm "
                                                    type="button" data-toggle="tooltip" title="Delete"
                                                    data-placement="bottom" value="' + item.id +'" id="delete_nhanhieu" data-url="{{ route('admin.loai-dia-diem.destroy', ['id'=>$value->id]) }}">
                                                        <i class="fa fa-trash fa-w-20"></i>
                                                    </span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>

                    <div class="d-block card-footer">
                         {{ $ls_loai_dia_diem->appends(request()->all())->links('pagination::bootstrap-4') }}
                    </div>

                </div>
            </div>
        </div>
        @section('create')
        <div class="create-nhan-hieu" id="create-nhan-hieu">

        </div>
        @endsection
    </div>
    <!-- End Main -->
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#li-loai-dia-diem').addClass('mm-active');
            $('#loai-dia-diem').addClass('mm-active');

        });

        $(document).on('click', '.delete_nhanhieu', function(e) {
            e.preventDefault();
            var r = confirm("Bạn có chắc chắn muốn xóa?");
            if (r == true) {
                var idnhanhieu = $(this).val();

                var url = $(this).attr('data-url');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: url,
                    type: "DELETE",
                    success: function(data) {
                        alert(data.mess);
                        load();
                    }
                });
            }
        });

        $(document).on('click', '.edit_nhanhieu', function(e) {
            e.preventDefault();

            var url = $(this).attr('data-url');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: 'GET',
                //data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    var create_nhan_hieu = document.getElementById('create-nhan-hieu');
                    create_nhan_hieu.style.display = "block";
                    $('#create-nhan-hieu').html('');
                    $('#create-nhan-hieu').append(data);
                    add_them_layout();
                }
            });
        });



    function hien_form_loai_san_pham() {
        //  var formData = new FormData();
        //  formData.append('idpost', idpost);
        var url = "{{ route('admin.loai-dia-diem.create') }}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('admin.loai-dia-diem.create') }}",
            type: 'GET',
            //data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                //console.log(data);
                var create_nhan_hieu = document.getElementById('create-nhan-hieu');
                create_nhan_hieu.style.display = "block";
                $('#create-nhan-hieu').html('');
                $('#create-nhan-hieu').append(data);
                add_them_layout();
            }
        });
    }

    function huy() {
        var create_nhan_hieu = document.getElementById('create-nhan-hieu');
        create_nhan_hieu.style.display = "none";
        remove_them_layout();
    }

    // function loadnhanhieu() {
    //     $.ajax({
    //         url: "{{ route('admin.loai-dia-diem.load') }}",
    //         type: "GET",
    //         dataType: "json",
    //         success: function(data) {
    //             console.log(data);
    //             $('#table-dsnhanhieu').html("");
    //             $.each(data.lsnhanhieu, function(key, item) {
    //                 $('#table-dsnhanhieu').append('<tr>\
    //                                     <td class="text-center text-muted">' + (key + 1) + '</td>\
    //                                     <td class="td-hinh">\
    //                                         <div class="widget-content-center ">\
    //                                             <img style="height: 60px; width: 60px" data-toggle="tooltip" title="Image"\
    //                                                 data-placement="bottom" src="{{ URL('') }}/' + item
    //                     .hinh_nhan_hieu + '"\
    //                                                 alt="">\
    //                                         </div>\
    //                                     </td>\
    //                                     <td>\
    //                                         <div class="widget-content p-0">\
    //                                             <div class="widget-content-wrapper">\
    //                                                 <div class="widget-content-left flex2">\
    //                                                     <div class="widget-heading">' + item.ten_nhan_hieu + '</div>\
    //                                                 </div>\
    //                                             </div>\
    //                                         </div>\
    //                                     </td>\
    //                                     <td class="td-radio">\
    //                                         <div class=" check-magana text-center td-radio">\
    //                                             {{-- <input class="form-check-input" type="checkbox" value=""\
    //                                                 id="defaultCheck1"> --}}\
    //                                             <input class="" type="checkbox" value="" id="checkhien' + item.id +  '" onchange="nhan_hieu_hien(' + item.id + ')"  ' + (item.hien == 1 ? "checked" : "") +'>\
    //                                         </div>\
    //                                     </td>\
    //                                     <td class="text-center">\
    //                                         <a data-url="{{ route('admin.loai-dia-diem.edit', '') }}\/' + item.id + '" data-toggle="tooltip" title="Edit"\
    //                                             data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm edit_nhanhieu" id="edit_nhanhieu">\
    //                                             <span class="btn-icon-wrapper opacity-8">\
    //                                                 <i class="fa fa-edit fa-w-20"></i>\
    //                                             </span>\
    //                                         </a>\
    //                                         <form class="d-inline" action="" method="post">\
    //                                             <button class="delete_nhanhieu btn btn-hover-shine btn-outline-danger border-0 btn-sm "\
    //                                                 type="button" data-toggle="tooltip" title="Delete"\
    //                                                 data-placement="bottom" value="' + item.id +'" id="delete_nhanhieu" data-url="{{ route('admin.loai-dia-diem.destroy', '') }}\/' + item.id + '">\
    //                                                 <span class="btn-icon-wrapper opacity-8">\
    //                                                     <i class="fa fa-trash fa-w-20"></i>\
    //                                                 </span>\
    //                                             </button>\
    //                                         </form>\
    //                                     </td>\
    //                                 </tr>');
    //             });
    //         }
    //     })
    // }

    function load(){
        location.reload()
    }

    function loai_dia_diem_hien($id) {
        var check = document.getElementById("checkhien" + $id).checked;
        var formData = new FormData();
        var url = "{{ route('admin.loai-dia-diem.hien', '') }}" + '/' + $id;
        formData.append('check', check);
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
                console.log(data)
            }
        });
    }

   </script>
@endsection
