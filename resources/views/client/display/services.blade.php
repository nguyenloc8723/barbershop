@extends('client.layouts.layout')

@section('content')
    <!-- Header Banner -->
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="4" data-background="client/img/slider/4.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center caption mt-60">
                    <h5>Chúng tôi có gì</h5>
                    <h1>Dịch vụ của chúng tôi</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Services -->
    <section class="services-1 section-padding">
        <div class="container">
            <div class="row">
                @foreach($data as $item)
                    <div class="col-md-4">
                        <div class="item">
                            <a href="{{route('services-page', $item)}}">
                                @if ($item->id == 1)
                                    <span class="icon icon-icon-1-1"></span>
                                @elseif ($item->id == 2)
                                    <span class="icon icon-icon-1-2"></span>
                                @elseif ($item->id == 3)
                                    <span class="icon icon-icon-1-3"></span>
                                @elseif ($item->id == 4)
                                    <span class="icon icon-icon-1-4"></span>
                                @elseif ($item->id == 5)
                                    <span class="icon icon-icon-1-6"></span>
                                @elseif ($item->id == 6)
                                    <span class="icon icon-icon-1-8"></span>
                                @elseif ($item->id == 7)
                                    <span class="icon icon-icon-1-9"></span>
                                @elseif ($item->id == 8)
                                    <span class="icon icon-icon-1-18"></span>
                                @elseif ($item->id == 9)
                                    <span class="icon icon-icon-1-10"></span>
                                @else
                                    <span class="icon icon-icon-1-9"></span>
                                @endif
                                <h5>{{$item->name}}</h5>
                                <p>{{$item->description}}</p>
                                <div class="shape">
                                    @if ($item->id == 1)
                                        <span class="icon icon-icon-1-1"></span>
                                    @elseif ($item->id == 2)
                                        <span class="icon icon-icon-1-2"></span>
                                    @elseif ($item->id == 3)
                                        <span class="icon icon-icon-1-3"></span>
                                    @elseif ($item->id == 4)
                                        <span class="icon icon-icon-1-4"></span>
                                    @elseif ($item->id == 5)
                                        <span class="icon icon-icon-1-6"></span>
                                    @elseif ($item->id == 6)
                                        <span class="icon icon-icon-1-8"></span>
                                    @elseif ($item->id == 7)
                                        <span class="icon icon-icon-1-9"></span>
                                    @elseif ($item->id == 8)
                                        <span class="icon icon-icon-1-18"></span>
                                    @elseif ($item->id == 9)
                                        <span class="icon icon-icon-1-10"></span>
                                    @else
                                        <span class="icon icon-icon-1-9"></span>
                                    @endif
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- First Class Services -->
    <div class="first-class-services section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-head text-center">
                        <div class="section-subtitle">HẠNG NHẤT</div>
                        <div class="section-title white">Các tính năng của chúng tôi</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="square-flip">
                        <div class="square bg-img" data-background="client/img/barber.jpg">
                            <div class="square-container d-flex align-items-end justify-content-end">
                                <div class="box-title">
                                    <h4>Cạo râu</h4>
                                </div>
                            </div>
                            <div class="flip-overlay"></div>
                        </div>
                        <div class="square2">
                            <div class="square-container2">
                                <h4>Cạo râu</h4>
                                <p><i>Lorem nisl miss nestibulum nec odio duru the aucan ula orci varius natoque enatau
                                        manis dis arturient monte miss morbine.</i></p> <a href="#0"
                                                                                           class="button-2 mt-15">Appointment<span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="square-flip">
                        <div class="square bg-img" data-background="client/img/kids.jpg">
                            <div class="square-container d-flex align-items-end justify-content-end">
                                <div class="box-title">
                                    <h4>Cắt tóc cho trẻ</h4>
                                </div>
                            </div>
                            <div class="flip-overlay"></div>
                        </div>
                        <div class="square2">
                            <div class="square-container2">
                                <h4>Cắt tóc cho trẻ</h4>
                                <p><i>Lorem nisl miss nestibulum nec odio duru the aucan ula orci varius natoque enatau
                                        manis dis arturient monte miss morbine.</i></p> <a href="#0"
                                                                                           class="button-2 mt-15">Appointment<span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="square-flip">
                        <div class="square bg-img" data-background="client/img/team/b3.jpg">
                            <div class="square-container d-flex align-items-end justify-content-end">
                                <div class="box-title">
                                    <h4>Đào tạo Barber</h4>
                                </div>
                            </div>
                            <div class="flip-overlay"></div>
                        </div>
                        <div class="square2">
                            <div class="square-container2">
                                <h4>Đào tạo Barber</h4>
                                <p><i>Lorem nisl miss nestibulum nec odio duru the aucan ula orci varius natoque enatau
                                        manis dis arturient monte miss morbine.</i></p> <a href="#0"
                                                                                           class="button-2 mt-15">Our
                                    Team<span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment Form -->
    <section class="testimonials">
        <div class="background bg-img bg-fixed section-padding pb-0" data-background="client/img/slider/20.jpg"
             data-overlay-dark="6">
            <div class="container">
                <div class="row">
                    <!-- Appointment call -->
                    <div class="col-md-5 mb-30 mt-60">
                        <p class="mb-0"><i class="star-rating"></i><i class="star-rating"></i><i
                                class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i></p>
                        <h5>Chúng tôi là những thợ cắt tóc giỏi nhất ở Hà Nội.</h5>
                        <div class="reservations mb-10">
                            <div class="icon color-1"><span class="icon-icon-1-1"></span></div>
                            <div class="text">
                                <p class="color-1">Liên hệ</p> <a class="color-1" href="tel:855-100-4444">0865 886
                                    742</a>
                            </div>
                        </div>
                    </div>
                    <!-- Appointment form -->
                    <div class="col-md-5 offset-md-2">
                        <div class="booking-box">
                            <div class="head-box text-center">
                                <h4>Đặt một cuộc hẹn</h4>
                            </div>
                            <div class="booking-inner clearfix">
                                <form class="form1 clearfix">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input1_wrapper">
                                                <label>Name</label>
                                                <div class="input2_inner">
                                                    <input type="text" class="form-control input" placeholder="Tên"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input1_wrapper">
                                                <label>Phone</label>
                                                <div class="input2_inner">
                                                    <input type="text" class="form-control input" placeholder="Số điện thoại"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input1_wrapper">
                                                <label>Ngày</label>
                                                <div class="input1_inner">
                                                    <input type="text" class="form-control input datepicker"
                                                           placeholder="Ngày" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="select1_wrapper">
                                                <label>Thời gian</label>
                                                <div class="select1_inner">
                                                    <select class="select2 select" style="width: 100%">
                                                        <option value="0">Thời gian</option>
                                                        <option value="1">10:00 am</option>
                                                        <option value="2">11:00 am</option>
                                                        <option value="3">12:00 pm</option>
                                                        <option value="4">14:00 pm</option>
                                                        <option value="5">16:00 pm</option>
                                                        <option value="6">18:00 pm</option>
                                                        <option value="7">20:00 pm</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="select1_wrapper">
                                                <label>Dịch vụ</label>
                                                <div class="select1_inner">
                                                    <select class="select2 select" style="width: 100%">
                                                        <option value="0">Dịch vụ</option>
                                                        <option value="0">Hair Styling</option>
                                                        <option value="1">Face Mask</option>
                                                        <option value="2">Shaving</option>
                                                        <option value="3">Beard Triming</option>
                                                        <option value="4">Hair Wash</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="select1_wrapper">
                                                <label>Chọn Barber</label>
                                                <div class="select1_inner">
                                                    <select class="select2 select" style="width: 100%">
                                                        <option value="0">Chọn Barber</option>
                                                        <option value="0">Philip</option>
                                                        <option value="1">Stephen</option>
                                                        <option value="2">Dennis</option>
                                                        <option value="3">Helen</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn-form1-submit mt-15">Đặt lịch hẹn
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Clients -->
    <section class="clients">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="owl-carousel owl-theme">
                        <div class="clients-logo">
                            <a href="#0"><img src="client/img/clients/2.png" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src="client/img/clients/3.png" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src="client/img/clients/4.png" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src="client/img/clients/5.png" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src="client/img/clients/6.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection





