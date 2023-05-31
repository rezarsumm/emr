<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class ass_jatuh extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_ass_jatuh');
        // load library
        $this->load->library('tnotification');
        $this->load->library('pagination');
        $this->load->library('datetimemanipulation');
        $this->load->library('tupload');
        //$this->load->library('twhatsapp');
        $this->smarty->assign('dtm', $this->datetimemanipulation);
        $this->smarty->assign('m_ass_jatuh', $this->m_ass_jatuh);
    }

    // tambah surat masuk
    public function index() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/ass_jatuh/list.html");
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
        $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_bangsal(array($date, $date2, $date, $date, $date, $date, $date, $date, $date, $date, $date)));
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
        $this->smarty->assign("template_content", "inap/ass_jatuh/list_his.html");
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
        //$cek = $this->m_ass_jatuh->cek_ass_jatuh(array($FS_RG2));
        //if ($cek == '0') {
            redirect("inap/ass_jatuh/add/" . $FS_RG2);
       // } elseif ($cek == '1') {
       //     redirect("inap/ass_jatuh/edit/" . $FS_RG2);
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
            redirect("inap/ass_jatuh/lists2/" . $this->input->post('FS_MR'));
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("inap/ass_jatuh/cari2");
    }

    // tambah surat masuk
    public function lists($FS_MR = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/ass_jatuh/list2.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        //$new_reg = number_format(347104100000000 + $FS_MR, 0, "", "");
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_by_mr($FS_MR));
        //$this->smarty->assign("rs_ass_jatuh", $this->m_ass_jatuh->get_all_ass_jatuh($new_reg));
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
        $this->smarty->assign("template_content", "inap/ass_jatuh/list2.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $new_reg = number_format(347104100000000 + $FS_MR, 0, "", "");
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_by_mr($new_reg));
        //$this->smarty->assign("rs_ass_jatuh", $this->m_ass_jatuh->get_all_ass_jatuh($new_reg));
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
        $this->smarty->assign("template_content", "inap/ass_jatuh/add.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_by_rg(array($FS_RG)));
        $this->smarty->assign("rs_result_anak", $this->m_ass_jatuh->get_jatuh_anak_by_rg(array($FS_RG)));
        $this->smarty->assign("rs_result_dewasa", $this->m_ass_jatuh->get_jatuh_dewasa_by_rg(array($FS_RG)));
        $this->smarty->assign("rs_result_dewasa2", $this->m_ass_jatuh->get_jatuh_dewasa2_by_rg(array($FS_RG)));
        $this->smarty->assign("rs_layanan", $this->m_ass_jatuh->get_layanan());
        $this->smarty->assign("rs_jatuh", $this->m_ass_jatuh->get_com_jatuh());

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function edit($FS_RG = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/ass_jatuh/edit.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_by_rg(array($FS_RG)));
        $this->smarty->assign("vs", $this->m_ass_jatuh->get_data_vs_by_rg(array($FS_RG)));
        $this->smarty->assign("ases2", $this->m_ass_jatuh->get_data_ases2_by_rg(array($FS_RG)));
        $this->smarty->assign("nyeri", $this->m_ass_jatuh->get_data_nyeri_by_rg(array($FS_RG)));
        $this->smarty->assign("alergi", $this->m_ass_jatuh->get_data_alergi_by_rg(array($FS_RG)));
        $this->smarty->assign("nutrisi", $this->m_ass_jatuh->get_data_nutrisi_by_rg(array($FS_RG)));
        $this->smarty->assign("jatuh", $this->m_ass_jatuh->get_data_jatuh_by_rg(array($FS_RG)));
        // get instansi tujuan
        $tujuan = $this->m_ass_jatuh->list_masalah_kep_by_rg($FS_RG);
        $tujuan_str = "";
        foreach ($tujuan as $key => $value) {
            $tujuan_str .= "'" . $value['FS_KD_MASALAH_KEP'] . "',";
        }
        $this->smarty->assign('rs_tujuan', $tujuan_str);

        $spiritual = $this->m_ass_jatuh->list_keb_spiritual_by_rg($FS_RG);
        $spiritual_str = "";
        foreach ($spiritual as $key => $value) {
            $spiritual_str .= "'" . $value['FS_KD_SPIRITUAL'] . "',";
        }
        $this->smarty->assign('rs_spiritual', $spiritual_str);
        //edukasi
        $edukasi = $this->m_ass_jatuh->list_edukasi_by_rg($FS_RG);
        $edukasi_str = "";
        foreach ($edukasi as $key => $value) {
            $edukasi_str .= "'" . $value['FS_KD_EDUKASI'] . "',";
        }
        $this->smarty->assign('rs_edukasi', $edukasi_str);
        //planning
        $planning = $this->m_ass_jatuh->list_planning_by_rg($FS_RG);
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

    // add data
    public function add_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            
            $params = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('FS_TIPE_RISIKO_JATUH'),
                $this->com_user['user_id'],
                date('Y-m-d'),
                date('H:i:s')
            );
            // insert
            if ($this->m_ass_jatuh->insert($params)) {
                $FS_KD_JATUH2 = $this->m_ass_jatuh->get_last_inserted_id();
                $params1 = array(
                    $FS_KD_JATUH2,
                    $this->input->post('FS_PARAM_1'),
                    $this->input->post('FS_PARAM_2'),
                    $this->input->post('FS_PARAM_3'),
                    $this->input->post('FS_PARAM_4'),
                    $this->input->post('FS_PARAM_5'),
                    $this->input->post('FS_PARAM_6'),
                    $this->input->post('FS_PARAM_7'),
                    $this->input->post('FS_PARAM_8'),
                    $this->input->post('FS_PARAM_9'),
                    $this->input->post('FS_PARAM_10'),
                    $this->input->post('FS_PARAM_11'),
                    $this->input->post('FS_PARAM_12'),
                    $this->input->post('FS_PARAM_13'),
                    $this->input->post('FS_PARAM_14'),
                    $this->input->post('FS_PARAM_15'),
                    $this->input->post('FS_PARAM_16'),
                    $this->input->post('FS_PARAM_17'),
                    $this->com_user['user_id'],
                    date('Y-m-d')
                    
                );
                $this->m_ass_jatuh->insert2($params1);
                $FS_KD_JATUH3 = $this->m_ass_jatuh->get_last_inserted_id();
                $pencegahan_jatuh = $this->input->post('tujuan');
                if (!empty($pencegahan_jatuh)) {
                    foreach ($pencegahan_jatuh as $value) {
                        $this->m_ass_jatuh->insert_pencegahan_jatuh(array($FS_KD_JATUH3, $value));
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
        redirect("inap/ass_jatuh/add/". $this->input->post('FS_KD_REG'));
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
            if ($this->m_ass_jatuh->update($params)) {
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
                $this->m_ass_jatuh->update_vs($params1);
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
                $this->m_ass_jatuh->update_nyeri($params2);

                $params3 = array(
                    $this->input->post('FS_SCORE'),
                    $this->com_user['user_id'],
                    date('Y-m-d'),
                    $this->input->post('FS_KD_REG')
                );
                $this->m_ass_jatuh->update_jatuh($params3);

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
                $this->m_ass_jatuh->update_ases($params4);

                $params5 = array(
                    $this->input->post('FS_ALERGI'),
                    $this->input->post('FS_ALERGI2'),
                    $this->input->post('FS_REAK_ALERGI'),
                    $this->com_user['user_id'],
                    date('Y-m-d'),
                    $this->input->post('FS_KD_REG')
                );
                $this->m_ass_jatuh->update_alergi($params5);

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
                $this->m_ass_jatuh->update_nutrisi($params6);

// insert tujuan
                $masalah_kep = $this->input->post('tujuan');
                $this->m_ass_jatuh->delete_masalah_kep($this->input->post('FS_KD_REG'));
                if (!empty($masalah_kep)) {
                    foreach ($masalah_kep as $value) {
                        $this->m_ass_jatuh->insert_masalah_kep(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
                $keb_spirit = $this->input->post('keb_spirit');
                 $this->m_ass_jatuh->delete_keb_spirit($this->input->post('FS_KD_REG'));
                if (!empty($keb_spirit)) {
                    foreach ($keb_spirit as $value) {
                        $this->m_ass_jatuh->insert_keb_spirit(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
                $edukasi = $this->input->post('edukasi');
                 $this->m_ass_jatuh->delete_edukasi($this->input->post('FS_KD_REG'));
                if (!empty($edukasi)) {
                    foreach ($edukasi as $value) {
                        $this->m_ass_jatuh->insert_edukasi(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
                $planning = $this->input->post('planning');
                 $this->m_ass_jatuh->delete_planning($this->input->post('FS_KD_REG'));
                if (!empty($planning)) {
                    foreach ($planning as $value) {
                        $this->m_ass_jatuh->insert_planning(array($this->input->post('FS_KD_REG'), $value));
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
        redirect("inap/ass_jatuh/");
    }

    public function cetak_ass_jatuh($FS_KD_REG = "") {
        $this->_set_page_rule("R");

        $this->load->library('html2pdf');
        $data['rs_pasien'] = $this->m_ass_jatuh->get_pasien_by_rg(array($FS_KD_REG));
        $data['rs_ass_jatuh'] = $this->m_ass_jatuh->get_ass_jatuh_by_rg(array($FS_KD_REG));
        $data['rs_diet'] = $this->m_ass_jatuh->get_diet_by_rg(array($FS_KD_REG));
        $data['rs_indikasi'] = $this->m_ass_jatuh->get_indikasi_dirawat_by_rg(array($FS_KD_REG));
        $data['rs_diag'] = $this->m_ass_jatuh->get_diag_by_rg(array($FS_KD_REG));
        $data['rs_tind'] = $this->m_ass_jatuh->get_tind_by_rg(array($FS_KD_REG));
        $data['rs_terapi'] = $this->m_ass_jatuh->get_terapi_by_rg(array($FS_KD_REG));
        ob_start();
        $this->load->view('inap/ass_jatuh/print', $data);
        $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output('ass_jatuh_pasien_pulang.pdf');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }

    // view file for view
    public function view_file($file_id = "") {
        // get detail file
        $result = $this->m_surat->view_file($file_id);
        $file_path['file'] = 'resource/doc/surat_masuk/' . $result['dossier_id'] . '/' . $result['file_nm'];
        echo json_encode($file_path);
    }

    // list_users
    public function list_planning() {
        $users = $this->m_ass_jatuh->list_planning();
        $data[] = array();
        $i = 0;
        foreach ($users as $key => $value) {
            $data[$i] = array(
                'label' => $value['FS_NM_PLANNING'],
                'value' => $value['FS_KD_TRS']
            );
            $i++;
        }
        echo json_encode($data);
    }

    // list_users
    public function list_edukasi() {
        $instansi = $this->m_ass_jatuh->list_edukasi();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['FS_NM_EDUKASI'],
                'value' => $value['FS_KD_TRS']
            );
            $i++;
        }
        echo json_encode($data);
    }

    public function spiritual() {
        $instansi = $this->m_ass_jatuh->list_spiritual();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['FS_NM_SPIRITUAL'],
                'value' => $value['FS_KD_TRS']
            );
            $i++;
        }
        echo json_encode($data);
    }
    
    public function list_pencegahan_jatuh() {
        $instansi = $this->m_ass_jatuh->list_pencegahan_jatuh();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['FS_NM_PENCEGAHAN_JATUH'],
                'value' => $value['FS_KD_TRS']
            );
            $i++;
        }
        echo json_encode($data);
    }

}
