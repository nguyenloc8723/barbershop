@extends('client.layouts.layout')

@section('content')
    <!-- Header Banner -->
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="6" data-background="{{asset('client/img/slider/9.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center caption mt-60">
                    <h5>Gallery & Video</h5>
                    <h1>Our Portfolio</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Image Gallery -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-head text-center">
                        <div class="section-subtitle">Portfolio</div>
                        <div class="section-title">Image Gallery</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- 3 columns -->
                <div class="col-md-4 gallery-item">
                    <a href="client/img/slider/3.jpg" title="" class="img-zoom">
                        <div class="gallery-box">
                            <div class="gallery-img"> <img src="client/img/slider/3.jpg" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 gallery-item">
                    <a href="client/img/slider/4.jpg" title="" class="img-zoom">
                        <div class="gallery-box">
                            <div class="gallery-img"> <img src="client/img/slider/4.jpg" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 gallery-item">
                    <a href="client/img/slider/5.jpg" title="" class="img-zoom">
                        <div class="gallery-box">
                            <div class="gallery-img"> <img src="client/img/slider/5.jpg" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                        </div>
                    </a>
                </div>
                <!-- 2 columns -->
                <div class="col-md-6 gallery-item">
                    <a href="client/img/slider/16.jpg" title="" class="img-zoom">
                        <div class="gallery-box">
                            <div class="gallery-img"> <img src="client/img/slider/16.jpg" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 gallery-item">
                    <a href="client/img/slider/14.jpg" title="" class="img-zoom">
                        <div class="gallery-box">
                            <div class="gallery-img"> <img src="client/img/slider/14.jpg" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                        </div>
                    </a>
                </div>
                <!-- 3 columns -->
                <div class="col-md-4 gallery-item">
                    <a href="client/img/slider/8.jpg" title="" class="img-zoom">
                        <div class="gallery-box">
                            <div class="gallery-img"> <img src="client/img/slider/8.jpg" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 gallery-item">
                    <a href="client/img/slider/9.jpg" title="" class="img-zoom">
                        <div class="gallery-box">
                            <div class="gallery-img"> <img src="client/img/slider/9.jpg" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 gallery-item">
                    <a href="client/img/slider/10.jpg" title="" class="img-zoom">
                        <div class="gallery-box">
                            <div class="gallery-img"> <img src="client/img/slider/10.jpg" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Video Gallery -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-head text-center">
                        <div class="section-subtitle">Portfolio</div>
                        <div class="section-title">Video Gallery</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- 2 columns -->
                <div class="col-md-6">
                    <div class="vid-area mb-30">
                        <div class="vid-icon"> <img src="client/img/slider/8.jpg" alt="">
                            <a class="video-gallery-button vid" href="https://youtu.be/e2x0UXVU2yg"> <span class="video-gallery-polygon">
                                    <i class="ti-control-play"></i>
                                </span> </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="vid-area mb-30">
                        <div class="vid-icon"> <img src="client/img/slider/9.jpg" alt="Vimeo">
                            <a class="video-gallery-button vid" href="https://youtu.be/e2x0UXVU2yg"> <span class="video-gallery-polygon">
                                    <i class="ti-control-play"></i>
                                </span> </a>
                        </div>
                    </div>
                </div>
                <!-- 3 columns -->
                <div class="col-md-4">
                    <div class="vid-area mb-30">
                        <div class="vid-icon"> <img src="client/img/slider/11.jpg" alt="YouTube">
                            <a class="video-gallery-button vid" href="https://youtu.be/e2x0UXVU2yg"> <span class="video-gallery-polygon">
                                    <i class="ti-control-play"></i>
                                </span> </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="vid-area mb-30">
                        <div class="vid-icon"> <img src="client/img/slider/13.jpg" alt="YouTube">
                            <a class="video-gallery-button vid" href="https://youtu.be/e2x0UXVU2yg"> <span class="video-gallery-polygon">
                                    <i class="ti-control-play"></i>
                                </span> </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="vid-area mb-30">
                        <div class="vid-icon"> <img src="client/img/slider/16.jpg" alt="YouTube">
                            <a class="video-gallery-button vid" href="https://youtu.be/e2x0UXVU2yg"> <span class="video-gallery-polygon">
                                    <i class="ti-control-play"></i>
                                </span> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
