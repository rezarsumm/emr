<?php

class m_aplusan extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    /*
     * SURAT MASUK
     */

    // get last inserted id
    function get_last_inserted_id() {
        return $this->db->insert_id();
    }

    function cek_aplusan($params) {
        $sql = "SELECT * FROM PKU.dbo.TAB_APLUSAN WHERE FS_SHIFT = ? AND FS_KD_REG = ?
        AND mdd = ?";
        $query = $this->db->query($sql, $params);
        $result = $query->num_rows();
        $query->free_result();
        return $result;
    }

    // get all instansi
    function get_all_pegawai() {
        $sql = "SELECT FS_KD_PEG,FS_NM_PEG FROM HOSPITAL.dbo.TD_PEG
        where ISNUMERIC(FS_KD_PEG) = 1
        GROUP BY FS_KD_PEG,FS_NM_PEG
        ORDER BY FS_NM_PEG ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    // get list pegawai
    function get_total_apulsan_task($params) {
        $sql = "SELECT COUNT(*) 'total'
        FROM TAB_APULSAN 
        WHERE FS_STATUS = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result['total'];
        } else {
            return array();
        }
    }

    function get_apulsan_by_id($params) {
        $sql = "SELECT a.*,b.FS_NM_LAYANAN,c.FS_NM_PEG FROM TAB_APULSAN a
        LEFT JOIN HOSPITAL.dbo.TA_LAYANAN b ON a.FS_KD_LAYANAN=b.FS_KD_LAYANAN
        LEFT JOIN HOSPITAL.dbo.TD_PEG c ON a.FS_KD_PEG=c.FS_KD_PEG
        WHERE FS_KD_APULSAN = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

    // total surat masuk
    function get_total_aplusan_lap($params) {
        $sql = "SELECT COUNT(*)'total' FROM
        (
        SELECT *
        FROM TAB_APLUSAN
        WHERE FS_KD_LAYANAN LIKE ? AND MONTH(mdd) LIKE ? AND YEAR(mdd) LIKE ? 

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
    }

    // list surat masuk
    function get_aplusan_by_id($params) {
        $sql = "SELECT a.NO_REG,b.NAMA_PASIEN,NAMA_RUANG,b.NO_MR,NAMA_BANGSAL,
        f.NAMALENGKAP,mdd,FS_SHIFT,FS_KONDISI_PASIEN,FS_CATATAN,mdb,FS_KD_APULSAN
        from 
        DB_RSMM.dbo.PENDAFTARAN a
        LEFT JOIN DB_RSMM.dbo.REGISTER_PASIEN b ON a.NO_MR=b.NO_MR
        LEFT JOIN DB_RSMM.dbo.M_RUANG c ON a.KODE_RUANG=c.KODE_RUANG
        LEFT JOIN DB_RSMM.dbo.M_BANGSAL d ON c.KODE_BANGSAL=d.KODE_BANGSAL
        LEFT JOIN PKU.dbo.TAB_APLUSAN e ON a.NO_REG = e.fs_kd_reg
        LEFT JOIN DB_RSMM.dbo.TUSER f ON e.PPJP = f.NAMAUSER                
        WHERE e.FS_KD_APULSAN = ?
        ORDER BY e.mdd DESC, e.FS_SHIFT DESC,d.KODE_BANGSAL DESC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    // list surat masuk
    function get_list_aplusan_lap($params) {
        $sql = "SELECT a.NO_REG,b.NAMA_PASIEN,NAMA_RUANG,b.NO_MR,NAMA_BANGSAL,
        f.NAMALENGKAP,mdd,FS_SHIFT,FS_KONDISI_PASIEN,FS_CATATAN,mdb,FS_KD_APULSAN, e.penerima, e.tgl_terima
        from 
        DB_RSMM.dbo.PENDAFTARAN a
        LEFT JOIN DB_RSMM.dbo.REGISTER_PASIEN b ON a.NO_MR=b.NO_MR
        LEFT JOIN DB_RSMM.dbo.M_RUANG c ON a.KODE_RUANG=c.KODE_RUANG
        LEFT JOIN DB_RSMM.dbo.M_BANGSAL d ON c.KODE_BANGSAL=d.KODE_BANGSAL
        LEFT JOIN PKU.dbo.TAB_APLUSAN e ON a.NO_REG = e.fs_kd_reg
        LEFT JOIN DB_RSMM.dbo.TUSER f ON e.PPJP = f.NAMAUSER                
        WHERE d.KODE_BANGSAL LIKE ? AND e.mdd LIKE ?
        ORDER BY e.mdd DESC, e.FS_SHIFT DESC,d.KODE_BANGSAL DESC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
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

    function get_cppt_by_trs($params) {
        $sql = "SELECT a.*,b.NAMALENGKAP 
        FROM PKU.dbo.TAC_RI_CPPT a
        LEFT JOIN DB_RSMM.dbo.TUSER b ON a.mdb=b.NAMAUSER
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
    
    function get_unit_kerja() {
        $sql = "SELECT KODE_BANGSAL,NAMA_BANGSAL FROM DB_RSMM.dbo.M_BANGSAL ORDER BY NAMA_BANGSAL ASC";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function get_unit_mina() {
        $sql = "SELECT KODE_BANGSAL,NAMA_BANGSAL FROM DB_RSMM.dbo.M_BANGSAL 
                WHERE KODE_BANGSAL = 'MNA' or KODE_BANGSAL='0001' 
                ORDER BY NAMA_BANGSAL ASC";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_unit_kerja_layanan($params) {
        $sql = "SELECT KODE_BANGSAL,NAMA_BANGSAL
        FROM DB_RSMM.dbo.M_BANGSAL 
        WHERE KODE_BANGSAL = ? ORDER BY NAMA_BANGSAL ASC";
        $query = $this->db->query($sql,$params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    // insert surat masuk
    function insert_catatan_admin($params) {
        $sql = "INSERT INTO TAB_APULSAN_ADMIN (FS_MR,FS_ADMINISTRATIF, mdb, mdd) 
        VALUES (?, ?, ?, ?)";
        return $this->db->query($sql, $params);
    }

    function insert($params) {
        $sql = "INSERT INTO PKU.dbo.TAB_APLUSAN (FS_KD_LAYANAN, FS_SHIFT, FS_MR, FS_KONDISI_PASIEN, FS_TINDAKAN, FS_RESPON, FS_CATATAN, mdb, mdd,PPJP,FS_KD_REG) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        return $this->db->query($sql, $params);
    }

    // insert surat masuk
    function update($params) {
        $sql = "UPDATE PKU.dbo.TAB_APLUSAN SET FS_SHIFT =? , FS_MR = ?, FS_KONDISI_PASIEN = ? , FS_TINDAKAN = ?, FS_RESPON = ?, 
        FS_CATATAN= ?, MDB = ?, MDD = ?, PPJP = ?, FS_KD_REG=? WHERE FS_KD_APULSAN = ?";
        return $this->db->query($sql, $params);
    }

     function terima($params) {
        $sql = "UPDATE PKU.dbo.TAB_APLUSAN SET penerima=?, tgl_terima=? WHERE FS_KD_APULSAN = ?";
        return $this->db->query($sql, $params);
    }

    // update surat masuk
    function update_catatan_admin($params) {
        $sql = "UPDATE TAB_APULSAN_ADMIN SET FS_MR = ?, FS_ADMINISTRATIF = ?, mdb = ?, mdd=?,FS_KD_REG=?
        WHERE FS_KD_APULSAN_ADMIN = ?";
        return $this->db->query($sql, $params);
    }

}
