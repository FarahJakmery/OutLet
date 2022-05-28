@extends('webLayouts.master')

@section('web_title')
    الصفحة الرئيسية
@endsection

@section('web_content')
    <!-- Start Header -->
    <div class="header padbtm40">
        <div class="container">
            <div class="header-container">
                <div class="clothes-section">
                    <ul>
                        <li>
                            <div class="clothes-type">
                                <a href="#">
                                    <span class="overlay-clothes"></span>
                                </a>
                                <p>بنطالوات</p>
                            </div>
                        </li>
                        <li>
                            <div class="clothes-type">
                                <a href="#">
                                    <span class="overlay-clothes"></span>
                                </a>
                                <p>أحذية</p>
                            </div>
                        </li>
                        <li>
                            <div class="clothes-type">
                                <a href="#">
                                    <span class="overlay-clothes"></span>
                                </a>
                                <p>فساتين</p>
                            </div>
                        </li>
                        <li>
                            <div class="clothes-type">
                                <a href="#">
                                    <span class="overlay-clothes"></span>
                                </a>
                                <p>كنزات</p>
                            </div>
                        </li>
                        <li>
                            <div class="clothes-type">
                                <a href="#">
                                    <span class="overlay-clothes"></span>
                                </a>
                                <p>الجديد</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="side-bar">
                    <a href="#">
                        <i class="fab fa-facebook-messenger"></i>
                    </a>
                    <a href="#">
                        <i class="fas fa-dollar-sign"></i>
                    </a>
                    <a href="#">
                        <img src="Web/assets/img/icon/ammerica.png" alt="">
                    </a>

                </div>
                <div class="header-slider swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="header-content" style="background-image: url(img/home-slider01.png);">
                                <div class="overlay-header"></div>
                                <div class="text-on">
                                    <p>اشترِ من مجموعة الصيف</p>
                                    <h1>لتجعل</h1>
                                    <h1 class="under">منك الأفضل</h1>
                                    <span><a href="#">
                                            <i class="fa fa-arrow-left"></i><span>تسوق الآن</span>
                                        </a></span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="header-content" style="background-image: url(img/home-slider01.png);">
                                <div class="overlay-header"></div>
                                <div class="text-on">
                                    <p>اشترِ من مجموعة الصيف</p>
                                    <h1>لتجعل</h1>
                                    <h1 class="under">منك الأفضل</h1>
                                    <span><a href="#">
                                            <i class="fa fa-arrow-left"></i><span>تسوق الآن</span>
                                        </a></span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="header-content" style="background-image: url(img/home-slider01.png);">
                                <div class="overlay-header"></div>
                                <div class="text-on">
                                    <p>اشترِ من مجموعة الصيف</p>
                                    <h1>لتجعل</h1>
                                    <h1 class="under">منك الأفضل</h1>
                                    <span><a href="#">
                                            <i class="fa fa-arrow-left"></i><span>تسوق الآن</span>
                                        </a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-scrollbar">
                        <span class="scroll-count min-count">01</span>
                        <span class="scroll-count max-count">01</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header -->

    <!-- Start Collection -->
    <div class="collection padbtm40">
        <div class="container">
            <div class="row collection-small">
                <div class="collection-group collection-one col-md-5 col-xs-12">
                    <div class="overlay-black"></div>
                    <div class="text-on">
                        <h3>وصلنا حديثاً</h3>
                        <h3>تسوق الأن</h3>
                        <a>عرض المجموعة</a>
                    </div>
                    <img src="Web/assets/img/collection01.png" alt="">
                </div>
                <div class="collection-group  collection-two col-md-3 col-xs-6">
                    <img src="Web/assets/img/collectio02.png" alt="">
                    <div class="overlay-black"></div>
                    <div class="text-on">
                        <h3>قمصان أساسية</h3>
                        <h3>$29.99</h3>
                        <a>عرض المجموعة</a>
                    </div>
                </div>
                <div class="collection-group  collection-three col-md-3 col-xs-6">
                    <div class="overlay-black"></div>
                    <img src="Web/assets/img/collection03.png" alt="">
                    <div class="text-on">
                        <h3>اشترِ هذا </h3>
                        <h3>الصيف</h3>
                        <a>عرض المجموعة</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Collection -->

    <!-- Start Services -->
    <div class="service padbtm40">
        <div class="container">
            <h3 class="section-header">لماذا قد تختارنا ؟</h3>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <span class="icon-service mrg-auto">
                        <i class="fa fa-truck-moving"></i>
                    </span>
                    <h1>الشحن مجاناً</h1>
                    <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى،
                    </p>
                </div>
                <div class="col-md-3 col-sm-6">
                    <span class="icon-service mrg-auto">
                        <i class="fas fa-hand-holding-usd active"></i>
                    </span>
                    <h1>مدفوعات سهلة</h1>
                    <p>تتم معالجة المدفوعات على الفور عبر بروتكول دفع آمن</p>
                </div>
                <div class="col-md-3 col-sm-6">
                    <span class="icon-service mrg-auto">
                        <i class="fa fa-dollar-sign"></i>
                    </span>
                    <h1>ضمان استعمال الأموال</h1>
                    <p>إذاوصل عنصرا تالفاً أو أنت غيرت رأيك ,يمكنك إارسالها العودة لاسترداد كامل المبلغ</p>
                </div>
                <div class="col-md-3 col-sm-6">
                    <span class="icon-service mrg-auto">
                        <i class="fa fa-cube"></i>
                    </span>
                    <h1>أفضل نوعية</h1>
                    <p>مصممة لتدوم ,كل منتج من منتجاتنا به مصنوع من أجود المواد</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Services -->

    <!-- Start Slider -->
    <div class="fast-price-slider padbtm40">
        <div class="container">
            <h3 class="section-header">السعر السريع</h3>
            <div class="slider-container-index">
                <div class="child main-slider swiper swiper-padbtm88 ">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href="#">
                                <img src="Web/assets/img/newCollection-01.png" alt="">
                            </a>
                            <div class="timer-collec">
                                <h4>السعر قادم في</h4>
                                <div class="timer" id="timer" data-date="jan 20, 2022 01:30:00">
                                </div>
                            </div>
                            <div class="info-collec">
                                <span>T-shirt Summer Vibes</span>
                                <div class="price">
                                    <span class="new">$89.99</span>
                                    <span class="old">$119.99</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <a href="#">
                                <img src="Web/assets/img/newCollection-02.png" alt="">
                            </a>
                            <div class="timer-collec">
                                <h4>السعر قادم في</h4>
                                <div class="timer" id="timer" data-date="jan 20, 2022 08:30:00">
                                </div>
                            </div>
                            <div class="info-collec">
                                <span>T-shirt Summer Vibes</span>
                                <div class="price">
                                    <span class="new">$89.99</span>
                                    <span class="old">$119.99</span>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="swiper-slide">
                                                            <a href="#">
                                                                <img src="Web/assets/img/newCollection-03.png" alt="">
                                                            </a>
                                                            <div class="timer-collec">
                                                                <h4>السعر قادم في</h4>
                                                                <div class="timer" id="timer" data-date="jan 20, 2022 11:30:00">
                                                                </div>
                                                            </div>
                                                            <div class="info-collec">
                                                                <span>T-shirt Summer Vibes</span>
                                                                <div class="price">
                                                                    <span class="new">$89.99</span>
                                                                    <span class="old">$119.99</span>
                                                                </div>
                                                            </div>
                                                        </div> -->
                    </div>
                </div>
                <span class="main-slider-btn-next slider-next-btn">
                    <i class="fa fa-arrow-right"></i>
                </span>
                <span class="main-slider-btn-prev slider-prev-btn">
                    <i class="fa fa-arrow-left"></i>
                </span>
            </div>
        </div>
    </div>
    <!-- End Slider -->

    <!-- Start Bag Offer -->
    <div class="bag-offer padbtm40">
        <div class="container">
            <div class="row bag-offer-small">
                <div class="bag2 col-sm-6">
                    <img src="Web/assets/img/bag-offer02.png" alt="">
                    <div class="bag-info">
                        <p>اشترِ حقيبتين و </p>
                        <h2><span>70%</span> تخفيض</h2>
                        <h2>لمنتجين</h2>
                        <a href="#">تسوق الآن</a>
                    </div>
                </div>
                <div class="col-sm-6 bag1">
                    <img src="Web/assets/img/bag-offer01.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- End Bag Offer -->

    <!-- Start Gallery -->
    <div class="gallery gallery-shuffle padbtm40">
        <div class="container">
            <h3 class="section-header">اشتر بلحظة</h3>
            <div class="buttons">
                <div class="row">
                    <div class="col-sm-6 options">
                        <button class="active" data-type="all">عرض الكل</button>
                        <button data-type=".White"> أبيض</button>
                        <button data-type=".Dark"> أسود</button>
                        <button data-type=".Yellow"> أصفر </button>
                    </div>
                    <div class="col-sm-6">
                        <a href="#" class="view-more">أظهر المزيد</a>
                    </div>
                </div>
            </div>
            <div class="slider-container-gallery padrghtltf0">
                <div class="gallery-slider swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <span class="offer">30%</span>
                            <a href="#">
                                <img class="Dark" src="Web/assets/img/summer-01.png" alt="">
                            </a>
                            <div class="info-collec">
                                <p>T-shirt Summer Vibes</p>
                                <div class="price">
                                    <span class="old">$119,99</span>
                                    <span class="new">$89.99</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <span class="offer">30%</span>
                            <a href="#">
                                <img class="White" src="Web/assets/img/summer-02.png" alt="">
                            </a>
                            <div class="info-collec">
                                <p>T-shirt Summer Vibes</p>
                                <div class="price">
                                    <span class="old">$119,99</span>
                                    <span class="new">$89.99</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <span class="offer">30%</span>
                            <a href="#">
                                <img class="Yellow" src="Web/assets/img/summer-03.png" alt="">
                            </a>
                            <div class="info-collec">
                                <p>T-shirt Summer Vibes</p>
                                <div class="price">
                                    <span class="old">$119,99</span>
                                    <span class="new">$89.99</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <span class="offer">30%</span>
                            <a href="#">
                                <img class="Dark" src="Web/assets/img/summer-04.png" alt="">
                            </a>
                            <div class="info-collec">
                                <p>T-shirt Summer Vibes</p>
                                <div class="price">
                                    <span class="old">$119,99</span>
                                    <span class="new">$89.99</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <span class="offer">30%</span>
                            <a href="#">
                                <img class="White" src="Web/assets/img/summer-05.png" alt="">
                            </a>
                            <div class="info-collec">
                                <p>T-shirt Summer Vibes</p>
                                <div class="price">
                                    <span class="old">$119,99</span>
                                    <span class="new">$89.99</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <span class="offer">30%</span>
                            <a href="#">
                                <img class="White" src="Web/assets/img/summer-06.png" alt="">
                            </a>
                            <div class="info-collec">
                                <p>T-shirt Summer Vibes</p>
                                <div class="price">
                                    <span class="old">$119,99</span>
                                    <span class="new">$89.99</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <span class="offer">30%</span>
                            <a href="#">
                                <img class="Yellow" src="Web/assets/img/summer-07.png" alt="">
                            </a>
                            <div class="info-collec">
                                <p>T-shirt Summer Vibes</p>
                                <div class="price">
                                    <span class="old">$119,99</span>
                                    <span class="new">$89.99</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span class="gallery-slider-btn-next slider-next-btn">
                        <i class="fa fa-arrow-right"></i>
                    </span>
                    <span class="gallery-slider-btn-prev slider-prev-btn">
                        <i class="fa fa-arrow-left"></i>
                    </span>
                </div>
            </div>
            <!-- <div class="gallery-slider">
                                                <div class="item">
                                                    <span class="offer">30%</span>
                                                    <img class="Dark"  src="Web/assets/img/summer-01.png" alt="">
                                                    <div class="item-info">
                                                        <p>T-shirt Summer Vibes</p>
                                                        <div class="price">
                                                            <span class="old">$119,99</span>
                                                            <span class="new">$89.99</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <span class="offer">30%</span>
                                                    <img class="White"  src="Web/assets/img/summer-02.png" alt="">
                                                    <div class="item-info">
                                                        <p>T-shirt Summer Vibes</p>
                                                        <div class="price">
                                                            <span class="old">$119,99</span>
                                                            <span class="new">$89.99</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <span class="offer">30%</span>
                                                    <img class="Yellow"  src="Web/assets/img/summer-03.png" alt="">
                                                    <div class="item-info">
                                                        <p>T-shirt Summer Vibes</p>
                                                        <div class="price">
                                                            <span class="old">$119,99</span>
                                                            <span class="new">$89.99</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <span class="offer">30%</span>
                                                    <img class="Dark"  src="Web/assets/img/summer-04.png" alt="">
                                                    <div class="item-info">
                                                        <p>T-shirt Summer Vibes</p>
                                                        <div class="price">
                                                            <span class="old">$119,99</span>
                                                            <span class="new">$89.99</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <span class="offer">30%</span>
                                                    <img class="White"  src="Web/assets/img/summer-05.png" alt="">
                                                    <div class="item-info">
                                                        <p>T-shirt Summer Vibes</p>
                                                        <div class="price">
                                                            <span class="old">$119,99</span>
                                                            <span class="new">$89.99</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <span class="offer">30%</span>
                                                    <img class="White"  src="Web/assets/img/summer-06.png" alt="">
                                                    <div class="item-info">
                                                        <p>T-shirt Summer Vibes</p>
                                                        <div class="price">
                                                            <span class="old">$119,99</span>
                                                            <span class="new">$89.99</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <span class="offer">30%</span>
                                                    <img class="Yellow"  src="Web/assets/img/summer-07.png" alt="">
                                                    <div class="item-info">
                                                        <p>T-shirt Summer Vibes</p>
                                                        <div class="price">
                                                            <span class="old">$119,99</span>
                                                            <span class="new">$89.99</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
        </div>
    </div>
    <!-- End Gallery -->

    <!-- Start Fashion Sale  -->
    <div class="fashion-sale padbtm40">
        <div class="container">
            <div class="slider-container-gallery padrghtltf0">
                <div class="fashion-slider swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="sale-row">
                                <div class="side-two">
                                    <img src="Web/assets/img/fashion-sale02.png" alt="">
                                </div>
                                <div class="side-one">
                                    <img src="Web/assets/img/fashion-sale01.png" alt="">
                                </div>
                                <div class="sale-info">
                                    <h3>ارتديها</h3>
                                    <h5>بطريقتك</h5>
                                    <h3>50% عرض</h3>
                                    <h5>مبيعات الأزياء</h5>
                                    <a href="#">تسوق الآن</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span class="fashion-btn-next slider-next-btn">
                        <i class="fa fa-arrow-right"></i>
                    </span>
                    <span class="fashion-btn-prev slider-prev-btn">
                        <i class="fa fa-arrow-left"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- End Fashion Sale  -->

    <!-- Start Second Gallery -->
    <div class="container padbtm40">
        <h3 class="section-header">مختارة خصيصاً لك</h3>
        <div class="slider-container-gallery padrghtltf0">
            <div class="gallery-slider swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <span class="offer">30%</span>
                        <a href="#">
                            <img class="Dark" src="Web/assets/img/tshirt-01.png" alt="">
                        </a>
                        <div class="info-collec">
                            <p>T-shirt Summer Vibes</p>
                            <div class="price">
                                <span class="old">$119,99</span>
                                <span class="new">$89.99</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <span class="offer">30%</span>
                        <a href="#">
                            <img class="Dark" src="Web/assets/img/tshirt-02.png" alt="">
                        </a>
                        <div class="info-collec">
                            <p>T-shirt Summer Vibes</p>
                            <div class="price">
                                <span class="old">$119,99</span>
                                <span class="new">$89.99</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <span class="offer">30%</span>
                        <a href="#">
                            <img class="Dark" src="Web/assets/img/tshirt-03.png" alt="">
                        </a>
                        <div class="info-collec">
                            <p>T-shirt Summer Vibes</p>
                            <div class="price">
                                <span class="old">$119,99</span>
                                <span class="new">$89.99</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <span class="offer">30%</span>
                        <a href="#">
                            <img class="Dark" src="Web/assets/img/tshirt-04.png" alt="">
                        </a>
                        <div class="info-collec">
                            <p>T-shirt Summer Vibes</p>
                            <div class="price">
                                <span class="old">$119,99</span>
                                <span class="new">$89.99</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <span class="offer">30%</span>
                        <a href="#">
                            <img class="Dark" src="Web/assets/img/tshirt-05.png" alt="">
                        </a>
                        <div class="info-collec">
                            <p>T-shirt Summer Vibes</p>
                            <div class="price">
                                <span class="old">$119,99</span>
                                <span class="new">$89.99</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <span class="offer">30%</span>
                        <a href="#">
                            <img class="Dark" src="Web/assets/img/tshirt-06.png" alt="">
                        </a>
                        <div class="info-collec">
                            <p>T-shirt Summer Vibes</p>
                            <div class="price">
                                <span class="old">$119,99</span>
                                <span class="new">$89.99</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <span class="offer">30%</span>
                        <a href="#">
                            <img class="Dark" src="Web/assets/img/tshirt-07.png" alt="">
                        </a>
                        <div class="info-collec">
                            <p>T-shirt Summer Vibes</p>
                            <div class="price">
                                <span class="old">$119,99</span>
                                <span class="new">$89.99</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <span class="offer">30%</span>
                        <a href="#">
                            <img class="Dark" src="Web/assets/img/tshirt-08.png" alt="">
                        </a>
                        <div class="info-collec">
                            <p>T-shirt Summer Vibes</p>
                            <div class="price">
                                <span class="old">$119,99</span>
                                <span class="new">$89.99</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <span class="gallery-slider-btn-next slider-next-btn">
                <i class="fa fa-arrow-right"></i>
            </span>
            <span class="gallery-slider-btn-prev slider-prev-btn">
                <i class="fa fa-arrow-left"></i>
            </span>
        </div>
    </div>
    <!-- End Second Gallery -->

    <!-- Start Summer Sales -->
    <div class="summer-sale padbtm40">
        <div class="container">
            <div class="slider-container-index padrghtltf0">
                <div class="summer-sale-slider swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <!-- <div class="item"> -->
                            <div class="sale-row">
                                <div class="side-two">
                                    <div class="second">
                                        <span>Summer</span>
                                        <span>Fashion Sales</span>
                                    </div>
                                    <div class="first">
                                        <span>تسوق</span>
                                        <span>أونلاين</span>
                                        <span>فقط</span>
                                        <span><a href="#">أدخل الرمز</a></span>
                                    </div>
                                </div>
                                <div class="side-one">
                                    <img src="Web/assets/img/summer-sale-01.jfif" alt="">
                                </div>
                            </div>
                            <!-- </div> -->
                        </div>
                    </div>
                    <span class="summer-btn-next slider-next-btn">
                        <i class="fa fa-arrow-right"></i>
                    </span>
                    <span class="summer-btn-prev slider-prev-btn">
                        <i class="fa fa-arrow-left"></i>
                    </span>
                </div>
            </div>

        </div>
    </div>
    <!-- End Summer Sales -->

    <!-- Start Brnds -->
    <div class="brand padbtm40">
        <div class="container">
            <h3 class="section-header">ماركات</h3>
            <div class="slider-container-gallery padrghtltf0">
                <div class="brand-slider swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide item">
                            <img src="Web/assets/img/BullBear.png" alt="">
                            <div class="logo">
                                <img src="Web/assets/img/pullBear-logo.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide item">
                            <img src="Web/assets/img/stradeVius.png" alt="">
                            <div class="logo">
                                <img src="Web/assets/img/strade-logo.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide item">
                            <img src="Web/assets/img/Zara.png" alt="">
                            <div class="logo">
                                <img src="Web/assets/img/zara-logo.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide item">
                            <img src="Web/assets/img/HM.png" alt="">
                            <div class="logo">
                                <img src="Web/assets/img/HM-logo.png" alt="">
                            </div>
                        </div>
                    </div>
                    <span class="brand-btn-next slider-next-btn">
                        <i class="fa fa-arrow-right"></i>
                    </span>
                    <span class="brand-btn-prev slider-prev-btn">
                        <i class="fa fa-arrow-left"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- End Brnds -->

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
    <div class="instagram padbtm40">
        <div class="insta-imgs">
            <img src="Web/assets/img/instagram-1.png" alt="">
            <img src="Web/assets/img/instagram-2.png" alt="">
            <img src="Web/assets/img/instagram-3.png" alt="">
            <img src="Web/assets/img/instagram-4.png" alt="">
            <img src="Web/assets/img/instagram-5.png" alt="">
            <img src="Web/assets/img/instagram-6.png" alt="">
            <img src="Web/assets/img/instagram-7.png" alt="">
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
