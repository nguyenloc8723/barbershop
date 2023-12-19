@extends('admin.layout.master')
@section('content')
    <link rel="stylesheet" href="{{asset('css/service.css')}}">
    <script src="https://cdn.ckeditor.com/ckeditor5/37.0.0/classic/ckeditor.js"></script>

    <div class="modal-full-width">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Thêm Blog</h4>
                <button type="button" class="btn-close jquery-btn-cancel" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form class="d-flex justify-content-between flex-wrap" method="POST" action="{{ route('blogs.store') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="col-xl-6">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title"/>
                            @error('title')
                            <p style="color: red">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Ảnh</label>
                            <input type="file" class="form-control" id="inputGroupFile04" name="image"
                                   aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                            @error('image')
                            <p style="color: red">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" cols="30" rows="10"></textarea>
                            @error('description')
                            <p style="color: red">{{$message}}</p>
                            @enderror
                            <!-- <textarea id="editor" name="description" class="description" >{{ old('description') }}</textarea> -->
                        </div>
                    </div>
                    <div style="float:left" class="w-100 text-center">
                        <button type="submit" class="btn btn-success waves-effect waves-light" data-bs-dismiss="modal">
                            Thêm
                        </button>
                        <button type="button" class="btn btn-danger waves-effect waves-light ms-1 jquery-btn-cancel"><a
                                style="color: white" href="{{route('blogs.index')}}">Cancel</a></button>
                    </div>
                    <script>
                        // Kích hoạt CKEditor trên textarea với id "editor"
                        ClassicEditor
                            .create(document.querySelector('#description'))
                            .catch(error => {
                                console.error(error);
                            });
                    </script>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('be/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('be/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
<script src="{{asset('be/assets/js/pages/datatables.init.js')}}"></script>
    <script src="{{asset('be/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="{{asset('be/assets/js/pages/datatables.init.js')}}"></script>

@endsection
