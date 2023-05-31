<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class Lab_inap extends ApplicationBase {

// constructor
    public function __construct() {
// parent constructor
        parent::__construct();
// load model
        $this->load->model('m_farmasi_inap');
        $this->load->library('tnotification');
    }

// list surat masuk
    public function index() {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "lab/rawat_inap/index.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $search = $this->tsession->userdata('farmasi_rawat_inap');
        if (!empty($search)) {
            $this->smarty->assign("search", $search);
        }
       if (empty($search['FD_TGL_TRS'])) {
            $search['FD_TGL_TRS'] = date('Y-m-d');
            $this->smarty->assign("search", $search);
        }
        $this->smarty->assign("FD_TGL_TRS", $search['FD_TGL_TRS']);
        // search parameters
        $FD_TGL_TRS = empty($search['FD_TGL_TRS']) ? : $search['FD_TGL_TRS'];
 // get search parameter
        // $this->smarty->assign("rs_pasien", $this->m_farmasi_inap->get_px_by_farmasi(array($FD_TGL_TRS)));
        $this->smarty->assign("rs_pasien", $this->m_farmasi_inap->get_px_by_lab(array($FD_TGL_TRS)));
 // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
 // output
        parent::display(); 
    }


    public function proses_cari() {
        //set page rules
        $this->_set_page_rule("R");
        //data
        if ($this->input->post('save') == "Reset") {
            $this->tsession->unset_userdata("farmasi_rawat_inap");
        } else {
            $params = array(
                "FD_TGL_TRS" => $this->input->post("FD_TGL_TRS")
            );
            $this->tsession->set_userdata("farmasi_rawat_inap", $params);
        }
        // redirect
        redirect("lab/lab_inap");
    }

}