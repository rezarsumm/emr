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
        $this->load->model('m_cppt');
        $this->load->model('m_rawat_jalan');
        $this->load->model('m_rawat_jalan_nurse');
        $this->smarty->assign('m_cppt', $this->m_cppt);
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
        $this->smarty->assign("FD_TGL_TRS", $search['FD_TGL_TRS']);
        $FD_TGL_TRS = empty($search['FD_TGL_TRS']) ? : $search['FD_TGL_TRS'];

        
        $this->smarty->assign("FD_TGL_MASUK", $search['FD_TGL_MASUK']);
        $this->smarty->assign("FD_TGL_TRS", $search['FD_TGL_TRS']);
        
        
        $FD_TGL_MASUK = empty($search['FD_TGL_MASUK']) ? : $search['FD_TGL_MASUK'];
        $FD_TGL_TRS = empty($search['FD_TGL_TRS']) ? : $search['FD_TGL_TRS'];
        $this->smarty->assign("username", $this->com_user['user_name']);
       
        $x = $this->com_user['user_name'];
        $FS_KD_PEG = $this->com_user['user_name'];
        // }
        
        $now = date('Y-m-d');  
// get search parameter
        $this->smarty->assign("no", '1');  

        if($x=='216'|| $x=='217' || $x=='211'  || $x=='215'|| $x=='213'|| $x=='202' || $x=='203' || $x=='206'  || $x=='211' || $x=='207' || $x=='209' || $x=='219'  || $x=='220' || $x=='221' || $x=='312' || $x=='222' || $x=='223'|| $x=='208' ||  $x=='224' ||  $x=='225' ||  $x=='226' || $x=='227' || $x=='229'|| $x=='230' || $x=='231'){

           $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_px_by_dokter_wait_dokter1(array($FD_TGL_MASUK, $FD_TGL_MASUK, $FS_KD_PEG)));
        }
        else{
         $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_px_by_dokter_wait_dokter_aja(array($FD_TGL_MASUK, $FS_KD_PEG,$FD_TGL_MASUK, $FS_KD_PEG)));           
        }

        $cek=$this->m_rawat_jalan->get_px_by_dokter_wait_dokter_aja(array($FD_TGL_MASUK, $FS_KD_PEG,$FD_TGL_MASUK, $FS_KD_PEG));

        // var_dump($cek);
        // die;

         

          $this->smarty->assign("pasien_konsul", $this->m_rawat_jalan->get_px_konsul(array($FS_KD_PEG,$FD_TGL_TRS))); 
          
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
                "FD_TGL_MASUK" => $this->input->post("FD_TGL_MASUK"),
                "FD_TGL_TRS" => $this->input->post("FD_TGL_TRS") 
            );
            $this->tsession->set_userdata("medis_rawat_jalan", $params);
        }
        // redirect
        redirect("medis/rawat_jalan");
    }


 // public function proses_cari_konsul() {
 //        //set page rules
 //        $this->_set_page_rule("R");
 //        //data
 //        if ($this->input->post('save') == "Reset") {
 //            $this->tsession->unset_userdata("medis_rawat_jalan");
 //        } else {
 //            $params = array(
 //                "FD_TGL_TRS" => $this->input->post("FD_TGL_TRS")
 //            );
 //            $this->tsession->set_userdata("farmasi_rawat_inap", $params);
 //        }
 //        // redirect
 //        redirect("farmasi/rawat_inap");
 //    }


    public function history($FS_MR = "",$konsul= "") { 
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
        $noww = date('Y-m-d');
        $tme=' 00:00:00.000';
        $skrng=$noww.$tme;

  
        $medis = $this->com_user['user_name'];
       $medis = $this->com_user['user_name'];
        $x = $this->com_user['user_name'];
        $this->smarty->assign("no", '1');
        $this->smarty->assign("now", $now);
        $this->smarty->assign("noww", $noww);
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rm(array($FS_MR)));
        
        if($konsul=='x'){
            $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_px_history_dokter_konsul(array($FS_MR)));
            $this->smarty->assign("noww", $skrng);
        }
        else{
            if($x=='216'|| $x=='217'|| $x=='215' || $x=='203' || $x=='206'  || $x=='211' || $x=='207' || $x=='209' || $x=='206'  || $x=='211' || $x=='207' || $x=='209' || $x=='213'|| $x=='202' || $x=='219' || $x=='220' || $x=='221' || $x=='312'  || $x=='222'  || $x=='223' || $x=='208' ||  $x=='224' ||  $x=='225' || $x=='226' || $x=='227' || $x=='229'|| $x=='230' || $x=='231'){
 
             $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_px_history_dokter4(array($now,$medis,$FS_MR)));
            }
          else{

            $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_px_history_dokter2(array($now,$medis,$FS_MR)));}
        }
        parent::display();
    }

   public function add($FS_KD_REG = "", $FS_KD_REG2 = "",$medis="") { 
// set page rules
        $this->_set_page_rule("R");  
// set template content



         $x = $this->com_user['user_name'];

    
         if($x=='216'|| $x=='217' || $x=='211' || $x=='215'  || $x=='203' || $x=='206'  || $x=='211' || $x=='207' || $x=='209' || $x=='213'|| $x=='202' || $x=='219' || $x=='220' || $x=='221' || $x=='312' || $x=='222' || $x=='223' || $x=='208' ||  $x=='224' ||  $x=='225' || $x=='226' || $x=='227' || $x=='229' || $x=='230' || $x=='231' || $x=='232' || $x=='233'){
            $this->smarty->assign("template_content", "medis/rawat_jalan/addx.html");

         }
         else{
            $this->smarty->assign("template_content", "medis/rawat_jalan/add.html");
         }

          $this->smarty->assign("rs_dokter_sp", $this->m_cppt->get_dokter_sp(array($FS_KD_REG)));

        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // $this->smarty->load_style("jquery.ui/boostrap/css/bootstrap.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $FS_KD_REG2 = $FS_KD_REG2;
        $FS_KD_REG = $FS_KD_REG;
        $FS_MR = $this->m_rawat_jalan->get_rm_px_by_rg(array($FS_KD_REG));

        $this->smarty->assign("FS_KD_REG2", $FS_KD_REG2);
        $this->smarty->assign("FS_KD_REG", $FS_KD_REG);
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG)));  

        // var_dump($this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG)));
        // die;
        

        $this->smarty->assign("icd", $this->m_igd->get_icd());  

        $this->smarty->assign("result3", $this->m_rawat_jalan_nurse->get_px_by_dokter_by_rg2(array($FS_KD_REG)));
         $this->smarty->assign("username", $this->com_user['user_name']);
 
      

        $this->smarty->assign("rs_resep", $this->m_rawat_jalan->get_data_terapi_last(array($FS_MR['NO_MR'])));
        
        $this->smarty->assign("last", $this->m_rawat_jalan->las_rj(array($x, $FS_MR['NO_MR'])));
        $this->smarty->assign("vs", $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("rs_lab", $this->m_rawat_jalan->get_data_lab_by_rg(array($FS_KD_REG)));
        
        // $this->smarty->assign("kp", $this->m_rawat_jalan->get_data_medis_by_rg(array($FS_KD_REG)));
        // $this->smarty->assign("kp2", $this->m_rawat_jalan->get_data_medis_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("ases", $this->m_rawat_jalan->get_data_ases2_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("ases2", $this->m_rawat_jalan->get_data_ases2_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("terapi", $this->m_rawat_jalan->get_data_terapi_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("alergi", $this->m_rawat_jalan->get_data_alergi_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("nutrisi", $this->m_rawat_jalan->get_data_nutrisi_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("nyeri", $this->m_rawat_jalan->get_data_nyeri_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("masalah", $this->m_rawat_jalan->get_data_masalah_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("masalah2", $this->m_rawat_jalan->get_data_masalah_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("cek_ases_kebid", $this->m_rawat_jalan->cek_data_ases_kebid_by_rg(array($FS_KD_REG)));
        // $this->smarty->assign("ases_kebid", $this->m_rawat_jalan->get_data_ases_kebid_by_rg(array($FS_KD_REG)));
        if($x=='140'){
            $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_px_history_dokter_toumi(array($now, $medis, $FS_MR['NO_MR'])));
        
        }
        else {
            $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_px_history_dokter2(array($now, $medis, $FS_MR['NO_MR'])));

        }
    
        
                   $this->smarty->assign("ases2", $this->m_rawat_jalan->get_data_ases2_by_rg(array($FS_KD_REG)));
       
        $this->smarty->assign("rs_skdp_alasan", $this->m_rawat_jalan->get_tac_com_parameter_alasan());

        //$this->smarty->assign("rs_pasien_inap", $this->m_rawat_jalan->get_px_rawat_inap(array($FS_MR['NOPASIEN'])));
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }



      public function add_processx() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
        //$this->tnotification->set_rules('FS_KD_LAYANAN', 'LAYANAN', 'trim|required');
        $this->tnotification->set_rules('FS_KD_PETUGAS_MEDIS', 'DOKTER', 'trim|required');
        // process
           $terapi1=$this->input->post('FS_TERAPI');
        $terapi2=$this->input->post('FS_TERAPI2'); 
       

              $jumlahkartakter2=strlen($terapi2);
            if($jumlahkartakter2>8){
                    $terapinya=$terapi1." ".$terapi2;
            }
            else{
                $terapinya=$terapi1;
            }

        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                '',
                $this->input->post('FS_KD_REG'),
                $this->input->post('FS_DIAGNOSA'),
                $this->input->post('FS_ANAMNESA'),
                $this->input->post('FS_TINDAKAN'),
                $terapinya,
                $this->input->post('FS_CATATAN_FISIK'),
                $this->com_user['user_name'],
                $this->input->post('FS_CARA_PULANG'),
                $this->input->post('FS_DAFTAR_MASALAH'),
                $this->input->post('FS_PLANNING'), 
                $this->input->post('FS_OBAT_PROLANIS'),
                $this->com_user['user_id'],
                date('Y-m-d'),
                date('H:i:s'),
                $this->input->post('FS_EKG'),
                $this->input->post('FS_USG'),
                  $this->input->post('FS_RIW_PENYAKIT_DAHULU'),
                $this->input->post('FS_RIW_PENYAKIT_DAHULU2'),
                $this->input->post('FS_ALERGI'),
                $this->input->post('FS_REAK_ALERGI'),
                $this->input->post('FS_STATUS_PSIK'),
                $this->input->post('FS_HUB_KELUARGA'),
                $this->input->post('KONJUNGTIVA'),
                $this->input->post('DEVIASI'),
                $this->input->post('SKELERA'),
                $this->input->post('JVP'),
                $this->input->post('BIBIR'),
                $this->input->post('MUKOSA'),
                $this->input->post('THORAX'),
                $this->input->post('JANTUNG'),
                $this->input->post('ABDOMEN'),
                $this->input->post('PINGGANG['),
                $this->input->post('EKS_ATAS'),
                $this->input->post('EKS_BAWAH'),

                $this->input->post('DPJP_UTAMA'),
                $this->input->post('DPJP_I'),
                $this->input->post('DPJP_II'),
                $this->input->post('DPJP_III'),
                $this->input->post('KONSUL_DPJP_UTAMA'),
                $this->input->post('KONSUL_DPJP_I'),
                $this->input->post('KONSUL_DPJP_II'),
                $this->input->post('KONSUL_DPJP_III'),
            );  
            
            if ($this->m_rawat_jalan->insert_tac_rj_medis_x($params)) { 

                $cekskdp = $this->m_rawat_jalan->get_cek_skdp(array($this->input->post('FS_KD_REG'))); 
               
                $FS_KD_TRS = $this->m_rawat_jalan->get_last_inserted_id();
                $this->m_rawat_jalan->update_level_medis(array('2', $this->input->post('FS_KD_REG')));
                $params8 = array(
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
                        $this->m_rawat_jalan->insert_pemeriksaan_lab(array($key, $value,$this->input->post('FS_KD_REG')));
                    }
                }
            
                //insert pemeriksaan radiologi
                $rad = $this->input->post('tembusan');
                $fs_bagian = $this->input->post('FS_BAGIAN');
                if (!empty($rad)) {
                    foreach ($rad as $key => $value) {
                        $this->m_rawat_jalan->insert_pemeriksaan_rad(array($key, $value, $this->input->post('FS_KD_REG'),$fs_bagian));
                    }
                }
                // notification
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            }




             else {
                // default error
                $this->tnotification->sent_notification("error", "Detail gagal disimpan");
            }
        } else { 
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }


         $cekasesinapmedis = $this->m_rawat_jalan->get_cek_ases_inap_medis(array($this->input->post('FS_KD_REG')));

        // default redirect
        if ($this->input->post('FS_CARA_PULANG') == '2') {
            if ($cekskdp >= '1') {
                redirect("medis/rawat_jalan/edit_skdp/" . $this->input->post('FS_KD_REG')); 
            } elseif ($this->input->post('FS_CARA_PULANG') == '2' && $cekskdp == '0') {
                redirect("medis/rawat_jalan/add_skdp/" . $this->input->post('FS_KD_REG'));
            } else {
                redirect("medis/rawat_jalan/cetak/" . $this->input->post('FS_KD_REG') . '/' . $FS_KD_TRS);
            }
       /*} elseif ($this->input->post('FS_CARA_PULANG') == '3') {
             if ($cekasesinapmedis >= '1') {
                redirect("medis/rawat_inap/edit_rj/" . $this->input->post('FS_KD_REG'));
            } elseif ($this->input->post('FS_CARA_PULANG') == '3' && $cekasesinapmedis == '0') {
                redirect("medis/rawat_inap/add_rj/" . $this->input->post('FS_KD_REG'));
            } else {
                redirect("medis/rawat_jalan/cetak/" . $this->input->post('FS_KD_REG') . '/' . $FS_KD_TRS);
            }*/
        } 
  
           elseif ($this->input->post('FS_CARA_PULANG') == '3') {
             if ($cekasesinapmedis >= '1') { 
                redirect("medis/asesmenawal/create/" . $this->input->post('FS_KD_REG'));
            } elseif ($this->input->post('FS_CARA_PULANG') == '3' && $cekasesinapmedis == '0') {
                redirect("medis/asesmenawal/create/" . $this->input->post('FS_KD_REG').'/'. $this->input->post('FS_KD_TRS'));
            } else { 
                redirect("medis/rawat_jalan/cetak/" . $this->input->post('FS_KD_REG') . '/' . $FS_KD_TRS);
            }
        }  
        elseif ($this->input->post('FS_CARA_PULANG') == '4') {
            redirect("medis/rawat_jalan/add_rujuk/" . $this->input->post('FS_KD_REG'));
        } elseif ($this->input->post('FS_CARA_PULANG') == '7') {
            // redirect("medis/rawat_jalan/");
                // redirect("medis/rawat_jalan/add_prb/" . $this->input->post('FS_KD_REG'));
                redirect("medis/rawat_jalan/add_faskes/" . $this->input->post('FS_KD_REG'));

        } 
         elseif ($this->input->post('FS_CARA_PULANG') == '6') {
            redirect("medis/rawat_jalan/add_rujuk_internal/" . $this->input->post('FS_KD_REG'));     
        }

         else {
           
          redirect("medis/rawat_jalan/cetak/" . $this->input->post('FS_KD_REG') . '/' .$FS_KD_TRS);
        // else {
        //      redirect("medis/rawat_jalan/cetak/" . $this->input->post('FS_KD_REG') . '/' . $FS_KD_TRS);
        // }
      }
    }




    public function add_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
        //$this->tnotification->set_rules('FS_KD_LAYANAN', 'LAYANAN', 'trim|required');
        $this->tnotification->set_rules('FS_KD_PETUGAS_MEDIS', 'DOKTER', 'trim|required');
        // process
           $terapi1=$this->input->post('FS_TERAPI');
        $terapi2=$this->input->post('FS_TERAPI2');
        // if(substr($terapi2, -2)=='/R'){
        //     $terapi2='';
        // }
        // else{
        //     $terapi2=$terapi2;
        // }
        if($this->input->post('FS_CARA_PULANG')==2){
                 $no_skdp = $this->m_rawat_jalan->get_no_skdp(array(date('m'),date('Y')));
            if (is_null($no_skdp['NOSKDP'])) {
                $no_skdp['NOSKDP'] = '0';
            }
            $SKDP = $no_skdp['NOSKDP'] + 1;
            $skdp = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('FS_SKDP_1'),
                $this->input->post('FS_SKDP_2'),
                $this->input->post('FS_SKDP_KET'),
                $this->input->post('FS_SKDP_KONTROL'),
                $SKDP,
                $this->com_user['user_name'],
                date('Y-m-d'),
                date('H:i:s'),
                $this->input->post('FS_SKDP_FASKES'),                
                $this->input->post('FS_PESAN'),              
                $this->input->post('FS_RENCANA_KONTROL')             
            ); 
            $this->m_rawat_jalan->insert_tac_rj_skdp($skdp);
        } else if($this->input->post('FS_CARA_PULANG')==8){
        
            if($this->input->post('CATATAN_PRB')!=null){
             
                $catatan_prb = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('CATATAN_PRB'),
                    $this->com_user['user_name'],
                    date('Y-m-d H:i:s'),
                    $this->com_user['user_name'],
                    date('Y-m-d H:i:s'),           
                ); 
                $this->m_rawat_jalan->insert_tac_rj_catatan_prb($catatan_prb);
            }


        }
   

              $jumlahkartakter2=strlen($terapi2);
            if($jumlahkartakter2>10){
                    $terapinya=$terapi1." ".$terapi2;
            }
            else{
                $terapinya=$terapi1;
            }

        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                '',
                $this->input->post('FS_KD_REG'),
                $this->input->post('FS_DIAGNOSA'),
                $this->input->post('FS_ANAMNESA'),
                $this->input->post('FS_TINDAKAN'),
                $terapinya,
                $this->input->post('FS_CATATAN_FISIK'),
                $this->com_user['user_name'],
                $this->input->post('FS_CARA_PULANG'),
                $this->input->post('FS_DAFTAR_MASALAH'),
                $this->input->post('FS_PLANNING'), 
                $this->input->post('FS_OBAT_PROLANIS'),
                $this->com_user['user_id'],
                date('Y-m-d'),
                date('H:i:s'),
                $this->input->post('FS_EKG'),
                $this->input->post('FS_USG'),
                $this->input->post('HASIL_ECHO'),
                $this->input->post('HASIL_EKG'),
                $this->input->post('HASIL_TREADMILL'),
                $this->input->post('FS_DIAGNOSA_SEKUNDER')
            ); 
            
            if ($this->m_rawat_jalan->insert_tac_rj_medis($params)) { 

                $cekskdp = $this->m_rawat_jalan->get_cek_skdp(array($this->input->post('FS_KD_REG'))); 
               
                $FS_KD_TRS = $this->m_rawat_jalan->get_last_inserted_id();
                $this->m_rawat_jalan->update_level_medis(array('2', $this->input->post('FS_KD_REG')));
                $params8 = array(
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
                //   var_dump($lab);
                // die;
                if (!empty($lab)) {
                    foreach ($lab as $key => $value) {
                        $this->m_rawat_jalan->insert_pemeriksaan_lab(array($key, $value,$this->input->post('FS_KD_REG')));
                    }
                }
            
                //insert pemeriksaan radiologi
                $rad = $this->input->post('tembusan');
                $fs_bagian = $this->input->post('FS_BAGIAN');
                if (!empty($rad)) {
                    foreach ($rad as $key => $value) {
                        $this->m_rawat_jalan->insert_pemeriksaan_rad(array($key, $value, $this->input->post('FS_KD_REG'),$fs_bagian));
                    }
                }
                // notification
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            }




             else {
                // default error
                $this->tnotification->sent_notification("error", "Detail gagal disimpan");
            }
        } else { 
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }


         $cekasesinapmedis = $this->m_rawat_jalan->get_cek_ases_inap_medis(array($this->input->post('FS_KD_REG')));

        // default redirect
    //     if ($this->input->post('FS_CARA_PULANG') == '2') {
    //         if ($cekskdp >= '1') {
    //             redirect("medis/rawat_jalan/edit_skdp/" . $this->input->post('FS_KD_REG')); 
    //         } elseif ($this->input->post('FS_CARA_PULANG') == '2' && $cekskdp == '0') {
    //             redirect("medis/rawat_jalan/add_skdp/" . $this->input->post('FS_KD_REG'));
    //         } else {
    //             redirect("medis/rawat_jalan/cetak/" . $this->input->post('FS_KD_REG') . '/' . $FS_KD_TRS);
    //         }
    //    /*} elseif ($this->input->post('FS_CARA_PULANG') == '3') {
    //          if ($cekasesinapmedis >= '1') {
    //             redirect("medis/rawat_inap/edit_rj/" . $this->input->post('FS_KD_REG'));
    //         } elseif ($this->input->post('FS_CARA_PULANG') == '3' && $cekasesinapmedis == '0') {
    //             redirect("medis/rawat_inap/add_rj/" . $this->input->post('FS_KD_REG'));
    //         } else {
    //             redirect("medis/rawat_jalan/cetak/" . $this->input->post('FS_KD_REG') . '/' . $FS_KD_TRS);
    //         }*/
    //     } 
 
           if ($this->input->post('FS_CARA_PULANG') == '3') {
             if ($cekasesinapmedis >= '1') { 
                redirect("medis/rawat_inap/edit/" . $this->input->post('FS_KD_REG'));
            } elseif ($this->input->post('FS_CARA_PULANG') == '3' && $cekasesinapmedis == '0') {
                redirect("medis/rawat_inap/addr/" . $this->input->post('FS_KD_REG').'/'. $FS_KD_TRS);
            } else {  
                redirect("medis/rawat_jalan/cetak/" . $this->input->post('FS_KD_REG') . '/' . $FS_KD_TRS);
            }
        } 
        elseif ($this->input->post('FS_CARA_PULANG') == '4') {
            redirect("medis/rawat_jalan/add_rujuk/" . $this->input->post('FS_KD_REG'));
        } elseif ($this->input->post('FS_CARA_PULANG') == '7') {
            // redirect("medis/rawat_jalan/");
                // redirect("medis/rawat_jalan/add_prb/" . $this->input->post('FS_KD_REG'));
                redirect("medis/rawat_jalan/add_faskes/" . $this->input->post('FS_KD_REG'));

        } 
         elseif ($this->input->post('FS_CARA_PULANG') == '6') {
            redirect("medis/rawat_jalan/add_rujuk_internal/" . $this->input->post('FS_KD_REG'));     
        }

         else {
           
          redirect("medis/rawat_jalan/cetak/" . $this->input->post('FS_KD_REG') . '/' .$FS_KD_TRS);
        // else {
        //      redirect("medis/rawat_jalan/cetak/" . $this->input->post('FS_KD_REG') . '/' . $FS_KD_TRS);
        // }
      }
    }

       public function editranap($FS_KD_REG = "", $FS_KD_TRS = "") {
          $cekasesinapmedis = $this->m_rawat_jalan->get_cek_ases_inap_medis(array($FS_KD_REG));
            if ($cekasesinapmedis >= '1') { 
                redirect("medis/rawat_inap/edit/" . $FS_KD_REG);
            } elseif ($cekasesinapmedis == '0') {
                redirect("medis/rawat_inap/addr/" . $FS_KD_REG.'/'. $FS_KD_TRS);
            } 
      }



      public function isiskdp($FS_KD_REG = "", $FS_KD_TRS = "") {
         $cekskdp = $this->m_rawat_jalan->get_cek_skdp(array($FS_KD_REG));
          if ($cekskdp >= '1') {
                redirect("medis/rawat_jalan/edit_skdp/" . $FS_KD_REG);
            } else {
                redirect("medis/rawat_jalan/add_skdp/" . $FS_KD_REG);
            }
      }

      public function lihat_cppt($FS_KD_REG = "", $FS_KD_REG2 = "", $FS_REG_INAP = ""){
        $this->_set_page_rule("C");

        
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        
        $this->smarty->assign("template_content", "medis/rawat_jalan/lihat_cppt.html"); 
        $now = date('Y-m-d');
        $FS_MR = $this->m_rawat_jalan->get_rm_px_by_rg(array($FS_KD_REG));

                  $tgl_sekarang =strtotime(date('Y-m-d'));
           $tgl_kemarin =date('Y-m-d', strtotime("-1 day", $tgl_sekarang));

         $this->smarty->assign("tgl_kemarin", $tgl_kemarin);
        $this->smarty->assign("resep_history",$this->m_rawat_jalan->get_data_terapi_by_rg(array($FS_KD_REG)));
         $this->smarty->assign("rs_cppt", $this->m_cppt->get_cppt_by_rg($FS_KD_REG));
        $this->smarty->assign("rs_resep", $this->m_cppt->get_resep());
        $tgl=date('Y-m-d');

        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);
        $this->smarty->assign("rs_lab", $this->m_rawat_jalan->get_data_lab_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("FS_KD_REG2", $FS_KD_REG2);
        $this->smarty->assign("FS_KD_REG", $FS_KD_REG);
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG)));  

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
      }

    public function edit($FS_KD_REG = "", $FS_KD_TRS = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content

          $x = $this->com_user['user_name'];
          if($x=='216'|| $x=='217' || $x=='211' || $x=='215'  || $x=='203' || $x=='206'  || $x=='211' || $x=='207' || $x=='209' || $x=='213'|| $x=='202' || $x=='219' || $x=='220' || $x=='221' || $x=='312' || $x=='222' || $x=='223' || $x=='208' ||  $x=='224' ||  $x=='225' || $x=='226' || $x=='227' || $x=='229'){
            $this->smarty->assign("template_content", "medis/rawat_jalan/editx.html");

         }
         else{ 
        $this->smarty->assign("template_content", "medis/rawat_jalan/edit.html"); 
        }

          $this->smarty->assign("rs_dokter_sp", $this->m_cppt->get_dokter_sp(array($FS_KD_REG)));

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
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG)));

                    $this->smarty->assign("result3", $this->m_rawat_jalan->get_data_medis_by_rg23(array($FS_KD_REG)));

        $this->smarty->assign("result4", $this->m_rawat_jalan_nurse->get_px_by_dokter_by_rg2(array($FS_KD_REG)));
         $this->smarty->assign("username", $this->com_user['user_name']);
         $this->smarty->assign("icd", $this->m_igd->get_icd());  
         $this->smarty->assign("rs_skdp_alasan", $this->m_rawat_jalan->get_tac_com_parameter_alasan());
        $this->smarty->assign("rs_lab", $this->m_rawat_jalan->get_data_lab_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("skdp", $this->m_rawat_jalan->get_cek_skdp2(array($FS_KD_REG)));
        $this->smarty->assign("medis", $this->m_rawat_jalan->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS)));
        // $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_px_resume2(array($FS_MR['NO_MR'])));
        $this->smarty->assign("cekradionya", $this->m_rawat_jalan->get_cek_radnya(array($FS_KD_REG)));
        $this->smarty->assign("ases2", $this->m_rawat_jalan->get_data_ases2_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("catatan_prb", $this->m_rawat_jalan->get_catatan_prb(array($FS_KD_REG)));
        $this->smarty->assign("alasan_skdp", $this->m_rawat_jalan->get_alasan_skdp());
        $this->smarty->assign("rencana_skdp", $this->m_rawat_jalan->get_rencana_skdp2());
        $tujuan = $this->m_rawat_jalan->list_pemeriksaan_lab_by_rg($FS_KD_REG);
        $tujuan_str = "";
        foreach ($tujuan as $key => $value) {
            $tujuan_str .= "'" . $value['id'] . "',";
        }
        $this->smarty->assign('rs_tujuan', $tujuan_str);

        $tembusan = $this->m_rawat_jalan->list_pemeriksaan_rad_by_rg($FS_KD_REG);
        $tembusan_str = "";
        foreach ($tembusan as $key => $value) { 
            $tembusan_str .= "'" . $value['NO_RINCI'] . "',";
        }
        $this->smarty->assign('rs_tembusan', $tembusan_str);
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    } 


    public function edit_copy2($FS_KD_REG = "", $FS_KD_REG2 = ""){
        $this->_set_page_rule("R");
        $this->tnotification->sent_notification("error", "Rekam Medis Tidak Di inputkan Pada EMR");
         redirect("medis/rawat_jalan/add/" . $FS_KD_REG . '/' . $FS_KD_REG2);

    }


    public function edit_copy($FS_KD_REG = "", $FS_KD_TRS = "", $FS_KD_REG2 = "") {
// set page rules
        $this->_set_page_rule("R");

        // var_dump($FS_KD_REG2);
        // die;
            
          $x = $this->com_user['user_name'];
         if($x=='216'|| $x=='217' || $x=='211'  || $x=='203' || $x=='206'  || $x=='211' || $x=='207' || $x=='209' || $x=='215'|| $x=='213'|| $x=='202'  || $x=='219' || $x=='220' || $x=='221' || $x=='312' || $x=='222' || $x=='223' || $x=='208' ||  $x=='224' ||  $x=='225' || $x=='227'){
            $this->smarty->assign("template_content", "medis/rawat_jalan/editx.html");

         }
         else{ 
        $this->smarty->assign("template_content", "medis/rawat_jalan/edit_copy_dokter.html"); }

          $this->smarty->assign("rs_dokter_sp", $this->m_cppt->get_dokter_sp(array($FS_KD_REG)));
          $this->smarty->assign("FS_KD_REG2", $FS_KD_REG2);

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
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG)));

                    $this->smarty->assign("result3", $this->m_rawat_jalan->get_data_medis_by_rg23(array($FS_KD_REG)));

        $this->smarty->assign("result4", $this->m_rawat_jalan_nurse->get_px_by_dokter_by_rg2(array($FS_KD_REG)));
         $this->smarty->assign("username", $this->com_user['user_name']);
          $this->smarty->assign("ases", $this->m_rawat_jalan->get_data_ases2_by_rg(array($FS_KD_REG2)));
         $this->smarty->assign("icd", $this->m_igd->get_icd());  
         $this->smarty->assign("vs", $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG2)));
         $this->smarty->assign("nyeri", $this->m_rawat_jalan->get_data_nyeri_by_rg(array($FS_KD_REG)));
         $this->smarty->assign("nutrisi", $this->m_rawat_jalan->get_data_nutrisi_by_rg(array($FS_KD_REG2)));
        $this->smarty->assign("alergi", $this->m_rawat_jalan->get_data_alergi_by_rg(array($FS_KD_REG2)));
        $this->smarty->assign("rs_lab", $this->m_rawat_jalan->get_data_lab_by_rg(array($FS_KD_REG2)));
        $this->smarty->assign("rs_lab_lalu", $this->m_rawat_jalan->get_data_lab_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("rs_skdp_alasan", $this->m_rawat_jalan->get_tac_com_parameter_alasan());
        // $this->smarty->assign("medis_fisik", $this->m_rawat_jalan->get_data_medis_by_rg22(array($FS_KD_TRS, $FS_KD_REG2)));
        $this->smarty->assign("medis", $this->m_rawat_jalan->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS)));
        // $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_px_resume2(array($FS_MR['NO_MR'])));
        $this->smarty->assign("cekradionya", $this->m_rawat_jalan->get_cek_radnya(array($FS_KD_REG)));
        $this->smarty->assign("ases2", $this->m_rawat_jalan->get_data_ases2_by_rg(array($FS_KD_REG2)));
         $this->smarty->assign("skdp", $this->m_rawat_jalan->get_cek_skdp2(array($FS_KD_REG2)));
        $tujuan = $this->m_rawat_jalan->list_pemeriksaan_lab_by_rg($FS_KD_REG);
        
        $tujuan_str = "";
        foreach ($tujuan as $key => $value) {
            $tujuan_str .= "'" . $value['id'] . "',";
        }
        $this->smarty->assign('rs_tujuan', $tujuan_str);

        $tembusan = $this->m_rawat_jalan->list_pemeriksaan_rad_by_rg($FS_KD_REG);
        $tembusan_str = "";
        foreach ($tembusan as $key => $value) { 
            $tembusan_str .= "'" . $value['NO_RINCI'] . "',";
        }
        $this->smarty->assign('rs_tembusan', $tembusan_str);
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
        
    

    } 

      public function resepmasuk() { 
        // set page rules
                $this->_set_page_rule("R");
        // set template content
                $this->smarty->assign("template_content", "medis/rawat_jalan/resepmasuk.html");
                $this->smarty->load_javascript('resource/js/jquery.datatables/jquery.dataTables.js');
                $this->smarty->load_javascript('resource/js/jquery.datatables/dataTables.fixedHeader.js');
                $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
                $this->smarty->load_style("jquery.ui/datatables/jquery.dataTables.css");
                $this->smarty->load_javascript('resource/js/jquery/jquery-ui-1.9.2.custom.min.js');
                $this->smarty->assign("now", $now);
                $this->smarty->assign("listresep", $this->m_rawat_jalan->list_resep_masuk());
          
                   parent::display();
            } 

      public function resepmasukigd() { 
        // set page rules
                $this->_set_page_rule("R");
        // set template content
                $this->smarty->assign("template_content", "medis/rawat_jalan/resepmasukigd.html");
                $this->smarty->load_javascript('resource/js/jquery.datatables/jquery.dataTables.js');
                $this->smarty->load_javascript('resource/js/jquery.datatables/dataTables.fixedHeader.js');
                $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
                $this->smarty->load_style("jquery.ui/datatables/jquery.dataTables.css");
                $this->smarty->load_javascript('resource/js/jquery/jquery-ui-1.9.2.custom.min.js');
                $this->smarty->assign("now", $now);
                $this->smarty->assign("listresep", $this->m_rawat_jalan->list_resep_masuk_igd());
                
        
                   parent::display();
            } 

 




//     public function edit_process() {
//         // set page rules
//         $this->_set_page_rule("C");
//         // cek input
//         $this->tnotification->set_rules('FS_KD_REG', 'KODE TRANSAKSI', 'trim|required');
//         $this->tnotification->set_rules('FS_KD_LAYANAN', 'LAYANAN', 'trim|required');
//         $this->tnotification->set_rules('FS_KD_PETUGAS_MEDIS', 'DOKTER', 'trim|required');
//         $this->tnotification->set_rules('FS_KD_TRS', 'KODE TRANSAKSI', 'trim|required');
//         // process

//            $terapi1=$this->input->post('FS_TERAPI');
//         $terapi2=$this->input->post('FS_TERAPI2');
//         //    if(substr($terapi2, -2)=='/R'){
//         //     $terapi2='';
//         // }
//         // else{
//         //     $terapi2=$terapi2;
//         // }


//               $jumlahkartakter2=strlen($terapi2);
//             if($jumlahkartakter2>10){
//                     $terapinya=$terapi1." ".$terapi2;
//             }
//             else{
//                 $terapinya=$terapi1;
//             }

//         if ($this->tnotification->run() !== FALSE) {
//             $params = array(
//               $this->input->post('FS_DIAGNOSA'),
//               $this->input->post('FS_ANAMNESA'),
//               $this->input->post('FS_TINDAKAN'),
//                $terapinya,
//               $this->input->post('FS_CATATAN_FISIK'),
//               $this->input->post('FS_CARA_PULANG'),
//               $this->input->post('FS_DAFTAR_MASALAH'),
//               '',
//               $this->com_user['user_id'],
//               date('Y-m-d'),
//                 $this->input->post('FS_EKG'),
//                 $this->input->post('FS_USG'),
//               $this->input->post('FS_KD_TRS')
//           );
//             /**$params = array(
//                 'dx :' . strip_tags($this->input->post('FS_DIAGNOSA')) . ' , ' . strip_tags($this->input->post('FS_ANAMNESA')),
//                 strip_tags($this->input->post('FS_DIAGNOSA')),
//                 strip_tags($this->input->post('FS_TINDAKAN')) . ' , ' . strip_tags($this->input->post('FS_TERAPI')),
//                 strip_tags($this->input->post('FS_CATATAN_FISIK')),
//                 'RJ',
//                 '2',
//                 $this->input->post('FS_KD_KP')
//             );*/
//             // insert
//             //if ($this->m_rawat_jalan->update_medis($params)) {
//             if ($this->m_rawat_jalan->update_tac_rj_medis($params)) {
//                 //$this->m_rawat_jalan->update_level_medis(array('2', $this->input->post('FS_KD_REG')));
//                 $cekskdp = $this->m_rawat_jalan->get_cek_skdp(array($this->input->post('FS_KD_REG')));
//                 $cekrjrs = $this->m_rawat_jalan->get_cek_rjrs(array($this->input->post('FS_KD_REG')));
//                  $cekprb = $this->m_rawat_jalan->get_cek_prb(array($this->input->post('FS_KD_REG')));
//                  $cekkonsul = $this->m_rawat_jalan->get_cek_konsul(array($this->input->post('FS_KD_REG')));
//                  $cekradionya = $this->m_rawat_jalan->get_cek_radnya(array($this->input->post('FS_KD_REG')));
               
//                 $cekasesinapmedis = $this->m_rawat_jalan->get_cek_ases_inap_medis(array($this->input->post('FS_KD_REG')));
//                 /*$params2 = array(
//                     $this->input->post('FS_DIAGNOSA'),
//                     $this->input->post('FS_ANAMNESA'),
//                     $this->input->post('FS_TINDAKAN'),
//                     $this->input->post('FS_TERAPI'),
//                     $this->input->post('FS_CATATAN_FISIK'),
//                     $this->input->post('FS_CARA_PULANG'),
//                     $this->input->post('FS_DAFTAR_MASALAH'),
//                     $this->input->post('FS_OBAT_PROLANIS'),
//                     $this->com_user['user_id'],
//                     date('Y-m-d'),
//                     $this->input->post('FS_KD_TRS')
//                 );
//                 $this->m_rawat_jalan->update_tac_rj_medis($params2);*/
//                 $params8 = array(
//                     $this->input->post('FS_HIGH_RISK'),
//                     $this->input->post('FS_MR')
//                 );
//                 $this->m_rawat_jalan->update_high_risk2($params8);

//                 $lab = $this->input->post('tujuan');
//                 $this->m_rawat_jalan->delete_pemeriksaan_lab($this->input->post('FS_KD_REG'));
//                 if (!empty($lab)) {
//                     foreach ($lab as $key => $value) {
//                         $this->m_rawat_jalan->insert_pemeriksaan_lab(array($key, $value,$this->input->post('FS_KD_REG')));
//                     }
//                 }
//                 $rad = $this->input->post('tembusan');
//                 $this->m_rawat_jalan->delete_pemeriksaan_rad($this->input->post('FS_KD_REG'));
//                 $fs_bagian = $this->input->post('FS_BAGIAN');
//                 if (!empty($rad)) {

//                     foreach ($rad as $key => $value) {
 
//                             $this->m_rawat_jalan->insert_pemeriksaan_rad(array($key, $value, $this->input->post('FS_KD_REG'),$fs_bagian));
                        


                       
//                     }
//                 }


//                 // notification
//                 $this->tnotification->delete_last_field();
//                     $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
//                 } else {
//                     // default error
//                     $this->tnotification->sent_notification("error", "Detail gagal disimpan");
//                 }
//             } else {
//                 // default error
//                 $this->tnotification->sent_notification("error", "Detail gagal disimpan");
//             }



               


//                 // default redirect
//                 if ($this->input->post('FS_CARA_PULANG') == '2') {
//                     if ($cekskdp >= '1') {
//                         redirect("medis/rawat_jalan/edit_skdp/" . $this->input->post('FS_KD_REG'));
//                     } elseif ($this->input->post('FS_CARA_PULANG') == '2' && $cekskdp == '0') {
//                         redirect("medis/rawat_jalan/add_skdp/" . $this->input->post('FS_KD_REG'));
//                     } else {
//                         redirect("medis/rawat_jalan/cetak/" . $this->input->post('FS_KD_REG') . '/' . $this->input->post('FS_KD_TRS'));
//                     }
//                 }


//          elseif ($this->input->post('FS_CARA_PULANG') == '7') {
//                      if ($cekprb >= '1') {
//                         redirect("medis/rawat_jalan/edit_prb/" . $this->input->post('FS_KD_REG'));
//                     } elseif ($this->input->post('FS_CARA_PULANG') == '7' && $cekprb == '0') {
//                         redirect("medis/rawat_jalan/add_prb/" . $this->input->post('FS_KD_REG'));
//                     } 
//                     // else{
//                     //       redirect("medis/rawat_jalan/cetak/" . $this->input->post('FS_KD_REG') . '/' .$this->input->post('FS_KD_TRS'));
//                     // }
//                 }


// // elseif ($this->input->post('FS_CARA_PULANG') == '8') {
// //              if ($cekprb >= '1') {
// //                 redirect("medis/rawat_jalan/edit_prb/" . $this->input->post('FS_KD_REG'));
// //             } elseif ($this->input->post('FS_CARA_PULANG') == '8' && $cekprb == '0') {
// //                 redirect("medis/rawat_jalan/add_prb/" . $this->input->post('FS_KD_REG'));
// //             } 
// //             // else{
// //             //       redirect("medis/rawat_jalan/cetak/" . $this->input->post('FS_KD_REG') . '/' .$this->input->post('FS_KD_TRS'));
// //             // }
// //         }

//          elseif ($this->input->post('FS_CARA_PULANG') == '3') {
//              if ($cekasesinapmedis >= '1') { 
//                 redirect("medis/rawat_inap/edit/" . $this->input->post('FS_KD_REG'));
//             } elseif ($this->input->post('FS_CARA_PULANG') == '3' && $cekasesinapmedis == '0') {
//                 redirect("medis/rawat_inap/addr/" . $this->input->post('FS_KD_REG').'/'. $this->input->post('FS_KD_TRS'));
//             } else { 
//                 redirect("medis/rawat_jalan/cetak/" . $this->input->post('FS_KD_REG') . '/' . $FS_KD_TRS);
//             }
//         } 


//         elseif ($this->input->post('FS_CARA_PULANG') == '4') { 

//              if ($cekrjrs >= '1') {
//                 redirect("medis/rawat_jalan/edit_rujuk/" . $this->input->post('FS_KD_REG'));
//             } elseif ($this->input->post('FS_CARA_PULANG') == '4' && $cekrjrs == '0') {
//                redirect("medis/rawat_jalan/add_rujuk/" . $this->input->post('FS_KD_REG'));
//             }

           
//         } elseif ($this->input->post('FS_CARA_PULANG') == '6') {
//              if ($cekkonsul >= '1') {
//                 redirect("medis/rawat_jalan/edit_rujuk_internal/" . $this->input->post('FS_KD_REG'));
//             } else{
//                 redirect("medis/rawat_jalan/add_rujuk_internal/" . $this->input->post('FS_KD_REG'));
//             }   
//         } else {
//             redirect("medis/rawat_jalan/cetak/" . $this->input->post('FS_KD_REG') . '/' .$this->input->post('FS_KD_TRS'));
//         }
//     }






    public function edit_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE TRANSAKSI', 'trim|required');
        $this->tnotification->set_rules('FS_KD_LAYANAN', 'LAYANAN', 'trim|required');
        $this->tnotification->set_rules('FS_KD_PETUGAS_MEDIS', 'DOKTER', 'trim|required');
        $this->tnotification->set_rules('FS_KD_TRS', 'KODE TRANSAKSI', 'trim|required');

        
        // process

           $terapi1=$this->input->post('FS_TERAPI');
        $terapi2=$this->input->post('FS_TERAPI2');
        
              $jumlahkartakter2=strlen($terapi2);
            if($jumlahkartakter2>10){
                    $terapinya=$terapi1." ".$terapi2;
            }
            else{
                $terapinya=$terapi1;
            }



            $terapi1_0 =$this->input->post('FS_TERAPI_0');
            $terapi2_0 =$this->input->post('FS_TERAPI2_0');
           
                  $jumlahkartakter2_0=strlen($terapi2_0);
                if($jumlahkartakter2_0>10){
                        $terapinya_0=$terapi1_0." ".$terapi2_0;
                }
                else{
                    $terapinya_0=$terapi1_0;
                }

        if ($this->tnotification->run() !== FALSE) {
            $params = array(
              $this->input->post('FS_DIAGNOSA'),
              $this->input->post('FS_ANAMNESA'),
              $this->input->post('FS_TINDAKAN'),
               $terapinya,
              $this->input->post('FS_CATATAN_FISIK'),
              $this->input->post('FS_CARA_PULANG'),
              $this->input->post('FS_DAFTAR_MASALAH'),
              '',
              $this->com_user['user_id'],
              date('Y-m-d'),
                $this->input->post('FS_EKG'),
                $this->input->post('FS_USG'),
                $this->input->post('HASIL_ECHO'),
                $this->input->post('HASIL_EKG'),
                $this->input->post('HASIL_TREADMILL'),
                $this->input->post('FS_DIAGNOSA_SEKUNDER'),
              $this->input->post('FS_KD_TRS')
          );

        // //   var_dump($params);
        //   die;
             
            if ($this->m_rawat_jalan->update_tac_rj_medis($params)) {



                $riwayat = array (
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FS_DIAGNOSA_0'),
                    $this->input->post('FS_ANAMNESA_0'),
                    $this->input->post('FS_TINDAKAN_0'),
                     $terapinya_0,
                    $this->input->post('FS_CATATAN_FISIK_0'),
                    $this->input->post('FS_CARA_PULANG_0'),
                    $this->input->post('FS_DAFTAR_MASALAH_0'),  
                      $this->input->post('FS_EKG_0'),
                      $this->input->post('FS_USG_0'), 
                      $this->com_user['user_name'],
                                        date('Y-m-d'),
                );
                $this->m_rawat_jalan->insert_riwayat_dokter($riwayat);



                //$this->m_rawat_jalan->update_level_medis(array('2', $this->input->post('FS_KD_REG')));
                $cekskdp = $this->m_rawat_jalan->get_cek_skdp(array($this->input->post('FS_KD_REG')));
                $cekrjrs = $this->m_rawat_jalan->get_cek_rjrs(array($this->input->post('FS_KD_REG')));
                 $cekprb = $this->m_rawat_jalan->get_cek_prb(array($this->input->post('FS_KD_REG')));
                 $cekkonsul = $this->m_rawat_jalan->get_cek_konsul(array($this->input->post('FS_KD_REG')));
                 $cekradionya = $this->m_rawat_jalan->get_cek_radnya(array($this->input->post('FS_KD_REG')));
               
                $cekasesinapmedis = $this->m_rawat_jalan->get_cek_ases_inap_medis(array($this->input->post('FS_KD_REG')));
               
                if($this->input->post('FS_CARA_PULANG')==2){
                if($cekskdp >= '1'){
                    $params_skdp = array(
                        $this->input->post('FS_SKDP_1'),
                        $this->input->post('FS_SKDP_2'),
                        $this->input->post('FS_SKDP_KET'),
                        $this->input->post('FS_SKDP_KONTROL'),
                        $this->input->post('FS_KD_REG'),
                        $this->input->post('FS_SKDP_FASKES'),
                        $this->input->post('FS_PESAN'),
                        $this->input->post('FS_RENCANA_KONTROL'),
                        $this->input->post('FS_KD_REG'),

                        
                    );

                    $this->m_rawat_jalan->update_tac_rj_skdp($params_skdp);

                    // insert
                    //if ($this->m_rawat_jalan->update_medis($params_skdp)) {
                    // if ($this->m_rawat_jalan->update_tac_rj_skdp($params_skdp)) {

                    //     $lab = $this->input->post('tujuan');
                    //     $this->m_rawat_jalan->delete_pemeriksaan_lab_skdp($this->input->post('FS_KD_REG'));
                    //     if (!empty($lab)) {
                    //         foreach ($lab as $key => $value) {
                    //             $this->m_rawat_jalan->insert_pemeriksaan_lab_skdp(array($key, $value,$this->input->post('FS_KD_REG')));
                    //         }
                    //     }
                    //     $rad = $this->input->post('tembusan');
                    //     $this->m_rawat_jalan->delete_pemeriksaan_rad_skdp($this->input->post('FS_KD_REG'));
                    //     if (!empty($rad)) {
                    //         foreach ($rad as $key => $value) {
                    //             $this->m_rawat_jalan->insert_pemeriksaan_rad_skdp(array($key, $value, $this->input->post('FS_KD_REG')));
                    //         }
                    //     }
                    // }

                } else{
                    $no_skdp = $this->m_rawat_jalan->get_no_skdp(array(date('m'),date('Y')));
                    if (is_null($no_skdp['NOSKDP'])) {
                        $no_skdp['NOSKDP'] = '0';
                    }
                    $SKDP = $no_skdp['NOSKDP'] + 1;
                    $skdp = array(
                        $this->input->post('FS_KD_REG'),
                        $this->input->post('FS_SKDP_1'),
                        $this->input->post('FS_SKDP_2'),
                        $this->input->post('FS_SKDP_KET'),
                        $this->input->post('FS_SKDP_KONTROL'),
                        $SKDP,
                        $this->com_user['user_name'],
                        date('Y-m-d'),
                        date('H:i:s'),
                        $this->input->post('FS_SKDP_FASKES'),                
                        $this->input->post('FS_PESAN'),              
                        $this->input->post('FS_RENCANA_KONTROL')             
                    ); 
                    $this->m_rawat_jalan->insert_tac_rj_skdp($skdp);
                }
            }
            
            else if($this->input->post('FS_CARA_PULANG')==8){

                $cekcatatanprb = $this->m_rawat_jalan->cek_catatan_prb($this->input->post('FS_KD_REG'));
        
                if($this->input->post('CATATAN_PRB')!=null){

                    if($cekcatatanprb<1){
                        $catatan_prb = array(
                            $this->input->post('FS_KD_REG'),
                            $this->input->post('CATATAN_PRB'),
                            $this->com_user['user_name'],
                            date('Y-m-d H:i:s'),
                            $this->com_user['user_name'],
                            date('Y-m-d H:i:s'),           
                        ); 
                        $this->m_rawat_jalan->insert_tac_rj_catatan_prb($catatan_prb);
                    }
                    else{    
                        $catatan_prb = array(
                            $this->input->post('CATATAN_PRB'),
                            $this->com_user['user_name'],
                            date('Y-m-d H:i:s'),           
                            $this->input->post('FS_KD_REG'),
                        ); 
                        $this->m_rawat_jalan->update_tac_rj_catatan_prb($catatan_prb);
                    }
                }
            }

   


        
                $params8 = array(
                    $this->input->post('FS_HIGH_RISK'),
                    $this->input->post('FS_MR')
                );
                $this->m_rawat_jalan->update_high_risk2($params8);

                $lab = $this->input->post('tujuan');
                // var_dump($lab);
                // die;
                $this->m_rawat_jalan->delete_pemeriksaan_lab($this->input->post('FS_KD_REG'));
                if (!empty($lab)) {
                    foreach ($lab as $key => $value) {
                        $this->m_rawat_jalan->insert_pemeriksaan_lab(array($key, $value,$this->input->post('FS_KD_REG')));
                    }
                }
                $rad = $this->input->post('tembusan');
                $this->m_rawat_jalan->delete_pemeriksaan_rad($this->input->post('FS_KD_REG'));
                $fs_bagian = $this->input->post('FS_BAGIAN');
                if (!empty($rad)) {

                    foreach ($rad as $key => $value) { 
                            $this->m_rawat_jalan->insert_pemeriksaan_rad(array($key, $value, $this->input->post('FS_KD_REG'),$fs_bagian)); 
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
                // if ($this->input->post('FS_CARA_PULANG') == '2') {
                //     if ($cekskdp >= '1') {
                //         redirect("medis/rawat_jalan/edit_skdp/" . $this->input->post('FS_KD_REG'));
                //     } elseif ($this->input->post('FS_CARA_PULANG') == '2' && $cekskdp == '0') {
                //         redirect("medis/rawat_jalan/add_skdp/" . $this->input->post('FS_KD_REG'));
                //     } else {
                //         redirect("medis/rawat_jalan/cetak/" . $this->input->post('FS_KD_REG') . '/' . $this->input->post('FS_KD_TRS'));
                //     }
                // }


                 if ($this->input->post('FS_CARA_PULANG') == '7') {
                     if ($cekprb >= '1') {
                        redirect("medis/rawat_jalan/edit_prb/" . $this->input->post('FS_KD_REG'));
                    } elseif ($this->input->post('FS_CARA_PULANG') == '7' && $cekprb == '0') {
                        redirect("medis/rawat_jalan/add_prb/" . $this->input->post('FS_KD_REG'));
                    } 
                    // else{
                    //       redirect("medis/rawat_jalan/cetak/" . $this->input->post('FS_KD_REG') . '/' .$this->input->post('FS_KD_TRS'));
                    // }
                }

 

         elseif ($this->input->post('FS_CARA_PULANG') == '3') {
             if ($cekasesinapmedis >= '1') { 
                redirect("medis/rawat_inap/edit/" . $this->input->post('FS_KD_REG'));
            } elseif ($this->input->post('FS_CARA_PULANG') == '3' && $cekasesinapmedis == '0') {
                redirect("medis/rawat_inap/addr/" . $this->input->post('FS_KD_REG').'/'. $this->input->post('FS_KD_TRS'));
            } else { 
                redirect("medis/rawat_jalan/cetak/" . $this->input->post('FS_KD_REG') . '/' . $FS_KD_TRS);
            }
        } 


        elseif ($this->input->post('FS_CARA_PULANG') == '4') { 

             if ($cekrjrs >= '1') {
                redirect("medis/rawat_jalan/edit_rujuk/" . $this->input->post('FS_KD_REG'));
            } elseif ($this->input->post('FS_CARA_PULANG') == '4' && $cekrjrs == '0') {
               redirect("medis/rawat_jalan/add_rujuk/" . $this->input->post('FS_KD_REG'));
            }

           
        } elseif ($this->input->post('FS_CARA_PULANG') == '6') {
             if ($cekkonsul >= '1') {
                redirect("medis/rawat_jalan/edit_rujuk_internal/" . $this->input->post('FS_KD_REG'));
            } else{
                redirect("medis/rawat_jalan/add_rujuk_internal/" . $this->input->post('FS_KD_REG'));
            }   
        } else {
            redirect("medis/rawat_jalan/cetak/" . $this->input->post('FS_KD_REG') . '/' .$this->input->post('FS_KD_TRS'));
        }
    }



  public function edit_processx() {
        // set page rules
            $this->_set_page_rule("C");
            // cek input
            $this->tnotification->set_rules('FS_KD_REG', 'KODE TRANSAKSI', 'trim|required');
            $this->tnotification->set_rules('FS_KD_LAYANAN', 'LAYANAN', 'trim|required');
            $this->tnotification->set_rules('FS_KD_PETUGAS_MEDIS', 'DOKTER', 'trim|required');
            $this->tnotification->set_rules('FS_KD_TRS', 'KODE TRANSAKSI', 'trim|required');
            // process

            $terapi1=$this->input->post('FS_TERAPI');
            $terapi2=$this->input->post('FS_TERAPI2');
        

                $jumlahkartakter2=strlen($terapi2);
                if($jumlahkartakter2>10){
                        $terapinya=$terapi1." ".$terapi2;
                }
                else{
                    $terapinya=$terapi1;
                }


                $terapi1_0 =$this->input->post('FS_TERAPI_0');
                $terapi2_0 =$this->input->post('FS_TERAPI2_0');
            
                    $jumlahkartakter2_0=strlen($terapi2_0);
                    if($jumlahkartakter2_0>10){
                            $terapinya_0=$terapi1_0." ".$terapi2_0;
                    }
                    else{
                        $terapinya_0=$terapi1_0;
                    }

            if ($this->tnotification->run() !== FALSE) {
                $params = array(
                $this->input->post('FS_DIAGNOSA'),
                $this->input->post('FS_ANAMNESA'),
                $this->input->post('FS_TINDAKAN'),
                $terapinya,
                $this->input->post('FS_CATATAN_FISIK'),
                $this->input->post('FS_CARA_PULANG'),
                $this->input->post('FS_DAFTAR_MASALAH'),
                '',
                $this->com_user['user_id'],
                date('Y-m-d'),
                    $this->input->post('FS_EKG'),
                    $this->input->post('FS_USG'),
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU'),
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU2'),
                    $this->input->post('FS_ALERGI'),
                    $this->input->post('FS_REAK_ALERGI'),
                    $this->input->post('FS_STATUS_PSIK'),
                    $this->input->post('FS_HUB_KELUARGA'),
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
                    
                $this->input->post('DPJP_UTAMA'),
                $this->input->post('DPJP_I'),
                $this->input->post('DPJP_II'),
                $this->input->post('DPJP_III'),
                $this->input->post('KONSUL_DPJP_UTAMA'),
                $this->input->post('KONSUL_DPJP_I'),
                $this->input->post('KONSUL_DPJP_II'),
                $this->input->post('KONSUL_DPJP_III'),
                $this->input->post('FS_KD_TRS')
            );


            $riwayat = array (
                $this->input->post('FS_KD_REG'),
                $this->input->post('FS_DIAGNOSA_0'),
                $this->input->post('FS_ANAMNESA_0'),
                $this->input->post('FS_TINDAKAN_0'),
                $terapinya_0,
                $this->input->post('FS_CATATAN_FISIK_0'),
                $this->input->post('FS_CARA_PULANG_0'),
                $this->input->post('FS_DAFTAR_MASALAH_0'),
                $this->input->post('FS_EKG_0'),
                $this->input->post('FS_USG_0'),
                $this->input->post('FS_RIW_PENYAKIT_DAHULU_0'),
                $this->input->post('FS_RIW_PENYAKIT_DAHULU2_0'),
                $this->input->post('FS_ALERGI'),
                $this->input->post('FS_REAK_ALERGI'),
                $this->input->post('FS_STATUS_PSIK_0'),
                '',
                $this->input->post('KONJUNGTIVA_0'),
                $this->input->post('DEVIASI_0'),
                $this->input->post('SKELERA_0'),
                $this->input->post('JVP_0'),
                $this->input->post('BIBIR_0'),
                $this->input->post('MUKOSA_0'),
                $this->input->post('THORAX_0'),
                $this->input->post('JANTUNG_0'),
                $this->input->post('ABDOMEN_0'),
                $this->input->post('PINGGANG_0'),
                $this->input->post('EKS_ATAS_0'),
                $this->input->post('EKS_BAWAH_0'),
                $this->com_user['user_name'],
                date('Y-m-d H:i:s'),
            );
            $this->m_rawat_jalan->insert_riwayat_dokterx($riwayat);

            
                // insert
                //if ($this->m_rawat_jalan->update_medis($params)) {
                if ($this->m_rawat_jalan->update_tac_rj_medisx($params)) {
                    //$this->m_rawat_jalan->update_level_medis(array('2', $this->input->post('FS_KD_REG')));
                    $cekskdp = $this->m_rawat_jalan->get_cek_skdp(array($this->input->post('FS_KD_REG')));
                    $cekrjrs = $this->m_rawat_jalan->get_cek_rjrs(array($this->input->post('FS_KD_REG')));
                    $cekprb = $this->m_rawat_jalan->get_cek_prb(array($this->input->post('FS_KD_REG')));
                    $cekkonsul = $this->m_rawat_jalan->get_cek_konsul(array($this->input->post('FS_KD_REG')));
                    $cekradionya = $this->m_rawat_jalan->get_cek_radnya(array($this->input->post('FS_KD_REG')));
                
                    $cekasesinapmedis = $this->m_rawat_jalan->get_cek_ases_inap_medis(array($this->input->post('FS_KD_REG')));
                
                    $params8 = array(
                        $this->input->post('FS_HIGH_RISK'),
                        $this->input->post('FS_MR')
                    );
                    $this->m_rawat_jalan->update_high_risk2($params8);

                    $lab = $this->input->post('tujuan');
                    $this->m_rawat_jalan->delete_pemeriksaan_lab($this->input->post('FS_KD_REG'));
                    if (!empty($lab)) {
                        foreach ($lab as $key => $value) {
                            $this->m_rawat_jalan->insert_pemeriksaan_lab(array($key, $value,$this->input->post('FS_KD_REG')));
                        }
                    }
                    $rad = $this->input->post('tembusan');
                    $this->m_rawat_jalan->delete_pemeriksaan_rad($this->input->post('FS_KD_REG'));
                    $fs_bagian = $this->input->post('FS_BAGIAN');
                    if (!empty($rad)) {

                        foreach ($rad as $key => $value) {
    
                                $this->m_rawat_jalan->insert_pemeriksaan_rad(array($key, $value, $this->input->post('FS_KD_REG'),$fs_bagian));
                            
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
                            redirect("medis/rawat_jalan/cetak/" . $this->input->post('FS_KD_REG') . '/' . $this->input->post('FS_KD_TRS'));
                        }
                    }


                        elseif ($this->input->post('FS_CARA_PULANG') == '7') {
                                    if ($cekprb >= '1') {
                                        redirect("medis/rawat_jalan/edit_prb/" . $this->input->post('FS_KD_REG'));
                                    } elseif ($this->input->post('FS_CARA_PULANG') == '7' && $cekprb == '0') {
                                        redirect("medis/rawat_jalan/add_prb/" . $this->input->post('FS_KD_REG'));
                                    }  
                                }
    

                    elseif ($this->input->post('FS_CARA_PULANG') == '3') {
                        if ($cekasesinapmedis >= '1') { 
                            redirect("medis/asesmenawal/create/" . $this->input->post('FS_KD_REG'));
                        } elseif ($this->input->post('FS_CARA_PULANG') == '3' && $cekasesinapmedis == '0') {
                            redirect("medis/asesmenawal/create/" . $this->input->post('FS_KD_REG').'/'. $this->input->post('FS_KD_TRS'));
                        } else { 
                            redirect("medis/rawat_jalan/cetak/" . $this->input->post('FS_KD_REG') . '/' . $FS_KD_TRS);
                        }
                    }  


                elseif ($this->input->post('FS_CARA_PULANG') == '4') { 

                    if ($cekrjrs >= '1') {
                        redirect("medis/rawat_jalan/edit_rujuk/" . $this->input->post('FS_KD_REG'));
                    } elseif ($this->input->post('FS_CARA_PULANG') == '4' && $cekrjrs == '0') {
                    redirect("medis/rawat_jalan/add_rujuk/" . $this->input->post('FS_KD_REG'));
                    }

                
                } elseif ($this->input->post('FS_CARA_PULANG') == '6') {
                    if ($cekkonsul >= '1') {
                        redirect("medis/rawat_jalan/edit_rujuk_internal/" . $this->input->post('FS_KD_REG'));
                    } else{
                        redirect("medis/rawat_jalan/add_rujuk_internal/" . $this->input->post('FS_KD_REG'));
                    }   
                } else {
                    redirect("medis/rawat_jalan/cetak/" . $this->input->post('FS_KD_REG') . '/' .$this->input->post('FS_KD_TRS'));
                }
    }
 

    public function edit_rujuk_internal($FS_KD_REG = "") {
        // set page rules
                $this->_set_page_rule("R");
        // set template content
                $this->smarty->assign("template_content", "medis/rawat_jalan/edit_rujuk_internal.html");
                // load javascript    
                $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
                $this->smarty->load_javascript('resource/js/jquery/select2.js');
                $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
                // load style
                $this->smarty->load_style("jquery.ui/select2/select2.css");
                // load style ui
                $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
                $now = date('Y-m-d');
                $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG)));
                $this->smarty->assign("rs_skdp_alasan", $this->m_rawat_jalan->get_tac_com_parameter_alasan());
        // notification
                $this->tnotification->display_notification();
                $this->tnotification->display_last_field();
        // output
                parent::display();
            }

 public function add_prb($FS_KD_REG = "") { 
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "medis/rawat_jalan/add_faskes.html");
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG)));
        $this->smarty->assign("rs_skdp_alasan", $this->m_rawat_jalan->get_tac_com_parameter_alasan());
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }




      public function add_faskes($FS_KD_REG = "") { 
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "medis/rawat_jalan/add_faskes.html");
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG)));
        $this->smarty->assign("rs_skdp_alasan", $this->m_rawat_jalan->get_tac_com_parameter_alasan());
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }


       public function edit_prb($FS_KD_REG = "") { 
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "medis/rawat_jalan/edit_prb.html");
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG)));
        $this->smarty->assign("rs_skdp_alasan", $this->m_rawat_jalan->get_tac_com_parameter_alasan());
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }

     public function add_faskes_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
        // $this->tnotification->set_rules('FS_ALASAN_RUJUK', 'ALASAN DI RUJUK', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_TRS'),
                $this->input->post('FS_KD_REG'),
                $this->input->post('FS_TGL_PRB'),
                $this->input->post('FS_TUJUAN'),
                $this->com_user['user_name'],
                date('Y-m-d'), 
                date('H:i:s')
            );
            if ($this->m_rawat_jalan->insert_tac_rj_prb($params)) {

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


  public function edit_prb_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
        // $this->tnotification->set_rules('FS_ALASAN_RUJUK', 'ALASAN DI RUJUK', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_TGL_PRB'),
                $this->input->post('FS_TUJUAN'),
                                $this->input->post('FS_KD_REG'),
            );
            if ($this->m_rawat_jalan->update_tac_rj_prb($params)) {

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
          $this->smarty->assign("ases2", $this->m_rawat_jalan->get_data_ases2_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG)));
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
            $no_skdp = $this->m_rawat_jalan->get_no_skdp(array(date('m'),date('Y')));
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
                date('H:i:s'),
                $this->input->post('FS_SKDP_FASKES'),                
                $this->input->post('FS_PESAN'),             
                $this->input->post('FS_RENCANA_KONTROL')                
            ); 
            // insert
            // if ($this->m_rawat_jalan->insert_medis($params)) {
            if ($this->m_rawat_jalan->insert_tac_rj_skdp($params)) {
                //insert pemeriksaan lab
                $lab = $this->input->post('tujuan');
                if (!empty($lab)) {
                    foreach ($lab as $key => $value) {
                        $this->m_rawat_jalan->insert_pemeriksaan_lab_skdp(array($key, $value,$this->input->post('FS_KD_REG')));
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
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG)));
        $this->smarty->assign("skdp", $this->m_rawat_jalan->get_cek_skdp2(array($FS_KD_REG)));

        $this->smarty->assign("rs_skdp_alasan", $this->m_rawat_jalan->get_tac_com_parameter_alasan());
        $this->smarty->assign("alasan_skdp", $this->m_rawat_jalan->get_alasan_skdp());
        $this->smarty->assign("rencana_skdp", $this->m_rawat_jalan->get_rencana_skdp2());
         
        $tujuan = $this->m_rawat_jalan->list_pemeriksaan_lab_by_rg_skdp($FS_KD_REG);
        $tujuan_str = ""; 
        foreach ($tujuan as $key => $value) {
            $tujuan_str .= "'" . $value['id'] . "',";
        }
        $this->smarty->assign('rs_tujuan', $tujuan_str);

        $tembusan = $this->m_rawat_jalan->list_pemeriksaan_rad_by_rg_skdp($FS_KD_REG);
        $tembusan_str = "";
        foreach ($tembusan as $key => $value) {
            $tembusan_str .= "'" . $value['NO_RINCI'] . "',";
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
                $this->input->post('FS_KD_REG'),
                $this->input->post('FS_SKDP_FASKES'),
                $this->input->post('FS_PESAN'),
                $this->input->post('FS_RENCANA_KONTROL'),
                $this->input->post('FS_KD_REG'),

                
            );

            // insert
            //if ($this->m_rawat_jalan->update_medis($params)) {
            if ($this->m_rawat_jalan->update_tac_rj_skdp($params)) {

                $lab = $this->input->post('tujuan');
                $this->m_rawat_jalan->delete_pemeriksaan_lab_skdp($this->input->post('FS_KD_REG'));
                if (!empty($lab)) {
                    foreach ($lab as $key => $value) {
                        $this->m_rawat_jalan->insert_pemeriksaan_lab_skdp(array($key, $value,$this->input->post('FS_KD_REG')));
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
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG)));
        $this->smarty->assign("rs_skdp_alasan", $this->m_rawat_jalan->get_tac_com_parameter_alasan());
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }


     public function edit_rujuk($FS_KD_REG = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "medis/rawat_jalan/edit_rujuk.html");
        // load javascript    
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG)));
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


     public function edit_rujuk_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
        $this->tnotification->set_rules('FS_ALASAN_RUJUK', 'ALASAN DI RUJUK', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
               
                $this->input->post('FS_TUJUAN_RUJUKAN'),
                $this->input->post('FS_TUJUAN_RUJUKAN2'),
                $this->input->post('FS_ALASAN_RUJUK'),
                 $this->input->post('FS_KD_REG'),
            );
            if ($this->m_rawat_jalan->update_tac_rj_rujukan($params)) {

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
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG)));
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
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG)));
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
        $data["result"] = $this->m_rawat_jalan->get_data_medis_by_rg2(array($FS_KD_REG, '223326'));
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
         $data['medis'] = $this->m_rawat_jalan->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS));
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

    public function cetak_prb($FS_KD_REG = "", $FS_KD_TRS = "") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d');
        $data['rs_prb'] = $this->m_rawat_jalan->get_data_prb(array($FS_KD_REG));
        $data['medis'] = $this->m_rawat_jalan->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS));

        $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG));
        $data['catatan_prb'] = $this->m_rawat_jalan->get_catatan_prb(array($FS_KD_REG));
        // var_dump($data['catatan_prb']);
        // die;
        //$data['rs_prb'] = $this->m_rawat_jalan->get_data_prb_by_rg(array($FS_KD_REG));
        $data["result"] = $this->m_rawat_jalan->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS));

        $data['rs_resep'] = $this->m_rawat_jalan->get_data_terapi_by_rg(array($FS_KD_REG));
        $data["alamat"] = $this->m_rawat_jalan->get_alamat();
        ob_start();
        $this->load->view('medis/rawat_jalan/prb', $data);
        $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF('P', 'A5', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output($FS_KD_REG . '.pdf');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }


     public function cetak_rb($FS_KD_REG = "", $FS_KD_TRS = "") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d');
        $data['rs_prb'] = $this->m_rawat_jalan->get_data_prb(array($FS_KD_REG));
        $data['medis'] = $this->m_rawat_jalan->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS));

        $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG));
        //$data['rs_prb'] = $this->m_rawat_jalan->get_data_prb_by_rg(array($FS_KD_REG));
        $data["result"] = $this->m_rawat_jalan->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS));
        $data['rs_resep'] = $this->m_rawat_jalan->get_data_terapi_by_rg(array($FS_KD_REG));
        $data["alamat"] = $this->m_rawat_jalan->get_alamat();
        ob_start();
        $this->load->view('medis/rawat_jalan/rb', $data);
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


      public function cetak_faskes($FS_KD_REG = "", $FS_KD_TRS = "") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d');
        $data['rs_prb'] = $this->m_rawat_jalan->get_data_prb(array($FS_KD_REG));
        $data['medis'] = $this->m_rawat_jalan->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS));
  
        $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG));
        $data['rs_skdp'] = $this->m_rawat_jalan->get_data_skdp_by_rg(array($FS_KD_REG));
        $data["result"] = $this->m_rawat_jalan->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS));
        $data["ceklabskdp"] = $this->m_rawat_jalan->get_cek_lab_skdp(array($FS_KD_REG));
        $data["cekradskdp"] = $this->m_rawat_jalan->get_cek_rad_skdp(array($FS_KD_REG));
        $data["rs_lab"] = $this->m_rawat_jalan->get_data_order_lab_by_rg3(array($FS_KD_REG));
        $data["rs_rad"] = $this->m_rawat_jalan->get_data_order_rad_by_rg3(array($FS_KD_REG));
        $data["header1"] = $this->m_rawat_jalan->get_header1();
        $data["header2"] = $this->m_rawat_jalan->get_header2();
        $data["alamat"] = $this->m_rawat_jalan->get_alamat();
        ob_start();
        $this->load->view('medis/rawat_jalan/faskes', $data);
       
        $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF('P', 'A5', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output($FS_KD_REG . '.pdf');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }


    public function cetak_resep($FS_KD_REG = "", $FS_KD_TRS = "") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d'); 
        $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG));
        $data['daftar'] = $this->m_rawat_jalan->get_px_by_daftar(array($FS_KD_REG));
        $data['medis'] = $this->m_rawat_jalan->get_data_medis_by_rg2(array($FS_KD_REG, $FS_KD_TRS));
        $data['antrian'] = $this->m_rawat_jalan->get_antrian_obat_by_trs(array($FS_KD_TRS));
        ob_start(); 
        $this->load->view('medis/rawat_jalan/resep', $data);
        $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF();
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output($rs_pasien['FS_NM_PASIEN'] . '.pdf');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }

    public function cetak_resep_igd($FS_KD_REG = "", $FS_KD_TRS = "") {
        $this->_set_page_rule("R");
        $this->load->library('html2pdf');
        $now = date('Y-m-d'); 
        $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG));
        $data['daftar'] = $this->m_rawat_jalan->get_px_by_daftar(array($FS_KD_REG));
        $data['medis'] = $this->m_rawat_jalan->get_data_medis_by_rg2_igd(array($FS_KD_REG, $FS_KD_TRS));
        $data['antrian'] = $this->m_rawat_jalan->get_antrian_obat_by_trs(array($FS_KD_TRS));
        ob_start(); 
        $this->load->view('medis/rawat_jalan/resep_igd', $data);
        $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF();
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output($rs_pasien['FS_NM_PASIEN'] . '.pdf');
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
                'label' => $value['JENIS'],
                'value' => $value['No_Jenis']
            );
            $i++;
        }

        echo json_encode($data);
    }

     public function list_pemeriksaan_rlab() {
        $instansi = $this->m_rawat_jalan->list_pemeriksaan_lab();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['JENIS'],
                'value' => $value['JENIS'] 
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
                'label' => $value['KET_TINDAKAN'],
                'value' => $value['NO_RINCI']
            );
            $i++;
        }
        echo json_encode($data);
    }

      public function list_nama_dokter() {
        $instansi = $this->m_rawat_jalan->list_nama_dokter();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['Nama_Dokter'],
                'value' => $value['Kode_Dokter']
            );
            $i++;
        }
        echo json_encode($data);
    }
      public function list_nama_dokter_igd() {
        $instansi = $this->m_rawat_jalan->list_nama_dokter();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['Nama_Dokter'],
                'value' => $value['Nama_Dokter']
            );
            $i++;
        }
        echo json_encode($data);
    }

      public function list_pemeriksaan_rrad() {
        $instansi = $this->m_rawat_jalan->list_pemeriksaan_rad();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'value' => $value['KET_TINDAKAN'],
                'label' => $value['KET_TINDAKAN'] 
            );
            $i++;
        }
        echo json_encode($data);
    }

     public function list_nama_obat() {
        $instansi = $this->m_rawat_jalan->list_nama_obat();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['Nama_Obat'],
                'value' => $value['Nama_Obat']
            );
            $i++;
        }
        array_push($data, ["label"=>"Infus RL", "value"=>"Infus RL"]);
        array_push($data, ["label"=>"Metil Prednisolon 4mg", "value"=>"Metil Prednisolon 4mg"]);
        array_push($data, ["label"=>"Metil Prednisolon 8mg", "value"=>"Metil Prednisolon 8mg"]);
        array_push($data, ["label"=>"Akilen Ear Drop", "value"=>"Akilen Ear Drop"]);
        array_push($data, ["label"=>"Otilon Ear Drop", "value"=>"Otilon Ear Drop"]);
        array_push($data, ["label"=>"Nasacord Spray", "value"=>"Nasacord Spray"]);
        array_push($data, ["label"=>"Clindamisin", "value"=>"Clindamisin"]);
        array_push($data, ["label"=>"Forumen Tetes Telinga", "value"=>"Forumen Tetes Telinga"]);
        array_push($data, ["label"=>"Tremenza", "value"=>"Tremenza"]);
        array_push($data, ["label"=>"N Acetil Sistein", "value"=>"N Acetil Sistein"]);
        array_push($data, ["label"=>"Displatyl", "value"=>"Displatyl"]);
        array_push($data, ["label"=>"Natrium Bikarbonat", "value"=>"Natrium Bikarbonat"]);
        array_push($data, ["label"=>"Vesicare", "value"=>"Vesicare"]);
        array_push($data, ["label"=>"Prostam", "value"=>"Prostam"]);
        array_push($data, ["label"=>"Mional", "value"=>"Mional"]);
        array_push($data, ["label"=>"Xepozym", "value"=>"Xepozym"]);

        echo json_encode($data);
    }

    public function list_nama_paket() {
        $instansi = $this->m_rawat_jalan->list_nama_obat();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['Nama_Obat'],
                'value' => $value['Nama_Obat']
            );
            $i++;
        }

        $data=array(
            ['label'=>'Ortho A', 'value'=>'Ortho A'],
            ['label'=>'Ortho B', 'value'=>'Ortho B'],
            ['label'=>'Ortho C', 'value'=>'Ortho C'],
            ['label'=>'Ortho D', 'value'=>'Ortho D'],
            ['label'=>'Ortho E', 'value'=>'Ortho E'],
            ['label'=>'Ortho F', 'value'=>'Ortho F'],
            ['label'=>'Ortho G', 'value'=>'Ortho G'],
            ['label'=>'Ortho H', 'value'=>'Ortho H'],
            ['label'=>'Ortho I', 'value'=>'Ortho I'],
            ['label'=>'Ortho J', 'value'=>'Ortho J']
                );
        // array_push($data, ["label"=>"Infus RL", "value"=>"Infus RL"]);
        // array_push($data, ["label"=>"Metil Prednisolon 4mg", "value"=>"Metil Prednisolon 4mg"]);
        // array_push($data, ["label"=>"Metil Prednisolon 8mg", "value"=>"Metil Prednisolon 8mg"]);
        // array_push($data, ["label"=>"Akilen Ear Drop", "value"=>"Akilen Ear Drop"]);
        // array_push($data, ["label"=>"Otilon Ear Drop", "value"=>"Otilon Ear Drop"]);
        // array_push($data, ["label"=>"Nasacord Spray", "value"=>"Nasacord Spray"]);
        // array_push($data, ["label"=>"Clindamisin", "value"=>"Clindamisin"]);
        // array_push($data, ["label"=>"Forumen Tetes Telinga", "value"=>"Forumen Tetes Telinga"]);
        // array_push($data, ["label"=>"Tremenza", "value"=>"Tremenza"]);
        // array_push($data, ["label"=>"N Acetil Sistein", "value"=>"N Acetil Sistein"]);

        echo json_encode($data);
    }


    public function list_nama_paket_tht() {
        $instansi = $this->m_rawat_jalan->list_nama_obat();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['Nama_Obat'],
                'value' => $value['Nama_Obat']
            );
            $i++;
        }

        $data=array(
            ['label'=>'SWD 1', 'value'=>'SWD 1'], 
            ['label'=>'SWD 2', 'value'=>'SWD 2'], 
            ['label'=>'SWD 3', 'value'=>'SWD 3'], 
            ['label'=>'SWD 4', 'value'=>'SWD 4'], 
            ['label'=>'SWD 5', 'value'=>'SWD 5'], 
            ['label'=>'SWD racik 1', 'value'=>'SWD racik 1'], 
            ['label'=>'SWD racik 2', 'value'=>'SWD racik 2'], 
                );
    

        echo json_encode($data);
    }


     public function list_nama_paket_inap_kumbang() {
        $instansi = $this->m_rawat_jalan->list_nama_obat();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['Nama_Obat'],
                'value' => $value['Nama_Obat']
            );
            $i++;
        }

        $data=array(
            ['label'=>'Ortho Inap 1', 'value'=>'Ortho Inap 1'],
            ['label'=>'Ortho Inap 2', 'value'=>'Ortho Inap 2'],
            ['label'=>'Ortho Inap 3', 'value'=>'Ortho Inap 3'],
             ['label'=>'Ortho A', 'value'=>'Ortho A'],
            ['label'=>'Ortho B', 'value'=>'Ortho B'],
            ['label'=>'Ortho C', 'value'=>'Ortho C'],
            ['label'=>'Ortho D', 'value'=>'Ortho D'],
            ['label'=>'Ortho E', 'value'=>'Ortho E'],
            ['label'=>'Ortho F', 'value'=>'Ortho F'],
            ['label'=>'Ortho G', 'value'=>'Ortho G'],
            ['label'=>'Ortho H', 'value'=>'Ortho H'],
            ['label'=>'Ortho I', 'value'=>'Ortho I'],
            ['label'=>'Ortho J', 'value'=>'Ortho J']
                );
    

        echo json_encode($data);
    }




      public function list_nama_paket_uya() {
        $instansi = $this->m_rawat_jalan->list_nama_obat();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['Nama_Obat'],
                'value' => $value['Nama_Obat']
            );
            $i++;
        }

        $data=array(
            ['label'=>'Uya 01', 'value'=>'Uya 01'], 
            ['label'=>'Uya 02', 'value'=>'Uya 02'], 
            ['label'=>'Uya 03', 'value'=>'Uya 03'], 
            ['label'=>'Uya 04', 'value'=>'Uya 04'], 
            ['label'=>'Uya 05', 'value'=>'Uya 05'], 
            ['label'=>'Uya 06', 'value'=>'Uya 06'], 
            ['label'=>'Uya 07', 'value'=>'Uya 07'], 
                );
    

        echo json_encode($data);
    }





         public function list_nama_paket_irs() {
        $instansi = $this->m_rawat_jalan->list_nama_obat();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['Nama_Obat'],
                'value' => $value['Nama_Obat']
            );
            $i++;
        }

        $data=array(
            ['label'=>'irs 01', 'value'=>'irs 01'], 
            ['label'=>'irs 02', 'value'=>'irs 02'], 
            ['label'=>'irs 03', 'value'=>'irs 03'], 
            ['label'=>'irs 04', 'value'=>'irs 04'], 
            ['label'=>'irs 05', 'value'=>'irs 05'], 
            ['label'=>'irs 06', 'value'=>'irs 06'], 
            ['label'=>'irs 07', 'value'=>'irs 07'], 
                );
    

        echo json_encode($data);
    }


    public function list_nama_paket_tris() {
        $instansi = $this->m_rawat_jalan->list_nama_obat();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['Nama_Obat'],
                'value' => $value['Nama_Obat']
            );
            $i++;
        }

        $data=array(
            ['label'=>'Tres 01', 'value'=>'Tres 01'],  
            ['label'=>'Tres 02', 'value'=>'Tres 02'],  
            ['label'=>'Tres 03', 'value'=>'Tres 03'],  
            ['label'=>'Tres 04', 'value'=>'Tres 04'],  
             ['label'=>'Tres 05', 'value'=>'Tres 05'],  
             ['label'=>'Tres 06', 'value'=>'Tres 06'],  
                );
    

        echo json_encode($data);
    }






    public function list_nama_paket_tw() {
        $instansi = $this->m_rawat_jalan->list_nama_obat();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['Nama_Obat'],
                'value' => $value['Nama_Obat']
            );
            $i++;
        }

        $data=array(
            ['label'=>'TW1', 'value'=>'TW1'],  
            ['label'=>'TW2', 'value'=>'TW2'],  
            ['label'=>'TW3', 'value'=>'TW3'],  
            ['label'=>'TW4', 'value'=>'TW4'],  
            ['label'=>'TW5', 'value'=>'TW5'],  
            ['label'=>'TW6', 'value'=>'TW6'],  
            ['label'=>'TW7', 'value'=>'TW7'],  
            ['label'=>'TW8', 'value'=>'TW8'],  
            ['label'=>'TW9', 'value'=>'TW9'],  
            ['label'=>'TW10', 'value'=>'TW10'],  
            ['label'=>'TW11', 'value'=>'TW11'],  
            ['label'=>'TW12', 'value'=>'TW12'],  
            ['label'=>'TW13', 'value'=>'TW13'],  
                );
    

        echo json_encode($data);
    }





       public function list_nama_paket_gg() {
        $instansi = $this->m_rawat_jalan->list_nama_obat();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['Nama_Obat'],
                'value' => $value['Nama_Obat']
            );
            $i++;
        }

        $data=array(
            ['label'=>'gg 1', 'value'=>'gg 1'],  
            ['label'=>'gg 2', 'value'=>'gg 2'],  
            ['label'=>'gg 3', 'value'=>'gg 3'],  
            ['label'=>'gg 4', 'value'=>'gg 4'],  
            ['label'=>'gg 5', 'value'=>'gg 5'],  
                );
    

        echo json_encode($data);
    }



    // bridging icare bpjs
    

    


}
