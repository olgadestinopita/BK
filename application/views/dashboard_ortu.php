                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>
                    <!-- Content Row -->
                    <div class="row">

                       
                        <!-- Number of Rows ofTable -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Bimbingan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $n_bimbingan ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Number of Rows of  Table -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pelanggaran
                                            </div>
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $n_pelanggaran ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-exclamation-triangle text-danger fa-2x -300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Number of Rows of Prestasi Siswa Table -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Prestasi</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $n_prestasi ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-trophy fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    <div class="card-header bg-primary"style="max-width: 540px">
            <h4 class="my-auto font-weight-bold text-light">Profil</h4>
            </div>
                    <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                         <img width="200px" class="user" src="<?php echo base_url() . 'assets/img/default.png' ?>">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><strong><?php echo $nama_user?></strong></h5>
                            <p class="card-text">Pekerjaan: <?php echo $ortu->nama_kerja?> </p>
                            <p class="card-text">No.HP: <?php echo $ortu->tlp_ortu?></p>
                            <p class="card-text"><small class="text-muted">Aktif: <?php echo date('d F Y');?></small></p>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>    
                </div>
                   
           
                   
           