<?php

class m_poli extends CI_Model {

    function __construct() {
        //Call the Model constructor
        parent::__construct();
    }

    // detail surat masuk
    function get_time_lap($params) {
        $sql = "select SUM(DATEDIFF(minute,a.FS_JAM_TRS,b.FS_JAM_TRS)) 'WAKTU' from TAC_RJ_VITAL_SIGN a 
                LEFT JOIN TAC_RJ_MEDIS b ON a.FS_KD_REG=b.FS_KD_REG
                WHERE a.mdd = ?";
        $query = $this->db->query($sql,$params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_pasien_lap($params) {
        $sql = "SELECT COUNT(*) TOTAL_DAFTAR_RJ FROM HOSPITAL.dbo.TA_REGISTRASI a
                        INNER JOIN HOSPITAL.dbo.TA_LAYANAN b ON a.FS_KD_LAYANAN=b.FS_KD_LAYANAN
                        INNER JOIN HOSPITAL.dbo.TA_INSTALASI c ON c.FS_KD_INSTALASI=b.FS_KD_INSTALASI
                        INNER JOIN HOSPITAL.dbo.TA_INSTALASI_DK d ON d.FS_KD_INSTALASI_DK=c.FS_KD_INSTALASI_DK
                        WHERE (d.FS_KD_INSTALASI_DK='2') AND (a.FD_TGL_VOID = '3000-01-01') AND (a.FD_TGL_MASUK = ?)";
        $query = $this->db->query($sql,$params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    function get_time_lap_saraf($params) {
        $sql = "select SUM(DATEDIFF(minute,a.FS_JAM_TRS,b.FS_JAM_TRS)) 'WAKTU' from TAC_RJ_VITAL_SIGN a 
                LEFT JOIN TAC_RJ_MEDIS b ON a.FS_KD_REG=b.FS_KD_REG
                LEFT JOIN HOSPITAL.dbo.TA_REGISTRASI c ON a.FS_KD_REG = c.FS_KD_REG
                WHERE (a.mdd = ?) AND (c.FS_KD_LAYANAN = 'P006')";
        $query = $this->db->query($sql,$params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_pasien_lap_saraf($params) {
        $sql = "SELECT COUNT(*) TOTAL_DAFTAR_RJ FROM HOSPITAL.dbo.TA_REGISTRASI a
                        INNER JOIN HOSPITAL.dbo.TA_LAYANAN b ON a.FS_KD_LAYANAN=b.FS_KD_LAYANAN
                        INNER JOIN HOSPITAL.dbo.TA_INSTALASI c ON c.FS_KD_INSTALASI=b.FS_KD_INSTALASI
                        INNER JOIN HOSPITAL.dbo.TA_INSTALASI_DK d ON d.FS_KD_INSTALASI_DK=c.FS_KD_INSTALASI_DK
                        WHERE (d.FS_KD_INSTALASI_DK='2') AND (a.FS_KD_LAYANAN = 'P006') AND (a.FD_TGL_VOID = '3000-01-01') AND (a.FD_TGL_MASUK = ?)";
        $query = $this->db->query($sql,$params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
  
}
