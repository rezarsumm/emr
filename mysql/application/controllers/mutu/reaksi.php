<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class reaksi extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_mutu_reaksi');
        $this->smarty->assign('m_mutu_reaksi', $this->m_mutu_reaksi);
        // load library
        $this->load->library('tnotification');
        $this->load->library('datetimemanipulation');
        $this->smarty->assign('dtm', $this->datetimemanipulation);
    }
        // tambah surat masuk
    public function index() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "mutu/reaksi/list.html");
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
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_MR', 'No MR', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            // insert
            redirect("mutu/reaksi/lists/" . $this->input->post('FS_MR'));
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
        }
        // default redirect
        redirect("mutu/reaksi/cari");
    }
    // tambah surat masuk
    public function lists($FS_MR = "") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "mutu/reaksi/list2.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $new_reg = number_format(347104100000000 + $FS_MR, 0, "", "");
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_mutu_reaksi->get_pasien_by_mr($new_reg));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }
    // tambah surat masuk
    public function add($FS_KD_REG="") {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "mutu/reaksi/add.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->assign("rs_pasien", $this->m_mutu_reaksi->get_pasien_by_rg(array($FS_KD_REG)));
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
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        $this->tnotification->set_rules('FS_KEJADIAN_REAKSI', 'KEJADIAN REAKSI', 'trim|required');
        $this->tnotification->set_rules('FD_TGL_KEJADIAN', 'TANGGAL KEJADIAN', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('FS_JENIS_REAKSI'),
                $this->input->post('FS_TINDAKAN_TRANS'),
                $this->input->post('FS_ANALISIS'),
                $this->com_user['user_id'],
                date('Y-m-d'),
                 $this->input->post('FS_KEJADIAN_REAKSI'),
                 $this->input->post('FD_TGL_KEJADIAN'),
                 $this->input->post('FS_NM_OBAT')
                );
            // insert
            if ($this->m_mutu_reaksi->insert($params)) {
                // notification
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Data berhasil disimpan");
            } else {
                // default error
                $this->tnotification->sent_notification("error", "Data gagal disimpan");
            }
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Data gagal disimpan");
        }
        // default redirect
        redirect("mutu/reaksi");
    }

    // edit surat masuk
    public function edit($FS_KD_TRANS_DARAH = "") {
        // set page rules
        $this->_set_page_rule("U");
        // set template content
        $this->smarty->assign("template_content", "mutu/reaksi/edit.html");
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        
        $this->smarty->assign("result", $this->m_mutu_reaksi->get_reak_trans_darah_by_id($FS_KD_TRANS_DARAH));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    // edit data
    public function edit_process() {
        // set page rules
        $this->_set_page_rule("U");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'NAMA PASIEN', 'trim|required');
        $this->tnotification->set_rules('FS_KEJADIAN_REAKSI', 'KEJADIAN REAKSI', 'trim|required');
        $this->tnotification->set_rules('FD_TGL_KEJADIAN', 'TANGGAL KEJADIAN', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_REG'),
                $this->input->post('FS_JENIS_REAKSI'),
                $this->input->post('FS_TINDAKAN_TRANS'),
                $this->input->post('FS_ANALISIS'),
                $this->com_user['user_id'],
                date('Y-m-d'),
                $this->input->post('FS_KEJADIAN_REAKSI'),
                $this->input->post('FD_TGL_KEJADIAN'),
                $this->input->post('FS_KD_TRANS_DARAH'),
                $this->input->post('FS_NM_OBAT')
            );
            // insert
            if ($this->m_mutu_reaksi->update($params)) {
                                // notification
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Data berhasil disimpan");
           } else {
                // default error
                $this->tnotification->sent_notification("error", "Data gagal disimpan");
            }
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Surat gagal dikirim");
        }
        // default redirect
        redirect("mutu/reaksi/edit/" . $this->input->post('FS_KD_TRANS_DARAH'));
    }

    // hapus process
    public function delete_process($FS_KD_TRANS_DARAH ="") {
        // set page rules
        $this->_set_page_rule("D");
            // insert
            if ($this->m_mutu_reaksi->delete($FS_KD_TRANS_DARAH)) {
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Data berhasil dihapus");
                // default redirect
                redirect("mutu/reaksi/lap_detil");
            } else {
                // default error
                $this->tnotification->sent_notification("error", "Data gagal dihapus");
            }

        // default redirect
        redirect("mutu/reaksi/lap_detil");
    }
    
     public function lap_rekap() {
        // set page rules
        $this->_set_page_rule("R");
        // set template content
        $this->smarty->assign("template_content", "mutu/reaksi/index_rekap.html");
        // tahun
        $year_now = date('Y');
        for ($i = ($year_now); $i >= ($year_now - 4); $i--) {
            $tahun[] = $i;
        }
        $this->smarty->assign("rs_tahun", $tahun);
        // get search parameter
        $search = $this->tsession->userdata('reak_trans_darah_search_rekap');
         if (!empty($search)) {
            $this->smarty->assign("search", $search);
        }
        if(empty($search['tahun'])){
            $search['tahun']=date('Y');
             $this->smarty->assign("search", $search);
        }       
        // search parameters
        $tahun = empty($search['tahun']) ? '%' : $search['tahun'];
        // get list data
        $this->smarty->assign("rs_rekap1_jan", $this->m_mutu_reaksi->get_tot_jan1(array($tahun)));
        $this->smarty->assign("rs_rekap1_feb", $this->m_mutu_reaksi->get_tot_feb1(array($tahun)));
        $this->smarty->assign("rs_rekap1_mar", $this->m_mutu_reaksi->get_tot_mar1(array($tahun)));
        $this->smarty->assign("rs_rekap1_apr", $this->m_mutu_reaksi->get_tot_apr1(array($tahun)));
        $this->smarty->assign("rs_rekap1_mei", $this->m_mutu_reaksi->get_tot_mei1(array($tahun)));
        $this->smarty->assign("rs_rekap1_jun", $this->m_mutu_reaksi->get_tot_jun1(array($tahun)));
        $this->smarty->assign("rs_rekap1_jul", $this->m_mutu_reaksi->get_tot_jul1(array($tahun)));
        $this->smarty->assign("rs_rekap1_agt", $this->m_mutu_reaksi->get_tot_agt1(array($tahun)));
        $this->smarty->assign("rs_rekap1_sep", $this->m_mutu_reaksi->get_tot_sep1(array($tahun)));
        $this->smarty->assign("rs_rekap1_okt", $this->m_mutu_reaksi->get_tot_okt1(array($tahun)));
        $this->smarty->assign("rs_rekap1_nov", $this->m_mutu_reaksi->get_tot_nov1(array($tahun)));
        $this->smarty->assign("rs_rekap1_des", $this->m_mutu_reaksi->get_tot_des1(array($tahun)));
        
        $this->smarty->assign("rs_rekap2_jan", $this->m_mutu_reaksi->get_tot_jan2(array($tahun)));
        $this->smarty->assign("rs_rekap2_feb", $this->m_mutu_reaksi->get_tot_feb2(array($tahun)));
        $this->smarty->assign("rs_rekap2_mar", $this->m_mutu_reaksi->get_tot_mar2(array($tahun)));
        $this->smarty->assign("rs_rekap2_apr", $this->m_mutu_reaksi->get_tot_apr2(array($tahun)));
        $this->smarty->assign("rs_rekap2_mei", $this->m_mutu_reaksi->get_tot_mei2(array($tahun)));
        $this->smarty->assign("rs_rekap2_jun", $this->m_mutu_reaksi->get_tot_jun2(array($tahun)));
        $this->smarty->assign("rs_rekap2_jul", $this->m_mutu_reaksi->get_tot_jul2(array($tahun)));
        $this->smarty->assign("rs_rekap2_agt", $this->m_mutu_reaksi->get_tot_agt2(array($tahun)));
        $this->smarty->assign("rs_rekap2_sep", $this->m_mutu_reaksi->get_tot_sep2(array($tahun)));
        $this->smarty->assign("rs_rekap2_okt", $this->m_mutu_reaksi->get_tot_okt2(array($tahun)));
        $this->smarty->assign("rs_rekap2_nov", $this->m_mutu_reaksi->get_tot_nov2(array($tahun)));
        $this->smarty->assign("rs_rekap2_des", $this->m_mutu_reaksi->get_tot_des2(array($tahun)));
        
        $this->smarty->assign("rs_rekap3_jan", $this->m_mutu_reaksi->get_tot_jan3(array($tahun)));
        $this->smarty->assign("rs_rekap3_feb", $this->m_mutu_reaksi->get_tot_feb3(array($tahun)));
        $this->smarty->assign("rs_rekap3_mar", $this->m_mutu_reaksi->get_tot_mar3(array($tahun)));
        $this->smarty->assign("rs_rekap3_apr", $this->m_mutu_reaksi->get_tot_apr3(array($tahun)));
        $this->smarty->assign("rs_rekap3_mei", $this->m_mutu_reaksi->get_tot_mei3(array($tahun)));
        $this->smarty->assign("rs_rekap3_jun", $this->m_mutu_reaksi->get_tot_jun3(array($tahun)));
        $this->smarty->assign("rs_rekap3_jul", $this->m_mutu_reaksi->get_tot_jul3(array($tahun)));
        $this->smarty->assign("rs_rekap3_agt", $this->m_mutu_reaksi->get_tot_agt3(array($tahun)));
        $this->smarty->assign("rs_rekap3_sep", $this->m_mutu_reaksi->get_tot_sep3(array($tahun)));
        $this->smarty->assign("rs_rekap3_okt", $this->m_mutu_reaksi->get_tot_okt3(array($tahun)));
        $this->smarty->assign("rs_rekap3_nov", $this->m_mutu_reaksi->get_tot_nov3(array($tahun)));
        $this->smarty->assign("rs_rekap3_des", $this->m_mutu_reaksi->get_tot_des3(array($tahun)));
        
        $this->smarty->assign("rs_rekap4_jan", $this->m_mutu_reaksi->get_tot_jan4(array($tahun)));
        $this->smarty->assign("rs_rekap4_feb", $this->m_mutu_reaksi->get_tot_feb4(array($tahun)));
        $this->smarty->assign("rs_rekap4_mar", $this->m_mutu_reaksi->get_tot_mar4(array($tahun)));
        $this->smarty->assign("rs_rekap4_apr", $this->m_mutu_reaksi->get_tot_apr4(array($tahun)));
        $this->smarty->assign("rs_rekap4_mei", $this->m_mutu_reaksi->get_tot_mei4(array($tahun)));
        $this->smarty->assign("rs_rekap4_jun", $this->m_mutu_reaksi->get_tot_jun4(array($tahun)));
        $this->smarty->assign("rs_rekap4_jul", $this->m_mutu_reaksi->get_tot_jul4(array($tahun)));
        $this->smarty->assign("rs_rekap4_agt", $this->m_mutu_reaksi->get_tot_agt4(array($tahun)));
        $this->smarty->assign("rs_rekap4_sep", $this->m_mutu_reaksi->get_tot_sep4(array($tahun)));
        $this->smarty->assign("rs_rekap4_okt", $this->m_mutu_reaksi->get_tot_okt4(array($tahun)));
        $this->smarty->assign("rs_rekap4_nov", $this->m_mutu_reaksi->get_tot_nov4(array($tahun)));
        $this->smarty->assign("rs_rekap4_des", $this->m_mutu_reaksi->get_tot_des4(array($tahun)));
        
        $this->smarty->assign("rs_total1", $this->m_mutu_reaksi->get_total1(array($tahun)));
        $this->smarty->assign("rs_total2", $this->m_mutu_reaksi->get_total2(array($tahun)));
        $this->smarty->assign("rs_total3", $this->m_mutu_reaksi->get_total3(array($tahun)));
        $this->smarty->assign("rs_total4", $this->m_mutu_reaksi->get_total4(array($tahun)));
        $this->smarty->assign("rs_total5", $this->m_mutu_reaksi->get_total5(array($tahun)));
        $this->smarty->assign("rs_total6", $this->m_mutu_reaksi->get_total6(array($tahun)));
        $this->smarty->assign("rs_total7", $this->m_mutu_reaksi->get_total7(array($tahun)));
        $this->smarty->assign("rs_total8", $this->m_mutu_reaksi->get_total8(array($tahun)));
        $this->smarty->assign("rs_total9", $this->m_mutu_reaksi->get_total9(array($tahun)));
        $this->smarty->assign("rs_total10", $this->m_mutu_reaksi->get_total10(array($tahun)));
        $this->smarty->assign("rs_total11", $this->m_mutu_reaksi->get_total11(array($tahun)));
        $this->smarty->assign("rs_total12", $this->m_mutu_reaksi->get_total12(array($tahun)));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }
    
    public function proses_cari_rekap() {
        //set page rules
        $this->_set_page_rule("R");
        //data
        if ($this->input->post('save') == "RESET") {
            $this->tsession->unset_userdata("reak_trans_darah_search_rekap");
        } else {
            $params = array(
                "tahun" => $this->input->post("tahun")
            );
            $this->tsession->set_userdata("reak_trans_darah_search_rekap", $params);
        }
        // redirect
        redirect("mutu/reaksi/lap_rekap");
    }
    
    public function lap_detil() {
        // set page rules
        $this->_set_page_rule("R");
        // set template content
        $this->smarty->assign("template_content", "mutu/reaksi/index_detil.html");
        // tahun
        $year_now = date('Y');
        for ($i = ($year_now); $i >= ($year_now - 4); $i--) {
            $tahun[] = $i;
        }
        $this->smarty->assign("rs_tahun", $tahun);
        $this->smarty->assign("rs_tahun2", $tahun);
        // bulan
        $rs_bulan = array(
            '1' => 'Januari',
            '2' => 'Februari',
            '3' => 'Maret',
            '4' => 'April',
            '5' => 'Mei',
            '6' => 'Juni',
            '7' => 'Juli',
            '8' => 'Agustus',
            '9' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        );
        $this->smarty->assign("rs_bulan", $rs_bulan);
        $this->smarty->assign("rs_bulan2", $rs_bulan);
        // get search parameter
        $search = $this->tsession->userdata('reak_trans_darah_search');
         if (!empty($search)) {
            $this->smarty->assign("search", $search);
        }
         if (!empty($search)) {
            $this->smarty->assign("search2", $search);
        }
        if(empty($search['bulan'])){
            $search['bulan']=date('m');
             $this->smarty->assign("search", $search);
        }
        if(empty($search['tahun'])){
            $search['tahun']=date('Y');
             $this->smarty->assign("search", $search);
        }
        if(empty($search['bulan2'])){
            $search['bulan2']=date('m');
             $this->smarty->assign("search2", $search);
        }
        if(empty($search['tahun2'])){
            $search['tahun2']=date('Y');
             $this->smarty->assign("search2", $search);
        }
        
        // search parameters
        $bulan = empty($search['bulan']) ? '%' : $search['bulan'];
        $tahun = empty($search['tahun']) ? '%' : $search['tahun'];
        $bulan2 = empty($search['bulan2']) ? '%' : $search['bulan2'];
        $tahun2 = empty($search['tahun2']) ? '%' : $search['tahun2'];
        $jenis = empty($search['jenis']) ? '%' : '%' . $search['jenis'] . '%';
        // pagination attribute
        $start = $this->uri->segment(4, 0) + 1;
        $this->smarty->assign("no", $start);
        /* end of pagination ---------------------- */
        // get list data
        $this->smarty->assign("rs_id", $this->m_mutu_reaksi->get_list_data_reak_trans_darah_lap(array($bulan,$bulan2,$tahun,$tahun2,$jenis)));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }
    
    public function proses_cari_detil() {
        //set page rules
        $this->_set_page_rule("R");
        //data
        if ($this->input->post('save') == "RESET") {
            $this->tsession->unset_userdata("reak_trans_darah_search");
        } else {
            $params = array(
                "bulan" => $this->input->post("bulan"),
                "tahun" => $this->input->post("tahun"),
                "bulan2" => $this->input->post("bulan2"),
                "tahun2" => $this->input->post("tahun2"),
                "jenis" => $this->input->post("jenis")
            );
            $this->tsession->set_userdata("reak_trans_darah_search", $params);
        }
        // redirect
        redirect("mutu/reaksi/lap_detil");
    }
    
    public function cetak($FS_KD_TRANS_DARAH = "") {
        $this->_set_page_rule("R");

        $this->load->library('html2pdf');
        $data['result'] = $this->m_mutu_reaksi->get_reak_trans_darah_by_id($FS_KD_TRANS_DARAH);

        ob_start();
        $this->load->view('mutu/reaksi/print', $data);
        $content = ob_get_contents();
        ob_end_clean();

        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output('kejadian_reaksi.pdf');
        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }
}
