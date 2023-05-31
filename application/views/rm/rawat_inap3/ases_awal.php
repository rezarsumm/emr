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
<?php date_default_timezone_set('Asia/Jakarta'); ?>
<page backtop="27mm" backbottom="10mm" backleft="2mm" backright="2mm" style="font-size:10pt">
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
            <td  style="font-size: 9px">
                     Nama : <?php echo $rs_pasien['NAMA_PASIEN']; ?><br>
                    No MR : <?php echo $rs_pasien['NO_MR']; ?><br>
                    Tgl Lahir : <?php echo date('d-M-Y', strtotime($rs_pasien['TGL_LAHIR'])); ?>
                    <hr>
                    Tgl Masuk Rawat Inap : <?php echo date('d-m-Y', strtotime($rs_pasien['TANGGAL'])); ?> / <?= date('H:i:s', strtotime($rs_pasien['JAM']));?>
                </td>
            </tr>
        </table>
    </page_header>

    <table class="content">
        <tbody>
        <col style="width: 100%;background-color: #000000;color: #ffffff;padding: 0px;font-size: 12px;">
        <tr>
            <td align="center">
                <br><strong>ASESMEN AWAL KEPERAWATAN</strong>
            </td>
        </tr>
        </tbody>
    </table>
    <table class="content">
        <col style="width: 60%;font-size: 10px;">
        <col style="width: 40%;font-size: 10px;">
        <tbody>
            <tr>
                <td style="border-left:solid 1px #000000;"><b>High Risk</b></td>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    : <b><?php echo $rs_pasien['FS_HIGH_RISK']; ?></b>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"><b>Alergi</b></td>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    : <b>
                        <?php echo $rs_pasien['FS_ALERGI']; ?>
                        </b>
                    </td>
                </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"><b>Anamnesa/Riwayat Masuk Rumah Sakit</b></td>
                <td style="border-right:solid 1px #000000;">
                    : <?= $ases2['FS_ANAMNESA']; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"><b>Pemeriksaan Fisik</b></td>
                <td style="border-right:solid 1px #000000;">
                    : <?= $ases2['FS_PEMERIKSAAN_FISIK']; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"><b>Vital Sign</b></td>
                <td style="border-right:solid 1px #000000;"></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Suhu</td>
                <td style="border-right:solid 1px #000000;">
                    : <?= $vs4['FS_SUHU'];?>
                </td> 
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Nadi</td>
                <td style="border-right:solid 1px #000000;">
                    : <?= $vs4['FS_NADI'];?> x/menit
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Respirasi</td>
                <td style="border-right:solid 1px #000000;">
                    : <?= $vs4['FS_R'];?> x/menit
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Tekanan Darah</td>
                <td style="border-right:solid 1px #000000;">
                    : <?= $vs4['FS_TD'];?> mmHg
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Tinggi Badan</td>
                <td style="border-right:solid 1px #000000;">
                    : <?= $vs4['FS_TB'];?> cm
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Berat Badan</td>
                <td style="border-right:solid 1px #000000;">
                    : <?= $vs4['FS_BB'];?> Kg
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"><b>Asesmen Nyeri</b></td>
                <td style="border-right:solid 1px #000000;"></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Ada Nyeri ?</td>
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
                    } elseif ($nyeri['FS_NYERIP'] == '2') {
                        echo "Biologik";
                    } elseif ($nyeri['FS_NYERIP'] == '3') {
                        echo "Kimiawi";
                    } elseif ($nyeri['FS_NYERIP'] == '4') {
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
                <td style="border-left:solid 1px #000000;"><b>Risiko Jatuh</b></td>
                <td style="border-right:solid 1px #000000;"></td>
            </tr>
            <?php if ($rs_pasien['fn_umur'] < '15'){?>
            <tr>
                <td style="border-left:solid 1px #000000;">Humty Dumpty Scale</td>
                <td style="border-right:solid 1px #000000;">: 
                <?php
                    if ($jatuh['FS_SCORE'] == '0') {
                        echo "-";
                    } elseif ($jatuh['FS_SCORE'] == '1') {
                        echo "7-11 (Risiko Rendah)";
                    } elseif ($jatuh['FS_SCORE'] == '2') {
                        echo ">12 (Risiko Tinggi)";
                    } elseif ($jatuh['FS_SCORE'] == '3') {
                        echo "0-24  (Risiko Rendah)";
                    } elseif ($jatuh['FS_SCORE'] == '4') {
                        echo "25-45 (Risiko Sedang)";
                    } elseif ($jatuh['FS_SCORE'] == '5') {
                        echo ">45   (Risiko Tinggi)";
                    } elseif ($jatuh['FS_SCORE'] == '6') {
                        echo "0-5  (Risiko Rendah)";
                    } elseif ($jatuh['FS_SCORE'] == '7') {
                        echo "6-16 (Risiko Sedang)";
                    } elseif ($jatuh['FS_SCORE'] == '8') {
                        echo "17-30   (Risiko Tinggi)";
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
            </tr>
            <?php } elseif ($rs_pasien['fn_umur'] >= '15' AND $rs_pasien['fn_umur'] <= '60') { ?>
            <tr>
                <td style="border-left:solid 1px #000000;">Morse Fall Scale</td>
                <td style="border-right:solid 1px #000000;">: 
                 <?php
                    if ($jatuh['FS_SCORE'] == '0') {
                        echo "-";
                    } elseif ($jatuh['FS_SCORE'] == '1') {
                        echo "7-11 (Risiko Rendah)";
                    } elseif ($jatuh['FS_SCORE'] == '2') {
                        echo ">12 (Risiko Tinggi)";
                    } elseif ($jatuh['FS_SCORE'] == '3') {
                        echo "0-24  (Risiko Rendah)";
                    } elseif ($jatuh['FS_SCORE'] == '4') {
                        echo "25-45 (Risiko Sedang)";
                    } elseif ($jatuh['FS_SCORE'] == '5') {
                        echo ">45   (Risiko Tinggi)";
                    } elseif ($jatuh['FS_SCORE'] == '6') {
                        echo "0-5  (Risiko Rendah)";
                    } elseif ($jatuh['FS_SCORE'] == '7') {
                        echo "6-16 (Risiko Sedang)";
                    } elseif ($jatuh['FS_SCORE'] == '8') {
                        echo "17-30   (Risiko Tinggi)";
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
            </tr>
            <?php } elseif ($rs_pasien['fn_umur'] < '15'){?>
             <tr>
                <td style="border-left:solid 1px #000000;">Ontario modified Stratify - Sydney Scoring</td>
                <td style="border-right:solid 1px #000000;">: 
                 <?php
                    if ($jatuh['FS_SCORE'] == '0') {
                        echo "-";
                    } elseif ($jatuh['FS_SCORE'] == '1') {
                        echo "7-11 (Risiko Rendah)";
                    } elseif ($jatuh['FS_SCORE'] == '2') {
                        echo ">12 (Risiko Tinggi)";
                    } elseif ($jatuh['FS_SCORE'] == '3') {
                        echo "0-24  (Risiko Rendah)";
                    } elseif ($jatuh['FS_SCORE'] == '4') {
                        echo "25-45 (Risiko Sedang)";
                    } elseif ($jatuh['FS_SCORE'] == '5') {
                        echo ">45   (Risiko Tinggi)";
                    } elseif ($jatuh['FS_SCORE'] == '6') {
                        echo "0-5  (Risiko Rendah)";
                    } elseif ($jatuh['FS_SCORE'] == '7') {
                        echo "6-16 (Risiko Sedang)";
                    } elseif ($jatuh['FS_SCORE'] == '8') {
                        echo "17-30   (Risiko Tinggi)";
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
            </tr>
            <?php } ?>
            <tr>
                <td style="border-left:solid 1px #000000;"><b>Riwayat Kesehatan</b></td>
                <td style="border-right:solid 1px #000000;"></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Riwayat Penyakit Dahulu</td>
                <td style="border-right:solid 1px #000000;">
                    : <?= $rs_pasien['FS_RIW_PENYAKIT_DAHULU'];?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Riwayat penyakit keluarga</td>
                <td style="border-right:solid 1px #000000;">
                    : <?= $rs_pasien['FS_RIW_PENYAKIT_DAHULU2'];?>
                </td>
            </tr>
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
                <td style="border-left:solid 1px #000000;"><b>Kebutuhan Fungsional</b></td>
                <td style="border-right:solid 1px #000000;">
                    
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Makan</td>
                <td style="border-right:solid 1px #000000;">
                    : <?php
                    if ($fungsi['FS_FUNGSIONAL1'] == '0') {
                        echo "Tidak Mampu";
                    } elseif ($fungsi['FS_FUNGSIONAL1'] == '1') {
                        echo "Butuh bantuan";
                    } elseif ($fungsi['FS_FUNGSIONAL1'] == '2') {
                        echo "Mandiri";
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Mandi</td>
                <td style="border-right:solid 1px #000000;">
                    : <?php
                    if ($fungsi['FS_FUNGSIONAL2'] == '0') {
                        echo "Tergantung orang lain";
                    } elseif ($fungsi['FS_FUNGSIONAL2'] == '1') {
                        echo "Mandiri";
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Perawatan diri</td>
                <td style="border-right:solid 1px #000000;">
                    : <?php
                    if ($fungsi['FS_FUNGSIONAL3'] == '0') {
                        echo "Membutuhkan bantuan orang lain";
                    } elseif ($fungsi['FS_FUNGSIONAL3'] == '1') {
                        echo "Mandiri";
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Berpakaian</td>
                <td style="border-right:solid 1px #000000;">
                    : <?php
                    if ($fungsi['FS_FUNGSIONAL4'] == '0') {
                        echo "Membutuhkan bantuan orang lain";
                    } elseif ($fungsi['FS_FUNGSIONAL4'] == '1') {
                        echo "Sebagian dibantu";
                    } elseif ($fungsi['FS_FUNGSIONAL4'] == '2') {
                        echo "Mandiri";
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Buang air kecil</td>
                <td style="border-right:solid 1px #000000;">
                    : <?php
                    if ($fungsi['FS_FUNGSIONAL5'] == '0') {
                        echo "Tidak terkontrol atau pakai kateter";
                    } elseif ($fungsi['FS_FUNGSIONAL5'] == '1') {
                        echo "Kadang inkontensia";
                    } elseif ($fungsi['FS_FUNGSIONAL5'] == '2') {
                        echo "Kontensia / teratur (lebih dari 7 hari)";
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Buang air besar</td>
                <td style="border-right:solid 1px #000000;">
                    : <?php
                    if ($fungsi['FS_FUNGSIONAL6'] == '0') {
                        echo "Inkontensia (Tidak teratur atau perlu)";
                    } elseif ($fungsi['FS_FUNGSIONAL6'] == '1') {
                        echo "Kadang inkontensia (sekali seminggu)";
                    } elseif ($fungsi['FS_FUNGSIONAL6'] == '2') {
                        echo "Kontensia (teratur)";
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Penggunaan toilet</td>
                <td style="border-right:solid 1px #000000;">
                    : <?php
                    if ($fungsi['FS_FUNGSIONAL7'] == '0') {
                        echo "Tergantung";
                    } elseif ($fungsi['FS_FUNGSIONAL7'] == '1') {
                        echo "Membutuhkan bantuan, tapi dapat melakukan beberapa hal sendiri";
                    } elseif ($fungsi['FS_FUNGSIONAL7'] == '2') {
                        echo "Mandiri";
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Transfer</td>
                <td style="border-right:solid 1px #000000;">
                    : <?php
                    if ($fungsi['FS_FUNGSIONAL8'] == '0') {
                        echo "Tidak mampu";
                    } elseif ($fungsi['FS_FUNGSIONAL8'] == '1') {
                        echo "Butuh bantuan untuk bisa duduk (2 Orang)";
                    } elseif ($fungsi['FS_FUNGSIONAL8'] == '2') {
                        echo "Bantuan kecil (1 orang)";
                    } elseif ($fungsi['FS_FUNGSIONAL8'] == '3') {
                        echo "Mandiri";
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Mobilitas</td>
                <td style="border-right:solid 1px #000000;">
                    : <?php
                    if ($fungsi['FS_FUNGSIONAL9'] == '0') {
                        echo "Immobile (tidak mampu)";
                    } elseif ($fungsi['FS_FUNGSIONAL9'] == '1') {
                        echo "Menggunakan kursi roda";
                    } elseif ($fungsi['FS_FUNGSIONAL9'] == '2') {
                        echo "Berjalan dengan bantuan satu orang";
                    } elseif ($fungsi['FS_FUNGSIONAL9'] == '3') {
                        echo "Mandiri (meskipun menggunakan alat bantu seperti tongkat)";
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Naik turun tangga</td>
                <td style="border-right:solid 1px #000000;">
                    : <?php
                    if ($fungsi['FS_FUNGSIONAL10'] == '0') {
                        echo "Tidak mampu";
                    } elseif ($fungsi['FS_FUNGSIONAL10'] == '1') {
                        echo "Butuh bantuan untuk bisa duduk (2 Orang)";
                    } elseif ($fungsi['FS_FUNGSIONAL10'] == '2') {
                        echo "Bantuan kecil (1 orang)";
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
                <td style="border-left:solid 1px #000000;">Bantuan Pemenuhan Kebutuhan Spiritual</td>
                <td style="border-right:solid 1px #000000;">
                    : 
                        <?php foreach ($spiritual as $data_spirit){?>
                    <?php echo $data_spirit['FS_NM_SPIRITUAL']; ?>,
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"><b>Kebutuhan Edukasi</b></td>
                <td style="border-right:solid 1px #000000;">

                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Edukasi</td>
                <td style="border-right:solid 1px #000000;">
                    :  <?php foreach ($edukasi as $data_edu){?>
                    <?php echo $data_edu['FS_NM_EDUKASI']; ?>,
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"><b>Scrinning Discharge Planning</b></td>
                <td style="border-right:solid 1px #000000;">

                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Discharge Planning</td>
                <td style="border-right:solid 1px #000000;">
                    : <?php foreach ($planing as $data_plan){?>
                    <?php echo $data_plan['FS_NM_PLANNING']; ?>,
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"><b>Keperawatan</b></td>
                <td style="border-right:solid 1px #000000;">
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Masalah Keperawatan</td>
                <td style="border-right:solid 1px #000000;">
                    :
                    <?php foreach ($masalah_kep as $data_masalah){?>
                    <?php echo $data_masalah['FS_NM_DIAGNOSA']; ?>,
                    <?php } ?>
                </td>
            </tr>
             <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align: center;"></td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;text-align: center;">
                    Tanggal <?= date('d-m-Y', strtotime($vs['mdd']));?> Jam <?= $vs['FS_JAM_TRS'];?>
                    <br><br>
                    <qrcode value="<?= $vs['NAMALENGKAP']; ?> pada <?= $vs['mdd']; ?> <?= $vs['FS_JAM_TRS']; ?>" ec="H" style="width: 15mm; background-color: white; color: black;"></qrcode>
           
                    <br><br>
                    <?= $vs['NAMALENGKAP']; ?>
                </td>
            </tr>
        </tbody>
    </table>
</page>