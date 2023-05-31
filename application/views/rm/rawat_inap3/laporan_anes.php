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
 foreach($rs_lap_anes as $h){ 
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
           LAPORAN ANESTESIA
            </td>
        </tr>
        </tbody>
    </table>
 


   
    <table class="content" style="font-size:12px; padding-top:0px; width:700px" >
        <col style="width: 33%;font-size: 11px;">
        <col style="width: 33%;font-size: 11px;">
        <col style="width: 34%;font-size: 11px;">
        <tbody>
  
            <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;border-bottom:solid 1px #000000;">Nama Dokter Ansestesi : 
                   <?= strip_tags($h['KD_AHLI_ANESTESI']); ?>
                </td>
             <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;border-bottom:solid 1px #000000;">Nama Perawat Anestesi : 
                   <?= strip_tags($h['KD_PERAWAT']); ?>
                </td>
                <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000; border-bottom:solid 1px #000000;">Nama Dokter Bedah : 
                   <?= strip_tags($h['KD_ANESTESI']); ?>
                </td>
            </tr>
            <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">Diagnosa Pra Operasi : 
                   <?= strip_tags($h['DIAGNOSA_PRA']); ?>
                </td>
             <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">Diagnosa Post Operasi : 
                   <?= strip_tags($h['DIAGNOSA_POST']); ?>
                </td>
                <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">Tindakan : 
                   <?= strip_tags($h['TINDAKAN']); ?>
                </td>
            </tr>
         
        </tbody>
    </table>
  

    <table class="content" style="font-size:11px; padding-top:0px;width:700px" >
        <col style="width: 50%;font-size: 11px;">
        <col style="width: 50%;font-size: 11px;">
        <tbody>
  
            <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">Jenis ANestesi : 
                   <?= strip_tags($h['JENIS']); ?>
                </td>
             <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">Resiko Anestesi : 
                   <?= strip_tags($h['RESIKO']); ?>
                </td>
              
            </tr>
            </tbody>
     </table>

    <table class="content" style="font-size:12px; padding-top:0px; width:700px" >
        <col style="width: 100%;font-size: 12px;">
         <tbody>
  
            <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000; border-bottom:solid 1px #000000;">
            <B> Pre Operative </B>
            <BR>
             <?= strip_tags($h['PEMERIKSAAN_FISIK']); ?>
             <br>Catatan Lain :     <?= strip_tags($h['CATATAN_LAIN_PRE']); ?>
             <br>   
             </td>
           
            </tr>
           
            <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;border-bottom:solid 1px #000000;">
         
                    Teknik Anestesi : <?= strip_tags($h['TEKNIS_ANESTESI']); ?><BR>
                    Obat Anestesi <br>
                    Premidiksi : <?= strip_tags($h['OBAT_PRE']); ?><BR>
                    Induksi : <?= strip_tags($h['OBAT_INDUKSI']); ?><BR>
                    Muscal : <?= strip_tags($h['OBAT_MUSCAL']); ?><BR>
                    Maintenance : <?= strip_tags($h['OBAT_MAINT']); ?><BR>
                </td>
               
            </tr>
            <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;border-bottom:solid 1px #000000;">
         
                   Waktu Anestesi : <?= strip_tags($h['MULAI_ANEST']); ?> -  <?= strip_tags($h['SELESAI_ANEST']); ?><BR>
                       <BR>
                       <table style="width:650px">
                       <tr>
                        <td style="padding-right:50px">
                            Cairan Masuk 
                            <br>
                            1. RL : <?= strip_tags($h['RL']); ?><BR>
                            2. NaCL : <?= strip_tags($h['NACL']); ?><BR>
                            3. Dextran : <?= strip_tags($h['DEXTRAN']); ?><BR>
                            4. Darah : <?= strip_tags($h['DARAH']); ?><BR>
                            5. Lain-lain : <?= strip_tags($h['CAIRAN_MASUK_LAIN']); ?><BR>
                            </td>
                        <td style="padding-right:50px">  Obat Masuk : <?= strip_tags($h['OBAT_MASUK']); ?></td>
                        <td>
                                Cairan Keluar 
                            <br>
                            1. Pendarahan : <?= strip_tags($h['PENDARAHAN']); ?><BR>
                            2. Urine : <?= strip_tags($h['URINE']); ?><BR>
                            3. Lain-lain : <?= strip_tags($h['CAIRAN_KALUAR_LAIN']); ?><BR>
                            </td>
                       </tr>
                       </table>

                       <br>
                        Posisi :  <?= strip_tags($h['POSISI']); ?><BR>
                        Posisi :  <?= strip_tags($h['CATATAN']); ?><BR>
                        Skala Nyeri :  <?= strip_tags($h['SKALA_NYERI']); ?><BR>
                        <br>
                   </td>
               
            </tr>
            <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;border-bottom:solid 1px #000000;">
         
                
                  <B>Instruksi Pasca Anestesia</B>
                  <br>
                  <table>
                  <tr>
                    <td>  Bila Kesakitan </td><td>:  <?= strip_tags($h['BILA_SAKIT']); ?><BR></td></tr>
                  <tr>
                    <td> Bila Mual  </td><td>:  <?= strip_tags($h['BILA_MUAL']); ?><BR></td></tr>
                  <tr>
                    <td> Antibiotik  </td><td>:  <?= strip_tags($h['ANTIBIOTIK']); ?><BR></td></tr>
                  <tr>
                    <td> Obat-obatan lain  </td><td>:  <?= strip_tags($h['OBAT_LAIN']); ?><BR></td></tr>
                  <tr>
                    <td>  Minum  </td><td>:  <?= strip_tags($h['MINUM']); ?><BR></td></tr>
                  <tr>
                    <td>Infus  </td><td>:  <?= strip_tags($h['INFUS']); ?><BR></td></tr>
                  <tr>
                    <td> Monitor  </td><td>:  <?= strip_tags($h['MONITOR']); ?><BR></td></tr>
                  <tr>
                  </tr>
                  </table>
                
                <br>
                Jam Keluar :  <?= strip_tags($h['JAM_KELUAR']); ?><BR>
               Pindah Ke :  <?= strip_tags($h['PINDAH_KE']); ?><BR>
                 
                 
                
                  
                 
                  </td>
               
            </tr>
                   
              
            
          

        </tbody>
    </table>

 
<BR> 
<BR> 
<table class="content">
        <col style="width: 50%;font-size: 12px;">
        <col style="width: 50%;font-size: 12px;">
        <tbody> 
            <tr>
                
                <td> <br>
                 <br>
                 <br>
                 <br></td>
                <td align='center'>TTD DPJP Anestesi</td>
            </tr>
            <tr>
                <td></td>
                <td align='center'>
                     <br>
                </td>
            </tr>
            <tr>
                <td></td>
                <td align='center'>
                   --------------------------
                </td>
            </tr>
        </tbody>
 </table>
    <br>
  
</page> 


<?php } ?>