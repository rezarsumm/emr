<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_rawat_inap extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->db = $this->load->database('emr', TRUE);
    }

    function get_last_inserted_id() {
        return $this->db->insert_id();
    }

    function insert($params) {
        $sql = "INSERT
        INTO TAC_RI_MEDIS(FS_KD_KP, FS_KD_REG, FS_DIAGNOSA, FS_ANAMNESA, FS_TINDAKAN, FS_TERAPI, FS_CATATAN_FISIK, FS_KD_MEDIS, 
        FS_CARA_PULANG, FS_DAFTAR_MASALAH, FS_PLANNING_LAB, FS_PLANNING_RAD, FS_HASIL_PEMERIKSAAN_PENUNJANG,FS_STATUS,FS_MR, mdb, mdd, FS_JAM_TRS)
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }
    function update($params) {
        $sql = "UPDATE TAC_RI_MEDIS SET FS_DIAGNOSA=?, FS_ANAMNESA=?, FS_TINDAKAN=?, FS_TERAPI=?, FS_CATATAN_FISIK=?, FS_KD_MEDIS=?, 
        FS_CARA_PULANG=?, FS_DAFTAR_MASALAH=?, FS_PLANNING_LAB=?,FS_PLANNING_RAD=?, FS_HASIL_PEMERIKSAAN_PENUNJANG=? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }
    
    function get_resume_by_rg($params) {
        $sql = "SELECT a.*,b.FS_NM_LAYANAN,c.FS_NM_LAYANAN AS 'FS_NM_LAYANAN2' ,d.FS_NM_PEG
        FROM TAB_PX_PULANG_RESUME a
        LEFT JOIN TA_LAYANAN b ON a.FS_KD_LAYANAN=b.FS_KD_LAYANAN
        LEFT JOIN TA_LAYANAN c ON a.FS_KD_LAYANAN2=c.FS_KD_LAYANAN
        LEFT JOIN TD_PEG d ON a.FS_VERIF_DOKTER=d.FS_KD_PEG
        WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            return $result;
        } else {
            return 0;
        }
    }
    
    function cek_rawat_inap($params) {
        $sql = "SELECT FS_KD_REG FROM TAC_RI_MEDIS WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            return $result;
        } else {
            return 0;
        }
    }
    
    function get_data_ases2_by_rg($params) {
        $sql = "SELECT *
        FROM TAC_RI_ASES_PER2
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
    
    function get_data_medis_by_rg2($params) {
        $sql = "SELECT a.*,c.FS_NM_PEG,b.user_name,c.FS_NO_IJIN_PRAKTEK,d.FD_TGL_RUJUKAN
        FROM TAC_RJ_MEDIS a
        LEFT JOIN TAC_COM_USER b ON a.mdb=b.user_id
        LEFT JOIN TD_PEG c ON b.user_name=c.FS_KD_PEG
        LEFT JOIN TA_TRS_SEP d ON a.FS_KD_REG = d.FS_KD_REG
        WHERE a.FS_KD_REG = ?";
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
        $sql = "SELECT FS_NM_MASALAH_KEP
        FROM TAC_RI_MASALAH_KEP a
        LEFT JOIN TAC_COM_PARAM_MASALAH_KEP b ON a.FS_KD_MASALAH_KEP=b.FS_KD_TRS
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
    
    function get_layanan($params) {
        $sql = "SELECT a.FS_KD_LAYANAN,a.FS_NM_LAYANAN FROM
        TA_LAYANAN a
        WHERE a.FS_KD_INSTALASI = 'RJ' AND a.FB_AKTIF = '1'
        ORDER BY a.FS_NM_LAYANAN ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function get_diet_by_rg($params) {
        $sql = "SELECT a.FS_KD_PX_PULANG_DIET,FS_NM_DIET,a.FS_KD_DIET FROM TAB_PX_PULANG_RESUME_DIET a LEFT JOIN TAB_PX_PULANG_DIET b ON a.FS_KD_DIET=b.FS_KD_DIET WHERE a.FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }
    
    function get_indikasi_dirawat_by_rg($params) {
        $sql = "SELECT a.*,b.* FROM TAB_PX_PULANG_RESUME_INDIKASI_RAWAT a LEFT JOIN COM_PARAM_RM_40_INDIKASI_DIRAWAT b ON a.FS_KD_PARAM_INDIKASI_DIRAWAT=b.FS_KD_PARAM_INDIKASI_DIRAWAT WHERE a.FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }
    
    function get_diag_by_rg($params) {
        $sql = "SELECT * FROM TAB_PX_PULANG_RESUME_DIAG_SEK WHERE FS_KD_REG = ? ORDER BY FS_KD_DIAG_SEK ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function get_tind_by_rg($params) {
        $sql = "SELECT * FROM TAB_PX_PULANG_RESUME_TIND WHERE FS_KD_REG = ? ORDER BY FS_KD_TIND ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function get_terapi_by_rg($params) {
        $sql = "SELECT * FROM TAB_PX_PULANG_TERAPI WHERE FS_KD_REG = ? ORDER BY FS_KD_TERAPI ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function get_px_by_dokter_by_rg2($params) {
        $sql = "SELECT a.FS_NM_PASIEN,a.FS_MR,a.FS_ALM_PASIEN,a.FS_JNS_KELAMIN,
        ISNULL(datediff(year,a.fd_tgl_lahir,?),0) fn_umur,b.FS_KD_REG,
        d.FS_NM_JAMINAN,e.FS_NM_PEG,a.FD_TGL_LAHIR,b.FD_TGL_MASUK,f.FS_NM_LAYANAN,b.FS_KD_LAYANAN,
        b.FS_KD_LAYANAN2,b.FS_KD_LAYANAN3,b.FS_KD_MEDIS,e.FS_NO_IJIN_PRAKTEK,RIGHT(a.FS_MR,8) 'MR',g.FS_TB,g.FS_BB,h.FS_NM_PEG 'DOK2',
        i.FS_KD_TRS,a.FS_TEMP_LAHIR,b.FS_NO_SJP,j.FS_NM_LAYANAN 'LAYANAN_AKHIR',k.*,FS_HIGH_RISK,FS_ALERGI,
        FS_RIW_PENYAKIT_DAHULU,FS_RIW_PENYAKIT_DAHULU2,b.FS_JAM_MASUK,a.FS_KD_IDENTITAS,FS_TLP_PASIEN
        FROM TC_MR a
        LEFT JOIN TA_REGISTRASI b ON a.FS_MR=b.FS_MR
        LEFT JOIN TA_TIPE_JAMINAN c ON b.FS_KD_TIPE_JAMINAN=c.FS_KD_TIPE_JAMINAN
        LEFT JOIN TA_JAMINAN d ON c.FS_KD_JAMINAN=d.FS_KD_JAMINAN
        LEFT JOIN TD_PEG e ON b.FS_KD_MEDIS=e.FS_KD_PEG
        LEFT JOIN TD_PEG h ON b.FS_KD_MEDIS2=h.FS_KD_PEG
        LEFT JOIN TA_LAYANAN f ON b.FS_KD_LAYANAN=f.FS_KD_LAYANAN
        LEFT JOIN TAC_RJ_VITAL_SIGN g ON b.FS_KD_REG=g.FS_KD_REG
        LEFT JOIN TAC_RJ_MEDIS i ON b.FS_KD_REG=i.FS_KD_REG
        LEFT JOIN TA_LAYANAN j ON b.FS_KD_LAYANAN_AKHIR=j.FS_KD_LAYANAN
        LEFT JOIN TA_TRS_SEP k ON b.FS_KD_REG=k.FS_KD_REG
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
    function get_data_medis_by_rg($params) {
        $sql = "SELECT *
        FROM TAC_RI_MEDIS
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
    
    function get_pasien_bangsal($params) {
        $sql = " SELECT     aa.fs_kd_reg, bb.fs_mr, 
        ee.fs_nm_bed,
        cc.fs_nm_pasien,cc.fd_tgl_lahir
        FROM       ( 
        SELECT      fs_kd_trs 
        FROM        TA_TRS_BED 
        WHERE       fd_tgl_in <= ? 
        AND fd_tgl_out + fs_jam_out >= ? 
        AND fd_tgl_void = '3000-01-01' 
        ) aa1 
        LEFT JOIN  ta_trs_bed aa ON aa1.fs_kd_trs = aa.fs_kd_trs 
        LEFT JOIN  ta_registrasi bb ON aa.fs_kd_reg = bb.fs_kd_reg 
        LEFT JOIN  tc_mr cc ON bb.fs_mr = cc.fs_mr 
        LEFT JOIN  ta_layanan dd ON aa.fs_kd_layanan = dd.fs_kd_layanan 
        LEFT JOIN  ta_bed ee ON aa.fs_kd_bed = ee.fs_kd_bed 
        LEFT JOIN  ta_kamar ff ON ee.fs_kd_kamar = ff.fs_kd_kamar 
        LEFT JOIN  ta_bangsal gg ON ff.fs_kd_bangsal = gg.fs_kd_bangsal
        WHERE bb.FS_KD_MEDIS = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    function get_pasien_bangsal_admin($params) {
        $sql = " SELECT     aa.fs_kd_reg, bb.fs_mr, 
        ee.fs_nm_bed, 
        cc.fs_nm_pasien,cc.fd_tgl_lahir
        FROM       ( 
        SELECT      fs_kd_trs 
        FROM        TA_TRS_BED 
        WHERE       fd_tgl_in <= ? 
        AND fd_tgl_out + fs_jam_out >= ? 
        AND fd_tgl_void = '3000-01-01' 
        ) aa1 
        LEFT JOIN  ta_trs_bed aa ON aa1.fs_kd_trs = aa.fs_kd_trs 
        LEFT JOIN  ta_registrasi bb ON aa.fs_kd_reg = bb.fs_kd_reg 
        LEFT JOIN  tc_mr cc ON bb.fs_mr = cc.fs_mr 
        LEFT JOIN  ta_layanan dd ON aa.fs_kd_layanan = dd.fs_kd_layanan 
        LEFT JOIN  ta_bed ee ON aa.fs_kd_bed = ee.fs_kd_bed 
        LEFT JOIN  ta_kamar ff ON ee.fs_kd_kamar = ff.fs_kd_kamar 
        LEFT JOIN  ta_bangsal gg ON ff.fs_kd_bangsal = gg.fs_kd_bangsal";
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
        $sql = " SELECT hh.FD_TGL_LAHIR,hh.FS_ALM_PASIEN,aa.fs_kd_reg,aa.fd_tgl_masuk, aa.fs_jam_masuk, aa.fs_kd_petugas, 
        aa.fd_tgl_void, aa.fs_jam_void, hh.fs_kd_identitas, 
        aa.fs_kd_petugas_void, aa.fs_mr, aa.fs_kd_layanan, aa.fs_kd_kelas,   
        aa.fs_kd_cara_masuk_dk, aa.fs_kd_rujukan, aa.fn_kunjunganke, aa.fs_kd_jenis_inap,  
        aa.fs_reg_ibu, aa.fs_kd_smf, aa.fs_kd_karcis, aa.fn_karcis,  
        aa.fn_karcis_sisa, aa.fs_kd_rek_sisa, aa.fs_kd_status_peserta, 
        aa.fs_nm_penjamin, aa.fs_alm_penjamin, aa.fs_alm2_penjamin, aa.fs_kota_penjamin,  
        aa.fs_hub_penjamin, aa.fs_id_penjamin, aa.fs_kd_medis, aa.fd_tgl_keluar, aa.fs_jam_keluar, 
        aa.fs_nomor_rujukan, aa.fd_tgl_rujukan, aa.fs_kd_icd, aa.fs_kd_tipe_jaminan, aa.fs_no_peserta, 
        aa.fs_kd_petugas_keluar, aa.fd_tgl_cancel_out, aa.fs_jam_cancel_out, aa.fs_kd_petugas_cancel_out, 
        aa.fs_kd_trs_tindakan, aa.fs_kd_petugas_kasir_masuk, aa.fs_kd_petugas_kasir_keluar, 
        aa.fs_kd_booking, aa.fb_prioritas, aa.fs_kd_trs_kwitansi_masuk, aa.fs_kd_trs_kwitansi_keluar, 
        aa.fs_uraian_dokter, aa.fd_tgl_free_charge, aa.fs_jam_free_charge, fn_diskon_tindakan, fn_diskon_karcis,  
        aa.fn_plafond_jaminan, aa.fs_sandi_kliring, aa.fs_kd_trs_administrasi,fs_kd_trs_materai,fs_kd_trs_struk, 
        aa.fs_kd_trs_pembulatan, aa.fs_kd_trs_deposit, aa.fn_kas_karcis, aa.fn_bank_karcis, aa.fn_kartu_kredit_karcis, 
        aa.fs_kd_rek_kas_karcis, aa.fs_kd_rek_bank_karcis, aa.fs_kd_rek_kartu_kredit_karcis, aa.fs_no_kartu_kredit_karcis, 
        fs_kd_layanan3,fs_kd_layanan_akhir,aa.fs_kd_trs_kwitansi_klaim, aa.FS_KD_TRS_KWITANSI_SISADP, 
        aa.fn_total_hutang_jasa, aa.fn_total_hutang_obat, aa.fn_total_nilai_jasa, aa.fn_total_nilai_obat, 
        aa.fn_total_diskon_jasa, aa.fn_total_diskon_obat, aa.fn_total_biayaplus_jasa, aa.fn_total_biayaplus_obat, 
        aa.fn_total_tax_jasa, aa.fn_total_tax_obat, aa.fd_sent_verifikasi, 
        aa.fs_no_bank_karcis, aa.fs_kd_jenis_bank, fs_pekerjaan_penjamin, fs_no_telp_penjamin, 
        aa.fn_biaya_administrasi, aa.fn_biaya_meterai, aa.fn_biaya_pembulatan_jasa, aa.fn_biaya_pembulatan_obat, 
        aa.fs_kd_sesion_poli,aa.fs_anamnese,aa.fs_kd_trs_antrian, aa.fs_kd_trs_antrian2, aa.fs_kd_trs_antrian3, 
        aa.fs_kd_medis2, aa.fs_kd_medis3, fs_kd_bed_awal, fs_kd_trs_bed_awal, fs_kd_jenis_reg, fs_no_sjp, fs_kd_trs_sjp, xx.fs_nm_layanan 'layanan_akhir'
        FROM       ta_registrasi aa 
        INNER JOIN tz_user bb          ON aa.fs_kd_petugas = bb.fs_kd_user  
        LEFT JOIN  tz_user cc          ON aa.fs_kd_petugas_void = cc.fs_kd_user  
        LEFT JOIN  tz_user dd          ON aa.fs_kd_petugas_keluar = dd.fs_kd_user  
        LEFT JOIN  tz_user ee          ON aa.fs_kd_petugas_cancel_out = ee.fs_kd_user  
        LEFT JOIN  tz_user ff          ON aa.fs_kd_petugas_kasir_masuk = ff.fs_kd_user  
        LEFT JOIN  tz_user gg          ON aa.fs_kd_petugas_kasir_keluar = gg.fs_kd_user  
        LEFT JOIN  tc_mr hh            ON aa.fs_mr = hh.fs_mr 
        LEFT JOIN  ta_layanan ii       ON aa.fs_kd_layanan = ii.fs_kd_layanan  
        LEFT JOIN  ta_layanan xx       ON aa.fs_kd_layanan_akhir = xx.fs_kd_layanan  
        LEFT JOIN  ta_kelas jj         ON aa.fs_kd_kelas = jj.fs_kd_kelas 
        LEFT JOIN  ta_cara_masuk_dk kk ON aa.fs_kd_cara_masuk_dk = kk.fs_kd_cara_masuk_dk 
        LEFT JOIN  ta_smf ll           ON aa.fs_kd_smf = ll.fs_kd_smf 
        LEFT JOIN  ta_jenis_inap mm    ON aa.fs_kd_jenis_inap = mm.fs_kd_jenis_inap
        LEFT JOIN tab_px_pulang_resume xx1 ON aa.fs_kd_reg=xx1.fs_kd_reg
        LEFT JOIN  td_peg nn           ON xx1.fs_verif_dokter= nn.fs_kd_peg 
        LEFT JOIN  td_peg nn2          ON aa.fs_kd_medis2= nn2.fs_kd_peg 
        LEFT JOIN  td_peg nn3          ON aa.fs_kd_medis3= nn3.fs_kd_peg 
        LEFT JOIN  ta_tipe_jaminan oo  ON aa.fs_kd_tipe_jaminan = oo.fs_kd_tipe_Jaminan 
        LEFT JOIN  ta_rujukan pp       ON aa.fs_kd_rujukan = pp.fs_kd_rujukan 
        LEFT JOIN  ta_sesion_poli qq   ON aa.fs_kd_sesion_poli = qq.fs_kd_sesion_poli 
        LEFT JOIN  ta_reg_jaminan rr   ON aa.fs_kd_reg = rr.fs_kd_reg 
        LEFT JOIN  ta_polis ss         ON rr.fs_kd_polis = ss.fs_kd_polis 
        LEFT JOIN  ta_reg_rujukan tt   ON aa.fs_kd_reg = tt.fs_kd_reg 
        LEFT JOIN  ta_reg_inap uu      ON aa.fs_kd_reg = uu.fs_kd_reg 
        LEFT JOIN  ta_caramasuk_inap vv ON uu.fs_kd_caramasuk_inap = vv.fs_kd_caramasuk_inap 
        LEFT JOIN  ta_reg_jalan ww     ON aa.fs_kd_reg = ww.fs_kd_reg
        LEFT JOIN TA_PEKERJAAN_DK m ON hh.FS_KD_PEKERJAAN_DK=m.FS_KD_PEKERJAAN_DK
        LEFT JOIN TA_PENDIDIKAN_DK n ON hh.FS_KD_PENDIDIKAN_DK=n.FS_KD_PENDIDIKAN_DK
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
