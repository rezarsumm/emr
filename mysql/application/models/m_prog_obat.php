<?php

class m_prog_obat extends CI_Model {

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
        $sql = "INSERT INTO HOSPITAL.dbo.ta_trs_kartu_periksa3( FS_KD_BARANG, FS_NM_BARANG, FS_KD_SATUAN,
                FN_QTY_BARANG,FS_ETIKET,FS_KD_TIPE_BARANG,FS_KETERANGAN,FS_ETIKET_CATATAN,FS_UDD_WAKTU, FS_KD_REG)
                VALUES(?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function update($params) {
        $sql = "UPDATE TAB_RM_17 SET FD_TGL_PEMBERIAN_OBAT=?,FS_JENIS_OBAT=?,FS_NAMA_OBAT =?, FS_DOSIS_OBAT =?,FS_RUTE=?,FS_INTERVAL=?,FS_KET=?,mdb=?,mdd=? WHERE FS_KD_RM17 = ?";
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

    function insert_medis($params) {
        $sql = "INSERT INTO HOSPITAL.dbo.TA_TRS_KARTU_PERIKSA(FS_KD_TRS, FD_TGL_TRS, FS_JAM_TRS, FS_KD_PETUGAS, FD_TGL_VOID, FS_JAM_VOID, FS_KD_REG, 
                FS_KD_LAYANAN, FS_KD_PETUGAS_MEDIS, FS_ANAMNESA, FS_DIAGNOSA, FS_TINDAKAN, 
                FS_CATATAN_FISIK,FS_KD_MEDIS_RESEP, FS_KD_TIPE_BARANG, FN_CETAK)
                VALUES     (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function update_data_resep($params) {
        $sql = "UPDATE HOSPITAL.dbo.ta_trs_kartu_periksa3 SET FS_KD_TRS = ? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function update_data_resep2($params) {
        $sql = "UPDATE HOSPITAL.dbo.ta_trs_kartu_periksa3 SET FS_KD_REG = '' WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }

    function update_tz_parameter_no_kp($params) {
        $sql = "UPDATE HOSPITAL.dbo.TZ_PARAMETER_NO SET FN_VALUE=? WHERE FS_KD_PARAMETER= 'NOKRTPRKSA'";
        return $this->db->query($sql, $params);
    }

    // delete surat masuk
    function delete($params) {
        $sql = "DELETE FROM HOSPITAL.dbo.ta_trs_kartu_periksa3 WHERE FS_KD_TRS2 = ?";
        return $this->db->query($sql, $params);
    }

    function delete_resep_process($params) {
        $sql = "DELETE FROM HOSPITAL.dbo.ta_trs_kartu_periksa3 WHERE FS_KD_TRS2 = ?";
        return $this->db->query($sql, $params);
    }

    // delete surat masuk
    function delete_catatan($params) {
        $sql = "DELETE FROM TAB_RM_17_1 WHERE FS_KD_RM17_DETAIL = ?";
        return $this->db->query($sql, $params);
    }

    function get_no_kp() {
        $sql = "SELECT RIGHT(FN_VALUE+100000000,7)'KP'  FROM   HOSPITAL.dbo.tz_parameter_no  WHERE  fs_kd_parameter= 'NOKRTPRKSA'";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_resep_dokter($params) {
        $sql = "SELECT * FROM PKU.dbo.TAC_RI_RESEP WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_data_terapi_by_rg($params) {
        $sql = "SELECT *
                FROM PKU.dbo.TAC_RI_RESEP 
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

    function get_data_terapi2_by_rg($params) {
        $sql = "SELECT *
                FROM HOSPITAL.dbo.ta_trs_kartu_periksa3
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

    function get_data_terapi3_by_rg($params) {
        $sql = "SELECT a.*,b.*
                FROM HOSPITAL.dbo.ta_trs_kartu_periksa a
                INNER JOIN HOSPITAL.dbo.ta_trs_kartu_periksa3 b ON a.FS_KD_TRS=b.FS_KD_TRS
                WHERE a.FS_KD_REG = ? AND FD_TGL_TRS = ? AND FD_TGL_VOID = '3000-01-01'
                AND FS_UDD_WAKTU = ?
                ORDER BY a.FD_TGL_TRS DESC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_data_medis_by_rg($params) {
        $sql = "SELECT a.*,FS_NM_PEG
                FROM TAC_RI_MEDIS a
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

    function get_resep($params) {
        $sql = "SELECT DISTINCT a.FS_KD_BARANG,FS_NM_BARANG 
                FROM HOSPITAL.dbo.TB_BARANG a
		LEFT JOIN HOSPITAL.dbo.tb_stok b ON  a.fs_kd_barang = b.fs_kd_barang    
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
