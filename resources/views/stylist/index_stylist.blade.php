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
                            <button type="button" class="btn btn-success waves-effect waves-light"
                                    data-bs-toggle="modal" data-bs-target="#custom-modal">
                                    <a class="mdi mdi-plus-circle me-1" href="{{ route('stylists.create') }}" style="color: white">Add Stylist</a> 
                            </button>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <form class="d-flex flex-wrap align-items-center justify-content-sm-end">
                            <label for="status-select" class="me-2">Sort By</label>
                            <div class="me-sm-2">
                                <select class="form-select my-1 my-md-0" id="status-select"
                                        >
                                    <option value="all">All</option>
                                    <option value="1">Name</option>
                                    <option value="2">Post</option>
                                    <option value="3">Followers</option>
                                </select>
                            </div>
                            <label for="inputPassword2" class="visually-hidden">Search</label>

                            <div>
                                <input type="search" class="form-control my-1 my-md-0"
                                       id="inputPassword2"
                                       placeholder="Search..."/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

</div>
<div class="row">
    <div class="col-xl-4" style="text-align: center">
        @foreach ($stylists as $stylist)
        <div class="card">
            <div class="text-center card-body">
                <div>
                    <form action="{{route('stylists.destroy',$stylist->id)}}" method="POST" >
                        @csrf
                        @method('DELETE')
                    <img src="{{ asset('storage/image/'.$stylist->image)}}"
                         class="rounded-circle avatar-xl img-thumbnail mb-2" alt="profile-image"/>

                    <p class="text-muted font-13 mb-3">
                        Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                        1500s, when an unknown printer took a galley of type.
                    </p>

                    <div class="text-start">
                        <p class="text-muted font-13"><strong>Full Name :</strong> <span
                                class="ms-2">{{$stylist->name}}</span></p>

                        <p class="text-muted font-13"><strong>Mobile :</strong><span class="ms-2">{{$stylist->phone}}</span>
                        </p>
                        <p class="text-muted font-13"><strong>Location :</strong> <span
                                class="ms-2">Việt Nam</span></p>
                    </div>
                        <button type="button"
                            class="btn btn-primary rounded-pill waves-effect waves-light"><a href="{{route('stylists.edit',$stylist->id)}}" style="color: white ">Update member</a>
                    </button>
                    <button type="submit"
                            class="btn btn-danger rounded-pill waves-effect waves-light ms-1" style="margin-top: 10px">Delete
                        member
                    </button>
                    </form>
                </div>
            
            </div>
        </div>
        @endforeach


    </div>

</div>




@endsection

@section('script')
<!-- third party js -->

{{-- <script src="{{asset('be/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>--}}
{{-- <script src="{{asset('be/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>--}}
{{-- <script src="{{asset('be/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>--}}
{{-- <script src="{{asset('be/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>--}}
{{-- <script src="{{asset('be/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>--}}
{{-- <script src="{{asset('be/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js')}}"></script>--}}
{{-- <script src="{{asset('be/assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>--}}
{{-- <script src="{{asset('be/assets/libs/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>--}}
{{-- <script src="{{asset('be/assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>--}}
{{-- <script src="{{asset('be/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>--}}
{{-- <script src="{{asset('be/assets/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>--}}
<script src="{{asset('be/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('be/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
<!-- third party js ends -->

<!-- Datatables init -->
 <script src="{{asset('be/assets/js/pages/datatables.init.js')}}"></script>

@endsection
