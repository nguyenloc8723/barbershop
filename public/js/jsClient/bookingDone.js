$(document).ready(function () {
    toastr['success']('Đặt lịch thành công');

    function bookingDone() {
        $.ajax({
            url: '/api/booking/success',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                console.log(response)
                $('.jqr-serviceName').empty();
                let price = 0;
                response.service.map(item => {
                    $('.jqr-serviceName').append(`
                         <div class="booking-service__group-wrap-item">${item.name}</div>
                    `);
                    price += +item.price;
                });
                function formatCurrency(amount) {
                    return amount.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
                }

                let formattedMoney = formatCurrency(price);
                $('.jqr-servicePrice').html(`
                    <div class="text-sm font-light jqr-text">Tổng số tiền anh cần thanh toán:  <span class="font-normal">${formattedMoney}</span></div>
                `);
            },
            error: function (error) {
                console.error(error);
            }
        });
    }
    bookingDone();
});
