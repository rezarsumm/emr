<?php /* Smarty version Smarty-3.0.7, created on 2023-01-19 10:13:11
         compiled from "application/views\inap/resume/add.html" */ ?>
<?php /*%%SmartyHeaderCode:2405963c8b547c9b382-80652644%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '37717d1b976b32d1bc2e4ebed313277b35e63116' => 
    array (
      0 => 'application/views\\inap/resume/add.html',
      1 => 1674094060,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2405963c8b547c9b382-80652644',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><!-- include javascript -->
<?php $_template = new Smarty_Internal_Template("inap/resume/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of include javascript-->
<div class="breadcrum">
    <p>
        <a href="#">Data Arsip</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/resume/cari');?>
">Resume Pasien Pulang</a><span></span>
        <small>Edit Data</small>
    </p>
    <div class="clear"></div>
</div>
<div class="head-content">
    <div class="head-content-nav">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/resume/add/').($_smarty_tpl->getVariable('rs_pasien')->value['NOREG']));?>
" class="active">Data Resume</a></li>
            <li><a href="#">Data Diagnosis</a></li>
            <li><a href="#">Data Terapi Pasien</a></li>
        </ul>
        <div class="clear"></div>
    </div> 
    <div class="clear"></div>
</div>
<div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/resume/add_process');?>
" method="post">
        <input name="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />
        <input name="FS_MR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />

        <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="2">Add Resume Pasien Pulang</th>
            </tr>
             <tr>
                <td>NAMA</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NAMA_PASIEN'];?>

                </td>
            </tr>
            <tr>
                <td>NO MR</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>

                </td>
            </tr>
            <tr>
                <td>TANGGAL LAHIR</td>
                <td>
                    <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('rs_pasien')->value['TGL_LAHIR'],"%d %b %Y");?>

                </td>
            </tr>
            <tr>
                <td>ALAMAT</td>
                <td><?php echo $_smarty_tpl->getVariable('rs_pasien')->value['ALAMAT'];?>
</td>
            </tr>
        </table>
        <table class="table-input" width="100%">
            <tr>
                <th colspan="2">KELUHAN UTAMA</th>
            </tr>
            <tr>
                <td>Diagnosa Saat Masuk</td>
                <td>
                    <textarea name="FS_KELUHAN_UTAMA" rows="3" cols="100"><?php echo $_smarty_tpl->getVariable('result')->value['FS_DIAGNOSA'];?>
</textarea>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top">Indikasi Di Rawat</td>
                <td style="vertical-align: top" colspan="2">
                    <select name="tembusan[]" multiple id="tembusan" style="width:350px">
                        <option></option>
                    </select>
                    <input type="text" name="FS_KET_INDIKASI" size="25" placeholder="Keterangan Indikasi Dirawat ">
                    <!--<select name="FS_INDIKASI_DIRAWAT" id="opa1">
                        <option value="0">--Pilih--</option>
                        <option value="3">Evalusai Klinis</option>
                        <!--<option value="2">Pemberian Terapi</option>
                        <option value="1">Prosedur Diagnostik / Prosedur Terapi / Tindakan</option>
                    </select>-->
                </td>
            </tr>
            <tr>
                <td>Ringkasan riwayat penyakit / Anamnese</td>
                <td>
                    <textarea name="FS_RIWAYAT_PENYAKIT" rows="3" cols="100">
                        <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->getVariable('result')->value['FS_ANAMNESA']);?>

                    </textarea>
                </td>
            </tr>
            <tr>
                <td>Pemeriksaan fisik Abnormal</td>
                <td>
                    <textarea name="FS_PEMERIKSAAN_FISIK" rows="3" cols="100">
                        <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->getVariable('result')->value['FS_HASIL_PEMERIKSAAN_PENUNJANG']);?>

                    </textarea>
                </td>
            </tr>
             <tr>
                <td>
                    Vital Sign Sebelum Dirawat
                </td>
                <td>
                    Suhu : <input type="text" name="FS_SUHU1" size="10" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_SUHU'];?>
">
                    Nadi : <input type="text" name="FS_NADI1" size="10" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_NADI'];?>
">x/menit
                    R : <input type="text" name="FS_R1" size="10" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_R'];?>
">x/menit
                    TD : <input type="text" name="FS_TD1" size="10" value="<?php echo $_smarty_tpl->getVariable('vs')->value['FS_TD'];?>
">mmHg
                </td>
            </tr>
            <tr>
                <td>Pemeriksaan penunjang terpenting</td>
                <td>
                    <textarea name="FS_PEMERIKSAAN_PENUNJANG" rows="3" cols="100"></textarea>
                </td>
            </tr>
            <tr>
                <td>Terapi / Pengobatan selama di rumah sakit</td>
                <td>
                    <textarea name="FS_TERAPI" rows="3" cols="100"><?php  $_smarty_tpl->tpl_vars['data3'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_obat')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data3']->key => $_smarty_tpl->tpl_vars['data3']->value){
?><?php echo $_smarty_tpl->tpl_vars['data3']->value['FS_NAMA_OBAT'];?>
 <?php echo $_smarty_tpl->tpl_vars['data3']->value['FS_DOSIS_OBAT'];?>
/<?php echo $_smarty_tpl->tpl_vars['data3']->value['FS_INTERVAL'];?>
,<?php }} ?></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Hasil laboratorium belum selesai
                </td>
                <td>
                    <select name="FS_HASIL_LAB">
                        <option value="NULL" onclick='document.getElementById("civstaton1").disabled = true'>-- Pilih --</option>
                        <option value="TIDAK" onclick='document.getElementById("civstaton1").disabled = true'>Tidak Ada</option>
                        <option onclick='document.getElementById("civstaton1").disabled = false'>Ada</option>
                    </select>
                    <input type="text" name="FS_HASIL_LAB" id="civstaton1" disabled="" size="30">
                </td>
            </tr>
            <tr>
                <td>
                    Alergi (reaksi obat)
                </td>
                <td>
                    <select name="FS_ALERGI">
                        <option value="NULL" onclick='document.getElementById("civstaton2").disabled = true'>-- Pilih --</option>
                        <option value="TIDAK" onclick='document.getElementById("civstaton2").disabled = true'>Tidak Ada</option>
                        <option onclick='document.getElementById("civstaton2").disabled = false'>Ada</option>
                    </select>
                    <input type="text" name="FS_ALERGI" id="civstaton2" disabled="" size="30">
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top">Diet</td>
                <td style="vertical-align: top" colspan="2">
                    <select name="tujuan[]" multiple id="tujuan" style="width:350px">
                        <option></option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Instruksi/Anjuran edukasi</td>
                <td>
                    <!--<textarea name="FS_INSTRUKSI" rows="3" cols="30"></textarea>-->
                    <input type='checkbox' name='FS_INSTRUKSI1'  value="YA">Istirahat Cukup<br>  
                    <input type='checkbox' name='FS_INSTRUKSI2'  value="YA">Kontrol Sesuai Waktu Yang Di Anjurkan<br>   
                    <input type='checkbox' name='FS_INSTRUKSI3'  value="YA">Minum Obat Sesuai Anjuran<br>   
                    <input type='checkbox' name='FS_INSTRUKSI4'  value="YA">Tingkatkan Latihan<br>   
                    <input type='checkbox' name='FS_INSTRUKSI5'  value="YA">Hubungi IGD RSU Muhammadiyah Metro bila dalam keadaan gawat darurat<br>   
                </td>
            </tr>
            <tr>
                <td>
                    Pengobatan dilanjutkan
                </td>
                <td>
                    <select name="FS_KD_LAYANAN" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_layanan')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['KODEBAGIAN'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['NAMABAGIAN'];?>
</option>
                        <?php }} ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal Kontrol</td>
                <td>
                    <input name="FD_TGL_KONTROL" type="date" size="10" maxlength="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FD_TGL_UND'])===null||$tmp==='' ? '' : $tmp);?>
"  style="text-align: center;" />
                </td>
            </tr>
            <tr>
                <td>Jam Kontrol</td>
                <td>
                    <input name="FS_JAM_KONTROL" type="text" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_JAM_PESAN_RUANG_MEETING'])===null||$tmp==='' ? '' : $tmp);?>
" size="10" maxlength="10" style="text-align: center"/>
                </td>
            </tr>
            <tr>
                <td>Keterangan Kontrol</td>
                <td>
                    <input name="FS_KET_KONTROL" type="text" value="Di RSU Muhammadiyah Metro" size="100" />
                </td>
            </tr>
            <tr>
                <td>Tanggal Expired Rujukan</td>
                <td>
                  <input name="TGL_EXPIRED_RUJUKAN" type="date" size="25" />
                </td>
              </tr>

              <input type="hidden" name="FS_KD_LAYANAN2">
              <input type="hidden" name="FD_TGL_KONTROL2">
              <input type="hidden" name="FS_JAM_KONTROL2">
              <input type="hidden" name="FS_KET_KONTROL2">
          <!--   <tr>
                <td>
                    Pengobatan dilanjutkan 2
                </td>
                <td>
                    <select name="FS_KD_LAYANAN2" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <?php  $_smarty_tpl->tpl_vars['data2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_layanan')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data2']->key => $_smarty_tpl->tpl_vars['data2']->value){
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data2']->value['KODEBAGIAN'];?>
"><?php echo $_smarty_tpl->tpl_vars['data2']->value['NAMABAGIAN'];?>
</option>
                        <?php }} ?>
                    </select>
                </td>
            </tr> -->
           <!--  <tr>
                <td>Tanggal Kontrol 2</td>
                <td>
                    <input name="FD_TGL_KONTROL2" type="date" size="10" maxlength="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FD_TGL_UND2'])===null||$tmp==='' ? '' : $tmp);?>
"  style="text-align: center;" />
                </td>
            </tr> -->
           <!--  <tr>
                <td>Jam Kontrol 2</td>
                <td>
                    <input name="FS_JAM_KONTROL2" type="text" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_JAM_PESAN_RUANG_MEETING2'])===null||$tmp==='' ? '' : $tmp);?>
" size="10" maxlength="10" style="text-align: center"/>
                </td>
            </tr> -->
          <!--   <tr>
                <td>Keterangan Kontrol 2</td>
                <td>
                    <input name="FS_KET_KONTROL2" type="text" value="Di RSU Muhammadiyah Metro" size="25"/>
                </td>
            </tr> -->
            <tr>
                <td>Diagnosis Utama</td>
                <td>
                    <textarea name="FS_DIAG_UTAMA" rows="3" cols="100"></textarea>
                </td>
            </tr>
            <tr>
                <th colspan="2">KEADAAN PASIEN SAAT PULANG</th>
            </tr>
            <tr>
                <td>
                    Keadaan Umum
                </td>
                <td>
                    <input type='checkbox' name='FS_KEADAAN_UMUM_BAIK' onclick='document.getElementById("civstaton3").disabled = true' value="YA">Baik  
                    <input type='checkbox' name='FS_KEADAAN_UMUM_MASIH_SAKIT' onclick='document.getElementById("civstaton3").disabled = true' value="YA">Masih Sakit   
                    <input type='checkbox' name='FS_KEADAAN_UMUM_SESAK' onclick='document.getElementById("civstaton3").disabled = true' value="YA">Sesak   
                    <input type='checkbox' name='FS_KEADAAN_UMUM_PUCAT' onclick='document.getElementById("civstaton3").disabled = true' value="YA">Pucat   
                    <input type='checkbox' name='FS_KEADAAN_UMUM_LEMAH' onclick='document.getElementById("civstaton3").disabled = true' value="YA">Lemah   
                    <input type='checkbox' name='FS_KEADAAN_UMUM_LAIN' onclick='document.getElementById("civstaton3").disabled = false'>Lain-lain
                    <input type='text' name='FS_KEADAAN_UMUM_LAIN' id="civstaton3" disabled="">
                </td>
            </tr>
            <tr>
                <td>
                    Vital Sign
                </td>
                <td>
                    Suhu : <input type="text" name="FS_SUHU" size="10">
                    Nadi : <input type="text" name="FS_NADI" size="10">x/menit
                    R : <input type="text" name="FS_R" size="10">x/menit
                    TD : <input type="text" name="FS_TD" size="10">mmHg
                </td>
            </tr>
            <tr>
                <td>Pemeriksaan Fisik</td>
                <td>
                    <!--<textarea name="FS_PEM_FISIK" rows="3" cols="30"></textarea>-->
                     <!--<textarea name="FS_PEM_FISIK" rows="3" cols="30"><?php echo (($tmp = @$_smarty_tpl->getVariable('rs_resume')->value['FS_PEM_FISIK'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>-->
                    <input type='checkbox' name='FS_PEM_FISIK1' onclick='document.getElementById("civstaton5").disabled = true' value="YA">Tak Anemis<br>  
                    <input type='checkbox' name='FS_PEM_FISIK2' onclick='document.getElementById("civstaton5").disabled = true' value="YA">Anemis<br>   
                    <input type='checkbox' name='FS_PEM_FISIK3' onclick='document.getElementById("civstaton5").disabled = true' value="YA">Cor Dalam Batas Normal<br>   
                    <input type='checkbox' name='FS_PEM_FISIK4' onclick='document.getElementById("civstaton5").disabled = true' value="YA">Kardiomegali<br>   
                    <input type='checkbox' name='FS_PEM_FISIK5' onclick='document.getElementById("civstaton5").disabled = true' value="YA">Paru Dalam Batas Normal<br>   
                    <input type='checkbox' name='FS_PEM_FISIK8' onclick='document.getElementById("civstaton5").disabled = true' value="YA">Abdomen Dalam Batas Normal<br>   
                    <input type='checkbox' name='FS_PEM_FISIK6' onclick='document.getElementById("civstaton5").disabled = true' value="YA">Ekstremitas Dalam Batas Normal<br>   
                    <input type='checkbox' name='FS_PEM_FISIK7' onclick='document.getElementById("civstaton5").disabled = false' value="YA">Lainnya  
                     <input type='text' name='FS_PEM_FISIK7' id="civstaton5" disabled="">
                </td>
            </tr>
            <!--<tr>
                <td>Catatan Hal Penting</td>
                <td>
                    <textarea name="FS_CAT_HAL_PENTING" rows="3" cols="30"></textarea>
                </td>
            </tr>-->
            <tr>
                <td>Tanggal Pulang</td>
                <td>
                    <input name="FD_TGL_PULANG" type="text" size="10" maxlength="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FD_TGL_UND'])===null||$tmp==='' ? '' : $tmp);?>
" class="tanggal" style="text-align: center;" />
                </td>
            </tr>
            <tr>
                <td>
                    Cara Pulang
                </td>
                <td>
                    <select name="FS_CARA_PULANG">
                        <option value="" onclick='document.getElementById("civstaton4").disabled = true'>-- Pilih --</option>
                        <option value="1" onclick='document.getElementById("civstaton4").disabled = true'>Sembuh</option>
                        <option value="2" onclick='document.getElementById("civstaton4").disabled = true'>Tampak Masih Sakit</option>
                        <option value="3" onclick='document.getElementById("civstaton4").disabled = true'>Pulang Atas Permintaan Sendiri</option>
                        <option value="4" onclick='document.getElementById("civstaton4").disabled = true'>Meninggal</option>
                        <option value="5" onclick='document.getElementById("civstaton4").disabled = true'>Pindah Rumah Sakit</option>
                        <option onclick='document.getElementById("civstaton4").disabled = false'>Lain-Lain</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Keterangan Cara Pulang
                </td>
                <td>
                    <input type="text" name="FS_KET_CARA_PULANG" size="27"> <em>* Wajib Diisi Jika Pasien Kondisi Dirujuk (Dirujuk Kemana),APS(alasan apa) atau Meninggal(diagnosa apa)</em>
                </td>
            </tr>
            <tr class="submit-box">
                <td colspan="2">
                    <input type="submit" name="save" value="Lanjutkan & Simpan" class="edit-button" style="float:right;"/>
                </td>
            </tr>
        </table>
    </form>
</div>