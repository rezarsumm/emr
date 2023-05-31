<?php /* Smarty version Smarty-3.0.7, created on 2021-12-06 14:27:52
         compiled from "application/views\pengaturan/kep/list.html" */ ?>
<?php /*%%SmartyHeaderCode:3191660dfe2da53c227-85444662%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ee492310cdac72af0df77307525928c95f204c82' => 
    array (
      0 => 'application/views\\pengaturan/kep/list.html',
      1 => 1616210792,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3191660dfe2da53c227-85444662',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="breadcrum">
    <p>
        <a href="#">Settings</a><span></span>
        <small>Master Keperawatan</small>
    </p>
    <div class="clear"></div>
</div>
<div class="head-content">
    <div class="head-content-nav">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('pengaturan/kep/');?>
" class="active">Diagnosa</a></li>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('pengaturan/kep/list_tujuan');?>
">Tujuan</a></li>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('pengaturan/kep/list_kriteria');?>
">Kriteria</a></li>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('pengaturan/kep/list_perencanaan');?>
">Perencanaan</a></li>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('pengaturan/kep/list_rincian');?>
">Rincian</a></li>
        </ul>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
<div class="content-entry">
<div class="navigation">
    <div class="navigation-button">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('pengaturan/kep/add');?>
"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/add-icon.png" alt="" /> Add Data</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
<!-- notification template -->
<?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of notification template-->
<table class="table-view" width="100%">
    <thead>
        <tr>
            <th width="4%">No</th>
            <th width="85%">Deskripsi</th>
            <th width="11%"></th>
        </tr>
    </thead>
    <?php  $_smarty_tpl->tpl_vars['result'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_diag')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['result']->key => $_smarty_tpl->tpl_vars['result']->value){
?>
    <tr <?php if (($_smarty_tpl->getVariable('no')->value%2)!=1){?>class="blink-row"<?php }?>>
        <td align="center"><?php echo $_smarty_tpl->getVariable('no')->value++;?>
.</td>
        <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value['FS_NM_DIAGNOSA'])===null||$tmp==='' ? '' : $tmp);?>
</td>
        <td align="center">
            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @('pengaturan/kep/edit/').($_smarty_tpl->tpl_vars['result']->value['FS_KD_DAFTAR_DIAGNOSA']))===null||$tmp==='' ? '' : $tmp));?>
" class="button-edit">Edit</a>
            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @('pengaturan/kep/delete_process/').($_smarty_tpl->tpl_vars['result']->value['FS_KD_DAFTAR_DIAGNOSA']))===null||$tmp==='' ? '' : $tmp));?>
" onclick="return confirm('Are you sure you want to delete this item?');" class="button-hapus">Hapus</a>
        </td>
    </tr>
    <?php }} else { ?>
    <tr>
        <td colspan="3">Data not found!</td>
    </tr>
    <?php } ?>
</table>
