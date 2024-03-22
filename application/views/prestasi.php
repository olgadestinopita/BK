                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h4 class="my-auto font-weight-bold text-primary">Data Prestasi</h4>
                            <div class="d-flex">
                                <!-- <a href="<?php echo base_url() . 'prestasi/print' ?>" target="new" class="btn btn-warning shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i> Print</a>
                                <a href="<?php echo base_url() . 'prestasi/cetak_pdf' ?>" target="new" class="btn btn-danger shadow-sm mx-2"><i class="fas fa-file fa-sm text-white-50"></i> Cetak PDF</a> -->
                                <?php 
                                    if (($role_id == 1) or ($role_id == 3 ) or ($role_id == 6 )){
                                    ?>
                                <a href="#' ?>" class="btn btn-primary shadow-sm" data-toggle="modal" data-target="#addPrestasi"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
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
                                            <!-- <th>ID_Prestasi</th> -->
                                            <th>Siswa</th>
                                            <th>Kelas</th>
                                            <th>Prestasi</th>
                                            <th>Keterangan</th>
                                            <th>Tahun</th>
                                            <?php 
                                    if (($role_id == 1) or ($role_id == 3 ) or ($role_id == 6 )){
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
                                        foreach ($data_prestasi as $prestasi) {
                                        ?>
                                            <tr>
                                                <th><?php echo $no++ ?></th>
                                                <!-- <td><?php echo $prestasi->id_prestasi ?></td> -->
                                                <td><?php echo $prestasi->nama ?></td>
                                                <td><?php echo $prestasi->kelas ?></td>
                                                <td><?php echo $prestasi->nama_prestasi ?></td>
                                                <td><?php echo $prestasi->keterangan ?></td>
                                                <td><?php echo $prestasi->tahun_p?></td>
                                                <?php 
                                    if (($role_id == 1) or ($role_id == 3 ) or ($role_id == 6 )){
                                    ?>
                                                <td class="action-icons">
                                                    <a hhref="#" data-toggle="modal" data-target="#editPrestasi<?php echo $prestasi->id_prestasi ?>">
                                                        <i title="ubah" class="fas fa-edit text-lg text-warning"></i>
                                                    </a> |
                                                    <a href="<?php echo base_url() . 'prestasi/delete/' .  $prestasi->id_prestasi  ?>">
                                                        <i title="hapus" class="fas fa-trash-alt text-lg text-danger"></i>
                                                    </a>
                                                    <?php
                                    }?>
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
                <div class="modal fade" id="addPrestasi" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formAddPrestasi" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formAddPrestasiLabel">Input Data Prestasi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form name="form_add_prestasi" action="<?php echo base_url() . 'prestasi/add' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
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
                                        <label class="control-label text-primary">Prestasi</label>
                                       <select name="id_katpres" class="form-control" pattern="[A-Za[{1,6}" required>
                                       <option value="">--Pilih Prestasi--</option>
                                       <?php
                                       foreach ($data_kprestasi as $kategori_prestasi) {
                                        ?>
                                        <option value="<?php echo $kategori_prestasi->id_katpres?>">
                                        <?php echo $kategori_prestasi->id_katpres.' '.$kategori_prestasi->nama_prestasi?>
                                        </option>
                                        <?php } ?>
                                       </select>
                                       <div class="invalid-feedback">
                                            Isikan Prestasi!
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label class="control-label text-primary">Keterangan</label>
                                        <input type="text" class="form-control" placeholder='Keterangan' name="keterangan" required>
                                        <div class="invalid-feedback">
                                            Isikan keterangan!
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label class="control-label text-primary">Tahun</label>
                                        <input type="text" class="form-control" placeholder='Tahun' name="tahun_p" required>
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
                foreach ($data_prestasi as $prestasi) {
                ?>
                    <div class="modal fade" id="editPrestasi<?php echo $prestasi->id_prestasi ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formEditPrestasi" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formEditPrestasiLabel">Ubah Data Prestasi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form name="form_edit_prestasi" action="<?php echo base_url() . 'prestasi/edit' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                                    <div class="modal-body">
                                        <!-- <div class="form-group">
                                            <label class="control-label text-primary">ID_Prestasi</label> -->
                                            <input type="hidden" class="form-control" placeholder="ID_Prestasi" autofocus name="id_prestasi" pattern="\d{5}" value="<?php echo $prestasi->id_prestasi ?>" readonly>
                                            <!-- <div class="invalid-feedback">
                                                Isikan ID dengan angka!
                                            </div>
                                        </div>
                                        <hr> -->

                                        <div class="form-group">
                                                <label class="control-label text-primary">Nama Siswa</label>
                                                <input class="form-control" name="nis" pattern="/d{10}" value=" <?php
                                                                                                                foreach ($data_siswa as $siswa) {
                                                                                                                    if ($siswa->nis === $prestasi->nis) {
                                                                                                                        echo $prestasi->nis . ' ' . $siswa->nama;
                                                                                                                    }
                                                                                                                }
                                                                                                                ?>" readonly>

                                            </div>
                                           <hr>
                                           <div class="form-group">
                                                <label class="control-label text-primary">Prestasi</label>
                                                <input class="form-control" name="id_katpres" pattern="/d{10}" value=" <?php
                                                                                                                foreach ($data_kprestasi as $kategori_prestasi) {
                                                                                                                    if ($kategori_prestasi->id_katpres === $prestasi->id_katpres) {
                                                                                                                        echo $prestasi->id_katpres . ' ' . $kategori_prestasi->nama_prestasi;
                                                                                                                    }
                                                                                                                }
                                                                                                                ?>" readonly>

                                            </div> 
                                        <hr>
                                        <div class="form-group">
                                            <label class="control-label text-primary">Keterangan</label>
                                            <input type="text" class="form-control" placeholder='Keterangan' name="keterangan" value="<?php echo $prestasi->keterangan ?>" required>
                                            <div class="invalid-feedback">
                                                Isikan Keterangan!
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label class="control-label text-primary">Tahun</label>
                                            <input type="date" class="form-control" placeholder='Tahun' name="tahun_p" value="<?php echo $prestasi->tahun_p ?>"required>
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
                <script src="<?php echo base_url() . 'assets/vendor/jquery/jquery.min.js' ?>"></script>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('#select1').change(function() {
                                var id_kls = $('#select1').val()
                                $.ajax({
                                    url: "<?php echo base_url('prestasi/daftar_siswa/') ?>" + id_kls,
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