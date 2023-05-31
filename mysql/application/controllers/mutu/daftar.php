<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class daftar extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_daftar');
        // load library
        $this->load->library('tnotification');
        $this->smarty->assign('m_daftar', $this->m_daftar);
    }

    // tambah mutu masuk
    public function index() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "mutu/daftar/list.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        $search = $this->tsession->userdata('daftar_search');
        $year_now = date('Y');
        for ($i = ($year_now); $i >= ($year_now - 4); $i--) {
            $tahun[] = $i;
        }
        $this->smarty->assign("rs_tahun", $tahun);
        if (!empty($search)) {
            $this->smarty->assign("search", $search);
        } else {
            $search['tahun'] = $year;
            $this->smarty->assign("search", $search);
        }

        $this->smarty->assign("tahun", $search['tahun']);
        $this->smarty->assign("unit", $search['unit']);
        $this->smarty->assign("no", 1);

        $unit = empty($search['unit']) ? : $search['unit'];
        $tahun = empty($search['tahun']) ? $year : $search['tahun'];
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        //$this->smarty->assign("rs_unit", $this->m_daftar->get_unit_sismadak());
        $this->smarty->assign("rs_indikator", $this->m_daftar->daftar_indikator());
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    // edit mutu masuk
    public function edit($indicator_id = "") {
        // set page rules
        $this->_set_page_rule("U");
        // set template content
        $this->smarty->assign("template_content", "mutu/daftar/edit.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("result", $this->m_daftar->daftar_indikator_by_id($indicator_id));
        $this->smarty->assign("rs_numerator", $this->m_daftar->daftar_numerator_by_id($indicator_id));
        $this->smarty->assign("rs_denumerator", $this->m_daftar->daftar_denumerator_by_id($indicator_id));

        $tujuan = $this->m_daftar->list_unit_mutu_by_id($indicator_id);
        $tujuan_str = "";
        foreach ($tujuan as $key => $value) {
            $tujuan_str .= "'" . $value['group_department_id'] . "',";
        }
        $this->smarty->assign('rs_tujuan', $tujuan_str);

        $tembusan = $this->m_daftar->list_pj_mutu_by_id($indicator_id);
        $tembusan_str = "";
        foreach ($tembusan as $key => $value) {
            $tembusan_str .= "'" . $value['group_department_id'] . "',";
        }
        $this->smarty->assign('rs_tembusan', $tembusan_str);

        $analisa = $this->m_daftar->list_analisa_mutu_by_id($indicator_id);
        $analisa_str = "";
        foreach ($analisa as $key => $value) {
            $analisa_str .= "'" . $value['group_department_id'] . "',";
        }
        $this->smarty->assign('rs_analisa', $analisa_str);
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    // edit data
    public function edit_process() {
        // set page rules
        $this->_set_page_rule("U");
        $this->tnotification->set_rules('indicator_id', 'Kode Indikator', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('indicator_definition'),
                $this->input->post('indicator_criteria_inclusive'),
                $this->input->post('indicator_criteria_exclusive'),
                $this->input->post('indicator_element'),
                $this->input->post('indicator_source_of_data'),
                $this->input->post('indicator_type'),
                $this->input->post('indicator_value_standard'),
                $this->input->post('indicator_monitoring_area'),
                $this->input->post('indicator_frequency'),
                $this->input->post('indicator_target'),
                $this->input->post('fs_dasar_pemikiran'),
                $this->input->post('fs_formula'),
                $this->input->post('fs_metodologi'),
                $this->input->post('fs_waktu_pelaporan'),
                $this->input->post('fs_jumlah_sample'),
                $this->input->post('fs_komunikasi_hasil'),
                $this->input->post('indicator_id')
            );
            // insert
            if ($this->m_daftar->update($params)) {
                $params2 = array(
                    $this->input->post('fs_numeraror'),
                    $this->input->post('indicator_id')
                );
                $this->m_daftar->update_numerator($params2);

                $params3 = array(
                    $this->input->post('fs_denominator'),
                    $this->input->post('indicator_id')
                );
                $this->m_daftar->update_denumerator($params3);

                $unit = $this->input->post('tujuan');
                $this->m_daftar->delete_unit($this->input->post('indicator_id'));
                if (!empty($unit)) {
                    foreach ($unit as $value) {
                        $this->m_daftar->insert_unit(array($this->input->post('indicator_id'), $value));
                    }
                }

                $pj = $this->input->post('tembusan');
                $this->m_daftar->delete_pj($this->input->post('indicator_id'));
                if (!empty($pj)) {
                    foreach ($pj as $value) {
                        $this->m_daftar->insert_pj(array($this->input->post('indicator_id'), $value));
                    }
                }

                $analisa = $this->input->post('analisa');
                $this->m_daftar->delete_analisa($this->input->post('indicator_id'));
                if (!empty($analisa)) {
                    foreach ($analisa as $value) {
                        $this->m_daftar->insert_analisa(array($this->input->post('indicator_id'), $value));
                    }
                }

                // notification
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            }
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("mutu/daftar/edit/" . $this->input->post('indicator_id'));
    }

    public function lokal() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "mutu/daftar/list_lokal.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        $search = $this->tsession->userdata('daftar_search');
        $year_now = date('Y');
        for ($i = ($year_now); $i >= ($year_now - 4); $i--) {
            $tahun[] = $i;
        }
        $this->smarty->assign("rs_tahun", $tahun);
        if (!empty($search)) {
            $this->smarty->assign("search", $search);
        } else {
            $search['tahun'] = $year;
            $this->smarty->assign("search", $search);
        }

        $this->smarty->assign("tahun", $search['tahun']);
        $this->smarty->assign("unit", $search['unit']);
        $this->smarty->assign("no", 1);

        $unit = empty($search['unit']) ? : $search['unit'];
        $tahun = empty($search['tahun']) ? $year : $search['tahun'];
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        //$this->smarty->assign("rs_unit", $this->m_daftar->get_unit_sismadak());
        $this->smarty->assign("rs_indikator_lokal", $this->m_daftar->daftar_indikator_lokal());
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function edit_lokal($indicator_id = "") {
        // set page rules
        $this->_set_page_rule("U");
        // set template content
        $this->smarty->assign("template_content", "mutu/daftar/edit_lokal.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("result", $this->m_daftar->daftar_indikator_lokal_by_id($indicator_id));
        $this->smarty->assign("rs_numerator", $this->m_daftar->daftar_numerator_lokal_by_id($indicator_id));
        $this->smarty->assign("rs_denumerator", $this->m_daftar->daftar_denumerator_lokal_by_id($indicator_id));

        $tujuan = $this->m_daftar->list_unit_lokal_mutu_by_id($indicator_id);
        $tujuan_str = "";
        foreach ($tujuan as $key => $value) {
            $tujuan_str .= "'" . $value['group_department_id'] . "',";
        }
        $this->smarty->assign('rs_tujuan', $tujuan_str);

        $tembusan = $this->m_daftar->list_pj_lokal_mutu_by_id($indicator_id);
        $tembusan_str = "";
        foreach ($tembusan as $key => $value) {
            $tembusan_str .= "'" . $value['group_department_id'] . "',";
        }
        $this->smarty->assign('rs_tembusan', $tembusan_str);

        $analisa = $this->m_daftar->list_analisa_lokal_mutu_by_id($indicator_id);
        $analisa_str = "";
        foreach ($analisa as $key => $value) {
            $analisa_str .= "'" . $value['group_department_id'] . "',";
        }
        $this->smarty->assign('rs_analisa', $analisa_str);
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function edit_lokal_process() {
        // set page rules
        $this->_set_page_rule("U");
        $this->tnotification->set_rules('indicator_id', 'Kode Indikator', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('indicator_definition'),
                $this->input->post('indicator_criteria_inclusive'),
                $this->input->post('indicator_criteria_exclusive'),
                $this->input->post('indicator_element'),
                $this->input->post('indicator_source_of_data'),
                $this->input->post('indicator_type'),
                $this->input->post('indicator_value_standard'),
                $this->input->post('indicator_monitoring_area'),
                $this->input->post('indicator_frequency'),
                $this->input->post('indicator_target'),
                $this->input->post('fs_dasar_pemikiran'),
                $this->input->post('fs_formula'),
                $this->input->post('fs_metodologi'),
                $this->input->post('fs_waktu_pelaporan'),
                $this->input->post('fs_jumlah_sample'),
                $this->input->post('fs_komunikasi_hasil'),
                $this->input->post('indicator_id')
            );
            // insert
            if ($this->m_daftar->update_lokal($params)) {
                $params2 = array(
                    $this->input->post('fs_numeraror'),
                    $this->input->post('indicator_id')
                );
                $this->m_daftar->update_numerator_lokal($params2);

                $params3 = array(
                    $this->input->post('fs_denominator'),
                    $this->input->post('indicator_id')
                );
                $this->m_daftar->update_denumerator_lokal($params3);

                $unit = $this->input->post('tujuan');
                $this->m_daftar->delete_unit_lokal($this->input->post('indicator_id'));
                if (!empty($unit)) {
                    foreach ($unit as $value) {
                        $this->m_daftar->insert_unit_lokal(array($this->input->post('indicator_id'), $value));
                    }
                }

                $pj = $this->input->post('tembusan');
                $this->m_daftar->delete_pj_lokal($this->input->post('indicator_id'));
                if (!empty($pj)) {
                    foreach ($pj as $value) {
                        $this->m_daftar->insert_pj_lokal(array($this->input->post('indicator_id'), $value));
                    }
                }

                $analisa = $this->input->post('analisa');
                $this->m_daftar->delete_analisa_lokal($this->input->post('indicator_id'));
                if (!empty($analisa)) {
                    foreach ($analisa as $value) {
                        $this->m_daftar->insert_analisa_lokal(array($this->input->post('indicator_id'), $value));
                    }
                }

                // notification
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            }
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("mutu/daftar/edit_lokal/" . $this->input->post('indicator_id'));
    }

    public function list_unit() {
        $instansi = $this->m_daftar->get_data_unit();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['department_name'],
                'value' => $value['department_id']
            );
            $i++;
        }
        echo json_encode($data);
    }

    public function list_pegawai() {
        $instansi = $this->m_daftar->get_data_pegawai();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['FS_NM_PEG'],
                'value' => $value['FS_KD_PEG']
            );
            $i++;
        }
        echo json_encode($data);
    }

    public function list_analisa() {

        $data[0] = array(
            'label' => 'Membandingkan dari waktu ke waktu',
            'value' => '1'
        );
        $data[1] = array(
            'label' => 'Membandingkan dari standar',
            'value' => '2'
        );
        $data[2] = array(
            'label' => 'Membandingkan dengan Rumah Sakit Lain',
            'value' => '3'
        );
        $data[3] = array(
            'label' => 'Membandingkan dari praktek yang lebih baik',
            'value' => '4'
        );

        echo json_encode($data);
    }

    public function cetak($indicator_id = "") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $data['result'] = $this->m_daftar->get_indikator_by($indicator_id);
        $data["rs_numerator"] = $this->m_daftar->daftar_numerator_by_id($indicator_id);
        $data["rs_denumerator"] = $this->m_daftar->daftar_denumerator_by_id($indicator_id);

        ob_start();
        $this->load->view('mutu/daftar/print', $data);
        $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output('daftar.pdf');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }

    public function cetak_lokal($indicator_id = "") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $data['result'] = $this->m_daftar->get_indikator_lokal_by($indicator_id);
        $data["rs_numerator"] = $this->m_daftar->daftar_numerator_lokal_by_id($indicator_id);
        $data["rs_denumerator"] = $this->m_daftar->daftar_denumerator_lokal_by_id($indicator_id);

        ob_start();
        $this->load->view('mutu/daftar/print', $data);
        $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output('daftar.pdf');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }

}
