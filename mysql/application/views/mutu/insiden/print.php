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
                    <h5>Jl. Wates KM. 5.5, Gamping, Sleman 555294</h5>
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
                <br><strong>LAPORAN INSIDEN KESELAMATAN PASIEN</strong>
            </td>
        </tr>
        </tbody>
    </table>
    <table class="content">
        <col style="width: 100%;font-size: 12px;">
        <tbody>
            <tr>
                <td style="text-align: center; ">KASUS : <?= strtoupper($result['FS_KASUS']); ?></td>
            </tr>
        </tbody>
    </table>
    <br>
    <table class="content">
        <col style="width: 100%;font-size: 12px;border-top:solid 1px #000000;">
        <tbody>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><strong>Tanggal Kejadian : </strong><?= date('d-M-Y',  strtotime($result['FD_TGL_KEJADIAN']))?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><strong>Grade Risiko : </strong>
                       <?php if($result['FS_KD_GRADE_RISIKO'] == "1"){
                   echo "Biru";
                }elseif($result['FS_KD_GRADE_RISIKO']=="2"){
                    echo "Hijau";
                }elseif($result['FS_KD_GRADE_RISIKO']=="3"){
                    echo"Kuning";
                }elseif($result['FS_KD_GRADE_RISIKO']=="4"){
                    echo"Merah";
                }
                   ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><strong>Nama Pasien : </strong><?= $result['fs_nm_pasien'];?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><strong>Nomor RM : </strong><?= $result['fs_mr'];?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><strong>Lokasi Kejadian : </strong><?= $result['FS_NM_LAYANAN']; ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><strong>Insiden Terjadi Pada : </strong><?= $result['FS_NM_SMF']; ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><strong>Unit Kerja Penyebab : </strong><?= $result['UNIT_PENYEBAB']; ?></td>
            </tr>
        <!--
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;border-bottom:solid 1px #000000;"><strong>Sasaran Keselamatan Pasien : </strong><?=$result['FS_NM_SASARAN']; ?></td>
            </tr>
        -->
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><strong>Dampak pada pasien : </strong>
                <?php if($result['FS_KD_DAMPAK_PASIEN'] == "1"){
                   echo "Kematian";
                }elseif($result['FS_KD_DAMPAK_PASIEN']=="2"){
                    echo "Cedera Berat";
                }elseif($result['FS_KD_DAMPAK_PASIEN']=="3"){
                    echo"Cedera Sedang";
                }elseif($result['FS_KD_DAMPAK_PASIEN']=="4"){
                    echo"Cedera Ringan";
                }elseif($result['FS_KD_DAMPAK_PASIEN']=="5"){
                    echo"Tidak Ada Cedera";
                }
                   ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><strong>Jenis Insiden : </strong>
                <?php if($result['FS_IKP'] == "1"){
                   echo "KNC";
                }elseif($result['FS_IKP']=="2"){
                    echo "KTD";
                }elseif($result['FS_IKP']=="3"){
                    echo"SENTINEL";
                }
                   ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><strong>Kronologis kejadian : </strong><br><?= $result['FS_KRONOLOGIS']; ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;">
                    <strong>Pemberi Laporan  : </strong>
                   <?php if($result['FS_PEMBERI_LAPORAN'] == "1"){
                   echo "Karyawan : Dokter/Perawat/Petugas Lainnya";
                }elseif($result['FS_PEMBERI_LAPORAN']=="2"){
                    echo "Pasien";
                }elseif($result['FS_PEMBERI_LAPORAN']=="3"){
                    echo"Keluarga / Pendamping Pasien";
                }elseif($result['FS_PEMBERI_LAPORAN']=="4"){
                    echo"Pengunjung";
                }elseif($result['FS_PEMBERI_LAPORAN']=="5"){
                    echo"Lainnya";
                }
                   ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><strong>Insiden terjadi pada : </strong>
                    <br><?= $result['FS_TINDAKAN']; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><strong>Tindakan Yang Telah Dilakukan : </strong><br><?= $result['FS_TINDAKAN']; ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><strong>Tindakan Dilakukan Oleh : </strong><br><?= $result['FS_TINDAKAN_OLEH']; ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;"><strong>Insiden serupa pernah terjadi : </strong><br><?= $result['FS_INSIDEN_SERUPA']; ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><strong>Analisa RCA : </strong><br><?= $result['FS_ANALISA_RCA']; ?></td>
            </tr>
        </tbody>
    </table>
    <!--<br>
    <table class="content">
        <col style="width: 100%;font-size: 12px;border-top:solid 1px #000000;">
        <tbody>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><strong>Mengapa 4 : </strong><br><?= $result['FS_MENGAPA4']; ?></td>
            </tr>
        </tbody>
    </table>
    <br>
    <table class="content">
        <col style="width: 100%;font-size: 12px;border-top:solid 1px #000000;">
        <tbody>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><strong>Mengapa 5 : </strong><br><?= $result['FS_MENGAPA5']; ?></td>
            </tr>
        </tbody>
    </table>
    <br>
    <table class="content">
        <col style="width: 100%;font-size: 12px;border-top:solid 1px #000000;">
        <tbody>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><strong>Rekomendasi dan Rencana Tindak Lanjut : </strong><br><?= $result['FS_REKOMENDASI']; ?></td>
            </tr>
        </tbody>
    </table>
    <br>
    <table class="content">
        <col style="width: 70%;font-size: 12px;">
        <col style="width: 30%;font-size: 12px;">
        <tbody>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;border-top:solid 1px #000000;"><strong>Rekomendasi</strong></td>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;border-top:solid 1px #000000;"><strong>Penanggung jawab</strong></td>
            </tr>
            <?php foreach ($rs_rekom as $rekom) { ?>
                <tr>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                        <?= $rekom['FS_REKOMENDASI']; ?>
                    </td>
                    <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                        <?= $rekom['FS_PJ']; ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <br>
    <table class="content">
        <col style="width: 70%;font-size: 12px;">
        <col style="width: 30%;font-size: 12px;">
        <tbody>
            <tr>
                <td style="border-left:solid 1px #000000;border-right:solid 1px #000000;border-top:solid 1px #000000;border-bottom:solid 1px #000000;"><strong>Tindakan yang akan dilakukan</strong></td>
                <td style="border-top:solid 1px #000000;border-right:solid 1px #000000;border-bottom:solid 1px #000000;"><strong>Penanggung jawab</strong></td>
            </tr>
            <?php foreach ($rs_tind as $tind) { ?>
                <tr>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;"> <?= $tind['FS_TINDAKAN']; ?></td>
                    <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                        <?= $tind['FS_PJ2']; ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <br>
    <table class="content">
        <col style="width: 50%;font-size: 12px;">
        <col style="width: 50%;font-size: 12px;">
        <tbody>
            <tr>
                <td style="border-left:solid 1px #000000;border-top:solid 1px #000000;"><strong></strong></td>
                <td style="border-right:solid 1px #000000;border-top:solid 1px #000000;">

                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"><strong>Penanggung Jawab : <?= $result['FS_NM_PEG'];?></strong></td>
                <td style="border-right:solid 1px #000000;"></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;"></td>
                <td style="border-right:solid 1px #000000;">
                    <strong>Tanggal Mulai Investigasi : <?= date('d-M-Y',  strtotime($result['FD_TGL_MULAI'])); ?></strong>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;">Tanda Tangan : </td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                    <strong>Tanggal Selesai Investigasi :  <?= date('d-M-Y', strtotime($result['FD_TGL_SELESAI'])); ?></strong>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <table class="content">
        <col style="width: 40%;font-size: 12px;">
        <col style="width: 60%;font-size: 12px;">
        <tbody>
            <tr>
                <td style="border-left:solid 1px #000000;border-top:solid 1px #000000;text-align:center;border-right:solid 1px #000000;"><b>Komite PMKP</b></td>
                <td style="border-left:solid 1px #000000;border-top:solid 1px #000000;border-bottom:solid 1px #000000;text-align:left;border-right:solid 1px #000000;"><b>Investigasi Lengkap :<?=($result['FS_KD_KELENGKAPAN'] == "1" ? "YA" : "TIDAK") ?> </b></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-top:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;"><br><br><br></td>
                <td style="border-left:solid 1px #000000;border-top:solid 1px #000000;border-bottom:solid 1px #000000;text-align:left;border-right:solid 1px #000000;">Diperlukan Investigasi Lebih Lanjut :<?=($result['FS_KD_KELANJUTAN'] == "1" ? "YA" : "TIDAK") ?></td>
            </tr>
        </tbody>
    </table>-->
</page>