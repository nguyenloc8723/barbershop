@extends('admin.layout.master')
@section('style')
    <link rel="stylesheet" href="{{asset('css/service.css')}}">
@endsection
@section('content')
{{--    @if (Auth::check())--}}
{{--        <h1>{{Auth::id()}
    }</h1>--}}
{{--    @endif--}}
    @can('roles.editService')
        <input type="hidden" class="jqr-roleEdit" value="true">
    @endcan
    @can('roles.deleteService')
        <input type="hidden" class="jqr-roleDelete" value="true">
    @endcan
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-md-4">
                            <div class="mt-3 mt-md-0">
{{--                                @can('roles.createService')--}}
{{--                                <button type="button"--}}
{{--                                        class="btn btn-success waves-effect waves-light query-btn-show-modal"><i--}}
{{--                                        class="mdi mdi-plus-circle me-1 "></i> Thêm dịch vụ--}}
{{--                                </button>--}}
{{--                                @endcan--}}
                                @if(\Gate::check('roles.createService'))
                                    <button type="button" class="btn btn-success waves-effect waves-light query-btn-show-modal">
                                        <i class="mdi mdi-plus-circle me-1"></i> Thêm dịch vụ
                                    </button>
                                @else
                                    <button type="button" class="btn btn-success waves-effect waves-light" disabled>
                                        <i class="mdi mdi-plus-circle me-1"></i> Thêm dịch vụ
                                    </button>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive table-responsive
                                                   nowrap text-center align-content-sm-center">
                        <thead>
                        <tr class="">
                            @foreach($columns as $key => $column)
                                <th>{{$column}}</th>
                            @endforeach
                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody id="jquery-value">

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>



    <div class="modal fade show jquery-main-modal" tabIndex="-1" aria-hidden="true">
        @include('admin.service.modal')
    </div>


@endsection


@section('script')
    <!-- third party js -->
    <script src="{{asset('be/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="{{asset('be/assets/js/pages/datatables.init.js')}}"></script>


    <script src="{{asset('js/jsAdmin/service.js')}}"></script>
@endsection
