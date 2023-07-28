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

        $this->load->model('m_resume');
        $this->load->model('m_rawat_jalan');
        $this->load->model('m_igd');
        $this->load->model('m_rawat_jalan_nurse');
        $this->smarty->assign('m_rawat_jalan', $this->m_rawat_jalan);
        $this->load->library('tnotification');
    }
  
    public function cetak_rm($FS_KD_REG = "", $FS_KD_TRS = "", $FS_FORM = "") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d'); 
                   
        $data['rs_triase'] = $this->m_igd->get_data_triase_by_noreg(array($FS_KD_REG));
        $data['bidan_igd'] = $this->m_igd->get_data_bidan_by_noreg(array($FS_KD_REG));
        $data['perawat_igd'] = $this->m_igd->get_data_perawat_by_noreg(array($FS_KD_REG));
        $data['medis_igd'] = $this->m_igd->get_data_medis_by_noreg(array($FS_KD_REG));
        $data['alergi'] = $this->m_igd->get_alergi(array($FS_KD_REG));
        
    
        $data['nutrisi'] = $this->m_rawat_jalan->get_data_nutrisi_by_rg(array($FS_KD_REG));
        $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG));
        $data['rs_resep'] = $this->m_rawat_jalan->get_data_terapi_by_rg(array($FS_KD_REG));
        $data['rs_lab'] = $this->m_rawat_jalan->get_data_lab_by_rg(array($FS_KD_REG));
        $data['rs_rad'] = $this->m_rawat_jalan->get_data_rad_by_rg(array($FS_KD_REG));
        $data["vs"] = $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG));
        $data["nyeri"] = $this->m_rawat_jalan->get_data_nyeri_by_rg(array($FS_KD_REG));
        $data["jatuh"] = $this->m_rawat_jalan->get_data_jatuh_by_rg(array($FS_KD_REG));
        $data["ases2"] = $this->m_rawat_jalan->get_data_ases2_by_rg(array($FS_KD_REG));
        $data["masalah_kep"] = $this->m_rawat_jalan_nurse->list_masalah_kep_by_rg($FS_KD_REG);
        $data["rencana_kep"] = $this->m_rawat_jalan_nurse->list_rencana_kep_by_rg($FS_KD_REG);
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

        $cek_cara_daftar=$this->db->query("select Kode_Masuk from PENDAFTARAN WHERE No_Reg='$FS_KD_REG'")->row_array();
    
        
        if($cek_cara_daftar['Kode_Masuk']==1){
            $this->load->view('rm/rawat_jalan/print_igd', $data);
        }

        else{
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






    public function lembar_verif($FS_KD_REG = "", $FS_KD_TRS = "", $FS_FORM = "") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d');
        $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG));
        $data['rs_resep'] = $this->m_rawat_jalan->get_data_terapi_by_rg(array($FS_KD_REG));
        $data['asal'] = $this->m_rawat_jalan->get_px_history_verif(array($FS_KD_REG));
        $data['inap'] = $this->m_rawat_jalan->get_lama_inap(array($FS_KD_REG));
       
        $data["result"] = $this->m_rawat_jalan->get_data_medis_by_rg23(array($FS_KD_REG, $FS_KD_TRS));
        //header
       $data['rs_diag'] = $this->m_resume->get_diag_by_rg(array($FS_KD_REG));
       $data['rs_tind'] = $this->m_resume->get_tind_by_rg(array($FS_KD_REG));

       $data['rs_resume'] = $this->m_resume->get_resume_by_rg(array($FS_KD_REG));

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
      
            $this->load->view('rm/rawat_jalan/print_lembar_verif', $data);
       
        
        $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF('P', 'F4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output($FS_KD_REG . '.pdf');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }




     public function cetak_lab($FS_KD_REG = "", $FS_KD_TRS = "", $FS_FORM = "") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d');
        $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG));
        $data['rs_resep'] = $this->m_rawat_jalan->get_data_terapi_by_rg(array($FS_KD_REG));
        $data['rs_lab'] = $this->m_rawat_jalan->get_data_lab_by_rg(array($FS_KD_REG));
        $data['rs_rad'] = $this->m_rawat_jalan->get_data_rad_by_rg(array($FS_KD_REG));
        $data["vs"] = $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG));
        $data["nyeri"] = $this->m_rawat_jalan->get_data_nyeri_by_rg(array($FS_KD_REG));
        $data["jatuh"] = $this->m_rawat_jalan->get_data_jatuh_by_rg(array($FS_KD_REG));
        $data["ases2"] = $this->m_rawat_jalan->get_data_ases2_by_rg(array($FS_KD_REG));
        $data["masalah_kep"] = $this->m_rawat_jalan_nurse->list_masalah_kep_by_rg($FS_KD_REG);
        $data["rencana_kep"] = $this->m_rawat_jalan_nurse->list_rencana_kep_by_rg($FS_KD_REG);
        //bidan
        $data["bidan"] = $this->m_rawat_jalan->get_data_ases_kebid_by_rg(array($FS_KD_REG));
        $data["rs_riw_kehamilan"] = $this->m_rawat_jalan->get_px_by_riw_kehamilan_by_rg(array($FS_KD_REG));
        //dokter
        $data["result"] = $this->m_rawat_jalan->get_data_medis_by_rg(array($FS_KD_REG, $FS_KD_TRS));
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
      
            $this->load->view('rm/rawat_jalan/print_lab', $data);
       
        
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


    public function cetak_resep($FS_KD_REG = "", $FS_KD_TRS = "", $FS_FORM = "") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d');
        $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG));
        $data['rs_resep'] = $this->m_rawat_jalan->get_data_terapi_by_rg(array($FS_KD_REG));
        // $data['rs_lab'] = $this->m_rawat_jalan->get_data_lab_by_rg(array($FS_KD_REG));
        // $data['rs_rad'] = $this->m_rawat_jalan->get_data_rad_by_rg(array($FS_KD_REG));
        // $data["vs"] = $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG));
        // $data["nyeri"] = $this->m_rawat_jalan->get_data_nyeri_by_rg(array($FS_KD_REG));
        // $data["jatuh"] = $this->m_rawat_jalan->get_data_jatuh_by_rg(array($FS_KD_REG));
        $data["ases2"] = $this->m_rawat_jalan->get_data_ases2_by_rg(array($FS_KD_REG));
        $data["masalah_kep"] = $this->m_rawat_jalan_nurse->list_masalah_kep_by_rg($FS_KD_REG);
        $data["rencana_kep"] = $this->m_rawat_jalan_nurse->list_rencana_kep_by_rg($FS_KD_REG);
        //bidan
        $data["bidan"] = $this->m_rawat_jalan->get_data_ases_kebid_by_rg(array($FS_KD_REG));
        $data["rs_riw_kehamilan"] = $this->m_rawat_jalan->get_px_by_riw_kehamilan_by_rg(array($FS_KD_REG));
        //dokter
        $data["result"] = $this->m_rawat_jalan->get_data_medis_by_rg(array($FS_KD_REG, $FS_KD_TRS));
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
      
            $this->load->view('rm/rawat_jalan/print_resep', $data);
       
        
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

   public function cetak_rujukan($FS_KD_REG = "", $FS_KD_TRS = "") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d');
        $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG));
        $data['rs_rujukan'] = $this->m_rawat_jalan->get_data_rujukan_by_rg(array($FS_KD_REG));
        $data["result"] = $this->m_rawat_jalan->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS));
        $data["header1"] = $this->m_rawat_jalan->get_header1();
        $data["header2"] = $this->m_rawat_jalan->get_header2();
        $data["alamat"] = $this->m_rawat_jalan->get_alamat();
        ob_start();
        $this->load->view('rm/rawat_jalan/rujukan', $data);
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
    
   public function cetak_rujukan_lab($FS_KD_REG = "", $FS_KD_TRS ="") { 
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d');
        $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG));
        $data["result"] = $this->m_rawat_jalan->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS));
        $data["rs_lab"] = $this->m_rawat_jalan->get_data_order_lab_by_rg2(array($FS_KD_REG));
        $data["header1"] = $this->m_rawat_jalan->get_header1();
        $data["header2"] = $this->m_rawat_jalan->get_header2();
        $data["alamat"] = $this->m_rawat_jalan->get_alamat();
        ob_start();
        $this->load->view('rm/rawat_jalan/rujukan_penunjang_lab', $data);
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
    
   public function cetak_rujukan_rad($FS_KD_REG = "", $FS_KD_TRS ="") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d');
         $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG));
        $data["result"] = $this->m_rawat_jalan->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS));
        $data["rs_rad"] = $this->m_rawat_jalan->get_data_order_rad_by_rg2(array($FS_KD_REG));
        $data["header1"] = $this->m_rawat_jalan->get_header1(); 
        $data["header2"] = $this->m_rawat_jalan->get_header2();
        $data["alamat"] = $this->m_rawat_jalan->get_alamat();
        ob_start();
        $this->load->view('rm/rawat_jalan/rujukan_penunjang_rad', $data);
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

    public function resume($FS_MR = "") {
        $this->_set_page_rule("R"); 
        $this->load->library('html2pdf');
        $now = date('Y-m-d');
        $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rm(array($FS_MR));
        
        $data["rs_resume"]= $this->m_rawat_jalan->get_px_resume(array($FS_MR));
        $data["header1"] = $this->m_rawat_jalan->get_header1();
        $data["header2"] = $this->m_rawat_jalan->get_header2();
        $data["alamat"] = $this->m_rawat_jalan->get_alamat();
        ob_start();
        $this->load->view('rm/rawat_jalan/resume', $data);
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
    
    public function kendali($FS_KD_REG = "") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $data['result'] = $this->m_rawat_jalan->get_px_rj_by_rg($FS_KD_REG);
        ob_start();
        $this->load->view('rm/rawat_jalan/kendali', $data);
        $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF();
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output($rs_pasien['FS_NM_PASIEN'] . '.pdf');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }
    
    public function cetak_skdp($FS_KD_REG = "", $FS_KD_TRS = "") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d');
        $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG));
        $data['rs_skdp'] = $this->m_rawat_jalan->get_data_skdp_by_rg(array($FS_KD_REG));
        $data["result"] = $this->m_rawat_jalan->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS));
        $data["ceklabskdp"] = $this->m_rawat_jalan->get_cek_lab_skdp(array($FS_KD_REG));
        $data["cekradskdp"] = $this->m_rawat_jalan->get_cek_rad_skdp(array($FS_KD_REG));
        $data["rs_lab"] = $this->m_rawat_jalan->get_data_order_lab_by_rg3(array($FS_KD_REG));
        $data["rs_rad"] = $this->m_rawat_jalan->get_data_order_rad_by_rg3(array($FS_KD_REG));
        $data["header1"] = $this->m_rawat_jalan->get_header1();
        $data["header2"] = $this->m_rawat_jalan->get_header2();
        $data["alamat"] = $this->m_rawat_jalan->get_alamat();
        $data['medis'] = $this->m_rawat_jalan->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS));
        
        ob_start();
        $this->load->view('rm/rawat_jalan/skdp', $data);
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
