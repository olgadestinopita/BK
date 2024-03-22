<!DOCTYPE html>
<html>

<head>
    <title></title>
   
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url() . 'assets/css/sb-admin-2.min.css' ?>" rel="stylesheet">

    <!-- Datatables-->
    <link href="<?php echo base_url() . 'assets/vendor/datatables/dataTables.bootstrap4.min.css' ?>" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md">
                <div class="card my-3">
                    <div class="card-header">
                        <div class="row justify-content-start">
                            <img class="col-1 ml-5" src="<?php echo base_url() . 'assets/img/logo.png' ?>">
                            <div class="col-10 text-center">
                                <h2 class="center">SMAN 1 V KOTO TIMUR</h2>
                                <h5 class="center">Jl. Raya Pariaman - P. ALAI</h5>
                            </div>
                        </div>
                        
                        <hr>
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
                                <th>Guru</th>
                                <th>Jenis Bimbingan</th>
                                <th>Keterangan</th>
                                <th>Tanggal</th>
                                </tr> 
                    


                            </tr>
                            <?php
                            $no = 1;
                            foreach ($data_bimbingan as $bimbingan) {
                            ?>
                                <tr>
                                    <th class="center"><?php echo $no++ ?></th>
                                    
                                    <td><?php echo $bimbingan->nama_guru ?></td>
                                    
                                    <td><?php echo $bimbingan->kategori_bimbingan ?></td>
                                    <td><?php echo $bimbingan->keterangan ?></td>
                                    <td><?php echo $bimbingan->tgl_bimpel ?></td> 
                                </tr>
                            <?php
                            }
                            ?>
                         </table>
                        </div>
                        

                        <div class="row justify-content-end">
                            <div class="col-3 pr-5">
                                    <p>Padang, <?= date('d M Y'); ?><br>Kepala Sekolah
                                        <br><br><br>
                                    <?php echo $kepala_sekolah->nama_guru ?><br>
                                   NIP. <?php echo $kepala_sekolah->nip ?><br>
                                    <hr style="border-top:2px solid black;">
                                    </p>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>