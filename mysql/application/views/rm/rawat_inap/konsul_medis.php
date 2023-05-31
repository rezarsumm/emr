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
<?php foreach ($rs_konsul_medis as $data) { ?>
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
                        Tgl Masuk Rawat Inap : <?php echo date('d-m-Y', strtotime($rs_pasien['FD_TGL_MASUK'])); ?> / <?= $rs_pasien['FS_JAM_MASUK']; ?>
                    </td>
                </tr>
            </table>
        </page_header>

        <table class="content">
            <tbody>
            <col style="width: 100%;background-color: #000000;color: #ffffff;padding: 0px;font-size: 12px;">
            <tr>
                <td align="center">
                    <br><strong>PERMINTAAN KONSULTASI</strong>
                </td>
            </tr>

            </tbody>
        </table>
        <table class="content">
            <col style="width: 100%;font-size: 12px;">
            <tbody>
                <tr>
                    <th style="border-left:solid 1px #000000;border-right:solid 1px #000000;">Kepada teman sejawat :</th>
                </tr>
                <tr>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000; border-right:solid 1px #000000;">
                        <?= $data['FS_NM_PEG']; ?>
                    </td>
                </tr>
                <tr>
                    <th style="border-left:solid 1px #000000;border-right:solid 1px #000000;" >
                        Ikhtisar klinis dan pemeriksaan hasil penunjang :
                    </th>
                </tr>
                <tr>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;" >
                        <?= $data['FS_KET1']; ?>
                    </td>
                </tr>
                <tr>
                    <th style="border-left:solid 1px #000000;border-right:solid 1px #000000;" >
                        Konsultasi yang diminta :
                    </th>
                </tr>
                <tr>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;" >
                        <?= $data['FS_KET2']; ?>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right;">
                        <br>
                        <?php echo date('d-M-Y', strtotime($data['mdd_date'])); ?>, <?= $data['mdd_time']; ?>
                        <br><br>
            <qrcode value="<?= $data['mdb']; ?>" ec="H" style="width: 11mm; background-color: white; color: black;"></qrcode>
            <br>
            <br>
            <?= $data['FS_NM_PEG_PENGIRIM']; ?>
            </td>
            </tr>

            </tbody>
        </table>
        <table class="content">
            <tbody>
            <col style="width: 100%;background-color: #000000;color: #ffffff;padding: 0px;font-size: 12px;">
            <tr>
                <td align="center">
                    <br><strong>JAWABAN KONSULTASI</strong>
                </td>
            </tr>
            </tbody>
        </table>
        <table class="content">
            <col style="width: 100%;font-size: 12px;">
            <tbody>
                <tr>
                    <th style="border-left:solid 1px #000000;border-right:solid 1px #000000;">Kepada teman sejawat :</th>
                </tr>
                <tr>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000; border-right:solid 1px #000000;">
                        <?= $data['FS_NM_PEG_PENGIRIM']; ?>
                    </td>
                </tr>
                <tr>
                    <th style="border-left:solid 1px #000000;border-right:solid 1px #000000;" >
                        Penemuan klinis dari pasien yang dikonsultasikan :
                    </th>
                </tr>
                <tr>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;" >
                        <?= $data['J_FS_KET1']; ?>
                    </td>
                </tr>
                <tr>
                    <th style="border-left:solid 1px #000000;border-right:solid 1px #000000;" >
                        Pemeriksaan khusus lain :
                    </th>
                </tr>
                <tr>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;" >
                        <?= $data['J_FS_KET2']; ?>
                    </td>
                </tr>
                <tr>
                    <th style="border-left:solid 1px #000000;border-right:solid 1px #000000;" >
                        Kesimpulan :
                    </th>
                </tr>
                <tr>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;" >
                        <?= $data['J_FS_KET3']; ?>
                    </td>
                </tr>
                <tr>
                    <th style="border-left:solid 1px #000000;border-right:solid 1px #000000;" >
                        Saran :
                    </th>
                </tr>
                <tr>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;" >
                        <?= $data['J_FS_KET4']; ?>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right;">
                        <br>
                        <?php echo date('d-M-Y', strtotime($data['j_mdd_date'])); ?>, <?= $data['j_mdd_time']; ?>
                        <br><br>
            <qrcode value="<?= $data['j_mdb']; ?>" ec="H" style="width: 11mm; background-color: white; color: black;"></qrcode>
            <br>
            <br>
            <?= $data['FS_NM_PEG_JAWAB']; ?>
            </td>
            </tr>

            </tbody>
        </table>
    </page>
<?php } ?>