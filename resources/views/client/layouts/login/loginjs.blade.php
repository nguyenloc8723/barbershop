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
        // apiKey: "AIzaSyAOvQDy2ZBoXvqiQ9TMrwTlqVPDalTUFiQ",
        // authDomain: "testda-a322b.firebaseapp.com",
        // projectId: "testda-a322b",
        // storageBucket: "testda-a322b.appspot.com",
        // messagingSenderId: "361948022676",
        // appId: "1:361948022676:web:41d6468b7f7e3627eb3181",
        // measurementId: "G-KK4HFJ3ZPR"

        // apiKey: "AIzaSyB2CqirEwrZeVC6YKIHitaIHCxLHygOlAs",
        // authDomain: "fir-6cd66.firebaseapp.com",
        // databaseURL: "https://fir-6cd66-default-rtdb.firebaseio.com",
        // projectId: "fir-6cd66",
        // storageBucket: "fir-6cd66.appspot.com",
        // messagingSenderId: "167315184992",
        // appId: "1:167315184992:web:9bfc9570f1fd3179611205",
        // measurementId: "G-0195R4LR4V"

        apiKey: "AIzaSyAUFqlNlcVV9R6bc4GyIbVwBhhD0Rwofrw",
        authDomain: "test1-c5553.firebaseapp.com",
        projectId: "test1-c5553",
        storageBucket: "test1-c5553.appspot.com",
        messagingSenderId: "839373893398",
        appId: "1:839373893398:web:86c69f3c9db259027eaa37",
        measurementId: "G-Y75PPH37BL"
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

        var number = $("#number").val();
        firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
            window.confirmationResult = confirmationResult;
            coderesult = confirmationResult;
            console.log(coderesult);
            $("#successAuth").text("Message sent");
            $("#successAuth").show();

            window.location.href = "/verify-otp?verificationId=" + confirmationResult.verificationId; // Thay đổi "/verify-otp" thành URL trang xác thực OTP của bạn
        }).catch(function (error) {
            $("#error").text(error.message);
            $("#error").show();
        });
    }

    function verify() {
        var code = $("#verificationId").val();
        const urlParams = new URLSearchParams(window.location.search);
        const verificationId = urlParams.get("verificationId");
        const confirmationResult = firebase.auth.PhoneAuthProvider.credential(verificationId, code);
        firebase.auth().signInWithCredential(confirmationResult).then(function (result) {
            console.log(result);
            window.location.href = "/";
        }).catch(function (error) {
            $("#error").text(error.message);
            $("#error").show();
        });
    }


</script>
