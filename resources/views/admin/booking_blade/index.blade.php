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
                        <tbody>
                        @foreach($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->user_id}}</td>
                                <td>{{$item->stylist->name}}</td>
                                <td>{{$item->timesheet_id}}</td>
                                <td>{{$item->date}}</td>
                                <td>{{$item->special_requirement}}</td>
                                <td>{{$item->is_consultant}}</td>
                                <td>{{$item->is_accept_take_a_photo}}</td>
                                <td>{{$item->status}}</td>
                                <td class="text-center">
                                    <div class="btn-group dropdown">
                                        <a href="javascript: void(0);"
                                           class="table-action-btn dropdown-toggle arrow-none "
                                           data-bs-toggle="dropdown" aria-expanded="false">
                                      <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/General/Settings-2.svg--><svg
                                              xmlns="http://www.w3.org/2000/svg"
                                              xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                              viewBox="0 0 24 24" version="1.1">
                                           <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                               <rect x="0" y="0" width="24" height="24"/>
                                               <path
                                                   d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"
                                                   fill="#8950fc"/>
                                           </g>
                                           </svg>
                                       </span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <button class="dropdown-item js-btn-update" data-id="{{$item->id}}">Cập nhật
                                            </button>
                                            <button class="dropdown-item btn-delete" data-id="${item.id}">Xóa</button>
                                            <button class="dropdown-item btn-image" data-id="${item.id}">Ảnh dịch vụ
                                            </button>
                                        </div>
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

                    <h4 class="header-title mt-0 mb-3 text-primary">Upcoming</h4>

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
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="" data-bs-toggle="tooltip" data-bs-placement="top"
                                                   title="Username">
                                                    <img src="/storage/images/{{$item->stylist->image}}" alt="img"
                                                         class="avatar-sm rounded-circle">
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="" data-bs-toggle="tooltip" data-bs-placement="top"
                                                   title="5 Tasks">
                                                    <i class="mdi mdi-format-align-left"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="" data-bs-toggle="tooltip" data-bs-placement="top"
                                                   title="3 Comments">
                                                    <i class="mdi mdi-comment-outline"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        @endforeach


                    </ul>

                    <div class="text-center pt-2">
                        <a data-bs-toggle="modal" data-bs-target="#custom-modal"
                           class="btn btn-primary waves-effect waves-light" data-animation="fadein"
                           data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a">
                            <i class="mdi mdi-plus"></i> Add New
                        </a>
                    </div>
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
