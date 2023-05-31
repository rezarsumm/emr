<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class rawat_inap extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_rawat_inap');
        // load library
        $this->load->library('tnotification');
        $this->load->library('pagination');
        $this->load->library('datetimemanipulation');
        $this->load->library('tupload');
        //$this->load->library('twhatsapp');
        $this->smarty->assign('dtm', $this->datetimemanipulation);
        $this->smarty->assign('m_rawat_inap', $this->m_rawat_inap);
    }

    // tambah surat masuk
    public function index() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "medis/rawat_inap/list.html");
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
        $this->smarty->assign("rs_pasien", $this->m_rawat_inap->get_pasien_bangsal(array($date, $date2, $date, $date, $date, $date, $date, $date, $date, $date, $date)));
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
        $this->smarty->assign("template_content", "medis/rawat_inap/list_his.html");
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
        $cek = $this->m_rawat_inap->cek_rawat_inap(array($FS_RG2));
        if ($cek == '0') {
            redirect("medis/rawat_inap/add/" . $FS_RG2);
        } elseif ($cek == '1') {
            redirect("medis/rawat_inap/edit/" . $FS_RG2);
        }
    }

    public function cari_process2() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_MR', 'No MR', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            // insert
            redirect("medis/rawat_inap/lists2/" . $this->input->post('FS_MR'));
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("medis/rawat_inap/cari2");
    }

    // tambah surat masuk
    public function lists($FS_MR = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "medis/rawat_inap/list2.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        //$new_reg = number_format(347104100000000 + $FS_MR, 0, "", "");
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_rawat_inap->get_pasien_by_mr($FS_MR));
        //$this->smarty->assign("rs_ass_awal", $this->m_rawat_inap->get_all_ass_awal($new_reg));
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
        $this->smarty->assign("template_content", "medis/rawat_inap/list2.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $new_reg = number_format(347104100000000 + $FS_MR, 0, "", "");
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_rawat_inap->get_pasien_by_mr($new_reg));
        //$this->smarty->assign("rs_ass_awal", $this->m_rawat_inap->get_all_ass_awal($new_reg));
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
        $this->smarty->assign("template_content", "medis/rawat_inap/add.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_rawat_inap->get_pasien_by_rg(array($FS_RG)));
        $this->smarty->assign("medis", $this->m_rawat_inap->get_data_medis_by_rg2(array($FS_RG)));
        //$this->smarty->assign("ases2", $this->m_rawat_inap->get_data_ases2_by_rg(array($FS_RG)));
        $this->smarty->assign("rs_layanan", $this->m_rawat_inap->get_layanan());
        $this->smarty->assign("rs_masalah_kep",$this->m_rawat_inap->list_masalah_kep_by_rg($FS_RG));

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
        $this->smarty->assign("template_content", "medis/rawat_inap/edit.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_rawat_inap->get_pasien_by_rg(array($FS_RG)));
        $this->smarty->assign("result", $this->m_rawat_inap->get_data_medis_by_rg(array($FS_RG)));
        
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
                $this->input->post('FS_PLANNING'),
                $this->input->post('FS_HASIL_PEMERIKSAAN_PENUNJANG'),
                '1',
                $this->input->post('FS_MR'),
                $this->com_user['user_id'],
                date('Y-m-d'),
                date('H:i:s')
            );
            if ($this->m_rawat_inap->insert($params)) {
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
        redirect("medis/rawat_inap");
    }

    public function edit_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
                $params = array(
                $this->input->post('FS_DIAGNOSA'),
                $this->input->post('FS_ANAMNESA'),
                $this->input->post('FS_TINDAKAN'),
                $this->input->post('FS_TERAPI'),
                $this->input->post('FS_CATATAN_FISIK'),
                $this->com_user['user_name'],
                $this->input->post('FS_CARA_PULANG'),
                $this->input->post('FS_DAFTAR_MASALAH'),
                $this->input->post('FS_PLANNING'),
                $this->input->post('FS_HASIL_PEMERIKSAAN_PENUNJANG'),
                $this->input->post('FS_KD_REG')    
            );
               if ( $this->m_rawat_inap->update($params)) {
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
        redirect("medis/rawat_inap/");
    }

    public function cetak_ass_awal($FS_KD_REG = "") {
        $this->_set_page_rule("R");

        $this->load->library('html2pdf');
        $data['rs_pasien'] = $this->m_rawat_inap->get_pasien_by_rg(array($FS_KD_REG));
        $data['rs_ass_awal'] = $this->m_rawat_inap->get_ass_awal_by_rg(array($FS_KD_REG));
        $data['rs_diet'] = $this->m_rawat_inap->get_diet_by_rg(array($FS_KD_REG));
        $data['rs_indikasi'] = $this->m_rawat_inap->get_indikasi_dirawat_by_rg(array($FS_KD_REG));
        $data['rs_diag'] = $this->m_rawat_inap->get_diag_by_rg(array($FS_KD_REG));
        $data['rs_tind'] = $this->m_rawat_inap->get_tind_by_rg(array($FS_KD_REG));
        $data['rs_terapi'] = $this->m_rawat_inap->get_terapi_by_rg(array($FS_KD_REG));
        ob_start();
        $this->load->view('medis/rawat_inap/print', $data);
        $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output('ass_awal_pasien_pulang.pdf');
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
        $users = $this->m_rawat_inap->list_planning();
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
        $instansi = $this->m_rawat_inap->list_edukasi();
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
        $instansi = $this->m_rawat_inap->list_spiritual();
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

}
