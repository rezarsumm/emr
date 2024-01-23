<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class Triase extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_igd'); 
        $this->load->model('m_rawat_jalan');  
        // load library
        $this->load->library('tnotification');
        $this->load->library('pagination');
        $this->load->library('datetimemanipulation');
        $this->load->library('tupload');
        //$this->load->library('twhatsapp');
        $this->smarty->assign('dtm', $this->datetimemanipulation);
        $this->smarty->assign('m_cppt', $this->m_cppt);
    }


    public function index() {
        // set page rules
                $this->_set_page_rule("R");
        // set template content
                $this->smarty->assign("template_content", "igd/triase/index.html");
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
                
            
           
                $x = $this->com_user['user_name'];
                $FS_KD_PEG = $this->com_user['user_name'];
             
                $now = date('Y-m-d'); 

                $date = new DateTime();
				$date_plus = $date->modify("-1 days");
				$akhirnya= $date_plus->format("Y-m-d");

         
                $this->smarty->assign("rs_pasien", $this->m_igd->get_px_igd(array($now, $akhirnya)));           
                $this->smarty->assign("rs_triase", $this->m_igd->get_data_triase(array($now, $akhirnya,$now)));           
       
                $this->smarty->assign("no", '1');  
         
              
                 
        // notification
                $this->tnotification->display_notification();
                $this->tnotification->display_last_field();
        // output
                parent::display();
     }



     
    public function add() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "igd/triase/add.html");
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


          $this->smarty->assign("rs_pasien", $this->m_igd->get_px_igd(array($now, $akhirnya)));           
     
        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);
         $this->smarty->assign("namarole", $rolenya); 
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }



      
    public function edit($id) {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "igd/triase/edit.html");
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
          $this->smarty->assign("id", $id);
          $tgl=date('Y-m-d');

          $this->smarty->assign("rs_triase", $this->m_igd->get_data_triase_by_id(array($id)));           


          $now = date('Y-m-d'); 

          $date = new DateTime();
                          $date_plus = $date->modify("-1 days");
                          $akhirnya= $date_plus->format("Y-m-d");


          $this->smarty->assign("rs_pasien", $this->m_igd->get_px_igd(array($now, $akhirnya)));           
     
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
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process
  
        if($this->input->post('status')=='Ya'){
                $na=$this->m_igd->get_nama( $this->input->post('FS_KD_REG'));
                $n=$na['Nama_Pasien'];
                $al=$na['Alamat'];
        }
        else{
                $n=$this->input->post('Nama_Pasien');
                $al=$this->input->post('Alamat');
        }

        if( $this->input->post('KENDARAAN')=='Ambulance'){
                $ken= $this->input->post('KENDARAAN');
        }
        else{
                $ken= $this->input->post('KENDARAAN1');
        }
                 $params2 = array(
                    $this->input->post('FS_KD_REG'),
                    $n,
                    $al,
                    $this->input->post('TGL_DATANG'),
                    $this->input->post('JAM_DATANG'),
                    $this->input->post('CARA_MASUK'),
                    $this->input->post('SUDAH_TERPASANG'),
                    $this->input->post('ALASAN_DATANG'),
                    $ken,
                    $this->input->post('NAMA_PENGANTAR'),
                    $this->input->post('TELP_PENGANTAR'),
                    $this->input->post('JENIS_KASUS'),
                    $this->input->post('JENIS_TRAUMA'),
                    $this->input->post('URAIAN_TRAUMA'),
                    $this->input->post('TGL_KEJADIAN'),
                    $this->input->post('TEMPAT_KEJADIAN'),
                    $this->input->post('PACS'),
                    $this->input->post('KESADARAN'),
                    $this->input->post('SKOR_KESADARAN'),
                    $this->input->post('TD'),
                    $this->input->post('SKOR_TD'),
                    $this->input->post('R'),
                    $this->input->post('SKOR_R'),
                    $this->input->post('O2'),
                    $this->input->post('SKOR_O2'),
                    $this->input->post('N'),
                    $this->input->post('SKOR_N'),
                    $this->input->post('SUHU'),
                    $this->input->post('SKOR_SUHU'),
                    $this->input->post('NYERI'),
                    $this->input->post('BB'),
                    $this->input->post('TB'),
                    $this->input->post('KEPUTUSAN'),
                    $this->input->post('rujukan_dari'),
                    $this->input->post('dijemput'),
                    $this->input->post('KELUHAN'),
                    $this->input->post('CAT_KHUSUS'),
                    $this->input->post('TOTAL_SKOR'),
                    $this->input->post('JAM_KEP'),
                    $this->com_user['user_name'],
                    date('Y-m-d H:i:s'), 
                    $this->input->post('LEVEL_TRIASE'),
                     
                );
                $this->m_igd->INSERT_TRIASE($params2);

                $params1 = array(
                        $this->input->post('FS_KD_REG'),
                        $this->input->post('SUHU'),
                        $this->input->post('N'),
                        $this->input->post('R'),
                        $this->input->post('TD'),
                        $this->input->post('TB'),
                        $this->input->post('BB'),
                        '',
                        $this->com_user['user_id'],
                        date('Y-m-d'),
                        date('H:i:s')
                    );
                    $this->m_rawat_jalan->insert_vs($params1);

              
                


           

                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            
        
        // default redirect
        redirect("igd/triase");
    }


    

    public function edit_process() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process
  
        if($this->input->post('status')=='Ya'){
                $na=$this->m_igd->get_nama( $this->input->post('FS_KD_REG'));
                $n=$na['Nama_Pasien'];
                $al=$na['Alamat'];
        }
        else{
                $n=$this->input->post('Nama_Pasien');
                $al=$this->input->post('Alamat');
        }

        if( $this->input->post('KENDARAAN')=='Ambulance'){
                $ken= $this->input->post('KENDARAAN');
        }
        else{
                $ken= $this->input->post('KENDARAAN1');
        }
                 $params2 = array(
                    $this->input->post('FS_KD_REG'),
                    $n,
                    $al,
                    $this->input->post('TGL_DATANG'),
                    $this->input->post('JAM_DATANG'),
                    $this->input->post('CARA_MASUK'),
                    $this->input->post('SUDAH_TERPASANG'),
                    $this->input->post('ALASAN_DATANG'),
                    $ken,
                    $this->input->post('NAMA_PENGANTAR'),
                    $this->input->post('TELP_PENGANTAR'),
                    $this->input->post('JENIS_KASUS'),
                    $this->input->post('JENIS_TRAUMA'),
                    $this->input->post('URAIAN_TRAUMA'),
                    $this->input->post('TGL_KEJADIAN'),
                    $this->input->post('TEMPAT_KEJADIAN'),
                    $this->input->post('PACS'),
                    $this->input->post('KESADARAN'),
                    $this->input->post('SKOR_KESADARAN'),
                    $this->input->post('TD'),
                    $this->input->post('SKOR_TD'),
                    $this->input->post('R'),
                    $this->input->post('SKOR_R'),
                    $this->input->post('O2'),
                    $this->input->post('SKOR_O2'),
                    $this->input->post('N'),
                    $this->input->post('SKOR_N'),
                    $this->input->post('SUHU'),
                    $this->input->post('SKOR_SUHU'),
                    $this->input->post('NYERI'),
                    $this->input->post('BB'),
                    $this->input->post('TB'),
                    $this->input->post('KEPUTUSAN'),
                    $this->input->post('rujukan_dari'),
                    $this->input->post('dijemput'),
                    $this->input->post('KELUHAN'),
                    $this->input->post('CAT_KHUSUS'),
                    $this->input->post('TOTAL_SKOR'),
                    $this->input->post('JAM_KEP'),
                    $this->com_user['user_name'],
                    date('Y-m-d H:i:s'), 
                    $this->input->post('LEVEL_TRIASE'),
                    $this->input->post('id'),

                    
                );
                $this->m_igd->UPDATE_TRIASE($params2);

                $params1 = array(
                        $this->input->post('SUHU'),
                        $this->input->post('N'),
                        $this->input->post('R'),
                        $this->input->post('TD'),
                        $this->input->post('TB'),
                        $this->input->post('BB'),
                        $this->com_user['user_id'],
                        date('Y-m-d'),
                        $this->input->post('FS_KD_REG')
                    );
                    $this->m_rawat_jalan->update_vs($params1);
              
           

                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            
        
        // default redirect
        redirect("igd/triase");
    }


            
 

}