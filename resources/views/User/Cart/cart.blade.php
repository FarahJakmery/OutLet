@extends('webLayouts.master')

@section('web_title')
    العربة
@endsection

@section('web_content')
    @if (!($Product_detailss = 0))
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
                {{-- Cart Items --}}
                <div class="item-container">
                    @foreach ($Product_detailss as $Product)
                        <ul class="cart-item cart-smft items-header">
                            {{-- Product Image --}}
                            <li class="img">
                                <img src="{{ asset($Product['product']->photo_name) }}" alt="">
                            </li>
                            {{-- Product Name & Product Number --}}
                            <li class="type">
                                {{ $Product['product']->translate('ar')->name }}
                                <span>#{{ $Product['product']->product_number }}</span>
                            </li>
                            {{-- Size --}}
                            <li>XL</li>
                            {{-- Color --}}
                            <li>أسود</li>
                            {{-- Unit price --}}
                            <li class="item-price">
                                ر.س
                                <span class="price">
                                    {{ $Product['product']->max_price }}
                                </span>
                            </li>
                            {{-- Product Quantity --}}
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
                            {{-- Total Price --}}
                            <li class="item-total-price">
                                $
                                <span class="price">
                                    {{ $Product['all_price'] }}
                                </span>
                            </li>
                            {{-- Remove From Cart --}}
                            <li class="cancel">
                                <i class="fas fa-times"></i>
                            </li>
                        </ul>
                    @endforeach
                </div>
                {{-- Cart Information --}}
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
                        <div buttons>
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
    @else
        <!-- Start User Information List -->
        <div class="empty padbtm40">
            <div class="user-list">
                <div class="hide-show">
                    <i class="fas fa-cog"></i>
                </div>
                <div class="user-info">
                    <img src="{{ URL::asset('Web/assets/img/tshirt-02.png') }}" alt="">
                    <h3>اسم المستخدم</h3>
                </div>
                <div class="options">
                    <div class="option">
                        <div class="overlay-bg"></div>
                        <a href="{{ route('user.editProfile', Auth::user()->id) }}">
                            <span class="icon">
                                <i class="far fa-cart"></i>
                            </span>
                            تعديل البيانات
                        </a>
                    </div>
                    <div class="option active">
                        <div class="overlay-bg"></div>
                        <a href="{{ route('user.Cart') }}">
                            <span class="icon">
                                <i class="fas fa-clipboard-list"></i>
                            </span>
                            عربتي
                        </a>
                    </div>
                    <div class="option">
                        <div class="overlay-bg"></div>
                        <a href="{{ route('user.orders.index', Auth::user()->id) }}">
                            <span class="icon">
                                <i class="fas fa-clipboard-list"></i>
                            </span>
                            طلباتي
                        </a>
                    </div>
                    <div class="option">
                        <div class="overlay-bg"></div>
                        <a href="{{ route('user.wishlist.index', Auth::user()->id) }}">
                            <span class="icon">
                                <i class="far fa-heart"></i>
                            </span>
                            المفضلة
                        </a>
                    </div>
                    <div class="option">
                        <div class="overlay-bg"></div>
                        <a href="{{ route('user.logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <span class="icon">
                                <i class="fas fa-sign-out-alt fa-rotate-180"></i>
                            </span>
                            تسجيل الخروج
                        </a>
                        <form action="{{ route('user.logout') }}" method="POST" class="d-none" id="logout-form">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <div class="empty-cart">
                <header>
                    <h2 class="title mrgright-20px">
                        عربة التسوق
                    </h2>
                </header>
                <div class="empty-order-list text-center">
                    <img src="{{ URL::asset('Web/assets/img/carts.png') }}" alt="">
                    <h1>عربة التسوق فارغة</h1>
                    <div class="messege-body">
                        يبدو أنه ليس لديك عناصر في العربة<br>
                        اطلب الآن
                    </div>
                    <a href="{{ route('user.products.index') }}">
                        <button>متابعة الشراء</button>
                    </a>
                </div>
            </div>
        </div>
        <!-- End User Information List -->
    @endif
@endsection

@section('scripts')
    {{-- <script>
        $(".remove-from-cart").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Are you sure want to remove?")) {
                $.ajax({
                    url: '{{ route('remove.from.cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("ul").attr("data-id")
                    },

                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(one, two, three) {
                        console.log(one);
                        console.log(two);
                        console.log(three);

                    }
                });
            }
        });
    </script> --}}
@endsection
