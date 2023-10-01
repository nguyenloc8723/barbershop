@extends('client.layouts.layout')

@section('content')
    <!-- Header Banner -->
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5" data-background="client/img/slider/2.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center caption mt-60">
                    <h5>Services Page</h5>
                    <h1>Haircut</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Services Page -->
    <section class="barber-pricing section-padding">
        <div class="container">
            <div class="row">
                <!-- Content -->

                <div class="col-md-7 mb-30">
                    <div class="section-head mb-15">
                        <div class="section-subtitle">{{$model->category_id}}</div>
                        <div class="section-title">{{$model->name}}</div>
                    </div>
                    <p>{{$model->description}}</p>
                    <p class="mb-45">{{$model->description}}</p>
                    <!-- Pricing -->
                    <div class="menu-list mb-10">
                        <div class="item">
                            <div class="flex">
                                <div class="title">{{$model->name}}</div>
                                <div class="dots"></div>
                                <div class="price">{{$model->price}}$</div>
                            </div>
                        </div>
                    </div>
                    <div class="menu-list mb-10">
                        <div class="item">
                            <div class="flex">
                                <div class="title">Wash and Cut</div>
                                <div class="dots"></div>
                                <div class="price">$30</div>
                            </div>
                        </div>
                    </div>
                    <div class="menu-list mb-10">
                        <div class="item">
                            <div class="flex">
                                <div class="title">Long Hair</div>
                                <div class="dots"></div>
                                <div class="price">$25</div>
                            </div>
                        </div>
                    </div>
                    <div class="menu-list mb-10">
                        <div class="item">
                            <div class="flex">
                                <div class="title">Children Wash & Cut</div>
                                <div class="dots"></div>
                                <div class="price">$25</div>
                            </div>
                        </div>
                    </div>
                    <div class="menu-list mb-45">
                        <div class="item">
                            <div class="flex">
                                <div class="title">Wash and Style</div>
                                <div class="dots"></div>
                                <div class="price">$10</div>
                            </div>
                        </div>
                    </div>
                    <!-- Image Gallery -->
                    <div class="row">
                        <div class="col-md-4 gallery-item">
                            <a href="client/img/slider/1.jpg" title="" class="img-zoom">
                                <div class="gallery-box">
                                    <div class="gallery-img"><img src="client/img/slider/1.jpg"
                                                                  class="img-fluid mx-auto d-block" alt="work-img">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 gallery-item">
                            <a href="client/img/slider/2.jpg" title="" class="img-zoom">
                                <div class="gallery-box">
                                    <div class="gallery-img"><img src="client/img/slider/2.jpg"
                                                                  class="img-fluid mx-auto d-block" alt="work-img">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 gallery-item">
                            <a href="client/img/slider/3.jpg" title="" class="img-zoom">
                                <div class="gallery-box">
                                    <div class="gallery-img"><img src="client/img/slider/3.jpg"
                                                                  class="img-fluid mx-auto d-block" alt="work-img">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 gallery-item">
                            <a href="client/img/slider/4.jpg" title="" class="img-zoom">
                                <div class="gallery-box">
                                    <div class="gallery-img"><img src="client/img/slider/4.jpg"
                                                                  class="img-fluid mx-auto d-block" alt="work-img">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 gallery-item">
                            <a href="client/img/slider/5.jpg" title="" class="img-zoom">
                                <div class="gallery-box">
                                    <div class="gallery-img"><img src="client/img/slider/5.jpg"
                                                                  class="img-fluid mx-auto d-block" alt="work-img">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 gallery-item">
                            <a href="client/img/slider/6.jpg" title="" class="img-zoom">
                                <div class="gallery-box">
                                    <div class="gallery-img"><img src="client/img/slider/6.jpg"
                                                                  class="img-fluid mx-auto d-block" alt="work-img">
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-md-4 offset-md-1 sidebar-side">
                    <aside class="sidebar blog-sidebar mb-60">
                        <div class="sidebar-widget services">
                            <div class="widget-inner">
                                <div class="sidebar-title">
                                    <h4>All Services</h4>
                                </div>
                                <ul>
                                    <li class="active"><a href="services-page.html">Haircut</a></li>
                                    <li><a href="services-page.html">Moustache Trim</a></li>
                                    <li><a href="services-page.html">Face Shave</a></li>
                                    <li><a href="services-page.html">Beard Trim</a></li>
                                    <li><a href="services-page.html">Clipper Cut</a></li>
                                    <li><a href="services-page.html">Facial & Massage</a></li>
                                    <li><a href="services-page.html">Hair Washing</a></li>
                                    <li><a href="services-page.html">Hair Dryer</a></li>
                                    <li><a href="services-page.html">Coloring</a></li>
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- Other Services -->
    <section class="services-1 section-padding pt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-head">
                        <div class="section-subtitle">Our Services</div>
                        <div class="section-title">Other Services</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme">
                        <div class="item mb-0">
                            <a href="services-page.html"> <span class="icon icon-icon-1-1"></span>
                                <h5>Moustache Trim</h5>
                                <p>Lorem vulputate massa ons amet ravida haretra nuam the drana miss uctus enec accumsan
                                    aliquam sit sapien.</p>
                                <div class="shape"><span class="icon icon-icon-1-1"></span></div>
                            </a>
                        </div>
                        <div class="item mb-0">
                            <a href="services-page.html"> <span class="icon icon-icon-1-9"></span>
                                <h5>Face Shave</h5>
                                <p>Lorem vulputate massa ons amet ravida haretra nuam the drana miss uctus enec accumsan
                                    aliquam sit sapien.</p>
                                <div class="shape"><span class="icon icon-icon-1-9"></span></div>
                            </a>
                        </div>
                        <div class="item mb-0">
                            <a href="services-page.html"> <span class="icon icon-icon-1-3"></span>
                                <h5>Beard Trim</h5>
                                <p>Lorem vulputate massa ons amet ravida haretra nuam the drana miss uctus enec accumsan
                                    aliquam sit sapien.</p>
                                <div class="shape"><span class="icon icon-icon-1-3"></span></div>
                            </a>
                        </div>
                        <div class="item mb-0">
                            <a href="services-page.html"> <span class="icon icon-icon-1-2"></span>
                                <h5>Haircut</h5>
                                <p>Lorem vulputate massa ons amet ravida haretra nuam the drana miss uctus enec accumsan
                                    aliquam sit sapien.</p>
                                <div class="shape"><span class="icon icon-icon-1-2"></span></div>
                            </a>
                        </div>
                        <div class="item mb-0">
                            <a href="services-page.html"> <span class="icon icon-icon-1-6"></span>
                                <h5>Clipper Cut</h5>
                                <p>Lorem vulputate massa ons amet ravida haretra nuam the drana miss uctus enec accumsan
                                    aliquam sit sapien.</p>
                                <div class="shape"><span class="icon icon-icon-1-6"></span></div>
                            </a>
                        </div>
                        <div class="item mb-0">
                            <a href="services-page.html"> <span class="icon icon-icon-1-8"></span>
                                <h5>Facial & Massage</h5>
                                <p>Lorem vulputate massa ons amet ravida haretra nuam the drana miss uctus enec accumsan
                                    aliquam sit sapien.</p>
                                <div class="shape"><span class="icon icon-icon-1-8"></span></div>
                            </a>
                        </div>
                        <div class="item mb-0">
                            <a href="services-page.html"> <span class="icon icon-icon-1-4"></span>
                                <h5>Hair Washing</h5>
                                <p>Lorem vulputate massa ons amet ravida haretra nuam the drana miss uctus enec accumsan
                                    aliquam sit sapien.</p>
                                <div class="shape"><span class="icon icon-icon-1-4"></span></div>
                            </a>
                        </div>
                        <div class="item mb-0">
                            <a href="services-page.html"> <span class="icon icon-icon-1-18"></span>
                                <h5>Hair Dryer</h5>
                                <p>Lorem vulputate massa ons amet ravida haretra nuam the drana miss uctus enec accumsan
                                    aliquam sit sapien.</p>
                                <div class="shape"><span class="icon icon-icon-1-18"></span></div>
                            </a>
                        </div>
                        <div class="item mb-0">
                            <a href="services-page.html"> <span class="icon icon-icon-1-10"></span>
                                <h5>Coloring</h5>
                                <p>Lorem vulputate massa ons amet ravida haretra nuam the drana miss uctus enec accumsan
                                    aliquam sit sapien.</p>
                                <div class="shape"><span class="icon icon-icon-1-10"></span></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
