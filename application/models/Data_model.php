<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_model extends CI_Model
{
    public function DataDeposit($no_pesanan)
    {
        if ($this->session->userdata('username') != null) {
            $this->db->select('no_pesanan, kode_dibuat, pembaharuan, metode_deposit, catatan, kode, saldo, coin, jumlah_kirim, status');
            $this->db->from('transaksi_deposit');
            $this->db->where(['no_pesanan' => $no_pesanan, 'uplink' => $this->session->userdata('username')]);
            $query = $this->db->get();
            return $query->row();
        }
    }

    public function DeleteDeposit($no_pesanan)
    {
        if ($this->session->userdata('username') != null) {
            $this->db->set('status', 'Cancel');
            $this->db->where('no_pesanan', $no_pesanan);
            $this->db->update('transaksi_deposit');
        }
    }

    public function DataRiwayat($no_pesanan)
    {
        if ($this->session->userdata('username') != null) {
            $this->db->select('no_pesanan, date, url_target, refund, pembaharuan, category, nama_layanan, pesanan, hbeli_panel, status, pesanan_mulai, kurangnya');
            $this->db->from('transaksi_pesanan');
            $this->db->where(['no_pesanan' => $no_pesanan, 'uplink' => $this->session->userdata('username')]);
            $query = $this->db->get();
            return $query->row();
        }
    }

    public function DataRiwayatRefill($no_pesanan)
    {
        if ($this->session->userdata('username') != null) {
            $this->db->select('id_refill, no_pesanan, date, url_target, pembaharuan, category, nama_layanan, status');
            $this->db->from('transaksi_refill');
            $this->db->where(['id_refill' => $no_pesanan, 'uplink' => $this->session->userdata('username')]);
            $query = $this->db->get();
            return $query->row();
        }
    }
}
