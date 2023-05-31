<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_rm extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_last_inserted_id() {
        return $this->db->insert_id();
    }
    
    function insert_pinjam($params) {
        $sql = "INSERT INTO TAC_RM_PINJAM(FS_KD_REG, FD_TGL_PINJAM,FS_PETUGAS_KIRIM,FD_TGL_EXPIRED)
                VALUES(?,?,?,?)";
        return $this->db->query($sql, $params);
    }
    function insert_tujuan_pinjam($params) {
        $sql = "INSERT INTO TAC_RM_PINJAM2(FS_KD_PINJAM, FS_KD_PEG)
                VALUES(?,?)";
        return $this->db->query($sql, $params);
    }

  function get_px_history($params) {
        $sql = "SELECT a.FS_KD_REG,b.FS_NM_PASIEN,a.FS_MR,a.FD_TGL_MASUK,c.FS_NM_PEG
                ,a.FS_KD_JENIS_REG,d.FS_NM_LAYANAN,f.FS_STATUS,g.FS_KD_TRS,f.FS_FORM,a.FD_TGL_KELUAR
                FROM HOSPITAL.dbo.TA_REGISTRASI a
                INNER JOIN HOSPITAL.dbo.TC_MR b ON a.FS_MR=b.FS_MR
                LEFT JOIN HOSPITAL.dbo.TD_PEG c ON a.FS_KD_MEDIS = c.FS_KD_PEG
                LEFT JOIN HOSPITAL.dbo.TA_LAYANAN d ON a.FS_KD_LAYANAN = d.FS_KD_LAYANAN
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
        $sql = "SELECT a.NO_MR,a.TANGGAL,a.NO_REG,c.NAMA_PASIEN,g.FS_KD_TRS,NAMA_RUANG, a.MEDIS,
                d.NAMA_DOKTER,FS_CARA_PULANG,a.STATUS,a.KODE_RUANG, a.KODEREKANAN
                FROM DB_RSMM.dbo.PENDAFTARAN a
                INNER JOIN DB_RSMM.dbo.REGISTER_PASIEN c ON a.NO_MR=c.NO_MR
                LEFT JOIN DB_RSMM.dbo.DOKTER d ON a.KODE_DOKTER = d.KODE_DOKTER
                LEFT JOIN DB_RSMM.dbo.M_RUANG e ON a.KODE_RUANG = e.KODE_RUANG
                LEFT JOIN DB_RSMM.dbo.DOKTER f ON a.KODE_DOKTER = f.KODE_DOKTER
                LEFT JOIN PKU.dbo.TAC_RJ_MEDIS g ON a.NO_REG=g.FS_KD_REG
                LEFT JOIN PKU.dbo.TAC_RJ_STATUS i ON a.NO_REG=i.FS_KD_REG
                WHERE a.NO_MR = ?
                GROUP BY  a.NO_MR,a.TANGGAL,a.NO_REG,c.NAMA_PASIEN,g.FS_KD_TRS,NAMA_RUANG, a.MEDIS
                ,d.NAMA_DOKTER,FS_CARA_PULANG,a.STATUS,a.KODE_RUANG, a.KODEREKANAN
                ORDER BY a.TANGGAL DESC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
  function get_px_history2_inap($params) {
        $sql = "SELECT a.*,b.*,c.*,g.*,NAMABAGIAN,NAMADOKTER
                FROM DBHOSPITAL.dbo.REGPAS a
                LEFT JOIN DBHOSPITAL.dbo.REGDR b ON a.NOREG=b.NOREG
                INNER JOIN DBHOSPITAL.dbo.PASIEN c ON a.NOPASIEN=c.NOPASIEN
                LEFT JOIN DBHOSPITAL.dbo.DOKTER d ON b.KODEDOKTER = d.KODEDOKTER
                LEFT JOIN DBHOSPITAL.dbo.BAGIAN e ON b.BAGREGDR = e.KODEBAGIAN
                LEFT JOIN PKU.dbo.TAC_RJ_MEDIS g ON a.NOREG=g.FS_KD_REG
               LEFT JOIN PKU.dbo.TAC_RJ_STATUS i ON a.NOREG=i.FS_KD_REG
               LEFT JOIN DBHOSPITAL.dbo.REGRWI j ON a.NOREG=j.NOREG
                WHERE a.NOPASIEN = ? AND a.ASALREG = ?
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
  function get_data_px_by_rm($params) {
        $sql = "SELECT NO_MR,NAMA_PASIEN,ALAMAT,TGL_LAHIR,JENIS_KELAMIN
                FROM  DB_RSMM.dbo.REGISTER_PASIEN
                WHERE NO_MR = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }
  // function get_data_px_by_rg($params) {
  //       $sql = "SELECT A.NO_REG,A.NO_MR,A.TGL_MULAI,B.NAMA_PASIEN,A.KODE_RUANG, B.JENIS_KELAMIN,B.ALAMAT,D.KODE_BANGSAL,C.NAMA_RUANG,D.NAMA_BANGSAL,E.KODEREKANAN,F.NAMAREKANAN ,B.TGL_LAHIR,datediff(year,B.TGL_LAHIR,GETDATE()) 'fn_umur'
  //       FROM TR_KAMAR A, REGISTER_PASIEN B, M_RUANG C, M_BANGSAL D, PENDAFTARAN E, REKANAN F 
  //       WHERE  A.NO_MR=B.NO_MR AND A.NO_REG=E.NO_REG AND E.KODEREKANAN=F.KODEREKANAN AND A.KODE_RUANG=C.KODE_RUANG AND C.KODE_BANGSAL=D.KODE_BANGSAL AND A.NO_REG = ? AND A.STATUS='1' AND E.STATUS='1' ORDER BY D.KODE_BANGSAL,A.TGL_MULAI";
  //       $query = $this->db->query($sql, $params);
  //       if ($query->num_rows() > 0) {
  //           $result = $query->row_array();
  //           $query->free_result();
  //           return $result;
  //       } else {
  //           return 0;
  //       }
  //   }


     function get_data_px_by_rg($params) {
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
    
     function get_px_by_dokter_pulang($params) {
        $sql = "SELECT a.NOREG,c.NAMAPASIEN,c.NOPASIEN,c.ALM1PASIEN,
                FS_STATUS,FS_TERAPI,e.FS_KD_TRS,e.FS_DIAGNOSA,e.FS_TINDAKAN,e.FS_CARA_PULANG,
                d.FS_FORM,NOURUTDR
                FROM DBHOSPITAL.dbo.REGPAS a
                INNER JOIN DBHOSPITAL.dbo.REGDR b ON a.NOREG=b.NOREG
                INNER JOIN DBHOSPITAL.dbo.PASIEN c ON a.NOPASIEN=c.NOPASIEN
                LEFT JOIN PKU.dbo.TAC_RJ_STATUS d ON a.NOREG = d.FS_KD_REG
                LEFT JOIN PKU.dbo.TAC_RJ_MEDIS e ON a.NOREG=e.FS_KD_REG
                WHERE (a.TGLREG = ?)
                AND (b.KODEDOKTER = ?)
                ORDER BY b.NOURUTDR";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
     function get_px_by_dokter_pulang_igd($params) {
        $sql = "SELECT a.FS_KD_REG,b.FS_NM_PASIEN,FN_NO_URUT,a.FS_MR,b.FS_ALM_PASIEN,
                FS_STATUS,FS_TERAPI,e.FS_KD_TRS,e.FS_DIAGNOSA,e.FS_TINDAKAN,e.FS_CARA_PULANG,
                a.FS_KD_LAYANAN,a.FS_KD_LAYANAN2,a.FS_KD_LAYANAN3,d.FS_FORM
                FROM HOSPITAL.dbo.TA_REGISTRASI a
                INNER JOIN HOSPITAL.dbo.TC_MR b ON a.FS_MR=b.FS_MR
                LEFT JOIN HOSPITAL.dbo.TA_TRS_ANTRIAN c ON a.FS_KD_REG = c.FS_KD_REG
                LEFT JOIN TAC_RJ_STATUS d ON a.FS_KD_REG = d.FS_KD_REG
                LEFT JOIN TAC_RJ_MEDIS e ON a.FS_KD_REG=e.FS_KD_REG
                WHERE a.FD_TGL_MASUK = ? AND a.FD_TGL_VOID = '3000-01-01'
                AND a.FS_KD_JENIS_REG <> '1' AND (a.FS_KD_LAYANAN = 'P012')
                AND a.FS_KD_LAYANAN <> 'P023'
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
     function get_all_user($params) {
        $sql = "SELECT FS_KD_PEG,FS_NM_PEG
                FROM TAC_COM_USER a
                LEFT JOIN HOSPITAL.dbo.TD_PEG b ON a.user_name=b.FS_KD_PEG
                ORDER BY FS_NM_PEG ASC";
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
        $sql = "SELECT * FROM PKU.dbo.TAC_RM_BERKAS WHERE FS_KD_REG = ?";
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
