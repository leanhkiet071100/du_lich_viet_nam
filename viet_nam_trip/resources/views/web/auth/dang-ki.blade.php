@extends('web.layouts.app')

@section('content')
    @parent
    @include('web.includes.banner')
    <!-- dăng nhập -->
    <section class="ftco-section contact-section ftco-degree-bg">
        <div class="vizew-login-area section-padding-80">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6">
                        <div class="login-content">
                            <!-- Section Title -->
                            <div class="section-heading">
                                <h4>Đăng kí tài khoản</h4>
                                <div class="line"></div>
                            </div>
                            @if ($errors->has('error'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('error') }}
                                </div>
                            @endif
                            <form action="{{ route('web.auth.dang-ki') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="ho-ten"
                                        placeholder="Họ và tên" value="{{ old('ho-ten') ?? $ho_ten }}">
                                    <div class="text-center">
                                        @error('ho-ten')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="mat-khau"
                                        placeholder="mật khẩu" value="{{ old('mat-khau') ?? $mat_khau }}">
                                    <div class="text-center">
                                        @error('mat-khau')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                        placeholder="Email" value="{{ old('email') ?? $email }}">
                                    <div class="text-center">
                                        @error('email')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="sdt"
                                        placeholder="Số điện thoại" value="{{ old('sdt') ?? $sdt }}">
                                    <div class="text-center">
                                        @error('sdt')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- <div class="form-group">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                    <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                                </div>
                            </div> --}}
                                <div class="form-group-forgot-password">
                                    <div class="forgot-password">
                                        <a href="{{route('web.auth.quen-mat-khau')}}">Quên mật khẩu</a>

                                    </div>
                                </div>
                                <div class="form-group-register">
                                    <div class="register">
                                        <p>Bạn đã có tài khoản?</p><a href="{{ route('web.auth.dang-nhap') }}">Đăng nhập</a>
                                    </div>
                                </div>
                                <button type="submit" class="btn vizew-btn w-100 mt-30">ĐĂNG KÍ</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#login').addClass('active');
        });
    </script>
@endsection
