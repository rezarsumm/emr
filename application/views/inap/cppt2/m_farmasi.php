<?php

class m_farmasi extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        // load encrypt
        $this->load->library('encrypt');
    }
    
    function insert($params) {
        $sql = "INSERT INTO TAC_RJ_RESEP( FS_KD_REG, FS_KD_BARANG,FN_QTY_BARANG,FS_KD_SATUAN,FN_DET_ORIG,
                FN_DET,FN_NEDET,FS_KETERANGAN, mdb, mdd)
                VALUES(?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }
    
     function delete($params) {
        $sql = "DELETE FROM TAC_RJ_RESEP WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }
    function get_copy_resep($params) {
        $sql = "SELECT a.*,b.FS_NM_BARANG
                FROM TAC_RJ_RESEP a
                LEFT JOIN HOSPITAL.dbo.TB_BARANG b ON a.FS_KD_BARANG=b.FS_KD_BARANG
                WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function get_resep_by_rg($params) {
        $sql = "SELECT FS_KD_BARANG,FS_NM_BARANG,FN_QTY_BARANG,FS_KD_SATUAN 
                FROM HOSPITAL.dbo.TB_TRS_DOBILL_UMUM a
                LEFT JOIN HOSPITAL.dbo.TB_TRS_DOBILL_UMUM2 b ON a.FS_KD_TRS=b.FS_KD_TRS
                WHERE a.FS_KD_REG = ? AND FD_TGL_VOID = '3000-01-01' AND FS_KD_TRS_GEN = ''";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function get_qty_barang($params) {
        $sql = "SELECT FN_QTY_BARANG,FS_KD_SATUAN
                FROM HOSPITAL.dbo.TB_TRS_DOBILL_UMUM a
                LEFT JOIN HOSPITAL.dbo.TB_TRS_DOBILL_UMUM2 b ON a.FS_KD_TRS=b.FS_KD_TRS
                WHERE a.FS_KD_REG = ? AND FS_KD_BARANG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
}
