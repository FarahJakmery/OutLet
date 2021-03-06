@extends('webLayouts.master')

@section('web_title')
    تسجيل الدخول
@endsection

@section('web_content')
    <!-- Start Welome Side -->
    <div class="welcome padbtm40">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 info-side">
                    <div class="first-section">
                        <span>
                            <a href="{{ route('user.home') }}">
                                <i class="fa fa-arrow-right next"></i>
                                عودة إلى المتجر
                            </a>
                        </span>
                    </div>
                    <div class="login-section">
                        <h2>تسجيل الدخول</h2>
                        <form action="{{ route('user.check') }}" method="POST">
                            @if (Session::get('fail'))
                                <div class="alert alert-danger">
                                    {{ Session::get('fail') }}
                                </div>
                            @endif
                            @if (Session::get('Ok'))
                                <div class="alert alert-danger">
                                    {{ Session::get('Ok') }}
                                </div>
                            @endif
                            {{ csrf_field() }}
                            <div class="input-feild">
                                <span class="icon">
                                    <i class="fa-solid fa-at"></i>
                                </span>
                                <input name="email" value="{{ old('email') }}" type="text" placeholder="بريدك الالكتروني"
                                    required autocomplete="email">
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="input-feild">
                                <span class="icon">
                                    <i class="fas fa-key"></i>
                                </span>
                                <div class="password">
                                    <i id="showpassword" class="far fa-eye-slash"></i>
                                    <input name="password" value="{{ old('password') }}" type="password" id="password"
                                        placeholder="كلمة السر" required autocomplete="current-password">
                                    <span class="text-danger">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="buttons">
                                <button class="btn-one">
                                    Facebook
                                    <i class="fab fa-facebook-f"></i>
                                </button>
                                <button class="btn-two">
                                    Gmail
                                    <img src="{{ URL::asset('Web/assets/img/gmail.png') }}" alt="">
                                </button>
                            </div>
                            <button class="log-btn" type="submit">
                                تسجيل الدخول
                            </button>
                            <span class="sign-up-link">
                                لست عضواً ؟
                                <a href="{{ route('user.register') }}">
                                    سجل الآن
                                </a>
                            </span>
                        </form>
                    </div>
                </div>
                <div class="col-sm-1">

                </div>
                <div class="col-sm-6 image-side">
                    <div class="row">
                        <div class="col-sm-7">
                            <img class="welcome-img" src="{{ URL::asset('Web/assets/img/welcome.png') }}" alt="">
                        </div>
                        <div class="col-sm-5">
                            <img class="logo" src="{{ URL::asset('Web/assets/img/home2-01.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Welome Side -->
@endsection
