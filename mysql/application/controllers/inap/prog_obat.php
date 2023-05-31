<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class prog_obat extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_prog_obat');
        $this->load->model('m_cppt');
        $this->load->model('m_rm17');
        // load library
        $this->load->model('m_ass_awal');
        $this->load->model('m_farmasi_inap');
        $this->load->library('tnotification');
        $this->smarty->assign('m_prog_obat', $this->m_prog_obat);
    }

    // tambah surat masuk
    public function index() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/prog_obat/list.html");
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

        $search = $this->tsession->userdata('farmasi_rawat_inap');
        if (!empty($search)) {
            $this->smarty->assign("search", $search);
        }
        if (empty($search['FD_TGL_TRS'])) {
            $search['FD_TGL_TRS'] = date('Y-m-d');
            $this->smarty->assign("search", $search);
        }
        $this->smarty->assign("FD_TGL_TRS", $search['FD_TGL_TRS']);
        // search parameters
        $FD_TGL_TRS = empty($search['FD_TGL_TRS']) ? : $search['FD_TGL_TRS'];
// get search parameter
        $this->smarty->assign("rs_pasien2", $this->m_farmasi_inap->get_px_by_farmasi(array($FD_TGL_TRS)));

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function proses_cari_resep() {
        //set page rules
        $this->_set_page_rule("R");
        //data
        if ($this->input->post('save') == "Reset") {
            $this->tsession->unset_userdata("farmasi_rawat_inap");
        } else {
            $params = array(
                "FD_TGL_TRS" => $this->input->post("FD_TGL_TRS")
            );
            $this->tsession->set_userdata("farmasi_rawat_inap", $params);
        }
        // redirect
        redirect("inap/prog_obat");
    }


    public function cari_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_RG', 'No REG', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            // insert
            redirect("inap/prog_obat/add/" . $this->input->post('FS_RG'));
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("inap/prog_obat/add/" . $this->input->post('FS_RG'));
    }

    public function add($FS_RG = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/prog_obat/add.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $search = $this->tsession->userdata('prog_obat_search');
        if (!empty($search)) {
            $this->smarty->assign("search", $search);
        }
        if (empty($search['FD_TGL_TRS'])) {
            $search['FD_TGL_TRS'] = date('Y-m-d');
            $this->smarty->assign("search", $search);
        }
        if (empty($search['FS_UDD_WAKTU'])) {
            $this->smarty->assign("search", $search);
        }
        $this->smarty->assign("FD_TGL_TRS", $search['FD_TGL_TRS']);
        $this->smarty->assign("FS_UDD_WAKTU", $search['FS_UDD_WAKTU']);
        $FD_TGL_TRS = empty($search['FD_TGL_TRS']) ? : $search['FD_TGL_TRS'];
        $FS_UDD_WAKTU = empty($search['FS_UDD_WAKTU']) ? : $search['FS_UDD_WAKTU'];

        $this->smarty->assign("now", date('Y-m-d'));
        $this->smarty->assign("rs_pasien", $this->m_prog_obat->get_pasien_by_rg($FS_RG));
        $this->smarty->assign("rs_ases_medis", $this->m_prog_obat->get_data_medis_by_rg(array($FS_RG)));
        $this->smarty->assign("rs_resep_dokter", $this->m_prog_obat->get_data_terapi_by_rg($FS_RG));
        $this->smarty->assign("rs_resep_dokter2", $this->m_prog_obat->get_data_terapi3_by_rg(array($FS_RG, $FD_TGL_TRS, $FS_UDD_WAKTU)));
        $this->smarty->assign("rs_resep", $this->m_prog_obat->get_resep());
        $this->smarty->assign("rs_rm17", $this->m_prog_obat->get_all_rm17_by_rg(array($FS_RG)));
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
            $this->tsession->unset_userdata("prog_obat_search");
        } else {
            $params = array(
                "FD_TGL_TRS" => $this->input->post("FD_TGL_TRS"),
                "FS_UDD_WAKTU" => $this->input->post("FS_UDD_WAKTU")
            );
            $this->tsession->set_userdata("prog_obat_search", $params);
        }
        // redirect
        redirect("inap/prog_obat/add/" . $this->input->post("FS_KD_REG"));
    }

    public function edit($FS_ID = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "farmasi/udd/edit.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("result", $this->m_udd->get_rm17_by_id(array($FS_ID)));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    // add data
    public function add_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        $this->tnotification->set_rules('FD_TGL_TRS', 'TANGGAL UDD', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $data_kp = $this->m_prog_obat->get_no_kp();
            $NOKP = 'KP' . $data_kp['KP'] . 'A';
            $NOKP2 = $data_kp['KP'] + 1;
            $update_kp = $this->m_prog_obat->update_tz_parameter_no_kp($NOKP2);
            if ($this->m_prog_obat->update_data_resep(array($NOKP, $this->input->post('FS_KD_REG')))) {
                $this->m_prog_obat->update_data_resep2(array($NOKP));
                $params = array(
                    $NOKP,
                    $this->input->post('FD_TGL_TRS'),
                    date('H:i:s'),
                    $this->com_user['user_name'],
                    '3000-01-01',
                    '00:00:00',
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FS_KD_LAYANAN'),
                    $this->input->post('FS_KD_MEDIS'),
                    '',
                    '',
                    '',
                    '',
                    $this->input->post('FS_KD_MEDIS'),
                    'RI',
                    '2'
                );
                $this->m_prog_obat->insert_medis($params);
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
        redirect("inap/prog_obat/add/" . $this->input->post('FS_KD_REG'));
    }

    public function delete_process($FS_KD_TRS2,$FS_KD_REG) {
        // cek input
        $params = array(
            $FS_KD_TRS2
        );
        // insert
        if ($this->m_prog_obat->delete($params)) {
            // notification
            $this->tnotification->delete_last_field();
            $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }

        // default redirect
        redirect("inap/prog_obat/add/" . $FS_KD_REG);
    }

    public function add_process_resep() {
        $params = array(
            $this->input->post('FS_KD_BARANG'),
            $this->input->post('FS_NM_BARANG'),
            $this->input->post('FS_KD_SATUAN'),
            $this->input->post('FN_QTY_BARANG'),
            'ADA',
            'RI',
            $this->input->post('FS_KETERANGAN'),
            $this->input->post('FS_ETIKET_CATATAN'),
            $this->input->post('FS_UDD_WAKTU'),
            $this->input->post('FS_KD_REG')
        );
        // insert
        $data = $this->m_prog_obat->insert($params);
        echo json_encode($data);
    }

    public function list_resep_baru() {
        $params = array(
            $this->input->post('FS_KD_REG2')
        );
        $data = $this->m_prog_obat->get_data_terapi2_by_rg($params);
        echo json_encode($data);
    }

    public function delete_resep_process() {
        $params = array(
            $this->input->post('kode')
        );
        // insert
        $data = $this->m_prog_obat->delete_resep_process($params);
        echo json_encode($data);
    }

}
