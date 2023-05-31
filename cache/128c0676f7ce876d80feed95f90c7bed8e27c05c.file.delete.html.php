<?php /* Smarty version Smarty-3.0.7, created on 2022-01-07 14:56:55
         compiled from "application/views\pengaturan/operator/delete.html" */ ?>
<?php /*%%SmartyHeaderCode:58976077b0665b3be2-60809911%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '128c0676f7ce876d80feed95f90c7bed8e27c05c' => 
    array (
      0 => 'application/views\\pengaturan/operator/delete.html',
      1 => 1616210792,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '58976077b0665b3be2-60809911',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="breadcrum">
    <p><a href="#">Settings</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('pengaturan/operator');?>
">Users</a><span></span>
        <small>Delete Data</small>
    </p>
    <div class="clear"></div>
</div>
<div class="navigation">
    <div class="navigation-button">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('pengaturan/operator');?>
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
<form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('pengaturan/operator/delete_process');?>
" method="post">
    <input name="user_img" type="hidden" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['user_img'])===null||$tmp==='' ? '' : $tmp);?>
">
    <input name="user_id" type="hidden" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['user_id'])===null||$tmp==='' ? '' : $tmp);?>
">
    <table class="table-input" width="100%">
        <tr>
            <td colspan="3"><b>Apakah anda yakin akan menghapus data dibawah ini?</b></td>
        </tr>
        <tr class="headrow">
            <th colspan="3">User Account</th>
        </tr>
        <tr>
            <td>Username</td>
            <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['user_name'])===null||$tmp==='' ? '' : $tmp);?>
</td>
        </tr>
        <tr>
            <td>Password</td>
            <td><em>hidden</em></td>
        </tr>
        <tr>
            <td>Role</td>
            <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['role_nm'])===null||$tmp==='' ? '' : $tmp);?>
</td>
        </tr>
        <!--<tr class="headrow">
            <th colspan="3">Data Pribadi</th>
        </tr>
        <tr>
            <td width="15%">Nama Lengkap</td>
            <td width="40%"><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['nama_lengkap'])===null||$tmp==='' ? '' : $tmp);?>
</td>
            <td rowspan="8" width="45%">
                <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/users/<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['user_img'])===null||$tmp==='' ? 'default.png' : $tmp);?>
" alt="" width="200" />
            </td>
        </tr>
        <tr>
            <td>NIP</td>
            <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['nip'])===null||$tmp==='' ? '-' : $tmp);?>
</td>
        </tr>
        <tr>
            <td>Tempat, Tanggal Lahir</td>
            <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['tmp_lahir'])===null||$tmp==='' ? '-' : $tmp);?>
, <?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['tgl_lahir'])===null||$tmp==='' ? '' : $tmp);?>
</td>
        </tr>
        <tr>
            <td>No Telepon</td>
            <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['no_telp'])===null||$tmp==='' ? '-' : $tmp);?>
</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['alamat'])===null||$tmp==='' ? '=' : $tmp);?>
</td>
        </tr>
        <tr>
            <td>Unit Kerja</td>
            <td>
                <?php  $_smarty_tpl->tpl_vars['unit'] = new Smarty_Variable;
 $_from = (($tmp = @$_smarty_tpl->getVariable('rs_unit')->value)===null||$tmp==='' ? '' : $tmp); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['unit']->key => $_smarty_tpl->tpl_vars['unit']->value){
?>
                <?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['unit_id'])===null||$tmp==='' ? '' : $tmp);?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1==$_smarty_tpl->tpl_vars['unit']->value['unit_id']){?>
                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['unit']->value['unit_name'])===null||$tmp==='' ? '-' : $tmp);?>

                <?php }?>
                <?php }} ?>
            </td>
        </tr>
        <tr>
            <td>Pangkat/Gol</td>
            <td>
                <?php  $_smarty_tpl->tpl_vars['gol'] = new Smarty_Variable;
 $_from = (($tmp = @$_smarty_tpl->getVariable('rs_gol')->value)===null||$tmp==='' ? '' : $tmp); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['gol']->key => $_smarty_tpl->tpl_vars['gol']->value){
?>
                <?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['golongan_id'])===null||$tmp==='' ? '' : $tmp);?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2==$_smarty_tpl->tpl_vars['gol']->value['golongan_id']){?>
                <?php echo $_smarty_tpl->tpl_vars['gol']->value['golongan_pangkat'];?>
 (<?php echo $_smarty_tpl->tpl_vars['gol']->value['golongan_name'];?>
)
                <?php }?>
                <?php }} ?>
            </td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>
                <?php  $_smarty_tpl->tpl_vars['jab'] = new Smarty_Variable;
 $_from = (($tmp = @$_smarty_tpl->getVariable('rs_jab')->value)===null||$tmp==='' ? '' : $tmp); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['jab']->key => $_smarty_tpl->tpl_vars['jab']->value){
?>
                <?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['jabatan_id'])===null||$tmp==='' ? '' : $tmp);?>
<?php $_tmp3=ob_get_clean();?><?php if ($_tmp3==$_smarty_tpl->tpl_vars['jab']->value['jabatan_id']){?>
                <?php echo $_smarty_tpl->tpl_vars['jab']->value['jabatan_nama'];?>

                <?php }?>
                <?php }} ?>
            </td>
        </tr>-->
        <tr class="submit-box">
            <td colspan="3"><input type="submit" name="save[insert]" value="Hapus" class="edit-button" /></td>
        </tr>
    </table>
</form>