<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class Anestesi_lokal extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_cppt');
        $this->load->model('m_igd');
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
                                                
   

    public function cari_process() {
        $FS_RG2 = $this->input->post('FS_RG');
        //$cek = $this->m_cppt->cek_resume(array($FS_RG2));
        //if ($cek == '0') {
           $rolenya=$this->com_user['role_name'];
        redirect("op/anestesi_lokal/add/" . $FS_RG2);
        //} elseif ($cek == '1') {
        //redirect("inap/cppt/edit/" . $FS_RG2);
        // }
    }

       
    public function add($FS_RG = '',$idoperasi='') {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "op/anestesi_lokal/add.html");
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

        
             $this->smarty->assign("rs_pasien", $this->m_igd->get_pasien_by_rg_ugd(array($FS_RG)));
         
        $this->smarty->assign("status", $this->m_igd->get_status_pantau(array($FS_RG)));
         
         $this->smarty->assign("rs_umum_pra", $this->m_cppt->get_list_umum_pra_by_rg2($FS_RG));
         
         $this->smarty->assign("data_operasi", $this->m_cppt->data_operasi(array($idoperasi)));
         
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
 


 


    public function add_process() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process

        // $fisik= " Tinggi: ".$this->input->post('Tinggi')." | Berat: ". $this->input->post('Berat')." | TD: ". $this->input->post('Tekanan')." | Nadi: ". $this->input->post('Nadi')." | Pernafasan: ". $this->input->post('Pernafasan');

         if ($this->tnotification->run() !== FALSE) {

 
            if($this->com_user['role_nm']=='Dokter'){
                $perawat='';
            }
            else{
               
                $perawat=$this->com_user['user_name'];
            }
                $params2 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('idoperasi'), 
                    $this->input->post('Tgl'), 
                    $this->input->post('Jam'), 
                    $this->input->post('diagnosa'), 
                    $this->input->post('nm_tindakan'), 
                    '',
                    $perawat,
                    $this->input->post('riwayat_op'), 
                    $this->input->post('riwayat_alergi'), 
                    $this->input->post('pasca_SADAR'), 
                    $this->input->post('pasca_TD'), 
                    $this->input->post('pasca_N'), 
                    $this->input->post('pasca_R'), 
                    $this->input->post('pasca_S'), 
                    $this->input->post('pasca_ALERGI'), 
                    $this->input->post('pasca_KOMPLI'), 
                    date('Y-m-d H:i:s'),
                    
                );
                $this->m_igd->INSERT_ANESTESI_LOKAL($params2);

                 
 
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

 

            if($this->com_user['role_nm']=='Dokter'){
                $perawat=$this->input->post('kd_perawat');
                $dokter=$this->com_user['user_name'];
            }
            else{
                $perawat=$this->com_user['user_name']; 
                $dokter=$this->input->post('kd_dokter');
            }
                $params2 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('idoperasi'), 
                    $this->input->post('Tgl'), 
                    $this->input->post('Jam'), 
                    $this->input->post('diagnosa'), 
                    $this->input->post('nm_tindakan'), 
                    $dokter,
                    $perawat,
                    $this->input->post('riwayat_op'), 
                    $this->input->post('riwayat_alergi'), 
                    $this->input->post('pasca_SADAR'), 
                    $this->input->post('pasca_TD'), 
                    $this->input->post('pasca_N'), 
                    $this->input->post('pasca_R'), 
                    $this->input->post('pasca_S'), 
                    $this->input->post('pasca_ALERGI'), 
                    $this->input->post('pasca_KOMPLI'), 
                    date('Y-m-d H:i:s'),
                    $this->input->post('idoperasi'), 
                    
                );
                $this->m_igd->UPDATE_ANESTESI_LOKAL($params2);

               
           
 
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
        $cek = $this->m_igd->cek_anes_lokal(array($id));
        if ($cek == '0') {
            redirect("op/anestesi_lokal/add/" . $FS_RG2."/".$id);
        } elseif ($cek >= '1') {
            
            redirect("op/anestesi_lokal/edit/" . $FS_RG2."/".$id);

        }
    }

    public function simpan_catatan() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process
 
         if ($this->tnotification->run() !== FALSE) {
              $params2 = array(
                    $this->input->post('idoperasi'),
                    $this->input->post('Tgl'),
                    $this->input->post('Jam'),
                    $this->input->post('SADAR'),
                    $this->input->post('TD'),
                    $this->input->post('N'),
                    $this->input->post('R'),
                    $this->input->post('S'),
                    $this->input->post('OBAT'),
                    $this->input->post('CAIRAN'),
                    $this->input->post('KET'),
                    $perawat=$this->com_user['user_name'],
                    date('Y-m-d H:i:s'),
                    
                );
                $this->m_igd->INSERT_PEMANTAUAN($params2); 

                $FS_RG2=$this->input->post('FS_KD_REG');
                $id=$this->input->post('idoperasi');
 
                // notification
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect

        redirect("op/anestesi_lokal/add/" . $FS_RG2."/".$id);

 
    }


    public function simpan_catatan2() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process
 
         if ($this->tnotification->run() !== FALSE) {
              $params2 = array(
                    $this->input->post('idoperasi'),
                    $this->input->post('Tgl'),
                    $this->input->post('Jam'),
                    $this->input->post('SADAR'),
                    $this->input->post('TD'),
                    $this->input->post('N'),
                    $this->input->post('R'),
                    $this->input->post('S'),
                    $this->input->post('OBAT'),
                    $this->input->post('CAIRAN'),
                    $this->input->post('KET'),
                    $perawat=$this->com_user['user_name'],
                    date('Y-m-d H:i:s'),
                    
                );
                $this->m_igd->INSERT_PEMANTAUAN($params2); 

                $FS_RG2=$this->input->post('FS_KD_REG');
                $id=$this->input->post('idoperasi');
 
                // notification
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect

        redirect("op/anestesi_lokal/edit/" . $FS_RG2."/".$id);

 
    }

    public function edit($FS_RG = '',$idoperasi='') {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "op/anestesi_lokal/edit.html");
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

        $this->smarty->assign("data", $this->m_igd->get_list_anes_lokal(array($FS_RG)));
        $this->smarty->assign("data_operasi", $this->m_cppt->data_operasi(array($idoperasi)));
        $this->smarty->assign("status", $this->m_igd->get_status_pantau(array($FS_RG)));
        
         $this->smarty->assign("rs_pasien", $this->m_cppt->get_pasien_by_rg(array($FS_RG)));
         
         $this->smarty->assign("rs_umum_pra", $this->m_cppt->get_list_umum_pra_by_rg2($FS_RG));
      
       
        $tgl=date('Y-m-d');

        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);

 
        $this->smarty->assign("rs_ases_medis", $this->m_cppt->get_data_medis_by_rg(array($FS_RG)));
        $this->smarty->assign("namarole", $rolenya);
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
