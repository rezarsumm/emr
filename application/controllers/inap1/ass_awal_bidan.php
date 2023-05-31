<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class ass_awal_bidan extends ApplicationBase {

    // constructor 
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_ass_awal_bidan');
        $this->load->model('m_ass_awal');
        $this->load->model('m_ass_jatuh');
        $this->load->model('m_igd');
        // load library
        $this->load->library('tnotification');
        $this->load->library('pagination');
        $this->load->library('datetimemanipulation');
        $this->load->library('tupload');
        //$this->load->library('twhatsapp');
        $this->smarty->assign('dtm', $this->datetimemanipulation);
        $this->smarty->assign('m_ass_awal_bidan', $this->m_ass_awal_bidan);
    }

    // tambah surat masuk
    public function index() {
        // set page rules 
        $this->_set_page_rule("C");
        // set template content

         $role = $this->com_user['role_id'];

        if ($role == '24'){

        $this->smarty->assign("template_content", "inap/ass_awal_bidan/listugd.html");
        } 
        else{
         $this->smarty->assign("template_content", "inap/ass_awal_bidan/list.html");
        }

        
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

        $fs_kd_layanan = $this->com_user['fs_kd_layanan'];

        if($fs_kd_layanan == 'MNA')
        {
              $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_mina());
        }

        else{

            if ($role == '6'){
                $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_bangsal(array($date, $date2, $date, $date, $date, $date, $date, $date, $date, $date, $date)));
            
            }
            else if ($role == '23'){
                $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_bangsal(array($date, $date2, $date, $date, $date, $date, $date, $date, $date, $date, $date)));
            
            }

            else if ($role == '24'){
                 $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_ugd());
            
            }


            else{
               $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_bangsal_by_bangsal(array($this->com_user['fs_kd_layanan'])));
            }
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
        $this->smarty->assign("template_content", "inap/ass_awal_bidan/list_his.html");
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
        $cek = $this->m_ass_awal_bidan->cek_ass_awal(array($FS_RG2));
        if ($cek == '0') {
            redirect("inap/ass_awal_bidan/add/" . $FS_RG2);
        } elseif ($cek >= '1') {
            redirect("inap/ass_awal_bidan/edit/" . $FS_RG2);
        }
    }
     
    public function cari_process_cppt($FS_RG2="") {
        
        $cek = $this->m_ass_awal_bidan->cek_ass_awal(array($FS_RG2));
        if ($cek == '0') {
            redirect("inap/ass_awal_bidan/add/" . $FS_RG2);
        } elseif ($cek >= '1') {
            redirect("inap/ass_awal_bidan/edit/" . $FS_RG2);
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
            redirect("inap/ass_awal_bidan/lists2/" . $this->input->post('FS_MR'));
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("inap/ass_awal_bidan/cari2");
    }

    // tambah surat masuk
    public function lists($FS_MR = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/ass_awal_bidan/list2.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        //$new_reg = number_format(347104100000000 + $FS_MR, 0, "", "");
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_ass_awal_bidan->get_pasien_by_mr($FS_MR));
        //$this->smarty->assign("rs_ass_awal", $this->m_ass_awal_bidan->get_all_ass_awal($new_reg));
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
        $this->smarty->assign("template_content", "inap/ass_awal_bidan/list2.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $new_reg = number_format(347104100000000 + $FS_MR, 0, "", "");
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_ass_awal_bidan->get_pasien_by_mr($new_reg));
        //$this->smarty->assign("rs_ass_awal", $this->m_ass_awal_bidan->get_all_ass_awal($new_reg));
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
        $this->smarty->assign("template_content", "inap/ass_awal_bidan/add.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_ass_awal_bidan->get_pasien_by_rg(array($FS_RG)));
        $this->smarty->assign("data", $this->m_igd->get_data_bidan_by_noreg(array($FS_RG)));           
        $this->smarty->assign("ps", $this->m_igd->get_suami(array($FS_RG)));           
        $this->smarty->assign("nyeri", $this->m_rawat_jalan->get_data_nyeri_by_rg(array($FS_RG)));
        $this->smarty->assign("jatuh", $this->m_igd->get_data_jatuh_by_rg(array($FS_RG))); 
        $this->smarty->assign("nutrisi", $this->m_rawat_jalan->get_data_nutrisi_by_rg(array($FS_RG)));

         $this->smarty->assign("fungsi", $this->m_ass_awal->get_data_fungsi_by_rg(array($FS_RG)));

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }



      public function riwayat_hamil($FS_RG = '') {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/ass_awal_bidan/hamil.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_ass_awal_bidan->get_pasien_by_rg(array($FS_RG)));
        $this->smarty->assign("data_hamil", $this->m_ass_awal_bidan->get_riw_hamil(array($FS_RG)));

        //$this->smarty->assign("rs_obat", $this->m_ass_awal_bidan->get_obat(array($FS_RG)));
        //$this->smarty->assign("rs_layanan", $this->m_ass_awal_bidan->get_layanan());

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }


      public function riwayat_hamil2($FS_RG = '') {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/ass_awal_bidan/hamil2.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_ass_awal_bidan->get_pasien_by_rg(array($FS_RG)));
        $this->smarty->assign("data_hamil", $this->m_ass_awal_bidan->get_riw_hamil(array($FS_RG)));

        //$this->smarty->assign("rs_obat", $this->m_ass_awal_bidan->get_obat(array($FS_RG)));
        //$this->smarty->assign("rs_layanan", $this->m_ass_awal_bidan->get_layanan());

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
        $this->smarty->assign("template_content", "inap/ass_awal_bidan/edit.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_ass_awal_bidan->get_pasien_by_rg(array($FS_RG)));
        $this->smarty->assign("vs", $this->m_ass_awal_bidan->get_data_vs_by_rg(array($FS_RG)));
        $this->smarty->assign("ases2", $this->m_ass_awal_bidan->get_data_ases2_by_rg(array($FS_RG)));
        $this->smarty->assign("nyeri", $this->m_ass_awal_bidan->get_data_nyeri_by_rg(array($FS_RG)));
        //$this->smarty->assign("alergi", $this->m_ass_awal_bidan->get_data_alergi_by_rg(array($FS_RG)));
        $this->smarty->assign("nutrisi", $this->m_ass_awal_bidan->get_data_nutrisi_by_rg(array($FS_RG)));
        $this->smarty->assign("jatuh", $this->m_ass_awal_bidan->get_data_jatuh_by_rg(array($FS_RG)));
        $this->smarty->assign("fungsi", $this->m_ass_awal_bidan->get_data_fungsi_by_rg(array($FS_RG)));
        // get instansi tujuan
        $tujuan = $this->m_ass_awal_bidan->list_masalah_kep_by_rg($FS_RG);
        $tujuan_str = "";
        foreach ($tujuan as $key => $value) {
            $tujuan_str .= "'" . $value['FS_KD_MASALAH_KEP'] . "',";
        }
        $this->smarty->assign('rs_tujuan', $tujuan_str);

        $spiritual = $this->m_ass_awal_bidan->list_keb_spiritual_by_rg($FS_RG);
        $spiritual_str = "";
        foreach ($spiritual as $key => $value) {
            $spiritual_str .= "'" . $value['FS_KD_SPIRITUAL'] . "',";
        }
        $this->smarty->assign('rs_spiritual', $spiritual_str);
        //edukasi
        $edukasi = $this->m_ass_awal_bidan->list_edukasi_by_rg($FS_RG);
        $edukasi_str = "";
        foreach ($edukasi as $key => $value) {
            $edukasi_str .= "'" . $value['FS_KD_EDUKASI'] . "',";
        }
        $this->smarty->assign('rs_edukasi', $edukasi_str);
        //planning
        $planning = $this->m_ass_awal_bidan->list_planning_by_rg($FS_RG);
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
        $this->tnotification->set_rules('FS_ALERGI', 'ALERGI', 'trim|required');
        $this->tnotification->set_rules('FS_REAK_ALERGI', 'REAKSI ALERGI', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_REG'),
                '1',
                '11',
                $this->com_user['user_id'],
                date('Y-m-d')
            );
            // insert
            if ($this->m_ass_awal_bidan->insert($params)) {//status
                $params1 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FS_SUHU'),
                    $this->input->post('FS_NADI'),
                    $this->input->post('FS_R'),
                    $this->input->post('FS_TD'),
                    $this->input->post('FS_TB'),
                    $this->input->post('FS_BB'),
                    $this->input->post('FS_KD_MEDIS'),
                    $this->com_user['user_id'],
                    date('Y-m-d'),
                    date('H:i:s')
                );
                $this->m_ass_awal_bidan->insert_vs($params1);//vital sign
                // insert
                $params2 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FS_NYERIP'),
                    $this->input->post('FS_NYERIQ'),
                    $this->input->post('FS_NYERIR'),
                    $this->input->post('FS_NYERIS'),
                    $this->input->post('FS_NYERIT'),
                    $this->com_user['user_id'],
                    date('Y-m-d'),
                    $this->input->post('FS_NYERI')
                );
                $this->m_ass_awal_bidan->insert_nyeri($params2);//nyeri
                $params3 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FS_SCORE'),
                    $this->com_user['user_id'],
                    date('Y-m-d')
                );
                $this->m_ass_awal_bidan->insert_jatuh($params3);//jatuh 
                $params4 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU'),
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU2'),
                    $this->input->post('FS_STATUS_PSIK'),
                    '',
                     '',
                    '',
                    $this->input->post('FS_AGAMA'),
                    '',
                    '',
                    $this->input->post('FS_PEMERIKSAAN_FISIK'),
                    '',
                    '',
                    '',
                    '',
                     $this->input->post('FS_ANAMNESA'),
                     $this->input->post('FS_HAID_MEN'),
                     $this->input->post('FS_HAID_SIKLUS'),
                     $this->input->post('FS_HAID_LAMA'),
                     $this->input->post('FS_HAID_HPHT'),
                     $this->input->post('FS_HAID_HPL'),
                     $this->input->post('FS_HAID_KELUHAN'),
                     $this->input->post('FS_STATUS_PERKAWINAN'),
                     $this->input->post('FS_LAMA_MENIKAH'),
                     $this->input->post('RIWAYAT_KEHAMILAN'),
                     $this->input->post('FS_ASMA_MULAI'),
                     $this->input->post('FS_ASMA_TERAPI'),
                     $this->input->post('FS_JANTUNG_MULAI'),
                     $this->input->post('FS_JANTUNG_TERAPI'),
                     $this->input->post('FS_DIABETES_MULAI'),
                     $this->input->post('FS_DIABETES_TERAPI'),
                     $this->input->post('FS_HIPERTENSI_MULAI'),
                     $this->input->post('FS_HIPERTENSI_TERAPI'),
                     $this->input->post('FS_SAKIT_LAIN'),
                     $this->input->post('FS_RIWAYAT_GYNEKOLOGI'),
                     $this->input->post('FS_RIWAYAT_KB'),
                     $this->input->post('FS_RIWAYAT_KOMPLIKASI_KB'),
                     $this->input->post('POLA_MAKAN'),
                     $this->input->post('POLA_MINUM'),
                     $this->input->post('POLA_BAK'),
                     $this->input->post('POLA_BAB'),
                     '',
                     // $this->input->post('POLA_TIDUR'),
                     $this->input->post('JAM_TERAKHIR_MAKAN'),
                     $this->input->post('JAM_TERAKHIR_MINUM'),
                     $this->input->post('JAM_TERAKHIR_BAK'),
                     $this->input->post('JAM_TERAKHIR_BAB'),
                     '',
                     // $this->input->post('JAM_TERAKHIR_TIDUR'),
                     $this->input->post('RUMAH_MILIK'),
                     $this->input->post('TINGGAL_BERSAMA'),
                     $this->input->post('PJ_DARURAT'),
                     $this->input->post('HUBUNGAN_PJ'),
                     $this->input->post('AKTIFITAS'),
                     $this->input->post('SOSIAL_SUPPORT'),
                     $this->input->post('PENERIAMAAN_PERSALINAN'),
                     $this->input->post('KEADAAN_UMUM'),
                     $this->input->post('ALAT_BANTU'),
                     $this->input->post('MATA'),
                     $this->input->post('KEPALA'),
                     $this->input->post('TELINGA'),
                     $this->input->post('HIDUNG'),
                     $this->input->post('TENGGOROKAN'),
                     $this->input->post('LEHER'),
                     $this->input->post('DADA'),
                     $this->input->post('JANTUNG'),
                     $this->input->post('PARU_PARU'),
                     $this->input->post('ABDOMEN'),
                     $this->input->post('BADAN_GERAK_ATAS'),
                     $this->input->post('BADAN_GERAK_BAWAH'),
                     $this->input->post('SCLERA'),
                     $this->input->post('KONJUNGTIVA'),
                     $this->input->post('CEK_DADA'),
                     $this->input->post('INSPEKSI_ABDOMEN'),
                     $this->input->post('LEOPOD_1'),
                     $this->input->post('LEOPOD_2'),
                     $this->input->post('LEOPOD_3'),
                     $this->input->post('LEOPOD_4'),
                     $this->input->post('AUSKULTASI'),
                     $this->input->post('KONTRAKSI'),
                     '',
                     // $this->input->post('DURASI_KONTRAKSI'),
                     $this->input->post('INSPEKSI_ANO_GENITAS'),
                     $this->input->post('VAGINA_TOUCHER'),
                     $this->input->post('MASALAH_KEBIDANAN'),
                     $this->input->post('DIAGNOSA'),
                     $this->input->post('NAMA_SUAMI'),
                     $this->input->post('TGL_LAHIR_SUAMI'),
                     $this->input->post('AGAMA_SUAMI'),
                     $this->input->post('PENDIDIKAN_SUAMI'),
                     $this->input->post('JOB_SUAMI'),
                    $this->com_user['user_id'],
                    date('Y-m-d H:i:s')
                );
                $this->m_ass_awal_bidan->insert_ases_bidan($params4);//ases awal perawat
                $params5 = array(
                    $this->input->post('FS_ALERGI'),
                    $this->input->post('FS_REAK_ALERGI'),
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU'),
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU2'),
                    $this->input->post('FS_MR')
                );
                $this->m_ass_awal_bidan->insert_alergi($params5);
                $params6 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FS_NUTRISI1'),
                    $this->input->post('FS_NUTRISI2'),
                    $this->input->post('FS_NUTRISI_ANAK1'),
                    $this->input->post('FS_NUTRISI_ANAK2'),
                    $this->input->post('FS_NUTRISI_ANAK3'),
                    $this->input->post('FS_NUTRISI_ANAK4'),
                    $this->com_user['user_id'],
                    date('Y-m-d')
                );
                $this->m_ass_awal_bidan->insert_nutrisi($params6);
                $params7 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FS_FUNGSIONAL1'),
                    $this->input->post('FS_FUNGSIONAL2'),
                    $this->input->post('FS_FUNGSIONAL3'),
                    $this->input->post('FS_FUNGSIONAL4'),
                    $this->input->post('FS_FUNGSIONAL5'),
                    $this->input->post('FS_FUNGSIONAL6'),
                    $this->input->post('FS_FUNGSIONAL7'),
                    $this->input->post('FS_FUNGSIONAL8'),
                    $this->input->post('FS_FUNGSIONAL9'),
                    $this->input->post('FS_FUNGSIONAL10'),
                    $this->com_user['user_name'],
                    date('Y-m-d'),
                    date('H:i:s')
                );
                $this->m_ass_awal_bidan->insert_fungsional($params7);
// insert tujuan
                $masalah_kep = $this->input->post('tujuan');
                if (!empty($masalah_kep)) {
                    foreach ($masalah_kep as $value) {
                        $this->m_ass_awal_bidan->insert_masalah_kep(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
                $keb_spirit = $this->input->post('keb_spirit');
                if (!empty($keb_spirit)) {
                    foreach ($keb_spirit as $value) {
                        $this->m_ass_awal_bidan->insert_keb_spirit(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
                $edukasi = $this->input->post('edukasi');
                if (!empty($edukasi)) {
                    foreach ($edukasi as $value) {
                        $this->m_ass_awal_bidan->insert_edukasi(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
                $planning = $this->input->post('planning');
                if (!empty($planning)) {
                    foreach ($planning as $value) {
                        $this->m_ass_awal_bidan->insert_planning(array($this->input->post('FS_KD_REG'), $value));
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
        redirect("inap/ass_awal_bidan/selesai/".$this->input->post('FS_KD_REG'));
    }



  public function hapus_anak() {
        $params = array(
            $this->input->post('FS_KD_RIWAYAT_HAMIL')
        );
        // insert
       $this->m_ass_awal_bidan->delete_anak($params);
        redirect("inap/ass_awal_bidan/riwayat_hamil/".$this->input->post('FS_KD_REG'));
    }


     public function hapus_anak2() {
        $params = array(
            $this->input->post('FS_KD_RIWAYAT_HAMIL')
        );
        // insert
       $this->m_ass_awal_bidan->delete_anak($params);
        redirect("inap/ass_awal_bidan/riwayat_hamil2/".$this->input->post('FS_KD_REG'));
    }


     public function add_process_hamil() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
       
        // process
             
            
               $params1 = array(
                    $this->input->post('FS_MR'),
                    $this->input->post('TGL_PARTUS'),
                    $this->input->post('TEMPAT_PARTUS'),
                    $this->input->post('USIA_HAMIL'),
                    $this->input->post('JENIS_LAHIRAN'),
                    $this->input->post('PENOLONG_LAHIRAN'),
                    $this->input->post('PENYULIT'),
                    $this->input->post('ANAK_JK_BB'),
                    $this->input->post('KEADAAN_ANAK_NOW'),
                    $this->com_user['user_id'],
                    date('Y-m-d') 
                );
                if($this->m_ass_awal_bidan->insert_hamil($params1)){ 
          
                        $this->tnotification->delete_last_field();
                        $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
                  } 
      
                else {
                    // default error
                    $this->tnotification->sent_notification("error", "Detail gagal disimpan");
                }
        // default redirect
        redirect("inap/ass_awal_bidan/riwayat_hamil/".$this->input->post('FS_KD_REG'));
    }


      public function add_process_hamil2() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
       
        // process
             
            
               $params1 = array(
                    $this->input->post('FS_MR'),
                    $this->input->post('TGL_PARTUS'),
                    $this->input->post('TEMPAT_PARTUS'),
                    $this->input->post('USIA_HAMIL'),
                    $this->input->post('JENIS_LAHIRAN'),
                    $this->input->post('PENOLONG_LAHIRAN'),
                    $this->input->post('PENYULIT'),
                    $this->input->post('ANAK_JK_BB'),
                    $this->input->post('KEADAAN_ANAK_NOW'),
                    $this->com_user['user_id'],
                    date('Y-m-d') 
                );
                if($this->m_ass_awal_bidan->insert_hamil($params1)){ 
          
                        $this->tnotification->delete_last_field();
                        $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
                  } 
      
                else {
                    // default error
                    $this->tnotification->sent_notification("error", "Detail gagal disimpan");
                }
        // default redirect
        redirect("inap/ass_awal_bidan/riwayat_hamil2/".$this->input->post('FS_KD_REG'));
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
            if ($this->m_ass_awal_bidan->update($params)) {
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
                $this->m_ass_awal_bidan->update_vs($params1);
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
                $this->m_ass_awal_bidan->update_nyeri($params2);

                $params3 = array(
                    $this->input->post('FS_SCORE'),
                    $this->com_user['user_id'],
                    date('Y-m-d'),
                    $this->input->post('FS_KD_REG')
                );
                $this->m_ass_awal_bidan->update_jatuh($params3);

               $params4 = array(
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU'),
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU2'),
                    $this->input->post('FS_STATUS_PSIK'),
                    $this->input->post('FS_STATUS_PSIK2'),
                    '',
                    '',
                    $this->input->post('FS_AGAMA'),
                    $this->input->post('FS_NILAI_KHUSUS'),
                    $this->input->post('FS_NILAI_KHUSUS2'),
                    $this->input->post('FS_PEMERIKSAAN_FISIK'),
                    '',
                    '',
                    '',
                    '',
                     $this->input->post('FS_ANAMNESA'),
                     $this->input->post('FS_HAID_MEN'),
                     $this->input->post('FS_HAID_SIKLUS'),
                     $this->input->post('FS_HAID_LAMA'),
                     $this->input->post('FS_HAID_HPHT'),
                     $this->input->post('FS_HAID_HPL'),
                     $this->input->post('FS_HAID_KELUHAN'),
                     $this->input->post('FS_STATUS_PERKAWINAN'),
                     $this->input->post('FS_LAMA_MENIKAH'),
                     $this->input->post('RIWAYAT_KEHAMILAN'),
                     $this->input->post('FS_ASMA_MULAI'),
                     $this->input->post('FS_ASMA_TERAPI'),
                     $this->input->post('FS_JANTUNG_MULAI'),
                     $this->input->post('FS_JANTUNG_TERAPI'),
                     $this->input->post('FS_DIABETES_MULAI'),
                     $this->input->post('FS_DIABETES_TERAPI'),
                     $this->input->post('FS_HIPERTENSI_MULAI'),
                     $this->input->post('FS_HIPERTENSI_TERAPI'),
                     $this->input->post('FS_SAKIT_LAIN'),
                     $this->input->post('FS_RIWAYAT_GYNEKOLOGI'),
                     $this->input->post('FS_RIWAYAT_KB'),
                     $this->input->post('FS_RIWAYAT_KOMPLIKASI_KB'),
                     $this->input->post('POLA_MAKAN'),
                     $this->input->post('POLA_MINUM'),
                     $this->input->post('POLA_BAK'),
                     $this->input->post('POLA_BAB'),
                     '',
                     // $this->input->post('POLA_TIDUR'),
                     $this->input->post('JAM_TERAKHIR_MAKAN'),
                     $this->input->post('JAM_TERAKHIR_MINUM'),
                     $this->input->post('JAM_TERAKHIR_BAK'),
                     $this->input->post('JAM_TERAKHIR_BAB'),
                     '',
                     // $this->input->post('JAM_TERAKHIR_TIDUR'),
                     $this->input->post('RUMAH_MILIK'),
                     $this->input->post('TINGGAL_BERSAMA'),
                     $this->input->post('PJ_DARURAT'),
                     $this->input->post('HUBUNGAN_PJ'),
                     $this->input->post('AKTIFITAS'),
                     $this->input->post('SOSIAL_SUPPORT'),
                     $this->input->post('PENERIAMAAN_PERSALINAN'),
                     $this->input->post('KEADAAN_UMUM'),
                     $this->input->post('ALAT_BANTU'),
                     $this->input->post('MATA'),
                     $this->input->post('KEPALA'),
                     $this->input->post('TELINGA'),
                     $this->input->post('HIDUNG'),
                     $this->input->post('TENGGOROKAN'),
                     $this->input->post('LEHER'),
                     $this->input->post('DADA'),
                     $this->input->post('JANTUNG'),
                     $this->input->post('PARU_PARU'),
                     $this->input->post('ABDOMEN'),
                     $this->input->post('BADAN_GERAK_ATAS'),
                     $this->input->post('BADAN_GERAK_BAWAH'),
                     $this->input->post('SCLERA'),
                     $this->input->post('KONJUNGTIVA'),
                     $this->input->post('CEK_DADA'),
                     $this->input->post('INSPEKSI_ABDOMEN'),
                     $this->input->post('LEOPOD_1'),
                     $this->input->post('LEOPOD_2'),
                     $this->input->post('LEOPOD_3'),
                     $this->input->post('LEOPOD_4'),
                     $this->input->post('AUSKULTASI'),
                     $this->input->post('KONTRAKSI'),
                     '',
                     // $this->input->post('DURASI_KONTRAKSI'),
                     $this->input->post('INSPEKSI_ANO_GENITAS'),
                     $this->input->post('VAGINA_TOUCHER'),
                     $this->input->post('MASALAH_KEBIDANAN'),
                     $this->input->post('DIAGNOSA'),
                     $this->input->post('NAMA_SUAMI'),
                     $this->input->post('TGL_LAHIR_SUAMI'),
                     $this->input->post('AGAMA_SUAMI'),
                     $this->input->post('PENDIDIKAN_SUAMI'),
                     $this->input->post('JOB_SUAMI'),
                    $this->com_user['user_id'],
                    date('Y-m-d H:i:s'),
                    $this->input->post('FS_KD_REG')

                );
                $this->m_ass_awal_bidan->update_ases($params4);

                $params5 = array(
                    $this->input->post('FS_ALERGI'),
                    $this->input->post('FS_REAK_ALERGI'),
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU'),
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU2'),
                    $this->input->post('FS_MR')
                );
                $this->m_ass_awal_bidan->insert_alergi($params5);

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
                $this->m_ass_awal_bidan->update_nutrisi($params6);
                
                $params7 = array(
                    $this->input->post('FS_FUNGSIONAL1'),
                    $this->input->post('FS_FUNGSIONAL2'),
                    $this->input->post('FS_FUNGSIONAL3'),
                    $this->input->post('FS_FUNGSIONAL4'),
                    $this->input->post('FS_FUNGSIONAL5'),
                    $this->input->post('FS_FUNGSIONAL6'),
                    $this->input->post('FS_FUNGSIONAL7'),
                    $this->input->post('FS_FUNGSIONAL8'),
                    $this->input->post('FS_FUNGSIONAL9'),
                    $this->input->post('FS_FUNGSIONAL10'),
                    $this->input->post('FS_KD_REG')
                );
                $this->m_ass_awal_bidan->update_fungsional($params7);
                
// insert tujuan
                $masalah_kep = $this->input->post('tujuan');
                $this->m_ass_awal_bidan->delete_masalah_kep($this->input->post('FS_KD_REG'));
                if (!empty($masalah_kep)) {
                    foreach ($masalah_kep as $value) {
                        $this->m_ass_awal_bidan->insert_masalah_kep(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
                $keb_spirit = $this->input->post('keb_spirit');
                 $this->m_ass_awal_bidan->delete_keb_spirit($this->input->post('FS_KD_REG'));
                if (!empty($keb_spirit)) {
                    foreach ($keb_spirit as $value) {
                        $this->m_ass_awal_bidan->insert_keb_spirit(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
                $edukasi = $this->input->post('edukasi');
                 $this->m_ass_awal_bidan->delete_edukasi($this->input->post('FS_KD_REG'));
                if (!empty($edukasi)) {
                    foreach ($edukasi as $value) {
                        $this->m_ass_awal_bidan->insert_edukasi(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
                $planning = $this->input->post('planning');
                 $this->m_ass_awal_bidan->delete_planning($this->input->post('FS_KD_REG'));
                if (!empty($planning)) {
                    foreach ($planning as $value) {
                        $this->m_ass_awal_bidan->insert_planning(array($this->input->post('FS_KD_REG'), $value));
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
        redirect("inap/ass_awal_bidan/selesai/".$this->input->post('FS_KD_REG'));
    }

     public function selesai($FS_RG = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/ass_awal_bidan/selesai.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_ass_awal_bidan->get_pasien_by_rg(array($FS_RG)));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }
    
    public function cetak_ass_awal($FS_KD_REG = "") {
        $this->_set_page_rule("R");

        $this->load->library('html2pdf');
        $data['rs_pasien'] = $this->m_ass_awal_bidan->get_pasien_by_rg(array($FS_KD_REG));
        $data['rs_ass_awal'] = $this->m_ass_awal_bidan->get_ass_awal_by_rg(array($FS_KD_REG));
        $data['rs_diet'] = $this->m_ass_awal_bidan->get_diet_by_rg(array($FS_KD_REG));
        $data['rs_indikasi'] = $this->m_ass_awal_bidan->get_indikasi_dirawat_by_rg(array($FS_KD_REG));
        $data['rs_diag'] = $this->m_ass_awal_bidan->get_diag_by_rg(array($FS_KD_REG));
        $data['rs_tind'] = $this->m_ass_awal_bidan->get_tind_by_rg(array($FS_KD_REG));
        $data['rs_terapi'] = $this->m_ass_awal_bidan->get_terapi_by_rg(array($FS_KD_REG));
        ob_start();
        $this->load->view('rm/rawat_inap/ases_awal', $data);
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
        $users = $this->m_ass_awal_bidan->list_planning();
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
        $instansi = $this->m_ass_awal_bidan->list_edukasi();
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
        $instansi = $this->m_ass_awal_bidan->list_spiritual();
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
