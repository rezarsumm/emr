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
        $this->load->model('m_igd'); 
        $this->load->model('m_rawat_jalan');  
        $this->load->model('m_rawat_inap');  
        $this->load->model('m_kep');  
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
        $this->smarty->assign("template_content", "igd/cari_ews.html");
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

       $this->smarty->assign("rs_pasien", $this->m_igd->get_pasien_ugd());
   
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
        $this->smarty->assign("template_content", "igd/ews.html");
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


                          $this->smarty->assign("rs_pasien", $this->m_igd->get_pasien_by_rg_ugd(array($FS_RG)));
        
                          $this->smarty->assign("result", $this->m_igd->get_ews(array($FS_RG)));
                          $this->smarty->assign("rs_kep_tind", $this->m_kep->list_kep_tindakan_by_rg());
                  
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
        $this->smarty->assign("template_content", "igd/ews.html");
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


                          $this->smarty->assign("rs_pasien", $this->m_igd->get_pasien_by_rg_ugd(array($FS_RG)));
        
                          $this->smarty->assign("result", $this->m_igd->get_ews(array($FS_RG)));

                          $this->smarty->assign("rs_kep_tind", $this->m_kep->list_kep_tindakan_by_rg());
                  
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
            else    if( $tde>='111' && $tde<='219' ){
                $std=0;
            }
            else    if( $tde>='101' && $tde<='110' ){
                $std=1;
            }
            else    if( $tde>='91' &&  $tde<='100' ){
                $std=2;
            }
            else    if( $tde<='90' ){
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
        redirect("igd/ews/add2/" . $this->input->post('FS_KD_REG'));
    }



    public function cetak($FS_KD_REG = "",$FS_FORM="") {    
        $this->_set_page_rule("R");
    
        $this->load->library('html2pdf'); 
         //resume
        $now = date('Y-m-d');    
        // $data['rs_pasien']= $this->m_igd->get_pasien_by_rg_ugd(array($FS_RG));     

       $data['rs_pasien'] = $this->m_igd->get_pasien(array($FS_KD_REG));

        $data['result']= $this->m_igd->get_ews(array($FS_KD_REG));     
        
         //header 
        $data["header1"] = $this->m_rawat_jalan->get_header1();
        $data["header2"] = $this->m_rawat_jalan->get_header2();
        $data["alamat"] = $this->m_rawat_jalan->get_alamat();
        ob_start();
            
            $this->load->view('igd/cetak_ews', $data);
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



        public function cetak_pulang($FS_KD_REG = "",$FS_FORM="") {    
            $this->_set_page_rule("R");
        
            $this->load->library('html2pdf'); 
             //resume
            $now = date('Y-m-d');    
            // $data['rs_pasien']= $this->m_igd->get_pasien_by_rg_ugd(array($FS_RG));     
    
           $data['rs_pasien'] = $this->m_rawat_inap->get_px_by_dokter_by_rg2(array($FS_KD_REG));
           $data["vs"] = $this->m_igd->ttd(array($FS_KD_REG));
    
            $data['rp']= $this->m_igd->get_rp(array($FS_KD_REG));      
            
             //header 
            $data["header1"] = $this->m_rawat_jalan->get_header1();
            $data["header2"] = $this->m_rawat_jalan->get_header2();
            $data["alamat"] = $this->m_rawat_jalan->get_alamat();
            ob_start();
                
                $this->load->view('igd/cetak_rp', $data);
                //Hemodialisa     
            $content = ob_get_contents();
            ob_end_clean();
        
                try {
                    $html2pdf = new HTML2PDF('P', 'A4', 'fr');
                    $html2pdf->pdf->SetDisplayMode('fullpage');
                    $html2pdf->setDefaultFont('Arial');
                    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
                    $html2pdf->Output('ews.pdf');
                } catch (HTML2PDF_exception $e) {
                    echo $e;
                    exit;
                }
            } 

}