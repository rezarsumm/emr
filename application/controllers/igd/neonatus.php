<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class Neonatus extends ApplicationBase {

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
        $this->smarty->assign("template_content", "igd/neonatus/list.html");
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
        $time = date('H:i');
        $role = $this->com_user['role_id'];
        $x = $this->com_user['user_name'];

        // $this->curl->create('http://daftar.rsumm.co.id/api.simrs/index.php/api/pendaftaran/kode_masuk/1/');
        // $result = $this->curl->execute();
        // print_r($result).exit();
        // $get_pasien_igd = json_decode($result);


        $fs_kd_layanan = $this->com_user['fs_kd_layanan'];

       $this->smarty->assign("waktu", $time);
       $this->smarty->assign("tgl", $date);
       $this->smarty->assign("rs_ases_neonatus", $this->m_igd->get_data_ases_neonatus(array($date, $akhirnya,$date))); 
       $this->smarty->assign("rad", $this->m_igd->get_pasien_ugd());
       $this->smarty->assign("rs_pasien", $this->m_igd->get_pasien_ugd());
   
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    //TAMBAHAN BELUM SELESAI


    public function cari_process() {
        $FS_RG2 = $this->input->post('FS_RG');
        $cek = $this->m_igd->cek_neonatus(array($FS_RG2));
        if ($cek == '0') {
            $rolenya=$this->com_user['role_name'];
            redirect("igd/neonatus/add/" . $FS_RG2);
         } elseif ($cek >= '1') {
          redirect("igd/neonatus/edit/" . $FS_RG2);
         }
    }




    
     
    public function add($FS_RG) {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "igd/neonatus/add.html");
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
        $this->smarty->assign("template_content", "igd/neonatus/edit.html");
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
        $this->smarty->assign("data", $this->m_igd->get_data_neonatus(array($FS_RG)));           
        $this->smarty->assign("rs_dokter_spp", $this->m_cppt->get_dokter_sp(array($FS_RG)));
        $this->smarty->assign("ps", $this->m_igd->get_suami(array($FS_RG)));           
        $this->smarty->assign("alergi", $this->m_igd->get_alergi(array($FS_RG)));           
 
        $this->smarty->assign("nyeri", $this->m_rawat_jalan->get_data_nyeri_by_rg(array($FS_RG)));
        $this->smarty->assign("jatuh", $this->m_igd->get_data_jatuh_by_rg(array($FS_RG))); 
        $this->smarty->assign("nutrisi", $this->m_rawat_jalan->get_data_nutrisi_by_rg(array($FS_RG)));
 
         $this->smarty->assign("fungsi", $this->m_ass_awal->get_data_fungsi_by_rg(array($FS_RG)));
      

        $this->smarty->assign("ases2", $this->m_rawat_jalan->get_data_ases2_by_rg(array($FS_RG)));

         // Mendapatkan string dari database
         $DISCHARGE_PLANNING = $this->m_igd->getKriteriaDischargeAssesmenNeonatus(array($FS_RG));

         // Memecah string menjadi array
         $data = array();
         $string = $DISCHARGE_PLANNING['DISCHARGE_PLANNING'];
         $string = trim($string, ','); // Menghapus koma di awal dan akhir string (jika ada)
 
         if (!empty($string)) {
             $data = explode(', ', $string);
         }
         $this->smarty->assign("discharge", $data);

        $FS_KD_REG=$FS_RG;
        $tujuan = $this->m_rawat_jalan->list_masalah_kep_by_rg($FS_KD_REG);
        $tujuan_str = "";
        foreach ($tujuan as $key => $value) {
            $tujuan_str .= "'" . $value['FS_KD_MASALAH_KEP'] . "',";
        }
        $this->smarty->assign('masalah_keperawatan', $tujuan_str);

        $tembusan = $this->m_rawat_jalan->list_rencana_kep_by_rg($FS_KD_REG);
        $tembusan_str = "";
        foreach ($tembusan as $key => $value) {
            $tembusan_str .= "'" . $value['FS_KD_REN_KEP'] . "',";
        }
        $this->smarty->assign('rencana_keperawatan', $tembusan_str);
   
    
          $edukasi = $this->m_ass_awal->list_edukasi_by_rg($FS_RG);
          $edukasi_str = "";
          foreach ($edukasi as $key => $value) {
              $edukasi_str .= "'" . $value['FS_KD_EDUKASI'] . "',";
          }
          $this->smarty->assign('edukasi', $edukasi_str);
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
  
        // $masalah_kep = $this->input->post('masalah_keperawatan');
        // $kd='';
        // if (!empty($masalah_kep)) {
        //     foreach ($masalah_kep as $value) {
        //         $kd=$kd.', '.$value;
        //         var_dump($kd);
        //         die;
        //     }
        // }

        $kepala=$this->input->post('kepala');
        if($kepala!='Normal'){
            $kepala=$this->input->post('kelainan_kepala');
        }
        $leher=$this->input->post('leher');
        if($leher!='Normal'){
            $leher=$this->input->post('kelainan_leher');
        }
        $kelainan_fisik=$this->input->post('kelainan_fisik');
        if($kelainan_fisik!='Tidak'){
            $kelainan_fisik=$this->input->post('ket_kelainan_fisik');
        }
        $riwayat_penyakit_dahulu=$this->input->post('riwayat_penyakit_dahulu');
        if($riwayat_penyakit_dahulu!='Tidak Ada'){
            $riwayat_penyakit_dahulu=$this->input->post('ket_riwayat_penyakit');
        }
        $riwayat_alergi=$this->input->post('riwayat_alergi');
        if($riwayat_alergi!='Tidak Ada'){
            $riwayat_alergi=$this->input->post('ket_riwayat_alergi');
        }
        
            $riw_alergi = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('ket_riwayat_alergi'),
                '',
                '',
                $this->com_user['user_name'],
                date('Y-m-d H:i:s')
            );

            $this->m_rawat_jalan->insert_alergi($riw_alergi); //input ke tabel pku TAC_RJ_ALERGI

            $vital_sign = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('suhu'),
                $this->input->post('nadi'),
                $this->input->post('kecepatan_bernafas'),
                '',
                $this->input->post('panjang_badan'),
                $this->input->post('berat_badan_masuk'),
                $this->input->post('FS_KD_MEDIS'),
                $this->com_user['user_id'],
                date('Y-m-d'),
                date('H:i:s')
            );
            $this->m_rawat_jalan->insert_vs($vital_sign); //input ke tabel TAC_RJ_VITAL_SIGN Dan TAC_RI_VITAL_SIGN
            $this->m_ass_awal->insert_vs($vital_sign);

            $masalah_kep = $this->input->post('masalah_keperawatan');
            if (!empty($masalah_kep)) {
                foreach ($masalah_kep as $value) {
                    $this->m_rawat_jalan->insert_masalah_kep(array($this->input->post('FS_KD_REG'), $value));
                }
            }
            $rencana_kep = $this->input->post('rencana_keperawatan');
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

            $ld = $this->input->post('discharge_planning');
            $kd='';
            if (!empty($ld)) {
                foreach ($ld as $value) {
                    $kd=$kd.$value.", ";
                }
    
            }

            $data_neonatus = array (
                $this->input->post('FS_KD_REG'),
                $this->input->post('tanggal_masuk'),
                $this->input->post('jam'),
                $this->input->post('kriteria_masuk'),
                $this->input->post('diagnosa_medis'),
                $this->input->post('dpjp'),
                $this->input->post('jenis_kelamin'),
                $this->input->post('tgl_lahir'),
                $this->input->post('diagnosa_masuk'),
                $this->input->post('nama_ayah'),
                $this->input->post('nama_ibu'),
                $this->input->post('pekerjaan_orang_tua'),
                $this->input->post('jaminan'),
                $this->input->post('agama'),
                $this->input->post('suku'),
                $riwayat_penyakit_dahulu,
                $this->input->post('riwayat_imunisasi'),
                $this->input->post('usia_kehamilan'),
                $this->input->post('anak_ke'),
                $this->input->post('jumlah_anak'),
                $this->input->post('prenatal'),
                $this->input->post('natal'),
                $this->input->post('intranatal'),
                $this->input->post('posnatal'),
                $this->input->post('warna_ketuban'),
                $this->input->post('ditangani_oleh'),
                $this->input->post('tindakan_sebelum_dirawat'),
                $riwayat_alergi,
                $this->input->post('kesadaran'),
                $this->input->post('suhu'),
                $this->input->post('nadi'),
                $this->input->post('kecepatan_bernafas'),
                $this->input->post('saturasi_oksigen'),
                $this->input->post('panjang_badan'),
                $this->input->post('berat_badan_masuk'),
                $this->input->post('apgar_score'),
                $this->input->post('berat_badan_lahir'),
                $this->input->post('lingkar_kepala'),
                $this->input->post('lingkar_lengan'),
                $this->input->post('lengkar_dada'),
                $kepala,
                $leher,
                $this->input->post('mata'),
                $this->input->post('pupil'),
                $this->input->post('palpebra'),
                $this->input->post('hidung'),
                $this->input->post('mulut'),
                $this->input->post('telinga'),
                $this->input->post('dada'),
                $this->input->post('irama_nafas'),
                $this->input->post('bunyi_nafas'),
                $this->input->post('abdomen'),
                $this->input->post('tali_pusat'),
                $this->input->post('regurgitasi'),
                $this->input->post('refleks_menghisap'),
                $this->input->post('refleks_menelan'),
                $this->input->post('genitalia'),
                $this->input->post('anus'),
                $this->input->post('mekonium'),
                $this->input->post('bak'),
                $this->input->post('bab'),
                $this->input->post('ekstremitas'),
                $kelainan_fisik,
                $this->input->post('turgor'),
                $this->input->post('warna_kulit'),
                $this->input->post('param_nyeri1'),
                $this->input->post('param_nyeri2'),
                $this->input->post('param_nyeri3'),
                $this->input->post('param_nyeri4'),
                $this->input->post('param_nyeri5'),
                $this->input->post('param_nyeri6'),
                $this->input->post('total_skor_nyeri'),
                '',
                $this->input->post('hambatan_pembelajaran'),
                $this->input->post('penerjemah'),
                '',
                $kd,
                $this->input->post('discharge_planning_lain'),
                $this->input->post('jam_selesai'),
                $this->com_user['user_name'],
                date('Y-m-d H:i:s')
   
            );
            $this->m_igd->insert_neonatus_awal($data_neonatus); //insert data ke tabel pku igd_awal_neonatus

            $cek_status=$this->m_igd->cek_status_igd(array($this->input->post('FS_KD_REG'))); //cek status pasien

            if($cek_Status < 1) {
                $params_status = array(
                    $this->input->post('FS_KD_REG'),
                    '1', //STATUS IGD JIKA 1 PERAWAT SUDAH INPUT
                    $this->com_user['user_id'],
                    date('Y-m-d H:i:s')
                );
                $this->m_igd->insert_status_igd($params_status);
            }
              
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            
        
        // default redirect
        redirect("igd/neonatus");
    }




      
    public function edit_process() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process
  
        $kepala=$this->input->post('kepala');
        if($kepala!='Normal'){
            $kepala=$this->input->post('kelainan_kepala');
        }
        $leher=$this->input->post('leher');
        if($leher!='Normal'){
            $leher=$this->input->post('kelainan_leher');
        }
        $kelainan_fisik=$this->input->post('kelainan_fisik');
        if($kelainan_fisik!='Tidak'){
            $kelainan_fisik=$this->input->post('ket_kelainan_fisik');
        }
        $riwayat_penyakit_dahulu=$this->input->post('riwayat_penyakit_dahulu');
        if($riwayat_penyakit_dahulu!='Tidak Ada'){
            $riwayat_penyakit_dahulu=$this->input->post('ket_riwayat_penyakit');
        }
        $riwayat_alergi=$this->input->post('riwayat_alergi');
        if($riwayat_alergi!='Tidak Ada'){
            $riwayat_alergi=$this->input->post('ket_riwayat_alergi');
        }
        
        $riw_alergi = array(
            $this->input->post('FS_KD_REG'),
            $this->input->post('ket_riwayat_alergi'),
            '',
            '',
            $this->com_user['user_name'],
            date('Y-m-d H:i:s')
        );

        $this->m_rawat_jalan->insert_alergi($riw_alergi); //input ke tabel pku TAC_RJ_ALERGI

        $vital_sign = array(
            
            $this->input->post('suhu'),
            $this->input->post('nadi'),
            $this->input->post('kecepatan_bernafas'),
            '',
            $this->input->post('panjang_badan'),
            $this->input->post('berat_badan_masuk'),
            $this->input->post('FS_KD_MEDIS'),
            $this->com_user['user_id'],
            date('Y-m-d'),
            date('H:i:s'),
            $this->input->post('FS_KD_REG')
        );
        $this->m_rawat_jalan->update_vs($vital_sign); //input ke tabel TAC_RJ_VITAL_SIGN Dan TAC_RI_VITAL_SIGN
        $this->m_ass_awal->update_vs($vital_sign);

        $masalah_kep = $this->input->post('masalah_keperawatan');
        $this->m_rawat_jalan->delete_masalah_kep($this->input->post('FS_KD_REG'));
        if (!empty($masalah_kep)) {
            foreach ($masalah_kep as $value) {
                $this->m_rawat_jalan->insert_masalah_kep(array($this->input->post('FS_KD_REG'), $value));
            }
        }
        $rencana_kep = $this->input->post('rencana_keperawatan');
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

        $ld = $this->input->post('discharge_planning');
        $kd='';
        if (!empty($ld)) {
            foreach ($ld as $value) {
                $kd=$kd.$value.", ";
            }

        }

        $data_neonatus = array (
            $this->input->post('FS_KD_REG'),
            $this->input->post('tanggal_masuk'),
            $this->input->post('jam'),
            $this->input->post('kriteria_masuk'),
            $this->input->post('diagnosa_medis'),
            $this->input->post('dpjp'),
            $this->input->post('jenis_kelamin'),
            $this->input->post('tgl_lahir'),
            $this->input->post('diagnosa_masuk'),
            $this->input->post('nama_ayah'),
            $this->input->post('nama_ibu'),
            $this->input->post('pekerjaan_orang_tua'),
            $this->input->post('jaminan'),
            $this->input->post('agama'),
            $this->input->post('suku'),
            $riwayat_penyakit_dahulu,
            $this->input->post('riwayat_imunisasi'),
            $this->input->post('usia_kehamilan'),
            $this->input->post('anak_ke'),
            $this->input->post('jumlah_anak'),
            $this->input->post('prenatal'),
            $this->input->post('natal'),
            $this->input->post('intranatal'),
            $this->input->post('posnatal'),
            $this->input->post('warna_ketuban'),
            $this->input->post('ditangani_oleh'),
            $this->input->post('tindakan_sebelum_dirawat'),
            $riwayat_alergi,
            $this->input->post('kesadaran'),
            $this->input->post('suhu'),
            $this->input->post('nadi'),
            $this->input->post('kecepatan_bernafas'),
            $this->input->post('saturasi_oksigen'),
            $this->input->post('panjang_badan'),
            $this->input->post('berat_badan_masuk'),
            $this->input->post('apgar_score'),
            $this->input->post('berat_badan_lahir'),
            $this->input->post('lingkar_kepala'),
            $this->input->post('lingkar_lengan'),
            $this->input->post('lengkar_dada'),
            $kepala,
            $leher,
            $this->input->post('mata'),
            $this->input->post('pupil'),
            $this->input->post('palpebra'),
            $this->input->post('hidung'),
            $this->input->post('mulut'),
            $this->input->post('telinga'),
            $this->input->post('dada'),
            $this->input->post('irama_nafas'),
            $this->input->post('bunyi_nafas'),
            $this->input->post('abdomen'),
            $this->input->post('tali_pusat'),
            $this->input->post('regurgitasi'),
            $this->input->post('refleks_menghisap'),
            $this->input->post('refleks_menelan'),
            $this->input->post('genitalia'),
            $this->input->post('anus'),
            $this->input->post('mekonium'),
            $this->input->post('bak'),
            $this->input->post('bab'),
            $this->input->post('ekstremitas'),
            $kelainan_fisik,
            $this->input->post('turgor'),
            $this->input->post('warna_kulit'),
            $this->input->post('param_nyeri1'),
            $this->input->post('param_nyeri2'),
            $this->input->post('param_nyeri3'),
            $this->input->post('param_nyeri4'),
            $this->input->post('param_nyeri5'),
            $this->input->post('param_nyeri6'),
            $this->input->post('total_skor_nyeri'),
            '',
            $this->input->post('hambatan_pembelajaran'),
            $this->input->post('penerjemah'),
            '',
            $kd,
            $this->input->post('discharge_planning_lain'),
            $this->input->post('jam_selesai'),
            $this->com_user['user_name'],
            date('Y-m-d H:i:s')

        );
        $this->m_igd->delete_neonatus_awal($this->input->post('ID_IGD_NEONATUS'));
        $this->m_igd->insert_neonatus_awal($data_neonatus); //insert data ke tabel pku igd_awal_neonatus
               

             
              
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            
        
        // default redirect
        redirect("igd/neonatus");
    }



   



}