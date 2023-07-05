<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class Medis extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_igd'); 
        $this->load->model('m_rawat_jalan');  
        $this->load->model('m_ass_awal');  
        $this->load->model('m_cppt');  
        
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
        $this->smarty->assign("template_content", "igd/medis/list.html");
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

       $this->smarty->assign("rs_pasien", $this->m_igd->get_pasien_ugd());
   
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function cari_process() {
        $FS_RG2 = $this->input->post('FS_RG');
        $cek = $this->m_igd->cek_medis(array($FS_RG2));
        if ($cek == '0') {
           $rolenya=$this->com_user['role_name'];
             redirect("igd/medis/add/" . $FS_RG2);
        } elseif ($cek >= '1') {
         redirect("igd/medis/edit/" . $FS_RG2);
        }
    }


    
     
    public function add($FS_RG) {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "igd/medis/add.html");
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
          $this->smarty->assign("icd", $this->m_igd->get_icd());  

          $data["vs"] = $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_RG));
       
          $this->smarty->assign("rs_dokter_sp", $this->m_cppt->get_dokter_sp(array($FS_RG)));
          
        $this->smarty->assign("bidan", $this->m_igd->get_data_bidan_by_noreg(array($FS_RG)));           
        $this->smarty->assign("perawat", $this->m_igd->get_data_perawat_by_noreg(array($FS_RG)));           
        $this->smarty->assign("nyeri", $this->m_rawat_jalan->get_data_nyeri_by_rg(array($FS_RG)));
          

          $date = new DateTime();
                          $date_plus = $date->modify("-1 days");
                          $akhirnya= $date_plus->format("Y-m-d");

        $this->smarty->assign("rs_pasien", $this->m_igd->get_pasien_by_rg_ugd(array($FS_RG)));
        $this->smarty->assign("rs_triase", $this->m_igd->get_data_triase_by_noreg(array($FS_RG)));           
        $this->smarty->assign("rs_lab", $this->m_igd->list_pemeriksaan_lab()); 
        $this->smarty->assign("rs_rad_igd", $this->m_igd->list_pemeriksaan_rad_igd()); 
        
        // var_dump($this->m_igd->list_pemeriksaan_lab());
        // die;


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
        $this->smarty->assign("template_content", "igd/medis/edit.html");
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

          $this->smarty->assign("rs_dokter_sp", $this->m_cppt->get_dokter_sp(array($FS_RG)));

        $this->smarty->assign("rs_pasien", $this->m_igd->get_pasien_by_rg_ugd(array($FS_RG)));
        $this->smarty->assign("rs_triase", $this->m_igd->get_data_triase_by_noreg(array($FS_RG)));           
        $this->smarty->assign("data", $this->m_igd->get_data_medis_by_noreg(array($FS_RG)));           
        $this->smarty->assign("ps", $this->m_igd->get_suami(array($FS_RG)));           
        $this->smarty->assign("alergi", $this->m_igd->get_alergi(array($FS_RG)));           
 
        $this->smarty->assign("nyeri", $this->m_rawat_jalan->get_data_nyeri_by_rg(array($FS_RG)));
        $this->smarty->assign("jatuh", $this->m_igd->get_data_jatuh_by_rg(array($FS_RG))); 
        $this->smarty->assign("nutrisi", $this->m_rawat_jalan->get_data_nutrisi_by_rg(array($FS_RG)));
 
         $this->smarty->assign("fungsi", $this->m_ass_awal->get_data_fungsi_by_rg(array($FS_RG)));
      

        $this->smarty->assign("ases2", $this->m_rawat_jalan->get_data_ases2_by_rg(array($FS_RG)));
        // $this->smarty->assign("get_lab", $this->m_rawat_jalan->get_lab(array($FS_RG)));
        $this->smarty->assign("rs_labb", $this->m_igd->list_pemeriksaan_lab()); 
        $this->smarty->assign("rs_rad_igd", $this->m_igd->list_pemeriksaan_rad_igd()); 
        $get_edit_lab = $this->m_igd->get_lab_edit(array($FS_RG));
        $get_rad_edit = $this->m_igd->get_rad_edit(array($FS_RG));
   

       
        // Memecah string menjadi array
        $data = array();
        $string = $get_edit_lab['lab'];
        $string = trim($string, ',');

        if (!empty($string)) {
            $datas = explode(',' , $string);    

        }
       
        $this->smarty->assign("lab_edit", $datas);

        //radiologi
        // $data = array();
        $string_rad = $get_rad_edit['rad'];
        $string_rad = trim($string_rad,',');

        if (!empty($string_rad)) {
            $data_rad = explode(',',$string_rad);    

        }
        // var_dump($data_rad);
        // die;


       
       
        $this->smarty->assign("rad_edit", $data_rad);
        

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

        $laboratorium = $this->m_rawat_jalan->list_pemeriksaan_lab_by_medis_igd(array($FS_KD_REG));
    

        $data = array();
        $string = $laboratorium['lab'];

        // $kalimat = implode(",",$string);
   
        $data = explode(', ', $string);
        
        if (!empty($string)) {
            $data = explode(', ', $string);
        }
        // var_dump($data);
        // die;

        $this->smarty->assign('rs_lab', $data);
   
      
        // $laboratorium_Str = "";
        // foreach ($laboratorium as $key => $value) { 
        //     $laboratorium_Str .= "'" . $value['lab'] . "',";
        // }
  
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

          $this->smarty->assign('planning_str', $planning_str);

          $tujuan = $this->m_rawat_jalan->list_pemeriksaan_lab_by_rg($FS_KD_REG);
          $tujuan_str = "";
          foreach ($tujuan as $key => $value) {
              $tujuan_str .= "'" . $value['No_Jenis'] . "',";
          }
          $this->smarty->assign('rs_tujuan', $tujuan_str);
          
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
  
      


            $lab = $this->input->post('rlab');
            // $klab='';
            if (!empty($lab)) {
                foreach ($lab as $value) {
                    $klab=$klab.', '.$value;
                }
              }


            $rad = $this->input->post('rrad');
            // $tembusan='';
            if (!empty($rad)) {
                foreach ($rad as $value) {
                    $tembusan=$tembusan.', '.$value;
                }

            }



        $params14 = array(
           
            $this->input->post('FS_STATUS_PSIK'),
            $this->input->post('FS_HUB_KELUARGA'),
            $this->input->post('FS_PENGELIHATAN'),
            $this->input->post('FS_PENCIUMAN'),
            $this->input->post('FS_PENDENGARAN'),
            $this->input->post('PERNIKAHAN'),
            $this->input->post('SUKU'),
            $this->input->post('JOB'),
            $this->com_user['user_id'],
            date('Y-m-d'),
            $this->input->post('FS_KD_REG')
        );
        $this->m_igd->update_ases($params14);

     

                 $params2 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('KENDARAAN'),
                    $this->input->post('RUJUKAN'), 
                    $this->input->post('FS_ANAMNESA'),
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU'),
                    $this->input->post('RIW_PENYAKIT_NOW'),
                    $this->input->post('RIW_PERAWATAN'),
                    $this->input->post('RIW_TINDAKAN'),
                    $this->input->post('FS_STATUS_PSIK'),
                    $this->input->post('MENTAL'),
                    $this->input->post('PEMERIKSAAN_FISIK'),
                    $this->input->post('SKOR_NYERI'),
                    $this->input->post('LINGKAR_KEPALA'),
                    $this->input->post('STATUS_GIZI'),
                    $this->input->post('ALAT_BANTU'),
                    $this->input->post('CACAT'),
                    $this->input->post('ADL'),
                    $this->input->post('RESIKO_JATUH'),
                    $this->input->post('KONJUNGTIVA'),
                    $this->input->post('DEVIASI'),
                    $this->input->post('SKELERA'),
                    $this->input->post('JVP'),
                    $this->input->post('BIBIR'),
                    $this->input->post('MUKOSA'),
                    $this->input->post('THORAX'),
                    $this->input->post('JANTUNG'),
                    $this->input->post('ABDOMEN'),
                    $this->input->post('PINGGANG'),
                    $this->input->post('EKS_ATAS'),
                    $this->input->post('EKS_BAWAH'),
                    '',
                    $klab,
                    $tembusan,
                    '',
                    $this->input->post('FS_DIAGNOSA'),
                    $this->input->post('MASALAH_KES'),
                    $this->input->post('FS_TERAPI'),
                    $this->input->post('RENCANA'),
                    $this->input->post('DIET'),
                    $this->input->post('KONSUL'),
                    $this->input->post('KD_DOKTER_KONSUL'),
                    $this->input->post('EDUKASI'),
                    $this->input->post('D_PLANNING'),
                    $this->input->post('ALASAN_RUJUK'),
                    $this->input->post('TRANSPORT_KELUAR'),
                    $this->input->post('KONDISI_AKHIR'),
                    $this->input->post('JAM_SELESAI'), 
                    $this->com_user['user_name'],
                    date('Y-m-d H:i:s'),
                    $this->input->post('KONSUL2'),
                    $this->input->post('KD_DOKTER_KONSUL2'),
                    $this->input->post('KONSUL3'),
                    $this->input->post('KD_DOKTER_KONSUL3'),
                    $this->input->post('REKOMENDASI_RUJUK'),
                    $this->input->post('REKOMENDASI_POLI')
                    
                );
                $this->m_igd->INSERT_AWAL_MEDIS($params2);


                $params5 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FS_ALERGI'),
                    '',
                   $this->input->post('FS_REAK_ALERGI'),
                   $this->com_user['user_name'],
                   date('Y-m-d H:i:s'), 
               );
               $this->m_rawat_jalan->insert_alergi($params5);

                
                // $edukasi = $this->input->post('edukasi');
                // if (!empty($edukasi)) {
                //     foreach ($edukasi as $value) {
                //         $this->m_ass_awal->insert_edukasi(array($this->input->post('FS_KD_REG'), $value));
                //     }
                // }

                // $planning = $this->input->post('planning');
                // if (!empty($planning)) {
                //     foreach ($planning as $value) {
                //         $this->m_ass_awal->insert_planning(array($this->input->post('FS_KD_REG'), $value));
                //     }
                // }
             
                    
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
                
            
        
        // default redirect
        if ($this->input->post('D_PLANNING') == 'Rujuk Internal') {
            $this->tnotification->sent_notification("success", "Asasmen Medis Berhasil Disimpan!");
            redirect("igd/medis/add_rujuk_internal_igd/" . $this->input->post('FS_KD_REG'));     
        }
         else {
            $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            redirect("igd/medis");
         }      
        
    }

    public function add_rujuk_internal_igd($FS_KD_REG = "") {
        // set page rules
                $this->_set_page_rule("R");
        // set template content
                $this->smarty->assign("template_content", "igd/medis/add_rujuk_internal_igd.html");
                // load javascript    
                $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
                $this->smarty->load_javascript('resource/js/jquery/select2.js');
                $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
                // load style
                $this->smarty->load_style("jquery.ui/select2/select2.css");
                // load style ui
                $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
                $now = date('Y-m-d');
                $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2_igd(array($FS_KD_REG)));
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
                // cek input
                $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
                // $this->tnotification->set_rules('FS_ALASAN_RUJUK', 'ALASAN DI RUJUK', 'trim|required');
                // process
                if ($this->tnotification->run() !== FALSE) {
                    $params = array(
                        $this->input->post('FS_KD_REG'),
                        $this->input->post('FS_TUJUAN_DPJP'),
                        $this->input->post('FS_RS_TUJUAN'),
                        $this->input->post('FS_STATUS_GAWAT_DARURAT'),
                        $this->input->post('FS_PELAYANAN_TELAH_DIBERIKAN'),
                        $this->com_user['user_name'],
                        date('Y-m-d'),
                        date('H:i:s')
                    );
                    // var_dump($params);
                    // die;
                    if ($this->m_rawat_jalan->insert_tac_rj_rujukan_igd($params)) {
        
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
                    redirect("igd/medis/add_rujuk_internal_igd/" . $this->input->post('FS_KD_REG'));
                }
                // default redirect
                redirect("igd/medis");
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
                        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG)));
                        $this->smarty->assign("medis", $this->m_rawat_jalan->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS)));
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
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process
  
     
        
        $lab = $this->input->post('rlab');
        $klab='';
        if (!empty($lab)) {
            foreach ($lab as $value) {
            $klab=$klab.', '.$value;
            }  }


        $rad = $this->input->post('rrad');
        $tembusan='';
        if (!empty($rad)) {
            foreach ($rad as $value) {
                $tembusan=$tembusan.', '.$value;
            }

        }



            $params14 = array(
            
                $this->input->post('FS_STATUS_PSIK'),
                $this->input->post('FS_HUB_KELUARGA'),
                $this->input->post('FS_PENGELIHATAN'),
                $this->input->post('FS_PENCIUMAN'),
                $this->input->post('FS_PENDENGARAN'),
                $this->input->post('PERNIKAHAN'),
                $this->input->post('SUKU'),
                $this->input->post('JOB'),
                $this->com_user['user_id'],
                date('Y-m-d'),
                $this->input->post('FS_KD_REG')
            );
            $this->m_igd->update_ases($params14);

 

             $params2 = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('KENDARAAN'),
                $this->input->post('RUJUKAN'), 
                $this->input->post('FS_ANAMNESA'),
                $this->input->post('FS_RIW_PENYAKIT_DAHULU'),
                $this->input->post('RIW_PENYAKIT_NOW'),
                $this->input->post('RIW_PERAWATAN'),
                $this->input->post('RIW_TINDAKAN'),
                $this->input->post('FS_STATUS_PSIK'),
                $this->input->post('MENTAL'),
                $this->input->post('PEMERIKSAAN_FISIK'),
                $this->input->post('SKOR_NYERI'),
                $this->input->post('LINGKAR_KEPALA'),
                $this->input->post('STATUS_GIZI'),
                $this->input->post('ALAT_BANTU'),
                $this->input->post('CACAT'),
                $this->input->post('ADL'),
                $this->input->post('RESIKO_JATUH'),
                $this->input->post('KONJUNGTIVA'),
                $this->input->post('DEVIASI'),
                $this->input->post('SKELERA'),
                $this->input->post('JVP'),
                $this->input->post('BIBIR'),
                $this->input->post('MUKOSA'),
                $this->input->post('THORAX'),
                $this->input->post('JANTUNG'),
                $this->input->post('ABDOMEN'),
                $this->input->post('PINGGANG'),
                $this->input->post('EKS_ATAS'),
                $this->input->post('EKS_BAWAH'),
                '',
                $klab,
                $tembusan,
                '',
                $this->input->post('FS_DIAGNOSA'),
                $this->input->post('MASALAH_KES'),
                $this->input->post('FS_TERAPI'),
                $this->input->post('RENCANA'),
                $this->input->post('DIET'),
                $this->input->post('KONSUL'),
                $this->input->post('KD_DOKTER_KONSUL'),
                $this->input->post('EDUKASI'),
                $this->input->post('D_PLANNING'),
                $this->input->post('ALASAN_RUJUK'),
                $this->input->post('TRANSPORT_KELUAR'),
                $this->input->post('KONDISI_AKHIR'),
                $this->input->post('JAM_SELESAI'), 
                $this->com_user['user_name'],
                date('Y-m-d H:i:s'), 
                $this->input->post('KONSUL2'),
                $this->input->post('KD_DOKTER_KONSUL2'),
                $this->input->post('KONSUL3'),
                $this->input->post('KD_DOKTER_KONSUL3'),
                $this->input->post('REKOMENDASI_RUJUK'),
                $this->input->post('REKOMENDASI_POLI')
                
            );
            $this->m_igd->DELETE_AWAL_MEDIS($this->input->post('id'));
            
            $this->m_igd->INSERT_AWAL_MEDIS($params2);


 
 
               

                $params5 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FS_ALERGI'),
                    '',
                   $this->input->post('FS_REAK_ALERGI'),
                   $this->com_user['user_name'],
                   date('Y-m-d H:i:s'), 
               );
               $this->m_rawat_jalan->insert_alergi($params5);




            //   

                 
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
            
        
        // default redirect
        redirect("igd/medis");
    }



   



}