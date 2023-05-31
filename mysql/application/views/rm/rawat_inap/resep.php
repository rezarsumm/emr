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
<page format="210x100" orientation="P" style="font: arial;"  backtop="40mm" backbottom="60mm" backleft="2mm" backright="2mm">
    <page_header>
    <br><br><br><br><br><br>
    <table class="page_header" style="width: 100%;">
        <tr>
            <td style="text-align:center;width: 100%"><?= $rs_pasien['FS_NM_PEG']; ?><br> SIP :<?= $rs_pasien['FS_NO_IJIN_PRAKTEK']; ?>
            <p style="text-align:right;"><?= date('d-m-Y', strtotime($rs_pasien['FD_TGL_TRS'])); ?></p>

        </td>
    </tr>
</table>
</page_header>

<page_footer>
<table style="width: 80%; border-top: solid 1px black;font-size: 9px; ">

    <tr>
        <td>NO RM / No. Reg / No. Resep</td>
        <td colspan="2"><?= $rs_pasien['MR']; ?> / <?= $rs_pasien['FS_KD_REG']; ?> / <?= $rs_pasien['FS_KD_TRS']; ?></td>
    </tr>
    <tr>
        <td>Tgl. Lahir / Jenis Kelamin </td>
        <td  colspan="2"><?= date('d-m-Y', strtotime($rs_pasien['FD_TGL_LAHIR'])); ?> / <?php if($rs_pasien['FS_JNS_KELAMIN']=='1'){echo "Perempuan";}elseif($rs_pasien['FS_JNS_KELAMIN']=='0'){echo "Laki-Laki";} ?></td>
    </tr>   
    <tr>
        <td>Nama </td>
        <td  colspan="2"><?= $rs_pasien['FS_NM_PASIEN']; ?></td>
    </tr>   

    <tr>
        <td>Alamat </td>
        <td colspan="2"><?= substr($rs_pasien['FS_ALM_PASIEN'],0,17); ?></td>
    </tr>
    <tr>
        <td>Jaminan </td>
        <td colspan="2"><?= $rs_pasien['FS_NM_JAMINAN']; ?></td>
    </tr>       
    <tr>
        <td>TB / BB / Alergi</td>
        <td colspan="2"><?= $rs_pasien['FS_TB']; ?> / <?= $rs_pasien['FS_BB']; ?> / <b><?= $rs_pasien['FS_ALERGI']; ?></b></td>
    </tr>       

    <tr>
        <td>Diagnosa</td>
        <td colspan="2"><?= strip_tags($rs_pasien['FS_DIAGNOSA']); ?></td>
    </tr>   
    <tr>
        <td>SEP</td>
        <td colspan="2"><?= $rs_pasien['FS_NO_SJP']; ?></td>
    </tr>   
    <tr>
        <td>No Kartu</td>
        <td colspan="2"><?= $rs_pasien['FS_NO_PESERTA']; ?></td>
    </tr> 


</table>
<!-- <barcode type="C39" value="<?= $rs_pasien['FS_KD_REG'];?>" style="width:40mm; height:8mm; font-size: 1mm"></barcode>-->
</page_footer>
<table style="width: 100%;font-size: 9px;" class="content">
    <tbody>
        <col style="width: 100%;">
        <tr>

            <td style="width: 100%;">
                <?php
                foreach ($rs_resep as $resep){
                    ?>
                    R/ <?= $resep['FS_NM_BARANG']; ?> <?= $resep['FN_QTY_BARANG']; ?> <?= $resep['FS_KD_SATUAN']; ?><br><br>
                    <?= number_format($resep['FN_ETIKET_QTY'],2,",","."); ?> x <?= number_format($resep['FS_ETIKET_HARI'],2,",","."); ?> Sehari <br><br>
                    <b>Ket : <?= $resep['FS_ETIKET_CATATAN']; ?></b><br><br>
                    <div style="border-bottom: solid 1px black;font-size: 9px;"></div>
                <?php } ?>
            </td>
        </tr>
    </tbody>
</table>
</page>