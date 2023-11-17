
<div class="modal-dialog modal-full-width">
    <div class="modal-content">
        <div class="modal-header bg-light text-center">
            <h4>
                Trạng thái: @if($data->status == 1)
                    <span
                        class="badge bg-danger" >Chờ xác nhận
                        </span>
                @endif
                @if($data->status == 2)
                    <span
                        class="badge bg-warning" >Đang chờ cắt
                        </span>
                @endif
                @if($data->status == 3)
                    <span
                        class="badge bg-success" >Đã cắt
                        </span>
                @endif
            </h4>
            <button type="button" class="btn-close jquery-btn-cancel"
                    aria-hidden="true"></button>
        </div>
        <div class="modal-body">
            <form class="d-flex justify-content-between flex-wrap" method="post"
                  id="formModalBooking" action="{{route('booking_blade.detail.post', $data->id)}}" enctype="multipart/form-data">
                  @csrf
                <div class="col-xl-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên thợ</label>
                        <select class="form-select" id="" name="stylist_id">
                            @foreach ($stylists as $item)
                                <option value="{{$item->id}}"
                                    @if ($item->id === $data->stylist_id)
                                    selected
                                    @else

                                    @endif>{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Ngày</label>
                        <input type="date" class="form-control" name="date" id="date" value="{{$data->date}}" />
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Thời gian</label>
                        <select class="form-select" id="" name="timeSheet_id">
                            @foreach ($timeSheets as $item)
                                <option value="{{$item->id}}"
                                    @if ($item->id === $data->timesheet_id)
                                    selected
                                    @else

                                    @endif>{{$item->hour}}:{{ $item->minutes }}</option>
                            @endforeach
                        </select>
                    </div>
{{--                    <div class="mb-3">--}}
{{--                        <label for="name" class="form-label">Yêu cầu đặc biệt</label>--}}
{{--                        <input type="text" class="form-control" name="spcrq" id="spcrq" value="{{$data->special_requirement == '' ? "Không có yêu cầu đặc biệt" : $data->special_requirement}}"/>--}}
{{--                    </div>--}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Yêu cầu tư vấn</label>
                        <select class="form-select" id=""name="is_consultant">
                            <option value="1" {{$data->is_consultant == 1 ? "selected" : "" }}>Có</option>
                            <option value="0" {{$data->is_consultant == 0 ? "selected" : "" }}>Không</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Chụp ảnh sau khi cắt để làm mẫu cho lần sau</label>
                        <select class="form-select" id="" name="is_accept_take_a_photo">
                            <option value="1" {{$data->is_accept_take_a_photo == 1 ? "selected" : "" }}>Có</option>
                            <option value="0" {{$data->is_accept_take_a_photo == 0 ? "selected" : "" }}>Không</option>
                        </select>
                    </div>
                </div>

                    <div class="col-xl-6 p-3">
                        <div class="row text-center">
                            <input type="file" name="imageFile[]" id="service-image" multiple/>
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
                            data-bs-dismiss="modal">Cập nhật
                    </button>
                    <button type="button" class="btn btn-danger waves-effect waves-light ms-1 jquery-btn-cancel"
                    >Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


