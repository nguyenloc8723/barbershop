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
                                <a href="{{route('role')}}" class="btn btn-success waves-effect waves-light jquery-btn-create">
                                    <i class="mdi mdi-plus-circle me-1 "></i> Quay về
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="{{route('role.store')}}" method="post">
        @csrf
        <label for="name">Name</label>
        <input class="form-control" name="name" type="text">

        <label for="guard_name">guard name</label>
        <input class="form-control" type="text" name="guard_name" value="web" disabled>

        <label for="name">Name</label>
        <div class="">
            @foreach(config('permissions') as $key => $value)
                <input type="checkbox"
                       name="permissions[]"
                       value="{{$key}}"
                       id="{{$key}}">
                <label for="{{$key}}">{{$value}}</label>
            @endforeach
        </div>

        <button type="submit" class="btn btn-success">Lưu</button>
    </form>
@endsection

@section('script')

@endsection
