@extends('web.layouts.app')

@section('content')
    @parent
    {{-- {{-- @include('web.includes.banner') --}}
    <!-- dăng nhập --> --}}
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

                            <form action="{{ route('web.auth.post-quen-mat-khau') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                        value="{{ old('email') ?? $email}}" placeholder="Vùi lòng nhập email">
                                    <div class="text-center">
                                        @error('email')
                                            <span style="color:red"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group-register">
                                    <div class="register">
                                        <p>Bạn chưa có tài khoản ư?</p><a href="{{ route('web.auth.dang-ki') }}">Đăng kí</a>
                                    </div>
                                </div>
                                <button type="submit" class="btn vizew-btn w-100 mt-30">Tìm kiếm</button>
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
