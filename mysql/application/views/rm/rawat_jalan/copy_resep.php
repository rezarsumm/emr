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
<page format="280x100" orientation="P" style="font: arial;"  backtop="40mm" backbottom="41mm" backleft="2mm" backright="2mm">
    <page_header>
        <br><br><br><br><br><br><br><br><br><br>
        <!--<table class="page_header"  style="width: 100%;font-size: 11px;">
            <tr>
                <td style="text-align:center;width: 100%;">Apoteker : Irma Risdiana,S.Si.,MPH,Apt<br> SIPA : 446/2701/63/VII-21
                    <hr>
                    <p>SALINAN RESEP</p>
                    </tr>
        </table>-->
         <table style="width: 90%; font-size: 9px;">
             <tr>
                 <td colspan="4" style="text-align:right;">Sleman,<?= date('d-m-Y', strtotime($rs_pasien['FD_TGL_TRS'])); ?></td>
         </tr>
            <tr>
                <td style="width: 15%;">Untuk</td>
                <td style="width: 35%;"><?= $rs_pasien['FS_NM_PASIEN']; ?></td>
                <td style="width: 15%;">NO RM</td>
                <td style="width: 35%;"><?= $rs_pasien['MR']; ?></td>
            </tr>
            <tr>
                <td>Tanggal Resep </td>
                <td><?= date('d-m-Y',  strtotime($rs_pasien['FD_TGL_TRS'])); ?></td>
                <td>No Resep </td>
                <td><?= $rs_pasien['FS_KD_TRS']; ?></td>
            </tr>
            
        
            <tr>
                <td  style="width: 15%;">Dokter</td>
                <td  colspan="2"><?= $rs_pasien['FS_NM_PEG']; ?></td>
            </tr>
            <tr>
                <td>Alergi</td>
                <td colspan="2"><?= $rs_pasien['FS_ALERGI2']; ?></td>
            </tr>   
        </table>
    </page_header>

   
    
    <table style="width: 100%;font-size: 9px;" class="content">
        <tbody>
            <col style="width: 100%;">
            <tr>
                
                <td style="width: 100%;">
                    <br><br><br><br><br><br><br><br><br><br>
                    <?php
                    foreach ($rs_resep as $resep){
                    ?>
               R/ <?= $resep['FS_NM_BARANG']; ?> No. <?php /*number_format($resep['FN_QTY_BARANG'],0,",",".");*/ ?> <?php  //$resep['FS_KD_SATUAN']; ?> <br><br>
                <?= number_format($resep['FN_ETIKET_QTY'],0,",","."); ?> x Sehari <?=  $resep['FS_ETIKET_HARI']; ?> <?= $resep['FS_NM_SATUANPAKAI_ETIKET'];?>, <?= $resep['FS_NM_CARAPAKAI_ETIKET'];?> (<?= $resep['FS_ETIKET_CATATAN'];?>)<br><br>
               
               <div style="border-bottom: solid 1px black;font-size: 9px;"></div>
                    <?php } ?>
                </td>
            </tr>
        </tbody>
    </table>
     <page_footer>
       </page_footer>
</page>