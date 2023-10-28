$(document).ready(function () {
    let booking_id = $('#booking_id').data('booking_id');
    function bookingDone() {
        $.ajax({
            url: '/api/booking/success' +'/' + booking_id,
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                // console.log(response)
                // console.log(response.service)
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

    $(document).on('click','.jqr-change', function () {
        console.log('đổi lịch');
        destroy(booking_id);
        window.location.href = '/user/booking';
    });

    $(document).on('click','.jqr-destroy', function () {
        Swal.fire({
            title: 'Bạn chắc chắn muốn hủy lịch?',
            text: "Bạn sẽ không thể hoàn nguyên điều này!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    '',
                    'Hủy lịch thành công.',
                    'success'
                ).then(() => {
                    window.location.href = '/';
                });
                destroy(booking_id);
            }
        })
    });

    function destroy(id) {
        console.log('Hủy lịch ' + id);
        $.ajax({
            url: '/api/booking/destroy' +'/' + id,
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                console.log(response)
            },
            error: function (error) {
                console.error(error);
            }
        });
    }
});
