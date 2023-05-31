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
                    <h3>RS PKU MUHAMMADIYAH <br>GAMPING</h3>
                    <h5>Jl. Wates KM. 5.5, Gamping, Sleman 555294</h5>
                </td>
                <td style="width:45%;" valign="top">
                    Nama : <?php echo $rs_pasien['fs_nm_pasien']; ?><br>
                    No MR : <?php echo $rs_pasien['fs_mr']; ?><br>
                    Tgl Lahir : <?php echo date('d-M-Y', strtotime($rs_pasien['FD_TGL_LAHIR'])); ?>
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
                <br><strong>CATATAN EDUKASI</strong>
            </td>
        </tr>
        </tbody>
    </table>
    <table class="content">
        <col style="width: 50%;font-size: 12px;">
        <col style="width: 50%;font-size: 12px;">
        <tbody>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000; ">Kemampuan Berbahasa</td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;">
                    <?php
                    if ($rs_rm10['FS_TIPE_BAHASA1'] == 1) {
                        echo "Bahasa Indonesia : ";
                    } elseif ($rs_rm10['FS_TIPE_BAHASA1'] == 2) {
                        echo "Bahasa Jawa : ";
                    } elseif ($rs_rm10['FS_TIPE_BAHASA1'] == 3) {
                        echo "Bahasa Inggris : ";
                    } elseif ($rs_rm10['FS_TIPE_BAHASA1'] == 4) {
                        echo "Bahasa Arab : ";
                    } else {
                        echo "-";
                    }
                    ?>
                    <?php
                    if ($rs_rm10['FS_BAHASA1'] == 1) {
                        echo "Baik";
                    } elseif ($rs_rm10['FS_BAHASA1'] == 2) {
                        echo "Cukup Baik";
                    } else {
                        echo "-";
                    }
                    ?><br>
                    <?php
                    if ($rs_rm10['FS_TIPE_BAHASA2'] == 1) {
                        echo "Bahasa Indonesia : ";
                    } elseif ($rs_rm10['FS_TIPE_BAHASA2'] == 2) {
                        echo "Bahasa Jawa : ";
                    } elseif ($rs_rm10['FS_TIPE_BAHASA2'] == 3) {
                        echo "Bahasa Inggris : ";
                    } elseif ($rs_rm10['FS_TIPE_BAHASA2'] == 4) {
                        echo "Bahasa Arab : ";
                    } else {
                        echo "-";
                    }
                    ?>
                    <?php
                    if ($rs_rm10['FS_BAHASA2'] == 1) {
                        echo "Baik";
                    } elseif ($rs_rm10['FS_BAHASA2'] == 2) {
                        echo "Cukup Baik";
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
<?php foreach ($rs_rm10all as $data) { ?>
        <table class="content">
            <col style="width: 50%;font-size: 10px;">
            <col style="width: 50%;font-size: 10px;">
            <tbody>
                <tr>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;">Topik Edukasi</td>
                    <td style="border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;"><?= $data['FS_TOPIK'] ?></td>
                </tr>
                <tr>    
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;">Diberikan Kepada</td>
                    <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;border-top:solid 1px #000000;"> <?= $data['FS_DIBERIKAN'] ?></td>
                </tr>
                <tr>    
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;">Diberikan Oleh</td>
                    <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;border-top:solid 1px #000000;"> <?= $data['FS_NM_PEG'] ?></td>
                </tr>
            </tbody>
        </table>

        <table class="content">
            <col style="width: 10%;font-size: 8px;">
            <col style="width: 10%;font-size: 8px;">
            <col style="width: 10%;font-size: 8px;">
            <col style="width: 10%;font-size: 8px;">
            <col style="width: 10%;font-size: 8px;">
            <col style="width: 10%;font-size: 8px;">
            <col style="width: 10%;font-size: 8px;">
            <col style="width: 10%;font-size: 8px;">
            <col style="width: 10%;font-size: 8px;">
            <col style="width: 10%;font-size: 8px;">
            <tbody>
                <tr>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;">Tanggal & Jam Edukasi</td>
                    <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;">Kebutuhan Edukasi</td>
                    <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;">Tujuan</td>
                    <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;">Kemampuan Belajar</td>
                    <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;">Kesiapan Belajar </td>
                    <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;">Hambatan</td>
                    <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;">Intervensi</td>
                    <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;">Metode</td>
                    <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;">Hasil</td>
                    <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;">Edukator</td>
                </tr>
                <tr>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;">
                        <?= date('d-M-Y', strtotime($data['FS_TANGGAL'])); ?>
                        <br><br>
                        <?= $data['FS_JAM_MULAI'];?> - <?= $data['FS_JAM_SELESAI'];?>
                    </td>
                    <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;">
                        <?php
                        if ($data['FS_KEBUTUHAN'] == 1) {
                            echo 'TINDAKAN PENCEGAHAN';
                        } elseif ($data['FS_KEBUTUHAN'] == 2) {
                            echo 'TINTERVENSI DIET';
                        } elseif ($data['FS_KEBUTUHAN'] == 3) {
                            echo 'PERALATAN KHUSUS';
                        } elseif ($data['FS_KEBUTUHAN'] == 4) {
                            echo 'PENCEGAHAN RISIKO JATUH';
                        } elseif ($data['FS_KEBUTUHAN'] == 5) {
                            echo 'MANAJEMEN NYERI';
                        } elseif ($data['FS_KEBUTUHAN'] == 6) {
                            echo 'PENYAKIT KHUSUS';
                        } elseif ($data['FS_KEBUTUHAN'] == 7) {
                            echo 'PENGOBATAN';
                        } elseif ($data['FS_KEBUTUHAN'] == 8) {
                            echo 'EDUKASI DIABETES';
                        } elseif ($data['FS_KEBUTUHAN'] == 9) {
                            echo 'TRANFUSI DARAH';
                        } elseif ($data['FS_KEBUTUHAN'] == 10) {
                            echo 'VAKSINASI';
                        } elseif ($data['FS_KEBUTUHAN'] == 11) {
                            echo 'AKSES PELAYANAN';
                        } else {
                            echo '-';
                        }
                        ?>
                    </td>
                    <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;">
                        <?php
                        if ($data['FS_TUJUAN'] == 1) {
                            echo 'MULAI MENGGUNAKAN INFORMASI YANG DIDAPAT';
                        } elseif ($data['FS_TUJUAN'] == 2) {
                            echo 'DAPAT MENGUNGKAPKAN SECARA LISAN INFORMASI YANG DIDAPAT';
                        } else {
                            echo '-';
                        }
                        ?>
                    </td>
                    <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;">
                        <?php
                        if ($data['FS_KEMAMPUAN'] == 1) {
                            echo 'DAPAT MENGUBAH PERILAKU';
                        } elseif ($data['FS_KEMAMPUAN'] == 2) {
                            echo 'DAPAT MENGUASAI INFORMASI';
                        } elseif ($data['FS_KEMAMPUAN'] == 3) {
                            echo 'TIDAK JELAS PADA SAAT INI';
                        } else {
                            echo '-';
                        }
                        ?>
                    </td>
                    <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;">
                        <?php
                        if ($data['FS_KESIAPAN'] == 1) {
                            echo 'SIAP';
                        } elseif ($data['FS_KESIAPAN'] == 2) {
                            echo 'TERTARIK';
                        } elseif ($data['FS_KESIAPAN'] == 3) {
                            echo 'TIDAK TERTARIK / TIDAK MAMPU';
                        } else {
                            echo '-';
                        }
                        ?>
                    </td>
                    <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;">
                        <?php
                        if ($data['FS_HAMBATAN'] == 1) {
                            echo 'TIDAK ADA';
                        } elseif ($data['FS_HAMBATAN'] == 2) {
                            echo 'TAKUT';
                        } elseif ($data['FS_HAMBATAN'] == 3) {
                            echo 'TIDAK TERTARIK';
                        } elseif ($data['FS_HAMBATAN'] == 4) {
                            echo 'NYERI / TIDAK NYAMAN';
                        } elseif ($data['FS_HAMBATAN'] == 5) {
                            echo 'GANGGUAN KOGNITIF';
                        } elseif ($data['FS_HAMBATAN'] == 6) {
                            echo 'HAMBATAN BAHASA';
                        } else {
                            echo '-';
                        }
                        ?>
                    </td>
                    <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;">
                        <?php
                        if ($data['FS_INTERVENSI'] == 1) {
                            echo 'TIDAK ADA';
                        } elseif ($data['FS_INTERVENSI'] == 2) {
                            echo 'MEMBATASI MATERI';
                        } elseif ($data['FS_INTERVENSI'] == 3) {
                            echo 'MENGGUNAKAN PENTERJEMAH';
                        } elseif ($data['FS_INTERVENSI'] == 4) {
                            echo 'MENGULANGI EDUKASI';
                        } elseif ($data['FS_INTERVENSI'] == 5) {
                            echo 'MENGEDUKASI KELUARGA';
                        } else {
                            echo '-';
                        }
                        ?>
                    </td>
                    <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;">
                        <?php
                        if ($data['FS_METODE'] == 1) {
                            echo 'DEMONSTRASI';
                        } elseif ($data['FS_METODE'] == 2) {
                            echo 'DISKUSI';
                        } elseif ($data['FS_METODE'] == 3) {
                            echo 'LEAFLET / HAND OUT';
                        } else {
                            echo '-';
                        }
                        ?>
                    </td>
                    <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;">
                        <?php
                        if ($data['FS_HASIL'] == 1) {
                            echo 'MENUNJUKKAN TINGKAT PENGETAHUAN YANG DIHARAPKAN';
                        } elseif ($data['FS_HASIL'] == 2) {
                            echo 'MEMBUTUHKAN PETUNJUK TAMBAHAN';
                        } else {
                            echo '-';
                        }
                        ?>
                    </td>
                    <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;">
            <qrcode value="<?= $data['user_name'] ?>" ec="H" style="width: 10mm; background-color: white; color: black;"></qrcode>
            </td>
            </tr>
            </tbody>
        </table>
        <table class="content">
            <col style="width: 100%;font-size: 12px;">
            <tbody>
                <tr>
                    <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;border-left:solid 1px #000000">
                        Catatan : <?= $data['FS_CATATAN']; ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
<?php } ?>
</page>