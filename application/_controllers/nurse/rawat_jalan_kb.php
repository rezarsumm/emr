<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class rawat_jalan_kb extends ApplicationBase {

// constructor
    public function __construct() {
// parent constructor
        parent::__construct();
// load model
        $this->load->model('m_rawat_jalan');
        $this->load->library('tnotification');
    }

// list surat masuk
    public function index() {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "nurse/rawat_jalan_kb/index.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $search = $this->tsession->userdata('nurse_rawat_jalan_kb');
        if (!empty($search)) {
            $this->smarty->assign("search", $search);
        }
        if (empty($search['FS_KD_PEG'])) {
            $search['FS_KD_PEG'] = 'S000';
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
        $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_px_by_dokter_wait(array($FD_TGL_MASUK, $FS_KD_PEG, $FS_KD_PEG, $FS_KD_PEG)));
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
            $this->tsession->unset_userdata("nurse_rawat_jalan_kb");
        } else {
            $params = array(
                "FD_TGL_MASUK" => $this->input->post("FD_TGL_MASUK"),
                "FS_KD_PEG" => $this->input->post("FS_KD_PEG")
            );
            $this->tsession->set_userdata("nurse_rawat_jalan_kb", $params);
        }
        // redirect
        redirect("nurse/rawat_jalan_kb");
    }

    public function add($FS_KD_REG = "", $FS_KD_MEDIS = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "nurse/rawat_jalan_kb/add.html");
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
            $params = array(
                $this->input->post('FS_KD_REG'),
                '1',
                '3',
                $this->com_user['user_id'],
                date('Y-m-d')
            );
            // insert
            if ($this->m_rawat_jalan->insert($params)) {
                $params1 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FS_SUHU'),
                    $this->input->post('FS_NADI'),
                    $this->input->post('FS_R'),
                    $this->input->post('FS_TD'),
                    $this->input->post('FS_TB'),
                    $this->input->post('FS_BB'),
                    $this->input->post('FS_KD_MEDIS'),
                    $this->com_user['user_id'],
                    date('Y-m-d'),
                    date('H:i:s')
                );
                $this->m_rawat_jalan->insert_vs($params1);
                // insert
                $params2 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FS_NYERIP'),
                    $this->input->post('FS_NYERIQ'),
                    $this->input->post('FS_NYERIR'),
                    $this->input->post('FS_NYERIS'),
                    $this->input->post('FS_NYERIT'),
                    $this->com_user['user_id'],
                    date('Y-m-d'),
                    $this->input->post('FS_NYERI')
                );
                $this->m_rawat_jalan->insert_nyeri($params2);
                $params3 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FS_CARA_BERJALAN1'),
                    $this->input->post('FS_CARA_BERJALAN2'),
                    $this->input->post('FS_CARA_DUDUK'),
                    $this->com_user['user_id'],
                    date('Y-m-d')
                );
                $this->m_rawat_jalan->insert_jatuh($params3);
                $params4 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU'),
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU2'),
                    $this->input->post('FS_RIW_PENYAKIT_KEL'),
                    $this->input->post('FS_RIW_PENYAKIT_KEL2'),
                    $this->input->post('FS_STATUS_PSIK'),
                    $this->input->post('FS_STATUS_PSIK2'),
                    $this->input->post('FS_HUB_KELUARGA'),
                    $this->input->post('FS_ST_FUNGSIONAL'),
                    $this->input->post('FS_AGAMA'),
                    $this->input->post('FS_NILAI_KHUSUS'),
                    $this->input->post('FS_NILAI_KHUSUS2'),
                    $this->input->post('FS_ANAMNESA'),
                    $this->input->post('FS_PENGELIHATAN'),
                    $this->input->post('FS_PENCIUMAN'),
                    $this->input->post('FS_PENDENGARAN'),
                    $this->input->post('FS_RIW_IMUNISASI'),
                    $this->input->post('FS_RIW_IMUNISASI_KET'),
                    $this->input->post('FS_RIW_TUMBUH'),
                    $this->input->post('FS_RIW_TUMBUH_KET'),
                    '',
                    $this->com_user['user_id'],
                    date('Y-m-d')
                );
                $this->m_rawat_jalan->insert_ases($params4);
                $params5 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FS_ALERGI'),
                    $this->input->post('FS_ALERGI2'),
                    $this->input->post('FS_REAK_ALERGI'),
                    $this->com_user['user_id'],
                    date('Y-m-d')
                );
                $this->m_rawat_jalan->insert_alergi($params5);
                $params6 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FS_NUTRISI1'),
                    $this->input->post('FS_NUTRISI2'),
                    $this->input->post('FS_NUTRISI_ANAK1'),
                    $this->input->post('FS_NUTRISI_ANAK2'),
                    $this->input->post('FS_NUTRISI_ANAK3'),
                    $this->input->post('FS_NUTRISI_ANAK4'),
                    $this->com_user['user_id'],
                    date('Y-m-d')
                );
                $this->m_rawat_jalan->insert_nutrisi($params6);

// insert tujuan
                $masalah_kep = $this->input->post('tujuan');
                if (!empty($masalah_kep)) {
                    foreach ($masalah_kep as $value) {
                        $this->m_rawat_jalan->insert_masalah_kep(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
                $rencana_kep = $this->input->post('tembusan');
                if (!empty($rencana_kep)) {
                    foreach ($rencana_kep as $value) {
                        $this->m_rawat_jalan->insert_rencana_kep(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
                $params7 = array(
                    $this->input->post('FS_KD_REG'),
                    '',
                    '',
                    $this->input->post('FS_RIWAYAT_GYNEKOLOGI'),
                    $this->input->post('FS_RIWAYAT_GYNEKOLOGI_KET'),
                    $this->input->post('FS_RIW_MENS_UMUR_MENARCHE'),
                    $this->input->post('FS_RIW_MENS_LAMA_HAID'),
                    $this->input->post('FS_RIW_MENS_GANTI_PEMBALUT'),
                    $this->input->post('FS_RIW_MENS_HPM'),
                    $this->input->post('FS_RIW_MENS_KELUHAN'),
                    $this->input->post('FS_RIW_MENS_KELUHAN_KET'),
                    $this->input->post('FS_RIW_KB_METODE_1'),
                    $this->input->post('FS_RIW_KB_METODE_LAMA_1'),
                    $this->input->post('FS_RIW_KB_METODE_2'),
                    $this->input->post('FS_RIW_KB_METODE_LAMA_2'),
                    $this->input->post('FS_RIW_KB_KOMPLIKASI'),
                    $this->input->post('FS_RIW_KB_KOMPLIKASI_KET'),
                    $this->input->post('FS_MASALAH_KEBIDANAN'),
                    $this->input->post('FS_RENCANA_KEBIDANAN'),
                    $this->input->post('G'),
                    $this->input->post('P'),
                    $this->input->post('A'),
                    $this->input->post('FS_RIW_MENS_HPL'),
                    $this->input->post('FS_KOMPLIKASI'),
                    $this->input->post('FS_K1'),
                    $this->input->post('FS_K4'),
                    $this->input->post('FS_HB'),
                    $this->input->post('FS_STATUS_TT'),
                    $this->input->post('FS_BUKU_KIA'),
                    $this->com_user['user_name'],
                    date('Y-m-d')
                );
                $this->m_rawat_jalan->insert_kebidanan($params7);
                $params8 = array(
                    $this->input->post('FS_HIGH_RISK'),
                    $this->input->post('FS_NM_SUAMI'),
                    $this->input->post('FS_TGL_LAHIR_SUAMI'),
                    $this->input->post('FS_MR')
                );
                $this->m_rawat_jalan->update_high_risk($params8);
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
        redirect("nurse/rawat_jalan_kb/add_riw_kehamilan/" . $this->input->post('FS_KD_REG') . '/' . $this->input->post('FS_KD_MEDIS'));
    }

    public function add_riw_kehamilan($FS_KD_REG = "", $FS_KD_MEDIS = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "nurse/rawat_jalan_kb/add_riw_kehamilan.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG, $FS_KD_MEDIS, $FS_KD_MEDIS, $FS_KD_MEDIS)));
        $this->smarty->assign("rs_riw_kehamilan", $this->m_rawat_jalan->get_px_by_riw_kehamilan_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("FS_KD_MEDIS", $FS_KD_MEDIS);
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }

    public function add_riw_kehamilan_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('FS_RIW_KEHAMILAN_THN_PARTUS'),
                $this->input->post('FS_RIW_KEHAMILAN_TMPT_PARTUS'),
                $this->input->post('FS_RIW_KEHAMILAN_UMUR_HAMIL'),
                $this->input->post('FS_RIW_KEHAMILAN_JNS_PERSALINAN'),
                $this->input->post('FS_RIW_KEHAMILAN_PENOLONG_PERSALINAN'),
                $this->input->post('FS_RIW_KEHAMILAN_PENYULIT'),
                $this->input->post('FS_RIW_KEHAMILAN_JK'),
                $this->input->post('FS_RIW_KEHAMILAN_KEADAAN_ANAK'),
                $this->com_user['user_name'],
                date('Y-m-d')
            );
            // insert
            if ($this->m_rawat_jalan->insert_kebidanan2($params)) {
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
        redirect("nurse/rawat_jalan_kb/add_riw_kehamilan/" . $this->input->post('FS_KD_REG') . '/' . $this->input->post('FS_KD_MEDIS'));
    }
    
public function edit_riw_kehamilan($FS_KD_TRS = "",$FS_KD_REG="") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "nurse/rawat_jalan_kb/edit_riw_kehamilan.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG, $FS_KD_MEDIS, $FS_KD_MEDIS, $FS_KD_MEDIS)));
        $this->smarty->assign("rs_riw_kehamilan", $this->m_rawat_jalan->get_px_by_riw_kehamilan_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("riwayat", $this->m_rawat_jalan->get_px_by_riw_kehamilan_by_trs(array($FS_KD_TRS)));
        $this->smarty->assign("FS_KD_MEDIS", $FS_KD_MEDIS);
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }
    public function edit_riw_kehamilan_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_TRS', 'KODE REGISTER', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_RIW_KEHAMILAN_THN_PARTUS'),
                $this->input->post('FS_RIW_KEHAMILAN_TMPT_PARTUS'),
                $this->input->post('FS_RIW_KEHAMILAN_UMUR_HAMIL'),
                $this->input->post('FS_RIW_KEHAMILAN_JNS_PERSALINAN'),
                $this->input->post('FS_RIW_KEHAMILAN_PENOLONG_PERSALINAN'),
                $this->input->post('FS_RIW_KEHAMILAN_PENYULIT'),
                $this->input->post('FS_RIW_KEHAMILAN_JK'),
                $this->input->post('FS_RIW_KEHAMILAN_KEADAAN_ANAK'),
                $this->input->post('FS_KD_TRS')
            );
            // insert
            if ($this->m_rawat_jalan->update_kebidanan2($params)) {
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
        redirect("nurse/rawat_jalan_kb/add_riw_kehamilan/" . $this->input->post('FS_KD_REG') . '/' . $this->input->post('FS_KD_MEDIS'));
    }
    public function edit($FS_KD_REG = "") {
// set page rules
        $this->_set_page_rule("U");
// set template content
        $this->smarty->assign("template_content", "nurse/rawat_jalan_kb/edit.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG)));
        $this->smarty->assign("vs", $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("nyeri", $this->m_rawat_jalan->get_data_nyeri_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("jatuh", $this->m_rawat_jalan->get_data_jatuh_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("ases2", $this->m_rawat_jalan->get_data_ases2_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("alergi", $this->m_rawat_jalan->get_data_alergi_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("nutrisi", $this->m_rawat_jalan->get_data_nutrisi_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("kebidanan", $this->m_rawat_jalan->get_data_kebidanan_by_rg(array($FS_KD_REG)));
        // get instansi tujuan
        $tujuan = $this->m_rawat_jalan->list_masalah_kep_by_rg($FS_KD_REG);
        $tujuan_str = "";
        foreach ($tujuan as $key => $value) {
            $tujuan_str .= "'" . $value['FS_KD_MASALAH_KEP'] . "',";
        }
        $this->smarty->assign('rs_tujuan', $tujuan_str);

        $tembusan = $this->m_rawat_jalan->list_rencana_kep_by_rg($FS_KD_REG);
        $tembusan_str = "";
        foreach ($tembusan as $key => $value) {
            $tembusan_str .= "'" . $value['FS_KD_REN_KEP'] . "',";
        }
        $this->smarty->assign('rs_tembusan', $tembusan_str);
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
        $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                '1',
                $this->com_user['user_id'],
                date('Y-m-d'),
                $this->input->post('FS_KD_REG')
            );
            // insert
            if ($this->m_rawat_jalan->update($params)) {
                $params1 = array(
                    $this->input->post('FS_SUHU'),
                    $this->input->post('FS_NADI'),
                    $this->input->post('FS_R'),
                    $this->input->post('FS_TD'),
                    $this->input->post('FS_TB'),
                    $this->input->post('FS_BB'),
                    $this->com_user['user_id'],
                    date('Y-m-d'),
                    $this->input->post('FS_KD_REG')
                );
                $this->m_rawat_jalan->update_vs($params1);
                // insert
                $params2 = array(
                    $this->input->post('FS_NYERIP'),
                    $this->input->post('FS_NYERIQ'),
                    $this->input->post('FS_NYERIR'),
                    $this->input->post('FS_NYERIS'),
                    $this->input->post('FS_NYERIT'),
                    $this->com_user['user_id'],
                    date('Y-m-d'),
                    $this->input->post('FS_NYERI'),
                    $this->input->post('FS_KD_REG')
                );
                $this->m_rawat_jalan->update_nyeri($params2);
                $params3 = array(
                    $this->input->post('FS_CARA_BERJALAN1'),
                    $this->input->post('FS_CARA_BERJALAN2'),
                    $this->input->post('FS_CARA_DUDUK'),
                    $this->com_user['user_id'],
                    date('Y-m-d'),
                    $this->input->post('FS_KD_REG')
                );
                $this->m_rawat_jalan->update_jatuh($params3);
                //$this->m_rawat_jalan->delete_ases($params4);
                $params4 = array(
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU'),
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU2'),
                    $this->input->post('FS_RIW_PENYAKIT_KEL'),
                    $this->input->post('FS_RIW_PENYAKIT_KEL2'),
                    $this->input->post('FS_STATUS_PSIK'),
                    $this->input->post('FS_STATUS_PSIK2'),
                    $this->input->post('FS_HUB_KELUARGA'),
                    $this->input->post('FS_ST_FUNGSIONAL'),
                    $this->input->post('FS_AGAMA'),
                    $this->input->post('FS_NILAI_KHUSUS'),
                    $this->input->post('FS_NILAI_KHUSUS2'),
                    $this->input->post('FS_ANAMNESA'),
                    $this->input->post('FS_PENGELIHATAN'),
                    $this->input->post('FS_PENCIUMAN'),
                    $this->input->post('FS_PENDENGARAN'),
                    $this->input->post('FS_RIW_IMUNISASI'),
                    $this->input->post('FS_RIW_IMUNISASI_KET'),
                    $this->input->post('FS_RIW_TUMBUH'),
                    $this->input->post('FS_RIW_TUMBUH_KET'),
                     $this->input->post('FS_HIGH_RISK'),
                    $this->com_user['user_id'],
                    date('Y-m-d'),
                    $this->input->post('FS_KD_REG')
                );
                $this->m_rawat_jalan->update_ases($params4);

                $params5 = array(
                    $this->input->post('FS_ALERGI'),
                    $this->input->post('FS_ALERGI2'),
                    $this->input->post('FS_REAK_ALERGI'),
                    $this->com_user['user_id'],
                    date('Y-m-d'),
                    $this->input->post('FS_KD_REG')
                );
                $this->m_rawat_jalan->update_alergi($params5);
                $params6 = array(
                    $this->input->post('FS_NUTRISI1'),
                    $this->input->post('FS_NUTRISI2'),
                    $this->input->post('FS_NUTRISI_ANAK1'),
                    $this->input->post('FS_NUTRISI_ANAK2'),
                    $this->input->post('FS_NUTRISI_ANAK3'),
                    $this->input->post('FS_NUTRISI_ANAK4'),
                    $this->com_user['user_id'],
                    date('Y-m-d'),
                    $this->input->post('FS_KD_REG')
                );
                $this->m_rawat_jalan->update_nutrisi($params6);
                $masalah_kep = $this->input->post('tujuan');
                $this->m_rawat_jalan->delete_masalah_kep($this->input->post('FS_KD_REG'));
                if (!empty($masalah_kep)) {
                    foreach ($masalah_kep as $value) {
                        $this->m_rawat_jalan->insert_masalah_kep(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
                $rencana_kep = $this->input->post('tembusan');
                $this->m_rawat_jalan->delete_rencana_kep($this->input->post('FS_KD_REG'));
                if (!empty($rencana_kep)) {
                    foreach ($rencana_kep as $value) {
                        $this->m_rawat_jalan->insert_rencana_kep(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
                $params7 = array(
                    '',
                    '',
                    $this->input->post('FS_RIWAYAT_GYNEKOLOGI'),
                    $this->input->post('FS_RIWAYAT_GYNEKOLOGI_KET'),
                    $this->input->post('FS_RIW_MENS_UMUR_MENARCHE'),
                    $this->input->post('FS_RIW_MENS_LAMA_HAID'),
                    $this->input->post('FS_RIW_MENS_GANTI_PEMBALUT'),
                    $this->input->post('FS_RIW_MENS_HPM'),
                    $this->input->post('FS_RIW_MENS_KELUHAN'),
                    $this->input->post('FS_RIW_MENS_KELUHAN_KET'),
                    $this->input->post('FS_RIW_KB_METODE_1'),
                    $this->input->post('FS_RIW_KB_METODE_LAMA_1'),
                    $this->input->post('FS_RIW_KB_METODE_2'),
                    $this->input->post('FS_RIW_KB_METODE_LAMA_2'),
                    $this->input->post('FS_RIW_KB_KOMPLIKASI'),
                    $this->input->post('FS_RIW_KB_KOMPLIKASI_KET'),
                    $this->input->post('FS_MASALAH_KEBIDANAN'),
                    $this->input->post('FS_RENCANA_KEBIDANAN'),
                    $this->input->post('G'),
                    $this->input->post('P'),
                    $this->input->post('A'),
                    $this->input->post('FS_RIW_MENS_HPL'),
                    $this->input->post('FS_KD_REG')
                );
                $this->m_rawat_jalan->update_kebidanan($params7);
                 $params8 = array(
                    $this->input->post('FS_HIGH_RISK'),
                    $this->input->post('FS_NM_SUAMI'),
                    $this->input->post('FS_TGL_LAHIR_SUAMI'),
                    $this->input->post('FS_MR')
                );
                $this->m_rawat_jalan->update_high_risk($params8);
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
        redirect("nurse/rawat_jalan_kb/add_riw_kehamilan/" . $this->input->post('FS_KD_REG') . '/' . $this->input->post('FS_KD_MEDIS'));
    }

    public function delete_riw_kehamilan_process($FS_KD_TRS, $FS_KD_REG) {
        //set rule
        $this->_set_page_rule("D");
        $params = array($FS_KD_TRS);
        if ($this->m_rawat_jalan->delete_riw_kehamilan($params)) {
            $this->tnotification->delete_last_field();
            $this->tnotification->sent_notification("success", "Data berhasil dihapus");
            //default redirect
            redirect("nurse/rawat_jalan_kb/add_riw_kehamilan/" . $FS_KD_REG);
        } else {
            //default error
            $this->tnotification->sent_notification("error", "Data gagal dihapus");
        }

        //default redirect
        redirect("nurse/rawat_jalan_kb/add_riw_kehamilan/" . $FS_KD_REG);
    }

    public function rekap_excel() {
        // load excel
        $this->load->library('phpexcel');
        // create excell
        $filepath = "resource/doc/excel/rekap_resume_rawat_jalan.xlsx";
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $this->phpexcel = $objReader->load($filepath);
        $objWorksheet = $this->phpexcel->setActiveSheetIndex(0);
        // search param
        $year = date("Y");
        $month = date("m");
        $search = $this->tsession->userdata('nurse_rawat_jalan');
        $FD_TGL_MASUK = empty($search['FD_TGL_MASUK']) ? : $search['FD_TGL_MASUK'];
        $FS_KD_PEG = empty($search['FS_KD_PEG']) ? : $search['FS_KD_PEG'];
        $now = date('Y-m-d');
        // surat
        $surat = $this->m_rawat_jalan->get_px_by_dokter_wait(array($FD_TGL_MASUK, $FS_KD_PEG, $FS_KD_PEG, $FS_KD_PEG));
        $dokter = $this->m_rawat_jalan->get_dokter2($FS_KD_PEG);
        $bln = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        );
        foreach ($bln as $key => $value) {
            if ($key == $bulan) {
                $bulann = $value;
            }
        }
        /*
         * SET DATA EXCELL
         */
        $objWorksheet->setCellValue('A6', 'DATA PASIEN RAWAT JALAN DOKTER ' . $dokter['FS_NM_PEG'] . ' Tanggal ' . strtoupper($now));

        $i = 9;
        $no = 1;
        foreach ($surat as $data) {
            $objWorksheet->setCellValue('A' . $i, $no++ . '.');
            $objWorksheet->setCellValue('B' . $i, $data['FS_KD_REG']);
            $objWorksheet->setCellValue('C' . $i, $data['FS_MR']);
            $objWorksheet->setCellValue('D' . $i, $data['FS_NM_PASIEN']);
            $objWorksheet->setCellValue('E' . $i, $data['FS_ALM_PASIEN']);
            $objWorksheet->setCellValue('F' . $i, strip_tags($data['FS_DIAGNOSA']));
            $objWorksheet->setCellValue('G' . $i, strip_tags($data['FS_TINDAKAN']));
            // insert
            if (($i - 8) != count($surat)) {
                $objWorksheet->insertNewRowBefore(($i + 1), 1);
            }
            // next row
            $i++;
        }
        // file_name
        $file_name = "DATA_PASIEN_RAWAT_JALAN_DOKTER_" . $dokter['FS_NM_PEG'] . "_Tanggal_" . strtoupper($now);
        //--
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $file_name . '.xlsx');
        header('Cache-Control: max-age=0');
        // output
        $obj_writer = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel2007');
        $obj_writer->save('php://output');
        exit();
    }

    public function list_masalah_kep() {
        $instansi = $this->m_rawat_jalan->list_masalah_kep();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['FS_NM_MASALAH_KEP'],
                'value' => $value['FS_KD_TRS']
            );
            $i++;
        }
        echo json_encode($data);
    }

    public function list_rencana_kep() {
        $instansi = $this->m_rawat_jalan->list_rencana_kep();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['FS_NM_REN_KEP'],
                'value' => $value['FS_KD_TRS']
            );
            $i++;
        }
        echo json_encode($data);
    }

}
