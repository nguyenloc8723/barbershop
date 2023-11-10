var pusher = new Pusher('2c40385d726b8952eae0', {
    cluster: 'ap1'
});

var channel = pusher.subscribe('admin-notification-3');
channel.bind('notification-event-test', function (data) {
    // console.log(123);
    // debugger
    let notification = `
                <li class="notification-message">
                    <a href="#">
                        <div class="notify-block d-flex">
                            <span class="avatar avatar-sm flex-shrink-0">
<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/doctors/doctor-thumb-01.jpg">
                            </span>
                            <div class="media-body flex-grow-1">
                                <p class="noti-details">${data.message}</p>
                                <p class="noti-time"><span class="notification-time">${data.now}</span></p>
                            </div>
                        </div>
                    </a>
                </li>`;
    let currentNotificationCount = parseInt($('.nav-link .notification-test').text());
    currentNotificationCount++;
    $('.nav-link .notification-test').  text(currentNotificationCount);
    // Thêm thông báo mới vào giao diện
    $('#notification-container').append(notification);
});


// Lắng nghe sự kiện click trên các nút xóa thông báo
function deleteNotification(notificationId) {
    $.ajax({
        url: '/delete-notification/' + notificationId,
        method: 'GET',
        success: function(response) {
            if (response.success) {
                // Xóa thông báo trên giao diện
                // Đây ta sử dụng $(this) để truy cập phần tử được click
                $(this).parent().remove();
                location.reload();
            }
        },
        error: function(error) {
            console.error(error);
        }
    });
}

// $(document).ready(function() {
//     $('#kiemTraButton').click(function() {
//         $.ajax({
//             type: 'GET',
//             url: '/lay-so-luong-thong-bao',
//             success: function(response) {
//                 $('#soLuongThongBao').text(response.so_luong_thong_bao);
//             }
//         });
//     });
// });
$(document).ready(function() {
    // Tải số lượng thông báo khi trang web được tải lên
    $.ajax({
        type: 'GET',
        url: '/lay-so-luong-thong-bao',
        success: function(response) {
            $('#soLuongThongBao').text(response.so_luong_thong_bao);
        }
    });
});

function confirmBooking() {
    $('.confirm-booking').on('click', function() {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var bookingId = $(this).data('booking-id');
        $.ajax({
            method: 'POST',
            url: '/confirm-booking/' + bookingId,
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            },
            success: function(response) {
                // Hiển thị thông báo thành công
                toastr.success(response.message, 'Xác nhận thành công');

                // Cập nhật giao diện tại đây (thay đổi trạng thái, ẩn nút xác nhận, ...)
                // Ví dụ: Ẩn nút xác nhận sau khi xác nhận thành công
                $('.confirm-booking').hide();
                location.reload();
            },
            error: function(response) {
                // Xử lý lỗi
                toastr.error(response.responseJSON.message, 'Lỗi');
            }
        });
    });
}
let check = true
function confirmBooking() {
    $('.confirm-booking').on('click', function() {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var bookingId = $(this).data('booking-id');
        $.ajax({
            method: 'POST',
            url: '/confirm-booking/' + bookingId,
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            },
            success: function(response) {
                // Hiển thị thông báo thành công
                if(check){
                    toastr.success(response.message, 'Xác nhận thành công');
                    check = !check;
                }
                // toastr.success(response.message, 'Xác nhận thành công');
                // Cập nhật giao diện tại đây (thay đổi trạng thái, ẩn nút xác nhận, ...)
                // Ví dụ: Ẩn nút xác nhận sau khi xác nhận thành công
                $('.confirm-booking').hide();
                location.reload();
            },
            error: function(response) {
                // Xử lý lỗi
                toastr.error(response.responseJSON.message, 'Lỗi');
            }
        });
    });
}
$(document).ready(function() {
    confirmBooking();
    $('.delete-notification').on('click', function(e) {
        e.preventDefault();
        // Lấy ID thông báo từ thuộc tính data-notification-id
        var notificationId = $(this).data('notification-id');
        console.log(notificationId);
        // Gọi hàm deleteNotification và truyền notificationId vào đó
        deleteNotification.call(this, notificationId);
    });
});



function toggleCheckboxes() {
    const checkboxes = document.querySelectorAll('.input-form');
    const btnContainer = document.getElementById('btnContainer');
    const selectAllCheckbox = document.getElementById('selectAll');

    checkboxes.forEach((checkbox) => {
        checkbox.checked = selectAllCheckbox.checked;
    });

    if (selectAllCheckbox.checked) {
        btnContainer.style.display = 'block';
    } else {
        btnContainer.style.display = 'none';
    }
}

function confirmAll() {
    const checkboxes = document.querySelectorAll('.input-form');
    checkboxes.forEach((checkbox) => {
        if (checkbox.checked  && !checkbox.disabled) {
            const row = checkbox.closest('.row');
            const confirmButton = row.querySelector('.btn-success');
            confirmAppointment(confirmButton);
        }
    });
    toastr['success']('Xác nhận tất cả lịch được chọn thành công');
}

function cancelAll() {
    const checkboxes = document.querySelectorAll('.input-form');
    checkboxes.forEach((checkbox) => {
        if (checkbox.checked  && !checkbox.disabled) {
            const row = checkbox.closest('.row');
            const cancelButton = row.querySelector('.btn-danger');
            cancelAppointment(cancelButton);
        }
    });

    toastr['success']('Hủy tất cả lịch được chọn thành công');
}

function confirmAppointment(button) {
    const row = button.closest('.row');
    const checkbox = row.querySelector('.input-form');
    const confirmButton = row.querySelector('.btn-success');
    const cancelButton = row.querySelector('.btn-danger');

    confirmButton.disabled = cancelButton.disabled =  true;
    button.innerHTML = 'Đã xác nhận';
    checkbox.style.display = 'none';
    checkbox.disabled =  button.disabled = true;
    confirmBooking();
    // toastr['success']('Xác nhận lịch thành công');

}

function cancelAppointment(button) {
    const row = button.closest('.row');
    const checkbox = row.querySelector('.input-form');
    const confirmButton = row.querySelector('.btn-success');
    const cancelButton = row.querySelector('.btn-danger');
    confirmButton.disabled = cancelButton.disabled = true;
    button.innerHTML = 'Đã hủy';
    checkbox.style.display = 'none';
    checkbox.disabled = button.disabled =  true;
    deleteNotification();
    toastr['success']('Hủy lịch thành công');

}