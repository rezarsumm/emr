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



 


    public function cetak_plab($FS_KD_TRS = "") {
        var_dump('ok');
        die;
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d');
        $data['rs_pasien'] = $this->m_farmasi_inap->lab_inap(array($FS_KD_TRS));
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

        $this->load->view('lab/lab_igd/print', $data);
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



 
}