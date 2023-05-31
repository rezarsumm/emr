<?php

class m_rm17 extends CI_Model {

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
        $sql = "INSERT INTO PKU.dbo.TAB_RM_17 (FS_KD_REG,FD_TGL_PEMBERIAN_OBAT,FS_JENIS_OBAT,FS_NAMA_OBAT,FS_DOSIS_OBAT,FS_RUTE,FS_INTERVAL,FS_KET,mdb,mdd,FS_KET2)
                VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function update($params) {
        $sql = "UPDATE PKU.dbo.TAB_RM_17 SET FD_TGL_PEMBERIAN_OBAT=?,FS_JENIS_OBAT=?,FS_NAMA_OBAT =?, FS_DOSIS_OBAT =?,FS_RUTE=?,FS_INTERVAL=?,FS_KET=?,mdb=?,mdd=?,FS_KET2=? WHERE FS_KD_RM17 = ?";
        return $this->db->query($sql, $params);
    }

    function insert_catatan($params) {
        $sql = "INSERT INTO PKU.dbo.TAB_RM_17_1(FS_KD_RM17,FS_CHK_OBAT,FS_CHK_DOSIS,FS_CHK_PASIEN,FS_CHK_RUTE,FD_WAKTU,FS_KD_PEG,FS_KD_PEG2,
                FS_KD_PEG3,mdb,mdd)
                VALUES(?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_terapi($params) {
        $sql = "INSERT INTO PKU.dbo.TAB_PX_PULANG_TERAPI(FS_NM_OBAT,FS_DOSIS_OBAT,FS_FREK_OBAT,FS_KD_REG, mdb,mdd)
                VALUES(?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    // delete surat masuk
    function delete($params) {
        $sql = "DELETE FROM PKU.dbo.TAB_RM_17 WHERE FS_KD_RM17 = ?";
        return $this->db->query($sql, $params);
    }

    // delete surat masuk
    function delete_catatan($params) {
        $sql = "DELETE FROM PKU.dbo.TAB_RM_17_1 WHERE FS_KD_RM17_DETAIL = ?";
        return $this->db->query($sql, $params);
    }

    function get_rm17_detail_by_id($params) {
        $sql = "SELECT * FROM PKU.dbo.TAB_RM_17 WHERE FS_KD_RM17 = ?";
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
        $sql = "SELECT A.NO_REG,A.NO_MR,A.TGL_MULAI,B.NAMA_PASIEN,A.KODE_RUANG, B.JENIS_KELAMIN,B.ALAMAT,D.KODE_BANGSAL,C.NAMA_RUANG,D.NAMA_BANGSAL,E.KODEREKANAN,F.NAMAREKANAN ,B.TGL_LAHIR,datediff(year,B.TGL_LAHIR,GETDATE()) 'fn_umur'
        FROM TR_KAMAR A, REGISTER_PASIEN B, M_RUANG C, M_BANGSAL D, PENDAFTARAN E, REKANAN F 
        WHERE  A.NO_MR=B.NO_MR AND A.NO_REG=E.NO_REG AND E.KODEREKANAN=F.KODEREKANAN AND A.KODE_RUANG=C.KODE_RUANG AND C.KODE_BANGSAL=D.KODE_BANGSAL AND A.NO_REG = ?  ORDER BY D.KODE_BANGSAL,A.TGL_MULAI";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
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

    function get_perawat($params) {
        $sql = "SELECT NAMAUSER,NAMALENGKAP
               FROM DB_RSMM.dbo.TUSER 
               ORDER BY NAMALENGKAP ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }

    function get_obat($params) {
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

    function get_catatan_obat_by_rg($params) {
        $sql = "SELECT a.*,b.FS_KD_REG FROM PKU.dbo.TAB_RM_17_1 a
                LEFT JOIN PKU.dbo.TAB_RM_17 b ON a.FS_KD_RM17 = b.FS_KD_RM17
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
        $sql = "SELECT COUNT(*) 'TOTAL'  FROM PKU.dbo.TAB_PX_PULANG_TERAPI 
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
                FROM PKU.dbo.TAB_RM_17 a
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
        $sql = "SELECT a.*,b.*,c.NAMALENGKAP,d.NAMALENGKAP 'FS_NM_PEG2',e.NAMALENGKAP 'FS_NM_PEG3' 
                FROM PKU.dbo.TAB_RM_17 a
                LEFT JOIN PKU.dbo.TAB_RM_17_1 b ON a.FS_KD_RM17=b.FS_KD_RM17 
                LEFT JOIN DB_RSMM.dbo.TUSER c ON b.FS_KD_PEG=c.NAMAUSER
                LEFT JOIN DB_RSMM.dbo.TUSER d ON b.FS_KD_PEG2=d.NAMAUSER
                LEFT JOIN DB_RSMM.dbo.TUSER e ON b.FS_KD_PEG3=e.NAMAUSER
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
        $sql = "SELECT * FROM HOSPITAL.dbo.TA_LAYANAN WHERE FS_KD_LAYANAN LIKE 'P%' ORDER BY FS_NM_LAYANAN ASC";
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
        $sql = "SELECT * FROM PKU.dbo.TAB_RM_17 WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            return $result;
        } else {
            return 0;
        }
    }

    function get_all_rm17_by_rg($params) {
        $sql = "SELECT * FROM PKU.dbo.TAB_RM_17 WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }

    function get_rm17_by_id($params) {
        $sql = "SELECT * FROM PKU.dbo.TAB_RM_17 WHERE FS_KD_RM17 = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            return $result;
        } else {
            return 0;
        }
    }

    function cek_nama_obat_by_rg($params) {
        $sql = "SELECT * FROM PKU.dbo.TAB_RM_17 WHERE FS_KD_REG = ? AND FS_NAMA_OBAT = ? AND FS_DOSIS_OBAT=?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            return $result;
        } else {
            return 0;
        }
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

}
