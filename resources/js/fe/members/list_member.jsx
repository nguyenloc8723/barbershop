import React from "react";

function List_member() {
    return (
        <>
            <div className="row">
                <div className="col-12">
                    <div className="card">
                        <div className="card-body">
                            <div className="row justify-content-between">
                                <div className="col-md-4">
                                    <div className="mt-3 mt-md-0">
                                        <button type="button" className="btn btn-success waves-effect waves-light"
                                                data-bs-toggle="modal" data-bs-target="#custom-modal"><i
                                            className="mdi mdi-plus-circle me-1"></i> Add contact
                                        </button>
                                    </div>
                                </div>
                                <div className="col-md-8">
                                    <form className="d-flex flex-wrap align-items-center justify-content-sm-end">
                                        <label htmlFor="status-select" className="me-2">Sort By</label>
                                        <div className="me-sm-2">
                                            <select className="form-select my-1 my-md-0" id="status-select"
                                                    defaultValue="all">
                                                <option value="all">All</option>
                                                <option value="1">Name</option>
                                                <option value="2">Post</option>
                                                <option value="3">Followers</option>
                                            </select>
                                        </div>
                                        <label htmlFor="inputPassword2" className="visually-hidden">Search</label>

                                        <div>
                                            <input type="search" className="form-control my-1 my-md-0"
                                                   id="inputPassword2"
                                                   placeholder="Search..."/>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div className="row">
                <div className="col-xl-4">
                    <div className="card">
                        <div className="text-center card-body">
                            <div className="dropdown float-end">
                                <a href="#" className="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    <i className="mdi mdi-dots-vertical"></i>
                                </a>
                                <div className="dropdown-menu dropdown-menu-end">

                                    <a href="#" className="dropdown-item">Action</a>

                                    <a href="#" className="dropdown-item">Another action</a>

                                    <a href="#" className="dropdown-item">Something else</a>

                                    <a href="#" className="dropdown-item">Separated link</a>
                                </div>
                            </div>
                            <div>
                                <img src={"https://kenh14cdn.com/thumb_w/660/2020/7/16/1-15948998699171250460902.jpg"}
                                     className="rounded-circle avatar-xl img-thumbnail mb-2" alt="profile-image"/>

                                <p className="text-muted font-13 mb-3">
                                    Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                                    1500s, when an unknown printer took a galley of type.
                                </p>

                                <div className="text-start">
                                    <p className="text-muted font-13"><strong>Full Name :</strong> <span
                                        className="ms-2">Tuấn Anh</span></p>

                                    <p className="text-muted font-13"><strong>Mobile :</strong><span className="ms-2">0342 599 803</span>
                                    </p>

                                    <p className="text-muted font-13"><strong>Email :</strong> <span
                                        className="ms-2">nobita1271999@gmail.com</span></p>

                                    <p className="text-muted font-13"><strong>Location :</strong> <span
                                        className="ms-2">Việt Nam</span></p>
                                </div>

                                <button type="button"
                                        className="btn btn-primary rounded-pill waves-effect waves-light">Send Message
                                </button>
                                <button type="button"
                                        className="btn btn-danger rounded-pill waves-effect waves-light ms-1">Delete
                                    member
                                </button>
                            </div>
                        </div>
                    </div>


                </div>

                <div className="col-xl-4">
                    <div className="card">
                        <div className="text-center card-body">
                            <div className="dropdown float-end">
                                <a href="#" className="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    <i className="mdi mdi-dots-vertical"></i>
                                </a>
                                <div className="dropdown-menu dropdown-menu-end">

                                    <a href="" className="dropdown-item">Action</a>

                                    <a href="" className="dropdown-item">Another action</a>

                                    <a href="" className="dropdown-item">Something else</a>

                                    <a href="" className="dropdown-item">Separated link</a>
                                </div>
                            </div>
                            <div>
                                <img
                                    src={"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSwYeOD0v49xXGRg4F6J0V6mcyuPbxkXIwF788uRq1VSWAU8I1BRN3IE6agEVCiylqXCOk&usqp=CAU"}
                                    className="rounded-circle avatar-xl img-thumbnail mb-2" alt="profile-image"/>

                                <p className="text-muted font-13 mb-3">
                                    Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                                    1500s, when an unknown printer took a galley of type.
                                </p>

                                <div className="text-start">
                                    <p className="text-muted font-13"><strong>Full Name :</strong> <span
                                        className="ms-2">Johnathan Deo</span></p>

                                    <p className="text-muted font-13"><strong>Mobile :</strong><span className="ms-2">(123) 123 1234</span>
                                    </p>

                                    <p className="text-muted font-13"><strong>Email :</strong> <span
                                        className="ms-2">nobita1271999@gmail.com</span></p>

                                    <p className="text-muted font-13"><strong>Location :</strong> <span
                                        className="ms-2">Việt Nam</span></p>
                                </div>

                                <button type="button"
                                        className="btn btn-primary rounded-pill waves-effect waves-light">Send Message
                                </button>
                            </div>

                        </div>
                    </div>
                </div>

                <div className="col-xl-4">
                    <div className="card">
                        <div className="text-center card-body">
                            <div className="dropdown float-end">
                                <a href="#" className="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    <i className="mdi mdi-dots-vertical"></i>
                                </a>
                                <div className="dropdown-menu dropdown-menu-end">

                                    <a href="" className="dropdown-item">Action</a>

                                    <a href="" className="dropdown-item">Another action</a>

                                    <a href="" className="dropdown-item">Something else</a>

                                    <a href="" className="dropdown-item">Separated link</a>
                                </div>
                            </div>
                            <div>
                                <img src={"https://haycafe.vn/wp-content/uploads/2022/02/Anh-gai-xinh-de-thuong.jpg"}
                                     className="rounded-circle avatar-xl img-thumbnail mb-2" alt="profile-image"/>

                                <p className="text-muted font-13 mb-3">
                                    Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                                    1500s, when an unknown printer took a galley of type.
                                </p>

                                <div className="text-start">
                                    <p className="text-muted font-13"><strong>Full Name :</strong> <span
                                        className="ms-2">Johnathan Deo</span></p>

                                    <p className="text-muted font-13"><strong>Mobile :</strong><span className="ms-2">(123) 123 1234</span>
                                    </p>

                                    <p className="text-muted font-13"><strong>Email :</strong> <span
                                        className="ms-2">coderthemes@gmail.com</span></p>

                                    <p className="text-muted font-13"><strong>Location :</strong> <span
                                        className="ms-2">USA</span></p>
                                </div>

                                <button type="button"
                                        className="btn btn-primary rounded-pill waves-effect waves-light">Send Message
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            {/*Modal*/}
            <div className="modal fade" id="custom-modal" tabIndex="-1" role="dialog" aria-hidden="true">
                <div className="modal-dialog modal-dialog-centered">
                    <div className="modal-content">
                        <div className="modal-header bg-light">
                            <h4 className="modal-title" id="myCenterModalLabel">Thêm Nhân viên</h4>
                            <button type="button" className="btn-close" data-bs-dismiss="modal"
                                    aria-hidden="true"></button>
                        </div>
                        <div className="modal-body">
                            <form>
                                <div className="mb-3">
                                    <label form="name" className="form-label">Họ và tên</label>
                                    <input type="text" className="form-control" id="name" placeholder="Enter name"/>
                                </div>
                                <div className="mb-3">
                                    <label form="position" className="form-label">Chức vụ</label>
                                    <input type="text" className="form-control" id="position"
                                           placeholder="Enter position"/>
                                </div>

                                <div className="mb-3">
                                    <label form="exampleInputEmail1" className="form-label">Số điện thoại</label>
                                    <input type="email" className="form-control" id="exampleInputEmail1"
                                           placeholder="Enter email"/>
                                </div>

                                <div className="mb-3">
                                    <label form="exampleInputEmail1" className="form-label">Avatar</label>
                                    <input type="file" className="form-control" id="file" placeholder="Avatar"/>
                                </div>

                                <button type="submit" className="btn btn-success waves-effect waves-light"
                                        data-bs-dismiss="modal">Save
                                </button>
                                <button type="button" className="btn btn-danger waves-effect waves-light ms-1"
                                        data-bs-dismiss="modal">Cancel
                                </button>
                            </form>
                        </div>
                    </div>
                    {/*modal-content*/}
                </div>
                {/*modal-dialog*/}
            </div>
            {/*/.modal*/}
        </>
    )
        ;
}

export default List_member
