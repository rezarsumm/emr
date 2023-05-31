<?php /* Smarty version Smarty-3.0.7, created on 2022-03-07 15:42:43
         compiled from "application/views\pengaturan/kep/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:89156225c583dab518-67178395%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fef0d1a7ebfe72b86452c2cd0c7f3459e103db8c' => 
    array (
      0 => 'application/views\\pengaturan/kep/edit.html',
      1 => 1616210792,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89156225c583dab518-67178395',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript">
    $(document).ready(function() {
        $(".select2").select2({
            placeholder: "Pilih Induk Jabatan",
            allowClear: true
        });
    });
</script>
<div class="breadcrum">
    <p>
        <a href="#">Settings</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('pengaturan/kep');?>
">Master Keperawatan</a><span></span>
        <small>Edit Data</small>
    </p>
    <div class="clear"></div>
</div>
<div class="navigation">
    <div class="navigation-button">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('pengaturan/kep');?>
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
<form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('pengaturan/kep/edit_process');?>
" method="post">
    <input name="FS_KD_DAFTAR_DIAGNOSA" type="hidden" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_KD_DAFTAR_DIAGNOSA'])===null||$tmp==='' ? '' : $tmp);?>
">
    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="2">Edit Data</th>
        </tr>
        <tr>
            <td width="15%">Diagnosa</td>
            <td width="85%">
               <input name="FS_NM_DIAGNOSA" type="text" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_NM_DIAGNOSA'])===null||$tmp==='' ? '' : $tmp);?>
" size="40" maxlength="50"/>
                <em>* wajib diisi</em>
            </td>
        </tr>
        <tr class="submit-box">
            <td colspan="2">
                <input type="submit" name="save[insert]" value="Simpan" class="edit-button" />
                <input type="reset" name="save[reset]" value="Reset" class="edit-button" />
            </td>
        </tr>
    </table>
</form>