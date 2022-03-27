@include('web layouts.master')

@section('web_title')
    تسجيل الدخول
@endsection

@section('web_content')
    <!-- Start Header -->
    <!-- Start Welome Side -->
    <div class="welcome">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 image-side">
                    <div class="row">
                        <div class="back-home-section">
                            <a href="index.html">
                                <i class="fa fa-arrow-right next"> عودة إلى المتجر</i>
                            </a>
                        </div>
                        <div class="col-sm-5">
                            <img class="logo" src="Web/assets/img/home2-01.png" alt="">
                        </div>
                        <div class="col-sm-7">
                            <img class="welcome-img" src="Web/assets/img/signup.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-1">
                </div>
                <div class="col-sm-5 info-side">
                    <div class="login-section">
                        <h2>أنشأ حسابك</h2>
                        <form action="#">
                            <div class="name">
                                <input type="text" placeholder="الاسم">
                                <input type="text" placeholder="اسم العائلة">
                            </div>
                            <input type="password" placeholder="كلمة المرور">
                            <input type="email" placeholder="برديدك الالكتروني">
                            <div class="checkbox">
                                <label class="form-check-label" for="exampleCheck1">أوافق على الشروط و سياسات
                                    الخصوصية</label>
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            </div>
                            <button class="log-btn">اشترك</button>
                            <span class="sign-up-link">
                                أنت عضو بالفعل ؟
                                <a href="login.html">
                                    تسجيل الدخول
                                </a></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Welome Side -->
@endsection
