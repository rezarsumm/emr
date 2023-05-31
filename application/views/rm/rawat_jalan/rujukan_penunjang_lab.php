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
    <table class="content">
        <col style="width: 25%;font-size: 10px;">
        <col style="width: 25%;font-size: 10px;">
        <col style="width: 25%;font-size: 10px;">
        <col style="width: 25%;font-size: 10px;">
        <tbody>
        <tr>
            <td align="center" rowspan="4">
                <b>PERMINTAAN PEMERIKSAAN PENUNJANG</b>
            </td>
        </tr>
        <tr>
            <td colspan="2">Nama : <?= $rs_pasien['NAMA_PASIEN']; ?></td>
            <td>No. RM : <?= $rs_pasien['NO_MR']; ?></td>
        </tr>
        <tr>
            <td>Tanggal Lahir : <?= date('d-m-Y',  strtotime($rs_pasien['TGL_LAHIR'])); ?></td>
            <td>Jk : <?php if($rs_pasien['JENIS_KELAMIN']=='L'){
                echo "Laki-Laki";
            }else{
                echo "Perempuan";
            } ?></td>
            <td>Bagian : <?= $rs_pasien['SPESIALIS']; ?></td>
        </tr>
        <tr>
            <td colspan="3">Alamat : <?= $rs_pasien['ALAMAT']; ?></td>
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
                <td>:
                <?php foreach($rs_lab as $lab){
                    echo $lab['JENIS'].",<br>";
                } ?>
                </td>
            </tr>
            <tr>
                <td colspan="2"><b>KETERANGAN KLINIK PENDERITA</b></td>
            </tr>
             <tr>
                <td>Diagnosa</td>
                <td>
                    : <?= strip_tags($result['FS_DIAGNOSA']); ?>
                </td>
                
            </tr>
            <tr>
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
                
            </tr>
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
                <td align='center'><?= $alamat['pref_value'];?>, <?= $result['mdd']; ?></td>
            </tr>
            <tr>
                <td></td>
                <td align='center'>
                    <qrcode value="<?= $result['NAMA_DOKTER']; ?> pada <?= $result['mdd']; ?>" ec="H" style="width: 15mm; background-color: white; color: black;"></qrcode>
                    <br>
                </td>
            </tr>
            <tr>
                <td></td>
                <td align='center'>
                    <?= $result['NAMA_DOKTER']; ?>
                </td>
            </tr>
        </tbody>
 </table>
</page>