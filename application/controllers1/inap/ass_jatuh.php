<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class ass_jatuh extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_ass_jatuh');
        // load library
        $this->load->library('tnotification');
        $this->load->library('pagination');
        $this->load->library('datetimemanipulation');
        $this->smarty->assign('dtm', $this->datetimemanipulation);
        $this->smarty->assign('m_ass_jatuh', $this->m_ass_jatuh);
    }

    // tambah surat masuk
    public function index() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $role = $this->com_user['role_id'];

        if ($role == '24'){

        $this->smarty->assign("template_content", "inap/ass_jatuh/listugd.html");
        } 
        else{
         $this->smarty->assign("template_content", "inap/ass_jatuh/list.html");
        }
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
        
          $fs_kd_layanan = $this->com_user['fs_kd_layanan'];

        if($fs_kd_layanan == 'MNA')
        {
              $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_mina());
        }

        else{

             if ($role == '6'){
            $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_bangsal(array($date, $date2, $date, $date, $date, $date, $date, $date, $date, $date, $date)));
        
        }
          else if ($role == '23'){
            $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_bangsal(array($date, $date2, $date, $date, $date, $date, $date, $date, $date, $date, $date)));
        
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

    // tambah surat masuk
    public function cari2() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/ass_jatuh/list_his.html");
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

    public function cari_process() {
        $FS_RG2 = $this->input->post('FS_RG');
        //$cek = $this->m_ass_jatuh->cek_ass_jatuh(array($FS_RG2));
        //if ($cek == '0') {
            redirect("inap/ass_jatuh/add/" . $FS_RG2);
       // } elseif ($cek == '1') {
       //     redirect("inap/ass_jatuh/edit/" . $FS_RG2);
        //}
    }




    public function cari_process_cppt($FS_RG2="") {
            redirect("inap/ass_jatuh/add/" . $FS_RG2);
    }

    public function cari_process2() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_MR', 'No MR', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            // insert
            redirect("inap/ass_jatuh/lists2/" . $this->input->post('FS_MR'));
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("inap/ass_jatuh/cari2");
    }

    // tambah surat masuk
    public function lists($FS_MR = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/ass_jatuh/list2.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        //$new_reg = number_format(347104100000000 + $FS_MR, 0, "", "");
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_by_mr($FS_MR));
        //$this->smarty->assign("rs_ass_jatuh", $this->m_ass_jatuh->get_all_ass_jatuh($new_reg));
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
        $this->smarty->assign("template_content", "inap/ass_jatuh/list2.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $new_reg = number_format(347104100000000 + $FS_MR, 0, "", "");
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_by_mr($new_reg));
        //$this->smarty->assign("rs_ass_jatuh", $this->m_ass_jatuh->get_all_ass_jatuh($new_reg));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function add($FS_RG = '') {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "inap/ass_jatuh/add.html");
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
         $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_by_rg_ugd(array($FS_RG)));
        }
        else{

        $this->smarty->assign("rs_pasien", $this->m_ass_jatuh->get_pasien_by_rg(array($FS_RG)));
        }
        $this->smarty->assign("rs_result_anak", $this->m_ass_jatuh->get_jatuh_anak_by_rg(array($FS_RG)));
        $this->smarty->assign("rs_result_dewasa", $this->m_ass_jatuh->get_jatuh_dewasa_by_rg(array($FS_RG)));
        $this->smarty->assign("rs_result_dewasa2", $this->m_ass_jatuh->get_jatuh_dewasa2_by_rg(array($FS_RG)));
        //$this->smarty->assign("rs_layanan", $this->m_ass_jatuh->get_layanan());
        $this->smarty->assign("rs_jatuh", $this->m_ass_jatuh->get_com_jatuh());

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

  

    // add data
    public function add_process() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            
            $params = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('FS_TIPE_RISIKO_JATUH'),
                $this->com_user['user_id'],
                date('Y-m-d'),
                date('H:i:s')
            );
            // insert
            if ($this->m_ass_jatuh->insert($params)) {
                $FS_KD_JATUH2 = $this->m_ass_jatuh->get_last_inserted_id();
                $params1 = array(
                    $FS_KD_JATUH2,
                    $this->input->post('FS_PARAM_1'),
                    $this->input->post('FS_PARAM_2'),
                    $this->input->post('FS_PARAM_3'),
                    $this->input->post('FS_PARAM_4'),
                    $this->input->post('FS_PARAM_5'),
                    $this->input->post('FS_PARAM_6'),
                    $this->input->post('FS_PARAM_7'),
                    $this->input->post('FS_PARAM_8'),
                    $this->input->post('FS_PARAM_9'),
                    $this->input->post('FS_PARAM_10'),
                    $this->input->post('FS_PARAM_11'),
                    $this->input->post('FS_PARAM_12'),
                    $this->input->post('FS_PARAM_13'),
                    $this->input->post('FS_PARAM_14'),
                    $this->input->post('FS_PARAM_15'),
                    $this->input->post('FS_PARAM_16'),
                    $this->input->post('FS_PARAM_17'),
                    $this->com_user['user_id'],
                    date('Y-m-d')
                    
                );
                $this->m_ass_jatuh->insert2($params1);
                $FS_KD_JATUH3 = $this->m_ass_jatuh->get_last_inserted_id();
                $pencegahan_jatuh = $this->input->post('tujuan');
                if (!empty($pencegahan_jatuh)) {
                    foreach ($pencegahan_jatuh as $value) {
                        $this->m_ass_jatuh->insert_pencegahan_jatuh(array($FS_KD_JATUH3, $value));
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
        redirect("inap/ass_jatuh/add/". $this->input->post('FS_KD_REG'));
    }

  
    public function list_pencegahan_jatuh() {
        $instansi = $this->m_ass_jatuh->list_pencegahan_jatuh();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'label' => $value['FS_NM_PENCEGAHAN_JATUH'],
                'value' => $value['FS_KD_TRS']
            );
            $i++;
        }
        echo json_encode($data);
    }

}
