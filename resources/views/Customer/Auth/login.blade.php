@include('web layouts.master')

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
                            <a href="index.html">
                                <i class="fa fa-arrow-right next"></i>
                                عودة إلى المتجر
                            </a>
                        </span>
                    </div>
                    <div class="login-section">
                        <h2>تسجيل الدخول</h2>
                        <form action="#">
                            <input type="text" placeholder="بريدك الالكتروني">
                            <div class="password">
                                <i id="showpassword" class="far fa-eye-slash"></i>
                                <input type="password" name="" id="password" placeholder="كلمة السر">
                            </div>
                            <div class="buttons">
                                <button class="btn-one">Facebook <i class="fab fa-facebook-f"></i> </button>
                                <button class="btn-two">
                                    Gmail
                                    <img src="Web/assets/img/gmail.png" alt="">
                                </button>
                            </div>
                            <button class="log-btn"> تسجيل الدخول </button>
                            <span class="sign-up-link">
                                لست عضواً ؟
                                <a href="signup.html">
                                    سجل اللآن
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
                            <img class="welcome-img" src="Web/assets/img/welcome.png" alt="">
                        </div>
                        <div class="col-sm-5">
                            <img class="logo" src="Web/assets/img/home2-01.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Welome Side -->
@endsection
