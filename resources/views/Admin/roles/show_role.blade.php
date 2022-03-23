@extends('layouts.master')

@section('css')
    <!--Internal  Font Awesome -->
    <link href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!--Internal  treeview -->
    <link href="{{ URL::asset('assets/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('title')
    عرض صلاحيات المستخدم
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">أدوار المستخدمين</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                    عرض صلاحيات المستخدمين</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="row">
                        <!-- col -->
                        <div class="col-lg-4">
                            <ul id="treeview1">
                                <li>
                                    {{-- <a href="#"> --}}
                                    <h3>{{ $role->name }}</h3>
                                    {{-- </a> --}}
                                    <ul>
                                        @if (!empty($rolePermissions))
                                            @foreach ($rolePermissions as $permission)
                                                <li>{{ $permission->name }}</li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- /col -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

@endsection

@section('js')
    <!-- Internal Treeview js -->
    <script src="{{ URL::asset('assets/plugins/treeview/treeview.js') }}"></script>
@endsection
