<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header bg-light">
            <h4 class="modal-title" id="myCenterModalLabel">Thêm danh mục</h4>
            <button type="button" class="btn-close jquery-close"
                    aria-hidden="true"></button>
        </div>
        <div class="modal-body">
            <form class="" id="formModal">
                <div class="">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên danh mục</label>
                        <input type="text" class="form-control" name="category"/>
                    </div>

                </div>
                <input type="hidden" name="actionMethod">

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
                            >Save
                    </button>
                    <button type="button" class="btn btn-danger waves-effect waves-light ms-1 jquery-close"
                    >Cancel
                    </button>
                </div>


            </form>
        </div>
    </div>
</div>
