@extends('webLayouts.master')

@section('web_title')
    الملخص
@endsection

@section('web_content')
    <!-- Start Complete Process -->
    <div class="cart-process">
        <div class="container">
            <header>
                <h2 class="title">ملخص</h2>
                <div class="payment-methods">
                    <ul class="icons">
                        <li class="icon"><i class="fas fa-shopping-cart fa-lg"></i></li>
                        <li class="line"></li>
                        <li class="icon"><i class="fa fa-truck-moving"></i></li>
                        <li class="line"></li>
                        <li class="icon active"><i class="fas fa-hand-holding-usd"></i></li>
                    </ul>
                </div>
            </header>
            <div class="row">
                <div class="col-md-8">
                    <h6>عربتك</h6>
                    <div class="cart-content item-container">
                        <ul class="cart-item">
                            <li class="img">
                                <img src="{{ URL::asset('Web/assets/img/img-item.png') }}" alt="">
                            </li>
                            <li class="type">
                                T-shirt Summer Vibes
                                <span>#261311</span>
                            </li>
                            <li>Black</li>
                            <li>XL</li>
                            <li class="price">$<span class="item-price">120.99</span></li>
                        </ul>
                        <ul class="cart-item">
                            <li class="img">
                                <img src="{{ URL::asset('Web/assets/img/img-item.png') }}" alt="">
                            </li>
                            <li class="type">
                                T-shirt Summer Vibes
                                <span>#212315</span>
                            </li>
                            <li>Red</li>
                            <li>XL</li>
                            <li class="price">$<span class="item-price">89.99</span></li>
                        </ul>
                    </div>
                    <div class="buttons">
                        <div class="total-price">
                            التكلفة الاجمالية
                            <span class="total">$<span id="abs-total-price">159.96</span></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h6 class="adress-header">عنوان التسليم</h6>
                    <ul class="delevary-adress">
                        <li>Fleen Flouleni</li>
                        <li>الرياض و شارع 1391</li>
                        <li>المملكة العربية السعودية</li>
                        <li>+5 781-644-3627</li>
                        <li>FleenFlouleni@gmail.com</li>
                    </ul>
                    <div class="buttons">
                        <button class="mrg-auto change-adress">تغيير العنوان</button>
                    </div>
                </div>
            </div>

            <div class="continue-shopping">
                <div class="row">
                    <div class="col-md-7 shipping">
                        <div class="right">
                            <a href="#">
                                <span class="icon">
                                    <i class="fa fa-arrow-right"></i>
                                </span>
                                الرجوع
                            </a>
                        </div>
                        <div class="left">
                            <i class="fa fa-truck-moving"></i>
                            <span>لقد وفرت 30.02 دولار للشحن المجاني</span>
                        </div>
                    </div>
                    <div class="col-md-5 buttons">
                        <a href="#" class="continue-shopping-btn">مواصلة التسوق</a>
                        <a href="#" class="confirm">تأكيد</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Complete Process -->
@endsection
