<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class imut extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_imut');
        // load library
        $this->load->library('tnotification');
        $this->smarty->assign('m_imut', $this->m_imut);
    }

    // tambah mutu masuk
    public function index() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "mutu/imut/list.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        $search = $this->tsession->userdata('imut_search');
        $year_now = date('Y');
        for ($i = ($year_now); $i >= ($year_now - 4); $i--) {
            $tahun[] = $i;
        }
        $this->smarty->assign("rs_tahun", $tahun);
        if (!empty($search)) {
            $this->smarty->assign("search", $search);
        } else {
            $search['tahun'] = $year;
            $this->smarty->assign("search", $search);
        }
        
        $this->smarty->assign("tahun", $search['tahun']);
        $this->smarty->assign("unit", $search['unit']);
        $this->smarty->assign("no", 1);
        $this->smarty->assign("no2", 1);
        
        $unit = empty($search['unit']) ? : $search['unit'];
        $tahun = empty($search['tahun']) ? $year : $search['tahun'];
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_unit", $this->m_imut->get_unit_sismadak());
        $this->smarty->assign("rs_imut_wajib", $this->m_imut->get_imut_wajib(array($unit)));
        $this->smarty->assign("rs_imut_lokal", $this->m_imut->get_imut_lokal(array($unit)));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function cari_process() {
         //set page rules
        $this->_set_page_rule("R");
        //data
        if ($this->input->post('save') == "Reset") {
            $this->tsession->unset_userdata("imut_search");
        } else {
            $params = array(
                "unit" => $this->input->post("unit"),
                "tahun" => $this->input->post("tahun")
            );
            $this->tsession->set_userdata("imut_search", $params);
        }
        // redirect
        redirect("mutu/imut");
    }

    public function verif($indicator_id = "",$unit="",$bulan="",$tahun="") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "mutu/imut/verif.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_imut", $this->m_imut->get_imut_by_unit(array($indicator_id,$unit)));
        $this->smarty->assign("bulan", $bulan);
        $this->smarty->assign("tahun", $tahun);
        $this->smarty->assign("rs_result", $this->m_imut->get_imut_by_unit_periode(array($indicator_id,$unit,$bulan,$tahun)));
        $this->smarty->assign("verif", $this->m_imut->get_verif_by_unit_periode(array($indicator_id,$unit,$bulan,$tahun)));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    // add data
    public function verif_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('indicator_id', 'ID Indikator', 'trim|required');
        $this->tnotification->set_rules('department_id', 'ID Unit', 'trim|required');
        $this->tnotification->set_rules('bulan', 'Bulan', 'trim|required');
        $this->tnotification->set_rules('tahun', 'Tahun', 'trim|required');
        
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('verif_status'),
                $this->input->post('indicator_id'),
                $this->input->post('department_id'),
                $this->input->post('bulan'),
                $this->input->post('tahun')
            );
            // insert
            if ($this->m_imut->update($params)) {
                // notification
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
                redirect("mutu/imut/");
            } else {
                // default error
                $this->tnotification->sent_notification("error", "Detail gagal disimpan");
                redirect("mutu/imut/");
            }
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
            redirect("mutu/imut/");
        }
        // default redirect
        redirect("mutu/imut/");
    }
    
    public function verif_lokal($indicator_id = "",$unit="",$bulan="",$tahun="") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "mutu/imut/verif_lokal.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_imut", $this->m_imut->get_imut_lokal_by_unit(array($indicator_id,$unit)));
        $this->smarty->assign("bulan", $bulan);
        $this->smarty->assign("tahun", $tahun);
        $this->smarty->assign("rs_result", $this->m_imut->get_imut_lokal_by_unit_periode(array($indicator_id,$unit,$bulan,$tahun)));
        $this->smarty->assign("verif", $this->m_imut->get_verif_lokal_by_unit_periode(array($indicator_id,$unit,$bulan,$tahun)));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

     public function verif_lokal_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('indicator_id', 'ID Indikator', 'trim|required');
        $this->tnotification->set_rules('department_id', 'ID Unit', 'trim|required');
        $this->tnotification->set_rules('bulan', 'Bulan', 'trim|required');
        $this->tnotification->set_rules('tahun', 'Tahun', 'trim|required');
        
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('verif_status'),
                $this->input->post('indicator_id'),
                $this->input->post('department_id'),
                $this->input->post('bulan'),
                $this->input->post('tahun')
            );
            // insert
            if ($this->m_imut->update_lokal($params)) {
                // notification
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
                redirect("mutu/imut/");
            } else {
                // default error
                $this->tnotification->sent_notification("error", "Detail gagal disimpan");
                redirect("mutu/imut/");
            }
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
            redirect("mutu/imut/");
        }
        // default redirect
        redirect("mutu/imut/");
    }
    
    public function rekap() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "mutu/imut/rekap.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $search = $this->tsession->userdata('rekap_imut');
        if (!empty($search)) {
            $this->smarty->assign("search", $search);
        }
        if (empty($search['periode1'])) {
            $search['periode1'] = date('Y-m-d');
            $this->smarty->assign("search", $search);
        }
        if (empty($search['periode2'])) {
            $search['periode2'] = date('Y-m-d');
            $this->smarty->assign("search", $search);
        }
        $this->smarty->assign("periode1", $search['periode1']);
        $this->smarty->assign("periode2", $search['periode2']);
        
        $periode1 = empty($search['periode1']) ? : $search['periode1'];
        $periode2 = empty($search['periode2']) ? : $search['periode2'];
        
        $this->smarty->assign("rs_result", $this->m_imut->get_list_investigasi_lap(array($periode1,$periode2)));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }
    
     public function rekap_cari_process() {
        //set page rules
        $this->_set_page_rule("R");
        //data
        if ($this->input->post('save') == "Reset") {
            $this->tsession->unset_userdata("rekap_imut");
        } else {
            $params = array(
                "periode1" => $this->input->post("periode1"),
                "periode2" => $this->input->post("periode2")
            );
            $this->tsession->set_userdata("rekap_imut", $params);
        }
        // redirect
        redirect("mutu/imut/rekap");
    }
}
