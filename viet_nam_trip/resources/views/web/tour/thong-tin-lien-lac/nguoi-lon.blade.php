 @for($i = 0; $i < $so_luong; $i++)
     <div class="group-info-name">
         <span>Họ tên</span>
         <input value="1" data-val="true" data-val-number="The field persontype must be a number." data-val-required="The persontype field is required." name="{{$i}}.persontype" type="hidden">
         <input class="form-control" name="{{$i}}.fullname" placeholder="Vui lòng nhập Họ tên" required="required"
             type="text" value="{{old($i.'_fullname')}}">
     </div>
     <div class="group-info-sex">
         <span>Giới tính</span>
         <select class="form-control" data-val="true" data-val-number="The field gender must be a number."
             data-val-required="The gender field is required." name="{{$i}}.gender" placeholder="Vui lòng chọn giới tính"
             required="required">
             <option selected="selected" value="-1">Giới tính</option>
             <option value="0">Nữ</option>
             <option value="1">Nam</option>
         </select>
     </div>
     <div class="group-info-birthday">
         <span>Ngày sinh</span>
         <select class="form-control" name="{{$i}}.day" placeholder="Vui lòng chọn ngày" required="required">
             <option value="">Ngày</option>
              @foreach ($ngay as $key => $value)
                 <option value="{{ $value }}">{{ $value }}</option>
             @endforeach
         </select>
     </div>
     <div class="group-info-month">
         <span>&nbsp;</span>
         <select class="form-control" name="{{$i}}.month" placeholder="Vui lòng chọn tháng" required="required">
             <option value="">Tháng</option>
            @foreach ($thang as $key => $value)
                 <option value="{{ $value }}">{{ $value }}</option>
             @endforeach

         </select>
     </div>
     <div class="group-info-year">
         <span>&nbsp;</span>
         <select class="form-control" name="{{$i}}.year" placeholder="Vui lòng chọn năm" required="required">
             <option value="">Năm</option>
             @foreach ($nam_nguoi_lon as $key => $value)
                 <option value="{{ $value }}">{{ $value }}</option>
             @endforeach
         </select>
     </div>
 @endfor
