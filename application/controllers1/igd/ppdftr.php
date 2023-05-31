<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class Ppdftr extends ApplicationBase {
 
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
                $this->smarty->assign("template_content", "igd/daftar.html");
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
                
                  $this->smarty->assign("rs_pasien2", $this->m_igd->get_px_igd(array($now, $akhirnya)));           
            
           
                $x = $this->com_user['user_name'];
                $FS_KD_PEG = $this->com_user['user_name'];
             
                $now = date('Y-m-d'); 

                $date = new DateTime();
				$date_plus = $date->modify("-1 days");
				$akhirnya= $date_plus->format("Y-m-d");

         
                $this->smarty->assign("rs_pasien", $this->m_igd->get_daftar_igd(array($now, $akhirnya, $now,$akhirnya)));           
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



     
    public function add() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "igd/add_daftar.html");
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
                $this->smarty->assign("rolenya", $this->com_user['role_nm']);

     
            $this->smarty->assign("rs_dokter", $this->m_igd->get_dokter_sp());           
                $this->smarty->assign("bangsal", $this->m_igd->get_bangsal());           
                $this->smarty->assign("ruang", $this->m_igd->get_ruang());       

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
        $this->smarty->assign("template_content", "igd/edit_daftar.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");

        $search = $this->tsession->userdata('medis_rawat_jalan');
                $now = date('Y-m-d'); 

                $date = new DateTime();
                                $date_plus = $date->modify("-1 days");
                                $akhirnya= $date_plus->format("Y-m-d");
          $this->smarty->assign("rs_pasien2", $this->m_igd->get_px_igd(array($now, $akhirnya)));           
            
           
                $x = $this->com_user['user_name'];
                $FS_KD_PEG = $this->com_user['user_name'];
             
                $now = date('Y-m-d'); 

                $date = new DateTime();
				$date_plus = $date->modify("-1 days");
				$akhirnya= $date_plus->format("Y-m-d");


                $this->smarty->assign("rs_pasien", $this->m_igd->get_daftar_igd_by_id(array($id)));           
               $this->smarty->assign("rolenya", $this->com_user['role_nm']);

     
            $this->smarty->assign("rs_dokter", $this->m_igd->get_dokter_sp());           
                $this->smarty->assign("bangsal", $this->m_igd->get_bangsal());           
                $this->smarty->assign("ruang", $this->m_igd->get_ruang());           
          
                $this->smarty->assign("no", '1');  
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
  
        // if($this->input->post('status')=='Ya'){
        //         $na=$this->m_igd->get_nama( $this->input->post('FS_KD_REG'));
        //         $n=$na['Nama_Pasien'];
        //         $al=$na['Alamat'];
        // }
        // else{
        //         $n=$this->input->post('Nama_Pasien');
        //         $al=$this->input->post('Alamat');
        // }

        if($this->com_user['role_nm']=='Dokter'){
  
              $params2 = array(
                    '',
                    $this->input->post('Nama'),
                    $this->input->post('alamat'),
                    $this->input->post('umur'),
                    $this->input->post('JENIS_RAWAT'),
                     $this->input->post('REKANAN'),
                     $this->input->post('UNIT1'),
                     $this->input->post('RUANG1'),
                     $this->input->post('KD_DOKTER1'),
                     $this->input->post('UNIT2'),
                     $this->input->post('RUANG2'),
                     $this->input->post('KD_DOKTER2'),
                     '',
                      $this->com_user['user_name'],
                    date('Y-m-d H:i:s'), 
                    
                );
                $this->m_igd->INSERT_DAFTAR($params2);
        }


        if($this->com_user['role_nm']=='Admisi'){
  
                $params2 = array(
                      '',
                      $this->input->post('Nama'),
                      $this->input->post('alamat'),
                      $this->input->post('umur'),
                      $this->input->post('JENIS_RAWAT'),
                       $this->input->post('REKANAN'),
                       $this->input->post('UNIT1'),
                       $this->input->post('RUANG1'),
                       $this->input->post('KD_DOKTER1'),
                       $this->input->post('UNIT2'),
                       $this->input->post('RUANG2'),
                       $this->input->post('KD_DOKTER2'),
                        $this->com_user['user_name'],
                        '',
                      date('Y-m-d H:i:s'), 
                      
                  );
                  $this->m_igd->INSERT_DAFTAR($params2);
          }
           

                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            
        
        // default redirect
        redirect("igd/ppdftr");
    }


    

    public function edit_process() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
       
        if($this->input->post('status')=='Ya'){
            $na=$this->m_igd->get_nama($this->input->post('FS_KD_REG'));
            $n=$na['Nama_Pasien'];
            $al=$na['Alamat'];
        }
        else{
                $n=$this->input->post('Nama_Pasien');
                $al=$this->input->post('Alamat');
        }

        
        
        if($this->com_user['role_nm']=='Dokter'){
  
                $params2 = array(
                      $this->input->post('FS_KD_REG'),
                      $n,
                      $al,
                      $this->input->post('umur'),
                      $this->input->post('JENIS_RAWAT'),
                       $this->input->post('REKANAN'),
                       $this->input->post('UNIT1'),
                       $this->input->post('RUANG1'),
                       $this->input->post('KD_DOKTER1'),
                       $this->input->post('UNIT2'),
                       $this->input->post('RUANG2'),
                       $this->input->post('KD_DOKTER2'),
                       $this->input->post('KD_ADMISI'),
                        $this->com_user['user_name'],
                      date('Y-m-d H:i:s'), 
                      $this->input->post('id'),                      
                  );
                  $this->m_igd->UPDATE_DAFTAR($params2);
          }
  
  
          if($this->com_user['role_nm']=='Admisi'){
    
                  $params2 = array(
                        $this->input->post('FS_KD_REG'),
                        $n,
                      $al,
                        $this->input->post('umur'),
                        $this->input->post('JENIS_RAWAT'),
                         $this->input->post('REKANAN'),
                         $this->input->post('UNIT1'),
                         $this->input->post('RUANG1'),
                         $this->input->post('KD_DOKTER1'),
                         $this->input->post('UNIT2'),
                         $this->input->post('RUANG2'),
                         $this->input->post('KD_DOKTER2'),
                          $this->com_user['user_name'],
                          $this->input->post('KD_DOKTER_UMUM'),
                        date('Y-m-d H:i:s'), 
                      $this->input->post('id'),                      
                        
                    );
                    $this->m_igd->UPDATE_DAFTAR($params2);
            }


                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            
        
        // default redirect
        redirect("igd/ppdftr");
    }


            
 

}