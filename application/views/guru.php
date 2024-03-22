                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h4 class="my-auto font-weight-bold text-primary">Data Guru</h4>
                            <div class="d-flex">
                                <!-- <a href="<?php echo base_url() . 'guru/print' ?>" class="btn btn-warning shadow-sm mx-3"><i
                                class="fas fa-print fa-sm text-white-50"></i> Print</a> -->
                                <!-- <a href="<?php echo base_url() . 'guru/cetak_pdf' ?>" class="btn btn-danger shadow-sm mx-2"><i
                                class="fas fa-file fa-sm text-white-50"></i> Cetak PDF</a> -->
                                <a href="#' ?>" class="btn btn-primary shadow-sm" data-toggle="modal" data-target="#addGuru"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-primary">
                                            <th>No.</th>
                                            <th>NIP</th>
                                            <th>Nama Guru</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>NoHP</th>
                                            <th>Email</th>
                                            <th>Jabatan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>

                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data_guru as $guru) {
                                        ?>
                                            <tr>
                                                <th><?php echo $no++ ?></th>
                                                <td><?php echo $guru->nip ?></td>
                                                <td><?php echo $guru->nama_guru ?></td>
                                                <td><?php echo $guru->tgl_lahir_g ?></td>
                                                <td><?php echo $guru->jekel ?></td>
                                                <td><?php echo $guru->nohp ?></td>
                                                <td><?php echo $guru->email_g ?></td>



                                                <td> <span class="row px-3">

                                                        <?php echo $guru->jabatan ?></span>
                                                <td><?php echo $guru->status ?></td>
                                                <td class="action-icons">
                                                    <a href="#" data-toggle="modal" data-target="#editGuru<?php echo $guru->nip ?>">
                                                        <i title="ubah" class="fas fa-edit text-lg text-warning"></i>
                                                    </a> |
                                                    <a href="<?php echo base_url() . 'guru/delete/' . $guru->nip ?>">
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
                <div class="modal fade" id="addGuru" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formAddGuru" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formAddGuruLabel">Input Data Guru</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form name="form_add_guru" action="<?php echo base_url() . 'guru/add' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="control-label text-primary">NIP</label>
                                        <input type="text" class="form-control" placeholder="NIP Guru" autofocus name="nip" pattern="\d{10}" required>
                                        <div class="invalid-feedback">
                                            Isikan NIP dengan 10 digit angka!
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="form-group">
                                        <label class="control-label text-primary">Nama Guru</label>
                                        <input type="text" class="form-control" placeholder='Nama Guru' name="nama_guru" required>
                                        <div class="invalid-feedback">
                                            Isikan nama guru
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="form-group">
                                        <label class="control-label text-primary">Jabatan</label>
                                        <select class="form-control" name="id_jabatan" pattern="/d{10}" required>
                                            <option value="">--Pilih Jabatan--</option>
                                            <?php
                                            foreach ($data_jabatan as $jabatan) {
                                            ?>
                                                <option value="<?php echo $jabatan->id_jabatan ?>">
                                                    <?php echo  $jabatan->jabatan ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            Pilih Jabatan Guru!
                                        </div>
                                    </div>


                                    <hr>

                                    <div class="form-group">
                                        <label class="control-label text-primary">Tanggal Lahir</label>
                                        <input type="date" class="form-control" placeholder='Tanggal Lahir Guru' name="tgl_lahir_g" required>
                                        <div class="invalid-feedback">
                                            Isikan Tanggal Lahir Guru!
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="form-group">
                                        <label class="control-label text-primary">Jenis Kelamin</label>
                                        <select class="form-control" name="jekel" pattern="/d{10}" required>
                                            <option value="">--Pilih Jenis Kelamin--</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Pilih Jenis Kelamin Guru!
                                        </div>
                                    </div>


                                    <hr>

                                    <div class="form-group">
                                        <label class="control-label text-primary">Nomor HP</label>
                                        <input type="text" class="form-control" placeholder='No HP' name="nohp" required>
                                        <div class="invalid-feedback">
                                            Isikan Nomor HP Guru!
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="form-group">
                                        <label class="control-label text-primary">Email</label>
                                        <input type="text" class="form-control" placeholder='Email' name="email_g" required>
                                        <div class="invalid-feedback">
                                            Isikan Email Guru!
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="form-group">
                                        <label class="control-label text-primary">Status</label>
                                        <select class="form-control" name="id_status" pattern="/d{10}" required>
                                            <option value="">--Pilih Status Guru--</option>
                                            <?php
                                            foreach ($data_status as $status_guru) {
                                            ?>
                                                <option value="<?php echo $status_guru->id_status ?>">
                                                    <?php echo  $status_guru->status ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            Pilih identitas guru!
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
                foreach ($data_guru as $guru) {
                ?>
                    <div class="modal fade" id="editGuru<?php echo $guru->nip ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formEditGuru" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formEditGuruLabel">Ubah Data Guru</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form name="form_edit_guru" action="<?php echo base_url() . 'guru/edit' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label text-primary">NIP</label>
                                            <input type="text" class="form-control" placeholder="NIP Guru" autofocus name="nip" pattern="\d{10}" value="<?php echo $guru->nip ?>" readonly>
                                            <div class="invalid-feedback">
                                                Isikan NIP dengan 10 digit angka!
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="form-group">
                                            <label class="control-label text-primary">Nama Guru</label>
                                            <input type="text" class="form-control" placeholder='Nama Guru' name="nama_guru" pattern="[A-Za-z ]{1,30}" value="<?php echo $guru->nama_guru ?>" required>
                                            <div class="invalid-feedback">
                                                Isikan nama guru dengan huruf! (maks. 25 huruf)
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="form-group">
                                            <label class="control-label text-primary">Tanggal Lahir</label>
                                            <input type="date" class="form-control" placeholder='Tanggal Lahir Guru' name="tgl_lahir_g" pattern="[A-Za-z ]{1,30}" value="<?php echo $guru->tgl_lahir_g ?>" required>
                                            <div class="invalid-feedback">
                                                Isikan Tanggal Lahir Guru!
                                            </div>
                                        </div>
                                        <hr>
                        <div class="form-group">
                            <label class="control-label text-primary">Jenis Kelamin</label>
                            <select class="form-control" name="jekel" pattern="[A-Za-z]{1,10}" required>
                                <option>--Pilih Jenis Kelamin--</option>
                                <option value="Laki-Laki" <?php if ($guru->jekel === 'L') {
                                                                echo "selected";
                                                            } ?>>Laki-Laki</option>
                                <option value="Perempuan" <?php if ($guru->jekel === 'P') {
                                                                echo "selected";
                                                            } ?>>Perempuan</option>
                            </select>
                            <div class="invalid-feedback">
                                Pilih jenis kelamin siswa!
                            </div>
                        </div>
                        
                                        <hr>

                                        <div class="form-group">
                                            <label class="control-label text-primary">Email</label>
                                            <input type="text" class="form-control" placeholder='Email Guru' name="email_g"  value="<?php echo $guru->email_g ?>" required>
                                            <div class="invalid-feedback">
                                                Isikan Email Guru!
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="form-group">
                                            <label class="control-label text-primary">No HP</label>
                                            <input type="text" class="form-control" placeholder='No HP' name="nohp" pattern="{12}" value="<?php echo $guru->nohp ?>" required>
                                            <div class="invalid-feedback">
                                                Isikan No HP Guru!
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="form-group">
                                            <label class="control-label text-primary">Jabatan</label>
                                            <select class="form-control" name="id_jabatan" pattern="/d{100}" required>
                                                <option>--Pilih Jabatan--</option>
                                                <?php
                                                foreach ($data_jabatan as $jabatan) {
                                                ?>
                                                    <option value="<?php echo $jabatan->id_jabatan ?>" <?php if ($jabatan->id_jabatan === $guru->id_jabatan) {
                                                                                                            echo "selected";
                                                                                                        } ?>>
                                                        <?php echo $jabatan->jabatan ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label class="control-label text-primary">Status</label>
                                            <select class="form-control" name="id_status" pattern="/d{100}" required>
                                                <option>--Pilih Status--</option>
                                                <?php
                                                foreach ($data_status as $status_guru) {
                                                ?>
                                                    <option value="<?php echo $status_guru->id_status ?>" <?php if ($status_guru->id_status === $guru->id_status) {
                                                                                                                echo "selected";
                                                                                                            } ?>>
                                                        <?php echo $status_guru->status ?>
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