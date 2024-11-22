<?php

class m_booking_operasi extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        // load encrypt
    }

    function insert($params) {
        $sql = "INSERT INTO PKU.dbo.ok_booking_operasi( kode_register, ruangan_id,kode_dokter,tanggal,jam_mulai,jam_selesai,nama_tindakan,terlaksana,created_by,updated_by,created_at,updated_at)
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }
    
    function update($params) {
        $sql = "UPDATE PKU.dbo.ok_booking_operasi set ruangan_id=?,kode_dokter=?,tanggal=?,jam_mulai=?,jam_selesai=?,nama_tindakan=?,updated_by=?,updated_at=?
        where kode_register=?";
        return $this->db->query($sql, $params);
    }

    function cek_booking_operasi($params) {
        $sql = "SELECT kode_register FROM PKU.dbo.ok_booking_operasi WHERE kode_register = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            return $result;
        } else {
            return 0;
        }
    }

    function BookingOperasiByNoReg($params) {

        // var_dump('ok');
        // die;

        $sql = "SELECT * FROM PKU.dbo.ok_booking_operasi";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
;

    }

}
?>