<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_surat_sehat extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_last_inserted_id() {
        return $this->db->insert_id();
    }

    function insert($params) {
        $sql = "INSERT INTO HOSPITAL.dbo.TZ_TRS_SURAT(FS_KD_TRS, FD_TGL_TRS, FS_JAM_TRS, FN_JENIS_SURAT, FS_NO_SURAT, FS_KD_REG,
        FS_KD_PETUGAS, FS_KD_PEG)
        VALUES     (?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_igd($params) {
        $sql = "INSERT INTO HOSPITAL.dbo.TZ_TRS_SURAT(FS_KD_TRS, FD_TGL_TRS, FS_JAM_TRS, FN_JENIS_SURAT, FS_NO_SURAT, FS_KD_REG,
        FS_KD_MEDIS, FS_KETERANGAN1, FS_KETERANGAN2,FS_KETERANGAN3, FS_KD_PETUGAS, 
        FS_KD_PEG)
        VALUES     (?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_surat_rujukan_rs($params) {
        $sql = "INSERT INTO HOSPITAL.dbo.TZ_TRS_SURAT(FS_KD_TRS, FD_TGL_TRS, FS_JAM_TRS, FN_JENIS_SURAT, FS_NO_SURAT, FS_KD_REG,
        FS_KD_MEDIS, FS_KETERANGAN1, FS_KETERANGAN2,FS_KETERANGAN3, FS_KD_PETUGAS, 
        FS_KD_PEG)
        VALUES     (?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }
    
    function update($params) {
        $sql = "UPDATE HOSPITAL.dbo.TZ_TRS_SURAT SET  FS_KD_MEDIS=?,
        FD_TGL_KET1=?, FS_KETERANGAN1=?, FS_KETERANGAN2=? WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }

    function update_swab_rujukan($params) {
        $sql = "UPDATE HOSPITAL.dbo.TZ_TRS_SURAT SET
        FD_TGL_KET1=?, FS_KETERANGAN1=?, FS_KETERANGAN2=?,
        FS_KETERANGAN3=?,FS_KETERANGAN4=?,FS_KETERANGAN5=? WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }

    function update2($params) {
        $sql = "UPDATE HOSPITAL.dbo.TZ_TRS_SURAT SET FS_KD_REG=?, FN_JENIS_SURAT=? WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }

    function update3($params) {
        $sql = "UPDATE HOSPITAL.dbo.TZ_TRS_SURAT SET FD_TGL_KET1=?, FD_TGL_KET2=?,FS_KETERANGAN1=?,FS_KETERANGAN2=? WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }

    function update_surat_rujukan_rs($params) {
        $sql = "UPDATE HOSPITAL.dbo.TZ_TRS_SURAT SET FS_KD_MEDIS=?, FS_KETERANGAN1=?,FS_KETERANGAN2=?,FS_KETERANGAN3=? WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }
    
    function delete($params) {
        $sql = "DELETE FROM HOSPITAL.dbo.TZ_TRS_SURAT WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }
    
    function update_tz_parameter_no_surat($params) {
        $sql = "UPDATE HOSPITAL.dbo.TZ_PARAMETER_NO SET FN_VALUE=? WHERE FS_KD_PARAMETER= 'NOSURAT'";
        return $this->db->query($sql, $params);
    }

    function get_no_surat() {
        $sql = "SELECT RIGHT(FN_VALUE+100000000,8)'SURAT'  FROM   HOSPITAL.dbo.tz_parameter_no  WHERE  fs_kd_parameter= 'NOSURAT'";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_list_px($params) {
        $sql = "SELECT a.FS_KD_REG,b.FS_NM_PASIEN,a.FS_MR,b.FS_ALM_PASIEN,
        FS_TERAPI,a.FS_KD_LAYANAN,a.FS_KD_LAYANAN2,d.FN_JENIS_SURAT,d.FS_KD_TRS
        FROM HOSPITAL.dbo.TA_REGISTRASI a
        INNER JOIN HOSPITAL.dbo.TC_MR b ON a.FS_MR=b.FS_MR
        LEFT JOIN HOSPITAL.dbo.TA_TRS_ANTRIAN c ON a.FS_KD_REG = c.FS_KD_REG
        INNER JOIN HOSPITAL.dbo.TZ_TRS_SURAT d ON a.FS_KD_REG = d.FS_KD_REG
        WHERE d.FD_TGL_TRS = ? AND d.FN_JENIS_SURAT = ? AND a.FD_TGL_VOID = '3000-01-01' 
        ORDER BY d.FS_KD_TRS DESC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_cek_surat($params) {
        $sql = "SELECT *
        FROM HOSPITAL.dbo.TZ_TRS_SURAT 
        WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_surat_by_trs($params) {
        $sql = "SELECT a.*,b.FS_NM_PEG,d.FS_MR,d.FS_NM_PASIEN,d.FS_JNS_KELAMIN,
        d.FS_TEMP_LAHIR,d.FD_TGL_LAHIR,d.FS_ALM_PASIEN,b.FS_NO_IJIN_PRAKTEK,
        e.FS_NM_PEG 'FS_NM_PETUGAS',e.FS_KD_NIP,d.FS_JNS_KELAMIN,
        ISNULL(datediff(year,d.fd_tgl_lahir,GETDATE()),0) fn_umur,FS_NO_LAB,
        f.FS_KD_TRS 'FS_KD_TRS_TDK_UMUM',g.FS_HASIL,f.FS_JAM_TRS,h.FS_NM_PEG 'DOKTER',
        h.FS_KD_NIP 'NBM_DOKTER',f.FD_TGL_TRS 'tgl_valid'
        FROM HOSPITAL.dbo.TZ_TRS_SURAT a
        LEFT JOIN HOSPITAL.dbo.TD_PEG b ON a.FS_KD_MEDIS=b.FS_KD_PEG
        LEFT JOIN HOSPITAL.dbo.TA_REGISTRASI c ON a.FS_KD_REG=c.FS_KD_REG
        LEFT JOIN HOSPITAL.dbo.TC_MR d ON c.FS_MR=d.FS_MR
        LEFT JOIN HOSPITAL.dbo.TD_PEG e ON a.FS_KD_PETUGAS=e.FS_KD_PEG
        LEFT JOIN HOSPITAL.dbo.TA_TRS_TDK_UMUM f ON c.FS_KD_REG=f.FS_KD_REG
        LEFT JOIN HOSPITAL.dbo.TA_TRS_TDK_UMUM5 g ON f.FS_KD_TRS=g.FS_KD_TRS
        LEFT JOIN HOSPITAL.dbo.TD_PEG h ON c.FS_KD_MEDIS=h.FS_KD_PEG
        WHERE a.FS_KD_TRS = ? AND c.FD_TGL_VOID = '3000-01-01'";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_lab_by_trs($params) {
        $sql = "SELECT a.*,c.FD_TGL_TRS,d.FS_HASIL,c.fd_tgl_trs,f.fs_nm_jenis_pemeriksaan,f.fs_kd_jenis_pemeriksaan
        FROM HOSPITAL.dbo.TZ_TRS_SURAT a
        LEFT JOIN HOSPITAL.dbo.TA_REGISTRASI b ON a.FS_KD_REG=b.FS_KD_REG
        LEFT JOIN HOSPITAL.dbo.TA_TRS_TDK_UMUM c ON b.FS_KD_REG=c.FS_KD_REG
        LEFT JOIN HOSPITAL.dbo.TA_TRS_TDK_UMUM5 d ON c.FS_KD_TRS=d.FS_KD_TRS
        LEFT JOIN HOSPITAL.dbo.TA_TARIF e ON d.FS_KD_TARIF=e.FS_KD_TARIF
        left join  HOSPITAL.dbo.TA_JENIS_PEMERIKSAAN f on d.FS_KD_JENIS_PEMERIKSAAN = f.fs_kd_jenis_pemeriksaan
        WHERE a.FS_KD_TRS = ? AND (d.FS_KD_TARIF= '23000032' OR d.FS_KD_TARIF = '23000033') AND b.FD_TGL_VOID = '3000-01-01'
        AND c.FD_TGL_VOID = '3000-01-01'";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_surat_by_rg($params) {
        $sql = "SELECT *,b.FS_NM_PEG
        FROM HOSPITAL.dbo.TZ_TRS_SURAT a
        LEFT JOIN HOSPITAL.dbo.TD_PEG b ON a.FS_KD_MEDIS=b.FS_KD_PEG
        WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_pasien_perawatan($params) {
        $sql = "SELECT fs_kd_reg, fd_tgl_masuk, aa.fs_mr, LEFT(fs_nm_pasien,25) fs_nm_pasien,
        LEFT(cc.fs_nm_layanan,24) fs_nm_layanan  
        FROM HOSPITAL.dbo.ta_registrasi aa with (NOLOCK)  
        INNER JOIN HOSPITAL.dbo.tc_mr bb with (NOLOCK) ON aa.fs_mr=bb.fs_mr  
        INNER JOIN HOSPITAL.dbo.ta_layanan cc ON aa.fs_kd_layanan = cc.fs_kd_layanan  
        WHERE fd_tgl_void = '3000-01-01' AND aa.FS_KD_LAYANAN = 'P060'
        ORDER BY fs_nm_pasien ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_dokter($params) {
        $sql = "SELECT a.FS_KD_PEG,a.FS_NM_PEG FROM
        HOSPITAL.dbo.TD_PEG a
        WHERE a.FS_KD_PEG LIKE 'S%' AND a.FB_AKTIF_DINAS = '1'
        ORDER BY a.FS_NM_PEG ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_jenis_surat($params) {
        $sql = "SELECT * 
        FROM TAC_COM_JENIS_SURAT
        ORDER BY FS_KD_TRS ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_diagnosa_by_trs($params) {
        $sql = "SELECT FS_DIAGNOSA
        FROM HOSPITAL.dbo.TZ_TRS_SURAT a
        LEFT JOIN TAC_RJ_MEDIS b ON a.FS_KD_REG=b.FS_KD_REG
        WHERE a.FS_KD_TRS = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

function get_resep_by_trs($params) {
        $sql = "SELECT FS_KD_BARANG,FS_NM_BARANG,FN_QTY_BARANG,FS_KD_SATUAN,
                FN_ETIKET_QTY,FS_ETIKET_HARI,FS_ETIKET_CATATAN,FS_UDD_WAKTU,FN_ETIKET_HARI
                FROM HOSPITAL.dbo.TZ_TRS_SURAT a
                LEFT JOIN HOSPITAL.dbo.TA_TRS_KARTU_PERIKSA b ON a.FS_KD_REG=b.FS_KD_REG
                LEFT JOIN HOSPITAL.dbo.TA_TRS_KARTU_PERIKSA3 c ON b.FS_KD_TRS=c.FS_KD_TRS
                WHERE a.FS_KD_TRS = ? AND b.FD_TGL_VOID = '3000-01-01'";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    function get_pasien_by_rg($params) {
        $sql = " SELECT hh.FD_TGL_LAHIR,hh.FS_ALM_PASIEN,     aa.fs_kd_reg,aa.fd_tgl_masuk, aa.fs_jam_masuk,  
        aa.fs_mr, aa.fs_kd_layanan, aa.fs_kd_kelas,aa.fs_kd_medis,fs_kd_layanan3,fs_kd_layanan_akhir, 
        aa.fs_kd_medis2, aa.fs_kd_medis3, fs_kd_bed_awal, fs_kd_trs_bed_awal, fs_kd_jenis_reg, fs_no_sjp, fs_kd_trs_sjp, xx.fs_nm_layanan 'layanan_akhir',
        ISNULL(datediff(year,hh.fd_tgl_lahir,aa.fd_tgl_masuk),0) fn_umur, 
        ISNULL(bb.fs_nm_user,' ') fs_nm_petugas, 
        ISNULL(hh.fs_nm_pasien,' ') fs_nm_pasien, 
        ISNULL(ii.fs_nm_layanan,' ') fs_nm_layanan, 
        ISNULL(jj.fs_nm_kelas,' ') fs_nm_kelas, 
        ISNULL(mm.fs_nm_jenis_inap,' ') fs_nm_jenis_inap, 
        ISNULL(nn.fs_nm_peg,' ') fs_nm_medis, 
        ISNULL(nn2.fs_nm_peg,' ') fs_nm_medis2, 
        ISNULL(nn3.fs_nm_peg,' ') fs_nm_medis3, 
        ISNULL(oo.fs_nm_tipe_jaminan,' ') fs_nm_tipe_jaminan, 
        ISNULL(tt.fs_nm_medis_luar, '')fs_nm_medis_luar, 
        nn.fs_nm_peg,hh.FS_HIGH_RISK,hh.FS_ALERGI,hh.FS_REAK_ALERGI,
        FS_NM_PEKERJAAN_DK,FS_NM_PENDIDIKAN_DK,(substring(HOSPITAL.dbo.if_get_umur_by_reg(aa.fs_kd_reg),1,3)+' Thn '+substring(HOSPITAL.dbo.if_get_umur_by_reg(aa.fs_kd_reg),5,2)+' bln ' 
        +right(HOSPITAL.dbo.if_get_umur_by_reg(aa.fs_kd_reg),2)+' hr')as fs_umur 
        FROM       HOSPITAL.dbo.ta_registrasi aa 
        INNER JOIN HOSPITAL.dbo.tz_user bb          ON aa.fs_kd_petugas = bb.fs_kd_user  
        LEFT JOIN  HOSPITAL.dbo.tz_user cc          ON aa.fs_kd_petugas_void = cc.fs_kd_user  
        LEFT JOIN  HOSPITAL.dbo.tz_user dd          ON aa.fs_kd_petugas_keluar = dd.fs_kd_user  
        LEFT JOIN  HOSPITAL.dbo.tz_user ee          ON aa.fs_kd_petugas_cancel_out = ee.fs_kd_user  
        LEFT JOIN  HOSPITAL.dbo.tz_user ff          ON aa.fs_kd_petugas_kasir_masuk = ff.fs_kd_user  
        LEFT JOIN  HOSPITAL.dbo.tz_user gg          ON aa.fs_kd_petugas_kasir_keluar = gg.fs_kd_user  
        LEFT JOIN  HOSPITAL.dbo.tc_mr hh            ON aa.fs_mr = hh.fs_mr 
        LEFT JOIN  HOSPITAL.dbo.ta_layanan ii       ON aa.fs_kd_layanan = ii.fs_kd_layanan  
        LEFT JOIN  HOSPITAL.dbo.ta_layanan xx       ON aa.fs_kd_layanan_akhir = xx.fs_kd_layanan  
        LEFT JOIN  HOSPITAL.dbo.ta_kelas jj         ON aa.fs_kd_kelas = jj.fs_kd_kelas 
        LEFT JOIN  HOSPITAL.dbo.ta_cara_masuk_dk kk ON aa.fs_kd_cara_masuk_dk = kk.fs_kd_cara_masuk_dk 
        LEFT JOIN  HOSPITAL.dbo.ta_smf ll           ON aa.fs_kd_smf = ll.fs_kd_smf 
        LEFT JOIN  HOSPITAL.dbo.ta_jenis_inap mm    ON aa.fs_kd_jenis_inap = mm.fs_kd_jenis_inap
        LEFT JOIN tab_px_pulang_resume xx1 ON aa.fs_kd_reg=xx1.fs_kd_reg
        LEFT JOIN  HOSPITAL.dbo.td_peg nn           ON xx1.fs_verif_dokter= nn.fs_kd_peg 
        LEFT JOIN  HOSPITAL.dbo.td_peg nn2          ON aa.fs_kd_medis= nn2.fs_kd_peg 
        LEFT JOIN  HOSPITAL.dbo.td_peg nn3          ON aa.fs_kd_medis3= nn3.fs_kd_peg 
        LEFT JOIN  HOSPITAL.dbo.ta_tipe_jaminan oo  ON aa.fs_kd_tipe_jaminan = oo.fs_kd_tipe_Jaminan 
        LEFT JOIN  HOSPITAL.dbo.ta_rujukan pp       ON aa.fs_kd_rujukan = pp.fs_kd_rujukan 
        LEFT JOIN  HOSPITAL.dbo.ta_sesion_poli qq   ON aa.fs_kd_sesion_poli = qq.fs_kd_sesion_poli 
        LEFT JOIN  HOSPITAL.dbo.ta_reg_jaminan rr   ON aa.fs_kd_reg = rr.fs_kd_reg 
        LEFT JOIN  HOSPITAL.dbo.ta_polis ss         ON rr.fs_kd_polis = ss.fs_kd_polis 
        LEFT JOIN  HOSPITAL.dbo.ta_reg_rujukan tt   ON aa.fs_kd_reg = tt.fs_kd_reg 
        LEFT JOIN  HOSPITAL.dbo.ta_reg_inap uu      ON aa.fs_kd_reg = uu.fs_kd_reg 
        LEFT JOIN  HOSPITAL.dbo.ta_caramasuk_inap vv ON uu.fs_kd_caramasuk_inap = vv.fs_kd_caramasuk_inap 
        LEFT JOIN  HOSPITAL.dbo.ta_reg_jalan ww     ON aa.fs_kd_reg = ww.fs_kd_reg
        LEFT JOIN HOSPITAL.dbo.TA_PEKERJAAN_DK m ON hh.FS_KD_PEKERJAAN_DK=m.FS_KD_PEKERJAAN_DK
        LEFT JOIN HOSPITAL.dbo.TA_PENDIDIKAN_DK n ON hh.FS_KD_PENDIDIKAN_DK=n.FS_KD_PENDIDIKAN_DK
        WHERE      aa.fs_kd_reg = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    
}
