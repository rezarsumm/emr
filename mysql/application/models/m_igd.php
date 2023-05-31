<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_igd extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_last_inserted_id() {
        return $this->db->insert_id();
    }

    function insert($params) {
        $sql = "INSERT INTO TAC_RJ_STATUS( FS_KD_REG, FS_STATUS,FS_FORM, mdb, mdd)
                VALUES(?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_medis($params) {
        $sql = "INSERT INTO HOSPITAL.dbo.TA_TRS_KARTU_PERIKSA(FS_KD_TRS, FD_TGL_TRS, FS_JAM_TRS, FS_KD_PETUGAS, FD_TGL_VOID, FS_JAM_VOID, FS_KD_REG, 
                FS_KD_LAYANAN, FS_KD_PETUGAS_MEDIS, FS_ANAMNESA, FS_DIAGNOSA, FS_TINDAKAN, 
                FS_CATATAN_FISIK, FS_KD_TIPE_BARANG, FN_CETAK)
                VALUES     (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_tac_rj_medis($params) {
        $sql = "INSERT INTO TAC_RJ_MEDIS(FS_KD_KP,FS_KD_REG, FS_DIAGNOSA, FS_ANAMNESA, FS_TINDAKAN, FS_TERAPI, FS_CATATAN_FISIK,FS_KD_MEDIS,FS_CARA_PULANG,FS_DAFTAR_MASALAH,FS_PLANNING, mdb, mdd,FS_JAM_TRS)
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_covid($params) {
        $sql = "INSERT INTO TAC_RJ_COVID(FS_KD_REG, FS_PARAM_1, FS_PARAM_2,FS_PARAM_3,FS_PARAM_4, FS_PARAM_5, FS_PARAM_6, 
                FS_PARAM_7,FS_LOKASI,FD_TGL_BERANGKAT,FD_TGL_PULANG,FS_LOKASI2,FD_TGL_BERANGKAT2,FD_TGL_PULANG2,FS_KESIMPULAN,
                mdb, mdd)
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_kontak($params) {
        $sql = "INSERT INTO TAC_RJ_COVID2(FS_KD_REG, FS_NM_KONTAK, FS_NM_DOMISILI, FS_NO_HP)
                VALUEs (?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_covid2($params) {
        $sql = "INSERT INTO TAC_RJ_COVID3(FS_KD_REG, FD_TGL_KUNJUNG, FS_TEMPAT_KUNJUNG,FS_INFEKSI,FS_INFEKSI2)
                VALUES (?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_covid3($params) {
        $sql = "INSERT INTO TAC_RJ_COVID4(FS_KD_REG, FS_KOMORBID1, FS_KOMORBID2, FS_KOMORBID3, FS_KOMORBID4,
                FS_KOMORBID5,FS_KOMORBID6,FS_KOMORBID7,FD_TGL_PANAS)
                VALUES (?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_covid5($params) {
        $sql = "INSERT INTO TAC_RJ_COVID6(FS_KD_REG, FD_SPES_TANGGAL, FS_SPES_PENGIRIM, FS_SPES_DINAS, FS_SPES_PROV,
                FS_SPES_RS, RS_SPES_RS_KOTA, FS_SPES_DPJP,FS_SPES_HP)
                VALUES (?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_covid6($params) {
        $sql = "INSERT INTO TAC_RJ_COVID7(FS_KD_REG, FS_SPES_GEJALA1, FS_SPES_GEJALA2, FS_SPES_GEJALA3, FS_SPES_GEJALA4,
                FS_SPES_GEJALA5, FS_SPES_GEJALA6, FS_SPES_GEJALA7, FS_SPES_GEJALA8, FS_SPES_GEJALA9)
                VALUES (?,?,?,?,?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_covid7($params) {
        $sql = "INSERT INTO TAC_RJ_COVID8(FS_KD_REG, FS_PEN_XRAY, FS_PEN_VENT)
                VALUES (?,?,?)";
        return $this->db->query($sql, $params);
    }

    function insert_covid4($params) {
        $sql = "INSERT INTO TAC_RJ_COVID5(FS_KD_REG, FS_KD_SPESIMEN)
                VALUES (?,?)";
        return $this->db->query($sql, $params);
    }

    function update_covid($params) {
        $sql = "UPDATE TAC_RJ_COVID SET FS_PARAM_1 = ?, FS_PARAM_2 = ?,FS_PARAM_3 = ?,FS_PARAM_4 = ?, FS_PARAM_5 = ?, FS_PARAM_6 = ?, 
                FS_PARAM_7 = ?,FS_LOKASI = ?,FD_TGL_BERANGKAT = ?,FD_TGL_PULANG = ?,FS_LOKASI2 = ?,FD_TGL_BERANGKAT2 = ?,
                FD_TGL_PULANG2= ?,FS_KESIMPULAN= ?,
                mdb= ?, mdd= ? WHERE FS_KD_REG =?";
        return $this->db->query($sql, $params);
    }

    function update_covid1($params) {
        $sql = "UPDATE TAC_RJ_COVID SET FS_TINDAK_LANJUT = ? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function update_covid3($params) {
        $sql = "UPDATE TAC_RJ_COVID3 SET FD_TGL_KUNJUNG = ?, FS_TEMPAT_KUNJUNG = ?,FS_INFEKSI = ?,FS_INFEKSI2 = ?
                WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function update_covid4($params) {
        $sql = "UPDATE TAC_RJ_COVID4 SET FS_KOMORBID1 = ?, FS_KOMORBID2 = ?, FS_KOMORBID3 = ?, FS_KOMORBID4 = ?,
                FS_KOMORBID5 = ?,FS_KOMORBID6 = ?,FS_KOMORBID7 = ?,FD_TGL_PANAS = ? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function update_covid6($params) {
        $sql = "UPDATE TAC_RJ_COVID6 SET FD_SPES_TANGGAL = ?, FS_SPES_PENGIRIM= ?, FS_SPES_DINAS= ?, FS_SPES_PROV= ?,
                FS_SPES_RS= ?, RS_SPES_RS_KOTA= ?, FS_SPES_DPJP= ?,FS_SPES_HP= ? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function update_covid7($params) {
        $sql = "UPDATE TAC_RJ_COVID7 SET FS_SPES_GEJALA1 = ?, FS_SPES_GEJALA2 = ?, FS_SPES_GEJALA3 = ?, 
                FS_SPES_GEJALA4 = ?,FS_SPES_GEJALA5 = ?, FS_SPES_GEJALA6 = ?, FS_SPES_GEJALA7 = ?, 
                FS_SPES_GEJALA8 = ?, FS_SPES_GEJALA9 = ? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function update_covid8($params) {
        $sql = "UPDATE TAC_RJ_COVID8 SET FS_PEN_XRAY= ?, FS_PEN_VENT= ? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function update_nutrisi($params) {
        $sql = "UPDATE TAC_RJ_NUTRISI SET FS_NUTRISI1 = ?, FS_NUTRISI2 = ?,FS_NUTRISI_ANAK1=?,FS_NUTRISI_ANAK2=?,FS_NUTRISI_ANAK3=?,
                FS_NUTRISI_ANAK4=?,  mdb = ?, mdd=? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function update_tz_parameter_no_kp($params) {
        $sql = "UPDATE HOSPITAL.dbo.TZ_PARAMETER_NO SET FN_VALUE=? WHERE FS_KD_PARAMETER= 'NOKRTPRKSA'";
        return $this->db->query($sql, $params);
    }

    function update_level_medis($params) {
        $sql = "UPDATE TAC_RJ_STATUS SET FS_STATUS=? WHERE FS_KD_REG= ?";
        return $this->db->query($sql, $params);
    }

    function update_medis($params) {
        $sql = "UPDATE HOSPITAL.dbo.TA_TRS_KARTU_PERIKSA SET FS_ANAMNESA = ?, FS_DIAGNOSA=?, FS_TINDAKAN=?, 
                FS_CATATAN_FISIK =?, FS_KD_TIPE_BARANG=?, FN_CETAK=? WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }

    function update_tac_rj_medis($params) {
        $sql = "UPDATE TAC_RJ_MEDIS SET FS_DIAGNOSA = ?, FS_ANAMNESA = ?, FS_TINDAKAN =?, FS_TERAPI=?, FS_CATATAN_FISIK=?, 
                FS_CARA_PULANG=?,FS_DAFTAR_MASALAH=?,mdb=?, mdd=?
                WHERE FS_KD_REG = ?";
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
        $sql = "UPDATE HOSPITAL.dbo.TC_MR SET FS_HIGH_RISK = ?
                WHERE FS_MR = ?";
        return $this->db->query($sql, $params);
    }

    function update_instruksi_medis($params) {
        $sql = "UPDATE    TAC_HD_INSTRUKSI_MEDIS
SET              informed_concent_tgl = ?, instruksi_tgl = ?, instruksi_resepHD = ?, instruksi_resepHD_TD = ?, 
                      instruksi_resepHD_QB = ?, instruksi_resepHD_QD = ?, instruksi_resepHD_UFgoal = ?, instruksi_profilling_Na = ?, instruksi_profilling_NaStat = ?, instruksi_profilling_UF = ?, 
                      instruksi_dialisat_asetat =?, instruksi_dialisat_bicarbonat =?, instruksi_dialisat_conductivity =?, instruksi_dialisat_conductivity_text =?, instruksi_dialisat_temperatur = ?, 
                      instruksi_dialisat_temperatur_text = ?, instruksi_dosis_sirkulasi = ?, instruksi_dosis_sirkulasi_text = ?, instruksi_dosis_awal = ?, instruksi_dosis_awal_text = ?, 
                      instruksi_dosis_maintenance = ?, instruksi_dosis_main = ?, instruksi_dosis_main_continue_text = ?, instruksi_dosis_main_intermitten_text = ?, instruksi_LMWH = ?, 
                      instruksi_LMWH_text =?, instruksi_tanpa_heparin =?, instruksi_tanpa_heparin_text =?, instruksi_program_bilas =?, instruksi_edukasi =?, instruksi_edukasi_text =?, 
                      instruksi_catatan_lain =?  WHERE FS_KD_REG= ?";
        return $this->db->query($sql, $params);
    }

    function update_surat_covid($params) {
        $sql = "UPDATE  HOSPITAL.dbo.TZ_TRS_SURAT SET FS_KETERANGAN5 = ? WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function delete_kontak_process($params) {
        $sql = "DELETE TAC_RJ_COVID2 
                WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }

    function delete_covid5($params) {
        $sql = "DELETE TAC_RJ_COVID5 
                WHERE FS_KD_REG = ?";
        return $this->db->query($sql, $params);
    }

    function delete_rencana_kep($params) {
        $sql = "DELETE TAC_RJ_REN_KEP 
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

    // get site data
    function get_px_covid($params) {
        $sql = "SELECT * FROM
                TAC_RJ_COVID
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

    function get_surat_covid($params) {
        $sql = "SELECT * FROM
                HOSPITAL.dbo.TZ_TRS_SURAT
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

    function get_data_kontak($params) {
        $sql = "SELECT * FROM
                TAC_RJ_COVID2
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

    function get_data_covid3_by_rg($params) {
        $sql = "SELECT * FROM
                TAC_RJ_COVID3
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

    function get_data_covid4_by_rg($params) {
        $sql = "SELECT * FROM
                TAC_RJ_COVID4
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

    function get_data_covid5_by_rg($params) {
        $sql = "SELECT * FROM TAC_RJ_COVID5 WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    function get_data_covid5_by_rg2($params) {
        $sql = "SELECT * FROM TAC_RJ_COVID5 a
                LEFT JOIN TAC_COM_COVID_SPESIMEN b ON a.FS_KD_SPESIMEN=b.FS_KD_TRS
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

    function get_data_covid6_by_rg($params) {
        $sql = "SELECT * FROM TAC_RJ_COVID6 WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_data_covid7_by_rg($params) {
        $sql = "SELECT * FROM TAC_RJ_COVID7 WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function get_data_covid8_by_rg($params) {
        $sql = "SELECT * FROM TAC_RJ_COVID8 WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    
    function get_data_covid1_by_rg($params) {
        $sql = "SELECT * FROM TAC_RJ_COVID WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


    function get_px_history($params) {
        $sql = "SELECT a.FS_KD_REG,b.FS_NM_PASIEN,a.FS_MR,a.FD_TGL_MASUK,c.FS_NM_PEG
                ,a.FS_KD_JENIS_REG,d.FS_NM_LAYANAN,MAX_RG,f.FS_STATUS,j.mdb,i.FS_NM_PEG 'DOK2',
                g.FS_KD_TRS,k.FS_NM_LAYANAN 'LAYANAN2',f.FS_FORM
                FROM HOSPITAL.dbo.TA_REGISTRASI a
                INNER JOIN HOSPITAL.dbo.TC_MR b ON a.FS_MR=b.FS_MR
                LEFT JOIN HOSPITAL.dbo.TD_PEG c ON a.FS_KD_MEDIS = c.FS_KD_PEG
                LEFT JOIN HOSPITAL.dbo.TA_REGISTRASI h ON a.FS_KD_REG = h.FS_KD_REG
                LEFT JOIN HOSPITAL.dbo.TD_PEG i ON h.FS_KD_MEDIS2 = i.FS_KD_PEG
                LEFT JOIN HOSPITAL.dbo.TA_LAYANAN d ON a.FS_KD_LAYANAN = d.FS_KD_LAYANAN
                LEFT JOIN HOSPITAL.dbo.TA_LAYANAN k ON a.FS_KD_LAYANAN2 = k.FS_KD_LAYANAN
                LEFT JOIN (
                    SELECT FS_KD_REG 'MAX_RG',FS_MR
                    FROM HOSPITAL.dbo.TA_REGISTRASI 
                    WHERE FD_TGL_MASUK = ? AND FS_KD_LAYANAN = ?
                )e ON a.FS_MR = e.FS_MR
                LEFT JOIN TAC_RJ_STATUS f ON a.FS_KD_REG=f.FS_KD_REG
                LEFT JOIN TAC_RJ_MEDIS g ON a.FS_KD_REG=g.FS_KD_REG
                LEFT JOIN TAC_RJ_COVID j ON a.FS_KD_REG=j.FS_KD_REG
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

    function get_px_history_nurse($params) {
        $sql = "SELECT a.FS_KD_REG,b.FS_NM_PASIEN,a.FS_MR,a.FD_TGL_MASUK,c.FS_NM_PEG
                ,a.FS_KD_JENIS_REG,d.FS_NM_LAYANAN,MAX_RG,f.FS_STATUS,g.FS_KD_REG 'FS_KD_REG_NURSE' ,i.FS_NM_PEG 'DOK2',
                g.FS_KD_TRS,k.FS_NM_LAYANAN 'LAYANAN2'
                FROM HOSPITAL.dbo.TA_REGISTRASI a
                INNER JOIN HOSPITAL.dbo.TC_MR b ON a.FS_MR=b.FS_MR
                LEFT JOIN HOSPITAL.dbo.TD_PEG c ON a.FS_KD_MEDIS = c.FS_KD_PEG
                LEFT JOIN HOSPITAL.dbo.TA_REGISTRASI h ON a.FS_KD_REG = h.FS_KD_REG
                LEFT JOIN HOSPITAL.dbo.TD_PEG i ON h.FS_KD_MEDIS2 = i.FS_KD_PEG
                LEFT JOIN HOSPITAL.dbo.TA_LAYANAN d ON a.FS_KD_LAYANAN = d.FS_KD_LAYANAN
                LEFT JOIN HOSPITAL.dbo.TA_LAYANAN k ON a.FS_KD_LAYANAN2 = k.FS_KD_LAYANAN
                LEFT JOIN (
                    SELECT FS_KD_REG 'MAX_RG',FS_MR
                    FROM HOSPITAL.dbo.TA_REGISTRASI 
                    WHERE FD_TGL_MASUK = ? AND FS_KD_LAYANAN = ?
                )e ON a.FS_MR = e.FS_MR
                LEFT JOIN TAC_RJ_STATUS f ON a.FS_KD_REG=f.FS_KD_REG
                LEFT JOIN TAC_RJ_MEDIS g ON a.FS_KD_REG=g.FS_KD_REG
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
                FROM HOSPITAL.dbo.TA_REGISTRASI a
                INNER JOIN HOSPITAL.dbo.TC_MR b ON a.FS_MR=b.FS_MR
                LEFT JOIN HOSPITAL.dbo.TD_PEG c ON a.FS_KD_MEDIS = c.FS_KD_PEG
                LEFT JOIN HOSPITAL.dbo.TA_LAYANAN d ON a.FS_KD_LAYANAN = d.FS_KD_LAYANAN
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
        $sql = "SELECT a.FS_NM_PASIEN,a.FS_MR,a.FS_ALM_PASIEN,FS_JNS_KELAMIN,
                ISNULL(datediff(year,a.fd_tgl_lahir,?),0) fn_umur,b.FS_KD_REG,
                d.FS_NM_JAMINAN,e.FS_NM_PEG,a.FD_TGL_LAHIR,b.FD_TGL_MASUK,FS_NM_LAYANAN,b.FS_KD_LAYANAN,
                b.FS_KD_LAYANAN2,b.FS_KD_LAYANAN3,b.FS_KD_MEDIS,e.FS_NO_IJIN_PRAKTEK,RIGHT(a.FS_MR,8) 'MR',g.FS_TB,g.FS_BB,h.FS_NM_PEG 'DOK2',
                i.FS_KD_TRS,a.FS_TEMP_LAHIR,b.FS_NO_SJP,a.FS_HIGH_RISK,i.mdd,i.FS_CARA_PULANG,a.FS_ALERGI,
                a.FS_RIW_PENYAKIT_DAHULU,a.FS_RIW_PENYAKIT_DAHULU2
                FROM HOSPITAL.dbo.TC_MR a
                LEFT JOIN HOSPITAL.dbo.TA_REGISTRASI b ON a.FS_MR=b.FS_MR
                LEFT JOIN HOSPITAL.dbo.TA_TIPE_JAMINAN c ON b.FS_KD_TIPE_JAMINAN=c.FS_KD_TIPE_JAMINAN
                LEFT JOIN HOSPITAL.dbo.TA_JAMINAN d ON c.FS_KD_JAMINAN=d.FS_KD_JAMINAN
                LEFT JOIN HOSPITAL.dbo.TD_PEG e ON b.FS_KD_MEDIS=e.FS_KD_PEG
                LEFT JOIN HOSPITAL.dbo.TD_PEG h ON b.FS_KD_MEDIS2=h.FS_KD_PEG
                LEFT JOIN HOSPITAL.dbo.TA_LAYANAN f ON b.FS_KD_LAYANAN=f.FS_KD_LAYANAN
                LEFT JOIN TAC_RJ_VITAL_SIGN g ON b.FS_KD_REG=g.FS_KD_REG
                LEFT JOIN TAC_RJ_MEDIS i ON b.FS_KD_REG=i.FS_KD_REG
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
                FROM TAC_RJ_MEDIS a
                LEFT JOIN TAC_COM_USER b ON a.mdb=b.user_id
                LEFT JOIN HOSPITAL.dbo.TD_PEG c ON b.user_name=c.FS_KD_PEG
                LEFT JOIN HOSPITAL.dbo.TA_TRS_SEP d ON a.FS_KD_REG = d.FS_KD_REG
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

    function get_data_medis_hd_by_rg2($params) {
        $sql = "SELECT a.*,c.FS_NM_PEG,b.user_name,c.FS_NO_IJIN_PRAKTEK,d.FD_TGL_RUJUKAN,e.*
                FROM TAC_RJ_MEDIS a
                LEFT JOIN TAC_COM_USER b ON a.mdb=b.user_id
                LEFT JOIN HOSPITAL.dbo.TD_PEG c ON b.user_name=c.FS_KD_PEG
                LEFT JOIN HOSPITAL.dbo.TA_TRS_SEP d ON a.FS_KD_REG = d.FS_KD_REG
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

    function list_jenis_spesimen($params) {
        $sql = "SELECT * FROM TAC_COM_COVID_SPESIMEN";
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

    function cek_medis($params) {
        $sql = "SELECT * FROM TAC_RJ_MEDIS WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    function cek_form_covid($params) {
        $sql = "SELECT * FROM TAC_RJ_COVID3 WHERE FS_KD_REG = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->num_rows();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
    function cek_form_covid_history($params) {
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

    function get_px_by_dokter_wait_igd($params) {
        $sql = "SELECT a.FS_KD_REG,b.FS_NM_PASIEN,FN_NO_URUT,a.FS_MR,b.FS_ALM_PASIEN,
                FS_STATUS,FS_TERAPI,e.FS_KD_TRS,e.FS_DIAGNOSA,e.FS_TINDAKAN,e.FS_CARA_PULANG
                FROM HOSPITAL.dbo.TA_REGISTRASI a
                INNER JOIN HOSPITAL.dbo.TC_MR b ON a.FS_MR=b.FS_MR
                LEFT JOIN HOSPITAL.dbo.TA_TRS_ANTRIAN c ON a.FS_KD_REG = c.FS_KD_REG
                LEFT JOIN TAC_RJ_STATUS d ON a.FS_KD_REG = d.FS_KD_REG
                LEFT JOIN TAC_RJ_MEDIS e ON a.FS_KD_REG=e.FS_KD_REG
                WHERE a.FD_TGL_MASUK = ? AND a.FD_TGL_VOID = '3000-01-01'
                AND a.FS_KD_JENIS_REG <> '1'
                AND (a.FS_KD_LAYANAN = 'P012' OR a.FS_KD_LAYANAN = 'P014')
                ORDER BY a.FS_KD_REG DESC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    function get_px_covid_igd($params) {
        $sql = "SELECT a.FS_KD_REG,b.FS_NM_PASIEN,FN_NO_URUT,a.FS_MR,b.FS_ALM_PASIEN,
                FS_STATUS,FS_TERAPI,e.FS_KD_TRS,e.FS_DIAGNOSA,e.FS_TINDAKAN,e.FS_CARA_PULANG,
                f.FS_KESIMPULAN
                FROM HOSPITAL.dbo.TA_REGISTRASI a
                INNER JOIN HOSPITAL.dbo.TC_MR b ON a.FS_MR=b.FS_MR
                LEFT JOIN HOSPITAL.dbo.TA_TRS_ANTRIAN c ON a.FS_KD_REG = c.FS_KD_REG
                LEFT JOIN TAC_RJ_STATUS d ON a.FS_KD_REG = d.FS_KD_REG
                LEFT JOIN TAC_RJ_MEDIS e ON a.FS_KD_REG=e.FS_KD_REG
                LEFT JOIN TAC_RJ_COVID f ON a.FS_KD_REG=f.FS_KD_REG
                WHERE a.FD_TGL_MASUK = ? AND a.FD_TGL_VOID = '3000-01-01'
                AND a.FS_KD_JENIS_REG <> '1'
                AND (a.FS_KD_LAYANAN = 'P012' OR a.FS_KD_LAYANAN = 'P014')
                ORDER BY a.FS_KD_REG DESC";
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
                FROM HOSPITAL.dbo.TA_REGISTRASI a
                INNER JOIN HOSPITAL.dbo.TC_MR b ON a.FS_MR=b.FS_MR
                LEFT JOIN HOSPITAL.dbo.TA_TRS_ANTRIAN c ON a.FS_KD_REG = c.FS_KD_REG
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
                FS_STATUS,FS_TERAPI,e.FS_KD_TRS,f.FS_NM_PEG,d.FS_FORM,FS_CARA_PULANG
                FROM HOSPITAL.dbo.TA_REGISTRASI a
                INNER JOIN HOSPITAL.dbo.TC_MR b ON a.FS_MR=b.FS_MR
                LEFT JOIN HOSPITAL.dbo.TA_TRS_ANTRIAN c ON a.FS_KD_REG = c.FS_KD_REG
                LEFT JOIN TAC_RJ_STATUS d ON a.FS_KD_REG = d.FS_KD_REG
                LEFT JOIN TAC_RJ_MEDIS e ON a.FS_KD_REG=e.FS_KD_REG
                LEFT JOIN HOSPITAL.dbo.TD_PEG f ON e.FS_KD_MEDIS=f.FS_KD_PEG
                WHERE a.FD_TGL_MASUK = ? AND a.FD_TGL_VOID = '3000-01-01'
                AND a.FS_KD_JENIS_REG <> '1' AND 
                a.FS_KD_LAYANAN = 'P012'
                ORDER BY c.FN_NO_URUT DESC";
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
