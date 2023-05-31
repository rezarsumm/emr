<?php /* Smarty version Smarty-3.0.7, created on 2022-06-04 08:51:10
         compiled from "application/views\op/checklist/timeout.html" */ ?>
<?php /*%%SmartyHeaderCode:15334629aba8e328166-65651071%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f4184ddb5060137e504fbeff968bb9b38adf5bbd' => 
    array (
      0 => 'application/views\\op/checklist/timeout.html',
      1 => 1653798837,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15334629aba8e328166-65651071',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?> 
 
<div class="breadcrum">
    <p>
        <a href="#">Catatan Operasi </a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/laporan/');?>
">Check List Keselamatan Operasi</a><span></span>
        <small>Add Data</small>
    </p>
    <div class="clear"></div>
</div> 
<div class="content-entry"> 
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/checklist/add_process3');?>
" method="post" onkeypress="return event.keyCode != 13">
        <input name="FS_KD_REG" id="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />  
        <input name="id"  type="hidden" value="<?php echo $_smarty_tpl->getVariable('id')->value;?>
" />  
            <input name="TGL_LAHIR" id="TGL_LAHIR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['TGL_LAHIR'];?>
" /> 
        <input name="FS_MR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />
        <input name="FS_KD_LAYANAN" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['KODE_BANGSAL'];?>
" />
        <input name="FS_KD_PETUGAS_MEDIS" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_medis'];?>
" />

        <table class="table-info" width="100%">
            <tr class="headrow">
                <th colspan="2">Add Check List Keselamatan Operasi</th>
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
   
        <div class="notification red">
            <p><strong>High Risk :</strong> <?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_HIGH_RISK'])===null||$tmp==='' ? '-' : $tmp);?>
 </p>
            <p><strong>Alergi :</strong> <?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
 (<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_REAK_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
)</p>
            <div class="clear"></div>
        </div>
        <table class="table-input" width="100%" style="text-align: justify;">
         

          

            <tr>
                <td width="20%"><b>TIME OUT</b></td>
                <td width="20%">
                   
                </td>
                <td width="20%"> </td>
                <td width="20%">
                 
                </td>
            </tr>
            <tr><td><B> TIME out (sebelum memulai tindakan )</B></td></tr>
 
            <tr>
               <td colspan="2">Apakah semua anggota memperkenalkan diri ?</td>
               <td width="20%">
                   <input type="checkbox" name="TIME_PERKENALAN_ANGGOTA" value="Ya"  class="form-control">ya 
               </td>
            </tr>
            
            
            
            <tr>
               <td colspan="2">Berapa banyak kehilangan darah diantisipasi ?</td>
               <td width="20%">
                   <input type="text" style="width:350px" name="TIME_ANTISIPASI_HILANG_DARAH" value="<?php echo $_smarty_tpl->getVariable('rs_sign_in2')->value['TIME_ANTISIPASI_HILANG_DARAH'];?>
" class="form-control"> 
               </td>
            </tr>
            
            <tr>
               <td colspan="2">Apakah ada persyaratan peralatan khusus ?</td>
               <td width="20%">
                   <input type="text" style="width:350px" name="TIME_ALAT_KHUSUS" value="<?php echo $_smarty_tpl->getVariable('rs_sign_in2')->value['TIME_ALAT_KHUSUS'];?>
" class="form-control"> 
               </td>
            </tr>
            
            <tr>
               <td colspan="2">Apakah ada persyaratan peralatan khusus ?</td>
               <td width="20%">
                   <input type="text" style="width:350px" name="TIME_ALAT_KHUSUS" value="<?php echo $_smarty_tpl->getVariable('rs_sign_in2')->value['TIME_ALAT_KHUSUS'];?>
" class="form-control"> 
               </td>
            </tr>
            <tr>
               <td colspan="2">Apakah ada langkah kritis ? anda ingin kami bantu?</td>
               <td width="20%">
                   <input type="text" style="width:350px" name="TIME_LANGKAH_KRITIS" value="<?php echo $_smarty_tpl->getVariable('rs_sign_in2')->value['TIME_LANGKAH_KRITIS'];?>
" class="form-control"> 
               </td>
            </tr>
            <tr>
               <td colspan="2">Apakah ada masalah spesifik pasien?</td>
               <td width="20%">
                   <input type="text" style="width:350px" name="TIME_MASALAH_SPESIFIK" value="<?php echo $_smarty_tpl->getVariable('rs_sign_in2')->value['TIME_MASALAH_SPESIFIK'];?>
" class="form-control"> 
               </td>
            </tr>
            <tr>
               <td colspan="2">Derajat ASA pasien?</td>
               <td width="20%">
                   <input type="text" style="width:350px" name="TIME_DERAJAT_ASA" value="<?php echo $_smarty_tpl->getVariable('rs_sign_in2')->value['TIME_DERAJAT_ASA'];?>
"  class="form-control"> 
               </td>
            </tr>
            
            <tr>
               <td colspan="2">Apa pemantauan alat khusus diperlukan ?</td>
               <td width="20%">
                   <input type="text" style="width:350px" name="TIME_PANTAU_ALAT" value="<?php echo $_smarty_tpl->getVariable('rs_sign_in2')->value['TIME_PANTAU_ALAT'];?>
" class="form-control"> 
               </td>
            </tr>
            
            
            <tr>
               <td colspan="2">Apakah sterilitas instrumentasi dikonfirmasi ?</td>
               <td width="20%">
                   <input type="text" style="width:350px" name="TIME_STERIL_INSTRUMEN" value="<?php echo $_smarty_tpl->getVariable('rs_sign_in2')->value['TIME_STERIL_INSTRUMEN'];?>
"  class="form-control"> 
               </td>
            </tr>
            
            <tr>
               <td colspan="2">Apakah ada masalah peralatan ?</td>
               <td width="20%">
                   <input type="text" style="width:350px" name="TIME_MASALAH_ALAT" value="<?php echo $_smarty_tpl->getVariable('rs_sign_in2')->value['TIME_MASALAH_ALAT'];?>
" class="form-control"> 
               </td>
            </tr>
            
            
            <tr>
               <td colspan="2">Apakah luka infeksi telah ditangani ?</td>
               <td width="20%">
                   <input type="checkbox" name="TIME_LOKASI_LUKA" value="Ya" class="form-control">ya 
               </td>
            </tr>
            <tr>
               <td colspan="2">Apakah Profilaksi telah dilakukan ?</td>
               <td width="20%">
                   <input type="checkbox" name="TIME_PROFILAKSI" value="Ya" class="form-control">ya 
               </td>
            </tr>
            
            <tr>
               <td colspan="2">Apakah Hasil Radiologi dipasang ?</td>
               <td width="20%">
                   <input type="checkbox" name="TIME_PROFILAKSI" value="Ya" class="form-control">ya 
               </td>
            </tr>
            <tr>
                <td>
                    Waktu Input 
                </td>
                <td>
                    <input type="datetime-local" name="TIME_WAKTU_ISI" required>
                </td>
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

<table class="table-view" width="100%">
    <tr class="headrow">
        <th colspan="6">List Data </th>
    </tr>
    <tr>
        <th width="25%">Tanggal</th>
        <th width="10%">Nama Operasi </th>
        <th width="10%"> Sign In</th>
        <th width="10%"> Time Out</th>
        <th width="10%"> Sign Out</th>
        <th width="15%">Petugas</th>
      
    </tr>
    <?php  $_smarty_tpl->tpl_vars['cppt'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_sign_in')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cppt']->key => $_smarty_tpl->tpl_vars['cppt']->value){
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['TGL'];?>
  
            <a href="javascript:void(0);" onclick="window.open('<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_inap/cetak_checklist/').($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['cppt']->value['id']));?>
', 'nama_window_pop_up', 'scrollbars=yes,resizeable=no')" class="button-download"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('data')->value['TANGGAL'],"%d %B %Y");?>
</a> 
        </td>
        <td> Pra : <?php echo $_smarty_tpl->tpl_vars['cppt']->value['NAMA_OP'];?>
  </td>
        <td><?php if ($_smarty_tpl->tpl_vars['cppt']->value['NAMA_OP']!=''){?> Selesai <?php }?></td> 
        <td><?php if ($_smarty_tpl->tpl_vars['cppt']->value['TIME_PERKENALAN_ANGGOTA']!=''){?> Selesai  <?php }?>
            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('op/checklist/timeout/').($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['cppt']->value['id']));?>
"  class="button-edit"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('data')->value['TANGGAL'],"%d %B %Y");?>
</a> 
           
        </td> 
         <td><?php if ($_smarty_tpl->tpl_vars['cppt']->value['OUT_MASALAH_ALAT']!=''){?> Selesai  <?php }?>
            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('op/checklist/signout/').($_smarty_tpl->tpl_vars['cppt']->value['FS_KD_REG'])).('/')).($_smarty_tpl->tpl_vars['cppt']->value['id']));?>
"   class="button-edit"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('data')->value['TANGGAL'],"%d %B %Y");?>
</a> 
             </td>
         <td><?php echo $_smarty_tpl->tpl_vars['cppt']->value['NAMALENGKAP'];?>
 </td>
  
  
    </tr>
    <?php }} ?>
</table>
<script>
       $(".select2").select2({
            placeholder: "Pilih",
            allowClear: true
        });
</script>




  