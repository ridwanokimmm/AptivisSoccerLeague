<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);

class Ajax extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

    }

    public function getDataKlub()
    { ?>

        <option value="0">Pilih salah satu...</option>
        <?php
        require_once(APPPATH . 'libraries/mainconfig.php');

        $category = $_POST['category'];
        $query = "SELECT * FROM service WHERE category = '$category' AND status = 'Tersedia' ORDER BY no";
        $exe = mysqli_query($konek, $query);
        $cek = mysqli_num_rows($exe);
        $no = 1;
        while ($row = mysqli_fetch_assoc($exe)) {
            $id = $row['provider'];
            $service = $row['service']; ?>
            <option value="<?php echo $id; ?>"><?php echo $service; ?></option>
        <?php $no++;
        }
    }

}
