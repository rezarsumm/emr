<style type="text/Css">
    <!--
    table.page_header {
        width: 100%;
        //border-bottom: solid 1px #000000;
        padding-bottom: 5px;
    }
    table.page_header h2 {
        margin: 0 20px 0 0;
        padding: 0 20px 5px 5px;
    }
  
    table.page_header h5 {
        float: left;
        margin: 0 20px 0 0;
        padding: 0 20px 5px 5px;
    }
    table.content {
        width: 100%;
        margin : 0px;
        border-collapse: collapse;
        border: solid 1px #000000;
    }
    td {
        vertical-align:top;
        padding: 3px 5px;
    }
    -->
</style>
<?php
date_default_timezone_set('Asia/Jakarta');
$dayList = array(
    'Sun' => 'Minggu',
    'Mon' => 'Senin',
    'Tue' => 'Selasa',
    'Wed' => 'Rabu',
    'Thu' => 'Kamis',
    'Fri' => 'Jumat',
    'Sat' => 'Sabtu'
);
?>
<page orientation="P" backtop="15mm" backbottom="10mm" backleft="15mm" backright="10mm" style="font-size:9pt">
    <page_header>
     <table class="page_header">
        <tr>
            <td style="width:10%;border-bottom:solid 1px #000000; float: left" >
                <img src="<?php base_url() ?>resource/doc/images/icon/logo.png" width="50" height="50" />
            </td>
          
            <td style="width:75%;text-align: center;border-bottom:solid 1px #000000;">
                <h5>MAJELIS PEMBINA KESEHATAN UMUM
                <br>RSU MUHAMMADIYAH METRO</h5>
                
           

             <table style="float:center; padding-left: 60px"> 
                <tr> 
                    <td style="text-align: left; font-size: 8px"> Jl Soekarno Hatta No. 42 Mulyojati 16 B</td>
                    <td style="text-align: left; font-size: 8px" > Fax : (0725) 47760 </td>
                </tr>
                <tr> 
                    <td style="text-align: left; font-size: 8px" > Metro Barat - Kota Metro 34125 </td>
                    <td style="text-align: left; font-size: 8px" > e-mail : info.rsumm@gmail.com </td>
                </tr>
                <tr> 
                    <td style="text-align: left; font-size: 8px"> Telp : (0725) 49490 - 7850378</td>
                    <td style="text-align: left; font-size: 8px"> website : www.rsumm.co.id </td>

                </tr>
               
            </table>
        </td>
          <td style="width:15%;border-bottom:solid 1px #000000; float:right" >
                <img src="<?php base_url() ?>resource/doc/images/icon/kars.png" width="50" height="50" />
            </td>

          
        </tr>
    </table>

    </page_header>
    <br><br>
    <table class="content">
        <tbody>
            <col style="width: 100%;padding-top: 30px;font-size: 15px;">
            <tr>
                <td align="center">
                <u> SURAT KETERANGAN DOKTER </u>
                <br> No: <?= $ket_skd['NO_SURAT'];?>/SKD/III.6.AU/<?= date('Y');?>
                 
                </td>
            </tr>
        </tbody>
    </table>
    <br> <br>
<div class="f" style="text-align:justify;">
    Yang bertanda tangan dibawah ini,  <?= $ket_skd['NAMA_DOKTER'];?>, menerangkan dengan mengingat Sumpah/Perjanjian sewaktu menerima jabatan, bahwa :

<br>
<br>
    <table class="content">
        <col style="width: 30%;font-size: 12px;">
        <col style="width: 70%;font-size: 12px;">
        <tbody>
          
            <tr>
                <td>NAMA</td>
                <td>
                    : <?= $ket_skd['NAMA_PASIEN']; ?>
                </td>
            </tr>
            <tr>
                <td>UMUR</td>
                <td>
                    :  <?php 
          $awal = new DateTime($ket_skd['TGL_LAHIR']);
          $hari_ini = new DateTime();  
          $diff = $hari_ini->diff($awal);
            
          echo ucwords(strtoupper($diff->y." Tahun ". $diff->m ." Bulan ".$diff->d." Hari "));
          ?>

                </td>
            </tr>
            <tr>
                <td>PEKERJAAN</td>
                <td>
                    : <?= ucwords(strtoupper($ket_skd['PEKERJAAN'])); ?>
                </td>
            </tr> 
            <tr>
                <td>ALAMAT</td>
                <td>
                    : <?= $ket_skd['ALAMAT']; ?>
                </td>
            </tr>
         
      
        </tbody>
    </table>
    <br>
   Hasil pemeriksaan yang dilakukan meliputi :
    <br>
    Berat Badan : <?= $ket_skd['FS_BB'];?> Kg. 
    Tinggi Badan : <?= $ket_skd['FS_TB'];?> cm. 
    Tensi : <?= $ket_skd['FS_TD'];?> mmHg
    <br>
    Buta Warna : <?= $ket_skd['BUTA_WARNA'];?> <br>
    Menggunakan Kacamata : <?= $ket_skd['KACAMATA'];?> <br>
    <br><br>
    Surat keterangan ini dipergunakan untuk : <?= $ket_skd['TUJUANSURAT'];?>
    <br>
    <br>
    <br>
    <br>
    <br>
 </div>

    <table class="content">
        <col style="width: 20%;font-size: 12px;">
        <col style="width: 20%;font-size: 12px;">
        <col style="width: 60%;font-size: 12px;">
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td align='center'>
                    Metro, <?php echo date('d F Y', strtotime($ket_skd['mdd']));?>      
                           
                    <br>         
                    <?php 
                   if($ket_skd['mdb']=='213'){?>
                      <br>
                        <br>
                 <!--    <img src="<?php base_url() ?>resource/doc/images/213.png" width="60" height="60" /> -->
                    <?php
                   }
                   else  if($ket_skd['mdb']=='221'){?>
                   <!--  <img src="<?php base_url() ?>resource/doc/images/221.png" width="60" height="60" /> -->
                     <br>
                        <br>
                    <?php
                    }
                    else  if($ket_skd['mdb']=='219'){?>
                      <!--   <img src="<?php base_url() ?>resource/doc/images/219.png" width="60" height="60" /> -->
                        <br>
                        <br>
                        <?php
                    }
                    else  if($ket_skd['mdb']=='215'){?>
                      <!--   <img src="<?php base_url() ?>resource/doc/images/215.png" width="60" height="60" /> -->
                        <br>
                        <br>
                        <?php
                    }
                    else  if($ket_skd['mdb']=='222'){?>
                       <!--  <img src="<?php base_url() ?>resource/doc/images/222.png" width="60" height="60" /> -->
                         <br>
                        <br>
                        <?php
                    }
                    else  if($ket_skd['mdb']=='216'){?>
                        <br>
                        <br>
                       <!--  <img src="<?php base_url() ?>resource/doc/images/216.png" width="60" height="60" /> -->
                        <?php
                    }
                    else  if($ket_skd['mdb']=='223'){?>
                       <!--  <img src="<?php base_url() ?>resource/doc/images/223.png" width="60" height="60" /> -->
                         <br>
                        <br>
                        <?php
                    }
                       else  if($ket_skd['mdb']=='202'){?>
                       <!--  <img src="<?php base_url() ?>resource/doc/images/202.png" width="60" height="60" /> -->
                         <br>
                        <br>
                        <?php
                    }
                    else  if($ket_skd['mdb']=='312'){?>
                       <!--  <img src="<?php base_url() ?>resource/doc/images/312.png" width="60" height="60" /> -->
                         <br>
                        <br>
                        <?php
                    }
                    else{?>    <br>
                        <br> <?php }?>
                    <br>
                   <u><?php echo $ket_skd['NAMA_DOKTER'];?></u>
                   <br>
                   <?php 
                   if($ket_skd['mdb']=='213'){
                       echo 'SIP. 503/042/SIP-D-FASKES/D-15/2023';
                   }
                   else  if($ket_skd['mdb']=='221'){
                    echo 'SIP. 503/077/SIP-D-FASKES/D-15/2021';
                    }
                    else  if($ket_skd['mdb']=='219'){
                        echo 'SIP.  503/8116/D-02/03/SIP.I/2020';
                    }
                    else  if($ket_skd['mdb']=='215'){
                        echo 'SIP. 441/212/D-2.03/SIP.I/2019';
                    }
                    else  if($ket_skd['mdb']=='222'){
                        echo 'SIP. 503/006/SIP-D-FASKES/D-15/2022';
                    }
                    else  if($ket_skd['mdb']=='216'){
                        echo 'SIP. 503/103/SIP-D-FASKES/D-15/2021';
                    }
                    else  if($ket_skd['mdb']=='223'){
                        echo 'SIP. 503/013/SIP-D-FASKES/D-15/2022';
                    }
                     else  if($ket_skd['mdb']=='202'){
                        echo 'SIP. 441/274/D-2.03/SIP.I/2017';
                    }
                    else  if($ket_skd['mdb']=='312'){
                        echo 'SIP. 503/082/SIP-D-FASKES/D-15/2021';
                    }
                     else  if($ket_skd['mdb']=='203'){
                        echo 'SIP. 441/3149/D-2.03/SIP.I/2019';
                    }
                    else{}?>
                </td>
            </tr>
           
        </tbody>
    </table>
</page> 