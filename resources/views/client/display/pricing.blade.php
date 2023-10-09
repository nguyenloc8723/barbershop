@extends('client.layouts.layout')
@section('content')
    <!-- Header Banner -->
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5" data-background="{{asset('client/img/slider/18.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center caption mt-60">
                    <h5>Our Price List</h5>
                    <h1>Pricing Plan</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Pricing -->
    <section class="barber-pricing2 barber-pricing3 section-padding">
        <div class="container">
            <div class="row">
                <!-- img -->
                <div class="col-md-6 p-0 item">
                    <div class="img left">
                        <a href="pricing.html"> <img src="client/img/slider/6.jpg" alt="">
                            <div class="centered">
                                <h2>Haircut</h2>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- menu list -->
                <div class="col-md-6 p-0 valign">
                    <div class="content barber-pricing">
                        <div class="menu-list mb-30">
                            <div class="item">
                                <div class="flex">
                                    <div class="title">Perukar HairCut</div>
                                    <div class="dots"></div>
                                    <div class="price">$30</div>
                                </div>
                                <p><i>Haircut, shampoo, scalp massage, hot towel face treatment.</i></p>
                            </div>
                        </div>
                        <div class="menu-list mb-30">
                            <div class="item">
                                <div class="flex">
                                    <div class="title">Haircut with Skin Fade</div>
                                    <div class="dots"></div>
                                    <div class="price">$20</div>
                                </div>
                                <p><i>Haircut with a flat top or skin fade using a zero guard.</i></p>
                            </div>
                        </div>
                        <div class="menu-list mb-30">
                            <div class="item">
                                <div class="flex">
                                    <div class="title">Haircut Razor skin fade</div>
                                    <div class="dots"></div>
                                    <div class="price">$15</div>
                                </div>
                                <p><i>Perukar Haircut with a razor skin fade.</i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 p-0 order2 valign">
                    <div class="content barber-pricing">
                        <div class="menu-list mb-30">
                            <div class="item">
                                <div class="flex">
                                    <div class="title">Basic Beard Trim</div>
                                    <div class="dots"></div>
                                    <div class="price">$25</div>
                                </div>
                                <p><i>A beard trim done with trimmers or clippers & guards only.</i></p>
                            </div>
                        </div>
                        <div class="menu-list mb-30">
                            <div class="item">
                                <div class="flex">
                                    <div class="title">Beard Trim & Line Up</div>
                                    <div class="dots"></div>
                                    <div class="price">$20</div>
                                </div>
                                <p><i>A beard trim done with scissors, clippers, or trimmers. </i></p>
                            </div>
                        </div>
                        <div class="menu-list mb-30">
                            <div class="item">
                                <div class="flex">
                                    <div class="title">Electric Razor</div>
                                    <div class="dots"></div>
                                    <div class="price">$15</div>
                                </div>
                                <p><i>A line-up or edge-up with trimmers or electric razor.</i></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 p-0 order1 item">
                    <div class="img left">
                        <a href="pricing.html"> <img src="client/img/slider/4.jpg" alt="">
                            <div class="centered">
                                <h2>Beard</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 p-0 item">
                    <div class="img left">
                        <a href="pricing.html"> <img src="client/img/slider/5.jpg" alt="">
                            <div class="centered">
                                <h2>Shaves</h2>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 p-0 valign">
                    <div class="content barber-pricing">
                        <div class="menu-list mb-30">
                            <div class="item">
                                <div class="flex">
                                    <div class="title">Full Face Shave</div>
                                    <div class="dots"></div>
                                    <div class="price">$20</div>
                                </div>
                                <p><i>Slick up your face with our smooth hot lather full face shave.</i></p>
                            </div>
                        </div>
                        <div class="menu-list mb-30">
                            <div class="item">
                                <div class="flex">
                                    <div class="title">Partial Face Shave</div>
                                    <div class="dots"></div>
                                    <div class="price">$15</div>
                                </div>
                                <p><i>Partial shaving of the face, cheeks and neck. Includes a beard trim.</i></p>
                            </div>
                        </div>
                        <div class="menu-list mb-30">
                            <div class="item">
                                <div class="flex">
                                    <div class="title">Head Shave</div>
                                    <div class="dots"></div>
                                    <div class="price">$25</div>
                                </div>
                                <p><i>Make your dome shine with our awesome, hot lather head shave.</i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Appointment Form -->
    <section class="testimonials">
        <div class="background bg-img bg-fixed section-padding pb-0" data-background="client/img/slider/20.jpg" data-overlay-dark="6">
            <div class="container">
                <div class="row">
                    <!-- Appointment call -->
                    <div class="col-md-5 mb-30 mt-60">
                        <p class="mb-0"><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i></p>
                        <h5>We Are Best Barbers & Hair Cutting Salon at NYC.</h5>
                        <div class="reservations mb-10">
                            <div class="icon color-1"><span class="icon-icon-1-1"></span></div>
                            <div class="text">
                                <p class="color-1">Appointment</p> <a class="color-1" href="tel:855-100-4444">855 100 4444</a>
                            </div>
                        </div>
                    </div>
                    <!-- Appointment form -->
                    <div class="col-md-5 offset-md-2">
                        <div class="booking-box">
                            <div class="head-box text-center">
                                <h4>Make An Appointment</h4>
                            </div>
                            <div class="booking-inner clearfix">
                                <form class="form1 clearfix">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input1_wrapper">
                                                <label>Name</label>
                                                <div class="input2_inner">
                                                    <input type="text" class="form-control input" placeholder="Name" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input1_wrapper">
                                                <label>Phone</label>
                                                <div class="input2_inner">
                                                    <input type="text" class="form-control input" placeholder="Phone" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input1_wrapper">
                                                <label>Date</label>
                                                <div class="input1_inner">
                                                    <input type="text" class="form-control input datepicker" placeholder="Date" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="select1_wrapper">
                                                <label>Time</label>
                                                <div class="select1_inner">
                                                    <select class="select2 select" style="width: 100%">
                                                        <option value="0">Time</option>
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
                                                <label>Services</label>
                                                <div class="select1_inner">
                                                    <select class="select2 select" style="width: 100%">
                                                        <option value="0">Services</option>
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
                                                <label>Choose Barber</label>
                                                <div class="select1_inner">
                                                    <select class="select2 select" style="width: 100%">
                                                        <option value="0">Choose Barber</option>
                                                        <option value="0">Philip</option>
                                                        <option value="1">Stephen</option>
                                                        <option value="2">Dennis</option>
                                                        <option value="3">Helen</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn-form1-submit mt-15">Make Appointment</button>
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
