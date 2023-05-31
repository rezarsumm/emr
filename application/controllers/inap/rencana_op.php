<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class Rencana_op extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct(); 
        // load model
        $this->load->model('m_cppt');
        $this->load->model('m_igd');
        $this->load->model('m_resume');
        $this->load->model('m_ass_jatuh');
        $this->load->model('m_ass_awal');
        $this->load->model('m_rawat_inap');
        
        // load library
        $this->load->library('tnotification');
        $this->load->library('pagination');
        $this->load->library('datetimemanipulation');
        $this->load->library('tupload');
        //$this->load->library('twhatsapp');
        $this->smarty->assign('dtm', $this->datetimemanipulation);
        $this->smarty->assign('m_cppt', $this->m_cppt);
    }



    public function index() {
        // set page rules
                $this->_set_page_rule("R");
        // set template content
                $this->smarty->assign("template_content", "inap/rencana_op/index.html");
                $this->smarty->load_javascript('resource/js/jquery.datatables/jquery.dataTables.js');
                $this->smarty->load_javascript('resource/js/jquery.datatables/dataTables.fixedHeader.js');
                $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
                $this->smarty->load_style("jquery.ui/datatables/jquery.dataTables.css");
        // load javascript
                $this->smarty->load_javascript('resource/js/jquery/jquery-ui-1.9.2.custom.min.js');
                $rolenya=$this->com_user['role_nm'];
                $this->smarty->assign("username", $this->com_user['user_name']);
                $this->smarty->assign("rolenya", $this->com_user['role_nm']);
        
                $search = $this->tsession->userdata('medis_rawat_jalan');
                
                if (!empty($search)) {
                    $this->smarty->assign("search", $search);
                }
                if (empty($search['FD_TGL_MASUK'])) {
                    $search['FD_TGL_MASUK'] = date('Y-m-d');
                    $this->smarty->assign("search", $search);
                }
                
                $this->smarty->assign("cek_umum_pra", $this->m_cppt->cek_umum_pra(array($id)));

                $this->smarty->assign("FD_TGL_MASUK", $search['FD_TGL_MASUK']);
             
                $FD_TGL_MASUK = empty($search['FD_TGL_MASUK']) ? : $search['FD_TGL_MASUK'];
           
                $x = $this->com_user['user_name'];
                $FS_KD_PEG = $this->com_user['user_name'];
             
                $now = date('Y-m-d'); 
                $fs_kd_layanan = $this->com_user['fs_kd_layanan'];
          
                if($fs_kd_layanan == 'MNA')
                {
                      $this->smarty->assign("rs_pasien", $this->m_igd->get_px_op_mina());
                }
                else{
                     
                     $this->smarty->assign("rs_pasien", $this->m_igd->get_px_op_bangsal(array($fs_kd_layanan)));           
                }
              
                $this->smarty->assign("no", '1');  
         
             
                 
        // notification
                $this->tnotification->display_notification();
                $this->tnotification->display_last_field();
        // output
                parent::display();
            }
            




 
     
 
   

    public function cari_proses() {
        $FS_RG2 = $this->input->post('FS_RG');
        $cek = $this->m_igd->cek_rencana_op(array($FS_RG2));
        if ($cek == '0') {
           $rolenya=$this->com_user['role_name'];
             redirect("inap/rencana_op/add/" . $FS_RG2);
        } elseif ($cek >= '1') {
         redirect("inap/rencana_op/edit/" . $FS_RG2);
        }
    }


     
    
    public function transfer() {
        $FS_RG=$this->input->post('FS_KD_REG');
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/rencana_op/transfer.html");
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

                          $fs_kd_layanan = $this->com_user['fs_kd_layanan'];

        $this->smarty->assign("rs_pasien", $this->m_igd->get_pasien_by_rg_ugd(array($FS_RG)));
        $this->smarty->assign("perawat", $this->m_igd->get_data_perawat_by_noreg(array($FS_RG)));           
         $this->smarty->assign("bangsal", $this->m_igd->get_bangsal());  
        $this->smarty->assign("ruang", $this->m_igd->get_ruang());           

        
         $this->smarty->assign("kamar", $this->m_igd->ruang_now(array($FS_RG)));       
             
         $this->smarty->assign("medis", $this->m_igd->get_data_medis_by_noreg(array($FS_RG)));           

         $this->smarty->assign("alergi", $this->m_igd->get_medis_inap(array($FS_RG)));
         $this->smarty->assign("terapi", $this->m_igd->get_terapi_tf(array($fs_kd_layanan, $FS_RG)));
         $this->smarty->assign("penunjang", $this->m_igd->get_cek_lab_cppt(array($FS_RG)));
         

        $this->smarty->assign("rs_dokter", $this->m_igd->get_dokter_sp());       
    
        $this->smarty->assign("vs", $this->m_ass_awal->get_data_vs_by_rg(array($FS_RG)));
        $this->smarty->assign("ases2", $this->m_ass_awal->get_data_ases2_by_rg(array($FS_RG)));
       
        $FS_KD_REG=$FS_RG;
           
        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);
         $this->smarty->assign("namarole", $rolenya); 
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }


 

 
    public function entry($FS_RG = '',$idoperasi='') {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/rencana_op/entry.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("alergi", $this->m_ass_awal->get_data_alergi_by_rg(array($FS_RG)));

         $role = $this->com_user['role_id'];
         $rolenya=$this->com_user['role_nm'];
          $this->smarty->assign("username", $this->com_user['user_name']);
          $this->smarty->assign("idoperasi", $idoperasi);
          $this->smarty->assign("rs_op", $this->m_cppt->get_px_op_by_id(array($idoperasi)));           

          $this->smarty->assign("ases2", $this->m_rawat_inap->get_data_medis_by_rg2(array($FS_RG)));

        $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_pasien_ok_by_rgxx(array($FS_RG)));
          $this->smarty->assign("alergi", $this->m_igd->get_data_alergi_by_rg(array($FS_RG)));
         //  $this->smarty->assign("rs_pra_anes", $this->m_cppt->get_list_pra_anes_by_rg2($FS_RG));
         $this->smarty->assign("rs_umum_pra", $this->m_cppt->get_list_umum_pra_by_rg3($idoperasi));
         
         $this->smarty->assign("rs_umum_pra3", $this->m_cppt->get_list_umum_pra_by_rg($FS_RG));
 
        $tgl=date('Y-m-d');
     
        $this->smarty->assign("vs", $this->m_ass_awal->get_data_vs_by_rg(array($FS_RG)));

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


    public function add() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/rencana_op/add.html");
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

        $this->smarty->assign("rs_pasien_inap", $this->m_cppt->get_pasien_inap2(array($tgl)));
        $this->smarty->assign("rs_dokter_sp", $this->m_cppt->get_dokter_sp(array($FS_RG)));

     
        $fs_kd_layanan = $this->com_user['fs_kd_layanan'];
          
        if($fs_kd_layanan == 'MNA')
        {
              $this->smarty->assign("rs_pasien", $this->m_igd->get_px_op_mina());
              $this->smarty->assign("rs_pasien_bangsal", $this->m_ass_jatuh->get_pasien_mina());
        }
        else{
             
             $this->smarty->assign("rs_pasien", $this->m_igd->get_px_op_bangsal(array($fs_kd_layanan)));   
             $this->smarty->assign("rs_pasien_bangsal", $this->m_ass_jatuh->get_pasien_bangsal_by_bangsal(array($this->com_user['fs_kd_layanan'])));
                 
        }
      
        $this->smarty->assign("idoperasi", $idoperasi);
        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);
         $this->smarty->assign("namarole", $rolenya);
       
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }





    
    public function entry_process() { 
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
        redirect("inap/rencana_op");
    }


    
    public function add_process1() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        $this->tnotification->set_rules('Kode_Dokter', 'Kode_Dokter', 'trim|required');
        // process
             if ($this->tnotification->run() !== FALSE) {
  
                 $params2 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('tanggalop'),
                    $this->input->post('nmtindakan'),
                    '',
                    $this->input->post('STATUS_OP'),
                    'jenis',
                    'rekanan', 
                    'kodebooking',
                    $this->input->post('Kode_Dokter'),
                    '',
                    '',
                    $this->com_user['user_name'],
                    date('Y-m-d H:i:s'), 
                    
                );
                $this->m_cppt->INSERT_DATA_OP($params2);
               
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            } 
            else { 
                // default error
                $this->tnotification->sent_notification("error", "Detail gagal disimpan");
            }
        
        // default redirect
        redirect("inap/rencana_op");
    }



    public function edit($id='') {
       
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/rencana_op/edit.html");
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

         $this->smarty->assign("data_operasi", $this->m_igd->data_operasi(array($id)));

         
        $this->smarty->assign("rs_pasien_inap", $this->m_cppt->get_pasien_inap2(array($tgl)));
        $this->smarty->assign("rs_dokter_sp", $this->m_cppt->get_dokter_sp(array($FS_RG)));
        $this->smarty->assign("idoperasi", $id);

      
        $fs_kd_layanan = $this->com_user['fs_kd_layanan'];
          
        if($fs_kd_layanan == 'MNA')
        {
              $this->smarty->assign("rs_pasien", $this->m_igd->get_px_op_mina());
              $this->smarty->assign("rs_pasien_bangsal", $this->m_ass_jatuh->get_pasien_mina());
        }
        else{
             
             $this->smarty->assign("rs_pasien", $this->m_igd->get_px_op_bangsal(array($fs_kd_layanan)));   
             $this->smarty->assign("rs_pasien_bangsal", $this->m_ass_jatuh->get_pasien_bangsal_by_bangsal(array($this->com_user['fs_kd_layanan'])));
                 
        }
       
     
        
        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);
         $this->smarty->assign("namarole", $rolenya);
      
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();


    }



    public function edit_process1() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        $this->tnotification->set_rules('Kode_Dokter', 'Kode_Dokter', 'trim|required');
        // process
 
        if ($this->tnotification->run() !== FALSE) {
  
                 $params2 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('tanggalop'),
                    $this->input->post('nmtindakan'),
                    '',
                    $this->input->post('STATUS_OP'),
                    'jenis',
                    'rekanan', 
                    'kodebooking',
                    $this->input->post('Kode_Dokter'),
                    '',
                    '',
                    $this->com_user['user_name'],
                    date('Y-m-d H:i:s'), 
                    $this->input->post('id'),

                    
                );
                $this->m_cppt->UPDATE_DATA_OP($params2);
               

                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            } 
            else { 
                // default error
                $this->tnotification->sent_notification("error", "Detail gagal disimpan");
            }
        
        // default redirect
        redirect("inap/rencana_op");
    
    }




    public function add_process() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {

        

            $params = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('DIAGNOSA'),
                $this->input->post('TGL_MRS'),
                $this->input->post('JAM_MRS'), 
                $this->input->post('ALASAN_MRS'), 
                $this->input->post('TGL_rencana_op'), 
                $this->input->post('JAM_rencana_op'), 
                $this->input->post('ESTIMASI_TGL'), 
                $this->input->post('PENGARUH_P'), 
                $this->input->post('PENGARUH_K'), 
                $this->input->post('PENGARUH_JOB'), 
                $this->input->post('ANTI').' '.$this->input->post('ANTI2'), 
                $this->input->post('BANTUAN'), 
                $this->input->post('PEMBANTU').' '.$this->input->post('PEMBANTU2'), 
                $this->input->post('TINGGAL').' '.$this->input->post('TINGGAL2'), 
                $this->input->post('ALAT_MEDIS').' '.$this->input->post('ALAT_MEDIS2'), 
                $this->input->post('ALAT_BANTU').' '.$this->input->post('ALAT_BANTU2'), 
                $this->input->post('BANTU_KHUSUS').' '.$this->input->post('BANTU_KHUSUS2'), 
                $this->input->post('K_PRIBADI').' '.$this->input->post('K_PRIBADI2'), 
                $this->input->post('NYERI').' '.$this->input->post('NYERI2'), 
                $this->input->post('EDUKASI').' '.$this->input->post('EDUKASI2'), 
                $this->input->post('KETR').' '.$this->input->post('KETR2'),  
                $this->com_user['user_name'],
                date('Y-m-d H:i'),
            );
            // insert 
            $this->m_igd->DELETE_RP($this->input->post('FS_KD_REG'));
            if ($this->m_igd->INSERT_RP($params)) {
               
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
        redirect("inap/rencana_op");
    }


}