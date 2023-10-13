@extends('client.layouts.layout')

@section('style')
<link rel="stylesheet" href="{{asset('client/css/lichsucat.css')}}">
<link rel="stylesheet" href="https://30shine.com/static/css/main.3b0c8d1d.chunk.css">
<link rel="stylesheet" href="https://30shine.com/static/css/9.dd6dd3b5.chunk.css" />
<link rel="stylesheet" href="https://30shine.com/static/css/25.4af93d8b.chunk.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&amp;display=swap">
@endsection

@section('content')
<div class="fix-hed" style=" width: 100% ; height: 100px;background: #14100D;">



</div>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(@session('success'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Title!</strong> {{ session('success')}}
</div>
@endif
<br>
<h2 class="text-center lxc">Hành Trình Tỏa Sáng</h2>
<div class="container lxc">
    <div class="row justify-content-center">



        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="border border-dark border-2 bg-white" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                <br>

                <!-- Menu -->
                <div class="row">
                    <div class="col-6 d-flex justify-content-center">
                        <div class="row">
                            <a href="" class="justify-content-center active">
                                <h5 class="text-dark">Xem Lịch Đặt</h5>
                            </a>

                        </div>

                    </div>
                    <div class="col-6 d-flex justify-content-center">
                        <div class="row">
                            <a href="" class="justify-content-center">
                                <h5 class="text-dark">Lịch Sử Cắt</h5>
                            </a>
                        </div>

                    </div>
                </div>
                <br>
                <!-- Main -->


                @if($bookings->status == 1)
                <div class="row">
                    <h5 class="text-center text-dark" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Mời anh/chị đánh giá chất lượng phục vụ</h5>
                    <br>
                    <p class="text-center text-dark">Phản hồi của anh/chị sẽ giúp chúng em cải thiện chất lượng dịch vụ tốt hơn</p>




                    <form action="{{route('lichsucat')}}" method="post">
                        @csrf
                        <div class="d-flex justify-content-center">
                            <input type="hidden" value="{{$bookings->id}}" name="booking_id">
                            <fieldset class="rating fs-1">
                                <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="🤩 - 5 stars"></label>
                                <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="😍 - 4 stars"></label>
                                <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="😃 - 3 stars"></label>
                                <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="🥺 - 2 stars"></label>
                                <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="😡 - 1 star"></label>
                            </fieldset>
                        </div>
                        <br>
                        <br>
                        <div class="row d-flex justify-content-center">
                            <div class="col-10">
                                <textarea name="comment" id="" cols="20" rows="5" class="border border-dark text-dark" required></textarea> <br>
                                

                                    <span class="btn btn-secondary btn-lg" style="width: 100%;"><button type="submit" onclick="autoload()">Lưu đánh giá</button></span>
                                    <button type="reset"><span class="btn btn-warning ">Reset</span></button>
                                    
                                    
                
                            </div>
                        </div>
                    </form>
                    @else
                    <h5 class="text-center">Anh chị chưa đăng kí dịch vụ nào bên em</h5>
                    @endif




                    @foreach($bookings->reviews as $review)
                    @if($review->booking_id == $bookings->id)
                    <div class="row">
                        <div class="col-5" style="margin-left: 30px;">
                            <i class="bi bi-image-fill" style="font-size: 150px;"></i>
                        </div>
                        <div class="col-6" style="margin-top: 40px;">
                            <p>
                                <b>Stylist:</b> {{$bookings->stylist->name}}
                            </p>
                            <p>
                                <b>TimeBooking:</b>{{$bookings->date}} | {{$bookings->timeSheet->hour}}:{{$bookings->timeSheet->minutes}}
                            </p>
                            <p>
                                <b>Stylist:</b> {{$bookings->stylist->name}}
                            </p>
                            <p>
                                <b>Rating:</b> {{$review->rating}}⭐
                            </p>
                        </div>


                    </div>
                    @endif

                    @endforeach
                </div>

            </div>
        </div>


    </div>
</div>
<br>



<script>
    // 
    function autoload() {
        location.reload();
    }

    // 
    // 
    $('.stars i').on('click', function() {
        $('.stars span, .stars i').removeClass('active');

        $(this).addClass('active');
        $('.stars span').addClass('active');
    });
</script>


@endsection