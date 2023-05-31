<?php

class m_rm_estp extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        // load encrypt
    }

    function get_last_inserted_id() {
        return $this->db->insert_id();
    }

    function get_diagnosis() {
        $sql = "SELECT FS_RANGE,FS_KD_DTD,FS_SURVEILANS FROM HOSPITAL.dbo.TC_DTD_2
                WHERE  FS_STATUS_STP = '1' ORDER BY FN_URUT ASC";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_det_rj_1($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where aa.fb_kasus_baru=1 and fs_jns_kelamin <> '1' 
                and fs_kd_jenis_inap='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_2($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where aa.fb_kasus_baru=1 and fs_jns_kelamin <> '0' 
                and fs_kd_jenis_inap='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_3($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where aa.fb_kasus_baru=1
                and fs_kd_jenis_inap='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_4($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where fs_kd_jenis_inap='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_5($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-00' and '000-00-07'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '0' 
                and fs_kd_jenis_inap='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_6($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-00' and '000-00-07'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '1' 
                and fs_kd_jenis_inap='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_7($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-08' and '000-00-28'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '0' 
                and fs_kd_jenis_inap='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_8($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-08' and '000-00-28'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '1' 
                and fs_kd_jenis_inap='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_9($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-29' and '000-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '0' 
                and fs_kd_jenis_inap='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_10($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-29' and '000-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '1' 
                and fs_kd_jenis_inap='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_11($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '001-00-00' and '004-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '0' 
                and fs_kd_jenis_inap='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_12($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '001-00-00' and '004-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '1' 
                and fs_kd_jenis_inap='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_13($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '005-00-00' and '009-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '0' 
                and fs_kd_jenis_inap='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_14($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '005-00-00' and '009-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '1' 
                and fs_kd_jenis_inap='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_15($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '010-00-00' and '014-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '0' 
                and fs_kd_jenis_inap='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_16($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '010-00-00' and '014-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '1' 
                and fs_kd_jenis_inap='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_17($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '015-00-00' and '019-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '0' 
                and fs_kd_jenis_inap='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_18($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '015-00-00' and '019-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '1' 
                and fs_kd_jenis_inap='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_19($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '020-00-00' and '044-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '0' 
                and fs_kd_jenis_inap='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_20($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '020-00-00' and '044-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '1' 
                and fs_kd_jenis_inap='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_21($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '045-00-00' and '054-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '0' 
                and fs_kd_jenis_inap='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_22($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '045-00-00' and '054-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '1' 
                and fs_kd_jenis_inap='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_23($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '055-00-00' and '058-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '0' 
                and fs_kd_jenis_inap='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_24($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '055-00-00' and '058-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '1' 
                and fs_kd_jenis_inap='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_25($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '059-00-00' and '069-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '0' 
                and fs_kd_jenis_inap='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_26($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '059-00-00' and '069-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '1' 
                and fs_kd_jenis_inap='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_27($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '070-00-00' and '999-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '0' 
                and fs_kd_jenis_inap='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_28($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '070-00-00' and '999-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '1' 
                and fs_kd_jenis_inap='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj2($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where aa.fb_kasus_baru=1 and fs_jns_kelamin <> '0' 
                and fs_kd_jenis_inap='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_tetanus($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1) and (fs_jns_kelamin = '0' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_tetanus2($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1) and (fs_jns_kelamin = '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_tetanus3($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1) 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_tetanus5($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-00' and '000-00-07')
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '0' )
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_tetanus6($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-00' and '000-00-07')
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '1' )
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_tetanus4($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_tetanus7($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-08' and '000-00-28')
                and (fs_kd_jenis_inap='')and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '0')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_tetanus8($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-08' and '000-00-28')
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '1')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_tetanus9($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-29' and '000-99-99')
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '0')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_tetanus10($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-29' and '000-99-99')
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '1')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_tetanus11($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '001-00-00' and '004-99-99')
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '0')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_tetanus12($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '001-00-00' and '004-99-99')
                and (fs_kd_jenis_inap='')and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '1')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_tetanus13($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '005-00-00' and '009-99-99')
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '0')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_tetanus14($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '005-00-00' and '009-99-99')
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '1')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_tetanus15($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '010-00-00' and '014-99-99')
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '0')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_tetanus16($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '010-00-00' and '014-99-99')
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '1')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_tetanus17($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '015-00-00' and '019-99-99')
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '0')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_tetanus18($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '015-00-00' and '019-99-99')
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '1')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_tetanus19($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '020-00-00' and '044-99-99')
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '0')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_tetanus20($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '020-00-00' and '044-99-99')
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '1')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_tetanus21($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '045-00-00' and '054-99-99')
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '0')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_tetanus22($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '045-00-00' and '054-99-99')
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '1')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_tetanus23($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '055-00-00' and '058-99-99')
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '0')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_tetanus24($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '055-00-00' and '058-99-99')
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '1')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_tetanus25($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '059-00-00' and '069-99-99')
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '0')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_tetanus26($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '059-00-00' and '069-99-99')
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '1')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_tetanus27($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '070-00-00' and '099-99-99')
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '0')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_tetanus28($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '070-00-00' and '099-99-99')
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '1')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_hepa($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_hepa2($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_hepa3($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (fs_kd_jenis_inap='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_hepa4($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-00' and '000-00-07')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_hepa5($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-00' and '000-00-07')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_hepa6($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-00' and '000-00-07')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_hepa7($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-08' and '000-00-28')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_hepa8($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-08' and '000-00-28')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_hepa9($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-29' and '000-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_hepa10($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-29' and '000-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_hepa11($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '001-00-00' and '004-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9')  
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_hepa12($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '001-00-00' and '004-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9')  
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_hepa13($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '005-00-00' and '009-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9')  
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_hepa14($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '005-00-00' and '009-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_hepa15($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '010-00-00' and '014-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_hepa16($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '010-00-00' and '014-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_hepa17($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '015-00-00' and '019-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_hepa18($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '015-00-00' and '019-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9')  
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_hepa19($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '020-00-00' and '044-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9')  
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_hepa20($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '020-00-00' and '044-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_hepa21($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '045-00-00' and '054-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9')  
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_hepa22($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '045-00-00' and '054-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_hepa23($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '055-00-00' and '058-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9')  
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_hepa24($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '055-00-00' and '058-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_hepa25($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '059-00-00' and '069-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_hepa26($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '059-00-00' and '069-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9')  
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_hepa27($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '070-00-00' and '099-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_hepa28($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '070-00-00' and '099-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_rj_malaria($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_malaria2($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_malaria3($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1)
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_malaria4($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_rj_malaria5($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-00' and '000-00-07')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_malaria6($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-00' and '000-00-07')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_rj_malaria7($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-08' and '000-00-28')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_malaria8($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-08' and '000-00-28')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_rj_malaria9($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-29' and '001-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_malaria10($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-29' and '001-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_rj_malaria11($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '001-00-00' and '004-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_malaria12($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '001-00-00' and '004-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_rj_malaria13($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '005-00-00' and '009-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_malaria14($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '005-00-00' and '009-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_rj_malaria15($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '010-00-00' and '014-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_malaria16($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '010-00-00' and '014-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_rj_malaria17($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '015-00-00' and '019-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_malaria18($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '015-00-00' and '019-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_rj_malaria19($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '020-00-00' and '044-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_malaria20($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '020-00-00' and '044-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_rj_malaria21($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '045-00-00' and '054-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_malaria22($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '045-00-00' and '054-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_rj_malaria23($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '055-00-00' and '058-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_malaria24($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '055-00-00' and '058-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_rj_malaria25($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '059-00-00' and '069-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_malaria26($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '059-00-00' and '069-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_rj_malaria27($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '070-00-00' and '099-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_malaria28($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '070-00-00' and '099-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    
    function get_det_rj_pneu($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_pneu2($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_pneu3($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1) 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_pneu4($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_rj_pneu5($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-00' and '000-00-07')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_pneu6($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-00' and '000-00-07')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_rj_pneu7($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-08' and '000-00-28')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_pneu8($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-08' and '000-00-28')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_rj_pneu9($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-29' and '001-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_pneu10($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-29' and '001-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    
function get_det_rj_pneu11($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '001-00-00' and '004-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_pneu12($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '001-00-00' and '004-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_rj_pneu13($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '005-00-00' and '009-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_pneu14($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '005-00-00' and '009-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_rj_pneu15($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '010-00-00' and '014-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_pneu16($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '010-00-00' and '014-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_rj_pneu17($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '015-00-00' and '019-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_pneu18($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '015-00-00' and '019-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_rj_pneu19($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '020-00-00' and '044-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_pneu20($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '020-00-00' and '044-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_rj_pneu21($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '045-00-00' and '054-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_pneu22($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '045-00-00' and '054-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_rj_pneu23($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '055-00-00' and '058-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_pneu24($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '055-00-00' and '058-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_rj_pneu25($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '059-00-00' and '069-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_pneu26($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '059-00-00' and '069-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_rj_pneu27($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '070-00-00' and '099-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_pneu28($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '070-00-00' and '099-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    
    function get_det_rj_influ($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_influ2($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_influ3($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1)
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_influ4($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
 function get_det_rj_influ5($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-00' and '000-00-07')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_influ6($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-00' and '000-00-07')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
 function get_det_rj_influ7($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-08' and '000-00-28')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_influ8($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-08' and '000-00-28')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
 function get_det_rj_influ9($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-29' and '001-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_influ10($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-29' and '001-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
 function get_det_rj_influ11($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '001-00-00' and '004-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_influ12($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '001-00-00' and '004-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
 function get_det_rj_influ13($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '005-00-00' and '009-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_influ14($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '005-00-00' and '009-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
 function get_det_rj_influ15($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '010-00-00' and '014-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_influ16($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '010-00-00' and '014-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
 function get_det_rj_influ17($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '015-00-00' and '019-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_influ18($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '015-00-00' and '019-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
 function get_det_rj_influ19($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '020-00-00' and '044-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_influ20($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '020-00-00' and '044-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
 function get_det_rj_influ21($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '045-00-00' and '054-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_influ22($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '045-00-00' and '054-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
 function get_det_rj_influ23($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '055-00-00' and '058-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_influ24($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '055-00-00' and '058-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
 function get_det_rj_influ25($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '059-00-00' and '069-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_influ26($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '059-00-00' and '069-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
 function get_det_rj_influ27($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '070-00-00' and '099-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_influ28($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '070-00-00' and '099-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_ense($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_ense2($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_ense3($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1)
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_ense4($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_ense5($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-00' and '000-00-07')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_ense6($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-00' and '000-00-07')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_ense7($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-08' and '000-00-28')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_ense8($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-08' and '000-00-28')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_ense9($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-29' and '001-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_ense10($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-29' and '001-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_ense11($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '001-00-00' and '004-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_ense12($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '001-00-00' and '004-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_ense13($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '005-00-00' and '009-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_ense14($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '005-00-00' and '009-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_ense15($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '010-00-00' and '014-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_ense16($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '010-00-00' and '014-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_ense17($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '015-00-00' and '019-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_ense18($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '015-00-00' and '019-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_ense19($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '020-00-00' and '044-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_ense20($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '020-00-00' and '044-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_ense21($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '045-00-00' and '054-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_ense22($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '045-00-00' and '054-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_ense23($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '055-00-00' and '058-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_ense24($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '055-00-00' and '058-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_ense25($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '059-00-00' and '069-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_ense26($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '059-00-00' and '069-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_ense27($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '070-00-00' and '099-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_ense28($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '070-00-00' and '099-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_mening($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_mening2($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_mening3($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1)
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_mening4($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_mening5($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-00' and '000-00-07')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_mening6($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-00' and '000-00-07')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_mening7($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-08' and '000-00-28')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_mening8($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-08' and '000-00-28')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_mening9($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-29' and '001-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_mening10($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-29' and '001-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_mening11($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '001-00-00' and '004-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_mening12($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '001-00-00' and '004-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_mening13($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '005-00-00' and '009-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_mening14($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '005-00-00' and '009-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_mening15($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '010-00-00' and '014-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_mening16($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '010-00-00' and '014-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_mening17($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '015-00-00' and '019-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_mening18($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '015-00-00' and '019-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_mening19($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '020-00-00' and '044-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_mening20($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '020-00-00' and '044-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_mening21($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '045-00-00' and '054-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_mening22($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '045-00-00' and '054-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_mening23($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '055-00-00' and '058-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_mening24($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '055-00-00' and '058-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_mening25($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '059-00-00' and '069-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_mening26($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '059-00-00' and '069-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_mening27($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '070-00-00' and '099-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_rj_mening28($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '070-00-00' and '099-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    /* rawat inap */

    function get_det_ri_1($params) {
            $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where aa.fb_kasus_baru=1 and fs_jns_kelamin <> '1' 
                and fs_kd_jenis_inap!='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
            $query3 = $this->db->query($sql3, $params);
            if ($query3->num_rows() > 0) {
                $result3 = $query3->row_array();
                $query3->free_result();
                return $result3;
            } else {
                return array();
            }
        }
    

    function get_det_ri_2($params) {
            $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where aa.fb_kasus_baru=1 and fs_jns_kelamin <> '0' 
                and fs_kd_jenis_inap!='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
            $query3 = $this->db->query($sql3, $params);
            if ($query3->num_rows() > 0) {
                $result3 = $query3->row_array();
                $query3->free_result();
                return $result3;
            } else {
                return array();
            }
        }
    

    function get_det_ri_3($params) {
            $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where aa.fb_kasus_baru=1
                and fs_kd_jenis_inap!='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
            $query3 = $this->db->query($sql3, $params);
            if ($query3->num_rows() > 0) {
                $result3 = $query3->row_array();
                $query3->free_result();
                return $result3;
            } else {
                return array();
            }
        }
    

    function get_det_ri_4($params) {
            $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where fs_kd_jenis_inap!='' and ee.fs_kd_dtd=? and (fd_tgl_mati <> '3000-01-01') 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
            $query3 = $this->db->query($sql3, $params);
            if ($query3->num_rows() > 0) {
                $result3 = $query3->row_array();
                $query3->free_result();
                return $result3;
            } else {
                return array();
            }
        }
    

    function get_det_ri_5($params) {
            $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-00' and '000-00-07'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '0' 
                and fs_kd_jenis_inap!='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
            $query3 = $this->db->query($sql3, $params);
            if ($query3->num_rows() > 0) {
                $result3 = $query3->row_array();
                $query3->free_result();
                return $result3;
            } else {
                return array();
            }
        }
    

    function get_det_ri_6($params) {
            $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-00' and '000-00-07'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '1' 
                and fs_kd_jenis_inap!='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
            $query3 = $this->db->query($sql3, $params);
            if ($query3->num_rows() > 0) {
                $result3 = $query3->row_array();
                $query3->free_result();
                return $result3;
            } else {
                return array();
            }
        }
    

    function get_det_ri_7($params) {
            $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-08' and '000-00-28'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '0' 
                and fs_kd_jenis_inap!='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
            $query3 = $this->db->query($sql3, $params);
            if ($query3->num_rows() > 0) {
                $result3 = $query3->row_array();
                $query3->free_result();
                return $result3;
            } else {
                return array();
            }
        }
    

    function get_det_ri_8($params) {
            $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-08' and '000-00-28'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '1' 
                and fs_kd_jenis_inap!='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
            $query3 = $this->db->query($sql3, $params);
            if ($query3->num_rows() > 0) {
                $result3 = $query3->row_array();
                $query3->free_result();
                return $result3;
            } else {
                return array();
            }
        }
    

    function get_det_ri_9($params) {
            $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-29' and '000-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '0' 
                and fs_kd_jenis_inap!='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
            $query3 = $this->db->query($sql3, $params);
            if ($query3->num_rows() > 0) {
                $result3 = $query3->row_array();
                $query3->free_result();
                return $result3;
            } else {
                return array();
            }
        }
    

    function get_det_ri_10($params) {
            $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-29' and '000-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '1' 
                and fs_kd_jenis_inap!='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
            $query3 = $this->db->query($sql3, $params);
            if ($query3->num_rows() > 0) {
                $result3 = $query3->row_array();
                $query3->free_result();
                return $result3;
            } else {
                return array();
            }
        }
    

    function get_det_ri_11($params) {
            $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '001-00-00' and '004-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '0' 
                and fs_kd_jenis_inap!='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
            $query3 = $this->db->query($sql3, $params);
            if ($query3->num_rows() > 0) {
                $result3 = $query3->row_array();
                $query3->free_result();
                return $result3;
            } else {
                return array();
            }
        }
    

    function get_det_ri_12($params) {
            $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '001-00-00' and '004-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '1' 
                and fs_kd_jenis_inap!='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
            $query3 = $this->db->query($sql3, $params);
            if ($query3->num_rows() > 0) {
                $result3 = $query3->row_array();
                $query3->free_result();
                return $result3;
            } else {
                return array();
            }
        }
    

    function get_det_ri_13($params) {
            $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '005-00-00' and '009-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '0' 
                and fs_kd_jenis_inap!='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
            $query3 = $this->db->query($sql3, $params);
            if ($query3->num_rows() > 0) {
                $result3 = $query3->row_array();
                $query3->free_result();
                return $result3;
            } else {
                return array();
            }
        }
    

    function get_det_ri_14($params) {
            $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '005-00-00' and '009-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '1' 
                and fs_kd_jenis_inap!='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
            $query3 = $this->db->query($sql3, $params);
            if ($query3->num_rows() > 0) {
                $result3 = $query3->row_array();
                $query3->free_result();
                return $result3;
            } else {
                return array();
            }
        }
    

    function get_det_ri_15($params) {
            $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '010-00-00' and '014-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '0' 
                and fs_kd_jenis_inap!='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
            $query3 = $this->db->query($sql3, $params);
            if ($query3->num_rows() > 0) {
                $result3 = $query3->row_array();
                $query3->free_result();
                return $result3;
            } else {
                return array();
            }
        }
    

    function get_det_ri_16($params) {
            $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '010-00-00' and '014-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '1' 
                and fs_kd_jenis_inap!='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
            $query3 = $this->db->query($sql3, $params);
            if ($query3->num_rows() > 0) {
                $result3 = $query3->row_array();
                $query3->free_result();
                return $result3;
            } else {
                return array();
            }
        }
    

    function get_det_ri_17($params) {
            $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '015-00-00' and '019-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '0' 
                and fs_kd_jenis_inap!='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
            $query3 = $this->db->query($sql3, $params);
            if ($query3->num_rows() > 0) {
                $result3 = $query3->row_array();
                $query3->free_result();
                return $result3;
            } else {
                return array();
            }
        }
    

    function get_det_ri_18($params) {
            $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '015-00-00' and '019-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '1' 
                and fs_kd_jenis_inap!='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
            $query3 = $this->db->query($sql3, $params);
            if ($query3->num_rows() > 0) {
                $result3 = $query3->row_array();
                $query3->free_result();
                return $result3;
            } else {
                return array();
            }
        }
    

    function get_det_ri_19($params) {
            $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '020-00-00' and '044-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '0' 
                and fs_kd_jenis_inap!='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
            $query3 = $this->db->query($sql3, $params);
            if ($query3->num_rows() > 0) {
                $result3 = $query3->row_array();
                $query3->free_result();
                return $result3;
            } else {
                return array();
            }
        }
    

    function get_det_ri_20($params) {
            $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '020-00-00' and '044-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '1' 
                and fs_kd_jenis_inap!='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
            $query3 = $this->db->query($sql3, $params);
            if ($query3->num_rows() > 0) {
                $result3 = $query3->row_array();
                $query3->free_result();
                return $result3;
            } else {
                return array();
            }
        }
    

    function get_det_ri_21($params) {
            $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '045-00-00' and '054-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '0' 
                and fs_kd_jenis_inap!='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
            $query3 = $this->db->query($sql3, $params);
            if ($query3->num_rows() > 0) {
                $result3 = $query3->row_array();
                $query3->free_result();
                return $result3;
            } else {
                return array();
            }
        }
    

    function get_det_ri_22($params) {
            $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '045-00-00' and '054-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '1' 
                and fs_kd_jenis_inap!='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
            $query3 = $this->db->query($sql3, $params);
            if ($query3->num_rows() > 0) {
                $result3 = $query3->row_array();
                $query3->free_result();
                return $result3;
            } else {
                return array();
            }
        }
    

    function get_det_ri_23($params) {
            $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '055-00-00' and '058-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '0' 
                and fs_kd_jenis_inap!='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
            $query3 = $this->db->query($sql3, $params);
            if ($query3->num_rows() > 0) {
                $result3 = $query3->row_array();
                $query3->free_result();
                return $result3;
            } else {
                return array();
            }
        }
    

    function get_det_ri_24($params) {
            $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '055-00-00' and '058-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '1' 
                and fs_kd_jenis_inap!='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
            $query3 = $this->db->query($sql3, $params);
            if ($query3->num_rows() > 0) {
                $result3 = $query3->row_array();
                $query3->free_result();
                return $result3;
            } else {
                return array();
            }
        }
    

    function get_det_ri_25($params) {
            $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '059-00-00' and '069-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '0' 
                and fs_kd_jenis_inap!='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
            $query3 = $this->db->query($sql3, $params);
            if ($query3->num_rows() > 0) {
                $result3 = $query3->row_array();
                $query3->free_result();
                return $result3;
            } else {
                return array();
            }
        }
    

    function get_det_ri_26($params) {
            $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '059-00-00' and '069-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '1' 
                and fs_kd_jenis_inap!='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
            $query3 = $this->db->query($sql3, $params);
            if ($query3->num_rows() > 0) {
                $result3 = $query3->row_array();
                $query3->free_result();
                return $result3;
            } else {
                return array();
            }
        }
    

    function get_det_ri_27($params) {
            $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '070-00-00' and '999-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '0' 
                and fs_kd_jenis_inap!='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
            $query3 = $this->db->query($sql3, $params);
            if ($query3->num_rows() > 0) {
                $result3 = $query3->row_array();
                $query3->free_result();
                return $result3;
            } else {
                return array();
            }
        }
    

    function get_det_ri_28($params) {
            $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '070-00-00' and '999-99-99'
                and aa.fb_kasus_baru=1 and fs_jns_kelamin = '1' 
                and fs_kd_jenis_inap!='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
            $query3 = $this->db->query($sql3, $params);
            if ($query3->num_rows() > 0) {
                $result3 = $query3->row_array();
                $query3->free_result();
                return $result3;
            } else {
                return array();
            }
        }
    

    function get_det_ri2($params) {
            $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where aa.fb_kasus_baru=1 and fs_jns_kelamin <> '0' 
                and fs_kd_jenis_inap!='' and ee.fs_kd_dtd=? 
                and aa.fs_kd_diagnosa like ? and fd_tgl_keluar between ? and ?";
            $query3 = $this->db->query($sql3, $params);
            if ($query3->num_rows() > 0) {
                $result3 = $query3->row_array();
                $query3->free_result();
                return $result3;
            } else {
                return array();
            }
        }
    
 function get_det_ri_tetanus($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1) and (fs_jns_kelamin = '0' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_tetanus2($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1) and (fs_jns_kelamin = '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_tetanus3($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1) 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_tetanus5($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-00' and '000-00-07')
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '0' )
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_tetanus6($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-00' and '000-00-07')
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '1' )
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_tetanus4($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' )
                and(fd_tgl_mati <> '3000-01-01') 
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_tetanus7($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-08' and '000-00-28')
                and (fs_kd_jenis_inap!='')and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '0')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_tetanus8($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-08' and '000-00-28')
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '1')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_tetanus9($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-29' and '000-99-99')
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '0')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_tetanus10($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-29' and '000-99-99')
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '1')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_tetanus11($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '001-00-00' and '004-99-99')
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '0')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_tetanus12($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '001-00-00' and '004-99-99')
                and (fs_kd_jenis_inap!='')and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '1')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_tetanus13($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '005-00-00' and '009-99-99')
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '0')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_tetanus14($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '005-00-00' and '009-99-99')
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '1')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_tetanus15($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '010-00-00' and '014-99-99')
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '0')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_tetanus16($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '010-00-00' and '014-99-99')
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '1')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_tetanus17($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '015-00-00' and '019-99-99')
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '0')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_tetanus18($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '015-00-00' and '019-99-99')
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '1')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_tetanus19($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '020-00-00' and '044-99-99')
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '0')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_tetanus20($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '020-00-00' and '044-99-99')
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '1')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_tetanus21($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '045-00-00' and '054-99-99')
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '0')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_tetanus22($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '045-00-00' and '054-99-99')
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '1')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_tetanus23($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '055-00-00' and '058-99-99')
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '0')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_tetanus24($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '055-00-00' and '058-99-99')
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '1')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_tetanus25($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '059-00-00' and '069-99-99')
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '0')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_tetanus26($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '059-00-00' and '069-99-99')
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '1')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_tetanus27($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '070-00-00' and '099-99-99')
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '0')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_tetanus28($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '070-00-00' and '099-99-99')
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?  or ee.fs_kd_dtd='013' ) 
                and (fs_jns_kelamin = '1')
                and (aa.fs_kd_diagnosa LIKE 'A33%'
                OR aa.fs_kd_diagnosa LIKE 'A34%'
                OR aa.fs_kd_diagnosa LIKE 'A35%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_hepa($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_hepa2($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_hepa3($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (fs_kd_jenis_inap!='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_hepa4($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-00' and '000-00-07')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and(fd_tgl_mati <> '3000-01-01') 
                and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_hepa5($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-00' and '000-00-07')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_hepa6($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-00' and '000-00-07')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_hepa7($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-08' and '000-00-28')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_hepa8($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-08' and '000-00-28')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_hepa9($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-29' and '000-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_hepa10($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-29' and '000-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_hepa11($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '001-00-00' and '004-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9')  
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_hepa12($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '001-00-00' and '004-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9')  
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_hepa13($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '005-00-00' and '009-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9')  
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_hepa14($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '005-00-00' and '009-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_hepa15($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '010-00-00' and '014-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_hepa16($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '010-00-00' and '014-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_hepa17($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '015-00-00' and '019-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_hepa18($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '015-00-00' and '019-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9')  
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_hepa19($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '020-00-00' and '044-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9')  
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_hepa20($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '020-00-00' and '044-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_hepa21($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '045-00-00' and '054-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9')  
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_hepa22($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '045-00-00' and '054-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_hepa23($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '055-00-00' and '058-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9')  
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_hepa24($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '055-00-00' and '058-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_hepa25($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '059-00-00' and '069-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_hepa26($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '059-00-00' and '069-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9')  
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_hepa27($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '070-00-00' and '099-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and  (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_hepa28($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '070-00-00' and '099-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='038.9'
                or ee.fs_kd_dtd='038.2'or ee.fs_kd_dtd='242.9') 
                and (aa.fs_kd_diagnosa like 'B15%' OR aa.fs_kd_diagnosa like 'B17%' 
                OR aa.fs_kd_diagnosa like 'B18%' OR aa.fs_kd_diagnosa like 'B19%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }

    function get_det_ri_malaria($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_malaria2($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_malaria3($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1)
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_malaria4($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (fs_kd_jenis_inap!='') and(fd_tgl_mati <> '3000-01-01') 
                and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_ri_malaria5($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-00' and '000-00-07')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_malaria6($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-00' and '000-00-07')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_ri_malaria7($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-08' and '000-00-28')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_malaria8($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-08' and '000-00-28')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_ri_malaria9($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-29' and '001-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_malaria10($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-29' and '001-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_ri_malaria11($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '001-00-00' and '004-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_malaria12($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '001-00-00' and '004-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_ri_malaria13($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '005-00-00' and '009-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_malaria14($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '005-00-00' and '009-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_ri_malaria15($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '010-00-00' and '014-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_malaria16($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '010-00-00' and '014-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_ri_malaria17($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '015-00-00' and '019-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_malaria18($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '015-00-00' and '019-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_ri_malaria19($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '020-00-00' and '044-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_malaria20($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '020-00-00' and '044-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_ri_malaria21($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '045-00-00' and '054-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_malaria22($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '045-00-00' and '054-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_ri_malaria23($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '055-00-00' and '058-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_malaria24($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '055-00-00' and '058-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_ri_malaria25($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '059-00-00' and '069-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_malaria26($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '059-00-00' and '069-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_ri_malaria27($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '070-00-00' and '099-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_malaria28($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '070-00-00' and '099-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd = '043.3'
                or ee.fs_kd_dtd = '043.4' or ee.fs_kd_dtd = '043.5')
                and (aa.fs_kd_diagnosa like 'B50%' OR aa.fs_kd_diagnosa like 'B52%' 
                OR aa.fs_kd_diagnosa like 'B53%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
        function get_det_ri_pneu($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_pneu2($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_pneu3($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1) 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_pneu4($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (fs_kd_jenis_inap!='') and(fd_tgl_mati <> '3000-01-01') 
                and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_ri_pneu5($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-00' and '000-00-07')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_pneu6($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-00' and '000-00-07')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_ri_pneu7($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-08' and '000-00-28')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_pneu8($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-08' and '000-00-28')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_ri_pneu9($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-29' and '001-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_pneu10($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-29' and '001-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    
function get_det_ri_pneu11($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '001-00-00' and '004-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_pneu12($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '001-00-00' and '004-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_ri_pneu13($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '005-00-00' and '009-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_pneu14($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '005-00-00' and '009-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_ri_pneu15($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '010-00-00' and '014-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_pneu16($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '010-00-00' and '014-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_ri_pneu17($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '015-00-00' and '019-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_pneu18($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '015-00-00' and '019-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_ri_pneu19($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '020-00-00' and '044-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_pneu20($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '020-00-00' and '044-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_ri_pneu21($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '045-00-00' and '054-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_pneu22($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '045-00-00' and '054-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_ri_pneu23($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '055-00-00' and '058-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_pneu24($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '055-00-00' and '058-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_ri_pneu25($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '059-00-00' and '069-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_pneu26($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '059-00-00' and '069-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
function get_det_ri_pneu27($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '070-00-00' and '099-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_pneu28($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '070-00-00' and '099-99-99')
                and (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'J12%' OR aa.fs_kd_diagnosa like 'J13%' 
                OR aa.fs_kd_diagnosa like 'J14%' OR aa.fs_kd_diagnosa like 'J15%'
                OR aa.fs_kd_diagnosa like 'J16%' OR aa.fs_kd_diagnosa like 'J17%'
                OR aa.fs_kd_diagnosa like 'J18%')
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
     
    function get_det_ri_influ($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_influ2($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_influ3($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1)
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_influ4($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (fs_kd_jenis_inap!='') and(fd_tgl_mati <> '3000-01-01') 
                and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
 function get_det_ri_influ5($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-00' and '000-00-07')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_influ6($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-00' and '000-00-07')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
 function get_det_ri_influ7($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-08' and '000-00-28')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_influ8($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-08' and '000-00-28')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
 function get_det_ri_influ9($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-29' and '001-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_influ10($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-29' and '001-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
 function get_det_ri_influ11($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '001-00-00' and '004-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_influ12($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '001-00-00' and '004-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
 function get_det_ri_influ13($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '005-00-00' and '009-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_influ14($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '005-00-00' and '009-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
 function get_det_ri_influ15($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '010-00-00' and '014-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_influ16($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '010-00-00' and '014-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
 function get_det_ri_influ17($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '015-00-00' and '019-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_influ18($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '015-00-00' and '019-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
 function get_det_ri_influ19($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '020-00-00' and '044-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_influ20($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '020-00-00' and '044-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
 function get_det_ri_influ21($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '045-00-00' and '054-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_influ22($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '045-00-00' and '054-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
 function get_det_ri_influ23($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '055-00-00' and '058-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_influ24($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '055-00-00' and '058-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
 function get_det_ri_influ25($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '059-00-00' and '069-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_influ26($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '059-00-00' and '069-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
 function get_det_ri_influ27($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '070-00-00' and '099-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and fd_tgl_keluar between ? and ?";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_influ28($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '070-00-00' and '099-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='242.9' or ee.fs_kd_dtd='168.0') 
                and (aa.fs_kd_diagnosa like 'J10%' OR aa.fs_kd_diagnosa like 'J11%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
     function get_det_ri_ense($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_ense2($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_ense3($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1)
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_ense4($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (fs_kd_jenis_inap!='') and(fd_tgl_mati <> '3000-01-01') 
                and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_ense5($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-00' and '000-00-07')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_ense6($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-00' and '000-00-07')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_ense7($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-08' and '000-00-28')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_ense8($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-08' and '000-00-28')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_ense9($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-29' and '001-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_ense10($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-29' and '001-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_ense11($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '001-00-00' and '004-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_ense12($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '001-00-00' and '004-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_ense13($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '005-00-00' and '009-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_ense14($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '005-00-00' and '009-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_ense15($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '010-00-00' and '014-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_ense16($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '010-00-00' and '014-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_ense17($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '015-00-00' and '019-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_ense18($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '015-00-00' and '019-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_ense19($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '020-00-00' and '044-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_ense20($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '020-00-00' and '044-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_ense21($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '045-00-00' and '054-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_ense22($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '045-00-00' and '054-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_ense23($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '055-00-00' and '058-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_ense24($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '055-00-00' and '058-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_ense25($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '059-00-00' and '069-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_ense26($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '059-00-00' and '069-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_ense27($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '070-00-00' and '099-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0' )
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_ense28($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '070-00-00' and '099-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1' )
                and (fs_kd_jenis_inap='') and (ee.fs_kd_dtd=?) 
                and (aa.fs_kd_diagnosa like 'G04%' OR aa.fs_kd_diagnosa like 'G05%') 
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
     function get_det_ri_mening($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_mening2($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_mening3($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (aa.fb_kasus_baru=1)
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_mening4($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (fs_kd_jenis_inap!='') and(fd_tgl_mati <> '3000-01-01') 
                and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_mening5($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-00' and '000-00-07')
                and(aa.fb_kasus_baru=1) 
                and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_mening6($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-00' and '000-00-07')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_mening7($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-08' and '000-00-28')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_mening8($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-08' and '000-00-28')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_mening9($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-29' and '001-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_mening10($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '000-00-29' and '001-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_mening11($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '001-00-00' and '004-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_mening12($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '001-00-00' and '004-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_mening13($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '005-00-00' and '009-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_mening14($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '005-00-00' and '009-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_mening15($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '010-00-00' and '014-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_mening16($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '010-00-00' and '014-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_mening17($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '015-00-00' and '019-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_mening18($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '015-00-00' and '019-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_mening19($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '020-00-00' and '044-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_mening20($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '020-00-00' and '044-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_mening21($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '045-00-00' and '054-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_mening22($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '045-00-00' and '054-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_mening23($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '055-00-00' and '058-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_mening24($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '055-00-00' and '058-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_mening25($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '059-00-00' and '069-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_mening26($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '059-00-00' and '069-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_mening27($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '070-00-00' and '099-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '0') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
    function get_det_ri_mening28($params) {
        $sql3 = "select count(aa.fs_kd_reg) fn_jumlah 
                from hospital.dbo.tc_mr2 aa 
                left join hospital.dbo.ta_registrasi bb on aa.fs_kd_reg=bb.fs_kd_reg 
                left join hospital.dbo.tc_mr cc on cc.fs_mr=bb.fs_mr 
                left join hospital.dbo.tc_mr1 dd on aa.fs_kd_reg=dd.fs_kd_reg
                left join hospital.dbo.tc_icd ee on aa.fs_kd_diagnosa=ee.fs_kd_icd
                where (hospital.dbo.if_get_umur_by_reg(aa.fs_kd_reg) between '070-00-00' and '099-99-99')
                and(aa.fb_kasus_baru=1) and (fs_jns_kelamin <> '1') 
                and (fs_kd_jenis_inap!='') and (ee.fs_kd_dtd=? or ee.fs_kd_dtd='119.9')
                and (aa.fs_kd_diagnosa like 'G00%' OR aa.fs_kd_diagnosa like 'G03%' )
                and (fd_tgl_keluar between ? and ?)";
        $query3 = $this->db->query($sql3, $params);
        if ($query3->num_rows() > 0) {
            $result3 = $query3->row_array();
            $query3->free_result();
            return $result3;
        } else {
            return array();
        }
    }
}
