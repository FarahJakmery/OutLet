@extends('layouts.master')

@section('css')
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
                    <div class="main-content-label mg-b-5">
                        Basic Style3 Tabs
                    </div>
                    <p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.
                    </p>
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
                                                    صور المنتج
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#tab13" data-bs-toggle="tab">
                                                    <i class="fa fa-cogs"></i>

                                                </a>
                                            </li>
                                            <li>
                                                <a href="#tab14" data-bs-toggle="tab">
                                                    <i class="fa fa-tasks"></i>
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
                                                        <div class=" col-xl-5 col-lg-12 col-md-12">
                                                            <div class="preview-pic tab-content">
                                                                @foreach ($images as $image)
                                                                    <div class="tab-pane active" id="pic-1">
                                                                        <img src="{{ asset('images/The_product/' . $image->image_name) }}"
                                                                            alt="image" />
                                                                    </div>
                                                                @endforeach
                                                                {{-- <div class="tab-pane" id="pic-2">
                                                                    <img src="../../assets/img/ecommerce/shirt-2.png" alt="image" />
                                                                </div>
                                                                <div class="tab-pane" id="pic-3">
                                                                    <img src="../../assets/img/ecommerce/shirt-3.png" alt="image" />
                                                                </div>
                                                                <div class="tab-pane" id="pic-4">
                                                                    <img src="../../assets/img/ecommerce/shirt-4.png" alt="image" />
                                                                </div>
                                                                <div class="tab-pane" id="pic-5">
                                                                    <img src="../../assets/img/ecommerce/shirt-1.png" alt="image" />
                                                                </div> --}}
                                                            </div>
                                                            <ul class="preview-thumbnail nav nav-tabs">
                                                                <li class="active">
                                                                    <a data-bs-target="#pic-1" data-bs-toggle="tab">
                                                                        <img src="../../assets/img/ecommerce/shirt-5.png"
                                                                            alt="image" />
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a data-bs-target="#pic-2" data-bs-toggle="tab">
                                                                        <img src="../../assets/img/ecommerce/shirt-2.png"
                                                                            alt="image" />
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a data-bs-target="#pic-3" data-bs-toggle="tab">
                                                                        <img src="../../assets/img/ecommerce/shirt-3.png"
                                                                            alt="image" />
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a data-bs-target="#pic-4" data-bs-toggle="tab">
                                                                        <img src="../../assets/img/ecommerce/shirt-4.png"
                                                                            alt="image" />
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a data-bs-target="#pic-5" data-bs-toggle="tab">
                                                                        <img src="../../assets/img/ecommerce/shirt-1.png"
                                                                            alt="image" />
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
                                                            <h4 class="product-title mb-1">
                                                                {{ $product->translate('en')->product_name }}</h4>
                                                            <p class="text-muted tx-13 mb-1">Men red & Grey Checked Casual
                                                                Shirt</p>
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

                                                            <h6 class="price">
                                                                current price: <span
                                                                    class="h3 ms-2">${{ $product->current_price }}</span>
                                                            </h6>
                                                            <p class="product-description">
                                                                {{ $product->translate('en')->description }}</p>
                                                            <p class="vote"><strong>91%</strong> of buyers enjoyed
                                                                this product! <strong>(87
                                                                    votes)</strong></p>
                                                            <div class="sizes d-flex">sizes:
                                                                <span class="size d-flex" data-bs-toggle="tooltip"
                                                                    title="small">
                                                                    <label class="rdiobox mb-0"><input checked=""
                                                                            name="rdio" type="radio">
                                                                        <span class="fw-bold">s</span>
                                                                    </label>
                                                                </span>
                                                                <span class="size d-flex" data-bs-toggle="tooltip"
                                                                    title="medium">
                                                                    <label class="rdiobox mb-0"><input name="rdio"
                                                                            type="radio">
                                                                        <span>m</span>
                                                                    </label>
                                                                </span>
                                                                <span class="size d-flex" data-bs-toggle="tooltip"
                                                                    title="large">
                                                                    <label class="rdiobox mb-0"><input name="rdio"
                                                                            type="radio">
                                                                        <span>l</span>
                                                                    </label>
                                                                </span>
                                                                <span class="size d-flex" data-bs-toggle="tooltip"
                                                                    title="extra-large">
                                                                    <label class="rdiobox mb-0"><input name="rdio"
                                                                            type="radio">
                                                                        <span>xl</span>
                                                                    </label>
                                                                </span>
                                                            </div>
                                                            <div class="colors d-flex me-3 mt-2">
                                                                <span class="mt-2">colors:</span>
                                                                <div class="row gutters-xs ms-4">
                                                                    <div class="w-auto  ps-0 pe-0" id="m-l-c-2">
                                                                        @foreach ($colors as $color)
                                                                            <label class="colorinput">
                                                                                <input name="color"
                                                                                    class="colorinput-input">
                                                                                <span class="colorinput-color"
                                                                                    style="background-color:{{ $color->color }}">
                                                                                </span>
                                                                            </label>
                                                                            @foreach ($color->sizes as $size)
                                                                                <div class="sizes d-flex">
                                                                                    <span class="size d-flex"
                                                                                        data-bs-toggle="tooltip"
                                                                                        title="small">
                                                                                        <label class="rdiobox mb-0">
                                                                                            <input checked="" name="rdio"
                                                                                                type="radio">
                                                                                            <span
                                                                                                class="fw-bold">{{ $size->size_name }}</span>
                                                                                        </label>
                                                                                    </span>
                                                                                </div>
                                                                            @endforeach
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex  mt-2">
                                                                <div class="mt-2 product-title">
                                                                    Quantity:{{ $product->quantity }}</div>

                                                            </div>
                                                            {{-- <div class="action">
                                                                <button class="add-to-cart btn btn-danger" type="button">ADD TO
                                                                    WISHLIST</button>
                                                                <button class="add-to-cart btn btn-success" type="button">ADD TO
                                                                    CART</button>
                                                            </div> --}}


                                                            <div class="row">
                                                                {{-- <div class="col">
                                                                    <a href="{{ route('fastSellingProduct.edit', $product->id) }}">
                                                                        <button class="btn btn-primary" type="button">
                                                                            تعديل المنتج
                                                                        </button>
                                                                    </a>
                                                                </div> --}}
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
                                                                        <a class="btn btn-outline-success btn-sm"
                                                                            {{-- href="{{ url('View_file') }}/{{ $invoices->invoice_number }}/{{ $image->image_name }}" --}} role="button"><i
                                                                                class="fas fa-eye"></i>&nbsp;
                                                                            عرض</a>

                                                                        <a class="btn btn-outline-info btn-sm"
                                                                            {{-- href="{{ url('download') }}/{{ $invoices->invoice_number }}/{{ $image->image_name }}" --}} role="button"><i
                                                                                class="fas fa-download"></i>&nbsp;
                                                                            تحميل</a>

                                                                        @can('حذف المرفق')
                                                                            <button class="btn btn-outline-danger btn-sm"
                                                                                data-toggle="modal"
                                                                                data-image_name="{{ $image->image_name }}"
                                                                                {{-- data-invoice_number="{{ $image->invoice_number }}" --}}
                                                                                data-id_file="{{ $image->id }}"
                                                                                data-target="#delete_file">حذف</button>
                                                                        @endcan

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
                                        {{-- <div class="tab-pane" id="tab14">
                                        </div> --}}
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
@endsection

@section('scripts')
@endsection
