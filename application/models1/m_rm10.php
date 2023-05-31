<?php

class m_rm10 extends CI_Model {

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
        $sql = "INSERT      
                INTO PKU.dbo.TAB_RM_10(FS_KD_REG, FS_BAHASA1, FS_BAHASA2, FS_TIPE_BAHASA1, FS_TIPE_BAHASA2, FS_NILAI, FS_NILAI2, FS_MEMBACA, FS_HAMBATAN_EMOSI, 
                FS_HAMBATAN_EMOSI2, FS_KETERBATASAN_FISIK, FS_KETERBATASAN_FISIK2, FS_KETERBATASAN_KOGNITIF, FS_KETERBATASAN_KOGNITIF2, 
                FS_MENERIMA_INFO, mdb, mdd)
                VALUES     (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function update($params) {
        $sql = "UPDATE PKU.dbo.TAB_RM_10 SET FS_BAHASA1=?,FS_BAHASA2=?,FS_TIPE_BAHASA1 =?, FS_TIPE_BAHASA2 =?, FS_NILAI =?, FS_NILAI2 =?, FS_MEMBACA =?, FS_HAMBATAN_EMOSI =?, 
                FS_HAMBATAN_EMOSI2 =?, FS_KETERBATASAN_FISIK =?, FS_KETERBATASAN_FISIK2 =?, FS_KETERBATASAN_KOGNITIF =?, FS_KETERBATASAN_KOGNITIF2 =?, 
                FS_MENERIMA_INFO =?,mdd=? WHERE FS_RM_10 = ?";
        return $this->db->query($sql, $params);
    }

    function insert_catatan($params) {
        $sql = "INSERT INTO PKU.dbo.TAB_RM_10_1(FS_KD_REG,FS_TOPIK,FS_DIBERIKAN,FS_TANGGAL,FS_KEBUTUHAN,FS_TUJUAN,FS_KEMAMPUAN,FS_KESIAPAN,
                FS_HAMBATAN,FS_INTERVENSI,FS_METODE,FS_HASIL,FS_JAM_MULAI,FS_JAM_SELESAI,FS_EDUKASI,mdb,mdd)
                VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }
    function update_catatan($params) {
        $sql = "UPDATE PKU.dbo.TAB_RM_10_1 SET FS_TOPIK = ?,FS_DIBERIKAN= ?,FS_TANGGAL= ?,FS_KEBUTUHAN= ?,FS_TUJUAN= ?,FS_KEMAMPUAN= ?,FS_KESIAPAN= ?,
                FS_HAMBATAN= ?,FS_INTERVENSI= ?,FS_METODE= ?,FS_HASIL= ?,FS_CATATAN= ?,FS_JAM_MULAI= ?,FS_JAM_SELESAI= ?,mdd= ?
                WHERE FS_KD_RM_10_1 = ?";
        return $this->db->query($sql, $params);
    }

    function get_catatan_by_rg($params) {
        $sql = "SELECT * FROM PKU.dbo.TAB_RM_10_1 WHERE FS_KD_REG = ? ORDER BY FS_KD_RM_10_1 ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    // delete surat masuk
    function delete_catatan($params) {
        $sql = "DELETE FROM PKU.dbo.TAB_RM_10_1 WHERE FS_KD_RM_10_1 = ?";
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

    function get_all_resume($params) {
        $sql = "SELECT FS_KD_REG FROM PKU.dbo.TAB_RM_10 WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            return $result;
        } else {
            return 0;
        }
    }
    function cek_rm10($params) {
        $sql = "SELECT FS_KD_REG FROM PKU.dbo.TAB_RM_10 WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            return $result;
        } else {
            return 0;
        }
    }

    function get_rm10_by_rg($params) {
        $sql = "SELECT a.*,b.* FROM PKU.dbo.TAB_RM_10 a
                LEFT JOIN PKU.dbo.TAB_RM_10_1 b ON a.FS_KD_REG=b.FS_KD_REG
                WHERE a.FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            return $result;
        } else {
            return 0;
        }
    }
    function get_rm10_1_by_rg($params) {
        $sql = "SELECT a.*,b.* FROM PKU.dbo.TAB_RM_10 a
                LEFT JOIN PKU.dbo.TAB_RM_10_1 b ON a.FS_KD_REG=b.FS_KD_REG
                WHERE b.FS_KD_RM_10_1 = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            return $result;
        } else {
            return 0;
        }
    }

    function get_rm10_by_rg_all($params) {
        $sql = "SELECT a.*,b.*,d.NAMALENGKAP,c.user_name,d.NAMALENGKAP FROM PKU.dbo.TAB_RM_10 a
                LEFT JOIN PKU.dbo.TAB_RM_10_1 b ON a.FS_KD_REG=b.FS_KD_REG
                LEFT JOIN PKU.dbo.TAC_COM_USER c ON b.mdb=c.user_id
                LEFT JOIN DB_RSMM.dbo.TUSER d ON c.user_name=d.NAMAUSER
                WHERE a.FS_KD_REG = ?";
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
