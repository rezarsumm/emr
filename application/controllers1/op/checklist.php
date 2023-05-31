<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class checklist extends ApplicationBase {

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
        $this->smarty->assign("template_content", "op/checklist/list.html");
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
        redirect("op/checklist/add/" . $FS_RG2);
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

    
    public function detail($FS_RG2='',$id='') { 
        $cek = $this->m_cppt->cek_checklist(array($id));
        if ($cek == '0') {
            redirect("op/checklist/add/" . $FS_RG2."/".$id);
        } elseif ($cek >= '1') {
            $idcheck=$this->m_cppt->get_id_check($id);
                $idcheck=$idcheck['id'];

                redirect("op/checklist/edit/" . $FS_RG2."/".$id);
        }
    }

    
 
    public function add($FS_RG = '',$idoperasi='') {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "op/checklist/add.html");
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

          if ($role == '24'){
              $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg_ugd(array($FS_RG)));
            }
        else{   $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg(array($FS_RG)));
           }
         $this->smarty->assign("rs_sign_in", $this->m_cppt->get_list_sign_in_by_rg($FS_RG));
         $this->smarty->assign("rs_umum_post", $this->m_cppt->get_list_umum_pra_op_by_rg($FS_RG));
         $this->smarty->assign("rs_pra_anes", $this->m_cppt->get_list_pra_anes_by_rg2($FS_RG));
         $this->smarty->assign("rs_umum_pra", $this->m_cppt->get_list_umum_pra_by_rg($FS_RG));
         $this->smarty->assign("rs_umum_pra3", $this->m_cppt->get_list_umum_pra_by_rg3($idoperasi));
        $this->smarty->assign("rs_resep", $this->m_cppt->get_resep());
        $this->smarty->assign("rs_asuhan", $this->m_cppt->get_list_asuhan_all_op_by_rg2($FS_RG));
        $this->smarty->assign("rs_asuhan3", $this->m_cppt->get_list_asuhan_all_op_by_rg3($idoperasi));
        $tgl=date('Y-m-d');
        $this->smarty->assign("idoperasi", $idoperasi);



        $this->smarty->assign("rs_op", $this->m_cppt->get_px_op_by_id(array($idoperasi)));           

 
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

   



    public function timeout($FS_RG = '', $id = '') {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "op/checklist/timeout.html");
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

         $this->smarty->assign("rs_sign_in2", $this->m_cppt->get_list_sign_in_by_rg3($id));


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
        $this->smarty->assign("rs_resep", $this->m_cppt->get_resep());
        $tgl=date('Y-m-d');
        $this->smarty->assign("rs_asuhan", $this->m_cppt->get_list_asuhan_all_op_by_rg2($FS_RG));
        // $this->smarty->assign("benda_tajam", $this->m_cppt->get_list_benda_tajam_by_rg($id));

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

   




    public function signout($FS_RG = '', $id = '') {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "op/checklist/signout.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->assign("rs_sign_in2", $this->m_cppt->get_list_sign_in_by_rg3($id));

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
         $this->smarty->assign("benda_tajam", $this->m_cppt->get_benda_tajamm($id));
         $this->smarty->assign("rs_umum_pra", $this->m_cppt->get_list_umum_pra_by_rg($FS_RG));
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

   






    public function add_process2() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process

       

         if ($this->tnotification->run() !== FALSE) {
 

            $asma=  $this->input->post('IN_RIWAYAT_ASMA');
           if($asma=='Tidak'){
               $asma='Tidak';
           }
           else{
               $asma=$this->input->post('IN_RIWAYAT_ASMA1');
           }

           $tanda=  $this->input->post('IN_TANDA_LOKASI');
           if($tanda=='Tidak'){
               $tanda='Tidak';
           }
           else{
               $tanda=$this->input->post('IN_TANDA_LOKASI1');
           }


           $alergi=  $this->input->post('IN_RIWAYAT_ALERGI');
           if($alergi=='Tidak'){
               $alergi='Tidak';
           }
           else{
               $alergi=$this->input->post('IN_RIWAYAT_ALERGI1');
           }


           $implant=  $this->input->post('IN_RENCANA_IMPLANT');
           if($implant=='Tidak'){
               $implant='Tidak';
           }
           else{
               $implant=$this->input->post('IN_RENCANA_IMPLANT1');
           }

                 $params2 = array(
                    $this->input->post('FS_KD_REG'),
                    date('Y-m-d H:i:s'), 
                    $this->com_user['user_name'],
                    $this->input->post('KD_OPERATOR'),
                    $this->input->post('KD_AHLI_ANESTESI'),
                    $this->input->post('NAMA_OP'),
                    $this->input->post('IN_KONFIR_IDENTITAS'),
                    $tanda,
                    $this->input->post('IN_MESIN_LENGKAP'),
                    $alergi,
                    $asma,
                    $implant,
                    $this->input->post('IN_RESIKO_HILANG_DARAH'), 
                    '',
                    '', 
                    $this->input->post('idoperasi'),
                    date('Y-m-d H:i:s',  $this->input->post('IN_WAKTU_ISI')),
                );

                $this->m_cppt->INSERT_SIGN_IN($params2);
            
                 
                // $this->db->insert('INSERT_LAP_ANES', $params2) 

                
                $idcheck=$this->m_cppt->get_id_check($this->input->post('idoperasi'));
                $idcheck=$idcheck['id'];

                $p1 = array(   'b1',  $idcheck);
                $p2 = array(   'b2',  $idcheck);
                $p3 = array(   'b3',  $idcheck);
                $p4 = array(   'b4',  $idcheck);
                $p5 = array(   'b5',  $idcheck);
                $p6 = array(   'b6',  $idcheck);
                $p7 = array(   'b7',  $idcheck);
                $p8 = array(   'b8',  $idcheck);
                $p9 = array(   'b9',  $idcheck);
                $p10 = array(   'b10',  $idcheck);
                $p11 = array(   'b11',  $idcheck);
                $p12 = array(   'b12',  $idcheck);
                $p13 = array(   'b13',  $idcheck);
                $p14 = array(   'b14',  $idcheck);
                $p15 = array(   'b15',  $idcheck);
                
           
                $this->m_cppt->INSERT_BT1($p1);
                $this->m_cppt->INSERT_BT2($p2);
                $this->m_cppt->INSERT_BT3($p3);
                $this->m_cppt->INSERT_BT4($p4);
                $this->m_cppt->INSERT_BT5($p5);
                $this->m_cppt->INSERT_BT6($p6);
                $this->m_cppt->INSERT_BT7($p7);
                $this->m_cppt->INSERT_BT8($p8);
                $this->m_cppt->INSERT_BT9($p9);
                $this->m_cppt->INSERT_BT10($p10);
                $this->m_cppt->INSERT_BT11($p11);
                $this->m_cppt->INSERT_BT12($p12);
                $this->m_cppt->INSERT_BT13($p13);
                $this->m_cppt->INSERT_BT14($p14);
                $this->m_cppt->INSERT_BT15($p15);

                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("op/checklist/timeout/" . $this->input->post('FS_KD_REG')."/".$idcheck);
    }


    
    public function edit_process() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process

       

         if ($this->tnotification->run() !== FALSE) {
 

            $asma=  $this->input->post('IN_RIWAYAT_ASMA');
           if($asma=='Tidak'){
               $asma='Tidak';
           }
           else{
               $asma=$this->input->post('IN_RIWAYAT_ASMA1');
           }

           $tanda=  $this->input->post('IN_TANDA_LOKASI');
           if($tanda=='Tidak'){
               $tanda='Tidak';
           }
           else{
               $tanda=$this->input->post('IN_TANDA_LOKASI1');
           }


           $alergi=  $this->input->post('IN_RIWAYAT_ALERGI');
           if($alergi=='Tidak'){
               $alergi='Tidak';
           }
           else{
               $alergi=$this->input->post('IN_RIWAYAT_ALERGI1');
           }


           $implant=  $this->input->post('IN_RENCANA_IMPLANT');
           if($implant=='Tidak'){
               $implant='Tidak';
           }
           else{
               $implant=$this->input->post('IN_RENCANA_IMPLANT1');
           }

                 $params2 = array(
                    $this->input->post('FS_KD_REG'),
                    date('Y-m-d H:i:s'), 
                    $this->com_user['user_name'],
                    $this->input->post('KD_OPERATOR'),
                    $this->input->post('KD_AHLI_ANESTESI'),
                    $this->input->post('NAMA_OP'),
                    $this->input->post('IN_KONFIR_IDENTITAS'),
                    $tanda,
                    $this->input->post('IN_MESIN_LENGKAP'),
                    $alergi,
                    $asma,
                    $implant,
                    $this->input->post('IN_RESIKO_HILANG_DARAH'), 
                    '',
                    '',
                    date('Y-m-d H:i:s',  $this->input->post('IN_WAKTU_ISI')),
                    $this->input->post('idoperasi'),
                   
                );
                $this->m_cppt->UPDATE_SIGN_IN($params2);
                // $this->db->insert('INSERT_LAP_ANES', $params2) 

                
                $idcheck=$this->m_cppt->get_id_check($this->input->post('idoperasi'));
                $idcheck=$idcheck['id'];

                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("op/checklist/timeout/" . $this->input->post('FS_KD_REG')."/".$idcheck);
    }


    public function benda_tajam1(){
        $params2 = array(
            $this->input->post('hit1'),
            $this->input->post('kdbarang'),
            $this->input->post('idchecklist'),
          );
        $this->m_cppt->update_hit1($params2);
    }


    public function benda_tajam2(){
        $params2 = array(
            $this->input->post('tambahan'),
            $this->input->post('kdbarang'),
            $this->input->post('idchecklist'),
          );
        $this->m_cppt->update_tambahan($params2);
    }


    public function benda_tajam3(){
        $params2 = array(
            $this->input->post('nm_barang'),
            $this->input->post('kdbarang'),
            $this->input->post('idchecklist'),
          );
        $this->m_cppt->update_nm_barang($params2);
    }
   




    public function add_process3() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process

         if ($this->tnotification->run() !== FALSE) {

            // $tim1= $this->input->post('JAM_MULAI');
            // $tim2= $this->input->post('JAM_SELESAI');

                  $params2 = array(
                    $this->input->post('TIME_PERKENALAN_ANGGOTA'),
                    $this->input->post('TIME_ANTISIPASI_HILANG_DARAH'),
                    $this->input->post('TIME_ALAT_KHUSUS'),
                    $this->input->post('TIME_LANGKAH_KRITIS'),
                    $this->input->post('TIME_MASALAH_SPESIFIK'),
                    $this->input->post('TIME_DERAJAT_ASA'),
                    $this->input->post('TIME_PANTAU_ALAT'),
                    $this->input->post('TIME_STERIL_INSTRUMEN'),
                    $this->input->post('TIME_MASALAH_ALAT'),
                    $this->input->post('TIME_LOKASI_LUKA'),
                    $this->input->post('TIME_PROFILAKSI'),
                    $this->input->post('TIME_HASIL_RADIOLOGI'),
                    date('Y-m-d H:i:s',  $this->input->post('TIME_WAKTU_ISI')),
                    $this->input->post('id'),

                );
                $this->m_cppt->INSERT_TIME_OUT($params2);
                // $this->db->insert('INSERT_LAP_ANES', $params2)
                 
              $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("op/checklist/signout/" . $this->input->post('FS_KD_REG')."/". $this->input->post('id'));
    }



    public function add_process4() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process

         if ($this->tnotification->run() !== FALSE) {
 
                  $params2 = array(
                    $this->input->post('OUT_CATAT_TINDAKAN'),
                     $this->input->post('OUT_INSTRUMEN_LENGKAP'),
                     $this->input->post('OUT_TL_JARINGAN'),
                     $this->input->post('OUT_MASALAH_ALAT'),
                     $this->input->post('OUT_PERHATIAN'),
                    date('Y-m-d H:i:s',  $this->input->post('OUT_WAKTU_ISI')),
                     $this->input->post('id'),

                );

                $id=  $this->input->post('id');
                $idoperasi=$this->m_cppt->get_id_operasi2($id);
                $idoperasi=$idoperasi['idoperasi'];
                
                $this->m_cppt->INSERT_SIGN_OUT($params2);
                // $this->db->insert('INSERT_LAP_ANES', $params2)

              
              

                
              $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
     
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
        $this->smarty->assign("template_content", "op/checklist/edit.html");
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

          if ($role == '24'){
              $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg_ugd(array($FS_RG)));
            }
        else{   $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg(array($FS_RG)));
           }
         $this->smarty->assign("rs_sign_in", $this->m_cppt->get_list_sign_in_by_rg($FS_RG));
         $this->smarty->assign("rs_sign_in2", $this->m_cppt->get_list_sign_in_by_rg2($idoperasi));
         $this->smarty->assign("rs_umum_post", $this->m_cppt->get_list_umum_pra_op_by_rg($FS_RG));
         $this->smarty->assign("rs_pra_anes", $this->m_cppt->get_list_pra_anes_by_rg2($FS_RG));
         $this->smarty->assign("rs_umum_pra", $this->m_cppt->get_list_umum_pra_by_rg($FS_RG));
        $this->smarty->assign("rs_resep", $this->m_cppt->get_resep());
        $this->smarty->assign("rs_asuhan", $this->m_cppt->get_list_asuhan_all_op_by_rg2($FS_RG));
        $this->smarty->assign("rs_asuhan2", $this->m_cppt->get_list_asuhan_all_op_by_rg3($idoperasi));

        $tgl=date('Y-m-d');
        $this->smarty->assign("idoperasi", $idoperasi);



        $this->smarty->assign("rs_op", $this->m_cppt->get_px_op_by_id(array($idoperasi)));           

 
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

    public function delete_process($FS_KD_REG = "", $FS_KD_TRS = "") {
        // set page rules
        $this->_set_page_rule("D");
        // process

        $params = array(
            date('Y-m-d'),
            date('H:i:s'),
            $this->com_user['user_name'],
            $FS_KD_TRS
        );

        // insert
        if ($this->m_cppt->delete($params)) {
            // notification
            $this->tnotification->delete_last_field();
            $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }

        // default redirect
        redirect("inap/cppt/add/" . $FS_KD_REG);
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



    
    public function SatBarang() {
        $FS_KD_BARANG = $this->input->post('FS_KD_BARANG');
        $data = $this->m_cppt->get_sat_barang(array($FS_KD_BARANG));
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
