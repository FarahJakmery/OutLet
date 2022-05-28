@include('web layouts.master')

@section('web_title')
    إعادة تعيين كلمة المرور
@endsection

@section('web_content')
    <!-- Start Welome Side -->
    <div class="welcome padbtm40">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 info-side">
                    <div class="first-section">
                        <a href="index.html">
                            <i class="fa fa-arrow-right next"> </i>
                            عودة إلى المتجر
                        </a>
                    </div>
                    <div class="login-section">
                        <h2>نسيت كلمة المرور ؟</h2>
                        <form action="#">
                            <input type="text" placeholder="بريدك الالكتروني">
                            <div class="lines">
                                <div class="line"></div>
                                <div class="clear"></div>
                                <div class="line"></div>
                            </div>

                            <button class="log-btn pass-forg"> إعادة تعيين كلمة المرور </button>
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
