@extends('admin.layout.master')
{{--@section('style')--}}
{{--    <link rel="stylesheet" href="{{asset('css/service.css')}}">--}}
{{--@endsection--}}
@section('content')
    {{--    <div class="row">--}}
    {{--        <div class="col-12">--}}
    {{--            <div class="card">--}}
    {{--                <div class="card-body">--}}
    {{--                    <div class="row justify-content-between">--}}
    {{--                        <div class="col-md-4">--}}
    {{--                            <div class="mt-3 mt-md-0">--}}

    {{--                                <button type="button"--}}
    {{--                                        class="btn btn-success waves-effect waves-light query-btn-show-modal"><i--}}
    {{--                                        class="mdi mdi-plus-circle me-1 "></i> Thêm dịch vụ--}}
    {{--                                </button>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}


    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body taskboard-box">
{{--                    <div class="dropdown float-end">--}}
{{--                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"--}}
{{--                           aria-expanded="false">--}}
{{--                            <i class="mdi mdi-dots-vertical"></i>--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-menu dropdown-menu-end">--}}
{{--                            <!-- item-->--}}
{{--                            <a href="javascript:void(0);" class="dropdown-item">Action</a>--}}
{{--                            <!-- item-->--}}
{{--                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>--}}
{{--                            <!-- item-->--}}
{{--                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>--}}
{{--                            <!-- item-->--}}
{{--                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <h4 class="header-title mt-0 mb-3 text-primary">Quản lí lịch đặt</h4>

                    <ul class="sortable-list list-unstyled taskList" id="upcoming">
                        @foreach($data as $item)
                            <li>
                                <div class="kanban-box">
                                    <div class="checkbox-wrapper float-start">
                                        <div class="form-check form-check-success ">
                                            <input class="form-check-input" type="checkbox" id="singleCheckbox2"
                                                   value="option2" aria-label="Single checkbox Two">
                                            <label></label>
                                        </div>
                                    </div>

                                    <div class="kanban-detail">
{{--                                        <span class="badge bg-danger float-end">Urgent</span>--}}
                                        <span class="badge float-end bg-{{$item->status == 1 ? "danger" : "success" }}">{{$item->status == 1 ? "Đã đặt lịch" : "Đã cắt" }}</span>
                                        <h5 class="mt-0"><a href="{{route('route.booking_blade.detail', $item->id)}}" class="text-dark">Khách hàng: {{$item->user->name}}</a></h5>
{{--                                        <ul class="list-inline">--}}
{{--                                            <li class="list-inline-item">--}}
{{--                                                <a href="" data-bs-toggle="tooltip" data-bs-placement="top"--}}
{{--                                                   title="Username">--}}
{{--                                                    <img--}}
{{--                                                        src="{{asset('client/img/logo.png')}}"--}}
{{--                                                        src="http://fpt-barber-shop.test/client/img/logo.png"--}}
{{--                                                        alt="img"--}}
{{--                                                         class="avatar-sm rounded-circle">--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li class="list-inline-item">--}}
{{--                                                <a href="" data-bs-toggle="tooltip" data-bs-placement="top"--}}
{{--                                                   title="5 Tasks">--}}
{{--                                                    <i class="mdi mdi-format-align-left"></i>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li class="list-inline-item">--}}
{{--                                                <a href="" data-bs-toggle="tooltip" data-bs-placement="top"--}}
{{--                                                   title="3 Comments">--}}
{{--                                                    <i class="mdi mdi-comment-outline"></i>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
                                    </div>
                                </div>
                            </li>
                        @endforeach


                    </ul>

{{--                    <div class="text-center pt-2">--}}
{{--                        <a data-bs-toggle="modal" data-bs-target="#custom-modal"--}}
{{--                           class="btn btn-primary waves-effect waves-light" data-animation="fadein"--}}
{{--                           data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a">--}}
{{--                            <i class="mdi mdi-plus"></i> Add New--}}
{{--                        </a>--}}
{{--                    </div>--}}
                </div>
            </div>

        </div><!-- end col -->
    </div><!-- end row -->

    {{--    <div class="modal fade show jquery-main-modal" tabIndex="-1" aria-hidden="true">--}}
    {{--        @include('admin.booking.modal')--}}
    {{--    </div>--}}

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


    {{--    <script src="{{asset('js/jsAdmin/booking.js')}}"></script>--}}
@endsection
