                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h4 class="my-auto font-weight-bold text-primary">Data Wali Kelas</h4>
                            <div class="d-flex">
                                <!-- <a href="<?php echo base_url() . 'walas/print' ?>" class="btn btn-warning shadow-sm"><i
                                class="fas fa-print fa-sm text-white-50"></i> Print</a>
                                <a href="<?php echo base_url() . 'walas/cetak_pdf' ?>" class="btn btn-danger shadow-sm mx-2"><i
                                class="fas fa-file fa-sm text-white-50"></i> Cetak PDF</a> -->
                                <a href="#" class="btn btn-primary shadow-sm" data-toggle="modal" data-target="#addWalas"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-primary">
                                            <th>No.</th>
                                            <th>ID_Walas</th>
                                            <th>Nama Walas</th>
                                            
                                            <th>Kelas</th>
                                            <th>Tahun</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>

                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data_walas as $walas) {
                                        ?>
                                            <tr>
                                                <th><?php echo $no++ ?></th>
                                                <td><?php echo $walas->id_walas ?></td>
                                                <td>
                                                    <span class="row px-3 text-primary text-xs"><?php echo $walas->nip ?></span>
                                                    <span class="row px-3"><?php echo $walas->nama_guru ?></span>
                                                </td>
                                               
                                                <td>
                                                    <span class="row px-3 text-primary text-xs"><?php echo $walas->id_kls ?></span>
                                                    <span class="row px-3"><?php echo $walas->kelas ?></span>
                                                </td>

                                                <td><?php echo $walas->tahun ?></td>
                                                <td class="action-icons">
                                                    <a href="#" data-toggle="modal" data-target="#editWalas<?php echo $walas->id_walas ?>">
                                                        <i title="ubah" class="fas fa-edit text-lg text-warning"></i>
                                                    </a> |
                                                    <a href="<?php echo base_url() . 'walas/delete/' . $walas->id_walas ?>">
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
                <div class="modal fade" id="addWalas" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formAddWalas" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formAddWalasLabel">Input Data Wali Kelas</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form name="form_add_walas" action="<?php echo base_url() . 'walas/add' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="control-label text-primary">ID Walas</label>
                                        <input type="text" class="form-control" placeholder="ID walas" autofocus value="<?php echo $next_id?>" name="id_walas" readonly>
                                        <div class="invalid-feedback">
                                            Isikan ID dengan angka!
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="form-group">
                                        <label class="control-label text-primary">Nama Wali Kelas</label>
                                        <select class="form-control" name="nip" pattern="[A-Za-z0-9. ]{1,25}" required>
                                            <option value=""></option>
                                            <?php
                                            foreach ($data_guru as $guru) {
                                            ?>
                                                <option value="<?php echo $guru->nip ?>">
                                                    <?php echo  $guru->nip.' '.$guru->nama_guru ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            Pilih identitas guru!
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="form-group">

                                        <label class="control-label text-primary">Kelas</label>
                                        <select class="form-control" name="id_kls" required>
                                            <option value=""></option>
                                            <?php
                                            foreach ($data_kelas as $kelas) {
                                            ?>
                                                <option value="<?php echo $kelas->id_kls ?>">
                                                <?php echo $kelas->id_kls.' '.$kelas->kelas  ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            Pilih kelas!
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label text-primary">Tahun</label>
                                        <input type="text" class="form-control" placeholder='Tahun' name="tahun" required>
                                        <div class="invalid-feedback">
                                            Isikan Tahun Wali Kelas
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
                foreach ($data_walas as $walas) {
                ?>
                    <div class="modal fade" id="editWalas<?php echo $walas->id_walas ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formEditWalas" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formEditWalasLabel">Ubah Data Guru</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form name="form_edit_guru" action="<?php echo base_url() . 'walas/edit' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label text-primary">ID_Walas</label>
                                            <input type="text" class="form-control" placeholder="Id Walas" autofocus name="id_walas" value="<?php echo $walas->id_walas ?>" readonly>
                                            <div class="invalid-feedback">
                                                Isikan NIP dengan 10 digit angka!
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="form-group">
                                            <label class="control-label text-primary">Kelas</label>
                                            <select class="form-control" name="nip" pattern="/d{10}" required>
                                                <option value=""></option>
                                                <?php
                                                foreach ($data_guru as $guru) {
                                                ?>
                                                    <option value="<?php echo $guru->nip ?>" <?php if ($guru->nip === $walas->nip) {
                                                                                                    echo "selected";
                                                                                                } ?>>
                                                        <?php echo $guru->nip.' '.$guru->nama_guru  ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <hr>
                                        <div class="form-group">
                                            <label class="control-label text-primary">Kelas</label>
                                            <select class="form-control" name="id_kls" pattern="/d{10}" required>
                                                <option value=""></option>
                                                <?php
                                                foreach ($data_kelas as $kelas) {
                                                ?>
                                                    <option value="<?php echo $kelas->id_kls ?>" <?php if ($kelas->id_kls === $walas->id_kls) {
                                                                                                    echo "selected";
                                                                                                } ?>>
                                                        <?php echo $kelas->kelas  ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label class="control-label text-primary"></label>
                                            <input type="text" class="form-control" placeholder='Tahun' name="tahun" value="<?php echo $walas->tahun ?>">
                                            <div class="invalid-feedback">
                                                Isikan Tahun!
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