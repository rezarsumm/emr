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
        $this->load->model('m_rawat_jalan_nurse');
        $this->load->model('m_igd');
        $this->load->model('m_fisio');
        $this->load->model('m_farmasi');
        $this->load->model('m_surat_sehat');
        $this->load->model('m_farmasi_inap');
        $this->smarty->assign('m_rawat_jalan', $this->m_rawat_jalan);
        $this->load->library('tnotification');
    }

    public function cetak_rm($FS_KD_REG = "", $FS_KD_TRS = "", $FS_FORM = "") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d');
        $data['rs_pasien'] = $this->m_rawat_jalan_nurse->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG));
        $data['rs_resep'] = $this->m_rawat_jalan->get_data_terapi_by_rg(array($FS_KD_REG));
        $data['rs_lab'] = $this->m_rawat_jalan->get_data_lab_by_rg(array($FS_KD_REG));
        $data['rs_rad'] = $this->m_rawat_jalan->get_data_rad_by_rg(array($FS_KD_REG));
        $data["vs"] = $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG));
        $data["nyeri"] = $this->m_rawat_jalan->get_data_nyeri_by_rg(array($FS_KD_REG));
        $data["jatuh"] = $this->m_rawat_jalan->get_data_jatuh_by_rg(array($FS_KD_REG));
        $data["ases2"] = $this->m_rawat_jalan->get_data_ases2_by_rg(array($FS_KD_REG));
        $data["gizi"] = $this->m_rawat_jalan->get_data_gizi_by_rg(array($FS_KD_REG));
        $data["alergi"]= $this->m_rawat_jalan->get_data_alergi_by_rg(array($FS_KD_REG));
        $data["masalah_kep"] = $this->m_rawat_jalan_nurse->list_masalah_kep_by_rg($FS_KD_REG);
        $data["rencana_kep"] = $this->m_rawat_jalan_nurse->list_rencana_kep_by_rg($FS_KD_REG);
        $data["geriatri"] = $this->m_rawat_jalan_nurse->get_data_geritri_by_rg($FS_KD_REG);
        //bidan
        $data["bidan"] = $this->m_rawat_jalan->get_data_ases_kebid_by_rg(array($FS_KD_REG));
        $data["rs_riw_kehamilan"] = $this->m_rawat_jalan->get_px_by_riw_kehamilan_by_rg(array($FS_KD_REG));
        //fisioterapi
        $data["fisio"]= $this->m_rawat_jalan->get_data_fisio_by_rg(array($FS_KD_REG));
        $data["fisio_intervensi"]= $this->m_fisio->list_intervensi_umum_by_rg($FS_KD_REG);
        $data["fisio1"] = $this->m_rawat_jalan->get_fisio1($FS_KD_REG);
        $data["fisio2"] = $this->m_rawat_jalan->get_fisio_pasif($FS_KD_REG);
        $data["fisio3"] = $this->m_rawat_jalan->get_fisio_isom($FS_KD_REG);
        //dokter
        $data["result"] = $this->m_rawat_jalan->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS));
        //hd
        $data["medis"] =  $this->m_rawat_jalan->get_data_instruksi_medis_hd_by_rg($FS_KD_REG);
        $data["rs_monitoring_hd"]= $this->m_rawat_jalan->get_monitoring_hd($FS_KD_REG);
        //covid
        $data["covid"] =  $this->m_igd->get_px_covid($FS_KD_REG);
        $data["covid2"] =  $this->m_igd->get_data_kontak($FS_KD_REG);
        $data["covid3"] =  $this->m_igd->get_data_covid3_by_rg($FS_KD_REG);
        $data["covid4"] =  $this->m_igd->get_data_covid4_by_rg($FS_KD_REG);
        $data["covid5"] =  $this->m_igd->get_data_covid5_by_rg2($FS_KD_REG);
        $data["covid6"] =  $this->m_igd->get_data_covid6_by_rg($FS_KD_REG);
        $data["covid7"] =  $this->m_igd->get_data_covid7_by_rg($FS_KD_REG);
        $data["covid8"] =  $this->m_igd->get_data_covid8_by_rg($FS_KD_REG);
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
        //fisio    
        }elseif($FS_FORM == '5'){
            $this->load->view('rm/rawat_jalan/fisio', $data);
        }elseif($FS_FORM == '6'){
            $this->load->view('rm/rawat_jalan/covid', $data);
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
            $html2pdf->Output($FS_KD_REG . '.pdf','FI');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }

   public function cetak_rujukan($FS_KD_REG = "", $FS_KD_TRS = "") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d');
        $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG));
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
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output($FS_KD_REG . '.pdf','FI');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }
    
   public function cetak_rujukan_lab($FS_KD_REG = "", $FS_KD_TRS ="") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d');
        $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG));
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
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output($FS_KD_REG . '.pdf','FI');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }
   public function cetak_rujukan_rad($FS_KD_REG = "", $FS_KD_TRS ="") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d');
        $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG));
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
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output($FS_KD_REG . '.pdf','FI');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }

    public function resume($FS_MR = "") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d');
        $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rm(array($now,$FS_MR));
        $data["rs_pasien_inap"]= $this->m_rawat_jalan->get_px_rawat_inap(array($FS_MR));
        $data["rs_resume"]= $this->m_rawat_jalan_nurse->get_resume_rawat_jalan(array($FS_MR));
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
            $html2pdf->Output($FS_KD_REG . '.pdf','FI');
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
            $html2pdf->Output($rs_pasien['FS_NM_PASIEN'] . '.pdf','FI');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }
    
    public function cetak_skdp($FS_KD_REG = "", $FS_KD_TRS = "",$FS_KD_KP= "") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d');
        $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG));
        $data['rs_skdp'] = $this->m_rawat_jalan->get_data_skdp_by_rg(array($FS_KD_REG));
        $data["result"] = $this->m_rawat_jalan->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS));
        $data["ceklabskdp"] = $this->m_rawat_jalan->get_cek_lab_skdp(array($FS_KD_REG));
        $data["cekradskdp"] = $this->m_rawat_jalan->get_cek_rad_skdp(array($FS_KD_REG));
        $data["rs_lab"] = $this->m_rawat_jalan->get_data_order_lab_by_rg3(array($FS_KD_REG));
        $data["rs_rad"] = $this->m_rawat_jalan->get_data_order_rad_by_rg3(array($FS_KD_REG));
        $data['rs_resep'] = $this->m_farmasi_inap->get_resep_by_trs(array($FS_KD_KP));
        $data["header1"] = $this->m_rawat_jalan->get_header1();
        $data["header2"] = $this->m_rawat_jalan->get_header2();
        $data["alamat"] = $this->m_rawat_jalan->get_alamat();
        ob_start();
        $this->load->view('rm/rawat_jalan/skdp', $data);
        $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output($FS_KD_REG . '.pdf','FI');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }
    
	public function cetak_skdp_hd($FS_KD_REG = "", $FS_KD_TRS = "") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d');
        $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG));
        $data['rs_skdp'] = $this->m_rawat_jalan->get_data_skdp_by_rg(array($FS_KD_REG));
        $data["result"] = $this->m_rawat_jalan->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS));
        $data["ceklabskdp"] = $this->m_rawat_jalan->get_cek_lab_skdp(array($FS_KD_REG));
        $data["cekradskdp"] = $this->m_rawat_jalan->get_cek_rad_skdp(array($FS_KD_REG));
        $data["rs_lab"] = $this->m_rawat_jalan->get_data_order_lab_by_rg3(array($FS_KD_REG));
        $data["rs_rad"] = $this->m_rawat_jalan->get_data_order_rad_by_rg3(array($FS_KD_REG));
        $data["header1"] = $this->m_rawat_jalan->get_header1();
        $data["header2"] = $this->m_rawat_jalan->get_header2();
        $data["alamat"] = $this->m_rawat_jalan->get_alamat();
        ob_start();
        $this->load->view('rm/rawat_jalan/skdp_hd', $data);
        $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output($FS_KD_REG . '.pdf','FI');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }
	
     public function cetak_copy_resep($FS_KD_REG = "", $FS_KD_TRS = "") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d');
        $data['rs_pasien'] = $this->m_farmasi->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG,$FS_KD_TRS));
        $data['rs_resep'] = $this->m_farmasi->get_resep_by_trs(array($FS_KD_TRS));
        ob_start();
        $this->load->view('rm/rawat_jalan/copy_resep', $data);
        $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF();
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output($rs_pasien['FS_NM_PASIEN'] . '.pdf','FI');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }
    
    public function cetak_prb($FS_KD_REG = "", $FS_KD_TRS = "",$FS_KD_KP="") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d');
        $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG));
        $data['rs_rujukan'] = $this->m_rawat_jalan->get_data_rujukan_by_rg(array($FS_KD_REG));
        $data["result"] = $this->m_rawat_jalan->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS));
        $data['rs_resep'] = $this->m_farmasi_inap->get_resep_by_trs(array($FS_KD_KP));
        $data["header1"] = $this->m_rawat_jalan->get_header1();
        $data["header2"] = $this->m_rawat_jalan->get_header2();
        $data["alamat"] = $this->m_rawat_jalan->get_alamat();
        ob_start();
        $this->load->view('rm/rawat_jalan/prb', $data);
        $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output($FS_KD_REG . '.pdf','FI');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }
    
     public function cetak_sehat_covid($FS_KD_REG = "", $FS_KD_TRS = "") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d');
        $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG));
        $data["result"] = $this->m_rawat_jalan->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS));
        $data["vs"] = $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG));
        $data['rs_surat'] = $this->m_surat_sehat->get_surat_by_rg(array($FS_KD_REG));
        $data["header1"] = $this->m_rawat_jalan->get_header1();
        $data["header2"] = $this->m_rawat_jalan->get_header2();
        $data["alamat"] = $this->m_rawat_jalan->get_alamat();
        ob_start();
        $this->load->view('rm/rawat_jalan/sehat_covid', $data);
        $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output($FS_KD_REG . '.pdf','FI');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }
    
     public function cetak_rapid_covid($FS_KD_REG = "", $FS_KD_TRS = "") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d');
        $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG));
        $data["header1"] = $this->m_rawat_jalan->get_header1();
        $data["header2"] = $this->m_rawat_jalan->get_header2();
        $data["alamat"] = $this->m_rawat_jalan->get_alamat();
        ob_start();
        $this->load->view('rm/rawat_jalan/rapid_covid', $data);
        $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output($FS_KD_REG . '.pdf','FI');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }
    
    public function cetak_resep($FS_KD_REG = "", $FS_KD_TRS = "") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d');
        $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG));
        $data['medis'] = $this->m_rawat_jalan->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS));
        $data['antrian'] = $this->m_rawat_jalan->get_antrian_obat_by_trs(array($FS_KD_TRS));
        ob_start();
        $this->load->view('medis/rawat_jalan/resep', $data);
        $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF();
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output($rs_pasien['FS_NM_PASIEN'] . '.pdf','FI');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }

     public function cetak_rb($FS_KD_REG = "", $FS_KD_TRS = "",$FS_KD_KP="") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d');
        $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG));
        $data['rs_rujukan'] = $this->m_rawat_jalan->get_data_rujukan_by_rg(array($FS_KD_REG));
        $data["result"] = $this->m_rawat_jalan->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS));
        $data['rs_resep'] = $this->m_farmasi_inap->get_resep_by_rg(array($FS_KD_KP));
        $data["header1"] = $this->m_rawat_jalan->get_header1();
        $data["header2"] = $this->m_rawat_jalan->get_header2();
        $data["alamat"] = $this->m_rawat_jalan->get_alamat();
        ob_start();
        $this->load->view('rm/rawat_jalan/rb', $data);
        $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output($FS_KD_REG . '.pdf','FI');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }
}
