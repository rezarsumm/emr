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
<page orientation="landscape" backtop="27mm" backbottom="10mm" backleft="2mm" backright="2mm" style="font-size:10pt">
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
                    <hr>
                    Tgl Masuk Rawat Inap : <?php echo date('d-m-Y', strtotime($rs_pasien['FD_TGL_MASUK'])); ?> / <?= $rs_pasien['FS_JAM_MASUK'];?>
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
        <col style="width: 100%;background-color: #000000;color: #ffffff;padding: 0px;font-size: 16px;">
        <tr>
            <td align="center">
                <br><strong>Rekonsiliasi Obat</strong>
            </td>
        </tr>
        </tbody>
    </table>
    <table class="content">
            <col style="width: 11%;font-size: 8px;">
            <col style="width: 8%;font-size: 8px;">
            <col style="width: 16%;font-size: 8px;">
            <col style="width: 5%;font-size: 8px;">
            <col style="width: 5%;font-size: 8px;">
            <col style="width: 8%;font-size: 8px;">
            <col style="width: 8%;font-size: 8px;">
            <col style="width: 16%;font-size: 8px;">
            <col style="width: 16%;font-size: 8px;">
            <col style="width: 7%;font-size: 8px;">
            <col style="width: 11%;font-size: 8px;">
            
            <tbody>
                <tr>
                    <td style="font-weight: bold;border-left:solid 1px #000000;border-right:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;;text-align:center;">
                        Tanggal
                    </td>
                   
                    <td style="font-weight: bold;border-right:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;;text-align:center;">Rekonsiliasi</td>
                    <td style="font-weight: bold;border-right:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;;text-align:center;">Nama Obat</td>
                    <td style="font-weight: bold;border-right:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;;text-align:center;">Dosis</td>
                    <td style="font-weight: bold;border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">Satuan</td>
                    <td style="font-weight: bold;border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">Frekuensi</td>
                    <td style="font-weight: bold;border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">Cara Pemberian</td>
                    <td style="font-weight: bold;border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">Tindak Lanjut</td>
                    <td style="font-weight: bold;border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">Perubahan Aturan Pakai</td>
                    <td style="font-weight: bold;border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">Petugas</td>
                </tr>
    <?php foreach ($rs_rekon_obat as $data) { ?>
        
                    <tr>
                        <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">
                                <?= date('d-m-Y', strtotime($data['mdd'])); ?>
                                    
                        </td>
                        <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">
                            <?php if ($data['FS_STATUS'] == '1') { ?>
                                    Admisi
                                <?php } elseif ($data['FS_STATUS'] == '2') { ?>
                                    Transfer
                                <?php } elseif ($data['FS_STATUS'] == '3') { ?>
                                    Discharge
                                    <?php } elseif ($data['FS_STATUS'] == '0') { ?>
                                    Tidak menggunakan obat sebelum masuk RS
                                <?php } else { ?>
                                    -
                                <?php } ?>
                        </td>
                        <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">
                                 <?= $data['FS_NM_BARANG']; ?> <?= $data['FS_KD_OBAT2']; ?>
                        </td>
                        <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">
                           <?= $data['FS_DOSIS']; ?>
                        </td>
                        <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">
                            <?= $data['FS_KD_SATUAN']; ?>
                        </td>
                        <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">
                            <?= $data['FS_FREKUENSI']; ?>
                                
                        </td>
                        <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">
                            <?= $data['FS_CARA_PEMBERIAN']; ?>
                               
                        </td>
                        <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">
                            <?php if ($data['FS_TINDAK_LANJUT'] == '1') { ?>
                                    Lanjut Aturan Pakai Sama
                                <?php } elseif ($data['FS_TINDAK_LANJUT'] == '2') { ?>
                                    Lanjut Aturan Pakai Berubah
                                <?php } elseif ($data['FS_TINDAK_LANJUT'] == '3') { ?>
                                    Stop
                                <?php } else { ?>
                                    -
                                <?php } ?>
                            
                        </td>
                        <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">
                            <?= $data['FS_PERUBAHAN']; ?>
                        </td>
                        <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">
                <qrcode value="<?= $data['mdd']; ?>" ec="H" style="width: 8mm; background-color: white; color: black;"></qrcode>
                <br>
                <?= $data['FS_NM_PEG'];?>
                </td>
                
                </tr>

    <?php } ?>
                            
            </tbody>
        </table>
</page>