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
                     <h5>MAJELIS PEMBINA KESEHATAN UMUM
                <br>RSU MUHAMMADIYAH METRO</h5>
                
           

             <table style="float:; padding-left: 40px"> 
                <tr> 
                    <td style="text-align: left; font-size: 8px"> Jl Soekarno Hatta No. 42 Mulyojati 16 B</td>
                    <td style="text-align: left; font-size:  8px" > Fax : (0725) 47760 </td>
                </tr>
                <tr> 
                    <td style="text-align: left; font-size: 8px" > Metro Barat - Kota Metro 34125 </td>
                    <td style="text-align: left; font-size: 8px" > e-mail : info.rsumm@gmail.com </td>
                </tr>
                <tr> 
                    <td style="text-align: left; font-size: 8px"> Telp : (0725) 49490 - 7850378</td>
                    <td style="text-align: left; font-size: 8px"> website : www.rsumm.co.id </td>

                </tr>
               
            </table>
                </td>
                 <td style="width:10%; float:right" >
                <img src="<?php base_url() ?>resource/doc/images/icon/kars.png" width="50" height="50" />
            </td>
            <td  style="font-size: 9px">
                  Nama : <?php echo $rs_pasien['NAMA_PASIEN']; ?><br>
                    No MR : <?php echo $rs_pasien['NO_MR']; ?><br>
                    Tgl Lahir : <?php echo date('d-M-Y', strtotime($rs_pasien['TGL_LAHIR'])); ?>
                    <hr>
                    Tgl Masuk Rawat Inap : <?php echo date('d-m-Y', strtotime($rs_pasien['TANGGAL'])); ?> / <?= date('H:i:s', strtotime($rs_pasien['JAM']));?>
                </td>
            </tr>
        </table>
    </page_header>
               <hr style="margin-top:0px">

    <table class="content" style="padding-top: 50px">
        <tbody>
        <col style="width: 100%;background-color: #000000;color: #ffffff;padding: 0px;font-size: 12px;">
        <tr>
            <td align="center">
                <br><strong>ASESMEN JATUH</strong>
            </td>
        </tr>

        </tbody>
    </table>
    <table class="content">
        <col style="width: 17%;font-size: 12px;">
        <col style="width: 30%;font-size: 12px;">
        <col style="width: 38%;font-size: 12px;">
        <col style="width: 15%;font-size: 12px;">
        <tbody>
            <tr>
                <td align="center" colspan="4" style="border-bottom:solid 1px #000000;border-left:solid 1px #000000;font-size: 12px;border-right:solid 1px #000000;">
                    <?php
                    if ($rs_pasien['fn_umur'] <= '14') {
                        echo "<b>Anak</b>";
                    } elseif ($rs_pasien['fn_umur'] >= '15' AND $rs_pasien['fn_umur'] <= '60') {
                        echo "<b>Dewasa Morse Fall Scale</b>";
                    } elseif ($rs_pasien['fn_umur'] > '60') {
                        echo "<b>Lanjut Usia (ontario Modified Stratify - Sydney Scoring)</b>";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <th style="border-left:solid 1px #000000;border-bottom:solid 1px #000000; border-right:solid 1px #000000;text-align: center;">Waktu</th>
                <th style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align: center;" >Hasil Asesmen</th>
                <th style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align: center;" >Pencegahan Jatuh</th>
                <th style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align: center;">PPA</th>
            </tr>
            <?php if ($rs_pasien['fn_umur'] <= '14') { ?>
               <?php
                foreach ($rs_result_anak as $data) {
                    $jatuh_anak = $data['FS_PARAM_1'] + $data['FS_PARAM_2'] + $data['FS_PARAM_3'] + $data['FS_PARAM_4'] + $data['FS_PARAM_5'] + $data['FS_PARAM_6'] + $data['FS_PARAM_7'];
                    $rs_pencegahan = $this->m_ass_jatuh->get_pencegahan_jatuh_by_id(array($data['FS_KD_TRS2']));
                    ?>
                    <tr>
                        <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000; border-right:solid 1px #000000;">
                            <?= date('d-m-Y', strtotime($data['mdd'])); ?><br><?php echo date("H:i:s", strtotime($data['mdd_time'])); ?>
                        </td>
                        <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;" >
                            Usia: <?= $data['FS_PARAM_1'];?> <br>
                            Jenis Kelamin : <?= $data['FS_PARAM_2'];?> <br>
                            Diagnosis : <?= $data['FS_PARAM_3'];?> <br>
                            Gangguan Kognitif : <?= $data['FS_PARAM_4'];?> <br>
                            Faktor Lingkungan : <?= $data['FS_PARAM_5'];?> <br>
                            Respon Terhadap Pembedahan / Sedasi / Anestesi : <?= $data['FS_PARAM_6'];?> <br>
                            Respon Terhadap Penggunaan medikamentosa : <?= $data['FS_PARAM_7'];?> <hr>
                            Skor : <?= $jatuh_anak; ?> <br>
                            Kesimpulan : 
                            <?php
                            if ($jatuh_anak >= '7' && $jatuh_anak <= '11'){
            echo "<b>RISIKO RENDAH</b>";
                            }elseif ($jatuh_anak >= '12'){
            echo "<b>RISIKO TINGGI</b>";
                            }
                            ?>
                            
                        </td>
                         <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;" >
                           
                            <?php
                            foreach ($rs_pencegahan as $data2){
            echo "-".$data2['FS_NM_PENCEGAHAN_JATUH']."<br>";
                            }
                            ?>
                            
                        </td>
                        <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align: center;">
                <qrcode value="<?= $data['NAMALENGKAP']; ?>" ec="H" style="width: 10mm; background-color: white; color: black;"></qrcode>
                <br>
                            <?= $data['NAMALENGKAP'];?>            
    </td>
                </tr>
            <?php } ?>
            <?php } elseif ($rs_pasien['fn_umur'] >= '15' AND $rs_pasien['fn_umur'] <= '60') { ?>
                <?php
                foreach ($rs_result_dewasa as $data) {
                    $jatuh_dewasa = $data['FS_PARAM_1'] + $data['FS_PARAM_2'] + $data['FS_PARAM_3'] + $data['FS_PARAM_4'] + $data['FS_PARAM_5'] + $data['FS_PARAM_6'] + $data['FS_PARAM_7'];
                    $rs_pencegahan = $this->m_ass_jatuh->get_pencegahan_jatuh_by_id(array($data['FS_KD_TRS2']));
                    ?>
                    <tr>
                        <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000; border-right:solid 1px #000000;">
                            <?= date('d-m-Y', strtotime($data['mdd'])); ?><br><?php echo date("H:i:s", strtotime($data['mdd_time'])); ?>
                        </td>
                        <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;" >
                            Riwayat Jatuh : <?= $data['FS_PARAM_1'];?> <br>
                            Kondisi kesehatan : <?= $data['FS_PARAM_2'];?> <br>
                            Bantuan ambulasi : <?= $data['FS_PARAM_3'];?> <br>
                            Terapi IV / anti koagulan : <?= $data['FS_PARAM_4'];?> <br>
                            Gaya berjalan : <?= $data['FS_PARAM_5'];?> <br>
                            Status Mental : <?= $data['FS_PARAM_6'];?> <hr>
                            Skor : <?= $jatuh_dewasa; ?> <br>
                            Kesimpulan : 
                            <?php
                            if (($jatuh_dewasa >= '0') && ($jatuh_dewasa <= '24')) {
                                echo "<b>RISIKO RENDAH</b>";
                            } elseif (($jatuh_dewasa >= '25') && ($jatuh_dewasa <= '45')) {
                                echo "<b>RISIKO SEDANG</b>";
                            } elseif ($jatuh_dewasa > '45') {
                                echo "<b>RISIKO TINGGI</b>";
                            }
                            ?>
                            
                        </td>
                         <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;" >
                           
                            <?php
                            foreach ($rs_pencegahan as $data2){
            echo "-".$data2['FS_NM_PENCEGAHAN_JATUH']."<br>";
                            }
                            ?>
                            
                        </td>
                        <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align: center;">
                <qrcode value="<?= $data['NAMALENGKAP']; ?>" ec="H" style="width: 10mm; background-color: white; color: black;"></qrcode>
                <br>
                            <?= $data['NAMALENGKAP'];?>
                </td>
                </tr>
            <?php } ?>
        <?php } elseif ($rs_pasien['fn_umur'] > '60') { ?>
            <?php
            foreach ($rs_result_dewasa2 as $data) {
                $rs_pencegahan = $this->m_ass_jatuh->get_pencegahan_jatuh_by_id(array($data['FS_KD_TRS2']));
                $jatuh = $data['FS_PARAM_1'] + $data['FS_PARAM_2'];
                $mental = $data['FS_PARAM_3'] + $data['FS_PARAM_4'] + $data['FS_PARAM_5'];
                $pengelihatan = $data['FS_PARAM_6'] + $data['FS_PARAM_7'] + $data['FS_PARAM_8'];
                $kemih = $data['FS_PARAM_9'];
                $transmob = $data['FS_PARAM_10'] + $data['FS_PARAM_11'];

                if ($jatuh >= '1') {
                    $jatuh = '6';
                } else {
                    $jatuh = '0';
                }

                if ($mental >= '1') {
                    $mental = "14";
                } else {
                    $mental = "0";
                }

                if ($pengelihatan >= '1') {
                    $pengelihatan = "1";
                } else {
                    $pengelihatan = "0";
                }
                if ($kemih >= '1') {
                    $kemih = "2";
                } else {
                    $kemih = "0";
                }


                if ($transmob >= '0' && $transmob <= '3') {
                    $transmob = "0";
                } elseif ($transmob >= '4') {
                    $kemih = "7";
                }

                $sydneyscore = $jatuh + $mental + $pengelihatan + $kemih + $transmob;
                ?>
                <tr>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000; border-right:solid 1px #000000;">
                        <?= date('d-m-Y', strtotime($data['mdd'])); ?><br><?php echo date("H:i:s", strtotime($data['mdd_time'])); ?>
                    </td>
                    <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;" >
                        Riwayat Jatuh : <?= $jatuh ;?> <br>
                        Status Mental : <?= $mental;?> <br>
                        Pengelihatan : <?= $pengelihatan;?> <br>
                        Kebiasaan berkemih : <?= $kemih;?> <br>
                        Mobilitas : <?= $transmob;?> <hr>
                        Skor : <?= $sydneyscore; ?> <br>
                        Kesimpulan : 
                        <?php
                        if ($sydneyscore >= '0' && $sydneyscore <= '5') {
                            echo "<b>RISIKO RENDAH</b>";
                        } elseif ($sydneyscore >= '6' && $sydneyscore <= '16') {
                            echo "<b>RISIKO SEDANG</b>";
                        } elseif ($sydneyscore >= '17' && $sydneyscore <= '30') {
                            echo "<b>RISIKO TINGGI</b>";
                        }
                        ?>
                    </td>
                     <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;" >
                           
                            <?php
                            foreach ($rs_pencegahan as $data2){
            echo "-".$data2['FS_NM_PENCEGAHAN_JATUH']."<br>";
                            }
                            ?>
                            
                        </td>
                    <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align: center;">
                <qrcode value="<?= $data['NAMALENGKAP']; ?>" ec="H" style="width: 10mm; background-color: white; color: black;"></qrcode>
                <br>
                            <?= $data['NAMALENGKAP'];?>
                </td>
                </tr>

            <?php } ?>
        <?php } ?>
        </tbody>
    </table>
</page>