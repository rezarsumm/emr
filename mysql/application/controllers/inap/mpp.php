<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class mpp extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_inap_mpp');
        $this->load->model('m_ass_awal');
        $this->load->model('m_rawat_jalan');
        // load library
        $this->load->library('tnotification');
        $this->smarty->assign('m_inap_mpp', $this->m_inap_mpp);
    }

    public function index() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/mpp/index.html");
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
        $this->smarty->assign("no",1);
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function cari_process() {
        $FS_RG2 = $this->input->post('FS_RG');
        $cek = $this->m_inap_mpp->cek_ases_mpp(array($FS_RG2));
        if ($cek == '0'){
            redirect("inap/mpp/add/" . $FS_RG2);
        }elseif($cek >= '1'){
            redirect("inap/mpp/edit/" . $FS_RG2);
        }
    }

    public function add($FS_RG='') {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/mpp/add.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_inap_mpp->get_pasien_by_rg(array($FS_RG)));
        
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
                $this->input->post('FS_PARAM1'),
                $this->input->post('FS_PARAM2'),
                $this->input->post('FS_PARAM3'),
                $this->input->post('FS_PARAM4'),
                $this->input->post('FS_PARAM5'),
                $this->input->post('FS_PARAM6'),
                $this->input->post('FS_PARAM7'),
                $this->input->post('FS_PARAM8'),
                $this->input->post('FS_PARAM9'),
                $this->input->post('FS_PARAM10'),
                $this->input->post('FS_PARAM11'),
                $this->input->post('FS_PARAM12'),
                $this->input->post('FS_PARAM13'),
                $this->input->post('FS_PARAM14'),
                $this->input->post('FS_PARAM15'),
                date('Y-m-d'),
                date('H:i:s'),
                $this->com_user['user_name']
            );
            // insert
            if ($this->m_inap_mpp->insert($params)) {
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
        redirect("inap/mpp/add_catatan/" . $this->input->post('FS_KD_REG'));
    }


    public function edit($FS_RG='') {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/mpp/edit.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_inap_mpp->get_pasien_by_rg(array($FS_RG)));

        $this->smarty->assign("result", $this->m_inap_mpp->get_data_ases_mpp_by_rg(array($FS_RG)));
        
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
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(

                $this->input->post('FS_PARAM1'),
                $this->input->post('FS_PARAM2'),
                $this->input->post('FS_PARAM3'),
                $this->input->post('FS_PARAM4'),
                $this->input->post('FS_PARAM5'),
                $this->input->post('FS_PARAM6'),
                $this->input->post('FS_PARAM7'),
                $this->input->post('FS_PARAM8'),
                $this->input->post('FS_PARAM9'),
                $this->input->post('FS_PARAM10'),
                $this->input->post('FS_PARAM11'),
                $this->input->post('FS_PARAM12'),
                $this->input->post('FS_PARAM13'),
                $this->input->post('FS_PARAM14'),
                $this->input->post('FS_PARAM15'),
                date('Y-m-d'),
                date('H:i:s'),
                $this->com_user['user_name'],
                $this->input->post('FS_KD_REG')
            );
            // insert
            if ($this->m_inap_mpp->update($params)) {
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
        redirect("inap/mpp/add_catatan/" . $this->input->post('FS_KD_REG'));
    }

    public function add_catatan($FS_RG='') {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/mpp/add_catatan.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_inap_mpp->get_pasien_by_rg(array($FS_RG)));
        $this->smarty->assign("rs_implementasi", $this->m_inap_mpp->get_mpp(array($FS_RG)));
        $this->smarty->assign("rs_result", $this->m_inap_mpp->get_implementasi_mpp(array($FS_RG)));
        
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function list_mpp2() {
        $id = $this->input->post('mpp');
        $rs_mpp2 = $this->m_inap_mpp->get_mpp2($id);
        $data .= "<option>--Pilih Data--</option>";
        foreach ($rs_mpp2 as $mpp2) {
            $data.= '<option value="' . $mpp2['FS_KD_TRS'] . '">' . $mpp2['FS_IMPLEMENTASI2'] . '</option>';
        }
        echo $data;
    }

    public function add_catatan_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('FS_KD_MPP'),
                $this->input->post('FS_KD_MPP2'),
                $this->input->post('FS_KET'),
                date('Y-m-d'),
                date('H:i:s'),
                $this->com_user['user_name'],
                
            );
            // insert
            if ($this->m_inap_mpp->insert_catatan($params)) {
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
        redirect("inap/mpp/add_catatan/" . $this->input->post('FS_KD_REG'));
    }
}