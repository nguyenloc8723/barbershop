<div class="fxt-template-layout11 container">
    <div class="fxt-content">
        <span class="closePopupButton" id="closePopupOTP">×</span>
        <div class="fxt-form">
            <h2>Xác minh mã OTP</h2>
            <p>Chúng tôi đã gửi mã xác minh tới bạn <span id="phoneNumber"></span></p>
            <label class="fxt-otp-label">Nhập mã OTP vào đây</label>
            <div class="alert alert-danger" id="error1" style="display: none;"></div>
            <form onsubmit="return false;" method="post">
                @csrf
                <div class="fxt-transformY-50 fxt-transition-delay-1">
                    <div class="fxt-form-row">
                        <input type="text" class="fxt-form-col otp-input form-control" id="verificationId"
                               required="required" onkeyup="checkEnter(event)" oninput="validatePhoneNumber(this)">
                    </div>
                </div>
                <div class="fxt-form-btn fxt-transformY-50 fxt-transition-delay-4">
                    <div class="text-center mb-3">
                        <button type="button" class="fxt-btn-fill" onclick="verify()">Xác minh</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="fxt-footer">
            <div class="fxt-transformY-50 fxt-transition-delay-9">
                <p class="fxt-resend-wrap">Không nhận được mã OTP?
                    <button id="closePopupOTP" class="fxt-btn-resend" type="button" onclick="resendOTP();" >Gửi lại</button>
                </p>
            </div>
        </div>
    </div>
</div>

