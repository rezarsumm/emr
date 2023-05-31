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
        $this->load->model('m_surat_sehat');
        $this->load->model('m_surat');
        $this->smarty->assign('m_igd', $this->m_igd);
        $this->smarty->assign('m_rawat_jalan', $this->m_rawat_jalan);
        $this->load->library('tnotification');
    }

// list surat masuk
    public function index() {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "medis/igd/index.html");
        $this->smarty->load_javascript('resource/js/jquery.datatables/jquery.dataTables.js');
        $this->smarty->load_javascript('resource/js/jquery.datatables/dataTables.fixedHeader.js');
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->load_style("jquery.ui/datatables/jquery.dataTables.css");
// load javascript
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-1.9.2.custom.min.js');
        $search = $this->tsession->userdata('medis_rawat_jalan');
        if (!empty($search)) {
            $this->smarty->assign("search", $search);
        }
        if (empty($search['FD_TGL_MASUK'])) {
            $search['FD_TGL_MASUK'] = date('Y-m-d');
            $this->smarty->assign("search", $search);
        }
        $this->smarty->assign("FD_TGL_MASUK", $search['FD_TGL_MASUK']);
        $FD_TGL_MASUK = empty($search['FD_TGL_MASUK']) ? : $search['FD_TGL_MASUK'];
        // search parameters
        $FS_KD_PEG = $this->com_user['user_name'];
        $now = date('Y-m-d');
// get search parameter
        $this->smarty->assign("rs_pasien", $this->m_igd->get_px_by_dokter_wait_dokter(array($FD_TGL_MASUK, $FS_KD_PEG, $FS_KD_PEG, $FS_KD_PEG)));
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
        if ($this->input->post('save') == "Reset") {
            $this->tsession->unset_userdata("medis_rawat_jalan");
        } else {
            $params = array(
                "FD_TGL_MASUK" => $this->input->post("FD_TGL_MASUK")
            );
            $this->tsession->set_userdata("medis_rawat_jalan", $params);
        }
        // redirect
        redirect("medis/igd");
    }

    public function history($FS_MR = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "medis/igd/history.html");
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
        $this->smarty->assign("result", $this->m_igd->get_px_by_dokter_by_rm(array($now, $FS_MR)));
        $this->smarty->assign("rs_pasien", $this->m_igd->get_px_history(array($now, $medis, $FS_MR)));
        //$this->smarty->assign("form", $this->m_igd->get_px_form(array($now, $medis, $medis, $medis, $FS_MR)));
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }

    public function add_covid($FS_KD_REG = "", $FS_KD_REG2 = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "medis/igd/add_covid.html");
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
        $FS_MR = $this->m_igd->get_rm_px_by_rg(array($FS_KD_REG2));
        $this->smarty->assign("result", $this->m_igd->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG2)));
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
                $cekmedis = $this->m_igd->cek_medis($this->input->post('FS_KD_REG'));
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
            if ($cekcovid == '1') {
                redirect("medis/igd/edit_covid2/" . $this->input->post('FS_KD_REG'));
            } elseif ($cekcovid == '0') {
                redirect("medis/igd/add_covid2/" . $this->input->post('FS_KD_REG'));
            } else {
                redirect("medis/igd/add/" . $this->input->post('FS_KD_REG'));
            }
        } else {
            if ($cekmedis == '1') {
                redirect("medis/igd/edit/" . $this->input->post('FS_KD_REG'));
            } elseif ($cekmedis == '0') {
                redirect("medis/igd/add/" . $this->input->post('FS_KD_REG'));
            } else {
                redirect("medis/igd/add/" . $this->input->post('FS_KD_REG'));
            }
        }
    }

    public function edit_covid($FS_KD_REG = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "medis/igd/edit_covid.html");
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
                $cekmedis = $this->m_igd->cek_medis($this->input->post('FS_KD_REG'));
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
                redirect("medis/igd/edit_covid2/" . $this->input->post('FS_KD_REG'));
            } elseif ($cekcovid == '0') {
                redirect("medis/igd/add_covid2/" . $this->input->post('FS_KD_REG'));
            } else {
                redirect("medis/igd/add/" . $this->input->post('FS_KD_REG'));
            }
        } else {
            if ($cekmedis == '1') {
                redirect("medis/igd/edit/" . $this->input->post('FS_KD_REG'));
            } elseif ($cekmedis == '0') {
                redirect("medis/igd/add/" . $this->input->post('FS_KD_REG'));
            } else {
                redirect("medis/igd/add/" . $this->input->post('FS_KD_REG'));
            }
        }
    }

    public function add_covid2($FS_KD_REG = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "medis/igd/add_covid2.html");
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
                $cekmedis = $this->m_igd->cek_medis($this->input->post('FS_KD_REG'));
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
        if ($cekmedis == '1') {
            redirect("medis/igd/edit/" . $this->input->post('FS_KD_REG'));
        } elseif ($cekmedis == '0') {
            redirect("medis/igd/add/" . $this->input->post('FS_KD_REG'));
        } else {
            redirect("medis/igd/add/" . $this->input->post('FS_KD_REG'));
        }
    }

    public function edit_covid2($FS_KD_REG = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "medis/igd/edit_covid2.html");
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
                $cekmedis = $this->m_igd->cek_medis($this->input->post('FS_KD_REG'));
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
        if ($cekmedis == '1') {
            redirect("medis/igd/edit/" . $this->input->post('FS_KD_REG'));
        } elseif ($cekmedis == '0') {
            redirect("medis/igd/add/" . $this->input->post('FS_KD_REG'));
        } else {
            redirect("medis/igd/add/" . $this->input->post('FS_KD_REG'));
        }
    }
    
    public function add($FS_KD_REG = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "medis/igd/add.html");
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
        $this->smarty->assign("vs", $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("kp", $this->m_igd->get_data_medis_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("ases2", $this->m_igd->get_data_ases2_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("terapi", $this->m_igd->get_data_terapi_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("alergi", $this->m_igd->get_data_alergi_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("nutrisi", $this->m_igd->get_data_nutrisi_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("nyeri", $this->m_rawat_jalan->get_data_nyeri_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("masalah", $this->m_igd->get_data_masalah_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("ases_kebid", $this->m_igd->get_data_ases_kebid_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("rs_pasien", $this->m_igd->get_px_history(array($now, $medis, $FS_MR['FS_MR'])));
        $this->smarty->assign("rs_pasien_inap", $this->m_rawat_jalan->get_px_rawat_inap(array($FS_MR['FS_MR'])));
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
        $this->tnotification->set_rules('FS_KD_LAYANAN', 'LAYANAN', 'trim|required');
        $this->tnotification->set_rules('FS_KD_PETUGAS_MEDIS', 'DOKTER', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {

            $params = array(
                '',
                $this->input->post('FS_KD_REG'),
                $this->input->post('FS_DIAGNOSA'),
                $this->input->post('FS_ANAMNESA'),
                $this->input->post('FS_TINDAKAN'),
                $this->input->post('FS_TERAPI'),
                $this->input->post('FS_CATATAN_FISIK'),
                $this->com_user['user_name'],
                $this->input->post('FS_CARA_PULANG'),
                $this->input->post('FS_DAFTAR_MASALAH'),
                '',
                $this->com_user['user_id'],
                date('Y-m-d'),
                date('H:i:s')
            );
            // insert
            if ($this->m_igd->insert_tac_rj_medis($params)) {
                $FS_KD_TRS = $this->m_igd->get_last_inserted_id();
                //$ceksehatcovid = $this->m_igd->cek_sehat_covid();

                $this->m_rawat_jalan->update_level_medis(array('2', $this->input->post('FS_KD_REG')));
                $params8 = array(
                    $this->input->post('FS_ALERGI'),
                    $this->input->post('FS_HIGH_RISK'),
                    $this->input->post('FS_MR')
                );
                $this->m_rawat_jalan->update_high_risk2($params8);
                $data_surat = $this->m_surat_sehat->get_no_surat();
                $NOSURAT = 'SK' . $data_surat['SURAT'];
                $NOSURAT2 = $data_surat['SURAT'] + 1;
                $this->m_surat_sehat->update_tz_parameter_no_surat(array($NOSURAT2));

                $params1 = array(
                    $NOSURAT,
                    date('Y-m-d'),
                    date('H:i:s'),
                    '4',
                    $NOSURAT . '/' . date('m') . '/' . date('Y'),
                    $this->input->post('FS_KD_REG'),
                    $this->com_user['user_name'],
                    $this->input->post('FS_DIAGNOSA'),
                    $this->input->post('FS_ANAMNESA'),
                    $this->input->post('FS_TINDAKAN'),
                    $this->input->post('FS_CATATAN_FISIK'),
                    '',
                    $this->com_user['user_name'],
                    $this->com_user['user_name']
                );
                // insert
                $this->m_surat_sehat->insert_igd($params1);
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
        if ($this->input->post('FS_CARA_PULANG') == '7') {

            redirect("medis/igd/edit_sehat_covid/" . $this->input->post('FS_KD_REG'));
        } else {
            redirect("medis/igd/");
        }
    }

    public function edit($FS_KD_REG = "", $FS_KD_TRS = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "medis/igd/edit.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $medis = 'P012';
        $FS_MR = $this->m_igd->get_rm_px_by_rg(array($FS_KD_REG));
        $this->smarty->assign("result", $this->m_igd->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG)));
        $this->smarty->assign("medis", $this->m_igd->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS)));
        $this->smarty->assign("rs_pasien", $this->m_igd->get_px_history(array($now, $medis, $FS_MR['FS_MR'])));
        $this->smarty->assign("rs_pasien_inap", $this->m_rawat_jalan->get_px_rawat_inap(array($FS_MR['FS_MR'])));
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
        $this->tnotification->set_rules('FS_KD_REG', 'KODE TRANSAKSI', 'trim|required');
        $this->tnotification->set_rules('FS_KD_LAYANAN', 'LAYANAN', 'trim|required');
        $this->tnotification->set_rules('FS_KD_PETUGAS_MEDIS', 'DOKTER', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_DIAGNOSA'),
                $this->input->post('FS_ANAMNESA'),
                $this->input->post('FS_TINDAKAN'),
                $this->input->post('FS_TERAPI'),
                $this->input->post('FS_CATATAN_FISIK'),
                $this->input->post('FS_CARA_PULANG'),
                $this->input->post('FS_DAFTAR_MASALAH'),
                $this->com_user['user_id'],
                date('Y-m-d'),
                $this->input->post('FS_KD_REG')
            );

            if ($this->m_igd->update_tac_rj_medis($params)) {
                $this->m_rawat_jalan->update_level_medis(array('2', $this->input->post('FS_KD_REG')));

                $params8 = array(
                    $this->input->post('FS_ALERGI'),
                    $this->input->post('FS_HIGH_RISK'),
                    $this->input->post('FS_MR')
                );
                $this->m_rawat_jalan->update_high_risk2($params8);

                $params1 = array(
                    date('Y-m-d'),
                    date('H:i:s'),
                    '4',
                    $this->com_user['user_name'],
                    $this->input->post('FS_DIAGNOSA'),
                    $this->input->post('FS_ANAMNESA'),
                    $this->input->post('FS_TINDAKAN'),
                    $this->input->post('FS_CATATAN_FISIK'),
                    $this->com_user['user_name'],
                    $this->com_user['user_name'],
                    $this->input->post('FS_KD_REG')
                );
                // insert
                $this->m_surat->update_surat($params1);

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
        if ($this->input->post('FS_CARA_PULANG') == '7') {

            redirect("medis/igd/edit_sehat_covid/" . $this->input->post('FS_KD_REG'));
        } else {
            redirect("medis/igd/");
        }
    }

    public function edit_sehat_covid($FS_KD_REG = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "medis/igd/edit_sehat_covid.html");
        // load javascript    
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $this->smarty->assign("result", $this->m_igd->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG)));
        $this->smarty->assign("rs_surat", $this->m_igd->get_surat_covid($FS_KD_REG));
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }

    public function edit_sehat_covid_process() {
        // set page rules
        $this->_set_page_rule("U");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KETERANGAN5'),
                $this->input->post('FS_KD_REG')
            );
            // insert
            if ($this->m_igd->update_surat_covid($params)) {
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
        redirect("medis/igd/");
    }

    public function edit_skdp($FS_KD_REG = "") {
// set page rules
        $this->_set_page_rule("U");
// set template content
        $this->smarty->assign("template_content", "medis/igd/edit_skdp.html");
        // load javascript    
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $this->smarty->assign("result", $this->m_igd->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG)));
        $this->smarty->assign("rs_skdp_alasan", $this->m_igd->get_tac_com_parameter_alasan());
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }

    public function edit_skdp_process() {
        // set page rules
        $this->_set_page_rule("U");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE TRANSAKSI', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_SKDP_1'),
                $this->input->post('FS_SKDP_2'),
                $this->input->post('FS_SKDP_KET'),
                $this->input->post('FS_SKDP_KONTROL'),
                $this->input->post('FS_KD_REG')
            );

            // insert
            //if ($this->m_igd->update_medis($params)) {
            if ($this->m_igd->update_tac_rj_skdp($params)) {
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
        redirect("medis/igd/cetak/" . $this->input->post('FS_KD_REG') . '/' . $this->input->post('FS_KD_TRS'));
    }

    public function add_kontak_process() {
        $params = array(
            $this->input->post('FS_KD_REG'),
            $this->input->post('FS_NM_KONTAK'),
            $this->input->post('FS_NM_DOMISILI'),
            $this->input->post('FS_NO_HP')
        );
        // insert
        $data = $this->m_igd->insert_kontak($params);
        echo json_encode($data);
    }

    public function list_kontak_pasien() {
        $params = array(
            $this->input->post('FS_KD_REG2')
        );
        $data = $this->m_igd->get_data_kontak($params);
        echo json_encode($data);
    }

    public function delete_kontak_process() {
        $params = array(
            $this->input->post('kode')
        );
        // insert
        $data = $this->m_igd->delete_kontak_process($params);
        echo json_encode($data);
    }

    public function list_jenis_spesimen() {
        $instansi = $this->m_igd->list_jenis_spesimen();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['FS_NM_SPESIMEN'],
                'value' => $value['FS_KD_TRS']
            );
            $i++;
        }
        echo json_encode($data);
    }

}
