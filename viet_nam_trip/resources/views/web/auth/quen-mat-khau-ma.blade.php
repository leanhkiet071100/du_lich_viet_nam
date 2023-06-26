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
                                <h4>Mã đã được gửi</h4>
                                <div class="line"></div>
                            </div>
                            @if ($errors->has('error'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('error') }}
                                </div>
                            @endif
                            @if (session()->has('yes'))
                                <div class="alert alert-warning">
                                    {{ session()->get('yes') }}
                                </div>
                            @endif
                            <form action="{{ route('web.auth.quen-mat-khau-xac-nhan', ['email'=>$email]) }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <input type="quen-mat-khau-ma" class="form-control" id="quen-mat-khau-ma" name="quen-mat-khau-ma" value="" placeholder="Nhập mã đã gửi">
                                    <div class="text-center">
                                        @error('quen-mat-khau-ma')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group-register">
                                    <div class="register">
                                        <p>Bạn chưa nhận được mã ư?</p><a href="{{ route('web.auth.quen-mat-khau-gui-lai-ma',['email'=>$email]) }}">Gửi lại</a>
                                    </div>
                                </div>
                                <button type="submit" class="btn vizew-btn w-100 mt-30">XÁC NHẬN</button>
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
