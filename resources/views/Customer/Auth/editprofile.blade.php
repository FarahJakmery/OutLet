@include('web layouts.master')

@section('web_title')
    تعديل الصفحة الشخصية
@endsection

@section('web_content')
    <!-- Start User Information List -->
    <div class="profile">
        <div class="user-list">
            <div class="hide-show">
                <i class="fas fa-cog"></i>
            </div>
            <div class="user-info">
                <img src="Web/assets/img/tshirt-02.png" alt="">
                <h3>اسم المستخدم</h3>
            </div>
            <div class="options">
                <div class="option">
                    <div class="overlay-bg"></div>
                    <a href="#">
                        <span class="icon">
                            <i class="far fa-user"></i>
                        </span>
                        تعديل البيانات
                    </a>
                </div>
                <div class="option active">
                    <div class="overlay-bg"></div>
                    <a href="#">
                        <span class="icon">
                            <i class="fas fa-clipboard-list"></i>
                        </span>
                        طلباتي
                    </a>
                </div>
                <div class="option">
                    <div class="overlay-bg"></div>
                    <a href="#">
                        <span class="icon">
                            <i class="far fa-heart"></i>
                        </span>
                        المفضلة
                    </a>
                </div>
                <div class="option">
                    <div class="overlay-bg"></div>
                    <a href="#">
                        <span class="icon">
                            <i class="fas fa-sign-out-alt fa-rotate-180"></i>
                        </span>
                        تسجيل الخروج
                    </a>
                </div>
            </div>
        </div>
        <div class="edit-profile">
            <header>
                <h2 class="title">عربة التسوق</h2>

            </header>
            <div class="container-fluid">
                <form action="#">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="change-image">
                                <img src="Web/assets/img/tshirt-02.png" alt="">
                                <button>تغيير</button>
                            </div>
                        </div>
                        <div class="col-sm-9 inputs">
                            <div class="line-one">
                                <div class="user-name">
                                    <span>اسم المستخدم</span>

                                    <input type="text">
                                </div>
                                <div class="email">
                                    <span>عنوان البريد الالكتروني</span>

                                    <input type="email" name="" id="">
                                </div>
                            </div>
                            <div class="line-two">
                                <div class="first-name">
                                    <span>الاسم</span>

                                    <input type="text">
                                </div>
                                <div class="last-name">
                                    <span>اللقب</span>

                                    <input type="text">
                                </div>
                            </div>
                            <div class="line-three">
                                <span>العنوان</span>
                                <input type="text">
                            </div>
                            <div class="line-four">
                                <div class="city">
                                    <span>المدينة</span>
                                    <input type="text">
                                </div>
                                <div class="country">
                                    <span>الدولة</span>
                                    <input type="text">
                                </div>
                                <div class="ZIP">
                                    <span>الرمز البريدي</span>
                                    <input type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End User Information List -->
@endsection
