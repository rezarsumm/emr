<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class prioritas extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_prioritas');
        // load library
        $this->load->library('tnotification');
        $this->smarty->assign('m_prioritas', $this->m_prioritas);
    }

    // tambah mutu masuk
    public function index() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "mutu/prioritas/list.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        $search = $this->tsession->userdata('prioritas_search');
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
        
        $this->smarty->assign("rs_prioritas_wajib", $this->m_prioritas->get_prioritas_wajib());
        $this->smarty->assign("rs_prioritas_lokal", $this->m_prioritas->get_prioritas_lokal());
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
            $this->tsession->unset_userdata("prioritas_search");
        } else {
            $params = array(
                "unit" => $this->input->post("unit"),
                "tahun" => $this->input->post("tahun")
            );
            $this->tsession->set_userdata("prioritas_search", $params);
        }
        // redirect
        redirect("mutu/prioritas");
    }

    public function verif($indicator_id = "",$bulan="",$tahun="") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "mutu/prioritas/verif.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_prioritas", $this->m_prioritas->get_prioritas_by_unit(array($indicator_id)));
        $this->smarty->assign("bulan", $bulan);
        $this->smarty->assign("tahun", $tahun);
        $this->smarty->assign("rs_result", $this->m_prioritas->get_prioritas_by_unit_periode(array($indicator_id,$bulan,$tahun)));
        $this->smarty->assign("verif", $this->m_prioritas->get_verif_by_unit_periode(array($indicator_id,$bulan,$tahun)));
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
        $this->tnotification->set_rules('bulan', 'Bulan', 'trim|required');
        $this->tnotification->set_rules('tahun', 'Tahun', 'trim|required');
        
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('verif_status'),
                $this->input->post('indicator_id'),
                $this->input->post('bulan'),
                $this->input->post('tahun')
            );
            // insert
            if ($this->m_prioritas->update($params)) {
                // notification
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
                redirect("mutu/prioritas/");
            } else {
                // default error
                $this->tnotification->sent_notification("error", "Detail gagal disimpan");
                redirect("mutu/prioritas/");
            }
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
            redirect("mutu/prioritas/");
        }
        // default redirect
        redirect("mutu/prioritas/");
    }
    
    public function verif_lokal($indicator_id = "",$bulan="",$tahun="") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "mutu/prioritas/verif_lokal.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_prioritas", $this->m_prioritas->get_prioritas_lokal_by_unit(array($indicator_id,$unit)));
        $this->smarty->assign("bulan", $bulan);
        $this->smarty->assign("tahun", $tahun);
        $this->smarty->assign("rs_result", $this->m_prioritas->get_prioritas_lokal_by_unit_periode(array($indicator_id,$bulan,$tahun)));
        $this->smarty->assign("verif", $this->m_prioritas->get_verif_lokal_by_unit_periode(array($indicator_id,$bulan,$tahun)));
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
        $this->tnotification->set_rules('bulan', 'Bulan', 'trim|required');
        $this->tnotification->set_rules('tahun', 'Tahun', 'trim|required');
        
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('verif_status'),
                $this->input->post('indicator_id'),
                $this->input->post('bulan'),
                $this->input->post('tahun')
            );
            // insert
            if ($this->m_prioritas->update_lokal($params)) {
                // notification
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
                redirect("mutu/prioritas/");
            } else {
                // default error
                $this->tnotification->sent_notification("error", "Detail gagal disimpan");
                redirect("mutu/prioritas/");
            }
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
            redirect("mutu/prioritas/");
        }
        // default redirect
        redirect("mutu/prioritas/");
    }
}
