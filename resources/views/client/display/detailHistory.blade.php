@extends('client.layouts.layout')

@section('style')
<link rel="stylesheet" href="{{asset('client/css/lichsucat.css')}}">
<link rel="stylesheet" href="{{asset('client/css/booking.css')}}">
<link rel="stylesheet" href="https://30shine.com/static/css/main.3b0c8d1d.chunk.css">
<link rel="stylesheet" href="https://30shine.com/static/css/9.dd6dd3b5.chunk.css" />
<link rel="stylesheet" href="https://30shine.com/static/css/25.4af93d8b.chunk.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&amp;display=swap">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection

@section('content')
<div class="fix-hed" style=" width: 100% ; height: 100px;background: #14100D;">



</div>
<section class="info-box section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6" id="jqr-displayBooking">
                <div class="new-top-navigator pointer " style="background-color: #14100c; color: #fff;"><span class="text-center">Chi tiết lịch cắt</span></div>
                <div class="main-screen">
                    <div class="row">
                        <div class="col-5">
                            <img src="https://tse4.mm.bing.net/th?id=OIP.2bJ9_f9aKoGCME7ZIff-ZwHaJ4&pid=Api&P=0&h=220" alt="" style="width: 200px; height: 200px;">
                        </div>
                        <div class="col-7">
                            <b>Combo:</b>@foreach ($combo as $service) 
                                    {{$service->service->name}},
                            @endforeach <br>
                            <b>Stylist:</b> {{$bookings->stylist->name}}<br>
                            <b>Ngày đặt:</b> {{$bookings->date}} | {{$bookings->timeSheet->hour}}:{{$bookings->timeSheet->minutes}} <br>
                            <b>Đánh Giá:</b> {{$reviews->rating}} ⭐<br>
                            <b>Nhận xét:</b> <br>
                                <div style="float: left; width: 90%; background-color: #bdc3c7; border-radius: 10px; padding: 10px;margin: 5px;">{{$reviews->comment}}</div>
                                <div style="float: right; width: 90%; background-color: #bdc3c7; border-radius: 10px; padding: 10px; height: auto;"><b>CSKH:</b> {{$reviews->reply}}!</div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <h6>Tổng tiền:</h6> <h6 class="text-end">{{$bookings->price}} VND</h6>
                    </div>
                   
                </div>
            </div>

        </div>
    </div>
</section>


@endsection