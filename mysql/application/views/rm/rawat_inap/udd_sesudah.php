<style type="text/Css">
    <!--
    table.page_header {
        width: 100%;
        //border-bottom: solid 1px #000000;
        padding-bottom: 5px;
    }
    table.page_header h2 {
        margin: 0 0 0 0;
        padding: 0 5px 5px 5px;
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
<page format="100x60" orientation="P" style="font: arial;"  backtop="7mm" backbottom="5mm" backleft="0mm" backright="2mm">
     <page_header>
        <table class="page_header" style="width: 100%;font-size: 9px;font-weight: bold;">
            <tr>
                <td style="text-align:center;width: 100%">FARMASI RAWAT INAP <BR> RS PKU MUHAMMADIYAH GAMPING</td>
            </tr>
        </table>
    </page_header>
    <table style="width: 100%;font-size: 8px;font-weight: bold;" class="content">
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
                    Bangsal : <?= $rs_pasien['FS_NM_BED'];?>
                </td>
            </tr>
            <tr>
                <td>
                    <hr>
                    <?php foreach($rs_udd_sesudah as $data){ ?>
                    <?php echo $no++;?>. <?= $data['FS_NM_BARANG'];?> <br>
                    <?= $data['FS_ETIKET_CATATAN'];?>
                     <br><br>
                    <?php } ?>
                    <p style="text-align: center;">
                    <?php if($data['FS_UDD_WAKTU'] == '1'){
                        echo 'PAGI';
                    }elseif($data['FS_UDD_WAKTU'] == '2'){
                        echo 'SIANG';
                    }elseif($data['FS_UDD_WAKTU'] == '3'){
                        echo 'SORE';
                    }
                    ?>
                        <br>
                        Sesudah Makan
                    </p>
                  </td>
            </tr>
        </tbody>
    </table>
</page>