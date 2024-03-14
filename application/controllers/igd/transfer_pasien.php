<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class Transfer_pasien extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_cppt');
        $this->load->model('m_igd');
        $this->load->model('m_resume');
        $this->load->model('m_ass_jatuh');
        $this->load->model('m_rawat_jalan_nurse');
        $this->load->model('m_rawat_jalan');
        

        $this->load->model('m_ass_awal');
        
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
           $this->_set_page_rule("R");
           // set template content
                   $this->smarty->assign("template_content", "igd/transfer_pasien/index.html");
                   $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
                   $this->smarty->load_javascript('resource/js/jquery/select2.js');
                   $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
                   $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
                   // load style
                   $this->smarty->load_style("jquery.ui/select2/select2.css");
                   // load style ui
                   $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
                   $rolenya=$this->com_user['role_nm'];
                   $this->smarty->assign("username", $this->com_user['user_name']);
                   $this->smarty->assign("rolenya", $this->com_user['role_nm']);
           
                   $search = $this->tsession->userdata('medis_rawat_jalan');
                   $now = date('Y-m-d'); 
   
                   $date = new DateTime();
                    $date_plus = $date->modify("-1 days");
                    $akhirnya= $date_plus->format("Y-m-d");
                
              
                   $x = $this->com_user['user_name'];
                   $FS_KD_PEG = $this->com_user['user_name'];
                
                 
   
                   $fs_kd_layanan = $this->com_user['fs_kd_layanan'];
   
                 
                   $this->smarty->assign("rs_pasien", $this->m_igd->get_px_transfer_igd());
                
   
                   
   
                  
                       $this->smarty->assign("tf", $this->m_igd->get_pasien_keluar_tf4(array($fs_kd_layanan)));           
                   
                   $this->smarty->assign("rs_dokter", $this->m_igd->get_dokter_sp());           
                   $this->smarty->assign("bangsal", $this->m_igd->get_bangsal());           
                   $this->smarty->assign("ruang", $this->m_igd->get_ruang());           
             
                   $this->smarty->assign("no", '1');  
            
                
                    
           // notification
                   $this->tnotification->display_notification();
                   $this->tnotification->display_last_field();
           // output
                   parent::display();
     }


       
    public function approve($FS_RG) {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "nurse/transfer_pasien/approve.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");

        $this->smarty->assign("vs", $this->m_igd->get_data_vs_by_rg($FS_RG));   

         $role = $this->com_user['role_id'];
         $rolenya=$this->com_user['role_nm'];
          $this->smarty->assign("username", $this->com_user['user_name']);
          $tgl=date('Y-m-d');

          $now = date('Y-m-d'); 
 
          $date = new DateTime();
                          $date_plus = $date->modify("-1 days");
                          $akhirnya= $date_plus->format("Y-m-d");

     $this->smarty->assign("rs_pasien", $this->m_igd->get_data_tf_by_noreg2(array($FS_RG)));
     $this->smarty->assign("rs_dokter", $this->m_igd->get_dokter_sp());           
     $this->smarty->assign("bangsal", $this->m_igd->get_bangsal());           
     $this->smarty->assign("ruang", $this->m_igd->get_ruang());           

         $FS_KD_REG=$FS_RG;
           
        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);
         $this->smarty->assign("namarole", $rolenya); 
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }


    
    public function approve_process() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process
  
                  $params2 = array(
                    $this->input->post('FS_KD_REG'), 
                    $this->input->post('KD_DOKTER_DPJP'), 
                    $this->input->post('KD_KONSUL_1'),
                    $this->input->post('KD_KONSUL_2'), 
                    $this->input->post('TGL_PINDAH'), 
                    $this->input->post('JAM_PINDAH'),  
                    $this->input->post('RUANG1'), 
                    $this->input->post('RUANG2'), 
                    $this->input->post('DIAGNOSA1'), 
                    $this->input->post('DIAGNOSA2'), 
                    $this->input->post('ANAMNESA'),
                    $this->input->post('RIWAYAT_SAKIT'),
                    $this->input->post('PEMERIKSAAN_FISIK1'), 
                    $this->input->post('PEMERIKSAAN_FISIK2'), 
                    $this->input->post('PENUNJANG'), 
                    '', 
                    $this->input->post('TERAPI'), 
                    $this->input->post('PENGIRIM'), 
                    $this->com_user['user_name'],
                    'Diterima',
                    $this->input->post('DERAJAT'), 
                    $this->input->post('CAT1'), 
                    $this->input->post('MDD1'), 
                    date('Y-m-d H:i:s'), 
                    $this->input->post('id'), 

                    
                );
                $this->m_igd->UPDATE_TF_PERAWAT($params2);

              
        // default redirect
        redirect("nurse/tf");
    }





     public function out() {
        // set page rules 
                $this->_set_page_rule("R");
        // set template content
                $this->smarty->assign("template_content", "nurse/transfer_pasien/out.html");
                $this->smarty->load_javascript('resource/js/jquery.datatables/jquery.dataTables.js');
                $this->smarty->load_javascript('resource/js/jquery.datatables/dataTables.fixedHeader.js');
                $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
                $this->smarty->load_style("jquery.ui/datatables/jquery.dataTables.css");
        // load javascript
                $this->smarty->load_javascript('resource/js/jquery/jquery-ui-1.9.2.custom.min.js');
                $rolenya=$this->com_user['role_nm'];
                $this->smarty->assign("username", $this->com_user['user_name']);
                $this->smarty->assign("rolenya", $this->com_user['role_nm']);
        
                $search = $this->tsession->userdata('medis_rawat_jalan');
                $now = date('Y-m-d'); 

                $date = new DateTime();
                 $date_plus = $date->modify("-1 days");
                 $akhirnya= $date_plus->format("Y-m-d");
             
           
                $x = $this->com_user['user_name'];
                $FS_KD_PEG = $this->com_user['user_name'];
             
              

                $fs_kd_layanan = $this->com_user['fs_kd_layanan'];

              
                $this->smarty->assign("rs_pasien", $this->m_igd->get_rajal_pasien());
             

                

               
                    $this->smarty->assign("tf", $this->m_igd->get_pasien_keluar_tf4(array($fs_kd_layanan)));           
                
                $this->smarty->assign("rs_dokter", $this->m_igd->get_dokter_sp());           
                $this->smarty->assign("bangsal", $this->m_igd->get_bangsal());           
                $this->smarty->assign("ruang", $this->m_igd->get_ruang());           
          
                $this->smarty->assign("no", '1');  
         
             
                 
        // notification
                $this->tnotification->display_notification();
                $this->tnotification->display_last_field();
        // output
                parent::display();
     }


     
 
   

    public function cari_proses() {
        $FS_RG2 = $this->input->post('FS_RG');
        $cek = $this->m_igd->cek_rencana_pulang(array($FS_RG2));
        if ($cek == '0') {
           $rolenya=$this->com_user['role_name'];
             redirect("nurse/rencana_pulang/add/" . $FS_RG2);
        } elseif ($cek >= '1') {
         redirect("nurse/rencana_pulang/edit/" . $FS_RG2);
        }
    }


    
    public function transfer_process() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process
  
       
            $params2 = array(
                $this->input->post('FS_KD_REG'), 
                $this->input->post('KD_DOKTER_DPJP'), 
                $this->input->post('KD_KONSUL_1'),
                $this->input->post('KD_KONSUL_2'), 
                $this->input->post('TGL_PINDAH'), 
                $this->input->post('JAM_PINDAH'),  
                'POLI', 
                $this->input->post('RUANG2'), 
                $this->input->post('DIAGNOSA1'), 
                $this->input->post('DIAGNOSA2'), 
                $this->input->post('ANAMNESA'),
                $this->input->post('RIWAYAT_SAKIT'),
                $this->input->post('PEMERIKSAAN_FISIK1'), 
                $this->input->post('PEMERIKSAAN_FISIK2'), 
                $this->input->post('PENUNJANG'), 
                '', 
                $this->input->post('TERAPI'), 
                $this->com_user['user_name'],
                '',
                'Pending',
                $this->input->post('DERAJAT'), 
                $this->input->post('CAT1'), 
                date('Y-m-d H:i:s'), 
                date('Y-m-d H:i:s'), 
                
            );
       
                
                $this->m_igd->INSERT_TF_PERAWAT($params2);

              
        // default redirect
        redirect("nurse/tf/out");
    }


    
    public function transfer() {
        $FS_RG=$this->input->post('FS_KD_REG');
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "igd/transfer_pasien/transfer.html");
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

                          $fs_kd_layanan = $this->com_user['fs_kd_layanan'];

                          
        $this->smarty->assign("rs_pasien", $this->m_igd->get_pasien_by_rg_ugd(array($FS_RG)));
        $this->smarty->assign("triase", $this->m_igd->get_triase_by_noreg(array($FS_RG)));

        // var_dump($this->m_igd->get_triase_by_noreg(array($FS_RG)));
        // die;

              
         $this->smarty->assign("bangsal", $this->m_igd->get_bangsal());  
        $this->smarty->assign("ruang", $this->m_igd->get_ruang());      

        $this->smarty->assign("medis", $this->m_rawat_jalan->get_data_medis_by_rg23(array($FS_RG)));
        $this->smarty->assign("asasmen_igd", $this->m_rawat_jalan->get_data_asasmen_igd_by_reg(array($FS_RG)));
        
         $this->smarty->assign("kamar", $this->m_igd->ruang_now(array($FS_RG)));       
             
              
         $this->smarty->assign("result", $this->m_rawat_jalan_nurse->get_px_by_dokter_by_rg2(array($FS_RG)));

      
         $this->smarty->assign("terapi", $this->m_igd->get_terapi_tf(array($fs_kd_layanan, $FS_RG)));
         $this->smarty->assign("penunjang", $this->m_igd->get_cek_lab_cppt(array($FS_RG)));
         

         $tujuan = $this->m_rawat_jalan->list_pemeriksaan_lab_by_rg($FS_RG);
        //  $tujuan_str = "";
        //  foreach ($tujuan as $key => $value) {
        //      $tujuan_str .= "'" . $value['id'] . "',";
        //  }
         $this->smarty->assign('rs_tujuan', $tujuan);
 
         $tembusan = $this->m_rawat_jalan->list_pemeriksaan_rad_by_rg($FS_RG);
        //  $tembusan_str = "";
        //  foreach ($tembusan as $key => $value) { 
        //      $tembusan_str .= "'" . $value['NO_RINCI'] . "',";
        //  }
         $this->smarty->assign('rs_tembusan', $tembusan);
         
        $this->smarty->assign("rs_dokter", $this->m_igd->get_dokter_sp());       
    
        $this->smarty->assign("vs", $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_RG)));
        $this->smarty->assign("ases2", $this->m_rawat_jalan->get_data_ases2_by_rg(array($FS_RG)));
       
        $FS_KD_REG=$FS_RG;
           
        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);
         $this->smarty->assign("namarole", $rolenya); 
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }


 

      
    
    public function edit_transfer($FS_RG) {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "nurse/transfer_pasien/edit_transfer.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");

        $this->smarty->assign("vs", $this->m_igd->get_data_vs_by_rg($FS_RG));   

         $role = $this->com_user['role_id'];
         $rolenya=$this->com_user['role_nm'];
          $this->smarty->assign("username", $this->com_user['user_name']);
          $tgl=date('Y-m-d');

          $now = date('Y-m-d'); 
 
          $date = new DateTime();
                          $date_plus = $date->modify("-1 days");
                          $akhirnya= $date_plus->format("Y-m-d");

        $this->smarty->assign("rs_pasien", $this->m_igd->get_pasien_by_rg_ugd(array($FS_RG)));
        $this->smarty->assign("rs_triase", $this->m_igd->get_data_triase_by_noreg(array($FS_RG)));           
        $this->smarty->assign("perawat", $this->m_igd->get_data_perawat_by_noreg(array($FS_RG)));           
        $this->smarty->assign("daftar", $this->m_igd->get_daftar_igd_by_noreg(array($FS_RG)));           
        $this->smarty->assign("bangsal", $this->m_igd->get_bangsal());  
        $this->smarty->assign("ruang", $this->m_igd->get_ruang());           

                 

        $this->smarty->assign("medis", $this->m_igd->get_data_medis_by_noreg(array($FS_RG)));           
        $this->smarty->assign("tf", $this->m_igd->get_data_tf_by_noreg2(array($FS_RG)));           

        $this->smarty->assign("rs_dokter", $this->m_igd->get_dokter_sp());       
        $this->smarty->assign("ases2", $this->m_rawat_jalan->get_data_ases2_by_rg(array($FS_RG)));

        $FS_KD_REG=$FS_RG;
           
        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);
         $this->smarty->assign("namarole", $rolenya); 
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }




    public function edit_transfer_process() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process
  
                  $params2 = array(
                    $this->input->post('FS_KD_REG'), 
                    $this->input->post('KD_DOKTER_DPJP'), 
                    $this->input->post('KD_KONSUL_1'),
                    $this->input->post('KD_KONSUL_2'), 
                    $this->input->post('TGL_PINDAH'), 
                    $this->input->post('JAM_PINDAH'), 
                    $this->input->post('RUANG1'), 
                    $this->input->post('RUANG2'), 
                    $this->input->post('DIAGNOSA1'), 
                    $this->input->post('DIAGNOSA2'), 
                    $this->input->post('ANAMNESA'),
                    $this->input->post('RIWAYAT_SAKIT'),
                    $this->input->post('PEMERIKSAAN_FISIK1'), 
                    $this->input->post('PEMERIKSAAN_FISIK2'), 
                    $this->input->post('PENUNJANG'), 
                    '', 
                    $this->input->post('TERAPI'), 
                    $this->com_user['user_name'],
                    '',
                    'Pending',
                    $this->input->post('DERAJAT'), 
                    $this->input->post('CAT1'), 
                    date('Y-m-d H:i:s'), 
                    date('Y-m-d H:i:s'), 
                    $this->input->post('id'), 

                    
                );
                $this->m_igd->UPDATE_TF_PERAWAT($params2);

              
        // default redirect
        redirect("nurse/tf/out");
    }



    public function cetak_tf_pasien($id="", $FS_KD_REG=""){
  
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');

        $now = date('Y-m-d');
        $data['vs'] = $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG));
    
        $data['rs_pasien'] = $this->m_igd->cetak_tf_pasien(array($id));

        // var_dump($data);
        // die;
  
        ob_start();
        $this->load->view('nurse/transfer_pasien/cetak_tf_pasien', $data);
        $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output($FS_KD_REG . '.pdf');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }

}