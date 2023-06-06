<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class Bidan extends ApplicationBase {

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
        $this->smarty->assign("template_content", "igd/bidan/list.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $date = date('Y-m-d');
        $date2 = date('Y-m-d H:i:s');
        $role = $this->com_user['role_id'];
        $x = $this->com_user['user_name'];
        $date2 = new DateTime();
        $date_plus = $date2->modify("-1 days");
        $akhirnya= $date_plus->format("Y-m-d");


        $fs_kd_layanan = $this->com_user['fs_kd_layanan'];
        $FS_KD_PEG = $this->com_user['user_name'];
        
        $this->smarty->assign("rs_ases_bidan_igd", $this->m_igd->get_data_ases_bidan_igd(array($date, $akhirnya,$date))); 
       $this->smarty->assign("rs_pasien", $this->m_igd->get_pasien_ugd_bidan());
   
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function cari_process() {
        $FS_RG2 = $this->input->post('FS_RG');
        $cek = $this->m_igd->cek_bidan(array($FS_RG2));
        if ($cek == '0') {
           $rolenya=$this->com_user['role_name'];
             redirect("igd/bidan/add/" . $FS_RG2);
        } elseif ($cek >= '1') {
         redirect("igd/bidan/edit/" . $FS_RG2);
        }
    }


    
     
    public function add($FS_RG) {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "igd/bidan/add.html");
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
        $this->smarty->assign("template_content", "igd/bidan/edit.html");
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
        $this->smarty->assign("data", $this->m_igd->get_data_bidan_by_noreg(array($FS_RG)));           
        $this->smarty->assign("ps", $this->m_igd->get_suami(array($FS_RG)));           

        $this->smarty->assign("nyeri", $this->m_rawat_jalan->get_data_nyeri_by_rg(array($FS_RG)));
        $this->smarty->assign("jatuh", $this->m_igd->get_data_jatuh_by_rg(array($FS_RG))); 
        $this->smarty->assign("nutrisi", $this->m_rawat_jalan->get_data_nutrisi_by_rg(array($FS_RG)));

         $this->smarty->assign("fungsi", $this->m_ass_awal->get_data_fungsi_by_rg(array($FS_RG)));
      

        $this->smarty->assign("ases2", $this->m_rawat_jalan->get_data_ases2_by_rg(array($FS_RG)));
        
        // Mendapatkan string dari database
        $kriteria_discahargers_string = $this->m_igd->getKriteriaDischargeAssesmenBidan(array($FS_RG));

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
        // $tujuan = $this->m_rawat_jalan->list_masalah_kep_by_rg($FS_KD_REG);
        // $tujuan_str = "";
        // foreach ($tujuan as $key => $value) {
        //     $tujuan_str .= "'" . $value['FS_KD_MASALAH_KEP'] . "',";
        // }
        // $this->smarty->assign('rs_tujuan', $tujuan_str);

        // $tembusan = $this->m_rawat_jalan->list_rencana_kep_by_rg($FS_KD_REG);
        // $tembusan_str = "";
        // foreach ($tembusan as $key => $value) {
        //     $tembusan_str .= "'" . $value['FS_KD_REN_KEP'] . "',";
        // }
        // $this->smarty->assign('rs_tembusan', $tembusan_str);

        $tujuan = $this->m_rawat_jalan->list_pemeriksaan_lab_by_rg($FS_KD_REG);
        $tujuan_str = "";
        foreach ($tujuan as $key => $value) {
            $tujuan_str .= "'" . $value['No_Jenis'] . "',";
        }
        $this->smarty->assign('rs_tujuan', $tujuan_str);

        $tembusan = $this->m_rawat_jalan->list_pemeriksaan_rad_by_rg($FS_KD_REG);
        $tembusan_str = "";
        foreach ($tembusan as $key => $value) { 
            $tembusan_str .= "'" . $value['NO_RINCI'] . "',";
        }
        $this->smarty->assign('rs_tembusan', $tembusan_str);

        // $tujuan = $this->m_rawat_jalan->list_pemeriksaan_lab_by_rg_skdp($FS_KD_REG);
        // $tujuan_str = ""; 
        // foreach ($tujuan as $key => $value) {
        //     $tujuan_str .= "'" . $value['id'] . "',";
        // }
        // $this->smarty->assign('rs_tujuan', $tujuan_str);

        // $tembusan = $this->m_rawat_jalan->list_pemeriksaan_rad_by_rg_skdp($FS_KD_REG);
        // $tembusan_str = "";
        // foreach ($tembusan as $key => $value) {
        //     $tembusan_str .= "'" . $value['NO_RINCI'] . "',";
        // }
        // $this->smarty->assign('rs_tembusan', $tembusan_str);

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



     $RUMAH_MILIK=$this->input->post('RUMAH_MILIK');
     if($RUMAH_MILIK=='Lain'){
         $RUMAH_MILIK=$this->input->post('RUMAH_MILIK2');
     } 

     $TINGGAL_BERSAMA=$this->input->post('TINGGAL_BERSAMA');
     if($TINGGAL_BERSAMA=='Lain'){
         $TINGGAL_BERSAMA=$this->input->post('TINGGAL_BERSAMA2');
     } 
     
     $SOSIAL_SUPPORT=$this->input->post('SOSIAL_SUPPORT');
     if($SOSIAL_SUPPORT=='Lain'){
         $SOSIAL_SUPPORT=$this->input->post('SOSIAL_SUPPORT2');
     } 

     $ld = $this->input->post('KRITERIA_DISCHARGE');
     $kd='';
     if (!empty($ld)) {
         foreach ($ld as $value) {
             $kd=$kd.', '.$value;
         }

     }

                         //insert pemeriksaan lab
                         $lab = $this->input->post('rlab'); 
                        
                        //  var_dump($lab, $this->input->post('FS_KD_REG'));
                        //  die;
                         if (!empty($lab)) {
                             foreach ($lab as $key => $value) {
                                 $this->m_rawat_jalan->insert_pemeriksaan_lab(array($key, $value,$this->input->post('FS_KD_REG'), ''));
                               
                             }
                         }
                         //insert pemeriksaan radiologi
                         $rad = $this->input->post('radiologi');
                    
                         if (!empty($rad)) {
                             foreach ($rad as $key => $value) {
                                 $this->m_rawat_jalan->insert_pemeriksaan_rad2(array($key, $value, $this->input->post('FS_KD_REG')));
                                 
                            }
                         } 


    //      $lab = $this->input->post('rlab');
    //      $klab='';
    //      if (!empty($lab)) {
    //          foreach ($lab as $value) {
    //          $klab=$klab.', '.$value;
    //          }

    //  }


    //  $rad = $this->input->post('radiologi');
    //  $radiologi='';
    //  if (!empty($rad)) {
    //      foreach ($rad as $value) {
    //          $radiologi=$radiologi.', '.$value;
    //      }

    //  }



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


         
             
    
    

     $params17 = array(
         $this->input->post('FS_KD_REG'),
         $this->input->post('NAMA_SUAMI'),
         $this->input->post('TGL_LAHIR_SUAMI'),
         $this->input->post('AGAMA_SUAMI'),
         $this->input->post('PENDIDIKAN_SUAMI'),
         $this->input->post('PEKERJAAN_SUAMI'), 
         date('Y-m-d'),
         date('H:i:s')
     );
     $this->m_igd->INSERT_SUAMI($params17);
   
     $na=$this->m_igd->get_nama( $this->input->post('FS_KD_REG'));
     $nama_pasien=$na['Nama_Pasien'];
     $alamat=$na['Alamat'];
              $params2 = array(
                 $this->input->post('FS_KD_REG'),
                 $this->input->post('CARA_MASUK'),
                 $this->input->post('RUJUKAN'), 
                 $this->input->post('BAWA_OBAT'),
                 

                 $this->input->post('FS_STATUS_PSIK'),
                 $this->input->post('FS_STATUS_EMOSI'),
                 $this->input->post('FS_HUB_KELUARGA'),
              
                 $this->input->post('FS_USIA_KEHAMILAN'),
                     $this->input->post('FS_ANAMNESA'),
                  $this->input->post('FS_HAID_MEN'),
                  $this->input->post('FS_HAID_SIKLUS'),
                  $this->input->post('FS_HAID_LAMA'),
                  $this->input->post('FS_HAID_HPHT'),
                  $this->input->post('FS_HAID_HPL'),
                  $this->input->post('FS_HAID_KELUHAN'),

                  $this->input->post('FS_STATUS_PERKAWINAN'),
                  $this->input->post('FS_LAMA_MENIKAH'),
                  
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
                  $this->input->post('POLA_TIDUR'),
                  $this->input->post('JAM_TERAKHIR_MAKAN'),
                  $this->input->post('JAM_TERAKHIR_MINUM'),
                  $this->input->post('JAM_TERAKHIR_BAK'),
                  $this->input->post('JAM_TERAKHIR_BAB'),
                  $this->input->post('JAM_TERAKHIR_TIDUR'),

           
                  $this->input->post('WARNA_BAK'),
                  $this->input->post('KARAKTER_BAB'),

                  $RUMAH_MILIK,
                  $TINGGAL_BERSAMA,
                  $this->input->post('PJ_DARURAT'),
                  $this->input->post('HUBUNGAN_PJ'),

                  $this->input->post('AKTIFITAS'),
                  $this->input->post('SOSIAL_SUPPORT'),
                  $this->input->post('PERSALINAN'),

                  $this->input->post('KEADAAN_UMUM'),
                  $this->input->post('SADAR'),
                  $this->input->post('ALAT_BANTU'),
                  $this->input->post('TD'),
                  $this->input->post('N'),
                  $this->input->post('S'),
                  $this->input->post('R'),
                  $this->input->post('TB'),
                  $this->input->post('BB'),
                  $this->input->post('BBO'),

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
                  $this->input->post('DURASI_AUSKULTASI'),
                  $this->input->post('KONTRAKSI'),
                  $this->input->post('DURASI_KONTRAKSI'),
                  $this->input->post('INSPEKSI_ANO_GENITAS'),
                  $this->input->post('VAGINA_TOUCHER'), 
          
                  $this->input->post('MASALAH_KEBIDANAN'),
                  $this->input->post('DIAGNOSA'),
                  $this->input->post('RENCANA_TINDAKAN'),
                  
                 $this->input->post('PENERJEMAH'),
                 $kd,
                 $this->input->post('HASIL'),
                 $this->input->post('PENDIDIKAN_PASIEN'),
                 $this->input->post('JOB_PASIEN'),
                 $this->input->post('JAM_SELESAI'), 
                 $this->com_user['user_name'],
                 date('Y-m-d H:i:s'), 
                 $nama_pasien,
                 $alamat,
                 $this->input->post('BERI_OBAT'),
                 $this->input->post('NO_HP_PJ')
                 
             );
             $this->m_igd->INSERT_AWAL_BIDAN($params2);


             $params14 = array(
                 $this->input->post('FS_KD_REG'),
                 '',
                 '',
                 '',
                 '',
                 $this->input->post('FS_STATUS_PSIK'),
                 '',
                 $this->input->post('FS_HUB_KELUARGA'),
                 '',
                  '', 
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
                  '',
                  '',
                 $this->com_user['user_id'],
                 date('Y-m-d')
             );  
             $this->m_rawat_jalan->insert_ases($params14);

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
                 $this->input->post('FS_ANAMNESA'),
                 $this->com_user['user_id'],
                 date('Y-m-d H:i:s')
             );
             $this->m_ass_awal->insert_ases($params4); 

                
             

             

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

             $params5 = array(
                 $this->input->post('FS_KD_REG'),
                 $this->input->post('FS_ALERGI'),
                 '',
                 $this->input->post('FS_REAK_ALERGI'),
                $this->com_user['user_name'],
                date('Y-m-d H:i:s'), 
            );
            $this->m_rawat_jalan->insert_alergi($params5);
            $this->m_ass_awal->insert_alergi($params5);


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
             // insert
           



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
          
           
             $this->tnotification->delete_last_field();
             $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            
        
        // default redirect
        redirect("igd/bidan");
    }




      
    public function edit_process() { 
          // set page rules
          $this->_set_page_rule("C");
          // cek input
          $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
          // process
    
       
  
          $params5 = array(
             
              $this->input->post('FS_ALERGI'),
              '',
              $this->input->post('FS_REAK_ALERGI'),
             $this->com_user['user_name'],
             date('Y-m-d H:i:s'), 
             $this->input->post('FS_KD_REG'),
         );
         $this->m_rawat_jalan->update_alergi($params5); 
         $this->m_ass_awal->update_alergi($params5); 
  
   
  
  
          $RUMAH_MILIK=$this->input->post('RUMAH_MILIK');
          if($RUMAH_MILIK=='Lain'){
              $RUMAH_MILIK=$this->input->post('RUMAH_MILIK2');
          } 
  
          $TINGGAL_BERSAMA=$this->input->post('TINGGAL_BERSAMA');
          if($TINGGAL_BERSAMA=='Lain'){
              $TINGGAL_BERSAMA=$this->input->post('TINGGAL_BERSAMA2');
          } 
          
          $SOSIAL_SUPPORT=$this->input->post('SOSIAL_SUPPORT');
          if($SOSIAL_SUPPORT=='Lain'){
              $SOSIAL_SUPPORT=$this->input->post('SOSIAL_SUPPORT2');
          } 
  
          $ld = $this->input->post('KRITERIA_DISCHARGE');
          $kd='';
          if (!empty($ld)) {
              foreach ($ld as $value) {
                  $kd=$kd.', '.$value;
              }
  
          }

                            //insert pemeriksaan lab
                            $lab = $this->input->post('rlab'); 
                        
                            //  var_dump($lab, $this->input->post('FS_KD_REG'));
                            //  die;
                             if (!empty($lab)) {
                                 foreach ($lab as $key => $value) {
                                     $this->m_rawat_jalan->insert_pemeriksaan_lab(array($key, $value,$this->input->post('FS_KD_REG'), ''));
                                   
                                 }
                             }
                             //insert pemeriksaan radiologi
                             $rad = $this->input->post('radiologi');
                        
                             if (!empty($rad)) {
                                 foreach ($rad as $key => $value) {
                                     $this->m_rawat_jalan->insert_pemeriksaan_rad2(array($key, $value, $this->input->post('FS_KD_REG')));
                                     
                                }
                             } 
  
        //       $lab = $this->input->post('rlab');
        //       $klab='';
        //       if (!empty($lab)) {
        //           foreach ($lab as $value) {
        //           $klab=$klab.', '.$value;
        //           }
  
        //   }
  
  
        //   $rad = $this->input->post('radiologi');
        //   $radiologi='';
        //   if (!empty($rad)) {
        //       foreach ($rad as $value) {
        //           $radiologi=$radiologi.', '.$value;
        //       }
  
        //   }
  
  
  
          
              $FS_KD_JATUH2 =  $this->input->post('FS_KD_JATUH2');
              $paramsj = array(
                  
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
                  date('Y-m-d'),
                  $FS_KD_JATUH2, 
                  
              );
              $this->m_igd->UPDATE_JATUH($paramsj);
         
  
  
              
              $params1 = array(
                  $this->input->post('S'),
                  $this->input->post('N'),
                  $this->input->post('R'),
                  $this->input->post('TD'),
                  $this->input->post('TB'),
                  $this->input->post('BB'),
                  '',
                  $this->com_user['user_id'],
                  date('Y-m-d'),
                  date('H:i:s'),
                  $this->input->post('FS_KD_REG')
              );
              $this->m_rawat_jalan->update_vs($params1);
              $this->m_ass_awal->update_vs($params1);
          
  
  
          $params17 = array(
              $this->input->post('NAMA_SUAMI'),
              $this->input->post('TGL_LAHIR_SUAMI'),
              $this->input->post('AGAMA_SUAMI'),
              $this->input->post('PENDIDIKAN_SUAMI'),
              $this->input->post('PEKERJAAN_SUAMI'), 
              date('Y-m-d'),
              date('H:i:s'),
              $this->input->post('FS_KD_REG'),
          );
          $this->m_igd->UPDATE_SUAMI($params17);
        
          $na=$this->m_igd->get_nama( $this->input->post('FS_KD_REG'));
          $nama_pasien=$na['Nama_Pasien'];
          $alamat=$na['Alamat'];
                   $params2 = array(
                      $this->input->post('FS_KD_REG'),
                      $this->input->post('CARA_MASUK'),
                      $this->input->post('RUJUKAN'), 
                      $this->input->post('BAWA_OBAT'),
                      
                      $this->input->post('FS_STATUS_PSIK'),
                      $this->input->post('FS_STATUS_EMOSI'),
                      $this->input->post('FS_HUB_KELUARGA'),
                   
                      $this->input->post('FS_USIA_KEHAMILAN'),
                          $this->input->post('FS_ANAMNESA'),
                       $this->input->post('FS_HAID_MEN'),
                       $this->input->post('FS_HAID_SIKLUS'),
                       $this->input->post('FS_HAID_LAMA'),
                       $this->input->post('FS_HAID_HPHT'),
                       $this->input->post('FS_HAID_HPL'),
                       $this->input->post('FS_HAID_KELUHAN'),
  
                       $this->input->post('FS_STATUS_PERKAWINAN'),
                       $this->input->post('FS_LAMA_MENIKAH'),
                       
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
                       $this->input->post('POLA_TIDUR'),
                       $this->input->post('JAM_TERAKHIR_MAKAN'),
                       $this->input->post('JAM_TERAKHIR_MINUM'),
                       $this->input->post('JAM_TERAKHIR_BAK'),
                       $this->input->post('JAM_TERAKHIR_BAB'),
                       $this->input->post('JAM_TERAKHIR_TIDUR'),
  
                       $this->input->post('WARNA_BAK'),
                       $this->input->post('KARAKTER_BAB'),
  
                       $RUMAH_MILIK,
                       $TINGGAL_BERSAMA,
                       $this->input->post('PJ_DARURAT'),
                       $this->input->post('HUBUNGAN_PJ'),
  
                       $this->input->post('AKTIFITAS'),
                       $this->input->post('SOSIAL_SUPPORT'),
                       $this->input->post('PERSALINAN'),
  
                       $this->input->post('KEADAAN_UMUM'),
                       $this->input->post('SADAR'),
                       $this->input->post('ALAT_BANTU'),
                       $this->input->post('TD'),
                       $this->input->post('N'),
                       $this->input->post('S'),
                       $this->input->post('R'),
                       $this->input->post('TB'),
                       $this->input->post('BB'),
                       $this->input->post('BBO'),
  
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
                       $this->input->post('DURASI_AUSKULTASI'),
                       $this->input->post('KONTRAKSI'),
                       $this->input->post('DURASI_KONTRAKSI'),
                       $this->input->post('INSPEKSI_ANO_GENITAS'),
                       $this->input->post('VAGINA_TOUCHER'), 
           
                       $this->input->post('MASALAH_KEBIDANAN'),
                       $this->input->post('DIAGNOSA'),
                       $this->input->post('RENCANA_TINDAKAN'),
                       
                      $this->input->post('PENERJEMAH'),
                      $kd,
                      $this->input->post('HASIL'),
                      $this->input->post('PENDIDIKAN_PASIEN'),
                      $this->input->post('JOB_PASIEN'),
                      $this->input->post('JAM_SELESAI'), 
                      $this->com_user['user_name'],
                      date('Y-m-d H:i:s'), 
                      $nama_pasien,
                      $alamat,
                      $this->input->post('BERI_OBAT'),
                      $this->input->post('NO_HP_PJ')
                      
                  );
  
                  $this->m_igd->DELETE_AWAL_BIDAN($this->input->post('id'));
  
                  $this->m_igd->INSERT_AWAL_BIDAN($params2);
  
  
                  $params14 = array(
                      '',
                      '',
                      '',
                      '',
                      $this->input->post('FS_STATUS_PSIK'),
                      '',
                      $this->input->post('FS_HUB_KELUARGA'),
                      '',
                       '', 
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
                       '',
                       
                    
                      $this->com_user['user_id'],
                      date('Y-m-d'),
                      $this->input->post('FS_KD_REG')
                  );
                  $paramss_14 = array(
                      '',
                      '',
                      '',
                      '',
                      $this->input->post('FS_STATUS_PSIK'),
                      '',
                      $this->input->post('FS_HUB_KELUARGA'),
                      '',
                       '', 
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
                       '',
                       '',
                    
                      $this->com_user['user_id'],
                      date('Y-m-d'),
                      $this->input->post('FS_KD_REG')
                  );
                  $this->m_rawat_jalan->update_ases($paramss_14);
                  $this->m_ass_awal->update_ases($params14);
  
                  
  
                  
  
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
  
                  // $params5 = array(
                  //     $this->input->post('FS_ALERGI'),
                  //     $this->input->post('FS_REAK_ALERGI'),
                  //     $this->input->post('FS_RIW_PENYAKIT_DAHULU'),
                  //     $this->input->post('FS_RIW_PENYAKIT_DAHULU2'),
                  //     $this->input->post('FS_MR')
                  // );
                  // $this->m_ass_awal_bidan->insert_alergi($params5);
  
  
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
                  $this->m_ass_awal->update_nyeri($params2);
  
                
             
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
            
        
        // default redirect
        redirect("igd/bidan");
    }



   



}