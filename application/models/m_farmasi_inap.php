<?php

class m_farmasi_inap extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        // load encrypt
        $this->load->library('encrypt');
    }

    function get_pasien_by_trs($params) {
        $sql = "SELECT b.NO_MR 'MR',a.FS_KD_REG,c.TGL_LAHIR,NAMA_PASIEN,
                ALAMAT,FS_TB,FS_BB,g.FS_DIAGNOSA,c.FS_ALERGI,
                NAMALENGKAP,a.FS_KD_TRS
                FROM PKU.dbo.TA_TRS_KARTU_PERIKSA a
                LEFT JOIN DB_RSMM.dbo.PENDAFTARAN b ON a.FS_KD_REG=b.NO_REG
                LEFT JOIN DB_RSMM.dbo.REGISTER_PASIEN c ON b.NO_MR=c.NO_MR
                LEFT JOIN PKU.dbo.TAC_RJ_VITAL_SIGN f ON b.NO_REG=f.FS_KD_REG
                LEFT JOIN PKU.dbo.TAC_RJ_MEDIS g ON b.NO_REG=g.FS_KD_REG
                LEFT JOIN DB_RSMM.dbo.TUSER h on a.FS_KD_MEDIS_RESEP = h.NAMAUSER 
                WHERE a.FS_KD_TRS = ? AND a.FD_TGL_VOID = '3000-01-01'";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_resep_by_rg($params) {
        $sql = "SELECT FS_KD_BARANG,FS_NM_BARANG,FN_QTY_BARANG,FS_KD_SATUAN 
                FROM HOSPITAL.dbo.TB_TRS_DOBILL_UMUM a
                LEFT JOIN HOSPITAL.dbo.TB_TRS_DOBILL_UMUM2 b ON a.FS_KD_TRS=b.FS_KD_TRS
                WHERE a.FS_KD_REG = ? AND FD_TGL_VOID = '3000-01-01' AND FS_KD_TRS_GEN = ''";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_resep_by_trs($params) {
        $sql = "SELECT FS_KD_BARANG,FS_NM_BARANG,FN_QTY_BARANG,FS_KD_SATUAN,
                FN_ETIKET_QTY,FN_ETIKET_HARI,FS_ETIKET_CATATAN
                FROM PKU.dbo.TA_TRS_KARTU_PERIKSA a
                LEFT JOIN PKU.dbo.TA_TRS_KARTU_PERIKSA3 b ON a.FS_KD_TRS=b.FS_KD_TRS
                WHERE a.FS_KD_TRS = ? AND a.FD_TGL_VOID = '3000-01-01'";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
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

    
    function get_px_by_farmasi($params) {
        $sql = "SELECT bb.fs_jam_trs, NAMA_RUANG, dd.NAMALENGKAP,
                bb.fs_kd_trs, mm.NAMA_PASIEN,rr.NO_MR AS 'FS_MR', rr.TGL_KELUAR 
                FROM PKU.dbo.ta_trs_kartu_periksa bb 
                INNER JOIN DB_RSMM.dbo.TUSER dd on bb.fs_kd_medis_resep = dd.NAMAUSER 
                INNER JOIN DB_RSMM.dbo.PENDAFTARAN rr on bb.fs_kd_reg  = rr.NO_REG 
                INNER JOIN DB_RSMM.dbo.REGISTER_PASIEN mm on rr.NO_MR = mm.NO_MR
                LEFT JOIN DB_RSMM.dbo.M_RUANG ll on rr.KODE_RUANG = ll.KODE_RUANG
                WHERE fb_close_resep = 0 AND bb.fd_tgl_trs = ?  AND bb.fd_tgl_void = '3000-01-01' 
                AND bb.fs_kd_trs IN (SELECT fs_kd_trs FROM PKU.dbo.ta_trs_kartu_periksa3) 
                ORDER BY       bb.fs_jam_trs DESC, NAMA_RUANG, dd.NAMALENGKAP, bb.fs_kd_trs, mm.NAMA_PASIEN
                , rr.NO_MR";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

 
//ini baru
    function get_px_by_farmasi2($params) {
        $sql = "SELECT bb.fs_jam_trs, NAMA_RUANG, dd.NAMALENGKAP,
                bb.fs_kd_trs, mm.NAMA_PASIEN,rr.NO_MR AS 'FS_MR', rr.TGL_KELUAR 
                FROM PKU.dbo.ta_trs_kartu_periksa bb 
                INNER JOIN DB_RSMM.dbo.TUSER dd on bb.fs_kd_medis_resep = dd.NAMAUSER 
                INNER JOIN DB_RSMM.dbo.PENDAFTARAN rr on bb.fs_kd_reg  = rr.NO_REG 
                INNER JOIN DB_RSMM.dbo.REGISTER_PASIEN mm on rr.NO_MR = mm.NO_MR
                LEFT JOIN DB_RSMM.dbo.M_RUANG ll on rr.KODE_RUANG = ll.KODE_RUANG
                WHERE fb_close_resep = 0 AND bb.fd_tgl_trs = ?  AND bb.fd_tgl_void = '3000-01-01' 
                  and dd.NamaGroup in('DOKTER UMUM', 'DOKTER SPESIALIS')
                ORDER BY       bb.fs_jam_trs DESC, NAMA_RUANG, dd.NAMALENGKAP, bb.fs_kd_trs, mm.NAMA_PASIEN
                , rr.NO_MR";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    //ini baru
       function get_px_by_farmasi3($params) {
           $sql = "  select A.mdd_time, B.No_MR, B.No_Reg, C.Nama_Pasien, D.Nama_Ruang, E.NamaLengkap
        from PKU.dbo.TAC_RI_CPPT as A, PENDAFTARAN as B, REGISTER_PASIEN as C, M_RUANG as D, TUSER as E
        where A.FS_KD_REG=B.No_Reg and B.No_MR=C.No_MR and B.Kode_Ruang=D.Kode_Ruang and A.mdb=E.NamaUser
        and mdd_date=? order by mdd_time desc ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    //ini baru 
    function get_px_by_lab($params) {
        $sql = "  select A.FS_LAB,A.TGL_TUJUAN_LAB,A.FS_KD_TRS, A.mdd_time, B.No_MR, B.No_Reg, C.Nama_Pasien, D.Nama_Ruang, E.NamaLengkap
        from PKU.dbo.TAC_RI_CPPT as A, PENDAFTARAN as B, REGISTER_PASIEN as C, M_RUANG as D, TUSER as E
        where A.FS_KD_REG=B.No_Reg and B.No_MR=C.No_MR and B.Kode_Ruang=D.Kode_Ruang and A.mdb=E.NamaUser
        and FS_LAB!='' and mdd_date=? order by mdd_time desc ";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function lab_inap2($params) {
        $sql = "select A.*, B.*, C.*, D.NAMALENGKAP
        from  PKU.dbo.TAC_RI_CPPT A
        LEFT JOIN DB_RSMM.dbo.TUSER D ON A.mdb=D.NAMAUSER
        left join DB_RSMM.dbo.PENDAFTARAN B on B.No_Reg=A.FS_KD_REG
        left join DB_RSMM.dbo.REGISTER_PASIEN C on B.No_MR=C.No_MR
        where A.FS_KD_TRS=?";

       $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


      function lab_inap($params) {
        $sql = "  select A.FS_LAB,A.TGL_TUJUAN_LAB,A.FS_KD_TRS, A.mdd_time, A.mdd_date, A.FS_KD_TRS, B.No_MR, B.No_Reg, C.Nama_Pasien, C.JENIS_KELAMIN, C.TGL_LAHIR, D.Nama_Ruang, E.NamaLengkap
        from PKU.dbo.TAC_RI_CPPT as A, PENDAFTARAN as B, REGISTER_PASIEN as C, M_RUANG as D, TUSER as E
        where A.FS_KD_REG=B.No_Reg and B.No_MR=C.No_MR and B.Kode_Ruang=D.Kode_Ruang and A.mdb=E.NamaUser
       and A.FS_KD_REG=? ";
       $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }


   function rad_inap($params) {
        $sql = "  select A.FS_RAD,A.FS_LAB,A.TGL_TUJUAN_LAB,A.FS_KD_TRS, A.mdd_time, A.mdd_date, B.No_MR, B.No_Reg, C.Nama_Pasien, C.JENIS_KELAMIN, C.TGL_LAHIR, D.Nama_Ruang, E.NamaLengkap
        from PKU.dbo.TAC_RI_CPPT as A, PENDAFTARAN as B, REGISTER_PASIEN as C, M_RUANG as D, TUSER as E
        where A.FS_KD_REG=B.No_Reg and B.No_MR=C.No_MR and B.Kode_Ruang=D.Kode_Ruang and A.mdb=E.NamaUser
       and A.FS_KD_TRS=? ";
       $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

   function rad_inap_igd($params) {
        $sql = "  select A.FS_RAD,A.FS_LAB,A.TGL_TUJUAN_LAB,A.FS_KD_TRS, A.mdd_time, A.mdd_date, B.No_MR, B.No_Reg, C.Nama_Pasien, C.JENIS_KELAMIN, C.TGL_LAHIR, E.NamaLengkap
        from PKU.dbo.TAC_RI_CPPT as A, PENDAFTARAN as B, REGISTER_PASIEN as C, TUSER as E
        where A.FS_KD_REG=B.No_Reg and B.No_MR=C.No_MR and A.mdb=E.NamaUser
       and A.FS_KD_TRS=? ";
       $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }

   function rad_inap2($params) {
    $sql = "select A.*, B.*, C.*,D.NAMALENGKAP
    from  PKU.dbo.TAC_RI_CPPT A
    LEFT JOIN DB_RSMM.dbo.TUSER D ON A.mdb=D.NAMAUSER
    left join DB_RSMM.dbo.PENDAFTARAN B on B.No_Reg=A.FS_KD_REG
    left join DB_RSMM.dbo.REGISTER_PASIEN C on B.No_MR=C.No_MR
    where A.FS_KD_TRS=?";
       $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return 0;
        }
    }



    //ini baru
    function get_px_by_radio($params) {
        $sql = "   select A.FS_RAD,A.TGL_TUJUAN_LAB,A.FS_KD_TRS, A.mdd_time, B.No_MR, B.No_Reg, C.Nama_Pasien, D.Nama_Ruang, E.NamaLengkap
        from PKU.dbo.TAC_RI_CPPT as A, PENDAFTARAN as B, REGISTER_PASIEN as C, M_RUANG as D, TUSER as E
        where A.FS_KD_REG=B.No_Reg and B.No_MR=C.No_MR and B.Kode_Ruang=D.Kode_Ruang and A.mdb=E.NamaUser
        and FS_RAD!='' and mdd_date=?  order by mdd_time desc";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_pasien_udd_by_trs($params) {
        $sql = "SELECT RIGHT(cc.FS_MR,8) 'MR',cc.FS_NM_PASIEN,FD_TGL_LAHIR,
                ISNULL(ee.fs_nm_bed, ' ') fs_nm_bed,FS_NAMA_OBAT,FS_DOSIS_OBAT,
                FS_INTERVAL, bb.FS_KD_REG
                FROM ( 
                    SELECT      fs_kd_trs 
                    FROM        HOSPITAL.dbo.TA_TRS_BED 
                    WHERE       fd_tgl_in <= ? 
                    AND fd_tgl_out + fs_jam_out >= ? 
                    AND fd_tgl_void = '3000-01-01' 
                    ) aa1 
                LEFT JOIN HOSPITAL.dbo.ta_trs_bed aa ON aa1.fs_kd_trs = aa.fs_kd_trs 
                LEFT JOIN HOSPITAL.dbo.ta_registrasi bb ON aa.fs_kd_reg = bb.fs_kd_reg 
                LEFT JOIN HOSPITAL.dbo.tc_mr cc ON bb.fs_mr = cc.fs_mr 
                LEFT JOIN HOSPITAL.dbo.ta_layanan dd ON aa.fs_kd_layanan = dd.fs_kd_layanan 
                LEFT JOIN HOSPITAL.dbo.ta_bed ee ON aa.fs_kd_bed = ee.fs_kd_bed 
                LEFT JOIN HOSPITAL.dbo.ta_kamar ff ON ee.fs_kd_kamar = ff.fs_kd_kamar 
                LEFT JOIN HOSPITAL.dbo.ta_bangsal gg ON ff.fs_kd_bangsal = gg.fs_kd_bangsal
                LEFT JOIN TAB_RM_17 hh on bb.FS_KD_REG = hh.FS_KD_REG 
                WHERE hh.FS_KD_RM17 = ? AND bb.FD_TGL_VOID = '3000-01-01'";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

}
