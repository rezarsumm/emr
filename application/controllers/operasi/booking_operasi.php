<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class booking_operasi extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_igd');

        $this->load->model('m_cppt');
        $this->load->model('m_resume');
        $this->load->model('operasi/m_dokter');
        $this->load->model('operasi/m_ruangan_operasi');
        $this->load->model('operasi/m_booking_operasi');
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
        $this->smarty->assign("template_content", "operasi/booking_operasi/index.html");
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

        $user_id2 = $this->com_user['user_id'];
        $this->smarty->assign("user", $user_id2);

        // var_dump($role);
        // die;


        $fs_kd_layanan = $this->com_user['fs_kd_layanan'];

        if($fs_kd_layanan == 'MNA')
        {
              $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_mina());
        }

        else{

            $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_bangsal_by_bangsal(array($this->com_user['fs_kd_layanan'])));
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
   
        $cek = $this->m_booking_operasi->cek_booking_operasi(array($FS_RG2));
        if ($cek == '0') {
            redirect("operasi/booking_operasi/add/" . $FS_RG2);
        } elseif ($cek >= '1') {
            redirect("operasi/booking_operasi/edit/" . $FS_RG2);
        
        }
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

    public function add($FS_RG = '') {
        // set page rules
        $this->_set_page_rule("C");
        // var_dump($this->com_user['fs_kd_layanan']);
        // die;

        // set template content
        $this->smarty->assign("template_content", "operasi/booking_operasi/add.html");
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

         $x = $this->com_user['user_name'];
          $this->smarty->assign("x", $x);  
   
          $this->smarty->assign("dokters", $this->m_dokter->getDokterBedah());
          $this->smarty->assign("ruangan", $this->m_ruangan_operasi->getRuangOperasi());

        //   var_dump($this->m_ruangan_operasi->getRuangOperasi());
        //   die;

          if ($role == '24'){
              $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg_ugd(array($FS_RG)));
            }
        else{   
            $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg(array($FS_RG)));
           }

   
        //$this->smarty->assign("rs_lab", $this->m_cppt->get_cppt_by_rg($FS_RG));
        //$this->smarty->assign("rs_rad", $this->m_cppt->get_cppt_by_rg($FS_RG));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function edit($FS_RG = '') {
        // set page rules
        $this->_set_page_rule("C");
        // var_dump($this->com_user['fs_kd_layanan']);
        // die;

        // set template content
        $this->smarty->assign("template_content", "operasi/booking_operasi/edit.html");
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

         $x = $this->com_user['user_name'];
          $this->smarty->assign("x", $x);  
   
          $this->smarty->assign("dokters", $this->m_dokter->getDokterBedah());
          $this->smarty->assign("ruangan", $this->m_ruangan_operasi->getRuangOperasi());


          if ($role == '24'){
              $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg_ugd(array($FS_RG)));
            }
        else{   
            $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg(array($FS_RG)));
        }
        
        $this->smarty->assign("bookings", $this->m_booking_operasi->BookingOperasiByNoReg(array($FS_RG)));

        
        //   var_dump($this->m_booking_operasi->BookingOperasiByNoReg(array($FS_RG)));
        //   die;
   
        //$this->smarty->assign("rs_lab", $this->m_cppt->get_cppt_by_rg($FS_RG));
        //$this->smarty->assign("rs_rad", $this->m_cppt->get_cppt_by_rg($FS_RG));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function add_process() {
        // set page rules
        $this->_set_page_rule("C");

        // var_dump('ok');
        // die;
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
        $this->tnotification->set_rules('kode_dokter', 'kode dokter', 'trim|required');

        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('ruangan_id'),
                $this->input->post('kode_dokter'),
                $this->input->post('tanggal'),
                $this->input->post('jam_mulai'),
                $this->input->post('jam_selesai'),
                $this->input->post('nama_tindakan'),
                '0',
                $this->com_user['user_id'],
                $this->com_user['user_id'],
                date('Y-m-d H:i:s'),
                date('Y-m-d H:i:s'),
         
            );


            // var_dump($params);
            // die;
            $this->m_booking_operasi->insert($params);

            $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            redirect("operasi/booking_operasi");
        }

        else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
            redirect("operasi/booking_operasi");
        }
    }

    public function update_process() {
        // set page rules
        $this->_set_page_rule("C");

        // var_dump('ok');
        // die;
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
        $this->tnotification->set_rules('kode_dokter', 'kode dokter', 'trim|required');

        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('ruangan_id'),
                $this->input->post('kode_dokter'),
                $this->input->post('tanggal'),
                $this->input->post('jam_mulai'),
                $this->input->post('jam_selesai'),
                $this->input->post('nama_tindakan'),
                $this->com_user['user_id'],
                date('Y-m-d H:i:s'),
                $this->input->post('FS_KD_REG')
                
         
            );


            // var_dump($params);
            // die;
            $this->m_booking_operasi->update($params);

            $this->tnotification->sent_notification("success", "Detail berhasil update");
            redirect("operasi/booking_operasi");
        }

        else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
            redirect("operasi/booking_operasi");
        }
    }


}
