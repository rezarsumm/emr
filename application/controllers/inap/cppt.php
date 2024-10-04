<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class cppt extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_igd');

        $this->load->model('m_cppt');
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
        $this->smarty->assign("template_content", "inap/cppt/list.html");
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

        $user_id2 = $this->com_user['user_id'];
        $this->smarty->assign("user", $user_id2);

        // var_dump($role);
        // die;


        $fs_kd_layanan = $this->com_user['fs_kd_layanan'];

        if($fs_kd_layanan == 'MNA')
        {
              $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_mina());
        }

        else{

           if ($role == '6' || $role == '11'  || $role == '23' || $role == '9' || $role == '8' || $role == '17' || $role == '13') {
                 $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_bangsal1());
            } 

            else  if ($role == '5') {
                 $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_bangsal($x));
                    //  var_dump($this->m_ass_jatuh->get_pasien_bangsal($x));
                    // die();
            } 

            else if ($role == '24'){
                 $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_ugd());
            
            }
            else if ($role=='33'){

                $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_bangsal_by_fisio());
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

    // tambah surat masuk
    public function cari2() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/cppt/list_his.html");
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

    public function cari_process() {
        $FS_RG2 = $this->input->post('FS_RG');
        //$cek = $this->m_cppt->cek_resume(array($FS_RG2));
        //if ($cek == '0') {
           $rolenya=$this->com_user['role_name'];
        redirect("inap/cppt/add/" . $FS_RG2);
        //} elseif ($cek == '1') {
        //redirect("inap/cppt/edit/" . $FS_RG2);
        // }
    }

    public function cari_process2() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_MR', 'No MR', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            // insert
            redirect("inap/cppt/lists2/" . $this->input->post('FS_MR'));
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("inap/cppt/cari2");
    }

    // tambah surat masuk
    public function lists($FS_MR = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "surat/resume/list2.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        //$new_reg = number_format(347104100000000 + $FS_MR, 0, "", "");
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_mr($FS_MR));
        //$this->smarty->assign("rs_resume", $this->m_resume->get_all_resume($new_reg));
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
        $this->smarty->assign("template_content", "inap/cppt/list2.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $new_reg = number_format(347104100000000 + $FS_MR, 0, "", "");
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_mr($new_reg));
        $this->smarty->assign("rs_resume", $this->m_cppt->get_all_resume($new_reg));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function add($FS_RG = '') {
        // set page rules
        $this->_set_page_rule("C");
        // var_dump($this->com_user['fs_kd_layanan']);
        // die;

        // set template content
        $this->smarty->assign("template_content", "inap/cppt/add.html");
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
          $this->smarty->assign("icd", $this->m_igd->get_icd());  

         $x = $this->com_user['user_name'];
          $this->smarty->assign("x", $x);  

       
           $ruangan = $this->m_cppt->get_ruangan_inap(array($FS_RG));
       
           $this->smarty->assign("rs_ruangan", $ruangan['NAMA_BANGSAL']);
           $this->smarty->assign("layanan", $this->com_user['fs_kd_layanan']);
  

     

      

   

          if ($role == '24'){
              $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg_ugd(array($FS_RG)));
            }
        else{   $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg(array($FS_RG)));
           }

   


           $tgl_sekarang =strtotime(date('Y-m-d'));
           $tgl_kemarin =date('Y-m-d', strtotime("-1 day", $tgl_sekarang));

         $this->smarty->assign("tgl_kemarin", $tgl_kemarin);

         $this->smarty->assign("rs_cppt", $this->m_cppt->get_cppt_by_rg($FS_RG));
        $this->smarty->assign("rs_resep", $this->m_cppt->get_resep());
        $tgl=date('Y-m-d');

        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);

 
        $this->smarty->assign("rs_ases_medis", $this->m_cppt->get_data_medis_by_rg(array($FS_RG)));
        $this->smarty->assign("namarole", $rolenya);
        $this->smarty->assign("rs_resume", $this->m_cppt->get_data_resume_by_rg(array($FS_RG)));
        //$this->smarty->assign("rs_lab", $this->m_cppt->get_cppt_by_rg($FS_RG));
        //$this->smarty->assign("rs_rad", $this->m_cppt->get_cppt_by_rg($FS_RG));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function add_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process

        if ($this->tnotification->run() !== FALSE) {
            $data_kp = $this->m_cppt->get_no_kp();
            $NOKP = 'KP' . $data_kp['KP'] . 'A';
            $NOKP2 = $data_kp['KP'] + 1;
            $params = array(
                $NOKP,
                date('Y-m-d'),
                date('H:i:s'),
                $this->com_user['user_name'],
                '3000-01-01',
                '00:00:00',
                $this->input->post('FS_KD_REG'),
                $this->input->post('FS_KD_LAYANAN'),
                $this->input->post('FS_KD_PETUGAS_MEDIS'),
                'dx:' . strip_tags($this->input->post('FS_CPPT_A')) . ',' . strip_tags($this->input->post('FS_CPPT_S')),
                '',
                strip_tags($this->input->post('FS_CPPT_P')) . ' , ' . strip_tags($this->input->post('FS_CPPT_O')),
                '',
                $this->com_user['user_name'],
                'RI',
                '2'
            );

            // insert
            if ($this->m_cppt->insert_medis($params)) {
                $update_kp = $this->m_cppt->update_tz_parameter_no_kp($NOKP2);
                $params2 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FS_CPPT_S'),
                    $this->input->post('FS_CPPT_O'),
                    $this->input->post('FS_CPPT_A'),
                    $this->input->post('FS_CPPT_P'),
                    '',
                    $NOKP,
                    $this->com_user['user_name'],
                    date('Y-m-d'),
                    date('H:i:s') 
                );
                $this->m_cppt->insert($params2);

                //insert pemeriksaan lab
                $lab = $this->input->post('tujuan');
                if (!empty($lab)) {
                    foreach ($lab as $key => $value) {
                        $this->m_cppt->insert_pemeriksaan_lab(array($NOKP, $key, $value));
                    }
                }
                //insert pemeriksaan radiologi
                $rad = $this->input->post('tembusan');
                if (!empty($rad)) {
                    foreach ($rad as $key => $value) {
                        $this->m_cppt->insert_pemeriksaan_rad(array($NOKP, $key, $value));
                    }
                }

                $params3 = array(
                    $this->input->post('FS_KD_REG'),
                    '1',
                    '12',
                    $this->com_user['user_id'],
                    date('Y-m-d')
                );
                $this->m_cppt->insert_status($params3);
                
                $this->m_cppt->update_data_resep(array($NOKP, $this->input->post('FS_KD_REG')));
                $this->m_cppt->update_data_resep2(array($NOKP));
                
                //cek resume
                $cek = $this->m_cppt->cek_resume(array($this->input->post('FS_KD_REG')));
                if($cek == '0'){
                    $this->m_cppt->insert_diag(array($this->input->post('FS_KD_REG'), $this->input->post('FS_DIAG_UTAMA'),$this->input->post('FS_DIAG_SEK')));
                }elseif($cek >= '1'){
                    $this->m_cppt->update_diag(array($this->input->post('FS_DIAG_UTAMA'),$this->input->post('FS_DIAG_SEK'),$this->input->post('FS_KD_REG')));
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
        redirect("inap/cppt/add/" . $this->input->post('FS_KD_REG'));
    }







 

    public function add_process2() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
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

              $jumlahkartakter2=strlen($terapi2);
            if($jumlahkartakter2>10){
                    $terapinya=$terapi1." ".$terapi2;
            }
            else{
                $terapinya=$terapi1;
            }
                    $jumlahkartakter=strlen($terapi1);


                $paketan=$terapinya;

        $FS_KD_REG=$this->input->post('FS_KD_REG');

           if( $jumlahkartakter>10){
            $this->m_resume->delete_terapi_all($FS_KD_REG);
           }
          
        $jumobat=substr_count($paketan,"/R");
         $jumsigna=substr_count($paketan," S ");


        $pecah[0]=$paketan;
        $pecah=explode("/R",$paketan);

        $signa=explode(" S ",$paketan);

        // if($jumobat==$jumno && $jumobat==$jumsigna){
        for($a=0; $a<=$jumobat; $a++){
            // $pecahan2=explode(" no. ",$pecah[$a]);
            
                $pecahansigna=explode("----",$signa[$a]);
            
            if($a!=0){

                $ceknumero=substr_count($pecah[$a]," no.");
                $ceknumero2=substr_count($pecah[$a]," no ");

                if($ceknumero>0){
                    $ambilno=explode("no.",$pecah[$a]);

                    $namaobat=$ambilno[0];
                echo "nama: ".$namaobat."<br>";

                    $potongs=explode(" S ",$ambilno[1]);
                    $numeronya=$potongs[0];
                    echo "nomore: ".$numeronya."<br>";
                }
                else  if($ceknumero2>0){
                    $ambilno=explode(" no ",$pecah[$a]);

                    $namaobat=$ambilno[0];
                echo "nama: ".$namaobat."<br>";

                    $potongs=explode(" S ",$ambilno[1]);
                    $numeronya=$potongs[0];
                    echo "nomore: ".$numeronya."<br>";
                }
                else {
                    $pecahan2=explode(" S ",$pecah[$a]);
                        $namaobat=$pecahan2[0];
                    echo "nama: ".$namaobat."<br>";
                }

                    $dosis=$pecahansigna[0];
                    echo "dosis: ".$pecahansigna[0]."<br><br>";          


                    $params = array(
                                $namaobat,
                                $numeronya,
                                $dosis,
                                '',
                                '',
                                $this->input->post('FS_KD_REG'),
                        $this->com_user['user_id'],
                        date('Y-m-d')
                    );

                    $this->m_resume->insert_terapi($params);
                }
            }

   
            $x = $this->com_user['user_name'];
            if($x!='Dokter' && $this->input->post('TD')!=''){
                if($this->input->post('umur')>='18'){
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
        
        
                    if( $this->input->post('AB')=='-' || $this->input->post('AB')==''){
                        $sa=0;
                    }
                    else{ $sa=2;}
        
        
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
        
        
        
                    if( $this->input->post('TD')>='220'){
                        $std=3;
                    }
                    else    if( $this->input->post('TD')>='111' &&  $this->input->post('TD')<='219' ){
                        $std=0;
                    }
                    else    if( $this->input->post('TD')>='101' &&  $this->input->post('TD')<='110' ){
                        $std=1;
                    }
                    else    if( $this->input->post('TD')>='91' &&  $this->input->post('TD')<='100' ){
                        $std=2;
                    }
                    else    if(  $this->input->post('TD')<='90' ){
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
                        date('Y-m-d'),
                        date('H:i'),
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
                    $this->m_igd->INSERT_EWS($params);
                }

                if($this->input->post('umur')<'18'){
                    
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
               
        
        
        
                    if( $this->input->post('AB')=='tidak' || $this->input->post('AB')=='tak' || $this->input->post('AB')=='' || $this->input->post('AB')=='-'){
                        $sa=0;
                    }
                    else{
                        if( $this->input->post('AB')>'2'){
                            $sa=2;
                        }
                        else   if( $this->input->post('AB')<='2'){
                            $sa=1;
                        }
                        else {
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
                    else    if($tde>='80' &&  $tde<='89' ){
                        $std=1;
                    }
                    else    if( $tde<='80' ){
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
                        date('Y-m-d'),
                        date('H:i'),
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
                    $this->m_igd->INSERT_EWS_ANAK($params);
                        
                }

            }
           
   
               if($x!='Dokter' && $this->input->post('TD')!=''){
                $objek="TD = ".$this->input->post('TD')." |  N=".$this->input->post('J')." | RR =".$this->input->post('NAFAS')." | SPO2=".$this->input->post('O2')." | T=".$this->input->post('S');
                }
                else{ $objek='';}
                
                    if ($this->tnotification->run() !== FALSE) {
                        $data_kp = $this->m_cppt->get_no_kp();
                        $NOKP = 'KP' . $data_kp['KP'] . 'A';
                        $NOKP2 = $data_kp['KP'] + 1;
                        $params = array(
                            $NOKP,
                            date('Y-m-d'),
                            date('H:i:s'),
                            $this->com_user['user_name'],
                            '3000-01-01',
                            '00:00:00',
                            $this->input->post('FS_KD_REG'),
                            $this->input->post('FS_KD_LAYANAN'),
                            $this->input->post('FS_KD_PETUGAS_MEDIS'),
                            'dx:' . strip_tags($this->input->post('FS_CPPT_A')) . ',' .$objek.' '. strip_tags($this->input->post('FS_CPPT_S')),
                            '',
                            strip_tags($this->input->post('FS_CPPT_P')) . ' , ' . strip_tags($this->input->post('FS_CPPT_O')),
                            '',
                            $this->com_user['user_name'],
                            'RI',
                            '2'
                        );


                        // insert
                        // pengkodisian ruangan untuk fisioterapi
                        $role = $this->com_user['role_id'];
                        if($role =='33'){
                            $status_ruangan = 'FISIOTERAPI';
                        }
                        else {
                            $status_ruangan = $this->input->post('status_cppt');
                        }
                        
                        if ($this->m_cppt->insert_medis($params)) {

                            $update_kp = $this->m_cppt->update_tz_parameter_no_kp($NOKP2);
                            $params2 = array(
                                $this->input->post('FS_KD_REG'),
                                $this->input->post('FS_CPPT_S'),
                                $objek.' '.$this->input->post('FS_CPPT_O'),
                                $this->input->post('FS_CPPT_A'),
                                $this->input->post('FS_CPPT_P'),
                                $terapinya,
                                $NOKP,
                                $this->com_user['user_name'],
                                date('Y-m-d'),
                                date('H:i:s'),
                                $rlab, 
                                $rrad,  
                                $this->input->post('TGL_TUJUAN_LAB'),
                                $this->input->post('jenis_cppt'),
                                $status_ruangan,
                            );
                            $this->m_cppt->insertt($params2);



                            if($this->input->post('kode_icd_x')!=''){
                                $FS_KD_REG=$this->input->post('FS_KD_REG');
                                $pasien= $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG)); 
                            
                                if(strlen($pasien['NO_IDENTITAS'])==16){
                                    $nik=$pasien['NO_IDENTITAS'];
                                }
                                else{
                                    $nik=$pasien['HP2'];
                                }
                            
                                $prov="18";

                            
                                $kota=ucfirst($pasien['KOTA']);
                                if($kota=='Lampung Barat'){
                                    $kodekota="1801";
                                }
                                else  if($kota=='Tanggamus'){
                                    $kodekota="1802";
                                }
                                else  if($kota=='Lampung Selatan'){
                                    $kodekota="1803";
                                }
                                else  if($kota=='Lampung Timur'){
                                    $kodekota="1804";
                                }
                                else  if($kota=='Lampung Tengah'){
                                    $kodekota="1805";
                                }
                                else  if($kota=='Lampung Utara'){
                                    $kodekota="1806";
                                }
                                else  if($kota=='Way Kanan'){
                                    $kodekota="1807";
                                }
                                else  if($kota=='Tulangbawang'  || $kota=='Tulang Bawang' || $kota=='Tubaba'){
                                    $kodekota="1808";
                                }
                                else  if($kota=='Pesawaran'){
                                    $kodekota="1809";
                                }
                                else  if($kota=='Pringsewu'){
                                    $kodekota="1810";
                                }
                                else  if($kota=='Mesuji'){
                                    $kodekota="1811";
                                }
                                else  if($kota=='Tulangbawang Barat' || $kota=='Tulang Bawang Barat' || $kota=='Tubabar'){
                                    $kodekota="1812";
                                }
                                else  if($kota=='Pesisir Barat'){
                                    $kodekota="1813";
                                }
                                else  if($kota=='Bandar Lampung' || $kota=='Bandarlampung' || $kota=='Balam'){
                                    $kodekota="1871";
                                }
                                else  if($kota=='Metro'){
                                    $kodekota="1872";
                                }
                                else{
                                    $prov="";
                                    $kodekota="";
                                }
                            
                                $tglmulai=date('Y-m-d');
                                $tglmulai=substr($tglmulai,0,4).substr($tglmulai,5,2).substr($tglmulai,8,2);
                            
                                $tgllahir=$pasien['TGL_LAHIR'];
                                $tgllahir=substr($tgllahir,0,4).substr($tgllahir,5,2).substr($tgllahir,8,2);
                            
                                        
                                $icd=$this->input->post('kode_icd_x');
                                if($icd=='A15' || $icd=='A15.0' || $icd=='A15.1' || $icd=='A15.7' || $icd=='A16'){
                                    $lokasi='1';
                                    $tipe='1';
                                }
                                else  if($icd=='A15.2' || $icd=='A15.3' || $icd=='A16.0' || $icd=='A16.1' || $icd=='A16.2' || $icd=='A16.7'){
                                    $lokasi='1';
                                    $tipe='2';
                                }
                                else  if($icd=='A15.4' || $icd=='A15.5' || $icd=='A15.6' || $icd=='A15.8' || $icd=='A15.9' ){
                                    $lokasi='2';
                                    $tipe='1';
                                }
                                else {
                                    $lokasi='2';
                                    $tipe='2';
                                }
                            

                                    $cek_tb=$this->m_igd->cek_tb(array($FS_KD_REG)); //CEK TB DI SIMRS

                                    if ($cek_tb == '1') { // SUDAH ADA DI DATABASE SIMRS

                                        $cek_id_tb=$this->m_igd->cek_id_tb(array($FS_KD_REG)); //CEK ID TB NYA

                                        $id_tb_03=$cek_id_tb['id_tb_o3'];

                                
                                            
                                        $params = array(
                                            '',
                                            $pasien['NAMA_PASIEN'],
                                            $nik,
                                            $pasien['JENIS_KELAMIN'],
                                            $pasien['ALAMAT'],
                                            '18',
                                            '1872',
                                            $prov,
                                            $kodekota,
                                            '1872042',
                                            $this->input->post('kode_icd_x'),
                                            $tipe,
                                            $lokasi,
                                            '',
                                            $tglmulai,
                                            '',
                                            'Sedang dilakukan',
                                            '',
                                            '',
                                            '',
                                            '',
                                            '',
                                            '',
                                            '',
                                            '',
                                            $tgllahir,
                                            'negatif',
                                            $FS_KD_REG,
                                            $pasien['NO_MR'],
                                            $this->com_user['user_name'],
                                            date('Y-m-d H:i'),
                                            $FS_KD_REG,
                                        );

                                        $this->m_igd->update_tb($params); //UPDATE TB DI DATABASE
                                    }

                                    else{
                                    $id_tb_03='';
                                        

                                        $params = array(
                                            $id_tb_03,
                                            $pasien['NAMA_PASIEN'],
                                            $nik,
                                            $pasien['JENIS_KELAMIN'],
                                            $pasien['ALAMAT'],
                                            '18',
                                            '1872',
                                            $prov,
                                            $kodekota,
                                            '1872042',
                                            $this->input->post('kode_icd_x'),
                                            $tipe,
                                            $lokasi,
                                            '',
                                            $tglmulai,
                                            '',
                                            'Sedang dilakukan',
                                            '',
                                            '',
                                            '',
                                            '',
                                            '',
                                            '',
                                            '',
                                            '',
                                            $tgllahir,
                                            'negatif',
                                            $FS_KD_REG,
                                            $pasien['NO_MR'],
                                            $this->com_user['user_name'],
                                            date('Y-m-d H:i')
                                        );

                                        $this->m_igd->insert_tb($params);//INSERT KE SIMRS
                                    
                                    }

            
                            }



                            //insert pemeriksaan lab
                            $lab = $this->input->post('tujuan');
                            if (!empty($lab)) {
                                foreach ($lab as $key => $value) {
                                    $this->m_cppt->insert_pemeriksaan_lab(array($NOKP, $key, $value));
                                }
                            }
                            //insert pemeriksaan radiologi
                            $rad = $this->input->post('tembusan');
                            if (!empty($rad)) {
                                foreach ($rad as $key => $value) {
                                    $this->m_cppt->insert_pemeriksaan_rad(array($NOKP, $key, $value));
                                }
                            }

                            $params3 = array(
                                $this->input->post('FS_KD_REG'),
                                '1',
                                '12',
                                $this->com_user['user_id'],
                                date('Y-m-d')
                            );
                            $this->m_cppt->insert_status($params3);
                            
                            $this->m_cppt->update_data_resep(array($NOKP, $this->input->post('FS_KD_REG')));
                            $this->m_cppt->update_data_resep2(array($NOKP));
                            
                            //cek resume
                            $cek = $this->m_cppt->cek_resume(array($this->input->post('FS_KD_REG')));
                            if($cek == '0'){
                                $this->m_cppt->insert_diag(array($this->input->post('FS_KD_REG'), $this->input->post('FS_DIAG_UTAMA'),$this->input->post('FS_DIAG_SEK')));
                            }elseif($cek >= '1'){
                                $this->m_cppt->update_diag(array($this->input->post('FS_DIAG_UTAMA'),$this->input->post('FS_DIAG_SEK'),$this->input->post('FS_KD_REG')));
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
        redirect("inap/cppt");
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


                 $rrad='';

        $rad = $this->input->post('FS_PLANNING_RAD'); 
              if (!empty($rad)) {
                 
                   foreach ($rad as $key => $valu) {
                      $rrad=$rrad.', '.$valu;
                   }
                 
              }

              $terapi1=$this->input->post('FS_TERAPI');
              $terapi2=$this->input->post('FS_TERAPI2');

              $jumlahkartakter2=strlen($terapi2);
            if($jumlahkartakter2>10){
                    $terapinya=$terapi1." ".$terapi2;
            }
            else{
                $terapinya=$terapi1;
            }
                    $jumlahkartakter=strlen($terapi1);


                $paketan=$terapinya;

        $FS_KD_REG=$this->input->post('FS_KD_REG');

           if( $jumlahkartakter>10){
            $this->m_resume->delete_terapi_all($FS_KD_REG);
           }
          
        $jumobat=substr_count($paketan,"/R");
         $jumsigna=substr_count($paketan," S ");


        $pecah[0]=$paketan;
        $pecah=explode("/R",$paketan);

        $signa=explode(" S ",$paketan);

        // if($jumobat==$jumno && $jumobat==$jumsigna){
        for($a=0; $a<=$jumobat; $a++){
            // $pecahan2=explode(" no. ",$pecah[$a]);
            
                $pecahansigna=explode("----",$signa[$a]);
            
            if($a!=0){

                $ceknumero=substr_count($pecah[$a]," no.");
                $ceknumero2=substr_count($pecah[$a]," no ");

                if($ceknumero>0){
                    $ambilno=explode("no.",$pecah[$a]);

                    $namaobat=$ambilno[0];
                echo "nama: ".$namaobat."<br>";

                    $potongs=explode(" S ",$ambilno[1]);
                    $numeronya=$potongs[0];
                    echo "nomore: ".$numeronya."<br>";
                }
                else  if($ceknumero2>0){
                    $ambilno=explode(" no ",$pecah[$a]);

                    $namaobat=$ambilno[0];
                echo "nama: ".$namaobat."<br>";

                    $potongs=explode(" S ",$ambilno[1]);
                    $numeronya=$potongs[0];
                    echo "nomore: ".$numeronya."<br>";
                }
                else {
                    $pecahan2=explode(" S ",$pecah[$a]);
                        $namaobat=$pecahan2[0];
                    echo "nama: ".$namaobat."<br>";
                }

                    $dosis=$pecahansigna[0];
                    echo "dosis: ".$pecahansigna[0]."<br><br>";          


                    $params = array(
                                $namaobat,
                                $numeronya,
                                $dosis,
                                '',
                                '',
                                $this->input->post('FS_KD_REG'),
                        $this->com_user['user_id'],
                        date('Y-m-d')
                    );

                    $this->m_resume->insert_terapi($params);
                }
            }

   
            $x = $this->com_user['user_name'];
            if($x!='Dokter' && $this->input->post('TD')!=''){
                if($this->input->post('umur')>='18'){
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
        
        
                    if( $this->input->post('AB')=='-' || $this->input->post('AB')==''){
                        $sa=0;
                    }
                    else{ $sa=2;}
        
        
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
        
        
        
                    if( $this->input->post('TD')>='220'){
                        $std=3;
                    }
                    else    if( $this->input->post('TD')>='111' &&  $this->input->post('TD')<='219' ){
                        $std=0;
                    }
                    else    if( $this->input->post('TD')>='101' &&  $this->input->post('TD')<='110' ){
                        $std=1;
                    }
                    else    if( $this->input->post('TD')>='91' &&  $this->input->post('TD')<='100' ){
                        $std=2;
                    }
                    else    if(  $this->input->post('TD')<='90' ){
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
                        date('Y-m-d'),
                        date('H:i'),
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
                    $this->m_igd->INSERT_EWS($params);
                }

                if($this->input->post('umur')<'18'){
                    
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
               
        
        
        
                    if( $this->input->post('AB')=='tidak' || $this->input->post('AB')=='tak' || $this->input->post('AB')=='' || $this->input->post('AB')=='-'){
                        $sa=0;
                    }
                    else{
                        if( $this->input->post('AB')>'2'){
                            $sa=2;
                        }
                        else   if( $this->input->post('AB')<='2'){
                            $sa=1;
                        }
                        else {
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
                    else    if($tde>='80' &&  $tde<='89' ){
                        $std=1;
                    }
                    else    if( $tde<='80' ){
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
                        date('Y-m-d'),
                        date('H:i'),
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
                    $this->m_igd->INSERT_EWS_ANAK($params);
                        
                }

            }
           
   
                if($x!='Dokter' && $this->input->post('TD')!=''){
                    $objek="TD = ".$this->input->post('TD')." |  N=".$this->input->post('J')." | RR =".$this->input->post('NAFAS')." | SPO2=".$this->input->post('O2')." | T=".$this->input->post('S');
                    }
                else{ $objek='';}
                
                    if ($this->tnotification->run() !== FALSE) {
                         

                            // $update_kp = $this->m_cppt->update_tz_parameter_no_kp($NOKP2);
                            $riwayat = array(
                                $this->input->post('FS_KD_REG'),
                                $this->input->post('FS_CPPT_S'),
                                $objek.' '.$this->input->post('FS_CPPT_O'),
                                $this->input->post('FS_CPPT_A'),
                                $this->input->post('FS_CPPT_P'),
                                $terapinya,
                                $this->input->post('FS_KD_KP'),
                                $this->com_user['user_name'],
                                date('Y-m-d'),
                                date('H:i:s'),
                                $rlab, 
                                $rrad,  
                                $this->input->post('TGL_TUJUAN_LAB'),
                                $this->input->post('jenis_cppt'),
                                $this->input->post('FS_KD_TRS'),
                            );
                            $this->m_rawat_jalan->update_cppt($riwayat);
                            $this->m_rawat_jalan->insert_riwayat_cppt($riwayat);

                            
                      
                            // $params3 = array(
                            //     $this->input->post('FS_KD_REG'),
                            //     '1',
                            //     '12',
                            //     $this->com_user['user_id'],
                            //     date('Y-m-d')
                            // );
                            // $this->m_cppt->insert_status($params3);
                            
                            $this->m_cppt->update_data_resep(array($NOKP, $this->input->post('FS_KD_REG')));
                            $this->m_cppt->update_data_resep2(array($NOKP));
                            
                            //cek resume
                            $cek = $this->m_cppt->cek_resume(array($this->input->post('FS_KD_REG')));
                            if($cek == '0'){
                                $this->m_cppt->insert_diag(array($this->input->post('FS_KD_REG'), $this->input->post('FS_DIAG_UTAMA'),$this->input->post('FS_DIAG_SEK')));
                            }elseif($cek >= '1'){
                                $this->m_cppt->update_diag(array($this->input->post('FS_DIAG_UTAMA'),$this->input->post('FS_DIAG_SEK'),$this->input->post('FS_KD_REG')));
                            }
                            // notification
                            $this->tnotification->delete_last_field();
                            $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
                       
                    } else {
                        // default error
                        $this->tnotification->sent_notification("error", "Detail gagal disimpan");
                    }
                    // default redirect
        redirect("inap/cppt");
    }



    
    public function delete_process() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process 
    
                
                     
                         

                            // $update_kp = $this->m_cppt->update_tz_parameter_no_kp($NOKP2);
                            // $riwayat = array(
                            //     $this->input->post('FS_KD_REG'),
                            //     $this->input->post('FS_CPPT_S'),
                            //     $objek.' '.$this->input->post('FS_CPPT_O'),
                            //     $this->input->post('FS_CPPT_A'),
                            //     $this->input->post('FS_CPPT_P'),
                            //     $terapinya,
                            //     $this->input->post('FS_KD_KP'),
                            //     $this->com_user['user_name'],
                            //     date('Y-m-d'),
                            //     date('H:i:s'),
                            //     $rlab, 
                            //     $rrad,  
                            //     $this->input->post('TGL_TUJUAN_LAB'),
                            //     $this->input->post('FS_KD_TRS'),
                            // );
                            // // $this->m_rawat_jalan->delete_cppt($this->input->post('FS_KD_TRS'));
                            // $this->m_rawat_jalan->insert_riwayat_cppt($riwayat); 

                            $params = array(
                                date('Y-m-d'),
                                date('H:i:s'),
                                $this->com_user['user_name'],
                                $this->input->post('FS_KD_TRS'),
                            );
                    
                            // insert
                            $this->m_cppt->delete($params);

                             
                          
                            // notification
                            $this->tnotification->delete_last_field();
                            $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
                       
                    
                    // default redirect
        redirect("inap/cppt");
    }



    public function verif($FS_RG = "", $FS_KD_TRS = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/cppt/verif.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg(array($FS_RG)));
        $this->smarty->assign("FS_KD_TRS", $FS_KD_TRS);
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function verif_process() {
        // set page rules
        $this->_set_page_rule("U");
        // insert
        if ($this->m_cppt->update_dokter(array(
                    $this->com_user['user_name'],
                    date('Y-m-d'),
                    date('H:i:s'),
                    $this->input->post('FS_KET_VERIF'),
                    $this->input->post('FS_KD_TRS')))) {
            $this->tnotification->delete_last_field();
            $this->tnotification->sent_notification("success", "Data berhasil disimpan");
            // default redirect
            redirect("inap/cppt/add/" . $this->input->post('FS_KD_REG'));
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Data gagal disimpan");
        }
        // default redirect
        redirect("inap/cppt/add/" . $this->input->post('FS_KD_REG'));
    }

    public function edit($FS_KD_TRS='',$FS_RG = '') {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/cppt/edit.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
       
        $this->smarty->assign("icd", $this->m_igd->get_icd());  


        if ($role == '24'){
            $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg_ugd(array($FS_RG)));
          }
      else{   $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg(array($FS_RG)));
         }

         $rolenya=$this->com_user['role_nm'];
         $this->smarty->assign("username", $this->com_user['user_name']);

         $tgl_sekarang =strtotime(date('Y-m-d'));
         $tgl_kemarin =date('Y-m-d', strtotime("-1 day", $tgl_sekarang));

       $this->smarty->assign("tgl_kemarin", $tgl_kemarin);

       $this->smarty->assign("rs_cppt", $this->m_rawat_jalan->get_cppt_by_id($FS_KD_TRS));
      $this->smarty->assign("rs_resep", $this->m_cppt->get_resep());
      $tgl=date('Y-m-d');

      $this->smarty->assign("role_id", $this->com_user['role_id']);
      $this->smarty->assign("tgl", $tgl);


      $this->smarty->assign("rs_ases_medis", $this->m_cppt->get_data_medis_by_rg(array($FS_RG)));
      $this->smarty->assign("namarole", $rolenya);
      $this->smarty->assign("rs_resume", $this->m_cppt->get_data_resume_by_rg(array($FS_RG)));

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }


    public function delete($FS_KD_TRS='',$FS_RG = '') {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/cppt/delete.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
       
        $this->smarty->assign("icd", $this->m_igd->get_icd());  


        if ($role == '24'){
            $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg_ugd(array($FS_RG)));
          }
      else{   $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg(array($FS_RG)));
         }

         $rolenya=$this->com_user['role_nm'];
         $this->smarty->assign("username", $this->com_user['user_name']);

         $tgl_sekarang =strtotime(date('Y-m-d'));
         $tgl_kemarin =date('Y-m-d', strtotime("-1 day", $tgl_sekarang));

       $this->smarty->assign("tgl_kemarin", $tgl_kemarin);

       $this->smarty->assign("rs_cppt", $this->m_rawat_jalan->get_cppt_by_id($FS_KD_TRS));
      $this->smarty->assign("rs_resep", $this->m_cppt->get_resep());
      $tgl=date('Y-m-d');

      $this->smarty->assign("role_id", $this->com_user['role_id']);
      $this->smarty->assign("tgl", $tgl);


      $this->smarty->assign("rs_ases_medis", $this->m_cppt->get_data_medis_by_rg(array($FS_RG)));
      $this->smarty->assign("namarole", $rolenya);
      $this->smarty->assign("rs_resume", $this->m_cppt->get_data_resume_by_rg(array($FS_RG)));

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }


    // public function delete_process($FS_KD_REG = "", $FS_KD_TRS = "") {
    //     // set page rules
    //     $this->_set_page_rule("D");
    //     // process

    //     $params = array(
    //         date('Y-m-d'),
    //         date('H:i:s'),
    //         $this->com_user['user_name'],
    //         $FS_KD_TRS
    //     );

    //     // insert
    //     if ($this->m_cppt->delete($params)) {
    //         // notification
    //         $this->tnotification->delete_last_field();
    //         $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
    //     } else {
    //         // default error
    //         $this->tnotification->sent_notification("error", "Detail gagal disimpan");
    //     }

    //     // default redirect
    //     redirect("inap/cppt/add/" . $FS_KD_REG);
    // }

    public function cetak($FS_KD_REG = "") {
        $this->_set_page_rule("R");

        $this->load->library('html2pdf');
        //$data['rs_pasien'] = $this->m_resume->get_pasien_by_rg(array($FS_KD_REG));
        //$data['rs_resume'] = $this->m_resume->get_resume_by_rg(array($FS_KD_REG));
        //$data['rs_diet'] = $this->m_resume->get_diet_by_rg(array($FS_KD_REG));
        //$data['rs_indikasi'] = $this->m_resume->get_indikasi_dirawat_by_rg(array($FS_KD_REG));
        //$data['rs_diag'] = $this->m_resume->get_diag_by_rg(array($FS_KD_REG));
        //$data['rs_tind'] = $this->m_resume->get_tind_by_rg(array($FS_KD_REG));
        //$data['rs_terapi'] = $this->m_resume->get_terapi_by_rg(array($FS_KD_REG));
        ob_start();
        $this->load->view('inap/cppt/print', $data);
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



    
    public function SatBarang() {
        $FS_KD_BARANG = $this->input->post('FS_KD_BARANG');
        $data = $this->m_cppt->get_sat_barang(array($FS_KD_BARANG));
        echo json_encode($data);
    }

    public function add_process_resep() {
        $params = array(
            $this->input->post('FS_KD_BARANG'),
            $this->input->post('FS_NM_BARANG'),
            $this->input->post('FS_KD_SATUAN'),
            $this->input->post('FN_QTY_BARANG'),
            'ADA',
            'RI',
            $this->input->post('FN_ETIKET_QTY'),
            $this->input->post('FN_ETIKET_HARI'),
            $this->input->post('FS_ETIKET_CATATAN'),
            $this->input->post('FS_KD_REG')
        );
        // insert
        $data = $this->m_cppt->insert_resep($params);
        echo json_encode($data);
    } 
 
    public function add_process_cara_pulang() {
        $cek = $this->m_resume->cek_resume(array($this->input->post('FS_KD_REG')));
        if ($cek == '0') {
            $params = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('FS_DIAG_UTAMA'),
                $this->input->post('FS_CARA_PULANG'),
                $this->input->post('FS_DIAG_SEK')
            );
            $data = $this->m_cppt->insert_cara_pulang($params);
        } else {
            $params = array(
                $this->input->post('FS_DIAG_UTAMA'),
                $this->input->post('FS_CARA_PULANG'),
                $this->input->post('FS_DIAG_SEK'),
                $this->input->post('FS_KD_REG')
            );
            $data = $this->m_cppt->update_cara_pulang($params);
        }
        echo json_encode($data);
    }

    public function list_resep_baru() {
        $params = array(
            $this->input->post('FS_KD_REG2')
        );
        $data = $this->m_cppt->get_data_terapi_baru_by_rg($params);
        echo json_encode($data);
    }

    public function delete_resep_process() {
        $params = array(
            $this->input->post('kode')
        );
        // insert
        $data = $this->m_cppt->delete_resep_process($params);
        echo json_encode($data);
    }

}
