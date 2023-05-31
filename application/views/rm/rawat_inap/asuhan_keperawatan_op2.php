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
             <b> ASUHAN KEPEWATAN PERI OPERATIF </b>
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
             <tr> <td>Tanggal Operasi </td><td style="padding-right:70px">: <?=  date("d-m-Y", strtotime($rs_asuhan['TGL'])); ?> </td><td> Operator </td><td>: <?= strip_tags($rs_asuhan['NAMALENGKAP']); ?></td></tr>
             <tr> <td>Jam Operasi  </td><td>: <?=  date("H:i", strtotime($rs_asuhan['JAM_MULAI'])); ?> - <?=  date("H:i", strtotime($rs_asuhan['JAM_SELESAI'])); ?> </td><td> Perawat Instrumen </td><td>: <?= strip_tags($rs_asuhan['KD_PERAWAT_INS']); ?></td></tr>
             <tr> <td> Sifat Operasi  </td><td style="padding-right:70px">:<?= strip_tags($rs_asuhan['SIFAT_OP']); ?> </td><td> Dokter Anestesi </td><td>:<?= strip_tags($rs_asuhan['KD_AHLI_ANESTESI']); ?></td></tr>
             <tr> <td> Jenis Anestesi  </td><td>:<?= strip_tags($rs_asuhan['JENIS_ANES']); ?> </td><td> Perawat Anestesi </td><td>: <?= strip_tags($rs_asuhan['KD_PERAWAT_ANES']); ?></td></tr>
             <tr> <td> Diagnosa  </td><td>:<?= strip_tags($rs_asuhan['DIAGNOSA_PRA']); ?> </td><td> Perawat Sirkuler </td><td>: <?= strip_tags($rs_asuhan['KD_PERAWAT_SERK']); ?></td></tr>
             <tr> <td> Tindakan  </td><td>:<?= strip_tags($rs_asuhan['TINDAKAN_OP']); ?> </td><td></td><td></td> </tr>

            </table>
                </td>
            <br>
            </tr>
           
            <tr><td style="border-left:solid 1px ;border-right:solid 1 px #000000; border-bottom:solid 1px #000000;""></td></tr>
            <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">
            <B> PENGKAJIAN PRE OPERASI </B>
            <BR>
             <Table>
             <tr><td> Kesadaran </td><td> : <?= $rs_asuhan['KESADARAN'];?></td></tr>
             <tr><td> Status Psikologi </td><td> : <?= $rs_asuhan['STATUS_PSIKOLOGI'];?></td></tr>
             <tr><td> Tanda Tanda Vital </td> <td> TD : <?= $rs_asuhan['TD'];?> | ND : <?= $rs_asuhan['ND'];?> | SH : <?= $rs_asuhan['SH'];?> | P : <?= $rs_asuhan['P'];?> </td></tr>
             <tr><td> Puasa  </td><td> : <?= $rs_asuhan['PUASA'];?></td></tr>
            <tr><td> Kulit  </td><td> : <?= $rs_asuhan['KULIT'];?></td></tr>
            <tr><td> Evaluasi  </td><td> : <?= $rs_asuhan['EVALUASI'];?></td></tr>

              </Table>
            </td>
            <br>
            </tr>


            <tr><td style="border-left:solid 1px ;border-right:solid 1 px #000000; border-bottom:solid 1px #000000;""></td></tr>
            <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">
            <B> PENGKAJIAN INTRA OPERASI </B>
            <BR>
             <Table>
             <tr><td> Tanda Tanda Vital </td> <td> TD : <?= $rs_asuhan['TD2'];?> | ND : <?= $rs_asuhan['ND2'];?> | SH : <?= $rs_asuhan['SH2'];?> | P : <?= $rs_asuhan['P2'];?> | SPO2 : <?= $rs_asuhan['SP02'];?> </td></tr>
             <tr><td> Evaluasi  </td><td> : <?= $rs_asuhan['EVALUASI2'];?></td></tr>
            
              </Table>
            </td>
            <br>
            </tr>


            <tr><td style="border-left:solid 1px ;border-right:solid 1 px #000000; border-bottom:solid 1px #000000;""></td></tr>
            <tr>
            <td style="border-left:solid 1px ;border-right:solid 1 px #000000;  border-top:solid 1px #000000;">
            <B> PENGKAJIAN POST OPERASI </B>
            <BR>
             <Table>
             <tr><td> Tanda Tanda Vital </td> <td> TD : <?= $rs_asuhan['TD3'];?> | ND : <?= $rs_asuhan['ND3'];?> | SH : <?= $rs_asuhan['SH3'];?> | P : <?= $rs_asuhan['P3'];?> | SPO2 : <?= $rs_asuhan['SP023'];?> </td></tr>
             <tr><td> Kulit Turgor  </td><td> : <?= $rs_asuhan['TURGOR'];?></td></tr>
             <tr><td> Terpasang Implant di  </td><td> : <?= $rs_asuhan['IMPLANT'];?></td></tr>
             <tr><td> Infus Masuk  </td><td> : <?= $rs_asuhan['INFUS_MASUK'];?></td></tr>
             <tr><td> Darah Masuk  </td><td> : <?= $rs_asuhan['DARAH_MASUK'];?></td></tr>
             <tr><td> Pendarahan </td><td> : <?= $rs_asuhan['PENDARAHAN'];?></td></tr>
             <tr><td> Urine </td><td> : <?= $rs_asuhan['URINE'];?></td></tr>
             <tr><td> Asites </td><td> : <?= $rs_asuhan['ASITES'];?></td></tr>
             <tr><td> Pus </td><td> : <?= $rs_asuhan['PUS'];?></td></tr>
             <tr><td> Evaluasi  </td><td> : <?= $rs_asuhan['EVALUASI3'];?></td></tr>
            
              </Table>
            </td>
            <br>
            </tr>
            

            <tr><td style="border-left:solid 1px ;border-right:solid 1 px #000000; border-bottom:solid 1px #000000;"></td></tr>
        </tbody>
    </table>

 
<BR> 
<BR>  
    <br>
  
</page> 
 