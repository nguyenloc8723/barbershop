@extends('admin.layout.master')
@section('style')
<link rel="stylesheet" href="{{asset('css/service.css')}}">
@endsection
@section('content')

<div class="container-fluid">

    <div class="modal-header bg-light">
        <h4 class="modal-title" id="myCenterModalLabel">Reply</h4>
    </div>
    <br>
    <div class="modal-header bg-light">
        <div class="row">
            <div class="col-12      ">
                <form action="{{route('replyReview', ['id'=>request()->route('id')])}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Đánh giá</label>: {{$data->rating}}⭐
                        <input type="hidden" name="rating" value="{{$data->rating}}">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nhận xét</label>: {{$data->comment}}
                        <input type="hidden" name="comment" value="{{$data->comment}}">
                    </div>
                    <div>
                        <label for="name" class="form-label">Reply:</label>
                        <textarea class="form-control" name="reply" id="" cols="150" rows="5">{{$data->reply}}</textarea>
                        <!-- <input type="text" class="form-control" name="reply"> <br> -->
                        
                    </div>
                    <br>




                    <div class="w-100 text-center">
                        <button type="submit" class="btn btn-success waves-effect waves-light">Update
                        </button>
                        <button type="button" class="btn btn-danger waves-effect waves-light ms-1 jquery-close">Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>




</div>


</script>








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