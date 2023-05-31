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
                <br><strong>TINDAKAN KEPERAWATAN</strong>
            </td>
        </tr>

        </tbody>
    </table>
    <table class="content">
        <col style="width: 17%;font-size: 12px;">
        <col style="width: 68%;font-size: 12px;">
        <col style="width: 15%;font-size: 12px;">
        <tbody>
            
            <tr>
                <th style="border-left:solid 1px #000000;border-bottom:solid 1px #000000; border-right:solid 1px #000000;text-align: center;">Waktu Tindakan</th>
                <th style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align: center;" >Tindakan</th>
                <th style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align: center;">Perawat</th>
            </tr>
            <?php foreach ($rs_tindakan as $data){?>
            <tr>
                <th style="border-left:solid 1px #000000;border-bottom:solid 1px #000000; border-right:solid 1px #000000;text-align: center;">
                <?= date('d-m-Y', strtotime($data['FD_TGL_TINDKAN_KEP'])); ?> <?php echo date("H:i:s", strtotime($data['FD_JAM_TINDKAN_KEP'])); ?>
                </th>
                <th style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;" >
                    <?= $data['FS_TINDKAN_KEP'];?>
                    <?= $data['FS_NM_KEP_TINDAKAN'];?>
                </th>
                <th style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align: left;">
                    <qrcode value="<?= $data['mdb'];?>" ec="H" style="width: 10mm; background-color: white; color: black;"></qrcode>
                <br>
                <br>
                <div style="font-size: 9px;"><?= $data['FS_NM_PEG']; ?></div>
                </th>
            </tr>
           <?php } ?>
        </tbody>
    </table>
</page>