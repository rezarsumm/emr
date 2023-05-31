<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class rekon extends ApplicationBase {

// constructor
    public function __construct() {
// parent constructor
        parent::__construct();
// load model
        $this->load->model('m_far_rekon');
        $this->load->library('tnotification');
    }

public function index() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "farmasi/rekon/list.html");
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
        $this->smarty->assign("rs_pasien", $this->m_far_rekon->get_pasien_bangsal(array($date, $date2, $date, $date, $date, $date, $date, $date, $date, $date, $date)));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }
    
    public function cari_process() {
        $FS_RG2 = $this->input->post('FS_RG');
        redirect("farmasi/rekon/add/" . $FS_RG2);
    }
    
    public function cari_process_cppt($FS_RG2 = "") {
        redirect("farmasi/rekon/add/" . $FS_RG2);
    }
    
    public function add($FS_RG = '') {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "farmasi/rekon/add.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        $this->smarty->load_javascript('resource/js/tinymce/tinymce.min.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_far_rekon->get_pasien_by_rg(array($FS_RG)));
        $this->smarty->assign("rs_resep", $this->m_far_rekon->get_resep());
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }
    
    public function SatBarang() {
        $FS_KD_BARANG = $this->input->post('FS_KD_BARANG');
        $data = $this->m_far_rekon->get_sat_barang(array($FS_KD_BARANG));
        echo json_encode($data);
    }
    
    public function add_process() {
        $params = array(
            $this->input->post('FS_KD_REG'),
            $this->input->post('FS_KD_OBAT'),
            $this->input->post('FS_DOSIS'),
            $this->input->post('FS_KD_SATUAN'),
            $this->input->post('FS_FREKUENSI'),
            $this->input->post('FS_CARA_PEMBERIAN'),
            $this->input->post('FS_TINDAK_LANJUT'),
            $this->input->post('FS_PERUBAHAN'),
            $this->input->post('FS_STATUS'),
            $this->com_user['user_name'],
            $date2 = date('Y-m-dH:i:s')
        );
        // insert
        $data = $this->m_far_rekon->insert($params);
        echo json_encode($data);
    }
    
    public function list_rekon() {
        $params = array(
            $this->input->post('FS_KD_REG2')
        );
        $data = $this->m_far_rekon->get_list_rekon_by_rg($params);
        echo json_encode($data);
    }
    
    public function delete_process() {
        $params = array(
            date('Y-m-d'),
            $this->com_user['user_name'],
            $this->input->post('kode')
        );
        // insert
        $data = $this->m_far_rekon->delete_process($params);
        echo json_encode($data);
    }
}
