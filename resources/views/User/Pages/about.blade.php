@extends('webLayouts.master')

@section('web_title')
    من نحن
@endsection

@section('web_content')
    <!-- Start About Us -->
    <div class="about-us">
        <div class="container">
            <div class="row">
                <div class=" offset-lg-2 col-lg-3 col-md-4 col-sm-6 col-xs-6">
                    <img src="{{ asset('Web/assets/img/home2-01.png') }}" alt="">
                </div>
                <div class="col-lg-6 col-md-8 col-sm-6 col-xs-6">
                    <h2>OutletShip</h2>
                    <p class="about-us">
                        {{ $about->translate('ar')->text }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Us -->
    <!-- Start Subscribe -->
    <div class="subscribe padbtm40">
        <div class="container">
            <div class="overlay-black"></div>
            <div class="subscribe-info">
                <p>اشتر بمجلتنا لتستقبل العروض الحصرية كل اسبوع.</p>
                <form action="">
                    <input type="text">
                    <button>الاشتراك</button>
                </form>
            </div>
        </div>
    </div>
    <!-- End Subscribe -->
    <!-- Start Instagram -->
    <div class="instagram">
        <div class="insta-imgs">
            <img src="{{ asset('Web/assets/img/instagram-1.png') }}" alt="">
            <img src="{{ asset('Web/assets/img/instagram-2.png') }}" alt="">
            <img src="{{ asset('Web/assets/img/instagram-3.png') }}" alt="">
            <img src="{{ asset('Web/assets/img/instagram-4.png') }}" alt="">
            <img src="{{ asset('Web/assets/img/instagram-5.png') }}" alt="">
            <img src="{{ asset('Web/assets/img/instagram-6.png') }}" alt="">
            <img src="{{ asset('Web/assets/img/instagram-7.png') }}" alt="">
        </div>
        <div class="insta-info">
            <a href="#">
                <p>مراجعة انستغرام
                </p>
            </a>
            <span></span>
        </div>
    </div>
    <!-- End Instagram -->
@endsection
