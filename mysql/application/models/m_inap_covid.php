<?php

class m_inap_covid extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_last_inserted_id() {
        return $this->db->insert_id();
    }
    
    function insert($params) {
        $sql = "INSERT INTO TAC_RI_COVID(FS_KD_REG, FS_PARAM_1, FS_PARAM_2,FS_PARAM_3,FS_PARAM_4, FS_PARAM_5, FS_PARAM_6, 
                FS_PARAM_7,FS_LOKASI,FD_TGL_BERANGKAT,FD_TGL_PULANG,FS_LOKASI2,FD_TGL_BERANGKAT2,FD_TGL_PULANG2,FS_KESIMPULAN,
                FS_SUHU,mdb, mdd)
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }
    
    function insert_kontak($params) {
        $sql = "INSERT INTO TAC_RI_COVID2(FS_KD_REG, FS_NM_KONTAK, FS_NM_DOMISILI, FS_NO_HP,FS_KD_TRS_COVID)
                VALUEs (?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }
    
    function insert_covid2($params) {
        $sql = "INSERT INTO TAC_RI_COVID3(FS_KD_REG, FD_TGL_KUNJUNG, FS_TEMPAT_KUNJUNG,FS_INFEKSI,FS_INFEKSI2,FS_KD_TRS_COVID)
                VALUES (?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }
    
    function insert_covid3($params) {
        $sql = "INSERT INTO TAC_RI_COVID4(FS_KD_REG, FS_KOMORBID1, FS_KOMORBID2, FS_KOMORBID3, FS_KOMORBID4,
                FS_KOMORBID5,FS_KOMORBID6,FS_KOMORBID7,FD_TGL_PANAS,FS_KD_TRS_COVID)
                VALUES (?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_covid5($params) {
        $sql = "INSERT INTO TAC_RI_COVID6(FS_KD_REG, FD_SPES_TANGGAL, FS_SPES_PENGIRIM, FS_SPES_DINAS, FS_SPES_PROV,
                FS_SPES_RS, RS_SPES_RS_KOTA, FS_SPES_DPJP,FS_SPES_HP,FS_KD_TRS_COVID)
                VALUES (?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_covid6($params) {
        $sql = "INSERT INTO TAC_RI_COVID7(FS_KD_REG, FS_SPES_GEJALA1, FS_SPES_GEJALA2, FS_SPES_GEJALA3, FS_SPES_GEJALA4,
                FS_SPES_GEJALA5, FS_SPES_GEJALA6, FS_SPES_GEJALA7, FS_SPES_GEJALA8, FS_SPES_GEJALA9,FS_KD_TRS_COVID)
                VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_covid7($params) {
        $sql = "INSERT INTO TAC_RI_COVID8(FS_KD_REG, FS_PEN_XRAY, FS_PEN_VENT,FS_KD_TRS_COVID)
                VALUES (?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_covid4($params) {
        $sql = "INSERT INTO TAC_RI_COVID5(FS_KD_REG, FS_KD_SPESIMEN,FS_KD_TRS_COVID)
                VALUES (?,?,?)";
        return $this->db->query($sql, $params);
    }
    
    function update_covid($params) {
        $sql = "UPDATE TAC_RI_COVID SET FS_PARAM_1 = ?, FS_PARAM_2 = ?,FS_PARAM_3 = ?,FS_PARAM_4 = ?, FS_PARAM_5 = ?, FS_PARAM_6 = ?, 
                FS_PARAM_7 = ?,FS_LOKASI = ?,FD_TGL_BERANGKAT = ?,FD_TGL_PULANG = ?,FS_LOKASI2 = ?,FD_TGL_BERANGKAT2 = ?,
                FD_TGL_PULANG2= ?,FS_KESIMPULAN= ?,FS_SUHU=?,
                mdb= ?, mdd= ? WHERE FS_KD_TRS =?";
        return $this->db->query($sql, $params);
    }
    
    
    function update_covid1($params) {
        $sql = "UPDATE TAC_RI_COVID SET FS_TINDAK_LANJUT = ? WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }
    
    function update_covid3($params) {
        $sql = "UPDATE TAC_RI_COVID3 SET FD_TGL_KUNJUNG = ?, FS_TEMPAT_KUNJUNG = ?,FS_INFEKSI = ?,FS_INFEKSI2 = ?
                WHERE FS_KD_TRS_COVID = ?";
        return $this->db->query($sql, $params);
    }
    
    function update_covid4($params) {
        $sql = "UPDATE TAC_RI_COVID4 SET FS_KOMORBID1 = ?, FS_KOMORBID2 = ?, FS_KOMORBID3 = ?, FS_KOMORBID4 = ?,
                FS_KOMORBID5 = ?,FS_KOMORBID6 = ?,FS_KOMORBID7 = ?,FD_TGL_PANAS = ? WHERE FS_KD_TRS_COVID = ?";
        return $this->db->query($sql, $params);
    }
    
    function delete_covid5($params) {
        $sql = "DELETE TAC_RI_COVID5 
                WHERE FS_KD_TRS_COVID = ?";
        return $this->db->query($sql, $params);
    }
    
    function update_covid6($params) {
        $sql = "UPDATE TAC_RI_COVID6 SET FD_SPES_TANGGAL = ?, FS_SPES_PENGIRIM= ?, FS_SPES_DINAS= ?, FS_SPES_PROV= ?,
                FS_SPES_RS= ?, RS_SPES_RS_KOTA= ?, FS_SPES_DPJP= ?,FS_SPES_HP= ? WHERE FS_KD_TRS_COVID = ?";
        return $this->db->query($sql, $params);
    }

    function update_covid7($params) {
        $sql = "UPDATE TAC_RI_COVID7 SET FS_SPES_GEJALA1 = ?, FS_SPES_GEJALA2 = ?, FS_SPES_GEJALA3 = ?, 
                FS_SPES_GEJALA4 = ?,FS_SPES_GEJALA5 = ?, FS_SPES_GEJALA6 = ?, FS_SPES_GEJALA7 = ?, 
                FS_SPES_GEJALA8 = ?, FS_SPES_GEJALA9 = ? WHERE FS_KD_TRS_COVID = ?";
        return $this->db->query($sql, $params);
    }
    
    function update_covid8($params) {
        $sql = "UPDATE TAC_RI_COVID8 SET FS_PEN_XRAY= ?, FS_PEN_VENT= ? WHERE FS_KD_TRS_COVID = ?";
        return $this->db->query($sql, $params);
    }
    
     function delete_kontak_process($params) {
        $sql = "DELETE TAC_RI_COVID2 
                WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
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

    function get_px_covid_by_rg($params) {
        $sql = "SELECT a.FS_KD_REG,
                a.FS_KESIMPULAN,a.FS_KD_TRS,a.mdd
                FROM TAC_RI_COVID a
                WHERE a.FS_KD_REG = ?
                ORDER BY a.FS_KD_TRS DESC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function get_px_covid_by_id($params) {
        $sql = "SELECT * FROM
                TAC_RI_COVID
                WHERE FS_KD_TRS = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    
    function get_data_kontak($params) {
        $sql = "SELECT * FROM
                TAC_RI_COVID2
                WHERE FS_KD_TRS_COVID = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function cek_form_covid($params) {
        $sql = "SELECT * FROM TAC_RI_COVID3 WHERE FS_KD_TRS_COVID = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    
    function get_data_covid1_by_rg($params) {
        $sql = "SELECT * FROM TAC_RI_COVID WHERE FS_KD_TRS = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    
    function get_data_covid3_by_rg($params) {
        $sql = "SELECT * FROM
                TAC_RI_COVID3
                WHERE FS_KD_TRS_COVID = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    
    function get_data_covid4_by_rg($params) {
        $sql = "SELECT * FROM
                TAC_RI_COVID4
                WHERE FS_KD_TRS_COVID = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    
    function get_data_covid5_by_rg($params) {
        $sql = "SELECT * FROM TAC_RI_COVID5 WHERE FS_KD_TRS_COVID = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
     function get_data_covid6_by_rg($params) {
        $sql = "SELECT * FROM TAC_RI_COVID6 WHERE FS_KD_TRS_COVID = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    
    function get_data_covid7_by_rg($params) {
        $sql = "SELECT * FROM TAC_RI_COVID7 WHERE FS_KD_TRS_COVID = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    
    function get_data_covid8_by_rg($params) {
        $sql = "SELECT * FROM TAC_RI_COVID8 WHERE FS_KD_TRS_COVID = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    
    function get_px_covid($params) {
        $sql = "SELECT a.*,b.FS_NM_PEG FROM
                TAC_RI_COVID a
                LEFT JOIN HOSPITAL.dbo.TD_PEG b ON a.mdb=b.FS_KD_PEG
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
