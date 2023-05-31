<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class Asuhan extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
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
        $this->smarty->assign("template_content", "op/asuhan/list.html");
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
 
            else  if ($role == '5' || $role == '1026') {
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
        redirect("op/asuhan/add/" . $FS_RG2);
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


    public function detail($FS_RG2='',$id='') { 
        $cek = $this->m_cppt->cek_askep(array($id));
        if ($cek == '0') {
            redirect("op/asuhan/add/" . $FS_RG2."/".$id);
        } elseif ($cek >= '1') {
            $id_asuhan=$this->m_cppt->get_id_asuhan($id);
            $idasuhan=$id_asuhan['id'];

            redirect("op/asuhan/edit/" . $FS_RG2."/".$id);
        }
    }


    public function add($FS_RG = '',$idoperasi='') {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "op/asuhan/add.html");
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
        $this->smarty->assign("rs_op", $this->m_cppt->get_px_op_by_id(array($idoperasi)));           

         $rolenya=$this->com_user['role_nm'];
          $this->smarty->assign("username", $this->com_user['user_name']);
          $this->smarty->assign("idoperasi", $idoperasi);

        $this->smarty->assign("rs_perawat", $this->m_cppt->get_perawat(array($FS_RG)));
        $this->smarty->assign("rs_perawat_anes", $this->m_cppt->get_perawat_anes(array($FS_RG)));
        $this->smarty->assign("rs_dokter_sp", $this->m_cppt->get_dokter_sp(array($FS_RG)));

           $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_pasien_ok_by_rgxx(array($FS_RG)));
         $this->smarty->assign("rs_sign_in", $this->m_cppt->get_list_sign_in_by_rg($FS_RG));
         $this->smarty->assign("rs_umum_post", $this->m_cppt->get_list_umum_pra_op_by_rg($FS_RG));
         $this->smarty->assign("rs_pra_anes", $this->m_cppt->get_list_pra_anes_by_rg2($FS_RG));
         $this->smarty->assign("rs_umum_pra", $this->m_cppt->get_list_umum_pra_by_rg3($idoperasi));
         $this->smarty->assign("rs_asuhan", $this->m_cppt->get_list_asuhan_all_op_by_rg($FS_RG));
         $this->smarty->assign("rs_asuhan2", $this->m_cppt->get_list_asuhan_all_op_by_rg3($idoperasi));
       
        $tgl=date('Y-m-d');
 
        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);

 
        $this->smarty->assign("rs_ases_medis", $this->m_cppt->get_data_medis_by_rg(array($FS_RG)));
        $this->smarty->assign("namarole", $rolenya);
       
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }



    
   



 


    public function intra($FS_RG = '', $id = '') {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "op/asuhan/intra.html");
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

        $this->smarty->assign("rs_perawat", $this->m_cppt->get_perawat(array($FS_RG)));
        $this->smarty->assign("rs_dokter_sp", $this->m_cppt->get_dokter_sp(array($FS_RG)));
        $this->smarty->assign("id", $id);

          if ($role == '24'){  
              $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg_ugd(array($FS_RG)));
            }
        else{   $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg(array($FS_RG)));
           }
         $this->smarty->assign("rs_sign_in", $this->m_cppt->get_list_sign_in_by_rg1(array($FS_RG, $id)));
         $this->smarty->assign("rs_umum_post", $this->m_cppt->get_list_umum_pra_op_by_rg($FS_RG));
         $this->smarty->assign("rs_pra_anes", $this->m_cppt->get_list_pra_anes_by_rg2($FS_RG));
         $this->smarty->assign("rs_umum_pra", $this->m_cppt->get_list_umum_pra_by_rg($FS_RG));
        $this->smarty->assign("rs_intra", $this->m_cppt->get_list_intra_by_rg1($id));
        $tgl=date('Y-m-d');
        $this->smarty->assign("rs_asuhan", $this->m_cppt->get_list_asuhan_all_op_by_rg($FS_RG));

        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);

        $rs_asuhan3=$this->m_cppt->get_list_intra_by_rg1($id);
          $evaluasi=$rs_asuhan3['EVALUASI'];

         $jumpecah=4;
         $pecah=explode(":",$evaluasi);
        $sx=$pecah[1];
        $ox=$pecah[2];
        $ax=$pecah[3];
        $p=$pecah[4];
      
        $s=explode("|",$sx);
        $s=$s[0];

        $o=explode("|",$ox);
        $o=$o[0];

        $a=explode("|",$ax);
        $a=$a[0];
    

        $this->smarty->assign("evaluasi", $evaluasi);
        $this->smarty->assign("s", $s);
        $this->smarty->assign("o", $o);
        $this->smarty->assign("a", $a);
        $this->smarty->assign("p", $p);

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

   

 

    public function post($FS_RG = '', $id = '') {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "op/asuhan/post.html");
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

        $this->smarty->assign("rs_perawat", $this->m_cppt->get_perawat(array($FS_RG)));
        $this->smarty->assign("rs_dokter_sp", $this->m_cppt->get_dokter_sp(array($FS_RG)));
        $this->smarty->assign("id", $id);
        $this->smarty->assign("rs_post", $this->m_cppt->get_list_post_by_rg1($id));

           $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_pasien_ok_by_rgxx(array($FS_RG)));
         $this->smarty->assign("rs_sign_in", $this->m_cppt->get_list_sign_in_by_rg1(array($FS_RG, $id)));
         $this->smarty->assign("rs_umum_post", $this->m_cppt->get_list_umum_pra_op_by_rg($FS_RG));
         $this->smarty->assign("rs_pra_anes", $this->m_cppt->get_list_pra_anes_by_rg2($FS_RG));
         $this->smarty->assign("rs_umum_pra", $this->m_cppt->get_list_umum_pra_by_rg($FS_RG));
        $this->smarty->assign("rs_resep", $this->m_cppt->get_resep());
        $tgl=date('Y-m-d');
        $this->smarty->assign("rs_asuhan", $this->m_cppt->get_list_asuhan_all_op_by_rg($FS_RG));
        
        $idasuhan=$id;
        $this->smarty->assign("rs_asuhan4", $this->m_cppt->get_list_asuhan_all_op_by_rg4($idasuhan));

        $rs_asuhan3=$this->m_cppt->get_list_asuhan_all_op_by_rg4($idasuhan);
        $evaluasi=$rs_asuhan3['EVALUASI3'];

       $jumpecah=4;
       $pecah=explode(":",$evaluasi);
      $sx=$pecah[1];
      $ox=$pecah[2];
      $ax=$pecah[3];
      $p=$pecah[4];
    
      $s=explode("|",$sx);
      $s=$s[0];

      $o=explode("|",$ox);
      $o=$o[0];

      $a=explode("|",$ax);
      $a=$a[0];
  

      $this->smarty->assign("evaluasi", $evaluasi);
      $this->smarty->assign("s", $s);
      $this->smarty->assign("o", $o);
      $this->smarty->assign("a", $a);
      $this->smarty->assign("p", $p);


        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);
        $rs_asuhan4=$this->m_cppt->get_list_asuhan_all_op_by_rg4($idasuhan);
        $jamselesai= $rs_asuhan4['JAM_SELESAI'];

        $jamselesai=date("H:i", strtotime($jamselesai));
        $this->smarty->assign("jamselesai", $jamselesai);
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







    public function add_process2() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process

         if ($this->tnotification->run() !== FALSE) {

          
                 $params2 = array(
                    $this->input->post('FS_KD_REG'),
                    date('Y-m-d H:i:s'), 
                    $this->input->post('KD_PERAWAT_ANES'),
                    $this->com_user['user_name'],
                    $this->input->post('KD_PERAWAT_SERK'),
                    $this->input->post('KD_OPERATOR'),
                    $this->input->post('JAM_MULAI'),
                   '',
                    $this->input->post('SIFAT_OP'),
                    $this->input->post('JENIS_ANES'),
                    $this->input->post('DIAGNOSA_PRA'),
                    $this->input->post('DIAGNOSA_POST'),
                    $this->input->post('TINDAKAN_OP'), 
                    date('Y-m-d'),
                    $this->input->post('KD_AHLI_ANESTESI'),
                    $this->input->post('idoperasi') 
                

                );
                $this->m_cppt->INSERT_ASUHAN_KEP_OP($params2);
             
                $FS_RG=$this->input->post('FS_KD_REG');
                
               $id_asuhan=$this->m_cppt->get_id_asuhan($this->input->post('idoperasi'));
               $idasuhan=$id_asuhan['id'];

 
               $e1= $this->input->post('EVALUASI1');
               $e2= $this->input->post('EVALUASI2');
               $e3= $this->input->post('EVALUASI3');
               $e4= $this->input->post('EVALUASI4');
               $eva=" S : ".$e1." | O : ".$e2." | A : ".$e3." | P :".$e4;

               $params3 = array(
                $idasuhan,
                $this->input->post('FS_KD_REG'), 
                $this->input->post('KESADARAN'), 
                $this->input->post('STATUS_PSIKOLOGI'),
                $this->input->post('TD'),
                $this->input->post('ND'), 
                $this->input->post('SH'),
                $this->input->post('P'),
                $this->input->post('PUASA'),
                $this->input->post('JENIS_PUASA'),
                $this->input->post('KULIT'), 
                $eva,  
                date('Y-m-d H:i'),
               $this->com_user['user_name'],
               $this->input->post('SPO2')

            );
 
            $this->m_cppt->INSERT_ASUHAN_PRA($params3);

         
            $params4 = array(
                $idasuhan,
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
            );

            
  

            $this->m_cppt->INSERT_ASUHAN_IN($params4);
 
     
        $params5 = array(
            $idasuhan,
          '',
          '',
          '',
          '',
          '',
          '',
          '',
          '',
          '',
          '',
          '',
          '',
          '',
          '',
          '',
          '',
          '',
          '',
          '',
        );



   

        $this->m_cppt->INSERT_ASUHAN_POST($params5);
 
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("op/asuhan/intra/" .$this->input->post('FS_KD_REG')."/".$idasuhan);
    }




    public function edit_process() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process

         if ($this->tnotification->run() !== FALSE) {

          
                 $params2 = array(
                    date('Y-m-d H:i:s'), 
                    $this->input->post('KD_PERAWAT_ANES'),
                    $this->com_user['user_name'],
                    $this->input->post('KD_PERAWAT_SERK'),
                    $this->input->post('KD_OPERATOR'),
                    $this->input->post('JAM_MULAI'),
                   '',
                    $this->input->post('SIFAT_OP'),
                    $this->input->post('JENIS_ANES'),
                    $this->input->post('DIAGNOSA_PRA'),
                    $this->input->post('DIAGNOSA_POST'),
                    $this->input->post('TINDAKAN_OP'), 
                    date('Y-m-d'),
                    $this->input->post('KD_AHLI_ANESTESI'),
                    $this->input->post('idoperasi')

                );
                $this->m_cppt->UPDATE_ASUHAN_KEP_OP($params2);
             
                $FS_RG=$this->input->post('FS_KD_REG');
                
               $id_asuhan=$this->m_cppt->get_id_asuhan( $this->input->post('idoperasi'));
               $idasuhan=$id_asuhan['id'];

 
               $e1= $this->input->post('EVALUASI1');
               $e2= $this->input->post('EVALUASI2');
               $e3= $this->input->post('EVALUASI3');
               $e4= $this->input->post('EVALUASI4');
               $eva=" S : ".$e1." | O : ".$e2." | A : ".$e3." | P :".$e4;

               $params3 = array(
              
                $this->input->post('KESADARAN'), 
                $this->input->post('STATUS_PSIKOLOGI'),
                $this->input->post('TD'),
                $this->input->post('ND'), 
                $this->input->post('SH'),
                $this->input->post('P'),
                $this->input->post('PUASA'),
                $this->input->post('JENIS_PUASA'),
                $this->input->post('KULIT'), 
                $eva,  
                date('Y-m-d H:i'),
               $this->com_user['user_name'],
               $this->input->post('SPo2'), 
               $idasuhan,

            );
 
            $this->m_cppt->UPDATE_ASUHAN_PRA($params3);

          
 
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("op/asuhan/intra/" .$this->input->post('FS_KD_REG')."/".$idasuhan);
    }
 


    

    public function add_process3() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process

         if ($this->tnotification->run() !== FALSE) {
  
               $e1= $this->input->post('EVALUASI1');
               $e2= $this->input->post('EVALUASI2');
               $e3= $this->input->post('EVALUASI3');
               $e4= $this->input->post('EVALUASI4');
               $eva=" S : ".$e1." | O : ".$e2." | A : ".$e3." | P :".$e4;

          

            $params4 = array( 
                $this->input->post('FS_KD_REG'),  
                $this->input->post('TD2'),
                $this->input->post('ND2'), 
                $this->input->post('SH2'),
                $this->input->post('P2'),
                $this->input->post('SP02'), 
                date('Y-m-d H:i:s',  $this->input->post('Time_input_askep_intra')),
                $eva,
                date('Y-m-d H:i'),
                $this->com_user['user_name'],
                $this->input->post('idasuhan'),  
            );

         
                $id= $this->input->post('idasuhan');

            $this->m_cppt->update_kajian_intra($params4);

    



   

        // $this->m_cppt->INSERT_ASUHAN_POST($params5);
 
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("op/asuhan/post/" .$this->input->post('FS_KD_REG')."/".$id);
    }




    
    

    public function add_process4() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process

         if ($this->tnotification->run() !== FALSE) {
  
               $e1= $this->input->post('EVALUASI1');
               $e2= $this->input->post('EVALUASI2');
               $e3= $this->input->post('EVALUASI3');
               $e4= $this->input->post('EVALUASI4');
               $eva=" S : ".$e1." | O : ".$e2." | A : ".$e3." | P :".$e4;

          
 
             $id= $this->input->post('idasuhan');

            // $this->m_cppt->update_kajian_intra($params4);

            $idoperasi=$this->m_cppt->get_id_operasi($id);
            $idoperasi=$idoperasi['idoperasi'];

  
          $params5 = array( 
            $this->input->post('FS_KD_REG'),  
            $this->input->post('TD3'),
            $this->input->post('ND3'), 
            $this->input->post('SH3'),
            $this->input->post('P3'),
            $this->input->post('SP02'),
            $this->input->post('KULIT'),
            $this->input->post('TURGOR'),
            $this->input->post('LOKASI'),
            $this->input->post('IMPLANT'),
            $this->input->post('INFUS_MASUK'),
            $this->input->post('DARAH_MASUK'),
            $this->input->post('PENDARAHAN'),
            $this->input->post('URINE'),
            $this->input->post('ASITES'),
            $this->input->post('PUS'),
            $eva,
            date('Y-m-d H:i'),
            $this->com_user['user_name'],
            date('Y-m-d H:i:s',  $this->input->post('Time_input_askep_post')),
            $this->input->post('idasuhan'),  

        );
 

        $this->m_cppt->update_kajian_post($params5);


        $params6 = array( 
            $this->input->post('JAM_SELESAI'),  
            $this->input->post('idasuhan'),  
        );
 

        $this->m_cppt->update_asuhan_selesai($params6);
 
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("op/jadwal/detail/" . $idoperasi."/".$this->input->post('FS_KD_REG'));
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

    public function edit($FS_RG = '',$idoperasi='') {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "op/asuhan/edit.html");
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
          $this->smarty->assign("idoperasi", $idoperasi);

          $this->smarty->assign("rs_perawat_anes", $this->m_cppt->get_perawat_anes(array($FS_RG)));

        $this->smarty->assign("rs_perawat", $this->m_cppt->get_perawat(array($FS_RG)));
        $this->smarty->assign("rs_dokter_sp", $this->m_cppt->get_dokter_sp(array($FS_RG)));

         $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg(array($FS_RG)));
         
          $this->smarty->assign("rs_umum_post", $this->m_cppt->get_list_umum_pra_op_by_rg($FS_RG));
         $this->smarty->assign("rs_pra_anes", $this->m_cppt->get_list_pra_anes_by_rg2($FS_RG));
         $this->smarty->assign("rs_umum_pra", $this->m_cppt->get_list_umum_pra_by_rg3($idoperasi));
         $this->smarty->assign("rs_asuhan", $this->m_cppt->get_list_asuhan_all_op_by_rg($FS_RG));
         $this->smarty->assign("rs_asuhan3", $this->m_cppt->get_list_asuhan_all_op_by_rg3($idoperasi));
       
         $this->smarty->assign("rs_asuhan2", $this->m_cppt->get_list_asuhan_all_op_by_rg3($idoperasi));

         $rs_asuhan3=$this->m_cppt->get_list_asuhan_all_op_by_rg3($idoperasi);
         $evaluasi=$rs_asuhan3['EVALUASI'];

         $jumpecah=4;
         $pecah=explode(":",$evaluasi);
        $sx=$pecah[1];
        $ox=$pecah[2];
        $ax=$pecah[3];
        $p=$pecah[4];
      
        $s=explode("|",$sx);
        $s=$s[0];

        $o=explode("|",$ox);
        $o=$o[0];

        $a=explode("|",$ax);
        $a=$a[0];
    
         $this->smarty->assign("evaluasi", $evaluasi);
         $this->smarty->assign("s", $s);
         $this->smarty->assign("o", $o);
         $this->smarty->assign("a", $a);
         $this->smarty->assign("p", $p);
        $tgl=date('Y-m-d');
 
        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);

 
        $this->smarty->assign("rs_ases_medis", $this->m_cppt->get_data_medis_by_rg(array($FS_RG)));
        $this->smarty->assign("namarole", $rolenya);
       
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }


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
