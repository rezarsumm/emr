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
<?php
date_default_timezone_set('Asia/Jakarta');
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
                <td style="width:10%;" >
                    <!--<img src="<?php base_url() ?>resource/doc/images/icon/logo.png" width="70" height="70" />-->
                </td>
                <td style="width:90%;text-align: center;">
                    <!--<h3><?= $header1['pref_value']; ?></h3>
                    <h5><?= $header2['pref_value']; ?></h5>-->
                </td>

            </tr>
        </table>
    </page_header>

    <br><br><br><br><br><br><br><br>
    <table class="content">
        <tbody>
        <col style="width: 100%;padding: 0px;font-size: 16px;">
        <tr>
            <td align="center">
        <br><u><strong>SURAT KETERANGAN</strong></u><br>
        Nomor : <?= $rs_surat['FS_NO_SURAT'] ?>
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
                <td colspan="2" align="justify"> Berdasarkan surat dari <b><?= $rs_surat['fs_keterangan5']; ?></b> <br>nomor : <b><?= $rs_surat['FS_KETERANGAN1']; ?></b> 
                    tertanggal <b> <?= date('d M Y', strtotime($rs_surat['FD_TGL_KET1'])); ?>  </b> 
                    perihal Laporan Hasil Laboratorium SARS-CoV-2 dengan ini kami terangkan bahwa :<br><br></td>

            </tr>
            <tr>
                <td>No RM</td>
                <td>
                    : <?= $rs_surat['FS_MR']; ?>
                </td>

            </tr>
            <tr>
                <td>Nama</td>
                <td>
                    : <?= $rs_surat['FS_NM_PASIEN']; ?>
                </td>

            </tr>
            <tr>
                <td>Jenis kelamin</td>
                <td>
                    : <?php
                    if ($rs_surat['FS_JNS_KELAMIN'] == '1') {
                        echo "Perempuan";
                    } else {
                        echo "Laki-laki";
                    }
                    ?>
                </td>

            </tr>
            <tr>
                <td>Tempat, Tanggal Lahir</td>
                <td>
                    : <?= $rs_surat['FS_TEMP_LAHIR']; ?>, <?= date('d M Y', strtotime($rs_surat['FD_TGL_LAHIR'])); ?>
                </td>

            </tr>
            <tr>
                <td>Alamat</td>
                <td>
                    : <?= $rs_surat['FS_ALM_PASIEN']; ?>
                </td>

            </tr>

            <tr>
                <td colspan="2" align='justify'>
                    <br><br>
                    Telah dilakukan pemeriksaan RT-PCR SARS-CoV-2 dengan spesimen 
                    swab nasofaring/orofaring 
                    dengan hasil <b><?= $rs_surat['FS_KETERANGAN3']; ?></b> . 
                    Dengan demikian pasien tersebut dinyatakan <b><?= $rs_surat['FS_KETERANGAN4']; ?></b>  SARS-CoV-2
                    <br><br>
                    Demikian surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana perlu.
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
        <td align='center'>Yogyakarta, <?= date('d M Y', strtotime($rs_surat['FD_TGL_TRS'])); ?> <br> Direktur Utama</td>
        </tr>
        <tr>
            <td></td>
            <td align='center'>
                <!--<img src="<?php base_url() ?>resource/doc/images/icon/dradnan.png" width="150" height="100" />-->
        <img src="<?php base_url() ?>resource/doc/images/icon/drfaesol.jpg" width="175" height="75" />
                <br>
        </td>
        </tr>
        <tr>
            <td></td>
            <!--<td align='center'>
        <u>dr. Adnan Abudllah, Sp.THT-KL., M.Kes</u>
        <br>NBM. 874.490
            </td>-->            
            <td align='center'>
        <u>dr. H Ahmad Faesol,Sp.Rad,. M.Kes,. MMR</u>
        <br>NBM. 797.692
            </td>
        </tr>
        </tbody>
    </table>
</page>