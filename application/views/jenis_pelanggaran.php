                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h4 class="my-auto font-weight-bold text-primary">Data Jenis Pelanggaran</h4>
                            <div class="d-flex">
                                <!-- <a href="<?php echo base_url() . 'jenis_pelanggaran/print' ?>" target="new" class="btn btn-warning shadow-sm mx-3"><i class="fas fa-print fa-sm text-white-50"></i> Print</a> -->
                                <!-- <a href="<?php echo base_url() . 'jenis_pelanggaran/cetak_pdf' ?>" target="new" class="btn btn-danger shadow-sm mx-2"><i class="fas fa-file fa-sm text-white-50"></i> Cetak PDF</a> -->
                                <a href="#' ?>" class="btn btn-primary shadow-sm" data-toggle="modal" data-target="#addJPelanggaran"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-primary">
                                            <th>No.</th>
                                            <!-- <th>ID_Pelanggaran</th> -->
                                            <th>Pelanggaran</th>
                                            <th>Kategori Pelanggaran</th>
                                            <th>Bobot</th>
                                            <th>sanksi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>

                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data_jpelanggaran as $jenis_pelanggaran) {
                                        ?>
                                            <tr>
                                                <th><?php echo $no++ ?></th>
                                                <!-- <td><?php echo $jenis_pelanggaran->id_jpel ?></td> -->
                                                <td><?php echo $jenis_pelanggaran->jpel ?></td>
                                                <td><?php echo $jenis_pelanggaran->kategori ?></td>
                                                <td><?php echo $jenis_pelanggaran->bobot ?></td>
                                                <td><?php echo $jenis_pelanggaran->sanksi ?></td>
                                                <td class="action-icons">
                                                    <a hhref="#" data-toggle="modal" data-target="#editJPelanggaran<?php echo $jenis_pelanggaran->id_jpel ?>">
                                                        <i title="ubah" class="fas fa-edit text-lg text-warning"></i>
                                                    </a> |
                                                    <a href="<?php echo base_url() . 'jenis_pelanggaran/delete/' . $jenis_pelanggaran->id_jpel ?>">
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
                <div class="modal fade" id="addJPelanggaran" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formAddJPelanggaran" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formAddJPelanggaranLabel">Input Data Jenis Pelanggaran</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form name="form_add_JPelanggaran" action="<?php echo base_url() . 'jenis_pelanggaran/add' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                                <div class="modal-body">
                                    <!-- <div class="form-group">
                                        <label class="control-label text-primary">ID Jenis Pelanggaran</label>
                                        <input type="text" class="form-control" placeholder="ID_Jpel" autofocus name="id_jpel" required>
                                        <div class="invalid-feedback">
                                            Isikan ID Jenis Pelanggaran!
                                        </div>
                                    </div>
                                    <hr> -->
                                    <div class="form-group">
                                        <label class="control-label text-primary">Jenis Pelanggaran</label>
                                        <input type="text" class="form-control" placeholder="Jenis Pelanggaran" autofocus name="jpel" required>
                                        <div class="invalid-feedback">
                                            Isikan Jenis Pelanggaran!
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label class="control-label text-primary">Kategori Pelanggaran</label>
                                        <select class="form-control" name="id_katpel" pattern="[A-Za-z ]{1,6}" required>
                                            <option value="">--Pilih Kategori Pelanggaran--</option>
                                            <?php
                                            foreach ($data_kpelanggaran as $kategori_pelanggaran) {
                                            ?>
                                                <option value="<?php echo $kategori_pelanggaran->id_katpel ?>">
                                                    <?php echo $kategori_pelanggaran->id_katpel . ' ' . $kategori_pelanggaran->kategori ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label class="control-label text-primary">Bobot Pelanggaran</label>
                                        <input type="number" class="form-control" placeholder="Bobot" autofocus name="bobot" required>
                                        <div class="invalid-feedback">
                                            Isikan ID Bobot Pelanggaran!
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label class="control-label text-primary">Sanksi Pelanggaran</label>
                                        <input type="text" class="form-control" placeholder="sanksi" autofocus name="sanksi" required>
                                        <div class="invalid-feedback">
                                            Isikan ID Jenis Pelanggaran!
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
                foreach ($data_jpelanggaran as $jenis_pelanggaran) {
                ?>
                    <div class="modal fade" id="editJPelanggaran<?php echo $jenis_pelanggaran->id_jpel ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formJPelanggaran" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formEditJPelanggaranLabel">Ubah Data Jenis Pelanggaran</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form name="form_edit_JPelanggaran" action="<?php echo base_url() . 'jenis_pelanggaran/edit' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label text-primary">ID_Jenis Pelanggaran</label>
                                            <input type="text" class="form-control" placeholder="ID_Jenis Pelanggaran" autofocus name="id_jpel" pattern="\d{6}" value="<?php echo $jenis_pelanggaran->id_jpel ?>" readonly>
                                            <div class="invalid-feedback">
                                                Isikan id pelanggaran!
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label class="control-label text-primary">Pelanggaran Siswa</label>
                                            <input type="text" class="form-control" placeholder='Pelanggaran Siswa' name="jpel" pattern="[A-Za-z ]{1,25}" value="<?php echo $jenis_pelanggaran->jpel ?>" required>
                                            <div class="invalid-feedback">
                                                Isikan pelanggaran siswa!
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label class="control-label text-primary">Kategori Pelanggaran</label>
                                            <select class="form-control" name="id_katpel" pattern="[A-Za-z ]{1,6}" required>
                                                <option></option>
                                                <?php
                                                foreach ($data_kpelanggaran as $kategori_pelanggaran) {
                                                ?>
                                                    <option value="<?php echo $kategori_pelanggaran->id_katpel ?>" <?php if ($kategori_pelanggaran->id_katpel === $jenis_pelanggaran->id_katpel) {
                                                                                                                        echo "selected";
                                                                                                                    } ?>>
                                                        <?php echo $kategori_pelanggaran->id_katpel . ' ' . $kategori_pelanggaran->kategori ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label class="control-label text-primary">Bobot Pelanggaran</label>
                                            <input type="number" class="form-control" placeholder='Bobot Pelanggaran' name="bobot" value="<?php echo $jenis_pelanggaran->bobot ?>" required>
                                            <div class="invalid-feedback">
                                                Isikan Bobot Pelanggaran!
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label class="control-label text-primary">Sanksi Pelanggaran</label>
                                            <input type="text" class="form-control" placeholder='Sanksi Pelanggaran' name="sanksi" pattern="{1,255}" value="<?php echo $jenis_pelanggaran->sanksi ?>" required>
                                            <div class="invalid-feedback">
                                                Isikan Sanksi Pelanggaran!
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