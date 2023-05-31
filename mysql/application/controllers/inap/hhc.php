<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class hhc extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_hhc');
        $this->load->model('m_ass_awal');
        // load library
        $this->load->library('tnotification');
        $this->smarty->assign('m_hhc', $this->m_hhc);
    }

    // tambah surat masuk
    public function index() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/hhc/list.html");
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
        if ($role == '12') {
            $this->smarty->assign("rs_pasien", $this->m_ass_awal->get_pasien_bangsal_by_bangsal(array($date, $date2, $this->com_user['fs_kd_layanan'])));
            //kby&firdaus
        } elseif ($role == '22') {
            $this->smarty->assign("rs_pasien", $this->m_ass_awal->get_pasien_bangsal_kby(array($date, $date2)));
          //vk & firdaus  
        } elseif ($role == '24') {
            $this->smarty->assign("rs_pasien", $this->m_ass_awal->get_pasien_bangsal_vk(array($date, $date2)));
        } elseif ($role == '27') {
            $this->smarty->assign("rs_pasien", $this->m_ass_awal->get_pasien_bangsal_covid(array($date, $date2)));
        } else {
            $this->smarty->assign("rs_pasien", $this->m_ass_awal->get_pasien_bangsal(array($date, $date2)));
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
        redirect("inap/hhc/add/" . $FS_RG2);
    }

    public function cari_process2() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_MR', 'No MR', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            // insert
            redirect("inap/cppt/lists2/" . $this->input->post('FS_MR'));
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("inap/cppt/cari2");
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
        // set template content
        $this->smarty->assign("template_content", "inap/hhc/add.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_hhc->get_pasien_by_rg(array($FS_RG)));
        $this->smarty->assign("rs_result", $this->m_hhc->get_hhc_by_rg(array($FS_RG)));
        //$this->smarty->assign("rs_intervensi", $this->m_hhc->get_hhc_intervensi_by_rg(array($FS_RG)));
        $this->smarty->assign("role_id", $this->com_user['role_id']);
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
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process

        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('FS_PARAM_1'),
                $this->input->post('FS_PARAM_2'),
                $this->input->post('FS_PARAM_3'),
                $this->input->post('FS_PARAM_4'),
                $this->input->post('FS_PARAM_5'),
                $this->input->post('FS_PARAM_6'),
                $this->input->post('FS_PARAM_7'),
                $this->com_user['user_name'],
                date('Y-m-d'),
                date('H:i:s')
            );
            // insert
            if ($this->m_hhc->insert($params)) {
                /* $lastid = $this->m_hhc->get_last_inserted_id();
                  //insert pemeriksaan lab
                  $int = $this->input->post('tujuan');
                  if (!empty($int)) {
                  foreach ($int as $key => $value) {
                  $this->m_hhc->insert_hhc_intervensi(array($lastid, $value));
                  }
              } */
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
    redirect("inap/hhc/add/" . $this->input->post('FS_KD_REG'));
}

public function add_evaluasi($FS_RG = '',$FS_KD_TRS='') {
        // set page rules
    $this->_set_page_rule("C");
        // set template content
    $this->smarty->assign("template_content", "inap/hhc/add_evaluasi.html");
        // load javascript
    $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
    $this->smarty->load_javascript('resource/js/jquery/select2.js');
    $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
    $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
    $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
    $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
    $this->smarty->assign("rs_pasien", $this->m_hhc->get_pasien_by_rg(array($FS_RG)));
    $this->smarty->assign("role_id", $this->com_user['role_id']);
    $this->smarty->assign("FS_KD_TRS", $FS_KD_TRS);
        // notification
    $this->tnotification->display_notification();
    $this->tnotification->display_last_field();
        // output
    parent::display();
}

public function add_evaluasi_process() {
        // set page rules
    $this->_set_page_rule("C");
        // cek input
    $this->tnotification->set_rules('FS_KD_TRS', 'ID PASIEN', 'trim|required');
        // process

    if ($this->tnotification->run() !== FALSE) {
        $params = array(
            $this->input->post('FS_KD_TRS'),
            $this->input->post('FS_NM_TINDAKAN'),
            $this->input->post('FS_NM_EVALUASI'),
            $this->com_user['user_name'],
            date('Y-m-d'),
            date('H:i:s')
        );
            // insert
        if ($this->m_hhc->insert_evaluasi($params)) {
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
    redirect("inap/hhc/add/" . $this->input->post('FS_KD_REG'));
}

public function list_hhc_intervensi() {
    $instansi = $this->m_hhc->list_intervensi();
    $data[] = array();
    $i = 0;
    foreach ($instansi as $key => $value) {
        $data[$i] = array(
            'label' => $value['FS_NM_INTERVENSI'],
            'value' => $value['FS_KD_TRS']
        );
        $i++;
    }
    echo json_encode($data);
}

}
