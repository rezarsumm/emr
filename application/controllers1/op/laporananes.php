<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class laporananes extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_cppt');
        $this->load->model('m_resume');
        $this->load->model('m_rawat_jalan');
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
        $this->smarty->assign("template_content", "op/laporananes/list.html");
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
        redirect("op/laporananes/add/" . $FS_RG2);
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
        // set template content
        $this->smarty->assign("template_content", "op/laporananes/add.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_op", $this->m_cppt->get_px_op_by_id(array($idoperasi)));           
        $this->smarty->assign("idoperasi", $idoperasi);
        $this->smarty->assign("hasil_lab", $this->m_cppt->get_hasil_lab(array($FS_RG)));
        $this->smarty->assign("rs_pra3", $this->m_cppt->get_list_pra_op_by_rg3($idoperasi));


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
         $this->smarty->assign("rs_lap_op", $this->m_cppt->get_list_op_by_rg($FS_RG));
         $this->smarty->assign("rs_pra_anes", $this->m_cppt->get_list_pra_anes_by_rg2($FS_RG));
         $this->smarty->assign("rs_lap_anes", $this->m_cppt->get_list_lap_anes_by_rg($FS_RG));
         $this->smarty->assign("rs_lap_anes3", $this->m_cppt->get_list_lap_anes_by_rg3($idoperasi));
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
        $this->smarty->assign("rs_op", $this->m_cppt->get_px_op_by_id(array($idoperasi)));           


        $tgl1='2022-01-01';
        $tgl2='2022-01-02';
        
        $tim1=$this->input->post('MULAI_ANEST');
        $tim2=$this->input->post('SELESAI_ANEST');

       $start=substr($tim1,0,2);
       $end=substr($tim2,0,2);

       
       if($end<$start){
        $awal  = strtotime($tgl1.''.$tim1);
        $akhir = strtotime($tgl2.''.$tim2); 
         $diff  = $akhir - $awal;
         $jam   = floor($diff / (60 * 60));
         $menit = $diff - $jam * (60 * 60);
         $lama= $jam .  ' jam, ' . floor( $menit / 60 ) . ' menit';

       }
       else{
        $awal  = strtotime($tgl1.''.$tim1);
        $akhir = strtotime($tgl1.''.$tim2); 
         $diff  = $akhir - $awal;
         $jam   = floor($diff / (60 * 60));
         $menit = $diff - $jam * (60 * 60);
         $lama= $jam .  ' jam, ' . floor( $menit / 60 ) . ' menit';

       }

     
        
      
         if ($this->tnotification->run() !== FALSE) {
           
           if($this->com_user['role_nm']=='Perawat Anestesi'){
 
                $params2 = array(
                    $this->input->post('FS_KD_REG'),
                    date('Y-m-d H:i:s'),
                    '130',
                    $this->com_user['user_name'],
                    $this->input->post('DIAGNOSA_PRA'),
                    $this->input->post('DIAGNOSA_POST'),
                    $this->input->post('TINDAKAN'),
                    $this->input->post('JENIS'),
                    $this->input->post('RESIKO'),

                    $this->input->post('TEKNIS_ANESTESI'),
                    $this->input->post('OBAT_PRE'),
                    $this->input->post('OBAT_INDUKSI'),
                    $this->input->post('OBAT_MUSCAL'),
                    $this->input->post('OBAT_MAINT'),

               
                    $this->input->post('MULAI_ANEST'),
                    $this->input->post('SELESAI_ANEST'),
                    $lama,

                    $this->input->post('RL'),
                    $this->input->post('NACL'),
                    $this->input->post('DEXTRAN'),
                    $this->input->post('DARAH_MASUK'),

                    $this->input->post('CAIRAN_MASUK_LAIN'),

                    $this->input->post('OBAT_MASUK'),

                    $this->input->post('PENDARAHAN'), 
                    $this->input->post('URINE'),
                    $this->input->post('CAIRAN_KELUAR_LAIN'),

                    $this->input->post('CATATAN'),
                    $this->input->post('POSISI'),
                    $this->input->post('SKALA_NYERI'),

                    $this->input->post('BILA_SAKIT'),
                    $this->input->post('BILA_MUAL'),
                    $this->input->post('ANTIBIOTIK'),
                    $this->input->post('OBAT_LAIN'),
                    $this->input->post('MINUM'),
                    $this->input->post('INFUS'),
                    $this->input->post('MONITOR'),
                    $this->input->post('JAM_KELUAR'),
                    $this->input->post('PINDAH_KE'),
                    $this->input->post('PRE_OP'),
                    $this->input->post('idoperasi')        
                );
            }

            else if($this->com_user['role_nm']=='Dokter'){
                $params2 = array(
                    $this->input->post('FS_KD_REG'),
                    date('Y-m-d H:i:s'),
                    $this->com_user['user_name'],
                    $this->input->post('KD_PERAWAT'),
                    $this->input->post('DIAGNOSA_PRA'),
                    $this->input->post('DIAGNOSA_POST'),
                    $this->input->post('TINDAKAN'),
                    $this->input->post('JENIS'),
                    $this->input->post('RESIKO'),
                    $this->input->post('TEKNIS_ANESTESI'),
                    $this->input->post('OBAT_PRE'),
                    $this->input->post('OBAT_INDUKSI'),
                    $this->input->post('OBAT_MUSCAL'),
                    $this->input->post('OBAT_MAINT'),
                    $this->input->post('MULAI_ANEST'),
                    $this->input->post('SELESAI_ANEST'),
                    $lama,
                    $this->input->post('RL'),
                    $this->input->post('NACL'),
                    $this->input->post('DEXTRAN'),
                    $this->input->post('DARAH_MASUK'),
                    $this->input->post('CAIRAN_MASUK_LAIN'),
                    $this->input->post('OBAT_MASUK'),
                    $this->input->post('PENDARAHAN'), 
                    $this->input->post('URINE'),
                    $this->input->post('CAIRAN_KELUAR_LAIN'),
                    $this->input->post('CATATAN'),
                    $this->input->post('POSISI'),
                    $this->input->post('SKALA_NYERI'),
                    $this->input->post('BILA_SAKIT'),
                    $this->input->post('BILA_MUAL'),
                    $this->input->post('ANTIBIOTIK'),
                    $this->input->post('OBAT_LAIN'),
                    $this->input->post('MINUM'),
                    $this->input->post('INFUS'),
                    $this->input->post('MONITOR'),
                    $this->input->post('JAM_KELUAR'),
                    $this->input->post('PINDAH_KE'),
                    $this->input->post('PRE_OP'),
                    $this->input->post('idoperasi')        
                );

            }

                $this->m_cppt->INSERT_LAP_ANES($params2);
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



    public function simpan_catatan() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process
 
         if ($this->tnotification->run() !== FALSE) {
              $params2 = array(
                    $this->input->post('idoperasi'),
                    $this->input->post('tgl_rr'),
                    $this->input->post('jam_rr'),
                    $this->input->post('catatan_rr'),
                    
                );
                $this->m_cppt->INSERT_RR($params2);
                // $this->db->insert('INSERT_LAP_ANES', $params2)

                $FS_RG2=$this->input->post('FS_KD_REG');
                $id=$this->input->post('idoperasi');
 
                // notification
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect

        $cek = $this->m_cppt->cek_file_rr($id);
        if ($cek == '0') {
            redirect("op/laporananes/evaluasi_rr/" . $FS_RG2."/".$id);
        } elseif ($cek >= '1') {
            
            redirect("op/laporananes/edit_evaluasi_rr/" . $FS_RG2."/".$id);

        }

 
    }



    public function update_progress() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process
 
         if ($this->tnotification->run() !== FALSE) {

            $TD=$this->input->post('tekanan_darah');
            $TD=explode("/",$TD);

            $TD1=$TD[0];
            $TD2=$TD[1];
          
                $params2 = array(
                    $this->input->post('idoperasi'),
                    $this->input->post('nadi'),
                    $this->input->post('intubasi'),
                    $this->input->post('ekstubasi'),
                    $TD1,
                    $TD2,
                    $this->input->post('respirasi'),
                    $this->input->post('periode'),
                    $this->com_user['user_name'],
                    date('Y-m-d H:i:s'),
                    $this->input->post('idprogress'),

                   
                );
                $this->m_cppt->UPDATE_PROGRESS($params2);
                // $this->db->insert('INSERT_LAP_ANES', $params2)

 
                // notification
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("op/laporananes/progress/" . $this->input->post('FS_KD_REG')."/".$this->input->post('idoperasi'));
    }



    public function update_skor_akt_al(){
        $params2 = array(
            $this->input->post('akt_al'),
            $this->input->post('idoperasi'),
           );
        $this->m_cppt->update_skor_akt_al($params2);
    }

    public function update_skor_resp_al(){
        $params2 = array(
            $this->input->post('nilai'),
            $this->input->post('idoperasi'),
           );
        $this->m_cppt->update_skor_resp_al($params2);
    }

    public function update_skor_sir_al(){
        $params2 = array(
            $this->input->post('nilai'),
            $this->input->post('idoperasi'),
           );
        $this->m_cppt->update_skor_sir_al($params2);
    }

    public function update_skor_sadar_al(){
        $params2 = array(
            $this->input->post('nilai'),
            $this->input->post('idoperasi'),
           );
        $this->m_cppt->update_skor_sadar_al($params2);
    }

    public function update_skor_kulit_al(){
        $params2 = array(
            $this->input->post('nilai'),
            $this->input->post('idoperasi'),
           );
        $this->m_cppt->update_skor_kulit_al($params2);
    }


    public function update_skor_akt_ste(){
        $params2 = array(
            $this->input->post('nilai'),
            $this->input->post('idoperasi'),
           );
        $this->m_cppt->update_skor_akt_ste($params2);
    }

    public function update_skor_resp_ste(){
        $params2 = array(
            $this->input->post('nilai'),
            $this->input->post('idoperasi'),
           );
        $this->m_cppt->update_skor_resp_ste($params2);
    }

    public function update_skor_sadar_ste(){
        $params2 = array(
            $this->input->post('nilai'),
            $this->input->post('idoperasi'),
           );
        $this->m_cppt->update_skor_sadar_ste($params2);
    }

    public function update_skor_akt_bro(){
        $params2 = array(
            $this->input->post('nilai'),
            $this->input->post('idoperasi'),
           );
        $this->m_cppt->update_skor_akt_bro($params2);
    }



    public function edit_process() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process

        
        $tgl1='2022-01-01';
        $tgl2='2022-01-02';
        
        $tim1=$this->input->post('MULAI_ANEST');
        $tim2=$this->input->post('SELESAI_ANEST');

       $start=substr($tim1,0,2);
       $end=substr($tim2,0,2);

       
       if($end<$start){
        $awal  = strtotime($tgl1.''.$tim1);
        $akhir = strtotime($tgl2.''.$tim2); 
         $diff  = $akhir - $awal;
         $jam   = floor($diff / (60 * 60));
         $menit = $diff - $jam * (60 * 60);
         $lama= $jam .  ' jam, ' . floor( $menit / 60 ) . ' menit';

       }
       else{
        $awal  = strtotime($tgl1.''.$tim1);
        $akhir = strtotime($tgl1.''.$tim2); 
         $diff  = $akhir - $awal;
         $jam   = floor($diff / (60 * 60));
         $menit = $diff - $jam * (60 * 60);
         $lama= $jam .  ' jam, ' . floor( $menit / 60 ) . ' menit';

       }

     
        
      
         if ($this->tnotification->run() !== FALSE) {
           
           if($this->com_user['role_nm']=='Perawat Anestesi'){
 
                $params2 = array(
                    $this->input->post('FS_KD_REG'),
                    date('Y-m-d H:i:s'),
                    '130',
                    $this->com_user['user_name'],
                    $this->input->post('DIAGNOSA_PRA'),
                    $this->input->post('DIAGNOSA_POST'),
                    $this->input->post('TINDAKAN'),
                    $this->input->post('JENIS'),
                    $this->input->post('RESIKO'),

                    $this->input->post('TEKNIS_ANESTESI'),
                    $this->input->post('OBAT_PRE'),
                    $this->input->post('OBAT_INDUKSI'),
                    $this->input->post('OBAT_MUSCAL'),
                    $this->input->post('OBAT_MAINT'),

               
                    $this->input->post('MULAI_ANEST'),
                    $this->input->post('SELESAI_ANEST'),
                    $lama,

                    $this->input->post('RL'),
                    $this->input->post('NACL'),
                    $this->input->post('DEXTRAN'),
                    $this->input->post('DARAH_MASUK'),

                    $this->input->post('CAIRAN_MASUK_LAIN'),

                    $this->input->post('OBAT_MASUK'),

                    $this->input->post('PENDARAHAN'), 
                    $this->input->post('URINE'),
                    $this->input->post('CAIRAN_KELUAR_LAIN'),

                    $this->input->post('CATATAN'),
                    $this->input->post('POSISI'),
                    $this->input->post('SKALA_NYERI'),

                    $this->input->post('BILA_SAKIT'),
                    $this->input->post('BILA_MUAL'),
                    $this->input->post('ANTIBIOTIK'),
                    $this->input->post('OBAT_LAIN'),
                    $this->input->post('MINUM'),
                    $this->input->post('INFUS'),
                    $this->input->post('MONITOR'),
                    $this->input->post('JAM_KELUAR'),
                    $this->input->post('PINDAH_KE'),
                    $this->input->post('PRE_OP'),
                    $this->input->post('idoperasi')        
                );
            }

            else if($this->com_user['role_nm']=='Dokter'){
                $params2 = array(
                    $this->input->post('FS_KD_REG'),
                    date('Y-m-d H:i:s'),
                    $this->com_user['user_name'],
                    $this->input->post('KD_PERAWAT'),
                    $this->input->post('DIAGNOSA_PRA'),
                    $this->input->post('DIAGNOSA_POST'),
                    $this->input->post('TINDAKAN'),
                    $this->input->post('JENIS'),
                    $this->input->post('RESIKO'),
                    $this->input->post('TEKNIS_ANESTESI'),
                    $this->input->post('OBAT_PRE'),
                    $this->input->post('OBAT_INDUKSI'),
                    $this->input->post('OBAT_MUSCAL'),
                    $this->input->post('OBAT_MAINT'),
                    $this->input->post('MULAI_ANEST'),
                    $this->input->post('SELESAI_ANEST'),
                    $lama,
                    $this->input->post('RL'),
                    $this->input->post('NACL'),
                    $this->input->post('DEXTRAN'),
                    $this->input->post('DARAH_MASUK'),
                    $this->input->post('CAIRAN_MASUK_LAIN'),
                    $this->input->post('OBAT_MASUK'),
                    $this->input->post('PENDARAHAN'), 
                    $this->input->post('URINE'),
                    $this->input->post('CAIRAN_KELUAR_LAIN'),
                    $this->input->post('CATATAN'),
                    $this->input->post('POSISI'),
                    $this->input->post('SKALA_NYERI'),
                    $this->input->post('BILA_SAKIT'),
                    $this->input->post('BILA_MUAL'),
                    $this->input->post('ANTIBIOTIK'),
                    $this->input->post('OBAT_LAIN'),
                    $this->input->post('MINUM'),
                    $this->input->post('INFUS'),
                    $this->input->post('MONITOR'),
                    $this->input->post('JAM_KELUAR'),
                    $this->input->post('PINDAH_KE'),
                    $this->input->post('PRE_OP'),
                    $this->input->post('idoperasi')        
                );

            }

                $this->m_cppt->UPDATE_LAP_ANES($params2);
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
        $cek = $this->m_cppt->cek_lap_anes(array($id));
        if ($cek == '0') {
            redirect("op/laporananes/add/" . $FS_RG2."/".$id);
        } elseif ($cek >= '1') {
            
            redirect("op/laporananes/edit/" . $FS_RG2."/".$id);

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
        $this->smarty->assign("template_content", "op/laporananes/edit.html");
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
        $this->smarty->assign("rs_op", $this->m_cppt->get_px_op_by_id(array($idoperasi)));           


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
         $this->smarty->assign("rs_lap_op", $this->m_cppt->get_list_op_by_rg($FS_RG));
         $this->smarty->assign("rs_pra_anes", $this->m_cppt->get_list_pra_anes_by_rg2($FS_RG));
         $this->smarty->assign("rs_lap_anes", $this->m_cppt->get_list_lap_anes_by_rg($FS_RG));
         $this->smarty->assign("rs_lap_anes3", $this->m_cppt->get_list_lap_anes_by_rg3($idoperasi));
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

    public function progress($FS_RG='',$idoperasi='') {
       
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "op/laporananes/progress.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");

 
         // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_progress", $this->m_cppt->get_progress(array($idoperasi)));           

         $role = $this->com_user['role_id'];
         $rolenya=$this->com_user['role_nm'];
          $this->smarty->assign("username", $this->com_user['user_name']);
          $tgl=date('Y-m-d');

         $this->smarty->assign("data_operasi", $this->m_cppt->data_operasi(array($id)));
    
         $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_pasien_ok_by_rgxx(array($FS_RG)));      
        $this->smarty->assign("idoperasi", $idoperasi);
        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);
         $this->smarty->assign("namarole", $rolenya);
      
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();


    }


    public function evaluasi_rr($FS_RG='',$idoperasi='') {
       
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "op/laporananes/evaluasi_rr.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");

 
         // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_progress", $this->m_cppt->get_progress(array($idoperasi)));           

         $role = $this->com_user['role_id'];
         $rolenya=$this->com_user['role_nm'];
          $this->smarty->assign("username", $this->com_user['user_name']);
          $tgl=date('Y-m-d');

         $this->smarty->assign("data_operasi", $this->m_cppt->data_operasi(array($id)));
         $this->smarty->assign("catatan_rr", $this->m_cppt->catatan_rr(array($idoperasi)));
    
         $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg(array($FS_RG)));      
        $this->smarty->assign("idoperasi", $idoperasi);
        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);
         $this->smarty->assign("namarole", $rolenya);
      
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();


    }


    public function edit_evaluasi_rr($FS_RG='',$idoperasi='') {
       
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "op/laporananes/edit_evaluasi_rr.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
    
    
         // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_progress", $this->m_cppt->get_progress(array($idoperasi)));           
    
         $role = $this->com_user['role_id'];
         $rolenya=$this->com_user['role_nm'];
          $this->smarty->assign("username", $this->com_user['user_name']);
          $tgl=date('Y-m-d');
    
       $this->smarty->assign("rs_file_rr", $this->m_cppt->get_rr_by_id(array($idoperasi)));           
       $this->smarty->assign("skor_rr", $this->m_cppt->get_skor_rr(array($idoperasi)));           


         $this->smarty->assign("data_operasi", $this->m_cppt->data_operasi(array($id)));
         $this->smarty->assign("catatan_rr", $this->m_cppt->catatan_rr(array($idoperasi)));
    
         $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg(array($FS_RG)));      
        $this->smarty->assign("idoperasi", $idoperasi);
        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);
         $this->smarty->assign("namarole", $rolenya);
      
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    
    
    }
    


    public function edit_progress($FS_RG='',$idoperasi='',$idprogress) {
       
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "op/laporananes/edit_progress.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui

        $ide=$this->db->query("select periode, nadi, respirasi, tekanan_darah_atas, tekanan_darah_bawah from PKU.dbo.PROGRES_ANESTESI where idoperasi=$idoperasi")->result_array();
        $this->smarty->assign("karyawan", $ide);
 
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css"); 
       $this->smarty->assign("rs_file_anes", $this->m_cppt->get_progress_by_id(array($idoperasi)));           

         $role = $this->com_user['role_id'];
         $rolenya=$this->com_user['role_nm'];
          $this->smarty->assign("username", $this->com_user['user_name']);
          $tgl=date('Y-m-d');

         $this->smarty->assign("data_operasi", $this->m_cppt->data_operasi(array($id)));
    
         $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg(array($FS_RG)));      
        $this->smarty->assign("idoperasi", $idoperasi);
        $this->smarty->assign("idprogress", $idprogress);
        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);
         $this->smarty->assign("namarole", $rolenya);
      
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();


    }


 

        public function delete_progress($FS_RG='',$idoperasi='',$idprogress) {
       
        $this->_set_page_rule("C");
        // set template content
        $data = $this->m_cppt->delete_progress($idprogress);
        redirect("op/laporananes/progress/" . $FS_RG."/".$idoperasi);
 
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
