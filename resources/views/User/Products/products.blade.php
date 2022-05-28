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
                    <span class="prudact-color-sm swiper-slide ">
                    </span>
                </div>
                <div class="swiper-scrollbar"></div>
            </div>
        </div>
        {{-- The Products --}}
        <div class="container-fluid">
            <div class="row">
                {{-- Classification Part --}}
                <div class="col-md-2 product-classification">
                    {{-- Brands --}}
                    <div class="prudact-brand">
                        <span class="title">العلامات التجارية
                            <span class="show">
                                <i class="fa fa-angle-up"></i>
                            </span>
                        </span>
                        <div class="checkbox">
                            @foreach ($Brands as $Brand)
                                <label class="container-checkbox brandItem">
                                    {{ $Brand->translate('ar')->brand_name }}({{ App\Models\Product::where('brand_id', $Brand->id)->count() }})
                                    <input type="checkbox" value="{{ $Brand->id }}" id="brandId" class="try">
                                    <span class="checkmark"></span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    {{-- Main Categories --}}
                    <div class="prudact-group">
                        <span class="title">المجموعات
                            <span class="show">
                                <i class="fa fa-angle-up"></i>
                            </span>
                        </span>
                        <div class="checkbox">
                            @foreach ($mainCategories as $mainCategory)
                                <label class="container-checkbox">
                                    {{ $mainCategory->translate('ar')->category_name }}({{ App\Models\Product::where('mcategory_id', $mainCategory->id)->count() }})
                                    <input type="checkbox" value="{{ $mainCategory->id }}" id="mainCategoryId"
                                        class="mainCategoryClass">
                                    <span class="checkmark"></span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    {{-- Sub Categories --}}
                    <div class="prudact-type">
                        <span class="title">نوع المنتج

                            <span class="show">
                                <i class="fa fa-angle-up"></i>
                            </span>
                        </span>
                        <div class="checkbox">
                            @foreach ($SubCategories as $SubCategory)
                                <label class="container-checkbox">
                                    {{ $SubCategory->translate('ar')->subcategory_name }}({{ App\Models\Product::where('subcategory_id', $SubCategory->id)->count() }})
                                    <input type="checkbox" value="{{ $SubCategory->id }}" id="SubCategoryId"
                                        class="SubCategoryClass">
                                    <span class="checkmark"></span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    {{-- Price --}}
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
                    </div>
                    {{-- size --}}
                    <div class="prudact-size">
                        <span class="title">حجم <span class="show">
                                <i class="fa fa-angle-up"></i>
                            </span></span>
                        <div class="checkbox">
                            @foreach ($Sizes as $Size)
                                <label class="container-checkbox">
                                    ({{ DB::table('color_size')->where('size_id', $Size->id)->count() }})
                                    {{ $Size->size_name }}
                                    <input type="checkbox" value="{{ $Size->id }}" id="SizeId" class="SizeClass">
                                    <span class="checkmark"></span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{-- Product Card --}}
                <div class="col-md-10 prudact-view" id="updateDiv">
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
    <!-- Main JS File -->
    <script src="{{ URL::asset('Web/assets/js/multirange.js') }}"></script>
    {{-- This Script is to Add to Wishlist --}}
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
    {{-- This Script is For Filters --}}
    <script>
        $(document).ready(function() {


            $('.try').click(function() {

                var brand = [];
                $('.try').each(function() {
                    if ($(this).is(':checked')) {
                        brand.push($(this).val());
                    }
                });
                Finalbrand = brand.toString();

                $.ajax({
                    type: 'get',
                    data: "brand=" + Finalbrand,
                    url: '{{ route('getProducts') }}',
                    success: function(response) {
                        $('#updateDiv').html(response);
                    }
                });
            });

            $('.mainCategoryClass').click(function() {

                var mainCategory = [];
                $('.mainCategoryClass').each(function() {
                    if ($(this).is(':checked')) {
                        mainCategory.push($(this).val());
                    }
                });
                FinalMainCategory = mainCategory.toString();
                console.log(FinalMainCategory);
                $.ajax({
                    type: 'get',
                    data: "mainCategory=" + FinalMainCategory,
                    url: '{{ route('getProducts') }}',
                    success: function(response) {
                        $('#updateDiv').html(response);
                    }
                });
            });

            $('.SubCategoryClass').click(function() {

                var SubCategory = [];
                $('.SubCategoryClass').each(function() {
                    if ($(this).is(':checked')) {
                        SubCategory.push($(this).val());
                    }
                });
                FinalSubCategory = SubCategory.toString();
                console.log(FinalSubCategory);
                $.ajax({
                    type: 'get',
                    data: "SubCategory=" + FinalSubCategory,
                    url: '{{ route('getProducts') }}',
                    success: function(response) {
                        $('#updateDiv').html(response);
                    }
                });
            });

            $('.SizeClass').click(function() {

                var Size = [];
                $('.SizeClass').each(function() {
                    if ($(this).is(':checked')) {
                        Size.push($(this).val());
                    }
                });
                FinalSize = Size.toString();
                console.log(FinalSize);
                $.ajax({
                    type: 'get',
                    data: "Size=" + FinalSize,
                    url: '{{ route('getProducts') }}',
                    success: function(response) {
                        $('#updateDiv').html(response);
                    }
                });
            });
        })
    </script>
@endsection
