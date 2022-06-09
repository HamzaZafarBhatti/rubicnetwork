<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <base href="<?php echo e(url('/')); ?>" />
    <title><?php echo e($title); ?> | <?php echo e($set->site_name); ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    <meta name="robots" content="index, follow">
    <meta name="apple-mobile-web-app-title" content="<?php echo e($set->site_name); ?>" />
    <meta name="application-name" content="<?php echo e($set->site_name); ?>" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="description" content="<?php echo e($set->site_desc); ?>" />
    <link rel="shortcut icon" href="<?php echo e(url('/')); ?>/asset/<?php echo e($logo->image_link2); ?>" />
    <link rel="apple-touch-icon" href="<?php echo e(url('/')); ?>/asset/<?php echo e($logo->image_link2); ?>" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo e(url('/')); ?>/asset/<?php echo e($logo->image_link2); ?>" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo e(url('/')); ?>/asset/<?php echo e($logo->image_link2); ?>" />
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/asset/frontend/css/sweetalert.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">
    <link href="<?php echo e(url('/')); ?>/asset/global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?php echo e(url('/')); ?>/asset/global_assets/css/icons/fontawesome/styles.min.css" rel="stylesheet"
        type="text/css">
    <link href="<?php echo e(url('/')); ?>/asset/user/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo e(url('/')); ?>/asset/user/assets/css/bootstrap_limitless.css" rel="stylesheet" type="text/css">
    <link href="<?php echo e(url('/')); ?>/asset/user/assets/css/layout.css" rel="stylesheet" type="text/css">
    <link href="<?php echo e(url('/')); ?>/asset/user/assets/css/components.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo e(url('/')); ?>/asset/user/assets/css/colors.css" rel="stylesheet" type="text/css">
    <script src="<?php echo e(url('/')); ?>/asset/global_assets/js/main/jquery.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/asset/global_assets/js/main/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/asset/global_assets/js/plugins/loaders/blockui.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/asset/global_assets/js/plugins/ui/ripple.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/asset/global_assets/js/plugins/visualization/d3/d3.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/asset/global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
    <script src="<?php echo e(url('/')); ?>/asset/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/asset/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script src="<?php echo e(url('/')); ?>/asset/global_assets/js/plugins/ui/moment/moment.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/asset/global_assets/js/plugins/pickers/daterangepicker.js"></script>
    <script src="<?php echo e(url('/')); ?>/asset/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/asset/global_assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/asset/global_assets/js/plugins/tables/datatables/extensions/responsive.min.js">
    </script>
    <script src="<?php echo e(url('/')); ?>/asset/global_assets/js/plugins/forms/selects/select2.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/asset/global_assets/js/plugins/ui/prism.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/asset/global_assets/js/plugins/editors/summernote/summernote.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/asset/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/asset/global_assets/js/plugins/forms/validation/validate.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/asset/global_assets/js/plugins/forms/inputs/touchspin.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/asset/global_assets/js/plugins/forms/selects/select2.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/asset/global_assets/js/plugins/forms/styling/switch.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/asset/user/assets/js/app.js"></script>
    <script src="<?php echo e(url('/')); ?>/asset/global_assets/js/demo_pages/picker_date.js"></script>
    <script src="<?php echo e(url('/')); ?>/asset/global_assets/js/demo_pages/dashboard.js"></script>
    <script src="<?php echo e(url('/')); ?>/asset/global_assets/js/demo_pages/login.js"></script>
    <script src="<?php echo e(url('/')); ?>/asset/global_assets/js/demo_pages/datatables_advanced.js"></script>
    <script src="<?php echo e(url('/')); ?>/asset/global_assets/js/demo_pages/datatables_extension_buttons_init.js"></script>
    <script src="<?php echo e(url('/')); ?>/asset/global_assets/js/demo_pages/datatables_basic.js"></script>
    <script src="<?php echo e(url('/')); ?>/asset/global_assets/js/demo_pages/form_layouts.js"></script>
    <script src="<?php echo e(url('/')); ?>/asset/global_assets/js/demo_pages/form_select2.js"></script>
    <script src="<?php echo e(url('/')); ?>/asset/global_assets/js/demo_pages/form_checkboxes_radios.js"></script>
    <script src="<?php echo e(url('/')); ?>/asset/global_assets/js/demo_pages/form_validation.js"></script>
    <script src="<?php echo e(url('/')); ?>/asset/global_assets/js/demo_pages/datatables_responsive.js"></script>
    <script src="<?php echo e(url('/')); ?>/asset/tinymce/tinymce.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/asset/tinymce/init-tinymce.js"></script>
    <?php echo $__env->yieldContent('css'); ?>
</head>

<body class="">
    <!-- Main navbar -->
    <div class="navbar navbar-expand-md navbar-light navbar-static">
        <div class="navbar-header navbar-dark d-none d-md-flex align-items-md-center">
            <div class="navbar-brand navbar-brand-md">
                <a href="<?php echo e(url('/')); ?>" class="d-inline-block">
                    <img src="<?php echo e(url('/')); ?>/asset/<?php echo e($logo->image_link); ?>">
                </a>
            </div>

            <div class="navbar-brand navbar-brand-xs">
                <a href="<?php echo e(url('/')); ?>" class="d-inline-block">
                    <img src="<?php echo e(url('/')); ?>/asset/<?php echo e($logo->image_link); ?>">
                </a>
            </div>
        </div>
        <div class="d-md-none">
            <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
                <i class="icon-paragraph-justify3"></i>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                        <i class="icon-paragraph-justify3"></i>
                    </a>
                </li>
            </ul>
            <span class="navbar-text ml-md-3 mr-md-auto">
                <span class="badge badge-mark border-orange-300 mr-2"></span>
                Welcome back, <?php echo e(Auth::guard('admin')->user()->username); ?>

            </span>

            <ul class="navbar-nav">
                <li class="nav-item dropdown dropdown-user">
                    <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo e(url('/')); ?>/asset/profile/react.jpg" class="rounded-circle" alt="">
                        <span><?php echo e(Auth::guard('admin')->user()->username); ?></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="<?php echo e(route('admin.account')); ?>" class="dropdown-item"><i class="icon-lock"></i>
                            Account information</a>
                        <a href="<?php echo e(route('admin.logout')); ?>" class="dropdown-item"><i class="icon-switch2"></i>
                            Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="page-content">


        <!-- Main sidebar -->
        <div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

            <!-- Sidebar mobile toggler -->
            <div class="sidebar-mobile-toggler text-center">
                <a href="#" class="sidebar-mobile-main-toggle">
                    <i class="icon-arrow-left8"></i>
                </a>
                Navigation
                <a href="#" class="sidebar-mobile-expand">
                    <i class="icon-screen-full"></i>
                    <i class="icon-screen-normal"></i>
                </a>
            </div>
            <!-- /sidebar mobile toggler -->


            <!-- Sidebar content -->
            <div class="sidebar-content">

                <!-- User menu -->
                <div class="sidebar-user-material">
                    <div class="sidebar-user-material-body">
                        <div class="card-body text-center">
                            <h6 class="mb-0 text-white text-shadow-dark"><?php echo e($set->site_name); ?></h6>
                            <span class="font-size-sm text-white text-shadow-dark"><?php echo e($set->title); ?></span>
                        </div>
                    </div>
                    <div class="sidebar-user-material-footer">
                        <a href="#user-nav"
                            class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle"
                            data-toggle="collapse"><span>My account</span></a>
                    </div>
                </div>
                <div class="collapse" id="user-nav">
                    <ul class="nav nav-sidebar">
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.account')); ?>" class="nav-link">
                                <i class="icon-lock"></i>
                                <span>Account information</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.logout')); ?>" class="nav-link">
                                <i class="icon-switch2"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /user menu -->


                <!-- Main navigation -->
                <div class="card card-sidebar-mobile">
                    <ul class="nav nav-sidebar" data-nav-type="accordion">

                        <!-- Main -->
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link">
                                <i class="icon-home4"></i>
                                <span>
                                    Dashboard
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.banks.index')); ?>" class="nav-link">
                                <i class="icon-home"></i>
                                <span>
                                    Banks
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.data_operators.index')); ?>" class="nav-link">
                                <i class="icon-mobile3"></i>
                                <span>
                                    Data Operators
                                </span>
                            </a>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link"><i class="icon-lan2"></i><span>Transfer</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="Transfer">
                                <li class="nav-item"><a href="<?php echo e(route('admin.transfers')); ?>"
                                        class="nav-link"><i class="icon-office"></i>Transfer logs</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.referrals')); ?>"
                                        class="nav-link"><i class="icon-city"></i>Referral earnings</a></li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link"><i class="icon-user-plus"></i> <span>User
                                    Manangement</span></a>

                            <ul class="nav nav-group-sub" data-submenu-title="User Manangement">
                                <li class="nav-item"><a href="<?php echo e(route('admin.users')); ?>"
                                        class="nav-link"><i class="icon-user"></i> Client accounts</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.ticket')); ?>"
                                        class="nav-link"><i class="icon-bubbles5"></i>Support ticket</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('user.promo')); ?>"
                                        class="nav-link"><i class="icon-envelope"></i>Promotional Emails</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.message')); ?>"
                                        class="nav-link"><i class="icon-bubbles5"></i>Messages</a></li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link"><i class="icon-cogs spinner"></i> <span>System
                                    configuration</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="System configuration">
                                <li class="nav-item"><a href="<?php echo e(route('admin.setting')); ?>"
                                        class="nav-link"><i class="icon-hammer-wrench"></i>Settings</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.email')); ?>"
                                        class="nav-link"><i class="icon-envelope"></i>Email</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.sms')); ?>" class="nav-link"><i
                                            class="icon-bubble"></i>Sms</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.account')); ?>"
                                        class="nav-link"><i class="icon-user"></i>Account information</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link"><i class="icon-pulse2"></i>
                                <span>Investment</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="PY scheme">
                                <li class="nav-item"><a href="<?php echo e(route('admin.plans.create')); ?>"
                                        class="nav-link"><i class="icon-quill4"></i>Create plan</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.plans.index')); ?>"
                                        class="nav-link"><i class="icon-puzzle4"></i>Plans</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.py.completed')); ?>"
                                        class="nav-link"><i class="icon-cup2"></i>Completed</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.py.pending')); ?>"
                                        class="nav-link"><i class="icon-spinner2 spinner"></i>Pending</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.coupons.index')); ?>"
                                        class="nav-link"><i class="icon-add"></i>Generate Coupons</a></li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link"><i class="icon-pulse2"></i>
                                <span>Stake Plans</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="PY scheme">
                                <li class="nav-item"><a href="<?php echo e(route('admin.stake_plans.create')); ?>"
                                        class="nav-link"><i class="icon-quill4"></i>Create Stake Plans</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.stake_plans.index')); ?>"
                                        class="nav-link"><i class="icon-puzzle4"></i>Stake Plans</a></li>
                                
                            </ul>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link"><i class="icon-credit-card"></i><span>Deposit
                                    system</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="Deposit">
                                <li class="nav-item"><a href="<?php echo e(route('admin.deposit.method')); ?>"
                                        class="nav-link"><i class="icon-puzzle4"></i>Payment gateways</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.deposit.log')); ?>"
                                        class="nav-link"><i class="icon-list-unordered"></i>Deposit log</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.deposit.pending')); ?>"
                                        class="nav-link"><i class="icon-spinner2 spinner"></i>Pending
                                        deposit</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.deposit.approved')); ?>"
                                        class="nav-link"><i class="icon-thumbs-up2"></i>Approved deposit</a>
                                </li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.deposit.declined')); ?>"
                                        class="nav-link"><i class="icon-thumbs-down2"></i>Declined deposit</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link"><i class="icon-share2"></i><span>Withdraw
                                    system</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="Withdraw">
                                <li class="nav-item"><a href="<?php echo e(route('admin.withdraw.log')); ?>"
                                        class="nav-link"><i class="icon-list-unordered"></i>Withdraw log</a>
                                </li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.withdraw.unpaid')); ?>"
                                        class="nav-link"><i class="icon-spinner2 spinner"></i>Unpaid
                                        withdrawal</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.withdraw.approved')); ?>"
                                        class="nav-link"><i class="icon-thumbs-up2"></i>Approved withdrawal</a>
                                </li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.withdraw.declined')); ?>"
                                        class="nav-link"><i class="icon-accessibility"></i>Declined
                                        withdrawal</a></li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link"><i class="icon-share2"></i><span>Selfcashout
                                    system</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="Selfcashout">
                                <li class="nav-item"><a href="<?php echo e(route('admin.selfcashout.log')); ?>"
                                        class="nav-link"><i class="icon-list-unordered"></i>Selfcashout log</a>
                                </li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.selfcashout.unpaid')); ?>"
                                        class="nav-link"><i class="icon-spinner2 spinner"></i>Unpaid
                                        selfcashout</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.selfcashout.approved')); ?>"
                                        class="nav-link"><i class="icon-thumbs-up2"></i>Approved selfcashout</a>
                                </li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.selfcashout.declined')); ?>"
                                        class="nav-link"><i class="icon-accessibility"></i>Declined
                                        selfcashout</a></li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link"><i class="icon-share2"></i><span>Paymentproof
                                    system</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="Paymentproof">
                                <li class="nav-item"><a href="<?php echo e(route('admin.paymentproof.log')); ?>"
                                        class="nav-link"><i class="icon-list-unordered"></i>Paymentproof log</a>
                                </li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.paymentproof.pending')); ?>"
                                        class="nav-link"><i class="icon-spinner2 spinner"></i>Pending
                                        paymentproof</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.paymentproof.approved')); ?>"
                                        class="nav-link"><i class="icon-thumbs-up2"></i>Approved
                                        paymentproof</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.paymentproof.declined')); ?>"
                                        class="nav-link"><i class="icon-accessibility"></i>Declined
                                        paymentproof</a></li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link"><i class="icon-share2"></i><span>Data Operator
                                    Withdraw system</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="Dataoperator">
                                <li class="nav-item"><a href="<?php echo e(route('admin.data_withdraw.log')); ?>"
                                        class="nav-link"><i class="icon-list-unordered"></i>Data Operator
                                        Withdraw log</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.data_withdraw.unpaid')); ?>"
                                        class="nav-link"><i class="icon-spinner2 spinner"></i>Unpaid Data
                                        Operator Withdraw</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.data_withdraw.approved')); ?>"
                                        class="nav-link"><i class="icon-thumbs-up2"></i>Approved Data Operator
                                        Withdraw</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.data_withdraw.declined')); ?>"
                                        class="nav-link"><i class="icon-accessibility"></i>Declined Data
                                        Operator Withdraw</a></li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link"><i class="icon-magazine"></i> <span>News
                                    Section</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="News Section">
                                <li class="nav-item"><a href="<?php echo e(route('admin.blogs.create')); ?>"
                                        class="nav-link"><i class="icon-quill4"></i>New Post</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.blogs.index')); ?>"
                                        class="nav-link"><i class="icon-newspaper"></i>Articles</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.blog_categories.index')); ?>"
                                        class="nav-link"><i class="icon-clipboard6"></i>Category</a></li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link"><i class="icon-home4"></i> <span>Web
                                    control</span></a>

                            <ul class="nav nav-group-sub" data-submenu-title="News Section">
                                <li class="nav-item"><a href="<?php echo e(route('homepage')); ?>"
                                        class="nav-link"><i class="icon-home4"></i>Homepage</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.logo')); ?>"
                                        class="nav-link"><i class="icon-image2"></i>Logo & Favicon</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.review')); ?>"
                                        class="nav-link"><i class="icon-clipboard6"></i>Platform Review</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.service')); ?>"
                                        class="nav-link"><i class="icon-portfolio"></i>Services</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.vendors')); ?>"
                                        class="nav-link"><i class="icon-accessibility"></i>Vendors</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.coupons')); ?>"
                                        class="nav-link"><i class="icon-cogs"></i>Coupons</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.page')); ?>"
                                        class="nav-link"><i class="icon-stack"></i>Webpages</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.currency')); ?>"
                                        class="nav-link"><i class="icon-coin-euro"></i>Currency</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.faq')); ?>"
                                        class="nav-link"><i class="icon-question4"></i>FAQs</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('admin.terms')); ?>"
                                        class="nav-link"><i class="icon-file-check"></i>Terms & Condition</a>
                                </li>
                                <li class="nav-item"><a href="<?php echo e(route('privacy-policy')); ?>"
                                        class="nav-link"><i class="icon-file-check"></i>Privacy policy</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('about-us')); ?>"
                                        class="nav-link"><i class="icon-file-check"></i>About us</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('social-links')); ?>"
                                        class="nav-link"><i class="icon-share2"></i>Social Links</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /main navigation -->

            </div>
            <!-- /sidebar content -->

        </div>
        <div class="content-wrapper">
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-md-inline">
                    <div class="page-title d-flex">
                        <h4><span class="font-weight-semibold"><?php echo e($title); ?></span></h4>
                    </div>
                </div>
            </div>
            <?php echo $__env->yieldContent('content'); ?>


            <!-- footer begin -->
            
            <script src="<?php echo e(url('/')); ?>/asset/frontend/js/sweetalert.js"></script>
        </div>
        <!-- /page content -->

</body>

</html>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('script'); ?>
<?php if(session('success')): ?>
    <script>
        "use strict";
        $(document).ready(function() {
            swal("Success!", "<?php echo e(session('success')); ?>", "success");
        });
    </script>
<?php endif; ?>

<?php if(session('alert')): ?>
    <script>
        "use strict";
        $(document).ready(function() {
            swal("Sorry!", "<?php echo e(session('alert')); ?>", "error");
        });
    </script>
<?php endif; ?>
<script>
    <?php if(Session::has('message')): ?>
        "use strict";
        var type = "<?php echo e(Session::get('alert-type', 'info')); ?>";
        switch (type) {
            case 'info':
                toastr.info("<?php echo e(Session::get('message')); ?>");
                break;
            case 'warning':
                toastr.warning("<?php echo e(Session::get('message')); ?>");
                break;
            case 'success':
                toastr.success("<?php echo e(Session::get('message')); ?>");
                break;
            case 'error':
                toastr.error("<?php echo e(Session::get('message')); ?>");
                break;
        }
    <?php endif; ?>
</script>
<script type="text/javascript">
    $(window).on('load', function() {
        $('#modal-notification').modal('show');
    });
</script>
<?php /**PATH D:\xampp\htdocs\rubicnetwork\resources\views/admin/master.blade.php ENDPATH**/ ?>