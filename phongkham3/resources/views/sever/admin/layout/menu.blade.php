 <!-- Side Overlay-->
 <aside id="side-overlay">
    <!-- Side Overlay Scroll Container -->
    <div id="side-overlay-scroll">
        <!-- Side Header -->
        <div class="content-header content-header-fullrow">
            <div class="content-header-section align-parent">
                <!-- Close Side Overlay -->
                <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                <button type="button" class="btn btn-dual-secondary align-v-r" data-toggle="layout" data-action="side_overlay_close">
                    <i class="fa fa-times text-danger"></i>
                </button>
                <!-- END Close Side Overlay -->

                <!-- User Info -->
                <div class="content-header-item">
                    <a class="align-middle link-effect font-w600" href="sever/admin/user/sua/{{ $user_login->id }}">Xin Chào - {{ $user_login->name }}</a>
                </div>
                <!-- END User Info -->
            </div>
        </div>
        <!-- END Side Header -->

        <!-- Side Content -->
        <div class="content-side">
            <!-- Notifications -->
            <div class="block pull-r-l">
                <div class="block-header bg-body-light">
                    <h3 class="block-title">Thông Báo</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                    </div>
                </div>
                <div class="block-content">
                    <ul class="list list-activity">
                        @foreach ($hopdongthongbao as $hdtb)
                        {{-- <li>
                            @if ($hdtb->trangthai=="Gần Hết Hiệu Lực")
                                <i class="si si-bell text-warning"></i>
                            @endif
                            @if ($hdtb->trangthai=="Trễ Gia Hạn")
                                <i class="si si-bell text-info"></i>
                            @endif
                            @if ($hdtb->trangthai=="Hết Hiệu Lực")
                                <i class="si si-bell text-danger"></i>
                            @endif
                            <div class="font-w600">Hợp Đồng <b>{{ $hdtb->maHD }}</b> Đã {{ $hdtb->trangthai }}</div>
                            <div class="font-size-xs text-muted">{{ $hdtb->updated_at }}</div>
                        </li> --}}
                            @if ($hdtb->trangthai=="Gần Hết Hiệu Lực")
                                @foreach ($giahanthongbao as $ghtb)
                                    @if ($ghtb->maHD==$hdtb->maHD && $ghtb->trangthai==$hdtb->trangthai)
                                        <i class="si si-bell text-warning"></i>
                                        <div class="font-w600">Hợp Đồng <b>{{ $hdtb->maHD }}</b> Đã {{ $hdtb->trangthai }}</div>
                                        <div class="font-size-xs text-muted">{{ date('Y-m-d', strtotime('-6 day', strtotime($ghtb->ngayKT))) }}</div>
                                    @endif
                                    {{-- @if (count($ghtb->maHD==$hdtb->maHD)==)
                                        <i class="si si-bell text-warning"></i>
                                        <div class="font-w600">Hợp Đồng <b>{{ $hdtb->maHD }}</b> Đã {{ $hdtb->trangthai }}</div>
                                        <div class="font-size-xs text-muted">{{ date('Y-m-d', strtotime('-6 day', strtotime($hdtb->ngayKT))) }}</div>
                                    @endif --}}
                                @endforeach
                                @if (strtotime($hdtb->ngayKT)>strtotime($today))
                                    <i class="si si-bell text-warning"></i>
                                    <div class="font-w600">Hợp Đồng <b>{{ $hdtb->maHD }}</b> Đã {{ $hdtb->trangthai }}</div>
                                    <div class="font-size-xs text-muted">{{ date('Y-m-d', strtotime('-6 day', strtotime($hdtb->ngayKT))) }}</div>
                                @endif
                            @endif
                            @if ($hdtb->trangthai=="Trễ Gia Hạn")
                                @foreach ($giahanthongbao as $ghtb)
                                    @if ($hdtb->maHD==$ghtb->maHD && $hdtb->trangthai==$ghtb->trangthai)
                                        <i class="si si-bell text-info"></i>
                                        <div class="font-w600">Hợp Đồng <b>{{ $hdtb->maHD }}</b> Đã {{ $hdtb->trangthai }}</div>
                                        <div class="font-size-xs text-muted">{{ date('Y-m-d', strtotime('+1 day', strtotime($ghtb->ngayKT))) }}</div>
                                    @endif
                                    {{-- @if (count($hdtb->maHD==$ghtb->maHD)==0)
                                        <i class="si si-bell text-info"></i>
                                        <div class="font-w600">Hợp Đồng <b>{{ $hdtb->maHD }}</b> Đã {{ $hdtb->trangthai }}</div>
                                        <div class="font-size-xs text-muted">{{ date('Y-m-d', strtotime('+1 day', strtotime($hdtb->ngayKT))) }}</div>
                                    @endif --}}
                                @endforeach
                                @if (strtotime(date('Y-m-d', strtotime('+7 day', strtotime($hdtb->ngayKT))))>strtotime($today))
                                    <i class="si si-bell text-info"></i>
                                    <div class="font-w600">Hợp Đồng <b>{{ $hdtb->maHD }}</b> Đã {{ $hdtb->trangthai }}</div>
                                    <div class="font-size-xs text-muted">{{ date('Y-m-d', strtotime('+1 day', strtotime($hdtb->ngayKT))) }}</div>
                                @endif
                            @endif
                            @if ($hdtb->trangthai=="Hết Hiệu Lực")
                                @foreach ($giahanthongbao as $ghtb)

                                    @if ($ghtb->maHD==$hdtb->maHD)
                                        <i class="si si-bell text-danger"></i>
                                        <div class="font-w600">Hợp Đồng <b>{{ $hdtb->maHD }}</b> Đã {{ $hdtb->trangthai }}</div>
                                        <div class="font-size-xs text-muted">{{ date('Y-m-d', strtotime('+7 day', strtotime($ghtb->ngayKT))) }}</div>
                                    {{-- @else
                                        <i class="si si-bell text-danger"></i>
                                        <div class="font-w600">Hợp Đồng <b>{{ $hdtb->maHD }}</b> Đã {{ $hdtb->trangthai }}</div>
                                        <div class="font-size-xs text-muted">{{ date('Y-m-d', strtotime('+7 day', strtotime($hdtb->ngayKT))) }}</div> --}}
                                    @endif
                                @endforeach
                                @if (strtotime(date('Y-m-d', strtotime('+30 day', strtotime($hdtb->ngayKT))))>strtotime($today))
                                    <i class="si si-bell text-danger"></i>
                                    <div class="font-w600">Hợp Đồng <b>{{ $hdtb->maHD }}</b> Đã {{ $hdtb->trangthai }}</div>
                                    <div class="font-size-xs text-muted">{{ date('Y-m-d', strtotime('+7 day', strtotime($hdtb->ngayKT))) }}</div>
                                @endif
                            @endif
                        @endforeach

                        {{-- <li>
                            <i class="si si-pencil text-info"></i>
                            <div class="font-w600">You edited the file</div>
                            <div>
                                <a href="javascript:void(0)">
                                    <i class="fa fa-file-text-o"></i> Docs.doc
                                </a>
                            </div>
                            <div class="font-size-xs text-muted">3 hours ago</div>
                        </li>
                        <li>
                            <i class="si si-plus text-success"></i>
                            <div class="font-w600">New user</div>
                            <div>
                                <a href="javascript:void(0)">StudioWeb - View Profile</a>
                            </div>
                            <div class="font-size-xs text-muted">5 hours ago</div>
                        </li>
                        <li>
                            <i class="si si-wrench text-warning"></i>
                            <div class="font-w600">Core v3.9 is available</div>
                            <div>
                                <a href="javascript:void(0)">Update now</a>
                            </div>
                            <div class="font-size-xs text-muted">8 hours ago</div>
                        </li>
                        <li>
                            <i class="si si-user-follow text-pulse"></i>
                            <div class="font-w600">+1 Friend Request</div>
                            <div>
                                <a href="javascript:void(0)">Accept</a>
                            </div>
                            <div class="font-size-xs text-muted">1 day ago</div>
                        </li> --}}

                    </ul>
                </div>
            </div>
            <!-- END Notifications -->
        </div>
        <!-- END Side Content -->
    </div>
    <!-- END Side Overlay Scroll Container -->
</aside>
<!-- END Side Overlay -->

<!-- Sidebar -->
            <!--
                Helper classes

                Adding .sidebar-mini-hide to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
                Adding .sidebar-mini-show to an element will make it visible (opacity: 1) when the sidebar is in mini mode
                    If you would like to disable the transition, just add the .sidebar-mini-notrans along with one of the previous 2 classes

                Adding .sidebar-mini-hidden to an element will hide it when the sidebar is in mini mode
                Adding .sidebar-mini-visible to an element will show it only when the sidebar is in mini mode
                    - use .sidebar-mini-visible-b if you would like to be a block when visible (display: block)
                -->
                <nav id="sidebar">
                    <!-- Sidebar Scroll Container -->
                    <div id="sidebar-scroll">
                        <!-- Sidebar Content -->
                        <div class="sidebar-content">
                            <!-- Side Header -->
                            <div class="content-header content-header-fullrow px-15">
                                <!-- Mini Mode -->
                                <div class="content-header-section sidebar-mini-visible-b">
                                    <!-- Logo -->
                                    <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                                        <span class="text-dual-primary-dark">M</span><span class="text-primary">n</span>
                                    </span>
                                    <!-- END Logo -->
                                </div>
                                <!-- END Mini Mode -->

                                <!-- Normal Mode -->
                                <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                                    <!-- Close Sidebar, Visible only on mobile screens -->
                                    <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                                    <button type="button" class="btn btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                                        <i class="fa fa-times text-danger"></i>
                                    </button>
                                    <!-- END Close Sidebar -->

                                    <!-- Logo -->
                                    <div class="content-header-item">
                                        <a class="link-effect font-w700" href="">
                                            <i class="si si-fire text-primary"></i>
                                            <span class="font-size-xl text-dual-primary-dark">Me</span><span class="font-size-xl text-primary">nu</span>
                                        </a>
                                    </div>
                                    <!-- END Logo -->
                                </div>
                                <!-- END Normal Mode -->
                            </div>
                            <!-- END Side Header -->

                            <!-- Side Navigation -->
                            <div class="content-side content-side-full">
                                <ul class="nav-main">
                                    <li>
                                        <a class="active" href="sever/admin/thongke/today">
                                            <i class="si si-cup"></i>
                                            <span class="sidebar-mini-hide">Bảng Thống Kê</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-heading">
                                        <span class="sidebar-mini-visible">MG</span>
                                        <span class="sidebar-mini-hidden">Manage</span>
                                    </li>
                                    <li>
                                        <a class="nav-submenu" data-toggle="nav-submenu" href="#">
                                            <i class="si si-briefcase"></i>
                                            <span class="sidebar-mini-hide">Hợp Đồng</span>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="sever/admin/hopdong/danhsach">Quản lý</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="nav-submenu" data-toggle="nav-submenu" href="#">
                                            <i class="fa fa-pencil-square-o"></i>
                                            <span class="sidebar-mini-hide">Gia Hạn</span>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="sever/admin/giahan/danhsach">Quản lý</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="nav-submenu" data-toggle="nav-submenu" href="#">

                                            <i class="si si-users"></i>
                                            <span class="sidebar-mini-hide">Users Hệ Thống</span>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="sever/admin/user/them">Thêm</a>
                                            </li>
                                            <li>
                                                <a href="sever/admin/user/danhsach">Quản lý</a>
                                            </li>
                                        </ul>
                                    </li>
                                    {{-- <li>
                                        <a href="">
                                            <i class="si si-docs"></i>
                                            <span class="sidebar-mini-hide">Invoices</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <i class="si si-energy"></i>
                                            <span class="sidebar-mini-hide">Assets</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <i class="si si-shield"></i>
                                            <span class="sidebar-mini-hide">Tickets</span>
                                        </a>
                                    </li> --}}
                                    <li class="nav-main-heading">
                                        <span class="sidebar-mini-visible">ST</span>
                                        <span class="sidebar-mini-hidden">Settings</span>
                                    </li>
                                    <li>
                                        <a href="sever/admin/user/sua/{{ $user_login->id }}">
                                            <i class="si si-user"></i>
                                            <span class="sidebar-mini-hide">Profile</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- END Side Navigation -->
                        </div>
                        <!-- Sidebar Content -->
                    </div>
                    <!-- END Sidebar Scroll Container -->
                </nav>
            <!-- END Sidebar -->