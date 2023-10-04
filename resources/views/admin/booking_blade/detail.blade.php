@extends('admin.layout.master')
{{--@section('style')--}}
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            @foreach($data as $data)
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body task-detail">
                                <div class="dropdown float-end">
                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <img class="flex-shrink-0 me-3 rounded-circle avatar-md" alt="64x64" src="assets/images/users/user-2.jpg">
                                    <div class="flex-grow-1">
                                        <h4 class="media-heading mt-0">{{$data->user->name}}</h4>
                                        <span class="badge bg-danger">Urgent</span>
                                    </div>
                                </div>

                                <h4>Stylist: {{$data->stylist->name}}</h4>
{{--                                <h4>Thời gian: {{$data->timesheet->hour}}h {{$data->timesheet->minutes}}ph</h4>--}}

{{--                                <p class="text-muted">--}}
{{--                                    At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint cupiditate non sunt in culpa qui officia deserunt animi est laborum et--}}
{{--                                </p>--}}



                                <div class="row task-dates mb-0 mt-2">
                                    <div class="col-lg-6">
                                        <h4 class="font-600 m-b-5">Ngày</h4>
                                        <h5> {{$data->date}}</h5>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4 class="font-600 m-b-5">Thời gian</h4>
                                        <h5> {{$data->timesheet->hour}}h {{$data->timesheet->minutes}}ph</h5>
                                    </div>
                                </div>

                                <h4>Yêu cầu đặc biệt: {{$data->special_requirement}}</h4>

                                <h4>
                                    Yêu cầu tư vấn: {{$data->is_consultant == 1 ? "Có" : "Không" }}
                                </h4>

                                <h4>
                                    Chụp ảnh sau khi cắt để làm mẫu cho lần sau: {{$data->is_accept_take_a_photo == 1 ? "Có" : "Không" }}
                                </h4>

                                <h4>
                                    Trạng thái: {{$data->status == 1 ? "Đã đặt lịch" : "Đã cắt" }}
                                </h4>

{{--                                <div class="clearfix"></div>--}}

{{--                                <div class="task-tags mt-2">--}}
{{--                                    <h5>Tags</h5>--}}
{{--                                    <input type="text" class="selectize-close-btn" value="Amsterdam,Washington,Sydney" data-role="tagsinput" placeholder="add tags"/>--}}
{{--                                </div>--}}

{{--                                <div class="assign-team mt-3">--}}
{{--                                    <h5>Assign to</h5>--}}
{{--                                    <div>--}}
{{--                                        <a href="#"> <img class="rounded-circle avatar-sm" alt="64x64" src="assets/images/users/user-2.jpg"> </a>--}}
{{--                                        <a href="#"> <img class="rounded-circle avatar-sm" alt="64x64" src="assets/images/users/user-3.jpg"> </a>--}}
{{--                                        <a href="#"> <img class="rounded-circle avatar-sm" alt="64x64" src="assets/images/users/user-5.jpg"> </a>--}}
{{--                                        <a href="#"> <img class="rounded-circle avatar-sm" alt="64x64" src="assets/images/users/user-8.jpg"> </a>--}}
{{--                                        <a href="#"><span class="add-new-plus"><i class="mdi mdi-plus"></i> </span></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                <div class="attached-files mt-3">
                                    <h5>Files đính kèm </h5>
{{--                                    <ul class="list-inline files-list">--}}
{{--                                        <li class="list-inline-item file-box">--}}
{{--                                            <a href=""><img src="assets/images/attached-files/img-1.jpg" class="img-fluid img-thumbnail" alt="attached-img" width="80"></a>--}}
{{--                                            <p class="font-13 mb-1 text-muted"><small>File one</small></p>--}}
{{--                                        </li>--}}
{{--                                        <li class="list-inline-item file-box">--}}
{{--                                            <a href=""><img src="assets/images/attached-files/img-2.jpg" class="img-fluid img-thumbnail" alt="attached-img" width="80"></a>--}}
{{--                                            <p class="font-13 mb-1 text-muted"><small>Attached-2</small></p>--}}
{{--                                        </li>--}}
{{--                                        <li class="list-inline-item file-box">--}}
{{--                                            <a href=""><img src="assets/images/attached-files/img-3.jpg" class="img-fluid img-thumbnail" alt="attached-img" width="80"></a>--}}
{{--                                            <p class="font-13 mb-1 text-muted"><small>Dribbble shot</small></p>--}}
{{--                                        </li>--}}
{{--                                        <li class="list-inline-item file-box ms-2">--}}
{{--                                            <div class="fileupload add-new-plus">--}}
{{--                                                <span><i class="mdi-plus mdi"></i></span>--}}
{{--                                                <input type="file" class="upload">--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
                                    <div class="col-xl-6 p-3">
                                        <div class="row text-center">
                                            <input type="file" name="files[]" hidden="hidden" id="service-image" multiple/>
                                            <label for="service-image" style="font-size: 20px">Tải ảnh lên <i
                                                    class="upload font-22"></i></label>
                                            <span class="show-error text-danger" data-name="files"></span>
                                        </div>
                                        <input type="hidden" name="actionMethod">
                                        <div class="selected-images">


                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-success waves-effect waves-light me-1">
                                                    Save
                                                </button>
                                                <button type="button"
                                                        class="btn btn-light waves-effect">Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- end col -->

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown float-end">
                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                    </div>
                                </div>

                                <h4 class="header-title mt-0 mb-3">Comments (6)</h4>

                                <div>

                                    <div class="d-flex mb-3">
                                        <div class="flex-shrink-0 me-3">
                                            <a href="#"> <img class="rounded-circle avatar-sm" alt="64x64" src="assets/images/users/user-1.jpg"> </a>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="mt-0">Mat Helme</h5>
                                            <p class="font-13 text-muted mb-0">
                                                <a href="" class="text-primary">@Michael</a>
                                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                                ante sollicitudin commodo.
                                            </p>
                                            <a href="" class="text-success font-13">Reply</a>
                                        </div>
                                    </div>

                                    <div class="d-flex mb-3">
                                        <div class="flex-shrink-0 me-3">
                                            <a href="#"> <img class="rounded-circle avatar-sm" alt="64x64" src="assets/images/users/user-2.jpg"> </a>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="mt-0">Media heading</h5>
                                            <p class="font-13 text-muted mb-0">
                                                <a href="" class="text-primary">@Michael</a>
                                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque sollicitudin purus odio.
                                            </p>
                                            <a href="" class="text-success font-13">Reply</a>

                                            <div class="d-flex my-2">
                                                <div class="flex-shrink-0 me-3">
                                                    <a href="#"> <img class="rounded-circle avatar-sm" alt="64x64" src="assets/images/users/user-3.jpg"> </a>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h5 class="mt-0">Nested media heading</h5>
                                                    <p class="font-13 text-muted mb-0">
                                                        <a href="" class="text-primary">@Michael</a>
                                                        Cras sit amet nibh libero, in gravida nulla vel metus scelerisque ante sollicitudin purus odio.
                                                    </p>
                                                    <a href="" class="text-success font-13">Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex mb-3">
                                        <div class="flex-shrink-0 me-3">
                                            <a href="#"> <img class="rounded-circle avatar-sm" alt="64x64" src="assets/images/users/user-1.jpg"> </a>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="mt-0">Mat Helme</h5>
                                            <p class="font-13 text-muted mb-0">
                                                <a href="" class="text-primary">@Michael</a>
                                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                                ante sollicitudin commodo cras purus.
                                            </p>
                                            <a href="" class="text-success font-13">Reply</a>
                                        </div>
                                    </div>

                                    <div class="d-flex mb-3">
                                        <div class="flex-shrink-0 me-3">
                                            <a href="#"> <img class="rounded-circle avatar-sm" alt="64x64" src="assets/images/users/user-1.jpg"> </a>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="mt-0">Mat Helme</h5>
                                            <p class="font-13 text-muted mb-0">
                                                <a href="" class="text-primary">@Michael</a>
                                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                                ante sollicitudin commodo cras.
                                            </p>
                                            <a href="" class="text-success font-13">Reply</a>
                                        </div>
                                    </div>

                                    <div class="d-flex mb-3">
                                        <div class=" me-3">
                                            <a href="#"> <img class="rounded-circle avatar-sm" alt="64x64" src="assets/images/users/user-1.jpg"> </a>
                                        </div>
                                        <div class="flex-grow-1">
                                            <input type="text" class="form-control" placeholder="Some text value...">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div><!-- end col -->
                </div>
            @endforeach
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->
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
