<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_upload extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_last_inserted_id() {
        return $this->db->insert_id();
    }

    function insert($params) {
        $sql = "INSERT INTO TAC_RM_BERKAS(FS_KD_REG, FS_JENIS_BERKAS,att_name,att_size, mdb, mdd)
        VALUES(?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }
    function delete($params) {
        $sql = "DELETE FROM TAC_RM_BERKAS WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }
    function get_px_history($params) {
        $sql = "SELECT a.FS_KD_REG,b.FS_NM_PASIEN,a.FS_MR,a.FD_TGL_MASUK,c.FS_NM_PEG
        ,a.FS_KD_JENIS_REG,d.FS_NM_LAYANAN
        FROM HOSPITAL.dbo.TA_REGISTRASI a
        INNER JOIN HOSPITAL.dbo.TC_MR b ON a.FS_MR=b.FS_MR
        LEFT JOIN HOSPITAL.dbo.TD_PEG c ON a.FS_KD_MEDIS = c.FS_KD_PEG
        LEFT JOIN HOSPITAL.dbo.TA_LAYANAN d ON a.FS_KD_LAYANAN = d.FS_KD_LAYANAN
        
        WHERE a.FS_MR LIKE ? AND a.FD_TGL_VOID = '3000-01-01'
        ORDER BY a.FD_TGL_MASUK DESC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    function get_list_berkas_by_rg($params) {
        $sql = "SELECT *
        FROM TAC_RM_BERKAS
        WHERE FS_KD_REG = ?
        ORDER BY mdd DESC";
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
