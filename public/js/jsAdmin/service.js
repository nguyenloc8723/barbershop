$(document).ready(function () {
    // alert('Quá buồn luôn')
    const btnCancel = $('.jquery-btn-cancel');
    const btnShowModal = $('.query-btn-show-modal');
    const btnUpdate = $('.js-btn-update');
    const fileInput = $('#service-image');
    const imgContainer = $('.selected-images');
    const formModal = $('#formModal');
    const actionMethod = $('input[name="actionMethod"]');

    // mặc định ẩn bảng modal
    // $('.jquery-main-modal').hide();

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

    function showModal(action = true) {
        if (action) {
            $('.jquery-main-modal').show()
        } else {
            formModal[0].reset();
            imgContainer.html('');
            actionMethod.val('');
            $('.jquery-main-modal').hide()
        }
    }


    btnCancel.on('click', function () {
        showModal(false);
    });
    btnShowModal.on('click', showModal);


    formModal.on('submit', function (e) {
        e.preventDefault();
        if (actionMethod.val() === 'update') {
            update();
            showModal(false);
        } else {
            console.log("đây sẽ là hàm add");
            showModal(false);
        }
    })

    function getDetail(id) {
        // call ajax get value detail
        // dùng tạm dữ liệu fake rồi mấy nữa call API
        const data = {
            name: "cắt tóc",
            price: "10000",
            slug: 'cat-toc',
            v1: "???",
            combo: "1",
            avatar: ["be/img/user-13.jpg", "be/img/user-14.jpg"],
        };
        $('#service').val(data.name);
        $('#price').val(data.price);
        $('#slug').val(data.slug);
        $('#combo').val(data.combo);

        imgContainer.append(`
            <div class="item-images">
            <img src="/public/${data.avatar[0]}"  alt=""/>
            </div>
        `)
        showModal()
    }


    function update() {
        // call ajax
        console.log("đây sẽ là hàm update");
    }

    btnUpdate.on('click', function () {
        actionMethod.val('update')
        getDetail();
    })
});
