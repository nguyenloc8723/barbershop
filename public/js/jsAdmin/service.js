$(document).ready(function () {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    const btnCancel = $('.jquery-btn-cancel');
    const btnShowModal = $('.query-btn-show-modal');
    const btnUpdate = $('.js-btn-update');
    const fileInput = $('#service-image');
    const imgContainer = $('.selected-images');
    let formModal = $('#formModalService');
    const actionMethod = $('input[name="actionMethod"]');

    // mặc định ẩn bảng modal
    // $('.jquery-main-modal').hide();



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
            add();
            showModal(false);
        }
    })

    function add() {

        let formData = new FormData(formModal[0]);

        $.ajax({
            url: '/api/post/service',
            method: 'POST',
            data: formData,
            processData: false, // Set false để ngăn jQuery xử lý dữ liệu FormData
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            },
            success: function (data){
                console.log(data);
            },
            error: function (error) {
                console.error(error);
            }
        });
    }

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
        $('#categoryService').val(data.combo);

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
});
