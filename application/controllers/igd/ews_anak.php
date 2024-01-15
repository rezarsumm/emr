<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class Ews_anak extends ApplicationBase {

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
        $this->smarty->assign("template_content", "igd/cari_ews_anak.html");
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

      
        $this->smarty->assign("rs_pasien", $this->m_igd->get_pasien_ugd_anak());
   
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

   


     
    public function add($FS_RG = '') {

        $FS_RG = $this->input->post('FS_RG');
        // var_dump($FS_RG);
        // die;

        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "igd/ews_anak.html");
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
        //   $cek = $this->m_igd->cek_ews_anak_awal(array($FS_RG));
        //   if ($cek == '0') {
        //     $this->smarty->assign("ews_anak1", $this->m_igd->get_vs(array($FS_RG)));
          
        //   } elseif ($cek >= '1') { 
        //     $this->smarty->assign("ews_anak1", $this->m_igd->get_vs(array($FS_RG)));

        //   }

          $date = new DateTime();
                          $date_plus = $date->modify("-1 days");
                          $akhirnya= $date_plus->format("Y-m-d");


                          $this->smarty->assign("rs_pasien", $this->m_igd->get_pasien_by_rg_ugd(array($FS_RG)));
        
                          $this->smarty->assign("result", $this->m_igd->get_ews_anak(array($FS_RG))); 
                  
        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);
         $this->smarty->assign("namarole", $rolenya); 
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }




    
    public function cetak($FS_KD_REG = "",$FS_FORM="") {    
        $this->_set_page_rule("R");
    
        $this->load->library('html2pdf'); 
         //resume
        $now = date('Y-m-d');    
        // $data['rs_pasien']= $this->m_igd->get_pasien_by_rg_ugd(array($FS_RG));     

       $data['rs_pasien'] = $this->m_igd->get_pasien(array($FS_KD_REG));

        $data['result']= $this->m_igd->get_ews_anak(array($FS_KD_REG));     
        
         //header 
        $data["header1"] = $this->m_rawat_jalan->get_header1();
        $data["header2"] = $this->m_rawat_jalan->get_header2();
        $data["alamat"] = $this->m_rawat_jalan->get_alamat();
        ob_start();
            
            $this->load->view('igd/cetak_ews_anak', $data);
            //Hemodialisa     
        $content = ob_get_contents();
        ob_end_clean();
    
            try {
                $html2pdf = new HTML2PDF('L', 'A4', 'fr');
                $html2pdf->pdf->SetDisplayMode('fullpage');
                $html2pdf->setDefaultFont('Arial');
                $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
                $html2pdf->Output('ews.pdf');
            } catch (HTML2PDF_exception $e) {
                echo $e;
                exit;
            }
        } 




    public function add2($FS_RG = '') {


        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "igd/ews_anak.html");
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
        
                          $this->smarty->assign("result", $this->m_igd->get_ews_anak(array($FS_RG)));
 
                  
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

            if( $this->input->post('NAFAS')>='50'){
                $sn=3;
            }
            else  if( $this->input->post('NAFAS')>='40' && $this->input->post('NAFAS')<='49' ){
                $sn=2;
            }
            else  if( $this->input->post('NAFAS')>='30' && $this->input->post('NAFAS')<='39' ){
                $sn=1;
            }
            else  if( $this->input->post('NAFAS')>='16' && $this->input->post('NAFAS')<='29' ){
                $sn=0;
            }
            else  if( $this->input->post('NAFAS')>='11' && $this->input->post('NAFAS')<='15' ){
                $sn=1;
            }
           
            else  if($this->input->post('NAFAS')<='10' ){
                $sn=3;
            }



            if( $this->input->post('O2')>='94'){
                $so=0;
            }
            else    if( $this->input->post('O2')>='90' &&  $this->input->post('O2')<='93' ){
                $so=1;
            }
            else    if( $this->input->post('O2')>='86' &&  $this->input->post('O2')<='89' ){
                $so=2;
            }
            else    if($this->input->post('O2')<='85' ){
                $so=3;
            }


            if( $this->input->post('CRT')>'2'){
                $sc=3;
            }
            else{
                $sc=0;
            }
       



            if( $this->input->post('AB')=='Tidak'){
                $sa=0;
            }
            else{
                if( $this->input->post('AB2')>'2'){
                    $sa=2;
                }
                else   if( $this->input->post('AB2')<='2'){
                    $sa=1;
                }
            }
           


            if( $this->input->post('S')>='38,5'){
                $ss=3;
            }
            else    if( $this->input->post('S')>='36' &&  $this->input->post('S')<='37' ){
                $ss=0;
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

            if( $tde>='140'){
                $std=3;
            }
            else    if( $tde>='130' &&  $tde<='139' ){
                $std=2;
            }
            else    if( $tde>='120' &&  $tde<='129' ){
                $std=1;
            }
            else    if( $tde>='90' &&  $tde<='119' ){
                $std=0;
            }
            else    if( $tde>='80' &&  $tde<='89' ){
                $std=1;
            }
            else    if(  $tde<='80' ){
                $std=3;
            }



            if( $this->input->post('SADAR')>='A'){
                $sd=0;
            }
            else  if( $this->input->post('SADAR')>='V'){
                $sd=1;
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
                $this->input->post('RETRAKSI'),
                $this->input->post('O2'),
                $so,
                $this->input->post('CRT'),
                $sc,
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
            if ($this->m_igd->INSERT_EWS_ANAK($params)) {
               
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
        redirect("igd/ews_anak/add2/" . $this->input->post('FS_KD_REG'));
    }


}