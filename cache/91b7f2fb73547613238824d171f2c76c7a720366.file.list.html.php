<?php /* Smarty version Smarty-3.0.7, created on 2022-04-25 13:01:13
         compiled from "application/views\pengaturan/preferences/list.html" */ ?>
<?php /*%%SmartyHeaderCode:54026266392919e791-15211440%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '91b7f2fb73547613238824d171f2c76c7a720366' => 
    array (
      0 => 'application/views\\pengaturan/preferences/list.html',
      1 => 1616210792,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54026266392919e791-15211440',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="breadcrum">
    <p>
        <a href="#">Settings</a><span></span>
        <small>Preferences</small>
    </p>
    <div class="clear"></div>
</div>
<div class="navigation">
    <div class="pageRow">
        <div class="pageNav">
            <ul>
                <li class="info"><strong><?php echo (($tmp = @$_smarty_tpl->getVariable('pagination')->value['total'])===null||$tmp==='' ? 0 : $tmp);?>
</strong> Record&nbsp;</li><?php echo (($tmp = @$_smarty_tpl->getVariable('pagination')->value['data'])===null||$tmp==='' ? '' : $tmp);?>

            </ul>
        </div>
        <div class="clear"></div>
    </div>
    <div class="navigation-button">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('pengaturan/preferences/add');?>
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
<div class="content-scroll">
    <table class="table-view" width="100%">
        <tr>
            <th width="4%">No</th>
            <th width="20%">Group</th>
            <th width="20%">Name</th>
            <th width="45%">Value</th>
            <th width="11%"></th>
        </tr>
        <?php  $_smarty_tpl->tpl_vars['result'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_preferences')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['result']->key => $_smarty_tpl->tpl_vars['result']->value){
?>
        <tr <?php if (($_smarty_tpl->getVariable('no')->value%2)!=1){?>class="blink-row"<?php }?>>
            <td align="center"><?php echo $_smarty_tpl->getVariable('no')->value++;?>
.</td>
            <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value['pref_group'])===null||$tmp==='' ? '' : $tmp);?>
</td>
            <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value['pref_nm'])===null||$tmp==='' ? '' : $tmp);?>
</td>
            <td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value['pref_value'])===null||$tmp==='' ? '' : $tmp);?>
</td>
            <td align="center">
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @('pengaturan/preferences/edit/').($_smarty_tpl->tpl_vars['result']->value['pref_id']))===null||$tmp==='' ? '' : $tmp));?>
" class="button-edit">Edit</a>
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @('pengaturan/preferences/delete/').($_smarty_tpl->tpl_vars['result']->value['pref_id']))===null||$tmp==='' ? '' : $tmp));?>
" class="button-hapus">Hapus</a>
            </td>
        </tr>
        <?php }} else { ?>
        <tr>
            <td colspan="5">Data not found!</td>
        </tr>
        <?php } ?>
    </table>
</div>