<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once( BASEPATH.'plugins/tcpdf/tcpdf.php' );

class CI_Tcpdf extends TCPDF {

    function CI_Tcpdf() {
        // tcpdf constructor
        parent::__construct('P', 'mm', 'A4', true, 'UTF-8', false);


    }
   /* public function Header(){
        $medis = $this->m_rawat_jalan->get_data_medis_by_rg(array($FS_KD_REG));
                  $this->SetFont('times', '', 10, '', 'false');
     $html = '<table width="100%">
              <tr>
                        <td colspan="3"><center>'.$rs_pasien['FS_NM_PEG'].'<br>' . date('d-m-Y',strtotime($medis['mdd'])).'<br> SIP :'.$rs_pasien['FS_NO_IJIN_PRAKTEK'].'</center></td>
                    </tr>';
      $this->writeHTML($html, true, false, true, false, '');
      
    }*/
}
// END TCPDF Class
