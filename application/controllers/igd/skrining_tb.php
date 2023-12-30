<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class Skrining_tb extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_igd'); 
        $this->load->model('m_rawat_jalan');  
        $this->load->model('m_ass_awal');   
        
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
        $this->smarty->assign("template_content", "igd/skrining_tb/list.html");
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
        $this->smarty->assign("rs_ases_per_igd", $this->m_igd->get_data_ases_perawat_igd(array($date, $akhirnya,$date)));

       $this->smarty->assign("rs_pasien", $this->m_igd->get_pasien_ugd());
       $this->smarty->assign("pasien", $this->m_igd->get_skrining_tb());
   
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function cari_process() {
        $FS_RG2 = $this->input->post('FS_RG');
        $cek = $this->m_igd->cek_skrining_tb(array($FS_RG2));
        if ($cek == '0') {
           $rolenya=$this->com_user['role_name'];
             redirect("igd/skrining_tb/add/" . $FS_RG2);
        } elseif ($cek >= '1') {
         redirect("igd/skrining_tb/edit/" . $FS_RG2);
        }
    }


    
     
    public function add($FS_RG) {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "igd/skrining_tb/add.html");
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

          $this->smarty->assign("icd", $this->m_igd->get_icd());  

          $now = date('Y-m-d'); 

          $date = new DateTime();
                          $date_plus = $date->modify("-1 days");
                          $akhirnya= $date_plus->format("Y-m-d");

        $this->smarty->assign("rs_pasien", $this->m_igd->get_pasien_by_rg_ugd(array($FS_RG)));
        $this->smarty->assign("rs_triase", $this->m_igd->get_data_triase_by_noreg(array($FS_RG)));           

        $this->smarty->assign("result", $this->m_igd->get_px_by_dokter_by_rg2(array($FS_RG)));

        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);
         $this->smarty->assign("namarole", $rolenya); 
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }


        
    public function edit($FS_RG) { 
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "igd/skrining_tb/edit.html");
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

        //   var_dump($this->m_igd->get_data_skrining_tb_by_noreg(array($FS_RG)));
        //   die;

          $this->smarty->assign("rs_pasien", $this->m_igd->get_pasien_by_rg_ugd(array($FS_RG)));
        $this->smarty->assign("skrining_tb", $this->m_igd->get_data_skrining_tb_by_noreg(array($FS_RG)));           


           // Mendapatkan string dari database
           $penunjang_string = $this->m_igd->get_penunjang_skrining_tb(array($FS_RG));

           // Memecah string menjadi array
           $data = array();
           $string = $penunjang_string['PENUNJANG'];;
           $string = trim($string, ','); // Menghapus koma di awal dan akhir string (jika ada)
   
           if (!empty($string)) {
               $data = explode(',', $string);
           }

           
   
        //    var_dump($data);
        //    die;
           // Assign array ke Smarty
           $this->smarty->assign("PENUNJANGS", $data);
          
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

            $penunjang = $this->input->post('PENUNJANG');
            $pen='';
            if (!empty($penunjang)) {
                foreach ($penunjang as $value) {
                    $pen=$pen.','.$value;
                }
            }
            $params2 = array(
                $this->input->post('FS_KD_REG'), 
                $this->input->post('TANGGAL_SKRINING'), 
                $this->input->post('JAM_SKRINING'), 
                $this->input->post('GEJALA_TB1'), 
                $this->input->post('GEJALA_TB2'),
                $pen,
                $this->input->post('KETERANGAN_PENUNJANG'),
                $this->input->post('KESIMPULAN_TB'),
                $this->com_user['user_name'],
                date('Y-m-d H:i:s'),
                $this->input->post('GEJALA_TB3'),
                $this->input->post('GEJALA_TB4'),
                $this->input->post('GEJALA_TB5'),
                $this->input->post('GEJALA_TB6'),
                $this->input->post('GEJALA_TB7'),
                $this->input->post('GEJALA_TB8'),
                $this->input->post('GEJALA_TB9'),
                $this->input->post('GEJALA_TB10'),
                $this->input->post('GEJALA_TB11'),

                
            );
            $this->m_igd->INSERT_SKRINING_TB($params2);




                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            

                // if($this->input->post('HASIL')=='3'){
                //     $cek = $this->m_igd->cek_tf_dari_igd(array($FS_RG2));
                //     if ($cek == '0') {
                //            redirect("igd/perawat/transfer/" . $this->input->post('FS_KD_REG'));
                //     }
                //     else{
                //         redirect("igd/perawat/edit_transfer/" . $this->input->post('FS_KD_REG'));
                //     }
                // }  
        // default redirect
        redirect("igd/skrining_tb");
    }

    public function edit_process() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'trim|required');
        // process

            $penunjang = $this->input->post('PENUNJANG');
            $pen='';
            if (!empty($penunjang)) {
                foreach ($penunjang as $value) {
                    $pen=$pen.','.$value;
                }
            }
            $params2 = array(
                $this->input->post('FS_KD_REG'), 
                $this->input->post('TANGGAL_SKRINING'), 
                $this->input->post('JAM_SKRINING'), 
                $this->input->post('GEJALA_TB1'), 
                $this->input->post('GEJALA_TB2'),
                $pen,
                $this->input->post('KETERANGAN_PENUNJANG'),
                $this->input->post('KESIMPULAN_TB'),
                $this->com_user['user_name'],
                date('Y-m-d H:i:s'),
                $this->input->post('GEJALA_TB3'),
                $this->input->post('GEJALA_TB4'),
                $this->input->post('GEJALA_TB5'),
                $this->input->post('GEJALA_TB6'),
                $this->input->post('GEJALA_TB7'),
                $this->input->post('GEJALA_TB8'),
                $this->input->post('GEJALA_TB9'),
                $this->input->post('GEJALA_TB10'),
                $this->input->post('GEJALA_TB11'),
                $this->input->post('id')

                
            );
            $this->m_igd->update_skrining_tb($params2);




                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            

                // if($this->input->post('HASIL')=='3'){
                //     $cek = $this->m_igd->cek_tf_dari_igd(array($FS_RG2));
                //     if ($cek == '0') {
                //            redirect("igd/perawat/transfer/" . $this->input->post('FS_KD_REG'));
                //     }
                //     else{
                //         redirect("igd/perawat/edit_transfer/" . $this->input->post('FS_KD_REG'));
                //     }
                // }  
        // default redirect
        redirect("igd/skrining_tb");
    }

    public function cetak_form_tb($FS_KD_REG=""){
  
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
          // Mendapatkan string dari database
          $penunjang_string = $this->m_igd->get_penunjang_skrining_tb(array($FS_KD_REG));

          // Memecah string menjadi array
          $dataString = array();
          $string = $penunjang_string['PENUNJANG'];;
          $string = trim($string, ','); // Menghapus koma di awal dan akhir string (jika ada)
  
          if (!empty($string)) {
              $dataString = explode(',', $string);
          }

          
  
      
          // Assign array ke Smarty

        $now = date('Y-m-d');
        $data['rs_pasien'] = $this->m_igd->cetak_tb(array($FS_KD_REG));
        //     var_dump($data);
        //   die;
        $data['PENUNJANGS'] = $dataString;


        // var_dump($data);
        // die;
  
        ob_start();
        $this->load->view('igd/skrining_tb/cetak_tb', $data);
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