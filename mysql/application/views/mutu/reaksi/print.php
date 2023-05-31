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
<page backtop="27mm" backbottom="10mm" backleft="2mm" backright="2mm" style="font-size:10pt">
    <page_header>
        <table class="page_header">
            <tr>
                <td style="width:10%;">
                    <img src="<?php base_url() ?>resource/doc/images/icon/logo.png" width="70" height="70" />
                </td>
                <td style="width:60%;text-align: left;">
                    <h3>RS PKU MUHAMMADIYAH GAMPING</h3>
                    <h5>Jl. Wates KM. 5.5, Gamping, Sleman 55294</h5>
                </td>
                <td style="width:30%;" valign="top">
                </td>
            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 100%; border-top: solid 1px black;">
            <tr>
                <td style="text-align: left; width: 80%">&nbsp;</td>
                <td style="text-align: right; width: 20%">Halaman [[page_cu]]/[[page_nb]]</td>
            </tr>
        </table>
    </page_footer>
    <table class="content">
        <tbody>
        <col style="width: 100%;padding: 0px;font-size: 14px;">
        <tr>
            <td align="center">
                <br>
                <?php if ($result['FS_KEJADIAN_REAKSI'] == '1') { ?>
                    <strong>LAPORAN KEJADIAN REAKSI TRANSFUSI DARAH</strong>
                <?php } elseif ($result['FS_KEJADIAN_REAKSI'] == '2') { ?>
                    <strong>LAPORAN KEJADIAN REAKSI OBAT</strong>
                <?php } elseif ($result['FS_KEJADIAN_REAKSI'] == '3') { ?>
                    <strong>LAPORAN KEJADIAN REAKSI SEDASI MODERATE ATAU DALAM</strong>
                <?php } elseif ($result['FS_KEJADIAN_REAKSI'] == '4') { ?>
                    <strong>LAPORAN KEJADIAN REAKSI ANESTESI</strong>
                <?php } ?>
            </td>
        </tr>
        </tbody>
    </table>
    <br>
    <table class="content">
        <col style="width: 100%;font-size: 12px;border-top:solid 1px #000000;">
        <tbody>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><strong>Nama Pasien : </strong><?= $result['fs_nm_pasien']; ?></td>
            </tr>

            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><strong>Nomor RM : </strong><?= $result['fs_mr']; ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><strong>Tanggal Kejadian : </strong><?= date('d-M-Y', strtotime($result['FD_TGL_KEJADIAN'])) ?></td>
            </tr>

            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><strong>Lokasi Kejadian : </strong><?= $result['layanan_akhir']; ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    <strong>Kejadian Reaksi : </strong>
                    <?php if ($result['FS_KEJADIAN_REAKSI'] == '1') { ?>
                        Kejadian Reaksi Transfusi Darah
                    <?php } elseif ($result['FS_KEJADIAN_REAKSI'] == '2') { ?>
                        Kejadian Reaksi Obat
                    <?php } elseif ($result['FS_KEJADIAN_REAKSI'] == '3') { ?>
                        Kejadian Reaksi Sedasi Moderate Atau Dalam
                    <?php } elseif ($result['FS_KEJADIAN_REAKSI'] == '4') { ?>
                        Kejadian Reaksi Anestesi
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><strong>Nama Obat : </strong>
                    <?= $result['FS_NM_OBAT']; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><strong>Efek Yang Timbul : </strong>
                    <?= $result['FS_JENIS_REAKSI']; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><strong>Tindak Lanjut : </strong><br><?= $result['FS_TINDAKAN_TRANS']; ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;border-bottom:solid 1px #000000;"><strong>Kesudahan Efek : </strong><br><?= $result['FS_ANALISIS']; ?></td>
            </tr>
        </tbody>
    </table>
</page>