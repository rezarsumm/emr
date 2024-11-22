<?php

class m_dokter extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        // load encrypt
    }

    function getDokterBedah($params) {

   

        $sql = "SELECT Kode_Dokter,Nama_Dokter FROM DOKTER where Spesialis in ('SPESIALIS BEDAH',
            'SPESIALIS KANDUNGAN',
            'SPESIALIS ORTHOPEDI',
            'SPESIALIS BEDAH MULUT',
            'SPESIALIS THT-KL',
            'SPESIALIS UROLOGI',
            'SPESIALIS BEDAH SARAF')";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }

    function getRuangOperasi($params) {

        // var_dump('ok');
        // die;

        $sql = "SELECT * FROM PKU.dbo.ok_ruangan";
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