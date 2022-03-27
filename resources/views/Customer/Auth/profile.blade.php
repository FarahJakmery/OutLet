@include('web layouts.master')

@section('web_title')
    الصفحة الشخصية
@endsection

@section('web_content')
    <!-- Start Header -->
    <!-- Start User Information List -->
    <!-- <div class="container-fluid"> -->
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
        <div class="profile-info">
            <header>
                <h1 class="title">الحساب</h1>
            </header>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td>رقم الطلب</td>
                            <td>التاريخ</td>
                            <td>البائع</td>
                            <td>المبلغ الاجمالي</td>
                            <td>الحالة</td>
                            <td>الأدوات</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr></tr>
                        <tr>
                            <td>#5511</td>
                            <td>Thu,26,Aug</td>
                            <td>Fleen Flouleni</td>
                            <td>$159.98</td>
                            <td><span class="in-progress">In Propgress</span></td>
                            <td>
                                <i class="fas fa-print"></i>
                                <i class="far fa-edit"></i>
                                <i class="far fa-trash-alt"></i>
                            </td>
                        </tr>
                        <tr></tr>
                        <tr>
                            <td>#5511</td>
                            <td>Thu,26,Aug</td>
                            <td>Fleen Flouleni</td>
                            <td>$159.98</td>
                            <td><span class="shipped">Shipped</span></td>
                            <td>
                                <i class="fas fa-print"></i>
                                <i class="far fa-edit"></i>
                                <i class="far fa-trash-alt"></i>
                            </td>
                        </tr>
                        <tr></tr>
                        <tr>
                            <td>#5511</td>
                            <td>Thu,26,Aug</td>
                            <td>Fleen Flouleni</td>
                            <td>$159.98</td>
                            <td><span class="in-progress">In Propgress</span></td>
                            <td>
                                <i class="fas fa-print"></i>
                                <i class="far fa-edit"></i>
                                <i class="far fa-trash-alt"></i>
                            </td>
                        </tr>
                        <tr></tr>
                        <tr>
                            <td>#5511</td>
                            <td>Thu,26,Aug</td>
                            <td>Fleen Flouleni</td>
                            <td>$159.98</td>
                            <td><span class="delivered">Delivered</span></td>
                            <td>
                                <i class="fas fa-print"></i>
                                <i class="far fa-edit"></i>
                                <i class="far fa-trash-alt"></i>
                            </td>
                        </tr>
                        <tr></tr>
                        <tr>
                            <td>#5511</td>
                            <td>Thu,26,Aug</td>
                            <td>Fleen Flouleni</td>
                            <td>$159.98</td>
                            <td><span class="delivered">Delivered</span></td>
                            <td>
                                <i class="fas fa-print"></i>
                                <i class="far fa-edit"></i>
                                <i class="far fa-trash-alt"></i>
                            </td>
                        </tr>
                        <tr></tr>
                        <tr>
                            <td>#5511</td>
                            <td>Thu,26,Aug</td>
                            <td>Fleen Flouleni</td>
                            <td>$159.98</td>
                            <td><span class="shipped">Shipped</span></td>
                            <td>
                                <i class="fas fa-print"></i>
                                <i class="far fa-edit"></i>
                                <i class="far fa-trash-alt"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- </div> -->
    <!-- End User Information List -->
@endsection
