                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
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
                            <p class="card-text">Jabatan: <?php echo $guru->jabatan?></p>
                            <p class="card-text">Status:<?php echo $guru->status?> </p>
                            <p class="card-text">Email: <?php echo $guru->email_g?></p>
                            <p class="card-text"><small class="text-muted">Aktif: <?php echo date('d F Y');?></small></p>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>    
                </div>
           