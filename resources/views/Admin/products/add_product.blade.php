@extends('layouts.master')

@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

    <!--Internal  Datetimepicker-slider css -->
    <link href="{{ URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css') }}"
        rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css') }}"
        rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/pickerjs/picker.min.css') }}" rel="stylesheet">

    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css') }}" rel="stylesheet">

    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />

    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />

    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">

    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">

    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">

    <!--Internal  Font Awesome -->
    <link href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <!--- Animations css-->
    <link href="../../assets/css/animate.css" rel="stylesheet">
@endsection

@section('title')
    إضافة منتج
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المتجر</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                    إضافة منتج</span>
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

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data"
                        autocomplete="on">
                        {{ csrf_field() }}

                        <h5>البيانات الأساسية للمنتج</h5>
                        <div class="card">
                            <div class="card-body">
                                {{-- Row 1 --}}
                                <div class="row">
                                    <div class="col">
                                        <label for="inputName" class="control-label">رقم المنتج</label>
                                        <input type="text" class="form-control" id="inputName" name="product_number"
                                            title="يرجي ادخال رقم المنتج" placeholder="مثال: 12345" required>
                                    </div>

                                    <div class="col">
                                        <label>اسم المنتج باللغة العربية</label>
                                        <input type="text" class="form-control" id="inputName" name="product_name_ar"
                                            title="يرجى ادخال اسم المنتج بالعربية" placeholder="مثال: بنطال جينز" required>
                                    </div>

                                    <div class="col">
                                        <label>اسم المنتج باللغة الإنجليزية</label>
                                        <input type="text" class="form-control" id="inputName" name="product_name_en"
                                            title="يرجى ادخال اسم المنتج بالإنجليزية" placeholder="Jeans :Ex" required>
                                    </div>
                                </div><br>

                                {{-- Row 2 --}}
                                <div class="row">
                                    <div class="col">
                                        <p class="mg-b-20">تاريخ إنشاء المنتج</p>
                                        {{-- <div class="row row-sm">
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <div class="input-group-text">
                                                        <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                                    </div>
                                                </div>
                                                <input class="form-control fc-datepicker" name="product_date" type="text"
                                                    value="{{ date('Y-m-d H:i:s') }}" required>
                                            </div>
                                        </div> --}}

                                        <div class="input-group col-md-4">
                                            <div class="input-group-text">
                                                <div class="input-group-text">
                                                    <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                                </div>
                                            </div><input class="form-control" id="datetimepicker" name="product_date"
                                                type="text" value="{{ date('Y-m-d H:i:s') }}" required>
                                        </div>
                                    </div>
                                    {{-- <div class="col">
                                        <p class="mg-b-20">تاريخ إنتهاء فترة عرض المنتج</p>
                                        <div class="row row-sm">
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <div class="input-group-text">
                                                        <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                                    </div>
                                                </div>
                                                <input type="text" value="2015-02-15 21:05" id="datetimepicker1"
                                                    name="expiry_date" class="form-control" required>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div><br>

                                {{-- Row 3 --}}
                                <div class="row">
                                    <div class="col">
                                        <p class="mg-b-10">العلامات التجارية</p>
                                        <select name="brand_id" class="SlectBox form-control">
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">
                                                    {{ $brand->translate('en')->brand_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col">
                                        <p class="mg-b-10">التصنيفات الرئيسية</p>
                                        <select name="mcategory_id" class="SlectBox form-control"
                                            onclick="console.log($(this).val())" onchange="console.log('change is firing')">
                                            @foreach ($MCates as $MCate)
                                                <option value="{{ $MCate->id }}">
                                                    {{ $MCate->translate('en')->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col">
                                        <p class="mg-b-10">التصنيفات الثانوية</p>
                                        <select id="subcategory_id" name="subcategory_id" class="SlectBox form-control">
                                            @foreach ($SCates as $SCate)
                                                <option value="{{ $SCate->id }}">
                                                    {{ $SCate->translate('en')->subcategory_name }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="col">
                                        <p class="mg-b-10">الفروع</p>
                                        <select id="branch_id" name="branch_id" class="SlectBox form-control">
                                            @foreach ($branches as $branche)
                                                <option value="{{ $branche->id }}">
                                                    {{ $branche->translate('en')->branch_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><br>

                                {{-- Row 4 --}}
                                <div class="row">
                                    <div class="col">
                                        <label for="exampleTextarea">وصف المنتج باللغة العربية</label>
                                        <textarea class="form-control" id="arabic_description" name="description_ar" rows="3"
                                            placeholder="وصف المنتج هنا ...."></textarea>
                                    </div>

                                    <div class="col">
                                        <label for="exampleTextarea">وصف المنتج باللغة الإنجليزية</label>
                                        <textarea class="form-control" id="english_description" name="description_en" rows="3"
                                            placeholder=".... Product Description goes here"></textarea>
                                    </div>
                                </div><br>
                            </div>
                        </div>

                        <h5>البيانات التفصيلية للمنتج</h5>
                        <div class="card">
                            <div class="card-body">
                                {{-- 4 --}}
                                <div class="row">
                                    <div class="col">
                                        <label for="inputName" class="control-label">السعر الأقصى</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-text">
                                                <span class="input-group-text">00.</span>
                                            </div>
                                            <input aria-label="Amount (to the nearest dollar)" class="form-control"
                                                type="text" id="max_price" name="max_price"
                                                title="يؤجى ادخال السعر الأقصى للمنتج">
                                            <div class="input-group-text">
                                                <span class="input-group-text">$</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <label for="inputName" class="control-label">السعر الأدنى</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-text">
                                                <span class="input-group-text">00.</span>
                                            </div>
                                            <input aria-label="Amount (to the nearest dollar)" class="form-control"
                                                type="text" id="min_price" name="min_price"
                                                title="يرجى ادخال السعر الأدنى للمنتج">
                                            <div class="input-group-text">
                                                <span class="input-group-text">$</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <label for="inputName" class="control-label">قيمة تناقص سعر المنتج</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-text">
                                                <span class="input-group-text">00.</span>
                                            </div>
                                            <input aria-label="Amount (to the nearest dollar)" class="form-control"
                                                type="text" id="decreasing_value" name="decreasing_value"
                                                title="يرجى ادخال قيمة تناقص سعر المنتج">
                                            <div class="input-group-text">
                                                <span class="input-group-text">$</span>
                                            </div>
                                        </div>
                                    </div>

                                </div><br>

                                {{-- Row 5 --}}
                                <div class="row">
                                    <div class="col">
                                        <label for="inputName" class="control-label">الكمية</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-text">
                                                <span class="input-group-text">قطعة</span>
                                            </div>
                                            <input aria-label="Amount (to the nearest dollar)" class="form-control"
                                                type="number" id="quantity" name="quantity" data-bs-placement="bottom"
                                                data-bs-toggle="tooltip" title="يرجى ادخال الكمية المتاحة من هذا المنتج">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <p class="mg-b-10">مدة تناقص السعر</p>
                                        <div class="input-group mb-3">
                                            <div class="input-group-text">
                                                <span class="input-group-text">دقيقة</span>
                                            </div>
                                            <input aria-label="Amount (to the nearest dollar)" class="form-control"
                                                type="number" id="minutes" name="minutes" data-bs-placement="bottom"
                                                data-bs-toggle="tooltip"
                                                title="يرجى ادخال المدة التي سيتاقص بعدها سعر المنتج">
                                        </div>
                                    </div>
                                </div>

                                {{-- Row 6 --}}
                                <div class="row">
                                    <div class="col">
                                        <label for="inputName" class="control-label">خيارات الإرجاع</label><br>
                                        <input type="checkbox" id="return_option" name="return_option">
                                        <span>خيار الإرجاع متاح</span>
                                    </div>
                                </div><br>
                            </div>
                        </div>


                        <h5>صور المنتج</h5>
                        <div class="card">
                            <div class="card-body">
                                {{-- 6 --}}
                                <p class="text-danger">* صيغة الصور pdf, jpeg ,.jpg , png </p>
                                <div class="col-sm-12 col-md-12">
                                    <input type="file" name="images[]" data-height="70" multiple>
                                </div><br>
                            </div>
                        </div>

                        {{-- Submit & cancel Buttons --}}
                        <div class="d-flex flex-row justify-content-end mg-b-20">
                            <div>
                                <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                                <button type="button" class="btn btn-secondary" data-ds-dismiss="modal">إلفاء</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal Select2 js -->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{ URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
    <!-- Internal  jquery-simple-date time picker js -->
    <script src="{{ URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
    <!-- Internal  pickerjs js -->
    <script src="{{ URL::asset('assets/plugins/pickerjs/picker.min.js') }}"></script>
    <!-- Internal  Form-elements js -->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>

    <!-- JQuery min js -->
    {{-- <script src="{{ URL::asset('assets/plugins/jquery/jquery.min.js') }}"></script> --}}














    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>

    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>

    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>


    {{-- This script to get the current date --}}
    <script>
        var date = $('#datetimepicker').datetimepicker({
            format: 'yyyy-mm-dd hh:ii',
            autoclose: true
        }).val();
    </script>
@endsection
