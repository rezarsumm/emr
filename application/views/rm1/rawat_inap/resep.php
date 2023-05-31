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
<page format="210x100" orientation="P" style="font: arial;"  backtop="35mm" backbottom="41mm" backleft="2mm" backright="2mm">
    <page_header>
        <br><br><br><br><br><br>
        <table class="page_header" style="width: 100%;">
            <tr>
                <td style="text-align:center;width: 100%"><?= $rs_pasien['NAMALENGKAP']; ?><br> SIP :<?= $rs_pasien['FS_NO_IJIN_PRAKTEK']; ?></td>
            </tr>
        </table>
    </page_header>

    <page_footer>
        <table style="width: 80%; border-top: solid 1px black;font-size: 9px;">

            <tr>
                <td  style="width: 10%;height: 1px;">NO RM</td>
                <td style="width: 30%;"> <?= $rs_pasien['MR']; ?></td>
                <td style="width: 10%;">No. Resep </td>
                <td style="width: 30%;"><?= $rs_pasien['FS_KD_TRS']; ?></td>
            </tr>
            <tr>
                <td>Tgl. Lahir </td>
                <td  colspan="2"><?= date('d-m-Y', strtotime($rs_pasien['TGL_LAHIR'])); ?></td>
            </tr>   
            <tr>
                <td>Nama </td>
                <td  colspan="2"><?= $rs_pasien['NAMA_PASIEN']; ?></td>
            </tr>   

            <tr>
                <td>Alamat </td>
                <td colspan="2"><?= substr($rs_pasien['ALAMAT'],0,17); ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin </td>
                <td><?php if($rs_pasien['JENIS_KELAMIN']=='P'){echo "Perempuan";}elseif($rs_pasien['JENIS_KELAMIN']=='L'){echo "Laki-Laki";} ?></td>
                <td></td>
                <td></td>
            </tr>       
            <tr>
                <td>TB </td>
                <td><?= $rs_pasien['FS_TB']; ?></td>
                <td>BB </td>
                <td><?= $rs_pasien['FS_BB']; ?></td>
            </tr>       
                     
            <tr>
                <td>Diagnosa</td>
                <td><?= strip_tags($rs_pasien['FS_DIAGNOSA']); ?></td>
                <td>Alergi</td>
                <td><b><?= $rs_pasien['FS_ALERGI']; ?></b></td>
            </tr>   
             
             
        </table>
        <barcode type="C39" value="<?= $rs_pasien['NOREG'];?>" style="width:40mm; height:8mm; font-size: 1mm"></barcode>
    </page_footer>
    <table style="width: 100%;font-size: 11px;" class="content">
        <tbody>
            <col style="width: 100%;">
           <!--  <tr>
                
                <td style="width: 100%;">
                    <?php
                    foreach ($rs_resep as $resep){
                    ?>
               R/ <?= $resep['FS_NM_BARANG']; ?> <?= $resep['FN_QTY_BARANG']; ?> <?= $resep['FS_KD_SATUAN']; ?><br><br>
               <?= $resep['FN_ETIKET_QTY']; ?> x <?= $resep['FN_ETIKET_HARI']; ?> Sehari <br><br>
               <b>Ket : <?= $resep['FS_ETIKET_CATATAN']; ?></b><br><br>
               <div style="border-bottom: solid 1px black;font-size: 9px;"></div>
                    <?php } ?>
                </td>
            </tr> -->
              <tr>
                
                <td style="width: 100%;"><BR><?php 
               
                echo str_replace("\n", "<br>", $rs_resep2['FS_CPPT_TERAPI']); ?></td>
            </tr>
        </tbody>
    </table>
</page>