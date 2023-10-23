@extends('admin.layout.master')
@section('style')
<link rel="stylesheet" href="{{asset('css/service.css')}}">
@endsection
@section('content')


<div class="modal-header bg-white">
    <h4 class="modal-title" id="myCenterModalLabel">Rating and Comment</h4>
</div>
<br>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table dt-responsive table-responsive nowrap text-center align-content-sm-center">
                    <thead class="table-light">

                        <tr class="">
                            <th scope="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="responsivetableCheck">
                                    <label class="form-check-label" for="responsivetableCheck"></label>
                                </div>
                            </th>
                            @foreach($columns as $key => $column)
                            <th>{{$column}}</th>
                            @endforeach
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <th scope="row">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="responsivetableCheck01">
                                    <label class="form-check-label" for="responsivetableCheck01"></label>
                                </div>
                            </th>
                            @foreach($columns as $key => $column)
                            <td>

                                @if(in_array($key, ['image']))
                                <img src="https://tse1.mm.bing.net/th?id=OIP.OF59vsDmwxPP1tw7b_8clQHaE8&pid=Api&rs=1&c=1&qlt=95&w=185&h=123" alt="">
                                @else
                                {{$item->$key}}
                                @endif
                            </td>
                            @endforeach


                            <td class="text-center">
                                <div class="btn-group dropdown">
                                    <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none " data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/General/Settings-2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#8950fc" />
                                                </g>
                                            </svg>
                                        </span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="{{route('replyReview', ['id'=> $item->id])}}" class="dropdown-item js-btn-update">
                                            Cập nhật
                                        </a>

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