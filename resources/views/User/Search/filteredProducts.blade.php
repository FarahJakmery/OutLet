<!-- Start Overlay -->
<div class="overlay"></div>
<!-- End Overlay -->

<!-- Start Prudact Page -->
<div class="prudact-page padbtm40 padtop40">
    {{-- The Products --}}
    <div class="container-fluid">
        <div class="row">
            {{-- Product Card --}}
            <div class="col-md-10 prudact-view" id="updateDiv">
                <div class="prudact-images">
                    @if ($Products->isEmpty())
                        <div class="empty-order-list text-center">
                            <img src="{{ asset('Web/assets/img/empty.png') }}" alt="">
                            <h1>لا يوجد منتجات بهذه المواصفات</h1>
                            <div class="messege-body">
                                <br>
                            </div>
                        </div>
                    @else
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
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Prudact Page -->
