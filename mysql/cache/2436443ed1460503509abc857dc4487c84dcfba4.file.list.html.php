<?php /* Smarty version Smarty-3.0.7, created on 2021-03-16 11:26:09
         compiled from "application/views\pengaturan/operator/list.html" */ ?>
<?php /*%%SmartyHeaderCode:28402605033612378d2-60045983%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2436443ed1460503509abc857dc4487c84dcfba4' => 
    array (
      0 => 'application/views\\pengaturan/operator/list.html',
      1 => 1608812826,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28402605033612378d2-60045983',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="breadcrum">
    <p>
        <a href="#">Settings</a><span></span>
        <small>Users</small>
    </p>
    <div class="clear"></div>
</div>
<div class="navigation">
    <!--<div class="pageRow">
        <div class="pageNav">
            <ul>
                <li class="info"><strong><?php echo (($tmp = @$_smarty_tpl->getVariable('pagination')->value['total'])===null||$tmp==='' ? 0 : $tmp);?>
</strong> Record&nbsp;</li><?php echo (($tmp = @$_smarty_tpl->getVariable('pagination')->value['data'])===null||$tmp==='' ? '' : $tmp);?>

            </ul>
        </div>
        <div class="clear"></div>
    </div>-->
    <div class="navigation-button">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('pengaturan/operator/add');?>
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
            <th width="13%">NIP</th>
            <th width="27%">Nama Lengkap</th>
            <th width="11%">No Telepon</th>
            <th width="17%">Layanan</th>
            <th width="17%">Jabatan</th>
            <th width="11%"></th>
        </tr>
        <?php  $_smarty_tpl->tpl_vars['result'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_id')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['result']->key => $_smarty_tpl->tpl_vars['result']->value){
?>
        <tr <?php if (($_smarty_tpl->getVariable('no')->value%2)!=1){?>class="blink-row"<?php }?>>
            <td align="center"><?php echo $_smarty_tpl->getVariable('no')->value++;?>
.</td>
            <td align="center"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value['FS_KD_PEG'])===null||$tmp==='' ? '-' : $tmp);?>
</td>
            <td><?php echo (($tmp = @((mb_detect_encoding($_smarty_tpl->tpl_vars['result']->value['FS_NM_PEG'], 'UTF-8, ISO-8859-1') === 'UTF-8') ? mb_strtoupper($_smarty_tpl->tpl_vars['result']->value['FS_NM_PEG'],SMARTY_RESOURCE_CHAR_SET) : strtoupper($_smarty_tpl->tpl_vars['result']->value['FS_NM_PEG'])))===null||$tmp==='' ? '-' : $tmp);?>
</td>
            <td align="center"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value['FS_HP_PEG'])===null||$tmp==='' ? '-' : $tmp);?>
</td>
            <td align="center"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['result']->value['FS_NM_LAYANAN'])===null||$tmp==='' ? '-' : $tmp);?>
</td>
            <td><?php echo (($tmp = @((mb_detect_encoding($_smarty_tpl->tpl_vars['result']->value['role_nm'], 'UTF-8, ISO-8859-1') === 'UTF-8') ? mb_strtoupper($_smarty_tpl->tpl_vars['result']->value['role_nm'],SMARTY_RESOURCE_CHAR_SET) : strtoupper($_smarty_tpl->tpl_vars['result']->value['role_nm'])))===null||$tmp==='' ? '-' : $tmp);?>
</td>
            <td align="center">
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @('pengaturan/operator/account/').($_smarty_tpl->tpl_vars['result']->value['user_id']))===null||$tmp==='' ? '' : $tmp));?>
" class="button-edit">Edit</a>
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url((($tmp = @('pengaturan/operator/delete/').($_smarty_tpl->tpl_vars['result']->value['user_id']))===null||$tmp==='' ? '' : $tmp));?>
" class="button-hapus">Hapus</a>
            </td>
        </tr>
        <?php }} else { ?>
        <tr>
            <td colspan="7">Data not found!</td>
        </tr>
        <?php } ?>
    </table>
</div>