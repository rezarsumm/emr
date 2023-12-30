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
                
           

             <table style="float:; padding-left: 50px"> 
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
              <td style="width:40%; font-size: 8px"  >
              <?php foreach ($rs_pasien as $bio) { ?>
                    Nama : <?php echo $bio['Nama_Pasien']; ?><br>
                    No MR : <?php echo $bio['No_MR']; ?><br>
                    Tgl Lahir : <?php echo date('d-M-Y', strtotime($bio['Tgl_Lahir'])); ?>
                    <?php } ?>
                </td>
            </tr>
        </table>
    </page_header>

    <table class="content">
        <tbody>
        <col style="width: 100%;background-color: #000000;color: #ffffff;padding: 0px;font-size: 12px;">
        <tr>
            <td align="center">
                <br><strong>Form Skrining TB</strong>
            </td>
        </tr>
        </tbody>
    </table>

    <table class="content">
        <col style="width: 50%;font-size: 12px;">
        <col style="width: 50.2%;font-size: 12px;">
        <tbody>
        <?php foreach ($rs_pasien as $bio) { ?>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;">Tanggal Skrining : <?php echo $bio['TANGGAL_SKRINING']; ?></td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">Jam Skrining : 
                <?php echo date('h:m:s', strtotime($bio['JAM_SKRINING'])); ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <table class="content">
        <col style="width: 70%;font-size: 12px;">
        <col style="width: 15.1%;font-size: 12px;">
        <col style="width: 15.1%;font-size: 12px;">
        <tbody>
        <?php foreach ($rs_pasien as $bio) { ?>
                 <tr>
                <td style="border-top:solid 1px #000000;border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;"><b>Berikan tanda check list (y) pada kolom yang sesuai
</b></td>
                <td style="border-bottom:solid 1px #000000;border-top:solid 1px #000000;"></td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;"></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><b>Gejala dan/atau hasil pemeriksaan:</b></td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><b>Ya</b></td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><b>Tidak</b></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;">a. Batuk dan demam disertai minimal 1 gejala dari:
Saat Bernafas sesak atau tidak?</td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><?php if($bio['GEJALA_TB1']=='1') {
                    echo 'y';
                 } ?></td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><?php if($bio['GEJALA_TB1']=='0') {
                    echo 'y';
                 } ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;">b. Terasa nyeri dada atau tidak?</td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><?php if($bio['GEJALA_TB2']=='1') {
                    echo 'y';
                 } ?></td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><?php if($bio['GEJALA_TB2']=='0') {
                    echo 'y';
                 } ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;">c. Batuk darah atau tidak?</td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><?php if($bio['GEJALA_TB3']=='1') {
                    echo 'y';
                 } ?></td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><?php if($bio['GEJALA_TB3']=='0') {
                    echo 'y';
                 } ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;">d. Demam atau tidak?</td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><?php if($bio['GEJALA_TB4']=='1') {
                    echo 'y';
                 } ?></td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><?php if($bio['GEJALA_TB4']=='0') {
                    echo 'y';
                 } ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;">e. Terasa Lemas atau tidak?</td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><?php if($bio['GEJALA_TB5']=='1') {
                    echo 'y';
                 } ?></td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><?php if($bio['GEJALA_TB5']=='0') {
                    echo 'y';
                 } ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;">f. Keluar Keringat saat malam hari atau tidak?</td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><?php if($bio['GEJALA_TB6']=='1') {
                    echo 'y';
                 } ?></td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><?php if($bio['GEJALA_TB6']=='0') {
                    echo 'y';
                 } ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;">g. nafsu makan berkurang atau tidak?</td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><?php if($bio['GEJALA_TB7']=='1') {
                    echo 'y';
                 } ?></td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><?php if($bio['GEJALA_TB7']=='0') {
                    echo 'y';
                 } ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;">h. Berat badan menurun atau tidak?</td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><?php if($bio['GEJALA_TB8']=='1') {
                    echo 'y';
                 } ?></td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><?php if($bio['GEJALA_TB8']=='0') {
                    echo 'y';
                 } ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;">i. Pernah Kontak langsung dengan penderita TB atau tidak?</td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><?php if($bio['GEJALA_TB9']=='1') {
                    echo 'y';
                 } ?></td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><?php if($bio['GEJALA_TB9']=='0') {
                    echo 'y';
                 } ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;">j. Pernah minum obat paru-paru kurang dari 1 bulan atau lebih dari 1 bulan?	
</td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><?php if($bio['GEJALA_TB10']=='1') {
                    echo 'y';
                 } ?></td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><?php if($bio['GEJALA_TB10']=='0') {
                    echo 'y';
                 } ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;">k. Hasil Thorax foto pneumonia atau gambaran lain
yang mendukung TB</td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><?php if($bio['GEJALA_TB11']=='1') {
                    echo 'y';
                 } ?></td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><?php if($bio['GEJALA_TB11']=='0') {
                    echo 'y';
                 } ?></td>
            </tr>
            <?php } ?>



        </tbody>
    </table>
    <br>
    <table class="content">
        <col style="width: 50%;font-size: 12px;">
        <col style="width: 25%;font-size: 12px;">
        <col style="width: 25%;font-size: 12px;">
        <tbody>
        
        <?php foreach ($rs_pasien as $bio) { ?>
            <?php 
            $jumlah = $bio['GEJALA_TB1'] + $bio['GEJALA_TB2'] + $bio['GEJALA_TB3'] + $bio['GEJALA_TB4'] + $bio['GEJALA_TB5'] + $bio['GEJALA_TB6'] + $bio['GEJALA_TB7'] + $bio['GEJALA_TB8'] + $bio['GEJALA_TB9'] + $bio['GEJALA_TB10'] + $bio['GEJALA_TB11']
            ?>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;"><b>Cara penilaian: (berikan tanda ya/tidak pada kolom kesimpulan)</b></td>
                <td style="border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;">
                    <b>Suspek</b>
                </td>
                <td style="border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;">
                    <b>Kesimpulan</b>
                </td>
  
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;">Suspek TB: Minimal 3 dari gejala/pemeriksaan a-k di atas</td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                <?php if($jumlah >='3'){
                    echo 'Suspek TB';
                } else{
                    echo 'Tidak Suspek TB';
                } ?>
                  
                </td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">
                <?php if($jumlah >='3'){
                    echo 'Ya';
                } else{
                    echo 'Tidak';
                } ?>
                </td>
  
            </tr>

            <?php } ?>

        </tbody>
    </table>

    <br>
    <h5>Pemeriksaan Penunjang : (Lakukan pemeriksaan ini jika terdiagnosis suspek covid 19 + TB)</h5>
    <table class="content">
        <col style="width: 50%;font-size: 12px;">
        <col style="width: 15%;font-size: 12px;">
        <tbody>

            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;"><b>Penunjang suspek TB</b></td>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;"><b>Ya/Tidak</b></td>
  
            </tr>
           
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;">TCM</td>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;">
               
                <?php if(in_array('TCM', $PENUNJANGS)){
                   echo 'ya';
               }else {
                   echo 'tidak';
               } ?>
                 
                </td>
  
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;">Skoring (anak)</td>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;">
               
               <?php if(in_array('Skoring (Anak)', $PENUNJANGS)){
                   echo 'ya';
               }else {
                   echo 'tidak';
               } ?>
                
               </td>
  
            </tr>

         

        </tbody>
    </table>
<br>
<table class="content">
        <col style="width: 20%;font-size: 12px;">
        <col style="width: 50%;font-size: 12px;">
        <tbody>
        <?php foreach ($rs_pasien as $bio) { ?>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;">Keterangan : </td>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;"><?php echo $bio['KETERANGAN_PENUNJANG'];?></td>
  
            </tr>

            <?php }?>
           

         

        </tbody>
    </table>
 <br>
 <br>
    <table class="content">
        <col style="width: 50%;font-size: 12px;">
        <col style="width: 50%;font-size: 12px;">
        <tbody> 
        <?php foreach ($rs_pasien as $bio) { ?>
            <tr>
                <br>
                 <br>
                <td></td>
                <td align='center'>Tanggal <?php echo $bio['TANGGAL_SKRINING']; ?> </td>
            </tr>
            <tr>
            <td></td>
                <td align='center'>
                <qrcode value="<?php echo $bio['Nama_Dokter']; ?> pada <?= $bio['MDD']; ?> " ec="H" style="width: 15mm; background-color: white; color: black;"></qrcode>
                    <br>
                </td>
            </tr>
            <tr>
                <td></td>
                <td align='center'>
                <?php echo $bio['Nama_Dokter']; ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
 </table>

</page>







