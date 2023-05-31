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
 foreach($alat as $h){ 
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
                   Jenis Kelamin : <?php echo $vs['JENIS_KELAMIN']; ?> <br>
                 
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
        <b>   DATA PEMAKAIAN ALAT HABIS PAKAI OK</b>
            </td>
        </tr>
        </tbody>
    </table>
 

  <br>
  <br>
  <br>

    <table class="content" style="font-size:12px; padding-top:0px; width:700px" >
        <col style="width: 30%;font-size: 12px;">
        <col style="width: 50%;font-size: 12px;">
         <tbody>
  
         <tr>
            <td  >Tanggal Operasi </td><td> : <?= $h['TGL_OP'];?></td></tr> 
        <tr>
            <td >  Jam Operasi  </td> <td> : </td> </tr>
       <tr>  <td >  Dokter Operator  </td> <td> : </td>  </tr>
       <tr>   <td >  Dokter Anestesi  </td> <td> : </td> </tr>
          
         </tbody>
    </table>
<br>
<br>
    <table  >
              <tr>
              <td style="border-left:solid 1px ; border-top:solid 1px #000000;border-bottom:solid 1px #000000; width:300px"> Nama Barang</td>
              <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000; border-bottom:solid 1px #000000;"> Jumlah</td>
              </tr>

             <?php    $juml=substr_count($h['namabarang'],",");

                    $pecah=explode(",",$h['namabarang']);
 
                    for($a=0; $a<$juml; $a++){ 

                        $jumlah=explode("Jumlah :",$pecah[$a]);
                        
                        echo "<tr>
                        <td style='border-left:solid 1px ;   border-bottom:solid 1px #000000;'>
                             ".$jumlah[0]."
                           </td>
                           <td style='border-left:solid 1px ;border-right:solid 1 px #000000;  border-bottom:solid 1px #000000;'>

                           ".$jumlah[1]."
                         </td>
                        </tr>";
                    }?>
                        
             </table>

 
  
    <br>
    <br>
  
</page> 


<?php } ?>