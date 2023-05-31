<?php /* Smarty version Smarty-3.0.7, created on 2022-10-15 12:24:46
         compiled from "application/views\inap/cppt/delete.html" */ ?>
<?php /*%%SmartyHeaderCode:26292634a441e3616d8-31677235%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b27768f0cb229832452990e4a3101ea14092199' => 
    array (
      0 => 'application/views\\inap/cppt/delete.html',
      1 => 1664954780,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26292634a441e3616d8-31677235',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("inap/cppt/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
 
<div class="breadcrum">
    <p>
        <a href="#">Catatan Rawat Inap</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/cppt/');?>
">CPPT</a><span></span>
        <small>Edit Data</small>
    </p>
    <div class="clear"></div>
</div> 
<div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/cppt/delete_process');?>
" method="post" onkeypress="return event.keyCode != 13">
        <input name="FS_KD_REG" id="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />
        <input name="FS_MR" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
" />
        <input name="FS_KD_LAYANAN" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['KODE_BANGSAL'];?>
" />
        <input name="FS_KD_PETUGAS_MEDIS" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fs_kd_medis'];?>
" />
        <input name="FS_KD_TRS" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_cppt')->value['FS_KD_TRS'];?>
" />
        <input name="FS_KD_KP" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_cppt')->value['FS_KD_KP'];?>
" />
        <input name="FS_LAB" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_cppt')->value['FS_LAB'];?>
" />
        <input name="FS_RAD" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_cppt')->value['FS_RAD'];?>
" />
        

        <table class="table-info" width="100%">
            <tr class="headrow">
                <th colspan="2">Edit CPPT</th>
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
            <tr>
                <td>UMUR</td>
                <td><?php echo $_smarty_tpl->getVariable('rs_pasien')->value['fn_umur'];?>
 tahun</td>
            </tr>
        </table>
      
        <!-- <div class="notification red">
            <p><strong>High Risk :</strong> <?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_HIGH_RISK'])===null||$tmp==='' ? '-' : $tmp);?>
 </p>
            <p><strong>Alergi :</strong> <?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
 (<?php echo (($tmp = @$_smarty_tpl->getVariable('rs_pasien')->value['FS_REAK_ALERGI'])===null||$tmp==='' ? '-' : $tmp);?>
)</p>
            <div class="clear"></div>
        </div> -->
        <table class="table-input" width="100%" style="text-align: justify;">
           <tr>
                <th colspan="4"><center style="color:red">Anda Yakin Ingin menghapus CPPT ini ?</center></th> 
            </tr>
            <tr>
                <td width="13%">S / A / S</td>
                <td width="87%">
                    <textarea name="FS_CPPT_S" rows="1" cols="100%"  onkeypress="handle5(event)" class="form-control anamnesa"> <?php echo $_smarty_tpl->getVariable('rs_cppt')->value['FS_CPPT_S'];?>
</textarea>
                </td>
            </tr>
            <tr>
                <td >O / D / B</td>
                <td > 
                    <textarea name="FS_CPPT_O" rows="1" cols="100%"  onkeypress="handle5(event)" class="form-control anamnesa"> <?php echo $_smarty_tpl->getVariable('rs_cppt')->value['FS_CPPT_O'];?>
</textarea>
                 </td>
            </tr>
            <tr>
                <td>A / I / A</td>
                <td>
                    <textarea name="FS_CPPT_A" rows="1" cols="100%" onkeypress="handle7(event)" class="form-control analisis"><?php echo $_smarty_tpl->getVariable('rs_cppt')->value['FS_CPPT_A'];?>
</textarea>
                </td> 
            </tr>
            <tr>
                <td>P / ME / R</td>
                <td>
                    <textarea name="FS_CPPT_P" rows="1" cols="100%" onkeypress="handle8(event)" class="form-control plan"><?php echo $_smarty_tpl->getVariable('rs_cppt')->value['FS_CPPT_P'];?>
</textarea>
                </td>
            </tr>
            <tr>
                <td>Diagnosa Utama</td>
                <td>
                    <input type="text" name="FS_DIAG_UTAMA" size="70" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_DIAG_UTAMA'];?>
">
                </tr>
                <tr>
                    <td>Diagnosa Sekunder</td>
                    <td>
                        <input type="text" name="FS_DIAG_SEK" size="70" value="<?php echo $_smarty_tpl->getVariable('rs_resume')->value['FS_DIAG_SEK'];?>
">
                </tr>
                <tr>
                    <td colspan="2">
                        <textarea rows="18" class="form-control resep"  cols="100" name="FS_TERAPI"> 
                            <?php echo $_smarty_tpl->getVariable('rs_cppt')->value['FS_CPPT_TERAPI'];?>

                        </textarea> 
                    </td>
                </tr>
            <tr class="submit-box">
                <td colspan="2">
                    <div style="font-weight: bold;">
                        *Bismillahirohmanirrohim, saya dengan sadar dan penuh tanggung jawab menghapus formulir ini dengan alasan yang benar
                    </div>
                    <br>
                    <input type="submit" name="save" value="Hapus" class="edit-button"/>
                </td>
            </tr>
         
        
        </table>
    </form>
</div>
 
  



 
