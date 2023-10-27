@extends('client.layouts.layout')

@section('content')
    <!-- Header Banner -->
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="6" data-background="{{asset('client/img/slider/8.jpg')}}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center caption mt-60">
                    <h2>{{$detailBlog->title}}</h2> 
                </div>
            </div>
        </div>
    </div>
    <!-- Post -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <h3>{{$detailBlog->title}}</h3>  
            <div class="col-md-12"> <img src="{{ asset('storage/image/'.$detailBlog->image)}}" class="mb-30" alt="">
                    <p>{{ strip_tags($detailBlog->description)}}</p>
                    <blockquote>
                        <p>Nulla facilisi. Sedeuter nunc vouta miss mollis sapien vel, conseyer tureution yer vintane in libero semper. Quisque ravida eros ut turpis interdum ornare. Inter miss they adama seder a imerdie fames ac ante ipsum primis in faucibus.</p> <cite>Ropert Martin</cite>
                    </blockquote>
                    </div>
            </div>
            <div class="post-comment-section">
                <div class="row">
                    <!-- Comment -->
                    <div class="col-md-6">
                        <div class="news-post-comment-wrap">
                            <div class="post-user-comment"> <img src="https://img.meta.com.vn/Data/image/2022/01/13/anh-dep-thien-nhien-3.jpg" alt=""> </div>
                            <div class="post-user-content">
                                <h3>Emma Emily<span> 30 Dec 2022</span></h3>
                                <p>Lorem ultricies nibh non dolor maximus sceleue inte molliser rana neque nec tempor. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p> <a class="post-repay" href="#">Reply<i class="ti-back-left"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Contact Form -->
                    <div class="col-md-5 offset-md-1 mb-30">
                        <h3 class="mb-30">Leave a Reply</h3>
                        <form method="post" class="row">
                            <div class="col-md-6">
                                <input type="text" name="name" id="name" placeholder="Name *" required="">
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" id="email" placeholder="E-mail *" required="">
                            </div>
                            <div class="col-md-12">
                                <textarea name="message" id="message" cols="40" rows="4" placeholder="Comment *" required=""></textarea>
                            </div>
                            <div class="col-md-12">
                                <button class="button-4"><a href="#0"><span>Send Comment</span></a></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
