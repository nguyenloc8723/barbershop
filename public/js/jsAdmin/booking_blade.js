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
        // console.log($(this).data('id'));
        var formData = new FormData($(this)[0]);
        let id = $(this).data('id');
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

                loadAll(id);

                // $('#formModalService').closest('.modal').modal('hide');
            },
            error: function () {
                // Xử lý khi có lỗi kết nối đến server
                console.log('Error connecting to server');
            }
        });
    });

    function loadAll(id) {
        // console.log('123');
        $.ajax({
            url: '/admin/booking_blade/api/detail/' + id,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                let service = data.service;
                let imageHtml = '';
                // console.log(data.results);
                for (let i = 0; i < data.results.length; i++) {
                    let item = data.results[i];
                    imageHtml += `<img src="/storage/${item.image}" style="border: 1px solid #000; max-width: 150px; margin: 10px;" alt="img" srcset="">`;
                }
                console.log(service);
                let is_status = '';
                if(data.status === 3){
                    is_status = `<span
                                           class="badge bg-success" >Đã cắt
                              </span>`
                }
                if(data.status === 1){
                    is_status = `<span
                                            class="badge bg-danger" >Chờ xác nhận
                                        </span>`
                }
                if(data.status === 2){
                    is_status = `<span
                                            class="badge bg-warning" >Chờ xác nhận
                                        </span>`
                }
                $('.task-detail').html(`
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <img class="flex-shrink-0 me-3 rounded-circle avatar-md" alt="64x64"
                                     src="/client/img/logobarber.png">
                                <div class="flex-grow-1">
                                    <h4 class="media-heading mt-0">${data.user_phone}</h4>

                                    ${is_status}

                                </div>
                            </div>

                            <h4>Stylist: ${data.stylist.name}</h4>


                            <div class="row task-dates mb-0 mt-2">
                                <div class="col-lg-6">
                                    <h4 class="font-600 m-b-5">Ngày</h4>
                                    <h5> ${data.date}</h5>
                                </div>
                                <div class="col-lg-6">
                                    <h4 class="font-600 m-b-5">Thời gian</h4>
                                    <h5> ${data.timesheet.hour}h ${data.timesheet.minutes}ph</h5>
                                </div>
                            </div>

                            <h4>Yêu cầu đặc biệt:</h4>


                            <h4 style="color: ${data.is_consultant == 1 ? "green" : "red" };">
                                Yêu cầu tư vấn: ${data.is_consultant == 1 ? "Có" : "Không" }
                            </h4>

                            <h4 style="color: ${data.is_accept_take_a_photo == 1 ? "green" : "red" };">
                                Chụp ảnh sau khi cắt để làm mẫu cho lần
                                sau: ${data.is_accept_take_a_photo == 1 ? "Có" : "Không" }
                            </h4>

                            <h4>

                            </h4>



                            <table
                                class="table table-bordered dt-responsive table-responsive nowrap text-center align-content-sm-center">
                                <thead>
                                <tr>
                                    <th>Tên dịch vụ</th>
                                    <th>Giá dịch vụ</th>
                                    <th>Trạng thái</th>
                                </tr>
                                </thead>
                                <tbody id="jquery-list">

                                </tbody>
                            </table>


                                ${imageHtml}

                            <button type="button" class="btn btn-warning position-absolute bottom-0 end-50 rounded jqr-btn-edit">Cập nhật</button>
                    `);
                $.each(service, function(index, item) {
                    $('#jquery-list').append(`
                    <tr>
                        <td>${item.name}</td>
                        <td>${item.price}</td>
                        <td>${item.is_active == 1 ? "Hoạt động" : "Không hoạt động"}</td>
                    </tr>
                `);
                });

            },
            error: function (error) {
                console.error(error);
            }
        });
    }
});

