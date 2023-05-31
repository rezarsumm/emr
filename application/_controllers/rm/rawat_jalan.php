<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class rawat_jalan extends ApplicationBase {

// constructor
    public function __construct() {
// parent constructor
        parent::__construct();
// load model

        $this->load->model('m_rawat_jalan');
        $this->smarty->assign('m_rawat_jalan', $this->m_rawat_jalan);
        $this->load->library('tnotification');
    }

    public function cetak_rm($FS_KD_REG = "", $FS_KD_TRS = "", $FS_FORM = "") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d');
        $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG));
        $data['rs_resep'] = $this->m_rawat_jalan->get_data_terapi_by_rg(array($FS_KD_REG));
        $data['rs_lab'] = $this->m_rawat_jalan->get_data_lab_by_rg(array($FS_KD_REG));
        $data['rs_rad'] = $this->m_rawat_jalan->get_data_rad_by_rg(array($FS_KD_REG));
        $data["vs"] = $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG));
        $data["nyeri"] = $this->m_rawat_jalan->get_data_nyeri_by_rg(array($FS_KD_REG));
        $data["jatuh"] = $this->m_rawat_jalan->get_data_jatuh_by_rg(array($FS_KD_REG));
        $data["ases2"] = $this->m_rawat_jalan->get_data_ases2_by_rg(array($FS_KD_REG));
        //bidan
        $data["bidan"] = $this->m_rawat_jalan->get_data_ases_kebid_by_rg(array($FS_KD_REG));
        $data["rs_riw_kehamilan"] = $this->m_rawat_jalan->get_px_by_riw_kehamilan_by_rg(array($FS_KD_REG));
        //dokter
        $data["result"] = $this->m_rawat_jalan->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS));
        //header
        $data["header1"] = $this->m_rawat_jalan->get_header1();
        $data["header2"] = $this->m_rawat_jalan->get_header2();
        $data["alamat"] = $this->m_rawat_jalan->get_alamat();
        ob_start();
        if($FS_FORM==''){
            $FS_FORM = $FS_KD_TRS;
        }else{
            $FS_KD_TRS;
        }
        //rawat_jalan
        if($FS_FORM == '1'){
            $this->load->view('rm/rawat_jalan/print', $data);
        //Hemodialisa    
        }elseif($FS_FORM == '2'){
            $this->load->view('rm/rawat_jalan/hd', $data);
        //asesmen awal kebidanan    
        }elseif($FS_FORM == '3'){
            $this->load->view('rm/rawat_jalan/awal_kebidanan', $data);
        //antenatal    
        }elseif($FS_FORM == '4'){
            $this->load->view('rm/rawat_jalan/antenatal', $data);
        }else{
            $this->load->view('rm/rawat_jalan/print', $data);
        }
        
        $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
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
