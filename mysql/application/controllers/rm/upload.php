<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class upload extends ApplicationBase {

// constructor
    public function __construct() {
// parent constructor
        parent::__construct();
// load model
        $this->load->model('m_upload');
        $this->load->library('tnotification');
    }

// list surat masuk
    public function index() {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "rm/upload/index.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $search = $this->tsession->userdata('rm_upload_berkas');
        if (!empty($search)) {
            $this->smarty->assign("search", $search);
        }
        if (empty($search['FS_MR'])) {
            $search['FS_MR'] = '347104100000000';
            $this->smarty->assign("search", $search);
        }
        $this->smarty->assign("FS_MR", $search['FS_MR']);
        // search parameters
        $FS_MR = empty($search['FS_MR']) ? : '%' . $search['FS_MR'] . '%';
// get search parameter
        $this->smarty->assign("rs_pasien", $this->m_upload->get_px_history(array($FS_MR)));
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
            $this->tsession->unset_userdata("rm_upload_berkas");
        } else {
            $params = array(
                "FS_MR" => $this->input->post("FS_MR")
            );
            $this->tsession->set_userdata("rm_upload_berkas", $params);
        }
        // redirect
        redirect("rm/upload");
    }

    public function add($FS_KD_REG = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "rm/upload/add.html");
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

    public function add_process() {
        // set page rules
        $this->_set_page_rule("C");
        // load
        $this->load->library('tupload');
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'Nomor Register', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            if (!empty($_FILES['att_name']['tmp_name'])) {
                $name = $_FILES['att_name']['name'];
                $filename = preg_replace('/\s+/', '_', $name);
                $filesize = $_FILES['att_name']['size'];
                $config['upload_path'] = 'resource/doc/rm/';
                $config['allowed_types'] = 'pdf';
                $this->tupload->initialize($config);
                //process upload
                if ($this->tupload->do_upload('att_name')) {
                    $data = $this->tupload->data();
                    $params = array(
                        $this->input->post('FS_KD_REG'),
                        $this->input->post('FS_JENIS_BERKAS'),
                        $filename,
                        $filesize,
                        $this->com_user['user_id'],
                        date('Y-m-d')
                    );
                    // update
                    $this->m_upload->insert($params);
                    // notification
                } else {
                    // jika gagal
                    $this->tnotification->set_error_message($this->tupload->display_errors());
                }
            }
            $this->tnotification->delete_last_field();
            $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("rm/upload/add/".$this->input->post('FS_KD_REG'));
    }
     public function delete_process($FS_KD_TRS='',$FS_KD_REG='') {
        // set page rules
        $this->_set_page_rule("D");
        // cek input
       // $this->tnotification->set_rules('masuk_id', 'ID Surat', 'trim|required');
        // process
        //if ($this->tnotification->run() !== FALSE) {
            $params = array($FS_KD_TRS);
            // insert
            if ($this->m_upload->delete($params)) {
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Data berhasil dihapus");
                // default redirect
                redirect("rm/upload/add/".$FS_KD_REG);
            } else {
                // default error
                $this->tnotification->sent_notification("error", "Data gagal dihapus");
            }
        //} else {
            // default error
            $this->tnotification->sent_notification("error", "Data gagal dihapus");
       // }
        // default redirect
        redirect("rm/upload/add/".$FS_KD_REG);
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
