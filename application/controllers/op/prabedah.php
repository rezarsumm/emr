<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class Prabedah extends ApplicationBase {

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
        $this->smarty->assign("template_content", "op/prabedah/list.html");
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

   

    public function cari_process() {
        $FS_RG2 = $this->input->post('FS_RG');
        //$cek = $this->m_cppt->cek_resume(array($FS_RG2));
        //if ($cek == '0') {
           $rolenya=$this->com_user['role_name'];
        redirect("op/prabedah/add/" . $FS_RG2);
        //} elseif ($cek == '1') {
        //redirect("inap/cppt/edit/" . $FS_RG2);
        // }
    }

       
    public function add($FS_RG = '',$idoperasi='') {
        

        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "op/prabedah/add.html");
        $this->smarty->assign("rs_op", $this->m_cppt->get_px_op_by_id(array($idoperasi)));           

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
          $this->smarty->assign("rolenya", $rolenya);

        $this->smarty->assign("rs_perawat", $this->m_cppt->get_perawat(array($FS_RG)));
        $this->smarty->assign("rs_dokter_sp", $this->m_cppt->get_dokter_sp(array($FS_RG)));
        $this->smarty->assign("hasil_lab", $this->m_cppt->get_hasil_lab(array($FS_RG)));
        $this->smarty->assign("hasil_rad", $this->m_cppt->get_hasil_rad(array($FS_RG)));

           $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_pasien_ok_by_rgxx(array($FS_RG)));
         $this->smarty->assign("rs_cppt", $this->m_cppt->get_cppt_by_rg($FS_RG));
         $this->smarty->assign("rs_pra", $this->m_cppt->get_list_pra_op_by_rg($FS_RG));
         $this->smarty->assign("rs_pra3", $this->m_cppt->get_list_pra_op_by_rg3($idoperasi));
        $this->smarty->assign("rs_resep", $this->m_cppt->get_resep());
        $tgl=date('Y-m-d');

        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);
        $this->smarty->assign("rs_umum_pra", $this->m_cppt->get_list_umum_pra_by_rg2($FS_RG));
 
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

            
            
            if($this->com_user['role_nm']=='Dokter'){
                $params2 = array(
                    $this->input->post('FS_KD_REG'),
                    date('Y-m-d H:i:s'),
                    $this->com_user['user_name'],
                    $this->input->post('KD_PERAWAT'), 
                    $this->input->post('DATA_S'),  
                    $this->input->post('DATA_O'),  
                    $this->input->post('DIAGNOSA_PRA'),  
                    $this->input->post('V_STATUS_PASIEN'),  
                    $this->input->post('V_ASES_PRA_LOK'),  
                    $this->input->post('V_INFORMED_BEDAH'),  
                    $this->input->post('V_INFORMED_ANESTESI'),  
                    $this->input->post('V_PRA_ANESTESI'),  
                    $this->input->post('V_EDU_ANESTESI'),  
                    $this->input->post('HB'),  
                    $this->input->post('LEUKOSIT'),  
                    $this->input->post('TROMBOSIT'),  
                    $this->input->post('HEMATOKRIT'),  
                    $this->input->post('BT'),  
                    $this->input->post('CT'),  
                    $this->input->post('LAINNYA'),  
                    $this->input->post('RONTGEN'),  
                    $this->input->post('EKG'),  
                    $this->input->post('ALAT_LAIN'),  
                    $this->input->post('OBAT_YG_DIBAWA'),  
                    $this->input->post('ESTIMASI_WAKTU'),  
                    $this->input->post('RENCANA_TINDAKAN'),  
                    $this->input->post('idoperasi')
                );
          
            }
            else     if($this->com_user['role_nm']=='Perawat OK'){
                $params2 = array(
                    $this->input->post('FS_KD_REG'),
                    date('Y-m-d H:i:s'),
                    $this->input->post('KD_OPERATOR'), 
                    $this->com_user['user_name'],
                    $this->input->post('DATA_S'),  
                    $this->input->post('DATA_O'),  
                    $this->input->post('DIAGNOSA_PRA'),  
                    $this->input->post('V_STATUS_PASIEN'),  
                    $this->input->post('V_ASES_PRA_LOK'),  
                    $this->input->post('V_INFORMED_BEDAH'),  
                    $this->input->post('V_INFORMED_ANESTESI'),  
                    $this->input->post('V_PRA_ANESTESI'),  
                    $this->input->post('V_EDU_ANESTESI'),  
                    $this->input->post('HB'),  
                    $this->input->post('LEUKOSIT'),  
                    $this->input->post('TROMBOSIT'),  
                    $this->input->post('HEMATOKRIT'),  
                    $this->input->post('BT'),  
                    $this->input->post('CT'),  
                    $this->input->post('LAINNYA'),  
                    $this->input->post('RONTGEN'),  
                    $this->input->post('EKG'),  
                    $this->input->post('ALAT_LAIN'),  
                    $this->input->post('OBAT_YG_DIBAWA'),  
                    $this->input->post('ESTIMASI_WAKTU'),  
                    $this->input->post('RENCANA_TINDAKAN'),  
                    $this->input->post('idoperasi')
                );
          
            }

                $this->m_cppt->INSERT_PRA_BEDAH($params2);



            
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

            
            
            if($this->com_user['role_nm']=='Dokter'){
                $params2 = array(
                    $this->input->post('FS_KD_REG'),
                    date('Y-m-d H:i:s'),
                    $this->com_user['user_name'],
                    $this->input->post('KD_PERAWAT'),  
                    $this->input->post('DATA_S'),  
                    $this->input->post('DATA_O'),  
                    $this->input->post('DIAGNOSA_PRA'),  
                    $this->input->post('V_STATUS_PASIEN'),  
                    $this->input->post('V_ASES_PRA_LOK'),  
                    $this->input->post('V_INFORMED_BEDAH'),  
                    $this->input->post('V_INFORMED_ANESTESI'),  
                    $this->input->post('V_PRA_ANESTESI'),  
                    $this->input->post('V_EDU_ANESTESI'),  
                    $this->input->post('HB'),  
                    $this->input->post('LEUKOSIT'),  
                    $this->input->post('TROMBOSIT'),  
                    $this->input->post('HEMATOKRIT'),  
                    $this->input->post('BT'),  
                    $this->input->post('CT'),  
                    $this->input->post('LAINNYA'),  
                    $this->input->post('RONTGEN'),  
                    $this->input->post('EKG'),  
                    $this->input->post('ALAT_LAIN'),  
                    $this->input->post('OBAT_YG_DIBAWA'),  
                    $this->input->post('ESTIMASI_WAKTU'),  
                    $this->input->post('RENCANA_TINDAKAN'),  
                    $this->input->post('idoperasi')
                );
          
            }
            else     if($this->com_user['role_nm']=='Perawat OK'){
                $params2 = array(
                    $this->input->post('FS_KD_REG'),
                    date('Y-m-d H:i:s'),
                    $this->input->post('KD_OPERATOR'), 
                    $this->com_user['user_name'],
                    $this->input->post('DATA_S'),  
                    $this->input->post('DATA_O'),  
                    $this->input->post('DIAGNOSA_PRA'),  
                    $this->input->post('V_STATUS_PASIEN'),  
                    $this->input->post('V_ASES_PRA_LOK'),  
                    $this->input->post('V_INFORMED_BEDAH'),  
                    $this->input->post('V_INFORMED_ANESTESI'),  
                    $this->input->post('V_PRA_ANESTESI'),  
                    $this->input->post('V_EDU_ANESTESI'),  
                    $this->input->post('HB'),  
                    $this->input->post('LEUKOSIT'),  
                    $this->input->post('TROMBOSIT'),  
                    $this->input->post('HEMATOKRIT'),  
                    $this->input->post('BT'),  
                    $this->input->post('CT'),  
                    $this->input->post('LAINNYA'),  
                    $this->input->post('RONTGEN'),  
                    $this->input->post('EKG'),  
                    $this->input->post('ALAT_LAIN'),  
                    $this->input->post('OBAT_YG_DIBAWA'),  
                    $this->input->post('ESTIMASI_WAKTU'),  
                    $this->input->post('RENCANA_TINDAKAN'),  
                    $this->input->post('idoperasi')
                );
          
            }

 
                // $this->m_cppt->DELETE_PRA_BEDAH( $this->input->post('idoperasi'));

                $this->m_cppt->UPDATE_PRA_BEDAH($params2);

 
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
        $cek = $this->m_cppt->cek_ases_pra_op(array($id));
        $FS_RG=$FS_RG2;
        $idoperasi=$id;

        if ($cek == '0') {
          
                // set page rules
                    $this->_set_page_rule("C");
                    // set template content
                    $this->smarty->assign("template_content", "op/prabedah/add.html");
                    $this->smarty->assign("rs_op", $this->m_cppt->get_px_op_by_id(array($idoperasi)));           

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
                    $this->smarty->assign("rolenya", $rolenya);

                    $this->smarty->assign("rs_perawat", $this->m_cppt->get_perawat(array($FS_RG)));
                    $this->smarty->assign("rs_dokter_sp", $this->m_cppt->get_dokter_sp(array($FS_RG)));
                    $this->smarty->assign("hasil_lab", $this->m_cppt->get_hasil_lab(array($FS_RG)));
                    $this->smarty->assign("hasil_rad", $this->m_cppt->get_hasil_rad(array($FS_RG)));

                    if ($role == '24'){
                        $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg_ugd(array($FS_RG)));
                        }
                    else{   $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg(array($FS_RG)));
                    }
                    $this->smarty->assign("rs_cppt", $this->m_cppt->get_cppt_by_rg($FS_RG));
                    $this->smarty->assign("rs_pra", $this->m_cppt->get_list_pra_op_by_rg($FS_RG));
                    $this->smarty->assign("rs_pra3", $this->m_cppt->get_list_pra_op_by_rg3($idoperasi));
                    $this->smarty->assign("rs_resep", $this->m_cppt->get_resep());
                    $tgl=date('Y-m-d');

                    $this->smarty->assign("role_id", $this->com_user['role_id']);
                    $this->smarty->assign("tgl", $tgl);
                    $this->smarty->assign("rs_umum_pra", $this->m_cppt->get_list_umum_pra_by_rg2($FS_RG));
            
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
                    
            // redirect("op/prabedah/add/" . $FS_RG2."/".$id);
        } elseif ($cek >= '1') {
           
                    // set page rules
                $this->_set_page_rule("C");
                // set template content
                $this->smarty->assign("template_content", "op/prabedah/edit.html");
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
                $this->smarty->assign("rolenya", $rolenya);

                $this->smarty->assign("rs_perawat", $this->m_cppt->get_perawat(array($FS_RG)));
                $this->smarty->assign("rs_dokter_sp", $this->m_cppt->get_dokter_sp(array($FS_RG)));

                if ($role == '24'){
                    $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg_ugd(array($FS_RG)));
                    }
                else{   $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg(array($FS_RG)));
                }
                $this->smarty->assign("rs_cppt", $this->m_cppt->get_cppt_by_rg($FS_RG));
                $this->smarty->assign("rs_pra", $this->m_cppt->get_list_pra_op_by_rg($FS_RG));
                $this->smarty->assign("rs_pra3", $this->m_cppt->get_list_pra_op_by_rg3($idoperasi));
                // $this->smarty->assign("rs_resep", $this->m_cppt->get_resep());
                $tgl=date('Y-m-d');

                $this->smarty->assign("hasil_lab", $this->m_cppt->get_hasil_lab(array($FS_RG)));
                $this->smarty->assign("hasil_rad", $this->m_cppt->get_hasil_rad(array($FS_RG)));

                $this->smarty->assign("role_id", $this->com_user['role_id']);
                $this->smarty->assign("tgl", $tgl);
                $this->smarty->assign("rs_umum_pra", $this->m_cppt->get_list_umum_pra_by_rg2($FS_RG));
        
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
                
            // redirect("op/prabedah/edit/" . $FS_RG2."/".$id);

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

    public function edit($FS_RG = '',$idoperasi='') {

        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "op/prabedah/edit.html");
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
          $this->smarty->assign("rolenya", $rolenya);

        $this->smarty->assign("rs_perawat", $this->m_cppt->get_perawat(array($FS_RG)));
        $this->smarty->assign("rs_dokter_sp", $this->m_cppt->get_dokter_sp(array($FS_RG)));

           $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_pasien_ok_by_rgxx(array($FS_RG)));
         $this->smarty->assign("rs_cppt", $this->m_cppt->get_cppt_by_rg($FS_RG));
         $this->smarty->assign("rs_pra", $this->m_cppt->get_list_pra_op_by_rg($FS_RG));
         $this->smarty->assign("rs_pra3", $this->m_cppt->get_list_pra_op_by_rg3($idoperasi));
        // $this->smarty->assign("rs_resep", $this->m_cppt->get_resep());
        $tgl=date('Y-m-d');

        $this->smarty->assign("hasil_lab", $this->m_cppt->get_hasil_lab(array($FS_RG)));
        $this->smarty->assign("hasil_rad", $this->m_cppt->get_hasil_rad(array($FS_RG)));

        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);
        $this->smarty->assign("rs_umum_pra", $this->m_cppt->get_list_umum_pra_by_rg2($FS_RG));
 
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

 
    public function delete_resep_process() {
        $params = array(
            $this->input->post('kode')
        );
        // insert
        $data = $this->m_cppt->delete_resep_process($params);
        echo json_encode($data);
    }

}
