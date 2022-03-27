@include('web layouts.master')

@section('web_title')
    المنتج
    @eWeb/assets/ndsection

@section('web_content')
    <div class="product-info">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="address">
                        <a href="#"><i class="fa fa-house"></i></a>
                        <span class="slash">\</span>
                        <a href="#"><span class="title">
                                products
                            </span></a>
                        <span class="slash">\</span>
                        <a href="#"><span class="title">
                                products
                            </span></a>
                        <span class="slash">\</span>
                        <a href="#"><span class="title">T-shirt Summer Vibes</span></a>
                    </div>
                </div>
                <div class="col-md-3 work-comment">
                    <span class="icon">
                        <i class="fa fa-truck-moving"></i>
                    </span>
                    <span class="srv-txt">
                        <span class="comment title">شحن قياسي</span>
                        <span class="comment">خلال 3-6 أيام عمل</span>
                    </span>
                </div>
                <div class="col-md-3 work-comment">
                    <span class="icon">
                        <i class="fa fa-truck-moving"></i>
                    </span>
                    <span class="srv-txt">
                        <span class="comment title">تسليم سريع</span>
                        <span class="comment">دولار المتاحة 36.00</span>
                    </span>
                </div>
            </div>
            <div class="prudact-details padbtm40">
                <div class="row">
                    <div class="col-md-6 product-img-collection">
                        <div class="secondry-imgs">
                            <img src="Web/assets/img/main-img.png" alt="">
                            <img src="Web/assets/img/main-img.png" alt="">
                        </div>
                        <div class="main-img">
                            <img src="Web/assets/img/main-img.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 product-detiels">
                        <span class="offer">تخفيض</span>
                        <div class="item-info">
                            <p>T-shirt Summer Vibes</p>
                            <div class="price">
                                <span class="old">$119,99</span>
                                <span class="new">$89.99</span>
                            </div>
                        </div>
                        <div class="product-color">
                            <span class="title">اللون :</span>
                            <ul class="colors">
                                <li class="color"><span></span></li>
                                <li class="color"><span></span></li>
                                <li class="color"><span></span></li>
                                <li class="color"><span></span></li>
                            </ul>
                        </div>
                        <div class="product-size">
                            <span class="title">مقاس :</span>
                            <div class="input-group select-div mb-3">

                                <select class="custom-select size-select" id="inputGroupSelect01">
                                    <option selected>Choose...</option>
                                    <option value="1">XS</option>
                                    <option value="2">S</option>
                                    <option value="3">L</option>
                                    <option value="4">XL</option>
                                    <option value="5">XXL</option>
                                </select>
                                <span class="icon">
                                    <i class="fa fa-angle-left"></i>
                                </span>
                            </div>
                        </div>
                        <div class="product-amount">
                            <span class="title">كمية :</span>
                            <div class="increase-decrease">
                                <span class="minus clickable">
                                    <i class="fas fa-minus"></i>
                                </span>
                                <span class="number">1</span>
                                <span class="plus clickable">
                                    <i class="fas fa-plus"></i>
                                </span>
                            </div>
                            <button>أضف إلى السلة</button>
                            <span class="love"><i class="far fa-heart"></i></span>
                        </div>
                        <div class="product-timer">
                            <div class="timer" id="timer" data-date="jan 20, 2022 01:30:00">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row evaluation padbtm40">
                <div class="col-sm-12">
                    <!-- Nav tabs -->
                    <ul class="nav buttons">
                        <li class="nav-item">
                            <a class=" tab-btn active" data-toggle="tab" href="#home">الوصف</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link tab-btn" data-toggle="tab" href="#menu1">التقييمات (2)</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane container active" id="home">
                            <div class="evaluation">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="star-rate">
                                            <div class="star-rate-right">
                                                <span class="rate">4.5</span>
                                                <ul class="stars">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                </ul>
                                                <span class="user-num">
                                                    <span class="icon-user">
                                                        <i class="far fa-user"></i>
                                                    </span>
                                                    81 كل الأراء
                                                </span>
                                            </div>
                                            <div class="star-rate-left">
                                                <ul class="evaluations">
                                                    <li>
                                                        <i class="fas fa-star"></i>
                                                        1
                                                        <span class="main-line">
                                                            <span class="line" data-rate="0%"></span>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star"></i>
                                                        2
                                                        <span class="main-line">
                                                            <span class="line" data-rate="0%"></span>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star"></i>
                                                        3
                                                        <span class="main-line">
                                                            <span class="line" data-rate="10%"></span>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star"></i>
                                                        4
                                                        <span class="main-line">
                                                            <span class="line" data-rate="30%"></span>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-star"></i>
                                                        5
                                                        <span class="main-line">
                                                            <span class="line" data-rate="70%"></span>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <button class="add-evaluation">أضف الرأي</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <ul class="users-evaluations">
                                            <li class="user-evaluation">
                                                <span class="user-img">
                                                    <img src="Web/assets/img/img-item.png" alt="">
                                                </span>
                                                <span class="user-info">
                                                    <span class="user-name">
                                                        Flena
                                                    </span>
                                                    <span class="star-givven">
                                                        <ul class="stars">
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star-half-alt"></i></li>
                                                        </ul>
                                                    </span>
                                                    <span class="user-comment">
                                                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا
                                                        النص من مولد النص
                                                        العربى،
                                                    </span>
                                                </span>
                                            </li>
                                            <li class="user-evaluation">
                                                <span class="user-img">
                                                    <img src="Web/assets/img/img-item.png" alt="">
                                                </span>
                                                <span class="user-info">
                                                    <span class="user-name">
                                                        Flena
                                                    </span>
                                                    <span class="star-givven">
                                                        <ul class="stars">
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star-half-alt"></i></li>
                                                        </ul>
                                                    </span>
                                                    <span class="user-comment">
                                                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا
                                                        النص من مولد النص
                                                        العربى،
                                                    </span>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane container fade" id="menu1">
                            <div class="description">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="icon">
                                            <i class="far fa-file-alt"></i>
                                        </div>
                                        <span class="title">المواد و العناية</span>
                                        <span class="body">المكونات : قطن 98% - بوليستر 2%</span>
                                        <span class="end">
                                            <i class="fa fa-water"></i>
                                            <i class="fa fa-water"></i>
                                            <i class="fa fa-water"></i>
                                            <i class="fa fa-water"></i>
                                        </span>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="icon left-section">
                                            <i class="fas fa-pencil-ruler"></i>
                                        </div>
                                        <span class="title">تفاصيل و وصف المنتج</span>
                                        <span class="body">
                                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، ل
                                        </span>
                                        <span class="body">
                                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، ل
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
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
@endsection
