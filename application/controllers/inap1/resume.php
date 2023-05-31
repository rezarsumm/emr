<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class resume extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_resume');
        $this->load->model('m_rawat_inap');
        $this->load->model('m_rawat_jalan');
        $this->load->model('m_ass_jatuh');
        $this->load->model('m_ass_awal');
        // load library
        $this->load->library('tnotification');
        $this->load->library('pagination');
        $this->load->library('datetimemanipulation');
        $this->load->library('tupload');
        //$this->load->library('twhatsapp');
        $this->smarty->assign('dtm', $this->datetimemanipulation);
        $this->smarty->assign('m_resume', $this->m_resume);
    }

    // tambah surat masuk
    public function index() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/resume/list.html");
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

        if($fs_kd_layanan == 'MNA')
        {
              $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_mina());
        }

        else{
           if ($role == '6' || $role == '11'   || $role == '23' || $role == '9' || $role == '8' || $role == '17' || $role == '13') {
                 $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_bangsal());
            }  

   else  if ($role == '5') {
                 $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_bangsal($x));
            } 
              else if ($role == '23'){
                $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_bangsal(array($date, $date2, $date, $date, $date, $date, $date, $date, $date, $date, $date)));
            
            }
         else {
                $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_bangsal_by_bangsal(array($this->com_user['fs_kd_layanan'])));
            }
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
        $this->smarty->assign("template_content", "inap/resume/list_his.html");
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
        $cek = $this->m_resume->cek_resume(array($FS_RG2));
        if ($cek == '0') {
            redirect("inap/resume/add/" . $FS_RG2);
        } elseif ($cek >= '1') {
            redirect("inap/resume/edit/" . $FS_RG2);
        }
    }
    
    public function cari_process_cppt($FS_RG2="") {
        $cek = $this->m_resume->cek_resume(array($FS_RG2));
        if ($cek == '0') {
            redirect("inap/resume/add/" . $FS_RG2);
        } elseif ($cek >= '1') {
            redirect("inap/resume/edit/" . $FS_RG2);
        }
    }

    public function cari_process2() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_MR', 'No MR', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            // insert
            redirect("inap/resume/lists2/" . $this->input->post('FS_MR'));
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("inap/resume/cari2");
    }

    // tambah surat masuk
    public function lists($FS_MR = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/resume/list2.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        //$new_reg = number_format(347104100000000 + $FS_MR, 0, "", "");
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_resume->get_pasien_by_mr($FS_MR));
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
        $this->smarty->assign("template_content", "inap/resume/list2.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $new_reg = number_format(347104100000000 + $FS_MR, 0, "", "");
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_resume->get_pasien_by_mr($new_reg));
        //$this->smarty->assign("rs_resume", $this->m_resume->get_all_resume($new_reg));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function add($FS_RG = '') {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/resume/add.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_resume->get_pasien_by_rg(array($FS_RG)));
        $this->smarty->assign("rs_obat", $this->m_resume->get_obat(array($FS_RG)));
        $this->smarty->assign("rs_layanan", $this->m_resume->get_layanan());
        $this->smarty->assign("result", $this->m_rawat_inap->get_data_medis_by_rg(array($FS_RG)));

        $this->smarty->assign("vs", $this->m_ass_awal->get_data_vs_by_rg(array($FS_RG)));

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function edit($FS_RG = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/resume/edit.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_resume->get_pasien_by_rg(array($FS_RG)));
        $this->smarty->assign("rs_resume", $this->m_resume->get_resume_by_rg(array($FS_RG)));
        $this->smarty->assign("rs_layanan", $this->m_resume->get_layanan());
        // get instansi tujuan 
        $tujuan = $this->m_resume->get_diet_by_rg($FS_RG);
        $tujuan_str = "";
        foreach ($tujuan as $key => $value) {
            $tujuan_str .= "'" . $value['FS_KD_DIET'] . "',";
        }
        $this->smarty->assign('rs_tujuan', $tujuan_str);

        $tembusan = $this->m_resume->get_indikasi_dirawat_by_rg($FS_RG);
        $tembusan_str = "";
        foreach ($tembusan as $key => $value) {
            $tembusan_str .= "'" . $value['FS_KD_PARAM_INDIKASI_DIRAWAT'] . "',";
        }
        $this->smarty->assign('rs_tembusan', $tembusan_str);
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function add_terapi($FS_RG = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/resume/add_terapi.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_resume->get_pasien_by_rg(array($FS_RG)));
        $this->smarty->assign("terapi", $this->m_resume->get_terapi_by_rg(array($FS_RG)));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function edit_terapi($FS_KD_TERAPI = "", $FS_RG = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/resume/edit_terapi.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_resume->get_pasien_by_rg(array($FS_RG)));
        $this->smarty->assign("terapi", $this->m_resume->get_terapi_by_rg2(array($FS_KD_TERAPI)));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function edit_diag($FS_KD_DIAG_SEK = "", $FS_RG = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/resume/edit_diag.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_resume->get_pasien_by_rg(array($FS_RG)));
        $this->smarty->assign("diag", $this->m_resume->get_diag_by_rg2(array($FS_KD_DIAG_SEK)));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function edit_tindakan($FS_KD_TIND = "", $FS_RG = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/resume/edit_tindakan.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_resume->get_pasien_by_rg(array($FS_RG)));
        $this->smarty->assign("tindakan", $this->m_resume->get_tindakan_by_rg2(array($FS_KD_TIND)));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function add_diagnosis($FS_RG = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/resume/add_diagnosis.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_resume->get_pasien_by_rg(array($FS_RG)));
        $this->smarty->assign("diag", $this->m_resume->get_diag_by_rg(array($FS_RG)));
        $this->smarty->assign("tind", $this->m_resume->get_tind_by_rg(array($FS_RG)));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function selesai($FS_RG = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/resume/selesai.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_resume->get_pasien_by_rg(array($FS_RG)));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function verif($FS_RG = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/resume/verif.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_resume->get_pasien_by_rg(array($FS_RG)));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function add_terapi_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_NM_OBAT'),
                $this->input->post('FS_JML_OBAT'),
                $this->input->post('FS_DOSIS_OBAT'),
                $this->input->post('FS_FREK_OBAT'),
                $this->input->post('FS_CARA_PEM_OBAT'),
                $this->input->post('FS_KD_REG'),
                $this->com_user['user_id'],
                date('Y-m-d')
            );
            // insert
            if ($this->m_resume->insert_terapi($params)) {
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
        redirect("inap/resume/add_terapi/" . $this->input->post('FS_KD_REG'));
    }

    public function add_diagnosis_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('FS_NM_DIAG_SEK'),
                '-',
                $this->com_user['user_id'],
                date('Y-m-d')
            );
            // insert
            if ($this->m_resume->insert_diag_sek($params)) {
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
        redirect("inap/resume/add_diagnosis/" . $this->input->post('FS_KD_REG'));
    }

    public function add_tindakan_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('FS_NM_TIND'),
                '-',
                $this->com_user['user_id'],
                date('Y-m-d')
            );
            // insert
            if ($this->m_resume->insert_tind($params)) {
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
        redirect("inap/resume/add_diagnosis/" . $this->input->post('FS_KD_REG'));
    }

    // hapus process
    public function delete_process_terapi($FS_KD_TERAPI = "", $FS_KD_REG = "") {
        // set page rules
        $this->_set_page_rule("D");
        // insert
        if ($this->m_resume->delete_terapi($FS_KD_TERAPI)) {
            $this->tnotification->delete_last_field();
            $this->tnotification->sent_notification("success", "Data berhasil dihapus");
            // default redirect
            redirect("inap/resume/add_terapi/" . $FS_KD_REG);
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Data gagal dihapus");
        }
        // default redirect
        redirect("inap/resume/add_terapi/" . $FS_KD_REG);
    }

    // hapus process
    public function delete_process_diag($FS_KD_DIAG_SEK = "", $FS_KD_REG = "") {
        // set page rules
        $this->_set_page_rule("D");
        // insert
        if ($this->m_resume->delete_diag_sek($FS_KD_DIAG_SEK)) {
            $this->tnotification->delete_last_field();
            $this->tnotification->sent_notification("success", "Data berhasil dihapus");
            // default redirect
            redirect("inap/resume/add_diagnosis/" . $FS_KD_REG);
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Data gagal dihapus");
        }
        // default redirect
        redirect("inap/resume/add_diagnosis/" . $FS_KD_REG);
    }

    public function delete_process_tind($FS_KD_TIND = "", $FS_KD_REG = "") {
        // set page rules
        $this->_set_page_rule("D");
        // insert
        if ($this->m_resume->delete_tind($FS_KD_TIND)) {
            $this->tnotification->delete_last_field();
            $this->tnotification->sent_notification("success", "Data berhasil dihapus");
            // default redirect
            redirect("inap/resume/add_diagnosis/" . $FS_KD_REG);
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Data gagal dihapus");
        }
        // default redirect
        redirect("inap/resume/add_diagnosis/" . $FS_KD_REG);
    }

    public function selesai_process($FS_KD_REG = "") {
        // set page rules
        $this->_set_page_rule("D");
        // insert
        if ($this->m_resume->update_status($FS_KD_REG)) {
            //cek staus pulang
            $cekstatus = $this->m_resume->cek_status_pulang($FS_KD_REG);
            if ($cekstatus['FS_CARA_PULANG'] == '4') {
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Data berhasil disimpan");
                // default redirect
                redirect("inap/resume/add_ket_kematian/" . $FS_KD_REG);
            } else {
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Data berhasil disimpan");
                // default redirect
                redirect("inap/resume/selesai/" . $FS_KD_REG);
            }
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Data gagal disimpan");
        }
        // default redirect
        redirect("inap/resume/selesai/" . $FS_KD_REG);
    }

    public function verif_process() {
        // set page rules
        $this->_set_page_rule("D");
        // insert
        if ($this->m_resume->update_dokter(array($this->input->post('FS_VERIF_DOKTER'), $this->input->post('FS_KD_REG')))) {
            $this->tnotification->delete_last_field();
            $this->tnotification->sent_notification("success", "Data berhasil disimpan");
            // default redirect
            redirect("inap/resume/selesai/" . $this->input->post('FS_KD_REG'));
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Data gagal disimpan");
        }
        // default redirect
        redirect("inap/resume/selesai/" . $this->input->post('FS_KD_REG'));
    }

    // add data
    public function add_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process

        if ($this->tnotification->run() !== FALSE) { 
            $kontrol = $this->input->post('FD_TGL_KONTROL');
            $pulang = $this->input->post('FD_TGL_PULANG');
            if ((empty($kontrol)) || empty($pulang)) {
                $params = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FS_KELUHAN_UTAMA'),
                    $this->input->post('FS_INDIKASI_DIRAWAT'),
                    $this->input->post('FS_RIWAYAT_PENYAKIT'),
                    $this->input->post('FS_PEMERIKSAAN_FISIK'),
                    $this->input->post('FS_PEMERIKSAAN_PENUNJANG'),
                    $this->input->post('FS_TERAPI'),
                    $this->input->post('FS_HASIL_LAB'),
                    $this->input->post('FS_ALERGI'),
                    '-',
                    $this->input->post('FS_KD_LAYANAN'),
                    date('Y-m-d'),
                    $this->input->post('FS_JAM_KONTROL'),
                    $this->input->post('FS_DIAG_UTAMA'),
                    $this->input->post('FS_KEADAAN_UMUM_BAIK'),
                    $this->input->post('FS_KEADAAN_UMUM_MASIH_SAKIT'),
                    $this->input->post('FS_KEADAAN_UMUM_SESAK'),
                    $this->input->post('FS_KEADAAN_UMUM_PUCAT'),
                    $this->input->post('FS_KEADAAN_UMUM_LEMAH'),
                    $this->input->post('FS_KEADAAN_UMUM_LAIN'),
                    $this->input->post('FS_SUHU'),
                    $this->input->post('FS_NADI'),
                    $this->input->post('FS_R'),
                    $this->input->post('FS_TD'),
                    '-',
                    $this->input->post('FS_CARA_PULANG'),
                    '0',
                    $this->input->post('FS_MR'),
                    $this->input->post('FS_PEM_FISIK1'),
                    $this->input->post('FS_PEM_FISIK2'),
                    $this->input->post('FS_PEM_FISIK3'),
                    $this->input->post('FS_PEM_FISIK4'),
                    $this->input->post('FS_PEM_FISIK5'),
                    $this->input->post('FS_PEM_FISIK6'),
                    $this->input->post('FS_PEM_FISIK7'),
                    $this->input->post('FS_PEM_FISIK8'),
                    $this->input->post('FS_INSTRUKSI1'),
                    $this->input->post('FS_INSTRUKSI2'),
                    $this->input->post('FS_INSTRUKSI3'),
                    $this->input->post('FS_INSTRUKSI4'),
                    $this->input->post('FS_INSTRUKSI5'),
                    $this->input->post('FS_SUHU1'),
                    $this->input->post('FS_NADI1'),
                    $this->input->post('FS_R1'),
                    $this->input->post('FS_TD1'),
                    date('Y-m-d'),
                    $this->input->post('FS_KD_LAYANAN2'),
                    date('Y-m-d'),
                    $this->input->post('FS_JAM_KONTROL2'),
                    $this->input->post('FS_KET_INDIKASI'),
                    $this->input->post('FS_KET_KONTROL'),
                    $this->input->post('FS_KET_KONTROL2'),
                    $this->input->post('FS_KET_CARA_PULANG'),
                    $this->com_user['user_name'],
                    date('Y-m-d'),
                    date('H:i:s')
                );
            } else {
                $params = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FS_KELUHAN_UTAMA'),
                    $this->input->post('FS_INDIKASI_DIRAWAT'),
                    $this->input->post('FS_RIWAYAT_PENYAKIT'),
                    $this->input->post('FS_PEMERIKSAAN_FISIK'),
                    $this->input->post('FS_PEMERIKSAAN_PENUNJANG'),
                    $this->input->post('FS_TERAPI'),
                    $this->input->post('FS_HASIL_LAB'),
                    $this->input->post('FS_ALERGI'),
                    '-',
                    $this->input->post('FS_KD_LAYANAN'),
                    $this->input->post('FD_TGL_KONTROL'),
                    $this->input->post('FS_JAM_KONTROL'),
                    $this->input->post('FS_DIAG_UTAMA'),
                    $this->input->post('FS_KEADAAN_UMUM_BAIK'),
                    $this->input->post('FS_KEADAAN_UMUM_MASIH_SAKIT'),
                    $this->input->post('FS_KEADAAN_UMUM_SESAK'),
                    $this->input->post('FS_KEADAAN_UMUM_PUCAT'),
                    $this->input->post('FS_KEADAAN_UMUM_LEMAH'),
                    $this->input->post('FS_KEADAAN_UMUM_LAIN'),
                    $this->input->post('FS_SUHU'),
                    $this->input->post('FS_NADI'),
                    $this->input->post('FS_R'),
                    $this->input->post('FS_TD'),
                    '-',
                    $this->input->post('FS_CARA_PULANG'),
                    '0',
                    $this->input->post('FS_MR'),
                    $this->input->post('FS_PEM_FISIK1'),
                    $this->input->post('FS_PEM_FISIK2'),
                    $this->input->post('FS_PEM_FISIK3'),
                    $this->input->post('FS_PEM_FISIK4'),
                    $this->input->post('FS_PEM_FISIK5'),
                    $this->input->post('FS_PEM_FISIK6'),
                    $this->input->post('FS_PEM_FISIK7'),
                    $this->input->post('FS_PEM_FISIK8'),
                    $this->input->post('FS_INSTRUKSI1'),
                    $this->input->post('FS_INSTRUKSI2'),
                    $this->input->post('FS_INSTRUKSI3'),
                    $this->input->post('FS_INSTRUKSI4'),
                    $this->input->post('FS_INSTRUKSI5'),
                    $this->input->post('FS_SUHU1'),
                    $this->input->post('FS_NADI1'),
                    $this->input->post('FS_R1'),
                    $this->input->post('FS_TD1'),
                    $this->input->post('FD_TGL_PULANG'),
                    $this->input->post('FS_KD_LAYANAN2'),
                    $this->input->post('FD_TGL_KONTROL2'),
                    $this->input->post('FS_JAM_KONTROL2'),
                    $this->input->post('FS_KET_INDIKASI'),
                    $this->input->post('FS_KET_KONTROL'),
                    $this->input->post('FS_KET_KONTROL2'),
                    $this->input->post('FS_KET_CARA_PULANG'),
                    $this->com_user['user_id'],
                    date('Y-m-d'),
                    date('H:i:s')
                );
            }

            // insert
            if ($this->m_resume->insert($params)) {

                if($this->com_user['role_nm']=='Dokter'){
                    $kd_dokter=$this->com_user['user_name'];
                    $this->m_resume->update_dokter2($kd_dokter,$this->input->post('FS_KD_REG'));
                }

                
                $tujuan = $this->input->post('tujuan');
                $tembusan = $this->input->post('tembusan');
                if (!empty($tujuan)) {
                    foreach ($tujuan as $value) {
                        $this->m_resume->insert_diet(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
                if (!empty($tembusan)) {
                    foreach ($tembusan as $value) {
                        $this->m_resume->insert_indikasi_rawat(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
                $params3 = array(
                    $this->input->post('FS_KD_REG'),
                    '1',
                    '13',
                    $this->com_user['user_id'],
                    date('Y-m-d')
                );
                $this->m_resume->insert_status($params3);

                $no_skdp = $this->m_resume->get_no_skdp(array(date('m')));
                if (is_null($no_skdp['NOSKDP'])) {
                    $no_skdp['NOSKDP'] = '0';
                }
                $SKDP = $no_skdp['NOSKDP'] + 1;

                $params4 = array(
                    $this->input->post('FS_KD_REG'),
                    '',
                    '',
                    '',
                    '',
                    $SKDP,
                    $this->com_user['user_name'],
                    date('Y-m-d'),
                    date('H:i:s')
                );
                $this->m_resume->insert_tac_rj_skdp($params4);
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
        redirect("inap/resume/add_diagnosis/" . $this->input->post('FS_KD_REG'));
    }

    public function edit_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KELUHAN_UTAMA'),
                $this->input->post('FS_INDIKASI_DIRAWAT'),
                $this->input->post('FS_RIWAYAT_PENYAKIT'),
                $this->input->post('FS_PEMERIKSAAN_FISIK'),
                $this->input->post('FS_PEMERIKSAAN_PENUNJANG'),
                $this->input->post('FS_TERAPI'),
                $this->input->post('FS_HASIL_LAB'),
                $this->input->post('FS_ALERGI'),
                '-',
                $this->input->post('FS_KD_LAYANAN'),
                $this->input->post('FD_TGL_KONTROL'),
                $this->input->post('FS_JAM_KONTROL'),
                $this->input->post('FS_DIAG_UTAMA'),
                $this->input->post('FS_KEADAAN_UMUM_BAIK'),
                $this->input->post('FS_KEADAAN_UMUM_MASIH_SAKIT'),
                $this->input->post('FS_KEADAAN_UMUM_SESAK'),
                $this->input->post('FS_KEADAAN_UMUM_PUCAT'),
                $this->input->post('FS_KEADAAN_UMUM_LEMAH'),
                $this->input->post('FS_KEADAAN_UMUM_LAIN'),
                $this->input->post('FS_SUHU'),
                $this->input->post('FS_NADI'),
                $this->input->post('FS_R'),
                $this->input->post('FS_TD'),
                '-',
                $this->input->post('FS_CARA_PULANG'),
                '0',
                $this->input->post('FS_MR'),
                $this->input->post('FS_PEM_FISIK1'),
                $this->input->post('FS_PEM_FISIK2'),
                $this->input->post('FS_PEM_FISIK3'),
                $this->input->post('FS_PEM_FISIK4'),
                $this->input->post('FS_PEM_FISIK5'),
                $this->input->post('FS_PEM_FISIK6'),
                $this->input->post('FS_PEM_FISIK7'),
                $this->input->post('FS_PEM_FISIK8'),
                $this->input->post('FS_INSTRUKSI1'),
                $this->input->post('FS_INSTRUKSI2'),
                $this->input->post('FS_INSTRUKSI3'),
                $this->input->post('FS_INSTRUKSI4'),
                $this->input->post('FS_INSTRUKSI5'),
                $this->input->post('FS_SUHU1'),
                $this->input->post('FS_NADI1'),
                $this->input->post('FS_R1'),
                $this->input->post('FS_TD1'),
                $this->input->post('FD_TGL_PULANG'),
                $this->input->post('FS_KD_LAYANAN2'),
                $this->input->post('FD_TGL_KONTROL2'),
                $this->input->post('FS_JAM_KONTROL2'),
                $this->input->post('FS_KET_INDIKASI'),
                $this->input->post('FS_KET_KONTROL'),
                $this->input->post('FS_KET_KONTROL2'),
                $this->input->post('FS_KET_CARA_PULANG'),
                $this->com_user['user_id'],
                date('Y-m-d'),
                date('H:i:s'),
                $this->input->post('FS_KD_REG')
            );
            // insert
            if ($this->m_resume->update($params)) {

                if($this->com_user['role_nm']=='Dokter'){
                    $kd_dokter=$this->com_user['user_name'];
                    $this->m_resume->update_dokter2($kd_dokter,$this->input->post('FS_KD_REG'));
                }

                $tujuan = $this->input->post('tujuan');
                $this->m_resume->delete_diet($this->input->post('FS_KD_REG'));
                if (!empty($tujuan)) {
                    foreach ($tujuan as $value) {
                        $this->m_resume->insert_diet(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
                $tembusan = $this->input->post('tembusan');
                $this->m_resume->delete_indikasi($this->input->post('FS_KD_REG'));
                if (!empty($tembusan)) {
                    foreach ($tembusan as $value) {
                        $this->m_resume->insert_indikasi_rawat(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
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
        redirect("inap/resume/add_diagnosis/" . $this->input->post('FS_KD_REG'));
    }

    public function edit_terapi_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        $this->tnotification->set_rules('FS_KD_TERAPI', 'KODE TERAPI', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_NM_OBAT'),
                $this->input->post('FS_JML_OBAT'),
                $this->input->post('FS_DOSIS_OBAT'),
                $this->input->post('FS_FREK_OBAT'),
                $this->input->post('FS_CARA_PEM_OBAT'),
                $this->input->post('FS_KD_TERAPI')
            );
            // insert
            if ($this->m_resume->update_terapi($params)) {
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
        redirect("inap/resume/add_terapi/" . $this->input->post('FS_KD_REG'));
    }

    public function edit_diag_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        $this->tnotification->set_rules('FS_KD_DIAG_SEK', 'KODE DIAGNOSIS', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_NM_DIAG_SEK'),
                $this->input->post('FS_KD_DIAG_SEK')
            );
            // insert
            if ($this->m_resume->update_diagnosis($params)) {
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
        redirect("inap/resume/add_diagnosis/" . $this->input->post('FS_KD_REG'));
    }

    public function edit_tindakan_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        $this->tnotification->set_rules('FS_KD_TIND', 'KODE TINDAKAN', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_NM_TIND'),
                $this->input->post('FS_KD_TIND')
            );
            // insert
            if ($this->m_resume->update_tindakan($params)) {
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
        redirect("inap/resume/add_diagnosis/" . $this->input->post('FS_KD_REG'));
    }

    
    public function add_ket_kematian($FS_RG = '') {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/resume/add_ket_kematian.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_resume->get_pasien_by_rg(array($FS_RG))); 
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }
    
    public function add_ket_kematian_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG',  'trim|required');
        $this->tnotification->set_rules('FS_SEBAB_KEMATIAN',  'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_SEBAB_KEMATIAN'),
                $this->input->post('FS_KD_REG')
            );
            // insert
            if ($this->m_resume->update_ket_kematian($params)) {
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
        redirect("inap/resume/selesai/" . $this->input->post('FS_KD_REG'));
    }
    public function list_dokter() {
        $id = $this->input->post('poli');
        $rs_dokter = $this->m_resume->get_daftar_dokter($id);
        $data .= "<option>--Pilih Data--</option>";
        foreach ($rs_dokter as $dokter) {
            $data.= '<option value="' . $dokter['fs_kd_peg'] . '">' . $dokter['fs_nm_peg'] . '</option>';
        }
        echo $data;
    }

    public function list_jadwal() {
        $id = $this->input->post('dokter');
        $hari_ini = date("Y-m-d");
        $next_day = date('Y-m-d', strtotime("+1 days"));
        $tgl_terakhir = date('Y-m-d', strtotime('+90 days', strtotime($hari_ini)));
        ;
        $rs_jadwal = $this->m_resume->get_daftar_jadwal(array($next_day, $tgl_terakhir, $id));
        $data .= "<option>--Pilih Data--</option>";
        foreach ($rs_jadwal as $jadwal) {
            $data.= '<option value="' . $jadwal['fs_nm_hari'] . '">' . $jadwal['fs_nm_hari'] . '/' . $jadwal['fd_tgl'] . '</option>';
        }
        echo $data;
    }

    // list_users
    public function list_diet() {
        $instansi = $this->m_resume->get_all_diet();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['FS_NM_DIET'],
                'value' => $value['FS_KD_DIET']
            );
            $i++;
        }
        echo json_encode($data);
    }

    // list_users
    public function indikasi_dirawat() {
        $instansi = $this->m_resume->get_indikasi_dirawat();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['FS_NM_INDIKASI_DIRAWAT'],
                'value' => $value['FS_KD_PARAM_INDIKASI_DIRAWAT']
            );
            $i++;
        }
        echo json_encode($data);
    }

}
