@include('web layouts.master')

@section('web_title')
    الطلبات
@endsection

@section('web_content')
    <!-- Start Header -->
    <!-- Start User Information List -->
    <div class="profile">
        <div class="user-list">
            <div class="hide-show">
                <i class="fas fa-cog"></i>
            </div>
            <div class="user-info">
                <img src="Web/assets/img/tshirt-02.png" alt="">
                <h3>اسم المستخدم</h3>
            </div>
            <div class="options">
                <div class="option">
                    <div class="overlay-bg"></div>
                    <a href="#">
                        <span class="icon">
                            <i class="far fa-user"></i>
                        </span>
                        تعديل البيانات
                    </a>
                </div>
                <div class="option active">
                    <div class="overlay-bg"></div>
                    <a href="#">
                        <span class="icon">
                            <i class="fas fa-clipboard-list"></i>
                        </span>
                        طلباتي
                    </a>
                </div>
                <div class="option">
                    <div class="overlay-bg"></div>
                    <a href="#">
                        <span class="icon">
                            <i class="far fa-heart"></i>
                        </span>
                        المفضلة
                    </a>
                </div>
                <div class="option">
                    <div class="overlay-bg"></div>
                    <a href="#">
                        <span class="icon">
                            <i class="fas fa-sign-out-alt fa-rotate-180"></i>
                        </span>
                        تسجيل الخروج
                    </a>
                </div>
            </div>
        </div>
        <div class="profile-ordres">
            <header>
                <h2 class="title">الطلبات</h2>
            </header>
            <div class="prudact-container">
                <div class="purchase-status">
                    <ul class="head-list">
                        <li>اسم المنتج</li>
                        <li>من قبل</li>
                        <li>سعر</li>
                        <li>وضع مخزون</li>
                        <li></li>
                    </ul>
                    <ul class="item-in-list">
                        <li class="img"><img src="Web/assets/img/img-item.png" alt=""></li>
                        <li class="prodact-name">#5511</li>
                        <li class="usr-name">Fleen Flouleni</li>
                        <li class="price">$59.98</li>
                        <li><span class="status"> في الخط</span></li>
                        <li><button>إضافة للعربة</button></li>
                    </ul>
                    <ul class="item-in-list">
                        <li class="img"><img src="Web/assets/img/img-item.png" alt=""></li>
                        <li class="prodact-name">#5511</li>
                        <li class="usr-name">Fleen Flouleni</li>
                        <li class="price">$59.98</li>
                        <li><span class="status"> في الخط</span></li>
                        <li><button>إضافة للعربة</button></li>
                    </ul>
                    <ul class="item-in-list">
                        <li class="img"><img src="Web/assets/img/img-item.png" alt=""></li>
                        <li class="prodact-name">#5511</li>
                        <li class="usr-name">Fleen Flouleni</li>
                        <li class="price">$59.98</li>
                        <li><span class="status"> في الخط</span></li>
                        <li><button>إضافة للعربة</button></li>
                    </ul>
                    <ul class="item-in-list">
                        <li class="img"><img src="Web/assets/img/img-item.png" alt=""></li>
                        <li class="prodact-name">#5511</li>
                        <li class="usr-name">Fleen Flouleni</li>
                        <li class="price">$59.98</li>
                        <li><span class="status"> في الخط</span></li>
                        <li><button>إضافة للعربة</button></li>
                    </ul>
                    <ul class="item-in-list">
                        <li class="img"><img src="Web/assets/img/img-item.png" alt=""></li>
                        <li class="prodact-name">#5511</li>
                        <li class="usr-name">Fleen Flouleni</li>
                        <li class="price">$59.98</li>
                        <li><span class="status"> في الخط</span></li>
                        <li><button>إضافة للعربة</button></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
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

    <!-- End User Information List -->
@endsection
