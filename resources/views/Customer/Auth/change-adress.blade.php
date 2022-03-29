@include('web layouts.master')

@section('web_title')
    تغيير العنوان
@endsection

@section('web_content')
    <!-- Start Complete Process -->
    <div class="change-adress padbtm40 padtop40">
        <div class="container">
            <header>
                <h2 class="title">معلومات</h2>
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
            <div class="padbtm40">
                <div class="row">
                    <div class="col-md-5">
                        <div class="change-section marbtm-767">
                            <h2>معلومات الشحن</h2>
                            <form action="#">
                                <div class="input-group">
                                    <input type="text" placeholder="البريد الالكتروني">
                                    <input type="text" placeholder="العنوان">
                                </div>
                                <div class="input-group">
                                    <input type="text" placeholder="الاسم الأول">
                                    <input type="text" placeholder="المدينة">
                                </div>
                                <div class="input-group">
                                    <input type="text" placeholder="اسم العائلة">
                                    <input type="text" placeholder="ZIP">
                                </div>
                                <div class="input-group">
                                    <input type="text" placeholder="رقم الموبايل">
                                    <input type="text" placeholder="الدولة">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h6 class="payment-title">طريقة الدفع</h6>
                        <ul class="payment-way marbtm-767">
                            <li class="pay-way">
                                <img src="Web/assets/img/payment/pay-pal.png" alt="">
                            </li>
                            <li class="pay-way">
                                <img src="Web/assets/img/payment/Visa.png" alt="">
                            </li>
                            <li class="pay-way">
                                <img src="Web/assets/img/payment/Master card.png" alt="">
                            </li>
                            <li class="pay-way">
                                <img src="Web/assets/img/payment/Maestro.png" alt="">
                            </li>
                            <li class="pay-way">
                                <img src="Web/assets/img/payment/iDEAL.png" alt="">
                            </li>
                            <li class="pay-way">
                                <img src="Web/assets/img/payment/Discover.png" alt="">
                            </li>
                        </ul>
                        <h6 class="payment-title">دفع عند التوصيل</h6>
                        <span class="cash-way marbtm-767">
                            <span class="icon">
                                <i class="fas fa-hand-holding-usd active"></i>
                            </span>
                            12.00 $
                        </span>
                    </div>
                    <div class="col-md-4">
                        <h6 class="cart-title">عربتك</h6>
                        <ul class="cart-content marbtm-767">
                            <li>
                                <ul class="cart-item">
                                    <li class="item-img">
                                        <img src="Web/assets/img/img-item.png" alt="">
                                    </li>
                                    <li class="item-name">
                                        T-shirt Summer Vibes
                                        <span class="item-id">#211903</span>
                                    </li>
                                    <li class="item-price">
                                        $<span class="price">69.99</span>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <ul class="cart-item">
                                    <li class="item-img">
                                        <img src="Web/assets/img/img-item.png" alt="">
                                    </li>
                                    <li class="item-name">
                                        T-shirt Summer Vibes
                                        <span class="item-id">#211903</span>
                                    </li>
                                    <li class="item-price">
                                        $<span class="price">69.99</span>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <ul class="cart-item">
                                    <li class="item-img">
                                        <img src="Web/assets/img/img-item.png" alt="">
                                    </li>
                                    <li class="item-name">
                                        T-shirt Summer Vibes
                                        <span class="item-id">#211903</span>
                                    </li>
                                    <li class="item-price">
                                        $<span class="price">69.99</span>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <div class="total-price-content">
                            التكلفة الاجمالية
                            <span class="total-price" id="total-price-add"></span>
                        </div>
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
