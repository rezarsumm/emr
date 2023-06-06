<?php

if (!defined('BASEPATH')) 
    exit('No direct script access allowed');

class m_rawat_inap extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_last_inserted_id() {
        return $this->db->insert_id();
    } 

    function insert($params) {
        $sql = "INSERT 
        INTO PKU.dbo.TAC_RI_MEDIS(FS_KD_KP, FS_KD_REG, FS_DIAGNOSA, FS_ANAMNESA, FS_TINDAKAN, FS_TERAPI, FS_CATATAN_FISIK, FS_KD_MEDIS, 
        FS_CARA_PULANG, FS_DAFTAR_MASALAH, FS_PLANNING_LAB, FS_PLANNING_RAD, FS_HASIL_PEMERIKSAAN_PENUNJANG,FS_PESAN,FS_MR, FS_STATUS, mdb, mdd, FS_JAM_TRS)
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
        
    } 
    function update($params) {

        $sql = "UPDATE PKU.dbo.TAC_RI_MEDIS SET FS_DIAGNOSA=?, FS_ANAMNESA=?, FS_TINDAKAN=?, FS_TERAPI=?, FS_CATATAN_FISIK=?, 
        FS_CARA_PULANG=?, FS_DAFTAR_MASALAH=?, FS_PLANNING_LAB=?,FS_PLANNING_RAD=?, FS_HASIL_PEMERIKSAAN_PENUNJANG=?, FS_PESAN=? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

 
    
    function get_resume_by_rg($params) { 
        $sql = "SELECT a.*,b.NAMABAGIAN,c.NAMABAGIAN AS 'FS_NM_LAYANAN2' ,d.user_name'created',
        e.user_name 'edited'
        FROM PKU.dbo.TAB_PX_PULANG_RESUME a
        LEFT JOIN DBHOSPITAL.dbo.BAGIAN b ON a.FS_KD_LAYANAN=b.KODEBAGIAN
        LEFT JOIN DBHOSPITAL.dbo.BAGIAN c ON a.FS_KD_LAYANAN2=c.KODEBAGIAN
        LEFT JOIN PKU.dbo.TAC_COM_USER d ON a.mdb=d.user_id
        LEFT JOIN PKU.dbo.TAC_COM_USER e ON a.mdb_update=e.user_id
        LEFT JOIN DBHOSPITAL.dbo.USERLOG f ON a.FS_VERIF_DOKTER=f.USLOGNM
        WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            return $result;
        } else {
            return 0;
        }
    }
    
    function get_pasien_bangsal($params) {
        $sql = "SELECT A.NO_REG,A.NO_MR,A.TGL_MULAI,B.NAMA_PASIEN,A.KODE_RUANG, B.JENIS_KELAMIN,B.ALAMAT,D.KODE_BANGSAL,C.NAMA_RUANG,D.NAMA_BANGSAL,E.KODEREKANAN,F.NAMAREKANAN,B.ALAMAT
        FROM TR_KAMAR A, REGISTER_PASIEN B, M_RUANG C, M_BANGSAL D, PENDAFTARAN E, REKANAN F 
        WHERE A.NO_MR=B.NO_MR AND A.NO_REG=E.NO_REG AND E.KODEREKANAN=F.KODEREKANAN 
        AND A.KODE_RUANG=C.KODE_RUANG AND C.KODE_BANGSAL=D.KODE_BANGSAL AND A.STATUS='1' AND E.STATUS='1' ORDER BY D.KODE_BANGSAL,A.TGL_MULAI";
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
        $sql = "SELECT A.NO_REG,A.NO_MR,A.TGL_MULAI,B.NAMA_PASIEN,A.KODE_RUANG, B.JENIS_KELAMIN,B.ALAMAT,D.KODE_BANGSAL,C.NAMA_RUANG,D.NAMA_BANGSAL,E.KODEREKANAN,F.NAMAREKANAN,B.ALAMAT
        FROM TR_KAMAR A, REGISTER_PASIEN B, M_RUANG C, M_BANGSAL D, PENDAFTARAN E, REKANAN F 
        WHERE A.NO_MR=B.NO_MR AND A.NO_REG=E.NO_REG AND E.KODEREKANAN=F.KODEREKANAN AND A.KODE_RUANG=C.KODE_RUANG AND C.KODE_BANGSAL=D.KODE_BANGSAL AND A.STATUS='1' AND E.STATUS='1' AND D.KODE_BANGSAL = ?
        ORDER BY D.KODE_BANGSAL,A.TGL_MULAI";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

      function get_pasien_bangsal_by_bangsal3($params) {
        $sql = "SELECT A.NO_REG,A.NO_MR,A.TGL_MULAI,B.NAMA_PASIEN,A.KODE_RUANG, B.JENIS_KELAMIN,B.ALAMAT,D.KODE_BANGSAL,C.NAMA_RUANG,D.NAMA_BANGSAL,E.KODEREKANAN,F.NAMAREKANAN,B.ALAMAT
        FROM TR_KAMAR A, REGISTER_PASIEN B, M_RUANG C, M_BANGSAL D, PENDAFTARAN E, REKANAN F 
        WHERE A.NO_MR=B.NO_MR AND A.NO_REG=E.NO_REG 
        AND E.KODEREKANAN=F.KODEREKANAN AND A.KODE_RUANG=C.KODE_RUANG AND C.KODE_BANGSAL=D.KODE_BANGSAL AND A.STATUS='1' AND E.STATUS='1' 
        ORDER BY D.KODE_BANGSAL,A.TGL_MULAI";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    // function get_pasien_bangsal_by_bangsal3($params) {
    //     $sql = "SELECT A.NO_REG,A.NO_MR,A.TGL_MULAI,B.NAMA_PASIEN,A.KODE_RUANG, B.JENIS_KELAMIN,B.ALAMAT,D.KODE_BANGSAL,C.NAMA_RUANG,D.NAMA_BANGSAL,E.KODEREKANAN,F.NAMAREKANAN,B.ALAMAT
    //     FROM TR_KAMAR A, REGISTER_PASIEN B, M_RUANG C, M_BANGSAL D, PENDAFTARAN E, REKANAN F 
    //     WHERE A.NO_MR=B.NO_MR AND A.NO_REG=E.NO_REG AND E.KODEREKANAN=F.KODEREKANAN AND A.KODE_RUANG=C.KODE_RUANG AND C.KODE_BANGSAL=D.KODE_BANGSAL AND A.STATUS='1' AND E.STATUS='1' 
    //     ORDER BY D.KODE_BANGSAL,A.TGL_MULAI";
    //     $query = $this->db->query($sql, $params);
    //     if ($query->num_rows() > 0) {
    //         $result = $query->result_array();
    //         $query->free_result();
    //         return $result;
    //     } else {
    //         return array();
    //     }
    // }


    function get_pasien_ugd() {
         $date = date('Y-m-d');

         $sql = "SELECT E.NO_REG, B.NO_MR, B.NAMA_PASIEN, B.TGL_LAHIR, B.JENIS_KELAMIN, B.ALAMAT
        FROM REGISTER_PASIEN B,  PENDAFTARAN E 
        WHERE B.NO_MR=E.NO_MR AND E.STATUS='0' and E.KODE_MASUK='1' and E.TANGGAL= '$date'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
  
    
    function cek_rawat_inap($params) {
        $sql = "SELECT FS_KD_REG FROM PKU.dbo.TAC_RI_MEDIS WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            return $result;
        } else {
            return 0;
        }
    }


    function cek_asesmen_awal_umum($params) {
        $sql = "SELECT FS_KD_REG FROM PKU.dbo.TAC_RI_MEDIS WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            return $result;
        } else {
            return 0;
        }
    }
    
    function get_data_ases2_by_rg($params) {
        $sql = "SELECT *
        FROM TAC_RI_ASES_PER2
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

  
  
    function list_masalah_kep_by_rg($params) {
        $sql = "SELECT FS_NM_MASALAH_KEP
        FROM TAC_RI_MASALAH_KEP a
        LEFT JOIN TAC_COM_PARAM_MASALAH_KEP b ON a.FS_KD_MASALAH_KEP=b.FS_KD_TRS
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
    
    function get_pasien_by_rg($params) {
        $sql = "SELECT A.NO_REG,A.NO_MR,A.TGL_MULAI,B.NAMA_PASIEN,A.KODE_RUANG, B.JENIS_KELAMIN,B.ALAMAT,D.KODE_BANGSAL,C.NAMA_RUANG,D.NAMA_BANGSAL,E.KODEREKANAN,F.NAMAREKANAN ,B.TGL_LAHIR
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

    function get_pasien_by_rg2($params) {
        $sql = "
        SELECT NO_REG,A.NO_MR,A.TANGGAL,B.NAMA_PASIEN,A.KODE_RUANG, B.JENIS_KELAMIN,B.ALAMAT,B.TGL_LAHIR
        FROM PENDAFTARAN A
        LEFT JOIN REGISTER_PASIEN B ON A.NO_MR=B.NO_MR 
        WHERE  NO_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    
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
    
    function get_diet_by_rg($params) {
        $sql = "SELECT a.FS_KD_PX_PULANG_DIET,FS_NM_DIET,a.FS_KD_DIET FROM PKU.dbo.TAB_PX_PULANG_RESUME_DIET a LEFT JOIN PKU.dbo.TAB_PX_PULANG_DIET b ON a.FS_KD_DIET=b.FS_KD_DIET WHERE a.FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }
    
    function get_indikasi_dirawat_by_rg($params) {
        $sql = "SELECT a.*,b.* FROM TAB_PX_PULANG_RESUME_INDIKASI_RAWAT a LEFT JOIN COM_PARAM_RM_40_INDIKASI_DIRAWAT b ON a.FS_KD_PARAM_INDIKASI_DIRAWAT=b.FS_KD_PARAM_INDIKASI_DIRAWAT WHERE a.FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }
    
    function get_diag_by_rg($params) {
        $sql = "SELECT * FROM TAB_PX_PULANG_RESUME_DIAG_SEK WHERE FS_KD_REG = ? ORDER BY FS_KD_DIAG_SEK ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function get_tind_by_rg($params) {
        $sql = "SELECT * FROM TAB_PX_PULANG_RESUME_TIND WHERE FS_KD_REG = ? ORDER BY FS_KD_TIND ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function get_terapi_by_rg($params) {
        $sql = "SELECT * FROM TAB_PX_PULANG_TERAPI WHERE FS_KD_REG = ? ORDER BY FS_KD_TERAPI ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    } 
    
    // function get_px_by_dokter_by_rg2($params) {
    //     $sql = "SELECT A.NO_REG,A.NO_MR,A.TGL_MULAI,B.NAMA_PASIEN,A.KODE_RUANG, B.JENIS_KELAMIN,B.ALAMAT,D.KODE_BANGSAL,C.NAMA_RUANG,D.NAMA_BANGSAL,E.KODEREKANAN,F.NAMAREKANAN ,B.TGL_LAHIR,E.TANGGAL,E.JAM,datediff(year,B.TGL_LAHIR,GETDATE()) 'fn_umur'
    //     FROM TR_KAMAR A, REGISTER_PASIEN B, M_RUANG C, M_BANGSAL D, PENDAFTARAN E, REKANAN F 
    //     WHERE  A.NO_MR=B.NO_MR AND A.NO_REG=E.NO_REG AND E.KODEREKANAN=F.KODEREKANAN AND A.KODE_RUANG=C.KODE_RUANG AND C.KODE_BANGSAL=D.KODE_BANGSAL AND A.NO_REG = ? AND A.STATUS='1' AND E.STATUS='1' ORDER BY D.KODE_BANGSAL,A.TGL_MULAI";
    //     $query = $this->db->query($sql, $params);
    //     if ($query->num_rows() > 0) {
    //         $result = $query->row_array();
    //         $query->free_result();
    //         return $result;
    //     } else {
    //         return 0;
    //     }
    // }


      function get_px_by_dokter_by_rg2($params) {
        $sql = "SELECT A.NO_REG,A.NO_MR,A.TGL_MULAI,B.NAMA_PASIEN,A.KODE_RUANG, B.JENIS_KELAMIN,B.ALAMAT,D.KODE_BANGSAL,C.NAMA_RUANG,D.NAMA_BANGSAL,E.KODEREKANAN,F.NAMAREKANAN ,B.TGL_LAHIR,E.TANGGAL,E.JAM,datediff(year,B.TGL_LAHIR,GETDATE()) 'fn_umur'
        FROM TR_KAMAR A, REGISTER_PASIEN B, M_RUANG C, M_BANGSAL D, PENDAFTARAN E, REKANAN F 
        WHERE  A.NO_MR=B.NO_MR AND A.NO_REG=E.NO_REG AND E.KODEREKANAN=F.KODEREKANAN 
        AND A.KODE_RUANG=C.KODE_RUANG AND C.KODE_BANGSAL=D.KODE_BANGSAL AND A.NO_REG = ? 
        order by A.Tgl_Mulai desc";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


    function get_data_medis_by_rg($params) {
        $sql = "SELECT *
        FROM PKU.dbo.TAC_RI_MEDIS
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


    
    function get_data_medis_by_rg21($params) {
        $sql = "SELECT a.*,c.Nama_Dokter,b.user_name,Kode_Dokter
        FROM PKU.dbo.TAC_RI_MEDIS a 
        LEFT JOIN PKU.dbo.TAC_COM_USER b ON a.mdb=b.user_id
        LEFT JOIN DB_RSMM.dbo.DOKTER c ON b.user_name=c.Kode_Dokter
        WHERE a.FS_KD_REG = ? and a.FS_KD_MEDIS in('216','217','215','213','202','219','220','221','312','222','223','224','225')"; 
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

 
    function update2($params) {

        $sql = "UPDATE PKU.dbo.TAC_RI_MEDIS SET FS_DIAGNOSA=?, FS_ANAMNESA=?, FS_TINDAKAN=?, FS_TERAPI=?, FS_CATATAN_FISIK=?, 
        FS_CARA_PULANG=?, FS_DAFTAR_MASALAH=?, FS_PLANNING_LAB=?,FS_PLANNING_RAD=?,
         FS_HASIL_PEMERIKSAAN_PENUNJANG=?, FS_PESAN=?, FS_RIW_PENYAKIT_DAHULU=?, FS_RIW_PENYAKIT_DAHULU2=?,
         FS_ALERGI=?, FS_REAK_ALERGI=?, FS_STATUS_PSIK=?, FS_HUB_KELUARGA=?, KONJUNGTIVA=?,
         DEVIASI=?, SKELERA=?, JVP=?, BIBIR=?, MUKOSA=?, THORAX=?, JANTUNG=?,
         ABDOMEN=?, PINGGANG=?, EKS_ATAS=?, EKS_BAWAH=?   WHERE FS_KD_REG = ? and FS_KD_MEDIS= ?";
        return $this->db->query($sql, $params);
    }



    
    function insert2($params) {
        $sql = "INSERT 
        INTO PKU.dbo.TAC_RI_MEDIS(FS_KD_KP, FS_KD_REG, FS_DIAGNOSA, FS_ANAMNESA, FS_TINDAKAN, FS_TERAPI, FS_CATATAN_FISIK, FS_KD_MEDIS, 
        FS_CARA_PULANG, FS_DAFTAR_MASALAH, FS_PLANNING_LAB, FS_PLANNING_RAD, FS_HASIL_PEMERIKSAAN_PENUNJANG,FS_STATUS, FS_MR, FS_PESAN, 
        FS_RIW_PENYAKIT_DAHULU, FS_RIW_PENYAKIT_DAHULU2,
         FS_ALERGI, FS_REAK_ALERGI, FS_STATUS_PSIK, FS_HUB_KELUARGA, KONJUNGTIVA,
         DEVIASI, SKELERA, JVP, BIBIR, MUKOSA, THORAX, JANTUNG,
         ABDOMEN, PINGGANG, EKS_ATAS, EKS_BAWAH,
           mdb, mdd, FS_JAM_TRS)
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    } 

    function get_data_medis_by_rg2($params) {
        $sql = "SELECT top 1 a.*,c.Nama_Dokter,b.user_name,Kode_Dokter
        FROM PKU.dbo.TAC_RI_MEDIS a 
        LEFT JOIN PKU.dbo.TAC_COM_USER b ON a.mdb=b.user_id
        LEFT JOIN DB_RSMM.dbo.DOKTER c ON b.user_name=c.Kode_Dokter
        WHERE a.FS_KD_REG = ?  order by a.FS_KD_TRS desc"; 
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
