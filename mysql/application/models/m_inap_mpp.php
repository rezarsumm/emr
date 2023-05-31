<?php

class m_inap_mpp extends CI_Model {

	function __construct() {
        // Call the Model constructor
		parent::__construct();
        // load encrypt
	}

	function get_last_inserted_id() {
		return $this->db->insert_id();
	}

	function insert($params) {
		$sql = "INSERT INTO TAC_RI_MPP
		(FS_KD_REG,FS_PARAM1,FS_PARAM2,FS_PARAM3,FS_PARAM4,FS_PARAM5,FS_PARAM6,FS_PARAM7,FS_PARAM8,FS_PARAM9,FS_PARAM10,FS_PARAM11,FS_PARAM12,FS_PARAM13,FS_PARAM14,FS_PARAM15,mdd_date,mdd_time,mdb)
		VALUES
		(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		return $this->db->query($sql, $params);
	}

	function insert_catatan($params) {
		$sql = "INSERT INTO TAC_RI_MPP2
		(FS_KD_REG,FS_KD_MPP,FS_KD_MPP2,FS_KET,mdd_date,mdd_time,mdb)
		VALUES
		(?,?,?,?,?,?,?)";
		return $this->db->query($sql, $params);
	}

	function update($params) {
		$sql = "UPDATE TAC_RI_MPP SET FS_PARAM1 = ?,FS_PARAM2 = ?,FS_PARAM3 = ?,FS_PARAM4 = ?,FS_PARAM5 = ?,FS_PARAM6 = ?,FS_PARAM7 = ?,FS_PARAM8 = ?,FS_PARAM9 = ?,FS_PARAM10 = ?,FS_PARAM11 = ?,FS_PARAM12 = ?,FS_PARAM13 = ?,FS_PARAM14 = ?,FS_PARAM15 = ?,mdd_date = ?,mdd_time = ?,mdb = ? WHERE FS_KD_REG = ?";
		return $this->db->query($sql, $params);
	}

	function cek_ases_mpp($params) {
		$sql = "SELECT FS_KD_REG FROM TAC_RI_MPP WHERE FS_KD_REG = ?";
		$query = $this->db->query($sql, $params);
		if ($query->num_rows() > 0) {
			$result = $query->num_rows();
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

	function get_data_ases_mpp_by_rg($params) {
		$sql = "SELECT a.*,b.FS_NM_PEG
		FROM TAC_RI_MPP a
		LEFT JOIN HOSPITAL.dbo.TD_PEG b ON a.mdb=b.FS_KD_PEG
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

	function get_mpp($params) {
		$sql = "SELECT *
		FROM TAC_COM_MPP
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

	function get_mpp2($params) {
		$sql = "SELECT *
		FROM TAC_COM_MPP2
		WHERE FS_KD_MPP = ?
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

	function get_implementasi_mpp($params) {
		$sql = "SELECT a.*,b.FS_IMPLEMENTASI,c.FS_IMPLEMENTASI2,d.FS_NM_PEG
		FROM TAC_RI_MPP2 a
		LEFT JOIN TAC_COM_MPP b ON a.FS_KD_MPP=b.FS_KD_TRS
		LEFT JOIN TAC_COM_MPP2 c ON a.FS_KD_MPP2=c.FS_KD_TRS
		LEFT JOIN HOSPITAL.dbo.TD_PEG d ON a.mdb=d.FS_KD_PEG
		WHERE FS_KD_REG = ?
		ORDER BY FS_KD_TRS DESC";
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