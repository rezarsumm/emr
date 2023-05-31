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
                    <br><strong>ASESMEN CASE MANAGER</strong>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="content">
        <col style="width: 50%;font-size: 12px;">
        <col style="width: 50%;font-size: 12px;">
        <tbody>
            <tr>
                <td style="bordeR:solid 1px #000000;">Siapa yang merawat pasien sebelum pulang ?</td>
                <td style="border:solid 1px #000000;">
                    <?= $rs_mpp1['FS_PARAM1']; ?>
                </td>
            </tr>
            <tr>
                <td style="bordeR:solid 1px #000000;">Siapa yang merawat pasien setelah pulang ?</td>
                <td style="border:solid 1px #000000;">
                    <?= $rs_mpp1['FS_PARAM2']; ?>
                </td>
            </tr>
            <tr>
                <td style="bordeR:solid 1px #000000;">Pasien aktif di dalam organisasi (lingkungan dan tempat tinggal) ?</td>
                <td style="border:solid 1px #000000;">
                    <?php if($rs_mpp1['FS_PARAM3'] == '1'){
                        echo 'Ya';
                    }else{
                        echo 'Tidak';
                    } ?>
                </td>
            </tr>
            <tr>
                <td style="bordeR:solid 1px #000000;">Pasien datang dengan ambulance? </td>
                <td style="border:solid 1px #000000;">
                    <?php if($rs_mpp1['FS_PARAM4'] == '1'){
                        echo 'Ya';
                    }else{
                        echo 'Tidak';
                    } ?>
                </td>
            </tr>
            <tr>
                <td style="bordeR:solid 1px #000000;"> Jika ya, sebutkan nama ambulance yang mengantarkan</td>
                <td style="border:solid 1px #000000;">
                    <?php if($rs_mpp1['FS_PARAM4'] == '1'){
                        echo $rs_mpp1['FS_PARAM5'];
                    }else{
                        echo '-';
                    } ?>
                </td>
            </tr>
            <tr>
                <td style="bordeR:solid 1px #000000;"> Pertanggungan asuransi untuk layanan pasca rawat inap ?</td>
                <td style="border:solid 1px #000000;">
                    <?php if($rs_mpp1['FS_PARAM6'] == '1'){
                        echo 'Ya';
                    }else{
                        echo 'Tidak';
                    } ?>
                </td>
            </tr> 
            <tr>
                <td style="bordeR:solid 1px #000000;">Home care</td>
                <td style="border:solid 1px #000000;">
                    <?php if($rs_mpp1['FS_PARAM7'] == '1'){
                        echo 'Ya';
                    }else{
                        echo 'Tidak';
                    } ?>
                </td>
            </tr>
            <tr>
                <td style="bordeR:solid 1px #000000;">Rehabilitasi</td>
                <td style="border:solid 1px #000000;">
                    <?php if($rs_mpp1['FS_PARAM8'] == '1'){
                        echo 'Ya';
                    }else{
                        echo 'Tidak';
                    } ?>
                </td>
            </tr>
            <tr>
                <td style="bordeR:solid 1px #000000;">Kontrol di RS</td>
                <td style="border:solid 1px #000000;">
                    <?php if($rs_mpp1['FS_PARAM9'] == '1'){
                        echo 'Ya';
                    }else{
                        echo 'Tidak';
                    } ?>
                </td>
            </tr>
            <tr>
                <td style="bordeR:solid 1px #000000;">Apakah pasien sudah tau informasi awal tentang penyakitnya ?</td>
                <td style="border:solid 1px #000000;">
                    <?php if($rs_mpp1['FS_PARAM10'] == '1'){
                        echo 'Sudah';
                    }else{
                        echo 'Belum';
                    } ?>
                </td>
            </tr>
            <tr>
                <td style="bordeR:solid 1px #000000;">Apakah ada kebutuhan ambulasi setelah pulang?</td>
                <td style="border:solid 1px #000000;">
                    <?php if($rs_mpp1['FS_PARAM11'] == '1'){
                        echo 'Ya';
                    }else{
                        echo 'Tidak';
                    } ?>
                    ,
                    <?php if($rs_mpp1['FS_PARAM11'] == '1'){
                        echo $rs_mpp1['FS_PARAM12'];
                    }else{
                        echo '-';
                    } ?>
                </td>
            </tr>
            <tr>
                <td style="bordeR:solid 1px #000000;">Harapan terhadap hasil asuhan dan kemampuan untuk menerima perubahan?</td>
                <td style="border:solid 1px #000000;">
                    <?= $rs_mpp1['FS_PARAM13']; ?>
                </td>
            </tr>
            <tr>
                <td style="bordeR:solid 1px #000000;">Identifikasi Masalah</td>
                <td style="border:solid 1px #000000;">
                    <?= $rs_mpp1['FS_PARAM14']; ?>
                </td>
            </tr>
            <tr>
                <td style="bordeR:solid 1px #000000;">Perencanaan Manajemen Pelayanan Pasien</td>
                <td style="border:solid 1px #000000;">
                    <?= $rs_mpp1['FS_PARAM15']; ?>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="content">
        <col style="width: 33%;font-size: 10px;">
        <col style="width: 33%;font-size: 10px;">
        <col style="width: 34%;font-size: 10px;">
        <tbody>
            <tr>
               <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align: center;"></td>
               <td style="border-bottom:solid 1px #000000;text-align: center;"></td>
               <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;text-align: center;">
                  Tanggal <?= date('d-m-Y', strtotime($rs_mpp1['mdd_date']));?> Jam <?= $rs_mpp1['mdd_time'];?>
                  <br><br>
                  <qrcode value="<?= $rs_mpp1['FS_NM_PEG']; ?> pada <?= $rs_mpp1['mdd_date']; ?> <?= $rs_mpp1['mdd_time']; ?>" ec="H" style="width: 15mm; background-color: white; color: black;"></qrcode>

                  <br><br>
                  <?= $rs_mpp1['FS_NM_PEG']; ?>
              </td>
          </tr>
      </tbody>
  </table>
</page>

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
                    <br><strong>CATATAN IMPLEMENTASI CASE MANAGER</strong>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="content">
        <col style="width: 10%;font-size: 12px;">
        <col style="width: 20%;font-size: 12px;">
        <col style="width: 30%;font-size: 12px;">
        <col style="width: 30%;font-size: 12px;">
        <col style="width: 10%;font-size: 12px;">
        <tbody>
            <tr>
                <td style="border:solid 1px #000000;text-align: center;font-weight: bold;">Tgl/Jam</td>
                <td style="border:solid 1px #000000;text-align: center;font-weight: bold;">Impelemntasi</td>
                <td style="border:solid 1px #000000;text-align: center;font-weight: bold;">Detil Implementasi</td>
                <td style="border:solid 1px #000000;text-align: center;font-weight: bold;">Keterangan</td>
                <td style="border:solid 1px #000000;text-align: center;font-weight: bold;">Paraf</td>
            </tr>
            <?php foreach ($rs_mpp2 as $value) { ?>            
            <tr>
                <td style="bordeR:solid 1px #000000;">
                    <?= $value['mdd_date'];?> / <?= $value['mdd_time'];?>
                </td>
                <td style="border:solid 1px #000000;">
                    <?= $value['FS_IMPLEMENTASI']; ?>
                </td> 
                <td style="border:solid 1px #000000;">
                    <?= $value['FS_IMPLEMENTASI2']; ?>
                </td>
                 <td style="border:solid 1px #000000;">
                    <?= $value['FS_KET']; ?>
                </td>
                <td style="border:solid 1px #000000;">
                    <qrcode value="<?= $value['FS_NM_PEG']; ?> pada <?= $value['mdd_date']; ?> <?= $value['mdd_time']; ?>" ec="H" style="width: 15mm; background-color: white; color: black;"></qrcode>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</page>