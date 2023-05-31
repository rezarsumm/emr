<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_kep extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_last_inserted_id() {
        return $this->db->insert_id();
    }

    function insert($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_RI_RENC_KEP(FS_KD_REG, FS_KD_DAFTAR_DIAGNOSA, FS_KD_NOC, FD_TGL_DICAPAI, FD_JAM_DICAPAI, FS_KD_INDIKATOR, FS_KD_NIC, mdb, 
        mdd, mdd_time)
        VALUES (?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }
    
    function insert_rincian_px($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_RI_RENC_KEP2(FS_KD_RENC_KEP, FS_KD_NIC2)
        VALUES (?,?)";
        return $this->db->query($sql, $params);
    }
    
    function insert_diagnosa($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_COM_DAFTAR_DIAG(FS_NM_DIAGNOSA)
        VALUES(?)";
        return $this->db->query($sql, $params);
    }

    function insert_noc($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_COM_NOC(FS_KD_DAFTAR_DIAGNOSA, FS_NM_NOC)
        VALUEs (?,?)";
        return $this->db->query($sql, $params);
    }
    
    function insert_indikator($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_COM_INDIKATOR(FS_KD_DAFTAR_DIAGNOSA, FS_KD_NOC, FS_NM_INDIKATOR)
        VALUEs (?,?,?)";
        return $this->db->query($sql, $params);
    }
    
    function insert_perencanaan($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_COM_NIC(FS_KD_DAFTAR_DIAGNOSA, FS_KD_NOC, FS_KD_INDIKATOR, FS_NM_NIC)
        VALUEs (?,?,?,?)";
        return $this->db->query($sql, $params);
    }
    
    function insert_rincian($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_COM_NIC2(FS_KD_DAFTAR_DIAGNOSA, FS_KD_NOC, FS_KD_INDIKATOR, FS_KD_NIC, FS_NM_NIC2)
        VALUEs (?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }
    
    function insert_tindakan_kep($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_RI_TIND_KEP(FS_KD_REG, FS_TINDKAN_KEP, FD_TGL_TINDKAN_KEP, FD_JAM_TINDKAN_KEP, mdb, mdd, mdd_time,FS_KD_TRS_KEP_TINDAKAN)
        VALUES (?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }
    
    function update_diagnosa($params) {
        $sql = "UPDATE PKU.dbo.TAC_COM_DAFTAR_DIAG SET FS_NM_DIAGNOSA = ? WHERE FS_KD_DAFTAR_DIAGNOSA = ?";
        return $this->db->query($sql, $params);
    }
    
    function update_noc($params) {
        $sql = "UPDATE PKU.dbo.TAC_COM_NOC SET FS_KD_DAFTAR_DIAGNOSA = ? ,FS_NM_NOC=? WHERE FS_KD_NOC = ?";
        return $this->db->query($sql, $params);
    }
    
    function update_indikator($params) {
        $sql = "UPDATE PKU.dbo.TAC_COM_INDIKATOR SET FS_KD_DAFTAR_DIAGNOSA = ? ,FS_KD_NOC=?,FS_NM_INDIKATOR=? WHERE FS_KD_INDIKATOR = ?";
        return $this->db->query($sql, $params);
    }
    
    function update_perencanaan($params) {
        $sql = "UPDATE PKU.dbo.TAC_COM_NIC SET FS_KD_DAFTAR_DIAGNOSA = ? ,FS_KD_NOC=?,FS_KD_INDIKATOR=?,FS_NM_NIC=? WHERE FS_KD_NIC = ?";
        return $this->db->query($sql, $params);
    }
    
    function update_rincian($params) {
        $sql = "UPDATE PKU.dbo.TAC_COM_NIC2 SET FS_KD_DAFTAR_DIAGNOSA = ? ,FS_KD_NOC=?,FS_KD_INDIKATOR=?,FS_KD_NIC=?,FS_NM_NIC2=? WHERE FS_KD_NIC2 = ?";
        return $this->db->query($sql, $params);
    }

    function delete_diagnosa($params) {
        $sql = "DELETE PKU.dbo.TAC_COM_DAFTAR_DIAG 
        WHERE FS_KD_DAFTAR_DIAGNOSA = ?";
        return $this->db->query($sql, $params);
    }
    
    function delete_noc($params) {
        $sql = "DELETE PKU.dbo.TAC_COM_NOC 
        WHERE FS_KD_NOC = ?";
        return $this->db->query($sql, $params);
    }
    
    function delete_indikator($params) {
        $sql = "DELETE PKU.dbo.TAC_COM_INDIKATOR 
        WHERE FS_KD_INDIKATOR = ?";
        return $this->db->query($sql, $params);
    }
    
    function delete_perencanaan($params) {
        $sql = "DELETE PKU.dbo.TAC_COM_NIC 
        WHERE FS_KD_NIC = ?";
        return $this->db->query($sql, $params);
    }
    
    function delete_rincian($params) {
        $sql = "DELETE PKU.dbo.TAC_COM_NIC2 
        WHERE FS_KD_NIC2 = ?";
        return $this->db->query($sql, $params);
    }
    
    function delete($params) {
        $sql = "DELETE PKU.dbo.TAC_RI_RENC_KEP2 
        WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }
    
    // get site data
    function get_layanan($params) {
        $sql = "SELECT a.FS_KD_LAYANAN,a.FS_NM_LAYANAN FROM
        HOSPITAL.dbo.TA_LAYANAN a
        WHERE a.FS_KD_INSTALASI = 'RJ' AND a.FB_AKTIF = '1'
        ORDER BY a.FS_NM_LAYANAN ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function cek_ass_jatuh($params) {
        $sql = "SELECT FS_KD_REG FROM PKU.dbo.TAC_RI_JATUH2 WHERE FS_KD_REG = ?";
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

    function get_diagnosa($params) {
        $sql = "SELECT * FROM
        PKU.dbo.TAC_COM_DAFTAR_DIAG
        ORDER BY FS_NM_DIAGNOSA ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    function get_daftar_diag($params) {
        $sql = "SELECT * FROM
        PKU.dbo.TAC_COM_DAFTAR_DIAG
        WHERE FS_KD_ASES = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_daftar_noc($params) {
        $sql = "SELECT * FROM
        PKU.dbo.TAC_COM_NOC
        WHERE FS_KD_DAFTAR_DIAGNOSA = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_daftar_indikator($params) {
        $sql = "SELECT * FROM
        PKU.dbo.TAC_COM_INDIKATOR
        WHERE FS_KD_NOC = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_daftar_nic($params) {
        $sql = "SELECT *
        FROM PKU.dbo.TAC_COM_NIC 
        WHERE FS_KD_INDIKATOR = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }

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
    
    
    function get_daftar_nic2($params) {
        $sql = "SELECT *
        FROM PKU.dbo.TAC_COM_NIC2
        WHERE FS_KD_NIC = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    
    function get_diagnosa_by_id($params) {
        $sql = "SELECT *
        FROM PKU.dbo.TAC_COM_DAFTAR_DIAG
        WHERE FS_KD_DAFTAR_DIAGNOSA = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_noc($params) {
        $sql = "SELECT *
        FROM PKU.dbo.TAC_COM_NOC a
        INNER JOIN PKU.dbo.TAC_COM_DAFTAR_DIAG b ON a.FS_KD_DAFTAR_DIAGNOSA=b.FS_KD_DAFTAR_DIAGNOSA
        ORDER BY b.FS_NM_DIAGNOSA ASC ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_noc_by_id($params) {
        $sql = "SELECT *
        FROM COM_NOC a
        INNER JOIN PKU.dbo.TAC_COM_DAFTAR_DIAG b ON a.FS_KD_DAFTAR_DIAGNOSA=b.FS_KD_DAFTAR_DIAGNOSA
        WHERE a.FS_KD_NOC = ?
        ORDER BY b.FS_NM_DIAGNOSA ASC ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_indikator($params) {
        $sql = "SELECT *
        FROM PKU.dbo.TAC_COM_INDIKATOR a
        INNER JOIN PKU.dbo.TAC_COM_NOC b ON a.FS_KD_NOC=b.FS_KD_NOC
        INNER JOIN PKU.dbo.TAC_COM_DAFTAR_DIAG c ON a.FS_KD_DAFTAR_DIAGNOSA=c.FS_KD_DAFTAR_DIAGNOSA
        ORDER BY c.FS_NM_DIAGNOSA ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_indikator_by_id($params) {
        $sql = "SELECT *
        FROM PKU.dbo.TAC_COM_INDIKATOR a
        INNER JOIN PKU.dbo.TAC_COM_NOC b ON a.FS_KD_NOC=b.FS_KD_NOC
        INNER JOIN PKU.dbo.TAC_COM_DAFTAR_DIAG c ON c.FS_KD_DAFTAR_DIAGNOSA=a.FS_KD_DAFTAR_DIAGNOSA
        WHERE a.FS_KD_INDIKATOR=?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_perencanaan($params) {
        $sql = "SELECT *
        FROM PKU.dbo.TAC_COM_NIC a
        INNER JOIN PKU.dbo.TAC_COM_INDIKATOR b ON a.FS_KD_INDIKATOR=b.FS_KD_INDIKATOR
        INNER JOIN PKU.dbo.TAC_COM_NOC c ON a.FS_KD_NOC=c.FS_KD_NOC
        INNER JOIN PKU.dbo.TAC_COM_DAFTAR_DIAG d ON a.FS_KD_DAFTAR_DIAGNOSA=d.FS_KD_DAFTAR_DIAGNOSA
        ORDER BY d.FS_NM_DIAGNOSA ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_perencanaan_by_id($params) {
        $sql = "SELECT *
        FROM PKU.dbo.TAC_COM_NIC a
        INNER JOIN PKU.dbo.TAC_COM_INDIKATOR b ON a.FS_KD_INDIKATOR=b.FS_KD_INDIKATOR
        INNER JOIN PKU.dbo.TAC_COM_NOC c ON a.FS_KD_NOC=c.FS_KD_NOC
        INNER JOIN PKU.dbo.TAC_COM_DAFTAR_DIAG d ON a.FS_KD_DAFTAR_DIAGNOSA=d.FS_KD_DAFTAR_DIAGNOSA
        WHERE FS_KD_NIC = ?
        ORDER BY d.FS_NM_DIAGNOSA ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_rincian($params) {
        $sql = "SELECT *
        FROM PKU.dbo.TAC_COM_NIC2 a
        INNER JOIN PKU.dbo.TAC_COM_NIC b ON a.FS_KD_NIC=b.FS_KD_NIC
        INNER JOIN PKU.dbo.TAC_COM_INDIKATOR c ON a.FS_KD_INDIKATOR=c.FS_KD_INDIKATOR
        INNER JOIN PKU.dbo.TAC_COM_NOC d ON a.FS_KD_NOC=d.FS_KD_NOC
        INNER JOIN PKU.dbo.TAC_COM_DAFTAR_DIAG e ON a.FS_KD_DAFTAR_DIAGNOSA=e.FS_KD_DAFTAR_DIAGNOSA
        ORDER BY e.FS_NM_DIAGNOSA ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_rincian_by_id($params) {
        $sql = "SELECT *
        FROM PKU.dbo.TAC_COM_NIC2 a
        INNER JOIN PKU.dbo.TAC_COM_NIC b ON a.FS_KD_NIC=b.FS_KD_NIC
        INNER JOIN PKU.dbo.TAC_COM_INDIKATOR c ON a.FS_KD_INDIKATOR=c.FS_KD_INDIKATOR
        INNER JOIN PKU.dbo.TAC_COM_NOC d ON a.FS_KD_NOC=d.FS_KD_NOC
        INNER JOIN PKU.dbo.TAC_COM_DAFTAR_DIAG e ON a.FS_KD_DAFTAR_DIAGNOSA=e.FS_KD_DAFTAR_DIAGNOSA
        WHERE a.FS_KD_NIC2=?
        ORDER BY e.FS_NM_DIAGNOSA ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    
    function get_rm_px_by_rg($params) {
        $sql = "SELECT FS_MR
        FROM HOSPITAL.dbo.TA_REGISTRASI
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

    function get_rencana_kep_by_rg($params) {
        $sql = "SELECT a.*,FS_NM_DIAGNOSA,FS_NM_NOC,FS_NM_INDIKATOR,FS_NM_NIC,NAMALENGKAP
        FROM PKU.dbo.TAC_RI_RENC_KEP a
        INNER JOIN PKU.dbo.TAC_COM_NIC d ON a.FS_KD_NIC=d.FS_KD_NIC
        INNER JOIN PKU.dbo.TAC_COM_INDIKATOR e ON a.FS_KD_INDIKATOR=e.FS_KD_INDIKATOR
        INNER JOIN PKU.dbo.TAC_COM_NOC f ON a.FS_KD_NOC=f.FS_KD_NOC
        INNER JOIN PKU.dbo.TAC_COM_DAFTAR_DIAG g ON a.FS_KD_DAFTAR_DIAGNOSA=g.FS_KD_DAFTAR_DIAGNOSA
        LEFT JOIN DB_RSMM.dbo.TUSER h ON a.mdb=h.NAMAUSER
        WHERE a.FS_KD_REG=?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_rincian_kep_by_id($params) {
        $sql = "SELECT *
        FROM PKU.dbo.TAC_RI_RENC_KEP2 a
        LEFT JOIN PKU.dbo.TAC_COM_NIC2 b ON a.FS_KD_NIC2=b.FS_KD_NIC2
        WHERE FS_KD_RENC_KEP = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_tindakan_kep_by_rg($params) {
        $sql = "SELECT a.*,b.NAMALENGKAP,c.FS_NM_KEP_TINDAKAN
        FROM PKU.dbo.TAC_RI_TIND_KEP a
        LEFT JOIN DB_RSMM.dbo.TUSER b ON a.mdb=b.NAMAUSER
        LEFT JOIN PKU.dbo.TAC_COM_KEP_TINDAKAN c ON a.FS_KD_TRS_KEP_TINDAKAN=c.FS_KD_TRS
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
    function get_data_kebidanan_by_rg($params) {
        $sql = "SELECT *
        FROM RI_ASES_KEBID
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

    function get_data_masalah_by_rg($params) {
        $sql = "SELECT FS_NM_MASALAH_KEP 
        FROM RI_MASALAH_KEP a 
        LEFT JOIN COM_PARAM_MASALAH_KEP b ON a.FS_KD_MASALAH_KEP=b.FS_KD_TRS
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

    function get_data_jatuh_by_rg($params) {
        $sql = "SELECT *
        FROM RI_JATUH
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

    function get_data_ases2_by_rg($params) {
        $sql = "SELECT *
        FROM RI_ASES_PER2
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

    function get_masalah_kep_by_rg($params) {
        $sql = "SELECT FS_NM_DIAGNOSA
        FROM PKU.dbo.TAC_RI_MASALAH_KEP a
        LEFT JOIN PKU.dbo.TAC_COM_DAFTAR_DIAG b ON a.FS_KD_MASALAH_KEP=b.FS_KD_DAFTAR_DIAGNOSA
        WHERE a.FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_data_medis_by_rg($params) {
        $sql = "SELECT a.*,c.FS_NM_PEG,b.user_name
        FROM RI_MEDIS a
        LEFT JOIN COM_USER b ON a.mdb=b.user_id
        LEFT JOIN HOSPITAL.dbo.TD_PEG c ON b.user_name=c.FS_KD_PEG
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

    function get_data_medis_by_rg2($params) {
        $sql = "SELECT a.*,c.FS_NM_PEG,b.user_name,c.FS_NO_IJIN_PRAKTEK,d.FD_TGL_RUJUKAN
        FROM RI_MEDIS a
        LEFT JOIN COM_USER b ON a.mdb=b.user_id
        LEFT JOIN HOSPITAL.dbo.TD_PEG c ON b.user_name=c.FS_KD_PEG
        LEFT JOIN HOSPITAL.dbo.TA_TRS_SEP d ON a.FS_KD_REG = d.FS_KD_REG
        WHERE a.FS_KD_REG = ? AND a.FS_KD_TRS = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_data_medis_hd_by_rg2($params) {
        $sql = "SELECT a.*,c.FS_NM_PEG,b.user_name,c.FS_NO_IJIN_PRAKTEK,d.FD_TGL_RUJUKAN,e.*
        FROM RI_MEDIS a
        LEFT JOIN COM_USER b ON a.mdb=b.user_id
        LEFT JOIN HOSPITAL.dbo.TD_PEG c ON b.user_name=c.FS_KD_PEG
        LEFT JOIN HOSPITAL.dbo.TA_TRS_SEP d ON a.FS_KD_REG = d.FS_KD_REG
        LEFT JOIN HD_INSTRUKSI_MEDIS e ON a.FS_KD_REG=e.FS_KD_REG
        WHERE a.FS_KD_REG = ? AND a.FS_KD_TRS = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_data_instruksi_medis_hd_by_rg($params) {
        $sql = "SELECT *
        FROM HD_INSTRUKSI_MEDIS
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

    function get_data_skdp_by_rg($params) {
        $sql = "SELECT a.*,b.FS_NM_SKDP_ALASAN,c.FS_NM_SKDP_RENCANA
        FROM RI_SKDP a
        LEFT JOIN COM_PARAMETER_SKDP_ALASAN b ON a.FS_SKDP_1=b.FS_KD_TRS
        LEFT JOIN COM_PARAMETER_SKDP_RENCANA c ON a.FS_SKDP_2=c.FS_KD_TRS
        WHERE a.FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_data_prb_by_rg($params) {
        $sql = "SELECT FS_PROVIDER,FD_TGL_RUJUKAN
        FROM HOSPITAL.dbo.TA_TRS_SEP
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

    function get_data_terapi_by_rg($params) {
        $sql = "SELECT FS_NM_BARANG,FN_QTY_BARANG,FS_NM_SATUAN,FS_NM_CARAPAKAI_ETIKET,FS_ETIKET_QTY, 
        FS_ETIKET_HARI,FS_NM_CARAPAKAI_ETIKET,FS_NM_SATUANPAKAI_ETIKET,FS_ETIKET_CATATAN,FS_ETIKET 
        FROM HOSPITAL.dbo.TB_TRS_DOBILL_UMUM a
        LEFT JOIN HOSPITAL.dbo.TB_TRS_DOBILL_UMUM2 b ON a.FS_KD_TRS=b.FS_KD_TRS 
        LEFT JOIN HOSPITAL.dbo.TB_CARAPAKAI_ETIKET c ON b.FS_ETIKET_KD_PAKAI=c.FS_KD_CARAPAKAI_ETIKET 
        LEFT JOIN HOSPITAL.dbo.TB_SATUANPAKAI_ETIKET d ON b.FS_ETIKET_KD_SATUAN_PAKAI=d.FS_KD_SATUANPAKAI_ETIKET 
        WHERE a.FS_KD_REG = ? AND (a.FS_KD_LAYANAN = 'O004' OR a.FS_KD_LAYANAN = 'O005') AND FS_JAM_VOID <> '3000-01-01'
        ORDER BY FN_NO_URUT";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_data_lab_by_rg($params) {
        $sql = " select     aa.fs_kd_trs, aa.fd_tgl_trs, cc.FS_NM_TARIF, bb.fs_kd_jenis_pemeriksaan, dd.fs_nm_jenis_pemeriksaan, 
        dd.FS_SATUAN , bb.FS_HASIL, bb.FS_KETERANGAN, bb.fb_verifikasi_jenis 
        from       HOSPITAL.dbo.TA_TRS_TDK_UMUM aa 
        inner join HOSPITAL.dbo.TA_TRS_TDK_UMUM5 bb on aa.fs_kd_trs = bb.FS_KD_TRS 
        and bb.FS_HASIL <> '' and bb.FS_HASIL <> 'HASIL MENYUSUL' 
        left join  HOSPITAL.dbo.TA_TARIF cc on bb.FS_KD_TARIF = cc.FS_KD_TARIF 
        left join  HOSPITAL.dbo.TA_JENIS_PEMERIKSAAN dd on bb.FS_KD_JENIS_PEMERIKSAAN = dd.fs_kd_jenis_pemeriksaan 
        where      aa.fd_tgl_void = '3000-01-01' 
        AND aa.fs_kd_reg = ? order by aa.fs_kd_trs ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_data_rad_by_rg($params) {
        $sql = "  select     aa.fs_kd_trs, bb.fd_tgl_keterangan, bb.fs_jam_keterangan, cc.FS_NM_TARIF, bb.fs_keterangan 
        from       HOSPITAL.dbo.TA_TRS_TDK_UMUM aa 
        left join  HOSPITAL.dbo.TA_TRS_TDK_UMUM2 bb on aa.fs_kd_trs = bb.fs_kd_trs and fs_keterangan <> '' 
        left join  HOSPITAL.dbo.TA_TARIF cc on bb.fs_kd_tarif = cc.fs_kd_tarif 
        where      aa.fd_tgl_void = '3000-01-01' and bb.fb_void = 0 
        AND aa.fs_kd_reg = ? order by bb.fs_kd_trs2 ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
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

    function get_cek_rm($params) {
        $sql = "SELECT FS_KD_REG  FROM RI_MEDIS WHERE FS_KD_REG= ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_tac_com_parameter_alasan($params) {
        $sql = "SELECT *  FROM COM_PARAMETER_SKDP_ALASAN";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function list_planning($params) {
        $sql = "SELECT * FROM COM_PARAM_PLANNING";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function list_spiritual($params) {
        $sql = "SELECT * FROM COM_PARAM_SPIRITUAL";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function list_edukasi($params) {
        $sql = "SELECT * FROM COM_PARAM_EDUKASI";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function list_masalah_kep_by_rg($params) {
        $sql = "SELECT * FROM RI_MASALAH_KEP WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function list_rencana_kep_by_rg($params) {
        $sql = "SELECT * FROM RI_REN_KEP WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    function list_keb_spiritual_by_rg($params) {
        $sql = "SELECT FS_KD_SPIRITUAL
        FROM RI_SPIRITUAL
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
    function list_edukasi_by_rg($params) {
        $sql = "SELECT FS_KD_EDUKASI
        FROM RI_EDUKASI
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
    function list_planning_by_rg($params) {
        $sql = "SELECT FS_KD_PLANNING
        FROM RI_PLANNING
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
    
    function list_kep_tindakan_by_rg($params) {
        $sql = "SELECT *
        FROM PKU.dbo.TAC_COM_KEP_TINDAKAN
        ORDER BY FS_NM_KEP_TINDAKAN";
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
