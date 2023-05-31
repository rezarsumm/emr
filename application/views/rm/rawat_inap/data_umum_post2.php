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
    table.page_header img {
        float: left;
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
<?php date_default_timezone_set('Asia/Jakarta'); 
//  var_dump($rs_ases_medis); 
?>
 
<page orientation="P" backtop="15mm" backbottom="10mm" backleft="15mm" backright="10mm" style="font-size:9pt">
<page_header>
        <table class="page_header">
            <col style="width: 10%;font-size: 12px;">
            <col style="width: 45%;font-size: 12px;">
            <col style="width: 45%;font-size: 12px;">
            <tr>
                <td>
                    <img src="<?php base_url() ?>resource/doc/images/icon/logo.png" width="70" height="70" />
                </td>
                <td style="text-align: center;">
                     <h5>MAJELIS PEMBINA KESEHATAN UMUM
                <br>RSU MUHAMMADIYAH METRO</h5>
                
           

             <table style="float:; padding-left: 40px"> 
                <tr> 
                    <td style="text-align: left; font-size: 8px"> Jl Soekarno Hatta No. 42 Mulyojati 16 B</td>
                    <td style="text-align: left; font-size:  8px" > Fax : (0725) 47760 </td>
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
                 <td style="width:10%; float:right" >
                <img src="<?php base_url() ?>resource/doc/images/icon/kars.png" width="50" height="50" />
            </td>
            <td  style="font-size: 10px">
                     Nama : <?php echo $rs_pasien['NAMA_PASIEN']; ?><br>
                    No MR : <?php echo $rs_pasien['NO_MR']; ?><br>
                    Tgl Lahir : <?php echo date('d-M-Y', strtotime($rs_pasien['TGL_LAHIR'])); ?> <br>
                   Jenis Kelamin : <?php echo $rs_pasien['JENIS_KELAMIN']; ?> <br>
                 
                  </td>
            </tr>
        </table>
        <hr>
    </page_header>
    <page_footer>
    <table style="width: 100%; border-top: solid 1px black;">
        <tr>
            <td style="text-align: left; width: 80%">&nbsp;</td>
            <td style="text-align: right; width: 20%">Halaman [[page_cu]]/[[page_nb]]</td>
        </tr>
    </table>
    </page_footer>
 <br>
 <br>
 
    <table class="content" style="padding-top: 30px; padding-left:2px">
        <tbody>
                
        <col style="width: 100%; font-size: 12px;">
        <tr>
            <td align="center">
        <b>   DATA UMUM POST OPERASI </b>
            </td>
        </tr>
        </tbody>
    </table>
 

  

    <table class="content" style="font-size:12px; padding-top:0px; width:700px" >
        <col style="width: 100%;font-size: 12px;">
         <tbody>
  
            <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">
         
            <BR>
             
            <table>
             <tr> <td>Diagnosa Pra OP </td><td style="padding-right:70px">:<?= strip_tags($rs_umum_post['DIAGNOSA_PRA']); ?> </td><td> Diagnosa Post OP </td><td>: <?= strip_tags($rs_umum_post['DIAGNOSA_POST']); ?></td></tr>
             <tr> <td>Jenis Operasi  </td><td>:<?= strip_tags($rs_umum_post['JENIS_OP']); ?> </td><td> Dokter Operator </td><td>: <?= strip_tags($rs_umum_post['NAMALENGKAP']); ?></td></tr>
             <tr> <td>Jenis Anestesi  </td><td>:<?= strip_tags($rs_umum_post['JENIS_ANEST']); ?> </td><td> Dokter Anestesi </td><td>: <?= strip_tags($rs_lap_anes3['NAMALENGKAP']); ?></td></tr>
             <tr> <td>Jam Operasi  </td><td>: <?=  date("H:i", strtotime($rs_umum_post['JAM_OP'])); ?> </td><td> Asisten Anestesi </td><td>: <?= strip_tags($rs_umum_post['KD_ANES']); ?></td></tr>
             
 
            </table>
                </td>
            <br>
            </tr>
           
            <tr><td style="border-left:solid 1px ;border-right:solid 1 px #000000; border-bottom:solid 1px #000000;""></td></tr>
            <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">
            <B> SERAH TERIMA OPERASI </B>
            <BR>
             <Table>
             <tr><td> Status Pasien </td><td>: <?=$rs_umum_post['STATUS_P'];?> </td></tr>
             <tr><td> Catatan Anestesi </td><td>: <?=$rs_umum_post['CAT_ANEST'];?> </td></tr>
             <tr><td> Lap Bedah </td><td>: <?=$rs_umum_post['LAP_BED'];?></td></tr>
             <tr><td> Rencana Medis Post OP </td><td>: <?=$rs_umum_post['REN_MED'];?> </td></tr>
             <tr><td> Checklist Keselamatan </td><td>: <?=$rs_umum_post['CHECK_K'];?></td></tr>
             <tr><td> Askep Peri Operatif </td><td>: <?=$rs_umum_post['ASKEP'];?></td></tr>
             <tr><td> Lembar Pemantauan </td><td>: <?=$rs_umum_post['LEMBAR'];?></td></tr>
             <tr><td> Form Pemeriksaan </td><td>: <?=$rs_umum_post['FORM_P'];?></td></tr>
             <tr><td> Sampel Pemeriksaaan </td><td>: <?=$rs_umum_post['SAMP'];?> </td></tr>
             <tr><td> Foto Rontgen </td><td>: <?=$rs_umum_post['RONTGEN'];?></td></tr>
             <tr><td> Resep </td><td>: <?=$rs_umum_post['RESEP'];?></td></tr>
             <tr><td> Lainnya </td><td>: <?=$rs_umum_post['LAIN'];?></td></tr>
            </Table>
            </td>
            <br>
            </tr>
         
            <tr><td style="border-left:solid 1px ;border-right:solid 1 px #000000; border-bottom:solid 1px #000000;""> Terpasang : <?= $rs_umum_post['TERPASANG'];?></td></tr>
            <tr><td style="border-left:solid 1px ;border-right:solid 1 px #000000; border-bottom:solid 1px #000000;""> Keadaan Umum : TD : <?= $rs_umum_post['TD'];?> | ND : <?= $rs_umum_post['ND'];?> | SH : <?= $rs_umum_post['SH'];?> | P : <?= $rs_umum_post['P'];?></td></tr>
            <tr><td style="border-left:solid 1px ;border-right:solid 1 px #000000; border-bottom:solid 1px #000000;""> Instrksi Dokter Bedah : <?= $rs_umum_post['INTRUKSI_DOKTER'];?></td></tr>
     
            </tbody>
    </table>

 
<BR> 
<BR> 
<table class="content">
        <col style="width: 50%;font-size: 12px;">
        <col style="width: 50%;font-size: 12px;">
        <tbody> 
            <tr>
                 
                <td align='center'>TTD Petugas Anestesi</td>
                <td align='center'>TTD Petugas RUangan</td>
            </tr>
            <tr>
            <td align='center'>
                     <br>
                     <br>
                     <br>
                     <br>
                </td>
                <td align='center'>
                     <br>
                     <br>
                     <br>
                     <br>
                </td>
            </tr>
            <tr>
                 <td align='center'>
                   --------------------------
                </td>
                <td align='center'>
                   --------------------------
                </td>
            </tr>
        </tbody>
 </table>
    <br>
  
</page> 

 