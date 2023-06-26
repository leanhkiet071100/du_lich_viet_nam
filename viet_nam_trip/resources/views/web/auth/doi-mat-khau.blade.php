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
                                <h4>Tìm tài khoản của bạn</h4>
                                <div class="line"></div>
                            </div>
                            @if ($errors->has('error'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('error') }}
                                </div>
                            @endif

                            <form action="{{route('web.auth.post-doi-mat-khau', ['email'=>$email])}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <input type="password" class="form-control" id="mat-khau-moi" name="mat-khau-moi" value="{{ old('mat-khau-moi')}}" placeholder="Bạn hãy nhập mật khẩu mới">
                                    <div class="text-center">
                                        @error('mat-khau-moi')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="xac-nhan-mat-khau-moi" name="xac-nhan-mat-khau-moi"  value="{{ old('xac-nhan-mat-khau-moi')}}" placeholder="Xác nhận mật khẩu">
                                    <div class="text-center">
                                        @error('xac-nhan-mat-khau-moi')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>>
                                <button type="submit" class="btn vizew-btn w-100 mt-30">Đổi mật khẩu</button>
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
