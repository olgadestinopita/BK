                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex justify-content-between">
                                <h4 class="my-auto font-weight-bold text-primary">Data Bimbingan Siswa</h4>
                                <div class="d-flex">
                                   <?php 
                                    if (($role_id == 1) or ($role_id == 2 )or ($role_id ==3  )or ($role_id == 6 )){
                                    ?>
                                    <a href="#' ?>" class="btn btn-primary shadow-sm" data-toggle="modal" data-target="#addBimpel"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
                               <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="text-primary">
                                                <th>No.</th>
                                                <!-- <th>ID Bimbingan</th> -->

                                                <th>Nama Siswa</th>
                                                <th>Kelas</th>
                                                <th>Guru</th>
                                                <th>Jenis Bimbingan</th>
                                                <th>Keterangan</th>
                                                <th>Tanggal Bimbingan</th>
                                                <?php 
                                    if (($role_id == 2 )or ($role_id == 3  )or ($role_id == 6 )or ($role_id == 4 )){
                                        ?>
                                                <th>Kirim Pesan</th>
                                                <?php }?>
                                   
                                                <?php   
                                                if (($role_id == 1) or ($role_id == 2 )or ($role_id == 3  )or ($role_id == 6 )){
                                    ?>
                                                <th>Aksi</th>
                                                <?php }?>
                                    
                                            </tr>
                                        </thead>
                                        <tfoot>

                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($data_bimbingan as $bimpel) {
                                            ?>
                                                <tr>
                                                    <th><?php echo $no++ ?></th>
                                                    <!-- <td><?php echo $bimpel->id_bimpel ?></td> -->

                                                    <td><?php echo $bimpel->nama ?></td>
                                                    <td><?php echo $bimpel->kelas ?></td>
                                                    <td><?php echo $bimpel->nama_guru ?></td>
                                                    <td><?php echo $bimpel->kategori_bimbingan ?></td>
                                                    <td><?php echo $bimpel->keterangan ?></td>
                                                    <td><?php echo $bimpel->tgl_bimpel ?></td>
                                                    <?php 
                                    if (($role_id == 2 )or ($role_id ==3  )or ($role_id == 6 )or ($role_id ==4  )){
                                    ?>

                                                        <td class="action-icons">   
                                                        <a href="<?php echo base_url() . 'chat/room/'.$bimpel->NIS.'/'.$bimpel->NIP?>">
                                                            <i title="chat" class="fas fa-paper-plane"></i><span class="badge badge-danger"><?php foreach ($notif as $n) { if ($n->nip==$bimpel->NIP and $n->nis==$bimpel->NIS) { echo $n->jumlah_notif;}}?></span>
                                                        </a>
                                                        <?php
                                    }
                                    ?>

                                                        <?php 
                                                        if (($role_id == 1) or ($role_id == 2 )or ($role_id ==3  )or ($role_id == 6 )){
                                    ?>   
                                                    <td class="action-icons">
                                                        <a hhref="#" data-toggle="modal" data-target="#editBimpel<?php echo $bimpel->id_bimpel ?>">
                                                            <i title="ubah" class="fas fa-edit text-lg text-warning"></i>
                                                        </a> |
                                                        <a href="<?php echo base_url() . 'bimbingan/delete/' . $bimpel->id_bimpel ?>">
                                                            <i title="hapus" class="fas fa-trash-alt text-lg text-danger"></i>
                                                        </a>
                                                        
                                                        <?php
                                    }
                                    ?>
                                                    </td>
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

                    <!-- Modal for adding new data -->
                    <div class="modal fade" id="addBimpel" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formAddBimpel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formAddBimpelLabel">Input Data Bimbingan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form name="form_add_Bimbingan" action="<?php echo base_url() . 'bimbingan/add' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                                    <div class="modal-body">
                                       
                                        <div class="form-group">
                                            <label class="control-label text-primary">Kelas</label>
                                            <select id="select1" name="id_kls" class="form-control" required>
                                                <option value="">--Pilih kelas--</option>

                                                <?php
                                                foreach ($data_kelas as $kelas) {
                                                ?>
                                                    <option value="<?php echo $kelas->id_kls ?>">
                                                        <?php echo $kelas->id_kls . ' ' . $kelas->kelas ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                Pilih Siswa!
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label text-primary">Nama Siswa</label>
                                            <select id="select" name="nis" class="form-control" required>
                                                <option value="">--Pilih Siswa--</option>

                                               
                                            </select>
                                            <div class="invalid-feedback">
                                                Pilih Siswa!
                                            </div>
                                        </div>


                                        <hr>

                                        <div class="form-group">
                                            <label class="control-label text-primary">Jenis Bimbingan</label>
                                            <select name="id_jbim" class="form-control" required>
                                                <option value="">--Pilih Jenis Bimbingan--</option>
                                                <?php
                                                foreach ($data_jbimbingan as $jenis_bimbingan) {
                                                ?>
                                                    <option value="<?php echo $jenis_bimbingan->id_jbim ?>">
                                                        <?php echo $jenis_bimbingan->id_jbim . ' ' . $jenis_bimbingan->kategori_bimbingan ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                Pilih Jenis Bimbingan!
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="form-group">
                                            <label class="control-label text-primary">Keterangan</label>
                                            <textarea class="form-control" placeholder="Keterangan" rows="5" name="keterangan" required></textarea>
                                            <div class="invalid-feedback">
                                                Isikan keterangan!
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label class="control-label text-primary">Tanggal</label>
                                            <input type="date" class="form-control" placeholder="" name="tgl_bimpel" required>
                                            <div class="invalid-feedback">
                                                Isikan ID dengan angka!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer d-flex">
                                        <button type="button" class="flex-fill btn btn-secondary btn-user" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="flex-fill btn btn-primary btn-user">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal for editing existing data -->
                    <?php
                    foreach ($data_bimbingan as $bimpel) {
                    ?>
                        <div class="modal fade" id="editBimpel<?php echo $bimpel->id_bimpel ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formBimpel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formEditBimbinganLabel">Ubah Data Bimbingan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form name="form_edit_bimbingan" action="<?php echo base_url() . 'bimbingan/edit' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label class="control-label text-primary">ID_jbim</label>
                                                <input type="text" class="form-control" placeholder="ID_jbim" autofocus name="id_bimpel" pattern="\d{5}" value="<?php echo $bimpel->id_bimpel ?>" readonly>

                                            </div>
                                            <hr>

                                            <div class="form-group">
                                                <label class="control-label text-primary">Nama Siswa</label>
                                                <input class="form-control" name="nis" pattern="/d{10}" value="<?php
                                                                                                                foreach ($data_siswa as $siswa) {
                                                                                                                        if ($siswa->nis === $bimpel->nis) {
                                                                                                                    echo $bimpel->nis . ' ' . $siswa->nama;
                                                                                                                    }
                                                                                                                }
                                                                                                                ?>" readonly>

                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label class="control-label text-primary">Nama Guru</label>
                                                <input type="text" class="form-control" placeholder='Wali Kelas' name="nip" value="<?php
                                                                                                                                    foreach ($data_guru as $guru) {
                                                                                                                                        if ($guru->nip === $bimpel->nip) {
                                                                                                                                            echo $bimpel->nip . ' ' . $guru->nama_guru;
                                                                                                                                        }
                                                                                                                                    }
                                                                                                                                    ?>" readonly>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label class="control-label text-primary">Kategori Bimbingan</label>
                                                <input type="text" class="form-control" placeholder='Kategori Bimbingan' name="id_jbim" value="<?php
                                                                                                                                                foreach ($data_jbimbingan as $jenis_bimbingan) {
                                                                                                                                                    if ($jenis_bimbingan->id_jbim === $bimpel->id_jbim) {
                                                                                                                                                        echo $bimpel->id_jbim . ' ' . $jenis_bimbingan->kategori_bimbingan;
                                                                                                                                                    }
                                                                                                                                                }
                                                                                                                                                ?>" readonly>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label class="control-label text-primary">Keterangan</label>
                                                <input type="text" class="form-control" placeholder='Keterangan' name="keterangan" value="<?php echo $bimpel->keterangan ?>" required>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label class="control-label text-primary">Kategori Bimbingan</label>
                                                <input type="date" class="form-control" placeholder='Tanggal Bimbingan' name="tgl_bimpel" value="<?php echo $bimpel->tgl_bimpel ?>" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer d-flex">
                                            <button type="button" class="flex-fill btn btn-secondary btn-user" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="flex-fill btn btn-primary btn-user">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <script src="<?php echo base_url() . 'assets/vendor/jquery/jquery.min.js' ?>"></script>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('#select1').change(function() {
                                var id_kls = $('#select1').val()
                                $.ajax({
                                    url: "<?php echo base_url('bimbingan/daftar_siswa/') ?>" + id_kls,
                                    dataType: "json",
                                    type: "get",
                                    success: function(obj) {
                                    for (var i = 0; i <obj.length; i++) {
                                    var html = `<option value="${obj[i]['nis']}">
                                                ${obj[i]['nis']} ${obj[i]['nama']} 
                                                </option>`;
                                    $("#select").append(html);
                                     }
                                    }
                                });
                            });
                         });
                            </script>