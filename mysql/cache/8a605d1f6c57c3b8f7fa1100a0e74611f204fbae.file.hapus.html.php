<?php /* Smarty version Smarty-3.0.7, created on 2021-03-16 13:47:19
         compiled from "application/views\settings/role/hapus.html" */ ?>
<?php /*%%SmartyHeaderCode:1365460505477e5afb6-75892819%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a605d1f6c57c3b8f7fa1100a0e74611f204fbae' => 
    array (
      0 => 'application/views\\settings/role/hapus.html',
      1 => 1608812834,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1365460505477e5afb6-75892819',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="head-content">
    <h3>Role Management</h3>
    <div class="head-content-nav">
        <ul>
            <li><a href="#" class="active">Hapus Data</a></li>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('settings/adminrole/add');?>
"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/add-icon.png" alt="" /> Add Data</a></li>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('settings/adminrole');?>
">List Data</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
<!-- notification template -->
<?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of notification template-->
<form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('settings/adminrole/process_delete');?>
" method="post">
    <input type="hidden" name="role_id" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['role_id'])===null||$tmp==='' ? '' : $tmp);?>
" />
    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="2">Hapus Role</th>
        </tr>
        <tr>
            <td width="25%">Web Portal *</td>
            <td width="75%"><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['portal_nm'])===null||$tmp==='' ? '' : $tmp);?>
</td>
        </tr>
        <tr>
            <td>Nama Authority *</td>
            <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['role_nm'])===null||$tmp==='' ? '' : $tmp);?>
</td>
        </tr>
        <tr>
            <td>Deskripsi *</td>
            <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['role_desc'])===null||$tmp==='' ? '' : $tmp);?>
</td>
        </tr>
        <tr>
            <td>Default Page *</td>
            <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['default_page'])===null||$tmp==='' ? '' : $tmp);?>
</td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="save" value="Hapus" class="edit-button" /> </td>
        </tr>
    </table>
</form>
