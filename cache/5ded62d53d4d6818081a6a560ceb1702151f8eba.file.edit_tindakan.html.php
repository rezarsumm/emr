<?php /* Smarty version Smarty-3.0.7, created on 2022-02-18 10:33:00
         compiled from "application/views\inap/resume/edit_tindakan.html" */ ?>
<?php /*%%SmartyHeaderCode:29820607e3108c75a93-10117674%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ded62d53d4d6818081a6a560ceb1702151f8eba' => 
    array (
      0 => 'application/views\\inap/resume/edit_tindakan.html',
      1 => 1616214946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29820607e3108c75a93-10117674',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><div class="breadcrum">
    <p>
        <a href="#">Data Arsip</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/resume/cari');?>
">Resume Pasien Pulang</a><span></span>
        <small>Edit Data</small>
    </p>
    <div class="clear"></div>
</div>
<div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/resume/edit_tindakan_process');?>
" method="post">
        <input name="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />
        <input name="FS_KD_TIND" type="hidden" value="<?php echo $_smarty_tpl->getVariable('tindakan')->value['FS_KD_TIND'];?>
" />
        <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="2">Edit Diagnosis Sekunder</th>
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
                <th colspan="2">Edit Tindakan / Prosedur</th>
            </tr>
             <tr>
                <td width="25%">Tindakan / Prosedur</td>
                <td width="75%">
                    <input type="text" name="FS_NM_TIND" size="40" value="<?php echo $_smarty_tpl->getVariable('tindakan')->value['FS_NM_TIND'];?>
">
                </td>
            </tr>
            <tr class="submit-box">
                <td colspan="2">
                    <input type="submit" name="save" value="Edit" class="edit-button"/>
                </td>
            </tr>
        </table>
    </form>
</div>