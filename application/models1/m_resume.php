<?php

class m_resume extends CI_Model {

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
        $sql = "INSERT INTO PKU.dbo.TAB_PX_PULANG_RESUME (FS_KD_REG,FS_KELUHAN_UTAMA,FS_INDIKASI_DIRAWAT,FS_RIWAYAT_PENYAKIT,
                FS_PEMERIKSAAN_FISIK,FS_PEMERIKSAAN_PENUNJANG,FS_TERAPI,FS_HASIL_LAB,FS_ALERGI,FS_INSTRUKSI,FS_KD_LAYANAN,FD_TGL_KONTROL,
                FS_JAM_KONTROL,FS_DIAG_UTAMA,FS_KEADAAN_UMUM_BAIK,FS_KEADAAN_UMUM_MASIH_SAKIT,FS_KEADAAN_UMUM_SESAK,FS_KEADAAN_UMUM_PUCAT,
                FS_KEADAAN_UMUM_LEMAH,FS_KEADAAN_UMUM_LAIN,FS_SUHU,FS_NADI,FS_R,FS_TD,FS_CAT_HAL_PENTING,FS_CARA_PULANG,FS_STATUS,
                FS_MR,FS_PEM_FISIK1,FS_PEM_FISIK2,FS_PEM_FISIK3,FS_PEM_FISIK4,FS_PEM_FISIK5,FS_PEM_FISIK6,FS_PEM_FISIK7,FS_PEM_FISIK8,
                FS_INSTRUKSI1,FS_INSTRUKSI2,FS_INSTRUKSI3,FS_INSTRUKSI4,FS_INSTRUKSI5,FS_SUHU1,FS_NADI1,FS_R1,FS_TD1,FD_TGL_PULANG,FS_KD_LAYANAN2,FD_TGL_KONTROL2,
                FS_JAM_KONTROL2,FS_KET_INDIKASI,FS_KET_KONTROL,FS_KET_KONTROL2,FS_KET_CARA_PULANG,mdb,mdd,mdd_time)
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }
function insert_tac_rj_skdp($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_RJ_SKDP(FS_KD_REG, FS_SKDP_1, FS_SKDP_2,FS_SKDP_KET,FS_SKDP_KONTROL,FS_NO_SKDP, mdb, mdd, mdd_time)
                VALUES (?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }


    
    function update($params) {
        $sql = "UPDATE PKU.dbo.TAB_PX_PULANG_RESUME SET FS_KELUHAN_UTAMA =?,FS_INDIKASI_DIRAWAT =?,FS_RIWAYAT_PENYAKIT=?,
                FS_PEMERIKSAAN_FISIK =?,FS_PEMERIKSAAN_PENUNJANG =?,FS_TERAPI=?,FS_HASIL_LAB=?,FS_ALERGI=?,FS_INSTRUKSI=?,FS_KD_LAYANAN=?,FD_TGL_KONTROL=?,
                FS_JAM_KONTROL=?,FS_DIAG_UTAMA=?,FS_KEADAAN_UMUM_BAIK=?,FS_KEADAAN_UMUM_MASIH_SAKIT=?,FS_KEADAAN_UMUM_SESAK=?,FS_KEADAAN_UMUM_PUCAT=?,
                FS_KEADAAN_UMUM_LEMAH=?,FS_KEADAAN_UMUM_LAIN=?,FS_SUHU=?,FS_NADI=?,FS_R=?,FS_TD=?,FS_CAT_HAL_PENTING=?,FS_CARA_PULANG=?,FS_STATUS=?,
                FS_MR=?,FS_PEM_FISIK1=?,FS_PEM_FISIK2=?,FS_PEM_FISIK3=?,FS_PEM_FISIK4=?,FS_PEM_FISIK5=?,FS_PEM_FISIK6=?,FS_PEM_FISIK7=?,FS_PEM_FISIK8=?,
                FS_INSTRUKSI1=?,FS_INSTRUKSI2=?,FS_INSTRUKSI3=?,FS_INSTRUKSI4=?,FS_INSTRUKSI5=?,FS_SUHU1=?,FS_NADI1=?,FS_R1=?,FS_TD1=?,FD_TGL_PULANG=?,FS_KD_LAYANAN2=?,FD_TGL_KONTROL2=?,
                FS_JAM_KONTROL2=?,FS_KET_INDIKASI=?,FS_KET_KONTROL=?,FS_KET_KONTROL2=?,FS_KET_CARA_PULANG=?,mdb_update=?,mdd_update=?,mdd_time_update=? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function update_terapi($params) {
        $sql = "UPDATE PKU.dbo.TAB_PX_PULANG_TERAPI SET FS_NM_OBAT =?,FS_JML_OBAT =?,FS_DOSIS_OBAT=?,
                FS_FREK_OBAT =?,FS_CARA_PEM_OBAT =? WHERE FS_KD_TERAPI = ?";
        return $this->db->query($sql, $params);
    }

    function update_diagnosis($params) {
        $sql = "UPDATE PKU.dbo.TAB_PX_PULANG_RESUME_DIAG_SEK SET FS_NM_DIAG_SEK =? WHERE FS_KD_DIAG_SEK = ?";
        return $this->db->query($sql, $params);
    }

    function update_tindakan($params) {
        $sql = "UPDATE PKU.dbo.TAB_PX_PULANG_RESUME_TIND SET FS_NM_TIND =? WHERE FS_KD_TIND = ?";
        return $this->db->query($sql, $params);
    }

    function insert_terapi($params) {
        $sql = "INSERT INTO PKU.dbo.TAB_PX_PULANG_TERAPI(FS_NM_OBAT,FS_JML_OBAT,FS_DOSIS_OBAT,FS_FREK_OBAT,FS_CARA_PEM_OBAT,FS_KD_REG,mdb,mdd)
                VALUES(?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_diet($params) {
        $sql = "INSERT INTO PKU.dbo.TAB_PX_PULANG_RESUME_DIET(FS_KD_REG,FS_KD_DIET)
                VALUES(?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_indikasi_rawat($params) {
        $sql = "INSERT INTO PKU.dbo.TAB_PX_PULANG_RESUME_INDIKASI_RAWAT(FS_KD_REG,FS_KD_PARAM_INDIKASI_DIRAWAT)
                VALUES(?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_diag_sek($params) {
        $sql = "INSERT INTO PKU.dbo.TAB_PX_PULANG_RESUME_DIAG_SEK(FS_KD_REG,FS_NM_DIAG_SEK,ICD10,mdb,mdd)
                VALUES(?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_tind($params) {
        $sql = "INSERT INTO PKU.dbo.TAB_PX_PULANG_RESUME_TIND(FS_KD_REG,FS_NM_TIND,ICD9CM,mdb,mdd)
                VALUES(?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function get_terapi_by_rg($params) {
        $sql = "SELECT * FROM PKU.dbo.TAB_PX_PULANG_TERAPI WHERE FS_KD_REG = ? ORDER BY FS_KD_TERAPI ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_terapi_by_rg2($params) {
        $sql = "SELECT * FROM PKU.dbo.TAB_PX_PULANG_TERAPI WHERE FS_KD_TERAPI = ? ORDER BY FS_KD_TERAPI ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_diag_by_rg($params) {
        $sql = "SELECT * FROM PKU.dbo.TAB_PX_PULANG_RESUME_DIAG_SEK WHERE FS_KD_REG = ? ORDER BY FS_KD_DIAG_SEK ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_diag_by_rg2($params) {
        $sql = "SELECT * FROM PKU.dbo.TAB_PX_PULANG_RESUME_DIAG_SEK WHERE FS_KD_DIAG_SEK = ? ORDER BY FS_KD_DIAG_SEK ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_tind_by_rg($params) {
        $sql = "SELECT * FROM PKU.dbo.TAB_PX_PULANG_RESUME_TIND WHERE FS_KD_REG = ? ORDER BY FS_KD_TIND ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_tindakan_by_rg2($params) {
        $sql = "SELECT * FROM PKU.dbo.TAB_PX_PULANG_RESUME_TIND WHERE FS_KD_TIND = ? ORDER BY FS_KD_TIND ASC";
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
        $sql = "DELETE FROM PKU.dbo.TAB_PX_PULANG_TERAPI WHERE FS_KD_TERAPI = ?";
        return $this->db->query($sql, $params);
    }




    function delete_terapi_all($params) {
        $sql = "DELETE FROM PKU.dbo.TAB_PX_PULANG_TERAPI WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }






    // delete surat masuk
    function delete_diag_sek($params) {
        $sql = "DELETE FROM PKU.dbo.TAB_PX_PULANG_RESUME_DIAG_SEK WHERE FS_KD_DIAG_SEK = ?";
        return $this->db->query($sql, $params);
    }

    function delete_tind($params) {
        $sql = "DELETE FROM PKU.dbo.TAB_PX_PULANG_RESUME_TIND WHERE FS_KD_TIND = ?";
        return $this->db->query($sql, $params);
    }

    function delete_diet($params) {
        $sql = "DELETE FROM PKU.dbo.TAB_PX_PULANG_RESUME_DIET WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function delete_indikasi($params) {
        $sql = "DELETE FROM PKU.dbo.TAB_PX_PULANG_RESUME_INDIKASI_RAWAT WHERE FS_KD_REG = ?";
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

    function get_all_resume($params) {
        $sql = "SELECT FS_KD_REG FROM PKU.dbo.TAB_PX_PULANG_RESUME WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
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

    function get_resume_by_rg($params) {
        $sql = "SELECT a.*,b.KET_MASUK,c.KET_MASUK AS 'FS_NM_LAYANAN2' ,d.user_name'created',
                e.user_name 'edited',g.TANGGAL,TGL_KELUAR,h.NAMA_RUANG
                FROM PKU.dbo.TAB_PX_PULANG_RESUME a
                LEFT JOIN DB_RSMM.dbo.M_CARAMASUK b ON a.FS_KD_LAYANAN=b.KODE_MASUK
                LEFT JOIN DB_RSMM.dbo.M_CARAMASUK c ON a.FS_KD_LAYANAN2=c.KODE_MASUK
                LEFT JOIN PKU.dbo.TAC_COM_USER d ON a.mdb=d.user_id
                LEFT JOIN PKU.dbo.TAC_COM_USER e ON a.mdb_update=e.user_id
                LEFT JOIN DB_RSMM.dbo.TUSER f ON a.FS_VERIF_DOKTER=f.NAMAUSER
                LEFT JOIN DB_RSMM.dbo.PENDAFTARAN g ON a.FS_KD_REG=g.NO_REG
                LEFT JOIN DB_RSMM.dbo.M_RUANG h ON h.KODE_RUANG=g.KODE_RUANG
                WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            return $result;
        } else {
            return 0;
        }
    }

    function get_diet_by_rg($params) {
        $sql = "SELECT a.FS_KD_PX_PULANG_DIET,FS_NM_DIET,a.FS_KD_DIET 
        FROM PKU.dbo.TAB_PX_PULANG_RESUME_DIET a 
        LEFT JOIN PKU.dbo.TAB_PX_PULANG_DIET b ON a.FS_KD_DIET=b.FS_KD_DIET 
        WHERE a.FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }

    function get_indikasi_dirawat_by_rg($params) {
        $sql = "SELECT a.*,b.* FROM PKU.dbo.TAB_PX_PULANG_RESUME_INDIKASI_RAWAT a LEFT JOIN PKU.dbo.COM_PARAM_RM_40_INDIKASI_DIRAWAT b ON a.FS_KD_PARAM_INDIKASI_DIRAWAT=b.FS_KD_PARAM_INDIKASI_DIRAWAT WHERE a.FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }

    // total surat masuk
    function get_all_diet() {
        $sql = "SELECT * FROM PKU.dbo.TAB_PX_PULANG_DIET ORDER BY FS_NM_DIET ASC";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_indikasi_dirawat() {
        $sql = "SELECT * FROM PKU.dbo.COM_PARAM_RM_40_INDIKASI_DIRAWAT ORDER BY FS_KD_PARAM_INDIKASI_DIRAWAT ASC";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_layanan() {
        $sql = "SELECT * FROM
                DB_RSMM.dbo.M_CARAMASUK 
                ORDER BY KET_MASUK ASC";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_obat($params) {
        $sql = "SELECT FS_NAMA_OBAT,FS_DOSIS_OBAT,FS_INTERVAL
                FROM PKU.dbo.TAB_RM_17 
                WHERE FS_KD_REG = ? AND FS_JENIS_OBAT = '1'
                GROUP BY FS_NAMA_OBAT,FS_DOSIS_OBAT,FS_INTERVAL";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    // update surat keluar
    function update_status($params) {
        $sql = "UPDATE PKU.dbo.TAB_PX_PULANG_RESUME SET FS_STATUS='1'
                WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }


      function update_ket_kematian($params) {
        $sql = "UPDATE PKU.dbo.TAB_PX_PULANG_RESUME SET FS_SEBAB_KEMATIAN=?
                WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }





    function update_dokter($params) {
        $sql = "UPDATE PKU.dbo.TAB_PX_PULANG_RESUME SET FS_VERIF_DOKTER=?
                WHERE FS_KD_REG = ?";
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
    
function get_no_skdp($params) {
        $sql = "SELECT MAX(FS_NO_SKDP) 'NOSKDP' FROM PKU.dbo.TAC_RJ_SKDP WHERE MONTH(mdd) = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    function cek_status_pulang($params) {
        $sql = "SELECT FS_CARA_PULANG FROM PKU.dbo.TAB_PX_PULANG_RESUME
                WHERE FS_KD_REG = ?   
                ORDER BY FS_KD_REG DESC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    /* function cek_rg_by_rm($params) {
      $sql = "SELECT COUNT(*)'total' FROM
      (
      SELECT a.*
      FROM TAB_IPCN a

      ) result
      ";

      $query = $this->db->query($sql, $params);
      if ($query->num_rows() > 0) {
      $result = $query->row_array();
      $query->free_result();
      return $result['total'];
      } else {
      return 0;
      }
      } */
}
