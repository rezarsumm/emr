<?php /* Smarty version Smarty-3.0.7, created on 2021-12-06 14:36:11
         compiled from "application/views\pengaturan/kep/list_tujuan.html" */ ?>
<?php /*%%SmartyHeaderCode:937561adbd6babd2a0-28710757%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '597de2fc590d47d1691be5a1bfe5064855d2ee44' => 
    array (
      0 => 'application/views\\pengaturan/kep/list_tujuan.html',
      1 => 1616210792,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '937561adbd6babd2a0-28710757',
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
" >Diagnosa</a></li>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('pengaturan/kep/list_tujuan');?>
" class="active">Tujuan</a></li>
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
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('pengaturan/kep/add_tujuan');?>
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
 $_from = $_smarty_tpl->getVariable('rs_noc')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['result']->key => $_smarty_tpl->tpl_vars['result']->value){
?>
    <tr <?php if (($_smarty_tpl->getVariable('no')->value%2)!=1){?>class="blink-row"<?php }?>>
        <td align="center"><?php echo $_smarty_tpl->getVariable('no')->value++;?>
.</td>
        <td><?php echo $_smarty_tpl->tpl_vars['result']->value['FS_NM_DIAGNOSA'];?>
<br>---<?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value['FS_NM_NOC'])===null||$tmp==='' ? '' : $tmp);?>
</td>
        <td align="center">
            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @('pengaturan/kep/edit_tujuan/').($_smarty_tpl->tpl_vars['result']->value['FS_KD_NOC']))===null||$tmp==='' ? '' : $tmp));?>
" class="button-edit">Edit</a>
            <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @('pengaturan/kep/delete_tujuan_process/').($_smarty_tpl->tpl_vars['result']->value['FS_KD_NOC']))===null||$tmp==='' ? '' : $tmp));?>
" onclick="return confirm('Are you sure you want to delete this item?');" class="button-hapus">Hapus</a>
        </td>
    </tr>
    <?php }} else { ?>
    <tr>
        <td colspan="3">Data not found!</td>
    </tr>
    <?php } ?>
</table>
