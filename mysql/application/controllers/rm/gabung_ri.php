<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class gabung_ri extends ApplicationBase {

// constructor
    public function __construct() {
// parent constructor
        parent::__construct();
// load model
        $this->load->model('m_gabung_ri');
        $this->load->library('tnotification');
    }

// list surat masuk
    public function index() {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "rm/gabung_ri/index.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $search = $this->tsession->userdata('rm_rawat_jalan');
        if (!empty($search['FS_MR'])) {
            $this->smarty->assign("search", $search);
        }
        if (empty($search['FS_MR'])) {
            $search['FS_MR'] = '347104100000000';
            $this->smarty->assign("search", $search);
        }
        $this->smarty->assign("FS_MR", $search['FS_MR']);
        // search parameters
        $FS_MR = empty($search['FS_MR']) ? : '%' . $search['FS_MR'] . '%';
// get search parameter
        $this->smarty->assign("rs_pasien", $this->m_gabung_ri->get_px_history(array($FS_MR)));
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
        redirect("rm/gabung_ri");
    }

    public function gabung_ri_process($FS_KD_REG="",$FS_MR="",$FS_STATUS="") {
        // set page rules
        $this->_set_page_rule("U");
        // cek input
            $params = array(
                $FS_KD_REG,
                '2',
                $FS_MR,
                $FS_STATUS
            );

            // insert

            if ($this->m_gabung_ri->update_gabung_ri($params)) {

                // notification
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            } else {
                // default error
                $this->tnotification->sent_notification("error", "Detail gagal disimpan");
            }
       
        // default redirect

        redirect("rm/gabung_ri/");
    }

}
