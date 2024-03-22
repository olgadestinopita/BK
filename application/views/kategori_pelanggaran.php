                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h4 class="my-auto font-weight-bold text-primary">Data Kategori Pelanggaran</h4>
                            <div class="d-flex">
                                <!-- <a href="<?php echo base_url() . 'kategori_pelanggaran/print' ?>" target="new" class="btn btn-warning shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i> Print</a>
                                <a href="<?php echo base_url() . 'kategori_pelanggaran/cetak_pdf' ?>" target="new" class="btn btn-danger shadow-sm mx-2"><i class="fas fa-file fa-sm text-white-50"></i> Cetak PDF</a> -->
                                <a href="#' ?>" class="btn btn-primary shadow-sm" data-toggle="modal" data-target="#addkpelanggaran"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-primary">
                                            <th>No.</th>
                                            <th>ID_Pelanggaran</th>
                                            <th>Kategori Pelanggaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data_kpelanggaran as $kategori_pelanggaran) {
                                        ?>
                                            <tr>
                                                <th><?php echo $no++ ?></th>
                                                <td><?php echo $kategori_pelanggaran->id_katpel ?></td>
                                                <td><?php echo $kategori_pelanggaran->kategori?></td>
                                                <td class="action-icons">
                                                    <a hhref="#" data-toggle="modal" data-target="#editkpelanggaran<?php echo $kategori_pelanggaran->id_katpel ?>">
                                                        <i title="ubah" class="fas fa-edit text-lg text-warning"></i>
                                                    </a> |
                                                    <a href="<?php echo base_url() . 'kategori_pelanggaran/delete/' . $kategori_pelanggaran->id_katpel ?>">
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
                <div class="modal fade" id="addkpelanggaran" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formAddkpelanggaran" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formAddkpelanggaranLabel">Input Data Kategori Pelanggaran</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form name="form_add_kpelanggaran" action="<?php echo base_url() . 'kategori_pelanggaran/add' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="control-label text-primary"></label>
                                        <input type="text" class="form-control" placeholder="ID_Kategori" autofocus value="<?php echo $next_id?>"  name="id_katpel" readonly>
                                        <div class="invalid-feedback">
                                            Isikan ID dengan angka!
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="form-group">
                                        <label class="control-label text-primary">Kategori Pelanggaran</label>
                                        <input type="text" class="form-control" placeholder='Kategori Pelanggaran'name="kategori" required>
                                        <div class="invalid-feedback">
                                            Isikan Kategori pelanggaran!
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

                foreach ($data_kpelanggaran as $kategori_pelanggaran) {
                ?>
                    <div class="modal fade" id="editkpelanggaran<?php echo $kategori_pelanggaran->id_katpel ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formkpelanggaran" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formEditkpelanggaranLabel">Ubah Data Kategori Pelanggaran</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form name="form_edit_kpelanggaran" action="<?php echo base_url() . 'kategori_pelanggaran/edit' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label text-primary">ID_Kategori Pelanggaran</label>
                                            <input type="text" class="form-control" placeholder="ID_katpel" autofocus name="id_katpel" pattern="\d{5}" value="<?php echo $kategori_pelanggaran->id_katpel ?>" readonly>
                                            <div class="invalid-feedback">
                                                Isikan id_kelas dengan angka!
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="form-group">
                                            <label class="control-label text-primary">Kategori Pelanggaran</label>
                                            <input type="text" class="form-control" placeholder='Kategori Pelanggaran' name="kategori"  value="<?php echo $kategori_pelanggaran->kategori ?>" required>
                                            <div class="invalid-feedback">
                                                Isikan kategori pelanggaran!
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