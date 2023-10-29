$(document).ready(function () {
    let inputElement = $('.my-input');
    let anchorElement = $('.jqr_routeBooking');


    function removePrefix(phoneNumber) {
        if (phoneNumber.startsWith("+84")) {
            return phoneNumber.substr(3);
        } else {
            return phoneNumber;
        }
    }

    function checkAndUpdateLink() {
        let inputValue = removePrefix(inputElement.val().trim());
        let isValidPhoneNumber = /^\d{10}$/.test(inputValue);
        if (inputValue && isValidPhoneNumber) {
            let bookingUrl = anchorElement.data('booking-url');
            anchorElement.attr('href', bookingUrl);
            if (inputElement.val() !== '') {
                inputElement.val(inputValue);
            } else {
                inputElement.val('');
            }
        } else {
            anchorElement.removeAttr('href');
        }
    }

    inputElement.on('input', function () {
        checkAndUpdateLink();
    });

    anchorElement.on('click', function (e) {
        if (inputElement.val() === "") {
            e.preventDefault();
            toastr['error']
            ('Xin vui lòng nhập số điện thoại');
        } else if (!anchorElement.attr('href')) {
            e.preventDefault();
            toastr['error']
            ('Xin vui lòng nhập số điện thoại hợp lệ');
        } else {
            window.location.href = '/user/booking?phone=' + removePrefix(inputElement.val().trim());
        }
    });
    checkAndUpdateLink();
});
