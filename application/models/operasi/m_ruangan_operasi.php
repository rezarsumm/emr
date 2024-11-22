<?php

class m_ruangan_operasi extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        // load encrypt
    }

    function getRuangOperasi($params) {

        // var_dump('ok');
        // die;

        $sql = "SELECT id,kode_ruang,nama_ruang FROM PKU.dbo.ok_ruangan";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
// var_dump('ok');
// die;

    }
}
?>