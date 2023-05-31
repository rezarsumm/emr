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
            <col style="width: 10%;font-size: 12px;">
            <col style="width: 45%;font-size: 12px;">
            <col style="width: 45%;font-size: 12px;">
            <tr>
                <td>
                    <img src="<?php base_url() ?>resource/doc/images/icon/logo.png" width="70" height="70" />
                </td>
                <td style="text-align: center;">
                    <h3><?= $header1['pref_value']; ?></h3>
                    <h5><?= $header2['pref_value']; ?></h5>
                </td>
                <td valign="top">
                    Nama : <?php echo $rs_pasien['FS_NM_PASIEN']; ?><br>
                    No MR : <?php echo $rs_pasien['FS_MR']; ?><br>
                    Tgl Lahir : <?php echo date('d-M-Y', strtotime($rs_pasien['FD_TGL_LAHIR'])); ?>
                    <hr>
                    Tgl Masuk Rawat Inap : <?php echo date('d-m-Y', strtotime($rs_pasien['FD_TGL_MASUK'])); ?> / <?= $rs_pasien['FS_JAM_MASUK'];?>
                </td>
            </tr>
        </table>
    </page_header>

    <table class="content">
        <tbody>
        <col style="width: 100%;background-color: #000000;color: #ffffff;padding: 0px;font-size: 12px;">
        <tr>
            <td align="center">
                <br><strong>Asesmen Holistic Health Care</strong>
            </td>
        </tr>

        </tbody>
    </table>
    <table class="content">
        <col style="width: 17%;font-size: 12px;">
        <col style="width: 12%;font-size: 12px;">
        <col style="width: 20%;font-size: 12px;">
        <col style="width: 16%;font-size: 12px;">
        <col style="width: 20%;font-size: 12px;">
        <col style="width: 15%;font-size: 12px;">
        <tbody>
            <tr>
                <th style="border-left:solid 1px #000000;border-bottom:solid 1px #000000; border-right:solid 1px #000000;text-align: center;">Waktu</th>
                <th style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align: center;" >Asesmen Awal</th>
                <th style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align: center;" >Deskripsi</th>
                <th style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align: center;" >Intervensi</th>
                <th style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align: center;" >Implementasi dan Evaluasi</th>
                <th style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align: center;">PPA</th>
            </tr>
            <?php
            foreach ($rs_hhc as $data) {
                $hhc = $data['FS_PARAM_2'] + $data['FS_PARAM_3'] + $data['FS_PARAM_4'];
                $hhc2 = $data['FS_PARAM_5'] + $data['FS_PARAM_6'] + $data['FS_PARAM_7'];
                $rs_evaluasi =$this->m_hhc->get_hhc_evaluasi_by_id(array($data['FS_KD_TRS']));
                ?>
                <tr>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000; border-right:solid 1px #000000;">
                        <?= date('d-m-Y', strtotime($data['mdd_date'])); ?><br><?php echo date("H:i:s", strtotime($data['mdd_time'])); ?>
                    </td>
                    <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;" >
                        <?php
                        if ($data['FS_PARAM_1'] == '1') {
                            echo "Sakit";
                        } elseif ($data['FS_PARAM_1'] == '2') {
                            echo "Masalah Lingkungan keluarga";
                        } elseif ($data['FS_PARAM_1'] == '3') {
                            echo "Anak &amp; Keluarga yg belum membesuk";
                        } elseif ($data['FS_PARAM_1'] == '4') {
                            echo "Biaya";
                        }
                        ?>

                    </td>
                    <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;" >
                        <?php
                        if (($hhc >= 1) && ($hhc <= '8')) {
                            if (($hhc > 0) && ($hhc2 <= '8')) {
                                echo "SORROW <br><br> 
                Pasien yang mengalami masalah pada aspek penghayatan psikologi (Acceptance) maupun spiritual (Obedient)";
                            } elseif ($hhc >= '9') {
                                echo "REVIVE <br><br> Pasien yang tidak mengalami masalah pada aspek penghayatan psikologi (Acceptance) namun mengalami masalah spiritual (Obedient)";
                            }
                        } else {
                            if (($hhc >= 1) && ($hhc2 <= '8')) {
                                echo "GUIDE <br><br> Pasien yang mengalami masalah pada aspek penghayatan psikologi (Acceptance) dan tidak mengalami masalah spiritual (Obedient)";
                            } elseif ($hhc >= '9') {
                                echo "NIRVANA <br><br> Pasien yang tidak mengalami masalah pada aspek penghayatan psikologi (Acceptance) dan tidak mengalami masalah spiritual (Obedient)";
                            }
                        }
                        ?>
                    </td>
                    <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;" >
                        <?php if (($hhc >= 1) && ($hhc <= '8')){
                if (($hhc > 0) && ($hhc2 <= '8')){
                echo "-Relaksasi<br>
                -Mengembangkan Kesadaran diri<br>
                -Bimbingan Ibadah<br>
                -Pendalaman agama";
                }elseif ($hhc >= '9'){
                echo "-Relaksasi<br>
                -Mengembangkan Kesadaran diri";
                }
                        }else{
                if (($hhc >= 1) && ($hhc2 <= '8')){
                echo "-Bimbingan Ibadah<br>
                -Motiasi doa<br>
                -Pendalaman agama";
                } elseif ($hhc >= '9'){
                 echo "-Pengaturan Motivasi";
                }
            }
            ?>
                    </td>
                    <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;" >

                        <?php
                        foreach ($rs_evaluasi as $data3) {?>
                            Tanggal  : <?= $data3['mdd_date'];?>/<?=$data3['mdd_time'];?><br> 
            Tindakan : <?=$data3['FS_NM_TINDAKAN'];?><br>
            Evaluasi : <?=$data3['FS_NM_EVALUASI'];?><br>
            Petugas : <?=$data3['FS_NM_PEG']?><br><hr>
                       <?php }
                        ?>

                    </td>
                    <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align: center;">
            <qrcode value="<?= $data['mdb']; ?>" ec="H" style="width: 15mm; background-color: white; color: black;"></qrcode>
            <br><br>
    <?= $data['FS_NM_PEG']; ?>            
            </td>
            </tr>
<?php } ?>

        </tbody>
    </table>
</page>