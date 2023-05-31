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
                <u> SURAT KETERANGAN SAKIT </u>
                 
                </td>
            </tr>
        </tbody>
    </table>
    <br> <br>
    Yang bertanda tangan dibawah ini menerangkan bahwa
<br>
<br>
    <table class="content">
        <col style="width: 30%;font-size: 12px;">
        <col style="width: 70%;font-size: 12px;">
        <tbody>
          
            <tr>
                <td>Nama</td>
                <td>
                    : <?= $ket_sakit['NAMA_PASIEN']; ?>
                </td>
            </tr>
            <tr>
                <td>Umur</td>
                <td>
                    : <?= $ket_sakit['umur']; ?>
                </td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>
                    : <?= $ket_sakit['PEKERJAAN']; ?>
                </td>
            </tr>
            <tr>
                <td>SEKOLAH</td>
                <td>
                    : <?= $ket_sakit['SEKOLAH']; ?>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>
                    : <?= $ket_sakit['ALAMAT']; ?>
                </td>
            </tr>
         
      
        </tbody>
    </table>
    <br><br>
    Karena sakit, harus beristirahat selama <?php echo $ket_sakit['JUMLAHHARI'];?> hari 
    <br>
    dari tanggal <?php echo date('d F Y', strtotime($ket_sakit['TGLMULAI']));?>  sampai 
    <?php 
    $tambahhari=$ket_sakit['JUMLAHHARI']-1;
$date1 = new DateTime($ket_sakit['TGLMULAI']);
$date_plus = $date1->modify("+$tambahhari days");
echo $date_plus->format("d F Y")."<br>";
?>
    <br><br>
    Surat Keterangan ini agar digunakan sebagaimana mestinya.
    <br>
    <br>
    <br>
    <br>
    <br>

    <table class="content">
        <col style="width: 20%;font-size: 12px;">
        <col style="width: 20%;font-size: 12px;">
        <col style="width: 60%;font-size: 12px;">
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td align='center'>
                    Metro, <?php echo date('d F Y', strtotime($ket_sakit['mdd']));?>      
                           
                    <br>         
                    <?php 
                   if($ket_sakit['mdb']=='213'){?>
                    <img src="<?php base_url() ?>resource/doc/images/213.png" width="60" height="60" /><?php
                   }
                   else  if($ket_sakit['mdb']=='221'){?>
                    <img src="<?php base_url() ?>resource/doc/images/221.png" width="60" height="60" /><?php
                    }
                    else  if($ket_sakit['mdb']=='219'){?>
                        <img src="<?php base_url() ?>resource/doc/images/219.png" width="60" height="60" /><?php
                    }
                    else  if($ket_sakit['mdb']=='215'){?>
                        <img src="<?php base_url() ?>resource/doc/images/215.png" width="60" height="60" /><?php
                    }
                    else  if($ket_sakit['mdb']=='222'){?>
                        <img src="<?php base_url() ?>resource/doc/images/222.png" width="60" height="60" /><?php
                    }
                    else  if($ket_sakit['mdb']=='216'){?>
                        <img src="<?php base_url() ?>resource/doc/images/216.png" width="60" height="60" /><?php
                    }
                    else  if($ket_sakit['mdb']=='223'){?>
                        <img src="<?php base_url() ?>resource/doc/images/223.png" width="60" height="60" /><?php
                    }
                    else  if($ket_sakit['mdb']=='312'){?>
                        <img src="<?php base_url() ?>resource/doc/images/312.png" width="60" height="60" /><?php
                    }?>
                    <br>
                   <u><?php echo $ket_sakit['NAMA_DOKTER'];?></u>
                   <br>
                   <?php 
                   if($ket_sakit['mdb']=='213'){
                       echo 'SIP. 441/211/D-2.03/SIPII/2019';
                   }
                   else  if($ket_sakit['mdb']=='221'){
                    echo 'SIP. 503/077/SIP-D-FASKES/D-15/2021';
                    }
                    else  if($ket_sakit['mdb']=='219'){
                        echo 'SIP.  503/8116/D-02/03/SIP.I/2020';
                    }
                    else  if($ket_sakit['mdb']=='215'){
                        echo 'SIP. 441/212/D-2.03/SIP.I/2019';
                    }
                    else  if($ket_sakit['mdb']=='222'){
                        echo 'SIP. 503/006/SIP-D-FASKES/D-15/2022';
                    }
                    else  if($ket_sakit['mdb']=='216'){
                        echo 'SIP. 503/103/SIP-D-FASKES/D-15/2021';
                    }
                    else  if($ket_sakit['mdb']=='223'){
                        echo 'SIP. ';
                    }
                    else  if($ket_sakit['mdb']=='312'){
                        echo 'SIP. 503/082/SIP-D-FASKES/D-15/2021';
                    }?>
                </td>
            </tr>
           
        </tbody>
    </table>
</page> 