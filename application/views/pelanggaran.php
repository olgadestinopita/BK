                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex justify-content-between">
                                <h4 class="my-auto font-weight-bold text-primary">Data Pelanggaran</h4>
                                <div class="d-flex">
                                    <!-- <a href="<?php echo base_url() . 'jenis_pelanggaran/print' ?>" target="new" class="btn btn-warning shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i> Print</a>
                                    <a href="<?php echo base_url() . 'jenis_pelanggaran/cetak_pdf' ?>" target="new" class="btn btn-danger shadow-sm mx-2"><i class="fas fa-file fa-sm text-white-50"></i> Cetak PDF</a> -->
                                    <?php 
                                    if (($role_id == 1) or ($role_id == 6 )){

                                
                                    ?>
                                    <a href="#' ?>" class="btn btn-primary shadow-sm" data-toggle="modal" data-target="#addJPelanggaran"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
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
                                                <th>Nama Siswa</th>
                                                <?php 
                                    if (($role_id == 1) or ($role_id == 6 )){
                                    ?> 
                                                <th>kelas</th>
                                                <?php }?>  
                                                
                                                <?php 
                                    if (($role_id == 1) or ($role_id == 6 )){
                                    ?>
                                                <th>Wali Kelas</th>
                                                <?php }?>
                                                <th>Pelanggaran</th>
                                                <th>Bobot</th>
                                                <th>Kategori</th>
                                                <th>Sanksi</th>
                                                <th>Keterangan</th>
                                                <th>Tanggal</th>
                                                
                                                <?php 
                                    if (($role_id == 1) or ($role_id == 6 )){
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
                                            foreach ($data_pelanggaran as $bimpel) {
                                            ?>
                                                <tr>
                                                    <th><?php echo $no++ ?></th>
                                                    <td><?php echo $bimpel->nama ?></td>
                                                    <?php 
                                    if (($role_id == 1) or ($role_id == 6 )){
                                         ?>
                                    
                                                    <td><?php echo $bimpel->kelas ?></td>
                                   
                                                    <td><?php echo $bimpel->nama_guru ?></td>
                                                    <?php }?>



                                                    <td><?php echo $bimpel->jpel ?></td>
                                                    <td><?php echo $bimpel->bobot ?></td>
                                                    <td> <?php echo $bimpel->kategori ?></td>
                                                    <td><?php echo $bimpel->sanksi ?></td>
                                                    <td><?php echo $bimpel->keterangan ?></td>
                                                    <td><?php echo $bimpel->tgl_bimpel ?></td>
                                                    
                                                    <?php 
                                    if (($role_id == 1) or ($role_id == 6 )){

                                
                                    ?>
  
                                                    <td class="action-icons">
                                                        <a hhref="#" data-toggle="modal" data-target="#editPelanggaran<?php echo $bimpel->id_bimpel ?>">
                                                            <i title="ubah" class="fas fa-edit text-lg text-warning"></i>
                                                        </a> |
                                                        <a href="<?php echo base_url() . 'pelanggaran/delete/' . $bimpel->id_bimpel ?>">
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
                    <div class="modal fade" id="addJPelanggaran" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formAddJPelanggaran" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formAddJPelanggaranLabel">Input Data Pelanggaran</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form name="form_add_JPelanggaran" action="<?php echo base_url() . 'pelanggaran/add' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                                    <div class="modal-body">
                                        <!-- <div class="form-group">
                                            <label class="control-label text-primary"></label>
                                            <input type="text" class="form-control" placeholder="ID_Pelanggaran" autofocus name="id_bimpel" required>
                                            <div class="invalid-feedback">
                                                Isikan ID Pelanggaran!
                                            </div>
                                        </div> -->
                                       
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
                                            <label class="control-label text-primary">Wali Kelas</label>
                                            <input id="input" type="text" class="form-control" placeholder="Wali Kelas" autofocus readonly>
                                            <input id="input2" type="hidden" name="nip">
                                            <div class="invalid-feedback">
                                                Pilih Wali Kelas!
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label class="control-label text-primary">Pelanggaran</label>
                                            <select id="select2" name="id_jpel" class="form-control" pattern="[A-Za-z]{1,6}" required>
                                                <option value="">--Pilih Pelanggaran--</option>

                                                <?php
                                                foreach ($data_jpelanggaran as $jenis_pelanggaran) {
                                                ?>
                                                    <option value="<?php echo $jenis_pelanggaran->id_jpel ?>">
                                                        <?php echo $jenis_pelanggaran->id_jpel . ' ' . $jenis_pelanggaran->jpel ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                Pilih Jenis Pelanggaran!
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label class="control-label text-primary">Kategori Pelanggaran</label>
                                            <input id="input3" type="text" class="form-control" placeholder="Kategori Pelanggaran" autofocus readonly>
                                            <input id="input4" type="hidden" name="id_katpel">
                                            <div class="invalid-feedback">
                                                Pilih Kategori Pelanggaran!
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label class="control-label text-primary">Keterangan</label>
                                            <textarea class="form-control" placeholder="Keterangan Pelanggaran" rows="5" name="keterangan" required></textarea>
                                            <div class="invalid-feedback">
                                                Isikan Keterangan Pelanggaran!
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label class="control-label text-primary">Tanggal Pelanggaran</label>
                                            <input type="date" class="form-control" placeholder="Tanggal Pelanggaran" name="tgl_bimpel" required></input>
                                            <div class="invalid-feedback">
                                                Isikan Keterangan Pelanggaran!
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
                    foreach ($data_pelanggaran as $bimpel) {
                    ?>
                        <div class="modal fade" id="editPelanggaran<?php echo $bimpel->id_bimpel ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formJPelanggaran" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formEditPelanggaranLabel">Ubah Data Kategori Pelanggaran</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form name="form_edit_pelanggaran" action="<?php echo base_url() . 'pelanggaran/edit' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <input type="hidden"  placeholder="ID_bimpel" autofocus name="id_bimpel" pattern="\d{5}" value="<?php echo $bimpel->id_bimpel ?>" readonly>
                                                <div class="invalid-feedback">
                                                    Isikan ID_katpel!
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label text-primary">Nama Siswa</label>
                                                <input class="form-control" name="nis" pattern="/d{10}" value="<?php echo $bimpel->nis.' '.$bimpel->nama ?>" readonly>

                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label class="control-label text-primary">Wali Kelas</label>
                                                <input class="form-control" name="nip" pattern="/d{10}" value="<?php echo $bimpel->nip.' '.$bimpel->nama_guru ?>"readonly>

                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label class="control-label text-primary">Jenis Pelanggaran</label>
                                                <input class="form-control" name="id_jpel" pattern="/d{10}" value="<?php echo $bimpel->id_jpel.' '.$bimpel->jpel ?>" readonly>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label class="control-label text-primary">Kategori Pelanggaran</label>
                                                <input class="form-control" name="id_katpel" pattern="/d{10}" value="<?php echo $bimpel->id_katpel.' '.$bimpel->kategori ?>" readonly>

                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label class="control-label text-primary">Keterangan Pelanggaran</label>
                                                <input class="form-control" name="keterangan"  value="<?php echo $bimpel->keterangan ?>" required>

                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label class="control-label text-primary">Tanggal Pelanggaran</label>
                                                <input type="date" class="form-control" name="tgl_bimpel" pattern="/d{10}" value="<?php echo $bimpel->tgl_bimpel ?>" required>

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
                                    url: "<?php echo base_url('pelanggaran/daftar_siswa/') ?>" + id_kls,
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
                            $('#select').change(function() {
                                var nis = $('#select').val()
                                $.ajax({
                                    url: "<?php echo base_url('pelanggaran/nama_walas/') ?>" + nis,
                                    dataType: "json",
                                    type: "get",
                                    success: function(obj) {
                                        $('#input2').val(obj.nip);
                                        $('#input').val(obj.nip + ' ' + obj.nama_guru);


                                    }
                                });
                            });
                            $('#select2').change(function() {
                               
                                var id_jpel = $('#select2').val()
                                $.ajax({
                                    url: "<?php echo base_url('pelanggaran/kategori/') ?>" +id_jpel,
                                    dataType: "json",
                                    type: "get",
                                    success: function(obj) {
                                        //    alert(JSON.stringify(obj));
                                        $('#input4').val(obj.id_katpel);
                                        $('#input3').val(obj.id_katpel + ' ' + obj.kategori);

                                    }
                                });
                            });
                        });
                    </script>