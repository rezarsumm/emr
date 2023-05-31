<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class covid extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_inap_covid');
        $this->load->model('m_ass_awal');
        $this->load->model('m_igd');
        $this->load->model('m_rawat_jalan');
        // load library
        $this->load->library('tnotification');
    }

    // tambah surat masuk
    public function index() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/covid/list.html");
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
        redirect("inap/covid/add/" . $this->input->post('FS_RG'));
    }

    public function add($FS_RG = '') {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/covid/add.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_inap_covid->get_pasien_by_rg($FS_RG));
        $this->smarty->assign("rs_covid", $this->m_inap_covid->get_px_covid_by_rg(array($FS_RG)));
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
                $this->input->post('FS_SUHU'),
                $this->com_user['user_name'],
                date('Y-m-d'),
            );
            // insert
            if ($this->m_inap_covid->insert($params)) {
                $FS_KD_TRS = $this->m_inap_covid->get_last_inserted_id();
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
            redirect("inap/covid/add_covid/" . $this->input->post('FS_KD_REG') . '/' . $FS_KD_TRS);
        } else {
            redirect("inap/covid/");
        }
    }

    public function edit($FS_KD_REG = "", $FS_KD_TRS = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "inap/covid/edit.html");
        // load javascript    
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");

        $this->smarty->assign("rs_pasien", $this->m_inap_covid->get_pasien_by_rg($FS_KD_REG));
        $this->smarty->assign("result_covid", $this->m_inap_covid->get_px_covid_by_id(array($FS_KD_TRS)));
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
        $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTRASI', 'trim|required');
        $this->tnotification->set_rules('FS_KD_TRS', 'KODE TRANSAKSI', 'trim|required');
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
                $this->input->post('FS_SUHU'),
                $this->com_user['user_name'],
                date('Y-m-d'),
                $this->input->post('FS_KD_TRS')
            );
            // insert
            if ($this->m_inap_covid->update_covid($params)) {
                $cekcovid = $this->m_inap_covid->cek_form_covid($this->input->post('FS_KD_TRS'));
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
            if ($cekcovid >= '1') {
                redirect("inap/covid/edit_covid/" . $this->input->post('FS_KD_REG').'/'.$this->input->post('FS_KD_TRS'));
            } elseif ($cekcovid == '0') {
                redirect("inap/covid/add_covid/" . $this->input->post('FS_KD_REG').'/'.$this->input->post('FS_KD_TRS'));
            } else {
                redirect("inap/covid/add/" . $this->input->post('FS_KD_REG'));
            }
        } else {
            redirect("inap/covid/add/" . $this->input->post('FS_KD_REG'));
        }
    }

    public function add_covid($FS_KD_REG = "",$FS_KD_TRS_COVID="") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "inap/covid/add_covid.html");
        // load javascript    
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("FS_KD_TRS_COVID", $FS_KD_TRS_COVID);
        $this->smarty->assign("rs_pasien", $this->m_inap_covid->get_pasien_by_rg($FS_KD_REG));
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
        $this->tnotification->set_rules('FS_KD_REG', 'KODE REG', 'trim|required');
        $this->tnotification->set_rules('FS_KD_TRS_COVID', 'KODE TRANSAKSI', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('FD_TGL_KUNJUNG'),
                $this->input->post('FS_TEMPAT_KUNJUNG'),
                $this->input->post('FS_INFEKSI'),
                $this->input->post('FS_INFEKSI2'),
                $this->input->post('FS_KD_TRS_COVID')
            );

            if ($this->m_inap_covid->insert_covid2($params)) {
                $params2 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FS_KOMORBID1'),
                    $this->input->post('FS_KOMORBID2'),
                    $this->input->post('FS_KOMORBID3'),
                    $this->input->post('FS_KOMORBID4'),
                    $this->input->post('FS_KOMORBID5'),
                    $this->input->post('FS_KOMORBID6'),
                    $this->input->post('FS_KOMORBID7'),
                    $this->input->post('FD_TGL_PANAS'),
                    $this->input->post('FS_KD_TRS_COVID')
                );
                $this->m_inap_covid->insert_covid3($params2);

                $spesimen = $this->input->post('tujuan');
                if (!empty($spesimen)) {
                    foreach ($spesimen as $value) {
                        $this->m_inap_covid->insert_covid4(array($this->input->post('FS_KD_REG'), $value,$this->input->post('FS_KD_TRS_COVID')));
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
                    $this->input->post('FS_SPES_HP'),
                    $this->input->post('FS_KD_TRS_COVID')
                );
                // insert
                $this->m_inap_covid->insert_covid5($params4);

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
                    $this->input->post('FS_SPES_GEJALA9'),
                    $this->input->post('FS_KD_TRS_COVID')
                );
                // insert
                $this->m_inap_covid->insert_covid6($params5);

                $params6 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FS_PEN_XRAY'),
                    $this->input->post('FS_PEN_VENT'),
                    $this->input->post('FS_KD_TRS_COVID')
                );
                // insert
                $this->m_inap_covid->insert_covid7($params6);

                $params7 = array(
                    $this->input->post('FS_TINDAK_LANJUT'),
                    $this->input->post('FS_KD_TRS_COVID')
                );
                // insert
                $this->m_inap_covid->update_covid1($params7);

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

        redirect("inap/covid/add/" . $this->input->post('FS_KD_REG'));
    }

    public function edit_covid($FS_KD_REG = "",$FS_KD_TRS_COVID="") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "inap/covid/edit_covid.html");
        // load javascript    
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        
        $this->smarty->assign("FS_KD_TRS_COVID", $FS_KD_TRS_COVID);
        $this->smarty->assign("rs_pasien", $this->m_inap_covid->get_pasien_by_rg($FS_KD_REG));
        $this->smarty->assign("result1", $this->m_inap_covid->get_data_covid1_by_rg(array($FS_KD_TRS_COVID)));
        $this->smarty->assign("result3", $this->m_inap_covid->get_data_covid3_by_rg(array($FS_KD_TRS_COVID)));
        $this->smarty->assign("result4", $this->m_inap_covid->get_data_covid4_by_rg(array($FS_KD_TRS_COVID)));
        $spesimen = $this->m_inap_covid->get_data_covid5_by_rg($FS_KD_TRS_COVID);
        $tujuan_str = "";
        foreach ($spesimen as $key => $value) {
            $tujuan_str .= "'" . $value['FS_KD_SPESIMEN'] . "',";
        }
        $this->smarty->assign('rs_tujuan', $tujuan_str);
        $this->smarty->assign("result6", $this->m_inap_covid->get_data_covid6_by_rg(array($FS_KD_TRS_COVID)));
        $this->smarty->assign("result7", $this->m_inap_covid->get_data_covid7_by_rg(array($FS_KD_TRS_COVID)));
        $this->smarty->assign("result8", $this->m_inap_covid->get_data_covid8_by_rg(array($FS_KD_TRS_COVID)));
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
        $this->tnotification->set_rules('FS_KD_REG', 'KODE REG', 'trim|required');
        $this->tnotification->set_rules('FS_KD_TRS_COVID', 'KODE TRANSAKSI', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FD_TGL_KUNJUNG'),
                $this->input->post('FS_TEMPAT_KUNJUNG'),
                $this->input->post('FS_INFEKSI'),
                $this->input->post('FS_INFEKSI2'),
                $this->input->post('FS_KD_TRS_COVID')
            );

            if ($this->m_inap_covid->update_covid3($params)) {
                $params2 = array(
                    $this->input->post('FS_KOMORBID1'),
                    $this->input->post('FS_KOMORBID2'),
                    $this->input->post('FS_KOMORBID3'),
                    $this->input->post('FS_KOMORBID4'),
                    $this->input->post('FS_KOMORBID5'),
                    $this->input->post('FS_KOMORBID6'),
                    $this->input->post('FS_KOMORBID7'),
                    $this->input->post('FD_TGL_PANAS'),
                    $this->input->post('FS_KD_TRS_COVID')
                );
                $this->m_inap_covid->update_covid4($params2);

                $this->m_inap_covid->delete_covid5($this->input->post('FS_KD_TRS_COVID'));
                $spesimen = $this->input->post('tujuan');
                if (!empty($spesimen)) {
                    foreach ($spesimen as $value) {
                        $this->m_inap_covid->insert_covid4(array($this->input->post('FS_KD_REG'), $value,$this->input->post('FS_KD_TRS_COVID')));
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
                    $this->input->post('FS_KD_TRS_COVID')
                );
                // insert
                $this->m_inap_covid->update_covid6($params4);

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
                    $this->input->post('FS_KD_TRS_COVID')
                );
                // insert
                $this->m_inap_covid->update_covid7($params5);

                $params6 = array(
                    $this->input->post('FS_PEN_XRAY'),
                    $this->input->post('FS_PEN_VENT'),
                    $this->input->post('FS_KD_TRS_COVID')
                );
                // insert
                $this->m_inap_covid->update_covid8($params6);

                $params7 = array(
                    $this->input->post('FS_TINDAK_LANJUT'),
                    $this->input->post('FS_KD_TRS_COVID')
                );
                // insert
                $this->m_inap_covid->update_covid1($params7);

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
            redirect("inap/covid/add/" . $this->input->post('FS_KD_REG'));
    }
    
    public function list_kontak_pasien() {
        $params = array(
            $this->input->post('FS_KD_TRS_COVID')
        );
        $data = $this->m_inap_covid->get_data_kontak($params);
        echo json_encode($data);
    }
    
     public function add_kontak_process() {
        $params = array(
            $this->input->post('FS_KD_REG'),
            $this->input->post('FS_NM_KONTAK'),
            $this->input->post('FS_NM_DOMISILI'),
            $this->input->post('FS_NO_HP'),
            $this->input->post('FS_KD_TRS_COVID')
        );
        // insert
        $data = $this->m_inap_covid->insert_kontak($params);
        echo json_encode($data);
    }

    public function delete_kontak_process() {
        $params = array(
            $this->input->post('kode')
        );
        // insert
        $data = $this->m_inap_covid->delete_kontak_process($params);
        echo json_encode($data);
    }
}
