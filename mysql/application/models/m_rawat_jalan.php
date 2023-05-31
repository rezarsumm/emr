<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_rawat_jalan extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->db = $this->load->database('emr', TRUE);
    }

    function get_last_inserted_id() {
        return $this->db->insert_id();
    }

    function insert($params) {
        $sql = "INSERT INTO TAC_RJ_STATUS( FS_KD_REG, FS_STATUS,FS_FORM,FS_JNS_ASESMEN, mdb, mdd)
        VALUES(?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }
    
    function insert_resep($params) {
        $sql = "INSERT INTO TA_TRS_KARTU_PERIKSA3( FS_KD_BARANG, FS_NM_BARANG, FS_KD_SATUAN,
        FN_QTY_BARANG,FS_ETIKET,FS_KD_TIPE_BARANG,FN_ETIKET_QTY,FS_ETIKET_CATATAN,FS_ETIKET_HARI,FS_KD_REG)
        VALUES(?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_resep_edit($params) {
        $sql = "INSERT INTO TA_TRS_KARTU_PERIKSA3(FS_KD_TRS,FS_KD_BARANG, FS_NM_BARANG, FS_KD_SATUAN,
        FN_QTY_BARANG,FS_ETIKET,FS_KD_TIPE_BARANG,FN_ETIKET_QTY,FN_ETIKET_HARI,FS_ETIKET_CATATAN)
        VALUES(?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_antrian_obat($params) {
        $sql = "INSERT INTO TAC_RJ_ANTRIAN_OBAT( FS_KD_RJ_MEDIS, FS_KD_ANTRIAN,FD_TGL_ANTRIAN)
        VALUES(?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_medis($params) {
        $sql = "INSERT INTO TA_TRS_KARTU_PERIKSA(FS_KD_TRS, FD_TGL_TRS, FS_JAM_TRS, FS_KD_PETUGAS, FD_TGL_VOID, FS_JAM_VOID, FS_KD_REG, 
        FS_KD_LAYANAN, FS_KD_PETUGAS_MEDIS, FS_ANAMNESA, FS_DIAGNOSA, FS_TINDAKAN, 
        FS_CATATAN_FISIK,FB_RESEP,FS_KD_MEDIS_RESEP, FS_KD_TIPE_BARANG, FN_CETAK)
        VALUES     (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_tac_rj_medis($params) {
        $sql = "INSERT INTO TAC_RJ_MEDIS(FS_KD_KP,FS_KD_REG, FS_DIAGNOSA, FS_ANAMNESA, FS_TINDAKAN, FS_TERAPI, FS_CATATAN_FISIK,FS_KD_MEDIS,FS_CARA_PULANG,FS_DAFTAR_MASALAH,FS_PLANNING,FS_OBAT_PROLANIS,
        FS_TIME_OUT, FS_EDUKASI, mdb, mdd,FS_JAM_TRS)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_tac_rj_skdp($params) {
        $sql = "INSERT INTO TAC_RJ_SKDP(FS_KD_REG, FS_SKDP_1, FS_SKDP_2,FS_SKDP_KET,FS_SKDP_KONTROL,FS_NO_SKDP, mdb, mdd, mdd_time)
        VALUES (?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }
    
    function insert_tac_rj_rujukan($params) {
        $sql = "INSERT INTO TAC_RJ_RUJUKAN(FS_KD_REG,FS_TUJUAN_RUJUKAN,FS_TUJUAN_RUJUKAN2,FS_ALASAN_RUJUK, mdb, mdd_date, mdd_time)
        VALUES (?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }
    function insert_fisio1($params) {
        $sql = "INSERT INTO TAC_RJ_FISIO1(FS_KD_REG,FS_NM_GERAK,FS_NM_ROM, FS_NM_NYERI, mdb, mdd)
        VALUES (?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }
    
    function insert_fisio_pasif($params) {
        $sql = "INSERT INTO TAC_RJ_FISIO2(FS_KD_REG,FS_NM_GERAK_PASIF,FS_NM_ROM_PASIF, FS_NM_NYERI_PASIF,FS_NM_END_FEEL, mdb, mdd)
        VALUES (?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }
    
    function insert_fisio_isom($params) {
        $sql = "INSERT INTO TAC_RJ_FISIO3(FS_KD_REG,FS_NM_GERAK_ISOM,FS_NM_MMT, mdb, mdd)
        VALUES (?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_vs($params) {
        $sql = "INSERT INTO TAC_RJ_VITAL_SIGN(FS_KD_REG, FS_SUHU, FS_NADI, FS_R, FS_TD,FS_TB,FS_BB,FS_KD_MEDIS, mdb, mdd, FS_JAM_TRS)
        VALUEs (?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }
    
    function insert_vs_covid($params) {
        $sql = "INSERT INTO TAC_RJ_VITAL_SIGN(FS_KD_REG, FS_SUHU)
        VALUEs (?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_nyeri($params) {
        $sql = "INSERT INTO TAC_RJ_NYERI(FS_KD_REG, FS_NYERIP, FS_NYERIQ, FS_NYERIR, FS_NYERIS, FS_NYERIT, mdb, mdd, FS_NYERI)
        VALUES (?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_jatuh($params) {
        $sql = "INSERT INTO TAC_RJ_JATUH(FS_KD_REG, FS_CARA_BERJALAN1, FS_CARA_BERJALAN2, FS_CARA_DUDUK, mdd, mdb)
        VALUES (?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_alergi($params) {
        $sql = "INSERT INTO TAC_RJ_ALERGI(FS_KD_REG, FS_ALERGI, FS_ALERGI2, FS_REAK_ALERGI, mdb, mdd)
        VALUES (?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_nutrisi($params) {
        $sql = "INSERT INTO TAC_RJ_NUTRISI(FS_KD_REG, FS_NUTRISI1, FS_NUTRISI2,FS_NUTRISI_ANAK1, FS_NUTRISI_ANAK2,FS_NUTRISI_ANAK3,FS_NUTRISI_ANAK4, mdb, mdd)
        VALUES (?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_nutrisi_anak($params) {
        $sql = "INSERT INTO TAC_RJ_NUTRISI(FS_KD_REG, FS_NUTRISI_ANAK1, FS_NUTRISI_ANAK2,FS_NUTRISI_ANAK3,FS_NUTRISI_ANAK4, mdb, mdd)
        VALUES (?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_masalah_kep($params) {
        $sql = "INSERT INTO TAC_RJ_MASALAH_KEP(FS_KD_REG, FS_KD_MASALAH_KEP)
        VALUES (?,?)";
        return $this->db->query($sql, $params);
    }
    function insert_intervensi_umum($params) {
        $sql = "INSERT INTO TAC_RJ_FISIO4(FS_KD_REG,FS_KD_FISIO_INTERVENSI_UMUM)
        VALUES (?,?)";
        return $this->db->query($sql, $params);
    }
    function insert_intervensi_bpjs($params) {
        $sql = "INSERT INTO TAC_RJ_FISIO4BPJS(FS_KD_REG,FS_KD_FISIO_INTERVENSI_BPJS)
        VALUES (?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_rencana_kep($params) {
        $sql = "INSERT INTO TAC_RJ_REN_KEP(FS_KD_REG, FS_KD_REN_KEP)
        VALUES (?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_ases($params) {
        $sql = "INSERT INTO TAC_ASES_PER2(FS_KD_REG, FS_RIW_PENYAKIT_DAHULU, FS_RIW_PENYAKIT_DAHULU2, FS_RIW_PENYAKIT_KEL, FS_RIW_PENYAKIT_KEL2,
        FS_STATUS_PSIK,FS_STATUS_PSIK2,FS_HUB_KELUARGA,FS_ST_FUNGSIONAL,FS_AGAMA,FS_NILAI_KHUSUS,FS_NILAI_KHUSUS2,FS_ANAMNESA,FS_PENGELIHATAN,
        FS_PENCIUMAN,FS_PENDENGARAN,FS_RIW_IMUNISASI,FS_RIW_IMUNISASI_KET,FS_RIW_TUMBUH,FS_RIW_TUMBUH_KET,FS_HIGH_RISK,FS_EDUKASI,mdb,mdd)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_kebidanan($params) {
        $sql = "INSERT INTO TAC_RJ_ASES_KEBID(FS_KD_REG, FS_NM_SUAMI, FS_TGL_LAHIR_SUAMI, FS_RIWAYAT_GYNEKOLOGI, FS_RIWAYAT_GYNEKOLOGI_KET, 
        FS_RIW_MENS_UMUR_MENARCHE, FS_RIW_MENS_LAMA_HAID, FS_RIW_MENS_GANTI_PEMBALUT, FS_RIW_MENS_HPM, FS_RIW_MENS_KELUHAN, 
        FS_RIW_MENS_KELUHAN_KET, FS_RIW_KB_METODE_1, FS_RIW_KB_METODE_LAMA_1, FS_RIW_KB_METODE_2, FS_RIW_KB_METODE_LAMA_2, 
        FS_RIW_KB_KOMPLIKASI, FS_RIW_KB_KOMPLIKASI_KET, FS_MASALAH_KEBIDANAN, FS_RENCANA_KEBIDANAN,G,P,A,FS_RIW_MENS_HPL,
        FS_KOMPLIKASI,FS_K1,FS_K4,FS_HB,FS_STATUS_TT,FS_BUKU_KIA,FS_HPHT,FS_UK,mdb,mdd)
        VALUES     (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_kebidanan2($params) {
        $sql = "INSERT INTO TAC_RJ_ASES_KEBID2(FS_KD_REG, FS_RIW_KEHAMILAN_THN_PARTUS, FS_RIW_KEHAMILAN_TMPT_PARTUS, FS_RIW_KEHAMILAN_UMUR_HAMIL, 
        FS_RIW_KEHAMILAN_JNS_PERSALINAN, FS_RIW_KEHAMILAN_PENOLONG_PERSALINAN, FS_RIW_KEHAMILAN_PENYULIT, FS_RIW_KEHAMILAN_JK, 
        FS_RIW_KEHAMILAN_KEADAAN_ANAK,mdb,mdd)
        VALUES     (?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_antenatal($params) {
        $sql = "INSERT INTO TAC_ASES_PER2(FS_KD_REG,FS_ANAMNESA,FS_USIA_KEHAMILAN
        ,FS_HMT,mdb,mdd) VALUES (?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }
    function insert_pemeriksaan_lab($params) {
        $sql = "INSERT INTO ta_trs_kartu_periksa4 (fs_kd_trs,fn_no_urut, fs_kd_tarif,fs_kd_reg2) VALUES (?, ?, ?, ?)";
        return $this->db->query($sql, $params);
    }
    function insert_pemeriksaan_rad($params) {
        $sql = "INSERT INTO ta_trs_kartu_periksa5 (fs_kd_trs,fn_no_urut, fs_kd_tarif, fs_kd_reg2) VALUES (?, ?, ?, ?)";
        return $this->db->query($sql, $params);
    }
    function insert_pemeriksaan_lab_skdp($params) {
        $sql = "INSERT INTO ta_trs_kartu_periksa4 (fn_no_urut, fs_kd_tarif,fs_kd_reg3) VALUES (?, ?, ?)";
        return $this->db->query($sql, $params);
    }
    function insert_pemeriksaan_rad_skdp($params) {
        $sql = "INSERT INTO ta_trs_kartu_periksa5 ( fn_no_urut, fs_kd_tarif, fs_kd_reg3) VALUES (?, ?, ?)";
        return $this->db->query($sql, $params);
    }
    
    function insert_fisio($params) {
        $sql = "INSERT INTO TAC_RJ_FISIO (FS_KD_REG, FS_NM_INSPEKSI, FS_NM_PALPASI, FS_NM_PEM_SPESIFIK, FS_NM_DIAG_FISIO,
        FS_NM_INTERVENSI_BPJS, mdb, mdd)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        return $this->db->query($sql, $params);
    }

    function insert_instruksi_medis($params) {
        $sql = "INSERT INTO TAC_HD_INSTRUKSI_MEDIS(FS_KD_REG,instruksi_hd_id,informed_concent_tgl,instruksi_tgl,instruksi_resepHD,instruksi_resepHD_TD,instruksi_resepHD_QB,instruksi_resepHD_QD,instruksi_resepHD_UFgoal,instruksi_profilling_Na,
        instruksi_profilling_NaStat,instruksi_profilling_UF,instruksi_dialisat_asetat,instruksi_dialisat_bicarbonat,instruksi_dialisat_conductivity,instruksi_dialisat_conductivity_text,instruksi_dialisat_temperatur,instruksi_dialisat_temperatur_text,
        instruksi_dosis_sirkulasi,instruksi_dosis_sirkulasi_text,instruksi_dosis_awal,instruksi_dosis_awal_text,instruksi_dosis_maintenance,instruksi_dosis_main,instruksi_dosis_main_continue_text,instruksi_dosis_main_intermitten_text,
        instruksi_LMWH,instruksi_LMWH_text,instruksi_tanpa_heparin,instruksi_tanpa_heparin_text,instruksi_program_bilas,instruksi_edukasi,instruksi_edukasi_text,instruksi_catatan_lain,
        mdb,mdd) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function update_ases($params) {
        $sql = "UPDATE TAC_ASES_PER2 SET FS_RIW_PENYAKIT_DAHULU=?, FS_RIW_PENYAKIT_DAHULU2=?, FS_RIW_PENYAKIT_KEL=?, FS_RIW_PENYAKIT_KEL2=?,
        FS_STATUS_PSIK=?,FS_STATUS_PSIK2=?,FS_HUB_KELUARGA=?,FS_ST_FUNGSIONAL=?,FS_AGAMA=?,FS_NILAI_KHUSUS=?,FS_NILAI_KHUSUS2=?,FS_ANAMNESA=?,
        FS_PENGELIHATAN=?, FS_PENCIUMAN=?,FS_PENDENGARAN=?,FS_RIW_IMUNISASI=?,FS_RIW_IMUNISASI_KET=?,FS_RIW_TUMBUH=?,FS_RIW_TUMBUH_KET=?, FS_HIGH_RISK=?, 
        FS_EDUKASI=?,mdb=?,mdd=?
        WHERE FS_KD_REG =?";
        return $this->db->query($sql, $params);
    }

    function update_kebidanan($params) {
        $sql = "UPDATE  TAC_RJ_ASES_KEBID SET FS_NM_SUAMI= ?, FS_TGL_LAHIR_SUAMI= ?, FS_RIWAYAT_GYNEKOLOGI= ?, FS_RIWAYAT_GYNEKOLOGI_KET= ?, 
        FS_RIW_MENS_UMUR_MENARCHE= ?, FS_RIW_MENS_LAMA_HAID= ?, FS_RIW_MENS_GANTI_PEMBALUT= ?, FS_RIW_MENS_HPM= ?, FS_RIW_MENS_KELUHAN= ?, 
        FS_RIW_MENS_KELUHAN_KET= ?, FS_RIW_KB_METODE_1= ?, FS_RIW_KB_METODE_LAMA_1= ?, FS_RIW_KB_METODE_2= ?, FS_RIW_KB_METODE_LAMA_2= ?, 
        FS_RIW_KB_KOMPLIKASI= ?, FS_RIW_KB_KOMPLIKASI_KET= ?, FS_MASALAH_KEBIDANAN= ?, FS_RENCANA_KEBIDANAN= ?,G= ?,P= ?,A= ?,FS_RIW_MENS_HPL= ? WHERE FS_KD_REG = ?
        ";
        return $this->db->query($sql, $params);
    }

    function update_kebidanan2($params) {
        $sql = "UPDATE TAC_RJ_ASES_KEBID2 SET FS_RIW_KEHAMILAN_THN_PARTUS = ?, FS_RIW_KEHAMILAN_TMPT_PARTUS = ?, FS_RIW_KEHAMILAN_UMUR_HAMIL = ?, 
        FS_RIW_KEHAMILAN_JNS_PERSALINAN = ?, FS_RIW_KEHAMILAN_PENOLONG_PERSALINAN = ?, FS_RIW_KEHAMILAN_PENYULIT = ?, FS_RIW_KEHAMILAN_JK = ?, 
        FS_RIW_KEHAMILAN_KEADAAN_ANAK = ? WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }

    function update($params) {
        $sql = "UPDATE TAC_RJ_STATUS SET FS_STATUS = ?, mdb = ?, mdd = ? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function update_vs($params) {
        $sql = "UPDATE TAC_RJ_VITAL_SIGN SET FS_SUHU = ?, FS_NADI =?, FS_R=?, FS_TD=?, FS_TB=?, FS_BB=?, mdb=?, mdd=? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }
    
    function update_vs_covid($params) {
        $sql = "UPDATE TAC_RJ_VITAL_SIGN SET FS_SUHU = ? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }
    
    function update_data_resep($params) {
        $sql = "UPDATE TA_TRS_KARTU_PERIKSA3 SET FS_KD_TRS = ? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }
    function update_data_resep2($params) {
        $sql = "UPDATE TA_TRS_KARTU_PERIKSA3 SET FS_KD_REG = '' WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }
    
    function update_fisio($params) {
        $sql = "UPDATE TAC_RJ_FISIO SET FS_NM_INSPEKSI = ?, FS_NM_PALPASI =?, FS_NM_PEM_SPESIFIK=?, FS_NM_DIAG_FISIO=?, FS_NM_INTERVENSI_BPJS=? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function update_nyeri($params) {
        $sql = "UPDATE TAC_RJ_NYERI SET FS_NYERIP = ?, FS_NYERIQ = ?, FS_NYERIR = ?, FS_NYERIS = ?, FS_NYERIT = ?, mdb = ?, mdd = ?,FS_NYERI=? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function update_jatuh($params) {
        $sql = "UPDATE TAC_RJ_JATUH SET FS_CARA_BERJALAN1 = ?, FS_CARA_BERJALAN2 = ?, FS_CARA_DUDUK = ?, mdd = ?, mdb=? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function update_alergi($params) {
        $sql = "UPDATE TAC_RJ_ALERGI SET FS_ALERGI = ?, FS_ALERGI2 = ?, FS_REAK_ALERGI = ?, mdb = ?, mdd=? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function update_nutrisi($params) {
        $sql = "UPDATE TAC_RJ_NUTRISI SET FS_NUTRISI1 = ?, FS_NUTRISI2 = ?,FS_NUTRISI_ANAK1=?,FS_NUTRISI_ANAK2=?,FS_NUTRISI_ANAK3=?,
        FS_NUTRISI_ANAK4=?,  mdb = ?, mdd=? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function update_tz_parameter_no_kp($params) {
        $sql = "UPDATE TZ_PARAMETER_NO SET FN_VALUE=? WHERE FS_KD_PARAMETER= 'NOKRTPRKSA'";
        return $this->db->query($sql, $params);
    }

    function update_level_medis($params) {
        $sql = "UPDATE TAC_RJ_STATUS SET FS_STATUS=? WHERE FS_KD_REG= ?";
        return $this->db->query($sql, $params);
    }

    function update_medis($params) {
        $sql = "UPDATE TA_TRS_KARTU_PERIKSA SET FS_ANAMNESA = ?, FS_DIAGNOSA=?, FS_TINDAKAN=?, 
        FS_CATATAN_FISIK =?,FS_KD_PETUGAS_MEDIS=?, FS_KD_TIPE_BARANG=?, FN_CETAK=? WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }

    function update_tac_rj_medis($params) {
        $sql = "UPDATE TAC_RJ_MEDIS SET FS_DIAGNOSA = ?, FS_ANAMNESA = ?, FS_TINDAKAN =?, FS_TERAPI=?, FS_CATATAN_FISIK=?, 
        FS_CARA_PULANG=?,FS_DAFTAR_MASALAH=?,FS_OBAT_PROLANIS=?,FS_TIME_OUT=?, FS_EDUKASI=?, mdb=?, mdd=?
        WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }

    function update_tac_rj_skdp($params) {
        $sql = "UPDATE TAC_RJ_SKDP SET FS_SKDP_1 = ?, FS_SKDP_2 = ?,FS_SKDP_KET=?,FS_SKDP_KONTROL=?
        WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function update_ases_antenatal($params) {
        $sql = "UPDATE TAC_ASES_PER2 SET FS_ANAMNESA = ?, FS_USIA_KEHAMILAN = ?,FS_HMT=?
        WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function update_high_risk($params) {
        $sql = "UPDATE TC_MR SET FS_HIGH_RISK = ?, FS_NM_SUAMI=? ,FS_TGL_LAHIR_SUAMI=?
        WHERE FS_MR = ?";
        return $this->db->query($sql, $params);
    }

    function update_high_risk2($params) {
        $sql = "UPDATE TC_MR SET FS_ALERGI=?, FS_HIGH_RISK = ?
        WHERE FS_MR = ?";
        return $this->db->query($sql, $params);
    }


    function update_instruksi_medis($params) {
        $sql = "UPDATE    TAC_HD_INSTRUKSI_MEDIS
        SET informed_concent_tgl = ?, instruksi_tgl = ?, instruksi_resepHD = ?, instruksi_resepHD_TD = ?, 
        instruksi_resepHD_QB = ?, instruksi_resepHD_QD = ?, instruksi_resepHD_UFgoal = ?, instruksi_profilling_Na = ?, instruksi_profilling_NaStat = ?, instruksi_profilling_UF = ?, 
        instruksi_dialisat_asetat =?, instruksi_dialisat_bicarbonat =?, instruksi_dialisat_conductivity =?, instruksi_dialisat_conductivity_text =?, instruksi_dialisat_temperatur = ?, 
        instruksi_dialisat_temperatur_text = ?, instruksi_dosis_sirkulasi = ?, instruksi_dosis_sirkulasi_text = ?, instruksi_dosis_awal = ?, instruksi_dosis_awal_text = ?, 
        instruksi_dosis_maintenance = ?, instruksi_dosis_main = ?, instruksi_dosis_main_continue_text = ?, instruksi_dosis_main_intermitten_text = ?, instruksi_LMWH = ?, 
        instruksi_LMWH_text =?, instruksi_tanpa_heparin =?, instruksi_tanpa_heparin_text =?, instruksi_program_bilas =?, instruksi_edukasi =?, instruksi_edukasi_text =?, 
        instruksi_catatan_lain =?  WHERE FS_KD_REG= ?";
        return $this->db->query($sql, $params);
    }

    function insert_monitoring_hd($params) {
        $sql = "INSERT INTO TAC_HD_TINDAKAN_MONITORING(FS_KD_REG,tindakan_anthd_jam,tindakan_anthd_qb,tindakan_anthd_vp,tindakan_anthd_tmp,tindakan_anthd_suhu,tindakan_anthd_td,tindakan_anthd_uf,
        tindakan_anthd_condk,tindakan_anthd_washout,tindakan_anthd_tranfusi,tindakan_anthd_makan,tindakan_anthd_urin,tindakan_anthd_muntah,tindakan_anthd_perdarahan,tindakan_anthd_keterangan,
        tindakan_anthd_nadi,mdb,mdd) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function delete_ases($params) {
        $sql = "DELETE TAC_ASES_PER2 
        WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function delete_masalah_kep($params) {
        $sql = "DELETE TAC_RJ_MASALAH_KEP 
        WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function delete_rencana_kep($params) {
        $sql = "DELETE TAC_RJ_REN_KEP 
        WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }
    
    function delete_intervensi_umum($params) {
        $sql = "DELETE TAC_RJ_FISIO4 
        WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }
    
    function delete_intervensi_bpjs($params) {
        $sql = "DELETE TAC_RJ_FISIO4BPJS 
        WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function delete_riw_kehamilan($params) {
        $sql = "DELETE TAC_RJ_ASES_KEBID2 
        WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }

    function delete_tindakan_monitoring($params) {
        $sql = "DELETE FROM TAC_HD_TINDAKAN_MONITORING WHERE FS_KD_HD_TINDAKAN_MONITORING = ?";
        return $this->db->query($sql, $params);
    }
    
    function delete_pemeriksaan_lab($params) {
        $sql = "DELETE FROM ta_trs_kartu_periksa4 WHERE FS_KD_REG2 = ?";
        return $this->db->query($sql, $params);
    }
    function delete_pemeriksaan_rad($params) {
        $sql = "DELETE FROM ta_trs_kartu_periksa5 WHERE FS_KD_REG2 = ?";
        return $this->db->query($sql, $params);
    }
    function delete_pemeriksaan_lab_skdp($params) {
        $sql = "DELETE FROM ta_trs_kartu_periksa4 WHERE FS_KD_REG3 = ?";
        return $this->db->query($sql, $params);
    }
    function delete_pemeriksaan_rad_skdp($params) {
        $sql = "DELETE FROM ta_trs_kartu_periksa5 WHERE FS_KD_REG3 = ?";
        return $this->db->query($sql, $params);
    }
    
    function delete_fisio1($params) {
        $sql = "DELETE FROM TAC_RJ_FISIO1 WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }
    
    function delete_fisio_pasif($params) {
        $sql = "DELETE FROM TAC_RJ_FISIO2 WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }
    
    function delete_fisio_isom($params) {
        $sql = "DELETE FROM TAC_RJ_FISIO3 WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }
    
    function delete_resep_process($params) {
        $sql = "DELETE FROM TA_TRS_KARTU_PERIKSA3 WHERE FS_KD_TRS2 = ?";
        return $this->db->query($sql, $params);
    }

    function cek_rawat_inap($params) {
        $sql = "SELECT FS_KD_REG FROM TAC_RI_MEDIS WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            return $result;
        } else {
            return 0;
        }
    }
    
    // get site data
    function get_layanan($params) {
        $sql = "SELECT a.FS_KD_LAYANAN,a.FS_NM_LAYANAN FROM
        TA_LAYANAN a
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
    
    function get_data_fisio_by_rg($params) {
        $sql = "SELECT * FROM
        TAC_RJ_FISIO
        WHERE FS_KD_REG =?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    function get_fisio1($params) {
        $sql = "SELECT * FROM
        TAC_RJ_FISIO1
        WHERE FS_KD_REG =?
        ORDER BY FS_KD_TRS DESC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function get_fisio_pasif($params) {
        $sql = "SELECT * FROM
        TAC_RJ_FISIO2
        WHERE FS_KD_REG =?
        ORDER BY FS_KD_TRS DESC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function get_fisio_isom($params) {
        $sql = "SELECT * FROM
        TAC_RJ_FISIO3
        WHERE FS_KD_REG =?
        ORDER BY FS_KD_TRS DESC";
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
        TAC_RJ_ASES_KEBID2
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
        TAC_RJ_ASES_KEBID2
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
        TAC_RJ_SKDP
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

    function get_dokter($params) {
        $sql = "SELECT a.FS_KD_PEG,a.FS_NM_PEG FROM
        TD_PEG a
        WHERE a.FS_KD_PEG LIKE 'S%' AND a.FB_AKTIF_DINAS = '1'
        ORDER BY a.FS_NM_PEG ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    function get_dokter_keb($params) {
        $sql = "SELECT a.FS_KD_PEG,a.FS_NM_PEG FROM
        TD_PEG a
        WHERE a.FS_KD_PEG LIKE 'S%' AND a.FB_AKTIF_DINAS = '1'
        AND FS_KD_SMF = '05'
        ORDER BY a.FS_NM_PEG ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function get_dokter_fis($params) {
        $sql = "SELECT a.FS_KD_PEG,a.FS_NM_PEG FROM
        TD_PEG a
        WHERE a.FS_KD_PEG LIKE 'S%' AND a.FB_AKTIF_DINAS = '1'
        AND FS_KD_SMF = '23'
        ORDER BY a.FS_NM_PEG ASC";
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
        TD_PEG a
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
        TD_PEG a
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
        $sql = "SELECT a.FS_KD_REG,b.FS_NM_PASIEN,c.FN_NO_URUT,a.FS_MR,b.FS_ALM_PASIEN,
        FS_STATUS,FS_TERAPI,e.FS_KD_TRS,e.FS_DIAGNOSA,e.FS_TINDAKAN,e.FS_CARA_PULANG,
        a.FS_KD_LAYANAN,a.FS_KD_LAYANAN2,a.FS_KD_LAYANAN3,d.FS_FORM,DATEDIFF(b.fd_tgl_lahir,NOW()) fn_umur,
        e.FS_KD_KP
        FROM TA_REGISTRASI a
        INNER JOIN TC_MR b ON a.FS_MR=b.FS_MR
        LEFT JOIN TA_TRS_ANTRIAN c ON a.FS_KD_REG = c.FS_KD_REG
        LEFT JOIN TAC_RJ_STATUS d ON a.FS_KD_REG = d.FS_KD_REG
        LEFT JOIN TAC_RJ_MEDIS e ON a.FS_KD_REG=e.FS_KD_REG
        WHERE a.FD_TGL_MASUK = ? AND a.FD_TGL_VOID = '3000-01-01'
        AND a.FS_KD_JENIS_REG <> '1' AND (a.FS_KD_MEDIS = ? OR FS_KD_MEDIS2 = ? OR FS_KD_MEDIS3=?)
        AND a.FS_KD_LAYANAN <> 'P023'
        ORDER BY FS_KD_LAYANAN DESC,c.FN_NO_URUT";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_px_by_dokter_wait_hd($params) {
        $sql = "SELECT a.FS_KD_REG,b.FS_NM_PASIEN,c.FN_NO_URUT,a.FS_MR,b.FS_ALM_PASIEN,
        FS_STATUS,FS_TERAPI,e.FS_KD_TRS,e.FS_DIAGNOSA,e.FS_TINDAKAN,e.FS_CARA_PULANG,
        a.FS_KD_LAYANAN,a.FS_KD_LAYANAN2,a.FS_KD_LAYANAN3,d.FS_FORM,ISNULL(datediff(year,b.fd_tgl_lahir,NOW()),0) fn_umur
        FROM TA_REGISTRASI a
        INNER JOIN TC_MR b ON a.FS_MR=b.FS_MR
        LEFT JOIN TA_TRS_ANTRIAN c ON a.FS_KD_REG = c.FS_KD_REG
        LEFT JOIN TAC_RJ_STATUS d ON a.FS_KD_REG = d.FS_KD_REG
        LEFT JOIN TAC_RJ_MEDIS e ON a.FS_KD_REG=e.FS_KD_REG
        WHERE a.FD_TGL_MASUK = ? AND a.FD_TGL_VOID = '3000-01-01'
        AND a.FS_KD_JENIS_REG <> '1'
        AND a.FS_KD_LAYANAN = 'P023'
        ORDER BY a.FS_JAM_MASUK,c.FN_NO_URUT";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_px_by_dokter_finish_perawat($params) {
        $sql = "SELECT a.FS_KD_REG,b.FS_NM_PASIEN,FN_NO_URUT,a.FS_MR,b.FS_ALM_PASIEN,
        FS_STATUS
        FROM TA_REGISTRASI a
        INNER JOIN TC_MR b ON a.FS_MR=b.FS_MR
        LEFT JOIN TA_TRS_ANTRIAN c ON a.FS_KD_REG = c.FS_KD_REG
        LEFT JOIN TAC_RJ_STATUS d ON a.FS_KD_REG = d.FS_KD_REG
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
        $sql = "SELECT a.FS_KD_REG,b.FS_NM_PASIEN,FN_NO_URUT,a.FS_MR,b.FS_ALM_PASIEN,
        FS_STATUS,FS_TERAPI,e.FS_KD_TRS,f.FS_NM_PEG,d.FS_FORM,e.FS_KD_KP,a.FS_KD_LAYANAN
        FROM TA_REGISTRASI a
        INNER JOIN TC_MR b ON a.FS_MR=b.FS_MR
        LEFT JOIN TA_TRS_ANTRIAN c ON a.FS_KD_REG = c.FS_KD_REG
        LEFT JOIN TAC_RJ_STATUS d ON a.FS_KD_REG = d.FS_KD_REG
        LEFT JOIN TAC_RJ_MEDIS e ON a.FS_KD_REG=e.FS_KD_REG
        LEFT JOIN TD_PEG f ON e.FS_KD_MEDIS=f.FS_KD_PEG
        WHERE a.FD_TGL_MASUK = ? AND a.FD_TGL_VOID = '3000-01-01'
        AND a.FS_KD_JENIS_REG <> '1' AND (a.FS_KD_MEDIS = ? OR FS_KD_MEDIS2 = ? OR FS_KD_MEDIS3 = ?)
        AND (a.FS_KD_LAYANAN <> 'P023' AND a.FS_KD_LAYANAN <> 'P015')
        ORDER BY a.FS_KD_LAYANAN DESC,c.FN_NO_URUT";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    function get_total_px($params) {
        $sql = "SELECT COUNT(*) TOTAL
        FROM TA_REGISTRASI a
        INNER JOIN TC_MR b ON a.FS_MR=b.FS_MR
        LEFT JOIN TA_TRS_ANTRIAN c ON a.FS_KD_REG = c.FS_KD_REG
        WHERE a.FD_TGL_MASUK = ? AND a.FD_TGL_VOID = '3000-01-01'
        AND a.FS_KD_JENIS_REG <> '1' AND (a.FS_KD_MEDIS = ? OR FS_KD_MEDIS2 = ? OR FS_KD_MEDIS3 = ?)
        AND (a.FS_KD_LAYANAN <> 'P023' AND a.FS_KD_LAYANAN <> 'P015')";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    function get_total_px_bpjs($params) {
        $sql = "SELECT COUNT(*) TOTAL
        FROM TA_REGISTRASI a
        INNER JOIN TC_MR b ON a.FS_MR=b.FS_MR
        LEFT JOIN TA_TRS_ANTRIAN c ON a.FS_KD_REG = c.FS_KD_REG
        WHERE a.FD_TGL_MASUK = ? AND a.FD_TGL_VOID = '3000-01-01'
        AND a.FS_KD_JENIS_REG <> '1' AND (a.FS_KD_MEDIS = ? OR FS_KD_MEDIS2 = ? OR FS_KD_MEDIS3 = ?)
        AND (a.FS_KD_LAYANAN <> 'P023' AND a.FS_KD_LAYANAN <> 'P015')
        AND (a.FS_KD_TIPE_JAMINAN = '95001' OR a.FS_KD_TIPE_JAMINAN = '96001')";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    function get_total_px_umum($params) {
        $sql = "SELECT COUNT(*) TOTAL
        FROM TA_REGISTRASI a
        INNER JOIN TC_MR b ON a.FS_MR=b.FS_MR
        LEFT JOIN TA_TRS_ANTRIAN c ON a.FS_KD_REG = c.FS_KD_REG
        WHERE a.FD_TGL_MASUK = ? AND a.FD_TGL_VOID = '3000-01-01'
        AND a.FS_KD_JENIS_REG <> '1' AND (a.FS_KD_MEDIS = ? OR FS_KD_MEDIS2 = ? OR FS_KD_MEDIS3 = ?)
        AND (a.FS_KD_LAYANAN <> 'P023' AND a.FS_KD_LAYANAN <> 'P015')
        AND (a.FS_KD_TIPE_JAMINAN = '00000')";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_px_by_dokter_wait_dokter_hd($params) {
        $sql = "SELECT a.FS_KD_REG,b.FS_NM_PASIEN,FN_NO_URUT,a.FS_MR,b.FS_ALM_PASIEN,
        FS_STATUS,FS_TERAPI,e.FS_KD_TRS,f.FS_NM_PEG,FS_CARA_PULANG,a.FS_KD_MEDIS
        FROM TA_REGISTRASI a
        INNER JOIN TC_MR b ON a.FS_MR=b.FS_MR
        LEFT JOIN TA_TRS_ANTRIAN c ON a.FS_KD_REG = c.FS_KD_REG
        LEFT JOIN TAC_RJ_STATUS d ON a.FS_KD_REG = d.FS_KD_REG
        LEFT JOIN TAC_RJ_MEDIS e ON a.FS_KD_REG=e.FS_KD_REG
        LEFT JOIN TD_PEG f ON e.FS_KD_MEDIS=f.FS_KD_PEG
        WHERE a.FD_TGL_MASUK = ? AND a.FD_TGL_VOID = '3000-01-01'
        AND a.FS_KD_JENIS_REG <> '1'
        AND a.FS_KD_LAYANAN = 'P023'
        ORDER BY a.FS_JAM_MASUK,c.FN_NO_URUT";
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
        FROM TA_REGISTRASI a
        INNER JOIN TC_MR b ON a.FS_MR=b.FS_MR
        LEFT JOIN TA_TRS_ANTRIAN c ON a.FS_KD_REG = c.FS_KD_REG
        LEFT JOIN TAC_RJ_STATUS d ON a.FS_KD_REG = d.FS_KD_REG
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
        $sql = "SELECT a.FS_KD_REG,b.FS_NM_PASIEN,FN_NO_URUT,a.FS_MR,b.FS_ALM_PASIEN,
        FS_STATUS,FS_TERAPI,f.FS_NM_PEG,e.FS_KD_TRS,e.FS_KD_MEDIS,e.FS_CARA_PULANG,e.FS_KD_KP
        FROM TA_REGISTRASI a
        INNER JOIN TC_MR b ON a.FS_MR=b.FS_MR
        LEFT JOIN TA_TRS_ANTRIAN c ON a.FS_KD_REG = c.FS_KD_REG
        LEFT JOIN TAC_RJ_STATUS d ON a.FS_KD_REG = d.FS_KD_REG
        LEFT JOIN TAC_RJ_MEDIS e ON a.FS_KD_REG=e.FS_KD_REG
        LEFT JOIN TD_PEG f ON e.FS_KD_MEDIS = f.FS_KD_PEG
        WHERE a.FS_KD_REG LIKE ? AND a.FD_TGL_VOID = '3000-01-01'
        AND a.FS_KD_JENIS_REG <> '1'";
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
        $sql = "SELECT TOP 30 a.FS_KD_REG,b.FS_NM_PASIEN,a.FS_MR,a.FD_TGL_MASUK,c.FS_NM_PEG
        ,a.FS_KD_JENIS_REG,d.FS_NM_LAYANAN,MAX_RG,g.FS_KD_MEDIS,i.FS_NM_PEG 'DOK2',
        g.FS_KD_TRS,k.FS_NM_LAYANAN 'LAYANAN2',a.FD_TGL_KELUAR,g.FS_CARA_PULANG,g.FS_TERAPI,FS_KD_KP
        FROM TA_REGISTRASI a
        INNER JOIN TC_MR b ON a.FS_MR=b.FS_MR
        LEFT JOIN TD_PEG c ON a.FS_KD_MEDIS = c.FS_KD_PEG
        LEFT JOIN TA_REGISTRASI h ON a.FS_KD_REG = h.FS_KD_REG
        LEFT JOIN TD_PEG i ON h.FS_KD_MEDIS2 = i.FS_KD_PEG
        LEFT JOIN TA_LAYANAN d ON a.FS_KD_LAYANAN = d.FS_KD_LAYANAN
        LEFT JOIN TA_LAYANAN k ON a.FS_KD_LAYANAN2 = k.FS_KD_LAYANAN
        LEFT JOIN (
        SELECT FS_KD_REG 'MAX_RG',FS_MR
        FROM TA_REGISTRASI 
        WHERE FD_TGL_MASUK = ? AND (FS_KD_MEDIS = ? OR FS_KD_MEDIS2 = ? OR FS_KD_MEDIS3 = ?)
        AND FD_TGL_VOID = '3000-01-01'
        )e ON a.FS_MR = e.FS_MR
        LEFT JOIN TAC_RJ_MEDIS g ON a.FS_KD_REG=g.FS_KD_REG
        WHERE a.FS_MR = ? AND a.FD_TGL_VOID = '3000-01-01'
        ORDER BY a.FD_TGL_MASUK DESC,a.FS_JAM_MASUK DESC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    function get_px_rawat_inap($params) {
        $sql = "SELECT c.FD_TGL_TRS,f.FS_KD_DIAGNOSA,b.FS_KD_REG,g.FS_KET_ICD,c.FS_NM_TARIF,
        b.FD_TGL_KELUAR
        FROM TC_MR a
        LEFT JOIN TA_REGISTRASI b ON a.FS_MR=b.FS_MR
        LEFT JOIN (
        SELECT cc.FS_NM_TARIF,aa.FS_KD_REG,aa.FD_TGL_TRS 
        FROM TA_TRS_TDK_UMUM aa
        LEFT JOIN TA_TRS_TDK_UMUM2 bb ON aa.FS_KD_TRS=bb.FS_KD_TRS
        LEFT JOIN TA_TARIF cc ON bb.FS_KD_TARIF=cc.FS_KD_TARIF
        WHERE aa.FS_KD_LAYANAN = 'P002'
        ) c ON b.FS_KD_REG=c.FS_KD_REG
        LEFT JOIN TC_MR2 f ON b.FS_KD_REG=f.FS_KD_REG
        LEFT JOIN TC_ICD g ON f.FS_KD_DIAGNOSA=g.FS_KD_ICD
        WHERE b.FS_MR = ? AND FS_KD_JENIS_REG = '1'  AND f.FB_UTAMA = 1";
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
        $sql = "SELECT TOP 50 a.FS_KD_REG,b.FS_NM_PASIEN,a.FS_MR,a.FD_TGL_MASUK,c.FS_NM_PEG
        ,a.FS_KD_JENIS_REG,d.FS_NM_LAYANAN,MAX_RG,f.FS_STATUS,g.FS_KD_REG 'FS_KD_REG_NURSE' ,i.FS_NM_PEG 'DOK2',
        g.FS_KD_TRS,k.FS_NM_LAYANAN 'LAYANAN2',a.FD_TGL_KELUAR
        FROM TA_REGISTRASI a
        INNER JOIN TC_MR b ON a.FS_MR=b.FS_MR
        LEFT JOIN TD_PEG c ON a.FS_KD_MEDIS = c.FS_KD_PEG
        LEFT JOIN TA_REGISTRASI h ON a.FS_KD_REG = h.FS_KD_REG
        LEFT JOIN TD_PEG i ON h.FS_KD_MEDIS2 = i.FS_KD_PEG
        LEFT JOIN TA_LAYANAN d ON a.FS_KD_LAYANAN = d.FS_KD_LAYANAN
        LEFT JOIN TA_LAYANAN k ON a.FS_KD_LAYANAN2 = k.FS_KD_LAYANAN
        LEFT JOIN (
        SELECT FS_KD_REG 'MAX_RG',FS_MR
        FROM TA_REGISTRASI 
        WHERE FD_TGL_MASUK = ? 
        )e ON a.FS_MR = e.FS_MR
        LEFT JOIN TAC_RJ_STATUS f ON a.FS_KD_REG=f.FS_KD_REG
        LEFT JOIN TAC_RJ_STATUS g ON a.FS_KD_REG=g.FS_KD_REG
        WHERE a.FS_MR = ? AND a.FD_TGL_VOID = '3000-01-01'
        ORDER BY a.FD_TGL_MASUK DESC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_px_history2($params) {
        $sql = "SELECT a.FS_KD_REG,b.FS_NM_PASIEN,a.FS_MR,a.FD_TGL_MASUK,c.FS_NM_PEG
        ,a.FS_KD_JENIS_REG,d.FS_NM_LAYANAN,f.FS_STATUS,g.FS_KD_TRS
        FROM TA_REGISTRASI a
        INNER JOIN TC_MR b ON a.FS_MR=b.FS_MR
        LEFT JOIN TD_PEG c ON a.FS_KD_MEDIS = c.FS_KD_PEG
        LEFT JOIN TA_LAYANAN d ON a.FS_KD_LAYANAN = d.FS_KD_LAYANAN
        LEFT JOIN TAC_RJ_STATUS f ON a.FS_KD_REG=f.FS_KD_REG
        INNER JOIN TAC_RJ_MEDIS g ON a.FS_KD_REG=g.FS_KD_REG
        WHERE a.FS_MR LIKE ? AND a.FD_TGL_VOID = '3000-01-01' AND a.FS_KD_JENIS_REG <> '1'
        ORDER BY a.FD_TGL_MASUK DESC";
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
        $sql = "SELECT a.FS_NM_PASIEN,a.FS_MR,a.FS_ALM_PASIEN,FS_JNS_KELAMIN,
        ISNULL(datediff(year,a.fd_tgl_lahir,?),0) fn_umur,a.FD_TGL_LAHIR
        FROM TC_MR a
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

    function get_px_by_dokter_by_rg($params) {
        $sql = "SELECT a.FS_NM_PASIEN,a.FS_MR,a.FS_ALM_PASIEN,FS_JNS_KELAMIN,
        ISNULL(datediff(year,a.fd_tgl_lahir,?),0) fn_umur,b.FS_KD_REG,
        d.FS_NM_JAMINAN,e.FS_NM_PEG,a.FD_TGL_LAHIR,b.FD_TGL_MASUK,FS_NM_LAYANAN,b.FS_KD_LAYANAN,
        b.FS_KD_MEDIS,e.FS_NO_IJIN_PRAKTEK,RIGHT(a.FS_MR,8) 'MR',g.FS_TB,g.FS_BB
        FROM TC_MR a
        LEFT JOIN TA_REGISTRASI b ON a.FS_MR=b.FS_MR
        LEFT JOIN TA_TIPE_JAMINAN c ON b.FS_KD_TIPE_JAMINAN=c.FS_KD_TIPE_JAMINAN
        LEFT JOIN TA_JAMINAN d ON c.FS_KD_JAMINAN=d.FS_KD_JAMINAN
        LEFT JOIN TD_PEG e ON b.FS_KD_MEDIS=e.FS_KD_PEG
        LEFT JOIN TA_LAYANAN f ON b.FS_KD_LAYANAN=f.FS_KD_LAYANAN
        LEFT JOIN TAC_RJ_VITAL_SIGN g ON b.FS_KD_REG=g.FS_KD_REG
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
        $sql = "SELECT b.FS_NO_PESERTA,a.FS_NM_PASIEN,a.FS_MR,a.FS_ALM_PASIEN,FS_JNS_KELAMIN,
        ISNULL(datediff(year,a.fd_tgl_lahir,?),0) fn_umur,b.FS_KD_REG,
        d.FS_NM_JAMINAN,e.FS_NM_PEG,a.FD_TGL_LAHIR,b.FD_TGL_MASUK,FS_NM_LAYANAN,b.FS_KD_LAYANAN,
        b.FS_KD_LAYANAN2,b.FS_KD_LAYANAN3,b.FS_KD_MEDIS,e.FS_NO_IJIN_PRAKTEK,RIGHT(a.FS_MR,8) 'MR',g.FS_TB,g.FS_BB,h.FS_NM_PEG 'DOK2',
        i.FS_KD_TRS,a.FS_TEMP_LAHIR,b.FS_NO_SJP,a.FS_HIGH_RISK,i.mdd,a.FS_ALERGI,f.FS_KD_LAYANAN_BPJS,a.FS_NM_SUAMI,a.FS_TGL_LAHIR_SUAMI
        ,b.FS_NO_SJP,b.FS_KD_TIPE_JAMINAN,k.FS_KD_TRS AS 'FS_KD_TRS_KP',a.FS_REAK_ALERGI
        FROM TC_MR a
        LEFT JOIN TA_REGISTRASI b ON a.FS_MR=b.FS_MR
        LEFT JOIN TA_TIPE_JAMINAN c ON b.FS_KD_TIPE_JAMINAN=c.FS_KD_TIPE_JAMINAN
        LEFT JOIN TA_JAMINAN d ON c.FS_KD_JAMINAN=d.FS_KD_JAMINAN
        LEFT JOIN TD_PEG e ON b.FS_KD_MEDIS=e.FS_KD_PEG
        LEFT JOIN TD_PEG h ON b.FS_KD_MEDIS2=h.FS_KD_PEG
        LEFT JOIN TA_LAYANAN f ON b.FS_KD_LAYANAN=f.FS_KD_LAYANAN
        LEFT JOIN TAC_RJ_VITAL_SIGN g ON b.FS_KD_REG=g.FS_KD_REG
        LEFT JOIN TAC_RJ_MEDIS i ON b.FS_KD_REG=i.FS_KD_REG
        LEFT JOIN TAC_RJ_ALERGI j ON b.FS_KD_REG=j.FS_KD_REG
        LEFT JOIN TA_TRS_KARTU_PERIKSA k ON b.FS_KD_REG=k.FS_KD_REG
        WHERE b.FS_KD_REG = ?";
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
        $sql = "SELECT a.*,c.FS_NM_PEG,b.user_name
        FROM TAC_RJ_VITAL_SIGN a
        LEFT JOIN TAC_COM_USER b ON a.mdb=b.user_id
        LEFT JOIN TD_PEG c ON b.user_name=c.FS_KD_PEG
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
    function get_data_gizi_by_rg($params) {
        $sql = "SELECT a.*,b.FS_NM_PEG
        FROM TAC_RJ_GIZI a
        LEFT JOIN TD_PEG b ON a.mdb=b.FS_KD_PEG
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
        FROM TA_REGISTRASI
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
        FROM TAC_RJ_NYERI
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
        FROM TAC_RJ_ALERGI
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
        FROM TAC_RJ_NUTRISI
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
        FROM TAC_RJ_ASES_KEBID
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
        FROM TAC_RJ_MASALAH_KEP a 
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

    function get_data_jatuh_by_rg($params) {
        $sql = "SELECT *
        FROM TAC_RJ_JATUH
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
        FROM TAC_ASES_PER2
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
        FROM TAC_RJ_ASES_KEBID
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
        FROM TAC_RJ_MEDIS a
        LEFT JOIN TAC_COM_USER b ON a.mdb=b.user_id
        LEFT JOIN TD_PEG c ON b.user_name=c.FS_KD_PEG
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
        FROM TAC_RJ_MEDIS a
        LEFT JOIN TAC_COM_USER b ON a.mdb=b.user_id
        LEFT JOIN TD_PEG c ON b.user_name=c.FS_KD_PEG
        LEFT JOIN TA_TRS_SEP d ON a.FS_KD_REG = d.FS_KD_REG
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
        $sql = "SELECT a.*,c.FS_NM_PEG,c.FS_NO_IJIN_PRAKTEK,d.FD_TGL_RUJUKAN,e.*
        FROM TAC_RJ_MEDIS a
        LEFT JOIN TD_PEG c ON a.FS_KD_MEDIS=c.FS_KD_PEG
        LEFT JOIN TA_TRS_SEP d ON a.FS_KD_REG = d.FS_KD_REG
        LEFT JOIN TAC_HD_INSTRUKSI_MEDIS e ON a.FS_KD_REG=e.FS_KD_REG
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
        FROM TAC_HD_INSTRUKSI_MEDIS
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
        FROM TAC_RJ_SKDP a
        LEFT JOIN TAC_COM_PARAMETER_SKDP_ALASAN b ON a.FS_SKDP_1=b.FS_KD_TRS
        LEFT JOIN TAC_COM_PARAMETER_SKDP_RENCANA c ON a.FS_SKDP_2=c.FS_KD_TRS
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
    function get_data_rujukan_by_rg($params) {
        $sql = "SELECT *
        FROM TAC_RJ_RUJUKAN
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

    function get_data_prb_by_rg($params) {
        $sql = "SELECT FS_PROVIDER,FD_TGL_RUJUKAN
        FROM TA_TRS_SEP
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
        $sql = "SELECT b.FS_KD_BARANG,b.FS_KD_TRS2,FS_NM_BARANG,FN_QTY_BARANG,FS_NM_SATUAN,FS_NM_CARAPAKAI_ETIKET,FS_ETIKET_QTY, 
        FS_ETIKET_HARI,FS_NM_CARAPAKAI_ETIKET,FS_NM_SATUANPAKAI_ETIKET,FS_ETIKET_CATATAN,FS_ETIKET,FS_KD_SATUAN 
        FROM TB_TRS_DOBILL_UMUM a
        LEFT JOIN TB_TRS_DOBILL_UMUM2 b ON a.FS_KD_TRS=b.FS_KD_TRS 
        LEFT JOIN TB_CARAPAKAI_ETIKET c ON b.FS_ETIKET_KD_PAKAI=c.FS_KD_CARAPAKAI_ETIKET 
        LEFT JOIN TB_SATUANPAKAI_ETIKET d ON b.FS_ETIKET_KD_SATUAN_PAKAI=d.FS_KD_SATUANPAKAI_ETIKET 
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
    
    function get_data_terapi_baru_by_rg($params) {
        $sql = "SELECT *
        FROM TA_TRS_KARTU_PERIKSA3 
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

    function get_data_terapi_baru_by_rg_edit($params) {
        $sql = "SELECT *
        FROM TA_TRS_KARTU_PERIKSA a
        LEFT JOIN TA_TRS_KARTU_PERIKSA3 b ON a.FS_KD_TRS=b.FS_KD_TRS
        WHERE a.FS_KD_TRS = ? and a.FD_TGL_VOID = '3000-01-01'";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function get_data_terapi_baru_edit_by_rg($params) {
        $sql = "SELECT *
        FROM TA_TRS_KARTU_PERIKSA3 
        WHERE FS_KD_TRS = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function get_data_terapi_by_trs2($params) {
        $sql = "SELECT FS_KD_BARANG,FS_NM_BARANG,FN_QTY_BARANG,FS_KD_SATUAN,FS_ETIKET_QTY, FS_ETIKET_HARI
        FROM TB_TRS_DOBILL_UMUM a
        LEFT JOIN TB_TRS_DOBILL_UMUM2 b ON a.FS_KD_TRS=b.FS_KD_TRS 
        WHERE b.FS_KD_TRS2 = ? AND FS_JAM_VOID <> '3000-01-01'
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

    function get_data_cek_resep_kp($params) {
        $sql = "SELECT FS_KD_BARANG,FS_NM_BARANG,FN_QTY_BARANG,FS_KD_SATUAN,
        FN_ETIKET_QTY,FN_ETIKET_HARI,FS_ETIKET_CATATAN,FS_UDD_WAKTU
        FROM TA_TRS_KARTU_PERIKSA a
        INNER JOIN TA_TRS_KARTU_PERIKSA3 b ON a.FS_KD_TRS=b.FS_KD_TRS
        WHERE a.FS_KD_TRS = ? AND a.FD_TGL_VOID = '3000-01-01'";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    
    function get_data_cek_resep($params) {
        $sql = "SELECT FS_NM_BARANG,FN_QTY_BARANG,FS_NM_SATUAN,FS_NM_CARAPAKAI_ETIKET,FS_ETIKET_QTY, 
        FS_ETIKET_HARI,FS_NM_CARAPAKAI_ETIKET,FS_NM_SATUANPAKAI_ETIKET,FS_ETIKET_CATATAN,FS_ETIKET 
        FROM TB_TRS_DOBILL_UMUM a
        LEFT JOIN TB_TRS_DOBILL_UMUM2 b ON a.FS_KD_TRS=b.FS_KD_TRS 
        LEFT JOIN TB_CARAPAKAI_ETIKET c ON b.FS_ETIKET_KD_PAKAI=c.FS_KD_CARAPAKAI_ETIKET 
        LEFT JOIN TB_SATUANPAKAI_ETIKET d ON b.FS_ETIKET_KD_SATUAN_PAKAI=d.FS_KD_SATUANPAKAI_ETIKET 
        WHERE a.FS_KD_REG = ? AND (a.FS_KD_LAYANAN = 'O004' OR a.FS_KD_LAYANAN = 'O005') AND FS_JAM_VOID <> '3000-01-01'
        ORDER BY FN_NO_URUT";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    

    function get_data_rujukan_lab($params) {
        $sql = "SELECT   TOP 1  fs_ket_normal, fn_umur_bawah, fn_umur_atas, fs_ket_umur, fs_sex 
        FROM ta_jenis_pemeriksaan_dtl 
        WHERE fs_kd_jenis_pemeriksaan = ?
        AND fs_ket_umur IN('TAHUN') and FS_SEX = ? and FN_UMUR_BAWAH <= ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    function get_data_lab_by_rg($params) {
        $sql = " select     aa.fs_kd_trs, aa.fd_tgl_trs,aa.fs_jam_trs , cc.FS_NM_TARIF, bb.fs_kd_jenis_pemeriksaan, dd.fs_nm_jenis_pemeriksaan, 
        dd.FS_SATUAN , bb.FS_HASIL, bb.FS_KETERANGAN, bb.fb_verifikasi_jenis 
        from       TA_TRS_TDK_UMUM aa 
        inner join TA_TRS_TDK_UMUM5 bb on aa.fs_kd_trs = bb.FS_KD_TRS 
        and bb.FS_HASIL <> '' and bb.FS_HASIL <> 'HASIL MENYUSUL' 
        left join  TA_TARIF cc on bb.FS_KD_TARIF = cc.FS_KD_TARIF 
        left join  TA_JENIS_PEMERIKSAAN dd on bb.FS_KD_JENIS_PEMERIKSAAN = dd.fs_kd_jenis_pemeriksaan 
        where      aa.fd_tgl_void = '3000-01-01' 
        AND aa.fs_kd_reg = ? order by aa.fs_kd_trs DESC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_data_lab_resume_by_rg($params) {
        $sql = " select cc.FS_NM_TARIF 
        from       TA_TRS_TDK_UMUM aa 
        inner join TA_TRS_TDK_UMUM5 bb on aa.fs_kd_trs = bb.FS_KD_TRS 
        and bb.FS_HASIL <> '' and bb.FS_HASIL <> 'HASIL MENYUSUL' 
        left join  TA_TARIF cc on bb.FS_KD_TARIF = cc.FS_KD_TARIF 
        left join  TA_JENIS_PEMERIKSAAN dd on bb.FS_KD_JENIS_PEMERIKSAAN = dd.fs_kd_jenis_pemeriksaan 
        where      aa.fd_tgl_void = '3000-01-01' 
        AND aa.fs_kd_reg = ? GROUP BY cc.FS_NM_TARIF";
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
        $sql = " select     aa.fs_kd_trs, aa.fd_tgl_trs, cc.FS_NM_TARIF, bb.fs_kd_jenis_pemeriksaan, dd.fs_nm_jenis_pemeriksaan, 
        dd.FS_SATUAN , bb.FS_HASIL, bb.FS_KETERANGAN, bb.fb_verifikasi_jenis 
        from       TA_TRS_TDK_UMUM aa 
        inner join TA_TRS_TDK_UMUM5 bb on aa.fs_kd_trs = bb.FS_KD_TRS 
        and bb.FS_HASIL <> '' and bb.FS_HASIL <> 'HASIL MENYUSUL' 
        left join  TA_TARIF cc on bb.FS_KD_TARIF = cc.FS_KD_TARIF 
        left join  TA_JENIS_PEMERIKSAAN dd on bb.FS_KD_JENIS_PEMERIKSAAN = dd.fs_kd_jenis_pemeriksaan 
        where      aa.fd_tgl_void = '3000-01-01' 
        AND aa.fs_kd_reg = ? order by aa.fs_kd_trs ";
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
        $sql = "  select     aa.fs_kd_trs, bb.fd_tgl_keterangan, bb.fs_jam_keterangan, cc.FS_NM_TARIF, bb.fs_keterangan 
        from       TA_TRS_TDK_UMUM aa 
        left join  TA_TRS_TDK_UMUM2 bb on aa.fs_kd_trs = bb.fs_kd_trs and fs_keterangan <> '' 
        left join  TA_TARIF cc on bb.fs_kd_tarif = cc.fs_kd_tarif 
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

    function get_data_rad_resume_by_rg($params) {
        $sql = "  select    cc.FS_NM_TARIF
        from       TA_TRS_TDK_UMUM aa 
        left join  TA_TRS_TDK_UMUM2 bb on aa.fs_kd_trs = bb.fs_kd_trs and fs_keterangan <> '' 
        left join  TA_TARIF cc on bb.fs_kd_tarif = cc.fs_kd_tarif 
        where      aa.fd_tgl_void = '3000-01-01' and bb.fb_void = 0 
        AND aa.fs_kd_reg = ? order by cc.FS_NM_TARIF ";
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
        $sql = "  select     aa.fs_kd_trs, bb.fd_tgl_keterangan, bb.fs_jam_keterangan, cc.FS_NM_TARIF, bb.fs_keterangan 
        from       TA_TRS_TDK_UMUM aa 
        left join  TA_TRS_TDK_UMUM2 bb on aa.fs_kd_trs = bb.fs_kd_trs and fs_keterangan <> '' 
        left join  TA_TARIF cc on bb.fs_kd_tarif = cc.fs_kd_tarif 
        where      aa.fd_tgl_void = '3000-01-01' and bb.fb_void = 0 
        AND aa.fs_kd_reg = ? order by bb.fs_kd_trs2 ";
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
        $sql = "SELECT RIGHT(FN_VALUE+100000000,7)'KP'  FROM   tz_parameter_no  WHERE  fs_kd_parameter= 'NOKRTPRKSA'";
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
        $sql = "SELECT FS_KD_REG  FROM TAC_RJ_MEDIS WHERE FS_KD_REG= ?";
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
        $sql = "SELECT *  FROM TAC_COM_PARAMETER_SKDP_ALASAN";
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
        $sql = "SELECT * FROM TAC_COM_PARAMETER_SKDP_RENCANA WHERE FS_KD_TRS_SKDP_ALASAN = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function list_masalah_kep($params) {
        $sql = "SELECT * FROM TAC_COM_DAFTAR_DIAG";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function list_intervensi_umum($params) {
        $sql = "SELECT * FROM TAC_COM_FIS_MASTER_UMUM";
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
        $sql = "SELECT * FROM TAC_COM_PARAM_REN_KEP";
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
        $sql = "SELECT * FROM TAC_RJ_MASALAH_KEP WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    function list_intervensi_umum_by_rg($params) {
        $sql = "SELECT * FROM TAC_RJ_FISIO4 WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    function list_intervensi_bpjs_by_rg($params) {
        $sql = "SELECT * FROM TAC_RJ_FISIO4BPJS WHERE FS_KD_REG = ?";
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
        $sql = "SELECT * FROM TAC_RJ_REN_KEP WHERE FS_KD_REG = ?";
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
        $sql = "SELECT * FROM TA_TARIF 
        WHERE FS_KD_REKAP_CETAK_TARIF = '08' AND FB_AKTIF='1'
        ORDER BY FS_NM_TARIF ASC";
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
        $sql = "SELECT  a.FS_KD_TARIF,FS_NM_TARIF FROM 
        TA_TARIF a
        LEFT JOIN TA_TRS_KARTU_PERIKSA4 b ON a.FS_KD_TARIF=b.FS_KD_TARIF
        LEFT JOIN TA_TRS_KARTU_PERIKSA c ON b.FS_KD_TRS=c.FS_KD_TRS 
        WHERE FS_KD_REKAP_CETAK_TARIF = '08' AND FB_AKTIF='1' AND FS_KD_REG2 = ?
        ORDER BY FS_NM_TARIF ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    function list_pemeriksaan_rad_by_rg($params) {
        $sql = "SELECT  a.FS_KD_TARIF,FS_NM_TARIF FROM 
        TA_TARIF a
        LEFT JOIN TA_TRS_KARTU_PERIKSA5 b ON a.FS_KD_TARIF=b.FS_KD_TARIF
        LEFT JOIN TA_TRS_KARTU_PERIKSA c ON b.FS_KD_TRS=c.FS_KD_TRS 
        WHERE FS_KD_REKAP_CETAK_TARIF = '09' AND FB_AKTIF='1' AND FS_KD_REG2 = ?
        ORDER BY FS_NM_TARIF ASC";
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
        $sql = "SELECT  a.FS_KD_TARIF,FS_NM_TARIF FROM 
        TA_TARIF a
        LEFT JOIN TA_TRS_KARTU_PERIKSA4 b ON a.FS_KD_TARIF=b.FS_KD_TARIF
        LEFT JOIN TA_TRS_KARTU_PERIKSA c ON b.FS_KD_TRS=c.FS_KD_TRS 
        WHERE FS_KD_REKAP_CETAK_TARIF = '08' AND FB_AKTIF='1' AND FS_KD_REG3 = ?
        ORDER BY FS_NM_TARIF ASC";
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
        $sql = "SELECT  a.FS_KD_TARIF,FS_NM_TARIF FROM 
        TA_TARIF a
        LEFT JOIN TA_TRS_KARTU_PERIKSA5 b ON a.FS_KD_TARIF=b.FS_KD_TARIF
        LEFT JOIN TA_TRS_KARTU_PERIKSA c ON b.FS_KD_TRS=c.FS_KD_TRS 
        WHERE FS_KD_REKAP_CETAK_TARIF = '09' AND FB_AKTIF='1' AND FS_KD_REG3 = ?
        ORDER BY FS_NM_TARIF ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function list_pemeriksaan_rad($params) {
        $sql = "SELECT * FROM TA_TARIF 
        WHERE FS_KD_REKAP_CETAK_TARIF = '09' AND FB_AKTIF='1'
        ORDER BY FS_NM_TARIF ASC";
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
        $sql = "SELECT * FROM TAC_HD_TINDAKAN_MONITORING WHERE FS_KD_REG = ?";
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
        $sql = "SELECT * FROM TAC_RM_BERKAS WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_header1() {
        $sql = "SELECT pref_value FROM tac_com_preferences WHERE pref_group = 'header' AND pref_nm='header1'";
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
        $sql = "SELECT pref_value FROM tac_com_preferences WHERE pref_group = 'header' AND pref_nm='header2'";
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
        $sql = "SELECT pref_value FROM tac_com_preferences WHERE pref_group = 'header' AND pref_nm='alamat'";
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
        $sql = "SELECT MAX(FS_KD_ANTRIAN) 'ANTRIAN' FROM TAC_RJ_ANTRIAN_OBAT WHERE FD_TGL_ANTRIAN = ?";
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
        $sql = "SELECT MAX(FS_NO_SKDP) 'NOSKDP' FROM TAC_RJ_SKDP WHERE MONTH(mdd) = ? AND YEAR(mdd) = ?";
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
        $sql = "SELECT * FROM TAC_RJ_ANTRIAN_OBAT WHERE FS_KD_RJ_MEDIS = ?";
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
        $sql = "SELECT * FROM TAC_RJ_STATUS WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    function cek_resep_by_rg($params) {
        $sql = "SELECT * FROM TAC_RJ_RESEP WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    
    function get_px_rj($params) {
        $sql = "SELECT aa.fs_kd_reg, fd_tgl_masuk, right(aa.fs_mr,8)MR, LEFT(fs_nm_pasien,25) fs_nm_pasien,LEFT(cc.fs_nm_layanan,24) fs_nm_layanan, dd.fs_nm_tipe_jaminan fs_nm_jaminan  
        FROM       ta_registrasi aa
        INNER JOIN tc_mr bb ON aa.fs_mr=bb.fs_mr  
        INNER JOIN ta_layanan cc ON aa.fs_kd_layanan=cc.fs_kd_layanan  
        LEFT JOIN  ta_tipe_jaminan dd ON aa.fs_kd_tipe_jaminan = dd.fs_kd_tipe_jaminan
        LEFT JOIN TAC_RJ_STATUS ee ON aa.fs_kd_reg=ee.fs_kd_reg
        WHERE      fd_tgl_void   = '3000-01-01'    AND      fd_tgl_keluar = '3000-01-01'    
        AND      aa.fs_kd_jenis_inap = ' '    AND      bb.fs_mr like '3471041%'
        AND (aa.fs_kd_jenis_reg = '0' OR aa.fs_kd_jenis_reg = '3') AND ee.fs_status = '2'";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    function get_resume_rawat_jalan($params) {
        $sql = "SELECT mdd,FS_NM_PEG,a.FS_DIAGNOSA,a.FS_TERAPI,a.FS_ANAMNESA
        FROM TAC_RJ_MEDIS a
        LEFT JOIN TA_REGISTRASI b ON a.FS_KD_REG=b.FS_KD_REG
        LEFT JOIN TD_PEG c ON a.FS_KD_MEDIS=c.FS_KD_PEG
        WHERE b.FS_MR = ?
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
    function get_resep($params) {
        $sql = "SELECT DISTINCT a.FS_KD_BARANG,FS_NM_BARANG 
        FROM TB_BARANG a
        LEFT JOIN tb_stok b ON  a.fs_kd_barang = b.fs_kd_barang    
        WHERE FB_AKTIF = '1' AND FS_KD_GRUP_REK = '001' AND b.fs_kd_layanan IN('O020', 'O004')
        ORDER BY FS_NM_BARANG ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    
    function get_sat_barang($params) {
        $sql = "SELECT FS_KD_SAT_JUAL,FS_NM_BARANG
        FROM TB_BARANG 
        WHERE FS_KD_BARANG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function get_px_rj_by_rg($params) {
        $sql = "SELECT     fs_alm_pasien,aa.fs_kd_reg, fd_tgl_masuk, right(aa.fs_mr,8)MR,aa.fs_mr, LEFT(fs_nm_pasien,25) fs_nm_pasien,
        LEFT(cc.fs_nm_layanan,24) fs_nm_layanan, ISNULL(dd.fs_nm_tipe_jaminan, ' ') fs_nm_jaminan,FS_NM_PEG,
        ff.FN_NO_URUT,bb.FD_TGL_LAHIR    
        FROM       ta_registrasi aa with (NOLOCK)  
        INNER JOIN tc_mr bb      with (NOLOCK) ON aa.fs_mr=bb.fs_mr  
        INNER JOIN ta_layanan cc ON aa.fs_kd_layanan=cc.fs_kd_layanan  
        LEFT JOIN  ta_tipe_jaminan dd ON aa.fs_kd_tipe_jaminan = dd.fs_kd_tipe_jaminan
        LEFT JOIN TD_PEG ee ON aa.FS_KD_MEDIS=ee.FS_KD_PEG
        LEFT JOIN TA_TRS_ANTRIAN ff ON aa.FS_KD_REG=ff.FS_KD_REG  
        WHERE      aa.fd_tgl_void   = '3000-01-01'    AND      aa.fd_tgl_keluar = '3000-01-01'    
        AND      aa.fs_kd_jenis_inap = ' '    AND      bb.fs_mr like '3471041%'
        AND aa.fs_kd_reg = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    
    function get_resep_medis($params) {
        $sql = "SELECT *
        FROM TA_TRS_KARTU_PERIKSA3
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

    function get_data_order_lab_by_rg2($params) {
        $sql = "SELECT FS_NM_TARIF
        FROM TA_TRS_KARTU_PERIKSA4 a
        LEFT JOIN TA_TARIF b ON a.FS_KD_TARIF=b.FS_KD_TARIF
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
    function cek_data_order_lab_by_rg2($params) {
        $sql = "SELECT FS_KD_REG2
        FROM TA_TRS_KARTU_PERIKSA4 a
        LEFT JOIN TA_TARIF b ON a.FS_KD_TARIF=b.FS_KD_TARIF
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
    function get_data_order_rad_by_rg2($params) {
        $sql = "SELECT FS_NM_TARIF
        FROM TA_TRS_KARTU_PERIKSA5 a
        LEFT JOIN TA_TARIF b ON a.FS_KD_TARIF=b.FS_KD_TARIF
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
    function cek_data_order_rad_by_rg2($params) {
        $sql = "SELECT FS_KD_REG2
        FROM TA_TRS_KARTU_PERIKSA5 a
        LEFT JOIN TA_TARIF b ON a.FS_KD_TARIF=b.FS_KD_TARIF
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
    function get_cek_lab_skdp($params) {
        $sql = "SELECT * FROM
        TA_TRS_KARTU_PERIKSA4
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
        TA_TRS_KARTU_PERIKSA5
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
    function get_cek_ases_inap_medis($params) {
        $sql = "SELECT FS_KD_REG FROM TAC_RI_MEDIS WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            return $result;
        } else {
            return 0;
        }
    }

    function get_data_order_lab_by_rg3($params) {
        $sql = "SELECT FS_NM_TARIF
        FROM TA_TRS_KARTU_PERIKSA4 a
        LEFT JOIN TA_TARIF b ON a.FS_KD_TARIF=b.FS_KD_TARIF
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
        $sql = "SELECT FS_NM_TARIF
        FROM TA_TRS_KARTU_PERIKSA5 a
        LEFT JOIN TA_TARIF b ON a.FS_KD_TARIF=b.FS_KD_TARIF
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
    
    function cek_ases_covid_perawat_by_rg($params) {
        $sql = "SELECT * FROM TAC_RJ_COVID WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_tipe_barang_obat($params) {
        $sql = "SELECT c.FS_KD_TIPE_BRG_RAWAT_JALAN
        from TA_REGISTRASI a
        left join TA_TIPE_JAMINAN b on a.FS_KD_TIPE_JAMINAN=b.FS_KD_TIPE_JAMINAN
        left join TA_JAMINAN c ON b.FS_KD_JAMINAN=c.FS_KD_JAMINAN
        where fs_kd_reg = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_tipe_barang_obat_kp($params) {
        $sql = "SELECT d.FS_KD_TIPE_BRG_RAWAT_JALAN
        from TA_TRS_KARTU_PERIKSA a
        left join TA_REGISTRASI b ON a.FS_KD_REG = b.FS_KD_REG
        left join TA_TIPE_JAMINAN c on b.FS_KD_TIPE_JAMINAN=c.FS_KD_TIPE_JAMINAN
        left join TA_JAMINAN d ON c.FS_KD_JAMINAN=d.FS_KD_JAMINAN
        where a.fs_kd_trs = ?";
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
