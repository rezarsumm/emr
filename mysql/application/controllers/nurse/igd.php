<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class igd extends ApplicationBase {

// constructor
    public function __construct() {
// parent constructor
        parent::__construct();
// load model
        $this->load->model('m_igd');
        $this->load->model('m_rawat_jalan');
        $this->load->model('m_rawat_jalan_nurse');
        $this->smarty->assign('m_rawat_jalan', $this->m_rawat_jalan);
        $this->smarty->assign('m_rawat_jalan_nurse', $this->m_rawat_jalan_nurse);
        $this->load->library('tnotification');
    }

// list surat masuk
    public function index() {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "nurse/igd/index.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $search = $this->tsession->userdata('nurse_igd');
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
        $now = date('Y-m-d');
// get search parameter
        $this->smarty->assign("rs_pasien", $this->m_igd->get_px_by_dokter_wait_igd(array($FD_TGL_MASUK, $FS_KD_PEG, $FS_KD_PEG, $FS_KD_PEG)));
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }

    public function history($FS_MR = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "nurse/igd/history.html");
        $this->smarty->load_javascript('resource/js/jquery.datatables/jquery.dataTables.js');
        $this->smarty->load_javascript('resource/js/jquery.datatables/dataTables.fixedHeader.js');
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->load_style("jquery.ui/datatables/jquery.dataTables.css");
// load javascript
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-1.9.2.custom.min.js');
// get search parameter
        $now = date('Y-m-d');
        $medis = 'P012';
        $this->smarty->assign("no", '1');
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rm(array($now, $FS_MR)));
        $this->smarty->assign("rs_pasien", $this->m_igd->get_px_history_nurse(array($now, $medis, $FS_MR)));
        //$this->smarty->assign("form", $this->m_igd->get_px_form(array($now, $medis, $medis, $medis, $FS_MR)));
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }

    public function add_covid($FS_KD_REG = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "nurse/igd/add_covid.html");
        // load javascript    
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $medis = 'P012';
        $FS_MR = $this->m_igd->get_rm_px_by_rg(array($FS_KD_REG));
        $this->smarty->assign("result", $this->m_igd->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG)));
        $this->smarty->assign("rs_pasien", $this->m_igd->get_px_history(array($now, $medis, $FS_MR['FS_MR'])));
        $this->smarty->assign("rs_pasien_inap", $this->m_rawat_jalan->get_px_rawat_inap(array($FS_MR['FS_MR'])));
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }

    public function add_covid_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
        $this->tnotification->set_rules('FS_KD_LAYANAN', 'LAYANAN', 'trim|required');
        $this->tnotification->set_rules('FS_KD_PETUGAS_MEDIS', 'DOKTER', 'trim|required');
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
                $this->input->post('FS_LOKASI'),
                $this->input->post('FD_TGL_BERANGKAT'),
                $this->input->post('FD_TGL_PULANG'),
                $this->input->post('FS_LOKASI2'),
                $this->input->post('FD_TGL_BERANGKAT2'),
                $this->input->post('FD_TGL_PULANG2'),
                $this->input->post('FS_KESIMPULAN'),
                $this->com_user['user_name'],
                date('Y-m-d'),
            );
            // insert
            if ($this->m_igd->insert_covid($params)) {
                $cekcovid = $this->m_igd->cek_form_covid($this->input->post('FS_KD_REG'));
                $cekasesperawat = $this->m_rawat_jalan->cek_ases_perawat_by_rg($this->input->post('FS_KD_REG'));
                $params1 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FS_SUHU')
                );
                $this->m_rawat_jalan->insert_vs_covid($params1);
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
        if ($this->input->post('FS_KESIMPULAN') == 'ODP' OR $this->input->post('FS_KESIMPULAN') == 'PDP') {
            if ($cekcovid >= '1') {
                redirect("nurse/igd/edit_covid2/" . $this->input->post('FS_KD_REG'));
            } elseif ($cekcovid == '0') {
                redirect("nurse/igd/add_covid2/" . $this->input->post('FS_KD_REG'));
            } else {
                redirect("nurse/igd/add/" . $this->input->post('FS_KD_REG'));
            }
        } else {
            
            if ($cekasesperawat >= '1') {
                redirect("nurse/igd/edit/" . $this->input->post('FS_KD_REG'));
            } elseif ($cekasesperawat == '0') {
                redirect("nurse/igd/add/" . $this->input->post('FS_KD_REG'));
            } else {
                redirect("nurse/igd/add/" . $this->input->post('FS_KD_REG'));
            }
        }
    }

    public function edit_covid($FS_KD_REG = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "nurse/igd/edit_covid.html");
        // load javascript    
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $medis = 'P012';
        $FS_MR = $this->m_igd->get_rm_px_by_rg(array($FS_KD_REG));
        $this->smarty->assign("result", $this->m_igd->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG)));
        $this->smarty->assign("rs_pasien", $this->m_igd->get_px_history(array($now, $medis, $FS_MR['FS_MR'])));
        $this->smarty->assign("rs_pasien_inap", $this->m_rawat_jalan->get_px_rawat_inap(array($FS_MR['FS_MR'])));
        $this->smarty->assign("result_covid", $this->m_igd->get_px_covid(array($FS_KD_REG)));
        $this->smarty->assign("vs", $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG)));
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }

    public function edit_covid_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $skor = $this->input->post('FS_PARAM_1') + $this->input->post('FS_PARAM_2') + $this->input->post('FS_PARAM_3') + $this->input->post('FS_PARAM_4') + $this->input->post('FS_PARAM_5') + $this->input->post('FS_PARAM_6') + $this->input->post('FS_PARAM_7');

            if ($skor == '7') {
                $FS_KESIMPULAN = 'OTG';
            } elseif ($skor == '9') {
                $FS_KESIMPULAN = 'ODP';
            } elseif ($skor == '11') {
                $FS_KESIMPULAN = 'ODP';
            } elseif ($skor == '8') {
                $FS_KESIMPULAN = 'PDP';
            } elseif ($skor == '10') {
                $FS_KESIMPULAN = 'PDP';
            } elseif ($skor == '12') {
                $FS_KESIMPULAN = 'PDP';
            } elseif ($skor == '13') {
                $FS_KESIMPULAN = 'PDP';
            } elseif ($skor == '15') {
                $FS_KESIMPULAN = 'PDP';
            } elseif ($skor == '16') {
                $FS_KESIMPULAN = 'PDP';
            } else {
                $FS_KESIMPULAN = 'NONCOVID';
            }

            $params = array(
                $this->input->post('FS_PARAM_1'),
                $this->input->post('FS_PARAM_2'),
                $this->input->post('FS_PARAM_3'),
                $this->input->post('FS_PARAM_4'),
                $this->input->post('FS_PARAM_5'),
                $this->input->post('FS_PARAM_6'),
                $this->input->post('FS_PARAM_7'),
                $this->input->post('FS_LOKASI'),
                $this->input->post('FD_TGL_BERANGKAT'),
                $this->input->post('FD_TGL_PULANG'),
                $this->input->post('FS_LOKASI2'),
                $this->input->post('FD_TGL_BERANGKAT2'),
                $this->input->post('FD_TGL_PULANG2'),
                $FS_KESIMPULAN,
                $this->com_user['user_name'],
                date('Y-m-d'),
                $this->input->post('FS_KD_REG')
            );
            // insert
            if ($this->m_igd->update_covid($params)) {
                $cekcovid = $this->m_igd->cek_form_covid($this->input->post('FS_KD_REG'));
                $cekasesperawat = $this->m_rawat_jalan->cek_ases_perawat_by_rg($this->input->post('FS_KD_REG'));
                $params1 = array(
                    $this->input->post('FS_SUHU'),
                    $this->input->post('FS_KD_REG')
                );
                $this->m_rawat_jalan->update_vs_covid($params1);
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
        if ($FS_KESIMPULAN == 'ODP' OR $FS_KESIMPULAN == 'PDP') {
            if ($cekcovid == '1') {
                redirect("nurse/igd/edit_covid2/" . $this->input->post('FS_KD_REG'));
            } elseif ($cekcovid == '0') {
                redirect("nurse/igd/add_covid2/" . $this->input->post('FS_KD_REG'));
            } else {
                redirect("nurse/igd/add/" . $this->input->post('FS_KD_REG'));
            }
        } else {
             if ($cekasesperawat >= '1') {
                redirect("nurse/igd/edit/" . $this->input->post('FS_KD_REG'));
            } elseif ($cekasesperawat == '0') {
                redirect("nurse/igd/add/" . $this->input->post('FS_KD_REG'));
            } else {
                redirect("nurse/igd/add/" . $this->input->post('FS_KD_REG'));
            }
        }
    }

    public function add_covid2($FS_KD_REG = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "nurse/igd/add_covid2.html");
        // load javascript    
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $medis = 'P012';
        $FS_MR = $this->m_igd->get_rm_px_by_rg(array($FS_KD_REG));
        $this->smarty->assign("result", $this->m_igd->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG)));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }

    public function add_covid2_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE TRANSAKSI', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('FD_TGL_KUNJUNG'),
                $this->input->post('FS_TEMPAT_KUNJUNG'),
                $this->input->post('FS_INFEKSI'),
                $this->input->post('FS_INFEKSI2')
            );

            if ($this->m_igd->insert_covid2($params)) {
                $cekmedis = $this->m_rawat_jalan->cek_ases_perawat_by_rg($this->input->post('FS_KD_REG'));
                $params2 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FS_KOMORBID1'),
                    $this->input->post('FS_KOMORBID2'),
                    $this->input->post('FS_KOMORBID3'),
                    $this->input->post('FS_KOMORBID4'),
                    $this->input->post('FS_KOMORBID5'),
                    $this->input->post('FS_KOMORBID6'),
                    $this->input->post('FS_KOMORBID7'),
                    $this->input->post('FD_TGL_PANAS')
                );
                $this->m_igd->insert_covid3($params2);

                $spesimen = $this->input->post('tujuan');
                if (!empty($spesimen)) {
                    foreach ($spesimen as $value) {
                        $this->m_igd->insert_covid4(array($this->input->post('FS_KD_REG'), $value));
                    }
                }

                $params4 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FD_SPES_TANGGAL'),
                    $this->input->post('FS_SPES_PENGIRIM'),
                    $this->input->post('FS_SPES_DINAS'),
                    $this->input->post('FS_SPES_PROV'),
                    $this->input->post('FS_SPES_RS'),
                    $this->input->post('RS_SPES_RS_KOTA'),
                    $this->input->post('FS_SPES_DPJP'),
                    $this->input->post('FS_SPES_HP')
                );
                // insert
                $this->m_igd->insert_covid5($params4);

                $params5 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FS_SPES_GEJALA1'),
                    $this->input->post('FS_SPES_GEJALA2'),
                    $this->input->post('FS_SPES_GEJALA3'),
                    $this->input->post('FS_SPES_GEJALA4'),
                    $this->input->post('FS_SPES_GEJALA5'),
                    $this->input->post('FS_SPES_GEJALA6'),
                    $this->input->post('FS_SPES_GEJALA7'),
                    $this->input->post('FS_SPES_GEJALA8'),
                    $this->input->post('FS_SPES_GEJALA9')
                );
                // insert
                $this->m_igd->insert_covid6($params5);

                $params6 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FS_PEN_XRAY'),
                    $this->input->post('FS_PEN_VENT')
                );
                // insert
                $this->m_igd->insert_covid7($params6);

                $params7 = array(
                    $this->input->post('FS_TINDAK_LANJUT'),
                    $this->input->post('FS_KD_REG')
                );
                // insert
                $this->m_igd->update_covid1($params7);

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
        if ($cekmedis >= '1') {
            redirect("nurse/igd/edit/" . $this->input->post('FS_KD_REG'));
        } elseif ($cekmedis == '0') {
            redirect("nurse/igd/add/" . $this->input->post('FS_KD_REG'));
        } else {
            redirect("nurse/igd/add/" . $this->input->post('FS_KD_REG'));
        }
    }

    public function edit_covid2($FS_KD_REG = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "nurse/igd/edit_covid2.html");
        // load javascript    
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $medis = 'P012';
        $FS_MR = $this->m_igd->get_rm_px_by_rg(array($FS_KD_REG));
        $this->smarty->assign("result", $this->m_igd->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG)));
        $this->smarty->assign("result1", $this->m_igd->get_data_covid1_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("result3", $this->m_igd->get_data_covid3_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("result4", $this->m_igd->get_data_covid4_by_rg(array($FS_KD_REG)));
        $spesimen = $this->m_igd->get_data_covid5_by_rg($FS_KD_REG);
        $tujuan_str = "";
        foreach ($spesimen as $key => $value) {
            $tujuan_str .= "'" . $value['FS_KD_SPESIMEN'] . "',";
        }
        $this->smarty->assign('rs_tujuan', $tujuan_str);
        $this->smarty->assign("result6", $this->m_igd->get_data_covid6_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("result7", $this->m_igd->get_data_covid7_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("result8", $this->m_igd->get_data_covid8_by_rg(array($FS_KD_REG)));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }

    public function edit_covid2_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE TRANSAKSI', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FD_TGL_KUNJUNG'),
                $this->input->post('FS_TEMPAT_KUNJUNG'),
                $this->input->post('FS_INFEKSI'),
                $this->input->post('FS_INFEKSI2'),
                $this->input->post('FS_KD_REG')
            );

            if ($this->m_igd->update_covid3($params)) {
                $cekmedis = $this->m_rawat_jalan->cek_ases_perawat_by_rg($this->input->post('FS_KD_REG'));
                $params2 = array(
                    $this->input->post('FS_KOMORBID1'),
                    $this->input->post('FS_KOMORBID2'),
                    $this->input->post('FS_KOMORBID3'),
                    $this->input->post('FS_KOMORBID4'),
                    $this->input->post('FS_KOMORBID5'),
                    $this->input->post('FS_KOMORBID6'),
                    $this->input->post('FS_KOMORBID7'),
                    $this->input->post('FD_TGL_PANAS'),
                    $this->input->post('FS_KD_REG')
                );
                $this->m_igd->update_covid4($params2);

                $this->m_igd->delete_covid5($this->input->post('FS_KD_REG'));
                $spesimen = $this->input->post('tujuan');
                if (!empty($spesimen)) {
                    foreach ($spesimen as $value) {
                        $this->m_igd->insert_covid4(array($this->input->post('FS_KD_REG'), $value));
                    }
                }

                $params4 = array(
                    $this->input->post('FD_SPES_TANGGAL'),
                    $this->input->post('FS_SPES_PENGIRIM'),
                    $this->input->post('FS_SPES_DINAS'),
                    $this->input->post('FS_SPES_PROV'),
                    $this->input->post('FS_SPES_RS'),
                    $this->input->post('RS_SPES_RS_KOTA'),
                    $this->input->post('FS_SPES_DPJP'),
                    $this->input->post('FS_SPES_HP'),
                    $this->input->post('FS_KD_REG')
                );
                // insert
                $this->m_igd->update_covid6($params4);

                $params5 = array(
                    $this->input->post('FS_SPES_GEJALA1'),
                    $this->input->post('FS_SPES_GEJALA2'),
                    $this->input->post('FS_SPES_GEJALA3'),
                    $this->input->post('FS_SPES_GEJALA4'),
                    $this->input->post('FS_SPES_GEJALA5'),
                    $this->input->post('FS_SPES_GEJALA6'),
                    $this->input->post('FS_SPES_GEJALA7'),
                    $this->input->post('FS_SPES_GEJALA8'),
                    $this->input->post('FS_SPES_GEJALA9'),
                    $this->input->post('FS_KD_REG')
                );
                // insert
                $this->m_igd->update_covid7($params5);

                $params6 = array(
                    $this->input->post('FS_PEN_XRAY'),
                    $this->input->post('FS_PEN_VENT'),
                    $this->input->post('FS_KD_REG')
                );
                // insert
                $this->m_igd->update_covid8($params6);

                $params7 = array(
                    $this->input->post('FS_TINDAK_LANJUT'),
                    $this->input->post('FS_KD_REG')
                );
                // insert
                $this->m_igd->update_covid1($params7);

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
        if ($cekmedis >= '1') {
            redirect("nurse/igd/edit/" . $this->input->post('FS_KD_REG'));
        } elseif ($cekmedis == '0') {
            redirect("nurse/igd/add/" . $this->input->post('FS_KD_REG'));
        } else {
            redirect("nurse/igd/add/" . $this->input->post('FS_KD_REG'));
        }
    }

    public function add($FS_KD_REG = "", $FS_KD_MEDIS = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "nurse/igd/add.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $this->smarty->assign("result", $this->m_igd->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG, $FS_KD_MEDIS, $FS_KD_MEDIS, $FS_KD_MEDIS)));
        $this->smarty->assign("vs", $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG)));
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
                '1',
                $this->com_user['user_id'],
                date('Y-m-d')
            );
            // insert
            if ($this->m_igd->insert($params)) {
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
                    '',
                    '',
                    '',
                    '',
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
                    '',
                    '',
                    $this->com_user['user_id'],
                    date('Y-m-d')
                );
                $this->m_rawat_jalan_nurse->insert_ases($params4);
                
                $params5 = array(
                    $this->input->post('FS_ALERGI'),
                    $this->input->post('FS_REAK_ALERGI'),
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU'),
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU2'),
                    $this->input->post('FS_MR')
                );
                $this->m_rawat_jalan_nurse->insert_alergi($params5);
                
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
        redirect("nurse/igd");
    }

    public function edit($FS_KD_REG = "") {
// set page rules
        $this->_set_page_rule("U");
// set template content
        $this->smarty->assign("template_content", "nurse/igd/edit.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $this->smarty->assign("result", $this->m_igd->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG)));
        $this->smarty->assign("vs", $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("nyeri", $this->m_rawat_jalan->get_data_nyeri_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("jatuh", $this->m_rawat_jalan->get_data_jatuh_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("ases2", $this->m_rawat_jalan->get_data_ases2_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("nutrisi", $this->m_rawat_jalan->get_data_nutrisi_by_rg(array($FS_KD_REG)));
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
                //$this->m_igd->delete_ases($params4);
                $params4 = array(
                    '',
                    '',
                    '',
                    '',
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
                    '',
                    '',
                    $this->com_user['user_id'],
                    date('Y-m-d'),
                    $this->input->post('FS_KD_REG')
                );
                $this->m_rawat_jalan_nurse->update_ases($params4);

                $params5 = array(
                    $this->input->post('FS_ALERGI'),
                    $this->input->post('FS_REAK_ALERGI'),
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU'),
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU2'),
                    $this->input->post('FS_MR')
                );
                $this->m_rawat_jalan_nurse->insert_alergi($params5);

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
        redirect("nurse/igd");
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
        $search = $this->tsession->userdata('nurse_igd');
        $FD_TGL_MASUK = empty($search['FD_TGL_MASUK']) ? : $search['FD_TGL_MASUK'];
        $FS_KD_PEG = empty($search['FS_KD_PEG']) ? : $search['FS_KD_PEG'];
        $now = date('Y-m-d');
        // surat
        $surat = $this->m_igd->get_px_by_dokter_wait(array($FD_TGL_MASUK, $FS_KD_PEG, $FS_KD_PEG, $FS_KD_PEG));
        $dokter = $this->m_igd->get_dokter2($FS_KD_PEG);
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
        $instansi = $this->m_igd->list_masalah_kep();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['FS_NM_DIAGNOSA'],
                'value' => $value['FS_KD_DAFTAR_DIAGNOSA']
            );
            $i++;
        }
        echo json_encode($data);
    }

    public function list_rencana_kep() {
        $instansi = $this->m_igd->list_rencana_kep();
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
