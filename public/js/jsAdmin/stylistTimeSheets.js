$(document).ready(function () {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    const btnShow = $('.jquery-btn-create');
    const btnCancel = $('.jquery-close');
    const formModal = $('#formModal');
    const actionMethod = $('input[name="actionMethod"]');

    const urlShow = '/api/get/stylistTimeSheets';
    const urlPost = '/api/post/stylistTimeSheets';
    const urlShowEdit = '/api/edit/stylistTimeSheets';
    const urlDelete = '/api/delete/stylistTimeSheets';
    const urlPut = '/api/put/stylistTimeSheets';
    const urlGetValue = '/api/get/getvalue';
    let idUpdate;

    // Điều khiển modal
    function showModal(action = true) {
        if (action) {
            $('.jquery-main-modal').show();
        } else {
            formModal[0].reset();
            $('#is_active').html(`
                <option selected value="1">Hoạt Động</option>
                <option value="0">Không Hoạt Động</option>
            `);
            setValue();
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
            update(idUpdate);
            update();
        } else {
            add();
            showModal(false);
        }
    })


    function loadTable() {
        $.ajax({
            url: urlShow,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                // console.log(data);
                $('#jquery-list').empty();
                data.map(item => {
                    $('#jquery-list').append(`
                        <tr>
                          <td>${item.id}</td>
                          <td>${item.stylist_id}</td>
                          <td>${item.timesheet_id}</td>
                          <td>${item.is_active}</td>
                          <td>${item.is_block}</td>
                          <td class="text-center">
                              <div class="btn-group dropdown">
                                  <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none "
                                     data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/General/Settings-2.svg--><svg
                                                     xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
                                          <g stroke="none" stroke-width="1" fill="none"
                                                     fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"
                                               fill="#8950fc"/>
                                          </g>
                                          </svg>
                                        </span>
                                  </a>
                                  <div class="dropdown-menu dropdown-menu-end">
                                        <button class="dropdown-item js-btn-update" data-id="${item.id}">
                                          Cập nhật
                                        </button>
                                      <button class="dropdown-item js-btn-delete" data-id="${item.id}">
                                          Xóa
                                      </button>
                                  </div>
                              </div>
                          </td>
                      </tr>`
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
        actionMethod.val('update')
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
            url: urlPost,
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
            url: urlDelete +'/' + idUpdate,
            method: 'DELETE',
            dataType: 'json',
            success: function (data) {
               loadTable();
               toastr['success']
               ('Dữ liệu đã được xóa thành công.');
            },
            error: function (error) {
                console.error(error);
            }
        });
    }

    function loadValueDetail(id) {
        $.ajax({
            url: urlShowEdit + '/' + id,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                let valueStylistTimeSheets = data.dataStylistTimeSheets;
                let valueStylist = data.dataStylist;
                let valueTimeSheet = data.dataTimeSheet;

                // Stylist
                let isStylist = `<select class="form-select" name="stylist_id" id="stylist_id">`
                let resultStylist = '';
                for (let i = 0; i < valueStylist.length; i++){
                    if (valueStylist[i].id === valueStylistTimeSheets.stylist_id){
                        resultStylist = 'selected';
                    }
                    else{
                        resultStylist = '';
                    }
                    isStylist+= `<option value="${valueStylist[i].id}" ${resultStylist}>${valueStylist[i].name}</option>`;
                }
                isStylist += `</select>`;

                //TimeSheet
                let isTimeSheet = `<select class="form-select" name="timesheet_id" id="timesheet_id">`
                let resultTimeSheet = '';
                for (let i = 0; i < valueTimeSheet.length; i++){
                    if (valueTimeSheet[i].id === valueStylistTimeSheets.timesheet_id){
                        resultTimeSheet = 'selected';
                    }
                    else{
                        resultTimeSheet = '';
                    }
                    isTimeSheet+= `<option value="${valueTimeSheet[i].id}" ${resultTimeSheet}>${valueTimeSheet[i].hour}:${valueTimeSheet[i].minutes}</option>`;
                }
                isTimeSheet += `</select>`;

                let is_activeSelect = `
                <label for="" class="form-label">Is_active</label>
                    <select class="form-control" name="is_active">
                `;
                let option = ['Không hoạt động','Hoạt động'];
                for (let i = 0; i < option.length; i++){
                    let selected = '';
                    if (valueStylistTimeSheets.is_active === 1){
                        selected = 'selected';
                    }
                    is_activeSelect += `<option value="${i}" ${selected}>${option[i]}</option>`;
                }

                is_activeSelect+= `</select>`

                $('.is_active').html(is_activeSelect);
                actionMethod.val('update');
                $('#stylist_id').html(isStylist);
                $('#timesheet_id').html(isTimeSheet);
                $('select[name="is_active"]').val(valueStylistTimeSheets.is_active);
                $('select[name="is_block"]').val(valueStylistTimeSheets.is_block);
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
            url: urlPut +'/' + idUpdate,
            method: 'post',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            dataType: 'json',
            success: function (data) {
                showModal(false);
                loadTable();
                toastr['success']('Cập nhật thành công');
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }

    function setValue() {
        $.ajax({
            url: urlGetValue,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                let valueStylist = data.dataStylist;
                let valueTimeSheet = data.dataTimeSheet;

                // Stylist
                let isStylist = `<select class="form-select" name="stylist_id" id="stylist_id">`;
                isStylist += `<option>Choose stylist</option>`
                for (let i = 0; i < valueStylist.length; i++){
                    isStylist += `<option value="${valueStylist[i].id}">${valueStylist[i].name}</option>`;
                }
                isStylist += `</select>`;

                //TimeSheet
                let isTimeSheet = `<select class="form-select" name="timesheet_id" id="timesheet_id">`;
                for (let i = 0; i < valueTimeSheet.length; i++){
                    isTimeSheet += `<option value="${valueTimeSheet[i].id}">${valueTimeSheet[i].hour}:${valueTimeSheet[i].minutes}</option>`;
                }
                isTimeSheet += `</select>`;

                let is_activeSelect = `
                <label for="" class="form-label">Is_active</label>
                    <select class="form-control" name="is_active">
                `;
                let option = ['Không hoạt động','Hoạt động'];
                for (let i = 0; i < option.length; i++){
                    is_activeSelect += `<option value="${i}">${option[i]}</option>`;
                }
                is_activeSelect+= `</select>`
                
                $('.is_active').html(is_activeSelect);
                $('#stylist_id').html(isStylist);
                $('#timesheet_id').html(isTimeSheet);

                $("#timesheet_id").selectize({ maxItems: 100 });
            },
            error: function (error) {
                console.error(error);
            },
        });
    }
    setValue();
});
