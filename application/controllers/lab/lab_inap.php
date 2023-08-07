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
        $this->load->model('m_cppt');
        $this->load->model('m_rawat_jalan');
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

 


    public function cetak_plab($FS_KD_TRS = "") {
        // var_dump('ok');
        // die;
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d');
        $data['rs_pasien'] = $this->m_farmasi_inap->lab_inap(array($FS_KD_TRS));
        var_dump($data['rs_pasien']);
        $d = $this->m_farmasi_inap->lab_inap(array($FS_KD_TRS));
        $FS_RG=$d['No_Reg'];
        $this->smarty->assign("rs_resume", $this->m_cppt->get_data_resume_by_rg(array($FS_RG)));
  $data["alamat"] = $this->m_rawat_jalan->get_alamat();

        // $data['rs_skdp'] = $this->m_rawat_jalan->get_data_skdp_by_rg(array($FS_KD_REG));
        // $data["result"] = $this->m_rawat_jalan->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS));
        // $data["ceklabskdp"] = $this->m_rawat_jalan->get_cek_lab_skdp(array($FS_KD_REG));
        // $data["cekradskdp"] = $this->m_rawat_jalan->get_cek_rad_skdp(array($FS_KD_REG));
        // $data["rs_lab"] = $this->m_rawat_jalan->get_data_order_lab_by_rg3(array($FS_KD_REG));
        // $data["rs_rad"] = $this->m_rawat_jalan->get_data_order_rad_by_rg3(array($FS_KD_REG));
        // $data["header1"] = $this->m_rawat_jalan->get_header1();
        // $data["header2"] = $this->m_rawat_jalan->get_header2();
        // $data["alamat"] = $this->m_rawat_jalan->get_alamat();
        // $data['medis'] = $this->m_rawat_jalan->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS));
        
        ob_start();

        $this->load->view('lab/rawat_inap/print', $data);
         $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF('P', 'A5', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output($FS_KD_REG . '.pdf');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }

    public function cetak_plab2($FS_KD_TRS = "",$FS_KD_REG = "") {
        // var_dump('ok');
        // die;
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d');
        $data['rs_pasien'] = $this->m_farmasi_inap->lab_inap2(array($FS_KD_TRS));
        $data['rs_resume'] = $this->m_cppt->get_data_resume_by_rg(array($FS_KD_REG));
        // var_dump($data['rs_resume']);
        // die;
        $d = $this->m_farmasi_inap->lab_inap(array($FS_KD_TRS));
        $FS_RG=$d['No_Reg'];
        // $this->smarty->assign("rs_resume", $this->m_cppt->get_data_resume_by_rg(array($FS_RG)));
  $data["alamat"] = $this->m_rawat_jalan->get_alamat();

        
        ob_start();

        $this->load->view('lab/rawat_inap/print_igd', $data);
         $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF('P', 'A5', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output($FS_KD_REG . '.pdf');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
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