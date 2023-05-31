<?php /* Smarty version Smarty-3.0.7, created on 2022-02-14 11:57:22
         compiled from "application/views\inap/cppt/verif.html" */ ?>
<?php /*%%SmartyHeaderCode:1482660a5b9c5b2eb85-42232157%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1d1f25e94db9d1a3a9d32c285f89c9ab12be5de8' => 
    array (
      0 => 'application/views\\inap/cppt/verif.html',
      1 => 1616214946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1482660a5b9c5b2eb85-42232157',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><div class="breadcrum">
    <p>
        <a href="#">Catatan Rawat Inap</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/cppt/');?>
">CPPT</a><span></span>
        <small>Verif Data</small>
    </p>
    <div class="clear"></div>
</div>
<div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/cppt/verif_process');?>
" method="post">
        <input type="hidden" name="FS_KD_REG" value="<?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
"/>
        <input type="hidden" name="FS_KD_TRS" value="<?php echo $_smarty_tpl->getVariable('FS_KD_TRS')->value;?>
"/>
        
        <table class="table-input" width="100%">
            <tbody>
                <tr class="headrow">
                    <th colspan="3">VERIFIKASI CPPT</th>
                </tr>
                <tr>
                    <td colspan="3">
            <center style="color:red;font-weight: bold;font-size: 14px;">PASTIKAN SEBELUM MEMVERIFIKASI DATA SUDAH BENAR</center>
            </td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td><span class="blue"><?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NAMA_PASIEN'];?>
</span></td>
                <td>
                </td>
            </tr>   
            <tr>
                <td>NO MR</td>
                <td>
                    <span class="blue"><?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_MR'];?>
</span>
                </td>
            </tr>
            <tr>
                <td>TANGGAL LAHIR</td>
                <td>
                    <span class="blue"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('rs_pasien')->value['TGL_LAHIR'],"%d %b %Y");?>
</span>
                </td>
            </tr>
            
            <tr>
                <td>CATATAN VERIFIKASI</td>
                <td>
                    <input type="text" name="FS_KET_VERIF" size="50">
                </td>
            </tr>
            <tr class="submit-box">
                <td colspan="4">
                    <input type="submit" name="save" value="Verifikasi" class="edit-button"/>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
