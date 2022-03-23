@extends('layouts.master')

@section('css')
    <!--- Animations css-->
    <link href="../../assets/css/animate.css" rel="stylesheet">
    <!-- Internal Select2 css -->
    <link href="../../assets/plugins/select2/css/select2.min.css" rel="stylesheet">
@endsection

@section('title')
    تعديل المستخدم
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المستخدمين</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                    تعديل المستخدم</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                        <h3>المعلومات الشخصية</h3>
                        <div class="row">
                            <div class="col">
                                <div class="control-group form-group">
                                    <label class="form-label">اسم المستخدم:<span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control required" placeholder="اسم المستخدم" name="name"
                                        value="{{ old('name') ?? $user->name }}" data-bs-placement="bottom"
                                        data-bs-toggle="tooltip" title="يرجى ادخال اسم المستخدم" required="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="control-group form-group">
                                    <label class="form-label">البريد الإلكتروني:<span
                                            class="tx-danger">*</span></label>
                                    <input type="email" class="form-control required" placeholder="example@gmail.com"
                                        name="email" value="{{ old('email') ?? $user->email }}" data-bs-placement="bottom"
                                        data-bs-toggle="tooltip" title="يرجى ادخال البريد الإلكتروني" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="control-group form-group">
                                    <label class="form-label">كلمة المرور:<span class="tx-danger">*</span></label>
                                    <input type="password" class="form-control required" placeholder="********"
                                        name="password" data-bs-placement="bottom" data-bs-toggle="tooltip"
                                        title="يرجى ادخال كلمة المرور" required="">
                                </div>
                            </div>
                            <div class="col">

                                <div class="control-group form-group mb-0">
                                    <label class="form-label">تأكيد كلمة المرور:<span
                                            class="tx-danger">*</span></label>
                                    <input type="password" class="form-control required" placeholder="********"
                                        name="confirm-password" data-bs-placement="bottom" data-bs-toggle="tooltip"
                                        title="يرجى تأكيد كلمة المرور" required="">
                                </div>
                            </div>
                        </div>
                        <h3>حالة المستخدم و الأدوار</h3>
                        <div class="row">
                            <div class="col">
                                <label class="form-label">حالة المستخدم:<span class="tx-danger">*</span></label>
                                <select class="form-control select2" required="" name="Status">
                                    <option value="مفعل">
                                        مفعل
                                    </option>
                                    <option value="غير مفعل">
                                        غير مفعل
                                    </option>

                                </select>
                            </div>
                            <div class="col">
                                <div class="col-lg-4 mg-b-20 mg-lg-b-0">
                                    <p class="mg-b-10">أدوار المستخدم</p>
                                    {!! Form::select('roles[]', $roles, $userRole, ['class' => 'form-control', 'multiple']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button class="btn btn-main-primary pd-x-20" type="submit">تحديث</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- row closed -->
@endsection

@section('js')
    <!--Internal  Select2 js -->
    <script src="../../assets/plugins/select2/js/select2.min.js"></script>
    <!-- JQuery min js -->
    <script src="../../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Internal form-elements js -->
    <script src="../../assets/js/form-elements.js"></script>
@endsection
