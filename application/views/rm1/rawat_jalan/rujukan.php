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
        <col style="width: 100%;padding-top: 30px;font-size: 12px;">
        <tr>
            <td align="center">
                <br><strong><u>SURAT RUJUKAN</u></strong>
            </td>
        </tr>
        </tbody>
    </table>
    <br>
    <table class="content">
        <col style="width: 30%;font-size: 10px;">
        <col style="width: 70%;font-size: 10px;">
        <tbody>
            <tr>
                <td style="font-weight: bold;">Yth,</td>
                <td></td>
            </tr>
            <tr>
                <td style="font-weight: bold;"></td>
                <td></td>
            </tr>
            <tr>
                <td style="font-weight: bold;" colspan="2">
                     <?php
               $rjk=$rs_rujukan['FS_TUJUAN_RUJUKAN'];
               $cekk=is_numeric($rjk);
               if($cekk==true){
                     $dokterr=$this->db->query("SELECT Nama_Dokter from DOKTER WHERE Kode_Dokter='$rjk' ")->row_array();
                     echo $dokterr['Nama_Dokter'];}
                     else{
                         echo $rs_rujukan['FS_TUJUAN_RUJUKAN'];
                     }
                ?>
                   </td>
                
            </tr>
            <tr>
                <td style="font-weight: bold;">
                   
                   </td>
                <td></td>
            </tr>
            <tr>
                <td style="font-weight: bold;">
                    di <?= $rs_rujukan['FS_TUJUAN_RUJUKAN2']; ?>
                   </td>
                <td></td>
            </tr>
            
            <tr>
                <td colspan="2"><br>Assalamu'alaikum Wr. Wb.</td>
            </tr>
            <tr>
                <td colspan="2">Dengan hormat, bersama ini kami kirimkan pasien :</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>
                    : <?= $rs_pasien['NAMA_PASIEN']; ?>
                </td>
                
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>
                    : <?= $rs_pasien['TGL_LAHIR']; ?>
                </td>
                
            </tr>
            <tr>
                <td>Alamat</td>
                <td>
                    : <?= $rs_pasien['ALAMAT']; ?>
                </td>
                
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    : <?php if($rs_pasien['JENIS_KELAMIN'] == 'L'){
                        echo "Laki-laki";
                    }else{
                        echo "Perempuan";
                    } ?>
                </td>
            </tr>
            <tr>
                <td>Diagnosa</td>
                <td>
                    : <?= strip_tags($result['FS_DIAGNOSA']); ?>
                </td>
                
            </tr>
            <tr>
                <td>Terapi</td>
                <td>:<?= strip_tags($result['FS_TERAPI']); ?>
                </td>
                
            </tr>
            <tr>
                <td>Alasan dirujuk</td>
                <td>
                    : <?= $rs_rujukan['FS_ALASAN_RUJUK']; ?>
                </td>
                
            </tr>
            <tr>
                <td colspan="2">Demikian harap menjadi maklum adanya dan terimakasih atas perhatian teman sejawat.<br></td>
                
            </tr>
            <tr>
                <td colspan="2"><br>Wassalamu'alaikum Wr. Wb<br></td>
                
            </tr>
        </tbody>
    </table>
 <table class="content">
        <col style="width: 50%;font-size: 10px;">
        <col style="width: 50%;font-size: 10px;">
        <tbody>
           
            <tr>
                 <br>
                 <br>
                <td></td>
                <td align='center'><?= $alamat['pref_value'];?>, <?= $result['mdd']; ?></td>
            </tr>
            <tr>
                 
                <td></td>
                <td align='center'>Sejawat,</td>
            </tr>
            <tr>
                <td></td>
                <td align='center'>
                    <barcode type="C39" value="<?= $result['KODE_DOKTER'];?>" style="width:40mm; height:10mm; font-size: 1mm"></barcode>
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