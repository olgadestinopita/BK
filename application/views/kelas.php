                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h4 class="my-auto font-weight-bold text-primary">Data Kelas</h4>
                            <div class="d-flex">
                                <!-- <a href="<?php echo base_url() . 'kelas/print' ?>" target="new" class="btn btn-warning shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i> Print</a>
                                <a href="<?php echo base_url() . 'kelas/cetak_pdf' ?>" target="new" class="btn btn-danger shadow-sm mx-2"><i class="fas fa-file fa-sm text-white-50"></i> Cetak PDF</a> -->
                                <a href="#' ?>" class="btn btn-primary shadow-sm" data-toggle="modal" data-target="#addKelas"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-primary">
                                            <th>No.</th>
                                            <th>ID_Kelas</th>
                                            <th>Kelas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data_kelas as $kelas) {
                                        ?>
                                            <tr>
                                                <th><?php echo $no++ ?></th>
                                                <td><?php echo $kelas->id_kls ?></td>
                                                <td><?php echo $kelas->kelas ?></td>
                                                <td class="action-icons">
                                                    <a hhref="#" data-toggle="modal" data-target="#editKelas<?php echo $kelas->id_kls ?>">
                                                        <i title="ubah" class="fas fa-edit text-lg text-warning"></i>
                                                    </a> |
                                                    <a href="<?php echo base_url() . 'kelas/delete/' .  $kelas->id_kls  ?>">
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
                <div class="modal fade" id="addKelas" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formAddTahunAkademik" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formAddTahunAkademikLabel">Input Data Kelas</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form name="form_add_kelas" action="<?php echo base_url() . 'kelas/add' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="control-label text-primary">ID_Kelas</label>
                                        <input type="text" class="form-control" placeholder="Id_kls" autofocus name="id_kls"  required>
                                        <div class="invalid-feedback">
                                            Isikan kelas!
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="form-group">
                                        <label class="control-label text-primary">Kelas</label>
                                        <input type="text" class="form-control" placeholder='kelas' name="kelas"  required>
                                        <div class="invalid-feedback">
                                            Isikan kelas!
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
                foreach ($data_kelas as $kelas) {
                ?>
                    <div class="modal fade" id="editKelas<?php echo $kelas->id_kls ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formEditKelas" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formEditTahunAkademikLabel">Ubah Data Kelas</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form name="form_edit_kelas" action="<?php echo base_url() . 'kelas/edit' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label text-primary">ID_Kelas</label>
                                            <input type="text" class="form-control" placeholder="ID_Kelas" autofocus name="id_kls" pattern="\d{5}" value="<?php echo $kelas->id_kls ?>" readonly>
                                            <div class="invalid-feedback">
                                                Isikan ID dengan angka!
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="form-group">
                                            <label class="control-label text-primary">Kelas</label>
                                            <input type="text" class="form-control" placeholder='Kelas' name="kelas"  value="<?php echo $kelas->kelas ?>" required>
                                            <div class="invalid-feedback">
                                                Isikan Kelas dengan kombinasi huruf dan angka! (maks. 10 karakter)
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