<?php /* Smarty version Smarty-3.0.7, created on 2021-10-05 10:26:51
         compiled from "application/views\pengaturan/operator/add.html" */ ?>
<?php /*%%SmartyHeaderCode:47406073ab8946d2b0-73158594%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5dd28a180439a15f2ebae59f906924a71f89830' => 
    array (
      0 => 'application/views\\pengaturan/operator/add.html',
      1 => 1616210792,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47406073ab8946d2b0-73158594',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript">
    $(document).ready(function () {
        // date picker
        $(".tanggal").datepicker({
            yearRange: '-90:+0',
            changeMonth: true,
            changeYear: true,
            showOn: 'both',
            buttonImage: '<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
/resource/doc/images/icon/calendar.gif',
            buttonImageOnly: true,
            dateFormat: 'yy-mm-dd'
        });
        $(".select2").select2({
            placeholder: "Pilih",
            allowClear: true
        });
    });
</script>
<div class="breadcrum">
    <p><a href="#">Settings</a>
        <a href="#"></a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('pengaturan/operator');?>
">Users</a><span></span>
        <small>Add Data</small>
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
<form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('pengaturan/operator/add_process');?>
" method="post" enctype="multipart/form-data">
    <table class="table-input" width="100%">
        <!--<tr class="headrow">
            <th colspan="4">Data Pribadi</th>
        </tr>
        <tr>
            <td width="10%">Nama Lengkap</td>
            <td width="40%">
                <input name="nama_lengkap" type="text" tabindex="1" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['nama_lengkap'])===null||$tmp==='' ? '' : $tmp);?>
" size="40" maxlength="50" />
                <em>* wajib diisi</em>
            </td>
            <td width="10%">Alamat</td>
            <td width="40%">
                <input type="text" name="alamat" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['alamat'])===null||$tmp==='' ? '' : $tmp);?>
" size="60" maxlength="255" tabindex="5"/>
            </td>
        </tr>
        <tr>
            <td>NIP</td>
            <td>
                <input name="nip" type="text" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['nip'])===null||$tmp==='' ? '' : $tmp);?>
" size="25" maxlength="20" />
                <em>* wajib diisi</em>
            </td>
            <td>Unit Kerja</td>
            <td>
                <select name="unit_id" class="select2" style="width: 250px;">
                    <option value=""></option>
                    <?php  $_smarty_tpl->tpl_vars['unit'] = new Smarty_Variable;
 $_from = (($tmp = @$_smarty_tpl->getVariable('rs_unit')->value)===null||$tmp==='' ? '' : $tmp); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['unit']->key => $_smarty_tpl->tpl_vars['unit']->value){
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['unit']->value['unit_id'];?>
" <?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['unit_id'])===null||$tmp==='' ? '' : $tmp);?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1==$_smarty_tpl->tpl_vars['unit']->value['unit_id']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['unit']->value['unit_name'];?>
</option>
                    <?php }} ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>
                <label><input type="radio" name="jenis_kelamin" value="L" <?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['jenis_kelamin'])===null||$tmp==='' ? '' : $tmp);?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2=='L'){?>checked="checked"<?php }?> />Laki-laki</label>
                <label><input type="radio" name="jenis_kelamin" value="P" <?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['jenis_kelamin'])===null||$tmp==='' ? '' : $tmp);?>
<?php $_tmp3=ob_get_clean();?><?php if ($_tmp3=='P'){?>checked="checked"<?php }?> />Perempuan</label>
                <em>* wajib diisi</em>
            </td>
            <td>Pangkat/Gol</td>
            <td>
                <select name="golongan_id" class="select2" style="width: 250px;">
                    <option value=""></option>
                    <?php  $_smarty_tpl->tpl_vars['gol'] = new Smarty_Variable;
 $_from = (($tmp = @$_smarty_tpl->getVariable('rs_gol')->value)===null||$tmp==='' ? '' : $tmp); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['gol']->key => $_smarty_tpl->tpl_vars['gol']->value){
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['gol']->value['golongan_id'];?>
" <?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['golongan_id'])===null||$tmp==='' ? '' : $tmp);?>
<?php $_tmp4=ob_get_clean();?><?php if ($_tmp4==$_smarty_tpl->tpl_vars['gol']->value['golongan_id']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['gol']->value['golongan_pangkat'];?>
 (<?php echo $_smarty_tpl->tpl_vars['gol']->value['golongan_name'];?>
)</option>
                    <?php }} ?>
                </select>
                <em>* wajib diisi</em>
            </td>
        </tr>
        <tr>
            <td>Tempat, Tanggal Lahir</td>
            <td>
                <input type="text" name="tmp_lahir" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['tmp_lahir'])===null||$tmp==='' ? '' : $tmp);?>
" size="35" maxlength="50" tabindex="3"/>
                , <input type="text" name="tgl_lahir" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['tgl_lahir'])===null||$tmp==='' ? '' : $tmp);?>
" size="10" maxlength="10" class="tanggal" tabindex="4"/>
                <em>* wajib diisi</em>
            </td>
            <td>Jabatan</td>
            <td>
                <select name="jabatan_id" class="select2" style="width: 250px;">
                    <option value=""></option>
                    <?php  $_smarty_tpl->tpl_vars['jab'] = new Smarty_Variable;
 $_from = (($tmp = @$_smarty_tpl->getVariable('rs_jab')->value)===null||$tmp==='' ? '' : $tmp); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['jab']->key => $_smarty_tpl->tpl_vars['jab']->value){
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['jab']->value['jabatan_id'];?>
" <?php ob_start();?><?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['jabatan_id'])===null||$tmp==='' ? '' : $tmp);?>
<?php $_tmp5=ob_get_clean();?><?php if ($_tmp5==$_smarty_tpl->tpl_vars['jab']->value['jabatan_id']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['jab']->value['jabatan_nama'];?>
</option>
                    <?php }} ?>
                </select>
                <em>* wajib diisi</em>
            </td>
        </tr>
        <tr>
            <td>Nomor Telepon</td>
            <td>
                <input name="no_telp" type="text" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['no_telp'])===null||$tmp==='' ? '' : $tmp);?>
" size="25" maxlength="20" />
            </td>
            <td></td>
        </tr>-->
        <tr class="headrow">
            <th colspan="4">User Account</th>
        </tr>
        <tr>
            <td>Username </td>
            <td>
                <input name="user_name" type="text" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['user_name'])===null||$tmp==='' ? '' : $tmp);?>
" size="20" maxlength="30" tabindex="7"/>
                <em>* wajib diisi</em>
            </td>
            <td rowspan="4" colspan="2" width="45%">
                <!-- <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/users/default.png" alt="" style="height: 76px; border: 1px solid #999; background-color: #fff; padding: 5px;" /><br />
                 <input type="file" name="user_img" /><br />
                 <em>File *.jpg, *.png, *.gif. Max size 1024 x 768 px</em>-->
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td>
                <input name="user_pass" type="password" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['user_pass'])===null||$tmp==='' ? '' : $tmp);?>
" size="20" maxlength="30" tabindex="8"/>
                <em>* wajib diisi</em>
            </td>
        </tr>
        <!--<tr>
            <td>Email</td>
            <td>
                <input name="user_mail" type="text" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['user_mail'])===null||$tmp==='' ? '' : $tmp);?>
" size="30" maxlength="50" tabindex="9"/>
                <em>* wajib diisi</em>
            </td>
        </tr>-->
        <tr>
            <td style="vertical-align: top">Select Role</td>
            <td>
                <select name="role_id" class="select2" style="width: 250px;">
                    <option value=""></option>
                    <?php  $_smarty_tpl->tpl_vars['role'] = new Smarty_Variable;
 $_from = (($tmp = @$_smarty_tpl->getVariable('role_list')->value)===null||$tmp==='' ? '' : $tmp); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['role']->key => $_smarty_tpl->tpl_vars['role']->value){
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['role']->value['role_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['role']->value['role_nm'];?>
</option>
                    <?php }} ?>
                </select>
                <em>* wajib diisi</em>
                <!--<?php  $_smarty_tpl->tpl_vars['role'] = new Smarty_Variable;
 $_from = (($tmp = @$_smarty_tpl->getVariable('role_list')->value)===null||$tmp==='' ? '' : $tmp); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['role']->key => $_smarty_tpl->tpl_vars['role']->value){
?>
                <label><input type="checkbox" name="role_id[]" value="<?php echo $_smarty_tpl->tpl_vars['role']->value['role_id'];?>
" />&nbsp;<?php echo $_smarty_tpl->tpl_vars['role']->value['role_nm'];?>
</label>
                <?php }} ?>
            <em>* wajib diisi</em>-->
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
        <tr class="submit-box">
            <td colspan="4">
                <input type="submit" name="save" value="Simpan" class="edit-button" tabindex="10"/>
                <input type="reset" name="save" value="Reset" class="edit-button" tabindex="11"/>
            </td>
        </tr>
    </table>
</form>
