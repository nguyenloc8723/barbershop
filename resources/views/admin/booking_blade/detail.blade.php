@extends('admin.layout.master')
{{--@section('style')--}}
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body task-detail">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                   aria-expanded="false">
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
                                <img class="flex-shrink-0 me-3 rounded-circle avatar-md" alt="64x64"
                                     src="{{asset('client/img/logobarber.png')}}">
                                <div class="flex-grow-1">
                                    <h4 class="media-heading mt-0">{{$data->phone_number}}</h4>

                                    @if($data->status == 1)
                                        <span
                                            class="badge bg-danger" >Chờ xác nhận
                                        </span>
                                    @endif
                                    @if($data->status == 2)
                                        <span
                                            class="badge bg-warning" >Đang chờ cắt
                                        </span>
                                    @endif
                                    @if($data->status == 3)
                                        <span
                                            class="badge bg-success" >Đã cắt
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <h4>Stylist: {{$stylist->name}}</h4>


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


                            <h4 style="color: {{$data->is_consultant == 1 ? "green" : "red" }};">
                                Yêu cầu tư vấn: {{$data->is_consultant == 1 ? "Có" : "Không" }}
                            </h4>

                            <h4 style="color: {{$data->is_accept_take_a_photo == 1 ? "green" : "red" }};">
                                Chụp ảnh sau khi cắt để làm mẫu cho lần
                                sau: {{$data->is_accept_take_a_photo == 1 ? "Có" : "Không" }}
                            </h4>

                            <h4>
                                Trạng thái: @if($data->status == 1)
                                    <span
                                        class="badge bg-danger" >Chờ xác nhận
                                        </span>
                                @endif
                                @if($data->status == 2)
                                    <span
                                        class="badge bg-warning" >Đang chờ cắt
                                        </span>
                                @endif
                                @if($data->status == 3)
                                    <span
                                        class="badge bg-success" >Đã cắt
                                        </span>
                                @endif
                            </h4>



                            <table
                                class="table table-bordered dt-responsive table-responsive nowrap text-center align-content-sm-center">
                                <thead>
                                <tr>
                                    <th>Tên dịch vụ</th>
                                    <th>Giá dịch vụ</th>
                                    <th>Trạng thái</th>
                                </tr>
                                </thead>
                                <tbody id="jquery-list">
                                @foreach($data->service as $item)
                                    <tr>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->price}}</td>
                                        <td>{{$item->is_active == 1 ? "Hoạt động" : "Không hoạt động"}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @foreach($data->results as $item)
                                {{--                                    <div class="col">--}}
                                <img src="/storage/{{$item->image}}" style="border: 1px solid #000; max-width: 150px; margin: 10px;"
                                     alt="img" srcset="">
                                {{--                                    </div>--}}
                            @endforeach
                            @if($data->status === 2 || $data->status === 3)
                                <form class="d-flex justify-content-between flex-wrap"
                                      id="formModalService" method="post"
                                      action="{{route('route.booking_blade.post', $data->id)}}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="attached-files mt-1 col-12">
                                        <h5>Files đính kèm </h5>

                                        <div class="col-xl-6 p-3">
                                            <div class="row text-center">
                                                <input type="file" name="imageFile[]" hidden="hidden" id="file-input"
                                                       multiple/>
                                                <label for="file-input" style="font-size: 20px">Tải ảnh lên <i
                                                        class="upload font-22"></i></label>
                                                <span class="show-error text-danger" data-name="imageFile"></span>
                                            </div>

                                            <div id="image-container">


                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="text-end">
                                                    <button type="submit"
                                                            class="btn btn-success waves-effect waves-light me-1">
                                                        Update
                                                    </button>
                                                    <button id="cancelButton" class="btn btn-secondary">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endif

                        </div>

                    </div>
                </div>

            </div><!-- end col -->


        </div>

        <!-- end row -->

    </div> <!-- container -->

    </div> <!-- content -->
    <style>
        #image-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            /*border: 1px solid #000;*/
        }


        .image-preview {
            max-width: 150px;
            max-height: 150px;
            border: 1px solid #000;
        }
    </style>
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


    <script src="{{asset('js/jsAdmin/booking_blade.js')}}"></script>
    {{--    <script src="{{asset('js/jsAdmin/booking.js')}}"></script>--}}
@endsection
