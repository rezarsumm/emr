<?php /* Smarty version Smarty-3.0.7, created on 2021-09-20 15:46:50
         compiled from "application/views\inap/resume/add_diagnosis.html" */ ?>
<?php /*%%SmartyHeaderCode:16129606eed44297c59-92582418%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52b7ea8f90341f8b88e81d551a4218eae1b2d520' => 
    array (
      0 => 'application/views\\inap/resume/add_diagnosis.html',
      1 => 1616214946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16129606eed44297c59-92582418',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("inap/resume/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<div class="breadcrum">
    <p>
        <a href="#">Data Arsip</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/resume/cari');?>
">Resume Pasien Pulang</a><span></span>
        <small>Add Diagnosis</small>
    </p>
    <div class="clear"></div>
</div>

<div class="head-content">
    <div class="head-content-nav">
        <ul>
            <li><a href="#" >Data Resume</a></li>
            <li><a href="#" class="active">Data Diagnosis</a></li>
            <li><a href="#">Data Terapi Pasien</a></li>
        </ul>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
<div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <table class="table-input" width="100%">
        <tr class="headrow">
            <th colspan="2">Add Diagnosis</th>
        </tr>
         <tr>
                <td>NAMA</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NAMA_PASIEN'];?>

                </td>
            </tr>
            <tr>
                <td>NO MR</td>
                <td>
                    <?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>

                </td>
            </tr>
            <tr>
                <td>TANGGAL LAHIR</td>
                <td>
                    <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('rs_pasien')->value['TGL_LAHIR'],"%d %b %Y");?>

                </td>
            </tr>
            <tr>
                <td>ALAMAT</td>
                <td><?php echo $_smarty_tpl->getVariable('rs_pasien')->value['ALAMAT'];?>
</td>
            </tr>
    </table>
   
        <table class="table-input" width="100%">
            <tr>
                <th colspan="6">Diagnosis Sekunder</th>
            </tr>
            <tr class="submit-box">
                <td colspan="6">
                    <a href="#" id="opendialogpengirim"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
/resource/doc/images/icon/add-icon.png" style="height:20px;" alt="Tambah Diagnosis" /></a>
                </td>
            </tr>
            <tr>
                <td><center><b>Nama Diagnosis Sekunder</b></center></td>
            <!--<td><center><b>ICD 10</b></center></td>-->
            <td><center><b>Aksi</b></center></td>
            </tr>
            <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('diag')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
            <tr>
                <td><center><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_NM_DIAG_SEK'];?>
</center></td>
            <!--<td><center><?php echo $_smarty_tpl->tpl_vars['data']->value['ICD10'];?>
</center></td>-->
            <td><center>
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('inap/resume/edit_diag/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_DIAG_SEK'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG']));?>
" class="btn-blue" title="Edit">Edit</a>
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('inap/resume/delete_process_diag/').($_smarty_tpl->tpl_vars['data']->value['FS_KD_DIAG_SEK'])).('/')).($_smarty_tpl->tpl_vars['data']->value['FS_KD_REG']));?>
" class="btn-red" title="Hapus Resume"  onclick="return confirm('Apakah Anda Yakin Akan Menghapus?');">Hapus</a>
            </center></td>
            </tr>
            <?php }} ?>
             <!--<tr>
                <td><center><input type="text" name="FS_NM_DIAG_SEK" size="40"></center></td>
           <td><center><input type="text" name="ICD10"></center></td>
            <td></td>
            </tr>-->
            
        </table>
        <table class="table-input" width="100%">
            <tr>
                <th colspan="6">Tindakan / Prosedur</th>
            </tr>
                        <tr class="submit-box">
                <td colspan="6">
                    <a href="#" id="opendialogklas"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
/resource/doc/images/icon/add-icon.png" style="height:20px;" alt="Tambah Tindakan" /></a>
                </td>
            </tr>
            <tr>
                <td><center><b>Nama Tindakan / Prosedur</b></center></td>
            <!--<td><center><b>ICD 9 CM</b></center></td>-->
            <td><center><b>Aksi</b></center></td>
            </tr>
            <?php  $_smarty_tpl->tpl_vars['data2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('tind')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data2']->key => $_smarty_tpl->tpl_vars['data2']->value){
?>
            <tr>
                <td><center><?php echo $_smarty_tpl->tpl_vars['data2']->value['FS_NM_TIND'];?>
</center></td>
            <!--<td><center><?php echo $_smarty_tpl->tpl_vars['data2']->value['ICD9CM'];?>
</center></td>-->
            <td><center>
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('inap/resume/edit_tindakan/').($_smarty_tpl->tpl_vars['data2']->value['FS_KD_TIND'])).('/')).($_smarty_tpl->tpl_vars['data2']->value['FS_KD_REG']));?>
" class="btn-blue" title="Edit">Edit</a>
                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('inap/resume/delete_process_tind/').($_smarty_tpl->tpl_vars['data2']->value['FS_KD_TIND'])).('/')).($_smarty_tpl->tpl_vars['data2']->value['FS_KD_REG']));?>
" class="btn-red" title="Hapus Resume"  onclick="return confirm('Apakah Anda Yakin Akan Menghapus?');">Hapus</a>
            </center></td>
            </tr>
            <?php }} ?>
            <!--<tr>
                <td><center><input type="text" name="FS_NM_TIND" size="40"></center></td>
            <td><center><input type="text" name="ICD9CM"></center></td>
            <td></td>
            </tr>-->

            <tr class="submit-box">
                <td colspan="3">
                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/resume/edit/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
" class="btn-red" style="float:left;"/>Kembali</a>
                    <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url(('inap/resume/add_terapi/').($_smarty_tpl->getVariable('rs_pasien')->value['NO_REG']));?>
" class="btn-green" onclick="return confirm('Apakah Anda Yakin Akan Melanjutkan?');" style="float:right;"/>Lanjutkan</a>
                </td>
            </tr>
        </table>
    </form>
</div>

<!-------------------------------->
<!--open dialog form----->
<!-------------------------------->
<div id="dialog-form" title="Add Diagnosis Sekunder">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/resume/add_diagnosis_process');?>
" method="post">
        <input name="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />
        <table class="table-input" width="100%">
            <tr>
                <th colspan="2">Tambah Data</th>
            </tr>
            <tr>
                <td width="25%">Diagnosis Sekunder</td>
                <td width="75%">
                    <input type="text" name="FS_NM_DIAG_SEK" size="40">
                </td>
            </tr>
            <tr class="submit-box">
                <td colspan="2">
                    <input type="submit" name="save" value="Simpan" class="edit-button" >
                </td>
            </tr>
        </table>
    </form>
</div>
<!-------------------------------->
<!--open dialog form----->
<!-------------------------------->
<div id="dialog-klas" title="Add Tindakan / Prosedur">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
     <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/resume/add_tindakan_process');?>
" method="post">
        <input name="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />
        <table class="table-input" width="100%">
            <tr>
                <th colspan="2">Tambah Tindakan</th>
            </tr>
            <tr>
                <td width="25%">Tindakan / Prosedur</td>
                <td width="75%">
                    <input type="text" name="FS_NM_TIND" size="40">
                </td>
            </tr>
            <tr class="submit-box">
                <td colspan="2">
                    <input type="submit" name="save" value="Simpan" class="edit-button" >
                </td>
            </tr>
        </table>
    </form>
</div>