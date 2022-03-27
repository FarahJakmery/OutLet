@extends('web layouts.master')

@section('web_title')
    العربة
@endsection


@section('web_content')
    <!-- Start Cart  -->
    <div class="cart-process padbtm40">
        <div class="container">
            <header>
                <h2 class="title">عربة التسوق</h2>
                <div class="payment-methods">
                    <ul class="icons">
                        <li class="icon active"><i class="fas fa-shopping-cart fa-lg"></i></li>
                        <li class="line"></li>
                        <li class="icon"><i class="fa fa-truck-moving"></i></li>
                        <li class="line"></li>
                        <li class="icon"><i class="fas fa-hand-holding-usd"></i></li>
                    </ul>
                </div>
            </header>
            <div class="item-container">
                <ul class="cart-item cart-smft items-header">
                    <li class="img"><img src="Web/assets/img/img-item.png" alt=""></li>
                    <li class="type">
                        T-shirt Summer Vibes
                        <span>#261311</span>
                    </li>
                    <li>XL</li>
                    <li class="number-of-item">
                        <div class="increase-decrease">
                            <span class="minus clickable">
                                <i class="fas fa-minus"></i>
                            </span>
                            <span data-number="1" class="number">1</span>
                            <span class="plus clickable">
                                <i class="fas fa-plus"></i>
                            </span>
                        </div>
                    </li>
                    <li>أسود</li>
                    <li class="item-price">$<span class="price">100.99</span></li>
                    <li class="cancel"><i class="fas fa-times"></i></li>
                </ul>
                <ul class="cart-item cart-smft items-header">
                    <li class="img"><img src="Web/assets/img/img-item.png" alt=""></li>
                    <li class="type">
                        T-shirt Summer Vibes
                        <span>#261311</span>
                    </li>
                    <li>XL</li>
                    <li class="number-of-item">
                        <div class="increase-decrease">
                            <span class="minus clickable">
                                <i class="fas fa-minus"></i>
                            </span>
                            <span data-number="1" class="number">1</span>
                            <span class="plus clickable">
                                <i class="fas fa-plus"></i>
                            </span>
                        </div>
                    </li>
                    <li>أسود</li>
                    <li class="item-price">$<span class="price">100.99</span></li>
                    <li class="cancel"><i class="fas fa-times"></i></li>
                </ul>
                <ul class="cart-item cart-smft items-header">
                    <li class="img"><img src="Web/assets/img/img-item.png" alt=""></li>
                    <li class="type">
                        T-shirt Summer Vibes
                        <span>#261311</span>
                    </li>
                    <li>XL</li>
                    <li class="number-of-item">
                        <div class="increase-decrease">
                            <span class="minus clickable">
                                <i class="fas fa-minus"></i>
                            </span>
                            <span data-number="1" class="number">1</span>
                            <span class="plus clickable">
                                <i class="fas fa-plus"></i>
                            </span>
                        </div>
                    </li>
                    <li>أسود</li>
                    <li class="item-price">$<span class="price">100.99</span></li>
                    <li class="cancel"><i class="fas fa-times"></i></li>
                </ul>
                <ul class="cart-item cart-smft items-header">
                    <li class="img"><img src="Web/assets/img/img-item.png" alt=""></li>
                    <li class="type">
                        T-shirt Summer Vibes
                        <span>#261311</span>
                    </li>
                    <li>XL</li>
                    <li class="number-of-item">
                        <div class="increase-decrease">
                            <span class="minus clickable">
                                <i class="fas fa-minus"></i>
                            </span>
                            <span data-number="1" class="number">1</span>
                            <span class="plus clickable">
                                <i class="fas fa-plus"></i>
                            </span>
                        </div>
                    </li>
                    <li>أسود</li>
                    <li class="item-price">$<span class="price">100.99</span></li>
                    <li class="cancel"><i class="fas fa-times"></i></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-7 promo-btn">
                    <div class="promo-code">
                        <input type="text">
                        <span class="place-holder">
                            <span class="text">
                                Promo Code
                            </span>
                            <span class="icon">
                                <i class="fas fa-location-arrow"></i>
                            </span>
                        </span>
                    </div>
                    <div buttons">
                        <div class="total-price">
                            المبلغ الاجمالي
                            <span class="total">$<span id="total-price">159.96</span></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 continue-shopping">
                    <button class="continue-shopping-btn">متابعة التسوق</button>
                    <button class="confirm">الخطوة التالية</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->
@endsection
