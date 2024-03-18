<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_rawat_jalan_nurse extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_last_inserted_id() {
        return $this->db->insert_id();
    }
    
    function insert_alergi($params) {
        $sql = "UPDATE DB_RSMM.dbo.REGISTER_PASIEN SET FS_ALERGI = ?, FS_REAK_ALERGI = ?, FS_RIW_PENYAKIT_DAHULU=?, FS_RIW_PENYAKIT_DAHULU2=?
                WHERE NO_MR = ?";
        return $this->db->query($sql, $params);
    }
    
   function get_px_by_dokter_by_rg2($params) { 
        $sql = "SELECT b.NO_REG,a.NAMA_PASIEN,a.NO_MR,a.ALAMAT, a.JENIS_KELAMIN, c.NAMA_DOKTER, E.NAMAREKANAN,
        a.TGL_LAHIR,a.FS_REAK_ALERGI,a.FS_RIW_PENYAKIT_DAHULU,f.FS_ALERGI,a.FS_RIW_PENYAKIT_DAHULU2
        FROM DB_RSMM.dbo.REGISTER_PASIEN a
        LEFT JOIN DB_RSMM.dbo.PENDAFTARAN b ON a.NO_MR=b.NO_MR
        LEFT JOIN PKU.dbo.TAC_RJ_ALERGI f ON b.NO_REG=f.FS_KD_REG
        LEFT JOIN DB_RSMM.dbo.DOKTER c ON b.KODE_DOKTER=c.KODE_DOKTER
        LEFT JOIN DB_RSMM.dbo.REKANAN E ON b.KODEREKANAN=E.KODEREKANAN
        WHERE b.NO_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
     }
        
        function list_masalah_kep_by_rg($params) {
        $sql = "SELECT *
                FROM PKU.dbo.TAC_RJ_MASALAH_KEP a
                LEFT JOIN PKU.dbo.TAC_COM_DAFTAR_DIAG b ON a.FS_KD_MASALAH_KEP=b.FS_KD_DAFTAR_DIAGNOSA
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
    
    function list_rencana_kep_by_rg($params) {
        $sql = "SELECT * FROM
                PKU.dbo.TAC_RJ_REN_KEP a
                LEFT JOIN PKU.dbo.TAC_COM_PARAM_REN_KEP b ON a.FS_KD_REN_KEP=b.FS_KD_TRS
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
    
}