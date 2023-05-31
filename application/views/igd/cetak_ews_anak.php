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
                 
           

             <table style="float:; padding-left: 90px"> 
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
                    Tgl Lahir : <?php echo date('d-M-Y', strtotime($rs_pasien['TGL_LAHIR'])); ?><br>
                    Umur : <?php   echo $rs_pasien['UMUR']; ?> tahun<br>
                    Jenis Kelamin : <?php echo $rs_pasien['JENIS_KELAMIN']; ?>
                    <hr>
 
                </td>
            </tr>
        </table>
    </page_header>

    <table class="content">
        <tbody>
        <col style="width: 100%;background-color: #000000;color: #ffffff;padding: 0px;font-size: 12px;">
        <tr>
            <td align="center">
                <br><strong>LEMBAR OBSERVASI EARLY WARNING SCORE ANAK</strong>
            </td>
        </tr>
        </tbody>
    </table>
    <br>
    <br>
    <table class="content" style="padding-top:10px">
        
        <tbody>
             <tr>
             <td rowspan="2" style=" border: 1px  solid #000; padding:2px 10px; background-color:lightgrey; text-align: center;">Tanda Tanda Vital </td>
                 <td style=" border: 1px  solid #000; padding:2px 10px; background-color:lightgrey; text-align: center;">Tgl </td> 
             <?php  foreach($result as $data){ ?> 
                <td colspan="2" style=" border: 2px  solid #000; padding:2px 5px;  background-color:white ;"> <?php echo date('d-m-Y', strtotime($data['TGL'])); ?></td>
              
             <?php } ?> 
             </tr>


             <tr>
                 <td style=" border: 1px  solid #000; padding:2px 10px; background-color:lightgrey; text-align: center;">Jam </td> 
             <?php  foreach($result as $data){ ?> 
                <td  style=" border: 2px  solid #000; padding:2px 5px ;  background-color:white;"> <?php echo date('H:i', strtotime($data['JAM'])); ?>  </td>
                <td  style=" border: 2px  solid #000; padding:2px 5px ;  background-color:white;"> Skor </td>
             <?php } ?> 
             </tr>


             <tr>
             <td  style=" border: 1px  solid #000; padding:10px 10px; background-color:white; text-align: center;">Pernafasan </td>
                 <td style=" border: 1px  solid #000; padding:2px 10px; background-color:white; text-align: center;"> </td>
                 
             <?php  foreach($result as $data){ ?> 
                <td style=" border: 1px  solid #000; padding:2px 5px;"> <?php echo $data['NAFAS']; ?></td>  
                <td style=" border: 1px  solid #000; padding:2px 5px;"> <?php echo $data['S_NAFAS']; ?></td>  
             <?php } ?> 
             </tr>

             <tr>
             <td  style=" border: 1px  solid #000; padding:10px 10px; background-color:white; text-align: center;">Refraksi Dinding Dada </td>
                 <td style=" border: 1px  solid #000; padding:2px 10px; background-color:white; text-align: center;"> </td>
                 
             <?php  foreach($result as $data){ ?> 
                <td style=" border: 1px  solid #000; padding:2px 5px;"> <?php if($data['RETRAKSI']=='0'){ echo 'Normal';}
                                                                                else if($data['RETRAKSI']=='1'){ echo 'Ringan';}
                                                                                else if($data['RETRAKSI']=='2'){ echo 'Sedang';}
                                                                                else if($data['RETRAKSI']=='3'){ echo 'Parah';}
                                                                                 ?></td>  
                <td style=" border: 1px  solid #000; padding:2px 5px;"> <?php echo $data['RETRAKSI']; ?></td>  
             <?php } ?> 
             </tr>


             <tr>
             <td style=" border: 1px  solid #000; padding:10px 10px; background-color:white; text-align: center;">Oksigen </td>
                 <td style=" border: 1px  solid #000; padding:2px 10px; background-color:white; text-align: center;"> </td>
                 
             <?php  foreach($result as $data){ ?> 
                <td style=" border: 1px  solid #000; padding:2px 5px;"> <?php echo $data['O2']; ?></td>  
                <td style=" border: 1px  solid #000; padding:2px 5px;"> <?php echo $data['S_O2']; ?></td>  
             <?php } ?> 
             </tr>


             <tr>
             <td style=" border: 1px  solid #000; padding:10px 10px; background-color:white; text-align: center;">CRT </td>
                 <td style=" border: 1px  solid #000; padding:2px 10px; background-color:white; text-align: center;"> </td>
                 
             <?php  foreach($result as $data){ ?> 
                <td style=" border: 1px  solid #000; padding:2px 5px;"> <?php echo $data['CRT']; ?></td>  
                <td style=" border: 1px  solid #000; padding:2px 5px;"> <?php echo $data['S_CRT']; ?></td>  
             <?php } ?> 
             </tr>


             <tr>
             <td style=" border: 1px  solid #000; padding:10px 10px; background-color:white; text-align: center;">Alat Bantu O2 </td>
                 <td style=" border: 1px  solid #000; padding:2px 10px; background-color:white; text-align: center;"> </td>
                 
             <?php  foreach($result as $data){ ?> 
                <td style=" border: 1px  solid #000; padding:2px 5px;"> <?php echo $data['AB']; ?></td>  
                <td style=" border: 1px  solid #000; padding:2px 5px;"> <?php echo $data['S_AB']; ?></td>  
             <?php } ?> 
             </tr>

             <tr>
             <td style=" border: 1px  solid #000; padding:10px 10px; background-color:white; text-align: center;">Suhu </td>
                 <td style=" border: 1px  solid #000; padding:2px 10px; background-color:white; text-align: center;"> </td>
                 
             <?php  foreach($result as $data){ ?> 
                <td style=" border: 1px  solid #000; padding:2px 5px;"> <?php echo $data['S']; ?></td>  
                <td style=" border: 1px  solid #000; padding:2px 5px;"> <?php echo $data['S_S']; ?></td>  
             <?php } ?> 
             </tr>

             <tr>
             <td style=" border: 1px  solid #000; padding:10px 10px; background-color:white; text-align: center;">Denyut Jantung </td>
                 <td style=" border: 1px  solid #000; padding:2px 10px; background-color:white; text-align: center;"> </td>
                 
             <?php  foreach($result as $data){ ?> 
                <td style=" border: 1px  solid #000; padding:2px 5px;"> <?php echo $data['J']; ?></td>  
                <td style=" border: 1px  solid #000; padding:2px 5px;"> <?php echo $data['S_J']; ?></td>  
             <?php } ?> 
             </tr>

             <tr>
             <td style=" border: 1px  solid #000; padding:10px 10px; background-color:white; text-align: center;">TD Sistolik </td>
                 <td style=" border: 1px  solid #000; padding:2px 10px; background-color:white; text-align: center;"> </td>
                 
             <?php  foreach($result as $data){ ?> 
                <td style=" border: 1px  solid #000; padding:2px 5px;"> <?php echo $data['TD']; ?></td>  
                <td style=" border: 1px  solid #000; padding:2px 5px;"> <?php echo $data['S_TD']; ?></td>  
             <?php } ?> 
             </tr>


             <tr>
             <td style=" border: 1px  solid #000; padding:10px 10px; background-color:white; text-align: center;">Kesadaran </td>
                 <td style=" border: 1px  solid #000; padding:2px 10px; background-color:white; text-align: center;"> </td>
                 
             <?php  foreach($result as $data){ ?> 
                <td style=" border: 1px  solid #000; padding:2px 5px;"> <?php echo $data['SADAR']; ?></td>  
                <td style=" border: 1px  solid #000; padding:2px 5px;"> <?php echo $data['S_SADAR']; ?></td>  
             <?php } ?> 
             </tr>


             <tr>
             <td style=" border: 1px  solid #000; padding:10px 10px; background-color:lightgrey; text-align: center;">Total Score </td>
                 <td style=" border: 1px  solid #000; padding:2px 10px; background-color:white; text-align: center;"> </td>
                 
             <?php  foreach($result as $data){ ?> 
                <td style=" border: 1px  solid #000; padding:2px 10px; background-color:white; text-align: center;"> </td>
                <td   style=" border: 2px  solid #000;background-color:lightgrey; padding:2px 5px;"> <?php   $t=$data['S_NAFAS']+ $data['S_RETRAKSI'] + $data['S_CRT']+ $data['S_O2']+ $data['S_AB']+$data['S_S']+$data['S_J']+$data['S_SADAR']; echo $t; ?></td>  
             <?php } ?> 
             </tr>

             <tr>
             <td style=" border: 1px  solid #000; padding:2px 10px; background-color:white; text-align: center;">Petugas </td>
                 <td style=" border: 1px  solid #000; padding:2px 10px; background-color:white; text-align: center;"> </td>
                 
             <?php  foreach($result as $data){ ?> 
                <td colspan="2" style=" border: 1px  solid #000; padding:2px 5px;">  
                <qrcode value="<?= $data['MDB'];?>" ec="H" style="width: 10mm; background-color: white; color: black;"></qrcode><br>
                <?php echo $data['MDB']; ?> </td>  
             <?php } ?> 
             </tr>

                                                           
 
    
           
        </tbody>
    </table>
</page>