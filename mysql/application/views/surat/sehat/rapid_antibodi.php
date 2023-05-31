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
            <td style="width:10%;" >
                <!--<img src="<?php base_url() ?>resource/doc/images/icon/logo.png" width="70" height="70" />-->
            </td>
            <td style="width:90%;text-align: center;">
                    <!--<h3><?= $header1['pref_value']; ?></h3>
                        <h5><?= $header2['pref_value']; ?></h5>-->
                    </td>

                </tr>
            </table>
            </page_header>

            <br><br><br><br><br><br><br><br> <br><br><br><br><br><br>
            <table class="content">
                <tbody>
                    <col style="width: 100%;padding: 0px;font-size: 16px;">
                    <tr>
                        <td align="center">
                            <br><u><strong>SURAT KETERANGAN RAPID TEST ANTIGEN</strong></u><br>
                            Nomor : <?= $rs_surat['FS_NO_SURAT'] ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br> <br>
            <table class="content">
                <col style="width: 30%;font-size: 12px;">
                <col style="width: 70%;font-size: 12px;">
                <tbody>
                    <tr>
                        <td colspan="2"> Yang bertanda tangan di bawah ini, atas nama Tim Pemeriksa Kesehatan di RS PKU MUHAMADIYAH GAMPING dengan ini menerangkan bahwa: <br><br></td>

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
                            Telah dilakukan pemeriksaan <b>RAPID TEST ANTIGEN</b> dengan spesimen swab nasofaring yang diambil pada tanggal <b><?= date('d M Y', strtotime($rs_surat['FD_TGL_TRS'])); ?></b> dengan hasil laboratorium sebagai berikut :
                            <br><br>
                            <table class="content">
                                <col style="width: 16%;font-size: 10px;">
                                <col style="width: 48%;font-size: 10px;">
                                <col style="width: 18%;font-size: 10px;">
                                <col style="width: 18%;font-size: 10px;">
                                <tbody>
                                    <tr>
                                        <td>No lab</td>
                                        <td>
                                            : <b><?= $rs_surat['FS_NO_LAB']; ?> / <?= $rs_surat['FS_KD_TRS_TDK_UMUM']; ?></b>
                                        </td>
                                        <td>dr Penanggung Jawab</td>
                                        <td colspan="2">
                                            : <b>dr Adang M. Gugun SpPk</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Waktu Sample</td>
                                        <td>
                                            : <?= date('d M Y', strtotime($rs_surat['FD_TGL_TRS'])); ?> <?= $rs_surat['FS_JAM_TRS'];?>
                                        </td>
                                        <td>Waktu Validasi</td>
                                        <td colspan="2">
                                            : <?= date('d M Y', strtotime($rs_surat['FD_TGL_TRS'])); ?> <?= $rs_surat['FS_JAM_TRS'];?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                    <tr>
                                        <td style="border-bottom:solid 1px #000000;text-align: center;" colspan="5"><b>HASIL PEMERIKSAAN LABORATORIUM</b></td>
                                    </tr>
                                    <tr>
                                        <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><b>Tanggal Pemeriksaan</b></td>
                                        <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><b>Jenis Pemeriksaan</b></td>
                                        
                                        <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><b>Hasil</b></td>
                                        <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><b>Metode</b></td>
                                    </tr>
                                    <?php foreach ($rs_lab as $lab) {
                                        $data['rujukan']=$this->m_rawat_jalan->get_data_rujukan_lab(array($lab['fs_kd_jenis_pemeriksaan'],$rs_surat['FS_JNS_KELAMIN'],$rs_surat['fn_umur']));
                                        ?>
                                        <tr 
                                        <?php 
                                        if (($no++ % 2) <> 1){
                                            echo "style=background-color:#cccccc;";

                                        } 
                                        ?>>
                                        <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:left;border-right:solid 1px #000000;border-top:solid 1px #000000;"><br><?= date("d-m-Y",  strtotime($lab['fd_tgl_trs']));?> <?= $lab['fs_jam_trs'];?> <br></td>
                                        <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:left;border-right:solid 1px #000000;border-top:solid 1px #000000;"><br><?= $lab['fs_nm_jenis_pemeriksaan']; ?><br></td>

                                        <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><br><b><?= $lab['FS_HASIL']; ?></b><br></td>
                                        <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;text-align:center;border-right:solid 1px #000000;border-top:solid 1px #000000;"><br>ICT<br></td>
                                    </tr>

                                <?php } ?>
                            </tbody>
                        </table>

                        <br><br>
                        Demikian surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana perlu.
                        <br>
                        <br>
                        Catatan :
                        <br>
                        <?php if($rs_surat['FS_HASIL']=='Positif'){?>
                            Saran :
                            <br>
                            - Pemeriksaan konfirmasi dengan RT-PCR <br>
                            - Lakukan karantina atau isolaso sesuai dengan kriteria <br>
                            - Menerapkan PHBS (perilaku hidup bersih dan sehat : mencuci tangan, menerapkan etika batuk, menggunakan masker saat sakit, menjaga stamina) dan physical distancing 
                        <?php }elseif($rs_surat['FS_HASIL']=='Negatif'){ ?>
                            - Hasil negatif tidak menyingkirkan kemungkinan terinfeksi SARS-CoV-2 sehingga masih berisiko menularkan ke orang lain, disarankan tes ulang atau tes konfirmasi dengan NAAT (nucleic acid amplification test)*, bila probabilitas pretes relatif tinggi, terutama bila pasien bergejala atau diketahui memiliki kontak dengan orang yang terkonfirmasi COVID-19
                            <br>
                            - Hasil negatif dapat terjadi pada kondisi kuantitas antigen pada spesimen dibawah level deteksi alat
                        <?php } ?>
                    </td>
                </tr>

            </tbody>
        </table>
        <br>
        <br>
        <table class="content">
            <col style="width: 50%;font-size: 12px;">
            <col style="width: 50%;font-size: 12px;">
            <tbody>

                <tr>
                    <br>
                    <br>
                    <td></td>
                    <td align='center'>Yogyakarta, <?= date('d M Y', strtotime($rs_surat['FD_TGL_TRS'])); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td align='center'>
                     <br>
                     <qrcode value="dr. Adang M. Gugun, SpPk pada <?= $rs_surat['FD_TGL_TRS']; ?>" ec="H" style="width: 15mm; background-color: white; color: black;"></qrcode>
                     <br>
                 </td>
             </tr>
             <tr>
                <td></td>
                <td align='center'>
                    <u>dr. Adang M. Gugun, SpPk</u>
                    <br>
                </td>
            </tr>
        </tbody>
    </table>
</page>