<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class Perawat extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_igd'); 
        $this->load->model('m_rawat_jalan');  
        $this->load->model('m_ass_awal');   
        
        $this->load->model('m_ass_jatuh');   
        // load library
        $this->load->library('tnotification');
        $this->load->library('pagination');
        $this->load->library('datetimemanipulation');
        $this->load->library('tupload');
        //$this->load->library('twhatsapp');
        $this->smarty->assign('dtm', $this->datetimemanipulation);
        $this->smarty->assign('m_cppt', $this->m_cppt);
    }





   // tambah surat masuk
    public function index() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "igd/perawat/list.html");
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
        $x = $this->com_user['user_name'];


        $fs_kd_layanan = $this->com_user['fs_kd_layanan'];
        $this->smarty->assign("rs_ases_per_igd", $this->m_igd->get_data_ases_perawat_igd(array($date, $akhirnya,$date)));

       $this->smarty->assign("rs_pasien", $this->m_igd->get_pasien_ugd());
   
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function cari_process() {
        $FS_RG2 = $this->input->post('FS_RG');
        $cek = $this->m_igd->cek_perawat(array($FS_RG2));
        if ($cek == '0') {
           $rolenya=$this->com_user['role_name'];
             redirect("igd/perawat/add/" . $FS_RG2);
        } elseif ($cek >= '1') {
         redirect("igd/perawat/edit/" . $FS_RG2);
        }
    }


    
     
    public function add($FS_RG) {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "igd/perawat/add.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");

         $role = $this->com_user['role_id'];
         $rolenya=$this->com_user['role_nm'];
          $this->smarty->assign("username", $this->com_user['user_name']);
          $tgl=date('Y-m-d');

          $this->smarty->assign("icd", $this->m_igd->get_icd());  

          $now = date('Y-m-d'); 

          $date = new DateTime();
                          $date_plus = $date->modify("-1 days");
                          $akhirnya= $date_plus->format("Y-m-d");

        $this->smarty->assign("rs_pasien", $this->m_igd->get_pasien_by_rg_ugd(array($FS_RG)));
        $this->smarty->assign("rs_triase", $this->m_igd->get_data_triase_by_noreg(array($FS_RG)));           

        $this->smarty->assign("result", $this->m_igd->get_px_by_dokter_by_rg2(array($FS_RG)));

        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);
         $this->smarty->assign("namarole", $rolenya); 
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }


        
    public function edit($FS_RG) { 
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "igd/perawat/edit.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");

         $role = $this->com_user['role_id'];
         $rolenya=$this->com_user['role_nm'];
          $this->smarty->assign("username", $this->com_user['user_name']);
          $tgl=date('Y-m-d');

          $now = date('Y-m-d'); 
 
          $date = new DateTime();
                          $date_plus = $date->modify("-1 days");
                          $akhirnya= $date_plus->format("Y-m-d");

        $this->smarty->assign("rs_pasien", $this->m_igd->get_pasien_by_rg_ugd(array($FS_RG)));
        $this->smarty->assign("rs_triase", $this->m_igd->get_data_triase_by_noreg(array($FS_RG)));           
        $this->smarty->assign("data", $this->m_igd->get_data_perawat_by_noreg(array($FS_RG)));           

        $this->smarty->assign("nyeri", $this->m_rawat_jalan->get_data_nyeri_by_rg(array($FS_RG)));
        $this->smarty->assign("jatuh", $this->m_igd->get_data_jatuh_by_rg(array($FS_RG))); 
        $this->smarty->assign("nutrisi", $this->m_rawat_jalan->get_data_nutrisi_by_rg(array($FS_RG)));

        $this->smarty->assign("ases2", $this->m_rawat_jalan->get_data_ases2_by_rg(array($FS_RG)));

           // Mendapatkan string dari database
           $kriteria_discahargers_string = $this->m_igd->getKriteriaDischargeAssesmenPerawat(array($FS_RG));

           // Memecah string menjadi array
           $data = array();
           $string = $kriteria_discahargers_string['KRITERIA_DISCHARGE'];;
           $string = trim($string, ','); // Menghapus koma di awal dan akhir string (jika ada)
   
           if (!empty($string)) {
               $data = explode(', ', $string);
           }
   
           // var_dump($data);
           // die;
           // Assign array ke Smarty
           $this->smarty->assign("kriteria_discahargers", $data);

        $FS_KD_REG=$FS_RG;
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
          
        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);
         $this->smarty->assign("namarole", $rolenya); 
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
  

        $params5 = array(
            $this->input->post('FS_KD_REG'),
            $this->input->post('RIWAYAT_ALERGI_MAKANAN'),
            '',
          '',
           $this->com_user['user_name'],
           date('Y-m-d H:i:s'), 
        );
      
        echo 'ok';
        $this->m_rawat_jalan->insert_alergi($params5); 

        
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

            $ld = $this->input->post('KRITERIA_DISCHARGE');
            $kd='';
            if (!empty($ld)) {
                foreach ($ld as $value) {
                    $kd=$kd.', '.$value;
                }
            }

            $params1 = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('S'),
                $this->input->post('N'),
                $this->input->post('R'),
                $this->input->post('TD'),
                $this->input->post('TB'),
                $this->input->post('BB'),
                $this->input->post('FS_KD_MEDIS'),
                $this->com_user['user_id'],
                date('Y-m-d'),
                date('H:i:s')
            );
            $this->m_rawat_jalan->insert_vs($params1);
            $this->m_ass_awal->insert_vs($params1);



          
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
            }


                $na=$this->m_igd->get_nama( $this->input->post('FS_KD_REG'));
                $nama_pasien=$na['Nama_Pasien'];
                $alamat=$na['Alamat'];
            $params2 = array(
                $this->input->post('FS_KD_REG'), 
                '',
                '',
                $this->input->post('KEL_UTAMA'),
                $this->input->post('KEL_SEKARANG'), 
                $this->input->post('RIWAYAT_SAKIT'),
                '',
                $this->input->post('RIWAYAT_ALERGI_MAKANAN'),
                $d,
                $this->input->post('MENIKAH'),
                $this->input->post('JOB'),
                $this->input->post('SUKU'),
                $this->input->post('AGAMA'),
                $this->input->post('PSIKOLOGIS'),
                $this->input->post('MENTAL'),
                
                $this->input->post('KESADARAN'),
                $this->input->post('KEADAAN_UMUM'),
                $this->input->post('TD'),
                $this->input->post('N'),
                $this->input->post('S'),
                $this->input->post('R'),
                $this->input->post('TB'),
                $this->input->post('BB'),
                
                $this->input->post('LINGKAR_KEPALA'),
                $this->input->post('STATUS_GIZI'),
            
                $this->input->post('GCS'),
                $this->input->post('ALAT_BANTU'),
                $this->input->post('CACAT'),
                $this->input->post('ADL'),
                $this->input->post('RESIKO_JATUH'),
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
                $this->input->post('JATUH_3BULAN'),
                $this->input->post('BANTU_JALAN'),
                $this->input->post('SULIT_JALAN'),
                $this->input->post('KURSI_RODA'),
                $this->input->post('ALVI'),
                $this->input->post('RIWAYAT_DEKUBITUS'),
                $this->input->post('USIA65'),
                $this->input->post('ANAK_SESUAI_UMUR'),
                
                $this->input->post('PENERJEMAH'),
                $kd,
                $this->input->post('HASIL'),
                $this->input->post('JAM_SELESAI'), 
                $this->com_user['user_name'],
                date('Y-m-d H:i:s'),
                $nama_pasien,
                $alamat
                
            );
            $this->m_igd->INSERT_AWAL_PERAWAT($params2);

                $params3 = array(
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
                $this->m_rawat_jalan->insert_nyeri($params3);
                $this->m_ass_awal->insert_nyeri($params3);
              
           
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
                $this->m_ass_awal->insert_nutrisi($params6);


                $params14 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('RIWAYAT_SAKIT'),
                     '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    $this->input->post('ADL'),
                    $this->input->post('AGAMA'),
                     '', 
                    '',
                   
                    $this->input->post('KEL_UTAMA'),
                    $this->input->post('FS_PENGELIHATAN'),
                    $this->input->post('FS_PENCIUMAN'),
                    $this->input->post('FS_PENDENGARAN'),
                     '',
                     '',
                     '',
                     '',
                     '',
                     '',
                     '',
                     $this->input->post('MENIKAH'),
                     $this->input->post('SUKU'),
                     $this->input->post('JOB'),
                    $this->com_user['user_id'],
                    date('Y-m-d')
                );  
                $this->m_igd->insert_ases($params14);

                $params4 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('RIWAYAT_SAKIT'),
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    $this->input->post('AGAMA'),
                    '',
                    '',
                    '',
                    $this->input->post('FS_PENGELIHATAN'),
                    $this->input->post('FS_PENCIUMAN'),
                    $this->input->post('FS_PENDENGARAN'),
                    '',
                    '',
                    '',
                    '',
                    '',
                    $this->input->post('KEL_UTAMA'),
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
                    $this->com_user['user_id'],
                    date('Y-m-d H:i:s')
                );

                $this->m_igd->insert_ases13($params4); 





             
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


                if($this->input->post('kode_icd_x')!=''){
                    $FS_KD_REG=$this->input->post('FS_KD_REG');
                    $pasien= $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG)); 
                   
                    if(strlen($pasien['NO_IDENTITAS'])==16){
                        $nik=$pasien['NO_IDENTITAS'];
                    }
                    else{
                        $nik=$pasien['HP2'];
                    }
                   
                
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
                        $kodekota="1872";
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
                                '18',
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
                                '18',
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
                

                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            

                // if($this->input->post('HASIL')=='3'){
                //     $cek = $this->m_igd->cek_tf_dari_igd(array($FS_RG2));
                //     if ($cek == '0') {
                //            redirect("igd/perawat/transfer/" . $this->input->post('FS_KD_REG'));
                //     }
                //     else{
                //         redirect("igd/perawat/edit_transfer/" . $this->input->post('FS_KD_REG'));
                //     }
                // }
        
        // default redirect
        redirect("igd/perawat");
    }


    public function tf($FS_RG=''){
        $cek = $this->m_igd->cek_tf_dari_igd(array($FS_RG));
                    if ($cek == '0') {
                           redirect("igd/perawat/transfer/" . $FS_RG);
                    }
                    else{
                             redirect("igd/perawat/edit_transfer/" . $FS_RG);
                            
                    }
    }
    

    public function transfer_process() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process
  
                  $params2 = array(
                    $this->input->post('FS_KD_REG'), 
                    $this->input->post('KD_DOKTER_DPJP'), 
                    $this->input->post('KD_KONSUL_1'),
                    $this->input->post('KD_KONSUL_2'), 
                    $this->input->post('TGL_PINDAH'), 
                    $this->input->post('JAM_PINDAH'), 
                    'IGD', 
                    $this->input->post('RUANG2'), 
                    $this->input->post('DIAGNOSA1'), 
                    $this->input->post('DIAGNOSA2'), 
                    $this->input->post('ANAMNESA'),
                    $this->input->post('RIWAYAT_SAKIT'),
                    $this->input->post('PEMERIKSAAN_FISIK1'), 
                    $this->input->post('PEMERIKSAAN_FISIK2'), 
                    $this->input->post('PENUNJANG'), 
                    '', 
                    $this->input->post('TERAPI'), 
                    $this->com_user['user_name'],
                    '',
                    'Pending',
                    $this->input->post('DERAJAT'), 
                    $this->input->post('CAT1'), 
                    date('Y-m-d H:i:s'), 
                    date('Y-m-d H:i:s'), 
                    
                );
                $this->m_igd->INSERT_TF_PERAWAT($params2);

              
        // default redirect
        redirect("igd/ppdftr");
    }




    public function edit_transfer_process() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process
  
                  $params2 = array(
                    $this->input->post('FS_KD_REG'), 
                    $this->input->post('KD_DOKTER_DPJP'), 
                    $this->input->post('KD_KONSUL_1'),
                    $this->input->post('KD_KONSUL_2'), 
                    $this->input->post('TGL_PINDAH'), 
                    $this->input->post('JAM_PINDAH'), 
                    'IGD', 
                    $this->input->post('RUANG2'), 
                    $this->input->post('DIAGNOSA1'), 
                    $this->input->post('DIAGNOSA2'), 
                    $this->input->post('ANAMNESA'),
                    $this->input->post('RIWAYAT_SAKIT'),
                    $this->input->post('PEMERIKSAAN_FISIK1'), 
                    $this->input->post('PEMERIKSAAN_FISIK2'), 
                    $this->input->post('PENUNJANG'), 
                    '', 
                    $this->input->post('TERAPI'), 
                    $this->com_user['user_name'],
                    '',
                    'Pending',
                    $this->input->post('DERAJAT'), 
                    $this->input->post('CAT1'), 
                    date('Y-m-d H:i:s'), 
                    date('Y-m-d H:i:s'), 
                    $this->input->post('id'), 

                    
                );
                $this->m_igd->UPDATE_TF_PERAWAT($params2);

              
        // default redirect
        redirect("igd/ppdftr");
    }



    public function transfer($FS_RG) {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "igd/perawat/transfer.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");

         $role = $this->com_user['role_id'];
         $rolenya=$this->com_user['role_nm'];
          $this->smarty->assign("username", $this->com_user['user_name']);
          $tgl=date('Y-m-d');

          $now = date('Y-m-d'); 
 
          $date = new DateTime();
                          $date_plus = $date->modify("-1 days");
                          $akhirnya= $date_plus->format("Y-m-d");

        $this->smarty->assign("rs_pasien", $this->m_igd->get_pasien_by_rg_ugd(array($FS_RG)));
        $this->smarty->assign("rs_triase", $this->m_igd->get_data_triase_by_noreg(array($FS_RG)));           
        $this->smarty->assign("perawat", $this->m_igd->get_data_perawat_by_noreg(array($FS_RG)));           
        $this->smarty->assign("bidan", $this->m_igd->get_data_bidan_by_noreg(array($FS_RG)));           
        $this->smarty->assign("daftar", $this->m_igd->get_daftar_igd_by_noreg(array($FS_RG)));           
        $this->smarty->assign("bangsal", $this->m_igd->get_bangsal());  
        $this->smarty->assign("ruang", $this->m_igd->get_ruang());           

        $this->smarty->assign("vs", $this->m_igd->get_data_vs_by_rg($FS_RG));   
        $this->smarty->assign("medis", $this->m_igd->get_data_medis_by_noreg(array($FS_RG)));           

        $this->smarty->assign("nyeri", $this->m_rawat_jalan->get_data_nyeri_by_rg(array($FS_RG)));
        $this->smarty->assign("jatuh", $this->m_rawat_jalan->get_data_jatuh_by_rg(array($FS_RG))); 
        $this->smarty->assign("nutrisi", $this->m_rawat_jalan->get_data_nutrisi_by_rg(array($FS_RG)));
        $this->smarty->assign("rs_dokter", $this->m_igd->get_dokter_sp());       
        $this->smarty->assign("ases2", $this->m_rawat_jalan->get_data_ases2_by_rg(array($FS_RG)));

        $FS_KD_REG=$FS_RG;
           
        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);
         $this->smarty->assign("namarole", $rolenya); 
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }


    
    public function edit_transfer($FS_RG) {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "igd/perawat/edit_transfer.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");

        $this->smarty->assign("vs", $this->m_igd->get_data_vs_by_rg($FS_RG));   

         $role = $this->com_user['role_id'];
         $rolenya=$this->com_user['role_nm'];
          $this->smarty->assign("username", $this->com_user['user_name']);
          $tgl=date('Y-m-d');

          $now = date('Y-m-d'); 
 
          $date = new DateTime();
                          $date_plus = $date->modify("-1 days");
                          $akhirnya= $date_plus->format("Y-m-d");

        $this->smarty->assign("rs_pasien", $this->m_igd->get_pasien_by_rg_ugd(array($FS_RG)));
        $this->smarty->assign("rs_triase", $this->m_igd->get_data_triase_by_noreg(array($FS_RG)));           
        $this->smarty->assign("perawat", $this->m_igd->get_data_perawat_by_noreg(array($FS_RG)));           
        $this->smarty->assign("daftar", $this->m_igd->get_daftar_igd_by_noreg(array($FS_RG)));           
        $this->smarty->assign("bangsal", $this->m_igd->get_bangsal());  
        $this->smarty->assign("ruang", $this->m_igd->get_ruang());           

                 

        $this->smarty->assign("medis", $this->m_igd->get_data_medis_by_noreg(array($FS_RG)));           
        $this->smarty->assign("tf", $this->m_igd->get_data_tf_by_noreg(array($FS_RG)));           

        $this->smarty->assign("rs_dokter", $this->m_igd->get_dokter_sp());       
        $this->smarty->assign("ases2", $this->m_rawat_jalan->get_data_ases2_by_rg(array($FS_RG)));

        $FS_KD_REG=$FS_RG;
           
        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);
         $this->smarty->assign("namarole", $rolenya); 
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }



      
    public function edit_process() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process
  
     

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

        $ld = $this->input->post('KRITERIA_DISCHARGE');
        $kd='';
        if (!empty($ld)) {
            foreach ($ld as $value) {
                $kd=$kd.', '.$value;
            }
        }


        $params1 = array(
            $this->input->post('S'),
            $this->input->post('N'),
            $this->input->post('R'),
            $this->input->post('TD'),
            $this->input->post('TB'),
            $this->input->post('BB'),
            $this->com_user['user_id'],
            date('Y-m-d'),
            $this->input->post('FS_KD_REG')
        );
        $this->m_rawat_jalan->update_vs($params1); 
        $this->m_igd->update_vs($params1); 

        $na=$this->m_igd->get_nama( $this->input->post('FS_KD_REG'));
        $nama_pasien=$na['Nama_Pasien'];
        $alamat=$na['Alamat'];
                 $params2 = array(
                    $this->input->post('FS_KD_REG'), 
                    '',
                    '',
                    $this->input->post('KEL_UTAMA'),
                    $this->input->post('KEL_SEKARANG'), 
                    $this->input->post('RIWAYAT_SAKIT'),
                    '',
                    $this->input->post('RIWAYAT_ALERGI_MAKANAN'),
                    $d,
                    $this->input->post('MENIKAH'),
                    $this->input->post('JOB'),
                    $this->input->post('SUKU'),
                    $this->input->post('AGAMA'),
                    $this->input->post('PSIKOLOGIS'),
                    $this->input->post('MENTAL'),
                    
                    $this->input->post('KESADARAN'),
                    $this->input->post('KEADAAN_UMUM'),
                    $this->input->post('TD'),
                    $this->input->post('N'),
                    $this->input->post('S'),
                    $this->input->post('R'),
                    $this->input->post('TB'),
                    $this->input->post('BB'),
                    $this->input->post('LINGKAR_KEPALA'),
                    $this->input->post('STATUS_GIZI'),
                   
                    $this->input->post('GCS'),
                    $this->input->post('ALAT_BANTU'),
                    $this->input->post('CACAT'),
                    $this->input->post('ADL'),
                    $this->input->post('RESIKO_JATUH'),
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
                    $this->input->post('JATUH_3BULAN'),
                    $this->input->post('BANTU_JALAN'),
                    $this->input->post('SULIT_JALAN'),
                    $this->input->post('KURSI_RODA'),
                    $this->input->post('ALVI'),
                    $this->input->post('RIWAYAT_DEKUBITUS'),
                    $this->input->post('USIA65'),
                    $this->input->post('ANAK_SESUAI_UMUR'),
                    
                    $this->input->post('PENERJEMAH'),
                    $kd,
                    $this->input->post('HASIL'),
                    $this->input->post('JAM_SELESAI'), 
                    $this->com_user['user_name'],
                    date('Y-m-d H:i:s'),
       
                    $nama_pasien,
                    $alamat,
                    $this->input->post('id'),

                    
                );
                $this->m_igd->UPDATE_AWAL_PERAWAT($params2);


                

                $params14 = array(
                   $this->input->post('RIWAYAT_SAKIT'),
                    '',
                    '',
                    '',
		            '',
                    '',
		            '',
                     $this->input->post('ADL'),
                     $this->input->post('AGAMA'),
                    '',
                     '', 
                     
		           $this->input->post('KEL_UTAMA'), 
                   $this->input->post('FS_PENGELIHATAN'),
                    $this->input->post('FS_PENCIUMAN'),
                    $this->input->post('FS_PENDENGARAN'),
                     '',
                     '',
                     '',
                     '',
                     '',
                     '',
                     '',
                     $this->com_user['user_id'],
                    date('Y-m-d'),
                    $this->input->post('FS_KD_REG')
                );
                $this->m_rawat_jalan->update_ases($params14);



                $params19 = array(
                    $this->input->post('RIWAYAT_SAKIT'),
                    '',
                    '',
                    '',
		            '',
                    '',
		            '',
                     $this->input->post('ADL'),
                     $this->input->post('AGAMA'),
                    '',
                     '', 
                     '', 
                   $this->input->post('FS_PENGELIHATAN'),
                    $this->input->post('FS_PENCIUMAN'),
                    $this->input->post('FS_PENDENGARAN'),
                     '',
                     '',
                     '',
                     '',
                     '',
		              $this->input->post('KEL_UTAMA'), 
                     $this->com_user['user_id'],
                    date('Y-m-d'),
                    $this->input->post('FS_KD_REG')
                 );
                 $this->m_ass_awal->update_ases($params19);


                $params3 = array(
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
                $this->m_rawat_jalan->update_nyeri($params3);
                $this->m_ass_awal->update_nyeri($params3);
           
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
                $this->m_ass_awal->update_nutrisi($params6);

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
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            
        
                // if($this->input->post('HASIL')=='3'){

                //     redirect("igd/perawat/transfer/" . $this->input->post('FS_KD_REG'));
                // }

        // default redirect
        redirect("igd/perawat");
    }






}