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
                     Nama : <?php echo $rs_pasien['NAMA_PASIEN'];?> <br>
                    No MR : <?php echo $rs_pasien['NO_MR'];?> <br>
                    Tgl Lahir : <?php echo date('d-M-Y', strtotime($rs_pasien['TGL_LAHIR'])); ?><br>
                   Ruangan : <?php echo  $rs_pasien['NAMA_RUANG']; ?><br>
                 
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
                <br><strong>RENCANA PEMULANGAN PASIEN</strong>
            </td>
        </tr>
        </tbody>
    </table>
    <br>
    <br>
    <table class="content" style="padding-top:2px">
        
        <tbody>
        <tr>
                    <td> Diagnosa  </td>
                    <td colspan="2"> :
                      <?php echo  $rp['DIAGNOSA'];?> 
                    </td>
                </tr>
            <tr>
                <td>Tanggal MRS</td>
                <td colspan="2"> :   <?php echo  date('d-m-Y', strtotime($rp['TGL_MRS']));?> Jam  <?php echo  date('H:i', strtotime($rp['JAM_MRS']));?> 
                
                </td>
            </tr>
           
            <tr>
                <td>Alasan MRS</td>
                <td colspan="2"> :
                      <?php echo  $rp['ALASAN_MRS'];?> 
                    </td>
            </tr>
          
            <tr>
                <td>Tanggal Rencana Pemulangan</td>
               
                <td colspan="2"> :   <?php echo  date('d-m-Y', strtotime($rp['TGL_RENCANA_PULANG']));?> Jam  <?php echo  date('H:i', strtotime($rp['JAM_RENCANA_PULANG']));?> 
                
                </td>
            </tr>
            
            <tr>
                <td>Estimasi Tanggal Pemulangan</td>
                
                <td colspan="2"> :<?php echo  date('d-m-Y', strtotime($rp['ESTIMASI_TGL']));?>
                    </td>
            </tr>
        </tbody>
  </TABLE>
<br>
<br>
            <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="4"> KETERANGAN RENCANA PEMULANGAN</th> 
            </tr>
            <tr>
                <td> Pengaruh Rawat Inap Terhadap Pasien  </td>
                <td colspan="3"> :
                     :  <?php echo  $rp['PENGARUH_P'];?> 
                </td>
                
            </tr>
            <tr>
                <td> Pengaruh Rawat Inap Terhadap Pekerjaan  </td>
                <td colspan="3"> :
                     <?php echo  $rp['PENGARUH_JOB'];?> 
                </td>
                
            </tr>
            <tr>
                <td> Pengaruh Rawat Inap Terhadap Keuangan  </td>
                <td colspan="3"> :
                   <?php echo  $rp['PENGARUH_K'];?> 
                </td>
                
            </tr>

            <tr>
                <td> Antisipasi Terhadap Masalah ketika pulang  </td>
                <td colspan="3"> :
                   
                   <?php echo  $rp['ANTI'];?> 
                </td>
                
            </tr>

            <tr>
                <td> Bantuan diperlukan dalam hal </td>
                <td  colspan="3"> :   <?php echo  $rp['BANTUAN'];?>  
                </td>
            </tr>

            <tr>
                <td  > Adakah yang membantu keperluan tersebut  </td>
                <td  >  
                       :   <?php echo  $rp['PEMBANTU'];?>  
                </td>
                
            </tr>
            <tr>
                <td  > Apakah pasien hidup sendiri saat pulang dari rumah sakit  </td>
                <td  >   
                    :   <?php echo  $rp['TINGGAL'];?>   
                </td>
                
            </tr>

            <tr>
                <td  > Apakah pasien menggunakan alat medis setelah keluar rs  </td>
                <td  >    
                    :   <?php echo  $rp['ALAT_MEDIS'];?>  
                </td>
                
            </tr>

            <tr>
                <td  > Apakah pasien memerlukan alat bantu saat keluar dari rs  </td>
                <td  >   
                    :   <?php echo  $rp['ALAT_BANTU'];?>  
                </td>
                
            </tr>


            <tr>
                <td  > Apakah pasien memerlukan bantuan perawatan saat keluar dari rs </td>
                <td  >   
                    :   <?php echo  $rp['BANTU_KHUSUS'];?>  
                </td>
                
            </tr>

            <tr>
                <td  > Apakah pasien bermasalah dalam memenuhi kebutuhan pribadi setelah keluar dari rs </td>
                <td  >   
                    :   <?php echo  $rp['K_PRIBADI'];?>  
                </td>
                
            </tr>

            <tr>
                <td  > Apakah pasien memiliki nyeri kronis dan kelelahan saat keluar dari rs </td>
                <td  >   
                    :   <?php echo  $rp['NYERI'];?>  
                </td>
                
            </tr>

            <tr>
                <td  > Apakah pasien dan keluarga memerlukan edukasi saat keluar dari rs </td>
                <td  >   
                    :   <?php echo  $rp['EDUKASI'];?>  
                </td>
                
            </tr>
            <tr>
                <td  > Apakah pasien dan keluarga memerlukan keterampilan khusus saat keluar dari rs </td>
                <td  >   
                    :   <?php echo  $rp['KETR2'];?>  
                </td>
                
            </tr>
         
         
    </table>
    <br>
          <br>
          <br>
          <table>
          <tr>
                <td style="border-left:solid 0px #000000;border-bottom:solid 0px #000000;text-align: center;"></td>
                <td style="border-right:solid 0px #000000;border-bottom:solid 0px #000000;text-align: center;">
                    Tanggal <?= $vs['MDD']; ?>  
                    <br><br>
                     
                    <br><br>
                    <br><br>
                    <?= $vs['NAMALENGKAP']; ?>
                </td>

                <td style="border-right:solid 0px #000000;border-bottom:solid 0px #000000;text-align: center; padding-left:200px">
                    Pasien/Keluarga Pasien
                    <br><br>
                     
                    <br><br>
                    <br><br>
                   ..........................................
                </td>
            </tr>
          </table>
              
      
            
</page>