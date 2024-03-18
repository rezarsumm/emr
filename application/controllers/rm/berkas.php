<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class berkas extends ApplicationBase {

// constructor
    public function __construct() {
// parent constructor
        parent::__construct();
// load model
        $this->load->model('m_rm');
         $this->load->model('m_upload');
         $this->load->model('m_igd');
         $this->load->model('m_ass_awal_bidan');
        $this->load->model('m_rawat_inap');
        $this->load->model('m_kep');
        $this->load->model('m_resume');
        $this->load->model('m_rawat_jalan');
        $this->load->model('m_ass_awal');
        $this->load->model('m_rm17');
        $this->load->model('m_cppt');
        $this->smarty->assign('m_rawat_jalan', $this->m_rawat_jalan);
        $this->load->library('tnotification');
        $this->smarty->assign('m_ass_awal', $this->m_ass_awal);
        $this->smarty->assign('m_kep', $this->m_kep);
        
    } 

// list surat masuk
    public function index() {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "rm/berkas/index.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $search = $this->tsession->userdata('rm_rawat_jalan');
        if (!empty($search)) {
            $this->smarty->assign("search", $search);
        }
        if (empty($search['FS_MR'])) {
            $search['FS_MR'] = ' ';
            $this->smarty->assign("search", $search);
        }
        $this->smarty->assign("FS_MR", $search['FS_MR']);
         if (empty($search['FS_KD_JENIS_REG'])) {
            $search['FS_KD_JENIS_REG'] = "%J%";
            $this->smarty->assign("search", $search);
        }

        $tgl_sekarang =strtotime(date('Y-m-d'));
        $tgl_kemarin =date('Y-m-d', strtotime("-1 day", $tgl_sekarang));


        // search parameters 
        $new_reg = $search['FS_MR'];
        $FS_MR = empty($new_reg) ? : $new_reg;
        $FS_KD_JENIS_REG = empty($search['FS_KD_JENIS_REG']) ? :  $search['FS_KD_JENIS_REG'];
// get search parameter 
        $this->smarty->assign("result", $this->m_rm->get_data_px_by_rm(array($FS_MR)));
        $this->smarty->assign("tgl_kemarin", $tgl_kemarin);
 
        $this->smarty->assign("rs_pasien", $this->m_rm->get_px_history2(array($FS_MR,$FS_KD_JENIS_REG)));
        // notification 
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }

    // searching
    public function proses_cari() {
        //set page rules
        $this->_set_page_rule("R");
        //data
        if ($this->input->post('save') == "Reset") {
            $this->tsession->unset_userdata("rm_rawat_jalan");
        } else {
            $params = array(
                "FS_MR" => $this->input->post("FS_MR"),
                "FS_KD_JENIS_REG" => $this->input->post("FS_KD_JENIS_REG")
            );
            $this->tsession->set_userdata("rm_rawat_jalan", $params);
        }
        // redirect
        redirect("rm/berkas");
    }
    
     public function detail($FS_KD_REG) {
// set page rules
        $this->_set_page_rule("R");
// set template content

        $cek_cara_daftar=$this->db->query("select Kode_Masuk from PENDAFTARAN WHERE No_Reg='$FS_KD_REG'")->row_array();

        $tgl_sekarang =strtotime(date('Y-m-d'));
        $tgl_kemarin =date('Y-m-d', strtotime("-1 day", $tgl_sekarang));
        $this->smarty->assign("tgl_kemarin", $tgl_kemarin); 
          $this->smarty->assign("rs_rm10", $this->m_rawat_jalan->get_rm10_by_rg(array($FS_RG)));
        $this->smarty->assign("ases_perawat", $this->m_ass_awal->get_data_ases2_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("ases_bidan", $this->m_ass_awal_bidan->get_data_ases2_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("ases_medis", $this->m_rawat_inap->get_data_medis_by_rg21(array($FS_KD_REG)));

         $this->smarty->assign("rencana_pulang", $this->m_igd->get_rp(array($FS_KD_REG))); 

        $this->smarty->assign("rs_resume", $this->m_rawat_jalan->get_cek_resume(array($FS_KD_REG))); 
        $this->smarty->assign("rencana", $this->m_rawat_jalan->get_rencana_kep_by_rg(array($FS_KD_REG))); 
        $this->smarty->assign("tindakan", $this->m_rawat_jalan->get_tindakan_kep_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("obat", $this->m_rawat_jalan->get_all_rm17_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("cppt", $this->m_rawat_jalan->get_cppt_by_rg($FS_KD_REG));
        $this->smarty->assign("No_registrasi", $FS_KD_REG);
        $this->smarty->assign("template_content", "rm/berkas/detail_igd.html");
      
        $this->smarty->assign("rs_berkas", $this->m_upload->get_list_berkas_by_rg($FS_KD_REG));
        $this->smarty->assign("cek_cara_daftar", $cek_cara_daftar);
       
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        
// get search parameter
        $this->smarty->assign("result", $this->m_rm->get_data_px_by_rg(array($FS_KD_REG)));
         $this->smarty->assign("form_rm", $this->m_rm->get_berkas_by_rg(array($FS_KD_REG)));
           $this->smarty->assign("dataop", $this->m_rawat_jalan->get_data_op(array($FS_KD_REG)));

           $this->smarty->assign("rs_triase", $this->m_igd->get_data_triase_by_noreg(array($FS_KD_REG)));
           $this->smarty->assign("bidan_igd",  $this->m_igd->get_data_bidan_by_noreg(array($FS_KD_REG)));
           $this->smarty->assign("perawat_igd", $this->m_igd->get_data_perawat_by_noreg(array($FS_KD_REG)));
           $this->smarty->assign("medis_igd", $this->m_igd->get_data_medis_by_noreg(array($FS_KD_REG)));
           $this->smarty->assign("alergi", $this->m_rawat_jalan->get_data_op(array($FS_KD_REG)));


        
        //$this->smarty->assign("rs_pasien", $this->m_rm->get_px_history(array($FS_MR)));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }

 


    public function detail_ews($FS_RG = '') {

       
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "rm/berkas/ews.html");
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
        $this->smarty->assign("ews_dewasa", $this->m_igd->get_ews(array($FS_RG))); 
         $this->smarty->assign("ews_anak", $this->m_igd->get_ews_anak(array($FS_RG))); 
         $this->smarty->assign("ews_hamil", $this->m_igd->get_ews_hamil(array($FS_RG))); 

        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);
         $this->smarty->assign("namarole", $rolenya); 
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }


    public function detail_cppt($FS_RG = '') {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "rm/berkas/cppt.html");
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

          if ($role == '24'){
              $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg_ugd(array($FS_RG)));
            }
        else{   $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg(array($FS_RG)));
           }
 

           $tgl_sekarang =strtotime(date('Y-m-d'));
           $tgl_kemarin =date('Y-m-d', strtotime("-1 day", $tgl_sekarang));

         $this->smarty->assign("tgl_kemarin", $tgl_kemarin);
           $x = $this->com_user['user_name'];
          $this->smarty->assign("x", $x);  
         $this->smarty->assign("rs_cppt", $this->m_cppt->get_cppt_by_rg($FS_RG));
        $this->smarty->assign("rs_resep", $this->m_cppt->get_resep());
        $tgl=date('Y-m-d');

        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);
 
        $this->smarty->assign("namarole", $rolenya);
       
      
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }


    public function detail_rencana($FS_RG = '') {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "rm/berkas/rencana.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        // pagination assign value
        $this->smarty->assign("no", 1);

        $role = $this->com_user['role_id'];
        $tgl_sekarang =strtotime(date('Y-m-d'));
        $tgl_kemarin =date('Y-m-d', strtotime("-1 day", $tgl_sekarang));
        $this->smarty->assign("tgl_kemarin", $tgl_kemarin);
        

          if ($role == '24'){
            $this->smarty->assign("rs_pasien", $this->m_kep->get_pasien_by_rg_ugd(array($FS_RG)));
            }
            else{
            $this->smarty->assign("rs_pasien", $this->m_kep->get_pasien_by_rg(array($FS_RG)));
            }
            
        $this->smarty->assign("rs_diagnosa", $this->m_kep->get_diagnosa());
        //$this->smarty->assign("rs_layanan", $this->m_kep->get_layanan());
        $this->smarty->assign("result", $this->m_kep->get_rencana_kep_by_rg(array($FS_RG)));
        $this->smarty->assign("rs_masalah_kep", $this->m_kep->get_masalah_kep_by_rg(array($FS_RG)));
        
     
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }


    public function detail_obat($FS_RG="") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "rm/berkas/obat.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
         $search = $this->tsession->userdata('rm17_search');
        if (!empty($search)) {
            $this->smarty->assign("search", $search);
        }

        $tgl_sekarang =strtotime(date('Y-m-d'));
        $tgl_kemarin =date('Y-m-d', strtotime("-1 day", $tgl_sekarang));
        $this->smarty->assign("tgl_kemarin", $tgl_kemarin);

        $role = $this->com_user['role_id'];

    
        if(!empty($FS_RG)){
            $FS_RG = $FS_RG; 
        }
        else{
           $FS_RG = $this->input->post('FS_RG');   
        }
        
       
          if ($role == '24'){
            $this->smarty->assign("rs_pasien", $this->m_rm17->get_pasien_by_rg_ugd(array($FS_RG)));
            }
            else{
           $this->smarty->assign("rs_pasien", $this->m_rm17->get_pasien_by_rg(array($FS_RG)));
            }

        $this->smarty->assign("rs_rm17", $this->m_rm17->get_all_rm17_by_rg(array($FS_RG)));
        $this->smarty->assign("detail", $this->m_igd->get_cat_obat(array($FS_RG)));

        

        
        //$this->smarty->assign("rs_layanan", $this->m_rm17->get_layanan());
        
        $this->smarty->assign("rs_obat", $this->m_rm17->get_obat());
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }


    public function detail_tindakan($FS_RG = '') {

        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "rm/berkas/tindakan.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        // pagination assign value

        $tgl_sekarang =strtotime(date('Y-m-d'));
        $tgl_kemarin =date('Y-m-d', strtotime("-1 day", $tgl_sekarang));
        $this->smarty->assign("tgl_kemarin", $tgl_kemarin);
        

        $this->smarty->assign("no", 1);
        $this->smarty->assign("rs_pasien", $this->m_kep->get_pasien_by_rg(array($FS_RG)));
        $this->smarty->assign("result", $this->m_kep->get_tindakan_kep_by_rg(array($FS_RG)));
        $this->smarty->assign("rs_kep_tind", $this->m_kep->list_kep_tindakan_by_rg());

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }


     public function file($FS_KD_REG = "") { 
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "rm/berkas/file.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        // klasifikasi masalah
        $this->smarty->assign("FS_KD_REG", $FS_KD_REG);
        // klasifikasi surat
        $this->smarty->assign("rs_berkas", $this->m_upload->get_list_berkas_by_rg($FS_KD_REG));
        // get all instansi
        //$this->smarty->assign("rs_instansi", $this->m_surat->get_all_instansi());
        //$this->smarty->assign("rs_jabatan", $this->m_surat->get_all_jabatan());
        //$year = date('Y');
        //$this->smarty->assign("rs_noagenda", $this->m_surat->get_no_agenda_max($year));
        //$this->smarty->assign("rs_datenow", date('d-m-Y'));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }
    
    public function pinjam($FS_KD_REG) {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "rm/berkas/pinjam.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
// get search parameter
        $this->smarty->assign("rs_pasien", $this->m_rm->get_data_px_by_rg(array($FS_KD_REG)));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }
    
    public function pinjam_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
        $this->tnotification->set_rules('FD_TGL_PINJAM', 'Tanggal Pinjam', 'trim|required');
        $this->tnotification->set_rules('FD_TGL_EXPIRED', 'Tanggal Expired', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('FD_TGL_PINJAM'),
                $this->com_user['user_name'],
                $this->input->post('FD_TGL_EXPIRED')
            );
            // insert
            if ($this->m_rm->insert_pinjam($params)) {
               $FS_KD_TRS =  $this->m_rm->get_last_inserted_id();
                $tujuan_pinjam= $this->input->post('tujuan');
                if (!empty($tujuan_pinjam)) {
                    foreach ($tujuan_pinjam as $value) {
                        $this->m_rm->insert_tujuan_pinjam(array($FS_KD_TRS, $value));
                    }
                }
                // notification
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            } else {
                // default error
                $this->tnotification->sent_notification("error", "Detail gagal disimpan");
                redirect("rm/berkas/");
            }
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
            redirect("rm/berkas/");
        }
        // default redirect
        redirect("rm/berkas");
    }
    
    public function list_user() {
        $instansi = $this->m_rm->get_all_user();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['FS_NM_PEG'],
                'value' => $value['FS_KD_PEG']
            );
            $i++;
        }
        echo json_encode($data);
    }
    
    public function download($att_name = "") {
        $file_path = 'resource/doc/rm/' . $att_name;
        if (is_file($file_path)) {
            header('Content-Description: Download File');
            header('Content-Type: application/octet-stream');
            header('Content-Length: ' . filesize($file_path));
            header('Content-Disposition: attachment; filename="' . $att_name . '"');
            readfile($file_path);
            exit();
        }
    }
}
