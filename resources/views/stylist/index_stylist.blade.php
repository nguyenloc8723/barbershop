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
                        <form method="get" action="{{route('search')}}">
                            <label for="inputPassword2" class="visually-hidden">Search</label>
                            <div class="input-group">
                                <input type="search" class="form-control" placeholder="Search..." name="key" id="inputPassword2">
                                <button class="btn input-group-text" type="submit">
                                    <i class="fe-search"></i>
                                </button>
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
    @foreach ($stylists as $stylist)
    <div class="col-xl-4" style="text-align: center">
        <div class="card">
            <div class="text-center card-body">
                <div>
                    <form action="{{route('stylists.destroy',$stylist->id)}}" method="POST" >
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="selected_stylists" id="selected_stylists" value="">
                    <img src="{{ asset('storage/image/'.$stylist->image)}}"
                         class="rounded-circle avatar-xl img-thumbnail mb-2" alt="profile-image"/>

                    <p class="text-muted font-13 mb-3">{{$stylist->excerpt}}</p>

                    <div class="text-start">
                        <p class="text-muted font-13"><strong>Full Name :</strong> <span
                                class="ms-2">{{$stylist->name}}</span></p>

                        <p class="text-muted font-13"><strong>Mobile :</strong><span class="ms-2">{{$stylist->phone}}</span>
                        </p>
                        <p class="text-muted font-13"><strong>Location :</strong> <span
                                class="ms-2">Việt Nam</span></p>
                            <input type="checkbox" name="selected_stylists[]" value="{{ $stylist->id }}">
                    </div>
                    <button type="button"
                            class="btn btn-primary rounded-pill waves-effect waves-light"><a href="{{route('stylists.edit',$stylist->id)}}" style="color: white ">Update member</a>
                    </button>
                    <button type="submit"
                            class="btn btn-danger rounded-pill waves-effect waves-light ms-1">Delete
                        member
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <script>
        const checkboxes = document.querySelectorAll('.stylist-checkbox');
        const selectedStylistsInput = document.getElementById('selected_stylists');
    
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                const selectedStylists = Array.from(checkboxes)
                    .filter(checkbox => checkbox.checked)
                    .map(checkbox => checkbox.value);
    
                selectedStylistsInput.value = selectedStylists.join(',');
            });
        });
    </script>
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
