<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_upload extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_last_inserted_id() {
        return $this->db->insert_id();
    }
 
    function insert($params) {
        $sql = "INSERT INTO PKU.dbo.TAC_RM_BERKAS(FS_KD_REG, FS_JENIS_BERKAS,att_name,att_size, mdb, mdd)
        VALUES(?,?,?,?,?,?)";
        return $this->db->query($sql, $params);
    }
    function delete($params) {
        $sql = "DELETE FROM PKU.dbo.TAC_RM_BERKAS WHERE FS_KD_TRS = ?";
        return $this->db->query($sql, $params);
    }
    function get_px_history($params) {
        $sql = "SELECT A.TANGGAL,A.STATUS,A.NO_REG,B.NAMA_PASIEN, B.ALAMAT, B.GOL_DARAH,B.STATUS_NIKAH,B.NAMA_PASANGAN,B.KOTA,B.PROVINSI,B.TGL_LAHIR,B.JENIS_KELAMIN,B.WARGA_NEGARA,B.PEKERJAAN,B.AGAMA,B.NO_TELP, B.HP1,B.HP2,B.KODE_POS,B.EMAIL,B.NAMA_HUB,B.NO_IDENTITAS,B.HUB_PASIEN,B.TELP_RUMAH, C.KET_ASAL, D.KET_MASUK,J.NAMAREKANAN,E.KET_DATANG, F.KET_KONDISI, G.KET_BAYAR, H.KET_KELUAR, I.NAMA_DOKTER,K.SPESIALIS,B.FS_ALERGI,A.KODE_RUANG 
        FROM PENDAFTARAN A, REGISTER_PASIEN B, M_ASALPASIEN C, M_CARAMASUK D, M_PASIENDATANG E, M_KONDISIPASIEN F, M_CARABAYAR G, M_PASIENCLOSING H, DOKTER I, REKANAN J, M_SPESIALIS K 
        WHERE A.NO_MR=B.NO_MR AND A.KODE_ASAL=C.KODE_ASAL AND A.KODE_MASUK=D.KODE_MASUK AND A.KODE_DATANG=E.KODE_DATANG AND A.KODE_KONDISI = F.KODE_KONDISI AND A.KODE_DOKTER=I.KODE_DOKTER AND A.KODE_BAYAR=G.KODE_BAYAR AND A.KODE_KELUAR=H.KODE_KELUAR AND A.KODEREKANAN=J.KODEREKANAN AND I.SPESIALIS=K.SPESIALIS
        AND A.NO_MR = ?
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
    function get_list_berkas_by_rg($params) {
        $sql = "SELECT *
        FROM PKU.dbo.TAC_RM_BERKAS
        WHERE FS_KD_REG = ?
        ORDER BY mdd DESC";
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
