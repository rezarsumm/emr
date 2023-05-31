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
             <?= strip_tags($rs_pra_anes['PEMERIKSAAN_FISIK']); ?>
                </td>
            <br>
            </tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><hr></td></tr>


            <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">
            <B> KEADAAN UMUM </B>
            <BR>
             <b>Kebiasaan :</b><br>
              - Merokok sebanyak    <?= strip_tags($rs_pra_anes['K_ROKOK']); ?> <br>
              - Minum teh/kopi/alkohol sebanyak    <?= strip_tags($rs_pra_anes['K_KOPI']); ?><br>
              - Olahraga teratur sebanyak    <?= strip_tags($rs_pra_anes['K_OLGA']); ?><br>
              <br>
              <b>Riwayat Alergi : </b>  <?= strip_tags($rs_pra_anes['RIWAYAT_ALERGI']); ?> <br>
              <b>Riwayat Sakit yang diderita : </b>  <?= strip_tags($rs_pra_anes['RIWAYAT_SAKIT']); ?> <br>
              <b>Riwayat Sakit keluarga   : </b>  <?= strip_tags($rs_pra_anes['RIWAYAT_SAKIT_KELUARGA']); ?> <br>
              <b>Riwayat Operasi   : </b>  <?= strip_tags($rs_pra_anes['RIWAYAT_OP']); ?> <br>
              <b>Riwayat terdiagnosa HIV/periksa HIV   : </b>  <?= strip_tags($rs_pra_anes['RIWAYAT_HIV']); ?> <br>
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
              <td style="padding-right:20px">:  <?= strip_tags($rs_pra_anes['HILANG_GIGI']); ?> </td>
              <td>Muntah </td>
              <td>:  <?= strip_tags($rs_pra_anes['MUNTAH']); ?> </td>
            </tr>
            <tr> 
              <td>Mobilitas Leher </td>
              <td style="padding-right:50px">:  <?= strip_tags($rs_pra_anes['LEHER']); ?> </td>
              <td>Pingsan </td>
              <td>:  <?= strip_tags($rs_pra_anes['PINGSAN']); ?> </td>
            </tr>
            <tr> 
              <td>   Leher Pendek </td>
              <td>:  <?= strip_tags($rs_pra_anes['LEHER_PENDEK']); ?> </td>
              <td>Stroke </td>
              <td>:  <?= strip_tags($rs_pra_anes['STROKE']); ?> </td>
            </tr>
            <tr> 
              <td>Batuk  </td>
              <td>:  <?= strip_tags($rs_pra_anes['BATUK']); ?> </td>
              <td>Kejang </td>
              <td>:  <?= strip_tags($rs_pra_anes['KEJANG']); ?> </td>
            </tr>
            <tr> 
              <td>  Sesak Nafas </td>
              <td>:  <?= strip_tags($rs_pra_anes['SESAK']); ?> </td>
              <td>Hamil </td>
              <td>:  <?= strip_tags($rs_pra_anes['HAMIL']); ?> </td>
            </tr>
            <tr> 
              <td>  Infeksi Saluran Nafas </td>
              <td>:  <?= strip_tags($rs_pra_anes['SALURAN_NAPAS']); ?> </td>
              <td>Kelainan Tulang Belakang </td>
              <td>:  <?= strip_tags($rs_pra_anes['TULANG_BLK']); ?> </td>
            </tr>
            <tr> 
              <td>Sakit Dada   </td>
              <td>:  <?= strip_tags($rs_pra_anes['DADA']); ?> </td>
              <td>Jantung Tidak Normal </td>
              <td>:  <?= strip_tags($rs_pra_anes['JANTUNG']); ?> </td>
            </tr>
            </table>
            
                </td>
             </tr>
             <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">Ket : <?= strip_tags($rs_pra_anes['KET']); ?></td></tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><hr></td></tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><B> Diagnosa</B>: 
                 <?= strip_tags($rs_pra_anes['DIAGNOSA']); ?><BR></td></tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><B> Klasifikasi ASA</B>: 
                 <?= strip_tags($rs_pra_anes['CLASS_ASA']); ?><BR></td></tr>
             <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><B> Penyulit Anestesi</B> :
                <?= strip_tags($rs_pra_anes['PENYULIT_ANESTESI']); ?><BR></td></tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><B> Catatan Tindak Lanjut</B> :
                <?= strip_tags($rs_pra_anes['TL']); ?><BR></td></tr>
             <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><hr></td></tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><B> Teknik Anestesi</B>  :
                <?= strip_tags($rs_pra_anes['TEKNIS_ANESTESI']); ?><BR></td></tr>
             <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><B> Teknik Khusus</B>  :
                <?= strip_tags($rs_pra_anes['TEKNIS_KHUSUS']); ?><BR></td></tr>
             <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><B> Perawatan Pasca Anestesia</B>  :
                <?= strip_tags($rs_pra_anes['PERAWATAN']); ?><BR></td></tr>

             <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><B> Persiapan Pra Anestesia</B> <br>
             Puasa <?= strip_tags($rs_pra_anes['PUASA']); ?><BR>
             Pra Medis <?= strip_tags($rs_pra_anes['PRE_MEDIK']); ?><BR>
             TRansport ke Kamar Bedah <?= strip_tags($rs_pra_anes['TRANSPORT_RUANG_OP']); ?><BR>
             Rencana OP <?= strip_tags($rs_pra_anes['RENCANA_OP']); ?><BR>
             </td></tr>
         
             <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"><hr></td></tr>

             <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000; border-bottom:solid 1px #000000">
            <B> CATATAN PERSIAPAN </B>
            <BR>
             <?= strip_tags($rs_pra_anes['CATATAN']); ?>
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
                     
            Tanggal <?= $rs_pra_anes['TGL_OP']; ?>  
                  

                </td> 
               
                
              
            </tr>
            <tr>
                 <td align='center'>
                 
                </td>
                <td align='center'>
 
                    <qrcode value="<?= $rs_pra_anes['KD_OPERATOR']; ?> pada <?= $rs_pra_anes['TGL_OP']; ?>  " ec="H" style="width: 20mm; background-color: white; color: black;"></qrcode>
                  <br>
                  <br>
                    <?= strtoupper($rs_pra_anes['NAMALENGKAP']); ?>
                </td>
            </tr>
        </tbody>
 </table>
    <br>
  
</page> 
 