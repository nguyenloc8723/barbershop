<div class="modal-dialog modal-full-width">
    <div class="modal-content">
        <div class="modal-header bg-light">
            <h4 class="modal-title" id="myCenterModalLabel">Thêm dịch vụ</h4>
            <button type="button" class="btn-close jquery-btn-cancel"
                    aria-hidden="true"></button>
        </div>
        <div class="modal-body">
            <form class="d-flex justify-content-between flex-wrap"
                  id="formModal" action="" >

                <label for="name">Name</label>
                <input class="form-control jqr_roleName" name="name" type="text" >

                <label for="guard_name">guard name</label>
                <input class="form-control" type="text" name="guard_name" value="web" disabled>

                <label for="name">Name</label>
                <div class="">
                    @foreach(config('permissions') as $key => $value)
                        <input class="jqr-checkbox" type="checkbox"
                               name="permissions[]"
                               value="{{$key}}"
                               id="{{$key}}">
                        <label for="{{$key}}">{{$value}}</label>
                    @endforeach
                </div>

                <input type="hidden" name="actionMethod">

                <div class="w-100 text-center">
                    <button class="btn btn-success waves-effect waves-light"
                    >Save
                    </button>
                    <button type="button" class="btn btn-danger waves-effect waves-light ms-1 jquery-btn-cancel"
                    >Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
