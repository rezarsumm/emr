<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_inap_konsul_medis extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_last_inserted_id() {
        return $this->db->insert_id();
    }

    function insert($params) {
        $sql = "INSERT INTO TAC_RI_KONSUL(FS_KD_REG, FS_KET1,FS_KET2, FS_STATUS, mdb, mdd_date,mdd_time)
                VALUES(?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }
    
    function insert_dokter($params) {
        $sql = "INSERT INTO TAC_RI_KONSUL2(FS_KD_TRS_KONSUL, FS_KD_PEG)
                VALUES(?,?)";
        return $this->db->query($sql, $params);
    }
    
    function insert_jawab($params) {
        $sql = "INSERT INTO TAC_RI_KONSUL3(FS_KD_TRS_KONSUL, FS_KET1,FS_KET2,FS_KET3,FS_KET4,mdb,mdd_date,mdd_time)
                VALUES(?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function update($params) {
        $sql = "UPDATE TAC_RI_KONSUL SET FS_KET1=?, FS_KET2=?, FS_STATUS=?, mdb=?,
                mdd_date=?,mdd_time=? WHERE FS_KD_TRS =?";
        return $this->db->query($sql, $params);
    }
    
    function update_status($params) {
        $sql = "UPDATE TAC_RI_KONSUL SET FS_STATUS=? WHERE FS_KD_TRS =?";
        return $this->db->query($sql, $params);
    }

    function delete_dokter($params) {
        $sql = "DELETE TAC_RI_KONSUL2 
                WHERE FS_KD_TRS_KONSUL = ?";
        return $this->db->query($sql, $params);
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

    // get site data
    function get_px_by_dokter($params) {
        $sql = "SELECT aa.fs_kd_reg, bb.fs_mr, 
            ISNULL(ee.fs_nm_bed, ' ') fs_nm_bed, 
            ISNULL(cc.fs_nm_pasien, ' ') fs_nm_pasien,cc.fd_tgl_lahir,fs_alm_pasien,
            FS_STATUS
            FROM ( 
                       SELECT      fs_kd_trs 
                       FROM        HOSPITAL.dbo.TA_TRS_BED 
                       WHERE       fd_tgl_in <= ? 
                               AND fd_tgl_out + fs_jam_out >= ? 
                               AND fd_tgl_void = '3000-01-01' 
                       ) aa1 
            LEFT JOIN  HOSPITAL.dbo.ta_trs_bed aa ON aa1.fs_kd_trs = aa.fs_kd_trs 
            LEFT JOIN  HOSPITAL.dbo.ta_registrasi bb ON aa.fs_kd_reg = bb.fs_kd_reg 
            LEFT JOIN  HOSPITAL.dbo.tc_mr cc ON bb.fs_mr = cc.fs_mr 
            LEFT JOIN  HOSPITAL.dbo.ta_layanan dd ON aa.fs_kd_layanan = dd.fs_kd_layanan 
            LEFT JOIN  HOSPITAL.dbo.ta_bed ee ON aa.fs_kd_bed = ee.fs_kd_bed 
            LEFT JOIN  HOSPITAL.dbo.ta_kamar ff ON ee.fs_kd_kamar = ff.fs_kd_kamar 
            LEFT JOIN  HOSPITAL.dbo.ta_bangsal gg ON ff.fs_kd_bangsal = gg.fs_kd_bangsal
            LEFT JOIN  TAC_RI_KONSUL hh ON bb.fs_kd_reg = hh.fs_kd_reg
            WHERE bb.FS_KD_MEDIS = ?
            ORDER BY fs_nm_bed ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function get_px_by_jawab_dokter($params) {
        $sql = "SELECT aa.fs_kd_reg, bb.fs_mr, 
            ISNULL(ee.fs_nm_bed, ' ') fs_nm_bed, 
            ISNULL(cc.fs_nm_pasien, ' ') fs_nm_pasien,cc.fd_tgl_lahir,fs_alm_pasien,
            FS_STATUS
            FROM ( 
                       SELECT      fs_kd_trs 
                       FROM        HOSPITAL.dbo.TA_TRS_BED 
                       WHERE       fd_tgl_in <= ? 
                               AND fd_tgl_out + fs_jam_out >= ? 
                               AND fd_tgl_void = '3000-01-01' 
                       ) aa1 
            LEFT JOIN  HOSPITAL.dbo.ta_trs_bed aa ON aa1.fs_kd_trs = aa.fs_kd_trs 
            LEFT JOIN  HOSPITAL.dbo.ta_registrasi bb ON aa.fs_kd_reg = bb.fs_kd_reg 
            LEFT JOIN  HOSPITAL.dbo.tc_mr cc ON bb.fs_mr = cc.fs_mr 
            LEFT JOIN  HOSPITAL.dbo.ta_layanan dd ON aa.fs_kd_layanan = dd.fs_kd_layanan 
            LEFT JOIN  HOSPITAL.dbo.ta_bed ee ON aa.fs_kd_bed = ee.fs_kd_bed 
            LEFT JOIN  HOSPITAL.dbo.ta_kamar ff ON ee.fs_kd_kamar = ff.fs_kd_kamar 
            LEFT JOIN  HOSPITAL.dbo.ta_bangsal gg ON ff.fs_kd_bangsal = gg.fs_kd_bangsal
            LEFT JOIN  TAC_RI_KONSUL hh ON bb.fs_kd_reg = hh.fs_kd_reg
            LEFT JOIN  TAC_RI_KONSUL2 ii ON hh.fs_kd_trs = ii.fs_kd_trs_konsul
            WHERE ii.FS_KD_PEG = ? AND hh.FS_STATUS = '0'
            ORDER BY fs_nm_bed ASC";
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
        $sql = "SELECT hh.FD_TGL_LAHIR,hh.FS_ALM_PASIEN,     aa.fs_kd_reg,aa.fd_tgl_masuk, aa.fs_jam_masuk,  
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
                WHERE aa.fs_kd_reg = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
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
    
    function get_konsul_by_rg($params) {
        $sql = "SELECT a.*,d.FS_NM_PEG,e.FS_NM_PEG 'FS_NM_PEG_PENGIRIM',
                c.FS_KET1 'J_FS_KET1',c.FS_KET2 'J_FS_KET2',c.FS_KET3 'J_FS_KET3'
                ,c.FS_KET4 'J_FS_KET4',c.mdd_date 'j_mdd_date',c.mdd_time 'j_mdd_time'
                ,f.FS_NM_PEG 'FS_NM_PEG_JAWAB',c.mdb 'j_mdb'
                FROM
                TAC_RI_KONSUL a
                LEFT JOIN TAC_RI_KONSUL2 b ON a.FS_KD_TRS=b.FS_KD_TRS_KONSUL
                LEFT JOIN TAC_RI_KONSUL3 c ON b.FS_KD_TRS_KONSUL=c.FS_KD_TRS_KONSUL
                LEFT JOIN HOSPITAL.dbo.TD_PEG d ON b.FS_KD_PEG=d.FS_KD_PEG
                LEFT JOIN HOSPITAL.dbo.TD_PEG e ON a.mdb=e.FS_KD_PEG
                LEFT JOIN HOSPITAL.dbo.TD_PEG f ON c.mdb=f.FS_KD_PEG
                WHERE FS_KD_REG = ?
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
    function get_konsul_by_trs($params) {
        $sql = "SELECT a.*,b.FS_NM_PEG,c.FS_KD_PEG 
                FROM TAC_RI_KONSUL a
                LEFT JOIN HOSPITAL.dbo.TD_PEG b ON a.mdb=b.FS_KD_PEG
                LEFT JOIN TAC_RI_KONSUL2 c ON a.FS_KD_TRS=c.FS_KD_TRS_KONSUL
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
    
    function get_dokter_konsul_by_trs($params) {
        $sql = "SELECT b.FS_KD_PEG,b.FS_NM_PEG FROM
                TAC_RI_KONSUL2 a
                LEFT JOIN HOSPITAL.dbo.TD_PEG b ON a.FS_KD_PEG=b.FS_KD_PEG
                WHERE FS_KD_TRS_KONSUL = ?
                ORDER BY a.FS_KD_TRS ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function list_dokter_konsul_by_trs($params) {
        $sql = "SELECT * FROM TAC_RI_KONSUL2 WHERE FS_KD_TRS_KONSUL = ?";
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
