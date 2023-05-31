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
<page orientation="P" backtop="15mm" backbottom="10mm" backleft="20mm" backright="5mm">
    <page_header>
    <table class="page_header">
        <tr>
            <td style="width:10%;border-bottom:solid 1px #000000; float: left" >
                <img src="<?php base_url() ?>resource/doc/images/icon/logo.png" width="70" height="70" />
            </td>
          
            <td style="width:75%;text-align: center;border-bottom:solid 1px #000000;">
                <h4>MAJELIS PEMBINA KESEHATAN UMUM
                <br>RSU MUHAMMADIYAH METRO</h4>
                
           

             <table style="float:center; padding-left: 150px"> 
                <tr> 
                    <td style="text-align: left; font-size: 10px"> Jl Soekarno Hatta No. 42 Mulyojati 16 B</td>
                    <td style="text-align: left; font-size: 10px" > Fax : (0725) 47760 </td>
                </tr>
                <tr> 
                    <td style="text-align: left; font-size: 10px" > Metro Barat - Kota Metro 34125 </td>
                    <td style="text-align: left; font-size: 10px" > e-mail : info.rsumm@gmail.com </td>
                </tr>
                <tr> 
                    <td style="text-align: left; font-size: 10px"> Telp : (0725) 49490 - 7850378</td>
                    <td style="text-align: left; font-size: 10px"> website : www.rsumm.co.id </td>

                </tr>
               
            </table>
        </td>
          <td style="width:15%;border-bottom:solid 1px #000000; float:right" >
                <img src="<?php base_url() ?>resource/doc/images/icon/kars.png" width="80" height="80" />
            </td>

          
        </tr>
    </table>

    </page_header>
    <table class="content">
        <tbody>
        <col style="width: 100%;padding-top: 90px;font-size: 18px;">
        <tr>
            <td align="center">
                <br>
                <br>
                <br><strong><u>SURAT BALASAN RUJUKAN</u></strong><br>
                NO <?= $rs_pasien['FS_KD_TRS']; ?>/PRB/<?= date('m');?>/<?= date('Y');?>
            </td>
        </tr>
        </tbody>
    </table>
    <br>
    <table class="content">
        <col style="width: 30%;font-size: 16px;">
        <col style="width: 70%;font-size: 16px;">
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
                <td style="font-weight: bold;">
                  <!--   <?php
                    if(empty($rs_prb['FS_PROVIDER'])){
                        echo "______________";
                    }else{
                        echo $rs_prb['FS_PROVIDER'];
                    }?> -->
                        
                    </td>
                <td></td>
            </tr>
            
            <tr>
                <td colspan="2"><br><br>Terimakasih atas kepercayaan sejawat dokter yang telah merujuk pasien kepada kami atas nama :</td>
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
        <!--     <tr>
                <td>Tanggal kontrol Ke RS setelah dari FKTP</td>
                
                <td>
                    :<?=  $dayList[date('D', strtotime($rs_prb['FS_TGL_PRB']))].','.date('d M Y', strtotime($rs_prb['FS_TGL_PRB'])); ?>
                </td>
                
            </tr> -->
            <tr>
                <td colspan="2"><br><br>Berikut kami sampaikan kesimpulan selama dalam perawatan kami :</td>
            </tr>
            <tr>
                <td>Diagnosa</td>
                <td>
                    : <?= strip_tags($result['FS_DIAGNOSA']); ?>
                </td>
                
            </tr>
            <tr>
                <td>Terapi</td>
                            <td> : <table style="width: 100%;" class="content">
                    <tbody>
                        <col style="width: 100%;">
                        <tr>
                            
                            <td style="width: 100%;"><?= $medis['FS_TERAPI']; ?></td>
                        </tr>
                    </tbody>
                </table>
                </td>
                
            </tr>
            <tr>
                <td colspan="2"><br><br>Demikian hal ini kami sampaikan untuk dapat dipergunakan sebagaimana perlu, Terimakasih.<br><br></td>
                
            </tr>
        </tbody>
    </table>
 <table class="content">
        <col style="width: 50%;font-size: 16px;">
        <col style="width: 50%;font-size: 16px;">
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