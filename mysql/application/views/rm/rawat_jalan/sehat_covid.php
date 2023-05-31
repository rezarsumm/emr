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
<page orientation="P" backtop="15mm" backbottom="10mm" backleft="15mm" backright="10mm" style="font-size:9pt">
        <!--<page_header>
        <table class="page_header">
            <tr>
                <td style="width:10%;border-bottom:solid 3px #000000;" >
                    <img src="<?php base_url() ?>resource/doc/images/icon/logo.png" width="70" height="70" />
                </td>
                <td style="width:90%;text-align: center;border-bottom:solid 3px #000000;">
                    <h3><?= $header1['pref_value']; ?> </h3>
                        <h5><?= $header2['pref_value']; ?></h5>
                </td>
            </tr>
        </table>
    </page_header>-->
        <page_footer>
        <table class="page_header">
            <tr>
                <td style="width:10%;font-size: 9px;" >
                    
                </td>
                <td style="width:90%;font-size: 9px;border-bottom:solid 1px #000000;" >
                   <!-- <em>Surat Ket. Kesehatan ini berlaku 1 bulan sejak tanggal dikeluarkan</em>-->
                </td>
                
            </tr>
        </table>
    </page_footer>
    <br><br><br><br><br><br><br><br>
    <table class="content">
        <tbody>
        <col style="width: 100%;padding: 0px;font-size: 16px;">
        <tr>
            <td align="center">
        <br><u><strong>SURAT KETERANGAN DOKTER</strong></u><br>
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
                <td colspan="2"> Yang bertanda tangan di bawah ini, atas nama Tim Pemeriksa Kesehatan di RS PKU MUHAMADIYAH GAMPING dengan ini menerangkan bahwa:<br><br></td>

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
                    : <?php
                    if ($rs_pasien['FS_JNS_KELAMIN'] == '1') {
                        echo "Perempuan";
                    } else {
                        echo "Laki-laki";
                    }
                    ?>
                </td>

            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>
                    : <?= date('d M Y', strtotime($rs_pasien['FD_TGL_LAHIR'])); ?>
                </td>

            </tr>
            <tr>
                <td>Alamat</td>
                <td>
                    : <?= $rs_pasien['FS_ALM_PASIEN']; ?>
                </td>

            </tr>
            <tr>
                <td colspan="2"><br><br>Pemeriksaan kami saat ini adalah:</td>

            </tr>
            <tr>
                <td colspan="2"><b>Pemeriksaan Fisik</b></td>
            </tr>
            <tr>
                <td>Tinggi Badan</td>
                <td>
                    : <?= $vs['FS_TB'] ?> cm
                </td>

            </tr>
            <tr>
                <td>Berat Badan</td>
                <td>
                    : <?= $vs['FS_BB'] ?> Kg
                </td>

            </tr>
            <tr>
                <td>Tekanan Darah</td>
                <td>
                    : <?= $vs['FS_TD'] ?> mmHg
                </td>

            </tr>
            <tr>
                <td>Nadi</td>
                <td>
                    : <?= $vs['FS_NADI'] ?> x/menit
                </td>

            </tr>
            <tr>
                <td>Respirasi</td>
                <td>
                    : <?= $vs['FS_R'] ?> x/menit
                </td>

            </tr>
            <tr>
                <td colspan="2"><b>Kesimpulan</b></td>
            </tr>
            <tr>
                <td>Anamnesa</td>
                <td>
                    : <?= strip_tags($rs_surat['FS_KETERANGAN2']); ?>
                </td>

            </tr>
            <tr>
                <td>Pemeriksaan Fisik</td>
                <td>
                    : <?= strip_tags($rs_surat['FS_KETERANGAN4']); ?>
                </td>

            </tr>
            <tr>
                <td>Tindakan</td>
                <td>
                    : <?= strip_tags($rs_surat['FS_KETERANGAN3']); ?>
                </td>

            </tr>
            <tr>
                <td>Saran</td>
                <td>
                    : <?= strip_tags($rs_surat['FS_KETERANGAN5']); ?>
                </td>

            </tr>
            <tr>
                <td>Diagnosa</td>
                <td>
                    : <?= strip_tags($rs_surat['FS_KETERANGAN1']); ?>
                </td>

            </tr>
            <tr>
                <td><b>Hasil Pemeriksaan</b></td>
                <td>
                    : Pemeriksan Penunjang Terlampir
                </td>

            </tr>
            <tr>
                <td colspan="2">
                    <br><br>Demikian Surat Kesehatan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
                    <br>
                    <b>Surat ini bukan surat bebas Covid karena tidak di lengkapi dengan pemeriksaan rapid test / swab </b>
                </td>
               

            </tr>
        </tbody>
    </table>
 <table class="content">
        <col style="width: 50%;font-size: 16px;">
        <col style="width: 50%;font-size: 16px;">
        <tbody>
           
            <tr>
                 <br>
                 <br>
                <td></td>
                <td align='center'><?= $alamat['pref_value'];?>, <?= date('d-m-Y',  strtotime($result['mdd'])); ?></td>
            </tr>
            <tr>
                 
                <td></td>
                <td align='center'>Sejawat,</td>
            </tr>
            <tr>
                <td></td>
                <td align='center'>
                    <!--<qrcode value="<?= $result['FS_NM_PEG']; ?> pada <?= $result['mdd']; ?>" ec="H" style="width: 15mm; background-color: white; color: black;"></qrcode>
                    -->
                    <br>
                </td>
            </tr>
            <tr>
                <td></td>
                <td align='center'>
                    <!--<?= $result['FS_NM_PEG']; ?>-->
                </td>
            </tr>
        </tbody>
 </table>
</page>