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
 foreach($rs_ases_medis as $h){ 
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
                
        

             <table style="float:center; padding-left: 70px"> 
                <tr style="padding-top: 1px;"> 
                    <td style="text-align: left; font-size: 8px; padding-top: 1px;"> Jl Soekarno Hatta No. 42 Mulyojati 16 B</td>
                    <td style="text-align: left; font-size: 8px; padding-top: 1px;" > Fax : (0725) 47760 </td>
                </tr>
                <tr style="padding-top: 1px;"> 
                    <td style="text-align: left; font-size: 8px; padding-top: 1px;" > Metro Barat - Kota Metro 34125 </td>
                    <td style="text-align: left; font-size: 8px;padding-top: 1px;" > e-mail : info.rsumm@gmail.com </td>
                </tr>
                <tr style="padding-top: 1px;"> 
                    <td style="text-align: left; font-size: 8px"> Telp : (0725) 49490 - 7850378</td>
                    <td style="text-align: left; font-size: 8px"> website : www.rsumm.co.id </td>

                </tr>
               
            </table>
        </td>
          <td style="width:15%;border-bottom:solid 1px #000000; float:right" >
                <img src="<?php base_url() ?>resource/doc/images/icon/kars.png" width="50" height="50" />
            </td>
            <td  style="font-size: 10px">
                
            </td>
        </tr>
    </table>

    </page_header>
      
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
                
        <col style="width: 100%; font-size: 12px;">
        <tr>
            <td align="center">
             
                 ASESMEN AWAL MEDIS 
               
            </td>
        </tr>
        </tbody>
    </table>
    <br>
     <table style="font-size:9px"> 
                    <tr> <td> Nama </td><td> : </td> <td> <?php echo $rs_pasien['NAMA_PASIEN']; ?> </td></tr>
                    <tr> <td> No MR </td><td> : </td> <td> <?php echo $rs_pasien['NO_MR']; ?> </td></tr>
                    <tr> <td> Tgl Lahir </td><td> : </td> <td>  <?php echo date('d-M-Y', strtotime($rs_pasien['TGL_LAHIR'])); ?></td></tr>
      </table>
      <br>

    <table class="content" style="font-size:10px; padding-top:40px" >
        <col style="width: 40%;font-size: 10px;">
        <col style="width: 60%;font-size: 10px;">
        <tbody>
  
            <tr>
                <td style="border-left:solid 1px #000000; border-top:solid 1px #000000;">Anamnesa</td>
                <td style="border-right:solid 1px #000000;border-top:solid 1px #000000;">
                    : <?= strip_tags($h['FS_ANAMNESA']); ?>
                </td>
            </tr>
             <tr>
                <td style="border-left:solid 1px #000000; border-top:solid 1px #000000;">Riwayat Penyakit</td>
                <td style="border-right:solid 1px #000000;border-top:solid 1px #000000;">
                    :  <?php echo $rs_pasien['FS_RIW_PENYAKIT_DAHULU']; ?>

                </td>
            </tr>

               <tr>
                <td style="border-left:solid 1px #000000; border-top:solid 1px #000000;">Riwayat Penyakit Keluarga</td>
                <td style="border-right:solid 1px #000000;border-top:solid 1px #000000;">
                    :  <?php echo $h['FS_RIW_PENYAKIT_DAHULU2']; ?>

                </td>
            </tr>

               <tr>
                <td style="border-left:solid 1px #000000; border-top:solid 1px #000000;">Riwayat Alergi</td>
                <td style="border-right:solid 1px #000000;border-top:solid 1px #000000;">
                    :  <?php echo $rs_pasien['FS_ALERGI']; ?>

                </td>
            </tr>

               <tr>
                <td style="border-left:solid 1px #000000; border-top:solid 1px #000000;"> Status Psikologis</td>
                <td style="border-right:solid 1px #000000;border-top:solid 1px #000000;">
                    :  <?php
                    if ($ases2['FS_STATUS_PSIK'] == '1') {
                        echo "Tenang";
                    } elseif ($ases2['FS_STATUS_PSIK'] == '2') {
                        echo "Cemas";
                    } elseif ($ases2['FS_STATUS_PSIK'] == '3') {
                        echo "Takut";
                    } elseif ($ases2['FS_STATUS_PSIK'] == '4') {
                        echo "Marah";
                    } elseif ($ases2['FS_STATUS_PSIK'] == '5') {
                        echo "Sedih";
                    } elseif ($ases2['FS_STATUS_PSIK'] == '6') {
                        echo $ases2['FS_STATUS_PSIK2'];
                    } else {
                        echo "-";
                    }
                    ?>

                </td>
            </tr>
              <tr>
                <td style="border-left:solid 1px #000000;">Pemeriksaan Fisik</td>
                <td style="border-right:solid 1px #000000;">
                    : <?= strip_tags($h['FS_CATATAN_FISIK']); ?>
                </td>
            </tr>
            <?php if($h['MUKOSA']!=''){?>

              <tr>
                <td style="border-left:solid 1px #000000;">Kepala Leher </td>
                <td style="border-right:solid 1px #000000;"> :
                     
                  
                </td>
            </tr>
        <?php } ?>

          <?php if($h['JVP']!=''){?>

              <tr>
                <td style="border-left:solid 1px #000000;">  
                  <table>
                         <tr><td>Konjungtiva </td><td> : <?= $h['KONJUNGTIVA'];?></td></tr>
                         <tr><td>Sklera </td><td> : <?= $h['SKELERA'];?></td></tr>
                         <tr><td>Bibir/Lidah </td><td> : <?= $h['BIBIR'];?></td></tr>
                         <tr><td> Mukosa </td><td> : <?= $h['MUKOSA'];?></td></tr>
                     </table>
                      </td>
                <td style="border-right:solid 1px #000000;">
                    
                    <table>
                         <tr><td>Deviasi Trakea </td><td> : <?= $h['DEVIASI'];?></td></tr>
                         <tr><td>JVP </td><td> : <?= $h['JVP'];?></td></tr>
                        
                     </table>
                </td>
            </tr>
        <?php } ?>

         <?php if($h['THORAX']!=''){?>

              <tr>
                <td style="border-left:solid 1px #000000;">  Thorax
                
                      </td>
                <td style="border-right:solid 1px #000000;"> : <?= $h['THORAX'];?>   
                </td>
            </tr>
        <?php } ?>
          <?php if($h['JANTUNG']!=''){?>

              <tr>
                <td style="border-left:solid 1px #000000;">  Jantung
                
                      </td>
                <td style="border-right:solid 1px #000000;"> : <?= $h['JANTUNG'];?>   
                </td>
            </tr>
        <?php } ?>
           <?php if($h['ABDOMEN']!=''){?>

              <tr>
                <td style="border-left:solid 1px #000000;">  Abdomen & Pinggang
                
                      </td>
                <td style="border-right:solid 1px #000000;"> : <?= $h['ABDOMEN'];?>, <?= $h['PINGGANG'];?>    
                </td>
            </tr>
        <?php } ?>

          <?php if($h['EKS_ATAS']!='' || $h['EKS_BAWAH']!=''){?>

              <tr>
                <td style="border-left:solid 1px #000000;">  Ekstremitas
                   </td>
                <td style="border-right:solid 1px #000000;">   
                </td>
            </tr>
        <?php } ?>

         <tr> 
                <td style="border-left:solid 1px #000000;">Rencana Pemeriksaan Lab</td>
                <td style="border-right:solid 1px #000000;"> 
                    : <?= strip_tags($h['FS_PLANNING_LAB']); ?>
                </td>
            </tr>
              <tr>
                <td style="border-left:solid 1px #000000;">Rencana Pemeriksaan Radiologi</td>
                <td style="border-right:solid 1px #000000;"> 
                    : <?= strip_tags($h['FS_PLANNING_RAD']); ?>
                </td>
            </tr>


            <tr>
                <td style="border-left:solid 1px #000000;">Diagnosa</td>
                <td style="border-right:solid 1px #000000;">
                    : <?= strip_tags($h['FS_DIAGNOSA']); ?>
                </td>
            </tr> 
            <tr>
                <td style="border-left:solid 1px #000000;">Hasil Pemeriksaan Penunjang</td>
                <td style="border-right:solid 1px #000000;">
                    <?= strip_tags($h['FS_HASIL_PEMERIKSAAN_PENUNJANG']); ?>
                </td>
            </tr>
          
            <tr>
                <td style="border-left:solid 1px #000000;">Daftar Masalah</td>
                <td style="border-right:solid 1px #000000;">
                    : <?= strip_tags($h['FS_DAFTAR_MASALAH']); ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Rencana Tindakan</td>
                <td style="border-right:solid 1px #000000;">
                    : <?= strip_tags($h['FS_TINDAKAN']); ?>
                </td>
            </tr>
           <!--  <tr>
                <td style="border-left:solid 1px #000000;">Rencana Pemeriksaan Penunjang</td>
                <td style="border-right:solid 1px #000000;"> 
                    : <?= strip_tags($h['FS_PLANNING']); ?>
                </td>
            </tr> -->
            
            <tr>
                <td style="border-left:solid 1px #000000;">Terapi</td>
                <td style="border-right:solid 1px #000000; font-size: 8px;">
                    : <?php echo str_replace("\n", "<br> ", $h['FS_TERAPI']); ?> 
                </td>
            </tr>
             <tr>
                <td style="border-left:solid 1px #000000;"></td>
                <td style="border-left:solid 1px #000000;"></td>
             </tr>
             <tr> 
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align: center;"></td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;text-align: center;">
                    Tanggal <?= $h['mdd'];?> Jam <?= $h['FS_JAM_TRS'];?>
                    <br><br>
                    <qrcode value="<?= $h['NAMALENGKAP']; ?> pada <?= $h['mdd']; ?>" ec="H" style="width: 10mm; background-color: white; color: black;"></qrcode>
                    <br><br>
                    <?= $h['NAMALENGKAP']; ?>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <br>
   <div class="d" style=" font-size: 10px;"> Catatan untuk Pasien : <?=$h['FS_PESAN'];?></div>
</page> 


<?php } if ($cekrajal >= '1') { ?>
    <page orientation="P" backtop="1mm" backbottom="10mm" >
       
      <!--   <table>
        <tr>
            <td style="width:10%;border-bottom:solid 1px #000000; float: left" >
                <img src="<?php base_url() ?>resource/doc/images/icon/logo.png" width="50" height="50" />
            </td>
          
            <td style="width:75%;text-align: center;border-bottom:solid 1px #000000;">
                <h5>MAJELIS PEMBINA KESEHATAN UMUM
                <br>RSU MUHAMMADIYAH METRO</h5>
                
           

             <table style="float:center; padding-left: 60px; padding-top: 0px;"> 
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
    </table> -->

      
       
       
   
    <br>
    <table class="content">
        <col style="width: 60%;font-size: 10px;">
        <col style="width: 40%;font-size: 10px;">
        <tbody>
            <tr>
                <td style="font-size: 10px;border-bottom:solid 1px #000000;" colspan="2"><b>ASESMEN KEPERAWATAN</b></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"><b>Vital Sign</b></td>
                <td style="border-right:solid 1px #000000;">

                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Suhu</td>
                <td style="border-right:solid 1px #000000;">
                    : <?= $vs['FS_SUHU'] ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Nadi</td>
                <td style="border-right:solid 1px #000000;">
                    :  <?= $vs['FS_NADI'] ?> x/menit
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">R</td>
                <td style="border-right:solid 1px #000000;">
                    :  <?= $vs['FS_R'] ?> x/menit
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">TD</td>
                <td style="border-right:solid 1px #000000;">
                    :  <?= $vs['FS_TD'] ?> mmHg
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Tinggi Badan</td>
                <td style="border-right:solid 1px #000000;">
                    :  <?= $vs['FS_TB'] ?> cm
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Berat Badan</td>
                <td style="border-right:solid 1px #000000;">
                    : <?= $vs['FS_BB'] ?> Kg
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"><b>Asesmen Nyeri</b></td>
                <td style="border-right:solid 1px #000000;">
                    : <?php
                    if ($nyeri['FS_NYERI'] == '0') {
                        echo "Tidak Ada Nyeri";
                    } elseif ($nyeri['FS_NYERI'] == '1') {
                        echo "Ada Nyeri";
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Provoke</td>
                <td style="border-right:solid 1px #000000;">
                    : <?php
                    if ($nyeri['FS_NYERIP'] == '0') {
                        echo "Tidak Ada";
                    } elseif ($nyeri['FS_NYERIP'] == '1') {
                        echo "Biologik";
                    } elseif ($nyeri['FS_NYERIP'] == '2') {
                        echo "Kimiawi";
                    } elseif ($nyeri['FS_NYERIP'] == '3') {
                        echo "Mekanik / Rudapaksa";
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Quality</td>
                <td style="border-right:solid 1px #000000;">
                    : <?php
                    if ($nyeri['FS_NYERIQ'] == '0') {
                        echo "Tidak Ada";
                    } elseif ($nyeri['FS_NYERIQ'] == '1') {
                        echo "Seperti Di Tusuk-Tusuk";
                    } elseif ($nyeri['FS_NYERIQ'] == '2') {
                        echo "Seperti Terbakar";
                    } elseif ($nyeri['FS_NYERIQ'] == '3') {
                        echo "Seperti Tertimpa Beb";
                    } elseif ($nyeri['FS_NYERIQ'] == '4') {
                        echo "Ngilu";
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Regio</td>
                <td style="border-right:solid 1px #000000;">
                    : <?= $nyeri['FS_NYERIR']; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Severity</td>
                <td style="border-right:solid 1px #000000;">
                    : <?php
                    if ($nyeri['FS_NYERIS'] == '0') {
                        echo "0";
                    } elseif ($nyeri['FS_NYERIS'] == '1') {
                        echo "1";
                    } elseif ($nyeri['FS_NYERIS'] == '2') {
                        echo "2";
                    } elseif ($nyeri['FS_NYERIS'] == '3') {
                        echo "3";
                    } elseif ($nyeri['FS_NYERIS'] == '4') {
                        echo "4";
                    } elseif ($nyeri['FS_NYERIS'] == '5') {
                        echo "5";
                    } elseif ($nyeri['FS_NYERIS'] == '6') {
                        echo "6";
                    } elseif ($nyeri['FS_NYERIS'] == '7') {
                        echo "7";
                    } elseif ($nyeri['FS_NYERIS'] == '8') {
                        echo "8";
                    } elseif ($nyeri['FS_NYERIS'] == '9') {
                        echo "9";
                    } elseif ($nyeri['FS_NYERIS'] == '10') {
                        echo "10";
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Time</td>
                <td style="border-right:solid 1px #000000;">
                    : <?php
                    if ($nyeri['FS_NYERIT'] == '0') {
                        echo "Tidak Ada";
                    } elseif ($nyeri['FS_NYERIT'] == '1') {
                        echo "Kadang-kadang";
                    } elseif ($nyeri['FS_NYERIT'] == '2') {
                        echo "Sering";
                    } elseif ($nyeri['FS_NYERIT'] == '3') {
                        echo "Menetap";
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"><b>Asesmen Jatuh</b></td>
                <td style="border-right:solid 1px #000000;"></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Cara berjalan pasien Tidak seimbang / sempoyongan / limbung</td>
                <td style="border-right:solid 1px #000000;">
                    : <?php
                    if ($jatuh['FS_CARA_BERJALAN1'] == '1') {
                        echo "YA";
                    } elseif ($jatuh['FS_CARA_BERJALAN1'] == '0') {
                        echo "TIDAK";
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Cara berjalan pasien dengan mengunakan alat bantu</td>
                <td style="border-right:solid 1px #000000;">
                    : <?php
                    if ($jatuh['FS_CARA_BERJALAN2'] == '1') {
                        echo "YA";
                    } elseif ($jatuh['FS_CARA_BERJALAN2'] == '0') {
                        echo "TIDAK";
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Menopang saat akan duduk: tampak memegang pinggiran kursi atau meja / benda lain sebagai penopang saat akan duduk.</td>
                <td style="border-right:solid 1px #000000;">
                    : <?php
                    if ($jatuh['FS_CARA_DUDUK'] == '1') {
                        echo "YA";
                    } elseif ($jatuh['FS_CARA_DUDUK'] == '0') {
                        echo "TIDAK";
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Kesimpulan</td>
                <td style="border-right:solid 1px #000000;"><strong>
                    : <?php
                    $kesimpulan = $jatuh['FS_CARA_BERJALAN1'] + $jatuh['FS_CARA_BERJALAN2'] + $jatuh['FS_CARA_DUDUK'];
                    if ($kesimpulan <= '1') {
                        echo "RESIKO RENDAH";
                    } elseif ($kesimpulan == '2') {
                        echo "RESIKO SEDANG";
                    } elseif ($kesimpulan >= '3') {
                        echo "RESIKO TINGGI";
                    } else {
                        echo "-";
                    }
                    ?>
                </strong></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"><b>Riwayat Kesehatan</b></td>
                <td style="border-right:solid 1px #000000;"></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Riwayat Penyakit Dahulu</td>
                <td style="border-right:solid 1px #000000;">
                    : 
                    <?php echo $rs_pasien['FS_RIW_PENYAKIT_DAHULU']; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Riwayat penyakit keluarga</td>
                <td style="border-right:solid 1px #000000;">
                    : <?php
                    if ($ases2['FS_RIW_PENYAKIT_KEL'] == '1') {
                        echo "Hipertensi";
                    } elseif ($ases2['FS_RIW_PENYAKIT_KEL'] == '2') {
                        echo "TB Paru";
                    } elseif ($ases2['FS_RIW_PENYAKIT_KEL'] == '3') {
                        echo $ases2['FS_RIW_PENYAKIT_KEL2'];
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
            </tr>
            <?php if ($rs_pasien['FS_KD_LAYANAN'] == 'P003' || $rs_pasien['FS_KD_LAYANAN2'] == 'P003' || $rs_pasien['FS_KD_LAYANAN3'] == 'P003') {
                ?>
                <tr>
                    <td style="border-left:solid 1px #000000;">Riwayat Imunisasi</td>
                    <td style="border-right:solid 1px #000000;">
                        : <?php
                        if ($ases2['FS_RIW_IMUNISASI'] == '1') {
                            echo "Lengkap";
                        } elseif ($ases2['FS_RIW_IMUNISASI'] == '2') {
                            echo "Kurang" . "," . $ases2['FS_RIW_IMUNISASI_KET'];
                        } else {
                            echo "-";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td style="border-left:solid 1px #000000;">Riwayat Tumbuh Kembang</td>
                    <td style="border-right:solid 1px #000000;">
                        : <?php
                        if ($ases2['FS_RIW_TUMBUH'] == '1') {
                            echo "Normal";
                        } elseif ($ases2['FS_RIW_TUMBUH'] == '2') {
                            echo "Ada Gangguan" . "," . $ases2['FS_RIW_TUMBUH_KET'];
                        } else {
                            echo "-";
                        }
                        ?>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td style="border-left:solid 1px #000000;"><b>Status Psikologis</b></td>
                <td style="border-right:solid 1px #000000;">
                    : <?php
                    if ($ases2['FS_STATUS_PSIK'] == '1') {
                        echo "Tenang";
                    } elseif ($ases2['FS_STATUS_PSIK'] == '2') {
                        echo "Cemas";
                    } elseif ($ases2['FS_STATUS_PSIK'] == '3') {
                        echo "Takut";
                    } elseif ($ases2['FS_STATUS_PSIK'] == '4') {
                        echo "Marah";
                    } elseif ($ases2['FS_STATUS_PSIK'] == '5') {
                        echo "Sedih";
                    } elseif ($ases2['FS_STATUS_PSIK'] == '6') {
                        echo $ases2['FS_STATUS_PSIK2'];
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"><b>Status Sosial</b></td>
                <td style="border-right:solid 1px #000000;">

                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Hubungan dengan anggota keluarga</td>
                <td style="border-right:solid 1px #000000;">
                    : <?php
                    if ($ases2['FS_HUB_KELUARGA'] == '1') {
                        echo "Baik";
                    } elseif ($ases2['FS_HUB_KELUARGA'] == '2') {
                        echo "Tidak Baik";
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"><b>Status Fungsional</b></td>
                <td style="border-right:solid 1px #000000;">
                    : <?php
                    if ($ases2['FS_ST_FUNGSIONAL'] == '1') {
                        echo "Mandiri";
                    } elseif ($ases2['FS_ST_FUNGSIONAL'] == '2') {
                        echo "Perlu Bantuan";
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Pengelihatan</td>
                <td style="border-right:solid 1px #000000;">
                    : <?php
                    if ($ases2['FS_PENGELIHATAN'] == '1') {
                        echo "Normal";
                    } elseif ($ases2['FS_PENGELIHATAN'] == '2') {
                        echo "Kabur";
                    } elseif ($ases2['FS_PENGELIHATAN'] == '3') {
                        echo "Kaca Mata";
                    } elseif ($ases2['FS_PENGELIHATAN'] == '4') {
                        echo "Lensa Kontak";
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Penciuman</td>
                <td style="border-right:solid 1px #000000;">
                    : <?php
                    if ($ases2['FS_PENCIUMAN'] == '1') {
                        echo "Normal";
                    } elseif ($ases2['FS_PENCIUMAN'] == '2') {
                        echo "Tidak Normal";
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Pendengaran</td>
                <td style="border-right:solid 1px #000000;">
                    : <?php
                    if ($ases2['FS_PENDENGARAN'] == '1') {
                        echo "Normal";
                    } elseif ($ases2['FS_PENDENGARAN'] == '2') {
                        echo "Tidak Normal (Kanan)";
                    } elseif ($ases2['FS_PENDENGARAN'] == '3') {
                        echo "Tidak Normal (Kiri)";
                    } elseif ($ases2['FS_PENDENGARAN'] == '4') {
                        echo "Tidak Normal (Kanan & Kiri)";
                    } elseif ($ases2['FS_PENDENGARAN'] == '5') {
                        echo "Alat Bantu Dengar (Kanan)";
                    } elseif ($ases2['FS_PENDENGARAN'] == '6') {
                        echo "Alat Bantu Dengar (Kiri)";
                    } elseif ($ases2['FS_PENDENGARAN'] == '7') {
                        echo "Alat Bantu Dengar (Kanan & Kiri)";
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"><b>Spiritual dan Kultural pasien</b></td>
                <td style="border-right:solid 1px #000000;"></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Agama</td>
                <td style="border-right:solid 1px #000000;">
                    : <?php
                    if ($ases2['FS_AGAMA'] == '1') {
                        echo "Islam";
                    } elseif ($ases2['FS_AGAMA'] == '2') {
                        echo "Kristen";
                    } elseif ($ases2['FS_AGAMA'] == '3') {
                        echo "Katholik";
                    } elseif ($ases2['FS_AGAMA'] == '4') {
                        echo "Hindu";
                    } elseif ($ases2['FS_AGAMA'] == '5') {
                        echo "Buda";
                    } elseif ($ases2['FS_AGAMA'] == '6') {
                        echo "Konghucu";
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Nilai/Kepercayaan khusus</td>
                <td style="border-right:solid 1px #000000;">
                    : <?php
                    if ($ases2['FS_NILAI_KHUSUS'] == '1') {
                        echo "Tidak Ada";
                    } elseif ($ases2['FS_NILAI_KHUSUS'] == '2') {
                        echo $ases2['FS_NILAI_KHUSUS2'];
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"><b>Keperawatan</b></td>
                <td style="border-right:solid 1px #000000;"></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Masalah Keperawatan</td>
                <td style="border-right:solid 1px #000000;">
                    : <?php foreach ($masalah_kep as $data_masalah){?>
                        <?php echo $data_masalah['FS_NM_DIAGNOSA']; ?>,
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Rencana Keperawatan</td>
                <td style="border-right:solid 1px #000000;">
                    : <?php foreach ($rencana_kep as $data_rencana){?>
                        <?php echo $data_rencana['FS_NM_REN_KEP']; ?>,
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align: center;"></td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;text-align: center;">
                    Tanggal <?= $vs['mdd']; ?> Jam <?= $vs['FS_JAM_TRS']; ?>
                    <br><br>
                    <qrcode value="<?= $vs['NAMALENGKAP']; ?> pada <?= $vs['mdd']; ?> <?= $vs['FS_JAM_TRS']; ?>" ec="H" style="width: 10mm; background-color: white; color: black;"></qrcode>
                    <br><br>
                    <?= $vs['NAMALENGKAP']; ?>
                </td>
            </tr>
        </tbody>
    </table> 
    </page>
<?php } ?>