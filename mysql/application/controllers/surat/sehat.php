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
        if (empty($search['FD_TGL_MASUK'])) {
            $search['FD_TGL_MASUK'] = date('Y-m-d');
            $this->smarty->assign("search", $search);
        }

        if (empty($search['FN_JENIS_SURAT'])) {
            $search['FN_JENIS_SURAT'] = '';
            $this->smarty->assign("search", $search);
        }

        $this->smarty->assign("FD_TGL_MASUK", $search['FD_TGL_MASUK']);
        $this->smarty->assign("FN_JENIS_SURAT", $search['FN_JENIS_SURAT']);
        // search parameters
        $FD_TGL_MASUK = empty($search['FD_TGL_MASUK']) ? : $search['FD_TGL_MASUK'];
        $FN_JENIS_SURAT = empty($search['FN_JENIS_SURAT']) ? : $search['FN_JENIS_SURAT'];
        $now = date('Y-m-d');
// get search parameter
        $this->smarty->assign("no", 1);
        $this->smarty->assign("rs_pasien", $this->m_surat_sehat->get_list_px(array($FD_TGL_MASUK,$FN_JENIS_SURAT)));
        $this->smarty->assign("rs_jenis_surat", $this->m_surat_sehat->get_jenis_surat());

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
                "FN_JENIS_SURAT" => $this->input->post("FN_JENIS_SURAT")
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
        $this->smarty->assign("rs_jenis_surat", $this->m_surat_sehat->get_jenis_surat());
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
            $new_reg = number_format(100000000 + $this->input->post('FS_KD_REG'), 0, "", "");
            $RG = 'RG' . substr($new_reg, -8);
            $data_surat = $this->m_surat_sehat->get_no_surat();
            $NOSURAT = 'SK' . $data_surat['SURAT'];
            $NOSURAT2 = $data_surat['SURAT'] + 1;
            $this->m_surat_sehat->update_tz_parameter_no_surat(array($NOSURAT2));
            $params = array(
                $NOSURAT,
                date('Y-m-d'),
                date('H:i:s'),
                $this->input->post('FN_JENIS_SURAT'),
                $NOSURAT . '/' . date('m') . '/' . date('Y'),
                $RG,
                $this->com_user['user_name'],
                $this->input->post('FS_KD_MEDIS')
            );
            // insert
            if ($this->m_surat_sehat->insert($params)) {
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
        if($this->input->post('FN_JENIS_SURAT')=='100'){
            redirect("surat/sehat/add2/" . $NOSURAT.'/'.$RG);
        }elseif($this->input->post('FN_JENIS_SURAT')=='101'){
            redirect("surat/sehat/add_swab_rujukan/" . $NOSURAT.'/'.$RG);
        }elseif($this->input->post('FN_JENIS_SURAT')=='102'){
            redirect("surat/sehat/add3/" . $NOSURAT.'/'.$RG);
        }elseif($this->input->post('FN_JENIS_SURAT')=='103'){
            redirect("surat/sehat/");
        }elseif($this->input->post('FN_JENIS_SURAT')=='104'){
            redirect("surat/sehat/add_surat_rujukan_rs/" . $NOSURAT.'/'.$RG);
        }         
    }

    public function add2($NOSURAT = "",$FS_KD_REG="") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "surat/sehat/add2.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
// notification
        $this->smarty->assign("rs_pasien", $this->m_surat_sehat->get_pasien_by_rg($FS_KD_REG));
        $this->smarty->assign("rs_medis", $this->m_surat_sehat->get_dokter());
        $this->smarty->assign("FS_KD_TRS", $NOSURAT);

        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }

    public function add2_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_TRS', 'KODE TRANSAKSI', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_MEDIS'),
                $this->input->post('FD_TGL_KET1'),
                $this->input->post('FS_KETERANGAN1'),
                $this->input->post('FS_KETERANGAN2'),
                $this->input->post('FS_KD_TRS')
            );
            // insert
            if ($this->m_surat_sehat->update($params)) {
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

    public function add_swab_rujukan($NOSURAT = "",$FS_KD_REG="") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "surat/sehat/add_swab_rujukan.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
// notification
        $this->smarty->assign("rs_pasien", $this->m_surat_sehat->get_pasien_by_rg($FS_KD_REG));
        $this->smarty->assign("FS_KD_TRS", $NOSURAT);

        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }
    
    public function add_swab_rujuk_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_TRS', 'KODE TRANSAKSI', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FD_TGL_KET1'),
                $this->input->post('FS_KETERANGAN1'),
                $this->input->post('FS_KETERANGAN2'),
                $this->input->post('FS_KETERANGAN3'),
                $this->input->post('FS_KETERANGAN4'),
                $this->input->post('FS_KETERANGAN5'),
                $this->input->post('FS_KD_TRS')
            );
            // insert
            if ($this->m_surat_sehat->update_swab_rujukan($params)) {
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

    public function add3($NOSURAT = "",$FS_KD_REG="") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "surat/sehat/add3.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
// notification
        $this->smarty->assign("rs_pasien", $this->m_surat_sehat->get_pasien_by_rg($FS_KD_REG));
        $this->smarty->assign("FS_KD_TRS", $NOSURAT);

        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }

    public function add3_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_TRS', 'KODE TRANSAKSI', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FD_TGL_KET1'),
                $this->input->post('FD_TGL_KET2'),
                $this->input->post('FS_KETERANGAN1'),
                $this->input->post('FS_KETERANGAN2'),
                $this->input->post('FS_KD_TRS')
            );
            // insert
            if ($this->m_surat_sehat->update3($params)) {
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
    
    public function add_surat_rujukan_rs($NOSURAT = "",$FS_KD_REG="") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "surat/sehat/add_surat_rujukan_rs.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
// notification
        $this->smarty->assign("rs_pasien", $this->m_surat_sehat->get_pasien_by_rg($FS_KD_REG));
        $this->smarty->assign("rs_medis", $this->m_surat_sehat->get_dokter());
        $this->smarty->assign("FS_KD_TRS", $NOSURAT);

        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }

    public function add_surat_rujukan_rs_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_TRS', 'KODE TRANSAKSI', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_MEDIS'),
                $this->input->post('FS_KETERANGAN1'),
                $this->input->post('FS_KETERANGAN2'),
                $this->input->post('FS_KETERANGAN3'),
                $this->input->post('FS_KD_TRS')
            );
            // insert
            if ($this->m_surat_sehat->update_surat_rujukan_rs($params)) {
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

    public function edit($FS_KD_TRS = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "surat/sehat/edit.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("result", $this->m_surat_sehat->get_surat_by_trs(array($FS_KD_TRS)));
        $this->smarty->assign("rs_jenis_surat", $this->m_surat_sehat->get_jenis_surat());
        $this->smarty->assign("FS_KD_TRS", $FS_KD_TRS);
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
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('FN_JENIS_SURAT'),
                $this->input->post('FS_KD_TRS')
            );
            // insert
            if ($this->m_surat_sehat->update2($params)) {
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
        if($this->input->post('FN_JENIS_SURAT')=='100'){
            redirect("surat/sehat/edit2/" . $this->input->post('FS_KD_TRS').'/'.$this->input->post('FS_KD_REG'));
        }elseif($this->input->post('FN_JENIS_SURAT')=='101'){
            redirect("surat/sehat/edit_swab_rujukan/" . $this->input->post('FS_KD_TRS').'/'.$this->input->post('FS_KD_REG'));
        }elseif($this->input->post('FN_JENIS_SURAT')=='102'){
            redirect("surat/sehat/edit3/" . $this->input->post('FS_KD_TRS').'/'.$this->input->post('FS_KD_REG'));
        }elseif($this->input->post('FN_JENIS_SURAT')=='103'){
            redirect("surat/sehat/");
        }elseif($this->input->post('FN_JENIS_SURAT')=='104'){
            redirect("surat/sehat/edit_surat_rujukan_rs/" . $this->input->post('FS_KD_TRS').'/'.$this->input->post('FS_KD_REG'));
        }
        
    }

    public function edit2($FS_KD_TRS = "",$FS_KD_REG="") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "surat/sehat/edit2.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
// notification
        $this->smarty->assign("rs_pasien", $this->m_surat_sehat->get_pasien_by_rg($FS_KD_REG));
        $this->smarty->assign("result", $this->m_surat_sehat->get_surat_by_trs(array($FS_KD_TRS)));
        $this->smarty->assign("rs_medis", $this->m_surat_sehat->get_dokter());
        $this->smarty->assign("FS_KD_TRS", $FS_KD_TRS);

        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }

    public function edit2_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_TRS', 'KODE TRANSAKSI', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_MEDIS'),
                $this->input->post('FD_TGL_KET1'),
                $this->input->post('FS_KETERANGAN1'),
                $this->input->post('FS_KETERANGAN2'),
                $this->input->post('FS_KD_TRS')
            );
            // insert
            if ($this->m_surat_sehat->update($params)) {
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
    
    public function edit_swab_rujukan($FS_KD_TRS = "",$FS_KD_REG="") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "surat/sehat/edit_swab_rujukan.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
// notification
        $this->smarty->assign("rs_pasien", $this->m_surat_sehat->get_pasien_by_rg($FS_KD_REG));
        $this->smarty->assign("result", $this->m_surat_sehat->get_surat_by_trs(array($FS_KD_TRS)));
        $this->smarty->assign("FS_KD_TRS", $FS_KD_TRS);

        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }

    public function edit3($FS_KD_TRS = "",$FS_KD_REG="") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "surat/sehat/edit3.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
// notification
        $this->smarty->assign("rs_pasien", $this->m_surat_sehat->get_pasien_by_rg($FS_KD_REG));
        $this->smarty->assign("result", $this->m_surat_sehat->get_surat_by_trs(array($FS_KD_TRS)));
        $this->smarty->assign("FS_KD_TRS", $FS_KD_TRS);

        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    } 

    public function edit_surat_rujukan_rs($FS_KD_TRS = "",$FS_KD_REG="") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "surat/sehat/edit_surat_rujukan_rs.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
// notification
        $this->smarty->assign("rs_pasien", $this->m_surat_sehat->get_pasien_by_rg($FS_KD_REG));
        $this->smarty->assign("result", $this->m_surat_sehat->get_surat_by_trs(array($FS_KD_TRS)));
        $this->smarty->assign("rs_medis", $this->m_surat_sehat->get_dokter());
        $this->smarty->assign("FS_KD_TRS", $FS_KD_TRS);

        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }

    public function edit_surat_rujuk_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_TRS', 'KODE TRANSAKSI', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_MEDIS'),
                $this->input->post('FS_KETERANGAN1'),
                $this->input->post('FS_KETERANGAN2'),
                $this->input->post('FS_KETERANGAN3'),
                $this->input->post('FS_KD_TRS')
            );
            // insert
            if ($this->m_surat_sehat->update_surat_rujukan_rs($params)) {
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

    public function delete_process($FS_KD_TRS) {
        // set page rules
        $this->_set_page_rule("D");
        // cek input
        $params = array(
            $FS_KD_TRS
        );
        // insert
        if ($this->m_surat_sehat->delete($params)) {
            // notification
            $this->tnotification->delete_last_field();
            $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }

        // default redirect
        redirect("surat/sehat");
    }

    public function surat_sehat($FS_KD_TRS = "", $FS_KD_JNS_SURAT = "", $FS_KD_SURAT="") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');

        ob_start();
        $now = date('Y-m-d');
        $data['rs_surat'] = $this->m_surat_sehat->get_surat_by_trs(array($FS_KD_TRS));
        $data['rs_lab'] = $this->m_surat_sehat->get_lab_by_trs(array($FS_KD_TRS));

        //diagnosa
        $data['diagnosa'] = $this->m_surat_sehat->get_diagnosa_by_trs(array($FS_KD_TRS));

        //resep
        $data['rs_resep'] = $this->m_surat_sehat->get_resep_by_trs(array($FS_KD_TRS));
                
        //header
        $data["header1"] = $this->m_rawat_jalan->get_header1();
        $data["header2"] = $this->m_rawat_jalan->get_header2();
        $data["alamat"] = $this->m_rawat_jalan->get_alamat();

        if ($FS_KD_JNS_SURAT == '100') {
            $this->load->view('surat/sehat/swab_mandiri', $data);
        }elseif ($FS_KD_JNS_SURAT == '101') {
            $this->load->view('surat/sehat/swab_rujukan', $data);
        }elseif ($FS_KD_JNS_SURAT == '102') {
            $this->load->view('surat/sehat/selesai_karantina', $data);    
        } elseif ($FS_KD_JNS_SURAT == '103') {
            if($FS_KD_SURAT<>'1'){
                $this->load->view('surat/sehat/rapid_antibodi', $data);
            }else{
                $this->load->view('surat/sehat/rapid_antibodi2', $data);
            }
        }elseif ($FS_KD_JNS_SURAT == '104') {
            $this->load->view('surat/sehat/surat_rujukan_rs', $data);    
        }else {
            $this->load->view('surat/sehat/swab_mandiri', $data);
        }

        $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output($FS_KD_TRS . '.pdf','Fi');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }

}
