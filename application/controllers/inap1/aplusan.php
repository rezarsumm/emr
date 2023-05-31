<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class aplusan extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_aplusan');
        // load javascript
        //$this->smarty->load_javascript("resource/js/pdfobject/pdfobject.js");
        // load library
        $this->load->library('tnotification');
        $this->load->library('pagination');
    }

    public function index() {
        // set page rules
        $this->_set_page_rule("R");
        // set template content
        // set template content
        //this->smarty->assign("template_content", "laporan/aplusan_ugd/index.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("template_content", "inap/aplusan/index.html");
        // tahun
        // get search parameter
        $search = $this->tsession->userdata('aplusan_search');
        if (!empty($search)) {
            $this->smarty->assign("search", $search);
        }


        if (empty($search['tanggal'])) {
            $search['tanggal'] = date('Y-m-d');
            $this->smarty->assign("search", $search);
        }
        // search parameters
        $layanan = empty($search['layanan']) ? '' : '%' . $search['layanan'] . '%';
        $tanggal = empty($search['tanggal']) ? '' : '%' . $search['tanggal'] . '%';
 
        $start = $this->uri->segment(4, 0) + 1;
        $this->smarty->assign("no", $start);
        $this->smarty->assign("noo", $start);
        /* end of pagination ---------------------- */
        // get list data
        $role = $this->com_user['role_id'];

          $fs_kd_layanan = $this->com_user['fs_kd_layanan'];

        if($fs_kd_layanan == 'MNA')
        {
              $this->smarty->assign("rs_layanan", $this->m_aplusan->get_unit_mina());
        }

        else{
            if ($role == '6') {
                $this->smarty->assign("rs_layanan", $this->m_aplusan->get_unit_kerja());
            } else {
                $this->smarty->assign("rs_layanan", $this->m_aplusan->get_unit_kerja_layanan(array($this->com_user['fs_kd_layanan'])));
            }
        } 

        $date = date('Y-m-d');
        $date2 = date('Y-m-dH:i:s');

        // notification
        $this->smarty->assign("rs_id", $this->m_aplusan->get_list_aplusan_lap(array($layanan, $tanggal)));
        //$this->smarty->assign("rs_id2", $this->m_aplusan->get_list_aplusan_lap2(array($date, $date2, $date, $date, $date, $date, $date, $date, $date, $date, $date, $layanan, $tanggal)));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function proses_cari() {
        //set page rules
        $this->_set_page_rule("R");
        //data
        if ($this->input->post('save') == "RESET") {
            $this->tsession->unset_userdata("aplusan_search");
        } else {
            $params = array(
                "layanan" => $this->input->post("layanan"),
                "tanggal" => $this->input->post("tanggal")
            );
            $this->tsession->set_userdata("aplusan_search", $params);
        }
        // redirect
        redirect("inap/aplusan");
    }

    // list surat masuk
    public function add($FS_KD_REG = "", $FS_KD_TRS = "") {
        // set page rules
        $this->_set_page_rule("R");
        // set template content
        $this->smarty->assign("template_content", "inap/aplusan/add.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        // daftar disposisi
        $date = date('Y-m-d');
        $date2 = date('Y-m-dH:i:s');
        $this->smarty->assign("rs_pasien", $this->m_aplusan->get_pasien_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("cppt", $this->m_aplusan->get_cppt_by_trs($FS_KD_TRS));
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
        $this->tnotification->set_rules('FS_SHIFT', 'SHIFT', 'trim|required');
        $this->tnotification->set_rules('FS_KD_REG', 'PASIEN', 'trim|required');
// process
        if ($this->tnotification->run() !== FALSE) {
            $data = $this->m_aplusan->cek_aplusan(array($this->input->post('FS_SHIFT'),
                $this->input->post('FS_KD_REG'), date('Y-m-d')));
            if ($data > 0) {
                $this->tnotification->sent_notification("error", "Tanggal dan Shift Sudah Pernah Di entry, Silahkan edit data");
                redirect("inap/aplusan/" . $this->input->post('FS_KD_REG') . '/' . $this->input->post('FS_KD_TRS'));
            } else {
                $params = array(
                    'xx',
                    $this->input->post('FS_SHIFT'),
                    $this->input->post('FS_MR'),
                    $this->input->post('FS_KONDISI_PASIEN'),
                    '',
                    '',
                    $this->input->post('FS_CATATAN'),
                    $this->com_user['user_name'],
                    date('Y-m-d H:i:s'),
                    $this->com_user['user_name'],
                    $this->input->post('FS_KD_REG')
                );
// inserta
                if ($this->m_aplusan->insert($params)) {
                    /* $this->m_aplusan->insert_catatan_admin(array($this->input->post('FS_MR'), $this->input->post('FS_ADMINISTRATIF'), $this->com_user['user_id'],
                      date('Y-m-d'), $this->input->post('FS_KD_REG'))); */
// notification 
                    $this->tnotification->delete_last_field();
                    $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
                    redirect("inap/aplusan/");
                } else {
// default error
                    $this->tnotification->sent_notification("error", "Detail gagal disimpan");
                }
            }
        } else {
// default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
// default redirect
        redirect("inap/aplusan/");
    }

    // edit surat masuk
    public function edit($FS_KD_APLUSAN = "", $FS_KD_REG = "") {
// set page rules
        $this->_set_page_rule("U");
// set template content
        $this->smarty->assign("template_content", "inap/aplusan/edit.html");
// detail
        $date = date('Y-m-d');
        $date2 = date('Y-m-dH:i:s');
        $this->smarty->assign("rs_pasien", $this->m_aplusan->get_pasien_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("result", $this->m_aplusan->get_aplusan_by_id(array($FS_KD_APLUSAN)));
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }



      public function terima($FS_KD_APLUSAN = "", $FS_KD_REG = "") {
              $params = array(
                $this->com_user['user_name'],
                date('Y-m-d h:i:s'),
                $FS_KD_APLUSAN,
            );
// insert
            if ($this->m_aplusan->terima($params)) {
                $this->tnotification->sent_notification("success", "Data berhasil disimpan");
                  redirect("inap/aplusan/");
            }
    }

    public function edit_process() {
// set page rules
        $this->_set_page_rule("U");
// cek input
        $this->tnotification->set_rules('FS_KD_APULSAN', 'ID', 'trim|required');
        //$this->tnotification->set_rules('FS_KD_APULSAN_ADMIN', 'id', 'trim|required');
// process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_SHIFT'),
                $this->input->post('FS_MR'),
                $this->input->post('FS_KONDISI_PASIEN'),
                '',
                '',
                $this->input->post('FS_CATATAN'),
                $this->com_user['user_name'],
                date('Y-m-d h:i:s'),
                $this->com_user['user_name'],
                $this->input->post('FS_KD_REG'),
                $this->input->post('FS_KD_APULSAN')
            );
// insert
            if ($this->m_aplusan->update($params)) {
                /* $this->m_apulsan->update_catatan_admin(array($this->input->post('FS_MR'), $this->input->post('FS_ADMINISTRATIF'), $this->com_user['user_id'],
                  date('Y-m-d h:i:s'),$this->input->post('FS_KD_REG'), $this->input->post('FS_KD_APULSAN_ADMIN')));
                 */
            }
// notification
            $this->tnotification->delete_last_field();
            $this->tnotification->sent_notification("success", "Data berhasil disimpan");
        } else {
// default error
            $this->tnotification->sent_notification("error", "Data gagal disimpan");
        }
// default redirect
        redirect("inap/aplusan/");
    }

}
