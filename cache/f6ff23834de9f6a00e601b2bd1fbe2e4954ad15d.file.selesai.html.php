<?php /* Smarty version Smarty-3.0.7, created on 2021-09-20 16:08:59
         compiled from "application/views\inap/ass_awal/selesai.html" */ ?>
<?php /*%%SmartyHeaderCode:14256606e6fcf147cb5-23377862%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6ff23834de9f6a00e601b2bd1fbe2e4954ad15d' => 
    array (
      0 => 'application/views\\inap/ass_awal/selesai.html',
      1 => 1616214946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14256606e6fcf147cb5-23377862',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><div class="breadcrum">
    <p>
        <a href="#">Data Arsip</a><span></span>
        <small>Print Out</small>
    </p>
    <div class="clear"></div>
</div>
<div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <table class="table-info" width="100%">
        <tbody>
            <tr class="headrow">
                <th colspan="3">CETAK ASESMEN AWAL RAWAT INAP</th>
            </tr>
            <tr>
                <td>NAMA</td>
                <td><span class="blue"><?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NAMA_PASIEN'];?>
</span></td>
                <td width="20%" rowspan="7">
                    <a class="btn-red" target="_blank" href="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
<?php $_tmp1=ob_get_clean();?><?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_inap/cetak_rm/').($_tmp1)).('/')).('5'));?>
" title="Print">
                        <span class="icon-print"></span>
                    </a>
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
                <td>ALAMAT</td>
                <td><span class="blue"><?php echo $_smarty_tpl->getVariable('rs_pasien')->value['ALAMAT'];?>
</span></td>
            </tr>
        </tbody>
    </table>
</div>
