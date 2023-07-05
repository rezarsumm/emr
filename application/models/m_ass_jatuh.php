<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_ass_jatuh extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_last_inserted_id() {
        return $this->db->insert_id();
    }

    function insert($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_RI_JATUH2( FS_KD_REG, FS_TIPE_RISIKO_JATUH, mdb, mdd,mdd_time)
        VALUES(?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }
    
    function insert_pencegahan_jatuh($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_RI_JATUH4( FS_KD_JATUH3, FS_KD_PENCEGAHAN_JATUH)
        VALUES(?,?)";
        return $this->db->query($sql, $params);
    }
 
    
    function insert2($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_RI_JATUH3(FS_KD_JATUH2, FS_PARAM_1, FS_PARAM_2, FS_PARAM_3, FS_PARAM_4,FS_PARAM_5,FS_PARAM_6,FS_PARAM_7, 
        FS_PARAM_8, FS_PARAM_9, FS_PARAM_10, FS_PARAM_11, FS_PARAM_12, FS_PARAM_13, FS_PARAM_14, FS_PARAM_15, FS_PARAM_16, FS_PARAM_17, mdb, mdd)
        VALUEs (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }
    
    function update($params) {
        $sql = "UPDATE PKU.dbo.TAC_RI_STATUS SET FS_STATUS = ?, mdb = ?, mdd = ? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }




    function delete_planning($params) {
        $sql = "DELETE PKU.dbo.TAC_RI_PLANNING 
        WHERE FS_KD_REG = ?";
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
        $sql = "SELECT A.NO_REG,A.NO_MR,A.TGL_MULAI,B.NAMA_PASIEN,A.KODE_RUANG, B.JENIS_KELAMIN,B.ALAMAT,D.KODE_BANGSAL,C.NAMA_RUANG,D.NAMA_BANGSAL,E.KODEREKANAN,F.NAMAREKANAN,B.ALAMAT
        FROM TR_KAMAR A, REGISTER_PASIEN B, M_RUANG C, M_BANGSAL D, PENDAFTARAN E, REKANAN F 
        WHERE A.NO_MR=B.NO_MR AND A.NO_REG=E.NO_REG AND E.KODEREKANAN=F.KODEREKANAN AND A.KODE_RUANG=C.KODE_RUANG AND C.KODE_BANGSAL=D.KODE_BANGSAL AND A.STATUS='1' AND E.STATUS='1' and E.Kode_Dokter=?   ORDER BY D.KODE_BANGSAL,A.TGL_MULAI ";

         $sql3 = "SELECT A.NO_REG,A.NO_MR,A.TGL_MULAI,B.NAMA_PASIEN,A.KODE_RUANG, B.JENIS_KELAMIN,B.ALAMAT,D.KODE_BANGSAL,C.NAMA_RUANG,D.NAMA_BANGSAL,E.KODEREKANAN,F.NAMAREKANAN,B.ALAMAT
        FROM TR_KAMAR A, REGISTER_PASIEN B, M_RUANG C, M_BANGSAL D, PENDAFTARAN E, REKANAN F 
        WHERE A.NO_MR=B.NO_MR AND A.NO_REG=E.NO_REG AND E.KODEREKANAN=F.KODEREKANAN AND A.KODE_RUANG=C.KODE_RUANG AND C.KODE_BANGSAL=D.KODE_BANGSAL AND A.STATUS='1' AND E.STATUS='1'     ORDER BY D.KODE_BANGSAL,A.TGL_MULAI ";


          $sql2 = "SELECT A.NO_REG,A.NO_MR,A.TGL_MULAI,B.NAMA_PASIEN,A.KODE_RUANG, B.JENIS_KELAMIN,B.ALAMAT,D.KODE_BANGSAL,C.NAMA_RUANG,D.NAMA_BANGSAL,E.KODEREKANAN,F.NAMAREKANAN,B.ALAMAT
        FROM TR_KAMAR A, REGISTER_PASIEN B, M_RUANG C, M_BANGSAL D, PENDAFTARAN E, REKANAN F 
        WHERE A.NO_MR=B.NO_MR AND A.NO_REG=E.NO_REG AND E.KODEREKANAN=F.KODEREKANAN AND A.KODE_RUANG=C.KODE_RUANG AND C.KODE_BANGSAL=D.KODE_BANGSAL AND A.STATUS='1' AND E.STATUS='1' 
         AND 
        (A.No_Reg in(select H.No_Reg from TR_BIAYARINCI as H where A.No_Reg=H.No_Reg and H.Kode_Dokter=?))

          ORDER BY D.KODE_BANGSAL,A.TGL_MULAI ";



  $sql2 = "SELECT A.NO_REG,A.NO_MR,A.TGL_MULAI,B.NAMA_PASIEN,A.KODE_RUANG, B.JENIS_KELAMIN,B.ALAMAT,D.KODE_BANGSAL,C.NAMA_RUANG,D.NAMA_BANGSAL,E.KODEREKANAN,F.NAMAREKANAN,B.ALAMAT
        FROM TR_KAMAR A, REGISTER_PASIEN B, M_RUANG C, M_BANGSAL D, PENDAFTARAN E, REKANAN F 
        WHERE A.NO_MR=B.NO_MR AND A.NO_REG=E.NO_REG AND E.KODEREKANAN=F.KODEREKANAN AND A.KODE_RUANG=C.KODE_RUANG AND C.KODE_BANGSAL=D.KODE_BANGSAL AND A.STATUS='1' AND E.STATUS='1' 
         AND 
        (A.No_Reg in(select H.No_Reg from TR_BIAYARINCI as H where A.No_Reg=H.No_Reg and H.Kode_Dokter=?))

          ORDER BY D.KODE_BANGSAL,A.TGL_MULAI ";

        $query = $this->db->query($sql, $params);
        $query2 = $this->db->query($sql2, $params);
        $query3 = $this->db->query($sql3, $params);
        $dok = $this->db->query("SELECT * FROM DOKTER WHERE Kode_Dokter=?", $params)->row_array();


        $x = $params;

       if($x=='216'|| $x=='217' || $x=='211' || $x=='215' || $x=='206'  || $x=='211' || $x=='207' || $x=='209' || $x=='213'|| $x=='202'  || $x=='203' || $x=='219' || $x=='220' || $x=='221' || $x=='312' || $x=='222' || $x=='223' || $x=='208' ||  $x=='224' ||  $x=='225' || $x=='227'){
                   if ($query3->num_rows() > 0 ) {
                    $result3 = $query3->result_array();
                    

                    $query->free_result();

                    


                    return $result3;
                } else {
                    return array();
                }
        }
        else{

            if ($query->num_rows() > 0 || $query2->num_rows()>0) {
                $result = $query->result_array();
                $result2 = $query2->result_array();


                $query->free_result();

                if( $query2->num_rows()>0){
                    $data3=$result2;
                }
                else{
                  $data3=array_merge($result,$result2);
                }


                return $data3;
            } else {
                return array();
            }

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



     function get_pasien_bangsal1($params) {
        $sql = "SELECT A.NO_REG,A.NO_MR,A.TGL_MULAI,B.NAMA_PASIEN,A.KODE_RUANG, B.JENIS_KELAMIN,B.ALAMAT,D.KODE_BANGSAL,C.NAMA_RUANG,D.NAMA_BANGSAL,E.KODEREKANAN,F.NAMAREKANAN,B.ALAMAT
        FROM TR_KAMAR A, REGISTER_PASIEN B, M_RUANG C, M_BANGSAL D, PENDAFTARAN E, REKANAN F 
        WHERE A.NO_MR=B.NO_MR AND A.NO_REG=E.NO_REG AND E.KODEREKANAN=F.KODEREKANAN AND A.KODE_RUANG=C.KODE_RUANG AND C.KODE_BANGSAL=D.KODE_BANGSAL AND A.STATUS='1' AND E.STATUS='1'     ORDER BY D.KODE_BANGSAL,A.TGL_MULAI ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


     function get_pasien_mina() {
         $date = date('Y-m-d');

         $sql = "SELECT A.NO_REG,A.NO_MR,A.TGL_MULAI,B.NAMA_PASIEN,A.KODE_RUANG, B.JENIS_KELAMIN,B.ALAMAT,D.KODE_BANGSAL,C.NAMA_RUANG,D.NAMA_BANGSAL,E.KODEREKANAN,F.NAMAREKANAN,B.ALAMAT
        FROM TR_KAMAR A, REGISTER_PASIEN B, M_RUANG C, M_BANGSAL D, PENDAFTARAN E, REKANAN F 
        WHERE A.NO_MR=B.NO_MR AND A.NO_REG=E.NO_REG AND E.KODEREKANAN=F.KODEREKANAN AND A.KODE_RUANG=C.KODE_RUANG AND C.KODE_BANGSAL=D.KODE_BANGSAL AND A.STATUS='1' AND E.STATUS='1' AND (D.KODE_BANGSAL = 'MNA' or D.KODE_BANGSAL ='0001') ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


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

    function get_jatuh_anak_by_rg($params) {
        $sql = "SELECT a.mdd,a.mdd_time,b.*,b.FS_KD_TRS 'FS_KD_TRS2',NAMALENGKAP 
        FROM
        PKU.dbo.TAC_RI_JATUH2 a
        LEFT JOIN PKU.dbo.TAC_RI_JATUH3 b ON a.FS_KD_TRS=b.FS_KD_JATUH2
        LEFT JOIN PKU.dbo.TAC_COM_USER c ON b.mdb=c.user_id
        LEFT JOIN DB_RSMM.dbo.TUSER d ON c.user_name=d.NAMAUSER
        WHERE a.FS_KD_REG = ? AND FS_TIPE_RISIKO_JATUH = '1'
        ORDER BY a.mdd DESC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    function get_jatuh_dewasa_by_rg($params) {
        $sql = "SELECT a.mdd,a.mdd_time,b.*,b.FS_KD_TRS 'FS_KD_TRS2',NAMALENGKAP
        FROM
        PKU.dbo.TAC_RI_JATUH2 a
        LEFT JOIN PKU.dbo.TAC_RI_JATUH3 b ON a.FS_KD_TRS=b.FS_KD_JATUH2
        LEFT JOIN PKU.dbo.TAC_COM_USER c ON b.mdb=c.user_id
        LEFT JOIN DB_RSMM.dbo.TUSER d ON c.user_name=d.NAMAUSER
        WHERE a.FS_KD_REG = ? AND FS_TIPE_RISIKO_JATUH = '2'
        ORDER BY a.mdd DESC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_com_jatuh($params) {
        $sql = "SELECT * FROM
        PKU.dbo.TAC_COM_RI_JATUH";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_com_jatuh2($params) {
        $sql = "SELECT * FROM
        PKU.dbo.TAC_COM_RI_JATUH2
        WHERE a.FS_KD_COM_JATUHs = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_jatuh_dewasa2_by_rg($params) {
        $sql = "SELECT a.mdd,a.mdd_time,b.*,b.FS_KD_TRS 'FS_KD_TRS2',NAMALENGKAP
        FROM
        PKU.dbo.TAC_RI_JATUH2 a
        LEFT JOIN PKU.dbo.TAC_RI_JATUH3 b ON a.FS_KD_TRS=b.FS_KD_JATUH2
        LEFT JOIN PKU.dbo.TAC_COM_USER c ON b.mdb=c.user_id
        LEFT JOIN DB_RSMM.dbo.TUSER d ON c.user_name=d.NAMAUSER
        WHERE a.FS_KD_REG = ? AND FS_TIPE_RISIKO_JATUH = '3'
        ORDER BY a.mdd DESC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
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
    
    function get_all_ases_jatuh($params) {
        $sql = "SELECT FS_KD_REG FROM PKU.dbo.TAC_RI_JATUH2 WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            return $result;
        } else {
            return 0;
        }
    }
    function get_px_by_dokter_by_rm($params) {
        $sql = "SELECT a.FS_NM_PASIEN,a.FS_MR,a.FS_ALM_PASIEN,FS_JNS_KELAMIN,
        ISNULL(datediff(year,a.fd_tgl_lahir,?),0) fn_umur
        FROM HOSPITAL.dbo.TC_MR a
        WHERE a.FS_MR = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function list_pencegahan_jatuh($params) {
        $sql = "SELECT * FROM PKU.dbo.TAC_COM_PENCEGARAN_JATUH ORDER BY FS_NM_PENCEGAHAN_JATUH";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_pencegahan_jatuh_by_id($params) {
        $sql = "SELECT * FROM
        PKU.dbo.TAC_RI_JATUH4 a
        LEFT JOIN PKU.dbo.TAC_RI_JATUH3 b ON a.FS_KD_JATUH3=b.FS_KD_TRS
        LEFT JOIN PKU.dbo.TAC_COM_PENCEGARAN_JATUH c ON a.FS_KD_PENCEGAHAN_JATUH=c.FS_KD_TRS
        WHERE b.FS_KD_TRS=?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_data_vs_by_rg($params) {
        $sql = "SELECT a.*,c.FS_NM_PEG,b.user_name
        FROM PKU.dbo.TAC_RI_VITAL_SIGN a
        LEFT JOIN PKU.dbo.TAC_COM_USER b ON a.mdb=b.user_id
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

    function get_data_nyeri_by_rg($params) {
        $sql = "SELECT *
        FROM PKU.dbo.TAC_RI_NYERI
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

    function get_data_alergi_by_rg($params) {
        $sql = "SELECT *
        FROM PKU.dbo.TAC_RI_ALERGI
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

    function get_data_nutrisi_by_rg($params) {
        $sql = "SELECT *
        FROM PKU.dbo.TAC_RI_NUTRISI
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
    function get_data_kebidanan_by_rg($params) {
        $sql = "SELECT *
        FROM PKU.dbo.TAC_RI_ASES_KEBID
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
        FROM PKU.dbo.TAC_RI_MASALAH_KEP a 
        LEFT JOIN PKU.dbo.TAC_COM_PARAM_MASALAH_KEP b ON a.FS_KD_MASALAH_KEP=b.FS_KD_TRS
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
        FROM PKU.dbo.TAC_RI_JATUH
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
        FROM PKU.dbo.TAC_RI_ASES_PER2
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

    function get_data_ases_kebid_by_rg($params) {
        $sql = "SELECT *
        FROM PKU.dbo.TAC_RI_ASES_KEBID
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

    function get_data_medis_by_rg($params) {
        $sql = "SELECT a.*,c.FS_NM_PEG,b.user_name
        FROM PKU.dbo.TAC_RI_MEDIS a
        LEFT JOIN PKU.dbo.TAC_COM_USER b ON a.mdb=b.user_id
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
        FROM PKU.dbo.TAC_RI_MEDIS a
        LEFT JOIN PKU.dbo.TAC_COM_USER b ON a.mdb=b.user_id
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
        FROM PKU.dbo.TAC_RI_MEDIS a
        LEFT JOIN PKU.dbo.TAC_COM_USER b ON a.mdb=b.user_id
        LEFT JOIN HOSPITAL.dbo.TD_PEG c ON b.user_name=c.FS_KD_PEG
        LEFT JOIN HOSPITAL.dbo.TA_TRS_SEP d ON a.FS_KD_REG = d.FS_KD_REG
        LEFT JOIN PKU.dbo.TAC_HD_INSTRUKSI_MEDIS e ON a.FS_KD_REG=e.FS_KD_REG
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
        FROM PKU.dbo.TAC_HD_INSTRUKSI_MEDIS
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
        FROM PKU.dbo.TAC_RI_SKDP a
        LEFT JOIN PKU.dbo.TAC_COM_PARAMETER_SKDP_ALASAN b ON a.FS_SKDP_1=b.FS_KD_TRS
        LEFT JOIN PKU.dbo.TAC_COM_PARAMETER_SKDP_RENCANA c ON a.FS_SKDP_2=c.FS_KD_TRS
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
        $sql = "SELECT FS_KD_REG  FROM PKU.dbo.TAC_RI_MEDIS WHERE FS_KD_REG= ?";
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
        $sql = "SELECT *  FROM PKU.dbo.TAC_COM_PARAMETER_SKDP_ALASAN";
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
        $sql = "SELECT * FROM PKU.dbo.TAC_COM_PARAM_PLANNING";
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
        $sql = "SELECT * FROM PKU.dbo.TAC_COM_PARAM_SPIRITUAL";
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
        $sql = "SELECT * FROM PKU.dbo.TAC_COM_PARAM_EDUKASI";
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
        $sql = "SELECT * FROM PKU.dbo.TAC_RI_MASALAH_KEP WHERE FS_KD_REG = ?";
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
        $sql = "SELECT * FROM PKU.dbo.TAC_RI_REN_KEP WHERE FS_KD_REG = ?";
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
        FROM PKU.dbo.TAC_RI_SPIRITUAL
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
        FROM PKU.dbo.TAC_RI_EDUKASI
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
        FROM PKU.dbo.TAC_RI_PLANNING
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
