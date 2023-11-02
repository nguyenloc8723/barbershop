$(document).ready(function () {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    const btnShow = $('.jquery-btn-create');
    const btnCancel = $('.jquery-close');
    const formModal = $('#formModal');
    const actionMethod = $('input[name="actionMethod"]');
    const baseUrl = '/api/stylist';
    const fileInput = $('#image');
    const imgContainer = $('.selected-images');
    const btnUpdate = $('.js-btn-update');
    let idUpdate;
    $('#example').DataTable({
        ajax: baseUrl,
    });

    // Điều khiển modal
    function showModal(action = true) {
        if (action) {
            $('.jquery-main-modal').show();
        } else {
            formModal[0].reset();
            imgContainer.empty();
            $('.is_active').empty();
            actionMethod.val('');
            $('.jquery-main-modal').hide();
        }
    }

    btnShow.on('click', showModal);
    btnCancel.on('click', function () {
        showModal(false);

    });

    // hành động khi click save
    formModal.on('submit', function (e) {
        e.preventDefault();
        if (actionMethod.val() === 'update') {
            update();
        } else {
            add();
        }
        showModal(false);
    })


    function loadTable() {
        $.ajax({
            url: baseUrl,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                // console.log(data);
                $('#jquery-list').empty();
                data.map(item => {
                    let checked = "";
                    if (item.excerpt == null){
                        checked = "Không có mô tả nào về nhân viên này."
                    }else{
                        checked = item.excerpt;
                    }
                    $('#jquery-list').append(`
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="text-center card-body">
                                <div>
                                    <img src="/storage/images/${item.image}" class="rounded-circle avatar-xl img-thumbnail mb-2" alt="profile-image">

                                    <p class="text-muted font-13 mb-3">
                                        ${checked}
                                    </p>

                                    <div class="text-start">
                                        <p class="text-muted font-13"><strong>Full Name :</strong> <span class="ms-2">${item.name}</span></p>

                                        <p class="text-muted font-13"><strong>Mobile :</strong><span class="ms-2">${item.phone}</span></p>

                                        <p class="text-muted font-13"><strong>Location :</strong> <span class="ms-2">Hà Nội, Việt Nam</span></p>
                                    </div>
                                    <button type="button" class="btn btn-primary rounded-pill waves-effect waves-light js-btn-update" data-id="${item.id}">Cập nhật</button>
                                    <button type="button" class="btn btn-danger rounded-pill waves-effect waves-light js-btn-delete" data-id="${item.id}">Xóa</button>
                                </div>
                            </div>
                        </div>
                    </div> `
                    );
                })
            },
            error: function (error) {
            }
        });
    }

    loadTable();


    $(document).on('click','.js-btn-update', function (){
        let itemId = $(this).data('id');
        idUpdate = itemId;
        loadValueDetail(itemId);
    });
    $(document).on('click','.js-btn-delete', function (){
        if (confirm('Bạn có chắc chắn muốn xóa ?')){
            idUpdate = $(this).data('id');
            destroy();
        }
    });



    function add() {
        let formData = new FormData(formModal[0]);
        $.ajax({
            url: baseUrl,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            dataType: 'json',
            success: function (data) {
                loadTable();
                toastr['success']('Thêm mới dữ liệu thành công');
            },
            error: function (error) {
                console.error(error);
            }
        });
    }

    function destroy() {
        $.ajax({
            url: baseUrl +'/' + idUpdate,
            method: 'DELETE',
            dataType: 'json',
            success: function (data) {
               loadTable();
               toastr['success']
               ('Dữ liệu đã được xóa.');
            },
            error: function (error) {
                console.error(error);
            }
        });
    }
    function loadValueDetail(id) {
        $.ajax({
            url: baseUrl + '/' + id,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                let is_activeSelect = `
                <label for="" class="form-label">Is_active</label>
                    <select class="form-control" name="is_active">
                `;
                let option = ['Không hoạt động','Hoạt động'];
                for (let i = 0; i < option.length; i++){
                    let selected = '';
                    if (data.is_active === 1){
                        selected = 'selected';
                    }
                    else{
                        selected = '';
                    }
                    is_activeSelect += `<option value="${i}" ${selected}>${option[i]}</option>`;
                }

                is_activeSelect+= `</select>`;

                let isImage= `
                        <div class="item-images">
                        <img src="/storage/images/${data.image}"  alt=""/>
                        </div>
                    `;

                $('.is_active').html(is_activeSelect);
                actionMethod.val('update');
                $('input[name="name"]').val(data.name);
                $('input[name="phone"]').val(data.phone);
                $('input[name="excerpt"]').val(data.excerpt);
                imgContainer.html(isImage);
                showModal();
            },
            error: function (xhr, status, error) {

                console.error(error);
            }
        });
    }

    function update() {
        let formData = new FormData(formModal[0]);
        $.ajax({
            url: baseUrl +'/' + idUpdate,
            method: 'put',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            dataType: 'json',
            success: function (data) {
                //console.log(data);
                showModal(false)
                loadTable();
                toastr['success']('Cập nhật thành công');
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    };

    fileInput.slideUp();
    fileInput.on('change', function () {
        const file = this.files[0]; // Lấy tệp ảnh đầu tiên

        if (file) {
          const reader = new FileReader();
          reader.readAsDataURL(file);

          reader.onload = function (e) {
            const imgUrl = e.target.result;
            imgContainer.html(`
              <div class="item-images">
                <img src="${imgUrl}" alt=""/>
              </div>
            `);
          };
        }
      });
});
