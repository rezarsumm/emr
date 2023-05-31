<?php
ini_set('MAX_EXECUTION_TIME', 3600);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class estp extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_rm_estp');
        // load library
        $this->load->library('tnotification');
        $this->smarty->assign('m_rm_estp', $this->m_rm_estp);
    }

    // list surat masuk
    public function index() {
        // set page rules
        $this->_set_page_rule("R");
        // set template content
        $this->smarty->assign("template_content", "rm/estp/index.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        // get search parameter
        $search = $this->tsession->userdata('rm_estp');
        if (!empty($search)) {
            $this->smarty->assign("search", $search);
        }
        if (empty($search['tanggal'])) {
            $search['tanggal'] = date('Y-m-d');
            $this->smarty->assign("search", $search);
        }
        if (empty($search['tanggal2'])) {
            $search['tanggal2'] = date('Y-m-d');
            $this->smarty->assign("search", $search);
        }
        // search parameters
        $tanggal1 = empty($search['tanggal']) ? '%' : $search['tanggal'];
        $tanggal2 = empty($search['tanggal2']) ? '%' : $search['tanggal2'];
        $this->smarty->assign("no", 1);
        // get list data
        $this->smarty->assign("rs_id", $this->m_rm_estp->get_diagnosis());
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
        if ($this->input->post('save') == "RESET") {
            $this->tsession->unset_userdata("rm_estp");
        } else {
            $params = array(
                "tanggal" => $this->input->post("tanggal"),
                "tanggal2" => $this->input->post("tanggal2")
            );
            $this->tsession->set_userdata("rm_estp", $params);
        }
        // redirect
        redirect("rm/estp");
    }


    // list surat masuk
    public function index_2() {
        // set page rules
        $this->_set_page_rule("R");
        // set template content
        $this->smarty->assign("template_content", "rm/estp/index_2.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        // get search parameter
        $search = $this->tsession->userdata('espt2');
        if (!empty($search)) {
            $this->smarty->assign("search2", $search);
        }
        if (empty($search['tanggal2'])) {
            $search['tanggal2'] = date('Y-m-d');
            $this->smarty->assign("search2", $search);
        }
        if (empty($search['tanggal22'])) {
            $search['tanggal22'] = date('Y-m-d');
            $this->smarty->assign("search2", $search);
        }
        // search parameters
        $tanggal1 = empty($search['tanggal2']) ? '%' : $search['tanggal2'];
        $tanggal2 = empty($search['tanggal22']) ? '%' : $search['tanggal22'];
        $this->smarty->assign("no", 1);
        // get list data
        $this->smarty->assign("rs_id", $this->m_rm_estp->get_diagnosis());

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    // searching
    public function proses_cari_2() {
        //set page rules
        $this->_set_page_rule("R");
        //data
        if ($this->input->post('save') == "RESET") {
            $this->tsession->unset_userdata("espt2");
        } else {
            $params = array(
                "tanggal2" => $this->input->post("tanggal2"),
                "tanggal22" => $this->input->post("tanggal22")
            );
            $this->tsession->set_userdata("espt2", $params);
        }
        // redirect
        redirect("laporan/espt/index_2");
    }

}
