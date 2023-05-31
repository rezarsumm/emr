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
                <br><strong>ASESMEN FISIOTERAPI</strong>
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
        <col style="width: 60%;font-size: 10px;">
        <col style="width: 40%;font-size: 10px;">
        <tbody>
            <tr>
                <td style="font-size: 12px;border-bottom:solid 1px #000000;" colspan="2"></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"><b>Anamnesa</b></td>
                <td style="border-right:solid 1px #000000;">
                   : <?= $ases2['FS_ANAMNESA'];?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"><b>Catatan Edukasi</b></td>
                <td style="border-right:solid 1px #000000;">
                   : <?= $ases2['FS_EDUKASI'];?>
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
                <td style="border-left:solid 1px #000000;"><b>Riwayat Kesehatan</b></td>
                <td style="border-right:solid 1px #000000;"></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Riwayat Penyakit Dahulu</td>
                <td style="border-right:solid 1px #000000;">
                    : <?php
                    if ($ases2['FS_RIW_PENYAKIT_DAHULU'] == '1') {
                        echo "Hipertensi";
                    } elseif ($ases2['FS_RIW_PENYAKIT_DAHULU'] == '2') {
                        echo "TB Paru";
                    } elseif ($ases2['FS_RIW_PENYAKIT_DAHULU'] == '3') {
                        echo $ases2['FS_RIW_PENYAKIT_DAHULU2'];
                    } else {
                        echo "-";
                    }
                    ?>
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
            <tr>
                <td style="border-left:solid 1px #000000;"><b>Pemeriksaan Fisioterapi</b></td>
                <td style="border-right:solid 1px #000000;"></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Inspeksi</td>
                <td style="border-right:solid 1px #000000;">
                    : <?= $fisio['FS_NM_INSPEKSI']; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Palpasi</td>
                <td style="border-right:solid 1px #000000;">
                    : <?= $fisio['FS_NM_PALPASI']; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Pemeriksaan Spesifik</td>
                <td style="border-right:solid 1px #000000;">
                    : <?= $fisio['FS_NM_PEM_SPESIFIK']; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Diagnosa Fisioterapi</td>
                <td style="border-right:solid 1px #000000;">
                    : <?= $fisio['FS_NM_DIAG_FISIO']; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Intervensi</td>
                <td style="border-right:solid 1px #000000;">
                    : <?php
                    foreach ($fisio_intervensi as $data_fisio) {
                        echo $data_fisio['FS_NM_INT_UMUM'] . ',';
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"><b>Pemeriksaan Gerak Dasar Aktif</b></td>
                <td style="border-right:solid 1px #000000;"></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2">
                    <table class="content">
                        <col style="width: 33%;font-size: 10px;">
                        <col style="width: 33%;font-size: 10px;">
                        <col style="width: 33%;font-size: 10px;">
                        <tbody>
                            <tr>
                                <td><b>Gerak</b></td>
                                <td><b>ROM</b></td>
                                <td><b>Nyeri</b></td>
                            </tr> 
                            <?php foreach ($fisio1 as $dat_fisio1) { ?>
                                <tr>
                                    <td><?= $dat_fisio1['FS_NM_GERAK']; ?></td>
                                    <td><?= $dat_fisio1['FS_NM_ROM']; ?></td>
                                    <td><?= $dat_fisio1['FS_NM_NYERI']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </td>

            </tr>
            
            <tr>
                <td style="border-left:solid 1px #000000;"><b>Pemeriksaan Gerak Dasar Pasif</b></td>
                <td style="border-right:solid 1px #000000;"></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2">
                    <table class="content">
                        <col style="width: 25%;font-size: 10px;">
                        <col style="width: 25%;font-size: 10px;">
                        <col style="width: 25%;font-size: 10px;">
                        <col style="width: 25%;font-size: 10px;">
                        <tbody>
                        <td><b>Gerak</b></td>
                        <td><b>ROM</b></td>
                        <td><b>Nyeri</b></td>
                        <td><b>End Feel</b></td>

                        <?php foreach ($fisio2 as $dat_fisio2) { ?>
                            <tr>
                                <td><?= $dat_fisio2['FS_NM_GERAK_PASIF']; ?></td>
                                <td><?= $dat_fisio2['FS_NM_ROM_PASIF']; ?></td>
                                <td><?= $dat_fisio2['FS_NM_NYERI_PASIF']; ?></td>
                                <td><?= $dat_fisio2['FS_NM_END_FEEL']; ?></td>
                            </tr>
                        <?php } ?>
        </tbody>
    </table>
</td>
</tr>
<tr>
                <td style="border-left:solid 1px #000000;"><b>Pemeriksaan Gerak Dasar Isometrik</b></td>
                <td style="border-right:solid 1px #000000;"></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2">
                    <table class="content">
                        <col style="width: 50%;font-size: 10px;">
                        <col style="width: 50%;font-size: 10px;">
                        <tbody>
                        <td><b>Gerak</b></td>
                        <td><b>MMT</b></td>

                        <?php foreach ($fisio3 as $dat_fisio3) { ?>
                            <tr>
                                <td><?= $dat_fisio3['FS_NM_GERAK_ISOM']; ?></td>
                                <td><?= $dat_fisio3['FS_NM_MMT']; ?></td>
                            </tr>
                        <?php } ?>
        </tbody>
    </table>
</td>
</tr>
<tr>
    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align: center;"></td>
    <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;text-align: center;">
        Tanggal <?= $vs['mdd']; ?> Jam <?= $vs['FS_JAM_TRS']; ?>
        <br><br>
<barcode type="C39" value="<?= $vs['user_name']; ?>" style="width:30mm; height:6mm; font-size: 1mm"></barcode>
<br><br>
<?= $vs['FS_NM_PEG']; ?>
</td>
</tr>
</tbody>
</table>
</page>