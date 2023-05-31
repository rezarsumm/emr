<?php /* Smarty version Smarty-3.0.7, created on 2021-03-15 16:18:42
         compiled from "application/views\inap/ass_awal/add.html" */ ?>
<?php /*%%SmartyHeaderCode:17772604f2672243f67-65846663%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26a6e27cae72648b0edfd2ad1ac44647cf72758c' => 
    array (
      0 => 'application/views\\inap/ass_awal/add.html',
      1 => 1608812796,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17772604f2672243f67-65846663',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\xampp\htdocs\emr_lampung\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><!-- include javascript -->
<?php $_template = new Smarty_Internal_Template("inap/ass_awal/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of include javascript-->
<div class="breadcrum">
    <p>
        <a href="#">Data Arsip</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_awal/cari');?>
">Asesmen Awal Rawat Inap</a><span></span>
        <small>Add Data</small>
    </p>
    <div class="clear"></div>
</div>
<div class="navigation">
    <div class="navigation-button">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_awal/');?>
"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/back-icon.png" alt="" />  Back</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
<div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_awal/add_process');?>
" method="post">
        <input type="hidden" name="FS_KD_REG" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_reg'];?>
" />
        <input type="hidden" name="FS_KD_MEDIS" value="<?php echo $_smarty_tpl->getVariable('FS_KD_MEDIS')->value;?>
" />
        <input type="hidden" name="FS_KD_LAYANAN" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_layanan'];?>
" />
        <input type="hidden" name="FS_MR" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_mr'];?>
" />

        <table class="table-info" width="100%">
            <tr class="headrow">
                <th colspan="2">Add Asesmen Awal Rawat Inap</th>
            </tr>
            <tr>
                <td>NAMA</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_nm_pasien'];?>

                </td>
            </tr>
            <tr>
                <td>NO MR</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_mr'];?>

                </td>
            </tr>
            <tr>
                <td>TANGGAL LAHIR</td>
                <td>
                    <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('rs_pasien')->value['FD_TGL_LAHIR'],"%d %b %Y");?>
 (<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_umur'];?>
)
                </td>
            </tr>
            <tr>
                <td>ALAMAT</td>
                <td><?php echo $_smarty_tpl->getVariable('rs_pasien')->value['FS_ALM_PASIEN'];?>
</td>
            </tr>
             <tr>
                <td>Status Sosial / Pekerjaan / Pendidikan</td>
            <td>
                <?php echo $_smarty_tpl->getVariable('rs_pasien')->value['FS_NM_PEKERJAAN_DK'];?>
 / <?php echo $_smarty_tpl->getVariable('rs_pasien')->value['FS_NM_PENDIDIKAN_DK'];?>

            </td>
            </tr>
        </table>
        <div class="notification red">
            <p><strong>High Risk :</strong> <?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_HIGH_RISK'])===null||$tmp==='' ? '-' : $tmp);?>
 </p>
            <p><strong>Alergi :</strong> <?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
 (<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_REAK_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
)</p>
            <div class="clear"></div>
        </div>
        <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="2">Anamnesa/Riwayat Masuk Rumah Sakit</th>
                <th colspan="2">Pemeriksaan Fisik</th>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea cols="50" name="FS_ANAMNESA">-</textarea>
                </td>
                <td colspan="2">
                    <textarea cols="50" name="FS_PEMERIKSAAN_FISIK">-</textarea>

                </td>
            </tr>
            <tr class="headrow">
                <th colspan="4">Vital Sign</th>
            </tr>
            <tr>
                <td width='20%'>Suhu</td>
                <td width='30%'><input type="text" name="FS_SUHU" size="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('vs')->value['FS_ANAMNESA'])===null||$tmp==='' ? '-' : $tmp);?>
"/></td>
                <td width='20%'>Nadi</td>
                <td width='30%'><input type="text" name="FS_NADI" size="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('vs')->value['FS_ANAMNESA'])===null||$tmp==='' ? '-' : $tmp);?>
"/> x/menit</td>
            </tr>
            <tr>
                <td>R</td>
                <td><input type="text" name="FS_R" size="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('vs')->value['FS_ANAMNESA'])===null||$tmp==='' ? '-' : $tmp);?>
"/> x/menit</td>
                <td>TD</td>
                <td><input type="text" name="FS_TD" size="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('vs')->value['FS_ANAMNESA'])===null||$tmp==='' ? '-' : $tmp);?>
"/> mmHg</td>
            </tr>
            <tr>
                <td>Tinggi Badan</td>
                <td><input type="text" name="FS_TB" size="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('vs')->value['FS_ANAMNESA'])===null||$tmp==='' ? '-' : $tmp);?>
"/> cm</td>
                <td>Berat Badan</td>
                <td><input type="text" name="FS_BB" size="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('vs')->value['FS_ANAMNESA'])===null||$tmp==='' ? '-' : $tmp);?>
"/> Kg</td>
            </tr>

        </table>
        <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="4">Asesmen Nyeri</th>
            </tr>
            <tr>
                <td width='20%'>Ada Nyeri ?</td>
                <td width='30%'>
                    <select name="FS_NYERI" id="surat_dari" class="select2" style="width: 190px;">
                        <option value="0">Tidak</option>
                        <option value="1">Ya</option>
                    </select>
                </td>
                <td width='20%'></td>
                <td width='30%'></td>
            </tr>
            <tr>
                <td>Provokatif</td>
                <td>
                    <select name="FS_NYERIP" id="surat_dari" class="select2" style="width: 190px;">
                        <option value="0">Tidak Ada Nyeri</option>
                        <option value="1">Biologik</option>
                        <option value="2">Kimiawi</option>
                        <option value="3">Mekanik / Rudapaksa</option>
                    </select>
                </td>
                <td>Quality</td>
                <td>
                    <select name="FS_NYERIQ" id="surat_dari" class="select2" style="width: 190px;">
                        <option value="0">Tidak Ada</option>
                        <option value="1">Seperti Di Tusuk-Tusuk</option>
                        <option value="2">Seperti Terbakar</option>
                        <option value="3">Seperti Tertimpa Beb</option>
                        <option value="4">Ngilu</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Regio</td>
                <td>
                    <input type="text" name="FS_NYERIR" size="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('vs')->value['FS_ANAMNESA'])===null||$tmp==='' ? '-' : $tmp);?>
"/>
                </td>
                <td>Severity</td>
                <td>
                    <select name="FS_NYERIS" id="surat_dari" class="select2" style="width: 190px;">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Time</td>
                <td>
                    <select name="FS_NYERIT" id="surat_dari" class="select2" style="width: 190px;">
                        <option value="0">Tidak Ada</option>
                        <option value="1">Kadang-kadang</option>
                        <option value="2">Sering</option>
                        <option value="3">Menetap</option>
                    </select>
                </td>
                <td></td>
                <td></td>
            </tr>
        </table>
        <table>
            <table class="table-input" width="100%">
                <tr class="headrow">
                    <th colspan="4">Risiko Jatuh</th>
                </tr>
                <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['fn_umur']<'15'){?>
                <tr>
                    <td width='20%'>Humty Dumpty Scale</td>
                    <td width='30%'>
                        <select name="FS_SCORE" id="surat_dari" class="select2" style="width: 190px;">
                            <option value="0">-Pilih Data-</option>
                            <option value="1">7-11 (Risiko Rendah)</option>
                            <option value="2"> >12 (Risiko Tinggi)</option>

                        </select>
                    </td>
                    <td width='20%'></td>
                    <td width='30%'></td>
                </tr>
                <?php }elseif($_smarty_tpl->getVariable('rs_pasien')->value['fn_umur']>='15'&&$_smarty_tpl->getVariable('rs_pasien')->value['fn_umur']<='60'){?>
                <tr>
                    <td width='20%'>Morse Fall Scale</td>
                    <td width='30%'>
                        <select name="FS_SCORE" id="surat_dari" class="select2" style="width: 190px;">
                            <option value="0">-Pilih Data-</option>
                            <option value="3">0-24  (Risiko Rendah)</option>
                            <option value="4">25-45 (Risiko Sedang)</option>
                            <option value="5">>45   (Risiko Tinggi)</option>

                        </select>
                    </td>
                    <td width='20%'></td>
                    <td width='30%'></td>
                </tr>
                <?php }elseif($_smarty_tpl->getVariable('rs_pasien')->value['fn_umur']>'60'){?>
                <tr>
                    <td width='20%'>Ontario modified Stratify - Sydney Scoring</td>
                    <td width='30%'>
                        <select name="FS_SCORE" id="surat_dari" class="select2" style="width: 190px;">
                            <option value="0">-Pilih Data-</option>
                            <option value="6">0-5  (Risiko Rendah)</option>
                            <option value="7">6-16 (Risiko Sedang)</option>
                            <option value="8">17-30   (Risiko Tinggi)</option>

                        </select>
                    </td>
                    <td width='20%'></td>
                    <td width='30%'></td>
                </tr>
                <?php }?>
            </table>
            <table class="table-input" width="100%">
                <tr class="headrow">
                    <th colspan="4">Riwayat Alergi</th>
                </tr>
                <tr>
                    <td width='20%'>Riwayat Alergi</td>
                    <td width='30%'>
                        <input type="text" name="FS_ALERGI" size="35" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
">
                        <em style="color:red">* Wajib Diisi</em>
                    </td>
                    <td width='20%'>Reaksi Alergi</td>
                    <td width='30%'>
                        <input type="text" name="FS_REAK_ALERGI" size="35" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_REAK_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
">
                        <em style="color:red">* Wajib Diisi</em>
                    </td>
                </tr>
            </table>
            <table class="table-input" width="100%">
                <tr class="headrow">
                    <th colspan="4">Riwayat Kesehatan</th>
                </tr>
                <tr>
                    <td width='20%'>Riweayat Penyakit dahulu</td>
                    <td width='30%'>
                        <input type="text" name="FS_RIW_PENYAKIT_DAHULU" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_RIW_PENYAKIT_DAHULU'])===null||$tmp==='' ? '-' : $tmp);?>
" size="32">
                    </td>
                    <td width='20%'>Riwayat penyakit keluarga</td>
                    <td width='30%'>
                        <input type="text" name="FS_RIW_PENYAKIT_DAHULU2" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_RIW_PENYAKIT_DAHULU'])===null||$tmp==='' ? '-' : $tmp);?>
" size="32">

                    </td>
                </tr>
            </table>
            <table class="table-input" width="100%">
                <tr class="headrow">
                    <th colspan="2">Status Psikologis</th>
                    <th colspan="2">Status Sosial</th>
                </tr>
                <tr>
                    <td width='20%'>Status Psikologis</td>
                    <td width='30%'>
                        <select name="FS_STATUS_PSIK">
                            <option value="1" onclick='document.getElementById("civstaton3").disabled = true'>Tenang</option>
                            <option value="2" onclick='document.getElementById("civstaton3").disabled = true'>Cemas</option>
                            <option value="3" onclick='document.getElementById("civstaton3").disabled = true'>Takut</option>
                            <option value="4" onclick='document.getElementById("civstaton3").disabled = true'>Marah</option>
                            <option value="5" onclick='document.getElementById("civstaton3").disabled = true'>Sedih</option>
                            <option VALUE="6" onclick='document.getElementById("civstaton3").disabled = false'>Lainnya</option>
                        </select>
                        <br><br>
                        <input type="text" name="FS_STATUS_PSIK2" id="civstaton3" disabled="" size="32">
                    </td>
                    <td width='20%'>Hubungan dengan anggota keluarga</td>
                    <td width='30%'>
                        <select name="FS_HUB_KELUARGA" id="surat_dari" class="select2" style="width: 190px;">
                            <option value="1">Baik</option>
                            <option value="2">Tidak Baik</option>

                        </select>
                    </td>
                </tr>
            </table>
            <table class="table-input" width="100%">
                <tr class="headrow">
                    <th colspan="4">Kebutuhan Fungsional</th>
                </tr>
                <tr>
                    <td width='20%'>Makan</td>
                    <td width='30%'>
                        <select name="FS_FUNGSIONAL1" id="op1" class="select2" style="width: 190px;">
                            <option value="">--Pilih Data--</option>
                            <option value="0">Tidak Mampu</option>
                            <option value="1">Butuh bantuan</option>
                            <option value="2">Mandiri</option>
                        </select>
                        <span id="sc1"></span>
                    </td>
                    <td width='20%'>Kesimpulan</td>
                    <td width='30%'><b><span id="rjtkesimpulan"></span></b></td>
                </tr>
                <tr>
                    <td>Mandi</td>
                    <td>
                        <select name="FS_FUNGSIONAL2" id="op2" class="select2" style="width: 190px;">
                            <option value="">--Pilih Data--</option>
                            <option value="0">Tergantung orang lain</option>
                            <option value="1">Mandiri</option>
                        </select>
                        <span id="sc2"></span>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Perawatan diri</td>
                    <td>
                        <select name="FS_FUNGSIONAL3" id="op3" class="select2" style="width: 190px;">
                            <option value="">--Pilih Data--</option>
                            <option value="0">Membutuhkan bantuan orang lain</option>
                            <option value="1">Mandiri</option>
                        </select>
                        <span id="sc3"></span>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Berpakaian</td>
                    <td>
                        <select name="FS_FUNGSIONAL4" id="op4" class="select2" style="width: 190px;">
                            <option value="">--Pilih Data--</option>
                            <option value="0">Tergantung orang lain</option>
                            <option value="1">Sebagian dibantu</option>
                            <option value="2">Mandiri</option>
                        </select>
                        <span id="sc4"></span>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Buang air kecil</td>
                    <td>
                        <select name="FS_FUNGSIONAL5" id="op5" class="select2" style="width: 190px;">
                            <option value="">--Pilih Data--</option>
                            <option value="0">Tidak terkontrol atau pakai kateter</option>
                            <option value="1">Kadang inkontensia</option>
                            <option value="2">Kontensia / teratur (lebih dari 7 hari)</option>
                        </select>
                        <span id="sc5"></span>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Buang air besar</td>
                    <td>
                        <select name="FS_FUNGSIONAL6" id="op6" class="select2" style="width: 190px;">
                            <option value="">--Pilih Data--</option>
                            <option value="0">Inkontensia (Tidak teratur atau perlu)</option>
                            <option value="1">Kadang inkontensia (sekali seminggu)</option>
                            <option value="2">Kontensia (teratur)</option>
                        </select>
                        <span id="sc6"></span>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Penggunaan toilet</td>
                    <td>
                        <select name="FS_FUNGSIONAL7" id="op7" class="select2" style="width: 190px;">
                            <option value="">--Pilih Data--</option>
                            <option value="0">Tergantung</option>
                            <option value="1">Membutuhkan bantuan, tapi dapat melakukan beberapa hal sendiri</option>
                            <option value="2">Mandiri</option>
                        </select>
                        <span id="sc7"></span>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Transfer</td>
                    <td>
                        <select name="FS_FUNGSIONAL8" id="op8" class="select2" style="width: 190px;">
                            <option value="">--Pilih Data--</option>
                            <option value="0">Tidak mampu</option>
                            <option value="1">Butuh bantuan untuk bisa duduk (2 Orang)</option>
                            <option value="2">Bantuan kecil (1 orang)</option>
                            <option value="3">Mandiri</option>
                        </select>
                        <span id="sc8"></span>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Mobilitas</td>
                    <td>
                        <select name="FS_FUNGSIONAL9" id="op9" class="select2" style="width: 190px;">
                            <option value="">--Pilih Data--</option>
                            <option value="0">Immobile (tidak mampu)</option>
                            <option value="1">Menggunakan kursi roda</option>
                            <option value="2">Berjalan dengan bantuan satu orang</option>
                            <option value="3">Mandiri (meskipun menggunakan alat bantu seperti tongkat)</option>
                        </select>
                        <span id="sc9"></span>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Naik turun tangga</td>
                    <td>
                        <select name="FS_FUNGSIONAL10" id="op10" class="select2" style="width: 190px;">
                            <option value="">--Pilih Data--</option>
                            <option value="0">Tidak mampu</option>
                            <option value="1">Membutuhkan bantuan (alat bantu)</option>
                            <option value="2">Mandiri</option>
                        </select>
                        <span id="sc10"></span>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <?php if ($_smarty_tpl->getVariable('rs_pasien')->value['fn_umur']<='14'){?>
            <table class="table-input" width="100%">

                <tr class="headrow">
                    <th colspan="4">Skrining Nutrisi Anak <b>Adaptasi Strong Kids (Anak usia 1-14 Tahun)</b></th>
                </tr>
                <tr>
                    <td width='20%'>Apakah pasien tampak kurus?</td>
                    <td width='30%'>
                        <select name="FS_NUTRISI_ANAK1" class="select2" style="width: 190px;" id="sna1">
                            <option value="">--Pilih Data--</option>
                            <option value="0">Tidak</option>
                            <option value="1">Ya</option>

                        </select>
                        <span id="snha1"></span>
                    </td>
                    <td width='20%'>Kesimpulan</td>
                    <td width='30%'><b><span id="kesimpulansna"></span></b></td>
                </tr>
                <tr>
                    <td>Apakah terdapat penurunan BB selama satu bulan terakhir?</td>
                    <td>
                        <select name="FS_NUTRISI_ANAK2" class="select2" style="width: 190px;" id="sna2">
                            <option value="">--Pilih Data--</option>
                            <option value="0">Tidak</option>
                            <option value="1">Ya</option>
                        </select>
                        <span id="snha2"></span>
                    </td>
                    <td></td>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td>Apakah ada diare > 5x/hari atau muntah > 3x/hari atau asupan turun dalam 1 minggu?</td>
                    <td>
                        <select name="FS_NUTRISI_ANAK3" class="select2" style="width: 190px;" id="sna3">
                            <option value="">--Pilih Data--</option>
                            <option value="0">Tidak</option>
                            <option value="1">Ya</option>
                        </select>
                        <span id="snha3"></span>
                    </td>
                    <td></td>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td>Apakah terdapat penyakit atau keadaan yang mengakibatkan pasien beresiko malnutrisi?</td>
                    <td>
                        <select name="FS_NUTRISI_ANAK4" class="select2" style="width: 190px;" id="sna4">
                            <option value="">--Pilih Data--</option>
                            <option value="0">Tidak</option>
                            <option value="1">Ya</option>
                        </select>
                        <span id="snha4"></span>
                    </td>
                    <td></td>
                    <td>
                    </td>
                </tr>
            </table>
            <?php }else{ ?>
            <table  class="table-input" width="100%">
                <tr class="headrow">
                    <th colspan="4">Skrining Nutrisi</th>
                </tr>
                <tr>
                    <td width='20%'>Penurunan berat badan yang tidak diinginkan selama 6 bulan terakhir</td>
                    <td width='30%'>
                        <select name="FS_NUTRISI1" class="select2" style="width: 190px;" id="sn1">
                            <option value="">--Pilih Data--</option>
                            <option value="0">Tidak</option>
                            <option value="2">Tidak Yakin</option>
                            <option value="1">Ya (1-5 Kg)</option>
                            <option value="3">Ya (6-10 Kg)</option>
                            <option value="4">Ya (11-15 Kg)</option>
                            <option value="5">Ya (>15 Kg)</option>

                        </select>
                        <span id="snh1"></span>
                    </td>
                    <td width='20%'>Kesimpulan</td>
                    <td width='30%'><b><span id="kesimpulannutrisi"></span></b></td>
                </tr>
                <tr>
                    <td>Asupan makanan menurun dikarenakan adanya penurunan nafsu makan</td>
                    <td>
                        <select name="FS_NUTRISI2" class="select2" style="width: 190px;" id="sn2">
                            <option value="">--Pilih Data--</option>
                            <option value="0">Tidak</option>
                            <option value="1">Ya</option>
                        </select>
                        <span id="snh2"></span>
                    </td>
                    <td></td>
                    <td>
                    </td>
                </tr>
            </table>
            <?php }?>

            <table class="table-input" width="100%">
                <tr class="headrow">
                    <th colspan="4">Spiritual dan Kultural pasien</th>
                </tr>
                <tr>
                    <td width='20%'>Agama</td>
                    <td width='30%'>
                        <select name="FS_AGAMA" id="surat_dari" class="select2" style="width: 190px;">
                            <option value="1">Islam</option>
                            <option value="2">Kristen</option>
                            <option value="3">Katholik</option>
                            <option value="4">Hindu</option>
                            <option value="5">Buda</option>
                            <option value="6">Konghucu</option>
                        </select>
                    </td>
                    <td width='20%'>Nilai/Kepercayaan khusus</td>
                    <td width='30%'>
                        <select name="FS_NILAI_KHUSUS">
                            <option value="1" onclick='document.getElementById("civstaton4").disabled = true'>Tidak Ada</option>
                            <option VALUE="2" onclick='document.getElementById("civstaton4").disabled = false'>Ada</option>
                        </select>
                        <br><br>
                        <input type="text" name="FS_NILAI_KHUSUS2" id="civstaton4" disabled="" size="32">
                    </td>
                </tr>
                <tr>
                    <td>Bantuan Pemenuhan Kebutuhan Spiritual</td>
                    <td>
                        <select name="keb_spirit[]" multiple id="spiritual" style="width:250px">
                            <option></option>
                        </select>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <table class="table-input" width="100%">
                <tr class="headrow">
                    <th colspan="4">Kebutuhan Edukasi</th>
                </tr>
                <tr>
                    <td width='20%'>Edukasi</td>
                    <td width='30%'>
                        <select name="edukasi[]" multiple id="edukasi" style="width:250px">
                            <option></option>
                        </select>
                    </td>
                    <td width='20%'></td>
                    <td width='30%'></td>
                </tr>
            </table>
            <table class="table-input" width="100%">
                <tr class="headrow">
                    <th colspan="4">Scrinning Case Manager</th>
                </tr>
                <tr>
                    <td width='20%'>Scrinning Case Manager</td>
                    <td width='30%'>
                        <select name="planning[]" multiple id="planning" style="width:250px">
                            <option></option>
                        </select>
                    </td>
                    <td width='20%'></td>
                    <td width='30%'></td>
                </tr>
            </table>
            <table class="table-input" width="100%">
                <tr class="headrow">
                    <th colspan="4">Keperawatan</th>
                </tr>
                <tr>
                    <td width='20%'>Masalah Keperawatan</td>
                    <td width='30%'>
                        <select name="tujuan[]" multiple id="tujuan" style="width:250px">
                            <option></option>
                        </select>
                    </td>
                    <td width='20%'></td>
                    <td width='30%'></td>
                </tr>
            </table>
            <table class="table-input" width="100%">
                <tr class="headrow">
                    <th colspan="4">Verifikasi PPJA</th>
                </tr>
                <tr>
                    <td width='20%'>Verifikasi PPJA</td>
                    <td width='30%'>
                        <select name="FS_VERIF_PPJA" id="surat_dari" class="select2" style="width: 190px;">
                            <option value="0">Belum Verifikasi</option>
                            <option value="1">Verifikasi</option>
                        </select>
                    </td>
                    <td width='20%'>Diverifikasi Oleh : </td>
                    <td width='30%'></td>
                </tr>
                <tr class="submit-box">
                    <td colspan="4">
                        <div style="font-weight: bold;">
                            *Bismillahirohmanirrohim, saya dengan sadar dan penuh tanggung jawab mengisikan formulir ini dengan data yang benar
                        </div>
                        <br>
                        <input type="submit" name="save" value="Simpan" class="edit-button"/>
                    </td>
                </tr>
            </table>
    </form>
</div>