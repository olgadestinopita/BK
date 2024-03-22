                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h4 class="my-auto font-weight-bold text-primary">Laporan Bimbingan Siswa</h4>
                        </div>
                        <div class="card-body">
                            <form name="form_filter_pelanggaran" action="<?php echo base_url() . 'bimbingan/laporan_filter' ?>" method="post" class="w-50 user needs-validation mx-3 mb-4" novalidate>
                                <div class="form-group">
                                    <label class="control-label text-primary">Kelas</label>
                                    <select class="form-control" name="id_kls" required autofocus>
                                        <option value="all">Semua Kelas</option>
                                        <?php
                                        foreach ($data_kelas as $kelas) {
                                        ?>
                                            <option value="<?php echo $kelas->id_kls ?>" <?php if (set_value('id_kls') == $kelas->id_kls) {
                                                                                                echo 'selected';
                                                                                            } ?>>
                                                <?php echo $kelas->kelas ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <button type="submit" class="flex-fill btn btn-primary btn-user px-4">Cari</button>
                            </form>
                            <div class="d-flex m-3">
                                <a target="new" href="<?php echo base_url() . 'bimbingan/print/' . set_value('id_kls') ?>" class="btn btn-warning shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i> Print</a>
                            </div>

                            <div class="table-responsive mt-3">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-primary">
                                            <th>No.</th>
                                            <th>NIS</th>
                                            <th>Nama siswa</th>
                                            <th>Kelas</th>
                                            <th>Guru</th>
                                            <th>Jenis Bimbingan</th>
                                            <th>Aksi</th>
                      
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data_bimbingan as $bimbingan) {
                   
                                        ?>
                                            <tr>
                                                <th><?php echo $no++ ?></th>
                                                <td><?php echo $bimbingan->nis ?></td>
                                                <td><?php echo $bimbingan->nama ?></td>
                                                <td><?php echo $bimbingan->kelas ?></td>
                                                <td><?php echo $bimbingan->nama_guru ?></td>
                                                <td><?php echo $bimbingan->kategori_bimbingan?></td>
                                                <td class="action-icons">
                                                <a href="<?php echo base_url().'bimbingan/bimbingan_siswa/'; ?><?php echo $bimbingan->nis; ?>" class="btn btn-xs btn-danger">lihat</a>  | 
                                                  <a href="<?php echo base_url().'bimbingan/print_siswa/'; ?><?php echo $bimbingan->nis; ?>" class="btn btn-xs btn-primary">cetak</a>
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