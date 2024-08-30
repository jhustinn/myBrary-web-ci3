<?php $uri = $this->uri->segment(1); ?>

<!-- BEGIN: Mobile Menu -->
<div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="" class="flex mr-auto">
                    <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="<?= base_url('assets/midone/') ?>dist/images/logo.svg">
                </a>
                <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            </div>
            <ul>
                    <li>
                        <a href="<?= base_url('Admin') ?>" class="menu <?php if($uri == 'Admin') echo 'menu--active';?>">
                            <div class="menu__icon"> <i data-feather="home"></i> </div>
                            <div class="menu__title"> Dashboard </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('Officers') ?>" class="menu <?php if($uri == 'Officers') echo 'menu--active';?>"">
                            <div class="menu__icon"> <i data-feather="users"></i> </div>
                            <div class="menu__title"> Officers </div>
                        </a>
                    </li>



                    <li class="nav__devider my-6"></li>
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"> <i data-feather="edit"></i> </div>
                            <div class="menu__title"> Crud <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="menu-crud-data-list.html" class="menu">
                                    <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="menu__title"> Data List </div>
                                </a>
                            </li>
                            <li>
                                <a href="menu-crud-form.html" class="menu">
                                    <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="menu__title"> Form </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
        </div>
        <!-- END: Mobile Menu -->



        <div class="flex">
            <!-- BEGIN: Side Menu -->
            <nav class="side-nav">
                <a href="" class="intro-x flex items-center pl-5 pt-4">
                    <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="<?= base_url('assets/midone/') ?>dist/images/logo.svg">
                    <span class="hidden xl:block text-white text-lg ml-3"> Mid<span class="font-medium">one</span> </span>
                </a>
                <div class="side-nav__devider my-6"></div>
                <ul>
                    <li>
                        <a href="<?= base_url('Admin') ?>" class="side-menu <?php if($uri == 'Admin') echo 'side-menu--active';?>">
                            <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                            <div class="side-menu__title"> Dashboard </div>
                        </a>
                    </li>
                    <?php if($this->session->userdata('level') == 'admin') { ?>
                    <li>
                        <a href="<?= base_url('Officers') ?>" class="side-menu <?php if($uri == 'Officers') echo 'side-menu--active';?>"">
                            <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                            <div class="side-menu__title"> Officers </div>
                        </a>
                    </li>
                    <?php } ?>
                    
                    
                    
                    
                    <li class="side-nav__devider my-6"></li>
                    <li>
                        <a href="<?= base_url('Books') ?>" class="side-menu <?php if($uri == 'Books') echo 'side-menu--active';?>"">
                            <div class="side-menu__icon"> <i data-feather="book"></i> </div>
                            <div class="side-menu__title"> Books </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('Category') ?>" class="side-menu <?php if($uri == 'Category') echo 'side-menu--active';?>"">
                            <div class="side-menu__icon"> <i data-feather="tag"></i> </div>
                            <div class="side-menu__title"> Category </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('ReadList') ?>" class="side-menu <?php if($uri == 'ReadList') echo 'side-menu--active';?>"">
                            <div class="side-menu__icon"> <i data-feather="list"></i> </div>
                            <div class="side-menu__title"> Read List </div>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">

            <!-- BEGIN: Top Bar -->
            <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="" class="">Application</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">Dashboard</a> </div>
                    <!-- END: Breadcrumb -->

                    <!-- BEGIN: Account Menu -->
                    <div class="intro-x dropdown w-8 h-8 relative">
                        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
                            <img alt="Midone Tailwind HTML Admin Template" src="<?= base_url('assets/midone/') ?>dist/images/profile-12.jpg">
                        </div>
                        <div class="dropdown-box mt-10 absolute w-56 top-0 right-0 z-20">
                            <div class="dropdown-box__content box bg-theme-38 text-white">
                                <div class="p-4 border-b border-theme-40">
                                    <div class="font-medium"><?= $user->name ?></div>
                                    <div class="text-xs text-theme-41"><?= $user->level ?></div>
                                </div>
                                <div class="p-2 border-t border-theme-40">
                                    <a href="<?= base_url('Auth/logout') ?>" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Account Menu -->
                </div>
                <!-- END: Top Bar -->
                <?php if($this->session->flashdata('message')) {
                            echo $this->session->flashdata('message');
                        } ?>