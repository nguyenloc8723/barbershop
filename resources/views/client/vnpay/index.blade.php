<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tạo mới đơn hàng</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('vnpay/bootstrap.min.css')}}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset('vnpay/jumbotron-narrow.css')}}" rel="stylesheet">
    <script src="{{asset('vnpay/jquery-1.11.3.min.js')}}"></script>
</head>
<style>
    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f5f5f5;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    h3 {
        color: #333;
    }

    .table-responsive {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
        color: #333;
        /* display: block; */
    }

    input[type="number"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    textarea {
        width: 100%;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        resize: none;
    }

    #charCount {
        color: #888;
        font-size: 12px;
        margin-top: 5px;
    }

    h4 {
        color: #333;
    }

    h5 {
        color: #555;
    }

    input[type="radio"] {
        margin-right: 5px;
    }

    button[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>

<body>
    <div class="container">
        <h3>Thông tin chuyển khoản đơn hàng</h3>
        <div class="table-responsive">
            <form action="{{ route('client.create.vnpay')}}" id="frmCreateOrder" method="post">
                @csrf
                <input type="hidden" name="booking_id" value="{{$booking->id}}">
                <input type="hidden" name="user_phone" value="{{$booking->user_phone}}">
                <div class="form-group">
                    <label for="amount">Số tiền</label>
                    <input class="form-control" data-val="true" data-val-number="The field Amount must be a number." data-val-required="The Amount field is required." id="amount" max="100000000" min="1" name="money" type="number" value="{{$booking->price}}" />
                </div>
                <div class="form-group">
                    <div class="mb-3">
                        <label for="" class="form-label">Nội dung chuyển khoản</label>
                        <textarea class="form-control" name="description_payment" id="" maxlength="255" rows="10" col="30" oninput="checkLength(this)"></textarea>
                        <div id="charCount"></div>
                    </div>
                </div>
                <h4>Chọn phương thức thanh toán</h4>
                <div class="form-group">
                    <h5>Cách 1: Chuyển hướng sang Cổng VNPAY chọn phương thức thanh toán</h5>
                    <input type="radio" Checked="True" id="bankCode" name="bankCode" value="">
                    <label for="bankCode">Cổng thanh toán VNPAYQR</label><br>

                    <h5>Cách 2: Tách phương thức tại site của đơn vị kết nối</h5>
                    <input type="radio" id="bankCode" name="bankCode" value="VNPAYQR">
                    <label for="bankCode">Thanh toán bằng ứng dụng hỗ trợ VNPAYQR</label><br>

                    <input type="radio" id="bankCode" name="bankCode" value="VNBANK">
                    <label for="bankCode">Thanh toán qua thẻ ATM/Tài khoản nội địa</label><br>

                    <input type="radio" id="bankCode" name="bankCode" value="INTCARD">
                    <label for="bankCode">Thanh toán qua thẻ quốc tế</label><br>

                </div>
                <div class="form-group">
                    <h5>Chọn ngôn ngữ giao diện thanh toán:</h5>
                    <input type="radio" id="language" Checked="True" name="language" value="vn">
                    <label for="language">Tiếng việt</label><br>
                    <input type="radio" id="language" name="language" value="en">
                    <label for="language">Tiếng anh</label><br>

                </div>
                <button type="submit" class="btn btn-default" href>Xác nhận thanh toán</button>
            </form>
        </div>
    </div>
    <script>
        function checkLength(textarea) {
            const maxLength = parseInt(textarea.getAttribute("maxlength"));
            const currentLength = textarea.value.length;
            const charCountElement = document.getElementById("charCount");

            if (currentLength <= maxLength) {
                charCountElement.textContent = `${currentLength}/${maxLength} ký tự`;
            } else {
                charCountElement.textContent = `Đã vượt quá giới hạn (${currentLength}/${maxLength} ký tự)`;
            }
        }
    </script>

</body>

</html>