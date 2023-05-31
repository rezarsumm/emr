<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class sehat extends ApplicationBase {

// constructor
    public function __construct() {
// parent constructor
        parent::__construct();
// load model
        
        $this->load->model('m_rawat_jalan');
        $this->load->model('m_surat_sehat');
        $this->smarty->assign('m_surat_sehat', $this->m_surat_sehat);
        $this->load->library('tnotification');
    }
    
// list surat masuk
    public function index() {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "surat/sehat/index.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $search = $this->tsession->userdata('surat_medis');
        if (!empty($search)) {
            $this->smarty->assign("search", $search);
        }
        if (empty($search['FS_KD_PEG'])) {
            $search['FS_KD_PEG'] = $this->com_user['user_name'];
            $this->smarty->assign("search", $search);
        }
        if (empty($search['FD_TGL_MASUK'])) {
            $search['FD_TGL_MASUK'] = date('Y-m-d');
            $this->smarty->assign("search", $search);
        }
        $this->smarty->assign("FS_KD_PEG", $search['FS_KD_PEG']);
        $this->smarty->assign("FD_TGL_MASUK", $search['FD_TGL_MASUK']);
        // search parameters
        $FD_TGL_MASUK = empty($search['FD_TGL_MASUK']) ? : $search['FD_TGL_MASUK'];
        $FS_KD_PEG = empty($search['FS_KD_PEG']) ? : $search['FS_KD_PEG'];
        $now = date('Y-m-d');
// get search parameter
        $this->smarty->assign("rs_dokter", $this->m_rawat_jalan->get_dokter());
        $this->smarty->assign("rs_pasien", $this->m_surat_sehat->get_px_by_dokter_wait(array($FD_TGL_MASUK, $FS_KD_PEG, $FS_KD_PEG, $FS_KD_PEG)));
        //$this->smarty->assign("rs_pasien2", $this->m_rawat_jalan->get_px_by_dokter_finish_perawat(array($now, $FS_KD_PEG)));
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
            $this->tsession->unset_userdata("surat_medis");
        } else {
            $params = array(
                "FD_TGL_MASUK" => $this->input->post("FD_TGL_MASUK"),
                "FS_KD_PEG" => $this->input->post("FS_KD_PEG")
            );
            $this->tsession->set_userdata("surat_medis", $params);
        }
        // redirect
        redirect("surat/sehat");
    }
    
     public function add($FS_KD_REG = "", $FS_KD_MEDIS = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "surat/sehat/add.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG, $FS_KD_MEDIS, $FS_KD_MEDIS, $FS_KD_MEDIS)));
        $this->smarty->assign("FS_KD_MEDIS", $FS_KD_MEDIS);
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }
    
     public function add_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $data_surat = $this->m_surat_sehat->get_no_surat();
            $NOSURAT = 'SK' . $data_surat['SURAT'];
            $NOSURAT2 = $data_surat['SURAT'] + 1;
            $params = array(
                $NOSURAT,
                date('Y-m-d'),
                date('H:i:s'),
                '4',
                $NOSURAT.'/'.date('m').'/'.date('Y'),
                $this->input->post('FS_KD_REG'),
                $this->input->post('FS_KD_MEDIS'),
                $this->input->post('FS_KETERANGAN1'),
                $this->input->post('FS_KETERANGAN2'),
                $this->input->post('FS_KETERANGAN3'),
                $this->input->post('FS_KETERANGAN4'),
                $this->input->post('FS_KETERANGAN5'),
                $this->com_user['user_name'],
                $this->input->post('FS_KD_MEDIS')
            );
            // insert
            if ($this->m_surat_sehat->insert($params)) {
                $this->m_surat_sehat->update_tz_parameter_no_surat(array($NOSURAT2));
                // notification
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            } else {
                // default error
                $this->tnotification->sent_notification("error", "Detail gagal disimpan");
            }
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("surat/sehat");
    }
    
     public function edit($FS_KD_TRS = "",$FS_KD_REG="") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "surat/jiwa/edit.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG, $FS_KD_MEDIS, $FS_KD_MEDIS, $FS_KD_MEDIS)));
        $this->smarty->assign("rs_surat", $this->m_surat->get_surat_by_trs(array($FS_KD_TRS)));
        $this->smarty->assign("FS_KD_MEDIS", $FS_KD_MEDIS);
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }
    
    public function edit_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_TRS', 'KODE TRANSAKSI', 'trim|required');
        $this->tnotification->set_rules('FS_KD_TRS', 'KODE TRANSAKSI', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                date('Y-m-d'),
                date('H:i:s'),
                '4',
                $NOSURAT.'/'.date('m').'/'.date('Y'),
                $this->input->post('FS_KD_REG'),
                $this->input->post('FS_KD_MEDIS'),
                $this->input->post('FS_KETERANGAN1'),
                $this->input->post('FS_KETERANGAN2'),
                $this->input->post('FS_KETERANGAN3'),
                $this->com_user['user_name'],
                $this->input->post('FS_KD_MEDIS'),
                $this->input->post('FS_KD_TRS')
            );
            // insert
            if ($this->m_surat->update($params)) {
                // notification
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            } else {
                // default error
                $this->tnotification->sent_notification("error", "Detail gagal disimpan");
            }
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("surat/jiwa");
    }
    
   public function surat_sehat($FS_KD_REG = "", $FS_KD_TRS = "") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d');
        $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG));
        $rs_pasien = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG));
        $data['rs_surat'] = $this->m_surat_sehat->get_surat_by_trs(array($FS_KD_TRS));
        $data['rs_lab'] = $this->m_rawat_jalan->get_data_lab_by_rg(array($FS_KD_REG));
        $data['rs_rad'] = $this->m_rawat_jalan->get_data_rad_by_rg(array($FS_KD_REG));
        $data["vs"] = $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG));
        ob_start();
        $this->load->view('surat/sehat/sehat', $data);
        $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output($rs_pasien['FS_NM_PASIEN'] . '.pdf');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }

}
