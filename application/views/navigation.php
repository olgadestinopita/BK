<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper" class="p-0">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->

            <div class="sidebar-brand-icon">
                <img class="logo" src="">
            </div>
            <div class="sidebar-brand-text mx-3"></div>
            </a>

            <!-- Divider -->


            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">

                <?php if ($this->session->userdata('role_id') == 1) : ?>
                    <a class="nav-link" href="<?php echo base_url() . 'dashboard' ?>">

                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Master Data
            </div>
            <!-- Nav Item - Master Data Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Master Data</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url() ?>siswa">Siswa</a>
                        <a class="collapse-item" href="<?php echo base_url() ?>ortu">Orang Tua</a>
                        <a class="collapse-item" href="<?php echo base_url() ?>guru">Guru</a>
                        <a class="collapse-item" href="<?php echo base_url() ?>walas">Wali Kelas</a>
                        <a class="collapse-item" href="<?php echo base_url() ?>kelas">Kelas</a>
                        <a class="collapse-item" href="<?php echo base_url() ?>jenis_bimbingan">Jenis Bimbingan</a>
                        <a class="collapse-item" href="<?php echo base_url() ?>jenis_pelanggaran">Jenis Pelanggaran</a>
                        <a class="collapse-item" href="<?php echo base_url() ?>kategori_pelanggaran">Kategori Pelanggaran</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Konseling
            </div>
            <!-- Nav Item - Master Data Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Konseling</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                       <a class="collapse-item" href="<?php echo base_url() ?>bimbingan">Bimbingan</a>
                        <a class="collapse-item" href="<?php echo base_url() ?>pelanggaran">Pelanggaran</a>
                        <a class="collapse-item" href="<?php echo base_url() ?>prestasi">Prestasi</a>
    
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Report Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiess" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Laporan Kelas</span>
                </a>
                <div id="collapseUtilitiess" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url() ?>siswa/laporan">Siswa</a>
                        <a class="collapse-item" href="<?php echo base_url() ?>prestasi/laporan">Prestasi</a>
                        </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Report Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Laporan Konseling</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url() ?>bimbingan/laporan">Bimbingan</a>
                        <a class="collapse-item" href="<?php echo base_url() ?>pelanggaran/laporan">Pelanggaran</a>
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Heading -->
            <div class="sidebar-heading">
               Akun
            </div>
            <!-- Nav Item - Data Mahasiswa -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() ?>akun">
                    <i class="fas fa-fw fa-edit"></i>
                    <span>Buat Akun</span>
                </a>
            </li>    
        <?php endif ?>
          <!-- Divider --> 
        <?php if ($this->session->userdata('role_id') == 2) : ?>
            <a class="nav-link" href="<?php echo base_url() .'dashboard_guru' ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Konseling
                </div>
                <!-- Nav Item - Master Data Collapse Menu -->
                <!-- Nav Item - Data Bimbingan -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() ?>bimbingan">
                        <i class="fas fa-fw fa-book"></i>
                        <span>Bimbingan</span>
                    </a>
                </li>
           
        <?php endif ?>

        <?php if ($this->session->userdata('role_id') == 3) : ?>
            <a class="nav-link" href="<?php echo base_url() .'dashboard_walas' ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Data Siswa
            </div>
            <!-- Nav Item - Master Data Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Siswa</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url() ?>siswa">Siswa</a>
                        <a class="collapse-item" href="<?php echo base_url() ?>prestasi">Prestasi</a>
                        

                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Konseling
            </div>
            <!-- Nav Item - Master Data Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Data Konseling</span>
                </a>
                <div id="collapseTwoo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url() ?>bimbingan">Bimbingan</a>
                        <a class="collapse-item" href="<?php echo base_url()?>pelanggaran">Pelanggaran</a>
                    </div>
                </div>
            </li>
            
             
        <?php endif ?>


        <?php if ($this->session->userdata('role_id') == 4) : ?>
            <a class="nav-link" href="<?php echo base_url() . 'dashboard_siswa' ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>

                <span>Dashboard</span></a>
            <hr class="sidebar-divider">

            <!-- Divider -->

            <!-- Heading -->
            <div class="sidebar-heading">
                Konseling
            </div>
            <!-- Nav Item - Master Data Collapse Menu -->
            <!-- Nav Item - Data Bimbingan -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() ?>bimbingan">
                    <i class="fas fa-fw fa-edit"></i>
                    <span>Bimbingan</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Nav Item - Data Pelanggaran -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() ?>pelanggaran">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Pelanggaran</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Nav Item - Data Pelanggaran -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() ?>prestasi">
                    <i class="fas fa-fw fa-gift"></i>
                    <span>Prestasi</span>
                </a>
            </li>
           
        <?php endif ?>

        <?php if ($this->session->userdata('role_id') == 5) : ?>
            <a class="nav-link" href="<?php echo base_url() . 'dashboard_ortu' ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
             Konseling
            </div>
            <!-- Nav Item - Master Data Collapse Menu -->
            <!-- Nav Item - Data Bimbingan -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() ?>bimbingan">
                    <i class="fas fa-fw fa-edit"></i>
                    <span>Bimbingan</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Nav Item - Data Pelanggaran -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() ?>pelanggaran">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Pelanggaran</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Nav Item - Data Pelanggaran -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() ?>prestasi">
                    <i class="fas fa-fw fa-gift"></i>
                    <span>Prestasi</span>
                </a>
            </li>
           
        <?php endif ?>
        <!-- Nav Item - Data Ortu -->
                <?php if ($this->session->userdata('role_id') == 6) : ?>
                    <a class="nav-link" href="<?php echo base_url() . 'dashboard' ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
                <!-- Divider -->
            <hr class="sidebar-divider">
           <!-- Heading -->
           <div class="sidebar-heading">
                Master Data
            </div>
            <!-- Nav Item - Master Data Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Master Data</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url() ?>siswa">Siswa</a>
                        <a class="collapse-item" href="<?php echo base_url() ?>jenis_bimbingan">Jenis Bimbingan</a>
                        <a class="collapse-item" href="<?php echo base_url() ?>jenis_pelanggaran">Jenis Pelanggaran</a>
                        <a class="collapse-item" href="<?php echo base_url() ?>kategori_pelanggaran">Kategori Pelanggaran</a>
                    </div>
                </div>
                 </li>
                <!-- Heading -->
                <div class="sidebar-heading">
                                Konseling
            </div>
            <!-- Nav Item - Master Data Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Konseling</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                       <a class="collapse-item" href="<?php echo base_url() ?>bimbingan">Bimbingan</a>
                        <a class="collapse-item" href="<?php echo base_url() ?>pelanggaran">Pelanggaran</a>
                        <a class="collapse-item" href="<?php echo base_url() ?>prestasi">Prestasi</a>
    
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">

        <!-- Nav Item - Report Collapse Menu -->
        <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-folder"></i>
        <span>Laporan Konseling</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url() ?>bimbingan/laporan">Bimbingan</a>
            <a class="collapse-item" href="<?php echo base_url() ?>pelanggaran/laporan">Pelanggaran</a>
            <a class="collapse-item" href="<?php echo base_url() ?>prestasi/laporan">Prestasi</a></div>
    </div>
</li>
 
            <?php endif ?>
            <!-- Divider -->
            <?php if ($this->session->userdata('role_id') == 7) : ?>
            <a class="nav-link" href="<?php echo base_url() . 'dashboard_kepsek' ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
             Konseling
            </div>
            <!-- Nav Item - Master Data Collapse Menu -->
            <!-- Nav Item - Data Bimbingan -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() ?>bimbingan">
                    <i class="fas fa-fw fa-edit"></i>
                    <span>Bimbingan</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Nav Item - Data Pelanggaran -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() ?>pelanggaran">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Pelanggaran</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Nav Item - Data Pelanggaran -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() ?>prestasi">
                    <i class="fas fa-fw fa-gift"></i>
                    <span>Prestasi</span>
                </a>
            </li>
            

            <!-- Nav Item - Report Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Laporan Konseling</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url() ?>bimbingan/laporan">Bimbingan</a>
                        <a class="collapse-item" href="<?php echo base_url() ?>pelanggaran/laporan">Pelanggaran</a>
                    </div>
                </div>
            </li>
          
            <!-- Heading -->
            
        <?php endif ?>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav mr-auto">

                        <!-- Web Page Logo -->
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <img class="logo" src="<?php echo base_url() . 'assets/img/logo.png' ?>">
                            </a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Web Page Title -->
                        <li class="nav-item mx-1">
                            <a class="nav-link" href="#">
                                <div class="text-lg text-primary font-weight-bold">SISFO Bimbingan Konseling SMAN 1 V KOTO TIMUR</div>
                            </a>
                        </li>


                    </ul>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-900 small"><?php echo $nama_user; ?></span>

                                <img class="img-profile rounded-circle" src="<?php echo base_url() . 'assets/img/default.png' ?>">


                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">



                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                 Keluar
                                </a>
                            </div>
                        </li>




                </nav>
                <!-- End of Topbar -->

                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="logoutModalLabel">Anda yakin akan keluar?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                            <div class="modal-body mx-3 mb-4">Pilih tombol "Keluar" di bawah jika anda siap untuk mengakhiri sesi ini.</div>
                            <div class="modal-footer d-flex m-3">
                                <button class="flex-fill btn btn-secondary p-2 rounded-pill" type="button" data-dismiss="modal">Batal</button>
                                <a class="flex-fill btn btn-primary p-2 rounded-pill" href="<?php echo base_url() . 'welcome/logout' ?>">Keluar</a>
                            </div>
                        </div>
                    </div>
                </div>
 