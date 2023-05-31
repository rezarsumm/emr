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
<?php date_default_timezone_set('Asia/Jakarta'); 
//  var_dump($rs_ases_medis);
 foreach($rs_pra_anes as $h){ 
?>
 
<page orientation="P" backtop="15mm" backbottom="10mm" backleft="15mm" backright="10mm" style="font-size:9pt">
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
            <td  style="font-size: 10px">
                     Nama : <?php echo $rs_pasien['NAMA_PASIEN']; ?><br>
                    No MR : <?php echo $rs_pasien['NO_MR']; ?><br>
                    Tgl Lahir : <?php echo date('d-M-Y', strtotime($rs_pasien['TGL_LAHIR'])); ?> <br>
                   Jenis Kelamin : <?php echo $rs_pasien['JENIS_KELAMIN']; ?> <br>
                 
                  </td>
            </tr>
        </table>
        <hr>
    </page_header>
    <page_footer>
    <table style="width: 100%; border-top: solid 1px black;">
        <tr>
            <td style="text-align: left; width: 80%">&nbsp;</td>
            <td style="text-align: right; width: 20%">Halaman [[page_cu]]/[[page_nb]]</td>
        </tr>
    </table>
    </page_footer>
 <br>
 <br>
 
    <table class="content" style="padding-top: 30px; padding-left:2px">
        <tbody>
                
        <col style="width: 100%; font-size: 12px;">
        <tr>
            <td align="center">
            ASESMEN PRA ANESTESIA & BEDAH 
            </td>
        </tr>
        </tbody>
    </table>
 

  

    <table class="content" style="font-size:12px; padding-top:0px; width:700px" >
        <col style="width: 100%;font-size: 12px;">
         <tbody>
  
            <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">
            <B> PEMERIKSAAN FISIK </B>
            <BR>
             <?= strip_tags($h['PEMERIKSAAN_FISIK']); ?>
                </td>
            <br>
            </tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><hr></td></tr>


            <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">
            <B> KEADAAN UMUM </B>
            <BR>
             <b>Kebiasaan :</b><br>
              - Merokok sebanyak    <?= strip_tags($h['K_ROKOK']); ?> <br>
              - Minum teh/kopi/alkohol sebanyak    <?= strip_tags($h['K_KOPI']); ?><br>
              - Olahraga teratur sebanyak    <?= strip_tags($h['K_OLGA']); ?><br>
              <br>
              <b>Riwayat Alergi : </b>  <?= strip_tags($h['RIWAYAT_ALERGI']); ?> <br>
              <b>Riwayat Sakit yang diderita : </b>  <?= strip_tags($h['RIWAYAT_SAKIT']); ?> <br>
              <b>Riwayat Sakit keluarga   : </b>  <?= strip_tags($h['RIWAYAT_SAKIT_KELUARGA']); ?> <br>
              <b>Riwayat Operasi   : </b>  <?= strip_tags($h['RIWAYAT_OP']); ?> <br>
              <b>Riwayat terdiagnosa HIV/periksa HIV   : </b>  <?= strip_tags($h['RIWAYAT_HIV']); ?> <br>
                </td>
            <br>
            </tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><hr></td></tr>

            <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">
            <B>    KAJIAN SISTEM </B>
            <BR>
            <table>
            <tr> 
              <td>Hilangnya Gigi </td>
              <td style="padding-right:20px">:  <?= strip_tags($h['HILANG_GIGI']); ?> </td>
              <td>Muntah </td>
              <td>:  <?= strip_tags($h['MUNTAH']); ?> </td>
            </tr>
            <tr> 
              <td>Mobilitas Leher </td>
              <td style="padding-right:50px">:  <?= strip_tags($h['LEHER']); ?> </td>
              <td>Pingsan </td>
              <td>:  <?= strip_tags($h['PINGSAN']); ?> </td>
            </tr>
            <tr> 
              <td>   Leher Pendek </td>
              <td>:  <?= strip_tags($h['LEHER_PENDEK']); ?> </td>
              <td>Stroke </td>
              <td>:  <?= strip_tags($h['STROKE']); ?> </td>
            </tr>
            <tr> 
              <td>Batuk  </td>
              <td>:  <?= strip_tags($h['BATUK']); ?> </td>
              <td>Kejang </td>
              <td>:  <?= strip_tags($h['KEJANG']); ?> </td>
            </tr>
            <tr> 
              <td>  Sesak Nafas </td>
              <td>:  <?= strip_tags($h['SESAK']); ?> </td>
              <td>Hamil </td>
              <td>:  <?= strip_tags($h['HAMIL']); ?> </td>
            </tr>
            <tr> 
              <td>  Infeksi Saluran Nafas </td>
              <td>:  <?= strip_tags($h['SALURAN_NAPAS']); ?> </td>
              <td>Kelainan Tulang Belakang </td>
              <td>:  <?= strip_tags($h['TULANG_BLK']); ?> </td>
            </tr>
            <tr> 
              <td>Sakit Dada   </td>
              <td>:  <?= strip_tags($h['DADA']); ?> </td>
              <td>Jantung Tidak Normal </td>
              <td>:  <?= strip_tags($h['JANTUNG']); ?> </td>
            </tr>
            </table>
            
                </td>
            <br>
            </tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><hr></td></tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"> <?= strip_tags($h['KET']); ?></td></tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><hr></td></tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><B> Diagnosa</B>: 
             <?= strip_tags($h['DIAGNOSA']); ?><BR></td></tr>
             <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><B> Klasifikasi ASA</B>: 
                 <?= strip_tags($rs_pra_anes['CLASS_ASA']); ?><BR></td></tr>
             <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><B> Penyulit Anestesi</B> :
             <?= strip_tags($h['PENYULIT_ANESTESI']); ?><BR></td></tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><B> Catatan Tindak Lanjut</B> :
             <?= strip_tags($h['TL']); ?><BR></td></tr>
             <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><hr></td></tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><B> Teknik Anestesi</B>  :
             <?= strip_tags($h['TEKNIS_ANESTESI']); ?><BR></td></tr>
             <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><B> Teknik Khusus</B>  :
             <?= strip_tags($h['TEKNIS_KHUSUS']); ?><BR></td></tr>
             <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><B> Perawatan Pasca Anestesia</B>  :
             <?= strip_tags($h['PERAWATAN']); ?><BR></td></tr>

             <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><B> Persiapan Pra Anestesia</B> <br>
             Puasa <?= strip_tags($h['PUASA']); ?><BR>
             Pra Medis <?= strip_tags($h['PRE_MEDIK']); ?><BR>
             TRansport ke Kamar Bedah <?= strip_tags($h['TRANSPORT_RUANG_OP']); ?><BR>
             Rencana OP <?= strip_tags($h['RENCANA_OP']); ?><BR>
             </td></tr>
         
             <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><hr></td></tr>

             <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000; border-bottom:solid 1px #000000">
            <B> CATATAN PERSIAPAN </B>
            <BR>
             <?= strip_tags($h['CATATAN']); ?>
                </td>
            <br>
            </tr>

        </tbody>
    </table>

 
<BR> 
<BR> 
<table class="content">
        <col style="width: 50%;font-size: 12px;">
        <col style="width: 50%;font-size: 12px;">
        <tbody> 
           
            <tr>
            <td align='center'></td>
            <td align='center'>
                     
            Tanggal <?= $h['TGL_OP']; ?>  
                  

                </td> 
               
                
              
            </tr>
            <tr>
                 <td align='center'>
                 
                </td>
                <td align='center'>
 
                    <qrcode value="<?= $h['KD_OPERATOR']; ?> pada <?= $h['TGL_OP']; ?>  " ec="H" style="width: 20mm; background-color: white; color: black;"></qrcode>
                  <br>
                  <br>
                    <?= strtoupper($h['NAMALENGKAP']); ?>
                </td>
            </tr>
        </tbody>
 </table>
    <br>
  
</page> 


<?php } ?>