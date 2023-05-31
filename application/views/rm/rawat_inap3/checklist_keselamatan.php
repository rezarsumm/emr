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
 foreach($rs_sign_in as $h){ 
?>
 
<page orientation="P" backtop="15mm" backbottom="10mm" backleft="15mm" backright="10mm" style="font-size:9pt">
<page_header>
        <table class="page_header">
            <col style="width: 10%; font-size: 11px;">
            <col style="width: 45%; font-size: 11px;">
            <col style="width: 45%; font-size: 11px;">
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
                
        <col style="width: 100%;  font-size: 11px;">
        <tr>
            <td align="center">
        <b>  CHECK LIST KESELAMATAN PEMBEDAHAN </b>
            </td>
        </tr>
        </tbody>
    </table>
 
    <table class="content" style=" font-size: 11px; padding-top:0px; width:700px" >
<col style="width: 50%; font-size: 11px;">
<col style="width: 50%; font-size: 11px;">

<tr>
<td>  Tindakan Operasi : <?= strip_tags($h['NAMA_OP']); ?> </td>
<td>  Tanggal Operasi : <?= strip_tags($h['TGL']); ?></td>
</tr></table>
  
  
<br> 
    <table class="content" style=" font-size: 11px; padding-top:0px; width:700px" >
        <col style="width: 100%; font-size: 11px;">
         <tbody>
         <tr>
             <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">
         
             </td>
        </tr>

            <tr>
             <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">
            <B> SIGN IN / Sebelum Induksi </B>
            <BR>
              <table>
              <tr><td> Apakah Pasien telah dikonfirmasi <b>Identitas, lokasi operasi dan tindakan operasi dan informed consent ? </b>  </td><td>: <?= strip_tags($h['IN_KONFIR_IDENTITAS']); ?> </td> </tr>
              <tr><td> Apakah lokasi operasi diberi tanda ? </td><td>: <?= strip_tags($h['IN_TANDA_LOKASI']); ?></td></tr>
              <tr><td> Apakah mesin anestesi dan obat obatan dicek lengkap ?</td><td>: <?= strip_tags($h['IN_MESIN_LENGKAP']); ?></td></tr>
              <tr><td>Apakah Pasien memiliki alergi ?</td><td>: <?= strip_tags($h['IN_RIWAYAT_ALEGI']); ?></td></tr>
              <tr><td>Apakah Pasien memiliki asma ?</td><td>: <?= strip_tags($h['IN_RIWAYAT_ASMA']); ?></td></tr>
              <tr><td>Adakah rencana pemasangan implant ?</td><td>: <?= strip_tags($h['IN_RENCANA_IMPLANT']); ?></td></tr>
              <tr><td>Resiko Kehilangan Darah > 500ml ?</td><td>: <?= strip_tags($h['IN_RESIKO_HILANG_DARAH']); ?></td></tr>
                </table>
            </td></tr>
            <br>
             <tr><td style="border-left:solid 1px ;border-right:solid 1 px #000000; border-bottom:solid 1px #000000;""></td></tr>
        </tbody>
    </table>

 
<BR> 
 
    <br>

    <table class="content" style=" font-size: 11px; padding-top:0px; width:700px" >
        <col style="width: 100%; font-size: 11px;">
         <tbody>
  
            <tr>
             <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">
            <B> TIME OUT (Sebelum memulai tindakan operasi)  </B>
            <BR>
              <table>
              <tr><td> Apakah semua anggota memperkenalkan diri   </td><td style="border-right:solid 1px #000000;">: <?= strip_tags($h['TIME_PERKENALAN_ANGGOTA']); ?> </td><td >  Apa pemantauan alat khusus diperlukan ?  </td><td>: <?= strip_tags($h['TIME_PANTAU_ALAT']); ?> </td> </tr>
              <tr><td>  Berapa banyak kehilangan darah diantisipasi ? </td><td style="border-right:solid 1px ;">: <?= strip_tags($h['TIME_ANTISIPASI_HILANG_DARAH']); ?> </td> <td>  Apakah sterilitas instrumentasi dikonfirmasi ?  </td><td>: <?= strip_tags($h['TIME_STERIL_INSTRUMEN']); ?> </td></tr>
              <tr><td>  Apakah ada persyaratan peralatan khusus ? </td><td style="border-right:solid 1px ;">: <?= strip_tags($h['IME_ALAT_KHUSUS']); ?> </td> <td>  Apakah ada masalah peralatan ?  </td><td>: <?= strip_tags($h['TIME_MASALAH_ALAT']); ?> </td></tr>
              <tr><td> Apakah ada persyaratan peralatan khusus ?  </td><td style="border-right:solid 1px ;">: <?= strip_tags($h['TIME_ALAT_KHUSUS']); ?> </td><td>  Apakah luka infeksi telah ditangani ?  </td><td>: <?= strip_tags($h['TIME_LOKASI_LUKA']); ?> </td> </tr>
              <tr><td>  Apakah ada langkah kritis ? anda ingin kami bantu?  </td><td style="border-right:solid 1px ;">: <?= strip_tags($h['TIME_LANGKAH_KRITIS']); ?> </td> <td>  Apakah Profilaksi telah dilakukan ?  </td><td>: <?= strip_tags($h['TIME_PROFILAKSI']); ?> </td></tr>
              <tr><td>  Apakah ada masalah spesifik pasien?  </td><td style="border-right:solid 1px ;">: <?= strip_tags($h['TIME_MASALAH_SPESIFIK']); ?> </td> <td>   Apakah Hasil Radiologi dipasang ? </td><td>: <?= strip_tags($h['TIME_PROFILAKSI']); ?> </td> </tr>
              <tr><td>  Derajat ASA pasien?  </td><td style="border-right:solid 1px ;">: <?= strip_tags($h['TIME_DERAJAT_ASA']); ?> </td> </tr>
             
           
             
               </table>
            </td></tr>
            <br>
             <tr><td style="border-left:solid 1px ;border-right:solid 1 px #000000; border-bottom:solid 1px #000000;""></td></tr>
        </tbody>
    </table>
  <br>

  <table class="content" style=" font-size: 11px; padding-top:0px; width:700px" >
        <col style="width: 100%; font-size: 11px;">
         <tbody>
  
            <tr>
             <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">
                    <B> SIGN OUT (Sebelum tim bedah keluar kamar operasi) </B>
                    <BR>
                        <table>
                        <tr> <td>
                                <table>
                                <tr><td>  Apakah nama tindakan dicatat ?  </td><td>: <?= strip_tags($h['OUT_CATAT_TINDAKAN']); ?> </td> </tr>
                                <tr><td>  Apakah Instrumen benda tajam dan kasa lengkap ?  </td><td>: <?= strip_tags($h['OUT_INSTRUMEN_LENGKAP']); ?> </td> </tr>
                                <tr><td>   Penanganan jaringan yang akan dikirim ke PA </td><td>: <?= strip_tags($h['OUT_INSTRUMEN_LENGKAP']); ?> </td> </tr>
                                <tr><td>  apakah ada masalah peralatan  </td><td>: <?= strip_tags($h['OUT_MASALAH_ALAT']); ?> </td> </tr>
                                <tr><td>  apakah ada yang menjadi perhatian khusus pada pemulihan pasien ?  </td><td>: <?= strip_tags($h['OUT_PERHATIAN']); ?> </td> </tr>
                                </table>
                             </td>
                             <td> Pemakaian Benda Tajam
                             
                             </td></tr>
                        </table>
                    
              </td></tr>
            <br>
              
             <tr><td style="border-left:solid 1px ;border-right:solid 1 px #000000; border-bottom:solid 1px #000000;""></td></tr>
        </tbody>
    </table>
    <table class="content" style=" font-size: 11px; padding-top:0px; width:700px" >
                                    <tr>
                                    <td style="border-left:solid 1px ;border-right:solid 1 px #000000; border-bottom:solid 1px #000000;border-top:solid 1px #000000;""> Nama benda </td>
                                    <td style="border-left:solid 1px ;border-right:solid 1 px #000000;border-bottom:solid 1px #000000; border-top:solid 1px #000000;""> Hitungan pertama </td>
                                    <td style="border-left:solid 1px ;border-right:solid 1 px #000000;border-bottom:solid 1px #000000; border-top:solid 1px #000000;""> Tambahan </td>
                                    
                                    </tr>
                                    
                                    <?php  foreach($bendatajam as $b){ ?>
                                        <tr>
                                        <td style="border-left:solid 1px ;border-right:solid 1 px #000000; border-bottom:solid 1px #000000;"><?=$b['namabarang'];?></td>
                                        <td style="border-left:solid 1px ;border-right:solid 1 px #000000; border-bottom:solid 1px #000000;"><?=$b['hit1'];?></td>
                                        <td style="border-left:solid 1px ;border-right:solid 1 px #000000; border-bottom:solid 1px #000000;"><?=$b['tambahan'];?></td>
                                        </tr>
                                        <?php } ?>

                                </table>
  

</page> 


<?php } ?>