<?php /* Smarty version Smarty-3.0.7, created on 2021-12-06 14:37:41
         compiled from "application/views\pengaturan/kep/add_tujuan.html" */ ?>
<?php /*%%SmartyHeaderCode:1415761adbdc597d9a2-59235043%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e633c4d2a82eec489edd4e495c9e6a44302ce67' => 
    array (
      0 => 'application/views\\pengaturan/kep/add_tujuan.html',
      1 => 1616210792,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1415761adbdc597d9a2-59235043',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript">
    $(document).ready(function () {
        $(".select2").select2({
            placeholder: "Pilih Data",
            allowClear: true
        });
    });
</script>
<div class="breadcrum">
    <p>
        <a href="#">Settings</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('pengaturan/kep');?>
">Master Keperawatan</a><span></span>
        <small>Add Data</small>
    </p>
    <div class="clear"></div>
</div>
<div class="navigation">
    <div class="navigation-button">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('pengaturan/kep/list_tujuan');?>
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
<form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('pengaturan/kep/add_tujuan_process');?>
" method="post">
    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="2">Add Data</th>
        </tr>
        <tr>
            <td width="15%">Diagnosa</td>
            <td width="85%">
                <select name="FS_KD_DAFTAR_DIAGNOSA" class="select2" style="width: 300px;">
                    <option value=""></option>
                    <?php  $_smarty_tpl->tpl_vars['result'] = new Smarty_Variable;
 $_from = (($tmp = @$_smarty_tpl->getVariable('rs_diag')->value)===null||$tmp==='' ? '' : $tmp); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['result']->key => $_smarty_tpl->tpl_vars['result']->value){
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['result']->value['FS_KD_DAFTAR_DIAGNOSA'];?>
"><?php echo $_smarty_tpl->tpl_vars['result']->value['FS_NM_DIAGNOSA'];?>
</option>
                    <?php }} ?>
                </select>
                <em>* wajib diisi</em>
            </td>
        </tr>
        <tr>
            <td>Tujuan</td>
            <td>
                <input name="FS_NM_NOC" type="text" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['FS_NM_NOC'])===null||$tmp==='' ? '' : $tmp);?>
" size="25" />
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