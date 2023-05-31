<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class dp extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_dp');
        $this->load->model('m_ass_awal');
        // load library
        $this->load->library('tnotification');
    }

    // tambah surat masuk
    public function index() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/dp/list.html");
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

    public function cari_process() {
        $FS_RG2 = $this->input->post('FS_RG');
        $cek = $this->m_dp->cek_dp(array($FS_RG2));
        if ($cek == '0') {
            redirect("inap/dp/add/" . $FS_RG2);
        } elseif ($cek == '1') {
            redirect("inap/dp/edit/" . $FS_RG2);
        }
    }
    
    public function cari_process_cppt($FS_RG2="") {
        $cek = $this->m_dp->cek_dp(array($FS_RG2));
        if ($cek == '0') {
            redirect("inap/dp/add/" . $FS_RG2);
        } elseif ($cek == '1') {
            redirect("inap/dp/edit/" . $FS_RG2);
        }
    }

    // tambah surat masuk
    public function cari2() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/dp/list_his.html");
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
        $this->smarty->assign("template_content", "inap/dp/add.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_dp->get_pasien_by_rg(array($FS_RG)));
        $this->smarty->assign("rs_leaflet", $this->m_dp->get_leaflet(array($FS_RG)));
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
                '',
                '',
                $this->input->post('FS_TRANS_PULANG'),
                date('Y-m-d'),
                date('H:i:s'),
                $this->com_user['user_name']
            );

            // insert
            if ($this->m_dp->insert($params)) {
                
                $FS_NM_TINGGAL = $this->input->post('FS_NM_TINGGAL');
                if (!empty($FS_NM_TINGGAL)) {
                    foreach ($FS_NM_TINGGAL as $value) {
                        $this->m_dp->insert_FS_NM_TINGGAL(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
                
                $FS_LANJUTAN_PERAWATAN = $this->input->post('FS_LANJUTAN_PERAWATAN');
                if (!empty($FS_LANJUTAN_PERAWATAN)) {
                    foreach ($FS_LANJUTAN_PERAWATAN as $value) {
                        $this->m_dp->insert_FS_LANJUTAN_PERAWATAN(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
                
                // notification
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
                redirect("inap/dp/edit/" . $this->input->post('FS_KD_REG'));
            } else {
                // default error
                $this->tnotification->sent_notification("error", "Detail gagal disimpan");
            }
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("inap/dp/edit/" . $this->input->post('FS_KD_REG'));
    }

    public function edit($FS_RG = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/dp/edit.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_dp->get_pasien_by_rg(array($FS_RG)));
        $this->smarty->assign("result", $this->m_dp->get_dp_by_rg($FS_RG));
        $this->smarty->assign("rs_leaflet", $this->m_dp->get_leaflet(array($FS_RG)));
        $FS_NM_TINGGAL = $this->m_dp->FS_NM_TINGGAL_BY_RG($FS_RG);
        $FS_NM_TINGGAL_str = "";
        foreach ($FS_NM_TINGGAL as $key => $value) {
            $FS_NM_TINGGAL_str .= "'" . $value['FS_KD_COM_DP1'] . "',";
        }
        $this->smarty->assign('rs_FS_NM_TINGGAL', $FS_NM_TINGGAL_str);
        
        $FS_LANJUTAN_PERAWATAN = $this->m_dp->FS_LANJUTAN_PERAWATAN_BY_RG($FS_RG);
        $FS_LANJUTAN_PERAWATAN_str = "";
        foreach ($FS_LANJUTAN_PERAWATAN as $key => $value) {
            $FS_LANJUTAN_PERAWATAN_str .= "'" . $value['FS_KD_COM_DP2'] . "',";
        }
        $this->smarty->assign('rs_FS_LANJUTAN_PERAWATAN', $FS_LANJUTAN_PERAWATAN_str);
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function edit_process() {
        // set page rules
        $this->_set_page_rule("U");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process

        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                '',
                '',
                $this->input->post('FS_TRANS_PULANG'),
                date('Y-m-d'),
                date('H:i:s'),
                $this->com_user['user_name'],
                $this->input->post('FS_KD_REG')
            );

            // insert
            if ($this->m_dp->update($params)) {
                
                $FS_NM_TINGGAL = $this->input->post('FS_NM_TINGGAL');
                $this->m_dp->delete_FS_NM_TINGGAL($this->input->post('FS_KD_REG'));
                if (!empty($FS_NM_TINGGAL)) {
                    foreach ($FS_NM_TINGGAL as $value) {
                        $this->m_dp->insert_FS_NM_TINGGAL(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
                
                $FS_LANJUTAN_PERAWATAN = $this->input->post('FS_LANJUTAN_PERAWATAN');
                $this->m_dp->delete_FS_LANJUTAN_PERAWATAN($this->input->post('FS_KD_REG'));
                if (!empty($FS_LANJUTAN_PERAWATAN)) {
                    foreach ($FS_LANJUTAN_PERAWATAN as $value) {
                        $this->m_dp->insert_FS_LANJUTAN_PERAWATAN(array($this->input->post('FS_KD_REG'), $value));
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
        redirect("inap/dp/edit/" . $this->input->post('FS_KD_REG'));
    }

    public function add_process_catatan() {
        $params = array(
            $this->input->post('FS_KD_REG'),
            $this->input->post('FS_AKTIFITAS'),
            $this->input->post('FS_DIBERIKAN'),
            $this->input->post('FS_HUBUNGAN'),
            $this->input->post('FS_VERIFIKASI'),
            date('Y-m-d'),
            date('H:i:s'),
            $this->com_user['user_name'],
            $this->input->post('FS_KD_EDUKASI')
        );
        // insert
        $data = $this->m_dp->insert_catatan($params);
        echo json_encode($data);
    }

    public function list_catatan() {
        $params = array(
            $this->input->post('FS_KD_REG2')
        );
        $data = $this->m_dp->get_data_catatan_by_rg($params);
        echo json_encode($data);
    }
    
    public function FS_NM_TINGGAL() {
        $FS_NM_TINGGAL = $this->m_dp->FS_NM_TINGGAL();
        $data[] = array();
        $i = 0;
        foreach ($FS_NM_TINGGAL as $key => $value) {
            $data[$i] = array(
                'label' => $value['FS_NM_TINGGAL'],
                'value' => $value['FS_KD_TRS']
            );
            $i++;
        }
        echo json_encode($data);
    }
    
    public function FS_LANJUTAN_PERAWATAN() {
        $FS_LANJUTAN_PERAWATAN = $this->m_dp->FS_LANJUTAN_PERAWATAN();
        $data[] = array();
        $i = 0;
        foreach ($FS_LANJUTAN_PERAWATAN as $key => $value) {
            $data[$i] = array(
                'label' => $value['FS_LANJUTAN_PERAWATAN'],
                'value' => $value['FS_KD_TRS']
            );
            $i++;
        }
        echo json_encode($data);
    }
}
