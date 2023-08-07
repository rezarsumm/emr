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
<?php date_default_timezone_set("Asia/Jakarta"); ?>



<page backtop="27mm" backbottom="10mm" backleft="2mm" backright="2mm" style="font-size:10pt">
   <page_header>
        <table class="page_header">
            <col style="width: 10%;font-size: 12px;">
            <col style="width: 45%;font-size: 12px;">
            <col style="width: 45%;font-size: 12px;">
            <tr>
                <td>
                    <img src="<?php base_url() ?>resource/doc/images/icon/logo.png" width="50" height="50" />
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
            <td  style="font-size: 9px">
                Nama : <?php echo $rs_pasien["NAMA_PASIEN"]; ?><br>
                No MR : <?php echo $rs_pasien["NO_MR"]; ?><br>
                Tgl Lahir : <?php echo date("d-M-Y", strtotime($rs_pasien["TGL_LAHIR"])); ?>
            </td>
        </tr>
    </table>
    </page_header>
       <hr style="margin-top:0px">
    <page_footer> 
    <table style="width: 100%; border-top: solid 1px black;">
        <tr>
            <td style="text-align: left; width: 80%">&nbsp;</td>
            <td style="text-align: right; width: 20%">Halaman [[page_cu]]/[[page_nb]]</td>
        </tr>
    </table>
    </page_footer>
 
    
    <br>
 
<div class="a" style="border: solid black 1px; font-size: 11px;">

    <table class="content"    >
    <tr class="headrow">
        <th colspan="4" style="text-align:center"><h4>TRIASE</h4></th>
    
    </tr>
    <tr>
        <td><b>Kontak Awal Pasien</b></td>
    </tr>
    <tr>
        <td style="">Tanggal</td>
        <td style="">: <?=$rs_triase["TGL_DATANG"];?>, Jam Datang : <?=$rs_triase["JAM_DATANG"];?>
        </td>
     
    </tr>

    <tr>
        <td style="">Cara Masuk</td>
        <td style="">: <?=$rs_triase["CARA_MASUK"];?>
        </td>
    </tr>
    <tr>
        <td style="">Sudah Terpasang</td>
        <td style="">: <?=$rs_triase["SUDAH_TERPASANG"];?>
        </td>
    </tr>
    <tr>
        <td style="">Alasan Kedatangan</td>
        <td style="">: <?=$rs_triase["ALASAN_DATANG"];?>
        </td>
    </tr>
    <tr>
        <td style="">Kendaraan</td>
        <td style="">: <?=$rs_triase["KENDARAAN"];?>
        </td>
    </tr>
    <tr>
        <td style="">Identitas Pengantar</td>
        <td style="">: <?=$rs_triase["NAMA_PENGANTAR"];?> 
        </td>
    </tr>
  
    <tr>
        <td style="">No Pengantar</td>
        <td style="">: <?=$rs_triase["TELP_PENGANTAR"];?>
        </td>
    </tr>
    <tr>
        <td style="">Kasus Trauma</td>
        <td style="">: <?=$rs_triase["JENIS_KASUS"];?>
        </td>
    </tr>

    <tr>
        <td style="">TRAUMA</td>
        <td style="">: <?php if($rs_triase["JENIS_TRAUMA"]=='1'){ echo " Kll Tunggal, di ".$rs_triase["TEMPAT_KEJADIAN"]." Tgl ".$rs_triase["TGL_KEJADIAN"]." jam ".$rs_triase["JAM_KEJADIAN"]; }  
             else if($rs_triase["JENIS_TRAUMA"]=='2'){ echo " Kll Ganda, di ".$rs_triase["TEMPAT_KEJADIAN"]." Tgl ".$rs_triase["TGL_KEJADIAN"]." jam ".$rs_triase["JAM_KEJADIAN"]; }  
             else  if($rs_triase["JENIS_TRAUMA"]=='3'){ echo " Jatuh dari ketinggian , ".$rs_triase["URAIAN_TRAUMA"]; }  
             else  if($rs_triase["JENIS_TRAUMA"]=='4'){ echo " Trauma Listrik , ".$rs_triase["URAIAN_TRAUMA"]; }  
             else if($rs_triase["JENIS_TRAUMA"]=='5'){ echo "Trauma Zat Kimia , ".$rs_triase["URAIAN_TRAUMA"]; }  
             else  if($rs_triase["JENIS_TRAUMA"]=='5'){ echo "Trauma Zat Kimia , ".$rs_triase["URAIAN_TRAUMA"]; }  
             else  { echo $rs_triase["URAIAN_TRAUMA"]; }  ?>
        </td>
    </tr>
<br>
<br>
<br>
    <tr>
        <td><b>Kontak Awal Pasien</b></td>
    </tr>
    <tr>
    <td style="">Keluhan Utama</td>
    <td style="">: <?=$rs_triase["KELUHAN"];?>
    </td>
    </tr>
    <br>
    <br>
    <br>
    <tr>
        <td colspan="2"><b>Vital sign</b></td>
        <td style=""><b>Skor</b></td>
    </tr>

    <tr>
        <td style="">Kesadaran</td>
        <td style="">: <?=$rs_triase["KESADARAN"];?>
        </td>
        <td style="">Kesadaran</td>
        <td style="">: <?=$rs_triase["SKOR_KESADARAN"];?>
        </td>
    
    </tr>
    <tr>
    <td style="">Tekanan Darah</td>
        <td style="">: <?=$rs_triase["TD"];?> mmHg
        </td>
        <td style="">Tekanan Darah</td>
        <td style="">: <?=$rs_triase["SKOR_TD"];?>
        </td>
    </tr>
    <tr>
    <td style="">Nadi</td>
        <td style="">: <?=$rs_triase["N"];?> x/menit
        </td>
        <td style="">Nadi</td>
        <td style="">: <?=$rs_triase["N_SKOR"];?>
        </td>
    </tr>
    <tr>
    <td style="">Respirasi</td>
        <td style="">: <?=$rs_triase["R"];?> x/menit
        </td>
        <td style="">Respirasi</td>
        <td style="">: <?=$rs_triase["SKOR_R"];?>
        </td>
    </tr>
    <tr>
    <td style="">Suhu</td>
        <td style="">: <?=$rs_triase["SUHU"];?>
        </td>
        <td style="">Suhu</td>
        <td style="">: <?=$rs_triase["SKOR_SUHU"];?>
        </td>
    </tr>
    <tr>
    <td style="">Saturasi O2</td>
        <td style="">: <?=$rs_triase["O2"];?>
        </td>
        <td style="">Saturasi O2</td>
        <td style="">: <?=$rs_triase["SKOR_O2"];?>
        </td>
    </tr>
    <tr>
    <td style="">Berat Badan</td>
        <td style="">: <?=$rs_triase["BB"];?> Kg
        </td>
    
    </tr>
    <tr>
    <td style=""><b>Kesimpulan</b></td>
        <td style="">: <?php if($rs_triase["TOTAL_SKOR"]>='5'){ echo " Priorotas I (>=5) "; }  
             else if($rs_triase["TOTAL_SKOR"]>'1' && $rs_triase["TOTAL_SKOR"]<'5'){ echo " Prioritas II (2-4)"; }  
             else  if($rs_triase["TOTAL_SKOR"]<='1'){ echo " Prioritas III (0-1)"; }  
             else  { echo "Death on Arrived"; }  ?>
        </td>
        <td style=""><b>Total Skor</b></td>
        <td style="">: <?=$rs_triase["TOTAL_SKOR"];?>
        </td>
    </tr>
    <tr><td><br><br></td></tr>
    <tr>
        <td style="">Catatan Khusus</td>
        <td style="">: <?=$rs_triase["CAT_KHUSUS"];?>
        </td>
    </tr>
    <tr>
        <td style="">Keputusan</td>
        <td style="">: <?=$rs_triase["JAM_KEP"];?>
        </td>
    </tr>

      </table>

     
        
    <table class="content">
        <col style="width: 50%;font-size: 12px;">
        <col style="width: 50%;font-size: 12px;">
        <tbody> 
    
            <tr>
                <br>
                 <br>
                <td></td>
                <td align='center'>Tanggal <?= $rs_triase["mdd"]; ?> </td>
            </tr>
            <tr>
            <td></td>
                <td align='center'>
                <qrcode value="<?= $rs_triase["NAMALENGKAP"]; ?> pada <?= $rs_triase["mdd"]; ?> " ec="H" style="width: 15mm; background-color: white; color: black;"></qrcode>
                    <br>
                </td>
            </tr>
            <tr>
                <td></td>
                <td align='center'>
                <?= $rs_triase["NAMALENGKAP"]; ?>
                </td>
            </tr>
        </tbody>
 </table>
    </div>
</page> 




<page backtop="27mm" backbottom="10mm" backleft="2mm" backright="2mm" style="font-size:10pt">
   <page_header>
        <table class="page_header">
            <col style="width: 10%;font-size: 12px;">
            <col style="width: 45%;font-size: 12px;">
            <col style="width: 45%;font-size: 12px;">
            <tr>
                <td>
                    <img src="<?php base_url() ?>resource/doc/images/icon/logo.png" width="50" height="50" />
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
            <td  style="font-size: 9px">
                Nama : <?php echo $rs_pasien["NAMA_PASIEN"]; ?><br>
                No MR : <?php echo $rs_pasien["NO_MR"]; ?><br>
                Tgl Lahir : <?php echo date("d-M-Y", strtotime($rs_pasien["TGL_LAHIR"])); ?>
            </td>
        </tr>
    </table>
    </page_header>
       <hr style="margin-top:0px">
    <page_footer> 
    <table style="width: 100%; border-top: solid 1px black;">
        <tr>
            <td style="text-align: left; width: 80%">&nbsp;</td>
            <td style="text-align: right; width: 20%">Halaman [[page_cu]]/[[page_nb]]</td>
        </tr>
    </table>
    </page_footer>
 
    
    <br>
    <table class="content" style="padding-top: 30px">
        <tbody>
            <col style="width: 100%;background-color: #000000;color: #ffffff;padding: 0px;font-size: 12px;">
            <tr>
                <td align="center">
                    <br><strong>ASESMEN RAWAT JALAN IGD</strong>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="content">
        <col style="width: 20%;font-size: 12px;">
        <col style="width: 30%;font-size: 12px;">
        <col style="width: 20%;font-size: 12px;">
        <col style="width: 30%;font-size: 12px;">
        <tbody>
            <tr>
                <td style="border-left:solid 1px #000000;">Tanggal Kunjungan</td>
                <td>
                    : <?php echo date("d-M-Y", strtotime($rs_pasien["TANGGAL"])); ?>
                </td>
                <td>Klinik Tujuan</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    : <?= $rs_pasien["SPESIALIS"]; ?>
                </td>
            </tr>
            <tr> 
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000; "><b>High Risk</b></td>
                <td style="border-bottom:solid 1px #000000;">
                    : <b><?php echo $rs_pasien["FS_HIGH_RISK"]; ?></b>
                </td>
                <td style="border-bottom:solid 1px #000000; "><b>Alergi</b></td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;">
                    : <b>
                        <?php echo $alergi["FS_ALERGI"]; ?>
                    </b>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <br>
    <table class="content" style="padding-top: 30px">
        <tbody>
            <col style="width: 100%;background-color: #000000;color: #ffffff;padding: 0px;font-size: 12px;">
            <tr>
                <td align="center">
                    <br><strong>ASESMEN KEPERAWATAN IGD</strong>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    
 
<div class="a" style="border: solid black 1px; font-size: 11px;">
    <table class="content">
    <tr class="headrow">
        <th colspan="4" style="text-align:center"></th>
    
    </tr>

    <tr>
        <td style="">Keluhan Utama</td>
        <td style="width: 50%;">: <?= $perawat_igd["KEL_UTAMA"]; ?>
        </td>
     
    </tr>

    <tr>
        <td style="">Keluhan Penyakit Sekarang</td>
        <td style="">: <?= $perawat_igd["KEL_SEKARANG"]; ?>
        </td>
    </tr>
    <tr>
        <td style="">Status Kehamilan</td>
        <td style="">: <?=$perawat_igd["HAMIL"];?>
        </td>
    </tr>
    <tr>
        <td style=""><b>BIO SOSIO</b></td>
        <td style="">
        </td>
    </tr>
    <tr>
    <td style="">Status Pernikahan</td>
    <td style="">: <?=$perawat_igd["MENIKAH"];?>
    </td>
    </tr>
    <tr>
    <td style="">Pekerjaan</td>
    <td style="">: <?=$perawat_igd["JOB"];?> 
    </td>
    </tr>
    
    <tr>
    <td style="">Suku</td>
    <td style="">: <?=$perawat_igd["SUKU"];?>
    </td>
    </tr>
    <tr>
    <td style="">Agama</td>
    <td style="">:       <?php
                    if ( $perawat_igd["AGAMA"] == "1") {
                        echo "Islam";
                    } elseif ( $perawat_igd["AGAMA"] == "2") {
                        echo "Kristen";
                    } elseif ( $perawat_igd["AGAMA"] == "3") {
                        echo "Katholik";
                    } elseif ( $perawat_igd["AGAMA"] == "4") {
                        echo "Hindu";
                    } elseif ( $perawat_igd["AGAMA"] == "5") {
                        echo "Buda";
                    } elseif ( $perawat_igd["AGAMA"] == "6") {
                        echo "Konghucu";
                    } else {
                        echo "-";
                    }
                    ?>
        </td>
        </tr>
        <br>
        <tr>
            <td style=""><b>OBJEKTIF</b></td>
            <td style="">
            </td>
        </tr>

        <tr>
    <td style="">Psikologis</td>
    <td style="">: <?=$perawat_igd["PSIKOLOGIS"];?>
    </td>
    </tr>

    <tr>
    <td style="">Mental</td>
    <td style="">: <?=$perawat_igd["MENTAL"];?>
    </td>
    </tr>
    <tr>
    <td style="">Kesadaran</td>
    <td style="">: <?=$perawat_igd["KESADARAN"];?>
    </td>
    </tr>
    <tr>
    <td style="">GCS</td>
    <td style="">: <?=$perawat_igd["GCS"];?>
    </td>
    </tr>
    <tr>
    <td style="">Keadaan Umum</td>
    <td style="">: <?=$perawat_igd["KEADAAN_UMUM"];?>
    </td>
    </tr>
    <br>
    <br>
    <br>
    <tr>
        <td><b>Vital sign</b></td>
    
    </tr>

    <tr>
        <td style="">Suhu</td>
        <td style="">: <?=$vs["FS_SUHU"];?>
        </td>
        <td style="">Nadi</td>
        <td style="">: <?=$vs["FS_SUHU"];?> x/Menit
        </td>
    
    </tr>
    <tr>
    <td style="">Respirasi</td>
        <td style="">: <?=$vs["FS_R"];?> x/menit
        </td>
        <td style="">Tekanan Darah</td>
        <td style="">: <?=$vs["FS_TD"];?> mmHg
        </td>
    </tr>
    <tr>
    <td style="">Tinggi Badan</td>
        <td style="">: <?=$vs["FS_TB"];?> cm
        </td>
        <td style="">Berat Badan</td>
        <td style="">: <?=$vs["FS_BB"];?> kg
        </td>
    </tr>
    <tr>
    <td style="">Lingkar Kepala</td>
        <td style="">: <?=$perawat_igd["LINGKAR_KEPALA"];?> x/menit
        </td>
        <td style="">Status Gizi</td>
        <td style="">: <?=$perawat_igd["STATUS_GIZI"];?>
        </td>
    </tr>
    <tr>
        <td><b>KEBUTUHAN FUNGSIONAL</b></td>
    
    </tr>
    
    <tr>
    <td style="">Alat Bantu</td>
    <td style="">: <?=$perawat_igd["ALAT_BANTU"];?>
    </td>
    </tr>
    <tr>
    <td style="">Cacat</td>
    <td style="">: <?=$perawat_igd["CACAT"];?>
    </td>
    </tr>
    <tr>
    <td style="">ADL</td>
    <td style="">: <?php
                    if ( $perawat_igd["ADL"] == "1") {
                        echo "Mandiri";
                    } elseif ( $perawat_igd["ADL"] == "2") {
                        echo "Dibantu";
                    } 
                    ?>
    </td>
    </tr>
    <tr>
    <td><b>ASASMEN NYERI</b></td>
    
    </tr>
    <tr>
    <td style="">Ada Nyeri ?</td>
    <td style="">: <?php
                    if ($nyeri["FS_NYERI"] == "0") {
                        echo "Tidak Ada Nyeri";
                    } elseif ($nyeri["FS_NYERI"] == "1") {
                        echo "Ada Nyeri";
                    } else {
                        echo "-";
                    }
                    ?>
    </td>
    <td style="">Provoke</td>
    <td style="">: <?php
                    if ($nyeri["FS_NYERIP"] == "0") {
                        echo "Tidak Ada";
                    } elseif ($nyeri["FS_NYERIP"] == "1") {
                        echo "Biologik";
                    } elseif ($nyeri["FS_NYERIP"] == "2") {
                        echo "Kimiawi";
                    } elseif ($nyeri["FS_NYERIP"] == "3") {
                        echo "Mekanik / Rudapaksa";
                    } else {
                        echo "-";
                    }
                    ?>
    </td>
    </tr>

    <tr>
    <td style="">Quality</td>
    <td style="">: <?php
                    if ($nyeri["FS_NYERIQ"] == "0") {
                        echo "Tidak Ada";
                    } elseif ($nyeri["FS_NYERIQ"] == "1") {
                        echo "Seperti Di Tusuk-Tusuk";
                    } elseif ($nyeri["FS_NYERIQ"] == "2") {
                        echo "Seperti Terbakar";
                    } elseif ($nyeri["FS_NYERIQ"] == "3") {
                        echo "Seperti Tertimpa Beb";
                    } elseif ($nyeri["FS_NYERIQ"] == "4") {
                        echo "Ngilu";
                    } else {
                        echo "-";
                    }
                    ?>
    </td>
    <td style="">Regio</td>
    <td style="">: <?= $nyeri["FS_NYERIR"]; ?>
    </td>
    </tr>

    <tr>
    <td style="">Severity</td>
    <td style="">: <?php
                    if ($nyeri["FS_NYERIS"] == "0") {
                        echo "0";
                    } elseif ($nyeri["FS_NYERIS"] == "1") {
                        echo "1";
                    } elseif ($nyeri["FS_NYERIS"] == "2") {
                        echo "2";
                    } elseif ($nyeri["FS_NYERIS"] == "3") {
                        echo "3";
                    } elseif ($nyeri["FS_NYERIS"] == "4") {
                        echo "4";
                    } elseif ($nyeri["FS_NYERIS"] == "5") {
                        echo "5";
                    } elseif ($nyeri["FS_NYERIS"] == "6") {
                        echo "6";
                    } elseif ($nyeri["FS_NYERIS"] == "7") {
                        echo "7";
                    } elseif ($nyeri["FS_NYERIS"] == "8") {
                        echo "8";
                    } elseif ($nyeri["FS_NYERIS"] == "9") {
                        echo "9";
                    } elseif ($nyeri["FS_NYERIS"] == "10") {
                        echo "10";
                    } else {
                        echo "-";
                    }
                    ?>
    </td>
    <td style="">Time</td>
    <td style="">: <?php
                    if ($nyeri["FS_NYERIT"] == "0") {
                        echo "Tidak Ada";
                    } elseif ($nyeri["FS_NYERIT"] == "1") {
                        echo "Kadang-kadang";
                    } elseif ($nyeri["FS_NYERIT"] == "2") {
                        echo "Sering";
                    } elseif ($nyeri["FS_NYERIT"] == "3") {
                        echo "Menetap";
                    } else {
                        echo "-";
                    }
                    ?>
    </td>
    </tr>
    <tr>
    <td><b>B1 (Breathing)</b></td>
    
    </tr>

    <tr>
    <td style="">- Irama Nafas</td>
    <td style="">: <?=$perawat_igd["IRAMA_NAFAS"];?>
    </td>
    <td style="">- Batuk</td>
    <td style="">: <?=$perawat_igd["BATUK"];?>
    </td>
    </tr>
 
    <tr>
    <td style="">- Pola Pernafasan</td>
    <td style="">: <?=$perawat_igd["POLA_NAFAS"];?>
    </td>
    <td style="">- Suara Nafas</td>
    <td style="">: <?=$perawat_igd["SUARA_NAFAS"];?>
    </td>
    </tr>
    <tr>
    <td style="">- Alat Bantu Nafas</td>
    <td style="">: <?=$perawat_igd["BANTU_NAFAS"];?>
    </td>
  
    </tr>

    <tr>
    <td><b>B2 (Blood)</b></td>
    
    </tr>

    <tr>
    <td style="">- Nyeri Dada</td>
    <td style="">: <?=$perawat_igd["NYERI_DADA"];?>
    </td>
    <td style="">- Akral</td>
    <td style="">: <?=$perawat_igd["AKRAL"];?>
    </td>
    </tr>
 
    <tr>
    <td style="">- Perdarahan</td>
    <td style="">: <?=$perawat_igd["PERDARAHAN"];?>
    </td>
    <td style="">- Cyanosis</td>
    <td style="">: <?=$perawat_igd["CYANOSIS"];?>
    </td>
    </tr>
    <tr>
    <td style="">- CRT</td>
    <td style="">: <?=$perawat_igd["CRT"];?>
    </td>
    <td style="">- Turgor</td>
    <td style="">: <?=$perawat_igd["TURGOR"];?>
    </td>
  
    </tr>
    <tr>
    <td><b>B3 (Brain)</b></td>
    
    </tr>

    <tr>
    <td style="">- Reflek Cahaya</td>
    <td style="">: <?=$perawat_igd["REFLEK_CAHAYA"];?>
    </td>
    <td style="">- Pupil</td>
    <td style="">: <?=$perawat_igd["PUPIL"];?>
    </td>
    </tr>
 
    <tr>
    <td style="">- Kelumpuhan</td>
    <td style="">: <?=$perawat_igd["LUMPUH"];?>
    </td>
    <td style="">- Pusing</td>
    <td style="">: <?=$perawat_igd["PUSING"];?>
    </td>
    </tr>
    </table>
    </div>
    </page> 


<page backtop="27mm" backbottom="10mm" backleft="2mm" backright="2mm" style="font-size:10pt">
   <page_header>
        <table class="page_header">
            <col style="width: 10%;font-size: 12px;">
            <col style="width: 45%;font-size: 12px;">
            <col style="width: 45%;font-size: 12px;">
            <tr>
                <td>
                    <img src="<?php base_url() ?>resource/doc/images/icon/logo.png" width="50" height="50" />
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
            <td  style="font-size: 9px">
                Nama : <?php echo $rs_pasien["NAMA_PASIEN"]; ?><br>
                No MR : <?php echo $rs_pasien["NO_MR"]; ?><br>
                Tgl Lahir : <?php echo date("d-M-Y", strtotime($rs_pasien["TGL_LAHIR"])); ?>
            </td>
        </tr>
    </table>
    </page_header>
       <hr style="margin-top:0px">
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
            <col style="width: 100%;background-color: #000000;color: #ffffff;padding: 0px;font-size: 12px;">
            <tr>
                <td align="center">
                    <br><strong>ASESMEN KEPERAWATAN IGD</strong>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    
 
    <div class="a" style="border: solid black 1px; font-size: 11px;">
    <table class="content">
    <tr class="headrow">
        <th colspan="4" style="text-align:center"></th>
    
    </tr>
    <tr>
    <td><b>B4 (BAK)</b></td>
    
    </tr>

    <tr>
    <td style="">- BAK</td>
    <td style="">: <?=$perawat_igd["BAK"];?>
    </td>
    <td style="">- Nyeri Tekan</td>
    <td style="">: <?=$perawat_igd["BAK_TEKAN"];?>
    </td>
    </tr>
 
    <tr>
    <td style="">- Urine</td>
    <td style="">: <?=$perawat_igd["URINE"];?>
    </td>

    </tr>

    <tr>
    <td><b>B5 (BOWEL)</b></td>
    
    </tr>

    <tr>
    <td style="">- BAB</td>
    <td style="">: <?=$perawat_igd["BAB"];?>
    </td>
    <td style="">- Abdomen</td>
    <td style="">: <?=$perawat_igd["ABDOMEN"];?>
    </td>
    </tr>
 
    <tr>
    <td style="">- Nyeri Tekan</td>
    <td style="">: <?=$perawat_igd["BAB_TEKAN"];?>
    </td>
    <td style="">- Jejas Abdomen</td>
    <td style="">: <?=$perawat_igd["JEJAS_ABDOMEN"];?>
    </td>

    </tr>

    <tr>
    <td><b>B6 (BONE)</b></td>
    
    </tr>

    <tr>
    <td style="">- Pergerakan Sendi</td>
    <td style="">: <?=$perawat_igd["SENDI"];?>
    </td>
    <td style="">- DIslokasi</td>
    <td style="">: <?=$perawat_igd["DISLOK"];?>
    </td>
    </tr>
 
    <tr>
    <td style="">- Fraktur</td>
    <td style="">: <?=$perawat_igd["FRAKTUR"];?>
    </td>
    <td style="">- Luka</td>
    <td style="">: <?=$perawat_igd["LUKA"];?>
    </td>

    </tr>

    <tr>
    <td><b>Resiko Dekubitus</b></td>
    
    </tr>
    <tr>
    <td style="">Pasien menggunakan kursi roda/mmembutuhkan bantuan</td>
    <td style="">: <?=$perawat_igd["KURSI_RODA"];?>
    </td>
    </tr>
    
    <tr>
    <td style="">Pasien inkontinensiauri / alvi</td>
    <td style="">: <?=$perawat_igd["ALVI"];?>
    </td>
    </tr>
    <tr>
    <td style="">riwayat dekubitus atau luka dekubitus</td>
    <td style="">: <?=$perawat_igd["RIWAYAT_DEKUBITUS"];?>
    </td>
    </tr>
    <tr>
    <td style="">Usia diatas 65 tahun</td>
    <td style="">: <?=$perawat_igd["USIA65"];?>
    </td>
    </tr>
    <tr>
    <td style="">Ekstremitas dan badan tidak sesuai dengan usia perkembangan</td>
    <td style="">: <?=$perawat_igd["ANAK_SESUAI_UMUR"];?>
    </td>
    </tr>
    <tr>

    <td><b>Status Fungsional</b></td>
    
    </tr>
    <tr>
    <td style="">Pengelihatan</td>
    <td style="">: <?php
                    if ($ases2["FS_PENGELIHATAN"] == "1") {
                        echo "Normal";
                    } elseif ($ases2["FS_PENGELIHATAN"] == "2") {
                        echo "Kabur";
                    } elseif ($ases2["FS_PENGELIHATAN"] == "3") {
                        echo "Kaca Mata";
                    } elseif ($ases2["FS_PENGELIHATAN"] == "4") {
                        echo "Lensa Kontak";
                    } else {
                        echo "-";
                    }
                    ?>
    </td>
    </tr>
    <tr>
    <td style="">Penciuman</td>
    <td style="">: <?php
                    if ($ases2["FS_PENCIUMAN"] == "1") {
                        echo "Normal";
                    } elseif ($ases2["FS_PENCIUMAN"] == "2") {
                        echo "Tidak Normal";
                    } else {
                        echo "-";
                    }
                    ?>
    </td>
    </tr>
    <tr>
    <td style="">Pendengaran</td>
    <td style="">: <?php
                    if ($ases2["FS_PENDENGARAN"] == "1") {
                        echo "Normal";
                    } elseif ($ases2["FS_PENDENGARAN"] == "2") {
                        echo "Tidak Normal (Kanan)";
                    } elseif ($ases2["FS_PENDENGARAN"] == "3") {
                        echo "Tidak Normal (Kiri)";
                    } elseif ($ases2["FS_PENDENGARAN"] == "4") {
                        echo "Tidak Normal (Kanan & Kiri)";
                    } elseif ($ases2["FS_PENDENGARAN"] == "5") {
                        echo "Alat Bantu Dengar (Kanan)";
                    } elseif ($ases2["FS_PENDENGARAN"] == "6") {
                        echo "Alat Bantu Dengar (Kiri)";
                    } elseif ($ases2["FS_PENDENGARAN"] == "7") {
                        echo "Alat Bantu Dengar (Kanan & Kiri)";
                    } else {
                        echo "-";
                    }
                    ?>
    </td>
    </tr>

    <tr>
    <td><b>Keperawatan</b></td>
    
    </tr>
    <tr>
    <td style="">Masalah Keperawatan</td>
    <td style="">: <?php foreach ($masalah_kep as $data_masalah){?>
                        <?php echo $data_masalah["FS_NM_DIAGNOSA"]; ?>,
                    <?php } ?>
    </td>
    </tr>
    <tr>
    <td style="">Rencana Keperawatan</td>
    <td style="">: <?php foreach ($rencana_kep as $data_rencana){?>
                        <?php echo $data_rencana["FS_NM_REN_KEP"]; ?>,
                    <?php } ?>
    </td>
    </tr>

    <tr>
    <td style="">Jam Selesai Periksa</td>
    <td style="">: <?=$perawat_igd["JAM_SELESAI"];?>
    </td>
    </tr>
    
    
      </table>

     
        
    <table class="content">
        <col style="width: 50%;font-size: 12px;">
        <col style="width: 50%;font-size: 12px;">
        <tbody> 
    
            <tr>
                <br>
                 <br>
                <td></td>
                <td align='center'>Tanggal <?= $perawat_igd["MDD"]; ?> </td>
            </tr>
            <tr>
            <td></td>
                <td align='center'>
                <qrcode value="<?= $perawat_igd["NAMALENGKAP"]; ?> pada <?= $perawat_igd["MDD"]; ?> " ec="H" style="width: 15mm; background-color: white; color: black;"></qrcode>
                    <br>
                </td>
            </tr>
            <tr>
                <td></td>
                <td align='center'>
                <?= $perawat_igd["NAMALENGKAP"]; ?>
                </td>
            </tr>
        </tbody>
 </table>
 </div>
    </page>
    <br>
    <page backtop="27mm" backbottom="10mm" backleft="2mm" backright="2mm" style="font-size:10pt">
   <page_header>
        <table class="page_header">
            <col style="width: 10%;font-size: 12px;">
            <col style="width: 45%;font-size: 12px;">
            <col style="width: 45%;font-size: 12px;">
            <tr>
                <td>
                    <img src="<?php base_url() ?>resource/doc/images/icon/logo.png" width="50" height="50" />
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
            <td  style="font-size: 9px">
                Nama : <?php echo $rs_pasien["NAMA_PASIEN"]; ?><br>
                No MR : <?php echo $rs_pasien["NO_MR"]; ?><br>
                Tgl Lahir : <?php echo date("d-M-Y", strtotime($rs_pasien["TGL_LAHIR"])); ?>
            </td>
        </tr>
    </table>
    </page_header>
       <hr style="margin-top:0px">
    <page_footer> 
    <table style="width: 100%; border-top: solid 1px black;">
        <tr>
            <td style="text-align: left; width: 80%">&nbsp;</td>
            <td style="text-align: right; width: 20%">Halaman [[page_cu]]/[[page_nb]]</td>
        </tr>
    </table>
    </page_footer>
 
    
    <br>
    <table class="content" style="padding-top: 30px">
        <tbody>
            <col style="width: 100%;background-color: #000000;color: #ffffff;padding: 0px;font-size: 12px;">
            <tr>
                <td align="center">
                    <br><strong>ASESMEN RAWAT JALAN IGD</strong>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="content">
        <col style="width: 20%;font-size: 12px;">
        <col style="width: 30%;font-size: 12px;">
        <col style="width: 20%;font-size: 12px;">
        <col style="width: 30%;font-size: 12px;">
        <tbody>
            <tr>
                <td style="border-left:solid 1px #000000;">Tanggal Kunjungan</td>
                <td>
                    : <?php echo date("d-M-Y", strtotime($rs_pasien["TANGGAL"])); ?>
                </td>
                <td>Klinik Tujuan</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    : <?= $rs_pasien["SPESIALIS"]; ?>
                </td>
            </tr>
            <tr> 
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000; "><b>High Risk</b></td>
                <td style="border-bottom:solid 1px #000000;">
                    : <b><?php echo $rs_pasien["FS_HIGH_RISK"]; ?></b>
                </td>
                <td style="border-bottom:solid 1px #000000; "><b>Alergi</b></td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;">
                    : <b>
                        <?php echo $alergi["FS_ALERGI"]; ?>
                    </b>
                </td>
            </tr>
        </tbody>
    </table>
    
    <table class="content" style="padding-top: 30px">
        <tbody>
            <col style="width: 100%;background-color: #000000;color: #ffffff;padding: 0px;font-size: 12px;">
            <tr>
                <td align="center">
                    <br><strong>ASESMEN KEBIDANAN IGD</strong>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    
 
<div class="a" style="border: solid black 1px; font-size: 11px;">
    <table class="content">
    <tr class="headrow">
        <th colspan="4" style="text-align:center"></th>
    
    </tr>

    <tr>
        <td style="">Cara Masuk</td>
        <td style="">: <?= strip_tags($bidan_igd["CARA_MASUK"]); ?>
        </td>
     
    </tr>

    <tr>
        <td style="">Rujukan Dari</td>
        <td style="">: <?php echo $bidan_igd["RUJUKAN"]; ?>
        </td>
    </tr>
    <tr>
        <td style="">Membawa obat sendiri</td>
        <td style="">: <?php echo $bidan_igd["BAWA_OBAT"]; ?>
        </td>
    </tr>
    <tr>
        <td style=""><b>Data Suami</b></td>
        <td style="">
        </td>

    </tr>
    <tr>
    <td style="">Nama</td>
        <td style="">: <?= $bidan_igd["NAMA_SUAMI"]; ?>
        </td>
    </tr>
    <tr>
        <td style="">Tanggal Lahir</td>
        <td style="">: <?= $bidan_igd["TGL_LAHIR_SUAMI"]; ?>
        </td>
    </tr>
    <tr>
        <td style="">Pekerjaan</td>
        <td style="">: <?php echo $bidan_igd["PEKERJAAN_SUAMI"]; ?>
        </td>
    </tr>
    <tr>
        <td style="">Agama</td>
        <td style="">: <?php echo $bidan_igd["AGAMA_SUAMI"]; ?>
        </td>
    </tr>
    <tr>
        <td style=""><b>Data Pasien</b></td>
        <td style="">
        </td>

    </tr>
    <tr>
    <td style="">Pekerjaan Pasien</td>
        <td style="">: <?= $bidan_igd["JOB_PASIEN"]; ?>
        </td>
    </tr>
    <tr>
        <td style="">Pendidikan Pasien</td>
        <td style="">: <?= $bidan_igd["PENDIDIKAN_PASIEN"]; ?>
        </td>
    </tr>
    <tr>
        <td style="">Agama</td>
        <td style="">: <?php
                    if ($bidan_igd["FS_AGAMA"] == "1") {
                        echo "Islam";
                    } elseif ($bidan_igd["FS_AGAMA"] == "2") {
                        echo "Kristen";
                    } elseif ($bidan_igd["FS_AGAMA"] == "3") {
                        echo "Katholik";
                    } elseif ($bidan_igd["FS_AGAMA"] == "4") {
                        echo "Hindu";
                    } elseif ($bidan_igd["FS_AGAMA"] == "5") {
                        echo "Buda";
                    } elseif ($bidan_igd["FS_AGAMA"] == "6") {
                        echo "Konghucu";
                       
                    } else {
                        echo "-";
                    }
                    ?>
        </td>
    </tr>
    <tr>
        <td style=""><b>Riwayat Haid</b></td>
  
    </tr>
    <tr>
        <td style="">Menarche</td>
        <td style="">: <?php echo $bidan_igd["FS_HAID_MEN"]; ?>
        </td>
        <td style="">Siklus haid</td>
        <td style="">: <?php echo $bidan_igd["FS_HAID_SIKLUS"]; ?>
        </td>
    </tr>
    <tr>
        <td style="">Lama Haid</td>
        <td style="">: <?php echo $bidan_igd["FS_HAID_LAMA"]; ?>
        </td>
        <td style="">Hpht</td>
        <td style="">: <?php echo $bidan_igd["FS_HAID_HPHT"]; ?>
        </td>
    </tr>
    <tr>
        <td style="">HPL</td>
        <td style="">: <?php echo $bidan_igd["FS_HAID_HPL"]; ?>
        </td>
        <td style="">Keluhan</td>
        <td style="">: <?php echo $bidan_igd["FS_HAID_KELUHAN"]; ?>
        </td>
    </tr>

    <tr>
        <td style="">Keluhan Utama</td>
        <td style="">: <?php echo $bidan_igd["FS_ANAMNESA"]; ?>
        </td>
    </tr>
    <tr>
        <td style="">Riwayat Penyakit Dahulu</td>
        <td style="">: <?php echo $bidan_igd["RIWAYAT_PENYAKIT_DAHULU"]; ?>
        </td>
    </tr>
    <tr>
        <td style=""><b>Riwayat Penyakit pada Kehamilan Sekarang</b></td>
  
    </tr>
    <tr>

                 <tr><td> Asma </td><td> : <?= $bidan_igd['FS_ASMA_MULAI'];?>, Dalam Terapi <?= $bidan_igd['FS_ASMA_TERAPI'];?></td></tr>
                 <tr><td> Jantung </td><td> : <?= $bidan_igd['FS_JANTUNG_MULAI'];?>,  Dalam Terapi <?= $bidan_igd['FS_JANTUNG_TERAPI'];?></td></tr>
                 <tr><td> Diabetes </td><td> : <?= $bidan_igd['FS_DIABETES_MULAI'];?>,  Dalam Terapi <?= $bidan_igd['FS_DIABETES_TERAPI'];?></td></tr>
                 <tr><td> Hipertensi </td><td> : <?= $bidan_igd['FS_HIPERTENSI_MULAI'];?>,  Dalam Terapi <?= $bidan_igd['FS_HIPERTENSI_TERAPI'];?></td></tr>
                 <tr><td> Sakit lainnya </td><td>  :<?= $bidan_igd['FS_SAKIT_LAIN'];?> </td></tr>
                
                 
    </tr>
    
    <tr>
    <td style="">Riwayat Gynekologi</td>
    <td style="">: <?php echo $bidan_igd["FS_RIWAYAT_GYNEKOLOGI"]; ?>
    </td>
    </tr>
    <tr>
    <td style="">Riwayat KB</td>
    <td style="">: <?php echo $bidan_igd["FS_RIWAYAT_KB"]; ?>
    </td>
    </tr>
    <tr>
    <td style="">Riwayat Kompilasi KB</td>
    <td style="">: <?php echo $bidan_igd["FS_RIWAYAT_KOMPLIKASI_KB"]; ?>
    </td>
    </tr>
    
    <tr>
    <td style=""><b>Riwayat Penyakit pada Kehamilan Sekarang</b></td>
    
    </tr>
    <tr>
    
    <tr><td> Pola Makan </td><td>:<?= $bidan_igd['POLA_MAKAN'];?> kali/hari,Terakhir Jam <?= $bidan_igd['JAM_TERAKHIR_MAKAN'];?></td></tr>
    <tr><td> Pola Minum </td><td>:<?= $bidan_igd['POLA_MINUM'];?>cc/hari, Terakhir Jam <?= $bidan_igd['JAM_TERAKHIR_MINUM'];?></td></tr>
    <tr><td> Pola BAK </td><td>:<?= $bidan_igd['POLA_BAK'];?>kali/hari, Terakhir Jam <?= $bidan_igd['JAM_TERAKHIR_BAK'];?></td></tr>
    <tr><td> Pola BAB </td><td>:<?= $bidan_igd['POLA_BAB'];?>kali/hari, Terakhir Jam <?= $bidan_igd['JAM_TERAKHIR_BAB'];?></td></tr>
    <tr><td> Pola Istirahat </td><td>:<?= $bidan_igd['POLA_TIDUR'];?>, Terakhir Jam <?= $bidan_igd['JAM_TERAKHIR_TIDUR'];?></td></tr>
    
    
    </tr>
    <tr>
    <td style=""><b>DATA PSIKOLOGI & SOSIAL</b></td>
    
    </tr>
    <tr>
    <td style="">Rumah Tinggal</td>
    <td style="">: <?php echo $bidan_igd["RUMAH_MILIK"]; ?>
    </td>
    </tr>
    <tr>
    <td style="">Tinggal Bersama</td>
    <td style="">: <?php echo $bidan_igd["TINGGAL_BERSAMA"]; ?>
    </td>
    </tr>
    <tr>
    <td style="">PJ Darurat</td>
    <td style="">: <?php echo $bidan_igd["PJ_DARURAT"]; ?> Hubungan : <?= $bidan_igd["HUBUNGAN_PJ"]; ?>
    </td>
    </tr>
    <tr>
    <td style="">Aktivitas</td>
    <td style="">: <?php echo $bidan_igd["AKTIFITAS"]; ?>
    </td>
    </tr>
    <tr>
    <td style="">Sosial Support</td>
    <td style="">: <?php echo $bidan_igd["SOSIAL_SUPPORT"]; ?>
    </td>
    </tr>
    <tr></tr>
    
 </table>
    </div>
    </page> 

    <page backtop="27mm" backbottom="10mm" backleft="2mm" backright="2mm" style="font-size:10pt">
   <page_header>
        <table class="page_header">
            <col style="width: 10%;font-size: 12px;">
            <col style="width: 45%;font-size: 12px;">
            <col style="width: 45%;font-size: 12px;">
            <tr>
                <td>
                    <img src="<?php base_url() ?>resource/doc/images/icon/logo.png" width="50" height="50" />
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
            <td  style="font-size: 9px">
                Nama : <?php echo $rs_pasien["NAMA_PASIEN"]; ?><br>
                No MR : <?php echo $rs_pasien["NO_MR"]; ?><br>
                Tgl Lahir : <?php echo date("d-M-Y", strtotime($rs_pasien["TGL_LAHIR"])); ?>
            </td>
        </tr>
    </table>
    </page_header>
       <hr style="margin-top:0px">
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
    
 
<div class="a" style="border: solid black 1px; font-size: 11px;">
    <table class="content">
    <tr class="headrow">
        <th colspan="4" style="text-align:center"></th>
    
    </tr>

    <tr>
        <td style="">Penerimaan persalinan</td>
        <td style="">: <?= strip_tags($bidan_igd["PERSALINAN"]); ?>
        </td>
     
    </tr>
    
    <tr>
    <td style=""><b>Vital Sign</b></td>
    
    </tr>
    <tr>
    <td style="">Suhu</td>
    <td style="">: <?= strip_tags($bidan_igd["S"]); ?>
    </td>
    
    </tr>
    <tr>
    <td style="">Nadi</td>
    <td style="">: <?= $bidan_igd["N"] ?> x/menit
    </td>
    
    </tr>
    <tr>
    <td style="">R</td>
    <td style="">: <?= $bidan_igd["R"] ?> x/menit
    </td>
    
    </tr>
    <tr>
    <td style="">Tekanan Darah</td>
    <td style="">: <?= $bidan_igd["TD"] ?> mmHg
    </td>
    
    </tr>
    <tr>
        <td style="">Tinggi Badan</td>
        <td style="">: <?= $bidan_igd["TB"] ?> cm
        </td>
        
        </tr>
        <tr>
        <td style="">Berat Badan</td>
        <td style="">: <?= $bidan_igd["BB"] ?> Kg
        </td>
        
        </tr>
        <tr>
        <td style="">Berat Badan Sebelum Hamil</td>
        <td style="">: <?= $bidan_igd["BBO"] ?> Kg
        </td>
        
        </tr>
        <tr>
        <td style="">Alat Bantu</td>
        <td style="">: <?= $bidan_igd["ALAT_BANTU"] ?> Kg
        </td>
        
        </tr>
        <tr>
        <td style=""><b>Pemeriksaan Umum</b></td>
        
        </tr>
        <tr>
        <td style="">Keadaan Umum</td>
        <td style="">: <?= $bidan_igd["KEADAAN_UMUM"] ?>
        </td>
        
        </tr>
        <tr>
        <td style="">Kesadaran</td>
        <td style="">: <?= $bidan_igd["SADAR"] ?>
        </td>  
        </tr>
        <tr>
        <td style=""><b>Pemeriksaan Fisik</b></td>
        </tr>
        <tr>
        
        <tr>
        <td> Mata </td><td>:<?= $bidan_igd['MATA'];?></td>
        <td> Skelera </td><td>:<?= $bidan_igd['SCLERA'];?></td>
        </tr>   
        <tr>
        <td> Konjungtiva </td><td>:<?= $bidan_igd['KONJUNGTIVA'];?></td>
        <td> Kepala </td><td>:<?= $bidan_igd['KEPALA'];?></td>
        </tr>
        <tr>
        <td> Telinga </td><td>:<?= $bidan_igd['TELINGA'];?></td>
        <td> Hidung </td><td>:<?= $bidan_igd['HIDUNG'];?></td>
        </tr>
        <tr>
        <td> Tenggorokan </td><td>:<?= $bidan_igd['TENGGOROKAN'];?></td>
        <td> Leher </td><td>:<?= $bidan_igd['LEHER'];?></td>
        </tr>
        <tr>
        <td> Dada </td><td>:<?= $bidan_igd['DADA'];?></td>
        <td> Jantung </td><td>:<?= $bidan_igd['JANTUNG'];?></td>
        </tr>
        <tr>
        <td> Paru Paru </td><td>:<?= $bidan_igd['PARU_PARU'];?></td>
        <td> Abdomen </td><td>:<?= $bidan_igd['ABDOMEN'];?></td>
        </tr> 
        <tr>
        <td> Anggota Gerak Atas </td><td>:<?= $bidan_igd['BADAN_GERAK_ATAS'];?></td>
        <td> Anggota Gerak Bawah</td><td>:<?= $bidan_igd['BADAN_GERAK_BAWAH'];?></td>
        </tr> 
        </tr>
        
        <tr>
        <td style=""><b>Pemeriksaan Khusus</b></td>
        </tr>

        <tr><td> Dada </td><td>:<?= $bidan_igd['CEK_DADA'];?></td>
        <td> Inspeksi Abdomen </td><td>:<?= $bidan_igd['INSPEKSI_ABDOMEN'];?></td>
        </tr>
        <tr>
        <td> Leopod I </td><td>:<?= $bidan_igd['LEOPOD_1'];?></td>
        <td> Leopod II </td><td>:<?= $bidan_igd['LEOPOD_2'];?></td>
        </tr>
        <tr>
        <td> Leopod III </td><td>:<?= $bidan_igd['LEOPOD_3'];?></td>
        <td> Leopod IV </td><td>:<?= $bidan_igd['LEOPOD_4'];?></td>
        </tr>
        <tr>
        <td> Auskultasi </td><td>:<?= $bidan_igd['AUSKULTASI'];?></td>
        <td> Kontraksi </td><td>:<?= $bidan_igd['KONTRAKSI'];?></td>
        </tr>
        <tr>
        <td> Inspeksi Ano Genital </td><td>:<?= $bidan_igd['INSPEKSI_ANO_GENITAS'];?></td>
        <td> Vagina Toucher </td><td>:<?= $bidan_igd['VAGINA_TOUCHER'];?></td>
        </tr>

        <tr>
        <td style=""><b>Asasmen Nyeri</b></td>
        </tr>
        
        <tr>
        <td style="">Ada Nyeri</td>
        <td style="">: <?php
                if ($nyeri["FS_NYERI"] == "0") {
                    echo "Tidak Ada Nyeri";
                } elseif ($nyeri["FS_NYERI"] == "1") {
                    echo "Ada Nyeri";
                } else {
                    echo "-";
                }
                ?>
        </td>  
        </tr>
        <tr>
        <td style="">Provokatif</td>
        <td style="">: <?php
                if ($nyeri["FS_NYERIP"] == "0") {
                    echo "Tidak Ada";
                } elseif ($nyeri["FS_NYERIP"] == "1") {
                    echo "Biologik";
                } elseif ($nyeri["FS_NYERIP"] == "2") {
                    echo "Kimiawi";
                } elseif ($nyeri["FS_NYERIP"] == "3") {
                    echo "Mekanik / Rudapaksa";
                } else {
                    echo "-";
                }
                ?>
        </td>  
        </tr>
        
        <tr>
        <td style="">Quality</td>
        <td style="">: <?php
                if ($nyeri["FS_NYERIQ"] == "0") {
                    echo "Tidak Ada";
                } elseif ($nyeri["FS_NYERIQ"] == "1") {
                    echo "Seperti Di Tusuk-Tusuk";
                } elseif ($nyeri["FS_NYERIQ"] == "2") {
                    echo "Seperti Terbakar";
                } elseif ($nyeri["FS_NYERIQ"] == "3") {
                    echo "Seperti Tertimpa Beb";
                } elseif ($nyeri["FS_NYERIQ"] == "4") {
                    echo "Ngilu";
                } else {
                    echo "-";
                }
                ?>
        </td>  
        </tr>
        <tr>
        <td style="">Regio</td>
        <td style="">: <?= $nyeri["FS_NYERIR"]; ?>
        </td>  
        </tr>
        <tr>
        <td style="">Severity</td>
        <td style="">: <?php
                if ($nyeri["FS_NYERIS"] == "0") {
                    echo "0";
                } elseif ($nyeri["FS_NYERIS"] == "1") {
                    echo "1";
                } elseif ($nyeri["FS_NYERIS"] == "2") {
                    echo "2";
                } elseif ($nyeri["FS_NYERIS"] == "3") {
                    echo "3";
                } elseif ($nyeri["FS_NYERIS"] == "4") {
                    echo "4";
                } elseif ($nyeri["FS_NYERIS"] == "5") {
                    echo "5";
                } elseif ($nyeri["FS_NYERIS"] == "6") {
                    echo "6";
                } elseif ($nyeri["FS_NYERIS"] == "7") {
                    echo "7";
                } elseif ($nyeri["FS_NYERIS"] == "8") {
                    echo "8";
                } elseif ($nyeri["FS_NYERIS"] == "9") {
                    echo "9";
                } elseif ($nyeri["FS_NYERIS"] == "10") {
                    echo "10";
                } else {
                    echo "-";
                }
                ?>
        </td>  
        </tr>
        <tr>
        <td style="">Time</td>
        <td style="">: <?php
                if ($nyeri["FS_NYERIT"] == "0") {
                    echo "Tidak Ada";
                } elseif ($nyeri["FS_NYERIT"] == "1") {
                    echo "Kadang-kadang";
                } elseif ($nyeri["FS_NYERIT"] == "2") {
                    echo "Sering";
                } elseif ($nyeri["FS_NYERIT"] == "3") {
                    echo "Menetap";
                } else {
                    echo "-";
                }
                ?>
        </td>  
        </tr>
        <tr>
        <td style=""><b>Scrining Nutrisi</b></td>
        </tr>
        <tr>
        <td style="">Penurunan berat badan yang tidak diinginkan <br> selama 6 bulan terakhir</td>
        <td style="">: <?php
                    if ($nutrisi['FS_NUTRISI1'] == '0') {
                        echo "Tidak";
                    } elseif ($nutrisi['FS_NUTRISI1'] == '1') {
                        echo "Tidak Yakin";
                    } elseif ($nutrisi['FS_NUTRISI1'] == '2') {
                        echo "Ya (1-5 Kg)";
                    } elseif ($nutrisi['FS_NUTRISI1'] == '3') {
                        echo "Ya (6-10 Kg)";
                    } elseif ($nutrisi['FS_NUTRISI1'] == '4') {
                        echo "Ya (11-15 Kg)";
                    } elseif ($nutrisi['FS_NUTRISI1'] == '5') {
                        echo "Ya (>15 Kg)";
                    } else {
                        echo "-";
                    }
                    ?>
        </td>  
        </tr>
        <tr>
        <td style="">Asupan makanan menurun dikarenakan <br> adanya penurunan nafsu makan</td>
        <td style="">:  <?php
                    if ($nutrisi['FS_NUTRISI2'] == '0') {
                        echo "Tidak";
                    } elseif ($nutrisi['FS_NUTRISI2'] == '1') {
                        echo "Ya";
                    } else {
                        echo "-";
                    }
                    ?>
        </td>  
        </tr>
        <tr>
        <td style=""><b>Status Fungsional</b></td>
        </tr>
        <tr>
        <td style="">Penglihatan</td>
        <td style="">: <?php
                if ($ases2["FS_PENGELIHATAN"] == "1") {
                    echo "Normal";
                } elseif ($ases2["FS_PENGELIHATAN"] == "2") {
                    echo "Kabur";
                } elseif ($ases2["FS_PENGELIHATAN"] == "3") {
                    echo "Kaca Mata";
                } elseif ($ases2["FS_PENGELIHATAN"] == "4") {
                    echo "Lensa Kontak";
                } else {
                    echo "-";
                }
                ?>
        </td>  
        </tr>
        <tr>
        <td style="">Penciuman</td>
        <td style="">: <?php
                if ($ases2["FS_PENCIUMAN"] == "1") {
                    echo "Normal";
                } elseif ($ases2["FS_PENCIUMAN"] == "2") {
                    echo "Tidak Normal";
                } else {
                    echo "-";
                }
                ?>
        </td>  
        </tr>
        <tr>
        <td style="">Pendengaran</td>
        <td style="">: <?php
                if ($ases2["FS_PENDENGARAN"] == "1") {
                    echo "Normal";
                } elseif ($ases2["FS_PENDENGARAN"] == "2") {
                    echo "Tidak Normal (Kanan)";
                } elseif ($ases2["FS_PENDENGARAN"] == "3") {
                    echo "Tidak Normal (Kiri)";
                } elseif ($ases2["FS_PENDENGARAN"] == "4") {
                    echo "Tidak Normal (Kanan & Kiri)";
                } elseif ($ases2["FS_PENDENGARAN"] == "5") {
                    echo "Alat Bantu Dengar (Kanan)";
                } elseif ($ases2["FS_PENDENGARAN"] == "6") {
                    echo "Alat Bantu Dengar (Kiri)";
                } elseif ($ases2["FS_PENDENGARAN"] == "7") {
                    echo "Alat Bantu Dengar (Kanan & Kiri)";
                } else {
                    echo "-";
                }
                ?>
        </td>  
        </tr>
        <tr>
        <td style="">Butuh Penerjamah?</td>
        <td style="">: <?= $bidan_igd["PENERJEMAH"] ?>
        </td>  
        </tr>

        <tr></tr>
        </table>
        </div>
        </page>
        <br>

        <page backtop="27mm" backbottom="10mm" backleft="2mm" backright="2mm" style="font-size:10pt">
   <page_header>
        <table class="page_header">
            <col style="width: 10%;font-size: 12px;">
            <col style="width: 45%;font-size: 12px;">
            <col style="width: 45%;font-size: 12px;">
            <tr>
                <td>
                    <img src="<?php base_url() ?>resource/doc/images/icon/logo.png" width="50" height="50" />
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
            <td  style="font-size: 9px">
                Nama : <?php echo $rs_pasien["NAMA_PASIEN"]; ?><br>
                No MR : <?php echo $rs_pasien["NO_MR"]; ?><br>
                Tgl Lahir : <?php echo date("d-M-Y", strtotime($rs_pasien["TGL_LAHIR"])); ?>
            </td>
        </tr>
    </table>
    </page_header>
       <hr style="margin-top:0px">
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
    
 
<div class="a" style="border: solid black 1px; font-size: 11px;">
    <table class="content">
    <tr class="headrow">
        <th colspan="4" style="text-align:center"></th>
    
    </tr>

    <tr>
        <td style=""><b>Kebidanan</b></td>
        </tr>

        <tr>
        <td style="">Masalah Kebidanan</td>
        <td style="">: <?= $bidan_igd['MASALAH_KEBIDANAN'];?>
        </td>  
        </tr>
        <tr>
        <td style="">Diagnisa Kebidanan</td>
        <td style="">: <?= $bidan_igd['DIAGNOSA'];?>
        </td>  
        </tr>
        <tr>
        <td style="">Rencana Tindakan</td>
        <td style="">: <?= $bidan_igd['RENCANA_TINDAKAN'];?>
        </td>  
        </tr>
        


        <tr></tr>
        </table>
        <table class="content">
        <col style="width: 50%;font-size: 12px;">
        <col style="width: 50%;font-size: 12px;">
        <tbody> 
    
            <tr>
                <br>
                 <br>
                <td></td>
                <td align='center'>Tanggal <?= $bidan_igd["mdd"]; ?> </td>
            </tr>
            <tr>
            <td></td>
                <td align='center'>
                <qrcode value="<?= $bidan_igd["NAMALENGKAP"]; ?> pada <?= $bidan_igd["mdd"]; ?> " ec="H" style="width: 15mm; background-color: white; color: black;"></qrcode>
                    <br>
                </td>
            </tr>
            <tr>
                <td></td>
                <td align='center'>
                <?= $bidan_igd["NAMALENGKAP"]; ?>
                </td>
            </tr>
        </tbody>
 </table>
        </div>
        </page> 
        <br>

        <page backtop="27mm" backbottom="10mm" backleft="2mm" backright="2mm" style="font-size:10pt">
   <page_header>
        <table class="page_header">
            <col style="width: 10%;font-size: 12px;">
            <col style="width: 45%;font-size: 12px;">
            <col style="width: 45%;font-size: 12px;">
            <tr>
                <td>
                    <img src="<?php base_url() ?>resource/doc/images/icon/logo.png" width="50" height="50" />
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
            <td  style="font-size: 9px">
                Nama : <?php echo $rs_pasien["NAMA_PASIEN"]; ?><br>
                No MR : <?php echo $rs_pasien["NO_MR"]; ?><br>
                Tgl Lahir : <?php echo date("d-M-Y", strtotime($rs_pasien["TGL_LAHIR"])); ?>
            </td>
        </tr>
    </table>
    </page_header>
       <hr style="margin-top:0px">
    <page_footer> 
    <table style="width: 100%; border-top: solid 1px black;">
        <tr>
            <td style="text-align: left; width: 80%">&nbsp;</td>
            <td style="text-align: right; width: 20%">Halaman [[page_cu]]/[[page_nb]]</td>
        </tr>
    </table>
    </page_footer>
 

    <table class="content" style="padding-top: 30px">
        <tbody>
            <col style="width: 100%;background-color: #000000;color: #ffffff;padding: 0px;font-size: 12px;">
            <tr>
                <td align="center">
                    <br><strong>ASESMEN RAWAT JALAN IGD</strong>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="content">
        <col style="width: 20%;font-size: 12px;">
        <col style="width: 30%;font-size: 12px;">
        <col style="width: 20%;font-size: 12px;">
        <col style="width: 30%;font-size: 12px;">
        <tbody>
            <tr>
                <td style="border-left:solid 1px #000000;">Tanggal Kunjungan</td>
                <td>
                    : <?php echo date("d-M-Y", strtotime($rs_pasien["TANGGAL"])); ?>
                </td>
                <td>Klinik Tujuan</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    : <?= $rs_pasien["SPESIALIS"]; ?>
                </td>
            </tr>
            <tr> 
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000; "><b>High Risk</b></td>
                <td style="border-bottom:solid 1px #000000;">
                    : <b><?php echo $rs_pasien["FS_HIGH_RISK"]; ?></b>
                </td>
                <td style="border-bottom:solid 1px #000000; "><b>Alergi</b></td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;">
                    : <b>
                        <?php echo $alergi["FS_ALERGI"]; ?>
                    </b>
                </td>
            </tr>
        </tbody>
    </table>
    
    <table class="content" style="padding-top: 30px">
        <tbody>
            <col style="width: 100%;background-color: #000000;color: #ffffff;padding: 0px;font-size: 12px;">
            <tr>
                <td align="center">
                    <br><strong>ASESMEN NEONATUS IGD</strong>
                </td>
            </tr>
        </tbody>
    </table>
    <br>

    <br>
    
 
<div class="a" style="border: solid black 1px; font-size: 11px;">
    <table class="content">
    <tr class="headrow">
        <th colspan="4" style="text-align:center"></th>
    
    </tr>

    <tr>
        <td style="">Tanggal dan Jam Masuk ruangan</td>
        <td style="">: <?= $neonatus["TANGGAL_MASUK"] ?>, <?= $neonatus["JAM_MASUK"] ?>
        </td>  
    </tr>
    <tr>
        <td style="">Kriteria Saat Masuk</td>
        <td style="">: <?= $neonatus["KRITERIA_MASUK"] ?>
        </td>  
    </tr>
    <tr>
        <td style="">Diagnosa Medis</td>
        <td style="">: <?= $neonatus["DIAGNOSA_MEDIS"] ?>
        </td>  
    </tr>
    <tr>
        <td style="">DPJP</td>
        <td style="">: <?= $neonatus["DPJP"] ?>
        </td>  
    </tr>
    <tr>
        <td style="">Jenis Kelamin</td>
        <td style="">: <?= $neonatus["JENIS_KELAMIN"] ?>
        </td>  
        <td style="">Tanggal Lahir</td>
        <td style="">: <?= $neonatus["TGL_LAHIR"] ?>
        </td> 
    </tr>
    <tr>
        <td style="">Diagnosa Masuk</td>
        <td style="">: <?= $neonatus["DIAGNOSA_MASUK"] ?>
        </td>  
    </tr>
    <tr>
        <td style="">Nama Ayah</td>
        <td style="">: <?= $neonatus["NAMA_AYAH"] ?>
        </td>  
    </tr>
    <tr>
        <td style="">Nama Ibu</td>
        <td style="">: <?= $neonatus["NAMA_IBU"] ?>
        </td>  
    </tr>
    <tr>
        <td style="">Pekerjaan Orang Tua</td>
        <td style="">: <?= $neonatus["PEKERJAAN_ORANG_TUA"] ?>
        </td>  
    </tr>
    <tr>
        <td style="">Jaminan</td>
        <td style="">: <?= $neonatus["JAMINAN"] ?>
        </td>  
    </tr>
    <tr>
        <td style=""><b>Status Bio-Sosio-kultur</b></td>
        </tr>
    <tr>
        <td style="">Agama</td>
        <td style="">: <?= $neonatus["AGAMA"] ?>
        </td>  
        <td style="">Suku</td>
        <td style="">: <?= $neonatus["SUKU"] ?>
        </td>  
    </tr>
    <tr>
        <td style=""><b>Riwayat Kesehatan</b></td>
    </tr>

    <tr>
        <td style="">Riwayat Penyakit Dahulu</td>
        <td style="">: <?= $neonatus["RIWAYAT_PENYAKIT_DAHULU"] ?>
        </td>  
    </tr>
    <tr>
        <td style="">Riwayat Imunisasi</td>
        <td style="">: <?= $neonatus["RIWAYAT_IMUNISASI"] ?>
        </td>  
    </tr>
    
    <tr>
    <td style=""><b>Riwayat Kehamilan</b></td>
    </tr>
    
    <tr>
        <td style="">Usia Kehamilan</td>
        <td style="">: <?= $neonatus["USIA_KEHAMILAN"] ?> bulan
        </td>  
    </tr>
    <tr>
        <td style="">Anak Ke </td>
        <td style="">: <?= $neonatus["ANAK_KE"] ?>
        </td>  
        <td style="">Jumlah Anak </td>
        <td style="">: <?= $neonatus["JUMLAH_ANAK"] ?>
        </td>  
    </tr>

    <tr>
    <td style=""><b>Riwayat Persalinan</b></td>
    </tr>
    <tr>
        <td style="">Prenatal </td>
        <td style="">: <?= $neonatus["PRENATAL"] ?>
        </td>   
        <td style="">Natal </td>
        <td style="">: <?= $neonatus["NATAL"] ?>
        </td>  
    </tr>

    <tr>
        <td style="">Intranatal </td>
        <td style="">: <?= $neonatus["INTRANATAL"] ?>
        </td>   
        <td style="">Posnatal </td>
        <td style="">: <?= $neonatus["POSNATAL"] ?>
        </td>  
    </tr>
    <tr>
        <td style="">Warna Ketuban </td>
        <td style="">: <?= $neonatus["WARNA_KETUBAN"] ?>
        </td>   
    
    </tr>
    <tr>
        <td style="">Pasien Ditangani Oleh </td>
        <td style="">: <?= $neonatus["DITANGANI_OLEH"] ?>
        </td>   
    
    </tr>
    <tr>
        <td style="">Tindakan Yang Dilakukan sebelum <br> dirawat inap </td>
        <td style="">: <?= $neonatus["TINDAKAN_SEBELUM_DIRAWAT"] ?>
        </td>   
    
    </tr>
    <tr>
    <td style=""><b>Riwayat Alergi</b></td>
    </tr>
    <tr>
        <td style="">Riwayat AleRgi</td>
        <td style="">: <?= $neonatus["RIWAYAT_ALERGI"] ?>
        </td>   
    
    </tr>
    <tr>
        <td style="">Kesadaran</td>
        <td style="">: <?= $neonatus["KESADARAN"] ?>
        </td>   
    
    </tr>

    <tr>
    <td style=""><b>Vital Sign</b></td>
    </tr>

    <tr>
        <td style="">Suhu</td>
        <td style="">: <?= $neonatus["S"] ?> C
        </td>   
        <td style="">Nadi</td>
        <td style="">: <?= $neonatus["N"] ?> x/menit
        </td>   
    
    </tr>
    
    <tr>
        <td style="">R</td>
        <td style="">: <?= $neonatus["R"] ?> x/menit
        </td>   
        <td style="">Saturasi Oksigen</td>
        <td style="">: <?= $neonatus["SATURASI_OKSIGEN"] ?>
        </td>   
    
    </tr>
    <tr>
        <td style="">Panjang Badan</td>
        <td style="">: <?= $neonatus["PANJANG_BADAN"] ?> cm
        </td>   
        <td style="">Berat Badan Masuk</td>
        <td style="">: <?= $neonatus["BERAT_BADAN_MASUK"] ?> kg
        </td>   
    
    </tr>
    <tr>
        <td style="">A / S</td>
        <td style="">: <?= $neonatus["APGAR_SCORE"] ?>
        </td>   
        <td style="">Berat Badan Lahir</td>
        <td style="">: <?= $neonatus["BERAT_BADAN_LAHIR"] ?> kg
        </td>   
    
    </tr>
    <tr>
        <td style="">Lingkar Kepala</td>
        <td style="">: <?= $neonatus["LINGKAR_KEPALA"] ?>
        </td>   
        <td style="">Lingkar Lengan</td>
        <td style="">: <?= $neonatus["LINGKAR_LENGAN"] ?> kg
        </td>   
    
    </tr>
    <tr>
        <td style="">Lingkar Dada</td>
        <td style="">: <?= $neonatus["LINGKAR_DADA"] ?>
        </td>      
    
    </tr>

        <tr></tr>
        </table>
        </div>
        </page>

        <page backtop="27mm" backbottom="10mm" backleft="2mm" backright="2mm" style="font-size:10pt">
   <page_header>
        <table class="page_header">
            <col style="width: 10%;font-size: 12px;">
            <col style="width: 45%;font-size: 12px;">
            <col style="width: 45%;font-size: 12px;">
            <tr>
                <td>
                    <img src="<?php base_url() ?>resource/doc/images/icon/logo.png" width="50" height="50" />
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
            <td  style="font-size: 9px">
                Nama : <?php echo $rs_pasien["NAMA_PASIEN"]; ?><br>
                No MR : <?php echo $rs_pasien["NO_MR"]; ?><br>
                Tgl Lahir : <?php echo date("d-M-Y", strtotime($rs_pasien["TGL_LAHIR"])); ?>
            </td>
        </tr>
    </table>
    </page_header>
       <hr style="margin-top:0px">
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
    
 
<div class="a" style="border: solid black 1px; font-size: 11px;">
    <table class="content">
    <tr class="headrow">
        <th colspan="4" style="text-align:center"></th>
    
    </tr>

    
    <tr>
    <td style=""><b>Pemeriksaan Kepala dan Leher</b></td>
    </tr>

    <tr>
        <td style="">Kepala</td>
        <td style="">: <?= $neonatus["KEPALA"] ?>
        </td>  
        <td style="">Leher</td>
        <td style="">: <?= $neonatus["LEHER"] ?>
        </td>  
    </tr>
    <tr>
        <td style="">Mata</td>
        <td style="">: <?= $neonatus["MATA"] ?>
        </td>  
        <td style="">Pupil</td>
        <td style="">: <?= $neonatus["PUPIL"] ?>
        </td>  
    </tr>
    
    <tr>
        <td style="">Palpebra</td>
        <td style="">: <?= $neonatus["PALPEBRA"] ?>
        </td>  
        <td style="">Hidung</td>
        <td style="">: <?= $neonatus["HIDUNG"] ?>
        </td>  
    </tr>
    <tr>
        <td style="">Mulut</td>
        <td style="">: <?= $neonatus["MULUT"] ?>
        </td>  
        <td style="">Telinga</td>
        <td style="">: <?= $neonatus["TELINGA"] ?>
        </td>  
    </tr>

    <tr>
    <td style=""><b>Pemeriksaan Jantung dan Paru</b></td>
    </tr>
    <tr>
    <td style="">Dada</td>
        <td style="">: <?= $neonatus["DADA"] ?>
        </td>  
        
        </tr>
    <tr>
    <td style="">Irama Nafas</td>
    <td style="">: <?= $neonatus["IRAMA_NAFAS"] ?>
    </td> 
    </tr>
    <tr>
    <td style="">Bunyi Nafas</td>
    <td style="">: <?= $neonatus["BUNYI_NAFAS"] ?>
    </td> 
    </tr>
    <tr>
    <td style=""><b>Pemeriksaan Gastroinestinal</b></td>
    </tr>

    <tr>
    <td style="">Abdomen</td>
    <td style="">: <?= $neonatus["ABDOMEN"] ?>
    </td>
    <td style="">Tali Pusat</td>
    <td style="">: <?= $neonatus["TALI_PUSAT"] ?>
    </td>
    </tr>

    <tr>
    <td style=""><b>Pemeriksaan Status Nutrisi</b></td>
    </tr>

    <tr>
    <td style="">Regurgitasi</td>
    <td style="">: <?= $neonatus["GENITALIA"] ?>
    </td>
    </tr>

    <tr>
    <td style="">Refleks Menghisap</td>
    <td style="">: <?= $neonatus["REFLEKS_MENGHISAP"] ?>
    </td>
    <td style="">Refleks Menelan</td>
    <td style="">: <?= $neonatus["REFLEKS_MENELAN"] ?>
    </td>
    </tr>


    <tr>
    <td style=""><b>Pemeriksaan Genitourinaria</b></td>
    </tr>
    <tr>
    <td style="">Genitalia</td>
    <td style="">: <?= $neonatus["GENITALIA"] ?>
    </td> 
    <td style="">Anus</td>
    <td style="">: <?= $neonatus["ANUS"] ?>
    </td> 
    </tr>
    
    <tr>
    <td style="">Mekonium</td>
    <td style="">: <?= $neonatus["MEKONIUM"] ?>
    </td> 
    <td style="">Bak</td>
    <td style="">: <?= $neonatus["BAK"] ?>
    </td> 
    </tr>
    
    <tr>
    <td style="">Bab</td>
    <td style="">: <?= $neonatus["BAB"] ?>
    </td> 
    </tr>
    
    <tr>
    <td style=""><b>Pemeriksaan Muskuloskeletal dan Integumentum</b></td>
    </tr>
    <tr>
    <td style="">Ekstremitas atas / bawah</td>
    <td style="">: <?= $neonatus["EKSTREMITAS"] ?>
    </td> 
    <td style="">Kelainan Fisik</td>
    <td style="">: <?= $neonatus["KELAINAN_FISIK"] ?>
    </td> 
    </tr>
    
    <tr>
    <td style="">Turgor</td>
    <td style="">: <?= $neonatus["TURGOR"] ?>
    </td> 
    <td style="">Warna Kulit</td>
    <td style="">: <?= $neonatus["WARNA_KULIT"] ?>
    </td> 
    </tr>
    
    <tr>
    <td style=""><b>SKALA NYERI - NIPS <br> (NEONATAL INFANT PAINT SCORE)</b></td>
    </tr>
    <tr>
    <td style="">Ekspresi Wajah</td>
    <td style="">: <?php
                if ($neonatus["PARAM_NYERI1"] == "0") {
                    echo "Otot wajah rileks, ekspersi netral";
                } elseif ($neonatus["PARAM_NYERI1"] == "1") {
                    echo "Otot wajah tegang, alis berkerut, rahang <br> dagu meruncing";
                } else {
                    echo "-";
                }
                ?>
    </td> 
    </tr>
    <tr>
    <td style="">Tangisan</td>
    <td style="">: <?php
                if ($neonatus["PARAM_NYERI2"] == "0") {
                    echo "Tenang tidak menangis";
                } elseif ($neonatus["PARAM_NYERI2"] == "1") {
                    echo "Mengerang, sebentar - sebentar menangis";
                } elseif ($neonatus["PARAM_NYERI2"] == "2") {
                    echo "Terus menerus menangis, menangis kencang, melengking";
                } else {
                    echo "-";
                }
                ?>
    </td> 
    </tr>
    <tr>
    <td style="">Pola Nafas</td>
    <td style="">: <?php
                if ($neonatus["PARAM_NYERI3"] == "0") {
                    echo "Rileks, napas reguler";
                } elseif ($neonatus["PARAM_NYERI3"] == "1") {
                    echo "Pola napas berubah : tidak teratur, lebih cepat dari <br> biasanya, tersedak, menahan napas";
                } else {
                    echo "-";
                }
                ?>
    </td> 
    </tr>
    <tr>
    <td style="">Tangan</td>
    <td style="">: <?php
                if ($neonatus["PARAM_NYERI4"] == "0") {
                    echo "Rileks, otot tangan tidak kaku, kadang <br> bergerak tidak beraturan";
                } elseif ($neonatus["PARAM_NYERI4"] == "1") {
                    echo "Fleksi/ ekstensi kaku, meluruskan tangan tetapi dengan <br> cepat melakukan fleksi/ ekstensi yang kaku";
                } else {
                    echo "-";
                }
                ?>
    </td> 
    </tr>
    <tr>
    <td style="">Kaki</td>
    <td style="">: <?php
                if ($neonatus["PARAM_NYERI5"] == "0") {
                    echo "Rileks, otot tangan tidak kaku, kadang <br> bergerak tidak beraturan";
                } elseif ($neonatus["PARAM_NYERI5"] == "1") {
                    echo "Fleksi/ ekstensi kaku, meluruskan tangan tetapi dengan <br> cepat melakukan fleksi/ ekstensi yang kaku";
                } else {
                    echo "-";
                }
                ?>
    </td> 
    </tr>
    <tr>
    <td style="">Kesadaran</td>
    <td style="">: <?php
                if ($neonatus["PARAM_NYERI6"] == "0") {
                    echo "Tidur pulas atau cepat bangun, alert dan tenang";
                } elseif ($neonatus["PARAM_NYERI6"] == "1") {
                    echo "Rewel, gelisah dan meronta ronta";
                } else {
                    echo "-";
                }
                ?>
    </td> 
    </tr>
    <tr>
    <td style=""><b>Analisis dan Rencana keperawatan</b></td>
    </tr>
    
    <tr>
    <td style="">Masalah Keperawatan</td>
    <td style="">: <?php echo $neonatus["MASALAH_KEPERAWATAN"] ?>
    </td> 
    </tr>
    <tr>
    <td style="">Rencana Keperawatan</td>
    <td style="">: <?php echo $neonatus["MASALAH_KEPERAWATAN"] ?>
    </td> 
    </tr>
    <tr>
    <td style=""><b>Kebutuhan Edukasi</b></td>
    </tr>
    
    <tr>
    <td style="">Terdapat Hambatan dalam <br> Pembelajaran ?</td>
    <td style="">: <?php echo $neonatus["HAMBATAN_PEMBELAJARAN"] ?>
    </td> 
    </tr>
    <tr>
    <td style="">Butuh Penerjemah ?</td>
    <td style="">: <?php echo $neonatus["PENERJEMAH"] ?>
    </td> 
    </tr>
    <tr>
    <td style="">Kebutuhan Edukasi ?</td>
    <td style="">: <?php echo $neonatus["PENERJEMAHh"] ?>
    </td> 
    </tr>

    <tr>
    <td style=""><b>Rencana Pulang / Discharge <br> Planning Awal</b></td>
    </tr>
    <tr>
    <td style="">Perawatan Bayi Baru Lahir ?</td>
    <td style="">: <?php echo $neonatus["DISCHARGE_PLANNING"] ?>
    </td> 
    </tr>
    <tr>
    <td style="">Lainnya</td>
    <td style="">: <?php echo $neonatus["DISCHARGE_PLANNING_LAIN"] ?>
    </td> 
    </tr>


    <tr></tr>
    </table>
    <table class="content">
        <col style="width: 50%;font-size: 12px;">
        <col style="width: 50%;font-size: 12px;">
        <tbody> 
    
            <tr>
                <br>
                 <br>
                <td></td>
                <td align='center'>Tanggal <?= $neonatus["MDD"]; ?> </td>
            </tr>
            <tr>
            <td></td>
                <td align='center'>
                <qrcode value="<?= $neonatus["NamaLegkap"]; ?> pada <?= $neonatus["MDD"]; ?> " ec="H" style="width: 15mm; background-color: white; color: black;"></qrcode>
                    <br>
                </td>
            </tr>
            <tr>
                <td></td>
                <td align='center'>
                <?= $neonatus["NamaLengkap"]; ?>
                </td>
            </tr>
        </tbody>
 </table>
        </div>
        </page>





    <page backtop="27mm" backbottom="10mm" backleft="2mm" backright="2mm" style="font-size:10pt">
   <page_header>
        <table class="page_header">
            <col style="width: 10%;font-size: 12px;">
            <col style="width: 45%;font-size: 12px;">
            <col style="width: 45%;font-size: 12px;">
            <tr>
                <td>
                    <img src="<?php base_url() ?>resource/doc/images/icon/logo.png" width="50" height="50" />
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
            <td  style="font-size: 9px">
                Nama : <?php echo $rs_pasien["NAMA_PASIEN"]; ?><br>
                No MR : <?php echo $rs_pasien["NO_MR"]; ?><br>
                Tgl Lahir : <?php echo date("d-M-Y", strtotime($rs_pasien["TGL_LAHIR"])); ?>
            </td>
        </tr>
    </table>
    </page_header>
       <hr style="margin-top:0px">
    <page_footer> 
    <table style="width: 100%; border-top: solid 1px black;">
        <tr>
            <td style="text-align: left; width: 80%">&nbsp;</td>
            <td style="text-align: right; width: 20%">Halaman [[page_cu]]/[[page_nb]]</td>
        </tr>
    </table>
    </page_footer>
 
    
    <br>
    <table class="content" style="padding-top: 30px">
        <tbody>
            <col style="width: 100%;background-color: #000000;color: #ffffff;padding: 0px;font-size: 12px;">
            <tr>
                <td align="center">
                    <br><strong>ASESMEN RAWAT JALAN IGD</strong>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="content">
        <col style="width: 20%;font-size: 12px;">
        <col style="width: 30%;font-size: 12px;">
        <col style="width: 20%;font-size: 12px;">
        <col style="width: 30%;font-size: 12px;">
        <tbody>
            <tr>
                <td style="border-left:solid 1px #000000;">Tanggal Kunjungan</td>
                <td>
                    : <?php echo date("d-M-Y", strtotime($rs_pasien["TANGGAL"])); ?>
                </td>
                <td>Klinik Tujuan</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    : <?= $rs_pasien["SPESIALIS"]; ?>
                </td>
            </tr>
            <tr> 
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000; "><b>High Risk</b></td>
                <td style="border-bottom:solid 1px #000000;">
                    : <b><?php echo $rs_pasien["FS_HIGH_RISK"]; ?></b>
                </td>
                <td style="border-bottom:solid 1px #000000; "><b>Alergi</b></td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;">
                    : <b>
                        <?php echo $alergi["FS_ALERGI"]; ?>
                    </b>
                </td>
            </tr>
        </tbody>
    </table>
    
    <table class="content" style="padding-top: 30px">
        <tbody>
            <col style="width: 100%;background-color: #000000;color: #ffffff;padding: 0px;font-size: 12px;">
            <tr>
                <td align="center">
                    <br><strong>ASESMEN MEDIS IGD</strong>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    
 
<div class="a" style="border: solid black 1px; font-size: 11px;">
    <table class="content">
    <tr class="headrow">
        <th colspan="4" style="text-align:center"></th>
    
    </tr>

    <tr>
        <td style=""><b>Anamnesa (S)</b></td>
        <td style="width: 50%;">: <?= strip_tags($medis_igd["FS_ANAMNESA"]); ?>
        </td>
     
    </tr>

    <tr>
        <td style="">Riwayat Penyakit Dahulu</td>
        <td style="">: <?php echo $medis_igd["RIW_PENYAKIT_DAHULU"]; ?>
        </td>
    </tr>
    <tr>
        <td style="">Riwayat Penyakit Sekarang</td>
        <td style="">: <?php echo $medis_igd["RIW_PENYAKIT_NOW"]; ?>
        </td>
    </tr>
    <tr>
        <td style="">Riwayat Perawatan Sebelumnya</td>
        <td style="">: <?php echo $medis_igd["RIW_PERAWATAN"]; ?>
        </td>
    </tr>
    <tr>
        <td style="">Terapi & Tindakan yang pernah dilakukan</td>
        <td style="">: <?php echo $medis_igd["RIW_TINDAKAN"]; ?>
        </td>
    </tr>
    <tr>
        <td style="">Riwayat Alergi</td>
        <td style="">: <?php echo $alergi["FS_ALERGI"]; ?>
        </td>
    </tr>
    <tr>
        <td style="">Reaksi Alergi</td>
        <td style="">: <?php echo $alergi["FS_REAK_ALERGI"]; ?>
        </td>
    </tr>
    <tr>
    <td style="">Status Psikologi</td>
    <td style="">: <?php
                    if ($medis_igd["FS_STATUS_PSIK"] == "1") {
                        echo "Tenang";
                    } elseif ($medis_igd["FS_STATUS_PSIK"] == "2") {
                        echo "Cemas";
                    } elseif ($medis_igd["FS_STATUS_PSIK"] == "3") {
                        echo "Takut";
                    } elseif ($medis_igd["FS_STATUS_PSIK"] == "4") {
                        echo "Marah";
                    } elseif ($medis_igd["FS_STATUS_PSIK"] == "5") {
                        echo "Sedih";
                    } elseif ($medis_igd["FS_STATUS_PSIK"] == "6") {
                        echo $medis_igd["FS_STATUS_PSIK2"];
                    } else {
                        echo "-";
                    }
                    ?>
        </td>
        </tr>
        <tr>
            <td style="">Status Mental</td>
            <td style="">: <?php echo $medis_igd["MENTAL"]; ?>
            </td>
        </tr>
        <tr>
            <td style="">Pemeriksaan Fisik</td>
            <td style="width: 50%;">: <?= strip_tags($medis_igd["PEMERIKSAAN_FISIK"]); ?>
            </td>
        </tr>
        <tr>
        <td style=""><b>Kepala Leher</b></td>
        
        </tr>
        <tr>
            <td style="">- Konjungtiva</td>
            <td style="">: <?= $medis_igd["KONJUNGTIVA"];?>
            </td>
     
        </tr>
        <tr>
            <td style="">- Sklera</td>
            <td style="">: <?= $medis_igd["SKELERA"];?>
            </td>
        </tr>
        <tr>
            <td style="">- Bibir/Lidah</td>
            <td style="">: <?= $medis_igd["BIBIR"];?>
            </td>
        </tr>
        <tr>
            <td style="">- Mukos</td>
            <td style="">: <?= $medis_igd["MUKOSA"];?>
            </td>
        </tr>
        <tr>
            <td style="">- Deviasi Trakea</td>
            <td style="">: <?= $medis_igd["DEVIASI"];?>
            </td>
        </tr>
        <tr>
            <td style="">- JVP</td>
            <td style="">: <?= $medis_igd["JVP"];?>
            </td>
        </tr>
        <tr>
            <td style="">Thorax</td>
            <td style="">: <?= $medis_igd["THORAX"];?>
            </td>
        </tr>
        <tr>
            <td style="">Jantung</td>
            <td style="">: <?= $medis_igd["JANTUNG"];?>
            </td>
        </tr>
        <tr>
            <td style="">Abdomen</td>
            <td style="">: <?= $medis_igd["ABDOMEN"];?>
            </td>
        </tr>
        <tr>
            <td style="">Pinggang</td>
            <td style="">: <?= $medis_igd["PINGGANG"];?>
            </td>
        </tr>
        <tr>
            <td style="">Ekstremitas</td>
            <td style="">: - Atas <?= $medis_igd["EKS_ATAS"];?>, - Bawah : <?= $medis_igd["EKS_BAWAH"];?>
            </td>
        </tr>
        <tr>
            <td style="">Diagnosa (A)</td>
            <td style="">: <?= $medis_igd["FS_DIAGNOSA"];?>
            </td>
        </tr>
        <tr>
            <td style="">Tindakan (P)</td>
            <td style="">: <?= $medis_igd["RENCANA"];?>
            </td>
        </tr>
        <tr>
            <td style="">Diet</td>
            <td style="">: <?= $medis_igd["DIET"];?>
            </td>
        </tr>
        <tr>
            <td style="">Konsul DPJP 1</td>
            <td style="">:        <?php
                $rjk=$medis_igd['KD_DOKTER_KONSUL'];
               $cekk=is_numeric($rjk);
               if($cekk==true){
                     $dokterr=$this->db->query("SELECT Nama_Dokter from DOKTER WHERE Kode_Dokter='$rjk' ")->row_array();
                     $dpjp=$dokterr['Nama_Dokter'];}
                ?>
                <?= $dpjp?>
            </td>
        </tr>
        <tr>
            <td style="">Isi Konsul</td>
            <td style="">: <?= $medis_igd["KONSUL"];?>
            </td>
        </tr>

        <?php 
            if ( $medis_igd['KD_DOKTER_KONSUL2'] != ''){ ?>
                  <tr>
            <td style="">Konsul DPJP 2</td>
            <td style="">:        <?php
                $rjk=$medis_igd['KD_DOKTER_KONSUL2'];
               $cekk=is_numeric($rjk);
               if($cekk==true){
                     $dokterr=$this->db->query("SELECT Nama_Dokter from DOKTER WHERE Kode_Dokter='$rjk' ")->row_array();
                     $dpjp2=$dokterr['Nama_Dokter'];}
                ?>
                <?= $dpjp2?>
            </td>
        </tr>
        <tr>
            <td style="">Isi Konsul 2</td>
            <td style="">: <?= $medis_igd["KONSUL2"];?>
            </td>
        </tr>
        <?php } ?>

        <?php 
            if ( $medis_igd['KD_DOKTER_KONSUL3'] != ''){ ?>
                  <tr>
            <td style="">Konsul DPJP 3</td>
            <td style="">:        <?php
                $rjk=$medis_igd['KD_DOKTER_KONSUL3'];
               $cekk=is_numeric($rjk);
               if($cekk==true){
                     $dokterr=$this->db->query("SELECT Nama_Dokter from DOKTER WHERE Kode_Dokter='$rjk' ")->row_array();
                     $dpjp3=$dokterr['Nama_Dokter'];}
                ?>
                <?= $dpjp3?>
            </td>
        </tr>
        <tr>
            <td style="">Isi Konsul 3</td>
            <td style="">: <?= $medis_igd["KONSUL3"];?>
            </td>
        </tr>
        <?php } ?>
        
        <tr>
            <td style="">Kondisi Akhir</td>
            <td style="">: <?= $medis_igd["KONDISI_AKHIR"];?>
            </td>
        </tr>
        <tr>
            <td style="">Jam Selesai periksa</td>
            <td style="">: <?= $medis_igd["JAM_SELESAI"];?>
            </td>
        </tr>

    </table>
    <table class="content">
        <col style="width: 50%;font-size: 12px;">
        <col style="width: 50%;font-size: 12px;">
        <tbody> 
    
            <tr>
                <br>
                 <br>
                <td></td>
                <td align='center'>Tanggal <?= $medis_igd["MDD"]; ?> </td>
            </tr>
            <tr>
            <td></td>
                <td align='center'>
                <qrcode value="<?= $medis_igd["NAMALENGKAP"]; ?> pada <?= $medis_igd["MDD"]; ?> " ec="H" style="width: 15mm; background-color: white; color: black;"></qrcode>
                    <br>
                </td>
            </tr>
            <tr>
                <td></td>
                <td align='center'>
                <?= $medis_igd["NAMALENGKAP"]; ?>
                </td>
            </tr>
        </tbody>
 </table>
    </div>
    </page> 

   

        
        <page backtop="27mm" backbottom="10mm" backleft="2mm" backright="2mm" style="font-size:10pt">
        <page_header>
        <table class="page_header">
            <col style="width: 10%;font-size: 12px;">
            <col style="width: 45%;font-size: 12px;">
            <col style="width: 45%;font-size: 12px;">
            <tr>
                <td>
                    <img src="<?php base_url() ?>resource/doc/images/icon/logo.png" width="50" height="50" />
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
            <td  style="font-size: 9px">
                Nama : <?php echo $rs_pasien["NAMA_PASIEN"]; ?><br>
                No MR : <?php echo $rs_pasien["NO_MR"]; ?><br>
                Tgl Lahir : <?php echo date("d-M-Y", strtotime($rs_pasien["TGL_LAHIR"])); ?>
            </td>
        </tr>
    </table>
    </page_header>
       <hr style="margin-top:0px">
    <page_footer> 
    <table style="width: 100%; border-top: solid 1px black;">
        <tr>
            <td style="text-align: left; width: 80%">&nbsp;</td>
            <td style="text-align: right; width: 20%">Halaman [[page_cu]]/[[page_nb]]</td>
        </tr>
    </table>
    </page_footer>

    <table class="content" style="padding-top: 60px">

<col style="width: 34%;font-size: 10px;">
<col style="width: 66%;font-size: 10px;">
<tbody>
   <tr>
        <td style="font-size: 12px;border-bottom:solid 1px #000000;" colspan="2"><b>HASIL USG</b></td>
    </tr>
    <tr>
        <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><?= strip_tags($result["FS_USG"]); ?></td>
    </tr>
     <tr>
        <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;border-bottom:solid 1px #000000;text-align: right; ">
            Tanggal <?= $result["mdd"]; ?> Jam <?= $result["FS_JAM_TRS"]; ?><br>
            <br><br>
            <qrcode value=" <?= $result["NAMALENGKAP"]; ?> pada <?= $result["mdd"]; ?> <?= $result["FS_JAM_TRS"]; ?>" ec="H" style="width: 15mm; background-color: white; color: black;"></qrcode>
            <br><br>
            <?= $result["NAMALENGKAP"]; ?>
        </td>
    </tr>
</tbody>
</table>
<br>

<table class="content">
<col style="width: 33%;font-size: 10px;">
<col style="width: 66%;font-size: 10px;">
<tbody>
    <tr>
        <td style="border-bottom:solid 1px #000000;" colspan="2"><b>HASIL RADIOLOGI</b></td>
    </tr>
    <tr>
        <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><b>Jenis Pemeriksaan</b></td>
        <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><b>Hasil</b></td>
    </tr>
    <?php foreach ($rs_rad as $rad) {
        ?>
        <tr>
            <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:left;border-right:solid 1px #000000;border-top:solid 1px #000000;"><?= $rad["KET_TINDAKAN"]; ?></td>
            <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;border-top:solid 1px #000000;"><?= $rad["Ket"]; ?></td>
        </tr>
    <?php } ?>
</tbody>
</table>
<br>
<table class="content">
<col style="width: 66%;font-size: 10px;">
<col style="width: 33%;font-size: 10px;">
<tbody>
    <tr>
        <td style="border-bottom:solid 1px #000000;" colspan="2"><b>HASIL LABORATORIUM</b></td>
    </tr>
    <tr>
        <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><b>Jenis Pemeriksaan</b></td>
        <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><b>Hasil</b></td>
    </tr>
    <?php foreach ($rs_lab as $lab) {
        ?>
        <tr>
            <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:left;border-right:solid 1px #000000;border-top:solid 1px #000000;"><?= $lab["Pemeriksaan"]; ?></td>
            <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><?= $lab["Hasil"]; ?></td>
        </tr>
    <?php } ?>
</tbody>
</table>
<br>
<table class="content">
<col style="width: 33%;font-size: 10px;">
<col style="width: 33%;font-size: 10px;">
<col style="width: 33%;font-size: 10px;">
<tbody>
    <tr>
        <td style="border-bottom:solid 1px #000000;" colspan="3"><b>RESEP</b></td>
    </tr>
    <tr>
        <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><b>Nama Obat</b></td>
        <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><b>Jumlah</b></td>
        <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><b>Cara Pemakaian</b></td>
    </tr>
    <?php foreach ($rs_resep as $terapi) { ?>
        <tr>
            <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:left;border-right:solid 1px #000000;border-top:solid 1px #000000;"><?= $terapi["NAMA_OBAT"]; ?></td>
            <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><?= number_format($terapi["JML_OBAT"],2,",","."); ?> <?= $terapi["SATUAN"]; ?></td>
            <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;border-top:solid 1px #000000;">
             <?= $terapi["Dosis"]; ?>
         </td>
     </tr>
 <?php } ?>
</tbody>
</table>
</page>





