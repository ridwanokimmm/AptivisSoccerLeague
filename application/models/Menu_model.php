<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT sett_submenu.*, sett_menu.nama_menu FROM sett_submenu JOIN sett_menu ON sett_submenu.nama_menu = sett_menu.nama_manu";
        return $this->db->query($query)->result_array();
    }

    public function showMenu($level)
    {
        $queryMenu = "SELECT sett_akses.nama_menu FROM sett_menu JOIN sett_akses ON sett_menu.nama_menu = sett_akses.nama_menu WHERE sett_akses.level = '$level' ORDER BY sett_akses.id ASC";
        return $this->db->query($queryMenu)->result_array();
    }

    public function showSubMenu($menu)
    {
        $querySubMenu = "SELECT * FROM sett_submenu WHERE nama_menu = '$menu' AND status = 'Tersedia'";
        return $this->db->query($querySubMenu)->result_array();
    }
    // User Menu
    public function getUserMenuAll()
    {
        return $this->db->get_where('sett_menu', ['nama_manu !=' => 1])->result_array();
    }
}
