@extends('client.layouts.layout')

@section('content')
    <!-- Header Banner -->
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="4" data-background="client/img/slider/11.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center caption mt-60">
                    <h5>Get In Touch</h5>
                    <h1>Contact Us</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact -->
    <section class="info-box section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="section-head mb-30">
                        <div class="section-subtitle">Contact Info</div>
                        <div class="section-title mb-20">Get In Touch</div>
                        <p>Barber utate ons amet ravida haretra nuam the duru miss uctus the drana accumsan justo aliquam sit amet auctor orci done vitae.</p>
                    </div>
                    <div class="item"> <span class="icon ti-location-pin"></span>
                        <div class="cont">
                            <h5>Address</h5>
                            <p>0665 Broadway NY, 10001 USA</p>
                        </div>
                    </div>
                    <div class="item"> <span class="icon ti-mobile"></span>
                        <div class="cont">
                            <h5>Phone</h5>
                            <p><a href="tel:8551004444">855 100 4444</a></p>
                        </div>
                    </div>
                    <div class="item"> <span class="icon ti-email"></span>
                        <div class="cont">
                            <h5>e-Mail</h5>
                            <p>info@barber.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 offset-md-1">
                    <div class="contact-form bg-darkbrown">
                        <div class="booking-inner clearfix">
                            <form method="post" class="form1 clearfix contact__form" action="https://duruthemes.com/demo/html/perukar/multipage-image/mail.php">
                                <div class="row">
                                    <div class="col-md-12 text-center mb-20">
                                        <h4 class="white">Contact Form</h4>
                                    </div>
                                </div>
                                <!-- Form message -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-success contact__msg" style="display: none" role="alert">
                                            Your message was sent successfully.
                                        </div>
                                    </div>
                                </div>
                                <!-- Form elements -->
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
                                            <label>e-Mail</label>
                                            <div class="input2_inner">
                                                <input type="email" class="form-control input" placeholder="e-Mail" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input1_wrapper">
                                            <label>Subject</label>
                                            <div class="input2_inner">
                                                <input type="text" class="form-control input" placeholder="Subject" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <textarea name="message" id="message" cols="30" rows="4" placeholder="Message" required></textarea>
                                    </div>
                                    <div class="col-md-12 mb-30">
                                        <button type="submit" class="btn-form2-submit">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Maps -->
    <section class="section-padding pb-0 pt-0 bg-darkbrown">
        <!-- Maps -->
        <div class="full-width">
            <div class="no-spacing map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.055619720342!2d-73.9842269!3d40.7608014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c258560d8ef183%3A0xc4e46289adc9c7c8!2s1616%20Broadway%2C%20New%20York%2C%20NY%2010001%2C%20Amerika%20Birle%C5%9Fik%20Devletleri!5e0!3m2!1str!2str!4v1668967163316!5m2!1str!2str" frameborder="0" class="google-maps" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </section>
@endsection
