    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h4 class="my-auto font-weight-bold text-primary">Data Siswa</h4>
                <div class="d-flex">
        <a href="#' ?>" class="btn btn-primary shadow-sm" data-toggle="modal" data-target="#addSiswa"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
                   

                 </div>
             </div>
            
             <div class="card-body">
                 <?php 
                                    if (($role_id == 1) or ($role_id == 6)){

                                
                                    ?>
                 <form name="form_filter_siswa" action="<?php echo base_url() . 'siswa/siswa_filter' ?>" method="post" class="w-25 user needs-validation mx-3 mb-4" novalidate>
                    <div class="form-group">
                        <label class="control-label text-primary">Kelas</label>
                        <select class="form-control" name="kelas" required autofocus>


                            <option value="all">Semua Kelas</option>
                            <?php
                            foreach ($data_kelas as $kelas) {
                            ?>
                                <option value="<?php echo $kelas->id_kls ?>" <?php if (set_value('kelas') == $kelas->id_kls) {
                                                                                    echo 'selected';
                                                                                } ?>>
                                    <?php echo $kelas->kelas ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    <button type="submit" class="flex-fill btn btn-primary btn-user px-3">Cari</button>
                  </form>
                
                 <?php
                                    }
                                    ?>
                 <div class="table-responsive">


                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-primary">
                                <th>No.</th>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Email</th>
                                <th>No.HP</th>
                                <?php 
                                    if (($role_id == 1) or ($role_id == 6)) {

                                
                                    ?>
                                <th>Kelas</th>
                                <th>Wali Kelas</th>
                                 <?php
                                    }
                                    ?>
                                <th>Orang Tua</th>
                                <th>Alamat</th>
                               <?php 
                                    if (($role_id == 1) or ($role_id == 3) or ($role_id == 6)) {

                                
                                    ?>
                                    
                                <th>Aksi</th>
                                <?php
                                    }
                                    ?>
                                    
                            </tr>
                        </thead>
                        <tfoot>

                        </tfoot>
                        <tbody>
                            <?php
                            $no = 1;

                            // var_dump($data_siswa);

                            foreach ($data_siswa as $siswa) {
                            ?>
                                <tr>
                                    <th><?php echo $no++ ?></th>
                                    <td><?php echo $siswa->nis ?></td>
                                    <td><?php echo $siswa->nama ?></td>
                                    <td><?php echo $siswa->jk ?></td>
                                    <td><?php echo $siswa->tempat_lahir ?></td>
                                    <td><?php echo $siswa->tgl_lahir ?></td>
                                    <td><?php echo $siswa->email ?></td>
                                    <td><?php echo $siswa->no_hp ?></td>
                                    <?php 
                                    if (($role_id == 1) or ($role_id == 6)) {
                                    ?>
                                    <td> <span class="row px-3"> 
                                    <span class="row px-3 text-primary text-xs"><?php echo $siswa->id_kls ?></span>
                                    <?php echo $siswa->kelas ?></span></td>
                                    <td> <span class="row px-3">
                                    <span class="row px-3 text-primary text-xs"><?php echo $siswa->id_walas ?></span>
                                    <?php echo $siswa->nama_guru ?></span></td>
                                    <?php
                                    }
                                    ?>
                                    <td><?php echo $siswa->nama_ortu ?></td>
                                    <td><?php echo $siswa->alamat ?></td>
                                    
                                    <?php 
                                    if (($role_id == 1) or ($role_id == 3) or ($role_id == 6)) {

                                
                                    ?>
                                    
                                    <td class="action-icons">
                                        <a href="#" data-toggle="modal" data-target="#editSiswa<?php echo $siswa->nis ?>">
                                           
                                        <i title="ubah" class="fas fa-edit text-lg text-warning"></i>
                                        </a>
                                        <a href="<?php echo base_url() . 'siswa/delete/' . $siswa->nis ?>">
                                            <i title="hapus" class="fas fa-trash-alt text-lg text-danger"></i>
                                        <?php 
                                    }
                                    ?>
                                        </a>
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
    <div class="modal fade" id="addSiswa" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formAddSiswa" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formAddSiswaLabel">Input Data Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form name="form_add_siswa" action="<?php echo base_url() . 'siswa/add' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label text-primary">NIS</label>
                            <input type="text" class="form-control" placeholder="NIS Siswa" autofocus name="nis" required>
                            <div class="invalid-feedback">
                                Isikan NIS dengan 10 digit angka!
                            </div>
                        </div>
                        <hr>

                        <div class="form-group">
                            <label class="control-label text-primary">Nama Siswa</label>
                            <input type="text" class="form-control" placeholder='Nama Siswa' name="nama" required>
                            <div class="invalid-feedback">
                                Isikan nama siswa !
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="control-label text-primary">Jenis Kelamin</label>
                            <select class="form-control" placeholder='' name="jk" pattern="[A-Za-z]{1,10}" required>
                                <option value="">--Pilih Jenis Kelamin--</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <div class="invalid-feedback">
                                Pilih Jenis Kelamin Siswa !
                            </div>
                        </div>
                        <hr>

                        <div class="form-group">
                            <label class="control-label text-primary">Tempat Lahir</label>
                            <input type="text" class="form-control" placeholder='Tempat Lahir' name="tempat_lahir" required>
                            <div class="invalid-feedback">
                                Isikan tempat lahir siswa !
                            </div>
                        </div>
                        <hr>

                        <div class="form-group">
                            <label class="control-label text-primary">Tanggal Lahir</label>
                            <input type="date" class="form-control" placeholder='Tanggal Lahir' name="tgl_lahir" required>
                            <div class="invalid-feedback">
                                Isikan tanggal lahir siswa !
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="control-label text-primary">Email</label>
                            <input type="text" class="form-control" placeholder='Email' name="email" required>
                            <div class="invalid-feedback">
                                Isikan alamat siswa !
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="control-label text-primary">Kelas</label>
                            <select id="select" class="form-control" name="id_kls" pattern="[A-Za-z]{1,6}" required>
                                <option value="">--Pilih Kelas--</option>
                                <?php
                                foreach ($data_kelas  as $kelas) {
                                ?>
                                    <option value="<?php echo $kelas->id_kls ?>">
                                        <?php echo  $kelas->kelas ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                Pilih identitas Kelas!
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                        <label class="control-label text-primary">Wali Kelas</label>
                        <input id="input" type="text" class="form-control" placeholder="Wali Kelas" autofocus readonly>
                        <input id="input2" type="hidden" name="id_walas">
                        <div class="invalid-feedback">
                            Pilih Wali Kelas!
                        </div>
                    </div>
                        <hr>
                        <div class="form-group">
                            <label class="control-label text-primary">No.HP</label>
                            <input type="text" class="form-control" placeholder='Nomor HP' name="no_hp" required>
                            <div class="invalid-feedback">
                                Isikan nomor HP siswa !
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="control-label text-primary">Orang Tua</label>
                            <input type="text" class="form-control" placeholder='Nama Orang Tua' name="nama_ortu" required>
                            <div class="invalid-feedback">
                                Isikan nama orang tua siswa !
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="control-label text-primary">Alamat</label>
                            <input type="text" class="form-control" placeholder='Alamat' name="alamat" required>
                            <div class="invalid-feedback">
                                Isikan alamat siswa !
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
    foreach ($data_siswa as $siswa) {
    ?>
        <div class="modal fade" id="editSiswa<?php echo $siswa->nis ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formEditSiswa" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formEditSiswaLabel">Ubah Data Siswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form name="form_edit_siswa" action="<?php echo base_url() . 'siswa/edit' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label text-primary">NIS</label>
                                <input type="text" class="form-control" placeholder="NIS Siswa" autofocus name="nis" pattern="\d{10}" value="<?php echo $siswa->nis ?>" readonly>
                                <div class="invalid-feedback">
                                    Isikan NIS dengan 10 digit angka!
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="control-label text-primary">Nama Siswa</label>
                                <input type="text" class="form-control" placeholder='Nama Siswa' name="nama" pattern="[A-Za-z ]{1,25}" value="<?php echo $siswa->nama ?>" required>
                                <div class="invalid-feedback">
                                    Isikan nama siswa dengan huruf! (maks. 25 huruf)
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="control-label text-primary">Jenis Kelamin</label>
                                <select class="form-control" name="jk" pattern="[A-Za-z]{1,10}" required>
                                    <!-- <option>--Pilih Jenis Kelamin--</option> -->
                                    <option value="Laki-Laki" <?php if ($siswa->jk === 'L') {
                                                                    echo "selected";
                                                                } ?>>Laki-Laki</option>
                                    <option value="Perempuan" <?php if ($siswa->jk === 'P') {
                                                                    echo "selected";
                                                                } ?>>Perempuan</option>
                                </select>
                                <div class="invalid-feedback">
                                    Pilih jenis kelamin siswa!
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="control-label text-primary">Tanggal Lahir</label>
                                <input type="date" class="form-control" placeholder='Tanggal Lahir' name="tgl_lahir" value="<?php echo $siswa->tgl_lahir ?>" required>
                                <div class="invalid-feedback">
                                    isikan Tanggal Lahir siswa!
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="control-label text-primary">Kelas</label>
                                <input type="text" class="form-control" placeholder='Kelas' name="id_kls" value="<?php
                                                                                                                    foreach ($data_kelas as $kelas) {
                                                                                                                        if ($kelas->id_kls === $siswa->id_kls) {
                                                                                                                            echo $siswa->id_kls . ' ' . $kelas->kelas;
                                                                                                                        }
                                                                                                                    }
                                                                                                                    ?>" readonly>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="control-label text-primary">Kelas</label>
                                <input type="text" class="form-control" placeholder='Kelas' name="id_walas" value="<?php
                                                                                                                    foreach ($data_walas as $walas) {
                                                                                                                        if ($walas->id_walas === $siswa->id_walas) {
                                                                                                                            echo $siswa->id_walas . ' ' . $walas->nama_guru;
                                                                                                                        }
                                                                                                                    }
                                                                                                                    ?>" readonly>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="control-label text-primary">Email</label>
                                <input type="text" class="form-control" placeholder='Email Siswa' name="email" value="<?php echo $siswa->email ?>" required>
                                <div class="invalid-feedback">
                                    isikan Email siswa!
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="control-label text-primary">No.HP</label>
                                <input type="text" class="form-control" placeholder='No.HP' name="no_hp" value="<?php echo $siswa->no_hp ?>" required>
                                <div class="invalid-feedback">
                                    isikan nomor HP siswa!
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="control-label text-primary">Orang Tua</label>
                                <input type="text" class="form-control" placeholder='Nama Orang Tua' name="nama_ortu" value="<?php echo $siswa->nama_ortu ?>" required>
                                <div class="invalid-feedback">
                                    isikan alamat siswa!
                                </div>
                            </div>
                            
                            <!-- <div class="form-group">
                                <label class="control-label text-primary">Orang Tua</label> -->
                                <input type="hidden" class="form-control" placeholder='Nama Orang Tua' name="id_ortu" value="<?php echo $siswa->id_ortu ?>" required>
                                <!-- <div class="invalid-feedback">
                                    isikan alamat siswa!
                                </div>
                            </div> -->
                            <hr>
                            <div class="form-group">
                                <label class="control-label text-primary">Alamat</label>
                                <input type="text" class="form-control" placeholder='Alamat' name="alamat" value="<?php echo $siswa->alamat ?>" required>
                                <div class="invalid-feedback">
                                    isikan alamat siswa!
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
    <?php
    }
    ?>
    <script src="<?php echo base_url() . 'assets/vendor/jquery/jquery.min.js' ?>"></script>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('#select').change(function() {
                                var id_kls = $('#select').val()
                                $.ajax({
                                    url: "<?php echo base_url('siswa/nama_walas/') ?>" + id_kls,
                                    dataType: "json",
                                    type: "get",
                                    success: function(obj) {
                                        $('#input2').val(obj.id_walas);
                                        $('#input').val(obj.id_walas + ' ' + obj.nama_guru);


                                    }
                                });
                            });
                        });
                    </script>