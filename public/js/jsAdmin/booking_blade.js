document.addEventListener("DOMContentLoaded", function () {
    const btnShowModal = $('.jqr-btn-edit');
    const btnCancel = $('.jquery-btn-cancel');
    const fileInput = $('#service-image');
    const imgContainer = $('.selected-images');
    const showService = '/api/service/booking_blade';

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
                toastr['success']('Cập nhật lịch đặt thành công');
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
                                Yêu cầu tư vấn: ${data.is_consultant === 1 ? "Có" : "Không" }
                            </h4>

                            <h4 style="color: ${data.is_accept_take_a_photo == 1 ? "green" : "red" };">
                                Chụp ảnh sau khi cắt để làm mẫu cho lần
                                sau: ${data.is_accept_take_a_photo === 1 ? "Có" : "Không" }
                            </h4>

                            <h4>
                                 Trạng thái: ${is_status}
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
                        <td>${item.is_active === 1 ? "Hoạt động" : "Không hoạt động"}</td>
                    </tr>
                `);
                });

            },
            error: function (error) {
                console.error(error);
            }
        });
    }

    $(document).on('click','.js-btn-delete', function (){
        if (confirm('Bạn có chắc chắn muốn xóa ?')){
            bookingId = $(this).data('booking-id');
            serviceId = $(this).data('service-id');
            token = $('meta[name="csrf-token"]').attr('content');
            deleteBooking();
        }
    });
    function deleteBooking(){

        // Thêm token vào header của yêu cầu Ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': token
            }
        });
        $.ajax({
            url: '/admin/booking_blade/xoa-dich-vu-booking/' + bookingId + '/' + serviceId,
            type: 'DELETE',
            success: function (response) {
                alert(response.message);
                $('#service_' + serviceId).remove();
            },
            error: function (error) {
                alert('Đã có lỗi xảy ra.');
                console.error(error);
            }
        });
    }


    // $(document).on('click', '.jqr-showAllService', function () {
    //     allService();
    //     loadAllService()
    // })
    //
    // function allService() {
    //     $('#jqr-displayBooking').html(`
    //         <div class="new-top-navigator pointer " style="background-color: #14100c; color: #fff;">
    //
    //                     <span class="text-center">Chọn dịch vụ</span>
    //                     <div class="note-price" style="color: #fff;">1K = 1000đ</div>
    //         </div>
    //                 <div class="body relative " style="background-color: #fff;">
    //                     <div class="floating-service"> </div>
    //                     <div class="booking-service">
    //                         <div class="booking-service__input-wrap">
    //                                 <span class="ant-input-affix-wrapper ant-input-affix-wrapper-lg booking-service__input">
    //                                     <span class="ant-input-prefix">
    //                                         <span role="img" aria-label="search" tabindex="-1" class="anticon anticon-search booking-service__input-icon">
    //
    //                                         </span>
    //                                     </span>
    //                                     <input placeholder="Tìm kiếm dịch vụ, nhóm dịch vụ" class="ant-input ant-input-lg" type="text" value spellcheck="false" data-ms-editor="true">
    //                                 </span>
    //                         </div>
    //                         <div class="booking-service__group">
    //                             <div class="booking-service__group-title">Chọn xem nhanh theo nhóm</div>
    //                             <div class="booking-service__group-wrap">
    //
    //
    //                             </div>
    //                         </div>
    //                         <div class="box-switch flex items-center mt-2.5 bg-white px-4 py-2.5">
    //                             <div class="text-sm font-medium">Dịch vụ đã chọn: 0 dịch vụ</div>
    //
    //                         </div>
    //                         <div id="jqr-category">
    //
    //
    //                         </div>
    //                         <div class="new-affix-v2">
    //                             <div class="flex space-between text-center content-step  time-line--active">
    //                                 <div class="right pointer fw-bold fs-5 btn-inactive jqr-clickService jqr-css" role="presentation">
    //                                     <span>Chọn dịch vụ</span>
    //                                 </div>
    //                             </div>
    //                         </div>
    //                     </div>
    //                 </div>
    //     `);
    // }
    //
    // function formatCurrency(amount) {
    //     return amount.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
    // }
    //
    // function loadAllService() {
    //     arrayIDService = [];
    //     $.ajax({
    //         url: showService,
    //         method: 'GET',
    //         dataType: 'json',
    //         success: function (response) {
    //             // console.log(response);
    //             let data = response.data;
    //             // console.log(response.data);
    //             let imgService = response.service;
    //             let category = '';
    //             // console.log(imgService);
    //             for (let i = 0; i < data.length; i++) {
    //                 let countImg = 0;
    //                 let count = data[i].service.length;
    //                 let service = '';
    //                 service += `
    //                 <div class="service">
    //                      <div class="service__category">
    //                          <div class="category__name">${data[i].name}</div>
    //                          <div class="category__number">${count} dịch vụ</div>
    //                      </div>
    //                             <div class="service__list">
    //                                  <div class="grid gap-4 grid-cols-2 flex-column">
    //                       `
    //                 for (let j = 0; j < count; j++) {
    //                     let formattedMoney = formatCurrency(+data[i].service[j].price);
    //                     service += `
    //                             <div class="list__item">
    //                                 <div class="item__media " role="presentation">
    //                                    <img src="/storage/${imgService[countImg].images[0].url}" alt>
    //
    //                                 </div>
    //                                 <div class="fs-6 fw-bold mx-2" role="presentation">${data[i].service[j].name}</div>
    //                                 <div class="mx-2 item__description" role="presentation">
    //                                     ${data[i].service[j].description}
    //                                 </div>
    //                                 <div class="item__price " role="presentation">
    //                                     <div class="meta__price">
    //                                         <span class="meta__newPrice">${formattedMoney}</span>
    //                                         <span class="meta__oldPrice"></span>
    //                                     </div>
    //                                 </div>
    //                                 <div class="item_button fw-bold jqr-css" data-id="${data[i].service[j].id}" role="presentation">
    //                                 Chọn
    //                                 </div>
    //                             </div>
    //                                `
    //                     countImg++
    //                 }
    //                 category += service;
    //                 category += `</div></div></div>
    //                 <hr>
    //             `;
    //             }
    //             $('#jqr-category').append(category);
    //         },
    //         error: function (error) {
    //             console.error(error);
    //         }
    //     });
    // }

    // $(document).on('click', '.item_button', function () {
    //     let id = $(this).data('id');
    //     $(this).css({
    //         'background-color': '#91765a',
    //         'border': '1px solid #91765a',
    //         'color': '#fff',
    //     });
    //
    //     if (!arrayIDService.includes(id)) {
    //         arrayIDService.push(id);
    //     } else {
    //         let index = arrayIDService.indexOf(id);
    //         if (index !== -1) {
    //             arrayIDService.splice(index, 1);
    //         }
    //         $(this).css({
    //             'background-color': '#fff',
    //             'border': '1px solid #91765a',
    //             'color': '#000',
    //         });
    //     }
    //     // console.log(arrayIDService);
    //     countSelect = arrayIDService.length;
    //     if (countSelect === 0) {
    //         $('.jqr-clickService').css({
    //             'background-color': '#e8e8e8',
    //             'border': '1px solid #e8e8e8',
    //             'color': '#91765a',
    //         });
    //         $('.font-medium').html(`<div class="text-sm font-medium">Dịch vụ đã chọn: 0 dịch vụ</div>`)
    //         $('.jqr-clickService').html(`<span>Chọn dịch vụ</span>`);
    //     } else {
    //         $('.jqr-clickService').css({
    //             'background-color': '#91765a',
    //             'border': '1px solid #91765a',
    //             'color': '#fff',
    //         });
    //         $('.font-medium').html(`<div class="text-sm font-medium">Dịch vụ đã chọn: ${countSelect} dịch vụ</div>`);
    //         $('.jqr-clickService').html(`<span>Chọn ${countSelect} dịch vụ</span>`);
    //     }
    // })
});

