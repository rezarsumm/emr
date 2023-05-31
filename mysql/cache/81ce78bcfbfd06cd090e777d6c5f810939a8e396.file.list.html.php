<?php /* Smarty version Smarty-3.0.7, created on 2021-03-16 10:29:02
         compiled from "application/views\inap/ass_jatuh/list.html" */ ?>
<?php /*%%SmartyHeaderCode:4174605025fed7e624-05810834%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81ce78bcfbfd06cd090e777d6c5f810939a8e396' => 
    array (
      0 => 'application/views\\inap/ass_jatuh/list.html',
      1 => 1608812797,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4174605025fed7e624-05810834',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!-- include javascript -->
<?php $_template = new Smarty_Internal_Template("inap/ass_jatuh/add_script_js.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!-- end of include javascript-->
<div class="breadcrum">
    <p>
        <a href="#">Catatan Rawat Inap</a><span></span>
        <small>Asesmen Jatuh</small>
    </p>
    <div class="clear"></div>
</div>
<div class="head-content">
    <div class="head-content-nav">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_jatuh/');?>
" class="active">Cari Data</a></li>
            <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_jatuh/cari2');?>
">Cari History</a></li>
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
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('inap/ass_jatuh/cari_process');?>
" method="post">
        <!--<input name="masuk_id" type="hidden" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('result')->value['masuk_id'])===null||$tmp==='' ? '' : $tmp);?>
" />-->
        <table class="table-input" width="100%">
            <tr class="headrow">
                <th colspan="4">Asesmen Jatuh</th>
            </tr>
            <tr>
                <td>Nama Pasien</td>
                <td colspan="3">
                     <select name="FS_RG" id="surat_dari" class="select2" style="width: 400px;">
                        <option value=""></option>
                        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rs_pasien')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['fs_kd_reg'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['FS_MR'];?>
|<?php echo $_smarty_tpl->tpl_vars['data']->value['fs_nm_pasien'];?>
|<?php echo $_smarty_tpl->tpl_vars['data']->value['fs_nm_bed'];?>
</option>
                        <?php }} ?>
                    </select>
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