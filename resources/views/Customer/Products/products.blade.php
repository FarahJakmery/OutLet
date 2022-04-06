@extends('webLayouts.master')

@section('web_title')
    المنتجات
@endsection

@section('web_content')
    <!-- Start Overlay -->
    <div class="overlay"></div>
    <!-- End Overlay -->

    <!-- Start Prudact Page -->
    <div class="prudact-page padbtm40 padtop40">
        <div class="container">
            <div class="product-classification-small-screen swiper">
                <div class="swiper-wrapper">
                    <span class="prudact-type-sm swiper-slide sm" data-classifaction=".prudact-type">
                        نوع
                        <span class="icon">
                            <i class="fa fa-angle-down"></i>
                        </span>
                    </span>
                    <span class="prudact-price-sm swiper-slide sm" data-classifaction=".prudact-price">
                        سعر
                        <span class="icon">
                            <i class="fa fa-angle-down"></i>
                        </span>
                    </span>
                    <span class="prudact-group-sm swiper-slide sm" data-classifaction=".prudact-group">
                        مجموعة
                        <span class="icon">
                            <i class="fa fa-angle-down"></i>
                        </span>
                    </span>
                    <span class="prudact-size-sm swiper-slide sm" data-classifaction=".prudact-size">
                        حجم
                        <span class="icon">
                            <i class="fa fa-angle-down"></i>
                        </span>
                    </span>
                    <span class="prudact-brand-sm swiper-slide sm" data-classifaction=".prudact-brand">
                        ماركة
                        <span class="icon">
                            <i class="fa fa-angle-down"></i>
                        </span>
                    </span>
                    <span class="prudact-color-sm swiper-slide sm" data-classifaction=".prudact-color">
                        لون
                        <span class="icon">
                            <i class="fa fa-angle-down"></i>
                        </span>
                    </span>
                    <span class="prudact-color-sm swiper-slide ">
                    </span>
                </div>
                <div class="swiper-scrollbar"></div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 product-classification">
                    <div class="prudact-type">
                        <span class="title">نوع المنتج

                            <span class="show">
                                <i class="fa fa-angle-up"></i>
                            </span>
                        </span>
                        <div class="checkbox">
                            <label class="container-checkbox">(411)
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container-checkbox">(131)
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container-checkbox">(56)
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container-checkbox">(8)
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="prudact-price">
                        <span class="title">سعر
                            <span class="show">
                                <i class="fa fa-angle-up"></i>
                            </span>
                        </span>
                        <div class="price-range">
                            <div class="values">
                                <span class="val">
                                    <span id="range1">0</span>
                                    USD
                                </span>
                                <span class="val">
                                    <span id="range2">500</span>
                                    USD
                                </span>
                            </div>
                            <div class="range-container">
                                <div class="slider-track"></div>
                                <input type="range" name="" id="slider-1" min="0" max="500" value="0" oninput="slideOne()">
                                <input type="range" name="" id="slider-2" min="0" max="500" value="500"
                                    oninput="slideTwo()">
                            </div>
                        </div>
                        <!-- <input type="range" multiple value="0,100" /> -->
                        <!-- <div class="selector">
                                                                                                                                                                                                                                                                                                                                                <div class="price-slider">
                                                                                                                                                                                                                                                                                                                                                    <div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                                                                                                                                                                                                                                                                                                                                        <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                                                                                                                                                                                                                                                                                                                                        <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span><span tabindex="0"
                                                                                                                                                                                                                                                                                                                                                            class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                    <span id="min-price" data-currency="€" class="slider-price">0</span> <span class="seperator">-</span> <span
                                                                                                                                                                                                                                                                                                                                                        id="max-price" data-currency="€" data-max="3500" class="slider-price">3500 +</span>
                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                            </div> -->
                        <!-- <div class="price-range">
                                                                                                                                                                                                                                                                                                                                                <div class="range">
                                                                                                                                                                                                                                                                                                                                                    <div class="to">
                                                                                                                                                                                                                                                                                                                                                        0 USD
                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                    <div class="from">
                                                                                                                                                                                                                                                                                                                                                        500 USD
                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                <div class="line"></div>
                                                                                                                                                                                                                                                                                                                                            </div> -->
                    </div>
                    <div class="prudact-group">
                        <span class="title">مجموعة
                            <span class="show">
                                <i class="fa fa-angle-up"></i>
                            </span>
                        </span>
                    </div>
                    <div class="prudact-size">
                        <span class="title">حجم <span class="show">
                                <i class="fa fa-angle-up"></i>
                            </span></span>
                        <div class="prudact-sizes">
                            <span>XXL</span>
                            <span>XL</span>
                            <span>L</span>
                            <span>M</span>
                            <span>S</span>
                            <span>XS</span>
                        </div>
                    </div>
                    <div class="prudact-color">
                        <span class="title">لون
                            <span class="show">
                                <i class="fa fa-angle-up"></i>
                            </span>
                        </span>
                        <div class="prudact-colors">
                            <ul>
                                <li><span>

                                    </span></li>
                                <li><span>

                                    </span></li>
                                <li><span>

                                    </span></li>
                                <li><span>

                                    </span></li>
                                <li><span>

                                    </span></li>
                                <li><span>

                                    </span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="prudact-brand">
                        <span class="title">ماركة
                            <span class="show">
                                <i class="fa fa-angle-up"></i>
                            </span>
                        </span>
                    </div>
                </div>
                <div class="col-md-10 prudact-view">
                    <div class="prudact-images">
                        @foreach ($Products as $Product)
                            <div class="item">
                                <a href="#" class="item-fav addtowishlist" data-product_id="{{ $Product->id }}">
                                    <span class="love"><i class="far fa-heart"></i></span>
                                </a>
                                <a href="{{ route('products.show', $Product->id) }}" class="to-item-page">
                                    <img class="Yellow" src="Web/assets/img/tshirt-06.png" alt="">
                                    <div class="item-info">
                                        <p>{{ $Product->translate('ar')->product_name }}</p>
                                        <div class="price">
                                            <span class="old">${{ $Product->max_price }}</span>
                                            <span class="new">${{ $Product->min_price }}</span>
                                        </div>
                                        <button class="addtoCart" data-Product_id="{{ $Product->id }}">Add to
                                            Cart</button>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- Pagination --}}
        <div class="prudact-page-number">
            <ul class="page-number">
                <li class="number"><i class="fa fa-angle-right"></i></li>
                <li class="number active">1</li>
                <li class="number">2</li>
                <li class="number">3</li>
                <li class="number">4</li>
                <li class="number"><i class="fa fa-angle-left"></i></li>
            </ul>
        </div>
        {{-- End Pagination --}}
    </div>
    <!-- End Prudact Page -->


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

@section('scripts')
    <script>
        $(document).ready(function() {

            $(document).on('click', '.addtowishlist', function(e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/wishlist",
                    data: {
                        'productId': $(this).attr('data-product_id'),
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                    }
                });
            });

        });
    </script>

    <script>
        $(document).ready(function() {

            $(document).on('click', '.addtoCart', function(e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/cart",
                    data: {
                        'productId': $(this).attr('data-Product_id'),
                        'quantity': $(this).attr('data-Product_id'),
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                    }
                });

            });

        });
    </script>
@endsection
