@extends('layouts.master')

@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/datatables.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/responsive.bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">

    <!--- Animations css-->
    <link href="{{ URL::asset('assets/css/animate.css') }}" rel="stylesheet">

    <!---Internal Owl Carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet">

    <!---Internal  Multislider css-->
    <link href="{{ URL::asset('assets/plugins/multislider/multislider.css') }}" rel="stylesheet">

    <!--- Select2 css --->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">

    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />

    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
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
                                    <th class="border-bottom-0">اسم العلامة التجارية عربي</th>
                                    <th class="border-bottom-0">اسم العلامة التجارية انجليزي</th>
                                    <th class="border-bottom-0">الوصف عربي</th>
                                    <th class="border-bottom-0">الوصف انجليزي</th>
                                    <th class="border-bottom-0">اللوغو</th>
                                    <th class="border-bottom-0">الخيارات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $brand->translate('ar')->brand_name }}</td>
                                        <td>{{ $brand->translate('en')->brand_name }}</td>
                                        <td>{{ $brand->translate('ar')->description }}</td>
                                        <td>{{ $brand->translate('en')->description }}</td>
                                        <td>
                                            <img alt="Responsive image" class="img-thumbnail wd-75p wd-sm-75"
                                                src="{{ asset($brand->logo_name) }}">
                                        </td>
                                        <td>
                                            <div class="btn-icon-list">
                                                {{-- The Edit Button --}}
                                                <a class="modal-effect btn btn-info btn-icon"
                                                    data-bs-effect="effect-newspaper" data-id="{{ $brand->id }}"
                                                    data-arabic_brand_name="{{ $brand->translate('ar')->brand_name }}"
                                                    data-english_brand_name="{{ $brand->translate('en')->brand_name }}"
                                                    data-arabic_description="{{ $brand->translate('ar')->description }}"
                                                    data-english_description="{{ $brand->translate('en')->description }}"
                                                    data-bs-toggle="modal" href="#EditModal" title="تعديل">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                {{-- The Delete Button --}}
                                                <a class="modal-effect btn btn-danger btn-icon"
                                                    data-bs-effect="effect-flip-vertical" data-id="{{ $brand->id }}"
                                                    data-arabic_brand_name="{{ $brand->translate('ar')->brand_name }}"
                                                    data-english_brand_name="{{ $brand->translate('en')->brand_name }}"
                                                    data-bs-toggle="modal" href="#DeleteModal" title="حذف">
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
                    <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data"
                        autocomplete="on">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="panel panel-primary tabs-style-2">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li><a href="#tab4" class="nav-link active" data-bs-toggle="tab">عربي</a>
                                            </li>
                                            <li><a href="#tab5" class="nav-link" data-bs-toggle="tab">انكليزي</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">
                                        {{-- Add Brand in Arabic --}}
                                        <div class="tab-pane active" id="tab4">
                                            {{-- حقل إدخال اسم العلامة التجارية باللغة العربية --}}
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">
                                                    <b>اسم العلامة التجارية باللغة العربية</b></label>
                                                <input type="text" class="form-control" name="brand_name_ar"
                                                    id="brand-arabic-name" required>
                                            </div>
                                            {{-- حقل إدخال وصف العلامة التجارية باللغة العربية --}}
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1"><b>الوصف باللغة العربية</b></label>
                                                <textarea class="form-control" name="description_ar" id="arabic-description" rows="3" required>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          </textarea>
                                            </div>
                                            {{-- حقل اختيار اللوغو --}}
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">
                                                    <b>لوغو العلامة التجارية</b>
                                                </label>
                                                <p class="text-danger">Logo format jpeg, jpg, png</p>
                                                <input type="file" name="logo_name" class="dropify"
                                                    data-height="70" />
                                            </div>
                                        </div>

                                        {{-- Add Brand in English --}}
                                        <div class="tab-pane" id="tab5">
                                            {{-- حقل إدخال اسم العلامة التجارية باللغة الإنجليزية --}}
                                            <div class=" form-group">
                                                <label for="exampleInputEmail1">
                                                    <b>اسم العلامة التجارية باللغة الإنجليزية</b></label>
                                                <input type="text" class="form-control" name="brand_name_en"
                                                    id="brand-english-name" required>
                                            </div>
                                            {{-- حقل إدخال وصف العلامة التجارية باللغة الإنجليزية --}}
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1"><b>الوصف</b></label>
                                                <textarea class="form-control" name="description_en" id="english-description" rows="3" required>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">تأكيد</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                        </div>
                    </form>
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
                    <form action="brands/update" method="POST" enctype="multipart/form-data">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="panel panel-primary tabs-style-2">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li><a href="#tab8" class="nav-link active" data-bs-toggle="tab">عربي</a>
                                            </li>
                                            <li><a href="#tab10" class="nav-link" data-bs-toggle="tab">انكليزي</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">
                                        {{-- Edit Brand in Arabic --}}
                                        <div class="tab-pane active" id="tab8">
                                            {{-- حقل تعديل اسم العلامة التجارية باللغة العربية --}}
                                            <div class=" form-group">
                                                <input type="hidden" name="id" id="id" value="">
                                                <label for="exampleInputEmail1">
                                                    <b>اسم العلامة التجارية باللغة العربية</b></label>
                                                <input type="text" class="form-control" name="brand_name_ar"
                                                    id="arabic_brand_name" required>
                                            </div>
                                            {{-- حقل تعديل وصف العلامة التجارية باللغة العربية --}}
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1" class="col-form-label">
                                                    <b>الوصف باللغة العربية</b></label>
                                                <textarea class="form-control" name="description_ar" id="arabic_description" rows="3" required></textarea>
                                            </div>
                                            {{-- حقل اختيار اللوغو --}}
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">
                                                    <b>لوغو العلامة التجارية</b>
                                                </label>
                                                <p class="text-danger">Logo format jpeg, jpg, png</p>
                                                <input type="file" name="logo_name" class="dropify"
                                                    data-height="70" />
                                            </div>
                                        </div>

                                        {{-- Edit Brand in English --}}
                                        <div class="tab-pane" id="tab10">
                                            {{-- حقل تعديل اسم العلامة التجارية باللغة الإنجليزية --}}
                                            <div class=" form-group">
                                                <label for="exampleInputEmail1">
                                                    <b>اسم العلامة التجارية باللغة الإنجليزية</b></label>
                                                <input type="text" class="form-control" name="brand_name_en"
                                                    id="english_brand_name" required>
                                            </div>
                                            {{-- حقل تعديل وصف العلامة التجارية باللغة الإنجليزية --}}
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">
                                                    <b>الوصف باللغة الإنجليزية</b></label>
                                                <textarea class="form-control" name="description_en" id="english_description" rows="3" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Footer --}}
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">تأكيد</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
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
                            <input class="form-control" name="brand_name_ar" id="arabic_brand_name" type="text" readonly>
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
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>

    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>

    <!-- Internal Select2.min js -->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>

    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>

    <!--Internal  Clipboard js-->
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>

    <!-- Internal Prism js-->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>

    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>

    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>

    {{-- This script return the value of each input for editing it --}}
    <script>
        $('#EditModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var arabic_brand_name = button.data('arabic_brand_name')
            var english_brand_name = button.data('english_brand_name')
            var arabic_description = button.data('arabic_description')
            var english_description = button.data('english_description')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #arabic_brand_name').val(arabic_brand_name);
            modal.find('.modal-body #english_brand_name').val(english_brand_name);
            modal.find('.modal-body #arabic_description').val(arabic_description);
            modal.find('.modal-body #english_description').val(english_description);
        })
    </script>

    {{-- This script return the value of each input for deleting it --}}
    <script>
        $('#DeleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var arabic_brand_name = button.data('arabic_brand_name')
            var english_brand_name = button.data('english_brand_name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #arabic_brand_name').val(arabic_brand_name);
            modal.find('.modal-body #english_brand_name').val(english_brand_name);
        })
    </script>
@endsection
