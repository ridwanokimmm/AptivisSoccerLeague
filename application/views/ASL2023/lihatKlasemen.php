<?php



?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-body">
            <div class="row">

                <div class="col-lg-12 col-12 order-1 order-lg-2">
                    <center>
                        <h3 class="float-start mb-0">KLASEMEN APTAVIS Soccer League</h3>
                    </center>
                    <br>
                    <hr>
                    <!-- post 1 -->
                    <div class="card" style="background-image: url('https://themewagon.github.io/soccer/images/bg_3.jpg'); background-size: cover; background-position: center;">
                        <div class="card-body">
                            <div class="row my-2">
                                <div class="col-12 col-md-3 d-flex align-items-center justify-content-center mb-2 mb-md-0">

                                </div>
                                <div class="col-12 col-md-9">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Daftar Klasemen</h4>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">
                                                Dibawah ini merupakan daftar klasemen pertandingan sementara hingga waktu terkini.
                                                <br> Dukung terus tim unggulanmu!
                                                <?php
                                                echo $klub;
                                                ?>
                                            </p>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Tim</th>
                                                        <th>Ma</th>
                                                        <th>Me</th>
                                                        <th>S</th>
                                                        <th>K</th>
                                                        <th>GM</th>
                                                        <th>GK</th>
                                                        <th>Point</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    $no = 1;
                                                    foreach ($getKlub as $daftarKlub) {
                                                        $namaKlubnya = $daftarKlub['nama_klub'];
                                                        $data['klub'] = $namaKlubnya;
                                                        $data['main'] = $this->db->get_where('tabel_pertandingan', ['klub_kandang' => $namaKlubnya])->num_rows()
                                                            + $this->db->get_where('tabel_pertandingan', ['klub_tandang' => $namaKlubnya])->num_rows();
                                                        $dataTanding = $this->db->where('klub_kandang', $namaKlubnya)
                                                            ->or_where('klub_tandang', $namaKlubnya)
                                                            ->get('tabel_pertandingan');
                                                        $hasilTanding = $dataTanding->result();

                                                        // Menghitung jumlah pertandingan sebagai tuan rumah dan sebagai tim tandang
                                                        $data['main'] = count($hasilTanding);

                                                        // Menghitung jumlah kemenangan, seri, dan kekalahan
                                                        $data['menang'] = 0;
                                                        $data['seri'] = 0;
                                                        $data['kalah'] = 0;

                                                        // Menghitung jumlah gol menang dan gol kalah
                                                        $data['GM'] = 0;
                                                        $data['GK'] = 0;

                                                        foreach ($hasilTanding as $pertandingan) {
                                                            if ($pertandingan->klub_kandang == $namaKlubnya) {
                                                                // Klub menjadi tuan rumah
                                                                $data['GM'] += $pertandingan->skor_kandang;
                                                                $data['GK'] += $pertandingan->skor_tandang;

                                                                if ($pertandingan->skor_kandang > $pertandingan->skor_tandang) {
                                                                    $data['menang']++;
                                                                } elseif ($pertandingan->skor_kandang == $pertandingan->skor_tandang) {
                                                                    $data['seri']++;
                                                                } else {
                                                                    $data['kalah']++;
                                                                }
                                                            } else {
                                                                // Klub menjadi tim tandang
                                                                $data['GM'] += $pertandingan->skor_tandang;
                                                                $data['GK'] += $pertandingan->skor_kandang;

                                                                if ($pertandingan->skor_tandang > $pertandingan->skor_kandang) {
                                                                    $data['menang']++;
                                                                } elseif ($pertandingan->skor_tandang == $pertandingan->skor_kandang) {
                                                                    $data['seri']++;
                                                                } else {
                                                                    $data['kalah']++;
                                                                }
                                                            }
                                                        }

                                                        // Menghitung jumlah poin
                                                        $data['point'] = $data['menang'] * 3 + $data['seri'];

                                                        // Output hasil
                                                        echo '<tr>';
                                                        echo '<td>' . $no++ . '</td>';
                                                        echo '<td>' . $namaKlubnya . '</td>';
                                                        echo '<td>' . $data['main'] . '</td>';
                                                        echo '<td>' .  $data['menang'] . '</td>';
                                                        echo '<td>' . $data['seri'] . '</td>';
                                                        echo '<td>' . $data['kalah'] . '</td>';
                                                        echo '<td>' . $data['GM'] . '</td>';
                                                        echo '<td>' . $data['GK']  . '</td>';
                                                        echo '<td>' . $data['point'] . '</td>';
                                                        // Tambahkan kolom lain sesuai kebutuhan
                                                        echo '</tr>';
                                                        //echo "Jumlah Pertandingan: " . $data['main'] . "<br>";
                                                        //echo "Jumlah Menang: " . $data['menang'] . "<br>";
                                                        //echo "Jumlah Seri: " . $data['seri'] . "<br>";
                                                        //echo "Jumlah Kalah: " . $data['kalah'] . "<br>";
                                                        //echo "Goal Menang: " . $data['GM'] . "<br>";
                                                        //echo "Goal Kalah: " . $data['GK'] . "<br>";
                                                        //echo "Poin: " . $data['point'] . "<br><br>";
                                                    }

                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>