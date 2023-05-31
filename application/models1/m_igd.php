<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_igd extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
 
    function get_px_igd($params) {

        $sql = "select A.No_MR, A.No_Reg, A.Kode_Ruang, A.Kode_Masuk, A.Kode_Dokter, B.Nama_Pasien, B.Alamat from PENDAFTARAN A, REGISTER_PASIEN B
        where  A.No_MR=B.No_MR and A.Kode_Masuk=1 and A.Status=1 and (Tanggal=? or Tanggal=?)";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }



    function get_px_tb($params) {

        $sql = " SELECT A.*, A.MDD as tglp,  B.No_Reg, B.Kode_Dokter, C.Nama_Pasien, C.No_MR, C.Jenis_Kelamin, 
        C.Alamat, C.Kota, C.No_Identitas, C.HP2, C.Tgl_Lahir, A.id as idlab
        FROM PKU.dbo.PASIEN_TB A
        LEFT JOIN PENDAFTARAN B ON B.No_Reg=A.FS_KD_REG
        LEFT JOIN REGISTER_PASIEN C ON C.No_MR=B.No_MR 
        
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


    function INSERT($params) {
        $sql = "INSERT INTO PKU.dbo.TRIASE(FS_KD_REG, Nama_Pasien, Alamat, TGL_DATANG, JAM_DATANG, CARA_MASUK, SUDAH_TERPASANG, ALASAN_DATANG, KENDARAAN, NAMA_PENGANTAR, TELP_PENGANTAR, JENIS_KASUS, JENIS_TRAUMA, URAIAN_TRAUMA, TGL_KEJADIAN, TEMPAT_KEJADIAN, PACS, KESADARAN, SKOR_KESADARAN, TD, SKOR_TD, R, SKOR_R, O2, SKOR_O2, N, N_SKOR, SUHU, SKOR_SUHU, NYERI, BB, TB, KEPUTUSAN, rujukan_dari, dijemput, KELUHAN, CAT_KHUSUS, TOTAL_SKOR, JAM_KEP, KD_PERAWAT, mdd )
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }


    function INSERT_EWS($params) {
        $sql = "INSERT INTO PKU.dbo.EWS(FS_KD_REG,TGL,JAM,NAFAS,S_NAFAS,O2,S_O2,AB,S_AB,S,S_S,J,S_J,TD,S_TD,SADAR,S_SADAR,MDB,MDD)
           VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
              return $this->db->query($sql, $params);
    }


    function INSERT_RP($params) {
        $sql = "INSERT INTO PKU.dbo.RENCANA_PULANG(FS_KD_REG,DIAGNOSA,TGL_MRS,JAM_MRS, ALASAN_MRS, TGL_RENCANA_PULANG, JAM_RENCANA_PULANG, ESTIMASI_TGL, PENGARUH_P, PENGARUH_K, PENGARUH_JOB, ANTI, BANTUAN, PEMBANTU, TINGGAL, ALAT_MEDIS, ALAT_BANTU, BANTU_KHUSUS, K_PRIBADI, NYERI, EDUKASI, KETR,  MDB,MDD)
           VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
              return $this->db->query($sql, $params);
    }


    
    function INSERT_AWAL_PERAWAT($params) { 
        $sql = "INSERT INTO PKU.dbo.IGD_AWAL_PERAWAT(FS_KD_REG,CARA_MASUK, ASAL_MASUK, KEL_UTAMA,KEL_SEKARANG,RIWAYAT_SAKIT,RIWAYAT_ALERGI_OBAT, RIWAYAT_ALERGI_MAKANAN, HAMIL,MENIKAH, JOB, SUKU, AGAMA, PSIKOLOGIS,MENTAL,KESADARAN,KEADAAN_UMUM,TD, N, S,R,TB,BB,LINGKAR_KEPALA,STATUS_GIZI, GCS, ALAT_BANTU, CACAT, ADL, RESIKO_JATUH,BATUK,POLA_NAFAS,SUARA_NAFAS,BANTU_NAFAS,NYERI_DADA,AKRAL,PERDARAHAN, CYANOSIS, CRT, TURGOR, REFLEK_CAHAYA, PUPIL, LUMPUH, PUSING, BAK, BAK_TEKAN, URINE, BAB, ABDOMEN, BAB_TEKAN, JEJAS_ABDOMEN, SENDI, DISLOK, FRAKTUR,LUKA, JATUH_3BULAN, BANTU_JALAN, SULIT_JALAN, KURSI_RODA, ALVI, RIWAYAT_DEKUBITUS, USIA65, ANAK_SESUAI_UMUR, PENERJEMAH, KRITERIA_DISCHARGE, HASIL, JAM_SELESAI, MDB, MDD)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function update_ases($params) {
        $sql = "UPDATE PKU.dbo.TAC_ASES_PER2 SET  
        FS_STATUS_PSIK=?,
        FS_HUB_KELUARGA=?,
        FS_PENGELIHATAN=?,
        FS_PENCIUMAN=?,
        FS_PENDENGARAN=?,
        PERNIKAHAN=?,
        SUKU=?,
        JOB=?,mdb=?,mdd=?
        WHERE FS_KD_REG =?";
        return $this->db->query($sql, $params);
    }
    


    function INSERT_AWAL_MEDIS($params) { 
        $sql = "INSERT INTO PKU.dbo.IGD_AWAL_MEDIS(FS_KD_REG,KENDARAAN,RUJUKAN, FS_ANAMNESA,RIW_PENYAKIT_DAHULU,RIW_PENYAKIT_NOW,RIW_PERAWATAN,RIW_TINDAKAN,
        FS_STATUS_PSIK,MENTAL,PEMERIKSAAN_FISIK,SKOR_NYERI,LINGKAR_KEPALA,STATUS_GIZI,ALAT_BANTU,CACAT,ADL,RESIKO_JATUH,KONJUNGTIVA,DEVIASI,SKELERA,JVP,BIBIR,MUKOSA,THORAX,JANTUNG,ABDOMEN,PINGGANG,EKS_ATAS,EKS_BAWAH,FILE_LOKASI,LAB,RAD,LAINYA,FS_DIAGNOSA,MASALAH_KES,FS_TERAPI,RENCANA,DIET,KONSUL,KD_DOKTER_KONSUL, EDUKASI,D_PLANNING,ALASAN_RUJUK,TRANSPORT_KELUAR,KONDISI_AKHIR,JAM_SELESAI,MDB,MDD)
          VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
               return $this->db->query($sql, $params);
    }

    function UPDATE_AWAL_PERAWAT($params) { 
        $sql = "UPDATE PKU.dbo.IGD_AWAL_PERAWAT SET FS_KD_REG=?,CARA_MASUK=?, ASAL_MASUK=?, KEL_UTAMA=?,
        KEL_SEKARANG=?,RIWAYAT_SAKIT=?,RIWAYAT_ALERGI_OBAT=?, RIWAYAT_ALERGI_MAKANAN=?, 
        HAMIL=?,MENIKAH=?, JOB=?, SUKU=?, AGAMA=?, PSIKOLOGIS=?,MENTAL=?,KESADARAN=?,KEADAAN_UMUM=?,
        TD=?, N=?, S=?,R=?,TB=?,BB=?,LINGKAR_KEPALA=?,STATUS_GIZI=?, GCS=?, ALAT_BANTU=?, CACAT=?, ADL=?,
         RESIKO_JATUH=?,BATUK=?,POLA_NAFAS=?,SUARA_NAFAS=?,BANTU_NAFAS=?,NYERI_DADA=?,
         AKRAL=?,PERDARAHAN=?, CYANOSIS=?, CRT=?, TURGOR=?, REFLEK_CAHAYA=?, PUPIL=?, LUMPUH=?,
          PUSING=?, BAK=?, BAK_TEKAN=?, URINE=?, BAB=?, ABDOMEN=?, BAB_TEKAN=?, JEJAS_ABDOMEN=?, SENDI=?,
           DISLOK=?, FRAKTUR=?,LUKA=?, JATUH_3BULAN=?, BANTU_JALAN=?, SULIT_JALAN=?, KURSI_RODA=?, ALVI=?,
            RIWAYAT_DEKUBITUS=?, USIA65=?, ANAK_SESUAI_UMUR=?, PENERJEMAH=?, KRITERIA_DISCHARGE=?, HASIL=?, 
            JAM_SELESAI=?, MDB=?, MDD=? where id=? ";
        return $this->db->query($sql, $params);
    }

    function INSERT_AWAL_BIDAN($params) { 
        $sql = "INSERT INTO PKU.dbo.IGD_AWAL_BIDAN(FS_KD_REG,CARA_MASUK,RUJUKAN,BAWA_OBAT,FS_STATUS_PSIK,FS_STATUS_EMOSI,FS_HUB_KELUARGA,FS_USIA_KEHAMILAN,    FS_ANAMNESA, FS_HAID_MEN, FS_HAID_SIKLUS, FS_HAID_LAMA, FS_HAID_HPHT, FS_HAID_HPL, FS_HAID_KELUHAN, FS_STATUS_PERKAWINAN, FS_LAMA_MENIKAH,  FS_ASMA_MULAI, FS_ASMA_TERAPI, FS_JANTUNG_MULAI, FS_JANTUNG_TERAPI, FS_DIABETES_MULAI, FS_DIABETES_TERAPI, FS_HIPERTENSI_MULAI, FS_HIPERTENSI_TERAPI, FS_SAKIT_LAIN, FS_RIWAYAT_GYNEKOLOGI, FS_RIWAYAT_KB, FS_RIWAYAT_KOMPLIKASI_KB, POLA_MAKAN, POLA_MINUM, POLA_BAK, POLA_BAB, POLA_TIDUR, JAM_TERAKHIR_MAKAN, JAM_TERAKHIR_MINUM, JAM_TERAKHIR_BAK, JAM_TERAKHIR_BAB, JAM_TERAKHIR_TIDUR, WARNA_BAK, KARAKTER_BAB, RUMAH_MILIK, TINGGAL_BERSAMA, PJ_DARURAT,HUBUNGAN_PJ,AKTIFITAS,SOSIAL_SUPPORT,PERSALINAN,KEADAAN_UMUM,SADAR,ALAT_BANTU,TD,N,S,R,TB,BB,BBO,MATA,KEPALA,TELINGA,HIDUNG,TENGGOROKAN,LEHER,DADA,JANTUNG,PARU_PARU,ABDOMEN,BADAN_GERAK_ATAS,BADAN_GERAK_BAWAH,SCLERA,KONJUNGTIVA,CEK_DADA,INSPEKSI_ABDOMEN,LEOPOD_1,LEOPOD_2,LEOPOD_3,LEOPOD_4,AUSKULTASI,DURASI_AUSKULTASI,KONTRAKSI,DURASI_KONTRAKSI,INSPEKSI_ANO_GENITAS,VAGINA_TOUCHER,LAB, RAD,MASALAH_KEBIDANAN,DIAGNOSA, RENCANA_TINDAKAN,PENERJEMAH,KRITERIA_DISCHARGE,HASIL,SELESAI, MDB, MDD)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
         return $this->db->query($sql, $params);
    }


    function INSERT_TF_PERAWAT($params) { 
        $sql = "INSERT INTO PKU.dbo.TRANSFER_PASIEN (FS_KD_REG, 
        KD_DOKTER_DPJP, 
        KD_KONSUL_1,
        KD_KONSUL_2, 
        TGL_PINDAH, 
        JAM_PINDAH, 
        RUANG1, 
        RUANG2, 
                    DIAGNOSA1, 
                    DIAGNOSA2, 
                    ANAMNESA,
                    RIWAYAT_SAKIT,
                    PEMERIKSAAN_FISIK1, 
                    PEMERIKSAAN_FISIK2, 
                    PENUNJANG, TINDAKAN, TERAPI, PENGIRIM, PENERIMA, STATUS_TF, DERAJAT, CAT1, MDD1, MDD2) values( ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            return $this->db->query($sql, $params);
    }

    
    function UPDATE_TF_PERAWAT($params) { 
        $sql = "UPDATE  PKU.dbo.TRANSFER_PASIEN set FS_KD_REG=?, 
        KD_DOKTER_DPJP=?, 
        KD_KONSUL_1=?,
        KD_KONSUL_2=?, 
        TGL_PINDAH=?, 
        JAM_PINDAH=?, 
        RUANG1=?, 
        RUANG2=?, 
                    DIAGNOSA1=?, 
                    DIAGNOSA2=?, 
                    ANAMNESA=?,
                    RIWAYAT_SAKIT=?,
                    PEMERIKSAAN_FISIK1=?, 
                    PEMERIKSAAN_FISIK2=?, 
                    PENUNJANG=?, TINDAKAN=?, TERAPI=?, PENGIRIM=?, PENERIMA=?, STATUS_TF=?, DERAJAT=?, CAT1=?, MDD1=?, MDD2=?
                    where id=?";
            return $this->db->query($sql, $params);
    }


    function INSERT_SUAMI($params) { 
        $sql = "INSERT INTO PKU.dbo.SUAMI_PASIEN(FS_KD_REG, NAMA_SUAMI,TGL_LAHIR_SUAMI, AGAMA_SUAMI, PENDIDIKAN_SUAMI, PEKERJAAN_SUAMI, MDB, MDD)
               VALUES (?,?,?,?,?,?,?,?)";
            return $this->db->query($sql, $params);
    }


    function get_data_jatuh_by_rg($params) {
        $sql = "SELECT A.*, B.*
        FROM PKU.dbo.TAC_RI_JATUH2 A
        left join   PKU.dbo.TAC_RI_JATUH3 B ON A.FS_KD_TRS=B.FS_KD_JATUH2
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


    




    function INSERT_DAFTAR($params) {
        $sql = "INSERT INTO PKU.dbo.DAFTAR_IGD(FS_KD_REG, Nama, alamat,umur,JENIS_RAWAT,REKANAN,
         UNIT1, RUANG1, KD_DOKTER1,  UNIT2, RUANG2, KD_DOKTER2, KD_ADMISI, KD_DOKTER_UMUM, mdd )
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }


    function UPDATE_DAFTAR($params) {
        $sql = "  UPDATE PKU.dbo.DAFTAR_IGD SET
        FS_KD_REG=?, Nama=?, alamat=?,umur=?,JENIS_RAWAT=?,REKANAN=?, UNIT1=?, RUANG1=?,
         KD_DOKTER1=?,  UNIT2=?, RUANG2=?,
         KD_DOKTER2=?, KD_ADMISI=?, KD_DOKTER_UMUM=?, mdd=?
         WHERE id=?";
        return $this->db->query($sql, $params);
    }


    function UPDATE($params) {
        $sql = "UPDATE PKU.dbo.TRIASE SET FS_KD_REG=?, Nama_Pasien=?, Alamat=?, TGL_DATANG=?, JAM_DATANG=?, CARA_MASUK=?,
         SUDAH_TERPASANG=?, ALASAN_DATANG=?, KENDARAAN=?, NAMA_PENGANTAR=?, TELP_PENGANTAR=?, JENIS_KASUS=?, JENIS_TRAUMA=?,
          URAIAN_TRAUMA=?, TGL_KEJADIAN=?, TEMPAT_KEJADIAN=?, PACS=?, KESADARAN=?, SKOR_KESADARAN=?, TD=?, SKOR_TD=?, R=?,
           SKOR_R=?, O2=?, SKOR_O2=?, N=?, N_SKOR=?, SUHU=?, SKOR_SUHU=?, NYERI=?, BB=?, TB=?, KEPUTUSAN=?, rujukan_dari=?, dijemput=?, 
           KELUHAN=?, CAT_KHUSUS=?, TOTAL_SKOR=?, JAM_KEP=?, KD_PERAWAT=?, mdd=? where id=? ";
                   return $this->db->query($sql, $params);
    }


    function UPDATE_JATUH($params) {
        $sql = "UPDATE PKU.dbo.TAC_RI_JATUH3 SET FS_PARAM_1=?,FS_PARAM_2=?,FS_PARAM_3=?,FS_PARAM_4=?,FS_PARAM_5=?,FS_PARAM_6=?,FS_PARAM_7=?,FS_PARAM_8=?,FS_PARAM_9=?,FS_PARAM_10=?,FS_PARAM_11=?,FS_PARAM_12=?,FS_PARAM_13=?,FS_PARAM_14=?,FS_PARAM_15=?,FS_PARAM_16=?,FS_PARAM_17=?, MDB=?, MDD=?
         where FS_KD_JATUH2=? ";
                   return $this->db->query($sql, $params);
    }

    

    function DELETE_AWAL_BIDAN($params) {
        $sql = "DELETE from PKU.dbo.IGD_AWAL_BIDAN 
        WHERE id = ?";
        return $this->db->query($sql, $params);
    }



    function DELETE_RP($params) {
        $sql = "DELETE from PKU.dbo.RENCANA_PULANG 
        WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }


    function DELETE_AWAL_MEDIS($params) {
        $sql = "DELETE from PKU.dbo.IGD_AWAL_MEDIS 
        WHERE id = ?";
        return $this->db->query($sql, $params);
    }



    function UPDATE_SUAMI($params) {
        $sql = "UPDATE PKU.dbo.SUAMI_PASIEN
         SET NAMA_SUAMI=?,TGL_LAHIR_SUAMI=?,AGAMA_SUAMI=?,PENDIDIKAN_SUAMI=?,PEKERJAAN_SUAMI=?,MDB=?, MDD=? 
          where FS_KD_REG=? ";
                   return $this->db->query($sql, $params);
    }

    function get_nama($params) {

        $sql = "select B.Nama_Pasien, B.Alamat from PENDAFTARAN A, REGISTER_PASIEN B where A.No_Reg=? and A.No_MR=B.No_MR";
         $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


    function get_suami($params) {

        $sql = "select * from PKU.dbo.SUAMI_PASIEN WHERE FS_KD_REG=?";
         $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }



    function tf_mina($params) {

        $sql = "select * from PKU.dbo.TRANSFER_PASIEN WHERE RUANG1 like '%MNA%'  or RUANG2 like '%MNA%' or 
        RUANG1 like '0001'  or RUANG2 like '0001' ";
         $query = $this->db->query($sql, $params);
         if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function tf_bangsal($params) {

        $sql = "select * from PKU.dbo.TRANSFER_PASIEN WHERE RUANG1 like '%?%'  or RUANG2 like '%?%' ";
         $query = $this->db->query($sql, $params);
         if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    


    function get_data_triase_by_id($params) {

        $sql = "select A.*, B.Kode_Dokter, B.No_Reg, B.Kode_Ruang, B.Kode_Masuk,  C.Tgl_lahir, C.No_MR
        from  PKU.dbo.TRIASE A
        left join PENDAFTARAN B on B.No_Reg=A.FS_KD_REG
        left join REGISTER_PASIEN C on B.No_MR=C.No_MR
        where A.id=?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


    function get_data_triase_by_noreg($params) {

        $sql = "select A.*, B.Kode_Dokter, B.No_Reg, B.Kode_Ruang, B.Kode_Masuk,   C.Tgl_lahir, C.No_MR
        from  PKU.dbo.TRIASE A
        left join PENDAFTARAN B on B.No_Reg=A.FS_KD_REG
        left join REGISTER_PASIEN C on B.No_MR=C.No_MR
        where A.FS_KD_REG=?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_data_perawat_by_noreg($params) {

        $sql = "select top 1  A.*, B.*, C.Tgl_lahir, C.No_MR
        from  PKU.dbo.IGD_AWAL_PERAWAT A
        left join PENDAFTARAN B on B.No_Reg=A.FS_KD_REG
        left join REGISTER_PASIEN C on B.No_MR=C.No_MR
        where A.FS_KD_REG=?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }



    function get_data_medis_by_noreg($params) {

        $sql = "select top 1 A.*, B.*, C.Tgl_lahir, C.No_MR
        from  PKU.dbo.IGD_AWAL_MEDIS A
        left join PENDAFTARAN B on B.No_Reg=A.FS_KD_REG
        left join REGISTER_PASIEN C on B.No_MR=C.No_MR
        where A.FS_KD_REG=?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

  

    function get_data_bidan_by_noreg($params) {

        $sql = "select top 1 A.*, B.*, C.Tgl_lahir, C.No_MR
        from  PKU.dbo.IGD_AWAL_BIDAN A
        left join PENDAFTARAN B on B.No_Reg=A.FS_KD_REG
        left join REGISTER_PASIEN C on B.No_MR=C.No_MR
        where A.FS_KD_REG=?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }




    function get_data_triase($params) {
        $n=date('Y-m-d');

        $sql = "select A.*, B.Kode_Dokter, B.No_Reg, C.Tgl_lahir, C.No_MR
        from  PKU.dbo.TRIASE A
        left join PENDAFTARAN B on B.No_Reg=A.FS_KD_REG
        left join REGISTER_PASIEN C on B.No_MR=C.No_MR
        where (B.Tanggal=? or B.Tanggal=?) or (cast(A.mdd as date)=?)";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
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

    function get_icd($params) {
        $sql = "  SELECT * FROM ICD10 where KET like '%TUBERCULOSIS%'";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }


  function insert_tb($params) {
        $sql = "INSERT INTO PKU.dbo.PASIEN_TB( id_tb_03,kd_pasien,nik,jenis_kelamin,alamat_lengkap,id_propinsi_faskes,
        kd_kabupaten_faskes,id_propinsi_pasien,kd_kabupaten_pasien,kd_fasyankes,kode_icd_x,tipe_diagnosis,
        klasifikasi_lokasi_anatomi,klasifikasi_riwayat_pengobatan,tanggal_mulai_pengobatan,paduan_oat,
        sebelum_pengobatan_hasil_mikroskopis,sebelum_pengobatan_hasil_tes_cepat,sebelum_pengobatan_hasil_biakan,
        hasil_mikroskopis_bulan_2,hasil_mikroskopis_bulan_3,hasil_mikroskopis_bulan_5,akhir_pengobatan_hasil_mikroskopis,
        tanggal_hasil_akhir_pengobatan,hasil_akhir_pengobatan,tgl_lahir,foto_toraks,FS_KD_REG,NO_MR, MDB,MDD)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }


    function update_tb($params) {
        $sql = "  UPDATE PKU.dbo.PASIEN_TB SET id_tb_03=?,kd_pasien=?,nik=?,jenis_kelamin=?,alamat_lengkap=?,id_propinsi_faskes=?,
        kd_kabupaten_faskes=?,id_propinsi_pasien=?,kd_kabupaten_pasien=?,kd_fasyankes=?,kode_icd_x=?,tipe_diagnosis=?,
        klasifikasi_lokasi_anatomi=?,klasifikasi_riwayat_pengobatan=?,tanggal_mulai_pengobatan=?,paduan_oat=?,
        sebelum_pengobatan_hasil_mikroskopis=?,sebelum_pengobatan_hasil_tes_cepat=?,sebelum_pengobatan_hasil_biakan=?,
        hasil_mikroskopis_bulan_2=?,hasil_mikroskopis_bulan_3=?,hasil_mikroskopis_bulan_5=?,akhir_pengobatan_hasil_mikroskopis=?,
        tanggal_hasil_akhir_pengobatan=?,hasil_akhir_pengobatan=?,tgl_lahir=?,foto_toraks=?,FS_KD_REG=?,NO_MR=?, MDB=?,MDD=? where FS_KD_REG=? ";
        return $this->db->query($sql, $params);
    }
    

    function get_hasil_rad($params) {
        $sql = "SELECT   B.Ket,c.KET_TINDAKAN 
        FROM TR_BIAYARINCI a
        LEFT JOIN TR_DETAIL_CATATANDOKTER b ON a.ID_BIAYA=b.ID_BIAYA
        left join M_RINCI_HEADER c ON a.No_Rinci=c.NO_RINCI
        WHERE NO_REG = ? AND a.NO_RINCI in ('B036')";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return array();
        }
    }


    function get_hasil_mikro1($params) {
        $sql = "  SELECT top 1 B.Hasil from TR_MASTER_LAB A, TR_DETAIL_LAB B 
        where A.Id_Lab=B.Id_Lab and A.No_Reg=? and A.No_Jenis='1113'
        and B.Kode_Hasil='1702' order by A.Id_Lab desc
        ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    
    function get_hasil_mikro2($params) {
        $sql = "  SELECT top 1 B.Hasil from TR_MASTER_LAB A, TR_DETAIL_LAB B 
        where A.Id_Lab=B.Id_Lab and A.No_Reg=? and A.No_Jenis='1113'
        and B.Kode_Hasil='1706' order by A.Id_Lab desc
        ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function update_hasil_lab($params) {
        $sql = "  UPDATE PKU.dbo.PASIEN_TB SET 
        id_tb_03=?,
         FS_KD_REG=?,
        sebelum_pengobatan_hasil_mikroskopis=?,
        sebelum_pengobatan_hasil_tes_cepat=?,
        sebelum_pengobatan_hasil_biakan=?,
        hasil_mikroskopis_bulan_2=?,
        hasil_mikroskopis_bulan_3=?,
        hasil_mikroskopis_bulan_5=?,
        akhir_pengobatan_hasil_mikroskopis=?,
         MDB=?,MDD=? where id=? ";
        return $this->db->query($sql, $params);
    }

    function cek_perawat($params) {
        $sql = "SELECT FS_KD_REG FROM PKU.dbo.IGD_AWAL_PERAWAT WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            return $result;
        } else {
            return 0;
        }
    }


    function cek_tb($params) {
        $sql = "SELECT FS_KD_REG FROM PKU.dbo.PASIEN_TB WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            return $result;
        } else {
            return 0;
        }
    }


    function cek_id_tb($params) {
        $sql = "SELECT * FROM PKU.dbo.PASIEN_TB WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


    function cek_tf_dari_igd($params) {
        $sql = "SELECT FS_KD_REG FROM PKU.dbo.TRANSFER_PASIEN WHERE FS_KD_REG = ? and RUANG1='IGD' ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            return $result;
        } else {
            return 0;
        }
    }

    function cek_tf_dari_igd2($params) {
        $sql = "SELECT FS_KD_REG FROM PKU.dbo.TRANSFER_PASIEN WHERE FS_KD_REG = ? and RUANG1='IGD' and PENERIMA=''";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            return $result;
        } else {
            return 0;
        }
    }


    function get_data_tf_by_noreg($params) {
        $sql = "SELECT A.*
        FROM PKU.dbo.TRANSFER_PASIEN A
         WHERE FS_KD_REG = ? and RUANG1='IGD'";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


    function get_data_tf_by_noreg2($params) {
        $sql = "SELECT A.*, C.NO_REG, C.NO_MR, D.NAMA_PASIEN, D.ALAMAT, D.TGL_LAHIR
        from PKU.dbo.TRANSFER_PASIEN A, PENDAFTARAN C, REGISTER_PASIEN D 
        where   C.No_Reg=A.FS_KD_REG and D.No_MR=C.No_MR 
          and FS_KD_REG = ? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


    function get_pasien($params) {
        $sql = "SELECT   C.NO_REG, C.NO_MR, D.NAMA_PASIEN, D.ALAMAT, D.TGL_LAHIR, 
        datediff(yy,D.TGL_LAHIR,getdate()) as UMUR, D.JENIS_KELAMIN
        from   PENDAFTARAN C, REGISTER_PASIEN D 
        where    D.No_MR=C.No_MR 
          and NO_REG = ? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


    function get_pasien2($params) {
        $sql = "SELECT   C.NO_REG, C.NO_MR, D.NAMA_PASIEN, D.ALAMAT, D.TGL_LAHIR, 
        datediff(yy,D.TGL_LAHIR,getdate()) as UMUR, D.JENIS_KELAMIN
        from   PENDAFTARAN C, REGISTER_PASIEN D 
        where    D.No_MR=C.No_MR 
          and NO_REG = ? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


    function cek_ews_awal($params) {
        $sql = "SELECT FS_KD_REG FROM PKU.dbo.EWS WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            return $result;
        } else {
            return 0;
        }
    }

    function cek_medis($params) {
        $sql = "SELECT FS_KD_REG FROM PKU.dbo.IGD_AWAL_MEDIS WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            return $result;
        } else {
            return 0;
        }
    }


    function cek_bidan($params) {
        $sql = "SELECT FS_KD_REG FROM PKU.dbo.IGD_AWAL_BIDAN WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            return $result;
        } else {
            return 0;
        }
    }



    function cek_rencana_pulang($params) {
        $sql = "SELECT FS_KD_REG FROM PKU.dbo.RENCANA_PULANG WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            return $result;
        } else {
            return 0;
        }
    }

    function get_pasien_by_rg_ugd($params) {
        $date = date('Y-m-d');

        $sql = "SELECT E.NO_REG, B.NO_MR, B.NAMA_PASIEN, B.TGL_LAHIR, E.KODE_DOKTER, B.JENIS_KELAMIN, B.ALAMAT,  datediff(year,B.TGL_LAHIR,GETDATE()) 'fn_umur'
        FROM REGISTER_PASIEN B,  PENDAFTARAN E 
        WHERE E.NO_REG=? AND B.NO_MR=E.NO_MR";
          $query = $this->db->query($sql, $params);
          if ($query->num_rows() > 0) {
              $result = $query->row_array();
              $query->free_result();
              return $result;
          } else {
              return 0;
          }
      }



      function get_vs_inap($params) {
        $date = date('Y-m-d');

        $sql = "SELECT E.NO_REG, B.NO_MR, B.NAMA_PASIEN, B.TGL_LAHIR, B.JENIS_KELAMIN, B.ALAMAT,  datediff(year,B.TGL_LAHIR,GETDATE()) 'fn_umur'
        FROM REGISTER_PASIEN B,  PENDAFTARAN E 
        WHERE E.NO_REG=? AND B.NO_MR=E.NO_MR";
          $query = $this->db->query($sql, $params);
          if ($query->num_rows() > 0) {
              $result = $query->row_array();
              $query->free_result();
              return $result;
          } else {
              return 0;
          }
      }
  

      function get_alergi($params) {
        $date = date('Y-m-d');

        $sql = "select top 1 * from PKU.dbo.TAC_RJ_ALERGI where FS_KD_REG=? order by FS_KD_TRS DESC";
          $query = $this->db->query($sql, $params);
          if ($query->num_rows() > 0) {
              $result = $query->row_array();
              $query->free_result();
              return $result;
          } else {
              return 0;
          }
      }
  
  
  

    function get_pasien_ugd() {
        $now = date('Y-m-d'); 

        $date = new DateTime();
        $date_plus = $date->modify("-1 days");
        $akhirnya= $date_plus->format("Y-m-d");

        $sql = "SELECT E.NO_REG, B.NO_MR, B.NAMA_PASIEN, B.TGL_LAHIR, B.JENIS_KELAMIN, B.ALAMAT
       FROM REGISTER_PASIEN B,  PENDAFTARAN E 
       WHERE B.NO_MR=E.NO_MR AND E.STATUS='1' and E.KODE_MASUK='1' and (E.TANGGAL= '$now' or E.TANGGAL='$akhirnya')";
       $query = $this->db->query($sql);
       if ($query->num_rows() > 0) {
           $result = $query->result_array();
           $query->free_result();
           return $result;
       } else {
           return array();
       }
   }


    function get_data_vs_by_rg($params) {
        $sql = "SELECT top 1 a.*,c.NAMALENGKAP,b.user_name
        FROM PKU.dbo.TAC_RJ_VITAL_SIGN a
        LEFT JOIN PKU.dbo.TAC_COM_USER b ON a.mdb=b.user_id
        LEFT JOIN DB_RSMM.dbo.TUSER c ON b.user_name=c.NAMAUSER
        WHERE FS_KD_REG = ? order by A.FS_KD_TRS desc";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    


    function get_medis_inap($params) {
        $sql = "SELECT top 1 * from PKU.dbo.TAC_RI_MEDIS WHERE FS_KD_REG=? ORDER BY FS_KD_TRS DESC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


    function get_cat_obat($params) {
        $sql = "select A.*, B.*, B.mdd as wkt from  PKU.dbo.TAB_RM_17 A,  PKU.dbo.TAB_RM_17_1 B
        WHERE A.FS_KD_RM17=B.FS_KD_RM17 and A.FS_KD_REG=? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function get_terapi_tf($params) {
        $sql = " select A.* from PKU.dbo.TAB_RM_17 A, PKU.dbo.TAC_COM_USER B 
        WHERE  A.MDB = B.user_id    and B.fs_kd_layanan=? and A.FS_KD_REG=?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function ruang_now($params) {
        $sql = "select top 1 A.Kode_Ruang from TR_KAMAR A where No_Reg=?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


    
   
 
    function get_daftar_igd($params) {

        $sql = "select A.*, A.FS_KD_REG as rg,  B.*, C.Tgl_lahir, C.No_MR, C.Nama_Pasien as NM, D.Nama_Dokter, E.STATUS_TF,E.PENERIMA, E.RUANG2 as TUJUAN, F.Nama_Bangsal, G.Nama_Ruang
        from  PKU.dbo.DAFTAR_IGD A
        left join PENDAFTARAN B on B.No_Reg=A.FS_KD_REG
        left join REGISTER_PASIEN C on B.No_MR=C.No_MR
        left join DOKTER D on D.Kode_Dokter=A.KD_DOKTER_UMUM
        left join PKU.dbo.TRANSFER_PASIEN E ON A.FS_KD_REG=E.FS_KD_REG 
        left join M_RUANG G on G.Kode_Ruang=A.RUANG1
        left join M_BANGSAL F on G.Kode_Bangsal=F.Kode_Bangsal
        WHERE (B.Tanggal=? or B.Tanggal=?) or ((cast(A.MDD as date)=?) or (cast(A.MDD as date)=?))
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

    function get_cek_lab_cppt($params) {

        $sql = "   Select FS_LAB,FS_RAD FROM PKU.dbo.TAC_RI_CPPT WHERE FS_KD_REG=? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_pasien_masuk_tf($params) {

        $now = date('Y-m-d'); 

        $date = new DateTime();
        $date_plus = $date->modify("-1 days");
        $akhirnya= $date_plus->format("Y-m-d");
        
        $sql = "select A.*, B.Nama_Ruang, C.No_Reg, C.No_MR, D.Nama_Pasien, D.Alamat, C.MEDIS, F.Nama_Ruang
         from PKU.dbo.TRANSFER_PASIEN A, M_RUANG B, PENDAFTARAN C, REGISTER_PASIEN D, M_RUANG F
         where  A.RUANG2=B.Kode_Ruang and  B.Kode_Bangsal=? and C.No_Reg=A.FS_KD_REG and D.No_MR=C.No_MR  and F.Kode_Ruang=A.RUANG2 
         and (A.TGL_PINDAH>='$akhirnya') 
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




    function get_pasien_masuk_tf2($params) {

        $now = date('Y-m-d'); 

        $date = new DateTime();
        $date_plus = $date->modify("-1 days");
        $akhirnya= $date_plus->format("Y-m-d");
        
        $sql = "select A.*, B.Nama_Ruang, C.No_Reg, C.No_MR, D.Nama_Pasien, D.Alamat, C.MEDIS, F.Nama_Ruang
         from PKU.dbo.TRANSFER_PASIEN A, M_RUANG B, PENDAFTARAN C, REGISTER_PASIEN D, M_RUANG F
         where  A.RUANG2=B.Kode_Ruang and  (B.Kode_Bangsal='MNA' or B.Kode_Bangsal ='0001')
          and C.No_Reg=A.FS_KD_REG and D.No_MR=C.No_MR  and F.Kode_Ruang=A.RUANG2 
         and (A.TGL_PINDAH>='$akhirnya') 
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


    function get_rajal_pasien($params) {

        $now = date('Y-m-d'); 

        $date = new DateTime();
        $date_plus = $date->modify("-1 days");
        $akhirnya= $date_plus->format("Y-m-d");
        
        $sql = " SELECT B.NAMA_PASIEN, B.NO_MR, A.NO_REG, A.KODE_DOKTER
         FROM PENDAFTARAN A, REGISTER_PASIEN B, PKU.dbo.TAC_RJ_MEDIS C
         WHERE  A.NO_MR=B.NO_MR AND C.FS_KD_REG=A.NO_REG
         AND A.TANGGAL='$now'  ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }



    function get_pasien_keluar_tf($params) {

        $now = date('Y-m-d'); 

        $date = new DateTime();
        $date_plus = $date->modify("-1 days");
        $akhirnya= $date_plus->format("Y-m-d");
        
        $sql = "select A.*, B.Nama_Ruang, C.No_Reg, C.No_MR, D.Nama_Pasien, D.Alamat, C.MEDIS, F.Nama_Ruang
         from PKU.dbo.TRANSFER_PASIEN A,M_RUANG B, PENDAFTARAN C, REGISTER_PASIEN D, M_RUANG F
         where  A.RUANG1=B.Kode_Ruang and  B.Kode_Bangsal=? and C.No_Reg=A.FS_KD_REG and D.No_MR=C.No_MR  and F.Kode_Ruang=A.RUANG2 
         and (A.TGL_PINDAH>='$akhirnya') 
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


    function get_pasien_keluar_tf4($params) {

        $now = date('Y-m-d'); 

        $date = new DateTime();
        $date_plus = $date->modify("-1 days");
        $akhirnya= $date_plus->format("Y-m-d");
        
        $sql = "select A.*, B.Nama_Ruang, C.No_Reg, C.No_MR, D.Nama_Pasien, D.Alamat, C.MEDIS
        from PKU.dbo.TRANSFER_PASIEN A,M_RUANG B, PENDAFTARAN C, REGISTER_PASIEN D
        where  A.RUANG2=B.Kode_Ruang  and C.No_Reg=A.FS_KD_REG and D.No_MR=C.No_MR  and A.RUANG1='POLI'
         and (A.TGL_PINDAH>='$akhirnya') 
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



    function get_pasien_keluar_tf3($params) {

        $now = date('Y-m-d'); 

        $date = new DateTime();
        $date_plus = $date->modify("-1 days");
        $date_plus2 = $date->modify("+1 days");
        $akhirnya= $date_plus->format("Y-m-d");
        $akhirnya2= $date_plus2->format("Y-m-d");
        
        $sql = "select A.*, B.Nama_Ruang, C.No_Reg, C.No_MR, D.Nama_Pasien, D.Alamat, C.MEDIS, F.Nama_Ruang
         from PKU.dbo.TRANSFER_PASIEN A,M_RUANG B, PENDAFTARAN C, REGISTER_PASIEN D, M_RUANG F
         where  A.RUANG1=B.Kode_Ruang and  B.Kode_Bangsal='OK' and C.No_Reg=A.FS_KD_REG and D.No_MR=C.No_MR  and F.Kode_Ruang=A.RUANG2 
         and (A.TGL_PINDAH>='$akhirnya') 
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


    
    function get_pasien_keluar_tf2($params) {

        $now = date('Y-m-d'); 

        $date = new DateTime();
        $date_plus = $date->modify("-1 days");
        $akhirnya= $date_plus->format("Y-m-d");
        
        $sql = "select A.*, B.Nama_Ruang, C.No_Reg, C.No_MR, D.Nama_Pasien, D.Alamat, C.MEDIS, F.Nama_Ruang
         from PKU.dbo.TRANSFER_PASIEN A,M_RUANG B, PENDAFTARAN C, REGISTER_PASIEN D, M_RUANG F
         where  A.RUANG1=B.Kode_Ruang and  (B.Kode_Bangsal='MNA' or B.Kode_Bangsal ='0001') and C.No_Reg=A.FS_KD_REG and D.No_MR=C.No_MR  and F.Kode_Ruang=A.RUANG2 
         and (A.TGL_PINDAH>='$akhirnya') 
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


    function get_px_op($params) {
        $now = date('Y-m-d'); 

        $date = new DateTime();
        $date_plus = $date->modify("-1 days");
        $akhirnya= $date_plus->format("Y-m-d");

        $sql = "select A.*, B.NO_MR, B.NO_REG, C.NAMA_PASIEN , C.Alamat, F.Nama_Dokter
		from JADWAL_OP as A, PENDAFTARAN B, REGISTER_PASIEN C, DOKTER F
		where A.FS_KD_REG=B.No_Reg and C.No_MR=B.No_MR and F.Kode_Dokter=A.Kode_Dokter and 
        (A.tanggalop='$now' or A.tanggalop='$akhirnya')
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




    function get_bangsal($params) {

        $sql = " select * from M_BANGSAL ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_ruang($params) {

        $sql = " select * from M_RUANG ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_ews($params) {

        $sql = "select  * from  PKU.dbo.EWS  where FS_KD_REG=?  ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function get_rp($params) {

        $sql = "select  * from  PKU.dbo.RENCANA_PULANG  where FS_KD_REG=?  ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


    function ttd($params) {
        $sql = "SELECT a.*,c.NAMALENGKAP,b.user_name
        FROM PKU.dbo.RENCANA_PULANG a
        LEFT JOIN PKU.dbo.TAC_COM_USER b ON a.mdb=b.user_name
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


    function get_daftar_igd_by_noreg($params) {

        $sql = "select A.* 
        from  PKU.dbo.DAFTAR_IGD A
        where A.FS_KD_REG=? ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

      function get_daftar_igd_by_id($params) {

        $sql = "select A.* 
        from  PKU.dbo.DAFTAR_IGD A
        where A.id=? ";
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