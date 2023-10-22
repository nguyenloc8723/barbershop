document.addEventListener("DOMContentLoaded", function () {
    const fileInput = document.getElementById("file-input");
    const imageContainer = document.getElementById("image-container");

    fileInput.addEventListener("change", function () {
        const selectedFiles = fileInput.files;

        if (selectedFiles.length > 0) {
            // Xóa hết các hình ảnh trước đó
            imageContainer.innerHTML = "";

            for (let i = 0; i < selectedFiles.length; i++) {
                const file = selectedFiles[i];

                // Kiểm tra xem tệp đã chọn có phải là hình ảnh không (kiểm tra định dạng file)
                if (validImageType(file.type)) {
                    const reader = new FileReader();

                    reader.onload = function (event) {
                        // Tạo phần tử hình ảnh và hiển thị lên trình duyệt
                        const img = document.createElement("img");
                        img.src = event.target.result;
                        img.className = "image-preview";
                        imageContainer.appendChild(img);
                    };

                    reader.readAsDataURL(file);
                } else {
                    alert("Tệp " + file.name + " không phải là hình ảnh hợp lệ. Vui lòng chọn một tệp hình ảnh (jpg, jpeg, png, gif, etc.)");
                }
            }
        }
    });

    function validImageType(fileType) {
        // Danh sách các định dạng hình ảnh hợp lệ
        const validImageTypes = ["image/jpeg", "image/jpg", "image/png", "image/gif"];

        return validImageTypes.includes(fileType);
    }


});

document.getElementById("cancelButton").addEventListener("click", function () {
    window.location.href = "http://fpt-barber-shop.test/admin/booking_blade/index"; // Quay trở lại trang trước
    // Hoặc bạn có thể thay thế bằng window.location.href = "URL của trang bạn muốn chuyển đến";
});

document.getElementById("sa-warning").addEventListener("click", function () {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#28bb4b",
        cancelButtonColor: "#f34e4e",
        confirmButtonText: "Yes, delete it!"
    }).then(function (e) {
        e.value && Swal.fire("Deleted!", "Your file has been deleted.", "success")
    })
})
