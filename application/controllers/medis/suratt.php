<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class suratt extends ApplicationBase {
 
// constructor
    public function __construct() {
// parent constructor
        parent::__construct();
// load model

        $this->load->model('m_rawat_jalan');
        $this->smarty->assign('m_rawat_jalan', $this->m_rawat_jalan);
        $this->load->library('tnotification');
    }

// list surat masuk
    public function index() {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "medis/surat/index.html");
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
        
        $this->smarty->assign("FD_TGL_MASUK", $search['FD_TGL_MASUK']);
        
        $FD_TGL_MASUK = empty($search['FD_TGL_MASUK']) ? : $search['FD_TGL_MASUK'];
         $x = $this->com_user['user_name'];
        $FS_KD_PEG = $this->com_user['user_name'];
         
        $now = date('Y-m-d');
// get search parameter
        $this->smarty->assign("no", '1');  
        $this->smarty->assign("x", $x);  
            $y = $this->com_user['role_nm'];


       if($x=='216'|| $x=='217' || $x=='211'  || $x=='215'|| $x=='213'|| $x=='202' || $x=='203' || $x=='206'  || $x=='211' || $x=='207' || $x=='209' || $x=='219'  || $x=='220' || $x=='221' || $x=='312' || $x=='222' || $x=='223'|| $x=='208' ||  $x=='224' ||  $x=='225' ||  $x=='226' || $x=='227' || $x=='229' || $x=='230' || $x=='231'){

        $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_px_by_dokter_wait_dokter10(array($FD_TGL_MASUK,  $FS_KD_PEG)));
        }
          else  if($y='Perawat Poli'){
             $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_px_by_dokter_wait_dokter1(array($FD_TGL_MASUK, $FD_TGL_MASUK, $FS_KD_PEG)));
        }

        else{
         $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_px_by_dokter_wait_dokter(array($FD_TGL_MASUK, $FS_KD_PEG,$FD_TGL_MASUK, $FS_KD_PEG)));           
        }

        // $this->smarty->assign("pasien_konsul", $this->m_rawat_jalan->get_px_konsul(array($FS_KD_PEG,$FD_TGL_MASUK)));           

// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }


    public function create_suratsakit($FS_KD_REG = "") { 

        $ceksuratsakit = $this->m_rawat_jalan->cek_surat_sakit(array($FS_KD_REG));

        if ($ceksuratsakit >= '1') {
           // set page rules
           $this->_set_page_rule("R");
           // set template content
                   $this->smarty->assign("template_content", "medis/surat/edit_suratsakit.html");
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
                   $this->smarty->assign("ket_sakit", $this->m_rawat_jalan->data_surat_sakit(array($FS_KD_REG)));
           // notification
                   $this->tnotification->display_notification();
                   $this->tnotification->display_last_field();
           // output
                   parent::display();
        }
        else{

        // set page rules
                $this->_set_page_rule("R");
        // set template content
                $this->smarty->assign("template_content", "medis/surat/create_suratsakit.html");
                $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
                $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
                $this->smarty->load_javascript('resource/js/jquery/select2.js');
                $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
                // load style
                $this->smarty->load_style("jquery.ui/select2/select2.css");
                // load style ui
                $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
                $now = date('Y-m-d');
                $this->smarty->assign("vs", $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG)));
                $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG)));
                $this->smarty->assign("rs_skdp_alasan", $this->m_rawat_jalan->get_tac_com_parameter_alasan());
        // notification
                $this->tnotification->display_notification();
                $this->tnotification->display_last_field();
        // output
                parent::display();
            }
    }


     public function simpan_suratsakit() {
                // set page rules
                $this->_set_page_rule("C");
                // cek input
                $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
                // process
                if ($this->tnotification->run() !== FALSE) {
                  
                    $params = array(
                        $this->input->post('FS_KD_REG'),
                        $this->input->post('sekolah'),
                        $this->input->post('pekerjaan'),
                        $this->input->post('tglmulai'),
                        $this->input->post('jumlahhari'),
                         $this->com_user['user_name'],
                        date('Y-m-d')
                    ); 
                     if ($this->m_rawat_jalan->insert_suratsakit($params)) {
                         
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
                redirect("medis/suratt");
            }



            public function update_suratsakit() {
                // set page rules
                $this->_set_page_rule("C");
                // cek input
                $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
                // process
                if ($this->tnotification->run() !== FALSE) {
                  
                    $params = array(
                         $this->input->post('sekolah'),
                        $this->input->post('pekerjaan'),
                        $this->input->post('tglmulai'),
                        $this->input->post('jumlahhari'),
                         $this->com_user['user_name'],
                        date('Y-m-d'),
                        $this->input->post('FS_KD_REG'),
                    ); 
                     if ($this->m_rawat_jalan->update_suratsakit($params)) {
                         
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
                redirect("medis/suratt");
            }



            public function cetak_suratsakit($FS_KD_REG = "") {
                $this->_set_page_rule("R");
                $this->load->library('html2pdf');
                $now = date('Y-m-d');
                $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG));
                $data['result']= $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG));
                $data['ket_sakit']= $this->m_rawat_jalan->data_surat_sakit(array($FS_KD_REG));
                 ob_start();
                $this->load->view('medis/surat/suratsakit', $data);
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









            public function create_skd($FS_KD_REG = "") { 

                $cekskd = $this->m_rawat_jalan->cek_skd(array($FS_KD_REG));
        
                if ($cekskd >= '1') {
                   // set page rules
                   $this->_set_page_rule("R");
                   // set template content
                           $this->smarty->assign("template_content", "medis/surat/edit_skd.html");
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
                           $this->smarty->assign("ket_skd", $this->m_rawat_jalan->data_skd(array($FS_KD_REG)));
                   // notification
                           $this->tnotification->display_notification();
                           $this->tnotification->display_last_field();
                   // output
                           parent::display();
                }
                else{
        
                // set page rules
                        $this->_set_page_rule("R");
                // set template content
                        $this->smarty->assign("template_content", "medis/surat/create_skd.html");
                        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
                        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
                        $this->smarty->load_javascript('resource/js/jquery/select2.js');
                        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
                        // load style
                        $this->smarty->load_style("jquery.ui/select2/select2.css");
                        // load style ui
                        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
                        $now = date('Y-m-d');
                        $this->smarty->assign("vs", $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG)));
                        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG))); 
                // notification
                        $this->tnotification->display_notification();
                        $this->tnotification->display_last_field();
                // output
                        parent::display();
                    }
            }
        
        
             public function simpan_skd() {
                        // set page rules
                        $this->_set_page_rule("C");
                        // cek input
                        $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
                        // process 

                        //cek nomor surat terakhir
                        $ceknomormax=$this->m_rawat_jalan->get_max_nomor_skd();
                        $nomax=$ceknomormax['nomax'];
                        // if($nomax<1){
                        //     $nomorsurat=1;
                        // }
                        // else{
                          
                        // }

                         $nomorsurat=$nomax+1;


                        if($this->input->post('TUJUANSURAT')=='lainnya'){
                            $tujuansurat=$this->input->post('TUJUANSURAT2');
                        } 
                        else{
                            $tujuansurat=$this->input->post('TUJUANSURAT');
                        }

                        if ($this->tnotification->run() !== FALSE) {
                          
                            $params = array(
                                $this->input->post('FS_KD_REG'), 
                                $this->input->post('PEKERJAAN'),
                                $this->input->post('FS_BB'),
                                $this->input->post('FS_TB'),
                                $this->input->post('FS_TD'),
                                $this->input->post('BUTA_WARNA'),
                                $this->input->post('KACAMATA'),
                                $tujuansurat,
                                $nomorsurat,
                                 $this->com_user['user_name'],
                                date('Y-m-d')
                            ); 
                             if ($this->m_rawat_jalan->insert_skd($params)) {
                                 
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
                        redirect("medis/suratt");
          }
        
        
        
         public function update_skd() {
                        // set page rules
                        $this->_set_page_rule("C");
                        // cek input
                        $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
                        // process
                        if($this->input->post('TUJUANSURAT')=='lainnya'){
                            $tujuansurat=$this->input->post('TUJUANSURAT2');
                        } 
                        else{
                            $tujuansurat=$this->input->post('TUJUANSURAT');
                        }

                        if ($this->tnotification->run() !== FALSE) {
                          
                            $params = array(
                                $this->input->post('PEKERJAAN'),
                                $this->input->post('FS_BB'),
                                $this->input->post('FS_TB'),
                                $this->input->post('FS_TD'),
                                $this->input->post('BUTA_WARNA'),
                                $this->input->post('KACAMATA'),
                                $tujuansurat,
                                 
                                 $this->com_user['user_name'],
                                date('Y-m-d'),
                                $this->input->post('FS_KD_REG'),
                            ); 
                             if ($this->m_rawat_jalan->update_skd($params)) {
                                 
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
                        redirect("medis/suratt");
                    }
        
        
        
                    public function cetak_skd($FS_KD_REG = "") {
                        $this->_set_page_rule("R");
                        $this->load->library('html2pdf');
                        $now = date('Y-m-d');
                        $data['rs_pasien'] = $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG));
                        $data['result']= $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($FS_KD_REG));
                        $data['ket_skd']= $this->m_rawat_jalan->data_skd(array($FS_KD_REG));
                         ob_start();
                        $this->load->view('medis/surat/skd', $data);
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
}


