<?php /* Smarty version Smarty-3.0.7, created on 2022-02-04 15:53:31
         compiled from "application/views\nurse/rawat_jalan_kb/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:1791761fce98bac37c3-41849003%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43a8113816efc28821ce8aae83f4baebc095b6be' => 
    array (
      0 => 'application/views\\nurse/rawat_jalan_kb/edit.html',
      1 => 1616210790,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1791761fce98bac37c3-41849003',
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
<form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('nurse/rawat_jalan_kb/edit_process');?>
" method="post">
   <input type="hidden" name="FS_KD_REG" value="<?php echo $_smarty_tpl->getVariable('result')->value['NO_REG'];?>
" />
    <input type="hidden" name="FS_MR" value="<?php echo $_smarty_tpl->getVariable('result')->value['NO_MR'];?>
" />
    <input type="hidden" name="FS_KD_MEDIS" value="<?php echo $_smarty_tpl->getVariable('FS_KD_MEDIS')->value;?>
" />
    <input type="hidden" name="FS_KD_LAYANAN" value="<?php echo $_smarty_tpl->getVariable('result')->value['SPESIALIS'];?>
" />
    <input type="hidden" name="FS_JNS_ASESMEN" value="<?php echo $_smarty_tpl->getVariable('FS_JNS_ASESMEN')->value;?>
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
resource/doc/images/icon/printer-icon.png" alt="" /> Resume Rawat Jalan</a></li>
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
            <th colspan="4">Identitas Suami</th>
        </tr>

        <tr>
            <td>Nama</td>
            <td>
                <input type="text" name="FS_NM_SUAMI" size="35" value="<?php echo $_smarty_tpl->getVariable('result')->value['FS_NM_SUAMI'];?>
"/>
            </td>
            <td>Tanggal Lahir</td>
            <td>
                <input type="text" name="FS_TGL_LAHIR_SUAMI" size="15" value="<?php echo $_smarty_tpl->getVariable('result')->value['FS_TGL_LAHIR_SUAMI'];?>
"/>
            </td>
        </tr>
    </table>
    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="2">Anamnesa</th>
            <th colspan="2">High Risk</th>
        </tr>
        <tr>
            <td colspan="2">
                <textarea cols="50" name="FS_ANAMNESA"><?php echo $_smarty_tpl->getVariable('ases2')->value['FS_ANAMNESA'];?>
</textarea>
                </td>
                <td colspan="2">
                <textarea cols="50" name="FS_HIGH_RISK"><?php echo $_smarty_tpl->getVariable('result')->value['FS_HIGH_RISK'];?>
</textarea><br><em>*Jika Pasien ditemukan high risk</em>
                </td>
        <tr class="headrow">
            <th colspan="4">Vital Sign</th>
        </tr>
        <tr>
            <td width='15%'>Suhu</td>
            <td width='35%'><input type="text" name="FS_SUHU" size="10" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_SUHU'];?>
"/></td>
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
            <th colspan="4">Riwayat Kehamilan,Persalinan dan Nifas Yang Lalu</th>
        </tr>
        <tr>
            <td width='20%'>G</td>
            <td width='30%'>
                <input type="text" name="G" size="35" value="<?php echo $_smarty_tpl->getVariable('kebidanan')->value['G'];?>
">
            </td>
            <td width='20%'></td>
            <td width='30%'></td>
        </tr>
        <tr>
            <td>P</td>
            <td>
                <input type="text" name="P" size="35" value="<?php echo $_smarty_tpl->getVariable('kebidanan')->value['P'];?>
">
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>A</td>
            <td>
                <input type="text" name="A" size="35" value="<?php echo $_smarty_tpl->getVariable('kebidanan')->value['A'];?>
">
            </td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">Asesmen Nyeri</th>
        </tr>
        <tr>
            <td width='20%'>Ada Nyeri ?</td>
            <td width='30%'>
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
                <select name="FS_NYERIP" id="surat_dari" class="select2" style="width: 150px;">
                    <option value="0" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIP']=='0'){?> selected="" <?php }?>>Tidak Ada Nyeri</option>
                    <option value="1" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIP']=='1'){?> selected="" <?php }?>>Biologik</option>
                    <option value="2" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIP']=='2'){?> selected="" <?php }?>>Kimiawi</option>
                    <option value="3" <?php if ($_smarty_tpl->getVariable('nyeri')->value['FS_NYERIP']=='3'){?> selected="" <?php }?>>Mekanik / Rudapaksa</option>
                </select>
            </td>
            <td>Quality</td>
            <td>
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
            <td>
                <input type="text" name="FS_NYERIR" size="30" value="<?php echo $_smarty_tpl->getVariable('nyeri')->value['FS_NYERIR'];?>
"/>
            </td>
            <td>Severity</td>
            <td>
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
            <td>
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
                 <select name="FS_CARA_BERJALAN2" id="surat_dari" class="select2" style="width: 170px;" id="op2">
                    <option value="">--Pilih Data--</option>
                    <option value="1" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_CARA_BERJALAN2']=='1'){?> selected="" <?php }?>>YA</option>
                    <option value="0" <?php if ($_smarty_tpl->getVariable('jatuh')->value['FS_CARA_BERJALAN2']=='0'){?> selected="" <?php }?>>TIDAK</option>
                </select>
                <span id="sc2"></span>
            </td>
            <td></td>
            <td>
            </td>
        </tr>
        <tr>
            <td>Menopang saat akan duduk: tampak memegang pinggiran kursi atau meja / benda lain sebagai penopang saat akan duduk.</td>
            <td>
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
                <select name="FS_RIW_PENYAKIT_DAHULU">
                    <option value="" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_RIW_PENYAKIT_DAHULU']==''){?> selected="" <?php }?> onclick='document.getElementById("civstaton1").disabled = true'>--Pilih Data--</option>
                    <option value="1" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_RIW_PENYAKIT_DAHULU']=='1'){?> selected="" <?php }?>onclick='document.getElementById("civstaton1").disabled = true'>Hipertensi</option>
                    <option value="2" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_RIW_PENYAKIT_DAHULU']=='2'){?> selected="" <?php }?> onclick='document.getElementById("civstaton1").disabled = true'>TB Paru</option>
                    <option value="3" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_RIW_PENYAKIT_DAHULU']!=''&&$_smarty_tpl->getVariable('ases2')->value['FS_RIW_PENYAKIT_DAHULU']!='1'&&$_smarty_tpl->getVariable('ases2')->value['FS_RIW_PENYAKIT_DAHULU']!='2'){?>selected="" <?php }?> onclick='document.getElementById("civstaton1").disabled = false'>Lainnya</option>
                </select>
                <br><br>
                <input type="text" name="FS_RIW_PENYAKIT_DAHULU2" id="civstaton1" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_RIW_PENYAKIT_DAHULU2']=='0'){?>disabled=""<?php }?> size="27" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_RIW_PENYAKIT_DAHULU2'];?>
">
            </td>
            <td width='20%'>Riwayat penyakit keluarga</td>
            <td width='30%'>
                <select name="FS_RIW_PENYAKIT_KEL">
                     <option value=""  <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_RIW_PENYAKIT_KEL']==''){?> selected="" <?php }?> onclick='document.getElementById("civstaton2").disabled = true'>--Pilih Data--</option>
                    <option value="1"  <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_RIW_PENYAKIT_KEL']=='1'){?> selected="" <?php }?> onclick='document.getElementById("civstaton2").disabled = true'>Hipertensi</option>
                    <option value="2"  <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_RIW_PENYAKIT_KEL']=='2'){?> selected="" <?php }?> onclick='document.getElementById("civstaton2").disabled = true'>TB Paru</option>
                    <option value="3" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_RIW_PENYAKIT_KEL']!=''&&$_smarty_tpl->getVariable('ases2')->value['FS_RIW_PENYAKIT_KEL']!='1'&&$_smarty_tpl->getVariable('ases2')->value['FS_RIW_PENYAKIT_KEL']!='2'){?>selected="" <?php }?>onclick='document.getElementById("civstaton2").disabled = false'>Lainnya</option>
                </select>
                <br><br>
                <input type="text" name="FS_RIW_PENYAKIT_KEL2" id="civstaton2"  <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_RIW_PENYAKIT_KEL2']=='0'){?>disabled=""<?php }?> size="27" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_RIW_PENYAKIT_KEL2'];?>
">
            </td>
        </tr>
       
    </table>
    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">Riwayat Alergi</th>
        </tr>
        <tr>
            <td width='20%'>Riwayat Alergi</td>
            <td width='30%'>
                <input type="text" name="FS_ALERGI" size="35" value="<?php echo $_smarty_tpl->getVariable('result')->value['FS_ALERGI'];?>
">
                <em style="color:red">* Wajib Diisi</em>
            </td>
            <td width='20%'>Reaksi Alergi</td>
            <td width='30%'>
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
                <input type="text" name="FS_STATUS_PSIK2" id="civstaton3" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK2']=='0'){?>disabled=""<?php }?> size="27" value="<?php echo $_smarty_tpl->getVariable('ases2')->value['FS_STATUS_PSIK2'];?>
">
            </td>
            <td width='20%'>Hubungan dengan anggota keluarga</td>
            <td width='30%'>
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
                <select name="FS_ST_FUNGSIONAL" id="surat_dari" class="select2" style="width: 170px;">
                    <option value="" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_ST_FUNGSIONAL']==''){?> selected="" <?php }?>>--Pilih Data--</option>
                    <option value="1" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_ST_FUNGSIONAL']=='1'){?> selected="" <?php }?>>Mandiri</option>
                    <option value="2" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_ST_FUNGSIONAL']=='2'){?> selected="" <?php }?>>Perlu Bantuan</option>
                </select>
            </td>
             <td width='20%'>Pengelihatan</td>
            <td width='30%'>
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
                <select name="FS_PENCIUMAN" id="surat_dari" class="select2" style="width: 190px;">
                    <option value="1" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_PENCIUMAN']=='1'){?> selected="" <?php }?>>Normal</option>
                    <option value="2" <?php if ($_smarty_tpl->getVariable('ases2')->value['FS_PENCIUMAN']=='2'){?> selected="" <?php }?>>Tidak Normal</option>

                </select>
            </td>
            <td>Pendengaran</td>
            <td>
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
    
     <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">Skrining Nutrisi</th>
        </tr>
        <tr>
            <td width='20%'>Penurunan berat badan yang tidak diinginkan selama 6 bulan terakhir</td>
            <td width='30%'>
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
    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">Spiritual dan Kultural pasien</th>
        </tr>
        <tr>
            <td width='20%'>Agama</td>
            <td width='30%'>
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
    </table>
     <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">Riwayat Gynekologi</th>
        </tr>
        <tr>
            <td width='20%'>Riwayat Gynekologi</td>
            <td width='30%'>
                <select name="FS_RIWAYAT_GYNEKOLOGI">
                    <option value="1" <?php if ($_smarty_tpl->getVariable('kebidanan')->value['FS_RIWAYAT_GYNEKOLOGI']=='1'){?> selected="" <?php }?> onclick='document.getElementById("civstaton6").disabled = true'>Tidak Ada</option>
                    <option VALUE="2" <?php if ($_smarty_tpl->getVariable('kebidanan')->value['FS_RIWAYAT_GYNEKOLOGI']=='2'){?> selected="" <?php }?> onclick='document.getElementById("civstaton6").disabled = false'>Ada</option>
                </select>
                <br><br>
                <input type="text" name="FS_RIWAYAT_GYNEKOLOGI_KET" id="civstaton6" disabled="" size="32" value="<?php echo $_smarty_tpl->getVariable('kebidanan')->value['FS_RIWAYAT_GYNEKOLOGI_KET'];?>
">
            </td>
            <td width='20%'></td>
            <td width='30%'></td>
        </tr>
    </table>
    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">Riwayat Menstruasi</th>
        </tr>
        <tr>
            <td width='20%'>Umur Menarche</td>
            <td width='30%'>
                <input type="text" name="FS_RIW_MENS_UMUR_MENARCHE" size="32" value="<?php echo $_smarty_tpl->getVariable('kebidanan')->value['FS_RIW_MENS_UMUR_MENARCHE'];?>
"> Tahun
            </td>
            <td width='20%'>Lama Haid</td>
            <td width='30%'>
                <input type="text" name="FS_RIW_MENS_LAMA_HAID" size="32" value="<?php echo $_smarty_tpl->getVariable('kebidanan')->value['FS_RIW_MENS_LAMA_HAID'];?>
"> Hari
            </td>
        </tr>
        <tr>
            <td>Ganti Pembalut</td>
            <td>
                <input type="text" name="FS_RIW_MENS_GANTI_PEMBALUT" size="32" value="<?php echo $_smarty_tpl->getVariable('kebidanan')->value['FS_RIW_MENS_GANTI_PEMBALUT'];?>
"> Kali/Hari
            </td>
            <td>HPM</td>
            <td>
                <input type="text" name="FS_RIW_MENS_HPM" size="10" value="<?php echo $_smarty_tpl->getVariable('kebidanan')->value['FS_RIW_MENS_HPM'];?>
">
            </td>
        </tr>
        <tr>
            <td>Keluhan</td>
            <td>
                <select name="FS_RIW_MENS_KELUHAN">
                    <option value="0"  <?php if ($_smarty_tpl->getVariable('kebidanan')->value['FS_RIW_MENS_KELUHAN']=='0'){?> selected="" <?php }?>onclick='document.getElementById("civstaton7").disabled = true'>Tidak Ada</option>
                    <option value="1"  <?php if ($_smarty_tpl->getVariable('kebidanan')->value['FS_RIW_MENS_KELUHAN']=='1'){?> selected="" <?php }?>onclick='document.getElementById("civstaton7").disabled = true'>Disminorhe</option>
                    <option value="2"  <?php if ($_smarty_tpl->getVariable('kebidanan')->value['FS_RIW_MENS_KELUHAN']=='2'){?> selected="" <?php }?>onclick='document.getElementById("civstaton7").disabled = true'>Spotting</option>
                    <option value="3"  <?php if ($_smarty_tpl->getVariable('kebidanan')->value['FS_RIW_MENS_KELUHAN']=='3'){?> selected="" <?php }?>onclick='document.getElementById("civstaton7").disabled = true'>Menorrhagia</option>
                    <option value="4"  <?php if ($_smarty_tpl->getVariable('kebidanan')->value['FS_RIW_MENS_KELUHAN']=='4'){?> selected="" <?php }?>onclick='document.getElementById("civstaton7").disabled = false'>Lain-lain</option>
                </select>
                <br>
                <br>
                <input type="text" name="FS_RIW_MENS_KELUHAN_KET" id="civstaton7" disabled="" size="32" value="<?php echo $_smarty_tpl->getVariable('kebidanan')->value['FS_RIW_MENS_KELUHAN_KET'];?>
">
            </td>
            <td>HPL</td>
            <td><input type="text" name="FS_RIW_MENS_HPL" size="10" value="<?php echo $_smarty_tpl->getVariable('kebidanan')->value['FS_RIW_MENS_HPL'];?>
"></td>
        </tr>
    </table>
     <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">Riwayat KB</th>
        </tr>
        <tr>
            <td width='20%'>Metode KB yang pernah dipakai</td>
            <td width='30%'>
                1. <input type="text" name="FS_RIW_KB_METODE_1" size="20" value="<?php echo $_smarty_tpl->getVariable('kebidanan')->value['FS_RIW_KB_METODE_1'];?>
"> Lama 
                <input type="text" name="FS_RIW_KB_METODE_LAMA_1" size="8" value="<?php echo $_smarty_tpl->getVariable('kebidanan')->value['FS_RIW_KB_METODE_LAMA_1'];?>
"> Tahun <br><br>
                2. <input type="text" name="FS_RIW_KB_METODE_2" size="20" value="<?php echo $_smarty_tpl->getVariable('kebidanan')->value['FS_RIW_KB_METODE_2'];?>
"> Lama 
                <input type="text" name="FS_RIW_KB_METODE_LAMA_2" size="8" value="<?php echo $_smarty_tpl->getVariable('kebidanan')->value['FS_RIW_KB_METODE_LAMA_2'];?>
"> Tahun
            </td>
            <td width='20%'>Komplikasi dari KB</td>
            <td width='30%'>
                <select name="FS_RIW_KB_KOMPLIKASI">
                    <option value="0" <?php if ($_smarty_tpl->getVariable('kebidanan')->value['FS_RIW_KB_KOMPLIKASI']=='0'){?> selected="" <?php }?> onclick='document.getElementById("civstaton8").disabled = true'>Tidak Ada</option>
                    <option value="1" <?php if ($_smarty_tpl->getVariable('kebidanan')->value['FS_RIW_KB_KOMPLIKASI']=='1'){?> selected="" <?php }?> onclick='document.getElementById("civstaton8").disabled = true'>Perdarahan</option>
                    <option value="2" <?php if ($_smarty_tpl->getVariable('kebidanan')->value['FS_RIW_KB_KOMPLIKASI']=='2'){?> selected="" <?php }?> onclick='document.getElementById("civstaton8").disabled = true'>PID/Radang Panggul</option>
                    <option value="3" <?php if ($_smarty_tpl->getVariable('kebidanan')->value['FS_RIW_KB_KOMPLIKASI']=='3'){?> selected="" <?php }?> onclick='document.getElementById("civstaton8").disabled = false'>Lain-lain</option>
                </select>
                <br>
                <br>
                <input type="text" name="FS_RIW_KB_KOMPLIKASI_KET" id="civstaton8" disabled="" size="32" value="<?php echo $_smarty_tpl->getVariable('kebidanan')->value['FS_RIW_KB_KOMPLIKASI_KET'];?>
">
            </td>
        </tr>
    </table>
     
        <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="4">Kebidanan</th>
        </tr>
        <tr>
            <td width='20%'>Masalah Kebidanan</td>
            <td width='30%'>
                <input type="text" name="FS_MASALAH_KEBIDANAN" size="35" value="<?php echo $_smarty_tpl->getVariable('kebidanan')->value['FS_MASALAH_KEBIDANAN'];?>
">
            </td>
            <td width='20%'>Rencana Kebidanan</td>
            <td width='30%'>
                <input type="text" name="FS_RENCANA_KEBIDANAN" size="35" value="<?php echo $_smarty_tpl->getVariable('kebidanan')->value['FS_RENCANA_KEBIDANAN'];?>
">
            </td>
        </tr>
        <tr class="submit-box">
            <td colspan="4">
                <input type="submit" name="save" value="Simpan" class="edit-button" /> 
            </td>
        </tr>
    </table>
</form>