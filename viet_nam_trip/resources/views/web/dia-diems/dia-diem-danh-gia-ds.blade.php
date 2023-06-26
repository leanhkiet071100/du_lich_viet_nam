   <div class="pt-5 mt-5">
       <h3 class="mb-5">{{$ls_dia_diem_danh_gia->count()}} Bình luận</h3>
       <ul class="comment-list">
        @foreach ($ls_dia_diem_danh_gia as $key=>$value)
            <li class="comment">
               <div class="vcard bio">
                   <img src="{{URL($value->hinh_dai_dien ?? 'assets/web/images/person_1.jpg')}}" alt="Image placeholder">
               </div>
               <div class="comment-body">
                   <h3>{{$value->ten}}</h3>
                   <div class="meta">{{date('d-m-Y', strtotime($value->created_at))}}</div>
                    @for ($i = 0; $i < 5; $i++)
                        @if ($i < $value->sao)
                            <i class="icon-star"></i>
                        @else
                            <i class="icon-star-o"></i>
                        @endif
                    @endfor
                   <p>{{$value->noi_dung}}</p>
                    {{-- <div class="hinh-anh-binh-luan">
                        @foreach ($value->danh_gia_dia_diem_hinh as $key1=>$value1 )
                        {{$value->ten}}
                             <img src="{{ URL($value1->ten) }}" alt="" class="img-binh-luan">
                        @endforeach

                    </div> --}}
               </div>
           </li>
        @endforeach
       </ul>
       <!-- END comment-list -->

       <div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
           <h4 class="mb-5">Check Availability &amp; Booking</h4>
           <div class="fields">
               <div class="row">

                   <div class="col-md-3">
                       <div class="form-group">
                           <button onclick="hien_form_danh_gia({{$dia_diem->id}})" data-url={{route('web.dia-diem.danh-gia',['id'=>$dia_diem->id])}} class="btn btn-primary py-3">{{trans('web.writting_Evaluate')}}</button>
                       </div>
                   </div>
                   <div class="col-md-3">
                       <div class="form-group">
                           <button onclick="hien_form_bai_viet({{$dia_diem->id}})" data-url={{route('web.dia-diem.bai-viet',['id'=>$dia_diem->id])}} class="btn btn-primary py-3">{{trans('web.writting_post')}} </button>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
