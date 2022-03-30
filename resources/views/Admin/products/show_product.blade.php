@extends('layouts.master')

@section('css')
    <!---Internal  Owl Carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet">

    <!---Internal  Multislider css-->
    <link href="{{ URL::asset('assets/plugins/multislider/multislider.css') }}" rel="stylesheet">

    <!--- Animations css-->
    <link href="{{ URL::asset('assets/css/animate.css') }}" rel="stylesheet">
@endsection

@section('title')
    تفاصيل المنتج
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المتجر</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                    تفاصيل المنتج</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card mg-b-20" id="tabs-style3">
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-3">
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu ">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs">
                                            <li class="">
                                                <a href="#tab11" class="active" data-bs-toggle="tab">
                                                    <i class="fa fa-laptop"></i>
                                                    تفاصيل المنتج
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#tab12" data-bs-toggle="tab">
                                                    <i class="fa fa-cube"></i>
                                                    إدارة صور المنتج
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#tab14" data-bs-toggle="tab">
                                                    <i class="fa fa-tasks"></i>
                                                    صور المنتج
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#tab13" data-bs-toggle="tab">
                                                    <i class="fa fa-cogs"></i>
                                                    حالات المنتج
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab11">
                                            <div class="card">
                                                <div class="card-body h-100">
                                                    <div class="row row-sm ">
                                                        <div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
                                                            {{-- Names --}}
                                                            <h4 class="product-title mb-1">
                                                                {{ $product->translate('en')->product_name }}</h4>
                                                            <p class="text-muted tx-13 mb-1">
                                                                {{ $product->translate('ar')->product_name }}</p>
                                                            {{-- Ratings --}}
                                                            <div class="rating mb-1">
                                                                <div class="stars">
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star checked"></span>
                                                                    <span class="fa fa-star text-muted"></span>
                                                                    <span class="fa fa-star text-muted"></span>
                                                                </div>
                                                                <span class="review-no">41 reviews</span>
                                                            </div>
                                                            {{-- Prices --}}
                                                            <div class="row">
                                                                <div class="col">
                                                                    <h6 class="price">
                                                                        Max price:
                                                                        <span class="h3 ms-2">
                                                                            ${{ $product->max_price }}
                                                                        </span>
                                                                    </h6>
                                                                </div>
                                                                <div class="col">
                                                                    <h6 class="price">
                                                                        Min price:
                                                                        <span class="h3 ms-2">
                                                                            ${{ $product->min_price }}
                                                                        </span>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                            {{-- Descriptions --}}
                                                            <div class="row">
                                                                <p class="product-description">
                                                                    {{ $product->translate('en')->description }}
                                                                </p><br>
                                                                <p class="product-description">
                                                                    {{ $product->translate('ar')->description }}
                                                                </p>
                                                            </div>
                                                            {{-- Quantity --}}
                                                            <div class="d-flex  mt-2">
                                                                <div class="mt-2 product-title">
                                                                    Quantity:{{ $product->quantity }}
                                                                </div>

                                                            </div>
                                                            {{-- Edit & Delete Buttons --}}
                                                            <div class="row">
                                                                <div class="col">
                                                                    <a href="{{ route('products.edit', $product->id) }}">
                                                                        <button class="btn btn-primary" type="button">
                                                                            تعديل المنتج
                                                                        </button>
                                                                    </a>
                                                                </div>
                                                                <div class="col">
                                                                    <form
                                                                        action="{{ route('products.destroy', $product->id) }}"
                                                                        method="POST">
                                                                        {{ method_field('delete') }}
                                                                        {{ csrf_field() }}
                                                                        <button class="btn btn-danger" type="submit"
                                                                            value="Delete">
                                                                            حذف المنتج
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            {{-- Color & Sizes --}}
                                                            <span class="mt-2">colors:</span>
                                                            <div class="colors d-flex me-3 mt-2">
                                                                <div class="row gutters-xs ms-4">
                                                                    <div class="w-auto  ps-0 pe-0" id="m-l-c-2">
                                                                        @foreach ($colors as $color)
                                                                            <label class="colorinput">
                                                                                <input name="color"
                                                                                    class="colorinput-input">
                                                                                <span class="colorinput-color"
                                                                                    style="background-color:{{ $color->color }}">
                                                                                </span>
                                                                                <div class="sizes d-flex">
                                                                                    @foreach ($color->sizes as $size)
                                                                                        <span class="size d-flex"
                                                                                            data-bs-toggle="tooltip"
                                                                                            title="small">
                                                                                            <label class="rdiobox mb-0">
                                                                                                <input checked=""
                                                                                                    name="rdio"
                                                                                                    type="radio">
                                                                                                <span
                                                                                                    class="fw-bold">
                                                                                                    {{ $size->size_name }}
                                                                                                </span>
                                                                                            </label>
                                                                                        </span>
                                                                                    @endforeach
                                                                                </div>
                                                                            </label>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab12">
                                            <!--الصور-->
                                            <div class="card card-statistics">
                                                {{-- @can('اضافة صورة') --}}
                                                <div class="card-body">
                                                    <p class="text-danger">* صيغة الصور jpeg ,.jpg , png </p>
                                                    <h5 class="card-title">اضافة صورة</h5>
                                                    <form method="POST" action="{{ route('productImages.store') }}"
                                                        enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="customFile"
                                                                name="image_name" required>
                                                            <input type="hidden" id="customFile" name="product_number"
                                                                value="{{ $product->product_number }}">
                                                            <input type="hidden" id="product_id" name="product_id"
                                                                value="{{ $product->id }}">
                                                            <label class="custom-file-label" for="customFile">
                                                                حدد المرفق
                                                            </label>
                                                        </div><br><br>
                                                        <button type="submit" class="btn btn-primary btn-sm "
                                                            name="uploadedFile">
                                                            تاكيد
                                                        </button>
                                                    </form>
                                                </div>
                                                {{-- @endcan --}}
                                                <br>

                                                <div class="table-responsive mt-15">
                                                    <table class="table center-aligned-table mb-0 table table-hover"
                                                        style="text-align:center">
                                                        <thead>
                                                            <tr class="text-dark">
                                                                <th scope="col">#</th>
                                                                <th scope="col">اسم الصورة</th>
                                                                <th scope="col">تاريخ الاضافة</th>
                                                                <th scope="col">العمليات</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($images as $image)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $image->image_name }}</td>
                                                                    <td>{{ $image->created_at }}</td>
                                                                    <td colspan="2">
                                                                        <button
                                                                            class="modal-effect btn btn-outline-danger btn-sm"
                                                                            data-bs-effect="effect-flip-vertical"
                                                                            data-bs-toggle="modal"
                                                                            data-id="{{ $image->id }}"
                                                                            data-image_name="{{ $image->image_name }}"
                                                                            data-product_number="{{ $image->product_number }}"
                                                                            href="#DeleteModal">حذف
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="tab-pane" id="tab13">
                                        </div> --}}
                                        <div class="tab-pane" id="tab14">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="card custom-card">
                                                    <div class="card-body ht-100p">
                                                        <div>
                                                            <h6 class="card-title mb-1">Multi Slider</h6>
                                                            <p class="text-muted card-sub-title">Multislider is a jQuery
                                                                powered slideshow that specializes in showing more than one
                                                                slide at a time. There's no need to find messy CSS and JS
                                                                work arounds for other single-slide solutions. Multislider
                                                                allows the developer to focus fully on each individual slide
                                                                as it's own component, and then displays as many slides as
                                                                you decide in a manner that is fluid, consistent, and
                                                                dymanic.</p>
                                                        </div>
                                                        <div id="basicSlider">
                                                            <div class="MS-content">
                                                                @foreach ($images as $image)
                                                                    <div class="item">
                                                                        <a href="#" target="_blank">
                                                                            <img src="{{ asset('images/The_Product/' . $image->image_name) }}"
                                                                                alt="" />
                                                                        </a>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->

    <!-- Delete Image -->
    <div class="modal fade" id="DeleteModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content tx-color-sm">
                <form method="POST" action="{{ route('delete_image') }}">
                    {{ csrf_field() }}
                    <div class="modal-body tx-center pd-y-20 pd-x-20">
                        <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <i class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block">
                        </i>
                        <h1 class="tx-danger mg-b-20">خطر !!</h1>
                        <p class="mg-b-20 mg-x-20">
                        <h3>هل تريد حقا حذف هذة الصورة؟</h3>
                        </p>
                        <input type="hidden" name="id" id="id" value="">
                        <input class="form-control" name="image_name" id="image_name" type="text" readonly>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn ripple btn-danger">حفظ التغييرات</button>
                        <button type="button" class="btn ripple btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Delete color -->
@endsection

@section('js')
    <!-- JQuery min js -->
    <script src="{{ URL::asset('assets/plugins/jquery/jquery.min.js') }}"></script>

    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>

    <!-- Bootstrap Bundle js -->
    <script src="{{ URL::asset('assets/plugins/bootstrap/js/bootstrap-rtl.js') }}"></script>

    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>

    <!--- Internal Accordion Js -->
    <script src="{{ URL::asset('assets/plugins/accordion/accordion.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/accordion.js') }}"></script>

    <!-- Internal Owl Carousel js-->
    <script src="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.js') }}"></script>

    <!---Internal  Multislider js-->
    <script src="{{ URL::asset('assets/plugins/multislider/multislider-rtl.js') }}"></script>
    <script src="{{ URL::asset('assets/js/carousel.js') }}"></script>

    {{-- This script return the value of each input for deleting it --}}
    <script>
        $('#DeleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var image_name = button.data('image_name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #image_name').val(image_name);
        })
    </script>
@endsection
