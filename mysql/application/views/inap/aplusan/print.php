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
<page backtop="27mm" backbottom="10mm" backleft="2mm" backright="2mm" style="font-size:10pt">
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
                <h3><?= $header1['pref_value'];?></h3>
                <h5><?= $header2['pref_value'];?></h5>
            </td>
            <td valign="top">
            </td>
        </tr>
    </table>
    </page_header>
    <table class="content">
        <tbody>
            <col style="width: 100%;background-color: #000000;color: #ffffff;padding: 0px;font-size: 12px;">
            <tr>
                <td align="center">
                    <br><strong>Operan Jaga</strong>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="content">
        <col style="width: 10%;font-size: 12px;">
        <col style="width: 10%;font-size: 12px;">
        <col style="width: 15%;font-size: 12px;">
        <col style="width: 15%;font-size: 12px;">
        <col style="width: 25%;font-size: 12px;">
        <col style="width: 25%;font-size: 12px;">
        <tbody>
            <tr>
                <th style="border-left:solid 1px #000000;border-bottom:solid 1px #000000; border-right:solid 1px #000000;text-align: center;">Tanggal</th>
                <th style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align: center;" >Shift</th>
                <th style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align: center;">Nama</th>
                <th style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align: center;">Bed</th>
                <th style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align: center;">Kondisi Pasien</th>
                <th style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;text-align: center;">Catatan Lain</th>
            </tr>
            <?php foreach($rs_result as $data){ ?>
                <tr>
                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000; border-right:solid 1px #000000;">
                        <?= date('d-m-Y', strtotime($data['mdd']));?>
                    </td> 

                    <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000; border-right:solid 1px #000000;">
                        <?php if ($data['FS_SHIFT'] == '1'){
                            echo "Pagi";
                        }elseif($data['FS_SHIFT'] == '2'){
                           echo "Siang";
                       }elseif($data['FS_SHIFT'] == '3'){
                           echo "Malam";
                       }
                       ?>
                   </td>
                   <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;" >
                    <?= $data["fs_nm_pasien"];?>
                </td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;" >
                    <?= $data["fs_nm_bed"];?>
                </td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;" >
                    <?= $data["FS_KONDISI_PASIEN"];?>
                </td>
                <td style="border-bottom:solid 1px #000000;border-right:solid 1px #000000;" >
                    <?= $data["FS_CATATAN"];?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</page>