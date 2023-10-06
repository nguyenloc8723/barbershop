@extends('client.layouts.layout')

@section('style')
    <link rel="stylesheet" href="https://30shine.com/static/css/main.3b0c8d1d.chunk.css" />
    <link rel="stylesheet" href="https://30shine.com/static/css/9.dd6dd3b5.chunk.css" />
    <link rel="stylesheet" href="{{asset('client/css/booking.css')}}">
@endsection

@section('content')
    <!-- Booking -->
    <div class="fix-hed">

    </div>
    <section class="info-box section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6" id="jqr-displayBooking">
                    <div class="new-top-navigator pointer " style="background-color: #14100c; color: #fff;">

                        <span class="text-center">Chọn dịch vụ</span>
                        <div class="note-price" style="color: #fff;">1K = 1000đ</div>
                    </div>
                    <div class="body relative " style="background-color: #fff;">
                        <div class="floating-service"> </div>
                        <div class="booking-service">
                            <div class="booking-service__input-wrap">
                                    <span class="ant-input-affix-wrapper ant-input-affix-wrapper-lg booking-service__input">
                                        <span class="ant-input-prefix">
                                            <span role="img" aria-label="search" tabindex="-1" class="anticon anticon-search booking-service__input-icon">
                                                <svg viewBox="64 64 896 896" focusable="false" data-icon="search" width="1em" height="1em" fill="currentColor"aria-hidden="true">
                                                    <path d="M909.6 854.5L649.9 594.8C690.2 542.7 712 479 712 412c0-80.2-31.3-155.4-87.9-212.1-56.6-56.7-132-87.9-212.1-87.9s-155.5 31.3-212.1 87.9C143.2 256.5 112 331.8 112 412c0 80.1 31.3 155.5 87.9 212.1C256.5 680.8 331.8 712 412 712c67 0 130.6-21.8 182.7-62l259.7 259.6a8.2 8.2 0 0011.6 0l43.6-43.5a8.2 8.2 0 000-11.6zM570.4 570.4C528 612.7 471.8 636 412 636s-116-23.3-158.4-65.6C211.3 528 188 471.8 188 412s23.3-116.1 65.6-158.4C296 211.3 352.2 188 412 188s116.1 23.2 158.4 65.6S636 352.2 636 412s-23.3 116.1-65.6 158.4z"></path>
                                                </svg>
                                            </span>
                                        </span>
                                        <input placeholder="Tìm kiếm dịch vụ, nhóm dịch vụ" class="ant-input ant-input-lg" type="text" value spellcheck="false" data-ms-editor="true">
                                    </span>
                            </div>
                            <div class="booking-service__group">
                                <div class="booking-service__group-title">Chọn xem nhanh theo nhóm</div>
                                <div class="booking-service__group-wrap">


                                </div>
                            </div>
                            <div class="box-switch flex items-center mt-2.5 bg-white px-4 py-2.5">
                                <div class="text-sm font-medium">Dịch vụ đã chọn: 0 dịch vụ</div>
                                <button type="button" role="switch" aria-checked="false" class="ant-switch box-switch__button">
                                    <div class="ant-switch-handle"></div>
                                    <span class="ant-switch-inner">
                                            <div class="box-switch__unChecked content-center-middle">
                                                <img src="/static/media/close.d8cb54f3.svg" alt>
                                            </div>
                                        </span>
                                </button>
                            </div>
                            <div id="jqr-category">


                            </div>


                            <div class="new-affix-v2">
                                <div class="flex space-between text-center content-step  time-line--active">
                                    <div class="right button-next pointer btn-inactive jqr-clickService jqr-css" role="presentation">
                                        <span>Chọn dịch vụ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{asset('js/jsClient/chooseServices.js')}}"></script>
@endsection



