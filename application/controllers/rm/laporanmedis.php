<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class laporanmedis extends ApplicationBase {

// constructor
    public function __construct() {
// parent constructor
        parent::__construct();
// load model
        $this->load->model('m_rm');
        $this->load->model('m_rawat_jalan');
        $this->smarty->assign('m_rawat_jalan', $this->m_rawat_jalan);
        $this->load->library('tnotification');
    }
    
    public function index() {
// set page rules
        $this->_set_page_rule("R");
// set template content
        $this->smarty->assign("template_content", "rm/laporanmedis/index.html");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        $this->smarty->load_javascript('resource/js/jquery/select2.js');
        $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
        // load style
        $this->smarty->load_style("jquery.ui/select2/select2.css");
        // load style ui
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $search = $this->tsession->userdata('rm_berkas_harian');
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
 
        $this->smarty->assign("rs_dokter", $this->m_rawat_jalan->get_dokter());
        $this->smarty->assign("rs_pasien", $this->m_rawat_jalan->get_px_by_dokter_wait(array($FD_TGL_MASUK, $FS_KD_PEG,$FD_TGL_MASUK, $FS_KD_PEG)));
        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
 
        parent::display();
    }

//     public function eksport(){

        
//         // set page rules
//         $this->_set_page_rule("R");
// // set template content
//         $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
//         $this->smarty->load_javascript('resource/js/jquery/select2.js');
//         $this->smarty->load_javascript('resource/js/jquery/jquery-ui-timepicker-addon.js');
//         // load style
//         $this->smarty->load_style("jquery.ui/select2/select2.css");
//         // load style ui
//         $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
//         $search = $this->tsession->userdata('rm_berkas_harian');
 
//         $tglawal=$this->input->post('tglawal');
//         $tglakhir=$this->input->post('tglakhir');
//          $this->smarty->assign("tglawal", $tglawal);
//          $this->smarty->assign("tglakhir", $tglakhir);
        
//          $this->smarty->assign("template_content", "rm/laporanmedis/excel.php");
//          $this->smarty->assign("hata",  $this->m_rawat_jalan->laporanmedis(array($tglawal, $tglakhir)));
//                 parent::display();
//     }


    public function eksport() {
        // load excel
        $this->load->library('phpexcel');
        // create excell
        $filepath = "resource/doc/excel/rekam_medis.xlsx";
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $this->phpexcel = $objReader->load($filepath);
        $objWorksheet = $this->phpexcel->setActiveSheetIndex(0);
        // search param
        $year = date("Y");
        $month = date("m");
 

        $tglawal=$this->input->post('tglawal');
        $tglakhir=$this->input->post('tglakhir');
        if($tglakhir=='' || $tglakhir==null || $tglakhir=='0000-00-00'){
            $tglakhir=$tglawal;
        }
        else{
            $tglakhir=$tglakhir;
        }
         $this->smarty->assign("tglawal", $tglawal);
         $this->smarty->assign("tglakhir", $tglakhir);
        
         $this->smarty->assign("template_content", "rm/laporanmedis/excel.php");
         $this->smarty->assign("hata",  $this->m_rawat_jalan->laporanmedis(array($tglawal, $tglakhir)));


        //  $surat = $this->m_rawat_jalan->get_px_by_dokter_wait(array($FD_TGL_MASUK, $FS_KD_PEG, $FS_KD_PEG, $FS_KD_PEG));
        // $dokter = $this->m_rawat_jalan->get_dokter2($FS_KD_PEG);
         /*
         * SET DATA EXCELL
         */

         $hata=$this->m_rawat_jalan->laporanmedis(array($tglawal, $tglakhir));
        $objWorksheet->setCellValue('A4', 'DATA REKAM MEDIS ' . ' Tanggal ' . strtoupper($tglawal));


        function rekanan ($koderekanan) {
            switch ($koderekanan) {
              case '0001':
                return '1';
              case '0002':
                return '2';
              case '0023':
                return '2';
              case '032':
                return '7';
              case '0065':
                return '7';
               default:
                return '';
            }
          }


          function umur($umur) {
             if($umur<1){
                 return 'kurang dari 1 th';
             }
             else if($umur>=1 && $umur<=4){
                 return '1-4 th';
             }
             else if($umur>=5 && $umur<=14){
                return '5-14 th';
            }
            else if($umur>=15 && $umur<=24){
                return '15-24 th';
            }
            else if($umur>=25 && $umur<=44){
                return '25-44 th';
            }
            else if($umur>=45 && $umur<=64){
                return '45-64 th';
            }
            else if($umur>=65){
                return '65th +';
            }
          }


          function cekmetro($kata){ 

                if(preg_match("/Metro/i", $kata)) {
                    return 'Metro';
                } else {
                    return 'Luar Metro';
                }

                if(preg_match("/METRO/i", $kata)) {
                    return 'Metro';
                } else {
                    return 'Luar Metro';
                }

                if(preg_match("/metro/i", $kata)) {
                    return 'Metro';
                } else {
                    return 'Luar Metro';
                }
              
          } 
 


          function spesialis($spesialis) {
            switch ($spesialis) {
              case 'DOKTER UMUM':
                return '1';
              case 'SPESIALIS PENYAKIT DALAM':
                return '2';
              case 'SPESIALIS KANDUNGAN':
                return '3';
              case 'DOKTER GIGI':
                return '4';
              case 'SPESIALIS BEDAH':
                return '5';
                case 'SPESIALIS ORTHOPEDI':
                    return '8';
                    case 'SPESIALIS NEUROLOGI':
                        return '9';
                        case 'SPESIALIS ANAK':
                            return '10';   
                            
                            case 'SPESIALIS MATA':
                                return '11';
                                case 'SPESIALIS THT-KL':
                                    return '12';
                                    case 'SPESIALIS PARU':
                                        return '13';   
                   
                                        case 'SPESIALIS BEDAH MULUT':
                                            return '14';
                                            case 'SPESIALIS KULIT DAN KELAMIN':
                                                return '15';
                                                case 'SPESIALIS UROLOGI':
                                                    return '16';
                                                    case 'SPESIALIS BEDAH SARAF':
                                                        return '17';                           
               default:
                return '';
            }
          }
      

        $i = 9;
        $no = 1;
        foreach ($hata as $data) {
            $objWorksheet->setCellValue('A' . $i, $no++);
            $objWorksheet->setCellValue('B' . $i, date('d-m-Y', strtotime($data['Tanggal'])));
            $objWorksheet->setCellValue('C' . $i, $data['Kode_Datang']);
            // $objWorksheet->setCellValue('C' . $i, $data['Jenis_Kelamin']=='L' ? '1' : '2');
            $objWorksheet->setCellValue('D' . $i, $data['No_MR']);
            $objWorksheet->setCellValue('E' . $i, $data['Nama_Pasien']);
            $objWorksheet->setCellValue('F' . $i, $data['Jenis_Kelamin']=='L' ? '1' : '2');
            $objWorksheet->setCellValue('G' . $i, $data['umur']);
            $objWorksheet->setCellValue('H' . $i, umur($data['umur']));
            $objWorksheet->setCellValue('I' . $i, spesialis($data['Spesialis']));
            $objWorksheet->setCellValue('J' . $i, strip_tags($data['FS_DIAGNOSA']));
            $objWorksheet->setCellValue('K' . $i, rekanan($data['KodeRekanan']));
            $objWorksheet->setCellValue('L' . $i, '-');
            $objWorksheet->setCellValue('M' . $i, $data['Alamat']);
            
            // insert
            if (($i - 8) != count($surat)) {
                $objWorksheet->insertNewRowBefore(($i + 1), 1);
            }
            // next row
            $i++;
        }
        // file_name
        $file_name = "DATA_REKAM_MEDIS_" . "_Tanggal_" . strtoupper($tglawal);
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
    