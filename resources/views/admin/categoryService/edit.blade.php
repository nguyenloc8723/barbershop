@extends('admin.layout.master')
@section('style')
    <link rel="stylesheet" href="{{asset('css/service.css')}}">
@endsection
@section('content')

    <div class="" tabIndex="-1" aria-hidden="true">
        <div class="modal-dialog modal-full-width">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title" id="myCenterModalLabel">Cập nhật danh mục</h4>


                </div>
                <div class="modal-body">
                    <form class="" id="formModal" action="{{route('category.update',$data->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="">

                            <div class="mb-3">
                                <label for="name" class="form-label">Tên danh mục</label>
                                <input type="text" class="form-control" value="{{$data->name}}" name="name"/>
                            </div>
                            <div class="mb-3 is_active">
                                <label for="is_active" class="form-label">Is_active</label>
                                <select class="form-control" name="is_active">
                                    <option value="1" @if($data->is_active == 1) selected @endif >Hoạt động</option>
                                    <option value="0" @if($data->is_active == 0) selected @endif>Không hoạt động</option>
                                </select>
                            </div>
                        </div>
                        {{--                        <input type="hidden" name="actionMethod">--}}

                        <div class="w-100 text-center">
                            <button type="submit" class="btn btn-success waves-effect waves-light"
                            >Save
                            </button>
                            <a href="{{route('category.index')}}" class="btn btn-danger waves-effect waves-light ms-1 jquery-close"
                            >Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection












{{--<div class="modal show jquery-main-modal" tabIndex="-1" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-dialog-centered">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header bg-light">--}}
{{--                <h4 class="modal-title" id="myCenterModalLabel">Thêm danh mục</h4>--}}
{{--                <button type="button" class="btn-close jquery-close"--}}
{{--                        aria-hidden="true"></button>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}
{{--                <form class="" id="formModal" action="" method="post">--}}
{{--                    @csrf--}}
{{--                    <div class="">--}}
{{--                        <div class="mb-3">--}}
{{--                            <label for="name" class="form-label">Tên danh mục</label>--}}
{{--                            <input type="text" class="form-control" name="name"/>--}}
{{--                        </div>--}}
{{--                        <div class="mb-3 is_active">--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <input type="hidden" name="actionMethod">--}}

{{--                    <div class="w-100 text-center">--}}
{{--                        <button type="submit" class="btn btn-success waves-effect waves-light"--}}
{{--                        >Save--}}
{{--                        </button>--}}
{{--                        <button type="button" class="btn btn-danger waves-effect waves-light ms-1 jquery-close"--}}
{{--                        >Cancel--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--</div>--}}
