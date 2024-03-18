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
                <br><strong>Form Transfer Internal Antar Unit</strong>
            </td>
        </tr>
        </tbody>
    </table>

    <table class="content">
        <col style="width: 50%;font-size: 12px;">
        <col style="width: 50.2%;font-size: 12px;">
        <tbody>
        <?php foreach ($rs_pasien as $pasien) { ?>
            <?php 
            $dpjp = $pasien['KD_DOKTER_DPJP'];
            $dokterr=$this->db->query("SELECT Nama_Dokter from DOKTER WHERE Kode_Dokter='$dpjp' ")->row_array();
            $dpjp1=$dokterr['Nama_Dokter'];

            $konsul1 = $pasien['KD_KONSUL_1'];
            $dokter_konsul1=$this->db->query("SELECT Nama_Dokter from DOKTER WHERE Kode_Dokter='$konsul1' ")->row_array();
            $dpjp_konsul1=$dokter_konsul1['Nama_Dokter'];

            $konsul2 = $pasien['KD_KONSUL_2'];
            $dokter_konsul2=$this->db->query("SELECT Nama_Dokter from DOKTER WHERE Kode_Dokter='$konsul2' ")->row_array();
            $dpjp_konsul2=$dokter_konsul2['Nama_Dokter'];

            ?>
    
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;">DPJP : <?php echo $dpjp1 ?></td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">Tanggal Masuk : 
                <?php echo date('d M y', strtotime($pasien['Tanggal'])); ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;">Dokter Konsulen 1 : <?php echo $dpjp_konsul1 ?></td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">Ruang : 
                <?php echo ''; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;">Dokter Konsulen 2 : <?php echo $dpjp_konsul2; ?></td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">Tanggal / Jam Pindah : 
                <?php echo $pasien['TGL_PINDAH'] . ' / ' . date('h:m:s', strtotime($pasien['JAM_PINDAH'])) . ' WIB' ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;"></td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;">Pindah ke ruang / Kamar : 
                <?php echo $pasien['Nama_Ruang']; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><b>Diagnosa Awal : </b> <?php echo $pasien['DIAGNOSA1']; ?></td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;"><b>Diagnosa Sekarang : </b> <?php echo $pasien['DIAGNOSA2']; ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <h5>I. Ringkasan Riwayat Pasien </h5>
    <table class="content">
        <col style="width: 25%;font-size: 12px;">
        <col style="width: 75%;font-size: 12px;">


        <tbody>
        <?php foreach ($rs_pasien as $pasien) { ?>
            <tr>
                <td style="border-top:solid 1px #000000;border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;"><b>Anamnesis </b></td>
                <td style="border-top:solid 1px #000000;border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;"></td>
            </tr>
            <tr>
                <td style="border-top:solid 1px #000000;border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;">Keluhan Utama : </td>
                <td style="border-top:solid 1px #000000;border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;"><?php echo $pasien['ANAMNESA']; ?></td>
            </tr>
            <tr>
                <td style="border-top:solid 1px #000000;border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;">Riwayat Penyakit : </td>
                <td style="border-top:solid 1px #000000;border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;"><?php echo $pasien['RIWAYAT_SAKIT']; ?></td>
            </tr>
            <tr>
                <td style="border-top:solid 1px #000000;border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;">Riwayat Alergi : </td>
                <td style="border-top:solid 1px #000000;border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;"><?php echo $pasien['FS_ALERGI']; ?></td>
            </tr>
            <tr>
                <td style="border-top:solid 1px #000000;border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;"><b>Pemeriksaan Fisik </b> </td>
                <td style="border-top:solid 1px #000000;border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;"></td>
            </tr>
            <tr>
                <td style="border-top:solid 1px #000000;border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;">Tanda-Tanda Vital </td>
                <td style="border-top:solid 1px #000000;border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;"><?php echo 'Kesadaran : '.$triase['KESADARAN']. ', TD : ' . $triase['TD'] . ', Suhu : ' .$triase['SUHU']. ', Nadi : ' . $triase['N'] . ', R : '.$triase['R'].', SPO2 : '.$triase['O2']   ?> <br> <?php echo 'EWSS : '. $pasien['EWSS']. ', GCS : '.$pasien['GCS']. ', E : '.$pasien['GCS_E']. ', V : '.$pasien['GCS_V']. ', M : '.$pasien['GCS_M']  ?> </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <h5>II. Pemeriksaan Penunjang </h5>

    <table class="content">
        <col style="width: 25%;font-size: 12px;">
        <col style="width: 75%;font-size: 12px;">


        <tbody>
        <?php foreach ($rs_pasien as $pasien) { ?>

            <tr>
                <td style="border-top:solid 1px #000000;border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;">Pemeriksaan Penunjang : </td>
                <td style="border-top:solid 1px #000000;border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;"><?php echo $pasien['PENUNJANG']; ?></td>
            </tr>

            <?php } ?>
        </tbody>
    </table>

    <h5>III. TINDAKAN MEDIS </h5>

<table class="content">
    <col style="width: 25%;font-size: 12px;">
    <col style="width: 75%;font-size: 12px;">


    <tbody>
    <?php foreach ($rs_pasien as $pasien) { ?>

        <tr>
            <td style="border-top:solid 1px #000000;border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;">Tindakan Medis : </td>
            <td style="border-top:solid 1px #000000;border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;"><?php echo $pasien['TINDAKAN']; ?></td>
        </tr>

        <?php } ?>
    </tbody>
</table>

    <h5>IV. Pemberian Terapi </h5>

<table class="content">
    <col style="width: 25%;font-size: 12px;">
    <col style="width: 75%;font-size: 12px;">


    <tbody>
    <?php foreach ($rs_pasien as $pasien) { ?>

        <tr>
            <td style="border-top:solid 1px #000000;border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;">Terapi : </td>
            <td style="border-top:solid 1px #000000;border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;"><?php echo $pasien['TERAPI']; ?></td>
        </tr>

        <?php } ?>
    </tbody>
</table>

    <h5>V. LAIN-LAIN </h5>

<table class="content">
    <col style="width: 25%;font-size: 12px;">
    <col style="width: 75%;font-size: 12px;">


    <tbody>
    <?php foreach ($rs_pasien as $pasien) { ?>

        <tr>
            <td style="border-top:solid 1px #000000;border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;">LAIN - LAIN : </td>
            <td style="border-top:solid 1px #000000;border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;"><?php echo $pasien['LAINNYA']; ?></td>
        </tr>

        <?php } ?>
    </tbody>
</table>

<h5>VI. Derajat Kebutuhan Transfer</h5>
    <table class="content">
        <col style="width: 25%;font-size: 12px;">
        <col style="width: 15%;font-size: 12px;">
        <tbody>

            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;">Derajat kebutuhan transfer : </td>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;"> <?php if($pasien['DERAJAT']=='0'){
                   echo 'Derajat 0';
               }else if ($pasien['DERAJAT']=='1') {
                   echo 'Derajat 1';
               }
               else if ($pasien['DERAJAT']=='2') {
                echo 'Derajat 2';
            }
            else if ($pasien['DERAJAT']=='3') {
                echo 'Derajat 3';
            } ?></td>
  
            </tr>

        
        </tbody>
    </table>

    <h5>VII. Kondisi Pasien</h5>
    <table class="content">
        <col style="width: 50%;font-size: 12px;">
        <col style="width: 50%;font-size: 12px;">
        <tbody>

            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;"><b>Sebelum Transfer</b></td>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;"><b>Setelah Transfer</b></td>
  
            </tr>
            
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;"> <?php echo 'Kesadaran : '. $ttv_sebelum_transfer['KESADARAN'];?> <br><br> TTV :  <?php echo 'TD : ' .$ttv_sebelum_transfer['TD']. ' MmHg, Suhu : ' .$ttv_sebelum_transfer['SUHU']. ' C, Nadi : '. $ttv_sebelum_transfer['NADI']. ' x/menit, R : '. $ttv_sebelum_transfer['RR']. ' x/menit, SPO2 : '.$ttv_sebelum_transfer['SPO2'].' %' ; ?> </td>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;"><?php echo 'Kesadaran : '. $ttv_setelah_transfer['KESADARAN'];?> <br><br> TTV :  <?php echo 'TD : ' .$ttv_setelah_transfer['TD']. ' MmHg, Suhu : ' .$ttv_setelah_transfer['SUHU']. ' C, Nadi : '. $ttv_setelah_transfer['NADI']. ' x/menit, R : '. $ttv_setelah_transfer['RR']. ' x/menit, SPO2 : '.$ttv_setelah_transfer['SPO2'].' %' ; ?> </td>
  
            </tr>
            <?php foreach ($rs_pasien as $pasien) { ?>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;">Catatan sebelum transfer : <br><br> <?php echo $pasien['CAT1']; ?> </td>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;border-right:solid 1px #000000;">Catatan setelah transfer : <br><br> <?php echo $pasien['CAT2']; ?> </td>
  
            </tr>
            
        


            <?php }?>
            

         

        </tbody>
    </table>
 <br>
    <table class="content">
        <col style="width: 50%;font-size: 12px;">
        <col style="width: 50%;font-size: 12px;">
        <tbody> 
        <?php foreach ($rs_pasien as $pasien) { ?>
            <?php 
            $penerima = $pasien['PENGIRIM'];
            $user=$this->db->query("SELECT NamaLengkap from TUSER WHERE NamaUser='$penerima' ")->row_array();
            $penerima_=$user['NamaLengkap'];
            
            $penerima2 = $pasien['PENERIMA'];
            $user2=$this->db->query("SELECT NamaLengkap from TUSER WHERE NamaUser='$penerima2' ")->row_array();
            $penerima2_=$user2['NamaLengkap'];

            ?>

            <tr>
                
                <td align='center'>Petugas Yang Menyerahkan <br> Petugas Medis</td>
                <td align='center'>Petugas Yang Menerima <br> Petugas Medis</td>
            </tr>

            <tr>
            <td align='center'>   <qrcode value="<?php echo $penerima_ ?> pada <?= $pasien['MDD1']; ?> " ec="H" style="width: 15mm; background-color: white; color: black;"></qrcode>
                    <br></td>
                <td align='center'>
                <qrcode value="<?php echo $penerima2_; ?> pada <?= $pasien['MDD2']; ?> " ec="H" style="width: 15mm; background-color: white; color: black;"></qrcode>
                    <br>
                </td>
            </tr>

            <tr>
                <br>
                <br>
                <td align='center'><?php echo $penerima_ ?></td>
                <td align='center'><?php echo $penerima2_ ?></td>
            </tr>


          
            <?php } ?>
        </tbody>
 </table>

</page>







