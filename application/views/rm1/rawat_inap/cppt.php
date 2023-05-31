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
                    <img src="<?php base_url() ?>resource/doc/images/icon/logo.png" width="50" height="50" />
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

    <table class="content">
        <tbody>
        <col style="width: 100%;background-color: #000000;color: #ffffff;padding: 0px;font-size: 12px;">
        <tr>
            <td align="center">
                <br><strong>CPPT</strong>
            </td>
        </tr>
        </tbody>
    </table>
    <table class="content">
        <col style="width: 17%;font-size: 12px;">
        <col style="width: 53%;font-size: 12px;">
        <col style="width: 15%;font-size: 12px;">
        <col style="width: 15%;font-size: 12px;">
        <tbody>
            <tr>
                <th style="border-left:solid 1px #000000;border-bottom:solid 1px #000000; border-right:solid 1px #000000;text-align: center;">Waktu</th>
                <th style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align: center;" >SOAP</th>
                <th style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align: center;">PPA</th>
                <th style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align: center;">VERIF</th>
                </tr>
                <?php foreach($rs_cppt as $cppt){ ?>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000; border-right:solid 1px #000000;">
                    <?= date('d-m-Y', strtotime($cppt['mdd_date']));?>/<?= $cppt['mdd_time'];?>
                </td> 
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;" >
                    S: <?= strip_tags($cppt["FS_CPPT_S"]);?><br>
                    O: <?= strip_tags($cppt['FS_CPPT_O']);?><br>
                    A: <?= strip_tags($cppt['FS_CPPT_A']);?><br>
            P: <?= strip_tags($cppt['FS_CPPT_P']);?><br>
                </td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align: center;">
                    <qrcode value="<?= $cppt['mdb'];?>" ec="H" style="width: 10mm; background-color: white; color: black;"></qrcode>
                    <br>
                    <?= $cppt['NAMALENGKAP'];?>
             </td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align: center;">
                    <qrcode value="<?= $cppt['FS_KD_MEDIS_VERIF'];?>" ec="H" style="width: 10mm; background-color: white; color: black;"></qrcode>
                    <br>
                    <?= $cppt['FS_NM_MEDIS_VERIF'];?>
                    <br><br>
                    Catatan :  <?= $cppt['FS_KET_VERIF'];?>
            </td>
            </tr>
                <?php } ?>
        </tbody>
    </table>
</page>