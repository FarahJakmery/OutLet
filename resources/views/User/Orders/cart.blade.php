@extends('webLayouts.master')

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
                @forelse ($productsToShow as $product)
                    <ul class="cart-item cart-smft items-header" data-id="{{ $product->id }}">
                        @foreach ($product->images as $image)
                            @if ($loop->first)
                                <li class="img">
                                    <img src="{{ asset('images/The_Product/' . $image->image_name) }}" alt="">
                                </li>
                            @endif
                        @endforeach
                        <li class="type">
                            <span>#{{ $product->product_number }}</span>
                        </li>
                        <li>{{ $product->product_number }}</li>
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
                        <li class="item-price">$<span class="price">{{ $product->max_price }}</span></li>

                        <li class="remove-from-cart"><i class="fas fa-times"></i></li>
                    </ul>
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
                            <a href="{{ route('products.index') }}">
                                <button class="continue-shopping-btn">متابعة التسوق</button>
                            </a>
                            <button class="confirm">الخطوة التالية</button>
                        </div>
                    </div>
                @empty
                    <div class="empty-order-list text-center">
                        <img src="{{ asset('Web/assets/img/empty.png') }}" alt="">
                        <h1>عربة التسوق فارغة</h1>
                        <div class="messege-body">
                            يبدو أنه ليس لديك منتجات في عربتك <br>
                            تسوق الآن
                        </div>
                        <button>ابدأ التسوق</button>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
    <!-- End Cart -->
@endsection

@section('scripts')
    <script>
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
    </script>
@endsection
