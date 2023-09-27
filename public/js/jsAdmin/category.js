$(document).ready(function (){
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    const btnShow = $('.jquery-btn-create');
    const btnCancel = $('.jquery-close');
    const formModal = $('#formModal');
    const actionMethod = $('input[name="actionMethod"]');
    const btnUpdate = $('.js-btn-update');
    let idUpdate;

    // Điều khiển modal
    // function showModal(action = true) {
    //     if (action){
    //         $('.jquery-main-modal').show();
    //     }else {
    //         formModal[0].reset();
    //         actionMethod.val('');
    //         $('.jquery-main-modal').hide();
    //     }
    // }
    // btnShow.on('click', showModal);
    // btnCancel.on('click',function (){
    //     showModal(false)
    // });

    // hành động khi click save
    // formModal.on('submit', function (e){
    //     e.preventDefault();
    //     if (actionMethod.val() === 'update'){
    //         console.log('update');
    //         update();
    //         showModal(false);
    //     }else {
    //         // add()
    //     }
    // })

    // btnUpdate.on('click', function (){
    //     let itemId = $(this).data('id');
    //     idUpdate = itemId;
    //     loadValueDetai(itemId);
    // })



    // function loadValueDetai(id){
    //     $.ajax({
    //         url: 'get-data/' + id,
    //         method: 'GET',
    //         dataType: 'json',
    //         success: function(data) {
    //             $('.is_active').append(`
    //                 <label for="is_active" class="form-label">Is_active</label>
    //                 <select class="form-control" name="is_active" id="is_active">
    //                     <option value="1">Hoạt động</option>
    //                     <option value="0">Không hoạt động</option>
    //                 </select>
    //             `);
    //             actionMethod.val('update');
    //             $('input[name="name"]').val(data.name);
    //             showModal();
    //         },
    //         error: function(xhr, status, error) {
    //
    //             console.error(error);
    //         }
    //     });
    // }

    // function update(){
    //     let formData = new FormData(formModal[0]);
    //     // console.log(formData);
    //     formData.delete('actionMethod');
    //     $.ajax({
    //         url: 'save-data/' + idUpdate,
    //         method: 'POST',
    //         data: formData,
    //         headers: {
    //             'X-CSRF-TOKEN': csrfToken
    //         },
    //         processData: false,
    //         contentType: false,
    //         dataType: 'json',
    //         success: function(data) {
    //             showModal(false)
    //             console.log(data)
    //         },
    //         error: function(xhr, status, error) {
    //
    //             console.error(error);
    //         }
    //     });
    // }

});
