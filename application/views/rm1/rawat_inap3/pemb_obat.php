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
<page orientation="landscape" backtop="27mm" backbottom="10mm" backleft="2mm" backright="2mm" style="font-size:10pt">
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
                
           

             <table style="float:; padding-left: 80px"> 
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
                    Nama : <?php echo $rs_pasien['NAMA_PASIEN']; ?><br>
                    No MR : <?php echo $rs_pasien['NO_MR']; ?><br>
                    Tgl Lahir : <?php echo date('d-M-Y', strtotime($rs_pasien['TGL_LAHIR'])); ?>
                    <hr>
                    Tgl Masuk Rawat Inap : <?php echo date('d-m-Y', strtotime($rs_pasien['TANGGAL'])); ?> / <?= date('H:i:s', strtotime($rs_pasien['JAM']));?>
                </td>
            </tr>
        </table>

    </page_header>
               <hr style="margin-top:0px">

    <page_footer>
        <table style="width: 100%; border-top: solid 1px black;">
            <tr>
                <td style="text-align: left; width: 80%">&nbsp;</td>
                <td style="text-align: right; width: 20%">Halaman [[page_cu]]/[[page_nb]]</td>
            </tr>
        </table>
    </page_footer>
    <table class="content">
        <tbody>
        <col style="width: 100%;background-color: #000000;color: #ffffff;padding: 0px;font-size: 16px;">
        <tr>
            <td align="center">
                <br><strong>CATATAN PEMBERIAN OBAT</strong>
            </td>
        </tr>
        </tbody>
    </table>
    <?php foreach ($rs_rm17all as $data) { ?>
        <table class="content">
            <col style="width: 100%;font-size: 12px;">
            <tbody>
                <tr>
                    <td>Nama Obat :  <?= $data['FS_NAMA_OBAT']; ?></td>
                </tr>
            </tbody>
        </table>
        <table class="content">
            <col style="width: 11%;font-size: 8px;">
            <col style="width: 11%;font-size: 8px;">
            <col style="width: 11%;font-size: 8px;">
            <col style="width: 11%;font-size: 8px;">
            <col style="width: 11%;font-size: 8px;">
            <col style="width: 4%;font-size: 8px;">
            <col style="width: 4%;font-size: 8px;">
            <col style="width: 4%;font-size: 8px;">
            <col style="width: 4%;font-size: 8px;">
            <col style="width: 7%;font-size: 8px;">
            <col style="width: 11%;font-size: 8px;">
            <col style="width: 11%;font-size: 8px;">
            <col style="width: 11%;font-size: 8px;">
            <tbody>
                <tr>
                    <td style="font-weight: bold;border-left:solid 1px #000000;border-right:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;;text-align:center;">
                        Tanggal Pemberian
                    </td>
                   
                    <td style="font-weight: bold;border-right:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;;text-align:center;">
                        Dosis  
                    </td>
                    <td style="font-weight: bold;border-right:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;;text-align:center;">
                        Rute 

                    </td>
                    <td style="font-weight: bold;border-right:solid 1px #000000;border-bottom:solid 1px #000000;border-top:solid 1px #000000;;text-align:center;">
                        Interval 
                    </td>
                    <td style="font-weight: bold;border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">Obat</td>
                    <td style="font-weight: bold;border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">Dosis</td>
                    <td style="font-weight: bold;border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">Pasien</td>
                    <td style="font-weight: bold;border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">Rute</td>
                    <td style="font-weight: bold;border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">Waktu</td>
                    <td style="font-weight: bold;border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">Perawat I</td>
                    <td style="font-weight: bold;border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">Perawat II</td>
                    <td style="font-weight: bold;border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">Farmasi</td>
                </tr>
                <?php
                $data['rs_rm17det'] = $this->m_rm17->get_rm17det_by_rg_all(array($data['FS_KD_RM17']));
                foreach ($data['rs_rm17det'] as $data2) {
                    ?>
                    <tr>
                        <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">
                                <?= date('d-m-Y', strtotime($data2['mdd'])); ?>
                                    
                        </td>
                        <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">
                            <?= $data2['FS_DOSIS_OBAT']; ?>
                        </td>
                        <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">
                                <?php if ($data2['FS_RUTE'] == '1') { ?>
                                    AC
                                <?php } elseif ($data2['FS_RUTE'] == '2') { ?>
                                    DC
                                <?php } elseif ($data2['FS_RUTE'] == '3') { ?>
                                    PC
                                <?php } elseif ($data2['FS_RUTE'] == '4') { ?>
                                    IV
                                <?php } elseif ($data2['FS_RUTE'] == '5') { ?>
                                    IM
                                <?php } elseif ($data2['FS_RUTE'] == '6') { ?>
                                    SC
                                <?php } else { ?>
                                    -
                                <?php } ?>
                        </td>
                        <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">
                           <?= $data2['FS_INTERVAL']; ?>
                        </td>
                        <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">
                            <?= $data2['FS_CHK_OBAT']; ?>
                        </td>
                        <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">
                            <?= $data2['FS_CHK_DOSIS']; ?>
                                
                        </td>
                        <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">
                            <?= $data2['FS_CHK_PASIEN']; ?>
                               
                        </td>
                        <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">
                            <?php if ($data2['FS_CHK_RUTE'] == '1') { ?>
                                v
                            <?php } else { ?>
                                x
                            <?php } ?>
                        </td>
                        <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">
                            <?= $data2['FD_WAKTU']; ?>
                        </td>
                        <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">
                <qrcode value="<?= $data2['NAMALENGKAP']; ?>" ec="H" style="width: 8mm; background-color: white; color: black;"></qrcode>
                <br>
                            <?= $data2['NAMALENGKAP'];?>    
            </td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">
                <qrcode value="<?= $data2['FS_NM_PEG2']; ?>" ec="H" style="width: 8mm; background-color: white; color: black;"></qrcode>
        <br>
                            <?= $data2['FS_NM_PEG2'];?>           
        </td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align:center;border-top:solid 1px #000000;">
                <qrcode value="<?= $data2['FS_NM_PEG3']; ?>" ec="H" style="width: 8mm; background-color: white; color: black;"></qrcode>
        <br>
                            <?= $data2['FS_NM_PEG3'];?>           
        </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } ?>
</page>