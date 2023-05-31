<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class konsul_medis extends ApplicationBase {

// constructor
    public function __construct() {
// parent constructor
        parent::__construct();
// load model
        $this->load->model('m_inap_konsul_medis');
        $this->smarty->assign('m_inap_konsul_medis', $this->m_inap_konsul_medis);
        $this->load->library('tnotification');
    }

// list surat masuk
    public function index() {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "inap/konsul_medis/index.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        // search parameters
        $date = date('Y-m-d');
        $date2 = date('Y-m-dH:i:s');
        $this->smarty->assign("no", '1');
        $this->smarty->assign("no2", '1');
        $this->smarty->assign("rs_pasien", $this->m_inap_konsul_medis->get_px_by_dokter(array($date, $date2, $this->com_user['user_name'])));

        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function add($FS_KD_REG = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "inap/konsul_medis/add.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("no", 1);
        $this->smarty->assign("rs_dokter", $this->m_inap_konsul_medis->get_dokter());
        $this->smarty->assign("rs_pasien", $this->m_inap_konsul_medis->get_pasien_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("rs_konsul", $this->m_inap_konsul_medis->get_konsul_by_rg(array($FS_KD_REG)));
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
                $this->input->post('FS_KET1'),
                $this->input->post('FS_KET2'),
                '0',
                $this->com_user['user_name'],
                date('Y-m-d'),
                date('H:i:s')
            );
            // insert
            if ($this->m_inap_konsul_medis->insert($params)) {
                $FS_KD_TRS_KONSUL = $this->m_inap_konsul_medis->get_last_inserted_id();
                $FS_KD_PEG = $this->input->post('tujuan');
                //if (!empty($FS_KD_PEG)) {
                //    foreach ($FS_KD_PEG as $value) {
                        $this->m_inap_konsul_medis->insert_dokter(array($FS_KD_TRS_KONSUL, $FS_KD_PEG));
                //    }
                //}

                // notification
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            } else {
                // default error
                $this->tnotification->sent_notification("error", "Detail gagal disimpan");
            }
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("inap/konsul_medis");
    }

    public function edit($FS_KD_REG = "", $FS_KD_TRS = "") {
// set page rules
        $this->_set_page_rule("U");
// set template content
        $this->smarty->assign("template_content", "inap/konsul_medis/edit.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_dokter", $this->m_inap_konsul_medis->get_dokter());
        $this->smarty->assign("rs_pasien", $this->m_inap_konsul_medis->get_pasien_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("result", $this->m_inap_konsul_medis->get_konsul_by_trs(array($FS_KD_TRS)));
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }

    public function edit_process() {
        // set page rules
        $this->_set_page_rule("U");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
        $this->tnotification->set_rules('FS_KD_TRS', 'KODE TRANSAKSI', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KET1'),
                $this->input->post('FS_KET2'),
                '0',
                $this->com_user['user_name'],
                date('Y-m-d'),
                date('H:i:s'),
                $this->input->post('FS_KD_TRS')
            );
            // insert
            if ($this->m_inap_konsul_medis->update($params)) {

                $masalah_kep = $this->input->post('tujuan');
                $this->m_inap_konsul_medis->delete_dokter($this->input->post('FS_KD_TRS'));
                //if (!empty($masalah_kep)) {
                 //   foreach ($masalah_kep as $value) {
                        $this->m_inap_konsul_medis->insert_dokter(array($this->input->post('FS_KD_TRS'), $masalah_kep));
                  //  }
                //}
                // notification
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            } else {
                // default error
                $this->tnotification->sent_notification("error", "Detail gagal disimpan");
            }
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("inap/konsul_medis/add/" . $this->input->post('FS_KD_REG'));
    }

    public function list_dokter() {
        $instansi = $this->m_inap_konsul_medis->get_dokter();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['FS_NM_PEG'],
                'value' => $value['FS_KD_PEG']
            );
            $i++;
        }
        echo json_encode($data);
    }

    
    public function jawaban() {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "inap/konsul_medis/jawab_index.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        // search parameters
        $date = date('Y-m-d');
        $date2 = date('Y-m-dH:i:s');
        $this->smarty->assign("no", '1');
        $this->smarty->assign("no2", '1');
        $this->smarty->assign("rs_pasien", $this->m_inap_konsul_medis->get_px_by_jawab_dokter(array($date, $date2, $this->com_user['user_name'])));

        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }
    public function jawab_add($FS_KD_REG="") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "inap/konsul_medis/jawab_add.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("no", 1);
        $this->smarty->assign("rs_pasien", $this->m_inap_konsul_medis->get_pasien_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("rs_konsul", $this->m_inap_konsul_medis->get_konsul_by_rg(array($FS_KD_REG)));
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }
    
    public function jawab_edit($FS_KD_REG = "", $FS_KD_TRS = "") {
// set page rules
        $this->_set_page_rule("U");
// set template content
        $this->smarty->assign("template_content", "inap/konsul_medis/jawab_edit.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        
        $this->smarty->assign('rs_dokter', $this->m_inap_konsul_medis->get_dokter_konsul_by_trs($FS_KD_TRS));
        $this->smarty->assign("rs_pasien", $this->m_inap_konsul_medis->get_pasien_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("result", $this->m_inap_konsul_medis->get_konsul_by_trs(array($FS_KD_TRS)));
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }
    
    public function jawab_add_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
        $this->tnotification->set_rules('FS_KD_TRS', 'KODE TRANSAKSI', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_TRS'),
                $this->input->post('FS_KET1'),
                $this->input->post('FS_KET2'),
                $this->input->post('FS_KET3'),
                $this->input->post('FS_KET4'),
                $this->com_user['user_name'],
                date('Y-m-d'),
                date('H:i:s')
            );
            // insert
            if ($this->m_inap_konsul_medis->insert_jawab($params)) {
                 $this->m_inap_konsul_medis->update_status(array('1',$this->input->post('FS_KD_TRS')));
                // notification
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            } else {
                // default error
                $this->tnotification->sent_notification("error", "Detail gagal disimpan");
            }
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("inap/konsul_medis/jawab_add/".$this->input->post('FS_KD_REG'));
    }
}
