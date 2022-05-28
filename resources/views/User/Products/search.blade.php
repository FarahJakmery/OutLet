@extends('webLayouts.master')

@section('web_title')
    نتائج البحث
@endsection

@section('web_content')
    <!-- Start Overlay -->
    <div class="overlay"></div>
    <!-- End Overlay -->

    <!-- Start Prudact Page -->
    <div class="prudact-page padbtm40 padtop40">
        {{-- The Products --}}
        <div class="container-fluid">
            <div class="row">
                {{-- Product Card --}}
                <div class="col-md-10 prudact-view">
                    <div class="prudact-images">
                        @foreach ($Products as $Product)
                            <div class="item">
                                <a href="#" class="item-fav addtowishlist" data-product_id="{{ $Product->id }}">
                                    <span class="love">
                                        <i class="far fa-heart"></i>
                                    </span>
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
