<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class Praanestesi extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_cppt');
        $this->load->model('m_resume');
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
        $this->smarty->assign("template_content", "op/praanestesi/list.html");
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

        if($fs_kd_layanan == 'MNA')
        {
              $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_mina());
        }

        else{

           if ($role == '6' || $role == '11'  || $role == '23' || $role == '9' || $role == '8' || $role == '17' || $role == '13' || $role == '1026') {
                 $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_bangsal());
            } 
 
            else  if ($role == '5') {
                 $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_bangsal($x));
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

   

    public function cari_process() {
        $FS_RG2 = $this->input->post('FS_RG');
        //$cek = $this->m_cppt->cek_resume(array($FS_RG2));
        //if ($cek == '0') {
           $rolenya=$this->com_user['role_name'];
        redirect("op/praanestesi/add/" . $FS_RG2);
        //} elseif ($cek == '1') {
        //redirect("inap/cppt/edit/" . $FS_RG2);
        // }
    }

       
    public function add($FS_RG = '',$idoperasi='') {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "op/praanestesi/add.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");

        $this->smarty->assign("idoperasi", $idoperasi);

         $role = $this->com_user['role_id'];
         $rolenya=$this->com_user['role_nm'];
          $this->smarty->assign("username", $this->com_user['user_name']);

        $this->smarty->assign("rs_perawat", $this->m_cppt->get_perawat(array($FS_RG)));
        $this->smarty->assign("rs_dokter_sp", $this->m_cppt->get_dokter_sp(array($FS_RG)));

          if ($role == '24'){
              $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg_ugd(array($FS_RG)));
            }
        else{   $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg(array($FS_RG)));
           }
         $this->smarty->assign("rs_cppt", $this->m_cppt->get_cppt_by_rg($FS_RG));
         $this->smarty->assign("rs_pra_anes", $this->m_cppt->get_list_pra_anes_by_rg($FS_RG));
         $this->smarty->assign("rs_umum_pra", $this->m_cppt->get_list_umum_pra_by_rg2($FS_RG));
         $this->smarty->assign("hb", $this->m_cppt->get_hb($FS_RG));
     
         $this->smarty->assign("hasil_lab", $this->m_cppt->get_hasil_lab2(array($FS_RG)));
         $this->smarty->assign("hasil_rad", $this->m_cppt->get_hasil_rad(array($FS_RG)));
 
         $tgl=date('Y-m-d');

        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);

 
        $this->smarty->assign("rs_ases_medis", $this->m_cppt->get_data_medis_by_rg(array($FS_RG)));
        $this->smarty->assign("namarole", $rolenya);
        $this->smarty->assign("rs_resume", $this->m_cppt->get_data_resume_by_rg(array($FS_RG)));
        //$this->smarty->assign("rs_lab", $this->m_cppt->get_cppt_by_rg($FS_RG));
        //$this->smarty->assign("rs_rad", $this->m_cppt->get_cppt_by_rg($FS_RG));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }
 


 


    public function add_process2() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process

        // $fisik= " Tinggi: ".$this->input->post('Tinggi')." | Berat: ". $this->input->post('Berat')." | TD: ". $this->input->post('Tekanan')." | Nadi: ". $this->input->post('Nadi')." | Pernafasan: ". $this->input->post('Pernafasan');

         if ($this->tnotification->run() !== FALSE) {


            $puasa=" sejak tgl ".$this->input->post('PUASA1')." jam ".$this->input->post('PUASA2');
            $prem=" sejak tgl ".$this->input->post('PRE_MEDIK1')." jam ".$this->input->post('PRE_MEDIK2');
            $trans=" sejak tgl ".$this->input->post('TRANSPORT_RUANG_OP1')." jam ".$this->input->post('TRANSPORT_RUANG_OP2');
            $ren=" tgl ".$this->input->post('RENCANA_OP1')." jam ".$this->input->post('RENCANA_OP2');

            $a="perawat";

            $alergi=  $this->input->post('RIWAYAT_ALERGI');
            if($alergi=='Tidak'){
                $alergi='Tidak';
            }
            else{
                $alergi=$this->input->post('RIWAYAT_ALERGI1');
            }

            $sakit=  $this->input->post('RIWAYAT_SAKIT');
            if($sakit=='Tidak'){
                $sakit='Tidak';
            }
            else{
                $sakit=$this->input->post('RIWAYAT_SAKIT1');
            }

            $sakitk=  $this->input->post('RIWAYAT_SAKIT_KELUARGA');
            if($sakitk=='Tidak'){
                $sakitk='Tidak';
            }
            else{
                $sakitk=$this->input->post('RIWAYAT_SAKIT_KELUARGA1');
            }

            $op=  $this->input->post('RIWAYAT_OP');
            if($op=='Tidak'){
                $op='Tidak';
            }
            else{
                $op=$this->input->post('RIWAYAT_OP1');
            }

            $hiv=  $this->input->post('TES_HIV');
            if($hiv=='Tidak'){
                $hiv='Tidak';
            }
            else{
                $hiv=$this->input->post('TES_HIV1');
            }


            $jan=  $this->input->post('JANTUNG');
            if($jan=='Tidak'){
                $jan='Tidak';
            }
            else{
                $jan=$this->input->post('JANTUNG1');
            }


            $penunjang=''.$this->input->post('hp1').' | '.$this->input->post('hp2').' | '.$this->input->post('hp3').' | '.$this->input->post('hp4').' | '.$this->input->post('hp5').' | '.$this->input->post('hp6').' | '.$this->input->post('hp7').' | '.$this->input->post('hp8').' | '.$this->input->post('hp9').' | '.$this->input->post('hp10');


                $params2 = array(
                    $this->input->post('FS_KD_REG'),
                    date('Y-m-d H:i:s'),
                    $this->com_user['user_name'],
                    $a, 
                    // $fisik,  
                    $this->input->post('FISIK'),  
                    $this->input->post('K_ROKOK'),  
                    $this->input->post('K_MINUM_KOPI'),  
                    $this->input->post('K_OLGA'),  
                    $alergi,  
                    $sakit,  
                    $sakitk,  
                    $op,  
                    $hiv,  
                    $this->input->post('HILANG_GIGI'),  
                    $this->input->post('LEHER'),  
                    $this->input->post('LEHER_PENDEK'),  
                    $this->input->post('BATUK'),  
                    $this->input->post('SESAK'),  
                    $this->input->post('MUNTAH'),  
                    $this->input->post('PINGSAN'),  
                    $this->input->post('STROKE'),  
                    $this->input->post('KEJANG'),  
                    $this->input->post('HAMIL'),  
                    $this->input->post('TULANG_BLK'),  
                    $this->input->post('SALURAN_NAPAS'),  
                    $this->input->post('DADA'),  
                    $jan,  
                    $this->input->post('KET'),  
                    $this->input->post('DIAGNOSA'),  
                    $this->input->post('PENYULIT_ANESTESI'),  
                    $this->input->post('TL'),  
                    $this->input->post('TEKNIS_ANESTESI'),  
                    $this->input->post('TEKNIS_KHUSUS'),  
                    $this->input->post('PERAWATAN'), 
                    $puasa,
                    $prem,
                    $trans,
                    $ren,
                    $this->input->post('CATATAN'),
                    $this->input->post('CLASS_ASA'),
                    $penunjang,
                    $this->input->post('idoperasi') 
                    
                );
                $this->m_cppt->INSERT_PRA_ANES($params2);

                $this->m_cppt->INSERT_DATA_SKOR_RR($this->input->post('idoperasi'));
 
           
 
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("op/jadwal/detail/" . $this->input->post('idoperasi')."/".$this->input->post('FS_KD_REG'));
    }





    public function edit_process() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process

        // $fisik= " Tinggi: ".$this->input->post('Tinggi')." | Berat: ". $this->input->post('Berat')." | TD: ". $this->input->post('Tekanan')." | Nadi: ". $this->input->post('Nadi')." | Pernafasan: ". $this->input->post('Pernafasan');

         if ($this->tnotification->run() !== FALSE) {


            // $puasa=" sejak tgl ".$this->input->post('PUASA1')." jam ".$this->input->post('PUASA2');
            // $prem=" sejak tgl ".$this->input->post('PRE_MEDIK1')." jam ".$this->input->post('PRE_MEDIK2');
            // $trans=" sejak tgl ".$this->input->post('TRANSPORT_RUANG_OP1')." jam ".$this->input->post('TRANSPORT_RUANG_OP2');
            // $ren=" tgl ".$this->input->post('RENCANA_OP1')." jam ".$this->input->post('RENCANA_OP2');

            $a="perawat";



            $alergi=  $this->input->post('RIWAYAT_ALERGI');
            if($alergi=='Tidak'){
                $alergi='Tidak';
            }
            else{
                $alergi=$this->input->post('RIWAYAT_ALERGI1');
            }

            $sakit=  $this->input->post('RIWAYAT_SAKIT');
            if($sakit=='Tidak'){
                $sakit='Tidak';
            }
            else{
                $sakit=$this->input->post('RIWAYAT_SAKIT1');
            }

            $sakitk=  $this->input->post('RIWAYAT_SAKIT_KELUARGA');
            if($sakitk=='Tidak'){
                $sakitk='Tidak';
            }
            else{
                $sakitk=$this->input->post('RIWAYAT_SAKIT_KELUARGA1');
            }

            $op=  $this->input->post('RIWAYAT_OP');
            if($op=='Tidak'){
                $op='Tidak';
            }
            else{
                $op=$this->input->post('RIWAYAT_OP1');
            }

            $hiv=  $this->input->post('TES_HIV');
            if($hiv=='Tidak'){
                $hiv='Tidak';
            }
            else{
                $hiv=$this->input->post('TES_HIV1');
            }


            $jan=  $this->input->post('JANTUNG');
            if($jan=='Tidak'){
                $jan='Tidak';
            }
            else{
                $jan=$this->input->post('JANTUNG1');
            }


            $params2 = array(
                $this->input->post('FS_KD_REG'),
                date('Y-m-d H:i:s'),
                $this->com_user['user_name'],
                $a, 
                // $fisik,  
                $this->input->post('FISIK'),  
                $this->input->post('K_ROKOK'),  
                $this->input->post('K_MINUM_KOPI'),  
                $this->input->post('K_OLGA'),  
                $alergi,  
                $sakit,  
                $sakitk,  
                $op,  
                $hiv,  
                $this->input->post('HILANG_GIGI'),  
                $this->input->post('LEHER'),  
                $this->input->post('LEHER_PENDEK'),  
                $this->input->post('BATUK'),  
                $this->input->post('SESAK'),  
                $this->input->post('MUNTAH'),  
                $this->input->post('PINGSAN'),  
                $this->input->post('STROKE'),  
                $this->input->post('KEJANG'),  
                $this->input->post('HAMIL'),  
                $this->input->post('TULANG_BLK'),  
                $this->input->post('SALURAN_NAPAS'),  
                $this->input->post('DADA'),  
                $jan,  
                $this->input->post('KET'),  
                $this->input->post('DIAGNOSA'),  
                $this->input->post('PENYULIT_ANESTESI'),  
                $this->input->post('TL'),  
                $this->input->post('TEKNIS_ANESTESI'),  
                $this->input->post('TEKNIS_KHUSUS'),  
                $this->input->post('PERAWATAN'), 
                $this->input->post('PUASA'), 
                $this->input->post('PRE_MEDIK'), 
                $this->input->post('TRANSPORT_RUANG_OP'), 
                $this->input->post('RENCANA_OP'), 
                $this->input->post('CATATAN'),
                $this->input->post('CLASS_ASA'),
                ' ',
                 $this->input->post('idoperasi') 
                
            );
                $this->m_cppt->DELETE_PRA_ANES( $this->input->post('idoperasi'));

                $this->m_cppt->INSERT_PRA_ANES($params2);
 
           
 
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("op/jadwal/detail/" . $this->input->post('idoperasi')."/".$this->input->post('FS_KD_REG'));
    }


    public function detail($FS_RG2='',$id='') { 
        $cek = $this->m_cppt->cek_ases_pra_anes(array($id));
        if ($cek == '0') {
            redirect("op/praanestesi/add/" . $FS_RG2."/".$id);
        } elseif ($cek >= '1') {
            
            redirect("op/praanestesi/edit/" . $FS_RG2."/".$id);

        }
    }


    public function verif($FS_RG = "", $FS_KD_TRS = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/cppt/verif.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg(array($FS_RG)));
        $this->smarty->assign("FS_KD_TRS", $FS_KD_TRS);
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function verif_process() {
        // set page rules
        $this->_set_page_rule("U");
        // insert
        if ($this->m_cppt->update_dokter(array(
                    $this->com_user['user_name'],
                    date('Y-m-d'),
                    date('H:i:s'),
                    $this->input->post('FS_KET_VERIF'),
                    $this->input->post('FS_KD_TRS')))) {
            $this->tnotification->delete_last_field();
            $this->tnotification->sent_notification("success", "Data berhasil disimpan");
            // default redirect
            redirect("inap/cppt/add/" . $this->input->post('FS_KD_REG'));
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Data gagal disimpan");
        }
        // default redirect
        redirect("inap/cppt/add/" . $this->input->post('FS_KD_REG'));
    }

    public function edit($FS_RG = '',$idoperasi='') {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "op/praanestesi/edit.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");

        $this->smarty->assign("idoperasi", $idoperasi);

         $role = $this->com_user['role_id'];
         $rolenya=$this->com_user['role_nm'];
          $this->smarty->assign("username", $this->com_user['user_name']);

        $this->smarty->assign("rs_perawat", $this->m_cppt->get_perawat(array($FS_RG)));
        $this->smarty->assign("rs_dokter_sp", $this->m_cppt->get_dokter_sp(array($FS_RG)));

          if ($role == '24'){
              $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg_ugd(array($FS_RG)));
            }
        else{   $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg(array($FS_RG)));
           }
         $this->smarty->assign("rs_cppt", $this->m_cppt->get_cppt_by_rg($FS_RG));
         $this->smarty->assign("rs_pra_anes", $this->m_cppt->get_list_pra_anes_by_rg($FS_RG));
         $this->smarty->assign("rs_pra_anes3", $this->m_cppt->get_list_pra_anes_by_rg3($idoperasi));
         $this->smarty->assign("rs_umum_pra", $this->m_cppt->get_list_umum_pra_by_rg2($FS_RG));
      
         $this->smarty->assign("hasil_lab", $this->m_cppt->get_hasil_lab2(array($FS_RG)));
         $this->smarty->assign("hasil_rad", $this->m_cppt->get_hasil_rad(array($FS_RG)));
         
        $tgl=date('Y-m-d');

        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);

 
        $this->smarty->assign("rs_ases_medis", $this->m_cppt->get_data_medis_by_rg(array($FS_RG)));
        $this->smarty->assign("namarole", $rolenya);
        $this->smarty->assign("rs_resume", $this->m_cppt->get_data_resume_by_rg(array($FS_RG)));
        //$this->smarty->assign("rs_lab", $this->m_cppt->get_cppt_by_rg($FS_RG));
        //$this->smarty->assign("rs_rad", $this->m_cppt->get_cppt_by_rg($FS_RG));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }


    public function delete_process($FS_KD_REG = "", $FS_KD_TRS = "") {
        // set page rules
        $this->_set_page_rule("D");
        // process

        $params = array(
            date('Y-m-d'),
            date('H:i:s'),
            $this->com_user['user_name'],
            $FS_KD_TRS
        );

        // insert
        if ($this->m_cppt->delete($params)) {
            // notification
            $this->tnotification->delete_last_field();
            $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }

        // default redirect
        redirect("inap/cppt/add/" . $FS_KD_REG);
    }

    public function cetak($FS_KD_REG = "") {
        $this->_set_page_rule("R");

        $this->load->library('html2pdf');
        //$data['rs_pasien'] = $this->m_resume->get_pasien_by_rg(array($FS_KD_REG));
        //$data['rs_resume'] = $this->m_resume->get_resume_by_rg(array($FS_KD_REG));
        //$data['rs_diet'] = $this->m_resume->get_diet_by_rg(array($FS_KD_REG));
        //$data['rs_indikasi'] = $this->m_resume->get_indikasi_dirawat_by_rg(array($FS_KD_REG));
        //$data['rs_diag'] = $this->m_resume->get_diag_by_rg(array($FS_KD_REG));
        //$data['rs_tind'] = $this->m_resume->get_tind_by_rg(array($FS_KD_REG));
        //$data['rs_terapi'] = $this->m_resume->get_terapi_by_rg(array($FS_KD_REG));
        ob_start();
        $this->load->view('inap/cppt/print', $data);
        $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output('resume_pasien_pulang.pdf');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    } 



    
    public function SatBarang() {
        $FS_KD_BARANG = $this->input->post('FS_KD_BARANG');
        $data = $this->m_cppt->get_sat_barang(array($FS_KD_BARANG));
        echo json_encode($data);
    }

    
    public function list_resep_baru() {
        $params = array(
            $this->input->post('FS_KD_REG2')
        );
        $data = $this->m_cppt->get_data_terapi_baru_by_rg($params);
        echo json_encode($data);
    }

    public function delete_resep_process() {
        $params = array(
            $this->input->post('kode')
        );
        // insert
        $data = $this->m_cppt->delete_resep_process($params);
        echo json_encode($data);
    }

}
