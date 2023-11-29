<?php
defined('BASEPATH') or exit('No direct script access allowed');

class tambahKlub extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model',  'menu');
    }

    public function index()
    {
        $data['title'] = 'Data Club';

        //Validasi untuk nama klub yang tidak boleh sama
        $this->form_validation->set_rules('namaKlub', 'namaKlub', 'required');
        $this->form_validation->set_rules('kotaKlub', 'kotaKlub', 'required');

        $namaKlub  = $this->input->post('namaKlub');
        $kotaKlub = $this->input->post('kotaKlub');
        $passwordBaru2 = $this->input->post('passwordBaru2');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('ASL2023/tambahDataKlub', $data);
            $this->load->view('templates/footer', $data);
        } else {

            //Validasi Nama Klub 
            $cekNamaKlub = $this->db->get_where('tabel_klub', ['nama_klub' => $namaKlub])->num_rows();

            if ($cekNamaKlub !== 0) {
                $informasi = array(
                    'status' => 'danger', 'pesan' => '
                <hr>
                ◉ Nama Klub "' . $namaKlub . ' sudah terdaftar.'
                );
                $this->session->set_flashdata('informasi', $informasi);
                $msg_alert = array('title' => 'Data Klub Gagal Ditambahkan!', 'text' => 'Permintaan penambahan data klub gagal', 'icon' => 'error');
                $this->session->set_flashdata('sweetalert', $msg_alert);
                redirect('tambahKlub');
            } else {
                $data = [
                    "nama_klub" => $namaKlub,
                    "kota_klub" => $kotaKlub,
                ];
                $this->db->insert('tabel_klub', $data);
                $informasi = array(
                    'status' => 'success', 'pesan' => '
                                <hr>
                                ◉ Nama Klub : ' . $namaKlub . '<br>
                                ◉ Kota Klub : ' . $kotaKlub
                );
                $this->session->set_flashdata('informasi', $informasi);
                $msg_alert = array('title' => 'Data Klub Ditambahkan!', 'text' => 'Permintaan penambahan data klub berhasil', 'icon' => 'success');
                $this->session->set_flashdata('sweetalert', $msg_alert);
                redirect('tambahKlub');
            }
        }
    }
}
