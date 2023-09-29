@extends('admin.layout.master')
@section('style')
    <link rel="stylesheet" href="{{asset('css/service.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-md-4">
                            <div class="mt-3 mt-md-0">
                                <button type="button" class="btn btn-success waves-effect waves-light jquery-btn-create"
                                ><i
                                        class="mdi mdi-plus-circle me-1"></i> Thêm người dùng
                                </button>
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


                    <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Tên người dùng</th>

                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td>1</td>
                            <td>Software Engineer</td>

                            <td class="text-center">
                                {{--                                <a href="" class="btn btn-danger">Delete</a>--}}
                                {{--                                <a href="" class="btn btn-primary ms-1">Update</a>--}}
                                <div class="btn-group dropdown">
                                    <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none "
                                       data-bs-toggle="dropdown" aria-expanded="false">
                                                   <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/General/Settings-2.svg--><svg
                                                           xmlns="http://www.w3.org/2000/svg"
                                                           xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                           height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <path
                                                                d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"
                                                                fill="#8950fc"/>
                                                        </g>
                                                        </svg>
                                                    </span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">

                                        <button class="dropdown-item js-btn-update" href="#"><i
                                                class="mdi mdi-pencil me-2 text-muted font-18 vertical-middle"></i>Cập
                                            nhật
                                        </button>
                                        <a class="dropdown-item btn-delete" href="#"><i
                                                class="mdi mdi-pencil me-2 text-muted font-18 vertical-middle"></i>Xóa</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>



    <div class="modal show jquery-main-modal" tabIndex="-1" aria-hidden="true">
        @include('admin.user.add')
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

    <script src="{{asset('js/jsAdmin/user.js')}}"></script>
@endsection


