<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.Dashboards'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('/user_assets/libs/admin-resources/admin-resources.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Dashboard
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title1'); ?>
            Good Evening ! <?php echo e(auth()->user()->name); ?>

        <?php $__env->endSlot(); ?>
        <?php $__env->slot('small'); ?>
            You are on the <a href="#">Rubic Extraction Plan 1</a>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title2'); ?>
            Welcome !
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">My Rubic Wallet</span>
                            <h4 class="mb-3">
                                ₦<span class="counter-value" data-target="0.00">0.00</span>
                            </h4>
                            <div class="text-nowrap">
                                <span class="badge bg-soft-success text-success">+₦0.00</span>
                                <span class="ms-1 text-muted font-size-13">Since last week</span>
                            </div>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart1" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="#">Transaction History ></a>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Rubic Stake Profit</span>
                            <h4 class="mb-3">
                                ₦<span class="counter-value" data-target="0.00">0.00</span>
                            </h4>
                            <div class="text-nowrap">
                                <span class="badge bg-soft-success text-success">+₦0.00</span>
                                <span class="ms-1 text-muted font-size-13">Since last week</span>
                            </div>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart14" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="#">Transaction History ></a>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Extraction Balance</span>
                            <h4 class="mb-3">
                                ₦<span class="counter-value" data-target="0.00">0.00</span>
                            </h4>
                            <div class="text-nowrap">
                                <span class="badge bg-soft-success text-success">+₦0.00</span>
                                <span class="ms-1 text-muted font-size-13">Since last week</span>
                            </div>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart2" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="#">Extraction History ></a>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Referral Earnings</span>
                            <h4 class="mb-3">
                                ₦<span class="counter-value" data-target="0.00">0.00</span>
                            </h4>
                            <div class="text-nowrap">
                                <span class="badge bg-soft-success text-success">+₦0.00</span>
                                <span class="ms-1 text-muted font-size-13">Since last week</span>
                            </div>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart3" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="#">Referral Earnings History ></a>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Indirect Referral Earnings</span>
                            <h4 class="mb-3">
                                ₦<span class="counter-value" data-target="0.00">0.00</span>
                            </h4>
                            <div class="text-nowrap">
                                <span class="badge bg-soft-success text-success">+₦0.00</span>
                                <span class="ms-1 text-muted font-size-13">Since last week</span>
                            </div>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart13" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="#">Indirect Referral Earnings History ></a>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Viral Trend</span>
                            <h4 class="mb-3">
                                ₦<span class="counter-value" data-target="0.00">0.00</span>
                            </h4>
                            <div class="text-nowrap">
                                <span class="badge bg-soft-success text-success">+₦0.00</span>
                                <span class="ms-1 text-muted font-size-13">Since last week</span>
                            </div>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart4" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="#">Viral Trend History ></a>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Viral Trend</span>
                            <h4 class="mb-3">
                                <span class="counter-value" data-target="0">0</span>
                            </h4>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart5" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="#">Viral Trend History ></a>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Wallet Withdrawal</span>
                            <h4 class="mb-3">
                                ₦<span class="counter-value" data-target="0.00">0.00</span>
                            </h4>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart6" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="#">Wallet Transaction History ></a>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Extracts</span>
                            <h4 class="mb-3">
                                <span class="counter-value" data-target="0">0</span>
                            </h4>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart7" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="#">Extraction History ></a>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Rubic Network Price</span>
                            <h4 class="mb-3">
                                <div class="">1RBC = ₦54</div>
                                <div class="">1RBC = $0.034</div>
                            </h4>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart8" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="#">Rubic Price Chart History ></a>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Referrals</span>
                            <h4 class="mb-3">
                                <span class="counter-value" data-target="0">0</span>
                            </h4>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart9" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="#">Referral History ></a>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Rubic Stake Wallet</span>
                            <h4 class="mb-3">
                                $<span class="counter-value" data-target="0.00">0.00</span>
                            </h4>
                            <div class="text-nowrap">
                                <span class="badge bg-soft-success text-success">+$0.00</span>
                                <span class="ms-1 text-muted font-size-13">Since last week</span>
                            </div>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart10" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="#">All Wallet Transaction History ></a>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Stake Withdrawals</span>
                            <h4 class="mb-3">
                                $<span class="counter-value" data-target="0.00">0.00</span>
                            </h4>
                            <div class="text-nowrap">
                                <span class="badge bg-soft-success text-success">+$0.00</span>
                                <span class="ms-1 text-muted font-size-13">Since last week</span>
                            </div>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart11" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="#">All Stake Withdrawal History ></a>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Stake Referrak Earnings</span>
                            <h4 class="mb-3">
                                $<span class="counter-value" data-target="0.00">0.00</span>
                            </h4>
                            <div class="text-nowrap">
                                <span class="badge bg-soft-success text-success">+$0.00</span>
                                <span class="ms-1 text-muted font-size-13">Since last week</span>
                            </div>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart12" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="#">All Referral History ></a>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

    </div><!-- end row-->

    <div class="row">
        <div class="col-xl-8">
            <!-- card -->
            <div class="card">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-center mb-4">
                        <h5 class="card-title me-2">Rubic Network Market Trading Overview</h5>
                        <div class="ms-auto">
                            <div>
                                <button type="button" class="btn btn-soft-primary btn-sm">
                                    ALL
                                </button>
                                <button type="button" class="btn btn-soft-secondary btn-sm">
                                    1M
                                </button>
                                <button type="button" class="btn btn-soft-secondary btn-sm">
                                    6M
                                </button>
                                <button type="button" class="btn btn-soft-secondary btn-sm active">
                                    1Y
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-xl-8">
                            <div>
                                <div id="market-overview" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="p-4">
                                <div class="mt-0">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm m-auto">
                                            <span class="avatar-title rounded-circle bg-light text-dark font-size-13">
                                                1
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <span class="font-size-14">Mobile Phones</span>
                                        </div>

                                        <div class="flex-shrink-0">
                                            <span
                                                class="badge rounded-pill badge-soft-success font-size-12 fw-medium">+5.4%</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm m-auto">
                                            <span class="avatar-title rounded-circle bg-light text-dark font-size-13">
                                                2
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <span class="font-size-14">Smart Watch</span>
                                        </div>

                                        <div class="flex-shrink-0">
                                            <span
                                                class="badge rounded-pill badge-soft-success font-size-12 fw-medium">+6.8%</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm m-auto">
                                            <span class="avatar-title rounded-circle bg-light text-dark font-size-13">
                                                3
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <span class="font-size-14">Protable Acoustics</span>
                                        </div>

                                        <div class="flex-shrink-0">
                                            <span
                                                class="badge rounded-pill badge-soft-danger font-size-12 fw-medium">-4.9%</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm m-auto">
                                            <span class="avatar-title rounded-circle bg-light text-dark font-size-13">
                                                4
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <span class="font-size-14">Smart Speakers</span>
                                        </div>

                                        <div class="flex-shrink-0">
                                            <span
                                                class="badge rounded-pill badge-soft-success font-size-12 fw-medium">+3.5%</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm m-auto">
                                            <span class="avatar-title rounded-circle bg-light text-dark font-size-13">
                                                5
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <span class="font-size-14">Camcorders</span>
                                        </div>

                                        <div class="flex-shrink-0">
                                            <span
                                                class="badge rounded-pill badge-soft-danger font-size-12 fw-medium">-0.3%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 pt-2">
                                    <a href="" class="btn btn-primary w-100">See All Balances <i
                                            class="mdi mdi-arrow-right ms-1"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Notice Board</h4>
                </div>

                <div class="card-body px-0">
                    <div class="px-3" data-simplebar style="max-height: 386px;">
                        <div class="d-flex align-items-center pb-4">
                            <div class="flex-grow-1">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem ex neque impedit voluptate
                                    deserunt, voluptatibus aliquid reprehenderit necessitatibus dolor consequatur.</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis quos doloremque
                                    officia temporibus veniam, quia nisi repellendus pariatur fugit iure saepe sunt voluptas
                                    aut impedit nostrum, adipisci quaerat. Incidunt, dicta?</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end row-->
    </div>
    <!-- end row-->

    <div class="row">

        <div class="col-xl-3">
            <div class="card">
                <div class="card-header align-items-center d-flex justify-content-center">
                    <h4 class="card-title mb-0">Most Recent Extractions</h4>
                </div><!-- end card header -->
                <div class="card-header align-items-center d-flex justify-content-center">
                    <h4 class="card-title mb-0"><small>Rubic Extraction Plan: [Display Plan Name]</small></h4>
                </div><!-- end card header -->

                <div class="card-body px-0 pt-2">
                    <div class="table-responsive px-3" data-simplebar="init" style="max-height: 395px;">
                        <div class="simplebar-wrapper" style="margin: 0px -16px;">
                            <div class="simplebar-height-auto-observer-wrapper">
                                <div class="simplebar-height-auto-observer"></div>
                            </div>
                            <div class="simplebar-mask">
                                <div class="simplebar-offset" style="right: -17px; bottom: 0px;">
                                    <div class="simplebar-content-wrapper" style="height: auto; overflow: hidden scroll;">
                                        <div class="simplebar-content" style="padding: 0px 16px;">
                                            <table class="table align-middle table-nowrap">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div>
                                                                <h5 class="font-size-15">Rubic
                                                                    Extraction Blockchain: </h5>
                                                                <span
                                                                    class="text-muted">a8d57nfbdfbf4325n43bkb34kjk32</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div>
                                                                <h5 class="font-size-15">Rubic
                                                                    Extraction Blockchain: </h5>
                                                                <span
                                                                    class="text-muted">a8d57nfbdfbf4325n43bkb34kjk32</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div>
                                                                <h5 class="font-size-15">Rubic
                                                                    Extraction Blockchain: </h5>
                                                                <span
                                                                    class="text-muted">a8d57nfbdfbf4325n43bkb34kjk32</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div>
                                                                <h5 class="font-size-15">Rubic
                                                                    Extraction Blockchain: </h5>
                                                                <span
                                                                    class="text-muted">a8d57nfbdfbf4325n43bkb34kjk32</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div>
                                                                <h5 class="font-size-15">Rubic
                                                                    Extraction Blockchain: </h5>
                                                                <span
                                                                    class="text-muted">a8d57nfbdfbf4325n43bkb34kjk32</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div>
                                                                <h5 class="font-size-15">Rubic
                                                                    Extraction Blockchain: </h5>
                                                                <span
                                                                    class="text-muted">a8d57nfbdfbf4325n43bkb34kjk32</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="simplebar-placeholder" style="width: auto; height: 454px;"></div>
                        </div>
                        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                            <div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;">
                            </div>
                        </div>
                        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                            <div class="simplebar-scrollbar"
                                style="height: 343px; transform: translate3d(0px, 52px, 0px); display: block;"></div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <div class="col-xl-5">
            <div class="card">
                <div class="card-header align-items-center d-flex justify-content-center">
                    <h4 class="card-title mb-0">All Notifications</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <tbody>
                                <tr>
                                    <td>You referred John Doe on 5/20/2022</td>
                                </tr>
                                <tr>
                                    <td>You Withdraw $100 from Rubic Stake Wallet on 5/20/2022</td>
                                </tr>
                                <tr>
                                    <td>You recently Extracted on 5/20/2022 Hash: a8d57nfbdfbf4325n43bkb34kjk32</td>
                                </tr>
                                <tr>
                                    <td>You Withdraw $100 from Rubic Stake Wallet on 5/20/2022</td>
                                </tr>
                                <tr>
                                    <td>You Withdraw N8000 from Rubic Wallet on 5/20/2022</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-4">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Live Chat</h4>
                    
                </div><!-- end card header -->

                <div class="card-body px-0">
                    <div class="px-3 chat-conversation" data-simplebar="init" style="max-height: 350px;">
                        <div class="simplebar-wrapper" style="margin: 0px -16px;">
                            <div class="simplebar-height-auto-observer-wrapper">
                                <div class="simplebar-height-auto-observer"></div>
                            </div>
                            <div class="simplebar-mask">
                                <div class="simplebar-offset" style="right: -17px; bottom: 0px;">
                                    <div class="simplebar-content-wrapper" style="height: auto; overflow: hidden scroll;">
                                        <div class="simplebar-content" style="padding: 0px 16px;">
                                            <ul class="list-unstyled mb-0">
                                                
                                                <li>
                                                    <div class="conversation-list">
                                                        <div class="d-flex">
                                                            <img src="<?php echo e(asset('user_assets/images/users/avatar-3.jpg')); ?>"
                                                                class="rounded-circle avatar-sm" alt="">
                                                            <div class="flex-1">
                                                                <div class="ctext-wrap">
                                                                    <div class="ctext-wrap-content">
                                                                        <div class="conversation-name"><span
                                                                                class="time">10:00 AM</span>
                                                                        </div>
                                                                        <p class="mb-0">Good Morning</p>
                                                                    </div>
                                                                    <div class="dropdown align-self-start">
                                                                        <a class="dropdown-toggle" href="#" role="button"
                                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false">
                                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu">
                                                                            <a class="dropdown-item" href="#">Copy</a>
                                                                            <a class="dropdown-item" href="#">Save</a>
                                                                            <a class="dropdown-item" href="#">Forward</a>
                                                                            <a class="dropdown-item" href="#">Delete</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </li>

                                                <li class="right">
                                                    <div class="conversation-list">
                                                        <div class="d-flex">
                                                            <div class="flex-1">
                                                                <div class="ctext-wrap">
                                                                    <div class="ctext-wrap-content">
                                                                        <div class="conversation-name"><span
                                                                                class="time">10:02 AM</span>
                                                                        </div>
                                                                        <p class="mb-0">Good morning</p>
                                                                    </div>
                                                                    <div class="dropdown align-self-start">
                                                                        <a class="dropdown-toggle" href="#" role="button"
                                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false">
                                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu">
                                                                            <a class="dropdown-item" href="#">Copy</a>
                                                                            <a class="dropdown-item" href="#">Save</a>
                                                                            <a class="dropdown-item" href="#">Forward</a>
                                                                            <a class="dropdown-item" href="#">Delete</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <img src="<?php echo e(asset('user_assets/images/users/avatar-6.jpg')); ?>"
                                                                class="rounded-circle avatar-sm" alt="">
                                                        </div>

                                                    </div>

                                                </li>

                                                <li>
                                                    <div class="conversation-list">
                                                        <div class="d-flex">
                                                            <img src="<?php echo e(asset('user_assets/images/users/avatar-3.jpg')); ?>"
                                                                class="rounded-circle avatar-sm" alt="">
                                                            <div class="flex-1">
                                                                <div class="ctext-wrap">
                                                                    <div class="ctext-wrap-content">
                                                                        <div class="conversation-name"><span
                                                                                class="time">10:04 AM</span>
                                                                        </div>
                                                                        <p class="mb-0">
                                                                            Hi there, How are you?
                                                                        </p>
                                                                    </div>
                                                                    <div class="dropdown align-self-start">
                                                                        <a class="dropdown-toggle" href="#" role="button"
                                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false">
                                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu">
                                                                            <a class="dropdown-item" href="#">Copy</a>
                                                                            <a class="dropdown-item" href="#">Save</a>
                                                                            <a class="dropdown-item" href="#">Forward</a>
                                                                            <a class="dropdown-item" href="#">Delete</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex">
                                                            <img src="<?php echo e(asset('user_assets/images/users/avatar-3.jpg')); ?>"
                                                                class="rounded-circle avatar-sm" alt="">
                                                            <div class="flex-1">
                                                                <div class="ctext-wrap">
                                                                    <div class="ctext-wrap-content">
                                                                        <div class="conversation-name"><span
                                                                                class="time">10:04 AM</span>
                                                                        </div>
                                                                        <p class="mb-0">
                                                                            Waiting for your reply.As I heve to go back
                                                                            soon. i have to travel long distance.
                                                                        </p>
                                                                    </div>
                                                                    <div class="dropdown align-self-start">
                                                                        <a class="dropdown-toggle" href="#" role="button"
                                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false">
                                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu">
                                                                            <a class="dropdown-item" href="#">Copy</a>
                                                                            <a class="dropdown-item" href="#">Save</a>
                                                                            <a class="dropdown-item" href="#">Forward</a>
                                                                            <a class="dropdown-item" href="#">Delete</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </li>

                                                <li class="right">
                                                    <div class="conversation-list">
                                                        <div class="d-flex">
                                                            <div class="flex-1">
                                                                <div class="ctext-wrap">
                                                                    <div class="ctext-wrap-content">
                                                                        <div class="conversation-name"><span
                                                                                class="time">10:08 AM</span>
                                                                        </div>
                                                                        <p class="mb-0">
                                                                            Hi, I am coming there in few minutes. Please
                                                                            wait!! I am in taxi right now.
                                                                        </p>
                                                                    </div>
                                                                    <div class="dropdown align-self-start">
                                                                        <a class="dropdown-toggle" href="#" role="button"
                                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false">
                                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu">
                                                                            <a class="dropdown-item" href="#">Copy</a>
                                                                            <a class="dropdown-item" href="#">Save</a>
                                                                            <a class="dropdown-item" href="#">Forward</a>
                                                                            <a class="dropdown-item" href="#">Delete</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <img src="<?php echo e(asset('user_assets/images/users/avatar-6.jpg')); ?>"
                                                                class="rounded-circle avatar-sm" alt="">
                                                        </div>
                                                    </div>

                                                </li>

                                                <li>
                                                    <div class="conversation-list">
                                                        <div class="d-flex">
                                                            <img src="<?php echo e(asset('user_assets/images/users/avatar-3.jpg')); ?>"
                                                                class="rounded-circle avatar-sm" alt="">
                                                            <div class="flex-1">
                                                                <div class="ctext-wrap">
                                                                    <div class="ctext-wrap-content">
                                                                        <div class="conversation-name"><span
                                                                                class="time">10:06 AM</span>
                                                                        </div>
                                                                        <p class="mb-0">
                                                                            Thank You very much, I am waiting here at
                                                                            StarBuck cafe.
                                                                        </p>
                                                                    </div>
                                                                    <div class="dropdown align-self-start">
                                                                        <a class="dropdown-toggle" href="#" role="button"
                                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false">
                                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu">
                                                                            <a class="dropdown-item" href="#">Copy</a>
                                                                            <a class="dropdown-item" href="#">Save</a>
                                                                            <a class="dropdown-item" href="#">Forward</a>
                                                                            <a class="dropdown-item" href="#">Delete</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </li>


                                                <li>
                                                    <div class="conversation-list">
                                                        <div class="d-flex">
                                                            <img src="<?php echo e(asset('user_assets/images/users/avatar-3.jpg')); ?>"
                                                                class="rounded-circle avatar-sm" alt="">
                                                            <div class="flex-1">
                                                                <div class="ctext-wrap">
                                                                    <div class="ctext-wrap-content">
                                                                        <div class="conversation-name"><span
                                                                                class="time">10:09 AM</span>
                                                                        </div>
                                                                        <p class="mb-0">
                                                                            img-1.jpg &amp; img-2.jpg images for a New
                                                                            Projects
                                                                        </p>

                                                                        <ul class="list-inline message-img mt-3  mb-0">
                                                                            <li class="list-inline-item message-img-list">
                                                                                <a class="d-inline-block m-1" href="">
                                                                                    <img src="<?php echo e(asset('user_assets/images/small/img-1.jpg')); ?>"
                                                                                        alt=""
                                                                                        class="rounded img-thumbnail">
                                                                                </a>
                                                                            </li>

                                                                            <li class="list-inline-item message-img-list">
                                                                                <a class="d-inline-block m-1" href="">
                                                                                    <img src="<?php echo e(asset('user_assets/images/small/img-2.jpg')); ?>"
                                                                                        alt=""
                                                                                        class="rounded img-thumbnail">
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="dropdown align-self-start">
                                                                        <a class="dropdown-toggle" href="#" role="button"
                                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false">
                                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu">
                                                                            <a class="dropdown-item" href="#">Copy</a>
                                                                            <a class="dropdown-item" href="#">Save</a>
                                                                            <a class="dropdown-item" href="#">Forward</a>
                                                                            <a class="dropdown-item" href="#">Delete</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="simplebar-placeholder" style="width: auto; height: 747px;"></div>
                        </div>
                        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                            <div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;">
                            </div>
                        </div>
                        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                            <div class="simplebar-scrollbar"
                                style="height: 163px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                        </div>
                    </div>

                    <div class="px-3">
                        <div class="row">
                            <div class="col">
                                <div class="position-relative">
                                    <input type="text" class="form-control border bg-soft-light"
                                        placeholder="Enter Message...">
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary chat-send w-md waves-effect waves-light"><span
                                        class="d-none d-sm-inline-block me-2">Send</span> <i
                                        class="mdi mdi-send float-end"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- apexcharts -->
    <script src="<?php echo e(URL::asset('/user_assets/libs/apexcharts/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/user_assets/libs/admin-resources/admin-resources.min.js')); ?>"></script>

    <!-- dashboard init -->
    <script src="<?php echo e(URL::asset('/user_assets/js/pages/dashboard.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/user_assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\rubicnetwork\resources\views/user/dashboard.blade.php ENDPATH**/ ?>