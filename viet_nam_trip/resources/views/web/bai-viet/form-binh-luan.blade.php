 <div class="pt-5 mt-5">
     <div class="comment-form-wrap pt-5">
         <h3 class="mb-5">{{ trans('public.writing_comment') }}</h3>
         <form action="" class="p-5 bg-light"
             data-url="{{ route('web.bai-viet.binh-luan-bai-viet', ['id' => $bai_viet->id]) }}" id="binh-luan-bai-viet">
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
