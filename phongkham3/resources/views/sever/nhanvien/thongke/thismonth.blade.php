@extends('sever.nhanvien.layout.index')

@section('content')
<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
                <div class="content">
                    <!-- Statistics -->
                    <!-- CountTo ([data-toggle="countTo"] is initialized in Codebase() -> uiHelperCoreAppearCountTo()) -->
                    <!-- For more info and examples you can check out https://github.com/mhuggins/jquery-countTo -->
                    <div class="content-heading">
                        <div class="dropdown float-right">
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" id="ecom-dashboard-stats-drop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                This Month
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="ecom-dashboard-stats-drop">
                                <a class="dropdown-item " href="sever/nhanvien/thongke/today">
                                    <i class="fa fa-fw fa-calendar mr-5"></i>Today
                                </a>
                                <a class="dropdown-item " href="sever/nhanvien/thongke/thisweek">
                                    <i class="fa fa-fw fa-calendar mr-5"></i>This Week
                                </a>
                                <a class="dropdown-item active" href="sever/nhanvien/thongke/thismonth">
                                    <i class="fa fa-fw fa-calendar mr-5"></i>This Month
                                </a>
                                <a class="dropdown-item" href="sever/nhanvien/thongke/thisyear">
                                    <i class="fa fa-fw fa-calendar mr-5"></i>This Year
                                </a>
                                <div class="dropdown-divider "></div>
                                <a class="dropdown-item " href="sever/nhanvien/thongke/all">
                                    <i class="fa fa-fw fa-circle-o mr-5"></i>All Time
                                </a>
                            </div>
                        </div>
                        Thống Kê
                    </div>
                    <div class="row gutters-tiny">
                        <!-- Earnings -->
                        <div class="col-md-6 col-xl-3">
                            <a class="block block-rounded block-transparent bg-gd-elegance" href="javascript:void(0)">
                                <div class="block-content block-content-full block-sticky-options">
                                    <div class="block-options">
                                        <div class="block-options-item">
                                            <i class="fa fa-area-chart text-white-op"></i>
                                        </div>
                                    </div>
                                    <div class="py-20 text-center">
                                        <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="{{ $dempk }}">0</div>
                                        <div class="font-size-sm font-w600 text-uppercase text-white-op">Phòng Khám Mới</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- END Earnings -->

                        <!-- Orders -->
                        <div class="col-md-6 col-xl-3">
                            <a class="block block-rounded block-transparent bg-gd-dusk" href="javascript:void(0)">
                                <div class="block-content block-content-full block-sticky-options">
                                    <div class="block-options">
                                        <div class="block-options-item">
                                            <i class="fa fa-archive text-white-op"></i>
                                        </div>
                                    </div>
                                    <div class="py-20 text-center">
                                        <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="{{ $demhd }}">0</div>
                                        <div class="font-size-sm font-w600 text-uppercase text-white-op">Hợp Đồng Mới</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- END Orders -->

                        <!-- New Customers -->
                        <div class="col-md-6 col-xl-3">
                            <a class="block block-rounded block-transparent bg-gd-sea" href="javascript:void(0)">
                                <div class="block-content block-content-full block-sticky-options">
                                    <div class="block-options">
                                        <div class="block-options-item">
                                            <i class="fa fa-users text-white-op"></i>
                                        </div>
                                    </div>
                                    <div class="py-20 text-center">
                                        <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="{{ $demgh }}">0</div>
                                        <div class="font-size-sm font-w600 text-uppercase text-white-op">Gia Hạn Mới</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- END New Customers -->

                        <!-- Conversion Rate -->
                        <div class="col-md-6 col-xl-3">
                            <a class="block block-rounded block-transparent bg-gd-aqua" href="javascript:void(0)">
                                <div class="block-content block-content-full block-sticky-options">
                                    <div class="block-options">
                                        <div class="block-options-item">
                                            <i class="fa fa-cart-arrow-down text-white-op"></i>
                                        </div>
                                    </div>
                                    <div class="py-20 text-center">
                                        <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="{{ $demndk }}">0</div>
                                        <div class="font-size-sm font-w600 text-uppercase text-white-op">Người Đăng Ký Mới</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- END Conversion Rate -->
                    </div>
                    <!-- END Statistics -->
                    <div class="row gutters-tiny">
                        <!-- Earnings -->
                        <div class="col-md-6 col-xl-12">
                            <a class="block block-rounded block-transparent bg-gd-sun" href="javascript:void(0)">
                                <div class="block-content block-content-full block-sticky-options">
                                    <div class="block-options">
                                        <div class="block-options-item">
                                            <i class="fa fa-area-chart text-white-op"></i>
                                        </div>
                                    </div>
                                    <div class="py-20 text-center">
                                        <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="{{ $tien }} " data-after=" VNĐ">0</div>
                                        <div class="font-size-sm font-w600 text-uppercase text-white-op">Tổng Tiền</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- END Earnings -->
                </div>
                <!-- END Page Content -->
</main>
<!-- END Main Container -->
@endsection