<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class kep extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_kep');
        $this->load->model('m_ass_awal');
        // load library
        $this->load->library('tnotification');
        $this->smarty->assign('m_kep', $this->m_kep);
    }

    // tambah surat masuk
    public function index() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/kep/list.html");
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
        $this->smarty->assign("template_content", "inap/kep/list_his.html");
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
        //$cek = $this->m_kep->cek_kep(array($FS_RG2));
        //if ($cek == '0') {
        redirect("inap/kep/add/" . $FS_RG2);
        // } elseif ($cek == '1') {
        //     redirect("inap/kep/edit/" . $FS_RG2);
        //}
    }
    public function cari_process_cppt($FS_RG2="") {
        redirect("inap/kep/add/" . $FS_RG2);
    }

    public function cari_process2() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_MR', 'No MR', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            // insert
            redirect("inap/kep/lists2/" . $this->input->post('FS_MR'));
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("inap/kep/cari2");
    }

    // tambah surat masuk
    public function lists($FS_MR = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/kep/list2.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        //$new_reg = number_format(347104100000000 + $FS_MR, 0, "", "");
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_kep->get_pasien_by_mr($FS_MR));
        //$this->smarty->assign("rs_kep", $this->m_kep->get_all_kep($new_reg));
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
        $this->smarty->assign("template_content", "inap/kep/list2.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $new_reg = number_format(347104100000000 + $FS_MR, 0, "", "");
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_kep->get_pasien_by_mr($new_reg));
        //$this->smarty->assign("rs_kep", $this->m_kep->get_all_kep($new_reg));
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
        $this->smarty->assign("template_content", "inap/kep/add.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        // pagination assign value
        $this->smarty->assign("no", 1);
        $this->smarty->assign("rs_pasien", $this->m_kep->get_pasien_by_rg(array($FS_RG)));
        $this->smarty->assign("rs_diagnosa", $this->m_kep->get_diagnosa());
        $this->smarty->assign("rs_layanan", $this->m_kep->get_layanan());
        $this->smarty->assign("result", $this->m_kep->get_rencana_kep_by_rg(array($FS_RG)));
        $this->smarty->assign("rs_masalah_kep", $this->m_kep->get_masalah_kep_by_rg(array($FS_RG)));

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

            $params = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('FS_KD_DAFTAR_DIAGNOSA'),
                $this->input->post('FS_KD_NOC'),
                $this->input->post('FD_TGL_DICAPAI'),
                $this->input->post('FD_JAM_DICAPAI'),
                $this->input->post('FS_KD_INDIKATOR'),
                $this->input->post('FS_KD_NIC'),
                $this->com_user['user_name'],
                date('Y-m-d'),
                date('H:i:s')
            );
            // insert
            if ($this->m_kep->insert($params)) {
                $FS_KD_RENC_KEP = $this->m_kep->get_last_inserted_id();

                $rincian = $this->input->post('FS_KD_NIC2');
                if (!empty($rincian)) {
                    foreach ($rincian as $value) {
                        $this->m_kep->insert_rincian_px(array($FS_KD_RENC_KEP, $value));
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
        redirect("inap/kep/add/" . $this->input->post('FS_KD_REG'));
    }

    public function add_tindakan($FS_RG = '') {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/kep/add_tindakan.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        // pagination assign value
        $this->smarty->assign("no", 1);
        $this->smarty->assign("rs_pasien", $this->m_kep->get_pasien_by_rg(array($FS_RG)));
        $this->smarty->assign("result", $this->m_kep->get_tindakan_kep_by_rg(array($FS_RG)));
        $this->smarty->assign("rs_kep_tind", $this->m_kep->list_kep_tindakan_by_rg());

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function add_tindakan_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {

            $params = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('FS_TINDKAN_KEP'),
                $this->input->post('FD_TGL_TINDKAN_KEP'),
                $this->input->post('FD_JAM_TINDKAN_KEP'),
                $this->com_user['user_name'],
                date('Y-m-d'),
                date('H:i:s'),
                $this->input->post('FS_KD_TRS_KEP_TINDAKAN')
            );
            // insert
            if ($this->m_kep->insert_tindakan_kep($params)) {
             
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
        redirect("inap/kep/add_tindakan/" . $this->input->post('FS_KD_REG'));
    }

    public function list_diagnosa() {
        $id = $this->input->post('kep1');
        $rs_diagnosa = $this->m_kep->get_daftar_diag($id);
        $data .= "<option>--Pilih Data--</option>";
        foreach ($rs_diagnosa as $diag) {
            $data.= '<option value="' . $diag['FS_KD_DAFTAR_DIAGNOSA'] . '">' . $diag['FS_NM_DIAGNOSA'] . '</option>';
        }
        echo $data;
    }

    public function list_noc() {
        $id = $this->input->post('diag');
        $rs_noc = $this->m_kep->get_daftar_noc($id);
        $data .= "<option>--Pilih Data--</option>";
        foreach ($rs_noc as $noc) {
            $data.= '<option value="' . $noc['FS_KD_NOC'] . '">' . $noc['FS_NM_NOC'] . '</option>';
        }
        echo $data;
    }

    public function list_indikator() {
        $id = $this->input->post('noc');
        $rs_indikator = $this->m_kep->get_daftar_indikator($id);
        $data .= "<option>--Pilih Data--</option>";
        foreach ($rs_indikator as $indikator) {
            $data.= '<option value="' . $indikator['FS_KD_INDIKATOR'] . '">' . $indikator['FS_NM_INDIKATOR'] . '</option>';
        }
        echo $data;
    }

    public function list_nic() {
        $id = $this->input->post('indikator');
        $rs_nic = $this->m_kep->get_daftar_nic($id);
        $data .= "<option>--Pilih Data--</option>";
        foreach ($rs_nic as $nic) {
            $data.= '<option value="' . $nic['FS_KD_NIC'] . '">' . $nic['FS_NM_NIC'] . '</option>';
        }
        echo $data;
    }

    public function list_nic2() {
        $id = $this->input->post('nic');
        $rs_nic2 = $this->m_kep->get_daftar_nic2($id);
        //$data .= "";
        foreach ($rs_nic2 as $nic2) {
            $data.= '<option value="' . $nic2['FS_KD_NIC2'] . '">' . $nic2['FS_NM_NIC2'] . '</option>';
        }
        echo $data;
    }

}
