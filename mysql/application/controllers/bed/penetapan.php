<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class penetapan extends ApplicationBase {

// constructor
    public function __construct() {
// parent constructor
        parent::__construct();
// load model
        $this->load->model('m_managemen_bed');
        //$this->smarty->assign('m_rawat_jalan', $this->m_rawat_jalan);
        $this->load->library('tnotification');
    }

// list surat masuk
    public function index() {
        // set page rules
        $this->_set_page_rule("R");
        // set template content
        $this->smarty->assign("template_content", "bed/penetapan/index.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        // get search parameter
        $date = date('Y-m-d');
        $date2 = date('Y-m-d23:59:59');
        $role = $this->com_user['role_id'];
         $this->smarty->assign("no", '1');
        if ($role == '6'){
            $this->smarty->assign("rs_pasien", $this->m_managemen_bed->get_pasien_penetapan(array($date, $date2)));
        
        }else{
           $this->smarty->assign("rs_pasien", $this->m_managemen_bed->get_pasien_penetapan_by_bangsal(array($date,$date2,$this->com_user['fs_kd_layanan'])));
        }
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function add_process($FS_KD_TRS="") {
        // set page rules
        $this->_set_page_rule("C");
        // process
            $params = array(
                '1',
                $this->com_user['user_name'],
                date('Y-m-d'),
                date("H:i:s"),
                $FS_KD_TRS
            );
            // insert
            if($this->m_managemen_bed->update_penetapan($params)){
                // notification
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Data berhasil disimpan");
            } else {
                // default error
                $this->tnotification->sent_notification("error", "Data gagal disimpan");
            }
        
        // default redirect
        redirect("bed/penetapan");
    }
}
