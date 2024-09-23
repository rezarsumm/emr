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
        $this->load->model('m_igd');

        $this->load->model('m_rawat_jalan');
        $this->load->model('m_rawat_jalan_nurse');
        $this->smarty->assign('m_rawat_jalan', $this->m_rawat_jalan);
        $this->load->library('tnotification');
    }

// list surat masuk
    public function index() {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "nurse/rawat_jalan/index.html"); 
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");

        $now = date('Y-m-d');
        $session_khusus=$this->com_user['user_id'];
        $this->smarty->assign("session", $session_khusus);
        $this->smarty->assign("date", $now);
        
      
        $search = $this->tsession->userdata('nurse_rawat_jalan');
        if (!empty($search)) {
            $this->smarty->assign("search", $search);
        }
        if (empty($search['FS_KD_PEG'])) {
            $search['FS_KD_PEG'] = 'S000'; 
            $this->smarty->assign("search", $search);
        }
        if (empty($search['FD_TGL_MASUK'])) {
            $search['FD_TGL_MASUK'] = date('Y-m-d');
            $this->smarty->assign("search", $search);
        }
        $this->smarty->assign("FS_KD_PEG", $search['FS_KD_PEG']);
        $this->smarty->assign("FD_TGL_MASUK", $search['FD_TGL_MASUK']);
        // search parameters
        $FD_TGL_MASUK = empty($search['FD_TGL_MASUK']) ? : $search['FD_TGL_MASUK'];
        $FS_KD_PEG = empty($search['FS_KD_PEG']) ? : $search['FS_KD_PEG'];
       
// get search parameter
        $this->smarty->assign("no", '1');
        $this->smarty->assign("rs_dokter", $this->m_rawat_jalan->get_dokter());
    $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_px_by_dokter_wait(array($FD_TGL_MASUK, $FS_KD_PEG,$FD_TGL_MASUK, $FS_KD_PEG)));
    // $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_px_by_dokter_wait2(array($FD_TGL_MASUK, $FD_TGL_MASUK, $FS_KD_PEG)));
// notification
// var_dump($this->m_rawat_jalan->get_px_by_dokter_wait(array($FD_TGL_MASUK, $FS_KD_PEG,$FD_TGL_MASUK, $FS_KD_PEG)));
// die;
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display(); 
    }

    // searching
    public function proses_cari() {
        //set page rules
        $this->_set_page_rule("R");
        //data
        if ($this->input->post('save') == "Reset") {
            $this->tsession->unset_userdata("nurse_rawat_jalan");
        } else {
            $params = array(
                "FD_TGL_MASUK" => $this->input->post("FD_TGL_MASUK"),
                "FS_KD_PEG" => $this->input->post("FS_KD_PEG")
            );
            $this->tsession->set_userdata("nurse_rawat_jalan", $params);
        }
        // redirect
        redirect("nurse/rawat_jalan");
    }

  public function history($FS_MR = "",$FS_KD_PEG="") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "nurse/rawat_jalan/history.html");
        $this->smarty->load_javascript('resource/js/jquery.datatables/jquery.dataTables.js');
        $this->smarty->load_javascript('resource/js/jquery.datatables/dataTables.fixedHeader.js');
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->load_style("jquery.ui/datatables/jquery.dataTables.css");
// load javascript
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-1.9.2.custom.min.js');
// get search parameter
        $now = date('Y-m-d');
        $now2 = date('Y-m-d 00:00:00.000');
        $medis = $FS_KD_PEG;
        $this->smarty->assign("no", '1');
        $this->smarty->assign("FS_KD_MEDIS", $FS_KD_PEG);
        $this->smarty->assign("now", $now2);
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rm(array($FS_MR)));
        $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_px_history_nurse3(array($FS_MR)));
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }
    
    public function add($FS_KD_REG = "", $FS_KD_MEDIS = "",$FS_JNS_ASESMEN="") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "nurse/rawat_jalan/add.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $this->smarty->assign("icd", $this->m_igd->get_icd());  
        $this->smarty->assign("result", $this->m_rawat_jalan_nurse->get_px_by_dokter_by_rg2(array($FS_KD_REG, $FS_KD_MEDIS)));
        $this->smarty->assign("FS_KD_MEDIS", $FS_KD_MEDIS);
        $this->smarty->assign("FS_JNS_ASESMEN", $FS_JNS_ASESMEN);
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
        $this->tnotification->set_rules('FS_ANAMNESA', 'Anamnesa', 'trim|required');
        $this->tnotification->set_rules('FS_EDUKASI', 'Pemeriksaan fisik', 'required');
        $this->tnotification->set_rules('FS_ALERGI', 'Alergi', 'trim|required');
        $this->tnotification->set_rules('FS_REAK_ALERGI', 'Reaksi Alergi', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_REG'),
                '1',
                '1',
                $this->input->post('FS_JNS_ASESMEN'),
                $this->com_user['user_id'], 
                date('Y-m-d')
            );
            // insert
            if ($this->m_rawat_jalan->insert($params)) {
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
                $this->m_rawat_jalan->insert_vs($params1);
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
                $this->m_rawat_jalan->insert_nyeri($params2);
                $params3 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FS_CARA_BERJALAN1'),
                    $this->input->post('FS_CARA_BERJALAN2'),
                    $this->input->post('FS_CARA_DUDUK'),
                    $this->input->post('intervensi1'),
                    $this->input->post('intervensi2'),
                    $this->com_user['user_id'],
                    date('Y-m-d')
                ); 
                $this->m_rawat_jalan->insert_jatuh($params3);
                $params4 = array(
                    $this->input->post('FS_KD_REG'),
                    '',
                    '',
                    '',
                    '',
                    $this->input->post('FS_STATUS_PSIK'),
                    $this->input->post('FS_STATUS_PSIK2'),
                    $this->input->post('FS_HUB_KELUARGA'),
                    $this->input->post('FS_ST_FUNGSIONAL'),
                    $this->input->post('FS_AGAMA'),
                    $this->input->post('FS_NILAI_KHUSUS'),
                    $this->input->post('FS_NILAI_KHUSUS2'),
                    $this->input->post('FS_ANAMNESA'),
                    $this->input->post('FS_PENGELIHATAN'),
                    $this->input->post('FS_PENCIUMAN'),
                    $this->input->post('FS_PENDENGARAN'),
                    $this->input->post('FS_RIW_IMUNISASI'),
                    $this->input->post('FS_RIW_IMUNISASI_KET'),
                    $this->input->post('FS_RIW_TUMBUH'),
                    $this->input->post('FS_RIW_TUMBUH_KET'),
                    '',
                    $this->input->post('FS_EDUKASI'),
                    $this->input->post('FS_SKDP_FASKES'),
                    $this->com_user['user_id'],
                    date('Y-m-d')
                );
                $this->m_rawat_jalan->insert_ases($params4);
                
                $params5 = array(
                    $this->input->post('FS_ALERGI'),
                    $this->input->post('FS_REAK_ALERGI'),
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU'),
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU2'),
                    $this->input->post('FS_MR')
                );
                $this->m_rawat_jalan_nurse->insert_alergi($params5);
                
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
                $this->m_rawat_jalan->insert_nutrisi($params6);


                if($this->input->post('kode_icd_x')!=''){
                    $FS_KD_REG=$this->input->post('FS_KD_REG');
                    $pasien= $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG)); 
                   
                    if(strlen($pasien['NO_IDENTITAS'])==16){
                        $nik=$pasien['NO_IDENTITAS'];
                    }
                    else{
                        $nik=$pasien['HP2'];
                    }
                   
                    $prov="18";

                
                    $kota=ucfirst($pasien['KOTA']);
                    if($kota=='Lampung Barat'){
                        $kodekota="1801";
                    }
                    else  if($kota=='Tanggamus'){
                        $kodekota="1802";
                    }
                    else  if($kota=='Lampung Selatan'){
                        $kodekota="1803";
                    }
                    else  if($kota=='Lampung Timur'){
                        $kodekota="1804";
                    }
                    else  if($kota=='Lampung Tengah'){
                        $kodekota="1805";
                    }
                    else  if($kota=='Lampung Utara'){
                        $kodekota="1806";
                    }
                    else  if($kota=='Way Kanan'){
                        $kodekota="1807";
                    }
                    else  if($kota=='Tulangbawang'  || $kota=='Tulang Bawang' || $kota=='Tubaba'){
                        $kodekota="1808";
                    }
                    else  if($kota=='Pesawaran'){
                        $kodekota="1809";
                    }
                    else  if($kota=='Pringsewu'){
                        $kodekota="1810";
                    }
                    else  if($kota=='Mesuji'){
                        $kodekota="1811";
                    }
                    else  if($kota=='Tulangbawang Barat' || $kota=='Tulang Bawang Barat' || $kota=='Tubabar'){
                        $kodekota="1812";
                    }
                    else  if($kota=='Pesisir Barat'){
                        $kodekota="1813";
                    }
                    else  if($kota=='Bandar Lampung' || $kota=='Bandarlampung' || $kota=='Balam'){
                        $kodekota="1871";
                    }
                    else  if($kota=='Metro'){
                        $kodekota="1872";
                    }
                    else{
                        $prov="";
                        $kodekota="";
                    }
                
                    $tglmulai=date('Y-m-d');
                    $tglmulai=substr($tglmulai,0,4).substr($tglmulai,5,2).substr($tglmulai,8,2);
                
                    $tgllahir=$pasien['TGL_LAHIR'];
                    $tgllahir=substr($tgllahir,0,4).substr($tgllahir,5,2).substr($tgllahir,8,2);
                
                            
                    $icd=$this->input->post('kode_icd_x');
                    if($icd=='A15' || $icd=='A15.0' || $icd=='A15.1' || $icd=='A15.7' || $icd=='A16'){
                        $lokasi='1';
                        $tipe='1';
                    }
                    else  if($icd=='A15.2' || $icd=='A15.3' || $icd=='A16.0' || $icd=='A16.1' || $icd=='A16.2' || $icd=='A16.7'){
                        $lokasi='1';
                        $tipe='2';
                    }
                    else  if($icd=='A15.4' || $icd=='A15.5' || $icd=='A15.6' || $icd=='A15.8' || $icd=='A15.9' ){
                        $lokasi='2';
                        $tipe='1';
                    }
                    else {
                        $lokasi='2';
                        $tipe='2';
                    }
                   

                        $cek_tb=$this->m_igd->cek_tb(array($FS_KD_REG)); //CEK TB DI SIMRS

                        if ($cek_tb == '1') { // SUDAH ADA DI DATABASE SIMRS

                            $cek_id_tb=$this->m_igd->cek_id_tb(array($FS_KD_REG)); //CEK ID TB NYA

                            $id_tb_03=$cek_id_tb['id_tb_o3'];

                       
                                
                            $params = array(
                                '',
                                $pasien['NAMA_PASIEN'],
                                $nik,
                                $pasien['JENIS_KELAMIN'],
                                $pasien['ALAMAT'],
                                '18',
                                '1872',
                                $prov,
                                $kodekota,
                                '1872042',
                                $this->input->post('kode_icd_x'),
                                $tipe,
                                $lokasi,
                                '',
                                $tglmulai,
                                '',
                                'Sedang dilakukan',
                                '',
                                '',
                                '',
                                '',
                                '',
                                '',
                                '',
                                '',
                                $tgllahir,
                                'negatif',
                                $FS_KD_REG,
                                $pasien['NO_MR'],
                                $this->com_user['user_name'],
                                date('Y-m-d H:i'),
                                $FS_KD_REG,
                            );

                            $this->m_igd->update_tb($params); //UPDATE TB DI DATABASE
                        }

                        else{
                           $id_tb_03='';
                            

                            $params = array(
                                $id_tb_03,
                                $pasien['NAMA_PASIEN'],
                                $nik,
                                $pasien['JENIS_KELAMIN'],
                                $pasien['ALAMAT'],
                                '18',
                                '1872',
                                $prov,
                                $kodekota,
                                '1872042',
                                $this->input->post('kode_icd_x'),
                                $tipe,
                                $lokasi,
                                '',
                                $tglmulai,
                                '',
                                'Sedang dilakukan',
                                '',
                                '',
                                '',
                                '',
                                '',
                                '',
                                '',
                                '',
                                $tgllahir,
                                'negatif',
                                $FS_KD_REG,
                                $pasien['NO_MR'],
                                $this->com_user['user_name'],
                                date('Y-m-d H:i')
                            );

                            $this->m_igd->insert_tb($params);//INSERT KE SIMRS
                        
                        }

 
                }

// insert tujuan
                $masalah_kep = $this->input->post('tujuan');
                if (!empty($masalah_kep)) {
                    foreach ($masalah_kep as $value) {
                        $this->m_rawat_jalan->insert_masalah_kep(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
                $rencana_kep = $this->input->post('tembusan');
                if (!empty($rencana_kep)) {
                    foreach ($rencana_kep as $value) {
                        $this->m_rawat_jalan->insert_rencana_kep(array($this->input->post('FS_KD_REG'), $value));
                    }
                }

                // notification
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            } else {
                // default error
                $this->tnotification->sent_notification("error", "Detail gagal disimpan");
                redirect("nurse/rawat_jalan/history/".$this->input->post('FS_MR')."/".$this->input->post('FS_KD_MEDIS')."");
            }
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
            redirect("nurse/rawat_jalan/history/".$this->input->post('FS_MR')."/".$this->input->post('FS_KD_MEDIS')."");
        }
        // default redirect
        redirect("nurse/rawat_jalan");
    }

    public function edit($FS_KD_REG = "") {
// set page rules
        $this->_set_page_rule("U");
// set template content
        $this->smarty->assign("template_content", "nurse/rawat_jalan/edit.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $this->smarty->assign("result", $this->m_rawat_jalan_nurse->get_px_by_dokter_by_rg2(array($FS_KD_REG)));
        $this->smarty->assign("vs", $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("nyeri", $this->m_rawat_jalan->get_data_nyeri_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("jatuh", $this->m_rawat_jalan->get_data_jatuh_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("ases2", $this->m_rawat_jalan->get_data_ases2_by_rg(array($FS_KD_REG)));
        
        $this->smarty->assign("icd", $this->m_igd->get_icd());  

        $this->smarty->assign("nutrisi", $this->m_rawat_jalan->get_data_nutrisi_by_rg(array($FS_KD_REG)));
        // get instansi tujuan
        $tujuan = $this->m_rawat_jalan->list_masalah_kep_by_rg($FS_KD_REG);
        $tujuan_str = "";
        foreach ($tujuan as $key => $value) {
            $tujuan_str .= "'" . $value['FS_KD_MASALAH_KEP'] . "',";
        }
        $this->smarty->assign('rs_tujuan', $tujuan_str);

        $tembusan = $this->m_rawat_jalan->list_rencana_kep_by_rg($FS_KD_REG);
        $tembusan_str = "";
        foreach ($tembusan as $key => $value) {
            $tembusan_str .= "'" . $value['FS_KD_REN_KEP'] . "',";
        }
        $this->smarty->assign('rs_tembusan', $tembusan_str);
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }
    public function edit_sementara($FS_KD_REG = "") {
// set page rules
        $this->_set_page_rule("U");

        // var_dump('ok');
        // die;
// set template content
        $this->smarty->assign("template_content", "nurse/rawat_jalan/edit_sementara.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $this->smarty->assign("result", $this->m_rawat_jalan_nurse->get_px_by_dokter_by_rg2(array($FS_KD_REG)));
        $this->smarty->assign("vs", $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("nyeri", $this->m_rawat_jalan->get_data_nyeri_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("jatuh", $this->m_rawat_jalan->get_data_jatuh_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("ases2", $this->m_rawat_jalan->get_data_ases2_by_rg(array($FS_KD_REG)));
        
        $this->smarty->assign("icd", $this->m_igd->get_icd());  

        $this->smarty->assign("nutrisi", $this->m_rawat_jalan->get_data_nutrisi_by_rg(array($FS_KD_REG)));
        // get instansi tujuan
        $tujuan = $this->m_rawat_jalan->list_masalah_kep_by_rg($FS_KD_REG);
        $tujuan_str = "";
        foreach ($tujuan as $key => $value) {
            $tujuan_str .= "'" . $value['FS_KD_MASALAH_KEP'] . "',";
        }
        $this->smarty->assign('rs_tujuan', $tujuan_str);

        $tembusan = $this->m_rawat_jalan->list_rencana_kep_by_rg($FS_KD_REG);
        $tembusan_str = "";
        foreach ($tembusan as $key => $value) {
            $tembusan_str .= "'" . $value['FS_KD_REN_KEP'] . "',";
        }
        $this->smarty->assign('rs_tembusan', $tembusan_str);
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }

     public function edit_process() {
        // set page rules
        $this->_set_page_rule("U");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
        $this->tnotification->set_rules('FS_ANAMNESA', 'Anamnesa', 'trim|required');
        $this->tnotification->set_rules('FS_ALERGI', 'Alergi', 'trim|required');
        $this->tnotification->set_rules('FS_REAK_ALERGI', 'Reaksi Alergi', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                '1',
                $this->com_user['user_id'],
                date('Y-m-d'),
                $this->input->post('FS_KD_REG')
            );
            // insert
            if ($this->m_rawat_jalan->update($params)) {
                $params1 = array(
                    $this->input->post('FS_SUHU'),
                    $this->input->post('FS_NADI'),
                    $this->input->post('FS_R'),
                    $this->input->post('FS_TD'),
                    $this->input->post('FS_TB'),
                    $this->input->post('FS_BB'),
                    $this->com_user['user_id'],
                    date('Y-m-d'),
                    $this->input->post('FS_KD_REG')
                );
                $this->m_rawat_jalan->update_vs($params1);
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
                $this->m_rawat_jalan->update_nyeri($params2);
                $params3 = array(
                    $this->input->post('FS_CARA_BERJALAN1'),
                    $this->input->post('FS_CARA_BERJALAN2'),
                    $this->input->post('FS_CARA_DUDUK'),
                    $this->com_user['user_id'],
                    date('Y-m-d'),
                    $this->input->post('FS_KD_REG')
                );
                $this->m_rawat_jalan->update_jatuh($params3);
                //$this->m_rawat_jalan->delete_ases($params4);
                $params4 = array(
                    '',
                    '',
                    '',
                    '',
                    $this->input->post('FS_STATUS_PSIK'),
                    $this->input->post('FS_STATUS_PSIK2'),
                    $this->input->post('FS_HUB_KELUARGA'),
                    $this->input->post('FS_ST_FUNGSIONAL'),
                    $this->input->post('FS_AGAMA'),
                    $this->input->post('FS_NILAI_KHUSUS'),
                    $this->input->post('FS_NILAI_KHUSUS2'),
                    $this->input->post('FS_ANAMNESA'),
                    $this->input->post('FS_PENGELIHATAN'),
                    $this->input->post('FS_PENCIUMAN'),
                    $this->input->post('FS_PENDENGARAN'),
                    $this->input->post('FS_RIW_IMUNISASI'),
                    $this->input->post('FS_RIW_IMUNISASI_KET'),
                    $this->input->post('FS_RIW_TUMBUH'),
                    $this->input->post('FS_RIW_TUMBUH_KET'),
                    '',
                    $this->input->post('FS_EDUKASI'),
                    $this->input->post('FS_SKDP_FASKES'),
                    $this->com_user['user_id'],
                    date('Y-m-d'),
                    $this->input->post('FS_KD_REG')
                );
                $this->m_rawat_jalan->update_ases($params4);

                $params5 = array(
                    $this->input->post('FS_ALERGI'),
                    $this->input->post('FS_REAK_ALERGI'),
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU'),
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU2'),
                    $this->input->post('FS_MR')
                );
                $this->m_rawat_jalan_nurse->insert_alergi($params5);
                
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
                $this->m_rawat_jalan->update_nutrisi($params6);


                $riwayat = array(
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
                    $this->input->post('FS_CARA_BERJALAN1_0'),
                    $this->input->post('FS_CARA_BERJALAN2_0'),
                    $this->input->post('FS_CARA_DUDUK_0'),
                    $this->input->post('FS_STATUS_PSIK_0'),
                    $this->input->post('FS_STATUS_PSIK2_0'),
                    $this->input->post('FS_HUB_KELUARGA_0'),
                    $this->input->post('FS_ST_FUNGSIONAL_0'),
                    $this->input->post('FS_AGAMA_0'),
                    $this->input->post('FS_NILAI_KHUSUS_0'), 
                    $this->input->post('FS_ANAMNESA_0'),
                    $this->input->post('FS_PENGELIHATAN_0'),
                    $this->input->post('FS_PENCIUMAN_0'),
                    $this->input->post('FS_PENDENGARAN_0'),
                    $this->input->post('FS_EDUKASI_0'),
                    $this->input->post('FS_ALERGI_0'),
                    $this->input->post('FS_REAK_ALERGI_0'),
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU_0'),
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU2_0'),
                    $this->input->post('FS_NUTRISI1_0'),
                    $this->input->post('FS_NUTRISI2_0'),
                    $this->input->post('FS_NUTRISI_ANAK1_0'),
                    $this->input->post('FS_NUTRISI_ANAK2_0'),
                    $this->input->post('FS_NUTRISI_ANAK3_0'),
                    $this->input->post('FS_NUTRISI_ANAK4_0'),
                    $this->com_user['user_name'],
              date('Y-m-d H:i:s'),
                );

                $this->m_rawat_jalan->insert_riwayat_perawat($riwayat);



                if($this->input->post('kode_icd_x')!=''){
                    $FS_KD_REG=$this->input->post('FS_KD_REG');
                    $pasien= $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG)); 
                   
                    if(strlen($pasien['NO_IDENTITAS'])==16){
                        $nik=$pasien['NO_IDENTITAS'];
                    }
                    else{
                        $nik=$pasien['HP2'];
                    }
                   
                    $prov="18";

                
                    $kota=ucfirst($pasien['KOTA']);
                    if($kota=='Lampung Barat'){
                        $kodekota="1801";
                    }
                    else  if($kota=='Tanggamus'){
                        $kodekota="1802";
                    }
                    else  if($kota=='Lampung Selatan'){
                        $kodekota="1803";
                    }
                    else  if($kota=='Lampung Timur'){
                        $kodekota="1804";
                    }
                    else  if($kota=='Lampung Tengah'){
                        $kodekota="1805";
                    }
                    else  if($kota=='Lampung Utara'){
                        $kodekota="1806";
                    }
                    else  if($kota=='Way Kanan'){
                        $kodekota="1807";
                    }
                    else  if($kota=='Tulangbawang'  || $kota=='Tulang Bawang' || $kota=='Tubaba'){
                        $kodekota="1808";
                    }
                    else  if($kota=='Pesawaran'){
                        $kodekota="1809";
                    }
                    else  if($kota=='Pringsewu'){
                        $kodekota="1810";
                    }
                    else  if($kota=='Mesuji'){
                        $kodekota="1811";
                    }
                    else  if($kota=='Tulangbawang Barat' || $kota=='Tulang Bawang Barat' || $kota=='Tubabar'){
                        $kodekota="1812";
                    }
                    else  if($kota=='Pesisir Barat'){
                        $kodekota="1813";
                    }
                    else  if($kota=='Bandar Lampung' || $kota=='Bandarlampung' || $kota=='Balam'){
                        $kodekota="1871";
                    }
                    else  if($kota=='Metro'){
                        $kodekota="1872";
                    }
                    else{
                        $prov="";
                        $kodekota="";
                    }
                
                    $tglmulai=date('Y-m-d');
                    $tglmulai=substr($tglmulai,0,4).substr($tglmulai,5,2).substr($tglmulai,8,2);
                
                    $tgllahir=$pasien['TGL_LAHIR'];
                    $tgllahir=substr($tgllahir,0,4).substr($tgllahir,5,2).substr($tgllahir,8,2);
                
                            
                    $icd=$this->input->post('kode_icd_x');
                    if($icd=='A15' || $icd=='A15.0' || $icd=='A15.1' || $icd=='A15.7' || $icd=='A16'){
                        $lokasi='1';
                        $tipe='1';
                    }
                    else  if($icd=='A15.2' || $icd=='A15.3' || $icd=='A16.0' || $icd=='A16.1' || $icd=='A16.2' || $icd=='A16.7'){
                        $lokasi='1';
                        $tipe='2';
                    }
                    else  if($icd=='A15.4' || $icd=='A15.5' || $icd=='A15.6' || $icd=='A15.8' || $icd=='A15.9' ){
                        $lokasi='2';
                        $tipe='1';
                    }
                    else {
                        $lokasi='2';
                        $tipe='2';
                    }
                   

                        $cek_tb=$this->m_igd->cek_tb(array($FS_KD_REG)); //CEK TB DI SIMRS

                        if ($cek_tb == '1') { // SUDAH ADA DI DATABASE SIMRS

                            $cek_id_tb=$this->m_igd->cek_id_tb(array($FS_KD_REG)); //CEK ID TB NYA

                            $id_tb_03=$cek_id_tb['id_tb_o3'];

                       
                                
                            $params = array(
                                '',
                                $pasien['NAMA_PASIEN'],
                                $nik,
                                $pasien['JENIS_KELAMIN'],
                                $pasien['ALAMAT'],
                                '18',
                                '1872',
                                $prov,
                                $kodekota,
                                '1872042',
                                $this->input->post('kode_icd_x'),
                                $tipe,
                                $lokasi,
                                '',
                                $tglmulai,
                                '',
                                'Sedang dilakukan',
                                '',
                                '',
                                '',
                                '',
                                '',
                                '',
                                '',
                                '',
                                $tgllahir,
                                'negatif',
                                $FS_KD_REG,
                                $pasien['NO_MR'],
                                $this->com_user['user_name'],
                                date('Y-m-d H:i'),
                                $FS_KD_REG,
                            );

                            $this->m_igd->update_tb($params); //UPDATE TB DI DATABASE
                        }

                        else{
                           $id_tb_03='';
                            

                            $params = array(
                                $id_tb_03,
                                $pasien['NAMA_PASIEN'],
                                $nik,
                                $pasien['JENIS_KELAMIN'],
                                $pasien['ALAMAT'],
                                '18',
                                '1872',
                                $prov,
                                $kodekota,
                                '1872042',
                                $this->input->post('kode_icd_x'),
                                $tipe,
                                $lokasi,
                                '',
                                $tglmulai,
                                '',
                                'Sedang dilakukan',
                                '',
                                '',
                                '',
                                '',
                                '',
                                '',
                                '',
                                '',
                                $tgllahir,
                                'negatif',
                                $FS_KD_REG,
                                $pasien['NO_MR'],
                                $this->com_user['user_name'],
                                date('Y-m-d H:i')
                            );

                            $this->m_igd->insert_tb($params);//INSERT KE SIMRS
                        
                        }

 
                }

                
                $masalah_kep = $this->input->post('tujuan');
                $this->m_rawat_jalan->delete_masalah_kep($this->input->post('FS_KD_REG'));
                if (!empty($masalah_kep)) {
                    foreach ($masalah_kep as $value) { 
                        $this->m_rawat_jalan->insert_masalah_kep(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
                $rencana_kep = $this->input->post('tembusan');
                $this->m_rawat_jalan->delete_rencana_kep($this->input->post('FS_KD_REG'));
                if (!empty($rencana_kep)) {
                    foreach ($rencana_kep as $value) {
                        $this->m_rawat_jalan->insert_rencana_kep(array($this->input->post('FS_KD_REG'), $value));
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
        redirect("nurse/rawat_jalan");
    }

    public function edit_process_sementara() {

        // var_dump($this->input->post('FS_KD_REG'));
        // die;
        // set page rules
        $this->_set_page_rule("U");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
       
        // process
        if ($this->tnotification->run() !== FALSE) {
   
                $params1 = array(
                    $this->input->post('FS_SUHU'),
                    $this->input->post('FS_NADI'),
                    $this->input->post('FS_R'),
                    $this->input->post('FS_TD'),
                    $this->input->post('FS_TB'),
                    $this->input->post('FS_BB'),
             
                    $this->input->post('FS_KD_REG')
                );
                $this->m_rawat_jalan->update_vs_sementara($params1);
                // insert 
               
                // notification
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
        
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("rm/berkas_harian");
    }

    public function rekap_excel() {
        // load excel
        $this->load->library('phpexcel');
        // create excell
        $filepath = "resource/doc/excel/rekap_resume_rawat_jalan.xlsx";
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $this->phpexcel = $objReader->load($filepath);
        $objWorksheet = $this->phpexcel->setActiveSheetIndex(0);
        // search param
        $year = date("Y");
        $month = date("m");
        $search = $this->tsession->userdata('nurse_rawat_jalan');
        $FD_TGL_MASUK = empty($search['FD_TGL_MASUK']) ? : $search['FD_TGL_MASUK'];
        $FS_KD_PEG = empty($search['FS_KD_PEG']) ? : $search['FS_KD_PEG'];
        $now = date('Y-m-d');
        // surat
        $surat = $this->m_rawat_jalan->get_px_by_dokter_wait(array($now, $FS_KD_PEG, $FS_KD_PEG, $FS_KD_PEG));
        $dokter = $this->m_rawat_jalan->get_dokter2($FS_KD_PEG);
        $bln = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        );
        foreach ($bln as $key => $value) {
            if ($key == $bulan) {
                $bulann = $value;
            }
        }
        /*
         * SET DATA EXCELL
         */
        $objWorksheet->setCellValue('A6', 'DATA PASIEN RAWAT JALAN DOKTER ' . $dokter['FS_NM_PEG'] . ' Tanggal ' . strtoupper($now));

        $i = 9;
        $no = 1;
        foreach ($surat as $data) {
            $objWorksheet->setCellValue('A' . $i, $no++ . '.');
            $objWorksheet->setCellValue('B' . $i, $data['FS_KD_REG']);
            $objWorksheet->setCellValue('C' . $i, $data['FS_MR']);
            $objWorksheet->setCellValue('D' . $i, $data['FS_NM_PASIEN']);
            $objWorksheet->setCellValue('E' . $i, $data['FS_ALM_PASIEN']);
            $objWorksheet->setCellValue('F' . $i, strip_tags($data['FS_DIAGNOSA']));
            $objWorksheet->setCellValue('G' . $i, strip_tags($data['FS_TINDAKAN']));
            // insert
            if (($i - 8) != count($surat)) {
                $objWorksheet->insertNewRowBefore(($i + 1), 1);
            }
            // next row
            $i++;
        }
        // file_name
        $file_name = "DATA_PASIEN_RAWAT_JALAN_DOKTER_" . $dokter['FS_NM_PEG'] . "_Tanggal_" . strtoupper($now);
        //--
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $file_name . '.xlsx');
        header('Cache-Control: max-age=0');
        // output
        $obj_writer = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel2007');
        $obj_writer->save('php://output');
        exit();
    }

    public function list_masalah_kep() {
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

    public function list_rencana_kep() {
        $instansi = $this->m_rawat_jalan->list_rencana_kep();
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

}
