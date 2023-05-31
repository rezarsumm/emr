<?php /* Smarty version Smarty-3.0.7, created on 2021-03-15 15:51:02
         compiled from "application/views\medis/rawat_inap/list_his.html" */ ?>
<?php /*%%SmartyHeaderCode:9041604f1ff6342172-33174868%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ed122a1d63b68050babb2ac18b80956c57d8964' => 
    array (
      0 => 'application/views\\medis/rawat_inap/list_his.html',
      1 => 1608812806,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9041604f1ff6342172-33174868',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!-- include javascript -->
<?php $_template = new Smarty_Internal_Template("inap/ass_awal/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of include javascript-->
<div class="breadcrum">
    <ul>
        <a href="#">Data Arsip</a><span></span>
        <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_awal/cari');?>
">Asesmen Awal Rawat Inap</a><span></span>
        <small>Add Data</small>
    </ul>
    <div class="clear"></div>
</div>
<div class="head-content">
    <div class="head-content-nav">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_awal/');?>
" >Cari Data</a></li>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_awal/cari2');?>
" class="active">Cari History</a></li>
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
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_awal/cari_process2');?>
" method="post">
        <!--<input name="masuk_id" type="hidden" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['masuk_id'])===null||$tmp==='' ? '' : $tmp);?>
" />-->
        <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="4">Asesmen Awal Rawat Inap</th>
            </tr>
            <tr>
                <td>NO MR</td>
                <td colspan="3">
                    <input name="FS_MR" type="text">
                    <em>* wajib diisi</em>
                </td>
            </tr>
            <tr class="submit-box">
                <td colspan="4">
                    <input type="submit" name="save" value="Cari" class="edit-button" />
                </td>
            </tr>
        </table>
    </form>
</div>