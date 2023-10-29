<div class="fxt-template-layout11 container">
    <div class="fxt-content">

        <div class="fxt-header">
            <h2>Đăng nhập</h2>
            <p>Số điện thoại của bạn là gì?</p>
            <div class="alert alert-danger" id="error" style="display: none;"></div>
            <div class="alert alert-success" id="successAuth" style="display: none;"></div>
        </div>
        <div class="fxt-form">
            <form onsubmit="return false;">
                <div class="form-group">
                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                        <input type="text" id="number" class="form-control" name="number"
                               placeholder="Số điện thoại ...">
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
                <p>Quay lai website<a id="closePopupButton"
                                      class="switcher-text2 inline-text">Back</a></p>
            </div>
        </div>
    </div>
</div>



