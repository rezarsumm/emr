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
        <b>   DATA UMUM PRA BEDAH </b>
            </td>
        </tr>
        </tbody>
    </table>
 

  

    <table class="content" style="font-size:12px; padding-top:0px; width:700px" >
        <col style="width: 100%;font-size: 12px;">
         <tbody>
  
            <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">
         
            <BR>
             
            <table>
             <tr> <td>Diagnosa </td><td style="padding-right:70px">:<?= strip_tags( $rs_umum_pra['DIAGNOSA']); ?> </td><td> TB </td><td>: <?= strip_tags( $rs_umum_pra['TB']); ?> cm</td></tr>
             <tr> <td>Jenis Operasi  </td><td>:<?= strip_tags( $rs_umum_pra['JENIS_OP']); ?> </td><td> BB </td><td>: <?= strip_tags( $rs_umum_pra['BB']); ?> kg</td></tr>
             <tr> <td> Dokter Operator  </td><td style="padding-right:70px">:<?= strip_tags( $rs_op['NAMALENGKAP']); ?> </td><td> TD </td><td>:<?= strip_tags( $rs_umum_pra['TD']); ?> mmHg</td></tr>
             <tr> <td> Makan/Minum terakhir/Puasa  </td><td>:<?= strip_tags( $rs_umum_pra['MAKAN_TERAKHIR']); ?> </td><td> TD </td><td>: <?= strip_tags( $rs_umum_pra['ND']); ?>/menit</td></tr>
             <tr> <td> Riwayat Asma   </td><td>:<?= strip_tags( $rs_umum_pra['RIWAYAT_ASMA']); ?> </td><td> Suhu </td><td>: <?= strip_tags( $rs_umum_pra['SH']); ?></td></tr>
             <tr> <td> Alergi  </td><td>:<?= strip_tags( $rs_umum_pra['RIWAYAT_ALERGI']); ?> </td><td></td><td></td> </tr>
             <tr> <td> Antibiotik Profilaksis   </td><td>:<?= strip_tags( $rs_umum_pra['ANTIBIOTIK']); ?> </td><td> SPO2 </td><td>: <?= strip_tags( $rs_umum_pra['SPO2_umum_pra']); ?></td> </tr>

            </table>
                </td>
            <br>
            </tr>
           
            <tr><td style="border-left:solid 1px ;border-right:solid 1 px #000000; border-bottom:solid 1px #000000;""></td></tr>
            <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">
            <B> PERSIAPAN PRE OPERASI </B>
            <BR>
             <Table>
             <tr><td> Tindakan </td><td></td></tr>
             <tr><td> Melapor Ke Dokter Bedah </td><td> <?= strip_tags( $rs_umum_pra['LAPOR_DOKTER']); ?> </td></tr>
             <tr><td>  Melapor Ke Kamar Operasi </td><td> <?= strip_tags( $rs_umum_pra['LAPOR_OK']); ?> </td></tr>
             <tr><td>  Mengisi Surat Izin Pembedahan dan Anestesi </td><td> <?= strip_tags( $rs_umum_pra['SURAT_IZIN']); ?> </td></tr>
             <tr><td>  Menandai Daerah Operasi </td><td> <?= strip_tags( $rs_umum_pra['TANDA_OP']); ?> </td></tr>
             <tr><td>  Memakai Gelang Identitas </td><td> <?= strip_tags( $rs_umum_pra['GELANG']); ?> </td></tr>
             <tr><td>  Melepas Gigi Palsu </td><td> <?= strip_tags( $rs_umum_pra['LEPAS_BEHEL']); ?> </td></tr>
             <tr><td>  Menghapus Lipstick </td><td> <?= strip_tags( $rs_umum_pra['HAPUS_LIPS']); ?> </td></tr>
             <tr><td>  MElakukan Oral Hygiene </td><td> <?= strip_tags( $rs_umum_pra['ORAL_HYG']); ?> </td></tr>
             <tr><td>  Memasang Bidai, Fiksasi Leher </td><td> <?= strip_tags( $rs_umum_pra['BIDAI']); ?> </td></tr>
             <tr><td>  Memasang Infus </td><td> <?= strip_tags( $rs_umum_pra['INFUS']); ?> </td></tr>
             <tr><td>  Memasang DC </td><td> <?= strip_tags( $rs_umum_pra['DC']); ?> </td></tr>
             <tr><td>  Memasang NGT </td><td> <?= strip_tags( $rs_umum_pra['NGT']); ?> </td></tr>
             <tr><td>  Memasang Drainage </td><td> <?= strip_tags( $rs_umum_pra['DRAINAGE']); ?> </td></tr>
             <tr><td>  Memasang WSD </td><td> <?= strip_tags( $rs_umum_pra['WSD']); ?> </td></tr>
             <tr><td> Mencukur Daerah Operasi</td><td> <?= strip_tags( $rs_umum_pra['CUKUR_OP']); ?> </td></tr>
             <tr><td> Lain-lain</td><td> <?= strip_tags( $rs_umum_pra['LAIN']); ?> </td></tr>
             </Table>
            </td>
            <br>
            </tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">  Penyakit Kronis :  <?= strip_tags( $rs_umum_pra['SAKIT_KRONIS']); ?>  </td></tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">  Premedikasi :  <?= strip_tags( $rs_umum_pra['PREMEDIKASI']); ?>  </td></tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">  IVFD :  <?= strip_tags( $rs_umum_pra['IVFD']); ?>  </td></tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">  DC :  <?= strip_tags( $rs_umum_pra['DC']); ?>  </td></tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">  Lampiran  :  <?= strip_tags( $rs_umum_pra['LAMPIRAN']); ?>  </td></tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">  Darah  :  <?= strip_tags( $rs_umum_pra['DARAH']); ?>, <?= strip_tags( $rs_umum_pra['JUM_DARAH']); ?>  </td></tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">  Obat - Obat  :  <?= strip_tags( $rs_umum_pra['OBAT']); ?>, <?= strip_tags( $rs_umum_pra['OBAT']); ?>  </td></tr>
            <tr>   <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;"> Rontgen :  <?= strip_tags( $rs_umum_pra['RONTGEN']); ?>, <?= strip_tags( $rs_umum_pra['RONTGEN']); ?>  </td></tr>
            <tr><td style="border-left:solid 1px ;border-right:solid 1 px #000000; border-bottom:solid 1px #000000;""></td></tr>
        </tbody>
    </table>

 
<BR> 
<BR> 
<table class="content">
        <col style="width: 50%;font-size: 12px;">
        <col style="width: 50%;font-size: 12px;">
        <tbody> 
            <tr>
                 
                <td align='center'>TTD Petugas Anestesi</td>
                <td align='center'>TTD Petugas Ruangan</td>
            </tr>
            <tr>
            <td align='center'>
                     
                     Tanggal <?=  date("d-m-Y", strtotime($rs_umum_pra['MDD']))." ".$rs_umum_pra['Time_input_umum_pra']; ?>  
                    <br><br>
                    <qrcode value="<?=  $rs_umum_pra['KD_PERAWAT']; ?> pada <?=  date("d-m-Y", strtotime($rs_umum_pra['MDD']))." ".$rs_umum_pra['Time_input_umum_pra']; ?>  " ec="H" style="width: 10mm; background-color: white; color: black;"></qrcode>
                    <br><br>
                    <?= strtoupper( $rs_umum_pra['KD_PERAWAT']); ?>

                </td> 
                <td align='center'>
                
                </td>
            </tr>
            <tr>
                 <td align='center'>
                 
                </td>
                <td align='center'>
                   --------------------------
                </td>
            </tr>
        </tbody>
 </table>
    <br>
  
</page> 
 