<?php
defined('BASEPATH') or exit('No direct script access allowed');

class lihatKlasemen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model',  'menu');
    }

    public function index()
    {
        $data['title'] = 'Daftar Klasemen';
        $getKlub = $this->db->order_by('kode_klub', 'ASC')->get('tabel_klub')->result_array();
        $data['getKlub'] = $getKlub;
         //$cekPertandingan = $this->db->get_where('tabel_pertandingan', ['klub_kandang' => $klubKandang, 'klub_tandang' => $klubTandang])->num_rows();
         //$datanya = $this->db->query($sql)->result();
         //$data['klasemen'] = $datanya;
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('ASL2023/lihatKlasemen', $data);
         $this->load->view('templates/footer', $data);
    }
}
