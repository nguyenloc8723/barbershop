import React from "react";

function Dashboard() {
    return (
        <div className="row">
            <div className="col-xl-4">
                <div className="card">
                    <div className="card-body">
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

                        <h4 className="header-title mt-0">Daily Sales</h4>

                        <div className="widget-chart text-center">
                            <div id="morris-donut-example" dir="ltr" style={{ height: '245px' }}
                                 className="morris-chart"></div>
                            <ul className="list-inline chart-detail-list mb-0">
                                <li className="list-inline-item">
                                    <h5 style={{ color: '#ff8acc' }}><i className="fa fa-circle me-1"></i>Series A</h5>
                                </li>
                                <li className="list-inline-item">
                                    <h5 style={{ color: '#5b69bc' }}><i className="fa fa-circle me-1"></i>Series B</h5>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <div className="col-xl-4">
                <div className="card">
                    <div className="card-body">
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
                        <h4 className="header-title mt-0">Statistics</h4>
                        <div id="morris-bar-example" dir="ltr" style={{ height: '280px' }} className="morris-chart"></div>
                    </div>
                </div>
            </div>

            <div className="col-xl-4">
                <div className="card">
                    <div className="card-body">
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
                        <h4 className="header-title mt-0">Total Revenue</h4>
                        <div id="morris-line-example" dir="ltr" style={{ height: '280px' }} className="morris-chart"></div>
                    </div>
                </div>
            </div>
        </div>


    );
}
export default Dashboard;
