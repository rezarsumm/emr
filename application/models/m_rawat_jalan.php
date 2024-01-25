<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_rawat_jalan extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_last_inserted_id() {
        return $this->db->insert_id();
    }
 
    function insert_tac_rj_rujukan($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_RJ_RUJUKAN(FS_KD_REG,FS_TUJUAN_RUJUKAN,FS_TUJUAN_RUJUKAN2,FS_ALASAN_RUJUK, mdb, mdd_date, mdd_time)
        VALUES (?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }
    function insert_tac_rj_rujukan_igd($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_RJ_RUJUKAN_IGD(FS_KD_REG,FS_TUJUAN_DPJP,FS_RS_TUJUAN,FS_STATUS_GAWAT_DARURAT,FS_PELAYANAN_TELAH_DIBERIKAN,MDB, MDD_DATE, MDD_TIME)
        VALUES (?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

     function get_px_op($params) {
        $tgl=date('Y-m-d');

        $date = new DateTime();
        $date_plus = $date->modify("-1 days");
        $akhirnya= $date_plus->format("Y-m-d");

        $sql = "select A.*, B.No_MR, B.No_Reg, C.Nama_Pasien , C.Alamat, F.Nama_Dokter
        from JADWAL_OP as A, PENDAFTARAN B, REGISTER_PASIEN C, DOKTER F
        where A.FS_KD_REG=B.No_Reg and C.No_MR=B.No_MR and F.Kode_Dokter=A.Kode_Dokter and A.tanggalop>='$akhirnya' and B.STATUS='1' 
        ORDER BY A.tanggalop";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


 function get_px_op2($params) {
        $tgl=date('Y-m-d');
        $sql = "select A.*, B.No_MR, B.No_Reg, C.Nama_Pasien , C.Alamat, F.Nama_Dokter
        from JADWAL_OP as A, PENDAFTARAN B, REGISTER_PASIEN C, DOKTER F
        where A.FS_KD_REG=B.No_Reg and C.No_MR=B.No_MR and B.STATUS='1' and F.Kode_Dokter=A.Kode_Dokter and A.tanggalop>='$tgl' and A.Kode_Dokter=?
        ORDER BY A.tanggalop";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    

    function all_op($params) { 
        $sql = "SELECT A.*, B.No_Reg,B.No_MR, C.Nama_Pasien, C.Jenis_Kelamin, C.Tgl_Lahir, D.*, E.*, F.*, G.*, H.*, I.*, J.*, K.*, L.*, M.*, N.*,O.*, R.Nama_Dokter
        from JADWAL_OP A,
        PENDAFTARAN B, REGISTER_PASIEN C, 
        PKU.dbo.DATA_UMUM_PRA_OP D,
        PKU.dbo.ASUHAN_KEP_OP E,
        PKU.dbo.ASUHAN_KAJIAN_PRA F,
        PKU.dbo.ASUHAN_KAJIAN_INTRA G,
        PKU.dbo.ASUHAN_KAJIAN_POST H,
        PKU.dbo.CHECKLIST_KES_OP I,
        PKU.dbo.ASES_PRA_ANESTESIA J,
        PKU.dbo.ASES_PRA_BEDAH K,
        PKU.dbo.LAPORAN_ANESTESIA L,
        PKU.dbo.LAPORAN_OPERASI M,
        PKU.dbo.RENCANA_MEDIS_POST_OP N,
        PKU.dbo.DATA_UMUM_POST_OP O,
        DOKTER R
        WHERE A.FS_KD_REG=B.No_Reg AND B.No_MR=C.No_MR AND D.idoperasi=A.id and E.idoperasi=A.id and F.idasuhan=E.id and G.idasuhan=E.id and H.idasuhan=E.id
        and I.idoperasi=A.id 
        and J.idoperasi=A.id 
        and K.idoperasi=A.id 
        and L.idoperasi=A.id 
        and M.idoperasi=A.id 
        and N.idoperasi=A.id 
        and O.idoperasi=A.id 
    
        and R.Kode_Dokter=A.Kode_Dokter  
        and A.FS_KD_REG=?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }



    
    function get_pasien_ok_by_rg($params) {
        $sql = "SELECT A.NO_REG,A.NO_MR,A.TGL_MULAI,B.NAMA_PASIEN,A.KODE_RUANG, B.JENIS_KELAMIN, B.ALAMAT, B.KOTA, B.PROVINSI, D.KODE_BANGSAL,C.NAMA_RUANG,D.NAMA_BANGSAL,E.KODEREKANAN,F.NAMAREKANAN ,B.TGL_LAHIR,datediff(year,B.TGL_LAHIR,GETDATE()) 'fn_umur'
        FROM TR_KAMAR A, REGISTER_PASIEN B, M_RUANG C, M_BANGSAL D, PENDAFTARAN E, REKANAN F 
        WHERE  A.NO_MR=B.NO_MR AND A.NO_REG=E.NO_REG AND E.KODEREKANAN=F.KODEREKANAN AND A.KODE_RUANG=C.KODE_RUANG AND C.KODE_BANGSAL=D.KODE_BANGSAL AND A.NO_REG = ?  ORDER BY D.KODE_BANGSAL,A.TGL_MULAI";
         $query = $this->db->query($sql, $params);
         if ($query->num_rows() > 0) {
             $result = $query->result_array();
             $query->free_result();
             return $result;
         } else {
             return array();
         }
     }


     function get_pasien_ok_by_rgx($params) {
        $sql = "SELECT E.NO_REG,E.NO_MR,A.TGL_MULAI,B.NAMA_PASIEN,A.KODE_RUANG,
         B.JENIS_KELAMIN,B.ALAMAT,C.NAMA_RUANG,
         E.KODEREKANAN,F.NAMAREKANAN ,
         B.TGL_LAHIR,datediff(year,B.TGL_LAHIR,GETDATE()) 'fn_umur'
        FROM  PENDAFTARAN E
        left join REKANAN F on E.KODEREKANAN=F.KODEREKANAN 
        left join TR_KAMAR A on A.NO_REG=E.NO_REG
        left join REGISTER_PASIEN B on E.NO_MR=B.NO_MR
        left join M_RUANG C on A.KODE_RUANG=C.KODE_RUANG
        WHERE E.NO_REG = ?  ";
         $query = $this->db->query($sql, $params);
         if ($query->num_rows() > 0) {
             $result = $query->result_array();
             $query->free_result();
             return $result;
         } else {
             return array();
         }
     }


     function get_pasien_ok_by_rgxx($params) {
        $sql = "SELECT E.NO_REG,E.NO_MR,A.TGL_MULAI,B.NAMA_PASIEN,A.KODE_RUANG,
         B.JENIS_KELAMIN,B.ALAMAT,C.NAMA_RUANG,
         E.KODEREKANAN,F.NAMAREKANAN ,
         B.TGL_LAHIR,datediff(year,B.TGL_LAHIR,GETDATE()) 'fn_umur'
        FROM  PENDAFTARAN E
        left join REKANAN F on E.KODEREKANAN=F.KODEREKANAN 
        left join TR_KAMAR A on A.NO_REG=E.NO_REG
        left join REGISTER_PASIEN B on E.NO_MR=B.NO_MR
        left join M_RUANG C on A.KODE_RUANG=C.KODE_RUANG
        WHERE E.NO_REG = ?   ";
         $query = $this->db->query($sql, $params);
         if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }



  
    function get_pasien_ok_by_id($params) {
        $sql = "SELECT  * from JADWAL_OP where id=?";
         $query = $this->db->query($sql, $params);
         if ($query->num_rows() > 0) {
             $result = $query->row_array();
             $query->free_result();
             return $result;
         } else {
             return array();
         }
     }


     
 
    function get_data_op($params) {
        $sql = "select * from PKU.dbo.LAPORAN_OPERASI A WHERE A.FS_KD_REG=?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


 function insert_tac_rj_prb($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_RJ_PRB(FS_KD_TRS,FS_KD_REG,FS_TGL_PRB,FS_TUJUAN, mdb, mdd_date, mdd_time)
        VALUES (?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_RJ_STATUS( FS_KD_REG, FS_STATUS,FS_FORM,FS_JNS_ASESMEN, mdb, mdd)
        VALUES(?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_pemeriksaan_lab_skdp($params) {
        $sql = "INSERT INTO PKU.dbo.ta_trs_kartu_periksa4 (fn_no_urut, fs_kd_tarif,fs_kd_reg3) VALUES (?, ?, ?)";
        return $this->db->query($sql, $params);
    }
    function insert_pemeriksaan_rad_skdp($params) {
        $sql = "INSERT INTO PKU.dbo.ta_trs_kartu_periksa5 ( fn_no_urut, fs_kd_tarif, fs_kd_reg3) VALUES (?, ?, ?)";
        return $this->db->query($sql, $params);
    }
    
    function insert_antrian_obat($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_RJ_ANTRIAN_OBAT( FS_KD_RJ_MEDIS, FS_KD_ANTRIAN,FD_TGL_ANTRIAN)
        VALUES(?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_medis($params) {
        $sql = "INSERT INTO HOSPITAL.dbo.TA_TRS_KARTU_PERIKSA(FS_KD_TRS, FD_TGL_TRS, FS_JAM_TRS, FS_KD_PETUGAS, FD_TGL_VOID, FS_JAM_VOID, FS_KD_REG, 
        FS_KD_LAYANAN, FS_KD_PETUGAS_MEDIS, FS_ANAMNESA, FS_DIAGNOSA, FS_TINDAKAN, 
        FS_CATATAN_FISIK, FS_KD_TIPE_BARANG, FN_CETAK)
        VALUES     (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

      function get_cek_konsul($params) {
        $sql = "SELECT * FROM
        PKU.dbo.TAC_RJ_RUJUKAN
        WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


      function get_data_konsulan($params) {
         $sql = "SELECT a.FS_TUJUAN_RUJUKAN, c.NAMA_DOKTER FROM
          PKU.dbo.TAC_RJ_RUJUKAN a 
          LEFT JOIN DOKTER c ON a.FS_TUJUAN_RUJUKAN=c.KODE_DOKTER 
        WHERE a.FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


     function list_nama_dokter($params) {
        $sql = "SELECT Kode_Dokter, Nama_Dokter
        FROM DOKTER WHERE Jenis_Profesi='DOKTER SPESIALIS'";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


   
    function insert_tac_rj_medis($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_RJ_MEDIS(FS_KD_KP,FS_KD_REG, FS_DIAGNOSA, FS_ANAMNESA, FS_TINDAKAN, FS_TERAPI, FS_CATATAN_FISIK,FS_KD_MEDIS,FS_CARA_PULANG,FS_DAFTAR_MASALAH,FS_PLANNING,FS_OBAT_PROLANIS,
        mdb, mdd,FS_JAM_TRS,FS_EKG,FS_USG,HASIL_ECHO,HASIL_EKG,HASIL_TREADMILL,FS_DIAGNOSA_SEKUNDER)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

      function insert_tac_rj_medis_x($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_RJ_MEDIS(FS_KD_KP,FS_KD_REG, FS_DIAGNOSA, FS_ANAMNESA, FS_TINDAKAN, FS_TERAPI, FS_CATATAN_FISIK,FS_KD_MEDIS,FS_CARA_PULANG,FS_DAFTAR_MASALAH,FS_PLANNING,FS_OBAT_PROLANIS,
        mdb, mdd,FS_JAM_TRS,FS_EKG,FS_USG, FS_RIW_PENYAKIT_DAHULU, FS_RIW_PENYAKIT_DAHULU2,
         FS_ALERGI, FS_REAK_ALERGI, FS_STATUS_PSIK, FS_HUB_KELUARGA, KONJUNGTIVA,
         DEVIASI, SKELERA, JVP, BIBIR, MUKOSA, THORAX, JANTUNG,
         ABDOMEN, PINGGANG, EKS_ATAS, EKS_BAWAH, DPJP_UTAMA, DPJP_I, DPJP_II, DPJP_III, KONSUL_DPJP_UTAMA, KONSUL_DPJP_I, KONSUL_DPJP_II, KONSUL_DPJP_III   )
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_tac_rj_skdp($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_RJ_SKDP(FS_KD_REG, FS_SKDP_1, FS_SKDP_2,FS_SKDP_KET,FS_SKDP_KONTROL,FS_NO_SKDP, mdb, mdd, mdd_time, FS_SKDP_FASKES, FS_PESAN, FS_RENCANA_KONTROL)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_vs($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_RJ_VITAL_SIGN(FS_KD_REG, FS_SUHU, FS_NADI, FS_R, FS_TD,FS_TB,FS_BB,FS_KD_MEDIS, mdb, mdd, FS_JAM_TRS)
        VALUEs (?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_nyeri($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_RJ_NYERI(FS_KD_REG, FS_NYERIP, FS_NYERIQ, FS_NYERIR, FS_NYERIS, FS_NYERIT, mdb, mdd, FS_NYERI)
        VALUES (?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }











    function insert_jatuh($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_RJ_JATUH(FS_KD_REG, FS_CARA_BERJALAN1, FS_CARA_BERJALAN2, FS_CARA_DUDUK,intervensi1,intervensi2, mdd, mdb)
        VALUES (?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    } 









    
    function insert_alergi($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_RJ_ALERGI(FS_KD_REG, FS_ALERGI, FS_ALERGI2, FS_REAK_ALERGI, mdb, mdd)
        VALUES (?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_nutrisi($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_RJ_NUTRISI(FS_KD_REG, FS_NUTRISI1, FS_NUTRISI2,FS_NUTRISI_ANAK1, FS_NUTRISI_ANAK2,FS_NUTRISI_ANAK3,FS_NUTRISI_ANAK4, mdb, mdd)
        VALUES (?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_nutrisi_anak($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_RJ_NUTRISI(FS_KD_REG, FS_NUTRISI_ANAK1, FS_NUTRISI_ANAK2,FS_NUTRISI_ANAK3,FS_NUTRISI_ANAK4, mdb, mdd)
        VALUES (?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_masalah_kep($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_RJ_MASALAH_KEP(FS_KD_REG, FS_KD_MASALAH_KEP)
        VALUES (?,?)";
        return $this->db->query($sql, $params);
    }

    

    function insert_rencana_kep($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_RJ_REN_KEP(FS_KD_REG, FS_KD_REN_KEP)
        VALUES (?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_ases($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_ASES_PER2(FS_KD_REG, FS_RIW_PENYAKIT_DAHULU, FS_RIW_PENYAKIT_DAHULU2, FS_RIW_PENYAKIT_KEL, FS_RIW_PENYAKIT_KEL2,
        FS_STATUS_PSIK,FS_STATUS_PSIK2,FS_HUB_KELUARGA,FS_ST_FUNGSIONAL,FS_AGAMA,FS_NILAI_KHUSUS,FS_NILAI_KHUSUS2,FS_ANAMNESA,FS_PENGELIHATAN,
        FS_PENCIUMAN,FS_PENDENGARAN,FS_RIW_IMUNISASI,FS_RIW_IMUNISASI_KET,FS_RIW_TUMBUH,FS_RIW_TUMBUH_KET,FS_HIGH_RISK,FS_EDUKASI,FS_SKDP_FASKES,mdb,mdd)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_kebidanan($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_RJ_ASES_KEBID(FS_KD_REG, FS_NM_SUAMI, FS_TGL_LAHIR_SUAMI, FS_RIWAYAT_GYNEKOLOGI, FS_RIWAYAT_GYNEKOLOGI_KET, 
        FS_RIW_MENS_UMUR_MENARCHE, FS_RIW_MENS_LAMA_HAID, FS_RIW_MENS_GANTI_PEMBALUT, FS_RIW_MENS_HPM, FS_RIW_MENS_KELUHAN, 
        FS_RIW_MENS_KELUHAN_KET, FS_RIW_KB_METODE_1, FS_RIW_KB_METODE_LAMA_1, FS_RIW_KB_METODE_2, FS_RIW_KB_METODE_LAMA_2, 
        FS_RIW_KB_KOMPLIKASI, FS_RIW_KB_KOMPLIKASI_KET, FS_MASALAH_KEBIDANAN, FS_RENCANA_KEBIDANAN,G,P,A,FS_RIW_MENS_HPL,
        FS_KOMPLIKASI,FS_K1,FS_K4,FS_HB,FS_STATUS_TT,FS_BUKU_KIA,mdb,mdd)
        VALUES     (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_kebidanan2($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_RJ_ASES_KEBID2(FS_KD_REG, FS_RIW_KEHAMILAN_THN_PARTUS, FS_RIW_KEHAMILAN_TMPT_PARTUS, FS_RIW_KEHAMILAN_UMUR_HAMIL, 
        FS_RIW_KEHAMILAN_JNS_PERSALINAN, FS_RIW_KEHAMILAN_PENOLONG_PERSALINAN, FS_RIW_KEHAMILAN_PENYULIT, FS_RIW_KEHAMILAN_JK, 
        FS_RIW_KEHAMILAN_KEADAAN_ANAK,mdb,mdd)
        VALUES     (?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_antenatal($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_ASES_PER2(FS_KD_REG,FS_ANAMNESA,FS_USIA_KEHAMILAN
        ,FS_HMT,mdb,mdd) VALUES (?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }
    function insert_pemeriksaan_lab($params) {
        $sql = "INSERT INTO PKU.dbo.ta_trs_kartu_periksa4 (fn_no_urut, fs_kd_tarif, fs_kd_reg2) VALUES (?, ?, ?)";
        return $this->db->query($sql, $params);
    }
    function insert_pemeriksaan_rad($params) {
        $sql = "INSERT INTO PKU.dbo.ta_trs_kartu_periksa5 (fn_no_urut, fs_kd_tarif,fs_kd_reg2,fs_bagian) VALUES (?, ?, ?, ?)";
        return $this->db->query($sql, $params);
    }
    function insert_pemeriksaan_rad2($params) {
        $sql = "INSERT INTO PKU.dbo.ta_trs_kartu_periksa5 (fn_no_urut, fs_kd_tarif,fs_kd_reg2) VALUES (?, ?, ?)";
        return $this->db->query($sql, $params);
    }


    function insert_instruksi_medis($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_HD_INSTRUKSI_MEDIS(FS_KD_REG,instruksi_hd_id,informed_concent_tgl,instruksi_tgl,instruksi_resepHD,instruksi_resepHD_TD,instruksi_resepHD_QB,instruksi_resepHD_QD,instruksi_resepHD_UFgoal,instruksi_profilling_Na,
        instruksi_profilling_NaStat,instruksi_profilling_UF,instruksi_dialisat_asetat,instruksi_dialisat_bicarbonat,instruksi_dialisat_conductivity,instruksi_dialisat_conductivity_text,instruksi_dialisat_temperatur,instruksi_dialisat_temperatur_text,
        instruksi_dosis_sirkulasi,instruksi_dosis_sirkulasi_text,instruksi_dosis_awal,instruksi_dosis_awal_text,instruksi_dosis_maintenance,instruksi_dosis_main,instruksi_dosis_main_continue_text,instruksi_dosis_main_intermitten_text,
        instruksi_LMWH,instruksi_LMWH_text,instruksi_tanpa_heparin,instruksi_tanpa_heparin_text,instruksi_program_bilas,instruksi_edukasi,instruksi_edukasi_text,instruksi_catatan_lain,
        mdb,mdd) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function update_ases($params) {
        $sql = "UPDATE PKU.dbo.TAC_ASES_PER2 SET FS_RIW_PENYAKIT_DAHULU=?, FS_RIW_PENYAKIT_DAHULU2=?, FS_RIW_PENYAKIT_KEL=?, FS_RIW_PENYAKIT_KEL2=?,
        FS_STATUS_PSIK=?,FS_STATUS_PSIK2=?,FS_HUB_KELUARGA=?,FS_ST_FUNGSIONAL=?,FS_AGAMA=?,FS_NILAI_KHUSUS=?,FS_NILAI_KHUSUS2=?,FS_ANAMNESA=?,
        FS_PENGELIHATAN=?, FS_PENCIUMAN=?,FS_PENDENGARAN=?,FS_RIW_IMUNISASI=?,FS_RIW_IMUNISASI_KET=?,FS_RIW_TUMBUH=?,FS_RIW_TUMBUH_KET=?, FS_HIGH_RISK=?, 
        FS_EDUKASI=?,FS_SKDP_FASKES=?,mdb=?,mdd=?
        WHERE FS_KD_REG =?";
        return $this->db->query($sql, $params);
    }

    function update_kebidanan($params) {
        $sql = "UPDATE  PKU.dbo.TAC_RJ_ASES_KEBID SET FS_NM_SUAMI= ?, FS_TGL_LAHIR_SUAMI= ?, FS_RIWAYAT_GYNEKOLOGI= ?, FS_RIWAYAT_GYNEKOLOGI_KET= ?, 
        FS_RIW_MENS_UMUR_MENARCHE= ?, FS_RIW_MENS_LAMA_HAID= ?, FS_RIW_MENS_GANTI_PEMBALUT= ?, FS_RIW_MENS_HPM= ?, FS_RIW_MENS_KELUHAN= ?, 
        FS_RIW_MENS_KELUHAN_KET= ?, FS_RIW_KB_METODE_1= ?, FS_RIW_KB_METODE_LAMA_1= ?, FS_RIW_KB_METODE_2= ?, FS_RIW_KB_METODE_LAMA_2= ?, 
        FS_RIW_KB_KOMPLIKASI= ?, FS_RIW_KB_KOMPLIKASI_KET= ?, FS_MASALAH_KEBIDANAN= ?, FS_RENCANA_KEBIDANAN= ?,G= ?,P= ?,A= ?,FS_RIW_MENS_HPL= ? WHERE FS_KD_REG = ?
        ";
        return $this->db->query($sql, $params);
    }

    function update_kebidanan2($params) {
        $sql = "UPDATE PKU.dbo.TAC_RJ_ASES_KEBID2 SET FS_RIW_KEHAMILAN_THN_PARTUS = ?, FS_RIW_KEHAMILAN_TMPT_PARTUS = ?, FS_RIW_KEHAMILAN_UMUR_HAMIL = ?, 
        FS_RIW_KEHAMILAN_JNS_PERSALINAN = ?, FS_RIW_KEHAMILAN_PENOLONG_PERSALINAN = ?, FS_RIW_KEHAMILAN_PENYULIT = ?, FS_RIW_KEHAMILAN_JK = ?, 
        FS_RIW_KEHAMILAN_KEADAAN_ANAK = ? WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }

    function update($params) {
        $sql = "UPDATE PKU.dbo.TAC_RJ_STATUS SET FS_STATUS = ?, mdb = ?, mdd = ? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function update_vs($params) {
        $sql = "UPDATE PKU.dbo.TAC_RJ_VITAL_SIGN SET FS_SUHU = ?, FS_NADI =?, FS_R=?, FS_TD=?, FS_TB=?, FS_BB=?, mdb=?, mdd=? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

     function update_pemeriksaan_rad($params) {
         $sql = "UPDATE PKU.dbo.ta_trs_kartu_periksa5 SET fn_no_urut = ?, fs_kd_tarif =?, fs_bagian=? WHERE FS_KD_REG2 = ?";

        return $this->db->query($sql, $params);
    }

    

    function update_nyeri($params) {
        $sql = "UPDATE PKU.dbo.TAC_RJ_NYERI SET FS_NYERIP = ?, FS_NYERIQ = ?, FS_NYERIR = ?, FS_NYERIS = ?, FS_NYERIT = ?, mdb = ?, mdd = ?,FS_NYERI=? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function update_jatuh($params) {
        $sql = "UPDATE PKU.dbo.TAC_RJ_JATUH SET FS_CARA_BERJALAN1 = ?, FS_CARA_BERJALAN2 = ?, FS_CARA_DUDUK = ?, mdd = ?, mdb=? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function update_alergi($params) {
        $sql = "UPDATE PKU.dbo.TAC_RJ_ALERGI SET FS_ALERGI = ?, FS_ALERGI2 = ?, FS_REAK_ALERGI = ?, mdb = ?, mdd=? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function update_nutrisi($params) {
        $sql = "UPDATE PKU.dbo.TAC_RJ_NUTRISI SET FS_NUTRISI1 = ?, FS_NUTRISI2 = ?,FS_NUTRISI_ANAK1=?,FS_NUTRISI_ANAK2=?,FS_NUTRISI_ANAK3=?,
        FS_NUTRISI_ANAK4=?,  mdb = ?, mdd=? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function update_tz_parameter_no_kp($params) {
        $sql = "UPDATE HOSPITAL.dbo.TZ_PARAMETER_NO SET FN_VALUE=? WHERE FS_KD_PARAMETER= 'NOKRTPRKSA'";
        return $this->db->query($sql, $params);
    }

    function update_level_medis($params) {
        $sql = "UPDATE PKU.dbo.TAC_RJ_STATUS SET FS_STATUS=? WHERE FS_KD_REG= ?";
        return $this->db->query($sql, $params);
    }

    function update_medis($params) {
        $sql = "UPDATE HOSPITAL.dbo.TA_TRS_KARTU_PERIKSA SET FS_ANAMNESA = ?, FS_DIAGNOSA=?, FS_TINDAKAN=?, 
        FS_CATATAN_FISIK =?, FS_KD_TIPE_BARANG=?, FN_CETAK=? WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }

    function update_tac_rj_medis($params) {
        $sql = "UPDATE PKU.dbo.TAC_RJ_MEDIS SET FS_DIAGNOSA = ?, FS_ANAMNESA = ?, FS_TINDAKAN =?, FS_TERAPI=?, FS_CATATAN_FISIK=?, 
        FS_CARA_PULANG=?,FS_DAFTAR_MASALAH=?,FS_OBAT_PROLANIS=?,mdb=?, mdd=?, FS_EKG=?, FS_USG=?, HASIL_ECHO=?, HASIL_EKG=?, HASIL_TREADMILL=?, FS_DIAGNOSA_SEKUNDER=?
        WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }


      function update_tac_rj_medisx($params) {
        $sql = "UPDATE PKU.dbo.TAC_RJ_MEDIS SET FS_DIAGNOSA = ?, FS_ANAMNESA = ?, FS_TINDAKAN =?, FS_TERAPI=?, FS_CATATAN_FISIK=?, 
        FS_CARA_PULANG=?,FS_DAFTAR_MASALAH=?,FS_OBAT_PROLANIS=?,mdb=?, mdd=?, FS_EKG=?, FS_USG=?, FS_RIW_PENYAKIT_DAHULU=?, FS_RIW_PENYAKIT_DAHULU2=?,
         FS_ALERGI=?, FS_REAK_ALERGI=?, FS_STATUS_PSIK=?, FS_HUB_KELUARGA=?, KONJUNGTIVA=?,
         DEVIASI=?, SKELERA=?, JVP=?, BIBIR=?, MUKOSA=?, THORAX=?, JANTUNG=?,
         ABDOMEN=?, PINGGANG=?, EKS_ATAS=?, EKS_BAWAH=?, DPJP_UTAMA=?, DPJP_I=?, DPJP_II=?, DPJP_III=?, KONSUL_DPJP_UTAMA=?, KONSUL_DPJP_I=?, KONSUL_DPJP_II=?, KONSUL_DPJP_III=?
        WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }


 function update_tac_rj_prb($params) {
        $sql = "UPDATE PKU.dbo.TAC_RJ_PRB SET FS_TGL_PRB = ?, FS_TUJUAN = ?
        WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    //  function insert_tac_rj_rujukan($params) {
    //     $sql = "INSERT INTO PKU.dbo.TAC_RJ_RUJUKAN(FS_KD_REG,FS_TUJUAN_RUJUKAN,FS_TUJUAN_RUJUKAN2,FS_ALASAN_RUJUK, mdb, mdd_date, mdd_time)
    //     VALUES (?,?,?,?,?,?,?)";
    //     return $this->db->query($sql, $params);
    // }

    function update_tac_rj_skdp($params) {
        $sql = "UPDATE PKU.dbo.TAC_RJ_SKDP SET FS_SKDP_1 = ?, FS_SKDP_2 = ?,FS_SKDP_KET=?,FS_SKDP_KONTROL=?,FS_KD_REG=?,FS_SKDP_FASKES=?, FS_PESAN=?, FS_RENCANA_KONTROL=?
        WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

     function update_tac_rj_rujukan($params) {
       $sql = "UPDATE PKU.dbo.TAC_RJ_RUJUKAN SET FS_TUJUAN_RUJUKAN = ?, FS_TUJUAN_RUJUKAN2 = ?,FS_ALASAN_RUJUK=?
        WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function update_ases_antenatal($params) {
        $sql = "UPDATE PKU.dbo.TAC_ASES_PER2 SET FS_ANAMNESA = ?, FS_USIA_KEHAMILAN = ?,FS_HMT=?
        WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function update_high_risk($params) {
        $sql = "UPDATE REGISTER_PASIEN SET FS_HIGH_RISK = ?, FS_NM_SUAMI=? ,FS_TGL_LAHIR_SUAMI=?
        WHERE NO_MR = ?";
        return $this->db->query($sql, $params);
    }

    function update_high_risk2($params) {
        $sql = "UPDATE REGISTER_PASIEN SET FS_HIGH_RISK = ?
        WHERE NO_MR = ?";
        return $this->db->query($sql, $params);
    }


    function update_instruksi_medis($params) {
        $sql = "UPDATE    PKU.dbo.TAC_HD_INSTRUKSI_MEDIS
        SET              informed_concent_tgl = ?, instruksi_tgl = ?, instruksi_resepHD = ?, instruksi_resepHD_TD = ?, 
        instruksi_resepHD_QB = ?, instruksi_resepHD_QD = ?, instruksi_resepHD_UFgoal = ?, instruksi_profilling_Na = ?, instruksi_profilling_NaStat = ?, instruksi_profilling_UF = ?, 
        instruksi_dialisat_asetat =?, instruksi_dialisat_bicarbonat =?, instruksi_dialisat_conductivity =?, instruksi_dialisat_conductivity_text =?, instruksi_dialisat_temperatur = ?, 
        instruksi_dialisat_temperatur_text = ?, instruksi_dosis_sirkulasi = ?, instruksi_dosis_sirkulasi_text = ?, instruksi_dosis_awal = ?, instruksi_dosis_awal_text = ?, 
        instruksi_dosis_maintenance = ?, instruksi_dosis_main = ?, instruksi_dosis_main_continue_text = ?, instruksi_dosis_main_intermitten_text = ?, instruksi_LMWH = ?, 
        instruksi_LMWH_text =?, instruksi_tanpa_heparin =?, instruksi_tanpa_heparin_text =?, instruksi_program_bilas =?, instruksi_edukasi =?, instruksi_edukasi_text =?, 
        instruksi_catatan_lain =?  WHERE FS_KD_REG= ?";
        return $this->db->query($sql, $params);
    }

    function insert_monitoring_hd($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_HD_TINDAKAN_MONITORING(FS_KD_REG,tindakan_anthd_jam,tindakan_anthd_qb,tindakan_anthd_vp,tindakan_anthd_tmp,tindakan_anthd_suhu,tindakan_anthd_td,tindakan_anthd_uf,
        tindakan_anthd_condk,tindakan_anthd_washout,tindakan_anthd_tranfusi,tindakan_anthd_makan,tindakan_anthd_urin,tindakan_anthd_muntah,tindakan_anthd_perdarahan,tindakan_anthd_keterangan,
        tindakan_anthd_nadi,mdb,mdd) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }







    function insert_riwayat_perawat($params) {
        $sql = "INSERT INTO PKU.dbo.RIWAYAT_PERBAIKAN_PERAWAT_RAJAL(FS_KD_REG,FS_SUHU,FS_NADI,FS_R,FS_TD,FS_TB,FS_BB,FS_NYERIP,FS_NYERIQ,FS_NYERIR,FS_NYERIS,FS_NYERIT,FS_NYERI,FS_CARA_BERJALAN1,FS_CARA_BERJALAN2,FS_CARA_DUDUK,FS_STATUS_PSIK,FS_STATUS_PSIK2,FS_HUB_KELUARGA,FS_ST_FUNGSIONAL,FS_AGAMA,FS_NILAI_KHUSUS,FS_ANAMNESA,FS_PENGLIHATAN,FS_PENCIUMAN,FS_PENDENGARAN,FS_EDUKASI,FS_ALERGI,FS_REAK_ALERGI,FS_RIW_PENYAKIT_DAHULU,FS_RIW_PENYAKIT_DAHULU2,FS_NUTRISI1,FS_NUTRISI2,FS_NUTRISI_ANAK1,FS_NUTRISI_ANAK2,FS_NUTRISI_ANAK3,FS_NUTRISI_ANAK4,MDB, MDD) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }


    function insert_riwayat_dokter($params) {
        $sql = "INSERT INTO PKU.dbo.RIWAYAT_PERBAIKAN_DOKTER_RAJAL(FS_KD_REG, FS_DIAGNOSA, FS_ANAMNESA, FS_TINDAKAN,  FS_TERAPI, FS_CATATAN_FISIK, FS_CARA_PULANG, FS_DAFTAR_MASALAH,  FS_EKG,   FS_USG, MDB,   MDD) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_riwayat_dokterx($params) {
        $sql = "INSERT INTO PKU.dbo.RIWAYAT_PERBAIKAN_DOKTER_RAJAL( FS_KD_REG, FS_DIAGNOSA, FS_ANAMNESA, FS_TINDAKAN,  FS_TERAPI, FS_CATATAN_FISIK, FS_CARA_PULANG, FS_DAFTAR_MASALAH, 
        FS_EKG,   FS_USG,    FS_RIW_PENYAKIT_DAHULU,   FS_RIW_PENYAKIT_DAHULU2,   FS_ALERGI,   FS_REAK_ALERGI,   FS_STATUS_PSIK,   FS_HUB_KELUARGA,   KONJUNGTIVA,   DEVIASI,   SKELERA,   JVP,   BIBIR,   MUKOSA,   THORAX,   JANTUNG,   ABDOMEN,   PINGGANG,   EKS_ATAS,   EKS_BAWAH, MDB, MDD) 
        VALUES (?,?,?,?,?,?,?,?,?,?, ?,?,?,?,?,?,?,?,?,?, ?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }


    function insert_riwayat_ases_awal_dokter($params) {
        $sql = "INSERT INTO PKU.dbo.RIWAYAT_PERBAIKAN_ASES_AWAL_MEDIS_RANAP(FS_KD_REG, FS_DIAGNOSA, FS_ANAMNESA, FS_TINDAKAN,  FS_TERAPI,  FS_CATATAN_FISIK, FS_DAFTAR_MASALAH,  FS_LAB,  FS_RAD,  FS_HASIL_PEMERIKSAAN_PENUNJANG, FS_PESAN, FS_RIW_PENYAKIT_DAHULU, FS_RIW_PENYAKIT_DAHULU2, FS_ALERGI, FS_REAK_ALERGI, FS_STATUS_PSIK, KONJUNGTIVA, DEVIASI, SKELERA, JVP, BIBIR, MUKOSA, THORAX, JANTUNG, ABDOMEN, PINGGANG, EKS_ATAS, EKS_BAWAH, MDB, MDD ) 
        VALUES (?,?,?,?,?,?,?,?,?,?, ?,?,?,?,?,?,?,?,?,?, ?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }


   

    function insert_riwayat_resume($params) {  
        $sql = "INSERT INTO PKU.dbo.RIWAYAT_PERBAIKAN_RESUME (FS_KD_REG, DIET, DIAG_SEKUNDER, INDIKASI_RAWAT, TINDAKAN, PULANG_TERAPI, FS_SEBAB_KEMATIAN, DOKTER, PERAWAT, FS_KELUHAN_UTAMA,FS_RIWAYAT_PENYAKIT,
                FS_PEMERIKSAAN_FISIK,FS_PEMERIKSAAN_PENUNJANG,FS_TERAPI,FS_HASIL_LAB,FS_ALERGI,FS_INSTRUKSI,FS_KD_LAYANAN,FD_TGL_KONTROL,
                FS_JAM_KONTROL,FS_DIAG_UTAMA,FS_KEADAAN_UMUM_BAIK,FS_KEADAAN_UMUM_MASIH_SAKIT,FS_KEADAAN_UMUM_SESAK,FS_KEADAAN_UMUM_PUCAT,
                FS_KEADAAN_UMUM_LEMAH,FS_KEADAAN_UMUM_LAIN,FS_SUHU,FS_NADI,FS_R,FS_TD,FS_CAT_HAL_PENTING,FS_CARA_PULANG,FS_STATUS,
                FS_PEM_FISIK1,FS_PEM_FISIK2,FS_PEM_FISIK3,FS_PEM_FISIK4,FS_PEM_FISIK5,FS_PEM_FISIK6,FS_PEM_FISIK7,FS_PEM_FISIK8,
                FS_INSTRUKSI1,FS_INSTRUKSI2,FS_INSTRUKSI3,FS_INSTRUKSI4,FS_INSTRUKSI5,FS_SUHU1,FS_NADI1,FS_R1,FS_TD1,FD_TGL_PULANG,FS_KD_LAYANAN2,FD_TGL_KONTROL2,
                FS_JAM_KONTROL2,FS_KET_INDIKASI,FS_KET_KONTROL,FS_KET_KONTROL2, MDB,MDD)
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }


   
     function insert_riwayat_ases_bidan($params) {  
        $sql = "INSERT INTO PKU.dbo.RIWAYAT_PERBAIKAN_ASES_AWAL_BIDAN( FS_KD_REG, FS_SUHU, FS_NADI, FS_R, FS_TD, FS_TB, FS_BB, FS_NYERIP, FS_NYERIQ, FS_NYERIR, FS_NYERIS, FS_NYERIT, FS_NYERI, FS_SCORE, 
        FS_RIW_PENYAKIT_DAHULU, FS_RIW_PENYAKIT_DAHULU2, FS_STATUS_PSIK, FS_STATUS_PSIK2, FS_AGAMA, FS_NILAI_KHUSUS, FS_NILAI_KHUSUS2, 
        FS_PEMERIKSAAN_FISIK, FS_ANAMNESA,  FS_HAID_MEN,  FS_HAID_SIKLUS,  FS_HAID_LAMA,  FS_HAID_HPHT,  FS_HAID_HPL,  FS_HAID_KELUHAN, 
         FS_STATUS_PERKAWINAN,  FS_LAMA_MENIKAH,  RIWAYAT_KEHAMILAN,  FS_ASMA_MULAI,  FS_ASMA_TERAPI,  FS_JANTUNG_MULAI,  FS_JANTUNG_TERAPI,  FS_DIABETES_MULAI,  FS_DIABETES_TERAPI,  FS_HIPERTENSI_MULAI,  FS_HIPERTENSI_TERAPI,  FS_SAKIT_LAIN,  FS_RIWAYAT_GYNEKOLOGI,  FS_RIWAYAT_KB,  FS_RIWAYAT_KOMPLIKASI_KB,  POLA_MAKAN,  POLA_MINUM,  POLA_BAK,  POLA_BAB,  JAM_TERAKHIR_MAKAN,  JAM_TERAKHIR_MINUM,  JAM_TERAKHIR_BAK,  JAM_TERAKHIR_BAB,  RUMAH_MILIK,  TINGGAL_BERSAMA,  PJ_DARURAT,  HUBUNGAN_PJ,  AKTIFITAS,  SOSIAL_SUPPORT,  PENERIAMAAN_PERSALINAN,  KEADAAN_UMUM,  ALAT_BANTU,  MATA,  KEPALA,  TELINGA,  HIDUNG,  TENGGOROKAN,  LEHER,  DADA,  JANTUNG,  PARU_PARU,  ABDOMEN,  BADAN_GERAK_ATAS,  BADAN_GERAK_BAWAH,  SCLERA,  KONJUNGTIVA,  CEK_DADA,  INSPEKSI_ABDOMEN,  LEOPOD_1,  LEOPOD_2,  LEOPOD_3,  LEOPOD_4,  AUSKULTASI,  KONTRAKSI,  INSPEKSI_ANO_GENITAS,  VAGINA_TOUCHER,  MASALAH_KEBIDANAN,  DIAGNOSA,  NAMA_SUAMI,  TGL_LAHIR_SUAMI,  AGAMA_SUAMI,  PENDIDIKAN_SUAMI,  JOB_SUAMI,  FS_ALERGI, FS_REAK_ALERGI,  FS_NUTRISI1, FS_NUTRISI2,  FS_FUNGSIONAL_1, FS_FUNGSIONAL_2, FS_FUNGSIONAL_3, FS_FUNGSIONAL_4, FS_FUNGSIONAL_5, FS_FUNGSIONAL_6, FS_FUNGSIONAL_7, FS_FUNGSIONAL_8, FS_FUNGSIONAL_9, FS_FUNGSIONAL_10, MDB, MDD
       )
          VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }


    function insert_riwayat_ases_perawat($params) {  
        $sql = "INSERT INTO PKU.dbo.RIWAYAT_PERBAIKAN_ASES_AWAL_PERAWAT(FS_KD_REG, FS_SUHU, FS_NADI, FS_R, FS_TD, FS_TB, FS_BB,  FS_NYERIP, FS_NYERIQ, FS_NYERIR, FS_NYERIS, FS_NYERIT, FS_NYERI,  FS_SCORE,   FS_STATUS_PSIK, FS_STATUS_PSIK2, FS_HUB_KELUARGA, FS_AGAMA, FS_NILAI_KHUSUS, FS_NILAI_KHUSUS2, FS_PEMERIKSAAN_FISIK, FS_ANAMNESA, MENIKAH, SUKU, JOB, MENTAL, KESADARAN, GCS,  HAMIL, IRAMA_NAFAS, BATUK, POLA_NAFAS, SUARA_NAFAS, BANTU_NAFAS, NYERI_DADA, AKRAL, PERDARAHAN,  CYANOSIS, CRT, TURGOR, REFLEK_CAHAYA, PUPIL, LUMPUH, PUSING, BAK, BAK_TEKAN, URINE, BAB, ABDOMEN, BAB_TEKAN, JEJAS_ABDOMEN, SENDI, DISLOK, FRAKTUR, LUKA, KURSI_RODA, ALVI, RIWAYAT_DEKUBITUS, USIA65, ANAK_SESUAI_UMUR, FS_ALERGI, FS_REAK_ALERGI, FS_RIW_PENYAKIT_DAHULU, FS_RIW_PENYAKIT_DAHULU2, FS_NUTRISI1, FS_NUTRISI2, FS_FUNGSIONAL_1, FS_FUNGSIONAL_2, FS_FUNGSIONAL_3, FS_FUNGSIONAL_4, FS_FUNGSIONAL_5, FS_FUNGSIONAL_6, FS_FUNGSIONAL_7, FS_FUNGSIONAL_8, FS_FUNGSIONAL_9, FS_FUNGSIONAL_10, MDB, MDD )
          VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }


    function get_cppt_by_id($params) {
        $sql = "SELECT a.*,b.NAMALENGKAP,d.role_id,RIGHT(mdd_date,2) 'TGL',
        e.NAMALENGKAP 'FS_NM_MEDIS_VERIF'
        FROM PKU.dbo.TAC_RI_CPPT a
        LEFT JOIN DB_RSMM.dbo.TUSER b ON a.mdb=b.NAMAUSER
        LEFT JOIN PKU.dbo.TAC_COM_USER c ON a.mdb=c.user_name
        LEFT JOIN PKU.dbo.TAC_COM_ROLE_USER d ON c.user_id=d.user_id
        LEFT JOIN DB_RSMM.dbo.TUSER e ON a.FS_KD_MEDIS_VERIF = e.NAMAUSER
        WHERE FS_KD_TRS=?
        ORDER BY mdd_date DESC,mdd_time DESC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function get_rencana_kep_by_rg($params) {
        $sql = "SELECT top 1 a.*,FS_NM_DIAGNOSA,FS_NM_NOC,FS_NM_INDIKATOR,FS_NM_NIC,NAMALENGKAP
        FROM PKU.dbo.TAC_RI_RENC_KEP a
        INNER JOIN PKU.dbo.TAC_COM_NIC d ON a.FS_KD_NIC=d.FS_KD_NIC
        INNER JOIN PKU.dbo.TAC_COM_INDIKATOR e ON a.FS_KD_INDIKATOR=e.FS_KD_INDIKATOR
        INNER JOIN PKU.dbo.TAC_COM_NOC f ON a.FS_KD_NOC=f.FS_KD_NOC
        INNER JOIN PKU.dbo.TAC_COM_DAFTAR_DIAG g ON a.FS_KD_DAFTAR_DIAGNOSA=g.FS_KD_DAFTAR_DIAGNOSA
        LEFT JOIN DB_RSMM.dbo.TUSER h ON a.mdb=h.NAMAUSER
        WHERE a.FS_KD_REG=? order by a.FS_KD_TRS DESC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function get_all_rm17_by_rg($params) {
        $sql = "SELECT top 1 * FROM PKU.dbo.TAB_RM_17 WHERE FS_KD_REG = ? order by FS_KD_RM17 desc";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }



    function get_cppt_by_rg($params) {
        $sql = "SELECT top 1 a.*,b.NAMALENGKAP,d.role_id,RIGHT(mdd_date,2) 'TGL',
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


    function get_tindakan_kep_by_rg($params) {
        $sql = "SELECT top 1 a.*,b.NAMALENGKAP,c.FS_NM_KEP_TINDAKAN
        FROM PKU.dbo.TAC_RI_TIND_KEP a
        LEFT JOIN DB_RSMM.dbo.TUSER b ON a.mdb=b.NAMAUSER
        LEFT JOIN PKU.dbo.TAC_COM_KEP_TINDAKAN c ON a.FS_KD_TRS_KEP_TINDAKAN=c.FS_KD_TRS
        WHERE FS_KD_REG = ?
        ORDER BY a.FS_KD_TRS DESC";
         $query = $this->db->query($sql, $params);
         if ($query->num_rows() > 0) {
             $result = $query->row_array();
             $query->free_result();
             return $result;
         } else {
             return array();
         }
     }
 


      function insert_riwayat_ews($params) {
        $sql = "INSERT INTO PKU.dbo.RIWAYAT_PERBAIKAN_EWS(IDEWS,FS_KD_REG, TGL, JAM, NAFAS, S_NAFAS, O2, S_O2, AB, S_AB, S, S_S, J, S_J, TD, S_TD, SADAR, S_SADAR, MDD,  MDB, MDD2, MDB2)
        VALUES     (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }



    function get_data_ews($params) { 
        $sql = "SELECT * FROM PKU.dbo.EWS  
        WHERE id = ?  ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) { 
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


    function delete_ews($params) {
        $sql = "DELETE PKU.dbo.EWS 
        WHERE ID = ?";
        return $this->db->query($sql, $params);
    }


 function insert_riwayat_ews_anak($params) {
        $sql = "INSERT INTO PKU.dbo.RIWAYAT_PERBAIKAN_EWS_ANAK(IDEWS,FS_KD_REG, TGL, JAM, NAFAS, RETRAKSI, S_RETRAKSI, CRT, S_CRT, S_NAFAS, O2, S_O2, AB, S_AB, S, S_S, J, S_J, TD, S_TD, SADAR, S_SADAR, MDD,  MDB, MDD2, MDB2)
        VALUES     (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }


    function get_data_ews_anak($params) { 
        $sql = "SELECT * FROM PKU.dbo.EWS_ANAK  
        WHERE id = ?  ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) { 
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


    function delete_ews_anak($params) {
        $sql = "DELETE PKU.dbo.EWS_ANAK 
        WHERE ID = ?";
        return $this->db->query($sql, $params);
    }


    function insert_riwayat_ews_hamil($params) {
        $sql = "INSERT INTO PKU.dbo.RIWAYAT_PERBAIKAN_EWS_HAMIL(IDEWS,FS_KD_REG, TGL, JAM, NAFAS,   S_NAFAS, FREKUENSI, O2, S_O2, AB, S_AB, S, S_S, J, S_J, TD, S_TD, D, S_D,  SADAR, S_SADAR, MDD,  MDB, MDD2, MDB2)
        VALUES     (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function get_data_ews_hamil($params) { 
        $sql = "SELECT * FROM PKU.dbo.EWS_HAMIL  
        WHERE id = ?  ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) { 
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


    function delete_ews_hamil($params) {
        $sql = "DELETE PKU.dbo.EWS_HAMIL 
        WHERE ID = ?";
        return $this->db->query($sql, $params);
    }

    function update_cppt($params) {
        $sql = "UPDATE   PKU.dbo.TAC_RI_CPPT SET FS_KD_REG=?,  FS_CPPT_S=?, FS_CPPT_O=?,
         FS_CPPT_A=?, FS_CPPT_P=?,FS_CPPT_TERAPI=?,FS_KD_KP=?, mdb=?, mdd_date=?, mdd_time=?, FS_LAB=?, FS_RAD=?, TGL_TUJUAN_LAB=?, jenis_cppt=? 
         WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }

    function insert_riwayat_cppt($params) {
        $sql = "INSERT INTO PKU.dbo.RIWAYAT_PERBAIKAN_CPPT(FS_KD_REG, FS_CPPT_S, FS_CPPT_O,
         FS_CPPT_A, FS_CPPT_P,FS_CPPT_TERAPI,FS_KD_KP, mdb, mdd_date, mdd_time, FS_LAB, FS_RAD, TGL_TUJUAN_LAB, FS_KD_TRS)
        VALUES     (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }


    function insert_riwayat_program_obat($params) {
        $sql = "INSERT INTO PKU.dbo.RIWAYAT_PERBAIKAN_PROGRAM_OBAT(FS_KD_RM17, FS_KD_REG,FD_TGL_PEMBERIAN_OBAT,FS_JENIS_OBAT,FS_NAMA_OBAT,FS_DOSIS_OBAT,FS_RUTE,FS_INTERVAL,FS_KET,
        FS_KET2, MDB,MDD, STATUS )
        VALUES     (?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }


    function insert_riwayat_catatan_obat($params) {
        $sql = "INSERT INTO PKU.dbo.RIWAYAT_PERBAIKAN_CATATAN_PEMBERIAN_OBAT(FS_KD_RM17_DETAIL, FS_KD_RM17, FS_KD_REG, FS_CHK_OBAT,FS_CHK_DOSIS,
        FS_CHK_PASIEN,FS_CHK_RUTE,FD_WAKTU,FS_KD_PEG,FS_KD_PEG2,
        FS_KD_PEG3,mdb,mdd)
        VALUES     (?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }


    function insert_riwayat_jatuh($params) {
        $sql = "INSERT INTO PKU.dbo.RIWAYAT_PERBAIKAN_ASESMEN_JATUH(FS_KD_REG, FS_KD_TRS, FS_TIPE_RESIKO_JATUH, mdb,mdd)
        VALUES     (?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_riwayat_tindakan($params) {
        $sql = "INSERT INTO PKU.dbo.RIWAYAT_PERBAIKAN_TINDAKAN_KEP(FS_KD_REG, FS_KD_TRS, FS_TINDKAN_KEP, FD_TGL_TINDKAN_KEP,FD_JAM_TINDKAN_KEP, mdb,mdd)
        VALUES     (?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }


    function insert_riwayat_rencana_kep($params) {
        $sql = "INSERT INTO PKU.dbo.RIWAYAT_PERBAIKAN_REN_KEP(FS_KD_REG,FS_KD_TRS,FS_KD_DAFTAR_DIAGNOSA,FS_KD_NOC,  FD_TGL_DICAPAI, FD_JAM_DICAPAI, FD_KD_NIC, FS_KD_INDIKATOR, mdb,mdd)
        VALUES     (?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }


    function update_riwayat_rencana_kep($params) {
        $sql = "UPDATE PKU.dbo.TAC_RI_RENC_KEP SET  FS_KD_DAFTAR_DIAGNOSA=?,FS_KD_NOC=?,  FD_TGL_DICAPAI=?, FD_JAM_DICAPAI=?, FS_KD_NIC=?, FS_KD_INDIKATOR=?, mdb=?,mdd=?
                WHERE FS_KD_TRS = ? ";
        return $this->db->query($sql, $params);
    }


    function delete_rincian($params) {
        $sql = "DELETE PKU.dbo.TAC_RI_RENC_KEP2 
        WHERE FS_KD_RENC_KEP = ?";
        return $this->db->query($sql, $params);
    }

    
    function delete_ases_jatuh2($params) {
        $sql = "DELETE PKU.dbo.TAC_RI_JATUH2 
        WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }


    function delete_tindakan($params) {
        $sql = "DELETE PKU.dbo.TAC_RI_TIND_KEP 
        WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }

    function delete_rencana_kep1($params) {
        $sql = "DELETE PKU.dbo.TAC_RI_RENC_KEP 
        WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }

    
 
    function get_data_program_obat($params) { 
        $sql = "SELECT * FROM PKU.dbo.TAB_RM_17  
        WHERE FS_KD_RM17 = ?  ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) { 
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


    function get_data_jatuh_by_id($params) { 
        $sql = " select A.* from  PKU.dbo.TAC_RI_JATUH2 A, PKU.dbo.TAC_RI_JATUH3 B where A.FS_KD_TRS=B.FS_KD_JATUH2 and B.FS_KD_TRS= ? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) { 
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_tindakan_by_id($params) { 
        $sql = " select * from  PKU.dbo.TAC_RI_TIND_KEP where FS_KD_TRS = ? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) { 
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


    function get_rencana_kep_by_id($params) { 
        $sql = " SELECT a.*,FS_NM_DIAGNOSA,FS_NM_NOC,FS_NM_INDIKATOR,FS_NM_NIC,NAMALENGKAP
        FROM PKU.dbo.TAC_RI_RENC_KEP a
        INNER JOIN PKU.dbo.TAC_COM_NIC d ON a.FS_KD_NIC=d.FS_KD_NIC
        INNER JOIN PKU.dbo.TAC_COM_INDIKATOR e ON a.FS_KD_INDIKATOR=e.FS_KD_INDIKATOR
        INNER JOIN PKU.dbo.TAC_COM_NOC f ON a.FS_KD_NOC=f.FS_KD_NOC
        INNER JOIN PKU.dbo.TAC_COM_DAFTAR_DIAG g ON a.FS_KD_DAFTAR_DIAGNOSA=g.FS_KD_DAFTAR_DIAGNOSA
        LEFT JOIN DB_RSMM.dbo.TUSER h ON a.mdb=h.NAMAUSER
        WHERE a.FS_KD_TRS = ? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) { 
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }



    function get_daftar_noc_by_id($params) {
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


    function get_daftar_indikator_by_id($params) {
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

    function get_daftar_nic2_by_id($params) {
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


    function get_daftar_nic_by_id($params) {
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
    


    function update_tindakan_kep($params) {
        $sql = "UPDATE PKU.dbo.TAC_RI_TIND_KEP SET  FS_TINDKAN_KEP=?, FD_TGL_TINDKAN_KEP=?, FD_JAM_TINDKAN_KEP=?, mdb=?, mdd=?, mdd_time=?
        WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }




    function get_data_catatan_obat($params) { 
        $sql = "SELECT * FROM PKU.dbo.TAB_RM_17_1  
        WHERE FS_KD_RM17_DETAIL = ?  ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) { 
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }



    function get_data_rencana_kep($params) { 
        $sql = "SELECT * FROM PKU.dbo.TAC_RI_RENC_KEP  
        WHERE FS_KD_TRS = ?  ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) { 
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }



    function delete_ases($params) {
        $sql = "DELETE PKU.dbo.TAC_ASES_PER2 
        WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function delete_masalah_kep($params) {
        $sql = "DELETE PKU.dbo.TAC_RJ_MASALAH_KEP 
        WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function delete_rencana_kep($params) {
        $sql = "DELETE PKU.dbo.TAC_RJ_REN_KEP 
        WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function delete_riw_kehamilan($params) {
        $sql = "DELETE PKU.dbo.TAC_RJ_ASES_KEBID2 
        WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }

    function delete_tindakan_monitoring($params) {
        $sql = "DELETE FROM PKU.dbo.TAC_HD_TINDAKAN_MONITORING WHERE FS_KD_HD_TINDAKAN_MONITORING = ?";
        return $this->db->query($sql, $params);
    }
    
    function delete_pemeriksaan_lab($params) {
        $sql = "DELETE FROM PKU.dbo.ta_trs_kartu_periksa4 WHERE FS_KD_REG2 = ?";
        return $this->db->query($sql, $params);
    }
    function delete_pemeriksaan_rad($params) {
        $sql = "DELETE FROM PKU.dbo.ta_trs_kartu_periksa5 WHERE FS_KD_REG2 = ?";
        return $this->db->query($sql, $params);
    }
    
    function delete_pemeriksaan_lab_skdp($params) {
        $sql = "DELETE FROM PKU.dbo.ta_trs_kartu_periksa4 WHERE FS_KD_REG3 = ?";
        return $this->db->query($sql, $params);
    }
    function delete_pemeriksaan_rad_skdp($params) {
        $sql = "DELETE FROM PKU.dbo.ta_trs_kartu_periksa5 WHERE FS_KD_REG3 = ?";
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

    function get_px_by_riw_kehamilan_by_rg($params) {
        $sql = "SELECT * FROM
        PKU.dbo.TAC_RJ_ASES_KEBID2
        WHERE FS_KD_REG = ?
        ORDER BY FS_RIW_KEHAMILAN_THN_PARTUS ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_px_by_riw_kehamilan_by_trs($params) {
        $sql = "SELECT * FROM
        PKU.dbo.TAC_RJ_ASES_KEBID2
        WHERE FS_KD_TRS = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function get_cek_skdp($params) {
        $sql = "SELECT * FROM
        PKU.dbo.TAC_RJ_SKDP
        WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    function get_cek_skdp2($params) {
        $sql = "SELECT * FROM
        PKU.dbo.TAC_RJ_SKDP
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

     function get_cek_prb($params) {
        $sql = "SELECT * FROM
        PKU.dbo.TAC_RJ_PRB
        WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

      function get_cek_rjrs($params) {
        $sql = "SELECT * FROM
       PKU.dbo.TAC_RJ_RUJUKAN
        WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    

     function get_data_faskes($params) {
        $sql = "SELECT a.*,c.NAMA_DOKTER,b.user_name
        FROM PKU.dbo.TAC_RJ_PRB a
        LEFT JOIN PKU.dbo.TAC_COM_USER b ON a.mdb=b.user_id
        LEFT JOIN DOKTER c ON b.user_name=c.KODE_DOKTER
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

    function get_dokter_fis($params){
        $sql = "SELECT KODE_DOKTER,NAMA_DOKTER FROM
        DB_RSMM.dbo.DOKTER
        WHERE JENIS_PROFESI = 'PERAWAT' OR JENIS_PROFESI = 'DOKTER SPESIALIS' and KODE_DOKTER NOT IN('140s','TM140') 
        ORDER BY NAMA_DOKTER ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }



    function get_dokter($params) {
        $sql = "SELECT KODE_DOKTER,NAMA_DOKTER FROM
        DB_RSMM.dbo.DOKTER
        WHERE JENIS_PROFESI = 'DOKTER UMUM' OR JENIS_PROFESI = 'DOKTER SPESIALIS' and KODE_DOKTER NOT IN('140s','TM140') 
        ORDER BY NAMA_DOKTER ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_dokter2($params) {
        $sql = "SELECT a.FS_KD_PEG,a.FS_NM_PEG FROM
        HOSPITAL.dbo.TD_PEG a
        WHERE a.FS_KD_PEG = ? AND a.FB_AKTIF_DINAS = '1'
        ORDER BY a.FS_NM_PEG ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_dokter_by_id($params) {
        $sql = "SELECT a.FS_KD_PEG,a.FS_NM_PEG FROM
        HOSPITAL.dbo.TD_PEG a
        WHERE a.FS_KD_PEG = ? AND a.FB_AKTIF_DINAS = '1'
        ORDER BY a.FS_NM_PEG ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_px_by_dokter_wait($params) {
        $sql = "SELECT a.NOMOR,a.NO_MR,a.TANGGAL,c.Kode_Dokter, b.NAMA_PASIEN,b.ALAMAT, b.KOTA,b.PROVINSI,b.NO_MR,d.FS_STATUS,
        e.FS_CARA_PULANG,e.FS_TERAPI,e.FS_KD_TRS,c.NO_REG, c.KODEREKANAN, e.HASIL_ECHO
        from ANTRIAN a
        LEFT JOIN REGISTER_PASIEN b ON a.NO_MR=b.NO_MR
        LEFT JOIN PENDAFTARAN c ON a.NO_MR=c.NO_MR
        LEFT JOIN PKU.dbo.TAC_RJ_STATUS d ON c.NO_REG = d.FS_KD_REG
        LEFT JOIN PKU.dbo.TAC_RJ_MEDIS e ON c.NO_REG = e.FS_KD_REG
        WHERE 
        a.TANGGAL=? AND DOKTER = ? AND c.TANGGAL = ? AND c.Kode_Dokter = ?
        ORDER BY NOMOR";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_px_by_dokter_igd($params) {
        $now = date('Y-m-d'); 

        $date = new DateTime();
        $date_plus = $date->modify("-1 days");
        $akhirnya= $date_plus->format("Y-m-d");

        $sql = "SELECT E.NO_REG, B.NO_MR, B.NAMA_PASIEN, B.TGL_LAHIR, B.JENIS_KELAMIN, B.ALAMAT, D.D_PLANNING, D.FS_KD_REG, D.FS_TERAPI, D.id, D.rad, D.lab, F.STATUS_IGD
       FROM REGISTER_PASIEN B,  PENDAFTARAN E 
       LEFT JOIN PKU.dbo.IGD_AWAL_MEDIS D ON E.NO_REG = D.FS_KD_REG
       LEFT JOIN PKU.dbo.TAC_STATUS_IGD F ON E.NO_REG = F.FS_KD_REG

       WHERE B.NO_MR=E.NO_MR AND E.STATUS='1' and E.KODE_MASUK='1' and (E.TANGGAL= ? or E.TANGGAL='$akhirnya')";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

      function get_px_by_dokter_wait2($params) {
        $sql = "SELECT a.NOMOR,a.NO_MR,b.NAMA_PASIEN,b.ALAMAT, b.KOTA,b.PROVINSI,b.NO_MR,d.FS_STATUS,
        e.FS_CARA_PULANG,e.FS_TERAPI,e.FS_KD_TRS,c.NO_REG 
        from ANTRIAN a
        LEFT JOIN REGISTER_PASIEN b ON a.NO_MR=b.NO_MR
        LEFT JOIN PENDAFTARAN c ON a.NO_MR=c.NO_MR
        LEFT JOIN PKU.dbo.TAC_RJ_STATUS d ON c.NO_REG = d.FS_KD_REG
        LEFT JOIN PKU.dbo.TAC_RJ_MEDIS e ON c.NO_REG = e.FS_KD_REG
        WHERE 
        a.TANGGAL=?  AND c.TANGGAL = ? AND c.Kode_Dokter = ?
        ORDER BY NOMOR";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

     function get_cek_radnya($params) {
        $sql = "SELECT * FROM
        PKU.dbo.TA_TRS_KARTU_PERIKSA5
        WHERE FS_KD_REG3 = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return  array();
        }
    }

   function get_cek_resume($params) {
        $sql = "SELECT * FROM
        PKU.dbo.TAB_PX_PULANG_RESUME
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



    function get_px_by_dokter_finish_perawat($params) {
        $sql = "SELECT a.FS_KD_REG,b.FS_NM_PASIEN,FN_NO_URUT,a.FS_MR,b.FS_ALM_PASIEN,
        FS_STATUS
        FROM HOSPITAL.dbo.TA_REGISTRASI a
        INNER JOIN HOSPITAL.dbo.TC_MR b ON a.FS_MR=b.FS_MR
        LEFT JOIN HOSPITAL.dbo.TA_TRS_ANTRIAN c ON a.FS_KD_REG = c.FS_KD_REG
        LEFT JOIN PKU.dbo.TAC_RJ_STATUS d ON a.FS_KD_REG = d.FS_KD_REG
        WHERE a.FD_TGL_MASUK = ? AND a.FD_TGL_VOID = '3000-01-01'
        AND a.FS_KD_JENIS_REG <> '1' AND FS_KD_MEDIS = ?
        AND FS_STATUS = '1'
        ORDER BY c.FN_NO_URUT";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    } 

    function get_px_by_dokter_wait_dokter($params) {
        $sql = "SELECT a.NOMOR,a.NO_MR,b.NAMA_PASIEN,b.ALAMAT, b.KOTA,b.PROVINSI, b.KOTA,b.PROVINSI,b.NO_MR,d.FS_STATUS,e.mdb,
        f.NAMA_DOKTER,e.FS_TERAPI,c.NO_REG,e.FS_KD_TRS 
        from ANTRIAN a
        LEFT JOIN REGISTER_PASIEN b ON a.NO_MR=b.NO_MR
        LEFT JOIN PENDAFTARAN c ON a.NO_MR=c.NO_MR
        LEFT JOIN PKU.dbo.TAC_RJ_STATUS d ON c.NO_REG = d.FS_KD_REG
        LEFT JOIN PKU.dbo.TAC_RJ_MEDIS e ON c.NO_REG = e.FS_KD_REG
        LEFT JOIN DB_RSMM.dbo.DOKTER f ON e.mdb = f.KODE_DOKTER
        WHERE 
        a.TANGGAL=? AND DOKTER = ? AND c.TANGGAL = ? AND c.Kode_Dokter = ?
        ORDER BY NOMOR";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


 function get_px_by_dokter_wait_dokter_aja($params) {
        $sql = "SELECT a.NOMOR,a.NO_MR,b.NAMA_PASIEN,b.ALAMAT, b.KOTA,b.PROVINSI,b.NO_MR,d.FS_STATUS,
       c.NO_REG, c.Kode_Masuk, e.KET_MASUK
        from ANTRIAN a
        LEFT JOIN REGISTER_PASIEN b ON a.NO_MR=b.NO_MR
        LEFT JOIN PENDAFTARAN c ON a.NO_MR=c.NO_MR
        LEFT JOIN M_CARAMASUK e ON c.Kode_Masuk=e.KODE_MASUK
        LEFT JOIN PKU.dbo.TAC_RJ_STATUS d ON c.NO_REG = d.FS_KD_REG
      
        WHERE 
        a.TANGGAL=? AND DOKTER = ? AND c.TANGGAL = ? AND c.Kode_Dokter = ?
        ORDER BY NOMOR";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


 
    function get_px_by_dokter_wait_dokter1($params) {
        $sql = "SELECT a.NOMOR,a.NO_MR,b.NAMA_PASIEN,b.ALAMAT, b.KOTA,b.PROVINSI,b.NO_MR,d.FS_STATUS,e.mdb,
        f.NAMA_DOKTER,e.FS_TERAPI,c.NO_REG,e.FS_KD_TRS 
        from ANTRIAN a
        LEFT JOIN REGISTER_PASIEN b ON a.NO_MR=b.NO_MR
        LEFT JOIN PENDAFTARAN c ON a.NO_MR=c.NO_MR
        LEFT JOIN PKU.dbo.TAC_RJ_STATUS d ON c.NO_REG = d.FS_KD_REG
        LEFT JOIN PKU.dbo.TAC_RJ_MEDIS e ON c.NO_REG = e.FS_KD_REG
        LEFT JOIN DB_RSMM.dbo.DOKTER f ON e.mdb = f.KODE_DOKTER
        WHERE 
        a.TANGGAL=? AND c.TANGGAL = ? AND (c.Kode_Dokter = ? or c.Kode_Dokter ='100') 
        ORDER BY NOMOR";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }



      function get_px_by_dokter_wait_dokter10($params) {
        $sql = "SELECT b.NAMA_PASIEN,b.ALAMAT, b.KOTA,b.PROVINSI,b.NO_MR,d.FS_STATUS,e.mdb,
        f.NAMA_DOKTER,e.FS_TERAPI,c.NO_REG,e.FS_KD_TRS 
        from PENDAFTARAN c
        LEFT JOIN REGISTER_PASIEN b ON c.NO_MR=b.NO_MR 
        LEFT JOIN PKU.dbo.TAC_RJ_STATUS d ON c.NO_REG = d.FS_KD_REG
        LEFT JOIN PKU.dbo.TAC_RJ_MEDIS e ON c.NO_REG = e.FS_KD_REG
        LEFT JOIN DB_RSMM.dbo.DOKTER f ON e.mdb = f.KODE_DOKTER
        WHERE 
        c.TANGGAL = ? AND (c.Kode_Dokter = ? or c.Kode_Dokter ='100' or c.KODE_MASUK=1) 
       ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function get_px_by_dokter_wait_dokter_hd($params) {
        $sql = "SELECT a.FS_KD_REG,b.FS_NM_PASIEN,FN_NO_URUT,a.FS_MR,b.FS_ALM_PASIEN,
        FS_STATUS,FS_TERAPI,e.FS_KD_TRS,f.FS_NM_PEG
        FROM HOSPITAL.dbo.TA_REGISTRASI a
        INNER JOIN HOSPITAL.dbo.TC_MR b ON a.FS_MR=b.FS_MR
        LEFT JOIN HOSPITAL.dbo.TA_TRS_ANTRIAN c ON a.FS_KD_REG = c.FS_KD_REG
        LEFT JOIN TAC_RJ_STATUS d ON a.FS_KD_REG = d.FS_KD_REG
        LEFT JOIN TAC_RJ_MEDIS e ON a.FS_KD_REG=e.FS_KD_REG
        LEFT JOIN HOSPITAL.dbo.TD_PEG f ON e.FS_KD_MEDIS=f.FS_KD_PEG
        WHERE a.FD_TGL_MASUK = ? AND a.FD_TGL_VOID = '3000-01-01'
        AND a.FS_KD_JENIS_REG <> '1'
        AND a.FS_KD_LAYANAN = 'P023'
        ORDER BY c.FN_NO_URUT";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_px_by_dokter_wait_farmasi($params) {
        $sql = "SELECT a.FS_KD_REG,b.FS_NM_PASIEN,FN_NO_URUT,a.FS_MR,b.FS_ALM_PASIEN,
        FS_STATUS
        FROM HOSPITAL.dbo.TA_REGISTRASI a
        INNER JOIN HOSPITAL.dbo.TC_MR b ON a.FS_MR=b.FS_MR
        LEFT JOIN HOSPITAL.dbo.TA_TRS_ANTRIAN c ON a.FS_KD_REG = c.FS_KD_REG
        LEFT JOIN PKU.dbo.TAC_RJ_STATUS d ON a.FS_KD_REG = d.FS_KD_REG
        WHERE a.FD_TGL_MASUK = ? AND a.FD_TGL_VOID = '3000-01-01'
        AND a.FS_KD_JENIS_REG <> '1' AND FS_KD_MEDIS = ?
        AND FS_STATUS = '2'
        ORDER BY c.FN_NO_URUT";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_px_by_farmasi($params) {
        $sql = "SELECT b.NO_REG,a.NAMA_PASIEN,a.NO_MR, a.ALAMAT, a.KOTA, a.PROVINSI, A.JENIS_KELAMIN,
        a.TGL_LAHIR,a.FS_ALERGI,a.FS_REAK_ALERGI,a.FS_RIW_PENYAKIT_DAHULU,a.FS_RIW_PENYAKIT_DAHULU2,c.SPESIALIS,
        b.TANGGAL,b.KODE_DOKTER,a.FS_HIGH_RISK,d.FS_KD_TRS,e.FS_STATUS,d.FS_TERAPI,c.NAMA_DOKTER
        FROM DB_RSMM.dbo.REGISTER_PASIEN a
        LEFT JOIN DB_RSMM.dbo.PENDAFTARAN b ON a.NO_MR=b.NO_MR
        LEFT JOIN DB_RSMM.dbo.DOKTER c ON b.KODE_DOKTER=c.KODE_DOKTER
        LEFT JOIN PKU.dbo.TAC_RJ_MEDIS d ON b.NO_REG=d.FS_KD_REG
        LEFT JOIN PKU.dbo.TAC_RJ_STATUS e ON b.NO_REG=e.FS_KD_REG
        WHERE b.NO_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_px_history($params) {
        $sql = "SELECT a.NOREG,b.NAMAPASIEN,a.NOPASIEN,a.TGLREG,d.NAMADOKTER
        ,e.NAMABAGIAN,MAX_RG,g.FS_STATUS,h.FS_KD_MEDIS,
        g.FS_KD_TRS,g.FS_FORM,NAMABAGIAN,ASALREG,c.KODEDOKTER
        FROM DBHOSPITAL.dbo.REGPAS a
        INNER JOIN DBHOSPITAL.dbo.PASIEN b ON a.NOPASIEN=b.NOPASIEN
        LEFT JOIN DBHOSPITAL.dbo.REGDR c ON a.NOREG = c.NOREG
        LEFT JOIN DBHOSPITAL.dbo.DOKTER d ON c.KODEDOKTER = d.KODEDOKTER
        LEFT JOIN DBHOSPITAL.dbo.BAGIAN e ON c.BAGREGDR = e.KODEBAGIAN
        LEFT JOIN (
        SELECT a.NOREG 'MAX_RG',NOPASIEN
        FROM DBHOSPITAL.dbo.REGPAS a
        LEFT JOIN DBHOSPITAL.dbo.REGDR b ON a.NOREG=b.NOREG
        WHERE TGLREG = ? AND (b.KODEDOKTER = ?)

        )f ON a.NOPASIEN = f.NOPASIEN
        LEFT JOIN PKU.dbo.TAC_RJ_STATUS g ON a.NOREG=g.FS_KD_REG
        LEFT JOIN PKU.dbo.TAC_RJ_MEDIS h ON a.NOREG=h.FS_KD_REG
        WHERE a.NOPASIEN = ?
        ORDER BY a.TGLREG DESC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    

    function get_px_history_dokter($params) {
        $sql = "SELECT A.TANGGAL,A.STATUS,A.NO_REG,B.NAMA_PASIEN, B.ALAMAT, B.KOTA, B.PROVINSI, B.GOL_DARAH,B.STATUS_NIKAH,B.NAMA_PASANGAN,B.KOTA,B.PROVINSI,B.TGL_LAHIR,B.JENIS_KELAMIN,B.WARGA_NEGARA,B.PEKERJAAN,B.AGAMA,B.NO_TELP, B.HP1,B.HP2,B.KODE_POS,B.EMAIL,B.NAMA_HUB,B.NO_IDENTITAS,B.HUB_PASIEN,B.TELP_RUMAH, C.KET_ASAL, D.KET_MASUK,J.NAMAREKANAN,E.KET_DATANG, F.KET_KONDISI, G.KET_BAYAR, H.KET_KELUAR, I.NAMA_DOKTER,K.SPESIALIS,B.FS_ALERGI,L.MAX_RG,M.FS_KD_MEDIS,M.FS_KD_TRS,A.KODE_RUANG, N.FS_STATUS, N.FS_KD_REG
        FROM PENDAFTARAN A
        LEFT JOIN REGISTER_PASIEN B ON  A.NO_MR=B.NO_MR
        LEFT JOIN M_ASALPASIEN C ON A.KODE_ASAL=C.KODE_ASAL
        LEFT JOIN M_CARAMASUK D ON A.KODE_MASUK=D.KODE_MASUK
        LEFT JOIN M_PASIENDATANG E ON A.KODE_DATANG=E.KODE_DATANG
        LEFT JOIN M_KONDISIPASIEN F ON A.KODE_KONDISI = F.KODE_KONDISI
        LEFT JOIN M_CARABAYAR G ON A.KODE_BAYAR=G.KODE_BAYAR
        LEFT JOIN M_PASIENCLOSING H ON A.KODE_KELUAR=H.KODE_KELUAR
        LEFT JOIN DOKTER I ON A.KODE_DOKTER=I.KODE_DOKTER
        LEFT JOIN REKANAN J ON A.KODEREKANAN=J.KODEREKANAN
        LEFT JOIN M_SPESIALIS K ON I.SPESIALIS=K.SPESIALIS
        LEFT JOIN (
        SELECT NO_REG 'MAX_RG',NO_MR
        FROM PENDAFTARAN
        WHERE TANGGAL = ? AND (KODE_DOKTER = ?)

        )L ON A.NO_MR = L.NO_MR
        LEFT JOIN PKU.dbo.TAC_RJ_MEDIS M ON a.NO_REG=M.FS_KD_REG
     LEFT JOIN PKU.dbo.TAC_RJ_STATUS N ON a.NO_REG = N.FS_KD_REG
        WHERE A.NO_MR = ?
        ORDER BY TANGGAL DESC
        ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function get_data_visite($params) {
         $sql = "SELECT distinct I.NAMA_DOKTER,A.NO_REG
        FROM TR_BIAYARINCI A
        LEFT JOIN DOKTER I ON A.KODE_DOKTER=I.KODE_DOKTER
        WHERE A.NO_REG = ? AND I.JENIS_PROFESI='DOKTER SPESIALIS'
        ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

      function get_px_history_dokter2($params) {
        $sql = "SELECT TOP 15 A.TANGGAL, A.KODE_RUANG,A.STATUS,A.NO_REG,B.NAMA_PASIEN, B.ALAMAT,
         B.TGL_LAHIR,B.JENIS_KELAMIN, I.NAMA_DOKTER,K.SPESIALIS,L.MAX_RG,M.FS_KD_MEDIS,M.FS_KD_TRS, M.HASIL_ECHO
        FROM PENDAFTARAN A
        LEFT JOIN REGISTER_PASIEN B ON  A.NO_MR=B.NO_MR
        LEFT JOIN DOKTER I ON A.KODE_DOKTER=I.KODE_DOKTER
         LEFT JOIN M_SPESIALIS K ON I.SPESIALIS=K.SPESIALIS
        LEFT JOIN (SELECT NO_REG 'MAX_RG',NO_MR FROM PENDAFTARAN WHERE TANGGAL = ? AND (KODE_DOKTER = ?)  )L ON A.NO_MR = L.NO_MR
        LEFT JOIN PKU.dbo.TAC_RJ_MEDIS M ON a.NO_REG=M.FS_KD_REG

        WHERE A.NO_MR = ?
        ORDER BY TANGGAL DESC 
        ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


       function get_px_history_dokter4($params) {
        $sql = "SELECT TOP 8 A.TANGGAL,A.STATUS,A.NO_REG,B.NAMA_PASIEN, B.ALAMAT, B.TGL_LAHIR,B.JENIS_KELAMIN,
         I.NAMA_DOKTER,K.SPESIALIS,L.MAX_RG,M.FS_KD_MEDIS,M.FS_KD_TRS, N.FS_STATUS, N.FS_KD_REG, M.HASIL_ECHO
        FROM PENDAFTARAN A
        LEFT JOIN REGISTER_PASIEN B ON  A.NO_MR=B.NO_MR
        LEFT JOIN DOKTER I ON A.KODE_DOKTER=I.KODE_DOKTER
         LEFT JOIN M_SPESIALIS K ON I.SPESIALIS=K.SPESIALIS
        LEFT JOIN (
        SELECT NO_REG 'MAX_RG',NO_MR
        FROM PENDAFTARAN
        WHERE TANGGAL = ? AND (KODE_DOKTER = ? OR KODE_DOKTER=100)

        )L ON A.NO_MR = L.NO_MR
        LEFT JOIN PKU.dbo.TAC_RJ_MEDIS M ON a.NO_REG=M.FS_KD_REG
     LEFT JOIN PKU.dbo.TAC_RJ_STATUS N ON a.NO_REG = N.FS_KD_REG
        WHERE A.NO_MR = ?
        ORDER BY TANGGAL DESC 
        ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
       function get_px_history_dokter_igd($params) {
        $sql = "SELECT TOP 8 A.TANGGAL,A.STATUS,A.NO_REG,B.NAMA_PASIEN, A.KODE_MASUK, B.ALAMAT, B.TGL_LAHIR,B.JENIS_KELAMIN,
         I.NAMA_DOKTER,K.SPESIALIS,L.MAX_RG,CR.KODE_MASUK,CR.KET_MASUK
        FROM PENDAFTARAN A
        LEFT JOIN REGISTER_PASIEN B ON  A.NO_MR=B.NO_MR
        LEFT JOIN M_CARAMASUK CR ON A.Kode_Masuk = CR.KODE_MASUK
        LEFT JOIN DOKTER I ON A.KODE_DOKTER=I.KODE_DOKTER
         LEFT JOIN M_SPESIALIS K ON I.SPESIALIS=K.SPESIALIS
         LEFT JOIN PKU.dbo.TAC_STATUS_IGD D ON A.NO_REG = D.FS_KD_REG
        LEFT JOIN (
        SELECT NO_REG 'MAX_RG',NO_MR
        FROM PENDAFTARAN
        WHERE TANGGAL = ?

        )L ON A.NO_MR = L.NO_MR
        WHERE A.NO_MR = ? AND A.KODE_MASUK=1
        ORDER BY TANGGAL DESC 
        ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


     function get_isi($params) {
        $sql = "SELECT NO_REG 
        FROM PENDAFTARAN 
        WHERE NO_REG IN(SELECT FS_KD_REG FROM PKU.dbo.TAC_RJ_MEDIS
        ORDER BY TANGGAL DESC
        ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_px_history_nurse($params) {
        $sql = "SELECT A.TANGGAL,A.STATUS,A.NO_REG,B.NAMA_PASIEN, B.ALAMAT, B.KOTA, B.PROVINSI, B.GOL_DARAH,B.STATUS_NIKAH,B.NAMA_PASANGAN,B.KOTA,B.PROVINSI,B.TGL_LAHIR,B.JENIS_KELAMIN,B.WARGA_NEGARA,B.PEKERJAAN,B.AGAMA,B.NO_TELP, B.HP1,B.HP2,B.KODE_POS,B.EMAIL,B.NAMA_HUB,B.NO_IDENTITAS,B.HUB_PASIEN,B.TELP_RUMAH, C.KET_ASAL, D.KET_MASUK,J.NAMAREKANAN,E.KET_DATANG, F.KET_KONDISI, G.KET_BAYAR, H.KET_KELUAR, I.NAMA_DOKTER,K.SPESIALIS,B.FS_ALERGI,A.KODE_RUANG, L.FS_FORM,M.FS_KD_TRS
        FROM PENDAFTARAN A
        LEFT JOIN REGISTER_PASIEN B ON A.NO_MR=B.NO_MR 
        LEFT JOIN M_ASALPASIEN C ON A.KODE_ASAL=C.KODE_ASAL 
        LEFT JOIN M_CARAMASUK D ON A.KODE_MASUK=D.KODE_MASUK
        LEFT JOIN M_PASIENDATANG E ON A.KODE_DATANG=E.KODE_DATANG
        LEFT JOIN M_KONDISIPASIEN F ON A.KODE_KONDISI = F.KODE_KONDISI
        LEFT JOIN M_CARABAYAR G ON A.KODE_BAYAR=G.KODE_BAYAR
        LEFT JOIN M_PASIENCLOSING H ON A.KODE_KELUAR=H.KODE_KELUAR
        LEFT JOIN DOKTER I ON A.KODE_DOKTER=I.KODE_DOKTER
        LEFT JOIN REKANAN J ON A.KODEREKANAN=J.KODEREKANAN
        LEFT JOIN M_SPESIALIS K ON I.SPESIALIS=K.SPESIALIS
        LEFT JOIN PKU.dbo.TAC_RJ_STATUS L ON A.NO_REG=L.FS_KD_REG
        LEFT JOIN PKU.dbo.TAC_RJ_MEDIS M ON A.NO_REG=M.FS_KD_REG
        WHERE A.NO_MR = ?
        ORDER BY TANGGAL DESC
        ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_px_history_nurse3($params) {
        $sql = "SELECT top 10 A.TANGGAL,A.STATUS,A.NO_REG,B.NAMA_PASIEN, B.ALAMAT, B.KOTA,B.PROVINSI,B.TGL_LAHIR,B.JENIS_KELAMIN, I.NAMA_DOKTER,K.SPESIALIS,B.FS_ALERGI,L.FS_FORM,M.FS_KD_TRS
        FROM PENDAFTARAN A
        LEFT JOIN REGISTER_PASIEN B ON A.NO_MR=B.NO_MR 
        LEFT JOIN DOKTER I ON A.KODE_DOKTER=I.KODE_DOKTER
        LEFT JOIN REKANAN J ON A.KODEREKANAN=J.KODEREKANAN
        LEFT JOIN M_SPESIALIS K ON I.SPESIALIS=K.SPESIALIS
        LEFT JOIN PKU.dbo.TAC_RJ_STATUS L ON A.NO_REG=L.FS_KD_REG
        LEFT JOIN PKU.dbo.TAC_RJ_MEDIS M ON A.NO_REG=M.FS_KD_REG
        WHERE A.NO_MR = ?
        ORDER BY TANGGAL DESC
        ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
 
    function get_px_resume($params) {
        $sql = "SELECT TOP 10 A.TANGGAL,A.STATUS,A.NO_REG,B.NAMA_PASIEN,B.ALAMAT, B.KOTA, B.PROVINSI, B.GOL_DARAH,B.STATUS_NIKAH,B.NAMA_PASANGAN,B.KOTA,B.PROVINSI,B.TGL_LAHIR,B.JENIS_KELAMIN,B.WARGA_NEGARA,B.PEKERJAAN,B.AGAMA,B.NO_TELP, B.HP1,B.HP2,B.KODE_POS,B.EMAIL,B.NAMA_HUB,B.NO_IDENTITAS,B.HUB_PASIEN,B.TELP_RUMAH, B.FS_ALERGI,L.*, N.*,
        C.NAMA_DOKTER,C.SPESIALIS 
        FROM PENDAFTARAN A
        LEFT JOIN REGISTER_PASIEN B ON A.NO_MR=B.NO_MR
        LEFT JOIN DOKTER C ON A.KODE_DOKTER=C.KODE_DOKTER
        LEFT JOIN PKU.dbo.TAC_RJ_MEDIS L ON A.NO_REG=L.FS_KD_REG
        LEFT JOIN PKU.dbo.TAC_RJ_VITAL_SIGN N ON A.NO_REG = N.FS_KD_REG 
        WHERE A.NO_MR = ?
        ORDER BY TANGGAL DESC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


     function get_px_resume2($params) {
        $sql = "SELECT TOP 10 A.TANGGAL,A.STATUS,A.NO_REG,
        C.NAMA_DOKTER,C.SPESIALIS 
        FROM PENDAFTARAN A
        LEFT JOIN DOKTER C ON A.KODE_DOKTER=C.KODE_DOKTER
        WHERE A.NO_MR = ?
        ORDER BY TANGGAL DESC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_px_by_dokter_by_rm($params) {
        $sql = "SELECT a.NAMA_PASIEN,a.NO_MR, a.ALAMAT, a.KOTA, a.PROVINSI,JENIS_KELAMIN,
        a.TGL_LAHIR,FS_ALERGI
        FROM DB_RSMM.dbo.REGISTER_PASIEN a
        WHERE a.NO_MR = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_px_by_dokter_by_rg($params) {
        $sql = "SELECT a.FS_NM_PASIEN,a.FS_MR,a.FS_ALM_PASIEN,FS_JNS_KELAMIN,
        ISNULL(datediff(year,a.fd_tgl_lahir,?),0) fn_umur,b.FS_KD_REG,
        d.FS_NM_JAMINAN,e.FS_NM_PEG,a.FD_TGL_LAHIR,b.FD_TGL_MASUK,FS_NM_LAYANAN,b.FS_KD_LAYANAN,
        b.FS_KD_MEDIS,e.FS_NO_IJIN_PRAKTEK,RIGHT(a.FS_MR,8) 'MR',g.FS_TB,g.FS_BB
        FROM HOSPITAL.dbo.TC_MR a
        LEFT JOIN HOSPITAL.dbo.TA_REGISTRASI b ON a.FS_MR=b.FS_MR
        LEFT JOIN HOSPITAL.dbo.TA_TIPE_JAMINAN c ON b.FS_KD_TIPE_JAMINAN=c.FS_KD_TIPE_JAMINAN
        LEFT JOIN HOSPITAL.dbo.TA_JAMINAN d ON c.FS_KD_JAMINAN=d.FS_KD_JAMINAN
        LEFT JOIN HOSPITAL.dbo.TD_PEG e ON b.FS_KD_MEDIS=e.FS_KD_PEG
        LEFT JOIN HOSPITAL.dbo.TA_LAYANAN f ON b.FS_KD_LAYANAN=f.FS_KD_LAYANAN
        LEFT JOIN PKU.dbo.TAC_RJ_VITAL_SIGN g ON b.FS_KD_REG=g.FS_KD_REG
        WHERE b.FS_KD_REG = ? AND (b.FS_KD_MEDIS = ? OR b.FS_KD_MEDIS2 = ? OR b.FS_KD_MEDIS3 = ?)";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

   function get_px_by_dokter_by_rg2($params) {
        $sql = "SELECT b.NO_REG,a.NAMA_PASIEN, a.NO_MR, a.ALAMAT, a.KOTA, a.PROVINSI, A.JENIS_KELAMIN,
        a.TGL_LAHIR,c.SPESIALIS, c.NAMA_DOKTER, E.NAMAREKANAN,
        b.TANGGAL,b.KODE_DOKTER,a.FS_HIGH_RISK,d.FS_KD_TRS
        FROM DB_RSMM.dbo.REGISTER_PASIEN a
        LEFT JOIN DB_RSMM.dbo.PENDAFTARAN b ON a.NO_MR=b.NO_MR
        LEFT JOIN DB_RSMM.dbo.DOKTER c ON b.KODE_DOKTER=c.KODE_DOKTER
        LEFT JOIN PKU.dbo.TAC_RJ_MEDIS d ON b.NO_REG=d.FS_KD_REG
        LEFT JOIN DB_RSMM.dbo.REKANAN E ON b.KODEREKANAN=E.KODEREKANAN
        WHERE b.NO_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
   function get_px_by_dokter_by_rg_igd($params) {
        $sql = "SELECT b.NO_REG,a.NAMA_PASIEN, a.NO_MR, a.ALAMAT, a.KOTA, a.PROVINSI, A.JENIS_KELAMIN,
        a.TGL_LAHIR,c.SPESIALIS, c.NAMA_DOKTER, E.NAMAREKANAN, d.rad, d.MDD, d.MDB, d.lab,d.FS_DIAGNOSA,d.BAGIAN_RADIOLOGI,
        b.TANGGAL,b.KODE_DOKTER,a.FS_HIGH_RISK
        FROM DB_RSMM.dbo.REGISTER_PASIEN a
        LEFT JOIN DB_RSMM.dbo.PENDAFTARAN b ON a.NO_MR=b.NO_MR
        LEFT JOIN DB_RSMM.dbo.DOKTER c ON b.KODE_DOKTER=c.KODE_DOKTER
        LEFT JOIN PKU.dbo.IGD_AWAL_MEDIS d ON b.NO_REG=d.FS_KD_REG
        LEFT JOIN DB_RSMM.dbo.REKANAN E ON b.KODEREKANAN=E.KODEREKANAN
        WHERE b.NO_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_px_by_dokter_by_rg2_igd($params) {
        $sql = "SELECT b.NO_REG,a.NAMA_PASIEN, a.NO_MR, a.ALAMAT, a.KOTA, a.PROVINSI, A.JENIS_KELAMIN,
        a.TGL_LAHIR,c.SPESIALIS, c.NAMA_DOKTER, E.NAMAREKANAN,
        b.TANGGAL,b.KODE_DOKTER,a.FS_HIGH_RISK,d.id
        FROM DB_RSMM.dbo.REGISTER_PASIEN a
        LEFT JOIN DB_RSMM.dbo.PENDAFTARAN b ON a.NO_MR=b.NO_MR
        LEFT JOIN DB_RSMM.dbo.DOKTER c ON b.KODE_DOKTER=c.KODE_DOKTER
        LEFT JOIN PKU.dbo.IGD_AWAL_MEDIS d ON b.NO_REG=d.FS_KD_REG
        LEFT JOIN DB_RSMM.dbo.REKANAN E ON b.KODEREKANAN=E.KODEREKANAN
        WHERE b.NO_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


     function get_data_medis_by_rg23($params) {
        $sql = "SELECT top 1 a.*,c.Nama_Dokter,b.user_name,Kode_Dokter
        FROM PKU.dbo.TAC_RJ_MEDIS a 
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


     function get_px_by_daftar($params) {
        $sql = "SELECT b.NO_REG,b.KODEREKANAN,a.KODEREKANAN,a.NAMAREKANAN
        FROM  DB_RSMM.dbo.PENDAFTARAN b 
        LEFT JOIN DB_RSMM.dbo.REKANAN a ON a.KODEREKANAN=b.KODEREKANAN
        WHERE b.NO_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_data_vs_by_rg($params) {
        $sql = "SELECT a.*,c.NAMALENGKAP,b.user_name
        FROM PKU.dbo.TAC_RJ_VITAL_SIGN a
        LEFT JOIN PKU.dbo.TAC_COM_USER b ON a.mdb=b.user_id
        LEFT JOIN DB_RSMM.dbo.TUSER c ON b.user_name=c.NAMAUSER
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




    function las_rj($params) {
        $sql = "SELECT TOP 1 * from PKU.dbo.TAC_RJ_MEDIS WHERE FS_KD_MEDIS=? AND FS_KD_REG IN(SELECT No_Reg from PENDAFTARAN where No_MR=?)
            ORDER BY FS_KD_TRS desc";
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
        $sql = "SELECT NO_MR
        FROM DB_RSMM.dbo.PENDAFTARAN
        WHERE NO_REG = ?";
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
        FROM PKU.dbo.TAC_RJ_NYERI
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
        FROM PKU.dbo.TAC_RJ_ALERGI
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
        FROM PKU.dbo.TAC_RJ_NUTRISI
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
        FROM PKU.dbo.TAC_RJ_ASES_KEBID
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
        FROM PKU.dbo.TAC_RJ_MASALAH_KEP a 
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
        FROM PKU.dbo.TAC_RJ_JATUH
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
        FROM PKU.dbo.TAC_ASES_PER2
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

    // ambil kriteria dischager 

    public function getKriteriaDischargerByKodeReg($params)
    {

    }

    function cek_data_ases_kebid_by_rg($params) {
        $sql = "SELECT *
        FROM PKU.dbo.TAC_RJ_ASES_KEBID
        WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    

    function get_data_ases_kebid_by_rg($params) {
        $sql = "SELECT *
        FROM PKU.dbo.TAC_RJ_ASES_KEBID
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
        $sql = "SELECT a.*,c.NAMALENGKAP,b.user_name
        FROM PKU.dbo.TAC_RJ_MEDIS a
        LEFT JOIN PKU.dbo.TAC_COM_USER b ON a.mdb=b.user_id
        LEFT JOIN DB_RSMM.dbo.TUSER c ON b.user_name=c.NAMAUSER
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
        $sql = "SELECT a.*,c.NAMA_DOKTER,b.user_name,KODE_DOKTER, d.NAMALENGKAP 
        FROM PKU.dbo.TAC_RJ_MEDIS a
        LEFT JOIN PKU.dbo.TAC_COM_USER b ON a.mdb=b.user_id
        LEFT JOIN DOKTER c ON b.user_name=c.KODE_DOKTER
        LEFT JOIN DB_RSMM.dbo.TUSER d ON b.user_name=d.NAMAUSER
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
    function get_data_medis_by_rg22($params) { 
        $sql = "SELECT a.*,c.NAMA_DOKTER,b.user_name,KODE_DOKTER, d.NAMALENGKAP 
        FROM PKU.dbo.TAC_RJ_MEDIS a
        LEFT JOIN PKU.dbo.TAC_COM_USER b ON a.mdb=b.user_id
        LEFT JOIN DOKTER c ON b.user_name=c.KODE_DOKTER
        LEFT JOIN DB_RSMM.dbo.TUSER d ON b.user_name=d.NAMAUSER
        WHERE a.FS_KD_TRS = ? and a.FS_KD_REG = ? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_data_medis_by_rg_igd($params) { 
        $sql = "SELECT a.*,c.NAMA_DOKTER,b.user_name,KODE_DOKTER, d.NAMALENGKAP 
        FROM PKU.dbo.IGD_AWAL_MEDIS a
        LEFT JOIN PKU.dbo.TAC_COM_USER b ON a.MDB=b.user_id
        LEFT JOIN DOKTER c ON b.user_name=c.KODE_DOKTER
        LEFT JOIN DB_RSMM.dbo.TUSER d ON b.user_name=d.NAMAUSER
        WHERE a.FS_KD_REG = ? AND a.id = ?";
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
        $sql = "SELECT a.*,c.FS_NM_PEG,c.FS_NO_IJIN_PRAKTEK,d.FD_TGL_RUJUKAN,e.*
        FROM PKU.dbo.TAC_RJ_MEDIS a
        LEFT JOIN HOSPITAL.dbo.TD_PEG c ON a.FS_KD_MEDIS=c.FS_KD_PEG
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
        FROM PKU.dbo.TAC_RJ_SKDP a
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

     function get_data_prb($params) {
        $sql = "SELECT a.*
        FROM PKU.dbo.TAC_RJ_PRB a
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
        $sql = "SELECT SUM(A.Jumlah) 'JML_OBAT',C.NAMA_OBAT,D.SATUAN,A.Dosis 
        FROM TR_DETAIL_RESEP A, OBAT C, SATUAN_OBAT D, TR_MASTER_RESEP B 
        WHERE A.NO_RESEP=B.NO_RESEP AND A.KODE_OBAT=C.KODE_OBAT AND C.ID_SATUAN=D.ID_SATUAN AND B.NO_REG = ?
        GROUP BY C.NAMA_OBAT,D.SATUAN,A.Dosis ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }



     function get_data_terapi_last($params) {
        $sql = "
 SELECT SUM(A.Jumlah) 'JML_OBAT',C.NAMA_OBAT,D.SATUAN,A.Dosis 
        FROM TR_DETAIL_RESEP A, OBAT C, SATUAN_OBAT D, TR_MASTER_RESEP B 
        WHERE A.NO_RESEP=B.NO_RESEP AND A.KODE_OBAT=C.KODE_OBAT AND C.ID_SATUAN=D.ID_SATUAN 
        AND B.NO_REG in(SELECT TOP 2 No_Reg from PENDAFTARAN  WHERE No_MR=?  
         order by Tanggal desc) 
        GROUP BY C.NAMA_OBAT,D.SATUAN,A.Dosis ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }





    function get_data_terapi_racik_by_rg($params) {
        $sql = "SELECT *
        FROM DBHOSPITAL.dbo.TRPMN a
        LEFT JOIN DBHOSPITAL.dbo.TRPRN b ON a.NORESEP=b.NORESEP 
        LEFT JOIN DBHOSPITAL.dbo.MABAR c ON b.KODEBARANG=c.KODEBARANG 
        LEFT JOIN DBHOSPITAL.dbo.SATBAR d ON b.SATRC=d.KODESM 
        WHERE a.NOREG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function get_data_cek_resep($params) {
        $sql = "SELECT A.*,C.NAMA_OBAT,D.SATUAN 
        FROM TR_DETAIL_RESEP A, OBAT C, SATUAN_OBAT D, TR_MASTER_RESEP B 
        WHERE A.NO_RESEP=B.NO_RESEP AND A.KODE_OBAT=C.KODE_OBAT AND C.ID_SATUAN=D.ID_SATUAN AND B.NO_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function list_resep_masuk() {
        $dt=date('Y-m-d');
        $sql = "  select A.*, B.No_MR, C.Nama_Pasien, C.Alamat, D.Nama_Dokter
        from PKU.dbo.TAC_RJ_MEDIS as A, PENDAFTARAN as B, REGISTER_PASIEN as C, DOKTER as D
         where A.FS_TERAPI not like '' and A.mdd ='$dt'
      and A.FS_KD_REG not in(select No_Reg from TR_MASTER_RESEP where Tgl_Resep ='$dt' )
      and A.FS_KD_REG=B.No_Reg and B.No_MR=C.No_MR and A.FS_KD_MEDIS=D.Kode_Dokter";
      $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

       function cek_resep_masuk() {
        $dt=date('Y-m-d');
        $sql = "  select A.*, B.No_MR, C.Nama_Pasien, C.Alamat, D.Nama_Dokter
        from PKU.dbo.TAC_RJ_MEDIS as A, PENDAFTARAN as B, REGISTER_PASIEN as C, DOKTER as D
         where A.FS_TERAPI not like '' and A.mdd ='$dt'
      and A.FS_KD_REG not in(select No_Reg from TR_MASTER_RESEP where Tgl_Resep ='$dt' )
      and A.FS_KD_REG=B.No_Reg and B.No_MR=C.No_MR and A.FS_KD_MEDIS=D.Kode_Dokter";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


 function cek_bhp() {
        $dt=date('Y-m-d');
        $sql = "select A.*, B.No_MR, C.Nama_Pasien, C.Alamat, D.Nama_Dokter, E.*
        from PKU.dbo.ALAT_HABIS_PAKAI as A, PENDAFTARAN as B, REGISTER_PASIEN as C, DOKTER as D, JADWAL_OP E
         where    A.idoperasi=E.id  and B.STATUS='1'
      and E.FS_KD_REG=B.No_Reg and B.No_MR=C.No_MR and E.Kode_Dokter=D.Kode_Dokter";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_data_cek_resep_aja($params) {
        $sql = "SELECT *
        FROM TR_MASTER_RESEP 
        WHERE NO_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_data_cek_resep_igd($params) {
        $sql = "SELECT *
        FROM TR_MASTER_RESEP 
        WHERE NO_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }



    function get_data_lab_by_rg($params) {
        $sql = "SELECT A.*,B.Kode_Hasil,B.Hasil, C.Nama_Pasien, D.Jenis, E.Nilai_Normal, E.Pemeriksaan, F.Nama_Dokter,B.Status 
        FROM TR_MASTER_LAB A, TR_DETAIL_LAB B, REGISTER_PASIEN C, LAB_JENISPERIKSA D, LAB_HASIL E, DOKTER F 
        WHERE A.Id_Lab=B.Id_Lab 
        AND A.No_MR=C.No_MR AND A.No_Kelompok=D.No_Kelompok 
        AND A.No_Jenis=D.No_Jenis AND B.Kode_Hasil=E.Kode_Hasil 
        AND A.Pengirim=F.Kode_Dokter 
        AND A.No_Reg = ?  
        Order By A.No_Kelompok,A.No_Jenis,A.Tanggal
        ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    function get_data_cek_lab($params) {
        $sql = "SELECT A.*,B.Kode_Hasil,B.Hasil, C.Nama_Pasien, D.Jenis, E.Nilai_Normal, E.Pemeriksaan, F.Nama_Dokter,B.Status 
        FROM TR_MASTER_LAB A, TR_DETAIL_LAB B, REGISTER_PASIEN C, LAB_JENISPERIKSA D, LAB_HASIL E, DOKTER F 
        WHERE A.Id_Lab=B.Id_Lab 
        AND A.No_MR=C.No_MR AND A.No_Kelompok=D.No_Kelompok 
        AND A.No_Jenis=D.No_Jenis AND B.Kode_Hasil=E.Kode_Hasil 
        AND A.Pengirim=F.Kode_Dokter 
        AND A.No_Reg = ?  
        Order By A.No_Kelompok,A.No_Jenis,A.Tanggal
        ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_data_medis_igd($params) {
        $date = date('Y-m-d');

        $sql = "SELECT * FROM PKU.dbo.IGD_AWAL_MEDIS WHERE FS_KD_REG = ? 
        ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
      }

      function get_data_cek_lab_aja($params) {
        $sql = "SELECT A.*
        FROM TR_MASTER_LAB A
        WHERE  A.No_Reg = ?  
        ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_data_rad_by_rg($params) {
        $sql = "SELECT *,c.KET_TINDAKAN 
        FROM TR_BIAYARINCI a
        LEFT JOIN TR_DETAIL_CATATANDOKTER b ON a.ID_BIAYA=b.ID_BIAYA
        left join M_RINCI_HEADER c ON a.No_Rinci=c.NO_RINCI
        WHERE NO_REG = ? AND a.NO_RINCI LIKE 'B%'";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    function get_data_cek_radiologi($params) {
        $sql = "SELECT a.ID_BIAYA
        FROM TR_BIAYARINCI a
        LEFT JOIN TR_DETAIL_CATATANDOKTER b ON a.ID_BIAYA=b.ID_BIAYA
        WHERE NO_REG = ? AND a.NO_RINCI LIKE 'B%'";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
     function get_data_cek_radiologi_aja($params) {
        $sql = "SELECT a.ID_BIAYA
        FROM TR_BIAYARINCI a
        WHERE NO_REG = ? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
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
        $sql = "SELECT FS_KD_REG  FROM PKU.dbo.TAC_RJ_MEDIS WHERE FS_KD_REG= ?";
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

    function get_tac_com_parameter_rencana($params) {
        $sql = "SELECT * FROM PKU.dbo.TAC_COM_PARAMETER_SKDP_RENCANA WHERE FS_KD_TRS_SKDP_ALASAN = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

       function get_px_history_dokter_konsul($params) {
        $sql = "SELECT TOP 15 A.TANGGAL, A.KODE_RUANG,A.STATUS,A.NO_REG,B.NAMA_PASIEN,
         B.ALAMAT,B.KOTA,B.PROVINSI,B.TGL_LAHIR,B.JENIS_KELAMIN, I.NAMA_DOKTER,K.SPESIALIS,
         M.FS_KD_MEDIS,M.FS_KD_TRS, M.HASIL_ECHO
        FROM PENDAFTARAN A
        LEFT JOIN REGISTER_PASIEN B ON  A.NO_MR=B.NO_MR
        LEFT JOIN DOKTER I ON A.KODE_DOKTER=I.KODE_DOKTER
         LEFT JOIN M_SPESIALIS K ON I.SPESIALIS=K.SPESIALIS
 
        LEFT JOIN PKU.dbo.TAC_RJ_MEDIS M ON a.NO_REG=M.FS_KD_REG

        WHERE A.NO_MR = ?
        ORDER BY TANGGAL DESC 
        ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

      function get_px_konsul($params) {
        $sql = "SELECT distinct(a.FS_KD_REG),  c.NO_REG, b.NAMA_PASIEN, b.ALAMAT, b.KOTA, b.PROVINSI, b.NO_MR, f.NAMA_DOKTER, c.TANGGAL
        from PKU.dbo.TAC_RJ_RUJUKAN a
        LEFT JOIN PENDAFTARAN c ON a.FS_KD_REG=c.NO_REG
        LEFT JOIN REGISTER_PASIEN b ON c.NO_MR=b.NO_MR
         LEFT JOIN DOKTER f ON a.mdb = f.KODE_DOKTER
        WHERE 
        a.FS_TUJUAN_RUJUKAN =?  and c.TANGGAL=? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }





     function get_px_history_verif($params) {
        $sql = "SELECT a.NO_MR,a.TANGGAL,a.NO_REG,a.MEDIS,c.NAMA_PASIEN,g.FS_KD_TRS,NAMA_RUANG,g.FS_CARA_PULANG,
                d.NAMA_DOKTER,FS_CARA_PULANG,a.STATUS,a.KODE_RUANG
                FROM DB_RSMM.dbo.PENDAFTARAN a
                INNER JOIN DB_RSMM.dbo.REGISTER_PASIEN c ON a.NO_MR=c.NO_MR
                LEFT JOIN DB_RSMM.dbo.DOKTER d ON a.KODE_DOKTER = d.KODE_DOKTER
                LEFT JOIN DB_RSMM.dbo.M_RUANG e ON a.KODE_RUANG = e.KODE_RUANG
                LEFT JOIN DB_RSMM.dbo.DOKTER f ON a.KODE_DOKTER = f.KODE_DOKTER
                LEFT JOIN PKU.dbo.TAC_RJ_MEDIS g ON a.NO_REG=g.FS_KD_REG
                LEFT JOIN PKU.dbo.TAC_RJ_STATUS i ON a.NO_REG=i.FS_KD_REG
                WHERE a.NO_REG = ?
                GROUP BY  a.NO_MR,a.TANGGAL,a.NO_REG,a.MEDIS,c.NAMA_PASIEN,g.FS_KD_TRS,NAMA_RUANG
                ,d.NAMA_DOKTER,FS_CARA_PULANG,a.STATUS,a.KODE_RUANG
                ORDER BY a.TANGGAL DESC";
         $query = $this->db->query($sql, $params);
         if ($query->num_rows() > 0) {
             $result = $query->row_array();
             $query->free_result();
             return $result;
         } else {
             return 0;
         }
     }



       function get_lama_inap($params) {
        $sql = "SELECT * from TR_KAMAR
        WHERE NO_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


    function list_masalah_kep($params) {
        $sql = "SELECT * FROM PKU.dbo.TAC_COM_DAFTAR_DIAG";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function list_rencana_kep($params) {
        $sql = "SELECT * FROM PKU.dbo.TAC_COM_PARAM_REN_KEP";
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
        $sql = "SELECT * FROM PKU.dbo.TAC_RJ_MASALAH_KEP WHERE FS_KD_REG = ?";
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
        $sql = "SELECT * FROM PKU.dbo.TAC_RJ_REN_KEP WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function list_pemeriksaan_lab($params) {
        $sql = "SELECT id,No_Kelompok, No_Jenis,JENIS
        FROM LAB_JENISPERIKSA  
        ORDER BY JENIS";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function list_pemeriksaan_lab_by_rg($params) {
        $sql = "SELECT  * FROM 
        LAB_JENISPERIKSA a
        LEFT JOIN PKU.dbo.TA_TRS_KARTU_PERIKSA4 b ON a.No_jenis=b.FS_KD_TARIF
        WHERE FS_KD_REG2 = ?
        ORDER BY JENIS ASC
        ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_lab($params) {
        $sql = "select lab from PKU.dbo.IGD_AWAL_MEDIS where FS_KD_REG=?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }

    function list_pemeriksaan_lab_by_medis_igd($params)
    {
        $sql = "SELECT lab
        FROM PKU.dbo.IGD_AWAL_MEDIS
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

    
    function list_pemeriksaan_rad_by_rg($params) {
        $sql = "SELECT  * FROM 
        M_RINCI_HEADER a
        LEFT JOIN PKU.dbo.TA_TRS_KARTU_PERIKSA5 b ON a.NO_RINCI=b.FS_KD_TARIF
        WHERE NO_RINCI LIKE 'B%' AND FS_KD_REG2 = ?
        ORDER BY KET_TINDAKAN ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
   
    function list_pemeriksaan_lab_by_rg_skdp($params) {
        $sql = "SELECT  * FROM 
        LAB_JENISPERIKSA a
        LEFT JOIN PKU.dbo.TA_TRS_KARTU_PERIKSA4 b ON a.id=b.FS_KD_TARIF
        WHERE FS_KD_REG3 = ?
        ORDER BY JENIS ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function list_pemeriksaan_rad_by_rg_skdp($params) {
        $sql = "SELECT  * FROM 
        M_RINCI_HEADER a
        LEFT JOIN PKU.dbo.TA_TRS_KARTU_PERIKSA5 b ON a.NO_RINCI=b.FS_KD_TARIF
        WHERE NO_RINCI LIKE 'B%' AND FS_KD_REG3 = ?
        ORDER BY KET_TINDAKAN ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    //belum fix
    function list_pemeriksaan_rad($params) {
        $sql = "SELECT NO_RINCI,KET_TINDAKAN 
        FROM M_RINCI_HEADER
        -- LEFT JOIN PKU.dbo.TA_TRS_KARTU_PERIKSA5 b ON a.NO_RINCI=b.FS_KD_TARIF
        WHERE NO_RINCI LIKE 'B%'";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

       function list_nama_obat($params) {
        $sql = "SELECT Nama_Obat
        FROM OBAT  ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_monitoring_hd($params) {
        $sql = "SELECT * FROM PKU.dbo.TAC_HD_TINDAKAN_MONITORING WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_berkas_by_rg($params) {
        $sql = "SELECT * FROM PKU.dbo.TAC_RM_BERKAS WHERE FS_KD_REG = ?  ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_header1() {
        $sql = "SELECT pref_value FROM PKU.dbo.tac_com_preferences WHERE pref_group = 'header' AND pref_nm='header1'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_header2() {
        $sql = "SELECT pref_value FROM PKU.dbo.tac_com_preferences WHERE pref_group = 'header' AND pref_nm='header2'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_alamat() {
        $sql = "SELECT pref_value FROM PKU.dbo.tac_com_preferences WHERE pref_group = 'header' AND pref_nm='alamat'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_antrian_far($params) {
        $sql = "SELECT MAX(FS_KD_ANTRIAN) 'ANTRIAN' FROM PKU.dbo.TAC_RJ_ANTRIAN_OBAT WHERE FD_TGL_ANTRIAN = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
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
    function get_antrian_obat_by_trs($params) {
        $sql = "SELECT * FROM PKU.dbo.TAC_RJ_ANTRIAN_OBAT WHERE FS_KD_RJ_MEDIS = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function cek_ases_perawat_by_rg($params) {
        $sql = "SELECT * FROM PKU.dbo.TAC_RJ_VITAL_SIGN WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    function cek_data_order_lab_by_rg2($params) {
        $sql = "SELECT FS_KD_REG2
        FROM PKU.dbo.TA_TRS_KARTU_PERIKSA4 a
        WHERE FS_KD_REG2 = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    function cek_data_order_rad_by_rg2($params) {
        $sql = "SELECT FS_KD_REG2
        FROM PKU.dbo.TA_TRS_KARTU_PERIKSA5 a
        WHERE FS_KD_REG2 = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    
    function get_px_rawat_inap($params) {
        $sql = "SELECT *
        FROM DBHOSPITAL.dbo.PASIEN a
        LEFT JOIN DBHOSPITAL.dbo.REGPAS b ON a.NOPASIEN=b.NOPASIEN
        LEFT JOIN DBHOSPITAL.dbo.REGDR c ON b.NOREG=c.NOREG
        INNER JOIN DBHOSPITAL.dbo.KAMARBEDAH d ON c.NOREG=d.NOREG
        WHERE b.NOPASIEN = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function get_resume_rawat_jalan($params) {
        $sql = "SELECT mdd,NAMADOKTER,a.FS_DIAGNOSA,a.FS_TERAPI,a.FS_ANAMNESA
        FROM PKU.dbo.TAC_RJ_MEDIS a
        LEFT JOIN DBHOSPITAL.dbo.REGDR b ON a.FS_KD_REG=b.NOREG
        LEFT JOIN DBHOSPITAL.dbo.DOKTER c ON a.FS_KD_MEDIS=c.KODEDOKTER
        LEFT JOIN DBHOSPITAL.dbo.REGPAS d ON b.NOREG=d.NOREG
        WHERE d.NOPASIEN = ?
        ORDER BY mdd DESC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    
    function get_cek_ases_inap_medis($params) {
        $sql = "SELECT FS_KD_REG FROM PKU.dbo.TAC_RI_MEDIS WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            return $result;
        } else {
            return 0;
        }
    }

  function cek_asesmen_rajal_perawat($params) {
        $sql = "SELECT *
        FROM PKU.dbo.TAC_RJ_NYERI
        WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
       if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            return $result;
        } else {
            return 0;
        }
    }

   
   
    
    function get_cek_lab_skdp($params) {
        $sql = "SELECT * FROM
        PKU.dbo.TA_TRS_KARTU_PERIKSA4
        WHERE FS_KD_REG3 = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    
    function get_cek_rad_skdp($params) {
        $sql = "SELECT * FROM
        PKU.dbo.TA_TRS_KARTU_PERIKSA5
        WHERE FS_KD_REG3 = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


    
    function get_data_order_lab_by_rg3($params) {
        $sql = "SELECT JENIS
        FROM PKU.dbo.TA_TRS_KARTU_PERIKSA4 a
        LEFT JOIN DB_RSMM.dbo.LAB_JENISPERIKSA b ON a.FS_KD_TARIF=b.id
        WHERE FS_KD_REG3 = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_data_order_rad_by_rg3($params) {
        $sql = "SELECT KET_TINDAKAN
        FROM PKU.dbo.TA_TRS_KARTU_PERIKSA5 a
        LEFT JOIN DB_RSMM.dbo.M_RINCI_HEADER b ON a.FS_KD_TARIF=b.NO_RINCI
        WHERE FS_KD_REG3 = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    function get_data_order_lab_by_rg2($params) {
        $sql = "SELECT b.JENIS
        FROM PKU.dbo.TA_TRS_KARTU_PERIKSA4 a
        LEFT JOIN DB_RSMM.dbo.LAB_JENISPERIKSA b ON a.FS_KD_TARIF=b.no_jenis
        WHERE FS_KD_REG2 = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_data_order_rad_by_rg2($params) {
        $sql = "SELECT KET_TINDAKAN, fs_bagian
        FROM PKU.dbo.TA_TRS_KARTU_PERIKSA5 a
        LEFT JOIN DB_RSMM.dbo.M_RINCI_HEADER b ON a.FS_KD_TARIF=b.NO_RINCI
        WHERE FS_KD_REG2 = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function get_data_rujukan_by_rg($params) {
        $sql = "SELECT *
        FROM PKU.dbo.TAC_RJ_RUJUKAN
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
    function get_data_rujukan_by_rg_igd($params) {
        $sql = "SELECT *
        FROM PKU.dbo.TAC_RJ_RUJUKAN_IGD
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
    
    function get_px_rj($params) {
        $sql = "SELECT b.NO_REG,a.NAMA_PASIEN,a.NO_MR,a.ALAMAT, a.KOTA, a.PROVINSI,A.JENIS_KELAMIN,
        a.TGL_LAHIR,a.FS_ALERGI,a.FS_REAK_ALERGI,a.FS_RIW_PENYAKIT_DAHULU,a.FS_RIW_PENYAKIT_DAHULU2,c.SPESIALIS,
        b.TANGGAL,b.KODE_DOKTER,a.FS_HIGH_RISK,d.FS_KD_TRS,b.KODE_RUANG
        FROM DB_RSMM.dbo.REGISTER_PASIEN a
        LEFT JOIN DB_RSMM.dbo.PENDAFTARAN b ON a.NO_MR=b.NO_MR
        LEFT JOIN DB_RSMM.dbo.DOKTER c ON b.KODE_DOKTER=c.KODE_DOKTER
        LEFT JOIN PKU.dbo.TAC_RJ_MEDIS d ON b.NO_REG=d.FS_KD_REG
        WHERE KODE_RUANG = '' AND b.TANGGAL = ?
        ORDER BY a.NAMA_PASIEN ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


    function get_px_by_dokter_finish_perawat2($params) {
        $sql = "SELECT a.FS_KD_REG,b.FS_NM_PASIEN,FN_NO_URUT,a.FS_MR,b.FS_ALM_PASIEN,
        FS_STATUS
        FROM HOSPITAL.dbo.TA_REGISTRASI a
        INNER JOIN HOSPITAL.dbo.TC_MR b ON a.FS_MR=b.FS_MR
        LEFT JOIN HOSPITAL.dbo.TA_TRS_ANTRIAN c ON a.FS_KD_REG = c.FS_KD_REG
        LEFT JOIN PKU.dbo.TAC_RJ_STATUS d ON a.FS_KD_REG = d.FS_KD_REG
        LEFT JOIN PKU.dbo.TAC_RJ_MEDIS e ON a.FS_KD_REG = e.FS_KD_REG
        WHERE a.FD_TGL_MASUK = ? AND a.FD_TGL_VOID = '3000-01-01'
        AND a.FS_KD_JENIS_REG <> '1' AND FS_KD_MEDIS = ?
        AND FS_STATUS = '1' AND FS_TERAPI <>''
        ORDER BY c.FN_NO_URUT";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

      function laporanmedis($params){
        $sql = "select A.*, B.No_MR,B.Kode_Datang,B.Tanggal, 
         B.KodeRekanan, E.NamaRekanan, C.Nama_Pasien, C.Jenis_Kelamin, 
         datediff(yy,C.Tgl_Lahir,getdate()) as umur,
         C.Tgl_Lahir, C.Alamat, D.Nama_Dokter, D.Spesialis
        from PKU.dbo.TAC_RJ_MEDIS as A,
        PENDAFTARAN as B,
        REGISTER_PASIEN as C,
         DOKTER as D,
        REKANAN as E where   (B.Tanggal between ? and ?)
        and A.FS_KD_REG=B.No_Reg and B.No_MR=C.No_MR and A.FS_KD_MEDIS=D.Kode_Dokter and B.KodeRekanan=E.KodeRekanan ";
         $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    

      function insert_suratsakit($params) {
        $sql = "INSERT INTO PKU.dbo.SURAT_SAKIT(FS_KD_REG,SEKOLAH, PEKERJAAN,TGLMULAI,JUMLAHHARI, mdb, mdd)
        VALUES (?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }



   function insert_surathamil($params) {
        $sql = "INSERT INTO PKU.dbo.SURAT_HAMIL(FS_KD_REG, PEKERJAAN,ANAKKE,USIA_HAMIL, HPL,  mdb, mdd)
        VALUES (?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }


    function update_suratsakit($params) {
        $sql = "UPDATE PKU.dbo.SURAT_SAKIT SET SEKOLAH = ?, PEKERJAAN = ?,TGLMULAI=?,JUMLAHHARI=?,mdb=?,mdd=?
        WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }


       function update_surathamil($params) {
        $sql = "UPDATE PKU.dbo.SURAT_HAMIL SET   PEKERJAAN = ?, ANAKKE=?,USIA_HAMIL=?, HPL=?, mdb=?,mdd=?
        WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }




    function cek_surat_sakit($params) {
        $sql = "SELECT * FROM
        PKU.dbo.SURAT_SAKIT
        WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


    


      function cek_hpl($params) {
        $sql = "SELECT * FROM
        PKU.dbo.SURAT_HAMIL
        WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


    function data_surat_sakit($params) {
        $sql = "SELECT d.*, b.NO_REG,a.NAMA_PASIEN, a.NO_MR,a.ALAMAT, a.KOTA, a.PROVINSI,A.JENIS_KELAMIN,
        a.TGL_LAHIR,c.SPESIALIS,  datediff(yy,a.Tgl_Lahir,getdate()) as umur,
        b.TANGGAL,b.KODE_DOKTER, c.NAMA_DOKTER
       
        FROM PKU.dbo.SURAT_SAKIT d 
        LEFT JOIN DB_RSMM.dbo.PENDAFTARAN b ON b.NO_REG=d.FS_KD_REG
        LEFT JOIN DB_RSMM.dbo.REGISTER_PASIEN a ON a.NO_MR=b.NO_MR
        LEFT JOIN DB_RSMM.dbo.DOKTER c ON d.mdb=c.KODE_DOKTER
         WHERE d.FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


     function data_surat_hamil($params) {
        $sql = "SELECT d.*, b.NO_REG,a.NAMA_PASIEN, a.NO_MR,a.ALAMAT, a.KOTA, a.PROVINSI,A.JENIS_KELAMIN,
        a.TGL_LAHIR,c.SPESIALIS,  datediff(yy,a.Tgl_Lahir,getdate()) as umur,
        b.TANGGAL,b.KODE_DOKTER, c.NAMA_DOKTER
       
        FROM PKU.dbo.SURAT_HAMIL d 
        LEFT JOIN DB_RSMM.dbo.PENDAFTARAN b ON b.NO_REG=d.FS_KD_REG
        LEFT JOIN DB_RSMM.dbo.REGISTER_PASIEN a ON a.NO_MR=b.NO_MR
        LEFT JOIN DB_RSMM.dbo.DOKTER c ON d.mdb=c.KODE_DOKTER
         WHERE d.FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }



 

    function insert_suratdirawat($params) {
        $sql = "INSERT INTO PKU.dbo.SURAT_DIRAWAT(FS_KD_REG,DIAGNOSA, mdb, mdd)
        VALUES (?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function update_suratdirawat($params) {
        $sql = "UPDATE PKU.dbo.SURAT_DIRAWAT SET DIAGNOSA = ?, mdb=?,mdd=?
        WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function cek_surat_dirawat($params) {
        $sql = "SELECT * FROM
        PKU.dbo.SURAT_DIRAWAT
        WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function data_surat_dirawat($params) {
        $sql = "SELECT d.*, b.NO_REG,a.NAMA_PASIEN, a.NO_MR,a.ALAMAT, a.KOTA, a.PROVINSI,A.JENIS_KELAMIN,
        a.TGL_LAHIR,c.SPESIALIS,  datediff(yy,a.Tgl_Lahir,getdate()) as umur,
        b.TANGGAL,b.KODE_DOKTER, c.NAMA_DOKTER, f.NAMALENGKAP
    
        FROM PKU.dbo.SURAT_DIRAWAT d 
        LEFT JOIN DB_RSMM.dbo.PENDAFTARAN b ON b.NO_REG=d.FS_KD_REG
        LEFT JOIN DB_RSMM.dbo.REGISTER_PASIEN a ON a.NO_MR=b.NO_MR
        LEFT JOIN DB_RSMM.dbo.DOKTER c ON d.mdb=c.KODE_DOKTER

        LEFT JOIN PKU.dbo.TAC_COM_USER e ON d.mdb=e.user_id
         LEFT JOIN DB_RSMM.dbo.TUSER f ON e.user_name=f.NAMAUSER

         WHERE d.FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    

     function insert_skd($params) {
        $sql = "INSERT INTO PKU.dbo.SURAT_KET_DOKTER(FS_KD_REG,PEKERJAAN,FS_BB,FS_TB,FS_TD,BUTA_WARNA, KACAMATA,TUJUANSURAT,NO_SURAT,mdb,mdd)
        VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function update_skd($params) {
        $sql = "UPDATE PKU.dbo.SURAT_KET_DOKTER SET PEKERJAAN = ?, FS_BB = ?,FS_TB=?,FS_TD=?,BUTA_WARNA=?, KACAMATA=?, TUJUANSURAT=?,  mdb=?,mdd=?
        WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function cek_skd($params) {
        $sql = "SELECT * FROM
        PKU.dbo.SURAT_KET_DOKTER
        WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function data_skd($params) {
        $sql = "SELECT d.*, b.NO_REG,a.NAMA_PASIEN, a.NO_MR, a.ALAMAT, a.KOTA, a.PROVINSI, a.JENIS_KELAMIN,
        a.TGL_LAHIR,c.SPESIALIS,  datediff(yy,a.Tgl_Lahir,getdate()) as umur,
        b.TANGGAL,b.KODE_DOKTER, c.NAMA_DOKTER
       
        FROM PKU.dbo.SURAT_KET_DOKTER d 
        LEFT JOIN DB_RSMM.dbo.PENDAFTARAN b ON b.NO_REG=d.FS_KD_REG
        LEFT JOIN DB_RSMM.dbo.REGISTER_PASIEN a ON a.NO_MR=b.NO_MR
        LEFT JOIN DB_RSMM.dbo.DOKTER c ON d.mdb=c.KODE_DOKTER
         WHERE d.FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


    function get_max_nomor_skd() {
        $tahun=date('Y');
        $bulan=date('m');
        $sql = " SELECT max(NO_SURAT) as nomax 
        FROM PKU.dbo.SURAT_KET_DOKTER  ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

      function get_px_ases_umum($params) {
        $sql = "
        SELECT A.*,   C.NO_REG, C.TANGGAL, D.NAMA_PASIEN, D.ALAMAT, D.NO_MR, E.NAMA_DOKTER
         from PKU.dbo.TAC_RJ_MEDIS AS A,   PENDAFTARAN AS C, REGISTER_PASIEN AS D, DOKTER as E 
         WHERE A.FS_KD_REG=C.NO_REG   AND D.NO_MR=C.NO_MR and A.FS_KD_MEDIS=E.KODE_DOKTER
         AND C.TANGGAL = ? AND A.FS_CARA_PULANG=3
       ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function cek_asesmen_umum($params) {
        $sql = "SELECT * FROM
        PKU.dbo.TAC_RI_MEDIS 
        WHERE FS_KD_REG = ? and FS_KD_MEDIS in('216','217','215','213','202','219','220','221','312','222','223','208','223','224') ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


 
 
    function get_data_awal_inap($params) { 
        $sql = "SELECT a.*,c.NAMA_DOKTER,b.user_name,KODE_DOKTER, d.NAMALENGKAP 
        FROM PKU.dbo.TAC_RJ_MEDIS a
        LEFT JOIN PKU.dbo.TAC_COM_USER b ON a.mdb=b.user_id
        LEFT JOIN DOKTER c ON b.user_name=c.KODE_DOKTER
        LEFT JOIN DB_RSMM.dbo.TUSER d ON b.user_name=d.NAMAUSER
        WHERE a.FS_KD_REG = ?  ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) { 
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


    function get_data_medis_ases($params) {
        $sql = "SELECT a.*,NAMALENGKAP
        FROM PKU.dbo.TAC_RI_MEDIS a
        LEFT JOIN DB_RSMM.dbo.TUSER b ON a.FS_KD_MEDIS=b.NAMAUSER
        WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }



}
