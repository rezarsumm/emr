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
    <table class="content">
        <tbody>
        <col style="width: 100%;padding: 0px;font-size: 18px;">
        <tr>
            <td align="center">
                <br><strong><u>SURAT RUJUKAN</u></strong>
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
                <td style="font-weight: bold;" colspan="2">
                   <?= $rs_rujukan['FS_TUJUAN_RUJUKAN']; ?>
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
                <td>Program PRB</td>
                <td>
                    : PRB ke PPK1
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
        <col style="width: 50%;font-size: 16px;">
        <col style="width: 50%;font-size: 16px;">
        <tbody>
           
            <tr>
                 <br>
                 <br>
                <td></td>
                <td align='center'><?= $alamat['pref_value'];?>, <?= date('d-m-Y',  strtotime($result['mdd'])); ?></td>
            </tr>
            <tr>
                 
                <td></td>
                <td align='center'>Sejawat,</td>
            </tr>
            <tr>
                <td></td>
                <td align='center'>
                    <qrcode value="<?= $result['FS_NM_PEG']; ?> pada <?= $result['mdd']; ?>" ec="H" style="width: 15mm; background-color: white; color: black;"></qrcode>
                    
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