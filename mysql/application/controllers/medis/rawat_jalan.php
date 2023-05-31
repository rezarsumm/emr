<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class rawat_jalan extends ApplicationBase {

// constructor
    public function __construct() {
// parent constructor
        parent::__construct();
// load model

        $this->load->model('m_rawat_jalan');
        $this->smarty->assign('m_rawat_jalan', $this->m_rawat_jalan);
        $this->load->library('tnotification');
    }

// list surat masuk
    public function index() {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "medis/rawat_jalan/index.html");
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
        $this->smarty->assign("no", '1');
        $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_px_by_dokter_wait_dokter(array($FD_TGL_MASUK, $FS_KD_PEG, $FS_KD_PEG, $FS_KD_PEG)));
        //$this->smarty->assign("rs_jmlpx", $this->m_rawat_jalan->get_total_px(array($FD_TGL_MASUK, $FS_KD_PEG, $FS_KD_PEG, $FS_KD_PEG)));
        //$this->smarty->assign("rs_jmlpx_bpjs", $this->m_rawat_jalan->get_total_px_bpjs(array($FD_TGL_MASUK, $FS_KD_PEG, $FS_KD_PEG, $FS_KD_PEG)));
        //$this->smarty->assign("rs_jmlpx_umum", $this->m_rawat_jalan->get_total_px_umum(array($FD_TGL_MASUK, $FS_KD_PEG, $FS_KD_PEG, $FS_KD_PEG)));
        //$this->smarty->assign("rs_pasien3", $this->m_rawat_jalan->get_px_by_dokter_wait_farmasi(array($now,$FS_KD_PEG)));
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
        redirect("medis/rawat_jalan");
    }

    public function history($FS_MR = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "medis/rawat_jalan/history.html");
        $this->smarty->load_javascript('resource/js/jquery.datatables/jquery.dataTables.js');
        $this->smarty->load_javascript('resource/js/jquery.datatables/dataTables.fixedHeader.js');
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->load_style("jquery.ui/datatables/jquery.dataTables.css");
// load javascript
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-1.9.2.custom.min.js');
// get search parameter
        $now = date('Y-m-d');
        $medis = $this->com_user['user_name'];
        $this->smarty->assign("no", '1');
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rm(array($now, $FS_MR)));
        $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_px_history(array($now, $medis, $medis, $medis, $FS_MR)));

//$this->smarty->assign("form", $this->m_rawat_jalan->get_px_form(array($now, $medis, $medis, $medis, $FS_MR)));
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
        $this->smarty->assign("template_content", "medis/rawat_jalan/add.html");
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $FS_MR = $this->m_rawat_jalan->get_rm_px_by_rg(array($FS_KD_REG2));
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG2)));
        $this->smarty->assign("vs", $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG2)));
        $this->smarty->assign("kp", $this->m_rawat_jalan->get_data_medis_by_rg(array($FS_KD_REG2)));
        $this->smarty->assign("kp2", $this->m_rawat_jalan->get_data_medis_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("ases", $this->m_rawat_jalan->get_data_ases2_by_rg(array($FS_KD_REG2)));
        $this->smarty->assign("ases2", $this->m_rawat_jalan->get_data_ases2_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("terapi", $this->m_rawat_jalan->get_data_terapi_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("alergi", $this->m_rawat_jalan->get_data_alergi_by_rg(array($FS_KD_REG2)));
        $this->smarty->assign("nutrisi", $this->m_rawat_jalan->get_data_nutrisi_by_rg(array($FS_KD_REG2)));
        $this->smarty->assign("nyeri", $this->m_rawat_jalan->get_data_nyeri_by_rg(array($FS_KD_REG2)));
        $this->smarty->assign("masalah", $this->m_rawat_jalan->get_data_masalah_by_rg(array($FS_KD_REG2)));
        $this->smarty->assign("masalah2", $this->m_rawat_jalan->get_data_masalah_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("ases_kebid", $this->m_rawat_jalan->get_data_ases_kebid_by_rg(array($FS_KD_REG2)));
        $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_px_history(array($now, $medis, $medis, $medis, $FS_MR['FS_MR'])));
        $this->smarty->assign("rs_pasien_inap", $this->m_rawat_jalan->get_px_rawat_inap(array($FS_MR['FS_MR'])));
        $this->smarty->assign("rs_resep", $this->m_rawat_jalan->get_resep());
        $this->smarty->assign("no", '1');
        $this->smarty->assign("FS_KD_REG_LAMA", $FS_KD_REG);
        $this->smarty->assign("FS_KD_PEG", $this->com_user['user_name']);
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
            $data_kp = $this->m_rawat_jalan->get_no_kp();
            $NOKP = 'KP' . $data_kp['KP'] . 'A';
            $NOKP2 = $data_kp['KP'] + 1;
            $update_kp = $this->m_rawat_jalan->update_tz_parameter_no_kp($NOKP2);
            $result = $this->m_rawat_jalan->get_tipe_barang_obat(array($this->input->post('FS_KD_REG')));
            $params = array(
                $NOKP,
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
                $this->input->post('FS_OBAT_PROLANIS'),
                $this->input->post('FS_TIME_OUT'),
                $this->input->post('FS_EDUKASI'),
                $this->com_user['user_id'],
                date('Y-m-d'),
                date('H:i:s')
            );

            if ($this->m_rawat_jalan->insert_tac_rj_medis($params)) {
                $FS_KD_TRS = $this->m_rawat_jalan->get_last_inserted_id();
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
                    'dx :' . strip_tags($this->input->post('FS_DIAGNOSA')) . ' , ' . strip_tags($this->input->post('FS_ANAMNESA')),
                    strip_tags($this->input->post('FS_DIAGNOSA')),
                    strip_tags($this->input->post('FS_TINDAKAN')) . ' , ' . strip_tags($this->input->post('FS_TERAPI')),
                    strip_tags($this->input->post('FS_CATATAN_FISIK')),
                    1,
                    $this->input->post('FS_KD_PETUGAS_MEDIS'),
                    $result['FS_KD_TIPE_BRG_RAWAT_JALAN'],
                    '2'
                );
                $this->m_rawat_jalan->insert_medis($params);
                $this->m_rawat_jalan->update_data_resep(array($NOKP, $this->input->post('FS_KD_REG')));
                $this->m_rawat_jalan->update_data_resep2(array($NOKP));
                
                $cekskdp = $this->m_rawat_jalan->get_cek_skdp(array($this->input->post('FS_KD_REG')));
                $cekasesinapmedis = $this->m_rawat_jalan->get_cek_ases_inap_medis(array($this->input->post('FS_KD_REG')));
                
                $this->m_rawat_jalan->update_level_medis(array('2', $this->input->post('FS_KD_REG')));
                $params8 = array(
                    $this->input->post('FS_ALERGI'),
                    $this->input->post('FS_HIGH_RISK'),
                    $this->input->post('FS_MR')
                );
                $this->m_rawat_jalan->update_high_risk2($params8);
                //cek antrian farmasi
                $no_antrian_far = $this->m_rawat_jalan->get_antrian_far(array(date('Y-m-d')));
                if (is_null($no_antrian_far['ANTRIAN'])) {
                    $no_antrian_far['ANTRIAN'] = '0';
                }
                $antrian = $no_antrian_far['ANTRIAN'] + 1;
                //insert antrian obat
                $params9 = array(
                    $FS_KD_TRS,
                    $antrian,
                    date('Y-m-d')
                );
                $this->m_rawat_jalan->insert_antrian_obat($params9);
                //insert pemeriksaan lab
                $lab = $this->input->post('tujuan');
                if (!empty($lab)) {
                    foreach ($lab as $key => $value) {
                        $this->m_rawat_jalan->insert_pemeriksaan_lab(array($NOKP,$key, $value, $this->input->post('FS_KD_REG')));
                    }
                }
                //insert pemeriksaan radiologi
                $rad = $this->input->post('tembusan');
                if (!empty($rad)) {
                    foreach ($rad as $key => $value) {
                        $this->m_rawat_jalan->insert_pemeriksaan_rad(array($NOKP,$key, $value, $this->input->post('FS_KD_REG')));
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
        if ($this->input->post('FS_CARA_PULANG') == '2') {
            if ($cekskdp >= '1') {
                redirect("medis/rawat_jalan/edit_skdp/" . $this->input->post('FS_KD_REG'));
            } elseif ($this->input->post('FS_CARA_PULANG') == '2' && $cekskdp == '0') {
                redirect("medis/rawat_jalan/add_skdp/" . $this->input->post('FS_KD_REG'));
            } else {
                redirect("medis/rawat_jalan/cetak/" . $this->input->post('FS_KD_REG') . '/' . $FS_KD_TRS);
            }
        } elseif ($this->input->post('FS_CARA_PULANG') == '3') {
            if ($cekasesinapmedis >= '1') {
                redirect("medis/rawat_inap/edit_rj/" . $this->input->post('FS_KD_REG'));
            } elseif ($this->input->post('FS_CARA_PULANG') == '3' && $cekasesinapmedis == '0') {
                redirect("medis/rawat_inap/add_rj/" . $this->input->post('FS_KD_REG'));
            } else {
                redirect("medis/rawat_jalan/cetak/" . $this->input->post('FS_KD_REG') . '/' . $FS_KD_TRS);
            }
        } elseif ($this->input->post('FS_CARA_PULANG') == '4') {
            redirect("medis/rawat_jalan/add_rujuk/" . $this->input->post('FS_KD_REG'));
        } elseif ($this->input->post('FS_CARA_PULANG') == '6') {
            redirect("medis/rawat_jalan/add_rujuk_internal/" . $this->input->post('FS_KD_REG'));
        } else {
            redirect("medis/rawat_jalan/cetak/" . $this->input->post('FS_KD_REG') . '/' . $FS_KD_TRS);
        }
    }

    public function edit($FS_KD_REG = "", $FS_KD_TRS = "", $FS_KD_KP="") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "medis/rawat_jalan/edit.html");
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $FS_MR = $this->m_rawat_jalan->get_rm_px_by_rg(array($FS_KD_REG));
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG)));
        $this->smarty->assign("medis", $this->m_rawat_jalan->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS)));
        $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_px_history(array($now, $medis, $medis, $medis, $FS_MR['FS_MR'])));
        $this->smarty->assign("rs_pasien_inap", $this->m_rawat_jalan->get_px_rawat_inap(array($FS_MR['FS_MR'])));
        $this->smarty->assign("rs_resep", $this->m_rawat_jalan->get_resep());
        $this->smarty->assign("no", '1');
        $tujuan = $this->m_rawat_jalan->list_pemeriksaan_lab_by_rg($FS_KD_REG);
        $tujuan_str = "";
        foreach ($tujuan as $key => $value) {
            $tujuan_str .= "'" . $value['FS_KD_TARIF'] . "',";
        }
        $this->smarty->assign('rs_tujuan', $tujuan_str);

        $tembusan = $this->m_rawat_jalan->list_pemeriksaan_rad_by_rg($FS_KD_REG);
        $tembusan_str = "";
        foreach ($tembusan as $key => $value) {
            $tembusan_str .= "'" . $value['FS_KD_TARIF'] . "',";
        }
        $this->smarty->assign('rs_tembusan', $tembusan_str);

        $this->smarty->assign('FS_KD_KP', $FS_KD_KP);
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
                '',
                $this->input->post('FS_TIME_OUT'),
                $this->input->post('FS_EDUKASI'),
                $this->com_user['user_id'],
                date('Y-m-d'),
                $this->input->post('FS_KD_TRS')
            );
            /*              */
            // insert
            //if () {
            if ($this->m_rawat_jalan->update_tac_rj_medis($params)) {
                //$this->m_rawat_jalan->update_level_medis(array('2', $this->input->post('FS_KD_REG')));
                $cekskdp = $this->m_rawat_jalan->get_cek_skdp(array($this->input->post('FS_KD_REG')));
                $cekasesinapmedis = $this->m_rawat_jalan->get_cek_ases_inap_medis(array($this->input->post('FS_KD_REG')));


                $params2 = array(
                  'dx :' . strip_tags($this->input->post('FS_DIAGNOSA')) . ' , ' . strip_tags($this->input->post('FS_ANAMNESA')),
                  strip_tags($this->input->post('FS_DIAGNOSA')),
                  strip_tags($this->input->post('FS_TINDAKAN')) . ' , ' . strip_tags($this->input->post('FS_TERAPI')),
                  strip_tags($this->input->post('FS_CATATAN_FISIK')),
                  $this->com_user['user_name'],
                  'RJ',
                  '2',
                  $this->input->post('FS_KD_KP')
              );

                $this->m_rawat_jalan->update_medis($params2);

                $params8 = array(
                    $this->input->post('FS_ALERGI'),
                    $this->input->post('FS_HIGH_RISK'),
                    $this->input->post('FS_MR')
                );
                $this->m_rawat_jalan->update_high_risk2($params8);

                $lab = $this->input->post('tujuan');
                $this->m_rawat_jalan->delete_pemeriksaan_lab($this->input->post('FS_KD_REG'));
                if (!empty($lab)) {
                    foreach ($lab as $key => $value) {
                        $this->m_rawat_jalan->insert_pemeriksaan_lab(array('',$key, $value, $this->input->post('FS_KD_REG')));
                    }
                }
                $rad = $this->input->post('tembusan');
                $this->m_rawat_jalan->delete_pemeriksaan_rad($this->input->post('FS_KD_REG'));
                if (!empty($rad)) {
                    foreach ($rad as $key => $value) {
                        $this->m_rawat_jalan->insert_pemeriksaan_rad(array('',$key, $value, $this->input->post('FS_KD_REG')));
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
        if ($this->input->post('FS_CARA_PULANG') == '2') {
            if ($cekskdp >= '1') {
                redirect("medis/rawat_jalan/edit_skdp/" . $this->input->post('FS_KD_REG'));
            } elseif ($this->input->post('FS_CARA_PULANG') == '2' && $cekskdp == '0') {
                redirect("medis/rawat_jalan/add_skdp/" . $this->input->post('FS_KD_REG'));
            } else {
                redirect("medis/rawat_jalan/cetak/" . $this->input->post('FS_KD_REG') . '/' . $FS_KD_TRS);
            }
        } elseif ($this->input->post('FS_CARA_PULANG') == '3') {
            if ($cekasesinapmedis >= '1') {
                redirect("medis/rawat_inap/edit_rj/" . $this->input->post('FS_KD_REG'));
            } elseif ($this->input->post('FS_CARA_PULANG') == '3' && $cekasesinapmedis == '0') {
                redirect("medis/rawat_inap/add_rj/" . $this->input->post('FS_KD_REG'));
            } else {
                redirect("medis/rawat_jalan/cetak/" . $this->input->post('FS_KD_REG') . '/' . $FS_KD_TRS);
            }
        } elseif ($this->input->post('FS_CARA_PULANG') == '4') {
            redirect("medis/rawat_jalan/add_rujuk/" . $this->input->post('FS_KD_REG'));
        } elseif ($this->input->post('FS_CARA_PULANG') == '6') {
            redirect("medis/rawat_jalan/add_rujuk_internal/" . $this->input->post('FS_KD_REG'));
        } else {
            redirect("medis/rawat_jalan/cetak/" . $this->input->post('FS_KD_REG') . '/' . $FS_KD_TRS);
        }
    }

    public function add_skdp($FS_KD_REG = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "medis/rawat_jalan/add_skdp.html");
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG)));
        $this->smarty->assign("rs_skdp_alasan", $this->m_rawat_jalan->get_tac_com_parameter_alasan());
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
            $no_skdp = $this->m_rawat_jalan->get_no_skdp(array(date('m'), date('Y')));
            if (is_null($no_skdp['NOSKDP'])) {
                $no_skdp['NOSKDP'] = '0';
            }
            $SKDP = $no_skdp['NOSKDP'] + 1;
            $params = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('FS_SKDP_1'),
                $this->input->post('FS_SKDP_2'),
                $this->input->post('FS_SKDP_KET'),
                $this->input->post('FS_SKDP_KONTROL'),
                $SKDP,
                $this->com_user['user_name'],
                date('Y-m-d'),
                date('H:i:s')
            );
            // insert
            // if ($this->m_rawat_jalan->insert_medis($params)) {
            if ($this->m_rawat_jalan->insert_tac_rj_skdp($params)) {
                //insert pemeriksaan lab
                $lab = $this->input->post('tujuan');
                if (!empty($lab)) {
                    foreach ($lab as $key => $value) {
                        $this->m_rawat_jalan->insert_pemeriksaan_lab_skdp(array($key, $value, $this->input->post('FS_KD_REG')));
                    }
                }
                //insert pemeriksaan radiologi
                $rad = $this->input->post('tembusan');
                if (!empty($rad)) {
                    foreach ($rad as $key => $value) {
                        $this->m_rawat_jalan->insert_pemeriksaan_rad_skdp(array($key, $value, $this->input->post('FS_KD_REG')));
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
        redirect("medis/rawat_jalan/cetak/" . $this->input->post('FS_KD_REG') . '/' . $this->input->post('FS_KD_TRS'));
    }

    public function edit_skdp($FS_KD_REG = "") {
// set page rules
        $this->_set_page_rule("U");
// set template content
        $this->smarty->assign("template_content", "medis/rawat_jalan/edit_skdp.html");
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG)));
        $this->smarty->assign("rs_skdp_alasan", $this->m_rawat_jalan->get_tac_com_parameter_alasan());

        $tujuan = $this->m_rawat_jalan->list_pemeriksaan_lab_by_rg_skdp($FS_KD_REG);
        $tujuan_str = "";
        foreach ($tujuan as $key => $value) {
            $tujuan_str .= "'" . $value['FS_KD_TARIF'] . "',";
        }
        $this->smarty->assign('rs_tujuan', $tujuan_str);

        $tembusan = $this->m_rawat_jalan->list_pemeriksaan_rad_by_rg_skdp($FS_KD_REG);
        $tembusan_str = "";
        foreach ($tembusan as $key => $value) {
            $tembusan_str .= "'" . $value['FS_KD_TARIF'] . "',";
        }
        $this->smarty->assign('rs_tembusan', $tembusan_str);
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
            //if ($this->m_rawat_jalan->update_medis($params)) {
            if ($this->m_rawat_jalan->update_tac_rj_skdp($params)) {

                $lab = $this->input->post('tujuan');
                $this->m_rawat_jalan->delete_pemeriksaan_lab_skdp($this->input->post('FS_KD_REG'));
                if (!empty($lab)) {
                    foreach ($lab as $key => $value) {
                        $this->m_rawat_jalan->insert_pemeriksaan_lab_skdp(array($key, $value, $this->input->post('FS_KD_REG')));
                    }
                }
                $rad = $this->input->post('tembusan');
                $this->m_rawat_jalan->delete_pemeriksaan_rad_skdp($this->input->post('FS_KD_REG'));
                if (!empty($rad)) {
                    foreach ($rad as $key => $value) {
                        $this->m_rawat_jalan->insert_pemeriksaan_rad_skdp(array($key, $value, $this->input->post('FS_KD_REG')));
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
        redirect("medis/rawat_jalan/cetak/" . $this->input->post('FS_KD_REG') . '/' . $this->input->post('FS_KD_TRS'));
    }

    public function add_rujuk($FS_KD_REG = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "medis/rawat_jalan/add_rujuk.html");
        // load javascript    
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG)));
        $this->smarty->assign("rs_skdp_alasan", $this->m_rawat_jalan->get_tac_com_parameter_alasan());
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }

    public function add_rujuk_process() {
        // set page rules
        $this->_set_page_rule("C");

        $this->load->model('m_surat_sehat');
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
        $this->tnotification->set_rules('FS_ALASAN_RUJUK', 'ALASAN DI RUJUK', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('FS_TUJUAN_RUJUKAN'),
                $this->input->post('FS_TUJUAN_RUJUKAN2'),
                $this->input->post('FS_ALASAN_RUJUK'),
                $this->com_user['user_name'],
                date('Y-m-d'),
                date('H:i:s')
            );
            if ($this->m_rawat_jalan->insert_tac_rj_rujukan($params)) {

                $data_surat = $this->m_surat_sehat->get_no_surat();
                $NOSURAT = 'SK' . $data_surat['SURAT'];
                $NOSURAT2 = $data_surat['SURAT'] + 1;
                $this->m_surat_sehat->update_tz_parameter_no_surat(array($NOSURAT2));

                $params2 = array(
                    $NOSURAT,
                    date('Y-m-d'),
                    date('H:i:s'),
                    '104',
                    $NOSURAT . '/' . date('m') . '/' . date('Y'),
                    $this->input->post('FS_KD_REG'),
                    $this->com_user['user_name'],
                    $this->input->post('FS_TUJUAN_RUJUKAN'),
                    $this->input->post('FS_TUJUAN_RUJUKAN2'),
                    $this->input->post('FS_ALASAN_RUJUK'),
                    $this->com_user['user_name'],
                    $this->com_user['user_name']
                );

                $this->m_surat_sehat->insert_surat_rujukan_rs($params2);
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
            redirect("medis/rawat_jalan/add_rujuk/" . $this->input->post('FS_KD_REG'));
        }
        // default redirect
        redirect("medis/rawat_jalan/cetak/" . $this->input->post('FS_KD_REG') . '/' . $this->input->post('FS_KD_TRS'));
    }

    public function add_rujuk_internal($FS_KD_REG = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "medis/rawat_jalan/add_rujuk_internal.html");
        // load javascript    
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG)));
        $this->smarty->assign("rs_skdp_alasan", $this->m_rawat_jalan->get_tac_com_parameter_alasan());
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }

    public function cetak($FS_KD_REG = "", $FS_KD_TRS = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "medis/rawat_jalan/cetak.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG)));
        $this->smarty->assign("medis", $this->m_rawat_jalan->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS)));
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
        $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG));
        $data['rs_resep'] = $this->m_rawat_jalan->get_data_terapi_by_rg(array($FS_KD_REG));
        $data['rs_lab'] = $this->m_rawat_jalan->get_data_lab_by_rg(array($FS_KD_REG));
        $data['rs_rad'] = $this->m_rawat_jalan->get_data_rad_by_rg(array($FS_KD_REG));
        $data["vs"] = $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG));
        $data["nyeri"] = $this->m_rawat_jalan->get_data_nyeri_by_rg(array($FS_KD_REG));
        $data["jatuh"] = $this->m_rawat_jalan->get_data_jatuh_by_rg(array($FS_KD_REG));
        $data["ases2"] = $this->m_rawat_jalan->get_data_ases2_by_rg(array($FS_KD_REG));
        $data["result"] = $this->m_rawat_jalan->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS));
        $data["header1"] = $this->m_rawat_jalan->get_header1();
        $data["header2"] = $this->m_rawat_jalan->get_header2();
        ob_start();
        $this->load->view('medis/rawat_jalan/print', $data);
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
        $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG));
        $data['rs_skdp'] = $this->m_rawat_jalan->get_data_skdp_by_rg(array($FS_KD_REG));
        $data["result"] = $this->m_rawat_jalan->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS));
        $data["header1"] = $this->m_rawat_jalan->get_header1();
        $data["header2"] = $this->m_rawat_jalan->get_header2();
        $data["alamat"] = $this->m_rawat_jalan->get_alamat();
        ob_start();
        $this->load->view('medis/rawat_jalan/skdp', $data);
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

    public function skdp_rencana() {
        $id = $this->input->post('skdp_alasan');
        $rs_skdp_rencana = $this->m_rawat_jalan->get_tac_com_parameter_rencana($id);
        //$data .= "<option>--Pilih Alasan--</option>";
        foreach ($rs_skdp_rencana as $skdp_rencana) {
            $data.= '<option value="' . $skdp_rencana['FS_KD_TRS'] . '">' . $skdp_rencana['FS_NM_SKDP_RENCANA'] . '</option>';
        }
        echo $data;
    }

    public function list_pemeriksaan_lab() {
        $instansi = $this->m_rawat_jalan->list_pemeriksaan_lab();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['FS_NM_TARIF'],
                'value' => $value['FS_KD_TARIF']
            );
            $i++;
        }
        echo json_encode($data);
    }

    public function list_pemeriksaan_rad() {
        $instansi = $this->m_rawat_jalan->list_pemeriksaan_rad();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['FS_NM_TARIF'],
                'value' => $value['FS_KD_TARIF']
            );
            $i++;
        }
        echo json_encode($data);
    }

    public function list_resep() {
        $params = array(
            $this->input->post('FS_KD_REG_LAMA')
        );
        $data = $this->m_rawat_jalan->get_data_terapi_by_rg($params);
        echo json_encode($data);
    }

    public function list_resep_baru() {
        $params = array(
            $this->input->post('FS_KD_REG2')
        );
        $data = $this->m_rawat_jalan->get_data_terapi_baru_by_rg($params);
        echo json_encode($data);
    }

    public function list_resep_baru_edit() {
        $params = array(
            $this->input->post('FS_KD_KP')
        );
        $data = $this->m_rawat_jalan->get_data_terapi_baru_by_rg_edit($params);
        echo json_encode($data);
    }

    public function SatBarang() {
        $FS_KD_BARANG = $this->input->post('FS_KD_BARANG');
        $data = $this->m_rawat_jalan->get_sat_barang(array($FS_KD_BARANG));
        echo json_encode($data);
    }

    public function get_resep_by_copy($FS_KD_TRS2) {
        $FS_KD_TRS2 = $this->input->post('id');
        // insert
        $data = $this->m_rawat_jalan->get_data_terapi_by_trs2(array($FS_KD_TRS2));
        echo json_encode($data);
    }

    public function add_process_resep() {
        $result = $this->m_rawat_jalan->get_tipe_barang_obat(array($this->input->post('FS_KD_REG')));
        $params = array(
            $this->input->post('FS_KD_BARANG'),
            $this->input->post('FS_NM_BARANG'),
            $this->input->post('FS_KD_SATUAN'),
            $this->input->post('FN_QTY_BARANG'),
            'ADA',
            $result['FS_KD_TIPE_BRG_RAWAT_JALAN'],
            $this->input->post('FS_ETIKET_QTY'),
            $this->input->post('FS_ETIKET_CATATAN'),
            $this->input->post('FN_ETIKET_HARI'),
            $this->input->post('FS_KD_REG')
        );
        // insert
        $data = $this->m_rawat_jalan->insert_resep($params);
        echo json_encode($data);
    } 

    public function add_process_resep_edit() {
        $result = $this->m_rawat_jalan->get_tipe_barang_obat_kp(array($this->input->post('FS_KD_KP')));
        $params = array(
            $this->input->post('FS_KD_KP'),
            $this->input->post('FS_KD_BARANG'),
            $this->input->post('FS_NM_BARANG'),
            $this->input->post('FS_KD_SATUAN'),
            $this->input->post('FN_QTY_BARANG'),
            'ADA',
            $result['FS_KD_TIPE_BRG_RAWAT_JALAN'],
            $this->input->post('FS_ETIKET_QTY'),
            $this->input->post('FN_ETIKET_HARI'),
            $this->input->post('FS_ETIKET_CATATAN')
        );
        // insert
        $data = $this->m_rawat_jalan->insert_resep_edit($params);
        echo json_encode($data);
    }

    public function delete_resep_process() {
        $params = array(
            $this->input->post('kode')
        );
        // insert
        $data = $this->m_rawat_jalan->delete_resep_process($params);
        echo json_encode($data);
    }

}
