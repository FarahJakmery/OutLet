@extends('webLayouts.master')

@section('web_title')
    قائمة الطلبات
@endsection

@section('web_content')
    <!-- Start User Information List -->
    <div class="empty padbtm40">
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
        <div class="empty-cart">
            <header>
                <h2 class="title">
                    الطلبات
                </h2>
            </header>
            <div class="empty-order-list text-center">
                <img src="Web/assets/img/empty.png" alt="">
                <h1>قائمة الطلبات فارغة</h1>
                <div class="messege-body">
                    يبدو أنه ليس لديك طلبات<br>
                    اطلب الآن
                </div>
                <button>متابعة الشراء</button>
            </div>
        </div>
    </div>
    <!-- End User Information List -->
@endsection
