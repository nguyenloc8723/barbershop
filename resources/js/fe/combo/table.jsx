import React from "react";

function Table() {
    return (
        <div className="row">
            <div className="col-12">
                <div className="card">
                    <div className="card-body">
                        {/*<h4 className="mt-0 header-title">Default Example</h4>*/}


                        <table id="datatable" className="table table-bordered dt-responsive table-responsive nowrap">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td>Brenden Wagner</td>
                                <td>Software Engineer</td>
                                <td>San Francisco</td>
                                <td>28</td>
                                <td>2011/06/07</td>
                                <td>$206,850</td>
                                <td>
                                    <a href="" className="btn btn-danger">Delete</a>
                                    <a href="" className="btn btn-primary ms-1">Update</a>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    );
}

export default Table
