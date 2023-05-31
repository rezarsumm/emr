<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class insiden extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_insiden');
        // load library
        $this->load->library('tnotification');
        $this->smarty->assign('m_insiden', $this->m_insiden);
    }

    // tambah mutu masuk
    public function index() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "mutu/insiden/list.html");
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
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_MR', 'No MR', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            // insert
            redirect("mutu/insiden/lists/" . $this->input->post('FS_MR'));
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("mutu/insiden/cari");
    }

    // tambah mutu masuk
    public function lists($FS_MR = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "mutu/insiden/list2.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $new_reg = number_format(347104100000000 + $FS_MR, 0, "", "");
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_insiden->get_pasien_by_mr($new_reg));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function add($FS_RG = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "mutu/insiden/add.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_peg", $this->m_insiden->get_all_pegawai());
        $this->smarty->assign("rs_unit", $this->m_insiden->get_all_unit());
        $this->smarty->assign("rs_sasaran", $this->m_insiden->get_all_sasaran());
        $this->smarty->assign("rs_pasien", $this->m_insiden->get_pasien_by_rg(array($FS_RG)));
        $this->smarty->assign("rs_smf", $this->m_insiden->get_smf());
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
        
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KASUS'),
                $this->input->post('FS_KRONOLOGIS'),
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                $this->input->post('FD_TGL_KEJADIAN'),
                $this->com_user['user_id'],
                date('Y-m-d'),
                $this->input->post('FS_KD_LAYANAN'),
                '',
                $this->input->post('FS_IKP'),
                '1',
                $this->input->post('FS_KD_REG'),
                '',
                '',
                '',
                $this->input->post('FS_KD_GRADE_RISIKO'),
                $this->input->post('FS_PEMBERI_LAPORAN'),
                $this->input->post('FS_KD_SMF'),
                $this->input->post('FS_KD_LAYANAN_PENYEBAB'),
                $this->input->post('FS_KD_DAMPAK_PASIEN'),
                $this->input->post('FS_TINDAKAN_OLEH'),
                $this->input->post('FS_INSIDEN_SERUPA'),
                $this->input->post('FS_ANALISA_RCA')
            );
            // insert
            if ($this->m_insiden->insert($params)) {
                $FS_KD_LAP_INVESTIGASI = $this->m_insiden->get_last_inserted_id();
                $params2 = array(
                    $this->input->post('FS_TINDAKAN'),
                    $this->input->post('FS_KD_REG'),
                    $FS_KD_LAP_INVESTIGASI,
                    $this->com_user['user_id'],
                    date('Y-m-d')
                );
                $this->m_insiden->insert2($params2);
                $params3 = array(
                    $this->input->post('FS_REKOMENDASI'),
                    $this->input->post('FS_KD_REG'),
                    $FS_KD_LAP_INVESTIGASI,
                    $this->com_user['user_id'],
                    date('Y-m-d')
                );
                $this->m_insiden->insert3($params3);
                // notification
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
                redirect("mutu/insiden/selesai/" . $FS_KD_LAP_INVESTIGASI);
            } else {
                // default error
                $this->tnotification->sent_notification("error", "Detail gagal disimpan");
                redirect("mutu/insiden/add/".$this->input->post('FS_KD_REG'));
            }
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
            redirect("mutu/insiden/add/".$this->input->post('FS_KD_REG'));
        }
        // default redirect
        redirect("mutu/insiden/selesai/" . $FS_KD_LAP_INVESTIGASI);
    }

    public function add2($FS_KD_LAP_INVESTIGASI = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "mutu/insiden/add2.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("fs_kd_lap_investigasi", $FS_KD_LAP_INVESTIGASI);
        $this->smarty->assign("rs_rekom", $this->m_insiden->get_rekomendasi_by_id($FS_KD_LAP_INVESTIGASI));
        $this->smarty->assign("rs_tind", $this->m_insiden->get_tindakan_by_id($FS_KD_LAP_INVESTIGASI));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

// add data
    public function add_process2() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_REKOMENDASI', 'REKOMENDASI', 'trim|required');
        $this->tnotification->set_rules('fs_kd_lap_investigasi', 'KODE INVESTIGASI', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_REKOMENDASI'),
                $this->input->post('FS_PJ'),
                $this->input->post('fs_kd_lap_investigasi'),
                $this->com_user['user_id'],
                date('Y-m-d')
            );
            // insert
            if ($this->m_insiden->insert2($params)) {
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
        redirect("mutu/insiden/add2/" . $this->input->post('fs_kd_lap_investigasi'));
    }

    public function add_process3() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_TINDAKAN', 'TINDAKAN', 'trim|required');
        $this->tnotification->set_rules('fs_kd_lap_investigasi', 'KODE INVESTIGASI', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_TINDAKAN'),
                $this->input->post('FS_PJ2'),
                $this->input->post('fs_kd_lap_investigasi'),
                $this->com_user['user_id'],
                date('Y-m-d')
            );
            // insert
            if ($this->m_insiden->insert3($params)) {
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
        redirect("mutu/insiden/add2/" . $this->input->post('fs_kd_lap_investigasi'));
    }

    // edit mutu masuk
    public function edit($FS_KD_LAP_INVESTIGASI = "") {
        // set page rules
        $this->_set_page_rule("U");
        // set template content
        $this->smarty->assign("template_content", "mutu/insiden/edit.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // detail
        $this->smarty->assign("rs_peg", $this->m_insiden->get_all_pegawai());
        $this->smarty->assign("rs_unit", $this->m_insiden->get_all_unit());
        $this->smarty->assign("rs_sasaran", $this->m_insiden->get_all_sasaran());
        $this->smarty->assign("result", $this->m_insiden->get_lap_investigasi_by_id($FS_KD_LAP_INVESTIGASI));
        $this->smarty->assign("rs_smf", $this->m_insiden->get_smf());
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
        $this->tnotification->set_rules('FS_KD_LAP_INVESTIGASI', 'ID INVESTIGASI', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KASUS'),
                $this->input->post('FS_KRONOLOGIS'),
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                $this->input->post('FD_TGL_KEJADIAN'),
                $this->com_user['user_id'],
                date('Y-m-d'),
                $this->input->post('FS_KD_LAYANAN'),
                '',
                $this->input->post('FS_IKP'),
                '1',
                '',
                '',
                '',
                $this->input->post('FS_KD_GRADE_RISIKO'),
                $this->input->post('FS_PEMBERI_LAPORAN'),
                $this->input->post('FS_KD_SMF'),
                $this->input->post('FS_KD_LAYANAN_PENYEBAB'),
                $this->input->post('FS_KD_DAMPAK_PASIEN'),
                $this->input->post('FS_TINDAKAN_OLEH'),
                $this->input->post('FS_INSIDEN_SERUPA'),
                $this->input->post('FS_ANALISA_RCA'),
                $this->input->post('FS_KD_LAP_INVESTIGASI')
            );
            // insert
            if ($this->m_insiden->update($params)) {
                $params2 = array(
                    $this->input->post('FS_REKOMENDASI'),
                    $this->input->post('FS_KD_REG'),
                    $this->com_user['user_id'],
                    date('Y-m-d'),
                    $this->input->post('FS_KD_LAP_INVESTIGASI')
                );
                $this->m_insiden->update_rekom($params2);
                $params3 = array(
                    $this->input->post('FS_TINDAKAN'),
                    $this->input->post('FS_KD_REG'),
                    $this->com_user['user_id'],
                    date('Y-m-d'),
                    $this->input->post('FS_KD_LAP_INVESTIGASI')
                );
                $this->m_insiden->update_tind($params3);
                // notification
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            }
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("mutu/insiden/selesai/" . $this->input->post('FS_KD_LAP_INVESTIGASI'));
    }

    // hapus process
    public function delete_process_rekom($FS_KD_LAP_INVESTIGASI2 = "", $FS_KD_LAP_INVESTIGASI = "") {
        // set page rules
        $this->_set_page_rule("D");
        // insert
        if ($this->m_insiden->delete_rekom($FS_KD_LAP_INVESTIGASI2)) {
            $this->tnotification->delete_last_field();
            $this->tnotification->sent_notification("success", "Data berhasil dihapus");
            // default redirect
            redirect("mutu/insiden/add2/" . $FS_KD_LAP_INVESTIGASI);
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Data gagal dihapus");
        }

        // default redirect
        redirect("mutu/insiden/add2/" . $FS_KD_LAP_INVESTIGASI);
    }

    public function delete_process_tind($FS_KD_LAP_INVESTIGASI3 = "", $FS_KD_LAP_INVESTIGASI = "") {
        // set page rules
        $this->_set_page_rule("D");
        // insert
        if ($this->m_insiden->delete_tind($FS_KD_LAP_INVESTIGASI3)) {
            $this->tnotification->delete_last_field();
            $this->tnotification->sent_notification("success", "Data berhasil dihapus");
            // default redirect
            redirect("mutu/insiden/add2/" . $FS_KD_LAP_INVESTIGASI);
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Data gagal dihapus");
        }

        // default redirect
        redirect("mutu/insiden/add2/" . $FS_KD_LAP_INVESTIGASI);
    }

    public function delete_process($FS_KD_LAP_INVESTIGASI = "") {
        // set page rules
        $this->_set_page_rule("D");
        // insert
        if ($this->m_insiden->delete($FS_KD_LAP_INVESTIGASI)) {
            $this->tnotification->delete_last_field();
            $this->tnotification->sent_notification("success", "Data berhasil dihapus");
            // default redirect
            redirect("laporan/insiden/");
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Data gagal dihapus");
        }

        // default redirect
        redirect("laporan/insiden/");
    }

    public function selesai($FS_KD_LAP_INVESTIGASI = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        if ($this->m_insiden->update_status(array('2', $FS_KD_LAP_INVESTIGASI))) {
            $this->tnotification->delete_last_field();
            $this->tnotification->sent_notification("success", "Data berhasil Dikirim");
            // default redirect
            redirect("mutu/insiden");
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Data gagal Dikirim");
        }

        // default redirect
        redirect("mutu/insiden/add");
    }

    public function selesai2($FS_KD_LAP_INVESTIGASI = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "mutu/insiden/selesai.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("result", $this->m_insiden->get_lap_investigasi_by_id($FS_KD_LAP_INVESTIGASI));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function cetak($FS_KD_LAP_INVESTIGASI = "") {
        $this->_set_page_rule("R");

        $this->load->library('html2pdf');
        $data['result'] = $this->m_insiden->get_lap_investigasi_by_id($FS_KD_LAP_INVESTIGASI);
        $data["rs_rekom"] = $this->m_insiden->get_rekomendasi_by_id($FS_KD_LAP_INVESTIGASI);
        $data["rs_tind"] = $this->m_insiden->get_tindakan_by_id($FS_KD_LAP_INVESTIGASI);

        ob_start();
        $this->load->view('mutu/insiden/print', $data);
        $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output('insiden.pdf');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }

    public function rekap() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "mutu/insiden/rekap.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $search = $this->tsession->userdata('rekap_insiden');
        if (!empty($search)) {
            $this->smarty->assign("search", $search);
        }
        if (empty($search['periode1'])) {
            $search['periode1'] = date('Y-m-d');
            $this->smarty->assign("search", $search);
        }
        if (empty($search['periode2'])) {
            $search['periode2'] = date('Y-m-d');
            $this->smarty->assign("search", $search);
        }
        $this->smarty->assign("periode1", $search['periode1']);
        $this->smarty->assign("periode2", $search['periode2']);
        
        $periode1 = empty($search['periode1']) ? : $search['periode1'];
        $periode2 = empty($search['periode2']) ? : $search['periode2'];
        
        $this->smarty->assign("rs_result", $this->m_insiden->get_list_investigasi_lap(array($periode1,$periode2)));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }
    
     public function rekap_cari_process() {
        //set page rules
        $this->_set_page_rule("R");
        //data
        if ($this->input->post('save') == "Reset") {
            $this->tsession->unset_userdata("rekap_insiden");
        } else {
            $params = array(
                "periode1" => $this->input->post("periode1"),
                "periode2" => $this->input->post("periode2")
            );
            $this->tsession->set_userdata("rekap_insiden", $params);
        }
        // redirect
        redirect("mutu/insiden/rekap");
    }
}
