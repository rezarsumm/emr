<?php /* Smarty version Smarty-3.0.7, created on 2022-04-08 11:02:39
         compiled from "application/views\inap/resume/edit_terapi.html" */ ?>
<?php /*%%SmartyHeaderCode:29839624fb3df157ef4-73575812%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd691f9a418c000a18d21c69d174827283980340b' => 
    array (
      0 => 'application/views\\inap/resume/edit_terapi.html',
      1 => 1649390554,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29839624fb3df157ef4-73575812',
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
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/resume/edit_terapi_process');?>
" method="post">
        <input name="FS_KD_REG" type="hidden" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
" />
        <input name="FS_KD_TERAPI" type="hidden" value="<?php echo $_smarty_tpl->getVariable('terapi')->value['FS_KD_TERAPI'];?>
" />
        <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="2">Edit Terapi</th>
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
                <th colspan="2">Edit Terapi</th>
            </tr>
            <tr>
                <td>Nama Obat</td>
                <td><input type="text" name="FS_NM_OBAT" value="<?php echo $_smarty_tpl->getVariable('terapi')->value['FS_NM_OBAT'];?>
"></td>
            </tr>
            <tr>
                <td>Jumlah</td>
            <td><input type="text" name="FS_JML_OBAT" value="<?php echo $_smarty_tpl->getVariable('terapi')->value['FS_JML_OBAT'];?>
"></td>
            </tr>
            <tr>
                <td>Dosis</td>
            <td><input type="text" name="FS_DOSIS_OBAT" value="<?php echo $_smarty_tpl->getVariable('terapi')->value['FS_DOSIS_OBAT'];?>
"></td>
            </tr>
          <!--   <tr>
                <td>Frekwensi</td>
            <td><input type="text" name="FS_FREK_OBAT" value="<?php echo $_smarty_tpl->getVariable('terapi')->value['FS_FREK_OBAT'];?>
"></td>
            </tr> -->
                    <input type="hidden" name="FS_FREK_OBAT">

            <tr>
                <td>Cara Pemberian</td>
            <td><input type="text" name="FS_CARA_PEM_OBAT" value="<?php echo $_smarty_tpl->getVariable('terapi')->value['FS_CARA_PEM_OBAT'];?>
"></td>
            </tr>
            <tr class="submit-box">
                <td colspan="2">
                    <input type="submit" name="save" value="Edit" class="edit-button"/>
                </td>
            </tr>
        </table>
    </form>
</div>