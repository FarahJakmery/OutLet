@extends('webLayouts.master')

@section('web_title')
    إنشاء حساب
@endsection

@section('web_content')
    <!-- Start Welome Side -->
    <div class="welcome">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 image-side">
                    <div class="row">
                        <div class="back-home-section">
                            <a href="{{ route('user.home') }}">
                                <i class="fa fa-arrow-right next"></i>
                                عودة إلى المتجر
                            </a>
                        </div>
                        <div class="col-sm-5">
                            <img class="logo" src="{{ URL::asset('Web/assets/img/home2-01.png') }}" alt="">
                        </div>
                        <div class="col-sm-7">
                            <img class="welcome-img" src="{{ URL::asset('Web/assets/img/signup.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-1">
                </div>
                <div class="col-sm-5 info-side">
                    <div class="login-section">
                        <h2>أنشئ حسابك</h2>
                        <form action="{{ route('user.create') }}" method="POST">
                            @if (Session::get('fail'))
                                <div class="alert alert-danger">
                                    {{ Session::get('fail') }}
                                </div>
                            @endif
                            {{ csrf_field() }}
                            <div class="name">
                                <div class="input-feild">
                                    <span class="icon">
                                        <i class="fa-solid fa-user"></i>
                                    </span>
                                    <input name="first_name" value="{{ old('first_name') }}" type="text"
                                        placeholder="الاسم" required>
                                </div>
                                <div class="input-feild">
                                    <span class="icon">
                                        <i class="fa-solid fa-users"></i>
                                    </span>
                                    <input name="last_name" value="{{ old('last_name') }}" type="text"
                                        placeholder="اسم العائلة" required>
                                </div>

                            </div>
                            <div class="input-feild">
                                <span class="icon">
                                    <i class="fas fa-key"></i>
                                </span>
                                <div class="password">
                                    <i id="showpassword" class="far fa-eye-slash"></i>
                                    <input type="password" name="password" value="{{ old('password') }}" id="password"
                                        placeholder="كلمة السر" required>
                                </div>
                            </div>
                            <div class="input-feild">
                                <span class="icon">
                                    <i class="fas fa-key"></i>
                                </span>
                                <div class="password">
                                    <i id="showpassword" class="far fa-eye-slash"></i>
                                    <input type="password" name="password_confirmation"
                                        value="{{ old('password_confirmation') }}" id="password"
                                        placeholder="تأكيد كلمة السر" required>
                                </div>
                            </div>
                            <div class="input-feild">
                                <span class="icon">
                                    <i class="fa-solid fa-at"></i>
                                </span>
                                <input name="email" value="{{ old('email') }}" type="email"
                                    placeholder="برديدك الالكتروني" required>
                            </div>
                            <div class="input-feild">
                                <span class="icon"><i class="fas fa-mobile-alt"></i></span>
                                <input name="mobile_number" value="{{ old('mobile_number') }}" type="text"
                                    placeholder="رقم الموبايل" required>
                            </div>
                            <div class="checkbox">
                                <label class="form-check-label" for="exampleCheck1" required>
                                    أوافق على الشروط و سياسات الخصوصية
                                </label>
                                <input name="checkbox" type="checkbox" class="form-check-input" id="exampleCheck1">
                            </div>
                            <button class="log-btn" type="submit">
                                اشترك
                            </button>
                            <span class="sign-up-link">
                                أنت عضو بالفعل ؟
                                <a href="{{ route('user.check') }}">
                                    تسجيل الدخول
                                </a>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Welome Side -->
@endsection
