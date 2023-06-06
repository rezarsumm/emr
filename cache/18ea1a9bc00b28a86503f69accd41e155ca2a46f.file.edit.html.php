<?php /* Smarty version Smarty-3.0.7, created on 2023-06-06 09:42:38
         compiled from "application/views\nurse/rawat_jalan/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:12650647e9d1eaa86f4-70621215%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18ea1a9bc00b28a86503f69accd41e155ca2a46f' => 
    array (
      0 => 'application/views\\nurse/rawat_jalan/edit.html',
      1 => 1685954849,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12650647e9d1eaa86f4-70621215',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("nurse/rawat_jalan/edit_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<script type="text/javascript">
    $(document).ready(function () {
        score();
        $("#op1").change(function () {
            var sc = $(this).val();
            $("#sc1").html(sc);
            score();
        });
        $("#op2").change(function () {
            var sc = $(this).val();
            $("#sc2").html(sc);
            score();
        });
        $("#op3").change(function () {
            var sc = $(this).val();
            $("#sc3").html(sc);
            score();
        });
        $("#sn1").change(function () {
            var sn = $(this).val();
            $("#snh1").html(sn);
            score_sn();
        });
        $("#sn2").change(function () {
            var sn = $(this).val();
            $("#snh2").html(sn);
            score_sn();
        });
        $("#sna1").change(function () {
            var sna = $(this).val();
            $("#snha1").html(sna);
            score_sna();
        });
        $("#sna2").change(function () {
            var sna = $(this).val();
            $("#snha2").html(sna);
            score_sna();
        });
        $("#sna3").change(function () {
            var sna = $(this).val();
            $("#snha3").html(sna);
            score_sna();
        });
        $("#sna4").change(function () {
            var sna = $(this).val();
            $("#snha4").html(sna);
            score_sna();
        });
    });
</script>
<script type="text/javascript">
    function score() {
        var sc = parseInt($("#sc1").text()) + parseInt($("#sc2").text()) + parseInt($("#sc3").text());
        $("#totalsc").html(sc);
        if (sc >= 45) {
            $("#rjtkesimpulan").html(">=45 (RISIKO TINGGI)");
        } else if (sc >= 25 && sc <= 44) {
            $("#rjtkesimpulan").html("25-44 (risiko rendah)");
        } else if (sc <= 24) {
            $("#rjtkesimpulan").html("0-24 (TIDAK ADA RISIKO)");
        }
    }
     function score_sn() {
        var sn = parseInt($("#snh1").text()) + parseInt($("#snh2").text());
        $("#totalsn").html(sn);
        if (sn >= 2) {
            $("#kesimpulansn").html("LAPORKAN KE DOKTER");
        } else if (sn < 2) {
            $("#kesimpulansn").html("NORMAL");
        }
    }
    function score_sna() {
        var sna = parseInt($("#snha1").text()) + parseInt($("#snha2").text())+ parseInt($("#snha3").text())+ parseInt($("#snha4").text());
        $("#totalsna").html(sna);
        if (sna >= 1) {
            $("#kesimpulansna").html("LAPORKAN KE DOKTER");
        } else if (sna <= 0) {
            $("#kesimpulansna").html("NORMAL");
        }
    }
</script>
<div class="breadcrum">
    <p>
        <a href="#">Nursing Record</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('nurse/rawat_jalan/');?>
">Rawat Jalan</a><span></span>
        <small>Add Data</small>
    </p>
    <div class="clear"></div>
</div>
<div class="navigation">
    <div class="navigation-button">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('nurse/rawat_jalan/');?>
"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/back-icon.png" alt="" />  Back</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
<!-- notification template -->
<?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of notification template-->
<form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('nurse/rawat_jalan/edit_process');?>
" method="post">
    <input type="hidden" name="FS_KD_REG" value="<?php echo $_smarty_tpl->getVariable('result')->value['NO_REG'];?>
" />
    <input type="hidden" name="FS_MR" value="<?php echo $_smarty_tpl->getVariable('result')->value['NO_MR'];?>
" />
    <table class="table-info" width="100%">
        <tr class="headrow">
            <th colspan="4">Data Pasien</th>
        </tr>
        <tr>
        <td width='15%'>No RM</td>
        <td width='35%'><?php echo $_smarty_tpl->getVariable('result')->value['NO_MR'];?>
</td>
        <td width='15%'>Nama</td>
        <td width='35%'><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['NAMA_PASIEN'])===null||$tmp==='' ? '' : $tmp);?>
</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['ALAMAT'])===null||$tmp==='' ? '' : $tmp);?>
</td>
        <td>Tanggal Lahir</td>
        <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['TGL_LAHIR'])===null||$tmp==='' ? '' : $tmp);?>
</td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td><?php if ($_smarty_tpl->getVariable('result')->value['JENIS_KELAMIN']=='P'){?>
            Perempuan
            <?php }else{ ?>
            Laki-Laki
            <?php }?></td>
        <td></td>
        <td></td>
    </tr>
     <tr>
            <td>Rekanan</td>
            <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['NAMAREKANAN'])===null||$tmp==='' ? '' : $tmp);?>
</td>
            <td>Dokter</td>
            <td>  <?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['NAMA_DOKTER'])===null||$tmp==='' ? '' : $tmp);?>
 </td>
        </tr>
    </table>
    <div class="navigation">
    <div class="pageRow">
        <div class="pageNav">
            <ul>
                <li class="info"></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
    <div class="navigation-button">
        <ul>
            <li><a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('rm/rawat_jalan/resume/').($_smarty_tpl->getVariable('result')->value['NO_MR']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/printer-icon.png" alt="" /> Profil Ringkas Medis Rawat Jalan</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
    <div class="notification red">
    <p><strong>High Risk :</strong> <?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_HIGH_RISK'])===null||$tmp==='' ? '-' : $tmp);?>
 </p>
    <p><strong>Alergi :</strong> <?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
 (<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_REAK_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
)</p>
    <div class="clear"></div>
</div>
    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="2">Anamnesa / Allow Anamnesa</th>
            <th colspan="2">Pemeriksaan Fisik</th>
        </tr>
        <tr>
            <td colspan="2">
                <textarea cols="50" name="FS_ANAMNESA"><?php echo $_smarty_tpl->getVariable('ases2')->value['FS_ANAMNESA'];?>
</textarea>
                <input type="hidden" name="FS_ANAMNESA_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_ANAMNESA'];?>
">
        </td>
        <td colspan="2">
                <textarea cols="50" name="FS_EDUKASI"><?php echo $_smarty_tpl->getVariable('ases2')->value['FS_EDUKASI'];?>
</textarea>
                <input type="hidden" name="FS_EDUKASI_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_EDUKASI'];?>
">
            </td>
        </tr>
        <tr class="headrow">
            <th colspan="4">Vital Sign</th>
            <input type="hidden" name="FS_SUHU_0" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_SUHU'];?>
">
            <input type="hidden" name="FS_NADI_0" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_N'];?>
">
            <input type="hidden" name="FS_R_0" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_R'];?>
">
            <input type="hidden" name="FS_TD_0" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_TD'];?>
">
            <input type="hidden" name="FS_TB_0" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_TB'];?>
">
            <input type="hidden" name="FS_BB_0" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_BB'];?>
">

        </tr>
        <tr>
            <td width='15%'>Suhu</td>
            <td width='35%'><input type="text" name="FS_SUHU" size="10" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_SUHU'];?>
"/> </td>
            <td width='15%'>Nadi</td>
            <td width='35%'><input type="text" name="FS_NADI" size="10" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_NADI'];?>
" /> x/menit</td>
        </tr>
        <tr>
            <td>R</td>
            <td><input type="text" name="FS_R" size="10" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_R'];?>
" /> x/menit</td>
            <td>TD</td>
            <td><input type="text" name="FS_TD" size="10" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_TD'];?>
" /> mmHg</td>
        </tr>
        <tr>
            <td>Tinggi Badan</td>
            <td><input type="text" name="FS_TB" size="10" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_TB'];?>
"/> cm</td>
            <td>Berat Badan</td>
            <td><input type="text" name="FS_BB" size="10" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_BB'];?>
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
                <input type="hidden" name="FS_NYERI_0" value="<?php echo $_smarty_tpl->getVariable('nyeri')->value['FS_NYERI'];?>
">

                <select name="FS_NYERI" id="surat_dari" class="select2" style="width: 170px;">
                    <option value="0" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERI']=='0'){?> selected="" <?php }?>>Tidak</option>
                    <option value="1" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERI']=='1'){?> selected="" <?php }?>>Ya</option>
                </select>
            </td>
            <td width='20%'></td>
            <td width='30%'></td>
        </tr>
        <tr>
            <td>Provokatif</td>
            <td>
                <input type="hidden" name="FS_NYERIP_0" value="<?php echo $_smarty_tpl->getVariable('nyeri')->value['FS_NYERIP'];?>
">

                <select name="FS_NYERIP" id="surat_dari" class="select2" style="width: 150px;">
                    <option value="0" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIP']=='0'){?> selected="" <?php }?>>Tidak Ada Nyeri</option>
                    <option value="1" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIP']=='1'){?> selected="" <?php }?>>Biologik</option>
                    <option value="2" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIP']=='2'){?> selected="" <?php }?>>Kimiawi</option>
                    <option value="3" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIP']=='3'){?> selected="" <?php }?>>Mekanik / Rudapaksa</option>
                </select>
            </td>
            <td>Quality</td>
            <td> <input type="hidden" name="FS_NYERIQ_0" value="<?php echo $_smarty_tpl->getVariable('nyeri')->value['FS_NYERIQ'];?>
">
                <select name="FS_NYERIQ" id="surat_dari" class="select2" style="width: 170px;">
                    <option value="0" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIQ']=='0'){?> selected="" <?php }?>>Tidak Ada</option>
                    <option value="1" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIQ']=='1'){?> selected="" <?php }?>>Seperti Di Tusuk-Tusuk</option>
                    <option value="2" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIQ']=='2'){?> selected="" <?php }?>>Seperti Terbakar</option>
                    <option value="3" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIQ']=='3'){?> selected="" <?php }?>>Seperti Tertimpa Beb</option>
                    <option value="4" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIQ']=='4'){?> selected="" <?php }?>>Ngilu</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Regio</td>
            <td> <input type="hidden" name="FS_NYERIR_0" value="<?php echo $_smarty_tpl->getVariable('nyeri')->value['FS_NYERIR'];?>
">
                <input type="text" name="FS_NYERIR" size="30" value="<?php echo $_smarty_tpl->getVariable('nyeri')->value['FS_NYERIR'];?>
"/>
            </td>
            <td>Severity</td>
            <td> <input type="hidden" name="FS_NYERIS_0" value="<?php echo $_smarty_tpl->getVariable('nyeri')->value['FS_NYERIS'];?>
">
                <select name="FS_NYERIS" id="surat_dari" class="select2" style="width: 170px;">
                    <option value="0" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIS']=='0'){?> selected="" <?php }?>>0</option>
                    <option value="1" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIS']=='1'){?> selected="" <?php }?>>1</option>
                    <option value="2" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIS']=='2'){?> selected="" <?php }?>>2</option>
                    <option value="3" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIS']=='3'){?> selected="" <?php }?>>3</option>
                    <option value="4" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIS']=='4'){?> selected="" <?php }?>>4</option>
                    <option value="5" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIS']=='5'){?> selected="" <?php }?>>5</option>
                    <option value="6" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIS']=='6'){?> selected="" <?php }?>>6</option>
                    <option value="7" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIS']=='7'){?> selected="" <?php }?>>7</option>
                    <option value="8" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIS']=='8'){?> selected="" <?php }?>>8</option>
                    <option value="9" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIS']=='9'){?> selected="" <?php }?>>9</option>
                    <option value="10"<?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIS']=='10'){?> selected="" <?php }?>>10</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Time</td>
            <td> <input type="hidden" name="FS_NYERIT_0" value="<?php echo $_smarty_tpl->getVariable('nyeri')->value['FS_NYERIT'];?>
">
                <select name="FS_NYERIT" id="surat_dari" class="select2" style="width: 170px;">
                        <option value="0" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIT']=='0'){?> selected="" <?php }?>>Tidak Ada</option>
                        <option value="1" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIT']=='1'){?> selected="" <?php }?>>Kadang-kadang</option>
                        <option value="2" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIT']=='2'){?> selected="" <?php }?>>Sering</option>
                        <option value="3" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIT']=='3'){?> selected="" <?php }?>>Menetap</option>
                    </select>
            </td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">Asesmen Jatuh</th>
        </tr>
        <tr>
            <td width='15%'>Cara berjalan pasien Tidak seimbang / sempoyongan / limbung</td>
            <td width='35%'>
                <input type="hidden" name="FS_CARA_BERJALAN1_0" value="<?php echo $_smarty_tpl->getVariable('jatuh')->value['FS_CARA_BERJALAN1'];?>
">
                 <select name="FS_CARA_BERJALAN1" id="surat_dari" class="select2" style="width: 170px;" id="op1">
                    <option value="">--Pilih Data--</option>
                    <option value="1" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_CARA_BERJALAN1']=='1'){?> selected="" <?php }?>>YA</option>
                    <option value="0" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_CARA_BERJALAN1']=='0'){?> selected="" <?php }?>>TIDAK</option>
                </select>
                <span id="sc1"></span>
            </td>
            <td width='15%'>Kesimpulan</td>
            <td width='35%'>
                <b><span id="totalsc">0</span></b>
                <span id="rjtkesimpulan">
                    
                </span></td>
        </tr>
        <tr>
            <td width='15%'>Cara berjalan pasien dengan mengunakan alat bantu</td>
            <td width='35%'>
                <input type="hidden" name="FS_CARA_BERJALAN2_0" value="<?php echo $_smarty_tpl->getVariable('jatuhvs')->value['FS_CARA_BERJALAN2'];?>
">
                 <select name="FS_CARA_BERJALAN2" id="surat_dari" class="select2" style="width: 170px;" id="op2">
                    <option value="">--Pilih Data--</option>
                    <option value="1" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_CARA_BERJALAN2']=='1'){?> selected="" <?php }?>>YA</option>
                    <option value="0" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_CARA_BERJALAN2']=='0'){?> selected="" <?php }?>>TIDAK</option>
                </select>
                <span id="sc2"></span>
            </td>
            <td colspan="2"><b>Intervensi </b>
                <br>
                <input type="hidden" name="intervensi1_0" value="<?php echo $_smarty_tpl->getVariable('jatuh')->value['intervensi1'];?>
">
                <input type="hidden" name="intervensi2_0" value="<?php echo $_smarty_tpl->getVariable('jatuh')->value['intervensi2'];?>
">
                Edukasi <input type="radio" <?php if ($_smarty_tpl->getVariable('jatuh')->value['intervensi1']=='Ya'){?> checked="" <?php }?> name="intervensi1" value="Ya">Ya
                         <input type="radio" <?php if ($_smarty_tpl->getVariable('jatuh')->value['intervensi1']=='Tidak'){?> checked="" <?php }?> name="intervensi1" value="Tidak">Tidak
                         <input type="hidden" name="intervensi1" value=""> 
                         <br>
                         Pasang Stiker Resiko Jatuh (*resiko tinggi)
                         <input type="radio" name="intervensi2" <?php if ($_smarty_tpl->getVariable('jatuh')->value['intervensi2']=='Ya'){?> checked="" <?php }?>  value="Ya">Ya
                         <input type="radio"  <?php if ($_smarty_tpl->getVariable('jatuh')->value['intervensi2']=='Tidak'){?> checked="" <?php }?>  name="intervensi2" value="Tidak">Tidak
                         <input type="hidden"     name="intervensi2" value="Tidak"> 
            </td>
        </tr>
        <tr>
            <td>Menopang saat akan duduk: tampak memegang pinggiran kursi atau meja / benda lain sebagai penopang saat akan duduk.</td>
            <td>
                <input type="hidden" name="FS_CARA_DUDUK_0" value="<?php echo $_smarty_tpl->getVariable('jatuh')->value['FS_CARA_DUDUK'];?>
">
                <select name="FS_CARA_DUDUK" id="surat_dari" class="select2" style="width: 170px;" id="op3">
                    <option value="">--Pilih Data--</option>
                    <option value="1" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_CARA_DUDUK']=='1'){?> selected="" <?php }?>>YA</option>
                    <option value="0" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_CARA_DUDUK']=='0'){?> selected="" <?php }?>>TIDAK</option>
                </select>
                <span id="sc3"></span>
            </td>
            <td></td>
            <td></td>
        </tr>
    </table>
         <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">Riwayat Kesehatan</th>
        </tr>
        <tr>
            <td width='20%'>Riweayat Penyakit dahulu</td>
            <td width='30%'>
                <input type="hidden" name="FS_RIW_PENYAKIT_DAHULU_0" value="<?php echo $_smarty_tpl->getVariable('result')->value['FS_RIW_PENYAKIT_DAHULU'];?>
">
                <input type="text" name="FS_RIW_PENYAKIT_DAHULU" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_RIW_PENYAKIT_DAHULU'])===null||$tmp==='' ? '-' : $tmp);?>
" size="32">
            </td>
            <td width='20%'>Riwayat penyakit keluarga</td>
            <td width='30%'>
                <input type="hidden" name="FS_RIW_PENYAKIT_DAHULU2_0" value="<?php echo $_smarty_tpl->getVariable('result')->value['FS_RIW_PENYAKIT_DAHULU2'];?>
">
                <input type="text" name="FS_RIW_PENYAKIT_DAHULU2" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_RIW_PENYAKIT_DAHULU2'])===null||$tmp==='' ? '-' : $tmp);?>
" size="32">
            </td>
        </tr>
        <?php if ($_smarty_tpl->getVariable('result')->value['FS_KD_LAYANAN']=='P003'||$_smarty_tpl->getVariable('result')->value['FS_KD_LAYANAN2']=='P003'||$_smarty_tpl->getVariable('result')->value['FS_KD_LAYANAN3']=='P003'){?>
        <tr>
            <td>Riwayat Imunisasi</td>
            <td>
                
                <select name="FS_RIW_IMUNISASI" id="surat_dari" class="select2" style="width: 190px;">
                    <option value="0" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_RIW_IMUNISASI']=='0'){?> selected="" <?php }?>>--Pilih Data--</option>
                    <option value="1" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_RIW_IMUNISASI']=='1'){?> selected="" <?php }?>>Lengkap</option>
                    <option value="2" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_RIW_IMUNISASI']=='2'){?> selected="" <?php }?>>Kurang</option>
                </select>
                <br><br>
                <input type="text" name="FS_RIW_IMUNISASI_KET" size="32" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_RIW_IMUNISASI_KET'];?>
">
            </td>
            <td>Riwayat Tumbuh Kembang</td>
            <td>
                <select name="FS_RIW_TUMBUH" id="surat_dari" class="select2" style="width: 190px;">
                    <option value="0" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_RIW_TUMBUH']=='0'){?> selected="" <?php }?>>--Pilih Data--</option>
                    <option value="1" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_RIW_TUMBUH']=='1'){?> selected="" <?php }?>>Normal</option>
                    <option value="2" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_RIW_TUMBUH']=='2'){?> selected="" <?php }?>>Ada Gangguan</option>
                </select>
                <br><br>
                <input type="text" name="FS_RIW_TUMBUH_KET" size="32" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_RIW_TUMBUH_KET'];?>
">
            </td>
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
                <input type="hidden" name="FS_ALERGI_0" value="<?php echo $_smarty_tpl->getVariable('result')->value['FS_ALERGI'];?>
">
                <input type="text" name="FS_ALERGI" size="35" value="<?php echo $_smarty_tpl->getVariable('result')->value['FS_ALERGI'];?>
">
                <em style="color:red">* Wajib Diisi</em>
            </td>
            <td width='20%'>Reaksi Alergi</td>
            <td width='30%'>
                <input type="hidden" name="FS_REAK_ALERGI_0" value="<?php echo $_smarty_tpl->getVariable('result')->value['FS_REAK_ALERGI'];?>
">
                <input type="text" name="FS_REAK_ALERGI" size="35" value="<?php echo $_smarty_tpl->getVariable('result')->value['FS_REAK_ALERGI'];?>
">
                <em style="color:red">* Wajib Diisi</em>
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
                <input type="hidden" name="FS_STATUS_PSIK_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK'];?>
">
                <select name="FS_STATUS_PSIK">
                    <option value=""  <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']==''){?> selected="" <?php }?>  onclick='document.getElementById("civstaton3").disabled = true'>--Pilih Data--</option>
                    <option value="1" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']=='1'){?> selected="" <?php }?> onclick='document.getElementById("civstaton3").disabled = true'>Tenang</option>
                    <option value="2" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']=='2'){?> selected="" <?php }?> onclick='document.getElementById("civstaton3").disabled = true'>Cemas</option>
                    <option value="3" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']=='3'){?> selected="" <?php }?> onclick='document.getElementById("civstaton3").disabled = true'>Takut</option>
                    <option value="4" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']=='4'){?> selected="" <?php }?> onclick='document.getElementById("civstaton3").disabled = true'>Marah</option>
                    <option value="5" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']=='5'){?> selected="" <?php }?> onclick='document.getElementById("civstaton3").disabled = true'>Sedih</option>
                    <option value="6" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']!=''&&$_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']!='1'&&$_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']!='2'&&$_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']!='3'&&$_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']!='4'&&$_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK']!='5'){?>selected="" <?php }?>onclick='document.getElementById("civstaton3").disabled = false'>Lainnya</option>
                </select>
                <br><br>
                <input type="hidden" name="FS_STATUS_PSIK2_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK2'];?>
">

                <input type="text" name="FS_STATUS_PSIK2" id="civstaton3" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK2']=='0'){?>disabled=""<?php }?> size="27" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK2'];?>
">
            </td>
            <td width='20%'>Hubungan dengan anggota keluarga</td>
            <td width='30%'>
                <input type="hidden" name="FS_HUB_KELUARGA_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_HUB_KELUARGA'];?>
">
                <select name="FS_HUB_KELUARGA" id="surat_dari" class="select2" style="width: 170px;">
                    <option value="" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_HUB_KELUARGA']==''){?> selected="" <?php }?>>--Pilih Data--</option>
                    <option value="1" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_HUB_KELUARGA']=='1'){?> selected="" <?php }?>>Baik</option>
                    <option value="2" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_HUB_KELUARGA']=='2'){?> selected="" <?php }?>>Tidak Baik</option>

                </select>
            </td>
        </tr>
    </table>
     <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">Status Fungsional</th>
        </tr>
        <tr>
            <td width='20%'>Status Fungsional</td>
            <td width='30%'>
                <input type="hidden" name="FS_ST_FUNGSIONAL_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_ST_FUNGSIONAL'];?>
">
                <select name="FS_ST_FUNGSIONAL" id="surat_dari" class="select2" style="width: 170px;">
                    <option value="" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_ST_FUNGSIONAL']==''){?> selected="" <?php }?>>--Pilih Data--</option>
                    <option value="1" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_ST_FUNGSIONAL']=='1'){?> selected="" <?php }?>>Mandiri</option>
                    <option value="2" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_ST_FUNGSIONAL']=='2'){?> selected="" <?php }?>>Perlu Bantuan</option>
                </select>
            </td>
             <td width='20%'>Pengelihatan</td>
            <td width='30%'>
                <input type="hidden" name="FS_PENGELIHATAN_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_PENGELIHATAN'];?>
">
                <select name="FS_PENGELIHATAN" id="surat_dari" class="select2" style="width: 190px;">
                    <option value="1" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_PENGELIHATAN']=='1'){?> selected="" <?php }?>>Normal</option>
                    <option value="2" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_PENGELIHATAN']=='2'){?> selected="" <?php }?>>Kabur</option>
                    <option value="3" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_PENGELIHATAN']=='3'){?> selected="" <?php }?>>Kaca Mata</option>
                    <option value="4" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_PENGELIHATAN']=='4'){?> selected="" <?php }?>>Lensa Kontak</option>

                </select>
            </td>
        </tr>
        <tr>
            <td>Penciuman</td>
            <td>
                <input type="hidden" name="FS_PENCIUMAN_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_PENCIUMAN'];?>
">
                <select name="FS_PENCIUMAN" id="surat_dari" class="select2" style="width: 190px;">
                    <option value="1" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_PENCIUMAN']=='1'){?> selected="" <?php }?>>Normal</option>
                    <option value="2" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_PENCIUMAN']=='2'){?> selected="" <?php }?>>Tidak Normal</option>

                </select>
            </td>
            <td>Pendengaran</td>
            <td>
                <input type="hidden" name="FS_PENDENGARAN_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_PENDENGARAN'];?>
">
                <select name="FS_PENDENGARAN" id="surat_dari" class="select2" style="width: 190px;">
                    <option value="1" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_PENDENGARAN']=='1'){?> selected="" <?php }?>>Normal</option>
                    <option value="2" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_PENDENGARAN']=='2'){?> selected="" <?php }?>>Tidak Normal (Kanan)</option>
                    <option value="3" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_PENDENGARAN']=='3'){?> selected="" <?php }?>>Tidak Normal (Kiri)</option>
                    <option value="4" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_PENDENGARAN']=='4'){?> selected="" <?php }?>>Tidak Normal (Kanan & Kiri)</option>
                    <option value="5" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_PENDENGARAN']=='5'){?> selected="" <?php }?>>Alat Bantu Dengar (Kanan)</option>
                    <option value="6" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_PENDENGARAN']=='6'){?> selected="" <?php }?>>Alat Bantu Dengar (Kiri)</option>
                    <option value="7" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_PENDENGARAN']=='7'){?> selected="" <?php }?>>Alat Bantu Dengar (Kanan & Kiri)</option>
                </select>
            </td>
        </tr>
        </tr>
    </table>
    <?php if ($_smarty_tpl->getVariable('result')->value['FS_KD_LAYANAN']=='P003'||$_smarty_tpl->getVariable('result')->value['FS_KD_LAYANAN2']=='P003'||$_smarty_tpl->getVariable('result')->value['FS_KD_LAYANAN3']=='P003'){?>
    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">Skrining Nutrisi Anak <b>Adaptasi Strong Kids (Anak usia 1-18 Tahun)</b></th>
        </tr>
        <tr>
            <td width='20%'>Apakah pasien tampak kurus?</td>
            <td width='30%'>
                <input type="hidden" name="FS_NUTRISI_ANAK1_0" value="<?php echo $_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI_ANAK1'];?>
">
                <select name="FS_NUTRISI_ANAK1" class="select2" style="width: 190px;" id="sna1">
                    <option value="">--Pilih Data--</option>
                    <option value="0" <?php if ($_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI_ANAK1']=='0'){?>selected=""<?php }?>>Tidak</option>
                    <option value="1" <?php if ($_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI_ANAK1']=='1'){?>selected=""<?php }?>>Ya</option>

                </select>
                <span id="snha1"></span>
            </td>
            <td width='20%'>Kesimpulan</td>
            <td width='30%'><b><span id="kesimpulansna"></span></b></td>
        </tr>
        <tr>
            <td>Apakah terdapat penurunan BB selama satu bulan terakhir?</td>
            <td>
                <input type="hidden" name="FS_NUTRISI_ANAK2_0" value="<?php echo $_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI_ANAK2'];?>
">
                <select name="FS_NUTRISI_ANAK2" class="select2" style="width: 190px;" id="sna2">
                    <option value="">--Pilih Data--</option>
                    <option value="0" <?php if ($_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI_ANAK2']=='0'){?>selected=""<?php }?>>Tidak</option>
                    <option value="1" <?php if ($_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI_ANAK2']=='1'){?>selected=""<?php }?>>Ya</option>
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
                <input type="hidden" name="FS_NUTRISI_ANAK3_0" value="<?php echo $_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI_ANAK3'];?>
">
                <select name="FS_NUTRISI_ANAK3" class="select2" style="width: 190px;" id="sna3">
                    <option value="">--Pilih Data--</option>
                    <option value="0" <?php if ($_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI_ANAK3']=='0'){?>selected=""<?php }?>>Tidak</option>
                    <option value="1" <?php if ($_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI_ANAK3']=='1'){?>selected=""<?php }?>>Ya</option>
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
                <input type="hidden" name="FS_NUTRISI_ANAK4_0" value="<?php echo $_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI_ANAK4'];?>
">
                <select name="FS_NUTRISI_ANAK4" class="select2" style="width: 190px;" id="sna4">
                    <option value="">--Pilih Data--</option>
                    <option value="0" <?php if ($_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI_ANAK4']=='0'){?>selected=""<?php }?>>Tidak</option>
                    <option value="1" <?php if ($_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI_ANAK4']=='1'){?>selected=""<?php }?>>Ya</option>
                </select>
                <span id="snha4"></span>
            </td>
            <td></td>
            <td>
            </td>
        </tr>
    </table>
    <?php }else{ ?>
     <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">Skrining Nutrisi</th>
        </tr>
        <tr>
            <td width='20%'>Penurunan berat badan yang tidak diinginkan selama 6 bulan terakhir</td>
            <td width='30%'>
                <input type="hidden" name="FS_NUTRISI1_0" value="<?php echo $_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI1'];?>
">
                <select name="FS_NUTRISI1" class="select2" style="width: 190px;" id="sn1">
                    <option value="">--Pilih Data--</option>
                    <option value="0" <?php if ($_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI1']=='0'){?>selected=""<?php }?>>Tidak</option>
                    <option value="1" <?php if ($_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI1']=='1'){?>selected=""<?php }?>>Tidak Yakin</option>
                    <option value="2" <?php if ($_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI1']=='2'){?>selected=""<?php }?>>Ya (1-5 Kg)</option>
                    <option value="3" <?php if ($_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI1']=='3'){?>selected=""<?php }?>>Ya (6-10 Kg)</option>
                    <option value="4" <?php if ($_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI1']=='4'){?>selected=""<?php }?>>Ya (11-15 Kg)</option>
                    <option value="5" <?php if ($_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI1']=='5'){?>selected=""<?php }?>>Ya (>15 Kg)</option>

                </select>
                <span id="snh1"></span>
            </td>
            <td width='20%'>Kesimpulan</td>
            <td width='30%'><b><span id="kesimpulansn"></span></b></td>
        </tr>
        <tr>
            <td>Asupan makanan menurun dikarenakan adanya penurunan nafsu makan</td>
            <td>
                <input type="hidden" name="FS_NUTRISI2_0" value="<?php echo $_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI2'];?>
">
                <select name="FS_NUTRISI2" class="select2" style="width: 190px;" id="sn2">
                    <option value="">--Pilih Data--</option>
                    <option value="0" <?php if ($_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI2']=='0'){?>selected=""<?php }?>>Tidak</option>
                    <option value="1" <?php if ($_smarty_tpl->getVariable('nutrisi')->value['FS_NUTRISI2']=='1'){?>selected=""<?php }?>>Ya</option>
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
                <input type="hidden" name="FS_AGAMA_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_AGAMA'];?>
">
                <select name="FS_AGAMA" id="surat_dari" class="select2" style="width: 170px;">
                    <option value="" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_AGAMA']==''){?> selected="" <?php }?>>--Pilih Data--</option>
                    <option value="1" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_AGAMA']=='1'){?> selected="" <?php }?>>Islam</option>
                    <option value="2" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_AGAMA']=='2'){?> selected="" <?php }?>>Kristen</option>
                    <option value="3" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_AGAMA']=='3'){?> selected="" <?php }?>>Katholik</option>
                    <option value="4" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_AGAMA']=='4'){?> selected="" <?php }?>>Hindu</option>
                    <option value="5" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_AGAMA']=='5'){?> selected="" <?php }?>>Buda</option>
                    <option value="6" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_AGAMA']=='6'){?> selected="" <?php }?>>Konghucu</option>
                </select>
            </td>
            <td width='20%'>Nilai/Kepercayaan khusus</td>
            <td width='30%'>
                <input type="hidden" name="FS_NILAI_KHUSUS_0" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_NILAI_KHUSUS'];?>
">
                 <select name="FS_NILAI_KHUSUS">
                     <option value="" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_NILAI_KHUSUS']==''){?> selected="" <?php }?> onclick='document.getElementById("civstaton4").disabled = true'>--Pilih Data--</option>
                    <option value="1" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_NILAI_KHUSUS']=='1'){?> selected="" <?php }?> onclick='document.getElementById("civstaton4").disabled = true'>Tidak Ada</option>
                    <option value="2" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_NILAI_KHUSUS']!=''&&$_smarty_tpl->getVariable('ases2')->value['FS_NILAI_KHUSUS']!='1'){?>selected="" <?php }?>onclick='document.getElementById("civstaton4").disabled = false'>Ada</option>
                </select>
                <br><br>
                <input type="text" name="FS_NILAI_KHUSUS2" id="civstaton4" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_NILAI_KHUSUS2']=='0'){?>disabled=""<?php }?> size="27" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_NILAI_KHUSUS2'];?>
">
            </td>
        </tr>
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
            <td width='20%'>Rencana Keperawatan</td>
            <td width='30%'>
                <select name="tembusan[]" multiple id="tembusan" style="width:250px">
                        <option></option>
                    </select>
            </td>
        </tr>

           <tr class="headrow">
            <th colspan="4">Rujukan</th>
        </tr>
        <tr>
            <td width='20%'>Tanggal Expired Rujukan (jika pasien BPJS)</td>
            <td width='30%'>
                <input type="text" name="FS_SKDP_FASKES" class="tanggal" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_SKDP_FASKES'];?>
" size="10"/>
            </td>
            <td width='20%'>Pasien terduga TB </td>
            <td width='30%'>
                Kode ICD 10 ( bila terdiagnosa TBC)
                <select name="kode_icd_x"  class="select2" id="kode" style="width:300px">
                 <option value=""></option>
                 <?php  $_smarty_tpl->tpl_vars['kode'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('icd')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['kode']->key => $_smarty_tpl->tpl_vars['kode']->value){
?> 
                 <option value="<?php echo $_smarty_tpl->tpl_vars['kode']->value['KODE'];?>
"><?php echo $_smarty_tpl->tpl_vars['kode']->value['KET'];?>
 | <?php echo $_smarty_tpl->tpl_vars['kode']->value['KODE'];?>
</option>
                 <?php }} ?>
                 </select>
            </td>
        </tr>

        <tr class="submit-box">
            <td colspan="4">
                 <div style="font-weight: bold;">
                    *Bismillahirohmanirrohim, saya dengan sadar dan penuh tanggung jawab mengisikan formulir ini dengan data yang benar
                </div>
                <br>
                <input type="submit" name="save" value="Simpan" class="edit-button" /> 
            </td>
        </tr>
    </table>
</form>