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
<page format="200x100" orientation="P" style="font: arial;"  backtop="40mm" backbottom="41mm" backleft="2mm" backright="2mm">
    <page_header>
        <br><br><br><br><br><br>
        <table class="page_header" style="width: 100%;">
            <tr>
                <td style="text-align:center;width: 100%"><?= $medis['FS_NM_PEG']; ?><br> SIP :<?= $medis['FS_NO_IJIN_PRAKTEK']; ?><p style="text-align:right;"><?= date('d-m-Y', strtotime($medis['mdd'])); ?></p></td>
            </tr>
        </table>
    </page_header>

    <page_footer>
        <table style="width: 100%; border-top: solid 1px black;font-size: 9px;">

            <tr>
                <td  style="width: 20%;">NO RM</td>
                <td colspan="2"> <?= $rs_pasien['MR']; ?></td>
            </tr>
            <tr>
                <td style="width: 20%;">Nama </td>
                <td colspan="2"><?= $rs_pasien['FS_NM_PASIEN']; ?></td>
            </tr>   

            <tr>
                <td style="width: 20%;">Tgl. Lahir </td>
                <td colspan="2"><?= date('d-m-Y', strtotime($rs_pasien['FD_TGL_LAHIR'])); ?></td>
            </tr>
            <tr>
                <td style="width: 20%;">Alamat </td>
                <td colspan="2"><?= $rs_pasien['FS_ALM_PASIEN']; ?></td>
            </tr>
            <tr>
                <td style="width: 20%;">Jaminan </td>
                <td colspan="2"><?= $rs_pasien['FS_NM_JAMINAN']; ?></td>
            </tr>       
            <tr>
                <td style="width: 20%;">Jenis Kelamin </td>
                <td colspan="2"><?php if($rs_pasien['FS_JNS_KELAMIN']=='1'){echo "Perempuan";}elseif($rs_pasien['FS_JNS_KELAMIN']=='0'){echo "Laki-Laki";} ?></td>
            </tr>       
            <tr>
                <td style="width: 20%;">TB </td>
                <td style="width: 40%;"><?= $rs_pasien['FS_TB']; ?></td>
                <td style="width: 20%;">BB </td>
                <td style="width: 40%;"><?= $rs_pasien['FS_BB']; ?></td>
            </tr>       
            <tr>
                <td style="width: 20%;">SEP</td>
                <td style="width: 40%;"><?= $rs_pasien['FS_NO_SJP']; ?></td>
                <td style="width: 20%;">Alergi</td>
                <td style="width: 40%;"><?= $rs_pasien['FS_ALERGI2']; ?></td>
            </tr>             
        </table>
    </page_footer>
    <table style="width: 100%;font-size: 10px;" class="content">
        <tbody>
            <col style="width: 100%;">
            <tr>
                
                <td style="width: 100%;"><BR>R / : <?= $medis['FS_TERAPI']; ?></td>
            </tr>
        </tbody>
    </table>
</page>