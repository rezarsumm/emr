<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class asesmenawal extends ApplicationBase {
 
// constructor
    public function __construct() {
// parent constructor
        parent::__construct();
// load model

        $this->load->model('m_rawat_inap');
        $this->load->model('m_rawat_jalan');
        $this->smarty->assign('m_rawat_jalan', $this->m_rawat_jalan);
        $this->load->model('m_rawat_jalan_nurse');

        $this->load->library('tnotification');
    }
 
// list surat masuk
    public function index() { 
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "medis/asesmenawal/index.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        // $this->smarty->assign("rs_pasien", $this->m_rawat_inap->get_pasien_by_rg2(array($FS_RG)));
        $tgl=date('Y-m-d');
        $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_px_ases_umum(array($tgl)));           

        $this->smarty->assign("nama_obat", $this->m_rawat_jalan->list_nama_obat());
        // $this->smarty->assign("medis", $this->m_rawat_inap->get_data_medis_by_rg2(array($FS_RG)));
        //$this->smarty->assign("ases2", $this->m_rawat_inap->get_data_ases2_by_rg(array($FS_RG)));
        //$this->smarty->assign("rs_layanan", $this->m_rawat_inap->get_layanan());
        //$this->smarty->assign("rs_masalah_kep",$this->m_rawat_inap->list_masalah_kep_by_rg($FS_RG));

        // notification  
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }


    public function create($FS_KD_REG = "") { 

        $cekasesmen = $this->m_rawat_jalan->cek_asesmen_umum(array($FS_KD_REG));

        if ($cekasesmen >= '1') {
           // set page rules
           $this->_set_page_rule("R");
           // set template content
                   $this->smarty->assign("template_content", "medis/asesmenawal/edit.html");
                   $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
                   $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
                   $this->smarty->load_javascript('resource/js/jquery/select2.js');
                   $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
                   // load style
                   $this->smarty->load_style("jquery.ui/select2/select2.css");
                   // load style ui
                   $this->smarty->assign("rs_dokter", $this->m_rawat_jalan->get_dokter()); 
                   $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
                   $now = date('Y-m-d'); 
                    $this->smarty->assign("medis", $this->m_rawat_jalan->get_data_awal_inap(array($FS_KD_REG)));
                    $this->smarty->assign("rs_pasien", $this->m_rawat_inap->get_pasien_by_rg2(array($FS_KD_REG)));  
                    $this->smarty->assign("vs", $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG)));
                    $this->smarty->assign("nyeri", $this->m_rawat_jalan->get_data_nyeri_by_rg(array($FS_KD_REG)));
                    $this->smarty->assign("jatuh", $this->m_rawat_jalan->get_data_jatuh_by_rg(array($FS_KD_REG)));
                    $this->smarty->assign("ases2", $this->m_rawat_jalan->get_data_ases2_by_rg(array($FS_KD_REG)));
    
                    $this->smarty->assign("result", $this->m_rawat_inap->get_data_medis_by_rg2(array($FS_KD_REG)));
                    $this->smarty->assign("result", $this->m_rawat_inap->get_data_medis_by_rg21(array($FS_KD_REG)));
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
                $this->smarty->assign("template_content", "medis/asesmenawal/add.html");
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
                $this->smarty->assign("medis", $this->m_rawat_jalan->get_data_awal_inap(array($FS_KD_REG)));
 
        $this->smarty->assign("result2", $this->m_rawat_inap->get_data_medis_by_rg2(array($FS_KD_REG)));
 
                 $this->smarty->assign("vs", $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG)));
                $this->smarty->assign("nyeri", $this->m_rawat_jalan->get_data_nyeri_by_rg(array($FS_KD_REG)));
                $this->smarty->assign("jatuh", $this->m_rawat_jalan->get_data_jatuh_by_rg(array($FS_KD_REG)));
                $this->smarty->assign("ases2", $this->m_rawat_jalan->get_data_ases2_by_rg(array($FS_KD_REG)));

        $this->smarty->assign("result3", $this->m_rawat_jalan_nurse->get_px_by_dokter_by_rg2(array($FS_KD_REG)));

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




    public function add_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
        // process

           $rlab='';
           

          $lab = $this->input->post('FS_PLANNING_LAB'); 
          $lablama = $this->input->post('inilablama'); 
          $radlama = $this->input->post('iniradlama'); 
                if (!empty($lab)) {
                    if($lab==$lablama){
                        $rlab=$lablama;
                    }
                    else{
                        foreach ($lab as $key => $value) {
                            $rlab=$rlab.', '.$value;
                        }
                    }
                }


                   $rrad='';

          $rad = $this->input->post('FS_PLANNING_RAD'); 
                if (!empty($rad)) {
                    if($rad==$radlama){
                        $rrad=$radlama;
                    }
                    else{
                     foreach ($rad as $key => $valu) {
                        $rrad=$rrad.', '.$valu;
                     }
                    }
                }


                $terapi1=$this->input->post('FS_TERAPI');
                $terapi2=$this->input->post('FS_TERAPI2');
               
                $terapinya=$terapi1." ".$terapi2;


        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                '',
                $this->input->post('FS_KD_REG'),
                $this->input->post('FS_DIAGNOSA'),
                $this->input->post('FS_ANAMNESA'),
                $this->input->post('FS_TINDAKAN'),
                $terapinya,
                $this->input->post('FS_CATATAN_FISIK'),
                $this->com_user['user_name'],
                $this->input->post('FS_CARA_PULANG'),
                $this->input->post('FS_DAFTAR_MASALAH'),
                 $rlab, 
                 $rrad, 
                $this->input->post('FS_HASIL_PEMERIKSAAN_PENUNJANG'),
                '1',
                $this->input->post('FS_MR'),
                $this->input->post('FS_PESAN'),
                $this->input->post('FS_RIW_PENYAKIT_DAHULU'),
                $this->input->post('FS_RIW_PENYAKIT_DAHULU2'),
                $this->input->post('FS_ALERGI'),
                $this->input->post('FS_REAK_ALERGI'),
                $this->input->post('FS_STATUS_PSIK'),
                $this->input->post('FS_HUB_KELUARGA'),
                $this->input->post('KONJUNGTIVA'),
                $this->input->post('DEVIASI'),
                $this->input->post('SKELERA'),
                $this->input->post('JVP'),
                $this->input->post('BIBIR'),
                $this->input->post('MUKOSA'),
                $this->input->post('THORAX'),
                $this->input->post('JANTUNG'),
                $this->input->post('ABDOMEN'),
                $this->input->post('PINGGANG['),
                $this->input->post('EKS_ATAS'),
                $this->input->post('EKS_BAWAH'),
                $this->com_user['user_id'],
                date('Y-m-d'),
                date('H:i:s')
                 
            ); 
            if ($this->m_rawat_inap->insert2($params)) {
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
        redirect("medis/asesmenawal");
    }



    public function edit_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process

        $terapi1=$this->input->post('FS_TERAPI');
        $terapi2=$this->input->post('FS_TERAPI2');
    
     $terapinya=$terapi1." ".$terapi2;


         $rlab='';

          $lab = $this->input->post('FS_PLANNING_LAB'); 
                if (!empty($lab)) {
                     foreach ($lab as $key => $value) {
                        $rlab=$rlab.', '.$value;
                    }
                }


                   $rrad='';

          $rad = $this->input->post('FS_PLANNING_RAD'); 
                if (!empty($rad)) {
                     foreach ($rad as $key => $valu) {
                        $rrad=$rrad.', '.$valu;
                    }
                }

        if ($this->tnotification->run() !== FALSE) {
              
             
                $params = array(
                $this->input->post('FS_DIAGNOSA'),
                $this->input->post('FS_ANAMNESA'),
                $this->input->post('FS_TINDAKAN'),
                $terapinya,
                $this->input->post('FS_CATATAN_FISIK'),
               
                $this->input->post('FS_CARA_PULANG'),
                $this->input->post('FS_DAFTAR_MASALAH'),
                $rlab, 
                $rrad, 
                $this->input->post('FS_HASIL_PEMERIKSAAN_PENUNJANG'),
                $this->input->post('FS_PESAN'),
                $this->input->post('FS_RIW_PENYAKIT_DAHULU'),
                $this->input->post('FS_RIW_PENYAKIT_DAHULU2'),
                $this->input->post('FS_ALERGI'),
                $this->input->post('FS_REAK_ALERGI'),
                $this->input->post('FS_STATUS_PSIK'),
                $this->input->post('FS_HUB_KELUARGA'),
                $this->input->post('KONJUNGTIVA'),
                $this->input->post('DEVIASI'),
                $this->input->post('SKELERA'),
                $this->input->post('JVP'),
                $this->input->post('BIBIR'),
                $this->input->post('MUKOSA'),
                $this->input->post('THORAX'),
                $this->input->post('JANTUNG'),
                $this->input->post('ABDOMEN'),
                $this->input->post('PINGGANG['),
                $this->input->post('EKS_ATAS'),
                $this->input->post('EKS_BAWAH'),
                $this->input->post('FS_KD_REG'),
                $this->com_user['user_name'],    
               );
            
               if ( $this->m_rawat_inap->update2($params)) {
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
        redirect("medis/asesmenawal");
    }



}