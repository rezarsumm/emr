<?php

class m_farmasi_inap extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        // load encrypt
        $this->load->library('encrypt');
        $this->db = $this->load->database('emr', TRUE);
    }

    function get_pasien_by_trs($params) {
        $sql = "SELECT RIGHT(c.FS_MR,8) 'MR',a.FS_KD_REG,c.FD_TGL_LAHIR,FS_NM_PASIEN,
        FS_ALM_PASIEN,FS_NM_JAMINAN,FS_JNS_KELAMIN,FS_TB,FS_BB,g.FS_DIAGNOSA,c.FS_ALERGI,
        FS_NO_SJP,FS_NO_PESERTA,FS_NM_PEG,FS_NO_IJIN_PRAKTEK,a.FS_KD_TRS,FS_NM_LAYANAN,a.FD_TGL_TRS
        FROM TA_TRS_KARTU_PERIKSA a
        LEFT JOIN TA_REGISTRASI b ON a.FS_KD_REG=b.FS_KD_REG
        LEFT JOIN TC_MR c ON b.FS_MR=c.FS_MR
        LEFT JOIN TA_TIPE_JAMINAN d ON b.FS_KD_TIPE_JAMINAN=d.FS_KD_TIPE_JAMINAN
        LEFT JOIN TA_JAMINAN e ON e.FS_KD_JAMINAN=d.FS_KD_JAMINAN
        LEFT JOIN TAC_RJ_VITAL_SIGN f ON b.FS_KD_REG=f.FS_KD_REG
        LEFT JOIN TAC_RJ_MEDIS g ON b.FS_KD_REG=g.FS_KD_REG
        INNER JOIN TD_PEG h on a.FS_KD_MEDIS_RESEP = h.FS_KD_PEG 
        INNER JOIN ta_layanan i on a.fs_kd_layanan = i.fs_kd_layanan 
        WHERE a.FS_KD_TRS = ? AND a.FD_TGL_VOID = '3000-01-01'";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_resep_by_rg($params) {
        $sql = "SELECT FS_KD_BARANG,FS_NM_BARANG,FN_QTY_BARANG,FS_KD_SATUAN 
        FROM TB_TRS_DOBILL_UMUM a
        LEFT JOIN TB_TRS_DOBILL_UMUM2 b ON a.FS_KD_TRS=b.FS_KD_TRS
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

    function get_resep_by_trs($params) {
        $sql = "SELECT FS_KD_BARANG,FS_NM_BARANG,FN_QTY_BARANG,FS_KD_SATUAN,
        FN_ETIKET_QTY,FS_ETIKET_HARI,FS_ETIKET_CATATAN,FS_UDD_WAKTU,FN_ETIKET_HARI
        FROM TA_TRS_KARTU_PERIKSA a
        LEFT JOIN TA_TRS_KARTU_PERIKSA3 b ON a.FS_KD_TRS=b.FS_KD_TRS
        WHERE a.FS_KD_TRS = ? AND a.FD_TGL_VOID = '3000-01-01'";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    

    function get_px_by_farmasi($params) {
        $sql = "SELECT bb.fs_jam_trs, fs_nm_layanan, dd.fs_nm_peg, oo.fs_nm_tipe_jaminan, 
        CASE 
        WHEN nn.fd_tgl_void <> '3000-01-01' then ' ' 
        ELSE ISNULL(nn.fs_kd_trs, ' ')
        end As fs_kd_du,bb.fs_kd_trs, mm.fs_nm_pasien,RIGHT(rr.fs_mr,8) AS 'FS_MR', rr.FD_TGL_KELUAR 
        FROM        ta_trs_kartu_periksa bb 
        INNER JOIN td_peg dd on bb.fs_kd_medis_resep = dd.fs_kd_peg 
        INNER JOIN ta_layanan ll on bb.fs_kd_layanan = ll.fs_kd_layanan 
        INNER JOIN ta_registrasi rr on bb.fs_kd_reg  = rr.fs_kd_reg 
        INNER JOIN tc_mr mm on rr.fs_mr = mm.fs_mr 
        LEFT JOIN  tb_trs_dobill_umum nn on bb.fs_kd_trs = nn.fs_kd_resep and nn.fd_tgl_void = '3000-01-01' 
        LEFT JOIN  ta_tipe_jaminan oo on rr.fs_kd_tipe_jaminan = oo.fs_kd_tipe_jaminan 
        WHERE rr.fs_kd_jenis_reg = '1' AND fb_close_resep = 0 AND bb.fd_tgl_trs = ?  AND bb.fd_tgl_void = '3000-01-01' 
        AND bb.fs_kd_trs IN (SELECT fs_kd_trs FROM ta_trs_kartu_periksa3) 
        ORDER BY       bb.fs_jam_trs DESC, fs_nm_layanan, dd.fs_nm_peg, ISNULL(oo.fs_nm_tipe_jaminan,''), bb.fs_kd_trs, mm.fs_nm_pasien, RIGHT(rr.fs_mr,8)";
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
