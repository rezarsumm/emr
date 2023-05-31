<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_rm extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->db = $this->load->database('emr', TRUE);
    }

    function get_last_inserted_id() {
        return $this->db->insert_id();
    }
    
    function insert_pinjam($params) {
        $sql = "INSERT INTO TAC_RM_PINJAM(FS_KD_REG, FD_TGL_PINJAM,FS_PETUGAS_KIRIM,FD_TGL_EXPIRED)
        VALUES(?,?,?,?)";
        return $this->db->query($sql, $params);
    }
    function insert_tujuan_pinjam($params) {
        $sql = "INSERT INTO TAC_RM_PINJAM2(FS_KD_PINJAM, FS_KD_PEG)
        VALUES(?,?)";
        return $this->db->query($sql, $params);
    }

    function get_px_history($params) {
        $sql = "SELECT a.FS_KD_REG,b.FS_NM_PASIEN,a.FS_MR,a.FD_TGL_MASUK,c.FS_NM_PEG
        ,a.FS_KD_JENIS_REG,d.FS_NM_LAYANAN,f.FS_STATUS,g.FS_KD_TRS,f.FS_FORM,a.FD_TGL_KELUAR
        FROM TA_REGISTRASI a
        INNER JOIN TC_MR b ON a.FS_MR=b.FS_MR
        LEFT JOIN TD_PEG c ON a.FS_KD_MEDIS = c.FS_KD_PEG
        LEFT JOIN TA_LAYANAN d ON a.FS_KD_LAYANAN = d.FS_KD_LAYANAN
        LEFT JOIN TAC_RJ_STATUS f ON a.FS_KD_REG=f.FS_KD_REG
        LEFT JOIN TAC_RJ_MEDIS g ON a.FS_KD_REG=g.FS_KD_REG
        WHERE a.FS_MR = ? AND a.FD_TGL_VOID = '3000-01-01'
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
    function get_px_history2($params) {
        $sql = "SELECT a.FS_KD_REG,b.FS_NM_PASIEN,a.FS_MR,a.FD_TGL_MASUK,c.FS_NM_PEG
        ,a.FS_KD_JENIS_REG,d.FS_NM_LAYANAN,g.FS_KD_TRS,a.FD_TGL_KELUAR,g.FS_CARA_PULANG,g.FS_TERAPI
        ,i.FS_FORM
        FROM TA_REGISTRASI a
        INNER JOIN TC_MR b ON a.FS_MR=b.FS_MR
        LEFT JOIN TD_PEG c ON a.FS_KD_MEDIS = c.FS_KD_PEG
        LEFT JOIN TA_LAYANAN d ON a.FS_KD_LAYANAN = d.FS_KD_LAYANAN
        LEFT JOIN TAC_RJ_MEDIS g ON a.FS_KD_REG=g.FS_KD_REG
        LEFT JOIN TAC_RM_PINJAM h ON a.FS_KD_REG=h.FS_KD_REG
        LEFT JOIN TAC_RJ_STATUS i ON a.FS_KD_REG=i.FS_KD_REG
        WHERE a.FS_MR = ? AND a.FS_KD_JENIS_REG LIKE ? AND a.FD_TGL_VOID = '3000-01-01'
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
    function get_px_history_ri($params) {
        $sql = "SELECT a.FS_KD_REG,b.FS_NM_PASIEN,a.FS_MR,a.FD_TGL_MASUK,c.FS_NM_PEG
        ,a.FS_KD_JENIS_REG,d.FS_NM_LAYANAN,a.FD_TGL_KELUAR
        FROM TA_REGISTRASI a
        INNER JOIN TC_MR b ON a.FS_MR=b.FS_MR
        LEFT JOIN TD_PEG c ON a.FS_KD_MEDIS = c.FS_KD_PEG
        LEFT JOIN TA_LAYANAN d ON a.FS_KD_LAYANAN = d.FS_KD_LAYANAN
        LEFT JOIN TAC_RM_PINJAM h ON a.FS_KD_REG=h.FS_KD_REG
        WHERE a.FS_MR = ? AND a.FS_KD_JENIS_REG = '1' AND a.FD_TGL_VOID = '3000-01-01'
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
    function get_px_history2_pinjam($params) {
        $sql = "SELECT a.FS_KD_REG,b.FS_NM_PASIEN,a.FS_MR,a.FD_TGL_MASUK,c.FS_NM_PEG
        ,a.FS_KD_JENIS_REG,d.FS_NM_LAYANAN,g.FS_KD_TRS,a.FD_TGL_KELUAR,g.FS_CARA_PULANG,g.FS_TERAPI
        ,h.FD_TGL_EXPIRED
        FROM TA_REGISTRASI a
        INNER JOIN TC_MR b ON a.FS_MR=b.FS_MR
        LEFT JOIN TD_PEG c ON a.FS_KD_MEDIS = c.FS_KD_PEG
        LEFT JOIN TA_LAYANAN d ON a.FS_KD_LAYANAN = d.FS_KD_LAYANAN
        LEFT JOIN TAC_RJ_MEDIS g ON a.FS_KD_REG=g.FS_KD_REG
        INNER JOIN TAC_RM_PINJAM h ON a.FS_KD_REG=h.FS_KD_REG
        INNER JOIN TAC_RM_PINJAM2 j ON h.FS_KD_TRS=j.FS_KD_PINJAM
        WHERE j.FS_KD_PEG = ? AND FD_TGL_EXPIRED > ?
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
    function get_data_px_by_rm($params) {
        $sql = "SELECT *
        FROM  TC_MR
        WHERE FS_MR = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    function get_data_px_by_rg($params) {
        $sql = "SELECT *
        FROM  TC_MR a
        LEFT JOIN TA_REGISTRASI b ON a.FS_MR=b.FS_MR 
        WHERE b.FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    
    function get_px_by_dokter_pulang($params) {
        $sql = "SELECT a.FS_KD_REG,b.FS_NM_PASIEN,FN_NO_URUT,a.FS_MR,b.FS_ALM_PASIEN,
        FS_STATUS,FS_TERAPI,e.FS_KD_TRS,e.FS_DIAGNOSA,e.FS_TINDAKAN,e.FS_CARA_PULANG,
        a.FS_KD_LAYANAN,a.FS_KD_LAYANAN2,a.FS_KD_LAYANAN3,d.FS_FORM,e.FS_KD_KP,
        ISNULL(datediff(b.fd_tgl_lahir,NOW())) fn_umur
        FROM TA_REGISTRASI a
        INNER JOIN TC_MR b ON a.FS_MR=b.FS_MR
        LEFT JOIN TA_TRS_ANTRIAN c ON a.FS_KD_REG = c.FS_KD_REG
        LEFT JOIN TAC_RJ_STATUS d ON a.FS_KD_REG = d.FS_KD_REG
        LEFT JOIN TAC_RJ_MEDIS e ON a.FS_KD_REG=e.FS_KD_REG
        WHERE a.FD_TGL_MASUK = ? AND a.FD_TGL_VOID = '3000-01-01'
        AND a.FS_KD_JENIS_REG <> '1' AND (a.FS_KD_MEDIS = ? OR FS_KD_MEDIS2 = ? OR FS_KD_MEDIS3=?)
        AND a.FS_KD_LAYANAN <> 'P023'
        ORDER BY c.FN_NO_URUT";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    function get_px_by_dokter_pulang_igd($params) {
        $sql = "SELECT a.FS_KD_REG,b.FS_NM_PASIEN,FN_NO_URUT,a.FS_MR,b.FS_ALM_PASIEN,
        FS_STATUS,FS_TERAPI,e.FS_KD_TRS,e.FS_DIAGNOSA,e.FS_TINDAKAN,e.FS_CARA_PULANG,
        a.FS_KD_LAYANAN,a.FS_KD_LAYANAN2,a.FS_KD_LAYANAN3,d.FS_FORM
        FROM TA_REGISTRASI a
        INNER JOIN TC_MR b ON a.FS_MR=b.FS_MR
        LEFT JOIN TA_TRS_ANTRIAN c ON a.FS_KD_REG = c.FS_KD_REG
        LEFT JOIN TAC_RJ_STATUS d ON a.FS_KD_REG = d.FS_KD_REG
        LEFT JOIN TAC_RJ_MEDIS e ON a.FS_KD_REG=e.FS_KD_REG
        WHERE a.FD_TGL_MASUK = ? AND a.FD_TGL_VOID = '3000-01-01'
        AND a.FS_KD_JENIS_REG <> '1' AND (a.FS_KD_LAYANAN = 'P012')
        AND a.FS_KD_LAYANAN <> 'P023'
        ORDER BY c.FN_NO_URUT";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    function get_all_user($params) {
        $sql = "SELECT FS_KD_PEG,FS_NM_PEG
        FROM TD_PEG
        WHERE FB_AKTIF_DINAS = 1
        ORDER BY FS_NM_PEG ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function get_berkas_by_rg($params) {
        $sql = "SELECT * FROM TAC_RM_BERKAS WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    function get_pinjam_berkas_by_rg($params) {
        $sql = "SELECT * FROM TAC_RM_PINJAM
        WHERE FS_KD_REG = ? AND FD_TGL_EXPIRED > ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
}
