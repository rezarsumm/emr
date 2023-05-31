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
<?php date_default_timezone_set('Asia/Jakarta');
$dayList = array(
    'Sun' => 'Minggu',
    'Mon' => 'Senin',
    'Tue' => 'Selasa',
    'Wed' => 'Rabu',
    'Thu' => 'Kamis',
    'Fri' => 'Jumat',
    'Sat' => 'Sabtu'
);
?>
<page orientation="P" backtop="15mm" backbottom="10mm" backleft="15mm" backright="10mm" style="font-size:9pt">
    <page_header>
        <table class="page_header">
            <tr>
                <td style="width:10%;border-bottom:solid 1px #000000;" >
                    <img src="<?php base_url() ?>resource/doc/images/icon/logo.png" width="70" height="70" />
                </td>
                <td style="width:90%;text-align: center;border-bottom:solid 1px #000000;">
                    <h3><?= $header1['pref_value'];?></h3>
                    <h5><?= $header2['pref_value'];?></h5>
                </td>
            </tr>
        </table>
    </page_header>
    <br><br>
    <table class="content">
        <tbody>
        <col style="width: 100%;padding: 0px;font-size: 17px;">
        <tr>
            <td align="center">
        <br><u><strong>SURAT KETERANGAN</strong></u><br>
                NO <?= $rs_skdp['FS_NO_SKDP']; ?>
            </td>
        </tr>
        </tbody>
    </table>
    <br> <br>
    <table class="content">
        <col style="width: 30%;font-size: 15px;">
        <col style="width: 70%;font-size: 15px;">
        <tbody>
            <tr>
                <td>No RM</td>
                <td>
                    : <?= $rs_pasien['FS_MR']; ?>
                </td>
                
            </tr>
            <tr>
                <td>Nama</td>
                <td>
                    : <?= $rs_pasien['FS_NM_PASIEN']; ?>
                </td>
                
            </tr>
            <tr>
                <td>Diagnosa</td>
                <td>
                    :  <?= strip_tags($result['FS_DIAGNOSA']); ?>
                </td>
                
            </tr>
            <tr>
                <td></td>
                <td>
                       <?= $rs_skdp['FS_SKDP_KET']; ?>
                </td>
                
            </tr>
            <!--<tr>
                <td>Tanggal Surat Rujukan</td>
                <td>
                    : <?php
                    if (empty($result['FD_TGL_RUJUKAN'])){
                        echo '-';
                    }else{
                   
                   echo $dayList[date('D', strtotime($result['FD_TGL_RUJUKAN']))].','.date('d M Y', strtotime($result['FD_TGL_RUJUKAN'])); 
                    }
                    ?>
                </td>
                
            </tr>-->
            <tr>
                <td colspan="2"> <br><br>Bahwa pasien tersebut masih memerlukan perawatan rawat jalan di 
                    RS PKU Muhammadiyah Gamping berupa pelayanan Hemodialisis
                    <br>
                    Demikian surat keterangan ini dibuat agar dapat dipergunakan sebagaimana mestinya.
                </td>
                
            </tr>
           
        </tbody>
    </table>
    <br><br>
 <table class="content">
        <col style="width: 50%;font-size: 15px;">
        <col style="width: 50%;font-size: 15px;">
        <tbody>
           
            <tr>
                 <br>
                 <br>
                <td></td>
                <td align='center'><?= $alamat['pref_value'];?>, <?= date('d M Y', strtotime($result['mdd'])); ?></td>
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