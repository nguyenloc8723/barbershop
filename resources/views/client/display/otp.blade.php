@extends('client.layouts.login.head')
<body>

<div id="preloader" class="preloader">
    <div class='inner'>
        <div class='line1'></div>
        <div class='line2'></div>
        <div class='line3'></div>
    </div>
</div>
<section class="fxt-template-animation fxt-template-layout11">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-xl-6 col-lg-7 col-sm-12 col-12 fxt-bg-color">
                <div class="fxt-content">
                    <div class="fxt-header">
                        <a href="login-11.html" class="fxt-logo"><img src="{{asset('login/img/logo-11.png')}}" alt="Logo"></a>
                    </div>
                    <div class="fxt-form">
                        <div class="alert alert-success" id="successOtpAuth" style="display: none;"></div>

                        <h2>Two-Step Verification</h2>
                        <a href="#" class="fxt-otp-logo"><img src="{{asset('login/img/elements/otp-icon.png')}}" alt="Otp Logo"></a>
{{--                        <p id="phoneNumberDisplay">We've sent a verification code to <span id="phoneNumber"></span></p>--}}

                        <p>We’ve sent a verification code to<span>+2*******337</span></p>
                        <label class="fxt-otp-label">Enter OTP Code Here</label>
                        <form onsubmit="return false;" >
                            <div class="fxt-transformY-50 fxt-transition-delay-1">
                                <div class="fxt-form-row">
                                    <input type="text" class="fxt-form-col otp-input form-control" id="verificationId" required="required" onkeyup="checkEnter(event)">

{{--                                    <input type="text" class="fxt-form-col otp-input form-control" maxlength="1" required="required">--}}
{{--                                    <input type="text" class="fxt-form-col otp-input form-control" maxlength="1" required="required">--}}
{{--                                    <input type="text" class="fxt-form-col otp-input form-control" maxlength="1" required="required">--}}
{{--                                    <input type="text" class="fxt-form-col otp-input form-control" maxlength="1" required="required">--}}
{{--                                    <input type="text" class="fxt-form-col otp-input form-control" maxlength="1" required="required">--}}
                                </div>
                            </div>
                            <div class="fxt-form-btn fxt-transformY-50 fxt-transition-delay-4">
                                <div class="text-center mb-3">
                                    <button type="button" class="fxt-btn-fill" onclick="verify()">Verify</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="fxt-footer">
                        <div class="fxt-transformY-50 fxt-transition-delay-9">
                            <p class="fxt-resend-wrap">Not received your code?<button class="fxt-btn-resend" type="submit">Resend code</button><span class="text-or">OR</span><button class="fxt-btn-resend" type="button">Call</button></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@extends('client.layouts.login.loginjs')
</body>
