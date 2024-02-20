<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class rawat_inap extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_rawat_inap');
        $this->load->model('m_rawat_jalan');
        $this->load->model('m_rawat_jalan_nurse');
        $this->load->model('m_ass_awal');
        $this->load->model('m_igd');
        // load library
        $this->load->library('tnotification');
        $this->load->library('pagination');
        $this->load->library('datetimemanipulation');
        $this->load->library('tupload');
        //$this->load->library('twhatsapp');
        $this->smarty->assign('dtm', $this->datetimemanipulation);
        $this->smarty->assign('m_rawat_inap', $this->m_rawat_inap);
    }

    // tambah surat masuk
    public function index() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
         $role = $this->com_user['role_id'];
          if ($role == '24'){

        $this->smarty->assign("template_content", "medis/rawat_inap/listugd.html");
        } 
        else{
         $this->smarty->assign("template_content", "medis/rawat_inap/list.html");
        }
       
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

          if ($role == '6'){
            $this->smarty->assign("rs_pasien", $this->m_rawat_inap->get_pasien_bangsal());
        
        }
         else if ($role == '23'){
            $this->smarty->assign("rs_pasien", $this->m_rawat_inap->get_pasien_bangsal());
        
        }


        else if ($role == '24'){
             $this->smarty->assign("rs_pasien", $this->m_rawat_inap->get_pasien_ugd());
        
        }
 

        else{
           $this->smarty->assign("rs_pasien", $this->m_rawat_inap->get_pasien_bangsal_by_bangsal3(array($this->com_user['fs_kd_layanan'])));
        } 

       
        // notification
        $this->tnotification->display_notification();  
        $this->tnotification->display_last_field();
        // output
        parent::display(); 
    }

    // tambah surat masuk
    public function cari2() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "medis/rawat_inap/list_his.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function cari_process_cppt($FS_RG2="") {
        $cek = $this->m_rawat_inap->cek_rawat_inap(array($FS_RG2));
        if ($cek == '0') {
            redirect("medis/rawat_inap/add/" . $FS_RG2);
        } elseif ($cek >= '1') {
            redirect("medis/rawat_inap/edit/" . $FS_RG2);
        }
    }
    
    public function cari_process($FS_RG2="") {
        $FS_RG2 = $this->input->post('FS_RG');
        $cek = $this->m_rawat_inap->cek_rawat_inap(array($FS_RG2));
        if ($cek == '0') {
            redirect("medis/rawat_inap/add/" . $FS_RG2);
        } elseif ($cek >= '1') {
            redirect("medis/rawat_inap/edit_umum/" . $FS_RG2);
        }
    }
 
    public function cari_process2() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_MR', 'No MR', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            // insert
            redirect("medis/rawat_inap/lists2/" . $this->input->post('FS_MR'));
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("medis/rawat_inap/cari2");
    }

    // tambah surat masuk
    public function lists($FS_MR = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "medis/rawat_inap/list2.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        //$new_reg = number_format(347104100000000 + $FS_MR, 0, "", "");
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_rawat_inap->get_pasien_by_mr($FS_MR));
        //$this->smarty->assign("rs_ass_awal", $this->m_rawat_inap->get_all_ass_awal($new_reg));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function lists2($FS_MR = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "medis/rawat_inap/list2.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $new_reg = number_format(347104100000000 + $FS_MR, 0, "", "");
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_rawat_inap->get_pasien_by_mr($new_reg));
        //$this->smarty->assign("rs_ass_awal", $this->m_rawat_inap->get_all_ass_awal($new_reg));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }
 
    public function add($FS_RG = '') {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "medis/rawat_inap/add.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_rawat_inap->get_pasien_by_rg2(array($FS_RG)));
        $this->smarty->assign("nama_obat", $this->m_rawat_jalan->list_nama_obat());
        $this->smarty->assign("medis", $this->m_rawat_inap->get_data_medis_by_rg2(array($FS_RG)));
         
        $this->smarty->assign("result3", $this->m_rawat_jalan_nurse->get_px_by_dokter_by_rg2(array($FS_RG)));

        $this->smarty->assign("data", $this->m_igd->get_data_medis_by_noreg(array($FS_RG)));           
        $this->smarty->assign("ps", $this->m_igd->get_suami(array($FS_RG)));           
        $this->smarty->assign("alergi", $this->m_igd->get_alergi(array($FS_RG)));           
 
        $this->smarty->assign("nyeri", $this->m_rawat_jalan->get_data_nyeri_by_rg(array($FS_RG)));
        $this->smarty->assign("jatuh", $this->m_igd->get_data_jatuh_by_rg(array($FS_RG))); 
        $this->smarty->assign("nutrisi", $this->m_rawat_jalan->get_data_nutrisi_by_rg(array($FS_RG)));
 
         $this->smarty->assign("fungsi", $this->m_ass_awal->get_data_fungsi_by_rg(array($FS_RG)));
      

        $this->smarty->assign("ases2", $this->m_rawat_jalan->get_data_ases2_by_rg(array($FS_RG)));

        
        // notification  
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    } 

       public function addr($FS_RG = '', $FS_KD_TRS = '') {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "medis/rawat_inap/addr.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_rawat_inap->get_pasien_by_rg2(array($FS_RG)));
      

         $this->smarty->assign("medis", $this->m_rawat_jalan->get_data_medis_by_rg2(array($FS_RG, $FS_KD_TRS)));

        //$this->smarty->assign("ases2", $this->m_rawat_inap->get_data_ases2_by_rg(array($FS_RG)));
        //$this->smarty->assign("rs_layanan", $this->m_rawat_inap->get_layanan());
        //$this->smarty->assign("rs_masalah_kep",$this->m_rawat_inap->list_masalah_kep_by_rg($FS_RG));

        // notification  
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    } 

    public function edit($FS_RG = "") {
        // set page rules
        $this->_set_page_rule("C"); 
        // set template content
        $this->smarty->assign("template_content", "medis/rawat_inap/edit.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_rawat_inap->get_pasien_by_rg2(array($FS_RG)));  
        $this->smarty->assign("result3", $this->m_rawat_jalan_nurse->get_px_by_dokter_by_rg2(array($FS_KD_REG)));
        $this->smarty->assign("result", $this->m_rawat_inap->get_data_medis_by_rg2(array($FS_RG)));
        
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }



       public function edit_umum($FS_RG = "") {
        // set page rules
        $this->_set_page_rule("C"); 
        // set template content
        $this->smarty->assign("template_content", "medis/rawat_inap/edit_umum.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_rawat_inap->get_pasien_by_rg2(array($FS_RG)));  

        $this->smarty->assign("result", $this->m_rawat_inap->get_data_medis_by_rg2(array($FS_RG)));
        $this->smarty->assign("bio", $this->m_igd->biososio(array($FS_RG)));
        $this->smarty->assign("ases2", $this->m_rawat_jalan->get_data_ases2_by_rg(array($FS_RG)));
        $this->smarty->assign("result3", $this->m_rawat_jalan_nurse->get_px_by_dokter_by_rg2(array($FS_RG)));
        
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    // add data
    public function add_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
        // process

           $rlab='';


           $params1 = array(
            $this->input->post('PERNIKAHAN'),
            $this->input->post('JOB'),
            $this->input->post('FS_AGAMA'),
            $this->input->post('SUKU'),
            $this->input->post('FS_MR'),
        ); 
        $this->m_igd->update_biososio($params1);
        



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
                '',
                $this->input->post('FS_KD_REG'),
                $this->input->post('FS_DIAGNOSA'),
                $this->input->post('FS_ANAMNESA'),
                $this->input->post('FS_TINDAKAN'),
                $this->input->post('FS_TERAPI'),
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
                $this->com_user['user_id'],
                date('Y-m-d'),
                date('H:i:s')
                 
            ); 
            if ($this->m_rawat_inap->insert($params)) {
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
        redirect("medis/rawat_inap");
    }





      public function add_process_umum() {
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
                $this->input->post('MENTAL'),
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
        redirect("medis/rawat_inap");
    }


    public function edit_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process

         $rlab='';

          $lab = $this->input->post('FS_PLANNING_LAB'); 
                if (!empty($lab)) {
                     foreach ($lab as $key => $value) {
                        $rlab=$rlab.', '.$value;
                    }
                }

                // var_dump($lab);
                // die; 


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
                $this->input->post('FS_TERAPI'),
                $this->input->post('FS_CATATAN_FISIK'),
               
                $this->input->post('FS_CARA_PULANG'),
                $this->input->post('FS_DAFTAR_MASALAH'),
                $rlab, 
                $rrad, 
                $this->input->post('FS_HASIL_PEMERIKSAAN_PENUNJANG'),
                 $this->input->post('FS_PESAN'),
                $this->input->post('FS_KD_REG')    
               );
            
               if ( $this->m_rawat_inap->update($params)) {
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
        redirect("medis/rawat_inap/");
    }





     

      public function edit_process_umum() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process

        $terapi1=$this->input->post('FS_TERAPI');
        $terapi2=$this->input->post('FS_TERAPI2');
    
        $terapinya=$terapi1." ".$terapi2;


        $params1 = array(
            $this->input->post('PERNIKAHAN'),
            $this->input->post('JOB'),
            $this->input->post('FS_AGAMA'),
            $this->input->post('SUKU'),
            $this->input->post('FS_MR'),
        ); 
        $this->m_igd->update_biososio($params1);


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
                $this->input->post('MENTAL'),
                $this->input->post('KONJUNGTIVA'),
                $this->input->post('DEVIASI'),
                $this->input->post('SKELERA'),
                $this->input->post('JVP'),
                $this->input->post('BIBIR'),
                $this->input->post('MUKOSA'),
                $this->input->post('THORAX'),
                $this->input->post('JANTUNG'),
                $this->input->post('ABDOMEN'),
                $this->input->post('PINGGANG'),
                $this->input->post('EKS_ATAS'),
                $this->input->post('EKS_BAWAH'),
                $this->input->post('FS_KD_REG'),
                $this->com_user['user_name'],    
               );
            
               if ( $this->m_rawat_inap->update2($params)) {

                
                $riwayat = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FS_DIAGNOSA_0'),
                    $this->input->post('FS_ANAMNESA_0'),
                    $this->input->post('FS_TINDAKAN_0'), 
                    $this->input->post('FS_TERAPI_0'), 
                    $this->input->post('FS_CATATAN_FISIK_0'),
                    $this->input->post('FS_DAFTAR_MASALAH_0'), 
                    $this->input->post('FS_LAB_0'), 
                    $this->input->post('FS_RAD_0'), 
                    $this->input->post('FS_HASIL_PEMERIKSAAN_PENUNJANG_0'),
                    $this->input->post('FS_PESAN_0'),
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU_0'),
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU2_0'),
                    $this->input->post('FS_ALERGI_0'),
                    $this->input->post('FS_REAK_ALERGI_0'),
                    $this->input->post('FS_STATUS_PSIK_0'),
                    $this->input->post('KONJUNGTIVA_0'),
                    $this->input->post('DEVIASI_0'),
                    $this->input->post('SKELERA_0'),
                    $this->input->post('JVP_0'),
                    $this->input->post('BIBIR_0'),
                    $this->input->post('MUKOSA_0'),
                    $this->input->post('THORAX_0'),
                    $this->input->post('JANTUNG_0'),
                    $this->input->post('ABDOMEN_0'),
                    $this->input->post('PINGGANG_0'),
                    $this->input->post('EKS_ATAS_0'),
                    $this->input->post('EKS_BAWAH_0'),
                    $this->com_user['user_name'],
                    date('Y-m-d H:i:s'),
                     
                ); 

                $this->m_rawat_jalan->insert_riwayat_ases_awal_dokter($riwayat);

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
        redirect("medis/rawat_inap");
    }


    public function cetak_ass_awal($FS_KD_REG = "") {
        $this->_set_page_rule("R");

        $this->load->library('html2pdf');
        $data['rs_pasien'] = $this->m_rawat_inap->get_pasien_by_rg(array($FS_KD_REG));
        $data['rs_ass_awal'] = $this->m_rawat_inap->get_ass_awal_by_rg(array($FS_KD_REG));
        $data['rs_diet'] = $this->m_rawat_inap->get_diet_by_rg(array($FS_KD_REG));
        $data['rs_indikasi'] = $this->m_rawat_inap->get_indikasi_dirawat_by_rg(array($FS_KD_REG));
        $data['rs_diag'] = $this->m_rawat_inap->get_diag_by_rg(array($FS_KD_REG));
        $data['rs_tind'] = $this->m_rawat_inap->get_tind_by_rg(array($FS_KD_REG));
        $data['rs_terapi'] = $this->m_rawat_inap->get_terapi_by_rg(array($FS_KD_REG));
        ob_start();
        $this->load->view('medis/rawat_inap/print', $data);
        $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output('ass_awal_pasien_pulang.pdf');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }

    // view file for view
    public function view_file($file_id = "") {
        // get detail file
        $result = $this->m_surat->view_file($file_id);
        $file_path['file'] = 'resource/doc/surat_masuk/' . $result['dossier_id'] . '/' . $result['file_nm'];
        echo json_encode($file_path);
    }

    // list_users
    public function list_planning() {
        $users = $this->m_rawat_inap->list_planning();
        $data[] = array();
        $i = 0;
        foreach ($users as $key => $value) {
            $data[$i] = array(
                'label' => $value['FS_NM_PLANNING'],
                'value' => $value['FS_KD_TRS']
            );
            $i++;
        }
        echo json_encode($data);
    }

    // list_users
    public function list_edukasi() {
        $instansi = $this->m_rawat_inap->list_edukasi();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['FS_NM_EDUKASI'],
                'value' => $value['FS_KD_TRS']
            );
            $i++;
        }
        echo json_encode($data);
    }

    public function spiritual() {
        $instansi = $this->m_rawat_inap->list_spiritual();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['FS_NM_SPIRITUAL'],
                'value' => $value['FS_KD_TRS']
            );
            $i++;
        }
        echo json_encode($data);
    }

}
