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
            <tr>
                <td style="width:10%;">
                    <img src="<?php base_url() ?>resource/doc/images/icon/logo.png" width="70" height="70" />
                </td>
                <td style="width:60%;text-align: left;">
                    <h3>RS PKU MUHAMMADIYAH GAMPING</h3>
                    <h5>Jl. Wates KM. 5.5, Gamping, Sleman 555294</h5>
                </td>
                <td style="width:30%;" valign="top">
                </td>
            </tr>
        </table>
    </page_header>
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
        <col style="width: 100%;padding: 0px;font-size: 14px;">
        <tr>
            <td align="center">
                <br><strong>PROFIL INDIKATOR MUTU</strong>
            </td>
        </tr>
        </tbody>
    </table>
    <br>
    <table class="content">
        <col style="width: 30%;font-size: 12px;border-top:solid 1px #000000;">
        <col style="width: 70%;font-size: 12px;border-top:solid 1px #000000;">
        <tbody>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;">
                    <strong>Nama Indikator : </strong>
                </td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;">
                    <?= $result['indicator_element']; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;">
                    <strong>Unit : </strong>
                </td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;">
                    <?php
                    $data['rs_unit'] = $this->m_daftar->list_unit_mutu_by_id(array($result['indicator_id']));
                    foreach ($data['rs_unit'] as $data2) {
                        ?>
                        <?= $data2['department_name']; ?>,
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;">
                    <strong>Penangung Jawab : </strong>
                </td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;">
                    <?php
                    $data['rs_pj'] = $this->m_daftar->list_pj_mutu_by_id(array($result['indicator_id']));
                    foreach ($data['rs_pj'] as $data2) {
                        $data['rs_peg'] = $this->m_daftar->list_pj_mutu_by_peg(array($data2['group_department_id']));
                        foreach ($data['rs_peg'] as $data3) {
                        ?>
                        <?= $data3['FS_NM_PEG']; ?>,
                        <?php } ?>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;">
                    <strong>Definisi Operasional : </strong>
                </td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;">
<?= $result['indicator_definition']; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;">
                    <strong>Kriteria Inklusi : </strong>
                </td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;">
<?= $result['indicator_criteria_inclusive']; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;">
                    <strong>Kriteria Eksklusi : </strong>
                </td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;">
<?= $result['indicator_criteria_exclusive']; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;">
                    <strong>Sumber Data : </strong>
                </td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;">    
<?= $result['indicator_source_of_data']; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;">
                    <strong>Tipe Indikator : </strong>
                </td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;">    
                    <?php
                    if ($result['indicator_type'] == "Input") {
                        echo "Input";
                    } elseif ($result['indicator_type'] == "Proses") {
                        echo "Proses";
                    } elseif ($result['indicator_type'] == "Outcome") {
                        echo"Outcome";
                    } elseif ($result['indicator_type'] == "Proses-outcome") {
                        echo"Proses & Outcome";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;">
                    <strong>Area Monitoring : </strong>
                </td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;">    
<?= $result['indicator_monitoring_area']; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;">
                    <strong>Frekwensi Pengumpulan Data : </strong>
                </td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;">    
                    <?php
                    if ($result['indicator_frequency'] == "T") {
                        echo "Tahunan";
                    } elseif ($result['indicator_frequency'] == "B") {
                        echo "Bulanan";
                    } elseif ($result['indicator_frequency'] == "M") {
                        echo"Mingguan";
                    } elseif ($result['indicator_frequency'] == "H") {
                        echo"Harian";
                    }
                    ?>

                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;">
                    <strong>Dasar Pemikiran : </strong>
                </td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;">    
<?= $result['fs_dasar_pemikiran']; ?>
                </td>
            </tr>

            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;">
                    <strong>Numerator : </strong>
                </td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;">    
<?= $rs_numerator['variable_name']; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;">
                    <strong>Denominator : </strong>
                </td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;">    
<?= $rs_denumerator['variable_name']; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;">
                    <strong>Formula : </strong>
                </td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;">    
<?= $result['fs_formula']; ?></td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;">
                    <strong>Metodologi Pengumpulan Data : </strong>
                </td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;">    
                    <?php
                    if ($result['fs_metodologi'] == "C") {
                        echo "Concurrent (Pengamatan Langsung)";
                    } elseif ($result['fs_metodologi'] == "R") {
                        echo "Retrospective (Berdasarkan Data)";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;">
                    <strong>Metodologi Analisa : </strong>
                </td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;">
                    <?php
                    $data['rs_analisa'] = $this->m_daftar->list_analisa_mutu_by_id(array($result['indicator_id']));
                    foreach ($data['rs_analisa'] as $data2) {
                        ?>
                        <?php 
                        
                        if($data2['group_department_id']=='1'){
                            echo "Membandingkan dari waktu ke waktu";
                        }elseif($data2['group_department_id']=='2'){
                            echo "Membandingkan dari standar";
                        }elseif($data2['group_department_id']=='3'){
                            echo "Membandingkan dengan Rumah Sakit Lain";
                        }elseif($data2['group_department_id']=='4'){
                            echo "Membandingkan dari praktek yang lebih baik";
                        }
                                
                                ; ?>,
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;">
                    <strong>Waktu Pelaporan / Analisis : </strong>
                </td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;">    
                    <?php
                    if ($result['fs_waktu_pelaporan'] == "B") {
                        echo "Bulanan";
                    } elseif ($result['fs_waktu_pelaporan'] == "T") {
                        echo "Triwulan";
                    } elseif ($result['fs_waktu_pelaporan'] == "S") {
                        echo "Semester";
                    } elseif ($result['fs_waktu_pelaporan'] == "TH") {
                        echo "Tahunan";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;">
                    <strong>Nilai Standar : </strong>
                </td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;">    
<?= $result['indicator_value_standard']; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;">
                    <strong>Target Kinerja : </strong>
                </td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;">    
<?= $result['indicator_target']; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;">
                    <strong>Cakupan Data : </strong>
                </td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;">    
<?= $result['fs_jumlah_sample']; ?>
                </td>
            </tr>
            <tr>
                <td style="border-left:solid 1px #000000;border-bottom:solid 1px #000000;">
                    <strong>Komunikasi Hasil : </strong>
                </td>
                <td style="border-right:solid 1px #000000;border-bottom:solid 1px #000000;">    
<?= $result['fs_komunikasi_hasil']; ?>
                </td>
            </tr>
        </tbody>
    </table>
</page>