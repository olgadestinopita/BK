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
                        <!-- <h1>Data siswa</h1> -->
                        
                        <div class="row">
                        <?php if ($kelas != 'all') {
                            echo 'Kelas: ' . $kelas;
                        } ?>
                        </div>
                        <div class="row">
                        <table class="table table-striped border">
                            <tr>
                                <th class="center" id="no">No.</th>
                                <th class="center">NIS</th>
                                <th>Nama siswa</th>
                                <th>Kelas</th>
                                <th>Wali Kelas</th>
                                <!-- <th>Pelanggaran</th> -->
                                <th>Jumlah Bobot</th>
                                
                                


                            </tr>
                            <?php
                            $no = 1;
                            foreach ($data_pelanggaran as $pelanggaran) {
                            ?>
                                <tr>
                                    <th class="center"><?php echo $no++ ?></th>
                                    
                                    <td><?php echo $pelanggaran->nis ?></td>
                                    <td><?php echo $pelanggaran->nama ?></td>
                                    <td><?php echo $pelanggaran->nama_guru ?></td>
                                    <td><?php echo $pelanggaran->kelas ?></td>
                                    <!-- <td><?php echo $pelanggaran->jpel ?></td> -->
                                    <td><?php echo $pelanggaran->total_bobot ?></td>
                                    <!-- <td><?php echo $pelanggaran->sanksi ?></td>
                                    <td><?php echo $pelanggaran->keterangan ?></td>
                                    <td><?php echo $pelanggaran->tgl_bimpel ?></td>
                                     -->


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
                                    <p>Drs.Oyong Aziz</p>
                                    <p>_______________________</p>
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