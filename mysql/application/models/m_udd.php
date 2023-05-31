<?php

class m_udd extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        // load encrypt
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

    /*function update($params) {
        $sql = "UPDATE TAB_RM_17 SET FD_TGL_PEMBERIAN_OBAT=?,FS_JENIS_OBAT=?,FS_NAMA_OBAT =?, FS_DOSIS_OBAT =?,FS_RUTE=?,FS_INTERVAL=?,FS_KET=?,mdb=?,mdd=? WHERE FS_KD_RM17 = ?";
        return $this->db->query($sql, $params);
    }*/
    
    function update($params) {
        $sql = "UPDATE HOSPITAL.dbo.TA_TRS_KARTU_PERIKSA3 SET FS_ETIKET_CATATAN=?,FS_KETERANGAN=? WHERE FS_KD_TRS2 = ?";
        return $this->db->query($sql, $params);
    }

    function insert_catatan($params) {
        $sql = "INSERT INTO TAB_RM_17_1(FS_KD_RM17,FS_CHK_OBAT,FS_CHK_DOSIS,FS_CHK_PASIEN,FS_CHK_RUTE,FD_WAKTU,FS_KD_PEG,FS_KD_PEG2,
                mdb,mdd)
                VALUES(?,?,?,?,?,?,?,?,?,?)";
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

    function get_px_by_farmasi($params) {
        $sql = "SELECT distinct bb.fs_jam_trs, fs_nm_layanan, dd.fs_nm_peg, oo.fs_nm_tipe_jaminan, 
                CASE 
                WHEN nn.fd_tgl_void <> '3000-01-01' then ' ' 
                ELSE ISNULL(nn.fs_kd_trs, ' ')
                end As fs_kd_du,bb.fs_kd_trs, mm.fs_nm_pasien,RIGHT(rr.fs_mr,8) AS 'FS_MR', rr.FD_TGL_KELUAR,
                fs_udd_waktu,bb.fs_kd_reg
                FROM  HOSPITAL.dbo.ta_trs_kartu_periksa bb 
                INNER JOIN HOSPITAL.dbo.td_peg dd on bb.fs_kd_medis_resep = dd.fs_kd_peg 
                INNER JOIN HOSPITAL.dbo.ta_layanan ll on bb.fs_kd_layanan = ll.fs_kd_layanan 
                INNER JOIN HOSPITAL.dbo.ta_registrasi rr on bb.fs_kd_reg  = rr.fs_kd_reg 
                INNER JOIN HOSPITAL.dbo.tc_mr mm on rr.fs_mr = mm.fs_mr 
                LEFT JOIN  HOSPITAL.dbo.tb_trs_dobill_umum nn on bb.fs_kd_trs = nn.fs_kd_resep and nn.fd_tgl_void = '3000-01-01' 
                LEFT JOIN  HOSPITAL.dbo.ta_tipe_jaminan oo on rr.fs_kd_tipe_jaminan = oo.fs_kd_tipe_jaminan 
                LEFT JOIN  HOSPITAL.dbo.ta_trs_kartu_periksa3 pp on bb.fs_kd_trs = pp.fs_kd_trs 
                WHERE rr.fs_kd_jenis_reg = '1' AND fb_close_resep = 0 AND bb.fd_tgl_trs = ?  AND bb.fd_tgl_void = '3000-01-01' 
                AND bb.fs_kd_layanan = ? AND bb.fs_kd_trs IN (SELECT fs_kd_trs FROM HOSPITAL.dbo.ta_trs_kartu_periksa3 where fs_udd_waktu = ?)
                ORDER BY bb.fs_jam_trs, fs_nm_layanan, dd.fs_nm_peg, oo.fs_nm_tipe_jaminan, 
                CASE 
                WHEN nn.fd_tgl_void <> '3000-01-01' then ' ' 
                ELSE ISNULL(nn.fs_kd_trs, ' ')
                end,bb.fs_kd_trs, mm.fs_nm_pasien,RIGHT(rr.fs_mr,8), rr.FD_TGL_KELUAR,
                fs_udd_waktu,bb.fs_kd_reg";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }

    function get_pasien_udd_by_rg($params) {
        $sql = "SELECT DISTINCT RIGHT(cc.FS_MR,8) 'MR',cc.FS_NM_PASIEN,FD_TGL_LAHIR,
                ee.fs_nm_bed,bb.FS_KD_REG,ii.FS_UDD_WAKTU,FS_NM_BED
                FROM ( 
                    SELECT      fs_kd_trs 
                    FROM        HOSPITAL.dbo.TA_TRS_BED 
                    WHERE       fd_tgl_in <= ? 
                    AND fd_tgl_out + fs_jam_out >= ? 
                    AND fd_tgl_void = '3000-01-01' 
                    ) aa1 
                LEFT JOIN HOSPITAL.dbo.ta_trs_bed aa ON aa1.fs_kd_trs = aa.fs_kd_trs 
                LEFT JOIN HOSPITAL.dbo.ta_registrasi bb ON aa.fs_kd_reg = bb.fs_kd_reg 
                LEFT JOIN HOSPITAL.dbo.tc_mr cc ON bb.fs_mr = cc.fs_mr 
                LEFT JOIN HOSPITAL.dbo.ta_layanan dd ON aa.fs_kd_layanan = dd.fs_kd_layanan 
                LEFT JOIN HOSPITAL.dbo.ta_bed ee ON aa.fs_kd_bed = ee.fs_kd_bed 
                LEFT JOIN HOSPITAL.dbo.ta_kamar ff ON ee.fs_kd_kamar = ff.fs_kd_kamar 
                LEFT JOIN HOSPITAL.dbo.ta_bangsal gg ON ff.fs_kd_bangsal = gg.fs_kd_bangsal
                INNER JOIN HOSPITAL.dbo.ta_trs_kartu_periksa hh ON bb.fs_kd_reg = hh.fs_kd_reg
                INNER JOIN HOSPITAL.dbo.ta_trs_kartu_periksa3 ii ON hh.fs_kd_trs = ii.fs_kd_trs
                WHERE bb.FS_KD_REG = ? AND bb.FD_TGL_VOID = '3000-01-01' AND FS_UDD_WAKTU <> '' 
                ORDER BY RIGHT(cc.FS_MR,8),cc.FS_NM_PASIEN,FD_TGL_LAHIR,
                ee.fs_nm_bed,bb.FS_KD_REG,ii.FS_UDD_WAKTU";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_pasien_udd_by_trs($params) {
        $sql = "SELECT DISTINCT RIGHT(cc.FS_MR,8) 'MR',cc.FS_NM_PASIEN,FD_TGL_LAHIR,
                ee.fs_nm_bed,bb.FS_KD_REG,ii.FS_UDD_WAKTU,FS_NM_BED
                FROM ( 
                    SELECT      fs_kd_trs 
                    FROM        HOSPITAL.dbo.TA_TRS_BED 
                    WHERE       fd_tgl_in <= ? 
                    AND fd_tgl_out + fs_jam_out >= ? 
                    AND fd_tgl_void = '3000-01-01' 
                    ) aa1 
                LEFT JOIN HOSPITAL.dbo.ta_trs_bed aa ON aa1.fs_kd_trs = aa.fs_kd_trs 
                LEFT JOIN HOSPITAL.dbo.ta_registrasi bb ON aa.fs_kd_reg = bb.fs_kd_reg 
                LEFT JOIN HOSPITAL.dbo.tc_mr cc ON bb.fs_mr = cc.fs_mr 
                LEFT JOIN HOSPITAL.dbo.ta_layanan dd ON aa.fs_kd_layanan = dd.fs_kd_layanan 
                LEFT JOIN HOSPITAL.dbo.ta_bed ee ON aa.fs_kd_bed = ee.fs_kd_bed 
                LEFT JOIN HOSPITAL.dbo.ta_kamar ff ON ee.fs_kd_kamar = ff.fs_kd_kamar 
                LEFT JOIN HOSPITAL.dbo.ta_bangsal gg ON ff.fs_kd_bangsal = gg.fs_kd_bangsal
                INNER JOIN HOSPITAL.dbo.ta_trs_kartu_periksa hh ON bb.fs_kd_reg = hh.fs_kd_reg
                INNER JOIN HOSPITAL.dbo.ta_trs_kartu_periksa3 ii ON hh.fs_kd_trs = ii.fs_kd_trs
                WHERE ii.FS_KD_TRS = ? AND bb.FD_TGL_VOID = '3000-01-01' AND FS_UDD_WAKTU <> '' 
                ORDER BY RIGHT(cc.FS_MR,8),cc.FS_NM_PASIEN,FD_TGL_LAHIR,
                ee.fs_nm_bed,bb.FS_KD_REG,ii.FS_UDD_WAKTU";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_udd_by_trs($params) {
        $sql = "SELECT FD_TGL_TRS,FS_NM_BARANG,FN_QTY_BARANG,FS_KD_SATUAN,FN_ETIKET_QTY,FN_ETIKET_HARI,
                FS_UDD_WAKTU,b.FS_KD_TRS2,a.FS_KD_TRS,FS_ETIKET_CATATAN,FS_KETERANGAN
                FROM HOSPITAL.dbo.TA_TRS_KARTU_PERIKSA a 
                LEFT JOIN HOSPITAL.dbo.TA_TRS_KARTU_PERIKSA3 b ON a.FS_KD_TRS = b.FS_KD_TRS 
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
    function get_udd_by_trs2($params) {
        $sql = "SELECT FD_TGL_TRS,FS_NM_BARANG,FN_QTY_BARANG,FS_KD_SATUAN,FN_ETIKET_QTY,FN_ETIKET_HARI,
                FS_UDD_WAKTU,b.FS_KD_TRS2,a.FS_KD_TRS,FS_ETIKET_CATATAN,b.FS_KETERANGAN
                FROM HOSPITAL.dbo.TA_TRS_KARTU_PERIKSA a 
                LEFT JOIN HOSPITAL.dbo.TA_TRS_KARTU_PERIKSA3 b ON a.FS_KD_TRS = b.FS_KD_TRS 
                WHERE b.FS_KD_TRS2 = ? AND a.FD_TGL_VOID = '3000-01-01'";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
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

    function get_resep_sebelum_by_trs($params) {
        $sql = "SELECT FS_KD_BARANG,FS_NM_BARANG,FN_QTY_BARANG,FS_KD_SATUAN,
                FN_ETIKET_QTY,FN_ETIKET_HARI,FS_ETIKET_CATATAN,FS_UDD_WAKTU
                FROM HOSPITAL.dbo.TA_TRS_KARTU_PERIKSA a
                LEFT JOIN HOSPITAL.dbo.TA_TRS_KARTU_PERIKSA3 b ON a.FS_KD_TRS=b.FS_KD_TRS
                WHERE a.FD_TGL_TRS = ? AND a.FD_TGL_VOID = '3000-01-01' AND FS_KETERANGAN='1' AND a.FS_KD_REG=? AND FS_UDD_WAKTU = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function get_resep_sesudah_by_trs($params) {
        $sql = "SELECT FS_KD_BARANG,FS_NM_BARANG,FN_QTY_BARANG,FS_KD_SATUAN,
                FN_ETIKET_QTY,FN_ETIKET_HARI,FS_ETIKET_CATATAN,FS_UDD_WAKTU
                FROM HOSPITAL.dbo.TA_TRS_KARTU_PERIKSA a
                LEFT JOIN HOSPITAL.dbo.TA_TRS_KARTU_PERIKSA3 b ON a.FS_KD_TRS=b.FS_KD_TRS
                WHERE a.FD_TGL_TRS = ? AND a.FD_TGL_VOID = '3000-01-01' AND FS_KETERANGAN='2' AND a.FS_KD_REG=? AND FS_UDD_WAKTU = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

     function get_resep_all_by_trs($params) {
        $sql = "SELECT FS_KD_BARANG,FS_NM_BARANG,FN_QTY_BARANG,FS_KD_SATUAN,
                FN_ETIKET_QTY,FN_ETIKET_HARI,FS_ETIKET_CATATAN,FS_UDD_WAKTU
                FROM HOSPITAL.dbo.TA_TRS_KARTU_PERIKSA a
                LEFT JOIN HOSPITAL.dbo.TA_TRS_KARTU_PERIKSA3 b ON a.FS_KD_TRS=b.FS_KD_TRS
                WHERE a.FD_TGL_TRS = ? AND a.FD_TGL_VOID = '3000-01-01' AND FS_KETERANGAN='3' AND a.FS_KD_REG=? AND FS_UDD_WAKTU = ?";
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
