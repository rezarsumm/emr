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
                    Nama :  <?= ucwords(strtolower($rs_pasien['NAMA_PASIEN'])); ?><br>
                    No MR : <?php echo $rs_pasien['NO_MR']; ?><br>
                    Tgl Lahir : <?php echo date('d-M-Y', strtotime($rs_pasien['TGL_LAHIR'])); ?> <BR>
                    Alamat : <?php echo $rs_pasien['ALAMAT'].",".$rs_pasien['KOTA']; ?>
                </td>
            </tr>
        </table>
    </page_header>
    <table class="content">
        <tbody>
        <col style="width: 100%;background-color: #000000;color: #ffffff;padding: 0px;font-size: 12px;">
        <tr>
            <td align="center">
                <br><strong> PROFIL RINGKAS MEDIS RAWAT JALAN</strong>
            </td>
        </tr>
        </tbody>
    </table>
   <!--  <table class="content">
        <tbody>
        <col style="width: 30%;border-left:solid 1px #000000;border-bottom:solid 1px #000000; border-right:solid 1px #000000;padding: 0px;font-size: 12px;">
        <col style="width: 70%;border-left:solid 1px #000000;border-bottom:solid 1px #000000; border-right:solid 1px #000000;padding: 0px;font-size: 12px;">
        <tr>
            <td><strong>Alergi</strong></td>
            <td><?php echo $rs_pasien['FS_ALERGI']; ?></td>
        </tr>
        <tr>
            <td>
                <strong>Rawat Inap - Operasi</strong>
            </td>
            <td>
                <?php foreach($rs_pasien_inap as $operasi){ ?>
                
                Operasi : <?= $operasi['TINDAKAN']; ?> <br>
                Diagnosa Pulang : <?= $operasi['DIAGNOSA']; ?> <br>
                <br>
                <?php } ?>
            </td>
        </tr>
        </tbody>
    </table> -->
    <table class="content">
        <col style="width: 10%;font-size: 12px;">
        <col style="width: 15%;font-size: 12px;">
        <col style="width: 18%;font-size: 12px;">
        <col style="width: 12%;font-size: 12px;">
        <col style="width: 12%;font-size: 12px;">
        <col style="width: 10%;font-size: 12px;">
        <col style="width: 23%;font-size: 12px;">
        <tbody>
            <tr>
                <th style="border-left:solid 1px #000000;border-bottom:solid 1px #000000; border-right:solid 1px #000000;text-align: center;">Tanggal</th>
                <th style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align: center;" > Dokter</th>
                <th style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align: center;">Uraian Klinis</th>
                 <th style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align: center;">Diagnosa</th>
                 <th style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align: center;">Hasil EKG</th>
                <th style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align: center;">Rencana</th>
                <th style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align: center;">Terapi</th>
                </tr>
                <?php foreach($rs_resume as $data){ ?>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000; border-right:solid 1px #000000;"><?=  date('d-m-Y', strtotime($data['TANGGAL']));?></td>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000; border-right:solid 1px #000000;"><?= $data['NAMA_DOKTER'];?> <br> ( <?= ucwords(strtolower($data['SPESIALIS']));?>) </td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                    TD : <?php echo str_replace("-", " ", $data["FS_TD"]);?> mmHg <br>
                     <?php 
                    if($data["KONJUNGTIVA"]!=""){ echo "Konjungtiva : ".$data["KONJUNGTIVA"]."<br>";}?>
                    <?php 
                    if($data["THORAX"]!=""){ echo "Thorax : ".$data["THORAX"]."<br>";}?>
                     <?php 
                    if($data["ABDOMEN"]!=""){ echo "Abdomen : ".$data["ABDOMEN"]."<br>";}?>
                    Keluhan : <?= strip_tags($data["FS_ANAMNESA"]);?>
                </td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                    <?= strip_tags($data["FS_DIAGNOSA"]);?>
                </td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                    <?= strip_tags($data["HASIL_EKG"]);?>
                </td>
                 <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                    <?= strip_tags($data["FS_PLANNING"]);?>
                </td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align: center; font-size: 9px;">
                   <?php echo str_replace("\n", "<br>",$data["FS_TERAPI"]);?>
                </td>
            </tr>
                <?php } ?>
        </tbody>
    </table>
</page>