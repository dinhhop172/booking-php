
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="page-title-box">
                                <h4>Dashboard</h4>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Lexa</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="state-information d-none d-sm-block">
                                <div class="state-graph">
                                    <div id="header-chart-1"></div>
                                    <div class="info">Balance $ 2,317</div>
                                </div>
                                <div class="state-graph">
                                    <div id="header-chart-2"></div>
                                    <div class="info">Item Sold 1230</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card mini-stat bg-primary">
                                <div class="card-body mini-stat-img">
                                    <div class="mini-stat-icon">
                                        <i class="mdi mdi-cube-outline float-right"></i>
                                    </div>
                                    <div class="text-white">
                                        <h6 class="text-uppercase mb-3 font-size-16">Users</h6>
                                        <h2 class="mb-4"><i class="mdi mdi-account-supervisor-outline"></i><?= count_user() ?></h2>
                                        <span class="badge badge-info"> +11% </span> <span class="ml-2">From previous period</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card mini-stat bg-primary">
                                <div class="card-body mini-stat-img">
                                    <div class="mini-stat-icon">
                                        <i class="mdi mdi-buffer float-right"></i>
                                    </div>
                                    <div class="text-white">
                                        <h6 class="text-uppercase mb-3 font-size-16">Doanh thu</h6>
                                        <h2 class="mb-4">$<?= tong_doanh_thu()['total_price'] ?></h2>
                                        <span class="badge badge-danger"> -29% </span> <span class="ml-2">From previous period</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card mini-stat bg-primary">
                                <div class="card-body mini-stat-img">
                                    <div class="mini-stat-icon">
                                        <i class="mdi mdi-tag-text-outline float-right"></i>
                                    </div>
                                    <div class="text-white">
                                        <h6 class="text-uppercase mb-3 font-size-16">Room available</h6>
                                        <h2 class="mb-4"><?= room_available()[0]['sumroomavailable'] ?></h2>
                                        <span class="badge badge-warning"> 0% </span> <span class="ml-2">From previous period</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card mini-stat bg-primary">
                                <div class="card-body mini-stat-img">
                                    <div class="mini-stat-icon">
                                        <i class="mdi mdi-briefcase-check float-right"></i>
                                    </div>
                                    <div class="text-white">
                                        <h6 class="text-uppercase mb-3 font-size-16">Room Booked</h6>
                                        <h2 class="mb-4"><?= (room_booked()[0]['sumroombooked']); ?></h2>
                                        <span class="badge badge-info"> +89% </span> <span class="ml-2">From previous period</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">

                        <div class="col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Monthly Earnings</h4>

                                    <div class="row text-center mt-4">
                                        <div class="col-6">
                                            <h5 class="font-size-20">$56241</h5>
                                            <p class="text-muted">Marketplace</p>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="font-size-20">$23651</h5>
                                            <p class="text-muted">Total Income</p>
                                        </div>
                                    </div>

                                    <div id="morris-donut-example" class="morris-charts morris-charts-height" dir="ltr"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Email Sent</h4>

                                    <div class="row text-center mt-4">
                                        <div class="col-4">
                                            <h5 class="font-size-20">$ 89425</h5>
                                            <p class="text-muted">Marketplace</p>
                                        </div>
                                        <div class="col-4">
                                            <h5 class="font-size-20">$ 56210</h5>
                                            <p class="text-muted">Total Income</p>
                                        </div>
                                        <div class="col-4">
                                            <h5 class="font-size-20">$ 8974</h5>
                                            <p class="text-muted">Last Month</p>
                                        </div>
                                    </div>

                                    <div id="morris-area-example" class="morris-charts morris-charts-height" dir="ltr"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Monthly Earnings</h4>

                                    <div class="row text-center mt-4">
                                        <div class="col-6">
                                            <h5 class="font-size-20">$ 2548</h5>
                                            <p class="text-muted">Marketplace</p>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="font-size-20">$ 6985</h5>
                                            <p class="text-muted">Total Income</p>
                                        </div>
                                    </div>

                                    <div id="morris-bar-stacked" class="morris-charts morris-charts-height" dir="ltr"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end row -->

                   