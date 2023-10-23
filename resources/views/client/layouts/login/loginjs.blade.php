<!-- jquery-->
<script src="{{asset('login/js/jquery.min.js')}}"></script>
<!-- Bootstrap js -->
<script src="{{asset('login/js/bootstrap.min.js')}}"></script>
<!-- Imagesloaded js -->
<script src="{{asset('login/js/imagesloaded.pkgd.min.js')}}"></script>
<!-- Validator js -->
<script src="{{asset('login/js/validator.min.js')}}"></script>
<!-- Custom Js -->
<script src="{{asset('login/js/main.js')}}"></script>

{{--login firebase--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
<script>
    var firebaseConfig = {
        apiKey: "AIzaSyCJ8pbe36jbzUmVQK_pFOZlPKXRW6JNoG8",
        authDomain: "test2-5f15d.firebaseapp.com",
        projectId: "test2-5f15d",
        storageBucket: "test2-5f15d.appspot.com",
        messagingSenderId: "660182456617",
        appId: "1:660182456617:web:89d3c4ddf2b96307efff38",
        measurementId: "G-31DTR2L4VF"
    };
    firebase.initializeApp(firebaseConfig);
</script>
<script type="text/javascript">
    window.onload = function () {
        render();
    };
    document.getElementById("number").addEventListener("keyup", function (event) {
        if (event.key === "Enter") {
            sendOTP();
        }
    });

    function checkEnter(event) {
        if (event.key === "Enter") {
            verify(); // Gọi hàm verify() khi ấn Enter trong ô nhập liệu verificationId
        }
    }

    function render() {
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
        recaptchaVerifier.render();
    }

    var coderesult;

    function sendOTP() {

        var number = "+84" + $("#number").val();
        firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
            window.confirmationResult = confirmationResult;
            coderesult = confirmationResult;
            console.log(coderesult);
            $("#successAuth").text("Message sent");
            $("#successAuth").show();
            localStorage.setItem("phoneNumber", number);
            window.location.href = "/verify-otp?verificationId=" + confirmationResult.verificationId; // Thay đổi "/verify-otp" thành URL trang xác thực OTP của bạn
        }).catch(function (error) {
            $("#error").text(error.message);
            $("#error").show();
        });
    }

    function verify() {
        var code = $("#verificationId").val();
        // Lấy số điện thoại từ localStorage
        var phoneNumber = localStorage.getItem("phoneNumber");

        console.log(phoneNumber);

        const urlParams = new URLSearchParams(window.location.search);
        const verificationId = urlParams.get("verificationId");

        const confirmationResult = firebase.auth.PhoneAuthProvider.credential(verificationId, code);

        // Lấy giá trị số điện thoại từ biến `number`


        firebase.auth().signInWithCredential(confirmationResult).then(function (result) {

            $.ajax({
                type: 'POST',
                url: '/process',
                data: {
                    phone_number: phoneNumber, // Truyền giá trị số điện thoại vào yêu cầu POST
                    // Các trường thông tin khác nếu cần
                },
                success: function (data) {
                    // Xử lý dữ liệu phản hồi từ phía máy chủ (nếu cần)
                    console.log(data);
                    window.location.href = "/"; // Chuyển hướng sau khi xử lý
                },
                error: function (error) {
                    $("#error").text(error.message);
                    $("#error").show();
                }
            });

        }).catch(function (error) {
            $("#error").text(error.message);
            $("#error").show();
        });
    }


</script>
