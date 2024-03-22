    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h4 class="my-auto font-weight-bold text-primary">Data Bimbingan Persiswa</h4>
                <div class="d-flex">
                        <a href="<?php echo base_url() . 'pelanggaran/print_siswa/'.$siswa->nis ?>" class="btn btn-warning shadow-sm"><i
                        class="fas fa-print fa-sm text-white-50"></i> Print</a>
                        </div>         
                     </div>
                     <div class="card-body">
                                Nama Siswa :     <?php echo $siswa->nama ?><br>
                                No Induk Siswa : <?php echo $siswa->nis ?><br>
                                Kelas Siswa :    <?php echo $siswa->kelas ?> <br>
                                Wali Kelas :     <?php echo $siswa->nama_guru ?><br>
                                <br>
                                <div class="row">
                             <table class="table table-striped border">
                               <tr>
                                <th class="center" id="no">No.</th>
                                <th>Nama Pelanggaran</th>
                                <th>Kategori Pelanggaran</th>
                                <th>Bobot</th>
                                <th>Sanksi</th>
                                <th>Keterangan</th>
                                <th>Tanggal</th>
                                </tr> 
                                <?php
                                 $no = 1;
                                foreach ($data_pelanggaran as $bimpel) {
                                ?>
                                 <tr>
                                <th><?php echo $no++ ?></th>
                            
                             <td><?php echo $bimpel->jpel ?></td>
                             <td><?php echo $bimpel->kategori ?></td>
                             <td><?php echo $bimpel->bobot ?></td>
                             <td><?php echo $bimpel->sanksi ?></td>
                             <td><?php echo $bimpel->keterangan?></td>
                            <td><?php echo $bimpel->tgl_bimpel ?></td>
                            
                            <?php
                                    }
                                    ?> 
                                </tr>   
                                </table>
                        </div> 
                        </div>
                        
                        
        </div>
    </div>
    </div>