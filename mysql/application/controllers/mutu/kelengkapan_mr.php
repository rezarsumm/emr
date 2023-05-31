<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class kelengkapan_mr extends ApplicationBase {

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_kelengkapan_mr');
        $this->smarty->assign("m_kelengkapan_mr", $this->m_kelengkapan_mr);
        // load library
        $this->load->library('tnotification');
        $this->load->library('pagination');
    }

    // list surat nota
    public function index() {
        // set page rules
        $this->_set_page_rule("R");
        // set template content
        $this->smarty->assign("template_content", "mutu/kelengkapan_mr/index.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        // get search parameter
        $search = $this->tsession->userdata('kelengkapan_mr_search');
        if (!empty($search)) {
            $this->smarty->assign("search", $search);
        }

        if (empty($search['tanggal'])) {
            $search['tanggal'] = date('Y-m-d');
            $this->smarty->assign("search", $search);
        }
        if (empty($search['tanggal2'])) {
            $search['tanggal2'] = date('Y-m-d');
            $this->smarty->assign("search", $search);
        }
        // search parameters
        $tanggal = empty($search['tanggal']) ? '%' : $search['tanggal'];
        $tanggal2 = empty($search['tanggal2']) ? '%' : $search['tanggal2'];
        // get list data
        //$params = array($this->com_user['user_id'],$perihal, $kepada, $bulan, $tahun, ($start - 1), $config['per_page']);
        //$this->smarty->assign("rs_id", $this->m_kelengkapan_mr->get_list_kelengkapan_mr_lap(array($mr,$layanan,$bulan,$tahun)));
        $this->smarty->assign("rs_id", $this->m_kelengkapan_mr->get_all_unit_lap());
        $this->smarty->assign("rs_total1", $this->m_kelengkapan_mr->get_total1(array($tanggal, $tanggal2)));
        $this->smarty->assign("rs_total2", $this->m_kelengkapan_mr->get_total2(array($tanggal, $tanggal2)));
        $this->smarty->assign("rs_total3", $this->m_kelengkapan_mr->get_total3(array($tanggal, $tanggal2)));
        $this->smarty->assign("rs_total4", $this->m_kelengkapan_mr->get_total4(array($tanggal, $tanggal2)));
        $this->smarty->assign("rs_total5", $this->m_kelengkapan_mr->get_total5(array($tanggal, $tanggal2)));
        $this->smarty->assign("rs_total6", $this->m_kelengkapan_mr->get_total6(array($tanggal, $tanggal2)));
        $this->smarty->assign("rs_total7", $this->m_kelengkapan_mr->get_total7(array($tanggal, $tanggal2)));
        $this->smarty->assign("rs_total8", $this->m_kelengkapan_mr->get_total8(array($tanggal, $tanggal2)));
        $this->smarty->assign("rs_total9", $this->m_kelengkapan_mr->get_total9(array($tanggal, $tanggal2)));
        $this->smarty->assign("rs_total10", $this->m_kelengkapan_mr->get_total10(array($tanggal, $tanggal2)));
        $this->smarty->assign("rs_total11", $this->m_kelengkapan_mr->get_total11(array($tanggal, $tanggal2)));
        $this->smarty->assign("rs_total12", $this->m_kelengkapan_mr->get_total12(array($tanggal, $tanggal2)));
        $this->smarty->assign("rs_total13", $this->m_kelengkapan_mr->get_total13(array($tanggal, $tanggal2)));
        $this->smarty->assign("rs_total14", $this->m_kelengkapan_mr->get_total14(array($tanggal, $tanggal2)));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    // list surat nota
    public function index_2() {
        // set page rules
        $this->_set_page_rule("R");
        // set template content
        $this->smarty->assign("template_content", "mutu/kelengkapan_mr/index2.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        // tahun
        // get search parameter
        $search = $this->tsession->userdata('kelengkapan_mr_search2');
        if (!empty($search)) {
            $this->smarty->assign("search", $search);
        }

        if (empty($search['tanggal'])) {
            $search['tanggal'] = date('Y-m-d');
            $this->smarty->assign("search", $search);
        }
        if (empty($search['tanggal2'])) {
            $search['tanggal2'] = date('Y-m-d');
            $this->smarty->assign("search", $search);
        }
        // search parameters
        $bulan = empty($search['tanggal']) ? '%' : $search['tanggal'];
        $bulan = empty($search['tanggal']) ? '%' : $search['tanggal'];
        $tahun = empty($search['tanggal2']) ? '%' : $search['tanggal2'];
        $this->smarty->assign("no", 1);
        // get list data
        $this->smarty->assign("rs_id", $this->m_kelengkapan_mr->get_all_kelengkapan_mr2(array($bulan, $tahun)));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function index_3() {
        $this->smarty->assign("template_content", "mutu/kelengkapan_mr/index3.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");

        $search = $this->tsession->userdata('kelengkapan_mr_search3');
        if (!empty($search)) {
            $this->smarty->assign("search", $search);
        }

        if (empty($search['tanggal'])) {
            $search['tanggal'] = date('Y-m-d');
            $this->smarty->assign("search", $search);
        }
        if (empty($search['tanggal2'])) {
            $search['tanggal2'] = date('Y-m-d');
            $this->smarty->assign("search", $search);
        }
        $bulan = empty($search['tanggal']) ? '%' : $search['tanggal'];
        $tahun = empty($search['tanggal2']) ? '%' : $search['tanggal2'];

        $this->smarty->assign("rs_dok_igd", $this->m_kelengkapan_mr->get_stats_dok_igd(array($bulan, $tahun)));
        $this->smarty->assign("rs_dok_op", $this->m_kelengkapan_mr->get_stats_dok_op(array($bulan, $tahun)));
        $this->smarty->assign("rs_dok_an", $this->m_kelengkapan_mr->get_stats_dok_an(array($bulan, $tahun)));
        $this->smarty->assign("rs_dok_res", $this->m_kelengkapan_mr->get_stats_dok_res(array($bulan, $tahun)));
        $this->smarty->assign("rs_peg_pu", $this->m_kelengkapan_mr->get_stats_peg_pu(array($bulan, $tahun)));
        $this->smarty->assign("rs_bang_hhc", $this->m_kelengkapan_mr->get_stats_bang_hhc(array($bulan, $tahun)));
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    public function index_4() {
        $this->smarty->assign("template_content", "mutu/kelengkapan_mr/index4.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        // tahun
        // get search parameter
        $search = $this->tsession->userdata('kelengkapan_mr_search4');
        if (!empty($search)) {
            $this->smarty->assign("search", $search);
        }

        if (empty($search['tanggal'])) {
            $search['tanggal'] = date('Y-m-d');
            $this->smarty->assign("search", $search);
        }
        if (empty($search['tanggal2'])) {
            $search['tanggal2'] = date('Y-m-d');
            $this->smarty->assign("search", $search);
        }
        $this->smarty->assign("no", 1);
        $this->smarty->assign("rs_param_mr", $this->m_kelengkapan_mr->get_param_mr());
        $this->smarty->assign("rs_medis", $this->m_kelengkapan_mr->get_medis());
        if ($search['FS_KD_PARAMETER_MR'] == '1') {
            $bulan = empty($search['tanggal']) ? '%' : $search['tanggal'];
            $tahun = empty($search['tanggal2']) ? '%' : $search['tanggal2'];
            $FS_KD_PARAMETER_MR = empty($search['FS_KD_PARAMETER_MR']) ? '%' : $search['FS_KD_PARAMETER_MR'];
            $FS_KD_PEG = empty($search['FS_KD_PEG']) ? '%' : $search['FS_KD_PEG'];

            $this->smarty->assign("rs_id", $this->m_kelengkapan_mr->get_lap_detail_igd(array($bulan, $tahun, $FS_KD_PARAMETER_MR, $FS_KD_PEG)));
        } elseif($search['FS_KD_PARAMETER_MR'] == '7'){
            $bulan = empty($search['tanggal']) ? '%' : $search['tanggal'];
            $tahun = empty($search['tanggal2']) ? '%' : $search['tanggal2'];
            $FS_KD_PARAMETER_MR = empty($search['FS_KD_PARAMETER_MR']) ? '%' : $search['FS_KD_PARAMETER_MR'];
            $FS_KD_PEG = empty($search['FS_KD_PEG']) ? '%' : $search['FS_KD_PEG'];

            $this->smarty->assign("rs_id", $this->m_kelengkapan_mr->get_lap_detail_an(array($bulan, $tahun, $FS_KD_PARAMETER_MR, $FS_KD_PEG)));
        }elseif($search['FS_KD_PARAMETER_MR'] == '14'){
            $bulan = empty($search['tanggal']) ? '%' : $search['tanggal'];
            $tahun = empty($search['tanggal2']) ? '%' : $search['tanggal2'];
            $FS_KD_PARAMETER_MR = empty($search['FS_KD_PARAMETER_MR']) ? '%' : $search['FS_KD_PARAMETER_MR'];
            $FS_KD_PEG = empty($search['FS_KD_PEG']) ? '%' : $search['FS_KD_PEG'];

            $this->smarty->assign("rs_id", $this->m_kelengkapan_mr->get_lap_detail_op(array($bulan, $tahun, $FS_KD_PARAMETER_MR, $FS_KD_PEG)));
        }else {
            $bulan = empty($search['tanggal']) ? '%' : $search['tanggal'];
            $tahun = empty($search['tanggal2']) ? '%' : $search['tanggal2'];
            $FS_KD_PARAMETER_MR = empty($search['FS_KD_PARAMETER_MR']) ? '%' : '%' . $search['FS_KD_PARAMETER_MR'] . '%';
            $FS_KD_PEG = empty($search['FS_KD_PEG']) ? '%' : '%' . $search['FS_KD_PEG'] . '%';

            $this->smarty->assign("rs_id", $this->m_kelengkapan_mr->get_lap_detail(array($FS_KD_PARAMETER_MR, $FS_KD_PEG, $bulan, $tahun)));
        }
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    // searching
    public function proses_cari() {
        //set page rules
        $this->_set_page_rule("R");
        //data
        if ($this->input->post('save') == "RESET") {
            $this->tsession->unset_userdata("kelengkapan_mr_search");
        } else {
            $params = array(
                "tanggal" => $this->input->post("tanggal"),
                "tanggal2" => $this->input->post("tanggal2")
            );
            $this->tsession->set_userdata("kelengkapan_mr_search", $params);
        }
        // redirect
        redirect("mutu/kelengkapan_mr");
    }

    public function proses_cari2() {
        //set page rules
        $this->_set_page_rule("R");
        //data
        if ($this->input->post('save') == "RESET") {
            $this->tsession->unset_userdata("kelengkapan_mr_search2");
        } else {
            $params = array(
                "tanggal" => $this->input->post("tanggal"),
                "tanggal2" => $this->input->post("tanggal2")
                    /* "bulan" => $this->input->post("bulan"),
                      "tahun" => $this->input->post("tahun") */
            );
            $this->tsession->set_userdata("kelengkapan_mr_search2", $params);
        }
        // redirect
        redirect("mutu/kelengkapan_mr/index_2");
    }

    public function proses_cari3() {
        //set page rules
        $this->_set_page_rule("R");
        //data
        if ($this->input->post('save') == "RESET") {
            $this->tsession->unset_userdata("kelengkapan_mr_search3");
        } else {
            $params = array(
                "tanggal" => $this->input->post("tanggal"),
                "tanggal2" => $this->input->post("tanggal2")
            );
            $this->tsession->set_userdata("kelengkapan_mr_search3", $params);
        }
        // redirect
        redirect("mutu/kelengkapan_mr/index_3");
    }

    public function proses_cari4() {
        //set page rules
        $this->_set_page_rule("R");
        //data
        if ($this->input->post('save') == "RESET") {
            $this->tsession->unset_userdata("kelengkapan_mr_search4");
        } else {
            $params = array(
                "FS_KD_PARAMETER_MR" => $this->input->post("FS_KD_PARAMETER_MR"),
                "FS_KD_PEG" => $this->input->post("FS_KD_PEG"),
                "tanggal" => $this->input->post("tanggal"),
                "tanggal2" => $this->input->post("tanggal2")
            );
            $this->tsession->set_userdata("kelengkapan_mr_search4", $params);
        }
        // redirect
        redirect("mutu/kelengkapan_mr/index_4");
    }

    // print
    public function print_all() {
        // set page rules
        $this->_set_page_rule("R");
        // load excel
        $this->load->library('phpexcel');
        // create excell
        $filepath = "resource/doc/excel/laporan_mr.xlsx";
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $this->phpexcel = $objReader->load($filepath);
        $objWorksheet = $this->phpexcel->setActiveSheetIndex(0);
        $search = $this->tsession->userdata('kelengkapan_mr_search2');
        if (!empty($search)) {
            $this->smarty->assign("search", $search);
        }
        /* if (empty($search['bulan'])) {
          $search['bulan'] = date('m');
          $this->smarty->assign("search", $search);
          }
          if (empty($search['tahun'])) {
          $search['tahun'] = date('Y');
          $this->smarty->assign("search", $search);
          } */
        if (empty($search['tanggal'])) {
            $search['tanggal'] = date('Y-m-d');
            $this->smarty->assign("search", $search);
        }
        if (empty($search['tanggal2'])) {
            $search['tanggal2'] = date('Y-m-d');
            $this->smarty->assign("search", $search);
        }
        // search parameters
        $bulan = empty($search['tanggal']) ? '%' : $search['tanggal'];
        $tahun = empty($search['tanggal2']) ? '%' : $search['tanggal2'];
        // get list data
        $rs_id = $this->m_kelengkapan_mr->get_all_kelengkapan_mr2(array($bulan, $tahun));
        // set parameter
        $no = 1;
        $i = 2;

        foreach ($rs_id as $data) {
            $rs_det_1 = $this->m_kelengkapan_mr->get_total_kelengkapanmr_det_1(array($data['FS_KD_REG'], $bulan, $tahun));
            $rs_det_2 = $this->m_kelengkapan_mr->get_total_kelengkapanmr_det_2(array($data['FS_KD_REG'], $bulan, $tahun));
            $rs_det_3 = $this->m_kelengkapan_mr->get_total_kelengkapanmr_det_3(array($data['FS_KD_REG'], $bulan, $tahun));
            $rs_det_4 = $this->m_kelengkapan_mr->get_total_kelengkapanmr_det_4(array($data['FS_KD_REG'], $bulan, $tahun));
            $rs_det_5 = $this->m_kelengkapan_mr->get_total_kelengkapanmr_det_5(array($data['FS_KD_REG'], $bulan, $tahun));
            $rs_det_13 = $this->m_kelengkapan_mr->get_total_kelengkapanmr_det_13(array($data['FS_KD_REG'], $bulan, $tahun));
            $rs_det_6 = $this->m_kelengkapan_mr->get_total_kelengkapanmr_det_6(array($data['FS_KD_REG'], $bulan, $tahun));
            $rs_det_14 = $this->m_kelengkapan_mr->get_total_kelengkapanmr_det_14(array($data['FS_KD_REG'], $bulan, $tahun));
            $rs_det_7 = $this->m_kelengkapan_mr->get_total_kelengkapanmr_det_7(array($data['FS_KD_REG'], $bulan, $tahun));
            $rs_det_8 = $this->m_kelengkapan_mr->get_total_kelengkapanmr_det_8(array($data['FS_KD_REG'], $bulan, $tahun));
            $rs_det_9 = $this->m_kelengkapan_mr->get_total_kelengkapanmr_det_9(array($data['FS_KD_REG'], $bulan, $tahun));
            $rs_det_10 = $this->m_kelengkapan_mr->get_total_kelengkapanmr_det_10(array($data['FS_KD_REG'], $bulan, $tahun));
            $rs_det_11 = $this->m_kelengkapan_mr->get_total_kelengkapanmr_det_11(array($data['FS_KD_REG'], $bulan, $tahun));
            $rs_det_12 = $this->m_kelengkapan_mr->get_total_kelengkapanmr_det_12(array($data['FS_KD_REG'], $bulan, $tahun));

            $objWorksheet->setCellValue('A' . $i, $data['FS_MR']);
            $objWorksheet->setCellValue('B' . $i, $data['FS_NM_PASIEN']);
            $objWorksheet->setCellValue('C' . $i, $data['FS_NM_LAYANAN']);
            $objWorksheet->setCellValue('D' . $i, $data['FD_TGL_KELUAR']);
            $objWorksheet->setCellValue('E' . $i, $data['FS_DIAG_UTAMA']);
            $objWorksheet->setCellValue('F' . $i, $data['DPJP']);
            $objWorksheet->setCellValue('G' . $i, $data['DOKTER_IGD']);
            $objWorksheet->setCellValue('H' . $i, $data['DOKTER_OP']);
            $objWorksheet->setCellValue('I' . $i, $data['DOKTER_AN']);
            if ($rs_det_1['FS_HASIL'] == 1) {
                $objWorksheet->setCellValue('J' . $i, 'v');
            } elseif ($rs_det_1['FS_HASIL'] == 2) {
                $objWorksheet->setCellValue('J' . $i, 'x');
            } elseif ($rs_det_1['FS_HASIL'] == 3) {
                $objWorksheet->setCellValue('J' . $i, '-');
            }

            if ($rs_det_2['FS_HASIL'] == 1) {
                $objWorksheet->setCellValue('K' . $i, 'v');
            } elseif ($rs_det_2['FS_HASIL'] == 2) {
                $objWorksheet->setCellValue('K' . $i, 'x');
            } elseif ($rs_det_2['FS_HASIL'] == 3) {
                $objWorksheet->setCellValue('K' . $i, '-');
            }

            if ($rs_det_3['FS_HASIL'] == 1) {
                $objWorksheet->setCellValue('L' . $i, 'v');
            } elseif ($rs_det_3['FS_HASIL'] == 2) {
                $objWorksheet->setCellValue('L' . $i, 'x');
            } elseif ($rs_det_3['FS_HASIL'] == 3) {
                $objWorksheet->setCellValue('L' . $i, '-');
            }

            if ($rs_det_4['FS_HASIL'] == 1) {
                $objWorksheet->setCellValue('M' . $i, 'v');
            } elseif ($rs_det_4['FS_HASIL'] == 2) {
                $objWorksheet->setCellValue('M' . $i, 'x');
            } elseif ($rs_det_4['FS_HASIL'] == 3) {
                $objWorksheet->setCellValue('M' . $i, '-');
            }

            if ($rs_det_5['FS_HASIL'] == 1) {
                $objWorksheet->setCellValue('N' . $i, 'v');
            } elseif ($rs_det_5['FS_HASIL'] == 2) {
                $objWorksheet->setCellValue('N' . $i, 'x');
            } elseif ($rs_det_5['FS_HASIL'] == 3) {
                $objWorksheet->setCellValue('N' . $i, '-');
            }

            if ($rs_det_13['FS_HASIL'] == 1) {
                $objWorksheet->setCellValue('O' . $i, 'v');
            } elseif ($rs_det_13['FS_HASIL'] == 2) {
                $objWorksheet->setCellValue('O' . $i, 'x');
            } elseif ($rs_det_13['FS_HASIL'] == 3) {
                $objWorksheet->setCellValue('O' . $i, '-');
            }

            if ($rs_det_6['FS_HASIL'] == 1) {
                $objWorksheet->setCellValue('P' . $i, 'v');
            } elseif ($rs_det_6['FS_HASIL'] == 2) {
                $objWorksheet->setCellValue('P' . $i, 'x');
            } elseif ($rs_det_6['FS_HASIL'] == 3) {
                $objWorksheet->setCellValue('P' . $i, '-');
            }

            if ($rs_det_14['FS_HASIL'] == 1) {
                $objWorksheet->setCellValue('Q' . $i, 'v');
            } elseif ($rs_det_14['FS_HASIL'] == 2) {
                $objWorksheet->setCellValue('Q' . $i, 'x');
            } elseif ($rs_det_14['FS_HASIL'] == 3) {
                $objWorksheet->setCellValue('Q' . $i, '-');
            }

            if ($rs_det_7['FS_HASIL'] == 1) {
                $objWorksheet->setCellValue('R' . $i, 'v');
            } elseif ($rs_det_7['FS_HASIL'] == 2) {
                $objWorksheet->setCellValue('R' . $i, 'x');
            } elseif ($rs_det_7['FS_HASIL'] == 3) {
                $objWorksheet->setCellValue('R' . $i, '-');
            }

            if ($rs_det_8['FS_HASIL'] == 1) {
                $objWorksheet->setCellValue('S' . $i, 'v');
            } elseif ($rs_det_8['FS_HASIL'] == 2) {
                $objWorksheet->setCellValue('S' . $i, 'x');
            } elseif ($rs_det_8['FS_HASIL'] == 3) {
                $objWorksheet->setCellValue('S' . $i, '-');
            }

            if ($rs_det_9['FS_HASIL'] == 1) {
                $objWorksheet->setCellValue('T' . $i, 'v');
            } elseif ($rs_det_9['FS_HASIL'] == 2) {
                $objWorksheet->setCellValue('T' . $i, 'x');
            } elseif ($rs_det_9['FS_HASIL'] == 3) {
                $objWorksheet->setCellValue('T' . $i, '-');
            }

            if ($rs_det_10['FS_HASIL'] == 1) {
                $objWorksheet->setCellValue('U' . $i, 'v');
            } elseif ($rs_det_10['FS_HASIL'] == 2) {
                $objWorksheet->setCellValue('U' . $i, 'x');
            } elseif ($rs_det_10['FS_HASIL'] == 3) {
                $objWorksheet->setCellValue('U' . $i, '-');
            }

            if ($rs_det_11['FS_HASIL'] == 1) {
                $objWorksheet->setCellValue('V' . $i, 'v');
            } elseif ($rs_det_11['FS_HASIL'] == 2) {
                $objWorksheet->setCellValue('V' . $i, 'x');
            } elseif ($rs_det_11['FS_HASIL'] == 3) {
                $objWorksheet->setCellValue('V' . $i, '-');
            }

            if ($rs_det_12['FS_HASIL'] == 1) {
                $objWorksheet->setCellValue('W' . $i, 'v');
            } elseif ($rs_det_12['FS_HASIL'] == 2) {
                $objWorksheet->setCellValue('W' . $i, 'x');
            } elseif ($rs_det_12['FS_HASIL'] == 3) {
                $objWorksheet->setCellValue('W' . $i, '-');
            }

            // insert
            if (($i - 8) != count($rs_id)) {
                $objWorksheet->insertNewRowBefore(($i + 1), 1);
            }
            // next row
            $i++;
        }
        // file_name
        $file_name = "KELENGKAPAN_MR_CETAK";
        //--
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $file_name . '.xlsx');
        header('Cache-Control: max-age=0');
        // output
        $obj_writer = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel2007');
        $obj_writer->save('php://output');
        exit();
    }

    public function print_all2() {
        // set page rules
        $this->_set_page_rule("R");
        // load excel
        $this->load->library('phpexcel');
        // create excell
        $filepath = "resource/doc/excel/laporan_mr2.xlsx";
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $this->phpexcel = $objReader->load($filepath);
        $objWorksheet = $this->phpexcel->setActiveSheetIndex(0);
        $search = $this->tsession->userdata('kelengkapan_mr_search2');
        if (!empty($search)) {
            $this->smarty->assign("search", $search);
        }
        if (empty($search['tanggal'])) {
            $search['tanggal'] = date('Y-m-d');
            $this->smarty->assign("search", $search);
        }
        if (empty($search['tanggal2'])) {
            $search['tanggal2'] = date('Y-m-d');
            $this->smarty->assign("search", $search);
        }
        // search parameters
        $bulan = empty($search['tanggal']) ? '%' : $search['tanggal'];
        $tahun = empty($search['tanggal2']) ? '%' : $search['tanggal2'];
        // get list data
        $rs_id = $this->m_kelengkapan_mr->get_all_kelengkapan_mr3(array($bulan, $tahun));
        // set parameter
        $no = 1;
        $i = 2;

        foreach ($rs_id as $data) {
            $objWorksheet->setCellValue('A' . $i, $data['FS_MR']);
            $objWorksheet->setCellValue('B' . $i, $data['FS_NM_PASIEN']);
            $objWorksheet->setCellValue('C' . $i, $data['FS_NM_LAYANAN']);
            $objWorksheet->setCellValue('D' . $i, $data['FD_TGL_KELUAR']);
            $objWorksheet->setCellValue('E' . $i, $data['DPJP']);
            $objWorksheet->setCellValue('F' . $i, $data['FS_DIAG_UTAMA']);
            $objWorksheet->setCellValue('G' . $i, $data['ICD10'] . ' ' . $data['FS_NM_DIAG_SEK']);
            $objWorksheet->setCellValue('H' . $i, $data['ICD9CM'] . ' ' . $data['FS_NM_TIND']);


            // insert
            if (($i - 8) != count($rs_id)) {
                $objWorksheet->insertNewRowBefore(($i + 1), 1);
            }
            // next row
            $i++;
        }
        // file_name
        $file_name = "KELENGKAPAN_MR_CETAK2";
        //--
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $file_name . '.xlsx');
        header('Cache-Control: max-age=0');
        // output
        $obj_writer = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel2007');
        $obj_writer->save('php://output');
        exit();
    }

}
