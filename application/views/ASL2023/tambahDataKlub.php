    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-body">
                <div class="row">
                    <div class="col-lg-12 col-sm-6 col-12">
                        <?php if ($this->session->flashdata('informasi')) {
                            $informasi = $this->session->flashdata('informasi'); ?>
                            <div class="alert bg-<?php echo $informasi['status']; ?>" role="alert">
                                <div class="alert-body text-white">
                                    <?php if ($informasi['status'] == "danger") { ?>
                                        <strong>Respon: Gagal menambahkan Data Klub!</strong>
                                    <?php } else if ($informasi['status'] == "success") { ?>
                                        <strong>Respon: Berhasil menambahkan Data Klub</strong>
                                    <?php } ?>
                                    <br>
                                    <?php echo $informasi['pesan']; ?>
                                </div>
                            </div>
                        <?php } ?>
                        <hr>
                    </div>
                    <div class="col-12">
                        <div class="alert bg-secondary" role="alert">
                            <div class="alert-body text-white">
                                <strong>Respon: Halaman Tambah Data Klub</strong><br>Haloo, Kamu dapat menambahkan data klub pada halaman ini.
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Menu Utama - Tambah Data Klub</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="card-text">
                                        <p>Peraturan untuk menambahkan data klub baru ialah <code>Nama Klub tidak boleh sama</code>, dan asal kota klub menyesuaikan klub yang akan ditambahkan.</p>
                                    </div>
                                    <form class="form-horizontal" method="POST">
                                        <div class="col-md-12 col-12">
                                            <div class="mb-1">
                                                <label for="namaKlub">Nama Klub</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="namaKlub" required>
                                                    <div class="invalid-feedback"><?php echo form_error('namaKlub'); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="mb-1">
                                                <label for="kotaKlub">Asal Kota Klub</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="kotaKlub" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group m-b-0">
                                            <div class="input-group">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>