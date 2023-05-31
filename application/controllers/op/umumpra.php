<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class Umumpra extends ApplicationBase {

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
        $this->smarty->assign("template_content", "op/umumpra/list.html");
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

     
               $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_bangsal_by_bangsal(array($this->com_user['fs_kd_layanan'])));
        

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
        redirect("op/umumpra/add/" . $FS_RG2);
        //} elseif ($cek == '1') {
        //redirect("inap/cppt/edit/" . $FS_RG2);
        // }
    } 

    
    // public function detail($FS_RG2='',$id='') { 
    //     $cek = $this->m_cppt->cek_umum_pra(array($id));
    //     if ($cek == '0') {
    //         redirect("op/umumpra/add/" . $FS_RG2."/".$id);
    //     } elseif ($cek >= '1') {
    //         redirect("op/umumpra/edit/" . $FS_RG2."/".$id);
    //     }
    // }


    public function add($FS_RG = '',$idoperasi='') {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "op/umumpra/add.html");
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
          $this->smarty->assign("idoperasi", $idoperasi);
        $this->smarty->assign("rs_op", $this->m_cppt->get_px_op_by_id(array($idoperasi)));           


        $this->smarty->assign("rs_perawat", $this->m_cppt->get_perawat(array($FS_RG)));
        $this->smarty->assign("rs_dokter_sp", $this->m_cppt->get_dokter_sp(array($FS_RG)));

       
        $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_pasien_ok_by_rgxx(array($FS_RG)));
         $this->smarty->assign("rs_cppt", $this->m_cppt->get_cppt_by_rg($FS_RG));
         $this->smarty->assign("rs_lap_op", $this->m_cppt->get_list_op_by_rg($FS_RG));
         $this->smarty->assign("rs_pra_anes", $this->m_cppt->get_list_pra_anes_by_rg2($FS_RG));
         $this->smarty->assign("rs_umum_pra", $this->m_cppt->get_list_umum_pra_by_rg($FS_RG));
        $this->smarty->assign("rs_resep", $this->m_cppt->get_resep());
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

   

    public function edit($FS_RG = '',$idoperasi='') {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "op/umumpra/edit.html");
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
          $this->smarty->assign("idoperasi", $idoperasi);
          $this->smarty->assign("rs_op", $this->m_cppt->get_px_op_by_id(array($idoperasi)));           

       
        $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_pasien_ok_by_rgxx(array($FS_RG)));
        
         $this->smarty->assign("rs_cppt", $this->m_cppt->get_cppt_by_rg($FS_RG));
         $this->smarty->assign("rs_lap_op", $this->m_cppt->get_list_op_by_rg($FS_RG));
        //  $this->smarty->assign("rs_pra_anes", $this->m_cppt->get_list_pra_anes_by_rg2($FS_RG));
         $this->smarty->assign("rs_umum_pra", $this->m_cppt->get_list_umum_pra_by_rg3($idoperasi));
         
         $this->smarty->assign("rs_umum_pra3", $this->m_cppt->get_list_umum_pra_by_rg($FS_RG));

        $this->smarty->assign("rs_resep", $this->m_cppt->get_resep());
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

         if ($this->tnotification->run() !== FALSE) {

           $asma=  $this->input->post('RIWAYAT_ASMA');
           if($asma=='Tidak'){
               $asma='Tidak';
           }
           else{
               $asma=$this->input->post('RIWAYAT_ASMA1');
           }

           $alergi=  $this->input->post('RIWAYAT_ALERGI');
           if($alergi=='Tidak'){
               $alergi='Tidak';
           }
           else{
               $alergi=$this->input->post('RIWAYAT_ALERGI1');
           }
          
                 $params2 = array(
                    $this->input->post('FS_KD_REG'),
                    date('Y-m-d H:i:s'), 
                    $this->com_user['user_name'],
                    $this->input->post('KD_OPERATOR'),
                    $this->input->post('DIAGNOSA'),
                    $this->input->post('JENIS_OP'),
                    $this->input->post('MAKAN_TERAKHIR'),
                    $this->input->post('PUASA_JAM'),
                    $asma,
                    $alergi,
                    $this->input->post('ANTIBIOTIK'),
                    $this->input->post('TB'),
                    $this->input->post('BB'),
                    $this->input->post('TD'),
                    $this->input->post('ND'),
                    $this->input->post('P'),
                    $this->input->post('SH'),
                    $this->input->post('PREMEDIKASI'),
                    $this->input->post('IVFD'),
                    $this->input->post('LAMPIRAN'),
                    $this->input->post('DC'),
                    $this->input->post('DARAH'),
                    $this->input->post('JUM_DARAH'),
                    $this->input->post('OBAT'),
                    $this->input->post('RONTGEN'),
                    $this->input->post('SAKIT_KRONIS'),
                    $this->input->post('LAPOR_DOKTER'),
                    $this->input->post('LAPOR_OK'),
                    $this->input->post('SURAT_IZIN'),
                    $this->input->post('TANDA_LOKASI'),
                    $this->input->post('GELANG'),
                    $this->input->post('LAIN'),
                    $this->input->post('CUKUR'),
                    $this->input->post('LEPAS_BEHEL'),
                    $this->input->post('HAPUS_LIPS'),
                    $this->input->post('ORAL_HYG'),
                    $this->input->post('FIKS_LEHER'),
                    $this->input->post('INFUS'),
                    $this->input->post('NGT'),
                    $this->input->post('DRAINAGE'),
                    $this->input->post('WSD'),
                    $this->input->post('SPO2'),
                    $this->input->post('PASANG_DC'), 
                    Date('Y-m-d H:i'),
                    $this->input->post('idoperasi')

                );
                $this->m_cppt->INSERT_DATA_UMUM_PRA_OP($params2);
                // $this->db->insert('INSERT_LAP_ANES', $params2)

                

                
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

         if ($this->tnotification->run() !== FALSE) {

            $alergi=  $this->input->post('RIWAYAT_ALERGI');
            if($alergi=='Tidak'){
                $alergi='Tidak';
            }
            else{
                $alergi=$this->input->post('RIWAYAT_ALERGI1');
            }
          
 
            $LAMPIRAN=''; 
            $LL=$this->input->post('LAMPIRAN');
            foreach($LL as $a){

                $LAMPIRAN .= $a . ', ';
       
               }

                 $params2 = array(
                    $this->input->post('FS_KD_REG'),
                    date('Y-m-d H:i:s'), 
                    $this->com_user['user_name'],
                    $this->input->post('KD_OPERATOR'),
                    $this->input->post('DIAGNOSA'),
                    $this->input->post('JENIS_OP'),
                    $this->input->post('MAKAN_TERAKHIR'),
                    $this->input->post('PUASA_JAM'),
                    $this->input->post('RIWAYAT_ASMA'),
                    $alergi,
                    $this->input->post('ANTIBIOTIK'),
                    $this->input->post('TB'),
                    $this->input->post('BB'),
                    $this->input->post('TD'),
                    $this->input->post('ND'),
                    $this->input->post('P'),
                    $this->input->post('SH'),
                    $this->input->post('PREMEDIKASI'),
                    $this->input->post('IVFD'),
                    $LAMPIRAN,
                    $this->input->post('DC'),
                    $this->input->post('DARAH'),
                    $this->input->post('JUM_DARAH'),
                    $this->input->post('OBAT'),
                    $this->input->post('RONTGEN'),
                    $this->input->post('SAKIT_KRONIS'),
                    $this->input->post('LAPOR_DOKTER'),
                    $this->input->post('LAPOR_OK'),
                    $this->input->post('SURAT_IZIN'),
                    $this->input->post('TANDA_LOKASI'),
                    $this->input->post('GELANG'),
                    $this->input->post('LAIN'),
                    $this->input->post('CUKUR'),
                    $this->input->post('LEPAS_BEHEL'),
                    $this->input->post('HAPUS_LIPS'),
                    $this->input->post('ORAL_HYG'),
                    $this->input->post('FIKS_LEHER'),
                    $this->input->post('INFUS'),
                    $this->input->post('NGT'),
                    $this->input->post('DRAINAGE'),
                    $this->input->post('WSD'),
                    $this->input->post('SPO2'),
                    date('Y-m-d H:i:s',  $this->input->post('Time_input_umum_pra')),
                    $this->input->post('PASANG_DC'),
                    Date('Y-m-d H:i'),
                    $this->input->post('idoperasi')

                );
                $this->m_cppt->DELETE_DATA_UMUM_PRA_OP( $this->input->post('idoperasi'));
                $this->m_cppt->INSERT_DATA_UMUM_PRA_OP($params2);
                // $this->db->insert('INSERT_LAP_ANES', $params2)

                
 
                
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("op/jadwal/detail/" . $this->input->post('idoperasi')."/".$this->input->post('FS_KD_REG'));
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

 
}
