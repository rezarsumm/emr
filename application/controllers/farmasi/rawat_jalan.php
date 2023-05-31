<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class rawat_jalan extends ApplicationBase {

// constructor
    public function __construct() {
// parent constructor
        parent::__construct();
// load model
        $this->load->model('m_rawat_jalan');
        $this->load->model('m_farmasi');
        $this->smarty->assign('m_rawat_jalan', $this->m_rawat_jalan);
        $this->load->library('tnotification');
    }

// list surat masuk
    public function index() {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "farmasi/rawat_jalan/index.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $search = $this->tsession->userdata('farmasi_rawat_jalan');
        if (!empty($search)) {
            $this->smarty->assign("search", $search);
        }
        if (empty($search['FS_KD_REG'])) {
            $search['FS_KD_REG'] = 'RG00000000';
            $this->smarty->assign("search", $search);
        }
        $this->smarty->assign("FS_KD_REG", $search['FS_KD_REG']);
        // search parameters
        $FS_KD_REG = empty($search['FS_KD_REG']) ? : $search['FS_KD_REG'];
        $now = date('Y-m-d');
// get search parameter
        $this->smarty->assign("rs_pasien2", $this->m_rawat_jalan->get_px_rj($now));
        $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_px_by_farmasi(array($FS_KD_REG)));
        //$this->smarty->assign("rs_pasien2", $this->m_rawat_jalan->get_px_by_dokter_finish_perawat2(array($now, $FS_KD_PEG,$now)));
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
            $this->tsession->unset_userdata("farmasi_rawat_jalan");
        } else {
            $params = array(
                "FS_KD_REG" => $this->input->post("FS_KD_REG")
            );
            $this->tsession->set_userdata("farmasi_rawat_jalan", $params);
        }
        // redirect
        redirect("farmasi/rawat_jalan");
    }

    public function index2() {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "farmasi/rawat_jalan/index2.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $search = $this->tsession->userdata('farmasi_rawat_jalan');
        if (!empty($search)) {
            $this->smarty->assign("search", $search);
        }
        if (empty($search['FS_KD_REG'])) {
            $search['FS_KD_REG'] = 'RG00000000';
            $this->smarty->assign("search", $search);
        }
        $this->smarty->assign("FS_KD_REG", $search['FS_KD_REG']);
        // search parameters
        $FS_KD_REG = empty($search['FS_KD_REG']) ? : $search['FS_KD_REG'];
        $now = date('Y-m-d');
// get search parameter
        $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_px_by_farmasi(array($FS_KD_REG)));
        //$this->smarty->assign("rs_pasien2", $this->m_rawat_jalan->get_px_by_dokter_finish_perawat(array($now, $FS_KD_PEG)));
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }

    public function proses_cari2() {
        //set page rules
        $this->_set_page_rule("R");
        //data
        if ($this->input->post('save') == "Reset") {
            $this->tsession->unset_userdata("farmasi_rawat_jalan");
        } else {
            $params = array(
                "FS_KD_REG" => $this->input->post("FS_KD_REG")
            );
            $this->tsession->set_userdata("farmasi_rawat_jalan", $params);
        }
        // redirect
        redirect("farmasi/rawat_jalan/index2");
    }

     public function history($FS_MR = "", $FS_KD_PEG = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "farmasi/rawat_jalan/history.html");
        $this->smarty->load_javascript('resource/js/jquery.datatables/jquery.dataTables.js');
        $this->smarty->load_javascript('resource/js/jquery.datatables/dataTables.fixedHeader.js');
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->load_style("jquery.ui/datatables/jquery.dataTables.css");
// load javascript
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-1.9.2.custom.min.js');
// get search parameter
        $now = date('Y-m-d');
        $medis = $FS_KD_PEG;
        $this->smarty->assign("no", '1');
        $this->smarty->assign("FS_KD_MEDIS", $FS_KD_PEG);
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rm(array($now, $FS_MR)));
        $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_px_history(array($now, $medis, $medis, $medis, $FS_MR)));

//$this->smarty->assign("form", $this->m_rawat_jalan->get_px_form(array($now, $medis, $medis, $medis, $FS_MR)));
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }
    
    public function add($FS_KD_REG = "", $FS_KD_MEDIS = "", $FS_JNS_ASESMEN = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "farmasi/rawat_jalan/add.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG, $FS_KD_MEDIS, $FS_KD_MEDIS, $FS_KD_MEDIS)));
        $this->smarty->assign("rs_resep", $this->m_farmasi->get_resep_by_rg(array($FS_KD_REG)));
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }
    
    public function list_copy_resep() {
        $params = array(
            $this->input->post('FS_KD_REG2')
        );
        // insert
        $data = $this->m_farmasi->get_copy_resep($params);
        echo json_encode($data);
    }
    
    public function QtyBarang() {
        $FS_KD_REG = $this->input->post('FS_KD_REG2');
        $FS_KD_BARANG = $this->input->post('FS_KD_BARANG');
        $data = $this->m_farmasi->get_qty_barang(array($FS_KD_REG,$FS_KD_BARANG));
        echo json_encode($data);
    }
    
    public function add_process() {
        $params = array(
            $this->input->post('FS_KD_REG'),
            $this->input->post('FS_KD_BARANG'),
            $this->input->post('FN_QTY_BARANG'),
            $this->input->post('FS_KD_SATUAN'),
            $this->input->post('FN_DET_ORIG'),
            $this->input->post('FN_DET'),
            $this->input->post('FN_NEDET'),
            $this->input->post('FS_KETERANGAN'),
            $this->com_user['user_id'],
            date('Y-m-d'),
        );
        // insert
        $data = $this->m_farmasi->insert($params);
        echo json_encode($data);
    }
    
    public function delete_process() {
        $params = array(
            $this->input->post('kode')
        );
        // insert
        $data = $this->m_farmasi->delete($params);
        echo json_encode($data);
    }
}
