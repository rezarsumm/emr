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
        $this->load->model('m_ass_jatuh');
        $this->load->model('m_rawat_jalan');
        $this->load->model('m_rawat_inap');
        $this->load->model('m_rm17');
        $this->load->model('m_rm10');
        $this->load->model('m_cppt');
        $this->load->model('m_ass_awal');
            $this->load->model('m_rawat_jalan_nurse');
        $this->load->model('m_kep');
        $this->load->model('m_resume');
        $this->load->model('m_farmasi_inap');
         $this->load->model('m_ass_awal_bidan');
       // $this->load->model('m_udd');
        $this->smarty->assign('m_rawat_inap', $this->m_rawat_inap);
        $this->load->library('tnotification');
    }

    public function cetak_rm($FS_KD_REG = "",$FS_FORM="") {    
       $this->_set_page_rule("R");

       $this->load->library('html2pdf'); 
        //resume
       $now = date('Y-m-d');    
       $data['rs_pasien'] = $this->m_rawat_inap->get_px_by_dokter_by_rg2(array($FS_KD_REG));
       $data['rs_lab'] = $this->m_rawat_jalan->get_data_lab_by_rg(array($FS_KD_REG));
       $data['rs_rad'] = $this->m_rawat_jalan->get_data_rad_by_rg(array($FS_KD_REG));
       $data['rs_resume'] = $this->m_resume->get_resume_by_rg(array($FS_KD_REG));
       $data['rs_diet'] = $this->m_resume->get_diet_by_rg(array($FS_KD_REG));
       $data['rs_indikasi'] = $this->m_resume->get_indikasi_dirawat_by_rg(array($FS_KD_REG));
       $data['rs_diag'] = $this->m_resume->get_diag_by_rg(array($FS_KD_REG));
       $data['rs_tind'] = $this->m_resume->get_tind_by_rg(array($FS_KD_REG));
       $data['rs_terapi'] = $this->m_resume->get_terapi_by_rg(array($FS_KD_REG));
       $data['rs_skdp'] = $this->m_rawat_jalan->get_data_skdp_by_rg(array($FS_KD_REG));
        //asesmen awal
        $data["vs"] = $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG));
     $data["vs4"] = $this->m_ass_awal->get_data_vs_by_rg(array($FS_KD_REG));

       $data["ases2"]= $this->m_ass_awal->get_data_ases2_by_rg(array($FS_KD_REG));
        $data["ases_bidan"]= $this->m_ass_awal_bidan->get_data_ases2_by_rg(array($FS_KD_REG));
       $data["nyeri"]= $this->m_ass_awal->get_data_nyeri_by_rg(array($FS_KD_REG));
       $data["fungsi"]= $this->m_ass_awal->get_data_fungsi_by_rg(array($FS_KD_REG));
       $data["nutrisi"]= $this->m_ass_awal->get_nutrisi_by_rg($FS_KD_REG);
       $data["jatuh"]= $this->m_ass_awal->get_jatuh_by_rg($FS_KD_REG);
        //$data["alergi"]= $this->m_ass_awal->get_data_alergi_by_rg(array($FS_KD_REG));
       $data["masalah_kep"] = $this->m_ass_awal->list_masalah_kep_by_rg($FS_KD_REG);
       $data["spiritual"] = $this->m_ass_awal->list_keb_spiritual_by_rg($FS_KD_REG);
       $data["edukasi"] = $this->m_ass_awal->list_edukasi_by_rg($FS_KD_REG);
       $data["planing"] = $this->m_ass_awal->list_planning_by_rg($FS_KD_REG);
        //obat
       $data['rs_rm17all'] = $this->m_rm17->get_rm17_by_rg_all(array($FS_KD_REG));
        //edukasi
       $data['rs_rm10'] = $this->m_rm10->get_rm10_by_rg(array($FS_KD_REG));
       $data['rs_rm10all'] = $this->m_rm10->get_rm10_by_rg_all(array($FS_KD_REG));
        //cppt
       $data["rs_cppt"]= $this->m_cppt->get_cppt_by_rg($FS_KD_REG);
        //jatuh
       $data["rs_result_anak"]= $this->m_ass_jatuh->get_jatuh_anak_by_rg(array($FS_KD_REG));
       $data["rs_result_dewasa"]= $this->m_ass_jatuh->get_jatuh_dewasa_by_rg(array($FS_KD_REG));
       $data["rs_result_dewasa2"]= $this->m_ass_jatuh->get_jatuh_dewasa2_by_rg(array($FS_KD_REG));
       $data["rs_jatuh"]= $this->m_ass_jatuh->get_com_jatuh();
        //keperawatan
       $data["rs_kep"]= $this->m_kep->get_rencana_kep_by_rg(array($FS_KD_REG));
        //tindakan kep
       $data["rs_tindakan"]= $this->m_kep->get_tindakan_kep_by_rg(array($FS_KD_REG));
        //rekon obat
        $data['cekrajal'] = $this->m_rawat_jalan->cek_asesmen_rajal_perawat(array($FS_KD_REG));

        //ases awal medis 
       $data["rs_ases_medis"]=$this->m_rawat_jalan->get_data_medis_ases(array($FS_KD_REG));
       $data["data_hamil"]=$this->m_ass_awal_bidan->get_riw_hamil(array($FS_KD_REG));
 
 
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
    }elseif($FS_FORM == '5'){
        $this->load->view('rm/rawat_inap/ases_awal', $data);
    }elseif($FS_FORM == '6'){
        $this->load->view('rm/rawat_inap/ases_jatuh', $data);
    }elseif($FS_FORM == '7'){
        $this->load->view('rm/rawat_inap/kep', $data);
    }elseif($FS_FORM == '8'){
        $this->load->view('rm/rawat_inap/tindakan', $data);
    }elseif($FS_FORM == '9'){
        $this->load->view('rm/rawat_inap/rekon_obat', $data);
    }elseif($FS_FORM == '10'){
        $this->load->view('rm/rawat_inap/penunjang', $data);
    }elseif($FS_FORM == '11'){ 
        $this->load->view('rm/rawat_inap/ases_awal_medis', $data);
    }elseif($FS_FORM == '12'){
    $this->load->view('rm/rawat_inap/ases_awal_bidan', $data);}
    else{ 
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




public function cetak_rm_ok($FS_KD_REG = "",$FS_FORM="") {    
    $this->_set_page_rule("R");

    $this->load->library('html2pdf'); 
     //resume
    $now = date('Y-m-d');    
    $data['rs_pasien']= $this->m_rawat_jalan->all_op($FS_KD_REG);           

   
     //header 
    $data["header1"] = $this->m_rawat_jalan->get_header1();
    $data["header2"] = $this->m_rawat_jalan->get_header2();
    $data["alamat"] = $this->m_rawat_jalan->get_alamat();
    ob_start();
        
        $this->load->view('rm/rawat_inap/ok', $data);
        //Hemodialisa     
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


public function cetak_asesmen_awal_medis($FS_KD_REG = "",$FS_FORM="") {
   $this->_set_page_rule("R");

   $this->load->library('html2pdf');
        //resume
   $now = date('Y-m-d');
   // $data['rs_pasien'] = $this->m_rawat_inap->get_pasien_by_rg2(array($FS_KD_REG));
        //ases awal medis
        $data["rs_ases_medis"]=$this->m_rawat_jalan->get_data_medis_ases(array($FS_KD_REG));
  // $data["rs_ases_medis"]=$this->m_cppt->get_data_medis_by_rg(array($FS_KD_REG));
        //header
   $data["header1"] = $this->m_rawat_jalan->get_header1();
   $data["header2"] = $this->m_rawat_jalan->get_header2();
   $data["alamat"] = $this->m_rawat_jalan->get_alamat(); 

   
   $now = date('Y-m-d');
        $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG));
        $data['cekrajal'] = $this->m_rawat_jalan->cek_asesmen_rajal_perawat(array($FS_KD_REG));
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
       
       

   ob_start();
   $this->load->view('rm/rawat_inap/ases_awal_medis', $data);
   $content = ob_get_contents();
   ob_end_clean();

   try {
    $html2pdf = new HTML2PDF('P', 'A4', 'fr');
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output('asesmen_awal.pdf');
   } catch (HTML2PDF_exception $e) {
    echo $e;
    exit;
 }
}











    public function cetak_lap_op($FS_KD_REG = "",$FS_FORM="") {
        $this->_set_page_rule("R");

        $this->load->library('html2pdf');
            //resume
        $now = date('Y-m-d');
        // $data['rs_pasien'] = $this->m_rawat_inap->get_pasien_by_rg2(array($FS_KD_REG));
            //ases awal medis
            $data["rs_ases_medis"]=$this->m_rawat_jalan->get_data_medis_ases(array($FS_KD_REG));
    // $data["rs_ases_medis"]=$this->m_cppt->get_data_medis_by_rg(array($FS_KD_REG));
            //header
        $data["header1"] = $this->m_rawat_jalan->get_header1();
        $data["header2"] = $this->m_rawat_jalan->get_header2();
        $data["alamat"] = $this->m_rawat_jalan->get_alamat(); 
    
        
        $now = date('Y-m-d');
            $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG));
            $data["vs"] = $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG));
            $data["rs_lap_op"] = $this->m_cppt->get_list_op_by_rg(array($FS_KD_REG));
            
            
    
        ob_start();
        $this->load->view('rm/rawat_inap/laporan_operasi', $data);
        $content = ob_get_contents();
        ob_end_clean();
    
        try {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('asesmen_awal.pdf');
        } catch (HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
    }





    

    public function cetak_lap_anes($FS_KD_REG = "",$FS_FORM="") {
        $this->_set_page_rule("R");

        $this->load->library('html2pdf');
            //resume
        $now = date('Y-m-d');
        // $data['rs_pasien'] = $this->m_rawat_inap->get_pasien_by_rg2(array($FS_KD_REG));
            //ases awal medis
            $data["rs_ases_medis"]=$this->m_rawat_jalan->get_data_medis_ases(array($FS_KD_REG));
    // $data["rs_ases_medis"]=$this->m_cppt->get_data_medis_by_rg(array($FS_KD_REG));
            //header
        $data["header1"] = $this->m_rawat_jalan->get_header1();
        $data["header2"] = $this->m_rawat_jalan->get_header2();
        $data["alamat"] = $this->m_rawat_jalan->get_alamat(); 
    
        
        $now = date('Y-m-d');
            $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG));
            $data["vs"] = $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG));
            $data["rs_lap_op"] = $this->m_cppt->get_list_op_by_rg(array($FS_KD_REG));
            $data["rs_lap_anes"] = $this->m_cppt->get_list_lap_anes_by_rg(array($FS_KD_REG));
            
            
    
        ob_start();
        $this->load->view('rm/rawat_inap/laporan_anes', $data);
        $content = ob_get_contents();
        ob_end_clean();
    
        try {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('asesmen_awal.pdf');
        } catch (HTML2PDF_exception $e) {
        echo $e;
        exit;
     }
    }



    public function cetak_data_umum_pra($FS_KD_REG = "",$FS_FORM="") {
        $this->_set_page_rule("R");

        $this->load->library('html2pdf');
            //resume
        $now = date('Y-m-d'); 
            $data["rs_ases_medis"]=$this->m_rawat_jalan->get_data_medis_ases(array($FS_KD_REG)); 
            //header
        $data["header1"] = $this->m_rawat_jalan->get_header1();
        $data["header2"] = $this->m_rawat_jalan->get_header2();
        $data["alamat"] = $this->m_rawat_jalan->get_alamat(); 
    
        
        $now = date('Y-m-d');
            $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG));
            $data["vs"] = $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG));
            $data["rs_lap_op"] = $this->m_cppt->get_list_op_by_rg(array($FS_KD_REG));
            $data["rs_umum_pra"] = $this->m_cppt->get_list_umum_pra_by_rg(array($FS_KD_REG));
            
            
    
        ob_start();
        $this->load->view('rm/rawat_inap/data_umum_pra', $data);
        $content = ob_get_contents();
        ob_end_clean();
    
        try {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('asesmen_awal.pdf');
        } catch (HTML2PDF_exception $e) {
        echo $e;
        exit;
      }
    }




    public function cetak_data_umum_post($FS_KD_REG = "",$FS_FORM="") {
        $this->_set_page_rule("R");

        $this->load->library('html2pdf');
            //resume
        $now = date('Y-m-d'); 
            $data["rs_ases_medis"]=$this->m_rawat_jalan->get_data_medis_ases(array($FS_KD_REG)); 
            //header
        $data["header1"] = $this->m_rawat_jalan->get_header1();
        $data["header2"] = $this->m_rawat_jalan->get_header2();
        $data["alamat"] = $this->m_rawat_jalan->get_alamat(); 
    
        
        $now = date('Y-m-d');
            $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG));
            $data["vs"] = $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG));
            $data["rs_lap_op"] = $this->m_cppt->get_list_op_by_rg(array($FS_KD_REG));
            $data["rs_umum_pra"] = $this->m_cppt->get_list_umum_pra_by_rg(array($FS_KD_REG));
            $data["rs_umum_post"] = $this->m_cppt->get_list_umum_post_by_rg(array($FS_KD_REG));
            
            
    
        ob_start();
        $this->load->view('rm/rawat_inap/data_umum_post', $data);
        $content = ob_get_contents();
        ob_end_clean();
    
        try {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('asesmen_awal.pdf');
        } catch (HTML2PDF_exception $e) {
        echo $e;
        exit;
      }
    }



    public function cetak_alat_habis_pakai($FS_KD_REG = "",$id="") {
        $this->_set_page_rule("R");

        $this->load->library('html2pdf');
            //resume
        $now = date('Y-m-d'); 
            $data["rs_ases_medis"]=$this->m_rawat_jalan->get_data_medis_ases(array($FS_KD_REG)); 
            //header
        $data["header1"] = $this->m_rawat_jalan->get_header1();
        $data["header2"] = $this->m_rawat_jalan->get_header2();
        $data["alamat"] = $this->m_rawat_jalan->get_alamat(); 
    
        
        $now = date('Y-m-d');
            $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG));
            $data["vs"] = $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG));
            $data["rs_lap_op"] = $this->m_cppt->get_list_op_by_rg(array($FS_KD_REG));
            $data["alat"] = $this->m_cppt->alat(array($FS_KD_REG,$id));
            $data["rs_umum_post"] = $this->m_cppt->get_list_umum_post_by_rg(array($FS_KD_REG));
            
            
    
        ob_start();
        $this->load->view('rm/rawat_inap/alat_habis_pakai', $data);
        $content = ob_get_contents();
        ob_end_clean();
    
        try {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('asesmen_awal.pdf');
        } catch (HTML2PDF_exception $e) {
        echo $e;
        exit;
      }
    }

    public function cetak_checklist($FS_KD_REG = "",$id="") {
        $this->_set_page_rule("R");

        $this->load->library('html2pdf');
            //resume
        $now = date('Y-m-d'); 
            $data["rs_ases_medis"]=$this->m_rawat_jalan->get_data_medis_ases(array($FS_KD_REG)); 
            //header
        $data["header1"] = $this->m_rawat_jalan->get_header1();
        $data["header2"] = $this->m_rawat_jalan->get_header2();
        $data["alamat"] = $this->m_rawat_jalan->get_alamat(); 
    
        
        $now = date('Y-m-d');
            $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG));
            $data["vs"] = $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG));
            $data["rs_sign_in"] = $this->m_cppt->get_list_sign_in_by_rg(array($FS_KD_REG));
            $data["rs_umum_pra"] = $this->m_cppt->get_list_umum_pra_by_rg(array($FS_KD_REG));
            
            $data["bendatajam"] = $this->m_cppt->get_list_benda_tajam_by_rg(array($id));
            
    
        ob_start();
        $this->load->view('rm/rawat_inap/checklist_keselamatan', $data);
        $content = ob_get_contents();
        ob_end_clean();
    
        try {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('asesmen_awal.pdf');
        } catch (HTML2PDF_exception $e) {
        echo $e;
        exit;
     }
    }


    
    public function cetak_asuhan_kep_op($FS_KD_REG = "",$id="") {
        $this->_set_page_rule("R");

        $this->load->library('html2pdf');
            //resume
        $now = date('Y-m-d'); 
            $data["rs_ases_medis"]=$this->m_rawat_jalan->get_data_medis_ases(array($FS_KD_REG)); 
            //header
        $data["header1"] = $this->m_rawat_jalan->get_header1();
        $data["header2"] = $this->m_rawat_jalan->get_header2();
        $data["alamat"] = $this->m_rawat_jalan->get_alamat(); 
    
        
        $now = date('Y-m-d');
            $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG));
            $data["vs"] = $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG));
            $data["rs_sign_in"] = $this->m_cppt->get_list_sign_in_by_rg(array($FS_KD_REG));
            $data["rs_umum_pra"] = $this->m_cppt->get_list_umum_pra_by_rg(array($FS_KD_REG));
            $data["rs_asuhan"] = $this->m_cppt->get_list_asuhan_all_op2_by_rg3(array($FS_KD_REG, $id));
          
          
        ob_start();
        $this->load->view('rm/rawat_inap/asuhan_keperawatan_op', $data);
        $content = ob_get_contents();
        ob_end_clean();
    
        try {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('asesmen_awal.pdf');
        } catch (HTML2PDF_exception $e) {
        echo $e;
        exit;
     }
    }




 public function cetak_ases_pra_bedah($FS_KD_REG = "",$FS_FORM="") {
    $this->_set_page_rule("R");

    $this->load->library('html2pdf');
         //resume
    $now = date('Y-m-d');
    // $data['rs_pasien'] = $this->m_rawat_inap->get_pasien_by_rg2(array($FS_KD_REG));
         //ases awal medis
         $data["rs_ases_medis"]=$this->m_rawat_jalan->get_data_medis_ases(array($FS_KD_REG));
   // $data["rs_ases_medis"]=$this->m_cppt->get_data_medis_by_rg(array($FS_KD_REG));
         //header
    $data["header1"] = $this->m_rawat_jalan->get_header1();
    $data["header2"] = $this->m_rawat_jalan->get_header2();
    $data["alamat"] = $this->m_rawat_jalan->get_alamat(); 
 
    
    $now = date('Y-m-d');
         $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG));
        $data["vs"] = $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG));
        $data["rs_pra"] = $this->m_cppt->get_list_pra_op_by_rg(array($FS_KD_REG));
        
        
 
    ob_start();
    $this->load->view('rm/rawat_inap/ases_pra_bedah', $data);
    $content = ob_get_contents();
    ob_end_clean();
 
    try {
     $html2pdf = new HTML2PDF('P', 'A4', 'fr');
     $html2pdf->pdf->SetDisplayMode('fullpage');
     $html2pdf->setDefaultFont('Arial');
     $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
     $html2pdf->Output('asesmen_awal.pdf');
    } catch (HTML2PDF_exception $e) {
     echo $e;
     exit;
  }
 }





 

 public function cetak_ases_pra_anes($FS_KD_REG = "",$FS_FORM="") {
    $this->_set_page_rule("R");

    $this->load->library('html2pdf');
         //resume
    $now = date('Y-m-d');
    // $data['rs_pasien'] = $this->m_rawat_inap->get_pasien_by_rg2(array($FS_KD_REG));
         //ases awal medis
         $data["rs_ases_medis"]=$this->m_rawat_jalan->get_data_medis_ases(array($FS_KD_REG));
   // $data["rs_ases_medis"]=$this->m_cppt->get_data_medis_by_rg(array($FS_KD_REG));
         //header
    $data["header1"] = $this->m_rawat_jalan->get_header1();
    $data["header2"] = $this->m_rawat_jalan->get_header2();
    $data["alamat"] = $this->m_rawat_jalan->get_alamat(); 
 
    
    $now = date('Y-m-d');
         $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG));
        $data["vs"] = $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG));
        $data["rs_pra_anes"] = $this->m_cppt->get_list_pra_anes_by_rg(array($FS_KD_REG));
        
        
 
    ob_start();
    $this->load->view('rm/rawat_inap/ases_pra_anes', $data);
    $content = ob_get_contents();
    ob_end_clean();
 
    try {
     $html2pdf = new HTML2PDF('P', 'A4', 'fr');
     $html2pdf->pdf->SetDisplayMode('fullpage');
     $html2pdf->setDefaultFont('Arial');
     $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
     $html2pdf->Output('asesmen_awal.pdf');
    } catch (HTML2PDF_exception $e) {
     echo $e;
     exit;
  }
 }


public function cetak_resep($FS_KD_TRS = "") {
    $this->_set_page_rule("R");
    $this->load->library('html2pdf');
    $now = date('Y-m-d');
    $data['rs_pasien'] = $this->m_farmasi_inap->get_pasien_by_trs(array($FS_KD_TRS));
    $data['rs_resep'] = $this->m_farmasi_inap->get_resep_by_trs(array($FS_KD_TRS));
    $data['rs_resep2'] = $this->m_farmasi_inap->get_resep_by_trs2(array($FS_KD_TRS));

    ob_start();
    $this->load->view('rm/rawat_inap/resep', $data);
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


public function cetak_resep2($FS_KD_TRS = "") {
    $this->_set_page_rule("R");
    $this->load->library('html2pdf');
    $now = date('Y-m-d');
    $data['rs_pasien'] = $this->m_farmasi_inap->get_pasien_by_trs(array($FS_KD_TRS));
    $data['rs_resep'] = $this->m_farmasi_inap->get_resep_by_trs2(array($FS_KD_TRS));
    ob_start();
    $this->load->view('rm/rawat_inap/resep2', $data); 
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
 

public function cetak_etiket_udd($FS_KD_REG="",$FS_KD_TRS = "") {
    $this->_set_page_rule("R");
    $this->load->library('html2pdf');
    $date = date('Y-m-d');
    $date2 = date('Y-m-dH:i:s');
    $now = date('Y-m-d');
    $data['rs_pasien'] = $this->m_farmasi_inap->get_pasien_udd_by_trs(array($date, $date2,$FS_KD_TRS));
        //$data['rs_resep'] = $this->m_farmasi_inap->get_resep_by_trs(array($FS_KD_TRS));
    ob_start();
    $this->load->view('rm/rawat_inap/udd', $data);
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

}
