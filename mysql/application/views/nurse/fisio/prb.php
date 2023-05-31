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
<?php
date_default_timezone_set('Asia/Jakarta');
$dayList = array(
    'Sun' => 'Minggu',
    'Mon' => 'Senin',
    'Tue' => 'Selasa',
    'Wed' => 'Rabu',
    'Thu' => 'Kamis',
    'Fri' => 'Jumat',
    'Sat' => 'Sabtu'
);
?>
<page orientation="P" backtop="15mm" backbottom="10mm" backleft="15mm" backright="10mm" style="font-size:9pt">
    <page_header>
        <table class="page_header">
            <tr>
                <td style="width:10%;border-bottom:solid 1px #000000;" >
                    <img src="<?php base_url() ?>resource/doc/images/icon/logo.png" width="70" height="70" />
                </td>
                <td style="width:90%;text-align: center;border-bottom:solid 1px #000000;">
                    <h3><?= $header1['pref_value']; ?></h3>
                    <h5><?= $header2['pref_value']; ?></h5>
                </td>
            </tr>
        </table>
    </page_header>
    <br><br>
    <table class="content">
        <tbody>
        <col style="width: 100%;padding: 0px;font-size: 17px;">
        <tr>
            <td align="center">
        <br><u><strong>SURAT KETERANGAN</strong></u><br>
        NO <?= $rs_skdp['FS_NO_SKDP']; ?>/<?= $rs_pasien['FS_KD_LAYANAN_BPJS'] ?>/<?= date('m'); ?>/<?= date('Y'); ?>
        </td>
        </tr>
        </tbody>
    </table>
    <br> <br>
    <table class="content">
        <col style="width: 30%;font-size: 15px;">
        <col style="width: 70%;font-size: 15px;">
        <tbody>
            <tr>
                <td>No RM</td>
                <td>
                    : <?= $rs_pasien['FS_MR']; ?>
                </td>

            </tr>
            <tr>
                <td>Nama</td>
                <td>
                    : <?= $rs_pasien['FS_NM_PASIEN']; ?>
                </td>

            </tr>
            <tr>
                <td>Diagnosa</td>
                <td>
                    : <?= strip_tags($result['FS_DIAGNOSA']); ?>
                </td>

            </tr>
            <tr>
                <td>Tanggal Surat Rujukan</td>
                <td>
                    : <?php
                    if (empty($result['FD_TGL_RUJUKAN'])) {
                        echo '-';
                    } else {

                        echo $dayList[date('D', strtotime($result['FD_TGL_RUJUKAN']))] . ',' . date('d M Y', strtotime($result['FD_TGL_RUJUKAN']));
                    }
                    ?>
                </td>

            </tr>
            <tr>
                <td colspan="2"> <br><br>Bahwa pasien tersebut sudah tidak indikasi di lakukan Fisioterapi dengan alasan:</td>

            </tr>
            <tr>
                <td colspan="2">
                    <b><?= $rs_skdp['FS_SKDP_KET']; ?></b>
                </td>

            </tr>
        </tbody>
    </table>
    <br><br>
    <table class="content">
        <col style="width: 25%;font-size: 15px;">
        <col style="width: 25%;font-size: 15px;">
        <col style="width: 50%;font-size: 15px;">
        <tbody>

            <tr>
        <br>
        <br>

        <td align="center">
            <?php
            if ($result['FS_OBAT_PROLANIS'] == '1') {
                echo "<b><u>PROGRAM OBAT PROLANIS</u></b>";
            } else {
                echo "";
            }
            ?>
        </td>
        <td></td>
        <td align='center'><?= $alamat['pref_value']; ?>, <?= date('d M Y', strtotime($result['mdd'])); ?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td align='center'>
                <qrcode value="<?= $result['FS_NM_PEG']; ?> pada <?= $result['mdd']; ?>" ec="H" style="width: 15mm; background-color: white; color: black;"></qrcode>
                    
        <br>
        </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td align='center'>
                <?= $result['FS_NM_PEG']; ?>

               
        </td>
        </tr>
        </tbody>
    </table>
</page>
 <?php if ($ceklabskdp >= '1') { ?>
            <page orientation="P" backtop="1mm" backbottom="10mm" backleft="15mm" backright="10mm">
                <table class="content">
                    <tbody>
                    <col style="width: 100%;padding: 0px;font-size: 12px;">
                    <tr>
                        <td align="center">
                            <br><strong>RS PKU MUHAMMADIYAH GAMPING</strong>
                            <br><strong>Jl. Wates Km 5,5 Gamping Sleman Yogyakarta</strong>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <hr>
                <table class="content">
                    <col style="width: 25%;font-size: 12px;">
                    <col style="width: 25%;font-size: 12px;">
                    <col style="width: 25%;font-size: 12px;">
                    <col style="width: 25%;font-size: 12px;">
                    <tbody>
                        <tr>
                            <td align="center" rowspan="4">
                                <b>PERMINTAAN PEMERIKSAAN PENUNJANG</b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Nama : <?= $rs_pasien['FS_NM_PASIEN']; ?></td>
                            <td>No. RM : <?= $rs_pasien['MR']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir : <?= date('d-m-Y',  strtotime($rs_pasien['FD_TGL_LAHIR'])); ?></td>
                            <td>Jk : <?php
                                if ($rs_pasien['FS_JNS_KELAMIN'] == '0') {
                                    echo "Laki-Laki";
                                } else {
                                    echo "Perempuan";
                                }
                                ?></td>
                            <td>Bagian : <?= $rs_pasien['FS_NM_LAYANAN']; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3">Alamat : <?= $rs_pasien['FS_ALM_PASIEN']; ?></td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <table class="content">
                    <col style="width: 30%;font-size: 12px;">
                    <col style="width: 70%;font-size: 12px;">
                    <tbody>
                        <tr>
                            <td colspan="2">Assalamu'alaikum Wr. Wb.</td>
                        </tr>
                        <tr>
                            <td>Pemeriksaan Penunjang yang diminta</td>
                            <td>:
                                <?php
                                foreach ($rs_lab as $lab) {
                                    echo $lab['FS_NM_TARIF'] . ",<br>";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>KETERANGAN KLINIK PENDERITA</b></td>
                        </tr>
                        <tr>
                            <td>Diagnosa</td>
                            <td>
                                : <?= strip_tags($result['FS_DIAGNOSA']); ?>
                            </td>

                        </tr>
                        <tr>
                            <td>Alergi</td>
                            <td>
                                : <?= $rs_pasien['FS_ALERGI']; ?>
                            </td>

                        </tr>
                        <tr>
                            <td>High Risk</td>
                            <td>
                                : <?= $rs_pasien['FS_HIGH_RISK']; ?>
                            </td>

                        </tr>
                        <tr>
                            <td colspan="2"><br>Wassalamu'alaikum Wr. Wb<br></td>

                        </tr>
                        <tr>
                            <td colspan="2"><br><b>Pemeriksaan penunjang ini di gunakan untuk tanggal : <?= $dayList[date('D', strtotime($rs_skdp['FS_SKDP_KONTROL']))] . ',' . date('d M Y', strtotime($rs_skdp['FS_SKDP_KONTROL'])); ?></b><br></td>

                        </tr>
                    </tbody>
                </table>
                <table class="content">
                    <col style="width: 50%;font-size: 12px;">
                    <col style="width: 50%;font-size: 12px;">
                    <tbody> 
                        <tr>
                    <br>
                    <br>
                    <td></td>
                    <td align='center'><?= $alamat['pref_value']; ?>, <?= $result['mdd']; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align='center'>
                    <qrcode value="<?= $result['FS_NM_PEG']; ?> pada <?= $result['mdd']; ?>" ec="H" style="width: 15mm; background-color: white; color: black;"></qrcode>
                    <br>
                    </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align='center'>
                            <?= $result['FS_NM_PEG']; ?>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </page>
        <?php } ?>
        <?php if ($cekradskdp >= '1') { ?>
            <page orientation="P" backtop="1mm" backbottom="10mm" backleft="15mm" backright="10mm">
                <table class="content">
                    <tbody>
                    <col style="width: 100%;padding: 0px;font-size: 14px;">
                    <tr>
                        <td align="center">
                            <br><strong>RS PKU MUHAMMADIYAH GAMPING</strong>
                            <br><strong>Jl. Wates Km 5,5 Gamping Sleman Yogyakarta</strong>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <hr>
                <table class="content">
                    <col style="width: 25%;font-size: 12px;">
                    <col style="width: 25%;font-size: 12px;">
                    <col style="width: 25%;font-size: 12px;">
                    <col style="width: 25%;font-size: 12px;">
                    <tbody>
                        <tr>
                            <td align="center" rowspan="4">
                                <b>PERMINTAAN PEMERIKSAAN PENUNJANG</b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Nama : <?= $rs_pasien['FS_NM_PASIEN']; ?></td>
                            <td>No. RM : <?= $rs_pasien['MR']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir : <?= date('d-m-Y',  strtotime($rs_pasien['FD_TGL_LAHIR'])); ?></td>
                            <td>Jk : <?php
                                if ($rs_pasien['FS_JNS_KELAMIN'] == '0') {
                                    echo "Laki-Laki";
                                } else {
                                    echo "Perempuan";
                                }
                                ?></td>
                            <td>Bagian : <?= $rs_pasien['FS_NM_LAYANAN']; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3">Alamat : <?= $rs_pasien['FS_ALM_PASIEN']; ?></td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <table class="content">
                    <col style="width: 30%;font-size: 12px;">
                    <col style="width: 70%;font-size: 12px;">
                    <tbody>
                        <tr>
                            <td colspan="2">Assalamu'alaikum Wr. Wb.</td>
                        </tr>
                        <tr>
                            <td>Pemeriksaan Penunjang yang diminta</td>
                            <td>:
                                <?php
                                foreach ($rs_rad as $rad) {
                                    echo $rad['FS_NM_TARIF'] . ",<br>";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>KETERANGAN KLINIK PENDERITA</b></td>
                        </tr>
                        <tr>
                            <td>Diagnosa</td>
                            <td>
                                : <?= strip_tags($result['FS_DIAGNOSA']); ?>
                            </td>

                        </tr>
                        <tr>
                            <td>Alergi</td>
                            <td>
                                : <?= $rs_pasien['FS_ALERGI']; ?>
                            </td>

                        </tr>
                        <tr>
                            <td>High Risk</td>
                            <td>
                                : <?= $rs_pasien['FS_HIGH_RISK']; ?>
                            </td>

                        </tr>
                        <tr>
                            <td colspan="2"><br>Wassalamu'alaikum Wr. Wb<br></td>

                        </tr>
                        <tr>
                            <td colspan="2"><br><b>Pemeriksaan penunjang ini di gunakan untuk tanggal : <?= $dayList[date('D', strtotime($rs_skdp['FS_SKDP_KONTROL']))] . ',' . date('d M Y', strtotime($rs_skdp['FS_SKDP_KONTROL'])); ?></b><br></td>

                        </tr>
                    </tbody>
                </table>
                <table class="content">
                    <col style="width: 50%;font-size: 12px;">
                    <col style="width: 50%;font-size: 12px;">
                    <tbody> 
                        <tr>
                    <br>
                    <br>
                    <td></td>
                    <td align='center'><?= $alamat['pref_value']; ?>, <?= $result['mdd']; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align='center'>
                    <qrcode value="<?= $result['FS_NM_PEG']; ?> pada <?= $result['mdd']; ?>" ec="H" style="width: 15mm; background-color: white; color: black;"></qrcode>
                    <br>
                    </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align='center'>
    <?= $result['FS_NM_PEG']; ?>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </page>
<?php } ?>