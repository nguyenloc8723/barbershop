@extends('client.layouts.layout')

@section('content')
    <!-- Header Banner -->
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="4" data-background="{{asset('client/img/slider/3.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center caption mt-60">
                    <h5>About Me</h5>
                    <h1>Philip Brown</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Team Details -->
    <section class="team-box section-padding pb-0">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-30"> <img src="client/img/team/team-detail.jpg" class="img-fluid mb-30" alt="">
                    <div class="section-head mb-20">
                        <div class="section-subtitle">About Me</div>
                        <div class="section-title mb-15">Philip Brown</div>
                        <p>Barber utate ons amet ravida haretra nuam the duru miss uctus the drana accumsan justo aliquam sit amet auctor orci done vitae risus duise nisan sapien silver on the accumsan id mauris apien. Brown haretra nuam enim mi obortis eset uctus enec accumsan alisuame amet auctor orci vitae vehicula risus duise nun sapien.</p>
                        <ul class="about-list list-unstyled mb-30">
                            <li>
                                <div class="about-list-icon"> <span class="ti-check"></span> </div>
                                <div class="about-list-text">
                                    <p>I'm a professional and certified barber.</p>
                                </div>
                            </li>
                            <li>
                                <div class="about-list-icon"> <span class="ti-check"></span> </div>
                                <div class="about-list-text">
                                    <p>I care about the satisfaction of my customers.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <ul class="nav nav-tabs simpl-bord mt-60" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation"> <span class="nav-link active cursor-pointer" id="vision-tab" data-bs-toggle="tab" data-bs-target="#biography">Biography</span> </li>
                        <li class="nav-item" role="presentation"> <span class="nav-link cursor-pointer" id="mission-tab" data-bs-toggle="tab" data-bs-target="#education">Education</span> </li>
                        <li class="nav-item" role="presentation"> <span class="nav-link cursor-pointer" id="mission-tab" data-bs-toggle="tab" data-bs-target="#awards">Awards</span> </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="biography" role="tabpanel" aria-labelledby="vision-tab">
                            <p>Biography utate ons amet ravida haretra nuam the duru miss uctus the drana accumsan justo aliquam sit amet auctor orci done vitae risus duise nisan sapien silver on the accumsan id mauris apien.</p>
                            <p>Brown haretra nuam enim mi obortis eset uctus enec accumsan alisuame amet auctor orci vitae vehicula risus duise nun sapien.</p>
                        </div>
                        <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="mission-tab">
                            <p>Education utate ons amet ravida haretra nuam the duru miss uctus the drana accumsan justo aliquam sit amet auctor orci done vitae risus duise nisan sapien silver on the accumsan id mauris apien.</p>
                            <p>Brown haretra nuam enim mi obortis eset uctus enec accumsan alisuame amet auctor orci vitae vehicula risus duise nun sapien.</p>
                        </div>
                        <div class="tab-pane fade" id="awards" role="tabpanel" aria-labelledby="mission-tab">
                            <p>Awards utate ons amet ravida haretra nuam the duru miss uctus the drana accumsan justo aliquam sit amet auctor orci done vitae risus duise nisan sapien silver on the accumsan id mauris apien.</p>
                            <p>Brown haretra nuam enim mi obortis eset uctus enec accumsan alisuame amet auctor orci vitae vehicula risus duise nun sapien.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 offset-md-1">
                    <div class="wrap">
                        <div class="desc">
                            <div class="section-title mb-15">Contact Me</div>
                            <p>Barber utate ons amet ravida haretra nuam the duru miss uctus the drana accumsan aliquam auctor orci vitae risus in the duise nisan sapien.</p>
                        </div>
                        <div class="cont">
                            <div class="coll">
                                <h6>Email Us Directly</h6>
                            </div>
                            <div class="coll">
                                <h5>philip@barber.com</h5>
                            </div>
                        </div>
                        <div class="cont">
                            <div class="coll">
                                <h6>Call Us Directly</h6>
                            </div>
                            <div class="coll">
                                <h5>855 100 4444 / 33</h5>
                            </div>
                        </div>
                        <div class="cont">
                            <div class="coll">
                                <div class="social-icon"> <a href="index.html"><i class="ti-facebook"></i></a> <a href="index.html"><i class="ti-twitter"></i></a> <a href="index.html"><i class="ti-instagram"></i></a> <a href="index.html"><i class="ti-pinterest"></i></a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Image Gallery -->
    <section class="section-padding pt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-0">Our Works</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 gallery-item">
                    <a href="client/img/slider/3.jpg" title="" class="img-zoom">
                        <div class="gallery-box">
                            <div class="gallery-img"> <img src="client/img/slider/3.jpg" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 gallery-item">
                    <a href="client/img/slider/4.jpg" title="" class="img-zoom">
                        <div class="gallery-box">
                            <div class="gallery-img"> <img src="client/img/slider/4.jpg" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 gallery-item">
                    <a href="client/img/slider/5.jpg" title="" class="img-zoom">
                        <div class="gallery-box">
                            <div class="gallery-img"> <img src="client/img/slider/5.jpg" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 gallery-item">
                    <a href="client/img/slider/14.jpg" title="" class="img-zoom">
                        <div class="gallery-box">
                            <div class="gallery-img"> <img src="client/img/slider/14.jpg" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
