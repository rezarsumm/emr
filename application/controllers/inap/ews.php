<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class Ews extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_cppt');
        $this->load->model('m_igd');
        $this->load->model('m_resume');
        $this->load->model('m_ass_jatuh');
        $this->load->model('m_rawat_jalan');
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
        $this->smarty->assign("template_content", "inap/cari_ews.html");
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

        if($FS_RG!=''){ $FS_RG= $FS_RG; }
        else{
        $FS_RG = $this->input->post('FS_RG');}

        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/ews.html");
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
          $tgl_sekarang =strtotime(date('Y-m-d'));
          $tgl_kemarin =date('Y-m-d', strtotime("-1 day", $tgl_sekarang));
 
        $this->smarty->assign("tgl_kemarin", $tgl_kemarin);
          $date = new DateTime();
                          $date_plus = $date->modify("-1 days");
                          $akhirnya= $date_plus->format("Y-m-d");


                          $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg(array($FS_RG)));
        
                          $this->smarty->assign("result", $this->m_igd->get_ews(array($FS_RG))); 
                  
        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);
         $this->smarty->assign("namarole", $rolenya); 
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }



    


       // hapus process
       public function delete($idews = "", $FS_KD_REG = "") {
        // set page rules
        $this->_set_page_rule("D");
        
        
        $data = $this->m_rawat_jalan->get_data_ews(array($idews));
        $riwayat = array(
           $data['id'],
           $data['FS_KD_REG'], 
           $data['TGL'], 
           $data['JAM'], 
           $data['NAFAS'], 
           $data['S_NAFAS'], 
           $data['O2'], 
           $data['S_O2'], 
           $data['AB'], 
           $data['S_AB'], 
           $data['S'], 
           $data['S_S'], 
           $data['J'], 
           $data['S_J'], 
           $data['TD'], 
           $data['S_TD'], 
           $data['SADAR'], 
           $data['S_SADAR'],            
           $data['MDD'],            
           $data['MDB'], 
           date('Y-m-d H:i'),           
           $this->com_user['user_name'],
        );

        // insert
        $this->m_rawat_jalan->insert_riwayat_ews($riwayat);

        if ($this->m_rawat_jalan->delete_ews($idews)) {  
            $this->tnotification->sent_notification("success", "Data berhasil dihapus");
            // default redirect
            redirect("inap/ews/add/" . $FS_KD_REG);
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Data gagal dihapus");
        }
        // default redirect
        redirect("inap/ews/add/" . $FS_KD_REG);
    }




    public function add2($FS_RG = '') {


        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/ews.html");
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
        
                          $this->smarty->assign("result", $this->m_igd->get_ews(array($FS_RG)));
 
                  
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

            if( $this->input->post('NAFAS')>='25'){
                $sn=3;
            }
            else  if( $this->input->post('NAFAS')>='21' && $this->input->post('NAFAS')<='24' ){
                $sn=2;
            }
            else  if( $this->input->post('NAFAS')>='12' && $this->input->post('NAFAS')<='20' ){
                $sn=0;
            }
            else  if( $this->input->post('NAFAS')>='9' && $this->input->post('NAFAS')<='11' ){
                $sn=1;
            }
            else  if($this->input->post('NAFAS')<='8' ){
                $sn=3;
            }



            if( $this->input->post('O2')>='96'){
                $so=0;
            }
            else    if( $this->input->post('O2')>='94' &&  $this->input->post('O2')<='95' ){
                $so=1;
            }
            else    if( $this->input->post('O2')>='92' &&  $this->input->post('O2')<='93' ){
                $so=2;
            }
            else    if($this->input->post('O2')<='91' ){
                $so=3;
            }


            if( $this->input->post('AB')=='Ya'){
                $sa=2;
            }
            else{ $sa=0;}


            if( $this->input->post('S')>='39,1'){
                $ss=2;
            }
            else    if( $this->input->post('S')>='38,1' &&  $this->input->post('S')<='39' ){
                $ss=1;
            }
            else    if( $this->input->post('S')>='36,1' &&  $this->input->post('S')<='38' ){
                $ss=0;
            }
            else    if( $this->input->post('S')>='35,1' &&  $this->input->post('S')<='36' ){
                $ss=1;
            }
            else    if( $this->input->post('S')<='35' ){
                $ss=3;
            }

            if( $this->input->post('J')>='131'){
                $sj=3;
            }
            else    if( $this->input->post('J')>='111' &&  $this->input->post('J')<='130' ){
                $sj=2;
            }
            else    if( $this->input->post('J')>='91' &&  $this->input->post('J')<='110' ){
                $sj=1;
            }
            else    if( $this->input->post('J')>='51' &&  $this->input->post('J')<='90' ){
                $sj=0;
            }
            else    if( $this->input->post('J')>='41' &&  $this->input->post('J')<='50' ){
                $sj=1;
            }
            else    if(  $this->input->post('J')<='40' ){
                $sj=3;
            }


            $tde=substr($this->input->post('TD'),0,3);

            if( $tde>='220'){
                $std=3;
            }
            else    if( $tde>='111' &&  $tde<='219' ){
                $std=0;
            }
            else    if( $tde>='101' &&  $tde<='110' ){
                $std=1;
            }
            else    if( $tde>='91' && $tde<='100' ){
                $std=2;
            }
            else    if(  $tde<='90' ){
                $std=3;
            }

            if( $this->input->post('SADAR')>='A'){
                $sd=0;
            }
            else {
                $sd=3;
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
                $this->input->post('SADAR'),
                $sd, 
                $this->com_user['user_name'],
                date('Y-m-d H:i'),
            );
            // insert 
            if ($this->m_igd->INSERT_EWS($params)) {
               
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
        redirect("inap/ews/add/" . $this->input->post('FS_KD_REG'));
    }


}