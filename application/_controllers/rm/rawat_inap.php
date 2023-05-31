<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class rawat_inap extends ApplicationBase {

// constructor
    public function __construct() {
// parent constructor
        parent::__construct();
// load model

        $this->load->model('m_rawat_jalan');
        $this->load->model('m_rawat_inap');
        $this->load->model('m_rm17');
        $this->load->model('m_rm10');
        $this->load->model('m_cppt');
        $this->smarty->assign('m_rawat_inap', $this->m_rawat_inap);
        $this->load->library('tnotification');
    }

    public function cetak_rm($FS_KD_REG = "",$FS_FORM="") {
       $this->_set_page_rule("R");

        $this->load->library('html2pdf');
        //resume
        $now = date('Y-m-d');
        $data['rs_pasien'] = $this->m_rawat_inap->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG));
        $data['rs_resume'] = $this->m_rawat_inap->get_resume_by_rg(array($FS_KD_REG));
        $data['rs_diet'] = $this->m_rawat_inap->get_diet_by_rg(array($FS_KD_REG));
        $data['rs_indikasi'] = $this->m_rawat_inap->get_indikasi_dirawat_by_rg(array($FS_KD_REG));
        $data['rs_diag'] = $this->m_rawat_inap->get_diag_by_rg(array($FS_KD_REG));
        $data['rs_tind'] = $this->m_rawat_inap->get_tind_by_rg(array($FS_KD_REG));
        $data['rs_terapi'] = $this->m_rawat_inap->get_terapi_by_rg(array($FS_KD_REG));
        $data['rs_skdp'] = $this->m_rawat_jalan->get_data_skdp_by_rg(array($FS_KD_REG));
        //obat
        $data['rs_rm17all'] = $this->m_rm17->get_rm17_by_rg_all(array($FS_KD_REG));
        //edukasi
        $data['rs_rm10'] = $this->m_rm10->get_rm10_by_rg(array($FS_KD_REG));
        $data['rs_rm10all'] = $this->m_rm10->get_rm10_by_rg_all(array($FS_KD_REG));
        //cppt
        $data["rs_cppt"]= $this->m_cppt->get_cppt_by_rg($FS_KD_REG);
        //header
        $data["header1"] = $this->m_rawat_jalan->get_header1();
        $data["header2"] = $this->m_rawat_jalan->get_header2();
        $data["alamat"] = $this->m_rawat_jalan->get_alamat();
        ob_start();
        if($FS_FORM == '1'){
            $this->load->view('rm/rawat_inap/cppt', $data);
        //Hemodialisa    
        }elseif($FS_FORM == '2'){
            $this->load->view('rm/rawat_inap/resume', $data);
        //asesmen awal kebidanan    
        }elseif($FS_FORM == '3'){
            $this->load->view('rm/rawat_inap/pemb_obat', $data);
        //antenatal    
        }elseif($FS_FORM == '4'){
            $this->load->view('rm/rawat_inap/edukasi', $data);
        }else{
            $this->load->view('rm/rawat_inap/resume', $data);
        }
        $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output('resume_pasien_pulang.pdf');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }

}
