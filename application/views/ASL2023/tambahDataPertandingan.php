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
                                    <strong>Respon: Gagal membuat pesanan!</strong>
                                <?php } else if ($informasi['status'] == "success") { ?>
                                    <strong>Respon: Pesanan berhasil dibuat</strong>
                                <?php } ?>
                                <br>
                                <?php echo $informasi['pesan']; ?>
                            </div>
                        </div>
                    <?php } ?>
                    <hr>
                    <div class="alert bg-secondary" role="alert">
                        <div class="alert-body text-white">
                            <strong>Informasi Pemakaian :</strong><br>
                            Ikuti cara penggunaan layanan seperti yang dicontohkan, dan perlu diperhatikan untuk memastikan kembali isi data yang diberikan agar pesanan berhasil.
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6 col-12">
                    <img class="card-img-top" src="<?= base_url() ?>app-assets/images/slider/01.jpg" alt="Card image cap" /></img>
                    <hr>
                    <div id="accordionWrapa50" role="tablist" aria-multiselectable="true">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Cara Penggunaan</h4>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    Ketuk Gambar <code>"PLAY BUTTON"</code> untuk melihat video tutorial / cermati cara penggunaan dibawah untuk menambahkan skor pertandingan.
                                </p>
                                <div class="accordion accordion-border" id="accordionBorder">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingBorderOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#langkahSatu" aria-expanded="false" aria-controls="langkahSatu">
                                                1. "Tentukan Metode Tambah Skor"
                                            </button>
                                        </h2>
                                        <div id="langkahSatu" class="accordion-collapse collapse" aria-labelledby="headingBorderOne" data-bs-parent="#accordionBorder">
                                            <div class="accordion-body">
                                                <p class="card-text">Anda dapat menambah data skor dengan metode singgle maupun multiple.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingBorderTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#langkahDua" aria-expanded="false" aria-controls="langkahDua">
                                                2. "Memilih Tim Kandang"
                                            </button>
                                        </h2>
                                        <div id="langkahDua" class="accordion-collapse collapse" aria-labelledby="headingBorderTwo" data-bs-parent="#accordionBorder">
                                            <div class="accordion-body">
                                                <p class="card-text">Anda dapat memilih tim kandang terlebih dahulu.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingBorderThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#langkahTiga" aria-expanded="false" aria-controls="langkahTiga">
                                                3. "Memilih Tim Tandang"
                                            </button>
                                        </h2>
                                        <div id="langkahTiga" class="accordion-collapse collapse" aria-labelledby="headingBorderThree" data-bs-parent="#accordionBorder">
                                            <div class="accordion-body">
                                                <p class="card-text">Andda dapat memilih tim tandang setelah memilih tim kandang.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingBorderFour">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#langkahLima" aria-expanded="false" aria-controls="langkahLima">
                                                4. "Memasukan Skor pada Tim Kandang & Tim Kandang"
                                            </button>
                                        </h2>
                                        <div id="langkahLima" class="accordion-collapse collapse" aria-labelledby="headingBorderFour" data-bs-parent="#accordionBorder">
                                            <div class="accordion-body">
                                                <p class="card-text">Masukan hasil skor yang terjadi pada pertandingan tim tersebut.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-6 col-12">

                    <?php if ($this->session->flashdata('informasi') == TRUE) {
                        $this->session->keep_flashdata('informasi');
                        $this->session->keep_flashdata('sweetalert');
                        flush();
                        echo '<div name="load" id="load"></div>';
                    } else {
                        $this->session->keep_flashdata('informasi');
                        $this->session->keep_flashdata('sweetalert');
                        flush();
                        echo '<div name="load" id="load"></div>';
                    } ?>

                    <div class="card card-user-timeline">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <i data-feather="flag" class="user-timeline-title-icon"></i>
                                <h4 class="card-title">Tambah Skor Pertandingan</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-text">
                                <p>Kamu berada pada halaman "Tambah Skore {ertandingan}", anda dapat menambahkan data pertandingan menggunakan cara
                                    <code>"Singgle"</code> & <code>"Multiple"</code>
                                </p>
                            </div>
                            <form class="form-horizontal" method="POST">
                                <div class="col-md-12 col-12">
                                    <ul class="nav nav-tabs justify-content-center" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="service-tab-center" data-bs-toggle="tab" href="#singgle" aria-controls="singgle" role="tab" aria-selected="false">Singgle</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="home-tab-center" data-bs-toggle="tab" href="#multi" aria-controls="multi" role="tab" aria-selected="true">Multiple</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane" id="multi" aria-labelledby="home-tab-center" role="tabpanel">

                                            <form class="form-horizontal" method="POST" id="formPertandingan">
                                                <input type="hidden" name="metodenya" value="multiple">
                                                <div id="formPertandingan">
                                                    <!-- Form Pertama -->
                                                    <div class="form-pertandingan" data-index="0">
                                                        <div class="row">
                                                            <div class="col-md-6 col-6">
                                                                <div class="mb-1"><label class="form-label" for="klubKandang[0]">Team Kandang</label>
                                                                    <select class="form-select" name="klubKandang[0]" onchange="updateOpsiTim(this, 'klubTandang[0]')" required>
                                                                        <option value="0">Pilih Tim Kandang..</option>
                                                                        <?php
                                                                        foreach ($getKlub as $listCategory) { ?>
                                                                            <option value="<?= $listCategory['nama_klub']; ?>"><?= $listCategory['nama_klub']; ?></option>
                                                                        <?php   } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-6">
                                                                <div class="mb-1"><label class="form-label" for="klubTandang[0]">Team Tandang</label>
                                                                    <select class="form-select" name="klubTandang[0]" klu>
                                                                        <option value="0">Pilih Tim Tandang..</option>
                                                                        <?php
                                                                        foreach ($getKlub as $listCategory) { ?>
                                                                            <option value="<?= $listCategory['nama_klub']; ?>"><?= $listCategory['nama_klub']; ?></option>
                                                                        <?php   } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6 col-6">
                                                                <div class="mb-1"><label class="form-label" for="xx[0]">Skor Kandang</label>
                                                                    <input type="number" class="form-control" placeholder="0" name="xx[0]" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-6">
                                                                <div class="mb-1"><label class="form-label" for="skorTandang[0]">Skor Tandang</label>
                                                                    <input type="number" class="form-control" placeholder="0" name="skorTandang[0]" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </div>

                                                </div>

                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-success me-1">Save</button>
                                                    <button type="button" class="btn btn-primary me-1" onclick="tambahPertandingan()">Tambah Pertandingan</button>
                                                    <button type="reset" class="btn btn-secondary me-1">Reset</button>
                                                </div>
                                            </form>

                                        </div>

                                        <div class="tab-pane active" id="singgle" aria-labelledby="service-tab-center" role="tabpanel">

                                            <form class="form-horizontal" method="POST">
                                                <div class="row">
                                                    <div class="row">
                                                        <input type="hidden" name="metodenya" value="singgle">
                                                        <div class="col-md-6 col-6">
                                                            <div class="mb-1"><label class="form-label" for="kandang">Team Kandang</label>
                                                                <select class="select2 form-select" name="klubKandang" id="klubKandang" onchange="updateOpsiTim(this, 'klubTandang')" required>
                                                                    <option value="0">Pilih Tim Kandang..</option>
                                                                    <?php
                                                                    foreach ($getKlub as $listCategory) { ?>
                                                                        <option value="<?= $listCategory['nama_klub']; ?>"><?= $listCategory['nama_klub']; ?></option>
                                                                    <?php   } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-6">
                                                            <div class="mb-1"><label class="form-label" for="tandang">Team Tandang</label>
                                                                <select class="select2 form-select" name="klubTandang" id="klubTandang">
                                                                    <option value="0">Pilih Tim Tandang..</option>
                                                                    <?php
                                                                    foreach ($getKlub as $listCategory) { ?>
                                                                        <option value="<?= $listCategory['nama_klub']; ?>"><?= $listCategory['nama_klub']; ?></option>
                                                                    <?php   } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6 col-6">
                                                            <div class="mb-1"><label class="form-label" for="xx">Skor Kandang</label>
                                                                <input type="number" class="form-control" placeholder="0" name="xx" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-6">
                                                            <div class="mb-1"><label class="form-label" for="skorTandang">Skor Tandang</label>
                                                                <input type="number" class="form-control" placeholder="0" name="skorTandang" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-success me-1">Save</button>
                                                        <button type="reset" class="btn btn-secondary me-1">Reset</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        function tambahPertandingan() {
            var formPertandingan = document.getElementById('formPertandingan');
            var formulirPertandingan = document.querySelectorAll('.form-pertandingan');
            var lastIndex = formulirPertandingan.length - 1;
            var formulirTerakhir = formulirPertandingan[lastIndex];
            var newIndex = parseInt(formulirTerakhir.getAttribute('data-index')) + 1;

            var formulirBaru = formulirTerakhir.cloneNode(true);
            formulirBaru.setAttribute('data-index', newIndex);

            // Reset opsi yang dipilih untuk mencegah duplikasi
            var elemenSelect = formulirBaru.querySelectorAll('select');
            elemenSelect.forEach(function(select) {
                select.selectedIndex = 0;
                select.name = select.name.replace('[' + lastIndex + ']', '[' + newIndex + ']');
            });

            // Reset nilai input skor
            var elemenInputSkor = formulirBaru.querySelectorAll('input[type=number]');
            elemenInputSkor.forEach(function(input) {
                input.value = '';
                input.name = input.name.replace('[' + lastIndex + ']', '[' + newIndex + ']');
            });

            formPertandingan.appendChild(formulirBaru);
        }


        function updateOpsiTim(timTerpilih, selectorTim) {
            var nilaiTerpilih = timTerpilih.value;
            var selectorTimB = document.getElementsByName(selectorTim);

            // Reset opsi di semua selector tim
            selectorTimB.forEach(function(selector) {
                selector.innerHTML = ''; // Hapus opsi yang sudah ada
                tambahOpsiDefault(selector); // Tambahkan opsi default
            });

            // Isi opsi berdasarkan tim terpilih
            selectorTimB.forEach(function(selector) {
                var tim = <?= json_encode($getKlub); ?>;
                tim.forEach(function(team) {
                    if (team.nama_klub !== nilaiTerpilih) {
                        tambahOpsiTim(selector, team);
                    }
                });
            });
        }

        function tambahOpsiTim(selector, team) {
            var opsi = document.createElement('option');
            opsi.value = team.nama_klub;
            opsi.text = team.nama_klub;
            selector.add(opsi);
        }

        function tambahOpsiDefault(selector) {
            var opsi = document.createElement('option');
            opsi.value = '';
            opsi.text = 'Pilih Tim';
            selector.add(opsi);
        }
    </script>