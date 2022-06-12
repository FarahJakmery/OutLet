@extends('webLayouts.master')

@section('web_title')
    قائمة الطلبات
@endsection

@section('web_content')
    @if (count($orders) == 0)
        <div class="empty padbtm40">
            <div class="user-list">
                <div class="hide-show">
                    <i class="fas fa-cog"></i>
                </div>
                <div class="user-info">
                    <img src="{{ asset('Web/assets/img/tshirt-02.png') }}" alt="">
                    <h3>{{ Auth::user()->first_name }}</h3>
                </div>
                <div class="options">
                    <div class="option">
                        <div class="overlay-bg"></div>
                        <a href="{{ route('user.editProfile', Auth::user()->id) }}">
                            <span class="icon">
                                <i class="far fa-user"></i>
                            </span>
                            تعديل البيانات الشخصية
                        </a>
                    </div>
                    <div class="option active">
                        <div class="overlay-bg"></div>
                        <a href="{{ route('user.orders.index') }}">
                            <span class="icon">
                                <i class="fas fa-clipboard-list"></i>
                            </span>
                            طلباتي
                        </a>
                    </div>
                    <div class="option">
                        <div class="overlay-bg"></div>
                        <a href="{{ route('user.wishlist.index') }}">
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
                        <form action="{{ route('user.logout') }}" method="post" class="d-none" id="logout-form">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <div class="empty-cart">
                <header>
                    <h2 class="title">
                        الطلبات
                    </h2>
                </header>
                <div class="empty-order-list text-center">
                    <img src="{{ URL::asset('Web/assets/img/empty.png') }}" alt="">
                    <h1>قائمة الطلبات فارغة</h1>
                    <div class="messege-body">
                        يبدو أنه ليس لديك طلبات<br>
                        اطلب الآن
                    </div>
                    <a href="{{ route('user.products.index') }}">
                        <button>متابعة الشراء</button>
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="profile">
            <div class="user-list">
                <div class="hide-show">
                    <i class="fas fa-cog"></i>
                </div>
                <div class="user-info">
                    <img src="{{ asset('Web/assets/img/tshirt-02.png') }}" alt="">
                    <h3>{{ Auth::user()->first_name }}</h3>
                </div>
                <div class="options">
                    <div class="option">
                        <div class="overlay-bg"></div>
                        <a href="{{ route('user.editProfile', Auth::user()->id) }}">
                            <span class="icon">
                                <i class="far fa-user"></i>
                            </span>
                            تعديل البيانات الشخصية
                        </a>
                    </div>
                    <div class="option active">
                        <div class="overlay-bg"></div>
                        <a href="{{ route('user.orders.index') }}">
                            <span class="icon">
                                <i class="fas fa-clipboard-list"></i>
                            </span>
                            طلباتي
                        </a>
                    </div>
                    <div class="option">
                        <div class="overlay-bg"></div>
                        <a href="{{ route('user.wishlist.index') }}">
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
                        <form action="{{ route('user.logout') }}" method="post" class="d-none" id="logout-form">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <div class="profile-ordres">
                <header>
                    <h2 class="title mrgright-20px">الطلبات</h2>
                </header>
                <div class="prudact-container">
                    <div class="purchase-status">
                        <ul class="head-list">
                            <li>رقم الطلب</li>
                            <li>التكلفة الاجمالية</li>
                            <li>حالة الطلب</li>
                            <li>تفاصيل الطلب</li>
                        </ul>
                        @foreach ($orders as $order)
                            <ul class="item-in-list">
                                <li class="prodact-name">{{ $order->order_number }}</li>
                                <li class="price">{{ $order->total_price }} ر.س</li>
                                <li>
                                    <span class="status">{{ $order->order_status }}</span>
                                </li>
                                <li>
                                    <button data-toggle="modal" data-target="#exampleModalCenter{{ $order->id }}">
                                        <i class="fas fa-info"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter{{ $order->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">تفاصيل الطلب</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body cart-process">
                                                    <div class="cart-content item-container">
                                                        @foreach ($order->orderItems as $orderItem)
                                                            <ul class="cart-item">
                                                                <li class="img">
                                                                    <img src="{{ $orderItem->item_photo }}" alt="">
                                                                </li>
                                                                <li class="type">
                                                                    {{ $orderItem->item_name }}
                                                                    {{-- <span>#261311</span> --}}
                                                                </li>
                                                                <li>{{ $orderItem->color }}</li>
                                                                <li>{{ $orderItem->size }}</li>
                                                                <li>{{ $orderItem->quantity }}</li>
                                                                <li class="price">
                                                                    $
                                                                    <span class="item-price">
                                                                        {{ $orderItem->current_price }}
                                                                    </span>
                                                                </li>
                                                            </ul>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- Pagination --}}
            <div class="prudact-page-number padbtm40">
                <ul class="page-number">
                    <li class="number"><i class="fa fa-angle-right"></i></li>
                    <li class="number active">1</li>
                    <li class="number">2</li>
                    <li class="number">3</li>
                    <li class="number">4</li>
                    <li class="number"><i class="fa fa-angle-left"></i></li>
                </ul>
            </div>
        </div>
    @endif
@endsection
