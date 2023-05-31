<?php

class m_cppt extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        // load encrypt
         $this->db = $this->load->database('emr', TRUE);
    }

    function get_last_inserted_id() {
        return $this->db->insert_id();
    }

    function insert_status($params) {
        $sql = "INSERT INTO TAC_RJ_STATUS( FS_KD_REG, FS_STATUS,FS_FORM, mdb, mdd)
        VALUES(?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    // insert surat keluar
    function insert($params) {
        $sql = "INSERT INTO TAC_RI_CPPT(FS_KD_REG, FS_CPPT_S, FS_CPPT_O, FS_CPPT_A, FS_CPPT_P,FS_CPPT_TERAPI,FS_KD_KP, mdb, mdd_date, mdd_time)
        VALUES     (?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_medis($params) {
        $sql = "INSERT INTO TA_TRS_KARTU_PERIKSA(FS_KD_TRS, FD_TGL_TRS, FS_JAM_TRS, FS_KD_PETUGAS, FD_TGL_VOID, FS_JAM_VOID, FS_KD_REG, 
        FS_KD_LAYANAN, FS_KD_PETUGAS_MEDIS, FS_ANAMNESA, FS_DIAGNOSA, FS_TINDAKAN, 
        FS_CATATAN_FISIK,FB_RESEP,FS_KD_MEDIS_RESEP, FS_KD_TIPE_BARANG, FN_CETAK)
        VALUES     (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_pemeriksaan_lab($params) {
        $sql = "INSERT INTO ta_trs_kartu_periksa4 (fs_kd_trs, fn_no_urut, fs_kd_tarif) VALUES (?, ?, ?)";
        return $this->db->query($sql, $params);
    }

    function insert_pemeriksaan_rad($params) {
        $sql = "INSERT INTO ta_trs_kartu_periksa5 (fs_kd_trs, fn_no_urut, fs_kd_tarif) VALUES (?, ?, ?)";
        return $this->db->query($sql, $params);
    }

    function insert_resep($params) {
        $sql = "INSERT INTO TA_TRS_KARTU_PERIKSA3(FS_KD_BARANG, FS_NM_BARANG, FS_KD_SATUAN,
        FN_QTY_BARANG,FS_ETIKET,FS_KD_TIPE_BARANG,FN_ETIKET_QTY,FS_ETIKET_CATATAN, FS_ETIKET_HARI,FS_KD_REG)
        VALUES(?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_cara_pulang($params) {
        $sql = "INSERT INTO TAB_PX_PULANG_RESUME(FS_KD_REG, FS_DIAG_UTAMA, FS_CARA_PULANG,
        FS_DIAG_SEK)
        VALUES(?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_cara_pulang_jkn($params) {
        $sql = "INSERT INTO TAB_PX_PULANG_RESUME_JKN(FS_KD_REG, FS_DIAG_UTAMA, FS_CARA_PULANG,
        FS_DIAG_SEK)
        VALUES(?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_diag($params) {
        $sql = "INSERT INTO TAB_PX_PULANG_RESUME(FS_KD_REG, FS_DIAG_UTAMA,
        FS_DIAG_SEK)
        VALUES(?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_diag_jkn($params) {
        $sql = "INSERT INTO TAB_PX_PULANG_RESUME_JKN(FS_KD_REG, FS_DIAG_UTAMA,
        FS_DIAG_SEK)
        VALUES(?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_tc_mr_his($params) {
        $sql = "INSERT INTO tc_mr_his (fs_mr, fs_kd_reg, fs_kd_trs, fs_nm_trs, fd_tgl_trs, fs_jam_trs, fs_kd_trs_tipe, fs_kd_layanan) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        return $this->db->query($sql, $params);
    }

    function update_diag($params) {
        $sql = "UPDATE TAB_PX_PULANG_RESUME SET FS_DIAG_UTAMA = ?,
        FS_DIAG_SEK = ? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function update_diag_jkn($params) {
        $sql = "UPDATE TAB_PX_PULANG_RESUME_JKN SET FS_DIAG_UTAMA = ?,
        FS_DIAG_SEK = ? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function update_cara_pulang($params) {
        $sql = "UPDATE TAB_PX_PULANG_RESUME SET FS_DIAG_UTAMA=?, FS_CARA_PULANG=?,FS_DIAG_SEK=? WHERE FS_KD_REG= ?";
        return $this->db->query($sql, $params);
    }

    function update_cara_pulang_jkn($params) {
        $sql = "UPDATE TAB_PX_PULANG_RESUME_JKN SET FS_DIAG_UTAMA=?, FS_CARA_PULANG=?,FS_DIAG_SEK=? WHERE FS_KD_REG= ?";
        return $this->db->query($sql, $params);
    }

    function update_tz_parameter_no_kp($params) {
        $sql = "UPDATE TZ_PARAMETER_NO SET FN_VALUE=? WHERE FS_KD_PARAMETER= 'NOKRTPRKSA'";
        return $this->db->query($sql, $params);
    }

    function update($params) {
        $sql = "UPDATE TAC_RI_CPPT SET FS_CPPT_S =?,FS_CPPT_O=?, FS_CPPT_A=?, FS_CPPT_P=?,FS_CPPT_TERAPI=? WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }

    function update_data_resep($params) {
        $sql = "UPDATE TA_TRS_KARTU_PERIKSA3 SET FS_KD_TRS = ? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function update_data_resep2($params) {
        $sql = "UPDATE TA_TRS_KARTU_PERIKSA3 SET FS_KD_REG = '' WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }

    function delete($params) {
        $sql = "UPDATE TAC_RI_CPPT SET FD_TGL_VOID =?,FD_JAM_VOID=?, FS_PETUGAS_VOID=? WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }

    function delete_resep_process($params) {
        $sql = "DELETE FROM TA_TRS_KARTU_PERIKSA3 WHERE FS_KD_TRS2 = ?";
        return $this->db->query($sql, $params);
    }

    function get_no_kp() {
        $sql = "SELECT RIGHT(FN_VALUE+100000000,7)'KP'  FROM   tz_parameter_no  WHERE  fs_kd_parameter= 'NOKRTPRKSA'";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_cppt_by_rg($params) {
        $sql = "SELECT a.*,b.FS_NM_PEG,d.role_id,RIGHT(mdd_date,2) 'TGL',
        e.FS_NM_PEG 'FS_NM_MEDIS_VERIF'
        FROM TAC_RI_CPPT a
        LEFT JOIN TD_PEG b ON a.mdb=b.FS_KD_PEG
        LEFT JOIN TAC_COM_USER c ON a.mdb=c.user_name
        LEFT JOIN TAC_COM_ROLE_USER d ON c.user_id=d.user_id
        LEFT JOIN TD_PEG e ON a.FS_KD_MEDIS_VERIF = e.FS_KD_PEG
        WHERE FS_KD_REG = ? AND FD_TGL_VOID='3000-01-01'
        ORDER BY mdd_date DESC,mdd_time DESC";
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
        $sql = "SELECT FS_NM_BARANG,FN_QTY_BARANG,FS_KD_SATUAN,b.FS_KETERANGAN,FS_ETIKET_CATATAN,
        FN_ETIKET_QTY,FS_ETIKET_HARI
        FROM TA_TRS_KARTU_PERIKSA a
        LEFT JOIN TA_TRS_KARTU_PERIKSA3 b ON a.FS_KD_TRS=b.FS_KD_TRS
        WHERE a.FS_KD_TRS = ? AND FD_TGL_VOID='3000-01-01'";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_data_terapi_baru_by_rg($params) {
        $sql = "SELECT *
        FROM TA_TRS_KARTU_PERIKSA3 
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

    function get_resep($params) {
        $sql = "SELECT DISTINCT a.FS_KD_BARANG,FS_NM_BARANG 
        FROM TB_BARANG a
        LEFT JOIN tb_stok b ON  a.fs_kd_barang = b.fs_kd_barang    
        WHERE FB_AKTIF = '1' AND FS_KD_GRUP_REK = '001' AND b.fs_kd_layanan IN('O020', 'O005')
        ORDER BY FS_NM_BARANG ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_sat_barang($params) {
        $sql = "SELECT FS_KD_SAT_JUAL,FS_NM_BARANG
        FROM TB_BARANG 
        WHERE FS_KD_BARANG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_cppt_by_trs($params) {
        $sql = "SELECT a.*,b.FS_NM_PEG FROM TAC_RI_CPPT a
        LEFT JOIN TD_PEG b ON a.mdb=b.FS_KD_PEG
        WHERE FS_KD_TRS = ? 
        ORDER BY mdd_time DESC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    // delete surat masuk
    function delete_terapi($params) {
        $sql = "DELETE FROM TAB_PX_PULANG_TERAPI WHERE FS_KD_TERAPI = ?";
        return $this->db->query($sql, $params);
    }

    function get_pasien_by_rg($params) {
        $sql = " SELECT hh.FD_TGL_LAHIR,hh.FS_ALM_PASIEN,     aa.fs_kd_reg,aa.fd_tgl_masuk, aa.fs_jam_masuk,  
        aa.fs_mr, aa.fs_kd_layanan, aa.fs_kd_kelas,aa.fs_kd_medis,fs_kd_layanan3,fs_kd_layanan_akhir, 
        aa.fs_kd_medis2, aa.fs_kd_medis3, fs_kd_bed_awal, fs_kd_trs_bed_awal, fs_kd_jenis_reg, fs_no_sjp, fs_kd_trs_sjp, xx.fs_nm_layanan 'layanan_akhir',
        datediff(hh.fd_tgl_lahir,aa.fd_tgl_masuk)
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
        LEFT JOIN  td_peg nn2          ON aa.fs_kd_medis= nn2.fs_kd_peg 
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

    // get email address for send attachment
    function get_pasien_by_mr($params) {
        $sql = "SELECT       TOP(10)aa.FS_KD_REG, right(cc.FS_MR, 8)fs_mr, aa.fd_tgl_masuk, aa.fd_tgl_keluar, cc.FS_NM_PASIEN, 
        ISNULL(ifa_GetAllDiagByKodeReg(aa.fs_kd_reg), '')  fs_kd_diagnosa, 
        bb.FS_NM_LAYANAN 
        FROM TA_Registrasi aa 
        INNER JOIN TA_Layanan bb ON bb.FS_KD_LAYANAN = aa.FS_KD_LAYANAN 
        INNER JOIN TC_MR cc ON cc.FS_MR = aa.FS_MR 
        LEFT JOIN TC_MR1 ee ON aa.FS_KD_REG = ee.fs_kd_reg 
        LEFT JOIN TC_KET_ICD_EMPTY ff ON ee.FS_KD_KET_ICD_EMPTY = ff.FS_KD_KET_ICD_EMPTY 
        Where cc.fs_mr = ? and aa.fd_tgl_void = '3000-01-01' AND bb.FS_KD_INSTALASI = 'RI'
        Order by aa.fs_kd_reg DESC,aa.fd_tgl_masuk";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_layanan() {
        $sql = "SELECT * FROM TA_LAYANAN WHERE FS_KD_INSTALASI = 'RJ' ORDER BY FS_NM_LAYANAN ASC";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function update_dokter($params) {
        $sql = "UPDATE TAC_RI_CPPT SET FS_KD_MEDIS_VERIF=?,FS_KD_MEDIS_VERIF_DATE=?,FS_KD_MEDIS_VERIF_TIME=?,
        FS_KET_VERIF = ?
        WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }

    function get_pasien_bangsal($params) {
        $sql = " SELECT     aa.fs_kd_reg, RIGHT(bb.fs_mr,8) 'FS_MR',
        ISNULL(ee.fs_nm_bed, ' ') fs_nm_bed, 
        ISNULL(cc.fs_nm_pasien, ' ') fs_nm_pasien,cc.fd_tgl_lahir
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

    function get_pasien_bangsal_by_bangsal($params) {
        $sql = " SELECT     aa.fs_kd_reg, RIGHT(bb.fs_mr,8) 'FS_MR', 
        ISNULL(ee.fs_nm_bed, ' ') fs_nm_bed, 
        ISNULL(cc.fs_nm_pasien, ' ') fs_nm_pasien,cc.fd_tgl_lahir
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
        WHERE dd.fs_kd_layanan = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_all_resume($params) {
        $sql = "SELECT FS_KD_REG FROM TAC_RI_CPPT WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            return $result;
        } else {
            return 0;
        }
    }

    function get_data_medis_by_rg($params) {
        $sql = "SELECT a.*,FS_NM_PEG
        FROM TAC_RI_MEDIS a
        LEFT JOIN TD_PEG b ON a.FS_KD_MEDIS=b.FS_KD_PEG
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

    function get_data_resume_by_rg($params) {
        $sql = "SELECT *
        FROM TAB_PX_PULANG_RESUME
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

    function cek_resume($params) {
        $sql = "SELECT FS_KD_REG FROM TAB_PX_PULANG_RESUME WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            return $result;
        } else {
            return 0;
        }
    }

    function get_pasien_bangsal_kby($params) {
        $sql = " SELECT     aa.fs_kd_reg, RIGHT(bb.fs_mr,8) 'FS_MR',
        ISNULL(ee.fs_nm_bed, ' ') fs_nm_bed, 
        ISNULL(cc.fs_nm_pasien, ' ') fs_nm_pasien,cc.fd_tgl_lahir
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
        WHERE dd.fs_kd_layanan = 'B15' OR dd.fs_kd_layanan = 'B18'";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_tipe_barang_obat($params) {
        $sql = "SELECT c.FS_KD_TIPE_BRG_RAWAT_INAP
        from TA_REGISTRASI a
        left join TA_TIPE_JAMINAN b on a.FS_KD_TIPE_JAMINAN=b.FS_KD_TIPE_JAMINAN
        left join TA_JAMINAN c ON b.FS_KD_JAMINAN=c.FS_KD_JAMINAN
        where fs_kd_reg = ?";
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
