document.addEventListener("DOMContentLoaded", function () {
    const btnShowModal = $('.jqr-btn-edit');
    const btnCancel = $('.jquery-btn-cancel');
    const fileInput = $('#service-image');
    const imgContainer = $('.selected-images');

    function showModal(action = true) {
        if (action) {
            $('.jquery-main-modal').show()
        } else {
            $('.jquery-main-modal').hide();
            imgContainer.empty();
        }
    }

    btnCancel.on('click', function () {
        showModal(false);
    });
    btnShowModal.on('click', showModal);

    fileInput.slideUp();
    fileInput.on('change', function () {
        const fileList = this.files;
        imgContainer.html('');
        for (let i = 0; i < fileList.length; i++) {
            let file = fileList[i];
            let render = new FileReader();
            render.readAsDataURL(file);
            render.onload = function (e) {
                let imgUrl = e.target.result;
                imgContainer.append(`
                    <div class="item-images">
                    <img src="${imgUrl}" width="50%"  alt=""/>
                    </div>
                `);
            }
        }
    })


    $('#formModalBooking').submit(function (e) {
        e.preventDefault();

        var formData = new FormData($(this)[0]);

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                // Xử lý phản hồi từ server
                toastr['success']('Cập nhật dịch vụ thành công');
                showModal(false);
                // $('#formModalService').closest('.modal').modal('hide');
            },
            error: function () {
                // Xử lý khi có lỗi kết nối đến server
                console.log('Error connecting to server');
            }
        });
    });
});

