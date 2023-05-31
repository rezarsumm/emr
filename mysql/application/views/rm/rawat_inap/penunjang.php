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
                    <h3><?= $header1['pref_value']; ?></h3>
                    <h5><?= $header2['pref_value']; ?></h5>
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
        <col style="width: 100%;background-color: #000000;color: #ffffff;padding: 0px;font-size: 12px;">
        <tr>
            <td align="center">
                <br><strong>HASIL PENUNJANG DIAGNOSIS</strong>
            </td>
        </tr>
        </tbody>
    </table>
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
            <col style="width: 16%;font-size: 10px;">
            <col style="width: 45%;font-size: 10px;">
            <col style="width: 18%;font-size: 10px;">
            <col style="width: 18%;font-size: 10px;">
            <tbody>
                <tr>
                    <td style="border-bottom:solid 1px #000000;" colspan="4"><b>HASIL LABORATORIUM</b></td>
                </tr>
                <tr>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><b>Tanggal Pemeriksaan</b></td>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><b>Jenis Pemeriksaan</b></td>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><b>Nilai Rujukan</b></td>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><b>Hasil</b></td>
                </tr>
                <?php foreach ($rs_lab as $lab) {
                    $data['rujukan']=$this->m_rawat_jalan->get_data_rujukan_lab(array($lab['fs_kd_jenis_pemeriksaan'],$rs_pasien['FS_JNS_KELAMIN'],$rs_pasien['fn_umur']));
                    ?>
                    <tr 
                        <?php 
                        if (($no++ % 2) <> 1){
                            echo "style=background-color:#cccccc;";
                            
                        } 
                        ?>>
                        <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:left;border-right:solid 1px #000000;border-top:solid 1px #000000;"><br><?= date("d-m-Y",  strtotime($lab['fd_tgl_trs']));?> <?= $lab['fs_jam_trs'];?> <br></td>
                        <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:left;border-right:solid 1px #000000;border-top:solid 1px #000000;"><br><?= $lab['fs_nm_jenis_pemeriksaan']; ?><br></td>
                        <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><br><?= $data['rujukan']['fs_ket_normal']; ?><br></td>
                        <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><br><?= $lab['FS_HASIL']; ?><br></td>
                    </tr>
                    
                <?php } ?>
            </tbody>
        </table>
</page>