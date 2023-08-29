@extends('client.layouts.layout')

@section('content')
    <!-- Header Banner -->
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5" data-background="client/img/slider/9.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center caption mt-60">
                    <h5>Our Blog</h5>
                    <h1>Latest News</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- News  -->
    <section class="blog section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="item mb-60">
                        <div class="position-re o-hidden"> <img src="client/img/slider/8.jpg" alt="">
                            <div class="date">
                                <a href="post.html"> <span>Dec</span> <i>29</i> </a>
                            </div>
                        </div>
                        <div class="con"> <span class="category">
                                <a href="blog.html">Hair Care</a>
                            </span>
                            <h5><a href="post.html">Women's Hair Care Routine for Any Hair Type</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="item mb-60">
                        <div class="position-re o-hidden"> <img src="client/img/slider/9.jpg" alt="">
                            <div class="date">
                                <a href="post.html"> <span>Dec</span> <i>27</i> </a>
                            </div>
                        </div>
                        <div class="con"> <span class="category">
                                <a href="blog.html">Beard</a>
                            </span>
                            <h5><a href="post.html">Common Mistakes That Damage Your Beard</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="item mb-60">
                        <div class="position-re o-hidden"> <img src="client/img/slider/6.jpg" alt="">
                            <div class="date">
                                <a href="post.html"> <span>Dec</span> <i>25</i> </a>
                            </div>
                        </div>
                        <div class="con"> <span class="category">
                                <a href="blog.html">Hairstyle</a>
                            </span>
                            <h5><a href="post.html">5 Most Iconic Men’s Hairstyles Of All Times</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="item mb-60">
                        <div class="position-re o-hidden"> <img src="client/img/slider/4.jpg" alt="">
                            <div class="date">
                                <a href="post.html"> <span>Dec</span> <i>23</i> </a>
                            </div>
                        </div>
                        <div class="con"> <span class="category">
                                <a href="blog.html">Haircut</a>
                            </span>
                            <h5><a href="post.html">What Are The Secrets of The Haircut & Moustache Trim?</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="item mb-60">
                        <div class="position-re o-hidden"> <img src="client/img/slider/16.jpg" alt="">
                            <div class="date">
                                <a href="post.html"> <span>Dec</span> <i>22</i> </a>
                            </div>
                        </div>
                        <div class="con"> <span class="category"><a href="blog.html">Wedding</a></span>
                            <h5><a href="post.html">Best Tips for Groom Shaving for Your Wedding</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="item mb-60">
                        <div class="position-re o-hidden"> <img src="client/img/slider/19.jpg" alt="">
                            <div class="date">
                                <a href="post.html"> <span>Dec</span> <i>20</i> </a>
                            </div>
                        </div>
                        <div class="con"> <span class="category">
                                <a href="blog.html">Model</a>
                            </span>
                            <h5><a href="post.html">What We Need to Choose The Fashion Model?</a></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <!-- Pagination -->
                    <ul class="news-pagination-wrap align-center mb-30 mt-30">
                        <li><a href="blog.html#"><i class="ti-angle-left"></i></a></li>
                        <li><a href="blog.html#">1</a></li>
                        <li><a href="blog.html#" class="active">2</a></li>
                        <li><a href="blog.html#">3</a></li>
                        <li><a href="blog.html#"><i class="ti-angle-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

@endsection
