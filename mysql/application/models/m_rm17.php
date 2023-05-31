<?php

class m_rm17 extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        // load encrypt
        $this->db = $this->load->database('emr', TRUE);
    }

    function get_last_inserted_id() {
        return $this->db->insert_id();
    }

    // insert surat keluar
    function insert($params) {
        $sql = "INSERT INTO TAB_RM_17 (FS_KD_REG,FD_TGL_PEMBERIAN_OBAT,FS_JENIS_OBAT,FS_NAMA_OBAT,FS_DOSIS_OBAT,FS_RUTE,FS_INTERVAL,FS_KET,mdb,mdd)
                VALUES (?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function update($params) {
        $sql = "UPDATE TAB_RM_17 SET FD_TGL_PEMBERIAN_OBAT=?,FS_JENIS_OBAT=?,FS_NAMA_OBAT =?, FS_DOSIS_OBAT =?,FS_RUTE=?,FS_INTERVAL=?,FS_KET=?,
                FS_KET2=?, mdb=?,mdd=? WHERE FS_KD_RM17 = ?";
        return $this->db->query($sql, $params);
    }

    function insert_catatan($params) {
        $sql = "INSERT INTO TAB_RM_17_1(FS_KD_RM17,FS_CHK_OBAT,FS_CHK_DOSIS,FS_CHK_PASIEN,FS_CHK_RUTE,FD_WAKTU,FS_KD_PEG,FS_KD_PEG2,
                FS_KD_PEG3,mdb,mdd)
                VALUES(?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_terapi($params) {
        $sql = "INSERT INTO TAB_PX_PULANG_TERAPI(FS_NM_OBAT,FS_DOSIS_OBAT,FS_FREK_OBAT,FS_KD_REG, mdb,mdd)
                VALUES(?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    // delete surat masuk
    function delete($params) {
        $sql = "DELETE FROM TAB_RM_17 WHERE FS_KD_RM17 = ?";
        return $this->db->query($sql, $params);
    }

    // delete surat masuk
    function delete_catatan($params) {
        $sql = "DELETE FROM TAB_RM_17_1 WHERE FS_KD_RM17_DETAIL = ?";
        return $this->db->query($sql, $params);
    }

    function get_rm17_detail_by_id($params) {
        $sql = "SELECT * FROM TAB_RM_17 WHERE FS_KD_RM17 = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_pasien_by_rg($params) {
        $sql = " SELECT hh.FD_TGL_LAHIR,hh.FS_ALM_PASIEN,     aa.fs_kd_reg,aa.fd_tgl_masuk, aa.fs_jam_masuk, aa.fs_kd_petugas, aa.fd_tgl_void, aa.fs_jam_void,  
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
            fs_kd_layanan2, fs_kd_layanan3,fs_kd_layanan_akhir,aa.fs_kd_trs_kwitansi_klaim, aa.FS_KD_TRS_KWITANSI_SISADP, 
            aa.fn_total_hutang_jasa, aa.fn_total_hutang_obat, aa.fn_total_nilai_jasa, aa.fn_total_nilai_obat, 
            aa.fn_total_diskon_jasa, aa.fn_total_diskon_obat, aa.fn_total_biayaplus_jasa, aa.fn_total_biayaplus_obat, 
            aa.fn_total_tax_jasa, aa.fn_total_tax_obat, aa.fd_sent_verifikasi, 
            aa.fs_no_bank_karcis, aa.fs_kd_jenis_bank, fs_pekerjaan_penjamin, fs_no_telp_penjamin, 
            aa.fn_biaya_administrasi, aa.fn_biaya_meterai, aa.fn_biaya_pembulatan_jasa, aa.fn_biaya_pembulatan_obat, 
            aa.fs_kd_sesion_poli,aa.fs_anamnese,aa.fs_kd_trs_antrian, aa.fs_kd_trs_antrian2, aa.fs_kd_trs_antrian3, 
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
 LEFT JOIN  td_peg nn           ON aa.fs_kd_medis= nn.fs_kd_peg 
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

    function get_perawat($params) {
        $sql = "SELECT FS_KD_PEG,FS_NM_PEG FROM TD_PEG WHERE FB_AKTIF_DINAS = '1' ORDER BY FS_NM_PEG ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }

    function get_obat($params) {
        $sql = "SELECT DISTINCT a.FS_KD_BARANG,FS_NM_BARANG 
                FROM TB_BARANG a
		LEFT JOIN tb_stok b ON  a.fs_kd_barang = b.fs_kd_barang    
                WHERE FB_AKTIF = '1' AND FS_KD_GRUP_REK = '001' AND b.fs_kd_layanan IN('O020', 'O005')
                ORDER BY FS_NM_BARANG ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }

    function get_catatan_obat_by_rg($params) {
        $sql = "SELECT a.*,b.FS_KD_REG FROM TAB_RM_17_1 a
                LEFT JOIN TAB_RM_17 b ON a.FS_KD_RM17 = b.FS_KD_RM17
                WHERE a.FS_KD_RM17 = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }

    function get_nama_obat_by_rg($params) {
        $sql = "SELECT COUNT(*) 'TOTAL'  FROM TAB_PX_PULANG_TERAPI 
                WHERE FS_KD_REG = ? AND FS_NM_OBAT = ? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            return $result;
        } else {
            return array();
        }
    }

    function get_rm17_by_rg_all($params) {
        $sql = "SELECT FS_NAMA_OBAT,FS_KD_REG,FS_KD_RM17
                FROM TAB_RM_17 a
                WHERE a.FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }

    function get_rm17det_by_rg_all($params) {
        $sql = "SELECT a.*,b.*,c.FS_NM_PEG,d.FS_NM_PEG 'FS_NM_PEG2',e.FS_NM_PEG 'FS_NM_PEG3' 
                FROM TAB_RM_17 a
                LEFT JOIN TAB_RM_17_1 b ON a.FS_KD_RM17=b.FS_KD_RM17 
                LEFT JOIN TD_PEG c ON b.FS_KD_PEG=c.FS_KD_PEG
                LEFT JOIN TD_PEG d ON b.FS_KD_PEG2=d.FS_KD_PEG
                LEFT JOIN TD_PEG e ON b.FS_KD_PEG3=e.FS_KD_PEG
                WHERE a.FS_KD_RM17 = ? ORDER BY b.mdd DESC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }

    function get_layanan() {
        $sql = "SELECT * FROM TA_LAYANAN WHERE FS_KD_LAYANAN LIKE 'P%' ORDER BY FS_NM_LAYANAN ASC";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_all_resume($params) {
        $sql = "SELECT * FROM TAB_RM_17 WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            return $result;
        } else {
            return 0;
        }
    }

    function get_all_rm17_by_rg($params) {
        $sql = "SELECT * FROM TAB_RM_17 WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }

    function get_rm17_by_id($params) {
        $sql = "SELECT * FROM TAB_RM_17 WHERE FS_KD_RM17 = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            return $result;
        } else {
            return 0;
        }
    }

    function cek_nama_obat_by_rg($params) {
        $sql = "SELECT * FROM TAB_RM_17 WHERE FS_KD_REG = ? AND FS_NAMA_OBAT = ? AND FS_DOSIS_OBAT=?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            return $result;
        } else {
            return 0;
        }
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

}
