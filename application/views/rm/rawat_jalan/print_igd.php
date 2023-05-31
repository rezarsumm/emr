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
    <table class="table-input"    >
    <tr class="headrow">
        <th colspan="4" style="text-align:center"><h4>TRIASE</h4></th>
    
    </tr>
    <tr>
        <td>Kontak Awal Pasien</td>
    </tr>
    <tr>
        <td width="20%">Tanggal</td>
        <td width="30%"><?=$rs_triase["TGL_DATANG"];?> </td>
        <td width="20%">Pukul</td>
        <td width="30%"><?=$rs_triase["JAM_DATANG"];?> </td>
     </tr>
     <tr>
        <td width="20%">Cara masuk </td>
        <td colspan="3"> <?=$rs_triase["CARA_MASUK"];?> 
           </td>
     </tr>
     <tr>
        <td width="20%">  Sudah terpasang </td>
        <td colspan="3"> <?=$rs_triase["SUDAH_TERPASANG"];?>  </td>
      </tr>
      <tr>
        <td width="20%">  Alasan Kedatangan </td>
        <td colspan="3"> <?=$rs_triase["ALASAN_DATANG"];?>  
            
            </td>
     </tr>
     <tr>
        <td width="20%">  Kendaraan </td>
        <td colspan="3"> <?=$rs_triase["KENDARAAN"];?>  
            
            </td>
      </tr>

       

    <tr>
        <td width="20%">Identitas Pengantar</td>
        <td colspan="3">Nama  <?=$rs_triase["NAMA_PENGANTAR"];?> | <?=$rs_triase["TELP_PENGANTAR"];?>  
        </td>
     </tr>
     <tr>
        <td width="20%">  Kasus trauma</td>
        <td colspan="3">  <?=$rs_triase["JENIS_KASUS"];?>  </td>
      </tr>
      </table>


      <table class="table-input" width="100%">
       
          <tr>
             <td colspan="4"> TRAUMA :  <?php
              if($rs_triase["JENIS_TRAUMA"]=='1'){ echo " Kll Tunggal, di ".$rs_triase["TEMPAT_KEJADIAN"]." Tgl ".$rs_triase["TGL_KEJADIAN"]." jam ".$rs_triase["JAM_KEJADIAN"]; }  
             else if($rs_triase["JENIS_TRAUMA"]=='2'){ echo " Kll Ganda, di ".$rs_triase["TEMPAT_KEJADIAN"]." Tgl ".$rs_triase["TGL_KEJADIAN"]." jam ".$rs_triase["JAM_KEJADIAN"]; }  
             else  if($rs_triase["JENIS_TRAUMA"]=='3'){ echo " Jatuh dari ketinggian , ".$rs_triase["URAIAN_TRAUMA"]; }  
             else  if($rs_triase["JENIS_TRAUMA"]=='4'){ echo " Trauma Listrik , ".$rs_triase["URAIAN_TRAUMA"]; }  
             else if($rs_triase["JENIS_TRAUMA"]=='5'){ echo "Trauma Zat Kimia , ".$rs_triase["URAIAN_TRAUMA"]; }  
             else  if($rs_triase["JENIS_TRAUMA"]=='5'){ echo "Trauma Zat Kimia , ".$rs_triase["URAIAN_TRAUMA"]; }  
             else  { echo $rs_triase["URAIAN_TRAUMA"]; }  ?>
           
                 
                </td>

         </tr>

         </table>

         <table class="table-input" width="100%">
            
             <tr><td>KELUHAN UTAMA</td>
                 <td colspan="3"><?=$rs_triase["KELUHAN"];?>   
                 </td>
             </tr>
           


    <tr class="headrow">
        <th colspan="4">
        
        <br>
        <br>
        Vital Sign</th>
    </tr>

    <tr>
        <td>
            <table>
            <tr>
                 <td>Kesadaran</td>
                    <td colspan="3"><?=$rs_triase["KESADARAN"];?>   
                    </td>
                </tr>
                <tr>
                    <td>Tekanan Darah</td>
                    <td colspan="3"><?=$rs_triase["TD"];?>  
                </td>
                </tr>
                <tr> 
                    <td width="20%">Nadi</td>
                    <td colspan="3"><?=$rs_triase["N"];?>  
                    Suhu
                    <?=$rs_triase["SUHU"];?>  
                        Nyeri
                        <?=$rs_triase["NYERI"];?>  </td>
                </tr>
                <tr>
                
                </tr>
                <tr>
                    <td>Tinggi Badan</td>
                    <td><?=$rs_triase["TG"];?>    cm</td></tr>
                <tr><td>Berat Badan</td>
                    <td><?=$rs_triase["BB"];?>    Kg</td>
                </tr>
                </table>

    
      </td>
     
     
        <td colspan="3">
            <table>
                <tr>
                    <td> Kesadaran </td>
                    <td> <?=$rs_triase["SKOR_KESADARAN"];?>   </td>
                </tr>
                <tr>
                    <td>Tekanan Darah Sistolik </td>
                    <td><?=$rs_triase["SKOR_TD"];?>  </td>
                </tr>
                <tr>
                    <td> Nadi </td>
                    <td> <?=$rs_triase["SKOR_N"];?>   </td>
                </tr>
                <tr>
                    <td>Respirasi</td>
                    <td> <?=$rs_triase["SKOR_R"];?>   </td>
                </tr>
                <tr>
                    <td>Temperatur</td>
                    <td><?=$rs_triase["SKOR_SUHU"];?>   </td>
                </tr>
                <tr>
                    <td>Staurasi O2</td>
                    <td><?=$rs_triase["SKOR_O2"];?>  </td>
                </tr>
            </table>
          
            Total   :  <?=$rs_triase["TOTAL_SKOR"];?>, Kesimpulan :  <?=$rs_triase["KES"];?>   <br>
            
          </td>
   </tr>
        
    <tr><td><br><br></td></tr>

    <tr>
       
            
    </tr>
    <tr>
        <td> Catatan Khusus </td>
        <td><?=$rs_triase["CAT_KHUSUS"];?>   
        </td>
        </tr>

    <tr> <td >Keputusan </td>
        <td colspan="3"><?=$rs_triase["KEPUTUSAN"];?>   
            Pukul <?=$rs_triase["JAM_KEP"];?>   
          </td>
        
               
    </tr>
    
    </table>
    <table style="padding-right:30px; text-align: right;">
    <tr>
               <td> <br><br>
                    Tanggal <?= $rs_triase["mdd"]; ?> 
                    <br><br>
                    <qrcode value="<?= $rs_triase["NAMALENGKAP"]; ?> pada <?= $rs_triase["mdd"]; ?> " ec="H" style="width: 15mm; background-color: white; color: black;"></qrcode>
                    <br><br>
                    <?= $rs_triase["NAMALENGKAP"]; ?>
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
    <table class="content">
        <col style="width: 60%;font-size: 10px;">
        <col style="width: 40%;font-size: 10px;">
        <tbody>
            <tr>
                <td style="font-size: 12px;border-bottom:solid 1px #000000;" colspan="2"><b>ASESMEN KEPERAWATAN IGD</b></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"><b>Keluhan Utama</b></td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">: <?= $perawat_igd["KEL_UTAMA"]; ?>

                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"> Keluhan Penyakit Sekarang</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    :  <?= $perawat_igd["KEL_SEKARANG"]; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Status Kehamilan</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    :   <?= $perawat_igd["HAMIL"]; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"><b>Bio Sosio</b> </td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                   
                </td>
            </tr>  
            <tr>
                <td style="border-left:solid 1px #000000;"> Status Pernikahan </td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    :  <?= $perawat_igd["MENIKAH"]; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Pekerjaan </td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                  :  <?= $perawat_igd["JOB"]; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"> Suku</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    :   <?= $perawat_igd["SUKU"]; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"> Agama</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    : 
                    <?php
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
            <tr>
                <td style="border-left:solid 1px #000000;"> <b> OBJEKTIF </b></td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    :  
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"> Psikologis </td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    :  <?= $perawat_igd["PSIKOLOGIS"]; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Mental </td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    : < <?= $perawat_igd["MENTAL"]; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"> Kesadaran</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    : < <?= $perawat_igd["KESADARAN"]; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"> GCS</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    : < <?= $perawat_igd["GCS"]; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Keadaan Umum </td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    : < <?= $perawat_igd["KEADAAN_UMUM"]; ?>
                </td>
            </tr>

      


            <tr>
                <td style="border-left:solid 1px #000000;"><b>Vital Sign</b></td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">

                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Suhu</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    : <?= $vs["FS_SUHU"] ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Nadi</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    :  <?= $vs["FS_NADI"] ?> x/menit
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">R</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    :  <?= $vs["FS_R"] ?> x/menit
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">TD</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    :  <?= $vs["FS_TD"] ?> mmHg
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Tinggi Badan</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    :  <?= $vs["FS_TB"] ?> cm
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Berat Badan</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    : <?= $vs["FS_BB"] ?> Kg
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Lingkar Kepala</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    : <?= $vs["FS_BB"] ?> Kg
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">  Status Gizi</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    : <?= $vs["FS_BB"] ?> Kg
                </td>
            </tr>

            <tr>
                <td style="border-left:solid 1px #000000;"> <b>Kebutuhan Fungsional</b></td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    :  
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Alat Bantu </td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    : <?= $perawat_igd["KEL_UTAMA"]; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"> Cacat</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    : < <?= $perawat_igd["KEL_UTAMA"]; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">ADL </td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    : < <?= $perawat_igd["KEL_UTAMA"]; ?>
                </td>
            </tr>


            <tr>
                <td style="border-left:solid 1px #000000;"><b>Asesmen Nyeri</b></td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    : <?php
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
                <td style="border-left:solid 1px #000000;">Provoke</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    : <?php
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
                <td style="border-left:solid 1px #000000;">Quality</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    : <?php
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
                <td style="border-left:solid 1px #000000;">Regio</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    : <?= $nyeri["FS_NYERIR"]; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Severity</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    : <?php
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
                <td style="border-left:solid 1px #000000;">Time</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    : <?php
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
                <td style="border-left:solid 1px #000000;"> B1 (Breathing)</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;" colspan="2"> 
                  <table>
                  <tr>
                    <td><b>Irama Nafas : </b></td>
                    <td>  <?= $perawat_igd["IRAMA_NAFAS"]; ?></td>
                    <td><b>Batuk: </b> </td>
                    <td>  <?= $perawat_igd["BATUK"]; ?></td>
                    <td><b>Pola Pernafasan :</b>  </td>
                    <td>  <?= $perawat_igd["POLA_NAFAS"]; ?></td>
                    <td><b> Suara Nafas :</b> </td>
                    <td>  <?= $perawat_igd["SUARA_NAFAS"]; ?></td>
                    <td><b>Alat Bantu Nafas :</b> </td>
                    <td>  <?= $perawat_igd["BANTU_NAFAS"]; ?></td>
                  </tr>
                  </table>
                    </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"> B2 (Blood)</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;" colspan="2"> 
                  <table>
                  <tr>
                    <td><b>Nyeri Dada : </b></td>
                    <td>  <?= $perawat_igd["NYERI_DADA"]; ?></td>
                    <td><b>Akral  : </b> </td>
                    <td>  <?= $perawat_igd["AKRAL"]; ?></td>
                    <td><b>Perdarahan   :</b>  </td>
                    <td>  <?= $perawat_igd["PERDARAHAN"]; ?></td>
                    <td><b> Cyanosis   :</b> </td>
                    <td>  <?= $perawat_igd["CYANOSIS"]; ?></td>
                    <td><b>CRT :</b> </td>
                    <td>  <?= $perawat_igd["CRT"]; ?></td>
                    <td><b>Turgor :</b> </td>
                    <td>  <?= $perawat_igd["Turgor"]; ?></td>
                  </tr>
                  </table>
                    </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"> B3 (Brain)</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;" colspan="2"> 
                  <table>
                  <tr>
                    <td><b>Reflek Cahaya  : </b></td>
                    <td>  <?= $perawat_igd["REFLEK_CAHAYA"]; ?></td>
                    <td><b>Pupil  : </b> </td>
                    <td>  <?= $perawat_igd["PUPIL"]; ?></td>
                    <td><b>Kelumpuhan   :</b>  </td>
                    <td>  <?= $perawat_igd["LUMPUH"]; ?></td>
                    <td><b> Pusing   :</b> </td>
                    <td>  <?= $perawat_igd["PUSING"]; ?></td>
                     
                  </tr>
                  </table>
                    </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"> B4 (BAK)</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;" colspan="2"> 
                  <table>
                  <tr>
                    <td><b>  BAK  : </b></td>
                    <td>  <?= $perawat_igd["BAK"]; ?></td>
                    <td><b>Nyeri Tekan    : </b> </td>
                    <td>  <?= $perawat_igd["BAK_TEKAN"]; ?></td>
                    <td><b>Urine   :</b>  </td>
                    <td>  <?= $perawat_igd["URINE"]; ?></td>
                    
                     
                  </tr>
                  </table>
                    </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"> B6 (Bone)</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;" colspan="2"> 
                  <table>
                  <tr>
                    <td><b>  Pergerakan Sendi   : </b></td>
                    <td>  <?= $perawat_igd["SENDI"]; ?></td>
                    <td><b>DIslokasi   : </b> </td>
                    <td>  <?= $perawat_igd["DISLOK"]; ?></td>
                    <td><b>Fraktur   :</b>  </td>
                    <td>  <?= $perawat_igd["FRAKTUR"]; ?></td>
                    <td><b>Luka   :</b>  </td>
                    <td>  <?= $perawat_igd["LUKA"]; ?></td>
                     
                  </tr>
                  </table>
                    </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"> B5 (Bowel)</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;" colspan="2"> 
                  <table>
                  <tr>
                    <td><b>  BAB  : </b></td>
                    <td>  <?= $perawat_igd["BAB"]; ?></td>
                    <td><b>Abdomen    : </b> </td>
                    <td>  <?= $perawat_igd["ABDOMEN"]; ?></td>
                    <td><b>Nyeri Tekan    : </b> </td>
                    <td>  <?= $perawat_igd["NYERI_TEKAN"]; ?></td>
                    <td><b>Jejas Abdomen   :</b>  </td>
                    <td>  <?= $perawat_igd["JEJAS_ABDOMEN"]; ?></td>
                    
                     
                  </tr>
                  </table>
                    </td>
            </tr>

          
            <tr>
                <td style="border-left:solid 1px #000000;"><b>  Resiko Dekubitus</b></td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">: <?= $perawat_igd["KEL_UTAMA"]; ?>

                </td>
            </tr>

            <tr>
                <td style="border-left:solid 1px #000000;">  Pasien menggunakan kursi roda/mmembutuhkan bantuan </td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">: <?= $perawat_igd["KURSI_RODA"]; ?>

                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">  Pasien inkontinensiauri / alvi </td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">: <?= $perawat_igd["ALVI"]; ?>

                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">  riwayat dekubitus atau luka dekubitus </td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">: <?= $perawat_igd["RIWAYAT_DEKUBITUS"]; ?>

                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">  Usia diatas 65 tahun</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">: <?= $perawat_igd["USIA65"]; ?>

                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"> Ekstremitas dan badan tidak sesuai dengan usia perkembangan</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">: <?= $perawat_igd["ANAK_SESUAI_UMUR"]; ?>

                </td>
            </tr>

             
            
            <tr>
                <td style="border-left:solid 1px #000000;"><b>Status Fungsional</b></td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    :  
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Pengelihatan</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    : <?php
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
                <td style="border-left:solid 1px #000000;">Penciuman</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    : <?php
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
                <td style="border-left:solid 1px #000000;">Pendengaran</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    : <?php
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
                <td style="border-left:solid 1px #000000;"><b>Keperawatan</b></td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Masalah Keperawatan</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    : <?php foreach ($masalah_kep as $data_masalah){?>
                        <?php echo $data_masalah["FS_NM_DIAGNOSA"]; ?>,
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Rencana Keperawatan</td>
                  <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    : <?php foreach ($rencana_kep as $data_rencana){?>
                        <?php echo $data_rencana["FS_NM_REN_KEP"]; ?>,
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align: center;"></td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;text-align: center;">
                    Tanggal <?= $vs["mdd"]; ?> Jam <?= $vs["FS_JAM_TRS"]; ?>
                    <br><br>
                    <qrcode value="<?= $vs["NAMALENGKAP"]; ?> pada <?= $vs["mdd"]; ?> <?= $vs["FS_JAM_TRS"]; ?>" ec="H" style="width: 15mm; background-color: white; color: black;"></qrcode>
                    <br><br>
                    <?= $vs["NAMALENGKAP"]; ?>
                </td>
            </tr>
        </tbody>
    </table>


    <br>






    
    <table class="content">
    <col style="width: 60%;font-size: 10px;">
    <col style="width: 40%;font-size: 10px;">
    <tbody>
        <tr>
            <td style="font-size: 12px;border-bottom:solid 1px #000000;" colspan="2"><b>ASESMEN KEBIDANAN IGD</b></td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;"><b>Cara Masuk</b></td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">: <?= $bidan_igd["CARA_MASUK"]; ?>

            </td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;"><b>Rujukan Dari  </b></td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">: <?= $bidan_igd["RUJUKAN"]; ?>

            </td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;"><b>   Membawa obat sendiri  </b></td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">: <?= $bidan_igd["BAWA_OBAT"]; ?>

            </td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;"><b>  Data Suami  </b></td></tr>
            <tr>   <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
              <table>
              <tr>
                <td> Nama </td><td> : <?= $bidan_igd["NAMA_SUAMI"]; ?></td>
                <td> Tanggal Lahir  </td><td> : <?= $bidan_igd["TGL_LAHIR_SUAMI"]; ?></td>
                <td> Pekerjaan    </td><td> : <?= $bidan_igd["PEKERJAAN_SUAMI"]; ?></td>
                <td> Agama    </td><td> : <?= $bidan_igd["AGAMA_SUAMI"]; ?></td>
                <td> Pendidikan    </td><td> : <?= $bidan_igd["PENDIDIKAN_SUAMI"]; ?></td>
              </tr>
              </table> 

            </td>
        </tr>

        <tr>
                <td style="border-left:solid 1px #000000;">Pekerjaan Pasien</td>
                <td style="border-right:solid 1px #000000;">
                    :    <?php echo $bidan_igd['JOB_PASIEN']; ?>
                    
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Pendidikan pasien</td>
                <td style="border-right:solid 1px #000000;">
                    :    <?php echo $bidan_igd['PENDIDIKAN_PASIEN']; ?>
                    
                </td>
            </tr>
           
        
        <tr>
            <td style="border-left:solid 1px #000000;"><b>Riwayat Haid</b></td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"> 

            </td>
        </tr>
        
        <tr>
            <td style="border-left:solid 1px #000000;"><b>  Menarche</b></td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">: <?= $bidan_igd["FS_HAID_MEN"]; ?>

            </td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;"><b>  Siklus</b></td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">: <?= $bidan_igd["FS_HAID_SIKLUS"]; ?>

            </td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;"><b>  Lama Haid</b></td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">: <?= $bidan_igd["FS_HAID_LAMA"]; ?>

            </td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;"><b>  HPHT</b></td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">: <?= $bidan_igd["FS_HAID_HPHT"]; ?>

            </td>
        </tr>
     
        <tr>
            <td style="border-left:solid 1px #000000;"><b>  HPL</b></td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">: <?= $bidan_igd["FS_HAID_HPL"]; ?>

            </td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;"><b>  Keluhan</b></td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">: <?= $bidan_igd["FS_HAID_KELUHAN"]; ?>

            </td>
        </tr>
       



        <tr>
            <td style="border-left:solid 1px #000000;"><b>Keluhan Utama</b></td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">: <?= $bidan_igd["KEL_UTAMA"]; ?>

            </td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;"> Keluhan Penyakit Dahulu</td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                :  <?= $bidan_igd["FS_RIW_PENYAKIT_DAHULU"]; ?>
            </td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;"> Keluhan Penyakit Sekarang</td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                :  <?= $bidan_igd["KEL_SEKARANG"]; ?>
            </td>
        </tr>
       
        
        <tr>
                <td style="border-left:solid 1px #000000;"><b>Riwayat Penyakit pada Kehamilan Sekarang  </b></td>
                <td style="border-right:solid 1px #000000;"></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"> 
                <table>
                 <tr><td> Asma </td><td>:<?= $bidan_igd['FS_ASMA_MULAI'];?>, Dalam Terapi <?= $bidan_igd['FS_ASMA_TERAPI'];?></td></tr>
                 <tr><td> Jantung </td><td>:<?= $bidan_igd['FS_JANTUNG_MULAI'];?>,  Dalam Terapi <?= $bidan_igd['FS_JANTUNG_TERAPI'];?></td></tr>
                 <tr><td> Diabetes </td><td>:<?= $bidan_igd['FS_DIABETES_MULAI'];?>,  Dalam Terapi <?= $bidan_igd['FS_DIABETES_TERAPI'];?></td></tr>
                 <tr><td> Hipertensi </td><td>:<?= $bidan_igd['FS_HIPERTENSI_MULAI'];?>,  Dalam Terapi <?= $bidan_igd['FS_HIPERTENSI_TERAPI'];?></td></tr>
                 <tr><td> Sakit lainnya </td><td>:<?= $bidan_igd['FS_SAKIT_LAIN'];?> </td></tr>
                
                 </table>
                </td>
                <td style="border-right:solid 1px #000000;"> 
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td style="border-left:solid 1px #000000;"><b>  Riwayat Gynekologi</b></td>
                <td style="border-right:solid 1px #000000;">:<?= $bidan_igd['FS_RIWAYAT_GYNEKOLOGI'];?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"><b>  Riwayat KB</b></td>
                <td style="border-right:solid 1px #000000;">:<?= $bidan_igd['FS_RIWAYAT_KB'];?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"><b>  Riwayat Komplikasi KB</b></td>
                <td style="border-right:solid 1px #000000;">:<?= $bidan_igd['FS_RIWAYAT_KOMPLIKASI_KB'];?></td>
            </tr>


            <tr>
                <td style="border-left:solid 1px #000000;"><b> Pola Makan/Minum/Eliminasi</b></td>
                <td style="border-right:solid 1px #000000;"> </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"> 
                <table>
                 <tr><td> Pola Makan </td><td>:<?= $bidan_igd['POLA_MAKAN'];?> kali/hari,Terakhir Jam <?= $bidan_igd['JAM_TERAKHIR_MAKAN'];?></td></tr>
                 <tr><td> Pola Minum </td><td>:<?= $bidan_igd['POLA_MINUM'];?>cc/hari, Terakhir Jam <?= $bidan_igd['JAM_TERAKHIR_MINUM'];?></td></tr>
                 <tr><td> Pola BAK </td><td>:<?= $bidan_igd['POLA_BAK'];?>kali/hari, Terakhir Jam <?= $bidan_igd['JAM_TERAKHIR_BAK'];?></td></tr>
                 <tr><td> Pola BAB </td><td>:<?= $bidan_igd['POLA_BAB'];?>kali/hari, Terakhir Jam <?= $bidan_igd['JAM_TERAKHIR_BAB'];?></td></tr>
                 <tr><td> Pola Istirahat </td><td>:<?= $bidan_igd['POLA_TIDUR'];?>, Terakhir Jam <?= $bidan_igd['JAM_TERAKHIR_TIDUR'];?></td></tr>
              
                 </table>
                </td>
                <td style="border-right:solid 1px #000000;">
                   
                </td>
            </tr>



            <tr>
            <td style="border-left:solid 1px #000000;"> <b> DATA PSIKOLOGI & SOSIAL </b></td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                :  
            </td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;"> Rumah Tinggal  </td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                :  <?= $bidan_igd["RUMAH_MILIK"]; ?>
            </td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;">Tinggal Bersama </td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                : < <?= $bidan_igd["TINGGAL_BERSAMA"]; ?>
            </td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;"> PJ Darurat    </td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                :  <?= $bidan_igd["PJ_DARURAT"]; ?> Hubungan : <?= $bidan_igd["HUBUNGAN_PJ"]; ?>
            </td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;"> Aktivitas </td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                :  <?= $bidan_igd["AKTIFITAS"]; ?>
            </td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;"> Support Sosial </td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                :  <?= $bidan_igd["SOSIAL_SUPPORT"]; ?>
            </td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;"> Penerimaan persalinan   </td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                :  <?= $bidan_igd["PERSALINAN"]; ?>
            </td>
        </tr>


        
        <tr>
            <td style="border-left:solid 1px #000000;"><b>Vital Sign</b></td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">

            </td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;">Suhu</td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                : <?= $vs["FS_SUHU"] ?>
            </td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;">Nadi</td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                :  <?= $vs["FS_NADI"] ?> x/menit
            </td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;">R</td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                :  <?= $vs["FS_R"] ?> x/menit
            </td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;">TD</td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                :  <?= $vs["FS_TD"] ?> mmHg
            </td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;">Tinggi Badan</td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                :  <?= $vs["FS_TB"] ?> cm
            </td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;">Berat Badan</td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                : <?= $vs["FS_BB"] ?> Kg
            </td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;">Lingkar Kepala</td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                : <?= $vs["FS_BB"] ?> Kg
            </td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;">  Status Gizi</td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                : <?= $vs["FS_BB"] ?> Kg
            </td>
        </tr>

        <tr>
            <td style="border-left:solid 1px #000000;"> <b>Kebutuhan Fungsional</b></td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                :  
            </td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;">Alat Bantu </td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                : <?= $bidan_igd["ALAT_BANTU"]; ?>
            </td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;"> Cacat</td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                : < <?= $bidan_igd["CACAT"]; ?>
            </td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;">ADL </td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                : < <?= $bidan_igd["ADL"]; ?>
            </td>
        </tr>


        
        <tr>
            <td style="border-left:solid 1px #000000;"> <b>Pemeriksaan Umum</b>   </td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                :  
            </td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;"> Keadaan Umum</td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                : < <?= $bidan_igd["KEADAAN_UMUM"]; ?>
            </td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;"> Kesadaran</td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                : < <?= $bidan_igd["SADAR"]; ?>
            </td>
        </tr>
       


        <tr>
                <td style="border-left:solid 1px #000000;"><b>Pemeriksaan Fisik</b></td>
                <td style="border-right:solid 1px #000000;">
                    : <?= $bidan_igd['FS_PEMERIKSAAN_FISIK']; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"><b> 
                <table>
                 <tr><td> Mata </td><td>:<?= $bidan_igd['MATA'];?></td></tr>
                 <tr><td> Skelera </td><td>:<?= $bidan_igd['SCLERA'];?></td></tr>
                 <tr><td> Konjungtiva </td><td>:<?= $bidan_igd['KONJUNGTIVA'];?></td></tr>
                 <tr><td> Kepala </td><td>:<?= $bidan_igd['KEPALA'];?></td></tr>
                 <tr><td> Telinga </td><td>:<?= $bidan_igd['TELINGA'];?></td></tr>
                 <tr><td> Hidung </td><td>:<?= $bidan_igd['HIDUNG'];?></td></tr>
                 <tr><td> Tenggorokan </td><td>:<?= $bidan_igd['TENGGOROKAN'];?></td></tr>
                 <tr><td> Leher </td><td>:<?= $bidan_igd['LEHER'];?></td></tr>
                 <tr><td> Dada </td><td>:<?= $bidan_igd['DADA'];?></td></tr>
                 <tr><td> Jantung </td><td>:<?= $bidan_igd['JANTUNG'];?></td></tr>
                 <tr><td> Paru Paru </td><td>:<?= $bidan_igd['PARU_PARU'];?></td></tr>
                 <tr><td> Abdomen </td><td>:<?= $bidan_igd['ABDOMEN'];?></td></tr> 
                 <tr><td> Anggota Gerak Atas </td><td>:<?= $bidan_igd['BADAN_GERAK_ATAS'];?></td></tr>
                 <tr><td> Anggota Gerak Bawah</td><td>:<?= $bidan_igd['BADAN_GERAK_BAWAH'];?></td></tr>
                 </table>
                </b></td>
                <td style="border-right:solid 1px #000000;"></td>
            </tr>


            <tr>
                <td style="border-left:solid 1px #000000;"><b>Pemeriksaan Khusus</b></td>
                <td style="border-right:solid 1px #000000;">
                    : <?= $bidan_igd['FS_PEMERIKSAAN_FISIK']; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"><b> 
                <table>
                 <tr><td> Dada </td><td>:<?= $bidan_igd['CEK_DADA'];?></td></tr>
                 <tr><td> Inspeksi Abdomen </td><td>:<?= $bidan_igd['INSPEKSI_ABDOMEN'];?></td></tr>
                 <tr><td> Palpasi </td><td> </td></tr>
                 <tr><td> Leopod I </td><td>:<?= $bidan_igd['LEOPOD_1'];?></td></tr>
                 <tr><td> Leopod II </td><td>:<?= $bidan_igd['LEOPOD_2'];?></td></tr>
                 <tr><td> Leopod III </td><td>:<?= $bidan_igd['LEOPOD_3'];?></td></tr>
                 <tr><td> Leopod IV </td><td>:<?= $bidan_igd['LEOPOD_4'];?></td></tr>
                 <tr><td> Auskultasi </td><td>:<?= $bidan_igd['AUSKULTASI'];?></td></tr>
                 <tr><td> KOntraksi </td><td>:<?= $bidan_igd['KONTRAKSI'];?></td></tr>
                 <tr><td> Ano Genital </td><td> </td></tr>
                 <tr><td> Inspeksi   </td><td>:<?= $bidan_igd['INSPEKSI_ANO_GENITAS'];?></td></tr>
                 <tr><td> Vagina Toucher   </td><td>:<?= $bidan_igd['VAGINA_TOUCHER'];?></td></tr>
                  </table>
                </b></td>
                <td style="border-right:solid 1px #000000;"></td>
            </tr>


        <tr>
            <td style="border-left:solid 1px #000000;"><b>Asesmen Nyeri</b></td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                : <?php
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
            <td style="border-left:solid 1px #000000;">Provoke</td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                : <?php
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
            <td style="border-left:solid 1px #000000;">Quality</td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                : <?php
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
            <td style="border-left:solid 1px #000000;">Regio</td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                : <?= $nyeri["FS_NYERIR"]; ?>
            </td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;">Severity</td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                : <?php
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
            <td style="border-left:solid 1px #000000;">Time</td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                : <?php
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
                <td style="border-left:solid 1px #000000;"><b>Skrining Nutrisi</b></td>
                <td style="border-right:solid 1px #000000;"></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Penurunan berat badan yang tidak diinginkan selama 6 bulan terakhir</td>
                <td style="border-right:solid 1px #000000;">:
                 <?php
                    if ($nutrisi['FS_NUTRISI1'] == '0') {
                        echo "Tidak";
                    } elseif ($nutrisi['FS_NUTRISI1'] == '2') {
                        echo "Tidak Yakin";
                    } elseif ($nutrisi['FS_NUTRISI1'] == '1') {
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
                <td style="border-left:solid 1px #000000;">Asupan makanan menurun dikarenakan adanya penurunan nafsu makan</td>
                <td style="border-right:solid 1px #000000;">:
                 <?php
                    if ($nutrisi['FS_NUTRISI2'] == '0') {
                        echo "Tidak";
                    } elseif ($nutrisi['FS_NUTRISI2'] == '2') {
                        echo "Ya";
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
            </tr>

      
      
         
        
        <tr>
            <td style="border-left:solid 1px #000000;"><b>Status Fungsional</b></td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                :  
            </td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;">Pengelihatan</td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                : <?php
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
            <td style="border-left:solid 1px #000000;">Penciuman</td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                : <?php
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
            <td style="border-left:solid 1px #000000;">Pendengaran</td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                : <?php
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
            <td style="border-left:solid 1px #000000;"><b>Kebidanan</b></td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"></td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;">Masalah Kebidanan</td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                : <?php foreach ($masalah_kep as $data_masalah){?>
                    <?php echo $data_masalah["MASALAH_KEBIDANAN"]; ?>,
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;">Diagnisa Kebidanan</td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                : <?php foreach ($rencana_kep as $data_rencana){?>
                    <?php echo $data_rencana["DIAGNOSA  "]; ?>,
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;">Rencana Kebidanan</td>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                : <?php foreach ($rencana_kep as $data_rencana){?>
                    <?php echo $data_rencana["RENCANA_TIN"]; ?>,
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align: center;"></td>
            <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;text-align: center;">
                Tanggal <?= $vs["mdd"]; ?> Jam <?= $vs["FS_JAM_TRS"]; ?>
                <br><br>
                <qrcode value="<?= $vs["NAMALENGKAP"]; ?> pada <?= $vs["mdd"]; ?> <?= $vs["FS_JAM_TRS"]; ?>" ec="H" style="width: 15mm; background-color: white; color: black;"></qrcode>
                <br><br>
                <?= $vs["NAMALENGKAP"]; ?>
            </td>
        </tr>
    </tbody>
</table>



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
                
           

             <table style="float:; padding-left: 50px"> 
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
    <table class="content" style="padding-top: 30px">

        <col style="width: 34%;font-size: 10px;">
        <col style="width: 66%;font-size: 10px;">
        <tbody>
            <tr>  
                <td style="font-size: 12px;border-bottom:solid 1px #000000;" colspan="2"><b>ASESMEN MEDIK</b></td>
            </tr>
              <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2"><b>Anamnesa (S)</b></td>
            </tr>
             <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><?= strip_tags($medis_igd["FS_ANAMNESA"]); ?></td>
            </tr>
          <!--  <br> <hr style="margin-top:0px"> -->

          

              <tr> 
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2"><b>Riwayat Penyakit</b></td> </tr>
            <tr>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                      <?php echo $medis_igd["FS_RIW_PENYAKIT_DAHULU"]; ?>?php echo $medis_igd["RIW_PENYAKIT_NOW"]; ?> 

                </td>
            </tr>

               <tr>
               <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2"><b>Riwayat Perawatan Sebelumnya</b></td></tr>
            <tr>
               <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                      <?php echo $medis_igd["RIW_PERAWATAN"]; ?>

                </td>
            </tr>
            <tr>
               <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2"><b> Terapi & Tindakan yang pernah dilakukan</b></td></tr>
            <tr>
               <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                      <?php echo $medis_igd["RIW_TINDAKAN"]; ?>

                </td>
            </tr>

         
               <tr>
                 <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2"><b>Status Psikologis</b></td></tr>
              <tr>
              <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">  <?php
                    if ($ases2["FS_STATUS_PSIK"] == "1") {
                        echo "Tenang";
                    } elseif ($ases2["FS_STATUS_PSIK"] == "2") {
                        echo "Cemas";
                    } elseif ($ases2["FS_STATUS_PSIK"] == "3") {
                        echo "Takut";
                    } elseif ($ases2["FS_STATUS_PSIK"] == "4") {
                        echo "Marah";
                    } elseif ($ases2["FS_STATUS_PSIK"] == "5") {
                        echo "Sedih";
                    } elseif ($ases2["FS_STATUS_PSIK"] == "6") {
                        echo $ases2["FS_STATUS_PSIK2"];
                    } else {
                        echo "-";
                    }
                    ?>

                </td>
            </tr>

           
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2"><b>Pemeriksaan Fisik (O)</b></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><?= strip_tags($medis_igd["PEMERIKSAAN_FISIK"]); ?></td>
            </tr> 

            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2"><b> Kepala Leher</b></td>
            </tr>
             <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                     <table>
                         <tr><td>Konjungtiva </td><td> : <?= $medis_igd["KONJUNGTIVA"];?></td>
                            <td>Sklera </td><td> : <?= $medis_igd["SKELERA"];?></td></tr>
                         <tr><td>Bibir/Lidah </td><td> : <?= $medis_igd["BIBIR"];?></td>
                           <td> Mukosa </td><td> : <?= $medis_igd["MUKOSA"];?></td></tr>
                     </table>
                      <table>
                         <tr><td>Deviasi Trakea </td><td> : <?= $medis_igd["DEVIASI"];?></td>
                         <td>JVP </td><td> : <?= $medis_igd["JVP"];?></td></tr>
                        
                     </table>
                </td>
            </tr>
              
              <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2"><b> Thorax</b></td>
            </tr>
             <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                     <?= $medis_igd["THORAX"];?>
                </td>
            </tr>
       
              <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2"><b> Jantung</b></td>
            </tr>
             <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                     <?= $medis_igd["JANTUNG"];?>
                </td>
            </tr>
        
              <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2"><b> Abdomen</b></td>
            </tr>
             <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                     <?= $medis_igd["ABDOMEN"];?>
                </td>
            </tr>
        
              <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2"><b> Pinggang</b></td>
            </tr>
             <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                     <?= $medis_igd["PINGGANG"];?>
                </td>
            </tr>
       >
              <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2"><b> Ekstremitas</b></td>
            </tr>
             <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                   Atas :  <?= $medis_igd["EKS_ATAS"];?>
                   Bawah :  <?= $medis_igd["EKS_BAWAH"];?>
                </td>
            </tr>
       


            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2"><b>Diagnosa (A)</b></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><?= strip_tags($medis_igd["FS_DIAGNOSA"]); ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2"><b>Dafar Masalah</b></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><?= strip_tags($medis_igd["FS_DAFTAR_MASALAH"]); ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2"><b>Tindakan (P)</b></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><?= strip_tags($medis_igd["FS_TINDAKAN"]); ?>
                <?php if($medis_igd["FS_EKG"]!=""){?>
                <br>EKG :<?= $medis_igd["FS_EKG"]; ?>
                <?php }?>
                </td>
            </tr>
             
              <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2"><b>Konsul </b> : 
                <?= $medis_igd["KONSUL"];?> </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2"><b>Kondisi AKhir </b> : 
                <?= $medis_igd["KONDISI_AKHIR"];?> </td>
            </tr>
        
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2"><b>  Jam Selesai Periksa </b> : 
                <?= $medis_igd["JAM_SELESAI"];?> </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;border-bottom:solid 1px #000000;text-align: right; ">
                    Tanggal <?= $medis_igd["mdd"]; ?>  <br>
                    <br><br>
                    <qrcode value=" <?= $medis_igd["NAMALENGKAP"]; ?> pada <?= $medis_igd["mdd"]; ?> " ec="H" style="width: 15mm; background-color: white; color: black;"></qrcode>
                    <br><br>
                    <?= $medis_igd["NAMALENGKAP"]; ?>
                </td>
            </tr>
        </tbody>
    </table>
    <br>

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
</page>p