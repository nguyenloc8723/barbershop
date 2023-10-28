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
                        <a href="" class="fxt-logo"><img src="{{asset('client/img/logobarber.png')}}"
                                                                      alt="Logo" width="250px"></a>
                        <p>Đăng nhập vào tài khoản của bạn</p>
                    </div>
                    <div class="alert alert-danger" id="error" style="display: none;"></div>
                    <div class="alert alert-success" id="successAuth" style="display: none;"></div>
                    <div class="fxt-form">
                        <form  onsubmit="return false;">
                            <div class="form-group">
                                <div class="fxt-transformY-50 fxt-transition-delay-1">
                                    <input type="text" id="number" class="form-control" name="number"
                                           placeholder="Số điện thoại ..." >
                                </div>
                                <div id="recaptcha-container"></div>

                            </div>
                            <div class="form-group">
                                <div class="fxt-transformY-50 fxt-transition-delay-4">
                                    <button type="button" class="fxt-btn-fill" onclick="sendOTP();">Gửi mã OTP
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="fxt-footer">
                        <div class="fxt-transformY-50 fxt-transition-delay-9">
                            <p>Quay lai website<a href="{{ route('index') }}"
                                                  class="switcher-text2 inline-text">Back</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@extends('client.layouts.login.loginjs')

</body>
