<?php

class m_cppt extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        // load encrypt
    }

    function get_last_inserted_id() {
        return $this->db->insert_id();
    }

    function insert_status($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_RJ_STATUS( FS_KD_REG, FS_STATUS,FS_FORM, mdb, mdd)
        VALUES(?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    // insert surat keluar
    function insert($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_RI_CPPT(FS_KD_REG, FS_CPPT_S, FS_CPPT_O, FS_CPPT_A, FS_CPPT_P,FS_CPPT_TERAPI,FS_KD_KP, mdb, mdd_date, mdd_time)
        VALUES     (?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_medis($params) {
        $sql = "INSERT INTO PKU.dbo.TA_TRS_KARTU_PERIKSA(FS_KD_TRS, FD_TGL_TRS, FS_JAM_TRS, FS_KD_PETUGAS, FD_TGL_VOID, FS_JAM_VOID, FS_KD_REG, 
        FS_KD_LAYANAN, FS_KD_PETUGAS_MEDIS, FS_ANAMNESA, FS_DIAGNOSA, FS_TINDAKAN, 
        FS_CATATAN_FISIK,FS_KD_MEDIS_RESEP, FS_KD_TIPE_BARANG, FN_CETAK)
        VALUES     (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_pemeriksaan_lab($params) {
        $sql = "INSERT INTO HOSPITAL.dbo.ta_trs_kartu_periksa4 (fs_kd_trs, fn_no_urut, fs_kd_tarif) VALUES (?, ?, ?)";
        return $this->db->query($sql, $params);
    }

    function insert_pemeriksaan_rad($params) {
        $sql = "INSERT INTO HOSPITAL.dbo.ta_trs_kartu_periksa5 (fs_kd_trs, fn_no_urut, fs_kd_tarif) VALUES (?, ?, ?)";
        return $this->db->query($sql, $params);
    }

    function insert_resep($params) {
        $sql = "INSERT INTO PKU.dbo.TA_TRS_KARTU_PERIKSA3( FS_KD_BARANG, FS_NM_BARANG, FS_KD_SATUAN,
        FN_QTY_BARANG,FS_ETIKET,FS_KD_TIPE_BARANG,FN_ETIKET_QTY,FN_ETIKET_HARI,FS_ETIKET_CATATAN, FS_KD_REG)
        VALUES(?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_cara_pulang($params) {
        $sql = "INSERT INTO PKU.dbo.TAB_PX_PULANG_RESUME(FS_KD_REG, FS_DIAG_UTAMA, FS_CARA_PULANG,
        FS_DIAG_SEK)
        VALUES(?,?,?,?)";
        return $this->db->query($sql, $params);
    }
    
    function insert_diag($params) {
        $sql = "INSERT INTO PKU.dbo.TAB_PX_PULANG_RESUME(FS_KD_REG, FS_DIAG_UTAMA,
        FS_DIAG_SEK)
        VALUES(?,?,?)";
        return $this->db->query($sql, $params);
    }
    
    function update_diag($params) {
        $sql = "UPDATE PKU.dbo.TAB_PX_PULANG_RESUME SET FS_DIAG_UTAMA = ?,
        FS_DIAG_SEK = ? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function update_cara_pulang($params) {
        $sql = "UPDATE PKU.dbo.TAB_PX_PULANG_RESUME SET FS_DIAG_UTAMA=?, FS_CARA_PULANG=?,FS_DIAG_SEK=? WHERE FS_KD_REG= ?";
        return $this->db->query($sql, $params);
    }

    function update_tz_parameter_no_kp($params) {
        $sql = "UPDATE PKU.dbo.TZ_PARAMETER_NO SET FN_VALUE=? WHERE FS_KD_PARAMETER= 'NOKRTPRKSA'";
        return $this->db->query($sql, $params);
    }

    function update($params) {
        $sql = "UPDATE PKU.dbo.TAC_RI_CPPT SET FS_CPPT_S =?,FS_CPPT_O=?, FS_CPPT_A=?, FS_CPPT_P=?,FS_CPPT_TERAPI=? WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }

    function update_data_resep($params) {
        $sql = "UPDATE PKU.dbo.TA_TRS_KARTU_PERIKSA3 SET FS_KD_TRS = ? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function update_data_resep2($params) {
        $sql = "UPDATE PKU.dbo.TA_TRS_KARTU_PERIKSA3 SET FS_KD_REG = '' WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }

    function delete($params) {
        $sql = "UPDATE PKU.dbo.TAC_RI_CPPT SET FD_TGL_VOID =?,FD_JAM_VOID=?, FS_PETUGAS_VOID=? WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }

    function delete_resep_process($params) {
        $sql = "DELETE FROM PKU.dbo.TA_TRS_KARTU_PERIKSA3 WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }

    function get_no_kp() {
        $sql = "SELECT RIGHT(FN_VALUE+100000000,7)'KP'  FROM   PKU.dbo.tz_parameter_no  WHERE  fs_kd_parameter= 'NOKRTPRKSA'";
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
        $sql = "SELECT a.*,b.NAMALENGKAP,d.role_id,RIGHT(mdd_date,2) 'TGL',
        e.NAMALENGKAP 'FS_NM_MEDIS_VERIF'
        FROM PKU.dbo.TAC_RI_CPPT a
        LEFT JOIN DB_RSMM.dbo.TUSER b ON a.mdb=b.NAMAUSER
        LEFT JOIN PKU.dbo.TAC_COM_USER c ON a.mdb=c.user_name
        LEFT JOIN PKU.dbo.TAC_COM_ROLE_USER d ON c.user_id=d.user_id
        LEFT JOIN DB_RSMM.dbo.TUSER e ON a.FS_KD_MEDIS_VERIF = e.NAMAUSER
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

     function get_pasien_by_rg_ugd($params) {
        $date = date('Y-m-d');

        $sql = "SELECT E.NO_REG, B.NO_MR, B.NAMA_PASIEN, B.TGL_LAHIR, B.JENIS_KELAMIN, B.ALAMAT,  datediff(year,B.TGL_LAHIR,GETDATE()) 'fn_umur'
        FROM REGISTER_PASIEN B,  PENDAFTARAN E 
        WHERE B.NO_MR=E.NO_MR AND E.STATUS='0' and E.KODE_MASUK='1' and E.TANGGAL= '$date'";
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
        $sql = "SELECT FS_NM_BARANG,FN_QTY_BARANG,FS_KD_SATUAN,b.FS_KETERANGAN,FS_ETIKET_CATATAN,
        FN_ETIKET_QTY,FN_ETIKET_HARI
        FROM PKU.dbo.TA_TRS_KARTU_PERIKSA a
        LEFT JOIN PKU.dbo.TA_TRS_KARTU_PERIKSA3 b ON a.FS_KD_TRS=b.FS_KD_TRS
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
        FROM PKU.dbo.TA_TRS_KARTU_PERIKSA3 
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
        $sql = "SELECT KODE_OBAT,NAMA_OBAT from OBAT WHERE AKTIF = '1'
        ORDER BY NAMA_OBAT ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }

    function get_sat_barang($params) {
        $sql = "SELECT SATUAN,NAMA_OBAT from OBAT a
        LEFT JOIN SATUAN_OBAT b ON a.ID_SATUAN=b.ID_SATUAN 
        WHERE KODE_OBAT = ?";
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
        $sql = "SELECT a.*,b.FS_NM_PEG FROM PKU.dbo.TAC_RI_CPPT a
        LEFT JOIN HOSPITAL.dbo.TD_PEG b ON a.mdb=b.FS_KD_PEG
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
        $sql = "SELECT A.NO_REG,A.NO_MR,A.TGL_MULAI,B.NAMA_PASIEN,A.KODE_RUANG, B.JENIS_KELAMIN,B.ALAMAT,D.KODE_BANGSAL,C.NAMA_RUANG,D.NAMA_BANGSAL,E.KODEREKANAN,F.NAMAREKANAN ,B.TGL_LAHIR,datediff(year,B.TGL_LAHIR,GETDATE()) 'fn_umur'
        FROM TR_KAMAR A, REGISTER_PASIEN B, M_RUANG C, M_BANGSAL D, PENDAFTARAN E, REKANAN F 
        WHERE  A.NO_MR=B.NO_MR AND A.NO_REG=E.NO_REG AND E.KODEREKANAN=F.KODEREKANAN AND A.KODE_RUANG=C.KODE_RUANG AND C.KODE_BANGSAL=D.KODE_BANGSAL AND A.NO_REG = ? AND A.STATUS='1' AND E.STATUS='1' ORDER BY D.KODE_BANGSAL,A.TGL_MULAI";
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
        ISNULL(HOSPITAL.dbo.ifa_GetAllDiagByKodeReg(aa.fs_kd_reg), '')  fs_kd_diagnosa, 
        bb.FS_NM_LAYANAN 
        FROM HOSPITAL.dbo.TA_Registrasi aa 
        INNER JOIN HOSPITAL.dbo.TA_Layanan bb ON bb.FS_KD_LAYANAN = aa.FS_KD_LAYANAN 
        INNER JOIN HOSPITAL.dbo.TC_MR cc ON cc.FS_MR = aa.FS_MR 
        LEFT JOIN HOSPITAL.dbo.TC_MR1 ee ON aa.FS_KD_REG = ee.fs_kd_reg 
        LEFT JOIN HOSPITAL.dbo.TC_KET_ICD_EMPTY ff ON ee.FS_KD_KET_ICD_EMPTY = ff.FS_KD_KET_ICD_EMPTY 
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
        $sql = "SELECT * FROM HOSPITAL.dbo.TA_LAYANAN WHERE FS_KD_INSTALASI = 'RJ' ORDER BY FS_NM_LAYANAN ASC";
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
        $sql = "UPDATE PKU.dbo.TAC_RI_CPPT SET FS_KD_MEDIS_VERIF=?,FS_KD_MEDIS_VERIF_DATE=?,FS_KD_MEDIS_VERIF_TIME=?,
        FS_KET_VERIF = ?
        WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }

    function get_pasien_bangsal($params) {
        $sql = "select a.NOREG,c.NAMAPASIEN,NAMABAGIAN,c.NOPASIEN from 
        DBHOSPITAL.dbo.REGRWI a
        LEFT JOIN DBHOSPITAL.dbo.REGPAS b ON a.NOREG=b.NOREG
        LEFT JOIN DBHOSPITAL.dbo.PASIEN c ON b.NOPASIEN=c.NOPASIEN
        LEFT JOIN DBHOSPITAL.dbo.BAGIAN d ON a.KODEBAGIAN=d.KODEBAGIAN
        WHERE TGLPULANG IS NULL AND TGLMASUK IS NOT NULL AND STSPULANG = 'I'";
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
        $sql = "select a.NOREG,c.NAMAPASIEN,NAMABAGIAN,c.NOPASIEN from 
        DBHOSPITAL.dbo.REGRWI a
        LEFT JOIN DBHOSPITAL.dbo.REGPAS b ON a.NOREG=b.NOREG
        LEFT JOIN DBHOSPITAL.dbo.PASIEN c ON b.NOPASIEN=c.NOPASIEN
        LEFT JOIN DBHOSPITAL.dbo.BAGIAN d ON a.KODEBAGIAN=d.KODEBAGIAN
        WHERE TGLPULANG IS NULL AND TGLMASUK IS NOT NULL AND STSPULANG = 'I'
        AND a.KODEBAGIAN = ?";
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
        $sql = "SELECT FS_KD_REG FROM PKU.dbo.TAC_RI_CPPT WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            return $result;
        } else {
            return 0;
        }
    }

    function get_data_medis_by_rg($params) {
        $sql = "SELECT a.*,NAMALENGKAP
        FROM PKU.dbo.TAC_RI_MEDIS a
        LEFT JOIN DB_RSMM.dbo.TUSER b ON a.FS_KD_MEDIS=b.NAMAUSER
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
        FROM PKU.dbo.TAB_PX_PULANG_RESUME
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
        $sql = "SELECT FS_KD_REG FROM PKU.dbo.TAB_PX_PULANG_RESUME WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            return $result;
        } else {
            return 0;
        }
    }
}
