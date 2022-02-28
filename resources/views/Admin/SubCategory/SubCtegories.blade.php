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

    <!--Internal  Font Awesome -->
    <link href="../../assets/plugins/fontawesome-free/css/all.min.css" rel="stylesheet">
@endsection

@section('title')
    Subcategories
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Categories</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                    Subcategories</span>
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
                    {{-- Add Subcategory Button --}}
                    <div class="col-sm-6 col-md-4 col-xl-3 mg-t-20">
                        <a class="modal-effect btn btn-outline-primary btn-block" data-bs-effect="effect-flip-vertical"
                            data-bs-toggle="modal" href="#modaldemo8">Add Subcategory</a>
                    </div>
                </div>

                {{-- card-body --}}
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">Subcategory</th>
                                    <th class="border-bottom-0">Main Category</th>
                                    <th class="border-bottom-0">Description</th>
                                    <th class="border-bottom-0">Logo</th>
                                    <th class="border-bottom-0">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Subctegories as $Subctegory)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $Subctegory->subcategory_name }}</td>
                                        <td>
                                            <ul>
                                                @foreach ($Subctegory->mcategories as $mcategory)
                                                    <li>{{ $mcategory->category_name }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>{{ $Subctegory->description }}</td>
                                        <td>
                                            <img alt="Responsive image" class="img-thumbnail wd-75p wd-sm-75"
                                                src="../../SubcategoriesLogos/{{ $Subctegory->subcategory_name }}/{{ $Subctegory->photo_name }}">
                                        </td>
                                        <td>
                                            <div class="btn-icon-list">
                                                {{-- The Edit Button --}}
                                                <a class="modal-effect btn btn-info btn-icon"
                                                    data-bs-effect="effect-newspaper" data-id="{{ $Subctegory->id }}"
                                                    data-subcategory_name="{{ $Subctegory->subcategory_name }}"
                                                    data-description="{{ $Subctegory->description }}"
                                                    data-bs-toggle="modal" href="#EditModal" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                {{-- The Delete Button --}}
                                                <a class="modal-effect btn btn-danger btn-icon"
                                                    data-bs-effect="effect-flip-vertical" data-id="{{ $Subctegory->id }}"
                                                    data-subcategory_name="{{ $Subctegory->subcategory_name }}"
                                                    data-bs-toggle="modal" href="#DeleteModal" title="Delete">
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
                        <h6 class="modal-title">Add Subcategory</h6>
                        <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('subcategories.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class=" form-group">
                                <label for="exampleInputEmail1"><b>Subcategory Name</b></label>
                                <input type="text" class="form-control" id="subcategory_name" name="subcategory_name"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"><b>Description</b></label>
                                <textarea class="form-control" id="description" name="description" rows="3" required>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         </textarea>
                            </div>

                            <div class="form-group">
                                <p class="mg-b-10"><b>Main Category</b></p>
                                <select multiple="multiple" class="testselect2" name="MCategories[]" required>
                                    @foreach ($MCategories as $MCategory)
                                        <option value="{{ $MCategory->id }}">
                                            {{ $MCategory->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"><b>Subcategory Logo</b></label>
                                <p class="text-danger">Logo format jpeg, jpg, png</p>
                                <input type="file" name="photo_name" class="dropify" data-height="70" />
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                        <h6 class="modal-title">Edit Subcategory</h6><button aria-label="Close" class="close"
                            data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form method="POST" action="subcategories/update" autocomplete="off" enctype="multipart/form-data">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" value="">
                                <label for="recipient-name" class="col-form-label"><b>Subcategory Name</b></label>
                                <input class="form-control" name="subcategory_name" id="subcategory_name" type="text">
                            </div>

                            <div class="form-group">
                                <label for="message-text" class="col-form-label"><b>Description</b></label>
                                <textarea class="form-control" id="description" name="description"></textarea>
                            </div>

                            <div class="form-group">
                                <p class="mg-b-10"><b>Main Category</b></p>
                                <select multiple="multiple" class="testselect2" name="MCategories[]" required>
                                    @foreach ($MCategories as $MCategory)
                                        <option value="{{ $MCategory->id }}">
                                            {{-- {{ in_array($MCategory->id, $Subctegory->mcategories->pluck('id')->toArray()) ? 'selected' : '' }}> --}}
                                            {{ $MCategory->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"><b>Subcategory Logo</b></label>
                                <p class="text-danger">Logo format jpeg, jpg, png</p>
                                <input type="file" name="photo_name" class="dropify" data-height="70" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                    <form method="POST" action="subcategories/destroy">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body tx-center pd-y-20 pd-x-20">
                            <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <i class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block">
                            </i>
                            <h1 class="tx-danger mg-b-20">!! Danger</h1>
                            <p class="mg-b-20 mg-x-20">
                            <h3>Are you sure you want to delete this Subcategory</h3>
                            </p>
                            <input type="hidden" name="id" id="id" value="">
                            <input class="form-control" name="subcategory_name" id="subcategory_name" type="text"
                                readonly>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn ripple btn-danger">Save Changes</button>
                            <button type="button" class="btn ripple btn-secondary" data-bs-dismiss="modal">Close</button>
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

    <!--Internal  Form-elements js-->
    <script src="../../assets/js/advanced-form-elements.js"></script>
    <script src="../../assets/js/select2.js"></script>

    <!-- Internal Select2.min js -->
    <script src="../../assets/plugins/select2/js/select2.min.js"></script>

    <!--Internal Sumoselect js-->
    <script src="../../assets/plugins/sumoselect/jquery.sumoselect.js"></script>

    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="../../assets/plugins/sumoselect/sumoselect-rtl.css">

    <!-- Internal Treeview js -->
    <script src="../../assets/plugins/treeview/treeview.js"></script>

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
            var subcategory_name = button.data('subcategory_name')
            var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #subcategory_name').val(subcategory_name);
            modal.find('.modal-body #description').val(description);
        })
    </script>

    {{-- This script return the value of each input for deleting it --}}
    <script>
        $('#DeleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var subcategory_name = button.data('subcategory_name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #subcategory_name').val(subcategory_name);
        })
    </script>
@endsection
