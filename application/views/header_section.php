<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
                <a class="b-brand">
                    <div class="b-bg">
                        <i class="feather icon-trending-up"></i>
                    </div>
                    <span class="b-title">Staff List</span>
                </a>
                <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
            </div>
            <div class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">
                    <li data-username="Table bootstrap datatable footable" class="nav-item">
                        <a href="<?= base_url('Home_controller/staff_list');?>"><span class="pcoded-micon"></span><span
                                class="pcoded-mtext">Staff</span></a>
                    </li>
                    <?php if($this->session->userdata('login_type') == 'Admin'):?>
                    <li data-username="form elements advance componant validation masking wizard picker select"
                        class="nav-item">
                        <a href="<?= base_url('Home_controller/emp_list');?>" class="nav-link "><span
                                class="pcoded-micon"></span><span class="pcoded-mtext">Employee</span></a>
                    </li>
                    <?php endif?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->