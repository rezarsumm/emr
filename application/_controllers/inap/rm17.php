<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class rm17 extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_rm17');
        $this->load->model('m_rawat_jalan');
        // load library
        $this->load->library('tnotification');
        $this->smarty->assign('m_rm17', $this->m_rm17);
    }

    // tambah surat masuk
    public function index() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/rm17/list.html");
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
        $this->smarty->assign("rs_pasien", $this->m_rm17->get_pasien_bangsal(array($date, $date2, $date, $date, $date, $date, $date, $date, $date, $date, $date)));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function cari_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_RG', 'No REG', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            // insert
            redirect("inap/rm17/add/" . $this->input->post('FS_RG'));
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("inap/rm17/add/".$this->input->post('FS_RG'));
    }

    // tambah surat masuk
    public function lists($FS_MR = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/rm17/list2.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        //$new_reg = number_format(347104100000000 + $FS_MR, 0, "", "");
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_rm17->get_pasien_by_mr($FS_MR));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function add($FS_RG="") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/rm17/add.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
         $search = $this->tsession->userdata('rm17_search');
        if (!empty($search)) {
            $this->smarty->assign("search", $search);
        }

       /* if (empty($search['tanggal'])) {
            $search['tanggal'] = date('Y-m-d');
            $this->smarty->assign("search", $search);
        }
        if (empty($search['tanggal2'])) {
            $search['tanggal2'] = date('Y-m-d');
            $this->smarty->assign("search", $search);
        }*/
        //$tgl = empty($search['tanggal']) ? '%' : $search['tanggal'];
        //$tgl2 = empty($search['tanggal2']) ? '%' : $search['tanggal2'];
        if(!empty($FS_RG)){
            $FS_RG;
            $this->smarty->assign("rs_pasien", $this->m_rm17->get_pasien_by_rg(array($FS_RG)));
            $this->smarty->assign("rs_rm17", $this->m_rm17->get_all_rm17_by_rg(array($FS_RG)));
            
        }else{
           $FS_RG2 = $this->input->post('FS_RG');
           $this->smarty->assign("rs_pasien", $this->m_rm17->get_pasien_by_rg(array($FS_RG2)));
           $this->smarty->assign("rs_rm17", $this->m_rm17->get_all_rm17_by_rg(array($FS_RG)));
        }
        $FS_RG = $this->input->post('FS_RG');
        
        $this->smarty->assign("rs_layanan", $this->m_rm17->get_layanan());
        
        $this->smarty->assign("rs_obat", $this->m_rm17->get_obat());
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }
    
    public function proses_cari2() {
        //set page rules
        $this->_set_page_rule("R");
        //data
        if ($this->input->post('save') == "RESET") {
            $this->tsession->unset_userdata("rm17_search");
        } else {
            $params = array(
                "tanggal" => $this->input->post("tanggal"),
                "tanggal2" => $this->input->post("tanggal2")
            );
            $this->tsession->set_userdata("rm17_search", $params);
        }
        // redirect
        redirect("inap/rm17/add/".$this->input->post("FS_KD_REG"));
    }

    public function edit($FS_ID = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/rm17/edit.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("result", $this->m_rm17->get_rm17_by_id(array($FS_ID)));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function add_catatan($FS_RG = "", $FS_RM17 = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/rm17/add_catatan.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_rm17->get_pasien_by_rg(array($FS_RG)));
        $this->smarty->assign("rs_catatan_obat", $this->m_rm17->get_catatan_obat_by_rg(array($FS_RM17)));
        $this->smarty->assign("rs_rm17", $this->m_rm17->get_rm17_detail_by_id(array($FS_RM17)));
        $this->smarty->assign("rs_perawat", $this->m_rm17->get_perawat(array($FS_RG)));
        $this->smarty->assign("result", $this->m_rm17->get_rm17_by_id(array($FS_RM17)));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function selesai($FS_RG = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/rm17/selesai.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_rm17->get_pasien_by_rg(array($FS_RG)));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function add_catatan_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_RM17', 'KODE CATATAN OBAT', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_RM17'),
                $this->input->post('FS_CHK_OBAT'),
                $this->input->post('FS_CHK_DOSIS'),
                $this->input->post('FS_CHK_PASIEN'),
                $this->input->post('FS_CHK_RUTE'),
                $this->input->post('FD_WAKTU'),
                $this->input->post('FS_KD_PEG'),
                $this->input->post('FS_KD_PEG2'),
                $this->com_user['user_id'],
                date('Y-m-d')
            );
            // insert
            if ($this->m_rm17->insert_catatan($params)) {
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
        redirect("inap/rm17/add/" . $this->input->post('FS_KD_REG'));
    }

    // hapus process
    public function delete_process($FS_RM_17 = "", $FS_KD_REG = "") {
        // set page rules
        $this->_set_page_rule("D");
        // insert
        if ($this->m_rm17->delete($FS_RM_17)) {
            $this->tnotification->delete_last_field();
            $this->tnotification->sent_notification("success", "Data berhasil dihapus");
            // default redirect
            redirect("inap/rm17/add/" . $FS_KD_REG);
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Data gagal dihapus");
        }
        // default redirect
        redirect("inap/rm17/add/" . $FS_KD_REG);
    }

    public function delete_process_catatan($FS_RM_17_DETAIL = "", $FS_KD_REG = "", $FS_RM_17 = "") {
        // set page rules
        $this->_set_page_rule("D");
        // insert
        if ($this->m_rm17->delete_catatan($FS_RM_17_DETAIL)) {
            $this->tnotification->delete_last_field();
            $this->tnotification->sent_notification("success", "Data berhasil dihapus");
            // default redirect
            redirect("inap/rm17/add_catatan/" . $FS_KD_REG . '/' . $FS_RM_17);
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Data gagal dihapus");
        }
        // default redirect
        redirect("inap/rm17/add_catatan/" . $FS_KD_REG . '/' . $FS_RM_17);
    }

    // add data
    public function add_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process

        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('FD_TGL_PEMBERIAN_OBAT'),
                $this->input->post('FS_JENIS_OBAT'),
                $this->input->post('FS_NAMA_OBAT'),
                $this->input->post('FS_DOSIS_OBAT'),
                $this->input->post('FS_RUTE'),
                $this->input->post('FS_INTERVAL'),
                $this->input->post('FS_KET'),
                $this->com_user['user_id'],
                date('Y-m-d')
            );

            // insert
            if ($this->m_rm17->insert($params)) {
                $last_id = $this->m_rm17->get_last_inserted_id();
                $datarm40 = $this->m_rm17->get_nama_obat_by_rg(array($this->input->post('FS_KD_REG'), $this->input->post('FS_NAMA_OBAT')));
                if ($datarm40['TOTAL'] == '0') {
                    if ($this->input->post('FS_JENIS_OBAT') == '1') {
                        $params2 = array(
                            $this->input->post('FS_NAMA_OBAT'),
                            $this->input->post('FS_DOSIS_OBAT'),
                            $this->input->post('FS_INTERVAL'),
                            $this->input->post('FS_KD_REG'),
                            $this->com_user['user_id'],
                            date('Y-m-d')
                        );
                        $this->m_rm17->insert_terapi($params2);
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
        redirect("inap/rm17/add/" . $this->input->post('FS_KD_REG'));
    }

    public function edit_process() {
        // set page rules
        $this->_set_page_rule("U");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        $this->tnotification->set_rules('FS_KD_RM17', 'ID Data', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FD_TGL_PEMBERIAN_OBAT'),
                $this->input->post('FS_JENIS_OBAT'),
                $this->input->post('FS_NAMA_OBAT'),
                $this->input->post('FS_DOSIS_OBAT'),
                $this->input->post('FS_RUTE'),
                $this->input->post('FS_INTERVAL'),
                $this->input->post('FS_KET'),
                $this->com_user['user_id'],
                date('Y-m-d'),
                $this->input->post('FS_KD_RM17')
            );
            // insert
            if ($this->m_rm17->update($params)) {
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
        redirect("inap/rm17/add/" . $this->input->post('FS_KD_REG'));
    }

    public function cetak($FS_KD_REG = "") {
        $this->_set_page_rule("R");

        $this->load->library('html2pdf');
        $data['rs_pasien'] = $this->m_rm17->get_pasien_by_rg(array($FS_KD_REG));
        $data['rs_rm17all'] = $this->m_rm17->get_rm17_by_rg_all(array($FS_KD_REG));
                //header
        $data["header1"] = $this->m_rawat_jalan->get_header1();
        $data["header2"] = $this->m_rawat_jalan->get_header2();
        ob_start();
        $this->load->view('inap/rm17/print', $data);
        $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF('L', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output('catatan_pemberian_obat.pdf');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }

}
