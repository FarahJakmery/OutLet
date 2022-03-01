@extends('layouts.master')

@section('css')
    <!-- Internal Data table css -->
    <link href="../../assets/plugins/datatable/datatables.min.css" rel="stylesheet" />
    <link href="../../assets/plugins/datatable/responsive.dataTables.min.css" rel="stylesheet">
    <link href="../../assets/plugins/datatable/responsive.bootstrap5.css" rel="stylesheet">
    <link href="../../assets/plugins/datatable/css/buttons.bootstrap5.min.css" rel="stylesheet">
    <link href="../../assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="../../assets/plugins/datatable/css/jquery.dataTables.min.css" rel="stylesheet">

    <!--- Animations css-->
    <link href="../../assets/css/animate.css" rel="stylesheet">

    <!---Internal Owl Carousel css-->
    <link href="../../assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">

    <!---Internal  Multislider css-->
    <link href="../../assets/plugins/multislider/multislider.css" rel="stylesheet">

    <!--- Select2 css --->
    <link href="../../assets/plugins/select2/css/select2.min.css" rel="stylesheet">

    <!---Internal  Prism css-->
    <link href="../../assets/plugins/prism/prism.css" rel="stylesheet">

    <!---Internal Fileupload css-->
    <link href="../../assets/plugins/fileuploads/css/fileupload.css" rel="stylesheet" type="text/css" />

    <!---Internal Fancy uploader css-->
    <link href="../../assets/plugins/fancyuploder/fancy_fileupload.css" rel="stylesheet" />
@endsection

@section('title')
    العلامات التجارية
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">التصنيفات</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                    العلامات التجارية </span>
            </div>
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

        <!--Bordered Table-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                {{-- card-header --}}
                <div class="card-header pb-0">
                    {{-- Add Brand Button --}}
                    <div class="col-sm-6 col-md-4 col-xl-3 mg-t-20">
                        <a class="modal-effect btn btn-outline-primary btn-block" data-bs-effect="effect-flip-vertical"
                            data-bs-toggle="modal" href="#modaldemo8">إضافة علامة تجارية</a>
                    </div>
                </div>

                {{-- card-body --}}
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">العلامة التجارية</th>
                                    <th class="border-bottom-0">الوصف</th>
                                    <th class="border-bottom-0">اللوغو</th>
                                    <th class="border-bottom-0">الخيارات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $brand->brand_name }}</td>
                                        <td>{{ $brand->description }}</td>
                                        <td>
                                            <img alt="Responsive image" class="img-thumbnail wd-75p wd-sm-75"
                                                src="../../BrandsLogos/{{ $brand->brand_name }}/{{ $brand->logo_name }}">
                                        </td>
                                        <td>
                                            <div class="btn-icon-list">
                                                {{-- The Edit Button --}}
                                                <a class="modal-effect btn btn-info btn-icon"
                                                    data-bs-effect="effect-newspaper" data-id="{{ $brand->id }}"
                                                    data-brand_name="{{ $brand->brand_name }}"
                                                    data-description="{{ $brand->description }}" data-bs-toggle="modal"
                                                    href="#EditModal" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                {{-- The Delete Button --}}
                                                <a class="modal-effect btn btn-danger btn-icon"
                                                    data-bs-effect="effect-flip-vertical" data-id="{{ $brand->id }}"
                                                    data-brand_name="{{ $brand->brand_name }}" data-bs-toggle="modal"
                                                    href="#DeleteModal" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->

        <!-- Add Section -->
        <div class="modal fade" id="modaldemo8">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">إضافة علامة تجارية</h6>
                        <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class=" form-group">
                                <label for="exampleInputEmail1"><b>اسم العلامة التجارية</b></label>
                                <input type="text" class="form-control" id="brand_name" name="brand_name" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"><b>الوصف</b></label>
                                <textarea class="form-control" id="description" name="description" rows="3" required>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             </textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"><b>لوغو العلامة التجارية</b></label>
                                <p class="text-danger">Logo format jpeg, jpg, png</p>
                                <input type="file" name="logo_name" class="dropify" data-height="70" />
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">تأكيد</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End modal -->

        <!-- Edit Section -->
        <div class="modal fade" id="EditModal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">تعديل العلامة التجارية</h6><button aria-label="Close"
                            class="close" data-bs-dismiss="modal" type="button"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <form method="POST" action="brands/update" autocomplete="off" enctype="multipart/form-data">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" value="">
                                <label for="recipient-name" class="col-form-label"><b>اسم العلامة التجارية</b></label>
                                <input class="form-control" name="brand_name" id="brand_name" type="text">
                            </div>

                            <div class="form-group">
                                <label for="message-text" class="col-form-label"><b>الوصف</b></label>
                                <textarea class="form-control" id="description" name="description"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"><b>لوغو العلامة التجارية</b></label>
                                <p class="text-danger">Logo format jpeg, jpg, png</p>
                                <input type="file" name="logo_name" class="dropify" data-height="70" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End modal -->

        <!-- Delete Brand -->
        <div class="modal fade" id="DeleteModal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content tx-size-sm">
                    <form method="POST" action="brands/destroy">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body tx-center pd-y-20 pd-x-20">
                            <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <i class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block">
                            </i>
                            <h1 class="tx-danger mg-b-20">خطر !!</h1>
                            <p class="mg-b-20 mg-x-20">
                            <h3>هل تريد حقا حذف هذة العلامة التجارية؟؟</h3>
                            </p>
                            <input type="hidden" name="id" id="id" value="">
                            <input class="form-control" name="brand_name" id="brand_name" type="text" readonly>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn ripple btn-danger">حفظ التغييرات</button>
                            <button type="button" class="btn ripple btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete Brand -->
    </div>
    <!-- row closed -->

@endsection

@section('js')
    <!--Internal Data tables -->
    <script src="../../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="../../assets/plugins/datatable/datatables.min.js"></script>
    <script src="../../assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
    <script src="../../assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
    <script src="../../assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
    <script src="../../assets/plugins/datatable/js/jszip.min.js"></script>
    <script src="../../assets/plugins/datatable/js/buttons.html5.min.js"></script>
    <script src="../../assets/plugins/datatable/js/buttons.print.min.js"></script>
    <script src="../../assets/plugins/datatable/js/buttons.colVis.min.js"></script>
    <script src="../../assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
    <script src="../../assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
    <!--Internal  Datatable js -->
    <script src="../../assets/js/table-data.js"></script>

    <!--Internal  Datepicker js -->
    <script src="../../assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>

    <!-- Internal Select2.min js -->
    <script src="../../assets/plugins/select2/js/select2.min.js"></script>

    <!-- Internal Modal js-->
    <script src="../../assets/js/modal.js"></script>

    <!--Internal  Clipboard js-->
    <script src="../../assets/plugins/clipboard/clipboard.min.js"></script>
    <script src="../../assets/plugins/clipboard/clipboard.js"></script>

    <!-- Internal Prism js-->
    <script src="../../assets/plugins/prism/prism.js"></script>

    <!--Internal Fileuploads js-->
    <script src="../../assets/plugins/fileuploads/js/fileupload.js"></script>
    <script src="../../assets/plugins/fileuploads/js/file-upload.js"></script>

    <!--Internal Fancy uploader js-->
    <script src="../../assets/plugins/fancyuploder/jquery.ui.widget.js"></script>
    <script src="../../assets/plugins/fancyuploder/jquery.fileupload.js"></script>
    <script src="../../assets/plugins/fancyuploder/jquery.iframe-transport.js"></script>
    <script src="../../assets/plugins/fancyuploder/jquery.fancy-fileupload.js"></script>
    <script src="../../assets/plugins/fancyuploder/fancy-uploader.js"></script>

    {{-- This script return the value of each input for editing it --}}
    <script>
        $('#EditModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var brand_name = button.data('brand_name')
            var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #brand_name').val(brand_name);
            modal.find('.modal-body #description').val(description);
        })
    </script>

    {{-- This script return the value of each input for deleting it --}}
    <script>
        $('#DeleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var brand_name = button.data('brand_name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #brand_name').val(brand_name);
        })
    </script>
@endsection
