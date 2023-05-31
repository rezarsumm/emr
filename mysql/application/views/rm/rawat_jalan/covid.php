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
                    <h3><?= $header1['pref_value']; ?></h3>
                    <h5><?= $header2['pref_value']; ?></h5>
                </td>
                <td style="width:45%;" valign="top"> </td>
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
                <br><strong>FORMULIR COVID 19</strong>
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
                    : <?php echo date('d-M-Y', strtotime($rs_pasien['FD_TGL_MASUK'])); ?>
                </td>
                <td>Klinik Tujuan</td>
                <td style="border-right:solid 1px #000000;">
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
        <col style="width: 40%;font-size: 10px;">
        <col style="width: 60%;font-size: 10px;">
        <tbody>
            <tr>
                <td style="font-size: 12px;border-bottom:solid 1px #000000;" colspan="2"><b></b></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Nama</td>
                <td style="border-right:solid 1px #000000;"> :
                    <?php echo $rs_pasien['FS_NM_PASIEN']; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">No MR</td>
                <td style="border-right:solid 1px #000000;"> :
                    <?php echo $rs_pasien['FS_MR']; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Tgl Lahir</td>
                <td style="border-right:solid 1px #000000;"> :
                    <?php echo date('d-M-Y', strtotime($rs_pasien['FD_TGL_LAHIR'])); ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Jenis Kelamin</td>
                <td style="border-right:solid 1px #000000;">
                    : <?php
                    if ($rs_pasien['FS_JNS_KELAMIN'] == '0') {
                        echo "Laki-laki";
                    } elseif ($rs_pasien['FS_JNS_KELAMIN'] == '1') {
                        echo "Perempuan";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">NIK</td>
                <td style="border-right:solid 1px #000000;">
                    :  <?= $rs_pasien['FS_KD_IDENTITAS']; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">No Telp.</td>
                <td style="border-right:solid 1px #000000;">
                    :  <?= $rs_pasien['FS_TLP_PASIEN']; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;">Alamat</td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;">
                    :  <?= $rs_pasien['FS_ALM_PASIEN']; ?>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="content">
        <col style="width: 5%;font-size: 10px;">
        <col style="width: 85%;font-size: 10px;">
        <col style="width: 10%;font-size: 10px;">
        <tbody>
            <tr>
                <td style="font-size: 12px;border-bottom:solid 1px #000000;" colspan="3"><b></b></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;border-bottom:solid 1px #000000;text-align: center;"><b>No</b></td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;text-align: center;"><b>Kriteria</b></td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;text-align: center;"><b>Hasil</b></td>
            </tr>
            <tr>
                <td style="border-bottom:solid 1px #000000;border-left:solid 1px #000000;border-right:solid 1px #000000;">1</td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                    Demam > 38 Drajat / Riwayat demam dalam 2 minggu terakhir
                </td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                    <?php
                        if ($covid['FS_PARAM_1'] == '0') {
                            echo "Tidak";
                        } elseif ($covid['FS_PARAM_1'] == '1') {
                            echo "Ya";
                        } else {
                            echo "-";
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <td style="border-bottom:solid 1px #000000;border-left:solid 1px #000000;border-right:solid 1px #000000;">2</td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                    Batuk / pilek / nyeri tenggorokan dalam 2 minggu terakhir
                </td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                   <?php
                        if ($covid['FS_PARAM_2'] == '0') {
                            echo "Tidak";
                        } elseif ($covid['FS_PARAM_2'] == '2') {
                            echo "Ya";
                        } else {
                            echo "-";
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <td style="border-bottom:solid 1px #000000;border-left:solid 1px #000000;border-right:solid 1px #000000;">3</td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                    ISPA berat / Pneumonia berat, dengan tanda / gejala :
                    <br>
                    o Remaja atau dewasa : RR > 30 Kali/menit,distress pernafasan saturasi O2 < 90%
                    <br>
                    o Anak : Batuk / sesak nafas disertai salah satu atau lebih dari : 
                    <br>
                    - Sianosis sentral, saturasi O2 < 90 %
                    <br>
                    - Distress pernafasan berat (tarikan dinding dada yang berat atau mendengkur)
                    <br>
                    - Tanda pneumonia berat (ketidak mampuan menyusu / minum, letargi, penurunan kesadaran / kejang)
                    <br>
                    - Tanda lain pneumonia (tarikan dinding dada, takipnea= < 2 bln >= 60 x/mnt,2-11 bln >= 50x/mnt, 1-5 th >= 40x/mnt, > 5 th >= 30x/mnt)
                </td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                    <?php
                        if ($covid['FS_PARAM_3'] == '0') {
                            echo "Tidak";
                        } elseif ($covid['FS_PARAM_3'] == '3') {
                            echo "Ya";
                        } else {
                            echo "-";
                        }
                        ?>
                </td>
            </tr>

            <tr>
                <td style="border-bottom:solid 1px #000000;border-left:solid 1px #000000;border-right:solid 1px #000000;">4</td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                    Tidak ada penyebab lain berdasarkan gambaran klinis yang meyakinkan
                </td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                    <?php
                        if ($covid['FS_PARAM_4'] == '0') {
                            echo "Tidak";
                        } elseif ($covid['FS_PARAM_4'] == '4') {
                            echo "Ya";
                        } else {
                            echo "-";
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <td style="border-bottom:solid 1px #000000;border-left:solid 1px #000000;border-right:solid 1px #000000;">5</td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                    Riwayat perjalanan / tinggal diluar negri dalam waktu 14 hari sebelum timbul gejala
                    <br><br>
                    Dari : ,Tgl Berangkat : ,Tgl pulang : 
                </td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                    <?php
                        if ($covid['FS_PARAM_5'] == '0') {
                            echo "Tidak";
                        } elseif ($covid['FS_PARAM_5'] == '5') {
                            echo "Ya";
                        } else {
                            echo "-";
                        }
                        ?>
                </td>
            </tr>
           
            <tr>
                <td style="border-bottom:solid 1px #000000;border-left:solid 1px #000000;border-right:solid 1px #000000;">6</td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                    Riwayat perjalanan / tinggal di area transmisi lokal dalam waktu 14 hari sebelum timbul gejala
                    <br><br>
                    Dari : ,Tgl Berangkat : ,Tgl pulang : 
                </td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                    <?php
                        if ($covid['FS_PARAM_6'] == '0') {
                            echo "Tidak";
                        } elseif ($covid['FS_PARAM_6'] == '6') {
                            echo "Ya";
                        } else {
                            echo "-";
                        }
                        ?>
                </td>
            </tr>
            
            <tr>
                <td style="border-bottom:solid 1px #000000;border-left:solid 1px #000000;border-right:solid 1px #000000;">7</td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                    Dalam 14 hari sebelum sakit memiliki riwayat kontak dengan orang-orang yang sakit saluran pernafasan seperti demam,batuk, atau pneumonia
                </td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                   <?php
                        if ($covid['FS_PARAM_7'] == '0') {
                            echo "Tidak";
                        } elseif ($covid['FS_PARAM_7'] == '7') {
                            echo "Ya";
                        } else {
                            echo "-";
                        }
                        ?>
                </td>
            </tr>
            
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;" colspan="2"><b>Kesimpulan</b></td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;">
                    <b><?= $covid['FS_KESIMPULAN']; ?></b>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align: center;" ></td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;text-align: right;" colspan="2">
                    Tanggal <?= $vs['mdd']; ?> Jam <?= $vs['FS_JAM_TRS']; ?>
                    <br><br>
        <qrcode value="<?= $vs['FS_NM_PEG']; ?> pada <?= $vs['mdd']; ?> <?= $vs['FS_JAM_TRS']; ?>" ec="H" style="width: 15mm; background-color: white; color: black;"></qrcode>
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
                    <h3><?= $header1['pref_value']; ?></h3>
                    <h5><?= $header2['pref_value']; ?></h5>
                </td>
                <td style="width:45%;" valign="top"></td>
            </tr>
        </table>
    </page_header>
    <table class="content">
        <col style="width: 40%;font-size: 10px;">
        <col style="width: 60%;font-size: 10px;">
        <tbody>
            <tr>
                <td style="font-size: 12px;border-bottom:solid 1px #000000;" colspan="2"><b>Bila kesimpulan adalah ODP atau PDP lanjutkan dengan mengisi formulir berikut</b></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2">
                    <b>Setelah sakit kontak erat dengan :</b>
                    <br>
                    <table class="content">
                        <col style="width: 33%;font-size: 10px;">
        <col style="width: 33%;font-size: 10px;">
        <col style="width: 33%;font-size: 10px;">
                        <tr>
                            <td style="border:solid 1px #000000;text-align: center;"><b>Nama</b></td>
                            <td style="border:solid 1px #000000;text-align: center;"><b>Domisili</b></td>
                            <td style="border:solid 1px #000000;text-align: center;"><b>No HP</b></td>
                        </tr>
                        <?php foreach ($covid2 as $data){?>
                        <tr>
                            <td style="border:solid 1px #000000;text-align: center;"><?= $data['FS_NM_KONTAK'];?></td>
                            <td style="border:solid 1px #000000;text-align: center;"><?= $data['FS_NM_DOMISILI'];?></td>
                            <td style="border:solid 1px #000000;text-align: center;"><?= $data['FS_NO_HP'];?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </td>
            </tr>
             <tr>
                 <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2"><b>Riwayat perawatan pasien dalam pengawasan covid</b></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Waktu Kunjungan</td>
                <td style="border-right:solid 1px #000000;"><?= $covid3['FD_TGL_KUNJUNG'];?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Tempat Kunjungan</td>
                <td style="border-right:solid 1px #000000;"><?= $covid3['FS_TEMPAT_KUNJUNG'];?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Apakah orang tersebut tersangka atau terinfeksi Covid 19 (Penumonia berat) ?</td>
                <td style="border-right:solid 1px #000000;">
                    <?php
                        if ($covid3['FS_INFEKSI'] == '0') {
                            echo "Tidak";
                        } elseif ($covid3['FS_INFEKSI'] == '1') {
                            echo "Ya";
                        } else {
                            echo "-";
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Apakah orang anggota keluarga pasien yang sakitnya sama ?</td>
                <td style="border-right:solid 1px #000000;">
                    <?php
                        if ($covid3['FS_INFEKSI2'] == '0') {
                            echo "Tidak";
                        } elseif ($covid3['FS_INFEKSI2'] == '1') {
                            echo "Ya";
                        } else {
                            echo "-";
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2">Penyakit komorbid</td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Penyakit kardiovaskular / Hypertensi ?</td>
                <td style="border-right:solid 1px #000000;">
                     <?php
                        if ($covid4['FS_KOMORBID1'] == '0') {
                            echo "Tidak";
                        } elseif ($covid4['FS_KOMORBID1'] == '1') {
                            echo "Ya";
                        } else {
                            echo "-";
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Diabetes Mellitus ?</td>
                <td style="border-right:solid 1px #000000;">
                    <?php
                        if ($covid4['FS_KOMORBID2'] == '0') {
                            echo "Tidak";
                        } elseif ($covid4['FS_KOMORBID2'] == '1') {
                            echo "Ya";
                        } else {
                            echo "-";
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Liver ?</td>
                <td style="border-right:solid 1px #000000;">
                     <?php
                        if ($covid4['FS_KOMORBID3'] == '0') {
                            echo "Tidak";
                        } elseif ($covid4['FS_KOMORBID3'] == '1') {
                            echo "Ya";
                        } else {
                            echo "-";
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Kronik Neurologi atau Neuromuskular ?</td>
                <td style="border-right:solid 1px #000000;">
                     <?php
                        if ($covid4['FS_KOMORBID4'] == '0') {
                            echo "Tidak";
                        } elseif ($covid4['FS_KOMORBID4'] == '1') {
                            echo "Ya";
                        } else {
                            echo "-";
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Immunodefisiensi / HIV ?</td>
                <td style="border-right:solid 1px #000000;">
                     <?php
                        if ($covid4['FS_KOMORBID5'] == '0') {
                            echo "Tidak";
                        } elseif ($covid4['FS_KOMORBID5'] == '1') {
                            echo "Ya";
                        } else {
                            echo "-";
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Penyakit Paru Kronik ?</td>
                <td style="border-right:solid 1px #000000;">
                     <?php
                        if ($covid4['FS_KOMORBID6'] == '0') {
                            echo "Tidak";
                        } elseif ($covid4['FS_KOMORBID6'] == '1') {
                            echo "Ya";
                        } else {
                            echo "-";
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Penyakit Ginjal ?</td>
                <td style="border-right:solid 1px #000000;">
                     <?php
                        if ($covid4['FS_KOMORBID7'] == '0') {
                            echo "Tidak";
                        } elseif ($covid4['FS_KOMORBID7'] == '1') {
                            echo "Ya";
                        } else {
                            echo "-";
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Tanggal onset gejala (panas)</td>
                <td style="border-right:solid 1px #000000;"><?= $covid4['FD_TGL_PANAS'];?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2"><b>Spesimen</b></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Spesimen yang diambil</td>
                <td style="border-right:solid 1px #000000;">
                    <?php foreach ($covid5 as $data2){?>
                    <?= $data2['FS_NM_SPESIMEN'];?>,
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Pengirim Spesimen</td>
                <td style="border-right:solid 1px #000000;">
                   <?php
                        if ($covid6['FS_SPES_PENGIRIM'] == '0') {
                            echo "Rumah Sakit";
                        } elseif ($covid6['FS_SPES_PENGIRIM'] == '1') {
                            echo "Dinas Kesehatan";
                        } else {
                            echo "-";
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Dinas Kesehatan Kab / Kota</td>
                <td style="border-right:solid 1px #000000;"> 
                    <?= $covid6['FS_SPES_DINAS']; ?>
                    Provinsi : 
                    <?= $covid6['FS_SPES_PROV']; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Rumah Sakit</td>
                <td style="border-right:solid 1px #000000;"> 
                    <?= $covid6['FS_SPES_RS']; ?>
                    Kab / Kota : 
                    <?= $covid6['RS_SPES_RS_KOTA']; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Dokter Penanggung Jawab</td>
                <td style="border-right:solid 1px #000000;"> 
                    <?= $covid6['FS_SPES_DPJP']; ?>
                    No Telp / Hp : 
                    <?= $covid6['FS_SPES_HP']; ?>
                S</td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2"><b>Tanda dan gejala saat spesimen diambil</b></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Panas atau riwayat panas >=38 C</td>
                <td style="border-right:solid 1px #000000;">
                    <?php
                        if ($covid7['FS_SPES_GEJALA1'] == '0') {
                            echo "Tidak";
                        } elseif ($covid7['FS_SPES_GEJALA1'] == '1') {
                            echo "Ya";
                        } else {
                            echo "-";
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Batuk</td>
                <td style="border-right:solid 1px #000000;">
                    <?php
                        if ($covid7['FS_SPES_GEJALA2'] == '0') {
                            echo "Tidak";
                        } elseif ($covid7['FS_SPES_GEJALA2'] == '1') {
                            echo "Ya";
                        } else {
                            echo "-";
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Sakit tenggorokan</td>
                <td style="border-right:solid 1px #000000;">
                    <?php
                        if ($covid7['FS_SPES_GEJALA3'] == '0') {
                            echo "Tidak";
                        } elseif ($covid7['FS_SPES_GEJALA3'] == '1') {
                            echo "Ya";
                        } else {
                            echo "-";
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Sesak Napas</td>
                <td style="border-right:solid 1px #000000;">
                    <?php
                        if ($covid7['FS_SPES_GEJALA4'] == '0') {
                            echo "Tidak";
                        } elseif ($covid7['FS_SPES_GEJALA4'] == '1') {
                            echo "Ya";
                        } else {
                            echo "-";
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Pilek</td>
                <td style="border-right:solid 1px #000000;">
                    <?php
                        if ($covid7['FS_SPES_GEJALA5'] == '0') {
                            echo "Tidak";
                        } elseif ($covid7['FS_SPES_GEJALA5'] == '1') {
                            echo "Ya";
                        } else {
                            echo "-";
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Lesu</td>
                <td style="border-right:solid 1px #000000;">
                    <?php
                        if ($covid7['FS_SPES_GEJALA6'] == '0') {
                            echo "Tidak";
                        } elseif ($covid7['FS_SPES_GEJALA6'] == '1') {
                            echo "Ya";
                        } else {
                            echo "-";
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Sakit kepala</td>
                <td style="border-right:solid 1px #000000;">
                    <?php
                        if ($covid7['FS_SPES_GEJALA7'] == '0') {
                            echo "Tidak";
                        } elseif ($covid7['FS_SPES_GEJALA7'] == '1') {
                            echo "Ya";
                        } else {
                            echo "-";
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Diare</td>
                <td style="border-right:solid 1px #000000;">
                    <?php
                        if ($covid7['FS_SPES_GEJALA8'] == '0') {
                            echo "Tidak";
                        } elseif ($covid7['FS_SPES_GEJALA8'] == '1') {
                            echo "Ya";
                        } else {
                            echo "-";
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Mual Muntah</td>
                <td style="border-right:solid 1px #000000;">
                    <?php
                        if ($covid7['FS_SPES_GEJALA9'] == '0') {
                            echo "Tidak";
                        } elseif ($covid7['FS_SPES_GEJALA9'] == '1') {
                            echo "Ya";
                        } else {
                            echo "-";
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2"><b>Pemeriksaan Penunjang</b></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">X Ray Paru</td>
                <td style="border-right:solid 1px #000000;">
                    <?php
                        if ($covid8['FS_PEN_XRAY'] == '0') {
                            echo "Tidak";
                        } elseif ($covid7['FS_PEN_XRAY'] == '1') {
                            echo "Ya";
                        } else {
                            echo "-";
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Ventilator</td>
                <td style="border-right:solid 1px #000000;">
                   <?php
                        if ($covid8['FS_PEN_VENT'] == '0') {
                            echo "Tidak";
                        } elseif ($covid7['FS_PEN_VENT'] == '1') {
                            echo "Ya";
                        } else {
                            echo "-";
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;">Tindak Lanjut</td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;">
                    <?php
                        if ($covid8['FS_TINDAK_LANJUT'] == '0') {
                            echo "Rawat Inap";
                        } elseif ($covid7['FS_TINDAK_LANJUT'] == '2') {
                            echo "Dirujuk";
                            } elseif ($covid7['FS_TINDAK_LANJUT'] == '3') {
                            echo "Dipulangkan";
                        } else {
                            echo "-";
                        }
                        ?>
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
            <?php foreach ($rs_rad['response'] as $rad) {
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
            <?php foreach ($rs_lab['response'] as $lab) {
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
            <?php foreach ($rs_resep['response'] as $terapi) { ?>
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