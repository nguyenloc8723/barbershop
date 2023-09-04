$(document).ready(function () {
    alert('Quá buồn luôn')
    const btnCancel = $('.jquery-btn-cancel');
    const btnShowModal = $('.query-btn-show-modal');

    const fileInput = $('#service-image');
    const imgContainer = $('.selected-images');

    // mặc định ẩn bảng modal
    $('.jq-main-modal').hide();

    // code code hiển thị ảnh trong modal crud
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
                    <img src="${imgUrl}"  alt=""/>
                    </div>
                `);
            }
        }
    })


    btnCancel.on('click', function () {
        $('.jq-main-modal').hide()
    });
    btnShowModal.on('click', function (){
        $('.jq-main-modal').show()
    });
});
