<div class="modal-dialog modal-xl modal-simple modal-dialog-centered modal-add-new-role">
{{--    <div class="modal-content">--}}
{{--        <div class="modal-header bg-light">--}}
{{--            <h4 class="modal-title" id="myCenterModalLabel">Thêm dịch vụ</h4>--}}
{{--            <button type="button" class="btn-close jquery-btn-cancel"--}}
{{--                    aria-hidden="true"></button>--}}
{{--        </div>--}}
{{--        <div class="modal-body">--}}
{{--            <form class="d-flex justify-content-between flex-wrap"--}}
{{--                  id="formModal" action="" >--}}

{{--                <label for="name">Name</label>--}}
{{--                <input class="form-control jqr_roleName" name="name" type="text" >--}}

{{--                <label for="guard_name">guard name</label>--}}
{{--                <input class="form-control jqr_roleGuardName" type="text" name="guard_name" value="web" disabled>--}}

{{--                <label for="name">Name</label>--}}
{{--                <div class="">--}}
{{--                    @foreach(config('permissions') as $key => $value)--}}
{{--                        <input class="jqr-checkbox" type="checkbox"--}}
{{--                               name="permissions[]"--}}
{{--                               value="{{$key}}"--}}
{{--                               id="{{$key}}">--}}
{{--                        <label for="{{$key}}">{{$value}}</label>--}}
{{--                    @endforeach--}}
{{--                </div>--}}

{{--                <input type="hidden" name="actionMethod">--}}

{{--                <div class="w-100 text-center">--}}
{{--                    <button class="btn btn-success waves-effect waves-light"--}}
{{--                    >Save--}}
{{--                    </button>--}}
{{--                    <button type="button" class="btn btn-danger waves-effect waves-light ms-1 jquery-btn-cancel"--}}
{{--                    >Cancel--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}


    <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
            <button type="button" class="btn-close role-css jquery-btn-cancel" aria-hidden="true"></button>
            <div class="text-center mb-4">
                <h3 class="role-title">Add New Role</h3>
                <p>Set role permissions</p>
            </div>
            <!-- Add role form -->
            <form id="addRoleForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" onsubmit="return false" novalidate="novalidate">
                <div class="col-12 mb-4 fv-plugins-icon-container">
                    <label class="form-label" for="modalRoleName">Role Name</label>
                    <input type="text" id="modalRoleName" name="name" class="form-control jqr_roleName" placeholder="Enter a role name" tabindex="-1" spellcheck="false" data-ms-editor="true">
                    <label class="form-label" for="modalRoleName">Guard Name</label>
                    <input type="text" id="modalRoleName" name="guard_name" value="web" class="form-control jqr_roleGuardName"tabindex="-1" spellcheck="false" data-ms-editor="true" disabled>

                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                <div class="col-12">
                    <h4>Role Permissions</h4>
                    <!-- Permission table -->
                    <div class="table-responsive">
                        <table class="table table-flush-spacing">
                            <tbody>
                            <tr>
                                <td class="text-nowrap fw-medium">Administrator Access <i class="bx bx-info-circle bx-xs" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Allows a full access to the system" data-bs-original-title="Allows a full access to the system"></i></td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="selectAll">
                                        <label class="form-check-label" for="selectAll">
                                            Select All
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            @foreach(config('permissions') as $key => $permissions)
                            <tr>
                                <td class="text-nowrap fw-medium">Quản lí {{$key}}</td>
                                <td>
                                    <div class="d-flex">
                                            @foreach($permissions as $keys => $value)
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="jqr-checkbox" type="checkbox"
                                                           name="permissions[]"
                                                           value="{{$keys}}"
                                                           id="{{$keys}}">
                                                    <label for="{{$keys}}">{{$value}}</label>
                                                </div>
                                            @endforeach
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Permission table -->
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                    <button type="button" class="btn btn-danger btn-label-secondary jquery-btn-cancel">Cancel</button>
                </div>
                <input type="hidden" name="actionMethod">
            </form>
            <!--/ Add role form -->
        </div>
    </div>

</div>






