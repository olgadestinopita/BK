                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h4 class="my-auto font-weight-bold text-primary">Data Orang Tua</h4>
                            <div class="d-flex">
                                <!-- <a href="<?php echo base_url() . 'guru/print' ?>" class="btn btn-warning shadow-sm"><i
                                class="fas fa-print fa-sm text-white-50"></i> Print</a>
                                <a href="<?php echo base_url() . 'guru/cetak_pdf' ?>" class="btn btn-danger shadow-sm mx-2"><i
                                class="fas fa-file fa-sm text-white-50"></i> Cetak PDF</a> -->
                                <a href="#' ?>" class="btn btn-primary shadow-sm" data-toggle="modal" data-target="#addOrtu"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-primary">
                                            <th>No.</th>
                                            <th>Nama Orang Tua</th>
                                            <th>Jenis kelamin</th>
                                            <th>No HP</th>
                                            <th>Pekerjaan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>

                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data_ortu as $ortu) {
                                        ?>
                                            <tr>
                                                <th><?php echo $no++ ?></th>
                                                
                                                <td><?php echo $ortu->nama_ortu ?></td>
                                                <td><?php echo $ortu->jekel_ortu ?></td>
                                                <td><?php echo $ortu->tlp_ortu ?></td>
                                                <td><?php echo $ortu->nama_kerja ?></td>

                                                
                                                <td class="action-icons">
                                                    <a href="#" data-toggle="modal" data-target="#editOrtu<?php echo $ortu->id_ortu ?>">
                                                        <i title="ubah" class="fas fa-edit text-lg text-warning"></i>
                                                    </a> |
                                                    <a href="<?php echo base_url() . 'ortu/delete/' . $ortu->id_ortu ?>">
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
                <div class="modal fade" id="addOrtu" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formAddOrtu" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formAddOrtuLabel">Input Data Orang Tua</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form name="form_add_ortu" action="<?php echo base_url() . 'ortu/add' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                                <div class="modal-body">
                                    <!-- <div class="form-group">
                                        <label class="control-label text-primary">NIP</label>
                                        <input type="text" class="form-control" placeholder="NIP Guru" autofocus name="nip" pattern="\d{10}" required>
                                        <div class="invalid-feedback">
                                            Isikan NIP dengan 10 digit angka!
                                        </div>
                                    </div>
                                    <hr> -->

                                    <div class="form-group">
                                        <label class="control-label text-primary">Nama Orang Tua</label>
                                        <input type="text" class="form-control" placeholder='Nama Orang Tua' name="nama_ortu" required>
                                        <div class="invalid-feedback">
                                            Isikan nama guru
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                    <label class="control-label text-primary">Jenis Kelamin</label>
                                    <select class="form-control" placeholder='' name="jekel_ortu" pattern="[A-Za-z]{1,10}" required>
                                        <option value="">--Pilih Jenis Kelamin--</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Pilih Jenis Kelamin Orang Tua !
                                    </div>
                                </div>
                                <hr>
                                    <div class="form-group">
                                        <label class="control-label text-primary">No.HP</label>
                                        <input type="text" class="form-control" placeholder='Nomor HP' name="tlp_ortu" required>
                                        <div class="invalid-feedback">
                                            Isikan nomor HP siswa !
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="form-group">
                                        <label class="control-label text-primary">Pekerjaan</label>
                                        <select name="id_pekerjaan" class="form-control" required>
                                        <option value=""></option>
                                            <?php
                                            $kerja = $this->db->select('*')->get('pekerjaan_ortu');
                                            $data = $kerja->result();
                                            ?>
                                            <?php foreach ($data as $kerja) : ?>

                                                <option value="<?= $kerja->id_pekerjaan ?>"><?= $kerja->nama_kerja ?></option>
                                                
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
                foreach ($data_ortu as $ortu) {
                ?>
                    <div class="modal fade" id="editOrtu<?php echo $ortu->id_ortu ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formEditOrtu" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formEditOrtuLabel">Ubah Data Orang Tua</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form name="form_edit_ortu" action="<?php echo base_url() . 'ortu/edit' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                                    <div class="modal-body">
                                        <!-- <div class="form-group"> -->
                                          
                                            <input type="hidden" class="form-control" placeholder="id_ortu " autofocus name="id_ortu" pattern="\d{10}" value="<?php echo $ortu->id_ortu  ?>">
                                            <!-- <div class="invalid-feedback">
                                                Isikan NIP dengan 10 digit angka!
                                            </div>
                                        </div> -->

                                       

                                        <div class="form-group">
                                            <label class="control-label text-primary">Nama Orang Tua</label>
                                            <input type="text" class="form-control" placeholder='Nama Orang Tua' name="nama_ortu" pattern="[A-Za-z ]{1,25}" value="<?php echo  $ortu->nama_ortu?>" required>
                                            <div class="invalid-feedback">
                                                Isikan nama orang tua dengan huruf! (maks. 25 huruf)
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label class="control-label text-primary">Jenis Kelamin</label>
                                            <select class="form-control" name="jekel_ortu" pattern="[A-Za-z]{1,10}" required>
                                                <!-- <option>--Pilih Jenis Kelamin--</option> -->
                                                <option value="Laki-Laki" <?php if ($ortu->jekel_ortu === 'L') {
                                                                                echo "selected";
                                                                            } ?>>Laki-Laki</option>
                                                <option value="Perempuan" <?php if ($ortu->jekel_ortu === 'P') {
                                                                                echo "selected";
                                                                            } ?>>Perempuan</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Pilih jenis kelamin siswa!
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label class="control-label text-primary">No.HP</label>
                                            <input type="text" class="form-control" placeholder='No.HP' name="tlp_ortu" value="<?php echo $ortu->tlp_ortu ?>" required>
                                            <div class="invalid-feedback">
                                                isikan nomor HP siswa!
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label class="control-label text-primary">Pekerjaan</label>
                                            <select class="form-control" name="id_pekerjaan" pattern="/d{10}" required>
                                                <option value=""></option>
                                                <?php
                                                foreach ($data as $kerja) {
                                                ?>
                                                    <option value="<?php echo $kerja->id_pekerjaan ?>" <?php if ($kerja->id_pekerjaan === $ortu->id_pekerjaan) {
                                                                                                        echo "selected";
                                                                                                    } ?>>
                                                        <?php echo $kerja->nama_kerja ?>
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