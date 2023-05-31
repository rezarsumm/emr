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
    <!--<page_header>
        <table class="page_header">
            <tr>
                <td style="width:10%;border-bottom:solid 1px #000000;" >
                    <img src="<?php base_url() ?>resource/doc/images/icon/logo.png" width="70" height="70" />
                </td>
                <td style="width:90%;text-align: center;border-bottom:solid 1px #000000;">
                    <h5>RS PKU MUHAMMADIYAH GAMPING <br>
                    Jl. Wates KM. 5.5, Gamping, Sleman 555294</h5>
                </td>
            </tr>
        </table>
    </page_header>-->
    <br><br><br><br><br><br><br><br>
    <table class="content">
        <tbody>
        <col style="width: 100%;padding: 0px;font-size: 18px;">
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
                <td style="font-weight: bold;"><?php
                    if(empty($rs_prb['FS_PROVIDER'])){
                        echo "______________";
                    }else{
                        echo $rs_prb['FS_PROVIDER'];
                    }?></td>
                <td></td>
            </tr>
            
            <tr>
                <td colspan="2"><br><br>Terimakasih atas kepercayaan sejawat dokter yang telah merujuk pasien kepada kami atas nama :</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>
                    : <?= $rs_pasien['FS_NM_PASIEN']; ?>
                </td>
                
            </tr>
            <tr>
                <td>Tempat, Tanggal Lahir</td>
                <td>
                    : <?= $rs_pasien['FS_TEMP_LAHIR']; ?>, <?= $rs_pasien['FD_TGL_LAHIR']; ?>
                </td>
                
            </tr>
            <tr>
                <td>Alamat</td>
                <td>
                    : <?= $rs_pasien['FS_ALM_PASIEN']; ?>
                </td>
                
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    : <?php if($rs_pasien['FS_JNS_KELAMIN'] == '0'){
                        echo "Laki-laki";
                    }else{
                        echo "Perempuan";
                    } ?>
                </td>
            </tr>
            <tr>
                <td>Tanggal Dirujuk</td>
                <td>
                    : <?= $rs_prb['FD_TGL_RUJUKAN'];?>
                </td>
                
            </tr>
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
                <td>:<?php foreach ($rs_resep as $terapi) { ?>
                    <?=$terapi['FS_NM_BARANG']; ?>
                    <?php if ($terapi['FS_ETIKET'] == 'ADA') { ?>

                            <?= $terapi['FS_ETIKET_QTY']; ?>x sehari <?= $terapi['FS_ETIKET_HARI']; ?> <?= $terapi['FS_NM_SATUANPAKAI_ETIKET']; ?> <?= $terapi['FS_NM_CARAPAKAI_ETIKET']; ?> <?= $terapi['FS_ETIKET_CATATAN']; ?>
                        <?php } else { ?>
                        <?php } ?>
            <?php } ?>
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
                <td align='center'>Sleman, <?= $result['mdd']; ?></td>
            </tr>
            <tr>
                <td></td>
                <td align='center'>
                    <barcode type="C39" value="<?= $result['FS_KD_MEDIS'];?>" style="width:40mm; height:10mm; font-size: 1mm"></barcode>
                    <br>
                </td>
            </tr>
            <tr>
                <td></td>
                <td align='center'>
                    <?= $result['FS_NM_PEG']; ?>
                </td>
            </tr>
        </tbody>
 </table>
</page>