                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h4 class="my-auto font-weight-bold text-primary">Laporan Data Prestasi Siswa</h4>
                        </div>
                        <div class="card-body">
                            <form name="form_data_filter" action="<?php echo base_url() . 'prestasi/laporan_filter' ?>" method="post" class="w-50 user needs-validation mx-3 mb-4" novalidate>
                                <div class="form-group">
                                    <label class="control-label text-primary">Kelas Siswa</label>
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
                                    <div class="invalid-feedback">
                                        Isikan Kelas Siswa!
                                    </div>
                                </div>
                                <button type="submit" class="flex-fill btn btn-primary btn-user px-4">Cari</button>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->