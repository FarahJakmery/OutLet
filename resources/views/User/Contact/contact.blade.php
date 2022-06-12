@extends('webLayouts.master')

@section('web_title')
    تواصل معنا
@endsection

@section('web_content')
    <!-- Start Complete Process -->
    <div class="change-adress padbtm40 ">
        <div class="container">
            <header>
                <h2 class="title">تواصل معنا</h2>
            </header>
            <div class="padbtm40">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="change-section marbtm-767">
                            <form action="{{ route('user.sent_message_to_email') }}" method="post">
                                @csrf
                                <h3>رسالتك لنا</h3>
                                <div class="input-group">
                                    <input name="first_name" type="text" placeholder="الاسم الأول">
                                    <input name="last_name" type="text" placeholder="اسم العائلة">
                                </div>
                                <div class="input-single">
                                    <input name="email" type="text" placeholder="البريد الالكتروني">
                                </div>
                                <div class="input-single">
                                    <input name="phone" type="text" placeholder="رقم الموبايل">
                                </div>
                                <div class="input-single">
                                    <textarea name="message" placeholder="اكتب رسالتك ..."></textarea>
                                </div>
                                <input type="submit" class="btn" value="إرسال" />
                                {{-- <div class="continue-shopping">
                                    <div class="row">
                                        <div class="col-md-7 shipping">
                                            <div class="right">
                                                <a href="#">
                                                    <span class="icon">
                                                        <i class="fa fa-arrow-right"></i>
                                                    </span>
                                                    الرجوع
                                                </a>
                                            </div>
                                            <div class="left">
                                                <i class="fa fa-truck-moving"></i>
                                                <span>لقد وفرت 30.02 دولار للشحن المجاني</span>
                                            </div>
                                        </div>
                                        <div class="col-md-5 buttons">
                                            <a href="#" class="continue-shopping-btn">مواصلة التسوق</a>
                                            <a href="#" class="confirm" type="submit">تأكيد</a>
                                        </div>
                                    </div>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Complete Process -->
@endsection
