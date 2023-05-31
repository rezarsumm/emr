<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class fisio extends ApplicationBase {

// constructor
    public function __construct() {
// parent constructor
        parent::__construct();
// load model
        $this->load->model('m_rawat_jalan');
        $this->load->model('m_rawat_jalan_nurse');
        $this->smarty->assign('m_rawat_jalan', $this->m_rawat_jalan);
        $this->load->library('tnotification');
    }

// list surat masuk
    public function index() {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "nurse/fisio/index.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $search = $this->tsession->userdata('nurse_rawat_jalan_fisio');
        if (!empty($search)) {
            $this->smarty->assign("search", $search);
        }
        if (empty($search['FS_KD_PEG'])) {
            $search['FS_KD_PEG'] = 'S000';
            $this->smarty->assign("search", $search);
        }
        if (empty($search['FD_TGL_MASUK'])) {
            $search['FD_TGL_MASUK'] = date('Y-m-d');
            $this->smarty->assign("search", $search);
        }
        $this->smarty->assign("FS_KD_PEG", $search['FS_KD_PEG']);
        $this->smarty->assign("FD_TGL_MASUK", $search['FD_TGL_MASUK']);
        // search parameters
        $FD_TGL_MASUK = empty($search['FD_TGL_MASUK']) ? : $search['FD_TGL_MASUK'];
        $FS_KD_PEG = empty($search['FS_KD_PEG']) ? : $search['FS_KD_PEG'];
        $now = date('Y-m-d');
// get search parameter
        $this->smarty->assign("no", '1');
        $this->smarty->assign("rs_dokter", $this->m_rawat_jalan->get_dokter_fis());
        $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_px_by_dokter_wait(array($FD_TGL_MASUK, $FS_KD_PEG, $FS_KD_PEG, $FS_KD_PEG)));
        //$this->smarty->assign("rs_pasien2", $this->m_rawat_jalan->get_px_by_dokter_finish_perawat(array($now, $FS_KD_PEG)));
// notification
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
        if ($this->input->post('save') == "Reset") {
            $this->tsession->unset_userdata("nurse_rawat_jalan_fisio");
        } else {
            $params = array(
                "FD_TGL_MASUK" => $this->input->post("FD_TGL_MASUK"),
                "FS_KD_PEG" => $this->input->post("FS_KD_PEG")
            );
            $this->tsession->set_userdata("nurse_rawat_jalan_fisio", $params);
        }
        // redirect
        redirect("nurse/fisio");
    }

    public function history($FS_MR = "", $FS_KD_PEG = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "nurse/fisio/history.html");
        $this->smarty->load_javascript('resource/js/jquery.datatables/jquery.dataTables.js');
        $this->smarty->load_javascript('resource/js/jquery.datatables/dataTables.fixedHeader.js');
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->load_style("jquery.ui/datatables/jquery.dataTables.css");
// load javascript
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-1.9.2.custom.min.js');
// get search parameter
        $now = date('Y-m-d');
        $medis = $FS_KD_PEG;
        $this->smarty->assign("no", '1');
        $this->smarty->assign("FS_KD_MEDIS", $FS_KD_PEG);
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rm(array($now, $FS_MR)));
        $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_px_history(array($now, $medis, $medis, $medis, $FS_MR)));

//$this->smarty->assign("form", $this->m_rawat_jalan->get_px_form(array($now, $medis, $medis, $medis, $FS_MR)));
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }

    public function add($FS_KD_REG = "", $FS_KD_MEDIS = "", $FS_JNS_ASESMEN = "") {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "nurse/fisio/add.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG, $FS_KD_MEDIS, $FS_KD_MEDIS, $FS_KD_MEDIS)));
        $this->smarty->assign("FS_KD_MEDIS", $FS_KD_MEDIS);
        $this->smarty->assign("FS_JNS_ASESMEN", $FS_JNS_ASESMEN);
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }

    public function add_process() {

        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
        $this->tnotification->set_rules('FS_ANAMNESA', 'Anamnesa', 'trim|required');
        $this->tnotification->set_rules('FS_ALERGI', 'Alergi', 'trim|required');
        $this->tnotification->set_rules('FS_REAK_ALERGI', 'Reaksi Alergi', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                $this->input->post('FS_KD_REG'),
                '1',
                '5',
                $this->input->post('FS_JNS_ASESMEN'),
                $this->com_user['user_id'],
                date('Y-m-d')
            );
            // insert
            if ($this->m_rawat_jalan->insert($params)) {
                $params1 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FS_SUHU'),
                    $this->input->post('FS_NADI'),
                    $this->input->post('FS_R'),
                    $this->input->post('FS_TD'),
                    $this->input->post('FS_TB'),
                    $this->input->post('FS_BB'),
                    $this->input->post('FS_KD_MEDIS'),
                    $this->com_user['user_id'],
                    date('Y-m-d'),
                    date('H:i:s')
                );
                $this->m_rawat_jalan->insert_vs($params1);
                
                $params4 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU'),
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU2'),
                    $this->input->post('FS_RIW_PENYAKIT_KEL'),
                    $this->input->post('FS_RIW_PENYAKIT_KEL2'),
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    $this->input->post('FS_ANAMNESA'),
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    '',
                    $this->input->post('FS_EDUKASI'),
                    $this->com_user['user_id'],
                    date('Y-m-d')
                );
                $this->m_rawat_jalan->insert_ases($params4);
                
                $params5 = array(
                    $this->input->post('FS_ALERGI'),
                    $this->input->post('FS_REAK_ALERGI'),
                    $this->input->post('FS_MR')
                );
                $this->m_rawat_jalan_nurse->insert_alergi($params5);
                
                $params6 = array(
                    $this->input->post('FS_KD_REG'),
                    $this->input->post('FS_NM_INSPEKSI'),
                    $this->input->post('FS_NM_PALPASI'),
                    $this->input->post('FS_NM_PEM_SPESIFIK'),
                    $this->input->post('FS_NM_DIAG_FISIO'),
                    '',
                    $this->com_user['user_id'],
                    date('Y-m-d')
                );
                $this->m_rawat_jalan->insert_fisio($params6);
                
                $FS_KD_FISIO_INTERVENSI_UMUM = $this->input->post('FS_KD_FISIO_INTERVENSI_UMUM');
                if (!empty($FS_KD_FISIO_INTERVENSI_UMUM)) {
                    foreach ($FS_KD_FISIO_INTERVENSI_UMUM as $value) {
                        $this->m_rawat_jalan->insert_intervensi_umum(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
                $FS_KD_FISIO_INTERVENSI_BPJS = $this->input->post('FS_KD_FISIO_INTERVENSI_BPJS');
                if (!empty($FS_KD_FISIO_INTERVENSI_BPJS)) {
                    foreach ($FS_KD_FISIO_INTERVENSI_BPJS as $value) {
                        $this->m_rawat_jalan->insert_intervensi_bpjs(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
                // notification
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            } else {
                // default error
                $this->tnotification->sent_notification("error", "Detail gagal disimpan");
                redirect("nurse/fisio/history/".$this->input->post('FS_MR')."/".$this->input->post('FS_KD_MEDIS')."");
            }
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
            redirect("nurse/fisio/history/".$this->input->post('FS_MR')."/".$this->input->post('FS_KD_MEDIS')."");
        }
        // default redirect
        redirect("nurse/fisio");
    }

    public function edit($FS_KD_REG = "") {
// set page rules
        $this->_set_page_rule("U");
// set template content
        $this->smarty->assign("template_content", "nurse/fisio/edit.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $now = date('Y-m-d');
        $this->smarty->assign("result", $this->m_rawat_jalan->get_px_by_dokter_by_rg2(array($now, $FS_KD_REG)));
        $this->smarty->assign("vs", $this->m_rawat_jalan->get_data_vs_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("ases2", $this->m_rawat_jalan->get_data_ases2_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("alergi", $this->m_rawat_jalan->get_data_alergi_by_rg(array($FS_KD_REG)));
        $this->smarty->assign("fisio", $this->m_rawat_jalan->get_data_fisio_by_rg(array($FS_KD_REG)));
        
        $FS_KD_FISIO_INTERVENSI_UMUM = $this->m_rawat_jalan->list_intervensi_umum_by_rg($FS_KD_REG);
        $FS_KD_FISIO_INTERVENSI_UMUM_str = "";
        foreach ($FS_KD_FISIO_INTERVENSI_UMUM as $key => $value) {
            $FS_KD_FISIO_INTERVENSI_UMUM_str .= "'" . $value['FS_KD_FISIO_INTERVENSI_UMUM'] . "',";
        }
        $this->smarty->assign('rs_tujuan', $FS_KD_FISIO_INTERVENSI_UMUM_str);
        
        $FS_KD_FISIO_INTERVENSI_BPJS = $this->m_rawat_jalan->list_intervensi_bpjs_by_rg($FS_KD_REG);
        $FS_KD_FISIO_INTERVENSI_BPJS_str = "";
        foreach ($FS_KD_FISIO_INTERVENSI_BPJS as $key => $value) {
            $FS_KD_FISIO_INTERVENSI_BPJS_str .= "'" . $value['FS_KD_FISIO_INTERVENSI_BPJS'] . "',";
        }
        $this->smarty->assign('rs_tembusan', $FS_KD_FISIO_INTERVENSI_BPJS_str);
// notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
// output
        parent::display();
    }

    public function edit_process() {
        // set page rules
        $this->_set_page_rule("U");
        // cek input
        $this->tnotification->set_rules('FS_KD_REG', 'KODE REGISTER', 'trim|required');
        $this->tnotification->set_rules('FS_ANAMNESA', 'Anamnesa', 'trim|required');
        $this->tnotification->set_rules('FS_ALERGI', 'Alergi', 'trim|required');
        $this->tnotification->set_rules('FS_REAK_ALERGI', 'Reaksi Alergi', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            $params = array(
                '1',
                $this->com_user['user_id'],
                date('Y-m-d'),
                $this->input->post('FS_KD_REG')
            );
            // insert
            if ($this->m_rawat_jalan->update($params)) {
                $params1 = array(
                    $this->input->post('FS_SUHU'),
                    $this->input->post('FS_NADI'),
                    $this->input->post('FS_R'),
                    $this->input->post('FS_TD'),
                    $this->input->post('FS_TB'),
                    $this->input->post('FS_BB'),
                    $this->com_user['user_id'],
                    date('Y-m-d'),
                    $this->input->post('FS_KD_REG')
                );
                $this->m_rawat_jalan->update_vs($params1);
                
                $params4 = array(
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU'),
                    $this->input->post('FS_RIW_PENYAKIT_DAHULU2'),
                    $this->input->post('FS_RIW_PENYAKIT_KEL'),
                    $this->input->post('FS_RIW_PENYAKIT_KEL2'),
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    $this->input->post('FS_ANAMNESA'),
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    '',
                    $this->input->post('FS_EDUKASI'),
                    $this->com_user['user_id'],
                    date('Y-m-d'),
                    $this->input->post('FS_KD_REG')
                );
                $this->m_rawat_jalan->update_ases($params4);

                $params5 = array(
                    $this->input->post('FS_ALERGI'),
                    $this->input->post('FS_REAK_ALERGI'),
                    $this->input->post('FS_MR')
                );
                $this->m_rawat_jalan_nurse->insert_alergi($params5);
                
                $params6 = array(
                    $this->input->post('FS_NM_INSPEKSI'),
                    $this->input->post('FS_NM_PALPASI'),
                    $this->input->post('FS_NM_PEM_SPESIFIK'),
                    $this->input->post('FS_NM_DIAG_FISIO'),
                    '',
                    $this->input->post('FS_KD_REG')
                );
                $this->m_rawat_jalan->update_fisio($params6);
                
                $FS_KD_FISIO_INTERVENSI_UMUM = $this->input->post('FS_KD_FISIO_INTERVENSI_UMUM');
                 $this->m_rawat_jalan->delete_intervensi_umum($this->input->post('FS_KD_REG'));
                if (!empty($FS_KD_FISIO_INTERVENSI_UMUM)) {
                    foreach ($FS_KD_FISIO_INTERVENSI_UMUM as $value) {
                        $this->m_rawat_jalan->insert_intervensi_umum(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
                
                $FS_KD_FISIO_INTERVENSI_BPJS = $this->input->post('FS_KD_FISIO_INTERVENSI_BPJS');
                 $this->m_rawat_jalan->delete_intervensi_bpjs($this->input->post('FS_KD_REG'));
                if (!empty($FS_KD_FISIO_INTERVENSI_BPJS)) {
                    foreach ($FS_KD_FISIO_INTERVENSI_BPJS as $value) {
                        $this->m_rawat_jalan->insert_intervensi_bpjs(array($this->input->post('FS_KD_REG'), $value));
                    }
                }
                // notification
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Detail berhasil disimpan");
            } else {
                // default error
                $this->tnotification->sent_notification("error", "Detail gagal disimpan");
                redirect("nurse/fisio/history/".$this->input->post('FS_MR')."/".$this->input->post('FS_KD_MEDIS')."");
            }
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Detail gagal disimpan");
            redirect("nurse/fisio/history/".$this->input->post('FS_MR')."/".$this->input->post('FS_KD_MEDIS')."");
        }
        // default redirect
        redirect("nurse/fisio");
    }

    public function rekap_excel() {
        // load excel
        $this->load->library('phpexcel');
        // create excell
        $filepath = "resource/doc/excel/rekap_resume_rawat_jalan.xlsx";
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $this->phpexcel = $objReader->load($filepath);
        $objWorksheet = $this->phpexcel->setActiveSheetIndex(0);
        // search param
        $year = date("Y");
        $month = date("m");
        $search = $this->tsession->userdata('nurse_rawat_jalan');
        $FD_TGL_MASUK = empty($search['FD_TGL_MASUK']) ? : $search['FD_TGL_MASUK'];
        $FS_KD_PEG = empty($search['FS_KD_PEG']) ? : $search['FS_KD_PEG'];
        $now = date('Y-m-d');
        // surat
        $surat = $this->m_rawat_jalan->get_px_by_dokter_wait(array($FD_TGL_MASUK, $FS_KD_PEG, $FS_KD_PEG, $FS_KD_PEG));
        $dokter = $this->m_rawat_jalan->get_dokter2($FS_KD_PEG);
        $bln = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        );
        foreach ($bln as $key => $value) {
            if ($key == $bulan) {
                $bulann = $value;
            }
        }
        /*
         * SET DATA EXCELL
         */
        $objWorksheet->setCellValue('A6', 'DATA PASIEN RAWAT JALAN DOKTER ' . $dokter['FS_NM_PEG'] . ' Tanggal ' . strtoupper($now));

        $i = 9;
        $no = 1;
        foreach ($surat as $data) {
            $objWorksheet->setCellValue('A' . $i, $no++ . '.');
            $objWorksheet->setCellValue('B' . $i, $data['FS_KD_REG']);
            $objWorksheet->setCellValue('C' . $i, $data['FS_MR']);
            $objWorksheet->setCellValue('D' . $i, $data['FS_NM_PASIEN']);
            $objWorksheet->setCellValue('E' . $i, $data['FS_ALM_PASIEN']);
            $objWorksheet->setCellValue('F' . $i, strip_tags($data['FS_DIAGNOSA']));
            $objWorksheet->setCellValue('G' . $i, strip_tags($data['FS_TINDAKAN']));
            // insert
            if (($i - 8) != count($surat)) {
                $objWorksheet->insertNewRowBefore(($i + 1), 1);
            }
            // next row
            $i++;
        }
        // file_name
        $file_name = "DATA_PASIEN_RAWAT_JALAN_DOKTER_" . $dokter['FS_NM_PEG'] . "_Tanggal_" . strtoupper($now);
        //--
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $file_name . '.xlsx');
        header('Cache-Control: max-age=0');
        // output
        $obj_writer = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel2007');
        $obj_writer->save('php://output');
        exit();
    }

    public function list_intervensi_umum() {
        $instansi = $this->m_rawat_jalan->list_intervensi_umum();
        $data[] = array();
        $i = 0;
        foreach ($instansi as $key => $value) {
            $data[$i] = array(
                'value' => $value['FS_KD_TRS'],
                'label' => $value['FS_NM_INT_UMUM']
            );
            $i++;
        }
        echo json_encode($data);
    }

    public function add_process_fisio1() {
        $params = array(
            $this->input->post('FS_KD_REG'),
            $this->input->post('FS_NM_GERAK'),
            $this->input->post('FS_NM_ROM'),
            $this->input->post('FS_NM_NYERI'),
            $this->com_user['user_id'],
            date('Y-m-d'),
        );
        // insert
        $data = $this->m_rawat_jalan->insert_fisio1($params);
        echo json_encode($data);
    }
    
    public function add_process_fisioPasif() {
        $params = array(
            $this->input->post('FS_KD_REG'),
            $this->input->post('FS_NM_GERAK_PASIF'),
            $this->input->post('FS_NM_ROM_PASIF'),
            $this->input->post('FS_NM_NYERI_PASIF'),
            $this->input->post('FS_NM_END_FEEL'),
            $this->com_user['user_id'],
            date('Y-m-d'),
        );
        // insert
        $data = $this->m_rawat_jalan->insert_fisio_pasif($params);
        echo json_encode($data);
    }
    public function add_process_fisioIsom() {
        $params = array(
            $this->input->post('FS_KD_REG'),
            $this->input->post('FS_NM_GERAK_ISOM'),
            $this->input->post('FS_NM_MMT'),
            $this->com_user['user_id'],
            date('Y-m-d'),
        );
        // insert
        $data = $this->m_rawat_jalan->insert_fisio_isom($params);
        echo json_encode($data);
    }
    
    public function list_fisio1() {
        $params = array(
            $this->input->post('FS_KD_REG2')
        );
        // insert
        $data = $this->m_rawat_jalan->get_fisio1($params);
        echo json_encode($data);
    }
    public function list_fisioPasif() {
        $params = array(
            $this->input->post('FS_KD_REG2')
        );
        // insert
        $data = $this->m_rawat_jalan->get_fisio_pasif($params);
        echo json_encode($data);
    }
    
    public function list_fisioIsom() {
        $params = array(
            $this->input->post('FS_KD_REG2')
        );
        // insert
        $data = $this->m_rawat_jalan->get_fisio_isom($params);
        echo json_encode($data);
    }

    public function delete_process_fisio1() {
        $params = array(
            $this->input->post('kode')
        );
        // insert
        $data = $this->m_rawat_jalan->delete_fisio1($params);
        echo json_encode($data);
    }
    public function delete_process_fisioPasif() {
        $params = array(
            $this->input->post('kode')
        );
        // insert
        $data = $this->m_rawat_jalan->delete_fisio_pasif($params);
        echo json_encode($data);
    }
    public function delete_process_fisioIsom() {
        $params = array(
            $this->input->post('kode')
        );
        // insert
        $data = $this->m_rawat_jalan->delete_fisio_isom($params);
        echo json_encode($data);
    }
    
}
