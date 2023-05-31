<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class cppt extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_cppt');
        $this->load->model('m_resume');
        $this->load->model('m_ass_awal');
        // load library
        $this->load->library('tnotification');
        $this->smarty->assign('m_cppt', $this->m_cppt);
    }

    // tambah surat masuk
    public function index() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/cppt/list.html");
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
        } elseif ($role == '27') {
            $this->smarty->assign("rs_pasien", $this->m_ass_awal->get_pasien_bangsal_covid(array($date, $date2)));
        } else {
            $this->smarty->assign("rs_pasien", $this->m_ass_awal->get_pasien_bangsal(array($date, $date2)));
        }
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
        $this->smarty->assign("template_content", "inap/cppt/list_his.html");
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
        //$cek = $this->m_cppt->cek_resume(array($FS_RG2));
        //if ($cek == '0') {
        redirect("inap/cppt/add/" . $FS_RG2);
        //} elseif ($cek == '1') {
        //redirect("inap/cppt/edit/" . $FS_RG2);
        // }
    }

    public function cari_process2() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_MR', 'No MR', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            // insert
            redirect("inap/cppt/lists2/" . $this->input->post('FS_MR'));
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("inap/cppt/cari2");
    }

    // tambah surat masuk
    public function lists($FS_MR = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "surat/resume/list2.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        //$new_reg = number_format(347104100000000 + $FS_MR, 0, "", "");
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_mr($FS_MR));
        //$this->smarty->assign("rs_resume", $this->m_resume->get_all_resume($new_reg));
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
        $this->smarty->assign("template_content", "inap/cppt/list2.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $new_reg = number_format(347104100000000 + $FS_MR, 0, "", "");
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_mr($new_reg));
        $this->smarty->assign("rs_resume", $this->m_cppt->get_all_resume($new_reg));
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
        $this->smarty->assign("template_content", "inap/cppt/add.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg(array($FS_RG)));
        $this->smarty->assign("rs_cppt", $this->m_cppt->get_cppt_by_rg($FS_RG));
        $this->smarty->assign("rs_resep", $this->m_cppt->get_resep());
        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("rs_ases_medis", $this->m_cppt->get_data_medis_by_rg(array($FS_RG)));
        $this->smarty->assign("rs_resume", $this->m_cppt->get_data_resume_by_rg(array($FS_RG)));
        //$this->smarty->assign("rs_lab", $this->m_cppt->get_cppt_by_rg($FS_RG));
        //$this->smarty->assign("rs_rad", $this->m_cppt->get_cppt_by_rg($FS_RG));
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
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process

        if ($this->tnotification->run() !== FALSE) {
            $data_kp = $this->m_cppt->get_no_kp();
            $NOKP = 'KP' . $data_kp['KP'] . 'A';
            $NOKP2 = $data_kp['KP'] + 1;
            $update_kp = $this->m_cppt->update_tz_parameter_no_kp($NOKP2);
            $result = $this->m_cppt->get_tipe_barang_obat(array($this->input->post('FS_KD_REG')));
            $params = array(
                $NOKP,
                date('Y-m-d'),
                date('H:i:s'),
                $this->com_user['user_name'],
                '3000-01-01',
                '00:00:00',
                $this->input->post('FS_KD_REG'),
                $this->input->post('FS_KD_LAYANAN'),
                $this->input->post('FS_KD_PETUGAS_MEDIS'),
                'dx:' . strip_tags($this->input->post('FS_CPPT_A')) . ',' . strip_tags($this->input->post('FS_CPPT_S')),
                '',
                strip_tags($this->input->post('FS_CPPT_P')) . ' , ' . strip_tags($this->input->post('FS_CPPT_O')),
                '',
                1,
                $this->com_user['user_name'],
                $result['FS_KD_TIPE_BRG_RAWAT_INAP'],
                '2'
            );

            // insert
            if ($this->m_cppt->insert_medis($params)) {

                $params2 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FS_CPPT_S'),
                    $this->input->post('FS_CPPT_O'),
                    $this->input->post('FS_CPPT_A'),
                    $this->input->post('FS_CPPT_P'),
                    '',
                    $NOKP,
                    $this->com_user['user_name'],
                    date('Y-m-d'),
                    date('H:i:s')
                );
                $this->m_cppt->insert($params2);

                //insert pemeriksaan lab
                $lab = $this->input->post('tujuan');
                if (!empty($lab)) {
                    foreach ($lab as $key => $value) {
                        $this->m_cppt->insert_pemeriksaan_lab(array($NOKP, $key, $value));
                    }
                }
                //insert pemeriksaan radiologi
                $rad = $this->input->post('tembusan');
                if (!empty($rad)) {
                    foreach ($rad as $key => $value) {
                        $this->m_cppt->insert_pemeriksaan_rad(array($NOKP, $key, $value));
                    }
                }

                $params3 = array(
                    $this->input->post('FS_KD_REG'),
                    '1',
                    '12',
                    $this->com_user['user_id'],
                    date('Y-m-d')
                );
                $this->m_cppt->insert_status($params3);
                
                $updateresep = $this->m_cppt->update_data_resep(array($NOKP, $this->input->post('FS_KD_REG')));
                $this->m_cppt->update_data_resep2(array($NOKP));
                if($updateresep){
                 $this->m_cppt->insert_tc_mr_his(array(
                    $this->input->post('FS_MR'),$this->input->post('FS_KD_REG'),$NOKP,'',date('Y-m-d'),date('H:i:s'),'RSP',
                    $this->input->post('FS_KD_LAYANAN')
                ));
             }

                //cek resume
             $cek = $this->m_cppt->cek_resume(array($this->input->post('FS_KD_REG')));
             if($cek == '0'){
                $this->m_cppt->insert_diag(array($this->input->post('FS_KD_REG'), $this->input->post('FS_DIAG_UTAMA'),$this->input->post('FS_DIAG_SEK')));

                $this->m_cppt->insert_diag_jkn(array($this->input->post('FS_KD_REG'), $this->input->post('FS_DIAG_UTAMA'),$this->input->post('FS_DIAG_SEK')));
            }elseif($cek >= '1'){
                $this->m_cppt->update_diag(array($this->input->post('FS_DIAG_UTAMA'),$this->input->post('FS_DIAG_SEK'),$this->input->post('FS_KD_REG')));

                $this->m_cppt->update_diag_jkn(array($this->input->post('FS_DIAG_UTAMA'),$this->input->post('FS_DIAG_SEK'),$this->input->post('FS_KD_REG')));
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
    redirect("inap/cppt/add/" . $this->input->post('FS_KD_REG'));
}

public function verif($FS_RG = "", $FS_KD_TRS = "") {
        // set page rules
    $this->_set_page_rule("C");
        // set template content
    $this->smarty->assign("template_content", "inap/cppt/verif.html");
        // load javascript
    $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
    $this->smarty->load_javascript('resource/js/jquery/select2.js');
    $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
    $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
    $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
    $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg(array($FS_RG)));
    $this->smarty->assign("FS_KD_TRS", $FS_KD_TRS);
        // notification
    $this->tnotification->display_notification();
    $this->tnotification->display_last_field();
        // output
    parent::display();
}

public function verif_process() {
        // set page rules
    $this->_set_page_rule("U");
        // insert
    if ($this->m_cppt->update_dokter(array(
        $this->com_user['user_name'],
        date('Y-m-d'),
        date('H:i:s'),
        $this->input->post('FS_KET_VERIF'),
        $this->input->post('FS_KD_TRS')))) {
        $this->tnotification->delete_last_field();
        $this->tnotification->sent_notification("success", "Data berhasil disimpan");
            // default redirect
        redirect("inap/cppt/add/" . $this->input->post('FS_KD_REG'));
    } else {
            // default error
        $this->tnotification->sent_notification("error", "Data gagal disimpan");
    }
        // default redirect
    redirect("inap/cppt/add/" . $this->input->post('FS_KD_REG'));
}

public function edit($FS_RG = '',$FS_KD_TRS='') {
        // set page rules
    $this->_set_page_rule("C");
        // set template content
    $this->smarty->assign("template_content", "inap/cppt/edit.html");
        // load javascript
    $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
    $this->smarty->load_javascript('resource/js/jquery/select2.js');
    $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
    $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
    $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
    $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
    $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg(array($FS_RG)));
    $this->smarty->assign("rs_cppt", $this->m_cppt->get_cppt_by_rg($FS_RG));
    $this->smarty->assign("rs_resep", $this->m_cppt->get_resep());
    $this->smarty->assign("role_id", $this->com_user['role_id']);
    $this->smarty->assign("rs_ases_medis", $this->m_cppt->get_data_medis_by_rg(array($FS_RG)));
    $this->smarty->assign("cppt2", $this->m_cppt->get_cppt_by_trs($FS_KD_TRS));
        // notification
    $this->tnotification->display_notification();
    $this->tnotification->display_last_field();
        // output
    parent::display();
}

public function delete_process($FS_KD_REG = "", $FS_KD_TRS = "") {
        // set page rules
    $this->_set_page_rule("D");
        // process

    $params = array(
        date('Y-m-d'),
        date('H:i:s'),
        $this->com_user['user_name'],
        $FS_KD_TRS
    );

        // insert
    if ($this->m_cppt->delete($params)) {
            // notification
        $this->tnotification->delete_last_field();
        $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
    } else {
            // default error
        $this->tnotification->sent_notification("error", "Detail gagal disimpan");
    }

        // default redirect
    redirect("inap/cppt/add/" . $FS_KD_REG);
}

public function cetak($FS_KD_REG = "") {
    $this->_set_page_rule("R");

    $this->load->library('html2pdf');
        //$data['rs_pasien'] = $this->m_resume->get_pasien_by_rg(array($FS_KD_REG));
        //$data['rs_resume'] = $this->m_resume->get_resume_by_rg(array($FS_KD_REG));
        //$data['rs_diet'] = $this->m_resume->get_diet_by_rg(array($FS_KD_REG));
        //$data['rs_indikasi'] = $this->m_resume->get_indikasi_dirawat_by_rg(array($FS_KD_REG));
        //$data['rs_diag'] = $this->m_resume->get_diag_by_rg(array($FS_KD_REG));
        //$data['rs_tind'] = $this->m_resume->get_tind_by_rg(array($FS_KD_REG));
        //$data['rs_terapi'] = $this->m_resume->get_terapi_by_rg(array($FS_KD_REG));
    ob_start();
    $this->load->view('inap/cppt/print', $data);
    $content = ob_get_contents();
    ob_end_clean();

    try {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('resume_pasien_pulang.pdf');
    } catch (HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
}

public function SatBarang() {
    $FS_KD_BARANG = $this->input->post('FS_KD_BARANG');
    $data = $this->m_cppt->get_sat_barang(array($FS_KD_BARANG));
    echo json_encode($data);
}

public function add_process_resep() {
        //ambil tipe barang masuk
 $result = $this->m_cppt->get_tipe_barang_obat(array($this->input->post('FS_KD_REG')));
 $params = array(
    $this->input->post('FS_KD_BARANG'),
    $this->input->post('FS_NM_BARANG'),
    $this->input->post('FS_KD_SATUAN'),
    $this->input->post('FN_QTY_BARANG'),
    'ADA',
    $result['FS_KD_TIPE_BRG_RAWAT_INAP'],
    $this->input->post('FN_ETIKET_QTY'),
    $this->input->post('FS_ETIKET_CATATAN'),
    $this->input->post('FN_ETIKET_HARI'),
    $this->input->post('FS_KD_REG')
);
        // insert
 $data = $this->m_cppt->insert_resep($params);
 echo json_encode($data);
}

public function add_process_cara_pulang() {
    $cek = $this->m_resume->cek_resume(array($this->input->post('FS_KD_REG')));
    if ($cek == '0') {
        $params = array(
            $this->input->post('FS_KD_REG'),
            $this->input->post('FS_DIAG_UTAMA'),
            $this->input->post('FS_CARA_PULANG'),
            $this->input->post('FS_DIAG_SEK')
        );
        $data = $this->m_cppt->insert_cara_pulang($params);
        $data_jkn = $this->m_cppt->insert_cara_pulang_jkn($params);
    } else {
        $params = array(
            $this->input->post('FS_DIAG_UTAMA'),
            $this->input->post('FS_CARA_PULANG'),
            $this->input->post('FS_DIAG_SEK'),
            $this->input->post('FS_KD_REG')
        );
        $data = $this->m_cppt->update_cara_pulang($params);
        $data_jkn = $this->m_cppt->update_cara_pulang_jkn($params);
    }
    echo json_encode($data);
}

public function list_resep_baru() {
    $params = array(
        $this->input->post('FS_KD_REG2')
    );
    $data = $this->m_cppt->get_data_terapi_baru_by_rg($params);
    echo json_encode($data);
}

public function delete_resep_process() {
    $params = array(
        $this->input->post('kode')
    );
        // insert
    $data = $this->m_cppt->delete_resep_process($params);
    echo json_encode($data);
}

}
