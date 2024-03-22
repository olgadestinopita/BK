                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h4 class="my-auto font-weight-bold text-primary">Data Jenis Bimbingan</h4>
                            <div class="d-flex">
                                <!-- <a href="<?php echo base_url() . 'jenis_bimbingan/print' ?>" target="new" class="btn btn-warning shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i> Print</a>
                                <a href="<?php echo base_url() . 'jenis_bimbingan/cetak_pdf' ?>" target="new" class="btn btn-danger shadow-sm mx-2"><i class="fas fa-file fa-sm text-white-50"></i> Cetak PDF</a> -->
                                <a href="#' ?>" class="btn btn-primary shadow-sm" data-toggle="modal" data-target="#addJBimbingan"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-primary">
                                            <th>No.</th>
                                            <th>ID Bimbingan</th>
                                            <th>Jenis Bimbingan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data_jbimbingan as $jenis_bimbingan) {
                                        ?>
                                            <tr>
                                                <th><?php echo $no++ ?></th>
                                                <td><?php echo $jenis_bimbingan->id_jbim ?></td>
                                                <td><?php echo $jenis_bimbingan->kategori_bimbingan?></td>
                                                <td class="action-icons">
                                                    <a hhref="#" data-toggle="modal" data-target="#editJBimbingan<?php echo $jenis_bimbingan->id_jbim ?>">
                                                        <i title="ubah" class="fas fa-edit text-lg text-warning"></i>
                                                    </a> |
                                                    <a href="<?php echo base_url() . 'jenis_bimbingan/delete/' . $jenis_bimbingan->id_jbim ?>">
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
                <div class="modal fade" id="addJBimbingan" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formAddJBimbingan" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formAddJBimbinganLabel">Input Data Jenis Bimbingan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form name="form_add_JBimbingan" action="<?php echo base_url() . 'jenis_bimbingan/add' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="control-label text-primary"></label>
                                        <input type="text" class="form-control" placeholder="ID_ Bimbingan" autofocus value="<?php echo $next_id?>" name="id_jbim" readonly>
                                        <div class="invalid-feedback">
                                            Isikan ID dengan angka!
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="form-group">
                                        <label class="control-label text-primary">Kategori Bimbingan</label>
                                        <input type="text" class="form-control" placeholder='Kategori Bimbingan' name="kategori_bimbingan" required>
                                        <div class="invalid-feedback">
                                            Isikan Kategori Bimbingan
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
                foreach ($data_jbimbingan as $jenis_bimbingan) {
                ?>
                    <div class="modal fade" id="editJBimbingan<?php echo $jenis_bimbingan->id_jbim ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formBimbingan" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formEditBimbingankLabel">Ubah Data Jenis Bimbingan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form name="form_edit_jbimbingan" action="<?php echo base_url() . 'jenis_bimbingan/edit' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label text-primary">ID_jbim</label>
                                            <input type="text" class="form-control" placeholder="ID_jbim" autofocus name="id_jbim" pattern="\d{5}" value="<?php echo $jenis_bimbingan->id_jbim ?>" readonly>
                                            <div class="invalid-feedback">
                                                Isikan id_kelas dengan angka!
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="form-group">
                                            <label class="control-label text-primary">Kategori Bimbingan</label>
                                            <input type="text" class="form-control" placeholder='Kategori Bimbingan' name="kategori_bimbingan" pattern="[A-Za-z0-9/ ]{1,20}" value="<?php echo $jenis_bimbingan->kategori_bimbingan ?>" required>
                                            <div class="invalid-feedback">
                                                Isikan kategori bimbingan!
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