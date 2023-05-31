<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class ass_awal extends ApplicationBase {

    // constructor 
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
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
        $this->smarty->assign('m_ass_awal', $this->m_ass_awal);
    }

    // tambah surat masuk
    public function index() {
        // set page rules 
        $this->_set_page_rule("C");
        // set template content

         $role = $this->com_user['role_id'];

        if ($role == '24'){

        $this->smarty->assign("template_content", "inap/ass_awal/listugd.html");
        } 
        else{
         $this->smarty->assign("template_content", "inap/ass_awal/list.html");
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
        $this->smarty->assign("template_content", "inap/ass_awal/list_his.html");
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
        $cek = $this->m_ass_awal->cek_ass_awal(array($FS_RG2));
        if ($cek == '0') {
            redirect("inap/ass_awal/add/" . $FS_RG2);
        } elseif ($cek >= '1') {
            redirect("inap/ass_awal/edit/" . $FS_RG2);
        }
    } 
     
    public function cari_process_cppt($FS_RG2="") {
        
        $cek = $this->m_ass_awal->cek_ass_awal(array($FS_RG2));
        if ($cek == '0') {
            redirect("inap/ass_awal/add/" . $FS_RG2);
        } elseif ($cek >= '1') {
            redirect("inap/ass_awal/edit/" . $FS_RG2);
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
            redirect("inap/ass_awal/lists2/" . $this->input->post('FS_MR'));
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("inap/ass_awal/cari2");
    }

    // tambah surat masuk
    public function lists($FS_MR = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/ass_awal/list2.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        //$new_reg = number_format(347104100000000 + $FS_MR, 0, "", "");
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_ass_awal->get_pasien_by_mr($FS_MR));
        //$this->smarty->assign("rs_ass_awal", $this->m_ass_awal->get_all_ass_awal($new_reg));
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
        $this->smarty->assign("template_content", "inap/ass_awal/list2.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $new_reg = number_format(347104100000000 + $FS_MR, 0, "", "");
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_ass_awal->get_pasien_by_mr($new_reg));
        //$this->smarty->assign("rs_ass_awal", $this->m_ass_awal->get_all_ass_awal($new_reg));
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
        $this->smarty->assign("template_content", "inap/ass_awal/add.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_ass_awal->get_pasien_by_rg(array($FS_RG)));
        //$this->smarty->assign("rs_obat", $this->m_ass_awal->get_obat(array($FS_RG)));
        //$this->smarty->assign("rs_layanan", $this->m_ass_awal->get_layanan());

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
        $this->smarty->assign("template_content", "inap/ass_awal/edit.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->assign("data", $this->m_igd->get_data_perawat_by_noreg(array($FS_RG)));  

        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_ass_awal->get_pasien_by_rg(array($FS_RG)));
        $this->smarty->assign("vs", $this->m_ass_awal->get_data_vs_by_rg(array($FS_RG)));
        $this->smarty->assign("ases2", $this->m_ass_awal->get_data_ases2_by_rg(array($FS_RG)));
        $this->smarty->assign("nyeri", $this->m_ass_awal->get_data_nyeri_by_rg(array($FS_RG)));
        $this->smarty->assign("alergi", $this->m_igd->get_data_alergi_by_rg(array($FS_RG)));

        $this->smarty->assign("nutrisi", $this->m_ass_awal->get_data_nutrisi_by_rg(array($FS_RG)));
        $this->smarty->assign("jatuh", $this->m_ass_awal->get_data_jatuh_by_rg(array($FS_RG)));
        $this->smarty->assign("fungsi", $this->m_ass_awal->get_data_fungsi_by_rg(array($FS_RG)));
        // get instansi tujuan
        $tujuan = $this->m_ass_awal->list_masalah_kep_by_rg($FS_RG);
        $tujuan_str = "";
        foreach ($tujuan as $key => $value) {
            $tujuan_str .= "'" . $value['FS_KD_MASALAH_KEP'] . "',";
        }
        $this->smarty->assign('rs_tujuan', $tujuan_str);

        $spiritual = $this->m_ass_awal->list_keb_spiritual_by_rg($FS_RG);
        $spiritual_str = "";
        foreach ($spiritual as $key => $value) {
            $spiritual_str .= "'" . $value['FS_KD_SPIRITUAL'] . "',";
        }
        $this->smarty->assign('rs_spiritual', $spiritual_str);
        //edukasi
        $edukasi = $this->m_ass_awal->list_edukasi_by_rg($FS_RG);
        $edukasi_str = "";
        foreach ($edukasi as $key => $value) {
            $edukasi_str .= "'" . $value['FS_KD_EDUKASI'] . "',";
        }
        $this->smarty->assign('rs_edukasi', $edukasi_str);
        //planning
        $planning = $this->m_ass_awal->list_planning_by_rg($FS_RG);
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
            if ($this->m_ass_awal->insert($params)) {
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
                $this->m_ass_awal->insert_vs($params1);
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
                $this->m_ass_awal->insert_nyeri($params2);
                $params3 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FS_SCORE'),
                    $this->com_user['user_id'],
                    date('Y-m-d')
                ); 
                $this->m_ass_awal->insert_jatuh($params3);


                $a=$this->input->post('BANTU_NAFAS');
                if($a!='Tidak'){
                    $a=$this->input->post('BANTU_NAFAS2');
                }
    
                $b=$this->input->post('PERDARAHAN');
                if($b!='Tidak'){
                    $b=$this->input->post('PERDARAHAN2'); 
                }
    
                $c=$this->input->post('FRAKTUR');
                if($c!='Tidak'){
                    $c=$this->input->post('FRAKTUR2');
                }
    
                $d=$this->input->post('HAMIL');
                if($d!='Tidak'){
                    $d=$this->input->post('HAMIL2');
                }


                $params4 = array(
                    $this->input->post('FS_KD_REG'),
                    '',
                    '',
                    '',
                    '',
                    $this->input->post('FS_STATUS_PSIK'),
                    '',
                    $this->input->post('FS_HUB_KELUARGA'),
                    '',
                    $this->input->post('FS_AGAMA'),
                    $this->input->post('FS_NILAI_KHUSUS'),
                   '',
                    $this->input->post('FS_PEMERIKSAAN_FISIK'),
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    $this->input->post('FS_ANAMNESA'),
                    $this->input->post('MENIKAH'),
                    $this->input->post('SUKU'),
                    $this->input->post('JOB'),
                    $this->input->post('MENTAL'),
                    $this->input->post('KESADARAN'),
                    $this->input->post('GCS'),
                    $d,
                    $this->input->post('IRAMA_NAFAS'),
                    $this->input->post('BATUK'),
                    $this->input->post('POLA_NAFAS'),
                    $this->input->post('SUARA_NAFAS'),
                    $a,
                    $this->input->post('NYERI_DADA'),
                    $this->input->post('AKRAL'),
                    $b,
                    $this->input->post('CYANOSIS'),
                    $this->input->post('CRT'),
                    $this->input->post('TURGOR'),
                   
                    $this->input->post('REFLEK_CAHAYA'),
                    $this->input->post('PUPIL'),
                    $this->input->post('LUMPUH'),
                    $this->input->post('PUSING'),
                    $this->input->post('BAK'),
                    $this->input->post('BAK_TEKAN'),
                    $this->input->post('URINE'),
                    $this->input->post('BAB'),
                    $this->input->post('ABDOMEN'),
                    $this->input->post('BAB_TEKAN'),
                    $this->input->post('JEJAS_ABDOMEN'),
                    $this->input->post('SENDI'),
                    $this->input->post('DISLOK'),
                    $c,
                    $this->input->post('LUKA'),
                    $this->input->post('KURSI_RODA'),
                    $this->input->post('ALVI'),
                    $this->input->post('RIWAYAT_DEKUBITUS'),
                    $this->input->post('USIA65'),
                    $this->input->post('ANAK_SESUAI_UMUR'),
                    $this->com_user['user_id'],
                    date('Y-m-d H:i:s')
                );
                $this->m_igd->insert_ases14($params4);

                $params5 = array(
                    $this->input->post('FS_ALERGI'),
                    $this->input->post('FS_REAK_ALERGI'),
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU'),
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU2'),
                    $this->input->post('FS_MR')
                );
                $this->m_ass_awal->insert_alergi($params5);
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
                $this->m_ass_awal->insert_nutrisi($params6);
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
                $this->m_ass_awal->insert_fungsional($params7);
// insert tujuan
                $masalah_kep = $this->input->post('tujuan');
                if (!empty($masalah_kep)) {
                    foreach ($masalah_kep as $value) {
                        $this->m_ass_awal->insert_masalah_kep(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
                $keb_spirit = $this->input->post('keb_spirit');
                if (!empty($keb_spirit)) {
                    foreach ($keb_spirit as $value) {
                        $this->m_ass_awal->insert_keb_spirit(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
                $edukasi = $this->input->post('edukasi');
                if (!empty($edukasi)) {
                    foreach ($edukasi as $value) {
                        $this->m_ass_awal->insert_edukasi(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
                $planning = $this->input->post('planning');
                if (!empty($planning)) {
                    foreach ($planning as $value) {
                        $this->m_ass_awal->insert_planning(array($this->input->post('FS_KD_REG'), $value));
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
        redirect("inap/ass_awal/selesai/".$this->input->post('FS_KD_REG'));
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
            if ($this->m_ass_awal->update($params)) {
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
                $this->m_ass_awal->update_vs($params1);
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
                $this->m_ass_awal->update_nyeri($params2);

                $params3 = array(
                    $this->input->post('FS_SCORE'),
                    $this->com_user['user_id'],
                    date('Y-m-d'),
                    $this->input->post('FS_KD_REG')
                );
                $this->m_ass_awal->update_jatuh($params3);


                $a=$this->input->post('BANTU_NAFAS');
                if($a!='Tidak'){
                    $a=$this->input->post('BANTU_NAFAS2');
                }
    
                $b=$this->input->post('PERDARAHAN');
                if($b!='Tidak'){
                    $b=$this->input->post('PERDARAHAN2'); 
                }
    
                $c=$this->input->post('FRAKTUR');
                if($c!='Tidak'){
                    $c=$this->input->post('FRAKTUR2');
                }
    
                $d=$this->input->post('HAMIL');
                if($d!='Tidak'){
                    $d=$this->input->post('HAMIL2');
                }


                $params4 = array(
                    '',
                    '',
                    '',
                    '',
                    $this->input->post('FS_STATUS_PSIK'),
                    $this->input->post('FS_STATUS_PSIK2'),
                    $this->input->post('FS_HUB_KELUARGA'),
                    '',
                    $this->input->post('FS_AGAMA'),
                    $this->input->post('FS_NILAI_KHUSUS'),
                    $this->input->post('FS_NILAI_KHUSUS2'),
                    $this->input->post('FS_PEMERIKSAAN_FISIK'),
                    '',
                    '',
                    '',
                    $this->input->post('FS_RIW_IMUNISASI'),
                    $this->input->post('FS_RIW_IMUNISASI_KET'),
                    $this->input->post('FS_RIW_TUMBUH'),
                    $this->input->post('FS_RIW_TUMBUH_KET'),
                    '',
                     $this->input->post('FS_ANAMNESA'),
                    $this->input->post('MENIKAH'),
                    $this->input->post('SUKU'),
                    $this->input->post('JOB'),
                    $this->input->post('MENTAL'),
                    $this->input->post('KESADARAN'),
                    $this->input->post('GCS'),
                    $d,
                    $this->input->post('IRAMA_NAFAS'),
                    $this->input->post('BATUK'),
                    $this->input->post('POLA_NAFAS'),
                    $this->input->post('SUARA_NAFAS'),
                    $a,
                    $this->input->post('NYERI_DADA'),
                    $this->input->post('AKRAL'),
                    $b,
                    $this->input->post('CYANOSIS'),
                    $this->input->post('CRT'),
                    $this->input->post('TURGOR'),
                   
                    $this->input->post('REFLEK_CAHAYA'),
                    $this->input->post('PUPIL'),
                    $this->input->post('LUMPUH'),
                    $this->input->post('PUSING'),
                    $this->input->post('BAK'),
                    $this->input->post('BAK_TEKAN'),
                    $this->input->post('URINE'),
                    $this->input->post('BAB'),
                    $this->input->post('ABDOMEN'),
                    $this->input->post('BAB_TEKAN'),
                    $this->input->post('JEJAS_ABDOMEN'),
                    $this->input->post('SENDI'),
                    $this->input->post('DISLOK'),
                    $c,
                    $this->input->post('LUKA'),
                    $this->input->post('KURSI_RODA'),
                    $this->input->post('ALVI'),
                    $this->input->post('RIWAYAT_DEKUBITUS'),
                    $this->input->post('USIA65'),
                    $this->input->post('ANAK_SESUAI_UMUR'),
                    $this->com_user['user_id'],
                    date('Y-m-d'),
                    $this->input->post('FS_KD_REG')
                );
                $this->m_igd->update_ases14($params4);

              
                $params5 = array(
                    $this->input->post('FS_ALERGI'),
                    $this->input->post('FS_REAK_ALERGI'),
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU'),
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU2'),
                    $this->input->post('FS_MR')
                );
                $this->m_ass_awal->insert_alergi($params5);
 
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
                $this->m_ass_awal->update_nutrisi($params6);
                
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
                $this->m_ass_awal->update_fungsional($params7);


                $riwayat = array (
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FS_SUHU_0'),
                    $this->input->post('FS_NADI_0'),
                    $this->input->post('FS_R_0'),
                    $this->input->post('FS_TD_0'),
                    $this->input->post('FS_TB_0'),
                    $this->input->post('FS_BB_0'),
                     $this->input->post('FS_NYERIP_0'),
                    $this->input->post('FS_NYERIQ_0'),
                    $this->input->post('FS_NYERIR_0'),
                    $this->input->post('FS_NYERIS_0'),
                    $this->input->post('FS_NYERIT_0'),
                    $this->input->post('FS_NYERI_0'),
                     $this->input->post('FS_SCORE_0'),
                      $this->input->post('FS_STATUS_PSIK_0'),
                    $this->input->post('FS_STATUS_PSIK2_0'),
                    $this->input->post('FS_HUB_KELUARGA_0'),
                    $this->input->post('FS_AGAMA_0'),
                    $this->input->post('FS_NILAI_KHUSUS_0'),
                    $this->input->post('FS_NILAI_KHUSUS2_0'),
                    $this->input->post('FS_PEMERIKSAAN_FISIK_0'),
                    $this->input->post('FS_ANAMNESA_0'),
                    $this->input->post('MENIKAH_0'),
                    $this->input->post('SUKU_0'),
                    $this->input->post('JOB_0'),
                    $this->input->post('MENTAL_0'),
                    $this->input->post('KESADARAN_0'),
                    $this->input->post('GCS_0'),
                    $this->input->post('HAMIL_0'),
                    $this->input->post('IRAMA_NAFAS_0'),
                    $this->input->post('BATUK_0'),
                    $this->input->post('POLA_NAFAS_0'),
                    $this->input->post('SUARA_NAFAS_0'),
                    $this->input->post('BANTU_NAFAS_0'),
                    $this->input->post('NYERI_DADA_0'),
                    $this->input->post('AKRAL_0'),
                    $this->input->post('PERDARAHAN_0'), 
                    $this->input->post('CYANOSIS_0'),
                    $this->input->post('CRT_0'),
                    $this->input->post('TURGOR_0'),
                    $this->input->post('REFLEK_CAHAYA_0'),
                    $this->input->post('PUPIL_0'),
                    $this->input->post('LUMPUH_0'),
                    $this->input->post('PUSING_0'),
                    $this->input->post('BAK_0'),
                    $this->input->post('BAK_TEKAN_0'),
                    $this->input->post('URINE_0'),
                    $this->input->post('BAB_0'),
                    $this->input->post('ABDOMEN_0'),
                    $this->input->post('BAB_TEKAN_0'),
                    $this->input->post('JEJAS_ABDOMEN_0'),
                    $this->input->post('SENDI_0'),
                    $this->input->post('DISLOK_0'),
                    $this->input->post('FRAKTUR_0'),
                    $this->input->post('LUKA_0'),
                    $this->input->post('KURSI_RODA_0'),
                    $this->input->post('ALVI_0'),
                    $this->input->post('RIWAYAT_DEKUBITUS_0'),
                    $this->input->post('USIA65_0'),
                    $this->input->post('ANAK_SESUAI_UMUR_0'),
                    $this->input->post('FS_ALERGI_0'),
                    $this->input->post('FS_REAK_ALERGI_0'),
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU_0'),
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU2_0'),
                    $this->input->post('FS_NUTRISI1_0'),
                    $this->input->post('FS_NUTRISI2_0'),
                    $this->input->post('FS_FUNGSIONAL1_0'),
                    $this->input->post('FS_FUNGSIONAL2_0'),
                    $this->input->post('FS_FUNGSIONAL3_0'),
                    $this->input->post('FS_FUNGSIONAL4_0'),
                    $this->input->post('FS_FUNGSIONAL5_0'),
                    $this->input->post('FS_FUNGSIONAL6_0'),
                    $this->input->post('FS_FUNGSIONAL7_0'),
                    $this->input->post('FS_FUNGSIONAL8_0'),
                    $this->input->post('FS_FUNGSIONAL9_0'),
                    $this->input->post('FS_FUNGSIONAL10_0'),
                    $this->com_user['user_name'],
                    date('Y-m-d H:i:s'),
                );
                $this->m_rawat_jalan->insert_riwayat_ases_perawat($riwayat);
// insert tujuan
                $masalah_kep = $this->input->post('tujuan');
                $this->m_ass_awal->delete_masalah_kep($this->input->post('FS_KD_REG'));
                if (!empty($masalah_kep)) {
                    foreach ($masalah_kep as $value) {
                        $this->m_ass_awal->insert_masalah_kep(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
                $keb_spirit = $this->input->post('keb_spirit');
                 $this->m_ass_awal->delete_keb_spirit($this->input->post('FS_KD_REG'));
                if (!empty($keb_spirit)) {
                    foreach ($keb_spirit as $value) {
                        $this->m_ass_awal->insert_keb_spirit(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
                $edukasi = $this->input->post('edukasi');
                 $this->m_ass_awal->delete_edukasi($this->input->post('FS_KD_REG'));
                if (!empty($edukasi)) {
                    foreach ($edukasi as $value) {
                        $this->m_ass_awal->insert_edukasi(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
                $planning = $this->input->post('planning');
                 $this->m_ass_awal->delete_planning($this->input->post('FS_KD_REG'));
                if (!empty($planning)) {
                    foreach ($planning as $value) {
                        $this->m_ass_awal->insert_planning(array($this->input->post('FS_KD_REG'), $value));
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
        redirect("inap/ass_awal/selesai/".$this->input->post('FS_KD_REG'));
    }

     public function selesai($FS_RG = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/ass_awal/selesai.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_ass_awal->get_pasien_by_rg(array($FS_RG)));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }
    
    public function cetak_ass_awal($FS_KD_REG = "") {
        $this->_set_page_rule("R");

        $this->load->library('html2pdf');
        $data['rs_pasien'] = $this->m_ass_awal->get_pasien_by_rg(array($FS_KD_REG));
        $data['rs_ass_awal'] = $this->m_ass_awal->get_ass_awal_by_rg(array($FS_KD_REG));
        $data['rs_diet'] = $this->m_ass_awal->get_diet_by_rg(array($FS_KD_REG));
        $data['rs_indikasi'] = $this->m_ass_awal->get_indikasi_dirawat_by_rg(array($FS_KD_REG));
        $data['rs_diag'] = $this->m_ass_awal->get_diag_by_rg(array($FS_KD_REG));
        $data['rs_tind'] = $this->m_ass_awal->get_tind_by_rg(array($FS_KD_REG));
        $data['rs_terapi'] = $this->m_ass_awal->get_terapi_by_rg(array($FS_KD_REG));
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
        $users = $this->m_ass_awal->list_planning();
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

    public function list_rencana_kep() { //rencana keperawatan
        $instansi = $this->m_ass_awal->list_rencana_kep();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['FS_NM_REN_KEP'],
                'value' => $value['FS_KD_TRS']
            );
            $i++;
        }
        echo json_encode($data);
    }

    public function list_masalah_kep() { // masalah kep
        $instansi = $this->m_rawat_jalan->list_masalah_kep();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['FS_NM_DIAGNOSA'],
                'value' => $value['FS_KD_DAFTAR_DIAGNOSA']
            );
            $i++;
        }
        echo json_encode($data);
    } 

    // list_users
    public function list_edukasi() {
        $instansi = $this->m_ass_awal->list_edukasi();
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
        $instansi = $this->m_ass_awal->list_spiritual();
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
