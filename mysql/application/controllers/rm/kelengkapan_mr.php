<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class kelengkapan_mr extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_kelengkapan_mr');
        $this->load->model('m_resume');
        // load library
        $this->load->library('tnotification');
        $this->smarty->assign('m_kelengkapan_mr', $this->m_kelengkapan_mr);
    }

    // searching
    public function proses_cari() {
        //set page rules
        $this->_set_page_rule("R");
        //data
        if ($this->input->post('save') == "RESET") {
            $this->tsession->unset_userdata("kelengkapan_mr_search");
        } else {
            $params = array(
                "fs_mr" => $this->input->post("fs_mr"),
                "tanggal" => $this->input->post("tanggal")
            );
            $this->tsession->set_userdata("kelengkapan_mr_search", $params);
        }
        // redirect
        redirect("rm/kelengkapan_mr/cari");
    }

    // tambah surat masuk
    public function index() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "rm/kelengkapan_mr/index.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");

        $search = $this->tsession->userdata('kelengkapan_mr_search');
        if (!empty($search)) {
            $this->smarty->assign("search", $search);
        }
        if (empty($search['tanggal'])) {
            $search['tanggal'] = date('Y-m-d');
            $this->smarty->assign("search", $search);
        }
        // search parameters
        $fs_mr = empty($search['fs_mr']) ? '%' : '%' . $search['fs_mr'] . '%';
        $tanggal = empty($search['tanggal']) ? '%' : $search['tanggal'];
        $this->smarty->assign("rs_pasien", $this->m_kelengkapan_mr->get_pasien_by_tgl_pulang(array($fs_mr, $tanggal)));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    // tambah surat masuk
    public function lists($FS_MR = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "rm/kelengkapan_mr/list2.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $new_reg = number_format(347104100000000 + $FS_MR, 0, "", "");
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_kelengkapan_mr->get_pasien_by_mr($new_reg));
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
        $this->smarty->assign("template_content", "rm/kelengkapan_mr/add.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_kelengkapan_mr->get_pasien_by_rg($FS_RG));
        $this->smarty->assign("rs_param_mr", $this->m_kelengkapan_mr->get_param_mr_by_rm());
        $this->smarty->assign("rs_param_cp", $this->m_kelengkapan_mr->get_param_cp());
        $this->smarty->assign("rs_medis", $this->m_kelengkapan_mr->get_medis());
        $this->smarty->assign("rs_peg_mr", $this->m_kelengkapan_mr->get_peg());
        $this->smarty->assign("FS_RG", $FS_RG);
        $this->smarty->assign("rs_resume", $this->m_kelengkapan_mr->get_resume_by_rg(array($FS_RG)));
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
                $this->input->post('FS_KD_REG'),
                $this->com_user['user_id'],
                date('Y-m-d'),
                $this->input->post('FS_KD_MEDIS_IGD'),
                $this->input->post('FS_KD_MEDIS_OP'),
                $this->input->post('FS_KD_MEDIS_AN'),
                $this->input->post('FS_KD_PEG_MR'),
                $this->input->post('FS_STATUS_MR')
            );
            // insert
            if ($this->m_kelengkapan_mr->insert($params)) {
                // get last inserted id
                $FS_KD_KELENGKAPAN_MR = $this->m_kelengkapan_mr->get_last_inserted_id();
                // insert tujuan
                $kelengkapan_detail = $this->input->post('FS_KD_PARAMETER_MR');
                $hasil = $this->input->post('FS_HASIL');
                if (!empty($kelengkapan_detail)) {
                    foreach ($kelengkapan_detail as $key => $value) {
                        $this->m_kelengkapan_mr->insert_hasil(array($FS_KD_KELENGKAPAN_MR, $value, $hasil[$key]));
                    }
                }

                $params2 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FS_DIAG_PRE'),
                    $this->input->post('FS_DIAG_POST'),
                    $this->com_user['user_id'],
                    date('Y-m-d'),
                    $this->input->post('FD_TGL_KEJADIAN')
                );
                $this->m_kelengkapan_mr->insert_diag_op($params2);
                //diagnosa utama
                /*$diag = $this->input->post('FS_DIAG_UTAMA');
                $cek = $this->m_kelengkapan_mr->get_resume_by_rg2(array($this->input->post('FS_KD_REG')));
                if ($cek == 1) {
                    $this->m_kelengkapan_mr->update_diagnosis(array($diag, $this->input->post('FS_KD_REG')));
                } else if ($cek == 0) {
                    $this->m_kelengkapan_mr->insert_diagnosis(array($this->input->post('FS_KD_REG'), $diag, $this->com_user['user_id'], date('Y-m-d')));
                }
                $icd_diag_utama = $this->input->post('FS_ICD_DIAG_UTAMA');
                $this->m_kelengkapan_mr->update_diag_utama(array($icd_diag_utama, $this->input->post('FS_KD_REG')));*/
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
        redirect("rm/kelengkapan_mr/");
    }

    public function cari_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_MR', 'No MR', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            // insert
            redirect("rm/kelengkapan_mr/lists/" . $this->input->post('FS_MR'));
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("rm/kelengkapan_mr/cari");
    }

    // edit surat masuk
    public function edit($FS_RG = "") {
        // set page rules
        $this->_set_page_rule("U");
        // set template content
        $this->smarty->assign("template_content", "rm/kelengkapan_mr/edit.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // detail
        $this->smarty->assign("rs_pasien", $this->m_kelengkapan_mr->get_pasien_by_rg($FS_RG));
        $this->smarty->assign("rs_param_mr", $this->m_kelengkapan_mr->get_param_mr_by_rm());
        $this->smarty->assign("rs_id2", $this->m_kelengkapan_mr->get_param_mr2_by_id($FS_RG));
        $this->smarty->assign("rs_medis", $this->m_kelengkapan_mr->get_medis());
        $this->smarty->assign("rs_peg_mr", $this->m_kelengkapan_mr->get_peg());
        $this->smarty->assign("FS_RG", $FS_RG);
        $this->smarty->assign("rs_resume", $this->m_kelengkapan_mr->get_resume_by_rg(array($FS_RG)));
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
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->com_user['user_id'],
                date('Y-m-d'),
                $this->input->post('FS_KD_MEDIS_IGD'),
                $this->input->post('FS_KD_MEDIS_OP'),
                $this->input->post('FS_KD_MEDIS_AN'),
                $this->input->post('FS_KD_PEG_MR'),
                $this->input->post('FS_STATUS_MR'),
                $this->input->post('FS_KD_KELENGKAPAN_MR')
            );
            // insert
            if ($this->m_kelengkapan_mr->update($params)) {
                // get last inserted id
                $kelengkapan_detail = $this->input->post('FS_KD_PARAMETER_MR');
                $hasil = $this->input->post('FS_HASIL');
                if (!empty($kelengkapan_detail)) {
                    foreach ($kelengkapan_detail as $key => $value) {
                        $this->m_kelengkapan_mr->update_hasil(array($hasil[$key], $value, $this->input->post('FS_KD_KELENGKAPAN_MR')));
                    }
                }
                $params2 = array(
                    $this->input->post('FS_DIAG_PRE'),
                    $this->input->post('FS_DIAG_POST'),
                    $this->input->post('FD_TGL_KEJADIAN'),
                    $this->input->post('FS_KD_REG')
                );
                $this->m_kelengkapan_mr->update_diag_op($params2);
                /*$icd_diag_utama = $this->input->post('FS_ICD_DIAG_UTAMA');
                $this->m_kelengkapan_mr->update_diag_utama(array($icd_diag_utama, $this->input->post('FS_KD_REG')));

                //diagnosa utama
                $diag = $this->input->post('FS_DIAG_UTAMA');
                $cek = $this->m_kelengkapan_mr->get_resume_by_rg2(array($this->input->post('FS_KD_REG')));
                if ($cek == 1) {
                    $this->m_kelengkapan_mr->update_diagnosis(array($diag, $this->input->post('FS_KD_REG')));
                } else if ($cek == 0) {
                    $this->m_kelengkapan_mr->insert_diagnosis(array($this->input->post('FS_KD_REG'), $diag));
                } else {
                    // notification
                    $this->tnotification->delete_last_field();
                    $this->tnotification->sent_notification("success", "Data berhasil Diubah");
                }*/
            }
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Data gagal diubah");
        }
        // default redirect
        redirect("rm/kelengkapan_mr/");
    }

    public function add_diagnosis($FS_RG = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "rm/kelengkapan_mr/add_diagnosis.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_kelengkapan_mr->get_pasien_by_rg(array($FS_RG)));
        $this->smarty->assign("diag", $this->m_kelengkapan_mr->get_diag_by_rg(array($FS_RG)));
        $this->smarty->assign("tind", $this->m_kelengkapan_mr->get_tind_by_rg(array($FS_RG)));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function add_diagnosis_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('FS_NM_DIAG_SEK'),
                $this->input->post('ICD10'),
                $this->com_user['user_id'],
                date('Y-m-d')
            );
            // insert
            if ($this->m_resume->insert_diag_sek($params)) {
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
        redirect("rm/kelengkapan_mr/add_diagnosis/" . $this->input->post('FS_KD_REG'));
    }

    // edit surat masuk
    public function edit_diagnosis($FS_KD_DIAG_SEK = "", $FS_RG = "") {
        // set page rules
        $this->_set_page_rule("U");
        // set template content
        $this->smarty->assign("template_content", "rm/kelengkapan_mr/edit_diag_sek.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // detail
        $this->smarty->assign("rs_diag_sek", $this->m_kelengkapan_mr->get_diag_sek_by_id($FS_KD_DIAG_SEK));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function edit_diagnosis_process() {
        // set page rules
        $this->_set_page_rule("U");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_NM_DIAG_SEK'),
                $this->input->post('ICD10'),
                $this->com_user['user_id'],
                date('Y-m-d'),
                $this->input->post('FS_KD_DIAG_SEK')
            );
            // insert
            if ($this->m_kelengkapan_mr->update_diag_sek($params)) {
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
        redirect("rm/kelengkapan_mr/add_diagnosis/" . $this->input->post('FS_KD_REG'));
    }

// // hapus process
    public function delete_process_diag($FS_KD_DIAG_SEK = "", $FS_KD_REG = "") {
        // set page rules
        $this->_set_page_rule("D");
        // insert
        if ($this->m_resume->delete_diag_sek($FS_KD_DIAG_SEK)) {
            $this->tnotification->delete_last_field();
            $this->tnotification->sent_notification("success", "Data berhasil dihapus");
            // default redirect
            redirect("rm/kelengkapan_mr/add_diagnosis/" . $FS_KD_REG);
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Data gagal dihapus");
        }
        // default redirect
        redirect("rm/kelengkapan_mr/add_diagnosis/" . $FS_KD_REG);
    }

    public function add_tindakan_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('FS_NM_TIND'),
                $this->input->post('ICD9CM'),
                $this->com_user['user_id'],
                date('Y-m-d')
            );
            // insert
            if ($this->m_resume->insert_tind($params)) {
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
        redirect("rm/kelengkapan_mr/add_diagnosis/" . $this->input->post('FS_KD_REG'));
    }

// edit surat masuk
    public function edit_tindakan($FS_KD_TIND = "", $FS_RG = "") {
        // set page rules
        $this->_set_page_rule("U");
        // set template content
        $this->smarty->assign("template_content", "rm/kelengkapan_mr/edit_tindakan.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // detail
        $this->smarty->assign("rs_tindakan", $this->m_kelengkapan_mr->get_tindakan_by_id($FS_KD_TIND));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function edit_tindakan_process() {
        // set page rules
        $this->_set_page_rule("U");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_NM_TIND'),
                $this->input->post('ICD9CM'),
                $this->com_user['user_id'],
                date('Y-m-d'),
                $this->input->post('FS_KD_TIND')
            );
            // insert
            if ($this->m_kelengkapan_mr->update_tindakan($params)) {
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
        redirect("rm/kelengkapan_mr/add_diagnosis/" . $this->input->post('FS_KD_REG'));
    }

    public function delete_process_tind($FS_KD_TIND = "", $FS_KD_REG = "") {
        // set page rules
        $this->_set_page_rule("D");
        // insert
        if ($this->m_resume->delete_tind($FS_KD_TIND)) {
            $this->tnotification->delete_last_field();
            $this->tnotification->sent_notification("success", "Data berhasil dihapus");
            // default redirect
            redirect("rm/kelengkapan_mr/add_diagnosis/" . $FS_KD_REG);
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Data gagal dihapus");
        }
        // default redirect
        redirect("rm/kelengkapan_mr/add_diagnosis/" . $FS_KD_REG);
    }

    // view file for view
    public function view_file($file_id = "") {
        // get detail file
        $result = $this->m_surat->view_file($file_id);
        $file_path['file'] = 'resource/doc/surat_masuk/' . $result['dossier_id'] . '/' . $result['file_nm'];
        echo json_encode($file_path);
    }

    // list_users
    public function list_user() {
        $users = $this->m_surat->get_all_users();
        $data[] = array();
        $i = 0;
        foreach ($users as $key => $value) {
            $data[$i] = array(
                'label' => $value['nama_lengkap'],
                'value' => $value['user_id']
            );
            $i++;
        }
        echo json_encode($data);
    }

    // list_users
    public function list_instansi() {
        $instansi = $this->m_surat->get_all_pegawai();
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

    // list_users
    public function list_eksternal() {
        $instansi = $this->m_surat->get_all_eksternal();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['FS_NAMA_TUJUAN'],
                'value' => $value['FS_KD_UND_DAFTAR_HADIR_EKS']
            );
            $i++;
        }
        echo json_encode($data);
    }

    public function icd() {
        $FS_KD_ICD=$this->input->post('FS_KD_ICD');
       $icd = $this->m_kelengkapan_mr->get_all_icd(array($FS_KD_ICD));
        $icd_row = $this->m_kelengkapan_mr->get_all_icd_row(array($FS_KD_ICD));
        if ($icd_row > 0) { // Jika data lebih dari 0
            $callback = array(
                'status' => 'success', // Set array status dengan success
                'FS_KET_ICD' => $icd['FS_KET_ICD'], // Set array jenis_kelamin dengan isi kolom jenis_kelamin pada tabel siswa
            );
        } else {
            $callback = array('status' => 'failed'); // set array status dengan failed
        }
        echo json_encode($callback);
    }
    public function icd9cm() {
        $FS_KD_ICD=$this->input->post('FS_KD_ICD');
       $icd = $this->m_kelengkapan_mr->get_all_icd9cm(array($FS_KD_ICD));
        $icd_row = $this->m_kelengkapan_mr->get_all_icd9cm_row(array($FS_KD_ICD));
        if ($icd_row > 0) { // Jika data lebih dari 0
            $callback = array(
                'status' => 'success', // Set array status dengan success
                'FS_NM_ICD9CM' => $icd['FS_NM_ICD9CM'], // Set array jenis_kelamin dengan isi kolom jenis_kelamin pada tabel siswa
            );
        } else {
            $callback = array('status' => 'failed'); // set array status dengan failed
        }
        echo json_encode($callback);
    }

}
