<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Database_model extends CI_Model
{
    public function getAllDatabase()
    {
        $database = $this->db->get_where('ids', ['status' => 'yes'])->num_rows();
        $totalDatabase = $database;
        return $totalDatabase;
    }

    public function getDatabaseSV($server)
    {
        $totalDatabase = $this->db->get_where('ids', ['status' => 'yes', 'server' => 'SV'.$server])->num_rows();
        return $totalDatabase;
    }

    public function getAllDatabaseGender($gender)
    {
        $database = $this->db->get_where('ids', ['status' => 'yes', 'gender' => $gender])->num_rows();
        $totalDatabase = $database;
        return $totalDatabase;
    }

    public function getDatabaseGender($server, $gender)
    {
        $totalDatabase = $this->db->get_where('ids', ['status' => 'yes', 'gender' => $gender, 'server' => 'SV'.$server])->num_rows();
        return $totalDatabase;
    }

    //Member
    public function getLayananSuper($service)
    {
        $totalDatabase = $this->db->get_where('service', ['status' => 'tersedia', 'no' => $service])->row_array();
        return $totalDatabase;
    }

    public function getDatabaseMaster()
    {
        $databaseMaster = $this->db->limit(1)->get_where('database_master', ['status' => 'yes'])->row_array();
        return $databaseMaster;
    }

    public function getRiwayatSuper($link, $server, $category)
    {
        $where = "url_target = '$link' AND kode_layanan = '$server' AND category = '$category' AND status = 'Success' OR url_target = '$link' AND kode_layanan = '$server' AND category = '$category' AND status = 'Partial'";
        $Riwayat = $this->db->get_where('transaksi_pesanan', $where);
        return $Riwayat->result_array();
    }

}
