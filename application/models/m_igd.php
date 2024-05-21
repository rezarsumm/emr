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

    function get_px_transfer_igd($params) {

              $now = date('Y-m-d'); 

              $date = new DateTime();
              $date_plus = $date->modify("-1 days");
              $akhirnya= $date_plus->format("Y-m-d");
      
              $sql = "SELECT E.NO_REG, B.NO_MR, B.NAMA_PASIEN, B.TGL_LAHIR, B.JENIS_KELAMIN, B.ALAMAT
             FROM REGISTER_PASIEN B,  PENDAFTARAN E 
             WHERE B.NO_MR=E.NO_MR AND E.STATUS='1' and E.Kode_ruang='' and E.KODE_MASUK='1' and (E.TANGGAL= '$now' or E.TANGGAL='$akhirnya')";
       $query = $this->db->query($sql,$params);
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
        FROM DB_RSMM.dbo.LAB_JENISPERIKSA  
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
    function list_pemeriksaan_rad_igd($params) {
        $sql =  "SELECT NO_RINCI,KET_TINDAKAN 
        FROM M_RINCI_HEADER 
        WHERE KODE_TINDAKAN = 'RADIOLOGI' and NO_RINCI LIKE 'B%'";
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

    function get_skrining_tb($params) {

        $sql = " SELECT A.*,B.*,C.*
        FROM PKU.dbo.SKRINING_TB A
        LEFT JOIN PENDAFTARAN B ON B.No_Reg=A.FS_KD_REG
        LEFT JOIN REGISTER_PASIEN C ON C.No_MR=B.No_MR";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function cetak_tb($params) {

        $sql = " SELECT A.*,B.*,C.Nama_Pasien, C.No_MR, C.Tgl_Lahir, D.Kode_Dokter, D.Nama_Dokter
        FROM PKU.dbo.SKRINING_TB A 
        LEFT JOIN PENDAFTARAN B ON B.No_Reg=A.FS_KD_REG
        LEFT JOIN DOKTER D ON D.kode_Dokter=A.MDB
        LEFT JOIN REGISTER_PASIEN C ON C.No_MR=B.No_MR WHERE A.FS_KD_REG=?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function cetak_tf_pasien($params) {

        $sql = " SELECT A.*,B.*,C.Nama_Pasien,C.FS_ALERGI, C.No_MR, C.Tgl_Lahir, D.Nama_Ruang
        FROM PKU.dbo.TRANSFER_PASIEN A 
        LEFT JOIN PENDAFTARAN B ON B.No_Reg=A.FS_KD_REG
        LEFT JOIN M_RUANG D ON D.Kode_Ruang=A.RUANG2
        LEFT JOIN REGISTER_PASIEN C ON C.No_MR=B.No_MR WHERE A.id=?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_data_ases_perawat_igd($params) {
        $n=date('Y-m-d');

        $sql = "select A.*, B.Kode_Dokter, B.No_Reg, C.Tgl_lahir, C.No_MR
        from  PKU.dbo.IGD_AWAL_PERAWAT A
        left join DB_RSMM.dbo.PENDAFTARAN B on B.No_Reg=A.FS_KD_REG
        left join DB_RSMM.dbo.REGISTER_PASIEN C on B.No_MR=C.No_MR
        where (B.Tanggal=? or B.Tanggal=?) or (cast(A.MDD as date)=?)";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_data_ases_neonatus($params) {
        $n=date('Y-m-d');

        $sql = "select A.*, B.Kode_Dokter, B.No_Reg, C.Tgl_lahir, C.No_MR, C.Nama_Pasien, C.Alamat
        from  PKU.dbo.IGD_AWAL_NEONATUS A
        left join DB_RSMM.dbo.PENDAFTARAN B on B.No_Reg=A.FS_KD_REG
        left join DB_RSMM.dbo.REGISTER_PASIEN C on B.No_MR=C.No_MR
        where (B.Tanggal=? or B.Tanggal=?) or (cast(A.MDD as date)=?)";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function INSERT_TRIASE($params) {
        $sql = "INSERT INTO PKU.dbo.TRIASE(FS_KD_REG, Nama_Pasien, Alamat, TGL_DATANG, JAM_DATANG, CARA_MASUK, SUDAH_TERPASANG, ALASAN_DATANG, KENDARAAN, NAMA_PENGANTAR, TELP_PENGANTAR, JENIS_KASUS, JENIS_TRAUMA, URAIAN_TRAUMA, TGL_KEJADIAN, TEMPAT_KEJADIAN, PACS, KESADARAN, SKOR_KESADARAN, TD, SKOR_TD, R, SKOR_R, O2, SKOR_O2, N, N_SKOR, SUHU, SKOR_SUHU, NYERI, BB, TB, KEPUTUSAN, rujukan_dari, dijemput, KELUHAN, CAT_KHUSUS, TOTAL_SKOR, JAM_KEP, KD_PERAWAT, mdd, LEVEL_TRIASE )
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }


    function INSERT_EWS($params) {
        $sql = "INSERT INTO PKU.dbo.EWS(FS_KD_REG,TGL,JAM,NAFAS,S_NAFAS,O2,S_O2,AB,S_AB,S,S_S,J,S_J,TD,S_TD,SADAR,S_SADAR,MDB,MDD)
           VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
              return $this->db->query($sql, $params);
    }


    function INSERT_EWS_hamil($params) {
        $sql = "INSERT INTO PKU.dbo.EWS_HAMIL(FS_KD_REG,TGL,JAM,NAFAS,S_NAFAS,O2,S_O2,AB,S_AB,S,S_S,J,S_J,TD,S_TD,D,S_D,FREKUENSI, MDB,MDD)
           VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
              return $this->db->query($sql, $params);
    }


    function INSERT_RP($params) {
        $sql = "INSERT INTO PKU.dbo.RENCANA_PULANG(FS_KD_REG,DIAGNOSA,TGL_MRS,JAM_MRS, ALASAN_MRS, TGL_RENCANA_PULANG, JAM_RENCANA_PULANG, ESTIMASI_TGL, PENGARUH_P, PENGARUH_K, PENGARUH_JOB, ANTI, BANTUAN, PEMBANTU, TINGGAL, ALAT_MEDIS, ALAT_BANTU, BANTU_KHUSUS, K_PRIBADI, NYERI, EDUKASI, KETR,  MDB,MDD)
           VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
              return $this->db->query($sql, $params);
    }


    
    function INSERT_AWAL_PERAWAT($params) { 
        $sql = "INSERT INTO PKU.dbo.IGD_AWAL_PERAWAT(FS_KD_REG,CARA_MASUK, ASAL_MASUK, KEL_UTAMA,KEL_SEKARANG,RIWAYAT_SAKIT,RIWAYAT_ALERGI_OBAT, RIWAYAT_ALERGI_MAKANAN, HAMIL,MENIKAH, JOB, SUKU, AGAMA, PSIKOLOGIS,MENTAL,KESADARAN,KEADAAN_UMUM,TD, N, S,R,TB,BB,LINGKAR_KEPALA,STATUS_GIZI, GCS, ALAT_BANTU, CACAT, ADL, RESIKO_JATUH,
        IRAMA_NAFAS, BATUK,POLA_NAFAS,SUARA_NAFAS,BANTU_NAFAS,NYERI_DADA,AKRAL,PERDARAHAN, CYANOSIS, CRT, TURGOR, REFLEK_CAHAYA, PUPIL, LUMPUH, PUSING, BAK, BAK_TEKAN, URINE, BAB, ABDOMEN, BAB_TEKAN, JEJAS_ABDOMEN, SENDI, DISLOK, FRAKTUR,LUKA, JATUH_3BULAN, BANTU_JALAN, SULIT_JALAN, KURSI_RODA, ALVI, RIWAYAT_DEKUBITUS, USIA65, ANAK_SESUAI_UMUR, PENERJEMAH, KRITERIA_DISCHARGE, HASIL, JAM_SELESAI, MDB, MDD,Nama_Pasien,Alamat)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function INSERT_SKRINING_TB($params) { 
        $sql = "INSERT INTO PKU.dbo.SKRINING_TB(FS_KD_REG, TANGGAL_SKRINING,JAM_SKRINING,GEJALA_TB1,GEJALA_TB2,PENUNJANG,KETERANGAN_PENUNJANG,KESIMPULAN_TB, MDB, MDD,GEJALA_TB3, GEJALA_TB4, GEJALA_TB5, GEJALA_TB6, GEJALA_TB7, GEJALA_TB8, GEJALA_TB9, GEJALA_TB10, GEJALA_TB11)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
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

    function update_skrining_tb($params) {
        $sql = "UPDATE PKU.dbo.SKRINING_TB SET  
        FS_KD_REG=?,
        TANGGAL_SKRINING=?,
        JAM_SKRINING=?,
        GEJALA_TB1=?,
        GEJALA_TB2=?,
        PENUNJANG=?,
        KETERANGAN_PENUNJANG=?,
        KESIMPULAN_TB=?,MDB=?,MDD=?,
        GEJALA_TB3=?,
        GEJALA_TB4=?,
        GEJALA_TB5=?,
        GEJALA_TB6=?,
        GEJALA_TB7=?,
        GEJALA_TB8=?,
        GEJALA_TB9=?,
        GEJALA_TB10=?,
        GEJALA_TB11=?
        WHERE id =?";
        return $this->db->query($sql, $params);
    }

    function update_ases13($params) {
        $sql = "UPDATE PKU.dbo.TAC_RI_ASES_PER2 SET FS_RIW_PENYAKIT_DAHULU=?, FS_RIW_PENYAKIT_DAHULU2=?, FS_RIW_PENYAKIT_KEL=?, FS_RIW_PENYAKIT_KEL2=?,
        FS_STATUS_PSIK=?,FS_STATUS_PSIK2=?,FS_HUB_KELUARGA=?,FS_ST_FUNGSIONAL=?,FS_AGAMA=?,FS_NILAI_KHUSUS=?,FS_NILAI_KHUSUS2=?,FS_PEMERIKSAAN_FISIK=?,
        FS_PENGELIHATAN=?, FS_PENCIUMAN=?,FS_PENDENGARAN=?,FS_RIW_IMUNISASI=?,FS_RIW_IMUNISASI_KET=?,FS_RIW_TUMBUH=?,FS_RIW_TUMBUH_KET=?, FS_HIGH_RISK=?, 
        FS_ANAMNESA=?,
        PERNIKAHAN=?, SUKU=?, JOB=?, MENTAL=?, KESADARAN=?, GCS=?, HAMIL=?,
        IRAMA_NAFAS=?, BATUK=?,POLA_NAFAS=?,SUARA_NAFAS=?,BANTU_NAFAS=?,NYERI_DADA=?,AKRAL=?,PERDARAHAN=?, CYANOSIS=?, CRT=?, TURGOR=?, REFLEK_CAHAYA=?, PUPIL=?, LUMPUH=?, PUSING=?, BAK=?, BAK_TEKAN=?, URINE=?, BAB=?, ABDOMEN=?, BAB_TEKAN=?, JEJAS_ABDOMEN=?, SENDI=?, DISLOK=?, FRAKTUR=?,LUKA=?,

         mdb=?,mdd=?
        WHERE FS_KD_REG =?";
        return $this->db->query($sql, $params);
    }
    

    function update_ases14($params) {
        $sql = "UPDATE PKU.dbo.TAC_RI_ASES_PER2 SET FS_RIW_PENYAKIT_DAHULU=?, FS_RIW_PENYAKIT_DAHULU2=?, FS_RIW_PENYAKIT_KEL=?, FS_RIW_PENYAKIT_KEL2=?,
        FS_STATUS_PSIK=?,FS_STATUS_PSIK2=?,FS_HUB_KELUARGA=?,FS_ST_FUNGSIONAL=?,FS_AGAMA=?,FS_NILAI_KHUSUS=?,FS_NILAI_KHUSUS2=?,FS_PEMERIKSAAN_FISIK=?,
        FS_PENGELIHATAN=?, FS_PENCIUMAN=?,FS_PENDENGARAN=?,FS_RIW_IMUNISASI=?,FS_RIW_IMUNISASI_KET=?,FS_RIW_TUMBUH=?,FS_RIW_TUMBUH_KET=?, FS_HIGH_RISK=?, 
        FS_ANAMNESA=?,
        PERNIKAHAN=?, SUKU=?, JOB=?, MENTAL=?, KESADARAN=?, GCS=?, HAMIL=?,
        IRAMA_NAFAS=?, BATUK=?,POLA_NAFAS=?,SUARA_NAFAS=?,BANTU_NAFAS=?,NYERI_DADA=?,AKRAL=?,PERDARAHAN=?, CYANOSIS=?, CRT=?, TURGOR=?, REFLEK_CAHAYA=?, PUPIL=?, LUMPUH=?, PUSING=?, BAK=?, BAK_TEKAN=?, URINE=?, BAB=?, ABDOMEN=?, BAB_TEKAN=?, JEJAS_ABDOMEN=?, SENDI=?, DISLOK=?, FRAKTUR=?,LUKA=?,
        KURSI_RODA=?, ALVI=?, RIWAYAT_DEKUBITUS=?, USIA65=?, ANAK_SESUAI_UMUR=?,
         mdb=?,mdd=?
        WHERE FS_KD_REG =?";
        return $this->db->query($sql, $params);
    }
    


    function INSERT_AWAL_MEDIS($params) { 
        $sql = "INSERT INTO PKU.dbo.IGD_AWAL_MEDIS(FS_KD_REG,KENDARAAN,RUJUKAN, FS_ANAMNESA,RIW_PENYAKIT_DAHULU,RIW_PENYAKIT_NOW,RIW_PERAWATAN,RIW_TINDAKAN,
        FS_STATUS_PSIK,MENTAL,PEMERIKSAAN_FISIK,SKOR_NYERI,LINGKAR_KEPALA,STATUS_GIZI,ALAT_BANTU,CACAT,ADL,RESIKO_JATUH,KONJUNGTIVA,DEVIASI,SKELERA,JVP,BIBIR,MUKOSA,JANTUNG,ABDOMEN,PINGGANG,EKS_ATAS,EKS_BAWAH,FILE_LOKASI,LAB,RAD,LAINYA,FS_DIAGNOSA,MASALAH_KES,FS_TERAPI,RENCANA,DIET,KONSUL,KD_DOKTER_KONSUL, EDUKASI,D_PLANNING,ALASAN_RUJUK,TRANSPORT_KELUAR,KONDISI_AKHIR,JAM_SELESAI,MDB,MDD,KONSUL2,KD_DOKTER_KONSUL2,KONSUL3,KD_DOKTER_KONSUL3,REKOMENDASI_RUJUK,REKOMENDASI_POLI,EKG,PARU,jenis_anamnesa, BAGIAN_RADIOLOGI,INTERPRESTASI_EKG)
          VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
               return $this->db->query($sql, $params);
    }

    function UPDATE_AWAL_PERAWAT($params) { 
        $sql = "UPDATE PKU.dbo.IGD_AWAL_PERAWAT SET FS_KD_REG=?,CARA_MASUK=?, ASAL_MASUK=?, KEL_UTAMA=?,
        KEL_SEKARANG=?,RIWAYAT_SAKIT=?,RIWAYAT_ALERGI_OBAT=?, RIWAYAT_ALERGI_MAKANAN=?, 
        HAMIL=?,MENIKAH=?, JOB=?, SUKU=?, AGAMA=?, PSIKOLOGIS=?,MENTAL=?,KESADARAN=?,KEADAAN_UMUM=?,
        TD=?, N=?, S=?,R=?,TB=?,BB=?,LINGKAR_KEPALA=?,STATUS_GIZI=?, GCS=?, ALAT_BANTU=?, CACAT=?, ADL=?,
         RESIKO_JATUH=?, IRAMA_NAFAS=?,BATUK=?, POLA_NAFAS=?,SUARA_NAFAS=?,BANTU_NAFAS=?,NYERI_DADA=?,
         AKRAL=?,PERDARAHAN=?, CYANOSIS=?, CRT=?, TURGOR=?, REFLEK_CAHAYA=?, PUPIL=?, LUMPUH=?,
          PUSING=?, BAK=?, BAK_TEKAN=?, URINE=?, BAB=?, ABDOMEN=?, BAB_TEKAN=?, JEJAS_ABDOMEN=?, SENDI=?,
           DISLOK=?, FRAKTUR=?,LUKA=?, JATUH_3BULAN=?, BANTU_JALAN=?, SULIT_JALAN=?, KURSI_RODA=?, ALVI=?,
            RIWAYAT_DEKUBITUS=?, USIA65=?, ANAK_SESUAI_UMUR=?, PENERJEMAH=?, KRITERIA_DISCHARGE=?, HASIL=?, 
            JAM_SELESAI=?, MDB=?, MDD=?, Nama_Pasien=?, Alamat=? where id=? ";
        return $this->db->query($sql, $params);
    }

    function INSERT_AWAL_BIDAN($params) { 
        $sql = "INSERT INTO PKU.dbo.IGD_AWAL_BIDAN(FS_KD_REG,CARA_MASUK,RUJUKAN,BAWA_OBAT,FS_STATUS_PSIK,FS_STATUS_EMOSI,FS_HUB_KELUARGA,FS_USIA_KEHAMILAN,FS_ANAMNESA, FS_HAID_MEN, FS_HAID_SIKLUS, FS_HAID_LAMA, 
        FS_HAID_HPHT, FS_HAID_HPL, FS_HAID_KELUHAN, FS_STATUS_PERKAWINAN, FS_LAMA_MENIKAH,  FS_ASMA_MULAI, FS_ASMA_TERAPI, FS_JANTUNG_MULAI, FS_JANTUNG_TERAPI, FS_DIABETES_MULAI, FS_DIABETES_TERAPI, FS_HIPERTENSI_MULAI, FS_HIPERTENSI_TERAPI, 
        FS_SAKIT_LAIN, FS_RIWAYAT_GYNEKOLOGI, FS_RIWAYAT_KB, FS_RIWAYAT_KOMPLIKASI_KB, POLA_MAKAN, POLA_MINUM, POLA_BAK, POLA_BAB, POLA_TIDUR, JAM_TERAKHIR_MAKAN, JAM_TERAKHIR_MINUM, JAM_TERAKHIR_BAK, JAM_TERAKHIR_BAB, JAM_TERAKHIR_TIDUR, WARNA_BAK,
         KARAKTER_BAB, RUMAH_MILIK, TINGGAL_BERSAMA, PJ_DARURAT,HUBUNGAN_PJ,AKTIFITAS,SOSIAL_SUPPORT,PERSALINAN,KEADAAN_UMUM,SADAR,ALAT_BANTU,TD,N,S,R,TB,BB,BBO,MATA,KEPALA,TELINGA,HIDUNG,TENGGOROKAN,LEHER,DADA,JANTUNG,PARU_PARU,ABDOMEN,BADAN_GERAK_ATAS,
         BADAN_GERAK_BAWAH,SCLERA,KONJUNGTIVA,CEK_DADA,INSPEKSI_ABDOMEN,LEOPOD_1,LEOPOD_2,LEOPOD_3,LEOPOD_4,AUSKULTASI,DURASI_AUSKULTASI,KONTRAKSI,DURASI_KONTRAKSI,INSPEKSI_ANO_GENITAS,VAGINA_TOUCHER,MASALAH_KEBIDANAN,DIAGNOSA, RENCANA_TINDAKAN,
         PENERJEMAH,KRITERIA_DISCHARGE,HASIL, PENDIDIKAN_PASIEN, JOB_PASIEN, SELESAI, MDB, MDD,Nama_Pasien,Alamat,BERI_OBAT_KE_PETUGAS, NO_HP_PJ, AUSKULTASI_BAYI_1,AUSKULTASI_BAYI_2,KET_AUSKULTASI_BAYI_1,KET_AUSKULTASI_BAYI_2, RESIKO_JATUH,RIWAYAT_PENYAKIT_DAHULU, EYE, MOTORIK, VERBAL,SPO2,DJJ)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
         return $this->db->query($sql, $params);
    }


    function get_px_by_dokter_by_rg2($params) { 
        $sql = "SELECT b.NO_REG,a.NAMA_PASIEN,a.NO_MR,a.ALAMAT,JENIS_KELAMIN,
        a.TGL_LAHIR,FS_ALERGI,a.FS_ALERGI,a.FS_REAK_ALERGI,a.FS_RIW_PENYAKIT_DAHULU,a.FS_RIW_PENYAKIT_DAHULU2
        FROM DB_RSMM.dbo.REGISTER_PASIEN a
        LEFT JOIN DB_RSMM.dbo.PENDAFTARAN b ON a.NO_MR=b.NO_MR
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
     

     function update_vs($params) {
        $sql = "UPDATE PKU.dbo.TAC_RI_VITAL_SIGN SET FS_SUHU = ?, FS_NADI =?, FS_R=?, FS_TD=?, FS_TB=?, FS_BB=?, mdb = ?, mdd = ? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }
    // $this->input->post('FS_KD_REG')
    // $this->input->post('FS_STATUS_PSIK'),
    // $this->input->post('PERNIKAHAN'),
    // $this->input->post('SUKU'),
    // $this->input->post('JOB'),
    // $this->com_user['user_id'],
    // date('Y-m-d'),
  

    function insert_ases_igd($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_ASES_PER2(FS_KD_REG, FS_STATUS_PSIK,FS_HUB_KELUARGA,FS_ PERNIKAHAN, SUKU, JOB, mdb,mdd)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }



    function insert_ases($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_ASES_PER2(FS_KD_REG, FS_RIW_PENYAKIT_DAHULU, FS_RIW_PENYAKIT_DAHULU2, FS_RIW_PENYAKIT_KEL, FS_RIW_PENYAKIT_KEL2,
        FS_STATUS_PSIK,FS_STATUS_PSIK2,FS_HUB_KELUARGA,FS_ST_FUNGSIONAL,FS_AGAMA,FS_NILAI_KHUSUS,FS_NILAI_KHUSUS2,FS_ANAMNESA,FS_PENGELIHATAN,
        FS_PENCIUMAN,FS_PENDENGARAN,FS_RIW_IMUNISASI,FS_RIW_IMUNISASI_KET,FS_RIW_TUMBUH,FS_RIW_TUMBUH_KET,FS_HIGH_RISK,FS_EDUKASI,FS_SKDP_FASKES, PERNIKAHAN, SUKU, JOB, mdb,mdd)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }


    


    function insert_ases2($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_RI_ASES_PER2(FS_KD_REG, FS_RIW_PENYAKIT_DAHULU, FS_RIW_PENYAKIT_DAHULU2, FS_RIW_PENYAKIT_KEL, FS_RIW_PENYAKIT_KEL2,
        FS_STATUS_PSIK,FS_STATUS_PSIK2,FS_HUB_KELUARGA,FS_ST_FUNGSIONAL,FS_AGAMA,FS_NILAI_KHUSUS,FS_NILAI_KHUSUS2,FS_PEMERIKSAAN_FISIK,FS_PENGELIHATAN,
        FS_PENCIUMAN,FS_PENDENGARAN,FS_RIW_IMUNISASI,FS_RIW_IMUNISASI_KET,FS_RIW_TUMBUH,FS_RIW_TUMBUH_KET,FS_HIGH_RISK,FS_ANAMNESA,PERNIKAHAN, SUKU, JOB, mdb,mdd)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_ases3($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_RI_ASES_PER2(FS_KD_REG, FS_RIW_PENYAKIT_DAHULU, FS_RIW_PENYAKIT_DAHULU2, FS_RIW_PENYAKIT_KEL, FS_RIW_PENYAKIT_KEL2,
        FS_STATUS_PSIK,FS_STATUS_PSIK2,FS_HUB_KELUARGA,FS_ST_FUNGSIONAL,FS_AGAMA,FS_NILAI_KHUSUS,FS_NILAI_KHUSUS2,FS_PEMERIKSAAN_FISIK,FS_PENGELIHATAN,
        FS_PENCIUMAN,FS_PENDENGARAN,FS_RIW_IMUNISASI,FS_RIW_IMUNISASI_KET,FS_RIW_TUMBUH,FS_RIW_TUMBUH_KET,FS_HIGH_RISK,FS_ANAMNESA,PERNIKAHAN, SUKU, JOB,MENTAL, KESADARAN, GCS,HAMIL, mdb,mdd)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }


    function insert_ases13($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_RI_ASES_PER2(FS_KD_REG, FS_RIW_PENYAKIT_DAHULU, FS_RIW_PENYAKIT_DAHULU2, FS_RIW_PENYAKIT_KEL, FS_RIW_PENYAKIT_KEL2,
        FS_STATUS_PSIK,FS_STATUS_PSIK2,FS_HUB_KELUARGA,FS_ST_FUNGSIONAL,FS_AGAMA,FS_NILAI_KHUSUS,FS_NILAI_KHUSUS2,FS_PEMERIKSAAN_FISIK,FS_PENGELIHATAN,
        FS_PENCIUMAN,FS_PENDENGARAN,FS_RIW_IMUNISASI,FS_RIW_IMUNISASI_KET,FS_RIW_TUMBUH,FS_RIW_TUMBUH_KET,FS_HIGH_RISK,FS_ANAMNESA,PERNIKAHAN, SUKU, JOB,MENTAL,
         KESADARAN, GCS,HAMIL, 
         IRAMA_NAFAS, BATUK,POLA_NAFAS,SUARA_NAFAS,BANTU_NAFAS,NYERI_DADA,AKRAL,PERDARAHAN, CYANOSIS, CRT, TURGOR, REFLEK_CAHAYA, PUPIL, LUMPUH, PUSING, BAK, BAK_TEKAN, URINE, BAB, ABDOMEN, BAB_TEKAN, JEJAS_ABDOMEN, SENDI, DISLOK, FRAKTUR,LUKA,
           mdb,mdd)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }
    function insert_status_igd($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_STATUS_IGD(FS_KD_REG, STATUS_IGD,MDB,MDD)
        VALUES (?,?,?,?)";
        return $this->db->query($sql, $params);
    }
    function delete_status_igd($params) {
        $sql = "DELETE from PKU.dbo.TAC_STATUS_IGD 
        WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }
    function update_status_igd($params) {
        $sql = "  UPDATE PKU.dbo.TAC_STATUS_IGD SET STATUS_IGD=?, MDB=?,MDD=? where FS_KD_REG=?";
        return $this->db->query($sql, $params);
    }


    function insert_ases14($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_RI_ASES_PER2(FS_KD_REG, FS_RIW_PENYAKIT_DAHULU, FS_RIW_PENYAKIT_DAHULU2, FS_RIW_PENYAKIT_KEL, FS_RIW_PENYAKIT_KEL2,
        FS_STATUS_PSIK,FS_STATUS_PSIK2,FS_HUB_KELUARGA,FS_ST_FUNGSIONAL,FS_AGAMA,FS_NILAI_KHUSUS,FS_NILAI_KHUSUS2,FS_PEMERIKSAAN_FISIK,FS_PENGELIHATAN,
        FS_PENCIUMAN,FS_PENDENGARAN,FS_RIW_IMUNISASI,FS_RIW_IMUNISASI_KET,FS_RIW_TUMBUH,FS_RIW_TUMBUH_KET,FS_HIGH_RISK,FS_ANAMNESA,PERNIKAHAN, SUKU, JOB,MENTAL,
         KESADARAN, GCS,HAMIL, 
         IRAMA_NAFAS, BATUK,POLA_NAFAS,SUARA_NAFAS,BANTU_NAFAS,NYERI_DADA,AKRAL,PERDARAHAN, CYANOSIS, CRT, TURGOR, REFLEK_CAHAYA, PUPIL, LUMPUH, PUSING, BAK, BAK_TEKAN, URINE, BAB, ABDOMEN, BAB_TEKAN, JEJAS_ABDOMEN, SENDI, DISLOK, FRAKTUR,LUKA,
         KURSI_RODA, ALVI, RIWAYAT_DEKUBITUS, USIA65, ANAK_SESUAI_UMUR,
           mdb,mdd)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
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

    function INSERT_TF_PERAWAT_IGD($params) { 
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
                    PENUNJANG, TINDAKAN, TERAPI, PENGIRIM, PENERIMA, STATUS_TF, DERAJAT, CAT1,CAT2, MDD1, MDD2,LAINNYA,RIWAYAT_ALERGI_MAKANAN,EWSS,GCS,GCS_M,GCS_E,GCS_V) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            return $this->db->query($sql, $params);
    }

    function insert_pemeriksaan_sebelum_transfer($params) { 
        $sql = "INSERT INTO PKU.dbo.PEMERIKSAAN_FISIK_IGD_SEBELUM_TRANSFER (TD, 
        SUHU, 
        NADI,
        RR, 
        SPO2, 
        FS_KD_REG, 
        KESADARAN, 
        CREATE_AT, 
                    CREATE_BY) values(?,?,?,?,?,?,?,?,?)";
            return $this->db->query($sql, $params);
    }

    function insert_pemeriksaan_setelah_transfer($params) { 
        $sql = "INSERT INTO PKU.dbo.PEMERIKSAAN_FISIK_IGD_SETELAH_TRANSFER (TD, 
        SUHU, 
        NADI,
        RR, 
        SPO2, 
        FS_KD_REG, 
        KESADARAN, 
        CREATE_AT, 
                    CREATE_BY) values(?,?,?,?,?,?,?,?,?)";
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

    function UPDATE_TF_PERAWAT_IGD($params) { 
        $sql = "UPDATE  PKU.dbo.TRANSFER_PASIEN SET FS_KD_REG=?, 
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
                    PENUNJANG=?, TINDAKAN=?, TERAPI=?, PENGIRIM=?, DERAJAT=?, CAT1=?,CAT2=?, MDD2=?,LAINNYA=?,RIWAYAT_ALERGI_MAKANAN=?,EWSS=?,GCS=?,GCS_M=?,GCS_E=?,GCS_V=?
                    where id=?";
                
            return $this->db->query($sql, $params);
    }

    function UPDATE_TF_PERAWAT_RUANGAN($params) { 
        $sql = "UPDATE  PKU.dbo.TRANSFER_PASIEN SET FS_KD_REG=?, 
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
                    PENUNJANG=?, TINDAKAN=?, TERAPI=?, PENERIMA=?,STATUS_TF=?, DERAJAT=?, CAT1=?,CAT2=?, MDD2=?,LAINNYA=?,RIWAYAT_ALERGI_MAKANAN=?,EWSS=?,GCS=?,GCS_M=?,GCS_E=?,GCS_V=?
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

    function get_triase_by_noreg($params) {
        $sql = "SELECT top 1 * 
        FROM PKU.dbo.TRIASE
        WHERE FS_KD_REG = ? order by id asc";
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


    function update_biososio($params) {
        $sql = "  UPDATE REGISTER_PASIEN SET Status_Nikah=?, Pekerjaan=?,Agama=?, Suku=? where No_MR=?";
        return $this->db->query($sql, $params);
    }


    function biososio($params) {
        $sql = " SELECT Status_Nikah,Pekerjaan, Pekerjaan, Suku from  REGISTER_PASIEN  where No_MR in(SELECT No_MR from PENDAFTARAN WHERE No_Reg=?)";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    
 



    function UPDATE_DAFTAR($params) {
        $sql = "  UPDATE PKU.dbo.DAFTAR_IGD SET
        FS_KD_REG=?, Nama=?, alamat=?,umur=?,JENIS_RAWAT=?,REKANAN=?, UNIT1=?, RUANG1=?,
         KD_DOKTER1=?,  UNIT2=?, RUANG2=?,
         KD_DOKTER2=?, KD_ADMISI=?, KD_DOKTER_UMUM=?, mdd=?
         WHERE id=?";
        return $this->db->query($sql, $params);
    }


    function UPDATE_TRIASE($params) {
        $sql = "UPDATE PKU.dbo.TRIASE SET FS_KD_REG=?, Nama_Pasien=?, Alamat=?, TGL_DATANG=?, JAM_DATANG=?, CARA_MASUK=?,
         SUDAH_TERPASANG=?, ALASAN_DATANG=?, KENDARAAN=?, NAMA_PENGANTAR=?, TELP_PENGANTAR=?, JENIS_KASUS=?, JENIS_TRAUMA=?,
          URAIAN_TRAUMA=?, TGL_KEJADIAN=?, TEMPAT_KEJADIAN=?, PACS=?, KESADARAN=?, SKOR_KESADARAN=?, TD=?, SKOR_TD=?, R=?,
           SKOR_R=?, O2=?, SKOR_O2=?, N=?, N_SKOR=?, SUHU=?, SKOR_SUHU=?, NYERI=?, BB=?, TB=?, KEPUTUSAN=?, rujukan_dari=?, dijemput=?, 
           KELUHAN=?, CAT_KHUSUS=?, TOTAL_SKOR=?, JAM_KEP=?, KD_PERAWAT=?, mdd=?, LEVEL_TRIASE=? where id=? ";
                   return $this->db->query($sql, $params);
    }


    function UPDATE_JATUH($params) {
        $sql = "UPDATE PKU.dbo.TAC_RI_JATUH3 SET FS_PARAM_1=?,FS_PARAM_2=?,FS_PARAM_3=?,FS_PARAM_4=?,FS_PARAM_5=?,FS_PARAM_6=?,FS_PARAM_7=?,FS_PARAM_8=?,FS_PARAM_9=?,FS_PARAM_10=?,FS_PARAM_11=?,FS_PARAM_12=?,FS_PARAM_13=?,FS_PARAM_14=?,FS_PARAM_15=?,FS_PARAM_16=?,FS_PARAM_17=?, MDB=?, MDD=?
         where FS_KD_JATUH2=? ";
                   return $this->db->query($sql, $params);
    }

    
    function update_level_medis($params) {
        $sql = "UPDATE PKU.dbo.TAC_STATUS_IGD SET STATUS_IGD=? WHERE FS_KD_REG= ?";
        return $this->db->query($sql, $params);
    }

    function DELETE_AWAL_BIDAN($params) {
        $sql = "DELETE from PKU.dbo.IGD_AWAL_BIDAN 
        WHERE id = ?";
        return $this->db->query($sql, $params);
    }

    function delete_neonatus_awal($params) {
        $sql = "DELETE from PKU.dbo.IGD_AWAL_NEONATUS 
        WHERE ID_IGD_NEONATUS = ?";
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

        $sql = "select A.*, B.Kode_Dokter, B.No_Reg, B.Kode_Ruang, B.Kode_Masuk,   C.Tgl_lahir, C.No_MR, D.NAMALENGKAP
        from  PKU.dbo.TRIASE A
        left join PENDAFTARAN B on B.No_Reg=A.FS_KD_REG
        left join REGISTER_PASIEN C on B.No_MR=C.No_MR 
        LEFT JOIN DB_RSMM.dbo.TUSER D ON A.KD_PERAWAT=D.NAMAUSER
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

        $sql = "select top 1  A.*, B.*, C.Tgl_lahir, C.No_MR, D.NAMALENGKAP
        from  PKU.dbo.IGD_AWAL_PERAWAT A
        left join PENDAFTARAN B on B.No_Reg=A.FS_KD_REG
        left join REGISTER_PASIEN C on B.No_MR=C.No_MR
        LEFT JOIN DB_RSMM.dbo.TUSER D ON A.MDB=D.NAMAUSER
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

    function get_data_skrining_tb_by_noreg($params) {

        $sql = "select top 1 *from PKU.dbo.SKRINING_TB
        where FS_KD_REG=?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_data_neonatus_by_noreg($params) {

        $sql = "select top 1  A.*, B.*, C.Tgl_lahir, C.No_MR, D.NAMALENGKAP
        from  PKU.dbo.IGD_AWAL_NEONATUS A
        left join PENDAFTARAN B on B.No_Reg=A.FS_KD_REG
        left join REGISTER_PASIEN C on B.No_MR=C.No_MR
        LEFT JOIN DB_RSMM.dbo.TUSER D ON A.MDB=D.NAMAUSER
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

        $sql = "select top 1 A.*, B.*, C.Tgl_lahir, C.No_MR, D.NAMALENGKAP
        from  PKU.dbo.IGD_AWAL_MEDIS A
        left join PENDAFTARAN B on B.No_Reg=A.FS_KD_REG
        left join REGISTER_PASIEN C on B.No_MR=C.No_MR
        LEFT JOIN DB_RSMM.dbo.TUSER D ON A.MDB=D.NAMAUSER
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

    function get_data_neonatus($params) {

        $sql = "select top 1 A.*, B.*, C.Tgl_lahir, C.No_MR, D.NAMALENGKAP
        from  PKU.dbo.IGD_AWAL_NEONATUS A
        left join PENDAFTARAN B on B.No_Reg=A.FS_KD_REG
        left join REGISTER_PASIEN C on B.No_MR=C.No_MR
        LEFT JOIN DB_RSMM.dbo.TUSER D ON A.MDB=D.NAMAUSER
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

    function get_data_ases_bidan_igd($params) {//get data pasien ugd bidan
        $n=date('Y-m-d');

        $sql = "select A.*, B.Kode_Dokter, B.No_Reg, C.Tgl_lahir, C.No_MR, D.NAMA_SUAMI, D.TGL_LAHIR_SUAMI, D.AGAMA_SUAMI, D.PEKERJAAN_SUAMI, D.PENDIDIKAN_SUAMI
        from  PKU.dbo.IGD_AWAL_BIDAN A
        left join DB_RSMM.dbo.PENDAFTARAN B on B.No_Reg=A.FS_KD_REG
        left join DB_RSMM.dbo.REGISTER_PASIEN C on B.No_MR=C.No_MR
        left join PKU.dbo.SUAMI_PASIEN D on D.FS_KD_REG=A.FS_KD_REG
        where (B.Tanggal=? or B.Tanggal=?) or (cast(A.MDD as date)=?) and C.Jenis_Kelamin='P'";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

  

    function get_data_bidan_by_noreg($params) {

        $sql = "select top 1 A.*, B.*, C.Tgl_lahir, C.No_MR, D.NAMA_SUAMI, D.TGL_LAHIR_SUAMI, D.PENDIDIKAN_SUAMI, D.PEKERJAAN_SUAMI, D.AGAMA_SUAMI, E.FS_AGAMA, E.FS_STATUS_PSIK, F.FS_ALERGI, F.FS_REAK_ALERGI, G.NAMALENGKAP
        from  PKU.dbo.IGD_AWAL_BIDAN A

        left join PKU.dbo.TAC_RJ_ALERGI F on F.FS_KD_REG=A.FS_KD_REG
        left join PKU.dbo.TAC_RI_ASES_PER2 E on E.FS_KD_REG=A.FS_KD_REG
        left join PENDAFTARAN B on B.No_Reg=A.FS_KD_REG
        left join REGISTER_PASIEN C on B.No_MR=C.No_MR
        left join PKU.dbo.SUAMI_PASIEN D ON D.FS_KD_REG=A.FS_KD_REG
        LEFT JOIN DB_RSMM.dbo.TUSER G ON A.mdb=G.NAMAUSER
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
    
    function get_dokter_sp($params="") {
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



    function update_pemeriksaan_sebelum_transfer($params) {
        $sql = "  UPDATE PKU.dbo.PEMERIKSAAN_FISIK_IGD_SEBELUM_TRANSFER SET 
        TD=?,
         SUHU=?,
        NADI=?,
        RR=?,
        SPO2=?,
        FS_KD_REG=?,
        KESADARAN=?,
        CREATE_AT=?,
        CREATE_BY=? where ID=? ";
        return $this->db->query($sql, $params);
    }

    function update_pemeriksaan_setelah_transfer($params) {
        $sql = "  UPDATE PKU.dbo.PEMERIKSAAN_FISIK_IGD_SETELAH_TRANSFER SET 
        TD=?,
         SUHU=?,
        NADI=?,
        RR=?,
        SPO2=?,
        FS_KD_REG=?,
        KESADARAN=?,
        CREATE_AT=?,
        CREATE_BY=? where ID=? ";
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
    function cek_skrining_tb($params) {
        $sql = "SELECT FS_KD_REG FROM PKU.dbo.SKRINING_TB WHERE FS_KD_REG = ?";
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
    function cek_status_igd($params) {
        $sql = "SELECT FS_KD_REG FROM PKU.dbo.TAC_STATUS_IGD WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            return $result;
        } else {
            return 0;
        }
    }
    function cek_status_rujukan($params) {
        $sql = "SELECT FS_KD_REG FROM PKU.dbo.TAC_RJ_RUJUKAN_IGD WHERE FS_KD_REG = ?";
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

    function get_data_ttv_sebelum_tf($params) {
        $sql = "SELECT top 1 * 
        from PKU.dbo.PEMERIKSAAN_FISIK_IGD_SEBELUM_TRANSFER 
        where FS_KD_REG = ? order by ID desc";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    function get_data_ttv_setelah_tf($params) {
        $sql = "SELECT top 1 * 
        from PKU.dbo.PEMERIKSAAN_FISIK_IGD_SETELAH_TRANSFER 
        where FS_KD_REG = ? order by ID desc";
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

    function cek_neonatus($params) {
        $sql = "SELECT FS_KD_REG FROM PKU.dbo.IGD_AWAL_NEONATUS WHERE FS_KD_REG = ?";
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
      function get_neonatus($params) {
        $date = date('Y-m-d');

        $sql = "SELECT A.*, G.NamaLengkap 
        from PKU.dbo.IGD_AWAL_NEONATUS A
        LEFT JOIN DB_RSMM.dbo.TUSER G ON A.MDB=G.NamaUser
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


      
  
  
  

    function get_pasien_ugd_bidan() {
        $now = date('Y-m-d'); 

        $date = new DateTime();
        $date_plus = $date->modify("-1 days");
        $akhirnya= $date_plus->format("Y-m-d");

        $sql = "SELECT E.NO_REG, B.NO_MR, B.NAMA_PASIEN, B.TGL_LAHIR, B.JENIS_KELAMIN, B.ALAMAT
       FROM REGISTER_PASIEN B,  PENDAFTARAN E 
       WHERE B.NO_MR=E.NO_MR AND E.STATUS='1' and E.KODE_MASUK='1' and (E.TANGGAL= '$now' or E.TANGGAL='$akhirnya') and B.Jenis_Kelamin='P'";
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
        $now = date('Y-m-d'); 

        $date = new DateTime();
        $date_plus = $date->modify("-1 days");
        $akhirnya= $date_plus->format("Y-m-d");

        $sql = "SELECT E.NO_REG, B.NO_MR, B.NAMA_PASIEN, B.TGL_LAHIR, B.JENIS_KELAMIN, B.ALAMAT, D.STATUS_IGD, C.FS_TERAPI
       FROM REGISTER_PASIEN B,  PENDAFTARAN E 
       LEFT JOIN PKU.dbo.TAC_STATUS_IGD D ON E.NO_REG = D.FS_KD_REG
       LEFT JOIN PKU.dbo.IGD_AWAL_MEDIS C ON E.NO_REG = C.FS_KD_REG
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

    function get_pasien_ugd_anak() {
        $now = date('Y-m-d'); 

        $date = new DateTime();
        $date_plus = $date->modify("-1 days");
        $akhirnya= $date_plus->format("Y-m-d");

        $sql = "SELECT E.NO_REG, B.NO_MR, B.NAMA_PASIEN, B.TGL_LAHIR, B.JENIS_KELAMIN, B.ALAMAT, D.STATUS_IGD, C.FS_TERAPI, datediff(year,B.TGL_LAHIR,GETDATE()) 'fn_umur'
       FROM REGISTER_PASIEN B,  PENDAFTARAN E 
       LEFT JOIN PKU.dbo.TAC_STATUS_IGD D ON E.NO_REG = D.FS_KD_REG
       LEFT JOIN PKU.dbo.IGD_AWAL_MEDIS C ON E.NO_REG = C.FS_KD_REG
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


   
   function cek_anes_lokal($params) {
    $sql = "SELECT FS_KD_REG FROM PKU.dbo.ANESTESI_LOKAL WHERE idoperasi = ?";
    $query = $this->db->query($sql, $params);
    if ($query->num_rows() > 0) {
        $result = $query->num_rows();
        return $result;
    } else {
        return 0;
    }
}


function INSERT_ANESTESI_LOKAL($params) {
    $sql = "INSERT INTO PKU.dbo.ANESTESI_LOKAL( 
        FS_KD_REG,  idoperasi, Tgl, Jam, diagnosa, nm_tindakan, kd_dokter, kd_perawat, riwayat_op, riwayat_alergi, pasca_SADAR,
        pasca_TD, pasca_N,  pasca_R, pasca_S, pasca_ALERGI, pasca_KOMPLI, MDD) 
    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    return $this->db->query($sql, $params);
}


function INSERT_PEMANTAUAN($params) {
    $sql = "INSERT INTO PKU.dbo.PANTAU_ANESTESI_LOKAL( 
       idoperasi, Tgl, Jam, SADAR, TD, N, R, S, OBAT, CAIRAN, KET,MDB, MDD) 
    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
    return $this->db->query($sql, $params);
}


function DELETE_ANESTESI_LOKAL($params) {
    $sql = "DELETE FROM PKU.dbo.ANESTESI_LOKAL WHERE idoperasi = ?";
   return $this->db->query($sql, $params);
}


function UPDATE_ANESTESI_LOKAL($params) {
    $sql = "UPDATE PKU.dbo.ANESTESI_LOKAL SET
       FS_KD_REG=?,  idoperasi=?, Tgl=?, Jam=?, diagnosa=?, nm_tindakan=?, kd_dokter=?, kd_perawat=?, riwayat_op=?, riwayat_alergi=?, pasca_SADAR=?,
        pasca_TD=?, pasca_N=?,  pasca_R=?, pasca_S=?, pasca_ALERGI=?, pasca_KOMPLI=?, MDD=?
        WHERE idoperasi=? ";
    return $this->db->query($sql, $params);
}


function cek_anestesi_lokal($params) {
    $sql = "SELECT FS_KD_REG FROM PKU.dbo.ANESTESI_LOKAL WHERE idoperasi = ?";
    $query = $this->db->query($sql, $params);
    if ($query->num_rows() > 0) {
        $result = $query->num_rows();
        return $result;
    } else {
        return 0;
    }
}


function get_list_anes_lokal($params) {
    $sql = "select top 1 A.*, B.NAMALENGKAP
    from PKU.dbo.ANESTESI_LOKAL A
    LEFT JOIN DB_RSMM.dbo.TUSER B ON A.kd_perawat=B.NamaUser 
    and A.FS_KD_REG= ? order by A.id desc";
    $query = $this->db->query($sql, $params);
    if ($query->num_rows() > 0) {
        $result = $query->row_array();
        $query->free_result();
        return $result;
    } else {
        return 0;
    }
}



function get_status_pantau($params) {
    $sql = "select A.*, B.NAMALENGKAP
    from PKU.dbo.PANTAU_ANESTESI_LOKAL A
    LEFT JOIN DB_RSMM.dbo.TUSER B ON A.MDB=B.NamaUser 
    and A.FS_KD_REG= ? order by A.id asc";
    $query = $this->db->query($sql, $params);
    if ($query->num_rows() > 0) {
        $result = $query->result_array();
        $query->free_result();
        return $result;
    } else {
        return array();
    }
 }


   function get_px_op_bangsal($params) {
        $tgl=date('Y-m-d');

        $date = new DateTime();
        $date_plus = $date->modify("-1 days");
        $akhirnya= $date_plus->format("Y-m-d");

        $sql = "select A.*, B.No_MR, B.No_Reg, C.Nama_Pasien , C.Alamat, F.Nama_Dokter
        from JADWAL_OP as A
        left join  PENDAFTARAN B on A.FS_KD_REG=B.No_Reg
        left join  REGISTER_PASIEN C on C.No_MR=B.No_MR
        left join  DOKTER F on F.Kode_Dokter=A.Kode_Dokter
        left join  TR_KAMAR Z on  A.FS_KD_REG=Z.No_Reg
        left join  M_RUANG X on Z.KODE_RUANG=X.KODE_RUANG
        left join  M_BANGSAL D on X.KODE_BANGSAL=D.KODE_BANGSAL
        where B.STATUS='1'  and D.KODE_BANGSAL = ?
        ORDER BY A.tanggalop ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }



    function get_px_poli($params) {
        $tgl=date('Y-m-d');

        $date = new DateTime();
        $date_plus = $date->modify("-1 days");
        $akhirnya= $date_plus->format("Y-m-d");

        $sql = "SELECT A.NO_MR, B.NAMA_PASIEN, A.NO_REG, A.KODE_DOKTER
        FROM PENDAFTARAN A LEFT JOIN REGISTER_PASIEN B
        ON A.NO_MR=B.NO_MR WHERE A.TANGGAL='$tgl' and  A.MEDIS='RAWAT JALAN'";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_px_op_poli($params) {
        $tgl=date('Y-m-d');

        $date = new DateTime();
        $date_plus = $date->modify("-1 days");
        $akhirnya= $date_plus->format("Y-m-d");

        $sql = "select A.*, B.No_MR, B.No_Reg, C.Nama_Pasien , C.Alamat, F.Nama_Dokter
        from JADWAL_OP as A
        left join  PENDAFTARAN B on A.FS_KD_REG=B.No_Reg
        left join  REGISTER_PASIEN C on C.No_MR=B.No_MR
        left join  DOKTER F on F.Kode_Dokter=A.Kode_Dokter
       
        where B.STATUS='1' AND  B.MEDIS='RAWAT JALAN' and A.STATUS_OP='Belum'
        ORDER BY A.tanggalop ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }




    
   function get_px_op_mina($params) {
    $tgl=date('Y-m-d');

    $date = new DateTime();
    $date_plus = $date->modify("-1 days");
    $akhirnya= $date_plus->format("Y-m-d");

    $sql = "select A.*, B.No_MR, B.No_Reg, C.Nama_Pasien , C.Alamat, F.Nama_Dokter
    from JADWAL_OP as A
	left join  PENDAFTARAN B on A.FS_KD_REG=B.No_Reg
	left join  REGISTER_PASIEN C on C.No_MR=B.No_MR
	left join  DOKTER F on F.Kode_Dokter=A.Kode_Dokter
	left join  TR_KAMAR Z on  A.FS_KD_REG=Z.No_Reg
	left join  M_RUANG X on Z.KODE_RUANG=X.KODE_RUANG
	left join  M_BANGSAL D on X.KODE_BANGSAL=D.KODE_BANGSAL
    where B.STATUS='1'  and (D.KODE_BANGSAL = 'MNA' or D.KODE_BANGSAL ='0001')  
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


function data_operasi($params) {
    $sql = " SELECT  A.*, B.* FROM JADWAL_OP A
    left join DOKTER B on A.Kode_Dokter=B.Kode_Dokter
    WHERE id=?";
    $query = $this->db->query($sql, $params);
    if ($query->num_rows() > 0) {
        $result = $query->row_array();
        return $result;
    } else {
        return array();
    }
}


function get_data_alergi_by_rg($params) {
    $sql = "SELECT FS_ALERGI, FS_REAK_ALERGI, FS_RIW_PENYAKIT_DAHULU,
     FS_RIW_PENYAKIT_DAHULU2 from REGISTER_PASIEN WHERE No_MR in(SELECT No_MR from PENDAFTARAN WHERE No_Reg=?)";
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
    $sql = "SELECT top 1 a.*,c.NAMA_DOKTER,b.user_name,KODE_DOKTER, d.NAMALENGKAP 
    FROM PKU.dbo.TAC_RJ_MEDIS a
    LEFT JOIN PKU.dbo.TAC_COM_USER b ON a.mdb=b.user_id
    LEFT JOIN DOKTER c ON b.user_name=c.KODE_DOKTER
    LEFT JOIN DB_RSMM.dbo.TUSER d ON b.user_name=d.NAMAUSER
    WHERE a.FS_KD_REG = ? order by a.FS_KD_TRS  desc";
    $query = $this->db->query($sql, $params);
    if ($query->num_rows() > 0) {
        $result = $query->row_array();
        $query->free_result();
        return $result;
    } else {
        return 0;
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
        $result = $query->row_array();
        $query->free_result();
        return $result;
    } else {
        return 0;
    }
}


   function get_pasien_ugd2() {
    $now = date('Y-m-d'); 

    $date = new DateTime();
    $date_plus = $date->modify("-1 days");
    $akhirnya= $date_plus->format("Y-m-d");

    $sql = "SELECT E.NO_REG, B.NO_MR, B.NAMA_PASIEN, B.TGL_LAHIR, B.JENIS_KELAMIN, B.ALAMAT
        FROM REGISTER_PASIEN B,  PENDAFTARAN E 
        WHERE B.NO_MR=E.NO_MR  and E.KODE_MASUK='1' and E.TANGGAL>= '$akhirnya' AND E.Kode_Ruang='' AND E.Status='1'";
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
         and (A.TGL_PINDAH>='$akhirnya') and A.RUANG1='POLI'
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

    function get_pasien_masuk_tf_igd($params) {

        $now = date('Y-m-d'); 

        $date = new DateTime();
        $date_plus = $date->modify("-1 days");
        $akhirnya= $date_plus->format("Y-m-d");
        
        $sql = "select A.*, B.Nama_Ruang, C.No_Reg, C.No_MR, D.Nama_Pasien, D.Alamat, C.MEDIS, F.Nama_Ruang
         from PKU.dbo.TRANSFER_PASIEN A, M_RUANG B, PENDAFTARAN C, REGISTER_PASIEN D, M_RUANG F
         where  A.RUANG2=B.Kode_Ruang and  B.Kode_Bangsal=? and C.No_Reg=A.FS_KD_REG and D.No_MR=C.No_MR  and F.Kode_Ruang=A.RUANG2 
         and (A.TGL_PINDAH>='$akhirnya') and A.RUANG1='IGD'
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

    function get_pasien_masuk_tf_igd2($params) {

        $now = date('Y-m-d'); 

        $date = new DateTime();
        $date_plus = $date->modify("-1 days");
        $akhirnya= $date_plus->format("Y-m-d");
        
        $sql = "select A.*, B.Nama_Ruang, C.No_Reg, C.No_MR, D.Nama_Pasien, D.Alamat, C.MEDIS, F.Nama_Ruang
         from PKU.dbo.TRANSFER_PASIEN A, M_RUANG B, PENDAFTARAN C, REGISTER_PASIEN D, M_RUANG F
         where  A.RUANG2=B.Kode_Ruang and  (B.Kode_Bangsal='MNA' or B.Kode_Bangsal ='0001')
          and C.No_Reg=A.FS_KD_REG and D.No_MR=C.No_MR  and F.Kode_Ruang=A.RUANG2 
         and (A.TGL_PINDAH>='$akhirnya') and A.RUANG1='IGD'
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
         and (A.TGL_PINDAH>='$akhirnya') and A.RUANG1='POLI'
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
         AND (A.TANGGAL= '$now' or A.TANGGAL='$akhirnya') AND C.FS_CARA_PULANG=3";

$sql2 = " SELECT B.NAMA_PASIEN, B.NO_MR, A.NO_REG, A.KODE_DOKTER
         FROM PENDAFTARAN A, REGISTER_PASIEN B, PKU.dbo.IGD_AWAL_MEDIS D
         WHERE  A.NO_MR=B.NO_MR AND D.FS_KD_REG=A.NO_REG
         AND (A.TANGGAL= '$now' or A.TANGGAL='$akhirnya') AND D.D_PLANNING='Inap'";
  

$kondisi1 = $this->db->query($sql, $params);
$kondisi2 = $this->db->query($sql2, $params);


$result = $kondisi1->result_array();
$result2 = $kondisi2->result_array();

        if ($kondisi1->num_rows() > 0 || $kondisi2->num_rows()>0) {
            $query=array_merge($result,$result2);
            return $query;
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

    function get_pasien_keluar_igd($params) {

        $now = date('Y-m-d'); 

        $date = new DateTime();
        $date_plus = $date->modify("-1 days");
        $akhirnya= $date_plus->format("Y-m-d");
        
        $sql = "select A.*, B.Nama_Ruang, C.No_Reg, C.No_MR, D.Nama_Pasien, D.Alamat, C.MEDIS
        from PKU.dbo.TRANSFER_PASIEN A,M_RUANG B, PENDAFTARAN C, REGISTER_PASIEN D
        where  A.RUANG2=B.Kode_Ruang  and C.No_Reg=A.FS_KD_REG and D.No_MR=C.No_MR  and A.RUANG1='IGD'
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
        (A.last_update>='$akhirnya')
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


    function get_ews_hamil($params) {

        $sql = "select  * from  PKU.dbo.EWS_HAMIL  where FS_KD_REG=?  ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function get_ews_anak($params) {

        $sql = "select  * from  PKU.dbo.EWS_ANAK  where FS_KD_REG=?  ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function INSERT_EWS_ANAK($params) {
        $sql = "INSERT INTO PKU.dbo.EWS_ANAK(FS_KD_REG,TGL,JAM,NAFAS,S_NAFAS,RETRAKSI, O2,S_O2, CRT, S_CRT, AB,S_AB,S,S_S,J,S_J,TD,S_TD,SADAR,S_SADAR,MDB,MDD)
           VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
              return $this->db->query($sql, $params);
    }

    function insert_neonatus_awal($params) { //BELUM
        $sql = "INSERT INTO PKU.dbo.IGD_AWAL_NEONATUS(FS_KD_REG,TANGGAL_MASUK,JAM_MASUK,KRITERIA_MASUK,DIAGNOSA_MEDIS,DPJP, JENIS_KELAMIN, TGL_LAHIR,DIAGNOSA_MASUK, NAMA_AYAH, NAMA_IBU, PEKERJAAN_ORANG_TUA, JAMINAN, AGAMA, SUKU, RIWAYAT_PENYAKIT_DAHULU, RIWAYAT_IMUNISASI, USIA_KEHAMILAN, ANAK_KE, JUMLAH_ANAK, PRENATAL, NATAL, INTRANATAL, POSNATAL, WARNA_KETUBAN, DITANGANI_OLEH, TINDAKAN_SEBELUM_DIRAWAT,RIWAYAT_ALERGI, KESADARAN, S, N, R, SATURASI_OKSIGEN, PANJANG_BADAN, BERAT_BADAN_MASUK, APGAR_SCORE, BERAT_BADAN_LAHIR, LINGKAR_KEPALA, LINGKAR_LENGAN, LINGKAR_DADA, KEPALA, LEHER, MATA,PUPIL, PALPEBRA, HIDUNG, MULUT, TELINGA, DADA, IRAMA_NAFAS,BUNYI_NAFAS, ABDOMEN, TALI_PUSAT, REGURGITASI, REFLEKS_MENGHISAP, REFLEKS_MENELAN, GENITALIA, ANUS, MEKONIUM, BAK, BAB, EKSTREMITAS, KELAINAN_FISIK, TURGOR, WARNA_KULIT, PARAM_NYERI1, PARAM_NYERI2, PARAM_NYERI3, PARAM_NYERI4, PARAM_NYERI5, PARAM_NYERI6, TOTAL_SKOR_NYERI, TINDAKAN_KEPERAWATAN, HAMBATAN_PEMBELAJARAN,  PENERJEMAH, KEBUTUHAN_EDUKASI, DISCHARGE_PLANNING, DISCHARGE_PLANNING_LAIN, JAM_SELESAI, MDB, MDD, resiko_jatuh)
           VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
              return $this->db->query($sql, $params);
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

    // ambil data kriteria discharge 
    function getKriteriaDischargeAssesmenBidan($params)
    {
        $sql = "SELECT KRITERIA_DISCHARGE
        FROM PKU.dbo.IGD_AWAL_BIDAN
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

    function getKriteriaDischargeAssesmenPerawat($params)
    {
        $sql = "SELECT KRITERIA_DISCHARGE
        FROM PKU.dbo.IGD_AWAL_PERAWAT
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

    function getJenisAnamnesaAssesmenPerawat($params)
    {
        $sql = "SELECT jenis_anamnesa
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

    function getKriteriaDischargeAssesmenNeonatus($params)
    {
        $sql = "SELECT DISCHARGE_PLANNING
        FROM PKU.dbo.IGD_AWAL_NEONATUS
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

 

    function get_lab_edit($params)
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

    function get_rad_edit($params)
    {
        $sql = "SELECT rad
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

    function get_penunjang_skrining_tb($params)
    {
        $sql = "SELECT PENUNJANG
        FROM PKU.dbo.SKRINING_TB
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


}