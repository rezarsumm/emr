<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class covid extends ApplicationBase {

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

    
    public function add($FS_KD_REG = "", $FS_KD_REG2 = "") {
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
        $FS_MR = $this->m_igd->get_rm_px_by_rg(array($FS_KD_REG2));
        $this->smarty->assign("result", $this->m_igd->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG2)));
        $this->smarty->assign("vs", $this->m_igd->get_data_vs_by_rg(array($FS_KD_REG2)));
        $this->smarty->assign("kp", $this->m_igd->get_data_medis_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("ases2", $this->m_igd->get_data_ases2_by_rg(array($FS_KD_REG2)));
        $this->smarty->assign("terapi", $this->m_igd->get_data_terapi_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("alergi", $this->m_igd->get_data_alergi_by_rg(array($FS_KD_REG2)));
        $this->smarty->assign("nutrisi", $this->m_igd->get_data_nutrisi_by_rg(array($FS_KD_REG2)));
        $this->smarty->assign("nyeri", $this->m_igd->get_data_nyeri_by_rg(array($FS_KD_REG2)));
        $this->smarty->assign("masalah", $this->m_igd->get_data_masalah_by_rg(array($FS_KD_REG2)));
        $this->smarty->assign("ases_kebid", $this->m_igd->get_data_ases_kebid_by_rg(array($FS_KD_REG2)));
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

                $this->m_igd->update_level_medis(array('2', $this->input->post('FS_KD_REG')));
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
                $this->m_surat_sehat->insert($params1);
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
        /* if ($this->input->post('FS_CARA_PULANG') == '2') {
          if ($cekskdp == '1') {
          redirect("medis/igd/edit_skdp/" . $this->input->post('FS_KD_REG'));
          } elseif ($this->input->post('FS_CARA_PULANG') == '2' && $cekskdp == '0') {
          redirect("medis/igd/add_skdp/" . $this->input->post('FS_KD_REG'));
          } else {
          redirect("medis/igd/cetak/" . $this->input->post('FS_KD_REG') . '/' . $FS_KD_TRS);
          }
          } else { */
        redirect("medis/igd/");
        // }
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
        $this->tnotification->set_rules('FS_KD_TRS', 'KODE TRANSAKSI', 'trim|required');
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
                $this->input->post('FS_KD_TRS')
            );
            
            if ($this->m_igd->update_tac_rj_medis($params)) {
                $this->m_igd->update_level_medis(array('2', $this->input->post('FS_KD_REG')));
               
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
       /* if ($this->input->post('FS_CARA_PULANG') == '2') {
            if ($cekskdp == '1') {
                redirect("medis/igd/edit_skdp/" . $this->input->post('FS_KD_REG'));
            } elseif ($this->input->post('FS_CARA_PULANG') == '2' && $cekskdp == '0') {
                redirect("medis/igd/add_skdp/" . $this->input->post('FS_KD_REG'));
            } else {
                redirect("medis/igd/cetak/" . $this->input->post('FS_KD_REG') . '/' . $this->input->post('FS_KD_TRS'));
            }
        } else {*/
            redirect("medis/igd/");
        //}
    }

    public function add_skdp($FS_KD_REG = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "medis/igd/add_skdp.html");
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

    public function add_skdp_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('FS_SKDP_1'),
                $this->input->post('FS_SKDP_2'),
                $this->input->post('FS_SKDP_KET'),
                $this->input->post('FS_SKDP_KONTROL'),
                $this->com_user['user_name'],
                date('Y-m-d'),
                date('H:i:s')
            );
            // insert
            // if ($this->m_igd->insert_medis($params)) {
            if ($this->m_igd->insert_tac_rj_skdp($params)) {
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

    public function cetak($FS_KD_REG = "", $FS_KD_TRS = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "medis/igd/cetak.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $this->smarty->assign("result", $this->m_igd->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG)));
        $this->smarty->assign("medis", $this->m_igd->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS)));
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }

    public function cetak_rm($FS_KD_REG = "", $FS_KD_TRS = "") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d');
        $data['rs_pasien'] = $this->m_igd->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG));
        $data['rs_resep'] = $this->m_igd->get_data_terapi_by_rg(array($FS_KD_REG));
        $data['rs_lab'] = $this->m_igd->get_data_lab_by_rg(array($FS_KD_REG));
        $data['rs_rad'] = $this->m_igd->get_data_rad_by_rg(array($FS_KD_REG));
        $data["vs"] = $this->m_igd->get_data_vs_by_rg(array($FS_KD_REG));
        $data["nyeri"] = $this->m_igd->get_data_nyeri_by_rg(array($FS_KD_REG));
        $data["jatuh"] = $this->m_igd->get_data_jatuh_by_rg(array($FS_KD_REG));
        $data["ases2"] = $this->m_igd->get_data_ases2_by_rg(array($FS_KD_REG));
        $data["result"] = $this->m_igd->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS));
        $data["header1"] = $this->m_igd->get_header1();
        $data["header2"] = $this->m_igd->get_header2();
        ob_start();
        $this->load->view('medis/igd/print', $data);
        $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output($FS_KD_REG . '.pdf');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }

    public function cetak_skdp($FS_KD_REG = "", $FS_KD_TRS = "") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d');
        $data['rs_pasien'] = $this->m_igd->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG));
        $data['rs_skdp'] = $this->m_igd->get_data_skdp_by_rg(array($FS_KD_REG));
        $data["result"] = $this->m_igd->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS));
        $data["header1"] = $this->m_igd->get_header1();
        $data["header2"] = $this->m_igd->get_header2();
        ob_start();
        $this->load->view('medis/igd/skdp', $data);
        $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output($FS_KD_REG . '.pdf');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }

    public function cetak_prb($FS_KD_REG = "", $FS_KD_TRS = "") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d');
        $data['rs_pasien'] = $this->m_igd->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG));
        $data['rs_prb'] = $this->m_igd->get_data_prb_by_rg(array($FS_KD_REG));
        $data["result"] = $this->m_igd->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS));
        $data['rs_resep'] = $this->m_igd->get_data_terapi_by_rg(array($FS_KD_REG));
        ob_start();
        $this->load->view('medis/igd/prb', $data);
        $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output($FS_KD_REG . '.pdf');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }

    public function cetak_resep($FS_KD_REG = "", $FS_KD_TRS = "") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d');
        $data['rs_pasien'] = $this->m_igd->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG));
        $data['medis'] = $this->m_igd->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS));
        ob_start();
        $this->load->view('medis/igd/resep', $data);
        $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF();
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output($rs_pasien['FS_NM_PASIEN'] . '.pdf');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }

    public function skdp_rencana() {
        $id = $this->input->post('skdp_alasan');
        $rs_skdp_rencana = $this->m_igd->get_tac_com_parameter_rencana($id);
        //$data .= "<option>--Pilih Alasan--</option>";
        foreach ($rs_skdp_rencana as $skdp_rencana) {
            $data.= '<option value="' . $skdp_rencana['FS_KD_TRS'] . '">' . $skdp_rencana['FS_NM_SKDP_RENCANA'] . '</option>';
        }
        echo $data;
    }

}
