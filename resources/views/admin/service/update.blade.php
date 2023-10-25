
<div class="modal-dialog modal-full-width">
    <div class="modal-content">
        <div class="modal-header bg-light">
            <h4 class="modal-title" id="myCenterModalLabel">Cập nhật Combo</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-hidden="true"></button>
        </div>
        <div class="modal-body">
            <form class="d-flex justify-content-between flex-wrap">
                <div class="col-xl-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên dịch vụ</label>
                        <input type="text" class="form-control" id="service" value="Tuấn Anh"/>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Giá dịch vụ</label>
                        <input type="text" class="form-control" id="price" value="không có :)"/>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">slug</label>
                        <input type="text" class="form-control" id="slug" value="tuan-anh"/>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">???</label>
                        <input type="text" class="form-control" id="??" value="??"/>
                    </div>

                    @php
                        $segment = request()->segment(2);
                    @endphp
                    @if($segment == 'service')
                        <div class="mb-3">
                            <label for="name" class="form-label">Combo</label>
                            <select name="" class="form-control">
                                <option>Chọn combo của bạn</option>
                                <option>Tuấn Anh đẹp zai số 2 =)))</option>
                                <option>Nhưng khum có ny :(((</option>
                            </select>
                        </div>
                    @endif

                </div>


                <div class="col-xl-6 p-3">
                    <div class="row text-center">
                        <input type="file" name="files[]" id="service-image" multiple/>
                        <label for="service-image" style="font-size: 20px">Tải ảnh lên <i
                                class="upload font-22"></i></label>
                        <span class="show-error text-danger" data-name="files"></span>
                    </div>
                    <input type="hidden" name="actionMethod">
                    <div class="selected-images">


                    </div>
                </div>


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


