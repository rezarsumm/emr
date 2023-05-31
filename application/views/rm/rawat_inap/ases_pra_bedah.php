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
 foreach($rs_pra as $h){ 
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
                   Jenis Kelamin : <?php echo $vs['JENIS_KELAMIN']; ?> <br>
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
            ASESMEN PRA BEDAH 
            </td>
        </tr>
        </tbody>
    </table>
 

  

    <table class="content" style="font-size:11px; padding-top:0px; width:700px" >
        <col style="width: 50%;font-size: 11px;">
        <col style="width: 50%;font-size: 11px;">
        <tbody>
  
            <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">Nama Operator : 
                   <?= strip_tags($h['NAMALENGKAP']); ?>
                </td>
             <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">Nama Penata Anestesi : 
                   <?= strip_tags($h['KD_ANESTESI']); ?>
                </td>
              
            </tr>
         
        </tbody>
    </table>
    <table class="content" style="font-size:11px; padding-top:0px;width:700px" >
        <col style="width: 50%;font-size: 11px;">
        <col style="width: 50%;font-size: 11px;">
        <tbody>
  
            <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000; border-bottom:solid 1px #000000;">
                Data Subjektif : <br>
                   <?= strip_tags($h['DATA_S']); ?>
                   <BR>
                   <BR>
                   <BR>
                Data Objektif : <br>
                <?= strip_tags($h['DATA_O']); ?>
                   <BR>
                   <BR>
                   <BR>
                   Diagnosa Pra Bedah : <br>
                   <?= strip_tags($h['DIAGNOSA_PRA']); ?>
                   <BR>
                </td>
             <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000; border-bottom:solid 1px #000000;">Verifikasi Pra Bedah : 
                <br>
                <br>
                    Berkas Rekam Medis : <br>
                    <table>
                    <tr><td>Status Pasien</td><td>: <?= strip_tags($h['V_STATUS_PASIEN']); ?></td></tr>
                    <tr><td>Asesmen Pra Bedah </td><td>: <?= strip_tags($h['V_ASES_PRA_LOK']); ?></td></tr>
                    <tr><td>Informed Consent Bedah</td><td>: <?= strip_tags($h['V_INFORMED_BEDAH']); ?></td></tr>
                    <tr><td>Informed Consent Anestesi </td><td>: <?= strip_tags($h['V_INFORMED_ANESTESI']); ?></td></tr>
                    <tr><td>Asesmen Pra Anestesi </td><td>: <?= strip_tags($h['V_PRA_ANESTESI']); ?></td></tr>
                    <tr><td>Edukasi Anestesi </td><td>: <?= strip_tags($h['V_EDU_ANESTESI']); ?></td></tr>
                    </table> 
                    <br>
                     Hasil pemeriksaan penunjang : <br>
                     <table>
                    <tr><td>Hb</td><td>: <?= strip_tags($h['HB']); ?></td></tr>
                    <tr><td>Leukosit </td><td>: <?= strip_tags($h['LEUKOSIT']); ?></td></tr>
                    <tr><td>Trombosit</td><td>: <?= strip_tags($h['TROMBOSIT']); ?></td></tr>
                    <tr><td>     Hematokrit </td><td>: <?= strip_tags($h['HEMATOKRIT']); ?></td></tr>
                    <tr><td>BT </td><td>: <?= strip_tags($h['BT']); ?></td></tr>
                    <tr><td>CT</td><td>: <?= strip_tags($h['CT']); ?></td></tr>
                    </table> 
                <br>
                <br>
                Pemeriksaan Lainnya :  <?= strip_tags($h['LAINNYA']); ?>
                <br>
                <br>

                Darah/Alat khusus yang diperlukan :  <?= strip_tags($h['ALAT_LAIN']); ?><br><br>
                Obat yang dibawa pasien :  <?= strip_tags($h['OBAT_YG_DIBAWA']); ?><br><br>
                Estimasi Waktu :  <?= strip_tags($h['ESTIMASI_WAKTU']); ?><br><br>
                Rencana Tindakan Pembedahan :  <?= strip_tags($h['RENCANA_TINDAKAN']); ?><br><br>
                </td>
              
            </tr>
           
           
         
        </tbody>
    </table>
 
<BR>
<BR>
<BR>
<BR>

<table class="content" style="font-size:11px; padding-top:0px;width:737px" >
        <col style="width: 35%;font-size: 11px;">
        <col style="width: 30%;font-size: 11px;">
        <col style="width: 30%;font-size: 11px;">
        <tbody>
  
            <tr>
                <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000; border-bottom:solid 1px #000000;">TTD Dokter Operator
                </td>
                <td style="border-left:solid 1px #000000 ; border-right:solid 1 px; border-top:solid 1px #000000; border-bottom:solid 1px #000000;">TTD Pasien/Keluarga
                </td>
                <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000; border-bottom:solid 1px #000000;">TTD Perawat
                </td>
            </tr>

            <tr>
                <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000; border-bottom:solid 1px #000000;">
                <br>
                <br>
                <br>
                <br>
                </td>
                <td style="border-left:solid 1px #000000 ; border-right:solid 1 px; border-top:solid 1px #000000; border-bottom:solid 1px #000000;"> </td>
                <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000; border-bottom:solid 1px #000000;">
                </td>
            </tr>
         
        </tbody>
    </table>

 

    <br>
    <br>
  
</page> 


<?php } ?>