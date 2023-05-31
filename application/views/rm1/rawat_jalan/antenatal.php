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
                <td style="width:45%;text-align: center;">
                    <h3><?= $header1['pref_value'];?></h3>
                    <h5><?= $header2['pref_value'];?></h5>
                </td>
                <td style="width:45%;" valign="top">
                    Nama : <?php echo $rs_pasien['FS_NM_PASIEN']; ?><br>
                    No MR : <?php echo $rs_pasien['FS_MR']; ?><br>
                    Tgl Lahir : <?php echo date('d-M-Y', strtotime($rs_pasien['FD_TGL_LAHIR'])); ?>
                </td>
            </tr>
        </table>
    </page_header>
            <table class="content">
        <tbody>
        <col style="width: 100%;background-color: #000000;color: #ffffff;padding: 0px;font-size: 12px;">
        <tr>
            <td align="center">
                <br><strong>CATATAN ANTENATAL CARE / ASESMEN ULANG KEBIDANAN</strong>
            </td>
        </tr>
        </tbody>
    </table>
    <table class="content">
        <col style="width: 34%;font-size: 10px;">
        <col style="width: 66%;font-size: 10px;">
        <tbody>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2"><b>Anamnesa (S)</b></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><?= strip_tags($result['FS_ANAMNESA']); ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2"><b>Pemeriksaan Fisik (O)</b></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><?=  strip_tags($result['FS_CATATAN_FISIK']); ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2"><b>Diagnosa (A)</b></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><?=  strip_tags($result['FS_DIAGNOSA']); ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2"><b>Dafar Masalah</b></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><?=  strip_tags($result['FS_DAFTAR_MASALAH']); ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;" colspan="2"><b>Tindakan (P)</b></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><?=  strip_tags($result['FS_TINDAKAN']); ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;border-bottom:solid 1px #000000;text-align: right; ">
                    Tanggal <?= $result['mdd']; ?> Jam <?= $result['FS_JAM_TRS']; ?><br>
                    <br><br>
                    <barcode type="C39" value="<?= $result['user_name'];?>" style="width:30mm; height:6mm; font-size: 1mm"></barcode>
                    <br><br>
                    <?= $result['FS_NM_PEG']; ?>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <table class="content">
        <col style="width: 33%;font-size: 10px;">
        <col style="width: 66%;font-size: 10px;">
        <tbody>
            <tr>
                <td style="border-bottom:solid 1px #000000;" colspan="2"><b>HASIL RADIOLOGI</b></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><b>Jenis Pemeriksaan</b></td>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><b>Hasil</b></td>
            </tr>
            <?php foreach ($rs_rad as $rad) {
                ?>
                <tr>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:left;border-right:solid 1px #000000;border-top:solid 1px #000000;"><?= $rad['FS_NM_TARIF']; ?></td>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;border-top:solid 1px #000000;"><?= $rad['fs_keterangan']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <br>
    <table class="content">
        <col style="width: 66%;font-size: 10px;">
        <col style="width: 33%;font-size: 10px;">
        <tbody>
            <tr>
                <td style="border-bottom:solid 1px #000000;" colspan="2"><b>HASIL LABORATORIUM</b></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><b>Jenis Pemeriksaan</b></td>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><b>Hasil</b></td>
            </tr>
            <?php foreach ($rs_lab as $lab) {
                ?>
                <tr>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:left;border-right:solid 1px #000000;border-top:solid 1px #000000;"><?= $lab['fs_nm_jenis_pemeriksaan']; ?></td>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><?= $lab['FS_HASIL']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <br>
    <table class="content">
        <col style="width: 33%;font-size: 10px;">
        <col style="width: 33%;font-size: 10px;">
        <col style="width: 33%;font-size: 10px;">
        <tbody>
            <tr>
                <td style="border-bottom:solid 1px #000000;" colspan="3"><b>RESEP</b></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><b>Nama Obat</b></td>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><b>Jumlah</b></td>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><b>Cara Pemakaian</b></td>
            </tr>
            <?php foreach ($rs_resep as $terapi) { ?>
                <tr>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:left;border-right:solid 1px #000000;border-top:solid 1px #000000;"><?= $terapi['FS_NM_BARANG']; ?></td>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><?= $terapi['FN_QTY_BARANG']; ?></td>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;border-top:solid 1px #000000;">
                        <?php if ($terapi['FS_ETIKET'] == 'ADA') { ?>

                            <?= $terapi['FS_ETIKET_QTY']; ?>x sehari <?= $terapi['FS_ETIKET_HARI']; ?> <?= $terapi['FS_NM_SATUANPAKAI_ETIKET']; ?> <?= $terapi['FS_NM_CARAPAKAI_ETIKET']; ?> <?= $terapi['FS_ETIKET_CATATAN']; ?>
                        <?php } else { ?>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</page>