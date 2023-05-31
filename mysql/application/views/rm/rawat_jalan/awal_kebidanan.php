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
            <tr>
                <td style="width:10%;">
                    <img src="<?php base_url() ?>resource/doc/images/icon/logo.png" width="70" height="70" />
                </td>
                <td style="width:45%;text-align: center;">
                    <h3><?= $header1['pref_value'];?></h3>
                    <h5><?= $header2['pref_value'];?></h5>
                </td>
                <td style="width:45%;" valign="top">
                    Nama : <?php echo $rs_pasien['FS_NM_PASIEN']; ?><br>
                    No MR : <?php echo $rs_pasien['FS_MR']; ?><br>
                    Tgl Lahir : <?php echo date('d-M-Y', strtotime($rs_pasien['FD_TGL_LAHIR'])); ?>
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
    <table class="content">
        <tbody>
        <col style="width: 100%;background-color: #000000;color: #ffffff;padding: 0px;font-size: 12px;">
        <tr>
            <td align="center">
                <br><strong>ASESMEN RAWAT JALAN KEBIDANAN DAN KANDUNGAN</strong>
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
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000; ">Tanggal Kunjungan</td>
                <td style="border-bottom:solid 1px #000000;">
                    : <?php echo date('d-M-Y', strtotime($rs_pasien['FD_TGL_MASUK'])); ?>
                </td>
                <td style="border-bottom:solid 1px #000000; ">Klinik Tujuan</td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;">
                    : <?= $rs_pasien['FS_NM_LAYANAN']; ?>
                </td>
            </tr>
             <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000; "><b>High Risk</b></td>
                <td style="border-bottom:solid 1px #000000;">
                    : <b><?php echo $rs_pasien['FS_HIGH_RISK']; ?></b>
                </td>
                <td style="border-bottom:solid 1px #000000; "><b>Alergi</b></td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;">
                    : <b>
                        <?php echo $rs_pasien['FS_ALERGI']; ?>
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
                <td style="font-size: 12px;border-bottom:solid 1px #000000;" colspan="2"><b>ASESMEN BIDAN</b></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"><b>Identitas Suami</b></td>
                <td style="border-right:solid 1px #000000;"></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Nama</td>
                <td style="border-right:solid 1px #000000;">
                    : <?= $bidan['FS_NM_SUAMI']?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Tanggal Lahir</td>
                <td style="border-right:solid 1px #000000;">
                    : <?= $bidan['FS_TGL_LAHIR_SUAMI']?>
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
                    if ($nyeri['FS_NYERIR'] == '0') {
                        echo "0";
                    } elseif ($nyeri['FS_NYERIR'] == '1') {
                        echo "1";
                    } elseif ($nyeri['FS_NYERIR'] == '2') {
                        echo "2";
                    } elseif ($nyeri['FS_NYERIR'] == '3') {
                        echo "3";
                    } elseif ($nyeri['FS_NYERIR'] == '4') {
                        echo "4";
                    } elseif ($nyeri['FS_NYERIR'] == '5') {
                        echo "5";
                    } elseif ($nyeri['FS_NYERIR'] == '6') {
                        echo "6";
                    } elseif ($nyeri['FS_NYERIR'] == '7') {
                        echo "7";
                    } elseif ($nyeri['FS_NYERIR'] == '8') {
                        echo "8";
                    } elseif ($nyeri['FS_NYERIR'] == '9') {
                        echo "9";
                    } elseif ($nyeri['FS_NYERIR'] == '10') {
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
                    : <?php echo $rs_pasien['FS_RIW_PENYAKIT_DAHULU']; ?>
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
            <?php if ($rs_pasien['FS_KD_LAYANAN'] == 'P003' || $rs_pasien['FS_KD_LAYANAN2'] == 'P003'|| $rs_pasien['FS_KD_LAYANAN3'] == 'P003'){
                ?>
            <tr>
                <td style="border-left:solid 1px #000000;">Riwayat Imunisasi</td>
                <td style="border-right:solid 1px #000000;">
                    : <?php
                    if ($ases2['FS_RIW_IMUNISASI'] == '1') {
                        echo "Lengkap";
                    } elseif ($ases2['FS_RIW_IMUNISASI'] == '2') {
                        echo "Kurang".",".$ases2['FS_RIW_IMUNISASI_KET'];
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
                        echo "Ada Gangguan".",".$ases2['FS_RIW_TUMBUH_KET'];
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
                    }  else {
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
                    }  else {
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
                    }  else {
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
                    }  else {
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
                <td style="border-left:solid 1px #000000;"><b>Riwayat Gynekologi</b></td>
                <td style="border-right:solid 1px #000000;">
                   : <?php 
                   if($bidan['FS_RIWAYAT_GYNEKOLOGI']=='1'){
                       echo "Tidak Ada"; 
                   }elseif($bidan['FS_RIWAYAT_GYNEKOLOGI']=='2'){
                       echo $bidan['FS_RIWAYAT_GYNEKOLOGI_KET'];
                   }?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"><b>Riwayat Menstruasi</b></td>
                <td style="border-right:solid 1px #000000;"></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Umur Menarche</td>
                <td style="border-right:solid 1px #000000;">
                    : <?=$bidan['FS_RIW_MENS_UMUR_MENARCHE'];?> Tahun
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Lama Haid</td>
                <td style="border-right:solid 1px #000000;">
                    : <?=$bidan['FS_RIW_MENS_LAMA_HAID'];?> Hari
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Ganti Pembalut</td>
                <td style="border-right:solid 1px #000000;">
                    : <?=$bidan['FS_RIW_MENS_GANTI_PEMBALUT'];?> Kali/hari
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">HPM</td>
                <td style="border-right:solid 1px #000000;">
                    : <?php if($bidan['FS_RIW_MENS_HPM']=='1900-01-01'){
                     echo '-';   
                    }else{
                        echo $bidan['FS_RIW_MENS_HPM'];
                    }?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Keluhan</td>
                <td style="border-right:solid 1px #000000;">
                    : <?php if($bidan['FS_RIW_MENS_KELUHAN']=='0'){
                     echo 'Tidak Ada';   
                    }elseif($bidan['FS_RIW_MENS_KELUHAN']=='1'){
                       echo 'Disminorhe';
                    }elseif($bidan['FS_RIW_MENS_KELUHAN']=='2'){
                       echo 'Spotting';
                    }elseif($bidan['FS_RIW_MENS_KELUHAN']=='3'){
                       echo 'Menorrhagia';
                    }elseif($bidan['FS_RIW_MENS_KELUHAN']=='4'){
                       echo $bidan['FS_RIW_MENS_KELUHAN_KET'];
                   }else{
                        echo $bidan['FS_RIW_MENS_KELUHAN_KET'];
                    }?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">HPL</td>
                <td style="border-right:solid 1px #000000;">
                    : <?= $bidan['FS_RIW_MENS_HPL'];?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"><b>Riwayat KB</b></td>
                <td style="border-right:solid 1px #000000;"></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Metode KB yang pernah dipakai</td>
                <td style="border-right:solid 1px #000000;">
                    1. <?= $bidan['FS_RIW_KB_METODE_1'];?> Lama <?= $bidan['FS_RIW_KB_METODE_LAMA_1'];?> <br>
                    2. <?= $bidan['FS_RIW_KB_METODE_2'];?> Lama <?= $bidan['FS_RIW_KB_METODE_LAMA_2'];?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Komplikasi dari KB</td>
                <td style="border-right:solid 1px #000000;">
                     : <?php if($bidan['FS_RIW_KB_KOMPLIKASI']=='0'){
                     echo 'Tidak Ada';   
                    }elseif($bidan['FS_RIW_KB_KOMPLIKASI']=='1'){
                       echo 'Pendarahan';
                    }elseif($bidan['FS_RIW_KB_KOMPLIKASI']=='2'){
                       echo 'PID/Radang Panggul';
                    }elseif($bidan['FS_RIW_KB_KOMPLIKASI']=='3'){
                       echo $bidan['FS_RIW_KB_KOMPLIKASI_KET'];
                   }else{
                        echo $bidan['FS_RIW_KB_KOMPLIKASI_KET'];
                    }?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"><b>Riwayat Kehamilan,Persalinan dan Nifas Yang Lalu</b></td>
                <td style="border-right:solid 1px #000000;">
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">G</td>
                <td style="border-right:solid 1px #000000;">
                   <?= $bidan['G'];?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">P</td>
                <td style="border-right:solid 1px #000000;">
                   <?= $bidan['P'];?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">A</td>
                <td style="border-right:solid 1px #000000;">
                   <?= $bidan['A'];?>
                </td>
            </tr>
             <tr>
                <td style="border-left:solid 1px #000000;"><b>Kebidanan</b></td>
                <td style="border-right:solid 1px #000000;">
                </td>
            </tr>
             <tr>
                <td style="border-left:solid 1px #000000;">Masalah Kebidanan</td>
                <td style="border-right:solid 1px #000000;">
                    <?= $bidan['FS_MASALAH_KEBIDANAN'];?>
                </td>
            </tr>
             <tr>
                <td style="border-left:solid 1px #000000;">Rencana Kebidanan</td>
                <td style="border-right:solid 1px #000000;">
                    <?= $bidan['FS_RENCANA_KEBIDANAN'];?>
                </td>
            </tr>
             <tr>
                 <td style="border-left:solid 1px #000000;"><b>Riwayat Kehamilan,Persalinan dan Nifas Yang Lalu</b></td>
                <td style="border-right:solid 1px #000000;"></td>
            </tr>
             <tr>
                 <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2">
                     <table style="border:solid 1px #000000;" width="100%">
                         <tr>
                             <th>Tahun Partus</th>
                             <th>Tempat Partus</th>
                             <th>Umur Hamil</th>
                             <th>Jenis Persalinan</th>
                             <th>Penolong Persalinan</th>
                             <th>Penyulit</th>
                             <th>Jenis Kelamin / Berat Lahir</th>
                             <th>Keadaan Anak Sekarang</th>
                         </tr>
                         <?php foreach($rs_riw_kehamilan as $riwayat){ ?>
                         <tr>
                             <td><?= $riwayat['FS_RIW_KEHAMILAN_THN_PARTUS']; ?></td>
                             <td><?= $riwayat['FS_RIW_KEHAMILAN_TMPT_PARTUS']; ?></td>
                             <td><?= $riwayat['FS_RIW_KEHAMILAN_UMUR_HAMIL']; ?></td>
                             <td><?= $riwayat['FS_RIW_KEHAMILAN_JNS_PERSALINAN']; ?></td>
                             <td><?= $riwayat['FS_RIW_KEHAMILAN_PENOLONG_PERSALINAN']; ?></td>
                             <td><?= $riwayat['FS_RIW_KEHAMILAN_PENYULIT']; ?></td>
                             <td><?= $riwayat['FS_RIW_KEHAMILAN_JK']; ?></td>
                             <td><?= $riwayat['FS_RIW_KEHAMILAN_KEADAAN_ANAK']; ?></td>
                         </tr>
                         <?php } ?>
                     </table>
                 </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align: center;"></td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;text-align: center;">
                    Tanggal <?= $vs['mdd'];?> Jam <?= $vs['FS_JAM_TRS'];?>
                    <br><br>
                    <barcode type="C39" value="<?= $vs['user_name'];?>" style="width:30mm; height:6mm; font-size: 1mm"></barcode>
                    <br><br>
                    <?= $vs['FS_NM_PEG']; ?>
                </td>
            </tr>
        </tbody>
    </table>
</page>
    <page backtop="27mm" backbottom="10mm" backleft="2mm" backright="2mm" style="font-size:10pt">
    <page_header>
        <table class="page_header">
            <tr>
                <td style="width:10%;">
                    <img src="<?php base_url() ?>resource/doc/images/icon/logo.png" width="70" height="70" />
                </td>
                <td style="width:45%;text-align: center;">
                    <h3><?= $header1['pref_value'];?></h3>
                    <h5><?= $header2['pref_value'];?></h5>
                </td>
                <td style="width:45%;" valign="top">
                    Nama : <?php echo $rs_pasien['FS_NM_PASIEN']; ?><br>
                    No MR : <?php echo $rs_pasien['FS_MR']; ?><br>
                    Tgl Lahir : <?php echo date('d-M-Y', strtotime($rs_pasien['FD_TGL_LAHIR'])); ?>
                </td>
            </tr>
        </table>
    </page_header>
    <table class="content">
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
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><?= strip_tags($result['FS_ANAMNESA']); ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2"><b>Pemeriksaan Fisik (O)</b></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><?=  strip_tags($result['FS_CATATAN_FISIK']); ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2"><b>Diagnosa (A)</b></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><?=  strip_tags($result['FS_DIAGNOSA']); ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2"><b>Dafar Masalah</b></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><?=  strip_tags($result['FS_DAFTAR_MASALAH']); ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2"><b>Tindakan (P)</b></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><?=  strip_tags($result['FS_TINDAKAN']); ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;border-bottom:solid 1px #000000;text-align: right; ">
                    Tanggal <?= $result['mdd']; ?> Jam <?= $result['FS_JAM_TRS']; ?><br>
                    <br><br>
                    <barcode type="C39" value="<?= $result['user_name'];?>" style="width:30mm; height:6mm; font-size: 1mm"></barcode>
                    <br><br>
                    <?= $result['FS_NM_PEG']; ?>
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
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:left;border-right:solid 1px #000000;border-top:solid 1px #000000;"><?= $rad['FS_NM_TARIF']; ?></td>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;border-top:solid 1px #000000;"><?= $rad['fs_keterangan']; ?></td>
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
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:left;border-right:solid 1px #000000;border-top:solid 1px #000000;"><?= $lab['fs_nm_jenis_pemeriksaan']; ?></td>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><?= $lab['FS_HASIL']; ?></td>
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
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:left;border-right:solid 1px #000000;border-top:solid 1px #000000;"><?= $terapi['FS_NM_BARANG']; ?></td>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><?= $terapi['FN_QTY_BARANG']; ?></td>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;border-top:solid 1px #000000;">
                        <?php if ($terapi['FS_ETIKET'] == 'ADA') { ?>

                            <?= $terapi['FS_ETIKET_QTY']; ?>x sehari <?= $terapi['FS_ETIKET_HARI']; ?> <?= $terapi['FS_NM_SATUANPAKAI_ETIKET']; ?> <?= $terapi['FS_NM_CARAPAKAI_ETIKET']; ?> <?= $terapi['FS_ETIKET_CATATAN']; ?>
                        <?php } else { ?>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</page>