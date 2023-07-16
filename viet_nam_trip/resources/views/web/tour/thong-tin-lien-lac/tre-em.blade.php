@if ($so_luong > 0)

    <div class="b-persion block">
        <h4>Trẻ em</h4>
        <div class="group-info" id="ListInfoAdult">
            @for ($i = 0; $i < $so_luong; $i++)
                <div class="group-info-name">
                    <span>Họ tên</span>
                    <input value="2" data-val="true" data-val-number="The field persontype must be a number."
                        data-val-required="The persontype field is required." name="{{ $i }}.persontype_tre_em"
                        type="hidden">
                    <input class="form-control" name="{{ $i }}.fullname_tre_em"
                        placeholder="Vui lòng nhập Họ tên" required="required" type="text" value="">
                </div>
                <div class="group-info-sex">
                    <span>Giới tính</span>
                    <select class="form-control" data-val="true" data-val-number="The field gender must be a number."
                        data-val-required="The gender field is required." name="{{ $i }}.gender_tre_em"
                        placeholder="Vui lòng chọn giới tính" required="required">
                        <option selected="selected" value="-1">Giới tính</option>
                        <option value="0">Nữ</option>
                        <option value="1">Nam</option>
                    </select>
                </div>
                <div class="group-info-birthday">
                    <span>Ngày sinh</span>
                    <input type="date" name="{{ $i }}.birthday_tre_em" class="form-control"
                        placeholder="Ngày sinh" min="{{$date_min}}" max="{{$date_max}}">
                </div>

                {{-- <div class="group-info-birthday">
                    <span>Ngày sinh</span>
                    <select class="form-control" name="{{ $i }}.day_tre_em" placeholder="Vui lòng chọn ngày"
                        required="required">
                        <option value="">Ngày</option>
                        @foreach ($ngay as $key => $value)
                            <option value="{{ $value }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="group-info-month">
                    <span>&nbsp;</span>
                    <select class="form-control" name="{{ $i }}.month_tre_em"
                        placeholder="Vui lòng chọn tháng" required="required">
                        <option value="">Tháng</option>
                        @foreach ($thang as $key => $value)
                            <option value="{{ $value }}">{{ $value }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="group-info-year">
                    <span>&nbsp;</span>
                    <select class="form-control" name="{{ $i }}.year_tre_em" placeholder="Vui lòng chọn năm"
                        required="required">
                        <option value="">Năm</option>
                        @foreach ($nam_tre_em as $key => $value)
                            <option value="{{ $value }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div> --}}
            @endfor
        </div>
    </div>

@endif
