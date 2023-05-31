<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// --

class welcome extends ApplicationBase {

    private $month;
    private $year;

    // constructor
    public function __construct() {
        // parent constructor
        parent::__construct();
        // load model
        $this->load->model('m_dashboard');
        // load javascript
        $this->smarty->load_javascript('resource/js/fusioncharts/fusioncharts.js');
        // get year and month
        $this->year = date('Y');
        $this->month = date('m');
    }

    // view
    public function index() {
        // set page rules 
        $this->_set_page_rule("R");
        // set template content
        $this->smarty->assign("template_content", "dashboard/welcome/index.html");
        $now = date('Y-m-d');
        $now6 = date('Y-m-d', strtotime('+9 month', strtotime($now)));
        //$this->smarty->assign("rs_str", $this->m_dashboard->get_str_6month(array($now,$now6)));
        //$this->smarty->assign("rs_sip", $this->m_dashboard->get_sip_6month(array($now,$now6)));
        //$this->smarty->assign("rs_sik", $this->m_dashboard->get_sik_6month(array($now,$now6)));
        //$this->smarty->assign("no", 1);
        //$this->smarty->assign("no2", 1);
        //$this->smarty->assign("no3", 1);
        // output
        parent::display();
    } 

    // data xml
    public function chart_surat_masuk() {
        /*
         * GET DATA
         */
        $bulan = array(
            '01' => 'Jan',
            '02' => 'Feb',
            '03' => 'Mar',
            '04' => 'Apr',
            '05' => 'Mei',
            '06' => 'Jun',
            '07' => 'Jul',
            '08' => 'Agu',
            '09' => 'Sep',
            '10' => 'Okt',
            '11' => 'Nov',
            '12' => 'Des'
        );
        // get data surat masuk
        $data = $this->m_dashboard->get_total_surat_masuk_by_month();
        // begin chart
        $str_xml = "<chart caption='' subcaption='' xAxisName='Bulan' yAxisName='Total'
            lineThickness='2' showValues='0' formatNumberScale='0' anchorRadius='2' divLineAlpha='20' 
                divLineColor='CC3300' divLineIsDashed='1' showAlternateHGridColor='1' alternateHGridColor='CC3300' 
                    shadowAlpha='40' numvdivlines='5' chartRightMargin='35' bgColor='FFFFFF,CC3300' 
                        bgAngle='270' bgAlpha='10,10'>";
        // kategori
        $str_xml .="<categories>";
        // perulangan bulan
        foreach ($bulan as $key => $value) {
            $str_xml .="<category label='" . $value . "'/>";
        }
        $str_xml .="</categories>";
        // Masuk
        $str_xml .="<dataset seriesName='Masuk' color='2AD62A' anchorBorderColor='2AD62A' anchorBgColor='FFFFFF'>";
        foreach ($bulan as $key => $value) {
            $isi = 0;
            foreach ($data as $key2 => $value2) {
                if ($value2['bulan'] == $key) {
                    $isi = $value2['total_masuk'];
                }
            }
            $str_xml .="<set value = '" . $isi . "'/>";
        }
        $str_xml .="</dataset>";
        // Surat Diproses
        $str_xml .="<dataset seriesName='Diproses' color='FF0000' anchorBorderColor='FF0000' anchorBgColor='FFFFFF'>";
        foreach ($bulan as $key => $value) {
            $isi = 0;
            foreach ($data as $key2 => $value2) {
                if ($value2['bulan'] == $key) {
                    $isi = $value2['total_diproses'];
                }
            }
            $str_xml .="<set value = '" . $isi . "'/>";
        }
        $str_xml .="</dataset>";
        // Surat Selesai
        $str_xml .="<dataset seriesName='Selesai' color='#FFFF00' anchorBorderColor='#FFFF00' anchorBgColor='FFFFFF'>";
        foreach ($bulan as $key => $value) {
            $isi = 0;
            foreach ($data as $key2 => $value3) {
                if ($value3['bulan'] == $key) {
                    $isi = $value3['total_selesai'];
                }
            }
            $str_xml .="<set value = '" . $isi . "'/>";
        }
        $str_xml .="</dataset>";
        $str_xml .="</chart>";
        echo $str_xml;
    }

    // data xml
    public function chart_surat_keluar() {
        /*
         * GET DATA
         */
        $bulan = array(
            '01' => 'Jan',
            '02' => 'Feb',
            '03' => 'Mar',
            '04' => 'Apr',
            '05' => 'Mei',
            '06' => 'Jun',
            '07' => 'Jul',
            '08' => 'Agu',
            '09' => 'Sep',
            '10' => 'Okt',
            '11' => 'Nov',
            '12' => 'Des'
        );
        // get data surat masuk
        $data = $this->m_dashboard->get_total_surat_keluar_by_month();
        // begin chart
        $str_xml = "<chart caption='' subcaption='' xAxisName='Bulan' yAxisName='Total'
            lineThickness='2' showValues='0' formatNumberScale='0' anchorRadius='2' divLineAlpha='20' lineColor='0000FF' 
                divLineColor='0000FF' divLineIsDashed='1' showAlternateHGridColor='1' alternateHGridColor='CC3300' 
                    shadowAlpha='40' numvdivlines='5' chartRightMargin='35' bgColor='FFFFFF,CC3300' 
                        bgAngle='270' bgAlpha='10,10'>";
        // perulangan
        foreach ($bulan as $key => $val) {
            $bulan = $key;
            $jumlah = 0;
            foreach ($data as $key => $value) {
                if ($bulan == $value['bulan']) {
                    $jumlah = $value['total'];
                }
            }
            $str_xml .= "<set name = '" . $val . "' value = '" . $jumlah . "' />";
        }
        $str_xml .="</chart>";
        echo $str_xml;
    }

}