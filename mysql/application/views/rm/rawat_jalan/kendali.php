<!--<style type="text/Css">
    
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
   
</style> -->
<?php date_default_timezone_set('Asia/Jakarta'); ?>
<page format="A4" orientation="P" backtop="10mm" backbottom="2mm" backleft="2mm" backright="2mm">
    <page_header>
        <table class="page_header">
            <tr>
                <td style="width:50%;font-size: 15px;text-align: center;">
                    <div>KARTU KENDALI PELAYANAN RAWAT JALAN</div>
                </td>
            </tr>
        </table>
    </page_header>
    <table class="content">
        <col style="width: 25%;font-size: 12px;">
        <col style="width: 15%;font-size: 12px;">
        <col style="width: 60%;font-size: 12px;">
        <tbody>
            <tr>
                <td></td>
                <td><b><?= $result['fs_kd_reg']; ?></b></td>
                <td></td>
                
            </tr>
            <tr>
                <td></td>
                <td>Tanggal</td>
                <td>
                    : <?=date('d-m-Y', strtotime($result['fd_tgl_masuk']));?>
                </td>
                
            </tr>
            <tr>
                <td></td>
                <td>No MR / Tanggal Lahir</td>
                <td>
                    : <?= $result['MR']; ?> , <?=date('d-m-Y', strtotime($result['FD_TGL_LAHIR']));?>
                </td>
                
            </tr>
            <tr>
                <td></td>
                <td>Jaminan</td>
                <td>
                    : <?= $result['fs_nm_jaminan']; ?>
                </td>
                
            </tr>
            <tr>
                <td></td>
                <td>Nama</td>
                <td>
                    : <?= $result['fs_nm_pasien']; ?>
                </td>
                
            </tr>
            <tr>
                <td></td>
                <td>Alamat</td>
                <td>
                    : <?= $result['fs_alm_pasien']; ?>
                </td>
                
            </tr>
            <tr>
                <td></td>
                <td>Dokter</td>
                <td>
                    : <?= $result['FS_NM_PEG']; ?>
                </td>
                
            </tr>
            <tr>
                <td></td>
                <td>Antrian</td>
                <td>
                    : <?= $result['FN_NO_URUT']; ?>
                </td>
                
            </tr>
        </tbody>
    </table>
    <table class="content">
        <col style="width: 27%;font-size: 12px;">
        <col style="width: 15%;font-size: 12px;">
        <col style="width: 14%;font-size: 12px;">
        <col style="width: 15%;font-size: 12px;">
        <col style="width: 27%;font-size: 12px;">
        <tbody>
            <tr>
                <td style="border-right: 1px black solid;"></td>
                <td style="border: 1px black solid;text-align: center;">LAYANAN <br><br></td>
                <td style="border: 1px black solid;text-align: center;">BIAYA <br><br></td>
                <td style="border: 1px black solid;text-align: center;">PARAF <br><br></td>
                <td></td>
                
            </tr>
            <tr>
                <td style="border-right: 1px black solid;"></td>
                <td style="border: 1px black solid;">POLI<br><br></td>
                <td style="border: 1px black solid;"></td>
                <td style="border: 1px black solid;"></td>
                <td></td>
            </tr>
            <tr>
                <td style="border-right: 1px black solid;"></td>
                <td style="border: 1px black solid;">IGD<br><br></td>
                <td style="border: 1px black solid;"></td>
                <td style="border: 1px black solid;"></td>
                <td></td>
            </tr>
            <tr>
                <td style="border-right: 1px black solid;"></td>
                <td style="border: 1px black solid;">LABORAT<br><br></td>
                <td style="border: 1px black solid;"></td>
                <td style="border: 1px black solid;"></td>
                <td></td>
            </tr>
            <tr>
                <td style="border-right: 1px black solid;"></td>
                <td style="border: 1px black solid;">RADIOLOGI<br><br></td>
                <td style="border: 1px black solid;"></td>
                <td style="border: 1px black solid;"></td>
                <td></td>
            </tr>
            <tr>
                <td style="border-right: 1px black solid;"></td>
                <td style="border: 1px black solid;">FARMASI<br><br></td>
                <td style="border: 1px black solid;"></td>
                <td style="border: 1px black solid;"></td>
                <td></td>
            </tr>
            <tr>
                <td style="border-right: 1px black solid;"></td>
                <td style="border: 1px black solid;">LAIN-LAIN<br><br></td>
                <td style="border: 1px black solid;"></td>
                <td style="border: 1px black solid;"></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</page>