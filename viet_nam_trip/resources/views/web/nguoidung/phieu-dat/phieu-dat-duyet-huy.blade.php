@extends('web.layouts.app')

@section('title', 'mạng xã hội')
@section('content')
    @parent
    <!-- Main -->
    @if (session()->has('success'))
        <script>
            alert('{{ session()->get('success') }}')
        </script>
    @endif
     @include('web.includes.banner')
    <section class="time-line-user">
        <div class="container">
            <div class="row">
                @include('web.includes.menu-tai-khoan')
                <div class="col-lg-10 col-md-9 order-md-1 order-1">
                    <div class="don-hang-box">
                        @include('web.includes.menu-don-hang')
                    </div>
                    @foreach ($phieu_dat as $key => $value)
                        <div class="box-hoa-don">
                            <div class="don-hang-box">
                                <div class="detail-info-title info-title-don-hang">
                                    <h4 class="title">ĐƠN HÀNG</h4>
                                    <div class="trang-thai">
                                        @switch($value->trang_thai)
                                            @case(1)
                                                <span>Đang chờ duyệt</span>
                                            @break

                                            @case(2)
                                                <span>Đã Duyệt</span>
                                            @break

                                            @case(3)
                                                <span>Chờ duyệt hủy</span>
                                            @break

                                            @case(4)
                                                <span>Đã hủy</span>
                                            @break

                                            @case(5)
                                                <span>Hoàn thành</span>
                                            @break

                                            @default
                                        @endswitch

                                    </div>
                                </div>
                                <div class="list-product">
                                    <div class="detail-product">
                                        <div class="img-product">
                                            <img src="{{ URL($value->goi_du_lich->hinh_goi_du_lich ?? 'hinh_test/no-img.jpg') }}" alt="">
                                        </div>
                                        <div class="info-product">
                                            <div class="name-product">
                                                <span>{{ $value->goi_du_lich->ten }}</span>

                                            </div>
                                            <div class="">
                                                <span> {{ ( ($value->so_nguoi_lon ?? 0) + ($value->so_tre_em ?? 0)  + ($value->so_tre_nho?? 0)) }} Người</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price-product">
                                        {{ number_format($value->hoa_don->tong_tien ?? 0) }}
                                    </div>
                                </div>

                            </div>
                            <div class="chi-tiet-chuc-nang">
                                <div class="tong-tien">
                                    <div class="span-thanh-tien">
                                        <span>Thành tiền:</span>
                                    </div>
                                    <div class="span-tien">
                                        <span> {{ number_format($value->hoa_don->tong_tien ?? 0) }}</span>
                                    </div>
                                </div>
                                <div class="chuc-nang">
                                    {{-- <div class="danh-gia">
                                        <button class="btn-danh-gia">Đánh giá</button>
                                    </div> --}}
                                    <div class="chi-tiet">
                                        <a href="{{ route('web.tai-khoan.phieu-dat-chi-tiet', ['id' => $value->id]) }}"><button
                                                class="btn-chi-tiet">Chi tiết</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Main -->
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#duyet-huy').addClass('active');
            $('#li-don-hang').addClass('tk-active');
            $('#home').removeClass('active');
        });
    </script>

@endsection
