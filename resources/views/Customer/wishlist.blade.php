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
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المتجر</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                    المنتجات</span>
            </div>
            {{-- <div class="col-sm-4"> --}}
            <a class="modal-effect btn btn-outline-primary btn-block" data-bs-effect="effect-flip-vertical"
                data-bs-toggle="modal" href="{{ route('products.create') }}">إضافة منتج</a>
            {{-- </div> --}}
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
                                            <a class="removeFromwishlist addtowishlist" href="#"
                                                data-product_id="{{ $product->id }}">
                                                <i class="mdi mdi-heart-outline ms-auto wishlist"></i>
                                            </a>
                                        </div>
                                        <img class="w-100" src="../../assets/img/ecommerce/01.jpg"
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
                {{-- <ul class="pagination product-pagination ms-auto float-end">
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
                </ul> --}}
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

            $(document).on('click', '.removeFromwishlist', function(e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "delete",
                    url: "{{ route('wishlist.destroy') }}",
                    data: {
                        'productId': $(this).attr('data-product_id'),
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            });

        });
    </script>
@endsection
