<h3 class="mb-5">{{ $so_binh_luan }} Bình luận</h3>

<ul class="comment-list">
    @foreach ($lsbinhluancha as $key => $value)
        <li class="comment">
            <div class="vcard bio">
                <img src="{{ URL($value->hinh_dai_dien ?? 'hinh_test/avatar.png') }}" alt="Image placeholder">
            </div>
            <div class="comment-body">
                <h3>{{ $value->ten }}</h3>
                <div class="meta">{{ date('j/m/Y', strtotime($value->created_at)) }}</div>
                <p>{{ $value->noi_dung }}</p>
                <p><a type="button" class="reply" title="trả lời" id="reply{{ $value->id }}" onclick="form_tra_loi_binh_luan({{ $value->id }})">Trả lời</a></p>
            </div>
            @foreach ($value->binh_luan as $key2 => $value2)
                <ul class="children">
                    <li class="comment">
                        <div class="vcard bio">
                            <img src="{{ URL($value2->hinh_dai_dien ?? 'hinh_test/avatar.png') }}"
                                alt="Image placeholder">
                        </div>
                        <div class="comment-body">
                            <h3>{{ $value2->ten }}</h3>
                            <div class="meta">{{ date('j/m/Y', strtotime($value2->created_at)) }}</div>
                            <p>{{ $value2->noi_dung }}</p>
                            <p><a type="button" class="reply" title="trả lời" id="reply{{ $value->id }}" onclick="form_tra_loi_binh_luan({{ $value->id }})">Trả lời</a></p>
                        </div>
                    </li>
                </ul>
            @endforeach

        </li>
        <div class="post-comt-box rep-commment" id="rep-commment{{ $value->id }}">
            <form class="p-5" id="rep-binh-luan-bai-viet">
                @csrf
                <div class="form-group">
                    <label for="noidung">{{ trans('public.comment') }}</label>
                    <textarea name="noidung" id="noidung{{ $value->id }}" cols="10" rows="2" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button  onclick="rep_binh_luan_bai_viet({{ $value->bai_viet_id }},{{ $value->id }}, {{ $trang }})" class="btn py-3 px-4 btn-primary">{{ trans('public.comment') }}</button>
                </div>

            </form>
        </div>
    @endforeach
</ul>

<!-- END comment-list -->


@if ($lsbinhluancha->hasPages())


    <div class="product__pagination phan-trang text-center">
        @if ($trang != 1)
            <a onclick="load_binh_luan(1)"><i class="fa fa-long-arrow-left"></i></a>
        @endif
        @for ($i = 1; $i <= $lastPage; $i++)
            @if ($i == $trang || $i == $trang + 1 || $i == $trang + 2 || $i == $trang - 1 || $i == $trang - 2)
                <a id="page{{ $i }}" class=""
                    onclick="load_binh_luan({{ $i }})">{{ $i }}</a>
            @endif
        @endfor

        @if ($trang != $lastPage)
            <a onclick="load_binh_luan({{ $lastPage }})"><i class="fa fa-long-arrow-right"></i></a>
        @endif
    </div>
@endif
