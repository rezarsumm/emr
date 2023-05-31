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
                    <h4>RS PKU MUHAMMADIYAH GAMPING <br>
                        Jl. Wates KM. 5.5, Gamping, Sleman 555294</h4>
                </td>
            </tr>
        </table>
    </page_header>
    <br><br>
    <table class="content">
        <tbody>
        <col style="width: 100%;padding: 0px;font-size: 16px;">
        <tr>
            <td align="center">
        <br><u><strong>SURAT KETERANGAN PENGGUNAAN INSULIN</strong></u>
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
                <td>Tempat, Tanggal Lahir</td>
                <td>
                    : <?= $rs_pasien['FS_TEMP_LAHIR']; ?>, <?= date('d M Y', strtotime($rs_pasien['FD_TGL_LAHIR'])); ?>
                </td>

            </tr>
            <tr>
                <td>Diagnosa</td>
                <td>
                    : <?= strip_tags($rs_pasien['FS_DIAGNOSA']); ?>
                </td>

            </tr>
            <tr>
                <td colspan="2"><br><br>Riwayat Pengobatan Terakhir :</td>

            </tr>
           
            <tr>
                <td colspan="2">
                    <?= $rs_surat['FS_RIW_PENGOBATAN'] ?>
                </td>

            </tr>
            <tr>
                <td colspan="2">
                    <br><br>Surat keterangan ini digunakan untuk 1 (satu ) kali kunjungan pasien denghan diagnosa sebagaimana diatas pada tanggal
                    <b><?= date('d-m-Y',  strtotime($rs_surat['FD_TGL_PENGGUNAAN'])); ?></b>
                </td>
               

            </tr>
        </tbody>
    </table>
    <br><br>

    <table class="content">
        <col style="width: 50%;font-size: 15px;">
        <col style="width: 50%;font-size: 15px;">
        <tbody>

            <tr>
        <br>
        <br>
        <td></td>
        <td align='center'><?= $alamat['pref_value']; ?>, <?= date('d M Y', strtotime($rs_pasien['mdd'])); ?></td>
        </tr>
        <tr>
            <td></td>
            <td align='center'>
        <qrcode value="<?= $rs_pasien['FS_NM_PEG']; ?> pada <?= $rs_pasien['mdd']; ?>" ec="H" style="width: 15mm; background-color: white; color: black;"></qrcode>
                   <br>
        </td>
        </tr>
        <tr>
            <td></td>
            <td align='center'>
<?= $rs_pasien['FS_NM_PEG']; ?>
            </td>
        </tr>
        </tbody>
    </table>
</page>
<page orientation="P" backtop="15mm" backbottom="10mm" backleft="15mm" backright="10mm" style="font-size:9pt">
    <page_header>
        <table class="page_header">
            <tr>
                <td style="width:10%;border-bottom:solid 1px #000000;" >
                    <img src="<?php base_url() ?>resource/doc/images/icon/logo.png" width="70" height="70" />
                </td>
                <td style="width:90%;text-align: center;border-bottom:solid 1px #000000;">
                    <h4>RS PKU MUHAMMADIYAH GAMPING <br>
                        Jl. Wates KM. 5.5, Gamping, Sleman 555294</h4>
                </td>
            </tr>
        </table>
    </page_header>
    <br><br>
    <table class="content">
        <tbody>
        <col style="width: 100%;padding: 0px;font-size: 16px;">
        <tr>
            <td align="center">
        <br><u><strong>SURAT PERNYATAAN</strong></u>
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
                <td>Tempat, Tanggal Lahir</td>
                <td>
                    : <?= $rs_pasien['FS_TEMP_LAHIR']; ?>, <?= date('d M Y', strtotime($rs_pasien['FD_TGL_LAHIR'])); ?>
                </td>

            </tr>
            <tr>
                <td>Diagnosa</td>
                <td>
                    : <?= strip_tags($rs_pasien['FS_DIAGNOSA']); ?>
                </td>

            </tr>
            <tr>
                <td colspan="2"><br><br>Dengan ini menyatakan bahwa:<br>
                    <p>Pasien tersebut tidak terkendali dengan pemberian kombinasi Metformin dosis optimal dan obat diabetes oral lainnya. Hasil pemeriksaan HbA1C yang menunjukkan kadar HbA1C >9% (terlampir)</p>
</td>

            </tr>
           
            
            
        </tbody>
    </table>
    <br><br>

    <table class="content">
        <col style="width: 50%;font-size: 15px;">
        <col style="width: 50%;font-size: 15px;">
        <tbody>

            <tr>
        <br>
        <br>
        <td></td>
        <td align='center'><?= $alamat['pref_value']; ?>, <?= date('d M Y', strtotime($rs_pasien['mdd'])); ?></td>
        </tr>
        <tr>
            <td></td>
            <td align='center'>
        <qrcode value="<?= $rs_pasien['FS_NM_PEG']; ?> pada <?= $rs_pasien['mdd']; ?>" ec="H" style="width: 15mm; background-color: white; color: black;"></qrcode>
                   <br>
        </td>
        </tr>
        <tr>
            <td></td>
            <td align='center'>
<?= $rs_pasien['FS_NM_PEG']; ?>
            </td>
        </tr>
        </tbody>
    </table>
</page>
<page orientation="P" backtop="15mm" backbottom="10mm" backleft="15mm" backright="10mm" style="font-size:9pt">
    <page_header>
        <table class="page_header">
            <tr>
                <td style="width:10%;border-bottom:solid 1px #000000;" >
                    <img src="<?php base_url() ?>resource/doc/images/icon/logo.png" width="70" height="70" />
                </td>
                <td style="width:90%;text-align: center;border-bottom:solid 1px #000000;">
                    <h4>RS PKU MUHAMMADIYAH GAMPING <br>
                        Jl. Wates KM. 5.5, Gamping, Sleman 555294</h4>
                </td>
            </tr>
        </table>
    </page_header>
    <br><br>
    <table class="content">
        <tbody>
        <col style="width: 100%;padding: 0px;font-size: 16px;">
        <tr>
            <td align="center">
        <br><u><strong>SURAT PERNYATAAN</strong></u>
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
                <td>Tempat, Tanggal Lahir</td>
                <td>
                    : <?= $rs_pasien['FS_TEMP_LAHIR']; ?>, <?= date('d M Y', strtotime($rs_pasien['FD_TGL_LAHIR'])); ?>
                </td>

            </tr>
            <tr>
                <td>Diagnosa</td>
                <td>
                    : <?= strip_tags($rs_pasien['FS_DIAGNOSA']); ?>
                </td>

            </tr>
            <tr>
                <td colspan="2"><br><br>Dengan ini menyatakan bahwa:<br>
                    Pasien tersebut dalam kondisi khusus “Perioperatif / Hiperglikemia / Koma diabetikum “ sehingga memerlukan terapi insulin 
</td>

            </tr>
           
            
            
        </tbody>
    </table>
    <br><br>

    <table class="content">
        <col style="width: 50%;font-size: 15px;">
        <col style="width: 50%;font-size: 15px;">
        <tbody>

            <tr>
        <br>
        <br>
        <td></td>
        <td align='center'><?= $alamat['pref_value']; ?>, <?= date('d M Y', strtotime($rs_pasien['mdd'])); ?></td>
        </tr>
        <tr>
            <td></td>
            <td align='center'>
        <qrcode value="<?= $rs_pasien['FS_NM_PEG']; ?> pada <?= $rs_pasien['mdd']; ?>" ec="H" style="width: 15mm; background-color: white; color: black;"></qrcode>
                   <br>
        </td>
        </tr>
        <tr>
            <td></td>
            <td align='center'>
<?= $rs_pasien['FS_NM_PEG']; ?>
            </td>
        </tr>
        </tbody>
    </table>
</page>