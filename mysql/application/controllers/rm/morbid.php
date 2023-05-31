<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class morbid extends ApplicationBase {

// constructor
    public function __construct() {
// parent constructor
        parent::__construct();
// load model
        $this->load->model('m_morbid');
        $this->load->model('m_rawat_jalan');
        $this->smarty->assign('m_morbid', $this->m_morbid);
        $this->load->library('tnotification');
    }

    public function index() {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "rm/morbid/index.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $search = $this->tsession->userdata('rm_morbid');
        if (!empty($search)) {
            $this->smarty->assign("search", $search);
        }
        if (empty($search['FD_TGL_MASUK'])) {
            $search['FD_TGL_MASUK'] = date('Y-m-d');
            $this->smarty->assign("search", $search);
        }
        $this->smarty->assign("FD_TGL_MASUK", $search['FD_TGL_MASUK']);
        $FD_TGL_MASUK = empty($search['FD_TGL_MASUK']) ? : $search['FD_TGL_MASUK'];
        $this->smarty->assign("no", 1);
        $this->smarty->assign("rs_pasien", $this->m_morbid->get_px_by_dokter_pulang(array($FD_TGL_MASUK)));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }

    // searching
    public function proses_cari() {
        //set page rules
        $this->_set_page_rule("R");
        //data
        if ($this->input->post('save') == "Reset") {
            $this->tsession->unset_userdata("rm_morbid");
        } else {
            $params = array(
                "FD_TGL_MASUK" => $this->input->post("FD_TGL_MASUK")
            );
            $this->tsession->set_userdata("rm_morbid", $params);
        }
        // redirect
        redirect("rm/morbid");
    }

    public function history($FS_MR = "", $FS_KD_PEG = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "rm/morbid/history.html");
        $this->smarty->load_javascript('resource/js/jquery.datatables/jquery.dataTables.js');
        $this->smarty->load_javascript('resource/js/jquery.datatables/dataTables.fixedHeader.js');
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->load_style("jquery.ui/datatables/jquery.dataTables.css");
// load javascript
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-1.9.2.custom.min.js');
// get search parameter
        $now = date('Y-m-d');
        $medis = $FS_KD_PEG;
        $this->smarty->assign("no", '1');
        $this->smarty->assign("FS_KD_MEDIS", $FS_KD_PEG);
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rm(array($now, $FS_MR)));
        $this->smarty->assign("rs_pasien", $this->m_morbid->get_px_history(array($now, $medis, $medis, $medis, $FS_MR)));
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }

    public function add($FS_KD_REG = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "rm/morbid/add.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $this->smarty->assign("result", $this->m_morbid->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG, $FS_KD_MEDIS, $FS_KD_MEDIS, $FS_KD_MEDIS)));
        $this->smarty->assign('rs_bill', $this->m_morbid->get_bill_rg_all_lap($FS_KD_REG));
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }

    public function add_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('FS_KD_KEADAAN_KELUAR_DK'),
                $this->input->post('FS_KD_CARA_KELUAR_DK'),
                $this->input->post('FS_KD_ICD_RUJUKAN'),
                $this->input->post('FS_KD_LAYANAN_DK'),
                date('Y-m-d'),
                date('H:i:s'),
                $this->com_user['user_name'],
                date('Y-m-d'),
                date('H:i:s'),
                date('Y-m-d'),
                date('H:i:s'),
                $this->com_user['user_name']
            );
            // insert
            if ($this->m_morbid->insert($params)) {
                // notification
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            } else {
                // default error
                $this->tnotification->sent_notification("error", "Detail gagal disimpan");
                redirect("rm/morbid/add/" . $this->input->post('FS_KD_REG'));
            }
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
            redirect("rm/morbid/add/" . $this->input->post('FS_KD_REG'));
        }
        // default redirect
        redirect("rm/morbid");
    }

    public function edit($FS_KD_REG = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "rm/morbid/edit.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $this->smarty->assign("result", $this->m_morbid->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG, $FS_KD_MEDIS, $FS_KD_MEDIS, $FS_KD_MEDIS)));
        $this->smarty->assign("rs_morbid", $this->m_morbid->get_morbid_by_rg(array($FS_KD_REG)));
        $this->smarty->assign('rs_bill', $this->m_morbid->get_bill_rg_all_lap($FS_KD_REG));
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }
    
    public function edit_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_KEADAAN_KELUAR_DK'),
                $this->input->post('FS_KD_CARA_KELUAR_DK'),
                $this->input->post('FS_KD_ICD_RUJUKAN'),
                $this->input->post('FS_KD_LAYANAN_DK'),
                date('Y-m-d'),
                date('H:i:s'),
                $this->com_user['user_name'],
                $this->input->post('FS_KD_REG')
            );
            // insert
            if ($this->m_morbid->update($params)) {
                // notification
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            } else {
                // default error
                $this->tnotification->sent_notification("error", "Detail gagal disimpan");
                redirect("rm/morbid/edit/" . $this->input->post('FS_KD_REG'));
            }
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
            redirect("rm/morbid/edit/" . $this->input->post('FS_KD_REG'));
        }
        // default redirect
        redirect("rm/morbid");
    }
    
    public function add_process_diag() {
        $rs_max_diag = $this->m_morbid->get_max_diag(array($this->input->post('FS_KD_REG')));
        $params = array(
            $this->input->post('FS_KD_REG'),
            $this->input->post('FS_KD_DIAGNOSA'),
            $this->input->post('FS_KD_LAYANAN'),
            $rs_max_diag['FN_URUT'] + 1,
            $this->input->post('FB_UTAMA'),
            date('Y-m-d'),
            date('H:i:s'),
            $this->com_user['user_name']
        );
        // insert
        $data = $this->m_morbid->insert_diag($params);
        echo json_encode($data);
    }

    public function add_process_pro() {
        $rs_max_pro = $this->m_morbid->get_max_pro(array($this->input->post('FS_KD_REG')));
        $params = array(
            $this->input->post('FS_KD_REG'),
            $rs_max_pro['FN_URUT'] + 1,
            $this->input->post('FS_KD_DIAGNOSAICD9CM')
        );
        // insert
        $data = $this->m_morbid->insert_pro($params);
        echo json_encode($data);
    }

    public function list_diag() {
        $params = array(
            $this->input->post('FS_KD_REG2')
        );
        // insert
        $data = $this->m_morbid->get_diag($params);
        echo json_encode($data);
    }

    public function list_pro() {
        $params = array(
            $this->input->post('FS_KD_REG2')
        );
        // insert
        $data = $this->m_morbid->get_pro($params);
        echo json_encode($data);
    }

    public function delete_process_diag() {
        $params = array(
            $this->input->post('kode')
        );
        // insert
        $data = $this->m_morbid->delete_diag($params);
        echo json_encode($data);
    }

    public function delete_process_pro() {
        $params = array(
            $this->input->post('kode')
        );
        // insert
        $data = $this->m_morbid->delete_pro($params);
        echo json_encode($data);
    }

    public function icd() {
        $FS_KD_ICD = $this->input->post('FS_KD_ICD');
        $icd = $this->m_morbid->get_all_icd(array($FS_KD_ICD));
        $icd_row = $this->m_morbid->get_all_icd_row(array($FS_KD_ICD));
        if ($icd_row > 0) { // Jika data lebih dari 0
            $callback = array(
                'status' => 'success', // Set array status dengan success
                'FS_KET_ICD' => $icd['FS_KET_ICD'], // Set array jenis_kelamin dengan isi kolom jenis_kelamin pada tabel siswa
            );
        } else {
            $callback = array('status' => 'failed'); // set array status dengan failed
        }
        echo json_encode($callback);
    }

    public function icd9() {
        $FS_KD_ICD = $this->input->post('FS_KD_ICD');
        $icd = $this->m_morbid->get_all_icd9(array($FS_KD_ICD));
        $icd_row = $this->m_morbid->get_all_icd9_row(array($FS_KD_ICD));
        if ($icd_row > 0) { // Jika data lebih dari 0
            $callback = array(
                'status' => 'success', // Set array status dengan success
                'FS_NM_ICD9CM' => $icd['FS_NM_ICD9CM'], // Set array jenis_kelamin dengan isi kolom jenis_kelamin pada tabel siswa
            );
        } else {
            $callback = array('status' => 'failed'); // set array status dengan failed
        }
        echo json_encode($callback);
    }

}
