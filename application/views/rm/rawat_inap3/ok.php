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
 foreach($rs_pasien as $h){ 
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
                     Nama : <?php echo $h['Nama_Pasien']; ?><br>
                    No MR : <?php echo $h['No_MR']; ?><br>
                    Tgl Lahir : <?php echo date('d-m-Y', strtotime($h['Tgl_Lahir'])); ?> <br>
                   Jenis Kelamin : <?php echo $h['Jenis_Kelamin']; ?> <br>
                 
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
        <b>   DATA UMUM PRA BEDAH </b>
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
             <tr> <td>Diagnosa </td><td style="padding-right:70px">:<?= strip_tags($h['DIAGNOSA']); ?> </td><td> TB </td><td>: <?= strip_tags($h['TB']); ?></td></tr>
             <tr> <td>Jenis Operasi  </td><td>:<?= strip_tags($h['JENIS_OP']); ?> </td><td> BB </td><td>: <?= strip_tags($h['BB']); ?></td></tr>
             <tr> <td> Dokter Operator  </td><td style="padding-right:70px">:<?= strip_tags($h['Nama_Dokter']); ?> </td><td> TD </td><td>:<?= strip_tags($h['TD']); ?></td></tr>
             <tr> <td> Makan/Minum terakhir/Puasa  </td><td>:<?= strip_tags($h['MAKAN_TERAKHIR']); ?> </td><td> TD </td><td>: <?= strip_tags($h['ND']); ?></td></tr>
             <tr> <td> Riwayat Asma   </td><td>:<?= strip_tags($h['RIAWAYAT_ASMA']); ?> </td><td> SH </td><td>: <?= strip_tags($h['SH']); ?></td></tr>
             <tr> <td> Alergi  </td><td>:<?= strip_tags($h['ALERGI']); ?> </td><td></td><td></td> </tr>
             <tr> <td> Antibiotik Profilaksis   </td><td>:<?= strip_tags($h['ANTIBIOTIK']); ?> </td><td> SH </td><td>: <?= strip_tags($h['SH']); ?></td> </tr>

            </table>
                </td>
            <br>
            </tr>
           
            <tr><td style="border-left:solid 1px ;border-right:solid 1 px #000000; border-bottom:solid 1px #000000;""></td></tr>
            <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">
            <B> PERSIAPAN PRE OPERASI </B>
            <BR>
             <Table>
             <tr><td> Tindakan </td><td></td></tr>
             <tr><td> Melapor Ke Dokter Bedah </td><td> <?= strip_tags($h['LAPOR_DOKTER']); ?> </td></tr>
             <tr><td>  Melapor Ke Kamar Operasi </td><td> <?= strip_tags($h['LAPOR_OK']); ?> </td></tr>
             <tr><td>  Mengisi Surat Izin Pembedahan dan Anestesi </td><td> <?= strip_tags($h['SURAT_IZIN']); ?> </td></tr>
             <tr><td>  Menandai Daerah Operasi </td><td> <?= strip_tags($h['TANDA_OP']); ?> </td></tr>
             <tr><td>  Memakai Gelang Identitas </td><td> <?= strip_tags($h['GELANG']); ?> </td></tr>
             <tr><td>  Melepas Gigi Palsu </td><td> <?= strip_tags($h['LEPAS_BEHEL']); ?> </td></tr>
             <tr><td>  Menghapus Lipstick </td><td> <?= strip_tags($h['HAPUS_LIPS']); ?> </td></tr>
             <tr><td>  MElakukan Oral Hygiene </td><td> <?= strip_tags($h['ORAL_HYG']); ?> </td></tr>
             <tr><td>  Memasang Bidai, Fiksasi Leher </td><td> <?= strip_tags($h['BIDAI']); ?> </td></tr>
             <tr><td>  Memasang Infus </td><td> <?= strip_tags($h['INFUS']); ?> </td></tr>
             <tr><td>  Memasang DC </td><td> <?= strip_tags($h['DC']); ?> </td></tr>
             <tr><td>  Memasang NGT </td><td> <?= strip_tags($h['NGT']); ?> </td></tr>
             <tr><td>  Memasang Drainage </td><td> <?= strip_tags($h['DRAINAGE']); ?> </td></tr>
             <tr><td>  Memasang WSD </td><td> <?= strip_tags($h['WSD']); ?> </td></tr>
             <tr><td> Mencukur Daerah Operasi</td><td> <?= strip_tags($h['CUKUR_OP']); ?> </td></tr>
             <tr><td> Lain-lain</td><td> <?= strip_tags($h['LAIN']); ?> </td></tr>
             </Table>
            </td>
            <br>
            </tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">  Penyakit Kronis :  <?= strip_tags($h['SAKIT_KRONIS']); ?>  </td></tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">  Premedikasi :  <?= strip_tags($h['PREMEDIKASI']); ?>  </td></tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">  IVFD :  <?= strip_tags($h['IVFD']); ?>  </td></tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">  DC :  <?= strip_tags($h['DC']); ?>  </td></tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">  Lampiran  :  <?= strip_tags($h['LAMPIRAN']); ?>  </td></tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">  Darah  :  <?= strip_tags($h['DARAH']); ?>, <?= strip_tags($h['JUM_DARAH']); ?>  </td></tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">  Obat - Obat  :  <?= strip_tags($h['OBAT']); ?>, <?= strip_tags($h['OBAT']); ?>  </td></tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"> Rontgen :  <?= strip_tags($h['RONTGEN']); ?>, <?= strip_tags($h['RONTGEN']); ?>  </td></tr>
            <tr><td style="border-left:solid 1px ;border-right:solid 1 px #000000; border-bottom:solid 1px #000000;""></td></tr>
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
                <td align='center'>TTD Petugas Ruangan</td>
            </tr>
            <tr>
            <td align='center'>
                     
                     Tanggal <?= $h['MDD']; ?>  
                    <br><br>
                    <qrcode value="<?= $h['KD_PERAWAT']; ?> pada <?= $h['MDD']; ?>  " ec="H" style="width: 10mm; background-color: white; color: black;"></qrcode>
                    <br><br>
                    <?= strtoupper($h['KD_PERAWAT']); ?>

                </td> 
                <td align='center'>
                
                </td>
            </tr>
            <tr>
                 <td align='center'>
                 
                </td>
                <td align='center'>
                   --------------------------
                </td>
            </tr>
        </tbody>
 </table>
    <br>
  

    
</page> 

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
        <b> ASUHAN KEPEWATAN PERI OPERATIF </b>
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
             <tr> <td>Tanggal Operasi </td><td style="padding-right:70px">: <?=  date("d-m-Y", strtotime($h['TGL'])); ?> </td><td> Operator </td><td>: <?= strip_tags($h['NAMALENGKAP']); ?></td></tr>
             <tr> <td>Jam Operasi  </td><td>: <?=  date("H:i", strtotime($h['JAM_MULAI'])); ?> - <?=  date("H:i", strtotime($h['JAM_SELESAI'])); ?> </td><td> Perawat Instrumen </td><td>: <?= strip_tags($h['KD_PERAWAT_INS']); ?></td></tr>
             <tr> <td> Sifat Operator  </td><td style="padding-right:70px">:<?= strip_tags($h['SIFAT_OP']); ?> </td><td> Dokter Anestesi </td><td>:<?= strip_tags($h['KD_AHLI_ANESTESI']); ?></td></tr>
             <tr> <td> Jenis Anestesi  </td><td>:<?= strip_tags($h['JENIS_ANES']); ?> </td><td> Perawat Anestesi </td><td>: <?= strip_tags($h['KD_PERAWAT_ANES']); ?></td></tr>
             <tr> <td> Diagnosa  </td><td>:<?= strip_tags($h['DIAGNOSA_PRA']); ?> </td><td> Perawat Sirkuler </td><td>: <?= strip_tags($h['KD_PERAWAT_SERK']); ?></td></tr>
             <tr> <td> Tindakan  </td><td>:<?= strip_tags($h['TINDAKAN_OP']); ?> </td><td></td><td></td> </tr>

            </table>
                </td>
            <br>
            </tr>
           
            <tr><td style="border-left:solid 1px ;border-right:solid 1 px #000000; border-bottom:solid 1px #000000;""></td></tr>
            <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">
            <B> PENGKAJIAN PRE OPERASI </B>
            <BR>
             <Table>
             <tr><td> Kesadaran </td><td> : <?= $h['KESADARAN'];?></td></tr>
             <tr><td> Status Psikologi </td><td> : <?= $h['STATUS_PSIKOLOGI'];?></td></tr>
             <tr><td> Tanda Tanda Vital </td> <td> TD : <?= $h['TD'];?> | ND : <?= $h['ND'];?> | SH : <?= $h['SH'];?> | P : <?= $h['P'];?> </td></tr>
             <tr><td> Puasa  </td><td> : <?= $h['PUASA'];?></td></tr>
            <tr><td> Kulit  </td><td> : <?= $h['KULIT'];?></td></tr>
            <tr><td> Evaluasi  </td><td> : <?= $h['EVALUASI'];?></td></tr>

              </Table>
            </td>
            <br>
            </tr>


            <tr><td style="border-left:solid 1px ;border-right:solid 1 px #000000; border-bottom:solid 1px #000000;""></td></tr>
            <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">
            <B> PENGKAJIAN INTRA OPERASI </B>
            <BR>
             <Table>
             <tr><td> Tanda Tanda Vital </td> <td> TD : <?= $h['TD2'];?> | ND : <?= $h['ND2'];?> | SH : <?= $h['SH2'];?> | P : <?= $h['P2'];?> | SPO2 : <?= $h['SP02'];?> </td></tr>
             <tr><td> Evaluasi  </td><td> : <?= $h['EVALUASI2'];?></td></tr>
            
              </Table>
            </td>
            <br>
            </tr>


            <tr><td style="border-left:solid 1px ;border-right:solid 1 px #000000; border-bottom:solid 1px #000000;""></td></tr>
            <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">
            <B> PENGKAJIAN POST OPERASI </B>
            <BR>
             <Table>
             <tr><td> Tanda Tanda Vital </td> <td> TD : <?= $h['TD3'];?> | ND : <?= $h['ND3'];?> | SH : <?= $h['SH3'];?> | P : <?= $h['P3'];?> | SPO2 : <?= $h['SP023'];?> </td></tr>
             <tr><td> Kulit Turgor  </td><td> : <?= $h['TURGOR'];?></td></tr>
             <tr><td> Terpasang Implant di  </td><td> : <?= $h['IMPLANT'];?></td></tr>
             <tr><td> Infus Masuk  </td><td> : <?= $h['INFUS_MASUK'];?></td></tr>
             <tr><td> Darah Masuk  </td><td> : <?= $h['DARAH_MASUK'];?></td></tr>
             <tr><td> Pendarahan </td><td> : <?= $h['PENDARAHAN'];?></td></tr>
             <tr><td> Urine </td><td> : <?= $h['URINE'];?></td></tr>
             <tr><td> Asites </td><td> : <?= $h['ASITES'];?></td></tr>
             <tr><td> Pus </td><td> : <?= $h['PUS'];?></td></tr>
             <tr><td> Evaluasi  </td><td> : <?= $h['EVALUASI3'];?></td></tr>
            
              </Table>
            </td>
            <br>
            </tr>
            

            <tr><td style="border-left:solid 1px ;border-right:solid 1 px #000000; border-bottom:solid 1px #000000;""></td></tr>
        </tbody>
    </table>

 
<BR> 
<BR>  
    <br>
  
</page> 


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
            ASESMEN PRA ANESTESIA & BEDAH 
            </td>
        </tr>
        </tbody>
    </table>
 

  

    <table class="content" style="font-size:12px; padding-top:0px; width:700px" >
        <col style="width: 100%;font-size: 12px;">
         <tbody>
  
            <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">
            <B> PEMERIKSAAN FISIK </B>
            <BR>
             <?= strip_tags($h['PEMERIKSAAN_FISIK']); ?>
                </td>
            <br>
            </tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><hr></td></tr>


            <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">
            <B> KEADAAN UMUM </B>
            <BR>
             <b>Kebiasaan :</b><br>
              - Merokok sebanyak    <?= strip_tags($h['K_ROKOK']); ?> <br>
              - Minum teh/kopi/alkohol sebanyak    <?= strip_tags($h['K_KOPI']); ?><br>
              - Olahraga teratur sebanyak    <?= strip_tags($h['K_OLGA']); ?><br>
              <br>
              <b>Riwayat Alergi : </b>  <?= strip_tags($h['RIWAYAT_ALERGI']); ?> <br>
              <b>Riwayat Sakit yang diderita : </b>  <?= strip_tags($h['RIWAYAT_SAKIT']); ?> <br>
              <b>Riwayat Sakit keluarga   : </b>  <?= strip_tags($h['RIWAYAT_SAKIT_KELUARGA']); ?> <br>
              <b>Riwayat Operasi   : </b>  <?= strip_tags($h['RIWAYAT_OP']); ?> <br>
              <b>Riwayat terdiagnosa HIV/periksa HIV   : </b>  <?= strip_tags($h['RIWAYAT_HIV']); ?> <br>
                </td>
            <br>
            </tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><hr></td></tr>

            <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">
            <B>    KAJIAN SISTEM </B>
            <BR>
            <table>
            <tr> 
              <td>Hilangnya Gigi </td>
              <td style="padding-right:20px">:  <?= strip_tags($h['GIGI']); ?> </td>
              <td>Muntah </td>
              <td>:  <?= strip_tags($h['MUNTAH']); ?> </td>
            </tr>
            <tr> 
              <td>Mobilitas Leher </td>
              <td style="padding-right:50px">:  <?= strip_tags($h['LEHER']); ?> </td>
              <td>Pingsan </td>
              <td>:  <?= strip_tags($h['PINGSAN']); ?> </td>
            </tr>
            <tr> 
              <td>   Leher Pendek </td>
              <td>:  <?= strip_tags($h['LEHER_PENDEK']); ?> </td>
              <td>Stroke </td>
              <td>:  <?= strip_tags($h['STROKE']); ?> </td>
            </tr>
            <tr> 
              <td>Batuk  </td>
              <td>:  <?= strip_tags($h['BATUK']); ?> </td>
              <td>Kejang </td>
              <td>:  <?= strip_tags($h['KEJANG']); ?> </td>
            </tr>
            <tr> 
              <td>  Sesak Nafas </td>
              <td>:  <?= strip_tags($h['SESAK']); ?> </td>
              <td>Hamil </td>
              <td>:  <?= strip_tags($h['HAMIL']); ?> </td>
            </tr>
            <tr> 
              <td>  Infeksi Saluran Nafas </td>
              <td>:  <?= strip_tags($h['SALURAN_NAPAS']); ?> </td>
              <td>Kelainan Tulang Belakang </td>
              <td>:  <?= strip_tags($h['TULANG_BLK']); ?> </td>
            </tr>
            <tr> 
              <td>Sakit Dada   </td>
              <td>:  <?= strip_tags($h['DADA']); ?> </td>
              <td>Jantung Tidak Normal </td>
              <td>:  <?= strip_tags($h['JANTUNG']); ?> </td>
            </tr>
            </table>
            
                </td>
            <br>
            </tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><hr></td></tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">Ket :  <?= strip_tags($h['KET']); ?></td></tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><hr></td></tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><B> Diagnosa</B>: 
             <?= strip_tags($h['DIAGNOSA']); ?><BR></td></tr>
             <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><B> Penyulit Anestesi</B> :
             <?= strip_tags($h['PENYULIT_ANESTESI']); ?><BR></td></tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><B> Catatan Tindak Lanjut</B> :
             <?= strip_tags($h['TL']); ?><BR></td></tr>
             <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><hr></td></tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><B> Teknik Anestesi</B>  :
             <?= strip_tags($h['TEKNIS_ANESTESI']); ?><BR></td></tr>
             <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><B> Teknik Khusus</B>  :
             <?= strip_tags($h['TEKNIS_KHUSUS']); ?><BR></td></tr>
             <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><B> Perawatan Pasca Anestesia</B>  :
             <?= strip_tags($h['PERAWATAN']); ?><BR></td></tr>

             <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><B> Persiapan Pra Anestesia</B> <br>
             Puasa <?= strip_tags($h['PUASA']); ?><BR>
             Pra Medis <?= strip_tags($h['PRE_MEDIK']); ?><BR>
             TRansport ke Kamar Bedah <?= strip_tags($h['TRANSPORT_RUANG_OP']); ?><BR>
             Rencana OP <?= strip_tags($h['RENCANA_OP']); ?><BR>
             </td></tr>
         
             <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><hr></td></tr>

             <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000; border-bottom:solid 1px #000000">
            <B> CATATAN PERSIAPAN : </B>
             
             <?= strip_tags($h['CATATAN']); ?>
                </td>
            <br>
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
                 <br>
                 <br>
                 <br>
                 <br>
                <td></td>
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
                   Ruang : <?php echo $vs['NAMA_RUANG']; ?> <br>
                   Umur : <?php echo $h['UMUR_SAAT_OP']; ?><br>
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
    <table class="content" style="padding-top: 30px">
        <tbody>
                
        <col style="width: 100%; font-size: 12px;">
        <tr>
            <td align="center">
             LAPORAN OPERASI
            </td>
        </tr>
        </tbody>
    </table>
 

    <table class="content" style="font-size:11px; padding-top:0px;width:737px" >
        <col style="width: 35%;font-size: 11px;">
        <col style="width: 30%;font-size: 11px;">
        <col style="width: 30%;font-size: 11px;">
        <tbody>
  
            <tr>
                <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">Nama Operator : 
                   <?= strip_tags($h['NAMALENGKAP']); ?>
                </td>
                <td style="border-left:solid 1px #000000 ; border-right:solid 1 px; border-top:solid 1px #000000;">Nama Asisten : 
                   <?= strip_tags($h['KD_ASISTEN']); ?>
                </td>
                <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">Nama Perawat : 
                   <?= strip_tags($h['KD_PERAWAT']); ?>
                </td>
            </tr>
         
        </tbody>
    </table>

    <table class="content" style="font-size:11px; padding-top:0px; width:700px" >
        <col style="width: 50%;font-size: 11px;">
        <col style="width: 50%;font-size: 11px;">
        <tbody>
  
            <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">Nama Dokter Ansestesi : 
                   <?= strip_tags($h['KD_AHLI_ANESTESI']); ?>
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
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">Diagnosa Pre-operatif : 
                   <?= strip_tags($h['DIAGNOSA_PRE']); ?>
                </td>
             <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">Diagnosa Post-operatif : 
                   <?= strip_tags($h['DIAGNOSA_POST']); ?>
                </td>
              
            </tr>
            <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;  border-bottom:solid 1px #000000;">Jaringan yang di eksisi : 
                   <?= strip_tags($h['BAGIAN_EKSISI']); ?>
                </td>
             <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;  border-bottom:solid 1px #000000;">Dikirim untuk pemeriksa PA : 
                   <?= strip_tags($h['KIRIM_PA']); ?>
                </td>
              
            </tr>
            <tr>
            <td colspan="2" style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">Nama Operasi : 
                   <?= strip_tags($h['NAMA_OPERASI']); ?>
                </td>
        
            </tr>
         
        </tbody>
    </table>

    <table class="content" style="font-size:11px; padding-top:0px; width:700px" >
        <col style="width: 25%;font-size: 11px;"> 
        <col style="width: 25%;font-size: 11px;"> 
        <col style="width: 25%;font-size: 11px;"> 
        <col style="width: 25%;font-size: 11px;"> 
        <tbody>
  
            <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">Tanggal Operasi : 
                   <?= strip_tags($h['TGL_MULAI']); ?>
                </td>
             <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">Jama Mulai :
                   <?= strip_tags($h['JAM_MULAI']); ?>
                </td>
                <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">Jama Mulai :
                   <?= strip_tags($h['JAM_SELESAI']); ?>
                </td>
                <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">Jama Mulai :
                   <?= strip_tags($h['LAMA_OP']); ?>
                </td>
              
            </tr>
         
        </tbody>
    </table>

    <table class="content" style="font-size:11px; padding-top:0px; width:700px" >
        <col style="width: 100%;font-size: 11px;">  
        <tbody>
  
            <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000; border-bottom:solid 1px #000000;">laporan Operasi : 
                   <?= strip_tags($h['URAIAN_LAPORAN']); ?>
                </td>
            
              
            </tr>
         
        </tbody>
    </table>
<BR>
<BR>
<BR>
<BR>
    <table class="content">
        <col style="width: 50%;font-size: 12px;">
        <col style="width: 50%;font-size: 12px;">
        <tbody> 
            <tr>
                 <br>
                 <br>
                <td></td>
                <td align='center'><?= $alamat['pref_value'];?>, <?= $h['TGL_MULAI']; ?></td>
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
                    <?= $h['NAMALENGKAP']; ?>
                </td>
            </tr>
        </tbody>
 </table>

    <br>
    <br>
  
</page> 



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
        <b>   PERENCANAAN MEDIS PASCA BEDAH </b>
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
              <tr> <td > Dokter Operator  </td><td style="padding-right:70px; border-right:solid 1 px #000000;" >:<?= strip_tags($h['Nama_Dokter']); ?> </td><td> Tanggal Pembedahan </td><td>:<?= strip_tags($h['tanggalop']); ?></td></tr>
             
            </table>
                </td>
            <br>
            </tr>
           
            <tr><td style="border-left:solid 1px ;border-right:solid 1 px #000000; border-bottom:solid 1px #000000;"></td></tr>
            <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000; border-bottom:solid 1px #000000;">
          
            <BR>
             <Table>
              <tr><td> Tingkat Perawatan Medis </td><td> : <?= strip_tags($h['TINGKAT_PERAWATAN']); ?> </td></tr>
             <tr><td>  Monitor dan terapi Lanjutan  </td> </tr>
             <tr><td>  a. Monitor TD, Nadi, RR, Suhu setiap </td><td> : <?= strip_tags($h['PERIODE_MONITOR']); ?> </td></tr>
             <tr><td>  a. Konsultasi Pemberi Pelayanan Lain </td><td> : <?= strip_tags($h['KONSUL_LAYANAN_LAIN']); ?> </td></tr>
             <tr><td> Pengobatan yang diperlukan </td><td> : <?= strip_tags($h['TERAPI']); ?> </td></tr>
            
             </Table>
            </td>
            <br>
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
                 
                <td align='center'>TTD Petugas Anestesi</td>
                <td align='center'>TTD Petugas Ruangan</td>
            </tr>
            <tr>
            <td align='center'>
                     
                     Tanggal <?= $h['MDD']; ?>  
                    <br><br>
                    <qrcode value="<?= $h['KD_PERAWAT']; ?> pada <?= $h['MDD']; ?>  " ec="H" style="width: 10mm; background-color: white; color: black;"></qrcode>
                    <br><br>
                    <?= strtoupper($h['KD_PERAWAT']); ?>

                </td> 
                <td align='center'>
                
                </td>
            </tr>
            <tr>
                 <td align='center'>
                 
                </td>
                <td align='center'>
                   --------------------------
                </td>
            </tr>
        </tbody>
 </table>
    <br>
  
</page> 



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
             <tr> <td>Diagnosa Pra OP </td><td style="padding-right:70px">:<?= strip_tags($h['DIAGNOSA_PRA']); ?> </td><td> Diagnosa Post OP </td><td>: <?= strip_tags($h['DIAGNOSA_POST']); ?></td></tr>
             <tr> <td>Jenis Operasi  </td><td>:<?= strip_tags($h['JENIS_OP']); ?> </td><td> Dokter Operator </td><td>: <?= strip_tags($h['NAMALENGKAP']); ?></td></tr>
             <tr> <td>Jenis Anestesi  </td><td>:<?= strip_tags($h['JENIS_ANEST']); ?> </td><td> Dokter Anestesi </td><td>: <?= strip_tags($h['KD_AHLI_ANEST']); ?></td></tr>
             <tr> <td>Jam Operasi  </td><td>: <?=  date("H:i", strtotime($h['JAM_OP'])); ?> </td><td> Asisten Anestesi </td><td>: <?= strip_tags($h['KD_ANES']); ?></td></tr>
             
 
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
             <tr><td> Status Pasien </td><td>: <?=$h['STATUS_P'];?> </td></tr>
             <tr><td> Catatan Anestesi </td><td>: <?=$h['CAT_ANEST'];?> </td></tr>
             <tr><td> Lap Bedah </td><td>: <?=$h['LAP_BED'];?></td></tr>
             <tr><td> Rencana Medis Post OP </td><td>: <?=$h['REN_MED'];?> </td></tr>
             <tr><td> Checklist Keselamatan </td><td>: <?=$h['CHECK_K'];?></td></tr>
             <tr><td> Askep Peri Operatif </td><td>: <?=$h['ASKEP'];?></td></tr>
             <tr><td> Lembar Pemantauan </td><td>: <?=$h['LEMBAR'];?></td></tr>
             <tr><td> Form Pemeriksaan </td><td>: <?=$h['FORM_P'];?></td></tr>
             <tr><td> Sampel Pemeriksaaan </td><td>: <?=$h['SAMP'];?> </td></tr>
             <tr><td> Foto Rontgen </td><td>: <?=$h['RONTGEN'];?></td></tr>
             <tr><td> Resep </td><td>: <?=$h['RESEP'];?></td></tr>
             <tr><td> Lainnya </td><td>: <?=$h['LAIN'];?></td></tr>
            </Table>
            </td>
            <br>
            </tr>
         
            <tr><td style="border-left:solid 1px ;border-right:solid 1 px #000000; border-bottom:solid 1px #000000;""> Terpasang : <?= $h['TERPASANG'];?></td></tr>
            <tr><td style="border-left:solid 1px ;border-right:solid 1 px #000000; border-bottom:solid 1px #000000;""> Keadaan Umum : TD : <?= $h['TD'];?> | ND : <?= $h['ND'];?> | SH : <?= $h['SH'];?> | P : <?= $h['P'];?></td></tr>
            <tr><td style="border-left:solid 1px ;border-right:solid 1 px #000000; border-bottom:solid 1px #000000;""> Instrksi Dokter Bedah : <?= $h['INTRUKSI_DOKTER'];?></td></tr>
     
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


<?php } ?>