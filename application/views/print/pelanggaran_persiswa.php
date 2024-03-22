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
                            <td><?php echo $bimpel->sanksi?></td>
                            <td><?php echo $bimpel->keterangan ?></td>
                            <td><?php echo $bimpel->tgl_bimpel ?></td>
                            
                            <?php
                                    }
                                    ?> 
                                </tr>   
                                </table>
                        </div> 
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