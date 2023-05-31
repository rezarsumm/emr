<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class poli extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_poli');
        $this->smarty->assign('m_poli', $this->m_poli);
        // load library
        $this->load->library('tnotification');
        $this->load->library('pagination');
    }

    // list surat nota
    public function index() {
        // set page rules
        $this->_set_page_rule("R");
        // set template content
        $this->smarty->assign("template_content", "mutu/poli/index.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        // get search parameter
        $search = $this->tsession->userdata('poli_search');
        if (!empty($search)) {
            $this->smarty->assign("search", $search);
        }
         if (empty($search['tanggal'])) {
            $search['tanggal'] = date('Y-m-d');
            $this->smarty->assign("search", $search);
        }
        // search parameters
        $tanggal = empty($search['tanggal']) ? : $search['tanggal'] ;
        // pagination
        $start = $this->uri->segment(4, 0) + 1;
        $this->smarty->assign("no", $start);
        /* end of pagination ---------------------- */
        // get list data
        $this->smarty->assign("rs_waktu", $this->m_poli->get_time_lap(array($tanggal)));
        $this->smarty->assign("rs_pasien", $this->m_poli->get_pasien_lap(array($tanggal)));
        $this->smarty->assign("rs_waktu_saraf", $this->m_poli->get_time_lap_saraf(array($tanggal)));
        $this->smarty->assign("rs_pasien_saraf", $this->m_poli->get_pasien_lap_saraf(array($tanggal)));
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
            $this->tsession->unset_userdata("poli_search");
        } else {
            $params = array(
                "tanggal" => $this->input->post("tanggal")
            );
            $this->tsession->set_userdata("poli_search", $params);
        }
        // redirect
        redirect("mutu/poli");
    }
}