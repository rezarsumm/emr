<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
// load base class if needed
require_once(APPPATH . 'controllers/base/OperatorBase.php');

class berkas_rawat extends ApplicationBase {

// constructor
	public function __construct() {
// parent constructor
		parent::__construct();
// load model
		$this->load->model('m_rm');
		$this->load->model('m_rawat_jalan');
		$this->load->model('m_ass_awal');
		$this->smarty->assign('m_rawat_jalan', $this->m_rawat_jalan);
		$this->smarty->assign('m_rm', $this->m_rm);
		$this->load->library('tnotification');
	}

	public function index() {
// set page rules
		$this->_set_page_rule("R");
// set template content
		$this->smarty->assign("template_content", "rm/berkas_rawat/index.html");
		$this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
		$this->smarty->load_javascript('resource/js/jquery/select2.js');
		$this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
		$this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
		$this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
		$search = $this->tsession->userdata('rm_berkas_rawat');
		if (!empty($search)) {
			$this->smarty->assign("search", $search);
		}
		if (empty($search['FS_MR'])) {
			$search['FS_MR'] = '';
			$this->smarty->assign("search", $search);
		}
		$this->smarty->assign("FS_MR", $search['FS_MR']);
		if (empty($search['FS_KD_JENIS_REG'])) {
			$search['FS_KD_JENIS_REG'] = "%0%";
			$this->smarty->assign("search", $search);
		}
        // search parameters
		$new_reg = number_format(347104100000000 + $search['FS_MR'], 0, "", "");
		$FS_MR = empty($new_reg) ? : $new_reg;
		$FS_KD_JENIS_REG = empty($search['FS_KD_JENIS_REG']) ? :  '%' .$search['FS_KD_JENIS_REG'].'%';
		$this->smarty->assign("now", date('Y-m-d'));

		$date = date('Y-m-d');
		$date2 = date('Y-m-dH:i:s');
		$role = $this->com_user['role_id'];
		if ($role == '12') {
			$this->smarty->assign("rs_pasien", $this->m_ass_awal->get_pasien_bangsal_by_bangsal(array($date, $date2, $this->com_user['fs_kd_layanan'])));
            //kby&firdaus
		} elseif ($role == '22') {
			$this->smarty->assign("rs_pasien", $this->m_ass_awal->get_pasien_bangsal_kby(array($date, $date2)));
          //vk & firdaus  
		} elseif ($role == '24') {
			$this->smarty->assign("rs_pasien", $this->m_ass_awal->get_pasien_bangsal_vk(array($date, $date2)));
		} elseif ($role == '27') {
			$this->smarty->assign("rs_pasien", $this->m_ass_awal->get_pasien_bangsal_covid(array($date, $date2)));
		} else {
			$this->smarty->assign("rs_pasien", $this->m_ass_awal->get_pasien_bangsal(array($date, $date2)));
		}
// get search parameter
		$this->smarty->assign("result", $this->m_rm->get_data_px_by_rm(array($FS_MR)));

		if($FS_KD_JENIS_REG=='%1%'){
			$this->smarty->assign("rs_pasien2", $this->m_rm->get_px_history_ri(array($FS_MR)));
		}else{
			$this->smarty->assign("rs_pasien2", $this->m_rm->get_px_history2(array($FS_MR,$FS_KD_JENIS_REG)));
		}

        // notification
		$this->tnotification->display_notification();
		$this->tnotification->display_last_field();
// output
		parent::display();
	}

	public function proses_cari() {
        //set page rules
		$this->_set_page_rule("R");
        //data
		if ($this->input->post('save') == "Reset") {
			$this->tsession->unset_userdata("rm_berkas_rawat");
		} else {
			$params = array(
				"FS_MR" => $this->input->post("FS_MR"),
				"FS_KD_JENIS_REG" => $this->input->post("FS_KD_JENIS_REG")
			);
			$this->tsession->set_userdata("rm_berkas_rawat", $params);
		}
        // redirect
		redirect("rm/berkas_rawat");
	}
}