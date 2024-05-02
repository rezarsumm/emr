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
<page format="210x100" orientation="P" style="font: arial;"  backtop="40mm" backbottom="41mm" backleft="2mm" backright="2mm">
    <page_header>
        <br><br>
        <table class="page_header" style="width: 100%;">
            <tr>
                <td style="text-align:right;width: 100%; font-size: 10PX">Rekanan : <?= $daftar['NAMAREKANAN']; ?></td></tr>
            <tr><TD></TD> </tr>
            <tr><TD></TD> </tr>
            <tr><TD></TD> </tr>
            <tr>
                <td style="text-align:right;width: 100%"><b>No Antrian Obat : <?= $antrian['FS_KD_ANTRIAN']; ?></b> </td>
            </tr>
            <tr>
                <td style="text-align:center;width: 100%"><?= $medis['NAMA_DOKTER']; ?><br> SIP :<?= $medis['FS_NO_IJIN_PRAKTEK']; ?><p style="text-align:right;"><?= date('d-m-Y', strtotime($medis['MDD'])); ?></p></td>
            </tr>
        </table>
    </page_header>

    <page_footer>
        <table style="width: 80%; border-top: solid 1px black;font-size: 9px;">

            <tr>
                <td  style="width: 10%;height: 1px;">NO RM</td>
                <td style="width: 30%;"> <?= $rs_pasien['NO_MR']; ?></td>
                <td style="width: 10%;">Tgl. Lahir </td>
                <td style="width: 30%;"><?= date('d-m-Y', strtotime($rs_pasien['TGL_LAHIR'])); ?></td>
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
            </tr>       
            <tr>
                <td>TB </td>
                <td><?= $rs_pasien['FS_TB']; ?></td>
                <td>BB </td>
                <td><?= $rs_pasien['FS_BB']; ?></td>
            </tr>       
                     
            <tr>
                <td>Diagnosa</td>
                <td><?= strip_tags($medis['FS_DIAGNOSA']); ?></td>
                <td>Alergi</td>
                <td><?= $rs_pasien['FS_ALERGI2']; ?></td>
            </tr>     
              
             
        </table>
        <barcode type="C39" value="<?= $rs_pasien['NO_REG'];?>" style="width:40mm; height:8mm; font-size: 1mm"></barcode>
    </page_footer>
    <table style="width: 100%;font-size: 10px;" class="content">
        <tbody>
            <col style="width: 100%;">
            <tr>
                
                <td style="width: 100%;"><BR><?php echo str_replace("\n", "<br>", $medis['FS_TERAPI']); ?></td>
            </tr>
        </tbody>
    </table>
</page>