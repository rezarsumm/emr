<?php /* Smarty version Smarty-3.0.7, created on 2021-09-20 20:53:43
         compiled from "application/views\inap/rm17/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:29937606e78a17b3880-80492981%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ecd904e91c69bb3b6e42993f5065ce697e7d397' => 
    array (
      0 => 'application/views\\inap/rm17/edit.html',
      1 => 1616214946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29937606e78a17b3880-80492981',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!-- include javascript -->
<?php $_template = new Smarty_Internal_Template("inap/rm10/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of include javascript-->
<div class="breadcrum">
    <p>
        <a href="#">Form RM</a><span></span>
        <a href="#">RM 17 CATATAN PEMBERIAN OBAT</a><span></span>
        <small>Edit Data</small>
    </p>
    <div class="clear"></div>
</div>
<div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/rm17/edit_process');?>
" method="post">
        <input name="FS_KD_RM17" type="hidden" value="<?php echo $_smarty_tpl->getVariable('result')->value['FS_KD_RM17'];?>
" />
        <input name="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('result')->value['FS_KD_REG'];?>
" />

        <table class="table-input" width="100%">
            <tr>
                <th colspan="2">DATA UMUM</th>
            </tr>
            <tr>
                <td>
                    Tanggal
                </td>
                <td>
                    <input name="FD_TGL_PEMBERIAN_OBAT" type="text" size="10" maxlength="10" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FD_TGL_PEMBERIAN_OBAT'])===null||$tmp==='' ? '' : $tmp);?>
" class="tanggal" style="text-align: center;" />
                    <em>* Wajib Diisi</em>
                </td>
            </tr>
            <tr>
                <td>
                    Jenis Obat
                </td>
                <td>
                    <select name="FS_JENIS_OBAT" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <option value="1" <?php if ($_smarty_tpl->getVariable('result')->value['FS_JENIS_OBAT']==1){?> selected="selected" <?php }?>>TABLET</option>
                        <option value="2" <?php if ($_smarty_tpl->getVariable('result')->value['FS_JENIS_OBAT']==2){?> selected="selected" <?php }?>>INJEKSI</option>
                        <option value="3" <?php if ($_smarty_tpl->getVariable('result')->value['FS_JENIS_OBAT']==3){?> selected="selected" <?php }?>>SALEP</option>
                        <option value="4" <?php if ($_smarty_tpl->getVariable('result')->value['FS_JENIS_OBAT']==4){?> selected="selected" <?php }?>>LL</option>
                        <option value="5" <?php if ($_smarty_tpl->getVariable('result')->value['FS_JENIS_OBAT']==5){?> selected="selected" <?php }?>>KAPLET</option>
                        <option value="6" <?php if ($_smarty_tpl->getVariable('result')->value['FS_JENIS_OBAT']==6){?> selected="selected" <?php }?>>KAPSUL</option>
                        <option value="7" <?php if ($_smarty_tpl->getVariable('result')->value['FS_JENIS_OBAT']==7){?> selected="selected" <?php }?>>INFUS</option>
                        <option value="8" <?php if ($_smarty_tpl->getVariable('result')->value['FS_JENIS_OBAT']==8){?> selected="selected" <?php }?>>NEBULIZER</option>
                        <option value="9" <?php if ($_smarty_tpl->getVariable('result')->value['FS_JENIS_OBAT']==9){?> selected="selected" <?php }?>>SYRUP</option>
                        <option value="10" <?php if ($_smarty_tpl->getVariable('result')->value['FS_JENIS_OBAT']==10){?> selected="selected" <?php }?>>RACIKAN (PUYER)</option>
                        <option value="11" <?php if ($_smarty_tpl->getVariable('result')->value['FS_JENIS_OBAT']==11){?> selected="selected" <?php }?>>RACIKAN (KAPSUL)</option>
                        <option value="12" <?php if ($_smarty_tpl->getVariable('result')->value['FS_JENIS_OBAT']==12){?> selected="selected" <?php }?>>SUPOSITORIA</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nama Obat</td>
                <td>
                    <input type="text" name="FS_NAMA_OBAT" size="40"  value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_NAMA_OBAT'])===null||$tmp==='' ? '' : $tmp);?>
">
                </td>
            </tr>
            <tr>
                <td>Dosis</td>
                <td>
                    <input type="text" name="FS_DOSIS_OBAT" size="40" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_DOSIS_OBAT'])===null||$tmp==='' ? '' : $tmp);?>
">
                </td>
            </tr>
            <tr>
                <td>
                    Rute
                </td>
                <td>
                    <select name="FS_RUTE" id="surat_dari" class="select2" style="width: 300px;">
                        <option value=""></option>
                        <option value="1" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==1){?> selected="selected" <?php }?>>ORAL</option>
                        <option value="2" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==2){?> selected="selected" <?php }?>>TOPIKAL</option>
                        <option value="3" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==3){?> selected="selected" <?php }?>>TETES MATA</option>
                        <option value="4" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==4){?> selected="selected" <?php }?>>IV</option>
                        <option value="5" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==5){?> selected="selected" <?php }?>>IM</option>
                        <option value="6" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==6){?> selected="selected" <?php }?>>SC</option>
                        <option value="7" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==7){?> selected="selected" <?php }?>>IC</option>
                        <option value="8" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==8){?> selected="selected" <?php }?>>TETES TELINGA</option>
                        <option value="9" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==9){?> selected="selected" <?php }?>>IV DRIP</option>
                        <option value="10" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==10){?> selected="selected" <?php }?>>INHALASI</option>
                        <option value="11" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==11){?> selected="selected" <?php }?>>TETES HIDUNG</option>
                        <option value="12" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==12){?> selected="selected" <?php }?>>PEREKTAL</option>
                        <option value="13" <?php if ($_smarty_tpl->getVariable('result')->value['FS_RUTE']==13){?> selected="selected" <?php }?>>PERVAGINAL</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Interval</td>
                <td>
                    <input type="text" name="FS_INTERVAL" size="40" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_INTERVAL'])===null||$tmp==='' ? '' : $tmp);?>
">
                </td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>
                    <input type="text" name="FS_KET" size="40" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_KET'])===null||$tmp==='' ? '' : $tmp);?>
">
                </td>
            </tr>
            <tr>
                <td>
                    Stop Obat
                </td>
                <td>
                    <select name="FS_KET2" id="surat_dari" class="select2" style="width: 300px;">
                        <option value="0" <?php if ($_smarty_tpl->getVariable('result')->value['FS_KET2']==0){?> selected="selected" <?php }?>></option>
                        <option value="1"  <?php if ($_smarty_tpl->getVariable('result')->value['FS_KET2']==1){?> selected="selected" <?php }?>>Stop</option>
                    </select>
                </td>
            </tr>
            <tr class="submit-box">
                <td colspan="2">
                     <div style="font-weight: bold;">
                    *Bismillahirohmanirrohim, saya dengan sadar dan penuh tanggung jawab mengisikan formulir ini dengan data yang benar
                </div>
                <br>
                    <input type="submit" name="save" value="Edit" class="edit-button"/>
                </td>
            </tr>
        </table>
    </form>
</div>