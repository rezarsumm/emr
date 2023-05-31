<?php /* Smarty version Smarty-3.0.7, created on 2022-02-15 08:05:37
         compiled from "application/views\inap/resume/edit_diag.html" */ ?>
<?php /*%%SmartyHeaderCode:1080160717a15a13c83-37516086%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '465337e8b7d404c4f876f49b150ffed8fbb66b28' => 
    array (
      0 => 'application/views\\inap/resume/edit_diag.html',
      1 => 1616214946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1080160717a15a13c83-37516086',
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
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/resume/edit_diag_process');?>
" method="post">
        <input name="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />
        <input name="FS_KD_DIAG_SEK" type="hidden" value="<?php echo $_smarty_tpl->getVariable('diag')->value['FS_KD_DIAG_SEK'];?>
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
                <th colspan="2">Edit Diagnosis Sekunder</th>
            </tr>
             <tr>
                <td width="25%">Diagnosis Sekunder</td>
                <td width="75%">
                    <input type="text" name="FS_NM_DIAG_SEK" size="40" value="<?php echo $_smarty_tpl->getVariable('diag')->value['FS_NM_DIAG_SEK'];?>
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