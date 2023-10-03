@extends('admin.layout.master')
@section('style')
<link rel="stylesheet" href="{{asset('css/service.css')}}">
@endsection
@section('content')


<div class="modal-dialog modal-full-width">
    <div class="modal-content">
        <div class="modal-header bg-light">
            <h4 class="modal-title" id="myCenterModalLabel">Thêm dịch vụ</h4>

        </div>
        <div class="modal-body">
            <form class="d-flex justify-content-between flex-wrap" action="{{route('route.service.post')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-xl-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Danh mục</label>
                        <select name="category_id" class="form-control" id="cate">
                            <option>Chọn danh mục</option>
                            <option value="1">Tuấn Anh đẹp zai số 2 =)))</option>
                            <option value="2">Nhưng khum có ny :(((</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên dịch vụ</label>
                        <input type="text" class="form-control" id="service" name="name" />
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Giá dịch vụ</label>
                        <input type="text" class="form-control" id="price" name="price" />
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Mô tả</label>
                        <input type="text" class="form-control" id="description" name="description" />
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" />
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Trạng thái</label>
                        <select name="is_active" class="form-control">
                            <option selected value="1">Hoạt Động</option>
                            <option value="0">Không Hoạt Động</option>
                        </select>
                    </div>




                </div>


                <div class="col-xl-6 p-3">
                    <div class="row text-center">
                        <input type="file" name="images[]" id="service-image" multiple />
                        <label for="service-image" style="font-size: 20px">Tải ảnh lên <i class="upload font-22"></i></label>
                        <span class="show-error text-danger" data-name="files"></span>
                    </div>
                    <input type="hidden" name="actionMethod">
                    <div class="selected-images">


                    </div>
                </div>


                <div class="w-100 text-center">
                    <button type="submit" class="btn btn-success waves-effect waves-light" data-bs-dismiss="modal">Save
                    </button>
                    <button type="button" class="btn btn-danger waves-effect waves-light ms-1 jquery-btn-cancel">Cancel
                    </button>
                </div>


            </form>
        </div>
    </div>
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