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

        apiKey: "AIzaSyB2CqirEwrZeVC6YKIHitaIHCxLHygOlAs",
        authDomain: "fir-6cd66.firebaseapp.com",
        databaseURL: "https://fir-6cd66-default-rtdb.firebaseio.com",
        projectId: "fir-6cd66",
        storageBucket: "fir-6cd66.appspot.com",
        messagingSenderId: "167315184992",
        appId: "1:167315184992:web:9bfc9570f1fd3179611205",
        measurementId: "G-0195R4LR4V"


        // apiKey: "AIzaSyCJ8pbe36jbzUmVQK_pFOZlPKXRW6JNoG8",
        // authDomain: "test2-5f15d.firebaseapp.com",
        // projectId: "test2-5f15d",
        // storageBucket: "test2-5f15d.appspot.com",
        // messagingSenderId: "660182456617",
        // appId: "1:660182456617:web:89d3c4ddf2b96307efff38",
        // measurementId: "G-31DTR2L4VF"
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
        var phonePattern = /^(\+84|0)[0-9]{9,10}$/; // Mẫu số điện thoại Việt Nam

        if (phonePattern.test(number)) {
            // Số điện thoại hợp lệ, thực hiện xác thực OTP
            firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
                window.confirmationResult = confirmationResult;
                coderesult = confirmationResult;
                console.log(coderesult);
                $("#successAuth").text("Gửi OTP thành công");
                $("#successAuth").show();
                localStorage.setItem("phoneNumber", number);
                window.location.href = "/verify-otp?verificationId=" + confirmationResult.verificationId; // Thay đổi "/verify-otp" thành URL trang xác thực OTP của bạn
            }).catch(function (error) {
                $("#error").text(error.message);
                $("#error").show();
            });
        } else {
            // Số điện thoại không hợp lệ, hiển thị thông báo lỗi
            $("#error").text("Số điện thoại không hợp lệ.");
            $("#error").show();
        }

    }

    function verify() {
        var code = $("#verificationId").val();
        // Lấy số điện thoại từ localStorage
        var phoneNumber = localStorage.getItem("phoneNumber");
        console.log(phoneNumber);

        const urlParams = new URLSearchParams(window.location.search);
        const verificationId = urlParams.get("verificationId");

        if (!code) {
            // Kiểm tra xem người dùng đã nhập gì hay chưa
            $("#error").text("Bạn chưa nhập OTP .");
            $("#error").show();
            return;
        }
        const confirmationResult = firebase.auth.PhoneAuthProvider.credential(verificationId, code);
        firebase.auth().signInWithCredential(confirmationResult).then(function (result) {

            $.ajax({
                type: 'POST',
                url: '/process',
                data: {
                    phone_number: phoneNumber, // Truyền giá trị số điện thoại vào yêu cầu POST
                },
                success: function (data) {
                    // Xử lý dữ liệu phản hồi từ phía máy chủ (nếu cần)
                    console.log(data);
                    if (data.user_type === 'admin') {
                        window.location.href = "/admin/dashboard"; // Chuyển hướng đến trang admin
                    } else {
                        window.location.href = "/"; // Chuyển hướng đến trang người dùng thông thường
                    }
                    // window.location.href = "/"; // Chuyển hướng sau khi xử lý
                },

            });

        }).catch(function (error) {
            $("#error").text("Mã OTP không hợp lệ.");
            $("#error").show();
        });
    }




</script>

