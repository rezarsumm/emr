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
<page orientation="P" backtop="1mm" backbottom="10mm" backleft="15mm" backright="10mm">
    <table class="content">
        <tbody>
        <col style="width: 100%;padding: 0px;font-size: 14px;">
        <tr>
            <td align="center">
                <br><strong>RS PKU MUHAMMADIYAH GAMPING</strong>
                <br><strong>Jl. Wates Km 5,5 Gamping Sleman Yogyakarta</strong>
            </td>
        </tr>
        </tbody>
    </table>
    <hr>
    <table class="content">
        <col style="width: 25%;font-size: 12px;">
        <col style="width: 25%;font-size: 12px;">
        <col style="width: 25%;font-size: 12px;">
        <col style="width: 25%;font-size: 12px;">
        <tbody>
        <tr>
            <td align="center" rowspan="4">
                <b>PERMINTAAN PEMERIKSAAN PENUNJANG</b>
            </td>
        </tr>
        <tr>
            <td colspan="2">Nama : <?= $rs_pasien['FS_NM_PASIEN']; ?></td>
            <td>No. RM : <?= $rs_pasien['MR']; ?></td>
        </tr>
        <tr>
            <td>Tanggal Lahir : <?= date('d-m-Y',  strtotime($rs_pasien['FD_TGL_LAHIR'])); ?></td>
            <td>Jk : <?php if($rs_pasien['FS_JNS_KELAMIN']=='0'){
                echo "Laki-Laki";
            }else{
                echo "Perempuan";
            } ?></td>
            <td>Bagian : <?= $rs_pasien['FS_NM_LAYANAN']; ?></td>
        </tr>
        <tr>
            <td colspan="3">Alamat : <?= $rs_pasien['FS_ALM_PASIEN']; ?></td>
        </tr>
        </tbody>
    </table>
    <hr>
    <table class="content">
        <col style="width: 30%;font-size: 12px;">
        <col style="width: 70%;font-size: 12px;">
        <tbody>
            <tr>
                <td colspan="2">Assalamu'alaikum Wr. Wb.</td>
            </tr>
            <tr>
                <td>Pemeriksaan Penunjang yang diminta</td>
                <td>:
                <?php foreach($rs_lab as $lab){
                    echo $lab['FS_NM_TARIF'].",<br>";
                } ?>
                </td>
            </tr>
            <tr>
                <td colspan="2"><b>KETERANGAN KLINIK PENDERITA</b></td>
            </tr>
             <tr>
                <td>Diagnosa</td>
                <td>
                    : <?= strip_tags($result['FS_DIAGNOSA']); ?>
                </td>
                
            </tr>
            <tr>
                <td>Alergi</td>
                <td>
                    : <?= $rs_pasien['FS_ALERGI']; ?>
                </td>
                
            </tr>
            <tr>
                <td>High Risk</td>
                <td>
                    : <?= $rs_pasien['FS_HIGH_RISK']; ?>
                </td>
                
            </tr>
            <tr>
                <td colspan="2"><br>Wassalamu'alaikum Wr. Wb<br></td>
                
            </tr>
        </tbody>
    </table>
 <table class="content">
        <col style="width: 50%;font-size: 12px;">
        <col style="width: 50%;font-size: 12px;">
        <tbody> 
            <tr>
                 <br>
                 <br>
                <td></td>
                <td align='center'><?= $alamat['pref_value'];?>, <?= $result['mdd']; ?></td>
            </tr>
            <tr>
                <td></td>
                <td align='center'>
                    <qrcode value="<?= $result['FS_NM_PEG']; ?> pada <?= $result['mdd']; ?>" ec="H" style="width: 15mm; background-color: white; color: black;"></qrcode>
                    <br>
                </td>
            </tr>
            <tr>
                <td></td>
                <td align='center'>
                    <?= $result['FS_NM_PEG']; ?>
                </td>
            </tr>
        </tbody>
 </table>
</page>