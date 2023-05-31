<?php /* Smarty version Smarty-3.0.7, created on 2023-01-19 09:07:22
         compiled from "application/views\inap/resume/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:1125163c8a5da3c9f94-75165603%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '204c0218a3b3863dcba49a83e817555a0334e4f2' => 
    array (
      0 => 'application/views\\inap/resume/edit.html',
      1 => 1674094040,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1125163c8a5da3c9f94-75165603',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><!-- include javascript -->
<?php $_template = new Smarty_Internal_Template("inap/resume/edit_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
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
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/resume/add_diagnosis/').($_smarty_tpl->getVariable('rs_pasien')->value['NOREG']));?>
">Data Diagnosis</a></li>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/resume/add_terapi/').($_smarty_tpl->getVariable('rs_pasien')->value['NOREG']));?>
">Data Terapi Pasien</a></li>
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
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/resume/edit_process');?>
" method="post">
        <input name="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />
        <input name="FS_MR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />

        <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="2">Edit Resume Pasien Pulang</th>
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
                    <input type="hidden" name="FS_KELUHAN_UTAMA_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_KELUHAN_UTAMA'];?>
">
                    <textarea name="FS_KELUHAN_UTAMA" rows="3" cols="100"><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_KELUHAN_UTAMA'];?>
</textarea>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top">Indikasi Di Rawat</td>
                <td style="vertical-align: top" colspan="2">
                    <select name="tembusan[]" multiple id="tembusan" style="width:350px">
                        <option></option>
                    </select>

                    <input type="hidden" name="INDIKASI_RAWAT_0" value="<?php echo $_smarty_tpl->getVariable('indikasi')->value;?>
">
                    <input type="hidden" name="DIET_0" value="<?php echo $_smarty_tpl->getVariable('diet')->value;?>
">
                    <input type="hidden" name="DIAG_SEKUNDER_0" value="<?php echo $_smarty_tpl->getVariable('diagn')->value;?>
">
                    <input type="hidden" name="TINDAKAN_0" value="<?php echo $_smarty_tpl->getVariable('tindak')->value;?>
">
                    <input type="hidden" name="PULANG_TERAPI_0" value="<?php echo $_smarty_tpl->getVariable('terapi')->value;?>
">

                    <input type="hidden" name="FS_KET_INDIKASI_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_KET_INDIKASI'];?>
">
                    <input type="text" name="FS_KET_INDIKASI" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_KET_INDIKASI'];?>
" size="25" placeholder="Keterangan Indikasi Dirawat ">

                    <!--<td>Indikasi Di Rawat</td>
                    <td> 
                        <select name="FS_INDIKASI_DIRAWAT" id="opa1">
                            <option value="0" >--Pilih--</option>
                            <option value="3" <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_INDIKASI_DIRAWAT'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1==3){?>selected="selected"<?php }?>>Evalusai Klinis</option>
                    <!-- <option value="2" <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_INDIKASI_DIRAWAT'];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2==2){?>selected="selected"<?php }?>>Pemberian Terapi</option>
                     <option value="1" <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_INDIKASI_DIRAWAT'];?>
<?php $_tmp3=ob_get_clean();?><?php if ($_tmp3==1){?>selected="selected"<?php }?>>Prosedur Diagnostik / Prosedur Terapi / Tindakan</option>
                 </select>
             </td>-->
            </tr>
            <tr>
                <td>Ringkasan riwayat penyakit / Anamnese</td>
                <td>
                    <input type="hidden" name="FS_RIWAYAT_PENYAKIT_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_RIWAYAT_PENYAKIT'];?>
">
                    <textarea name="FS_RIWAYAT_PENYAKIT" rows="3" cols="100"><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_RIWAYAT_PENYAKIT'];?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>Pemeriksaan fisik Abnormal</td>
                <td><input type="hidden" name="FS_PEMERIKSAAN_FISIK_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_PEMERIKSAAN_FISIK'];?>
">
                    <textarea name="FS_PEMERIKSAAN_FISIK" rows="3" cols="100"><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_PEMERIKSAAN_FISIK'];?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Vital Sign Sebelum Dirawat
                </td>
                <td>
                    <input type="hidden" name="FS_SUHU1_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_SUHU1'];?>
">
                    <input type="hidden" name="FS_NADI1_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_NADI1'];?>
">
                    <input type="hidden" name="FS_R1_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_R1'];?>
">
                    <input type="hidden" name="FS_TD1_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_TD1'];?>
">

                    Suhu : <input type="text" name="FS_SUHU1" size="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_resume')->value['FS_SUHU1'])===null||$tmp==='' ? '' : $tmp);?>
">
                    Nadi : <input type="text" name="FS_NADI1" size="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_resume')->value['FS_NADI1'])===null||$tmp==='' ? '' : $tmp);?>
">x/menit
                    R : <input type="text" name="FS_R1" size="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_resume')->value['FS_R1'])===null||$tmp==='' ? '' : $tmp);?>
">x/menit
                    TD : <input type="text" name="FS_TD1" size="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_resume')->value['FS_TD1'])===null||$tmp==='' ? '' : $tmp);?>
">mmHg
                </td>
            </tr>
            <tr>
                <td>Pemeriksaan penunjang terpenting</td>
                <td>
                    <input type="hidden" name="FS_PEMERIKSAAN_PENUNJANG_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_PEMERIKSAAN_PENUNJANG'];?>
">
                    <textarea name="FS_PEMERIKSAAN_PENUNJANG" rows="3" cols="100"><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_PEMERIKSAAN_PENUNJANG'];?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>Terapi / Pengobatan selama di rumah sakit</td>
                <td>
                    <input type="hidden" name="FS_TERAPI_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_TERAPI'];?>
">
                    <textarea name="FS_TERAPI" rows="3" cols="100"><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_TERAPI'];?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Hasil laboratorium belum selesai
                </td>
                <td>
                    <input type="hidden" name="FS_HASIL_LAB_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_HASIL_LAB'];?>
">
                    <select name="FS_HASIL_LAB">
                        <option value="NULL" <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_HASIL_LAB'];?>
<?php $_tmp4=ob_get_clean();?><?php if ($_tmp4=='NULL'){?>selected="selected"<?php }?> onclick='document.getElementById("civstaton1").disabled = true'>-- Pilih --</option>
                        <option value="TIDAK" <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_HASIL_LAB'];?>
<?php $_tmp5=ob_get_clean();?><?php if ($_tmp5=='TIDAK'){?>selected="selected"<?php }?> onclick='document.getElementById("civstaton1").disabled = true'>Tidak Ada</option>
                        <option <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_HASIL_LAB'];?>
<?php $_tmp6=ob_get_clean();?><?php if ($_tmp6!='NULL'){?> && <?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_HASIL_LAB'];?>
 neq 'TIDAK'}selected="selected"<?php }?>onclick='document.getElementById("civstaton1").disabled = false'>Ada</option>
                    </select>
                    <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_HASIL_LAB'];?>
<?php $_tmp7=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_HASIL_LAB'];?>
<?php $_tmp8=ob_get_clean();?><?php if ($_tmp7!='NULL'&&$_tmp8!='TIDAK'){?>
                    <input type="text" name="FS_HASIL_LAB" id="civstaton1" value='<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_HASIL_LAB'];?>
' size="30">
                    <?php }else{?><?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_HASIL_LAB'];?>
<?php $_tmp9=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_HASIL_LAB'];?>
<?php $_tmp10=ob_get_clean();?><?php if ($_tmp9!='NULL'||$_tmp10!='TIDAK'){?>
                    <input type="text" name="FS_HASIL_LAB" id="civstaton1" disabled="" size="30">
                    <?php }}?>
                </td>
            </tr>
            <tr>
                <td>
                    Alergi (reaksi obat)
                </td>
                <td>
                    <input type="hidden" name="FS_ALERGI_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_ALERGI'];?>
">
                    <select name="FS_ALERGI">
                        <option value="NULL" <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_ALERGI'];?>
<?php $_tmp11=ob_get_clean();?><?php if ($_tmp11=='NULL'){?>selected="selected"<?php }?> onclick='document.getElementById("civstaton2").disabled = true'>-- Pilih --</option>
                        <option value="TIDAK" <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_ALERGI'];?>
<?php $_tmp12=ob_get_clean();?><?php if ($_tmp12=='TIDAK'){?>selected="selected"<?php }?> onclick='document.getElementById("civstaton2").disabled = true'>Tidak Ada</option>
                        <option <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_ALERGI'];?>
<?php $_tmp13=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_ALERGI'];?>
<?php $_tmp14=ob_get_clean();?><?php if ($_tmp13!='NULL'&&$_tmp14!='TIDAK'){?>selected="selected"<?php }?> onclick='document.getElementById("civstaton2").disabled = false'>Ada</option>
                    </select>
                    <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_ALERGI'];?>
<?php $_tmp15=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_ALERGI'];?>
<?php $_tmp16=ob_get_clean();?><?php if ($_tmp15!='NULL'&&$_tmp16!='TIDAK'){?>
                    <input type="text" name="FS_ALERGI" id="civstaton2" size="30" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_ALERGI'];?>
">
                    <?php }else{?><?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_ALERGI'];?>
<?php $_tmp17=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_ALERGI'];?>
<?php $_tmp18=ob_get_clean();?><?php if ($_tmp17!='NULL'||$_tmp18!='TIDAK'){?>
                    <input type="text" name="FS_ALERGI" id="civstaton2" disabled="" size="30">
                    <?php }}?>
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
                    <input type="hidden" name="FS_INSTRUKSI1_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_INSTRUKSI1'];?>
">
                    <input type="hidden" name="FS_INSTRUKSI2_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_INSTRUKSI2'];?>
">
                    <input type="hidden" name="FS_INSTRUKSI3_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_INSTRUKSI3'];?>
">
                    <input type="hidden" name="FS_INSTRUKSI4_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_INSTRUKSI4'];?>
">
                    <input type="hidden" name="FS_INSTRUKSI5_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_INSTRUKSI5'];?>
">
                    <!-- <textarea name="FS_INSTRUKSI" rows="3" cols="30"><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_INSTRUKSI'];?>
</textarea>-->
                    <input type='checkbox' name='FS_INSTRUKSI1' <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_INSTRUKSI1'];?>
<?php $_tmp19=ob_get_clean();?><?php if ($_tmp19=='YA'){?>checked="checked"<?php }?>  value="YA">Istirahat Cukup <br>  
                    <input type='checkbox' name='FS_INSTRUKSI2' <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_INSTRUKSI2'];?>
<?php $_tmp20=ob_get_clean();?><?php if ($_tmp20=='YA'){?>checked="checked"<?php }?> value="YA">Kontrol Sesuai Waktu Di Anjurkan<br> 
                    <input type='checkbox' name='FS_INSTRUKSI3' <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_INSTRUKSI3'];?>
<?php $_tmp21=ob_get_clean();?><?php if ($_tmp21=='YA'){?>checked="checked"<?php }?>  value="YA">Minum Obat Sesuai Anjuran <br>
                    <input type='checkbox' name='FS_INSTRUKSI4' <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_INSTRUKSI4'];?>
<?php $_tmp22=ob_get_clean();?><?php if ($_tmp22=='YA'){?>checked="checked"<?php }?>  value="YA">Tingkatkan Latihan <br>
                    <input type='checkbox' name='FS_INSTRUKSI5' <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_INSTRUKSI5'];?>
<?php $_tmp23=ob_get_clean();?><?php if ($_tmp23=='YA'){?>checked="checked"<?php }?>  value="YA"> Hubungi IGD RSU Muhammadiyah Metro bila dalam keadaan gawat darurat

                </td>
            </tr>
            <tr>
                <td>
                    Pengobatan dilanjutkan
                </td>
                <td>
                    <input type="hidden" name="FS_KD_LAYANAN_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_KD_LAYANAN'];?>
">
                    <select name="FS_KD_LAYANAN" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_layanan')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['KODE_MASUK'];?>
" <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_KD_LAYANAN'];?>
<?php $_tmp24=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data']->value['KODE_MASUK'];?>
<?php $_tmp25=ob_get_clean();?><?php if ($_tmp24==$_tmp25){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['data']->value['KET_MASUK'];?>
</option>
                        <?php }} ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal Kontrol</td>
                <td>
                    <input type="hidden" name="FD_TGL_KONTROL_0" value="<?php echo date('Y-m-d',strtotime($_smarty_tpl->getVariable('rs_resume')->value['FD_TGL_KONTROL']));?>
">
                    <input name="FD_TGL_KONTROL" type="date" size="10" maxlength="10"  value="<?php echo date('Y-m-d',strtotime($_smarty_tpl->getVariable('rs_resume')->value['FD_TGL_KONTROL']));?>
"  style="text-align: center;" />


                </td>
            </tr>
            <tr>
                <td>Jam Kontrol</td>
                <td>
                    <input type="hidden" name="FS_JAM_KONTROL_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_JAM_KONTROL'];?>
">
                    <input name="FS_JAM_KONTROL" type="text" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_resume')->value['FS_JAM_KONTROL'])===null||$tmp==='' ? '' : $tmp);?>
" size="10" maxlength="10" style="text-align: center"/>
                </td>
            </tr>
            <tr>
                <td>Keterangan Kontrol</td>
                <td>
                    <input type="hidden" name="FS_KET_KONTROL_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_KET_KONTROL'];?>
">
                    <input name="FS_KET_KONTROL" type="text" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_resume')->value['FS_KET_KONTROL'])===null||$tmp==='' ? '' : $tmp);?>
" size="100" />
                </td>
            </tr>
                 <tr>
                <td>Tanggal Expired Rujukan</td>
                <td>
                  <input name="TGL_EXPIRED_RUJUKAN" type="date" size="25" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['TGL_EXPIRED_RUJUKAN'];?>
"/>
                </td>
              </tr>

                <input type="hidden" name="FS_KD_LAYANAN2">
                <input type="hidden" name="FS_KD_LAYANAN2_0">
              <input type="hidden" name="FD_TGL_KONTROL2">
              <input type="hidden" name="FD_TGL_KONTROL2_0">
              <input type="hidden" name="FS_JAM_KONTROL2">
              <input type="hidden" name="FS_JAM_KONTROL2_0">
              <input type="hidden" name="FS_KET_KONTROL2">
              <input type="hidden" name="FS_KET_KONTROL2_0">
          <!--   <tr>
                <td>
                    Pengobatan dilanjutkan 2
                </td>
                <td>
                    <input type="hidden" name="FS_KD_LAYANAN2_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_KD_LAYANAN2'];?>
">
                    <select name="FS_KD_LAYANAN2" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <?php  $_smarty_tpl->tpl_vars['data2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_layanan')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data2']->key => $_smarty_tpl->tpl_vars['data2']->value){
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data2']->value['KODE_MASUK'];?>
" <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_KD_LAYANAN2'];?>
<?php $_tmp26=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data2']->value['KODE_MASUK'];?>
<?php $_tmp27=ob_get_clean();?><?php if ($_tmp26==$_tmp27){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['data2']->value['KET_MASUK'];?>
</option>
                        <?php }} ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal Kontrol 2</td>
                <td>
                    <input type="hidden" name="FD_TGL_KONTROL2_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FD_TGL_KONTROL2'];?>
">
                    <input name="FD_TGL_KONTROL2" type="date" size="10" maxlength="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_resume')->value['FD_TGL_KONTROL2'])===null||$tmp==='' ? '' : $tmp);?>
"  style="text-align: center;" />
                </td>
            </tr>
            <tr>
                <td>Jam Kontrol 2</td>
                <td>
                    <input type="hidden" name="FS_JAM_KONTROL2_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_JAM_KONTROL2'];?>
">
                    <input name="FS_JAM_KONTROL2" type="text" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_resume')->value['FS_JAM_KONTROL2'])===null||$tmp==='' ? '' : $tmp);?>
" size="10" maxlength="10" style="text-align: center"/>
                </td>
            </tr>
            <tr>
                <td>Keterangan Kontrol 2</td>
                <td>
                    <input type="hidden" name="FS_KET_KONTROL2_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_KET_KONTROL2'];?>
">
                    <input name="FS_KET_KONTROL2" type="text" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_resume')->value['FS_KET_KONTROL2'])===null||$tmp==='' ? '' : $tmp);?>
" size="25" />
                </td>
            </tr> -->
            <tr>
                <td>Diagnosis Utama</td>
                <td>
                    <input type="hidden" name="FS_DIAG_UTAMA_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_DIAG_UTAMA'];?>
">
                    <textarea name="FS_DIAG_UTAMA" rows="3" cols="100"><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_DIAG_UTAMA'];?>
</textarea>
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
                    <input type="hidden" name="FS_KEADAAN_UMUM_BAIK_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_KEADAAN_UMUM_BAIK'];?>
">
                    <input type="hidden" name="FS_KEADAAN_UMUM_MASIH_SAKIT_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_KEADAAN_UMUM_MASIH_SAKIT'];?>
">
                    <input type="hidden" name="FS_KEADAAN_UMUM_SESAK_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_KEADAAN_UMUM_SESAK'];?>
">
                    <input type="hidden" name="FS_KEADAAN_UMUM_PUCAT_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_KEADAAN_UMUM_PUCAT'];?>
">
                    <input type="hidden" name="FS_KEADAAN_UMUM_LEMAH_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_KEADAAN_UMUM_LEMAH'];?>
">
                    <input type="hidden" name="FS_KEADAAN_UMUM_LAIN_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_KEADAAN_UMUM_LAIN'];?>
">

                         <input type='checkbox' name='FS_KEADAAN_UMUM_BAIK' <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_KEADAAN_UMUM_BAIK'];?>
<?php $_tmp28=ob_get_clean();?><?php if ($_tmp28=='YA'){?>checked="checked"<?php }?> onclick='document.getElementById("civstaton3").disabled = true' value="YA">Baik  
                           <input type='checkbox' name='FS_KEADAAN_UMUM_MASIH_SAKIT' <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_KEADAAN_UMUM_MASIH_SAKIT'];?>
<?php $_tmp29=ob_get_clean();?><?php if ($_tmp29=='YA'){?>checked="checked"<?php }?> onclick='document.getElementById("civstaton3").disabled = true' value="YA">Masih Sakit   
                           <input type='checkbox' name='FS_KEADAAN_UMUM_SESAK' <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_KEADAAN_UMUM_SESAK'];?>
<?php $_tmp30=ob_get_clean();?><?php if ($_tmp30=='YA'){?>checked="checked"<?php }?> onclick='document.getElementById("civstaton3").disabled = true' value="YA">Sesak   
                           <input type='checkbox' name='FS_KEADAAN_UMUM_PUCAT' <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_KEADAAN_UMUM_PUCAT'];?>
<?php $_tmp31=ob_get_clean();?><?php if ($_tmp31=='YA'){?>checked="checked"<?php }?> onclick='document.getElementById("civstaton3").disabled = true' value="YA">Pucat   
                           <input type='checkbox' name='FS_KEADAAN_UMUM_LEMAH' <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_KEADAAN_UMUM_LEMAH'];?>
<?php $_tmp32=ob_get_clean();?><?php if ($_tmp32=='YA'){?>checked="checked"<?php }?> onclick='document.getElementById("civstaton3").disabled = true' value="YA">Lemah   
                           <input type='checkbox' name='FS_KEADAAN_UMUM_LAIN' <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_KEADAAN_UMUM_LAIN'];?>
<?php $_tmp33=ob_get_clean();?><?php if ($_tmp33!=0){?>checked="checked"<?php }?> onclick='document.getElementById("civstaton3").disabled = false'>lain-lain
                           <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_KEADAAN_UMUM_LAIN'];?>
<?php $_tmp34=ob_get_clean();?><?php if ($_tmp34!=0){?>
                           <input type='text' name='FS_KEADAAN_UMUM_LAIN' id="civstaton3" value='<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_KEADAAN_UMUM_LAIN'];?>
'>
                    <?php }else{ ?>
                    <input type='text' name='FS_KEADAAN_UMUM_LAIN' id="civstaton3" disabled="">
                    <?php }?>
                     
                </td>
            </tr>
            <tr>
                <td>
                    Vital Sign
                </td>
                <td>
                    <input type="hidden" name="FS_SUHU_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_SUHU'];?>
">
                    <input type="hidden" name="FS_NADI_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_NADI'];?>
">
                    <input type="hidden" name="FS_R_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_R'];?>
">
                    <input type="hidden" name="FS_TD_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_TD'];?>
">

                    Suhu : <input type="text" name="FS_SUHU" size="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_resume')->value['FS_SUHU'])===null||$tmp==='' ? '' : $tmp);?>
">
                    Nadi : <input type="text" name="FS_NADI" size="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_resume')->value['FS_NADI'])===null||$tmp==='' ? '' : $tmp);?>
">x/menit
                    R : <input type="text" name="FS_R" size="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_resume')->value['FS_R'])===null||$tmp==='' ? '' : $tmp);?>
">x/menit
                    TD : <input type="text" name="FS_TD" size="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_resume')->value['FS_TD'])===null||$tmp==='' ? '' : $tmp);?>
">mmHg
                </td>
            </tr>
            <tr>
                <td>Pemeriksaan Fisik</td>
                <td>
                    <input type="hidden" name="FS_PEM_FISIK1_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_PEM_FISIK1'];?>
">
                    <input type="hidden" name="FS_PEM_FISIK2_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_PEM_FISIK2'];?>
">
                    <input type="hidden" name="FS_PEM_FISIK3_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_PEM_FISIK3'];?>
">
                    <input type="hidden" name="FS_PEM_FISIK4_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_PEM_FISIK4'];?>
">
                    <input type="hidden" name="FS_PEM_FISIK5_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_PEM_FISIK5'];?>
">
                    <input type="hidden" name="FS_PEM_FISIK6_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_PEM_FISIK6'];?>
">
                    <input type="hidden" name="FS_PEM_FISIK7_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_PEM_FISIK7'];?>
">
                    <input type="hidden" name="FS_PEM_FISIK8_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_PEM_FISIK8'];?>
">


                    <!--<textarea name="FS_PEM_FISIK" rows="3" cols="30"><?php echo (($tmp = @$_smarty_tpl->getVariable('rs_resume')->value['FS_PEM_FISIK'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>-->
                    <input type='checkbox' name='FS_PEM_FISIK1'  <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_PEM_FISIK1'];?>
<?php $_tmp35=ob_get_clean();?><?php if ($_tmp35=='YA'){?>checked="checked"<?php }?> onclick='document.getElementById("civstaton5").disabled = true' value="YA">Tak Anemis<br>  
                    <input type='checkbox' name='FS_PEM_FISIK2'  <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_PEM_FISIK2'];?>
<?php $_tmp36=ob_get_clean();?><?php if ($_tmp36=='YA'){?>checked="checked"<?php }?>onclick='document.getElementById("civstaton5").disabled = true' value="YA">Anemis<br>   
                    <input type='checkbox' name='FS_PEM_FISIK3'  <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_PEM_FISIK3'];?>
<?php $_tmp37=ob_get_clean();?><?php if ($_tmp37=='YA'){?>checked="checked"<?php }?>onclick='document.getElementById("civstaton5").disabled = true' value="YA">Cor Dalam Batas Normal<br>   
                    <input type='checkbox' name='FS_PEM_FISIK4'  <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_PEM_FISIK4'];?>
<?php $_tmp38=ob_get_clean();?><?php if ($_tmp38=='YA'){?>checked="checked"<?php }?>onclick='document.getElementById("civstaton5").disabled = true' value="YA">Kardiomegali<br>   
                    <input type='checkbox' name='FS_PEM_FISIK5'  <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_PEM_FISIK5'];?>
<?php $_tmp39=ob_get_clean();?><?php if ($_tmp39=='YA'){?>checked="checked"<?php }?>onclick='document.getElementById("civstaton5").disabled = true' value="YA">Paru Dalam Batas Normal<br>   
                    <input type='checkbox' name='FS_PEM_FISIK5'  <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_PEM_FISIK8'];?>
<?php $_tmp40=ob_get_clean();?><?php if ($_tmp40=='YA'){?>checked="checked"<?php }?>onclick='document.getElementById("civstaton5").disabled = true' value="YA">Abdomen Dalam Batas Normal<br>   
                    <input type='checkbox' name='FS_PEM_FISIK6'  <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_PEM_FISIK6'];?>
<?php $_tmp41=ob_get_clean();?><?php if ($_tmp41=='YA'){?>checked="checked"<?php }?>onclick='document.getElementById("civstaton5").disabled = true' value="YA">Ekstremitas Dalam Batas Normal<br>   
                    <input type='checkbox' name='FS_PEM_FISIK7'  <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_PEM_FISIK7'];?>
<?php $_tmp42=ob_get_clean();?><?php if ($_tmp42!='YA'&&$_smarty_tpl->getVariable('rs_resume')->value['FS_PEM_FISIK7']){?> neq '0'}checked="checked"<?php }?>onclick='document.getElementById("civstaton5").disabled = false' value="YA">Lainnya  
                           <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_PEM_FISIK7'];?>
<?php $_tmp43=ob_get_clean();?><?php if ($_tmp43=='YA'&&$_smarty_tpl->getVariable('rs_resume')->value['FS_PEM_FISIK7']){?> neq '0'}
                           <input type='text' name='FS_PEM_FISIK7' id="civstaton5" disabled>
                    <?php }else{ ?>
                    <input type='text' name='FS_PEM_FISIK7' id="civstaton5" value='<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_PEM_FISIK7'];?>
'>
                    <?php }?>

                </td>
            </tr>
            <!--<tr>
                <td>Catatan Hal Penting</td>
                <td>
                    <textarea name="FS_CAT_HAL_PENTING" rows="3" cols="30"><?php echo (($tmp = @$_smarty_tpl->getVariable('rs_resume')->value['FS_CAT_HAL_PENTING'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
                </td>
            </tr>-->
            <tr>
                <td>Tanggal Pulang</td>
                <td>
                    <input type="hidden" name="FD_TGL_PULANG_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FD_TGL_PULANG'];?>
">
                    <input name="FD_TGL_PULANG" type="text" size="10" maxlength="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_resume')->value['FD_TGL_PULANG'])===null||$tmp==='' ? '' : $tmp);?>
" class="tanggal" style="text-align: center;" />
                </td>
            </tr>
            <tr>
                <td>
                    Cara Pulang
                </td>
                <td>
                    <input type="hidden" name="PERAWAT_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['MDB'];?>
">
                    <input type="hidden" name="DOKTER_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['MDB'];?>
">
                    <input type="hidden" name="FS_CARA_PULANG_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_CARA_PULANG'];?>
">
                    <input type="hidden" name="FS_SEBAB_KEMATIAN_0" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_SEBAB_KEMATIAN'];?>
">
                    <select name="FS_CARA_PULANG">
                        <option value="0" <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_CARA_PULANG'];?>
<?php $_tmp44=ob_get_clean();?><?php if ($_tmp44=='0'){?>selected="selected"<?php }?> onclick='document.getElementById("civstaton4").disabled = true'>-- Pilih --</option>
                        <option value="1" <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_CARA_PULANG'];?>
<?php $_tmp45=ob_get_clean();?><?php if ($_tmp45=='1'){?>selected="selected"<?php }?>onclick='document.getElementById("civstaton4").disabled = true'>Sembuh</option>
                        <option value="2" <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_CARA_PULANG'];?>
<?php $_tmp46=ob_get_clean();?><?php if ($_tmp46=='2'){?>selected="selected"<?php }?>onclick='document.getElementById("civstaton4").disabled = true'>Tampak Masih Sakit</option>
                        <option value="3" <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_CARA_PULANG'];?>
<?php $_tmp47=ob_get_clean();?><?php if ($_tmp47=='3'){?>selected="selected"<?php }?>onclick='document.getElementById("civstaton4").disabled = true'>Pulang Atas Permintaan Sendiri</option>
                        <option value="4" <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_CARA_PULANG'];?>
<?php $_tmp48=ob_get_clean();?><?php if ($_tmp48=='4'){?>selected="selected"<?php }?>onclick='document.getElementById("civstaton4").disabled = true'>Meninggal</option>
                        <option value="5" <?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_CARA_PULANG'];?>
<?php $_tmp49=ob_get_clean();?><?php if ($_tmp49=='5'){?>selected="selected"<?php }?>onclick='document.getElementById("civstaton4").disabled = true'>Pindah Rumah Sakit</option>
                        <option onclick='document.getElementById("civstaton4").disabled = false'>Lain-Lain</option>
                    </select>

                    <input type="text" name="FS_CARA_PULANG" id="civstaton4" disabled="" size="30">
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