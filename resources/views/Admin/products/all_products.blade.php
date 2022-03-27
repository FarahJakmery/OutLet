@extends('layouts.master')

@section('css')
    <!-- Internal Nice-select css  -->
    <link href="{{ URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
@endsection

@section('title')
    المنتجات
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">المتجر</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                        المنتجات</span>
                </div>
            </div>
        </div>
        <div class="main-dashboard-header-right">
            <a href="{{ route('products.create') }}">
                <button type="submit" class="btn btn-primary">إضافة منتج</button>
            </a>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- row -->
    <div class="row row-sm">
        {{-- قائمة التصنيفات --}}
        <div class="col-xl-3 col-lg-3 col-md-12 mb-3 mb-md-0">
            <div class="card">
                <div class="card-header border-bottom pt-3 pb-3 mb-0 fw-bold text-uppercase">Category</div>
                <div class="card-body pb-0">
                    <div class="form-group">
                        <label class="form-label">Mens</label>
                        <select name="beast" id="select-beast" class="form-control  nice-select  form-select">
                            <option value="0">--Select--</option>
                            <option value="1">Foot wear</option>
                            <option value="2">Top wear</option>
                            <option value="3">Bootom wear</option>
                            <option value="4">Men's Groming</option>
                            <option value="5">Accessories</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label class="form-label">Women</label>
                        <select name="beast" id="select-beast1" class="form-control  nice-select  form-select">
                            <option value="0">--Select--</option>
                            <option value="1">Western wear</option>
                            <option value="2">Foot wear</option>
                            <option value="3">Top wear</option>
                            <option value="4">Bootom wear</option>
                            <option value="5">Beuty Groming</option>
                            <option value="6">Accessories</option>
                            <option value="7">jewellery</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label class="form-label">Baby & Kids</label>
                        <select name="beast" id="select-beast2" class="form-control  nice-select  form-select">
                            <option value="0">--Select--</option>
                            <option value="1">Boys clothing</option>
                            <option value="2">girls Clothing</option>
                            <option value="3">Toys</option>
                            <option value="4">Baby Care</option>
                            <option value="5">Kids footwear</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label class="form-label">Electronics</label>
                        <select name="beast" id="select-beast3" class="form-control  nice-select  form-select">
                            <option value="0">--Select--</option>
                            <option value="1">Mobiles</option>
                            <option value="2">Laptops</option>
                            <option value="3">Gaming & Accessories</option>
                            <option value="4">Health care Appliances</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label class="form-label">Sport,Books & More </label>
                        <select name="beast" id="select-beast4" class="form-control  nice-select  form-select">
                            <option value="0">--Select--</option>
                            <option value="1">Stationery</option>
                            <option value="2">Books</option>
                            <option value="3">Gaming</option>
                            <option value="4">Music</option>
                            <option value="5">Exercise & fitness</option>
                        </select>
                    </div>
                </div>
                <div class="card-header border-bottom border-top pt-3 pb-3 mb-0 fw-bold text-uppercase rounded-0">
                    Filter</div>
                <div class="card-body">
                    <form role="form product-form">
                        <div class="form-group">
                            <label>Brand</label>
                            <select class="form-control nice-select">
                                <option>Wallmart</option>
                                <option>Catseye</option>
                                <option>Moonsoon</option>
                                <option>Textmart</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <select class="form-control nice-select">
                                <option>Small</option>
                                <option>Medium</option>
                                <option>Large</option>
                                <option>Extra Large</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="card-header border-bottom border-top pt-3 pb-3 mb-0 fw-bold text-uppercase rounded-0">
                    Rating</div>
                <div class="py-2 px-3">
                    <label class="p-1 mt-2 d-flex align-items-center">
                        <span class="check-box mb-0">
                            <span class="ckbox"><input checked="" type="checkbox"><span></span></span>
                        </span>
                        <span class="ms-3 tx-16 my-auto">
                            <i class="ion ion-md-star  text-warning"></i>
                            <i class="ion ion-md-star  text-warning"></i>
                            <i class="ion ion-md-star  text-warning"></i>
                            <i class="ion ion-md-star  text-warning"></i>
                            <i class="ion ion-md-star  text-warning"></i>
                        </span>
                    </label>
                    <label class="p-1 mt-2 d-flex align-items-center">
                        <span class="check-box mb-0">
                            <span class="ckbox"><input checked="" type="checkbox"><span></span></span>
                        </span>
                        <span class="ms-3 tx-16 my-auto">
                            <i class="ion ion-md-star  text-warning"></i>
                            <i class="ion ion-md-star  text-warning"></i>
                            <i class="ion ion-md-star  text-warning"></i>
                            <i class="ion ion-md-star  text-warning"></i>
                        </span>
                    </label>
                    <label class="p-1 mt-2 d-flex align-items-center">
                        <span class="check-box mb-0">
                            <span class="ckbox"><input checked="" type="checkbox"><span></span></span>
                        </span>
                        <span class="ms-3 tx-16 my-auto">
                            <i class="ion ion-md-star  text-warning"></i>
                            <i class="ion ion-md-star  text-warning"></i>
                            <i class="ion ion-md-star  text-warning"></i>
                        </span>
                    </label>
                    <label class="p-1 mt-2 d-flex align-items-center">
                        <span class="checkbox mb-0">
                            <span class="check-box">
                                <span class="ckbox"><input type="checkbox"><span></span></span>
                            </span>
                        </span>
                        <span class="ms-3 tx-16 my-auto">
                            <i class="ion ion-md-star  text-warning"></i>
                            <i class="ion ion-md-star  text-warning"></i>
                        </span>
                    </label>
                    <label class="p-1 mt-2 d-flex align-items-center">
                        <span class="checkbox mb-0">
                            <span class="check-box">
                                <span class="ckbox"><input type="checkbox"><span></span></span>
                            </span>
                        </span>
                        <span class="ms-3 tx-16 my-auto">
                            <i class="ion ion-md-star  text-warning"></i>
                        </span>
                    </label>
                    <button class="btn btn-primary-gradient mt-2 mb-2 pb-2" type="submit">Filter</button>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12">
            {{-- مربع البحث --}}
            <div class="card">
                <div class="card-body p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search ...">
                        <span class="input-group-text p-0">
                            <button class="btn btn-primary" type="button">Search</button>
                        </span>
                    </div>
                </div>
            </div>
            {{-- المنجات --}}
            <div class="row row-sm">
                @foreach ($products as $product)
                    <div class="col-md-6 col-lg-6 col-xl-4  col-sm-6">
                        <a href="{{ route('products.show', $product->id) }}">
                            <div class="card">
                                <div class="card-body h-100">
                                    <div class="pro-img-box">
                                        <div class="d-flex product-sale">
                                            <div class="badge bg-pink">New</div>
                                            <a class="addtowishlist" href="#" data-product_id="{{ $product->id }}">
                                                <i class="mdi mdi-heart-outline ms-auto wishlist"></i>
                                            </a>
                                        </div>
                                        <img class="w-100"
                                            src="{{ asset('images/The_Product/' . $product->photo_name) }}"
                                            alt="product-image">
                                    </div>
                                    <div class="text-center pt-3">
                                        <h3 class="h6 mb-2 mt-4 fw-bold text-uppercase">
                                            {{ $product->translate('en')->product_name }}
                                        </h3>
                                        <span class="tx-15 ms-auto">
                                            <i class="ion ion-md-star text-warning"></i>
                                            <i class="ion ion-md-star text-warning"></i>
                                            <i class="ion ion-md-star text-warning"></i>
                                            <i class="ion ion-md-star-half text-warning"></i>
                                            <i class="ion ion-md-star-outline text-warning"></i>
                                        </span>
                                        {{-- السعر بعد التخفيضات --}}
                                        <h4 class="h5 mb-0 mt-2 text-center fw-bold text-danger">
                                            ${{ $product->max_price }}
                                            {{-- السعر الأساسي --}}
                                            <span class="text-secondary fw-normal tx-13 ms-1 prev-price">
                                                ${{ $product->min_price }}
                                            </span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach


                {{-- Pagination --}}
                <ul class="pagination product-pagination ms-auto float-end">
                    <li class="page-item page-prev disabled">
                        <a class="page-link" href="#" tabindex="-1">Prev</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item page-next">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection

@section('js')
    <!-- JQuery min js -->
    <script src="{{ URL::asset('assets/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Internal Nice-select js-->
    <script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js') }}"></script>

    <script>
        $(document).ready(function() {

            $(document).on('click', '.addtowishlist', function(e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/wishlist",
                    data: {
                        'productId': $(this).attr('data-product_id'),
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                    }
                });
            });

        });
    </script>
@endsection
