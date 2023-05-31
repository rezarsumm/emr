<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class ket_rawat extends ApplicationBase {
 
// constructor
    public function __construct() {
// parent constructor
        parent::__construct();
// load model

        $this->load->model('m_rawat_jalan');
        $this->load->model('m_cppt');
        $this->load->model('m_resume');
        $this->load->model('m_ass_jatuh');
        $this->smarty->assign('m_rawat_jalan', $this->m_rawat_jalan);
        $this->load->library('tnotification');
    }



  public function index() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        // $this->smarty->assign("template_content", "inap/cppt/list.html");
        // $this->smarty->assign("template_content", "medis/ket_rawat/index.html");
        $this->smarty->assign("template_content", "medis/ket_rawat/list.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $date = date('Y-m-d');
        $date2 = date('Y-m-dH:i:s');
        $role = $this->com_user['role_id'];

        $fs_kd_layanan = $this->com_user['fs_kd_layanan'];

        if($fs_kd_layanan == 'MNA')
        {
              $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_mina());
        }

        else{

           if ($role == '6' || $role == '11' || $role == '5' || $role == '23' || $role == '9' || $role == '8' || $role == '17' || $role == '13') {
                 $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_bangsal());
            } 

            else if ($role == '24'){
                 $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_ugd());
            
            }


            else{
               $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_bangsal_by_bangsal(array($this->com_user['fs_kd_layanan'])));
            }
        }

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }


    public function cari_process() {
        $FS_RG2 = $this->input->post('FS_RG');
        //$cek = $this->m_cppt->cek_resume(array($FS_RG2));
        //if ($cek == '0') {
        redirect("medis/ket_rawat/create_suratsakit/" . $FS_RG2);
        //} elseif ($cek == '1') {
        //redirect("inap/cppt/edit/" . $FS_RG2);
        // }
    }

    public function create_suratsakit($FS_KD_REG = "") { 

        $ceksuratsakit = $this->m_rawat_jalan->cek_surat_dirawat(array($FS_KD_REG));

        if ($ceksuratsakit >= '1') {
           // set page rules
           $this->_set_page_rule("R");
           // set template content
                   $this->smarty->assign("template_content", "medis/ket_rawat/edit_suratsakit.html");
                   $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
                   $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
                   $this->smarty->load_javascript('resource/js/jquery/select2.js');
                   $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
                   // load style
                   $this->smarty->load_style("jquery.ui/select2/select2.css");
                   // load style ui
                   $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
                   $now = date('Y-m-d'); 
                   $this->smarty->assign("rs_dokter", $this->m_rawat_jalan->get_dokter()); 
                   $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG)));
                   $this->smarty->assign("ket_sakit", $this->m_rawat_jalan->data_surat_dirawat(array($FS_KD_REG)));
           // notification
                   $this->tnotification->display_notification();
                   $this->tnotification->display_last_field();
           // output
                   parent::display();
        }
        else{

        // set page rules
                $this->_set_page_rule("R");
        // set template content
                $this->smarty->assign("template_content", "medis/ket_rawat/create_suratsakit.html");
                $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
                $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
                $this->smarty->load_javascript('resource/js/jquery/select2.js');
                $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
                // load style
                $this->smarty->load_style("jquery.ui/select2/select2.css");
                // load style ui
                $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
                $now = date('Y-m-d');
                $this->smarty->assign("rs_dokter", $this->m_rawat_jalan->get_dokter()); 
                $this->smarty->assign("vs", $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG)));
                $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG)));
                $this->smarty->assign("rs_skdp_alasan", $this->m_rawat_jalan->get_tac_com_parameter_alasan());
        // notification
                $this->tnotification->display_notification();
                $this->tnotification->display_last_field();
        // output
                parent::display();
            }
    }


     public function simpan() {
                // set page rules
                $this->_set_page_rule("C");
                // cek input
                $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
                // process
                if ($this->tnotification->run() !== FALSE) {
                  
                    $params = array(
                        $this->input->post('FS_KD_REG'),
                         $this->input->post('diagnosa'),
                         $this->input->post('mdb'), 
                        date('Y-m-d')
                    ); 
                     if ($this->m_rawat_jalan->insert_suratdirawat($params)) {
                         
                        // notification
                        $this->tnotification->delete_last_field();
                        $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
                    } else {
                        // default error
                        $this->tnotification->sent_notification("error", "Detail gagal disimpan");
                    }
                } else {
                    // default error
                    $this->tnotification->sent_notification("error", "Detail gagal disimpan");
                }
                // default redirect
                $FS_KD_REG=$this->input->post('FS_KD_REG');
                $this->_set_page_rule("R");
                $this->load->library('html2pdf');
                $now = date('Y-m-d');
                $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG));
                $data['result']= $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG));
                $data['ket_sakit']= $this->m_rawat_jalan->data_surat_dirawat(array($FS_KD_REG));
                 ob_start();
                $this->load->view('medis/ket_rawat/suratdirawat', $data);
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



            public function update() {
                // set page rules
                $this->_set_page_rule("C");
                // cek input
                $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
                // process
                if ($this->tnotification->run() !== FALSE) {
                  
                    $params = array(
                         $this->input->post('diagnosa'), 
                         $this->input->post('mdb'), 
                        date('Y-m-d'),
                        $this->input->post('FS_KD_REG')
                    ); 
                     if ($this->m_rawat_jalan->update_suratdirawat($params)) {

                        $FS_KD_REG=$this->input->post('FS_KD_REG');
                        $this->_set_page_rule("R");
                        $this->load->library('html2pdf');
                        $now = date('Y-m-d');
                        $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG));
                        $data['result']= $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG));
                        $data['ket_sakit']= $this->m_rawat_jalan->data_surat_dirawat(array($FS_KD_REG));
                         ob_start();
                        $this->load->view('medis/ket_rawat/suratdirawat', $data);
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
                         
                        // notification
                        $this->tnotification->delete_last_field();
                        $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
                    } else {
                        // default error
                        $this->tnotification->sent_notification("error", "Detail gagal disimpan");
                    }
                } else {
                    // default error
                    $this->tnotification->sent_notification("error", "Detail gagal disimpan");
                }
                // default redirect
               
            }



            public function cetak($FS_KD_REG = "") {
                $this->_set_page_rule("R");
                $this->load->library('html2pdf');
                $now = date('Y-m-d');
                $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG));
                $data['result']= $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG));
                $data['ket_sakit']= $this->m_rawat_jalan->data_surat_dirawat(array($FS_KD_REG));
                 ob_start();
                $this->load->view('medis/ket_rawat/suratdirawat', $data);
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


