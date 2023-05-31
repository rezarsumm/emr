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
            <td>
                <img src="<?php base_url() ?>resource/doc/images/icon/kopunisa.png" width="800" height="150" />
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
                    <br><u><strong>SURAT KETERANGAN SELESAI KARANTINA</strong></u><br>
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
                <td colspan="2">Yang bertanda tangan dibawah ini, menerangkan bahwa: <br><br></td>

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
                    Telah melaksanakan karantina di Pesantren Covid-19 RS PKU Muhammadiyah Gamping Shelter UNISA dan sudah melakukan karantina selama 10 hari terhitung setelah pemeriksaan swab dengan hasil terkonfirmasi dan tidak ditemukan tanda dan gejala ISPA, untuk selanjutnya di instruksikan untuk melanjutkan karantina di rumah selama 3 (tiga) hari dari tgl <b><?= date('d M Y', strtotime($rs_surat['FS_KETERANGAN2'])); ?> </b>

                    
                    <br>
                    <br>
                    Penatalaksanaan di rumah yaitu:
                    <br>
                    1.  selalu menggunakan masker,
                    <br>
                    2.  selalu melakukan cuci tangan dengan sabun
                    <br>
                    3.  menjaga jarak dengan orang lain sekitar 2 meter
                    <br>
                    4.  disediakan ruang terpisah untuk yang bersangkutan
                    <br>
                    5.  jika mengalami keluhan segera periksa ke pelayanan kesehatan terdekat
                    <br> <br>
                    Dengan demikian pada saat ini yang bersangkutan dinyatakan selesai karantina di Shelter UNISA.
                     <br>
Demikian surat keterangan ini dibuat dengan sebenarnya dan dipergunakan sebagaimana mestinya


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
                <td align='center'>
                    Pihak keluarga / Desa / Gugus Covid Daerah yang menjemput
                </td>
                <td align='center'>
                    Sleman, <?= date('d M Y', strtotime($rs_surat['FD_TGL_TRS'])); ?>
                    <br>
                    Dokter Penanggung Jawab Pasien
                    
                </td>
            </tr>
            <tr>
                <td></td>
                <td align='center'>
                    <br>
                    <br>
                    <br>
                    <br>
                </td>
            </tr>
            <tr>
                <td align='center'>
                    (................Nama Terang......................)
                    <br>
                    No Telp.
                </td>
                <td align='center'>
                    <u>dr. Masykur Rahmat</u>
                    <br>NBM. 1072.833
                </td>
            </tr>
        </tbody>
    </table>
</page>