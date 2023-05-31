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
<?php
date_default_timezone_set('Asia/Jakarta');
$dayList = array(
    'Sun' => 'Minggu',
    'Mon' => 'Senin',
    'Tue' => 'Selasa',
    'Wed' => 'Rabu',
    'Thu' => 'Kamis',
    'Fri' => 'Jumat',
    'Sat' => 'Sabtu'
);
?>
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
                
           

             <table style="float:center; padding-left: 60px"> 
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
    <br><br>
    <table class="content">
        <tbody>
            <col style="width: 100%;padding-top: 30px;font-size: 15px;">
            <tr>
                <td align="center">
                <u> SURAT KETERANGAN DIRAWAT </u>
                 
                </td>
            </tr>
        </tbody>
    </table>
    <br> <br>
    Yang bertanda tangan dibawah ini, Dokter RSU Muhammadiyah Metro menerangkan bahwa : <br>
<br>
    <table class="content">
        <col style="width: 30%;font-size: 12px;">
        <col style="width: 70%;font-size: 12px;">
        <tbody>
          
            <tr>
                <td>Nama</td>
                <td>
                    : <?= $ket_sakit['NAMA_PASIEN']; ?>
                </td>
            </tr>
            <tr>
                <td>Umur</td>
                <td>
                    : <?= $ket_sakit['umur']; ?>
                </td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    : <?= $ket_sakit['JENIS_KELAMIN']; ?>
                </td>
            </tr>
             <tr>
                <td>Alamat</td>
                <td>
                    : <?= $ket_sakit['ALAMAT']; ?>
                </td>
            </tr>
         
      
        </tbody>
    </table>
    <br><br>
    Sedang dirawat di RSU Muhammadiyah Metro  
    dari tanggal <?php echo date('d F Y', strtotime($ket_sakit['TANGGAL']));?>  sampai saat ini
    dengan diagnosa <?= $ket_sakit['DIAGNOSA'];?>.
     <br><br>
    Demikian, Surat Keterangan ini agar digunakan sebagaimana mestinya.
    <br>
    <br>
    <br>
    <br>
    <br>

    <table class="content">
        <col style="width: 20%;font-size: 12px;">
        <col style="width: 20%;font-size: 12px;">
        <col style="width: 60%;font-size: 12px;">
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td align='center'>
                    Metro, <?php echo date('d F Y', strtotime($ket_sakit['mdd']));?>      
                           
                    <br>  
                    <br>  
                    <qrcode value=" <?= $ket_sakit['NAMALENGKAP']; ?> pada <?= $ket_sakit['mdd']; ?> <?= $ket_sakit['FS_JAM_TRS']; ?>" ec="H" style="width: 15mm; background-color: white; color: black;"></qrcode>
                    <br><br>
                    <?= $ket_sakit['NAMA_DOKTER']; ?>       
                  
                </td>
            </tr>
           
        </tbody>
    </table>
</page> 