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
                    <h4>RS PKU MUHAMMADIYAH GAMPING <br>
                    Jl. Wates KM. 5.5, Gamping, Sleman 555294</h4>
                </td>
            </tr>
        </table>
    </page_header>
    <br><br>
    <table class="content">
        <tbody>
        <col style="width: 100%;padding: 0px;font-size: 16px;">
        <tr>
            <td align="center">
        <br><u><strong>SURAT KETERANGAN DOKTER SPESIALIS KEDOKTERAN JIWA</strong></u><br>
        Nomor : <?= $rs_surat['FS_NO_SURAT']?>
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
                <td colspan="2"> Yang bertanda tangan di bawah ini Dokter Spesialis Kedokteran Jiwa RS PKU Muhammadiyah Gamping, telah melakukan pemeriksaan pada tanggal 
                            <?= date('d M Y', strtotime($rs_surat['FD_TGL_TRS']));?>, terhadap :<br><br></td>
                
            </tr>
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
                <td>Jenis kelamin</td>
                <td>
                    : <?php if($rs_pasien['FS_JNS_KELAMIN']=='1'){
                        echo "Perempuan";
                    }else{
                        echo "Laki-laki";
                    } ?>
                </td>
                
            </tr>
            <tr>
                <td>Tempat, Tanggal Lahir</td>
                <td>
                    : <?= $rs_pasien['FS_TEMP_LAHIR']; ?>, <?= date('d M Y', strtotime($rs_pasien['FD_TGL_LAHIR'])); ?>
                </td>
                
            </tr>
            <tr>
                <td>Alamat</td>
                <td>
                    : <?= $rs_pasien['FS_ALM_PASIEN']; ?>
                </td>
                
            </tr>
            <tr>
                <td colspan="2"> <br><br>Hasil pemeriksaan Psikiatrik pada saat ini <b><?=$rs_surat['FS_KETERANGAN3'];?></b> gejala kejiwaan yang nyata dan dinyatakan <b><?=$rs_surat['FS_KETERANGAN2'];?></b></td>
                
            </tr>
            <tr>
                <td colspan="2">Demikian surat keterangan ini dibuat dengan sebenarnya, untuk keperluan  : <b><?=$rs_surat['FS_KETERANGAN1'];?></b></td>
                
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
                <td align='center'>Sleman, <?= date('d M Y', strtotime($rs_surat['FD_TGL_TRS'])); ?></td>
            </tr>
            <tr>
                <td></td>
                <td align='center'>
                    <barcode type="C39" value="<?= $rs_surat['FS_KD_MEDIS'];?>" style="width:30mm; height:6mm; font-size: 1mm"></barcode>
                    <br>
                </td>
            </tr>
            <tr>
                <td></td>
                <td align='center'>
                    <?= $rs_surat['FS_NM_PEG']; ?>
                </td>
            </tr>
        </tbody>
 </table>
</page>