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
        // load library
        $this->load->library('tnotification');
        $this->load->library('pagination');
        $this->load->library('datetimemanipulation');
        $this->load->library('tupload');
        //$this->load->library('twhatsapp');
        $this->smarty->assign('dtm', $this->datetimemanipulation);
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
        $this->smarty->assign("rs_pasien", $this->m_kep->get_pasien_bangsal(array($date, $date2, $date, $date, $date, $date, $date, $date, $date, $date, $date)));
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
                date('H:i:s')
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

    public function edit($FS_RG = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/kep/edit.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_kep->get_pasien_by_rg(array($FS_RG)));
        $this->smarty->assign("vs", $this->m_kep->get_data_vs_by_rg(array($FS_RG)));
        $this->smarty->assign("ases2", $this->m_kep->get_data_ases2_by_rg(array($FS_RG)));
        $this->smarty->assign("nyeri", $this->m_kep->get_data_nyeri_by_rg(array($FS_RG)));
        $this->smarty->assign("alergi", $this->m_kep->get_data_alergi_by_rg(array($FS_RG)));
        $this->smarty->assign("nutrisi", $this->m_kep->get_data_nutrisi_by_rg(array($FS_RG)));
        $this->smarty->assign("jatuh", $this->m_kep->get_data_jatuh_by_rg(array($FS_RG)));
        // get instansi tujuan
        $tujuan = $this->m_kep->list_masalah_kep_by_rg($FS_RG);
        $tujuan_str = "";
        foreach ($tujuan as $key => $value) {
            $tujuan_str .= "'" . $value['FS_KD_MASALAH_KEP'] . "',";
        }
        $this->smarty->assign('rs_tujuan', $tujuan_str);

        $spiritual = $this->m_kep->list_keb_spiritual_by_rg($FS_RG);
        $spiritual_str = "";
        foreach ($spiritual as $key => $value) {
            $spiritual_str .= "'" . $value['FS_KD_SPIRITUAL'] . "',";
        }
        $this->smarty->assign('rs_spiritual', $spiritual_str);
        //edukasi
        $edukasi = $this->m_kep->list_edukasi_by_rg($FS_RG);
        $edukasi_str = "";
        foreach ($edukasi as $key => $value) {
            $edukasi_str .= "'" . $value['FS_KD_EDUKASI'] . "',";
        }
        $this->smarty->assign('rs_edukasi', $edukasi_str);
        //planning
        $planning = $this->m_kep->list_planning_by_rg($FS_RG);
        $planning_str = "";
        foreach ($planning as $key => $value) {
            $planning_str .= "'" . $value['FS_KD_PLANNING'] . "',";
        }
        $this->smarty->assign('rs_planning', $planning_str);
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
                '1',
                $this->com_user['user_id'],
                date('Y-m-d'),
                $this->input->post('FS_KD_REG')
            );
            // insert
            if ($this->m_kep->update($params)) {
                $params1 = array(
                    $this->input->post('FS_SUHU'),
                    $this->input->post('FS_NADI'),
                    $this->input->post('FS_R'),
                    $this->input->post('FS_TD'),
                    $this->input->post('FS_TB'),
                    $this->input->post('FS_BB'),
                    $this->input->post('FS_KD_MEDIS'),
                    $this->com_user['user_id'],
                    date('Y-m-d'),
                    date('H:i:s'),
                    $this->input->post('FS_KD_REG')
                );
                $this->m_kep->update_vs($params1);
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
                $this->m_kep->update_nyeri($params2);

                $params3 = array(
                    $this->input->post('FS_SCORE'),
                    $this->com_user['user_id'],
                    date('Y-m-d'),
                    $this->input->post('FS_KD_REG')
                );
                $this->m_kep->update_jatuh($params3);

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
                    $this->input->post('FS_PEMERIKSAAN_FISIK'),
                    $this->input->post('FS_PENGELIHATAN'),
                    $this->input->post('FS_PENCIUMAN'),
                    $this->input->post('FS_PENDENGARAN'),
                    $this->input->post('FS_RIW_IMUNISASI'),
                    $this->input->post('FS_RIW_IMUNISASI_KET'),
                    $this->input->post('FS_RIW_TUMBUH'),
                    $this->input->post('FS_RIW_TUMBUH_KET'),
                    '',
                    $this->com_user['user_id'],
                    date('Y-m-d'),
                    $this->input->post('FS_KD_REG')
                );
                $this->m_kep->update_ases($params4);

                $params5 = array(
                    $this->input->post('FS_ALERGI'),
                    $this->input->post('FS_ALERGI2'),
                    $this->input->post('FS_REAK_ALERGI'),
                    $this->com_user['user_id'],
                    date('Y-m-d'),
                    $this->input->post('FS_KD_REG')
                );
                $this->m_kep->update_alergi($params5);

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
                $this->m_kep->update_nutrisi($params6);

// insert tujuan
                $masalah_kep = $this->input->post('tujuan');
                $this->m_kep->delete_masalah_kep($this->input->post('FS_KD_REG'));
                if (!empty($masalah_kep)) {
                    foreach ($masalah_kep as $value) {
                        $this->m_kep->insert_masalah_kep(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
                $keb_spirit = $this->input->post('keb_spirit');
                $this->m_kep->delete_keb_spirit($this->input->post('FS_KD_REG'));
                if (!empty($keb_spirit)) {
                    foreach ($keb_spirit as $value) {
                        $this->m_kep->insert_keb_spirit(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
                $edukasi = $this->input->post('edukasi');
                $this->m_kep->delete_edukasi($this->input->post('FS_KD_REG'));
                if (!empty($edukasi)) {
                    foreach ($edukasi as $value) {
                        $this->m_kep->insert_edukasi(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
                $planning = $this->input->post('planning');
                $this->m_kep->delete_planning($this->input->post('FS_KD_REG'));
                if (!empty($planning)) {
                    foreach ($planning as $value) {
                        $this->m_kep->insert_planning(array($this->input->post('FS_KD_REG'), $value));
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
        redirect("inap/kep/");
    }

    public function delete_process($FS_KD_REG = "", $KD_RENC_KEP2 = "") {
        //set rule
        $this->_set_page_rule("D");
        //cek input
        //process

        if ($this->m_kep->delete($KD_RENC_KEP2)) {
            $this->tnotification->delete_last_field();
            $this->tnotification->sent_notification("success", "Data berhasil dihapus");
            //default redirect
            redirect("inap/kep/add/" . $FS_KD_REG);
        } else {
            //default error
            $this->tnotification->sent_notification("error", "Data gagal dihapus");
        }

        //default redirect
        redirect("inap/kep/add/" . $FS_KD_REG);
    }

    public function cetak_kep($FS_KD_REG = "") {
        $this->_set_page_rule("R");

        $this->load->library('html2pdf');
        $data['rs_pasien'] = $this->m_kep->get_pasien_by_rg(array($FS_KD_REG));
        $data['rs_kep'] = $this->m_kep->get_kep_by_rg(array($FS_KD_REG));
        $data['rs_diet'] = $this->m_kep->get_diet_by_rg(array($FS_KD_REG));
        $data['rs_indikasi'] = $this->m_kep->get_indikasi_dirawat_by_rg(array($FS_KD_REG));
        $data['rs_diag'] = $this->m_kep->get_diag_by_rg(array($FS_KD_REG));
        $data['rs_tind'] = $this->m_kep->get_tind_by_rg(array($FS_KD_REG));
        $data['rs_terapi'] = $this->m_kep->get_terapi_by_rg(array($FS_KD_REG));
        ob_start();
        $this->load->view('inap/kep/print', $data);
        $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output('kep_pasien_pulang.pdf');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
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
