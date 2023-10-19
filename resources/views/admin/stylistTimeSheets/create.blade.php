

<div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title" id="myCenterModalLabel">Thêm danh mục</h4>

                </div>
                <div class="modal-body">
                    <form class="" id="formModal">

                        <div class="">
                            <div class="mb-3">
                                <label class="form-label">ID Stylist</label>
                                <select name="stylist_id" class="form-select">
                                    <option selected>Choose stylist</option>
                                    <option value="0">1 - Đinh Tuấn Anh</option>
                                    <option value="1">2 - Luyện Huy Hướng</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">ID Time-Sheets</label>
                                <select name="timesheet_id" class="form-select">
                                    <option selected>Choose time sheet</option>
                                    <option value="0">7:00</option>
                                    <option value="1">7:20</option>
                                    <option value="2">7:40</option>
                                    <option value="3">8:00</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Active</label>
                                <select name="is_active" class="form-select">
                                    <option value="0">Active</option>
                                    <option value="1">Inactive</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Block</label>
                                <select name="is_block" class="form-select">
                                    <option value="0">Block</option>
                                    <option value="1">Unblock</option>
                                </select>
                            </div>
                            <div class="mb-3 is_active">

                            </div>
                        </div>
                        <input type="hidden" name="actionMethod">

                        <div class="w-100 text-center">
                            <button type="submit" class="btn btn-success waves-effect waves-light">Save </button>
                            <button type="button" class="btn btn-danger waves-effect waves-light ms-1 jquery-close">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>




