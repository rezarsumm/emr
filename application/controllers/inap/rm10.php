<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class rm10 extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_rm10');
        $this->load->model('m_rawat_jalan');
        $this->load->model('m_ass_jatuh');
        // load library
        $this->load->library('tnotification');
        $this->load->library('pagination');
        $this->load->library('datetimemanipulation');
        $this->smarty->assign('dtm', $this->datetimemanipulation);
        $this->smarty->assign('m_rm10', $this->m_rm10);
    } 

    // tambah surat masuk
    public function index() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/rm10/list.html");
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
           if ($role == '6' || $role == '11'   || $role == '23' || $role == '9' || $role == '8' || $role == '17' || $role == '13') {
                 $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_bangsal());
            }  

         else  if ($role == '5') {
                 $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_bangsal($x));
            } 
              else if ($role == '23'){
                $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_bangsal(array($date, $date2, $date, $date, $date, $date, $date, $date, $date, $date, $date)));
            
            }
         else {
                $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_bangsal_by_bangsal(array($this->com_user['fs_kd_layanan'])));
            }
        }


        $this->smarty->assign("no",1);
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function cari_process() {
        $FS_RG2 = $this->input->post('FS_RG');
        $cek = $this->m_rm10->cek_rm10(array($FS_RG2));
        if ($cek == '0'){
            redirect("inap/rm10/add/" . $FS_RG2);
        }elseif($cek == '1'){
            redirect("inap/rm10/edit/" . $FS_RG2);
        }
    }
    
    public function cari_process_cppt($FS_RG2="") {
        $cek = $this->m_rm10->cek_rm10(array($FS_RG2));
        if ($cek == '0'){
            redirect("inap/rm10/add/" . $FS_RG2);
        }elseif($cek == '1'){
            redirect("inap/rm10/edit/" . $FS_RG2);
        }
    }

    // tambah surat masuk
    public function cari2() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/rm10/list_his.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function cari_process2() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_MR', 'No MR', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            // insert
            redirect("inap/rm10/lists2/" . $this->input->post('FS_MR'));
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("inap/rm10/cari2");
    }

    // tambah surat masuk
    public function lists($FS_MR = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/rm10/list2.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        //$new_reg = number_format(347104100000000 + $FS_MR, 0, "", "");
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_rm10->get_pasien_by_mr($FS_MR));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function lists2($FS_MR = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/rm10/list2.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $new_reg = number_format(347104100000000 + $FS_MR, 0, "", "");
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_rm10->get_pasien_by_mr($new_reg));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function add($FS_RG='') {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/rm10/add.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");


        $role = $this->com_user['role_id'];

        if ($role == '24'){
         $this->smarty->assign("rs_pasien", $this->m_rm10->get_pasien_by_rg_ugd(array($FS_RG)));
        }
        else{

        $this->smarty->assign("rs_pasien", $this->m_rm10->get_pasien_by_rg(array($FS_RG)));
    }
        //$this->smarty->assign("rs_layanan", $this->m_rm10->get_layanan());
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    } 

    public function edit($FS_RG = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/rm10/edit.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_rm10->get_pasien_by_rg(array($FS_RG)));
        $this->smarty->assign("rs_rm10", $this->m_rm10->get_rm10_by_rg(array($FS_RG)));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function edit_catatan($FS_KD_RM_10_1 = "", $FS_RG = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/rm10/edit_catatan.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_rm10->get_pasien_by_rg(array($FS_RG)));
        $this->smarty->assign("rs_rm10_1", $this->m_rm10->get_rm10_1_by_rg(array($FS_KD_RM_10_1)));
        
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function add_catatan($FS_RG = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/rm10/add_catatan.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_rm10->get_pasien_by_rg(array($FS_RG)));
        $this->smarty->assign("diag", $this->m_rm10->get_catatan_by_rg(array($FS_RG)));
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
        $this->smarty->assign("template_content", "inap/rm10/selesai.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_rm10->get_pasien_by_rg(array($FS_RG)));
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
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('FS_TOPIK'),
                $this->input->post('FS_DIBERIKAN'),
                $this->input->post('FS_TANGGAL'),
                $this->input->post('FS_KEBUTUHAN'),
                $this->input->post('FS_TUJUAN'),
                $this->input->post('FS_KEMAMPUAN'),
                $this->input->post('FS_KESIAPAN'),
                $this->input->post('FS_HAMBATAN'),
                $this->input->post('FS_INTERVENSI'),
                $this->input->post('FS_METODE'),
                $this->input->post('FS_HASIL'),
                $this->input->post('FS_JAM_MULAI'),
                $this->input->post('FS_JAM_SELESAI'),
                $this->input->post('FS_EDUKASI'),
                $this->com_user['user_id'],
                date('Y-m-d')
            );
            // insert
            if ($this->m_rm10->insert_catatan($params)) {
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
        redirect("inap/rm10/add_catatan/" . $this->input->post('FS_KD_REG'));
    }

    // hapus process
    public function delete_process_catatan($FS_RM_10_1 = "", $FS_KD_REG = "") {
        // set page rules
        $this->_set_page_rule("D");
        // insert
        if ($this->m_rm10->delete_catatan($FS_RM_10_1)) {
            $this->tnotification->delete_last_field();
            $this->tnotification->sent_notification("success", "Data berhasil dihapus");
            // default redirect
            redirect("inap/rm10/add_catatan/" . $FS_KD_REG);
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Data gagal dihapus");
        }
        // default redirect
        redirect("inap/rm10/add_catatan/" . $FS_KD_REG);
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
                $this->input->post('FS_BAHASA1'),
                $this->input->post('FS_BAHASA2'),
                $this->input->post('FS_TIPE_BAHASA1'),
                $this->input->post('FS_TIPE_BAHASA2'),
                $this->input->post('FS_NILAI'),
                $this->input->post('FS_NILAI2'),
                $this->input->post('FS_MEMBACA'),
                $this->input->post('FS_HAMBATAN_EMOSI'),
                $this->input->post('FS_HAMBATAN_EMOSI2'),
                $this->input->post('FS_KETERBATASAN_FISIK'),
                $this->input->post('FS_KETERBATASAN_FISIK2'),
                $this->input->post('FS_KETERBATASAN_KOGNITIF'),
                $this->input->post('FS_KETERBATASAN_KOGNITIF2'),
                $this->input->post('FS_MENERIMA_INFO'),
                $this->com_user['user_id'],
                date('Y-m-d')
            );

            // insert
            if ($this->m_rm10->insert($params)) {
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
        redirect("inap/rm10/add_catatan/" . $this->input->post('FS_KD_REG'));
    }

    public function edit_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        $this->tnotification->set_rules('FS_RM_10', 'ID Data', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_BAHASA1'),
                $this->input->post('FS_BAHASA2'),
                $this->input->post('FS_TIPE_BAHASA1'),
                $this->input->post('FS_TIPE_BAHASA2'),
                $this->input->post('FS_NILAI'),
                $this->input->post('FS_NILAI2'),
                $this->input->post('FS_MEMBACA'),
                $this->input->post('FS_HAMBATAN_EMOSI'),
                $this->input->post('FS_HAMBATAN_EMOSI2'),
                $this->input->post('FS_KETERBATASAN_FISIK'),
                $this->input->post('FS_KETERBATASAN_FISIK2'),
                $this->input->post('FS_KETERBATASAN_KOGNITIF'),
                $this->input->post('FS_KETERBATASAN_KOGNITIF2'),
                $this->input->post('FS_MENERIMA_INFO'),
                date('Y-m-d'),
                $this->input->post('FS_RM_10')
            );
            // insert
            if ($this->m_rm10->update($params)) {
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
        redirect("inap/rm10/add_catatan/" . $this->input->post('FS_KD_REG'));
    }

    public function edit_catatan_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        $this->tnotification->set_rules('FS_KD_RM_10_1', 'ID Data', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_TOPIK'),
                $this->input->post('FS_DIBERIKAN'),
                $this->input->post('FS_TANGGAL'),
                $this->input->post('FS_KEBUTUHAN'),
                $this->input->post('FS_TUJUAN'),
                $this->input->post('FS_KEMAMPUAN'),
                $this->input->post('FS_KESIAPAN'),
                $this->input->post('FS_HAMBATAN'),
                $this->input->post('FS_INTERVENSI'),
                $this->input->post('FS_METODE'),
                $this->input->post('FS_HASIL'),
                $this->input->post('FS_CATATAN'),
                $this->input->post('FS_JAM_MULAI'),
                $this->input->post('FS_JAM_SELESAI'),
                //$this->com_user['user_id'],
                date('Y-m-d'),
                $this->input->post('FS_KD_RM_10_1')
            );
            // insert
            if ($this->m_rm10->update_catatan($params)) {
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
        redirect("inap/rm10/add_catatan/" . $this->input->post('FS_KD_REG'));
    }

    public function cetak_resume($FS_KD_REG = "") {
        $this->_set_page_rule("R");

        $this->load->library('html2pdf');
        $data['rs_pasien'] = $this->m_rm10->get_pasien_by_rg(array($FS_KD_REG));
        $data['rs_rm10'] = $this->m_rm10->get_rm10_by_rg(array($FS_KD_REG));
        $data['rs_rm10all'] = $this->m_rm10->get_rm10_by_rg_all(array($FS_KD_REG));
        //header
        $data["header1"] = $this->m_rawat_jalan->get_header1();
        $data["header2"] = $this->m_rawat_jalan->get_header2();
        ob_start();
        $this->load->view('inap/rm10/print', $data);
        $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output('catatan_edukasi.pdf');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }

    // view file for view
    public function view_file($file_id = "") {
        // get detail file
        $result = $this->m_surat->view_file($file_id);
        $file_path['file'] = 'resource/doc/surat_masuk/' . $result['dossier_id'] . '/' . $result['file_nm'];
        echo json_encode($file_path);
    }

    // list_users
    public function list_user() {
        $users = $this->m_surat->get_all_users();
        $data[] = array();
        $i = 0;
        foreach ($users as $key => $value) {
            $data[$i] = array(
                'label' => $value['nama_lengkap'],
                'value' => $value['user_id']
            );
            $i++;
        }
        echo json_encode($data);
    }

    // list_users
    public function list_diet() {
        $instansi = $this->m_resume->get_all_diet();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['FS_NM_DIET'],
                'value' => $value['FS_KD_DIET']
            );
            $i++;
        }
        echo json_encode($data);
    }

    // list_users
    public function list_eksternal() {
        $instansi = $this->m_surat->get_all_eksternal();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['FS_NAMA_TUJUAN'],
                'value' => $value['FS_KD_UND_DAFTAR_HADIR_EKS']
            );
            $i++;
        }
        echo json_encode($data);
    }

}
