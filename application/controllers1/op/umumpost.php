<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class Umumpost extends ApplicationBase {

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
        $this->smarty->assign("template_content", "op/umumpost/list.html");
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
        redirect("op/umumpost/add/" . $FS_RG2);
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

    public function add($FS_RG = '',$idoperasi='') {

        // set page rules
        $this->_set_page_rule("C");
        $this->smarty->assign("rs_op", $this->m_cppt->get_px_op_by_id(array($idoperasi)));           
        $this->smarty->assign("rs_lap_anes3", $this->m_cppt->get_list_lap_anes_by_rg3($idoperasi));
        
        // set template content
        $this->smarty->assign("template_content", "op/umumpost/add.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("idoperasi", $idoperasi);

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

           $this->smarty->assign("rs_lap_op3", $this->m_cppt->get_list_op_by_rg3($idoperasi));
           $this->smarty->assign("rs_lap_anes3", $this->m_cppt->get_list_lap_anes_by_rg3($idoperasi));

         $this->smarty->assign("rs_cppt", $this->m_cppt->get_cppt_by_rg($FS_RG));
         $this->smarty->assign("rs_umum_post", $this->m_cppt->get_list_umum_pra_op_by_rg($FS_RG));
         $this->smarty->assign("rs_pra_anes", $this->m_cppt->get_list_pra_anes_by_rg2($FS_RG));
         $this->smarty->assign("rs_umum_pra3", $this->m_cppt->get_list_umum_pra_by_rg3($idoperasi));
         $this->smarty->assign("rs_umum_pra", $this->m_cppt->get_list_umum_pra_by_rg2($FS_RG));
         $this->smarty->assign("rs_umum_post", $this->m_cppt->get_list_umum_post_by_rg($FS_RG));
         $this->smarty->assign("rs_umum_post3", $this->m_cppt->get_list_umum_post_by_rg3($idoperasi));
        $this->smarty->assign("rs_resep", $this->m_cppt->get_resep());
        $tgl=date('Y-m-d');
        $this->smarty->assign("rs_lap_anes", $this->m_cppt->get_list_lap_anes_by_rg2($FS_RG));
        $this->smarty->assign("rs_lap_op", $this->m_cppt->get_list_op_by_rg2($FS_RG));
        $this->smarty->assign("rs_lap_op3", $this->m_cppt->get_list_op_by_rg3($idoperasi));

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





    public function edit($FS_RG = '',$idoperasi='') {

        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "op/umumpost/edit.html");
        // load javascript
        $this->smarty->assign("rs_op", $this->m_cppt->get_px_op_by_id(array($idoperasi)));           

        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("idoperasi", $idoperasi);

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
         $this->smarty->assign("rs_cppt", $this->m_cppt->get_cppt_by_rg($FS_RG));
         $this->smarty->assign("rs_umum_post", $this->m_cppt->get_list_umum_pra_op_by_rg($FS_RG));
         $this->smarty->assign("rs_pra_anes", $this->m_cppt->get_list_pra_anes_by_rg2($FS_RG));
         $this->smarty->assign("rs_umum_pra", $this->m_cppt->get_list_umum_pra_by_rg2($FS_RG));
         $this->smarty->assign("rs_umum_pra3", $this->m_cppt->get_list_umum_pra_by_rg3($idoperasi));

         $this->smarty->assign("rs_umum_post", $this->m_cppt->get_list_umum_post_by_rg($FS_RG));
         $this->smarty->assign("rs_umum_post3", $this->m_cppt->get_list_umum_post_by_rg3($idoperasi));
        $this->smarty->assign("rs_resep", $this->m_cppt->get_resep());
        $tgl=date('Y-m-d');
        $this->smarty->assign("rs_lap_anes3", $this->m_cppt->get_list_lap_anes_by_rg3($idoperasi));

        $this->smarty->assign("rs_lap_anes", $this->m_cppt->get_list_lap_anes_by_rg2($FS_RG));
        $this->smarty->assign("rs_lap_op", $this->m_cppt->get_list_op_by_rg2($FS_RG));
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

            
            $TERPASANG=''; 
            $T=$this->input->post('TERPASANG');
            foreach($T as $a){

                $TERPASANG .= $a . ', ';
       
               }

                 $params2 = array(
                    $this->input->post('FS_KD_REG'),
                    date('Y-m-d H:i:s'), 
                    $this->com_user['user_name'],
                    $this->input->post('KD_OPERATOR'),
                    $this->input->post('DIAGNOSA_PRA'),
                    $this->input->post('DIAGNOSA_POST'),
                    $this->input->post('JENIS_OP'),
                    $this->input->post('JENIS_ANEST'),
                    $this->input->post('KD_AHLI_ANES'),
                    $this->input->post('KD_ANES'),
                    $TERPASANG,
                    $this->input->post('TB'),
                    $this->input->post('BB'),
                    $this->input->post('TD'),
                    $this->input->post('ND'),
                    $this->input->post('P'),
                    $this->input->post('SH'),
                    $this->input->post('INSTRUKSI_DOKTER'),
                    Date('Y-m-d'), 
                    $this->input->post('JAM_OP'),
                    'Status Pasien',
                    $this->input->post('S1'),
                    $this->input->post('S2'),
                    $this->input->post('S3'),
                    $this->input->post('S4'),
                    $this->input->post('S5'),
                    $this->input->post('S6'),
                    $this->input->post('S7'),
                    $this->input->post('S8'),
                    $this->input->post('S9'),
                    $this->input->post('S10'),
                    $this->input->post('S11'),
                    $this->input->post('S12'),
                    $this->input->post('S13'),
                    $this->input->post('KESADARAN'),
                    $this->input->post('idoperasi')

                );
                $this->m_cppt->DATA_UMUM_POST_OP($params2);
                // $this->db->insert('INSERT_LAP_ANES', $params2)

           
            
                // $cek = $this->m_cppt->cek_resume(array($this->input->post('FS_KD_REG')));
                // if($cek == '0'){
                //     $this->m_cppt->insert_diag(array($this->input->post('FS_KD_REG'), $this->input->post('FS_DIAG_UTAMA'),$this->input->post('FS_DIAG_SEK')));
                // }elseif($cek >= '1'){
                //     $this->m_cppt->update_diag(array($this->input->post('FS_DIAG_UTAMA'),$this->input->post('FS_DIAG_SEK'),$this->input->post('FS_KD_REG')));
                // }
                // notification
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("op/jadwal/detail/" . $this->input->post('idoperasi')."/".$this->input->post('FS_KD_REG'));
    }



    public function edit_process() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process

         if ($this->tnotification->run() !== FALSE) {

            
            $TERPASANG=''; 
            $T=$this->input->post('TERPASANG');
            foreach($T as $a){

                $TERPASANG .= $a . ', ';
       
               }

                 $params2 = array(
                    $this->input->post('FS_KD_REG'),
                    date('Y-m-d H:i:s'), 
                    $this->com_user['user_name'],
                    $this->input->post('KD_OPERATOR'),
                    $this->input->post('DIAGNOSA_PRA'),
                    $this->input->post('DIAGNOSA_POST'),
                    $this->input->post('JENIS_OP'),
                    $this->input->post('JENIS_ANEST'),
                    $this->input->post('KD_AHLI_ANES'),
                    $this->input->post('KD_ANES'),
                    $TERPASANG,
                    $this->input->post('TB'),
                    $this->input->post('BB'),
                    $this->input->post('TD'),
                    $this->input->post('ND'),
                    $this->input->post('P'),
                    $this->input->post('SH'),
                    $this->input->post('INSTRUKSI_DOKTER'),
                    Date('Y-m-d'), 
                    $this->input->post('JAM_OP'),
                    'Status Pasien',
                    $this->input->post('S1'),
                    $this->input->post('S2'),
                    $this->input->post('S3'),
                    $this->input->post('S4'),
                    $this->input->post('S5'),
                    $this->input->post('S6'),
                    $this->input->post('S7'),
                    $this->input->post('S8'),
                    $this->input->post('S9'),
                    $this->input->post('S10'),
                    $this->input->post('S11'),
                    $this->input->post('S12'),
                    $this->input->post('S13'),
                    $this->input->post('KESADARAN'),
                    $this->input->post('idoperasi')

                );
                $this->m_cppt->DELETE_DATA_UMUM_POST_OP( $this->input->post('idoperasi'));

                $this->m_cppt->DATA_UMUM_POST_OP($params2);
                // $this->db->insert('INSERT_LAP_ANES', $params2)
 
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("op/jadwal/detail/" . $this->input->post('idoperasi')."/".$this->input->post('FS_KD_REG'));
    }


    public function detail($FS_RG2='',$id='') { 
        $cek = $this->m_cppt->cek_umum_post(array($id));
        if ($cek == '0') {
            redirect("op/umumpost/add/" . $FS_RG2."/".$id);
        } elseif ($cek >= '1') {
            
            redirect("op/umumpost/edit/" . $FS_RG2."/".$id);

        }
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
