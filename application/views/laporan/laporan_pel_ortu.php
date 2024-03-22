                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h4 class="my-auto font-weight-bold text-primary">Pelanggaran Siswa</h4>
                        </div>
                        <div class="card-body">
        
                            <div class="table-responsive mt-3">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-primary">
                                            <th>No.</th>
                                            <th>NIS</th>
                                            <th>Nama siswa</th>
                                            <th>Kelas</th>
                                            <th>Wali Kelas</th>
                                            <th>Jumlah Bobot</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data_pelanggaran as $pelanggaran) {
                                               
                                        ?>
                                        
                                            <tr>
                                                <th><?php echo $no++ ?></th>
                                                <td><?php echo $pelanggaran->nis ?></td>
                                                <td><?php echo $pelanggaran->nama ?></td>
                                                <td><?php echo $pelanggaran->kelas ?></td>
                                                <td><?php echo $pelanggaran->nama_guru ?></td>
                                                <!-- <td><?php echo $pelanggaran->jpel?></td> -->
                                                <td><?php echo $pelanggaran->total_bobot; 
                                                if ($pelanggaran->total_bobot >200) {
                                                   echo ' <i title="bobot melebihi 200 point"class="fas fa-exclamation-triangle text-danger"></i>';
                                                }
                                                ?> </td>
                                                <td class="action-icons">
                                                    <a target="new" href="<?php echo base_url().'pelanggaran/pelanggaran_siswa/'; ?><?php echo $pelanggaran->nis; ?>" class="btn btn-xs btn-danger">detail</a>
                                                
                                                </td>
                                               


                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->