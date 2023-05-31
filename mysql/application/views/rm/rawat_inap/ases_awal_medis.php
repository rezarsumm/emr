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
                    <h3><?= $header1['pref_value']; ?></h3>
                    <h5><?= $header2['pref_value']; ?></h5>
                </td>
                <td valign="top">
                    Nama : <?php echo $rs_pasien['FS_NM_PASIEN']; ?><br>
                    No MR : <?php echo $rs_pasien['FS_MR']; ?><br>
                    Tgl Lahir : <?php echo date('d-M-Y', strtotime($rs_pasien['FD_TGL_LAHIR'])); ?>
                    <hr>
                    Tgl Masuk Rawat Inap : <?php echo date('d-m-Y', strtotime($rs_pasien['FD_TGL_MASUK'])); ?> / <?= $rs_pasien['FS_JAM_MASUK'];?>
                </td>
            </tr>
        </table>
    </page_header>

    <table class="content">
        <tbody>
        <col style="width: 100%;background-color: #000000;color: #ffffff;padding: 0px;font-size: 12px;">
        <tr>
            <td align="center">
                <br><strong>ASESMEN AWAL MEDIS</strong>
            </td>
        </tr>
        </tbody>
    </table>
    <table class="content">
        <col style="width: 40%;font-size: 12px;">
        <col style="width: 60%;font-size: 12px;">
        <tbody>
            <tr>
                <td style="border-left:solid 1px #000000;">Anamnesa / Allow Anamnesa</td>
                <td style="border-right:solid 1px #000000;">
                    : <?= strip_tags($rs_ases_medis['FS_ANAMNESA']); ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Diagnosa</td>
                <td style="border-right:solid 1px #000000;">
                    : <?= strip_tags($rs_ases_medis['FS_DIAGNOSA']); ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Hasil Pemeriksaan Penunjang</td>
                <td style="border-right:solid 1px #000000;">
                    <?= strip_tags($rs_ases_medis['FS_HASIL_PEMERIKSAAN_PENUNJANG']); ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Pemeriksaan Fisik</td>
                <td style="border-right:solid 1px #000000;">
                    : <?= strip_tags($rs_ases_medis['FS_CATATAN_FISIK']); ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Daftar Masalah</td>
                <td style="border-right:solid 1px #000000;">
                    : <?= strip_tags($rs_ases_medis['FS_DAFTAR_MASALAH']); ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Rencana Tindakan</td>
                <td style="border-right:solid 1px #000000;">
                    : <?= strip_tags($rs_ases_medis['FS_TINDAKAN']); ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Rencana Pemeriksaan Penunjang</td>
                <td style="border-right:solid 1px #000000;">
                    : <?= strip_tags($rs_ases_medis['FS_PLANNING']); ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;">Terapi</td>
                <td style="border-right:solid 1px #000000;">
                    : <?= strip_tags($rs_ases_medis['FS_TERAPI']); ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2">
                    Pasien / keluarga sudah dijelaskan tentang kondisi, diagnosis, rencana asuhan dan kemungkinan hasil.
                    <br>
                    Edukasi diberikan kepada :
                    <br><br>
                    Nama : ________________________________
                    <br><br>
                    Hubungan Keluarga : ______________________
                </td>
            </tr>
             <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align: center;"></td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;text-align: center;">
                    Tanggal <?= date('d-m-Y', strtotime($rs_ases_medis['mdd']));?> Jam <?= $rs_ases_medis['FS_JAM_TRS'];?>
                    <br><br>
                    <qrcode value="<?= $rs_ases_medis['FS_NM_PEG']; ?> pada <?= $rs_ases_medis['mdd']; ?>" ec="H" style="width: 15mm; background-color: white; color: black;"></qrcode>
                    <br><br>
                    <?= $rs_ases_medis['FS_NM_PEG']; ?>
                </td>
            </tr>
        </tbody>
    </table>
</page>