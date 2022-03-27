@include('web layouts.master')

@section('web_title')
    مرحبا
@endsection

@section('web_content')
    <!-- Start Header -->
    <!-- Start Welome Side -->
    <div class="welcome padbtm40">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 info-side">
                    <div class="first-section">
                        <i class="fa fa-arrow-right next"> عودة إلى المتجر</i>
                    </div>
                    <div class="second-section">
                        <span class="shop">
                            لنتسوق معاً
                        </span>
                        <h1 class="welcome-title">
                            أهلا بك في
                        </h1>
                        <h1>Outletship</h1>
                        <div class="buttons">
                            <a href="#" class="btn-one">
                                <span class="text">
                                    تسجيل الدخول
                                    <span class="icon">
                                        <i class="fa fa-arrow-left"> </i>
                                    </span>
                                </span>
                            </a>
                            <a href="#" class="btn-two"><span class="text">إنشاء حساب</span> </a>
                        </div>
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
