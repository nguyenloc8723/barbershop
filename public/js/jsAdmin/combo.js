$(document).ready(function (){
    const btnShow = $('.jquery-btn-create');
    const btnCancel = $('.jquery-close');
    const formModal = $('#formModal');
    const actionMethod = $('input[name="actionMethod"]');
    const btnUpdate = $('.js-btn-update');

    // Điều khiển modal
    function showModal(action = true) {
        if (action){
            $('.jquery-main-modal').show();
        }else {
            formModal[0].reset();
            actionMethod.val('');
            $('.jquery-main-modal').hide();
        }
    }
    btnShow.on('click', showModal);
    btnCancel.on('click',function (){
        showModal(false)
    });

    // hành động khi click save
    formModal.on('submit', function (e){
        e.preventDefault();
        if (actionMethod.val() === 'update'){
            console.log('update');
            showModal(false);
        }else {
            console.log('add');
            showModal(false);
        }
    })

    btnUpdate.on('click', function (){
        showDetail();
    })

    function showDetail() {
        actionMethod.val('update');
        $('input[name="combo"]').val('Tuấn Anh');
        showModal();
    }

});
