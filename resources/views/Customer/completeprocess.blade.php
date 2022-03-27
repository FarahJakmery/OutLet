@include('web layouts.master')

@section('web_content')
    التأكيد
@endsection

@section('web_content')
    <!-- Start Complete Process -->
    <div class="complete-process text-right padbtm40">
        <div class="container">
            <header>
                <h2 class="title">التأكيد</h2>
                <div class="payment-methods">
                    <ul class="icons">
                        <li class="icon"><i class="fas fa-shopping-cart fa-lg"></i></li>
                        <li class="line"></li>
                        <li class="icon"><i class="fa fa-truck-moving"></i></li>
                        <li class="line"></li>
                        <li class="icon active"><i class="fas fa-hand-holding-usd"></i></li>
                    </ul>
                </div>
            </header>
            <div class="confirm-payment">
                <img src="Web/assets/img/complete.png" alt="">
                <div class="confirm-messege">
                    <div class="title">
                        تم وضع طلبك
                    </div>
                    <div class="messege">
                        تم وضع طلبك بنجاح
                    </div>
                    <div class="messege">
                        يمكنك مراجعة طلباتي للتأكد من عمليات التوصيل
                    </div>
                </div>
                <button>متابعة الشراء</button>
            </div>
        </div>
    </div>
    <!-- End Complete Process -->
@endsection
