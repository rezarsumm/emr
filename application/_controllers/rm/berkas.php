<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class berkas extends ApplicationBase {

// constructor
    public function __construct() {
// parent constructor
        parent::__construct();
// load model
        $this->load->model('m_rm');
        $this->load->model('m_rawat_jalan');
        $this->smarty->assign('m_rawat_jalan', $this->m_rawat_jalan);
        $this->load->library('tnotification');
    }

// list surat masuk
    public function index() {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "rm/berkas/index.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $search = $this->tsession->userdata('rm_rawat_jalan');
        if (!empty($search)) {
            $this->smarty->assign("search", $search);
        }
        if (empty($search['FS_MR'])) {
            $search['FS_MR'] = '347104100000000';
            $this->smarty->assign("search", $search);
        }
        $this->smarty->assign("FS_MR", $search['FS_MR']);
        // search parameters
        $FS_MR = empty($search['FS_MR']) ? : '%'.$search['FS_MR'].'%';
// get search parameter
        $this->smarty->assign("rs_pasien", $this->m_rm->get_px_history(array($FS_MR)));
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
            $this->tsession->unset_userdata("rm_rawat_jalan");
        } else {
            $params = array(
                "FS_MR" => $this->input->post("FS_MR")
            );
            $this->tsession->set_userdata("rm_rawat_jalan", $params);
        }
        // redirect
        redirect("rm/berkas");
    }
}
