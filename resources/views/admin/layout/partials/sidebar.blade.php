<div class="left-side-menu">

    <div class="h-100" data-simplebar>
        <!-- User box -->
        <div class="user-box text-center">
            <div class="dropdown">
                <a href="{{route('route.dashboard')}}" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown" aria-expanded="false">6XPRO + 1</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings me-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock me-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>

            <p class="text-muted left-user-info">Admin Head</p>

            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="#" class="text-muted left-user-info">
                        <i class="mdi mdi-cog"></i>
                    </a>
                </li>

                <li class="list-inline-item">
                    <a href="#">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>
            </ul>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{route('route.dashboard')}}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="badge bg-success rounded-pill float-end">9+</span>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li class="menu-title mt-2">Apps</li>

                <li>
                    @if(\Gate::check('roles.indexStatistic'))
                    <a href="#statical" data-bs-toggle="collapse">
                        <i class="mdi mdi-book-open-page-variant-outline"></i>
                        <span> Thống kê </span>
                        <span class="menu-arrow"></span>
                    </a>
                    @else
                        <a href="javascript:void(0);" onclick="alert('Bạn không có quyền truy cập')">
                            <i class="mdi mdi-book-open-page-variant-outline"></i>
                            <span> Thống kê </span>
                            <span class="menu-arrow"></span>
                        </a>
                    @endif
                    <div class="collapse" id="statical">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('route.statistical')}}">Đặt lịch</a>
                            </li>
                            <li>
                                <a href="{{route('route.statistical.service')}}">Dịch vụ</a>
                            </li>
                            <li>
                                <a href="{{route('route.statistical.revenue')}}">Doanh thu</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    @if(\Gate::check('roles.indexRole'))
                        <a href="#sidebarAuth" data-bs-toggle="collapse">
                            <i class="mdi mdi-account-multiple-plus-outline"></i>
                            <span>Vai trò và quyền </span>
                            <span class="menu-arrow"></span>
                        </a>
                    @else
                        <a href="javascript:void(0);" onclick="alert('Bạn không có quyền truy cập')">
                            <i class="mdi mdi-account-multiple-plus-outline"></i>
                            <span>Vai trò và quyền </span>
                            <span class="menu-arrow"></span>
                        </a>
                    @endif

                    <div class="collapse" id="sidebarAuth">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('role')}}">Vai trò</a>
                            </li>
                            <li>
                                <a href="{{route('role')}}">Quyền</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{route('route.chat')}}">
                        <i class="mdi mdi-forum-outline"></i>
                        <span> Chat </span>
                    </a>
                </li>

                <li>
                    @if(\Gate::check('roles.indexBooking'))
                        <a href="{{route('route.booking_blade')}}">
                            <i class="mdi mdi-access-point-network"></i>
                            <span> Lịch đặt </span>
                        </a>
                    @else
                        <a href="javascript:void(0);" onclick="alert('Bạn không có quyền truy cập')">
                            <i class="mdi mdi-access-point-network"></i>
                            <span> Lịch đặt </span>
                        </a>
                    @endif

                </li>
                <li>
                    @if(\Gate::check('roles.indexMoney'))
                        <a href="{{route('payment.index')}}">
                            <i class="bi bi-credit-card-fill"></i>
                            <span> Thanh toán online </span>
                        </a>
                    @else
                        <a href="javascript:void(0);" onclick="alert('Bạn không có quyền truy cập')">
                            <i class="bi bi-credit-card-fill"></i>
                            <span> Thanh toán online </span>
                        </a>
                    @endif

                </li>

                <li>
                    @if(\Gate::check('roles.indexService'))
                        <a href="{{route('route.service')}}">
                            <i class="mdi mdi-access-point-network"></i>
                            <span> Dịch vụ </span>
                        </a>
                    @else
                        <a href="javascript:void(0);" onclick="alert('Bạn không có quyền truy cập')">
                            <i class="mdi mdi-access-point-network"></i>
                            <span> Dịch vụ </span>
                        </a>
                    @endif

                </li>

                <li>
                    @if(\Gate::check('roles.indexCategory'))
                        <a href="{{route('category.index')}}">
                            <i class="mdi mdi-access-point-network"></i>
                            <span>Danh mục dịch vụ</span>
                        </a>
                    @else
                        <a href="javascript:void(0);" onclick="alert('Bạn không có quyền truy cập')">
                            <i class="mdi mdi-access-point-network"></i>
                            <span>Danh mục dịch vụ</span>
                        </a>
                    @endif

                </li>

                <li>
                    @if(\Gate::check('roles.indexTimeSheet'))
                        <a href="{{route('route.stylistTimeSheets')}}">
                            <i class="mdi mdi-access-point-network"></i>
                            <span>Lịch làm việc</span>
                        </a>
                    @else
                        <a href="javascript:void(0);" onclick="alert('Bạn không có quyền truy cập')">
                            <i class="mdi mdi-access-point-network"></i>
                            <span>Lịch làm việc</span>
                        </a>
                    @endif

                </li>
                <li>
                    @if(\Gate::check('roles.indexRole'))
                        <a href="#sidebarTasks" data-bs-toggle="collapse">
                            <i class="mdi mdi-clipboard-outline"></i>
                            <span> Nhân viên </span>
                            <span class="menu-arrow"></span>
                        </a>
                    @else
                        <a href="javascript:void(0);" onclick="alert('Bạn không có quyền truy cập')">
                            <i class="mdi mdi-clipboard-outline"></i>
                            <span> Nhân viên </span>
                            <span class="menu-arrow"></span>
                        </a>
                    @endif

                    <div class="collapse" id="sidebarTasks">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('stylist.index')}}">Danh sách nhân viên</a>
                            </li>
                            <li>
                                <a href="{{route('workDay.index')}}">Ngày làm việc</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    @if(\Gate::check('roles.indexClient'))
                        <a href="{{route('route.user')}}">
                            <i class="mdi mdi-briefcase-variant-outline"></i>
                            <span> Người dùng </span>
                        </a>
                    @else
                        <a href="javascript:void(0);" onclick="alert('Bạn không có quyền truy cập')">
                            <i class="mdi mdi-briefcase-variant-outline"></i>
                            <span> Người dùng </span>
                        </a>
                    @endif

                </li>
                <li>
                    <a href="{{route('route.result')}}">
                        <i class="mdi mdi-briefcase-variant-outline"></i>
                        <span> Result </span>
                    </a>
                </li>
                <li>
                    @if(\Gate::check('roles.indexReview'))
                        <a href="{{route('review.index')}}">
                            <i class="bi bi-chat-square-quote"></i>
                            <span> Reviews </span>
                        </a>
                    @else
                        <a href="javascript:void(0);" onclick="alert('Bạn không có quyền truy cập')">
                            <i class="bi bi-chat-square-quote"></i>
                            <span> Reviews </span>
                        </a>
                    @endif

                </li>
                <li>
                    <a href="{{route('banner.index')}}">
                        <i class="bi bi-images"></i>
                        <span> Setting Banner </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('blogs.index')}}">
                        <i class="bi bi-chat-square-quote"></i>
                        <span> Tin tức </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('route.statistical')}}">
                        <i class="mdi mdi-briefcase-variant-outline"></i>
                        <span>Thống kê</span>
                    </a>
                    @if(\Gate::check('roles.indexMoney'))
                        <a href="{{route('destroy.index')}}">
                            <i class="bi bi-images"></i>
                            <span>Thanh toán hủy lịch</span>
                        </a>
                    @else
                        <a href="javascript:void(0);" onclick="alert('Bạn không có quyền truy cập')">
                            <i class="bi bi-images"></i>
                            <span>Thanh toán hủy lịch</span>
                        </a>
                    @endif

                </li>
                <li>

                    <a href="{{route('faqs.index')}}">
                        <i class="mdi mdi-briefcase-variant-outline"></i>
                        <span> Câu hỏi thường gặp </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('pricings.index')}}">
                        <i class="bi bi-chat-square-quote"></i>
                        <span> Chính sách giá </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('portfolios.index')}}">
                        <i class="bi bi-images"></i>
                        <span> Kiểu tóc </span>
                    </a>
                </li>
                <li>
                    <a href="#contacts" data-bs-toggle="collapse">
                        <i class="mdi mdi-book-open-page-variant-outline"></i>
                        <span> Thùng rác </span>
                        <span class="menu-arrow"></span>
                    </a>

                    @if(\Gate::check('roles.indexTruck'))
                        <a href="#contacts" data-bs-toggle="collapse">
                            <i class="mdi mdi-book-open-page-variant-outline"></i>
                            <span> Thùng rác </span>
                            <span class="menu-arrow"></span>
                        </a>
                    @else
                        <a href="javascript:void(0);" onclick="alert('Bạn không có quyền truy cập')">
                            <i class="mdi mdi-book-open-page-variant-outline"></i>
                            <span> Thùng rác </span>
                            <span class="menu-arrow"></span>
                        </a>
                    @endif

                    <div class="collapse" id="contacts">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('trash.category')}}">Danh muc</a>
                            </li>
                            <li>
                                <a href="{{route('trash.service')}}">Dịch vụ</a>
                            </li>
                            <li>
                                <a href="{{route('trash.user')}}">User</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
