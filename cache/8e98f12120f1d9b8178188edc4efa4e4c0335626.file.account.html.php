<?php /* Smarty version Smarty-3.0.7, created on 2022-01-07 14:55:53
         compiled from "application/views\pengaturan/account_setting/account.html" */ ?>
<?php /*%%SmartyHeaderCode:2466861d7f2092c2558-81452129%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e98f12120f1d9b8178188edc4efa4e4c0335626' => 
    array (
      0 => 'application/views\\pengaturan/account_setting/account.html',
      1 => 1641542151,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2466861d7f2092c2558-81452129',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="breadcrum">
    <p><a href="#">Account Settings</a><span></span><small>Edit Account</small></p>
    <div class="clear"></div>
</div>
<div class="sub-content">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('pengaturan/account_setting/edit_account_process');?>
" method="post" enctype="multipart/form-data">
        <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="2">Edit Account</th>
            </tr>
            <tr>
                <td width="20%">Username</td>
                <td width="80%">
                    <input name="user_name_old" type="hidden" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('user_name')->value)===null||$tmp==='' ? '' : $tmp);?>
" />
                    <input name="user_name" type="text" disabled="" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['user_name'])===null||$tmp==='' ? '' : $tmp);?>
" size="20" maxlength="30" readonly=""/>
                      <input name="user_name" type="hidden" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['user_name'])===null||$tmp==='' ? '' : $tmp);?>
" size="20" maxlength="30" readonly=""/>
                </td>
            </tr>
            <tr>
                <td>Password Lama</td>
                <td>
                    <input name="user_pass_old" type="password" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['user_pass_old'])===null||$tmp==='' ? '' : $tmp);?>
" size="20" maxlength="30" />
                </td>
            </tr>
            <tr>
                <td>Password Baru</td>
                <td>
                    <input name="user_pass_new" type="password" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['user_pass_new'])===null||$tmp==='' ? '' : $tmp);?>
" size="20" maxlength="30" />
                </td>
            </tr>
            <tr>
                <td>Konfirm Password Baru</td>
                <td>
                    <input name="user_pass_confirm" type="password" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['user_pass_confirm'])===null||$tmp==='' ? '' : $tmp);?>
" size="20" maxlength="30" />
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
</div>