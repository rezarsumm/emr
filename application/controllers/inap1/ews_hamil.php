<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class Ews_hamil extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_cppt');
        $this->load->model('m_igd');
        $this->load->model('m_resume');
        $this->load->model('m_ass_jatuh');
        // load library
        $this->load->library('tnotification');
        $this->load->library('pagination');
        $this->load->library('datetimemanipulation');
        $this->load->library('tupload');
        //$this->load->library('twhatsapp');
        $this->smarty->assign('dtm', $this->datetimemanipulation);
        $this->smarty->assign('m_cppt', $this->m_cppt);
    }


     // tambah surat masuk
     public function index() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/cari_ews_hamil.html");
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
        $x = $this->com_user['user_name'];


        $fs_kd_layanan = $this->com_user['fs_kd_layanan'];

        if($fs_kd_layanan == 'MNA')
        {
              $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_mina());
        }

        else{

           if ($role == '6' || $role == '11'  || $role == '23' || $role == '9' || $role == '8' || $role == '17' || $role == '13') {
                 $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_bangsal());
            } 
 
            else  if ($role == '5') {
                 $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_bangsal($x));
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

   


     
    public function add($FS_RG = '') {

        $FS_RG = $this->input->post('FS_RG');

        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/ews_hamil.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");

         $role = $this->com_user['role_id'];
         $rolenya=$this->com_user['role_nm'];
          $this->smarty->assign("username", $this->com_user['user_name']);
          $tgl=date('Y-m-d');

          $now = date('Y-m-d'); 
        //   $cek = $this->m_igd->cek_ews_hamil_awal(array($FS_RG));
        //   if ($cek == '0') {
        //     $this->smarty->assign("ews_hamil1", $this->m_igd->get_vs(array($FS_RG)));
          
        //   } elseif ($cek >= '1') { 
        //     $this->smarty->assign("ews_hamil1", $this->m_igd->get_vs(array($FS_RG)));

        //   }

          $date = new DateTime();
                          $date_plus = $date->modify("-1 days");
                          $akhirnya= $date_plus->format("Y-m-d");


                          $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg(array($FS_RG)));
        
                          $this->smarty->assign("result", $this->m_igd->get_ews_hamil(array($FS_RG))); 
                  
        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);
         $this->smarty->assign("namarole", $rolenya); 
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }




    public function add2($FS_RG = '') {


        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/ews_hamil.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");

         $role = $this->com_user['role_id'];
         $rolenya=$this->com_user['role_nm'];
          $this->smarty->assign("username", $this->com_user['user_name']);
          $tgl=date('Y-m-d');

          $now = date('Y-m-d'); 

          $date = new DateTime();
                          $date_plus = $date->modify("-1 days");
                          $akhirnya= $date_plus->format("Y-m-d");


                          $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg(array($FS_RG)));
        
                          $this->smarty->assign("result", $this->m_igd->get_ews_hamil(array($FS_RG)));
 
                  
        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);
         $this->smarty->assign("namarole", $rolenya); 
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function add_process() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {

            if( $this->input->post('NAFAS')>'30'){
                $sn='Red';
            }
            else  if( $this->input->post('NAFAS')>='21' && $this->input->post('NAFAS')<='30' ){
                $sn='Yellow';
            }
            else  if( $this->input->post('NAFAS')>='10' && $this->input->post('NAFAS')<='20' ){
                $sn='White';
            } 
            else  if($this->input->post('NAFAS')<'10' ){
                $sn='Red';
            }



            if( $this->input->post('O2')>='91'){
                $so='White';
            } 
            else    if($this->input->post('O2')<='90' ){
                $so='Red';
            }





            if( $this->input->post('AB')=='Ya'){
                $sa='White';
            }
            else{ $sa='White';}



            if( $this->input->post('S')>='38,1'){
                $ss='Red';
            }
            else    if( $this->input->post('S')>='36,1' &&  $this->input->post('S')<='38' ){
                $ss='White';
            }
            else    if( $this->input->post('S')>='35,1' &&  $this->input->post('S')<='36' ){
                $ss='Yellow';
            }
            else    if( $this->input->post('S')<='35' ){
                $ss='Red';
            }




            if( $this->input->post('J')>='121'){
                $sj='Red';
            }
            else    if( $this->input->post('J')>='101' &&  $this->input->post('J')<='120' ){
                $sj='Yellow';
            }
            else    if(  $this->input->post('J')<'101' ){
                $sj='White';
            }



             
            if( $this->input->post('TD')>='151'){
                $std='Red';
            }
            else    if( $this->input->post('TD')>='141' &&  $this->input->post('TD')<='150' ){
                $std='Yellow';
            }
            else    if( $this->input->post('TD')>='101' &&  $this->input->post('TD')<='140' ){
                $std='White';
            }
            else    if( $this->input->post('TD')>='91' &&  $this->input->post('TD')<='100' ){
                $std='Yellow';
            }
            else    if(  $this->input->post('TD')<='90' ){
                $std='Red';
            }




           if( $this->input->post('D')>='101'){
                $stdd='Red';
            }
            else    if( $this->input->post('D')>='91' &&  $this->input->post('D')<='100' ){
                $stdd='Yellow';
            }
            else    if( $this->input->post('D')>='41' &&  $this->input->post('D')<='90' ){
                $stdd='White';
            }
            else    if(  $this->input->post('D')<='40' ){
                $stdd='Red';
            }


            $params = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('TGL'),
                $this->input->post('JAM'),
                $this->input->post('NAFAS'),
                $sn,
                $this->input->post('O2'),
                $so,
                $this->input->post('AB'),
                $sa,
                $this->input->post('S'),
                $ss,
                $this->input->post('J'),
                $sj,
                $this->input->post('TD'),
                $std,
                $this->input->post('D'),
                $stdd, 
                $this->input->post('FREKUENSI'),
                $this->com_user['user_name'],
                date('Y-m-d H:i'),
            );
            // insert 
            if ($this->m_igd->INSERT_ews_hamil($params)) {
               
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
        redirect("inap/ews_hamil/add2/" . $this->input->post('FS_KD_REG'));
    }


}