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
            <col style="width: 10%;font-size: 12px;">
            <col style="width: 45%;font-size: 12px;">
            <col style="width: 45%;font-size: 12px;">
            <tr>
                <td>
                    <img src="<?php base_url() ?>resource/doc/images/icon/logo.png" width="70" height="70" />
                </td>
                <td style="text-align: center;">
                    <h3><?= $header1['pref_value'];?></h3>
                    <h5><?= $header2['pref_value'];?></h5>
                </td>
                <td valign="top">
                    Nama : <?php echo $rs_pasien['fs_nm_pasien']; ?><br>
                    No MR : <?php echo $rs_pasien['fs_mr']; ?><br>
                    Tgl Lahir : <?php echo date('d-M-Y', strtotime($rs_pasien['FD_TGL_LAHIR'])); ?>
                </td>
            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 100%;">
            <tr>
                <td style="text-align: left; width: 50%">&nbsp;</td>
                <td style="text-align: center; width: 50%">
                    <table class="content">
                        <col style="width: 40%;font-size: 12px;">
                        <col style="width: 60%;font-size: 12px;">
                        <tbody>
                            <tr>
                                <td></td>
                                <td style="text-align: center;">
                                    <?php if ($rs_resume['FD_TGL_PULANG']=='3000-01-01'){?>
                                    Tanggal : <?= date('d-m-Y'); ?>, Jam : <?= date('H:i:s'); ?> 
                                    <?php }else{
                                        echo 'Tanggal : ',date('d-M-Y', strtotime($rs_resume['FD_TGL_PULANG']));
                                    }
                                    ?>
                                    <br>
                                    Tanda Tangan dan Nama DPJP </td>
                            </tr>
                            <?php if ($rs_resume['FS_VERIF_DOKTER']=='0'){?>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
                            </tr>
                            <?php }else{?>
                              <tr>
                              <td></td>
                              <td>
                                  <barcode type="C39" value="<?= $rs_resume['FS_VERIF_DOKTER']; ?>" style="width:30mm; height:6mm; font-size: 1mm"></barcode>
                    
                              <!--<qrcode value="" ec="H" style="width: 30mm; background-color: white; color: black;"></qrcode>
                              -->
                              </td>
                              </tr>
                              <tr>
                              <td style="text-align: center;"></td>
                              <td style="text-align: center;">(<?= $rs_resume['FS_NM_PEG']; ?>)</td>
                              </tr>
                              <?php } ?>
                        </tbody>
                    </table>
                </td>
            </tr>
            <hr>
            <tr>
                <td style="font-size: 10px;">Created By : Elektronic Medical Record <?= $rs_resume['created']; ?> @ <?= $rs_resume['mdd']; ?> <?= $rs_resume['mdd_time']; ?></td>
                
            </tr>
            <tr>
                <td style="font-size: 10px;">Edited By : Elektronic Medical Record <?= $rs_resume['edited']; ?> @ <?= $rs_resume['mdd_update']; ?> <?= $rs_resume['mdd_time_update']; ?></td>
            </tr>
        </table>
        <!--<table style="width: 100%; border-top: solid 1px black;">
            <tr>
                <td style="text-align: left; width: 80%"><i></i></td>
                <td style="text-align: right; width: 20%">Halaman [[page_cu]]/[[page_nb]]</td>
            </tr>
        </table>-->
    </page_footer>
    <table class="content">
        <tbody>
        <col style="width: 100%;background-color: #000000;color: #ffffff;padding: 0px;font-size: 12px;">
        <tr>
            <td align="center">
                <br><strong>RESUME PASIEN PULANG</strong>
            </td>
        </tr>
        </tbody>
    </table>
    <table class="content">
        <col style="width: 13%;font-size: 12px;">
        <col style="width: 1%;font-size: 12px;">
        <col style="width: 17%;font-size: 12px;">
        <col style="width: 16%;font-size: 12px;">
        <col style="width: 1%;font-size: 12px;">
        <col style="width: 16.8%;font-size: 12px;">
        <col style="width: 16%;font-size: 12px;">
        <col style="width: 1%;font-size: 12px;">
        <col style="width: 16%;font-size: 12px;">
        <tbody>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000; ">Tanggal Masuk</td>
                <td style="border-bottom:solid 1px #000000;" >:</td>
                <td style="border-bottom:solid 1px #000000;"><?php echo date('d-M-Y', strtotime($rs_pasien['fd_tgl_masuk'])); ?></td>
                <td style="border-bottom:solid 1px #000000;">Tanggal keluar</td>
                <td style="border-bottom:solid 1px #000000;">:</td>
                <td style="border-bottom:solid 1px #000000;"><?php echo date('d-M-Y', strtotime($rs_resume['FD_TGL_PULANG'])); ?></td>
                <td style="border-bottom:solid 1px #000000;">Ruang perawatan terakhir</td>
                <td style="border-bottom:solid 1px #000000;">:</td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;"><?php echo $rs_pasien['layanan_akhir']; ?></td>
            </tr>
        </tbody>
    </table>
    <table class="content">
        <col style="width: 50%;font-size: 12px;">
        <col style="width: 50.2%;font-size: 12px;">
        <tbody>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;">Diagnosa saat masuk : <?php echo $rs_resume['FS_KELUHAN_UTAMA']; ?></td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">Indikasi dirawat : 
                    <?php
                    foreach ($rs_indikasi as $indikasi) {
                        echo $indikasi['FS_NM_INDIKASI_DIRAWAT'];
                    }
                    ?>
                    <?= $rs_resume['FS_KET_INDIKASI']; ?>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="content">
        <col style="width: 30%;font-size: 12px;">
        <col style="width: 70.2%;font-size: 12px;">
        <tbody>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;">Ringkasan riwayat penyakit</td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><?php echo $rs_resume['FS_RIWAYAT_PENYAKIT']; ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;">Pemeriksaan fisik</td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><?php echo $rs_resume['FS_PEMERIKSAAN_FISIK']; ?>, S : <?= $rs_resume['FS_SUHU1']; ?> C, N : <?= $rs_resume['FS_NADI1']; ?> x/Menit, R : <?= $rs_resume['FS_R1']; ?> x/Menit, TD :  <?= $rs_resume['FS_TD1']; ?> mmHg</td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;">Pemeriksaan penunjang terpenting </td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><?php echo $rs_resume['FS_PEMERIKSAAN_PENUNJANG']; ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;">Terapi / Pengobatan selama di rumah sakit</td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><?php echo $rs_resume['FS_TERAPI']; ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;">Hasil laboratorium belum selesai</td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                    <?php
                    if ($rs_resume['FS_HASIL_LAB'] != 'NULL') {
                        echo $rs_resume['FS_HASIL_LAB'];
                    } else {
                        echo '';
                    }
                    ?> &nbsp;

                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;">Alergi (reaksi obat)</td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                    <?php
                    if ($rs_resume['FS_ALERGI'] != 'NULL') {
                        echo $rs_resume['FS_ALERGI'];
                    } else {
                        echo '';
                    }
                    ?> &nbsp;

                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;">Diet</td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                    <?php
                    foreach ($rs_diet as $diet) {
                        echo $diet['FS_NM_DIET'] . ',';
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;">Pengobatan dilanjutkan</td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                    <?php
                    if (empty($rs_resume['FD_TGL_KONTROL'])) {
                        echo '';
                    } else {
                        ?>
                        POLIKLINIK <?= $rs_resume['FS_NM_LAYANAN']; ?>  <?= $rs_resume['FS_KET_KONTROL']; ?>, Tanggal Kontrol :  <?= date('d-M-Y', strtotime($rs_resume['FD_TGL_KONTROL'])); ?> , Jam : <?= $rs_resume['FS_JAM_KONTROL']; ?>
                        <br>
                        <?php
                        if (empty($rs_resume['FS_KD_LAYANAN2']) OR ( $rs_resume['FS_KD_LAYANAN2'] == ' ')OR ( $rs_resume['FS_KD_LAYANAN2'] == 'NULL')) {
                            echo'';
                        } else {
                            echo 'POLIKLINIK 2 ' . $rs_resume[FS_NM_LAYANAN2] . '' . $rs_resume['FS_KET_KONTROL'] . ', Tanggal Kontrol :  ' . date('d-M-Y', strtotime($rs_resume[FD_TGL_KONTROL2])) . ' , Jam : ' . $rs_resume[FS_JAM_KONTROL2] . '';
                        }
                        ?>
                    <?php } ?>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="content">
        <col style="width: 30%;font-size: 12px;">
        <col style="width: 50.2%;font-size: 12px;">
        <col style="width: 20%;font-size: 12px;">
        <tbody>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;">Diagnosis Utama</td>
                <td style="border-bottom:solid 1px #000000;">
                    <?= $rs_resume['FS_DIAG_UTAMA']; ?>
                </td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                    ICD 10 <?= $rs_resume['FS_DIAG_UTAMA_ICD']; ?>
                </td>
            </tr>

            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;border-bottom:solid 1px #000000;">Diagnosis Sekunder</td>
                <td style="border-bottom:solid 1px #000000;"></td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;"></td>
            </tr>
            <?php foreach ($rs_diag as $diag) { ?>
                <tr>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;"></td>
                    <td style="border-bottom:solid 1px #000000;">
                        <?= $diag['FS_NM_DIAG_SEK']; ?>
                    </td>
                    <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                        ICD 10 : <?= $diag['ICD10']; ?>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;border-bottom:solid 1px #000000;">Tindakan / Prosedur</td>
                <td style="border-bottom:solid 1px #000000;"></td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;"></td>
            </tr>
            <?php foreach ($rs_tind as $tind) { ?>
                <tr>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;"></td>
                    <td style="border-bottom:solid 1px #000000;">
                        <?= $tind['FS_NM_TIND']; ?>
                    </td>
                    <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                        ICD 9 CM : <?= $tind['ICD9CM']; ?>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td style="border-top:solid 1px #000000;border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;"><b>Keadaan Pasien Saat pulang</b></td>
                <td style="border-bottom:solid 1px #000000;border-top:solid 1px #000000;"></td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;"></td>
            </tr>
        </tbody>
    </table>
    <table class="content">
        <col style="width: 30%;font-size: 12px;">
        <col style="width: 70.2%;font-size: 12px;">
        <tbody>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;">Keadaan Umum</td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                    <?= ($rs_resume['FS_KEADAAN_UMUM_BAIK'] == "YA" ? "Baik," : "") ?>
                    <?= ($rs_resume['FS_KEADAAN_UMUM_MASIH_SAKIT'] == "YA" ? "Masih Sakit," : "") ?>
                    <?= ($rs_resume['FS_KEADAAN_UMUM_SESAK'] == "YA" ? "Sesak," : "") ?>
                    <?= ($rs_resume['FS_KEADAAN_UMUM_PUCAT'] == "YA" ? "Pucat" : "") ?>
                    <?= ($rs_resume['FS_KEADAAN_UMUM_LEMAH'] == "YA" ? "Lemah" : "") ?>
                    <?= ($rs_resume['FS_KEADAAN_UMUM_LAIN'] != "0" ? "Lainnya : " . $rs_resume['FS_KEADAAN_UMUM_LAIN'] . "" : "") ?>

                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;">Vital Sign</td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                    S : <?= $rs_resume['FS_SUHU']; ?> C, N : <?= $rs_resume['FS_NADI']; ?> x/Menit, R : <?= $rs_resume['FS_R']; ?> x/Menit, TD :  <?= $rs_resume['FS_TD']; ?> mmHg
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;">Pemeriksaan Fisik</td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                    <?= ($rs_resume['FS_PEM_FISIK1'] == "YA" ? "Tak Anemis," : "") ?>
                    <?= ($rs_resume['FS_PEM_FISIK2'] == "YA" ? "Anemis," : "") ?>
                    <?= ($rs_resume['FS_PEM_FISIK3'] == "YA" ? "COR Dalam Batas Normal," : "") ?>
                    <?= ($rs_resume['FS_PEM_FISIK4'] == "YA" ? "Kardiomegali," : "") ?>
                    <?= ($rs_resume['FS_PEM_FISIK5'] == "YA" ? "Paru Dalam Batas Normal," : "") ?>
                    <?= ($rs_resume['FS_PEM_FISIK6'] == "YA" ? "Ekstremitas Dalam Batas Normal," : "") ?>
                    <?= ($rs_resume['FS_PEM_FISIK7'] != "YA" && $rs_resume['FS_PEM_FISIK7'] != "0" && $rs_resume['FS_PEM_FISIK7'] != "1" ? $rs_resume['FS_PEM_FISIK7'] : "") ?>
                </td>
            </tr>
            <!--<tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;">Catatan Hal Penting</td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
            <?= $rs_resume['FS_CAT_HAL_PENTING']; ?> 
                </td>
            </tr>-->
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;">Cara Pulang</td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                    <?= ($rs_resume['FS_CARA_PULANG'] == "1" ? "Sembuh" : "") ?>
                    <?= ($rs_resume['FS_CARA_PULANG'] == "2" ? "Tampak Masih Sakit" : "") ?>
                    <?= ($rs_resume['FS_CARA_PULANG'] == "3" ? "Pulang Atas Peremintaan Sendiri" : "") ?>
                    <?= ($rs_resume['FS_CARA_PULANG'] == "4" ? "Meninggal" : "") ?>
                    <?= ($rs_resume['FS_CARA_PULANG'] == "5" ? "Pindah Rumah Sakit" : "") ?>
                    <?= ($rs_resume['FS_CARA_PULANG'] != "1" && $rs_resume['FS_CARA_PULANG'] != "2" && $rs_resume['FS_CARA_PULANG'] != "3" && $rs_resume['FS_CARA_PULANG'] != "4" && $rs_resume['FS_CARA_PULANG'] != "5" && $rs_resume['FS_CARA_PULANG'] != "NULL" && $rs_resume['FS_CARA_PULANG'] != "" ? "Lainnya, " . $rs_resume['FS_CARA_PULANG'] . "" : "") ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;">Instruksi/Anjuran edukasi</td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                    <?= ($rs_resume['FS_INSTRUKSI1'] == "YA" ? "Istirahat Cukup,<br>" : "") ?>
                    <?= ($rs_resume['FS_INSTRUKSI2'] == "YA" ? "Kontrol Sesuai Waktu Yang Di Anjurkan,<br>" : "") ?>
                    <?= ($rs_resume['FS_INSTRUKSI3'] == "YA" ? "Minum Obat Sesuai Anjuran,<br>" : "") ?>
                    <?= ($rs_resume['FS_INSTRUKSI4'] == "YA" ? "Tingkatkan Latihan,<br>" : "") ?>
                    <?= ($rs_resume['FS_INSTRUKSI5'] == "YA" ? "Hubungi (0274)6499118 IGD RS PKU Muhammadiyah Gamping bila dalam keadaan gawat darurat," : "") ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;"><b>Terapi saat pulang</b></td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">

                </td>
            </tr>
        </tbody>
    </table>
    <table class="content">
        <col style="width: 21%;font-size: 12px;">
        <col style="width: 19.6%;font-size: 12px;">
        <col style="width: 19.6%;font-size: 12px;">
        <col style="width: 19.6%;font-size: 12px;">
        <col style="width: 20.4%;font-size: 12px;">
        <tbody>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;"><b>Nama Obat</b></td>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;"><b>Jumlah</b></td>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;"><b>Dosis</b></td>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;"><b>Frekwensi</b></td>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;"><b>Cara Pemakaian</b></td>
            </tr>
            <?php if ($rs_resume['FS_CARA_PULANG']=='4'){
              echo '';  
            }else{
            ?>
            <?php foreach ($rs_terapi as $terapi) { ?>
                <tr>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><?= $terapi['FS_NM_OBAT']; ?></td>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><?= $terapi['FS_JML_OBAT']; ?></td>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><?= $terapi['FS_DOSIS_OBAT']; ?></td>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><?= $terapi['FS_FREK_OBAT']; ?></td>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><?= $terapi['FS_CARA_PEM_OBAT']; ?></td>
                </tr>
            <?php } }?>
        </tbody>
    </table>
</page>