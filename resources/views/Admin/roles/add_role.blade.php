@extends('layouts.master')

@section('css')
    <!--Internal  Font Awesome -->
    <link href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!--Internal  treeview -->
    <link href="{{ URL::asset('assets/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('title')
    إضافة دور للمستخدم
@endsection


@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">أدوار المستخدمين</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                    إضافة دور للمستخدم مع صلاحياته</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>خطا</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mg-b-20">
                <div class="card-body">
                    <form action="{{ route('roles.store') }}" method="Post">
                        {{ csrf_field() }}
                        <div class="main-content-label mg-b-5">
                            <div class="col-xs-7 col-sm-7 col-md-7">
                                <div class="form-group">
                                    <label for="inputName">اسم الدور</label>
                                    <input type="text" class="form-control" id="inputName" placeholder="Name" name="name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- قائمة الصلاحيات -->
                            <div class="col-lg-4">
                                <ul id="treeview1">
                                    <li>
                                        <a href="#">صلاحيات هذا الدور</a>
                                        <ul>
                                            @foreach ($permissions as $permission)
                                                <input type="checkbox" value="{{ $permission->id }}" name="permission[]">
                                                <label>
                                                    {{ $permission->name }}
                                                </label>
                                                <br />
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <!-- /قائمة الصلاحيات -->

                            <!-- Submit Button -->
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-main-primary">تأكيد</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection

@section('js')
    <!-- Internal Treeview js -->
    <script src="{{ URL::asset('assets/plugins/treeview/treeview.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>
@endsection
