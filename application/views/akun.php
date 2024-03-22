                <!-- Begin Page Content -->
                <div class="container-fluid">

                <?php if (isset($_GET['pesan'])) {
                    if ($_GET['pesan'] == "gagal") { ?>
                        <div class= "alert alert-danger" role="alert">Username sudah ada!</div>
                <?php 
                    }
                }
                ?>
	
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h4 class="my-auto font-weight-bold text-primary">Data User</h4>
                            <div class="d-flex">
                                <a href="#' ?>" class="btn btn-primary shadow-sm" data-toggle="modal" data-target="#addAkun"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-primary">
                                            <th>No.</th>
                                         
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Hak Akses</th>
                                            <th>Registrasi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>

                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data_buat as $user) {
                                        ?>
                                            <tr>
                                                <th><?php echo $no++ ?></th>
                                                <!-- <td><?php echo $user->id_user ?></td> -->
                                                <td><?php echo $user->nama_user ?></td>
                                                <td><?php echo $user->username ?></td>
                                                <td><?php echo $user->password ?></td>
                                                <td> <span class="row px-3">

                                                        <?php echo $user->role ?></span>
                                                <td><?php echo $user->registrasi ?></td>
                                                <td class="action-icons">
                                                    <a hhref="#" data-toggle="modal" data-target="#editAkun<?php echo $user->id_user ?>">
                                                        <i title="ubah" class="fas fa-edit text-lg text-warning"></i>
                                                    </a> |
                                                    <a href="<?php echo base_url() . 'akun/delete/' .  $user->id_user  ?>">
                                                        <i title="hapus" class="fas fa-trash-alt text-lg text-danger"></i>
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
                <div class="modal fade" id="addAkun" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formAddAkun" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formAdddAkunLabel">Input Data User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form name="form_add_akun" action="<?php echo base_url() . 'akun/add' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                                <div class="modal-body">
                                    <!-- <div class="form-group">
                                        <label class="control-label text-primary">ID_User</label>
                                        <input type="text" class="form-control" placeholder="Id_user" autofocus name="id_user" required>
                                        <div class="invalid-feedback">
                                            Isikan ID User!
                                        </div>
                                    </div>
                                    <hr> -->

                                    <div class="form-group">
                                        <label class="control-label text-primary">Nama</label>
                                        <input type="text" class="form-control" placeholder='Nama' name="nama_user" required>
                                        <div class="invalid-feedback">
                                            Isikan Nama User!
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="form-group">
                                        <label class="control-label text-primary">Username</label>
                                        <input type="text" class="form-control" placeholder='Username' name="username" required>
                                        <div class="invalid-feedback">
                                            Isikan Username!
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="form-group">
                                        <label class="control-label text-primary">Password</label>
                                        <input type="text" class="form-control" placeholder='Password' name="password" required>
                                        <div class="invalid-feedback">
                                            Isikan Password!
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="form-group">
                                        <label class="control-label text-primary">Hak Akses</label>
                                        <select name="role_id" class="form-control" required>
                                        <option value=""></option>
                                            <?php
                                            $akun = $this->db->select('*')->get('user_role');
                                            $data = $akun->result();
                                            ?>
                                            <?php foreach ($data as $akses) : ?>

                                                <option value="<?= $akses->id_role ?>"><?= $akses->role ?></option>
                                                
                                            <?php endforeach ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            Pilih Hak Akses!
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
                foreach ($data_buat as $user) {
                ?>
                    <div class="modal fade" id="editAkun<?php echo $user->id_user ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formEditAkun" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formEditAkunLabel">Ubah Data Akun</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form name="form_edit_kelas" action="<?php echo base_url() . 'akun/edit' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label text-primary">ID_User</label>
                                            <input type="text" class="form-control" placeholder="ID_user" autofocus name="id_user" value="<?php echo $user->id_user ?>" readonly>
                                            <div class="invalid-feedback">
                                                Isikan ID !
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="form-group">
                                            <label class="control-label text-primary">Nama User</label>
                                            <input type="text" class="form-control" placeholder='Nama User' name="nama_user" value="<?php echo $user->nama_user ?>" required>
                                            <div class="invalid-feedback">
                                                Isikan Nama User!
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="form-group">
                                            <label class="control-label text-primary">Username</label>
                                            <input type="text" class="form-control" placeholder='Username' name="username" value="<?php echo $user->username ?>" required>
                                            <div class="invalid-feedback">
                                                Isikan Username!
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="form-group">
                                            <label class="control-label text-primary">Password</label>
                                            <input type="text" class="form-control" placeholder='Password' name="password" value="<?php echo $user->password ?>" required>
                                            <div class="invalid-feedback">
                                                Isikan Password!
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label class="control-label text-primary">Hak Akses</label>
                                            <select class="form-control" name="role_id" pattern="/d{10}" required>
                                                <option value=""></option>
                                                <?php
                                                foreach ($data as $role) {
                                                ?>
                                                    <option value="<?php echo $role->id_role ?>" <?php if ($role->id_role === $user->role_id) {
                                                                                                        echo "selected";
                                                                                                    } ?>>
                                                        <?php echo $role->role ?>
                                                    </option>
                                                <?php } ?>
                                            </select>

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