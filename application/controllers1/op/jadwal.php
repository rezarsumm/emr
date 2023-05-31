<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class Jadwal extends ApplicationBase {

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

  
    public function save_img() {

        $this->load->helper('file');

        define('UPLOAD_DIR', './uploads/');
        $idoperasi = $this->input->post('idoperasi');
        $FS_KD_REG = $this->input->post('FS_KD_REG');
        $nama=uniqid();

        $cek = $this->m_cppt->cek_file_lap_anes($this->input->post('idoperasi'));
        if ($cek == '0') { //tambah
            $params2 = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('idoperasi'),
                $nama.".jpg",
                $this->com_user['user_name'],
                date('Y-m-d H:i:s'), 
                
            );
            $this->m_cppt->INSERT_FILE_ANES($params2);
        } elseif ($cek >= '1') { //update
            $params2 = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('idoperasi'),
                $nama.".jpg",
                $this->com_user['user_name'],
                date('Y-m-d H:i:s'), 
                $this->input->post('idoperasi'),
            );

            $this->m_cppt->UPDATE_FILE_ANES($params2);
           

        }

       


        $img = $this->input->post('imgBase64');
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
       
        $file = UPLOAD_DIR . $nama . '.jpg';
        $success = file_put_contents($file, $data);
        redirect("op/jadwal/detail/" . $this->input->post('idoperasi')."/".$this->input->post('FS_KD_REG'));
        
     }



     public function save_rr() {

        $this->load->helper('file');

        define('UPLOAD_DIR', './uploads/');
        $idoperasi = $this->input->post('idoperasi');
        $FS_KD_REG = $this->input->post('FS_KD_REG');
        $nama=uniqid();

        $cek = $this->m_cppt->cek_file_rr($this->input->post('idoperasi'));
        if ($cek == '0') { //tambah
            $params2 = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('idoperasi'),
                $nama.".jpg",
                $this->com_user['user_name'],
                date('Y-m-d H:i:s'), 
                
            );
            $this->m_cppt->INSERT_FILE_RR($params2);
        } elseif ($cek >= '1') { //update
            $params2 = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('idoperasi'),
                $nama.".jpg",
                $this->com_user['user_name'],
                date('Y-m-d H:i:s'), 
                $this->input->post('idoperasi'),
            );

            $this->m_cppt->UPDATE_FILE_RR($params2);
           

        }

       


        $img = $this->input->post('imgBase64');
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
       
        $file = UPLOAD_DIR . $nama . '.jpg';
        $success = file_put_contents($file, $data);
        redirect("op/jadwal/detail/" . $this->input->post('idoperasi')."/".$this->input->post('FS_KD_REG'));
        
     }
 
        
 
     public function entry_progress($FS_RG2='',$id='') { 
        $cek = $this->m_cppt->cek_file_lap_anes($id);
        if ($cek == '0') {
            redirect("op/laporananes/progress/" . $FS_RG2."/".$id);
        } elseif ($cek >= '1') {
            
            redirect("op/laporananes/edit_progress/" . $FS_RG2."/".$id);

        }
    }


    public function entry_rr($FS_RG2='',$id='') { 
        $cek = $this->m_cppt->cek_file_rr($id);
        if ($cek == '0') {
            redirect("op/laporananes/evaluasi_rr/" . $FS_RG2."/".$id);
        } elseif ($cek >= '1') {
            
            redirect("op/laporananes/edit_evaluasi_rr/" . $FS_RG2."/".$id);

        }
    }




    public function index() {
        // set page rules
                $this->_set_page_rule("R");
        // set template content
                $this->smarty->assign("template_content", "op/jadwal/index.html");
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
                
                $this->smarty->assign("FD_TGL_MASUK", $search['FD_TGL_MASUK']);
                
                $FD_TGL_MASUK = empty($search['FD_TGL_MASUK']) ? : $search['FD_TGL_MASUK'];
           
                $x = $this->com_user['user_name'];
                $FS_KD_PEG = $this->com_user['user_name'];
             
                $now = date('Y-m-d'); 

                if($rolenya=='Dokter'){
                    if($x=='130'){
                       $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_px_op(array($FD_TGL_MASUK, $FS_KD_PEG,$FD_TGL_MASUK, $FS_KD_PEG)));           

                    }
                    else{
                     $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_px_op2(array($x)));           

                    }
                }
                else{ 
                    $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_px_op(array($FD_TGL_MASUK, $FS_KD_PEG,$FD_TGL_MASUK, $FS_KD_PEG)));           
               
                }
                $this->smarty->assign("no", '1');  
         
             
                 
        // notification
                $this->tnotification->display_notification();
                $this->tnotification->display_last_field();
        // output
                parent::display();
            }
            
 

    public function detail($id='', $FS_RG = '') { 
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "op/jadwal/detail.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->assign("rs_op", $this->m_cppt->get_px_op_by_id(array($id)));           

        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");

         $role = $this->com_user['role_id'];
         $rolenya=$this->com_user['role_nm'];
          $this->smarty->assign("username", $this->com_user['user_name']);
          $this->smarty->assign("rolenya", $this->com_user['role_nm']);
          $this->smarty->assign("FS_RG", $FS_RG);
          $this->smarty->assign("id", $id);
          $idoperasi=$id;

        $ide=$this->db->query("select periode, nadi, respirasi, tekanan_darah_atas, tekanan_darah_bawah from PKU.dbo.PROGRES_ANESTESI where idoperasi=$idoperasi")->result_array();

         $this->smarty->assign("karyawan", $ide); 
         $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_pasien_ok_by_rgx(array($FS_RG)));
         $this->smarty->assign("cek_umum_pra", $this->m_cppt->cek_umum_pra(array($id)));
         $this->smarty->assign("cek_umum_post", $this->m_cppt->cek_umum_post(array($id)));
         $this->smarty->assign("cek_lap_anes", $this->m_cppt->cek_lap_anes(array($id)));
         $this->smarty->assign("cek_lap_op", $this->m_cppt->cek_lap_op(array($id)));
         $this->smarty->assign("cek_rencana_post_op", $this->m_cppt->cek_rencana_post_op(array($id)));
         $this->smarty->assign("cek_checklist", $this->m_cppt->cek_checklist(array($id)));
         $this->smarty->assign("cek_askep", $this->m_cppt->cek_askep(array($id)));
         $this->smarty->assign("cek_alat_habis_pakai", $this->m_cppt->cek_alat_habis_pakai(array($id)));
         $this->smarty->assign("cek_ases_pra_anes", $this->m_cppt->cek_ases_pra_anes(array($id)));
         $this->smarty->assign("cek_ases_pra_op", $this->m_cppt->cek_ases_pra_op(array($id)));
    
        
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
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


    public function add() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "op/jadwal/add.html");
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

     
           $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_px_op(array($FD_TGL_MASUK, $FS_KD_PEG,$FD_TGL_MASUK, $FS_KD_PEG)));           

       
      
        $this->smarty->assign("idoperasi", $idoperasi);
        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);
         $this->smarty->assign("namarole", $rolenya);
        $this->smarty->assign("rs_resume", $this->m_cppt->get_data_resume_by_rg(array($FS_RG)));
     
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }



    public function grafik($idoperasi='',$FS_RG='' ){

        $role = $this->com_user['role_id'];
        $rolenya=$this->com_user['role_nm'];
 
  
        // $this->smarty->assign("cek_lap_anes", $this->m_cppt->cek_lap_anes(array($id)));
        // $this->smarty->assign("cek_lap_op", $this->m_cppt->cek_lap_op(array($id)));
        // $this->smarty->assign("cek_rencana_post_op", $this->m_cppt->cek_rencana_post_op(array($id)));
        // $this->smarty->assign("cek_checklist", $this->m_cppt->cek_checklist(array($id)));
        // $this->smarty->assign("cek_askep", $this->m_cppt->cek_askep(array($id)));
        // $this->smarty->assign("cek_alat_habis_pakai", $this->m_cppt->cek_alat_habis_pakai(array($id)));
        // $this->smarty->assign("cek_ases_pra_anes", $this->m_cppt->cek_ases_pra_anes(array($id)));
        // $this->smarty->assign("cek_ases_pra_op", $this->m_cppt->cek_ases_pra_op(array($id)));


        $data['username']=$this->com_user['user_name'];
        $data['rolenya']=$this->com_user['role_nm'];
        $data['FS_RG']=$FS_RG;
        $data['id']=$idoperasi;
        $data['rs_pasien']=$this->m_rawat_jalan->get_pasien_ok_by_rg(array($FS_RG));
        $data['cek_umum_pra']=$this->m_cppt->cek_umum_pra(array($id));
        // $data['']=
        // $data['']=
        // $data['']=
        $data['karyawan']=$this->db->query("select periode, nadi, respirasi, tekanan_darah_atas, tekanan_darah_bawah from PKU.dbo.PROGRES_ANESTESI where idoperasi=$idoperasi");
        $data['karyawan2']=$this->db->query("select umur, count(*) as total from karyawan group by umur");
        $this->load->view('op/jadwal/tes',$data);
    }

    public function edit($id='') {
       
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "op/jadwal/edit.html");
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

        $this->smarty->assign("rs_pasien_inap", $this->m_cppt->get_pasien_inap(array($tgl)));
        $this->smarty->assign("rs_dokter_sp", $this->m_cppt->get_dokter_sp(array($FS_RG)));
        $this->smarty->assign("data_operasi", $this->m_cppt->data_operasi(array($id)));

    
        $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_px_op(array($FD_TGL_MASUK, $FS_KD_PEG,$FD_TGL_MASUK, $FS_KD_PEG)));           

       
      
        $this->smarty->assign("idoperasi", $idoperasi);
        $this->smarty->assign("role_id", $this->com_user['role_id']);
        $this->smarty->assign("tgl", $tgl);
         $this->smarty->assign("namarole", $rolenya);
      
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();


    }



    public function bhp() { 
        // set page rules
                $this->_set_page_rule("R");
        // set template content
                $this->smarty->assign("template_content", "op/jadwal/bhp.html");
                $this->smarty->load_javascript('resource/js/jquery.datatables/jquery.dataTables.js');
                $this->smarty->load_javascript('resource/js/jquery.datatables/dataTables.fixedHeader.js');
                $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
                $this->smarty->load_style("jquery.ui/datatables/jquery.dataTables.css");
                $this->smarty->load_javascript('resource/js/jquery/jquery-ui-1.9.2.custom.min.js');
                $this->smarty->assign("now", $now);
                $this->smarty->assign("listbhp", $this->m_cppt->list_bhp_masuk());
                   parent::display();
            } 

  


    public function create_pdf(){
        
        $this->_set_page_rule("R");

        $this->load->library('html2pdf'); 
        $data['rs_pasien']= $this->m_rawat_jalan->all_op($FS_KD_REG);           
        ob_start();
         $content = ob_get_contents();
        ob_end_clean();

        $data['karyawan']=$this->db->query("select jenis_kelamin, count(*) as total from karyawan group by jenis_kelamin");
         
        try {
            $html2pdf = new HTML2PDF('L', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($_POST["hidden_html"]);
            $html2pdf->Output('grafik.pdf');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
        
        
    }

     


    public function add_process() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process
 
  
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
              
                // $a=$this->m_cppt->INSERT_MHS($params2);
              
                // if($a=='FALSE'){
                //     $this->m_cppt->INSERT_MHS($params2);
                // }

                // $this->db->insert('INSERT_LAP_ANES', $params2) 

                
                // $idcheck=$this->m_cppt->get_id_check($this->input->post('idoperasi'));
                // $idcheck=$idcheck['id'];

                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            
        
        // default redirect
        redirect("op/jadwal");
    }


    public function edit_process() { 
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process
 
  
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
                // $this->db->insert('INSERT_LAP_ANES', $params2) 

        
                    
                // $idcheck=$this->m_cppt->get_id_check($this->input->post('idoperasi'));
                // $idcheck=$idcheck['id'];

                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            
        
        // default redirect
        redirect("op/jadwal");
    }


}
