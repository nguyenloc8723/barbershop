
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header bg-light">
            <h4 class="modal-title" id="myCenterModalLabel">Thêm Combo</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-hidden="true"></button>
        </div>
        <div class="modal-body">
            <form class="">
                <div class="">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên combo</label>
                        <input type="text" class="form-control" id="combo" />
                    </div>

                </div>



{{--                <div class="col-xl-6 p-3">--}}
{{--                    <div class="row text-center">--}}
{{--                        <input type="file" name="files[]" id="product-image" multiple/>--}}
{{--                        <label for="product-image" style="font-size: 20px">Tải ảnh lên <i--}}
{{--                                class="upload font-22"></i></label>--}}
{{--                        <span class="show-error text-danger" data-name="files"></span>--}}
{{--                    </div>--}}
{{--                    <input type="hidden" name="actionMethod">--}}
{{--                    <div class="selected-images">--}}


{{--                    </div>--}}
{{--                </div>--}}


                <div class="w-100 text-center">
                    <button type="submit" class="btn btn-success waves-effect waves-light"
                            data-bs-dismiss="modal">Save
                    </button>
                    <button type="button" class="btn btn-danger waves-effect waves-light ms-1"
                            data-bs-dismiss="modal">Cancel
                    </button>
                </div>


            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('product-image').style.display = "none";
</script>
