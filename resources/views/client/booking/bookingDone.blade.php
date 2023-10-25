@extends('client.layouts.layout')

@section('style')
{{--    <link rel="stylesheet" href="https://30shine.com/static/css/main.3b0c8d1d.chunk.css">--}}
{{--    <link rel="stylesheet" href="https://30shine.com/static/css/9.dd6dd3b5.chunk.css" />--}}
{{--    <link rel="stylesheet" href="https://30shine.com/static/css/25.4af93d8b.chunk.css"/>--}}

    <link rel="stylesheet" href="https://30shine.com/static/css/main.9e417c19.chunk.css" />
    <link rel="stylesheet" href="{{asset('client/css/booking.css')}}">
@endsection

@section('content')
    <!-- Booking -->
    <div class="fix-hed">

    </div>
    <div id="booking_id" data-booking_id="{{$booking_id}}"></div>
    <section class="info-box section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="booking-done" id="booking-done">
                        <div class="bg-white p-4 mb-2.5 jqr-booking-done">
                            <div class="text-2xl color-green-11b14b font-semibold md:pt-6 pt-2 pb-6 flex">
                                Đặt Lịch Thành Công
                                <span role="img" aria-label="success">🎉</span>
                            </div>

                        </div>
                        <div class="bg-white p-4 mb-2.5 jqr-booking-done">
                            <div class="divide-y divide-gray-300">
                                <div class="">
                                    <div class="text-sm font-normal color-111111 pb-1">Stylist : Tuấn Anh</div>
                                    <div class="text-sm font-light pb-2"></div>
                                </div>
                                <div class="">
                                    <div class="text-sm font-normal color-111111 pb-1">Dịch vụ</div>
                                    <div class="text-sm font-light pb-2 jqr-serviceName"></div>
                                    <div class="text-sm font-light pb-4 jqr-servicePrice">Tổng tiền anh cần thanh toán:
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-4 mb-2.5 jqr-booking-done">
                            <div class="flex pb-4">
                                <div>
                                    <div class="text-lg font-semibold">Hướng dẫn đổi/hủy lịch đặt</div>
                                    <div class="text-sm font-light pt-4">Nếu anh đến muộn quá <span class="font-weight">10 phút</span>
                                        chúng em sẽ dời lịch đặt sang khung giờ sau để anh có thời gian trải nghiệm thoải
                                        mái hơn.
                                    </div>
                                </div>
                            </div>
                            <div class="divide-y divide-gray-300 -my-4">
                                <button class="block flex item-center w-full py-4 jqr-change">
                                    <div class="flex text-sm font-normal color-111111">Đổi lịch</div>
                                </button>
                                <button class="block flex item-center w-full py-4 jqr-destroy">
                                    <div class="flex text-sm font-normal color-111111">Hủy lịch</div>
                                </button>
                            </div>
                        </div>
                        <div></div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{asset('js/jsClient/bookingDone.js')}}"></script>
@endsection



