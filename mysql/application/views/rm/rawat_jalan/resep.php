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
        <br><br><br><br><br><br>
        <table class="page_header" style="width: 100%;">
            <tr>
                <td style="text-align:right;width: 100%"><b>No Antrian Obat : <?= $antrian['FS_KD_ANTRIAN']; ?></b> </td>
            </tr>
            <tr>
                <td style="text-align:center;width: 100%"><?= $medis['FS_NM_PEG']; ?><br> SIP :<?= $medis['FS_NO_IJIN_PRAKTEK']; ?><p style="text-align:right;"><?= date('d-m-Y', strtotime($medis['mdd'])); ?></p></td>
            </tr>
        </table>
    </page_header>

    <page_footer>
        <table style="width: 80%; border-top: solid 1px black;font-size: 9px;">

            <tr>
                <td  style="width: 10%;height: 1px;">NO RM</td>
                <td style="width: 30%;"> <?= $rs_pasien['response'][0]['fs_mr']; ?> / <?= $rs_pasien['response'][0]['fs_kd_reg']; ?></td>
                <td style="width: 10%;">Tgl. Lahir </td>
                <td style="width: 30%;"><?= date('d-m-Y', strtotime($rs_pasien['response'][0]['FD_TGL_LAHIR'])); ?></td>
            </tr>
            <tr>
                <td>Nama </td>
                <td  colspan="2"><?= substr($rs_pasien['response'][0]['fs_nm_pasien'],0,25); ?></td>
            </tr>   

            <tr>
                <td>Alamat </td>
                <td colspan="2"><?= substr($rs_pasien['response'][0]['FS_ALM_PASIEN'],0,25); ?></td>
            </tr>
            <tr>
                <td>Jaminan </td>
                <td><?= substr($rs_pasien['response'][0]['fs_nm_jaminan'],0,25); ?></td>
                <td>Jenis Kelamin </td>
                <td><?php if($rs_pasien['response'][0]['FS_JNS_KELAMIN']=='1'){echo "Perempuan";}elseif($rs_pasien['response'][0]['FS_JNS_KELAMIN']=='0'){echo "Laki-Laki";} ?></td>
            </tr>       
            <tr>
                <td>TB </td>
                <td><?= $medis['FS_TB']; ?></td>
                <td>BB </td>
                <td><?= $medis['FS_BB']; ?></td>
            </tr>       
                     
            <tr>
                <td>Diagnosa</td>
                <td><?= strip_tags($medis['FS_DIAGNOSA']); ?></td>
                <td></td>
                <td></td>
            </tr>   
             <tr>
                <td>SEP</td>
                <td><?= $rs_pasien['response'][0]['FS_NO_SJP']; ?></td>
                <td>Alergi</td>
                <td><?= $rs_pasien['response'][0]['FS_ALERGI']; ?></td>
            </tr>   
             <tr>
                <td>No Kartu</td>
                <td><?= $rs_pasien['response'][0]['FS_NO_PESERTA']; ?></td>
                <td></td>
                <td>
                    
                </td>
            </tr>   
             
        </table>
        <barcode type="C39" value="<?= $rs_pasien['response'][0]['FS_KD_REG'];?>" style="width:40mm; height:8mm; font-size: 1mm"></barcode>
    </page_footer>
    <table style="width: 100%;font-size: 10px;" class="content">
        <tbody>
            <col style="width: 100%;">
            <tr>
                
                <td style="width: 100%;"><BR><?= $medis['FS_TERAPI']; ?></td>
            </tr>
        </tbody>
    </table>
</page>