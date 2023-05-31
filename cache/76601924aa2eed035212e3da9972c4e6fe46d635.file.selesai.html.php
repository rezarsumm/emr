<?php /* Smarty version Smarty-3.0.7, created on 2021-09-22 17:01:38
         compiled from "application/views\inap/rm10/selesai.html" */ ?>
<?php /*%%SmartyHeaderCode:4967606e6d9e3e6b91-73937570%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76601924aa2eed035212e3da9972c4e6fe46d635' => 
    array (
      0 => 'application/views\\inap/rm10/selesai.html',
      1 => 1616214946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4967606e6d9e3e6b91-73937570',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\XAMPP\htdocs\emr\system\plugins\smarty\libs\plugins\modifier.date_format.php';
?><div class="breadcrum">
    <p>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/rm10/cari');?>
">Catatan Edukasi</a><span></span>
        <small>Print Out</small>
    </p>
    <div class="clear"></div>
</div>
<div class="content-entry">
    <!-- notification template -->
    <?php $_template = new Smarty_Internal_Template("base/templates/notification.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <!-- end of notification template-->
    <table class="table-view" width="100%">
        <tbody>
            <tr class="headrow">
                <th colspan="3">CETAK RM 10 CATATAN EDUKASI</th>
            </tr>
            <tr>
                <td>NAMA</td>
                <td><span class="blue"><?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NAMA_PASIEN'];?>
</span></td>
                <td width="20%" rowspan="7">
                    <a class="btn-red" target="_blank" href="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('rs_pasien')->value['NO_REG'];?>
<?php $_tmp1=ob_get_clean();?><?php echo $_smarty_tpl->getVariable('config')->value->site_url(((('rm/rawat_inap/cetak_rm/').($_tmp1)).('/')).('4'));?>
" title="Print">
                        <span class="icon-print"></span>
                    </a>
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
        </tbody>
    </table>
</div>
