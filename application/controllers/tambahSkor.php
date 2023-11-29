<?php
defined('BASEPATH') or exit('No direct script access allowed');

class tambahSkor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model',  'menu');
    }

    public function index()
    {
        $data['title'] = 'Data Skor';
        $data['getKlub'] = $this->db->order_by('kode_klub', 'ASC')->get('tabel_klub')->result_array();
        $this->form_validation->set_rules('metodenya', 'metodenya', 'required');
        //$this->form_validation->set_rules('kotaKlub', 'kotaKlub', 'required');

        $metodenya  = $this->input->post('metodenya');
        $klubKandang = $this->input->post('klubKandang');
        $skorKandang = $this->input->post('xx');
        $klubTandang = $this->input->post('klubTandang');
        $skorTandang = $this->input->post('skorTandang');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('ASL2023/tambahDataPertandingan', $data);
            $this->load->view('templates/footer', $data);
        } else {
            //echo $metodenya . "<br>";
            //echo $klubKandang . "<br>";
            //echo $skorKandang . "<br><br>";
            //echo $klubTandang . "<br>";
            //echo $skorTandang . "<br>";

            if ($metodenya == "singgle") {
                //Cek pertandingan yang sama
                $cekPertandingan = $this->db->get_where('tabel_pertandingan', ['klub_kandang' => $klubKandang, 'klub_tandang' => $klubTandang])->num_rows();
                if ($cekPertandingan !== 0) {
                    $informasi = array(
                        'status' => 'danger', 'pesan' => '
                    <hr>
                    ◉ Pertandingan  "' . $klubKandang . ' VS ' . $klubTandang . '" telah terjadi'
                    );
                    $this->session->set_flashdata('informasi', $informasi);
                    $msg_alert = array('title' => 'Data Pertandingan Gagal Ditambahkan!', 'text' => 'Permintaan penambahan data pertandingan gagal', 'icon' => 'error');
                    $this->session->set_flashdata('sweetalert', $msg_alert);
                    redirect('tambahSkor');
                } else {
                    //Menentukan Point
                    if ($skorKandang > $skorTandang) {
                        $point_kandang = 3;
                        $point_tandang = 0;
                    } else if ($skorKandang == $skorTandang) {
                        $point_kandang = 1;
                        $point_tandang = 1;
                    } else {
                        $point_kandang = 0;
                        $point_tandang = 3;
                    }

                    $data = [
                        "klub_kandang" => $klubKandang,
                        "skor_kandang" => $skorKandang,
                        "point_kandang" => $point_kandang,
                        "klub_tandang" => $klubTandang,
                        "skor_tandang" => $skorTandang,
                        "point_tandang" => $point_tandang,
                    ];
                    $this->db->insert('tabel_pertandingan', $data);
                    $informasi = array(
                        'status' => 'success', 'pesan' => '
                                    <hr>
                                    ◉ Pertandingan  "' . $klubKandang . ' VS ' . $klubTandang . '" berhasil ditambahkan <br>
                                    ◉ Dengan score: ' . $skorKandang . '-' . $skorTandang .
                            ' <br> ◉ ' . $klubKandang . ' Meraih ' . $point_kandang . ' point, dan ' . $klubTandang . ' Meraih ' . $point_tandang . ' point'

                    );
                    $this->session->set_flashdata('informasi', $informasi);
                    $msg_alert = array('title' => 'Data Pertandingan Ditambahkan!', 'text' => 'Permintaan penambahan pertandingan berhasil', 'icon' => 'success');
                    $this->session->set_flashdata('sweetalert', $msg_alert);
                    redirect('tambahSkor');
                }
            } else if ($metodenya == "multiple") {
                $totalData = count($klubKandang);
                $sama = 0;
                $baru = 0;
                $pesan = "";
                //echo "Total Data Klub: $totalData";
                
                for ($i = 0; $i < $totalData; $i++) {

                    //echo "Klub Kandang: ".$klubKandang[$i]."<br>";
                    //echo "Skor Kandang: ".$skorKandang[$i]."<br>";
                    //echo "Klub Tandang: ".$klubTandang[$i]."<br>";
                    //echo "Skor Tandang: ".$skorTandang[$i]."<br><br>";
                    $cekPertandingan = $this->db->get_where('tabel_pertandingan', ['klub_kandang' => $klubKandang[$i], 'klub_tandang' => $klubTandang[$i]])->num_rows();
                    if ($cekPertandingan !== 0) {
                        $sama = $sama + 1;
                    } else {
                        $baru = $baru + 1;
                        if ($skorKandang[$i] > $skorTandang[$i]) {
                            $point_kandang[$i] = 3;
                            $point_tandang[$i] = 0;
                        } else if ($skorKandang[$i] == $skorTandang[$i]) {
                            $point_kandang[$i] = 1;
                            $point_tandang[$i] = 1;
                        } else {
                            $point_kandang[$i] = 0;
                            $point_tandang[$i] = 3;
                        }
                        $data = [
                            "klub_kandang" => $klubKandang[$i],
                            "skor_kandang" => $skorKandang[$i],
                            "point_kandang" => $point_kandang[$i],
                            "klub_tandang" => $klubTandang[$i],
                            "skor_tandang" => $skorTandang[$i],
                            "point_tandang" => $point_tandang[$i],
                        ];
                        $this->db->insert('tabel_pertandingan', $data);
                        $pesan .=
                        '◉ Pertandingan ke-' . $i . ': ' . $klubKandang[$i] . ' VS ' . $klubTandang[$i] . '" berhasil ditambahkan <br>
                                    ◉ Dengan score: ' . $skorKandang[$i] . '-' . $skorTandang[$i].'<br>';
                    }
                }

                 if($baru == 0) {
                    $informasi = array(
                        'status' => 'danger', 'pesan' => '
                    <hr>
                    ◉ Seluruh pertandingan yang didaftarkan telah terjadi'
                    );
                    $this->session->set_flashdata('informasi', $informasi);
                    $msg_alert = array('title' => 'Data Pertandingan Gagal Ditambahkan!', 'text' => 'Permintaan penambahan data pertandingan gagal', 'icon' => 'error');
                    $this->session->set_flashdata('sweetalert', $msg_alert);
                    redirect('tambahSkor');
                 } else {
                    $informasi = array(
                        'status' => 'success', 'pesan' => '
                                    <hr>
                                    ' . $pesan
                    );
                    $this->session->set_flashdata('informasi', $informasi);
                    $msg_alert = array('title' => 'Data Klub Ditambahkan!', 'text' => 'Permintaan penambahan data klub berhasil', 'icon' => 'success');
                    $this->session->set_flashdata('sweetalert', $msg_alert);
                    redirect('tambahSkor');
                 }
                
            }
        }
    }
}
