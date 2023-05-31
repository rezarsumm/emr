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
<page format="136x110" orientation="P" style="font: arial;font-weight: bold;"  backtop="10mm" backbottom="0mm" backleft="20mm" backright="2mm">
    <page_header>
        <table class="page_header" style="width: 100%;font-size: 12px;font-weight: bold;">
            <tr>
                <td style="text-align:center;width: 100%">FARMASI RAWAT INAP <BR> RS PKU MUHAMMADIYAH GAMPING</td>
            </tr>
        </table>
    </page_header>
    <table style="width: 100%;font-size: 12px;" class="content">
        <tbody>
            <col style="width: 100%;">
            <tr>
                <td>
                    Tanggal : <?= date('d-m-Y');?>
                </td>
            </tr>
            <tr>
                <td>
                    Nama : <?= $rs_pasien['FS_NM_PASIEN'];?>
                </td>
            </tr>
            <tr>
                <td>
                    RM : <?= $rs_pasien['MR'];?> ,Tgl Lahir : <?= date('d-m-Y', strtotime($rs_pasien['FD_TGL_LAHIR']));?>
                </td>
            </tr>
            <tr>
                <td>
                    Bangsal : <?= $rs_pasien['fs_nm_bed'];?>
                </td>
            </tr>
            <tr>
                <td>
                    <hr>
                    Nama Obat :  <?= $rs_pasien['FS_NAMA_OBAT'];?> <br><br>
                    Dosis : <?= $rs_pasien['FS_DOSIS_OBAT'];?> <br><br>
                    Interval : <?= $rs_pasien['FS_INTERVAL'];?> <br><br>
                    <p style="text-align: center;">PAGI / SIANG / SORE</p>
                    <p style="text-align: center;"><barcode type="C39" value="<?= $rs_pasien['FS_KD_REG'];?>" style="width:50mm; height:8mm; font-size: 1mm"></barcode></p>
                </td>
            </tr>
        </tbody>
    </table>
</page>