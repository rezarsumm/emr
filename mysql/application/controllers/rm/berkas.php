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
        $this->load->model('m_rawat_jalan');
        $this->smarty->assign('m_rawat_jalan', $this->m_rawat_jalan);
        $this->smarty->assign('m_rm', $this->m_rm);
        $this->load->library('tnotification');
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
            $search['FS_MR'] = '';
            $this->smarty->assign("search", $search);
        }
        $this->smarty->assign("FS_MR", $search['FS_MR']);
         if (empty($search['FS_KD_JENIS_REG'])) {
            $search['FS_KD_JENIS_REG'] = "%0%";
            $this->smarty->assign("search", $search);
        }
        // search parameters
        $new_reg = number_format(347104100000000 + $search['FS_MR'], 0, "", "");
        $FS_MR = empty($new_reg) ? : $new_reg;
        $FS_KD_JENIS_REG = empty($search['FS_KD_JENIS_REG']) ? :  '%' .$search['FS_KD_JENIS_REG'].'%';
        $this->smarty->assign("now", date('Y-m-d'));
// get search parameter
        $this->smarty->assign("result", $this->m_rm->get_data_px_by_rm(array($FS_MR)));
        
        if($FS_KD_JENIS_REG=='%1%'){
            $this->smarty->assign("rs_pasien", $this->m_rm->get_px_history_ri(array($FS_MR)));
        }else{
        $this->smarty->assign("rs_pasien", $this->m_rm->get_px_history2(array($FS_MR,$FS_KD_JENIS_REG)));
        }
        
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
        $this->smarty->assign("template_content", "rm/berkas/detail.html");
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
        //$this->smarty->assign("rs_pasien", $this->m_rm->get_px_history(array($FS_MR)));
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
