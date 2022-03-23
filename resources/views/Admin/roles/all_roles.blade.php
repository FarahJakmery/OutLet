@extends('layouts.master')

@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/datatables.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/responsive.bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--- Animations css-->
    <link href="{{ URL::asset('assets/css/animate.css') }}" rel="stylesheet">
    {{-- <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" /> --}}
@endsection

@section('title')
    أدوار المستخدمين
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المستخدمين</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/
                    أدوار المستخدمين</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    {{-- @if (session()->has('Add'))
        <script>
            window.onload = function() {
                notif({
                    msg: " تم اضافة الصلاحية بنجاح",
                    type: "success"
                });
            }
        </script>
    @endif

    @if (session()->has('edit'))
        <script>
            window.onload = function() {
                notif({
                    msg: " تم تحديث بيانات الصلاحية بنجاح",
                    type: "success"
                });
            }
        </script>
    @endif

    @if (session()->has('delete'))
        <script>
            window.onload = function() {
                notif({
                    msg: " تم حذف الصلاحية بنجاح",
                    type: "error"
                });
            }
        </script>
    @endif --}}

    <!-- row -->
    <div class="row row-sm">
        <!--Bordered Table-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    @can('إضافة دور')
                        <a href="{{ route('roles.create') }}">
                            <button type="submit" class="btn btn-primary">إضافة دور مستخدم</button>
                        </a>
                    @endcan
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">اسم الدور</th>
                                    <th class="border-bottom-0">الخيارات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $key => $role)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <label class="badge badge-success">{{ $role->name }}</label>
                                        </td>
                                        <td>
                                            <div class="btn-icon-list">
                                                @can('عرض صلاحيات الدور')
                                                    <a href="{{ route('roles.show', $role->id) }}"
                                                        class="btn btn-primary btn-icon">
                                                        <i class="las la-search"></i>
                                                    </a>
                                                @endcan
                                                @can('تعديل الدور')
                                                    <a href="{{ route('roles.edit', $role->id) }}"
                                                        class="btn btn-info btn-icon">
                                                        <i class="las la-pen"></i>
                                                    </a>
                                                @endcan
                                                @if ($role->name !== 'owner')
                                                    @can('حذف الدور')
                                                        <a class="modal-effect btn btn-danger btn-icon"
                                                            data-bs-effect="effect-scale" data-bs-toggle="modal"
                                                            data-id="{{ $role->id }}" data-name="{{ $role->name }}"
                                                            href="#DeleteModal">
                                                            <i class="las la-trash"></i>
                                                        </a>
                                                    @endcan
                                                @endif
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

        <!-- Modal effects -->
        <div class="modal fade" id="DeleteModal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content tx-size-sm">
                    <form method="POST" action="roles/destroy">
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
                            <h3>هل تريد حقا حذف هذا الدور؟؟</h3>
                            </p>
                            <input type="hidden" name="id" id="id" value="">
                            <input class="form-control" name="name" id="name" type="text" readonly>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn ripple btn-danger">حفظ التغييرات</button>
                            <button type="button" class="btn ripple btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Modal effects-->
    </div>
    <!-- row closed -->
@endsection

@section('js')
    <!-- Internal Data tables -->
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

    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>

    {{-- <!--Internal  Notify js -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script> --}}ط


    <script>
        $('#DeleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
        })
    </script>
@endsection
