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
<page orientation="P" backtop="15mm" backbottom="10mm" backleft="15mm" backright="10mm" style="font-size:9pt">
    <page_header>
     <table class="page_header">
        <tr>
            <td style="width:10%;border-bottom:solid 1px #000000; float: left" >
                <img src="<?php base_url() ?>resource/doc/images/icon/logo.png" width="50" height="50" />
            </td>
          
            <td style="width:75%;text-align: center;border-bottom:solid 1px #000000;">
                <h5>MAJELIS PEMBINA KESEHATAN UMUM
                <br>RSU MUHAMMADIYAH METRO</h5>
                
           

                <table style="float:center; padding-left: 70px"> 
                <tr> 
                    <td style="text-align: left; font-size: 8px"> Jl Soekarno Hatta No. 42 Mulyojati 16 B</td>
                    <td style="text-align: left; font-size: 8px" > Fax : (0725) 47760 </td>
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
          <td style="width:15%;border-bottom:solid 1px #000000; float:right" >
                <img src="<?php base_url() ?>resource/doc/images/icon/kars.png" width="50" height="50" />
            </td>

          
        </tr>
    </table>

    </page_header>
    <table class="content">
        <tbody>
        <col style="width: 100%;padding-top: 40px;font-size: 12px;">
        <tr>
             <td style="width:10%;border-bottom:solid 1px #000000;" >
                 
                </td>
                <td style="width:90%;text-align: center;border-bottom:solid 1px #000000;">
                  
                </td>
        </tr>
        </tbody>
    </table>
   
    <hr>
    <table class="content" style="font-size:10px">
      
        <tbody>
        <tr>
            <td align="center" colspan="2"> 
                <b><h5>PERMINTAAN PEMERIKSAAN PENUNJANG RADIOLOGI</h5></b>  
            </td>
        </tr>
        <tr>
            <td  >Nama </td>
            <td> :<?php echo $rs_pasien['Nama_Pasien']; ?></td>
          
        </tr>
        <tr>  <td>No. RM </td>
                <td> : <?= $rs_pasien['No_MR']; ?></td> </tr>
        <tr>
            <td>Tanggal Lahir </td>
             <td> : <?= date('d-m-Y',  strtotime($rs_pasien['TGL_LAHIR'])); ?></td></tr>
        <tr>
            <td>Jk </td>
            <td>  : <?php if($rs_pasien['JENIS_KELAMIN']=='L'){
                echo "Laki-Laki";
            }else{
                echo "Perempuan";
            } ?></td>
           
        </tr>
        <tr>
           <!--   <td>Bagian : <?= $rs_pasien['SPESIALIS']; ?></td> -->
            <td >Alamat </td>
            <td>: <?= $rs_pasien['Alamat']; ?></td>
        </tr>
        </tbody>
    </table>
    <hr>
    <table class="content">
        <col style="width: 50%;font-size: 11px;">
        <col style="width: 50%;font-size: 11px;">
        <tbody>
            <tr>
                <td colspan="2">Assalamu'alaikum Wr. Wb.</td>
            </tr>
            <tr>
                <td>Pemeriksaan Penunjang yang diminta</td>
                <td>:  <?= $rs_pasien['FS_RAD']; ?>
              
                </td>
            </tr>
            <tr>
                <td colspan="2"><b>KETERANGAN KLINIK PENDERITA</b></td>
            </tr>
             <tr>
                <td>Diagnosa</td>
                <td>
                    : <?= strip_tags($rs_resume['FS_DIAG_UTAMA']); ?>
                </td>
                
            </tr>
          <!--   <tr>
                <td>Alergi</td>
                <td>
                    : <?= $rs_pasien['FS_ALERGI']; ?>
                </td>
                
            </tr>
            <tr>
                <td>High Risk</td>
                <td>
                    : <?= $rs_pasien['FS_HIGH_RISK']; ?>
                </td>
                
            </tr> -->
            <tr>
                <td colspan="2"><br>Wassalamu'alaikum Wr. Wb<br></td>
                
            </tr>
        </tbody>
    </table>
 <table class="content">
        <col style="width: 50%;font-size: 12px;">
        <col style="width: 50%;font-size: 12px;">
        <tbody> 
            <tr>
                 <br>
                 <br>
                <td></td>
                <td align='center'><?= $alamat['pref_value'];?>, <?= $rs_pasien['mdd_date']; ?></td>
            </tr>
            <tr>
                <td></td>
                <td align='center'>
                    <qrcode value="<?= $rs_pasien['NAMALENGKAP']; ?> pada <?= $rs_pasien['mdd_date']; ?>" ec="H" style="width: 15mm; background-color: white; color: black;"></qrcode>
                    <br>
                </td>
            </tr>
            <tr>
                <td></td>
                <td align='center'>
                    <?= $rs_pasien['NAMALENGKAP']; ?>
                </td>
            </tr>
        </tbody>
 </table>
</page>