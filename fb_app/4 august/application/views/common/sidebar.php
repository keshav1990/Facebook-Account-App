<div class="page-sidebar-wrapper">
                <!-- END SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="nav-item start ">
                            <a href="<?php echo base_url('ManageAccounts/'); ?>" class="nav-link">
                                <i class="fa fa-cog  fa-4x"></i>
                                <span class="title">Manage Auction</span>
                                <span class="arrow"></span>
                            </a>
                           
                        </li>
						 <li class="nav-item start ">
                            <a href="<?php echo base_url('ManageAccounts/create_account'); ?>" class="nav-link">
                                <i class="fa fa-user"></i>
                                <span class="title">Add New Auction</span>
                                <span class="arrow"></span>
                            </a>
                           
                        </li>
                        <li class="nav-item start ">
                            <a href="<?php echo base_url('ManageAccounts/manageDetail'); ?>" class="nav-link">
                                <i class="fa fa-user"></i>
                                <span class="title">Video's</span>
                                <span class="arrow"></span>
                            </a>
                           
                        </li>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>