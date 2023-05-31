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

  


    function cek_umum_pra($params) {
        $sql = "SELECT FS_KD_REG FROM PKU.dbo.DATA_UMUM_PRA_OP WHERE idoperasi = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            return $result;
        } else {
            return 0;
        }
    }


    function cek_umum_post($params) {
        $sql = "SELECT FS_KD_REG FROM PKU.dbo.DATA_UMUM_POST_OP WHERE idoperasi = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            return $result;
        } else {
            return 0;
        }
    }

    function cek_lap_anes($params) {
        $sql = "SELECT FS_KD_REG FROM PKU.dbo.LAPORAN_ANESTESIA WHERE idoperasi = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            return $result;
        } else {
            return 0;
        }
    }


    function cek_lap_op($params) {
        $sql = "SELECT FS_KD_REG FROM PKU.dbo.LAPORAN_OPERASI WHERE idoperasi = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            return $result;
        } else {
            return 0;
        }
    }

    function cek_rencana_post_op($params) {
        $sql = "SELECT FS_KD_REG FROM PKU.dbo.RENCANA_MEDIS_POST_OP WHERE idoperasi = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            return $result;
        } else {
            return 0;
        }
    }


    function cek_checklist($params) {
        $sql = "SELECT FS_KD_REG FROM PKU.dbo.CHECKLIST_KES_OP WHERE idoperasi = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            return $result;
        } else {
            return 0;
        }
    }


    
    function cek_askep($params) {
        $sql = "SELECT FS_KD_REG FROM PKU.dbo.ASUHAN_KEP_OP WHERE idoperasi = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            return $result;
        } else {
            return 0;
        }
    }



    function cek_alat_habis_pakai($params) {
        $sql = "SELECT FS_KD_REG FROM PKU.dbo.ALAT_HABIS_PAKAI WHERE idoperasi = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            return $result;
        } else {
            return 0;
        }
    }


    function cek_ases_pra_anes($params) {
        $sql = "SELECT FS_KD_REG FROM PKU.dbo.ASES_PRA_ANESTESIA WHERE idoperasi = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            return $result;
        } else {
            return 0;
        }
    }


    function cek_ases_pra_op($params) {
        $sql = "SELECT FS_KD_REG FROM PKU.dbo.ASES_PRA_BEDAH WHERE idoperasi = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            return $result;
        } else {
            return 0;
        }
    }
    
    function get_alat_habis_pakai_by_rg($params) {
        $sql = " select A.* 
        from PKU.dbo.ALAT_HABIS_PAKAI A 
        WHERE  A.FS_KD_REG= ? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function get_alat_habis_pakai_by_rg3($params) {
        $sql = " select A.* 
        from PKU.dbo.ALAT_HABIS_PAKAI A 
        WHERE  A.idoperasi= ? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }



    function alat($params) {
        $sql = " select A.* 
        from PKU.dbo.ALAT_HABIS_PAKAI A 
        WHERE  A.FS_KD_REG= ? and A.id=? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function alat2($params) {
        $sql = " select A.* 
        from PKU.dbo.ALAT_HABIS_PAKAI A 
        WHERE  A.FS_KD_REG= ? and A.idoperasi=? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

 
    function get_list_umum_pra_op_by_rg($params) {
        $sql = "select A.*, B.NAMALENGKAP
        from PKU.dbo.DATA_UMUM_POST_OP A, DB_RSMM.dbo.TUSER B
        WHERE A.KD_OPERATOR=B.NamaUser and A.FS_KD_REG= ? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_list_sign_in_by_rg($params) {
        $sql = "select A.*, B.NAMALENGKAP
        from PKU.dbo.CHECKLIST_KES_OP A, DB_RSMM.dbo.TUSER B
        WHERE A.KD_OPERATOR=B.NamaUser and A.FS_KD_REG= ? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_list_sign_in_by_rg1($params) {
        $sql = "select A.*, B.NAMALENGKAP
        from PKU.dbo.CHECKLIST_KES_OP A, DB_RSMM.dbo.TUSER B
        WHERE A.KD_OPERATOR=B.NamaUser and A.FS_KD_REG= ?  and A.id=?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function get_list_sign_in_by_rg3($params) {
        $sql = "select A.*, B.NAMALENGKAP
        from PKU.dbo.CHECKLIST_KES_OP A, DB_RSMM.dbo.TUSER B
        WHERE A.KD_OPERATOR=B.NamaUser and A.id=?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function get_list_sign_in_by_rg4($params) {
        $sql = "select A.*, B.NAMALENGKAP
        from PKU.dbo.CHECKLIST_KES_OP A, DB_RSMM.dbo.TUSER B
        WHERE A.KD_OPERATOR=B.NamaUser and A.idoperasi=?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function get_list_sign_in_by_rg2($params) {
        $sql = "select A.*, B.NAMALENGKAP
        from PKU.dbo.CHECKLIST_KES_OP A, DB_RSMM.dbo.TUSER B
        WHERE A.KD_OPERATOR=B.NamaUser   and A.idoperasi=?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function get_progress($params) {
        $tgl=date('Y-m-d');
        $sql = "select * from PKU.dbo.PROGRES_ANESTESI where idoperasi=? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }



    function get_progress_by_id($params) {
        $tgl=date('Y-m-d');
        $sql = "select * from PKU.dbo.PROGRES_ANESTESI where id=? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_list_intra_by_rg1($params) {
        $sql = "select A.* 
        from PKU.dbo.ASUHAN_KAJIAN_INTRA A 
        WHERE    A.id=?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


    function get_list_post_by_rg1($params) {
        $sql = "select A.* 
        from PKU.dbo.ASUHAN_KAJIAN_POST A 
        WHERE    A.id=?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


   
    

    

    function get_list_pra_anes_by_rg($params) {
        $sql = "select A.*, B.NAMALENGKAP
        from PKU.dbo.ASES_PRA_ANESTESIA A, DB_RSMM.dbo.TUSER B
        WHERE A.KD_OPERATOR=B.NamaUser and A.FS_KD_REG= ? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }



    function get_list_lap_anes_by_rg($params) {
        $sql = "select A.*, B.NAMALENGKAP
        from PKU.dbo.LAPORAN_ANESTESIA A, DB_RSMM.dbo.TUSER B
        WHERE A.KD_AHLI_ANESTESI=B.NamaUser and A.FS_KD_REG= ? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }



    function get_list_lap_anes_by_rg2($params) {
        $sql = "select top 1 A.*, B.NAMALENGKAP
        from PKU.dbo.LAPORAN_ANESTESIA A, DB_RSMM.dbo.TUSER B
        WHERE A.KD_AHLI_ANESTESI=B.NamaUser and A.FS_KD_REG= ? order by id desc ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function get_list_lap_anes_by_rg3($params) {
        $sql = "select A.*, B.NAMALENGKAP
        from PKU.dbo.LAPORAN_ANESTESIA A, DB_RSMM.dbo.TUSER B
        WHERE A.KD_AHLI_ANESTESI=B.NamaUser and A.idoperasi= ? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    
    function get_list_pra_anes_by_rg2($params) {
        $sql = "select top 1 A.*, B.NAMALENGKAP
        from PKU.dbo.ASES_PRA_ANESTESIA A, DB_RSMM.dbo.TUSER B
        WHERE A.KD_OPERATOR=B.NamaUser and A.FS_KD_REG= ? order by A.id desc";
         $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


    function get_list_pra_anes_by_rg3($params) {
        $sql = "select top 1 A.*, B.NAMALENGKAP
        from PKU.dbo.ASES_PRA_ANESTESIA A,  DB_RSMM.dbo.TUSER B
        WHERE  A.idoperasi= ? and  A.KD_OPERATOR=B.NamaUser";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    

    function INSERT_LAP($params) {
        $sql = "INSERT INTO PKU.dbo.LAPORAN_OPERASI( FS_KD_REG, KD_AHLI_ANESTESI, KD_ANESTESI, DIAGNOSA_PRE, DIAGNOSA_POST, BAGIAN_EKSISI, KIRIM_PA, TGL_MULAI, JAM_MULAI, JAM_SELESAI, LAMA_OP, URAIAN_LAPORAN, UMUR_SAAT_OP, KD_OPERATOR, KD_ASISTEN, KD_PERAWAT, NAMA_OPERASI, idoperasi,MDB)
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

   
    function INSERT_PRA_ANES($params) {
        $sql = "INSERT INTO PKU.dbo.ASES_PRA_ANESTESIA( FS_KD_REG, TGL_OP, KD_OPERATOR, KD_PERAWAT, PEMERIKSAAN_FISIK, K_ROKOK, K_MINUM_KOPI, K_OLGA, RIWAYAT_ALERGI, RIWAYAT_SAKIT, RIWAYAT_SAKIT_KELUARGA, RIWAYAT_OP, TES_HIV, HILANG_GIGI, LEHER, LEHER_PENDEK, BATUK, SESAK, MUNTAH, PINGSAN, STROKE, KEJANG, HAMIL, TULANG_BLK, SALURAN_NAPAS, DADA, JANTUNG, KET, DIAGNOSA, PENYULIT_ANESTESI, TL, TEKNIS_ANESTESI, TEKNIS_KHUSUS, PERAWATAN, PUASA, PRE_MEDIK, TRANSPORT_RUANG_OP, RENCANA_OP, CATATAN, idoperasi)
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function DATA_UMUM_POST_OP($params) {
        $sql = "INSERT INTO PKU.dbo.DATA_UMUM_POST_OP( FS_KD_REG, TGL, KD_PERAWAT, KD_OPERATOR, DIAGNOSA_PRA,DIAGNOSA_POST,JENIS_OP,JENIS_ANEST,KD_AHLI_ANES,KD_ANES,TERPASANG,TB,BB,TD,ND,P,SH,INSTRUKSI_DOKTER, MDD, JAM_OP, SERAH_TERIMA_BERKAS, STATUS_P, CAT_ANEST, LAP_BED, REN_MED, CHECK_K, CHECK_MON, ASKEP, LEMBAR, FORM_P, SAMP, RONTGEN, RESEP, LAIN,KESADARAN, idoperasi)
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }



    function INSERT_SIGN_IN($params) {
        $sql = "INSERT INTO PKU.dbo.CHECKLIST_KES_OP( FS_KD_REG, TGL, KD_PERAWAT, KD_OPERATOR, KD_AHLI_ANESTESI, NAMA_OP, IN_KONFIR_IDENTITAS,IN_TANDA_LOKASI,IN_MESIN_LENGKAP,IN_RIWAYAT_ALEGI, IN_RIWAYAT_ASMA, IN_RENCANA_IMPLANT, IN_RESIKO_HILANG_DARAH, TIME_PERKENALAN_ANGGOTA,OUT_MASALAH_ALAT,idoperasi)
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function INSERT_DATA_OP($params) {
        $sql = "INSERT INTO JADWAL_OP( FS_KD_REG, tanggalop, nmtindakan, kodepoli, STATUS_OP, JENIS, REKANAN, kodebooking, Kode_Dokter, terlaksana, NO_BPJS, MDB, last_update)
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }


    function INSERT_MHS($params) {
        $sql = " BEGIN
        DECLARE @sales nvarchar(8);
    
        BEGIN TRANSACTION
    
            SELECT    @sales = count(*)  FROM   ANTRIAN where Dokter='113' and   Tanggal='2022-04-24';    
         
            IF @sales > 1
            BEGIN
                insert into ANTRIAN VALUES('MESIN',((SELECT MAX(Nomor)  from ANTRIAN WHERE Tanggal='2022-04-24' and Dokter='113')+1),'111111','2022-04-24','2022-04-24','113','UMUM','antri',null,null,null,null,null)
                PRINT 'Sukses';
            END
        
            ELSE
            BEGIN 
               insert into ANTRIAN VALUES('MESIN',1,'111111','2022-04-24','2022-04-24','113','UMUM','antri',null,null,null,null,null)
               PRINT 'Sukses dari 1'
            end
           SAVE TRANSACTION POINT1
    
    END";
        return $this->db->query($sql);
    }


    function INSERT_ALAT_HABIS_PAKAI($params) {
        $sql = "INSERT INTO PKU.dbo.ALAT_HABIS_PAKAI( FS_KD_REG, TGL_OP, namabarang, jumlah,idoperasi,MDB,MDD)
        VALUES(?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }


    function list_bhp_masuk() {
        $dt=date('Y-m-d');
        $sql = "  select A.*, B.No_MR, C.Nama_Pasien, C.Alamat, D.Nama_Dokter, E.*
        from PKU.dbo.ALAT_HABIS_PAKAI as A, PENDAFTARAN as B, REGISTER_PASIEN as C, DOKTER as D, JADWAL_OP E
         where    A.idoperasi=E.id  and B.STATUS='1'
      and E.FS_KD_REG=B.No_Reg and B.No_MR=C.No_MR and E.Kode_Dokter=D.Kode_Dokter";
      $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    

    function INSERT_TIME_OUT($params) {
        $sql = "UPDATE PKU.dbo.CHECKLIST_KES_OP SET  
        TIME_PERKENALAN_ANGGOTA = ?, 
        TIME_ANTISIPASI_HILANG_DARAH = ?,
        TIME_ALAT_KHUSUS = ?,
                TIME_LANGKAH_KRITIS = ?,
                TIME_MASALAH_SPESIFIK = ?,
                TIME_DERAJAT_ASA = ?,
                TIME_PANTAU_ALAT = ?,
                TIME_STERIL_INSTRUMEN = ?,
                TIME_MASALAH_ALAT = ?,
                TIME_LOKASI_LUKA = ?,
                TIME_PROFILAKSI = ?,
                TIME_HASIL_RADIOLOGI = ?
        WHERE id =?";
        return $this->db->query($sql, $params);
    }
    

    function INSERT_SIGN_OUT($params) {
        $sql = "UPDATE PKU.dbo.CHECKLIST_KES_OP SET  
        OUT_CATAT_TINDAKAN=?, OUT_INSTRUMEN_LENGKAP  =?, OUT_TL_JARINGAN =?, OUT_MASALAH_ALAT =?, OUT_PERHATIAN=?
        WHERE id =?";
        return $this->db->query($sql, $params);
    }

    
    function INSERT_PRA_BEDAH($params) {
        $sql = "INSERT INTO PKU.dbo.ASES_PRA_BEDAH( FS_KD_REG, TGL_OP, KD_OPERATOR, KD_PERAWAT, DATA_S, DATA_O, DIAGNOSA_PRA, V_STATUS_PASIEN, V_ASES_PRA_LOK, V_INFORMED_BEDAH, V_INFORMED_ANESTESI, V_PRA_ANESTESI, V_EDU_ANESTESI, HB, LEUKOSIT, TROMBOSIT, HEMATOKRIT, BT, CT, LAINNYA, RONTGEN, EKG, ALAT_LAIN, OBAT_YG_DIBAWA, ESTIMASI_WAKTU, RENCANA_TINDAKAN,idoperasi)
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }


    function INSERT_BENDA_TAJAM($params) {
        $sql = "INSERT INTO PKU.dbo.BENDA_TAJAM(idchecklist,namabarang, hit1, tambahan)
        VALUES(?,?,?,?)";
        return $this->db->query($sql, $params);
    }
    


    function INSERT_LAP_ANES($params) {
        $sql = "INSERT INTO PKU.dbo.LAPORAN_ANESTESIA( FS_KD_REG, TGL, KD_AHLI_ANESTESI, KD_ANESTESI, KD_PERAWAT, DIAGNOSA_PRA, DIAGNOSA_POST, TINDAKAN, JENIS, RESIKO, PEMERIKSAAN_FISIK, RIWAYAT_ALERGI, RIWAYAT_SAKIT, RIWAYAT_SAKIT_KELUARGA, RIWAYAT_OP, TES_HIV, TEKNIS_ANESTESI,OBAT_PRE,OBAT_INDUKSI,OBAT_MUSCAL,OBAT_MAINT,MULAI_ANEST,SELESAI_ANEST,RL,NACL,DEXTRAN,DARAH_MASUK,CAIRAN_MASUK_LAIN,OBAT_MASUK,PENDARAHAN,URINE,CAIRAN_KELUAR_LAIN,CATATAN,POSISI,SKALA_NYERI, BILA_SAKIT, BILA_MUAL, ANTIBIOTIK, OBAT_LAIN, MINUM, INFUS, MONITOR, JAM_KELUAR, PINDAH_KE, CATATAN_LAIN_PRE,idoperasi)
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }



    function INSERT_DATA_UMUM_PRA_OP($params) {
        $sql = "INSERT INTO PKU.dbo.DATA_UMUM_PRA_OP( FS_KD_REG, TGL, KD_PERAWAT,  KD_OPERATOR,DIAGNOSA,JENIS_OP,MAKAN_TERAKHIR,PUASA_JAM,RIWAYAT_ASMA,RIWAYAT_ALERGI,ANTIBIOTIK,TB,BB,TD,ND,P,SH,PREMEDIKASI,IVFD,LAMPIRAN,DC,DARAH,JUM_DARAH,OBAT,RONTGEN,SAKIT_KRONIS,LAPOR_DOKTER,LAPOR_OK,SURAT_IZIN,TANDA_LOKASI,GELANG,LAIN,CUKUR,LEPAS_BEHEL,HAPUS_LIPS,ORAL_HYG,FIKS_LEHER,INFUS,NGT,DRAINAGE,WSD,PASANG_DC, MDD,idoperasi)
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }



    function INSERT_PROGRESS($params) {
        $sql = "INSERT INTO PKU.dbo.PROGRES_ANESTESI( idoperasi, nadi, intubasi,  extubasi,tekanan_darah_atas,tekanan_darah_bawah,respirasi, periode,MDB,MDD)
        VALUES(?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }


    function UPDATE_PROGRESS($params) {
        $sql = "UPDATE PKU.dbo.PROGRES_ANESTESI SET  
       idoperasi=?, nadi=?, intubasi=?,  extubasi=?,tekanan_darah_atas=?,tekanan_darah_bawah=?,respirasi=?,periode=?,MDB=?,MDD=?
        WHERE id =?";
        return $this->db->query($sql, $params);
    }


    
    function INSERT_PASCA_BEDAH($params) {
        $sql = "INSERT INTO PKU.dbo.RENCANA_MEDIS_POST_OP( FS_KD_REG, TGL_OP, TINGKAT_PERAWATAN, PERIODE_MONITOR, KONSUL_LAYANAN_LAIN, TERAPI, mdb,mdd, idoperasi)
        VALUES(?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function INSERT_ASUHAN_KEP_OP($params) {
        $sql = "INSERT INTO PKU.dbo.ASUHAN_KEP_OP( FS_KD_REG, TGL, KD_PERAWAT_ANES, KD_PERAWAT_INS, KD_PERAWAT_SERK, KD_OPERATOR, JAM_MULAI, JAM_SELESAI, SIFAT_OP, JENIS_ANES, DIAGNOSA_PRA, DIAGNOSA_POST, TINDAKAN_OP, MDD,KD_AHLI_ANESTESI,idoperasi)
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }


    function INSERT_ASUHAN_PRA($params) {
        $sql = "INSERT INTO PKU.dbo.ASUHAN_KAJIAN_PRA(idasuhan, FS_KD_REG, KESADARAN, STATUS_PSIKOLOGI, TD,ND,SH,P,PUASA,JENIS_PUASA, KULIT, EVALUASI, MDD, MDB )
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

  
    function INSERT_ASUHAN_IN($params) {
        $sql = "INSERT INTO PKU.dbo.ASUHAN_KAJIAN_INTRA(idasuhan, FS_KD_REG,  TD,ND,SH,P,SP02, EVALUASI, MDD, MDB )
        VALUES(?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

  
    function INSERT_ASUHAN_POST($params) {
        $sql = "INSERT INTO PKU.dbo.ASUHAN_KAJIAN_POST(idasuhan, FS_KD_REG,  TD,ND,SH,P,SP02, KULIT, 
        TURGOR, LOKASI, IMPLANT, INFUS_MASUK, DARAH_MASUK, PENDARAHAN, URINE, ASITES, PUS, EVALUASI, MDD, MDB )
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }


    function get_list_umum_pra_by_rg($params) {
        $sql = "select A.*
        from PKU.dbo.DATA_UMUM_PRA_OP A
        WHERE  A.FS_KD_REG= ? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    


    function get_list_umum_pra_by_rg2($params) {
        $sql = "select top 1 A.*, B.NAMALENGKAP
        from PKU.dbo.DATA_UMUM_PRA_OP A, DB_RSMM.dbo.TUSER B
        WHERE A.KD_OPERATOR=B.NamaUser and A.FS_KD_REG= ? order by A.id desc";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_list_umum_pra_by_rg3($params) {
        $sql = "select top 1 A.* 
        from PKU.dbo.DATA_UMUM_PRA_OP A 
        WHERE   A.idoperasi= ? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }




    
    


    
    function get_list_umum_post_by_rg($params) {
        $sql = "select A.*, B.NAMALENGKAP
        from PKU.dbo.DATA_UMUM_POST_OP A, DB_RSMM.dbo.TUSER B
        WHERE A.KD_OPERATOR=B.NamaUser and A.FS_KD_REG= ? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function get_list_umum_post_by_rg3($params) {
        $sql = "select A.*, B.NAMALENGKAP
        from PKU.dbo.DATA_UMUM_POST_OP A, DB_RSMM.dbo.TUSER B
        WHERE A.KD_OPERATOR=B.NamaUser and A.idoperasi= ? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_list_asuhan_kep_op_by_rg($params) {
        $sql = "select A.*, B.NAMALENGKAP
        from PKU.dbo.ASUHAN_KEP_OP A, DB_RSMM.dbo.TUSER B
        WHERE A.KD_OPERATOR=B.NamaUser and A.FS_KD_REG= ? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }



    function get_list_asuhan_all_op_by_rg($params) {
        $sql = "select A.*, B.NAMALENGKAP, C.KESADARAN, C.STATUS_PSIKOLOGI, D.SP02, D.TD AS TD2, D.ND AS ND2, D.SH AS SH2, D.P AS P2, D.EVALUASI AS EVALUASI2,
        E.TD AS TD3, E.ND AS ND3, E.SH AS SH3, E.P AS P3, E.SP02 AS SP023, E.TURGOR, E.IMPLANT, E.INFUS_MASUK, E.DARAH_MASUK, E.PENDARAHAN, E.URINE, E.ASITES, E.PUS, E.EVALUASI AS EVALUASI3
        from PKU.dbo.ASUHAN_KEP_OP A, DB_RSMM.dbo.TUSER B,  PKU.dbo.ASUHAN_KAJIAN_PRA C, PKU.dbo.ASUHAN_KAJIAN_INTRA D, PKU.dbo.ASUHAN_KAJIAN_POST E  
        WHERE A.id=C.idasuhan and A.id=D.idasuhan and A.id=E.idasuhan and  A.KD_OPERATOR=B.NamaUser and A.FS_KD_REG= ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    
    function get_list_asuhan_all_op_by_rg2($params) {
        $sql = "select top 1 A.*, B.NAMALENGKAP, C.KESADARAN, C.STATUS_PSIKOLOGI, D.SP02, D.TD AS TD2, D.ND AS ND2, D.SH AS SH2, D.P AS P2, D.EVALUASI AS EVALUASI2,
        E.TD AS TD3, E.ND AS ND3, E.SH AS SH3, E.P AS P3, E.SP02 AS SP023, E.TURGOR, E.IMPLANT, E.INFUS_MASUK, E.DARAH_MASUK, E.PENDARAHAN, E.URINE, E.ASITES, E.PUS, E.EVALUASI AS EVALUASI3
        from PKU.dbo.ASUHAN_KEP_OP A, DB_RSMM.dbo.TUSER B,  PKU.dbo.ASUHAN_KAJIAN_PRA C, PKU.dbo.ASUHAN_KAJIAN_INTRA D, PKU.dbo.ASUHAN_KAJIAN_POST E  
        WHERE A.id=C.idasuhan and A.id=D.idasuhan and A.id=E.idasuhan and  A.KD_OPERATOR=B.NamaUser and A.FS_KD_REG= ? order by id desc";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


    function get_list_asuhan_all_op_by_rg3($params) {
        $sql = "select top 1 A.*, B.NAMALENGKAP, C.KESADARAN, C.STATUS_PSIKOLOGI, D.SP02, D.TD AS TD2, D.ND AS ND2, D.SH AS SH2, D.P AS P2, D.EVALUASI AS EVALUASI2,
        E.TD AS TD3, E.ND AS ND3, E.SH AS SH3, E.P AS P3, E.SP02 AS SP023, E.TURGOR, E.IMPLANT, E.INFUS_MASUK, E.DARAH_MASUK, E.PENDARAHAN, E.URINE, E.ASITES, E.PUS, E.EVALUASI AS EVALUASI3
        from PKU.dbo.ASUHAN_KEP_OP A, DB_RSMM.dbo.TUSER B,  PKU.dbo.ASUHAN_KAJIAN_PRA C, PKU.dbo.ASUHAN_KAJIAN_INTRA D, PKU.dbo.ASUHAN_KAJIAN_POST E  
        WHERE A.id=C.idasuhan and A.id=D.idasuhan and A.id=E.idasuhan and  A.KD_OPERATOR=B.NamaUser and A.idoperasi= ? order by id desc";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    

       

    function get_list_asuhan_all_op_by_rg4($params) {
        $sql = "select top 1 A.*, C.KESADARAN, C.STATUS_PSIKOLOGI, D.SP02, D.TD AS TD2, D.ND AS ND2, D.SH AS SH2, D.P AS P2, D.EVALUASI AS EVALUASI2,
        E.TD AS TD3, E.ND AS ND3, E.SH AS SH3, E.P AS P3, E.SP02 AS SP023, E.TURGOR, E.IMPLANT, E.INFUS_MASUK, E.DARAH_MASUK, E.PENDARAHAN, E.URINE, E.ASITES, E.PUS, E.EVALUASI AS EVALUASI3
        from PKU.dbo.ASUHAN_KEP_OP A, PKU.dbo.ASUHAN_KAJIAN_PRA C, PKU.dbo.ASUHAN_KAJIAN_INTRA D, PKU.dbo.ASUHAN_KAJIAN_POST E  
        WHERE A.id=C.idasuhan and A.id=D.idasuhan and A.id=E.idasuhan and  A.id= ? order by id desc";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    

    function get_px_op($params) {
        $tgl=date('Y-m-d');
        $sql = "select A.*, B.No_MR, B.No_Reg, C.Nama_Pasien , C.Alamat, F.Nama_Dokter
		from JADWAL_OP as A, PENDAFTARAN B, REGISTER_PASIEN C, DOKTER F
		where A.FS_KD_REG=B.No_Reg and C.No_MR=B.No_MR and F.Kode_Dokter=A.Kode_Dokter and A.tanggalop>='$tgl' 
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

    function get_px_op_by_id($params) {
        $tgl=date('Y-m-d');
        $sql = "select A.*, B.No_MR, B.No_Reg, C.Nama_Pasien , C.Alamat, F.Nama_Dokter
		from JADWAL_OP as A, PENDAFTARAN B, REGISTER_PASIEN C, DOKTER F
		where A.FS_KD_REG=B.No_Reg and C.No_MR=B.No_MR and F.Kode_Dokter=A.Kode_Dokter  and A.id=?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    
    function get_list_asuhan_all_op2_by_rg($params) {
        $sql = "select A.*, B.NAMALENGKAP, C.KESADARAN, C.STATUS_PSIKOLOGI, D.SP02, D.TD AS TD2, D.ND AS ND2, D.SH AS SH2, D.P AS P2, D.EVALUASI AS EVALUASI2,
        E.TD AS TD3, E.ND AS ND3, E.SH AS SH3, E.P AS P3, E.SP02 AS SP023, E.TURGOR, E.IMPLANT, E.INFUS_MASUK, E.DARAH_MASUK, E.PENDARAHAN, E.URINE, E.ASITES, E.PUS, E.EVALUASI AS EVALUASI3
        from PKU.dbo.ASUHAN_KEP_OP A, DB_RSMM.dbo.TUSER B,  PKU.dbo.ASUHAN_KAJIAN_PRA C, PKU.dbo.ASUHAN_KAJIAN_INTRA D, PKU.dbo.ASUHAN_KAJIAN_POST E  
        WHERE A.id=C.idasuhan and A.id=D.idasuhan and A.id=E.idasuhan and  A.KD_OPERATOR=B.NamaUser and A.FS_KD_REG= ? and A.id=?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


       
    function get_list_asuhan_all_op2_by_rg3($params) {
        $sql = "select A.*, B.NAMALENGKAP, C.*,
         D.SP02, D.TD AS TD2, D.ND AS ND2, D.SH AS SH2, D.P AS P2, D.EVALUASI AS EVALUASI2,
        E.TD AS TD3, E.ND AS ND3, E.SH AS SH3, E.P AS P3, E.SP02 AS SP023, E.TURGOR, E.IMPLANT, E.INFUS_MASUK, E.DARAH_MASUK, E.PENDARAHAN, E.URINE, E.ASITES, E.PUS, E.EVALUASI AS EVALUASI3
        from PKU.dbo.ASUHAN_KEP_OP A, DB_RSMM.dbo.TUSER B, 
         PKU.dbo.ASUHAN_KAJIAN_PRA C, 
         PKU.dbo.ASUHAN_KAJIAN_INTRA D,
          PKU.dbo.ASUHAN_KAJIAN_POST E  
        WHERE A.id=C.idasuhan and A.id=D.idasuhan and A.id=E.idasuhan and  A.KD_OPERATOR=B.NamaUser and A.FS_KD_REG= ? and A.idoperasi=?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    

      
    function get_list_benda_tajam_by_rg($params) {
        $sql = "select A.*  from PKU.dbo.BENDA_TAJAM A 
         WHERE    A.idchecklist=?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


   


    

    function update_kajian_intra($params) {
        $sql = "UPDATE PKU.dbo.ASUHAN_KAJIAN_INTRA SET FS_KD_REG = ?, TD=?,ND=?,SH=?,P=?,SP02=?,EVALUASI=?, MDD=?, MDB=?  WHERE idasuhan = ?";
        return $this->db->query($sql, $params);
    }
 

    function update_asuhan_selesai($params) {
        $sql = "UPDATE PKU.dbo.ASUHAN_KEP_OP SET JAM_SELESAI = ?  WHERE id = ?";
        return $this->db->query($sql, $params);
    }
 


    function update_kajian_post($params) {
        $sql = "UPDATE PKU.dbo.ASUHAN_KAJIAN_POST SET FS_KD_REG = ?, TD=?,ND=?,SH=?,P=?,SP02=?, KULIT=?,TURGOR=?,LOKASI=?,IMPLANT=?,INFUS_MASUK=?,DARAH_MASUK=?,PENDARAHAN=?,URINE=?,ASITES=?,PUS=?, EVALUASI=?, MDD=?, MDB=?  WHERE idasuhan = ?";
        return $this->db->query($sql, $params);
    }


    function get_list_pra_op_by_rg($params) {
        $sql = "select A.*, B.NAMALENGKAP
        from PKU.dbo.ASES_PRA_BEDAH A, DB_RSMM.dbo.TUSER B
        WHERE A.KD_OPERATOR=B.NamaUser and A.FS_KD_REG= ? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }



    function get_list_pra_op_by_rg3($params) {
        $sql = "select A.*, B.NAMALENGKAP
        from PKU.dbo.ASES_PRA_BEDAH A, DB_RSMM.dbo.TUSER B
        WHERE A.KD_OPERATOR=B.NamaUser and A.idoperasi= ? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }




    // insert surat keluar
    function insert($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_RI_CPPT(FS_KD_REG, FS_CPPT_S, FS_CPPT_O, FS_CPPT_A, FS_CPPT_P,FS_CPPT_TERAPI,FS_KD_KP, mdb, mdd_date, mdd_time)
        VALUES     (?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insertt($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_RI_CPPT(FS_KD_REG, FS_CPPT_S, FS_CPPT_O,
         FS_CPPT_A, FS_CPPT_P,FS_CPPT_TERAPI,FS_KD_KP, mdb, mdd_date, mdd_time, FS_LAB, FS_RAD, TGL_TUJUAN_LAB)
        VALUES     (?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    //ini baru
    

    function get_id_asuhan($params) {
        $sql = "SELECT top 1  *
                FROM PKU.dbo.ASUHAN_KEP_OP WHERE idoperasi = ? order by id desc ";
         $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    } 

    function get_id_check($params) {
        $sql = "SELECT top 1  *
                FROM PKU.dbo.CHECKLIST_KES_OP WHERE idoperasi = ? order by id desc ";
         $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    } 


    function get_id_operasi($params) {
        $sql = "SELECT top 1  *
                FROM PKU.dbo.ASUHAN_KEP_OP WHERE id = ? order by id desc ";
         $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    } 


    function get_id_operasi2($params) {
        $sql = "SELECT top 1  *
                FROM PKU.dbo.CHECKLIST_KES_OP WHERE id = ? order by id desc ";
         $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    } 
    

    function get_id_operasi3($params) {
        $sql = "SELECT top 1  *
                FROM PKU.dbo.CHECKLIST_KES_OP WHERE idoperasi = ? order by id desc ";
         $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    } 
    

    function DELETE_DATA_UMUM_PRA_OP($params) {
             $sql = "DELETE FROM PKU.dbo.DATA_UMUM_PRA_OP WHERE idoperasi = ?";
            return $this->db->query($sql, $params);
        }



        function delete_progress($params) {
            $sql = "DELETE FROM PKU.dbo.PROGRES_ANESTESI WHERE id = ?";
           return $this->db->query($sql, $params);
       }

        function DELETE_ALAT_HABIS_PAKAI($params) {
            $sql = "DELETE FROM PKU.dbo.ALAT_HABIS_PAKAI WHERE idoperasi = ?";
           return $this->db->query($sql, $params);
       }


        function DELETE_PRA_ANES($params) {
            $sql = "DELETE FROM PKU.dbo.ASES_PRA_ANESTESIA WHERE idoperasi = ?";
           return $this->db->query($sql, $params);
       }

       function DELETE_PRA_BEDAH($params) {
        $sql = "DELETE FROM PKU.dbo.ASES_PRA_BEDAH WHERE idoperasi = ?";
       return $this->db->query($sql, $params);
   }


   function DELETE_LAP_ANES($params) {
    $sql = "DELETE FROM PKU.dbo.LAPORAN_ANESTESIA WHERE idoperasi = ?";
   return $this->db->query($sql, $params);
}


function DELETE_LAP_OP($params) {
    $sql = "DELETE FROM PKU.dbo.LAPORAN_OPERASI WHERE idoperasi = ?";
   return $this->db->query($sql, $params);
}


function DELETE_RENCANA_POST_OP($params) {
    $sql = "DELETE FROM PKU.dbo.RENCANA_MEDIS_POST_OP WHERE idoperasi = ?";
   return $this->db->query($sql, $params);
}


function DELETE_DATA_UMUM_POST_OP($params) {
    $sql = "DELETE FROM PKU.dbo.DATA_UMUM_POST_OP WHERE idoperasi = ?";
   return $this->db->query($sql, $params);
}


function DELETE_BENDA_TAJAM($params) {
    $sql = "DELETE FROM PKU.dbo.BENDA_TAJAM WHERE idchecklist = ?";
   return $this->db->query($sql, $params);
}


//ini baru
function get_resep_by_trs2($params) {
    $sql = "SELECT *
            FROM PKU.dbo.TAC_RI_CPPT WHERE FS_KD_KP = ? AND FD_TGL_VOID = '3000-01-01'";
    $query = $this->db->query($sql, $params);
    $query = $this->db->query($sql, $params);
    if ($query->num_rows() > 0) {
        $result = $query->row_array();
        $query->free_result();
        return $result;
    } else {
        return array();
    }
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




    function get_list_op_by_rg($params) {
        $sql = "select A.*, B.NAMALENGKAP
        from PKU.dbo.LAPORAN_OPERASI A, DB_RSMM.dbo.TUSER B
        WHERE A.KD_OPERATOR=B.NamaUser and A.FS_KD_REG= ? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function get_list_op_by_rg2($params) {
        $sql = "select top 1 A.*, B.NAMALENGKAP
        from PKU.dbo.LAPORAN_OPERASI A, DB_RSMM.dbo.TUSER B
        WHERE A.KD_OPERATOR=B.NamaUser and A.FS_KD_REG= ? order by id desc";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_list_op_by_rg3($params) {
        $sql = "select A.*, B.NAMALENGKAP
        from PKU.dbo.LAPORAN_OPERASI A, DB_RSMM.dbo.TUSER B
        WHERE A.KD_OPERATOR=B.NamaUser and A.idoperasi= ? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_list_pasca_op_by_rg($params) {
        $sql = " select A.*, B.NAMALENGKAP
        from PKU.dbo.RENCANA_MEDIS_POST_OP A, DB_RSMM.dbo.TUSER B
        WHERE A.mdb=B.NamaUser and A.FS_KD_REG= ? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function get_list_pasca_op_by_rg3($params) {
        $sql = " select A.*, B.NAMALENGKAP
        from PKU.dbo.RENCANA_MEDIS_POST_OP A, DB_RSMM.dbo.TUSER B
        WHERE A.mdb=B.NamaUser and A.idoperasi= ? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }



    function get_perawat($params) {
        $sql = " SELECT A.NAMAUSER, A.NAMALENGKAP
        FROM DB_RSMM.dbo.TUSER A, PKU.dbo.TAC_COM_USER B,  PKU.dbo.TAC_COM_ROLE_USER C,  PKU.dbo.TAC_COM_ROLE D 
        WHERE A.NamaUser=B.user_name and B.user_id=C.user_id and D.role_id=C.role_id and D.role_id in('1026','3','10')";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }



     function get_perawat_ok($params) {
        $sql = " SELECT A.NAMAUSER, A.NAMALENGKAP
        FROM DB_RSMM.dbo.TUSER A, PKU.dbo.TAC_COM_USER B,  PKU.dbo.TAC_COM_ROLE_USER C,  PKU.dbo.TAC_COM_ROLE D 
        WHERE A.NamaUser=B.user_name and B.user_id=C.user_id and D.role_id=C.role_id and D.role_id in('27')";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }



    function get_dokter_sp($params) {
        $sql = " SELECT A.NAMAUSER, A.NAMALENGKAP
        FROM DB_RSMM.dbo.TUSER A, PKU.dbo.TAC_COM_USER B,  PKU.dbo.TAC_COM_ROLE_USER C,  PKU.dbo.TAC_COM_ROLE D 
        WHERE A.NamaUser=B.user_name and B.user_id=C.user_id and D.role_id=C.role_id and D.role_id in('5')";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }



    function data_operasi($params) {
        $sql = " SELECT  A.*, B.* FROM JADWAL_OP A, DOKTER B WHERE id=? and A.Kode_Dokter=B.Kode_Dokter";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            return $result;
        } else {
            return array();
        }
    }




    function get_pasien_inap($params) {
        $sql = "SELECT A.NO_REG,A.NO_MR,B.NAMA_PASIEN,A.KODE_RUANG, E.KODEREKANAN
        FROM TR_KAMAR A, REGISTER_PASIEN B,PENDAFTARAN E 
        WHERE A.NO_MR=B.NO_MR AND A.NO_REG=E.NO_REG 
		 AND A.STATUS='1' AND E.STATUS='1' 
		  ORDER BY A.TGL_MULAI";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
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


    function UPDATE_DATA_OP($params) {
        $sql = "UPDATE JADWAL_OP SET FS_KD_REG=?, tanggalop=?, nmtindakan=?, kodepoli=?, STATUS_OP=?, JENIS=?, REKANAN=?,
         kodebooking=?, Kode_Dokter=?, terlaksana=?, NO_BPJS=?, MDB=?, last_update=?
        WHERE id = ?";
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
 












    //ini ditambah
    function get_data_medis_by_rg($params) {
        $sql = "SELECT top 1 a.*,NAMALENGKAP
        FROM PKU.dbo.TAC_RI_MEDIS a
        LEFT JOIN DB_RSMM.dbo.TUSER b ON a.FS_KD_MEDIS=b.NAMAUSER
        WHERE FS_KD_REG = ? order by FS_KD_TRS desc";
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
