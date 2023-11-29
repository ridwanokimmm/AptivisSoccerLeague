<?php
function is_logged_in()
{
    $CI = get_instance();
    if (!$CI->session->userdata('email')) {
        redirect('auth');
    } else {
        $level = $CI->session->userdata('level');

        $segment2 = $CI->uri->segment(2);
        if($segment2 == "")
            $menu = $CI->uri->segment(1);
        else {
            $segment1 = $CI->uri->segment(1);
            $menu = $segment1.'/'.$segment2;
        }
        $queryMenu = $CI->db->get_where('sett_submenu', ['url' => $menu])->row_array();
        $nama_menu = $queryMenu['nama_menu'];
        $userAccess = $CI->db->get_where('sett_akses', ['level' => $level, 'nama_menu' => $nama_menu]);

        if ($userAccess->num_rows() == 0) {
            redirect('auth/blocked');
        }
    }
}

function check_access($level, $nama_menu)
{
    $CI = get_instance();
    $CI->db->where('level', $level);
    $CI->db->where('nama_menu', $nama_menu);
    $result = $CI->db->get('sett_akses');
    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function active_check($is_active, $subnama_menu)
{
    $CI = get_instance();
    $CI->db->where('status', $is_active);
    $CI->db->where('id', $subnama_menu);
    $result = $CI->db->get('sett_submenu');
    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
