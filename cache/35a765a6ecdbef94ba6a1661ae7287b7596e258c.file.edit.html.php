<?php /* Smarty version Smarty-3.0.7, created on 2022-01-07 14:56:43
         compiled from "application/views\pengaturan/operator_account/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:2281361d7f23b08aef1-25879041%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35a765a6ecdbef94ba6a1661ae7287b7596e258c' => 
    array (
      0 => 'application/views\\pengaturan/operator_account/edit.html',
      1 => 1641542165,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2281361d7f23b08aef1-25879041',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="breadcrum">
    <p>
        <a href="#">Settings</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('pengaturan/operator');?>
">Users</a><span></span>
        <small><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['nama_lengkap'])===null||$tmp==='' ? '' : $tmp);?>
</small>
    </p>
    <div class="clear"></div>
</div>
<div class="sub-nav-content">
    <!--<ul>
        <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('pengaturan/operator/edit/').($_smarty_tpl->getVariable('user_id')->value));?>
">Data Pribadi</a></li>
        <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('pengaturan/operator/account/').($_smarty_tpl->getVariable('user_id')->value));?>
" class="active">Account Settings</a></li>
    </ul>-->
    <div class="clear"></div>
    <div class="sub-content">
        <!-- notification template -->
        <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
        <!-- end of notification template-->
        <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('pengaturan/operator/edit_account_process');?>
" method="post">
            <input name="user_id" type="hidden"  value="<?php echo (($tmp = @$_smarty_tpl->getVariable('user_id')->value)===null||$tmp==='' ? '' : $tmp);?>
"/>
            <table class="table-input" width="100%">
                <tr class="headrow">
                    <th colspan="2">Edit Account</th>
                </tr>
                <tr>
                    <td width="20%">Username</td>
                    <td width="80%">
                        <input name="user_name_old" type="hidden" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['user_name'])===null||$tmp==='' ? '' : $tmp);?>
" />
                        <input name="user_name" type="text" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['user_name'])===null||$tmp==='' ? '' : $tmp);?>
" size="20" maxlength="50" />
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input name="user_pass" type="password" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['user_pass'])===null||$tmp==='' ? '' : $tmp);?>
" size="20" maxlength="30" />
                    </td>
                </tr>  
                <tr>
                    <td>Layanan</td>
                    <td>
                        <select name="fs_kd_layanan" class="select2" style="width: 250px;">
                    <option value=""></option>
                    <?php  $_smarty_tpl->tpl_vars['layanan'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_unit')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['layanan']->key => $_smarty_tpl->tpl_vars['layanan']->value){
?>
                     <option value="<?php echo $_smarty_tpl->tpl_vars['layanan']->value['Kode_Bangsal'];?>
" <?php if ($_smarty_tpl->getVariable('result')->value['fs_kd_layanan']==$_smarty_tpl->tpl_vars['layanan']->value['Kode_Bangsal']){?>selected=""<?php }?>><?php echo $_smarty_tpl->tpl_vars['layanan']->value['Nama_Bangsal'];?>
</option>
                    <?php }} ?>
                    </select>
                    </td>
                </tr>  
                
                <tr class="headrow">
                    <th colspan="2">Edit Permissions</th>
                </tr>
                <tr>
                    <td style="vertical-align: top">Select Role</td>
                    <td>
                        <select name="role_id" class="select2" style="width: 250px;">
                    <option value=""></option>
                    <?php  $_smarty_tpl->tpl_vars['role'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('selected')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['role']->key => $_smarty_tpl->tpl_vars['role']->value){
?>
                     <option value="<?php echo $_smarty_tpl->tpl_vars['role']->value['role_id'];?>
" <?php if ($_smarty_tpl->getVariable('result')->value['role_id']==$_smarty_tpl->tpl_vars['role']->value['role_id']){?>selected=""<?php }?>><?php echo $_smarty_tpl->tpl_vars['role']->value['role_nm'];?>
</option>
                    <?php }} ?>
                    </select>
                <em>* wajib diisi</em>
                        <!--<?php  $_smarty_tpl->tpl_vars['role'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('selected')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['role']->key => $_smarty_tpl->tpl_vars['role']->value){
?>
                        <label><input type="checkbox" name="role_id[]" value="<?php echo $_smarty_tpl->tpl_vars['role']->value['role_id'];?>
" checked="checked"/>&nbsp;<?php echo $_smarty_tpl->tpl_vars['role']->value['role_nm'];?>
</label>
                        <?php }} ?>-->
                    
                        <!--<?php $_smarty_tpl->tpl_vars['data'] = new Smarty_variable($_smarty_tpl->getVariable('m_operator')->value->get_all_role_unchk($_smarty_tpl->getVariable('role')->value['role_id']), null, null);?>
                        <?php  $_smarty_tpl->tpl_vars['role2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['role2']->key => $_smarty_tpl->tpl_vars['role2']->value){
?>
                        <label><input type="checkbox" name="role_id[]" value="<?php echo $_smarty_tpl->tpl_vars['role2']->value['role_id'];?>
"/>&nbsp;<?php echo $_smarty_tpl->tpl_vars['role2']->value['role_nm'];?>
</label>
                        <?php }} ?>-->
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
</div>


